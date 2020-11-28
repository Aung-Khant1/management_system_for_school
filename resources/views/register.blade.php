<!DOCTYPE html>
<html>
<head>
	<title>MSFS</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
    <div class="col-md-8 offset-md-2 my-5">
    	<div class="text-center bg-primary py-4 text-light rounded-top">
            <h3>Sign Up</h3>
        </div>
        <div class="border border-left-1 border-right-1 border-bottom-1 rounded-bottom">
            
            <form action="{{route('user.store')}}" method="post">
                @csrf
                <div class="form-group mx-5">
                    <div class="my-4">
                        <label class="mb-3 form-control-label" for="name">Name : </label>
                        <input type="text" name="name" id="name" class="form-control form-control-lg @error('name') is-invalid @enderror" value="{{old('name')}}">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="my-4">
                        <label class="mb-3 form-control-label" for="email">Email : </label>
                        <input type="text" name="email" id="email" class="form-control form-control-lg @error('email') is-invalid @enderror" value="{{old('email')}}">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="my-4">
                        <label class="mb-3 form-control-label" for="password">Password : </label>
                        <input type="password" name="password" id="password" class="form-control form-control-lg @error('password') is-invalid @enderror">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="my-4">
                        <label class="mb-3 form-control-label" for="cpassword">Confirm password : </label>
                        <input type="password" name="password_confirmation" id="cpassword" class="form-control form-control-lg">
                    </div>

                    <div class="my-5">
	                    <div class="custom-control custom-radio custom-control-inline">
						  	<input type="radio" id="customRadioInline1" value="host" name="role" class="custom-control-input" checked="">
						  	<label class="custom-control-label" for="customRadioInline1">Host</label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
							<input type="radio" id="customRadioInline2" value="teacher" name="role" class="custom-control-input">
							<label class="custom-control-label" for="customRadioInline2">Teacher</label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
							<input type="radio" id="customRadioInline3" value="student" name="role" class="custom-control-input">
							<label class="custom-control-label" for="customRadioInline3">Student</label>
						</div>
					</div>

                    <div class="my-4">
                        <label class="mb-3 form-control-label" for="address">Address : </label>
                        <textarea class="form-control form-control-lg" name="address" id="address" style="resize: none;" rows="4" value="{{old('address')}}"></textarea>
                    </div>
                    <div class="mt-5 mb-4">
                        <input type="submit" name="submit" value="Signup" class="btn btn-outline-primary btn-block">
                    </div>

                    <div class="mt-4 mb-5 offset-md-3">
                        <p>Already have an account? <a href="{{route('login')}}" class="text-secondary">Login here</a></p>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


	<script src="{{asset('assets/js/jquery-3.3.1.min.js')}}"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>