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
        $html = '';
        $articles = Articles::orderBy('created_at', 'desc')->get();
        foreach ($articles as $article) {
            $categoriesHTML = Categories::getCategoriesbyID($article->id);
            $html .= '<tr>
                <th>
                <input data-check="'.$article->id.'" type="checkbox" name="remember">
                </th>
                <td>'.$article->id.'</td>
                <td>'.$article->title.'</td>
                <td>'.$article->author.'</td>
                <td>'.$categoriesHTML .'</td>
                <td></td>
                <td>'.$article->created_at->format('d/m/Y').'</td>
                                  
             </tr>';
              
        }
        return view('admin/listarticle')->with("articleshtml", $html);
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
