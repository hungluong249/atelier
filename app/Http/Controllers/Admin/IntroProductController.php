<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\IntroProduct;

class IntroProductController extends Controller
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
        $detail = IntroProduct::first();
        return view('admin.intro-product.index', ['detail' => $detail]);
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
        $detail = IntroProduct::where('id', $id)->first();
        return view('admin.intro-product.edit', ['detail' => $detail]);
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
        $keys = ['sub_title', 'description'];
        $input = $this->createQueryInput($keys, $request);
        IntroProduct::where('id', $id)
            ->update($input);
        return redirect()->intended('admin/intro-product');
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
            'sub_title' => 'required',
            'description' => 'required',
        ], [
            'sub_title.required' => 'Hightlight không được trống.',
            'description.required' => 'Giới thiệu không được trống.',
        ]);
    }
}
