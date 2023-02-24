<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class StatisfactionController extends Controller
{
    public function index(Request $request)
    {
        return view('layouts.customer.statisfaction');
    }

}