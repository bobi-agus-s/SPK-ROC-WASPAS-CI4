<?php

namespace App\Models;

use CodeIgniter\Model;

class Dusun extends Model
{
    protected $table            = 'dusun';
    protected $primaryKey       = 'id_dusun';
    protected $returnType       = 'object';
    protected $allowedFields    = ['nama_dusun'];

    protected $validationRules = [
        'nama_dusun'  => 'required'
    ];

    protected $validationMessages = [
        'nama_dusun'  => [
            'required'  => 'kolom tidak boleh kosong'
        ]
    ];
}
