<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class UserController extends Controller
{
    protected $userModel;
    
    public function __construct() {
        $this->userModel = new UserModel();
    }
    
    public function index() {
        $data['title'] = 'Manage User';
        $data['users'] = $this->userModel->findAll();
        $data['totalUsers'] = count($data['users']);
        return view('layouts/manage_user', $data);
    }
    
    
    public function add() {
        return view('layouts/add_user', ['title' => 'Add User']);
    }
    
    public function save() {
        // Validation
        $isValid = $this->validate($this->userModel->getValidationRules());
        
        if (!$isValid) {
            return redirect()->back()
                ->withInput()
                ->with('errors', \Config\Services::validation()->getErrors());
        }
        
        // Prepare Data
        $data = [
            'first_name' => $this->request->getPost('first_name'),
            'last_name' => $this->request->getPost('last_name'),
            'email' => $this->request->getPost('email'),
            'username' => $this->request->getPost('username'),
            'phone' => $this->request->getPost('phone'),
            'status' => 'Active'
        ];
        
        // Save the user
        try {
            $this->userModel->save($data);
            return redirect()->to(base_url('layouts/manage_user'))
                ->with('success', 'User added successfully');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Failed to add user: ' . $e->getMessage());
        }
    }

    public function edit($id = null) {
        $user = $this->userModel->find($id);
        
        if (!$user) {
            return $this->response->setJSON(['error' => 'User not found']);
        }
        
        return $this->response->setJSON(['user' => $user]);
    }
    
    public function update() {
        $id = $this->request->getPost('id');
        
        $isValid = $this->validate([
            'username' => 'required|min_length[4]',
            'first_name' => 'required|min_length[5]',
            'last_name' => 'required|min_length[4]',
            'email' => 'required|valid_email',
            'phone' => 'required|regex_match[/(\+63|09)[0-9]{9}/]',
            'status' => 'required|in_list[Active,Inactive]'
        ]);
        
        if (!$isValid) {
            return redirect()->back()
                ->withInput()
                ->with('errors', \Config\Services::validation()->getErrors());
        }
        
        $data = [
            'id' => $id,
            'username' => $this->request->getPost('username'),
            'first_name' => $this->request->getPost('first_name'),
            'last_name' => $this->request->getPost('last_name'),
            'email' => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone'),
            'status' => $this->request->getPost('status')
        ];
        
        try {
            $this->userModel->save($data);
            return redirect()->to(base_url('layouts/manage_user'))->with('success', 'User updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Failed to update user: ' . $e->getMessage());
        }
    }
    
    public function delete($id = null) {
        $this->userModel->delete($id);
        return redirect()->to(base_url('layouts/manage_user'))->with('success', 'User deleted successfully');
    }
    
    public function getUsers() {
        $users = $this->userModel->where('status', 'Active')->findAll();
        return $this->response->setJSON($users);
    }
}