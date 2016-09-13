<?php require_once('../../templates/head.php'); ?>
    <link rel="stylesheet" href="/~bjornarh/css/steps.css">
    <style>
        #o5-canvas {
            width: 100%;
            height: 256px;
            background-color: #fff;
        }
    </style>
</head>
<body>
    <?php
        $activeStep = 5;
        require_once('steps.php');
    ?>
    <?php require_once('../../templates/nav.php'); ?>
    <article id="oppgave-5">
        <header id="intro">
            <h1>Oppgave 5</h1>
            <p>Bruk funksjonene i et canvas og tegn et hus med vindu, dør og trekantet tak ved hjelp av JavaScript. Før
            du skriver koden, kan det være lurt å tegne huset inn i koordinatsystemet på et ark. Husk at x-aksen peker
            mot høyre og y-aksen peker nedover. </p>
        </header>
        <section id="result">
            <h2>Resultat</h2>
            <canvas id="o5-canvas"></canvas>
            <script>
            (function () {
                var o5Canvas = document.getElementById("o5-canvas");
                var o5Ctx = o5Canvas.getContext("2d");

                o5Ctx.beginPath();
                o5Ctx.moveTo(o5Canvas.width / 2 - 25, 50);
                o5Ctx.lineTo(o5Canvas.width / 2 + 25, 50);
                o5Ctx.lineTo(o5Canvas.width / 2, 25);
                o5Ctx.lineTo(o5Canvas.width / 2 - 25, 50);
                o5Ctx.fillStyle = "red";
                o5Ctx.strokeStyle = "black";
                o5Ctx.stroke();
                o5Ctx.fill();

                o5Ctx.beginPath();
                o5Ctx.rect(o5Canvas.width / 2 - 25, 51, 50, 50);
                o5Ctx.fillStyle = "blue";
                o5Ctx.stroke();
                o5Ctx.fill();
            })();
            </script>        </section>
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