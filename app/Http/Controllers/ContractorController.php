<?php

namespace App\Http\Controllers;

use App\Services\ContractorService;
use Illuminate\Http\JsonResponse;

class ContractorController extends Controller
{
    public function __construct(
        private readonly ContractorService $service,
    ) {}

    public function getAllContractors(): JsonResponse
    {
        return response()->json($this->service->getAllContractors());
    }
}
