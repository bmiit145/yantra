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

<style>
    .dropdown-btn {
        background-color: #f1f1f1;
        border: none;
        cursor: pointer;
        padding: 10px;
        border-radius: 5px;
    }

    .dropdown-menu {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
        padding: 10px;
    }

    .dropdown-menu a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        cursor: pointer;
    }

    .dropdown-menu a:hover {
        background-color: #ddd;
    }

    .dropdown-active .dropdown-menu {
        display: block;
    }

    .dropdown-checkbox {
        margin-bottom: 10px;
    }

    .dropdown-checkbox label {
        display: flex;
        align-items: center;
        cursor: pointer;
    }

    .dropdown-checkbox input[type="checkbox"] {
        margin-right: 5px;
    }
</style>

<div class="card" style="padding: 1%">
    <div class="table-responsive text-nowrap">
    <button class="dropdown-btn">Show/Hide Columns</button>
        <div class="dropdown-menu">
            <div class="dropdown-checkbox">
                <label><input type="checkbox" data-column="0" checked> Lead</label>
            </div>
            <div class="dropdown-checkbox">
                <label><input type="checkbox" data-column="1" checked> Email</label>
            </div>
            <div class="dropdown-checkbox">
                <label><input type="checkbox" data-column="2"> City</label>
            </div>
            <div class="dropdown-checkbox">
                <label><input type="checkbox" data-column="3"> State</label>
            </div>
            <div class="dropdown-checkbox">
                <label><input type="checkbox" data-column="4"> Country</label>
            </div>
            <div class="dropdown-checkbox">
                <label><input type="checkbox" data-column="5"> Title</label>
            </div>
            <div class="dropdown-checkbox">
                <label><input type="checkbox" data-column="6"> Tag</label>
            </div>
            <div class="dropdown-checkbox">
                <label><input type="checkbox" data-column="7"> Salesperson</label>
            </div>
            <div class="dropdown-checkbox">
                <label><input type="checkbox" data-column="8"> Sales Team</label>
            </div>
        </div>
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
                    <tr data-id="{{ $lead->id ?? ''}}" class="lead-row">
                        <td>{{$lead->product_name ?? ''}}</td>
                        <td>{{$lead->email ?? ''}}</td>
                        <td>{{$lead->city ?? ''}}</td>
                        <td>{{$lead->getState->name ?? ''}}</td>
                        <td>{{$lead->getCountry->name ?? ''}}</td>
                        <td>{{$lead->getTilte->title ?? ''}}</td>
                        <td>
                            @foreach ($lead->getTag as $tag)
                                {{$tag->name ?? ''}}
                            @endforeach
                        </td>
                        <td>{{$lead->country ?? ''}}</td>
                        <td>{{$lead->country ?? ''}}</td>
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

         // Handle column visibility based on checkbox status
         $('.dropdown-menu input[type="checkbox"]').on('change', function() {
            var column = table.column($(this).data('column'));
            column.visible(this.checked);
        });
      
        // Set default visibility for columns
        $('#example').DataTable().columns().every(function() {
            var column = this;
            var index = column.index();
            var checkbox = $('.dropdown-menu input[data-column="' + index + '"]');
            if (checkbox.length && checkbox.is(':checked')) {
                column.visible(true);
            } else {
                column.visible(false);
            }
        });
    });
  
</script>
<script>
    $(document).on('click', '.lead-row', function() {
        var leadId = $(this).data('id');
        window.location.href = "{{ route('lead.create') }}/" + leadId;
    });

    function storeLead() {
        $.ajax({
            url: "{{ route('lead.storeLead') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
            },
            success: function(response) {
                console.log('Lead stored successfully.', response);
            },
            error: function(error) {
                console.error('Error storing lead:', error);
            }
        });
    }

    // Auto-refresh every 2 minutes
    setInterval(function() {
        console.log('Attempting to store lead...');
        storeLead();
    }, 2 * 60 * 1000);
    storeLead();
</script>

<script>
    $(document).on('click', '.dropdown-btn', function(event) {
        event.stopPropagation();
        $(this).parent().toggleClass('dropdown-active');
    });

    $(document).on('click', function(event) {
        if (!$(event.target).closest('.dropdown-btn').length) {
            $('.dropdown-menu').parent().removeClass('dropdown-active');
        }
    });
</script>


@endsection 