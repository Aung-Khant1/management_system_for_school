@extends('template')

@section('sub_title')
    {{$room->name}}'s Dashboard
@endsection

@section('navs')

	<li class="breadcrumb-item"><a href="{{route('Teacher.index')}}"><i class="fa fa-home fa-lg"></i></a></li>
    <li class="breadcrumb-item"><a href="{{route('Teacher.index')}}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{route('trooms.index')}}">Rooms</a></li>
	<li class="breadcrumb-item"><a href="{{route('trooms.show',$room->id)}}"> {{$room->name}}'s Dashboard </a></li>

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
    <div class="col-md-6 col-lg-3">
        <a href="{{route('tteachersview', $room->id)}}" class="textdecoration-none">
            <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
                <div class="info">
                    <h4>Teachers</h4>
                    <p style="color: red;"><b> {{$tcount}} </b></p>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-6 col-lg-3">
        <a href="{{route('tstudentsview', $room->id)}}" class="textdecoration-none">
            <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
                <div class="info">
                    <h4>Students</h4>
                    <p style="color: red;"><b> {{$scount}} </b></p>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-6 col-lg-3">
        <a href="" class="textdecoration-none">
            <div class="widget-small info coloured-icon"><i class="icon fa fa-thumbs-o-up fa-3x"></i>
                <div class="info">
                    <h4>Attendances</h4>
                    {{-- <p style="color: red;"><b>25</b></p> --}}
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-6 col-lg-3">
        <a href="" class="textdecoration-none">
            <div class="widget-small danger coloured-icon"><i class="icon fa fa-star fa-3x"></i>
                <div class="info">
                    <h4>exam results</h4>
                    {{-- <p style="color: red;"><b>500</b></p> --}}
                </div>
            </div>
        </a>
    </div>
    
    <div class="col-md-6 col-lg-3">
        <a href="" class="textdecoration-none">
            <div class="widget-small warning coloured-icon"><i class="icon fa fa-files-o fa-3x"></i>
                <div class="info">
                    <h4>Daily Lessons</h4>
                    {{-- <p style="color: red;"><b>10</b></p> --}}
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-6 col-lg-3">
        <a href="" class="textdecoration-none">
            <div class="widget-small warning coloured-icon"><i class="icon fa fa-files-o fa-3x"></i>
                <div class="info">
                    <h4>Assignments</h4>
                    {{-- <p style="color: red;"><b>10</b></p> --}}
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-6 col-lg-3">
        <a href="" class="textdecoration-none">
            <div class="widget-small warning coloured-icon"><i class="icon fa fa-files-o fa-3x"></i>
                <div class="info">
                    <h4>old questions</h4>
                    {{-- <p style="color: red;"><b>500</b></p> --}}
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-6 col-lg-3">
        <a href="" class="textdecoration-none">
            <div class="widget-small warning coloured-icon"><i class="icon fa fa-question fa-3x"></i>
                <div class="info">
                    <h4>quizzes</h4>
                    {{-- <p style="color: red;"><b>500</b></p> --}}
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-6 col-lg-3">
        <a href="{{route('tinvitemember', $room->id)}}" class="textdecoration-none">
            <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
                <div class="info">
                    <h4> Invite Member </h4>
                    <p style="color: red;"><b>  </b></p>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-6 col-lg-3">
        <a href="{{route('memberrequest', $room->id)}}" class="textdecoration-none">
            <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
                <div class="info">
                    <h4> Members Request </h4>
                    <p style="color: red;"><b> {{$rcount}} </b></p>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-6 col-lg-3">
        <a href="{{route('invitedmember', $room->id)}}" class="textdecoration-none">
            <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
                <div class="info">
                    <h4> Invited Members </h4>
                    <p style="color: red;"><b> {{$icount}} </b></p>
                </div>
            </div>
        </a>
    </div>
</div>

@endsection