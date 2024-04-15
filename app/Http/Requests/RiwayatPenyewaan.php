<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Uuid;

class RiwayatPenyewaan extends FormRequest
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
    public function rules(): array
    {
        switch ($this->act) {
            case 'Pembayaran':
                return [
                    'old_store' => 'required',
                    'pembayaran_tagihan' => 'required',
                ];
        }
    }

    protected function passedValidation()
    {
        switch ($this->act) {
            case 'Pembayaran':
                $this->merge([
                    'spks' => [
                        'uuid' => $this->uuid,
                        'data' => [
                            'store_payment' => $this->old_store + $this->pembayaran_tagihan,
                        ]
                    ],
                    'transaction' => [
                        'uuid' => Uuid::uuid4()->toString(),
                        'debit' => $this->pembayaran_tagihan,
                        'kredit' => 0,
                        'keterangan' => 'Pembayaran Tagihan',
                        'uuid_spk' => $this->uuid,
                        'uuid_user' => Auth::user()->uuid,
                    ],
                ]);
                break;
        }
    }
}
