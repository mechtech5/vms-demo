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
              <a style="margin-bottom: 5px;" href="{{route('vehicle.create')}}" class="btn btn-inverse pull-right" >ADD NEW</a>
          </div>
       
            <table id="myTable">
              <thead>
                <tr >
                  <th style="width: 62px;">SR. NO</th>
                  <th style="width: 410px;">COMPANY NAME</th>
                  <th style="width: 410px;">COMPANY DESCRIPTION</th>
                  <th style="width: 61px;text-align: center;">ACTION</th>
                </tr>
              </thead>
              <?php $count = 0; ?>
              @foreach($vehicle as $vehicles) 
               <tr>
                  <td style="width: 8%;  padding-left: 20px;">{{++$count}}</td>
                  <td style="width: 30%;padding-left: 20px">{{$vehicles->comp_name}}</td>
                   <td style="width: 30%;padding-left: 20px">{{$vehicles->comp_desc}}</td>
                  <td style="width:10%; text-align:center;">
                    <a href="{{route('vehicle.edit',$vehicles->id)}}" runat="server" class="btn btn-success" rel="tooltip" title="" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                    <a onclick="javascript:return confirm('Do You Really Want To Delete This?');" href="{{url('Vehicledestroy',$vehicles->id)}}" class="btn btn-inverse" rel="tooltip" title="" data-original-title="Delete"><i class="fa fa-times"></i></a>
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