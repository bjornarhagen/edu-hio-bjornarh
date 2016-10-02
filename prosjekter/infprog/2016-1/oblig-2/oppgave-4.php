<?php require_once('../../../../templates/head.php'); ?>
    <link rel="stylesheet" href="/~bjornarh/css/steps.css">
    <link rel='stylesheet' href='/~bjornarh/fonts/hack/hack.css'>
    <style>
        #steps {
            z-index: 3;
        }

        #steps li a {
            color: #000;
        }

        #scene,
        #scene-inner-wrapper {
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        #scene {
            position: absolute;
            z-index: 2;
        }

        #scene-inner-wrapper {
            position: relative;
        }

        #slider {
            position: absolute;
            bottom: 100px;
            left: 0;
            right: 0;
            display: block;
            margin: 0 auto;
            width: 75%;
        }

        #scene-push {
            position: relative;
            width: 100%;
            height: 100%;
            z-index: 1;
        }
    </style>
</head>
<body>
    <?php
        $activeStep = 4;
        require_once('steps.php');
    ?>
    <div id="scene" class="space-a-small">
        <div id="scene-inner-wrapper">
            <h1 id="msg" class="center-v-h center-align font-huge no-margin"></h1>
            <input id="slider" type="range" min="0" max="24" value="0">
        </div>
    </div>
    <div id="scene-push"></div>
    <div class="space-v-small"></div>
    <?php require_once('../../../../templates/nav.php'); ?>
    <article id="oppgave-1">
        <header id="intro">
            <h1>Oppgave 4</h1>
            <p>Følgende kodebit gir deg en variabel som inneholder hvilken time i døgenet det er (0-23):</p>
            <p>
                <code class="language-javascript">var tid = new Date();</code>
                <code class="language-javascript">var timer = tid.getHours();</code>
            </p>
            <p>Lag en nettside som reflekterer hvilken tid på døgnet det er. Dette kan for eksempel være meldinger slik
            som "God morgen", "God ettermiddag", grafikk og bakgrunnsfarge. For de som ønsker litt mer utfordring kan
            det også tas høyde for om det er mørkt/lyst ute basert på dato.</p>
        </header>
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
    <script>
        window.onload = ready;

        function ready() {
            var currentHour = new Date().getHours();
            setScene(currentHour);

            document.getElementById("slider").value = currentHour;
            document.getElementById("slider").oninput = function() {
                setScene(this.value);
            }
        }

        function setScene(hour) {
            var scene = document.getElementById("scene");

            console.log(hour);

            if (hour < 12 && hour < 5) {
                morning();
            } else if (hour < 18) {
                afternoon();
            } else if (hour < 21) {
                evening();
            } else if (hour < 24 && hour > 5) {
                night();
            }

            function morning() {
                scene.style.color = "black";
                scene.style.backgroundColor = "lightyellow";
                setMessage("God morgen <i class='icon-sun'></i>");
            }

            function afternoon() {
                scene.style.color = "white";
                scene.style.backgroundColor = "lightblue";
                setMessage("God ettermiddag <i class='icon-sun-cloud'></i>");
            }

            function evening() {
                scene.style.color = "white";
                scene.style.backgroundColor = "grey";
                setMessage("God kveld <i class='icon-waning-crescent-moon'></i>");
            }

            function night() {
                scene.style.color = "white";
                scene.style.backgroundColor = "black";
                setMessage("God natt <i class='icon-full-moon'></i>");
            }
        }

        function setMessage(msg) {
            document.getElementById("msg").innerHTML = msg;
        }
    </script>
    <script src="/~bjornarh/js/prism/prism.js"></script>
    <link rel="stylesheet" href="/~bjornarh/css/prism/prism.css">
</body>
</html>