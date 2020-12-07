@extends('template')

@section('sub_title')
	{{$room->name}}'s Dashboard
@endsection
@section('navs')

	<li class="breadcrumb-item"><a href="{{route('Host.index')}}"><i class="fa fa-home fa-lg"></i></a></li>
	<li class="breadcrumb-item"><a href="{{route('Host.index')}}">Dashboard</a></li>
	<li class="breadcrumb-item"><a href="{{route('hrooms.index')}}">Rooms</a></li>
	<li class="breadcrumb-item"><a href="{{route('hrooms.show',$room->id)}}"> {{$room->name}}'s Dashboard </a></li>

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
		<div class="col-md-6 col-lg-3">
			<a href="{{route('teachersview', $room->id)}}" class="textdecoration-none">
				<div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
					<div class="info">
						<h4>Teachers</h4>
						{{-- <p><b>5</b></p> --}}
					</div>
				</div>
			</a>
		</div>
		<div class="col-md-6 col-lg-3">
			<a href="{{route('studentsview', $room->id)}}" class="textdecoration-none">
				<div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
					<div class="info">
						<h4>Students</h4>
						{{-- <p><b>5</b></p> --}}
					</div>
				</div>
			</a>
		</div>
		<div class="col-md-6 col-lg-3">
			<a href="" class="textdecoration-none">
				<div class="widget-small warning coloured-icon"><i class="icon fa fa-files-o fa-3x"></i>
					<div class="info">
						<h4>Daily Lessons</h4>
						{{-- <p><b>10</b></p> --}}
					</div>
				</div>
			</a>
		</div>
		<div class="col-md-6 col-lg-3">
			<a href="" class="textdecoration-none">
				<div class="widget-small danger coloured-icon"><i class="icon fa fa-star fa-3x"></i>
					<div class="info">
						<h4>exam results</h4>
						{{-- <p><b>500</b></p> --}}
					</div>
				</div>
			</a>
		</div>
		<div class="col-md-6 col-lg-3">
			<a href="" class="textdecoration-none">
				<div class="widget-small info coloured-icon"><i class="icon fa fa-thumbs-o-up fa-3x"></i>
					<div class="info">
						<h4>Attendances</h4>
						{{-- <p><b>25</b></p> --}}
					</div>
				</div>
			</a>
		</div>
		<div class="col-md-6 col-lg-3">
			<a href="" class="textdecoration-none">
				<div class="widget-small warning coloured-icon"><i class="icon fa fa-files-o fa-3x"></i>
					<div class="info">
						<h4>Assignments</h4>
						{{-- <p><b>10</b></p> --}}
					</div>
				</div>
			</a>
		</div>
		<div class="col-md-6 col-lg-3">
			<a href="" class="textdecoration-none">
				<div class="widget-small warning coloured-icon"><i class="icon fa fa-files-o fa-3x"></i>
					<div class="info">
						<h4>old questions</h4>
						{{-- <p><b>500</b></p> --}}
					</div>
				</div>
			</a>
		</div>
		<div class="col-md-6 col-lg-3">
			<a href="" class="textdecoration-none">
				<div class="widget-small warning coloured-icon"><i class="icon fa fa-question fa-3x"></i>
					<div class="info">
						<h4>quizzes</h4>
						{{-- <p><b>500</b></p> --}}
					</div>
				</div>
			</a>
		</div>
	</div>

@endsection