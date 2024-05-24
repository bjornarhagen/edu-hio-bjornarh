<?php require_once('../../../../templates/head.php'); ?>
    <link rel="stylesheet" href="/phpsite/css/steps.css">
</head>
<body>
    <?php
        $activeStep = 8;
        require_once('steps.php');
    ?>
    <?php require_once('../../../../templates/nav.php'); ?>
    <article id="oppgave-8">
        <header id="intro">
            <h1>Oppgave 8</h1>
            <p>Lag en nettside som tegner et "kunstverk" som er basert på <code class="language-javascript">Math.random()</code>
            og gjentakelser gjennom <code class="language-javascript">setInterval</code>.
            <p><b>Valgfritt</b>: Forsøk å lage to variabler (bredde/høyde) som inneholder canvasets størrelse, og som
            alt er avhengig av. Det skal altså være nok å endre disse variablene når du endrer størrelsen.</p>
            <p><b>Valgfritt</b>: Du må gjerne benytte knapper, tekstbokser og nedtrekkslister for å gi "input" til
            kunstverket.</p>
        </header>
        <section id="result">
            <h2>Resultat</h2>
            <canvas id="o8-canvas" width="668" height="512"></canvas>
            <script>
                window.onload = ready;

                function ready() {
                    aThing();
                }

                function aThing() {
                    var o8Canvas = document.getElementById("o8-canvas")
                        o8Ctx = o8Canvas.getContext("2d"),
                        width = o8Canvas.width,
                        height = o8Canvas.height,
                        rotation = 0,
                        rotationSpeedUp = 0.1,
                        rectSize = 1,
                        x = o8Canvas.width/2,
                        y = o8Canvas.height/2;

                    var colors = [
                        "#FF5254", // Rød
                        "#745cc4", // Lilla
                        "#5CACC4", // Blå
                        "#8CD19D", // Grønn
                        "#f4de7c", // Gul
                        "#FCB859"  // Oransje
                    ];

                    o8Canvas.addEventListener("mousemove", function(e) {
                        // Hvis bruker flytter musen utenfor canvas, sett x og y til midtpunktet.
                        if (e.layerX > width/1.05 || e.layerX < 10) {
                            x = width/2;
                            y = height/2;
                        } else {
                            x = e.layerX;
                        }

                        // Hvis bruker flytter musen utenfor canvas, sett x og y til midtpunktet.
                        if (e.layerY > height/1.05 || e.layerY < 10) {
                            x = width/2;
                            y = height/2;
                        } else {
                            y = e.layerY;
                        }
                    });

                    setInterval(function() {
                        console.log();

                        if (rectSize < 300) {
                            rectSize = rectSize+(rectSize/4);
                            x = width/2;
                            y = height/2;
                            o8Ctx.globalAlpha = 0.0;
                        } else {
                            o8Ctx.globalAlpha = 0.2;
                        }

                        o8Ctx.fillStyle = "black";
                        o8Ctx.fillRect(0, 0, width, height);
                        o8Ctx.save();

                        o8Ctx.globalAlpha = 1;
                        o8Ctx.translate(x, y);
                        o8Ctx.strokeStyle = randomColor(colors);
                        o8Ctx.rotate(rotation);
                        o8Ctx.lineWidth = 5;
                        o8Ctx.strokeRect(-(rectSize/2), -(rectSize/2), rectSize, rectSize);
                        o8Ctx.restore();

                        rotation += Math.PI/360+rotationSpeedUp;
                    }, 50);
                }

                function randomColor(colors) {
                    var choice = Math.floor(Math.random() * colors.length);
                    return colors[choice];
                }
            </script>
        </section>
        <section id="code">
            <h2>Koden</h2>
            <h3>JavaScript</h3>
            <pre class="language-javascript">
                <code>
window.onload = ready;

function ready() {
    aThing();
}

function aThing() {
    var o8Canvas = document.getElementById("o8-canvas")
        o8Ctx = o8Canvas.getContext("2d"),
        width = o8Canvas.width,
        height = o8Canvas.height,
        rotation = 0,
        rotationSpeedUp = 0.1,
        rectSize = 1,
        x = o8Canvas.width/2,
        y = o8Canvas.height/2;

    var colors = [
        "#FF5254", // Rød
        "#745cc4", // Lilla
        "#5CACC4", // Blå
        "#8CD19D", // Grønn
        "#f4de7c", // Gul
        "#FCB859"  // Oransje
    ];

    o8Canvas.addEventListener("mousemove", function(e) {
        // Hvis bruker flytter musen utenfor canvas, sett x og y til midtpunktet.
        if (e.layerX > width/1.05 || e.layerX < 10) {
            x = width/2;
            y = height/2;
        } else {
            x = e.layerX;
        }

        // Hvis bruker flytter musen utenfor canvas, sett x og y til midtpunktet.
        if (e.layerY > height/1.05 || e.layerY < 10) {
            x = width/2;
            y = height/2;
        } else {
            y = e.layerY;
        }
    });

    setInterval(function() {
        console.log();

        if (rectSize < 300) {
            rectSize = rectSize+(rectSize/4);
            x = width/2;
            y = height/2;
            o8Ctx.globalAlpha = 0.0;
        } else {
            o8Ctx.globalAlpha = 0.2;
        }

        o8Ctx.fillStyle = "black";
        o8Ctx.fillRect(0, 0, width, height);
        o8Ctx.save();

        o8Ctx.globalAlpha = 1;
        o8Ctx.translate(x, y);
        o8Ctx.strokeStyle = randomColor(colors);
        o8Ctx.rotate(rotation);
        o8Ctx.lineWidth = 5;
        o8Ctx.strokeRect(-(rectSize/2), -(rectSize/2), rectSize, rectSize);
        o8Ctx.restore();

        rotation += Math.PI/360+rotationSpeedUp;
    }, 50);
}

function randomColor(colors) {
    var choice = Math.floor(Math.random() * colors.length);
    return colors[choice];
}
                </code>
            </pre>
            <h3>HTML</h3>
            <pre class="language-html">
                <code>
&lt;canvas id=&quot;o8-canvas&quot; width=&quot;668&quot; height=&quot;512&quot;&gt;&lt;/canvas&gt;
                </code>
            </pre>
        </section>
    </article>
    <?php require_once('../../../../templates/footer.php'); ?>
    <script src="/phpsite/js/prism/prism.js"></script>
    <link rel="stylesheet" href="/phpsite/css/prism/prism.css">
</body>
</html>