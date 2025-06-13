<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\TaskModel;
use App\Models\RegisteredUserModel;
use CodeIgniter\Controller;

class PagesController extends BaseController{

  // Login/Logout and Register functions
  public function login() {
    $this->response->setHeader('Cache-Control', 'no-store, no-cache, must-revalidate');
    $this->response->setHeader('Pragma', 'no-cache');
    $this->response->setHeader('Expires', '0');
    return view('layouts/login', ['title' => 'Login']);
  }

  public function loginCheck() {
      $username = $this->request->getPost('username');
      $password = $this->request->getPost('password');

      // Check Admin Credentials
      $valid_username = "tmsadmin";
      $valid_password = "livelovelebron";

      if ($username === $valid_username && $password === $valid_password) {
          session()->set('isLoggedIn', true);
          return redirect()->to(base_url('layouts/home'));
      }

      // Check if input is empty
      if (empty($username) || empty($password)) {
          return redirect()->back()->with('error', 'Please fill out all fields.');
      }

      // Check Registered Users
      $model = new \App\Models\RegisteredUserModel();
      $registeredUser = $model->where('username', $username)->first();

      if ($registeredUser && password_verify($password, $registeredUser['password'])) {
      
          session()->set([
              'user_id' => $registeredUser['id'],
              'username' => $registeredUser['username'],
              'isLoggedIn' => true
          ]);
          return redirect()->to(base_url('layouts/home_user'));
      }
      return redirect()->back()->with('error', 'Invalid credentials.');
  }

  public function registration() {
    return view('layouts/user_registration', ['title' => 'Registration']);
  }

  public function registerUser() {
      $username = $this->request->getPost('username');
      $password = $this->request->getPost('password');

      if (empty($username) || empty($password)) {
          return redirect()->back()->with('error', 'Please fill in all fields.');
      }

      $model = new RegisteredUserModel();

      // Check if the username already exists
      if ($model->where('username', $username)->first()) {
          return redirect()->back()->with('error', 'Username already taken.');
      }

      $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

      $model->save([
          'username' => $username,
          'password' => $hashedPassword,
          'profile_picture' => 'user.png',
      ]);

      return redirect()->to(base_url('/'))->with('success', 'Registration successful.');
  }

  public function logout() {
    session()->destroy();
    return redirect()->to(base_url('/'));
  }

  public function uploadProfilePicture() {
    $userId = session()->get('user_id');
    
    // Check if user is logged in
    if (!$userId) {
        return redirect()->to(base_url('/'))->with('error', 'Please log in first.');
    }
    
    $file = $this->request->getFile('profile_picture');
    
    // Validate file
    if (!$file || !$file->isValid()) {
        return redirect()->to(base_url('layouts/home_user'))->with('error', 'Please select a valid image file.');
    }
    
    // Check file size (limit to 2MB)
    if ($file->getSize() > 2048000) {
        return redirect()->to(base_url('layouts/home_user'))->with('error', 'File size too large. Maximum 2MB allowed.');
    }
    
    // Validate file type
    $allowedTypes = ['image/jpeg', 'image/jpg', 'image/png'];
    if (!in_array($file->getMimeType(), $allowedTypes)) {
        return redirect()->to(base_url('layouts/home_user'))->with('error', 'Only JPG, JPEG, and PNG files are allowed.');
    }
    
    try {
        // Generate unique filename
        $newName = $file->getRandomName();
        
        // Create upload directory if it doesn't exist
        $uploadPath = FCPATH . 'public/uploads/';
        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0755, true);
        }
        
        // Move file to upload directory
        if ($file->move($uploadPath, $newName)) {
            $model = new \App\Models\RegisteredUserModel();
            
            // Get current profile picture to delete old one
            $currentUser = $model->find($userId);
            $oldPicture = $currentUser['profile_picture'] ?? null;
            
            // Update database
            $model->update($userId, ['profile_picture' => $newName]);
            
            // Update session
            session()->set('profile_picture', $newName);
            
            // Delete old profile picture if it exists and is not the default
            if ($oldPicture && $oldPicture !== 'user.png' && file_exists($uploadPath . $oldPicture)) {
                unlink($uploadPath . $oldPicture);
            }
            
            return redirect()->to(base_url('layouts/home_user'))->with('success', 'Profile picture updated successfully.');

        } else {
            return redirect()->to(base_url('layouts/home_user'))->with('error', 'Failed to upload file.');
        }
    } catch (\Exception $e) {
        return redirect()->to(base_url('layouts/home_user'))->with('error', 'An error occurred while uploading the file.');
    }
  }

  public function homeUser() {
    $userId = session()->get('user_id');

    // Required Models
    $registeredUserModel = new \App\Models\RegisteredUserModel();
    $taskModel = new \App\Models\TaskModel();
    $userModel = new \App\Models\UserModel();
    
    // Get the current user data
    $user = $registeredUserModel->find($userId);
    
    // Combine all data that both functionalities need
    $data = [
        'title' => 'User Dashboard',
        'user' => $user, // For profile picture functionality
        
        // Dashboard stats, I marged them here since they use the same views
        'totalUsers' => $userModel->countAll(),
        'totalTasks' => $taskModel->countAll(),
        'activeUsers' => $userModel->countUsersByStatus('Active'),
        
        // Task counts by status
        'todoTasks' => $taskModel->countTasksByStatus('To-Do'),
        'inProgressTasks' => $taskModel->countTasksByStatus('In Progress'),
        'completedTasks' => $taskModel->countTasksByStatus('Completed')
    ];

    return view('layouts/home_user', $data);
  }

  // About Pages for Admin and User Panel
  public function about() {
    return view('layouts/about', ['title' => 'About']);
  }

  public function userAbout() {
    return view('layouts/about_user', ['title' => 'About']);
  }
}