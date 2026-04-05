<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function createComment(Request $req)
    {

        // if user is not logged in
        $user = Auth::user();
        if (! $user) {
            return false;
        } else {

            // if the user is logged in
            $formFields = [
                'comment' => $req->input('comment'),
                'video_id' => $req->input('video_id'),
                'user_id' => $req->input('user_id'),
            ];

            Comments::create($formFields);
            $allComments = Comments::where('video_id', $formFields['video_id'])->with('user')->orderBy('id', 'desc')->get();

            return response()->json([
                'message' => 'Comment added Successfully!',
                'comments' => $allComments,
            ]);
        }
    }

    public function getComments(Request $req)
    {

        // if user is not logged in
        $user = Auth::user();
        if (! $user) {
            return false;
        } else {
            // if the user is logged in
            $formFields = [
                'video_id' => $req->input('video_id'),
                'user_id' => $req->input('user_id'),
            ];
            $allComments = Comments::where('video_id', $formFields['video_id'])->with('user')->orderBy('id', 'desc')->limit(7)->get();
            $commentCount = Comments::where('video_id', $formFields['video_id'])->count('id');

            return response()->json([
                'message' => 'Comment fetched Successfully!',
                'comments' => $allComments,
                'commentCount' => $commentCount,
            ]);
        }
    }
}
