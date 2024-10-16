<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogs extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'file',
        'slug',
        'created_by', // Tambahkan created_by di sini
    ];
}
