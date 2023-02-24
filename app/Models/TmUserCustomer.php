<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\TmCrmCustContact;
use App\Models\TmCrmCust;

class TmUserCustomer extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'tmuser_customer';

    protected $primaryKey = 'n_user';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'n_user',
        'n_password',
        'c_customer',
        'c_cust_contact'
        // add other fillable fields here
    ];

    protected $hidden = [
        'n_password',
        // add other hidden fields here
    ];

    public function getAuthPassword()
    {
        return $this->n_password;
    }

    public function tmcrmcust()
    {
        return $this->belongsTo(TmCrmCust::class,'c_customer','i_id_cust');
    }

    public function tmcrmcustcontact()
    {
        return $this->belongsTo(TmCrmCustContact::class,'c_cust_contact','i_id_custcontact');
    }
}