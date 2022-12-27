<?php

namespace App\Http\Requests\Backend\Member;

use Illuminate\Foundation\Http\FormRequest;

class MemberUpdateRequest extends FormRequest
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
            "name" => "required|string",
            "designation" => "required|string",
            "constituency" => "required|string",
            "party" => "required|string",
            "order" => "required|integer",
            "status" => "required|integer",
            "member_profile" => 'nullable|mimes:jpg,jpg,png|max:1024',
        ];
    }
}
