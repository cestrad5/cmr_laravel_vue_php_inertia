<?php

namespace App\Http\Requests\Contact;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name" => ["required", "string", "max:100", "min:3"],
            "phone" => ["required", "string", "max:50", "min:5"],
            "avatar" => ["nullable", "image", "mimes:jpeg,png,jpg,gif,svg", "max:2048"],
            "privacy" => ["required", "in:public,private"],
        ];
    }
}
