<?php namespace App\Models;

use CodeIgniter\Model;

class FormasiModel extends Model
{
    protected $table = 'formasi';
    protected $primaryKey = 'formasi_id';
    protected $allowedFields = ['formasi_belakang', 'formasi_tengah', 'formasi_depan'];
}
