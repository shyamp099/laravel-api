<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\CommentStoreRequest;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CommentResource;

class CommentController extends Controller
{
    /**
     * Store a newly created comment in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentStoreRequest $request)
    {
        $comment = Comment::create([
            'message' => $request->message,
            'post_id' => $request->post_id
          ]);

          return new CommentResource($comment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        $comment->update($request->only(['message']));

        return new CommentResource($comment);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();

        return response()->json(null, 204);
    }
}
