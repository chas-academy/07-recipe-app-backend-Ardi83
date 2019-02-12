<?php

namespace App\Http\Requests;

use App\Meal;
use App\Recipe;
use Illuminate\Foundation\Http\FormRequest;

class RecipeRequest extends FormRequest
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
        
        'name' => 'required|unique:meals',
        // 'description' => '',
        // 'country' =>'',
        'type' => 'required',
        'allergic_type' => 'required',
        // 'energy' => '',
        // 'cooking_time' => '',
        // 'preparing_time' => '',
        // 'image' => '',
        
        // 'author' => '',
        // 'title' => '',
        'instructure' => 'required',
        ];
       
    }
}
