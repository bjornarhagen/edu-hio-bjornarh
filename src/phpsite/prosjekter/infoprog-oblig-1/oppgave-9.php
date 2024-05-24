<?php require_once('../../templates/head.php'); ?>
    <link rel="stylesheet" href="/phpsite/css/steps.css">
    <style>
        #o9-video {
            width: 100%;
            height: 0;
        }
    </style>
</head>
<body>
    <?php
        $activeStep = 9;
        require_once('steps.php');
    ?>
    <?php require_once('../../templates/nav.php'); ?>
    <article id="oppgave-9">
        <header id="intro">
            <h1>Oppgave 9</h1>
            <p>Lag en nettside som spiller en "beat" som er basert på gjentakelser gjennom
            <code class="language-javascript">setInteval</code> og <code class="language-javascript">Math.random()</code>
            (om ønskelig). Benytt lydfiler av instrumenter som du finner på nett. Valgfritt: Utvid gjerne med grafikk
            som tegnes samtidig.</p>
        </header>
        <section id="result">
            <h2>Resultat</h2>
            <div class="space-v-small">
                <button id="start" class="btn success">Start</button>
                <button id="stop" class="btn alert">Stop</button>
            </div>
            <video id="o9-video" controls="false" autoplay>
                <source src="oppgave-9-materiale/20th.webm" type="video/webm">
                <source src="oppgave-9-materiale/20th.mp4" type="video/mp4">
            </video>
            <canvas id="o9-canvas" width="668" height="512"></canvas>
            <script>
                window.onload = ready;

                function ready() {
                    var punch,
                        hitmark,
                        horns;

                    // Skjul start og stopp
                    document.getElementById("start").style.display = "none";
                    document.getElementById("stop").style.display = "none";

                    // Build suspense
                        new Audio("oppgave-9-materiale/20th.mp3").play();

                    // More suspense
                    setTimeout(function() {
                        new Audio("oppgave-9-materiale/suspense7.wav").play();
                    }, 19000);

                    // Something spicey before we go, and then spice again every once in a while
                    setInterval(function() {
                        new Audio("oppgave-9-materiale/damn.mp3").play();
                    }, 25000);

                    // More spice
                    setTimeout(function() {
                        new Audio("oppgave-9-materiale/horns.mp3").play();
                        
                        makeArt("white");

                        setTimeout(function() {
                            makeArt("white");
                        }, 250);

                        setTimeout(function() {
                            makeArt("white");
                        }, 500);

                        setTimeout(function() {
                            makeArt("white");
                        }, 750);

                        setTimeout(function() {
                            makeArt("white");
                        }, 1000);

                        var shot = setInterval(function() {
                            new Audio("oppgave-9-materiale/shot.wav").play();

                            makeArt("#FF5254");
                            makeArt("#745cc4");
                            makeArt("#5CACC4");
                            makeArt("#8CD19D");
                            makeArt("#f4de7c");
                            makeArt("#FCB859");
                        }, 1500);

                        setTimeout(function() {
                            clearInterval(shot);
                        }, 6000);
                    }, 26000);

                    // Yasss
                    setTimeout(function() {
                        punch = setInterval(function() {
                            new Audio("oppgave-9-materiale/punch.mp3").play();
                            
                            makeArt("#5CACC4");
                        }, 1000);

                        hitmark = setInterval(function() {
                            new Audio("oppgave-9-materiale/hitmark.wav").play();

                            makeArt("#FF5254");
                        }, 250);

                        horns = setInterval(function() {
                            new Audio("oppgave-9-materiale/horns.mp3").play();

                            makeArt("white");

                            setTimeout(function() {
                                makeArt("white");
                            }, 250);

                            setTimeout(function() {
                                makeArt("white");
                            }, 500);

                            setTimeout(function() {
                                makeArt("white");
                            }, 750);

                            setTimeout(function() {
                                makeArt("white");
                            }, 1000);
                        }, 12000);

                        document.getElementById("stop").style.display = "inline-block"; // Vis stop

                        document.getElementById("stop").onclick = function() {
                            document.getElementById("start").style.display = "inline-block"; // Vis start når stop er blitt trykket på
                            clearInterval(punch);
                            clearInterval(hitmark);
                            clearInterval(horns);
                        }
                    }, 28000);

                    document.getElementById("start").onclick = function() {
                        ready();
                    }
                }

                var o9Canvas = document.getElementById("o9-canvas")
                    o9Ctx = o9Canvas.getContext("2d"),
                    o9Video = document.getElementById('o9-video'),
                    width = o9Canvas.width,
                    height = o9Canvas.height,
                    rotation = 0,
                    rectSize = 300;

                o9Video.addEventListener('play', function() {
                    var $this = this;

                    (function loop() {
                      if (!$this.paused && !$this.ended) {
                        o9Ctx.drawImage($this, 0, 0);
                        setTimeout(loop, 1000 / 24); // Sett fps til 24
                      }
                    })();
                });

                setTimeout(function() {
                    o9Video.style.display = "none";
                    o9Ctx.fillStyle = "black";
                    o9Ctx.fillRect(0, 0, width, height);
                }, 21000);

                function makeArt(color) {
                    o9Ctx.globalAlpha = 0.2;
                    o9Ctx.fillStyle = "black";
                    o9Ctx.fillRect(0, 0, width, height);
                    o9Ctx.save();

                    o9Ctx.globalAlpha = 1;
                    o9Ctx.strokeStyle = color;
                    o9Ctx.translate(width/2, height/2);
                    o9Ctx.rotate(rotation);
                    o9Ctx.lineWidth = 5;
                    o9Ctx.strokeRect(-(rectSize/2), -(rectSize/2), rectSize, rectSize);
                    o9Ctx.restore();
                    o9Ctx.save();

                    rotation += Math.PI/360+0.1;
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
    var punch,
        hitmark,
        horns;

    // Skjul start og stopp
    document.getElementById("start").style.display = "none";
    document.getElementById("stop").style.display = "none";

    // Build suspense
        new Audio("oppgave-9-materiale/20th.mp3").play();

    // More suspense
    setTimeout(function() {
        new Audio("oppgave-9-materiale/suspense7.wav").play();
    }, 19000);

    // Something spicey before we go, and then spice again every once in a while
    setInterval(function() {
        new Audio("oppgave-9-materiale/damn.mp3").play();
    }, 25000);

    // More spice
    setTimeout(function() {
        new Audio("oppgave-9-materiale/horns.mp3").play();
        
        makeArt("white");

        setTimeout(function() {
            makeArt("white");
        }, 250);

        setTimeout(function() {
            makeArt("white");
        }, 500);

        setTimeout(function() {
            makeArt("white");
        }, 750);

        setTimeout(function() {
            makeArt("white");
        }, 1000);

        var shot = setInterval(function() {
            new Audio("oppgave-9-materiale/shot.wav").play();

            makeArt("#FF5254");
            makeArt("#745cc4");
            makeArt("#5CACC4");
            makeArt("#8CD19D");
            makeArt("#f4de7c");
            makeArt("#FCB859");
        }, 1500);

        setTimeout(function() {
            clearInterval(shot);
        }, 6000);
    }, 26000);

    // Yasss
    setTimeout(function() {
        punch = setInterval(function() {
            new Audio("oppgave-9-materiale/punch.mp3").play();
            
            makeArt("#5CACC4");
        }, 1000);

        hitmark = setInterval(function() {
            new Audio("oppgave-9-materiale/hitmark.wav").play();

            makeArt("#FF5254");
        }, 250);

        horns = setInterval(function() {
            new Audio("oppgave-9-materiale/horns.mp3").play();

            makeArt("white");

            setTimeout(function() {
                makeArt("white");
            }, 250);

            setTimeout(function() {
                makeArt("white");
            }, 500);

            setTimeout(function() {
                makeArt("white");
            }, 750);

            setTimeout(function() {
                makeArt("white");
            }, 1000);
        }, 12000);

        document.getElementById("stop").style.display = "inline-block"; // Vis stop

        document.getElementById("stop").onclick = function() {
            document.getElementById("start").style.display = "inline-block"; // Vis start når stop er blitt trykket på
            clearInterval(punch);
            clearInterval(hitmark);
            clearInterval(horns);
        }
    }, 28000);

    document.getElementById("start").onclick = function() {
        ready();
    }
}

var o9Canvas = document.getElementById("o9-canvas")
    o9Ctx = o9Canvas.getContext("2d"),
    o9Video = document.getElementById('o9-video'),
    width = o9Canvas.width,
    height = o9Canvas.height,
    rotation = 0,
    rectSize = 300;

o9Video.addEventListener('play', function() {
    var $this = this;

    (function loop() {
      if (!$this.paused && !$this.ended) {
        o9Ctx.drawImage($this, 0, 0);
        setTimeout(loop, 1000 / 24); // Sett fps til 24
      }
    })();
});

setTimeout(function() {
    o9Video.style.display = "none";
    o9Ctx.fillStyle = "black";
    o9Ctx.fillRect(0, 0, width, height);
}, 21000);

function makeArt(color) {
    o9Ctx.globalAlpha = 0.2;
    o9Ctx.fillStyle = "black";
    o9Ctx.fillRect(0, 0, width, height);
    o9Ctx.save();

    o9Ctx.globalAlpha = 1;
    o9Ctx.strokeStyle = color;
    o9Ctx.translate(width/2, height/2);
    o9Ctx.rotate(rotation);
    o9Ctx.lineWidth = 5;
    o9Ctx.strokeRect(-(rectSize/2), -(rectSize/2), rectSize, rectSize);
    o9Ctx.restore();
    o9Ctx.save();

    rotation += Math.PI/360+0.1;
}
                </code>
            </pre>
            <h3>HTML</h3>
            <pre class="language-html">
                <code>
&lt;div class=&quot;space-v-small&quot;&gt;
    &lt;button id=&quot;start&quot; class=&quot;btn success&quot;&gt;Start&lt;/button&gt;
    &lt;button id=&quot;stop&quot; class=&quot;btn alert&quot;&gt;Stop&lt;/button&gt;
&lt;/div&gt;
&lt;video id=&quot;o9-video&quot; controls=&quot;false&quot; autoplay&gt;
    &lt;source src=&quot;oppgave-9-materiale/20th.webm&quot; type=&quot;video/webm&quot;&gt;
    &lt;source src=&quot;oppgave-9-materiale/20th.mp4&quot; type=&quot;video/mp4&quot;&gt;
&lt;/video&gt;
&lt;canvas id=&quot;o9-canvas&quot; width=&quot;668&quot; height=&quot;512&quot;&gt;&lt;/canvas&gt;
                </code>
            </pre>
        </section>
    </article>
    <?php require_once('../../templates/footer.php'); ?>
    <script src="/phpsite/js/prism/prism.js"></script>
    <link rel="stylesheet" href="/phpsite/css/prism/prism.css">
</body>
</html>