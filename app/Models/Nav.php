<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nav extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'n_title',
        'e_content'
    ];

    protected $table = 'tmcustomer_training';
}
