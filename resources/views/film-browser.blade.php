<!DOCTYPE html>
<html>

<head>
    <title>The Film Browser</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <h1>The Film Browser</h1>

    <div id="films-container">
        @foreach ($films as $film)
            <h2>
                {{-- link to film viewer(this will add to watch history upon page visit) --}}
                <a href="{{ route('film.viewer', ['profile' => $profile, 'film' => $film]) }}">
                    {{ $film->title }}
                </a>
            </h2>
            {{-- add to favorites button --}}
            <button type="button" class="add-to-favorites-btn" data-film-id="{{ $film->id }}">Add to Favorites</button>
            {{-- add to watch later button --}}
            <button type="button" class="add-watch-later-btn" data-film-id="{{ $film->id }}">Add to Watch Later</button>
        @endforeach
    </div>
</body>

<script>
    const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

    // fetch handler for add to favorites
    document.getElementById('films-container').addEventListener('click', addToFavorites);

    // fetch handler for add to watch later

    // function handler for add to favorites
    async function addToFavorites(e) {
        if (!e.target.classList.contains('add-to-favorites-btn')) {
            return
        }
        const filmId = e.target.getAttribute('data-film-id');
        const response = await fetch(``)
    }

    // function handler for add to watch later
    function addToWatchLater(e) {

    }
</script>

</html>
