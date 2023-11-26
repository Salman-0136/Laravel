<?php

namespace App\Http\Controllers;

use App\Models\blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class blogController extends Controller
{
    public function index()
    {
        $posts = blog::all();

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        } else {
            $imagePath = null;
        }

        blog::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'image_path' => $imagePath, 
            'user_id' => auth()->id(), 
        ]);

        return redirect()->route('posts.index')->with('success', 'Post created successfully!');
    }

    public function show(blog $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(blog $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, blog $post)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($post->image_path) {
                Storage::disk('public')->delete($post->image_path);
            }

            $imagePath = $request->file('image')->store('images', 'public');
            $post->update(['image_path' => $imagePath]);
        }

        $post->update([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
        ]);

        return redirect()->route('posts.index')->with('success', 'Post updated successfully!');
    }
    
    public function destroy(blog $post)
    {
        $post->delete();

        return redirect()->route('posts.index');
    }
}
