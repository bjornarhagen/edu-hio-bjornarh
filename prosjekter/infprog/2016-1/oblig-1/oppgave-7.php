<?php require_once('../../../../templates/head.php'); ?>
    <link rel="stylesheet" href="/~bjornarh/css/steps.css">
</head>
<body>
    <?php
        $activeStep = 7;
        require_once('steps.php');
    ?>
    <?php require_once('../../../../templates/nav.php'); ?>
    <article id="oppgave-7">
        <header id="intro">
            <h1>Oppgave 7</h1>
            <p>Lag en kalkulator som utfører beregninger basert på selvvalgt brukerdata (ikke BMI som er benyttet som
            eksempel i kurset). Kalkulatoren skal minst inneholde en tekstboks og en nedtrekksliste. Tips: I
            nedtrekkslisten har du satt tallverdier som "value". Disse benyttes som en del av beregningen.</p>
        </header>
        <section id="result">
            <h2>Resultat</h2>
            <div class="row">
                <div class="input-field col s12 m6">
                    <input id="o7-input" type="number" placeholder="Skriv et tall, f.eks: 100">
                </div>
                <div class="input-field col s12 m6">
                    <select id="o7-unit">
                        <option value="mm">Millimeter</option>
                        <option value="cm">Centimeter</option>
                        <option value="m" selected>Meter</option>
                        <option value="km">Kilometer</option>
                        <option value="mil">Mil</option>
                    </select>
                </div>
                <div class="s12 row">
                    <div class="input-field s12">
                        <input type="text" id="o7-output-mm" class="col s7" disabled>
                        <label class="col s4 right" for="o7-output-mm">Millimeter</label>
                    </div>
                    <div class="input-field s12">
                        <input type="text" id="o7-output-cm" class="col s7" disabled>
                        <label class="col s4 right" for="o7-output-cm">Centimeter</label>
                    </div>
                    <div class="input-field s12">
                        <input type="text" id="o7-output-m" class="col s7" disabled>
                        <label class="col s4 right" for="o7-output-m">Meter</label>
                    </div>
                    <div class="input-field s12">
                        <input type="text" id="o7-output-km" class="col s7" disabled>
                        <label class="col s4 right" for="o7-output-km">Kilometer</label>
                    </div>
                    <div class="input-field s12">
                        <input type="text" id="o7-output-mil" class="col s7" disabled>
                        <label class="col s4 right" for="o7-output-mil">Mil</label>
                    </div>
                </div>
            </div>
            <script>
                window.onload = ready;

                function ready() {
                    document.getElementById("o7-input").onkeyup = calculate; // Gjør utregning når bruker skriver inn noe
                    document.getElementById("o7-unit").onchange = calculate; // Gjør utregning når bruker skifter måleenhet.
                }

                function calculate() {
                    var outputs;
                    // Ready...
                    // Get set...
                    switch (document.getElementById("o7-unit").value) {
                        // Go!
                        case "mm":
                            outputs = {mm: 1, cm: 0.1, m: 0.001, km: 0.000001, mil: 0.0000001};
                            break
                        case "cm":
                            outputs = {mm: 10, cm: 1, m: 0.01, km: 0.00001, mil: 0.000001};
                            break
                        case "m":
                            outputs = {mm: 1000, cm: 100, m: 1, km: 0.001, mil: 0.0001};
                            break
                        case "km":
                            outputs = {mm: 1000000, cm: 100000, m: 1000, km: 1, mil: 0.1};
                            break
                        case "mil":
                            outputs = {mm: 100000000, cm: 10000000, m: 100000, km: 0.1, mil: 1};
                            break
                        default:
                            alert("Du må velg en enhet");
                            break
                    }

                    // Loop gjennom objektet
                    for (var key in outputs) {
                        if (outputs.hasOwnProperty(key)) {
                            // Sett hver output
                            document.getElementById("o7-output-" + key).value = document.getElementById("o7-input").value * outputs[key];
                        }
                    }
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
    document.getElementById("o7-input").onkeyup = calculate; // Gjør utregning når bruker skriver inn noe
    document.getElementById("o7-unit").onchange = calculate; // Gjør utregning når bruker skifter måleenhet.
}

function calculate() {
    var outputs;
    // Ready...
    // Get set...
    switch (document.getElementById("o7-unit").value) {
        // Go!
        case "mm":
            outputs = {mm: 1, cm: 0.1, m: 0.001, km: 0.000001, mil: 0.0000001};
            break
        case "cm":
            outputs = {mm: 10, cm: 1, m: 0.01, km: 0.00001, mil: 0.000001};
            break
        case "m":
            outputs = {mm: 1000, cm: 100, m: 1, km: 0.001, mil: 0.0001};
            break
        case "km":
            outputs = {mm: 1000000, cm: 100000, m: 1000, km: 1, mil: 0.1};
            break
        case "mil":
            outputs = {mm: 100000000, cm: 10000000, m: 100000, km: 0.1, mil: 1};
            break
        default:
            alert("Du må velg en enhet");
            break
    }

    // Loop gjennom objektet
    for (var key in outputs) {
        if (outputs.hasOwnProperty(key)) {
            // Sett hver output
            document.getElementById("o7-output-" + key).value = document.getElementById("o7-input").value * outputs[key];
        }
    }
}
                </code>
            </pre>
            <h3>HTML</h3>
            <pre class="language-html">
                <code>
&lt;div class=&quot;row&quot;&gt;
    &lt;div class=&quot;input-field col s12 m6&quot;&gt;
        &lt;input id=&quot;o7-input&quot; type=&quot;number&quot; placeholder=&quot;Skriv et tall, f.eks: 100&quot;&gt;
    &lt;/div&gt;
    &lt;div class=&quot;input-field col s12 m6&quot;&gt;
        &lt;select id=&quot;o7-unit&quot;&gt;
            &lt;option value=&quot;mm&quot;&gt;Millimeter&lt;/option&gt;
            &lt;option value=&quot;cm&quot;&gt;Centimeter&lt;/option&gt;
            &lt;option value=&quot;m&quot; selected&gt;Meter&lt;/option&gt;
            &lt;option value=&quot;km&quot;&gt;Kilometer&lt;/option&gt;
            &lt;option value=&quot;mil&quot;&gt;Mil&lt;/option&gt;
        &lt;/select&gt;
    &lt;/div&gt;
    &lt;div class=&quot;s12 row&quot;&gt;
        &lt;div class=&quot;input-field s12&quot;&gt;
            &lt;input type=&quot;text&quot; id=&quot;o7-output-mm&quot; class=&quot;col s7&quot; disabled&gt;
            &lt;label class=&quot;col s4 right&quot; for=&quot;o7-output-mm&quot;&gt;Millimeter&lt;/label&gt;
        &lt;/div&gt;
        &lt;div class=&quot;input-field s12&quot;&gt;
            &lt;input type=&quot;text&quot; id=&quot;o7-output-cm&quot; class=&quot;col s7&quot; disabled&gt;
            &lt;label class=&quot;col s4 right&quot; for=&quot;o7-output-cm&quot;&gt;Centimeter&lt;/label&gt;
        &lt;/div&gt;
        &lt;div class=&quot;input-field s12&quot;&gt;
            &lt;input type=&quot;text&quot; id=&quot;o7-output-m&quot; class=&quot;col s7&quot; disabled&gt;
            &lt;label class=&quot;col s4 right&quot; for=&quot;o7-output-m&quot;&gt;Meter&lt;/label&gt;
        &lt;/div&gt;
        &lt;div class=&quot;input-field s12&quot;&gt;
            &lt;input type=&quot;text&quot; id=&quot;o7-output-km&quot; class=&quot;col s7&quot; disabled&gt;
            &lt;label class=&quot;col s4 right&quot; for=&quot;o7-output-km&quot;&gt;Kilometer&lt;/label&gt;
        &lt;/div&gt;
        &lt;div class=&quot;input-field s12&quot;&gt;
            &lt;input type=&quot;text&quot; id=&quot;o7-output-mil&quot; class=&quot;col s7&quot; disabled&gt;
            &lt;label class=&quot;col s4 right&quot; for=&quot;o7-output-mil&quot;&gt;Mil&lt;/label&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;
                </code>
            </pre>
        </section>
    </article>
    <?php require_once('../../../../templates/footer.php'); ?>
    <script src="/~bjornarh/js/prism/prism.js"></script>
    <link rel="stylesheet" href="/~bjornarh/css/prism/prism.css">
</body>
</html>