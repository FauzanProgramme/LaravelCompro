<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    use HasFactory;

    // Specify the fillable attributes
    protected $fillable = [
        'title',
        'description',
        // Add other attributes if needed
    ];
}
