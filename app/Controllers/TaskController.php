<?php

namespace App\Controllers;

use App\Models\TaskModel;
use App\Models\UserModel;
use CodeIgniter\Controller;

class TaskController extends Controller
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
        $data['users'] = $this->userModel->where('status', 'Active')->findAll();
        return view('layouts/manage_task', $data);
    }
    
    
    public function add() {
        $data['title'] = 'Add Task';
        $data['users'] = $this->userModel->where('status', 'Active')->findAll();
        return view('layouts/add_task', $data);
    }
    
    public function save()
{
    $isValid = $this->validate($this->taskModel->getValidationRules());

    if (!$isValid) {
        return redirect()->back()
            ->withInput()
            ->with('errors', \Config\Services::validation()->getErrors());
    }

    // Prepare data to save
    $data = [
        'title'       => $this->request->getPost('title'),
        'description' => $this->request->getPost('description'),
        'user_id'     => (int) $this->request->getPost('user_id'),
        'due_date'    => $this->request->getPost('due_date'),
        'status'      => 'To-Do' // Default status
    ];

    // Save the task
    try {
        $this->taskModel->save($data);
        return redirect()->to(base_url('layouts/manage_task'))
            ->with('success', 'Task added successfully');
    } catch (\Exception $e) {
        return redirect()->back()
            ->withInput()
            ->with('error', 'Failed to add task: ' . $e->getMessage());
    }
}

    public function edit($id = null) {
        $task = $this->taskModel->find($id);
        
        if (!$task) {
            return $this->response->setJSON(['error' => 'Task not found']);
        }
        
        return $this->response->setJSON(['task' => $task]);
    }

    public function update() {
        $id = $this->request->getPost('id');
        
        $isValid = $this->validate([
            'title' => 'required|min_length[5]',
            'description' => 'required|min_length[5]',
            'user_id' => 'required|integer|is_not_unique[users.id]',
            'due_date' => 'required|valid_date',
            'status' => 'required|in_list[To-Do,In Progress,Completed]'
        ]);
        
        if (!$isValid) {
            return redirect()->back()
                ->withInput()
                ->with('errors', \Config\Services::validation()->getErrors());
        }
        
        $data = [
            'id' => $id,
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'user_id' => $this->request->getPost('user_id'), 
            'status' => $this->request->getPost('status'),
            'due_date' => $this->request->getPost('due_date')
        ];
        
        try {
            $this->taskModel->save($data);
            return redirect()->to(base_url('layouts/manage_task'))->with('success', 'Task updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Failed to update task: ' . $e->getMessage());
        }
    }
    
    
    public function delete($id = null) {
        $this->taskModel->delete($id);
        return redirect()->to(base_url('layouts/manage_task'))->with('success', 'Task deleted successfully');
    }
    
    public function getTaskDetail($id = null) {
        $task = $this->taskModel->getTaskDetail($id);
        if (!$task) {
            return $this->response->setJSON(['error' => 'Task not found']);
        }
        return $this->response->setJSON($task);
    }
}

