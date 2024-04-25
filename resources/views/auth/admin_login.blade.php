<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Admin Login | </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.png') }}">

    <link rel="stylesheet" href="{{ asset('backend/assets/vendors/core/core.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/fonts/feather-font/css/iconfont.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/demo_1/style.css') }}">

</head>

<body class="sidebar-dark bg-secondary">
    <div class="main-wrapper">
        <div class="page-wrapper full-page">
            <h4 class="text-center text-primary mt-5">Finance Admin Login</h4>

            <div class="page-content d-flex align-items-center justify-content-center">

                <div class="row w-100 mx-0 auth-page">
                    <div class="col-md-8 col-xl-6 mx-auto">
                        <div class="card">
                            <div class="row">
                                <div class="col-md-4 pr-md-0">
                                    <div class="auth-left-wrapper">
                                        {{-- <img src="{{ asset('backend/assets/images/money.jpg') }}" class="img-responsive"
                                             alt=""> --}}
                                    </div>
                                </div>
                                <div class="col-md-8 pl-md-0">
                                    <div class="auth-form-wrapper px-4 py-5">
                                        <a href="/" class="noble-ui-logo d-block mb-2"><img
                                                src="{{ asset('backend/assets/images/finance-logo.jpg') }}"
                                                height="70" class="logo-light mx-auto" alt=""></a>
                                        <h5 class="text-muted font-weight-normal mb-4">Welcome back Admin! Log in to
                                            your account.</h5>
                                        <form class="forms-sample" method="POST"
                                            action="{{ isset($guard) ? url($guard . '/login') : route('login') }}">
                                            @csrf
                                            <div class="form-group">
                                                <label for="email">Email address</label>
                                                <input class="form-control" type="email" required=""
                                                    placeholder="E-Mail" id="email" name="email">
                                            </div>
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input class="form-control" type="password" required=""
                                                    placeholder="Password" id="password" name="password">
                                            </div>
                                            <div class="form-check form-check-flat form-check-primary">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input">
                                                    Remember me
                                                </label>
                                            </div>
                                            {{-- <div class="mt-3">
                            <a href="{{ route('admin.login') }}" class="btn btn-primary mr-2 mb-2 mb-md-0 text-white">Login</a>
                            <button type="submit" class="btn btn-outline-primary btn-icon-text mb-2 mb-md-0">
                              <i class="btn-icon-prepend" data-feather="twitter"></i>
                              Login with twitter
                            </button>
                          </div> --}}
                                            {{-- <a href="register.html" class="d-block mt-3 text-muted">Not a user? Sign up</a> --}}
                                            <button type="submit"
                                                class="btn btn-outline-primary btn-icon-text mb-2 mb-md-0">Log
                                                In</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="{{ asset('backend/assets/vendors/core/core.js') }}"></script>
    <script src="{{ asset('backend/assets/vendors/core/core.js') }}"></script>
    <script src="{{ asset('backend/assets/vendors/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/template.js') }}"></script>
</body>

</html>
