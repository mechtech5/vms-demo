@extends('state.main') 
@section('content')
<div class="container">
<div id="ContentPlaceHolder1_PnlShow"  style="display: inline;">
  <div class="row">
    <div class="col-sm-12">
      <div class="box box-color orange box-condensed box-bordered">
        <div class="box-title">
          <div class="col-sm-6 col-md-6">
              <h3>FUEL FILLED DETAILS  </h3>
          </div>
           <div class="col-sm-2 col-md-2">
              <a style="margin-bottom: 5px;" href="{{route('fuelentry.create')}}" class="btn btn-inverse pull-right" ><i style="margin-right: 5px; " class="fas fa-plus"></i>ADD NEW</a>
          </div>
          <div class="col-sm-4 col-md-4">
           <form id="target" class="pull-right" action="{{ route('fuelentry.import') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
               <div class="file btn btn-inverse"><i class="fas fa-file-download"></i>
                Import
                <input id="file" type="file" name="file"/>
              </div>
                <a class="btn btn-inverse" href="{{ route('fuelentry.export') }}"><i style="margin-right: 5px; " class="fas fa-file-import"></i></i>Export Bulk Data</a>
                <a class="btn btn-inverse" href="{{route('fuelentry.download') }}"><i style="margin-right: 5px; " class="fas fa-file-import"></i></i>Format</a>

            </form>  
                       
          </div>
                
            <table id="myTable">
              <thead>
                <tr >
                  <th style="width: 100px;">SR NO.</th>
                  <th style="width: 100px;">VEHICLE NO</th>
                  <th style="width: 320px;">PUMP NAME</th>
                  <th style="width: 320px;">DATE</th>
                  <th style="width: 320px;">CURRENT DIESEL</th>
                  <th style="width: 320px;">AMOUNT </th>
                  <th style="width: 320px;">AVERAGE/MILEAGE</th>
                  <th style="width: 61px;">ACTION</th>
                </tr>
              </thead>
              
              <?php $count = 0; ?>
              @foreach($fuel as $Fuel) 
                @php ($vehicle = App\vehicle_master::find($Fuel->vch_id))   
                @php ($pump    = App\Models\PetrolPump::find($Fuel->fuel_stn_id))                
                <tr>
                  <td style="width: 10%;  padding-left: 20px;">{{++$count}}</td>
                  <td style="width: 17%;padding-left: 20px">{{$vehicle->vch_no}}</td>
                  <td style="width: 14%; padding-left: 20px">{{$pump->pump_name}}</td>
                  <td style="width: 14%; padding-left: 20px">{{$Fuel->date}}</td>
                  <td style="width: 14%; padding-left: 20px">{{$Fuel->current_diesel_filled}}</td>
                  <td style="width: 14%; padding-left: 20px">{{$Fuel->total_fuel_amt}}</td>
                  <td style="width: 14%; padding-left: 20px">{{$Fuel->avg_obtained}}</td>
                  <td style="width:10%; text-align:center;">
                    <a style="padding: 2px 5px;" href="{{route('fuelentry.edit',$Fuel->id)}}" runat="server" class="btn btn-success" rel="tooltip" title="" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                    <a style="padding: 2px 7px;" onclick="javascript:return confirm('Do You Really Want To Delete This?');" href="{{route('fuelentry.delete',$Fuel->id)}}" class="btn btn-inverse" rel="tooltip" title="" data-original-title="Delete"><i class="fa fa-times"></i></a>
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