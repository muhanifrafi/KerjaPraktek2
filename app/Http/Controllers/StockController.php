<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class StockController extends Controller
{
    public function index()
    {
        $nama = "Service";
        $background = "header3.jpg";
        $titles = array("Services","Stocks");
        return view('layouts.services.stock',compact('nama','background','titles'));

    }
    public function index2(Request $request)
    {
        $s = $request->s;
        $cat = $request->cat;
        if($request->s && $request->cat){
            $stocks = DB::table('tmstock')->where($cat,'ILIKE','%'.$s.'%')->orderBy('n_ac_number','ASC')->paginate(10);
        }
        else{
        $stocks = DB::table('tmstock')->orderBy('n_ac_number','ASC')->paginate(10);
        }
        $stocks->appends($request->all());
        return view('layouts.services.stockindex',compact('stocks'));
    }

}