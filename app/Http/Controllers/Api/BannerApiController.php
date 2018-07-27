<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Banner;

class BannerApiController extends Controller
{
    public function fetchBanners()
    {
    	$result = Banner::where(['is_deleted' => 0, 'is_active' => 1])->get();
    	if(!$result){
            return response()->json('No item found', 404);
        }
        return response()->json($result, 200);
    }
}
