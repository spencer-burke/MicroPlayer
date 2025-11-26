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
    <h3>Edit Profile Form</h3>
    <form action="/profiles" method="POST">
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
    // fetch handler for make profile

    // fetch handler for edit profile

    // fetch handler for delete profile
</script>

</html>
