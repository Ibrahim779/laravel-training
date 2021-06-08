<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
            'title_ar' => 'required|min:5|max:255',
            'title_en' => 'required|min:5|max:255',
            'description_ar' => 'required|min:10',
            'description_en' => 'required|min:10',
            'img' => 'image|mimes:jpeg,jpg,png,gif,svg|max:10000',
        ];
    }
}
