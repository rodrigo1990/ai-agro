<?php

namespace App\Http\Controllers;

use App\Services\EstablishmentService;
use Illuminate\Http\JsonResponse;

class EstablishmentController extends Controller
{
    public function __construct(
        private readonly EstablishmentService $service,
    ) {}

    public function getAllEstablishments(): JsonResponse
    {
        return response()->json($this->service->getAllEstablishments());
    }
}
