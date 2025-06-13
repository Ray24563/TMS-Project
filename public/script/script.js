// Global base URL for AJAX calls
const base_url = document.querySelector('base')?.href || window.location.origin + '/';

// Form validation
(function() {
  'use strict';
  
  window.addEventListener('load', function() {
    // Fetch all forms with the 'needs-validation' class
    var forms = document.getElementsByClassName('needs-validation');
    
    // Loop over them and prevent submission
    Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();

// Auto-dismiss alerts after 3 seconds
document.addEventListener('DOMContentLoaded', function() {
  const successAlert = document.getElementById('success-alert');
  const errorAlert = document.getElementById('error-alert');
  
  if (successAlert) {
    setTimeout(() => {
      successAlert.style.transition = 'opacity 0.5s';
      successAlert.style.opacity = '0';
      setTimeout(() => successAlert.remove(), 500);
    }, 3000);
  }
  
  if (errorAlert) {
    setTimeout(() => {
      errorAlert.style.transition = 'opacity 0.5s';
      errorAlert.style.opacity = '0';
      setTimeout(() => errorAlert.remove(), 500);
    }, 3000);
  }
});