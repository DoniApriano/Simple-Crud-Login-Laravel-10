<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::get();
        return view('home.index', compact('posts'));
    }

    public function create()
    {
        return view('home.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'image'     => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'title'     => 'required|min:5',
            'content'   => 'required|min:10'
        ]);

        $image = $request->image;
        $image->storeAs('/public/post', $image->hashName());

        Post::create([
            'image'     => $image->hashName(),
            'title'     => $request->title,
            'content'   => $request->content
        ]);

        return redirect()->route('home.index');
    }

    public function show(string $id)
    {
        $post = Post::findOrFail($id);

        return view('home.show', compact('post'));
    }

    public function edit(string $id)
    {
        $post = Post::findOrFail($id);

        return view('home.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'image'     => 'image|image|mimes:jpeg,png,jpg|max:2048',
            'title'     => 'required|min:5',
            'content'   => 'required|min:10'
        ]);

        $post = Post::findOrFail($id);

        if ($request->hasFile('image')) {
            $image = $request->image;
            $image->storeAs('/public/post/' . $image->hashName());

            Storage::delete('/public/post/' . $post->image);

            $post->update([
                'image'     => $image->hashName(),
                'title'     => $request->title,
                'content'   => $request->content,
            ]);
        } else {
            $post->update([
                'title'     => $request->title,
                'content'   => $request->content,
            ]);
        }

        return redirect()->route('home.index');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        if(Storage::exists('/public/post/'.$post->image)) {
            Storage::delete('/public/post/'.$post->image);
        }

        $post->delete();
        return redirect()->route('home.index');
    }
}
