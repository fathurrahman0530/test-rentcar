<?php

namespace App\Http\Controllers\Dashboard\SPK;

use App\Http\Controllers\Controller;
use App\Http\Requests\PemesananRequest;
use App\Http\Requests\PenyewaanRequest;
use App\Repositories\Dashboard\SPK\Penyewaan\PenyewaanRepository;
use App\Repositories\Pemesanan\PemesananRepository;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    private $pemesananRepository;

    public function __construct(PemesananRepository $pemesananRepository)
    {
        $this->pemesananRepository = $pemesananRepository;
    }


    public function index()
    {
        $data = $this->pemesananRepository->getAll();
        return view('dashboard.spk.request.index', compact('data'));
    }

    public function update(PemesananRequest $r)
    {
        $data = $this->pemesananRepository->update($r->uuid, $r->data);
        Alert::success('Berhasil', 'Proses berhasil dilakukan...!!');
        return redirect()->back();
    }
}
