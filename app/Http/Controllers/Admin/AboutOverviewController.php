<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Overview;
use File;

class AboutOverviewController extends Controller
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
        $detail = Overview::first();
        return view('admin.about-overview.index', ['detail' => $detail]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $detail = Overview::where('id', $id)->first();
        return view('admin.about-overview.edit', ['detail' => $detail]);
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
        $detail = Overview::where('id', $id)->first();
        $data = ['description' => $request->description];

        $files1 = Input::file('image_1');
        $files2 = Input::file('image_2');

        $path1 = base_path() . '/storage/app/about-overview/'. $detail->image_one;
        $path2 = base_path() . '/storage/app/about-overview/'. $detail->image_two;

        if($request->hasFile('image_1')){
            $image1 = $files1->hashName();
            $data['image_one'] = $image1;
        }

        if($request->hasFile('image_2')){
            $image2 = $files2->hashName();
            $data['image_two'] = $image2;
        }

        if(Overview::where('id', $id)->update($data)){
            if($request->hasFile('image_1')){
                $files1->store('about-overview');
                File::delete($path1);
            }

            if($request->hasFile('image_1')){
                $files2->store('about-overview');
                File::delete($path2);
            }
            
        }

        return redirect()->intended('admin/about-overview');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function validateInput($request) {
        $this->validate($request, [
            'description' => 'required|max:500',
        ], [
            'description.required' => 'Giới thiệu không được trống.',
            'description.max' => 'Giới thiệu không được quá 500 kí tự.'
        ]);
    }
}
