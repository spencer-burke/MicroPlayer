<!DOCTYPE html>
<html>

<head>
    <title>Profile Dashboard</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <h1>Profile Dashboard</h1>
    <h2>Welcome, {{ $profile->display_name }}</h2>

    <h3>Watch History:</h3>
    @foreach ($watchHistories as $watchHistory)
        <p>{{ $watchHistory->film_id }}</p> 
        <p>{{ $watchHistory->film_title }}</p> 
    @endforeach

    <h3>Film Favorites:</h3>
    @foreach ($favorites as $favorite)
        <p>{{ $favorite->film_id }}</p>
        <p>{{ $favorite->film_title }}</p>
    @endforeach

    <h3>Film Watch Laters</h3>
    @foreach ($watchLaters as $watchLater)
        <p>{{ $watchLater->film_id }}</p>
        <p>{{ $watchLater->film_title }}</p>
    @endforeach

    <h3>Search History:</h3>
    @foreach ($searchHistories as $searchHistory)
        <p>{{ $searchHistory->search_query }}</p>
    @endforeach
    <a href="{{ route('film.browser', $profile) }}">Browse Films</a>
</body>

</html>
