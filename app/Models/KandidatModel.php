<?php namespace App\Models;

use CodeIgniter\Model;

class KandidatModel extends Model
{
    protected $table = 'kandidat';
    protected $primaryKey = 'kandidat_id';
    protected $allowedFields = ['kandidat_nama', 'posisi_id', 'kesebelasan_id', 'nilai_kriteria_id', 'kandidat_speed', 'kandidat_heading', 'kandidat_control', 'kandidat_passing'];
}
