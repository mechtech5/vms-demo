 <table id="myTable1" >
  <thead>
    <tr >
      <th style="width: 10px;">SR NO.</th>
      <th style="width: 200px;">VENDOR NAME</th>
      <th style="width: 200px;">SPARE COMPANY</th>
      <th style="width: 200px;">SPARE PRICE</th>
     

    </tr>
  </thead>
  
  <?php $count = 0; ?>
  @foreach($suppliers as $Suppliers) 
  @php ($vdr = App\Models\SpareVendor::find($Suppliers->vendor_id))
  @php ($comp = App\Models\SpareCompany::find($Suppliers->spare_comp_id))
     
    <tr>
      <td style=" width:5%; padding-left: 20px;">{{++$count}}</td>
      <td style=" width:5%; padding-left: 20px">{{$vdr->name}}</td>
      <td style=" width:5%; padding-left: 20px">{{$comp->comp_name}}</td>
      <td style=" width:5%; padding-left: 20px">{{$Suppliers->rate}}</td>
     
    </tr>
    @endforeach

  </tbody>
</table>
<script type="text/javascript">
$(document).ready( function () {
   	$('#myTable1').DataTable();
}) 	

</script>