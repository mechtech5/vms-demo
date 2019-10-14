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
	      <h1><i class="fa fa-user pr-2"></i>User</h1>
	    </div>
	    <ul class="app-breadcrumb breadcrumb">
	      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
	      <li class="breadcrumb-item"><a href="{{url('accountuser')}}">User</a></li>
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
							<a style="margin-bottom: 10px;" href="{{route('accountuser.create')}}" id="add" type="button" class="btn btn-info">Add User</a>
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
											<td style="width: 16.66%">{{ ++$count}}</td>
											<td>{{$users->name}}</td>
											<td>{{$users->email}}</td>
											<td style="width: 16.66%;text-align: center;">
												<a href="{{route('accountuser.edit',$users->id)}}"><i class="fa-lg fa fa-pencil-square-o" aria-hidden="true"></i></a>
												<a href="{{route('destroy.account',$users->id)}}"><i class="fa-lg fa fa-trash" aria-hidden="true"></i></a>	
												<a href="{{route('accountuser.show',[$users->id])}}"><i class="fa fa-eye fa-lg" aria-hidden="true"></i></a>									
											</td>
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
</main>			

<script>
	$(document).ready(function(){		
		$('#account_table').DataTable();		
	})	
</script>

@endsection