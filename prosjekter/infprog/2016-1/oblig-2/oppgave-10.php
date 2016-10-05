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
            <div id="o10-inputs">
                <div class="row input-field">
                    <label for="numb1" class="col s6">Tall 1:</label>
                    <label for="numb2" class="col s6">Tall 2:</label>
                </div>
                <div class="row input-field">
                    <input id="numb1" type="number" class="col s6" value="4" min="1">
                    <input id="numb2" type="number" class="col s6" value="20" min="1">
                </div>
                <div class="row input-field">
                    <label for="numb1" class="col s6">Farge 1:</label>
                    <label for="numb2" class="col s6">Farge 2:</label>
                </div>
                <div class="row">
                    <input id="color1" class="col s6" type="color" value="#55bb6e">
                    <input id="color2" class="col s6" type="color" value="#FF5254">
                </div>
            </div>
            <div class="space-v-small"></div>
            <div class="space-a-medium center-align black-bg">
                <canvas id="canvas" width="500" height="500"></canvas>
            </div>
            <button id="followme" class="btn alert">Trykk meg!</button>
            <script>
                window.onload = ready;

                function ready() {
                    var numb1 = document.getElementById("numb1");
                    var numb2 = document.getElementById("numb2");
                    var color1 = document.getElementById("color1");
                    var color2 = document.getElementById("color2");
                    drawFigure(numb1.value, numb2.value, color1.value, color2.value, 0);

                    var inputs = document.getElementById("o10-inputs");
                    inputs = inputs.getElementsByTagName('input');

                    for (var i = 0; i < inputs.length; i++) {
                        inputs[i].onchange = function() {
                            drawFigure(numb1.value, numb2.value, color1.value, color2.value, 0);
                        }
                    }
                    
                    document.getElementById("followme").onclick = followMe;
                }

                function drawFigure(val1, val2, col1, col2, follow) {
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
                                ctx.strokeStyle = col2;

                                // Annenhver gang
                                if (bunnPunkt%2===0) {
                                    ctx.strokeStyle = col1;
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
                                ctx.strokeStyle = col2;

                                if (toppPunkt%2===0) {
                                    ctx.strokeStyle = col1;
                                }

                                ctx.stroke();
                            }

                            for (var bunnPunkt = 0; bunnPunkt <= val2; bunnPunkt++) {
                                ctx.beginPath();
                                ctx.moveTo(bunnPunkt*width/val2, height);
                                ctx.lineTo(e.offsetX, e.offsetY);
                                ctx.lineWidth = "1";
                                ctx.strokeStyle = col2;

                                if (bunnPunkt%2===0) {
                                    ctx.strokeStyle = col1;
                                }

                                ctx.stroke();
                            }
                        });
                    }
                }

                function followMe() {
                    canvas.style.cursor = "none";
                    drawFigure(numb1.value, numb2.value, color1.value, color2.value, arguments[0].target);
                    arguments[0].target.innerHTML = "Beveg musepekern rundt over figuren!";
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
    var numb1 = document.getElementById(&quot;numb1&quot;);
    var numb2 = document.getElementById(&quot;numb2&quot;);
    var color1 = document.getElementById(&quot;color1&quot;);
    var color2 = document.getElementById(&quot;color2&quot;);
    drawFigure(numb1.value, numb2.value, color1.value, color2.value, 0);

    var inputs = document.getElementById(&quot;o10-inputs&quot;);
    inputs = inputs.getElementsByTagName('input');

    for (var i = 0; i &lt; inputs.length; i++) {
        inputs[i].onchange = function() {
            drawFigure(numb1.value, numb2.value, color1.value, color2.value, 0);
        }
    }
    
    document.getElementById(&quot;followme&quot;).onclick = followMe;
}

function drawFigure(val1, val2, col1, col2, follow) {
    var canvas = document.getElementById(&quot;canvas&quot;);
    var width = canvas.width;
    var height = canvas.height;
    var ctx = canvas.getContext(&quot;2d&quot;);

    ctx.clearRect(0, 0, canvas.width, canvas.height);

    if (follow === 0) {
        ctx.globalAlpha = 1;
        for (var toppPunkt = 0; toppPunkt &lt;= val1; toppPunkt++) {
            for (var bunnPunkt = 0; bunnPunkt &lt;= val2; bunnPunkt++) {
                ctx.beginPath();
                ctx.moveTo(toppPunkt*width/val1, 0);        // Sett start kordinater
                ctx.lineTo(bunnPunkt*width/val2, height);   // Slutt kordinater
                ctx.lineWidth = &quot;1&quot;;
                ctx.strokeStyle = col2;

                // Annenhver gang
                if (bunnPunkt%2===0) {
                    ctx.strokeStyle = col1;
                }

                ctx.stroke();
            }
        }
    } else {
        // Eventen vil stackes... ikke akkurat ønskbart, meeeeen ja :/
        // Håp at bruker ikke spammer knappen I guess?
        canvas.addEventListener(&quot;mousemove&quot;, function(e) {
            ctx.clearRect(0, 0, canvas.width, canvas.height);

            for (var toppPunkt = 0; toppPunkt &lt;= val1; toppPunkt++) {
                ctx.beginPath();
                ctx.moveTo(toppPunkt*width/val1, 0);
                ctx.lineTo(e.offsetX, e.offsetY);
                ctx.lineWidth = &quot;1&quot;;
                ctx.strokeStyle = col2;

                if (toppPunkt%2===0) {
                    ctx.strokeStyle = col1;
                }

                ctx.stroke();
            }

            for (var bunnPunkt = 0; bunnPunkt &lt;= val2; bunnPunkt++) {
                ctx.beginPath();
                ctx.moveTo(bunnPunkt*width/val2, height);
                ctx.lineTo(e.offsetX, e.offsetY);
                ctx.lineWidth = &quot;1&quot;;
                ctx.strokeStyle = col2;

                if (bunnPunkt%2===0) {
                    ctx.strokeStyle = col1;
                }

                ctx.stroke();
            }
        });
    }
}

function followMe() {
    canvas.style.cursor = &quot;none&quot;;
    drawFigure(numb1.value, numb2.value, color1.value, color2.value, arguments[0].target);
    arguments[0].target.innerHTML = &quot;Beveg musepekern rundt over figuren!&quot;;
}
                </code>
            </pre>
            <h3>HTML</h3>
            <pre class="language-html">
                <code>
&lt;div id=&quot;o10-inputs&quot;&gt;
    &lt;div class=&quot;row input-field&quot;&gt;
        &lt;label for=&quot;numb1&quot; class=&quot;col s6&quot;&gt;Tall 1:&lt;/label&gt;
        &lt;label for=&quot;numb2&quot; class=&quot;col s6&quot;&gt;Tall 2:&lt;/label&gt;
    &lt;/div&gt;
    &lt;div class=&quot;row input-field&quot;&gt;
        &lt;input id=&quot;numb1&quot; type=&quot;number&quot; class=&quot;col s6&quot; value=&quot;4&quot; min=&quot;1&quot;&gt;
        &lt;input id=&quot;numb2&quot; type=&quot;number&quot; class=&quot;col s6&quot; value=&quot;20&quot; min=&quot;1&quot;&gt;
    &lt;/div&gt;
    &lt;div class=&quot;row input-field&quot;&gt;
        &lt;label for=&quot;numb1&quot; class=&quot;col s6&quot;&gt;Farge 1:&lt;/label&gt;
        &lt;label for=&quot;numb2&quot; class=&quot;col s6&quot;&gt;Farge 2:&lt;/label&gt;
    &lt;/div&gt;
    &lt;div class=&quot;row&quot;&gt;
        &lt;input id=&quot;color1&quot; class=&quot;col s6&quot; type=&quot;color&quot; value=&quot;#55bb6e&quot;&gt;
        &lt;input id=&quot;color2&quot; class=&quot;col s6&quot; type=&quot;color&quot; value=&quot;#FF5254&quot;&gt;
    &lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;space-v-small&quot;&gt;&lt;/div&gt;
&lt;div class=&quot;space-a-medium center-align black-bg&quot;&gt;
    &lt;canvas id=&quot;canvas&quot; width=&quot;500&quot; height=&quot;500&quot;&gt;&lt;/canvas&gt;
&lt;/div&gt;
&lt;button id=&quot;followme&quot; class=&quot;btn alert&quot;&gt;Trykk meg!&lt;/button&gt;
                </code>
            </pre>
        </section>
    </article>
    <?php require_once('../../../../templates/footer.php'); ?>
    <script src="/~bjornarh/js/prism/prism.js"></script>
    <link rel="stylesheet" href="/~bjornarh/css/prism/prism.css">
</body>
</html>