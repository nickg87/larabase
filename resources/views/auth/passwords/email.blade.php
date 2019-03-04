<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.partials._head')
</head>

<body class="animsition">
<div class="page-wrapper">
    <div class="page-content--bge5">
        <div class="container">
            <div class="login-wrap">
                <div class="login-content">
                    <div class="login-logo">
                        <a href="{{route('admin.')}}">
                            <img src="{{asset('images/icon/logo.png')}}" alt="LaraBase Admin">
                        </a>
                    </div>

                    <div class="login-form">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="form-group">
                                <label>Send Password Reset Link</label>
                                <input id="email" type="email" class="au-input au-input--full form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@include ('admin.partials._footer')

</body>

</html>
{{--<!-- end document-->