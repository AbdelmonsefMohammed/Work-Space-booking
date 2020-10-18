<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class RoomRec extends FormRequest
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
            'name' => 'required',
            'type' => ['required',Rule::in(['meeting_room', 'room'])],
            'capacity' => 'required|integer|max:100',
            'hourly_rate' => 'required|numeric',
            'over_capacity' => 'nullable|integer|max:100',
            'extra_price' => 'nullable|numeric',
            'description' => 'nullable',
        ];
    }
}
