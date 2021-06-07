<?php namespace App\Models;

use CodeIgniter\Model;

class KesebelasanModel extends Model
{
    protected $table = 'kesebelasan';
    protected $primaryKey = 'kesebelasan_id';
    protected $allowedFields = ['kesebelasan_nama', 'formasi_id', 'bobot_id'];
}
