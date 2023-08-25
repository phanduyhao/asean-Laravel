<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class posts extends Model
{
    use HasFactory;
    protected $table = 'posts';
    protected $casts = [
        'created_at' => 'datetime:d/m/Y', // Định dạng ngày tháng năm
    ];
    public function getCreatedAtAttribute($value)
    {
        return date('d.m.Y', strtotime($value)); // Định dạng theo 'Ngày/Tháng/Năm'
    }
    public function cate()
    {
        return $this->belongsTo(cates::class, 'cate_id','id');
    }
}
