<!DOCTYPE html>
<html>

<head>
    <title>The Film Browser</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <h1>The Film Browser</h1>

    {{-- link to film viewer(this will add to watch history upon page visit) --}}
    {{-- add to favorites button --}}
    {{-- add to watch later button --}}
    @foreach($films as $film)
        <h2>{{ $film->title }}</h2>
        <a href="{{ route('film.viewer', ['profile' => $profile, 'film' => $film]) }}"/>
    @endforeach
</body>

</html>
