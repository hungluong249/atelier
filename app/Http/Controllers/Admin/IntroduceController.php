<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Introduce;
use File;
use Illuminate\Support\Facades\Storage;

class IntroduceController extends Controller
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
        $result = Introduce::where('is_deleted', 0)->paginate(10);
        return view('admin.introduce.index', ['result' => $result]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.introduce.create');
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
        $uniqueSlug = $this->buildUniqueSlug('introduce', null, $request->slug);

        $path = $request->file('image')->store('introduce');

        $keys = ['title', 'content'];
        $input = $this->createQueryInput($keys, $request);
        $input['image'] = $path;
        $input['slug'] = $uniqueSlug;

        $insert = Introduce::create($input);
        if(!$insert){
            Storage::delete($path);
        }

        return redirect()->intended('admin/introduce');
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
        $detail = Introduce::where(['is_deleted' => 0, 'id' => $id])->first();
        // echo '<pre>';
        // dd($detail->toArray());die;
        return view('admin.introduce.edit', ['detail' => $detail]);
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
        $detail = Introduce::where(['is_deleted' => 0, 'id' => $id])->first();
        $uniqueSlug = $this->buildUniqueSlug('introduce', $request->id, $request->slug);
        $keys = ['title', 'content'];
        $input = $this->createQueryInput($keys, $request);
        $input['slug'] = $uniqueSlug;

        if($request->file('image')){
            $path = $request->file('image')->store('introduce');
            $input['image'] = $path;
        }

        $update = Introduce::where('id', $id)
            ->update($input);

        if(!$update){
            Storage::delete($path);
        }else{
            Storage::delete($detail['image']);
        }

        return redirect()->intended('admin/introduce');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = Introduce::where('id', $id)->update(['is_deleted' => 1]);
        if($destroy){
            return redirect()->intended('admin/introduce');
        }
    }

    private function validateInput($request, $action = '') {
        $rules = [];

        if($action != 'edit'){
            $rules = [
                    'title' => 'required',
                    'slug' => 'required',
                    'image' => 'required',
                ];
        }else{
            $rules = [
                    'title' => 'required',
                    'slug' => 'required',
                ];
        }
        $this->validate($request, $rules);
    }
}
