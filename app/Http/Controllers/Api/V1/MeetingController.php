<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\RestTokenHelper;
use App\Http\Resources\Api\V1\MeetingResource;
use App\Meeting;
use App\Participant;
use App\GroupResponsible;

class MeetingController extends Controller
{
    public function index()
    {
        $user = RestTokenHelper::getAuthUser();
    	$meeting = null;

    	if($user['model'] == Participant::class || $user['model'] == GroupResponsible::class ) {
    		$meeting = $user['user']->group->meeting;
    	}

        return response()->json([
            'meeting' => MeetingResource::make($meeting),
        ], 200);
    }
}

