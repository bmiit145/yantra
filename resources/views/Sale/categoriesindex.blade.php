@extends('layout.header')
@section('content')
@section('title', 'Sales')
@section('head_breadcrumb_title', 'Product Categories')
@section('head_new_btn_link', route('categories.create'))
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