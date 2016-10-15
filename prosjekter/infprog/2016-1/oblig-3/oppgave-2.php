<?php require_once('../../../../templates/head.php'); ?>
    <link rel="stylesheet" href="/~bjornarh/css/steps.css">
    <link rel='stylesheet' href='/~bjornarh/fonts/hack/hack.css'>
</head>
<body>
    <?php
        $activeStep = 2;
        require_once('steps.php');
    ?>
    <?php require_once('../../../../templates/nav.php'); ?>
    <article>
        <header id="intro">
            <h1>Oppgave <?= $activeStep; ?></h1>
            <p>Lag en webside med en tekstboks og en knapp. Lag så en array med antall dager i hvermåned. Antall dager i
            januar skal da være på indeks 0, februar på indeks 1 osv. I tekstboksen skal du så kunne skrive inn nummeret
            på en måned (1-12), og få ut antall dager i denne måneden. Du kan her se bort i fra skuddår. Utvid så koden
            til å også gi ut navnet på måneden hentet fra en annen array.</p>
        </header>
        <section id="result">
            <h2>Resultat</h2>
            <div class="row input-field">
                <input id="o2-input" class="col s10" type="number" min="1" max="12" placeholder="Skriv inn et månedsnummer (F.eks. 2)">
                <button id="o2-run" class="btn black col s2">Kjør</button>
            </div>
            <p id="o2-output"></p>
            <script>
                window.onload = ready;

                function ready() {
                    var output = document.getElementById("o2-output");
                    var input = document.getElementById("o2-input");
                    var lastInput = 0;

                    document.getElementById("o2-run").onclick = function() {
                        output.innerHTML = getMonthDays(input.value);
                    }

                    input.onkeypress = function(e) {
                        e.preventDefault(); // Stop vanlig input
                        var thisInput = String.fromCharCode(e.which); // Sett gjeldene verdi til trykket tast
                        
                        // Hvis forrige verdi satt sammen med gjeldene verdi er større enn 12
                        if ((lastInput + thisInput) > 12) {
                            input.value = thisInput;                       // Sett input til gjeldene verdi
                        } else if (input.value.length != 0) {              // Sjekk at feltet ikke var tomt når vi kjørte
                            input.value = parseInt(lastInput + thisInput);
                        } else {
                            input.value = thisInput;                       // Kjører når feltet var tomt
                        }

                        output.innerHTML = getMonthDays(input.value);

                        // Sett forrige input til gjeldene
                        lastInput = thisInput;
                    }
                }

                function getMonthDays(month) {
                    var date = new Date();
                    var months = [];

                    for (var i = 1; i <= 12; i++) {
                        months[i] = {
                            name: getMonthInfo("name", date.getYear(), i),
                            days: getMonthInfo("days", date.getYear(), i)
                        }
                    }

                    if (month <= 12 && month >= 1) {
                        return "<b>" + months[month].days + "</b> dager i <b>" + months[month].name + "</b> " + date.getFullYear();
                    } else {
                        return "Skriv inn et gyldig månedsnummer (mellom 1 og 12)"
                    }

                    return false;
                }

                function getMonthInfo(get, year, month) {
                    var monthNames = [
                        "januar",
                        "februar",
                        "mars",
                        "april",
                        "mai",
                        "juni",
                        "juli",
                        "august",
                        "september",
                        "oktober",
                        "november",
                        "desember"
                    ]

                    if (get == "days") {
                        return new Date(year, month, 0).getDate();
                    } else if (get == "name") {
                        return monthNames[month-1];
                    }

                    return false;
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
    var output = document.getElementById(&quot;o2-output&quot;);
    var input = document.getElementById(&quot;o2-input&quot;);
    var lastInput = 0;

    document.getElementById(&quot;o2-run&quot;).onclick = function() {
        output.innerHTML = getMonthDays(input.value);
    }

    input.onkeypress = function(e) {
        e.preventDefault(); // Stop vanlig input
        var thisInput = String.fromCharCode(e.which); // Sett gjeldene verdi til trykket tast
        
        // Hvis forrige verdi satt sammen med gjeldene verdi er større enn 12
        if ((lastInput + thisInput) &gt; 12) {
            input.value = thisInput;                       // Sett input til gjeldene verdi
        } else if (input.value.length != 0) {              // Sjekk at feltet ikke var tomt når vi kjørte
            input.value = parseInt(lastInput + thisInput);
        } else {
            input.value = thisInput;                       // Kjører når feltet var tomt
        }

        output.innerHTML = getMonthDays(input.value);

        // Sett forrige input til gjeldene
        lastInput = thisInput;
    }
}

function getMonthDays(month) {
    var date = new Date();
    var months = [];

    for (var i = 1; i &lt;= 12; i++) {
        months[i] = {
            name: getMonthInfo(&quot;name&quot;, date.getYear(), i),
            days: getMonthInfo(&quot;days&quot;, date.getYear(), i)
        }
    }

    if (month &lt;= 12 && month &gt;= 1) {
        return &quot;&lt;b&gt;&quot; + months[month].days + &quot;&lt;/b&gt; dager i &lt;b&gt;&quot; + months[month].name + &quot;&lt;/b&gt; &quot; + date.getFullYear();
    } else {
        return &quot;Skriv inn et gyldig månedsnummer (mellom 1 og 12)&quot;
    }

    return false;
}

function getMonthInfo(get, year, month) {
    var monthNames = [
        &quot;januar&quot;,
        &quot;februar&quot;,
        &quot;mars&quot;,
        &quot;april&quot;,
        &quot;mai&quot;,
        &quot;juni&quot;,
        &quot;juli&quot;,
        &quot;august&quot;,
        &quot;september&quot;,
        &quot;oktober&quot;,
        &quot;november&quot;,
        &quot;desember&quot;
    ]

    if (get == &quot;days&quot;) {
        return new Date(year, month, 0).getDate();
    } else if (get == &quot;name&quot;) {
        return monthNames[month-1];
    }

    return false;
}
                </code>
            </pre>
            <h3>HTML</h3>
            <pre class="language-html">
                <code>
&lt;div class=&quot;row input-field&quot;&gt;
    &lt;input id=&quot;o2-input&quot; class=&quot;col s10&quot; type=&quot;number&quot; min=&quot;1&quot; max=&quot;12&quot; placeholder=&quot;Skriv inn et månedsnummer (F.eks. 2)&quot;&gt;
    &lt;button id=&quot;o2-run&quot; class=&quot;btn black col s2&quot;&gt;Kjør&lt;/button&gt;
&lt;/div&gt;
&lt;p id=&quot;o2-output&quot;&gt;&lt;/p&gt;
                </code>
            </pre>
        </section>
    </article>
    <?php require_once('../../../../templates/footer.php'); ?>
    <script src="/~bjornarh/js/prism/prism.js"></script>
    <link rel="stylesheet" href="/~bjornarh/css/prism/prism.css">
</body>
</html>