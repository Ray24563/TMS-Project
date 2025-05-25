<?= $this->extend('layouts/main') ?>

<?php $this->section('content') ?>

<section class="container mb-5 mt-5 d-lg-flex justify-content-center gap-5 align-items-start">

  <!-- Aside Container -->
  <div class="container custom-bg p-0 pt-5 pb-5 rounded-3">
    <div class="d-flex justify-content-center align-items-center gap-4">
      <div>
        <img style="max-width: 150px;" src="<?= base_url("images/user.png") ?>">
      </div>

      <div>
        <h1 style="color: #D8C4B6">Welcome!</h1>
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

  <div class="container custom-bg-2 rounded-3 p-5 mt-5">
    <h1 class="dash-color text-xxl-start text-center fw-bold mb-4">Add Task</h1>

    <form class="needs-validation" action="<?= base_url('task/save') ?>" method="post" novalidate>
      <?= csrf_field() ?>
      <?php if(session()->has('errors')): ?>
        <div class="alert alert-danger">
          <?php foreach(session('errors') as $error): ?>
            <p><?= $error ?></p>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>

      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-6 mb-3">
            <div>
              <label for="user_id" class="form-label pasilyo fw-bold d-block">Assigned To:<span class="text-danger ms-2">*</span></label>
              <select class="d-block muli form-control" id="user_id" name="user_id" required>
                <option value="">Select User</option>
                <?php if(!empty($users)): ?>
                  <?php foreach($users as $user): ?>
                    <option value="<?= $user['id'] ?>"><?= $user['username'] ?></option>
                  <?php endforeach; ?>
                <?php endif; ?>
              </select>
              <div class="invalid-feedback">Please Choose an Employee</div>
            </div>
          </div>

          <div class="col-md-6 col-lg-6 mb-3">
            <div>
              <label for="due_date" class="form-label pasilyo fw-bold">Due Date<span class="text-danger ms-2">*</span></label>
              <input type="date" id="due_date" name="due_date" class="form-control" required>

              <div class="invalid-feedback">Please choose a due date.</div>
            </div>
          </div>

          <div class="col-md-6 col-lg-6 mb-3">
            <div>
              <label for="title" class="form-label pasilyo fw-bold">Title<span class="text-danger ms-2">*</span></label>
              <input type="text" id="title" name="title" class="form-control" required minlength="5">

              <div class="invalid-feedback">Please enter a title for the task.</div>
            </div>
          </div>

          <div class="col-md-6">
            <div>
              <label for="desc" class="form-label pasilyo fw-bold">Description<span class="text-danger ms-2">*</span></label>
              <input type="text" id="description" name="description" class="form-control" required minlength="5">

              <div class="invalid-feedback">Minimum of 5 letters.</div>
            </div>
          </div>

        </div>
      </div>

          
      <div class="d-flex justify-content-md-end justify-content-center">
        <button class="mt-5 ikaw-at-ikaw p-2 ps-4 pe-4 text-white rounded-2">Done</button>
      </div>

    </form>
  </div>
</section>

<script src="<?= base_url('script/script.js') ?>"></script>

<?= $this->endSection() ?>