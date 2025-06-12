<?php

namespace App\Models;

use CodeIgniter\Model;

class RegisteredUserModel extends Model{
    protected $table = 'registered_users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'password', 'profile_picture'];
    protected $useTimestamps = false;
}
