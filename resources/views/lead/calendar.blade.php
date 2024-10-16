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
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true" style="display: none;">
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
            </div>
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

<!-- Modal -->
<div class="modal fade" id="customFilterModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
    aria-labelledby="customFilterModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="customFilterModalLabel">Add Custom Filter</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="customFilterForm">
                <input type="hidden" id="span_id">
                    <div class="mb-3">
                        <div class="o_tree_editor_connector d-flex flex-grow-1 align-items-center">
                            <span>Match</span><span class="px-1">any</span><span>of the following rules:</span>
                        </div>
                        <div id="rulesContainer" class="mt-2">
                            <div class="rule-row mt-2 row">
                                <div class="col-md-3">
                                    <select name="" id="customer_filter_select" class="form-control">
                                        <option value="">selecte filter</option>
                                        <option value="Country">Country</option>
                                        <option value="Zip">Zip</option>
                                        <option value="Tags">Tags</option>
                                        <option value="Created by">Created by</option>
                                        <option value="Created on">Created on</option>
                                        <option value="Customer">Customer</option>
                                        <option value="Email">Email</option>
                                        <option value="ID">ID</option>
                                        <option value="Phone">Phone</option>
                                        <option value="Priority">Priority</option>
                                        <option value="Probability">Probability</option>
                                        <option value="Referred By">Referred By</option>
                                        <option value="Sales Team">Sales Team</option>
                                        <option value="Salesperson">Salesperson</option>
                                        <option value="Source">Source</option>
                                        <option value="Stage">Stage</option>
                                        <option value="State">State</option>
                                        <option value="Street">Street</option>
                                        <option value="Street2">Street2</option>
                                        <option value="Title">Title</option>
                                        <option value="Type">Type</option>
                                        <option value="Website">Website</option>
                                        <option value="Campaign">Campaign</option>
                                        <option value="City">City</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <select name="" id="customer_filter_operates" class="form-control">
                                        <option value="is in">is in</option>
                                        <option value="is not in">is not in</option>
                                        <option value="=">=</option>
                                        <option value="!=">!=</option>
                                        <option value="contains">contains</option>
                                        <option value="does not contain">does not contain</option>
                                        <option value="is set">is set</option>
                                        <option value="is not set">is not set</option>
                                        <option value="matches">matches</option>
                                        <option value="matches none of">matches none of</option>
                                    </select>
                                </div>
                                <div class="col-md-5 customer_filter_input">

                                </div>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer modal-footer-custom gap-1" style="justify-content: start;">
                <button type="submit" style="background-color: #714B67;border-color: #714B67;"
                    class="btn btn-primary add_filter">Add</button>
                <button type="button" style="background-color: #e7e9ed;border-color: #e7e9ed;color: #374151;"
                    class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<!-- Template for new rule row -->
<script type="text/template" id="ruleTemplate">
    <div class="rule-row mt-2 row">
    <div class="col-md-3">
      <select name="" id="" class="form-control">
        <option value="test">test</option>
      </select>
    </div>
    <div class="col-md-2">
      <select name="" id="" class="form-control">
        <option value="is_in">is in</option>  
        <option value="is_not_in">is not in</option>
        <option value="=">=</option>
        <option value="!=">!=</option>
        <option value="contains">contains</option>
        <option value="does_not_contain">does not contain</option>
        <option value="is_set">is set</option>
        <option value="is_not_set">is not set</option>
        <option value="matches">matches</option>
        <option value="matches_none_of">matches none of</option>
      </select>
    </div>
    <div class="col-md-5">
      <select name="" id="" class="form-control">
        <option value="test">test</option>
      </select>
    </div>
    <div class="col-md-2">
      <div class="o_tree_editor_node_control_panel d-flex" role="toolbar" aria-label="Domain node">
        <button class="btn px-2 fs-5 add-new-rule" role="button" title="Add New Rule" aria-label="Add New Rule"><i class="fa fa-plus"></i></button>
        <button class="btn px-2 fs-5" role="button" title="Add branch" aria-label="Add branch"><i class="fa fa-sitemap"></i></button>
        <button class="btn btn-link px-2 text-danger fs-5 delete-rule" role="button" title="Delete node" aria-label="Delete node"><i class="fa fa-trash"></i></button>
      </div>
    </div>
  </div>
</script>

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

    .event-model {
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
    .event-modal-content {
        background: #fff;
        padding: 20px;
        border-radius: 5px;
        width: 80%;
        max-width: 500px;
        position: relative;
    }
    .event-modal-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 1px solid #ddd;
        padding-bottom: 10px;
        background-color: #f9e9e3;
        color: #000;
        font-size: 1.05em;
    }
    .event-modal-close {
        font-size: 24px;
        cursor: pointer;
        color: #888;
    }
    .event-modal-close:hover {
        color: #333;
    }
    .event-modal-footer {
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

    /* .head_breadcrumb_info {
        display: none
    } */

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
<div id="eventModal" class="modal event-model" style="display: none;">
    <div class="event-modal-content">
        <div class="event-modal-header">
            <p id="eventTitle"></p>
            <span id="closeModal" class="event-modal-close">&times;</span>
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
        <div class="event-modal-footer">
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

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

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
                    // Get the due_date of the clicked event
                    const dueDate = moment(calEvent.start).format('YYYY-MM-DD');

                    // Navigate the calendar to the due_date
                    $('#calendar').fullCalendar('gotoDate', dueDate);

                    // Display the event details in a modal or alert
                    $('#eventTitle').text(calEvent.title);
                    $('#eventDate').text(dueDate);

                    // Show the modal
                    $('#eventModal').show();

                    $('#editEvent').data('event-lead_id', calEvent.lead_id);

                    // Handle Close button
                    $('#closeModal').off('click').on('click', function () {
                        $('#eventModal').hide();
                    });

                    $('#editEvent').off('click').on('click', function () {
                        const eventId = $(this).data('event-lead_id');
                        window.location.href = '{{ route("lead.create") }}/' + eventId;
                    });
                }
            });

                    // Function to fetch and filter data based on due_date
            function filterData(selectedTags) {
                $.ajax({
                    url: '{{ route('lead.activities') }}',
                    method: 'GET',
                    data: { tags: selectedTags },
                    success: function (response) {
                        console.log(response); // Debug the response
                        
                        if (response.success && Array.isArray(response.data)) {
                            let events = [];
                            let activityMap = {}; // Map to track activities by ID

                            response.data.forEach(item => {
                                if (Array.isArray(item.activities)) {
                                    item.activities.forEach(activity => {
                                        if (activity.due_date) {
                                            const dueDate = moment(activity.due_date);
                                            if (dueDate.isValid()) {
                                                const dateString = dueDate.format('YYYY-MM-DD');

                                                // Check for duplicates using event ID
                                                if (!activityMap[activity.id]) {
                                                    activityMap[activity.id] = {
                                                        item: item,
                                                        dueDate: dueDate,
                                                        status: dateString // Store the date string
                                                    };
                                                } else {
                                                    // Compare and update based on date
                                                    if (dueDate.isBefore(moment()) && activityMap[activity.id].dueDate.isAfter(moment())) {
                                                        // Prioritize late activities over future ones
                                                        activityMap[activity.id] = {
                                                            item: item,
                                                            dueDate: dueDate,
                                                            status: dateString
                                                        };
                                                    } else if (dueDate.isBefore(moment()) && activityMap[activity.id].dueDate.isBefore(moment())) {
                                                        // If both are late, keep the one that is closest to now
                                                        if (dueDate.isAfter(activityMap[activity.id].dueDate)) {
                                                            activityMap[activity.id] = {
                                                                item: item,
                                                                dueDate: dueDate,
                                                                status: dateString
                                                            };
                                                        }
                                                    }
                                                }
                                            } else {
                                                console.warn(`Invalid due_date for activity ID ${activity.id}:`, activity.due_date);
                                            }
                                        }
                                    });
                                }
                            });

                            

                            // Prepare events from the filtered map
                            for (const key in activityMap) {
                                const { item, dueDate } = activityMap[key];
                                events.push({
                                    id: key,
                                    title: item.product_name || "Event",
                                    start: dueDate.format('YYYY-MM-DD'),
                                    end: dueDate.format('YYYY-MM-DD'),
                                    color: '#0000ff',
                                    lead_id: item.id,
                                });
                            }

                            $('#editEvent').off('click').on('click', function () {
                                const eventId = $(this).data(lead_id);
                                window.location.href = '{{ route("lead.create") }}/' + eventId;
                            });

                            console.log(events,'fdhfdjhfdjhjh'); // Log events to see their structure
                            
                            // Clear existing events
                            $('#calendar').fullCalendar('removeEventSources');
                            
                            // Add only the filtered events with due_date
                            if (events.length > 0) {
                                $('#calendar').fullCalendar('addEventSource', events);
                            } else {
                                console.log("No events to display.");
                            }
                        } else {
                            console.error('Invalid events format in response');
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error('AJAX Error: ', error);
                        console.error('Response Text: ', xhr.responseText);
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


        $('.add_filter').on('click', function (event) {
                event.preventDefault();
                var filterType = $('#customer_filter_select').val();
                var filterValue = $('#customer_filter_input_value').val();
                var operatesValue = $('#customer_filter_operates').val();
                var span_id = $('#span_id').val();

                $('.selected-items .o_searchview_facet').remove();
                $('.o-dropdown-item-3').attr('aria-checked', 'false'); // Reset all aria-checked attributes
                $('.o-dropdown-item-3 .checkmark').hide(); // Hide all checkmarks
                $('.group_by_tag').remove();
                $('.o-dropdown-item_1  .checkmark').hide();

                

                handleTagSelection(filterType, operatesValue, filterValue, span_id);

                // Prepare data to send
                var data = {
                    filterType: filterType,
                    filterValue: filterValue,
                    operatesValue: operatesValue
                };

                // Send AJAX request
                $.ajax({
                    url: '{{route('lead.custom.filter')}}',
                    type: 'POST',
                    data: data,
                    success: function (response) {
            console.log(response); // Debug the response
            
            if (response.success && Array.isArray(response.data)) {
                let events = [];
                let activityMap = {}; // Map to track activities by ID

                response.data.forEach(item => {
                    if (Array.isArray(item.activities)) {
                        item.activities.forEach(activity => {
                            if (activity.due_date) {
                                const dueDate = moment(activity.due_date);
                                if (dueDate.isValid()) {
                                    const dateString = dueDate.format('YYYY-MM-DD');

                                    // Check for duplicates using event ID
                                    if (!activityMap[activity.id]) {
                                        activityMap[activity.id] = {
                                            item: item,
                                            dueDate: dueDate,
                                            status: dateString // Store the date string
                                        };
                                    } else {
                                        // Compare and update based on date
                                        if (dueDate.isBefore(moment()) && activityMap[activity.id].dueDate.isAfter(moment())) {
                                            // Prioritize late activities over future ones
                                            activityMap[activity.id] = {
                                                item: item,
                                                dueDate: dueDate,
                                                status: dateString
                                            };
                                        } else if (dueDate.isBefore(moment()) && activityMap[activity.id].dueDate.isBefore(moment())) {
                                            // If both are late, keep the one that is closest to now
                                            if (dueDate.isAfter(activityMap[activity.id].dueDate)) {
                                                activityMap[activity.id] = {
                                                    item: item,
                                                    dueDate: dueDate,
                                                    status: dateString
                                                };
                                            }
                                        }
                                    }
                                } else {
                                    console.warn(`Invalid due_date for activity ID ${activity.id}:`, activity.due_date);
                                }
                            }
                        });
                    }
                });

                // Prepare events from the filtered map
                for (const key in activityMap) {
                    const { item, dueDate } = activityMap[key];
                    events.push({
                        id: key,
                        title: item.product_name || "Event",
                        start: dueDate.format('YYYY-MM-DD'),
                        end: dueDate.format('YYYY-MM-DD'),
                        color: '#0000ff' // Set the color for the event
                    });
                }

                console.log(events); // Log events to see their structure
                
                // Clear existing events
                $('#calendar').fullCalendar('removeEventSources');
                
                // Add only the filtered events with due_date
                if (events.length > 0) {
                    $('#calendar').fullCalendar('addEventSource', events);
                } else {
                    console.log("No events to display.");
                }
            } else {
                console.error('Invalid events format in response');
            }
        },
                    error: function (xhr, status, error) {
                        console.error('Error:', error);
                    }
                });

                $('#customFilterModal').modal('hide');
            });

        function handleTagSelection(filterType, operatesValue, filterValue, span_id) {
            console.log(filterType, operatesValue, filterValue, span_id);
            var selectedValue = filterType + ' ' + operatesValue + ' ' + filterValue;
            var $tag = $('.tag5');
            var $tagItem = $('.tag-item[data-value="' + selectedValue + '"]');

            // Find the tag with the specific span_id and remove it
            var $iconTag = $('span.tag[data-span_id="' + span_id + '"]'); // Select span with class "tag" and matching span_id
            
            var $icosnDiv = $('div.tag1[data-span_id="' + span_id + '"]'); // Select div with class "tag" and matching span_id
            console.log($iconTag, 'iconTag');
            var $iconLTFTag = $('span.LTFtag[data-span_id="' + span_id + '"]');

            if ($tagItem.length > 0) {
                $tagItem.remove();
                updateTagSeparators();

                if ($tag.children().length === 0) {
                    $tag.remove();
                    $('#search-input').val('').attr('placeholder', 'Search...');
                }
            } else {
                var newTagHtml = '<span class="tag-item" data-value="' + selectedValue + '">' + selectedValue + '<span class="custom-filter-remove" style="cursor:pointer;">×</span></span>';
                if ($tag.length === 0) {
                    $('#search-input').before('<span class="tag5">' + newTagHtml + '</span>');
                } else {
                    $tag.html(newTagHtml); // Overwrite with new tag
                }
                $('#search-input').val('').attr('placeholder', '');
            }

            // Remove the entire span.tag element using the span_id
            if ($iconTag.length > 0) {
                $iconTag.remove();  // This removes the <span class="tag"> element
            }
            if ($icosnDiv.length > 0) {
                $icosnDiv.remove();  // This removes the <span class="tag"> element
            }
            if ($iconLTFTag.length > 0) {
                $iconLTFTag.remove();  // This removes the <span class="tag"> element
            }

            updateTagSeparators();
        }

        function updateTagSeparators() {
            var $tag = $('.tag5');
            var $tagItems = $tag.find('.tag-item');
            var html = '';
            $tagItems.each(function (index) {
                html += $(this).prop('outerHTML');
                if (index < $tagItems.length - 1) {
                    html += ' & ';
                }
            });
            $tag.html(html);
            updateRemoveTagButton();
        }

        function updateRemoveTagButton() {
            var $tag = $('.tag5');
            var index = 0;
            if ($tag.find('.fa-list').length === 0) {
            var currentIndex = index++;
                $tag.prepend('<a href="#" data-span_id="' + currentIndex + '""  class="setting-icon icon_tag">' +
                    '<span class="setting_icon se_filter_icon setting-icon"><i class="fa fa-filter"></i></span>' +
                    '<span  data-span_id="' + currentIndex + '""  class="setting_icon setting_icon_hover setting-icon"><i class="fa fa-fw fa-cog"></i></span>' +
                    '</a>'
                );
            }   
            if ($tag.find('.tag-item').length > 0) {
                if ($('.custom-filter-remove').length === 0) {
                    $tag.append(' <span class="custom-filter-remove" style="cursor:pointer">&times;</span>');
                }
            } else {
                $('.custom-filter-remove').remove();
                $('.icon_tag').remove();
            }
        }

        $(document).on('click', '.custom-filter-remove', function () {
            $('.tag5').remove();
            var valueToRemove = $(this).closest('.tag-item').data('value');
            $(this).closest('.tag-item').remove();
            if ($('.tag5').children().length === 0) {
                $('.tag5').remove();
            }
           location.reload();
        });
        

        // Handle item selection from dropdown
        $(document).on('click', '.o-dropdown-item_1', function (e) {
            $('.o-dropdown-item_1  .checkmark').hide();
            $('.o-dropdown-item-2 .checkmark').hide();
            $('.lost_span:contains("Lost")').find('.checkmark').hide();
            $('.LTFActivities .checkmark').hide();
            $('#creationDateDropdown1 .o-dropdown-item_2 .checkmark').hide();
            e.stopPropagation();

            var $item = $(this);
            var selectedValue = $item.clone().find('.checkmark').remove().end().text().trim();
            
            // Toggle checkmark visibility
            var $checkmark = $item.find('.checkmark');
            if ($checkmark.is(':visible')) {
                // Uncheck and remove the tag if it's already checked
                $checkmark.hide();
                $item.removeClass('selected'); // Optionally, you can add a class for styling
                $('.tag-item[data-value="' + selectedValue + '"]').parent().remove(); // Remove the tag
            } else {
                // Clear previous tags and hide other checkmarks
                $('.tag-item').parent().remove();
                $('.o-dropdown-item_1 .checkmark').hide();
                $('.lost_span:contains("Lost") .checkmark').hide();
                
                // Show checkmark for the selected item
                $checkmark.show();
                $item.addClass('selected'); // Optionally, you can add a class for styling
                
                // Create and append new tag
                handleTagSelectionGrop(selectedValue, $item);
            }

            // Clear search input
            $('#search-input').val('').attr('placeholder', 'Search...');
        });

        // Listen to changes in the select dropdown
        $('.o_add_custom_group_menu').on('change', function (e) {
            var selectedValue = $(this).find('option:selected').text().trim();
            handleTagSelectionGrop(selectedValue);
            $(this).val(''); // Reset the select after selecting an option
        });

        // Function to handle tag selection
        function handleTagSelectionGrop(selectedValue, $item = null) {
            // Remove any existing tags
            $('.tag-item').parent().remove();

            // Create new tag with an icon
            var newTagHtml = `
            <span class="tag-item" data-value="${selectedValue}">
                <a href="#" class="group-setting-icon icon_tag" style="cursor: default;">
                    <span class="setting_icon" style="padding:0 !important;background-color: rgb(1 126 132) !important;"><i class="fa-solid fa-layer-group"></i></span>
                </a> 
                ${selectedValue}
            </span>
        `;
            var $tag = $(`<span class="group_by_tag">${newTagHtml} <span class="remove_tag_group_by" style="cursor:pointer">×</span></span>`);

            // Append the new tag
            $('#search-input').before($tag);
            updateTagSeparatorsGrop(); // Call to update separators

            if ($item) {
                $item.find('.checkmark').show();
            }

            // Collect selected tags
            let selectedTags = [selectedValue]; // Only one tag now
            filter(selectedTags);
            $('#search-dropdown').hide();
        }

        // Update tag separators and remove button
        function updateTagSeparatorsGrop() {
            var $tag = $('.group_by_tag');
            var $tagItems = $tag.find('.tag-item');
            var html = '';

            $tagItems.each(function (index) {
                html += $(this).prop('outerHTML');
                if (index < $tagItems.length - 1) {
                    html += ' > '; // Add separator if more than one tag
                }
            });

            // Always add the remove button
            html += ' <span class="remove_tag_group_by" style="cursor:pointer">&times;</span>';
            $tag.html(html);
        }

        // Remove all tags
        $(document).on('click', '.remove_tag_group_by', function () {
            $('.group_by_tag').remove();
            $('#search-input').val('').attr('placeholder', 'Search...');
            $('#filter').val('');
            location.reload();
        });

        // Hide dropdown when clicking outside
        $(document).on('click', function (e) {
            if (!$(e.target).closest('#search-input, #search-dropdown').length) {
                $('#search-dropdown').hide();
            }
        });

        // ------------------------------ Favorite Filter Start -----------------------------------------------

        // Handle the save button click
        $('.o_save_favorite').on('click', function(event) {
            event.preventDefault(); // Prevent default form submission

            const favoriteName = $('#lead_favorites').val(); // Ensure this matches your input field
            const isDefault = $('#checkbox-comp-70').is(':checked');
            const isShared = $('#checkbox-comp-71').is(':checked');

            if (favoriteName) {
                $.ajax({
                    url: '{{ route('lead.favorites.filter') }}', // Your API endpoint
                    type: 'POST',
                    contentType: 'application/json',
                    data: JSON.stringify({ 
                        favorites_name: favoriteName,
                        is_default: isDefault,
                        is_shared: isShared
                    }),
                    success: function(response) {
                        location.reload();
                    },
                    error: function(xhr) {
                    if (xhr.status === 409) {
                        // Handle conflict error
                        toastr.error(xhr.responseJSON.message); // Display the conflict message
                    } else {
                        console.error('Error:', xhr);
                        toastr.error('An error occurred while saving your favorite.'); // Generic error message
                    }
                }
                });
            } else {
                alert('Please enter a favorite name.');
            }
        });

        // Search functionality
        $('.o_input').on('input', function() {
            const searchTerm = $(this).val().toLowerCase();
            $('.o-dropdown-item').each(function() {
                const text = $(this).text().toLowerCase();
                $(this).toggle(text.includes(searchTerm));
            });
        });

        $(document).on('click', '.delete-item', function() {
            const itemId = $(this).data('id');
            $('#confirmDelete').data('id', itemId); // Store the ID in the confirm button
            $('#deleteModal').modal('show'); // Show the modal
        });

        $('#confirmDelete').on('click', function() {
            const itemId = $(this).data('id'); // Get the ID from the confirm button

            $.ajax({
                url: `/delete-lead-favorites/${itemId}`, // Your delete endpoint
                type: 'DELETE',
                success: function(response) {
                    toastr.success('Favorite deleted successfully!'); // Show success message
                    $('#deleteModal').modal('hide'); // Hide the modal

                    // Remove the item from the UI
                    $(`span[data-id="${itemId}"]`).remove();
                },
                error: function(xhr) {
                    console.error('Error:', xhr);
                    toastr.error('An error occurred while deleting the favorite.'); // Show error message
                }
            });
        });

        // ------------------------------ Favorite Filter End -----------------------------------------------

        
        // ------------------------------ On reload Favorite Filter Start -----------------------------------------------

        $('.o-dropdown-item-3').each(function() {
            if ($(this).attr('aria-checked') === 'true') {
                var filterName = $(this).data('name');
                var filterId = $(this).data('id');

                // Create a container for the entire facet
                var container = $('<div class="o_searchview_facet position-relative d-inline-flex align-items-stretch rounded-2 bg-200 text-nowrap"></div>');

                // Create the absolute background overlay
                var overlay = $('<div class="position-absolute start-0 top-0 bottom-0 end-0 bg-view border rounded-2 shadow opacity-0 opacity-100-hover"></div>');
                container.append(overlay);

                // Create the favorite button with icons
                var facetLabel = $('<div class="o_searchview_facet_label position-relative rounded-start-2 px-1 rounded-end-0 p-0 btn btn-favourite" style="background-color:#f3cc00" role="button">' +
                    '<i class="small fa-fw fa fa-star" role="image"></i>' +
                    '<span class="setting-icon position-absolute start-0 top-0 bottom-0 end-0 bg-inherit opacity-0 opacity-100-hover">' +
                    '<i class="fa fa-fw fa-cog"></i></span></div>');
                container.append(facetLabel);

                // Create the values container with the filter name and remove button
                var valuesContainer = $('<div class="o_facet_values position-relative d-flex flex-wrap ps-2 align-items-center rounded-end-2 text-wrap"></div>');
                var facetValue = $('<small class="o_facet_value">' + filterName + '</small>');
                var removeButton = $('<button class="o_facet_remove fa fa-close btn btn-link py-0 px-2 text-danger d-print-none" role="button" aria-label="Remove" title="Remove" data-id="' + filterId + '"></button>');

                // Append the value and remove button to the values container
                valuesContainer.append(facetValue);
                valuesContainer.append(removeButton);

                // Append the values container to the main container
                container.append(valuesContainer);

                // Append the entire container to the selected-items
                $('.selected-items').append(container);

                // Show the checkmark in the dropdown
                $(this).find('.checkmark').show();
            }
        });

        // Close icon functionality (to remove selected item)
        $(document).on('click', '.o_facet_remove', function() {
            var filterId = $(this).data('id');
            $(this).closest('.o_searchview_facet').remove(); // Remove the selected item container

            // Hide the checkmark in the dropdown
            $('.o-dropdown-item-3[data-id="' + filterId + '"] .checkmark').hide();
            $('.o-dropdown-item-3[data-id="' + filterId + '"]').attr('aria-checked', 'false'); // Reset aria-checked attribute
        });

        // Handle item click to select/deselect
        $('.o-dropdown-item-3').on('click', function() {
            var filterId = $(this).data('id');

            // Check if the item is already selected
            if ($(this).attr('aria-checked') === 'true') {
                // Deselect the item
                $(this).attr('aria-checked', 'false'); // Mark it as unchecked
                $(this).find('.checkmark').hide(); // Hide the checkmark

                // Remove the item from the selected items
                $('.selected-items .o_searchview_facet').each(function() {
                    if ($(this).find('.o_facet_remove').data('id') === filterId) {
                        $(this).remove(); // Remove the selected item container
                    }
                });
                return; // Exit the function
            }

            // Deselect all currently selected items
            $('.selected-items .o_searchview_facet').remove();
            $('.o-dropdown-item-3').attr('aria-checked', 'false'); // Reset all aria-checked attributes
            $('.o-dropdown-item-3 .checkmark').hide(); // Hide all checkmarks

            // Show the selected item
            var filterName = $(this).data('name');
            var container = $('<div class="o_searchview_facet position-relative d-inline-flex align-items-stretch rounded-2 bg-200 text-nowrap"></div>');

            // Create the favorite button with icons
            var facetLabel = $('<div class="o_searchview_facet_label position-relative rounded-start-2 px-1 rounded-end-0 p-0 btn btn-favourite" style="background-color:#f3cc00" role="button">' +
                '<i class="small fa-fw fa fa-star" role="image"></i>' +
                '<span class="position-absolute start-0 top-0 bottom-0 end-0 bg-inherit opacity-0 opacity-100-hover">' +
                '<i class="fa fa-fw fa-cog"></i></span></div>');
            container.append(facetLabel);

            // Create the values container with the filter name and remove button
            var valuesContainer = $('<div class="o_facet_values position-relative d-flex flex-wrap ps-2 align-items-center rounded-end-2 text-wrap"></div>');
            var facetValue = $('<small class="o_facet_value">' + filterName + '</small>');
            var removeButton = $('<button class="o_facet_remove fa fa-close btn btn-link py-0 px-2 text-danger d-print-none" role="button" aria-label="Remove" title="Remove" data-id="' + filterId + '"></button>');

            // Append the value and remove button to the values container
            valuesContainer.append(facetValue);
            valuesContainer.append(removeButton);

            // Append the values container to the main container
            container.append(valuesContainer);

            // Append the entire container to the selected-items
            $('.selected-items').append(container);

            // Update the dropdown item
            $(this).attr('aria-checked', 'true'); // Mark it as checked
            $(this).find('.checkmark').show(); // Show the checkmark
        });

        // ------------------------------ On reload Favorite Filter End -----------------------------------------------

    });
    </script>

<script>
    $(document).ready(function () {
        $('#customer_filter_select').on('change', function () {
            var selectedValue = $(this).val();
            var filterInput = $('.customer_filter_input');

            // Clear the previous filter input
            filterInput.empty();

            // Dynamic content based on selected filter
            switch (selectedValue) {
                case 'Country':
                    filterInput.append('<select name="country" id="customer_filter_input_value" class="form-control">@foreach($Countrs as $Country)<option value="{{ $Country->name }}">{{ $Country->name }}</option>@endforeach</select>');
                    break;
                case 'Zip':
                    filterInput.append('<input type="text" name="zip" id="customer_filter_input_value" class="form-control" placeholder="Enter Zip">');
                    break;
                case 'Tags':
                    filterInput.append('<select name="tags" id="customer_filter_input_value" class="form-control">@foreach($tages as $tag)<option value="{{ $tag->name }}">{{ $tag->name }}</option>@endforeach</select>');
                    break;
                case 'Created by':
                    filterInput.append('<select name="created_by" id="customer_filter_input_value" class="form-control">@foreach($users as $user)<option value="{{ $user->name }}">{{ $user->name }}</option>@endforeach</select>');
                    break;
                case 'Created on':
                    filterInput.append('<input type="date" name="customer_filter_input_value" id="customer_filter_input_value" class="form-control">');
                    break;
                case 'Customer':
                    filterInput.append('<select name="customer" id="customer_filter_input_value" class="form-control">@foreach($customers as $customer)<option value="{{ $customer->name }}">{{ $customer->name }}</option>@endforeach</select>');
                    break;
                case 'Email':
                    filterInput.append('<input type="email" name="email" id="customer_filter_input_value" class="form-control" placeholder="Enter email">');
                    break;
                case 'ID':
                    filterInput.append('<input type="text" id="customer_filter_input_value" class="form-control" placeholder="Enter ID">');
                    break;
                case 'Phone':
                    filterInput.append('<input type="text" name="phone" id="customer_filter_input_value" class="form-control" placeholder="Enter phone">');
                    break;
                case 'Priority':
                    filterInput.append('<select name="priority" id="customer_filter_input_value" class="form-control"><option value="medium">Medium</option><option value="high">High</option><option value="very_high">Very High</option></select>');
                    break;
                case 'Probability':
                    filterInput.append('<input type="text" name="probability" id="customer_filter_input_value" class="form-control" placeholder="Enter probability">');
                    break;
                case 'Referred By':
                    filterInput.append('<input type="text" id="customer_filter_input_value" name="referred_by" class="form-control" placeholder="Enter referred by">');
                    break;
                case 'Salesperson':
                    filterInput.append('<select name="salesperson" id="customer_filter_input_value" class="form-control">@foreach($users as $user)<option value="{{ $user->email }}">{{ $user->email }}</option>@endforeach</select>');
                    break;
                case 'Source':
                    filterInput.append('<select name="source" id="customer_filter_input_value" class="form-control">@foreach($Sources as $Source)<option value="{{ $Source->name }}">{{ $Source->name }}</option>@endforeach</select>');
                    break;
                case 'Stage':
                    filterInput.append('<select name="stage" id="customer_filter_input_value" class="form-control">@foreach($CrmStages as $Stage)<option value="{{ $Stage->id }}">{{ $Stage->title }}</option>@endforeach</select>');
                    break;
                case 'State':
                    filterInput.append('<select name="state" id="customer_filter_input_value" class="form-control">@foreach($States as $State)<option value="{{ $State->name }}">{{ $State->name }}</option>@endforeach</select>');
                    break;
                case 'Street':
                    filterInput.append('<input type="text" id="customer_filter_input_value" name="street" class="form-control" placeholder="Enter street">');
                    break;
                case 'Street2':
                    filterInput.append('<input type="text" name="street2" id="customer_filter_input_value" class="form-control" placeholder="Enter street2">');
                    break;
                case 'Title':
                    filterInput.append('<select name="title" id="customer_filter_input_value" class="form-control">@foreach($PersonTitle as $title)<option value="{{ $title->title }}">{{ $title->title }}</option>@endforeach</select>');
                    break;
                case 'Type':
                    filterInput.append('<select name="type" id="customer_filter_input_value" class="form-control"><option value="Lead">Lead</option><option value="Opportunity">Opportunity</option></select>');
                    break;
                case 'Website':
                    filterInput.append('<input type="text" id="customer_filter_input_value" name="website" class="form-control" placeholder="Enter website">');
                    break;
                case 'Campaign':
                    filterInput.append('<select name="campaign" id="customer_filter_input_value" class="form-control">@foreach($Campaigns as $Campaign)<option value="{{ $Campaign->name }}">{{ $Campaign->name }}</option>@endforeach</select>');
                    break;
                case 'City':
                    filterInput.append('<input type="text" name="city" id="customer_filter_input_value" class="form-control" placeholder="Enter city">');
                    break;
                default:
                    filterInput.append('<input type="text" id="customer_filter_input_value" class="form-control" placeholder="Enter value">');
                    break;
            }
        });

   
    });
</script>


<script>
  $(document).ready(function () {
            // Initialize the Bootstrap modal
            var customFilterModal = new bootstrap.Modal(document.getElementById('customFilterModal'));

            // Handle the click event on the "Add Custom Filter" button
            $('.o_add_custom_filter').on('click', function () {
                customFilterModal.show();
            });


            // Handle form submission with AJAX
            $('#saveFilterBtn').on('click', function () {
                var filterName = $('#filterName').val();

                $.ajax({
                    url: '/path/to/your/api/endpoint', // Replace with your API endpoint
                    type: 'POST'
                    , data: {
                        filterName: filterName
                    }
                    , success: function (response) {
                        // Handle success, e.g., show a success message or update UI
                        console.log('Filter saved successfully:', response);
                        customFilterModal.hide();
                    }
                    , error: function (xhr, status, error) {
                        // Handle error, e.g., show an error message
                        console.error('Error saving filter:', error);
                    }
                });
            });

            // Function to add a new rule row
            function addNewRule() {
                var template = $('#ruleTemplate').html();
                $('#rulesContainer').append(template);
            }

            // Click handler for "New Rule" link
            $('#addNewRule').on('click', function (event) {
                event.preventDefault();
                addNewRule();
            });

            // Click handler for "fa-plus" button in rule rows
            $(document).on('click', '.add-new-rule', function (event) {
                event.preventDefault();
                addNewRule();
            });

            // Click handler for "Delete node" button
            $(document).on('click', '.delete-rule', function (event) {
                event.preventDefault();
                // Ensure that at least one rule remains
                if ($('#rulesContainer .rule-row')) {
                    $(this).closest('.rule-row').remove();
                } else {
                    // Add a new rule when all are deleted
                    $('#rulesContainer').empty(); // Clear container
                    addNewRule(); // Add one new rule
                }
            });

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