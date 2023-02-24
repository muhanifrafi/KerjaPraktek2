<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\TmgeneralPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Nav;
use App\Models\Mro;
use App\Models\Mrodetail;

class NavController extends Controller
{
    public function index()
    {
       $trains = DB::table('tmcustomer_training')->get();     
        return $trains;
    }

    public function index2(){
        $mros = DB::table('tmmro')->where('f_mro_stat','1')->get();
        return $mros;
    }

    public function index3($id){
        $mrodtls = DB::table('tmmrodtl')->where('f_mro_dtlstat','1')->where('i_id_mro',$id)->get();
        return $mrodtls;
    }

    public function show(Nav $id){
        $nama="";
        $background = "header5.jpg";
        $titles = array("Training","Training Detail");
        return view('layouts.services.planetrain',compact('id','nama','background','titles'));
    }

    public function show2(Mro $i_id_mro){
        $nama="";
        $background = "header5.jpg";
        $titles = array("Maintenance, Repair, and Overhaul (MRO)");
        return view('layouts.services.mro',compact('i_id_mro','nama','background','titles'));
    }

    public function show3(Mrodetail $i_id_mrodtl){
        $nama="";
        $background = "header5.jpg";
        $titles = array("Maintenance, Repair, and Overhaul (MRO)","MRO Detail");
        return view('layouts.services.mrodetail',compact('i_id_mrodtl','nama','background','titles'));
    }
}
