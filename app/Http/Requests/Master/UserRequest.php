<?php

namespace App\Http\Requests\Master;

use Illuminate\Foundation\Http\FormRequest;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\File;

class UserRequest extends FormRequest
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
                    'fullname' => 'required',
                    'username' => 'required',
                    'notelp' => 'required|numeric',
                    'alamat' => 'required',
                    'role' => 'required',
                    'image' => 'required|mimes:png,jpg,jpeg',
                ];
                break;

            case 'Update':
                return [
                    'IDUser' => 'required',
                    'IDBio' => 'required',
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
                $file = $this->image;
                $extention = $file->getClientOriginalExtension();
                $name = 'user' . time() . '.' . $extention;
                $file->move(public_path('img/user'), $name);

                $this->merge([
                    'user' => [
                        'uuid'          => $this->uuid,
                        'username'      => $this->username,
                        'password'      => bcrypt('rentcar'),
                        'status'        => 'T',
                        'role'          => $this->role,
                    ],
                    'biodatas' => [
                        'uuid'          => Uuid::uuid4()->toString(),
                        'uuid_user'     => $this->uuid,
                        'fullname'      => $this->fullname,
                        'alamat'      => $this->alamat,
                        'email'         => isset($this->email) ? $this->email : null ,
                        'notelp'        => $this->notelp,
                        'profile'        => $name,
                    ],
                ]);
                break;

            case 'Update':
                if (!isset($this->image)) {
                    $this->merge([
                        'user' => [
                            'uuid' => $this->IDUser,
                            'data' => [
                                'username' => $this->username,
                                'role' => $this->role,
                            ]
                        ],
                        'biodatas' => [
                            'uuid' => $this->IDBio,
                            'data' => [
                                'fullname'      => $this->fullname,
                                'alamat'      => $this->alamat,
                                'email'         => $this->email,
                                'notelp'        => $this->notelp,
                            ]
                        ]
                    ]);
                } else {
                    $file = $this->image;

                    $path = public_path('img/cs/' . $this->old_image);

                    if (File::exists($path)) {
                        File::delete($path);
                    }

                    $extention = $file->getClientOriginalExtension();
                    $name = 'user' . time() . '.' . $extention;
                    $file->move(public_path('img/user'), $name);

                    $this->merge([
                        'user' => [
                            'uuid' => $this->IDUser,
                            'data' => [
                                'username' => $this->username,
                                'role' => $this->role,
                            ]
                        ],
                        'biodatas' => [
                            'uuid' => $this->IDBio,
                            'data' => [
                                'fullname'      => $this->fullname,
                                'alamat'      => $this->alamat,
                                'email'         => $this->email,
                                'notelp'        => $this->notelp,
                                'profile'        => $name,
                            ]
                        ]
                    ]);
                }
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
