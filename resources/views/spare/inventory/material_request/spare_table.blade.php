<table style="padding-top: 24px;" id="myTable2" >
      <thead>
        <tr >
          <th style="width: 10px;"><input type='checkbox' id='all_del' ></th>
          <th style="width: 200px;">NAME</th>
          <th style="width: 200px;">SPARE COMPANY</th>
          <th style="width: 200px;">SPARE TYPE</th>
          <th style="width: 200px;">SPARE UNIT</th>
        </tr>
      </thead>
      
      <?php $count = 0; ?>
      @foreach($mater as $Mater) 
      @php ($type = App\Models\SpareType::find($Mater->type_id))
      @php ($unit = App\Models\SpareUnit::find($Mater->unit_id))
      @php ($comp = App\Models\SpareCompany::find($Mater->comp_id))
         
        <tr>
          <td style=" width:5%; padding-left: 20px;"><input value="{{$Mater->id}}" type='checkbox' class='chk' ></td>
          <td style=" width:5%; padding-left: 20px">{{$Mater->name}}</td>
          <td style=" width:5%; padding-left: 20px">{{$comp->comp_name}}</td>
          <td style=" width:5%; padding-left: 20px">{{$type->type_name}}</td>
          <td style=" width:5%; padding-left: 20px">{{$unit->unit_name}}</td>
         
        </tr>
        @endforeach

      </tbody>
    </table>
<script type="text/javascript">
	$(document).ready(function(){
		$('#myTable2').DataTable({
	    	"searching": false,
	    	"bPaginate": false,
	    });
})
</script>