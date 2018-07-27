<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\TrendCategory;
use App\Trend;
use Response;

class TrendApiController extends Controller
{
    public function __construct(){
        //
    }

    public function fetchAllTrendCategoryForHomePage()
    {
        $result = TrendCategory::where('is_deleted', 0)->take(10)->get();
        if(!$result){
            return response()->json('No item found', 404);
        }
        return response()->json($result, 200);
    }

    public function fetchAllTrendCategory()
    {
    	$result = TrendCategory::where('is_deleted', 0)->get();
        if(!$result){
            return response()->json('No item found', 404);
        }
        return response()->json($result, 200);
    }

    public function fetchAllTrend()
    {
    	$slug = Input::get('slug');
    	$detailTrendCategory = TrendCategory::where(['is_deleted' => 0, 'slug' => $slug])->first();
    	$result = Trend::where(['is_deleted' => 0, 'category_id' => $detailTrendCategory['id']])->get();
        if($slug == ''){
            $result = Trend::where(['is_deleted' => 0])->get();
        }
        foreach ($result as $key => $value) {
            $trendCatgory = TrendCategory::where(['is_deleted' => 0, 'id' => $value['category_id']])->first();
            $result[$key]['cate_title'] = $trendCatgory['title'];
            $result[$key]['image'] = json_decode($value['image'])[0];
        }
        if(!$result){
            return response()->json('No item found', 404);
        }
        return response()->json($result, 200);
    }

    public function fetchTrendCategoryBySlug()
    {
        $slug = Input::get('slug');
        if($slug == ''){
            $result = [
                'title' => 'XU HƯỚNG NỘI THẤT ĐIỂN HÌNH',
                'description' => 'Với lý tưởng duy mỹ luôn hướng tới sự hoàn hảo trong mọi công trình, chúng tôi luôn luôn theo sát và đảm bảo rằng những người tham gia kiến tạo nên sản phẩm của Artelier 31 dù là kỹ sư, thiết kế, người chọn vật tư, công nhân sản xuất, vận chuyển, lắp đặt hay bảo trì sản phẩm, tất cả đều phải tận tâm, tập trung cao độ và chỉn chu trong công việc của mình nhằm mang đến cho người tiêu dùng những sản phẩm chất lượng và dịch vụ thỏa mãn nhất.'
            ];
        }else{
            $result = TrendCategory::where(['is_deleted' => 0, 'slug' => $slug])->first();
        }
        
        if(!$result){
            return response()->json('No item found', 404);
        }
        return response()->json($result, 200);
    }

    public function fetchTrend(){
        $slug = Input::get('slugDetail');
        $result = Trend::where('slug', $slug)->where('is_deleted', 0)->first();
        if(!$result){
            return response()->json('No item found', 404);
        }
        return response()->json($result, 200);
    }
}
