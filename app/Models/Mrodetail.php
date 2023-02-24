<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mrodetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'i_id_mrodtl',
        'i_id_mro',
        'n_mro_dtl',
        'e_mro_dtl',
        'f_mro_dtlstat'
    ];
    protected $primaryKey = 'i_id_mrodtl';
    protected $table = 'tmmrodtl';
}
