<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use DB;
class Categories extends Model
{
	protected $table = 'term_taxonomy';

    protected $fillable = [
        'name',
        'parent',
       	
    ];
    public $timestamps = false;
    // Lấy danh sách category từ table term_taxonomy
    public static function AllCategories()
    {
    	$categories = DB::table('term_taxonomy')->where('taxonomy', 'category')->get();
    	return $categories;
    }
    public static function AllCategoriesHTML()
    {
        $html = '<ul id="listCategorieshmtl">';
        $categories = DB::table('term_taxonomy')->where('taxonomy', 'category')->where('parent', 0)->get();
        foreach ($categories as $category) {
            $html .= '<li>
                    <label>
                    <input name="categories[]" type="checkbox" id="'.$category->id.'" value="'.$category->id.'" > '.$category->name.'
                    </label>';
            $subcategories = DB::table('term_taxonomy')->where('taxonomy', 'category')->where('parent', $category->id)->get();
            $html .= '<ul id="sublistCategorieshmtl">';
            foreach ($subcategories as $subcategory) {
                $html .= '<li>
                        <label>
                        <input name="categories[]" type="checkbox" id="'.$subcategory->id.'" value="'.$category->id.'"> '.$subcategory->name.'
                        </label>';
                $subcategories = DB::table('term_taxonomy')->where('taxonomy', 'category')->where('parent', $category->id)->get();
                $html .= '</li>';
            }
            $html .= '</ul>';
            $html .= '</li>';
        }
        $html .= '</ul>';
        return $html;
    }
    // Lấy danh sách Tags từ table term_taxonomy
    public static function AllTags()
    {
        $tags = DB::table('term_taxonomy')->where('taxonomy', 'tag')->get();
        return $tags;
    }
    public static function getCategoriesbyID($id)
    {
        $html = '';
        $categoriesbyID = DB::table('term_taxonomy')
            ->join('taxonomy_relationships', 'term_taxonomy.id', '=', 'taxonomy_relationships.term_id')
            ->where('taxonomy_relationships.post_id', $id)->where('term_taxonomy.taxonomy', 'category')->get();
        foreach ($categoriesbyID as $categorybyID) {
            $html .= '<a href="#">'.$categorybyID->name.'</a> ';
        }
        return $html;
    }
}
