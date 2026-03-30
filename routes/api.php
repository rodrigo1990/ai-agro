<?php

use App\Http\Controllers\CampaignController;
use App\Http\Controllers\ContractorController;
use App\Http\Controllers\CropPlanController;
use App\Http\Controllers\EstablishmentController;
use App\Http\Controllers\FarmerController;
use App\Http\Controllers\LaborTypeController;
use App\Http\Controllers\PlotController;
use App\Http\Controllers\SocietyController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

Route::get('/societies',     [SocietyController::class,     'getAllSocieties']);
Route::get('/farmers',       [FarmerController::class,       'getAllFarmers']);
Route::get('/establishments',[EstablishmentController::class,'getAllEstablishments']);
Route::get('/plots',         [PlotController::class,         'getAllPlots']);
Route::get('/crop-plans',    [CropPlanController::class,     'getAllCropPlans']);
Route::get('/campaigns',     [CampaignController::class,     'getAllCampaigns']);
Route::get('/contractors',   [ContractorController::class,   'getAllContractors']);
Route::get('/labor-types',   [LaborTypeController::class,    'getAllLaborTypes']);
Route::get('/tags',          [TagController::class,          'getAllTags']);
