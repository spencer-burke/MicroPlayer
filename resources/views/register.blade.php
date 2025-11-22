<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
</head>

<body>
    <h1>Register Page</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('register.submit') }}" method="POST" class="form-example">
        @csrf
        <div class="form-example">
            <div class="form-element">
                <label for="email">Enter your email: </label>
                <input type="email" name="email" id="email" required />
            </div>

            <div class="form-element">
                <label for="password"> Enter your password: </label>
                <input type="password" name="password" id="password" required />
            </div>

            <div class="form-element">
                <label for="password_confirmation">Confirm your password: </label>
                <input type="password" name="password_confirmation" id="password_confirmation" required />
            </div>

            <div class="form-element">
                <input type="checkbox" id="showPassword" />
                <label for="showPassword">Show passwords</label>
            </div>

            <div class="form-element">
                <input type="submit" value="Register" />
            </div>
        </div>
    </form>
    <a href="{{ route('login') }}">Go to login</a>

</body>

<script>
    document.getElementById('showPassword').addEventListener('change', function() {
        const passwordField = document.getElementById('password');
        const confirmPasswordField = document.getElementById('password_confirmation');

        if (this.checked) {
            passwordField.type = 'text';
            confirmPasswordField.type = 'text';
        } else {
            passwordField.type = 'password';
            confirmPasswordField.type = 'password';
        }
    });
</script>

</html>
