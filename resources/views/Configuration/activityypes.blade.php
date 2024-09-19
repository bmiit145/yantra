@extends('layout.header')
{{--@section('head_new_btn_link', route('crm.show' , ['crm' => 'new']))--}}

@section('navbar_menu')
    <li class="dropdown">
        <a href="#">Sales</a>
        <div class="dropdown-content">
            <a href="{{ route('crm.index') }}">My Pipeline</a>
            <a href="#">My Activities</a>
            <a href="#">My Quotations</a>
            <a href="#">Teams</a>
            <a href="{{ route('contact.index', ['tab' => 'customers']) }}">Customers</a>
        </div>
    </li>
    <li>
        <a href="{{ route('lead.index') }}">Leads</a>
    </li>
    <li class="dropdown">
        <a href="#">Reporting</a>
        <div class="dropdown-content">
            <!-- Dropdown content for Reporting -->
            <a href="{{route('crm.forecasting')}}">Forecast</a>
            <a href="{{ route('crm.index') }}">Pipeline</a>
            <a href="{{ route('lead.index') }}">Leads</a>
            <a href="#">Activities</a>
        </div>
    </li>
    <li class="dropdown">
        <a href="#">Configuration</a>
        <div class="dropdown-content">
            <a href="#"><b>Settings</b></a>
            <a href="#"><b>Sales Teams</b></a>
            <a href="#"><b>Activities</b></a>
            <a href="#" style="margin-left: 15px;">Activity Types</a>
            <a href="#" style="margin-left: 15px;">Activity Plans</a>
            <a href="#"><b>Recurring Plans</b></a>
            <a href="#"><b>Pipeline</b></a>
            <a href="#" style="margin-left: 15px;">Tags</a>
            <a href="#" style="margin-left: 15px;">Lost Reasons</a>
           
        </div>
    </li>
@endsection

@section('head_breadcrumb_title', 'Pipeline')
@section('head')
@vite([
    'resources/css/crm_2.css',
//    'resources/css/odoo/web.assets_web_print.min.css'
    ])
@endsection



@section('content')




@endsection