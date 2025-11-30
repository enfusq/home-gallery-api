<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Image::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'image' => 'required|image',
            'taken_at' => 'sometimes|nullable|date'
        ]);

        $file = $request->file('image');
        $path = $file->store('images', 'public');

        $image = Image::create([
            'user_id' => auth()->id() ?? 1, //1 is test user id
            'image_path' => $path,
            'original_name' => $file->getClientOriginalName(),
            'taken_at' => $request->taken_at
        ]);

        return response()->json([
            'message' => 'Image uploaded successfully',
            'image' => $image
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Image $image)
    {
        return $image;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Image $image)
    {
        $image->delete();
    }
}
