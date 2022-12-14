<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'category_id'=> 'required',
            'title' => 'required',
            'description' => 'required',
            'cost_price' => 'required|numeric',
            'price' => 'required|numeric',
            'image' =>  'mimes:jpeg,png,jpg,gif|max:3000|required'
        ];
        
    }

    public function messages()
    {
        return
        [
            'category_id.required'=> "Category is required",
            'title.required'=> "Brand Name is required",          
            'price.required'=> "Sale Price is required",
 
        ];
        
    }
}
