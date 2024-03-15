<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class ImageController extends Controller
{
    //
    public function store(Request $request){
        // echo "<pre>";
        // print_r($request->all());
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            // other validation rules
        ]);
        $imageFile = $request->file('image');
        $imageContent = file_get_contents($imageFile);
        $imageHash = md5($imageContent);    

        if (Image::where('image', $imageHash)->exists()) {
            return redirect()->back()->with('error', 'Image already exists.');
        }
       else{
            $imagePath = $request->file('image')->store('images', 'public');
            // 'images' is the storage directory, and 'public' is the disk
            // Adjust the disk according to your storage configuration
            
            // Save the image path to the database
            Image::create([
                // other fields
                'image' => $imagePath,
            ]);
        }
      return redirect()->back();
    }
    public function getimage(Request $request){
       
        // return view("image");
        $images = Image::all();
        // echo "<pre>";
        // print_r($images);
        // echo "</pre>";

        return view('image', compact('images'));
    }
}
