# Fast* - del 3
*Ikke faktisk fasit. Har bare kjørt koden og sett om det funket som forventet*
*OBS! Dette er min kode, altså nødvendigvis ikke beste løsning i det hele tatt, men den funker.*

NB! I denne delen skal du lage komplette nettsider (med HTML-kode).
 
Digital eksamen: Ønsker du å dele opp oppgaven i flere eller andre filer enn det svar-boksene i den digitale eksamen legger opp til, så skriv filene i samme svar-boks, og marker med kommenterer når hver fil starter/slutter.
 
I et idrettsstevne har vi en datafil (resultater.dat) med informasjon om resultater fra en konkurranse. Filen har følgende struktur, der ett resultat står på hver linje:
 
deltagernummer;fornavn;etternavn;idrettslag;tid_i_sekunder
 
Et eksempel på en fil med tre deltakere kan være:
 
1;Per;Persen;SIL;345
2;Ole;Olsen;TIL;231
5;Nils;Nilsen;SIL;434
 
I samme mappe som HTML-filene du skal lage i oppgave 3.1 og 3.2 ligger det bilder som blir brukt som logoer til idrettslagene. Disse har filnavn slik som sil.png, til.png osv. Merk deg at filnavnene samsvarer med hvordan navnet på idrettslaget er lagret i fila, men at filnavnet har små bokstaver.

---

## Oppgave 3.1
Lag en nettside som henter ut informasjonen fra fila resultater.dat og presenterer informasjonen på følgende måte:
(For bilde se illustrasjon til oppgaven)
Det teller positivt om du håndterer tidsomregning fra sekunder til minutter og sekunder, samt minutter/minutt og sekunder/sekund–problematikken i utskriften ved hjelp av en egenlaget/egenlagde funksjon(er). Synes du oppgaven er vanskelig fra før, kan dette nedprioriteres.

### [Besvarelse](del-3-1.html)

---

## Oppgave 3.2
Vi ønsker nå å lage et skjema for å registrere nye resultater i fila resultater.dat. Skjemaet skal hente ut idrettslagene fra en assosiativ array med navn på lag. Under finner du et eksempel på innhold, men denne vil i det virkelige systemet inneholde flere lag.
```
    var lag = [
        {lagkode: "SIL", navn: "Smartøy Idrettslag"}, 
        {lagkode: "TIL", navn: "Turøy Idrettslag"}
    ];
```
 
(Se illustrasjon til oppgaven for skjermbilde)
 
Før knappen Registrer sender data videre til et PHP-script, som skriver informasjonen til slutten av fila, skal du sjekke følgende:
 
Deltakernummer er et tall større enn 0
Fornavn og etternavn skal ha mer enn 1 tegn hver
Tiden er et tall større enn 0
 
Skulle noe av dette ikke stemme skal det vises en meldingsboks (alert) på nettsiden med passende feilmelding(er)
 
Husk at du også skal lage selve PHP-fila som skal benyttes til skriving. Denne skal ha filnavnet registrer.php.
 
(Eksamenssystemet støtter kun én "kodeboks" til hver oppgave. Skriv PHP-fila i samme kodeboks, skilt med en kommentar. Se bort i fra at fargekodingen da ikke helt stemmer for PHP-koden)

### [Besvarelse](del-3-2.html)