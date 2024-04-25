<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Resources\PostResource;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('publisher')->paginate(9);
        return response()->json($posts);
    }

    public function store(StorePostRequest $request)
    {
        if ($request->has('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $path = 'uploads/posts/';
            $file->move($path, $filename);
        }

        $post = Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $path . $filename,
            'publisher' => $request->publisher
        ]);

        return response()->json([$post, "post added"], 201);
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        if (!$post) {
            return response()->json(['error' => 'Post not found'], 404);
        }
        return new PostResource($post);
    }

    public function update(UpdatePostRequest $request, $id)
    {
        $post = Post::findOrFail($id);

        if ($request->hasFile('image')) {
            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }

            // Store the new image
            $file = $request->file('image');
            $path = $file->store('uploads/posts', 'public');
            $post->image = $path;
        }

        $post->title = $request->title;
        $post->description = $request->description;
        $post->publisher = $request->publisher;
        $post->save();

        return response()->json(['message' => "Post with id $id is updated successfully"], 200);
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        if ($post->image) {
            $imagePath = public_path('images/' . $post->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        $post->delete();
        return response()->json(['message' => "Post with id $id is deleted successfully"]);
    }
}
