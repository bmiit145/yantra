@extends('layout.header')
@section('content')
@vite('resources/css/lead.css')
@vite('resources/css/crm.css')
@section('title', 'CRM')
@section('image_url', 'images/CRM.png')
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
            <!-- Dropdown content for Reporting -->
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


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">



    
    <section class="lead_info">
        <div class="container-full">
            <table class="lead_inner_info"> 
                <thead class="lead_inner_head"> 
                    <tr> 
                        <th><input type="checkbox" name="vehicle1" value="Bike"></th>
                        <th>Lead</th> 
                        <th>Contact Name</th> 
                        <th>Street 1</th> 
                        <th>Company</th> 
                        <th>Email</th> 
                        <th>Salesperson</th> 
                        <th>Campaign</th> 
                        <th>Medium</th> 
                        <th> 
                            <div class="btn-group">
                                <button type="button" class="lead_dropdown-toggle dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    <svg id="SvgjsSvg1012" width="20" height="20" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs"><defs id="SvgjsDefs1013"></defs><g id="SvgjsG1014"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 14" width="20" height="20"><path fill="#2d4356" d="M10.69 7.63c-1.43 0-2.62.99-2.96 2.31H.25v1.5h7.48c.34 1.32 1.53 2.31 2.96 2.31a3.06 3.06 0 1 0 0-6.12zM6.27 2.56C5.93 1.24 4.74.25 3.31.25a3.06 3.06 0 1 0 0 6.12c1.43 0 2.62-.99 2.96-2.31h7.48v-1.5H6.27z" class="color2d4356 svgShape"></path></g></svg>
                                </button>
                                <ul class="dropdown-menu">
                                <li>
                                    <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                    <label class="o_optional_label" for="vehicle1">Created on</label><br>
                                </li>
                                <li>
                                    <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                    <label class="o_optional_label" for="vehicle1">Contact Name</label><br>
                                </li>
                                <li>
                                    <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                    <label class="o_optional_label" for="vehicle1">Company Name</label><br>
                                </li>
                                <li>
                                    <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                    <label class="o_optional_label" for="vehicle1">Street 1</label><br>
                                </li>
                                <li>
                                    <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                    <label class="o_optional_label" for="vehicle1">Street 2</label><br>
                                </li>
                                <li>
                                    <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                    <label class="o_optional_label" for="vehicle1">Company</label><br>
                                </li>
                                <li>
                                    <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                    <label class="o_optional_label" for="vehicle1">City</label><br>
                                </li>
                                <li>
                                    <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                    <label class="o_optional_label" for="vehicle1">Email</label><br>
                                </li>
                                <li>
                                    <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                    <label class="o_optional_label" for="vehicle1">Phone</label><br>
                                </li>
                                <li>
                                    <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                    <label class="o_optional_label" for="vehicle1">Salesperson</label><br>
                                </li>
                                <li>
                                    <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                    <label class="o_optional_label" for="vehicle1">Sales Team</label><br>
                                </li>
                                <li>
                                    <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                    <label class="o_optional_label" for="vehicle1">Campaign</label><br>
                                </li>
                                <li>
                                    <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                    <label class="o_optional_label" for="vehicle1">Medium</label><br>
                                </li>
                                <li>
                                    <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                    <label class="o_optional_label" for="vehicle1">Source</label><br>
                                </li>
                                <li>
                                    <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                    <label class="o_optional_label" for="vehicle1">Probability (%)</label><br>
                                </li>
                                <li>
                                    <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                    <label class="o_optional_label" for="vehicle1">Tags</label><br>
                                </li>
                                <li>
                                    <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                    <label class="o_optional_label" for="vehicle1">Priority</label><br>
                                </li>
                                </ul>
                            </div>
                        </th>
                       
                          
                    </tr> 
                </thead> 
                <tbody class="lead_inner_main"> 
                    @foreach ($data as $item)
                        
                  
                        <tr> 
                            <td><input type="checkbox" name="vehicle1" value="Bike"></td>
                            <td>{{ $item->created_at }}</td> 
                            <td>{{ $item->contact_name }}</td> 
                            <td> {{ $item->address }}</td> 
                            <td> {{ $item->company_name }}</td> 
                            <td>{{ $item->email }}</td> 
                            <td>{{ $item->salesperson }}</td> 
                            <td>{{ $item->marketing_campaign }}</td> 
                            <td>{{ $item->marketing_medium }}</td> 
                           
                        </tr> 
                    @endforeach
                </tbody> 
                </table> 
        </div>
    </section>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
    <script>
        $(document).ready(function(){

            $("thead.lead_inner_head tr th input").click(function() {
                console.log("Header Clicked...");
                var isChecked = $(this).prop('checked');
                $("tbody.lead_inner_main tr td:first-child input").prop('checked', isChecked);
                $("tbody.lead_inner_main tr td:first-child input").parents("tr").addClass("active_items")
            });
            $("tbody.lead_inner_main tr td:first-child input").click(function() {
                console.log("Body Checkbox Clicked...");
                var allChecked = true;
                $("tbody.lead_inner_main tr td:first-child input").each(function() {
                    if (!$(this).prop('checked')) {
                        allChecked = false;
                        $(this).parents("tr").removeClass("active_items")
                        console.log("Active Class Removed...");
                    } else {
                        $(this).parents("tr").addClass("active_items");
                        console.log("Active Class Added...");
                    }
                });
                $("thead.lead_inner_head tr th input").prop('checked', allChecked);

            });
            
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


@endsection 