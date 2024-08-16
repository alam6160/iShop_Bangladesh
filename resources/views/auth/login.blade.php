@extends('frontend.main_master')
@section('content')
<style>
   .login-page {
    height: 98vh;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #f5f5f5;
    padding: 0;
    margin-bottom: 40px;
}

.login-page .body-content {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
}

.login-page .container {
    width: 100%;
    max-width: 400px; /* You can adjust this width as per your design */
    padding: 20px;
    background-color: #ffffff;
    box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
}

.login-page .sign-in-page {
    width: 100%;
}

.login-page .sign-in {
    width: 100%;
}

.login-page .sign-in h4 {
    text-align: center;
    margin-bottom: 20px;
}
.login-page .register h4 {
    text-align: center;
    margin-bottom: 20px;
}

.login-page .form-wrapper {
    width: 100%;
}

.login-page .form-group {
    margin-bottom: 0px;
    margin-top: 0px;
}

.login-page .btn-upper {
    width: 100%;
}

.login-page .forgot-password {
    text-align: right;
    display: block;
    margin-top: 10px;
}

.login-page .radio.outer-xs {
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.register-button{
    margin-top:20px;
}
.register{
    margin-bottom:20px;
}
.register-link{
    margin-top:10px;
}
.login-link{
    margin-top:10px;
    font-size: 16px;
}

</style>
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="home.html">Home</a></li>
                    <li class='active'>Login</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->

    <div class="login-page">
        <div class="body-content">
            <div class="container">
                <div class="sign-in-page">
                    <div class="form-wrapper">
                        <div class="sign-in">
                            <h4 class="">Sign in</h4>
                            <form method="POST" action="{{ isset($guard) ? url($guard . '/login') : route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1">User Email <span>*</span></label>
                                    <input type="text" id="email" name="email"
                                        class="form-control unicase-form-control text-input">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="info-title" for="exampleInputPassword1">Password <span>*</span></label>
                                    <input type="password" id="password" name="password"
                                        class="form-control unicase-form-control text-input" id="exampleInputPassword1">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="radio outer-xs">
                                    <label>
                                        <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2"> Remember
                                        me!
                                    </label>
                                    <a href="{{ route('password.request') }}" class="forgot-password pull-right">Forgot your
                                        Password?</a>
                                </div>
                                <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Login</button>
                                <div class="register-link">
                                    <p>Don't have an account? <a href="#" id="show-register">Create Your Account</a></p>
                                </div>
                            </form>
                        </div>

                        <div class="register" style="display: none;">
                            <h4 class="">Register</h4>
                            <hr>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="form-group">
                                    <label class="info-title" for="name">Name<span>*</span></label>
                                    <input type="text" id="name" name="name"
                                        class="form-control unicase-form-control text-input">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="info-title" for="email">Email <span>*</span></label>
                                    <input type="email" id="email" name="email"
                                        class="form-control unicase-form-control text-input">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="info-title" for="phone">phone <span>*</span></label>
                                    <input type="tel" id="phone" name="phone"
                                        class="form-control unicase-form-control text-input">
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="info-title" for="password">Password <span>*</span></label>
                                    <input type="password" id="password" name="password"
                                        class="form-control unicase-form-control text-input">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="info-title" for="password_confirmation">Confirm Password <span>*</span></label>
                                    <input type="password" id="password_confirmation" name="password_confirmation"
                                        class="form-control unicase-form-control text-input">
                                    @error('password_confirmation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn-upper btn btn-primary checkout-page-button register-button">Register</button>
                            </form>
                            <div class="login-link">
                                <p>Already have an account? <a href="#" id="show-login">Sign in</a></p>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



<script>
   document.getElementById('show-register').addEventListener('click', function(e) {
    e.preventDefault();
    document.querySelector('.login-page .sign-in').style.display = 'none';
    document.querySelector('.login-page .register').style.display = 'block';
});

document.getElementById('show-login').addEventListener('click', function(e) {
    e.preventDefault();
    document.querySelector('.login-page .register').style.display = 'none';
    document.querySelector('.login-page .sign-in').style.display = 'block';
});


</script>
@endsection
