<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FaqeRequest extends FormRequest
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
        if ($this->method() == 'POST') {
            return [
                'fr.question'=>'required',
                'fr.answer'=>'required',
             
                'en.question'=>'required',
                'en.answer'=>'required',
              
            ];
        } elseif ($this->method() == 'PUT' || $this->method() == 'PATCH') {
   
            return [
                'question'=>'required',
                'answer'=>'required',
                
            ];
        }
    }
    
}
