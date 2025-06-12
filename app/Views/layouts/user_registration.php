<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url("styles/custom.css") ?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title><?= isset($title) ? $title : 'Default Title' ?></title>
</head>
<body>

<div class="d-flex justify-content-center align-items-center flex-lg-row flex-column vh-100 chasing-a-ghost">

  <div class="adjust-width">
    <h1 class="mb-4 task fw-bold">Register to Task Management</h1>
    <p class="register-desc">This Task Management system is developed for academic purposes to demonstrate how Role-Based Access Control (RBAC) works in a real-world application. By signing in, you'll gain access to a personalized dashboard where you can view and manage tasks assigned. Whether you're an admin or team member, the system ensures secure and organized access based on your responsibilities. Please register or sign in to explore the features and experience efficient task management firsthand.</p>
  </div>
  
  <div>
    <div class="background rounded-4">

      <div class="position-relative mb-4">
        <img class="logo d-sm-inline d-none" src="<?= base_url("images/logo.png") ?>">
        <h1 class="d-inline text-center text-white align-middle">REGISTER</h1>
      </div>

      <?php if(session()->getFlashdata('error')): ?>
        <div class="alert alert-danger text-center rounded-3">
          <?= session()->getFlashdata('error') ?>
        </div>
      <?php endif; ?>

      <form action="<?= base_url('layouts/loginCheck') ?>" method="post" novalidate>
        <input class="form-control mb-4 pt-2 pb-2 pe-5" name="username" type="text" placeholder="Username" required>
        <div class="position-relative mb-4">
          <input id="password" class="form-control pt-2 pb-2 pe-5" name="password" type="password" placeholder="Password" required>
          <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password" style="position: absolute; top: 50%; right: 15px; transform: translateY(-50%); cursor: pointer;"></span>
        </div>


        <div class="d-flex justify-content-center">
          <button class="mt-4 rounded-3 custom-color text-white button-padding" type="submit">REGISTER</button>
        </div>
      </form>
    </div>
    <p class="fw-semibold text-center adjust-margin">Already have an account? <a href="<?= base_url('layouts/login'); ?>" class="link-to-register">Sign In</a></p>
  </div>
</div>
  
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</html>