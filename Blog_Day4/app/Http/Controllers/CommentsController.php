<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Http\Requests\StoreCommentRequest;

class CommentsController extends Controller
{
    public function index()
    {
        $comments = Comment::all();
        return view('comments.index', compact('comments'));
    }

    public function create()
    {
        // Logic to show create comment form
    }

    public function store(StoreCommentRequest $request)
    {
        Comment::create([
            'user_id' => auth()->user()->id,
            'post_id' => $request->post_id,
            'content' => $request->content,
        ]);

        return redirect()->route('posts.show', $request->post_id)->with('success', 'Comment added successfully.');
    }

    public function edit($id)
    {
        // Logic to show edit comment form
    }

    public function update(Request $request, $id)
    {
        // Validation logic
        $request->validate([
            'content' => 'required|string|max:255',
            // Add more validation rules as needed
        ]);

        // Find the comment by ID
        $comment = Comment::findOrFail($id);

        // Update the comment
        $comment->update([
            'content' => $request->content,
        ]);

        return redirect()->route('posts.show', $comment->post_id)->with('success', 'Comment updated successfully.');
    }

    public function destroy($id)
    {
        // Find the comment by ID
        $comment = Comment::findOrFail($id);

        // Delete the comment
        $comment->delete();

        return redirect()->route('posts.show', $comment->post_id)->with('success', 'Comment deleted successfully.');
    }
}
