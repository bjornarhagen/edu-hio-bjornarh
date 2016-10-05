<?php require_once('../../../../templates/head.php'); ?>
    <link rel="stylesheet" href="/~bjornarh/css/steps.css">
    <link rel='stylesheet' href='/~bjornarh/fonts/hack/hack.css'>
    <style>
        textarea {
            width: 100%;
            max-width: 100%;
            font-family: "Hack";
        }
    </style>
</head>
<body>
    <?php
        $activeStep = 9;
        require_once('steps.php');
    ?>
    <?php require_once('../../../../templates/nav.php'); ?>
    <article>
        <header id="intro">
            <h1>Oppgave <?= $activeStep ?></h1>
            <p>Skriv ut alle tosifrede kombinasjoner av tallene 1,2,3,4 og 5, slik som 11, 12, 13, 14, 15, 21, 22 osv.
            (Tips: Nestede løkker). Prøv også med alle tresiftrede, firesifrede og femsifrede kombinasjoner.</p>
        </header>
        <section id="result">
            <h2>Resultat</h2>
            <h3>Tosifrede</h3>
            <textarea id="o9-output-2" rows="3" readonly></textarea>
            <h3>Tresifrede</h3>
            <textarea id="o9-output-3" rows="10" readonly></textarea>
            <h3>Firesifrede</h3>
            <textarea id="o9-output-4" rows="15" readonly></textarea>
            <h3>Femsifrede</h3>
            <textarea id="o9-output-5" rows="20" readonly></textarea>
            <p id=""></p>
            <script>
                window.onload = ready;

                function ready() {
                    // Kjør gjennom alle outputs paragrafene, og skriv ut alle mulig tall kombinasjoner.
                    for (var i = 2; i <= 5; i++) {
                        document.getElementById("o9-output-" + i).value = getAllCombos(5, i, "").slice(0, -2);
                    }
                }

                function getAllCombos(maxNumb, loops, prevNumb) {
                    var tmp = ""; // Variabl til å midlertidig lagre i

                    for (var i = 1; i <= maxNumb; i++) {
                        if (loops > 1) { // Hvis det er mer enn en loop igjen
                            tmp += getAllCombos(maxNumb, loops - 1, prevNumb + i); // Hent alle kombinasjoner
                        } else {
                            tmp += prevNumb + String(i) + ", ";
                        }
                    }

                    return tmp
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