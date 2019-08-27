@extends('layouts.ACLadmin')
@section('title','Welcom: To Admin Panel')
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
		                          <input id="addressLine1" name="fleet_name" class="form-control"  value="{{old('fleet_name')}}" type="text">
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
		                          <input id="addressLine1" name="fleet_code" class="form-control"  value="{{old('fleet_code')}}" type="text">
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
		                          <textarea id="addressLine1" name="fleet_desc" class="form-control"  value="" type="text">{{old('fleet_desc')}}</textarea>
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