<!DOCTYPE html>
<html>

<head>
    <title>The User Dashboard</title>
</head>

<body>
    <h1>The User Dashboard</h1>
    <h2> Welcome, {{ $user->name }} </h2>
    @foreach($user->profiles as $profile)
    @csrf
        <p>{{ $profile->displayname }}</p>
    @endforeach
</body>

</html>
