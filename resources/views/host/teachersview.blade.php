@extends('template')

@section('sub_title')
	Teachers
@endsection
@section('navs')

	<li class="breadcrumb-item"><a href="{{route('Host.index')}}"><i class="fa fa-home fa-lg"></i></a></li>
	<li class="breadcrumb-item"><a href="{{route('Host.index')}}">Dashboard</a></li>
	<li class="breadcrumb-item"><a href="{{route('hrooms.index')}}">Rooms</a></li>
	<li class="breadcrumb-item"><a href="{{route('hrooms.show',$room->id)}}"> {{$room->name}}'s Dashboard </a></li>
	<li class="breadcrumb-item"><a href="{{url()->current()}}">Teachers</a></li>

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
	<div class="col-md-12">
		<div class="tile">
			<div class="tile-body">
				<div class="table-responsive">
					<table class="table table-hover table-bordered" id="sampleTable">
						<thead>
							<tr>
								<th>No</th>
								<th>Name</th>
								<th>Role</th>
								<th>Action</th>
								{{-- <th>Office</th>
								<th>Age</th>
								<th>Start date</th>
								<th>Salary</th> --}}
							</tr>
						</thead>
						<tbody>
							@php $i=1 @endphp
							@foreach($c as $teachers)
							@foreach($teachers as $teacher)
							<tr>
								<td> {{$i}} </td>
								<td> {{$teacher->name}} </td>
								
								{{-- <td> {{$teacher->roles[0]->name}} </td> --}}
								{{-- OR --}}
								<td> Teacher </td>
								{{-- <td>Edinburgh</td>
								<td>61</td>
								<td>2011/04/25</td>
								<td>$320,800</td> --}}
								<td>
									<a href="" class="btn btn-info">View</a>
									<a href="" class="btn btn-success mx-3">Activities</a>
									<a href="" class="btn btn-danger">Del</a>
								</td>
							</tr>
							@php $i++ @endphp
							@endforeach
							@endforeach
							{{-- {{$c[0]}} --}}
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection