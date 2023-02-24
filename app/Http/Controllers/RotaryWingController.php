<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RotaryWingController extends Controller
{
    public function index()
    {
        $nama = "Aircraft";
        $background = "header4.jpg";
        $titles = array("Aircraft","Rotary Wing");
        $rotary = DB::connection('mysql')->table('tmptdiac')->where('c_ptdi_accateg',2)->where('f_ptdi_acstat',1)
                ->where('c_ptdi_aclvl',1)->where('c_ptdi_accontinue',1)->orderBy('c_ptdi_acord')->get();
        return view('layouts.aircraft.rotarywing',compact('rotary','nama','background','titles'));
    }

}