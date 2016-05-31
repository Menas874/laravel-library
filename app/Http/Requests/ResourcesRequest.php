<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ResourcesRequest extends Request
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
          // no es necesario que el titulo sea unico por que con eloquentsluggable no hay problema
            'title'       => 'min:8|max:100|required',
            'author'      => 'min:2|max:50|required',
            'editorial'   => 'min:2|max:50|required',
            'category_id' => 'required',
            'content'     => 'min:15|required',
            'book'        => 'mimes:pdf,doc,docx,docm,dotx,dotm,xls,xlsx,xlsm,xltx,xltm,xlsb,xlam,ppt,pptx,pptm,pot,potx,potm,ppam,pps,ppsx,ppsm,sld,sldx,sldm|required'
        ];
    }
}
