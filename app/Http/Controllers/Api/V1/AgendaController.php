<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\RestTokenHelper;
use App\Http\Resources\Api\V1\AgendaResource;
use App\Http\Resources\Api\V1\GroupResource;
use App\Agenda;
use App\Group;

class AgendaController extends Controller
{
    public function index()
    {
        $agenda = Agenda::today()->get();

        return response()->json([
            'agenda' => AgendaResource::collection($agenda),
        ], 200);
    }

    //group
    public function allGroup()
    {
        $groups = Group::all();

        return response()->json([
            'groups' => GroupResource::collection($groups),
        ], 200);
    }
}