<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Categories;
class CategoriesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    public function addcategory(Request $request)
    {
        $dulieu_tu_input = $request->all();
 
        //Gọi model Articles.php đã được tạo ra ở các bài trước
        $categories = new Categories;
 
        //Lấy thông tin từ các input đưa vào thuộc tính name, author
                //trong model Articles
        $categories->name = $dulieu_tu_input["name"];
        $categories->parent = $dulieu_tu_input["parent"];
        $categories->meta_keyword = $dulieu_tu_input["meta_keyword"];
        $categories->meta_description = $dulieu_tu_input["meta_description"];
        $categories->slug = str_slug($dulieu_tu_input["name"]);
        $categories->taxonomy = 'category';
        //Tiến hành lưu dữ liệu vào database
        $categories->save();
 
        //Sau khi đã lưu xong, tiến hành chuyển hướng tới route articles
                //hiển thị toàn bộ thông tin bảng articles trong database đã được tạo ở các bài trước
        return redirect('admin');
    }
    public function getCategoriesbyID($id)
    {
        $categories = new Categories;
        return $categories->getCategoriesbyID($id)
    }
}
