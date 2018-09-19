<?php
  $body_id = 'article-oppgave-6';
  $body_classes = 'article-page';

  require('../../../partials/head.php');
  require('../../../partials/navigation.php');

  $articles = json_decode(file_get_contents(__DIR__ . '/summary.json'));
  $current_path = $_project_path . '/webutvikling/2018/oblig-1/';
  $current_slug = 'stilark';
?>
<main>
  <header class="intro-header header-fancy" style="background-image: url('<?= $_project_path ?>/images/articles/css-code.jpg')">
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
      <h2>06 - stilark</h2>
      <div class="meta">
        <span>Bjørnar Hagen</span>
        <span>—</span>
        <time datetime="2018-09-17T22:15Z">2018-09-17 22:15</time>
      </div>
    </header>
    <div class="content">
      <div class="read">
        <p><strong>Obs</strong>, denne er ikke lagt inn i head, ligger helt i slutten av dokumentet, rett før footer.</p>
        <p><code>&lt;link rel="stylesheet" href="<a href="<?= $_project_path ?>/css/stilark.css"><?= $_project_path ?>/css/stilark.css</a>"&gt;</code></p>
      </div>
    </div>
  </article>
</main>
<link rel="stylesheet" href="<?= $_project_path ?>/css/stilark.css">
<?php require('../../../partials/footer.php'); ?>
