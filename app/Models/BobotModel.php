<?php namespace App\Models;

use CodeIgniter\Model;

class BobotModel extends Model
{
    protected $table = 'bobot';
    protected $primaryKey = 'bobot_id';
    protected $allowedFields = ['bobot_speed', 'bobot_heading', 'bobot_control', 'bobot_passing'];
}
