<table id="myTable3" >
    <thead>
        <tr >
          <th style="width: 20px;">#</th>
          <th style="width: 200px;">NAME</th>
          <th style="width: 200px;">SPARE COMPANY</th>
          <th style="width: 200px;">SPARE TYPE</th>
          <th style="width: 200px;">SPARE UNIT</th>
          <th style="width: 200px;">PART NO.</th>
          <th style="width: 200px;">ORDERED QTY.</th>
          <th style="width: 200px;">RATE</th>
          <th style="width: 200px;">AMT</th>
          <th style="width: 200px;">DISC%</th>
          <th style="width: 200px;">DISC AMT</th>
          <th style="width: 200px;">IGST%</th>
          <th style="width: 200px;">IGST AMT</th>
          <th style="width: 200px;">CGST%</th>
          <th style="width: 200px;">CGST AMT</th>
          <th style="width: 200px;">SGST%</th>
          <th style="width: 200px;">SGST AMT</th>
          <th style="width: 200px;">NET AMT</th>
          <th style="width: 200px;">REMARKS</th>
        </tr>
   </thead>
   <tbody>
    	<?php $count = 0; ?>
    	@foreach($data as $data1) 
        	<?php 
        		 $item = App\Models\SpareMaster::find($data1['spare_id']);
	             $type = App\Models\SpareType::find($item->type_id);
	             $unit = App\Models\SpareUnit::find($item->unit_id);
	             $comp = App\Models\SpareCompany::find($item->comp_id);
	    	?>     	         
		    <tr>
		        <td style=" width:5% padding-left: 20px;">{{++$count}}</td>
				<input type='hidden' value="{{$data1['id']}}" name = "" >
				<td style=" width:25%; padding-left: 20px">{{$item->name}}</td>
				<td style=" width:25%; padding-left: 20px">{{$comp->comp_name}}</td>
				<td style=" width:25%; padding-left: 20px">{{$type->type_name}}</td>
				<td style=" width:25%; padding-left: 20px">{{$unit->unit_name}}</td>
				<td style=" width:25%; padding-left: 20px">{{$item->part_no}}</td>
				<td style=" width:25%; padding-left: 20px"><input class="form-control qty" value="" type="number"  name="qty[]" ></td>
				<td style=" width:25%; padding-left: 20px"><input class="form-control" type="text" value="" name="rate[]"></td>
				<td style=" width:25%; padding-left: 20px"><input class="form-control" type="text" value="" name="amt[]"></td>
				<td style=" width:25%; padding-left: 20px"><input class="form-control" type="text" value="" name="disc_pct[]"></td>
				<td style=" width:25%; padding-left: 20px"><input class="form-control" type="text" value="" name="disc_amt[]"></td>
				<td style=" width:25%; padding-left: 20px"><input class="form-control" type="text" value="" name="igst_pct[]"></td>
				<td style=" width:25%; padding-left: 20px"><input class="form-control" type="text" value="" name="igst_amt[]"></td>
				<td style=" width:25%; padding-left: 20px"><input class="form-control" type="text" value="" name="cgst_pct[]"></td>
				<td style=" width:25%; padding-left: 20px"><input class="form-control" type="text" value="" name="cgst_amt[]"></td>
				<td style=" width:25%; padding-left: 20px"><input class="form-control" type="text" value="" name="sgst_pct[]"></td>
				<td style=" width:25%; padding-left: 20px"><input class="form-control" type="text" value="" name="sgst_amt[]"></td>
				<td style=" width:25%; padding-left: 20px"><input class="form-control" type="text" value="" name="net_amt[]"></td>
				<td style=" width:25%; padding-left: 20px"><input class="form-control" type="text" value="" name="remarks[]"></td>
	    	</tr>
			@endforeach
	</tbody>
</table>
<script type="text/javascript">
	$(document).ready(function(){
		$('#myTable3').DataTable({
	    	"searching": false,
	    	"bPaginate": false,
	    });
    })
</script>