@extends('layout.header')
@section('content')
@section('head_breadcrumb_title', 'Leads')
@section('kanban', route('lead.kanban', ['lead' => 'kanban']))
@section('calendar', route('lead.calendar', ['lead' => 'calendar']))
@section('char_area', route('lead.graph'))
@vite([
    'resources/css/chats.css',
    //    'resources/css/odoo/web.assets_web_print.min.css'
])
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

<style>
.head_new_btn{
    display:none
}
.o_form_button_save{
    display:none
}
.location{
    display:none
}
</style>
@endsection
   <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <div class="o_graph_renderer o_renderer h-100 d-flex flex-column border-top undefined">
        <div class="d-flex d-print-none gap-1 flex-shrink-0 mt-2 mx-3 mb-3 overflow-x-auto">
            <div class="btn-group" role="toolbar" aria-label="Main actions">
                <button class="btn btn-primary o-dropdown dropdown-toggle dropdown" aria-expanded="false"> Measures <i class="fa fa-caret-down ms-1"></i></button>
            </div>
            <div class="btn-group" role="toolbar" aria-label="Insert in Spreadsheet">
                        <button class="btn btn-secondary o_graph_insert_spreadsheet"> Insert in Spreadsheet </button>
            </div>
            <div class="btn-group" role="toolbar" aria-label="Change graph">
                    <button class="btn btn-secondary fa fa-bar-chart o_graph_button active" data-tooltip="Bar Chart" aria-label="Bar Chart" data-mode="bar"></button>
                    <button class="btn btn-secondary fa fa-line-chart o_graph_button" data-tooltip="Line Chart" aria-label="Line Chart" data-mode="line"></button>
                    <button class="btn btn-secondary fa fa-pie-chart o_graph_button" data-tooltip="Pie Chart" aria-label="Pie Chart" data-mode="pie"></button>
            </div>
            <div class="btn-group" role="toolbar" aria-label="Change graph">
                    <button class="btn btn-secondary fa fa-database o_graph_button" data-tooltip="Stacked" aria-label="Stacked"></button>
            </div>
            <div class="btn-group" role="toolbar" aria-label="Sort graph" name="toggleOrderToolbar">
                <button class="btn btn-secondary fa fa-sort-amount-desc o_graph_button" data-tooltip="Descending" aria-label="Descending"></button>
                <button class="btn btn-secondary fa fa-sort-amount-asc o_graph_button" data-tooltip="Ascending" aria-label="Ascending"></button>
            </div>
        </div>
        <div class="o_graph_canvas_container flex-grow-1 position-relative px-3 pb-3" style="">
            <canvas id="leadChart" style="display: block; box-sizing: border-box;"></canvas>
        </div>
    </div>

    {{-- <canvas style="padding: %;" id="leadChart" width="200" height="100"></canvas> --}}

    <script>
    var chartType = 'bar'; // Default chart type

    // Sample chart data
    var chartData = {
        labels: ["{{ Auth::user()->name }}"],
        datasets: [{
            label: 'Number of Lost Leads',
            data: @json($data->pluck('lead_count')),  // Replace this with actual dynamic data
            backgroundColor: 'rgba(54, 162, 235, 0.5)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
        }]
    };

    // Create initial chart
    var ctx = document.getElementById('leadChart').getContext('2d');
    var chart = new Chart(ctx, {
        type: chartType, // initial type 'bar'
        data: chartData,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // jQuery to handle chart type switching and class toggling
    $('.o_graph_button').on('click', function() {
        // Remove active class from all buttons and add to clicked button
        $('.o_graph_button').removeClass('active');
        $(this).addClass('active');

        // Get the chart type from the clicked button's data-mode attribute
        var selectedChartType = $(this).data('mode');

        // Update the chart type dynamically
        chart.destroy(); // Destroy the old chart
        chart = new Chart(ctx, {
            type: selectedChartType, // Update the chart type based on button clicked
            data: chartData,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>


@endsection