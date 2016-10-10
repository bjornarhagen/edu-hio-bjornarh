<?php require_once('../../../../templates/head.php'); ?>
    <link rel="stylesheet" href="/~bjornarh/css/steps.css">
    <link rel='stylesheet' href='/~bjornarh/fonts/hack/hack.css'>
</head>
<body>
    <?php
        $activeStep = 1;
        require_once('steps.php');
    ?>
    <?php require_once('../../../../templates/nav.php'); ?>
    <article>
        <header id="intro">
            <h1>Oppgave <?= $activeStep; ?></h1>
            <p>
                Lag en array med noen selvvalgte tilfeldige tall, gjør så følgende med denne:
            </p>
            <ul>
                <li>Skriv ut arrayen</li>
                <li>Skriv ut arrayen baklengs</li>
                <li>Skriv ut annethvert tall i arrayen</li>
                <li>Skriv ut de tallene som er mindre enn 10 i arrayen</li>
                <li>Skriv ut alle partall i arrayen</li>
                <li>Finn summen av arrayen</li>
                <li>Finn antall elementer i arrayen</li>
                <li>Finn gjennomsnittet av arrayen</li>
                <li>Finn summen av partall i arrayen</li>
                <li>Finn minste element (la en variabel holde på minste element funnet til nå, mens du går gjennom lista, og sjekk hele tiden om denne verdien skal byttes ut med verdien du er på)</li>
                <li>Finn ut om en liste inneholder en bestemt verdi.</li>
                <li>Finn ut hvor mange forekomster det er av en bestemt verdi.</li>
            </ul>
        </header>
        <section id="result">
            <h2>Resultat</h2>
            <script>
                window.onload = ready;

                function ready() {
                    var array = [];

                    // Lag en array med minst 10 tall
                    for (var i = 0; i < Math.floor(Math.random() * (100 - 10 + 1)) + 10; i++) {
                        array[i] = Math.round(Math.random() * 100);
                    }

                    console.log(array);
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