export default {
  init() {
    // JavaScript to be fired on all pages
    // Mobile navigation menu

    var hamburger = document.getElementById('mobile-hamburger-icon');
    var mobileNav = document.getElementById('nav-mobile-menu');

    if (hamburger) {
      hamburger.addEventListener('click', function () {
        this.classList.toggle('mobile-hamburger-active');
        mobileNav.classList.toggle('mobile-menu-active');
      });
    }
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
