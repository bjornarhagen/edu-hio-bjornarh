<?php require_once('../../../../templates/head.php'); ?>
    <link rel="stylesheet" href="/~bjornarh/css/steps.css">
</head>
<body>
    <?php
        $activeStep = 1;
        require_once('steps.php');
    ?>
    <?php require_once('../../../../templates/nav.php'); ?>
    <article id="oppgave-1">
        <header id="intro">
            <h1>Oppgave 1</h1>
            <p>Lag en helt enkel nettside med to ulike knapper og en paragraf. Registrer en hendelse på hver av
            knappene. Når du trykker på den første knappen, skal paragrafen vise Hei på deg, og med den andre
            knappen skal Ha det bra vises.</p>
        </header>
        <section id="result">
            <h2>Resultat</h2>
            <button id="o1-btn-1" class="btn black">Knapp 1</button>
            <button id="o1-btn-2" class="btn black">Knapp 2</button>
            <p><code id="o1-output" class="language-html">Trykk på en av knappene</code></p>
            <script>
                window.onload = ready;

                function ready() {
                    var output = document.getElementById("o1-output");

                    document.getElementById("o1-btn-1").addEventListener("click", function() {
                        output.innerHTML = "Hei på deg";
                    });

                    document.getElementById("o1-btn-2").addEventListener("click", function() {
                        output.innerHTML = "Ha det bra";
                    });
                };
            </script>
        </section>
        <section id="code">
            <h2>Koden</h2>
            <h3>JavaScript</h3>
            <pre class="language-javascript">
                <code>
window.onload = ready;

function ready() {
    var output = document.getElementById("o1-output");

    document.getElementById("o1-btn-1").addEventListener("click", function() {
        output.innerHTML = "Hei på deg";
    });

    document.getElementById("o1-btn-2").addEventListener("click", function() {
        output.innerHTML = "Ha det bra";
    });
};
                </code>
            </pre>
            <h3>HTML</h3>
            <pre class="language-html">
                <code>
&lt;button id=&quot;o1-btn-1&quot; class=&quot;btn black&quot;&gt;Knapp 1&lt;/button&gt;
&lt;button id=&quot;o1-btn-2&quot; class=&quot;btn black&quot;&gt;Knapp 2&lt;/button&gt;
&lt;p&gt;&lt;code id=&quot;o1-output&quot;&gt;Trykk på en av knappene&lt;/code&gt;&lt;/p&gt;
                </code>
            </pre>
        </section>
    </article>
    <?php require_once('../../../../templates/footer.php'); ?>
    <script src="/~bjornarh/js/prism/prism.js"></script>
    <link rel="stylesheet" href="/~bjornarh/css/prism/prism.css">
</body>
</html>