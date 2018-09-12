<?php
  $body_id = 'om_meg-page';
?>
<?php require('partials/head.php'); ?>
<?php require('partials/navigation.php'); ?>
<main>
  <header class="header-fancy header-fixed">
    <div class="header-content">
      <svg id="Light" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><defs><style>.cls-1{fill:none;stroke:currentColor;stroke-linecap:round;stroke-linejoin:round;}</style></defs><title>single-neutral-circle</title><circle class="cls-1" cx="12" cy="12" r="11.5"/><path class="cls-1" d="M3.959,20.221a25.59,25.59,0,0,1,5.413-2.352c.837-.309.928-2.229.328-2.889-.866-.953-1.6-2.07-1.6-4.766A3.812,3.812,0,0,1,12,6.047a3.812,3.812,0,0,1,3.9,4.167c0,2.7-.734,3.813-1.6,4.766-.6.66-.509,2.58.328,2.889a25.59,25.59,0,0,1,5.413,2.352"/></svg>
      <h1>Om meg</h1>
    </div>
  </header>
  <section class="page-section">
    <h2>Kommer ...</h2>
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