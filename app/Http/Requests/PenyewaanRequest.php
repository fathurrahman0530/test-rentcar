<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\File;

class PenyewaanRequest extends FormRequest
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
            case 'Update':
                $this->merge([
                    'uuid_transaction' => Uuid::uuid4()->toString(),
                ]);
                break;
        }
    }

    public function rules(): array
    {
        switch ($this->act) {
            case 'Store':
                return [
                    'email' => 'required|email',
                    'notelp' => 'required|numeric',
                    'tgl_ambil' => 'required',
                    'jam_ambil' => 'required',
                    'jam_kembali' => 'required',
                    'kategori_pemakaian' => 'required',
                    'tujuan' => 'required',
                    'jaminan' => 'required',
                    'bayar' => 'required',
                ];

            case 'Update':
                return [
                    'uuid' => 'required',
                    'old_store' => 'required',
                    'metode_pembayaran' => 'required',
                ];

            case 'Penyelesaian':
                return [
                    'uuid' => 'required',
                    'uuid_unit' => 'required',
                    'status' => 'required',
                    'status_unit' => 'required',
                    'km_kembali' => 'required',
                    'denda' => 'required',
                    'kerusakan' => 'required',
                    'bbm' => 'required',
                    'old_store' => 'required',
                    'pembayaran' => 'required',
                    'total_pembayaran' => 'required',
                ];

            case 'Perpanjang':
                return [
                    'uuid' => 'required',
                    'tgl_kembali_perpanjang' => 'required',
                ];

            case 'Destroy':
                return [
                    'uuid_user' => 'required',
                    'uuid_bio' => 'required',
                ];
        }
    }

    protected function passedValidation()
    {
        switch ($this->act) {
            case 'Store':
                $idLogin = Auth::user()->uuid;
                $this->merge([
                    'data' => [
                        'uuid' => $this->uuid,
                        'no_spk' => $this->no_spk,

                        'tgl_ambil' => $this->tgl_ambil,
                        'tgl_kembali' => $this->tgl_kembali,
                        'jam_ambil' => $this->jam_ambil,
                        'jam_kembali' => $this->jam_kembali,
                        'kat_pemakaian' => $this->kategori_pemakaian,
                        'tujuan' => $this->tujuan,
                        'jaminan' => $this->jaminan,
                        'metode_pay' => $this->metode_pembayaran,
                        'total_payment' => $this->total,
                        'store_payment' => $this->bayar,
                        'status' => 'F',

                        'uuid_driver' =>  $this->driver != null ? $this->driver : NULL,
                        'uuid_unit' => $this->no_polisi,
                        'uuid_penyewa' => $this->nik,
                        'uuid_user' => $idLogin,
                    ],
                    'transaction' => [
                        'uuid' => Uuid::uuid4()->toString(),
                        'debit' => $this->bayar,
                        'kredit' => 0,
                        'keterangan' => 'Penyewaan Unit',
                        'uuid_spk' => $this->uuid,
                        'uuid_user' => $idLogin
                    ]
                ]);
                break;

            case 'Update':
                $bayar = $this->old_store + $this->bayar;
                $idLogin = Auth::user()->uuid;
                $this->merge([
                    'spks' => [
                        'uuid' => $this->uuid,
                        'data' => [
                            'store_payment' => $bayar,
                            'metode_pay' => $this->metode_pembayaran,
                            'status' => 'T'
                        ]
                    ],
                    'transaction' => [
                        'uuid' => $this->uuid_transaction,
                        'debit' => $this->bayar,
                        'kredit' => 0,
                        'keterangan' => 'Pembayaran Penywaan',
                        'uuid_spk' => $this->uuid,
                        'uuid_user' => $idLogin
                    ]
                ]);
                break;

            case 'Penyelesaian':
                $totalStore = $this->old_store + $this->pembayaran;
                $totalPayment = $this->denda + $this->total_pembayaran + $this->kerusakan + $this->bbm;
                $idUser = Auth::user()->uuid;
                $this->merge([
                    'spks' => [
                        'uuid' => $this->uuid,
                        'data' => [
                            'total_payment' => $totalPayment,
                            'store_payment' => $totalStore,
                            'denda' => $this->denda,
                            'kerusakan' => $this->kerusakan,
                            'bbm' => $this->bbm,
                            'km_kembali' => $this->km_kembali,
                            'status' => $this->status,
                        ]
                    ],
                    'cars' => [
                        'uuid' => $this->uuid_unit,
                        'data' => [
                            'status' => 'RD',
                        ]
                    ],
                    'transaction' => [
                        'uuid' => Uuid::uuid4()->toString(),
                        'debit' => $this->pembayaran,
                        'kredit' => 0,
                        'keterangan' => 'Penyelesaian Penyewaan',
                        'uuid_spk' => $this->uuid,
                        'uuid_user' => $idUser,
                    ]
                ]);
                break;

            case 'Perpanjang':
                $oldTgl = new \DateTime($this->old_tgl_kembali);
                $newTgl = new \DateTime($this->tgl_kembali_perpanjang);
                $selisi = $oldTgl->diff($newTgl)->days;
                $newPay = $selisi * intval($this->hr_unit);
                $newTotalPay = intval($this->old_total_pay) + $newPay;
                $this->merge([
                    'uuid' => $this->uuid,
                    'data' => [
                        'tgl_kembali' => $this->tgl_kembali_perpanjang,
                        'total_payment' => $newTotalPay,
                    ]
                ]);
                break;

            case 'Destroy':
                $path = public_path('img/cs/' . $this->old_image);

                if (File::exists($path)) {
                    File::delete($path);
                }
                $this->merge([
                    'user' => [
                        'uuid' => $this->uuid_user,
                    ],
                    'biodatas' => [
                        'uuid' => $this->uuid_bio,
                    ],
                ]);
                break;
        }
    }
}
