<?php

namespace App\Http\Controllers\Dashboard\SPK;

use App\Http\Controllers\Controller;
use App\Repositories\Dashboard\SPK\Laporan\LaporanRepository;

class LaporanController extends Controller
{
    private $laporanRepository;

    public function __construct(LaporanRepository $laporanRepository)
    {
        $this->laporanRepository = $laporanRepository;
    }
    /* ===================== */
    /* | get data          | */
    /* ===================== */
    public function index()
    {
        $data = $this->laporanRepository->getAll();
        return view('dashboard.spk.laporan.index', compact('data'));
    }
    public function detail($id)
    {
        $data = $this->laporanRepository->get($id);
        // return response()->json($data);
        return view('dashboard.spk.laporan.detail', compact('data'));
    }
    public function detailUnit($id)
    {
        return view('dashboard.spk.laporan.unit');
    }
    public function cetak($id)
    {
        return view('dashboard.spk.laporan.cetak');
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
