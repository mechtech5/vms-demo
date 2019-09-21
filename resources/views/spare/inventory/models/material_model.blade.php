<div class="row">
	<div class="col-md-6 col-xl-6 mt-2">
       <label for="vehicle_model ">Select Unit</label>
   </div>

	<div class="col-md-6 col-xl-6 mt-2">
        <select id="type_id" name="unit_id" class="selectpicker form-control">
            <option value="0">Select..</option>
             @foreach($type as $Type)
              	<option value="{{$Type->id}}">{{$Type->type_name}}</option>
               @endforeach		
        </select>     
   	</div>
</div>
<div class="row show_item" style="height: 305px;overflow: scroll;">
	<table style="padding-top: 24px;" id="myTable" >
      
    </table>

</div>
<script type="text/javascript">
	$(document).ready(function(){
		 $('#myTable2').DataTable().destroy();
		$("#type_id").on('change',function(){
		var id = $(this).val();
			$.ajax({
		          url: '{{route('material.get_type_rec')}}',
		          type: 'POST',
		          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		          data: {'id':id},
		          success: function(data) {
		            $('.show_item').html(data);		           
		          }
		      });
		})
	})
</script>