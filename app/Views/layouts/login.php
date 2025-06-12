<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url("styles/custom.css") ?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title><?= isset($title) ? $title : 'Login' ?></title>
</head>
<body>

<div class="d-flex justify-content-center align-items-center vh-100 flex-column">
  <h1 class="mb-5 task fw-bold">TASK MANAGEMENT</h1>
  
  <div class="background rounded-4">

    <div class="position-relative mb-4">
      <img class="logo d-inline" src="<?= base_url("images/logo.png") ?>">
      <h1 class="d-inline text-center text-white align-middle">LOGIN</h1>
    </div>

    <?php if (session()->getFlashdata('success')): ?>
      <div class="alert alert-success text-center rounded-3">
          <?= session()->getFlashdata('success') ?>
      </div>
    <?php endif; ?>

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
        <button class="mt-4 rounded-3 custom-color text-white pt-2 pb-2 ps-5 pe-5" type="submit">SIGN IN</button>
      </div>
    </form>

  </div>
  <p class="fw-semibold adjust-margin">Need an account? <a href=<?= base_url('layouts/user_registration'); ?> class="link-to-register">Get Started Now</a></p>
</div>
  
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
  document.addEventListener("DOMContentLoaded", function() {
    const togglePassword = document.querySelector('.toggle-password');
    const passwordInput = document.querySelector('#password');

    togglePassword.addEventListener('click', function () {
      const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
      passwordInput.setAttribute('type', type);

      // Toggle the icon
      this.classList.toggle('fa-eye');
      this.classList.toggle('fa-eye-slash');
    });
  });
</script>
</html>