@extends('layout.header')
@section('content')
@section('head_breadcrumb_title', 'Leads')
@section('lead', route('lead.index'))
@section('kanban', route('lead.kanban', ['lead' => 'kanban']))
@section('calendar', route('lead.calendar', ['lead' => 'calendar']))
@section('char_area', route('lead.graph'))
@section('activity', route('lead.activity'))

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
            <a href="{{ route('crm.forecasting') }}">Forecast</a>
            <a href="{{ route('crm.pipeline.graph') }}">Pipeline</a>
            <a href="{{ route('lead.graph') }}">Leads</a>
            <a href="{{route('crm.pipeline.graph')}}">Activities</a>
        </div>
    </li>
    <li class="dropdown">
        <a href="#">Configuration</a>
        <div class="dropdown-content">
              <a href="#"><b>Sales Teams</b></a>
            <a href="#"><b>Activities</b></a>
            <a href="{{route('configuration.activitytype')}}" style="margin-left: 15px;">Activity Types</a>
            <a href="#" style="margin-left: 15px;">Activity Plans</a>
            <a href="{{route('configuration.recurring_index')}}"><b>Recurring Plans</b></a>
            <a href="#"><b>Pipeline</b></a>
            <a href="{{route('configuration.tag_index')}}" style="margin-left: 15px;">Tags</a>
            <a href="{{route('configuration.lostreasons_index')}}" style="margin-left: 15px;">Lost Reasons</a>
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
#search-input{
    display:none
}
canvas#leadChart {
    height: 80vh !important;
    width: 100% !important;
}
canvas#pieChart {
    height: 70vh !important;
    width: 50% !important;
    margin : 0 auto;
  
}
#main_save_btn{
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
            {{-- <div class="btn-group" role="toolbar" aria-label="Change graph">
                    <button class="btn btn-secondary fa fa-database o_graph_button" data-tooltip="Stacked" aria-label="Stacked"></button>
            </div>
            <div class="btn-group" role="toolbar" aria-label="Sort graph" name="toggleOrderToolbar">
                <button class="btn btn-secondary fa fa-sort-amount-desc o_graph_button" data-tooltip="Descending" aria-label="Descending"></button>
                <button class="btn btn-secondary fa fa-sort-amount-asc o_graph_button" data-tooltip="Ascending" aria-label="Ascending"></button>
            </div> --}}
        </div>
        <div class="o_graph_canvas_container flex-grow-1 position-relative px-3 pb-3" style="">
             <canvas id="leadChart" ></canvas>
            <canvas id="pieChart" style="display: none;"></canvas>
        </div>
    </div>


<script>
    var leadChartType = 'bar'; // Default chart type for leadChart (bar/line)
    var pieChartType = 'pie';  // Chart type for pieChart

    // Sample chart data
    var chartData = {
        labels: ["{{ Auth::user()->email }}"],
        datasets: [{
            label: '{{ Auth::user()->email }}', 
            data: @json($data->pluck('lead_count')),  
            backgroundColor: ['rgba(54, 162, 235, 0.5)', 'rgba(255, 99, 132, 0.5)', 'rgba(75, 192, 192, 0.5)'], // For pie chart
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
        }]
    };

    // Function to update chart options based on chart type
    function getChartOptions(chartType) {
        if (chartType === 'pie') {
            return { responsive: true }; // No scales for pie chart
        } else {
            return { scales: { y: { beginAtZero: true } } }; // Scales for bar/line chart
        }
    }

    // Create the initial lead chart (bar/line)
    var leadCtx = document.getElementById('leadChart').getContext('2d');
    var leadChart = new Chart(leadCtx, {
        type: leadChartType, // Default type 'bar'
        data: chartData,
        options: getChartOptions(leadChartType)
    });

    // Create the initial pie chart (hidden initially)
    var pieCtx = document.getElementById('pieChart').getContext('2d');
    var pieChart = null; // Initialize but do not create the pie chart until needed

    // jQuery to handle chart type switching and canvas visibility toggling
    $('.o_graph_button').on('click', function() {
        // Remove active class from all buttons and add to clicked button
        $('.o_graph_button').removeClass('active');
        $(this).addClass('active'); // Add active class to the clicked button

        // Get the chart type from the clicked button's data-mode attribute
        var selectedChartType = $(this).data('mode');

        if (selectedChartType === 'pie') {
            // Show pie chart canvas and hide lead chart canvas
            $('#leadChart').hide();
            $('#pieChart').show();

            // If pieChart is null or not initialized, create it
            if (pieChart === null) {
                pieChart = new Chart(pieCtx, {
                    type: 'pie',
                    data: chartData,
                    options: getChartOptions('pie')
                });
            }
        } else {
            // Show lead chart canvas and hide pie chart canvas
            $('#pieChart').hide();
            $('#leadChart').show();

            // Destroy and recreate lead chart with the new selected type (bar/line)
            leadChart.destroy();
            leadChart = new Chart(leadCtx, {
                type: selectedChartType, // Update the chart type based on button clicked
                data: chartData,
                options: getChartOptions(selectedChartType)
            });
        }
    });
</script>

@endsection