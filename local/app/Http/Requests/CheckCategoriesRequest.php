<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckCategoriesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
              
              //thiết lập các rule cho form
              'name' => 'required|min:6|unique:term_taxonomy.name', // field name bắt buộc nhập và phải có tổi thiểu 6 ký tự
              'parent' => 'required', // field author bắt buộc nhập
              'meta_keyword' => 'required',
              'meta_description' => 'required|min:20',
              'slug' => 'unique:term_taxonomy.slug',
              ];
    }
    
    public function messages()
    {
        return [
            'name.required' => 'Bạn chưa điền tên Danh Mục',
            'name.min' => 'Danh mục phải trên 6 ký tự',
            'name.unique' => 'Danh mục đã tồn tại',
            'meta_keyword.required' => 'Vui lòng điền vào Meta Keyword',
            'meta_description.required' => 'Vui lòng điền vào mô tả Danh mục',
            'meta_description.min' => 'Mô tả danh mục phải trên 20 ký tự',
            'slug.unique' => 'Slug đã tồn tại',
        ];
    }
}
