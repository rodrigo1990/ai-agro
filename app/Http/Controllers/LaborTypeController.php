<?php

namespace App\Http\Controllers;

use App\Services\LaborTypeService;
use Illuminate\Http\JsonResponse;

class LaborTypeController extends Controller
{
    public function __construct(
        private readonly LaborTypeService $service,
    ) {}

    public function getAllLaborTypes(): JsonResponse
    {
        return response()->json($this->service->getAllLaborTypes());
    }
}
