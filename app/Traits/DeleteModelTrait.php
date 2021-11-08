<?php

namespace App\Traits;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

trait DeleteModelTrait{
    public function deleteModelTrait($id, $model){
        try {
            DB::beginTransaction();
            $model->find($id)->delete();
            DB::commit();
            return response()->json([
                'code' => 200,
                'message' => 'success'
            ], 200);
        }
        catch (\Exception $exception) {
            DB::rollBack();
            log::error('Message: ' . $exception->getMessage() . ' ---line: ' . $exception->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'fail'
            ], 500);
        }
    }
    public function forceDeleteTrait($id, $model){
        try {
            DB::beginTransaction();
            $model::withTrashed()->find($id)->forceDelete();
            DB::commit();
            return response()->json([
                'code' => 200,
                'message' => 'success'
            ], 200);
        }
        catch (\Exception $exception) {
            DB::rollBack();
            log::error('Message: ' . $exception->getMessage() . ' ---line: ' . $exception->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'fail'
            ], 500);
        }
    }
}
