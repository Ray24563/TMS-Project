<?= $this->extend('layouts/main') ?>

<?php $this->section('content') ?>

<section class="container mb-5 mt-5 d-lg-flex justify-content-center gap-5 align-items-start">

    <!-- Aside Container -->
    <div class="container custom-bg p-0 pt-5 pb-5 rounded-3">
      <div class="d-flex justify-content-center align-items-center gap-4">
        <div>
          <img class="" style="max-width: 150px;" src="<?= base_url("images/user.png") ?>">
        </div>

        <div>
          <h1 class="" style="color: #D8C4B6">Welcome!</h1>
        </div>
      </div>

      <hr class="border border-white">

      <div type="button" data-bs-toggle="collapse" data-bs-target="#collapseUser">
        <div class="d-flex justify-content-between custom-h3 pt-3 pb-2 ps-5 pe-5 mt-5">
          <h3 class="fs-4">Users</h3>
          <div><i class="fa fa-caret-square-o-down fs-4 mt-1" aria-hidden="true"></i></div>
        </div>
      </div>

      <div id="collapseUser" class="collapse">
        <div class="container custom-ulit ps-5 pe-5 mt-3 fw-bold">
          <a class="custom-a" href="<?= base_url('layouts/add_user') ?>">
            <p class="mb-2 user-hover rounded-2"><i class="fa fa-plus me-3" aria-hidden="true"></i>Add Users</p>
          </a>

          <a class="custom-a" href="<?= base_url('layouts/manage_user') ?>">
            <p class="user-hover rounded-2"><i class="fa fa-list-alt me-2" aria-hidden="true"></i>
          Manage Users</p>
          </a>

        </div>
      </div> 
      
      <div type="button" data-bs-toggle="collapse" data-bs-target="#collapseTasks">
        <div class="d-flex justify-content-between custom-h3 pt-3 pb-2 ps-5 pe-5 mt-4">
          <h3 class="fs-4">Tasks</h3>
          <div><i class="fa fa-caret-square-o-down fs-4 mt-1" aria-hidden="true"></i></div>
        </div>
      </div>

      <div id="collapseTasks" class="collapse">
        <div class="container custom-ulit ps-5 pe-5 mt-3 fw-bold">
          <a class="custom-a" href="<?= base_url('layouts/add_task') ?>">
            <p class="mb-2 user-hover rounded-2"><i class="fa fa-plus me-3" aria-hidden="true"></i>Add Tasks</p>
          </a>

          <a class="custom-a" href="<?= base_url('layouts/manage_task') ?>">
            <p class="user-hover rounded-2"><i class="fa fa-list-alt me-2" aria-hidden="true"></i>
          Manage Tasks</p>
          </a>
        </div>
      </div>  

    </div>
    <!-- Aside Container -->

      <!-- Display dynamic content in the table -->
<div class="container custom-bg-2 rounded-3 p-5 mt-4">
  <h1 class="dash-color text-xxl-start text-center fw-bold mb-4">User List</h1>
  <p class="alot fw-medium fs-5">Total User: <?= $totalUsers ?? 0 ?></p>
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
    <table class="w-100 text-center table-back mt-4">
      <tr class="goat-curry">
        <th class="p-3">#</th>
        <th class="p-3">Username</th>
        <th class="p-3">Name</th>
        <th class="p-3">Email</th>
        <th class="p-3">Contact Number</th>
        <th class="p-3">Status</th>
        <th class="p-3">Action</th>
      </tr>
      
      <?php if(!empty($users)): ?>
        <?php $i = 1; foreach($users as $user): ?>
          <tr class="talo-memphis" id="user-row-<?= $user['id'] ?>">
            <td class="p-3"><?= $i++ ?></td>
            <td class="p-3"><?= $user['username'] ?></td>
            <td class="p-3"><?= $user['first_name'] . ' ' . $user['last_name'] ?></td>
            <td class="p-3"><?= $user['email'] ?></td>
            <td class="p-3"><?= $user['phone'] ?></td>
            <td class="p-3"><?= $user['status'] ?></td>
            <td class="p-3">
              <i class="fa fa-pencil me-3 opaci edit-user-btn" aria-hidden="true" data-id="<?= $user['id'] ?>" style="cursor: pointer;"></i>
              <a href="<?= base_url('user/delete/' . $user['id']) ?>" onclick="return confirm('Are you sure you want to delete this user?');">
                <i class="fa fa-trash opaci" aria-hidden="true"></i>
              </a>
            </td>
          </tr>
        <?php endforeach; ?>
      <?php else: ?>
        <tr>
          <td colspan="7" class="p-3" style="color: #D8C4B6">No users found</td>
        </tr>
      <?php endif; ?>
    </table>
  </div>
</div>

<div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="<?= base_url('user/update') ?>" method="post">
        <?= csrf_field() ?>
        <div class="modal-body">
          <input type="hidden" name="id" id="edit-user-id">
          <div class="mb-3">
            <label for="edit-username" class="form-label">Username</label>
            <input type="text" class="form-control <?= session('errors.username') ? 'is-invalid' : '' ?>" 
                  id="edit-username" name="username" required minlength="4">
            <div class="invalid-feedback">
              <?= session('errors.username') ?? 'Please provide a valid username (at least 4 characters).' ?>
            </div>
          </div>
          <div class="mb-3">
            <label for="edit-first-name" class="form-label">First Name</label>
            <input type="text" class="form-control" id="edit-first-name" name="first_name" required minlength="5">
          </div>
          <div class="mb-3">
            <label for="edit-last-name" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="edit-last-name" name="last_name" required minlength="4">
          </div>
          <div class="mb-3">
            <label for="edit-email" class="form-label">Email</label>
            <input type="email" class="form-control" id="edit-email" name="email" required>
          </div>
          <div class="mb-3">
            <label for="edit-phone" class="form-label">Phone Number</label>
            <input type="number" class="form-control" id="edit-phone" name="phone" required>
            <small class="form-text text-muted">Format: +639123456789 or 09123456789</small>
          </div>
          <div class="mb-3">
            <label for="edit-status" class="form-label">Status</label>
            <select class="form-select" id="edit-status" name="status" required>
              <option value="Active">Active</option>
              <option value="Inactive">Inactive</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
  // Click event for edit button
  const editButtons = document.querySelectorAll('.edit-user-btn');
  if (editButtons) {
    editButtons.forEach(button => {
      button.addEventListener('click', function() {
        const userId = this.getAttribute('data-id');
        
        // Fetch user data via AJAX
        fetch(`<?= base_url('user/edit/') ?>${userId}`)
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
            
            // Fill the form with user data
            document.getElementById('edit-user-id').value = data.user.id;
            document.getElementById('edit-username').value = data.user.username;
            document.getElementById('edit-first-name').value = data.user.first_name;
            document.getElementById('edit-last-name').value = data.user.last_name;
            document.getElementById('edit-email').value = data.user.email;
            document.getElementById('edit-phone').value = data.user.phone;
            document.getElementById('edit-status').value = data.user.status;
            
            // Show the modal
            const editModal = new bootstrap.Modal(document.getElementById('editUserModal'));
            editModal.show();
          })
          .catch(error => {
            console.error('Error fetching user data:', error);
            alert('Could not load user data. Please try again.');
          });
      });
    });
  }

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

</section>

<?= $this->endSection() ?>
