<?php

namespace App\Http\Controllers\Marker;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Marker;
use Illuminate\Support\Facades\Validator;

class CreateController extends Controller
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
                ], 401);
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

}
