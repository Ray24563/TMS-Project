<?= $this->extend('layouts/main_user') ?>

<?php $this->section('user_content') ?>

<section class="about-sec">
  <h1 class="masisisi-mo-ba text-center">What is Task Management?</h1>
  
  <div class="container">
     <div class="d-flex justify-content-center gap-5 flex-lg-row flex-column">

      <div class="custom-background-2">
        <div class="text-center">
          <img class="w-50 mb-4" src="<?= base_url('images/organize.png') ?>">
        </div>
        <h2 class="text-center edit-it total-custom-3 fw-semibold">Way to Oraganized & Control Tasks</h2>
        <hr class="dahan-dahan">
        <p class="text-center qc-2">Task management helps you structure your day by keeping your responsibilities visible, organized, and easy to track.</p>
      </div>

      <div class="custom-background-2">
        <div class="text-center">
          <img class="w-50 mb-4" src="<?= base_url('images/academic.png') ?>">
        </div>
        <h1 class="text-center edit-it total-custom-3 fw-semibold">Developed for Academic Purposes</h1>
        <hr class="dahan-dahan">
        <p class="text-center qc-2">This system was created as part of an academic project to showcase practical concepts like productivity tools and Role-Based Access Control (RBAC) in action.</p>
      </div>

      <div class="custom-background-2">
        <div class="text-center">
          <img class="w-50 mb-4" src="<?= base_url('images/friendly.png') ?>">
        </div>
        <h1 class="text-center edit-it total-custom-3 fw-semibold">A Simple, User-Friendly System</h1>
        <hr class="dahan-dahan">
        <p class="text-center qc-2">Built with usability in mind, this platform offers a clean interface and essential features to help manage tasks without complexity.</p>
      </div>

    </div>
  </div>
</section>

<section class="ibaba-mo-na">
  <h1 class="text-center meet-the-olmedos mb-3">Meet the Developers</h1>
  <hr class="meet-the-line mb-5">

  <div class="container d-flex justify-content-center align-items-md-center flex-xl-wrap flex-column flex-xl-row gap-5">

    <div class="member-container">
      <img class="profile-width d-inline-block me-3" src="<?= base_url('images/mae.png') ?>">
      <div class="d-inline-block">
        <p class="acm">Martinez, Joanna Mae N.</p>
        <p class="acm-2">UI/UX Designer & Tester</p>
      </div>
      <p class="mem-desc">I design interfaces that are simple, clean, and easy to use—and I make sure everything functions just the way it should. From layout to final testing, I focus on creating smooth, user-centered experiences.</p>
    </div>

     <div class="member-container">
      <img class="profile-width d-inline-block me-3" src="<?= base_url('images/andreiy.png') ?>">
      <div class="d-inline-block">
        <p class="acm">Enriquez, Andreiy C.</p>
        <p class="acm-2">Project Documentation & Tester</p>
      </div>
      <p class="mem-desc">I focus on organizing and documenting every part of the project to keep everything clear and well-structured. I also handle testing to make sure everything works as expected, helping the team to deliver quality results.</p>
    </div>

     <div class="member-container">
      <img class="profile-width d-inline-block me-3" src="<?= base_url('images/mark.png') ?>">
      <div class="d-inline-block">
        <p class="acm">Olmedo, Mark Nathan B.</p>
        <p class="acm-2">Backend & Database Developer</p>
      </div>
      <p class="mem-desc">I work behind the scenes to make sure the system runs smoothly—from building reliable backend logic to managing the database structure. I focus on creating secure, efficient processes that keep everything connected and performing well.</p>
    </div>

     <div class="member-container">
      <img class="profile-width d-inline-block me-3" src="<?= base_url('images/raymond.png') ?>">
      <div class="d-inline-block">
        <p class="acm">Palatino, Raymond Charles P.</p>
        <p class="acm-2">Frontend Developer</p>
      </div>
      <p class="mem-desc">I turn ideas and designs into interactive, responsive interfaces. My focus is on making the user experience smooth and engaging, ensuring everything looks great and works seamlessly across all devices.</p>
    </div>

     <div class="member-container">
      <img class="profile-width d-inline-block me-3" src="<?= base_url('images/kurt.png') ?>">
      <div class="d-inline-block">
        <p class="acm">Zamora, Kurt Armon C.</p>
        <p class="acm-2">Project Documentation & Tester</p>
      </div>
      <p class="mem-desc">I handle the documentation that keeps our project organized and easy to follow. Alongside that, I test features to make sure everything works properly and meets the team’s standards before it goes live.</p>
    </div>

  </div>
</section>

<section class="pagsamo">
  <div class="container">
      <h1 class="frequently-asked text-center mb-4">Frequently Asked Question</h1>
      <hr class="meet-the-line mb-4">
      <p class="text-center sinabi-niya-ba-talaga-yan mb-5">Got questions? We’ve got answers.</p>

      <div class="d-flex justify-content-center align-items-center gap-5 mb-5">
        <div class="faq-number">01</div>
        <div class="w-75 sinabi-niya-talaga">
          <h3 class="question">Who can use this Task Management System?</h3>
          <p class="answer">This Task Management System is accessible to everyone, as it is designed solely for academic purposes. It serves as a learning tool for us to explore CodeIgniter 4 and its various features, including demonstrating Role-Based Access Control (RBAC). It is not intended for commercial or production use, but rather to help developers to understand and practice key concepts in web development with CodeIgniter.</p>
        </div>
      </div>

      <div class="d-flex justify-content-center align-items-center mb-5 gap-5">
        <div class="faq-number">02</div>
        <div class="w-75 sinabi-niya-talaga">
          <h3 class="question">What features does the system offer?</h3>
          <p class="answer">The system mainly supports CRUD operations—meaning you can create, read, update, and delete tasks and users. However, as a regular user, your access is limited to viewing tasks assigned for specific user. Task creation and management are reserved for roles with higher permissions.</p>
        </div>
      </div>

      <div class="d-flex justify-content-center align-items-center gap-5 mb-5">
        <div class="faq-number">03</div>
        <div class="w-75 sinabi-niya-talaga">
          <h3 class="question">How do I know which tasks are assigned to me?</h3>
          <p class="answer">You can view your assigned tasks in the Task View section. The Dashboard gives you a quick summary of tasks and users, while the Task View provides detailed information about your specific assignments.</p>
        </div>
      </div>

      <div class="d-flex justify-content-center align-items-center gap-5 mb-5">
        <div class="faq-number">04</div>
        <div class="w-75 sinabi-niya-talaga">
          <h3 class="question">If I register, will I automatically appear in the user list for task assignment?</h3>
          <p class="answer">No, registration alone doesn’t add you to the official user list for task assignments. An admin will manually add your credentials and assign tasks accordingly. This functionality, along with enhanced automation and security features, is planned for future updates.</p>
        </div>
      </div>


  </div>
</section>

<?= $this->endSection() ?>