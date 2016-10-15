<?php require_once('../../../../templates/head.php'); ?>
    <link rel="stylesheet" href="/~bjornarh/css/steps.css">
    <link rel='stylesheet' href='/~bjornarh/fonts/hack/hack.css'>
</head>
<body>
    <?php
        $activeStep = 5;
        require_once('steps.php');
    ?>
    <?php require_once('../../../../templates/nav.php'); ?>
    <article>
        <header id="intro">
            <h1>Oppgave <?= $activeStep; ?> C</h1>
            <p>Lag en webside der brukeren kan skrive inn en tekst, og så få ut en oversikt over hvor mange ganger de
            ulike ordene i teksten forekommer. (Tips: Dette vil kreve en assosiativ array, ettersom dere ikke på forhånd
            vet hvilket utvalg med elementer som finnes). Lag også en statistikk over f.eks de ti mest hyppige ordene,
            lengste og korteste ord osv. Bruk et liggende søylediagram for å presentere statistikken.</p>
        </header>
        <section id="result">
            <h2>Resultat</h2>
            <div class="row input-field">
                <textarea id="o5-input" rows="3" class="col s12" placeholder="Skriv litt tekst">Dette dette er er en en ganske så enkel tekst da da</textarea>
            </div>
            <script>
                window.onload = ready;

                function ready() {
                    var input = document.getElementById("o5-input");
                    console.log(input.value.match(/[^\s]+/g)); // Matcher alle ord (også de med spesielle tegn)
                }
            </script>
        </section>
        <section id="code">
            <h2>Koden</h2>
            <h3>JavaScript</h3>
            <pre class="language-javascript">
                <code>
                </code>
            </pre>
            <h3>HTML</h3>
            <pre class="language-html">
                <code>
                </code>
            </pre>
        </section>
    </article>
    <?php require_once('../../../../templates/footer.php'); ?>
    <script src="/~bjornarh/js/prism/prism.js"></script>
    <link rel="stylesheet" href="/~bjornarh/css/prism/prism.css">
</body>
</html>