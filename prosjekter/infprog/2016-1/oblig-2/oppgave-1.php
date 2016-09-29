<?php require_once('../../../../templates/head.php'); ?>
    <link rel="stylesheet" href="/~bjornarh/css/steps.css">
</head>
<body>
    <?php
        $activeStep = 1;
        require_once('steps.php');
    ?>
    <?php require_once('../../../../templates/nav.php'); ?>
    <article id="oppgave-1">
        <header id="intro">
            <h1>Oppgave 1</h1>
            <p>Lag et skjema for å opprette en bruker på en nettside bestående av felter for ønsket brukernavn, passord
            og en registrer knapp. Når man trykker knappen skal programmet sjekke om man har fylt ut feltene.</p>
            <p>Om ett eller begge feltene ikke inneholder noe skal du gi brukeren beskjed om dette. Om feltene er fylt
            ut skal du takke brukeren for registreringen</p>
        </header>
        <section id="result">
            <h2>Resultat</h2>
            <form id="o1-form" action="https://bjornarhagen.no/_/skole/hio/infprog/2016-01/oblig-2/submit.php" method="POST">
                <div class="row input-field">
                    <p id="o1-error-msg"></p>
                </div>
                <div class="row input-field">
                    <label for="o1-username" class="col s1"><i class="icon-user-2"></i></label>
                    <input type="text" id="o1-username" class="col s11" name="username" placeholder="Brukernavn" required>
                </div>
                <div class="row input-field">
                    <label for="o1-password" class="col s1"><i class="icon-lock-2"></i></label>
                    <input type="password" id="o1-password" class="col s11" name="password" placeholder="Passord" required>
                </div>
                <div class="row input-field">
                    <button id="o1-submit" type="submit" class="btn black">Registrer</button>
                </div>
            </form>
            <script>
                window.onload = ready;

                function ready() {
                    // Kjør submit function når bruker prøver å submite skjema
                    document.getElementById("o1-submit").onclick = submit;
                    document.getElementById("o1-form").addEventListener("submit", function(e) {
                        e.preventDefault(); // Stop skjema fra å sende data
                    });
                }

                function submit() {
                    document.getElementById("o1-submit").disabled = true;

                    var form = document.getElementById("o1-form");
                    var errorOutput = document.getElementById("o1-error-msg");
                    var formStatus = validate(form); // Kjør validate på skjema og lagre det funksjonen retunerer

                    if (formStatus === true) { // Hvis alt gikk som det skulle
                        showMessage("", "string");
                        sendData(form);
                    } else { // Noe gikk galt, vis feilmelding
                        document.getElementById("o1-submit").disabled = false;
                        var error = formStatus;

                        // Påkrevde felter er ikke fylt ut
                        if (error.requiredFields.length > 0) {
                            error = error.requiredFields;

                            errorOutput = "Vennligst fyll ut de påkrevde feltene (markert i rødt).";
                            for (var i = 0; i < error.length; i++) {
                                errorOutput += "<br>";
                                errorOutput += "\"" + error[i] + "\"";
                            }

                            showMessage(errorOutput, "string");
                        }
                    }
                }

                // Validerer skjema felter
                // Param: form er et form element
                function validate(form) {
                    var inputs = form.getElementsByTagName("input");
                    var errors = {};            // Samle errors i et object
                    var errorCheck = false;     // Bolean man kan skjekke for å se om det har blitt registrert noen errors, eller ikke.
                    errors.requiredFields = []; // Array som skal inneholde alle påkrevde felter som ikke ble fylt ut

                    // For hvert input felt i skjema
                    for (var i = 0; i < inputs.length; i++) {
                        // Hvis feltet har required attribute, og det ikke er skrevet noe i feltet
                        if (inputs[i].hasAttribute("required") && inputs[i].value.length === 0) {
                            errorCheck = true;

                            errors.requiredFields[errors.requiredFields.length] = inputs[i].getAttribute("placeholder"); // Legg til feltet i array

                            inputs[i].style.backgroundColor = "#FF5254"; // Rød
                            inputs[i].style.color = "#8d0002";           // Mørk rød

                            // Når bruker skriver noe i feltet, fjern markering
                            inputs[i].addEventListener("keypress", function() {
                                this.style.backgroundColor = "";
                                this.style.color = "";
                                this.removeEventListener("keypress", arguments.callee); // Slett eventListeneren
                            });
                        }
                    }

                    // Hvis noen error har blir registrert
                    if (errorCheck) {
                        return errors;
                    } else { // Alt gikk fint, return true
                        return true;
                    }
                }

                // Sender skjema data
                // Param: form er et form element.
                function sendData(form) {
                    var xhr = new XMLHttpRequest();
                    var data  = new FormData(form);

                    // Status endret, om ajax requestet er ferdig, return svar
                    xhr.addEventListener("readystatechange", function() {
                        if (xhr.readyState == XMLHttpRequest.DONE) {
                            showMessage(this.responseText, "json");
                            document.getElementById("o1-submit").disabled = false;

                            var inputs = form.getElementsByTagName("input");
                            for (var i = 0; i < inputs.length; i++) {
                                inputs[i].value = "";
                            }
                        }
                    });

                    // Noe gikk feil :/
                    xhr.addEventListener("error", function() {
                        showMessage(this.responseText, "string");
                        document.getElementById("o1-submit").disabled = false;
                    });

                    // Åpne request, hent metode og action fra skjema
                    xhr.open(form.getAttribute("method"), form.getAttribute("action"));

                    // Send data skrevet inn i skjema
                    xhr.send(data);
                }

                function showMessage(msg, type) {
                    var msgOutput = document.getElementById("o1-error-msg");

                    if (type == "string") {
                        msgOutput.innerHTML = msg;
                    } else if (type == "json") {
                        msg = JSON.parse(msg);
                        var tmpMsg = "Følgende data ble mottatt:<br>";

                        // Loop gjennom object
                        for (var key in msg) {
                            if (msg.hasOwnProperty(key) && msg[key] !== null) { // Fjern meta info og tomme properties
                                tmpMsg += key + ": " + msg[key] + "<br>";
                           }
                        }

                        tmpMsg += "<br><br>Passordet ble kryptert."
                        tmpMsg += "<br><br>Takk for at du registrerte deg."

                        msg = tmpMsg;
                        msgOutput.innerHTML = msg;
                    }
                }
            </script>
        </section>
        <section id="code">
            <h2>Koden</h2>
            <h3>JavaScript</h3>
            <pre class="language-javascript">
                <code>
                </code>
            </pre>
            <h3>HTML</h3>
            <pre class="language-html">
                <code>
                </code>
            </pre>
        </section>
    </article>
    <?php require_once('../../../../templates/footer.php'); ?>
    <script src="/~bjornarh/js/prism/prism.js"></script>
    <link rel="stylesheet" href="/~bjornarh/css/prism/prism.css">
</body>
</html>