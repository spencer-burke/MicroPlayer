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
                    <button type="button" class="delete-profile-btn" data-profile-id="{{ $profile->id }}">Delete</button>
                    <button type="button" class="edit-profile-btn" data-profile-id="{{ $profile->id }}">Edit</button>
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


    {{-- edit profile form (hidden by default) --}}
    <div id="edit-profile-container" style="display: none;">
        <h3>Edit Profile</h3>
        <form id="edit-profile-form">
            <input type="hidden" id="edit-profile-id" name="profile_id">
            <label for="new_display_name">New Display Name:</label>
            <input type="text" id="new_display_name" name="new_display_name" required>
            <button type="submit">Save</button>
            <button type="button" id="cancel-edit">Cancel</button>
        </form>
    </div>
</body>

<script>
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
                this.reset(); // clear the form
            }
        } catch (error) {
            console.error('Error:', error);
            alert('Failed to create profile');
        }
    });

    // show edit form when edit button is clicked
    document.getElementById('profile-cards-container').addEventListener('click', function(e) {
        if (e.target.classList.contains('edit-profile-btn')) {
            const profileId = e.target.getAttribute('data-profile-id');
            document.getElementById('edit-profile-id').value = profileId;
            document.getElementById('edit-profile-container').style.display = 'block';
        }
    });

    // cancel edit
    document.getElementById('cancel-edit').addEventListener('click', function() {
        document.getElementById('edit-profile-container').style.display = 'none';
        document.getElementById('edit-profile-form').reset();
    });

    // fetch handler for edit profile
    document.getElementById('edit-profile-form').addEventListener('submit', async function(e) {
        e.preventDefault();

        const profileId = document.getElementById('edit-profile-id').value;
        const newDisplayName = document.getElementById('new_display_name').value;

        try {
            const response = await fetch(`/profiles/${profileId}`, {
                method: 'PATCH',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'text/html; fragment',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    new_display_name: newDisplayName
                })
            });

            if (response.ok) {
                const html = await response.text();
                document.getElementById('profile-cards-container').innerHTML = html;
                document.getElementById('edit-profile-container').style.display = 'none';
                this.reset();
            } else {
                alert('Failed to edit profile');
            }
        } catch (error) {
            alert('Failed to edit profile');
        }
    });
</script>

</html>
