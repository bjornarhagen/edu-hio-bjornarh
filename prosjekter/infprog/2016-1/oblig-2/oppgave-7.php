<?php require_once('../../../../templates/head.php'); ?>
    <link rel="stylesheet" href="/~bjornarh/css/steps.css">
    <link rel='stylesheet' href='/~bjornarh/fonts/hack/hack.css'>
</head>
<body>
    <?php
        $activeStep = 7;
        require_once('steps.php');
    ?>
    <?php require_once('../../../../templates/nav.php'); ?>
    <article>
        <header id="intro">
            <h1>Oppgave 7</h1>
            <p>Skriv ut lister med tall mellom 0 og 100 etter følgende regler:</p>
            <ul>
                <li>Forlengs: 0,1,2,...,98,99,100</li>
                <li>Baklengs: 100,99,98,...,1,0</li>
                <li>Delt på 2: 0,0.5,...,49,49.5,50</li>
                <li>Kun de som er delige på 3: 3,6,9...99 (Tips: Her kan man prøve %-operatoren)</li>
                <li>Partall: 2,4,6,8,...98,100</li>
                <li>Oddetall: 1,3,5,...,97,99</li>
                <li>Annenhvert tall positivt og negativt: 0,-1,2,-3,4,-5,...,-99,100</li>
            </ul>
        </header>
        <section id="result">
            <h2>Resultat</h2>
            <div class="row">
                <div class="col s6 space-v-small">
                    <button id="o7-forward" class="btn black">Forlengs</button>
                </div>
                <div class="col s6 space-v-small">
                    <button id="o7-backwards" class="btn black">baklengs</button>
                </div>
                <div class="col s6 space-v-small">
                    <button id="o7-div-2" class="btn black">Delt på 2</button>
                </div>
                <div class="col s6 space-v-small">
                    <button id="o7-divable-3" class="btn black">Delelige på 3</button>
                </div>
                <div class="col s6 space-v-small">
                    <button id="o7-even" class="btn black">Partall</button>
                </div>
                <div class="col s6 space-v-small">
                    <button id="o7-odd" class="btn black">Oddetall</button>
                </div>
                <div class="col s12 space-v-small">
                    <button id="o7-neg-pos" class="btn black">Annenhvert tall + og -</button>
                </div>
            </div>
            <p id="o7-output"></p>
            <script>
                window.onload = ready;
                var o7OutputEl;

                function ready() {
                    o7OutputEl = document.getElementById("o7-output");

                    document.getElementById("o7-forward").onclick = outputForward;
                    document.getElementById("o7-backwards").onclick = outputBackwards;
                    document.getElementById("o7-div-2").onclick = outputDiv2;
                    document.getElementById("o7-divable-3").onclick = outputDivable3;
                    document.getElementById("o7-even").onclick = outputEven;
                    document.getElementById("o7-odd").onclick = outputOdd;
                    document.getElementById("o7-neg-pos").onclick = outputNegPos;
                }


                function outputForward() {
                    empty(); // Tøm listen først

                    for (var i = 0; i <= 100; i++) {
                        o7OutputEl.innerHTML += i + ", ";
                    }

                    // Kunne blitt løst med shorthand statement, men ville ikke tvinge koden til å kjøre en if check 100
                    // ganger (selv om det har minimalt å si...)
                    removeComma();
                }

                function outputBackwards() {
                    empty();

                    for (var i = 100; i >= 0; i--) {
                        o7OutputEl.innerHTML += i + ", ";
                    }

                    removeComma();
                }

                function outputDiv2() {
                    empty();

                    for (var i = 0; i <= 100; i++) {
                        o7OutputEl.innerHTML += i / 2 + ", ";
                    }

                    removeComma();
                }

                function outputDivable3() {
                    empty();

                    for (var i = 0; i <= 100; i++) {
                        o7OutputEl.innerHTML += i % 3 === 0 ? i + ", ":"";
                    }

                    removeComma();
                }

                function outputEven() {
                    empty();

                    for (var i = 0; i <= 100; i++) {
                        o7OutputEl.innerHTML += i % 2 === 0 ? i + ", ":"";
                    }

                    removeComma();
                }

                function outputOdd() {
                    empty();

                    for (var i = 0; i <= 100; i++) {
                        o7OutputEl.innerHTML += i % 2 !== 0 ? i + ", ":"";
                    }

                    removeComma();
                }

                function outputNegPos() {
                    empty();

                    for (var i = 0; i <= 100; i++) {
                        o7OutputEl.innerHTML += (i % 2 === 0 ? i : -i) + ", ";
                    }

                    removeComma();
                }

                function removeComma() {
                    o7OutputEl.innerHTML = o7OutputEl.innerHTML.slice(0, -2);
                }

                function empty() {
                    o7OutputEl.innerHTML = "";
                }
            </script>
        </section>
        <section id="code">
            <h2>Koden</h2>
            <h3>JavaScript</h3>
            <pre class="language-javascript">
                <code>
window.onload = ready;
var o7OutputEl;

function ready() {
    o7OutputEl = document.getElementById(&quot;o7-output&quot;);

    document.getElementById(&quot;o7-forward&quot;).onclick = outputForward;
    document.getElementById(&quot;o7-backwards&quot;).onclick = outputBackwards;
    document.getElementById(&quot;o7-div-2&quot;).onclick = outputDiv2;
    document.getElementById(&quot;o7-divable-3&quot;).onclick = outputDivable3;
    document.getElementById(&quot;o7-even&quot;).onclick = outputEven;
    document.getElementById(&quot;o7-odd&quot;).onclick = outputOdd;
    document.getElementById(&quot;o7-neg-pos&quot;).onclick = outputNegPos;
}


function outputForward() {
    empty(); // Tøm listen først

    for (var i = 0; i &lt;= 100; i++) {
        o7OutputEl.innerHTML += i + &quot;, &quot;;
    }

    // Kunne blitt løst med shorthand statement, men ville ikke tvinge koden til å kjøre en if check 100
    // ganger (selv om det har minimalt å si...)
    removeComma();
}

function outputBackwards() {
    empty();

    for (var i = 100; i &gt;= 0; i--) {
        o7OutputEl.innerHTML += i + &quot;, &quot;;
    }

    removeComma();
}

function outputDiv2() {
    empty();

    for (var i = 0; i &lt;= 100; i++) {
        o7OutputEl.innerHTML += i / 2 + &quot;, &quot;;
    }

    removeComma();
}

function outputDivable3() {
    empty();

    for (var i = 0; i &lt;= 100; i++) {
        o7OutputEl.innerHTML += i % 3 === 0 ? i + &quot;, &quot;:&quot;&quot;;
    }

    removeComma();
}

function outputEven() {
    empty();

    for (var i = 0; i &lt;= 100; i++) {
        o7OutputEl.innerHTML += i % 2 === 0 ? i + &quot;, &quot;:&quot;&quot;;
    }

    removeComma();
}

function outputOdd() {
    empty();

    for (var i = 0; i &lt;= 100; i++) {
        o7OutputEl.innerHTML += i % 2 !== 0 ? i + &quot;, &quot;:&quot;&quot;;
    }

    removeComma();
}

function outputNegPos() {
    empty();

    for (var i = 0; i &lt;= 100; i++) {
        o7OutputEl.innerHTML += (i % 2 === 0 ? i : -i) + &quot;, &quot;;
    }

    removeComma();
}

function removeComma() {
    o7OutputEl.innerHTML = o7OutputEl.innerHTML.slice(0, -2);
}

function empty() {
    o7OutputEl.innerHTML = &quot;&quot;;
}
                </code>
            </pre>
            <h3>HTML</h3>
            <pre class="language-html">
                <code>
&lt;div class=&quot;row&quot;&gt;
    &lt;div class=&quot;col s6 space-v-small&quot;&gt;
        &lt;button id=&quot;o7-forward&quot; class=&quot;btn black&quot;&gt;Forlengs&lt;/button&gt;
    &lt;/div&gt;
    &lt;div class=&quot;col s6 space-v-small&quot;&gt;
        &lt;button id=&quot;o7-backwards&quot; class=&quot;btn black&quot;&gt;baklengs&lt;/button&gt;
    &lt;/div&gt;
    &lt;div class=&quot;col s6 space-v-small&quot;&gt;
        &lt;button id=&quot;o7-div-2&quot; class=&quot;btn black&quot;&gt;Delt på 2&lt;/button&gt;
    &lt;/div&gt;
    &lt;div class=&quot;col s6 space-v-small&quot;&gt;
        &lt;button id=&quot;o7-divable-3&quot; class=&quot;btn black&quot;&gt;Delelige på 3&lt;/button&gt;
    &lt;/div&gt;
    &lt;div class=&quot;col s6 space-v-small&quot;&gt;
        &lt;button id=&quot;o7-even&quot; class=&quot;btn black&quot;&gt;Partall&lt;/button&gt;
    &lt;/div&gt;
    &lt;div class=&quot;col s6 space-v-small&quot;&gt;
        &lt;button id=&quot;o7-odd&quot; class=&quot;btn black&quot;&gt;Oddetall&lt;/button&gt;
    &lt;/div&gt;
    &lt;div class=&quot;col s12 space-v-small&quot;&gt;
        &lt;button id=&quot;o7-neg-pos&quot; class=&quot;btn black&quot;&gt;Annenhvert tall + og -&lt;/button&gt;
    &lt;/div&gt;
&lt;/div&gt;
&lt;p id=&quot;o7-output&quot;&gt;&lt;/p&gt;
                </code>
            </pre>
        </section>
    </article>
    <?php require_once('../../../../templates/footer.php'); ?>
    <script src="/~bjornarh/js/prism/prism.js"></script>
    <link rel="stylesheet" href="/~bjornarh/css/prism/prism.css">
</body>
</html>