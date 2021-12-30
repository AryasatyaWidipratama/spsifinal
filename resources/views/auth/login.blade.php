<!DOCTYPE html>
<!-- Coding By CodingNepal - youtube.com/codingnepal -->
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Form Login</title>
    <link rel="stylesheet" href="{{ asset('assets/css/login_style.css') }}">
</head>

<body>
    <div class="center">
        <h1>Login</h1>
        <form method="POST" action="{{ route('login.authenticate') }}">
            @csrf

            <div class="txt_field">
                <input type="text" name="login" value="{{ old('login') }}" required>
                <span></span>
                <label>NIM / NIP</label>
            </div>
            {{ $errors->first('email') }}

            <div class="txt_field">
                <input type="password" name="password" required>
                <span></span>
                <label>Password</label>
            </div>
            {{ $errors->first('password') }}

            {{-- <div class="pass">Forgot Password?</div> --}}
            <input type="submit" value="Login">
            <div class="signup_link">
                {{-- Not a member? <a href="#">Signup</a> --}}
            </div>
        </form>
    </div>

</body>

</html>