<?php require_once('../../templates/head.php'); ?>
    <link rel="stylesheet" href="/~bjornarh/css/steps.css">
</head>
<body>
    <?php
        $activeStep = 6;
        require_once('steps.php');
    ?>
    <?php require_once('../../templates/nav.php'); ?>
    <article id="oppgave-6">
        <header id="intro">
            <h1>Oppgave 6</h1>
            <p>Lag et skjema som lar deg fylle ut en handleliste. Listen skal bestå av varenavnet og antall varer. Når
            du trykker på en knapp skal varen legges til i en ul-liste i nettsiden. Under listen skal det vises totalt
            antall varer.</p>
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