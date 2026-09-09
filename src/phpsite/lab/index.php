<?php require_once('../templates/head.php'); ?>
    <link rel='stylesheet' href='/phpsite/fonts/hack/hack.css'>
    <style>
        #nav-main {
            opacity: 1;
            background-color: #171717;
        }

        #nav-main a {
            opacity: 0.5;
            color: #fff;
        }

        #nav-main a:hover,
        #nav-main a:focus {
            opacity: 1;
        }
    </style>
</head>
<body class="article">
    <?php require_once('../templates/nav.php'); ?>
    <header class="black-bg space-v-large">
        <div class="center-align space-v-medium">
            <h1 class="no-margin"><span>Lab</span></h1>
        </div>
    </header>
    <div class="space-a-small center-align white-bg">
        <section class="layout-square-small">
            <header>
                <h2>JavaScript</h2>
            </header>
            <ul class="left-align">
                <?php
                    $dir = __DIR__ . '/js/';
                    $files = is_dir($dir) ? (scandir($dir) ?: []) : [];
                    $files = array_values(array_filter($files, function ($file) use ($dir) {
                        return $file[0] !== '.' && is_file($dir . $file);
                    }));

                    if (!$files) {
                        echo '<li>Ingen laboppgaver er tilgjengelige i dette arkivet.</li>';
                    }

                    foreach ($files as $file) {
                        ?>
                        <li><a href="js/<?= rawurlencode($file) ?>"><?= htmlspecialchars($file, ENT_QUOTES, 'UTF-8') ?></a></li>
                        <?php
                    }
                ?>
            </ul>
        </section>
        <div class="space-v-large"></div>
        <div class="space-v-large"></div>
        <div class="space-v-large"></div>
    </div>
    <?php require_once('../templates/footer.php'); ?>
</body>
</html>
