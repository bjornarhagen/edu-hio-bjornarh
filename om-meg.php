<?php
  $body_id = 'om_meg-page';
  $body_classes = 'article-page';

  require('partials/head.php');
  require('partials/navigation.php');

  $tz  = new DateTimeZone('Europe/Oslo');
  $age = DateTime::createFromFormat('d/m/Y', '27/10/1996', $tz)->diff(new DateTime('now', $tz))->y;
?>
<main>
  <article class="layout-m">
    <div class="content-wrapper read">
      <img id="me" src="images/graphics/me.jpg" alt="Bjørnar Hagen">
      <h2>Hei!</h2>
      <p>Jeg heter Bjørnar Hagen og er <?= $age ?> år og går <?= $age-18 ?>. året dataingenør. Jeg har en del bakgrunn i
      web-design og utvikling, blant annet fra å vært lærling i 2 år hos Optimale Systemer og deretter jobbet daglig med mitt eget selskapet, <a href="https://datahjelpen.no" target="_blank">Datahjelpen AS</a>.
      Har alltid hatt en lidenskap for alt som har med data å gjøre.</p>
    </div>
  </article>
</main>
<?php require('partials/footer.php'); ?>
