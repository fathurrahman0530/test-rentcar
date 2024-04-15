<?php

namespace App\Http\Controllers\Dashboard\Master;

use App\Http\Controllers\Controller;
use App\Http\Requests\Master\MerkRequest;
use App\Repositories\Dashboard\Master\Merk\MerkRepository;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class MerkController extends Controller
{
    private $merkRepository;

    public function __construct(MerkRepository $merkRepository)
    {
        $this->merkRepository = $merkRepository;
    }

    /* ===================== */
    /* | get data          | */
    /* ===================== */
    public function index()
    {
        $data = $this->merkRepository->getAll();

        return view('dashboard.master.merk.index', compact('data'));
    }

    public function detail($id)
    {
        return view('dashboard.master.merk.detail');
    }
    /* ===================== */
    /* | end get data      | */
    /* ===================== */

    /* ===================== */
    /* | store data        | */
    /* ===================== */
    public function store(MerkRequest $r)
    {
        $response = $this->merkRepository->store($r->all());

        if (isset($response->uuid)) {
            Alert::success('Berhasil', 'Brand berhasil ditambahkan...!!');
            return redirect()->route('db.master.merk');
        } else {
            Alert::error('Gagal',  'Brand gagal ditambahkan...!!');
            return redirect()->back();
        }
    }
    /* ===================== */
    /* | end store data    | */
    /* ===================== */

    /* ===================== */
    /* | update data       | */
    /* ===================== */
    public function update(MerkRequest $r)
    {
        $response = $this->merkRepository->update('uuid', $r->uuid, $r->data);

        if ($response == 1) {
            Alert::success('Berhasil', 'Brand berhasil diperbarui...!!');
            return redirect()->route('db.master.merk');
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
    public function destroy(MerkRequest $r)
    {
        $response = $this->merkRepository->destroy('uuid', $r->uuid);

        if ($response == 1) {
            Alert::success('Berhasil', 'Brand berhasil dihapus...!!');
            return redirect()->route('db.master.merk');
        } else {
            Alert::error('Gagal',  'Brand gagal dihapus...!!');
            return redirect()->back();
        }
    }
    /* ===================== */
    /* | end destroy data  | */
    /* ===================== */
}
