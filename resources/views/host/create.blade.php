@extends('template')

@section('sub_title', 'Rooms')

@section('navs')

	<li class="breadcrumb-item"><a href="{{route('Host.index')}}"><i class="fa fa-home fa-lg"></i></a></li>

	<li class="breadcrumb-item"><a href="{{route('hrooms.index')}}">Rooms</a></li>
	<li class="breadcrumb-item">Create Room</li>

@endsection

@section('user_photo')
	{{asset($user->photo)}}
@endsection

@section('user_name')
	{{$user->name}}
@endsection

@section('role')
	{{$role[0]}}
@endsection

@section('content')
	
	<div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Create Room</h3>
            <div class="tile-body">
              <form class="row" action="{{route('Host.store')}}" method="post">
              	@csrf
                <div class="form-group col-md-3">
                  	<label class="control-label">Name</label>
                  	<input class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}" type="text" name="name" placeholder="Enter room name">
                  	@error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-3">
                  	<label class="control-label">Password</label>
                  	<input class="form-control @error('password') is-invalid @enderror" value="{{old('password')}}" type="password" name="password" placeholder="Enter password">
                  	@error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-4 align-self-end">
                  	<button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i> Save </button>
                </div>
              </form>
            </div>
        </div>
    </div>

@endsection