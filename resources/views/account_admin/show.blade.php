@extends('layouts.ACLadmin')
@section('title','Welcom: To Admin Panel')
@section('meta')   
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
							<a style="margin-left: 18px;margin-bottom: 10px;" href="{{route('account.create')}}" id="add" type="button" class="btn btn-info">Add Account</a>

							<table class="table table-stripped table-bordered" id="fleet_table" style="width: 100%">
								<thead>
									<tr>
										<th>SNo.</th>
										<th>Account Code</th>
										<th>Owner Name</th>
										<th>Contact Number</th>
										<th>Remark</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@php  $count =0;	@endphp 
									@foreach($user as $fleets)
									<?php $users = App\User::where('id', $fleets->acc_owner)->first(); 
										?>
										<tr>
											<td  style="width: 16.66%">{{ ++$count}}</td>
											<td>{{$fleets->acc_code}}</td>
											<td>{{$users->name}}</td>
											<td>{{$fleets->contact}}</td>
											<td>{{$fleets->remarks}}</td>
											<td  style="width: 16.66%;text-align: center;">
												
												<a href="{{route('account.edit',[$fleets->id])}}"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>
												<a href="{{route('account.destroy',$fleets->id)}}"><i class="fa fa-trash fa-lg" aria-hidden="true"></i></a>
																								
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
	});

</script>

@endsection
