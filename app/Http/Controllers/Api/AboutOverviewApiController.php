<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Response;
use App\Overview;

class AboutOverviewApiController extends Controller
{
    public function fetchAboutOverview()
    {
    	$result = Overview::first();
    	if(!$result){
            return response()->json('No item found', 404);
        }
    	return response()->json($result, 200);
    }
}
