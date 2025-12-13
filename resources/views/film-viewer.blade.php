<!DOCTYPE html>
<html>

<head>
    <title>The Film Viewer</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <h1>The Film Viewer</h1>

    <iframe
        src="https://player.mux.com/{{ $film->playback_id }}?metadata-video-title={{ $film->title }}&video-title={{ $film->title }}"
        style="width: 100%; border: none; aspect-ratio: 4/3;"
        allow="accelerometer; gyroscope; autoplay; encrypted-media; picture-in-picture;" allowfullscreen>
    </iframe>

</body>

</html>
