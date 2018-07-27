<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Blog;
use App\BlogCategory;
use Response;

class BlogApiController extends Controller
{
    public function __construct(){
        //
    }

    public function fetchAllBlog()
    {
        $slug = Input::get('slug');
        if($slug == ''){
            $result = Blog::where(['is_deleted' => 0, 'is_active' => 1, 'category_active' => 1])->get();
        }else{
            $category = BlogCategory::where(['is_deleted' => 0, 'is_active' => 1, 'slug' => $slug])->first();
            $result = Blog::where(['is_deleted' => 0, 'is_active' => 1, 'category_active' => 1, 'category_id' => $category->id])->get();
        }
        
        if(!$result){
            return response()->json('No item found', 404);
        }
        return response()->json($result, 200);
    }

//    public function fetchTwoBlog()
//    {
//        $result = Blog::where(['is_deleted' => 0, 'is_active' => 1])->orderBy('id','desc')->take(2)->get();
//        if(!$result){
//            return response()->json('No item found', 404);
//        }
//        return response()->json($result, 200);
//    }

    public function detail()
    {
        $slug = Input::get('slug');
        $result = Blog::where(['is_deleted' => 0, 'slug' => $slug])->first();
        if(!$result){
            return response()->json('No item found', 404);
        }
        return response()->json($result, 200);
    }

    public function fetchBlogByCategory(){
        $category = Input::get('category');

        $result = DB::table('blog')
            ->select('blog.*')
            ->join('blog_category', 'blog.category_id', '=', 'blog_category.id')
            ->where('blog_category.slug', '=', $category)
            ->where('blog.is_deleted', '=', 0)
            ->get();
        if(!$result){
            return response()->json('No item found', 404);
        }
        return response()->json($result, 200);
    }

    
}