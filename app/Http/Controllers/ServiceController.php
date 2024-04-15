<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Spk;
use App\Repositories\Dashboard\Master\Car\CarRepository;
use App\Repositories\Dashboard\Master\Customer\CustomerRepository;
use App\Repositories\Dashboard\SPK\Penyewaan\PenyewaanRepository;
use App\Repositories\Service\Actiovation\ActivationRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    private $activationRepository;

    public function __construct(ActivationRepository $activationRepository)
    {
        $this->activationRepository = $activationRepository;
    }

    public function index()
    {
        $getData = $this->activationRepository->cek();

        $now = Carbon::now()->toDateString();

        if ($getData->expired == $now) {
            $data = [
                'expired' => 'X',
            ];

            $this->activationRepository->update($getData->uuid, $data);
        }
    }

    public function getPelanggan(CustomerRepository $customerRepository, $id)
    {
        $data = $customerRepository->get($id);

        return response()->json($data);
    }
    public function getMobil(CarRepository $carRepository, $id)
    {
        $data = $carRepository->get($id);

        Car::where('uuid', $id)->update(['status' => 'BK']);

        return response()->json($data);
    }

    public function cekBook()
    {

    }

    public function getBookingMobil(PenyewaanRepository $penyewaanRepository)
    {
        $respon = $penyewaanRepository->getMobil();

        $data = "<option value=''>- No. Polisi -</option";
        foreach ($respon as $r) {
            if (old('no_polisi') == $r->uuid) {
                $data .= "<option value='" . $r->uuid . "' selected>" . $r->plat . "|" . $r->brand_name . "|" . $r->name . "</option>";
            } else {
                $data .= "<option value='" . $r->uuid . "'>" . $r->plat . "|" . $r->brand_name . "|" . $r->name . "</option>";
            }
        }

        return response()->json($data);
    }

    public function getTagihan($id)
    {
        $query = Spk::selectRaw('SUM(total_payment - store_payment) as total')->where('uuid_penyewa', $id)->first()->total;

        return response()->json($query);
    }
}
