<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use AymanElmalah\YoutubeUploader\Youtube;
// use Alaouy\Youtube\Facades\Youtube;

class YouTubeUploadController extends Controller
{
    public function showForm()
    {
        return view('callback');
    }

    public function callback(Request $request)
    {
        $redirect_url = 'http://localhost/youtube-uploader/public/youtube/callback';
        $video = public_path('VIDEO_FILE');
        $image = public_path('IMAGE_FILE');
        $youtube = Youtube::setRedirectUrl($redirect_url)->upload($video, [
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'tags' => explode(',', $request->input('tags')),
            'category_id' => '22',
        ]);

        // Get uploaded video id
        $video_id = $youtube->uploadedVideoId();

        // Handle the uploaded video ID as needed

        return redirect()->back()->with('success', 'Video uploaded successfully!');
    }
}
