<?php require_once('../../../../templates/head.php'); ?>
    <link rel="stylesheet" href="/phpsite/css/steps.css">
    <link rel='stylesheet' href='/phpsite/fonts/hack/hack.css'>
    <style>
        body {
            padding-top: 0;
        }

        #nav-main {
            margin-top: 50px;
        }

        #o6-output {
            text-align: center;
        }

        #o6-output img {
            width: 32px;
            margin: 25px 0;
            height: auto;
        }
    </style>
</head>
<body>
    <?php
        $activeStep = 6;
        require_once('steps.php');
    ?>
    <div class="space-h-medium space-v-large bg-image" style="background-image: url(oppgave-6-materiale/bg.jpg);">
        <div id="o6-output" class="space-v-large"></div>
    </div>
    <?php require_once('../../../../templates/nav.php'); ?>
    <article>
        <header id="intro">
            <h1>Oppgave <?= $activeStep; ?>A</h1>
        </header>
        <section id="result">
            <h2>Resultat</h2>
            <p> Dere skal lage en "kidnappingsbrevgenerator". Brukeren skal kunne skrive inn en tekst og generere et
            kidnappingsbrev av denne teksten. Det er da her tenkt att dere skal erstatte bokstaven i teksten med ett
            bilde av den samme bokstaven</p>
            <div class="row input-field">
                <textarea id="o6-input" rows="5" autofocus>Oppgave 6A</textarea>
            </div>
        </section>
        <script>
            window.onload = ready;

            function ready() {
                var input = document.getElementById("o6-input");
                var output = document.getElementById("o6-output");
                var interval = null;
                input.addEventListener("input", function() {
                    if (interval !== null) {
                        clearTimeout(interval);
                    }

                    interval = setTimeout(function () {
                        showText(input.value, output);
                    }, 150); // En liten delay så vi ikke spammer fuksjonen
                });

                showText(input.value, output); // Kjør på oppstart
            }

            // Gjør om teksten til bilder, og legger de i output.
            function showText(content, outputElement) {
                var tmpHTML = "";

                // Tar alle karakterer i teksten og putter de i array
                content.split("").forEach(function(char) {
                    if (char.match(/[^\ws]/gi)) {
                        switch(char) {
                            case " ":
                                char = "space";
                                break;
                            case "\n":
                                tmpHTML += "<br>";
                                return;
                            case "æ":
                                char = "ae";
                                break;
                            case "ø":
                                char = "oe";
                                break;
                            case "å":
                                char = "aa";
                                break;
                            case ".":
                                char = "dot";
                                break;
                            case ",":
                                char = "comma";
                                break;
                            case ":":
                                char = "colon";
                                break;
                            case "#":
                                char = "hash";
                                break;
                            case "!":
                                char = "exclamation";
                                break;
                            case "?":
                                char = "question";
                                break;
                            case "-":
                                char = "dash";
                                break;
                            case "_":
                                char = "underscore";
                                break;
                            case "*":
                                char = "star";
                                break;
                            case "(":
                                char = "parentheses_open";
                                break;
                            case ")":
                                char = "parentheses_close";
                                break;
                            case "[":
                                char = "bracket_open";
                                break;
                            case "]":
                                char = "bracket_close";
                                break;
                            case "{":
                                char = "curly_bracket_open";
                                break;
                            case "}":
                                char = "curly_bracket_close";
                                break;
                            case "\"":
                                char = "quote_open";
                                break;
                            case "\'":
                                char = "quote_open";
                                break;
                            default:
                                char = "not-supported";
                                break;
                        }
                    }

                    tmpHTML += "<img src=\"oppgave-6-materiale/" + char.toLowerCase() + ".jpg\">";
                });

                outputElement.innerHTML = tmpHTML;
            }
        </script>
        <section id="code">
            <h2>Koden</h2>
            <h3>JavaScript</h3>
            <pre class="language-javascript">
                <code>
window.onload = ready;

function ready() {
    var input = document.getElementById(&quot;o6-input&quot;);
    var output = document.getElementById(&quot;o6-output&quot;);
    var interval = null;
    input.addEventListener(&quot;input&quot;, function() {
        if (interval !== null) {
            clearTimeout(interval);
        }

        interval = setTimeout(function () {
            showText(input.value, output);
        }, 150); // En liten delay så vi ikke spammer fuksjonen
    });

    showText(input.value, output); // Kjør på oppstart
}

// Gjør om teksten til bilder, og legger de i output.
function showText(content, outputElement) {
    var tmpHTML = &quot;&quot;;

    // Tar alle karakterer i teksten og putter de i array
    content.split(&quot;&quot;).forEach(function(char) {
        if (char.match(/[^\ws]/gi)) {
            switch(char) {
                case &quot; &quot;:
                    char = &quot;space&quot;;
                    break;
                case &quot;\n&quot;:
                    tmpHTML += &quot;&lt;br&gt;&quot;;
                    return;
                case &quot;æ&quot;:
                    char = &quot;ae&quot;;
                    break;
                case &quot;ø&quot;:
                    char = &quot;oe&quot;;
                    break;
                case &quot;å&quot;:
                    char = &quot;aa&quot;;
                    break;
                case &quot;.&quot;:
                    char = &quot;dot&quot;;
                    break;
                case &quot;,&quot;:
                    char = &quot;comma&quot;;
                    break;
                case &quot;:&quot;:
                    char = &quot;colon&quot;;
                    break;
                case &quot;#&quot;:
                    char = &quot;hash&quot;;
                    break;
                case &quot;!&quot;:
                    char = &quot;exclamation&quot;;
                    break;
                case &quot;?&quot;:
                    char = &quot;question&quot;;
                    break;
                case &quot;-&quot;:
                    char = &quot;dash&quot;;
                    break;
                case &quot;_&quot;:
                    char = &quot;underscore&quot;;
                    break;
                case &quot;*&quot;:
                    char = &quot;star&quot;;
                    break;
                case &quot;(&quot;:
                    char = &quot;parentheses_open&quot;;
                    break;
                case &quot;)&quot;:
                    char = &quot;parentheses_close&quot;;
                    break;
                case &quot;[&quot;:
                    char = &quot;bracket_open&quot;;
                    break;
                case &quot;]&quot;:
                    char = &quot;bracket_close&quot;;
                    break;
                case &quot;{&quot;:
                    char = &quot;curly_bracket_open&quot;;
                    break;
                case &quot;}&quot;:
                    char = &quot;curly_bracket_close&quot;;
                    break;
                case &quot;\&quot;&quot;:
                    char = &quot;quote_open&quot;;
                    break;
                case &quot;\'&quot;:
                    char = &quot;quote_open&quot;;
                    break;
                default:
                    char = &quot;not-supported&quot;;
                    break;
            }
        }

        tmpHTML += &quot;&lt;img src=\&quot;oppgave-6-materiale/&quot; + char + &quot;.jpg\&quot;&gt;&quot;;
    });

    outputElement.innerHTML = tmpHTML;
}
                </code>
            </pre>
            <h3>HTML</h3>
            <pre class="language-html">
                <code>
&lt;div class=&quot;bg-image&quot; style=&quot;background-image: url(bg.jpg);&quot;&gt;
    &lt;div id=&quot;o6-output&quot; class=&quot;space-v-large&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;row input-field&quot;&gt;
    &lt;textarea id=&quot;o6-input&quot; rows=&quot;5&quot; autofocus&gt;Oppgave 6A&lt;/textarea&gt;
&lt;/div&gt;
                </code>
            </pre>
        </section>
    </article>
    <?php require_once('../../../../templates/footer.php'); ?>
    <script src="/phpsite/js/prism/prism.js"></script>
    <link rel="stylesheet" href="/phpsite/css/prism/prism.css">
</body>
</html>