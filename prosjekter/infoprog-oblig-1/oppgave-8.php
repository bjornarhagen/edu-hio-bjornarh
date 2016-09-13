<?php require_once('../../templates/head.php'); ?>
    <link rel="stylesheet" href="/~bjornarh/css/steps.css">
</head>
<body>
    <?php
        $activeStep = 8;
        require_once('steps.php');
    ?>
    <?php require_once('../../templates/nav.php'); ?>
    <article id="oppgave-8">
        <header id="intro">
            <h1>Oppgave 8</h1>
            <p>Lag en nettside som tegner et "kunstverk" som er basert på <code class="language-javascript">Math.random()</code>
            og gjentakelser gjennom <code class="language-javascript">setInterval</code>.
            <p><b>Valgfritt</b>: Forsøk å lage to variabler (bredde/høyde) som inneholder canvasets størrelse, og som
            alt er avhengig av. Det skal altså være nok å endre disse variablene når du endrer størrelsen.</p>
            <p><b>Valgfritt</b>: Du må gjerne benytte knapper, tekstbokser og nedtrekkslister for å gi "input" til
            kunstverket.</p>
        </header>
        <section id="result">
            <h2>Resultat</h2>
            <p>Lorem ipsum</p>
            <script>
            (function () {

            })();
            </script>
        </section>
        <section id="code">
            <h2>Koden</h2>
            <h3>HTML</h3>
            <pre class="language-html">
                <code>
Lorem ipsum
                </code>
            </pre>
            <h3>JavaScript</h3>
            <pre class="language-javascript">
                <code>
Lorem ipsum
                </code>
            </pre>
        </section>
    </article>
    <?php require_once('../../templates/footer.php'); ?>
    <script src="/~bjornarh/js/prism/prism.js"></script>
    <link rel="stylesheet" href="/~bjornarh/css/prism/prism.css">
</body>
</html>