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

  public function registration() {
    return view('layouts/user_registration', ['title' => 'Registration']);
  }

  public function userHome() {
    return view('layouts/home_user', ['title' => 'Home']);
  }

  public function userAbout() {
    return view('layouts/about_user', ['title' => 'About']);
  }

  public function userTaskView() {
    return view('layouts/task_view', ['title' => 'Tasks']);
  }

  public function home() {
    if (!session()->has('isLoggedIn')) {
      return redirect()->to(base_url('/'))->with('error', 'Please log in first.');
    }

    return view('layouts/home', ['title' => 'Homepage']);
  }

  public function add_user() {
    if (!session()->has('isLoggedIn')) {
      return redirect()->to(base_url('/'))->with('error', 'Please log in first.');
    }
    return view('layouts/add_user', ['title' => 'Add User']);
  }

  public function about() {
    if (!session()->has('isLoggedIn')) {
      return redirect()->to(base_url('/'))->with('error', 'Please log in first.');
    }
    return view('layouts/about', ['title' => 'About']);
  }

  public function add_task() {
    if (!session()->has('isLoggedIn')) {
      return redirect()->to(base_url('/'))->with('error', 'Please log in first.');
    }

    return view('layouts/add_task', ['title' => 'Add Task']);
  }

  public function manage_task() {
    if (!session()->has('isLoggedIn')) {
      return redirect()->to(base_url('/'))->with('error', 'Please log in first.');
    }

    return view('layouts/manage_task', ['title' => 'Manage Task']);
  }

  public function manage_user() {
    if (!session()->has('isLoggedIn')) {
      return redirect()->to(base_url('/'))->with('error', 'Please log in first.');
    }
    return view('layouts/manage_user', ['title' => 'Manage User']);
  }

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
}