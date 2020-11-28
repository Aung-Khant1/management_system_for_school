@extends('template')

@section('sub_title', 'Rooms')

@section('navs')

	<li class="breadcrumb-item"><a href="{{route('Host.index')}}"><i class="fa fa-home fa-lg"></i></a></li>
	<li class="breadcrumb-item"><a href="{{route('hrooms')}}">Rooms</a></li>

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

	<div class="row">
		@foreach($rooms as $row)
		<div class="mb-4 col-md-3" style="height: 487px;">
			<div class="card">
		  		<div class="card-body">
		   			<h5 class="card-title"> {{$row->name}} </h5>
		    		<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
		    		<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
		    		<div>
		    			<a href="" class="btn btn-primary">View</a>
		    			<a href="" class="btn btn-success ml-3">Invite</a>
		    		</div>
		  		</div>
		  		<img src="{{$row->photo}}" class="card-img-bottom" alt="...">
			</div>
		</div>
		@endforeach
	</div>

	<div>
		<a href="{{route('Host.create')}}" class="btn btn-primary">Create Room</a>
	</div>

@endsection