<?php

namespace App\Http\Controllers\Dashboard\SPK;

use App\Http\Controllers\Controller;
use App\Http\Requests\RiwayatPenyewaan;
use App\Repositories\Dashboard\SPK\Penyewaan\PenyewaanRepository;
use App\Repositories\Dashboard\SPK\RiwayatPenyewaan\RiwayatPenyewaanRepository;
use RealRashid\SweetAlert\Facades\Alert;

class RiwayatController extends Controller
{
    private $riwayatpenyewaanRepository;

    public function __construct(RiwayatPenyewaanRepository $riwayatpenyewaanRepository)
    {
        $this->riwayatpenyewaanRepository = $riwayatpenyewaanRepository;
    }

    /* ===================== */
    /* | get data          | */
    /* ===================== */
    public function index()
    {
        $data = $this->riwayatpenyewaanRepository->getAll();
        return view('dashboard.spk.riwayat.index', compact('data'));
    }
    public function detail($id)
    {
        $data = $this->riwayatpenyewaanRepository->getDetail($id);
        // return response()->json($data);
        return view('dashboard.spk.riwayat.detail', compact('data'));
    }
    public function cetak($id)
    {
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
    public function tagihan(PenyewaanRepository $penyewaanRepository, RiwayatPenyewaan $r)
    {
        $responseRiwayat = $this->riwayatpenyewaanRepository->update('uuid', $r->spks['uuid'], $r->spks['data']);
        $responseTransaction = $penyewaanRepository->storeTransaction($r->transaction);

        if ($responseRiwayat == 1 && isset($responseTransaction->uuid)){
            Alert::success('Berhasil', 'Pembayaran tagihan berhasil...!!!');
            return redirect()->back();
        } else {
            Alert::error('Gagal', 'Pembayaran tagihan gagal...!!!');
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
