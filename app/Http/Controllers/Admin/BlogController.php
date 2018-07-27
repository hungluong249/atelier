<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Blog;
use App\BlogCategory;
use Response;
use File;

class BlogController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $result = Blog::where('is_deleted', 0)->paginate(10);
        // echo '<pre>';
        // print_r($result->toArray());die;
        return view('admin.blog.index', ['result' => $result]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param int $type
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $categories = BlogCategory::where(['is_deleted' => 0, 'is_active' => 1])->get();
        $newCategories = $this->getCategory($categories);
        return view('admin.blog.create', ['categories' => $newCategories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $this->validateInput($request);
        $uniqueSlug = $this->buildUniqueSlug('blog_category', null, $request->slug);

        $path = $request->file('image')->store('blogs');
        $keys = ['title', 'description', 'content', 'is_active'];
        $input = $this->createQueryInput($keys, $request);
        $input['image'] = $path;
        $input['slug'] = $uniqueSlug;
        

        $insert = Blog::create($input);
        if(!$insert){
            File::deleteDirectory('storage/app/blogs/' . $uniqueSlug);
        }

        return redirect()->intended('admin/blog');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $detail = Blog::where(['is_deleted' => 0, 'id' => $id])->first();
        $categories = BlogCategory::where(['is_deleted' => 0])->get();
        $newCategories = $this->getCategory($categories);
        return view('admin.blog.edit', ['categories' => $newCategories, 'detail' => $detail]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $this->validateInput($request, 'edit');
        $detail = Blog::where(['is_deleted' => 0, 'id' => $id])->first();
        $uniqueSlug = $this->buildUniqueSlug('blog', $id, $request->slug);

        $keys = ['title', 'description', 'content', 'is_active'];
        $input = $this->createQueryInput($keys, $request);
        $input['slug'] = $uniqueSlug;

        // Upload image
        if($request->file('image')){
            $path = $request->file('image')->store('blogs');
            $input['image'] = $path;
        }

        Blog::where('id', $id)
            ->update($input);

        return redirect()->intended('admin/blog');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $destroy = Blog::where('id', $id)->update(['is_deleted' => 1]);
        if($destroy){
            return redirect()->intended('admin/blog');
        }
    }

    public function search(Request $request){
        $constraints = [
            'title' => $request['name']
        ];
        $result = $this->doSearchingQuery($constraints);
        // dd($result);die;

        return view('admin/blog/index', ['result' => $result, 'searchingVals' => $constraints]);
    }

    private function doSearchingQuery($constraints){
        $query = Blog::where('is_deleted', 0)
            ->with('blog_category');
        $fields = array_keys($constraints);
        $index = 0;
        foreach ($constraints as $constraint) {
            if ($constraint != null) {
                $query = $query->where($fields[$index], 'like', '%'.$constraint.'%');
            }

            $index++;
        }
        return $query->paginate(10);
    }

    public function getCategory($categories){
        $arrayCategories = [];
        foreach($categories as $item){
            $arrayCategories[$item->id] = $item->title;
        }

        return $arrayCategories;
    }

    private function validateInput($request) {
        $this->validate($request, [
            'title' => 'required',
        ]);
    }
}
