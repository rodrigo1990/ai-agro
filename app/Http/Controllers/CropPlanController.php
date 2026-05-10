<?php

namespace App\Http\Controllers;

use App\Services\CropPlanService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

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

        if ($cropPlan === null) {
            return response()->json(['message' => 'Crop plan not found'], 404);
        }

        return response()->json($cropPlan);
    }

    public function saveOrUpdate(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'id'                       => 'sometimes|nullable|integer',
            'crop'                     => 'required|string|max:255',
            'sowing_season'            => 'required|string|max:255',
            'cycle'                    => 'required|string|max:255',
            'reference_name'           => 'required|string|max:255',
            'variety_hybrid'           => 'sometimes|nullable|string|max:255',
            'sowing_distance_cm'       => 'sometimes|nullable|numeric',
            'target_density_seeds_ha'  => 'sometimes|nullable|numeric',
            'target_density_kg_ha'     => 'sometimes|nullable|numeric',
            'target_sowing_date'       => 'sometimes|nullable|date',
            'active'                   => 'sometimes|boolean',
        ]);

        $cropPlan = $this->service->saveOrUpdate($validated);

        if ($cropPlan === null) {
            return response()->json(['message' => 'Crop plan not found'], 404);
        }

        return response()->json($cropPlan);
    }
}
