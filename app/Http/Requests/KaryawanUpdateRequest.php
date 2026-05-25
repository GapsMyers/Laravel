<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Unique;

class KaryawanUpdateRequest extends ApiRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, array<int, string|Unique>>
     */
    public function rules(): array
    {
        $karyawan = $this->route('karyawan');

        return [
            'Nama' => ['required', 'string', 'max:255'],
            'Email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('karyawans', 'Email')->ignore($karyawan?->getKey()),
            ],
            'Role' => ['required', 'string', 'max:255'],
            'status' => ['required', 'boolean'],
        ];
    }
}
