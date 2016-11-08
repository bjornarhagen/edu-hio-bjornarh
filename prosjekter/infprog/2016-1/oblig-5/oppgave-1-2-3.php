<?php require_once('../../../../templates/head.php'); ?>
    <link rel='stylesheet' href='/~bjornarh/fonts/hack/hack.css'>
    <style>
        html,
        body {
            height: 100%;
        }

        .bg-image.bg-fixed {
            background-attachment: fixed;
        }

        .o1-primary-bg {
            background-color: #3c225f;
        }

        .o1-primary-text {
            color: #3c225f;
        }

        .o1-accent-bg {
            background-color: #17E1E3;
        }

        .o1-accent-text {
            color: #17E1E3;
        }

        .o1-red-bg {
            background-color: #e31917;
        }

        .o1-red-text {
            color: #e31917;
        }

        .o1-grey-bg {
            background-color: #eaeaea;
        }

        .o1-grey-text {
            color: #eaeaea;
        }

        #o1-intro,
        #o1-intro-overlay,
        #o1-intro-bg {
            display: block;
            height: 100%;
        }

        #o1-intro {
            position: relative;
        }

        #o1-intro-overlay,
        #o1-intro-bg {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
        }

        #o1-intro-overlay {
            opacity: 0.8;
            background-color: #3c225f;
            z-index: 2;
        }

        #o1-intro-content {
            z-index: 3;
            width: 100%;
        }

        #o1-intro-content h1 {
            margin: 0;
            font-size: 2em;
        }

        #o1-intro-content h1 span {
            display: block;
        }

        #o1-intro-content h1 span:first-child {
            display: inline-block;
            line-height: 1em;
            padding: 10px 20px 20px;
            font-size: 3em;
            color: #17E1E3;
            text-transform: uppercase;
            background-color: #3c225f;
        }

        #o1-intro-content h1 span:last-child {
            margin: 0;
            margin-top: -0.5em;
            line-height: 1em;
            font-weight: 700;
            font-size: 1.5em;
        }

        #up-next-presentation img {
            width: 100%;
            max-width: 128px;
        }

        #o1-coming-list-wrapper {
            margin-top: -100px;
            margin-bottom: 100px;
            box-shadow: 0 0 25px rgba(60, 34, 95, 0.2);
        }

        #o1-coming-list {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        #o1-coming-list li {
            -webkit-transition: all 0.25s cubic-bezier(.4,0,.2,1);
            -o-transition: all 0.25s cubic-bezier(.4,0,.2,1);
            transition: all 0.25s cubic-bezier(.4,0,.2,1);
        }

        #o1-coming-list li:hover {
            color: #fff;
            background-color: #3c225f;
        }
    </style>
</head>
<body>
    <header id="o1-intro" class="white-text">
        <div id="o1-intro-overlay"></div>
        <div id="o1-intro-bg" class="bg-image bg-fixed" style="background-image: url('oppgave-1-2-3-materiale/_c-header-1.jpg');"></div>
        <div id="o1-intro-content" class="row center-v-h">
            <div class="col s12 m8 offset-m2">
                <h1 class="font-brand"><span>Enigma</span><span>- bedriftspresentasjoner</span></h1>
                <h2 class="font-brand">En unik mulighet for deg som student til å lære nye ting og komme i kontakt med innovative bedrifter</h2>
            </div>
        </div>
    </header>
    <main>
        <section class="row bg-image bg-fixed" style="background-image: url('oppgave-1-2-3-materiale/_c-header-1.jpg');">
            <div class="col s12 m8">
                <div class="o1-primary-bg space-h-large space-v-small">
                    <h1 class="o1-accent-text font-large font-thick">Up next...</h1>
                </div>
            </div>
            <div class="col s12 m4 center-align">
                <div id="up-next-presentation" class="white-bg space-h-small space-v-large">
                    <img src="oppgave-1-2-3-materiale/microsoft_logo.svg.png" alt="Microsoft Norge logo">
                    <h1>Microsoft Norge</h1>
                    <a href="#" class="btn alert">Meld deg på</a>
                </div>
            </div>
            <div class="col s12">
                <div class="space-a-large"></div>
            </div>
        </section>
        <section class="row">
            <div id="o1-coming-list-wrapper" class="col row offset-s1 s10 offset-m2 m8">
                <div class="col s12 grey-bg space-a-small center-align">
                    <h2>Kommende bedriftspresentasjoner</h2>
                </div>
                <div class="col s12 grey-bg">
                    <ul id="o1-coming-list">
                        <?php
                            for ($i=0; $i < 3; $i++) {
                                $extra_content = "";

                                if ($i === 0) {
                                    $extra_content = '<span style="padding: 2px 5px;" class="o1-red-bg white-text">Neste!</span>';
                                }

                                if ($i%2===0) {
                                    ?>
                                        <li class="row space-a-small">
                                            <div class="col s12 m8">
                                                <?= $extra_content; ?>
                                                <h3>Microsoft Norge</h3>
                                                <p>Lorem ipsum dolor sit amet</p>
                                                <p>Amet sit dolor ipsum lorem</p>
                                            </div>
                                            <div class="col s12 m4 space-v-small">
                                                <a href="#" class="btn greyDark">Meld deg på</a>
                                            </div>
                                        </li>
                                    <?php
                                } else {
                                    ?>
                                        <li class="row space-a-small o1-grey-bg">
                                            <div class="col s12 m8">
                                                <?= $extra_content; ?>
                                                <h3>Microsoft Norge</h3>
                                                <p>Lorem ipsum dolor sit amet</p>
                                                <p>Amet sit dolor ipsum lorem</p>
                                            </div>
                                            <div class="col s12 m4 space-v-small">
                                                <a href="#" class="btn black">Meld deg på</a>
                                            </div>
                                        </li>
                                    <?php
                                }
                            }
                        ?>
                        <li class="row space-a-small center-align white-bg">
                            <a href="#" class="btn black">Se flere...</a>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
        </main>
        <section>
            <div class="row bg-image bg-fixed" style="background-image: url('oppgave-1-2-3-materiale/_c-header-2.jpg');">
                <div class="space-a-large"></div>
                <div class="space-a-large"></div>
                <div class="space-a-large"></div>
            </div>
            <div class="row bg-image" style="background-image: url('oppgave-1-2-3-materiale/_c-header-3.jpg');">
                <div class="space-a-large"></div>
                <div class="space-a-large"></div>
                <div class="space-a-large">
                    <h1 class="font-brand o1-primary-text o1-accent-bg font-medium space-a-small">Et spetakulært og høymoderne rom</h1>
                </div>
            </div>
            <div class="row bg-image bg-fixed" style="background-image: url('oppgave-1-2-3-materiale/_c-header-1.jpg');">
                <div class="space-a-large"></div>
                <div class="space-a-large"></div>
                <div class="space-a-large"></div>
            </div>
        </section>
    </main>
    <?php require_once('../../../../templates/nav.php'); ?>
    <?php require_once('../../../../templates/footer.php'); ?>
    <script></script>
    <!-- <script src="/~bjornarh/js/prism/prism.js"></script> -->
    <!-- <link rel="stylesheet" href="/~bjornarh/css/prism/prism.css"> -->
</body>
</html>