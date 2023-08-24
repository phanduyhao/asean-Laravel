<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class services extends Model
{
    use HasFactory;
    protected $table = 'services';
    public function listServices()
    {
        return $this->hasMany(listServices::class, 'service_id');
    }
}
