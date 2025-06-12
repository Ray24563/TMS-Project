<?= $this->extend('layouts/main_user') ?>

<?php $this->section('user_content') ?>

<section class="container marg-lang first-section">

  <div class="d-flex justify-content-center flex-lg-row flex-column align-items-center gap-5 mb-5">
    <form id="profile-form" action="<?= base_url('upload-profile-picture') ?>" method="post" enctype="multipart/form-data">
      <div class="text-center fixed-width">
        <label class="update-button" for="input-file">
          <img class="bor-img profile-pic-fixed" src="<?= base_url('public/uploads/' . esc($user['profile_picture'] ?? 'user.png')) ?>" id="profile-pic">
        <input class="select-pic" type="file" accept="image/jpeg, image/png, image/jpg" id="input-file" name="profile_picture">
      </div>
    </form>

    <div class="text-lg-start text-center">
      <h1 class="mb-4">Welcome, <?= esc(session('username')) ?>!</h1>
      <p class="user-desc">Stay informed and organized with a personalized view tailored to your role. Whether you're monitoring assigned tasks or tracking team’s progress, everything you need is right here — all in one place, for viewing purposes only.</p>
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

<script>
// JavaScript to handle automatic form submission when file is selected
document.getElementById('input-file').addEventListener('change', function() {
    if (this.files && this.files[0]) {
        // Optional: Preview the image before upload
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('profile-pic').src = e.target.result;
        };
        reader.readAsDataURL(this.files[0]);
        
        // Submit the form
        document.getElementById('profile-form').submit();
    }
});
</script>

<?= $this->endSection() ?>
