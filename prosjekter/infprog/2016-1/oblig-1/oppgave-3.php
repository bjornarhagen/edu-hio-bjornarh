<?php require_once('../../../../templates/head.php'); ?>
    <link rel="stylesheet" href="/~bjornarh/css/steps.css">
</head>
<body>
    <?php
        $activeStep = 3;
        require_once('steps.php');
    ?>
    <?php require_once('../../../../templates/nav.php'); ?>
    <article id="oppgave-3">
        <header id="intro">
            <h1>Oppgave 3</h1>
            <p>Lag et skjema der du kan skrive inn to tall i to tekstbokser, og så få ut summen(+), differansen(-),
            produktet(*) og kvotienten(/) når man trykker på en av tilsvarende fire knapper.</p>
        </header>
        <section id="result">
            <h2>Resultat</h2>
            <div class="layout-square-small space-a-small white-bg">
                <div class="row">
                    <div class="input-field-2">
                        <input id="o3-numb-1" type="number" placeholder="Tall 1">
                        <input id="o3-numb-2" type="number" placeholder="Tall 2">
                    </div>
                </div>
                <div class="row font-small">
                    <button id="o3-add" class="btn white col s3">+</button>
                    <button id="o3-sub" class="btn white col s3">-</button>
                    <button id="o3-mul" class="btn white col s3">x</button>
                    <button id="o3-div" class="btn white col s3">/</button>
                </div>
                <div class="row">
                    <div class="input-field">
                        <input id="o3-result" type="text" placeholder="Svar" disabled>
                    </div>
                </div>
            </div>
            <script>
                window.onload = ready;

                function ready() {
                    var o3CalcBtns = document.querySelectorAll("#o3-add, #o3-sub, #o3-mul, #o3-div");

                    for (var i = 0; i < o3CalcBtns.length; i++) {
                        o3CalcBtns[i].addEventListener("click", function() {
                            var o3Numb1 = parseInt(document.getElementById("o3-numb-1").value);
                            var o3Numb2 = parseInt(document.getElementById("o3-numb-2").value);
                            var o3Result = document.getElementById("o3-result");

                            switch (this.id) {
                                case "o3-add":
                                    o3Result.value = o3Numb1 + o3Numb2;
                                    break;

                                case "o3-sub":
                                    o3Result.value = o3Numb1 - o3Numb2;
                                    break;

                                case "o3-mul":
                                    o3Result.value = o3Numb1 * o3Numb2;
                                    break;

                                case "o3-div":
                                    o3Result.value = o3Numb1 / o3Numb2;
                                    break;
                                default:
                                    o3Result.value = 'Error';
                                    break;
                            }
                        });
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
    var o3CalcBtns = document.querySelectorAll("#o3-add, #o3-sub, #o3-mul, #o3-div");

    for (var i = 0; i < o3CalcBtns.length; i++) {
        o3CalcBtns[i].addEventListener("click", function() {
            var o3Numb1 = parseInt(document.getElementById("o3-numb-1").value);
            var o3Numb2 = parseInt(document.getElementById("o3-numb-2").value);
            var o3Result = document.getElementById("o3-result");

            switch (this.id) {
                case "o3-add":
                    o3Result.value = o3Numb1 + o3Numb2;
                    break;

                case "o3-sub":
                    o3Result.value = o3Numb1 - o3Numb2;
                    break;

                case "o3-mul":
                    o3Result.value = o3Numb1 * o3Numb2;
                    break;

                case "o3-div":
                    o3Result.value = o3Numb1 / o3Numb2;
                    break;
                default:
                    o3Result.value = 'Error';
                    break;
            }
        });
    }
}
                </code>
            </pre>
            <h3>HTML</h3>
            <pre class="language-html">
                <code>
&lt;div class=&quot;row&quot;&gt;
    &lt;div class=&quot;input-field-2&quot;&gt;
        &lt;input id=&quot;o3-numb-1&quot; type=&quot;number&quot; placeholder=&quot;Tall 1&quot;&gt;
        &lt;input id=&quot;o3-numb-2&quot; type=&quot;number&quot; placeholder=&quot;Tall 2&quot;&gt;
    &lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;row font-small&quot;&gt;
    &lt;button id=&quot;o3-add&quot; class=&quot;btn white col s3&quot;&gt;+&lt;/button&gt;
    &lt;button id=&quot;o3-sub&quot; class=&quot;btn white col s3&quot;&gt;-&lt;/button&gt;
    &lt;button id=&quot;o3-mul&quot; class=&quot;btn white col s3&quot;&gt;x&lt;/button&gt;
    &lt;button id=&quot;o3-div&quot; class=&quot;btn white col s3&quot;&gt;/&lt;/button&gt;
&lt;/div&gt;
&lt;div class=&quot;row&quot;&gt;
    &lt;div class=&quot;input-field&quot;&gt;
        &lt;input id=&quot;o3-result&quot; type=&quot;text&quot; placeholder=&quot;Svar&quot; disabled&gt;
    &lt;/div&gt;
&lt;/div&gt;
                </code>
            </pre>
        </section>
    </article>
    <?php require_once('../../../../templates/footer.php'); ?>
    <script src="/~bjornarh/js/prism/prism.js"></script>
    <link rel="stylesheet" href="/~bjornarh/css/prism/prism.css">
</body>
</html>