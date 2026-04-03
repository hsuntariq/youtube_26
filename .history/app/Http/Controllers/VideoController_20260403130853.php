<?php

namespace App\Http\Controllers;

use App\Models\Videos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VideoController extends Controller
{
    public function uploadVideo(Request $req)
    {
        $formFields = [
            'video' => $req->input('video'),
            'thumbnail' => $req->input('thumbnail'),
            'title' => $req->input('title'),
            'description' => $req->input('description'),
            'made_for_kids' => $req->input('made_for_kids'),
            'visibility' => $req->input('visibility'),
            'is_premiere' => $req->input('is_premiere'),
        ];




        $formFields['video'] = $req->file('video')->store('videos', 'public');
        $formFields['thumbnail'] = $req->file('thumbnail')->store('thumbnails', 'public');
        $formFields['user_id'] = Auth::id();
        // store the data in the database


        Videos::create($formFields);

        // redirection

        return back()->with('message', 'Video published successfully!');


    }


    // get the videos from the database


    public function getVideos()
    {
        $allVideos = Videos::all();
        return view('welcome', compact('allVideos'));
    }


    public function getSingleVideo($id)
    {
        $video = Videos::find($id);
        return view('single-video', compact('video'));
    }


}
