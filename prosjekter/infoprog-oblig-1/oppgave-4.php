<?php require_once('../../templates/head.php'); ?>
    <link rel="stylesheet" href="/~bjornarh/css/steps.css">
</head>
<body>
    <?php
        $activeStep = 4;
        require_once('steps.php');
    ?>
    <?php require_once('../../templates/nav.php'); ?>
    <article id="oppgave-4">
        <header id="intro">
            <h1>Oppgave 4</h1>
            <p>Lag et "nummerisk tastatur" ved å plassere ut 10 knapper med teksten 0,1,2,3 osv. Lag så et tekstfelt,
            der du kan skrive inn tall som 4327 ved å trykke på knappene. Hver gang du trykker på en knapp, skal altså
            sifferet som står på knappen legges til i tekstboksen.</p>
        </header>
        <section id="result">
            <h2>Resultat</h2>
            <div id="o4-buttons" class="row">
                <button class="btn black">1</button>
                <button class="btn black">2</button>
                <button class="btn black">3</button>
                <button class="btn black">4</button>
                <button class="btn black">5</button>
                <button class="btn black">6</button>
                <button class="btn black">7</button>
                <button class="btn black">8</button>
                <button class="btn black">9</button>
                <button class="btn black">0</button>
                <button id="o4-reset" class="btn alert">Slett</button>
            </div>
            <div class="input-field">
                <input id="o4-result" type="text" placeholder="Skriv inn et tall ved å trykke på knappene" disabled>
            </div>
            <script>
                window.onload = ready;

                function ready() {
                    var o4Buttons = document.getElementById("o4-buttons").querySelectorAll(".btn");

                    for (var i = 0; i < o4Buttons.length; i++) {
                        o4Buttons[i].addEventListener("click", function() {
                            document.getElementById("o4-result").value += this.innerHTML;
                        })
                    }

                    document.getElementById("o4-reset").onclick = function() {
                        document.getElementById("o4-result").value = "";
                    }
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
    var o4Buttons = document.getElementById("o4-buttons").querySelectorAll(".btn");

    for (var i = 0; i < o4Buttons.length; i++) {
        o4Buttons[i].addEventListener("click", function() {
            document.getElementById("o4-result").value += this.innerHTML;
        })
    }

    document.getElementById("o4-reset").onclick = function() {
        document.getElementById("o4-result").value = "";
    }
}
                </code>
            </pre>
            <h3>HTML</h3>
            <pre class="language-html">
                <code>
&lt;div id=&quot;o4-buttons&quot; class=&quot;row&quot;&gt;
    &lt;button class=&quot;btn black&quot;&gt;1&lt;/button&gt;
    &lt;button class=&quot;btn black&quot;&gt;2&lt;/button&gt;
    &lt;button class=&quot;btn black&quot;&gt;3&lt;/button&gt;
    &lt;button class=&quot;btn black&quot;&gt;4&lt;/button&gt;
    &lt;button class=&quot;btn black&quot;&gt;5&lt;/button&gt;
    &lt;button class=&quot;btn black&quot;&gt;6&lt;/button&gt;
    &lt;button class=&quot;btn black&quot;&gt;7&lt;/button&gt;
    &lt;button class=&quot;btn black&quot;&gt;8&lt;/button&gt;
    &lt;button class=&quot;btn black&quot;&gt;9&lt;/button&gt;
    &lt;button class=&quot;btn black&quot;&gt;10&lt;/button&gt;
    &lt;button id=&quot;o4-reset&quot; class=&quot;btn alert&quot;&gt;Slett&lt;/button&gt;
&lt;/div&gt;
                </code>
            </pre>
        </section>
    </article>
    <?php require_once('../../templates/footer.php'); ?>
    <script src="/~bjornarh/js/prism/prism.js"></script>
    <link rel="stylesheet" href="/~bjornarh/css/prism/prism.css">
</body>
</html>