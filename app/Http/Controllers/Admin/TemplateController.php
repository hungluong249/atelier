<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Template;
use Session;

class TemplateController extends Controller
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
        $templates = DB::table('template')->where('is_deleted', 0)->paginate(10);
        return view('admin.template.index', ['templates' => $templates]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.template.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->name ==null){
            Session::flash('error', 'Vui lòng nhập đầy đủ thông tin!');
            return back();
        }
        $data = [
            'name' => $request->name,
            'title' => json_encode(array_values($request->title))
        ];
        DB::table('template')->insert($data);
        Session::flash('success', 'Thêm Mới Thành Công!');
        return redirect()->intended('admin/template');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detail = Template::find($id);
        $detail['title'] = json_decode($detail['title']);
        return view('admin.template.detail', ['detail' => $detail]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $detail = Template::find($id);
        $detail['title'] = json_decode($detail['title']);
        return view('admin.template.edit', ['detail' => $detail]);
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
        if($request->name ==null){
            Session::flash('error', 'Vui lòng nhập đầy đủ thông tin!');
            return back();
        }
        $data = [
            'name' => $request->name,
            'title' => json_encode(array_values($request->title))
        ];

        Template::where('id', $id)
            ->update($data);
        Session::flash('success', 'Cập Nhật Thành Công!');
        return redirect()->intended('admin/template');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = ['is_deleted' => 1];
        Template::where('id', $id)->update($data);
        Session::flash('success', 'Xóa Thành Công Cấu Hình!');
        return redirect()->intended('admin/template');
    }

    public function search(Request $request){
        $constraints = [
            'name' => $request['name']
        ];
        $templates = $this->doSearchingQuery($constraints);

        return view('admin/template/index', ['templates' => $templates, 'searchingVals' => $constraints]);
    }

    private function doSearchingQuery($constraints){
        $query = DB::table('template')
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

