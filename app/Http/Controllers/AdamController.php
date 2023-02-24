<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdamController extends Controller
{
    public function index()
    {
        $nama = "Service";
        $background = "header3.jpg";
        $titles = array("Services","Technical Support","ADAM");
        $adams = DB::table('tmgeneral')->where('id',4)->get();
        return view('layouts.services.adam',compact('adams','nama','background','titles'));
    }

    public function index2(Request $request)
    {
        $typeac = $request->input('typeac');
        $s = $request->input('s');
        $id = $request->input('idcust');
        $adams2 = DB::table('tmadam as a')
                    ->select('a.i_adam as i_adam', 
                    'b.n_title as n_title', 
                    'c.n_cust as n_cust', 
                    'a.c_adam_categ as c_adam_categ', 
                    'a.c_adam_tailno as c_adam_tailno', 
                    'a.n_adam_defect as n_adam_defect', 
                    'a.n_adam_analy as n_adam_analy', 
                    'a.n_adam_soln as n_adam_soln', 
                    'a.n_adam_sbslno as n_adam_sbslno',
                    'a.f_adam_stat as f_adam_stat')
                    ->join('traircraft as b','a.c_adam_ac','=','b.id')
                    ->join('tmcustomer as c','a.c_adam_cust','=','c.c_cust')
                    ->where('f_adam_stat',1)
                    ->where('c_adam_cust',$id);
                    if ($request->s){
                    $adams2 = $adams2 -> where((function ($query) use ($s){
                        $query->where('b.n_title', 'ILIKE', '%'.$s.'%')
                              ->orWhere('a.n_adam_defect', 'ILIKE', '%'.$s.'%');
                    }));}
                    if ($request->input('typeac')) {
                        $adams2->where('c_adam_categ', $typeac );
                    }
                    $adams2 = $adams2->get();
                    return view('layouts.services.adamlogin',compact('adams2'));
    }
}
