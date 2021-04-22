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

    // Array remove

    Array.prototype.remove = function() {
      var what, a = arguments, L = a.length, ax;
        while (L && this.length) {
            what = a[--L];
            while ((ax = this.indexOf(what)) !== -1) {
                this.splice(ax, 1);
            }
        }
        return this;
    };
  

    // Gravity forms JS

    const days = document.querySelectorAll('.dag');
    let prodInput = document.querySelector('#input_1_8');
    let daysIds = [];

    days.forEach(day => {
      day.addEventListener('click', (e) => {
        // Get Post ID and put in Array if in array remove
        let curId = e.target.id;
        daysIds.indexOf(curId) === -1 ? daysIds.push(curId) : daysIds.remove(curId);

        // Add or remove class when clicked
        if ( day.classList.contains('activeDay') ) {
          day.classList.remove('activeDay');
            let prodInputN = parseFloat(prodInput.value);
            prodInputN = prodInputN - 1;
            prodInput.value = prodInputN;
            $('#input_1_8').val(prodInput.value).change();
        } else {
          day.classList.add('activeDay');
          if (prodInput.value.length > 0) {
            let prodInputN = parseFloat(prodInput.value);
            
            prodInputN = prodInputN + 1;
            prodInput.value = prodInputN;
            $('#input_1_8').val(prodInput.value).change();
          } else {
            prodInput.value = prodInput.value + 1;
              
            $('#input_1_8').val(prodInput.value).change();
          }
        }


      })
    });

  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
