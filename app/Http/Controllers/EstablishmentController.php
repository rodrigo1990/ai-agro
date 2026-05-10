<?php

namespace App\Http\Controllers;

use App\Services\EstablishmentService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class EstablishmentController extends Controller
{
    public function __construct(
        private readonly EstablishmentService $service,
    ) {}

    public function getAllEstablishments(): JsonResponse
    {
        return response()->json($this->service->getAllEstablishments());
    }

    public function getEstablishment(Request $request, int $id): JsonResponse
    {
        $establishment = $this->service->getEstablishmentById($id);

        if ($establishment === null) {
            return response()->json(['message' => 'Establishment not found'], 404);
        }

        return response()->json($establishment);
    }

    public function saveOrUpdate(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'id'            => 'sometimes|nullable|integer',
            'farmer_id'     => 'required|integer|exists:farmers,id',
            'name'          => 'required|string|max:255',
            'external_code' => 'sometimes|nullable|string|max:100',
            'locality'      => 'sometimes|nullable|string|max:255',
            'latitude'      => 'required|numeric',
            'longitude'     => 'required|numeric',
            'active'        => 'sometimes|boolean',
        ]);

        $establishment = $this->service->saveOrUpdate($validated);

        if ($establishment === null) {
            return response()->json(['message' => 'Establishment not found'], 404);
        }

        return response()->json($establishment);
    }
}
