<form method="POST" action="{{ route('login') }}">
    @csrf

    <div>
        <label for="username">Username</label>
        <input id="username" type="text" name="username" value="{{ old('username') }}" required autofocus>
        @error('username')
            <span>{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="password">Password</label>
        <input id="password" type="password" name="password" required>
        @error('password')
            <span>{{ $message }}</span>
        @enderror
    </div>

    <div>
        <button type="submit">Login</button>
    </div>
</form>

<div>
    <p>Belum punya akun? <a href="{{ route('register') }}">Register</a></p>
</div>
