<?php require_once('../../../../templates/head.php'); ?>
    <link rel="stylesheet" href="/~bjornarh/css/steps.css">
    <link rel='stylesheet' href='/~bjornarh/fonts/hack/hack.css'>
</head>
<body>
    <?php
        $activeStep = 1;
        require_once('steps.php');
    ?>
    <?php require_once('../../../../templates/nav.php'); ?>
    <article>
        <header id="intro">
            <h1>Oppgave <?= $activeStep; ?></h1>
            <p>
                Lag en array med noen selvvalgte tilfeldige tall, gjør så følgende med denne:
            </p>
            <ul>
                <li>Skriv ut arrayen</li>
                <li>Skriv ut arrayen baklengs</li>
                <li>Skriv ut annethvert tall i arrayen</li>
                <li>Skriv ut de tallene som er mindre enn 10 i arrayen</li>
                <li>Skriv ut alle partall i arrayen</li>
                <li>Finn summen av arrayen</li>
                <li>Finn antall elementer i arrayen</li>
                <li>Finn gjennomsnittet av arrayen</li>
                <li>Finn summen av partall i arrayen</li>
                <li>Finn minste element (la en variabel holde på minste element funnet til nå, mens du går gjennom lista, og sjekk hele tiden om denne verdien skal byttes ut med verdien du er på)</li>
                <li>Finn ut om en liste inneholder en bestemt verdi.</li>
                <li>Finn ut hvor mange forekomster det er av en bestemt verdi.</li>
            </ul>
        </header>
        <section id="result">
            <h2>Resultat</h2>
            <pre class="language-javascript"><code id="o1-array"></code></pre>
            <section>
                <h3>Skriv ut arrayen</h3>
                <div class="row input-field">
                    <input type="text" id="o1-output-1" class="col s12" readonly>
                </div>
            </section>
            <section>
                <h3>Skriv ut arrayen baklengs</h3>
                <div class="row input-field">
                    <input type="text" id="o1-output-2" class="col s12" readonly>
                </div>
            </section>
            <section>
                <h3>Skriv ut annethvert tall i arrayen</h3>
                <div class="row input-field">
                    <input type="text" id="o1-output-3" class="col s12" readonly>
                </div>
            </section>
            <section>
                <h3>Skriv ut de tallene som er mindre enn 10 i arrayen</h3>
                <div class="row input-field">
                    <input type="text" id="o1-output-4" class="col s12" readonly>
                </div>
            </section>
            <section>
                <h3>Skriv ut alle partall i arrayen</h3>
                <div class="row input-field">
                    <input type="text" id="o1-output-5" class="col s12" readonly>
                </div>
            </section>
            <section>
                <h3>Finn summen av arrayen</h3>
                <div class="row input-field">
                    <input type="text" id="o1-output-6" class="col s12" readonly>
                </div>
            </section>
            <section>
                <h3>Finn antall elementer i arrayen</h3>
                <div class="row input-field">
                    <input type="text" id="o1-output-7" class="col s12" readonly>
                </div>
            </section>
            <section>
                <h3>Finn gjennomsnittet av arrayen</h3>
                <div class="row input-field">
                    <input type="text" id="o1-output-8" class="col s12" readonly>
                </div>
            </section>
            <section>
                <h3>Finn summen av partall i arrayen</h3>
                <div class="row input-field">
                    <input type="text" id="o1-output-9" class="col s12" readonly>
                </div>
            </section>
            <section>
                <h3>Finn minste element</h3>
                <div class="row input-field">
                    <input type="text" id="o1-output-10" class="col s12" readonly>
                </div>
            </section>
            <section>
                <h3>Finn ut om en liste inneholder en bestemt verdi.</h3>
                <div class="row input-field">
                    <input id="o1-input-11" type="number" class="col s4">
                    <input id="o1-output-11" type="text" class="col s8" readonly>
                </div>
            </section>
            <section>
                <h3>Finn ut hvor mange forekomster det er av en bestemt verdi.</h3>
                <div class="row input-field">
                    <input type="text" id="o1-output-12" class="col s12" readonly>
                </div>
            </section>
            <script>
                window.onload = ready;

                function ready() {
                    // Lag en array med 10 tall
                    var array = [];
                    var output = document.getElementById("o1-array");
                    
                    output.innerHTML += "Array = [";
                    
                    for (var i = 0; i < 10; i++) {
                        array[i] = Math.round(Math.random() * 100);
                    }

                    output.innerHTML = array.join(", ");
                    output.innerHTML += "]";

                    document.getElementById("o1-output-1").value = arrayWrite(array);
                    document.getElementById("o1-output-2").value = arrayBackwards(array);
                    document.getElementById("o1-output-3").value = arrayEveryOther(array);
                    document.getElementById("o1-output-4").value = arrayLessThan10(array);
                    document.getElementById("o1-output-5").value = arrayEven(array);
                    document.getElementById("o1-output-6").value = arraySum(array);
                    document.getElementById("o1-output-7").value = arrayLength(array);
                    document.getElementById("o1-output-8").value = arrayAverage(array);
                    document.getElementById("o1-output-8").value = arrayAverage(array);
                    document.getElementById("o1-output-9").value = arraySumEven(array);
                    document.getElementById("o1-output-10").value = arrayFindSmallest(array);

                    document.getElementById("o1-input-11").value = array[Math.floor(Math.random()*array.length)]
                    document.getElementById("o1-output-11").value = arraySearch(array, document.getElementById("o1-input-11").value);
                }

                // Skriv ut array
                function arrayWrite(array) {
                    return array.join(", ");
                }

                // Skriv ut array baklengs
                function arrayBackwards(array) {
                    var tmpArray = [];
                    for (var i = array.length-1; i >= 0; i--) {
                        tmpArray.push(array[i]);
                    }

                    return tmpArray.join(", ");
                }

                // Skriv ut annethvert tall i array
                function arrayEveryOther(array) {
                    var tmpArray = [];
                    for (var i = 0; i < array.length; i++) {
                        if (i % 2 ===0) {
                            tmpArray.push(array[i]);
                        }
                    }

                    return tmpArray.join(", ");
                }

                // Skriv ut tall mindre enn 10 i array
                function arrayLessThan10(array) {
                    var tmpArray = [];
                    for (var i = 0; i < array.length; i++) {
                        if (array[i] < 10) {
                            tmpArray.push(array[i]);
                        }
                    }

                    if (tmpArray.length != 0) {
                        return tmpArray.join(", ");
                    } else {
                        return "Ingen av tallene er mindre enn 10";
                    }
                }

                // Skriv ut partall i array
                function arrayEven(array) {
                    var tmpArray = [];
                    for (var i = 0; i < array.length; i++) {
                        if (array[i] % 2 ===0) {
                            tmpArray.push(array[i]);
                        }
                    }

                    return tmpArray.join(", ");
                }

                // Skriv ut summen av array
                function arraySum(array) {
                    var tmpString = "";
                    for (var i = 0; i < array.length; i++) {
                        tmpString = +tmpString + array[i];
                    }

                    return tmpString;
                }

                // Skriv ut antall elementer i array
                function arrayLength(array) {
                    return array.length;
                }

                // Skriv ut gjennomsnittet av tellene i array
                function arrayAverage(array) {
                    var tmpString = arraySum(array) / array.length;

                    // Sjekk om tallet er float
                    if (tmpString % 1 !== 0) {
                        tmpString += " (Avrundet: " + Math.round(tmpString) + ")";
                    }

                    return tmpString;
                }

                // Summer partall
                function arraySumEven(array) {
                    var tmpString = "";
                    for (var i = 0; i < array.length; i++) {
                        if (array[i] % 2 ===0) {
                            tmpString = +tmpString + array[i];
                        }
                    }

                    return tmpString;
                }

                // Finn minste
                function arrayFindSmallest(array) {
                    var tmpString = array[0];
                    for (var i = 0; i < array.length; i++) {
                        if (array[i] < tmpString) {
                            tmpString = array[i];
                        }
                    }

                    return tmpString;
                }

                // Find value value
                function arrayFindSmallest(array) {
                    var tmpString = array[0];
                    for (var i = 0; i < array.length; i++) {
                        if (array[i] < tmpString) {
                            tmpString = array[i];
                        }
                    }

                    return tmpString;
                }

                function arraySearch(array, value) {
                    return array.indexOf(+value) > -1;
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