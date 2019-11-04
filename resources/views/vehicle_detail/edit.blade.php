@extends('state.main') 
@section('content')
<div class="container">
  <div id="ContentPlaceHolder1_PnlShow"  style="display: inline;">
    <div class="row">
      <div class="col-sm-12">
        <div class="box box-color orange box-condensed box-bordered">
          <div class="box-title">
            <div class="col-sm-6 col-md-6">
                <h3>UPDATE VEHICLE DETAILS </h3>
            </div>
            <div class="col-sm-6 col-md-6">
                <a class="btn btn-inverse pull-right" href="{{route('vehicledetails.index')}}">Back</a>
            </div>
            <div id="add-city-form">
             <form class="well well1 form-horizontal" method="post" action="{{route('vehicledetails.update',$edata->id)}}"  enctype="multipart/form-data">
              {{csrf_field()}}
              @method('PATCH')
              
                <div class="col-md-4 col-xl-4 mt-2">
                   <span style="color: #FF0000;font-size:15px;">*</span> <label for="Vehicle No.">Vehicle No.</label>
                    @error('vch_no')
                      <span class="text-danger pull-right" role="alert">
                          <strong style="font-size: smaller;">{{ "Please enter vehicle number" }}</strong>
                      </span>
                    @enderror
                   <input id="vch_no" name="vch_no" class="form-control  " value="{{old('vch_no') ?? $edata->vch_no}}" >

                </div>
                  
                <div class="col-md-4 col-xl-4 mt-2">
                    <span style="color: #FF0000;font-size:15px;">*</span> <label for="vehicle company">Vehicle Company</label>
                     @error('vch_comp')
                          <span class="text-danger pull-right" role="alert">
                              <strong style="font-size: smaller;">{{ "Please enter vehicle company" }}</strong>
                          </span>
                      @enderror
                     <div class="inputGroupContainer">

                       <div class="input-group">
                          <select id="vch_comp" name="vch_comp" class="selectpicker form-control">
                             <option disabled="true">Select..</option>
                            @foreach($company as $comp)
                                <option  value="{{$comp->id}}" 
                                	{{$edata->vch_comp == $comp->id ? 'selected' : ''}}>{{$comp->comp_name}}</option>
                            @endforeach    
                          </select>
                        </div>
                    </div> 
                </div>
                <div class="col-md-4 col-xl-4 mt-2">
                    <span style="color: #FF0000;font-size:15px;">*</span> <label for="vehicle_model ">Vehicle Model </label>
                    @error('vch_model')
                          <span class="text-danger pull-right" role="alert">
                              <strong style="font-size: smaller;">{{ "Please enter vehicle model" }}</strong>
                          </span>
                      @enderror
                       <div class="inputGroupContainer">
                           <div class="input-group">
                            @php ($vch = App\vch_model::find($edata->vch_model))                      
                              <select id="vch_model" name="vch_model" class="selectpicker form-control">
                                 <option disabled="true">Select..</option>
                              </select>
                            </div>
                        </div> 
                    </div>
            
                <div class="col-md-6 col-xl-6 mt-2">
                    <span style="color: #FF0000;font-size:15px;">*</span> <label for=" Vehicle Owner Name"> Vehicle Owner Name</label>
                    @error('owner_name')
                          <span class="text-danger pull-right" role="alert">
                              <strong style="font-size: smaller;">{{ "Please enter owner name" }}</strong>
                          </span>
                      @enderror
                    <input id="email" type="text" name="owner_name" class="form-control  " value="{{ old('owner_name') ?? $edata->owner_name}}">

                </div>
                <div class="col-md-6 col-xl-6 mt-2">
                    <span style="color: #FF0000;font-size:15px;">*</span> <label for="Owner Address">Owner Address</label>
                    @error('owner_addr')
                          <span class="text-danger pull-right" role="alert">
                              <strong style="font-size: smaller;">{{ "Please enter owner address" }}</strong>
                          </span>
                      @enderror
                    <input id="email1" type="text" class="form-control  " name="owner_addr" value="{{ old('owner_addr') ?? $edata->owner_addr}}">

                </div>

                <div class="col-md-6 col-xl-6 mt-2">
                    <span style="color: #FF0000;font-size:15px;">*</span> <label for=" Owner PAN Card No">Owner PAN Card No</label>
                    @error('owner_pan')
                          <span class="text-danger pull-right" role="alert">
                              <strong style="font-size: smaller;">{{ "Please enter pan card number" }}</strong>
                          </span>
                      @enderror
                    <input id="email" type="text" class="form-control" name="owner_pan" value="{{ old('owner_pan') ?? $edata->owner_pan}}">

                </div>                  
                 <div class="form-group">
                 </div>
                  <div class="row">
                      <div class="box-title" style="width: 100%;">
                         <h3> <i class="fa fa-bars"></i>VEHICLE INFORMATION </h3>
                            <div class="col-md-12 m-auto">
                                <div class="card">
                                    <div class="card-body " >
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12 col-xl-12" id="mytable1">
                                                                                
                                                <div class="col-md-6 col-xl-6 mt-2">
                                                    <label for="Vehicle No.">Maker Name</label>
                                                    <input id="vehicle_no" class="form-control" name="reg_make" value="" > 
                                                </div>
                                                
                                                <div class="col-md-6 col-xl-6 mt-2">
                                                    <label for="No Of Tyres">No Of Tyres </label>
                                                    <input id="email" type="text" name="reg_no_tyres" class="form-control" value="{{ old('reg_no_tyres') }}">
                                                </div>

                                                <div class="col-md-6 col-xl-6 mt-2">
                                                    <label for="Seating Capacity">Seating Capacity</label>
                                                    <input id="email" type="text" name="reg_seating_capacity" class="form-control" value="{{ old('reg_seating_capacity') }}">
                                                </div>

                                                <div class="col-md-6 col-xl-6 mt-2">
                                                    <label for="Seating Capacity">Unladen Weight
                                                    </label>
                                                    <input id="email" type="text" name="reg_unladen_weight" class="form-control" value="{{ old('reg_unladen_weight') }}">
                                                </div>

                                                <div class="col-md-6 col-xl-6 mt-2">
                                                    <label for="Seating Capacity">Type Of Body</label>
                                                    <input id="email" type="text" name="reg_type_of_body" class="form-control" value="{{ old('reg_type_of_body') }}">
                                                </div>

                                                <div class="col-md-6 col-xl-6 mt-2">
                                                    <label for="Avg. Mileage">Avg. Mileage</label>
                                                    <input id="email1" type="text" name="reg_mileage" class="form-control" value="{{ old('reg_mileage') }}">
                                                </div>

                                                <div class="col-md-6 col-xl-6 mt-2">
                                                    <label for="Avg. Mileage">Km. Reading</label>
                                                    <input id="email1" type="text" name="reg_km_reading" class="form-control" value="{{ old('reg_km_reading') }}">
                                                </div>

                                                <div class="col-md-6 col-xl-6 mt-2">
                                                    <label for="Chasis No">Invoice No </label>
                                                    <input id="email" name="reg_invoice_no" class="form-control" value="{{ old('reg_invoice_no') }}">
                                                </div>
                                                
                                                <div class="col-md-6 col-xl-6 mt-2">
                                                    <label for="Regi. Date">Invoice date</label>
                                                     <input id="email" readonly="true" name="reg_invoice_date" type="text" class="form-control datepicker" value="">
                                                </div>

                                                <div class="col-md-6 col-xl-6 mt-2">
                                                    <label for="Manufacturer Year"> Manufacturer Year</label>
                                                    <input id="email" type="text" class="form-control" name="reg_manuf_year" value="{{old('reg_manuf_year')}}">
                                                </div>

                                                <div class="col-md-6 col-xl-6 mt-2">
                                                    <label for="Chasis Serial No.">Chassis Serial No.</label>
                                                    <input id="email1"  class="form-control" name="chassis_serial_no" value="">
                                                </div>

                                                <div class="col-md-6 col-xl-6 mt-2">
                                                    <label for="Chasis color">Chassis color</label>
                                                    <input id="email1" type="text" class="form-control  " name="chassis_color" value="">
                                                </div>

                                                <div class="col-md-6 col-xl-6 mt-2">
                                                    <label for="Body color ">Body color </label>
                                                    <input id="email1" type="text" class="form-control  " name="body_color" value="">
                                                </div>

                                                <div class="col-md-6 col-xl-6 mt-2">
                                                    <label for="Regi. Date">Registration Date</label>
                                                     <input id="email" readonly="true" name="reg_date" type="text" class="form-control datepicker" value="">
                                                </div>

                                                <div class="col-md-6 col-xl-6 mt-2">
                                                    <label for=" D. Tank Capacity">Fuel Tank Capacity</label>
                                                    <input id="email" name="reg_tank_cap" type="text" class="form-control  " value="">
                                                </div>

                                                <div class="col-md-6 col-xl-6 mt-2">
                                                    <label for="Serial No.">Engine Serial No.</label>
                                                    <input id="email1" type="" class="form-control  " name="eng_serial_no" value="">
                                                </div>

                                                <div class="col-md-6 col-xl-6 mt-2">
                                                    <label for="Power (BHP)">Horse Power</label>
                                                    <input id="email" type="" class="form-control" name="eng_power" value="">
                                                </div>

                                                <div class="col-md-6 col-xl-6 mt-2">
                                                    <label for="Fuel Type\Grade">Fuel Type</label>
                                                    <input id="email1" type="" class="form-control  " name="eng_fuel_type" value="">
                                                </div>

                                                <div class="col-md-6 col-xl-6 mt-2">
                                                    <label for="Cylinders ">No of Cylinders</label>
                                                    <input id="email1" type="text" class="form-control  " name="eng_cylinder_count" value="">
                                                </div>

                                                <div  class="col-md-6 col-xl-6 mt-2">
                                                <label for="Buyer City  ">Select image type </label>
                                                <select id="images_slc" name="images_slc" class="selectpicker form-control">
                                                    <option value="vch_pic">Vehicle Picture</option>
                                                    <option value='chasis_pic'>Chasis Picture</option>
                                                    <option value="reg_pic">Registration Book (RC)</option>
                                                    <option value="pan_pic">Owner PAN Card</option>
                                                    <option value="tds_pic">TDS Declaration</option>   
                                                </select>
                                            </div>
                                             <div  class="col-md-3 col-xl-3 mt-2" id='vehicle_pic'>
                                                <label for="Vehicle Picture">Vehicle Picture</label>
                                                <input class="image" type="file" data="vch_pic" name="vch_pic" value="">
                                            </div>

                                            <div style="display: none" class="col-md-3 col-xl-3 mt-2" id="chasis_pic">
                                                <label for="Chasis Picture">Chasis Picture</label>
                                                <input class="image"type="file" data="chasis_pic" name="chassic_pic" value="">

                                            </div>
                                            <div style="display: none" class="col-md-6 col-xl-6 mt-2" id="reg_pic">
                                                <label for="Registration Book (RC)">Registration Book (RC)</label>
                                                <input class="image"type="file" data="reg_pic" name="rc_book_pic" value="">

                                            </div>

                                            <div class="col-md-6 col-xl-6 mt-2" style="display: none" id="pan_pic">
                                                <label for="Owner PAN Card">Owner PAN Card</label>
                                                <input class="image" data="pan_pic" type="file" name="owner_pan_pic" value="">                                                    
                                            </div>
                                            <div style="display: none" class="col-md-6 col-xl-6 mt-2"  id="tds_pic">
                                                <label for="TDS Declaration">TDS Declaration</label>
                                                <input class="image" data="tds_pic" type="file" name="tds_declaration_pic" value="">
                                            </div>
                                            </div>   
                                        </div>
                                    </div>
                                </div>
                            </div>
                          <div class="form-group">
                            <div class="col-md-6" style="margin-top: 24px;">
                              <input style="margin-right: -8px;" type="submit" value="Submit" class="btn btn-primary active pull-right">
                            </div>
                          </div>
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

<script type="text/javascript">
  $(document).ready( function () {
     $(function() {
        $( ".datepicker" ).datepicker({format:'yyyy-mm-dd'});
     });
    $('#vch_comp').on('change',function(){
        var vch_comp = $('#vch_comp').val();
        $.ajax({
                url: "/vehicleget",
                type: 'POST',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {'id':vch_comp},
                success: function (data) {
                    $('#vch_model').html(data);
                }
            })
    })

    $('#registration,#chasis,#purchase,#sale,#engine,#vehicle').on('click',function(){
        var data = $(this).attr('data');
    
        if(data=='registration'){
            $('#mytable1').show();
            $('#mytable2').hide();
            $('#mytable3').hide();
            $('#mytable4').hide();
            $('#mytable5').hide();
            $('#mytable6').hide();
        }
        else if(data=='purchase'){
            $('#mytable1').hide();
            $('#mytable2').show();
            $('#mytable3').hide();
            $('#mytable4').hide();
            $('#mytable5').hide();
            $('#mytable6').hide();
        }
        else if(data == 'chasis'){
            $('#mytable1').hide();
            $('#mytable2').hide();
            $('#mytable3').show();
            $('#mytable4').hide();
            $('#mytable5').hide();
            $('#mytable6').hide();
        }
        else if(data == 'sale'){
            $('#mytable1').hide();
            $('#mytable2').hide();
            $('#mytable3').hide();
            $('#mytable4').show();
            $('#mytable5').hide();
            $('#mytable6').hide();
        }
        else if(data == 'engine'){
            $('#mytable1').hide();
            $('#mytable2').hide();
            $('#mytable3').hide();
            $('#mytable4').hide();
            $('#mytable5').show();
            $('#mytable6').hide();
        }
        else{
            $('#mytable1').hide();
            $('#mytable2').hide();
            $('#mytable3').hide();
            $('#mytable4').hide();
            $('#mytable5').hide();
            $('#mytable6').show();
        }
    });
     $('#images_slc').on('change',function(){
        var data = $(this).val();
                   
        if(data=='vch_pic'){
            $('#vehicle_pic').show();
            $('#chasis_pic').hide();
            $('#reg_pic').hide();
            $('#pan_pic').hide();
            $('#tds_pic').hide();
        }
        else if(data=='chasis_pic'){
            $('#vehicle_pic').hide();
            $('#chasis_pic').show();
            $('#reg_pic').hide();
            $('#pan_pic').hide();
            $('#tds_pic').hide();
        }

        else if(data=='reg_pic'){
            $('#vehicle_pic').hide();
            $('#chasis_pic').hide();
            $('#reg_pic').show();
            $('#pan_pic').hide();
            $('#tds_pic').hide();
        }

        else if(data=='pan_pic'){
            $('#vehicle_pic').hide();
            $('#chasis_pic').hide();
            $('#reg_pic').hide();
            $('#pan_pic').show();
            $('#tds_pic').hide();
        }

        else if(data=='tds_pic'){
            $('#vehicle_pic').hide();
            $('#chasis_pic').hide();
            $('#reg_pic').hide();
            $('#pan_pic').hide();
            $('#tds_pic').show();
        }
      });
    })  

</script>
@endsection
