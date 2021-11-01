<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
        $isInsertRequest = request()->exists(array('title', 'description', 'image'));
        $isUpdateRequest = request()->exists(array('id','title', 'description', 'image'));
        $isDeleteRequest = request()->exists(array('id'));
        $isGetArticleByIdRequest = request()->exists(array('id'));
        
        if($isUpdateRequest){
            return [
                'id' => 'required',
                'title' => 'required',
                'description' => 'required',
                'image' => 'required'
            ];
        }

        if($isInsertRequest){
            return [
                'title' => 'required',
                'description' => 'required',
                'image' => 'required'
            ];
        }

        if($isDeleteRequest && $isGetArticleByIdRequest){
            return [
                'id' => 'required'
            ];
        }

        return [
            //
        ];
    }


    public function messages()
    {
        return [
            'title.required' => 'Title is required!',
            'description.required' => 'Description is required!',
            'image.required' => 'Image is required!',
            'id.required' => 'Id url is required'
        ];
    }
}
