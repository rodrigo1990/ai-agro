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
}
