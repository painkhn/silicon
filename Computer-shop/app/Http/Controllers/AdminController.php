<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;

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
            'amount' => 'required',
            'category_id' => 'required',
            'photo' => 'required|image|mimes:jpg,png,jpeg,webp|max:2048'
        ]);
    
        $name = time(). "." . $request->photo->extension();
        $destination = 'public/products';
        $path = $request->photo->storeAs($destination, $name);
        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'about' => $request->about,
            'price' => $request->amount,
            'category_id' => $request->category_id,
            'photo' => 'storage/products/' . $name
        ];
        Product::create($data);

        return redirect()->back();
    }

    public function ban_user($user_id)
    {
        $user = User::where('id', $user_id)->first();
        $ban = ($user->ban == 1) ? 0 : 1;
        User::where('id', $user_id)->update([
            'ban' => $ban
        ]);
        return redirect()->back();
    }
}
