<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.head')
    <title>Login</title>
    <link rel="stylesheet" href="{{ url('/css/style.css') }}">
</head>
<body>

    <div class="navbar">
        @if (Route::has('register'))
        <a href="{{ route('register') }}">{{ __('Register') }}</a>
        @endif
    </div>

    <form method="POST" action="{{ route('login') }}" style="margin-top: 120px;">
         @csrf
        <table class="form">
            <tr>
                <td colspan="2">
                    <h1 align="center">Login Petugas</h1>
                </td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror</td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror</td>
            </tr>
            <tr style="height: 10px;"></tr>
            <tr>
                <td colspan="2" align="right">
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif

                    <button type="submit" class="btn btn-submit">
                        {{ __('Login') }}
                    </button>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>