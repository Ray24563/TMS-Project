<?php

namespace App\Controllers;

use App\Models\TaskModel;
use App\Models\UserModel;
use CodeIgniter\Controller;

class DashboardController extends Controller
{
    protected $taskModel;
    protected $userModel;
    
    public function __construct() {
        $this->taskModel = new TaskModel();
        $this->userModel = new UserModel();
    }
    
    public function index() {
        $data['title'] = 'Dashboard';
        $data['totalUsers'] = $this->userModel->countAll();
        $data['totalTasks'] = $this->taskModel->countAll();
        $data['activeUsers'] = $this->userModel->countUsersByStatus('Active');
        
        // Count tasks by status
        $data['todoTasks'] = $this->taskModel->countTasksByStatus('To-Do');
        $data['inProgressTasks'] = $this->taskModel->countTasksByStatus('In Progress');
        $data['completedTasks'] = $this->taskModel->countTasksByStatus('Completed');
        
        return view('layouts/home', $data);
    }
}