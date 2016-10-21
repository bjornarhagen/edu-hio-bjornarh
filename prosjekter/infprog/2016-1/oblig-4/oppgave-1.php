<?php require_once('../../../../templates/head.php'); ?>
    <link rel='stylesheet' href='/~bjornarh/fonts/hack/hack.css'>
    <style>
        html,
        body {
            height: 100%;
        }

        body {
            overflow: hidden;
            background-color: black;
        }

        #nav-main {
            position: fixed;
            display: none;
        }

        #canvas {
            display: block;
        }
    </style>
</head>
<body>
    <?php require_once('../../../../templates/nav.php'); ?>
    <canvas id="canvas"></canvas>
    <?php require_once('../../../../templates/footer.php'); ?>
    <script>

        ;(function () {
            "use strict";
            window.onload = function() {
                if (preload()) ready();
            }

            var gCanvas,
                ctx,
                MyGame = {
                    stopMain: null,
                },
                ball,
                gRect;

            var Figure = function(options) {
                options        = options || {};
                options.color  = options.hasOwnProperty("color")  ? options.color  : "black";
                options.stroke = options.hasOwnProperty("stroke") ? options.stroke : "black";
                options.radius = options.hasOwnProperty("radius") ? options.radius : 0;
                options.size   = options.hasOwnProperty("size")   ? options.size   : [0, 0];
                options.p      = options.hasOwnProperty("p")      ? options.p      : [gCanvas.width/2, gCanvas.height/2];
                options.d      = options.hasOwnProperty("d")      ? options.d      : [0, 0];

                this.type = options.type;
                switch(options.type) {
                    case "arc":
                        this.radius = options.radius;
                        this.size = [options.radius, options.radius];
                        break;
                    case "rect":
                        this.size = options.size; // Width & height [x, y]
                        break;
                    default:
                        break;
                }

                this.p = options.p;            // Position  [x, y]
                this.d = options.d;            // Direction [x, y]
                this.color = options.color;
                this.stroke = options.stroke;
            }

            Figure.prototype.switchDirection = function(axis) {
                this.d[axis] = -this.d[axis];
            }

            Figure.prototype.update = function() {
                var newPos = this.p[0] + this.d[0];
                if (newPos > gCanvas.width-this.size[0] || newPos < 0) {
                    this.switchDirection(0);
                }

                newPos = this.p[1] + this.d[1];
                if(newPos > gCanvas.height-this.size[1] || newPos < 0) {
                    this.switchDirection(1);
                }

                // Set new pos
                this.p[0] += this.d[0];
                this.p[1] += this.d[1];
            }

            Figure.prototype.render = function() {
                ctx.beginPath();
                ctx.rect(this.p[0], this.p[1], this.size[0], this.size[1]);
                ctx.fillStyle = this.color;
                ctx.fill();
                ctx.closePath();
            }

            function preload() {
                var sprites = [];

                function loadSprites() {
                    for (var i = 0; i < arguments.length; i++) {
                        sprites[i] = new Image();
                        sprites[i].src = arguments[i];
                    }
                }

                loadSprites(
                    "http://domain.tld/gallery/image-001.jpg",
                    "http://domain.tld/gallery/image-002.jpg",
                    "http://domain.tld/gallery/image-003.jpg"
                )

                return true;
            }

            function main(tFrame) {
                MyGame.stopMain = window.requestAnimationFrame(main);

                update(tFrame); //Call your update method. In our case, we give it rAF's timestamp.
                render();
            }

            function ready() {
                gCanvas = document.getElementById("canvas");
                gCanvas.setAttribute("width", window.innerWidth);
                gCanvas.setAttribute("height", window.innerHeight);

                ctx = gCanvas.getContext("2d");

                ball = new Figure({
                    type: "rect",
                    color: "blue",
                    size: [50, 50],
                    p: [gCanvas.width/2, gCanvas.height/2],
                    d: [10, -10]
                });

                gRect = new Figure({
                    type: "rect",
                    color: "red",
                    size: [25, 25],
                    p: [gCanvas.width/2, gCanvas.height/2],
                    d: [7, -7]
                });
                
                main(); // Start cycle
            }

            function update(tFrame) {
                // Switch dir on edge hit
                ball.update();
                gRect.update();

                // console.log("draw-update: " + tFrame);
            }

            function render() {
                ctx.fillStyle = "#cecece";
                ctx.fillRect(0, 0, gCanvas.width, gCanvas.height);
                
                    
                ball.render();
                gRect.render();
            }

            function stop() {
                window.cancelAnimationFrame(MyGame.stopMain);
            }
        })();
    </script>
</body>
</html> 