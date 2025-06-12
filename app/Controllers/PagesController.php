<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\TaskModel;
use CodeIgniter\Controller;

class PagesController extends BaseController{
  public function login() {
    $this->response->setHeader('Cache-Control', 'no-store, no-cache, must-revalidate');
    $this->response->setHeader('Pragma', 'no-cache');
    $this->response->setHeader('Expires', '0');
    return view('layouts/index', ['title' => 'Login']);
  }

  // Login/Logout and Register functions
  public function loginCheck(){
    $username = $this->request->getPost('username');
    $password = $this->request->getPost('password');

    $valid_username = "tmsadmin";
    $valid_password = "livelovelebron";

    if ($username === $valid_username && $password === $valid_password) {
      session()->set('isLoggedIn', true);
      return redirect()->to(base_url('layouts/home'));
    } 
    else if ($username !== $valid_username && $password === $valid_password){
      return redirect()->back()->with('error', 'Invalid Username');
    }
    else if ($username === $valid_username && $password !== $valid_password){
      return redirect()->back()->with('error', 'Invalid Password');
    }
    else if ($username !== $valid_username && $password !== $valid_password){
      return redirect()->back()->with('error', 'Invalid Credentials');
    }
    return redirect()->back()->with('error', 'Fill out the Field');
  }

  public function logout() {
    session()->destroy();
    return redirect()->to(base_url('/'));
  }

  public function registration() {
    return view('layouts/user_registration', ['title' => 'Registration']);
  }

  // About Pages for Admin and User Panel
  public function about() {
    return view('layouts/about', ['title' => 'About']);
  }

  public function userAbout() {
    return view('layouts/about_user', ['title' => 'About']);
  }
}