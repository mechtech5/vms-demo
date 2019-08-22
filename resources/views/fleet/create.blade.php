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

  <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg" alt="User Image">
        <div>
          <p class="app-sidebar__user-name">{{ Auth::user()->name }}</p>
         
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item active" href="{{url('/home')}}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        <li><a class="app-menu__item active" href="{{url('admin')}}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">ACL</span></a></li>
        <li><a class="app-menu__item active" href="{{route('fleet.index')}}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Fleet</span></a></li>
      </ul>
 </aside> 

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
	  <div class="row">
		<div class="col-md-12 m-auto">
			<div class="card">
				<div class="card-header">
					<div class="row">
						 <form style="width: 100%;padding-top: 17px;" class="form-horizontal" method="post" action="{{route('fleet.store')}}">
		             	 {{csrf_field()}}
		                 <div class="form-group">
		                    <label class="col-md-4 control-label">User List</label>
		                    <div class="col-md-4 inputGroupContainer">
		                       <div class="input-group">
		                          <select name="fleet_owner" class="selectpicker form-control">
		                             <option selected=" true " disabled="true">Select..</option>
		                             @foreach($user as $users)
		                                <option value="{{$users->id}}">{{$users->name}}</option>
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
		                          <input id="addressLine1" name="fleet_name" class="form-control"  value="" type="text">
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
		                          <input id="addressLine1" name="fleet_code" class="form-control"  value="" type="text">
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
		                          <textarea id="addressLine1" name="fleet_desc" class="form-control"  value="" type="text"></textarea>
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