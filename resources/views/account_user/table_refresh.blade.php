<table class="table table-stripped table-bordered" id="account_table1" style="width: 100%">
	<thead>
		<tr>
			<th>SNo.</th>
			<th>Fleet Code</th>
			<th>Fleet Name</th>	
		</tr>
	</thead>
	<tbody>
		@php  $count =0;	@endphp 
		@foreach($fleet as $fleets)
		<?php $fleet_data = App\Fleet::find($fleets->fleet_id) ;?>
			<tr>
				<td style="width: 16.66%">{{ ++$count}}</td>
				<td style="width: 16.66%">{{$fleet_data->fleet_code}}</td>
				<td style="width: 16.66%">{{$fleet_data->fleet_name}}</td>
			</tr>
		@endforeach
	</tbody>
</table>
<script type="text/javascript">
	$(document).ready(function(){		
		$('#account_table1').DataTable();		
	})	
</script>