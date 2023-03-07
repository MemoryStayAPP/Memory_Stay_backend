<?php

namespace App\Http\Controllers\Marker;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Marker;
use App\Http\Requests\MarkerCreateRequest;
use Illuminate\Support\Str;

class CreateController extends Controller
{
    public function createMarker(MarkerCreateRequest $request)
    {

        $request->validated();
        
        $marker = Marker::create([
            'uuid' => Str::uuid(),
            'name' => $request->name,
            'description' => $request->description,
            'image_uuid' => "",
            'author' => $request->author,
            'lng' => $request->lng,
            'lat' => $request->lat

        ]);
        if($request->has('image_uuid')){
            $marker->image_uuid = $request->image_uuid;
            $marker->save();
            $img_mess = "image of uuid {$request->image_uuid} uploaded";
        }else{
            $img_mess = 'image not uploaded';
        }

        return response()->json([
            'status' => true,
            'message' => "Marker of UUID {$marker->uuid} created",
            'image status' => $img_mess
        ], 200);

    }

}
