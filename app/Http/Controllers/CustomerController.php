<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $nama = "Customer";
        $background = "header1.jpg";
        $titles = array("Customer","WorldWide Customers");
        $countries = DB::table('tmcustomer')->distinct('a_cust')->get(['a_cust','i_cust_coorleft','i_cust_coortop','n_cust_fileflag']);
        $domestics = DB::table('tmcustomer')->where('c_category',0)->orderBy('n_cust','ASC')->get();
        $internationals = DB::table('tmcustomer')->where('c_category',1)->orderBy('n_cust','ASC')->get();
        return view('layouts.customer.customer',compact('nama','background','titles','countries','domestics','internationals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = DB::table('tmcustomer')->where('a_cust',$id)->get();
        return $company;
    }

    public function showplane($id)
    {
        $airplanes = DB::table('tmcustdelivac as a')
                  ->select('a.c_custdeliv_ac as c_custdeliv_ac','c.n_title as n_title', 'c.n_ac_image as n_ac_image')
                  ->join('traircraft as c','a.c_custdeliv_ac','=','c.id')
                  ->where('a.c_custdeliv',$id)
                  ->distinct('a.c_custdeliv_ac')
                  ->orderBy('a.c_custdeliv_ac','ASC')
                  ->get();
        return $airplanes;
    }

    public function showplane2($key1,$key2)
    {
        $planes = DB::table('tmcustdelivac')
                  ->select('q_custdeliv_ac','e_custdeliv_ac')
                  ->where('c_custdeliv_ac',$key1)
                  ->where('c_custdeliv',$key2)
                  ->orderBy('i_custdeliv','ASC')
                  ->get();
        return $planes;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}