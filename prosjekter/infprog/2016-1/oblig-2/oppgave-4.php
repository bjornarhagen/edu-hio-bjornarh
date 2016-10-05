<?php require_once('../../../../templates/head.php'); ?>
    <link rel="stylesheet" href="/~bjornarh/css/steps.css">
    <link rel='stylesheet' href='/~bjornarh/fonts/hack/hack.css'>
    <link href="https://fonts.googleapis.com/css?family=Lobster">
    <style>
        #steps {
            z-index: 3;
        }

        #steps li {
            opacity: 1;
        }

        #steps li a {
            color: #000;
            text-shadow: 0 0 1px #fff;
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
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        #scene-inner-wrapper {
            position: relative;
        }

        #scene-chooser {
            position: absolute;
            bottom: 50px;
            left: 0;
            right: 0;
            display: block;
            margin: 0 auto;
            width: 100%;
            max-width: 800px;
        }

        #scene-chooser div:hover {
            cursor: pointer;
        }

        #scene-push {
            position: relative;
            width: 100%;
            height: 100%;
            z-index: 1;
        }

        #msg {
            font-family: 'Hackregular', monospace;
            font-size: 6em;
            font-weight: 400;
            font-style: normal;
            text-shadow: 0 0 1px #000;
        }

        #msg span {
            font-family: 'Lobster', cursive;
        }

        #msg i {
            vertical-align: middle;
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
            <h1 id="msg" class="center-v-h center-align no-margin"></h1>
            <div id="scene-chooser" class="row center-align font-small">
                <div data-hour="5" class="col s3"><i class="icon-sun"></i></div>
                <div data-hour="13" class="col s3"><i class="icon-sun-cloud"></i></div>
                <div data-hour="18" class="col s3"><i class="icon-waning-crescent-moon"></i></div>
                <div data-hour="23" class="col s3"><i class="icon-full-moon"></i></div>
            </div>
        </div>
    </div>
    <div id="scene-push"></div>
    <div class="space-v-small"></div>
    <?php require_once('../../../../templates/nav.php'); ?>
    <article>
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
window.onload = ready;

function ready() {
    var currentHour = new Date().getHours();
    setScene(currentHour);

    // For hver child i scene-chooser skal kjøre setScene
    for (var i = 0; i &lt; document.getElementById(&quot;scene-chooser&quot;).children.length; i++) {
        document.getElementById(&quot;scene-chooser&quot;).children[i].onclick = function() {
            setScene(this.getAttribute(&quot;data-hour&quot;));
        }
    }
}

function setScene(hour) {
    var scene = document.getElementById(&quot;scene&quot;);

    if (hour &lt;= 12 && hour &gt;= 5) {                       // Fra og med 5 til og med 12
        morning();
    } else if (hour &gt; 12 && hour &lt; 18) {                 // Fra 12 til 18
        afternoon();
    } else if (hour &gt;= 18 && hour &lt; 23) {                // Fra og med 18 til 23
        evening();
    } else if ((hour &gt;= 23 && hour &lt;= 24) || hour &lt; 5) { // Fra og med 23 til og med 24, og før 5.
        night();
    } else {                                             // Tid som ikke finnes...
        magic();
    }

    function morning() {
        scene.style.color = &quot;white&quot;;
        scene.style.backgroundColor = &quot;lightyellow&quot;;
        scene.style.backgroundImage = &quot;url('oppgave-4-materiale/morning.jpg')&quot;
        setMessage(&quot;God morgen &lt;i class='icon-sun'&gt;&lt;/i&gt;&quot;);
    }

    function afternoon() {
        scene.style.color = &quot;white&quot;;
        scene.style.backgroundColor = &quot;lightblue&quot;;
        scene.style.backgroundImage = &quot;url('oppgave-4-materiale/afternoon.jpg')&quot;
        setMessage(&quot;God ettermiddag &lt;i class='icon-sun-cloud'&gt;&lt;/i&gt;&quot;);
    }

    function evening() {
        scene.style.color = &quot;white&quot;;
        scene.style.backgroundColor = &quot;grey&quot;;
        scene.style.backgroundImage = &quot;url('oppgave-4-materiale/evening.jpg')&quot;
        setMessage(&quot;God kveld &lt;i class='icon-waning-crescent-moon'&gt;&lt;/i&gt;&quot;);
    }

    function night() {
        scene.style.color = &quot;white&quot;;
        scene.style.backgroundColor = &quot;black&quot;;
        scene.style.backgroundImage = &quot;url('oppgave-4-materiale/night.jpg')&quot;
        setMessage(&quot;God natt &lt;i class='icon-full-moon'&gt;&lt;/i&gt;&quot;);
    }

    function magic() {
        scene.style.color = &quot;white&quot;;
        scene.style.backgroundImage = &quot;linear-gradient(135deg, #FF5254, #745cc4, #5CACC4, #8CD19D, #f4de7c, #FCB859)&quot;;
        setMessage(&quot;Wait what &lt;i class='icon-pacman'&gt;&lt;/i&gt;&quot;);
    }

    return true;
}

function setMessage(msg) {
    document.getElementById(&quot;msg&quot;).innerHTML = msg;
}
                </code>
            </pre>
            <h3>HTML</h3>
            <pre class="language-html">
                <code>
&lt;div id=&quot;scene&quot; class=&quot;space-a-small&quot;&gt;
    &lt;div id=&quot;scene-inner-wrapper&quot;&gt;
        &lt;h1 id=&quot;msg&quot; class=&quot;center-v-h center-align no-margin&quot;&gt;&lt;/h1&gt;
        &lt;div id=&quot;scene-chooser&quot; class=&quot;row center-align font-small&quot;&gt;
            &lt;div data-hour=&quot;5&quot; class=&quot;col s3&quot;&gt;&lt;i class=&quot;icon-sun&quot;&gt;&lt;/i&gt;&lt;/div&gt;
            &lt;div data-hour=&quot;13&quot; class=&quot;col s3&quot;&gt;&lt;i class=&quot;icon-sun-cloud&quot;&gt;&lt;/i&gt;&lt;/div&gt;
            &lt;div data-hour=&quot;18&quot; class=&quot;col s3&quot;&gt;&lt;i class=&quot;icon-waning-crescent-moon&quot;&gt;&lt;/i&gt;&lt;/div&gt;
            &lt;div data-hour=&quot;23&quot; class=&quot;col s3&quot;&gt;&lt;i class=&quot;icon-full-moon&quot;&gt;&lt;/i&gt;&lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;
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

            // For hver child i scene-chooser skal kjøre setScene
            for (var i = 0; i < document.getElementById("scene-chooser").children.length; i++) {
                document.getElementById("scene-chooser").children[i].onclick = function() {
                    setScene(this.getAttribute("data-hour"));
                }
            }
        }

        function setScene(hour) {
            var scene = document.getElementById("scene");

            if (hour <= 12 && hour >= 5) {                       // Fra og med 5 til og med 12
                morning();
            } else if (hour > 12 && hour < 18) {                 // Fra 12 til 18
                afternoon();
            } else if (hour >= 18 && hour < 23) {                // Fra og med 18 til 23
                evening();
            } else if ((hour >= 23 && hour <= 24) || hour < 5) { // Fra og med 23 til og med 24, og før 5.
                night();
            } else {                                             // Tid som ikke finnes...
                magic();
            }

            function morning() {
                scene.style.color = "white";
                scene.style.backgroundColor = "lightyellow";
                scene.style.backgroundImage = "url('oppgave-4-materiale/morning.jpg')"
                setMessage("<span>God morgen</span><i class='icon-sun'></i>");
            }

            function afternoon() {
                scene.style.color = "white";
                scene.style.backgroundColor = "lightblue";
                scene.style.backgroundImage = "url('oppgave-4-materiale/afternoon.jpg')"
                setMessage("<span>God ettermiddag</span><i class='icon-sun-cloud'></i>");
            }

            function evening() {
                scene.style.color = "white";
                scene.style.backgroundColor = "grey";
                scene.style.backgroundImage = "url('oppgave-4-materiale/evening.jpg')"
                setMessage("<span>God kveld</span><i class='icon-waning-crescent-moon'></i>");
            }

            function night() {
                scene.style.color = "white";
                scene.style.backgroundColor = "black";
                scene.style.backgroundImage = "url('oppgave-4-materiale/night.jpg')"
                setMessage("<span>God natt</span><i class='icon-full-moon'></i>");
            }

            function magic() {
                scene.style.color = "white";
                scene.style.backgroundImage = "linear-gradient(135deg, #FF5254, #745cc4, #5CACC4, #8CD19D, #f4de7c, #FCB859)";
                setMessage("<span>Wait what</span><i class='icon-pacman'></i>");
            }

            return true;
        }

        function setMessage(msg) {
            document.getElementById("msg").innerHTML = msg;
        }
    </script>
    <script src="/~bjornarh/js/prism/prism.js"></script>
    <link rel="stylesheet" href="/~bjornarh/css/prism/prism.css">
</body>
</html>