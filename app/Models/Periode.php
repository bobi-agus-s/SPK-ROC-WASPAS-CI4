<?php

namespace App\Models;

use CodeIgniter\Model;

class Periode extends Model
{
    protected $table            = 'periode';
    protected $primaryKey       = 'id_periode';
    protected $returnType       = 'object';
    protected $allowedFields    = ['periode'];

    protected $validationRules = [
        'periode'  => 'required'
    ];

    protected $validationMessages = [
        'periode'  => [
            'required'  => 'kolom tidak boleh kosong'
        ]
    ];
}
