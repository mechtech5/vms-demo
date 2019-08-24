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
              <a style="margin-bottom: 5px;" href="{{route('state.create')}}" class="btn btn-inverse pull-right" ><i style="margin-right: 5px; " class="fas fa-plus"></i>ADD NEW</a>
          </div>
       
            <table id="myTable">
              <thead>
                <tr >
                  <th style="width: 62px;">SR. NO</th>
                  <th style="width: 320px;">STATE NAME</th>
                  <th style="width: 410px;">STATE SHORT NAME</th>
                  <th style="width: 61px;">Options</th>
                </tr>
              </thead>
              <?php $count = 0; ?>
              @foreach($state as $states)  
                <tr>
                  <td style="width: 8%;">{{++$count}}</td>
                  <td>{{$states->state_name}}</td>
                  <td>{{$states->state_code}}</td>
                  <td style="width:10%; text-align:center;">
                    <a href="{{route('state.edit',$states->id)}}" runat="server" class="btn btn-success" rel="tooltip" title="" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                    <a onclick="javascript:return confirm('Do You Really Want To Delete This?');" href="{{url('Statedestroy',$states->id)}}" class="btn btn-inverse" rel="tooltip" title="" data-original-title="Delete"><i class="fa fa-times"></i></a>
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
} );

</script>
@endsection