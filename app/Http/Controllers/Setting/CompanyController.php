<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Http\Requests\Setting\CompanyRequest;
use App\Repositories\Dashboard\Setting\Company\CompanyRepository;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CompanyController extends Controller
{
    private $companyrepository;

    public function __construct(CompanyRepository $companyrepository)
    {
        $this->companyrepository = $companyrepository;
    }
    /* ===================== */
    /* | get data          | */
    /* ===================== */
    public function index()
    {
        $data = $this->companyrepository->getAll();

        // return response()->json($data);
        return view('dashboard.setting.company.index', compact('data'));
    }
    /* ===================== */
    /* | end get data      | */
    /* ===================== */

    /* ===================== */
    /* | store data        | */
    /* ===================== */
    /* ===================== */
    /* | end store data    | */
    /* ===================== */

    /* ===================== */
    /* | update data       | */
    /* ===================== */

    public function update(CompanyRequest $r)
    {
        $respon = $this->companyrepository->update('uuid', $r->uuid, $r->data);
        // return response()->json($r);

        if ($respon ==  1) {
            Alert::success('Berhasil', 'Brand berhasil diperbarui...!!');
            return redirect()->route('db.setting.company');
        } else {
            Alert::error('Gagal',  'Brand gagal diperbarui...!!');
            return redirect()->back();
        }
    }
    /* ===================== */
    /* | end update data   | */
    /* ===================== */

    /* ===================== */
    /* | destroy data      | */
    /* ===================== */
    /* ===================== */
    /* | end destroy data  | */
    /* ===================== */
}
