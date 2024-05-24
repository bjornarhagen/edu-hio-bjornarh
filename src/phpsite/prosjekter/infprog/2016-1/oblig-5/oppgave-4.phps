<?php require_once('../../../../templates/head.php'); ?>
    <link rel='stylesheet' href='/phpsite/fonts/hack/hack.css'>
    <link rel='stylesheet' href='oppgave-4/weather-icons.css'>
    <link rel='stylesheet' href='oppgave-4/style.css'>
</head>
<body>
    <main>
        <div class="o4-fullscreen">
            <div class="o4-fullscreen-overlay o4-primary-bg"></div>
            <div class="o4-fullscreen-image bg-image-fixed" style="background-image: url('oppgave-4/photo-1469365556835-3da3db4c253b.jpg');"></div>
            <div class="o4-fullscreen-inner">
                <section class="o4-fullscreen-inner-search">
                    <header id="search-wrapper" class="row before-search">
                        <input value="Halden" id="search" type="search" class="col s8 m9 l10" autofocus autocomplete="off" placeholder="Søk etter sted ...">
                        <button type="button" class="col s4 m3 l2" title="Søk"><i class="icon-magnifier"></i></button>
                    </header>
                    <img id="search-loading" src="oppgave-4/loading.svg">
                    <section id="search-result">
                        <!-- CSS ikoner av Fabrizio Bianchi (http://fabrizio.co/) -->
                        <div class="weather-icon sunny"></div>
                        <div class="weather-icon cloudy"></div>
                        <div class="weather-icon rainy"></div>
                        <div class="weather-icon snowy"></div>
                        <div class="weather-icon rainbow"></div>
                        <div class="weather-icon starry"></div>
                        <div class="weather-icon stormy"></div>
                    </section>
                </section>
            </div>
            <footer class="o4-fullscreen-footer">
                <p>Værdata fra Yr levert av MET og NRK</a></p>
                <p>Prosjekt av <a href="/phpsite">Bjørnar Hagen</a></p>
            </footer>
        </div>
    </main>
    <script type="text/javascript">
        window.onload = ready();

        function ready() {

            (function() {
                var delay;
                var searchEl = document.getElementById("search");
                var oldValue;

                searchEl.addEventListener("focusout", function(e) {
                    if (this.value != oldValue) {
                        oldValue = this.value;
                        searchInit(e);
                    }
                });
            })();
        }

        function searchInit(e) {
            var searchEl = e.target;
            var searchElLoad = document.getElementById("search-loading");
            var searchElParent = e.target.parentNode;
            var query = e.target.value.split(",");
            var resultEl = document.getElementById("search-result");

            // Hide search field
            searchElParent.style.height = searchElParent.offsetHeight + "px";
            setTimeout(function() {
                searchElParent.style.height = "0px";
                resultEl.innerHTML = ""; // Hide old result
            }, 100);

            // Show loader
            searchElLoad.style.opacity = 1;
            searchElParent.parentNode.style.height = searchElParent.parentNode.offsetHeight + "px";
            setTimeout(function() {
                searchElParent.parentNode.style.height = "256px";
            }, 100);

            search(searchEl, query, resultEl);
        }

        function search(qEl, q, rEl, r) {
            var xhr = new XMLHttpRequest();

            xhr.open("GET", "proxy.php?s=" + q);
            xhr.addEventListener("readystatechange", function() {
                if (xhr.readyState === xhr.DONE && xhr.status === 200) {
                    // Delay complete function, because we need to see that sweet loading icon. Form over function? eh he
                    setTimeout(function() {
                        searchComplete(qEl, q, rEl, JSON.parse(xhr.responseText));
                    }, 1000);
                }
            });
            xhr.send();
        }

        function searchComplete(qEl, q, rEl, r) {
            var searchEl = qEl;
            var searchElLoad = document.getElementById("search-loading");
            var searchElParent = searchEl.parentNode;

            // Hide loader
            searchElLoad.style.opacity = 0;

            // Set content height
            searchElParent.parentNode.style.height = "512px";

            // Show search field
            setTimeout(function() {
                searchElParent.style.height = "75px";
                searchElParent.style.borderBottom = "1px solid #28292B";               
            }, 250);
            
            // Genererer resultat list
            var tmpHTML = "<ul id=\"results-list\">";
            for (var i = 0; i < r.length; i++) {
                tmpHTML += "<li data-object=\"" + i + "\">";
                tmpHTML += "<h1><a href=\"#" + r[i].kommune + "-" + i + "\">" + r[i].stadnamn + "</a></h1>";
                tmpHTML += "<p>" + r[i].fylke + ", " + r[i].kommune + "</p>";
                tmpHTML += "</li>";
            }
            rEl.innerHTML += tmpHTML + "</ul>";

            var resultsList = document.getElementById("results-list");
            for (var i = 0; i < resultsList.childNodes.length; i++) {
                resultsList.childNodes[i].addEventListener("click", function(e) {
                    // Send results
                    handleData(r[this.getAttribute("data-object")], rEl);
                });
            }
        }

        function handleData(data, output) {
            var xhr = new XMLHttpRequest();
            var place = data.fylke + "-" + data.kommune + "-" + data.stadnamn;

            xhr.open("GET", "proxy.php?place=" + place + "&xml=" + data.bokmål);
            xhr.addEventListener("readystatechange", function() {
                if (xhr.readyState === xhr.DONE && xhr.status === 200) {
                    var xml = new DOMParser().parseFromString(xhr.responseText, "application/xml");
                    displayData(data, xml, output);
                }
            });
            xhr.send();
        }

        function displayData(obj, xml, output) {
            var statsCurrent = xml.querySelector("forecast tabular time:first-child")
            var temperature = statsCurrent.querySelector("temperature").getAttribute("value");
            var symbol = statsCurrent.querySelector("symbol");

            if (symbol.getAttribute("period") > 2) {
                var periode = "d";
            } else {
                var periode = "m";
            }





            var symbolImage = "oppgave-4/weather-icons/" + symbol.getAttribute("number") + periode + ".svg";

            var tmpHTML = "<div id=\"results-fancy\">";
            var date = new Date();
            var period = date.getHours() >= 12 ? "PM" : "AM";
            var weekDays = ["Mandag", "Tirsdag", "Onsdag", "Torsdag", "Fredag", "Lørdag", "Søndag"];

            var weatherName = symbol.getAttribute("name");



            // if (weatherName.indexOf('sky') !== -1) {
            //     symbolImage = "<div class=\"cloudy\"></div>";
            // }


            // console.log(weatherName.indexOf('regn') !== -1);
            // console.log(weatherName.indexOf('byger') !== -1);
            // console.log(weatherName.indexOf('sol') !== -1);
            // console.log(weatherName.indexOf('klar') !== -1);
            // console.log(weatherName.indexOf('torden') !== -1);
            // console.log(weatherName.indexOf('sludd') !== -1);
            // console.log(weatherName.indexOf('snø') !== -1);


            output.innerHTML = "";


            tmpHTML += "<h1>" + obj.stadnamn + "</h1>";
            tmpHTML += "<div class=\"row\">";
                tmpHTML += "<div class=\"col s12\">";
                    tmpHTML += "<p>" + weekDays[date.getDay()] + " " + (date.getHours()%12||12) + ":" + date.getMinutes() + " " + period + "</p>";
                    tmpHTML += "<p>" + weatherName + "</p>";
                tmpHTML += "</div>";
                tmpHTML += "<div class=\"col s12 m6\">";
                    // tmpHTML += symbolImage;
                    tmpHTML += "<img src=\"" + symbolImage + "\">";
                    tmpHTML += "<h2>" + temperature + " &#8451;</h2>";
                tmpHTML += "</div>";
                tmpHTML += "<div style=\"text-align:right;\" class=\"col s12 m6\">";
                    tmpHTML += "<p>" + statsCurrent.querySelector("windSpeed").getAttribute("name") + " " + statsCurrent.querySelector("windDirection").getAttribute("name") + "</p>";
                    tmpHTML += "<p>" + statsCurrent.querySelector("windSpeed").getAttribute("mps") + " m/s</p>";
                tmpHTML += "</div>";
            tmpHTML += "</div>";

            output.innerHTML += tmpHTML + "</div>";


            console.log(obj);
            console.log(xml.querySelector("forecast tabular"));
            console.log(statsCurrent);
            console.log(statsCurrent.querySelector("temperature"));
        }
    </script>
    <?php # require_once('../../../../templates/nav.php'); ?>
    <?php require_once('../../../../templates/footer.php'); ?>
</body>
</html>