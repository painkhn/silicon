<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;

class AdminController extends Controller
{
    public function admin_panel()
    {
        $users = User::get();
        $category = Category::get();
        return view('admin', ['users' => $users, 'categories' => $category]);    
    }

    public function new_position(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'about' => 'required|string',
            'amount' => 'required|integer',
            'category_id' => 'required|integer',
            'photo' => 'required|image|mimes:jpg,png,jpeg|max:2048|alpha_dash'
        ]);
        
        $name = time(). "." . $request->video_file->extension();
        $destination = 'public/';
        $path = $request->video_file->storeAs($destination, $name);
        $video = [
            'name' => $request->video_name,
            'description' => $request->video_message,
            'path' => 'storage/' . $name,
            'category_id' => $request->category_id,
            'user_id' => Auth::user()->id
        ];
    }
}
