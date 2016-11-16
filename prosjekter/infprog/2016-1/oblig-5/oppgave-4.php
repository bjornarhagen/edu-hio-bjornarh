<?php require_once('../../../../templates/head.php'); ?>
    <link rel='stylesheet' href='/~bjornarh/fonts/hack/hack.css'>
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
                    <header id="search-wrapper" class="row">
                        <input id="search" type="search" class="col s8 m9 l10" autofocus autocomplete="off" placeholder="Søk etter sted ...">
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
                <p>Data fra <a href="http://www.met.no/" target="_blank">MET Norway</a></p>
                <p>Prosjekt av <a href="/~bjornarh">Bjørnar Hagen</a></p>
            </footer>
        </div>
    </main>
    <script type="text/javascript">
        window.onload = ready();

        function ready() {

            (function() {
                var delay;
                var searchEl = document.getElementById("search");

                searchEl.addEventListener("input", function(e) {
                    clearTimeout(delay);

                    // Auto search after 2 secounds
                    delay = setTimeout(function() {
                        searchInit(e);
                    }, 2000);
                });
            })();
        }

        function searchInit(e) {
            var searchEl = e.target;
            var searchElLoad = document.getElementById("search-loading");
            var searchElParent = e.target.parentNode;
            var query = e.target.value;
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
            xhr.open("GET", "proxy.php", true);

            xhr.addEventListener("readystatechange", function() {
                if (xhr.readyState === xhr.DONE && xhr.status === 200) {
                    // Delay complete function, because we need to see that sweet loading icon. Form over function? eh he
                    setTimeout(function() {
                        searchComplete(qEl, q, rEl, xhr.responseText);
                    }, 1000);
                }
            });

            xhr.send();
        }

        function searchComplete(qEl, q, rEl, r) {
            var searchEl = qEl;
            var searchElLoad = document.getElementById("search-loading");
            var searchElParent = qEl.parentNode;

            // Hide loader
            searchElLoad.style.opacity = 0;

            //
            searchElParent.parentNode.style.height = "512px";

            // Show search field
            setTimeout(function() {
                searchElParent.style.height = "75px";
                searchElParent.style.borderBottom = "1px solid #28292B";
                
                // Display results
                rEl.innerHTML = r;
            }, 250);
        }
    </script>
    <?php require_once('../../../../templates/nav.php'); ?>
    <?php require_once('../../../../templates/footer.php'); ?>
</body>
</html>