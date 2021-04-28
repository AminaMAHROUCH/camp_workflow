<?php

namespace App\Http\Controllers\Admin;
use DB;
use App\Participant;
use App\Workshop;

class HomeController
{
    public function index()
    {
    	$Participants = DB::table('participants')
            ->count();
        $Workshops = DB::table('workshops')
            ->count();
        return view('home', compact('Participants','Workshops'));
    }
}

