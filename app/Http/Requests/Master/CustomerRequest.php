<?php

namespace App\Http\Requests\Master;

use Illuminate\Foundation\Http\FormRequest;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\File;

class CustomerRequest extends FormRequest
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
                    'nik' => 'required',
                    'fullname' => 'required',
                    'tmpt_lahir' => 'required',
                    'tgl_lahir' => 'required',
                    'alamat' => 'required',
                    'pekerjaan' => 'required',
                    'notelp' => 'required|numeric',
                    'notelp_kerabat' => 'required|numeric',
                ];

            case 'Update':
                return [
                    'uuid' => 'required',
                    'old_image' => 'required',
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
                if ($this->foto_ktp == null) {
                    $name = Null;
                } else {
                    $file = $this->foto_ktp;
                    $extention = $file->getClientOriginalExtension();
                    $name = 'cs' . time() . '.' . $extention;
                    $file->move(public_path('img/cs'), $name);
                }

                $this->merge([
                    'user' => [
                        'uuid' => $this->uuid,
                        'username' => $this->notelp,
                        'password' => bcrypt('rentcar'),
                        'status' => 'T',
                        'role' => 5,
                    ],
                    'biodatas' => [
                        'uuid' => Uuid::uuid4()->toString(),
                        'uuid_user' => $this->uuid,
                        'ktp' => $this->nik,
                        'fullname' => $this->fullname,
                        'tmpt_lahir' => $this->tmpt_lahir,
                        'tgl_lahir' => $this->tgl_lahir,
                        'alamat' => $this->alamat,
                        'pekerjaan' => $this->pekerjaan,
                        'email' => isset($this->email) ? $this->email : null,
                        'notelp' => $this->notelp,
                        'notelp_kerabat' => $this->notelp_kerabat,
                        'foto_ktp' => $name,
                    ],
                ]);
                break;

            case 'Update':
                if ($this->foto_ktp == null) {
                    $this->merge([
                        'uuid' => $this->uuid,
                        'data' => [
                            'ktp' => $this->nik,
                            'fullname' => $this->fullname,
                            'tmpt_lahir' => $this->tmpt_lahir,
                            'tgl_lahir' => $this->tgl_lahir,
                            'alamat' => $this->alamat,
                            'pekerjaan' => $this->pekerjaan,
                            'email' => $this->email,
                            'notelp' => $this->notelp,
                            'notelp_kerabat' => $this->notelp_kerabat,
                        ]
                    ]);
                } else {
                    $file = $this->foto_ktp;

                    $path = public_path('img/cs/' . $this->old_image);

                    if (File::exists($path)) {
                        File::delete($path);
                    }

                    $extention = $file->getClientOriginalExtension();
                    $name = 'cs' . time() . '.' . $extention;
                    $file->move(public_path('img/cs'), $name);

                    $this->merge([
                        'uuid' => $this->uuid,
                        'data' => [
                            'ktp' => $this->nik,
                            'fullname' => $this->fullname,
                            'tmpt_lahir' => $this->tmpt_lahir,
                            'tgl_lahir' => $this->tgl_lahir,
                            'alamat' => $this->alamat,
                            'pekerjaan' => $this->pekerjaan,
                            'email' => $this->email,
                            'notelp' => $this->notelp,
                            'notelp_kerabat' => $this->notelp_kerabat,
                            'foto_ktp' => $name,
                        ]
                    ]);
                }

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
