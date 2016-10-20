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
        var w, h;

        function ready() {
            var canvas = document.getElementById("canvas");

            w = window.innerWidth;
            h = window.innerHeight;
            var posH = 0;
            var posV = 0;
            var worldH = 0;
            var figureSize = 50;

            canvas.width = w;
            canvas.height = h;

            var ctx = canvas.getContext("2d");
            drawBg(ctx);
            ctx.fillStyle = "#8CD19D"; // Grønn
            ctx.fillRect(0, h/(1.25), w, h);

            // ctx.fillStyle = "#55bb6e";
            ctx.fillStyle = "red";
            ctx.fillRect(Math.random()*w, 100, 10, 10);

            document.addEventListener("keyup", function(e) {
                if (e.key === "w" || e.key === " ") {
                    var count = 0;
                    var jump = setInterval(function() {
                        count++;
                        posV += -10;

                        if (count == 50) {
                            clearInterval(jump);
                        }
                    }, 0);
                }
            });

            var drawInterval = setInterval(function() {
                if (posV < h-50) {
                    posH += 3;
                    posV += 3;
                } else {
                    clearInterval(drawInterval);
                }

                console.log("worldH:" + worldH);
                console.log("posH:" + posH);
                console.log("posV:" + posV);

                posH%3===0 ? drawBg(ctx) : "";
                drawFigure(ctx, w/3, posV, 50, 50);
            }, 0);
        }

        function drawBg(ctx) {
            ctx.beginPath();
            ctx.moveTo(0, 0);
            ctx.fillStyle = "#5CACC4"; // Blå
            ctx.fillRect(0, 0, w, h/(1.25));
        }

        function drawFigure(ctx, x, y, width, height) {
            // ctx.beginPath();
            // ctx.fillStyle = "#fff";
            // ctx.fillRect(posH-100, posV, 50, 150);
            // // drawBg(ctx);

            ctx.beginPath();
            ctx.fillStyle = "#000";
            ctx.fillRect(x, y, width, height);
        }
    </script>
</body>
</html> 