<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google_Client;
use Google_Service_YouTube;
use Google_Service_YouTube_Video;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function uploadVideo(Request $request)
    {
        // Your Google Cloud Project's credentials file (JSON)
        $credentialsFile = storage_path('path/to/your/credentials-file.json');

        // Initialize Google Client
        $client = new Google_Client();
        $client->setAuthConfig($credentialsFile);
        $client->setScopes([Google_Service_YouTube::YOUTUBE_UPLOAD]);
        $client->setAccessType('offline');

        // Check if token is available, otherwise authenticate
        if ($token = $this->getAccessToken()) {
            $client->setAccessToken($token);
        } else {
            // Redirect to Google OAuth consent screen if not authenticated
            return redirect()->to($client->createAuthUrl());
        }

        // Check if the form is submitted
        if ($request->isMethod('post')) {
            // Get video details from the form
            $videoTitle = $request->input('title');
            $videoDescription = $request->input('description');
            $videoPath = $request->file('video')->getPathname();

            // Create YouTube service
            $youtube = new Google_Service_YouTube($client);

            // Create a video resource and set its properties
            $video = new Google_Service_YouTube_Video();
            $video->setSnippet(new Google_Service_YouTube_VideoSnippet());
            $video->getSnippet()->setTitle($videoTitle);
            $video->getSnippet()->setDescription($videoDescription);

            // Create a YouTube video file
            $media = new Google_Service_YouTube_VideoMediaFileUpload(
                'video/*',
                file_get_contents($videoPath),
                true,
                true
            );

            // Call the YouTube API's videos.insert method to create the video
            $video = $youtube->videos->insert(
                'snippet,status',
                $video,
                ['mediaUpload' => $media]
            );

            // Print the video ID to the console
            dd('Video uploaded: ' . $video->getId());
        }

        // Show the form to upload a video
        return view('upload-video-form');
    }

    private function getAccessToken()
    {
        // Implement your logic to retrieve and refresh access token
        // You may use Laravel's session, cache, or database to store and retrieve the token
        return null;
    }
}
