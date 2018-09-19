<?php
  $body_id = 'article-oppgave-4';
  $body_classes = 'article-page';

  require('../../../partials/head.php');
  require('../../../partials/navigation.php');

  $articles = json_decode(file_get_contents(__DIR__ . '/summary.json'));
  $current_path = $_project_path . '/webutvikling/2018/oblig-1/';
  $current_slug = 'webserver';
?>
<main>
  <header class="intro-header header-fancy" style="background-image: url('<?= $_project_path ?>/images/articles/servers.jpg')">
    <div class="header-content">
      <h1><a href="<?= $current_path ?>index.php">Oblig 1</a></h1>
      <nav>
        <?php
          foreach ($articles as $article):
            if ($current_slug != $article->slug):
        ?>
        <a href="<?= $current_path . $article->slug ?>.php"><?= $article->title ?></a>
        <?php else: ?>
        <a href="<?= $current_path . $article->slug ?>.php" class="current"><?= $article->title ?></a>
        <?php
            endif;
          endforeach;
        ?>
      </nav>
    </div>
  </header>
  <article>
    <header>
      <h2>04 - webserver</h2>
      <div class="meta">
        <span>Bjørnar Hagen</span>
        <span>—</span>
        <time datetime="2018-09-17T19:42Z">2018-09-17 19:42</time>
      </div>
      <p>Webservere er maskiner som brukes til å servere innhold for nettsider.</p>
    </header>
    <div class="content">
      <div class="read">
        <h3>Hardware</h3>
        <p>En<?= $_fingerprint ?>webserver kan referere til hardware eller software. Med tanke på
        hardware er webservere egentlig bare vanlige datamaskiner, men vil ofte være
        spesialtilpasset bruksbehovet. Mange webservere i dag bruker mye cache i
        stedet for å hente data på nytt fra en database. Derfor finner man en del
        webservere med ekstreme mengder RAM (flere TB) for å holde på cachen.
        Dette gjelder kanskje først og fremt for webserverene til de litt større
        og populære nettstedene. En mer gjennomsnittlig webserver vil nok ha en mer
        vanlig mengde RAM (1-4 GB), og kanskje en SSD for å raskt hente ut innhold fra disk.</p>
      </div>
      <div class="split">
        <div class="read">
          <h3>Software</h3>
          <p>Når det kommer til software siden av ting så finner man mye forskjellig.
          Det er mange typer webservere tilgjengelig, men de fleste er ganske like
          i funksjonalitet. Oppgaven til en webserver er først og fremt å sende
          statisk og eller dynamisk innhold.</p>
          <p>Webservere også vil ofte brukes til å prosessere innhold og lagre det,
          gjerne på en database.</p>
          <p>Webservere brukes altså for å servere og ta imot innhold. Dette skjer
          over HTTP/HTTPS protokollen. Helst på port 80 og 443.</p>
        </div>
        <figure>
          <img src="<?= $_project_path ?>/images/articles/servers.jpg" alt="Oppgave 4 image">
          <figcaption>Webservere</figcaption>
        </figure>
      </div>
      <div class="read">
        <h4>Forskjellige webservere</h4>
        <ul>
          <li>NGINX</li>
          <li>Apache</li>
          <li>IIS</li>
          <li>Puma</li>
          <li>Unicorn</li>
          <li>Passenger</li>
        </ul>
        <h3>Les mer</h3>
        <ul>
          <li><a href="https://developer.mozilla.org/en-US/docs/Learn/Common_questions/What_is_a_web_server" target="_blank">MDN - What is a web server?</a></li>
          <li><a href="https://en.wikipedia.org/wiki/Web_server" target="_blank">Wikipedia - Web server</a></li>
          <li><a href="https://help.ubuntu.com/lts/serverguide/web-servers.html" target="_blank">Ubuntu - Web servers</a></li>
        </ul>
      </div>
    </div>
  </article>
</main>
<link rel="stylesheet" href="<?= $_project_path ?>/css/stilark.css">
<?php require('../../../partials/footer.php'); ?>
