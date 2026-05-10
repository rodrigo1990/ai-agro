<?php

namespace App\Http\Controllers;

use App\Services\PlotService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PlotController extends Controller
{
    public function __construct(
        private readonly PlotService $service,
    ) {}

    public function getAllPlots(Request $request): JsonResponse
    {
        return response()->json($this->service->getAllPlots($request->user()->id));
    }

    public function getPlot(Request $request, int $id): JsonResponse
    {
        $plot = $this->service->getPlotById($id);

        if ($plot === null) {
            return response()->json(['message' => 'Plot not found'], 404);
        }

        return response()->json($plot);
    }

    public function saveOrUpdate(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'id'               => 'sometimes|nullable|integer',
            'farmer_id'        => 'required|integer|exists:farmers,id',
            'establishment_id' => 'required|integer|exists:establishments,id',
            'name'             => 'required|string|max:255',
            'active'           => 'sometimes|boolean',
            'area'             => 'required|numeric',
            'latitude'         => 'required|numeric',
            'longitude'        => 'required|numeric',
            'external_code'    => 'sometimes|nullable|string|max:100',
            'polygon'          => 'sometimes|nullable|string',
        ]);

        $plot = $this->service->saveOrUpdate($validated);

        if ($plot === null) {
            return response()->json(['message' => 'Plot not found'], 404);
        }

        return response()->json($plot);
    }
}
