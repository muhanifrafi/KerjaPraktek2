<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class HowtoorderController extends Controller
{
    public function index()
    {
        $nama = "Service";
        $background = "header3.jpg";
        $titles = array("Services","Technical Support","How To Order");
        $orders = DB::table('tmgeneral')->where('id',2)->get();
        return view('layouts.services.howtoorder',compact('orders','nama','background','titles'));
    }
}