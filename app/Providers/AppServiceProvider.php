<?php

namespace App\Providers;

use App\Repositories\Dashboard\Master\Merk\MerkRepository;
use App\Repositories\Dashboard\Master\Car\CarRepository;
use App\Repositories\Dashboard\Master\User\UserRepository;
use App\Repositories\Dashboard\Master\Customer\CustomerRepository;
use App\Repositories\Dashboard\Master\Customer\CustomerRepositoryImplement;
use App\Repositories\Dashboard\Master\Merk\MerkRepositoryImplement;
use App\Repositories\Dashboard\Master\Car\CarRepositoryImplement;
use App\Repositories\Dashboard\Master\User\UserRepositoryImplement;
use App\Repositories\Pemesanan\PemesananRepository;
use App\Repositories\Pemesanan\PemesananRepositoryImplement;
use App\Repositories\Dashboard\Setting\Company\CompanyRepository;
use App\Repositories\Dashboard\Setting\Company\CompanyRepositoryImplement;
use App\Repositories\Dashboard\SPK\Laporan\LaporanRepository;
use App\Repositories\Dashboard\SPK\Laporan\LaporanRepositoryImplement;
use App\Repositories\Dashboard\SPK\Penyewaan\PenyewaanRepository;
use App\Repositories\Dashboard\SPK\Penyewaan\PenyewaanRepositoryImplement;
use App\Repositories\Dashboard\SPK\RiwayatPenyewaan\RiwayatPenyewaanRepository;
use App\Repositories\Dashboard\SPK\RiwayatPenyewaan\RiwayatPenyewaanRepositoryImplement;
use App\Repositories\Service\Actiovation\ActivationRepository;
use App\Repositories\Service\Actiovation\ActivationRepositoryImplement;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ActivationRepository::class, ActivationRepositoryImplement::class);
        $this->app->bind(MerkRepository::class, MerkRepositoryImplement::class);
        $this->app->bind(CarRepository::class, CarRepositoryImplement::class);
        $this->app->bind(CustomerRepository::class, CustomerRepositoryImplement::class);
        $this->app->bind(UserRepository::class, UserRepositoryImplement::class);
        $this->app->bind(PenyewaanRepository::class, PenyewaanRepositoryImplement::class);
        $this->app->bind(CompanyRepository::class, CompanyRepositoryImplement::class);
        $this->app->bind(RiwayatPenyewaanRepository::class, RiwayatPenyewaanRepositoryImplement::class);
        $this->app->bind(LaporanRepository::class, LaporanRepositoryImplement::class);
        $this->app->bind(PemesananRepository::class, PemesananRepositoryImplement::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
