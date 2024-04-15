<?php

namespace App\Http\Controllers\Dashboard\Master;

use App\Http\Controllers\Controller;
use App\Http\Requests\Master\CarRequest;
use App\Repositories\Dashboard\Master\Car\CarRepository;
use App\Repositories\Dashboard\Master\Merk\MerkRepository;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Car;

class MobilController extends Controller
{
    private $mobilRepository;

    public function __construct(CarRepository $mobilRepository)
    {
        $this->mobilRepository = $mobilRepository;
    }

    /* ===================== */
    /* | get data          | */
    /* ===================== */
    public function index()
    {
        $data = $this->mobilRepository->getAll();

        return view('dashboard.master.mobil.index', compact('data'));
    }

    public function add(MerkRepository $brandRepository)
    {
        $brand = $brandRepository->getAll();
        return view('dashboard.master.mobil.add', compact('brand'));
    }

    public function detail(MerkRepository $brandRepository ,$uuid)
    {
        $data['brand'] = $brandRepository->getAll();
        $data['mobil'] = $this->mobilRepository->getDetail($uuid);

        // return response()->json($data);
        return view('dashboard.master.mobil.detail', compact('data'));
    }

    public function edit(MerkRepository $brandRepository ,$uuid)
    {
        $data['brand'] = $brandRepository->getAll();
        $data['mobil'] = $this->mobilRepository->get($uuid);

        return view('dashboard.master.mobil.edit',  compact('data'));
    }
    /* ===================== */
    /* | end get data      | */
    /* ===================== */

    /* ===================== */
    /* | store data        | */
    /* ===================== */
    public function store(CarRequest $r)
    {
        $response = $this->mobilRepository->store($r->all());

        if (isset($response->uuid)){
            Alert::success('Berhasil', 'Mobil berhasil ditambahkan...!!');
            return redirect()->route('db.master.mobil');
        } else {
            Alert::error('Gagal',  'Mobil gagal ditambahkan...!!');
            return redirect()->back();
        }
    }
    /* ===================== */
    /* | end store data    | */
    /* ===================== */

    /* ===================== */
    /* | update data       | */
    /* ===================== */
    public function update(CarRequest $r)
    {
        $respon = $this->mobilRepository->update('uuid', $r->uuid, $r->data);

        if ($respon ==  1){
            Alert::success('Berhasil', 'Mobil berhasil diperbarui...!!');
            return redirect()->route('db.master.mobil');
        } else {
            Alert::error('Gagal',  'Mobil gagal diperbarui...!!');
            return redirect()->back();
        }
    }
    /* ===================== */
    /* | end update data   | */
    /* ===================== */

    /* ===================== */
    /* | destroy data      | */
    /* ===================== */
    public function destroy(CarRequest $r)
    {
        $respon = $this->mobilRepository->destroy('uuid',$r->uuid);

        if ($respon ==  1){
            Alert::success('Berhasil', 'Mobil berhasil dihapus...!!');
            return redirect()->route('db.master.mobil');
        } else {
            Alert::error('Gagal',  'Mobil gagal dihapus...!!');
            return redirect()->back();
        }
    }
    /* ===================== */
    /* | end destroy data  | */
    /* ===================== */
}
