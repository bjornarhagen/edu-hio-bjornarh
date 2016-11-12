<?php require_once('../../../../templates/head.php'); ?>
    <link rel='stylesheet' href='/~bjornarh/fonts/hack/hack.css'>
    <link rel='stylesheet' href='oppgave-1-2-3-materiale/style.css'>
</head>
<?php
    $csv = file_get_contents('oppgave-1-2-3-materiale/company-list.dat');
    $array = array_map("str_getcsv", explode("\n", $csv));

    $company_list = [];

    // Turn each CSV line into an object
    foreach ($array as $company_number => $companies) {
        if (count($companies) > 1) {
            $current_company = new stdClass();

            foreach ($companies as $header_number => $company) {
                $tmp = $array[0][$header_number];
                $current_company->$tmp = $company;
            }

            $company_list[$company_number] = $current_company;
        }
    }

    // Remove headers
    unset($company_list[0]);

    // Sort by date in ASC order
    usort($company_list, function($a, $b) {
        $date_a = new DateTime($a->date);
        $date_b = new DateTime($b->date);

        return ($date_a > $date_b);
    });
?>
<body>
    <header id="o1-intro" class="white-text">
        <div id="o1-intro-overlay"></div>
        <video id="o1-intro-video-bg" class="hide-on-medium-and-down" autoplay loop poster="oppgave-1-2-3-materiale/_c-header-1.jpg">
            <source src="oppgave-1-2-3-materiale/video.mp4" type="video/mp4">
            Your browser doesn't support video. Try downloading a modern browser like Chrome or Firefox.
        </video>
        <div id="o1-intro-bg" class="bg-image bg-fixed hide-on-medium-and-up" style="background-image: url('oppgave-1-2-3-materiale/_c-header-1.jpg');"></div>
        <div id="o1-intro-content" class="row center-v-h">
            <div class="col s12 m8 offset-m2">
                <h1 class="font-brand"><span>Enigma</span><span>- bedriftspresentasjoner</span></h1>
                <h2 class="font-brand">En unik mulighet for deg som student til å lære nye ting og komme i kontakt med innovative bedrifter</h2>
            </div>
        </div>
    </header>
    <main>
        <section id="o1-intro-post-head" class="row bg-image bg-fixed">
            <div class="col s12 m8">
                <div id="o1-up-next-text" class="o1-primary-bg space-h-large space-v-small">
                    <h1 class="o1-accent-text font-large font-thick">Up next...</h1>
                </div>
            </div>
            <div class="col s12 m4 center-align">
                <div id="up-next-presentation" class="white-bg space-h-small space-v-large">
                    <img src="oppgave-1-2-3-materiale/<?= $company_list[0]->{'pictures/logo'}; ?>" alt="<?= $company_list[0]->company; ?> logo">
                    <h1><?= $company_list[0]->company; ?></h1>
                    <a href="#" class="btn accent">Meld deg på</a>
                </div>
            </div>
            <div class="col s12 hide-on-medium-and-down">
                <div class="space-a-large"></div>
            </div>
        </section>
        <section class="row white-bg">
            <div id="o1-coming-list-wrapper" class="col row s12 offset-m1 m10 offset-l2 l8">
                <div class="col s12 grey-bg space-a-small center-align">
                    <h2>Kommende bedriftspresentasjoner</h2>
                </div>
                <div class="col s12 grey-bg">
                    <ul id="o1-coming-list">
                        <?php
                            foreach ($company_list as $company_number => $company_info) {
                                if ($company_number%2===0) {
                                    ?>
                                        <li class="row space-a-small">
                                            <div class="col s12 m7 row">
                                                <div class="col s12 l5 o1-cl-avatar">
                                                    <img src="oppgave-1-2-3-materiale/<?= $company_info->{'pictures/logo'}; ?>" alt="<?= $company_info->company; ?> logo">
                                                    <h3><?= $company_info->company; ?></h3>
                                                </div>
                                                <div class="col s12 l7 space-h-small">
                                                    <h4>Informasjon</h4>
                                                    <p><?= '<b>' . $company_info->date . '</b> - ' . $company_info->time; ?></p>
                                                    <p><?= $company_info->description; ?></p>
                                                </div>
                                            </div>
                                            <div class="o1-cl-actions col s12 m5">
                                                <p class="greyDark-text">Det er x av <?= $company_info->seats; ?> plasser igjen</p>
                                                <a href="#" class="btn black">Meld deg på</a>
                                            </div>
                                        </li>
                                    <?php
                                } else {
                                    ?>
                                        <li class="row space-a-small o1-grey-bg">
                                            <div class="col s12 m7 row">
                                                <div class="col s12 l5 o1-cl-avatar">
                                                    <img src="oppgave-1-2-3-materiale/<?= $company_info->{'pictures/logo'}; ?>" alt="<?= $company_info->company; ?> logo">
                                                    <h3><?= $company_info->company; ?></h3>
                                                </div>
                                                <div class="col s12 l7 space-h-small">
                                                    <h4>Informasjon</h4>
                                                    <p><?= '<b>' . $company_info->date . '</b> - ' . $company_info->time; ?></p>
                                                    <p><?= $company_info->description; ?></p>
                                                </div>
                                            </div>
                                            <div class="o1-cl-actions col s12 m5">
                                                <p class="greyDark-text">Det er x av <?= $company_info->seats; ?> plasser igjen</p>
                                                <a href="#" class="btn black">Meld deg på</a>
                                            </div>
                                        </li>
                                    <?php
                                }
                            }
                        ?>
                        <li class="row space-a-small center-align white-bg">
                            <a href="#" class="btn primary">Se flere...</a>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
        </main>
        <section>
            <div class="row bg-image bg-fixed" style="background-image: url('oppgave-1-2-3-materiale/_c-header-3.jpg');">
                <div class="space-a-large"></div>
                <div class="space-a-large"></div>
                <div class="space-a-large"></div>
            </div>
            <div class="row bg-image" style="background-image: url('oppgave-1-2-3-materiale/_c-header-2.jpg');">
                <div class="space-a-large"></div>
                <div class="space-a-large"></div>
                <div id="o1-gallery-fancy-text" class="space-v-large">
                    <h1 class="font-brand o1-primary-text o1-accent-bg font-medium space-a-small">Et spetakulært og høymoderne rom</h1>
                    <p class="white-text font-small">hvor din bedrift kan vise seg frem fra sin beste side</p>
                </div>
            </div>
            <div class="row bg-image bg-fixed" style="background-image: url('oppgave-1-2-3-materiale/_c-header-1.jpg');">
                <div class="space-a-large"></div>
                <div class="space-a-large"></div>
                <div class="space-a-large"></div>
            </div>
        </section>
    </main>
    <footer class="o1-primary-bg white-text row space-v-large">
        <div class="col s12 space-a-large hide-on-medium-and-down"></div>
        <!-- div.col. -->
        <div class="col s12 space-a-large"></div>
        <div class="col s12 center-align">
            <h2><span class="font-brand">ENIGMA</span> bedriftspresentasjoner</h2>
            <p>Et prosjekt av Bjørnar Hagen</p>
        </div>
    </footer>
    <footer id="footer" class="white-bg">
        <p>Bjørnar Hagen - <?= date("Y"); ?></p>
        <div id="color-bar">
            <nav id="nav-main">
                <div id="nav-main-wrapper">
                    <ul id="nav-main-logo">
                        <li><a href="/~bjornarh/#hjem">Bjørnar Hagen</a></li>
                    </ul>
                    <ul id="nav-main-menu">
                        <li>
                            <a href="/~bjornarh/#hjem" title="Hjem">
                                <i class="icon-house-2"></i>
                                <span>Hjem</span>
                            </a>
                        </li>
                        <li>
                            <a href="/~bjornarh/#prosjekter" title="Prosjekter">
                                <i class="icon-layers-1"></i>
                                <span>Prosjekter</span>
                            </a>
                        </li>
                        <li>
                            <a href="/~bjornarh/#om" title="Om meg">
                                <i class="icon-user-2"></i>
                                <span>Om meg</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </footer>
    <link rel="stylesheet" href="<?= $path; ?>/fonts/streamline/styles.css">
    <script src="/~bjornarh/js/global.js"></script>
    <script>
        window.onload = ready;

        function ready() {
            document.head.querySelector('meta[name="theme-color"]').setAttribute("content", "#3c225f");

            (function() {
                var video = document.getElementById("o1-intro-video-bg");
                var header = document.getElementById("o1-intro-post-head");
                var timeout;

                window.addEventListener('scroll', function() {
                    clearTimeout(timeout);

                    timeout = setTimeout(function() {
                        if (document.body.scrollTop > (header.offsetTop + header.offsetHeight/2)) {
                            video.pause();
                        } else {
                            video.play();
                            
                        }
                    }, 100);
                });

            })();

            (function() {
                var xhr = new XMLHttpRequest();

                xhr.open("GET", "oppgave-1-2-3-materiale/company-list.dat", true);                
                xhr.addEventListener("readystatechange", function() {
                    if (xhr.readyState == xhr.DONE) {
                        displayData(handleData(xhr.responseText));
                    }
                });
                xhr.send();

                function handleData(data) {
                    var rows = data.split('\n');
                    var dataObjects = [];
                    var headers = rows[0].split(',');

                    for(var row = 1; row < rows.length; row++){
                        var obj = {};
                        var currentline = rows[row].split(",");

                        for(var column = 0; column < headers.length; column++){
                            obj[headers[column]] = currentline[column];
                        }

                        dataObjects.push(obj);
                    }

                  return dataObjects;
                }

                function displayData(data) {
                    // var featured = document.getElementById("up-next-presentation");

                    // console.log(data);

                    // for (var i = 0; i < featured.children.length; i++) {
                    //     if (featured.children[i].tagName === "IMG") {
                    //         featured.children[i].setAttribute("src", "oppgave-1-2-3-materiale/" + data[0]["pictures/logo"]);
                    //     }
                    //     if (featured.children[i].tagName === "H1") {
                    //         featured.children[i].innerHTML = data[0]["company"];
                    //     }
                    // }
                }
            })();
        }
    </script>
    <!-- <script src="/~bjornarh/js/prism/prism.js"></script> -->
    <!-- <link rel="stylesheet" href="/~bjornarh/css/prism/prism.css"> -->
</body>
</html>