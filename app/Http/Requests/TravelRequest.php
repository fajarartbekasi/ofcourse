<?php

namespace App\Http\Requests;

use App\User;
use Illuminate\Foundation\Http\FormRequest;

class TravelRequest extends FormRequest
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
            'type_id'   =>  'required',
            'name'      =>  'required',
            'image'     =>  'required|file|mimes:jpeg,png,jpg|max:10000',
        ];
    }
    public function formTravel()
    {
        return[
            'user_id'   => auth()->id(),
            'type_id'   => $this->type_id,
            'name'      => $this->name,
            'image'     => $this->image,
        ];
    }
}
