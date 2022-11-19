<?php

namespace App\Http\Controllers\Marker;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Marker;
use Illuminate\Support\Facades\Validator;

class SelectController extends Controller
{
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
