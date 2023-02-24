<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceBulletinController extends Controller
{
    public function index()
    {
        $nama = "Service";
        $background = "header3.jpg";
        $titles = array("Services","Manuals","Aircraft Manuals","SB Index");
        $planes = DB::table('tmservice_bulletin as a')
                 ->select('a.c_ac as c_ac','b.n_title as n_title')
                 ->join('traircraft as b','a.c_ac','=','b.id')
                 ->distinct('a.c_ac')
                 ->where('f_svcbullet_stat',1)
                 ->get();
        return view('layouts.services.sb',compact('nama','background','titles','planes'));
    }

    public function index2(Request $request)
    {
        $ac = $request->ac;
        $e_categ = $request->e_categ;
        $cat = $request->cat;
        $s = $request->s;
        $sbs = DB::table('tmservice_bulletin as a')
        ->select('a.id as id','a.n_no as n_no','a.n_rev as n_rev','a.d_rev as d_rev',
        'a.n_title as n_title',  
        'a.e_effectivity as e_effectivity',
        'a.n_file as n_file',
        'a.c_ac as c_ac',
        'a.i_entry as i_entry',
        'a.d_entry as d_entry',
        'a.c_version as c_version',
        'a.f_svcbullet_stat as f_svcbullet_stat',
        'a.c_cust as c_cust',
        'a.e_categ as e_categ', 
        'a.e_rev_date as e_rev_date', 
        'b.n_title as air_title')
        ->join('traircraft as b','a.c_ac','=','b.id')
        ->where('f_svcbullet_stat',1);
        if($request->ac){
            $sbs = $sbs->where('b.n_title',$ac);
        }
        if($request->e_categ){
            $sbs = $sbs->where('a.e_categ',$e_categ);
        }
        
        if($request->cat && $request->s){
            $sbs = $sbs->where($cat,'ILIKE','%'.$s.'%');
        }
        $sbs = $sbs->paginate(10);
        $sbs->appends($request->all());
        return view('layouts.services.sbtable',compact('sbs','ac','e_categ','cat','s'));
    }
}