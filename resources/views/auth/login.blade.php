<!DOCTYPE html>
<html>
<head>
    <title>MSFS</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <div class="col-md-8 offset-md-2 my-5" style="margin-bottom: 200px !important;margin-top: 120px !important;">
        <div class="text-center bg-primary py-4 text-light rounded-top">
            <h3>Login</h3>
        </div>
        <div class="border border-left-1 border-right-1 border-bottom-1 rounded-bottom">
            <form action="{{route('login')}}" method="post">
                @csrf
                <div class="form-group mx-5">
                    
                    <div class="my-4">
                        <label class="mb-3 form-control-label" for="email">Email : </label>
                        <input type="text" name="email" id="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                             </span>
                        @enderror
                    </div>
                    <div class="my-4">
                        <label class="mb-3 form-control-label" for="password">Password : </label>
                        <input type="password" name="password" id="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    
                    <div class="mt-5 mb-4">
                        <input type="submit" name="submit" value="Signin" class="btn btn-outline-success btn-block">          
                    </div>

                    <div class="mt-4 mb-5 offset-md-3">
                        <p>Don't you have an account? <a href="{{route('register')}}" class="text-secondary">Signup here</a></p>
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