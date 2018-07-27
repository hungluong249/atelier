<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use File;
use Session;
use App\Type;
use App\Kind;
use App\Product;

class TypeController extends Controller
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
        $type = DB::table('type')->where('is_deleted', 0)->paginate(10);
        return view('admin/type/index', ['type' => $type]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/type/create');
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
        $uniqueSlug = $this->buildUniqueSlug('type', $request->id, $slug);
        $path = base_path() . '/storage/app/type/';
        $newFolderPath = $this->buildNewFolderPath($path, $files->getClientOriginalName());
        // File::makeDirectory($newFolderPath[1], 0777, true, true);
        if($request->hasFile('image')){
            $image = $newFolderPath[0];
        }
        $data =  ['title' => $input['name'], 'slug' => $uniqueSlug, 'description' => $input['description'], 'is_active' => $input['is_active'], 'image' => $image, 'created_at' => date('Y:m:d H:i:s')];
        if(DB::table('type')->insert($data)){
            $files->move($path,$newFolderPath[0]);
        }
        return redirect()->intended('admin/type');
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
        $type = Type::find($id);
        return view('admin/type/edit', ['type' => $type]);
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
        $type = Type::findOrFail($id);
        $path = base_path() . '/storage/app/type/';
        $input = $request->all();
        $file = null;
        if(Input::file('image')){
            $file = Input::file('image')->getClientOriginalName();
        }
        // echo $file;die;
        $uniqueSlug = $this->buildUniqueSlug('type', $request->id, $request->slug);
        $newFolderPath = $this->buildNewFolderPath($path, $file);
        $data = ['title' => $input['name'], 'slug' => $uniqueSlug, 'description' => $input['description'], 'is_active' => $input['is_active'],'updated_at' => date('Y:m:d H:i:s')];
        if(Input::file('image')){
            $data['image'] = $newFolderPath[0];
        }
        if(DB::table('type')->where('id', $id)->update($data)){
            if($request->is_active == 1){
                Kind::where('type_id', $id)->update(['type_active' => 1]);
                Product::where('type_id', $id)->update(['type_active' => 1]);
            }else{
                Kind::where('type_id', $id)->update(['type_active' => 0]);
                Product::where('type_id', $id)->update(['type_active' => 0]);
            }
            if(Input::file('image')){
                File::delete($path.'/'.$type->image);
                Input::file('image')->move($path, $newFolderPath[0]);
            }
        }
        return redirect()->intended('admin/type');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $detail = Type::where('id', $id)->first();
        $path = base_path() . '/storage/app/type/'. $detail->image;
        if($this->checkActive('product', 'type_id', $detail, 'kind')){
            $destroy = Type::where('id', $id)->update(['is_deleted' => 1]);

            if($destroy){
                File::delete($path);
                Session::flash('success', 'Xóa thành công!');
                return redirect()->intended('admin/type');
            }
        }
        Session::flash('error', 'Xóa thất bại do loại sản phẩm nay tồn tại dòng sản phẩm hoặc sản phẩm!');
        return redirect()->intended('admin/type');
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
        $types = $this->doSearchingQuery($constraints);

        return view('admin/type/index', ['type' => $types, 'searchingVals' => $constraints]);
    }

    private function doSearchingQuery($constraints){
        $query = DB::table('type')
                ->select('*');
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

    private function validateInput($id = null, $request) {
        // echo 'required|unique:product, id, ' . $id . '|max:255';die;
        if($id != null){
            $this->validate($request, [
                'name' => 'required|max:255',
                'slug' => 'required',
            ]);
        }else{
            $this->validate($request, [
                'image' => 'required',
                'image.*' => 'image|mimes:jpg,jpeg,png,gif',
                'name' => 'required|max:255',
                'slug' => 'required',
            ]);
        }
        
    }
}
