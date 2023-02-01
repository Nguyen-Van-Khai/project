<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class Request extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'min:3'],
            'price' => ['required', 'numeric'],
            'avatar' => ['image', 'max:2048'],
            'description' =>['required']
        ];
    }
    public function  messages()
    {
        return [
            'name.required' => 'Tên sp phải nhập',
            'name.min' => 'Tên ít nhất 3 ký tự',
            'price.required' => 'Giá phải nhập',
            'price.numeric' => 'Giả phải là số',
            'avatar.image' => 'File upload phải là ảnh',
            'avatar.max' => 'File upload ko đc vượt quá 2MB',
            'description.required' => 'Mô tả không được để trống'
        ];
    }
}
