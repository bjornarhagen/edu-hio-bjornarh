<?php require_once('../../templates/head.php'); ?>
    <link rel="stylesheet" href="/~bjornarh/css/steps.css">
</head>
<body>
    <?php
        $activeStep = 7;
        require_once('steps.php');
    ?>
    <?php require_once('../../templates/nav.php'); ?>
    <article id="oppgave-7">
        <header id="intro">
            <h1>Oppgave 7</h1>
            <p>Lag en kalkulator som utfører beregninger basert på selvvalgt brukerdata (ikke BMI som er benyttet som
            eksempel i kurset). Kalkulatoren skal minst inneholde en tekstboks og en nedtrekksliste. Tips: I
            nedtrekkslisten har du satt tallverdier som "value". Disse benyttes som en del av beregningen.</p>
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