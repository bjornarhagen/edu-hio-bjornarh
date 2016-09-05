<?php require_once('templates/head.php'); ?>
    <link rel='stylesheet' href='/~bjornarh/fonts/hack/hack.css'>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <header id="hjem" class="tabs active">
        <div class="center-v-h center-align">
            <h1>Bjørnar Hagen</h1>
        </div>
    </header>
    <?php require_once('templates/nav-index.php'); ?>
    <section id="prosjekter" class="tabs">
        <div class="tabs-wrapper blackLight-bg">
            <button class="tabs-close btn white"><i class="icon-arrow-31"></i><span>Tilbake</span></button>
            <div class="tabs-inner layout-square-medium">
                <h2>Prosjekter</h2>
                    <?php
                        require_once('prosjekter.php');

                        $i = 1;
                        // Start first row
                        echo '<div class="row">';

                        foreach ($projects as $project) {
                            echo '<article id="prosjekt-' . $project['slug'] . '" class="col s12">';

                            switch ($project['type']) {
                                case 'article':
                                    include('templates/project-article.php');
                                    break;

                                case 'media':
                                    include('templates/project-media.php');
                                    break;

                                default:
                                    echo 'Error: Fant ikke prosjekt';
                                    break;
                            }

                            echo '</article>';

                            // Close row after 3 columns, and start a new row
                            if ($i++ % 3 == 0) {
                                echo '</div>';
                                echo '<div class="row">';
                            }
                        }

                        // Close last row when done
                        echo '</div>';
                    ?>
            </div>
        </div>
    </section>
    <section id="om" class="tabs">
        <div class="tabs-wrapper white-bg">
            <button class="tabs-close btn blackLight"><i class="icon-arrow-31"></i><span>Tilbake</span></button>
            <div class="tabs-inner layout-square-medium">
                <article>
                    <header>
                        <img id="me" src="images/graphics/me.jpg" alt="Bjørnar Hagen">
                        <h2><span>Hei!</span> <i class="icon-smiley-happy-3"></i></h2>
                        <p>Jeg heter Bjørnar Hagen og er 19 år og går første året dataingenør. Jeg har en del bakgrunn i
                        web-design og utvikling, blant annet fra å være lærling i 2 år hos
                        <a href="https://optimalesystemer.no/" target="_blank">Optimale Systemer</a>. Har alltid hatt en
                        lidenskap for alt som har med data å gjøre. Web-design er noe jeg har hatt som hobby de 5 siste årene.</p>
                    </header>
                    <section>
                        <h3><span>Linker</span> <i class="icon-link-2"></i></h3>
                        <ul>
                            <li>
                                <a href="https://wiki.hiof.no/index.php/Hagen_Bj%C3%B8rnar" target="_blank">Wiki side</a>
                            </li>
                            <li>
                                <a href="http://www.it-stud.hiof.no/~bestjohm" target="_blank">Best of the Johns</a>
                            </li>
                            <li>
                                <a href="http://www.it-stud.hiof.no/~denniss" target="_blank">Dennis</a>
                            </li>
                            <li>
                                <a href="http://www.it-stud.hiof.no/~linesaa" target="_blank">Line</a>
                            </li>
                        </ul>
                    </section>
                    <section>
                        <h3><span>Kontakt</span> <i class="icon-mail-1"></i></h3>
                        <p>E-post: <a href="mailto:bjornar.e.hagen@hiof.no">bjornar.e.hagen@hiof.no</a></p>
                    </section>
                </article>
                <article>
                    <div class="space-v-small"></div>
                    <header>
                        <h2><span>Om nettstedet</span> <i class="icon-window-3"></i></h2>
                        <p>Nettstedet er kodet for hånd i Sublime Text med PHP, HTML, CSS og JavaScript.</p>
                        <p>For å mer effektivt skrive CSS så brukte jeg
                        <a href="http://sass-lang.com/" target="blank" title="CSS with superpowers">SASS</a>.
                        Jeg brukte også <a href="https://jquery.com/" target="_blank">jQuery</a> for JavaScript.</p>
                        <p><a href="prosjekter/studiewebsted/">Mer om nettstedet</a></p>
                    </header>
                </article>
                <img id="om-logo" src="images/brand/logo/logo-black-1x1.png" alt="Logo">
            </div>
        </div>
    </section>
    <?php require_once('templates/footer.php'); ?>
    <script src="js/index.js"></script>
</body>
</html>