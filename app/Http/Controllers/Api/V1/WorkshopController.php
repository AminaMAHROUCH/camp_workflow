<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\RestTokenHelper;
use App\Http\Resources\Api\V1\WorkshopResource;
use App\Workshop;
use App\WorkshopResponsible;

class WorkshopController extends Controller
{
    public function index()
    {
        

 
        $user = RestTokenHelper::getAuthUser();
    	$workshops = [];

    	if($user['model'] == WorkshopResponsible::class) {
    		$workshops = $user['user']->workshops->sortByDesc("start_at");
    	} else {
    		$workshops = Workshop::all()->sortByDesc("start_at");
    	}

        return response()->json([
            'workshops' => WorkshopResource::collection($workshops),
        ], 200);
    }
    
    public function show($id)
    { 
        $user = RestTokenHelper::getAuthUser();
        $workshop = null;

        if($user['model'] == WorkshopResponsible::class) {
            $workshop = $user['user']->workshops()->where('id', $id)->get();
        } else {
            $workshop = Workshop::find($id);
        }

        return response()->json([
            'workshop' => WorkshopResource::make($workshop),
        ], 200);
    }
}

