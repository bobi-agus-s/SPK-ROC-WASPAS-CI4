<?php

namespace App\Models;

use CodeIgniter\Model;

class Akses extends Model
{
    protected $table            = 'akses_submenu';
    protected $primaryKey       = 'id_submenu';
    protected $returnType       = 'object';
    protected $allowedFields    = ['id_menu', 'nama_submenu', 'akses', 'tambah', 'edit', 'hapus'];

    public function menu()
    {
        return $this->db->table('akses_menu')->get()->getResult();
    }

    public function findSubmenuByMenu($id)
    {
        return $this->db->table($this->table)->where('id_menu', $id)->get()->getResult();
    }
}
