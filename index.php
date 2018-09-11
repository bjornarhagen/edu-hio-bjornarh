<?php
  $body_id = 'front-page';
?>
<?php require('partials/head.php'); ?>
<?php require('partials/navigation.php'); ?>
<main>
  <div class="layout-l">
    <h1>Hello world</h1>
  </div>
</main>
<script type="text/javascript">
  (function() {
    window.onload = function() {
      padForNav();
    };
  })();
</script>
<?php require('partials/footer.php'); ?>
