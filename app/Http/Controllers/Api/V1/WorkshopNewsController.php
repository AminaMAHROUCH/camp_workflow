<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\RestTokenHelper;
use App\Http\Resources\Api\V1\WorkshopNewsResource;
use App\WorkshopNews;

class WorkshopNewsController extends Controller
{
    public function index()
    {
        $workshopNews = WorkshopNews::all();

        return response()->json([
            'workshopNews' => WorkshopNewsResource::collection($workshopNews),
        ], 200);
    }
}

