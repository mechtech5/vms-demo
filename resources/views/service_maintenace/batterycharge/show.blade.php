@extends('state.main') 
@section('content')
<div class="container">
<div id="ContentPlaceHolder1_PnlShow"  style="display: inline;">
  <div class="row">
    <div class="col-sm-12">
      <div class="box box-color orange box-condensed box-bordered">
        <div class="box-title">
          <div class="col-sm-6 col-md-6">
              <h3>BATTERY CHARGING DETAILS</h3>
          </div>
          <div class="col-sm-3 col-md-3">
              <a style="margin-bottom: 5px;" href="{{route('batterycharge.create')}}" class="btn btn-inverse pull-right" ><i style="margin-right: 5px; " class="fas fa-plus"></i>ADD NEW</a>
          </div>
           <div class="col-sm-3 col-md-3">
             <form id="target" class="pull-right" action="{{ route('batterycharge.import') }}" method="POST" enctype="multipart/form-data">
                  {{ csrf_field() }}
                 <div class="file btn btn-inverse"><i class="fas fa-file-download"></i>
                  Import
                  <input id="file" type="file" name="file"/>
                </div>
                  <a class="btn btn-inverse" href="{{ route('batterycharge.export') }}"><i style="margin-right: 5px; " class="fas fa-file-import"></i></i>Export Bulk Data</a>

              </form>
            </div>  
       
            <table id="myTable">
              <thead>
                <tr >
                  <th style="width: 62px;">SR. NO</th>
                  <th style="width: 320px;">VEHICLE NUMBER</th>
                  <th style="width: 320px;">CHARGING DATE</th>
                  <th style="width: 150px;">KM READING</th>
                  <th style="width: 150px;">JOB DONE BY</th>
                  <th style="width: 61px;">COST</th>
                  <th style="width: 61px;">ACTION</th>
                </tr>
              </thead>
              <?php $count = 0; ?>
              @foreach($battery as $Battery) 
              @php ($vch_no = \App\vehicle_master::find($Battery->vch_id))
              
                <tr>
                  <td style="width: 8%;  padding-left: 20px;">{{++$count}}</td>
                  <td style="padding-left: 20px">{{$vch_no->vch_no}}</td>
                  <td style="width:5%; padding-left: 20px">{{$Battery->date}}</td>
                  <td style="width:20%; padding-left: 20px">{{$Battery->km_reading}}</td>
                  <td style="padding-left: 20px">{{$Battery->cost}}</td>
                   <td style="padding-left: 20px">{{$Battery->cost}}</td>
                  <td style="width:10%; text-align:center;">
                    <a href="{{route('oilchange.edit',$Battery->id)}}" runat="server" class="btn btn-success" rel="tooltip" title="" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                    <a onclick="javascript:return confirm('Do You Really Want To Delete This?');" href="{{route('oilchange.delete',$Battery->id)}}" class="btn btn-inverse" rel="tooltip" title="" data-original-title="Delete"><i class="fa fa-times"></i></a>
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
    $('#file').change(function() {
       $('#target').submit();
      });
} );

</script>
@endsection