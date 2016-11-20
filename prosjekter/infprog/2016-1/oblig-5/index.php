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
        </header>
        <section class="space-a-medium">
            <h2>Oppgaver</h2>
            <ul>
                <li><a href="oppgave-1-2-3.php">Oppgave 1, 2 & 3</a></li>
                <li><a href="oppgave-4.php">Oppgave 4</a></li>
            </ul>

            Oppgave 4 sluttet å funke...
            her er hvordan den ville sett ut:
            <img src="http://i.imgur.com/IETfs7o.jpg">
            <br>
            <br>
            <br>
            <br>
            <br>
            <img src="http://i.imgur.com/DJL3RcW.jpg">
            <br>
            <br>
            <br>
            <br>
            <br>
            <img src="http://i.imgur.com/p4LoUEb.jpg">
            du kan forsatt lese koden da :)
        </section>
    </article>
    <?php require_once('../../../../templates/footer.php'); ?>
    <script src="/~bjornarh/js/prism/prism.js"></script>
    <link rel="stylesheet" href="/~bjornarh/css/prism/prism.css">
</body>
</html>