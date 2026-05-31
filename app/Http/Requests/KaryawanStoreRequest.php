<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Unique;

class KaryawanStoreRequest extends ApiRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, array<int, string|Unique>>
     */
    public function rules(): array
    {
        return [
            'Nama' => ['required', 'string', 'max:255'],
            'Email' => ['required', 'email', 'max:255', Rule::unique('karyawans', 'Email')],
            'Role' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
            'status' => ['required', 'boolean'],
        ];
    }
}
