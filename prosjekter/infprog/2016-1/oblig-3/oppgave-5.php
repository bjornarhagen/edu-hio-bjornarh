<?php require_once('../../../../templates/head.php'); ?>
    <link rel="stylesheet" href="/~bjornarh/css/steps.css">
    <link rel='stylesheet' href='/~bjornarh/fonts/hack/hack.css'>
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
                <textarea id="o5-input" rows="3" class="col s12" placeholder="Skriv litt tekst">Abrakadabra å Dette dette er er en en ganske så  DettE enkel tekst da (asdf) dette da</textarea>
            </div>
            <div class="row">
                <h3>Forekomster:</h3>
                <ul id="o5-most-freq"></ul>
            </div>
            <script>
                window.onload = ready;

                function ready() {
                    var input = document.getElementById("o5-input");
                    var wordsArray = input.value.match(/[^\s]+/g); // Matcher alle ord (også de med spesielle tegn)
                    var wordList = {};

                    // Loop gjennom alle ordene og tell hvor mange forkomster det er av hvert ord
                    wordsArray.forEach(function(value, index){
                        var word = value.toLowerCase();

                        // Legger til ordet i en liste
                        if (wordList[word]) {
                            wordList[word] += 1;
                        } else {
                            wordList[word] = 1;
                        }
                    });

                    var mostFreqList = document.getElementById("o5-most-freq");

                    // Loop gjennom den nye listen. Legg til topp 10 i egen liste
                    Object.keys(wordList).sort(function(a, b) {
                        return (wordList[b] - wordList[a]); // Sorterer elementene i en synkende rekkefølge etter verdi
                    }).forEach(function(item) {
                        var tmpChild = document.createElement("li")
                        tmpChild.appendChild(document.createTextNode(wordList[item] + ": " + item));

                        tmpChild.style.backgroundColor = "red";
                        tmpChild.style.width = wordList[item]*10 + "%";
                        mostFreqList.appendChild(tmpChild);
                    });

                    Object.keys(wordList).sort(function(a, b) {
                        return (b.length - a.length); // Sorterer elementene i en synkende rekkefølge etter lengde
                    }).forEach(function(item) {
                        // console.log(item);
                    });

                }
            </script>
        </section>
        <section id="code">
            <h2>Koden</h2>
            <h3>JavaScript</h3>
            <pre class="language-javascript">
                <code>
                </code>
            </pre>
            <h3>HTML</h3>
            <pre class="language-html">
                <code>
                </code>
            </pre>
        </section>
    </article>
    <?php require_once('../../../../templates/footer.php'); ?>
    <script src="/~bjornarh/js/prism/prism.js"></script>
    <link rel="stylesheet" href="/~bjornarh/css/prism/prism.css">
</body>
</html>