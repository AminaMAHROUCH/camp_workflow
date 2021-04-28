<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\RestTokenHelper;
use App\Http\Resources\Api\V1\LinkResource;
use App\Link;

class LinkController extends Controller
{
    public function index()
    {
    	
    	$link=Link::find(1);

        return response()->json([
            'link' => LinkResource::make($link),
        ], 200);
    }
}

