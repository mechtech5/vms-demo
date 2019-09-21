<table id="myTable3" >
    <thead>
        <tr >
          <th style="width: 20px;">#</th>
          <th style="width: 200px;">NAME</th>
          <th style="width: 200px;">SPARE COMPANY</th>
          <th style="width: 200px;">SPARE TYPE</th>
          <th style="width: 200px;">SPARE UNIT</th>
          <th style="width: 200px;">ORDERED QTY.</th>
          <th style="width: 200px;">REMARKS</th>
        </tr>
   </thead>
   <tbody>
    	<?php $count = 0; ?>
        <?php $ids   = session('ids') ? session('ids'):array(); ?>
        
   	    @foreach($ids as $id)
        <?php  $id = $id[$count]; ?>
        <?php $data1  = session('data') ? session('data')[$id] :array(); ?>

        @foreach($data1 as $data) 
	        @php ($type = App\Models\SpareType::find($data['type_id']))
	        @php ($unit = App\Models\SpareUnit::find($data['unit_id']))
	        @php ($comp = App\Models\SpareCompany::find($data['comp_id']))
	         
		    <tr>
		        <td style=" width:5% padding-left: 20px;">
		        	<?php if($data['qty'] == '') {  ?>
						<a style="cursor: pointer;color: #ff0000" data="{{$id}}" id="trash"><i style="margin-right: 5px; " class="fas fa-trash" aria-hidden="true"></i></a>
					<?php } ?>	
				</td>
				<input type='hidden' value="{{$data['id']}}" name = "{{$data['qty'] == '' ? 'id[]' : ''}}" >
				<td style=" width:25%; padding-left: 20px">{{$data['name']}}</td>
				<td style=" width:25%; padding-left: 20px">{{$comp->comp_name}}</td>
				<td style=" width:25%; padding-left: 20px">{{$type->type_name}}</td>
				<td style=" width:25%; padding-left: 20px">{{$unit->unit_name}}</td>
				<td style=" width:25%; padding-left: 20px"><input class="form-control qty" value="{{$data['qty']}}" {{$data['qty'] != '' ? 'readonly' : ''}} type="number"  name="{{$data['qty'] == '' ? 'qty[]' : ''}}" ></td>
				<td style=" width:25%; padding-left: 20px"><input {{$data['qty'] != '' ? 'readonly' : ''}} class="form-control" type="text" value="{{$data['remarks']}}" name="{{$data['qty'] == '' ? 'remark[]' : ''}}"></td>
	    	</tr>
			@endforeach
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