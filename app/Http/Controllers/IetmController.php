<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class IetmController extends Controller
{
    public function index()
    {
        $nama = "Service";
        $background = "header3.jpg";
        $titles = array("Services","Technical Support","Interactive Electronic Technical Manual (IETM)");
        $ietms = DB::table('tmgeneral')->where('id',6)->get();
        return view('layouts.services.ietm',compact('ietms','nama','background','titles'));
    }
}