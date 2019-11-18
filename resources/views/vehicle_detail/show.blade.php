@extends('state.main') 
@section('content')
<div class="container">
<div id="ContentPlaceHolder1_PnlShow"  style="display: inline;">
  <div class="row">
    <div class="col-sm-12">
      <div class="box box-color orange box-condensed box-bordered">
        <div class="box-title">
          <div class="col-sm-6 col-md-6">
              <h3> VEHICLE DETAILS </h3>
          </div>
          <div class="col-sm-6 col-md-6">
            <div class="row">
              <div class="col-sm-3 col-md-3">
                 <a style="margin-bottom: 5px;" href="{{route('vehicledetails.create')}}" class="btn btn-inverse" ><i style="margin-right: 5px; " class="fas fa-plus"></i>ADD NEW</a>
               </div>
              <div class="col-sm-9 col-md-9 pull-right" style="padding-left: 46px;">
               <div class="file btn btn-inverse dropdown-toggle" data-toggle="dropdown"><i class="fa fa-file-download"></i>
                Import
              </div>
              <div class="dropdown-menu" style="width:50%;">
             {{--  first dropdown import  --}}
                 <div class="dropdown-item" > 
                    <form id="target1"  action="{{ route('vehicledetails.import') }}" method="POST" enctype="multipart/form-data">
                      {{ csrf_field() }}
                     <div class="file btn btn-inverse"><i class="fas fa-file-download"></i>
                      Import New Data
                      <input id="file1" type="file" name="file"/>
                    </div>
                  </form>
                </div>

                  {{--  second dropdown import  --}}
                <div class="dropdown-item">
                  <form id="target2"  action="{{ route('updatevehicledetails.import') }}" method="POST" enctype="multipart/form-data">
                      {{ csrf_field() }}
                     <div class="file btn btn-inverse"><i class="fas fa-file-download"></i>
                      Update Existing Data
                      <input id="file2" type="file" name="file"/>
                    </div>
                  </form>
                </div>

              </div>
                <a class="btn btn-inverse" href="{{ route('vehicledetails.export') }}"><i style="margin-right: 5px; " class="fas fa-file-import"></i>Export Bulk Data</a>
                <a class="btn btn-inverse" href="{{route('vehicledetails.download') }}"><i style="margin-right: 5px; " class="fas fa-file-import"></i>Format</a>            
          </div>
        </div>
      </div>
            <table id="myTable">
              <thead>
                <tr >
                  <th style="width: 62px;">SR. NO</th>
                  <th style="width: 410px;">VEHICLE NUMBER</th>
                  <th style="width: 410px;">VEHICLE COMPANY</th>
                  <th style="width: 410px;">VEHICLE MODEL</th>
                  <th style="width: 61px;text-align: center;">ACTION</th>
                </tr>
              </thead>
              <?php $count = 0; ?>
              @foreach($model as $models)
               <?php
                  // need to change
               		$vch_comp = \App\vch_comp::where('id',$models->vch_comp )->get();

                	$vch_model = \App\vch_model::where('id',$models->vch_model )->get();
              
               ?> 
               <tr>
                  <td style="width: 8%; padding-left: 20px;">{{++$count}}</td>
                  <td style="width: 20%;padding-left: 20px">{{$models->vch_no }}</td>
                  <td style="width: 20%;padding-left: 20px"><?php if(count($vch_comp) != 0){ echo $vch_comp[0]->comp_name; }?></td>
                  <td style="width: 20%;padding-left: 20px"><?php if(count($vch_model) != 0){ echo $vch_model[0]->model_name; }?></td>
                  <td style="width:10%; text-align:center;">
                    <a style="padding:2px 5px;" href="{{route('vehicledetails.edit',$models->id)}}" runat="server" class="btn btn-success" rel="tooltip" title="" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                    <a style="padding:2px 8px;" onclick="javascript:return confirm('Do You Really Want To Delete This?');" href="{{url('vdetails_delete',$models->id)}}" class="btn btn-inverse" rel="tooltip" title="" data-original-title="Delete"><i class="fa fa-times"></i></a>
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
<script type="text/javascript">
  $(document).ready( function () {
    $('#myTable').DataTable();
    $('#file1').change(function() {
       $('#target1').submit();
      });
    $('#file2').change(function() {
       $('#target2').submit();
      });
} );

</script>
@endsection