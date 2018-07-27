<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $commonMessage = [
        'isNotEmpty' => '%s %s không trống, không thể %s'
    ];

    public function buildUniqueSlug($table, $id = 0, $slug)
    {
        $allSlugs = $this->getRelatedSlugs($table, $id, $slug);
        if (! $allSlugs->contains('slug', $slug)){
            return $slug;
        }
        for ($i = 1; $i <= 10; $i++) {
            $newSlug = $slug.'-'.$i;
            if (! $allSlugs->contains('slug', $newSlug)) {
                return $newSlug;
            }
        }
        throw new \Exception('Can not create a unique slug');
    }

    protected function getRelatedSlugs($table, $id = 0, $slug)
    {
        return DB::table($table)->select('slug')->where('slug', 'like', $slug.'%')
        ->where('id', '<>', $id)
        ->get();
    }

    protected function createQueryInput($keys, $request) {
        $queryInput = [];
        for($i = 0; $i < sizeof($keys); $i++) {
            $key = $keys[$i];
            $queryInput[$key] = $request[$key];
        }

        return $queryInput;
    }

    protected function countForCheckEmptyObject($object, $check,  $id){
        $count = DB::table($object)
            ->where($check, $id)
            ->where('is_deleted', 0)
            ->count();
        return $count;
    }

    protected function checkActive($table, $detailKey, $detail, $subTable = ''){
        $checkCategory = DB::table($table)->where([$detailKey => $detail['id'], 'is_deleted' => 0])->count();
        $checkSubCategory = 0;
        if($subTable != ''){
            $checkSubCategory = DB::table($subTable)->where([$detailKey => $detail['id'], 'is_deleted' => 0])->count();
        }
        if($checkCategory > 0 || $checkSubCategory > 0){
            return false;
        }else{
            return true;
        }
    }
}
