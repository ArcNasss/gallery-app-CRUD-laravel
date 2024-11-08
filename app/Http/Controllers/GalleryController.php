<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galleries = Gallery::all();
        return view('galleries.index', compact('galleries'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    return view('galleries.create');
}

public function store(Request $request)
{
    $request->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,mp4|max:2048',
    ]);

    $imageName = time().'.'.$request->image->extension();
    $request->image->move(public_path('images'), $imageName);

    Gallery::create([
        'image' => $imageName,
    ]);

    return redirect()->route('galleries.index')->with('success', 'Image successfully uploaded.');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $gallery)
{
    $imagePath = public_path('images/'.$gallery->image);

    if (file_exists($imagePath)) {
        unlink($imagePath);
    }

    $gallery->delete();
    return redirect()->route('galleries.index')->with('success', 'Image successfully deleted.');
}

}
