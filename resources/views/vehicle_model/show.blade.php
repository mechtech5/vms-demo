@extends('state.main') 
@section('content')
<div class="container">
<div id="ContentPlaceHolder1_PnlShow"  style="display: inline;">
  <div class="row">
    <div class="col-sm-12">
      <div class="box box-color orange box-condensed box-bordered">
        <div class="box-title">
          <div class="col-sm-6 col-md-6">
              <h3> VEHICLE MODEL </h3>
          </div>
          <div class="col-sm-2 col-md-2">
              <a style="margin-bottom: 5px;" href="{{route('vehicleModel.create')}}" class="btn btn-inverse pull-right" ><i style="margin-right: 5px; " class="fas fa-plus"></i>ADD NEW</a>
          </div>
           <div class="col-sm-4 col-md-4">
             <form id="target" class="pull-right" action="{{ route('model.import') }}" method="POST" enctype="multipart/form-data">
                  {{ csrf_field() }}
                 <div class="file btn btn-inverse"><i class="fas fa-file-download"></i>
                  Import
                  <input id="file" type="file" name="file"/>
                </div>
                  <a class="btn btn-inverse" href="{{ route('model.export') }}"><i style="margin-right: 5px; " class="fas fa-file-import"></i></i>Export Bulk Data</a>
                   <a class="btn btn-inverse" href="{{route('model.download') }}"><i style="margin-right: 5px; " class="fas fa-file-import"></i></i>Format</a>

              </form>  
            </div>
       
            <table id="myTable">
              <thead>
                <tr >
                  <th style="width: 62px;">SR. NO</th>
                  <th style="width: 410px;">VEHICLE MODE</th>
                  <th style="width: 410px;">VEHICLE COMPANY</th>
                  <th style="width: 410px;">VEHICLE DESCRIPTION</th>
                  <th style="width: 61px;text-align: center;">ACTION</th>
                </tr>
              </thead>
              <?php $count = 0; ?>
              @foreach($model as $models)
              <?php $comp = App\vch_comp::find($models->vcompany_code); ?>
               
               <tr>
                  <td style="width: 8%;  padding-left: 20px;">{{++$count}}</td>
                  <td style="width: 20%;padding-left: 20px">{{$models->model_name}}</td>
                  <td style="width: 20%;padding-left: 20px"><?php if(!empty($comp->comp_name)){ echo $comp->comp_name; }  ?></td>
                  <td style="width: 20%;padding-left: 20px">{{$models->model_desc}}</td>
                  <td style="width:10%; text-align:center;">
                    <a href="{{route('vehicleModel.edit',$models->id)}}" runat="server" class="btn btn-success" rel="tooltip" title="" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                    <a onclick="javascript:return confirm('Do You Really Want To Delete This?');" href="{{url('Modeldestroy',$models->id)}}" class="btn btn-inverse" rel="tooltip" title="" data-original-title="Delete"><i class="fa fa-times"></i></a>
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