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

    @foreach ($user->profiles as $profile)
        @csrf
        <p>{{ $profile->display_name }}</p>
        <a href="{{ route('dashboard.profile', $profile->id) }}">View Profile</a>
    @endforeach

</body>

</html>
