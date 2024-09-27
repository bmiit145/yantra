@extends('layout.header')
@section('content')
@section('head_breadcrumb_title', 'Leads')
@section('lead', route('lead.index'))
@section('kanban', route('lead.kanban', ['lead' => 'kanban']))
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
@vite([
    'resources/css/crm_2.css',
    //    'resources/css/odoo/web.assets_web_print.min.css'
])

<link rel="stylesheet" href="https://fullcalendar.io/releases/fullcalendar/3.9.0/fullcalendar.min.css">
<link rel="stylesheet" href="https://fullcalendar.io/releases/fullcalendar-scheduler/1.9.4/scheduler.min.css">

<style>
    html,
    body {
        margin: 0;
        padding: 0;
        font-family: "Lucida Grande", Helvetica, Arial, Verdana, sans-serif;
        font-size: 14px;
    }
    .location{
        display:none
    }

    #calendar {
        margin: 40px auto;
    }

    /* Style the current date to look inactive */
    .fc-day-today {
        background: #f0f0f0 !important; /* Change the background color */
        border: 1px solid #ccc !important; /* Optional border styling */
        color: #888 !important; /* Change the text color */
    }

   /* Modal styles */
    .modal {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .modal-content {
        background: #fff;
        padding: 20px;
        border-radius: 5px;
        width: 80%;
        max-width: 500px;
        position: relative;
    }
    .modal-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 1px solid #ddd;
        padding-bottom: 10px;
        background-color: #f9e9e3;
        color: #000;
        font-size: 1.05em;
    }
    .modal-close {
        font-size: 24px;
        cursor: pointer;
        color: #888;
    }
    .modal-close:hover {
        color: #333;
    }
    .modal-footer {
        display: flex;
        justify-content: flex-end;
        border-top: 1px solid #ddd;
        /* padding-top: 10px; */
    }
    .btn {
        padding: 10px 20px;
        margin: 5px;
        border: none;
        cursor: pointer;
    }
    .btn.red {
        background: #e74c3c;
        color: #fff;
    }
    .new_btn_info{
     display: none;
    }
    .o_form_button_save{
     display: none;
    }
</style>

<div class="o_content">
    <div id='calendar'></div>
</div>

<!-- Modal Structure -->
<div id="eventModal" class="modal" style="display: none;">
    <div class="modal-content">
        <div class="modal-header">
            <p id="eventTitle"></p>
            <span id="closeModal" class="modal-close">&times;</span>
        </div>
        <div class="modal-body">  
        <ul class="list-group list-group-flush">
            <li class=""><i class="fa fa-fw fa-calendar text-400"></i>
                <b><span class="ms-2" id="eventDate"></span></b>
            </li>
            <li class="mt-3"><b>Expected Revenue</b>
                <span class="ms-2">0.00</span>
            </li>            
        </ul>          
            <!-- <p id="eventDate"></p> -->
        </div>
        <div class="modal-footer">
            <button id="editEvent" class="btn btn-primary">Edit</button>
            <button id="deleteEvent" class="btn btn-secondary">Delete</button>
        </div>
    </div>
</div>

<script src="https://fullcalendar.io/releases/fullcalendar/3.9.0/lib/moment.min.js"></script>
<script src="https://fullcalendar.io/releases/fullcalendar/3.9.0/lib/jquery.min.js"></script>
<script src="https://fullcalendar.io/releases/fullcalendar/3.9.0/fullcalendar.min.js"></script>
<script src="https://fullcalendar.io/releases/fullcalendar-scheduler/1.9.4/scheduler.min.js"></script>
<script>
    $(function () {
    $('#calendar').fullCalendar({
        eventSources: [
            {
                url: '{{ route('activities.fetch') }}',
                method: 'GET',
                failure: function () {
                    alert('There was an error while fetching events!');
                }
            }
        ],
        header: {
            right: 'month,agendaWeek,timelineCustom,agendaDay,prev,today,next',
            left: 'title',
        },
        fixedWeekCount: false,
        contentHeight: 650,
        views: {
            timelineCustom: {
                type: 'timeline',
                buttonText: 'Year',
                dateIncrement: { years: 1 },
                slotDuration: { months: 1 },
                visibleRange: function (currentDate) {
                    return {
                        start: currentDate.clone().startOf('year'),
                    };
                }
            }
        },
        eventRender: function (event, element) {
            element.find('.fc-title').html(event.title);
        },
        eventClick: function (calEvent, jsEvent, view) {
            // Set the modal content
            $('#eventTitle').text(calEvent.title);
            $('#eventDate').text(calEvent.start.format('DD MMMM YYYY'));

            // Show the modal
            $('#eventModal').show();

            $('#editEvent').data('event-lead_id', calEvent.lead_id);

            // Handle Close button
            $('#closeModal').off('click').on('click', function () {
                $('#eventModal').hide();
            });

            $('#editEvent').off('click').on('click', function () {
                    var eventId = $(this).data('event-lead_id');
                    window.location.href = '{{ route("lead.create") }}/' + eventId;
                });
        }
    });
});
</script>
@endsection
