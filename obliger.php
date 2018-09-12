<?php
  $body_id = 'obliger-page';
?>
<?php require('partials/head.php'); ?>
<?php require('partials/navigation.php'); ?>
<main>
  <header class="header-fancy header-fixed">
    <div class="header-content">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><defs><style>.a{fill:none;stroke:currentColor;stroke-linecap:round;stroke-linejoin:round;}</style></defs><title>common-file-stack</title><path class="a" d="M8,1h9.586a1,1,0,0,1,.707.293l2.414,2.414A1,1,0,0,1,21,4.414V18a1,1,0,0,1-1,1H8a1,1,0,0,1-1-1V2A1,1,0,0,1,8,1Z"/><path class="a" d="M18,21H6a1,1,0,0,1-1-1V4"/><path class="a" d="M16,23H4a1,1,0,0,1-1-1V6"/></svg>
      <h1>Obliger</h1>
    </div>
  </header>
  <section class="page-section">
    <h2>Webutvikling - 2018</h2>
    <ul>
      <li><a href="<?= $_project_path ?>/webutvikling/2018/oblig-1/index.php">Oblig 1</a></li>
      <li><a href="<?= $_project_path ?>/webutvikling/2018/oblig-2/index.php" disabled>Oblig 2</a></li>
      <li><a href="<?= $_project_path ?>/webutvikling/2018/oblig-3/index.php" disabled>Oblig 3</a></li>
      <li><a href="<?= $_project_path ?>/webutvikling/2018/oblig-4/index.php" disabled>Oblig 4</a></li>
      <li><a href="<?= $_project_path ?>/webutvikling/2018/oblig-5/index.php" disabled>Oblig 5</a></li>
    </ul>
  </section>
</main>
<script type="text/javascript">
  (function() {
    window.onload = function() {
      padForNav(document.querySelector('main > header'));
    };
  })();
</script>
<?php require('partials/footer.php'); ?>
