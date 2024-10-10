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

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<!-- jQuery (required for Bootstrap JS components) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script></style>
@endsection

@section('search_div')
<div class="o_popover popover mw-100 o-dropdown--menu search-dropdown-menu mx-0 o_search_bar_menu d-flex flex-wrap flex-lg-nowrap w-100 w-md-auto mx-md-auto mt-2 py-3"
    role="menu" style="position: absolute; top: 0; left: 0;">
    <div class="o_dropdown_container o_filter_menu w-100 w-lg-auto h-100 px-3 mb-4 mb-lg-0 border-end">
        <div class="px-3 fs-5 mb-2"><i class="me-2 fa fa-filter" style="color: #714b67;"></i>
            <input type="hidden" id="filter" name="filter" value="">

            <h5 class="o_dropdown_title d-inline">Filters</h5>
        </div>
        <span class="o-dropdown-item-2 dropdown-item o-navigable o_menu_item text-truncate activities"
            role="menuitemcheckbox" tabindex="0" title="" aria-checked="false" id="my-activities"><span
                class="float-end checkmark" style="display:none;">✔</span>My Activities</span>
        <span class="o-dropdown-item-2 dropdown-item o-navigable o_menu_item text-truncate activities"
            role="menuitemcheckbox" tabindex="0" title="" aria-checked="false" id="unassigned"><span
                class="float-end checkmark" style="display:none;">✔</span>Unassigned</span>
        <div class="dropdown-divider" role="separator"></div>
        <span class="o-dropdown-item-2 dropdown-item o-navigable o_menu_item text-truncate lost_span"
            role="menuitemcheckbox" tabindex="0" title="" aria-checked="false"><span class="float-end checkmark"
                style="display:none;">✔</span>Lost & Archived</span>
        <div class="dropdown-divider" role="separator"></div>
        <div class="o_accordion position-relative">
            <button class="o_menu_item o_accordion_toggle creation_time o-navigable text-truncate"
                style="display: flex;justify-content: space-between;" tabindex="0" aria-expanded="false"
                id="creationDateBtn1">
                Creation Date
                <span class="arrow-icon" style="font-size: 10px;margin-top: 4px;">▼</span>
            </button>
            <div class="o_dropdown_content" id="creationDateDropdown1"
                style="display: none; position: absolute; z-index: 1000; background: white; border: 1px solid #ccc; width: 100%;">
                <?php   
                        // Get the current date
$currentMonth = date('F '); // e.g., September 2024
$lastMonth = date('F ', strtotime('-1 month')); // Last month
$twoMonthsAgo = date('F ', strtotime('-2 months')); // Two months ago
$threeMonthsAgo = date('F ', strtotime('-3 months')); // Three months ago
                    ?>
                <?php
// Get the current year
$currentYear = date('Y'); // e.g., 2024
$lastYear = date('Y', strtotime('-1 year')); // Last year
$twoYearsAgo = date('Y', strtotime('-2 years')); // Two years ago
                    ?>
                <span class="o-dropdown-item_2  creation_time"> <span class="float-end checkmark"
                        style="display:none;">✔</span><?php echo $currentMonth; ?></span>
                <span class="o-dropdown-item_2  creation_time"><span class="float-end checkmark"
                        style="display:none;">✔</span><?php echo $lastMonth; ?></span>
                <span class="o-dropdown-item_2  creation_time"><span class="float-end checkmark"
                        style="display:none;">✔</span><?php echo $twoMonthsAgo; ?></span>
                <span class="o-dropdown-item_2  creation_time"><span class="float-end checkmark"
                        style="display:none;">✔</span>Q4</span>
                <span class="o-dropdown-item_2  creation_time"><span class="float-end checkmark"
                        style="display:none;">✔</span>Q3</span>
                <span class="o-dropdown-item_2  creation_time"><span class="float-end checkmark"
                        style="display:none;">✔</span>Q2</span>
                <span class="o-dropdown-item_2  creation_time"><span class="float-end checkmark"
                        style="display:none;">✔</span>Q1</span>
                <hr>
                <span class="o-dropdown-item_2 creation_time creation_time"><span class="float-end checkmark"
                        style="display:none;">✔</span><?php echo $currentYear; ?></span>
                <span class="o-dropdown-item_2 creation_time creation_time"><span class="float-end checkmark"
                        style="display:none;">✔</span><?php echo $lastYear; ?></span>
                <span class="o-dropdown-item_2 creation_time creation_time"><span class="float-end checkmark"
                        style="display:none;">✔</span><?php echo $twoYearsAgo; ?></span>
            </div>
        </div>
        <div class="o_accordion position-relative">
            <button class="o_menu_item o_accordion_toggle closed_time o-navigable text-truncate" tabindex="0"
                aria-expanded="false" id="closeDateBtn1" style="display: flex;justify-content: space-between;">
                Closed Date
                <span class="arrow-icon" style="font-size: 10px;margin-top: 4px;">▼</span>
            </button>
            <div class="o_dropdown_content" id="closeDateDropdown1"
                style="display: none; position: absolute; z-index: 1000; background: white; border: 1px solid #ccc; width: 100%;">
                <span class="o-dropdown-item_2 closed_time">
                    <span class="float-end checkmark" style="display:none;">✔</span><?php echo $currentMonth; ?></span>
                <span class="o-dropdown-item_2 closed_time"><span class="float-end checkmark"
                        style="display:none;">✔</span><?php echo $lastMonth; ?></span>
                <span class="o-dropdown-item_2 closed_time"><span class="float-end checkmark"
                        style="display:none;">✔</span><?php echo $twoMonthsAgo; ?></span>
                <span class="o-dropdown-item_2 closed_time"><span class="float-end checkmark"
                        style="display:none;">✔</span>Q4</span>
                <span class="o-dropdown-item_2 closed_time"><span class="float-end checkmark"
                        style="display:none;">✔</span>Q3</span>
                <span class="o-dropdown-item_2 closed_time"><span class="float-end checkmark"
                        style="display:none;">✔</span>Q2</span>
                <span class="o-dropdown-item_2 closed_time"><span class="float-end checkmark"
                        style="display:none;">✔</span>Q1</span>
                <hr>
                <span class="o-dropdown-item_2 closed_time"><span class="float-end checkmark"
                        style="display:none;">✔</span><?php echo $currentYear; ?></span>
                <span class="o-dropdown-item_2 closed_time"><span class="float-end checkmark"
                        style="display:none;">✔</span><?php echo $lastYear; ?></span>
                <span class="o-dropdown-item_2 closed_time"><span class="float-end checkmark"
                        style="display:none;">✔</span><?php echo $twoYearsAgo; ?></span>
            </div>
        </div>
        <div class="dropdown-divider" role="separator"></div><span
            class="o-dropdown-item-2 dropdown-item o-navigable o_menu_item text-truncate LTFActivities" role="menuitemcheckbox"
            tabindex="0" title="" aria-checked="false"><span class="float-end checkmark"
            style="display:none;">✔</span>Late Activities</span><span
            class="o-dropdown-item-2 dropdown-item o-navigable o_menu_item text-truncate LTFActivities" role="menuitemcheckbox"
            tabindex="0" title="Today Activities" aria-checked="false"><span class="float-end checkmark"
            style="display:none;">✔</span>Today Activities</span><span
            class="o-dropdown-item-2 dropdown-item o-navigable o_menu_item text-truncate LTFActivities" role="menuitemcheckbox"
            tabindex="0" title="Future Activities" aria-checked="false"><span class="float-end checkmark"
            style="display:none;">✔</span>Future Activities</span>
        <div class="dropdown-divider" role="separator"></div>
        <span class="o-dropdown-item-2 dropdown-item o-navigable o_menu_item o_add_custom_filter" role="menuitem"
            tabindex="0" style="cursor: pointer;">Add Custom Filter</span>
    </div>
    <div class="o_dropdown_container o_favorite_menu w-100 w-lg-auto h-100 px-3">
        <div class="px-3 fs-5 mb-2">
            <i class="me-2 text-favourite fa fa-star"></i>
            <h5 class="o_dropdown_title d-inline">Favorites</h5>
        </div>
        @foreach ($getFavoritesFilter as $favoritesFilter)    
            <span class="o-dropdown-item-3 dropdown-item o-navigable o_menu_item text-truncate"
            role="menuitemcheckbox" tabindex="0" aria-checked="{{ $favoritesFilter->is_default ? 'true' : 'false' }}" data-id="{{ $favoritesFilter->id }}" data-name="{{ $favoritesFilter->favorites_name }}">
                <span class="d-flex p-0 align-items-center justify-content-between">
                    <span class="text-truncate flex-grow-1" title="">{{ $favoritesFilter->favorites_name ?? '' }}
                        <span class="float-end checkmark" style="display:none;">✔</span>
                    </span>
                    <i class="ms-1 fa fa-trash-o delete-item" title="Delete item" data-id="{{ $favoritesFilter->id }}" data-bs-toggle="modal" data-bs-target="#deleteModal"></i>
                </span>
            </span>
            <!-- <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel">Warning</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure that you want to remove this filter?
                        </div>
                        <div class="modal-footer modal-footer-custom gap-1" style="justify-content: start;">
                            <button type="button" class="btn btn-primary" style="background-color:#714B67;border: none;font-weight: 500;" id="confirmDelete">Delete Filter</button>
                            <button type="button" class="btn btn-secondary text-black" style="background-color:#e7e9ed;border: none;font-weight: 500;" data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div> -->
        @endforeach
        <div role="separator" class="dropdown-divider"></div>
        <div class="o_accordion position-relative">
            <button id="save-current-search" class="o_menu_item o_accordion_toggle search-dropdown-item o-navigable o_add_favorite text-truncate" tabindex="0" aria-expanded="false">
                Save current search
                <span class="arrow-icon" style="font-size: 10px; margin-top: 4px;">▼</span>
            </button>
            <div class="o_accordion_values ms-4 border-start">
                <div class="px-3 py-2">
                    <input type="text" class="o_input" id="lead_favorites" name="favorites_name" value="Leads" placeholder="Enter favorite name">
                    <div class="o-checkbox form-check">
                        <input type="radio" name="filter_check" class="form-check-input" id="checkbox-comp-70">
                        <label class="form-check-label" for="checkbox-comp-70">
                            <span data-tooltip="Use this filter by default when opening this view">Default filter</span>
                        </label>
                    </div>
                    <div class="o-checkbox form-check">
                        <input type="radio" class="form-check-input" id="checkbox-comp-71" name="filter_check">
                        <label class="form-check-label" for="checkbox-comp-71">
                            <span data-tooltip="Make this filter available to other users">Shared</span>
                        </label>
                    </div>
                </div>
                <div class="px-3 py-2">
                    <button class="o_save_favorite btn-sm btn btn-primary w-100" style="background-color: #714b67; border: none;">Save</button>
                </div>
            </div>
        </div>
    </div>
</div>
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

    .fc-day-today {
        background: #f0f0f0 !important;
        border: 1px solid #ccc !important;
        color: #888 !important;
    }

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
    }
    .calendar-btn {
        padding: 10px 20px;
        margin: 5px;
        border: none;
        cursor: pointer;
    }
    .calendar-btn.red {
        background: #e74c3c;
        color: #fff;
    }
    .new_btn_info{
     display: none;
    }
    .o_form_button_save{
     display: none;
    }

    tbody#lead-table-body tr:hover {
        background-color: #FAFAFA !important;
    }

    tbody#lead-table-body tr:hover td {
        background-color: #FAFAFA !important;
    }

    table.dataTable thead th,
    table.dataTable thead td {
        padding: 10px 18px;
        border-bottom: 1px solid #11111147;
        border-top: 1px solid #11111147;
        background: #F1F1F1;
    }

    .dataTables_length label {
        display: flex;
        gap: 10px;
        margin: 0 !important;
    }

    .dataTables_wrapper .dataTables_length select {
        text-align: center;
        border-radius: 5px;
        border: 1px solid #2222;
    }

    table.dataTable tbody tr,
    table.dataTable.display tbody tr.odd>.sorting_1,
    table.dataTable.order-column.stripe tbody tr.odd>.sorting_1,
    table.dataTable.display tbody tr.even>.sorting_1,
    table.dataTable.order-column.stripe tbody tr.even>.sorting_1 {
        background-color: #FFFFFF !important;
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

    .arrow-icon {
        display: inline-block;
        transition: transform 0.3s ease;
        /* Smooth transition */
    }

    .rotate {
        transform: rotate(180deg);
        /* Rotate the arrow */
    }

    .o_searchview {
        gap: 10px;
    }

    .tag,
    .tag1,
    .LTFtag ,
     .tag5,
     .group_by_tag,
     .CRtag,
     .favorites-filter
     {
        display: inline-block;
        padding: 0px 10px 0px 0;
        background-color: #e7e9ed;
        border-radius: 8px;
        font-size: 14px;
        margin: 5px 0;
        position: relative;
    }

 

    .remove-tag,
    span.remove-lost-tag {
        font-size: 22px;
        line-height: 0;
    }

    .tag-input-container {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        border: 1px solid #CED4DA;
        border-radius: 4px;
        padding: 5px;
        background-color: #F1F1F1;
    }

    .creation_time {
        display: block;
        width: 100%;
        padding: .25rem 1.5rem;
        clear: both;
        font-weight: 400;
        color: #212529;
        text-align: inherit;
        white-space: nowrap;
        background-color: transparent;
        border: 0;
    }

    .closed_time {
        display: block;
        width: 100%;
        padding: .25rem 1.5rem;
        clear: both;
        font-weight: 400;
        color: #212529;
        text-align: inherit;
        white-space: nowrap;
        background-color: transparent;
        border: 0;
    }

    .location {
        display: none
    }

    .head_breadcrumb_info {
        display: none
    }

    .dropdown-toggle::after {
        content: none !important;
    }

    span.setting_icon i {
        color: #fff;
    }

    span.setting_icon {
        padding: 3px;
        background: #714B67;
        border-radius: 5px;
        display: inline-block;
        margin-right: 5px;
        width: 27px;
        height: 27px;
        text-align: center;
        position: absolute;
    }

    span.setting_icon.setting_icon_hover {
        display: none;
    }

    a.setting-icon:hover span {
        display: block;
    }

    span.tag-item {
        line-height: 1.9;
    }

    a.setting-icon {
        padding-right: 35px;
    }

    .o_accordion_toggle::after {
        display: none;
    }
    .arrow-icon {
        transition: transform 0.3s; /* Smooth transition */
    }

    .arrow-icon.open {
        transform: rotate(180deg); /* Rotate the arrow when open */
    }
    .search-dropdown-item{
        display: block;
        width: 100%;
        clear: both;
        font-weight: 400;
        color: #212529;
        text-align: inherit;
        white-space: nowrap;
        background-color: transparent;
        border: 0;
    }
    .o_accordion_values {
        display: none;
        transition: all 0.3s ease;
    }
    .search-dropdown-menu {
        display: none;
        position: fixed;
        background-color: #F9F9F9;
        min-width: 400px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
        top: auto;
        right: 0;
        left: auto;
        margin-left: 220px !important;
    }

    .search-dropdown-menu a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        cursor: pointer;
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
            <button id="editEvent" class="btn btn-primary calendar-btn">Edit</button>
            <button id="deleteEvent" class="btn btn-secondary">Delete</button>
        </div>
    </div>
</div>
@endsection

@push('scripts')

    <script src="https://fullcalendar.io/releases/fullcalendar/3.9.0/lib/moment.min.js"></script>
    <script src="https://fullcalendar.io/releases/fullcalendar/3.9.0/lib/jquery.min.js"></script>
    <script src="https://fullcalendar.io/releases/fullcalendar/3.9.0/fullcalendar.min.js"></script>
    <script src="https://fullcalendar.io/releases/fullcalendar-scheduler/1.9.4/scheduler.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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


    function filterData(selectedTags) {
                $.ajax({
                    url: '{{ route('lead.activities') }}',
                    method: 'GET',
                    data: {
                        tags: selectedTags
                    },
                    success: function (response) {
                        
                    }
                });
            }


            $(document).on('click', '.activities', function (e) {
            e.stopPropagation();
            $('.group_by_tag').remove();
            $('.o-dropdown-item_1  .checkmark').hide();
            var $item = $(this);

            // Clone the item, remove the checkmark span and get the trimmed text
            var selectedValue = $item.clone().find('.checkmark').remove().end().text().trim();
            handleTagSelection2(selectedValue, $item);
        });

        function handleTagSelection2(selectedValue, $item = null) {


            var $tag = $('.tag');
            var $tagItem = $('.tag-item[data-value="' + selectedValue + '"]');

            if ($tagItem.length > 0) {
                // If the tag already exists, remove it            
                $tagItem.remove();
                updateTagSeparators2();

                // If no tags left, remove the container and reset the input
                if ($tag.children().length === 0) {
                    $tag.remove();
                    $('#search-input').val('').attr('placeholder', 'Search...');
                }

                // Hide the checkmark if it's being deselected
                if ($item) {
                    $item.find('.checkmark').hide();
                }
            } else {
                // If the tag does not exist, add it
                var newTagHtml = '<span class="tag-item"  data-span_id="' + currentIndex + '""  data-value="' + selectedValue + '">' + selectedValue + '</span>';
                var index = 0;
                 var currentIndex = index++;
                // Check if a tag container exists, if not, create one
                if ($tag.length === 0) {
                    $('#search-input').before('<span class="tag" data-span_id="' + currentIndex + '"" >' + newTagHtml + '</span>');
                } else {
                    $tag.append(' & ' + newTagHtml);
                }

                updateTagSeparators2();

                // Show the checkmark on the selected item
                if ($item) {
                    $item.find('.checkmark').show();
                }

                // Reset input and placeholder
                $('#search-input').val('');
                $('#search-input').attr('placeholder', '');
            }

            // Collect selected tags
            updateFilterTagsA();
        }

        // Function to clear all group-by tags
        function clearTagsByType(type) {
            console.log(selectedTags);

            var $tag = $('.' + type + '-tag');
            if ($tag.length > 0) {
                $tag.remove();
                $('#search-input').val('').attr('placeholder', 'Search...');
            }
        }

        function updateTagSeparators2() {
            var $tag = $('.tag');
            var $tagItems = $tag.find('.tag-item');
            var html = '';
            $tagItems.each(function (index) {
                html += $(this).prop('outerHTML');
                if (index < $tagItems.length - 1) {
                    html += ' & ';
                }
            });
            $tag.html(html);
            updateRemoveTagButton2();
        }


        function updateRemoveTagButton2() {
            var $tag = $('.tag');
            var index = 0;
            // Ensure the icon appears only once at the beginning
          if ($tag.find('.fa-list').length === 0) {
            var currentIndex = index++;
                $tag.prepend('<a href="#" data-span_id="' + currentIndex + '""  class="setting-icon icon_tag">' +
                    '<span class="setting_icon se_filter_icon setting-icon"><i class="fa fa-filter"></i></span>' +
                    '<span  data-span_id="' + currentIndex + '""  class="setting_icon setting_icon_hover setting-icon"><i class="fa fa-fw fa-cog"></i></span>' +
                    '</a>'
                );
            }
            if ($tag.find('.tag-item').length > 0) {
                if ($('.remove-tag').length === 0) {
                    $tag.append(' <span class="remove-tag" style="cursor:pointer">&times;</span>');
                }
            } else {
                $('.remove-tag').remove();
                $('.icon_tag').remove();
            }
        }

        function updateFilterTagsA() {
            let selectedTags = [];
            $('.tag-item').each(function () {
                selectedTags.push($(this).data('value'));
            });
            console.log(selectedTags,'jdfjdfjjdf');
            
            // Send selected tags to the server for filtering
            filterData(selectedTags);
        }

         // Remove tag and preserve "Lost" tag filter
         $(document).on('click', '.remove-tag', function () {
            var $tagItem = $(this).parent('.tag-item');
            $tagItem.remove();
            $('.tag').remove(); // Only remove the container if it's empty
            // updateTagSeparators2();

            // Reapply filters after removing "Lost" tag
            updateFilterTagsA();

            // Remove checkmark from the dropdown
            $('.o-dropdown-item-2 .checkmark').hide();
        });

        // -------------------------------------------- Activities End ------------------------------------------------------------------

        // -------------------------------------------- Lost Span Start ------------------------------------------------------------------

        $(document).on('click', '.lost_span', function (e) {
            e.stopPropagation();
            $('.group_by_tag').remove();
            $('.o-dropdown-item_1  .checkmark').hide();
            var $item = $(this);

            // Get the text of the clicked "Lost" span
            var selectedValue = $item.clone().find('.checkmark').remove().end().text().trim();

            handleTagSelection3(selectedValue, $item);
        });

        function handleTagSelection3(selectedValue, $item = null) {
            var $tag = $('.tag1');
            var $tagItem = $('.tag-item[data-value="' + selectedValue + '"]');

            if ($tagItem.length > 0) {
                // Remove existing tag
                $tagItem.remove();
                updateTagSeparators3();

                // Remove the tag container if no more tags
                if ($tag.children().length === 0) {
                    $tag.remove();
                    $('#search-input').val('').attr('placeholder', 'Search...');
                }

                // Hide checkmark in case of deselection
                if ($item) {
                    $item.find('.checkmark').hide();
                }

            } else {
                if ($tag.length === 0) {
                    var index = 0;
                    // Add both the setting icon and tag container together
                    var currentIndex = index++;
                    // Add both the setting icon and tag container together
                    $('#search-input').before(
                        '<div class="tag1" data-span_id="' + currentIndex + '"">' +
                        '<a href="#" data-span_id="' + currentIndex + '"" class="setting-icon lostIcon_tag">' +
                        '<span class="setting_icon se_filter_icon"><i class="fa fa-filter"></i></span>' +
                        '<span class="setting_icon setting_icon_hover"><i class="fa fa-fw fa-cog"></i></span>' +
                        '</a>' +
                        '<span class="tag-item" data-value="' + selectedValue + '">' +
                        selectedValue +
                        '<span class="remove-lost-tag" style="cursor:pointer">×</span>' +
                        '</span>' +
                        '</div>'
                    );
                } else {
                    // Add new tag with close button
                    var newTagHtml = '<span class="tag-item" data-value="' + selectedValue + '">' +
                        selectedValue +
                        '<span class="remove-lost-tag" style="cursor:pointer">×</span></span>';
                    $tag.append(newTagHtml);
                }

                // Show the checkmark for the selected item
                if ($item) {
                    $item.find('.checkmark').show();
                }

                // Reset input and placeholder
                $('#search-input').val('');
                $('#search-input').attr('placeholder', '');
            }

            // Update selected tags and send to server
            updateFilterTags();
        }

        function updateTagSeparators3() {
            var $tag = $('.tag1');
            var $tagItems = $tag.find('.tag-item');
            var html = '';
            $tagItems.each(function (index) {
                html += $(this).prop('outerHTML');
                if (index < $tagItems.length - 1) {
                    html += ' & ';
                }
            });
            $tag.html(html);
            updateRemoveTagButton3();
        }


        function updateRemoveTagButton3() {
            var $tag = $('.tag1');
            if ($tag.find('.tag-item').length > 0) {
                if ($('.remove-lost-tag').length === 0) {
                    $tag.append(' <span class="remove-lost-tag" style="cursor:pointer">&times;</span>');
                }
            } else {
                $('.remove-lost-tag').remove();
                $('.lostIcon_tag').remove();
            }
        }

        // Function to update filters after tag removal
        function updateFilterTags() {
            let selectedTags = [];
            $('.tag-item').each(function () {
                selectedTags.push($(this).data('value'));
            });

            console.log(selectedTags,'Lost Tag');

            // Send selected tags to the server for filtering
            filterData(selectedTags);
        }

        // Remove tag and preserve "Lost" tag filter
        $(document).on('click', '.remove-lost-tag', function () {
            var $tagItem = $(this).parent('.lost-tag-item');
            $tagItem.remove();
            $('.tag1').remove(); // Only remove the container if it's empty
            // updateTagSeparators3();

            // Reapply filters after removing "Lost" tag
            updateFilterTags();

            // Remove checkmark from the dropdown
            $('.lost_span:contains("Lost")').find('.checkmark').hide();
        });

       
        // -------------------------------------------- Lost Span End ------------------------------------------------------------------


        // ------------------------------ Late , Today and Future Activitis Start -----------------------------------------------

        $(document).on('click', '.LTFActivities', function (e) {
            e.stopPropagation();
            $('.group_by_tag').remove();
            $('.o-dropdown-item_1  .checkmark').hide();
            var $item = $(this);

            // Clone the item, remove the checkmark span and get the trimmed text
            var selectedValue = $item.clone().find('.checkmark').remove().end().text().trim();
            handleTagSelection4(selectedValue, $item);
        });

        function handleTagSelection4(selectedValue, $item = null) {
            var $tag = $('.LTFtag');
            var $tagItem = $('.tag-item[data-value="' + selectedValue + '"]');

            if ($tagItem.length > 0) {
                // If the tag already exists, remove it
                $tagItem.remove();
                updateTagSeparators4();

                // If no tags left, remove the container and reset the input
                if ($tag.children().length === 0) {
                    $tag.remove();
                    $('#search-input').val('').attr('placeholder', 'Search...');
                }

                // Hide the checkmark if it's being deselected
                if ($item) {
                    $item.find('.checkmark').hide();
                }
            } else {
                // If the tag does not exist, add it
                var newTagHtml = '<span class="tag-item" data-span_id="' + currentIndex + '"" data-value="' + selectedValue + '">' + selectedValue + '</span>';

                var index = 0;
                var currentIndex = index++;

                // Check if a tag container exists, if not, create one
                if ($tag.length === 0) {
                    $('#search-input').before('<span class="LTFtag" data-span_id="' + currentIndex + '"" >' + newTagHtml + '</span>');
                } else {
                    $tag.append(' & ' + newTagHtml);
                }

                updateTagSeparators4();

                // Show the checkmark on the selected item
                if ($item) {
                    $item.find('.checkmark').show();
                }

                // Reset input and placeholder
                $('#search-input').val('');
                $('#search-input').attr('placeholder', '');
            }

            // Collect selected tags
            updateFilterTagsLTF();
        }

        // Function to clear all group-by tags
        function clearTagsByType(type) {
            console.log(selectedTags);

            var $tag = $('.' + type + '-LTFtag');
            if ($tag.length > 0) {
                $tag.remove();
                $('#search-input').val('').attr('placeholder', 'Search...');
            }
        }

        function updateTagSeparators4() {
            var $tag = $('.LTFtag');
            var $tagItems = $tag.find('.tag-item');
            var html = '';
            $tagItems.each(function (index) {
                html += $(this).prop('outerHTML');
                if (index < $tagItems.length - 1) {
                    html += ' & ';
                }
            });
            $tag.html(html);
            updateRemoveTagButton4();
        }


        function updateRemoveTagButton4() {
            var $tag = $('.LTFtag');
            var index = 0;
            // Ensure the icon appears only once at the beginning
            if ($tag.find('.fa-list').length === 0) {
                var currentIndex = index++;
                $tag.prepend('<a href="#" data-span_id="' + currentIndex + '"" class="setting-icon LTFIcon_tag">' +
                    '<span class="setting_icon se_filter_icon"><i class="fa fa-filter"></i></span>' +
                    '<span data-span_id="' + currentIndex + '"" class="setting_icon setting_icon_hover setting-icon"><i class="fa fa-fw fa-cog"></i></span>' +
                    '</a>'
                );
            }
            if ($tag.find('.tag-item').length > 0) {
                if ($('.remove-LTFtag').length === 0) {
                    $tag.append(' <span class="remove-LTFtag" style="cursor:pointer">&times;</span>');
                }
            } else {
                $('.remove-LTFtag').remove();
                $('.LTFIcon_tag').remove();
            }
        }

        // Function to update filters after tag removal
        function updateFilterTagsLTF() {
            let selectedTags = [];
            $('.tag-item').each(function () {
                selectedTags.push($(this).data('value'));
            });

            // Send selected tags to the server for filtering
            filterData(selectedTags);
        }

        $(document).on('click', '.remove-LTFtag', function () {
            var $tagItem = $(this).parent('.tag-item');
            $tagItem.remove();
            $('.LTFtag').remove(); // Only remove the container if it's empty
            updateTagSeparators4();


            // Reapply filters after removing "Lost" tag
            updateFilterTagsLTF();

            // Remove checkmark from the dropdown
            $('.LTFActivities .checkmark').hide();
        });


        // ------------------------------ Late , Today and Future Activitis End -----------------------------------------------


        // ------------------------------ Setting Icon Open Model Start  -----------------------------------------------

        $(document).on('click', '.setting-icon', function(e) {
            e.preventDefault();
            var id = $(this).data('span_id');
            console.log(id, 'span_id');
            $('#span_id').val(id); 
            $('#customFilterModal').modal('show'); 
        });


        // ------------------------------ Setting Icon Open Model End  -----------------------------------------------

        // ------------------------------ Creation Date and Closed Date Start -----------------------------------------------

        $(document).on('click', '#creationDateDropdown1 .o-dropdown-item_2 ', function (e) {
            e.stopPropagation();
            $('.group_by_tag').remove();
            $('.o-dropdown-item_1  .checkmark').hide();
            var $item = $(this);

            // Clone the item, remove the checkmark span and get the trimmed text
            var selectedValue = $item.clone().find('.checkmark').remove().end().text().trim();
            handleTagSelection5(selectedValue, $item);
        });

        function handleTagSelection5(selectedValue, $item = null) {
            var $tag = $('.CRtag');
            var $tagItem = $('.tag-item[data-value="' + selectedValue + '"]');

            if ($tagItem.length > 0) {
                // If the tag already exists, remove it
                $tagItem.remove();
                updateTagSeparators5();

                // If no tags left, remove the container and reset the input
                if ($tag.children().length === 0) {
                    $tag.remove();
                    $('#search-input').val('').attr('placeholder', 'Search...');
                }

                // Hide the checkmark if it's being deselected
                if ($item) {
                    $item.find('.checkmark').hide();
                }
            } else {
                // If the tag does not exist, add it
                var newTagHtml = '<span class="tag-item" data-value="' + selectedValue + '">' + selectedValue + '</span>';

                // Check if a tag container exists, if not, create one
                if ($tag.length === 0) {
                    $('#search-input').before('<span class="CRtag">' + newTagHtml + '</span>');
                }
                 else {
                    $tag.append(' / ' + newTagHtml);
                }

                updateTagSeparators5();

                // Show the checkmark on the selected item
                if ($item) {
                    $item.find('.checkmark').show();
                }

                // Reset input and placeholder
                $('#search-input').val('');
                $('#search-input').attr('placeholder', '');
            }

            // Collect selected tags
            updateFilterTagsCR();
        }

        // Function to clear all group-by tags
        function clearTagsByType(type) {
            console.log(selectedTags);

            var $tag = $('.' + type + '-CRtag');
            if ($tag.length > 0) {
                $tag.remove();
                $('#search-input').val('').attr('placeholder', 'Search...');
            }
        }

        function updateTagSeparators5() {
            var $tag = $('.CRtag');
            var $tagItems = $tag.find('.tag-item');
            var html = '';
            $tagItems.each(function (index) {
                html += $(this).prop('outerHTML');
                if (index < $tagItems.length - 1) {
                    html += ' / ';
                }
            });
            $tag.html(html);
            updateRemoveTagButton5();
        }


        function updateRemoveTagButton5() {
            var $tag = $('.CRtag');
            // Ensure the icon appears only once at the beginning
            if ($tag.find('.fa-list').length === 0) {
                $tag.prepend('<a href="#" class="setting-icon CRIcon_tag">' +
                    '<span class="setting_icon se_filter_icon"><i class="fa fa-filter"></i></span>' +
                    '<span class="setting_icon setting_icon_hover setting-icon"><i class="fa fa-fw fa-cog"></i></span>' +
                    '</a>'
                );
            }
            if ($tag.find('.tag-item').length > 0) {
                if ($('.remove-CRtag').length === 0) {
                    $tag.append(' <span class="remove-CRtag" style="cursor:pointer">&times;</span>');
                }
            } else {
                $('.remove-CRtag').remove();
                $('.CRIcon_tag').remove();
            }
        }

        // Function to update filters after tag removal
        function updateFilterTagsCR() {
            let selectedTags = [];
            $('.tag-item').each(function () {
                selectedTags.push($(this).data('value'));
            });

            // Send selected tags to the server for filtering
            filterData(selectedTags);
        }

        $(document).on('click', '.remove-CRtag', function () {
            var $tagItem = $(this).parent('.tag-item');
            $tagItem.remove();
            $('.CRtag').remove(); // Only remove the container if it's empty
            updateTagSeparators5();


            // Reapply filters after removing "Lost" tag
            updateFilterTagsCR();

            // Remove checkmark from the dropdown
            $('#creationDateDropdown1 .o-dropdown-item_2 .checkmark').hide();
        });
    </script>

    <script>
        $(document).ready(function () {
            // Show the dropdown when the input field is clicked
            $('#search-input').on('click', function () {
                $('#search-dropdown').show();
                $('.o_searchview_dropdown_toggler').attr('aria-expanded', 'true'); // Update aria-expanded
                $('#dropdown-arrow').removeClass('fa-caret-down').addClass('fa-caret-up'); // Change to up arrow
            });

            // Add selected value to the input field and hide the dropdown
            $(document).on('click', '#search-dropdown .o-dropdown-item', function () {
                $('#search-dropdown').hide();
                $('#dropdown-arrow').removeClass('fa-caret-up').addClass('fa-caret-down'); // Change back to down arrow
            });

            // Hide dropdown when clicking outside
            $(document).on('click', function (e) {
                if (!$(e.target).closest('#search-input, #search-dropdown, .o_searchview_dropdown_toggler').length) {
                    $('#search-dropdown').hide();
                    $('#dropdown-arrow').removeClass('fa-caret-up').addClass('fa-caret-down'); // Change back to down arrow
                    $('.o_searchview_dropdown_toggler').attr('aria-expanded', 'false'); // Update aria-expanded
                }
            });

            // Toggle dropdown on arrow click
            $('.o_searchview_dropdown_toggler').click(function (event) {
                event.stopPropagation(); // Prevent click event from bubbling up
                const dropdown = $('#search-dropdown');
                const isExpanded = $(this).attr('aria-expanded') === 'true';

                // Toggle the dropdown visibility
                dropdown.toggle();
                $(this).attr('aria-expanded', !isExpanded);

                // Change the arrow direction
                if (isExpanded) {
                    $('#dropdown-arrow').removeClass('fa-caret-up').addClass('fa-caret-down'); // Change to down arrow
                } else {
                    $('#dropdown-arrow').removeClass('fa-caret-down').addClass('fa-caret-up'); // Change to up arrow
                }
            });

            // Toggle Creation Date Dropdown
            $('#creationDateBtn, #creationDateBtn1').on('click', function (event) {
                event.preventDefault();

                const dropdownId = $(this).attr('id').includes('1') ? '#creationDateDropdown1' : '#creationDateDropdown';
                $(dropdownId).slideToggle();
                $(this).find('.arrow-icon').toggleClass('rotate');

                // Close other dropdowns, except creation date dropdown
                $('.o_dropdown_content').not(dropdownId).slideUp();
                $('.o_menu_item .arrow-icon').not($(this).find('.arrow-icon')).removeClass('rotate');
            });

            // Toggle Closed Date Dropdown
            $('#closeDateBtn, #closeDateBtn1').on('click', function (event) {
                event.preventDefault();

                const dropdownId = $(this).attr('id').includes('1') ? '#closeDateDropdown1' : '#closeDateDropdown';
                $(dropdownId).slideToggle();
                $(this).find('.arrow-icon').toggleClass('rotate');

                // Close other dropdowns
                $('.o_dropdown_content').not(dropdownId).slideUp();
                $('.o_menu_item .arrow-icon').not($(this).find('.arrow-icon')).removeClass('rotate');
            });

            // Toggle Conversion Date &  Expected Date Dropdown
            $('#conversionBtn, #expectedBtn').on('click', function (event) {
                event.preventDefault();

                const dropdownId = $(this).attr('id').includes('1') ? '#conversionDate' : '#cxpectedClosing';
                $(dropdownId).slideToggle();
                $(this).find('.arrow-icon').toggleClass('rotate');

                // Close other dropdowns
                $('.o_dropdown_content').not(dropdownId).slideUp();
                $('.o_menu_item .arrow-icon').not($(this).find('.arrow-icon')).removeClass('rotate');
            });

            // Close dropdowns if clicking outside of the dropdowns
            $(document).on('click', function (event) {
                if (!$(event.target).closest('.o_accordion, .o_dropdown_container').length) {
                    $('.o_dropdown_content').slideUp();
                    $('.o_menu_item .arrow-icon').removeClass('rotate');
                }
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
        const toggleButton = document.getElementById('save-current-search');
        const accordionValues = document.querySelector('.o_accordion_values');
        const arrowIcon = toggleButton.querySelector('.arrow-icon');

        toggleButton.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent default behavior to avoid page reload

            const isOpen = accordionValues.style.display === 'block';
            accordionValues.style.display = isOpen ? 'none' : 'block';
            toggleButton.setAttribute('aria-expanded', !isOpen);

            // Toggle the arrow direction
            arrowIcon.classList.toggle('open', !isOpen);
        });

        // Initially hide the accordion values
        accordionValues.style.display = 'none';
    });
    </script>
@endpush