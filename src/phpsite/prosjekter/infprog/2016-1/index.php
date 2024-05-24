<?php require_once('../../../templates/head.php'); ?>
    <link rel="stylesheet" href="/phpsite/css/steps.css">
</head>
<body>
    <?php require_once('../../../templates/nav.php'); ?>
    <article id="oppgave-1">
        <header id="intro">
            <h1>Infprog</h1>
        </header>
        <section class="space-a-medium">
            <h2>Obliger - høsten 2016</h2>
            <ul>
                <?php
                    for ($i=0; $i < 5; $i++) { 
                        echo '<li><a href="oblig-' . ($i + 1) . '">Oblig ' . ($i + 1) . '</a></li>';
                    }
                ?>
            </ul>
        </section>
    </article>
    <?php require_once('../../../templates/footer.php'); ?>
    <script src="/phpsite/js/prism/prism.js"></script>
    <link rel="stylesheet" href="/phpsite/css/prism/prism.css">
</body>
</html>