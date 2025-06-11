<?= $this->extend('layouts/main_user') ?>

<?php $this->section('user_content') ?>

<section class="container mb-5 mt-5 d-lg-flex justify-content-center gap-5 align-items-start">

  <div class="container custom-bg-2 rounded-3 p-5 mt-4">
      <h1 class="dash-color-2 text-xxl-start text-center fw-bold mb-4">Task List</h1>
      <p class="alot-2 fw-medium fs-5">Total Task: <?= $totalTasks ?? 0 ?></p>
      <hr class="border-2">
  
      <?php if(session()->has('success')): ?>
        <div class="alert alert-success" id="success-alert">
          <?= session('success') ?>
        </div>
      <?php endif; ?>

      <?php if(session()->has('error')): ?>
        <div class="alert alert-danger" id="error-alert">
          <?= session('error') ?>
        </div>
      <?php endif; ?>
  
      <div class="table-responsive">
        <table class="w-100 text-center table-back-2 mt-4">
          <tr class="goat-curry">
            <th class="p-3">#</th>
            <th class="p-3">Title</th>
            <th class="p-3">Status</th>
            <th class="p-3">Due Date</th>
            <th class="p-3">Assigned To</th> 
          </tr>
      
          <?php if(!empty($tasks)): ?>
            <?php $i = 1; foreach($tasks as $task): ?>
              <tr class="talo-memphis-2 task-row" data-id="<?= $task['id'] ?>">
                <td class="p-3 closer"><?= $i++ ?></td>
                <td class="p-3 closer"><?= $task['title'] ?></td>
                <td class="p-3 closer"><?= $task['status'] ?></td>
                <td class="p-3 closer"><?= date('M-d-Y', strtotime($task['due_date'])) ?></td>
                <td class="p-3 closer"><?= $task['username'] ?></td>
              </tr>
            <?php endforeach; ?>
          <?php else: ?>
            <tr>
              <td colspan="6" class="p-3" style="color: #213555">No tasks found</td>
            </tr>
          <?php endif; ?>
        </table>
      </div>
    </div>

<script>
const baseUrl = document.querySelector('base')?.getAttribute('href') || window.location.origin + '/index.php/';

document.addEventListener('DOMContentLoaded', function() {
  // Form validation
  (function() {
    'use strict';
    
    var forms = document.querySelectorAll('.needs-validation');
    
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
        while (userSelect.options.length > 1) {
          userSelect.remove(1);
        }

        users.forEach(user => {
          const option = document.createElement('option');
          option.value = user.id;
          option.textContent = user.username;
          userSelect.appendChild(option);
        });
      }
    })
    .catch(error => console.error('Error fetching users:', error));

  // Event listener of edit
  const editButtons = document.querySelectorAll('.edit-task-btn');
  if (editButtons) {
    editButtons.forEach(button => {
      button.addEventListener('click', function(e) {
        e.preventDefault();
        const taskId = this.getAttribute('data-id');
        
        // Fetch task data
        fetch(`<?= base_url('task/edit/') ?>${taskId}`)
          .then(response => {
            if (!response.ok) {
              throw new Error('Network response was not ok');
            }
            return response.json();
          })
          .then(data => {
            if (data.error) {
              console.error('Error:', data.error);
              return;
            }
            
            // Fills up the form with task data
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
          .catch(error => {
            console.error('Error fetching task data:', error);
            alert('Could not load task data. Please try again.');
          });
      });
    });
  }
  
  // Tooltip elements
  const tooltip = document.createElement('div');
  tooltip.className = 'task-tooltip';
  tooltip.style.position = 'absolute';
  tooltip.style.backgroundColor = '#f8f9fa';
  tooltip.style.border = '1px solid #dee2e6';
  tooltip.style.borderRadius = '4px';
  tooltip.style.padding = '10px';
  tooltip.style.zIndex = '1000';
  tooltip.style.maxWidth = '300px';
  tooltip.style.boxShadow = '0 2px 5px rgba(0,0,0,0.2)';
  tooltip.style.pointerEvents = 'none'; // So it doesn't block mouse events
  tooltip.style.display = 'none'; // Hide initially
  document.body.appendChild(tooltip);

  const taskRows = document.querySelectorAll('.task-row');

  taskRows.forEach(row => {
    let moveHandler = null;

    row.addEventListener('mouseenter', function (e) {
      this.classList.add('table-active');
      const taskId = this.getAttribute('data-id');

      fetch(`<?= base_url('task/getTaskDetail/') ?>${taskId}`)
        .then(response => response.json())
        .then(data => {
          if (data.error) {
            console.error(data.error);
            return;
          }

          tooltip.innerHTML = `<strong>${data.title}</strong><br>${data.description}`;
          tooltip.style.display = 'block';

          moveHandler = function (e) {
            tooltip.style.top = (e.pageY + 15) + 'px';
            tooltip.style.left = (e.pageX + 15) + 'px';
          };

          row.addEventListener('mousemove', moveHandler);
        })
        .catch(error => console.error('Error:', error));
    });

    row.addEventListener('mouseleave', function () {
      this.classList.remove('table-active');
      tooltip.style.display = 'none';
      tooltip.innerHTML = '';

      if (moveHandler) {
        row.removeEventListener('mousemove', moveHandler);
        moveHandler = null;
      }
    });
  });


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
</script>

<?= $this->endSection() ?>