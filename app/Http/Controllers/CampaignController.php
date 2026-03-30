<?php

namespace App\Http\Controllers;

use App\Services\CampaignService;
use Illuminate\Http\JsonResponse;

class CampaignController extends Controller
{
    public function __construct(
        private readonly CampaignService $service,
    ) {}

    public function getAllCampaigns(): JsonResponse
    {
        return response()->json($this->service->getAllCampaigns());
    }
}
