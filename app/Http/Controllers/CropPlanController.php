<?php

namespace App\Http\Controllers;

use App\Services\CropPlanService;
use Illuminate\Http\JsonResponse;

class CropPlanController extends Controller
{
    public function __construct(
        private readonly CropPlanService $service,
    ) {}

    public function getAllCropPlans(): JsonResponse
    {
        return response()->json($this->service->getAllCropPlans());
    }
}
