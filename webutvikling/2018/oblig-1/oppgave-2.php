<?php
  $body_id = 'article-oppgave-2';
  $body_classes = 'article-page';

  require('../../../partials/head.php');
  require('../../../partials/navigation.php');

  $articles = json_decode(file_get_contents(__DIR__ . '/summary.json'));
  $current_path = $_project_path . '/webutvikling/2018/oblig-1/';
  $current_slug = 'oppgave-2';
?>
<main>
  <header class="intro-header header-fancy header-fixed" style="background-image: url('<?= $_project_path ?>/images/articles/laptop-mac.jpg')">
    <div class="header-content">
      <h1>Oblig 1</h1>
      <nav>
        <?php
          foreach ($articles as $article):
          if ($current_slug != $article->slug):
        ?>
        <a href="<?= $current_path . $article->slug ?>.php"><?= $article->title ?></a>
        <?php
          endif;
          endforeach;
        ?>
      </nav>
    </div>
  </header>
  <article>
    <header>
      <h2>Oppgave 2</h2>
      <div class="meta">
        <span>Bjørnar Hagen</span>
        <span>—</span>
        <time datetime="2018-09-17T16:54Z">2018-09-17 16:54</time>
      </div>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias a, dicta
      beatae, enim eum in quo, ipsa repudiandae quam distinctio est blanditiis
      praesentium iusto molestias esse similique quisquam! Assumenda, nobis!</p>
    </header>
    <div class="content">
      <div class="read">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias a, dicta
        beatae, enim eum in quo, ipsa repudiandae quam distinctio est blanditiis
        praesentium iusto molestias esse similique quisquam! Assumenda, nobis!</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel accusamus
        hic ullam, placeat neque, eveniet dolore ea non sapiente ab doloribus
        repellendus quae, ex cumque quo adipisci ipsam eius minima est. Iusto quia
        ea nemo. Error unde repellendus eum illum explicabo ad aperiam nobis ipsam,
        odio similique aspernatur facere, at, quae autem est recusandae, animi</p>
      </div>
      <div class="split">
        <div class="read">
          <p>voluptatibus magnam earum aut. Rerum recusandae explicabo soluta incidunt
          eum, officia maxime eos, deleniti eius voluptatum provident amet, dolorum
          voluptatem nobis. <a id="link-1" href="#link-1">Omnis</a> voluptas error
          asperiores hic at itaque magni maiores vero placeat officia suscipit sapiente
          delectus ipsa, perferendis, laborum dolorem quaerat velit optio impedit, odio
          cum molestiae incidunt recusandae! Sed incidunt molestias quam nisi, ad qui
          quae architecto magnam</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias a, dicta
          beatae, enim eum in quo, ipsa repudiandae quam distinctio est blanditiis
          praesentium iusto molestias esse similique quisquam! Assumenda, nobis!</p>
        </div>
        <figure>
          <img src="/images/articles/laptop-mac.jpg" alt="Oppgave 2 image">
          <figcaption>Trykk og hold på bilde for å gjøre det større</figcaption>
        </figure>
      </div>
      <div class="read">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel accusamus
        hic ullam, placeat neque, eveniet dolore ea non sapiente ab doloribus
        repellendus quae, ex <em>cumque</em> quo adipisci ipsam eius minima est. Iusto quia
        ea nemo. Error unde repellendus eum illum explicabo ad aperiam nobis ipsam,
        odio similique aspernatur facere, at, quae autem est recusandae, animi</p>
        <blockquote class="fancy">
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias a, dicta
          beatae, enim eum in quo, ipsa repudiandae quam distinctio est blanditiis
          praesentium iusto molestias esse similique quisquam! Assumenda, nobis!</p>
          <cite>H. Rackham</cite>
        </blockquote>
        <p>voluptatibus magnam earum aut. Rerum recusandae explicabo soluta incidunt
        eum, officia maxime eos, deleniti eius voluptatum provident amet, dolorum
        voluptatem nobis. Omnis voluptas error asperiores hic at itaque magni maiores
        vero placeat officia suscipit sapiente delectus ipsa, perferendis, laborum
        dolorem quaerat velit optio impedit, odio cum molestiae incidunt recusandae!
        Sed incidunt molestias quam nisi, ad qui quae architecto magnam</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias a, dicta
        beatae, enim eum in quo, ipsa repudiandae quam distinctio est blanditiis
        praesentium iusto molestias esse similique quisquam! Assumenda, nobis!</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel accusamus
        hic ullam, placeat neque, eveniet dolore ea non sapiente ab doloribus
        repellendus quae, ex <em>cumque</em> quo adipisci ipsam eius minima est. Iusto quia
        ea nemo. Error unde repellendus eum illum explicabo ad aperiam nobis ipsam,
        odio similique aspernatur facere, at, quae autem est recusandae, animi</p>
        <p>voluptatibus magnam earum aut. Rerum recusandae explicabo soluta incidunt
        eum, officia maxime eos, deleniti eius voluptatum provident amet, dolorum
        voluptatem nobis. Omnis voluptas error asperiores hic at itaque magni maiores
        vero placeat officia suscipit sapiente delectus ipsa, perferendis, laborum
        dolorem quaerat velit optio impedit, odio cum molestiae incidunt recusandae!
        Sed incidunt molestias quam nisi, ad qui quae architecto magnam</p>
      </div>
    </div>
  </article>
</main>
<link rel="stylesheet" href="<?= $_project_path ?>/css/stilark.css">
<?php require('../../../partials/footer.php'); ?>
