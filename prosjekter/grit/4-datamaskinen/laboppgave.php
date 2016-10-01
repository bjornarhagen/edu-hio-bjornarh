<?php require_once('../../../templates/head.php'); ?>
    <link rel='stylesheet' href='/~bjornarh/fonts/hack/hack.css'>
</head>
<body class="article light">
    <?php require_once('../../../templates/nav.php'); ?>
    <article class="medium">
        <header>
            <h1>Lab-oppgaver</h1>
            <p>Samarbeid mellom Best-John Mulonda, Dennis Skants, Patrick Asbjørnsen, Bjørnar Hagen og Line Sharina Hagen.</p>
        </header>
        <section class="image full">
            <img src="images/laboppgave/theteam.jpg" alt="Gruppebilde">
        </section>
        <section>
            <section>
                <h2>Spørsmål og svar</h2>
                <h3>Del 1 Setup - BIOS</h3>
                <h3>Hva slags CPU har maskinen? Beskriv de tekniske egenskapene ved CPU’en?</h3>
                <p>CPUen til maskinen er en Intel (R) E 6600 dual core (2,4 GH). Den har følgende tekniske egenskaper:</p>
                <ul>
                    <li>4 MB Cache </li>
                    <li>64-bit Tech</li>
                    <li>ikke hyperthreading Capable</li>
                </ul>
            </section>
            <section>
                <h3>Hvor mye Internminne har den?</h3>
                <p>Den har 6.0 GB Installed memory</p>
                <img src="images/laboppgave/prosessor.jpg">
            </section>
            <section>
                <h3>Hvor mye Cache har maskinen? Hvilken oppgave har Cache i maskinen?</h3>
                <p>Den har 4 MB L2 Cache. Cache lagrer informasjon midlertidig slik man slipper å måtte hente fra harddisk/minne hele tiden.</p>
            </section>
            <section>
                <h3>Hvilken BIOS er installert? Finnes det en nyere BIOS til denne maskinen? Hvilken oppgave har BIOS I maskinen?</h3>
                <p>Det er Version 2.3.1 (21.05.07) som er installert. Det finnes en nyere versjon. (Versjon 2.6.6 (20feb. 2012)). BIOS står for Basic Input Output System og har som oppgave å styre dataen mellom komponenten og operativsystemet.</p>
                <img src="">
            </section>
            <section>
                <h3>Hvilke parametere får du lov til å endre i Setup?</h3>
                <p>Her er det mange forskjellige ting du kan endre på. Du kan blant annet velge hvilke SATA innganger som skal være aktive, endre boot sequens, skru av og på Multiple CPU Core og man kan skru av og på virtualisering.</p>
            </section>
            <section>
                <h2>Del 2 – Hardware spesifikasjoner</h2>
                <h3>Hva slags type og fabrikat er minnebrikken i slot 1?</h3>
                <p>Det er en DDR2 RAM fra Nanya Tec.</p>
                <img src="images/laboppgave/slot1.jpg">
            </section>
            <section>
                <h3>Hva er temperaturen i harddisken og CPU?</h3>
                <p>Temperaturen til harddisken var 38 grader og CPUen var 28 grader.</p>
                <img src="images/laboppgave/hdd.jpg">
            </section>
            <section>
                <h3>Hva slags chipset er det i maskinen?</h3>
                <p>Brikkesettet i maskinen er Intel Conroe.</p>
            </section>
            <section>
                <h2>Del 3 - Bak skallet</h2>
                <h3>Når dere har åpnet maskinen, skal dere identifiser de ulike enhetene:</h3>
                <p>Hovedkortet</p>
                <img src="images/laboppgave/hovedkort.jpg">
                <p>Prosessoren</p>
                <p>(Under kjøleelementet)</p>
                <img src="images/laboppgave/cpu.jpg">
                <p>RAM</p>
                <img src="images/laboppgave/ram.jpg">
                <p>Strømforsyning</p>
                <img src="images/laboppgave/strom.jpg">
                <p>Disker</p>
                <img src="images/laboppgave/disk.jpg">
            </section>
            <section>
                <h3>Hva slags utvidelsesbusser har maskinen? Forklar hvordan utvidelsesbussene fungerer og deres tekniske spesifikasjoner.</h3>
                <p> Speccy viste at maskinen har 4 utvidelsesbusser: 2 PCI, 1 PCI Express og proprietær port fra Dell, men i Dell sin «Quick Reference Guide» til Dell Optiplex 745 fant vi ut at denne porten bare var en vanlig PCI Express (16x). Utvidelsesbussene er for tilkobling av eksterne inn- og utenheter. (I/O-enheter). En utvidelsesbuss er en databuss som flytter informasjon mellom intern maskinvare og periferiutstyr. Det er en forlengelse av systembussen. På hovedkortet ender systembussen i brikkesettet, som danner broer til de andre bussene. </p>
                <p>Man har mange forskjellige typer og versjoner av utvidelsesbusser, men i dag så er den mest vanlige PCIe 3.0. PCIe porter finner man i forskjellige størrelser: 1x, 2x, x4, x8, x16 og flere i den nye M.2 formfaktoren. I PCIe versjon 1.x hadde man hastigheter opp til 4GB/s, i 2.x hadde man opp til 8GB/s og i versjon 3.x så har man opp til 16GB/s. Versjon 4.0 holder på å bli utviklet og skal levere opp til 32GB/s. Alle disse hastighetene er over x16.</p>
                <img src="images/laboppgave/pci.jpg">
            </section>
            <section>
                <h3>Hvor mange og hva slags ekstrakort er det plass til?</h3>
                <p>Det er allerede et ekstrakort plugget i (et grafikkort), men er plass til 3 til (altså totalt 4). Man kan plugge inn grafikkort, RAID kort, SSD, nettverkskort, lydkort, og andre kort som går over PCI.</p>
                <img src="images/laboppgave/utvidelse.jpg">
            </section>
            <section>
                <h3>Hva slags harddisk har maskinen, hvor stor er den?</h3>
                <p>Det er en Seagate HDD på 160GB som spinner i 7200RPM. (Se bilde nr. 3)</p>
            </section>
            <section>
                <h3>Hvor mange disker kan maskinen ha?</h3>
                <p>Hovedkortet har 4 SATA porter, så man kan installere 4 disker. Det er også mulig å koble til SSD via PCI. Så totalt kan man ha 8 disker om man regner med PCI SSD, men det er kun plass til 2 harddisker i harddisk-buret, så noe mer enn det ville ikke festet på en skikkelig måte.</p>
            </section>
            <section>
                <h3>Finn RAM-modulene. Øv dere på å ta dem ut og sette dem tilbake.</h3>
                <p>Vi øvde på å ta de inn og ut :)</p>
                <img src="images/laboppgave/ram2.jpg">
            </section>
            <section>
                <h3>Hva slags RAM-modul har maskinen (type, størrelse, hastighet …)? Hvilke andre typer RAM-moduler brukes. Hva er forskjellen på Flash og vanlig RAM?</h3>
                <p>Maskinen har 2 RAM brikker fra Nanya Tec, og 2 fra OCZ. De fra Nanya Tec var på 1024MB (1GB) og kjørte på 2048Mhz. RAM brikkene fra OCZ var på 2048MB (2GB) og kjørte på 2048Mhz. Flash minne, i motsetning til RAM, vil huske data endt strømtilførsel, er som regel tregere, men har mye større lagringskapasitet.</p>
            </section>
            <section>
                <h3>Hvor mange Megabyte RAM har maskinen?</h3>
                <p>Maskinen har 6144 MB RAM. (Se bilde nr. 2)</p>
            </section>
            <section>
                <h3>Kan dere finne hva slags chipset (brikkesett) datamaskinen har. Hvordan fungerer og hva slags oppgave har maskinens chipset?</h3>
                <p>Maskinen sitt brikkesett er Intel Conroe. Chipsetet sin oppgave er å kontrollere kommunikasjonen mellom prosessoren og eksterne enheter.</p>
            </section>
            <section>
                <h3>Skru sammen maskinen og sett på lokket.</h3>
                <p>Vi skrudde den sammen og satt på lokket.</p>
                <h3>Sjekk at maskinen starter opp.</h3>
                <p>Maskinen startet heldigvis opp igjen:</p>
                <img src="images/laboppgave/test.jpg">
            </section>
        </section>
        <footer>
            <hr>
            <h2>GRIT - 4 Datamaskinen</h2>
            <ul>
                <li><a href="laboppgave.php" class="subtle">Laboppgave</a></li>
                <li><a href="tallsystemer.php">Tallsystemer</a></li>
                <li><a href="kjenn-din-pc.php">Kjenn Din PC</a></li>
            </ul>
        </footer>
    </article>
    <?php require_once('../../../templates/footer.php'); ?>
</body>
</html>