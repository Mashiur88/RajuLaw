<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title></title>
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <link rel="canonical" href="">
    <link rel="icon" type="image/x-icon" href="" />
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/backend/vendor/fonts/boxicons.css') }}" />
    <link rel=" stylesheet
    " href="{{ asset('assets/backend/vendor/fonts/fontawesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/backend/vendor/fonts/flag-icons.css') }}" />

    <link rel=" stylesheet
    " href="{{ asset('assets/backend/vendor/css/rtl/core.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/backend/vendor/css/rtl/theme-default.css') }}" />
    <link rel=" stylesheet
    " href="{{ asset('assets/backend/css/demo.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/backend/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel=" stylesheet
    " href="{{ asset('assets/backend/vendor/libs/typeahead-js/typeahead.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('assets/backend/vendor/libs/formvalidation/dist/css/formValidation.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/backend/vendor/css/pages/page-auth.css') }}">
    <script src="{{ asset('assets/backend/vendor/js/helpers.js') }}"></script>
    <script src="{{ asset('assets/backend/vendor/js/template-customizer.js') }}"></script>
    <script src="{{ asset('assets/backend/js/config.js') }}"></script>
</head>

<body>

    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <div class="card">
                    <div class="card-body">
                        <div class="app-brand justify-content-center">
                            <a href="" class="app-brand-link gap-2">
                                <span class="app-brand-logo demo">
                                    <img src="{{ asset('assets/backend/img/logo.png') }}" alt="">
                                </span>
                                {{-- <span class="app-brand-text demo text-body fw-bolder">RajuLaw</span> --}}
                            </a>
                        </div>
                        <h4 class="mb-2">Welcome to Rajulaw!</h4>
                        <p class="mb-4">Please sign-in to your account and start the adventure</p>

                        <form class="mb-3" method="post" action="{{ route('login') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 form-password-toggle">
                                {{-- <div class="d-flex justify-content-between">
                                    <label class="form-label" for="password">Password</label>
                                    <a href="auth-forgot-password-basic.html">
                                        <small>Forgot Password?</small>
                                    </a>
                                </div> --}}
                                <div class="input-group input-group-merge">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember-me">
                                        Remember Me
                                    </label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/backend/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/backend/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/backend/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/backend/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/backend/vendor/libs/hammer/hammer.js') }}"></script>
    <script src="{{ asset('assets/backend/vendor/libs/i18n/i18n.js') }}"></script>
    <script src="{{ asset('assets/backend/vendor/libs/typeahead-js/typeahead.js') }}"></script>
    <script src="{{ asset('assets/backend/vendor/js/menu.js') }}"></script>
    <script src="{{ asset('assets/backend/vendor/libs/formvalidation/dist/js/FormValidation.min.js') }}"></script>
    <script src="{{ asset('assets/backend/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/backend/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/main.js') }}"></script>
    <script src="{{ asset('assets/backend/js/pages-auth.js') }}"></script>

</body>

</html>
