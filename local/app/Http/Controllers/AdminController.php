<?php

namespace App\Http\Controllers;
use App\Articles;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/content');
    }

    public function listarticle()
    {
        $articles = Articles::all();
        return view('admin/listarticle')->with("articles", $articles);;
    }

    public function addarticle()
    {
        return view('admin/addarticle');
    }
    public function addcategory()
    {
        return view('admin/addcategory');
    }
}
