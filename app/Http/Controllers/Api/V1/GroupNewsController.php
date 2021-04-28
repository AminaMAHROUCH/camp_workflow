<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\RestTokenHelper;
use App\Http\Resources\Api\V1\GroupNewsResource;
use App\GroupNews;
use App\Participant;
use App\GroupResponsible;

class GroupNewsController extends Controller
{
    public function index()
    {
    	 
    	$user = RestTokenHelper::getAuthUser();
    	$groupNews = [];

    	if($user['model'] == Participant::class) {
    		$groupNews = $user['user']->group->responsible->groupNews;
    	} elseif($user['model'] == GroupResponsible::class) {
    		$groupNews = $user['user']->groupNews;
    	}

        return response()->json([
            'groupNews' => GroupNewsResource::collection($groupNews),
        ], 200);
    }
}

