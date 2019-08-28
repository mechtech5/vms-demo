
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
     @yield('head')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{asset('js/main_admin.js')}}"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
   <script src="https://code.jquery.com/jquery-3.3.1.js"></script>

   
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-dropdown/2.0.3/jquery.dropdown.min.js"></script>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


    <link rel="dns-prefetch" href="{{url('//fonts.gstatic.com')}}">
    <link href="{{url('https://fonts.googleapis.com/css?family=Nunito')}}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css" rel="stylesheet" />
  
<!-- Styles -->

   <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
   <link rel="stylesheet" type="text/css" href="{{ asset('css/chosen.css') }}">
   <link rel="stylesheet" type="text/css" href="{{ asset('css/main_css.css') }}">
   <link rel="stylesheet" type="text/css" href="{{ asset('css/TableTools.css') }}">
   <link rel="stylesheet" type="text/css" href="{{ asset('css/themes.css') }}">
   <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.css') }}">
   <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
   <link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

  
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- #region datatables files -->
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" />
<script src="~/scripts/jquery-1.10.2.js"></script>
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <!-- Styles -->
</head>
<body class="app sidebar-mini rtl">
 <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
            <td align="center" valign="top">
                <div id="navigation">
                    <div class="container-fluid">
                        <ul class='main-nav'>
                            <li class='<?php if(Request::segment(1) == 'dashboard'){ echo 'active'; } ?>' id="L1"><a href="{{route('dashboard.index')}}"><span>Dashboard</span>
                            </a></li>
                            <li id="L2" class='<?php if( (Request::segment(1) == 'city') || (Request::segment(1) == 'state') || (Request::segment(1) == 'vehicle') || (Request::segment(1) == 'vehicleModel') || (Request::segment(1) == 'vehicledetails') || (Request::segment(1) == 'driver')){ echo 'active'; } ?>'><a href="#" data-toggle="dropdown" class='dropdown-toggle'><span>Setup</span>
                                <span class=""></span></a>
                                <ul class="dropdown-menu">
                                    <li class='dropdown-submenu'><a href="#">Other Setup</a>
                                        <ul class="dropdown-menu">
                                            <li><a href="{{route('state.index')}}">State Setup</a></li>
                                            <li><a href="{{route ('city.index')}}">City Setup</a></li>
                                            <li><a href="#">Expense Type Setup</a></li>
                                        </ul>
                                    </li>
                                    <li class='dropdown-submenu'><a href="#">Vehicle Setup</a>
                                        <ul class="dropdown-menu">
                                            <li><a href="{{route('vehicle.index')}}">Vehicle Company</a></li>
                                            <li><a href="{{route('vehicleModel.index')}}">Vehicle Model</a></li>
                                            <li><a href="{{route('vehicledetails.index')}}">Vehicle Details</a></li>
                                            <li><a href="{{route('kmupdate.index')}}">Vehicle KM Update</a></li>
                                            <li><a href="{{route('driver.index')}}">Driver Details</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li id="L3"><a href="#" data-toggle="dropdown" class='dropdown-toggle'><span>Documents</span>
                                <span class=""></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="fpuc.aspx">PUC Details</a> </li>
                                    <li><a href="ffitness.aspx">Fitness Details</a> </li>
                                    <li><a href="froadtax.aspx">Road Tax Details</a> </li>
                                    <li><a href="fgreentax.aspx">Green Tax Details</a> </li>
                                    <li><a href="finsurance.aspx">Insurance Details</a> </li>
                                    <li><a href="fyearlypermit.aspx">State Permit A</a> </li>
                                    <li><a href="fstatepermitb.aspx">State Permit B</a> </li>
                                    <li><a href="ffiveyearlypermit.aspx">All India Permit</a> </li>
                                    <li><a href="TemporaryPermitinfo.aspx">Temporary Permit</a> </li>
                                    <li><a href="VehicleDocumentReport.aspx"><span>Reports</span></a> </li>
                                </ul>
                            </li>
                            <li id="L4"><a href="#" data-toggle="dropdown" class='dropdown-toggle'><span>Spare-Inventory</span>
                                <span class=""></span></a>
                                <ul class="dropdown-menu">
                                    <li class='dropdown-submenu'><a href="#">Setup</a>
                                        <ul class="dropdown-menu">
                                            <li><a href="fitemtype.aspx">Spare Type</a></li>
                                            <li><a href="fitemunit.aspx">Spare Unit</a></li>
                                            <li><a href="fitemcompany.aspx">Spare Company</a></li>
                                            <li><a href="fitemmaster.aspx">Spare Master</a></li>
                                            <li><a href="fssupplier.aspx">Supplier/Vendor</a></li>
                                        </ul>
                                    </li>
                                    <li class='dropdown-submenu'><a href="#">Transactions</a>
                                        <ul class="dropdown-menu">
                                            <li><a href="fmtr.aspx">Material Request</a></li>
                                            <li><a href="fpo.aspx">Purchase Order</a></li>
                                            <li><a href="fgrn.aspx">Goods Receipt Note(GRN)</a></li>
                                            <li><a href="fitemissue.aspx">Spare Issue</a></li>
                                            <li><a href="fitemstockupdate.aspx">Spare Stock Update</a></li>
                                            <li><a href="fSparepaymententry.aspx">Spare Vendor Payment</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="SpareInventoryReport.aspx"><span>Reports</span></a> </li>
                                </ul>
                            </li>
                            <li id="L5"><a href="#" data-toggle="dropdown" class='dropdown-toggle'><span>Tyre-Inventory</span>
                                <span class=""></span></a>
                                <ul class="dropdown-menu">
                                    <li class='dropdown-submenu'><a href="#">Setup</a>
                                        <ul class="dropdown-menu">
                                            <li><a href="ftyrecompany.aspx">Tyre Company</a></li>
                                            <li><a href="ftyremodel.aspx">Tyre Model</a></li>
                                            <li><a href="ftyretype.aspx">Tyre Type</a></li>
                                            <li><a href="fsupplier.aspx">Supplier/Vendor</a></li>
                                        </ul>
                                    </li>
                                    <li class='dropdown-submenu'><a href="#">Transactions</a>
                                        <ul class="dropdown-menu">
                                            <li><a href="fTmtr.aspx">Material Request</a></li>
                                            <li><a href="fTpo.aspx">Purchase Order</a></li>
                                            <li><a href="ftyrepurchaseentry.aspx">Goods Receipt Note(GRN)</a></li>
                                            <li><a href="tyreremoldissue.aspx">Tyre Remolding Issue</a></li>
                                            <li><a href="tyreremoldreturn.aspx">Tyre Remold Return</a></li>
                                            <li><a href="ftyrestockentry.aspx">Tyre Stock</a></li>
                                            <li><a href="ftyreissuetovehicle.aspx">Tyre Issue To Vehicle</a></li>
                                            <li><a href="ftyreexpenseentry.aspx">Tyre Expense</a></li>
                                            <li><a href="ftyrepaymententry.aspx">Tyre Vendor Payment</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="TyreReport.aspx"><span>Reports</span></a> </li>
                                </ul>
                            </li>
                            <li id="L6"><a href="#" data-toggle="dropdown" class='dropdown-toggle'><span>Fuel</span>
                                <span class=""></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="fpetrolpump.aspx">Petrol Pump Details</a> </li>
                                    <li><a href="ffuleentry.aspx">Fuel Filled Entry</a> </li>
                                    <li><a href="ffulepaymententry.aspx">Fuel Bill Payment</a> </li>
                                    <li><a href="FuelReports.aspx"><span>Reports</span></a> </li>
                                </ul>
                            </li>
                            <li id="L7"><a href="#" data-toggle="dropdown" class='dropdown-toggle'><span>Expenses</span>
                                <span class=""></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="fgeneralexpenseentry.aspx">Expense Entry</a></li>
                                    <li><a href="fpaymententry.aspx">Expense Payment Entry</a></li>
                                    <li><a href="faccident.aspx">Accident Entry</a></li>
                                    <li><a href="ExpensesReport.aspx"><span>Reports</span></a> </li>
                                </ul>
                            </li>
                            <li id="L8" class="{{Request::segment(1) == 'filter' ? 'active' : ''}} {{Request::segment(1) == 'oilchange' ? 'active' : ''}} {{Request::segment(1) == 'fueltank' ? 'active' : ''}} {{Request::segment(1) == 'batterycharge' ? 'active' : ''}} {{Request::segment(1) == 'painting' ? 'active' : ''}} oilchange"><a href="#" data-toggle="dropdown" class='dropdown-toggle'><span>Repair/Maintenance</span>
                                <span class=""></span></a>
                                <ul class="dropdown-menu ">
                                    <li class=""><a href="{{route('filter.index')}}">Filter Replacement</a></li>
                                    <li><a href="{{route('oilchange.index')}}">Oil Change</a></li>
                                   
                                    <li><a href="{{route('fueltank.index')}}">Fuel Tank Cleaning</a></li>
                                    <li><a href="{{route('batterycharge.index')}}">Battery Charging</a></li>
                                    <li><a href="{{route('painting.index')}}">Painting Job</a></li>
                                </ul>
                            </li>
                            <li id="L9"><a href="#" data-toggle="dropdown" class='dropdown-toggle'><span>Finance</span>
                                <span class=""></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="FinanceChart.aspx">Finance Entry</a></li>
                                    <li><a href="FinanceReports.aspx"><span>Reports</span></a> </li>
                                </ul>
                            </li>
                            <li id="L10"><a href="#" data-toggle="dropdown" class='dropdown-toggle'><span>Trip</span>
                                <span class=""></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="frmTripStatment.aspx">Trip Sheet</a></li>
                                </ul>
                            </li>
                        </ul>
                        <div class="user">
                            <div class="dropdown">
                                <a href="#" class='dropdown-toggle' data-toggle="dropdown">
                                    {{Auth::user()->name}}
                                    <img src="FLAT/img/demo/user-avatar.jpg" alt="">
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="changepassword.aspx" style="color: Black;">Change Password</a> </li>
                                    <li>
                                       <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
    </table>