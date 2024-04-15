<?php

namespace App\Http\Requests\Master;

use Illuminate\Foundation\Http\FormRequest;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\File;

class CarRequest extends FormRequest
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
                    'brand' => 'required',
                    'name' => 'required',
                    'thn_mobil' => 'required',
                    'no_polisi' => 'required',
                    'harga' => 'required|numeric',
                    'kondisi' => 'required',
                    'foto' => 'required|mimes:png,jpg,jpeg',
                ];

            case 'Update':
                return [
                    'uuid' => 'required',
                    'brand' => 'required',
                    'old_image' => 'required',
                    'status' => 'required'
                ];

            case 'Ready':
                return [
                    'uuid' => 'required',
                    'status' => 'required',
                ];

            case 'Booking':
                return [
                    'uuid' => 'required',
                    'status' => 'required',
                ];

            case 'Destroy':
                return [
                    'uuid' => 'required'
                ];
        }
    }

    protected function passedValidation()
    {
        switch ($this->act) {
            case 'Store':
                $file = $this->foto;
                $extention = $file->getClientOriginalExtension();
                $name = 'car' . time() . '.' . $extention;
                $file->move(public_path('img/car'), $name);

                $this->merge([
                    'uuid' => $this->uuid,
                    'uuid_brand' => $this->brand,
                    'name' => $this->name,
                    'tahun' => $this->thn_mobil,
                    'plat' => $this->no_polisi,
                    'kondisi' => $this->kondisi,
                    'harga' => $this->harga,
                    'image' => $name,
                    'status' => "RD",
                ]);

                unset($this['brand']);
                unset($this['thn_mobil']);
                unset($this['no_polisi']);
                unset($this['foto']);
                break;

            case 'Update':
                 $status = $this->kondisi == 'S' ? 'BK' : 'RD';
                if ($this->foto == null) {
                    $this->merge([
                        'uuid' => $this->uuid,
                        'data' => [
                            'uuid_brand' => $this->brand,
                            'name' => $this->merk,
                            'tahun' => $this->thn_mobil,
                            'plat' => $this->no_polisi,
                            'kondisi' => $this->kondisi,
                            'harga' => $this->harga,
                            'status' => $status
                        ]
                    ]);

                    unset($this['brand']);
                    unset($this['thn_mobil']);
                    unset($this['no_polisi']);
                } else {
                    $file = $this->foto;

                    $path = public_path('img/car/' . $this->old_image);

                    if (File::exists($path)) {
                        File::delete($path);
                    }

                    $extention = $file->getClientOriginalExtension();
                    $name = 'car' . time() . '.' . $extention;
                    $file->move(public_path('img/car'), $name);

                    $this->merge([
                        'uuid' => $this->uuid,
                        'data' => [
                            'uuid_brand' => $this->brand,
                            'name' => $this->merk,
                            'tahun' => $this->thn_mobil,
                            'plat' => $this->no_polisi,
                            'kondisi' => $this->kondisi,
                            'harga' => $this->harga,
                            'image' => $name,
                            'status' => $status
                        ]
                    ]);

                    unset($this['brand']);
                    unset($this['thn_mobil']);
                    unset($this['no_polisi']);
                    unset($this['foto']);
                }
                break;

            case 'Ready':
                $this->merge([
                    'uuid' => $this->uuid,
                    'data' => [
                        'status' => $this->status
                    ]
                ]);
                break;

            case 'Booking':
                $this->merge([
                    'uuid' => $this->uuid,
                    'data' => [
                        'status' => $this->status
                    ]
                ]);
                break;

            case 'Destroy':
                $path = public_path('img/car/' . $this->old_image);

                if (File::exists($path)) {
                    File::delete($path);
                }
                $this->merge([
                    'uuid' => $this->uuid,
                ]);
                break;
        }
    }
}
