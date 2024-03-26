<?php

namespace App\Models;

use CodeIgniter\Model;

class Agama extends Model
{
    protected $table            = 'agama';
    protected $primaryKey       = 'id_agama';
    protected $returnType       = 'object';
    protected $allowedFields    = ['nama_agama'];

    protected $validationRules = [
        'nama_agama'  => 'required'
    ];

    protected $validationMessages = [
        'nama_agama'  => [
            'required'  => 'kolom tidak boleh kosong'
        ]
    ];
}
