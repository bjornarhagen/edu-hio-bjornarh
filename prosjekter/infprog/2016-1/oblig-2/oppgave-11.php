<?php require_once('../../../../templates/head.php'); ?>
    <link rel="stylesheet" href="/~bjornarh/css/steps.css">
    <link rel='stylesheet' href='/~bjornarh/fonts/hack/hack.css'>
    <style>
        #calendar {
            display: block;
            margin: 25px auto 0;
            width: 100%;
            max-width: 500px;
            line-height: 300%;
            font-family: "Hack", monospace;
            /*border: 1px solid black;*/
        }

        #calendar .cal-row {
            width: 100%;
            display: block;
        }

        #calendar .cal-row:first-child {
            color: #fff;
            background-color: #000;
        }

        #calendar .cal-row span {
            transition: 0.5s;
            display: inline-block;
            text-align: center;
            border-right: 1px solid #000;
            border-bottom: 1px solid #000;
        }

        #calendar .cal-row span:first-child {
            border-left: 1px solid #000;
        }

        #calendar .cal-row span:hover {
            transition: 0.1s;
            color: #fff;
            background-color: #FF5254;
        }
    </style>
</head>
<body>
    <?php
        $activeStep = 11;
        require_once('steps.php');
    ?>
    <?php require_once('../../../../templates/nav.php'); ?>
    <article>
        <header id="intro">
            <h1>Oppgave <?= $activeStep; ?></h1>
            <p>Lag en webside der man kan skrive ut en kalender</p>
            <p>Man skal her kunne oppgi hvilken ukedag kalenderen skal begynne på, og hvor mange dager det skal være i
            måneden.</p>
        </header>
        <section id="result">
            <h2>Resultat</h2>
            <p>Du kan endre på kalenderen! Maks lov med 8 dager i uka dessverre.</p>
            <div class="row input-field">
                <label for="o11-cal-start" class="col s4">Først dag i uka</label>
                <label for="o11-cal-days" class="col s4">Dager i måneden</label>
                <label for="o11-cal-week" class="col s4">Dager i uka</label>
            </div>
            <div class="row input-field">
                <select id="o11-cal-start" class="col s4">
                    <option value="0">Mandag</option>
                    <option value="1">Tirsdag</option>
                    <option value="2">Onsdag</option>
                    <option value="3">Torsdag</option>
                    <option value="4">Fredag</option>
                    <option value="5">Lørdag</option>
                    <option value="6">Søndag</option>
                </select>
                <input type="number" id="o11-cal-days" class="col s4" min="7" value="30">
                <input type="number" id="o11-cal-week" class="col s4" max="8" min="1" value="7">
            </div>
            <div id="calendar"></div>
            <script>
                window.onload = ready;

                function ready() {
                    var weekStart = document.getElementById("o11-cal-start");
                    var daysInMonth = document.getElementById("o11-cal-days");
                    var daysInWeek = document.getElementById("o11-cal-week");
                    
                    writeCalendar(daysInMonth.value, weekStart.value, daysInWeek.value);

                    weekStart.oninput = function(){
                        writeCalendar(daysInMonth.value, this.value, daysInWeek.value)
                    };

                    daysInMonth.oninput = function(){
                        writeCalendar(this.value, weekStart.value, daysInWeek.value)
                    };

                    daysInWeek.oninput = function(){
                        writeCalendar(daysInMonth.value, weekStart.value, this.value)
                    };
                }

                function writeCalendar(daysInMonth, weekStart, daysInWeek) {
                    var weekStart = parseInt(weekStart);
                    var calendar = document.getElementById("calendar");
                    var dayNames = ["Man", "Tir", "Ons", "Tor", "Fre", "Lør", "Søn", "Doomsday"];
                    var weekStartHTML = "<div class='cal-row'>";
                    var weekEndHTML = "</div>";
                    var tmpHTML = weekStartHTML;
                    var extraStart = false;

                    if (daysInWeek > 8 || daysInMonth <= 7) {
                        return false;
                    }

                    calendar.innerHTML = ""; // Tøm kalender før start

                    // Lag en rad med ukedagenes navn
                    for (var i = 0; i < daysInWeek; i++) {
                        var offset = Math.abs((i - weekStart) % dayNames.length);

                        tmpHTML += putDay(dayNames[offset]);

                        if (dayNames.length === i) {
                            i = 0;
                        }
                    }
                    // Avslutt raden
                    tmpHTML += weekEndHTML + weekStartHTML;
                    
                    // Lag alle dagene i månden
                    for (var i = 1; i <= daysInMonth; i++) {
                        if (extraStart === false) {
                            extraStart = true;

                            // Lag ekstra dager når uka starter på en annen dag enn mandag
                            for (var j = daysInMonth-weekStart+1; j <= daysInMonth; j++) {
                                tmpHTML += putDay(j);
                            }
                        }

                        tmpHTML += putDay(i);

                        // Avslutt og lag en ny rad for hver gjeldene dag er delelig med antall dager i uka
                        if ((i+weekStart)%daysInWeek === 0) {
                            tmpHTML += weekEndHTML + weekStartHTML;
                        }
                    }

                    // Output HTML
                    calendar.innerHTML = tmpHTML;

                    // Wrap en dag i HTML.
                    function putDay(day) {
                        return "<span style='width:" + (100/daysInWeek) + "%'>" + day + "</span>";
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
    var weekStart = document.getElementById(&quot;o11-cal-start&quot;);
    var daysInMonth = document.getElementById(&quot;o11-cal-days&quot;);
    var daysInWeek = document.getElementById(&quot;o11-cal-week&quot;);
    
    writeCalendar(daysInMonth.value, weekStart.value, daysInWeek.value);

    weekStart.oninput = function(){
        writeCalendar(daysInMonth.value, this.value, daysInWeek.value)
    };

    daysInMonth.oninput = function(){
        writeCalendar(this.value, weekStart.value, daysInWeek.value)
    };

    daysInWeek.oninput = function(){
        writeCalendar(daysInMonth.value, weekStart.value, this.value)
    };
}

function writeCalendar(daysInMonth, weekStart, daysInWeek) {
    var weekStart = parseInt(weekStart);
    var calendar = document.getElementById(&quot;calendar&quot;);
    var dayNames = [&quot;Man&quot;, &quot;Tir&quot;, &quot;Ons&quot;, &quot;Tor&quot;, &quot;Fre&quot;, &quot;Lør&quot;, &quot;Søn&quot;, &quot;Doomsday&quot;];
    var weekStartHTML = &quot;&lt;div class='cal-row'&gt;&quot;;
    var weekEndHTML = &quot;&lt;/div&gt;&quot;;
    var tmpHTML = weekStartHTML;
    var extraStart = false;

    if (daysInWeek &gt; 8 || daysInMonth &lt;= 7) {
        return false;
    }

    calendar.innerHTML = &quot;&quot;; // Tøm kalender før start

    // Lag en rad med ukedagenes navn
    for (var i = 0; i &lt; daysInWeek; i++) {
        var offset = Math.abs((i - weekStart) % dayNames.length);

        tmpHTML += putDay(dayNames[offset]);

        if (dayNames.length === i) {
            i = 0;
        }
    }
    // Avslutt raden
    tmpHTML += weekEndHTML + weekStartHTML;
    
    // Lag alle dagene i månden
    for (var i = 1; i &lt;= daysInMonth; i++) {
        if (extraStart === false) {
            extraStart = true;

            // Lag ekstra dager når uka starter på en annen dag enn mandag
            for (var j = daysInMonth-weekStart+1; j &lt;= daysInMonth; j++) {
                tmpHTML += putDay(j);
            }
        }

        tmpHTML += putDay(i);

        // Avslutt og lag en ny rad for hver gjeldene dag er delelig med antall dager i uka
        if ((i+weekStart)%daysInWeek === 0) {
            tmpHTML += weekEndHTML + weekStartHTML;
        }
    }

    // Output HTML
    calendar.innerHTML = tmpHTML;

    // Wrap en dag i HTML.
    function putDay(day) {
        return &quot;&lt;span style='width:&quot; + (100/daysInWeek) + &quot;%'&gt;&quot; + day + &quot;&lt;/span&gt;&quot;;
    }
}
                </code>
            </pre>
            <h3>HTML</h3>
            <pre class="language-html">
                <code>
&lt;div class=&quot;row input-field&quot;&gt;
    &lt;label for=&quot;o11-cal-start&quot; class=&quot;col s4&quot;&gt;Først dag i uka&lt;/label&gt;
    &lt;label for=&quot;o11-cal-days&quot; class=&quot;col s4&quot;&gt;Dager i måneden&lt;/label&gt;
    &lt;label for=&quot;o11-cal-week&quot; class=&quot;col s4&quot;&gt;Dager i uka&lt;/label&gt;
&lt;/div&gt;
&lt;div class=&quot;row input-field&quot;&gt;
    &lt;select id=&quot;o11-cal-start&quot; class=&quot;col s4&quot;&gt;
        &lt;option value=&quot;0&quot;&gt;Mandag&lt;/option&gt;
        &lt;option value=&quot;1&quot;&gt;Tirsdag&lt;/option&gt;
        &lt;option value=&quot;2&quot;&gt;Onsdag&lt;/option&gt;
        &lt;option value=&quot;3&quot;&gt;Torsdag&lt;/option&gt;
        &lt;option value=&quot;4&quot;&gt;Fredag&lt;/option&gt;
        &lt;option value=&quot;5&quot;&gt;Lørdag&lt;/option&gt;
        &lt;option value=&quot;6&quot;&gt;Søndag&lt;/option&gt;
    &lt;/select&gt;
    &lt;input type=&quot;number&quot; id=&quot;o11-cal-days&quot; class=&quot;col s4&quot; min=&quot;7&quot; value=&quot;30&quot;&gt;
    &lt;input type=&quot;number&quot; id=&quot;o11-cal-week&quot; class=&quot;col s4&quot; max=&quot;8&quot; min=&quot;1&quot; value=&quot;7&quot;&gt;
&lt;/div&gt;
&lt;div id=&quot;calendar&quot;&gt;&lt;/div&gt;
                </code>
            </pre>
        </section>
    </article>
    <?php require_once('../../../../templates/footer.php'); ?>
    <script src="/~bjornarh/js/prism/prism.js"></script>
    <link rel="stylesheet" href="/~bjornarh/css/prism/prism.css">
</body>
</html>