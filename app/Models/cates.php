<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cates extends Model
{
    use HasFactory;
    protected $table ='cates';
    public function parent()
    {
        return $this->belongsTo(cates::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(cates::class, 'parent_id');
    }
    public function posts()
    {
        return $this->hasMany(posts::class, 'cate_id');
    }
}
