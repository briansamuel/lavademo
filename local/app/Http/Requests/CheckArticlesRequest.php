<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckArticlesRequest extends FormRequest
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
              'title' => 'required|min:6|unique:articles', // field name bắt buộc nhập và phải có tổi thiểu 6 ký tự
              'content' => 'required|min:200', // field author bắt buộc nhập
              'description' => 'required|min:20',
              ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Bạn chưa điền Tiêu đề',
            'title.min' => 'Tiêu đề phải trên 6 ký tự',
            'title.unique' => 'Tiêu đề bài viết đã tồn tại',
            'content.required' => 'Nội dung bài viết không được để trống',
            'content.min' => 'Nội dung bài viết phải trên 200 ký tự',
            'description.required' => 'Tóm tắt bài viết không được để trống',
            'description.min' => 'Tóm tắt bài viết phải trên 20 ký tự',
        ];
    }
}
