<?php

namespace App\Http\Controllers;

use App\Services\FarmerService;
use Illuminate\Http\JsonResponse;

class FarmerController extends Controller
{
    public function __construct(
        private readonly FarmerService $service,
    ) {}

    public function getAllFarmers(): JsonResponse
    {
        return response()->json($this->service->getAllFarmers());
    }
}
