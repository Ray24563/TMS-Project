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
    <h1 class="dash-color text-xxl-start text-center fw-bold mb-4">Add User</h1>

    <form class="needs-validation" action="<?= base_url('user/save') ?>" method="post" novalidate>
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
                <label for="name" class="form-label pasilyo fw-bold">First Name<span class="text-danger ms-2">*</span></label>
                <input type="text" id="first_name" name="first_name" class="form-control" required minlength="5">

                <div class="valid-feedback">Correct</div>
                <div class="invalid-feedback">Minimum of 5 letters</div>
            </div>
          </div>

          <div class="col-md-6 col-lg-6 mb-3">
            <div>
              <label for="name" class="form-label pasilyo fw-bold">Last Name<span class="text-danger ms-2">*</span></label>
              <input type="text" id="last_name" name="last_name" class="form-control" required minlength="4">

              <div class="valid-feedback">Correct</div>
              <div class="invalid-feedback">Minimum of 4 letters</div>
            </div>
          </div>

          <div class="col-md-6 col-lg-6 mb-3">
            <div>
              <label for="name" class="form-label pasilyo fw-bold">Email<span class="text-danger ms-2">*</span></label>
              <input type="email" id="email" name="email" class="form-control" required>

              <div class="valid-feedback">Correct</div>
              <div class="invalid-feedback">Please enter valid email.</div>
            </div>
          </div>
        </div>
      </div>

      <div class="container mt-5">
        <div class="row">

          <div class="col-md-6">
            <div>
              <label for="name" class="form-label pasilyo fw-bold">Username<span class="text-danger ms-2">*</span></label>
              <input type="text" id="username" name="username" class="form-control" required minlength="4">

              <div class="valid-feedback">Correct</div>
              <div class="invalid-feedback">Minimum of 4 letters</div>
            </div>
          </div>

          <div class="col-md-6">
            <div>
              <label for="name" class="form-label pasilyo fw-bold">Phone Number<span class="text-danger ms-2">*</span></label>
              <input type="number" id="phone" name="phone" class="form-control" pattern="(\+63|09)[0-9]{9}" required>

              <div class="valid-feedback">Correct</div>
              <div class="invalid-feedback">Please input valid phone number.</div>
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