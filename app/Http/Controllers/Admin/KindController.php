<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use File;
use App\Type;
use App\Kind;
use App\Product;
use Session;

class KindController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function __construct(){
        $this->middleware('auth:admin');
    }


    public function index()
    {
        $kinds = DB::table('kind')
                    ->join('type', 'kind.type_id', '=', 'type.id')
                    ->select('kind.*', 'type.title as type_title')
                    ->where('kind.is_deleted', 0)
                    ->paginate(10);
        return view('admin/kind/index', ['kinds' => $kinds]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type = DB::table('type')->get();
        return view('admin/kind/create', ['type' => $type]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateInput(null,$request);
        $files = Input::file('image');
        $input = $request->all();
        $slug = $request->input('slug');
        $uniqueSlug = $this->buildUniqueSlug('kind', $request->id, $slug);
        $path = base_path() . '/storage/app/kind/';
        $newFolderPath = $this->buildNewFolderPath($path, $files->getClientOriginalName());
        // File::makeDirectory($newFolderPath[1], 0777, true, true);
        if($request->hasFile('image')){
            $image = $newFolderPath[0];
        }

        $data =  ['type_id' => $input['type'],'title' => $input['name'], 'slug' => $uniqueSlug, 'description' => $input['description'], 'is_active' => $input['is_active'], 'image' => $image, 'created_at' => date('Y:m:d H:i:s'), 'updated_at' => date('Y:m:d H:i:s')];
        if(DB::table('kind')->insert($data)){
            $files->move($path,$newFolderPath[0]);
        }
        return redirect()->intended('admin/kind');
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
        $type = DB::table('type')->get();
        $kind = DB::table('kind')->where(['is_deleted' => 0, 'id' => $id])->first();
        return view('admin/kind/edit', ['type' => $type, 'kind' => $kind]);
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
        $this->validateInput($id, $request);
        $kind = Kind::findOrFail($id);
        $path = base_path() . '/storage/app/kind/';
        $input = $request->all();
        $file = null;
        if(Input::file('image')){
            $file = Input::file('image')->getClientOriginalName();
        }

        $detailType = Type::where(['id' => $request->type_id, 'is_deleted' => 0])->first();
        
        // echo $file;die;
        $uniqueSlug = $this->buildUniqueSlug('kind', $request->id, $request->slug);
        $newFolderPath = $this->buildNewFolderPath($path, $file);
        $data =  ['type_id' => $input['type'],'title' => $input['name'], 'slug' => $uniqueSlug, 'description' => $input['description'], 'is_active' => $input['is_active'], 'type_active' => $detailType['is_active'],'updated_at' => date('Y:m:d H:i:s')];
        if(Input::file('image')){
            $data['image'] = $newFolderPath[0];
        }
        if(DB::table('kind')->where('id', $id)->update($data)){
            if($request->is_active == 1){
                Product::where('kind_id', $id)->update(['kind_active' => 1]);
            }else{
                Product::where('kind_id', $id)->update(['kind_active' => 0]);
            }
            if(Input::file('image')){
                File::delete($path.'/'.$kind->image);
                Input::file('image')->move($path, $newFolderPath[0]);
            }
        }
        return redirect()->intended('admin/kind');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $detail = Kind::where('id', $id)->first();
        $path = base_path() . '/storage/app/kind/'. $detail->image;
        if($this->checkActive('product', 'kind_id', $detail)){
            $destroy = Kind::where('id', $id)->update(['is_deleted' => 1]);

            if($destroy){
                File::delete($path);
                Session::flash('success', 'Xóa thành công!');
                return redirect()->intended('admin/kind');
            }
        }
        Session::flash('error', 'Xóa thất bại do dòng sản phẩm nay tồn tại sản phẩm!');
        return redirect()->intended('admin/kind');
    }

    function buildNewFolderPath($path, $fileName){
        $newPath = $path . '/' . $fileName;
        $newName = $fileName;
        $counter = 1;
        while (file_exists($newPath)) {
            $newName = $counter . '-' . $fileName;
            $newPath = $path . '/' . $newName;
            $counter++;
        }

        return array($newName, $newPath);
    }

    /**
     * Search state from database base on some specific constraints
     *
     * @param  \Illuminate\Http\Request  $request
     *  @return \Illuminate\Http\Response
     */
    public function search(Request $request){
        $constraints = [
            'title' => $request['name']
        ];
        $kinds = $this->doSearchingQuery($constraints);

        return view('admin/kind/index', ['kinds' => $kinds, 'searchingVals' => $constraints]);
    }

    private function doSearchingQuery($constraints){
        $query = DB::table('kind')
                ->join('type', 'kind.type_id', '=', 'type.id')
                ->select('kind.*', 'type.title as type_title')
                ->where('kind.is_deleted', 0);
        $fields = array_keys($constraints);
        $index = 0;
        foreach ($constraints as $constraint) {
            if ($constraint != null) {
                $query = $query->where('kind.'.$fields[$index], 'like', '%'.$constraint.'%');
            }

            $index++;
        }
        return $query->paginate(10);
    }

    private function validateInput($id = null, $request) {
        if($id != null){
            $this->validate($request, [
                'name' => 'required|max:255',
                'type' => 'required',
                'slug' => 'required',
            ]);
        }else{
            $this->validate($request, [
                'image' => 'required',
                'image.*' => 'image|mimes:jpg,jpeg,png,gif',
                'type' => 'required',
                'name' => 'required|max:255',
                'slug' => 'required',
            ]);
        }
        
    }
}
