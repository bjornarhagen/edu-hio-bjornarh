<?php require_once('../../../../templates/head.php'); ?>
    <link rel="stylesheet" href="/~bjornarh/css/steps.css">
    <link rel='stylesheet' href='/~bjornarh/fonts/hack/hack.css'>
    <style>
        #o7-input input {
            width: 50px;
        }
    </style>
</head>
<body>
    <?php
        $activeStep = 7;
        require_once('steps.php');
    ?>
    <?php require_once('../../../../templates/nav.php'); ?>
    <article>
        <header id="intro">
            <h1>Oppgave <?= $activeStep; ?></h1>
        </header>
        <section id="result">
            <h2>Resultat</h2>
            <p>Har tatt utgangspunkt i et åpent interval...</p>
            <p id="o7-input"><input type="number" autofocus placeholder="Tall"> er mellom <input type="number" placeholder="Fra"> og <input type="number" placeholder="Til">:
            <span id="o7-output-1"></span></p>
            <p>2 er mellom 1 og 3: <span id="o7-output-2"></span></p>
            <p>30 er mellom 9 og 20: <span id="o7-output-3"></span></p>
            <script>
                window.onload = ready;

                function ready() {
                    document.getElementById("o7-output-2").innerHTML = numberBetween(2, 1, 3) ? "Sant" : "Usant";
                    document.getElementById("o7-output-3").innerHTML = numberBetween(30, 9, 20) ? "Sant" : "Usant";

                    setUpInputs(document.querySelectorAll("#o7-input input"), document.getElementById("o7-output-1"));
                }

                // Gjør klar input feltene
                function setUpInputs(inputs, output) {
                    var inputs = [].slice.call(inputs); // Gjør om fra node list til array, så vi kan bruke forEach.
                    inputs.forEach(function(input) {
                        input.addEventListener("change", function(e) { // Kjøres når en input endres
                            var error = false;

                            inputs.forEach(function(input) { // Sjekk at alle input feltene har verdier
                                if (input.value.length == 0) {
                                    error = true;
                                }
                            });

                            // Kjøres kun når det ikke er noen errors
                            if (!error) {
                                output.innerHTML = numberBetween(parseInt(inputs[0].value), parseInt(inputs[1].value), parseInt(inputs[2].value)) ? "Sant" : "Usant";
                            }
                        });
                    });
                }

                // Sjekker om et tall er mellom to andre tall (fra og til)
                function numberBetween(number, from, to) {
                    return (number > from && number < to); // Retunerer true eller false
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
    document.getElementById(&quot;o7-output-2&quot;).innerHTML = numberBetween(2, 1, 3) ? &quot;Sant&quot; : &quot;Usant&quot;;
    document.getElementById(&quot;o7-output-3&quot;).innerHTML = numberBetween(30, 9, 20) ? &quot;Sant&quot; : &quot;Usant&quot;;

    setUpInputs(document.querySelectorAll(&quot;#o7-input input&quot;), document.getElementById(&quot;o7-output-1&quot;));
}

// Gjør klar input feltene
function setUpInputs(inputElements, output) {
    var inputElements = [].slice.call(inputElements); // Gjør om fra node list til array, så vi kan bruke forEach.
    inputElements.forEach(function(input) {
        input.addEventListener(&quot;change&quot;, function(e) { // Kjøres når en input endres
            var error = false;

            inputElements.forEach(function(input) { // Sjekk at alle input feltene har verdier
                if (input.value.length == 0) {
                    error = true;
                }
            });

            // Kjøres kun når det ikke er noen errors
            if (!error) {
                output.innerHTML = numberBetween(parseInt(inputs[0].value), parseInt(inputs[1].value), parseInt(inputs[2].value)) ? &quot;Sant&quot; : &quot;Usant&quot;;
            }
        });
    });
}

// Sjekker om et tall er mellom to andre tall (fra og til)
function numberBetween(number, from, to) {
    return (number &gt; from && number &lt; to);
}
                </code>
            </pre>
            <h3>HTML</h3>
            <pre class="language-html">
                <code>
&lt;p id=&quot;o7-input&quot;&gt;&lt;input type=&quot;number&quot; autofocus placeholder=&quot;Tall&quot;&gt; er mellom &lt;input type=&quot;number&quot; placeholder=&quot;Fra&quot;&gt; og &lt;input type=&quot;number&quot; placeholder=&quot;Til&quot;&gt;:
&lt;span id=&quot;o7-output-1&quot;&gt;&lt;/span&gt;&lt;/p&gt;
&lt;p&gt;2 er mellom 1 og 3: &lt;span id=&quot;o7-output-2&quot;&gt;&lt;/span&gt;&lt;/p&gt;
&lt;p&gt;30 er mellom 9 og 20: &lt;span id=&quot;o7-output-3&quot;&gt;&lt;/span&gt;&lt;/p&gt;
                </code>
            </pre>
        </section>
    </article>
    <?php require_once('../../../../templates/footer.php'); ?>
    <script src="/~bjornarh/js/prism/prism.js"></script>
    <link rel="stylesheet" href="/~bjornarh/css/prism/prism.css">
</body>
</html>