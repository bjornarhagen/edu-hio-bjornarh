<?php
  $body_id = 'front-page';
?>
<?php require('partials/head.php'); ?>
<?php require('partials/navigation.php'); ?>
<?php $articles = json_decode(file_get_contents(__DIR__ . '/artikler/summary.json')); ?>
<main>
  <header class="intro-header">
    <div class="header-content">
      <h1>Bjørnar Hagen</h1>
      <nav>
        <?php foreach ($articles as $article): ?>
        <a href="<?= $_project_path ?>/artikler/<?= $article->slug ?>"><?= $article->title ?></a>
        <?php endforeach; ?>
      </nav>
    </div>
  </header>
  <section class="articles">
    <header>
      <h2>Oppgaver</h2>
    </header>
    <?php foreach ($articles as $article): ?>
    <article class="article theme-brightness-<?= $article->theme->brightness ?> theme-color-<?= $article->theme->color ?>" itemscope itemtype="http://schema.org/Article">
      <div class="article-bg">
        <div class="border"></div>
        <div class="color-wall"></div>
      </div>
      <header class="article-header">
        <img src="/images/icons/pixelv/document-1.png" class="article-icon" alt="">
        <img itemprop="image" class="article-image" src="<?= $_project_path . $article->image->url ?>" alt="<?= $article->image->alt ?>">
      </header>
      <div class="article-content content-text">
        <h3 class="article-title" itemprop="name"><?= $article->title ?></h3>
        <p class="article-excerpt" itemprop="description"><?= $article->excerpt ?></p>
        <a itemprop="url" href="<?= $_project_path ?>/artikler/<?= $article->slug ?>" class="button article-button">Les mer</a>
      </div>
      <meta itemprop="headline" content="<?= $article->title ?>">
      <span itemprop="publisher" itemscope itemtype="http://schema.org/Person">
        <meta itemprop="name" content="<?= $article->author->name ?>">
      </span>
    </article>
    <?php endforeach; ?>
  </section>
</main>
<?php require('partials/footer.php'); ?>
