<?php

namespace App\Http\Requests\Event;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEventRequest extends FormRequest
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
            'title' => 'required|max:255',
            'description' => 'nullable',
            'start_datetime' => 'required|date_format:"Y-m-d H:i:s"',
            'end_datetime' => 'required|date_format:"Y-m-d H:i:s"',
            'organizers.*' => 'required|numeric'
        ];
    }
}
