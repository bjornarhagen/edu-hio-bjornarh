<?php require_once('../../../../templates/head.php'); ?>
    <link rel="stylesheet" href="/phpsite/css/steps.css">
    <link rel='stylesheet' href='/phpsite/fonts/hack/hack.css'>
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
                    <input id="o1-input-11" type="number" class="col s4" placeholder="Skriv inn et tall" min="0" max="10">
                    <input id="o1-output-11" type="text" class="col s8" readonly>
                </div>
            </section>
            <section>
                <h3>Finn ut hvor mange forekomster det er av en bestemt verdi.</h3>
                <div class="row input-field">
                    <input id="o1-input-12" type="number" class="col s4" placeholder="Skriv inn et tall" min="0" max="10">
                    <input id="o1-output-12" type="text" class="col s8" readonly>
                </div>
            </section>
            <script>
                window.onload = ready;

                function ready() {
                    runArrayFunctions();
                }

                function runArrayFunctions() {
                    // Lag en array med 10 tall
                    var array = [];
                    var output = document.getElementById("o1-array");
                    
                    output.innerHTML += "Array = [";
                    
                    for (var i = 0; i < 10; i++) {
                        array[i] = Math.round(Math.random() * 10); // Høyeste verdi er 10
                    }

                    output.innerHTML += array.join(", ");
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

                    var o1Input11 = document.getElementById("o1-input-11");
                    var o1Output11 = document.getElementById("o1-output-11");
                    o1Input11.value = array[Math.floor(Math.random()*array.length)]
                    o1Output11.value = arraySearch(array, o1Input11.value);

                    o1Input11.oninput = function() {
                        o1Output11.value = arraySearch(array, o1Input11.value);
                    }

                    var o1Input12 = document.getElementById("o1-input-12");
                    var o1Output12 = document.getElementById("o1-output-12");
                    o1Input12.value = array[Math.floor(Math.random()*array.length)]
                    o1Output12.value = arraySearchCount(array, o1Input12.value);

                    o1Input12.oninput = function() {
                        o1Output12.value = arraySearchCount(array, o1Input12.value);
                    }
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
                    if (value) {
                        if (array.indexOf(+value) > -1) {
                            return "Fant " + value;
                        } else {
                            return "Fant ikke " + value;
                        }
                    } else {
                        return "Skriv inn et gyldig tall til venstre..."
                    }
                }

                function arraySearchCount(array, value) {
                    var found = 0;

                    if (value) {
                        for (var i = 0; i < array.length; i++) {
                            if (array[i] == value) {
                                found++;
                            }
                        }

                        return "Fant " + found + " forekomster av " + value;
                    } else {
                        return "Skriv inn et gyldig tall til venstre..."
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
    runArrayFunctions();
}

function runArrayFunctions() {
    // Lag en array med 10 tall
    var array = [];
    var output = document.getElementById(&quot;o1-array&quot;);
    
    output.innerHTML += &quot;Array = [&quot;;
    
    for (var i = 0; i &lt; 10; i++) {
        array[i] = Math.round(Math.random() * 10); // Høyeste verdi er 10
    }

    output.innerHTML += array.join(&quot;, &quot;);
    output.innerHTML += &quot;]&quot;;

    document.getElementById(&quot;o1-output-1&quot;).value = arrayWrite(array);
    document.getElementById(&quot;o1-output-2&quot;).value = arrayBackwards(array);
    document.getElementById(&quot;o1-output-3&quot;).value = arrayEveryOther(array);
    document.getElementById(&quot;o1-output-4&quot;).value = arrayLessThan10(array);
    document.getElementById(&quot;o1-output-5&quot;).value = arrayEven(array);
    document.getElementById(&quot;o1-output-6&quot;).value = arraySum(array);
    document.getElementById(&quot;o1-output-7&quot;).value = arrayLength(array);
    document.getElementById(&quot;o1-output-8&quot;).value = arrayAverage(array);
    document.getElementById(&quot;o1-output-8&quot;).value = arrayAverage(array);
    document.getElementById(&quot;o1-output-9&quot;).value = arraySumEven(array);
    document.getElementById(&quot;o1-output-10&quot;).value = arrayFindSmallest(array);

    var o1Input11 = document.getElementById(&quot;o1-input-11&quot;);
    var o1Output11 = document.getElementById(&quot;o1-output-11&quot;);
    o1Input11.value = array[Math.floor(Math.random()*array.length)]
    o1Output11.value = arraySearch(array, o1Input11.value);

    o1Input11.oninput = function() {
        o1Output11.value = arraySearch(array, o1Input11.value);
    }

    var o1Input12 = document.getElementById(&quot;o1-input-12&quot;);
    var o1Output12 = document.getElementById(&quot;o1-output-12&quot;);
    o1Input12.value = array[Math.floor(Math.random()*array.length)]
    o1Output12.value = arraySearchCount(array, o1Input12.value);

    o1Input12.oninput = function() {
        o1Output12.value = arraySearchCount(array, o1Input12.value);
    }
}

// Skriv ut array
function arrayWrite(array) {
    return array.join(&quot;, &quot;);
}

// Skriv ut array baklengs
function arrayBackwards(array) {
    var tmpArray = [];
    for (var i = array.length-1; i &gt;= 0; i--) {
        tmpArray.push(array[i]);
    }

    return tmpArray.join(&quot;, &quot;);
}

// Skriv ut annethvert tall i array
function arrayEveryOther(array) {
    var tmpArray = [];
    for (var i = 0; i &lt; array.length; i++) {
        if (i % 2 ===0) {
            tmpArray.push(array[i]);
        }
    }

    return tmpArray.join(&quot;, &quot;);
}

// Skriv ut tall mindre enn 10 i array
function arrayLessThan10(array) {
    var tmpArray = [];
    for (var i = 0; i &lt; array.length; i++) {
        if (array[i] &lt; 10) {
            tmpArray.push(array[i]);
        }
    }

    if (tmpArray.length != 0) {
        return tmpArray.join(&quot;, &quot;);
    } else {
        return &quot;Ingen av tallene er mindre enn 10&quot;;
    }
}

// Skriv ut partall i array
function arrayEven(array) {
    var tmpArray = [];
    for (var i = 0; i &lt; array.length; i++) {
        if (array[i] % 2 ===0) {
            tmpArray.push(array[i]);
        }
    }

    return tmpArray.join(&quot;, &quot;);
}

// Skriv ut summen av array
function arraySum(array) {
    var tmpString = &quot;&quot;;
    for (var i = 0; i &lt; array.length; i++) {
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
        tmpString += &quot; (Avrundet: &quot; + Math.round(tmpString) + &quot;)&quot;;
    }

    return tmpString;
}

// Summer partall
function arraySumEven(array) {
    var tmpString = &quot;&quot;;
    for (var i = 0; i &lt; array.length; i++) {
        if (array[i] % 2 ===0) {
            tmpString = +tmpString + array[i];
        }
    }

    return tmpString;
}

// Finn minste
function arrayFindSmallest(array) {
    var tmpString = array[0];
    for (var i = 0; i &lt; array.length; i++) {
        if (array[i] &lt; tmpString) {
            tmpString = array[i];
        }
    }

    return tmpString;
}

// Find value value
function arrayFindSmallest(array) {
    var tmpString = array[0];
    for (var i = 0; i &lt; array.length; i++) {
        if (array[i] &lt; tmpString) {
            tmpString = array[i];
        }
    }

    return tmpString;
}

function arraySearch(array, value) {
    if (value) {
        if (array.indexOf(+value) &gt; -1) {
            return &quot;Fant &quot; + value;
        } else {
            return &quot;Fant ikke &quot; + value;
        }
    } else {
        return &quot;Skriv inn et gyldig tall til venstre...&quot;
    }
}

function arraySearchCount(array, value) {
    var found = 0;

    if (value) {
        for (var i = 0; i &lt; array.length; i++) {
            if (array[i] == value) {
                found++;
            }
        }

        return &quot;Fant &quot; + found + &quot; forekomster av &quot; + value;
    } else {
        return &quot;Skriv inn et gyldig tall til venstre...&quot;
    }
}
                </code>
            </pre>
            <h3>HTML</h3>
            <pre class="language-html">
                <code>
&lt;pre class=&quot;language-javascript&quot;&gt;&lt;code id=&quot;o1-array&quot;&gt;&lt;/code&gt;&lt;/pre&gt;
&lt;section&gt;
    &lt;h3&gt;Skriv ut arrayen&lt;/h3&gt;
    &lt;div class=&quot;row input-field&quot;&gt;
        &lt;input type=&quot;text&quot; id=&quot;o1-output-1&quot; class=&quot;col s12&quot; readonly&gt;
    &lt;/div&gt;
&lt;/section&gt;
&lt;section&gt;
    &lt;h3&gt;Skriv ut arrayen baklengs&lt;/h3&gt;
    &lt;div class=&quot;row input-field&quot;&gt;
        &lt;input type=&quot;text&quot; id=&quot;o1-output-2&quot; class=&quot;col s12&quot; readonly&gt;
    &lt;/div&gt;
&lt;/section&gt;
&lt;section&gt;
    &lt;h3&gt;Skriv ut annethvert tall i arrayen&lt;/h3&gt;
    &lt;div class=&quot;row input-field&quot;&gt;
        &lt;input type=&quot;text&quot; id=&quot;o1-output-3&quot; class=&quot;col s12&quot; readonly&gt;
    &lt;/div&gt;
&lt;/section&gt;
&lt;section&gt;
    &lt;h3&gt;Skriv ut de tallene som er mindre enn 10 i arrayen&lt;/h3&gt;
    &lt;div class=&quot;row input-field&quot;&gt;
        &lt;input type=&quot;text&quot; id=&quot;o1-output-4&quot; class=&quot;col s12&quot; readonly&gt;
    &lt;/div&gt;
&lt;/section&gt;
&lt;section&gt;
    &lt;h3&gt;Skriv ut alle partall i arrayen&lt;/h3&gt;
    &lt;div class=&quot;row input-field&quot;&gt;
        &lt;input type=&quot;text&quot; id=&quot;o1-output-5&quot; class=&quot;col s12&quot; readonly&gt;
    &lt;/div&gt;
&lt;/section&gt;
&lt;section&gt;
    &lt;h3&gt;Finn summen av arrayen&lt;/h3&gt;
    &lt;div class=&quot;row input-field&quot;&gt;
        &lt;input type=&quot;text&quot; id=&quot;o1-output-6&quot; class=&quot;col s12&quot; readonly&gt;
    &lt;/div&gt;
&lt;/section&gt;
&lt;section&gt;
    &lt;h3&gt;Finn antall elementer i arrayen&lt;/h3&gt;
    &lt;div class=&quot;row input-field&quot;&gt;
        &lt;input type=&quot;text&quot; id=&quot;o1-output-7&quot; class=&quot;col s12&quot; readonly&gt;
    &lt;/div&gt;
&lt;/section&gt;
&lt;section&gt;
    &lt;h3&gt;Finn gjennomsnittet av arrayen&lt;/h3&gt;
    &lt;div class=&quot;row input-field&quot;&gt;
        &lt;input type=&quot;text&quot; id=&quot;o1-output-8&quot; class=&quot;col s12&quot; readonly&gt;
    &lt;/div&gt;
&lt;/section&gt;
&lt;section&gt;
    &lt;h3&gt;Finn summen av partall i arrayen&lt;/h3&gt;
    &lt;div class=&quot;row input-field&quot;&gt;
        &lt;input type=&quot;text&quot; id=&quot;o1-output-9&quot; class=&quot;col s12&quot; readonly&gt;
    &lt;/div&gt;
&lt;/section&gt;
&lt;section&gt;
    &lt;h3&gt;Finn minste element&lt;/h3&gt;
    &lt;div class=&quot;row input-field&quot;&gt;
        &lt;input type=&quot;text&quot; id=&quot;o1-output-10&quot; class=&quot;col s12&quot; readonly&gt;
    &lt;/div&gt;
&lt;/section&gt;
&lt;section&gt;
    &lt;h3&gt;Finn ut om en liste inneholder en bestemt verdi.&lt;/h3&gt;
    &lt;div class=&quot;row input-field&quot;&gt;
        &lt;input id=&quot;o1-input-11&quot; type=&quot;number&quot; class=&quot;col s4&quot; placeholder=&quot;Skriv inn et tall&quot; min=&quot;0&quot; max=&quot;10&quot;&gt;
        &lt;input id=&quot;o1-output-11&quot; type=&quot;text&quot; class=&quot;col s8&quot; readonly&gt;
    &lt;/div&gt;
&lt;/section&gt;
&lt;section&gt;
    &lt;h3&gt;Finn ut hvor mange forekomster det er av en bestemt verdi.&lt;/h3&gt;
    &lt;div class=&quot;row input-field&quot;&gt;
        &lt;input id=&quot;o1-input-12&quot; type=&quot;number&quot; class=&quot;col s4&quot; placeholder=&quot;Skriv inn et tall&quot; min=&quot;0&quot; max=&quot;10&quot;&gt;
        &lt;input id=&quot;o1-output-12&quot; type=&quot;text&quot; class=&quot;col s8&quot; readonly&gt;
    &lt;/div&gt;
&lt;/section&gt;
                </code>
            </pre>
        </section>
    </article>
    <?php require_once('../../../../templates/footer.php'); ?>
    <script src="/phpsite/js/prism/prism.js"></script>
    <link rel="stylesheet" href="/phpsite/css/prism/prism.css">
</body>
</html>