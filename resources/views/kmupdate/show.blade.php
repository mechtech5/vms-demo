@extends('state.main') 
@section('content')
<div class="container">
<div id="ContentPlaceHolder1_PnlShow"  style="display: inline;">
  <div class="row">
    <div class="col-sm-12">
      <div class="box box-color orange box-condensed box-bordered">
        <div class="box-title">
          <div class="col-sm-6 col-md-6">
              <h3>VEHICLE KILOMETER UPDATE DETAILS </h3>
          </div>
          <div class="col-sm-3 col-md-3">
              <a style="margin-bottom: 5px;" href="{{route('kmupdate.create')}}" class="btn btn-inverse pull-right" ><i style="margin-right: 5px; " class="fas fa-plus"></i>ADD NEW</a>
          </div>
           <div class="col-sm-3 col-md-3">
             <form id="target" class="pull-right" action="{{ route('kmupdate.import') }}" method="POST" enctype="multipart/form-data">
                  {{ csrf_field() }}
                 <div class="file btn btn-inverse"><i class="fas fa-file-download"></i>
                  Import
                  <input id="file" type="file" name="file"/>
                </div>
                  <a class="btn btn-inverse" href="{{ route('kmupdate.export') }}"><i style="margin-right: 5px; " class="fas fa-file-import"></i></i>Export Bulk Data</a>
                  <a class="btn btn-inverse" href="{{route('kmupdate.download') }}"><i style="margin-right: 5px; " class="fas fa-file-import"></i></i>Export Bulk Data</a>

              </form>
            </div>  
       
            <table id="myTable">
              <thead>
                <tr >
                  <th style="width: 62px;">SR. NO</th>
                  <th style="width: 320px;">VEHICLE NUMBER</th>
                  <th style="width: 61px;">CURRENT KILOMETER</th>
                  <th style="width: 61px; text-align:center;">ACTION</th>
                </tr>
              </thead>
              <?php $count = 0; ?>
              @foreach($kilometer as $Kilometer) 
              @php ($vch_no = \App\vehicle_master::find($Kilometer->vch_id))
              
                <tr>
                  <td style="width: 15%;  padding-left: 20px;">{{++$count}}</td>
                  <td style="width:31%; padding-left: 20px">{{$vch_no->vch_no}}</td>
                  <td style="width:42%; padding-left: 20px">{{$Kilometer->reading }}</td>
                  <td style="width:20%; text-align:center;">
                    <a href="{{route('kmupdate.edit',$Kilometer->id)}}" runat="server" class="btn btn-success" rel="tooltip" title="" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                    <a onclick="javascript:return confirm('Do You Really Want To Delete This?');" href="{{route('kmupdate.delete',$Kilometer->id)}}" class="btn btn-inverse" rel="tooltip" title="" data-original-title="Delete"><i class="fa fa-times"></i></a>
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