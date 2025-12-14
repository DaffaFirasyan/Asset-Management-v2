<?php

namespace Modules\Asset\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAssetRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'serial_number' => 'required|string|unique:assets,serial_number|max:100',
            'location' => 'required|string|max:255',
            'status' => 'required|in:available,in_use,broken,maintenance',
            'description' => 'nullable|string|max:1000'
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Nama aset wajib diisi',
            'serial_number.required' => 'Nomor seri wajib diisi',
            'serial_number.unique' => 'Nomor seri sudah terdaftar',
            'location.required' => 'Lokasi wajib diisi',
            'status.required' => 'Status wajib diisi',
            'status.in' => 'Status harus salah satu dari: available, in_use, broken, maintenance',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     */
    public function attributes(): array
    {
        return [
            'name' => 'nama aset',
            'serial_number' => 'nomor seri',
            'location' => 'lokasi',
            'status' => 'status',
            'description' => 'deskripsi',
        ];
    }
}
