<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\TrendCategory;
use App\Trend;
use App\Type;
use Session;
use File;


class TrendCategoryController extends Controller
{
    /**
     * [__construct description]
     */
    public function __construct(){
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = DB::table('trend_category')
            ->select('*')
            ->where('is_deleted', 0)
            ->paginate(10);
        return view('admin/trend-category/index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.trend-category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateInput($request);
        $uniqueSlug = $this->buildUniqueSlug('trend_category', null, $request->slug);
        $path = $request->file('image')->store('trend-category');
        $keys = ['title', 'image', 'description', 'is_active'];
        $input = $this->createQueryInput($keys, $request);
        $input['image'] = $path;
        $input['slug'] = $uniqueSlug;

        TrendCategory::create($input);

        return redirect()->intended('admin/trend-category');
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
    public function edit($id)
    {
        $detail = TrendCategory::where(['is_deleted' => 0, 'id' => $id])->first();
        return view('admin.trend-category.edit', ['detail' => $detail]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validateInput($request);
        $detail = TrendCategory::where(['is_deleted' => 0, 'id' => $id])->first();
        $oldImage = ltrim($detail['image'], 'trend-category/');
        // echo $oldImage;die;
        $uniqueSlug = $this->buildUniqueSlug('trend_category', $id, $request->slug);
        $keys = ['title', 'description', 'is_active'];
        $input = $this->createQueryInput($keys, $request);
        $input['slug'] = $uniqueSlug;
        if($request->image){
            $path = $request->file('image')->store('trend-category');
            $input['image'] = $path;
        }
        $update = TrendCategory::where('id', $id)
            ->update($input);
        if($update){
            if($request->is_active == 1){
                Trend::where('category_id', $id)->update(['category_active' => 1]);
            }else{
                Trend::where('category_id', $id)->update(['category_active' => 0]);
            }
            $exists = File::exists('storage/app/' . $detail['image']);
            if($request->image && $exists){
                Storage::delete($detail['image']);
            }
        }
        return redirect()->intended('admin/trend-category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $detail = TrendCategory::where('id', $id)->first();
        if($this->checkActive('trend', 'category_id', $detail)){
            $destroy = TrendCategory::where('id', $id)->update(['is_deleted' => 1]);

            if($destroy){
                Session::flash('success', 'Xóa thành công!');
                return redirect()->intended('admin/trend-category');
            }
        }
        Session::flash('error', 'Xóa thất bại do danh mục nay tồn tại bài viết!');
        return redirect()->intended('admin/trend-category');
    }

    private function validateInput($request) {
        $this->validate($request, [
            'title' => 'required',
        ]);
    }

    /**
     * [search description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function search(Request $request){
        $constraints = [
            'title' => $request['name']
        ];
        $categories = $this->doSearchingQuery($constraints);

        return view('admin/trend-category/index', ['categories' => $categories, 'searchingVals' => $constraints]);
    }

    private function doSearchingQuery($constraints){
        $query = DB::table('trend_category')
            ->select('*')
            ->where('is_deleted', 0);
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
}
