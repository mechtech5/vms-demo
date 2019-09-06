@extends('state.main') 
@section('content')
<div class="container">
  <div id="ContentPlaceHolder1_PnlShow"  style="display: inline;">
    <div class="row">
      <div class="col-sm-12">
        <div class="box box-color orange box-condensed box-bordered">
          <div class="box-title">
            <div class="col-sm-6 col-md-6">
                <h3> ADD TYRE MODEL </h3>
            </div>
            <div class="col-sm-6 col-md-6">
                <a class="btn btn-inverse pull-right" href="{{route('tyremodel.index')}}">Back</a>
            </div>
            <div id="add-city-form">
             <form class="well form-horizontal" method="post" action="{{route('tyremodel.update',$data->id)}}">
              {{csrf_field()}}
              @method('PATCH')
                 <div class="form-group">
                    <label class="col-md-4 control-label"><span style="color: #FF0000;font-size:15px;">*</span> Tyre Company</label>
                    <div class="col-md-5 inputGroupContainer">
                       <div class="input-group">
                          <select name="comp_id" class="selectpicker form-control">
                             <option selected=" true " disabled="true">Select..</option>
                             @foreach($company as $company)
                                <option {{ $company->id == $data->comp_id ? 'selected':'' }} value="{{$company->id}}">{{$company->comp_name}}</option>
                             @endforeach     
                          </select>
                        </div>
                         @error('comp_id')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                    </div>
                 </div>
                 <div class="form-group">
                    <label class="col-md-4 control-label"><span  style="color: #FF0000;font-size:15px;">*</span>Model Name</label>
                    <div class="col-md-5 inputGroupContainer">
                       <div class="input-group">
                          <input id="addressLine1" name="model_name" class="form-control"  value="{{old('model_name') ?? $data->model_name}}" type="text">
                          @error('model_name')
                            <span class="invalid-feedback d-block" role="alert">
                               <strong>{{ $message }}</strong>
                            </span>
                         @enderror

                        </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-4 control-label">Model Description</label>
                    <div class="col-md-5 inputGroupContainer">
                       <div class="input-group">
                          <textarea id="addressLine1" name="model_desc" class="form-control"  value="" type="text"> {{old('model_desc') ?? $data->model_desc}}</textarea>
                          @error('model_desc')
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
    </div>
  </div>
</div>    

<script type="text/javascript">
  $(document).ready( function () {
    $('#myTable').DataTable();


} );

</script>
@endsection