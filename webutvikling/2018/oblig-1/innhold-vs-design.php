<?php
  $body_id = 'article-oppgave-3';
  $body_classes = 'article-page';

  require('../../../partials/head.php');
  require('../../../partials/navigation.php');

  $articles = json_decode(file_get_contents(__DIR__ . '/summary.json'));
  $current_path = $_project_path . '/webutvikling/2018/oblig-1/';
  $current_slug = 'innhold-vs-design';
?>
<main>
  <header class="intro-header header-fancy" style="background-image: url('<?= $_project_path ?>/images/articles/colors.jpg')">
    <div class="header-content">
      <h1>Oblig 1</h1>
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
      <h2>03 - innhold vs design</h2>
      <div class="meta">
        <span>Bjørnar Hagen</span>
        <span>—</span>
        <time datetime="2018-09-17T19:42Z">2018-09-17 19:42</time>
      </div>
      <p>Det<?= $_fingerprint ?>er viktig å skille på innhold og design, for da er prosjektet enklere
      å vedlikeholde, man unngår problemer med versjonskontroll, og kanskje
      viktigst av alt: det er bedre for universell utforming.</p>
    </header>
    <div class="content">
      <div class="read">
        <h3>Vedlikehold</h3>
        <p>Det er viktig å skille mellom innhold og design for da blir det enklere
        å vedlikeholde prosjektet. Har man f.eks. en nettside med inline styler
        overalt, sammen med ekstern stilark, vil man alltid ende opp med å lete
        etter riktig sted å endre på stil.</p>
      </div>
      <div class="split">
        <div class="read">
          <h3>Versjonskontroll</h3>
          <p>Et annet problem som går litt i poenget over er det med versjonskontroll.
          Om man ikke skiller på innhold og design kan det hende at man har mange
          versjoner av samme filer hvor det er blitt endret på innhold noen ganger og
          design andre ganger. Dette er problematisk hvis man vil rulle tilbake designet,
          men beholde innholdet.</p>
          <h3>Universell utforming</h3>
          <p>Kanskje det viktiske med å skille på innhold og design er
          universell utforming. Blander man for mye, vil man fort skape problemer
          for skjermlesere.</p>
        </div>
        <figure>
          <img src="/images/articles/colors.jpg" alt="Oppgave 3 image">
          <figcaption>Trykk og hold på bilde for å gjøre det større</figcaption>
        </figure>
      </div>
    </div>
  </article>
</main>
<link rel="stylesheet" href="<?= $_project_path ?>/css/stilark.css">
<?php require('../../../partials/footer.php'); ?>
