<?php require_once('../../../../templates/head.php'); ?>
    <link rel="stylesheet" href="/~bjornarh/css/steps.css">
    <link rel='stylesheet' href='/~bjornarh/fonts/hack/hack.css'>
    <style>
        #o1-form-login {
            display: none;
        }
    </style>
</head>
<body>
    <?php
        $activeStep = 2;
        require_once('steps.php');
    ?>
    <?php require_once('../../../../templates/nav.php'); ?>
    <article>
        <header id="intro">
            <h1>Oppgave 1, 2 & 3</h1>
            <p>Lag et skjema for å opprette en bruker på en nettside som inneholder materiale som kun er egnet for et
            voksent publikum. Skjemaet skal bestå av felter for ønsket brukernavn, passord, passordbekreftelse,
            alderskontroll og en registrer knapp. Når man trykker knappen skal programmet sjekke om man har fylt ut
            feltene, at passordet i passordfeltene er like og at brukeren er minst 18 år gammel. Om ett eller begge
            feltene ikke inneholder noe skal du gi brukeren beskjed om hvilke felter som ikke er fylt ut. Om brukeren
            ikke har skrevet inn passordet likt i feltene skal du gi en beskjed om dette. Om brukeren er under 18 år
            skal du gi en passende tilbakemelding ang dette. Om feltene er korrekt fylt ut skal du takke brukeren for
            registreringen.</p>
        </header>
        <section id="result">
            <h2>Resultat</h2>
            <p>Hei! :)</p>
            <p>Du kan registrere deg i skjema under. Etter du har registrert deg, vil du kunne logge inn!</p>
            <p>Merk: Brukernavnet ditt må være unikt. Alle passord blir kryptert.</p>
            <div class="row input-field">
                <p id="o1-error-msg" class="font-brand"></p>
            </div>
            <form id="o1-form-register" action="https://bjornarhagen.no/_/skole/hio/infprog/2016-01/oblig-2/submit.php" method="POST">
                <div class="row input-field">
                    <label for="o1-username" class="col s1"><i class="icon-user-2"></i></label>
                    <input type="text" id="o1-username" class="col s11" name="username" placeholder="Brukernavn" required>
                </div>
                <div class="row input-field">
                    <label for="o1-password" class="col s1"><i class="icon-lock-2"></i></label>
                    <input type="password" id="o1-password" class="col s11" name="password" placeholder="Passord" required length-min="5">
                </div>
                <div class="row input-field">
                    <label for="o1-password-repeat" class="col s1"><i class="icon-lock-2"></i></label>
                    <input type="password" id="o1-password-repeat" class="col s11" name="password-repeat" placeholder="Passord igjen" required length-min="5" data-match="o1-password">
                </div>
                <div class="row input-field">
                    <label for="o1-age" class="col s1"><i class="icon-cake-2"></i></label>
                    <input type="number" id="o1-age" class="col s11" name="age" placeholder="Hvor gammel er du?" required data-min="18">
                </div>
                <div class="row input-field">
                    <button id="o1-submit" type="submit" class="btn black">Registrer</button>
                </div>
            </form>
            <form id="o1-form-login" action="https://bjornarhagen.no/_/skole/hio/infprog/2016-01/oblig-2/login.php" method="POST">
                <div class="row input-field">
                    <label for="o1-username" class="col s1"><i class="icon-user-2"></i></label>
                    <input type="text" id="o1-username" class="col s11" name="username" placeholder="Brukernavn" required>
                </div>
                <div class="row input-field">
                    <label for="o1-password" class="col s1"><i class="icon-lock-2"></i></label>
                    <input type="password" id="o1-password" class="col s11" name="password" placeholder="Passord" required>
                </div>
                <div class="row input-field">
                    <button id="o1-login" type="submit" class="btn black">Login</button>
                </div>
            </form>
            <script>
                window.onload = ready;

                function ready() {
                    var regForm = document.getElementById("o1-form-register");
                    var logForm = document.getElementById("o1-form-login");

                    // Kjør submit function når bruker prøver å submite skjema
                    document.getElementById("o1-submit").onclick = function() {
                        submit(regForm);
                    };
                    document.getElementById("o1-login").onclick = function() {
                        submit(logForm);
                    };

                    regForm.addEventListener("submit", function(e) {
                        e.preventDefault(); // Stop skjema fra å sende data
                    });

                    logForm.addEventListener("submit", function(e) {
                        e.preventDefault();
                    });
                }

                function submit(form) {
                    document.getElementById("o1-submit").disabled = true;

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

                            errorOutput = "Vennligst fyll ut de påkrevde feltene.";
                            for (var i = 0; i < error.length; i++) {
                                errorOutput += "<br>";
                                errorOutput += "<b>" + error[i] + "</b>";
                            }

                            showMessage(errorOutput, "string");
                        } else if (error.matchingFields.length > 0) { // Felter som skal matche er ikke like
                            error = error.matchingFields;

                            errorOutput = "Feltene matched ikke!";
                            for (var i = 0; i < error.length; i++) {
                                errorOutput += "<br>";
                                errorOutput += "<b>" + error[i] + "</b>";
                            }

                            showMessage(errorOutput, "string");
                        } else if (error.minLengthFields.length > 0) { // Felter som ikke er lange nok
                            error = error.minLengthFields;


                            errorOutput = "Feltene oppfyller ikke krav";
                            for (var i = 0; i < error.length; i++) {
                                errorOutput += "<br>";
                                errorOutput += "<b>" + error[i] + "</b>";
                            }

                            showMessage(errorOutput, "string");
                        } else if (error.minFields.length > 0) { // Felter som ikke er over minimum verdi
                            error = error.minFields;

                            errorOutput = "Feltene oppfyller ikke krav";
                            for (var i = 0; i < error.length; i++) {
                                errorOutput += "<br>";
                                errorOutput += "<b>" + error[i] + "</b>";
                            }

                            showMessage(errorOutput, "string");
                        }
                    }
                }

                // Validerer skjema felter
                // Param: form er et form element
                function validate(form) {
                    var inputs = form.getElementsByTagName("input");
                    var errors = {};             // Samle errors i et object
                    var errorCheck = false;      // bolean man kan skjekke for å se om det har blitt registrert noen errors, eller ikke
                    errors.requiredFields = [];  // påkrevde felter som ikke ble fylt ut
                    errors.matchingFields = [];  // felter som skal match et annet felt, ment ikke matcher
                    errors.minFields = [];       // felter som ikke er større enn sin minimum verdi
                    errors.minLengthFields = []; // felter som ikke er lengere enn sin minimum lengde

                    function markField(field) {
                        field.style.backgroundColor = "#FF5254"; // Rød
                        field.style.color = "#8d0002";           // Mørk rød

                        // Når bruker skriver noe i feltet, fjern markering
                        field.addEventListener("keypress", function() {
                            unmarkField(this);
                            this.removeEventListener("keypress", arguments.callee); // Slett eventListeneren
                        });
                    }

                    function unmarkField(field) {
                        field.style.backgroundColor = "";
                        field.style.color = "";
                    }

                    // For hvert input felt i skjema
                    for (var i = 0; i < inputs.length; i++) {
                        unmarkField(inputs[i]); // Fjern markering på felt

                        // Sjekk at påkrevde felter ikke er tomme
                        if (inputs[i].hasAttribute("required") && inputs[i].value.length === 0) {
                            errorCheck = true;

                            errors.requiredFields[errors.requiredFields.length] = inputs[i].getAttribute("placeholder"); // Legg til feltet i array

                            markField(inputs[i]); // Marker feltet
                        } else if (inputs[i].hasAttribute("data-match")) { // Sjekk om felter som skal matche er like
                            // Kunne brukt 'dataset.match' her, men SELVFØGELIG funker det ikke i tidligere
                            // Internet Explorer versjoner. IE 11 og opp faktisk..... microsoft pls :(
                            var match = document.getElementById(inputs[i].getAttribute("data-match"));

                            if (inputs[i].value !== match.value) {
                                errorCheck = true;

                                errors.matchingFields[errors.matchingFields.length] = match.getAttribute("placeholder");
                                errors.matchingFields[errors.matchingFields.length] = inputs[i].getAttribute("placeholder");

                                markField(match);
                                markField(inputs[i]);
                            }
                        } else if (inputs[i].hasAttribute("length-min")) { // Sjekk om feltene er lange nok
                            if (inputs[i].value.length < inputs[i].getAttribute("length-min")) {
                                errorCheck = true;

                                errors.minLengthFields[errors.minLengthFields.length] = inputs[i].getAttribute("placeholder") + " (Må være lengere enn " + inputs[i].getAttribute("length-min") + ")";

                                markField(inputs[i]);
                            }
                        } else if (inputs[i].hasAttribute("data-min")) { // Sjekk om felter er over minimum verdi
                            if (parseInt(inputs[i].value) < inputs[i].getAttribute("data-min")) {
                                errorCheck = true;

                                errors.minFields[errors.minFields.length] = inputs[i].getAttribute("placeholder") + " (Minst " + inputs[i].getAttribute("data-min") + ")";

                                markField(inputs[i]);
                            }
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
                            document.getElementById("o1-submit").disabled = false;

                            showMessage(this.responseText, "json"); // Vis svar fra server

                            if ("error" in JSON.parse(this.responseText)) {
                                document.getElementById("o1-username").focus(); // Sett markør i username feltet
                            } else {
                                document.getElementById("o1-form-register").style.display = "none"; // Skjul registrer knapp
                                document.getElementById("o1-form-login").style.display = "block"; // og vis login

                                // Tøm skjema
                                var inputs = form.getElementsByTagName("input");
                                for (var i = 0; i < inputs.length; i++) {
                                    inputs[i].value = "";
                                }
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
                        var tmpMsg = "<b>Følgende data ble mottatt:</b><br>";

                        // Loop gjennom object
                        for (var key in msg) {
                            if (msg.hasOwnProperty(key) && msg[key] !== null) { // Fjern meta info og tomme properties
                                tmpMsg += "<b>" + key + "</b>: " + msg[key] + "<br>";
                           }
                        }

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
window.onload = ready;

function ready() {
    var regForm = document.getElementById(&quot;o1-form-register&quot;);
    var logForm = document.getElementById(&quot;o1-form-login&quot;);

    // Kjør submit function når bruker prøver å submite skjema
    document.getElementById(&quot;o1-submit&quot;).onclick = function() {
        submit(regForm);
    };
    document.getElementById(&quot;o1-login&quot;).onclick = function() {
        submit(logForm);
    };

    regForm.addEventListener(&quot;submit&quot;, function(e) {
        e.preventDefault(); // Stop skjema fra å sende data
    });

    logForm.addEventListener(&quot;submit&quot;, function(e) {
        e.preventDefault();
    });
}

function submit(form) {
    document.getElementById(&quot;o1-submit&quot;).disabled = true;

    var errorOutput = document.getElementById(&quot;o1-error-msg&quot;);
    var formStatus = validate(form); // Kjør validate på skjema og lagre det funksjonen retunerer

    if (formStatus === true) { // Hvis alt gikk som det skulle
        showMessage(&quot;&quot;, &quot;string&quot;);
        sendData(form);
    } else { // Noe gikk galt, vis feilmelding
        document.getElementById(&quot;o1-submit&quot;).disabled = false;
        var error = formStatus;

        // Påkrevde felter er ikke fylt ut
        if (error.requiredFields.length &gt; 0) {
            error = error.requiredFields;

            errorOutput = &quot;Vennligst fyll ut de påkrevde feltene.&quot;;
            for (var i = 0; i &lt; error.length; i++) {
                errorOutput += &quot;&lt;br&gt;&quot;;
                errorOutput += &quot;&lt;b&gt;&quot; + error[i] + &quot;&lt;/b&gt;&quot;;
            }

            showMessage(errorOutput, &quot;string&quot;);
        } else if (error.matchingFields.length &gt; 0) { // Felter som skal matche er ikke like
            error = error.matchingFields;

            errorOutput = &quot;Feltene matched ikke!&quot;;
            for (var i = 0; i &lt; error.length; i++) {
                errorOutput += &quot;&lt;br&gt;&quot;;
                errorOutput += &quot;&lt;b&gt;&quot; + error[i] + &quot;&lt;/b&gt;&quot;;
            }

            showMessage(errorOutput, &quot;string&quot;);
        } else if (error.minLengthFields.length &gt; 0) { // Felter som ikke er lange nok
            error = error.minLengthFields;


            errorOutput = &quot;Feltene oppfyller ikke krav&quot;;
            for (var i = 0; i &lt; error.length; i++) {
                errorOutput += &quot;&lt;br&gt;&quot;;
                errorOutput += &quot;&lt;b&gt;&quot; + error[i] + &quot;&lt;/b&gt;&quot;;
            }

            showMessage(errorOutput, &quot;string&quot;);
        } else if (error.minFields.length &gt; 0) { // Felter som ikke er over minimum verdi
            error = error.minFields;

            errorOutput = &quot;Feltene oppfyller ikke krav&quot;;
            for (var i = 0; i &lt; error.length; i++) {
                errorOutput += &quot;&lt;br&gt;&quot;;
                errorOutput += &quot;&lt;b&gt;&quot; + error[i] + &quot;&lt;/b&gt;&quot;;
            }

            showMessage(errorOutput, &quot;string&quot;);
        }
    }
}

// Validerer skjema felter
// Param: form er et form element
function validate(form) {
    var inputs = form.getElementsByTagName(&quot;input&quot;);
    var errors = {};             // Samle errors i et object
    var errorCheck = false;      // bolean man kan skjekke for å se om det har blitt registrert noen errors, eller ikke
    errors.requiredFields = [];  // påkrevde felter som ikke ble fylt ut
    errors.matchingFields = [];  // felter som skal match et annet felt, ment ikke matcher
    errors.minFields = [];       // felter som ikke er større enn sin minimum verdi
    errors.minLengthFields = []; // felter som ikke er lengere enn sin minimum lengde

    function markField(field) {
        field.style.backgroundColor = &quot;#FF5254&quot;; // Rød
        field.style.color = &quot;#8d0002&quot;;           // Mørk rød

        // Når bruker skriver noe i feltet, fjern markering
        field.addEventListener(&quot;keypress&quot;, function() {
            unmarkField(this);
            this.removeEventListener(&quot;keypress&quot;, arguments.callee); // Slett eventListeneren
        });
    }

    function unmarkField(field) {
        field.style.backgroundColor = &quot;&quot;;
        field.style.color = &quot;&quot;;
    }

    // For hvert input felt i skjema
    for (var i = 0; i &lt; inputs.length; i++) {
        unmarkField(inputs[i]); // Fjern markering på felt

        // Sjekk at påkrevde felter ikke er tomme
        if (inputs[i].hasAttribute(&quot;required&quot;) && inputs[i].value.length === 0) {
            errorCheck = true;

            errors.requiredFields[errors.requiredFields.length] = inputs[i].getAttribute(&quot;placeholder&quot;); // Legg til feltet i array

            markField(inputs[i]); // Marker feltet
        } else if (inputs[i].hasAttribute(&quot;data-match&quot;)) { // Sjekk om felter som skal matche er like
            // Kunne brukt 'dataset.match' her, men SELVFØGELIG funker det ikke i tidligere
            // Internet Explorer versjoner. IE 11 og opp faktisk..... microsoft pls :(
            var match = document.getElementById(inputs[i].getAttribute(&quot;data-match&quot;));

            if (inputs[i].value !== match.value) {
                errorCheck = true;

                errors.matchingFields[errors.matchingFields.length] = match.getAttribute(&quot;placeholder&quot;);
                errors.matchingFields[errors.matchingFields.length] = inputs[i].getAttribute(&quot;placeholder&quot;);

                markField(match);
                markField(inputs[i]);
            }
        } else if (inputs[i].hasAttribute(&quot;length-min&quot;)) { // Sjekk om feltene er lange nok
            if (inputs[i].value.length &lt; inputs[i].getAttribute(&quot;length-min&quot;)) {
                errorCheck = true;

                errors.minLengthFields[errors.minLengthFields.length] = inputs[i].getAttribute(&quot;placeholder&quot;) + &quot; (Må være lengere enn &quot; + inputs[i].getAttribute(&quot;length-min&quot;) + &quot;)&quot;;

                markField(inputs[i]);
            }
        } else if (inputs[i].hasAttribute(&quot;data-min&quot;)) { // Sjekk om felter er over minimum verdi
            if (parseInt(inputs[i].value) &lt; inputs[i].getAttribute(&quot;data-min&quot;)) {
                errorCheck = true;

                errors.minFields[errors.minFields.length] = inputs[i].getAttribute(&quot;placeholder&quot;) + &quot; (Minst &quot; + inputs[i].getAttribute(&quot;data-min&quot;) + &quot;)&quot;;

                markField(inputs[i]);
            }
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
    xhr.addEventListener(&quot;readystatechange&quot;, function() {
        if (xhr.readyState == XMLHttpRequest.DONE) {
            document.getElementById(&quot;o1-submit&quot;).disabled = false;

            showMessage(this.responseText, &quot;json&quot;); // Vis svar fra server

            if (&quot;error&quot; in JSON.parse(this.responseText)) {
                document.getElementById(&quot;o1-username&quot;).focus(); // Sett markør i username feltet
            } else {
                document.getElementById(&quot;o1-form-register&quot;).style.display = &quot;none&quot;; // Skjul registrer knapp
                document.getElementById(&quot;o1-form-login&quot;).style.display = &quot;block&quot;; // og vis login

                // Tøm skjema
                var inputs = form.getElementsByTagName(&quot;input&quot;);
                for (var i = 0; i &lt; inputs.length; i++) {
                    inputs[i].value = &quot;&quot;;
                }
            }
        }
    });

    // Noe gikk feil :/
    xhr.addEventListener(&quot;error&quot;, function() {
        showMessage(this.responseText, &quot;string&quot;);
        document.getElementById(&quot;o1-submit&quot;).disabled = false;
    });

    // Åpne request, hent metode og action fra skjema
    xhr.open(form.getAttribute(&quot;method&quot;), form.getAttribute(&quot;action&quot;));

    // Send data skrevet inn i skjema
    xhr.send(data);
}

function showMessage(msg, type) {
    var msgOutput = document.getElementById(&quot;o1-error-msg&quot;);

    if (type == &quot;string&quot;) {
        msgOutput.innerHTML = msg;
    } else if (type == &quot;json&quot;) {
        msg = JSON.parse(msg);
        var tmpMsg = &quot;&lt;b&gt;Følgende data ble mottatt:&lt;/b&gt;&lt;br&gt;&quot;;

        // Loop gjennom object
        for (var key in msg) {
            if (msg.hasOwnProperty(key) && msg[key] !== null) { // Fjern meta info og tomme properties
                tmpMsg += &quot;&lt;b&gt;&quot; + key + &quot;&lt;/b&gt;: &quot; + msg[key] + &quot;&lt;br&gt;&quot;;
           }
        }

        msg = tmpMsg;
        msgOutput.innerHTML = msg;
    }
}
                </code>
            </pre>
            <h3>PHP</h3>
            <div class="space-h-medium">
                <p>En god del av PHP koden har blitt sensurert av sikkerhetsmessige årsaker.</p>
                <p>Submit.php - Håndteer bruker registrasjon</p>
            </div>
            <pre class="language-php">
                <code>
&lt;?php
    **SENSURERT**

    if ($_POST == NULL) {
        die(&quot;Ingen data ble motatt, noe gikk galt.&quot;);
    }

    function encryptData($data) {
        return **SENSURERT**
    }

    $data = $_POST;

    // Escape post data
    foreach($data as $name =&gt; $value) {
        $data[$name] = htmlspecialchars($value);
    }

    $conn = new PDO(**SENSURERT**);
    $sth = $conn-&gt;prepare('
        **SENSURERT**
    ');

    $sth-&gt;bindParam(':username', $data['username'], PDO::PARAM_STR);
    $sth-&gt;execute();
    $result = $sth-&gt;fetchColumn();
    $sth = null;

    if ($result === false) {
        if (isset($data['password'])) {
            if (isset($data['password-repeat'])) {
                if ($data['password'] !== $data['password-repeat']) {
                    die('Passordene matcher ikke');
                }
            }

            $data['password'] = encryptData($data['password']);
        }

        // Open connection
        $conn = new PDO(**SENSURERT**);

        $sth = $conn-&gt;prepare('
            **SENSURERT**
        ');

        $sth-&gt;bindParam(':username', $data['username'], PDO::PARAM_STR);
        $sth-&gt;bindParam(':password', $data['password'], PDO::PARAM_STR);
        $sth-&gt;bindParam(':age', $data['age'], PDO::PARAM_INT);
        $sth-&gt;bindParam(':name_display', $data['username'], PDO::PARAM_STR);
        $sth-&gt;execute();
        $sth = null;

        // Close connection
        $conn = null;

        echo(json_encode($data));
    } else {
        $error = new stdClass;

        $error-&gt;error = &quot;Dessverre så er '&quot; . $data['username'] . &quot;' er allerede tatt. Du må velge et annet brukernavn.&quot;;
        echo(json_encode($error));
    }
                </code>
            </pre>
            <div class="space-h-medium">
                <p>Login.php - Håndteer login</p>
            </div>
            <pre class="language-php">
                <code>
&lt;?php
    **SENSURERT**

    if ($_POST == NULL) {
        die(&quot;Ingen data ble motatt, noe gikk galt.&quot;);
    }

    function showError($msg) {
        $error = new stdClass;
        $error-&gt;error = $msg;
        echo(json_encode($error));
    }

    $data = $_POST;

    // Escape post data
    foreach($data as $name =&gt; $value) {
        $data[$name] = htmlspecialchars($value);
    }

    $conn = new PDO(SENSURERT);

    $sth = $conn-&gt;prepare('
        **SENSURERT**
    ');
    $sth-&gt;bindParam(':username', $data[&quot;username&quot;], PDO::PARAM_STR);
    $sth-&gt;execute();
    $result = $sth-&gt;fetch(PDO::FETCH_ASSOC);
    $sth = null;
    
    if (**SENSURERT**) {
        $sth = $conn-&gt;prepare('
            **SENSURERT**
        ');

        $sth-&gt;bindParam(':username', $data[&quot;username&quot;], PDO::PARAM_STR);
        $sth-&gt;execute();
        $result = $sth-&gt;fetch(PDO::FETCH_ASSOC);
        $sth = null;

        if ($result === false) {
            showError(&quot;Noe gikk galt :/&quot;);
        } else {
            echo(json_encode($result));
        }
    } else if ($result === false) {
        showError(&quot;Brukeren finnes ikke&quot;);
    } else {
        showError(&quot;Feil passord :/&quot;);
    }

    $conn = null;

                </code>
            </pre>
            <h3>HTML</h3>
            <pre class="language-html">
                <code>
&lt;form id=&quot;o1-form-register&quot; action=&quot;submit.php&quot; method=&quot;POST&quot;&gt;
    &lt;div class=&quot;row input-field&quot;&gt;
        &lt;label for=&quot;o1-username&quot; class=&quot;col s1&quot;&gt;&lt;i class=&quot;icon-user-2&quot;&gt;&lt;/i&gt;&lt;/label&gt;
        &lt;input type=&quot;text&quot; id=&quot;o1-username&quot; class=&quot;col s11&quot; name=&quot;username&quot; placeholder=&quot;Brukernavn&quot; required&gt;
    &lt;/div&gt;
    &lt;div class=&quot;row input-field&quot;&gt;
        &lt;label for=&quot;o1-password&quot; class=&quot;col s1&quot;&gt;&lt;i class=&quot;icon-lock-2&quot;&gt;&lt;/i&gt;&lt;/label&gt;
        &lt;input type=&quot;password&quot; id=&quot;o1-password&quot; class=&quot;col s11&quot; name=&quot;password&quot; placeholder=&quot;Passord&quot; required&gt;
    &lt;/div&gt;
    &lt;div class=&quot;row input-field&quot;&gt;
        &lt;label for=&quot;o1-password-repeat&quot; class=&quot;col s1&quot;&gt;&lt;i class=&quot;icon-lock-2&quot;&gt;&lt;/i&gt;&lt;/label&gt;
        &lt;input type=&quot;password&quot; id=&quot;o1-password-repeat&quot; class=&quot;col s11&quot; name=&quot;password-repeat&quot; placeholder=&quot;Passord igjen&quot; required data-match=&quot;o1-password&quot;&gt;
    &lt;/div&gt;
    &lt;div class=&quot;row input-field&quot;&gt;
        &lt;label for=&quot;o1-age&quot; class=&quot;col s1&quot;&gt;&lt;i class=&quot;icon-cake-2&quot;&gt;&lt;/i&gt;&lt;/label&gt;
        &lt;input type=&quot;number&quot; id=&quot;o1-age&quot; class=&quot;col s11&quot; name=&quot;age&quot; placeholder=&quot;Hvor gammel er du?&quot; required data-min=&quot;18&quot;&gt;
    &lt;/div&gt;
    &lt;div class=&quot;row input-field&quot;&gt;
        &lt;button id=&quot;o1-submit&quot; type=&quot;submit&quot; class=&quot;btn black&quot;&gt;Registrer&lt;/button&gt;
    &lt;/div&gt;
&lt;/form&gt;
&lt;form id=&quot;o1-form-login&quot; action=&quot;login.php&quot; method=&quot;POST&quot;&gt;
    &lt;div class=&quot;row input-field&quot;&gt;
        &lt;label for=&quot;o1-username&quot; class=&quot;col s1&quot;&gt;&lt;i class=&quot;icon-user-2&quot;&gt;&lt;/i&gt;&lt;/label&gt;
        &lt;input type=&quot;text&quot; id=&quot;o1-username&quot; class=&quot;col s11&quot; name=&quot;username&quot; placeholder=&quot;Brukernavn&quot; required&gt;
    &lt;/div&gt;
    &lt;div class=&quot;row input-field&quot;&gt;
        &lt;label for=&quot;o1-password&quot; class=&quot;col s1&quot;&gt;&lt;i class=&quot;icon-lock-2&quot;&gt;&lt;/i&gt;&lt;/label&gt;
        &lt;input type=&quot;password&quot; id=&quot;o1-password&quot; class=&quot;col s11&quot; name=&quot;password&quot; placeholder=&quot;Passord&quot; required&gt;
    &lt;/div&gt;
    &lt;div class=&quot;row input-field&quot;&gt;
        &lt;button id=&quot;o1-login&quot; type=&quot;submit&quot; class=&quot;btn black&quot;&gt;Login&lt;/button&gt;
    &lt;/div&gt;
&lt;/form&gt;
                </code>
            </pre>
        </section>
    </article>
    <?php require_once('../../../../templates/footer.php'); ?>
    <script src="/~bjornarh/js/prism/prism.js"></script>
    <link rel="stylesheet" href="/~bjornarh/css/prism/prism.css">
</body>
</html>