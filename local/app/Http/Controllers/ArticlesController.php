<?php

namespace App\Http\Controllers;
use App\Articles;
use App\Taxonomy_relationships;
use Illuminate\Http\Request;
use App\Http\Requests\CheckArticlesRequest;
use App\Http\Controllers\Controller;
class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $articles = Articles::all();
 
        return view("articles")->with("articles", $articles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CheckArticlesRequest $request)
    {
        $dulieu_tu_input = $request->all();
 
        //Gọi model Articles.php đã được tạo ra ở các bài trước
        $articles = new Articles;
 
        //Lấy thông tin từ các input đưa vào thuộc tính name, author
                //trong model Articles
        $articles->title = $dulieu_tu_input["title"];
        $articles->author = $dulieu_tu_input["author"];
        $articles->content = $dulieu_tu_input["content"];
        $articles->description = $dulieu_tu_input["description"];
        $articles->meta_keyword = $dulieu_tu_input["meta_keyword"];
        $articles->meta_description = $dulieu_tu_input["meta_description"];
        $articles->slug = str_slug($dulieu_tu_input["title"]);
        //Tiến hành lưu dữ liệu vào database
        $result = $articles->save();
        var_dump($result);
        if($result)
        {
            
            $categories = $dulieu_tu_input["categories"];
            var_dump($categories);
            foreach ($categories as $category_id) {
                $relationship = new Taxonomy_relationships;
                $relationship->term_id = $category_id;
                $relationship->post_id = $articles->id;
                $relationship->save();
            }
        }
        //Sau khi đã lưu xong, tiến hành chuyển hướng tới route articles
                //hiển thị toàn bộ thông tin bảng articles trong database đã được tạo ở các bài trước
        return redirect('admin/bai-viet');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Articles::findOrFail($id);
           
           // Gọi view edit.blade.php hiển thị bải viết
        return view('show',compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){//truyền mã id của article
            
           //Tìm article thông qua mã id tương ứng
              $article = Articles::findOrFail($id);
           
           // Gọi view edit.blade.php hiển thị bải viết
              return view('edit',compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function update($id , Request $request){
     
        $articles = Articles::findOrFail($id);
        $articles->update($request->all());
 
        return redirect('articles');
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
