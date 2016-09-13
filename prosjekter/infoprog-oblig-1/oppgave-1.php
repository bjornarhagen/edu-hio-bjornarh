<?php require_once('../../templates/head.php'); ?>
    <link rel="stylesheet" href="/~bjornarh/css/steps.css">
</head>
<body>
    <?php
        $activeStep = 1;
        require_once('steps.php');
    ?>
    <?php require_once('../../templates/nav.php'); ?>
    <article id="oppgave-1">
        <header id="intro">
            <h1>Oppgave 1</h1>
            <p>Lag en helt enkel nettside med to ulike knapper og en paragraf. Registrer en hendelse på hver av
            knappene. Når du trykker på den første knappen, skal paragrafen vise Hei på deg, og med den andre
            knappen skal Ha det bra vises.</p>
        </header>
        <section id="result">
            <h2>Resultat</h2>
            <p id="o1-paragraph">Trykk på en av knappene</p>
            <button id="o1-btn-1" class="btn black">Knapp 1</button>
            <button id="o1-btn-2" class="btn black">Knapp 2</button>
            <script>
                window.onload = load;

                function load() {
                    var paragraph = document.getElementById("o1-paragraph");

                    document.getElementById("o1-btn-1").addEventListener("click", function() {
                        paragraph.innerHTML = "Hei på deg";
                    });

                    document.getElementById("o1-btn-2").addEventListener("click", function() {
                        paragraph.innerHTML = "Ha det bra";
                    });
                };
            </script>
        </section>
        <section id="code">
            <h2>Koden</h2>
            <h3>HTML</h3>
            <pre class="language-html">
                <code>
&lt;p id=&quot;o1-paragraph&quot;&gt;Trykk på en av knappene&lt;/p&gt;
&lt;button id=&quot;o1-btn-1&quot; class=&quot;btn black&quot;&gt;Knapp 1&lt;/button&gt;
&lt;button id=&quot;o1-btn-2&quot; class=&quot;btn black&quot;&gt;Knapp 2&lt;/button&gt;
                </code>
            </pre>
            <h3>JavaScript</h3>
            <pre class="language-javascript">
                <code>
var paragraph = document.getElementById("o1-paragraph");

document.getElementById("o1-btn-1").addEventListener("click", function() {
    paragraph.innerHTML = "Hei på deg";
});

document.getElementById("o1-btn-2").addEventListener("click", function() {
    paragraph.innerHTML = "Ha det bra";
});
                </code>
            </pre>
        </section>
    </article>
    <?php require_once('../../templates/footer.php'); ?>
    <script src="/~bjornarh/js/prism/prism.js"></script>
    <link rel="stylesheet" href="/~bjornarh/css/prism/prism.css">
</body>
</html>