<?php require_once('../../../../templates/head.php'); ?>
    <link rel="stylesheet" href="/~bjornarh/css/steps.css">
    <link rel='stylesheet' href='/~bjornarh/fonts/hack/hack.css'>
</head>
<body>
    <?php
        $activeStep = 10;
        require_once('steps.php');
    ?>
    <?php require_once('../../../../templates/nav.php'); ?>
    <article>
        <header id="intro">
            <h1>Oppgave <?= $activeStep; ?></h1>
        </header>
        <section id="result">
            <h2>Resultat</h2>
            <p>Endre figur: (tips: hold pil opp/ned når du står i feltet)</p>
            <div class="row input-field">
                <input id="numb1" class="col s6" type="number" value="4" min="1">
                <input id="numb2" class="col s6" type="number" value="20" min="1">
            </div>
            <div class="space-a-medium center-align black-bg">
                <canvas id="canvas" width="500" height="500"></canvas>
            </div>
            <button id="followme" class="btn alert">Trykk meg!</button>
            <script>
                window.onload = ready;

                function ready() {
                    var numb1 = document.getElementById("numb1");
                    var numb2 = document.getElementById("numb2");
                    drawFigure(numb1.value, numb2.value, 0);
                    
                    numb1.onchange = function() {
                        drawFigure(this.value, numb2.value, 0);
                    }

                    numb2.onchange = function() {
                        drawFigure(numb1.value, this.value, 0);
                    }

                    document.getElementById("followme").onclick = followMe;
                }

                function drawFigure(val1, val2, follow) {
                    var canvas = document.getElementById("canvas");
                    var width = canvas.width;
                    var height = canvas.height;
                    var ctx = canvas.getContext("2d");
                    
                    ctx.clearRect(0, 0, canvas.width, canvas.height);

                    if (follow === 0) {
                        ctx.globalAlpha = 1;
                        for (var toppPunkt = 0; toppPunkt <= val1; toppPunkt++) {
                            for (var bunnPunkt = 0; bunnPunkt <= val2; bunnPunkt++) {
                                ctx.beginPath();
                                ctx.moveTo(toppPunkt*width/val1, 0);        // Sett start kordinater
                                ctx.lineTo(bunnPunkt*width/val2, height);   // Slutt kordinater
                                ctx.lineWidth = "1";
                                ctx.strokeStyle = "#FF5254"; // Rød

                                // Annenhver gang
                                if (bunnPunkt%2===0) {
                                    ctx.strokeStyle = "#55bb6e"; // Grønn
                                }

                                ctx.stroke();
                            }
                        }
                    } else {
                        // Eventen vil stackes... ikke akkurat ønskbart, meeeeen ja :/
                        // Håp at bruker ikke spammer knappen I guess?
                        canvas.addEventListener("mousemove", function(e) {
                            ctx.clearRect(0, 0, canvas.width, canvas.height);

                            for (var toppPunkt = 0; toppPunkt <= val1; toppPunkt++) {
                                ctx.beginPath();
                                ctx.moveTo(toppPunkt*width/val1, 0);
                                ctx.lineTo(e.offsetX, e.offsetY);
                                ctx.lineWidth = "1";
                                ctx.strokeStyle = "#55bb6e";

                                if (toppPunkt%2===0) {
                                    ctx.strokeStyle = "#FF5254";
                                }

                                ctx.stroke();
                            }

                            for (var bunnPunkt = 0; bunnPunkt <= val2; bunnPunkt++) {
                                ctx.beginPath();
                                ctx.moveTo(bunnPunkt*width/val2, height);
                                ctx.lineTo(e.offsetX, e.offsetY);
                                ctx.lineWidth = "1";
                                ctx.strokeStyle = "#FF5254";

                                if (bunnPunkt%2===0) {
                                    ctx.strokeStyle = "#55bb6e";
                                }

                                ctx.stroke();
                            }
                        });
                    }
                }

                function followMe() {
                    canvas.style.cursor = "none";
                    drawFigure(numb1.value, numb2.value, arguments[0].target);
                    arguments[0].target.innerHTML = "Beveg musepekern rundt over figuren!";
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