<?php
  $body_id = 'article-oppgave-5';
  $body_classes = 'article-page';

  require('../../../partials/head.php');
  require('../../../partials/navigation.php');

  $articles = json_decode(file_get_contents(__DIR__ . '/summary.json'));
  $current_path = $_project_path . '/webutvikling/2018/oblig-1/';
  $current_slug = 'semantikk';
?>
<main>
  <header class="intro-header header-fancy" style="background-image: url('<?= $_project_path ?>/images/articles/redish-thing.jpg')">
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
      <h2>05 - Semantikk</h2>
      <div class="meta">
        <span>Bjørnar Hagen</span>
        <span>—</span>
        <time datetime="2018-09-17T19:42Z">2018-09-17 19:42</time>
      </div>
      <p>Nye sematiske tagger hjelper nettlesere og skjermlesere å enklere forstå
      innhold på nett.</p>
    </header>
    <div class="content">
      <div class="read">
        <h3>Nye semantiske tagger</h3>
        <dl>
          <dt><code>&lt;section&gt;</code></dt>
          <dd>Brukes<?= $_fingerprint ?>for å definere en generell seksjon. Gjerne
          når man ikke har en mer beskrivende tag. Section kan brukes for å
          definere større seksjoner av en side. F.eks. kan en avis deles inn i en
          seksjon for hver av sine hovedkategorier, som sport/vær/kjendiser osv.</dd>
          <dd>Hver section skal helst ha en heading.</dd>
          <dt><code>&lt;main&gt;</code></dt>
          <dd>Brukes for å definere hovedinnholdet på en side.</dd>
          <dt><code>&lt;article&gt;</code></dt>
          <dd>Brukes for å definere en artikkel. Trenger ikke å brukes kun for
          hele artikkler, kan også brukes for oppsummerte artikkler. F.eks. på
          en nett-avis kan man ha en forside med mangle article tagger, som bare
          inneholder oppsummeringen av hver artikkel.</dd>
          <dd>Skal helst inneholde en heading</dd>
          <dt><code>&lt;header&gt;</code></dt>
          <dd>Brukes som en slags wrapper for innhold som introduserer det som
          kommer. Inneholder gjerne en heading, navigasjonslinker, og kanskje et
          utdrag om det er header for en artikkel.</dd>
          <dd>Man kan f.eks. sette header for hele siden (i body), for en section
          eller for en article.</dd>
          <dt><code>&lt;nav&gt;</code></dt>
          <dd>Brukes for å representere navigasjonselementer. Må ikke kun være site-wide
          navigasjon, men skal helst kun være viktige linker.</dd>
          <dt><code>&lt;footer&gt;</code></dt>
          <dd>Brukes nesten som en header, bare etter ting i stedet for før, og
          gjerne for mindre viktige ting. Her kan man putte relevante linker,
          ekstra navigasjonselementer, forfatter og copyright, osv.</dd>
          <dt><code>&lt;aside&gt;</code></dt>
          <dd>Aside brukes ofte som en sidebar til innhold som ikke nødvendigvis er direkte
          relatert.</dd>
          <dt><code>&lt;time&gt;</code></dt>
          <dd>Brukes for å angi dato og/eller klokkeslett. Her har man en kjekk
          datetime attributt som lar deg fortelle nettleseren din tid/dato
          på en standard måte som alle skal skjønne.</dd>
          <dt><code>&lt;figure&gt;</code></dt>
          <dd>Brukes for et bilde, en illustrasjon, litt kode, e.l. Gjerne følger
          man på med en figcaption som beskriver hva figure-en inneholder. Nesten
          litt som "alt" attributten til img taggen.</dd>
          <dt><code>&lt;dialog&gt;</code></dt>
          <dd>Representerer en dialog. Som et popup vindu som varsler brukeren om
          noe, og lar dem utføre relevante handlinger.</dd>
          <dt><code>&lt;details&gt;</code></dt>
          <dd>Brukes for det som lenge har blitt kalt for accordion. Lar brukeren
          utvide elementet for å vise mer detaljer.</dd>
          <dt><code>&lt;mark&gt;</code></dt>
          <dd>Brukes for å markere (highlighte) tekst.</dd>
        </dl>
        <h3>Sematiske vs ikke-semantiske</h3>
        <p>Fordelen med å bruke sematiske tagger er at det er mye enklere for
        nettlesere og skjermlesere å skjønne hva forskjellige ting på en
        nettside er. Bruker man bare div og span til alt mulig, må man egentlig
        bare gjette på hva ting er basert på klassenavn og kanskje innholdet.</p>
        <p>Med sematiske tagger slipper man å gjette. Man kan være sikker på at
        inni en &lt;nav&gt;-tag så er det navigasjonselementer (gitt at
        utvikeleren har gjort riktig da).</p>
      </div>
    </div>
  </article>
</main>
<link rel="stylesheet" href="<?= $_project_path ?>/css/stilark.css">
<?php require('../../../partials/footer.php'); ?>
