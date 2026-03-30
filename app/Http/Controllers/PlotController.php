<?php

namespace App\Http\Controllers;

use App\Services\PlotService;
use Illuminate\Http\JsonResponse;

class PlotController extends Controller
{
    public function __construct(
        private readonly PlotService $service,
    ) {}

    public function getAllPlots(): JsonResponse
    {
        return response()->json($this->service->getAllPlots());
    }
}
