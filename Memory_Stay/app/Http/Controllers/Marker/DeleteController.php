<?php

namespace App\Http\Controllers\Marker;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Marker;
use App\Models\Image;
use App\Http\Requests\MarkerDeleteRequest;

class DeleteController extends Controller
{
    public function deleteMarker(MarkerDeleteRequest $request){

        $request->validated();

        $marker = Marker::where('uuid', $request->uuid);
        if($marker->delete()){
            return response()->json([
                'status' => true,
                'message' => "Marker of UUID {$request->uuid} deleted successfully",
                // 'image status' => $image_mess 
            ], 200);
        }else{
            return response()->json([
                'status' => false,
                'message' => "Marker of UUID {$request->uuid} not found",
                // 'image status' => $image_mess 
            ], 400);
        }
        
        // if($marker->image_uuid != ""){
        //     $image = Image::where('uuid', $marker->image_uuid);
        //     $image->delete();
        //     $image_mess = "Image of uuid {$marker->image_uuid} deleted successfuly";
        // }else{
        //     $image_mess = "Image not assigned";
        // }
        

        

    }

}
