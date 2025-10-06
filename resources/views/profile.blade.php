<!DOCTYPE html>
<html>

<head>
    <title>Profile</title>
</head>

<body>
    <h1>Profile View</h1>
    <h2>Welcome, {{ $profile->display_name }}</h2>
    <h3>Film Recommendations:</h3>
    @foreach ($recommendations as $recommendation)
        <p>{{$recommendation->}}</p>
    @endforeach
    <h3>Film Favorites:</h3>
    <h3>Film Watch Laters</h3>
    <h3>Search History:</h3>
</body>

</html>
