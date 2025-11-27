<!DOCTYPE html>
<html>

<head>
    <title>The User Dashboard</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <h1>The User Dashboard</h1>
    <h2> Welcome, {{ $user->name }} </h2>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>

    <div id="profile-cards-container">
        @fragment('profile-cards')
            @foreach ($user->profiles as $profile)
                <div class="profile-card">
                    @csrf
                    <p>{{ $profile->display_name }}</p>
                    <a href="{{ route('dashboard.profile', $profile->id) }}">View Profile</a>
                    <button type="submit" class="delete-profile-btn" data-profile-id="{{ $profile->id }}">Delete</button>
                </div>
            @endforeach

            @if ($user->profiles->isEmpty())
                <p>No profiles created</p>
            @endif
        @endfragment
    </div>

    {{-- add profile form --}}
    <h3>Add Profile Form</h3>
    <form action="/profiles" method="POST" id="add-profile-form">
        @csrf
        <label for="display_name">Display Name:</label>
        <input type="text" id="display_name" name="display_name">

        <button type="submit">Create Profile</button>
    </form>

    {{-- edit profile form --}}
    <h3>Edit Profile Form</h3>
    <form action="/profiles" method="POST" id="edit-profile-form">
        @csrf
        @method('PATCH')
        <label for="display_name">Display Name:</label>
        <input type="text" id="display_name" name="display_name">

        <label for="new_display_name">New Display Name:</label>
        <input type="text" id="new_display_name" name="new_display_name">

        <button type="submit">Edit Profile</button>
    </form>
</body>

<script>
    // extract the csrf token at the top of the script
    const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

    // fetch handler for add profile
    document.getElementById('add-profile-form').addEventListener('submit', async function(e) {
        e.preventDefault();

        const formData = new FormData(this);

        try {
            const response = await fetch('/profiles', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'text/html; fragment'
                },
                body: formData
            });

            if (response.ok) {
                const html = await response.text();
                document.getElementById('profile-cards-container').innerHTML = html;
                this.reset(); // Clear the form
            }
        } catch (error) {
            console.error('Error:', error);
            alert('Failed to create profile');
        }
    });
    // fetch handler for edit profile

    // fetch handler for delete profile
    document.getElementById('profile-cards-container').addEventListener('click', async function(e) {
        if (e.target.classList.contains('delete-profile-btn')) {
            e.preventDefault();

            if (!confirm('Are you sure you want to delete this profile?')) {
                return;
            }

            const profileId = e.target.getAttribute('data-profile-id');

            try {
                const response = await fetch(`/profiles/${profileId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'text/html; fragment'
                    }
                });

                if (response.ok) {
                    const html = await response.text();
                    document.getElementById('profile-cards-container').innerHTML = html;
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Failed to delete profile');
            }
        }
    });
</script>

</html>
