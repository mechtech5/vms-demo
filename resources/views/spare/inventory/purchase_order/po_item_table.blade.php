<table id="mytable" >
	<thead>
		<tr>
			<th style="width: 20px;">#</th>
			<th style="width: 200px;">NAME</th>
			<th style="width: 200px;">SPARE COMPANY</th>
			<th style="width: 200px;">SPARE TYPE</th>
			<th style="width: 200px;">SPARE UNIT</th>
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
		<?php $count = 0;
			$cc = 0;
		?>
		<?php $ids   = session('ids') ? session('ids'):array(); ?>
		@foreach($ids as $id)
			<?php  $id = $id[$count]; ?>
			<?php $data1  = session('data') ? session('data')[$id] :array();?>

			@foreach($data1 as $data) 
				@php ($type = App\Models\SpareType::find($data['type_id']))
				@php ($unit = App\Models\SpareUnit::find($data['unit_id']))
				@php ($comp = App\Models\SpareCompany::find($data['comp_id']))

				<tr data-id ="tr_{{$data['id']}}">
					<td style=" width:5% padding-left: 20px;">
					<a style="cursor: pointer;color: #ff0000" data="{{$id}}" id="trash"><i style="margin-right: 5px; " class="fas fa-trash" aria-hidden="true"></i></a>
					</td>
					<input type='hidden' value="{{$data['id']}}" name = "id[]" >
					<td style=" width:25%; ">{{$data['name']}}</td>
					<td style=" width:25%; ">{{$comp->comp_name}}</td>
					<td style=" width:25%;">{{$type->type_name}}</td>
					<td style=" width:25%; ">{{$unit->unit_name}}</td>

					<td style=" width:25%; "><input class="form-control qty" type="number" id="qty_{{$data['id']}}" data-id = '{{$data['id']}}' value="{{$data['qty'] !='' ? $data['qty'] :''}}" name="qty[]" >

						@error('qty.'.$cc)
						<span class="text-danger" role="alert">
						<strong>{{ 'Please enter Quantity' }}</strong>
						</span>
						@enderror
					</td>
					<td style=" width:25%; "><input class="form-control rate" type="text" value="{{$data['rate'] !='' ? $data['rate'] :''}}" id="rate_{{$data['id']}}" data-id = '{{$data['id']}}' name="rate[]">

						@error('rate.'.$cc)
						<span class="text-danger" role="alert">
						<strong>{{ 'Please enter rate' }}</strong>
						</span>
						@enderror
					</td>
					<td style=" width:25%; "><input readonly="true" class="form-control ac_amt" type="text" id="amt_{{$data['id']}}" value="{{$data['amt'] !='' ? $data['amt'] :''}}" name="amt[]">

					</td>
					<td style=" width:25%; "><input class="form-control disc_pct" type="text" value="{{$data['disc_pct'] !='' ? $data['disc_pct'] :''}}" data-id = '{{$data['id']}}' id="disc_pct_{{$data['id']}}" name="disc_pct[]">

					@error('disc_pct.'.$cc)
					<span class="text-danger" role="alert">
					<strong>{{ 'Please enter discount' }}</strong>
					</span>
					@enderror

					</td>
					<td style=" width:25%; "><input class="form-control disc_amt" type="text" value="{{$data['disc_amt'] !='' ? $data['disc_amt'] :''}}" name="disc_amt[]" readonly="true" id="disc_amt_{{$data['id']}}"></td>
					<td style=" width:25%; "><input class="form-control igst_pct" type="text" value="{{$data['igst_pct'] !='' ? $data['igst_pct'] :''}}" id="igst_pct_{{$data['id']}}" data-id = '{{$data['id']}}'  name="igst_pct[]">

					@error('igst_pct.'.$cc)
					<span class="text-danger" role="alert">
					<strong>{{ 'Please enter IGST%' }}</strong>
					</span>
					@enderror

					</td>
					<td style=" width:25%; "><input readonly="true" class="form-control igst_amt" id="igst_amt_{{$data['id']}}" type="text" value="{{$data['igst_amt'] !='' ? $data['igst_amt'] :''}}" name="igst_amt[]"></td>
					<td style=" width:25%; "><input data-id = '{{$data['id']}}' class="form-control cgst_pct" id="cgst_pct_{{$data['id']}}" type="text" value="{{$data['cgst_pct'] !='' ? $data['cgst_pct'] :''}}" name="cgst_pct[]">

					@error('cgst_pct.'.$cc)
					<span class="text-danger" role="alert">
					<strong>{{ 'Please enter CGST%' }}</strong>
					</span>
					@enderror

					</td>
					<td style=" width:25%; "><input id="cgst_amt_{{$data['id']}}" class="form-control cgst_amt" type="text" readonly="true" value="{{$data['cgst_amt'] !='' ? $data['cgst_amt'] :''}}" name="cgst_amt[]"></td>
					<td style=" width:25%;"><input class="form-control sgst_pct" type="text" value="{{$data['sgst_pct'] !='' ? $data['sgst_pct'] :''}}" name="sgst_pct[]" id="sgst_pct_{{$data['id']}}" data-id = '{{$data['id']}}'>

					@error('sgst_pct.'.$cc)
					<span class="text-danger" role="alert">
					<strong>{{ 'Please enter SGST%' }}</strong>
					</span>
					@enderror

					</td>
					<td style=" width:25%;"><input class="form-control sgst_amt" type="text" value="{{$data['sgst_amt'] !='' ? $data['sgst_amt'] :''}}" name="sgst_amt[]" readonly="true" id="sgst_amt_{{$data['id']}}"></td>
					<td style=" width:25%;"><input readonly="true" id="net_amt_{{$data['id']}}" class="form-control net_amt" type="text" value="{{$data['net_amt'] !='' ? $data['net_amt'] :''}}" name="net_amt[]"></td>
					<td style=" width:25%;"><input class="form-control" value="{{$data['remark'] !='' ? $data['remark'] :''}}" type="text" name="remark[]"></td>
				</tr>
				<?php ++$cc ?>
			@endforeach
		@endforeach
	</tbody>
</table>
<script type="text/javascript">
	$(document).ready(function(){
		$('#mytable').DataTable();
	})
</script>