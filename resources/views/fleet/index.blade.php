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
	      <h1><i class="fa fa-dashboard"></i>Fleets</h1>
	    </div>
	    <ul class="app-breadcrumb breadcrumb">
	      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
	      <li class="breadcrumb-item"><a href="#">fleets</a></li>
	    </ul>
	  </div>
	  <div class="row">
		<div class="col-md-12 m-auto">
			<div class="card">
				<div class="card-header">
					<div class="row">
						<div class="col-sm-12 col-md-12 col-xl-12  table-responsive " id="mytable1">
							<a style="margin-left: 18px;margin-bottom: 10px;" href="{{route('fleet.create')}}" id="add" type="button" class="btn btn-info">Add Fleet</a>

							<table class="table table-stripped table-bordered" id="fleet_table" style="width: 100%">
								<thead>
									<tr>
										<th>SNo.</th>
										<th>Fleet Code</th>
										<th>Fleet Name</th>
										<th>Fleet Owner</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@php  $count =0;	@endphp 
									@foreach($fleet as $fleets)
									<?php $users = App\User::where('id', $fleets->fleet_owner)->first(); ?>
										<tr>
											<td  style="width: 16.66%">{{ ++$count}}</td>
											<td>{{$fleets->fleet_code}}</td>
											<td>{{$fleets->fleet_name}}</td>
											<td>{{$users->name}}</td>
											<td  style="width: 16.66%;text-align: center;">
												
												<a href="{{route('fleet.edit',[$fleets->fleet_owner])}}"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>
												<a href="{{url('fleetdestroy',$fleets->fleet_owner)}}"><i class="fa fa-trash fa-lg" aria-hidden="true"></i></a>
												<a href="{{route('fleet.show',[$fleets->id])}}"><i class="fa fa-eye fa-lg" aria-hidden="true"></i></a>
																								
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
</main>			
<script>
	$(document).ready(function(){
		$('#fleet_table').DataTable();
		$(".taskchecker").on("change", function() {
   			var id  = $('#id').val();
   			var val = [];
        	$(':checkbox:checked').each(function(i){
        		  val[i] = $(this).val();
       		 });
   			 $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
         	 });
  			$.post("/saveChanges", {'roleId':id, 'permissionId':val}, function() {

  			});
		})
	})
</script>

@endsection
