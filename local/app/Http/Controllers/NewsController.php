<?php
namespace App\Http\Controllers;
use App\Tintuc;
use App\Http\Requests;
use App\Http\Controllers\Controller;
 
use Illuminate\Http\Request;

class NewsController extends Controller {
    public function test($id)
    {
            echo 'Demo thoi '.$id;
    }

    public function getDetailAction($id)
    {
            dd($id);
    }
	public function about()
	{
	    return view('master')->nest('content','about',array());
	}
    public function index(){
        $articles = Tintuc::all();
 
                return $articles;
    }
}