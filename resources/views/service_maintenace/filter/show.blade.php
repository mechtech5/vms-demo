@extends('state.main') 
@section('content')
<div class="container">
<div id="ContentPlaceHolder1_PnlShow"  style="display: inline;">
  <div class="row">
    <div class="col-sm-12">
      <div class="box box-color orange box-condensed box-bordered">
        <div class="box-title">
          <div class="col-sm-6 col-md-6">
              <h3>FILTER REPLACEMENT DETAILS</h3>
          </div>
          <div class="col-sm-3 col-md-3">
              <a style="margin-bottom: 5px;" href="{{route('filter.create')}}" class="btn btn-inverse pull-right" ><i style="margin-right: 5px; " class="fas fa-plus"></i>ADD NEW</a>
          </div>
           <div class="col-sm-3 col-md-3">
             <form id="target" class="pull-right" action="{{ route('filter.import') }}" method="POST" enctype="multipart/form-data">
                  {{ csrf_field() }}
                 <div class="file btn btn-inverse"><i class="fas fa-file-download"></i>
                  Import
                  <input id="file" type="file" name="file"/>
                </div>
                  <a class="btn btn-inverse" href="{{ route('filter.export') }}"><i style="margin-right: 5px; " class="fas fa-file-import"></i></i>Export Bulk Data</a>

              </form>
            </div>  
       
            <table id="myTable">
              <thead>
                <tr >
                  <th style="width: 62px;">SR. NO</th>
                  <th style="width: 320px;">VEHICLE NUMBER</th>
                  <th style="width: 410px;">REPLACEMENT DATE</th>
                  <th style="width: 410px;">FILTER TYPE</th>
                  <th style="width: 61px;">KM READING</th>
                  <th style="width: 61px;">COST</th>
                  <th style="width: 61px;">ACTION</th>
                </tr>
              </thead>
              <?php $count = 0; ?>
              @foreach($filter as $filters) 
              @php ($vch_no = \App\vehicle_master::find($filters->vch_id))
              
                <tr>
                  <td style="width: 8%;  padding-left: 20px;">{{++$count}}</td>
                  <td style="padding-left: 20px">{{$vch_no->vch_no}}</td>
                  <td style="padding-left: 20px">{{$filters->date}}</td>
                  <td style="padding-left: 20px">{{$filters->filter_type}}</td>
                  <td style="width:15%; padding-left: 20px">{{$filters->km_reading}}</td>
                  <td style="padding-left: 20px">{{$filters->cost}}</td>
                  <td style="width:10%; text-align:center;">
                    <a href="{{route('filter.edit',$filters->id)}}" runat="server" class="btn btn-success" rel="tooltip" title="" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                    <a onclick="javascript:return confirm('Do You Really Want To Delete This?');" href="{{route('filter.delete',$filters->id)}}" class="btn btn-inverse" rel="tooltip" title="" data-original-title="Delete"><i class="fa fa-times"></i></a>
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