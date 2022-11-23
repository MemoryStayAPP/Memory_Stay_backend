<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Marker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class MarkerController extends Controller
{
    public function createMarker(Request $request)
    {
        try {
            $validateMarker = Validator::make($request->all(),
                [
                    'name' => 'required',
                    'description' => 'required',
                    'lng'   =>    'required',
                    'lat'   =>  'required',
                    'author' => 'required'
                ]);

            if ($validateMarker->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateMarker->errors()
                ], 461);
            }
            $marker = Marker::create([
                'name' => $request->name,
                'description' => $request->description,
                'author' => $request->author,
                'lng' => $request->lng,
                'lat' => $request->lat

            ]);
            return response()->json([
                'status' => true,
                'message' => "Marker of id {$marker->id} created"
            ], 200);
        }catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

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
                ], 461);
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

    public function selectMarker(Request $request){
        try {
            $validateMarker = Validator::make($request->all(),
                [
                    'id' => 'required'
                ]);

            if ($validateMarker->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateMarker->errors()
                ], 401);
            }
            $marker = Marker::findorfail($request->id);
            return response()->json([
                'status' => true,
                'name'  => $marker->name,
                'description'   =>  $marker->description,
                'author'    =>  $marker->author,
                'created_at'    =>  $marker->created_at,
                'lng' => $marker->lng,
                'lat' => $marker->lat,
                'errors' => $validateMarker->errors()

            ]);
        }catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }

    }
    public function getMarkers(){
        return Marker::all();
    }
}
