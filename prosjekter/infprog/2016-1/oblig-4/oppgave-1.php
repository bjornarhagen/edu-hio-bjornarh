<?php require_once('../../../../templates/head.php'); ?>
    <link rel='stylesheet' href='/~bjornarh/fonts/hack/hack.css'>
    <style>
        html,
        body {
            height: 100%;
        }

        body {
            overflow: hidden;
        }

        #nav-main {
            position: fixed;
            display: none;
        }

        #canvas {
            display: block;
            width: 100%;
            height: 100%;
        }
    </style>
</head>
<body>
    <?php require_once('../../../../templates/nav.php'); ?>
    <canvas id="canvas"></canvas>
    <?php require_once('../../../../templates/footer.php'); ?>
    <script>
        window.onload = ready;

        // Global vars
        var ctx, gW, gH, gPosH, gPosV, gWorldH, gFigureSize, gPipeSize;

        function ready() {
            var canvas = document.getElementById("canvas");

            gW = window.innerWidth;
            gH = window.innerHeight;
            gPosH = 0;
            gPosV = 0;
            gWorldH = 0;
            gFigureSize = 50;
            gPipeSize = gFigureSize*2;

            canvas.width = gW;
            canvas.height = gH;

            ctx = canvas.getContext("2d");
            drawBg(ctx);

            document.addEventListener("keyup", function(e) {
                if (e.key === "w" || e.key === " ") {
                    jump();
                }
            });

            document.addEventListener("click", jump);

            var drawInterval = setInterval(function() {

                if (gPosV < gH/(1.25)-gFigureSize) {
                    gPosH += 3;
                    gPosV += 3;

                    // gPosH%3===0 ? drawBg() : "";
                    drawBg();
                    drawFigure(gW/3, gPosV, gFigureSize, gFigureSize);
                    drawPipe();
                } else {
                    clearInterval(drawInterval);
                    gameOver();
                }

                if (gPosH > gW+gPipeSize+gPipeSize) {
                    gPosH = 0;
                }
            });
        }

        function jump() {
            var count = 0;
            var jump = setInterval(function() {
                count++;
                gPosV += -10;

                if (count == 50) {
                    clearInterval(jump);
                }
            });
        }

        function drawPipe() {
            ctx.beginPath();
            ctx.moveTo(0, 0);
            ctx.fillStyle = "#3f9e56"; // Mørk grønn
            ctx.lineStyle = "#000";
            ctx.lineWidth = 10;
            ctx.rect(gPipeSize+gW-gPosH, 0, gPipeSize, gH/(4));
            ctx.rect(gPipeSize+gW-gPosH, gH/(2), gPipeSize, gH);
            ctx.stroke();
            ctx.fill();

            // Bakken
            ctx.beginPath();
            ctx.fillStyle = "#8CD19D"; // Grønn
            ctx.rect(0, gH/(1.25), gW, gH);
            ctx.stroke();
            ctx.fill();
        }

        function drawBg() {
            ctx.beginPath();
            ctx.moveTo(0, 0);
            ctx.fillStyle = "#5CACC4"; // Blå
            ctx.fillRect(0, 0, gW, gH/(1.25));
        }

        function drawFigure(x, y, width, height) {
            ctx.beginPath();
            ctx.fillStyle = "#000";
            ctx.fillRect(x, y, width, height);
        }

        function gameOver() {
            ctx.beginPath();
            ctx.fillStyle = "rgba(0, 0, 0, 0.5)";
            ctx.fillRect(50, 50, gW-100, gH-100);
            
            ctx.beginPath();
            ctx.fillStyle = "#fff";
            ctx.font="30px Arial";
            ctx.textAlign = "center";
            ctx.fillText("Game over!", gW/2, gH/2);

            setTimeout(function() {
                document.location.reload();
            }, 1000);
        }
    </script>
</body>
</html> 