@extends('template')

@section('sub_title', 'Rooms')

@section('navs')

	<li class="breadcrumb-item"><a href="{{route('Teacher.index')}}"><i class="fa fa-home fa-lg"></i></a></li>
	<li class="breadcrumb-item"><a href="{{route('trooms.index')}}">Rooms</a></li>

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

@section('sidemenu')
<li><a class="app-menu__item {{Request::is('Teacher*') ? 'active' : ''}}" href="{{route('Teacher.index')}}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>

<li><a class="app-menu__item {{Request::is('trooms*') ? 'active' : ''}}" href="{{route('trooms.index')}}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Rooms</span></a></li>

<li><a class="app-menu__item {{Request::is('roomreq*') ? 'active' : ''}}" href="{{route('roomreq')}}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Requested Rooms</span></a></li>

<li><a class="app-menu__item {{Request::is('reqrooms*') ? 'active' : ''}}" href="{{route('reqrooms')}}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Rooms Invitations</span></a></li>

<li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">UI Elements</span><i class="treeview-indicator fa fa-angle-right"></i></a>
  <ul class="treeview-menu">
	<li><a class="treeview-item" href="bootstrap-components.html"><i class="icon fa fa-circle-o"></i> Bootstrap Elements</a></li>
	<li><a class="treeview-item" href="https://fontawesome.com/v4.7.0/icons/" target="_blank" rel="noopener"><i class="icon fa fa-circle-o"></i> Font Icons</a></li>
	<li><a class="treeview-item" href="ui-cards.html"><i class="icon fa fa-circle-o"></i> Cards</a></li>
	<li><a class="treeview-item" href="widgets.html"><i class="icon fa fa-circle-o"></i> Widgets</a></li>
  </ul>
</li>
<li><a class="app-menu__item" href="charts.html"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Charts</span></a></li>
<li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Forms</span><i class="treeview-indicator fa fa-angle-right"></i></a>
  <ul class="treeview-menu">
	<li><a class="treeview-item" href="form-components.html"><i class="icon fa fa-circle-o"></i> Form Components</a></li>
	<li><a class="treeview-item" href="form-custom.html"><i class="icon fa fa-circle-o"></i> Custom Components</a></li>
	<li><a class="treeview-item" href="form-samples.html"><i class="icon fa fa-circle-o"></i> Form Samples</a></li>
	<li><a class="treeview-item" href="form-notifications.html"><i class="icon fa fa-circle-o"></i> Form Notifications</a></li>
  </ul>
</li>
<li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Tables</span><i class="treeview-indicator fa fa-angle-right"></i></a>
  <ul class="treeview-menu">
	<li><a class="treeview-item" href="table-basic.html"><i class="icon fa fa-circle-o"></i> Basic Tables</a></li>
	<li><a class="treeview-item" href="table-data-table.html"><i class="icon fa fa-circle-o"></i> Data Tables</a></li>
  </ul>
</li>
<li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-file-text"></i><span class="app-menu__label">Pages</span><i class="treeview-indicator fa fa-angle-right"></i></a>
  <ul class="treeview-menu">
	<li><a class="treeview-item" href="blank-page.html"><i class="icon fa fa-circle-o"></i> Blank Page</a></li>
	<li><a class="treeview-item" href="page-login.html"><i class="icon fa fa-circle-o"></i> Login Page</a></li>
	<li><a class="treeview-item" href="page-lockscreen.html"><i class="icon fa fa-circle-o"></i> Lockscreen Page</a></li>
	<li><a class="treeview-item" href="page-user.html"><i class="icon fa fa-circle-o"></i> User Page</a></li>
	<li><a class="treeview-item" href="page-invoice.html"><i class="icon fa fa-circle-o"></i> Invoice Page</a></li>
	<li><a class="treeview-item" href="page-calendar.html"><i class="icon fa fa-circle-o"></i> Calendar Page</a></li>
	<li><a class="treeview-item" href="page-mailbox.html"><i class="icon fa fa-circle-o"></i> Mailbox</a></li>
	<li><a class="treeview-item" href="page-error.html"><i class="icon fa fa-circle-o"></i> Error Page</a></li>
  </ul>
</li>
<li><a class="app-menu__item" href="docs.html"><i class="app-menu__icon fa fa-file-code-o"></i><span class="app-menu__label">Docs</span></a></li>
@endsection

@section('content')

	<div class="row">
        @foreach ($rooms as $row)
        @foreach($row as $room)
		<div class="mb-4 col-md-6 col-lg-3 col-sm-6" style="height: 487px;">
			<div class="card">
		  		<div class="card-body">
		   			<h5 class="card-title"> {{$room->name}} </h5>
		    		<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
		    		<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
		    		<div>
		    			<a href="{{route('hrooms.show', $room->id)}}" class="btn btn-primary">View</a>
		    			{{-- <a href="{{route('searchMember', $room->id)}}" class="btn btn-success ml-3">Invite</a> --}}
		    			<button class="btn btn-primary invite_btn ml-2" data-rid={{$room->id}}>Invite</button>
		    		</div>
		  		</div>
		  		<img src="{{$room->photo}}" class="card-img-bottom" alt="...">

			</div>
		</div>
		@endforeach
        @endforeach		
	</div>

	<div>
		<a href="{{route('trooms.create')}}" class="btn btn-primary">Join Room</a>
	</div>

@endsection