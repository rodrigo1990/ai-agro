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

    public function getCropPlan(int $id): JsonResponse
    {
        $cropPlan = $this->service->getCropPlanById($id);

        if (!$cropPlan) {
            return response()->json(['message' => 'Crop plan not found'], 404);
        }

        return response()->json($cropPlan);
    }
}
