@extends('state.main') 
@section('content')

 <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
         <tr>
            <td valign="top">
            <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
            	<td valign="top">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                <td height="700" align="left" valign="top" style="background-color: White;">
                <table width="97%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                    	<td width="100%" valign="top">
                    	<table border="0" cellpadding="0" cellspacing="0" width="100%">
                    	<tr>
                  		   <td>
                    	   <div class="box-content">
                   		   <table width="100%" cellpadding="0" cellspacing="0">
                    		<tr>
                               <td align="left" valign="top" colspan="5">
                                <input type="hidden" name="HRCBOOKPATH" id="HRCBOOKPATH" value="0" />
                                <input type="hidden" name="HPANCARDPATH" id="HPANCARDPATH" value="0" />
                                <input type="hidden" name="HTDSDECLAREPATH" id="HTDSDECLAREPATH" value="0" />
                                <input type="hidden" name="HPUCIDMAIL" id="HPUCIDMAIL" value="0" />
                                <input type="hidden" name="HFITNESSIDMAIL" id="HFITNESSIDMAIL" value="0" />
                                <input type="hidden" name="HROADTAXMAIL" id="HROADTAXMAIL" value="0" />
                                <input type="hidden" name="HINSURANCEMAIL" id="HINSURANCEMAIL" value="0" />
                                <input type="hidden" name="HSTATEPERMITAMAIL" id="HSTATEPERMITAMAIL" value="0" />
                                <input type="hidden" name="HSTATEPERMITBMAIL" id="HSTATEPERMITBMAIL" value="0" />
                                <input type="hidden" name="HALLINDIAPERMITMAIL" id="HALLINDIAPERMITMAIL" value="0" />
                                </td>
                            </tr>
                            <tr style="background:linear-gradient(to bottom, #ffd89b 0%, #19547b 100%);">
                            <td align="center" valign="middle" colspan="5"> 
                            <div style="height: 30px; padding-top: 5px;">
                            <p style="font-size: 13px; color: #fff; font-weight: bold;">
                             Vehicle Managment Dashboard </p>
                            </div>
                            </td>
                            </tr>
                            <tr>
                            <td align="left" valign="top" colspan="5">
                            <table width="100%" border="10px" style="border-color: #358fde; border-style: inherit;">
                                <tr style="background-color: #3ca99e;">
                                    <td style="width: 12%; color: White; height: 20px; font-size: 12px; font-weight: bold;margin-left: 20px;" align="left" valign="top">
                                        Insurance Details</td>

                                    <td style="width: 12%; color: White; height: 20px; font-size: 12px; font-weight: bold;margin-left: 20px;" align="left" valign="top">
                                         PUC Details</td>
                                    <td style="width: 12%; color: White; height: 20px; font-size: 12px; font-weight: bold;margin-left: 20px;" align="left" valign="top">
                                        Fitness Details</td>
                                     <td style="width: 12%; color: White; height: 20px; font-size: 12px; font-weight: bold;margin-left: 20px;" align="left" valign="top">
                                        Road Tax Details</td>
                                    <td style="width: 12%; color: White; height: 20px; font-size: 12px; font-weight: bold;margin-left: 20px;" align="left" valign="top">
                                        Permit Details </td>
                                    <td style="width: 12%; color: White; height: 20px; font-size: 12px; font-weight: bold;margin-left: 20px;" align="left" valign="top">
                                        RC Details</td>
                                    <td style="width: 12%; color: White; height: 20px; font-size: 12px; font-weight: bold;margin-left: 20px;" align="left" valign="top">
                                        All India Permit</td>
                                   <td style="width: 12%; color: White; height: 20px; font-size: 12px; font-weight: bold;margin-left: 20px;" align="left" valign="top">
                                        Green Tax</td>
                                </tr>
                                <tr>
                                	<td align="left" valign="top">
                                	<div id="pnlinsurance" style="height:90px;width:100%;overflow:auto;">
									<table id="Tbl_4" class="table table-hover table-nomargin dataTable table-bordered">
										<tr id="TableHeaderRow3">
											<th id="TableHeaderCell31" style="font-size:10px;font-weight:bold;">Vehicle No</th>
                                            <th id="TableHeaderCell33" style="font-size:10px;font-weight:bold;">Expiry Date</th>
										</tr>
                                            @foreach($insurance as $ins)
                                                <tr>
                                                    <td>{{$ins->vehicle->vch_no}}</td>
                                                    <td>{{$ins->valid_till}}</td>
                                                </tr>
                                            @endforeach
									</table>
									</div>
									</td>
									<td align="left" valign="top">
									<div id="pnlPUC" style="height:90px;width:100%;overflow:auto;">
									<table id="Tbl_1" class="table table-hover table-nomargin dataTable table-bordered">
									<tr id="tblHeader">
										<th id="TableHeaderCell2" style="font-size:10px;font-weight:bold;">Vehicle No</th>
										<th id="TableHeaderCell4" style="font-size:10px;font-weight:bold;">Expiry Date</th>
									</tr>
									   @foreach($PUCDetails as $puc)
                                            <tr>
                                                <td>{{$puc->vehicle->vch_no}}</td>
                                                <td>{{$puc->valid_till}}</td>
                                            </tr>
                                        @endforeach		
									</table>
									</div>
									</td>
									<td align="left" valign="top">
									<div id="pnlfitness" style="height:90px;width:100%;overflow:auto;">
									<table id="Tbl_2" class="table table-hover table-nomargin dataTable table-bordered">
									<tr id="TableHeaderRow1">
										<th id="TableHeaderCell12" style="font-size:10px;font-weight:bold;">Vehicle No</th>
										<th id="TableHeaderCell14" style="font-size:10px;font-weight:bold;">Expiry Date</th>
									</tr>
									   @foreach($fitnessetails as $fitness)
                                            <tr>
                                                <td>{{$fitness->vehicle->vch_no}}</td>
                                                <td>{{$fitness->valid_till}}</td>
                                            </tr>
                                        @endforeach
									</table>
									</div>
									</td>
									<td align="left" valign="top">
									<div id="Pnlroadtax" style="height:90px;width:100%;overflow:auto;">
									<table id="Tbl_3" class="table table-hover table-nomargin dataTable table-bordered">
									<tr id="TableHeaderRow2">
										<th id="TableHeaderCell22" style="font-size:10px;font-weight:bold;">Vehicle No</th>
										<th id="TableHeaderCell24" style="font-size:10px;font-weight:bold;">Expiry Date</th>
									</tr>
									@foreach($roadtax as $road)
                                            <tr>
                                                <td>{{$road->vehicle->vch_no}}</td>
                                                <td>{{$road->valid_till == null ? $road->expire_time : $road->valid_till}}</td>
                                            </tr>
                                        @endforeach	
									</table>
									</div>
									</td>
									<td align="left" valign="top">
									<div id="pnlyearlypermit" style="height:90px;width:100%;overflow:auto;">
									<table id="Tbl_5" class="table table-hover table-nomargin dataTable table-bordered">
									<tr id="TableHeaderRow4">
										<th id="TableHeaderCell42" style="font-size:10px;font-weight:bold;">Vehicle No</th>
										<th id="TableHeaderCell44" style="font-size:10px;font-weight:bold;">Expiry Date</th>
									</tr>
									@foreach($permit as $permits)
                                            <tr>
                                                <td>{{$permits->vehicle->vch_no}}</td>
                                                <td>{{$permits->valid_till}}</td>
                                            </tr>
                                    @endforeach	
									</table>
									</div>
									</td>
									<td align="left" valign="top">
									<div id="pnlStatePermitB" style="height:90px;width:100%;overflow:auto;">
									<table id="Tbl_8" class="table table-hover table-nomargin dataTable table-bordered">
									<tr id="TableHeaderRow7">
										<th id="TableHeaderCell70" style="font-size:10px;font-weight:bold;">Vehicle No</th>
										<th id="TableHeaderCell79" style="font-size:10px;font-weight:bold;">Expiry Date</th>
									</tr>
                                    @foreach($rcdetails as $rcdetail)
                                            <tr>
                                                <td>{{$rcdetail->vehicle->vch_no}}</td>
                                                <td>{{$rcdetail->valid_till}}</td>
                                            </tr>
                                        @endforeach
									</table>
									</div>
									</td>
									<td align="left" valign="top">
									<div id="pnlfiveyearlypermit" style="height:90px;width:100%;overflow:auto;">
									<table id="Tbl_6" class="table table-hover table-nomargin dataTable table-bordered">
									<tr id="TableHeaderRow5">
										<th id="TableHeaderCell55" style="font-size:10px;font-weight:bold;">Vehicle No</th>
										<th id="TableHeaderCell57" style="font-size:10px;font-weight:bold;">Expiry Date</th>
									</tr>
									</table>
									</div>
									</td>
									<td align="left" valign="top">
									<div id="pnlgreentax" style="height:90px;width:100%;overflow:auto;">
									<table id="Tbl_7" class="table table-hover table-nomargin dataTable table-bordered">
									<tr id="TableHeaderRow6">
										<th id="TableHeaderCell68" style="font-size:10px;font-weight:bold;">Vehicle No</th>
										<th id="TableHeaderCell72" style="font-size:10px;font-weight:bold;">Expiry Date</th>
									</tr>
									</table>
									</div>
								</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
				<td align="left" valign="top" colspan="5">                                                   <table width="100%" border="10px" style="border-color: #f5a020; border-style: inherit;">
                <tr style="background-color: #3ca99e;">
                    <td style="width: 20%; color: White; height: 20px; font-size: 12px; font-weight: bold;
                              margin-left: 20px;" align="left" valign="top">
                            Spare Stock Details</td>
                    <td style="width: 20%; color: White; height: 20px; font-size: 12px; font-weight: bold;
                            margin-left: 20px;" align="left" valign="top">
                            Tyre Supplier Due Payments
                            </td>
                    <td style="width: 20%; color: White; height: 20px; font-size: 12px; font-weight: bold;
                        margin-left: 20px;" align="left" valign="top">
                        Vehicle Finance Status</td>
                    <td style="width: 20%; color: White; height: 20px; font-size: 12px; font-weight: bold;
                                                                                            margin-left: 20px;" align="left" valign="top">
                                                                                        </td>
                                                                                        <td style="width: 20%; color: White; height: 20px; font-size: 12px; font-weight: bold;
                                                                                            margin-left: 20px;" align="left" valign="top">
                                                                                            Company Expenses Done
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td align="left" valign="top" style="height: 300px;">
                                                                                            <div id="PnlSpareStock" style="height:90px;width:100%;overflow:auto;">
	
                                                                                                <table id="Tbl_17" class="table table-hover table-nomargin dataTable table-bordered">
		<tr id="TableHeaderRow15">
			<th id="TableHeaderCell19" style="font-size:10px;font-weight:bold;">Total Qty.</th><th id="TableHeaderCell20" style="font-size:10px;font-weight:bold;">Amount</th>
		</tr><tr>
			<td align="left" style="font-size:7pt;font-weight:normal;"></td><td align="right" style="font-size:7pt;font-weight:normal;"></td>
		</tr>
	</table>
                                                                                            
</div>
                                                                                            <table width="100%">
                                                                                                <tr style="background-color: #3ca99e;">
                                                                                                    <td style="width: 100%; color: White; height: 20px; font-size: 12px; font-weight: bold;
                                                                                                        margin-left: 20px;" align="left" valign="top">
                                                                                                        Spare Issued Details
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td align="left" valign="top">
                                                                                                        <div id="PnlSpareIssuedDetails" style="height:90px;width:100%;overflow:auto;">
	
                                                                                                            <table id="Tbl_21" class="table table-hover table-nomargin dataTable table-bordered">
		<tr id="TableHeaderRow19">
			<th id="TableHeaderCell36" style="font-size:10px;font-weight:bold;">Total Qty.</th><th id="TableHeaderCell37" style="font-size:10px;font-weight:bold;">Amount</th>
		</tr><tr>
			<td align="left" style="font-size:7pt;font-weight:normal;"></td><td align="right" style="font-size:7pt;font-weight:normal;"></td>
		</tr>
	</table>
                                                                                                        
</div>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </table>
                                                                                            <table width="100%">
                                                                                                <tr style="background-color: #3ca99e;">
                                                                                                    <td style="width: 100%; color: White; height: 20px; font-size: 12px; font-weight: bold;
                                                                                                        margin-left: 20px;" align="left" valign="top">
                                                                                                        Tyre Stock Details
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td align="left" valign="top">
                                                                                                        <div id="PnlTyreStockDetails" style="height:90px;width:100%;overflow:auto;">
	
                                                                                                            <table id="Tbl_22" class="table table-hover table-nomargin dataTable table-bordered">
		<tr id="TableHeaderRow20">
			<th id="TableHeaderCell38" style="font-size:10px;font-weight:bold;">NEW</th><th id="TableHeaderCell39" style="font-size:10px;font-weight:bold;">OLD</th><th id="TableHeaderCell40" style="font-size:10px;font-weight:bold;">REMOLDED</th><th id="TableHeaderCell41" style="font-size:10px;font-weight:bold;">SCRAPPED</th>
		</tr><tr>
			<td align="center" style="font-size:7pt;font-weight:normal;">2</td><td align="center" style="font-size:7pt;font-weight:normal;">0</td><td align="center" style="font-size:7pt;font-weight:normal;">0</td><td align="center" style="font-size:7pt;font-weight:normal;">0</td>
		</tr>
	</table>
                                                                                                        
</div>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </table>
                                                                                            <table width="100%">
                                                                                                <tr style="background-color: #3ca99e;">
                                                                                                    <td style="width: 100%; color: White; height: 20px; font-size: 12px; font-weight: bold;
                                                                                                        margin-left: 20px;" align="left" valign="top">
                                                                                                        Tyre Issued Details
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td align="left" valign="top">
                                                                                                        <div id="PnlTyreIssuedDetails" style="height:90px;width:100%;overflow:auto;">
	
                                                                                                            <table id="Tbl_23" class="table table-hover table-nomargin dataTable table-bordered">
		<tr id="TableHeaderRow21">
			<th id="TableHeaderCell43" style="font-size:10px;font-weight:bold;">NEW</th><th id="TableHeaderCell45" style="font-size:10px;font-weight:bold;">OLD</th><th id="TableHeaderCell46" style="font-size:10px;font-weight:bold;">REMOLDED</th>
		</tr><tr>
			<td align="center" style="font-size:7pt;font-weight:normal;">0</td><td align="center" style="font-size:7pt;font-weight:normal;">0</td><td align="center" style="font-size:7pt;font-weight:normal;">0</td>
		</tr>
	</table>
                                                                                                        
</div>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </table>
                                                                                            <table width="100%">
                                                                                                <tr style="background-color: #3ca99e;">
                                                                                                    <td style="width: 100%; color: White; height: 20px; font-size: 12px; font-weight: bold;
                                                                                                        margin-left: 20px;" align="left" valign="top">
                                                                                                        Overall Vehicles View
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td align="left" valign="top">
                                                                                                        <div id="PnlOverallvehicles" style="height:90px;width:100%;overflow:auto;">
	
                                                                                                            <table id="Tbl_16" class="table table-hover table-nomargin dataTable table-bordered">
		<tr id="TableHeaderRow14">
			<th id="TableHeaderCell17" style="font-size:10px;font-weight:bold;">Self</th><th id="TableHeaderCell18" style="font-size:10px;font-weight:bold;">Attached</th>
		</tr><tr>
			<td align="center" style="font-size:7pt;font-weight:normal;">193</td><td align="center" style="font-size:7pt;font-weight:normal;">808</td>
		</tr>
	</table>
                                                                                                        
</div>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </table>
                                                                                            <table width="100%">
                                                                                                <tr style="background-color: #3ca99e;">
                                                                                                    <td style="width: 100%; color: White; height: 20px; font-size: 12px; font-weight: bold;
                                                                                                        margin-left: 20px;" align="left" valign="top">
                                                                                                        Current Vehicle Location
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td align="left" valign="top">
                                                                                                        <div id="PnlCurrentVehicleLocation" style="height:90px;width:100%;overflow:auto;">
	
                                                                                                        
</div>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </table>
                                                                                        </td>
                                                                                        <td align="left" valign="top">
                                                                                            <div id="PnlTyreSupplierDuePayments" style="height:90px;width:100%;overflow:auto;">
	
                                                                                                <table id="Tbl_12" class="table table-hover table-nomargin dataTable table-bordered">
		<tr id="TableHeaderRow10">
			<th id="TableHeaderCell7" style="font-size:10px;font-weight:bold;">Supplier</th><th id="TableHeaderCell8" style="font-size:10px;font-weight:bold;">Amount</th>
		</tr>
	</table>
                                                                                            
</div>
                                                                                            <table width="100%">
                                                                                                <tr style="background-color: #3ca99e;">
                                                                                                    <td style="width: 100%; color: White; height: 20px; font-size: 12px; font-weight: bold;
                                                                                                        margin-left: 20px;" align="left" valign="top">
                                                                                                        Spare Supplier Due Payments
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td align="left" valign="top">
                                                                                                        <div id="PnlSpareSupplierDuePayments" style="height:90px;width:100%;overflow:auto;">
	
                                                                                                        
</div>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </table>
                                                                                            <table width="100%">
                                                                                                <tr style="background-color: #3ca99e;">
                                                                                                    <td style="width: 100%; color: White; height: 20px; font-size: 12px; font-weight: bold;
                                                                                                        margin-left: 20px;" align="left" valign="top">
                                                                                                        Fuel Outstanding
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td align="left" valign="top">
                                                                                                        <div id="PnlFuelOutstanding" style="height:90px;width:100%;overflow:auto;">
	
                                                                                                            <table id="Tbl_24" class="table table-hover table-nomargin dataTable table-bordered">
		<tr id="TableHeaderRow22">
			<th id="TableHeaderCell47" style="font-size:10px;font-weight:bold;">Pump Name</th><th id="TableHeaderCell48" style="font-size:10px;font-weight:bold;">Amount</th>
		</tr>
	</table>
                                                                                                        
</div>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </table>
                                                                                            <table width="100%">
                                                                                                <tr style="background-color: #3ca99e;">
                                                                                                    <td style="width: 100%; color: White; height: 20px; font-size: 12px; font-weight: bold;
                                                                                                        margin-left: 20px;" align="left" valign="top">
                                                                                                        General Expense Payment Outstanding
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td align="left" valign="top">
                                                                                                        <div id="PnlExpensePaymenmtOutstanding" style="height:90px;width:100%;overflow:auto;">
	
                                                                                                            <table id="Tbl_14" class="table table-hover table-nomargin dataTable table-bordered">
		<tr id="TableHeaderRow12">
			<th id="TableHeaderCell11" style="font-size:10px;font-weight:bold;">Job Done By</th><th id="TableHeaderCell13" style="font-size:10px;font-weight:bold;">Amount</th>
		</tr>
	</table>
                                                                                                        
</div>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </table>
                                                                                            <table width="100%">
                                                                                                <tr style="background-color: #3ca99e;">
                                                                                                    <td style="width: 100%; color: White; height: 20px; font-size: 12px; font-weight: bold;
                                                                                                        margin-left: 20px;" align="left" valign="top">
                                                                                                        Tyre Remolding Outstanding
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td align="left" valign="top">
                                                                                                        <div id="PnlTyreRemoldingOutstanding" style="height:90px;width:100%;overflow:auto;">
	
                                                                                                            <table id="Tbl_13" class="table table-hover table-nomargin dataTable table-bordered">
		<tr id="TableHeaderRow11">
			<th id="TableHeaderCell9" style="font-size:10px;font-weight:bold;">Supplier</th><th id="TableHeaderCell10" style="font-size:10px;font-weight:bold;">Amount</th>
		</tr>
	</table>
                                                                                                        
</div>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </table>
                                                                                            <table width="100%">
                                                                                                <tr style="background-color: #3ca99e;">
                                                                                                    <td style="width: 100%; color: White; height: 20px; font-size: 12px; font-weight: bold;
                                                                                                        margin-left: 20px;" align="left" valign="top">
                                                                                                        Tyre Expense Payment Outstanding
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td align="left" valign="top">
                                                                                                        <div id="PnlTyreExpensePaymenmtOutstanding" style="height:90px;width:100%;overflow:auto;">
	
                                                                                                            <table id="Tbl_15" class="table table-hover table-nomargin dataTable table-bordered">
		<tr id="TableHeaderRow13">
			<th id="TableHeaderCell15" style="font-size:10px;font-weight:bold;">Supplier</th><th id="TableHeaderCell16" style="font-size:10px;font-weight:bold;">Amount</th>
		</tr>
	</table>
                                                                                                        
</div>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </table>
                                                                                        </td>
                                                                                        <td align="left" valign="top" colspan="2">
                                                                                            <table width="100%">
                                                                                                <tr>
                                                                                                    <td colspan="2">
                                                                                                        <div id="PnlVehicleFinanceStatus" style="height:90px;width:100%;overflow:auto;">
	
                                                                                                            <table id="Tbl_20" class="table table-hover table-nomargin dataTable table-bordered">
		<tr id="TableHeaderRow18">
			<th id="TableHeaderCell30" style="font-size:10px;font-weight:bold;">Vehicle No</th><th id="TableHeaderCell32" style="font-size:10px;font-weight:bold;">Finance Amt.</th><th id="TableHeaderCell34" style="font-size:10px;font-weight:bold;">Paid Amt.</th><th id="TableHeaderCell35" style="font-size:10px;font-weight:bold;">Balance</th>
		</tr>
	</table>
                                                                                                        
</div>
                                                                                                        <table width="100%">
                                                                                                            <tr style="background-color: #3ca99e;">
                                                                                                                <td style="width: 100%; color: White; height: 20px; font-size: 12px; font-weight: bold;
                                                                                                                    margin-left: 20px;" align="left" valign="top">
                                                                                                                    Due Finance EMI
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td align="left" valign="top">
                                                                                                                    <div id="PnlDueFinanceEMI" style="height:90px;width:100%;overflow:auto;">
	
                                                                                                                        <table id="Tbl_19" class="table table-hover table-nomargin dataTable table-bordered">
		<tr id="TableHeaderRow17">
			<th id="TableHeaderCell26" style="font-size:10px;font-weight:bold;">Vehicle No</th><th id="TableHeaderCell27" style="font-size:10px;font-weight:bold;">Amount</th><th id="TableHeaderCell28" style="font-size:10px;font-weight:bold;">Bank</th><th id="TableHeaderCell29" style="font-size:10px;font-weight:bold;">Due Date</th>
		</tr>
	</table>
                                                                                                                    
</div>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                        </table>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td>
                                                                                                        <table width="100%">
                                                                                                            <tr style="background-color: #3ca99e;">
                                                                                                                <td style="width: 100%; color: White; height: 20px; font-size: 12px; font-weight: bold;
                                                                                                                    margin-left: 20px;" align="left" valign="top">
                                                                                                                    Vehicle Service Reminders
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td align="left" valign="top">
                                                                                                                    <div id="PnlVehicleServiceReminders" style="height:200px;width:100%;overflow:auto;">
	
                                                                                                                    
</div>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                        </table>
                                                                                                    </td>
                                                                                                    <td rowspan="2" valign="top">
                                                                                                        <table width="100%">
                                                                                                            <tr style="background-color: #3ca99e;">
                                                                                                                <td style="width: 100%; color: White; height: 20px; font-size: 12px; font-weight: bold;
                                                                                                                    margin-left: 20px;" align="left" valign="top">
                                                                                                                    Vehicle Cost To Company
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td align="left" valign="top">
                                                                                                                    <div id="PnlVehicleCostToCompany" style="height:350px;width:100%;overflow:auto;">
	
                                                                                                                        <table id="Tbl_11" class="table table-hover table-nomargin dataTable table-bordered">
		<tr id="TableHeaderRow9">
			<th id="TableHeaderCell5" style="font-size:10px;font-weight:bold;">Type</th><th id="TableHeaderCell6" style="font-size:10px;font-weight:bold;">Amount</th>
		</tr><tr>
			<td align="left" style="font-size:7pt;font-weight:normal;">Document Renewal</td><td align="right" style="font-size:7pt;font-weight:normal;">10000</td>
		</tr><tr>
			<td align="left" style="font-size:7pt;font-weight:normal;">Services Done</td><td align="right" style="font-size:7pt;font-weight:normal;">10000</td>
		</tr><tr>
			<td align="left" style="font-size:7pt;font-weight:normal;">Fuel Cost</td><td align="right" style="font-size:7pt;font-weight:normal;">10000</td>
		</tr><tr>
			<td align="left" style="font-size:7pt;font-weight:normal;">Spares Consumed</td><td align="right" style="font-size:7pt;font-weight:normal;">10000</td>
		</tr><tr>
			<td align="left" style="font-size:7pt;font-weight:normal;">Tyres Consumed</td><td align="right" style="font-size:7pt;font-weight:normal;">10000</td>
		</tr><tr>
			<td align="left" style="font-size:7pt;font-weight:normal;">Accident Expenses</td><td align="right" style="font-size:7pt;font-weight:normal;">10000</td>
		</tr><tr>
			<td align="left" style="font-size:7pt;font-weight:normal;">General Expenses</td><td align="right" style="font-size:7pt;font-weight:normal;">10000</td>
		</tr><tr>
			<td align="left" style="font-size:7pt;font-weight:normal;">Repair and Maintenance</td><td align="right" style="font-size:7pt;font-weight:normal;">10000</td>
		</tr><tr>
			<td align="left" style="font-size:7pt;font-weight:normal;">Finance EMI paid</td><td align="right" style="font-size:7pt;font-weight:normal;">10000</td>
		</tr><tr>
			<td align="left" style="font-size:7pt;font-weight:normal;">Total</td><td align="right" style="font-size:7pt;font-weight:normal;">0</td>
		</tr>
	</table>
                                                                                                                    
</div>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                        </table>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td>
                                                                                                        <table width="100%">
                                                                                                            <tr style="background-color: #3ca99e;">
                                                                                                                <td style="width: 100%; color: White; height: 20px; font-size: 12px; font-weight: bold;
                                                                                                                    margin-left: 20px;" align="left" valign="top">
                                                                                                                    Company Purchases Done
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td align="left" valign="top">
                                                                                                                    <div id="PnlPurchase" style="height:138px;width:100%;overflow:auto;">
	
                                                                                                                        <table id="Tbl_18" class="table table-hover table-nomargin dataTable table-bordered">
		<tr id="TableHeaderRow16">
			<th id="TableHeaderCell21" style="font-size:10px;font-weight:bold;">Item</th><th id="TableHeaderCell23" style="font-size:10px;font-weight:bold;">Qty</th><th id="TableHeaderCell25" style="font-size:10px;font-weight:bold;">Amount</th>
		</tr><tr>
			<td align="left" style="font-size:7pt;font-weight:normal;">Tyre Purchase</td><td align="right" style="font-size:7pt;font-weight:normal;">10</td><td align="right" style="font-size:7pt;font-weight:normal;">10000</td>
		</tr><tr>
			<td align="left" style="font-size:7pt;font-weight:normal;">Spare Purchase</td><td align="right" style="font-size:7pt;font-weight:normal;">10</td><td align="right" style="font-size:7pt;font-weight:normal;">10000</td>
		</tr><tr>
			<td align="left" style="font-size:7pt;font-weight:normal;">Other Purchase</td><td align="right" style="font-size:7pt;font-weight:normal;">10</td><td align="right" style="font-size:7pt;font-weight:normal;">10000</td>
		</tr>
	</table>
                                                                                                                    
</div>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                        </table>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </table>
                                                                                        </td>
                                                                                        <td align="left" valign="top">
                                                                                            <div id="PnlCompanyExpensesDone" style="height:372px;width:100%;overflow:auto;">
	
                                                                                                <table id="Tbl_10" class="table table-hover table-nomargin dataTable table-bordered">
		<tr id="TableHeaderRow8">
			<th id="TableHeaderCell1" style="font-size:10px;font-weight:bold;">Expense Type</th><th id="TableHeaderCell3" style="font-size:10px;font-weight:bold;">Amount</th>
		</tr><tr>
			<td align="left" style="font-size:7pt;font-weight:normal;">Tyre Purchase</td><td align="right" style="font-size:7pt;font-weight:normal;">10000</td>
		</tr><tr>
			<td align="left" style="font-size:7pt;font-weight:normal;">Spare Purchase</td><td align="right" style="font-size:7pt;font-weight:normal;">10000</td>
		</tr><tr>
			<td align="left" style="font-size:7pt;font-weight:normal;">Tyre Remolding</td><td align="right" style="font-size:7pt;font-weight:normal;">10000</td>
		</tr><tr>
			<td align="left" style="font-size:7pt;font-weight:normal;">Fuel Purchase</td><td align="right" style="font-size:7pt;font-weight:normal;">10000</td>
		</tr><tr>
			<td align="left" style="font-size:7pt;font-weight:normal;">General Expenses</td><td align="right" style="font-size:7pt;font-weight:normal;">10000</td>
		</tr><tr>
			<td align="left" style="font-size:7pt;font-weight:normal;">Vehicle Services</td><td align="right" style="font-size:7pt;font-weight:normal;">10000</td>
		</tr><tr>
			<td align="left" style="font-size:7pt;font-weight:normal;">Document Renewals</td><td align="right" style="font-size:7pt;font-weight:normal;">10000</td>
		</tr><tr>
			<td align="left" style="font-size:7pt;font-weight:normal;">Repair & Maintenance</td><td align="right" style="font-size:7pt;font-weight:normal;">10000</td>
		</tr><tr>
			<td align="left" style="font-size:7pt;font-weight:normal;">Finance EMI Paid</td><td align="right" style="font-size:7pt;font-weight:normal;">10000</td>
		</tr><tr>
			<td align="left" style="font-size:7pt;font-weight:normal;">Accident Expenses</td><td align="right" style="font-size:7pt;font-weight:normal;">10000</td>
		</tr><tr>
			<td align="left" style="font-size:7pt;font-weight:normal;">Total</td><td align="right" style="font-size:7pt;font-weight:normal;">0</td>
		</tr>
	</table>
                                                                                            
</div>
                                                                                        </td>
                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" valign="top">
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td valign="top">
                            &nbsp;
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    </form>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" style="margin-top: 208px;">
      <div class="modal-header">
        <h3><b>Please Select Any One..</b></h3>
      </div>
      <div class="modal-body">
        <table id="account_table">
            <thead>
                <tr>
                    <th>Sno.</th>
                    <th>fleets</th>
                    <th>Select</th>
                </tr> 
            </thead>
            <tbody>
                <?php 
                    $count = 0;
                    foreach($data['fleet_id'] as $fleet){
                       $fleet_name = App\Fleet::find($fleet->fleet_id);  
                       
                 ?>
                        <tr>
                            <td>{{ ++$count }}</td>
                            <td>{{ $fleet_name->fleet_code }}</td>
                            <td><input type="radio" name="select_fleet" class="select_fleet" value="{{ $fleet_name->fleet_code }}"></td>
                        </tr>    
                <?php } ?>
            </tbody>
        </table>
      </div>
      <div class="modal-footer">        
        <input disabled="true" type="submit" class="btn btn-primary" value="Submit" id="submit">
      </div>
    </div>
  </div>
</div>
</body>
</html>
<input type="hidden", id='fleet' name='fleet' value="{{ session('fleet_code') ?? $data['fleet'] }}">

<script type="text/javascript">
    $(document).ready(function(){       
        $('#account_table').DataTable({
            "bPaginate": false,
            "bLengthChange": false,
            "bFilter": false,
            "bInfo": false,
            "bAutoWidth": false});        
                })
    $(document).ready(function(){

        var fleet = $('#fleet').val();
        if(fleet == 'yes'){
            $('#myModal').modal({
                backdrop: 'static',
                keyboard: false});
            }
    })

    $(document).on('click','#submit',function(event){
        event.preventDefault();
        var fleet_code = $("input:radio.select_fleet:checked").val();
        $.ajax({
            url: '/fleet_ckeck',
            type: 'POST',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {fleet_code:fleet_code},
            success: function (data) {
               if(data == 'success'){
                     $('#myModal').modal('hide');
                     location.reload();  // for reload page
               }
            }
        })
    });
  
    $(document).on('click','input[name="select_fleet"]',function() { 
        if ($(this).is(':checked')) {
          $('#submit').attr('disabled',false)
        } else {
          alert("not checked");
        }   
    });

</script>

@endsection