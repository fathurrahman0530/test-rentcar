<?php

namespace App\Http\Controllers\Dashboard\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Master\CustomerRequest;
use App\Repositories\Dashboard\Master\Customer\CustomerRepository;
use RealRashid\SweetAlert\Facades\Alert;

class PelangganController extends Controller
{
    private $customerRepository;

    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    /* ===================== */
    /* | get data          | */
    /* ===================== */
    public function index()
    {
        $response = $this->customerRepository->getAll();

        // return response()->json($response);
        return view('dashboard.master.pelanggan.index', compact('response'));
    }
    public function add()
    {
        return view('dashboard.master.pelanggan.add');
    }
    public function detail($id)
    {
        $data['pelanggan'] = $this->customerRepository->get($id);
        $data['spk'] = $this->customerRepository->getSpk($id);
        // return response()->json($data);

        return view('dashboard.master.pelanggan.detail', compact('data'));
    }
    public function edit($id)
    {
        $data = $this->customerRepository->getDetail($id);

        return view('dashboard.master.pelanggan.edit', compact('data'));
    }
    /* ===================== */
    /* | end get data      | */
    /* ===================== */

    /* ===================== */
    /* | store data        | */
    /* ===================== */
    public function store(CustomerRequest $r)
    {
        $responUser = $this->customerRepository->store($r->user);
        $responBiodata = $this->customerRepository->storeBio($r->biodatas);

        if (isset($responUser->uuid) && isset($responBiodata->uuid)) {
            Alert::success('Berhasil', 'Brand berhasil ditambahkan...!!');
            return redirect()->route('db.master.pelanggan');
        } else {
            Alert::error('Gagal',  'Brand gagal ditambahkan...!!');
            return redirect()->back();
        }
    }
    public function storePenyewa(CustomerRequest $r)
    {
        $responUser = $this->customerRepository->store($r->user);
        $responBiodata = $this->customerRepository->storeBio($r->biodatas);

        if (isset($responUser->uuid) && isset($responBiodata->uuid)) {
            Alert::success('Berhasil', 'Brand berhasil ditambahkan...!!');
            return redirect()->back();
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
    public function update(CustomerRequest $r)
    {
        $response = $this->customerRepository->update('uuid', $r->uuid, $r->data);

        if ($response ==  1) {
            Alert::success('Berhasil', 'Brand berhasil diperbarui...!!');
            return redirect()->route('db.master.pelanggan');
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
    public function destroy(CustomerRequest $r)
    {
        // dd($r->all());
        $responseBio = $this->customerRepository->destroy('uuid', $r->biodatas['uuid']);
        $responseUser = $this->customerRepository->destroyUser('uuid', $r->user['uuid']);


        if ($responseBio ==  1 && $responseUser == 1) {
            Alert::success('Berhasil', 'Brand berhasil dihapus...!!');
            return redirect()->route('db.master.pelanggan');
        } else {
            Alert::error('Gagal',  'Brand gagal dihapus...!!');
            return redirect()->back();
        }
    }
    /* ===================== */
    /* | end destroy data  | */
    /* ===================== */
}
