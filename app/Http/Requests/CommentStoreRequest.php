<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentStoreRequest extends FormRequest
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
            'message' => 'required|string|max:100',
            'post_id' => 'required|exists:posts,id'
        ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'message.required' => 'Message is required!',
            'message.max' => 'Maximun message length is 100',
            'post_id.exists' => 'This post is not available',
        ];
    }
}
