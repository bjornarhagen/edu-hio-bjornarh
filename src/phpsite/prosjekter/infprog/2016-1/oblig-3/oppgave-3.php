<?php require_once('../../../../templates/head.php'); ?>
    <link rel="stylesheet" href="/phpsite/css/steps.css">
    <link rel='stylesheet' href='/phpsite/fonts/hack/hack.css'>
</head>
<body>
    <?php
        $activeStep = 3;
        require_once('steps.php');
    ?>
    <?php require_once('../../../../templates/nav.php'); ?>
    <article>
        <header id="intro">
            <h1>Oppgave <?= $activeStep; ?></h1>
            <p>Gå ut i fra at du har definert en array med navn på studenter. Denne definisjonen kan f.eks se ut som
            følger:</p>
            <div class="row input-field">
                <input id="o3-org-array" type="text" readonly>
            </div>
            <p>Skriv kode som plukker ut tre tilfeldige navn fra denne arrayen (Tips: Math.random() ), og legger disse i
            en egen/ny array. Skriv deretter ut denne nye arrayen.</p>
        </header>
        <section id="result">
            <h2>Resultat</h2>
            <div class="row input-field">
                <input id="o3-new-array" type="text" readonly>
            </div>
            <script>
                window.onload = ready;

                function ready() {
                    var output = document.getElementById("o3-new-array");

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
                
                    document.getElementById("o3-org-array").value = "Array = [\"" + studentsOrg.join("\", \"") + "\"];";

                    var studentsNew = [];
                    // Plukk ut 3 tilfeldig student og legg de til i array.
                    for (var i = 0; i < 3; i++) {
                        var random = Math.floor(Math.random() * studentsOrg.length);
                        studentsNew.push(studentsOrg[random]);
                    }

                    output.value = "3 Random studenter: " + studentsNew.join(", ");
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
    var output = document.getElementById(&quot;o3-new-array&quot;);

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

    document.getElementById(&quot;o3-org-array&quot;).value = &quot;Array = [\&quot;&quot; + studentsOrg.join(&quot;\&quot;, \&quot;&quot;) + &quot;\&quot;];&quot;;

    var studentsNew = [];
    // Plukk ut 3 tilfeldig student og legg de til i array.
    for (var i = 0; i &lt; 3; i++) {
        var random = Math.floor(Math.random() * studentsOrg.length);
        studentsNew.push(studentsOrg[random]);
    }

    output.value = &quot;3 Random studenter: &quot; + studentsNew.join(&quot;, &quot;);
}
                </code>
            </pre>
            <h3>HTML</h3>
            <pre class="language-html">
                <code>
&lt;div class=&quot;row input-field&quot;&gt;
    &lt;input id=&quot;o3-new-array&quot; type=&quot;text&quot; readonly&gt;
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