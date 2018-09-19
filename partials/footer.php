  <footer id="footer">
    <p>
      <a href="mailto:bjornarh@hiof.no">bjornarh@hiof.no</a>
    </p>
    <p>Bjørnar Hagen - <?= date("Y"); ?></p>
    <br><!-- Sorry for br, skal lage css i stedet senere -->
    <p>Kildekode: <a href="https://github.com/bearhagen/edu-hio-bjornarh/tree/webutvikling-2018" target="_blank">github.com/bearhagen/edu-hio-bjornarh</a></p>
  </footer>
  <link href="https://cdn.datahjelpen.no/fonts/butler/butler-700.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Roboto+Mono" rel="stylesheet">
  <script type="text/javascript">
    // For å lage padding med navigasjonen sin høyde
    function padForNav(element) {
      if (element == null) {
        element = document.querySelector('main');
      }

      var navWrapper = document.querySelector('#header-main');
      element.style.paddingTop = navWrapper.scrollHeight + 'px';
    };
  </script>
</body>
</html>
