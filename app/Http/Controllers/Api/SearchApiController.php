<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Response;

class SearchApiController extends Controller
{
    public function __construct(){
        //
    }

    public function search(){
        $text = Input::get('searchString');
//        $result = DB::select('SELECT * FROM blog where title LIKE ?', [$text]);




        $blog = DB::table('blog')->select('title', 'slug', 'description', DB::raw('null as name'), 'description', DB::raw('99 as target'))
            ->where('title', 'LIKE', '%' . $text . '%')
            ->where('is_deleted', '=', 0);

        $trend = DB::table('trend')->select('title', 'slug', 'description', DB::raw('null as name'), 'description', DB::raw('98 as target'))
            ->where('title', 'LIKE', '%' . $text . '%')
            ->where('is_deleted', '=', 0);

        $product = DB::table('product')->select(DB::raw('null as title'), 'slug', 'description', 'name', 'description', DB::raw('97 as target'))
            ->where('name', 'LIKE', '%' . $text . '%')
            ->where('is_deleted', '=', 0);

        $result = $blog->unionAll($trend)->unionAll($product)->get();






        if(!$result){
            return response()->json('No item found', 404);
        }
        return response()->json($result, 200);
    }
}
