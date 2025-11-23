<!DOCTYPE html>
<html>

<head>
    <title>The User Dashboard</title>
</head>

<body>
    <h1>The User Dashboard</h1>
    <h2> Welcome, {{ $user->name }} </h2>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>

    <div class="profile-cards-container">
        @fragment('profile-cards')
            @foreach ($user->profiles as $profile)
                <div class="profile-card">
                    @csrf
                    <p>{{ $profile->display_name }}</p>
                    <a href="{{ route('dashboard.profile', $profile->id) }}">View Profile</a>

                    {{-- remove profile form --}}
                    <form action="/profiles/{{ $profile->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-profile-btn" data-profile-id="{{ $profile->id }}">Delete</button>
                    </form>
                </div>
            @endforeach

            @if($user->profiles->isEmpty())
                <p>No profiles created</p>
            @endif
        @endfragment
    </div>

    {{-- add profile form --}}
    <h3>Make Profile Form</h3>
    <form action="/profiles" method="POST">
        @csrf
        <label for="display_name">Display Name:</label>
        <input type="text" id="display_name" name="display_name">

        <button type="submit">Create Profile</button>
    </form>
    {{-- edit profile form --}}
    <form>
    </form>
</body>

<script>
    const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

    document.querySelectorAll('.delete-form').forEach(form => {
        form.addEventListener('submit', function(e) {
            if (!confirm('Are you sure you want to delete this profile?')) {
                e.preventDefault();
            }
        });
    });

    // event delegation - attach once to container
    document.getElementById('profile-cards-container').addEventListener('click', async function(e) {
        if (e.target.classList.contains('delete-profile-btn')) {
            if (!confirm('Are you sure you want to delete this profile?')) {
                return;
            }
            
            // use explicit naming to get button
            const profileId = e.target.getAttribute('data-profile-id');

            try {
                const response = await fetch(`/profiles/${profileId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'text/html'
                    }
                });

                // replace the profile cards with the new one from the server
                if (response.ok) {
                    const html = await response.text();
                    document.getElementById('profile-cards-container').innerHTML = html;
                }
            } catch (error) {
                console.error('Error:', error);
            }
        }
    });
</script>

</html>
