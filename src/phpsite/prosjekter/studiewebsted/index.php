<?php require_once('../../templates/head.php'); ?>
</head>
<body class="article light">
    <?php require_once('../../templates/nav.php'); ?>
    <article class="medium">
        <header>
            <h1>Studiewebsted (WIP)</h1>
            <p>I GRIT 2016 uke 2 fikk vi i oppgave å lage personelig studiewebsted.</p>
            <p>All koden til siden er tillgjenglig på <a href="https://github.com/bearhagen/edu-hio-bjornarh" target="_blank">GitHub</a></p>
            <a href="/phpsite" class="btn black white-text">Se resultat</a>
        </header>
        <section>
            <h2>Forside</h2>
            <p>På forsiden er det en overskrift som skifter mellom tilfeldig bokstaver og tall 20 ganger i sekundet.
            Når man holder musen over, så stopper den, og viser navnet mitt i stedet. Bakgrunnen skifter også farge, men
            dette skjer ganske sakte.</p>
            <div class="image">
                <video autoplay loop>
                    <source src="images/index.mp4" type="video/mp4" poster="images/index.png">
                    Your browser does not support the video tag. Please update or use something else (like Chrome or Firefox)
                </video>
                <p class="image-figure">For å få til denne effekten måtte jeg bruke JavaScript. Bakgrunnen endrer på seg
                med hjelp av CSS.</p>
            </div>
        </section>
        <section>
            <h2>Dropdown meny</h2>
            <p>På toppen av siden er en dropdown meny. Så når brukeren holder musen over "meny" åpner det seg en meny
            med tre linker. Hver link har et ikon og tekst. Trykker man på en link, så blir man ike sendt til en ny side,
            men det vises nytt innhold på den siden man er på.</p>
            <div class="image">
                <video autoplay loop>
                    <source src="images/navigation.mp4" type="video/mp4" poster="images/projects.png">
                    Your browser does not support the video tag. Please update or use something else (like Chrome or Firefox)
                </video>
            </div>
            <h3>Prosjekter</h3>
            <p>Trykker man på prosjekter, vil man få en oversikt over alle prosjekter som jeg har jobbet med
            så langt på skolen.</p>
            <div class="image">
                <img src="images/projects.png" alt="Prosjekter side">
            </div>
            <h3>Om meg</h3>
            <p>Trykker man på "Om meg", vil man få et vindu med info om meg.</p>
        </section>
    </article>
    <?php require_once('../../templates/footer.php'); ?>
</body>
</html>