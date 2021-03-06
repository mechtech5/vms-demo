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
	      <h1><i class="fa fa-truck pr-2" aria-hidden="true"></i>Fleet</h1>
	    </div>
	    <ul class="app-breadcrumb breadcrumb">
	      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
	      <li class="breadcrumb-item"><a href="{{url('fleet')}}">Fleet</a></li>
	    </ul>
	  </div>
	  <div class="row">
		<div class="col-md-12 m-auto">
			<div class="card">
				<div class="card-header">
					<div class="row">
						<div class="col-md-8 col-sm-8">
							<a href="{{url('fleet')}}" style="color: #fff;" class="btn btn-primary pull-right">Back</a>
						</div>
						 <form style="width: 100%;padding-top: 17px;" class="form-horizontal" method="post" action="{{route('fleet.update',$fleet->id)}}">
		             	 {{csrf_field()}}
		             	 @method('PATCH')
		                 <div class="form-group">

		                    <label class="col-md-4 control-label">User List</label>
		                    <div class="col-md-4 inputGroupContainer">
		                       <div class="input-group">

		                          <select name="fleet_owner" class="selectpicker form-control">
		                             <option selected=" true " disabled="true">Select..</option>
		                             @foreach($user as $users)
		                                <option <?php if($users->id == $fleet->fleet_owner){ echo 'selected' ;} ?>value="{{$users->id}}">{{$users->name}}</option>
		                             @endforeach     
		                          </select>
		                        </div>
		                         @error('fleet_user')
		                              <span class="invalid-feedback" role="alert">
		                                  <strong>{{ $message }}</strong>
		                              </span>
		                          @enderror
		                    </div>
		                 </div>

		                   <div class="form-group">
		                    <label class="col-md-4 control-label">Fleet Name</label>
		                    <div class="col-md-4 inputGroupContainer">
		                       <div class="input-group">
		                          <input id="addressLine1" name="fleet_name" class="form-control"  value="{{$fleet->fleet_name}}" type="text">
		                          @error('fleet_name')
		                            <span class="invalid-feedback d-block" role="alert">
		                               <strong>{{ $message }}</strong>
		                            </span>
		                         @enderror

		                        </div>
		                    </div>
		                  </div>

		                  <div class="form-group">
		                    <label class="col-md-4 control-label">Fleet Code</label>
		                    <div class="col-md-4 inputGroupContainer">
		                       <div class="input-group">
		                          <input id="addressLine1" readonly="true" name="fleet_code" class="form-control"  value="{{$fleet->fleet_code}}" type="text">
		                          @error('fleet_code')
		                            <span class="invalid-feedback d-block" role="alert">
		                               <strong>{{ $message }}</strong>
		                            </span>
		                         @enderror

		                        </div>
		                    </div>
		                  </div>

		                  <div class="form-group">
		                    <label class="col-md-4 control-label">Fleet Description</label>
		                    <div class="col-md-4 inputGroupContainer">
		                       <div class="input-group">
		                          <textarea id="addressLine1" name="fleet_desc" class="form-control"  value="" type="text">{{$fleet->fleet_desc}}</textarea>
		                          @error('fleet_desc')
		                            <span class="invalid-feedback d-block" role="alert">
		                               <strong>{{ $message }}</strong>
		                            </span>
		                         @enderror

		                        </div>
		                    </div>
		                  </div>
		                 <div class="form-group">
		                    <div class="col-md-5">
		                      <input style="margin-right: -8px;" type="submit" value="Submit" class="btn btn-primary active pull-right"></input>
		                    </div>
		                 </div>
		                </form>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>			

@endsection