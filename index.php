<?php require('partials/head.php'); ?>
<?php require('partials/navigation.php'); ?>
<main id="front-page">
  <header>
    <h1>Bjørnar Hagen</h1>
    <!-- <img src="/images/graphics/water.jpg" alt=""> -->
  </header>
  <section class="articles">
    <header>
      <h2>Oppgaver</h2>
    </header>
    <?php $articles = json_decode(file_get_contents(__DIR__ . '/artikler/summary.json')); ?>
    <?php foreach ($articles as $article): ?>
    <article class="article" itemscope itemtype="http://schema.org/Article">
      <header class="article-header">
        <h3 class="article-title" itemprop="name"><?= $article->title ?></h3>
        <img itemprop="image" class="article-image" src="<?= $article->image->url ?>" alt="<?= $article->image->alt ?>">
      </header>
      <div class="article-content content-text">
        <p class="article-excerpt" itemprop="description"><?= $article->excerpt ?></p>
      </div>
      <footer class="article-footer">
        <div class="article-author" itemprop="author" itemscope itemtype="http://schema.org/Person">
          <p class="article-author-name" itemprop="name"><?= $article->author->name ?></p>
          <p class="article-author-email" itemprop="email"><?= $article->author->email ?></p>
        </div>
        <p class="article-date" itemprop="datePublished"><?= $article->date ?></p>
        <a itemprop="url" href="<?= $_project_path ?>/artikler/<?= $article->slug ?>" class="button article-button">Les mer</a>
      </footer>
      <meta itemprop="headline" content="<?= $article->title ?>">
      <span itemprop="publisher" itemscope itemtype="http://schema.org/Person">
        <meta itemprop="name" content="<?= $article->author->name ?>">
      </span>
    </article>
    <?php endforeach; ?>
  </section>
</main>
<?php require('partials/footer.php'); ?>
