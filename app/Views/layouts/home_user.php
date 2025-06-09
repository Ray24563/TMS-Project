<?= $this->extend('layouts/main_user') ?>

<?php $this->section('user_content') ?>

<section class="container marg-lang first-section">

  <div class="d-flex justify-content-center flex-lg-row flex-column align-items-center gap-5 mb-5">

    <div class="text-center">
      <label class="update-button" for="input-file"><img class="bor-img" src="<?= base_url('images/user.png'); ?>" id="profile-pic"></label>
      <input class="select-pic" type="file" accept="image/jpeg, image/png, image/jpg" id="input-file">
    </div>

    <div class="text-lg-start text-center">
      <h1 class="mb-4">Welcome, Name! </h1> <!-- Insert mo diyan yung user name ng nag register na user sa "name" -->
      <p class="user-desc">Take control of your tasks and stay organized with a personalized experience designed specifically for your role. Whether you’re reviewing tasks assigned to you or keeping track of your team’s progress, everything you need is right here to help you stay informed and organized.</p>
    </div>
  </div>
</section>

<section class="container marg-lang first-section">

  <div class="container">
    <h1 class="text-center edit-it-2 mb-5">Summary</h1>

    <div class="d-flex justify-content-center gap-5 flex-lg-row flex-column">

      <div class="custom-background">
        <div class="text-center">
          <button class="number-background mb-3"><?= $totalUsers ?? 0 ?></button>
        </div>
        <h1 class="text-center edit-it total-custom fw-semibold">Total Users</h1>
        <hr>
        <p class="text-center qc">A reflection of everyone currently part of the workspace — from team members managing daily assignments to admins overseeing task flow.</p>
      </div>

      <div class="custom-background">
        <div class="text-center">
          <button class="number-background mb-3"><?= $totalTasks ?? 0 ?></button>
        </div>
        <h1 class="text-center edit-it total-custom fw-semibold">Total Tasks</h1>
        <hr>
        <p class="text-center qc">Covers everything added so far — pending items, tasks in progress, and those already completed by users across the platform.</p>
      </div>

      <div class="custom-background">
        <div class="text-center">
          <button class="number-background mb-3"><?= $activeUsers ?? 0 ?></button>
        </div>
        <h1 class="text-center edit-it total-custom fw-semibold">Active Users</h1>
        <hr>
        <p class="text-center qc">Represents users who’ve been active recently — checking their tasks, making updates, or simply staying involved in the workflow.</p>
      </div>

    </div>
  </div>
</section>

<section class="container marg-lang first-section">

  <div class="d-flex justify-content-center align-items-center flex-column">

    <div class="d-flex justify-content-start gap-5 mb-5 adjust-width-2">
      <button class="number-background-2" style="background-color:rgb(79, 112, 155)"><?= $todoTasks ?? 0 ?></button>
      <div>
        <p class="total-custom-2">To-Do</p>
        <p class="task-desc">Tasks that have been identified and added to the list but haven’t been started yet.</p>
      </div>
    </div>

    <div class="d-flex justify-content-start gap-5 mb-5 adjust-width-2">
      <button class="number-background-2" style="background-color: #FFC785"><?= $inProgressTasks ?? 0 ?></button>
      <div>
        <p class="total-custom-2">In Progress</p>
        <p class="task-desc">Tasks currently underway, actively being worked on to make progress toward completion.</p>
      </div>
    </div>

    <div class="d-flex justify-content-start gap-5 adjust-width-2">
      <button class="number-background-2" style="background-color: #B3D8A8"><?= $completedTasks ?? 0 ?></button>
      <div>
        <p class="total-custom-2">Completed</p>
        <p class="task-desc">Tasks that have been fully finished and require no further action. These represent goals achieved and milestones reached in the workflow.</p>
      </div>
    </div>

  </div>

</section>

<?= $this->endSection() ?>
