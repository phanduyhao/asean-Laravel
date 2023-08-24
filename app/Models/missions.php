<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class missions extends Model
{
    use HasFactory;
    protected $table = 'missions';
    public function listMissions()
    {
        return $this->hasMany(listMissions::class, 'mission_id');
    }
}
