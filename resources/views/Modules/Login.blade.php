@extends('layouts.main')
@section('content')

	<link rel="icon" type="image/png" href="{{asset('css/login/images/icons/favicon.ico')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/login/vendor/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/login/vendor/animate/animate.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/login/vendor/css-hamburgers/hamburgers.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/login/vendor/animsition/css/animsition.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/login/vendor/select2/select2.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/login/vendor/daterangepicker/daterangepicker.css')}}">
	<link rel="stylesheet" href="{{ asset('css/all.css') }}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/login/css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/login/css/main.css')}}">

	
	<div class="limiter">	
		@if (session('warning'))
		<div id="warning-alert" class="alert alert-warning" style="position: relative;;">
			{{ session('warning') }}
		</div>
	@endif
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="post" action="{{ route('hust.login') }}">
                    @csrf
					<span class="login100-form-title p-b-43" style="font-weight:700;">
						Login
					</span>
					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="email">
						<span class="focus-input100"></span>
						<span class="label-input100">Email</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="password">
						<span class="focus-input100"></span>
						<span class="label-input100">Password</span>
					</div>
                    <div class="form-group row">
                        <div class="form-check">
                        <div class="input-group" style="margin-left: 17px;">
                        <div class="input-group-text" style="display:flex; align-items:center; font-size:13px; margin-right:10px;">
                        <input type="radio" checked class="mr-3" name="role" value="1" id="Teacher">
                        <label class="form-check-label" for="Teacher"> Giảng viên </label>
                        </div>
                       <div class="input-group-text" style="display:flex; align-items:center; font-size:13px">
                        <input type="radio" class="mr-3" name="role" value="0" id="Student">
                        <label class="form-check-label" for="Student"> Học Sinh / Sinh Viên </label>
                       </div>
                       </div>
                       </div>
                       </div>
					<div class="flex-sb-m w-full p-t-3 p-b-32">
						<div>
							<a href="#" class="txt1">
								Forgot Password?
							</a>
						</div>
					</div>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" style="margin-bottom:10px;">
							Login
						</button>
					</div>
				</form>

				<div class="login100-more" style="background-image: url('{{asset('css/login/tintuc.jpg')}}');">
				</div>
			</div>
		</div>
	</div>
	
	{{-- <button class="login100-form-btn" style="margin-bottom:10px;" onclick="showPopup()">
        Login
    </button>

    <div id="popup" class="popup">
        <div class="popup-content">
            <h2>Xin lỗi </h2>
            <p>Xin.</p>
            <button onclick="hidePopup()">Close</button>
        </div>
    </div>

    <script>
        function showPopup() {
            var popup = document.getElementById("popup");
            popup.classList.add("show");
        }

        function hidePopup() {
            var popup = document.getElementById("popup");
            popup.classList.remove("show");
        }
    </script> --}}
{{-- </body>
</html> --}}

	
	
<!--===============================================================================================-->
	<script src="{{asset('css/login/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('css/login/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('css/login/vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{asset('css/login/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('css/login/vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('css/login/vendor/daterangepicker/moment.min.js')}}"></script>
	<script src="{{asset('css/login/vendor/daterangepicker/daterangepicker.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('css/login/vendor/countdowntime/countdowntime.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('css/login/js/main.js')}}"></script>

</body>
</html>
@endsection
