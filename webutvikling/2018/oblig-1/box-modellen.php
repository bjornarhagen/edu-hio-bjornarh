<?php
  $body_id = 'article-oppgave-7';
  $body_classes = 'article-page';

  require('../../../partials/head.php');
  require('../../../partials/navigation.php');

  $articles = json_decode(file_get_contents(__DIR__ . '/summary.json'));
  $current_path = $_project_path . '/webutvikling/2018/oblig-1/';
  $current_slug = 'box-modellen';
?>
<main>
  <header class="intro-header header-fancy" style="background-image: url('<?= $_project_path ?>/images/articles/boxes.jpg')">
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
      <h2>07 - Box modellen</h2>
      <div class="meta">
        <span>Bjørnar Hagen</span>
        <span>—</span>
        <time datetime="2018-09-17T22:15Z">2018-09-17 22:15</time>
      </div>
    </header>
    <div class="content">
      <div class="read">
        <div class="box-model">
          <span>Box model</span>
          <div class="bm-margin">
            <span>Margin</span>
            <div class="bm-border">
              <span>Border</span>
              <div class="bm-padding">
                <span>padding</span>
                <div class="bm-content">
                  <span>Content</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <p>Alle bokser har satt bredde og høyde til 10em. </p>
        <h3>Box-sizing</h3>
        <div class="boxes everything-boxes">
          <div class="box everything-1">border-box</div>
          <div class="box everything-2">content-box</div>
        </div>
        </div>
        <h3>Margin</h3>
        <div class="boxes margin-boxes">
          <div class="box margin-all">Margin alle kanter</div>
          <div class="box margin-side">Margin høre og venstre side</div>
          <div class="box margin-negative">Negativ margin</div>
        </div>
        <h3>Padding</h3>
        <div class="boxes padding-boxes">
          <div class="box padding-all">Padding alle kanter</div>
          <div class="box padding-side">Padding høyre side</div>
        </div>
        <h3>Border</h3>
        <div class="boxes border-boxes">
          <div class="box border-all">Border alle kanter</div>
          <div class="box border-side">Border høyre side</div>
        </div>
        <h3>Overflow</h3>
        <div class="boxes overflow-boxes">
          <div class="box overflow-1"><strong>overflow: visible;</strong> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque nihil, repellat beatae ullam pariatur sed! Expedita facere, dignissimos tempora veritatis repellendus nesciunt accusamus reprehenderit veniam ex sapiente cupiditate alias molestiae odio eveniet, praesentium, hic unde! Consectetur deleniti sit minima unde totam dignissimos debitis tenetur laudantium qui culpa tempore, commodi incidunt saepe, voluptatibus</div>
          <div class="box overflow-2"><strong>overflow: hidden;</strong> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque nihil, repellat beatae ullam pariatur sed! Expedita facere, dignissimos tempora veritatis repellendus nesciunt accusamus reprehenderit veniam ex sapiente cupiditate alias molestiae odio eveniet, praesentium, hic unde! Consectetur deleniti sit minima unde totam dignissimos debitis tenetur laudantium qui culpa tempore, commodi incidunt saepe, voluptatibus</div>
          <div class="box overflow-3"><strong>overflow: auto;</strong> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit delectus illo unde eveniet earum excepturi cum velit facilis aliquam quo perferendis quam praesentium, sit dolores voluptatum commodi, voluptate dicta. Impedit dolore architecto id, nemo fugiat tenetur quia odit eligendi nobis ex consequatur. Aut, ab at saepe aliquam, ullam ratione mollitia delectus explicabo quia nobis est quaerat pariatur eveniet iste officiis! Temporibus aut aliquid quaerat odit optio magni reiciendis tempora est dicta dolor, autem, velit necessitatibus corrupti repellat soluta fugiat at vero. Doloremque reiciendis, rem eveniet quod dolor cupiditate, quisquam sit iusto quaerat nisi culpa possimus in, libero perferendis iste ut!</div>
          <div class="box overflow-4"><strong>overflow: scroll;</strong> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit delectus illo unde eveniet earum excepturi cum velit facilis aliquam quo perferendis quam praesentium, sit dolores voluptatum commodi, voluptate dicta. Impedit dolore architecto id, nemo fugiat tenetur quia odit eligendi nobis ex consequatur. Aut, ab at saepe aliquam, ullam ratione mollitia delectus explicabo quia nobis est quaerat pariatur eveniet iste officiis! Temporibus aut aliquid quaerat odit optio magni reiciendis tempora est dicta dolor, autem, velit necessitatibus corrupti repellat soluta fugiat at vero. Doloremque reiciendis, rem eveniet quod dolor cupiditate, quisquam sit iusto quaerat nisi culpa possimus in, libero perferendis iste ut!</div>
        </div>
      </div>
    </div>
  </article>
</main>
<link rel="stylesheet" href="<?= $_project_path ?>/css/stilark.css">
<?php require('../../../partials/footer.php'); ?>
