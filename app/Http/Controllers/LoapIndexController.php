<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LoapIndexController extends Controller
{
    public function index()
    {
    $nama = "Service";
    $background = "header3.jpg";
    $titles = array("Services","Manuals","Aircraft Manuals","Loap Index");
    // $response = Http::get('http://10.1.95.38:3005/api/referensi/loap');
    $loaps = DB::table('trloap')->get();
    // $loap = $loaps['data'];
    $actypes = DB::table('traircraft')->orderBy('n_title','ASC')->get();
    $effs = DB::table('tmaircraft_manual')->distinct('e_ac_eff')->whereNotNull('e_ac_eff')->orderBy('e_ac_eff')->get();
    $mancats = DB::table('tmaircraft_manual')->distinct('e_man_typ')->whereNotNull('e_man_typ')->orderBy('e_man_typ')->get();
    return view('layouts.services.loap',compact('loaps','nama','background','titles','actypes','effs','mancats'));
    }

    public function index2(Request $request)
    {
        $actype = $request->input('actype');
        $eff = $request->input('eff');
        $cat = $request->input('cat');
        $s = $request->input('s');
        $ac = $request->input('ac');
        $mancat = $request->input('mancat');
        $loaps2 = DB::table('tmaircraft_manual as a')
                ->join('traircraft as b','a.i_id_ac','=','b.id')
                ->select('a.i_id_ac as i_id_ac','a.id as id', 
                        'b.n_title as n_title','a.e_man_typ as e_man_typ',
                        'a.n_abb as n_abb','a.e_desc as e_desc','a.n_ac_revstat as n_ac_revstat',
                        'a.n_ac_lastrevstat as n_ac_lastrevstat')
                ->where('a.c_customer',$ac)
                ->orderBy('a.i_id_ac','ASC');
        if($request->actype){
            $loaps2 = $loaps2->where('b.n_title',$actype);
        }
        if($request->eff){
            $loaps2 = $loaps2->where('a.e_ac_eff',$eff);
        }
        if($request->mancat){
            $loaps2 = $loaps2->where('a.e_man_typ',$mancat);
        }
        if($request->cat && $request->s){
            $loaps2 = $loaps2->where($cat,'ILIKE','%'.$s.'%');
        }
        $loaps2 = $loaps2->orderBy('a.i_id_ac','ASC')->paginate(10);
        return view('layouts.services.loapindex',compact('loaps2','actype','eff','mancat','cat','s'));
    } 
}