@extends('state.main') 
@section('content')
<div class="container">
<div id="ContentPlaceHolder1_PnlShow"  style="display: inline;">
  <div class="row">
    <div class="col-sm-12">
      <div class="box box-color orange box-condensed box-bordered">
        <div class="box-title">
          <div class="col-sm-6 col-md-6">
              <h3>AGENTS DETAILS </h3>
          </div>
          <div class="col-sm-6 col-md-6">
              <a style="margin-bottom: 5px;" href="{{route('agent.create')}}" class="btn btn-inverse pull-right" ><i style="margin-right: 5px; " class="fas fa-plus"></i>ADD NEW</a>
          </div>
                
            <table id="myTable">
              <thead>
                <tr >
                  <th style="width: 100px;">SR. NO</th>
                  <th style="width: 320px;">AGENT NAME</th>
                  <th style="width: 320px;">AGENT CODE</th>
                  <th style="width: 320px;">AGENT MOBILE NO.</th>
                  <th style="width: 320px;">AGENT EMAIL</th>
                  <th style="width: 61px;">ACTION</th>
                </tr>
              </thead>
              
              <?php $count = 0; ?>
              @foreach($agent as $Agent) 
                                    
                <tr>
                  <td style="width: 10%;  padding-left: 20px;">{{++$count}}</td>
                  <td style="width: 17%;padding-left: 20px">{{$Agent->agent_name}}</td>
                  <td style="width: 13%; padding-left: 20px">{{$Agent->agent_code }}</td>
                  <td style="width: 14%; padding-left: 20px">{{$Agent->agent_phone}}</td>
                  <td style="width: 14%; padding-left: 20px">{{$Agent->agent_email}}</td>
                  <td style="width:10%; text-align:center;">
                    <a style="padding: 2px 5px;" href="{{route('agent.edit',$Agent->id)}}" runat="server" class="btn btn-success" rel="tooltip" title="" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                    <a style="padding: 2px 7px;" onclick="javascript:return confirm('Do You Really Want To Delete This?');" href="{{route('agent.delete',$Agent->id)}}" class="btn btn-inverse" rel="tooltip" title="" data-original-title="Delete"><i class="fa fa-times"></i></a>
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