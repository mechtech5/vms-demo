@extends('state.main') 
@section('content')
<div class="container">
  <div id="ContentPlaceHolder1_PnlShow"  style="display: inline;">
    <div class="row">
      <div class="col-sm-12">
        <div class="box box-color orange box-condensed box-bordered">
          <div class="box-title">
            <div class="col-sm-6 col-md-6">
                <h3> DRIVER DETAILS </h3>
            </div>
            <div class="col-sm-6 col-md-6">
                <a class="btn btn-inverse pull-right" href="{{route('driver.index')}}">Back</a>
            </div>
            <div id="add-city-form">
             <form class="well form-horizontal" method="post" action="{{route('driver.update',$edata->id)}}"  enctype="multipart/form-data">
              {{csrf_field()}}
              @method('PATCH')
                 <div class="card-body " >
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-xl-12" id="mytable1">
                                                            
                            <div class="col-md-12 col-xl-12 mt-2">
                                <span style="color: #FF0000;font-size:15px;">*</span><label for="Vehicle No.">Driver Name</label>
                                <input id="vehicle_no" class="form-control" name="name" value="{{old('name') ?? $edata->name}}" > 
                                 @error('name')
		                            <span class="invalid-feedback d-block" role="alert">
		                               <strong>{{ $message }}</strong>
		                            </span>
		                         @enderror
                            </div>
                            
                            <div class="col-md-12 col-xl-12 mt-2">
                                <label for="No Of Tyres">Address</label>
                                <textarea id="email" type="text" name="address" class="form-control  " value="">{{$edata->address ?? old('address')}}</textarea>

                            </div>
                            <div class="col-md-6 col-xl-6 mt-2">
                               <label for="vehicle_model ">State</label>
                                   <select id="state_id" name="state_id" class="selectpicker form-control">
                                        <option value="0">Select..</option>
                                        @foreach($state as $states)
                                        	<option value="{{$states->id}}" 
                                        		{{ $edata->id == $states->id ? 'selected':''}}>{{$states->state_name}}</option>
                                        @endforeach		
                                    </select>                                    
                             </div>

                             <div class="col-md-6 col-xl-6 mt-2">
                                <label for="vehicle_model ">City</label>
                                   <select name="city_id" id="city_id" class="selectpicker form-control">
                                        <option selected=" true " disabled="true">Select..</option>
                                   </select>
                                    
                             </div>

                            <div class="col-md-6 col-xl-6 mt-2">
                                <label for="Chasis No">Mobile No</label>
                                 <span style="color: #FF0000;font-size:15px;">*<input id="email" name="phone" class="form-control  " value="{{ old('phone') ?? $edata->phone}}">
                                @error('phone')
		                            <span class="invalid-feedback d-block" role="alert">
		                               <strong>{{ $message }}</strong>
		                            </span>
		                         @enderror
                            </div>

                            <div class="col-md-6 col-xl-6 mt-2">
                                <span style="color: #FF0000;font-size:15px;">*</span><label for="Engine No">Licence No</label>
                                <input id="email1" class="form-control  " name="license_no" value="{{old('license_no') ?? $edata->license_no}}">
                                @error('license_no')
		                            <span class="invalid-feedback d-block" role="alert">
		                               <strong>{{ $message }}</strong>
		                            </span>
		                         @enderror
                            </div>

                             <div class="col-md-6 col-xl-6 mt-2">
                                <span style="color: #FF0000;font-size:15px;">*</span><label for="KM Reading">Licence Exp.Date </label>
                                <input id="email1" class="form-control"  name="license_exp" value="{{old('license_exp') ?? $edata->license_exp}}">
                                @error('license_exp')
		                            <span class="invalid-feedback d-block" role="alert">
		                               <strong>{{ $message }}</strong>
		                            </span>
		                         @enderror
                            </div>
                            <div class="col-md-6 col-xl-6 mt-2">
                                <label for="Regi. Date"> Join Date</label>
                                <input id="email1" type="date" class="form-control " name="joined_dt" value="{{old('joined_dt') ?? $edata->joined_dt}}">

                            </div>                          

                            <div class="col-md-6 col-xl-6 mt-2">
                                <label for=" D. Tank Capacity">Blood Group</label>
                                <input id="email" name="blood_group" type="text" class="form-control  " value="{{old('blood_group') ?? $edata->blood_group}}">

                            </div>
                            <div class="col-md-6 col-xl-6 " style="margin-top: -53px;">
                                <label for="IMEI Number">Is Working</label><br>
                               Yes <input type="radio" id="email1"  name="is_active" value="1">
                                No <input type="radio" id="email1" name="is_active" value="0">
                            </div>

                            <div class="col-md-6 col-xl-6 mt-2">
                                <label for="IMEI Number">Photo</label><br>
                                <input type="file" id="image" name="image" value="" class="image">
                                @error('image')
                                <span class="invalid-feedback d-block" role="alert">
                                   <strong>{{ $message }}</strong>
                                </span>
                             @enderror
                            </div>
                            <div class="col-md-2 col-xl-2 mt-4">
                             
                                <table class="table">
                                  <tr>
                                    <th><center>Driver Image</center></th>
                                  </tr>
                                  <tr>
                                    <td>
                                      <div  class="image">
                                          @if(!empty($edata->image))
                                             <img src="{{asset("storage/$edata->fleet_code/vehicle_driver/$edata->image")}}" width="100" height="100">
                                          @endif
                                      </div>
                                    </td>
                                  </tr>
                                </table>
                              
                            </div>
                           
                        </div>   
                         <div class="col-md-6" style="margin-top: 24px;">
                          		<input style="margin-right: -8px;" type="submit" value="Submit" class="btn btn-primary active pull-right">
                       	</div>

                    </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>    

<script type="text/javascript">
  $(document).ready( function () {
    $('#myTable').DataTable();
    
    $('#state_id').on('change',function(){
        var state_id = $('#state_id').val();
        $.ajax({
                url: "/drivercity",
                type: 'POST',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {'id':state_id},
                success: function (data) {
                   $('#city_id').html(data);
                }
            })
    })
    $(".image").change(function () {
        var img_id = $(this).attr('id');
        filePreview(this,img_id);
    });
});
  function filePreview(input,img_id) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#'+img_id+' + img').remove();
            $('.'+img_id).html('<img src="'+e.target.result+'" width="100" height="100"/>');
        }
        reader.readAsDataURL(input.files[0]);
    }
}

</script>
@endsection