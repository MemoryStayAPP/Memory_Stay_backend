<?php

namespace App\Http\Controllers\Marker;

use App\Http\Controllers\Controller;
use App\Models\Marker;

class GetController extends Controller{

    public function getMarkers(){
        return response()->json([
            'status' => 'true',
            'markers' => Marker::all()
        ],200);
    }
}