<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Pasien extends Model
{
    protected $table      = 'tb_pasien';
    protected $primaryKey = 'id_pasien';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'nama_pasien',
        'jenis_kelamin',
        'alamat',
        'no_telp',
    ];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
