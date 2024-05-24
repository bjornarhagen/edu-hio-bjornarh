// Selvkjørende anonym funksjon
// Toggle for mobil menyen
(function() {
  const menuTriggerWrapper = document.querySelector('body > nav .menu-trigger');
  const menuTrigger = menuTriggerWrapper.querySelector('button');
  const menuLinks = document.querySelector('body > nav .links');

  menuTrigger.addEventListener('click', function() {
    menuTriggerWrapper.classList.toggle('active');
    menuLinks.classList.toggle('menu-show');
  });
})();
