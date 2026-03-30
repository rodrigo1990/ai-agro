<?php

namespace App\Providers;

use App\Repositories\CampaignRepository;
use App\Repositories\ContractorRepository;
use App\Repositories\Contracts\CampaignRepositoryInterface;
use App\Repositories\Contracts\ContractorRepositoryInterface;
use App\Repositories\Contracts\CropPlanRepositoryInterface;
use App\Repositories\Contracts\EstablishmentRepositoryInterface;
use App\Repositories\Contracts\FarmerRepositoryInterface;
use App\Repositories\Contracts\LaborTypeRepositoryInterface;
use App\Repositories\Contracts\PlotRepositoryInterface;
use App\Repositories\Contracts\SocietyRepositoryInterface;
use App\Repositories\Contracts\TagRepositoryInterface;
use App\Repositories\CropPlanRepository;
use App\Repositories\EstablishmentRepository;
use App\Repositories\FarmerRepository;
use App\Repositories\LaborTypeRepository;
use App\Repositories\PlotRepository;
use App\Repositories\SocietyRepository;
use App\Repositories\TagRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(SocietyRepositoryInterface::class,      SocietyRepository::class);
        $this->app->bind(FarmerRepositoryInterface::class,       FarmerRepository::class);
        $this->app->bind(EstablishmentRepositoryInterface::class, EstablishmentRepository::class);
        $this->app->bind(PlotRepositoryInterface::class,         PlotRepository::class);
        $this->app->bind(CropPlanRepositoryInterface::class,     CropPlanRepository::class);
        $this->app->bind(CampaignRepositoryInterface::class,     CampaignRepository::class);
        $this->app->bind(ContractorRepositoryInterface::class,   ContractorRepository::class);
        $this->app->bind(LaborTypeRepositoryInterface::class,    LaborTypeRepository::class);
        $this->app->bind(TagRepositoryInterface::class,          TagRepository::class);
    }

    public function boot(): void
    {
        //
    }
}
