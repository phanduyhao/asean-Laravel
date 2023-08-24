<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class listMissions extends Model
{
    use HasFactory;
    protected $table = 'listmissions';
    public function mission()
    {
        return $this->belongsTo(missions::class, 'mission_id','id');
    }
}
