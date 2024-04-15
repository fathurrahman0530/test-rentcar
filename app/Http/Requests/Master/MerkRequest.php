<?php

namespace App\Http\Requests\Master;

use Illuminate\Foundation\Http\FormRequest;
use Ramsey\Uuid\Uuid;

class MerkRequest extends FormRequest
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
        switch ($this->act){
            case 'Store':
                $this->merge([
                    'uuid' => Uuid::uuid4()->toString(),
                ]);
                break;
        }
    }

    public function rules(): array
    {
        switch ($this->act){
            case 'Store':
                return [
                    'merk' => 'required',
                ];

            case 'Update':
                return [
                    'uuid' => 'required',
                    'merk' => 'required'
                ];

            case 'Destroy':
                return [
                    'uuid'=> 'required'
                ];
        }
    }

    protected function passedValidation()
    {
        switch ($this->act){
            case 'Store':
                $this->merge([
                    'uuid' => $this->uuid,
                    'name' => $this->merk
                ]);
                break;

            case 'Update':
                $this->merge([
                    'uuid' =>$this->uuid,
                    'data' => [
                        'name' => $this->merk
                    ]
                    ]);
                break;

            case 'Destroy':
                $this->merge([
                    'uuid' => $this->uuid
                ]);
                break;
        }
    }
}
