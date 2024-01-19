<!-- resources/views/callback.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YouTube Uploader Callback</title>
</head>
<body>
    <form action="{{ route('upload.callback') }}" method="post">
        @csrf
        <!-- Add input fields for video, image, title, description, tags, etc. -->
        <label for="video">Video File:</label>
        <input type="file" name="video" required>
        <!-- Add other input fields as needed -->

        <button type="submit">Upload to YouTube</button>
    </form>
</body>
</html>
