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

  <div class="container custom-bg-2 rounded-3 p-5 mt-4">
    <h2 class="dash-color text-xxl-start text-center fw-bold">Summary</h2>
    <div class="container mt-4">
      <div class="row gap-xxl-0 gap-3">
      <div class="col-lg-12 col-xxl-4">
        <div class="total-circle rounded-4 d-flex justify-content-center p-4">
          <div>
            <p class="text-center total-custom">Total Users</p>
            <button class="number-background"><?= $totalUsers ?? 0 ?></button>
          </div>
        </div>
      </div>
      <div class="col-lg-12 col-xxl-4">
        <div class="total-circle rounded-4 d-flex justify-content-center p-4">
          <div>
            <p class="text-center total-custom">Total Tasks</p>
            <button class="number-background"><?= $totalTasks ?? 0 ?></button>
          </div>
        </div>
      </div>
      <div class="col-lg-12 col-xxl-4">
        <div class="total-circle rounded-4 d-flex justify-content-center p-4">
          <div>
            <p class="text-center total-custom">Active Users</p>
            <button class="number-background"><?= $activeUsers ?? 0 ?></button>
          </div>
        </div>
      </div>
      </div>
    </div>
    <!-- Start of Summary Section -->
    <h2 class="dash-color text-xxl-start text-center fw-bold mt-5">Tasks Status</h2>
    <div class="container mt-4">
      <div class="row gap-xxl-0 gap-3">
      <div class="col-lg-12 col-xxl-4">
        <div class="total-circle rounded-4 d-flex justify-content-center p-4">
          <div>
            <p class="text-center total-custom">To-Do</p>
            <button class="number-background"><?= $todoTasks ?? 0 ?></button>
          </div>
        </div>
      </div>
      <div class="col-lg-12 col-xxl-4">
        <div class="total-circle rounded-4 d-flex justify-content-center p-4">
          <div>
            <p class="text-center total-custom">In Progress</p>
            <button class="number-background" style="background-color: #FFC785"><?= $inProgressTasks ?? 0 ?></button>
          </div>
        </div>
      </div>
      <div class="col-lg-12 col-xxl-4">
        <div class="total-circle rounded-4 d-flex justify-content-center p-4">
          <div>
            <p class="text-center total-custom">Completed</p>
            <button class="number-background" style="background-color: #B3D8A8"><?= $completedTasks ?? 0 ?></button>
          </div>
        </div>
      </div>
      </div>
    </div>
  </div>

</section>

<?= $this->endSection() ?>
