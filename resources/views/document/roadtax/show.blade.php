@extends('state.main') 
@section('content')
<div class="container">
<div id="ContentPlaceHolder1_PnlShow"  style="display: inline;">
  <div class="row">
    <div class="col-sm-12">
      <div class="box box-color orange box-condensed box-bordered">
        <div class="box-title">
          <div class="col-sm-6 col-md-6">
              <h3>ROAD TAX DETAILS </h3>
          </div>
          <div class="col-sm-2 col-md-2">
              <a style="margin-bottom: 5px;" href="{{route('roadtax.create')}}" class="btn btn-inverse pull-right" ><i style="margin-right: 5px; " class="fas fa-plus"></i>ADD NEW</a>
          </div>
          <div class="col-sm-4 col-md-4">
           <form id="target" class="pull-right" action="{{ route('roadtax.import') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
               <div class="file btn btn-inverse"><i class="fas fa-file-download"></i>
                Import
                <input id="file" type="file" name="file"/>
              </div>
                <a class="btn btn-inverse" href="{{ route('roadtax.export') }}"><i style="margin-right: 5px; " class="fas fa-file-import"></i></i>Export Bulk Data</a>
                <a class="btn btn-inverse" href="{{route('roadtax.download') }}"><i style="margin-right: 5px; " class="fas fa-file-import"></i></i>Format</a>

            </form>  
                       
          </div>
       
            <table id="myTable">
              <thead>
                <tr >
                  <th style="width: 100px;">SR. NO</th>
                  <th style="width: 320px;">ROAD TAX NUMBER</th>
                  <th style="width: 320px;">VEHICLE NUMBER</th>
                  <th style="width: 320px;">ROAD TAX AMOUNT</th>
                  <th style="width: 320px;">VALID FROM</th>
                  <th style="width: 320px;">EXPIRY DATE</th>
                  <th style="width: 61px;">ACTION</th>
                </tr>
              </thead>
              
              <?php $count = 0; ?>
              @foreach($roadtax as $Roadtax) 
              @php ($vch_no = \App\vehicle_master::find($Roadtax->vch_id))            
                <tr>
                  <td style="width: 10%;  padding-left: 20px;">{{++$count}}</td>
                  <td style="width: 17%;padding-left: 20px">{{$Roadtax->roadtax_no }}</td>
                  <td style="padding-left: 20px">{{$vch_no->vch_no }}</td>
                  <td style="padding-left: 20px">{{$Roadtax->roadtax_amt}}</td>
                  <td style="padding-left: 20px">{{$Roadtax->valid_from}}</td>
                  <td style="padding-left: 20px">{{$Roadtax->valid_till}}</td>
                  <td style="width:10%; text-align:center;">
                    <a style="padding: 2px 5px;" href="{{route('roadtax.edit',$Roadtax->id)}}" runat="server" class="btn btn-success" rel="tooltip" title="" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                    <a style="padding: 2px 7px;" onclick="javascript:return confirm('Do You Really Want To Delete This?');" href="{{route('roadtax.delete',$Roadtax->id)}}" class="btn btn-inverse" rel="tooltip" title="" data-original-title="Delete"><i class="fa fa-times"></i></a>
                    {{-- <a style="padding: 2px 5px;" href="{{asset("storage/$Roadtax->fleet_code/Document/$Roadtax->doc_file")}}" runat="server" class="btn btn-success" rel="tooltip" title="" download="" data-original-title="Download"><i class="fa fa-download"></i></a> --}}
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