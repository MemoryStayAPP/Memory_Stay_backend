<?php

namespace App\Http\Controllers\Image;

use App\Http\Controllers\Controller;
use App\Http\Requests\ImageStoreRequest;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;


class ImageController extends Controller
{
    public function imageStore(ImageStoreRequest $request)
    {

        $validatedData = $request->validated();
        $data = Image::create([
            'uuid' => Str::uuid(),
            'image' => $request->file('image')->store('image')
        ]);

        return response($data, Response::HTTP_CREATED);
    }
}