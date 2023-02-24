<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FixedWingController extends Controller
{
    public function index()
    {
        $nama = "Aircraft";
        $background = "header4.jpg";
        $titles = array("Aircraft","Fixed Wing");
        $fixed = DB::connection('mysql')->table('tmptdiac')->where('c_ptdi_accateg',1)->where('f_ptdi_acstat',1)
                ->where('c_ptdi_aclvl',1)->where('c_ptdi_accontinue',1)->orderBy('c_ptdi_acord')->get();
        return view('layouts.aircraft.fixedwing',compact('fixed','nama','background','titles'));
    }

    public function show($id)
    {
        $nama = "Aircraft";
        $background = "header4.jpg";
        $titles = array("Aircraft","Fixed Wing");
        $planes = DB::connection('mysql')->table('tmptdiac')->where('i_ptdi_ac',$id)->get();
        $wings = DB::connection('mysql')->table('tmptdiac')->where('f_ptdi_acstat',1)->where('c_ptdi_acparent',$id)
                ->where('c_ptdi_accontinue',1)->orderBy('c_ptdi_acord')->get();
        return view('layouts.aircraft.detailplane',compact('wings','nama','background','titles','planes'));
    }

}
