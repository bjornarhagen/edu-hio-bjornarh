<?php require_once('../../../templates/head.php'); ?>
    <link rel='stylesheet' href='/~bjornarh/fonts/hack/hack.css'>
</head>
<body class="article light">
    <?php require_once('../../../templates/nav.php'); ?>
    <article class="medium">
        <header>
            <h1>Laboppgave</h1>
            <p>Samarbeid mellom Patrick Asbjørnsen, Dennis Skants, Best-John Mulonda, Line Sharina Hagen og Bjørnar Hagen</p>
        </header>
        <section class="image full">
            <img src="images/laboppgave/theteam.jpg" alt="Gruppebilde">
        </section>
        <section>
            <section>
                <h2>Spørsmål og svar</h2>
                <h3>Del 1 Setup - BIOS</h3>
                <h3>Hva slags CPU har maskinen? Beskriv de tekniske egenskapene ved CPU'en?</h3>
                <p>Maskinen har en <a href="http://ark.intel.com/products/27250/Intel-Core2-Duo-Processor-E6600-4M-Cache-2_40-GHz-1066-MHz-FSB" target="_blank">Intel E6600 dual core</a>
                med en klokkehastighet på 2,4 GHz. Mer om CPU'en:</p>
                <ul>
                    <li>4 MB Cache</li>
                    <li>64-bit</li>
                    <li>Ikke Hyperthreading Capable</li>
                </ul>
            </section>
            <section>
                <h3>Hvor mye Internminne har den?</h3>
                <p>Den har 6.0GB minne installert</p>
                <div class="image full image-figure">
                    <img src="images/laboppgave/prosessor.jpg" class="image-zoomable">
                    <p class="subtle">Bilde nr 1.</p>
                </div>
            </section>
            <section>
                <h3>Hvor mye Cache har maskinen? Hvilken oppgave har Cache i maskinen?</h3>
                <p>Den har 4 MB L2 Cache. Cache lagrer informasjon midlertidig slik man slipper å måtte hente fra
                harddisk/minne hele tiden.</p>
            </section>
            <section>
                <h3>Hvilken BIOS er installert? Finnes det en nyere BIOS til denne maskinen? Hvilken oppgave har BIOS I maskinen?</h3>
                <p>Det er versjon 2.3.1 av BIOS'et er installert (utgitt 21.05.2007). Den nyeste versjonen er 2.6.6 fra
                20.02.2012. BIOS står for Basic Input Output System og har som oppgave å styre data mellom komponentene
                og operativsystemet.</p>
            </section>
            <section>
                <h3>Hvilke parametere får du lov til å endre i Setup?</h3>
                <p>Det er mange forskjellige ting man kan endre på. Man kan blant annet velge hvilke SATA innganger
                som skal være aktive, endre boot sequence, skru av og på Multiple CPU Core og man kan skru av og på
                støtte for virtualisering.</p>
            </section>
            <section>
                <h2>Del 2 – Hardware spesifikasjoner</h2>
                <h3>Hva slags type og fabrikat er minnebrikken i slot 1?</h3>
                <p>Det er en DDR2 RAM fra Nanya Tec.</p>
                <div class="image full image-figure">
                    <img src="images/laboppgave/slot1.jpg" class="image-zoomable">
                    <p class="subtle">Bilde nr 2.</p>
                </div>
            </section>
            <section>
                <h3>Hva er temperaturen i harddisken og CPU?</h3>
                <p>Temperaturen til harddisken var 38 grader og CPUen var 28 grader. Målt i celsius</p>
                <div class="image full image-figure">
                    <img src="images/laboppgave/hdd.jpg" class="image-zoomable">
                    <p class="subtle">Bilde nr 3.</p>
                </div>
            </section>
            <section>
                <h3>Hva slags chipset er det i maskinen?</h3>
                <p>Brikkesettet i maskinen er Intel Conroe.</p>
            </section>
            <section>
                <h2>Del 3 - Bak skallet</h2>
                <h3>Når dere har åpnet maskinen, skal dere identifiser de ulike enhetene:</h3>
                <div class="image full image-figure">
                    <img src="images/laboppgave/hovedkort.jpg" class="image-zoomable">
                    <p>Hovedkortet</p>
                    <div class="space-v-small"></div>
                </div>
                <div class="image full image-figure">
                    <img src="images/laboppgave/cpu.jpg" class="image-zoomable">
                    <p>Prosessoren (Under kjøleelementet/vifta)</p>
                    <div class="space-v-small"></div>
                </div>
                <div class="image full image-figure">
                    <img src="images/laboppgave/ram.jpg" class="image-zoomable">
                    <p>RAM</p>
                    <div class="space-v-small"></div>
                </div>
                <div class="image full image-figure">
                    <img src="images/laboppgave/strom.jpg" class="image-zoomable">
                    <p>Strømforsyning</p>
                    <div class="space-v-small"></div>
                </div>
                <div class="image full image-figure">
                    <img src="images/laboppgave/disk.jpg" class="image-zoomable">
                    <p>Disken</p>
                    <div class="space-v-small"></div>
                </div>
            </section>
            <section>
                <h3>Hva slags utvidelsesbusser har maskinen? Forklar hvordan utvidelsesbussene fungerer og deres tekniske spesifikasjoner.</h3>
                <p> Speccy viste at maskinen har 4 utvidelsesbusser: 2 PCI, 1 PCI Express og proprietær port fra Dell,
                men i Dell sin «Quick Reference Guide» til Dell Optiplex 745 fant vi ut at denne porten bare var en
                vanlig PCI Express (16x). Utvidelsesbussene er for tilkobling av eksterne inn- og utenheter
                (I/O-enheter). En utvidelsesbuss er en databuss som flytter informasjon mellom intern maskinvare og
                periferiutstyr. Det er en forlengelse av systembussen. På hovedkortet ender systembussen i brikkesettet,
                som danner broer til de andre bussene. </p>
                <p>Man har mange forskjellige typer og versjoner av utvidelsesbusser, men i dag så er den mest vanlige
                PCIe 3.0. PCIe porter finner man i forskjellige størrelser: 1x, 2x, x4, x8, x16 og flere i den nye M.2
                formfaktoren. I PCIe versjon 1.x hadde man hastigheter opp til 4GB/s, i 2.x hadde man opp til 8GB/s og i
                versjon 3.x så har man opp til 16GB/s. Versjon 4.0 holder på å bli utviklet og skal levere opp til
                32GB/s. Alle disse hastighetene er over x16.</p>
                <div class="image full image-figure">
                    <img src="images/laboppgave/pci.jpg" class="image-zoomable">
                    <p class="subtle">Bilde nr 3.</p>
                </div>
            </section>
            <section>
                <h3>Hvor mange og hva slags ekstrakort er det plass til?</h3>
                <p>Det er allerede et ekstrakort plugget i (et grafikkort), men er plass til 3 til (altså totalt 4). Man
                kan plugge inn grafikkort, RAID kort, SSD, nettverkskort, lydkort, og andre kort som går over PCI.</p>
                <div class="image full image-figure">
                    <img src="images/laboppgave/utvidelse.jpg" class="image-zoomable">
                    <p class="subtle">Bilde nr 4.</p>
                </div>
            </section>
            <section>
                <h3>Hva slags harddisk har maskinen, hvor stor er den?</h3>
                <p>Det er en Seagate HDD på 160GB som spinner i 7200RPM. (Se bilde nr. 3)</p>
            </section>
            <section>
                <h3>Hvor mange disker kan maskinen ha?</h3>
                <p>Hovedkortet har 4 SATA porter, så man kan installere 4 disker. Det er også mulig å koble til SSD via
                PCI. Så totalt kan man ha 8 disker om man regner med PCI SSD, men det er kun plass til 2 harddisker i
                harddisk-buret, så noe mer enn det ville ikke festet på en skikkelig måte.</p>
            </section>
            <section>
                <h3>Finn RAM-modulene. Øv dere på å ta dem ut og sette dem tilbake.</h3>
                <p>Vi øvde på å ta de inn og ut <i class="icon-smiley-happy-5"></i></p>
                <div class="image full image-figure">
                    <img src="images/laboppgave/ram2.jpg" class="image-zoomable">
                    <p class="subtle">Bilde nr 5.</p>
                </div>
            </section>
            <section>
                <h3>Hva slags RAM-modul har maskinen (type, størrelse, hastighet …)? Hvilke andre typer RAM-moduler
                brukes. Hva er forskjellen på Flash og vanlig RAM?</h3>
                <p>Maskinen har 2 RAM brikker fra Nanya Tec, og 2 fra OCZ. De fra Nanya Tec var på 1024MB (1GB) og
                kjørte på 2048Mhz. RAM brikkene fra OCZ var på 2048MB (2GB) og kjørte på 2048Mhz. Flash minne, i
                motsetning til RAM, vil huske data endt strømtilførsel, er som regel tregere, men har mye større
                lagringskapasitet.</p>
            </section>
            <section>
                <h3>Hvor mange Megabyte RAM har maskinen?</h3>
                <p>Maskinen har 6144 MB RAM. (Se bilde nr. 2)</p>
            </section>
            <section>
                <h3>Kan dere finne hva slags chipset (brikkesett) datamaskinen har. Hvordan fungerer og hva slags
                oppgave har maskinens chipset?</h3>
                <p>Maskinen sitt brikkesett er Intel Conroe. Chipsetet sin oppgave er å kontrollere kommunikasjonen
                mellom prosessoren og eksterne enheter.</p>
            </section>
            <section>
                <h3>Skru sammen maskinen og sett på lokket.</h3>
                <p>Vi skrudde den sammen og satt på lokket.</p>
                <h3>Sjekk at maskinen starter opp.</h3>
                <p>Maskinen startet heldigvis opp igjen:</p>
                <div class="image full image-figure">
                    <img src="images/laboppgave/test.jpg" class="image-zoomable">
                    <p class="subtle">Bilde nr 6.</p>
                </div>
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