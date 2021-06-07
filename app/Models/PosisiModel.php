<?php namespace App\Models;

use CodeIgniter\Model;

class PosisiModel extends Model
{
    protected $table = 'posisi';
    protected $primaryKey = 'posisi_id';
    protected $allowedFields = ['posisi_nama'];
}
