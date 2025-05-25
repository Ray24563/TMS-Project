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

// Auto-dismiss alerts after 5 seconds
document.addEventListener('DOMContentLoaded', function() {
  setTimeout(function() {
    const alerts = document.querySelectorAll('.alert');
    alerts.forEach(function(alert) {
      const bsAlert = new bootstrap.Alert(alert);
      bsAlert.close();
    });
  }, 5000);
});