<?php require_once('../../../../templates/head.php'); ?>
    <link rel="stylesheet" href="/phpsite/css/steps.css">
    <link rel='stylesheet' href='/phpsite/fonts/hack/hack.css'>
</head>
<body>
    <?php
        $activeStep = 4;
        require_once('steps.php');
    ?>
    <?php require_once('../../../../templates/nav.php'); ?>
    <article>
        <header id="intro">
            <h1>Oppgave <?= $activeStep; ?></h1>
            <p>Gjør endringer på koden i oppgave 3 slik at samme navn ikke blir plukket ut flere ganger.</p>
            <p>Utfør denne oppgaven i to steg:</p>
            <ul>
                <li>Beskriv hvordan du ville gjort dette om det var en papirliste med navn (se bort i fra programmering).</li>
                <li>Skriv koden som reflekterer denne fremgangsmåten.</li>
            </ul>
        </header>
        <section id="result">
            <h2>Resultat</h2>
            <p>Jeg ville skrevet navnene i en liste, så hadde jeg stryki over det navn som ble tilfeldig valgt. Et navn
            som er stryki kan ikke bli valgt.</p>
            <div class="row input-field">
                <input id="o4-new-array" class="col s8" type="text" readonly>
                <button id="o4-get-names" class="btn black col s4">Hent navn</button>
                <p id="o4-remaining"></p>
            </div>
            <script>
                window.onload = ready;

                function ready() {
                    showNames(); // Kjør funkjsonen med en gang
                    document.getElementById("o4-get-names").onclick = showNames;
                }

                function showNames() {
                    var output = document.getElementById("o4-new-array");

                    var studentsOrg = [
                        "Hans",
                        "Ole",
                        "Nils",
                        "Olav",
                        "Per",
                        "Knut",
                        "Kari",
                        "Line",
                        "Pia"
                    ];

                    var studentsNew = [];
                    // Plukk ut 3 tilfeldig student og legg de til i array.
                    for (var i = 0; i < 3; i++) {
                        var random = Math.floor(Math.random() * studentsOrg.length);
                        studentsNew.push(studentsOrg[random]);
                        studentsOrg.splice(random, 1); // Fjern student fra orginal listen
                    }

                    output.value = "3 Random ulike studenter: " + studentsNew.join(", ");
                    document.getElementById("o4-remaining").innerHTML = "Gjenværende studenter: " + studentsOrg.join(", ");
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
    showNames(); // Kjør funkjsonen med en gang
    document.getElementById(&quot;o4-get-names&quot;).onclick = showNames;
}

function showNames() {
    var output = document.getElementById(&quot;o4-new-array&quot;);

    var studentsOrg = [
        &quot;Hans&quot;,
        &quot;Ole&quot;,
        &quot;Nils&quot;,
        &quot;Olav&quot;,
        &quot;Per&quot;,
        &quot;Knut&quot;,
        &quot;Kari&quot;,
        &quot;Line&quot;,
        &quot;Pia&quot;
    ];

    var studentsNew = [];
    // Plukk ut 3 tilfeldig student og legg de til i array.
    for (var i = 0; i &lt; 3; i++) {
        var random = Math.floor(Math.random() * studentsOrg.length);
        studentsNew.push(studentsOrg[random]);
        studentsOrg.splice(random, 1); // Fjern student fra orginal listen
    }

    output.value = &quot;3 Random ulike studenter: &quot; + studentsNew.join(&quot;, &quot;);
    document.getElementById(&quot;o4-remaining&quot;).innerHTML = &quot;Gjenværende studenter: &quot; + studentsOrg.join(&quot;, &quot;);
}
                </code>
            </pre>
            <h3>HTML</h3>
            <pre class="language-html">
                <code>
&lt;div class=&quot;row input-field&quot;&gt;
    &lt;input id=&quot;o4-new-array&quot; class=&quot;col s8&quot; type=&quot;text&quot; readonly&gt;
    &lt;button id=&quot;o4-get-names&quot; class=&quot;btn black col s4&quot;&gt;Hent navn&lt;/button&gt;
    &lt;p id=&quot;o4-remaining&quot;&gt;&lt;/p&gt;
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