<?php

namespace App\Http\Requests\Install;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;

class InstallRequest extends FormRequest
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
                    'uuid' => Uuid::uuid4()->toString()
                ]);
                break;
        }
    }

    public function rules(): array
    {
        switch ($this->act){
            case 'Store':
                return [
                    'company'   => 'required',
                    'username'  => 'required',
                    'password'  => 'required|min:8',
                    'email'     => 'required',
                    'notelp'    => 'required',
                    'status'    => 'required',
                ];

            case 'Update':
                return [
                    'uuid'      => 'required',
                    'status'    => 'required',
                    'verify'    => 'required',
                ];
        }
    }

    protected function passedValidation()
    {
        switch ($this->act){
            case 'Store':
                $code = Str::random(6);
                $ip = $this->ip();

                if ($this->status == 'D'){
                    $paket = 'Demo 30 Hari';
                } elseif ($this->status == 'M'){
                    $paket = 'Langganan 6 Bulan';
                } elseif ($this->status == 'T'){
                    $paket = 'Langganan 1 Tahun';
                }

                $this->merge([
                    'data'  => [
                        'ip'            => $ip,
                        'uuid'          => $this->uuid,
                        'name'          => $this->company,
                        'username'      => $this->username,
                        'password'      => $this->password,
                        'email'         => $this->email,
                        'notelp'        => $this->notelp,
                        'paket'         => $paket,
                        'status'        => $this->status,
                        'verify'        => $code,
                    ],
                    'activ'  => [
                        'uuid'          => $this->uuid,
                        'company'       => $this->company,
                        'username'      => $this->username,
                        'password'      => $this->password,
                        'email'         => $this->email,
                        'notelp'        => $this->notelp,
                        'status'        => 'P',
                        'verify'        => $code,
                    ],
                    'user'      => [
                        'uuid'          => $this->uuid,
                        'username'      => $this->username,
                        'password'      => Hash::make($this->password),
                        'status'        => 'F',
                        'role'          => 2,
                    ],
                    'biodatas'  => [
                        'uuid'          => Uuid::uuid4()->toString(),
                        'fullname'      => $this->company,
                        'email'         => $this->email,
                        'notelp'        => $this->notelp,
                        'uuid_user'     => $this->uuid,
                    ],
                    'company' => [
                        'uuid' => Uuid::uuid4()->toString(),
                        'name' => $this->company,
                        'mobile_1' => $this->notelp,
                        'email' => $this->email
                    ],
                ]);
                break;

            case 'Update':
                $now = Carbon::now();
                if ($this->status == 'D'){
                    $expired = $now->addDay(30);
                } elseif ($this->status == 'M'){
                    $expired = $now->addMonth(6);
                } elseif ($this->status == 'T'){
                    $expired = $now->addYear(1);
                }

                $this->merge([
                    'uuid' => $this->uuid,
                    'data' => [
                        'status' => $this->status,
                        'verify' => $this->verify,
                        'expired' => $expired->toDateString(),
                    ],
                ]);
                break;
        }
    }
}
