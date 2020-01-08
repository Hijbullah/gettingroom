<?php

namespace App\Http\Controllers\User;

use Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class FileUploadController extends Controller
{
    public function fileUpload(Request $request)
    {
        $request->validate([
            'image' => 'bail|required|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);

        $file = $request->file('image');

        $path = $file->hashName('imageForListing');

        $image = Image::make($file);
        
        $image->fit(750, 500, function ($constraint) {
            $constraint->aspectRatio();
        });

        Storage::put($path, (string) $image->encode());

        // $path = Storage::url($path);
        return response()->json($path);
    }

    public function fileDelete(Request $request)
    {
        Storage::delete($request->url);
        return response()->json('done');
    }
}
