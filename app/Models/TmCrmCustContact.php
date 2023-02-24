<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TmUserCustomer;
class TmCrmCustContact extends Model
{
    use HasFactory;
    protected $table = 'tmcrmcustcontact';
    protected $primaryKey = 'i_id_custcontact';
    public $incrementing = false;
    protected $fillable = [
        'i_id_custcontact',
        'n_cust_contact'
        // add other fillable fields here
    ];
    public function tmusercustomer()
    {
        return $this->hasMany(TmUserCustomer::class);
    }
}
