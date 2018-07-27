<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use File;
use Validator;
use App\Trend;
use App\TrendCategory;

class TrendController extends Controller
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
        $result = Trend::where('is_deleted', 0)->with(['trend_category' => function ($query) {
            $query->where(['is_deleted' => 0]);
        }])->paginate(10);
        return view('admin.trend.index', ['result' => $result]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = TrendCategory::where(['is_deleted' => 0, 'is_active' => 1])->get();
        $newCategories = $this->getCategory($categories);
        return view('admin.trend.create', ['categories' => $newCategories]);
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

        $path = base_path() . '/' . 'storage/app/trends';
        $newFolderPath = $this->buildNewFolderPath($path, $uniqueSlug);
        File::makeDirectory($newFolderPath[1], 0777, true, true);

        $files = $request->file('image');
        foreach ($files as $key => $file) {
            $fileName[$key] = $file->hashName();
            $file->store('trends/' . $newFolderPath[0]);
        }

        $image_json = json_encode($fileName);

        

        $keys = ['category_id', 'title', 'description', 'content', 'is_active'];
        $input = $this->createQueryInput($keys, $request);
        $input['image'] = $image_json;
        $input['slug'] = $uniqueSlug;
        

        $insert = Trend::create($input);
        if(!$insert){
            File::deleteDirectory('storage/app/trends/' . $uniqueSlug);
        }

        return redirect()->intended('admin/trend');
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
        $detail = Trend::where(['is_deleted' => 0, 'id' => $id])->first();
        $categories = TrendCategory::where(['is_deleted' => 0])->get();
        $newCategories = $this->getCategory($categories);
        return view('admin.trend.edit', ['categories' => $newCategories, 'detail' => $detail]);
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
        $this->validateInput($request, 'edit');
        $detail = Trend::where(['is_deleted' => 0, 'id' => $id])->first();
        $uniqueSlug = $this->buildUniqueSlug('trend', $request->id, $request->slug);

        $path = base_path() . '/' . 'storage/app/trends';
        if($request->slug != $detail->slug){
            rename($path . '/' . $detail->slug, $path . '/' . $uniqueSlug);
        };
        $detailCategory = TrendCategory::where(['id' => $request->category_id, 'is_deleted' => 0])->first();

        $keys = ['category_id', 'title', 'description', 'content', 'is_active'];
        $input = $this->createQueryInput($keys, $request);
        $input['slug'] = $uniqueSlug;
        $input['category_active'] = $detailCategory['is_active'];

        $fileName = [];
        $fileName = json_decode($detail->image);
        
        // Upload image
        if($request->file('image')){
            foreach ($request->file('image') as $key => $file) {
                $fileName[] = $file->hashName();
                $file->store('trends/' . $uniqueSlug);
            }
            // print_r($upload);die;
            $image_json = json_encode($fileName);
            $input['image'] = $image_json;
        };

        $update = Trend::where('id', $id)
            ->update($input);

        if(!$update){
            foreach ($request->file('image') as $key => $value) {
                Storage::files($value->hashName());
            }
        }

        return redirect()->intended('admin/trend');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = Trend::where('id', $id)->update(['is_deleted' => 1]);
        if($destroy){
            return redirect()->intended('admin/trend');
        }
    }

    private function validateInput($request, $action = '') {
        $rules = [];

        if($action != 'edit'){
            $rules = [
                    'category_id' => 'required',
                    'title' => 'required',
                    'slug' => 'required',
                    'image' => 'required',
                ];
        }else{
            $rules = [
                    'category_id' => 'required',
                    'title' => 'required',
                    'slug' => 'required',
                ];
        }
        $this->validate($request, $rules);
    }

    function buildNewFolderPath($path, $fileName){
        $newPath = $path . '/' . $fileName;
        $newName = $fileName;
        $counter = 1;
        while (is_dir($newPath)) {
            $newName = $fileName . '-' . $counter;
            $newPath = $path . '/' . $newName;
            $counter++;
        }

        return array($newName, $newPath);
    }

    public function list_image($upload) {
        $files = Input::file('image');
        $file_count = count($files);
        $uploadcount = 0;

        $list_image = [];
        foreach($files as $file) {
            $rules = array('file' => 'required');
            $validator = Validator::make(array('file'=> $file), $rules);
            if($validator->passes()){
                $filename = $file->getClientOriginalName();
                $uploadcount ++;
                $list_image[] = $filename;
            }
        }
        return $list_image;
    }

    public function getCategory($categories){
        $arrayCategories = [];
        foreach($categories as $item){
            $arrayCategories[$item->id] = $item->title;
        }

        return $arrayCategories;
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
        $result = $this->doSearchingQuery($constraints);
        // dd($result);die;

        return view('admin/trend/index', ['result' => $result, 'searchingVals' => $constraints]);
    }

    private function doSearchingQuery($constraints){
        $query = Trend::where('is_deleted', 0)
            ->with('trend_category');
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

    public function delete_image(Request $request){
        $image = $request->image;
        $id = $request->id;
        $path = base_path() . '/storage/app/trends/';
        $trend = Trend::findOrFail($id);


        $upload = [];
        $upload = json_decode($trend->image);
        $key = array_search($image, $upload);
        unset($upload[$key]);
        $newUpload = [];
        foreach ($upload as $key => $value) {
            $newUpload[] = $value;
        }
        
        $image_json = json_encode($newUpload);
        $result = DB::table('trend')
            ->where('id', $id)
            ->update(['image' => $image_json]);
        if($result){
            File::delete($path.$trend->slug.'/'.$image);
            $success = true;
        }
        return response()->json(['image_json' => $image_json, 'status' => '200']); 
        
    }
}
