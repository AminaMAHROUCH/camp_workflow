<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\RestTokenHelper;
use App\Http\Resources\Api\V1\ResponsibleNewsResource;
use App\ResponsibleNews;
use App\GroupResponsible;
use App\Responsible;

class ResponsibleNewsController extends Controller
{
    public function index()
    {
        //$responsibleNews = ResponsibleNews::all()->sortByDesc("published_at");
        $user = RestTokenHelper::getAuthUser();
    	$responsibleNews = [];

    	if($user['model'] == GroupResponsible::class) {
    		$responsibleNews = $user['user']->responsible->responsibleNews->sortByDesc("id");
    	} elseif($user['model'] == Responsible::class) {
            $responsibleNews = $user['user']->responsibleNews->sortByDesc("id");
        }

        return response()->json([
            'responsibleNews' => ResponsibleNewsResource::collection($responsibleNews),
        ], 200);
    }
}

