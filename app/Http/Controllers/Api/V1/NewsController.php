<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\RestTokenHelper;
use App\Http\Resources\Api\V1\NewsResource;
use App\News;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::all()->sortByDesc("id");

        return response()->json([
            'news' => NewsResource::collection($news),
        ], 200);
    }
}

