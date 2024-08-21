@extends('layout.header')
@section('content')
@section('head_breadcrumb_title', 'Leads')
@section('head_new_btn_link', route('lead.create'))
@section('navbar_menu')
    <li class="dropdown">
        <a href="#">Sales</a>
        <div class="dropdown-content">
            <a href="#">My Pipeline</a>
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
            <a href="{{route('crm.forecasting')}}">Forecast</a>
            <a href="#">Pipeline</a>
            <a href="#">Leads</a>
            <a href="#">Activities</a>
        </div>
    </li>
    <li class="dropdown">
        <a href="#">Configuration</a>
        <div class="dropdown-content">
            <a href="#">Settings</a>
            <a href="#">Sales Teams</a>
        </div>
    </li>
@endsection

<div class="card" style="padding: 1%">
    <div class="table-responsive text-nowrap">
        <table id="example" class="display nowrap">
            <thead>
                <tr>
                    <th>Lead</th>
                    <th>Email</th>
                    <th>City</th>                    
                    <th>state</th>                    
                    <th>Country</th>
                    <th>Title</th>
                    <th>Tag</th>
                    <th>Salesperson</th>
                    <th>Sales Team</th>
                   
                </tr>
            </thead>
            <tbody>
                @foreach($data as $lead)   
                 <tr>
                    <td>{{$lead->product_name}}</td>
                    <td>{{$lead->email}}</td>
                    <td>{{$lead->city}}</td>
                    <td>{{$lead->getState->name ?? ''}}</td>
                    <td>{{$lead->getCountry->name ?? ''}}</td>
                    <td>{{$lead->getTilte->title ?? ''}}</td>
                    <td>{{$lead->getTag->name ?? ''}}</td>
                    <td>{{$lead->country}}</td>
                    <td>{{$lead->country}}</td>
                 </tr>
                 @endforeach
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