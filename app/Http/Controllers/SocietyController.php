<?php

namespace App\Http\Controllers;

use App\Services\SocietyService;
use Illuminate\Http\JsonResponse;

class SocietyController extends Controller
{
    public function __construct(
        private readonly SocietyService $service,
    ) {}

    public function getAllSocieties(): JsonResponse
    {
        return response()->json($this->service->getAllSocieties());
    }
}
