<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nama = "";
        $background = "header6.jpg";
        $titles = array("Gallery");
        $categnac = DB::table('trgallerycateg')->where('f_gallery_stat',1)->where('c_gallery_categ','NAC')->orderBy('n_gallery_categ','ASC')->get();
        $categac = DB::table('trgallerycateg')->where('f_gallery_stat',1)->where('c_gallery_categ','AC')->orderBy('n_gallery_categ','ASC')->get();
        $galleries = DB::table('tmgallery')->where('f_gallery_stat',1)->orderBy('i_gallery','ASC')->get();
        return view('layouts.gallery',compact('background','titles','nama','categnac','categac','galleries'));
    }
}