<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\IntroProduct;

class IntroProductApiController extends Controller
{
    public function fetchIntroProduct()
    {
    	$result = IntroProduct::first();
    	if(!$result){
            return response()->json('No item found', 404);
        }
    	return response()->json($result, 200);
    }
}
