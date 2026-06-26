<?php

namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model
{
    protected $table = 'tb_mahasiswa';
    protected $primaryKey = 'nim';
    protected $useAutoIncrement = false;
    protected $returnType = 'array';
    protected $allowedFields = ['nim', 'nama', 'prodi', 'universitas', 'no_hp'];
}
