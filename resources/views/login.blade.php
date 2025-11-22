<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
</head>

<body>
    <h1>Login Page</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('login.submit') }}" method="POST" class="form-example">
        @csrf
        <div class="form-example">
            <div class="form-element">
                <label for="email">Enter your email: </label>
                <input type="email" name="email" id="email" required />
            </div>

            <div class="form-element">
                <label for="password">Enter your password: </label>
                <input type="password" name="password" id="password" required />
            </div>

            <div class="form-element">
                <input type="submit" value="login" />
            </div>
        </div>
    </form>
    <a href="{{ route('register') }}">Go to register</a>

</body>

</html>
