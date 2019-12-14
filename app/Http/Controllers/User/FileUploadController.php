<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class FileUploadController extends Controller
{
    public function fileUpload(Request $request)
    {
        $path = $request->file->store('listingImgs');
        return response()->json($path);
    }
    public function fileEdit(Request $request, $exFile)
    {
        Storage::delete($exFile);
        $path = $request->file->store('listingImgs');
        return response()->json($path);
    }

    public function fileDelete(Request $request)
    {
        Storage::delete($request->url);
        return response()->json('done');
    }
}
