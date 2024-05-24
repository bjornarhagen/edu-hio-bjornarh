<?php require_once('../../../../templates/head.php'); ?>
    <link rel="stylesheet" href="/phpsite/css/steps.css">
    <link rel='stylesheet' href='/phpsite/fonts/hack/hack.css'>
    <style>
        #result p span {
            font-weight: 700;
        }
    </style>
</head>
<body>
    <?php
        $activeStep = 8;
        require_once('steps.php');
    ?>
    <?php require_once('../../../../templates/nav.php'); ?>
    <article>
        <header id="intro">
            <h1>Oppgave <?= $activeStep; ?></h1>
        </header>
        <section id="result">
            <h2>Resultat</h2>
            <code id="o8-array" class="language-javascript"></code>
            <p>Største nummer i array: <span id="o8-output-1"></span></p>
            <p>Summen av arrayen: <span id="o8-output-2"></span></p>
            <p>Gjennomsnittet av arrayen: <span id="o8-output-3"></span></p>
            <p>Er tallet 5 i arrayen? <span id="o8-output-4"></span></p>
            <script>
                window.onload = ready;

                function ready() {
                    var numbersArray = [];
                    for (var i = 0; i < 5; i++) {
                        numbersArray.push(Math.round(Math.random()*10));
                    }

                    document.getElementById("o8-array").innerHTML = "Array = [" + numbersArray.join(", ") + "];";

                    document.getElementById("o8-output-1").innerHTML = arrayFindLargest(numbersArray);
                    document.getElementById("o8-output-2").innerHTML = arraySum(numbersArray);
                    document.getElementById("o8-output-3").innerHTML = arrayAverage(numbersArray);
                    document.getElementById("o8-output-4").innerHTML = arraySearch(5, numbersArray) ? "Ja" : "Nei";
                }

                // Sorterer arrayen i synkende rekkefølge og retunerer den første (største) verdien
                function arrayFindLargest(array) {
                    return array.sort(function(a, b){return b - a})[0];
                }

                // Løper gjennom array og summerer alle tallene i den
                function arraySum(array) {
                    var sum = 0;

                    array.forEach(function(val) {
                        sum += val;
                    });

                    return sum;
                }

                // Retunerer gjennomsnittet
                function arrayAverage(array) {
                    return arraySum(array)/array.length;
                }

                // Søker gjennom arrayen og ser om den finner verdien
                function arraySearch(needle, haystack) {
                    for (var i = 0; i < haystack.length; i++) {
                        if (haystack[i] === needle) {
                            return true
                        }
                    }

                    return false;
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
    var numbersArray = [];
    for (var i = 0; i &lt; 5; i++) {
        numbersArray.push(Math.round(Math.random()*10));
    }

    document.getElementById(&quot;o8-array&quot;).innerHTML = &quot;Array = [&quot; + numbersArray.join(&quot;, &quot;) + &quot;];&quot;;

    document.getElementById(&quot;o8-output-1&quot;).innerHTML = arrayFindLargest(numbersArray);
    document.getElementById(&quot;o8-output-2&quot;).innerHTML = arraySum(numbersArray);
    document.getElementById(&quot;o8-output-3&quot;).innerHTML = arrayAverage(numbersArray);
    document.getElementById(&quot;o8-output-4&quot;).innerHTML = arraySearch(5, numbersArray) ? &quot;Ja&quot; : &quot;Nei&quot;;
}

// Sorterer arrayen i synkende rekkefølge og retunerer den første (største) verdien
function arrayFindLargest(array) {
    return array.sort(function(a, b){return b - a})[0];
}

// Løper gjennom array og summerer alle tallene i den
function arraySum(array) {
    var sum = 0;

    array.forEach(function(val) {
        sum += val;
    });

    return sum;
}

// Retunerer gjennomsnittet
function arrayAverage(array) {
    return arraySum(array)/array.length;
}

// Søker gjennom arrayen og ser om den finner verdien
function arraySearch(needle, haystack) {
    for (var i = 0; i &lt; haystack.length; i++) {
        if (haystack[i] === needle) {
            return true
        }
    }

    return false;
}
                </code>
            </pre>
            <h3>HTML</h3>
            <pre class="language-html">
                <code>
&lt;code id=&quot;o8-array&quot; class=&quot;language-javascript&quot;&gt;&lt;/code&gt;
&lt;p&gt;Største nummer i array: &lt;span id=&quot;o8-output-1&quot;&gt;&lt;/span&gt;&lt;/p&gt;
&lt;p&gt;Summen av arrayen: &lt;span id=&quot;o8-output-2&quot;&gt;&lt;/span&gt;&lt;/p&gt;
&lt;p&gt;Gjennomsnittet av arrayen: &lt;span id=&quot;o8-output-3&quot;&gt;&lt;/span&gt;&lt;/p&gt;
&lt;p&gt;Er tallet 5 i arrayen? &lt;span id=&quot;o8-output-4&quot;&gt;&lt;/span&gt;&lt;/p&gt;
                </code>
            </pre>
        </section>
    </article>
    <?php require_once('../../../../templates/footer.php'); ?>
    <script src="/phpsite/js/prism/prism.js"></script>
    <link rel="stylesheet" href="/phpsite/css/prism/prism.css">
</body>
</html>