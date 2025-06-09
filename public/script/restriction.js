 // The code "(function () { ... })();" is called Immediately Invoked Function (IIFE)
    // that allows the code to run immediately as soon as the pages load
    (function () {
      'use strict';
      var forms = document.querySelectorAll('.needs-validation');

      // Array.prototype.slice.call(forms) converts the form into Array to allow looping
      // through it using forEach
      Array.prototype.slice.call(forms).forEach(function (form) {
          form.addEventListener('submit', function (event) {
            // form.checkValidity checks if all inputs follow the rules 
            // (required fields, email format, password length, etc.).
              if (!form.checkValidity()) { 
                  event.preventDefault(); // Prevents form from being submitted
                  event.stopPropagation(); // Prevents other event handlers from running
              }
              // Triggers the is-valid and is-invalid class that will add to form-control
              form.classList.add('was-validated'); 
          }, false);
      });
  })();