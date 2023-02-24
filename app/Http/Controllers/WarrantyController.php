<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class WarrantyController extends Controller
{
    public function index()
    {
        $nama = "Service";
        $background = "header3.jpg";
        $titles = array("Services","Technical Support","Warranty Terms");
        $warranties = DB::table('tmgeneral')->where('id',3)->get();
        return view('layouts.services.warranty',compact('warranties','nama','background','titles'));
    }
}
