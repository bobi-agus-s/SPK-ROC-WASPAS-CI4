<?php

namespace App\Models;

use CodeIgniter\Model;

class User extends Model
{
    protected $table            = 'user';
    protected $primaryKey       = 'id_user';
    protected $returnType       = 'object';
    protected $allowedFields    = ['nama_user', 'username', 'password', 'user_level'];

    protected $validationRules = [
        'nama_user'  => 'required',
        'username'  => 'required',
        'password'  => 'required',
    ];
    protected $validationMessages = [
        'nama_user' => [
            'required'  => 'kolom tidak boleh kosong',
        ],
        'username' => [
            'required'  => 'kolom tidak boleh kosong',
        ],
        'password' => [
            'required'  => 'kolom tidak boleh kosong',
        ],
    ];
}
