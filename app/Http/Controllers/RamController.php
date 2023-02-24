<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class RamController extends Controller
{
    public function index()
    {
        $nama = "Service";
        $background = "header3.jpg";
        $titles = array("Services","Technical Support","RAM");
        $rams = DB::table('tmgeneral')->where('id',5)->get();
        return view('layouts.services.Ram',compact('rams','nama','background','titles'));
    }
}
