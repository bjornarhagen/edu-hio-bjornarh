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
                <input type="number" id="o8-amount" class="col s11" placeholder="Pengebeløp">
            </div>
            <div class="row input-field">
                <label for="o8-years" class="col s1"><i class="icon-calendar-2"></i></label>
                <input type="number" id="o8-years" class="col s11" placeholder="Antall år">
            </div>
            <div class="row input-field">
                <label for="o8-interest" class="col s1"><i class="icon-percent-up"></i></label>
                <input type="number" id="o8-interest" class="col s11" placeholder="Rente">
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
                }

                function calculate() {
                    var amount = parseInt(document.getElementById("o8-amount").value);
                    var years = parseInt(document.getElementById("o8-years").value);
                    var interest = parseFloat(document.getElementById("o8-interest").value);
                    var output = document.getElementById("o8-output");

                    output.value = "";

                    for (var i = 0; i < years; i++) {
                        amount += (amount*interest)/100;
                        output.value += "Penger i banken etter " + (i+1) + " år: " + amount.toFixed(2) + "\n"; // Output med 2 des
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