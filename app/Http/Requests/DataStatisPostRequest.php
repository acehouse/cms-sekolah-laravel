<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class DataStatisPostRequest extends Request {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'data_id' => 'required',
            'content' => 'required',
            'file' => 'image'
        ];
    }

    public function messages() {
        return [
            'data_id.required' => 'Kategori Diperlukan!',
            'content.required' => 'Isi Diperlukan!',
            'file.image' => 'File hanya boleh berupa gambar',
        ];
    }

}
