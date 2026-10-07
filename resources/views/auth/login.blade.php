<!DOCTYPE html>
<html>
<head>
    <title>Login - Sistem Bengkel</title>
</head>
<body>

    <h1>🔐 LOGIN SISTEM BENGKEL</h1>

    <hr>

    @if (session('error'))
        <p style="color:red;">
            {{ session('error') }}
        </p>
    @endif

    @if ($errors->any())
        <ul style="color:red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="/login" method="POST">

        @csrf

        <p>
            <label>
                <strong>Email</strong>
            </label>
            <br>

            <input
                type="email"
                name="email"
                value="{{ old('email') }}"
                required
            >
        </p>

        <p>
            <label>
                <strong>Password</strong>
            </label>
            <br>

            <input
                type="password"
                name="password"
                required
            >
        </p>

        <button type="submit">
            🔐 Login
        </button>

    </form>

</body>
</html>