<?php

namespace App\Http\Controllers\Dashboard\SPK;

use App\Http\Controllers\Controller;
use App\Http\Requests\PenyewaanRequest;
use App\Models\Spk;
use App\Repositories\Dashboard\Master\Car\CarRepository;
use App\Repositories\Dashboard\Master\Merk\MerkRepository;
use App\Repositories\Dashboard\Setting\Company\CompanyRepository;
use App\Repositories\Dashboard\SPK\Penyewaan\PenyewaanRepository;

//use http\Client\Request;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use PDF;

class PenyewaanController extends Controller
{
    private $penyewaanRepository;

    public function __construct(PenyewaanRepository $penyewaanRepository)
    {
        $this->penyewaanRepository = $penyewaanRepository;
    }

    /* ===================== */
    /* | get data          | */
    /* ===================== */
    public function index()
    {
        $data = $this->penyewaanRepository->getAll();

        /*return response()->json($data);*/
        return view('dashboard.spk.penyewaan.index', compact('data'));
    }

    public function add(MerkRepository $brandRepository)
    {
        $data['mobil'] = $this->penyewaanRepository->getMobil();
        $data['pelanggan'] = $this->penyewaanRepository->getPelanggan();
        $data['lastNoSpk'] = $this->penyewaanRepository->getLastNoSPK();
        $data['brand'] = $brandRepository->getAll();
        // return response()->json($data);
        return view('dashboard.spk.penyewaan.add', compact('data'));
    }

    public function detail($id)
    {
        $data = $this->penyewaanRepository->getDetail($id);
//        return response()->json($data);
        return view('dashboard.spk.penyewaan.detail', compact('data'));
    }

    public function cetak(Request $r, CompanyRepository $companyRepository, $id)
    {
        $this->penyewaanRepository->update('uuid', $id, ['km_awal' => $r->km_ambil]);

        $data['penyewa'] = $this->penyewaanRepository->getDetail($id);
        $data['spk'] = $this->penyewaanRepository->getDetail($id);
        $data['company'] = $companyRepository->getAll();
        $data['request'] = $r->all();

        return view('dashboard.spk.cetak', compact('data'));
    }
    /* ===================== */
    /* | end get data      | */
    /* ===================== */

    /* ===================== */
    /* | store data        | */
    /* ===================== */
    public function store(PenyewaanRequest $r)
    {
        $reponse = $this->penyewaanRepository->store($r->data);
        $reponseTransaction = $this->penyewaanRepository->storeTransaction($r->transaction);

        if (isset($reponse->uuid) && isset($reponseTransaction->uuid)) {
            Alert::success('Berhasil', 'Brand berhasil ditambahkan...!!');
            return redirect()->route('db.spk.penyewaan');
        } else {
            Alert::error('Gagal', 'Brand gagal ditambahkan...!!');
            return redirect()->back();
        }
    }
    /* ===================== */
    /* | end store data    | */
    /* ===================== */

    /* ===================== */
    /* | update data       | */
    /* ===================== */
    public function update(PenyewaanRequest $r)
    {
        // return response()->json($r->all());
        $response = $this->penyewaanRepository->update('uuid', $r->spks['uuid'], $r->spks['data']);
        $reponseTransaction = $this->penyewaanRepository->storeTransaction($r->transaction);

        if ($respon == 1 && isset($reponseTransaction->uuid)) {
            Alert::success('Berhasil', 'Brand berhasil diUpdate...!!');
            return redirect()->route('db.spk.penyewaan');
        } else {
            Alert::error('Gagal', 'Brand gagal diUpdate...!!');
            return redirect()->back();
        }
    }

    public function perpanjangan(PenyewaanRequest $r)
    {
        $response = $this->penyewaanRepository->update('uuid', $r->uuid, $r->data);

        if ($response == 1) {
            Alert::success('Berhasil', 'Brand berhasil diUpdate...!!');
            return redirect()->back();
        } else {
            Alert::error('Gagal', 'Brand gagal diUpdate...!!');
            return redirect()->back();
        }
    }

    public function finish(PenyewaanRequest $r, CarRepository $carRepository)
    {
        $responseSPKS = $this->penyewaanRepository->update('uuid', $r->spks['uuid'], $r->spks['data']);
        $responseCar = $carRepository->update('uuid', $r->cars['uuid'], $r->cars['data']);
        $responseTransaction = $this->penyewaanRepository->storeTransaction($r->transaction);

        if ($responseSPKS == 1 && $responseCar == 1 && isset($responseTransaction->uuid)) {
            Alert::success('Berhasil', 'Penyewaan telah selesai');
            return redirect()->route('db.spk.penyewaan');
        } else {
            Alert::error('Gagal', 'Penyewaan belum selesai');
            return redirect()->route('db.spk.penyewaan');
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
