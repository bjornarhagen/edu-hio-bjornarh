<?php require_once('../../../../templates/head.php'); ?>
    <link rel="stylesheet" href="/~bjornarh/css/steps.css">
    <link rel='stylesheet' href='/~bjornarh/fonts/hack/hack.css'>
</head>
<body>
    <?php
        $activeStep = 6;
        require_once('steps.php');
    ?>
    <?php require_once('../../../../templates/nav.php'); ?>
    <article>
        <header id="intro">
            <h1>Oppgave 6</h1>
            <p>Lag to tekstbokser og en knapp. Når man trykker på knappen skal teksten i den første tekstboksen skrives
            ut så mange ganger (linje for linje) som man skrev et tall i den andre tekstboksen.</p>
        </header>
        <section id="result">
            <h2>Resultat</h2>
            <div class="row input-field">
                <label for="o6-text" class="col s1"><i class="icon-text"></i></label>
                <input type="text" id="o6-text" class="col s11" placeholder="Tekst">
            </div>
            <div class="row input-field">
                <label for="o6-times" class="col s1"><i class="icon-cross-1"></i></label>
                <input type="number" id="o6-times" class="col s11" placeholder="Antall">
            </div>
            <div class="row input-field">
                <button id="fireaway" class="btn black">Skriv ut</button>
            </div>
            <ol id="output"></ol>
            <script>
                window.onload = ready;

                function ready() {
                    document.getElementById("fireaway").onclick = function() {
                        var text = document.getElementById("o6-text").value;
                        var times = document.getElementById("o6-times").value;
                        var output = document.getElementById("output");
                        var tmpChild;
                        var tmpText;

                        output.innerHTML = ""; // Tøm listen

                        // Legg til ny child x antall ganger
                        for (var i = 0; i < times; i++) {
                            tmpChild = document.createElement("LI");
                            tmpText = document.createTextNode(text);
                            tmpChild.appendChild(tmpText);

                            output.appendChild(tmpChild);
                        }
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
    document.getElementById(&quot;fireaway&quot;).onclick = function() {
        var text = document.getElementById(&quot;o6-text&quot;).value;
        var times = document.getElementById(&quot;o6-times&quot;).value;
        var output = document.getElementById(&quot;output&quot;);
        var tmpChild;
        var tmpText;

        output.innerHTML = &quot;&quot;; // Tøm listen

        // Legg til ny child x antall ganger
        for (var i = 0; i &lt; times; i++) {
            tmpChild = document.createElement(&quot;LI&quot;);
            tmpText = document.createTextNode(text);
            tmpChild.appendChild(tmpText);

            output.appendChild(tmpChild);
        }
    }
}
                </code>
            </pre>
            <h3>HTML</h3>
            <pre class="language-html">
                <code>
&lt;div class=&quot;row input-field&quot;&gt;
    &lt;label for=&quot;o6-text&quot; class=&quot;col s1&quot;&gt;&lt;i class=&quot;icon-text&quot;&gt;&lt;/i&gt;&lt;/label&gt;
    &lt;input type=&quot;text&quot; id=&quot;o6-text&quot; class=&quot;col s11&quot; placeholder=&quot;Tekst&quot;&gt;
&lt;/div&gt;
&lt;div class=&quot;row input-field&quot;&gt;
    &lt;label for=&quot;o6-times&quot; class=&quot;col s1&quot;&gt;&lt;i class=&quot;icon-cross-1&quot;&gt;&lt;/i&gt;&lt;/label&gt;
    &lt;input type=&quot;number&quot; id=&quot;o6-times&quot; class=&quot;col s11&quot; placeholder=&quot;Antall&quot;&gt;
&lt;/div&gt;
&lt;div class=&quot;row input-field&quot;&gt;
    &lt;button id=&quot;fireaway&quot; class=&quot;btn black&quot;&gt;Skriv ut&lt;/button&gt;
&lt;/div&gt;
&lt;ol id=&quot;output&quot;&gt;&lt;/ol&gt;
                </code>
            </pre>
        </section>
    </article>
    <?php require_once('../../../../templates/footer.php'); ?>
    <script src="/~bjornarh/js/prism/prism.js"></script>
    <link rel="stylesheet" href="/~bjornarh/css/prism/prism.css">
</body>
</html>