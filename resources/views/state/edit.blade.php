@extends('state.main') 
@section('content')
<div class="container">
  <div id="ContentPlaceHolder1_PnlShow"  style="display: inline;">
    <div class="row">
      <div class="col-sm-12">
        <div class="box box-color orange box-condensed box-bordered">
          <div class="box-title">
            <div class="col-sm-6 col-md-6">
                <h3> STATE DETAILS </h3>
            </div>
            <div class="col-sm-6 col-md-6">
                <button class="btn btn-inverse pull-right" onclick="">ADD NEW</button>
            </div>
            <div id="add-state-form">

               <form class="form-horizontal" method="post" action="{{route('state.update',$data[0]->id)}}">
                {{csrf_field()}}
                @method('PATCH')
                  <div class="row">
                   <div class="col-md-2 col-sm-2">
                   </div> 
                    <div class="col-md-2 col-sm-2 state-form-input">
                      <label class="control-label pull-right" for="email"><span style="color: #FF0000; font-size:20px;">*</span>State Name :</label>                   
                    </div>
                    <div class="col-md-5 col-sm-5 state-form-input">    
                        <input class="form-control " value="{{old('state') ?? $data[0]->state_name}}" id="email" name="state">                      
                      @error('state')
                      <span class="invalid-feedback d-block" role="alert">
                         <strong>{{ 'Please enter state name in characters' }}</strong>
                      </span>
                     @enderror
                    </div>
                  </div>
                  <div class="row mt-3" >
                    <div class="col-md-2 col-sm-2">
                    </div> 
                    <div class="col-md-2 col-sm-2 state-form-input">
                      <label class="control-label pull-right" for="email"><span style="color: #FF0000; font-size:20px;">*</span>State Short Name :</label>                   
                    </div>
                    <div class="col-md-5 col-sm-5 state-form-input ">             
                      <input class="form-control" id="pwd" value="{{old('state_short') ?? $data[0]->state_code}}" name="state_short">
                      @error('state_short')
                      <span class="invalid-feedback d-block" role="alert">
                         <strong>{{ 'Please enter state short name in characters (maximum length 3)' }}</strong>
                      </span>
                     @enderror
                    </div>                     
                      
                  </div>                                   
                  <div class="row">         
                      <div class="col-sm-12 col-sm-10 text-center mt-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
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