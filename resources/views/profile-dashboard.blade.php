<!DOCTYPE html>
<html>

<head>
    <title>Profile Dashboard</title>
</head>

<body>
    <h1>Profile Dashboard</h1>
    <h2>Welcome, {{ $profile->display_name }}</h2>
    <h3>Film Recommendations:</h3>
    @foreach ($recommendations as $recommendation)
        <p>{{ $recommendation->film_id }}</p>
        <p>{{ $recommendation->film_title }}</p>
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
</body>

</html>
