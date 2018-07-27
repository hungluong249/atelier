<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Validator;
use App\Banner;
use File;

class BannerController extends Controller
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
    public function index()
    {
        $banners = Banner::where('is_deleted', 0)->paginate(10);
        return view('admin.banner.index', ['banners' => $banners]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $count = Banner::where(['is_active' => 1, 'is_deleted' => 0])->count();
        $files = Input::file('image');
        $this->validateInput($request);

        if($request->hasFile('image')){
            $image = $files->hashName();
        }

        $keys = ['title', 'description'];
        $input = $this->createQueryInput($keys, $request);
        $input['image'] = $image;
        if ($count >= 3) {
            $input['is_active'] = 0;
        }
        

        $insert = Banner::create($input);
        if($insert){
            $files->store('banners');
        }

        return redirect()->intended('admin/banner');
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
        $detail = Banner::where(['is_deleted' => 0, 'id' => $id])->first();
        return view('admin.banner.edit', ['detail' => $detail]);
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
        $detail = Banner::where(['is_deleted' => 0, 'id' => $id])->first();
        $files = Input::file('image');
        $path = base_path() . '/storage/app/banners/'. $detail->image;

        $keys = ['title', 'description'];
        $input = $this->createQueryInput($keys, $request);
        if($request->hasFile('image')){
            $image = $files->hashName();
            $input['image'] = $image;
        }

        $update = Banner::where('id', $id)
            ->update($input);

        if($update){
            if($request->hasFile('image')){
                $files->store('banners');
                File::delete($path);
            }
            
        }
        return redirect()->intended('admin/banner');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $detail = Banner::where(['is_deleted' => 0, 'id' => $id])->first();
        if(!$detail){
            return redirect()->intended('admin/banner');
        }
        $path = base_path() . '/storage/app/banners/'. $detail->image;
        if(Banner::where('id', $id)->update(['is_deleted' => 1])){
            File::delete($path);
        }
        return redirect()->intended('admin/banner');
    }

    public function deactive(Request $request)
    {
        $id =  $request->id;
        $detail = Banner::where(['is_deleted' => 0, 'id' => $id])->first();
        $isExist = false;
        if($detail){
            if(Banner::where('id', $id)->update(['is_active' => 0])){
                $isExist = true;
            }
        }
        return response()->json(['isExist' => $isExist, 'status' => '200']); 
    }

    public function active(Request $request)
    {
        $id =  $request->id;
        $count = Banner::where(['is_deleted' => 0, 'is_active' => 1])->count();
        $isExist = false;
        if($count >= 3){
            $isExist = false;
            $message = 'Tối đa chỉ được sử dụng 3 banner. Vui lòng tắt bớt banner sau đó thực hiện lại thao tác!';
        }else{
            $id =  $request->id;
            $detail = Banner::where(['is_deleted' => 0, 'id' => $id])->first();
            if($detail){
                if(Banner::where('id', $id)->update(['is_active' => 1])){
                    $isExist = true;
                    $message = 'Bật banner thành công!';
                }
            }
        }
        
        return response()->json(['isExist' => $isExist, 'message' => $message, 'status' => '200']); 
    }

    private function validateInput($request, $action = '') {
        $rules = [];

        if($action != 'edit'){
            $rules = [
                    'title' => 'required',
                    'description' => 'required',
                    'image' => 'required',
                ];
        }else{
            $rules = [
                    'title' => 'required',
                    'description' => 'required',
                ];
        }
        $this->validate($request, $rules);
    }
}
