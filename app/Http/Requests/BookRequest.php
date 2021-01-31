<?php

namespace App\Http\Requests;


class BookRequest extends Request
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
        switch (true) {

            case $this->wantsToStore():

                $rules['title'] = 'required|min:3|max:150';
                $rules['description'] = 'required|min:3|max:500';
                $rules['rating'] = 'required|min:0|max:6|numeric';

                break;
            default:
                $rules = [];
        }

        return $rules;
    }
}
