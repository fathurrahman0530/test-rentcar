<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Ramsey\Uuid\Uuid;

class PemesananRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */

    protected function prepareForValidation()
    {
        switch ($this->act) {
            case 'Store':
                $this->merge([
                    'uuid' => Uuid::uuid4()->toString(),
                ]);
                break;
        }
    }
    public function rules(): array
    {
        switch ($this->act) {
            case 'Store':
                return [
                    'name' => 'required',
                    'notelp' => 'required',
                    'email' => 'required',
                    'merk' => 'required',
                ];
            case 'Update':
                return [
                    'uuid' => 'required',
                ];
        }
    }

    protected function passedValidation()
    {
        switch ($this->act) {
            case 'Store':
                $this->merge([
                    'data' => [
                        'uuid' => $this->uuid,
                        'name' => $this->name,
                        'notelp' => $this->notelp,
                        'email' => $this->email,
                        'unit' => $this->merk,
                        'status' => 'F',
                    ]
                ]);
                break;

            case 'Update':
                $this->merge([
                    'uuid' => $this->uuid,
                    'data' => [
                        'status' => 'T',
                    ]
                ]);
                break;
        }
    }
}
