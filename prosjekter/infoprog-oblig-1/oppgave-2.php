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
            <script>
                (function () {
                    questions = document.querySelectorAll("#o2-questions li.o2-question");

                    for (var i = 0; i < questions.length; i++) {
                        questions[i].addEventListener('click', function(e) {
                            if (e.target.nodeName == "BUTTON") {
                                this.getElementsByClassName("o2-status")[0].innerHTML = e.target.dataset.answer;
                            }
                        });
                    }
                })();
            </script>
        </section>
        <section id="code">
            <h2>Kode</h2>
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
                </code>
            </pre>
            <h3>JavaScript</h3>
            <pre class="language-javascript">
                <code>
questions = document.querySelectorAll("#o2-questions li.o2-question");

for (var i = 0; i < questions.length; i++) {
    questions[i].addEventListener('click', function(e) {
        this.getElementsByClassName("o2-status")[0].innerHTML = e.target.dataset.answer;
    });
}
                </code>
            </pre>
        </section>
    </article>
    <?php require_once('../../templates/footer.php'); ?>
    <script src="/~bjornarh/js/prism/prism.js"></script>
    <link rel="stylesheet" href="/~bjornarh/css/prism/prism.css">
</body>
</html>