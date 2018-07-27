<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Response;
use App\Company;

class CompanyController extends Controller
{
    public function fetchCompany()
    {
    	$result = Company::first();
    	if(!$result){
            return response()->json('No item found', 404);
        }
    	return response()->json($result, 200);
    }
}
