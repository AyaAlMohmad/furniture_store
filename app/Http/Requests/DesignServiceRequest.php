<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DesignServiceRequest extends FormRequest
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
                'fr.title'=>'required',
                
                'fr.description'=>'required',
                'en.title'=>'required',
      
                'en.description'=>'required',
            
            ];
        } elseif ($this->method() == 'PUT' || $this->method() == 'PATCH') {
   
            return [
                'title'=>'required',
             
                'description'=>'required',
             
            ];
        }
    }
    
}

