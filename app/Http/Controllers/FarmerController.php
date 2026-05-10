<?php

namespace App\Http\Controllers;

use App\Services\FarmerService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FarmerController extends Controller
{
    public function __construct(
        private readonly FarmerService $service,
    ) {}

    public function getAllFarmers(Request $request): JsonResponse
    {
        return response()->json($this->service->getAllFarmers($request->user()->id));
    }


    public function getFarmer(Request $request, int $id): JsonResponse
    {
        $farmer = $this->service->getFarmerById($id);

        if ($farmer === null) {
            return response()->json(['message' => 'Farmer not found'], 404);
        }

        return response()->json($farmer);
    }

    public function saveOrUpdate(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'id'            => 'sometimes|nullable|integer',
            'name'          => 'required|string|max:255',
            'last_name'     => 'required|string|max:255',
            'tax_id'        => 'required|string|max:50',
            'external_code' => 'sometimes|nullable|string|max:100',
            'notes'         => 'sometimes|nullable|string',
        ]);

        $farmer = $this->service->saveOrUpdate($request->user()->id, $validated);

        if ($farmer === null) {
            return response()->json(['message' => 'Society not found'], 404);
        }

        return response()->json($farmer);
    }
}
