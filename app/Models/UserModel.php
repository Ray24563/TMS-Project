<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'first_name', 'last_name', 'email', 'username', 'phone', 'status'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    
    // Validation rules
    protected $validationRules = [
        'id' => 'permit_empty|numeric',
        'first_name' => 'required|min_length[5]',
        'last_name' => 'required|min_length[4]',
        'email' => 'required|valid_email|is_unique[users.email,id,{id}]',
        'username' => 'required|min_length[4]|is_unique[users.username,id,{id}]',
        'phone' => 'required|regex_match[(\+63|09)[0-9]{9}]'
    ];
    
    protected $validationMessages = [
        'first_name' => [
            'required' => 'First name is required',
            'min_length' => 'First name must be at least 5 characters'
        ],
        'last_name' => [
            'required' => 'Last name is required',
            'min_length' => 'Last name must be at least 4 characters'
        ],
        'email' => [
            'required' => 'Email is required',
            'valid_email' => 'Please enter a valid email address',
            'is_unique' => 'This email is already registered'
        ],
        'username' => [
            'required' => 'Username is required',
            'min_length' => 'Username must be at least 4 characters',
            'is_unique' => 'This username is already taken'
        ],
        'phone' => [
            'required' => 'Phone number is required',
            'regex_match' => 'Please enter a valid phone number format (+63 or 09 followed by 9 digits)'
        ]
    ];

    // Count users by status
    public function countUsersByStatus($status) {
        return $this->where('status', $status)->countAllResults();
    }

    public function getValidationRules(array $options = []): array {
        return $this->validationRules;
    }
}