<?php

namespace App\Http\Requests;

class StockRequestStoreRequest extends ApiRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, array<int, string>>
     */
    public function rules(): array
    {
        return [
            'department' => ['required', 'string', 'max:255'],
            'requester_name' => ['required', 'string', 'max:255'],
            'requested_at' => ['required', 'date'],
            'notes' => ['nullable', 'string', 'max:1000'],
            'item' => ['required', 'array'],
            'item.barang_id' => ['nullable', 'integer', 'exists:barangs,id'],
            'item.nama_barang' => ['required_without:item.barang_id', 'string', 'max:255'],
            'item.kode_barang' => ['nullable', 'string', 'max:255'],
            'item.qty_requested' => ['required', 'integer', 'min:1'],
        ];
    }
}
