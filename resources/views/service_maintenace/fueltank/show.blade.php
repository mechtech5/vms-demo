@extends('state.main') 
@section('content')
<div class="container">
<div id="ContentPlaceHolder1_PnlShow"  style="display: inline;">
  <div class="row">
    <div class="col-sm-12">
      <div class="box box-color orange box-condensed box-bordered">
        <div class="box-title">
          <div class="col-sm-6 col-md-6">
              <h3>FULE TANK CLEANING DETAILS </h3>
          </div>
          <div class="col-sm-2 col-md-2">
              <a style="margin-bottom: 5px;" href="{{route('fueltank.create')}}" class="btn btn-inverse pull-right" ><i style="margin-right: 5px; " class="fas fa-plus"></i>ADD NEW</a>
          </div>
           <div class="col-sm-4 col-md-4">
             <form id="target" class="pull-right" action="{{ route('fueltank.import') }}" method="POST" enctype="multipart/form-data">
                  {{ csrf_field() }}
                 <div class="file btn btn-inverse"><i class="fas fa-file-download"></i>
                  Import
                  <input id="file" type="file" name="file"/>
                </div>
                  <a class="btn btn-inverse" href="{{ route('fueltank.export') }}"><i style="margin-right: 5px; " class="fas fa-file-import"></i></i>Export Bulk Data</a>
                  <a class="btn btn-inverse" href="{{route('fueltank.download') }}"><i style="margin-right: 5px; " class="fas fa-file-import"></i></i>Format</a>

              </form>
            </div>  
       
            <table id="myTable">
              <thead>
                <tr >
                  <th style="width: 62px;">SR. NO</th>
                  <th style="width: 320px;">VEHICLE NUMBER</th>
                  <th style="width: 410px;">CLEANING DATE</th>
                  <th style="width: 61px;">KM READING</th>
                  <th style="width: 61px;">COST</th>
                  <th style="width: 61px;">ACTION</th>
                </tr>
              </thead>
              <?php $count = 0; ?>
              @foreach($fueltank as $Fueltank) 
              @php ($vch_no = \App\vehicle_master::find($Fueltank->vch_id))
              
                <tr>
                  <td style="width: 8%;  padding-left: 20px;">{{++$count}}</td>
                  <td style="padding-left: 20px">{{$vch_no->vch_no}}</td>
                  <td style="width:5%; padding-left: 20px">{{$Fueltank->date}}</td>
                  <td style="width:20%; padding-left: 20px">{{$Fueltank->km_reading}}</td>
                  <td style="padding-left: 20px">{{$Fueltank->cost}}</td>
                  <td style="width:10%; text-align:center;">
                    <a href="{{route('fueltank.edit',$Fueltank->id)}}" runat="server" class="btn btn-success" rel="tooltip" title="" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                    <a onclick="javascript:return confirm('Do You Really Want To Delete This?');" href="{{route('fueltank.delete',$Fueltank->id)}}" class="btn btn-inverse" rel="tooltip" title="" data-original-title="Delete"><i class="fa fa-times"></i></a>
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