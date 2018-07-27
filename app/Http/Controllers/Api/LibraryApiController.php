<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Response;
use App\Library;
use App\Image;

class LibraryApiController extends Controller
{
    public function __construct(){
        //
    }

    public function fetchAllLibrary(){
        $result = Library::where('is_deleted', 0)->orderBy('id', 'desc')->take(10)->get()->toArray();
	    foreach ($result as $key => $value) {
            $image = Image::where('library_id', $value['id'])->orderBy('sort', 'asc')->first();
	        $result[$key]['image'] = $image['image'];
	    }
        if(!$result){
            return response()->json('No item found', 404);
        }
        return response()->json($result, 200);
    }

    public function detail(){
    	$slug = Input::get('slug');
    	$library = DB::table('library')
            ->select('*')
            ->where('slug', '=', $slug)
            ->first();

        $images = DB::table('image')
            ->select('*')
            ->where('library_id', $library->id)
            ->orderBy('sort', 'asc')
            ->get();
        $library->image = $images;
        if(!$library){
            return response()->json('No item found', 404);
        }
        return response()->json($library, 200);
    }
}
