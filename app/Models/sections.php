<?php

namespace App\Models;

use App\Http\Controllers\Admin\customersController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sections extends Model
{
    use HasFactory;
    protected $table = 'sections';
    public function listServices()
    {
        return $this->hasMany(listServices::class, 'section_id');
    }
    public function testimonial()
    {
        return $this->hasMany(testimonials::class, 'section_id');
    }
    public function customers()
    {
        return $this->hasMany(customers::class, 'section_id');
    }
    public function cates()
    {
        return $this->hasMany(cates::class, 'section_id');
    }
}
