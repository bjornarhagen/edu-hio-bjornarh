<?php require_once('../../templates/head.php'); ?>
    <link rel="stylesheet" href="/phpsite/css/steps.css">
</head>
<body>
    <?php
        $activeStep = 0;
        require_once('steps.php');
    ?>
    <?php require_once('../../templates/nav.php'); ?>
    <article id="oppgave-1">
        <header id="intro">
            <h1>Infoprog Oblig 1</h1>
            <p>Tema: Kom i gang</p>
            <p>Under er en oversikt over alle oppgavene. Det vil også være en link til hver oppgave på toppen av siden.</p>
            <p>Hver oppgave er delt opp i 3 seksjoner: oppgaveteksten, resultet & koden.</p>
        </header>
        <section class="space-a-medium">
            <h2>Oppgaver</h2>
            <ul>
                <?php
                    for ($i=1; $i < 10; $i++) { 
                        echo '<li><a href="oppgave-' . $i . '.php">Oppgave ' . $i . '</a></li>';
                    }
                ?>
            </ul>
        </section>
    </article>
    <?php require_once('../../templates/footer.php'); ?>
    <script src="/phpsite/js/prism/prism.js"></script>
    <link rel="stylesheet" href="/phpsite/css/prism/prism.css">
</body>
</html>