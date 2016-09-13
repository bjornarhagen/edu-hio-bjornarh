<?php require_once('../../templates/head.php'); ?>
    <link rel="stylesheet" href="/~bjornarh/css/steps.css">
</head>
<body>
    <?php
        $activeStep = 9;
        require_once('steps.php');
    ?>
    <?php require_once('../../templates/nav.php'); ?>
    <article id="oppgave-9">
        <header id="intro">
            <h1>Oppgave 9</h1>
            <p>Lag en nettside som spiller en "beat" som er basert på gjentakelser gjennom
            <code class="language-javascript">setInteval</code> og <code class="language-javascript">Math.random()</code>
            (om ønskelig). Benytt lydfiler av instrumenter som du finner på nett. Valgfritt: Utvid gjerne med grafikk
            som tegnes samtidig.</p>
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