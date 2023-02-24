<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TmUserCustomer;
class TmCrmCust extends Model
{
    use HasFactory;
    protected $table = 'tmcrmcust';
    protected $primaryKey = 'i_id_cust';
    public $incrementing = false;
    protected $fillable = [
        'i_id_cust',
        'n_cust',
        // add other fillable fields here
    ];
    public function tmusercustomer()
    {
        return $this->hasMany(TmUserCustomer::class,'c_customer');
    }
}
