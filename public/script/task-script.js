// Get base URL for API calls
const baseUrl = document.querySelector('base')?.getAttribute('href') || window.location.origin + '/';

document.addEventListener('DOMContentLoaded', function() {
  // Form validation
  (function() {
    'use strict';
    
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation');
    
    // Loop over them and prevent submission
    Array.prototype.slice.call(forms).forEach(function(form) {
      form.addEventListener('submit', function(event) {
        if (!form.checkValidity()) {
          event.preventDefault();
          event.stopPropagation();
        }
        
        form.classList.add('was-validated');
      }, false);
    });
  })();

  // Store users for reference
  let users = [];

  // Fetch users once for dropdown and reference
  fetch(baseUrl + 'user/getUsers')
    .then(response => response.json())
    .then(data => {
      users = data;
      const userSelect = document.getElementById('edit-user');
      
      if (userSelect) {
        // Clear existing options except the first one
        while (userSelect.options.length > 1) {
          userSelect.remove(1);
        }
        
        // Add user options
        users.forEach(user => {
          const option = document.createElement('option');
          option.value = user.id;
          option.textContent = user.username;
          userSelect.appendChild(option);
        });
      }
    })
    .catch(error => console.error('Error fetching users:', error));

  // Edit task button event listeners
  const editButtons = document.querySelectorAll('.edit-task-btn');
  if (editButtons) {
    editButtons.forEach(button => {
      button.addEventListener('click', function(e) {
        e.preventDefault();
        const taskId = this.getAttribute('data-id');
        
        // Fetch task data
        fetch(baseUrl + 'task/edit/' + taskId)
          .then(response => response.json())
          .then(data => {
            if (data.error) {
              console.error(data.error);
              return;
            }
            
            // Fill form with task data
            document.getElementById('edit-task-id').value = data.task.id;
            document.getElementById('edit-title').value = data.task.title;
            document.getElementById('edit-description').value = data.task.description;
            document.getElementById('edit-user').value = data.task.user_id;
            document.getElementById('edit-status').value = data.task.status;
            document.getElementById('edit-due-date').value = data.task.due_date;
            
            // Show modal
            const editModal = new bootstrap.Modal(document.getElementById('editTaskModal'));
            editModal.show();
          })
          .catch(error => console.error('Error:', error));
      });
    });
  }

  // Task row click for details
  const taskRows = document.querySelectorAll('.task-row');
  if (taskRows) {
    taskRows.forEach(row => {
      row.addEventListener('click', function(e) {
        // Ignore clicks on the action buttons
        if (e.target.classList.contains('fa') || e.target.closest('a') || e.target.closest('i')) {
          return;
        }
        
        const taskId = this.getAttribute('data-id');
        
        // Fetch task details
        fetch(baseUrl + 'task/getTaskDetail/' + taskId)
          .then(response => response.json())
          .then(task => {
            if (task.error) {
              console.error(task.error);
              return;
            }
            
            // Fill task detail modal
            document.getElementById('detail-title').textContent = task.title;
            document.getElementById('detail-user-name').textContent = task.first_name + ' ' + task.last_name;
            document.getElementById('detail-description').textContent = task.description;
            document.getElementById('detail-status').textContent = task.status;
            document.getElementById('detail-due-date').textContent = new Date(task.due_date).toLocaleDateString();
            
            // Show modal
            const detailModal = new bootstrap.Modal(document.getElementById('taskDetailModal'));
            detailModal.show();
          })
          .catch(error => console.error('Error:', error));
      });
      
      // Add hover effect
      row.style.cursor = 'pointer';
      row.addEventListener('mouseover', function() {
        this.style.backgroundColor = '#f5f5f5';
      });
      row.addEventListener('mouseout', function() {
        this.style.backgroundColor = '';
      });
    });
  }
});