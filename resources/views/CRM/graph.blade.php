@extends('layout.header')
@section('content')
@section('head_breadcrumb_title', 'Pipeline')
@section('head_new_btn_link', route('crm.pipeline.create'))
@section('lead', route('crm.pipeline.list'))
@section('kanban', route('crm.index'))
@section('calendar', route('crm.pipeline.calendar'))
@section('activity', route('crm.pipeline.activity'))
@section('char_area', route('crm.pipeline.graph'))

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
    .head_new_btn {
        display: none
    }

    .o_form_button_save {
        display: none
    }

    .location {
        display: none
    }

    #search-input {
        display: none
    }

    canvas#leadChart {
        height: 80vh !important;
        width: 100% !important;
    }

    canvas#pieChart {
        height: 70vh !important;
        width: 50% !important;
        margin: 0 auto;

    }

    #main_save_btn {
        display: none
    }
</style>
@endsection
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<div class="o_graph_renderer o_renderer h-100 d-flex flex-column border-top undefined">
    <div class="d-flex d-print-none gap-1 flex-shrink-0 mt-2 mx-3 mb-3 overflow-x-auto">
        <div class="btn-group" role="toolbar" aria-label="Main actions">
            <button class="btn btn-primary o-dropdown dropdown-toggle dropdown" aria-expanded="false"> Measures <i
                    class="fa fa-caret-down ms-1"></i></button>
        </div>
        <div class="btn-group" role="toolbar" aria-label="Insert in Spreadsheet">
            <button class="btn btn-secondary o_graph_insert_spreadsheet"> Insert in Spreadsheet </button>
        </div>
        <div class="btn-group" role="toolbar" aria-label="Change graph">
            <button class="btn btn-secondary fa fa-bar-chart o_graph_button active" data-tooltip="Bar Chart"
                aria-label="Bar Chart" data-mode="bar"></button>
            <button class="btn btn-secondary fa fa-line-chart o_graph_button" data-tooltip="Line Chart"
                aria-label="Line Chart" data-mode="line"></button>
            <button class="btn btn-secondary fa fa-pie-chart o_graph_button" data-tooltip="Pie Chart"
                aria-label="Pie Chart" data-mode="pie"></button>
        </div>
    </div>
    <div class="o_graph_canvas_container flex-grow-1 position-relative px-3 pb-3">
        <canvas id="leadChart"></canvas>
        <canvas id="pieChart" style="display: none;"></canvas>
    </div>
</div>

<script>
    // Prepare data for the charts
    const stages = @json($stages);
    const datasets = @json($datasets);

    const stageEntries = Object.entries(stages);
    const labels = stageEntries.map(([stageId, stage]) => stage.title);

    // Group data by stages
    const stageTotals = {};

    // Populate stageTotals with user data
    for (const stageId in datasets) {
        const userDatas = datasets[stageId].data;

        for (const salesPerson in userDatas) {
            const userData = userDatas[salesPerson];

            // If this stage doesn't exist in stageTotals, initialize it
            if (!stageTotals[stageId]) {
                stageTotals[stageId] = { total: 0, users: [] };
            }

            // Add the user's total and their color
            stageTotals[stageId].total += userData.total;
            stageTotals[stageId].users.push({
                label: userData.label,
                total: userData.total,
                backgroundColor: userData.backgroundColor
            });
        }
    }

    // Prepare the chartData for stacked bar chart
    const chartData = {
        labels: labels,
        datasets: []
    };

    // Populate datasets for each stage with contributions
    for (const [stageId, { users }] of Object.entries(stageTotals)) {
        users.forEach(user => {
            chartData.datasets.push({
                label: user.label,
                data: Array(stageEntries.length).fill(0), // Initialize data for each stage
                backgroundColor: user.backgroundColor,
                stack: stageId // Use stageId to stack by stages
            });
            chartData.datasets[chartData.datasets.length - 1].data[stageEntries.findIndex(([id]) => id === stageId)] = user.total;
        });
    }

    // Create the initial lead chart (stacked bar)
    var leadCtx = document.getElementById('leadChart').getContext('2d');
    var leadChart = new Chart(leadCtx, {
        type: 'bar',
        data: chartData,
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                },
                x: {
                    stacked: true, // Enable stacking on the x-axis
                    barThickness: 80 // Increased bar width
                }
            },
            elements: {
                bar: {
                    borderWidth: 0,
                    borderColor: 'rgba(0, 0, 0, 0.5)', // Optional: border color for bars
                    backgroundColor: 'rgba(255, 255, 255, 0.5)' // Optional: background color for bars
                }
            },
            plugins: {
                tooltip: {
                    callbacks: {
                        label: function (tooltipItem) {
                            const label = tooltipItem.dataset.label || '';
                            const total = tooltipItem.raw || 0;
                            return `${label}: ${total}`; // Show the label with total
                        }
                    }
                }
            }
        }
    });

    // Initialize pie chart data
    const pieChartData = {
        labels: [],
        datasets: [{
            data: [],
            backgroundColor: [],
        }]
    };

    // Populate pie chart data
    for (const stageId in datasets) {
        const userDatas = datasets[stageId].data;
        const stageName = stages[stageId].title; // Get the stage name
        for (const salesPerson in userDatas) {
            pieChartData.labels.push(`${userDatas[salesPerson].label} (${stageName})`); // Include stage name
            pieChartData.datasets[0].data.push(userDatas[salesPerson].total);
            pieChartData.datasets[0].backgroundColor.push(userDatas[salesPerson].backgroundColor);
        }
    }

    // Create the initial pie chart
    var pieCtx = document.getElementById('pieChart').getContext('2d');
    var pieChart = new Chart(pieCtx, {
        type: 'pie',
        data: pieChartData,
        options: {
            responsive: true,
            plugins: {
                tooltip: {
                    callbacks: {
                        label: function (tooltipItem) {
                            const label = tooltipItem.label || '';
                            const total = tooltipItem.raw || 0; // Access the data value
                            return `${label}: ${total}`; // Show the label with total
                        }
                    }
                }
            }
        }
    });

    // jQuery to handle chart type switching and canvas visibility toggling
  // Define a variable to store color codes
  var chartColors = {
    lineBackground: 'rgba(167, 210, 247, 1)',  // Fully transparent line background color
    lineBorder: 'rgba(75, 192, 192, 0.5)',      // Fully transparent line border color
    pointBackground: 'rgba(75, 192, 192, 0)'  // Fully transparent point color
};

$('.o_graph_button').on('click', function () {
    $('.o_graph_button').removeClass('active');
    $(this).addClass('active');

    var selectedChartType = $(this).data('mode');

    if (selectedChartType === 'pie') {
        $('#leadChart').hide();
        $('#pieChart').show();
    } else {
        $('#pieChart').hide();
        $('#leadChart').show();
        leadChart.destroy(); // Destroy the previous chart instance
        leadChart = new Chart(leadCtx, {
            type: selectedChartType, // Use selected chart type (bar/line)
            data: chartData,
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    },
                    x: {
                        stacked: selectedChartType === 'bar' // Enable stacking for bar chart only
                    }
                },
                elements: {
                    line: {
                        tension: 0.4, // Smooth line for line chart
                        fill: true,
                        backgroundColor: chartColors.lineBackground, // Use dynamic background color
                        borderColor: chartColors.lineBorder // Use dynamic border color
                    },
                    point: {
                        backgroundColor: chartColors.pointBackground // Use dynamic point color
                    }
                },
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function (tooltipItem) {
                                const label = tooltipItem.dataset.label || '';
                                const total = tooltipItem.raw || 0; // Access the data value
                                return `${label}: ${total}`; // Show the label with total
                            }
                        }
                    }
                }
            }
        });
    }
});



</script>

@endsection