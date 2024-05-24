<?php require_once('../../templates/head.php'); ?>
    <link rel="stylesheet" href="/phpsite/css/steps.css">
</head>
<body>
    <?php
        $activeStep = 6;
        require_once('steps.php');
    ?>
    <?php require_once('../../templates/nav.php'); ?>
    <article id="oppgave-6">
        <header id="intro">
            <h1>Oppgave 6</h1>
            <p>Lag et skjema som lar deg fylle ut en handleliste. Listen skal bestå av varenavnet og antall varer. Når
            du trykker på en knapp skal varen legges til i en ul-liste i nettsiden. Under listen skal det vises totalt
            antall varer.</p>
        </header>
        <section id="result">
            <h2>Resultat</h2>
            <p>Hvis du prøver å legge til noe som allerde er i listen, så vil bare antallet gå opp, så man ikke får
            flere av samme ting nedover.</p>
            <div class="row input-field">
                <input id="o6-item" type="text" placeholder="Varenavn" class="col s7">
                <input id="o6-amount" type="number" min="1" placeholder="Antall" class="col s3">
                <button id="o6-add" class="col s2 btn black">+</button>
            </div>
            <ul id="o6-list"></ul>
            <p>Antall varer: <b id="o6-count">0</b></p>
            <script>
                window.onload = ready;

                function ready() {
                    document.getElementById("o6-add").onclick = addToList;
                }

                function addToList() {
                    var item = document.getElementById("o6-item").value;
                    var itemSlug = item.replace(/\s+/g, '-').toLowerCase(); // Fjern mellomrom og gjør til små bokstaver
                    var itemCountAdd = parseInt(document.getElementById("o6-amount").value);
                    var itemCountCurrent = 0;

                    // Hvis varen finnes fra før, legg til antall i eksisterende
                    if (document.getElementById(itemSlug)) {
                        itemCountCurrent = parseInt(document.getElementById(itemSlug + "-count").innerHTML);
                        document.getElementById(itemSlug + "-count").innerHTML = itemCountCurrent + itemCountAdd;
                    } else { // Hvis ikke, lag ny
                        document.getElementById("o6-list").innerHTML += "<li><span id='" + itemSlug + "'>" + item
                        + "</span> x <span id='" + itemSlug + "-count'>" + document.getElementById("o6-amount").value
                        + "</span></li>";
                    }

                    // Total count
                    document.getElementById("o6-count").innerHTML = parseInt(document.getElementById("o6-count").innerHTML) + itemCountAdd;
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
    document.getElementById("o6-add").onclick = addToList;
}

function addToList() {
    var item = document.getElementById("o6-item").value;
    var itemSlug = item.replace(/\s+/g, '-').toLowerCase(); // Fjern mellomrom og gjør til små bokstaver
    var itemCountAdd = parseInt(document.getElementById("o6-amount").value);
    var itemCountCurrent = 0;

    // Hvis varen finnes fra før, legg til antall i eksisterende
    if (document.getElementById(itemSlug)) {
        itemCountCurrent = parseInt(document.getElementById(itemSlug + "-count").innerHTML);
        document.getElementById(itemSlug + "-count").innerHTML = itemCountCurrent + itemCountAdd;
    } else { // Hvis ikke, lag ny
        document.getElementById("o6-list").innerHTML += "<li><span id='" + itemSlug + "'>" + item
        + "</span> x <span id='" + itemSlug + "-count'>" + document.getElementById("o6-amount").value
        + "</span></li>";
    }

    // Total count
    document.getElementById("o6-count").innerHTML = parseInt(document.getElementById("o6-count").innerHTML) + itemCountAdd;
}
                </code>
            </pre>
            <h3>HTML</h3>
            <pre class="language-html">
                <code>
&lt;div class=&quot;row input-field&quot;&gt;
    &lt;input id=&quot;o6-item&quot; type=&quot;text&quot; placeholder=&quot;Varenavn&quot; class=&quot;col s7&quot;&gt;
    &lt;input id=&quot;o6-amount&quot; type=&quot;number&quot; min=&quot;1&quot; placeholder=&quot;Antall&quot; class=&quot;col s3&quot;&gt;
    &lt;button id=&quot;o6-add&quot; class=&quot;col s2 btn black&quot;&gt;+&lt;/button&gt;
&lt;/div&gt;
&lt;ul id=&quot;o6-list&quot;&gt;&lt;/ul&gt;
&lt;p&gt;Antall varer: &lt;b id=&quot;o6-count&quot;&gt;0&lt;/b&gt;&lt;/p&gt;
                </code>
            </pre>
        </section>
    </article>
    <?php require_once('../../templates/footer.php'); ?>
    <script src="/phpsite/js/prism/prism.js"></script>
    <link rel="stylesheet" href="/phpsite/css/prism/prism.css">
</body>
</html>