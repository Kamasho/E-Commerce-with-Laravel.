<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable = [
        'name',
        'slug',
        'description',
        'status',
        'popural',
        'image',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ]; use HasFactory;
}
