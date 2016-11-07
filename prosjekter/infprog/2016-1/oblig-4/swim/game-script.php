<script>
    (function () {
        "use strict";
        window.onload = function() {
            if (navigator["cookieEnabled"]) {
                if (preload()) ready();
            } else {
                alert("Cookie support is required, sorry");
            }
        }

        var gCanvas,
            ctx,
            SwimGame = {},
            figures = [],
            gRect,
            gPipe1,
            gPipe2,
            score = 0,
            side = true;

        var Figure = function(options) {
            options        = options || {};
            options.color  = options.hasOwnProperty("color")  ? options.color  : null;
            options.stroke = options.hasOwnProperty("stroke") ? options.stroke : null;
            options.size   = options.hasOwnProperty("size")   ? options.size   : null;
            options.p      = options.hasOwnProperty("p")      ? options.p      : null;
            options.d      = options.hasOwnProperty("d")      ? options.d      : null;
            options.image  = options.hasOwnProperty("image")  ? options.image  : null;

            this.id     = figures.length;
            this.size   = options.size;   // Width & height [x, y]
            this.p      = options.p;      // Position  [x, y]
            this.d      = options.d;      // Direction [x, y]

            if (options.image != null) {
                this.stroke = options.stroke;
                this.image = options.image;
            } else {
                this.color  = options.color;
                this.stroke = options.stroke;
            }

            figures.push(this);
        }

        Figure.prototype.switchDirection = function(axis) {
            // Flip the fish
            if (axis == 0 && this.id == 0) {
                if (this.image == 1) {
                    this.image = 2;
                } else {
                    this.image = 1;
                }
            }

            this.d[axis] = -this.d[axis];
        }

        Figure.prototype.update = function() {
            var newPos = this.p[0] + this.d[0];

            for (var i = 0; i < figures.length; i++) {
                var otherFigure = figures[i];
                if (this.id != otherFigure.id) {

                    if (this.p[0] < otherFigure.p[0] + otherFigure.size[0] &&
                        this.p[0] + this.size[0] > otherFigure.p[0] &&
                        this.p[1] < otherFigure.p[1] + otherFigure.size[1] &&
                        this.size[1] + this.p[1] > otherFigure.p[1]) {

                        stop();
                        this.switchDirection(1);
                    }
                }
            }


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

            if (this.image != null) {
                ctx.drawImage(SwimGame.sprites[this.image], this.p[0], this.p[1], this.size[0], this.size[1]);
            } else {
                ctx.rect(this.p[0], this.p[1], this.size[0], this.size[1]);
                ctx.fillStyle = this.color;
                ctx.fill();
            }

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
                "images/bg.jpg",
                "images/fish-right.png",
                "images/fish-left.png",
                "images/shark-up.png",
                "images/shark-down.png"
            )

            SwimGame.sprites = sprites;

            return true;
        }

        function main(tFrame) {
            SwimGame.stopMain = window.requestAnimationFrame(main);
            SwimGame.tFrame = tFrame;

            update(tFrame); //Call your update method. In our case, we give it rAF's timestamp.
            render();
        }

        function ready() {
            gCanvas = document.getElementById("canvas");
            gCanvas.setAttribute("width", window.innerWidth);
            gCanvas.setAttribute("height", window.innerHeight);

            ctx = gCanvas.getContext("2d");

            gRect = new Figure({
                color: "#5CACC4",
                size: [100, 50],
                p: [0, gCanvas.height/2-50],
                d: [10, 5],
                image: 1
            });

            window.addEventListener("click", function() {
                gRect.switchDirection(1);
            });

            window.addEventListener("keyup", function() {
                gRect.switchDirection(1);
            });
            
            gPipe1 = new Figure({
                size: [10, 20],
                p: [gCanvas.width-10, 0],
                d: [-10, 0],
                image: 4
            });

            gPipe2 = new Figure({
                size: [10, 20],
                p: [gCanvas.width-10, gCanvas.height-20],
                d: [-10, 0],
                image: 3
            });
            
            main(); // Start cycle

            setTimeout(function() {
                document.getElementById("game-title").style.display = "none";
            }, 500);
        }

        function update(tFrame) {
            // Switch dir on edge hit
            if (gRect.p[0] > gPipe1.p[0] && side) {
                score++;
                document.getElementById("score").innerHTML = score;
                side = false;

                if (gRect.d[0] < 10) {
                    if (gRect.d[0] > 0) {
                        gRect.d[0] += 1;
                    } else {
                        gRect.d[0] += -1;
                    }

                    if (gRect.d[1] > 0) {
                        gRect.d[1] += 0.5;
                    } else {
                        gRect.d[1] += -0.5;
                    }
                }

                if (gPipe1.size[0] < gCanvas.height/3) {
                    if (gPipe1.d[0] > 0) {
                        gPipe1.d[0] += 1;
                        gPipe2.d[0] += 1;

                        gPipe1.size[0] += 10;
                        gPipe1.size[1] += 10;

                        gPipe2.size[0] += 10;
                        gPipe2.size[1] += 10;
                        gPipe2.p[1] += -10;
                    } else {
                        gPipe1.d[0] += -1;
                        gPipe2.d[0] += -1;

                        gPipe1.size[0] += 10;
                        gPipe1.size[1] += 10;

                        gPipe2.size[0] += 10;
                        gPipe2.size[1] += 10;
                        gPipe2.p[1] += -10;
                    }
                }
            }

            if (gRect.p[0] < gPipe1.p[0] && !side) {
                score++;
                document.getElementById("score").innerHTML = score;
                side = true;

                if (gRect.d[0] < 10) {
                    if (gRect.d[0] > 0) {
                        gRect.d[0] += 1;
                    } else {
                        gRect.d[0] += -1;
                    }

                    if (gRect.d[1] > 0) {
                        gRect.d[1] += 0.5;
                    } else {
                        gRect.d[1] += -0.5;
                    }
                }

                if (gPipe1.size[0] < gCanvas.height/3) {
                    if (gPipe1.d[0] > 0) {
                        gPipe1.d[0] += 1;
                        gPipe2.d[0] += 1;

                        gPipe1.size[0] += 10;
                        gPipe1.size[1] += 10;

                        gPipe2.size[0] += 10;
                        gPipe2.size[1] += 10;
                        gPipe2.p[1] += -10;
                    } else {
                        gPipe1.d[0] += -1;
                        gPipe2.d[0] += -1;

                        gPipe1.size[0] += 10;
                        gPipe1.size[1] += 10;

                        gPipe2.size[0] += 10;
                        gPipe2.size[1] += 10;
                        gPipe2.p[1] += -10;
                    }
                }
            }

            gRect.update();
            gPipe1.update();
            gPipe2.update();
        }

        function render() {
            ctx.fillStyle = "#000";
            ctx.fillRect(0, 0, gCanvas.width, gCanvas.height);
            ctx.drawImage(SwimGame.sprites[0], 0, 0, SwimGame.sprites[0].width, SwimGame.sprites[0].height, 0, 0, gCanvas.width, gCanvas.height);

            gRect.render();
            gPipe1.render();
            gPipe2.render();
        }

        function stop() {
            window.cancelAnimationFrame(SwimGame.stopMain);

            document.getElementById("modal").style.display = "block";
            var outputEl = document.getElementById("modal-inner");

            outputEl.innerHTML = "<h1>Game over</h1>" +
                                 "<p>Du ble spist av en hai. Din score ble " + score + ".</p>" +
                                 "<p>Du kan sende inn din score</p>" +
                                 "<form id='form-score' method='POST'>" +
                                     "<div class='row input-field'>" +
                                         "<input id='score-name' class='col s12 m6 offset-m3' placeholder='Navn' required>" +
                                     "</div>" +
                                     "<div class='row input-field'>" +
                                         "<button id='score-submit' class='btn black'>Send</button>" +
                                     "</div>"+
                                 "</form>";

            document.getElementById('form-score').onsubmit = function(e) {
                e.preventDefault();
            }

            document.getElementById('score-submit').onclick = function() {
                if (document.getElementById("score-name").value.length !== 0) {
                    var xhr = new XMLHttpRequest();
                    var data  = new FormData();

                    data.append("name", document.getElementById("score-name").value);
                    data.append("score", score);
                    data.append("unique_id", "<?= $unique_id; ?>");
                    data.append("userAgent", navigator["userAgent"]);
                    data.append("tFrame", SwimGame.tFrame);
                    data.append("stopMain", SwimGame.stopMain);
                    
                    // Status endret, om ajax requestet er ferdig, return svar
                    xhr.addEventListener("readystatechange", function() {
                        if (xhr.readyState == XMLHttpRequest.DONE) {
                            outputEl.innerHTML = this.responseText;
                            outputEl.innerHTML += "<button id='game-restart' class='btn black'>Spill igjen</button>";

                            document.getElementById('game-restart').onclick = function() {
                                document.location.reload();
                            }
                        }
                    });

                    xhr.addEventListener("error", function(response) {
                        outputEl.innerHTML = "Feil ved innsending av score ...";
                        outputEl.innerHTML += response;
                    });

                    // Åpne request, hent metode og action fra skjema
                    xhr.open("POST", "http://www.it-stud.hiof.no/~bjornarh/prosjekter/infprog/2016-1/oblig-4/swim/send-result.php");

                    // Send data skrevet inn i skjema
                    xhr.send(data);
                }
            }
        }
    })();
</script>