<?php require_once('../../../templates/head.php'); ?>
    <link rel='stylesheet' href='/~bjornarh/fonts/hack/hack.css'>
</head>
<body class="article light">
    <?php require_once('../../../templates/nav.php'); ?>
    <article class="medium">
        <header>
            <h1>Kjenn din PC (Windows 10)</h1>
            <p>
                Denne delen handler om hva man kan finne ut om datamaskinens hardware fra operativsystemet og
                tilleggsprogrammer. Alle oppgavene skal dokumenteres på din studieweb med tekst og bilder.
            </p>
        </header>
        <section>
            <header>
                <h2>Spørsmål og svar</h2>
                <p>Jeg har en
                <a href="http://www.dell.com/en-us/shop/productdetails/xps-13-9350-laptop" target="_blank">Dell XPS 13 9350</a></p>
            </header>
            <section>
                <h3>Hva slags prosessor har maskinen?</h3>
                <p>Min datamaskin har en Intel Core i5-6200U. Det er en prosessor med 4 logiske kjerner. Prosessoren
                kjører vanligvis med en klokkehastighet på 2.40GHz, men kan kjøre på 2.80GHz ved overklokking.</p>
            </section>
            <section>
                <h3>Hvor mye minne har den?</h3>
                <p>Datamaskinen eller prosessoren? Datamaskinen min har 8192MB (8GB) med RAM. Prosessoren har 3MB cache.</p>
            </section>
            <section>
                <h3>Prøv om du kan finne en tastatur-snarvei for å komme til dette kontrollpanelet.</h3>
                <p>Dette kontrollpanelet? Finnes ingen standard tastatur-snarvei i Windows 10 som går til
                "Control Panel\System and Security\System". For å komme til det nye Windows 10 kontrollpanelet kan man
                trykke på <kbd>Windows-knapp</kbd><kbd>+</kbd><kbd>I</kbd>.</p>
            </section>
            <section>
                <h3>Beskriv hvilke enheter som er koblet til datamaskinen, og det du kan finne ut om egenskapene deres.</h3>
                <p>Usikker på hva som menes med enheter som er koblet til datamaskinen, men for øyeblikket har jeg en
                datamus koblet til maskinen. I device manager kommer denne musen opp som "HID-compliant mouse".</p>
                <p>Internt i maskinen er det koblet til en god del flere ting. Blant annet skjerm, nettverkskort, tastatur,
                touchpad, RAM, prosessor, høytalere, SSD og et kamera.</p>
                <p>I device manager kan man finne frem til hver ting og høyreklikke på ønsket element og velge properties
                (norsk: egenskaper). Da får man opp et eget vindu som vil inneholde informasjon om enheten.</p>
                <p>Jeg kan f.eks. se på egenskapene til hver kjerne i prosessoren til maskinen og se hvem som har lagd
                den eller hvem som har lagd driverene, når de ble signert, sist oppdatert eller versjonen. Fra vindu kan
                man egentlig finne ut det meste Windows vet om enheten (det er en god del).</p>
            </section>
            <section>
                <h3>Hvilke oppløsninger kan dere bruke? Finnes det en snarvei for å endre oppløsning?</h3>
                <p>Maskinen lar meg velge fra følgende oppløsninger:
                    <ul>
                        <li>1920 x 1080</li>
                        <li>1680 x 1050</li>
                        <li>1600 x 900</li>
                        <li>1440 x 900</li>
                        <li>1400 x 1050</li>
                        <li>1366 x 768</li>
                        <li>1360 x 768</li>
                        <li>1280 x 1024</li>
                        <li>1280 x 960</li>
                        <li>1280 x 800</li>
                        <li>1280 x 768</li>
                        <li>1280 x 720</li>
                        <li>1280 x 600</li>
                        <li>1152 x 864</li>
                        <li>1024 x 768</li>
                        <li>800 x 600</li>
                    </ul>
                    Det finnes ikke en standard tastatur-snarvei i Windows 10 som vil ta deg direkte til instillinger for
                    å endre skjermoppløsningen.</p>
            </section>
            <section>
                <h3>Hvilken oppløsning har selve skjermen dere bruker? (Native oppløsning).</h3>
                <p>Skjermen min har en native resolution på 1920 x 1080 (1080p).</p>
            </section>
            <section>
                <h3>(Disk) Hvor stor er den? Hvor mye er i bruk? Hvor mye er ledig?</h3>
                <p>Datamaskinen min har en 256GB SSD. Windows disk manager sier at SSD-en har en kapasitet på
                244070MB (244,070GB), hvorav 500MB (0,50GB) er reservert. I Windows Explorer står det at disken er på
                225GB og at jeg har brukt 144GB og har 80,6GB ledig.</p>
            </section>
            <section>
                <h3>Hva slags filsystem bruker den? Hvilke andre filsystem finnes (test en minnepenn/minnekort og en cd)?
                Hvilken oppgave har filsystemet, og hva er forskjellen på de ulike filsystemene?</h3>
                <p>Disken i maskinen min bruker filsystemet NTFS. Det finnes ekstremt mange forskjellige filsystemer, men
                f.eks. en av minnepinnene jeg har bruker FAT32.</p>
                <p>Oppgaven til filsystemet er å kontrollere hvordan data lagres og leses (tolkes).</p>
                <p>Foskjellen på filsystemer går på hvor store disker og filer kan være, hvor mange filer eller mapper
                som kan være inni en mappe, totalt antall mapper og filer på disken, hvor store clustere
                (norsk: dataklynger) man kan ha, hvordan meta-data som er til hver fil eller mappe, hvor dyp mappe
                strukturen kan være og mye mer.</p>
                <p>FAT32 f.eks. støtter maks 8TB partisjoner og 4GB filer. NTFS i sammenligning støtter opp til 256 TiB
                (Tebibyte) filer.</p>
            </section>
            <section>
                <h3>Prøv også å kjøre programmet ”MSinfo32”, ”msconfig” og ”Task manager” og se om dere finner mer
                informasjon om programvare og utstyret i maskinen.</h3>
            </section>
            <section>
                <h3>Finn og last ned programmet ”Pirform Speccy” og se om dere finner ytterligere informasjon om
                hardware. Se om dere finner ut hva slags minnemoduler det er i maskinen</h3>
            </section>
            <section>
                <h3>Hvilke eksterne tilkoblingsmuligheter har din maskin?</h3>
            </section>
            <section>
                <h3>Bør du velge USB 2.0, USB 3.0, USB-C, eSATA eller Thunderbolt? Begrunn svaret.</h3>
            </section>
            <section>
                <h3>Bør du velge USB 2.0, USB 3.0, USB-C, eSATA eller Thunderbolt? Begrunn svaret.</h3>
            </section>
            <section>
                <h3>Hvilke standarder av trådløst nettverk støtter egentlig min maskin? (For eksempel 802.11b?, g?, a?,
                n?, ???) Hvilken hastighet kan man forvente når man overfører filer over trådløst nettverk 802.11n?</h3>
            </section>
            <section>
                <h3>Sjekk om det er plass til flere minnemoduler i din maskin.</h3>
            </section>
            <section>
                <h3>Finn passende minne og en rask disk til en god pris i en norsk nettbutikk. Oppgi varenr / url i
                besvarelsen.</h3>
            </section>
            <section>
                <h3>Hvilke tilkoblingsmuligheter er det for å få koblet din maskin til en slik TV?</h3>
            </section>
            <section>
                <h3>Hva slags skjermutgang må maskinen ha?</h3>
            </section>
            <section>
                <h3>Hvordan lager du en egen bruker til henne? Hvilken kontotype velger du?</h3>
            </section>
        </section>
    </article>
    <?php require_once('../../../templates/footer.php'); ?>
</body>
</html>