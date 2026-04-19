<?php

namespace App\Http\Controllers;

use App\Services\SocietyService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SocietyController extends Controller
{
    public function __construct(
        private readonly SocietyService $service,
    ) {}

    public function getAllSocieties(): JsonResponse
    {
        return response()->json($this->service->getAllSocieties());
    }

    public function getSocietyByAuth(Request $request): JsonResponse
    {
        $society = $this->service->getSocietyByUserId($request->user()->id);

        if (!$society) {
            return response()->json(['message' => 'Society not found'], 404);
        }

        return response()->json($society);
    }

    public function saveSocietyByAuth(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'business_name' => 'required|string|max:255',
            'tax_id'        => 'required|string|max:50',
            'country'       => 'sometimes|string|max:100',
            'logo'          => 'sometimes|nullable|string',
        ]);

        $society = $this->service->saveSocietyByUserId($request->user()->id, $validated);

        return response()->json($society);
    }
}
