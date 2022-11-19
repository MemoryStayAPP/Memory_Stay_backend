<?php

namespace App\Http\Controllers\Marker;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Marker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class DeleteController extends Controller
{
    public function deleteMarker(Request $request){
        try {
            $validateMarker = Validator::make($request->all(),
                [
                    'id' => 'required',
                ]);

            if ($validateMarker->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateMarker->errors()
                ], 401);
            }
            $marker = Marker::findorfail($request->id);
            $marker->delete();

            DB::statement("SET @count = 0;");
            DB::statement("UPDATE `markers` SET `markers`.`id` = @count:= @count + 1;");
            DB::statement("ALTER TABLE `markers` AUTO_INCREMENT = 1;");

            return response()->json([
                'status' => true,
                "message' => 'Marker of id {$request->id} deleted successfully",
                'errors' => $validateMarker->errors()
            ], 200);

        }catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }

    }

}
