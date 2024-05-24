<?php require_once('../../../../templates/head.php'); ?>
    <link rel="stylesheet" href="/phpsite/css/steps.css">
    <link rel='stylesheet' href='/phpsite/fonts/hack/hack.css'>
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
window.onload = ready;

function ready() {
    document.getElementById(&quot;o8-calculate&quot;).onclick = calculate;
}

function calculate() {
    var amount = parseInt(document.getElementById(&quot;o8-amount&quot;).value);
    var years = parseInt(document.getElementById(&quot;o8-years&quot;).value);
    var interest = parseFloat(document.getElementById(&quot;o8-interest&quot;).value);
    var output = document.getElementById(&quot;o8-output&quot;);

    output.value = &quot;&quot;;

    for (var i = 0; i &lt; years; i++) {
        amount += (amount*interest)/100;
        output.value += &quot;Penger i banken etter &quot; + (i+1) + &quot; år: &quot; + amount.toFixed(2) + &quot;\n&quot;; // Output med 2 des
    }
}
                </code>
            </pre>
            <h3>HTML</h3>
            <pre class="language-html">
                <code>
&lt;div class=&quot;row input-field&quot;&gt;
    &lt;label for=&quot;o8-amount&quot; class=&quot;col s1&quot;&gt;&lt;i class=&quot;icon-money&quot;&gt;&lt;/i&gt;&lt;/label&gt;
    &lt;input type=&quot;number&quot; id=&quot;o8-amount&quot; class=&quot;col s11&quot; placeholder=&quot;Pengebeløp&quot;&gt;
&lt;/div&gt;
&lt;div class=&quot;row input-field&quot;&gt;
    &lt;label for=&quot;o8-years&quot; class=&quot;col s1&quot;&gt;&lt;i class=&quot;icon-calendar-2&quot;&gt;&lt;/i&gt;&lt;/label&gt;
    &lt;input type=&quot;number&quot; id=&quot;o8-years&quot; class=&quot;col s11&quot; placeholder=&quot;Antall år&quot;&gt;
&lt;/div&gt;
&lt;div class=&quot;row input-field&quot;&gt;
    &lt;label for=&quot;o8-interest&quot; class=&quot;col s1&quot;&gt;&lt;i class=&quot;icon-percent-up&quot;&gt;&lt;/i&gt;&lt;/label&gt;
    &lt;input type=&quot;number&quot; id=&quot;o8-interest&quot; class=&quot;col s11&quot; placeholder=&quot;Rente&quot;&gt;
&lt;/div&gt;
&lt;div class=&quot;row input-field center&quot;&gt;
    &lt;button id=&quot;o8-calculate&quot; class=&quot;btn black&quot;&gt;Regn ut&lt;/button&gt;
&lt;/div&gt;
&lt;div class=&quot;row input-field&quot;&gt;
    &lt;textarea id=&quot;o8-output&quot; rows=&quot;10&quot; readonly&gt;&lt;/textarea&gt;
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