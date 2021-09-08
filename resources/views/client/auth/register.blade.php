@extends('layouts.client_layout.client')

@section('pagetitle', 'Login - ' . config('app.name'))

<!-- start content -->
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 mt-5 cart-wrap ftco-animate">
                <div class="login-card mb-3 ">
                    <h1>Register</h1>
                    <form action="#" class="info">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input id="name" type="text" class="form-control text-left px-3" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input id="email" type="email" class="form-control text-left px-3" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input id="password" type="password" name="password" class="form-control text-left px-3"
                                placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password</label>
                            <input id="password_confirmation" name="password_confirmation" type="password"
                                class="form-control text-left px-3" placeholder="">
                        </div>
                    </form>
                    <div class="signin-row">
                        <div class="login-btn">
                            <a href="checkout.html" class="btn btn-primary py-3 px-4">Sign Up</a>
                        </div>
                    </div>
                    <div class="footer">
                        <p>
                            Already registered? <a href="{{ route('login') }}">Login Here</a>
                        </p>
                    </div>
                </div>


            </div>

            <!-- .col-md-8 -->
        </div>
    </div>
    <!-- .section -->
@endsection

@push('styles')
    <style>
        /* Page Specific Custom Style Here */
        h1 {
            font-size: 24px;
            text-align: center;
        }

        .mt-5 {
            margin-bottom: 3rem;
        }

        .login-card {
            width: 100%;
            display: block;
            border: 1px solid rgba(0, 0, 0, 0.05);
            padding: 20px;
        }

        .login-card h3 {
            font-size: 16px;
            margin-bottom: 20px;
        }

        .signin-row {
            margin-top: 30px;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
        }

        .footer {
            margin-top: 20px;
            margin-bottom: 20px;
        }

    </style>
@endpush

@push('scripts')
    <script>
        /* Page Specific Custom Script Here */
    </script>
@endpush
