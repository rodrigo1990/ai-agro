<?php

namespace App\Http\Controllers;

use App\Services\TagService;
use Illuminate\Http\JsonResponse;

class TagController extends Controller
{
    public function __construct(
        private readonly TagService $service,
    ) {}

    public function getAllTags(): JsonResponse
    {
        return response()->json($this->service->getAllTags());
    }
}
