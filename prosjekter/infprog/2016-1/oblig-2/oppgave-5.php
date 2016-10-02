<?php require_once('../../../../templates/head.php'); ?>
    <link rel="stylesheet" href="/~bjornarh/css/steps.css">
    <link rel='stylesheet' href='/~bjornarh/fonts/hack/hack.css'>
</head>
<body>
    <?php
        $activeStep = 5;
        require_once('steps.php');
    ?>
    <?php require_once('../../../../templates/nav.php'); ?>
    <article>
        <header id="intro">
            <h1>Oppgave 5</h1>
            <p>En spådame ønsker å reise vekk på ferie, og vil derfor automatisere sine tjenester via en nettside. Du
            har fått i oppgave å lage denne funksjonaliteten. Lag en nettside for å gi en spådom, hvor man kan skrive
            inn verdier i tekstbokser for navn, alder og høyde. I tillegg skal det være en nedtrekksliste for kjønn.
            Spådommen skal vises på nettsiden når brukeren trykker på en knapp, og vil være basert på en magisk verdi.
            Denne verdien vil regnes ut forskjellig, avhengig av om det er en gutt eller en jente</p>
        </header>
        <section id="result">
            <h2>Resultat</h2>
            <div class="row input-field">
                <label for="o5-name" class="col s1"><i class="icon-user-2"></i></label>
                <input type="text" id="o5-name" class="col s11" placeholder="Navn">
            </div>
            <div class="row input-field">
                <label for="o5-age" class="col s1"><i class="icon-cake-2"></i></label>
                <input type="number" id="o5-age" class="col s11" placeholder="Alder">
            </div>
            <div class="row input-field">
                <label for="o5-height" class="col s1"><i class="icon-ruler-1"></i></label>
                <input type="number" id="o5-height" class="col s11" placeholder="Høyde">
            </div>
            <div class="row input-field">
                <label for="o5-gender" class="col s1"><i class="icon-gender"></i></label>
                <select type="text" id="o5-gender" class="col s11">
                    <option value="0" disabled selected>Kjønn</option>
                    <option value="1">Gutt</option>
                    <option value="2">Jente</option>
                </select>
            </div>
            <div class="row input-field">
                <button id="get-future" class="btn black">Min spådom</button>
            </div>
            <p id="the-future"></p>
            <script>
                window.onload = ready;

                function ready() {
                    document.getElementById("get-future").onclick = getFuture;
                }

                function getFuture() {
                    var name = document.getElementById("o5-name").value;
                    var age = document.getElementById("o5-age").value;
                    var height = document.getElementById("o5-height").value;
                    var gender = document.getElementById("o5-gender").value;

                    var magic = magicFormula(gender, name.length, parseInt(age), parseInt(height));

                    var output = document.getElementById("the-future");
                    var outputMsg;

                    function magicFormula(gender, name, age, height) {
                        if (gender == 1) {
                            return name * age - height
                        } else if (gender == 2) {
                            return age * height - 3;
                        } else {
                            return false;
                        }
                    }

                    if ((magic%2) == 0) {
                        outputMsg = "Det vil gå deg godt her i verden...<br>";
                        outputMsg += "For at spådommen skal gå i oppfyllelse, må du betale inn 100 kr til følgende kontonummer: 1234.12.12345";
                    } else {
                        outputMsg = "Stakkars deg! Alt kommer til å gå deg galt...<br>";
                        outputMsg += "For at spådommen ikke skal gå i oppfyllelse, må du betale inn 100 kr til følgende kontonummer: 1234.12.12345";
                    }

                    output.innerHTML = outputMsg;
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
    document.getElementById(&quot;get-future&quot;).onclick = getFuture;
}

function getFuture() {
    var name = document.getElementById(&quot;o5-name&quot;).value;
    var age = document.getElementById(&quot;o5-age&quot;).value;
    var height = document.getElementById(&quot;o5-height&quot;).value;
    var gender = document.getElementById(&quot;o5-gender&quot;).value;

    var magic = magicFormula(gender, name.length, parseInt(age), parseInt(height));

    var output = document.getElementById(&quot;the-future&quot;);
    var outputMsg;

    function magicFormula(gender, name, age, height) {
        if (gender == 1) {
            return name * age - height
        } else if (gender == 2) {
            return age * height - 3;
        } else {
            return false;
        }
    }

    if ((magic%2) == 0) {
        outputMsg = &quot;Det vil gå deg godt her i verden...&lt;br&gt;&quot;;
        outputMsg += &quot;For at spådommen skal gå i oppfyllelse, må du betale inn 100 kr til følgende kontonummer: 1234.12.12345&quot;;
    } else {
        outputMsg = &quot;Stakkars deg! Alt kommer til å gå deg galt...&lt;br&gt;&quot;;
        outputMsg += &quot;For at spådommen ikke skal gå i oppfyllelse, må du betale inn 100 kr til følgende kontonummer: 1234.12.12345&quot;;
    }

    output.innerHTML = outputMsg;
}
                </code>
            </pre>
            <h3>HTML</h3>
            <pre class="language-html">
                <code>
&lt;div class=&quot;row input-field&quot;&gt;
    &lt;label for=&quot;o5-name&quot; class=&quot;col s1&quot;&gt;&lt;i class=&quot;icon-user-2&quot;&gt;&lt;/i&gt;&lt;/label&gt;
    &lt;input type=&quot;text&quot; id=&quot;o5-name&quot; class=&quot;col s11&quot; placeholder=&quot;Navn&quot;&gt;
&lt;/div&gt;
&lt;div class=&quot;row input-field&quot;&gt;
    &lt;label for=&quot;o5-age&quot; class=&quot;col s1&quot;&gt;&lt;i class=&quot;icon-cake-2&quot;&gt;&lt;/i&gt;&lt;/label&gt;
    &lt;input type=&quot;number&quot; id=&quot;o5-age&quot; class=&quot;col s11&quot; placeholder=&quot;Alder&quot;&gt;
&lt;/div&gt;
&lt;div class=&quot;row input-field&quot;&gt;
    &lt;label for=&quot;o5-height&quot; class=&quot;col s1&quot;&gt;&lt;i class=&quot;icon-ruler-1&quot;&gt;&lt;/i&gt;&lt;/label&gt;
    &lt;input type=&quot;number&quot; id=&quot;o5-height&quot; class=&quot;col s11&quot; placeholder=&quot;Høyde&quot;&gt;
&lt;/div&gt;
&lt;div class=&quot;row input-field&quot;&gt;
    &lt;label for=&quot;o5-gender&quot; class=&quot;col s1&quot;&gt;&lt;i class=&quot;icon-gender&quot;&gt;&lt;/i&gt;&lt;/label&gt;
    &lt;select type=&quot;text&quot; id=&quot;o5-gender&quot; class=&quot;col s11&quot;&gt;
        &lt;option value=&quot;0&quot; disabled selected&gt;Kjønn&lt;/option&gt;
        &lt;option value=&quot;1&quot;&gt;Gutt&lt;/option&gt;
        &lt;option value=&quot;2&quot;&gt;Jente&lt;/option&gt;
    &lt;/select&gt;
&lt;/div&gt;
&lt;div class=&quot;row input-field&quot;&gt;
    &lt;button id=&quot;get-future&quot; class=&quot;btn black&quot;&gt;Min spådom&lt;/button&gt;
&lt;/div&gt;
&lt;p id=&quot;the-future&quot;&gt;&lt;/p&gt;
                </code>
            </pre>
        </section>
    </article>
    <?php require_once('../../../../templates/footer.php'); ?>
    <script src="/~bjornarh/js/prism/prism.js"></script>
    <link rel="stylesheet" href="/~bjornarh/css/prism/prism.css">
</body>
</html>