@extends('template')

@section('sub_title', 'Rooms')

@section('navs')

	<li class="breadcrumb-item"><a href="{{route('Host.index')}}"><i class="fa fa-home fa-lg"></i></a></li>
	<li class="breadcrumb-item"><a href="{{route('hrooms.index')}}">Rooms</a></li>

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
<li><a class="app-menu__item {{Request::is('Host*') ? 'active' : ''}}" href="{{route('Host.index')}}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>

<li><a class="app-menu__item {{Request::is('hrooms*') ? 'active' : ''}}" href="{{route('hrooms.index')}}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Rooms</span></a></li>

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
		@foreach($rooms as $row)
		<div class="mb-4 col-md-6 col-lg-3 col-sm-6" style="height: 487px;">
			<div class="card">
		  		<div class="card-body">
		   			<h5 class="card-title"> {{$row->name}} </h5>
		    		<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
		    		<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
		    		<div>
		    			<a href="{{route('hrooms.show', $row->id)}}" class="btn btn-primary">View</a>
		    			{{-- <a href="{{route('searchMember', $row->id)}}" class="btn btn-success ml-3">Invite</a> --}}
		    			<button class="btn btn-primary invite_btn ml-2" data-rid={{$row->id}}>Invite</button>
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

@section('script')

<script type="text/javascript">
	$.ajaxSetup({
    	headers: {
        	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   		}
	});


	$(document).ready(function() {
		$('.invite_btn').click(function() {
			var rrid = $(this).data("rid");
		
			Swal.fire({
				title: 'User ID',
				input: 'text',
				inputAttributes: {
					autocapitalize: 'off'
				},
				showCancelButton: true,
				confirmButtonText: 'Search',
				inputValidator: (value) => {
				    if (!value) {
				      return 'You need to type user id!'
				    }
				  },
				allowOutsideClick: () => !Swal.isLoading()
				}).then((value) => {
					if (value.isConfirmed) {
					var search = value.value;
					// console.log(search)
					$.post("{{route('search')}}", {search: search}, function(response) {
						// console.log(response)
						
						if (response.length > 0 && response.length < 2) {
							var uuid = response[0].id;
							Swal.fire({
								html: "<div class='container-fluid' px-n2 mx-n2><div style='background-color: #eee; line-height: 5rem;'><div class='row'><div class='col-md-4'><img src='"+response[0].photo+"' width='50' height='50'></div><div class='col-md-6'><b>"+response[0].name+"</b></div></div></div></div>",
								confirmButtonText: 'Invite',
								showCancelButton: true,
								// showLoaderOnConfirm: true,
							}).then((result)=>{
								// console.log(result)
								if (result.isConfirmed) {
									var rid = rrid;
									var uid = uuid;
									// console.log(uid);
									$.post("{{route('adduser')}}", {
							    		uid: uid,
							    		rid: rid,
							    	}, function(response) {
							    		// console.log(response)
							    		if (response.length > 0) {
							    			Swal.fire({
												icon: 'error',
												title: response,
												
											})
							    		}else{
							    			Swal.fire({
												icon: 'success',
												title: 'Request Successful',
											});
							    		};
									});
								}
							})
						}else {
							Swal.fire({
					    		text: "There is no user that you are looking for."
					 		});
						}
					});
				}
				});

		});



	});

	


</script>

@endsection