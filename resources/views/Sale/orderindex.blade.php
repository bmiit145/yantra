@extends('layout.header')
@section('content')
@section('title', 'Sales')
@section('head_breadcrumb_title', '')
@section('head_new_btn_link', route('orders.create'))
@section('image_url', asset('images/Sales.png'))
@section('navbar_menu')
    <li class="dropdown">
        <a href="#">Orders</a>
        <div class="dropdown-content">
            <a href="{{route('quotations.index')}}">Quotations</a>
            <a href="{{route('orders.index')}}">Orders</a>
            <a href="#">Sales Teams</a>
            <a href="{{ route('contact.index', ['tab' => 'customers']) }}">Customers</a>
        </div>
    </li>
  
    <li class="dropdown">
        <a href="#">To Invoice</a>
        <div class="dropdown-content">
            <!-- Dropdown content for Reporting -->
            <a href="#">Orders to Invoice</a>
            <a href="#">Orders to Upsell</a>
        </div>
    </li>
    <li class="dropdown">
        <a href="#">Products</a>
        <div class="dropdown-content">
            <a href="{{route('product.index')}}">Products</a>
            <a href="{{route('pricelists.index')}}">Pricelists</a>
        </div>
    </li>
    <li class="dropdown">
        <a href="#">Reporting</a>
        <div class="dropdown-content">
            <a href="#">Sales</a>
            <a href="#">Salespersons</a>
            <a href="#">Products</a>
            <a href="#">Customers</a>
        </div>
    </li>
    <li class="dropdown">
        <a href="#">Configuration</a>
        <div class="dropdown-content">
            <a href="#"><b>Settings</b></a>
            <a href="{{route('salesteam.index')}}"><b>Sales Teams</b></a>
            <a href="#"><b>Sales Orders</b></a>
            <a href="#" style="margin-left: 15px;">Tags</a>
            <a href="#"><b>Product</b></a>
            <a href="{{ route('categories.index') }}">Product Category</a>
            <a href="#" style="margin-left: 15px;">Product Tags</a>
            <a href="#"><b>Online Pyament</b></a>
            <a href="#" style="margin-left: 15px;">Payment Provide</a>
            <a href="#" style="margin-left: 15px;">Payment Methods</a>
            <a href="#"><b>Activities</b></a>
            <a href="#" style="margin-left: 15px;">Activities Plans</a>
        </div>
    </li>
@endsection

<div class="card" style="padding: 1%">
    <div class="table-responsive text-nowrap">
        <table id="example" class="display nowrap">
            <thead>
                <tr>
                    <th>Order Date</th>
                    <th>Customer</th>
                    <th>Salesperson</th>
                    <th>Activities</th>
                    <th>Invoice Status</th>
                    <th>Amount to Invoice</th>
                </tr>
            </thead>
            <tbody id="bill_list">
                <!-- Dynamic rows will be inserted here -->
            </tbody>
        </table>
    </div>
</div>



<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });

    
</script>



@endsection