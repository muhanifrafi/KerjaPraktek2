<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = DB::table('trcrmcode')->where('c_code_ref','5')->orderBy('c_code','ASC')->get();
        return $contacts;
    }
}