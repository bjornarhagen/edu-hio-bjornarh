<?php require_once('../../../../templates/head.php'); ?>
    <link rel="stylesheet" href="/phpsite/css/steps.css">
    <link rel='stylesheet' href='/phpsite/fonts/hack/hack.css'>
    <style>
        .o5-stats-list {
            list-style: none;
            padding: 0;
        }

        .o5-stats-list li {
            padding: 5px 10px;
            color: #fff;
        }
    </style>
</head>
<body>
    <?php
        $activeStep = 5;
        require_once('steps.php');
    ?>
    <?php require_once('../../../../templates/nav.php'); ?>
    <article>
        <header id="intro">
            <h1>Oppgave <?= $activeStep; ?> C</h1>
            <p>Lag en webside der brukeren kan skrive inn en tekst, og så få ut en oversikt over hvor mange ganger de
            ulike ordene i teksten forekommer. (Tips: Dette vil kreve en assosiativ array, ettersom dere ikke på forhånd
            vet hvilket utvalg med elementer som finnes). Lag også en statistikk over f.eks de ti mest hyppige ordene,
            lengste og korteste ord osv. Bruk et liggende søylediagram for å presentere statistikken.</p>
        </header>
        <section id="result">
            <h2>Resultat</h2>
            <div class="row input-field">
                <textarea id="o5-input" rows="7" class="col s12" placeholder="Skriv litt tekst">Just think about these things in your mind and drop em' on canvas. Now then, let's play. This is unplanned it really just happens. If you don't think every day is a good day - try missing a few. You'll see. If you've been in Alaska less than a year you're a Cheechako. You can create the world you want to see and be a part of. You have that power. Sometimes you learn more from your mistakes than you do from your masterpieces. Clouds are free they come and go as they please. Don't fiddle with it all day.</textarea>
            </div>
            <div class="row input-field">
                <label for="o5-stats-amount" class="col s2 m1"><i class="icon-business-chart-1"></i></label>
                <input id="o5-stats-amount" class="col s10 m11" type="number" value="10" placeholder="Antall ord i statistikk">
            </div>
            <div class="row">
                <h3>Forekomster:</h3>
                <ul id="o5-most-freq" class="o5-stats-list"></ul>
            </div>
            <div class="row">
                <h3>Lengste:</h3>
                <ul id="o5-longest" class="o5-stats-list"></ul>
            </div>
            <div class="row">
                <h3>Koreste:</h3>
                <ul id="o5-shortest" class="o5-stats-list"></ul>
            </div>
            <script>
                window.onload = ready;

                function ready() {
                    var input = document.getElementById("o5-input");
                    var statsAmount = document.getElementById("o5-stats-amount");

                    doIt(input, statsAmount.value);
                    input.addEventListener("input", function() {doIt(input, statsAmount.value)});
                    statsAmount.addEventListener("change", function() {doIt(input, statsAmount.value)});
                }

                function doIt(input, statsAmount) {
                    var specialChars = /[,.:;/\\\[\]\(\)?!"'#¤%&=`^*~´|\-_]/g;
                    var allWords = /[^\s]+/g;
                    var stats = getStats(input.value.replace(specialChars, "").match(allWords));
                    var words = stats.list;
                    stats = stats.stats;

                    displayStats(words, stats, statsAmount);
                }

                function getStats(wordsArray) {
                    var wordsList = {};
                    var wordsStats = {
                        mostFreq: {word: "", count: 0, length: 0},
                        longest:  {word: "", count: 0, length: 0},
                        shortest: {word: "", count: 0, length: Infinity}
                    };

                    // Loop gjennom alle ordene og tell hvor mange forkomster det er av hvert ord
                    wordsArray.forEach(function(value, index){
                        var word = value.toLowerCase();

                        // Legger til ordet i en liste
                        if (wordsList[word]) {
                            wordsList[word] += 1;
                        } else {
                            wordsList[word] = 1;
                        }

                        var wordCount = wordsList[word];

                        // Finner ordet det er flest forekomster av
                        if (wordCount > wordsStats.mostFreq.count) {
                            wordsStats.mostFreq.count = wordCount;
                            wordsStats.mostFreq.word = word;
                            wordsStats.mostFreq.length = word.length;
                        }

                        // Finner det lengste ordet
                        if (word.length > wordsStats.longest.length) {
                            wordsStats.longest.count = wordCount;
                            wordsStats.longest.word = word;
                            wordsStats.longest.length = word.length;
                        }

                        // Finner det korteste ordet
                        if (word.length < wordsStats.shortest.length) {
                            wordsStats.shortest.count = wordCount;
                            wordsStats.shortest.word = word;
                            wordsStats.shortest.length = word.length;
                        }
                    });

                    return {list: wordsList, stats: wordsStats};
                }

                function displayStats(wordsList, wordsStats, statsAmount) {
                    var list = document.getElementById("o5-most-freq");
                    list.innerHTML = ""; // Tøm listen først

                    // Loop gjennom den nye listen. Legg til i egen liste
                    Object.keys(wordsList).sort(function(a, b) {
                        return (wordsList[b] - wordsList[a]); // Sorterer elementene i en synkende rekkefølge etter verdi
                    }).forEach(function(word) {
                        if (list.childNodes.length < statsAmount) {
                            var tmpChild = document.createElement("li")
                            tmpChild.appendChild(document.createTextNode(wordsList[word] + ": " + word));

                            tmpChild.style.backgroundColor = "rgb(" + Math.floor(255/wordsStats.mostFreq.count*wordsList[word]) + ", 50, 50)";
                            tmpChild.style.width = list.offsetWidth/wordsStats.mostFreq.count*wordsList[word] + "px";
                            list.appendChild(tmpChild);
                        }
                    });

                    list = document.getElementById("o5-longest");
                    list.innerHTML = ""; // Tøm listen først

                    // Loop gjennom den nye listen. Legg til de lengste i egen liste
                    Object.keys(wordsList).sort(function(a, b) {
                        return (b.length - a.length); // Sorterer elementene i en synkende rekkefølge etter lengde
                    }).forEach(function(word) {
                        if (list.childNodes.length < statsAmount) {
                            var tmpChild = document.createElement("li")
                            tmpChild.appendChild(document.createTextNode(word.length + ": " + word));

                            tmpChild.style.backgroundColor = "rgb(" + Math.floor(255/wordsStats.longest.length*word.length) + ", 50, 50)";
                            tmpChild.style.width = list.offsetWidth/wordsStats.longest.length*word.length + "px";
                            list.appendChild(tmpChild);
                        }
                    });

                    list = document.getElementById("o5-shortest");
                    list.innerHTML = ""; // Tøm listen først

                    // Loop gjennom den nye listen. Legg til de lengste i egen liste
                    Object.keys(wordsList).sort(function(a, b) {
                        return (a.length - b.length); // Sorterer elementene i en stigende rekkefølge etter lengde
                    }).forEach(function(word) {
                        if (list.childNodes.length < statsAmount) {
                            var tmpChild = document.createElement("li")
                            tmpChild.appendChild(document.createTextNode(word.length + ": " + word));

                            tmpChild.style.backgroundColor = "rgb(" + Math.floor(255/wordsStats.longest.length*word.length) + ", 50, 50)";
                            tmpChild.style.width = list.offsetWidth/wordsStats.longest.length*word.length + "px";
                            list.appendChild(tmpChild);
                        }
                    });
                }
            </script>
        </section>
        <section id="code">
            <h2>Koden</h2>
            <h3>JavaScript</h3>
            <pre class="language-javascript">
                <code>
window.onload = ready;

function ready() {
    var input = document.getElementById(&quot;o5-input&quot;);
    var statsAmount = document.getElementById(&quot;o5-stats-amount&quot;);

    doIt(input, statsAmount.value);
    input.addEventListener(&quot;input&quot;, function() {doIt(input, statsAmount.value)});
    statsAmount.addEventListener(&quot;change&quot;, function() {doIt(input, statsAmount.value)});
}

function doIt(input, statsAmount) {
    var specialChars = /[,.:;/\\\[\]\(\)?!&quot;'#¤%&=`^*~´|\-_]/g;
    var allWords = /[^\s]+/g;
    var stats = getStats(input.value.replace(specialChars, &quot;&quot;).match(allWords));
    var words = stats.list;
    stats = stats.stats;

    displayStats(words, stats, statsAmount);
}

function getStats(wordsArray) {
    var wordsList = {};
    var wordsStats = {
        mostFreq: {word: &quot;&quot;, count: 0, length: 0},
        longest:  {word: &quot;&quot;, count: 0, length: 0},
        shortest: {word: &quot;&quot;, count: 0, length: Infinity}
    };

    // Loop gjennom alle ordene og tell hvor mange forkomster det er av hvert ord
    wordsArray.forEach(function(value, index){
        var word = value.toLowerCase();

        // Legger til ordet i en liste
        if (wordsList[word]) {
            wordsList[word] += 1;
        } else {
            wordsList[word] = 1;
        }

        var wordCount = wordsList[word];

        // Finner ordet det er flest forekomster av
        if (wordCount &gt; wordsStats.mostFreq.count) {
            wordsStats.mostFreq.count = wordCount;
            wordsStats.mostFreq.word = word;
            wordsStats.mostFreq.length = word.length;
        }

        // Finner det lengste ordet
        if (word.length &gt; wordsStats.longest.length) {
            wordsStats.longest.count = wordCount;
            wordsStats.longest.word = word;
            wordsStats.longest.length = word.length;
        }

        // Finner det korteste ordet
        if (word.length &lt; wordsStats.shortest.length) {
            wordsStats.shortest.count = wordCount;
            wordsStats.shortest.word = word;
            wordsStats.shortest.length = word.length;
        }
    });

    return {list: wordsList, stats: wordsStats};
}

function displayStats(wordsList, wordsStats, statsAmount) {
    var list = document.getElementById(&quot;o5-most-freq&quot;);
    list.innerHTML = &quot;&quot;; // Tøm listen først

    // Loop gjennom den nye listen. Legg til i egen liste
    Object.keys(wordsList).sort(function(a, b) {
        return (wordsList[b] - wordsList[a]); // Sorterer elementene i en synkende rekkefølge etter verdi
    }).forEach(function(word) {
        if (list.childNodes.length &lt; statsAmount) {
            var tmpChild = document.createElement(&quot;li&quot;)
            tmpChild.appendChild(document.createTextNode(wordsList[word] + &quot;: &quot; + word));

            tmpChild.style.backgroundColor = &quot;rgb(&quot; + Math.floor(255/wordsStats.mostFreq.count*wordsList[word]) + &quot;, 50, 50)&quot;;
            tmpChild.style.width = list.offsetWidth/wordsStats.mostFreq.count*wordsList[word] + &quot;px&quot;;
            list.appendChild(tmpChild);
        }
    });

    list = document.getElementById(&quot;o5-longest&quot;);
    list.innerHTML = &quot;&quot;; // Tøm listen først

    // Loop gjennom den nye listen. Legg til de lengste i egen liste
    Object.keys(wordsList).sort(function(a, b) {
        return (b.length - a.length); // Sorterer elementene i en synkende rekkefølge etter lengde
    }).forEach(function(word) {
        if (list.childNodes.length &lt; statsAmount) {
            var tmpChild = document.createElement(&quot;li&quot;)
            tmpChild.appendChild(document.createTextNode(word.length + &quot;: &quot; + word));

            tmpChild.style.backgroundColor = &quot;rgb(&quot; + Math.floor(255/wordsStats.longest.length*word.length) + &quot;, 50, 50)&quot;;
            tmpChild.style.width = list.offsetWidth/wordsStats.longest.length*word.length + &quot;px&quot;;
            list.appendChild(tmpChild);
        }
    });

    list = document.getElementById(&quot;o5-shortest&quot;);
    list.innerHTML = &quot;&quot;; // Tøm listen først

    // Loop gjennom den nye listen. Legg til de lengste i egen liste
    Object.keys(wordsList).sort(function(a, b) {
        return (a.length - b.length); // Sorterer elementene i en stigende rekkefølge etter lengde
    }).forEach(function(word) {
        if (list.childNodes.length &lt; statsAmount) {
            var tmpChild = document.createElement(&quot;li&quot;)
            tmpChild.appendChild(document.createTextNode(word.length + &quot;: &quot; + word));

            tmpChild.style.backgroundColor = &quot;rgb(&quot; + Math.floor(255/wordsStats.longest.length*word.length) + &quot;, 50, 50)&quot;;
            tmpChild.style.width = list.offsetWidth/wordsStats.longest.length*word.length + &quot;px&quot;;
            list.appendChild(tmpChild);
        }
    });
}
                </code>
            </pre>
            <h3>HTML</h3>
            <pre class="language-html">
                <code>
&lt;div class=&quot;row input-field&quot;&gt;
    &lt;textarea id=&quot;o5-input&quot; rows=&quot;8&quot; class=&quot;col s12&quot; placeholder=&quot;Skriv litt tekst&quot;&gt;&lt;/textarea&gt;
&lt;/div&gt;
&lt;div class=&quot;row input-field&quot;&gt;
    &lt;label for=&quot;o5-stats-amount&quot; class=&quot;col s2 m1&quot;&gt;&lt;i class=&quot;icon-business-chart-1&quot;&gt;&lt;/i&gt;&lt;/label&gt;
    &lt;input id=&quot;o5-stats-amount&quot; class=&quot;col s10 m11&quot; type=&quot;number&quot; value=&quot;10&quot; placeholder=&quot;Antall ord i statistikk&quot;&gt;
&lt;/div&gt;
&lt;div class=&quot;row&quot;&gt;
    &lt;h3&gt;Forekomster:&lt;/h3&gt;
    &lt;ul id=&quot;o5-most-freq&quot; class=&quot;o5-stats-list&quot;&gt;&lt;/ul&gt;
&lt;/div&gt;
&lt;div class=&quot;row&quot;&gt;
    &lt;h3&gt;Lengste:&lt;/h3&gt;
    &lt;ul id=&quot;o5-longest&quot; class=&quot;o5-stats-list&quot;&gt;&lt;/ul&gt;
&lt;/div&gt;
&lt;div class=&quot;row&quot;&gt;
    &lt;h3&gt;Koreste:&lt;/h3&gt;
    &lt;ul id=&quot;o5-shortest&quot; class=&quot;o5-stats-list&quot;&gt;&lt;/ul&gt;
&lt;/div&gt;
                </code>
            </pre>
        </section>
    </article>
    <?php require_once('../../../../templates/footer.php'); ?>
    <script src="/phpsite/js/prism/prism.js"></script>
    <link rel="stylesheet" href="/phpsite/css/prism/prism.css">
</body>
</html>