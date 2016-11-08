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
            <h1>Infoprog Oblig 5</h1>
            <p>Tema: Eksterne datakilder / prosjekt</p>
            <p>Under er en oversikt over alle oppgavene. Det vil også være en link til hver oppgave på toppen av siden.</p>
            <p>Hver oppgave er delt opp i 3 seksjoner: oppgaveteksten, resultet & koden.</p>
        </header>
        <section class="space-a-medium">
            <h2>Oppgaver</h2>
            <ul>
                <li><a href="oppgave-1-2-3.php">Oppgave 1, 2 & 3</a></li>
                <li><a href="oppgave-4.php">Oppgave 4</a></li>
            </ul>
        </section>
    </article>
    <?php require_once('../../../../templates/footer.php'); ?>
    <script src="/~bjornarh/js/prism/prism.js"></script>
    <link rel="stylesheet" href="/~bjornarh/css/prism/prism.css">
</body>
</html>