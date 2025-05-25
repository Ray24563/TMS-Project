<?php

namespace App\Models;

use CodeIgniter\Model;

class TaskModel extends Model
{
    protected $table = 'tasks';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'description', 'user_id', 'status', 'due_date'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    
    // Validation rules
    protected $validationRules = [
        'title' => 'required|min_length[5]',
        'description' => 'required|min_length[5]',
        'user_id' => 'required|integer|is_not_unique[users.id]',
        'due_date' => 'required|valid_date'
    ];
    
    protected $validationMessages = [
        'title' => [
            'required' => 'Title is required',
            'min_length' => 'Title must be at least 5 characters'
        ],
        'description' => [
            'required' => 'Description is required',
            'min_length' => 'Description must be at least 5 characters'
        ],
        'user_id' => [
            'required' => 'User assignment is required',
            'integer' => 'Invalid user ID',
            'is_not_unique' => 'Selected user does not exist'
        ],
        'due_date' => [
            'required' => 'Due date is required',
            'valid_date' => 'Please enter a valid date'
        ]
    ];
    
    public function getTasksWithUsernames() {
        $builder = $this->builder();
        $builder->select('tasks.*, users.username');
        $builder->join('users', 'users.id = tasks.user_id');
        $builder->orderBy('tasks.id', 'ASC');
        return $builder->get()->getResultArray();
    }
    
    public function getTaskDetail($id) {
        $builder = $this->builder();
        $builder->select('tasks.*, users.username, users.first_name, users.last_name');
        $builder->join('users', 'users.id = tasks.user_id');
        $builder->where('tasks.id', $id);
        return $builder->get()->getRowArray();
    }
    
    public function countTasksByStatus($status) {
        return $this->where('status', $status)->countAllResults();
    }

    public function getValidationRules(array $options = []): array {
        return $this->validationRules;
    }
}