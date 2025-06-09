<?= $this->extend('layouts/main') ?>

<?php $this->section('content') ?>




<section class="hindi">
  <div class="hindi-ko-kayang-umibig-muli p-5 text-center mt-5">
    <h1 class="mb-4 fw-bold hihintayin">About Us</h1>
    <p class="custom-size mb-5 fw-medium">Welcome to our Task Management System, a simple and efficient solution designed to help individuals stay organized, focused, and productive. Our platform provides a seamless way to create, track, and manage tasks, making it easier to stay on top of your daily responsibilities. Whether you're a student juggling assignments, a professional handling multiple projects, or simply someone looking to organize daily activities, our system is designed to support your needs.
    </p>

    <p class="custom-size fw-medium">With user-friendly features, you can easily set deadlines, prioritize important tasks, and receive timely reminders to ensure nothing gets overlooked. By streamlining your workflow and improving task visibility, our platform helps you manage your time efficiently and stay on track with your goals. Let our Task Management System be your go-to tool for staying organized and achieving success.
    </p>
  </div>
</section>


<section class="custom-margin">
  <div class="hindi-ko-kayang-umibig-muli p-5">
    <h1 class="text-center fw-bold hihintayin mb-5">Meet the Team</h1>

    <div class="container">
      <div class="row justify-content-center gap-3">

        <div class="col-12 col-sm-6 col-md-4 col-xxl-2">
          <div>
            <img class="img-fluid border-ray" src="<?= base_url("images/mae.png") ?>" alt="Martinez, Joanna Mae N.">
            <p class="text-center mb-0 mt-3 fw-bold mem-name">Martinez, Joanna Mae N.</p>
            <p class="text-center mem-role mt-1">UI/UX Designer & Tester</p>
          </div>
        </div>

        <div class="col-12 col-sm-6 col-md-4 col-xxl-2">
          <div>
            <img class="img-fluid border-ray" src="<?= base_url("images/andreiy.png") ?>" alt="Enriquez, Andreiy C.">
            <p class="text-center mb-0 mt-3 fw-bold mem-name">Enriquez, Andreiy C.</p>
            <p class="text-center mem-role mt-1">Project Documentation & Tester</p>
          </div>
        </div>

        <div class="col-12 col-sm-6 col-md-4 col-xxl-2">
          <div>
            <img class="img-fluid border-ray" src="<?= base_url("images/mark.png") ?>" alt="Olmedo, Mark Nathan B.">
            <p class="text-center mb-0 mt-3 fw-bold mem-name">Olmedo, Mark Nathan B.</p>
            <p class="text-center mem-role mt-1">Database & Backend Developer</p>
          </div>
        </div>

        <div class="col-12 col-sm-6 col-md-4 col-xxl-2">
          <div>
            <img class="img-fluid border-ray" src="<?= base_url("images/raymond.png") ?>" alt="Palatino, Raymond Charles P.">
            <p class="text-center mb-0 mt-3 fw-bold mem-name">Palatino, Raymond P.</p>
            <p class="text-center mem-role mt-1">Frontend Developer</p>
          </div>
        </div>

        <div class="col-12 col-sm-6 col-md-4 col-xxl-2">
          <div>
            <img class="img-fluid border-ray" src="<?= base_url("images/kurt.png") ?>" alt="Martinez, Joanna Mae N.">
            <p class="text-center mb-0 mt-3 fw-bold mem-name">Zamora, Kurt Armon C.</p>
            <p class="text-center mem-role mt-1">Project Documentation & Tester</p>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>

<?= $this->endSection() ?>