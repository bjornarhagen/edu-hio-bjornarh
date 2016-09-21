<?php require_once('../../templates/head.php'); ?>
    <link rel="stylesheet" href="/~bjornarh/css/steps.css">
    <style>
        #o2-questions li {
            margin-top: 15px;
        }

        #o2-questions li:first-child {
            margin-top: 0;
        }

        #o2-questions .btn {
            padding: 2.5px 10px;
            font-size: 0.8em;
            margin-left: 10px;
            vertical-align: top;
        }

        #o2-modal {
            display: none;
            z-index: 2;
            position: fixed;
            top: 50%;
            left: 0;
            right: 0;
            margin: auto;
            padding: 50px;
            width: 100%;
            max-width: 320px;
            color: #000;
            text-align: center;
            font-size: 2em;
            background-color: #F7F7F7;
            -webkit-transform: translateY(-50%);
            -moz-transform: translateY(-50%);
            transform: translateY(-50%);
        }

        #o2-backdrop {
            display: none;
            z-index: 1;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(104, 118, 137, 0.9);
        }
    </style>
</head>
<body>
    <?php
        $activeStep = 2;
        require_once('steps.php');
    ?>
    <?php require_once('../../templates/nav.php'); ?>
    <article id="oppgave-2">
        <header id="intro">
            <h1>Oppgave 2</h1>
            <p>Lag en nettside med minst tre spørsmål. Hvert spørsmål skal være på sin egen linje, og
            hver linje skal i tillegg til spørsmålet inneholde en "Sann" og en "Usann" knapp. Når du
            trykk er på knappene skal en meldingsboks vise "Riktig" eller "Galt" ettersom hvilken
            knapp man trykket på.</p>
        </header>
        <section id="result">
            <h2>Resultat</h2>
            <h3>Spørsmål</h3>
            <ul id="o2-questions">
                <li class="o2-question">
                    <code class="language-javascript">2 + 2 = 4</code>
                    <button data-answer="Riktig!" class="btn success">Sant</button>
                    <button data-answer="Feil" class="btn alert">Usant</button>
                    <span class="o2-status"></span>
                </li>
                <li class="o2-question">
                    <code class="language-javascript">2 + 2 = 5</code>
                    <button data-answer="Feil" class="btn success">Sant</button>
                    <button data-answer="Riktig!" class="btn alert">Usant</button>
                    <span class="o2-status"></span>
                </li>
                <li class="o2-question">
                    <code class="language-javascript">Hva kom først av høna og egget?</code>
                    <button data-answer="Hvem vet?" class="btn black">Høna</button>
                    <button data-answer="Vi vet ikke svaret, beklager" class="btn black">Egget</button>
                    <span class="o2-status"></span>
                </li>
            </ul>
            <div id="o2-modal">Resultat</div>
            <div id="o2-backdrop"></div>
            <script>
                window.onload = ready;

                function ready() {
                    var o2Modal = document.getElementById("o2-modal");
                    var o2Backdrop = document.getElementById("o2-backdrop");

                    // Skjul modal og backdrop når brukeren trykker på backdrop
                    o2Backdrop.onclick = function() {
                        this.style.display = "none";
                        o2Modal.style.display = "none";
                    };

                    // Finner alle spørsmålene inni en liste
                    var questions = document.querySelectorAll("#o2-questions li.o2-question");
                    var autoClose;

                    // For hvert spørsmål, lag en eventlistener
                    for (var i = 0; i < questions.length; i++) {
                        questions[i].addEventListener("click", function(e) {
                            if (e.target.nodeName == "BUTTON") {
                                o2Modal.style.display = "block";
                                o2Modal.innerHTML = e.target.dataset.answer;
                                o2Backdrop.style.display = "block";
                                clearTimeout(autoClose);

                                // Skjul modal og backdrop automatisk etter 2.5 sekunder
                                autoClose = setTimeout(function() {
                                    o2Backdrop.click();
                                }, 2500);
                            }
                        });
                    }
                }
            </script>
        </section>
        <section id="code">
            <h2>Kode</h2>
            <h3>JavaScript</h3>
            <pre class="language-javascript">
                <code>
window.onload = ready;

function ready() {
    var o2Modal = document.getElementById("o2-modal");
    var o2Backdrop = document.getElementById("o2-backdrop");

    // Skjul modal og backdrop når brukeren trykker på backdrop
    o2Backdrop.onclick = function() {
        this.style.display = "none";
        o2Modal.style.display = "none";
    };

    // Finner alle spørsmålene inni en liste
    var questions = document.querySelectorAll("#o2-questions li.o2-question");

    // For hvert spørsmål, lag en eventlistener
    for (var i = 0; i < questions.length; i++) {
        questions[i].addEventListener("click", function(e) {
            if (e.target.nodeName == "BUTTON") {
                o2Modal.style.display = "block";
                o2Modal.innerHTML = e.target.dataset.answer;
                o2Backdrop.style.display = "block";

                // Skjul modal og backdrop automatisk etter 2.5 sekunder
                setTimeout(function() {
                    o2Backdrop.click();
                }, 2500);
            }
        });
    }
}
                </code>
            </pre>
            <h3>HTML</h3>
            <pre class="language-html">
                <code>
&lt;ul id=&quot;o2-questions&quot;&gt;
    &lt;li class=&quot;o2-question&quot;&gt;
        &lt;code class=&quot;language-javascript&quot;&gt;2 + 2 = 4&lt;/code&gt;
        &lt;button data-answer=&quot;Riktig!&quot; class=&quot;btn success&quot;&gt;Sant&lt;/button&gt;
        &lt;button data-answer=&quot;Feil&quot; class=&quot;btn alert&quot;&gt;Usant&lt;/button&gt;
        &lt;span class=&quot;o2-status&quot;&gt;&lt;/span&gt;
    &lt;/li&gt;
    &lt;li class=&quot;o2-question&quot;&gt;
        &lt;code class=&quot;language-javascript&quot;&gt;2 + 2 = 5&lt;/code&gt;
        &lt;button data-answer=&quot;Feil&quot; class=&quot;btn success&quot;&gt;Sant&lt;/button&gt;
        &lt;button data-answer=&quot;Riktig!&quot; class=&quot;btn alert&quot;&gt;Usant&lt;/button&gt;
        &lt;span class=&quot;o2-status&quot;&gt;&lt;/span&gt;
    &lt;/li&gt;
    &lt;li class=&quot;o2-question&quot;&gt;
        &lt;code class=&quot;language-javascript&quot;&gt;Hva kom først av høna og egget?&lt;/code&gt;
        &lt;button data-answer=&quot;Hvem vet?&quot; class=&quot;btn black&quot;&gt;Høna&lt;/button&gt;
        &lt;button data-answer=&quot;Vi vet ikke svaret, beklager&quot; class=&quot;btn black&quot;&gt;Egget&lt;/button&gt;
        &lt;span class=&quot;o2-status&quot;&gt;&lt;/span&gt;
    &lt;/li&gt;
&lt;/ul&gt;
&lt;div id=&quot;o2-modal&quot;&gt;Resultat&lt;/div&gt;
&lt;div id=&quot;o2-backdrop&quot;&gt;&lt;/div&gt;
                </code>
            </pre>
        </section>
    </article>
    <?php require_once('../../templates/footer.php'); ?>
    <script src="/~bjornarh/js/prism/prism.js"></script>
    <link rel="stylesheet" href="/~bjornarh/css/prism/prism.css">
</body>
</html>