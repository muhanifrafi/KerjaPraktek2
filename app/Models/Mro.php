<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mro extends Model
{
    use HasFactory;
    protected $fillable = [
        'i_id_mro',
        'n_mro_title',
        'e_mro',
        'f_mro_stat',
    ];
    protected $primaryKey = 'i_id_mro';
    protected $table = 'tmmro';
}
