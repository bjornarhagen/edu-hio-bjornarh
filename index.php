<?php
  $body_id = 'front-page';
?>
<?php require('partials/head.php'); ?>
<?php require('partials/navigation.php'); ?>
<main>
  <header class="header-fixed">
    <nav>
      <a href="<?= $_project_path ?>/om-meg.php">
        <p>Om meg</p>
        <svg id="Light" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><defs><style>.cls-1{fill:none;stroke:currentColor;stroke-linecap:round;stroke-linejoin:round;}</style></defs><title>single-neutral-circle</title><circle class="cls-1" cx="12" cy="12" r="11.5"/><path class="cls-1" d="M3.959,20.221a25.59,25.59,0,0,1,5.413-2.352c.837-.309.928-2.229.328-2.889-.866-.953-1.6-2.07-1.6-4.766A3.812,3.812,0,0,1,12,6.047a3.812,3.812,0,0,1,3.9,4.167c0,2.7-.734,3.813-1.6,4.766-.6.66-.509,2.58.328,2.889a25.59,25.59,0,0,1,5.413,2.352"/></svg>
      </a>
      <a href="<?= $_project_path ?>/obliger.php">
        <p>Obliger</p>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><defs><style>.a{fill:none;stroke:currentColor;stroke-linecap:round;stroke-linejoin:round;}</style></defs><title>common-file-stack</title><path class="a" d="M8,1h9.586a1,1,0,0,1,.707.293l2.414,2.414A1,1,0,0,1,21,4.414V18a1,1,0,0,1-1,1H8a1,1,0,0,1-1-1V2A1,1,0,0,1,8,1Z"/><path class="a" d="M18,21H6a1,1,0,0,1-1-1V4"/><path class="a" d="M16,23H4a1,1,0,0,1-1-1V6"/></svg>
      </a>
      <a href="<?= $_project_path ?>/lab.php">
        <p>Lab</p>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><defs><style>.a{fill:none;stroke:currentColor;stroke-linecap:round;stroke-linejoin:round;}</style></defs><title>lab-flask-experiment</title><path class="a" d="M9.5,3.5v8L4.7,19.354A2,2,0,0,0,6.342,22.5H17.658A2,2,0,0,0,19.3,19.354L14.5,11.5v-8"/><path class="a" d="M16.5,2.5a1,1,0,0,1-1,1h-7a1,1,0,0,1,0-2h7A1,1,0,0,1,16.5,2.5Z"/><line class="a" x1="14.5" y1="5.5" x2="12.5" y2="5.5"/><line class="a" x1="14.5" y1="9.5" x2="12.5" y2="9.5"/><line class="a" x1="14.5" y1="7.5" x2="11.5" y2="7.5"/><line class="a" x1="7.057" y1="15.5" x2="16.943" y2="15.5"/><circle class="a" cx="9.5" cy="19" r="1.5"/><path class="a" d="M15.5,20.25a.25.25,0,0,1,.25.25"/><path class="a" d="M15.25,20.5a.25.25,0,0,1,.25-.25"/><path class="a" d="M15.5,20.75a.25.25,0,0,1-.25-.25"/><path class="a" d="M15.75,20.5a.25.25,0,0,1-.25.25"/><path class="a" d="M13.5,17.25a.25.25,0,0,1,.25.25"/><path class="a" d="M13.25,17.5a.25.25,0,0,1,.25-.25"/><path class="a" d="M13.5,17.75a.25.25,0,0,1-.25-.25"/><path class="a" d="M13.75,17.5a.25.25,0,0,1-.25.25"/></svg>
      </a>
    </nav>
  </header>
</main>
<script type="text/javascript">
  (function() {
    window.onload = function() {
      padForNav(document.querySelector('main > header'));
    };
  })();
</script>
<?php require('partials/footer.php'); ?>
