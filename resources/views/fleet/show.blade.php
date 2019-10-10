@extends('layouts.ACLadmin')
@section('title','Welcom: To Admin Panel')
@section('meta')
    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <!-- Twitter meta-->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@pratikborsadiya">
    <meta property="twitter:creator" content="@pratikborsadiya">
    <!-- Open Graph Meta-->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Vali Admin">
    <meta property="og:title" content="Vali - Free Bootstrap 4 admin theme">
    <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
    <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
    <meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

@endsection
@section('content') 

 <main class="app-content">
	  <div class="app-title">
	    <div>
	      <h1><i class="fa fa-dashboard"></i>ACL</h1>
	    </div>
	    <ul class="app-breadcrumb breadcrumb">
	      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
	      <li class="breadcrumb-item"><a href="#">ACL</a></li>
	    </ul>
	  </div>
	  @if(session('success'))
         <div class="alert alert-danger">
            {{session('success')}}
        </div>
      @endif
	   <div class="row">
		<div class="col-md-12 m-auto">
			<div class="card">
				
				<div class="card-body " >
					<div class="row">						
			
						<div class="col-sm-12 col-md-12 col-xl-12  table-responsive " id="mytable3">
							<a style="margin-left: 18px;margin-bottom: 10px;" onclick="showModal()"  id="add" type="button" class="btn btn-info">Add User</a>
							<div id = 'table_refresh'>
								<table class="table table-stripped table-bordered" id="account_table" style="width: 100%">
									<thead>
										<tr>
											<th>SNo.</th>
											<th>User</th>
											<th>Email</th>	
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										@php  $count =0;	@endphp 
										@foreach($user as $users)
											<tr>
												<td style="width: 30%">{{ ++$count}}</td>
												<td style="width: 30%">{{$users->name}}</td>
												<td style="width: 30%">{{$users->email}}</td>					
												<td style="width: 10%"><a href="{{route('fleet_user.delete',$users->id)}}"><i class="fa-lg fa fa-trash" aria-hidden="true"></i></a>	</td>
											</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<input type="hidden" id="fleet_id" value="{{$fleet_id}}">
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <table class="table table-stripped table-bordered" id="account_table" style="width: 100%">
				<thead>
					<tr>
						<th>SNo.</th>
						<th>User</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@php  $count =0;	@endphp 
					@foreach($model_user as $user)					
						<tr>
							<td style="width: 16.66%">{{ ++$count}}</td>
							<td>{{$user->name}}</td>							
							<td style="width: 16.66%;text-align: center;">
								<input type="checkbox" id='add_user' data-id='{{ $user->id }}'>		
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
      </div>
      <div class="modal-footer">      	
        <button type="button" id='submit_btn' class="btn btn-success">Submit</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</main>	

<script>
	$(document).ready(function(){		
		$('#account_table').DataTable();		
	})	

	function showModal() {
  		$('#myModal').modal('show');
	}

	$(document).on('click','#submit_btn',function(event){
  		event.preventDefault();
  		var ids      = [];
  		var fleet_id = $('#fleet_id').val();

		$('input[id="add_user"]:checked').each(function() {
		   ids.push($(this).attr('data-id')); 
		});
		$.ajax({
            url: '/add_on_fleet',
            type: 'POST',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {id:ids,fleet_id:fleet_id},
            success: function (data) {
               $('#table_refresh').html(data);
            }
        })
	});
</script>

@endsection