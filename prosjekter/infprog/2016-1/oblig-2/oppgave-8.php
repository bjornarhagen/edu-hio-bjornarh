<?php require_once('../../../../templates/head.php'); ?>
    <link rel="stylesheet" href="/~bjornarh/css/steps.css">
    <link rel='stylesheet' href='/~bjornarh/fonts/hack/hack.css'>
</head>
<body>
    <?php
        $activeStep = 8;
        require_once('steps.php');
    ?>
    <?php require_once('../../../../templates/nav.php'); ?>
    <article>
        <header id="intro">
            <h1>Oppgave 8</h1>
        </header>
        <section id="result">
            <h2>Resultat</h2>
            <div class="row input-field">
                <label for="o8-amount" class="col s1"><i class="icon-money"></i></label>
                <input type="number" id="o8-amount" class="col s11" placeholder="Pengebeløp" value="10000">
            </div>
            <div class="row input-field">
                <label for="o8-years" class="col s1"><i class="icon-calendar-2"></i></label>
                <input type="number" id="o8-years" class="col s11" placeholder="Antall år" value="10">
            </div>
            <div class="row input-field">
                <label for="o8-interest" class="col s1"><i class="icon-percent-up"></i></label>
                <input type="number" id="o8-interest" class="col s11" placeholder="Rente" value="0.5">
            </div>
            <div class="row input-field center">
                <button id="o8-calculate" class="btn black">Regn ut</button>
            </div>
            <div class="row input-field">
                <textarea id="o8-output" rows="10" readonly></textarea>
            </div>
            <script>
                window.onload = ready;

                function ready() {
                    document.getElementById("o8-calculate").onclick = calculate;
                    document.getElementById("o8-calculate").click();
                }

                function calculate() {
                    console.log("asdf");
                    var amount = document.getElementById("o8-amount").value;
                    var years = document.getElementById("o8-years").value;
                    var interest = document.getElementById("o8-interest").value;
                    var output = document.getElementById("o8-output");

                    for (var i = 0; i < years; i++) {
                        var outputAmount = Math.floor(amount*(interest/100));
                        amount = outputAmount;

                        output.value += "Penger i banken: " + outputAmount + "\n";
                    }
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