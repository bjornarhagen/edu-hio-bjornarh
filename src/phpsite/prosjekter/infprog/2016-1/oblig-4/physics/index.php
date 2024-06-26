<!DOCTYPE html>
<html lang="no" prefix="og: http://ogp.me/ns">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1, maximum-scale=2.5, width=device-width, height=device-height">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> -->
    <title>Bjørnar Hagen</title>
    <link rel="stylesheet" href="/phpsite/css/bearwork.css">
    <link rel="stylesheet" href="/phpsite/css/global.css">
    <link rel="stylesheet" href="/phpsite/fonts/lato/lato.css">
    <link rel="stylesheet" href="/phpsite/fonts/lora/lora.css">
    <link rel="apple-touch-icon" sizes="180x180" href="/phpsite/apple-touch-icon.png">
    <link rel="icon" type="image/png" href="/phpsite/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="/phpsite/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="/phpsite/manifest.json">
    <meta name="theme-color" content="#687689">
    <link rel='stylesheet' href='/phpsite/fonts/hack/hack.css'>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav id="nav-main">
        <div id="nav-main-wrapper">
            <ul id="nav-main-logo">
                <li><a href="/phpsite/#hjem">Bjørnar Hagen</a></li>
            </ul>
            <ul id="nav-main-menu">
                <li>
                    <a href="/phpsite/#hjem" title="Hjem">
                        <i class="icon-house-2"></i>
                        <span>Hjem</span>
                    </a>
                </li>
                <li>
                    <a href="/phpsite/#prosjekter" title="Prosjekter">
                        <i class="icon-layers-1"></i>
                        <span>Prosjekter</span>
                    </a>
                </li>
                <li>
                    <a href="/phpsite/#om" title="Om meg">
                        <i class="icon-user-2"></i>
                        <span>Om meg</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <canvas id="canvas"></canvas>
    <footer id="footer">
        <p>Bjørnar Hagen - <?= date("Y"); ?></p>
        <div id="color-bar"></div>
    </footer>
    <script src="script.js"></script>
    <link rel="stylesheet" href="/phpsite/fonts/streamline/styles.css">
</body>
</html> 