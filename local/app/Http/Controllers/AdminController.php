<?php

namespace App\Http\Controllers;
use App\Articles;
use App\Categories;
use DB;
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
        $articles = Articles::orderBy('created_at', 'desc')->get();

        return view('admin/listarticle')->with("articles", $articles);
    }

    public function addarticle()
    {
        $html = Categories::AllCategoriesHTML();
        return view('admin/addarticle')->with("html", $html);
    }
    public function addcategory()
    {
        $categories = Categories::AllCategories();
        //var_dump($categories);
        return view('admin/addcategory')->with("categories", $categories);
    }
}
