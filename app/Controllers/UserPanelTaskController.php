<?php

namespace App\Controllers;

use App\Models\TaskModel;
use App\Models\UserModel;
use CodeIgniter\Controller;

class UserPanelTaskController extends Controller
{
    protected $taskModel;
    protected $userModel;
    
    public function __construct() {
        $this->taskModel = new TaskModel();
        $this->userModel = new UserModel();
    }
    
    public function index() {
        $data['title'] = 'Manage Task';
        $data['tasks'] = $this->taskModel->getTasksWithUsernames();
        $data['totalTasks'] = count($data['tasks']);
        return view('layouts/task_view', $data);
    }
    
    public function getTaskDetail($id = null) {
        $task = $this->taskModel->getTaskDetail($id);
        if (!$task) {
            return $this->response->setJSON(['error' => 'Task not found']);
        }
        return $this->response->setJSON($task);
    }
}

