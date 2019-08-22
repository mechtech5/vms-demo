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
                <a class="btn btn-inverse pull-right" href="{{route('state.index')}}">Back</a>
            </div>
            <div id="add-state-form">
               <form class="form-horizontal" method="post" action="{{route('state.store')}}">
                {{csrf_field()}}
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="email"><span style="color: #FF0000; font-size:20px;">*</span>State Name :</label>
                    <div class="col-sm-10 state-form-input">
                      <input class="form-control " id="email" name="state">
                    
                    @error('state')
                    <span class="invalid-feedback d-block" role="alert">
                       <strong>{{ $message }}</strong>
                    </span>
                   @enderror
                   </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="pwd"><span style="color: #FF0000; font-size:20px;">*</span>State Short Name:</label>
                    <div class="col-sm-10 state-form-input">          
                      <input class="form-control" id="pwd" name="state_short">
                    
                    @error('state_short')
                    <span class="invalid-feedback d-block" role="alert">
                       <strong>{{ $message }}</strong>
                    </span>
                   @enderror
                   </div>
                  </div>
                  <div class="form-group">        
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-default">Submit</button>
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