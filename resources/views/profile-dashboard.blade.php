<!DOCTYPE html>
<html>

<head>
    <title>Profiles</title>
</head>

<body>
    <h1>Profile Dashboard</h1>
    <h2> Welcome, {{ $user->name }} </h2>
    @foreach($user->profiles as $profile)
    @csrf
        <p>{{ $profile->displayname }}</p>
        <a href="{{ route('profiles.show', $profile->id) }}">View Profile</a>
    @endforeach
</body>

</html>

