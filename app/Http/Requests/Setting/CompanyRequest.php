<?php

namespace App\Http\Requests\Setting;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\File;

class CompanyRequest extends FormRequest
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
            case 'Update':
                return [
                    'uuid' => 'required',
                    'old_icon' => 'required',
                    'old_logo' => 'required',
                ];
        }
    }

    protected function passedValidation()
    {
        switch ($this->act) {
            case 'Update':
                if ($this->icon == null && $this->logo == null) {
                    $this->merge([
                        'uuid' => $this->uuid,
                        'data' => [
                            'name' => $this->name,
                            'telp' => $this->telp,
                            'fax' => $this->fax,
                            'email' => $this->email,
                            'alamat' => $this->alamat,
                            'maps' => $this->maps,
                            'mobile_1' => $this->mobile_1,
                            'zona' => $this->zona,
                            'mobile_2' => $this->mobile_2,
                        ]
                    ]);
                } elseif ($this->icon != null) {
                    $file = $this->icon;
                    $path = public_path('img/icon/' . $this->old_icon);
                    // dd($file);

                    if (File::exists($path)) {
                        File::delete($path);
                    }

                    $extention = $file->getClientOriginalExtension();
                    $name = 'icon' . time() . '.' . $extention;
                    $file->move(public_path('img/icon'), $name);

                    $this->merge([
                        'uuid' => $this->uuid,
                        'data' => [
                            'name' => $this->name,
                            'telp' => $this->telp,
                            'fax' => $this->fax,
                            'email' => $this->email,
                            'maps' => $this->maps,
                            'alamat' => $this->alamat,
                            'mobile_1' => $this->mobile_1,
                            'mobile_2' => $this->mobile_2,
                            'zona' => $this->zona,
                            'icon' => $name,
                        ]
                    ]);
                } elseif ($this->logo != null) {
                    $file = $this->logo;

                    $path = public_path('img/logo/' . $this->old_logo);

                    if (File::exists($path)) {
                        File::delete($path);
                    }

                    $extention = $file->getClientOriginalExtension();
                    $name = 'logo' . time() . '.' . $extention;
                    $file->move(public_path('img/logo'), $name);

                    $this->merge([
                        'uuid' => $this->uuid,
                        'data' => [
                            'name' => $this->name,
                            'telp' => $this->telp,
                            'fax' => $this->fax,
                            'email' => $this->email,
                            'maps' => $this->maps,
                            'alamat' => $this->alamat,
                            'mobile_1' => $this->mobile_1,
                            'mobile_2' => $this->mobile_2,
                            'zona' => $this->zona,
                            'logo' => $name,
                        ]
                    ]);
                } else {
                    $file = $this->icon;
                    $fileLogo = $this->logo;

                    $path = public_path('img/icon/' . $this->old_icon);
                    $pathLogo = public_path('img/logo/' . $this->old_logo);

                    if (File::exists($path) && File::exists($pathLogo)) {
                        File::delete($path);
                        File::delete($pathLogo);
                    }

                    $extention = $file->getClientOriginalExtension();
                    $extentionLogo = $fileLogo->getClientOriginalExtension();
                    $name = 'icon' . time() . '.' . $extention;
                    $nameLogo = 'logo' . time() . '.' . $extentionLogo;
                    $file->move(public_path('img/icon'), $name);
                    $fileLogo->move(public_path('img/logo'), $nameLogo);

                    $this->merge([
                        'data' => [
                            'name' => $this->name,
                            'telp' => $this->telp,
                            'fax' => $this->fax,
                            'email' => $this->email,
                            'alamat' => $this->alamat,
                            'maps' => $this->maps,
                            'mobile_1' => $this->mobile_1,
                            'mobile_2' => $this->mobile_2,
                            'zona' => $this->zona,
                            'icon' => $name,
                            'logo' => $nameLogo,
                        ]
                    ]);
                }
                break;
        }
    }
}
