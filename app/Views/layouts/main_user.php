<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url("styles/custom.css") ?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title><?= $title ?? 'Default Title' ?></title>
</head>
<body>
<nav class="navbar navbar-expand-lg navi-color p-4 border-bottom">
  <div class="container">
     
      <button class="navbar-toggler pt-2 pb-2" style="background-color: #F5EFE7;" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
      </button>
      
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item me-3"><a class="nav-link fw-bold hov text-center mt-lg-0 mt-4" href="<?= base_url('layouts/home_user'); ?>">Dashboard</a></li>
          <li class="nav-item me-3"><a class="nav-link fw-bold hov text-center mt-lg-0 mt-3"  href="<?= base_url('layouts/task_view'); ?>">Tasks</a></li>
          <li class="nav-item me-3"><a class="nav-link fw-bold hov text-center mt-lg-0 mt-3"  href="<?= base_url('layouts/about_user'); ?>">About</a></li>
        </ul>
      </div>

      <div class="d-flex align-items-center">
        <div class="hover-log me-2 d-inline-block" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample">
          Admin <i class="fa fa-caret-square-o-right ms-2" aria-hidden="true"></i>
        </div>

        <div>
          <div id="collapseExample" class="collapse">
            <a class="text-decoration-none text-dark" href="<?= base_url('layouts/logout') ?>"><div class="custom-logout">
              Log Out <i class="fa fa-sign-out" aria-hidden="true"></i>
            </div></a>
          </div>
        </div>
      </div>

  </div>
</nav>

  <div>
    <?= $this->renderSection('user_content') ?>
  </div>

  <footer class="custom-footer text-white text-md-start text-center d-md-flex justify-content-center">
  <div>
    <p class="mb-1 footer-custom fw-bold">Contact Us</p>
    <p class="mb-1 footer-custom">Email: support@taskmanager.com</p>
    <p class="mb-1 footer-custom">Phone: +1 (800) 123-4567</p>
  </div>

  <div>
    <p class="mb-2 mt-3 footer-custom fw-bold">Connect With Us</p>
    <div>
    <i class="fa fa-facebook me-2 ms-4 footer-custom fs-5" aria-hidden="true"></i>
    <i class="fa fa-instagram me-2 footer-custom fs-5" aria-hidden="true"></i>
    <i class="fa fa-twitter me-2 footer-custom fs-5" aria-hidden="true"></i>
    </div>
  </div>
</footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</html>