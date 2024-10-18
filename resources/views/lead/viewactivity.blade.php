@extends('layout.header')
@section('content')
@section('head_breadcrumb_title', 'Leads')
@section('lead', route('lead.index'))
@section('kanban', route('lead.kanban', ['lead' => 'kanban']))
@section('calendar', route('lead.calendar', ['lead' => 'calendar']))
@section('char_area', route('lead.graph'))
@section('activity', route('lead.activity'))
{{-- @vite([
'resources/css/chats.css',
]) --}}
@section('head')
@vite(['resources/css/chats.css'])

@endsection
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
    input {
        font-family: 'Roboto', sans-serif;
        display: block;
        border: none;
        border-radius: 0.25rem;
        border: 1px solid transparent;
        line-height: 1.5rem;
        padding: 0;
        font-size: 1rem;
        color: #607D8B;
        width: 100%;
        margin-top: 0.5rem;
    }

    input:focus {
        outline: none;
    }

    #ui-datepicker-div {
        display: none;
        background-color: #fff;
        box-shadow: 0 0.125rem 0.5rem rgba(0, 0, 0, 0.1);
        margin-top: 0.25rem;
        border-radius: 0.5rem;
        padding: 0.5rem;
    }

    table {
        border-collapse: collapse;
        border-spacing: 0;
    }

    .ui-datepicker-calendar thead th {
        padding: 0.25rem 0;
        text-align: center;
        font-size: 0.75rem;
        font-weight: 400;
        color: #78909C;
    }

    .ui-datepicker-calendar tbody td {
        width: 2.5rem;
        text-align: center;
        padding: 0;
    }

    .ui-datepicker-calendar tbody td a {
        display: block;
        border-radius: 0.25rem;
        line-height: 2rem;
        transition: 0.3s all;
        color: #546E7A;
        font-size: 0.875rem;
        text-decoration: none;
    }

    .ui-datepicker-calendar tbody td a:hover {
        background-color: #E0F2F1;
    }

    .ui-datepicker-calendar tbody td a.ui-state-active {
        background-color: #009688;
        color: white;
    }

    .ui-datepicker-header a.ui-corner-all {
        cursor: pointer;
        position: absolute;
        top: 0;
        width: 2rem;
        height: 2rem;
        margin: 0.5rem;
        border-radius: 0.25rem;
        transition: 0.3s all;
    }

    .ui-datepicker-header a.ui-corner-all:hover {
        background-color: #ECEFF1;
    }

    .ui-datepicker-header a.ui-datepicker-prev {
        left: 0;
        background: url("data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMyIgaGVpZ2h0PSIxMyIgdmlld0JveD0iMCAwIDEzIDEzIj48cGF0aCBmaWxsPSIjNDI0NzcwIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik03LjI4OCA2LjI5NkwzLjIwMiAyLjIxYS43MS43MSAwIDAgMSAuMDA3LS45OTljLjI4LS4yOC43MjUtLjI4Ljk5OS0uMDA3TDguODAzIDUuOGEuNjk1LjY5NSAwIDAgMSAuMjAyLjQ5Ni42OTUuNjk1IDAgMCAxLS4yMDIuNDk3bC00LjU5NSA0LjU5NWEuNzA0LjcwNCAwIDAgMS0xLS4wMDcuNzEuNzEgMCAwIDEtLjAwNi0uOTk5bDQuMDg2LTQuMDg2eiIvPjwvc3ZnPg==");
        background-repeat: no-repeat;
        background-size: 0.5rem;
        background-position: 50%;
        transform: rotate(180deg);
    }

    .ui-datepicker-header a.ui-datepicker-next {
        right: 0;
        background: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMyIgaGVpZ2h0PSIxMyIgdmlld0JveD0iMCAwIDEzIDEzIj48cGF0aCBmaWxsPSIjNDI0NzcwIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik03LjI4OCA2LjI5NkwzLjIwMiAyLjIxYS43MS43MSAwIDAgMSAuMDA3LS45OTljLjI4LS4yOC43MjUtLjI4Ljk5OS0uMDA3TDguODAzIDUuOGEuNjk1LjY5NSAwIDAgMSAuMjAyLjQ5Ni42OTUuNjk1IDAgMCAxLS4yMDIuNDk3bC00LjU5NSA0LjU5NWEuNzA0LjcwNCAwIDAgMS0xLS4wMDcuNzEuNzEgMCAwIDEtLjAwNi0uOTk5bDQuMDg2LTQuMDg2eiIvPjwvc3ZnPg==');
        background-repeat: no-repeat;
        background-size: 10px;
        background-position: 50%;
    }

    .ui-datepicker-header a>span {
        display: none;
    }

    .ui-datepicker-title {
        text-align: center;
        line-height: 2rem;
        margin-bottom: 0.25rem;
        font-size: 0.875rem;
        font-weight: 500;
        padding-bottom: 0.25rem;
    }

    .ui-datepicker-week-col {
        color: #78909C;
        font-weight: 400;
        font-size: 0.75rem;
    }

    .avatar-initials {
        width: 24px;
        height: 24px;
        background-color: #017e84;
        color: white;
        font-size: 20px;
        border-radius: 50%;
        text-align: center;
        line-height: 40px;
    }

    .location {
        display: none;
    }

    .new_btn_info {
        display: none;
    }

    .o_form_button_save {
        display: none;
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
        transition: transform 0.3s;
        /* Smooth transition */
    }

    .arrow-icon.open {
        transform: rotate(180deg);
        /* Rotate the arrow when open */
    }

    .search-dropdown-item {
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
    .LTFtag,
    .tag5,
    .group_by_tag,
    .CRtag,
    .favorites-filter {
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
    .btn-primary {
        background-color: #714B67 !important;
        border:none !important;
    }
    .feedback-discard{
        color:#017e84!important;
    }

    #main_save_btn{
        display: none; 
    }

    #main_discard_btn{
        display: none; 
    }
    .redirect-button{
        display: none !important;
    }
    #dropdownMenuButton{
        display: none;
    }
</style>

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<!-- jQuery (required for Bootstrap JS components) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css">

@endsection


@section('search_div')
<div class="o_popover popover mw-100 o-dropdown--menu search-dropdown-menu o_search_bar_menu d-flex flex-wrap flex-lg-nowrap w-100 w-md-auto mt-2 py-3"
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
            class="o-dropdown-item-2 dropdown-item o-navigable o_menu_item text-truncate LTFActivities"
            role="menuitemcheckbox" tabindex="0" title="" aria-checked="false"><span class="float-end checkmark"
                style="display:none;">✔</span>Late Activities</span><span
            class="o-dropdown-item-2 dropdown-item o-navigable o_menu_item text-truncate LTFActivities"
            role="menuitemcheckbox" tabindex="0" title="Today Activities" aria-checked="false"><span
                class="float-end checkmark" style="display:none;">✔</span>Today Activities</span><span
            class="o-dropdown-item-2 dropdown-item o-navigable o_menu_item text-truncate LTFActivities"
            role="menuitemcheckbox" tabindex="0" title="Future Activities" aria-checked="false"><span
                class="float-end checkmark" style="display:none;">✔</span>Future Activities</span>
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
                                                        <span class="o-dropdown-item-3 dropdown-item o-navigable o_menu_item text-truncate" role="menuitemcheckbox"
                tabindex="0" aria-checked="{{ $favoritesFilter->is_default ? 'true' : 'false' }}"
                data-id="{{ $favoritesFilter->id }}" data-name="{{ $favoritesFilter->favorites_name }}">
                <span class="d-flex p-0 align-items-center justify-content-between">
                    <span class="text-truncate flex-grow-1" title="">{{ $favoritesFilter->favorites_name ?? '' }}
                        <span class="float-end checkmark" style="display:none;">✔</span>
                    </span>
                    <i class="ms-1 fa fa-trash-o delete-item" title="Delete item" data-id="{{ $favoritesFilter->id }}"
                        data-bs-toggle="modal" data-bs-target="#deleteModal"></i>
                </span>
            </span>
            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true"
                style="display: none;">
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
                            <button type="button" class="btn btn-primary"
                                style="background-color:#714B67;border: none;font-weight: 500;" id="confirmDelete">Delete
                                Filter</button>
                            <button type="button" class="btn btn-secondary text-black"
                                style="background-color:#e7e9ed;border: none;font-weight: 500;"
                                data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div role="separator" class="dropdown-divider"></div>
        <div class="o_accordion position-relative">
            <button id="save-current-search"
                class="o_menu_item o_accordion_toggle search-dropdown-item o-navigable o_add_favorite text-truncate"
                tabindex="0" aria-expanded="false">
                Save current search
                <span class="arrow-icon" style="font-size: 10px; margin-top: 4px;">▼</span>
            </button>
            <div class="o_accordion_values ms-4 border-start">
                <div class="px-3 py-2">
                    <input type="text" class="o_input" id="lead_favorites" name="favorites_name" value="Leads"
                        placeholder="Enter favorite name">
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
                    <button class="o_save_favorite btn-sm btn btn-primary w-100"
                        style="background-color: #714b67; border: none;">Save</button>
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

<div class="o_content">
    <div class="o_activity_view h-100" xml:space="preserve">
        <table class="table table-bordered mb-5 bg-view o_activity_view_table">
            <thead>
                <tr>
                    <th></th>
                    <th class="o_activity_type_cell p-3" width="16.666666666666668%">
                        <div><span>Email</span></div>
                    </th>
                    <th class="o_activity_type_cell p-3" width="16.666666666666668%">
                        <div><span>Call</span></div>
                    </th>
                    <th class="o_activity_type_cell p-3" width="16.666666666666668%">
                        <div><span>Meeting</span></div>
                    </th>
                    <th class="o_activity_type_cell p-3" width="16.666666666666668%">
                        <div><span>To-Do</span></div>
                    </th>
                    <th class="o_activity_type_cell p-3" width="16.666666666666668%">
                        <div><span>Upload Document</span></div>
                    </th>
                    <th class="o_activity_type_cell p-3" width="16.666666666666668%">
                        <div><span>Request Signature</span></div>
                    </th>
                </tr>
            </thead>
            <tbody id="activityTableBody">
                @foreach($activities as $lead_id => $leadActivities)
                                @php
                                    $lead = $leadActivities->first(); // Get the first activity to display lead-related data once
                                @endphp
                                <tr class="o_data_row h-100">
                                    <td class="o_activity_record p-2 cursor-pointer">
                                        <div>
                                            <div name="user_id" class="o_field_widget o_field_many2one_avatar_user d-inline-block">
                                                <div class="d-flex align-items-center gap-1"
                                                    data-tooltip="{{$lead->getLead->email ?? ''}}">
                                                    @php

                                                        $user = $lead->getLead;
                                                        $initial = $user ? strtoupper(substr($user->email, 0, 1)) : '';

                                                        $colors = ['#f44336', '#e91e63', '#9c27b0', '#673ab7', '#3f51b5', '#2196f3', '#03a9f4', '#00bcd4', '#009688', '#4caf50', '#8bc34a', '#cddc39', '#ffeb3b', '#ffc107', '#ff9800', '#ff5722'];


                                                        if ($user) {
                                                            $colorIndex = crc32($user->email) % count($colors);
                                                            $bgColor = $colors[$colorIndex];
                                                        } else {
                                                            $bgColor = '#f0f0f0';
                                                        }
                                                    @endphp
                                                    <span class="o_avatar o_m2o_avatar d-flex">
                                                        @if(optional($user)->profile)
                                                            <!-- If profile image exists -->
                                                            <img class="rounded" src="{{ $user->profile }}" alt="User Profile">
                                                        @else
                                                            <!-- If no profile image, display the first letter of email with dynamic background color -->
                                                            <div class="placeholder-circle rounded d-flex align-items-center justify-content-center"
                                                                data-id="{{$lead->id}}"
                                                                style="background-color: {{ $bgColor }}; width:32px;height:32px;color:white">
                                                                <span>{{ $initial }}</span>
                                                            </div>
                                                        @endif
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <div class="d-flex justify-content-between">
                                                    <div class="d-block text-truncate o_text_block o_text_bold">
                                                        {{ $lead->product_name }}
                                                    </div>
                                                    <div name="expected_revenue"
                                                        class="o_field_widget o_field_empty o_field_monetary d-block text-truncate text-muted">
                                                        <span>₹{{$lead->probability ?? '0.00'}}</span>
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-between">
                                                    <div class="d-block text-truncate text-muted o_text_block"></div>
                                                    <div name="stage_id" class="o_field_widget o_field_badge d-inline-block">
                                                        <span class="badge rounded-pill">New</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="o_activity_summary_cell" data-id="{{$lead->lead_id}}" data-activity_type="to-do">
                                        @php
                                            $emailActivity = $leadActivities->where('activity_type', 'email')->where('status', 0)->sortBy('due_date');

                                            // Get current date
                                            $now = \Carbon\Carbon::now();
                                            $startOfToday = $now->copy()->startOfDay();

                                            // Calculate the counts for each status
                                            $overdueActivities = $emailActivity->filter(function ($activity) use ($startOfToday) {
                                                $dueDate = \Carbon\Carbon::parse($activity->due_date);
                                                return $dueDate->lessThan($startOfToday);
                                            });


                                            $todayActivities = $emailActivity->filter(function ($activity) use ($now) {
                                                $dueDate = \Carbon\Carbon::parse($activity->due_date); // Ensure due_date is a Carbon instance
                                                return $now->isSameDay($dueDate); // Today
                                            });

                                            $plannedActivities = $emailActivity->filter(function ($activity) use ($now) {
                                                $dueDate = \Carbon\Carbon::parse($activity->due_date); // Ensure due_date is a Carbon instance
                                                return $now->lt($dueDate); // Planned
                                            });

                                            $overdueCount = $overdueActivities->count();
                                            $todayCount = $todayActivities->count();
                                            $plannedCount = $plannedActivities->count();
                                        @endphp

                                        @if($emailActivity->isNotEmpty())
                                                            <div class="text-center text-white"
                                                                style="background-color:
                                                                                                                                                                                                                                                                                                                                                                                                                                            @php
                                                                                                                                                                                                                                                                                                                                                                                                                                                $todoActivity = $emailActivity->first();
                                                                                                                                                                                                                                                                                                                                                                                                                                                $dueDate = \Carbon\Carbon::parse($todoActivity->due_date);
                                                                                                                                                                                                                                                                                                                                                                                                                                                $daysDiff = $now->diffInDays($dueDate, false);
                                                                                                                                                                                                                                                                                                                                                                                                                                                if ($daysDiff < 0) {
                                                                                                                                                                                                                                                                                                                                                                                                                                                    echo '#d44c59'; // Overdue (red)
                                                                                                                                                                                                                                                                                                                                                                                                                                                } elseif ($daysDiff == 0) {
                                                                                                                                                                                                                                                                                                                                                                                                                                                    echo '#e99d00'; // Today (orange)
                                                                                                                                                                                                                                                                                                                                                                                                                                                } else {
                                                                                                                                                                                                                                                                                                                                                                                                                                                    echo '#28a745'; // Planned (green)
                                                                                                                                                                                                                                                                                                                                                                                                                                                }
                                                                                                                                                                                                                                                                                                                                                                                                                                            @endphp;cursor: pointer;">
                                                                <small>{{ $dueDate->format('d-m-y') }}</small>
                                                            </div>

                                                            <div
                                                                class="o_popover popover mw-100 o-popover--with-arrow bs-popover-bottom o-popover-bottom o-popover--bs d-none">
                                                                <div class="o-mail-ActivityListPopover d-flex flex-column">
                                                                    <div class="overflow-y-auto d-flex flex-column flex-grow-1">

                                                                        <!-- Overdue Section -->
                                                                        <div class="o-mail-ActivityListPopoverItem d-flex flex-column border-bottom py-2">
                                                                            <div class="overflow-auto d-flex align-items-baseline ms-3 me-1">
                                                                                <b class="text-900 me-2 text-truncate flex-grow-1">Overdue
                                                                                    ({{ $overdueCount }})</b>
                                                                            </div>
                                                                            @foreach($overdueActivities as $value)
                                                                                <div class="d-flex align-items-center flex-wrap mx-3 hideDiv"
                                                                                    data-id="{{ $value->id }}">
                                                                                    <span
                                                                                        class="avatar-initials rounded d-flex align-items-center justify-content-center">
                                                                                        {{ strtoupper($lead->getUser->name[0] ?? strtoupper($currentUser->name[0] ?? '')) }}
                                                                                    </span>
                                                                                    <div class="mt-1 flex-grow-1">
                                                                                        &nbsp;&nbsp;<small>{{ $lead->getUser->email }} - Overdue</small>
                                                                                    </div>
                                                                                    <button
                                                                                        class="o-mail-ActivityListPopoverItem-markAsDone btn btn-sm btn-success btn-link"
                                                                                        data-target="#overdue_feedback_{{ $value->id }}"><i
                                                                                            class="fa fa-check"></i></button>
                                                                                    <button
                                                                                        class="o-mail-ActivityListPopoverItem-editbtn btn btn-sm btn-success btn-link"><i
                                                                                            class="fa fa-pencil"></i></button>
                                                                                    <button
                                                                                        class="o-mail-ActivityListPopoverItem-cancel btn btn-sm btn-danger btn-link"><i
                                                                                            class="fa fa-times"></i></button>
                                                                                    <div class="py-2 px-3 d-none" id="overdue_feedback_{{ $value->id }}">
                                                                                        <textarea class="form-control feedback-textarea"
                                                                                            style="min-height: 70px;width:300px" rows="3"
                                                                                            placeholder="Write Feedback"></textarea>
                                                                                        <div class="mt-2">
                                                                                            <button type="button"
                                                                                                class="btn btn-sm btn-primary mx-2 feedback-submit"
                                                                                                data-id="{{ $value->id }}"> Done </button>
                                                                                            <button type="button" class="btn btn-sm btn-link feedback-discard"
                                                                                                data-target="#overdue_feedback_{{ $value->id }}">Discard
                                                                                            </button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            @endforeach
                                                                        </div>

                                                                        <!-- Today Section -->
                                                                        <div class="o-mail-ActivityListPopoverItem d-flex flex-column border-bottom py-2">
                                                                            <div class="overflow-auto d-flex align-items-baseline ms-3 me-1">
                                                                                <b class="text-900 me-2 text-truncate flex-grow-1">Today
                                                                                    ({{ $todayCount }})</b>
                                                                            </div>
                                                                            @foreach($todayActivities as $value)
                                                                                <div class="d-flex align-items-center flex-wrap mx-3 hideDiv"
                                                                                    data-id="{{ $value->id }}">
                                                                                    <span
                                                                                        class="avatar-initials rounded d-flex align-items-center justify-content-center">
                                                                                        {{ strtoupper($lead->getUser->name[0] ?? strtoupper($currentUser->name[0] ?? '')) }}
                                                                                    </span>
                                                                                    <div class="mt-1 flex-grow-1">
                                                                                        &nbsp;&nbsp;<small>{{ $lead->getUser->email }} - Today</small>
                                                                                    </div>
                                                                                    <button
                                                                                        class="o-mail-ActivityListPopoverItem-markAsDone btn btn-sm btn-success btn-link"
                                                                                        data-target="#today_feedback_{{ $value->id }}"><i
                                                                                            class="fa fa-check"></i></button>
                                                                                    <button
                                                                                        class="o-mail-ActivityListPopoverItem-editbtn btn btn-sm btn-success btn-link"><i
                                                                                            class="fa fa-pencil"></i></button>
                                                                                    <button
                                                                                        class="o-mail-ActivityListPopoverItem-cancel btn btn-sm btn-danger btn-link"><i
                                                                                            class="fa fa-times"></i></button>
                                                                                    <div class="py-2 px-3 d-none" id="today_feedback_{{ $value->id }}">
                                                                                        <textarea class="form-control feedback-textarea"
                                                                                            style="min-height: 70px;width:300px" rows="3"
                                                                                            placeholder="Write Feedback"></textarea>
                                                                                        <div class="mt-2">
                                                                                            <button type="button"
                                                                                                class="btn btn-sm btn-primary mx-2 feedback-submit"
                                                                                                data-id="{{ $value->id }}"> Done </button>
                                                                                            <button type="button" class="btn btn-sm btn-link feedback-discard"
                                                                                                data-target="#today_feedback_{{ $value->id }}">Discard </button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            @endforeach
                                                                        </div>

                                                                        <!-- Planned Section -->
                                                                        <div class="o-mail-ActivityListPopoverItem d-flex flex-column border-bottom py-2">
                                                                            <div class="overflow-auto d-flex align-items-baseline ms-3 me-1">
                                                                                <b class="text-900 me-2 text-truncate flex-grow-1">Planned
                                                                                    ({{ $plannedCount }})</b>
                                                                            </div>
                                                                            @foreach($plannedActivities as $value)
                                                                                <div class="d-flex align-items-center flex-wrap mx-3 hideDiv"
                                                                                    data-id="{{ $value->id }}">
                                                                                    <span
                                                                                        class="avatar-initials rounded d-flex align-items-center justify-content-center">
                                                                                        {{ strtoupper($lead->getUser->name[0] ?? strtoupper($currentUser->name[0] ?? '')) }}
                                                                                    </span>
                                                                                    <div class="mt-1 flex-grow-1">
                                                                                        &nbsp;&nbsp;<small>{{ $lead->getUser->email }} - Planned</small>
                                                                                    </div>
                                                                                    <button
                                                                                        class="o-mail-ActivityListPopoverItem-markAsDone btn btn-sm btn-success btn-link"
                                                                                        data-target="#planned_feedback_{{ $value->id }}"><i
                                                                                            class="fa fa-check"></i></button>
                                                                                    <button
                                                                                        class="o-mail-ActivityListPopoverItem-editbtn btn btn-sm btn-success btn-link"><i
                                                                                            class="fa fa-pencil"></i></button>
                                                                                    <button
                                                                                        class="o-mail-ActivityListPopoverItem-cancel btn btn-sm btn-danger btn-link"><i
                                                                                            class="fa fa-times"></i></button>
                                                                                    <div class="py-2 px-3 d-none" id="planned_feedback_{{ $value->id }}">
                                                                                        <textarea class="form-control feedback-textarea"
                                                                                            style="min-height: 70px;width:300px" rows="3"
                                                                                            placeholder="Write Feedback"></textarea>
                                                                                        <div class="mt-2">
                                                                                            <button type="button"
                                                                                                class="btn btn-sm btn-primary mx-2 feedback-submit"
                                                                                                data-id="{{ $value->id }}"> Done </button>
                                                                                            <button type="button" class="btn btn-sm btn-link feedback-discard"
                                                                                                data-target="#planned_feedback_{{ $value->id }}">Discard
                                                                                            </button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            @endforeach
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="popover-arrow end-auto"></div>
                                                            </div>
                                        @endif
                                    </td>

                                    <td class="o_activity_summary_cell" data-id="{{$lead->lead_id}}" data-activity_type="to-do">
                                        @php
                                            $callActivity = $leadActivities->where('activity_type', 'call')->where('status', 0)->sortBy('due_date');

                                            // Get current date
                                            $now = \Carbon\Carbon::now();
                                            $startOfToday = $now->copy()->startOfDay();

                                            // Calculate the counts for each status
                                            $overdueActivities = $callActivity->filter(function ($activity) use ($startOfToday) {
                                                $dueDate = \Carbon\Carbon::parse($activity->due_date);
                                                return $dueDate->lessThan($startOfToday);
                                            });


                                            $todayActivities = $callActivity->filter(function ($activity) use ($now) {
                                                $dueDate = \Carbon\Carbon::parse($activity->due_date); // Ensure due_date is a Carbon instance
                                                return $now->isSameDay($dueDate); // Today
                                            });

                                            $plannedActivities = $callActivity->filter(function ($activity) use ($now) {
                                                $dueDate = \Carbon\Carbon::parse($activity->due_date); // Ensure due_date is a Carbon instance
                                                return $now->lt($dueDate); // Planned
                                            });

                                            $overdueCount = $overdueActivities->count();
                                            $todayCount = $todayActivities->count();
                                            $plannedCount = $plannedActivities->count();
                                        @endphp

                                        @if($callActivity->isNotEmpty())
                                                            <div class="text-center text-white"
                                                                style="background-color:
                                                                                                                                                                                                                                                                                                                                                                                                                                            @php
                                                                                                                                                                                                                                                                                                                                                                                                                                                $todoActivity = $callActivity->first();
                                                                                                                                                                                                                                                                                                                                                                                                                                                $dueDate = \Carbon\Carbon::parse($todoActivity->due_date);
                                                                                                                                                                                                                                                                                                                                                                                                                                                $daysDiff = $now->diffInDays($dueDate, false);
                                                                                                                                                                                                                                                                                                                                                                                                                                                if ($daysDiff < 0) {
                                                                                                                                                                                                                                                                                                                                                                                                                                                    echo '#d44c59'; // Overdue (red)
                                                                                                                                                                                                                                                                                                                                                                                                                                                } elseif ($daysDiff == 0) {
                                                                                                                                                                                                                                                                                                                                                                                                                                                    echo '#e99d00'; // Today (orange)
                                                                                                                                                                                                                                                                                                                                                                                                                                                } else {
                                                                                                                                                                                                                                                                                                                                                                                                                                                    echo '#28a745'; // Planned (green)
                                                                                                                                                                                                                                                                                                                                                                                                                                                }
                                                                                                                                                                                                                                                                                                                                                                                                                                            @endphp;cursor: pointer;">
                                                                <small>{{ $dueDate->format('d-m-y') }}</small>
                                                            </div>

                                                            <div
                                                                class="o_popover popover mw-100 o-popover--with-arrow bs-popover-bottom o-popover-bottom o-popover--bs d-none">
                                                                <div class="o-mail-ActivityListPopover d-flex flex-column">
                                                                    <div class="overflow-y-auto d-flex flex-column flex-grow-1">

                                                                        <!-- Overdue Section -->
                                                                        <div class="o-mail-ActivityListPopoverItem d-flex flex-column border-bottom py-2">
                                                                            <div class="overflow-auto d-flex align-items-baseline ms-3 me-1">
                                                                                <b class="text-900 me-2 text-truncate flex-grow-1">Overdue
                                                                                    ({{ $overdueCount }})</b>
                                                                            </div>
                                                                            @foreach($overdueActivities as $value)
                                                                                <div class="d-flex align-items-center flex-wrap mx-3 hideDiv"
                                                                                    data-id="{{ $value->id }}">
                                                                                    <span
                                                                                        class="avatar-initials rounded d-flex align-items-center justify-content-center">
                                                                                        {{ strtoupper($lead->getUser->name[0] ?? strtoupper($currentUser->name[0] ?? '')) }}
                                                                                    </span>
                                                                                    <div class="mt-1 flex-grow-1">
                                                                                        &nbsp;&nbsp;<small>{{ $lead->getUser->email }} - Overdue</small>
                                                                                    </div>
                                                                                    <button
                                                                                        class="o-mail-ActivityListPopoverItem-markAsDone btn btn-sm btn-success btn-link"
                                                                                        data-target="#overdue_feedback_{{ $value->id }}"><i
                                                                                            class="fa fa-check"></i></button>
                                                                                    <button
                                                                                        class="o-mail-ActivityListPopoverItem-editbtn btn btn-sm btn-success btn-link"><i
                                                                                            class="fa fa-pencil"></i></button>
                                                                                    <button
                                                                                        class="o-mail-ActivityListPopoverItem-cancel btn btn-sm btn-danger btn-link"><i
                                                                                            class="fa fa-times"></i></button>
                                                                                    <div class="py-2 px-3 d-none" id="overdue_feedback_{{ $value->id }}">
                                                                                        <textarea class="form-control feedback-textarea"
                                                                                            style="min-height: 70px;width:300px" rows="3"
                                                                                            placeholder="Write Feedback"></textarea>
                                                                                        <div class="mt-2">
                                                                                            <button type="button"
                                                                                                class="btn btn-sm btn-primary mx-2 feedback-submit"
                                                                                                data-id="{{ $value->id }}"> Done </button>
                                                                                            <button type="button" class="btn btn-sm btn-link feedback-discard"
                                                                                                data-target="#overdue_feedback_{{ $value->id }}">Discard
                                                                                            </button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            @endforeach
                                                                        </div>

                                                                        <!-- Today Section -->
                                                                        <div class="o-mail-ActivityListPopoverItem d-flex flex-column border-bottom py-2">
                                                                            <div class="overflow-auto d-flex align-items-baseline ms-3 me-1">
                                                                                <b class="text-900 me-2 text-truncate flex-grow-1">Today
                                                                                    ({{ $todayCount }})</b>
                                                                            </div>
                                                                            @foreach($todayActivities as $value)
                                                                                <div class="d-flex align-items-center flex-wrap mx-3 hideDiv"
                                                                                    data-id="{{ $value->id }}">
                                                                                    <span
                                                                                        class="avatar-initials rounded d-flex align-items-center justify-content-center">
                                                                                        {{ strtoupper($lead->getUser->name[0] ?? strtoupper($currentUser->name[0] ?? '')) }}
                                                                                    </span>
                                                                                    <div class="mt-1 flex-grow-1">
                                                                                        &nbsp;&nbsp;<small>{{ $lead->getUser->email }} - Today</small>
                                                                                    </div>
                                                                                    <button
                                                                                        class="o-mail-ActivityListPopoverItem-markAsDone btn btn-sm btn-success btn-link"
                                                                                        data-target="#today_feedback_{{ $value->id }}"><i
                                                                                            class="fa fa-check"></i></button>
                                                                                    <button
                                                                                        class="o-mail-ActivityListPopoverItem-editbtn btn btn-sm btn-success btn-link"><i
                                                                                            class="fa fa-pencil"></i></button>
                                                                                    <button
                                                                                        class="o-mail-ActivityListPopoverItem-cancel btn btn-sm btn-danger btn-link"><i
                                                                                            class="fa fa-times"></i></button>
                                                                                    <div class="py-2 px-3 d-none" id="today_feedback_{{ $value->id }}">
                                                                                        <textarea class="form-control feedback-textarea"
                                                                                            style="min-height: 70px;width:300px" rows="3"
                                                                                            placeholder="Write Feedback"></textarea>
                                                                                        <div class="mt-2">
                                                                                            <button type="button"
                                                                                                class="btn btn-sm btn-primary mx-2 feedback-submit"
                                                                                                data-id="{{ $value->id }}"> Done </button>
                                                                                            <button type="button" class="btn btn-sm btn-link feedback-discard"
                                                                                                data-target="#today_feedback_{{ $value->id }}">Discard </button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            @endforeach
                                                                        </div>

                                                                        <!-- Planned Section -->
                                                                        <div class="o-mail-ActivityListPopoverItem d-flex flex-column border-bottom py-2">
                                                                            <div class="overflow-auto d-flex align-items-baseline ms-3 me-1">
                                                                                <b class="text-900 me-2 text-truncate flex-grow-1">Planned
                                                                                    ({{ $plannedCount }})</b>
                                                                            </div>
                                                                            @foreach($plannedActivities as $value)
                                                                                <div class="d-flex align-items-center flex-wrap mx-3 hideDiv"
                                                                                    data-id="{{ $value->id }}">
                                                                                    <span
                                                                                        class="avatar-initials rounded d-flex align-items-center justify-content-center">
                                                                                        {{ strtoupper($lead->getUser->name[0] ?? strtoupper($currentUser->name[0] ?? '')) }}
                                                                                    </span>
                                                                                    <div class="mt-1 flex-grow-1">
                                                                                        &nbsp;&nbsp;<small>{{ $lead->getUser->email }} - Planned</small>
                                                                                    </div>
                                                                                    <button
                                                                                        class="o-mail-ActivityListPopoverItem-markAsDone btn btn-sm btn-success btn-link"
                                                                                        data-target="#planned_feedback_{{ $value->id }}"><i
                                                                                            class="fa fa-check"></i></button>
                                                                                    <button
                                                                                        class="o-mail-ActivityListPopoverItem-editbtn btn btn-sm btn-success btn-link"><i
                                                                                            class="fa fa-pencil"></i></button>
                                                                                    <button
                                                                                        class="o-mail-ActivityListPopoverItem-cancel btn btn-sm btn-danger btn-link"><i
                                                                                            class="fa fa-times"></i></button>
                                                                                    <div class="py-2 px-3 d-none" id="planned_feedback_{{ $value->id }}">
                                                                                        <textarea class="form-control feedback-textarea"
                                                                                            style="min-height: 70px;width:300px" rows="3"
                                                                                            placeholder="Write Feedback"></textarea>
                                                                                        <div class="mt-2">
                                                                                            <button type="button"
                                                                                                class="btn btn-sm btn-primary mx-2 feedback-submit"
                                                                                                data-id="{{ $value->id }}"> Done </button>
                                                                                            <button type="button" class="btn btn-sm btn-link feedback-discard"
                                                                                                data-target="#planned_feedback_{{ $value->id }}">Discard
                                                                                            </button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            @endforeach
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="popover-arrow end-auto"></div>
                                                            </div>
                                        @endif
                                    </td>

                                    <td class="o_activity_summary_cell" data-id="{{$lead->lead_id}}" data-activity_type="to-do">
                                        @php
                                            $meetingActivity = $leadActivities->where('activity_type', 'meeting')->where('status', 0)->sortBy('due_date');

                                            // Get current date
                                            $now = \Carbon\Carbon::now();
                                            $startOfToday = $now->copy()->startOfDay();

                                            // Calculate the counts for each status
                                            $overdueActivities = $meetingActivity->filter(function ($activity) use ($startOfToday) {
                                                $dueDate = \Carbon\Carbon::parse($activity->due_date);
                                                return $dueDate->lessThan($startOfToday);
                                            });


                                            $todayActivities = $meetingActivity->filter(function ($activity) use ($now) {
                                                $dueDate = \Carbon\Carbon::parse($activity->due_date); // Ensure due_date is a Carbon instance
                                                return $now->isSameDay($dueDate); // Today
                                            });

                                            $plannedActivities = $meetingActivity->filter(function ($activity) use ($now) {
                                                $dueDate = \Carbon\Carbon::parse($activity->due_date); // Ensure due_date is a Carbon instance
                                                return $now->lt($dueDate); // Planned
                                            });

                                            $overdueCount = $overdueActivities->count();
                                            $todayCount = $todayActivities->count();
                                            $plannedCount = $plannedActivities->count();
                                        @endphp

                                        @if($meetingActivity->isNotEmpty())
                                                            <div class="text-center text-white"
                                                                style="background-color:
                                                                                                                                                                                                                                                                                                                                                                                                                                            @php
                                                                                                                                                                                                                                                                                                                                                                                                                                                $todoActivity = $meetingActivity->first();
                                                                                                                                                                                                                                                                                                                                                                                                                                                $dueDate = \Carbon\Carbon::parse($todoActivity->due_date);
                                                                                                                                                                                                                                                                                                                                                                                                                                                $daysDiff = $now->diffInDays($dueDate, false);
                                                                                                                                                                                                                                                                                                                                                                                                                                                if ($daysDiff < 0) {
                                                                                                                                                                                                                                                                                                                                                                                                                                                    echo '#d44c59'; // Overdue (red)
                                                                                                                                                                                                                                                                                                                                                                                                                                                } elseif ($daysDiff == 0) {
                                                                                                                                                                                                                                                                                                                                                                                                                                                    echo '#e99d00'; // Today (orange)
                                                                                                                                                                                                                                                                                                                                                                                                                                                } else {
                                                                                                                                                                                                                                                                                                                                                                                                                                                    echo '#28a745'; // Planned (green)
                                                                                                                                                                                                                                                                                                                                                                                                                                                }
                                                                                                                                                                                                                                                                                                                                                                                                                                            @endphp;cursor: pointer;">
                                                                <small>{{ $dueDate->format('d-m-y') }}</small>
                                                            </div>

                                                            <div
                                                                class="o_popover popover mw-100 o-popover--with-arrow bs-popover-bottom o-popover-bottom o-popover--bs d-none">
                                                                <div class="o-mail-ActivityListPopover d-flex flex-column">
                                                                    <div class="overflow-y-auto d-flex flex-column flex-grow-1">

                                                                        <!-- Overdue Section -->
                                                                        <div class="o-mail-ActivityListPopoverItem d-flex flex-column border-bottom py-2">
                                                                            <div class="overflow-auto d-flex align-items-baseline ms-3 me-1">
                                                                                <b class="text-900 me-2 text-truncate flex-grow-1">Overdue
                                                                                    ({{ $overdueCount }})</b>
                                                                            </div>
                                                                            @foreach($overdueActivities as $value)
                                                                                <div class="d-flex align-items-center flex-wrap mx-3 hideDiv"
                                                                                    data-id="{{ $value->id }}">
                                                                                    <span
                                                                                        class="avatar-initials rounded d-flex align-items-center justify-content-center">
                                                                                        {{ strtoupper($lead->getUser->name[0] ?? strtoupper($currentUser->name[0] ?? '')) }}
                                                                                    </span>
                                                                                    <div class="mt-1 flex-grow-1">
                                                                                        &nbsp;&nbsp;<small>{{ $lead->getUser->email }} - Overdue</small>
                                                                                    </div>
                                                                                    <button
                                                                                        class="o-mail-ActivityListPopoverItem-markAsDone btn btn-sm btn-success btn-link"
                                                                                        data-target="#overdue_feedback_{{ $value->id }}"><i
                                                                                            class="fa fa-check"></i></button>
                                                                                    <button
                                                                                        class="o-mail-ActivityListPopoverItem-editbtn btn btn-sm btn-success btn-link"><i
                                                                                            class="fa fa-pencil"></i></button>
                                                                                    <button
                                                                                        class="o-mail-ActivityListPopoverItem-cancel btn btn-sm btn-danger btn-link"><i
                                                                                            class="fa fa-times"></i></button>
                                                                                    <div class="py-2 px-3 d-none" id="overdue_feedback_{{ $value->id }}">
                                                                                        <textarea class="form-control feedback-textarea"
                                                                                            style="min-height: 70px;width:300px" rows="3"
                                                                                            placeholder="Write Feedback"></textarea>
                                                                                        <div class="mt-2">
                                                                                            <button type="button"
                                                                                                class="btn btn-sm btn-primary mx-2 feedback-submit"
                                                                                                data-id="{{ $value->id }}"> Done </button>
                                                                                            <button type="button" class="btn btn-sm btn-link feedback-discard"
                                                                                                data-target="#overdue_feedback_{{ $value->id }}">Discard
                                                                                            </button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            @endforeach
                                                                        </div>

                                                                        <!-- Today Section -->
                                                                        <div class="o-mail-ActivityListPopoverItem d-flex flex-column border-bottom py-2">
                                                                            <div class="overflow-auto d-flex align-items-baseline ms-3 me-1">
                                                                                <b class="text-900 me-2 text-truncate flex-grow-1">Today
                                                                                    ({{ $todayCount }})</b>
                                                                            </div>
                                                                            @foreach($todayActivities as $value)
                                                                                <div class="d-flex align-items-center flex-wrap mx-3 hideDiv"
                                                                                    data-id="{{ $value->id }}">
                                                                                    <span
                                                                                        class="avatar-initials rounded d-flex align-items-center justify-content-center">
                                                                                        {{ strtoupper($lead->getUser->name[0] ?? strtoupper($currentUser->name[0] ?? '')) }}
                                                                                    </span>
                                                                                    <div class="mt-1 flex-grow-1">
                                                                                        &nbsp;&nbsp;<small>{{ $lead->getUser->email }} - Today</small>
                                                                                    </div>
                                                                                    <button
                                                                                        class="o-mail-ActivityListPopoverItem-markAsDone btn btn-sm btn-success btn-link"
                                                                                        data-target="#today_feedback_{{ $value->id }}"><i
                                                                                            class="fa fa-check"></i></button>
                                                                                    <button
                                                                                        class="o-mail-ActivityListPopoverItem-editbtn btn btn-sm btn-success btn-link"><i
                                                                                            class="fa fa-pencil"></i></button>
                                                                                    <button
                                                                                        class="o-mail-ActivityListPopoverItem-cancel btn btn-sm btn-danger btn-link"><i
                                                                                            class="fa fa-times"></i></button>
                                                                                    <div class="py-2 px-3 d-none" id="today_feedback_{{ $value->id }}">
                                                                                        <textarea class="form-control feedback-textarea"
                                                                                            style="min-height: 70px;width:300px" rows="3"
                                                                                            placeholder="Write Feedback"></textarea>
                                                                                        <div class="mt-2">
                                                                                            <button type="button"
                                                                                                class="btn btn-sm btn-primary mx-2 feedback-submit"
                                                                                                data-id="{{ $value->id }}"> Done </button>
                                                                                            <button type="button" class="btn btn-sm btn-link feedback-discard"
                                                                                                data-target="#today_feedback_{{ $value->id }}">Discard </button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            @endforeach
                                                                        </div>

                                                                        <!-- Planned Section -->
                                                                        <div class="o-mail-ActivityListPopoverItem d-flex flex-column border-bottom py-2">
                                                                            <div class="overflow-auto d-flex align-items-baseline ms-3 me-1">
                                                                                <b class="text-900 me-2 text-truncate flex-grow-1">Planned
                                                                                    ({{ $plannedCount }})</b>
                                                                            </div>
                                                                            @foreach($plannedActivities as $value)
                                                                                <div class="d-flex align-items-center flex-wrap mx-3 hideDiv"
                                                                                    data-id="{{ $value->id }}">
                                                                                    <span
                                                                                        class="avatar-initials rounded d-flex align-items-center justify-content-center">
                                                                                        {{ strtoupper($lead->getUser->name[0] ?? strtoupper($currentUser->name[0] ?? '')) }}
                                                                                    </span>
                                                                                    <div class="mt-1 flex-grow-1">
                                                                                        &nbsp;&nbsp;<small>{{ $lead->getUser->email }} - Planned</small>
                                                                                    </div>
                                                                                    <button
                                                                                        class="o-mail-ActivityListPopoverItem-markAsDone btn btn-sm btn-success btn-link"
                                                                                        data-target="#planned_feedback_{{ $value->id }}"><i
                                                                                            class="fa fa-check"></i></button>
                                                                                    <button
                                                                                        class="o-mail-ActivityListPopoverItem-editbtn btn btn-sm btn-success btn-link"><i
                                                                                            class="fa fa-pencil"></i></button>
                                                                                    <button
                                                                                        class="o-mail-ActivityListPopoverItem-cancel btn btn-sm btn-danger btn-link"><i
                                                                                            class="fa fa-times"></i></button>
                                                                                    <div class="py-2 px-3 d-none" id="planned_feedback_{{ $value->id }}">
                                                                                        <textarea class="form-control feedback-textarea"
                                                                                            style="min-height: 70px;width:300px" rows="3"
                                                                                            placeholder="Write Feedback"></textarea>
                                                                                        <div class="mt-2">
                                                                                            <button type="button"
                                                                                                class="btn btn-sm btn-primary mx-2 feedback-submit"
                                                                                                data-id="{{ $value->id }}"> Done </button>
                                                                                            <button type="button" class="btn btn-sm btn-link feedback-discard"
                                                                                                data-target="#planned_feedback_{{ $value->id }}">Discard
                                                                                            </button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            @endforeach
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="popover-arrow end-auto"></div>
                                                            </div>
                                        @endif
                                    </td>

                                    <td class="o_activity_summary_cell" data-id="{{$lead->lead_id}}" data-activity_type="to-do">
                                        @php
                                            $todoActivities = $leadActivities->where('activity_type', 'to-do')->where('status', 0)->sortBy('due_date');

                                            // Get current date
                                            $now = \Carbon\Carbon::now();
                                            $startOfToday = $now->copy()->startOfDay();

                                            // Calculate the counts for each status
                                            $overdueActivities = $todoActivities->filter(function ($activity) use ($startOfToday) {
                                                $dueDate = \Carbon\Carbon::parse($activity->due_date);
                                                return $dueDate->lessThan($startOfToday);
                                            });


                                            $todayActivities = $todoActivities->filter(function ($activity) use ($now) {
                                                $dueDate = \Carbon\Carbon::parse($activity->due_date); // Ensure due_date is a Carbon instance
                                                return $now->isSameDay($dueDate); // Today
                                            });

                                            $plannedActivities = $todoActivities->filter(function ($activity) use ($now) {
                                                $dueDate = \Carbon\Carbon::parse($activity->due_date); // Ensure due_date is a Carbon instance
                                                return $now->lt($dueDate); // Planned
                                            });

                                            $overdueCount = $overdueActivities->count();
                                            $todayCount = $todayActivities->count();
                                            $plannedCount = $plannedActivities->count();
                                        @endphp

                                        @if($todoActivities->isNotEmpty())
                                                            <div class="text-center text-white"
                                                                style="background-color:
                                                                                                                                                                                                                                                                                                                                                                                                                                            @php
                                                                                                                                                                                                                                                                                                                                                                                                                                                $todoActivity = $todoActivities->first();
                                                                                                                                                                                                                                                                                                                                                                                                                                                $dueDate = \Carbon\Carbon::parse($todoActivity->due_date);
                                                                                                                                                                                                                                                                                                                                                                                                                                                $daysDiff = $now->diffInDays($dueDate, false);
                                                                                                                                                                                                                                                                                                                                                                                                                                                if ($daysDiff < 0) {
                                                                                                                                                                                                                                                                                                                                                                                                                                                    echo '#d44c59'; // Overdue (red)
                                                                                                                                                                                                                                                                                                                                                                                                                                                } elseif ($daysDiff == 0) {
                                                                                                                                                                                                                                                                                                                                                                                                                                                    echo '#e99d00'; // Today (orange)
                                                                                                                                                                                                                                                                                                                                                                                                                                                } else {
                                                                                                                                                                                                                                                                                                                                                                                                                                                    echo '#28a745'; // Planned (green)
                                                                                                                                                                                                                                                                                                                                                                                                                                                }
                                                                                                                                                                                                                                                                                                                                                                                                                                            @endphp;cursor: pointer;">
                                                                <small>{{ $dueDate->format('d-m-y') }}</small>
                                                            </div>

                                                            <div
                                                                class="o_popover popover mw-100 o-popover--with-arrow bs-popover-bottom o-popover-bottom o-popover--bs d-none">
                                                                <div class="o-mail-ActivityListPopover d-flex flex-column">
                                                                    <div class="overflow-y-auto d-flex flex-column flex-grow-1">

                                                                        <!-- Overdue Section -->
                                                                        <div class="o-mail-ActivityListPopoverItem d-flex flex-column border-bottom py-2">
                                                                            <div class="overflow-auto d-flex align-items-baseline ms-3 me-1">
                                                                                <b class="text-900 me-2 text-truncate flex-grow-1">Overdue
                                                                                    ({{ $overdueCount }})</b>
                                                                            </div>
                                                                            @foreach($overdueActivities as $value)
                                                                                <div class="d-flex align-items-center flex-wrap mx-3 hideDiv"
                                                                                    data-id="{{ $value->id }}">
                                                                                    <span
                                                                                        class="avatar-initials rounded d-flex align-items-center justify-content-center">
                                                                                        {{ strtoupper($lead->getUser->name[0] ?? strtoupper($currentUser->name[0] ?? '')) }}
                                                                                    </span>
                                                                                    <div class="mt-1 flex-grow-1">
                                                                                        &nbsp;&nbsp;<small>{{ $lead->getUser->email }} - Overdue</small>
                                                                                    </div>
                                                                                    <button
                                                                                        class="o-mail-ActivityListPopoverItem-markAsDone btn btn-sm btn-success btn-link"
                                                                                        data-target="#overdue_feedback_{{ $value->id }}"><i
                                                                                            class="fa fa-check"></i></button>
                                                                                    <button
                                                                                        class="o-mail-ActivityListPopoverItem-editbtn btn btn-sm btn-success btn-link"><i
                                                                                            class="fa fa-pencil"></i></button>
                                                                                    <button
                                                                                        class="o-mail-ActivityListPopoverItem-cancel btn btn-sm btn-danger btn-link"><i
                                                                                            class="fa fa-times"></i></button>
                                                                                    <div class="py-2 px-3 d-none" id="overdue_feedback_{{ $value->id }}">
                                                                                        <textarea class="form-control feedback-textarea"
                                                                                            style="min-height: 70px;width:300px" rows="3"
                                                                                            placeholder="Write Feedback"></textarea>
                                                                                        <div class="mt-2">
                                                                                            <button type="button"
                                                                                                class="btn btn-sm btn-primary mx-2 feedback-submit"
                                                                                                data-id="{{ $value->id }}"> Done </button>
                                                                                            <button type="button" class="btn btn-sm btn-link feedback-discard"
                                                                                                data-target="#overdue_feedback_{{ $value->id }}">Discard
                                                                                            </button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            @endforeach
                                                                        </div>

                                                                        <!-- Today Section -->
                                                                        <div class="o-mail-ActivityListPopoverItem d-flex flex-column border-bottom py-2">
                                                                            <div class="overflow-auto d-flex align-items-baseline ms-3 me-1">
                                                                                <b class="text-900 me-2 text-truncate flex-grow-1">Today
                                                                                    ({{ $todayCount }})</b>
                                                                            </div>
                                                                            @foreach($todayActivities as $value)
                                                                                <div class="d-flex align-items-center flex-wrap mx-3 hideDiv"
                                                                                    data-id="{{ $value->id }}">
                                                                                    <span
                                                                                        class="avatar-initials rounded d-flex align-items-center justify-content-center">
                                                                                        {{ strtoupper($lead->getUser->name[0] ?? strtoupper($currentUser->name[0] ?? '')) }}
                                                                                    </span>
                                                                                    <div class="mt-1 flex-grow-1">
                                                                                        &nbsp;&nbsp;<small>{{ $lead->getUser->email }} - Today</small>
                                                                                    </div>
                                                                                    <button
                                                                                        class="o-mail-ActivityListPopoverItem-markAsDone btn btn-sm btn-success btn-link"
                                                                                        data-target="#today_feedback_{{ $value->id }}"><i
                                                                                            class="fa fa-check"></i></button>
                                                                                    <button
                                                                                        class="o-mail-ActivityListPopoverItem-editbtn btn btn-sm btn-success btn-link"><i
                                                                                            class="fa fa-pencil"></i></button>
                                                                                    <button
                                                                                        class="o-mail-ActivityListPopoverItem-cancel btn btn-sm btn-danger btn-link"><i
                                                                                            class="fa fa-times"></i></button>
                                                                                    <div class="py-2 px-3 d-none" id="today_feedback_{{ $value->id }}">
                                                                                        <textarea class="form-control feedback-textarea"
                                                                                            style="min-height: 70px;width:300px" rows="3"
                                                                                            placeholder="Write Feedback"></textarea>
                                                                                        <div class="mt-2">
                                                                                            <button type="button"
                                                                                                class="btn btn-sm btn-primary mx-2 feedback-submit"
                                                                                                data-id="{{ $value->id }}"> Done </button>
                                                                                            <button type="button" class="btn btn-sm btn-link feedback-discard"
                                                                                                data-target="#today_feedback_{{ $value->id }}">Discard </button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            @endforeach
                                                                        </div>

                                                                        <!-- Planned Section -->
                                                                        <div class="o-mail-ActivityListPopoverItem d-flex flex-column border-bottom py-2">
                                                                            <div class="overflow-auto d-flex align-items-baseline ms-3 me-1">
                                                                                <b class="text-900 me-2 text-truncate flex-grow-1">Planned
                                                                                    ({{ $plannedCount }})</b>
                                                                            </div>
                                                                            @foreach($plannedActivities as $value)
                                                                                <div class="d-flex align-items-center flex-wrap mx-3 hideDiv"
                                                                                    data-id="{{ $value->id }}">
                                                                                    <span
                                                                                        class="avatar-initials rounded d-flex align-items-center justify-content-center">
                                                                                        {{ strtoupper($lead->getUser->name[0] ?? strtoupper($currentUser->name[0] ?? '')) }}
                                                                                    </span>
                                                                                    <div class="mt-1 flex-grow-1">
                                                                                        &nbsp;&nbsp;<small>{{ $lead->getUser->email }} - Planned</small>
                                                                                    </div>
                                                                                    <button
                                                                                        class="o-mail-ActivityListPopoverItem-markAsDone btn btn-sm btn-success btn-link"
                                                                                        data-target="#planned_feedback_{{ $value->id }}"><i
                                                                                            class="fa fa-check"></i></button>
                                                                                    <button
                                                                                        class="o-mail-ActivityListPopoverItem-editbtn btn btn-sm btn-success btn-link"><i
                                                                                            class="fa fa-pencil"></i></button>
                                                                                    <button
                                                                                        class="o-mail-ActivityListPopoverItem-cancel btn btn-sm btn-danger btn-link"><i
                                                                                            class="fa fa-times"></i></button>
                                                                                    <div class="py-2 px-3 d-none" id="planned_feedback_{{ $value->id }}">
                                                                                        <textarea class="form-control feedback-textarea"
                                                                                            style="min-height: 70px;width:300px" rows="3"
                                                                                            placeholder="Write Feedback"></textarea>
                                                                                        <div class="mt-2">
                                                                                            <button type="button"
                                                                                                class="btn btn-sm btn-primary mx-2 feedback-submit"
                                                                                                data-id="{{ $value->id }}"> Done </button>
                                                                                            <button type="button" class="btn btn-sm btn-link feedback-discard"
                                                                                                data-target="#planned_feedback_{{ $value->id }}">Discard
                                                                                            </button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            @endforeach
                                                                        </div>
                                                                    </div>
                                                                    <div class="popover-arrow end-auto"></div>
                                                                </div>
                                        @endif
                                    </td>


                                    <td class="o_activity_summary_cell" data-id="{{$lead->lead_id}}" data-activity_type="to-do">
                                        @php
                                            $uploadDocumentActivity = $leadActivities->where('activity_type', 'upload_document')->where('status', 0)->sortBy('due_date');

                                            // Get current date
                                            $now = \Carbon\Carbon::now();
                                            $startOfToday = $now->copy()->startOfDay();

                                            // Calculate the counts for each status
                                            $overdueActivities = $uploadDocumentActivity->filter(function ($activity) use ($startOfToday) {
                                                $dueDate = \Carbon\Carbon::parse($activity->due_date);
                                                return $dueDate->lessThan($startOfToday);
                                            });


                                            $todayActivities = $uploadDocumentActivity->filter(function ($activity) use ($now) {
                                                $dueDate = \Carbon\Carbon::parse($activity->due_date); // Ensure due_date is a Carbon instance
                                                return $now->isSameDay($dueDate); // Today
                                            });

                                            $plannedActivities = $uploadDocumentActivity->filter(function ($activity) use ($now) {
                                                $dueDate = \Carbon\Carbon::parse($activity->due_date); // Ensure due_date is a Carbon instance
                                                return $now->lt($dueDate); // Planned
                                            });

                                            $overdueCount = $overdueActivities->count();
                                            $todayCount = $todayActivities->count();
                                            $plannedCount = $plannedActivities->count();
                                        @endphp

                                        @if($uploadDocumentActivity->isNotEmpty())
                                                            <div class="text-center text-white"
                                                                style="background-color:
                                                                                                                                                                                                                                                                                                                                                                                                                                            @php
                                                                                                                                                                                                                                                                                                                                                                                                                                                $todoActivity = $uploadDocumentActivity->first();
                                                                                                                                                                                                                                                                                                                                                                                                                                                $dueDate = \Carbon\Carbon::parse($todoActivity->due_date);
                                                                                                                                                                                                                                                                                                                                                                                                                                                $daysDiff = $now->diffInDays($dueDate, false);
                                                                                                                                                                                                                                                                                                                                                                                                                                                if ($daysDiff < 0) {
                                                                                                                                                                                                                                                                                                                                                                                                                                                    echo '#d44c59'; // Overdue (red)
                                                                                                                                                                                                                                                                                                                                                                                                                                                } elseif ($daysDiff == 0) {
                                                                                                                                                                                                                                                                                                                                                                                                                                                    echo '#e99d00'; // Today (orange)
                                                                                                                                                                                                                                                                                                                                                                                                                                                } else {
                                                                                                                                                                                                                                                                                                                                                                                                                                                    echo '#28a745'; // Planned (green)
                                                                                                                                                                                                                                                                                                                                                                                                                                                }
                                                                                                                                                                                                                                                                                                                                                                                                                                            @endphp;cursor: pointer;">
                                                                <small>{{ $dueDate->format('d-m-y') }}</small>
                                                            </div>

                                                            <div
                                                                class="o_popover popover mw-100 o-popover--with-arrow bs-popover-bottom o-popover-bottom o-popover--bs d-none">
                                                                <div class="o-mail-ActivityListPopover d-flex flex-column">
                                                                    <div class="overflow-y-auto d-flex flex-column flex-grow-1">

                                                                        <!-- Overdue Section -->
                                                                        <div class="o-mail-ActivityListPopoverItem d-flex flex-column border-bottom py-2">
                                                                            <div class="overflow-auto d-flex align-items-baseline ms-3 me-1">
                                                                                <b class="text-900 me-2 text-truncate flex-grow-1">Overdue
                                                                                    ({{ $overdueCount }})</b>
                                                                            </div>
                                                                            @foreach($overdueActivities as $value)
                                                                                <div class="d-flex align-items-center flex-wrap mx-3 hideDiv"
                                                                                    data-id="{{ $value->id }}">
                                                                                    <span
                                                                                        class="avatar-initials rounded d-flex align-items-center justify-content-center">
                                                                                        {{ strtoupper($lead->getUser->name[0] ?? strtoupper($currentUser->name[0] ?? '')) }}
                                                                                    </span>
                                                                                    <div class="mt-1 flex-grow-1">
                                                                                        &nbsp;&nbsp;<small>{{ $lead->getUser->email }} - Overdue</small>
                                                                                    </div>
                                                                                    <input type="file" class="d-none" id="upload_overdue_file_{{ $value->id }}"
                                                                                        accept="*"
                                                                                        onchange="uploadFile('upload_overdue_file_{{ $value->id }}', {{ $value->id }})">
                                                                                    <button
                                                                                        class="o-mail-ActivityListPopoverItem-upload btn btn-sm btn-success btn-link"
                                                                                        onclick="document.getElementById('upload_overdue_file_{{ $value->id }}').click();">
                                                                                        <i class="fa fa-upload"></i>
                                                                                    </button>
                                                                                    <button
                                                                                        class="o-mail-ActivityListPopoverItem-editbtn btn btn-sm btn-success btn-link"><i
                                                                                            class="fa fa-pencil"></i></button>
                                                                                    <button
                                                                                        class="o-mail-ActivityListPopoverItem-cancel btn btn-sm btn-danger btn-link"><i
                                                                                            class="fa fa-times"></i></button>
                                                                                </div>
                                                                            @endforeach
                                                                        </div>

                                                                        <!-- Today Section -->
                                                                        <div class="o-mail-ActivityListPopoverItem d-flex flex-column border-bottom py-2">
                                                                            <div class="overflow-auto d-flex align-items-baseline ms-3 me-1">
                                                                                <b class="text-900 me-2 text-truncate flex-grow-1">Today
                                                                                    ({{ $todayCount }})</b>
                                                                            </div>
                                                                            @foreach($todayActivities as $value)
                                                                                <div class="d-flex align-items-center flex-wrap mx-3 hideDiv"
                                                                                    data-id="{{ $value->id }}">
                                                                                    <span
                                                                                        class="avatar-initials rounded d-flex align-items-center justify-content-center">
                                                                                        {{ strtoupper($lead->getUser->name[0] ?? strtoupper($currentUser->name[0] ?? '')) }}
                                                                                    </span>
                                                                                    <div class="mt-1 flex-grow-1">
                                                                                        &nbsp;&nbsp;<small>{{ $lead->getUser->email }} - Today</small>
                                                                                    </div>
                                                                                    <input type="file" class="d-none" id="upload_today_file_{{ $value->id }}"
                                                                                        accept="*"
                                                                                        onchange="uploadFile('upload_today_file_{{ $value->id }}', {{ $value->id }})">
                                                                                    <button
                                                                                        class="o-mail-ActivityListPopoverItem-upload btn btn-sm btn-success btn-link"
                                                                                        onclick="document.getElementById('upload_today_file_{{ $value->id }}').click();">
                                                                                        <i class="fa fa-upload"></i>
                                                                                    </button>
                                                                                    <button
                                                                                        class="o-mail-ActivityListPopoverItem-editbtn btn btn-sm btn-success btn-link"><i
                                                                                            class="fa fa-pencil"></i></button>
                                                                                    <button
                                                                                        class="o-mail-ActivityListPopoverItem-cancel btn btn-sm btn-danger btn-link"><i
                                                                                            class="fa fa-times"></i></button>
                                                                                </div>
                                                                            @endforeach
                                                                        </div>

                                                                        <!-- Planned Section -->
                                                                        <div class="o-mail-ActivityListPopoverItem d-flex flex-column border-bottom py-2">
                                                                            <div class="overflow-auto d-flex align-items-baseline ms-3 me-1">
                                                                                <b class="text-900 me-2 text-truncate flex-grow-1">Planned
                                                                                    ({{ $plannedCount }})</b>
                                                                            </div>
                                                                            @foreach($plannedActivities as $value)
                                                                                <div class="d-flex align-items-center flex-wrap mx-3 hideDiv"
                                                                                    data-id="{{ $value->id }}">
                                                                                    <span
                                                                                        class="avatar-initials rounded d-flex align-items-center justify-content-center">
                                                                                        {{ strtoupper($lead->getUser->name[0] ?? strtoupper($currentUser->name[0] ?? '')) }}
                                                                                    </span>
                                                                                    <div class="mt-1 flex-grow-1">
                                                                                        &nbsp;&nbsp;<small>{{ $lead->getUser->email }} - Planned</small>
                                                                                    </div>
                                                                                    <input type="file" class="d-none" id="upload_planned_file_{{ $value->id }}"
                                                                                        accept="*"
                                                                                        onchange="uploadFile('upload_planned_file_{{ $value->id }}', {{ $value->id }})">
                                                                                    <button
                                                                                        class="o-mail-ActivityListPopoverItem-upload btn btn-sm btn-success btn-link"
                                                                                        onclick="document.getElementById('upload_planned_file_{{ $value->id }}').click();">
                                                                                        <i class="fa fa-upload"></i>
                                                                                    </button>
                                                                                    <button
                                                                                        class="o-mail-ActivityListPopoverItem-editbtn btn btn-sm btn-success btn-link"><i
                                                                                            class="fa fa-pencil"></i></button>
                                                                                    <button
                                                                                        class="o-mail-ActivityListPopoverItem-cancel btn btn-sm btn-danger btn-link"><i
                                                                                            class="fa fa-times"></i></button>
                                                                                </div>
                                                                            @endforeach
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="popover-arrow end-auto"></div>
                                                            </div>
                                        @endif
                                    </td>

                                    <td class="o_activity_summary_cell" data-id="{{$lead->lead_id}}" data-activity_type="to-do">
                                        @php
                                            $requestSignatureActivity = $leadActivities->where('activity_type', 'request_signature')->where('status', 0)->sortBy('due_date');

                                            // Get current date
                                            $now = \Carbon\Carbon::now();
                                            $startOfToday = $now->copy()->startOfDay();

                                            // Calculate the counts for each status
                                            $overdueActivities = $requestSignatureActivity->filter(function ($activity) use ($startOfToday) {
                                                $dueDate = \Carbon\Carbon::parse($activity->due_date);
                                                return $dueDate->lessThan($startOfToday);
                                            });


                                            $todayActivities = $requestSignatureActivity->filter(function ($activity) use ($now) {
                                                $dueDate = \Carbon\Carbon::parse($activity->due_date); // Ensure due_date is a Carbon instance
                                                return $now->isSameDay($dueDate); // Today
                                            });

                                            $plannedActivities = $requestSignatureActivity->filter(function ($activity) use ($now) {
                                                $dueDate = \Carbon\Carbon::parse($activity->due_date); // Ensure due_date is a Carbon instance
                                                return $now->lt($dueDate); // Planned
                                            });

                                            $overdueCount = $overdueActivities->count();
                                            $todayCount = $todayActivities->count();
                                            $plannedCount = $plannedActivities->count();
                                        @endphp

                                        @if($requestSignatureActivity->isNotEmpty())
                                                            <div class="text-center text-white"
                                                                style="background-color:
                                                                                                                                                                                                                                                                                                                                                                                                                                            @php
                                                                                                                                                                                                                                                                                                                                                                                                                                                $todoActivity = $requestSignatureActivity->first();
                                                                                                                                                                                                                                                                                                                                                                                                                                                $dueDate = \Carbon\Carbon::parse($todoActivity->due_date);
                                                                                                                                                                                                                                                                                                                                                                                                                                                $daysDiff = $now->diffInDays($dueDate, false);
                                                                                                                                                                                                                                                                                                                                                                                                                                                if ($daysDiff < 0) {
                                                                                                                                                                                                                                                                                                                                                                                                                                                    echo '#d44c59'; // Overdue (red)
                                                                                                                                                                                                                                                                                                                                                                                                                                                } elseif ($daysDiff == 0) {
                                                                                                                                                                                                                                                                                                                                                                                                                                                    echo '#e99d00'; // Today (orange)
                                                                                                                                                                                                                                                                                                                                                                                                                                                } else {
                                                                                                                                                                                                                                                                                                                                                                                                                                                    echo '#28a745'; // Planned (green)
                                                                                                                                                                                                                                                                                                                                                                                                                                                }
                                                                                                                                                                                                                                                                                                                                                                                                                                            @endphp;cursor: pointer;">
                                                                <small>{{ $dueDate->format('d-m-y') }}</small>
                                                            </div>

                                                            <div
                                                                class="o_popover popover mw-100 o-popover--with-arrow bs-popover-bottom o-popover-bottom o-popover--bs d-none">
                                                                <div class="o-mail-ActivityListPopover d-flex flex-column">
                                                                    <div class="overflow-y-auto d-flex flex-column flex-grow-1">

                                                                        <!-- Overdue Section -->
                                                                        <div class="o-mail-ActivityListPopoverItem d-flex flex-column border-bottom py-2">
                                                                            <div class="overflow-auto d-flex align-items-baseline ms-3 me-1">
                                                                                <b class="text-900 me-2 text-truncate flex-grow-1">Overdue
                                                                                    ({{ $overdueCount }})</b>
                                                                            </div>
                                                                            @foreach($overdueActivities as $value)
                                                                                <div class="d-flex align-items-center flex-wrap mx-3 hideDiv"
                                                                                    data-id="{{ $value->id }}">
                                                                                    <span
                                                                                        class="avatar-initials rounded d-flex align-items-center justify-content-center">
                                                                                        {{ strtoupper($lead->getUser->name[0] ?? strtoupper($currentUser->name[0] ?? '')) }}
                                                                                    </span>
                                                                                    <div class="mt-1 flex-grow-1">
                                                                                        &nbsp;&nbsp;<small>{{ $lead->getUser->email }} - Overdue</small>
                                                                                    </div>
                                                                                    <button
                                                                                        class="o-mail-ActivityListPopoverItem-markAsDone btn btn-sm btn-success btn-link"
                                                                                        data-target="#overdue_feedback_{{ $value->id }}"><i
                                                                                            class="fa fa-check"></i></button>
                                                                                    <button
                                                                                        class="o-mail-ActivityListPopoverItem-editbtn btn btn-sm btn-success btn-link"><i
                                                                                            class="fa fa-pencil"></i></button>
                                                                                    <button
                                                                                        class="o-mail-ActivityListPopoverItem-cancel btn btn-sm btn-danger btn-link"><i
                                                                                            class="fa fa-times"></i></button>
                                                                                    <div class="py-2 px-3 d-none" id="overdue_feedback_{{ $value->id }}">
                                                                                        <textarea class="form-control feedback-textarea"
                                                                                            style="min-height: 70px;width:300px" rows="3"
                                                                                            placeholder="Write Feedback"></textarea>
                                                                                        <div class="mt-2">
                                                                                            <button type="button"
                                                                                                class="btn btn-sm btn-primary mx-2 feedback-submit"
                                                                                                data-id="{{ $value->id }}"> Done </button>
                                                                                            <button type="button" class="btn btn-sm btn-link feedback-discard"
                                                                                                data-target="#overdue_feedback_{{ $value->id }}">Discard
                                                                                            </button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            @endforeach
                                                                        </div>

                                                                        <!-- Today Section -->
                                                                        <div class="o-mail-ActivityListPopoverItem d-flex flex-column border-bottom py-2">
                                                                            <div class="overflow-auto d-flex align-items-baseline ms-3 me-1">
                                                                                <b class="text-900 me-2 text-truncate flex-grow-1">Today
                                                                                    ({{ $todayCount }})</b>
                                                                            </div>
                                                                            @foreach($todayActivities as $value)
                                                                                <div class="d-flex align-items-center flex-wrap mx-3 hideDiv"
                                                                                    data-id="{{ $value->id }}">
                                                                                    <span
                                                                                        class="avatar-initials rounded d-flex align-items-center justify-content-center">
                                                                                        {{ strtoupper($lead->getUser->name[0] ?? strtoupper($currentUser->name[0] ?? '')) }}
                                                                                    </span>
                                                                                    <div class="mt-1 flex-grow-1">
                                                                                        &nbsp;&nbsp;<small>{{ $lead->getUser->email }} - Today</small>
                                                                                    </div>
                                                                                    <button
                                                                                        class="o-mail-ActivityListPopoverItem-markAsDone btn btn-sm btn-success btn-link"
                                                                                        data-target="#today_feedback_{{ $value->id }}"><i
                                                                                            class="fa fa-check"></i></button>
                                                                                    <button
                                                                                        class="o-mail-ActivityListPopoverItem-editbtn btn btn-sm btn-success btn-link"><i
                                                                                            class="fa fa-pencil"></i></button>
                                                                                    <button
                                                                                        class="o-mail-ActivityListPopoverItem-cancel btn btn-sm btn-danger btn-link"><i
                                                                                            class="fa fa-times"></i></button>
                                                                                    <div class="py-2 px-3 d-none" id="today_feedback_{{ $value->id }}">
                                                                                        <textarea class="form-control feedback-textarea"
                                                                                            style="min-height: 70px;width:300px" rows="3"
                                                                                            placeholder="Write Feedback"></textarea>
                                                                                        <div class="mt-2">
                                                                                            <button type="button"
                                                                                                class="btn btn-sm btn-primary mx-2 feedback-submit"
                                                                                                data-id="{{ $value->id }}"> Done </button>
                                                                                            <button type="button" class="btn btn-sm btn-link feedback-discard"
                                                                                                data-target="#today_feedback_{{ $value->id }}">Discard </button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            @endforeach
                                                                        </div>

                                                                        <!-- Planned Section -->
                                                                        <div class="o-mail-ActivityListPopoverItem d-flex flex-column border-bottom py-2">
                                                                            <div class="overflow-auto d-flex align-items-baseline ms-3 me-1">
                                                                                <b class="text-900 me-2 text-truncate flex-grow-1">Planned
                                                                                    ({{ $plannedCount }})</b>
                                                                            </div>
                                                                            @foreach($plannedActivities as $value)
                                                                                <div class="d-flex align-items-center flex-wrap mx-3 hideDiv"
                                                                                    data-id="{{ $value->id }}">
                                                                                    <span
                                                                                        class="avatar-initials rounded d-flex align-items-center justify-content-center">
                                                                                        {{ strtoupper($lead->getUser->name[0] ?? strtoupper($currentUser->name[0] ?? '')) }}
                                                                                    </span>
                                                                                    <div class="mt-1 flex-grow-1">
                                                                                        &nbsp;&nbsp; <small>{{ $lead->getUser->email }} - Planned</small>
                                                                                    </div>
                                                                                    <button
                                                                                        class="o-mail-ActivityListPopoverItem-markAsDone btn btn-sm btn-success btn-link"
                                                                                        data-target="#planned_feedback_{{ $value->id }}"><i
                                                                                            class="fa fa-check"></i></button>
                                                                                    <button
                                                                                        class="o-mail-ActivityListPopoverItem-editbtn btn btn-sm btn-success btn-link"><i
                                                                                            class="fa fa-pencil"></i></button>
                                                                                    <button
                                                                                        class="o-mail-ActivityListPopoverItem-cancel btn btn-sm btn-danger btn-link"><i
                                                                                            class="fa fa-times"></i></button>
                                                                                    <div class="py-2 px-3 d-none" id="planned_feedback_{{ $value->id }}">
                                                                                        <textarea class="form-control feedback-textarea"
                                                                                            style="min-height: 70px;width:300px" rows="3"
                                                                                            placeholder="Write Feedback"></textarea>
                                                                                        <div class="mt-2">
                                                                                            <button type="button"
                                                                                                class="btn btn-sm btn-primary mx-2 feedback-submit"
                                                                                                data-id="{{ $value->id }}"> Done </button>
                                                                                            <button type="button" class="btn btn-sm btn-link feedback-discard"
                                                                                                data-target="#planned_feedback_{{ $value->id }}">Discard
                                                                                            </button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            @endforeach
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="popover-arrow end-auto"></div>
                                                            </div>
                                        @endif
                                    </td>
                                </tr>
                @endforeach
            </tbody>

            <tfoot>
                <tr class="o_data_row">
                    <td class="p-3" colspan="3">
                        <button type="button" class="btn btn-link o_record_selector cursor-pointer schedule_activity"
                            style="color:#017e84;" data-bs-toggle="modal" data-bs-target="#scheduleActivityModal">
                            <i class="fa fa-plus pe-2"></i>Schedule activity
                        </button>
                    </td>
                </tr>
            </tfoot>
        </table>

    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Activity</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editForm">
                <input type="hidden" id="edit_activity_id" name="id">
                <div class="modal-body">
                    <div class="row col-md-12">
                        <div class="col-md-6">
                            <div class="d-flex align-items-center">
                                <div class="col-md-4">
                                    <label for="activity_type" class="mr-2">Activity Type</label>
                                </div>
                                <div class="col-md-8 activityTypeField">
                                    <select class="form-control" id="edit_activity_type" name="activity_type"
                                        style="width: 100%;">
                                        <option value="email">Email</option>
                                        <option value="call">Call</option>
                                        <option value="meeting">Meeting</option>
                                        <option value="to-do" selected>To-Do</option>
                                        <option value="upload_document">Upload Document</option>
                                        <option value="request_signature">Request Signature</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 dueDateField">
                            <div class="d-flex align-items-center">
                                <div class="col-md-4">
                                    <label for="" class="mr-2">Due Date</label>
                                </div>
                                <div class="col-md-8">
                                    <input class="form-control datepicker" name="due_date" placeholder="Select Due Date"
                                        style="width: 100%;cursor: pointer;" type="text" id="edit_due_date">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mt-3 summaryField">
                            <div class="d-flex align-items-center">
                                <div class="col-md-4">
                                    <label for="edit_summary" class="mr-2">Summary</label>
                                </div>
                                <div class="col-md-8">
                                    <input class="form-control" placeholder="e.g. Discuss proposal" style="width: 100%;"
                                        type="text" id="edit_summary" name="summary">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mt-3 assignedToField">
                            <div class="d-flex align-items-center">
                                <div class="col-md-4">
                                    <label for="edit_assigned_to" class="mr-2">Assigned to</label>
                                </div>
                                <div class="col-md-8">
                                    <select class="form-control" id="edit_assigned_to" name="assigned_to"
                                        style="width: 100%;">
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->email }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mt-3 logNoteField">
                            <textarea class="form-control makeMeSummernote" id="edit_log_note" name="log_note" rows="4"
                                placeholder="Log Note"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer modal-footer-custom gap-1" style="justify-content: start;">
                    <button type="submit" class="btn btn-primary" style="background-color:#714B67;border:none;">Save</button>
                    <button type="button" class="btn btn-secondary text-black" style="background-color:#e7e9ed;border:none;" data-bs-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal HTML -->
<div class="modal fade" id="scheduleActivityModal" tabindex="-1" aria-labelledby="scheduleActivityModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="scheduleActivityModalLabel">Schedule Activity</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form or content for scheduling the activity -->
                <form id="scheduleActivityForm">
                    <table id="example" class="display nowrap example">
                        <thead>
                            <tr>
                                <th>Lead</th>
                                <th>Email</th>
                                <th>City</th>
                                <th>state</th>
                                <th>Country</th>
                                <th>Zip</th>
                                <th>Probability</th>
                                <th>Company Name</th>
                                <th>Address 1</th>
                                <th>Address 2</th>
                                <th>Website Link</th>
                                <th>Contact Name</th>
                                <th>Job Postion</th>
                                <th>Phone</th>
                                <th>Mobile</th>
                                <th>Priority</th>
                                <th>Title</th>
                                <th>Tag</th>
                                <th>Sales Person</th>
                                <th>Sales Team</th>
                            </tr>
                        </thead>

                        <tbody id="lead-table-body">
                        </tbody>
                    </table>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="activitiesAddModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="activitiesAddModalLable" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="activitiesAddModalLable">Schedule Activity</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="scheduleForm" action="{{ route('lead.scheduleActivityStore') }}" method="POST" enctype="application/x-www-form-urlencoded">
                <div class="modal-body">
                    <div class="row col-md-12">
                        <div class="col-md-6">
                            <div class="d-flex align-items-center">
                                <div class="col-md-4">
                                    <label for="activity_type" class="mr-2">Activity Type</label>
                                </div>
                                <div class="col-md-8 activityTypeField">
                                    <select class="form-control activity_type" id="activity_type" name="activity_type"
                                        style="width: 100%;">
                                        <option value="email">Email</option>
                                        <option value="call">Call</option>
                                        <option value="meeting">Meeting</option>
                                        <option value="to-do" selected>To-Do</option>
                                        <option value="upload_document">Upload Document</option>
                                        <option value="request_signature">Request Signature</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 dueDateField">
                            <!-- Due Date field -->
                            <div class="d-flex align-items-center">
                                <div class="col-md-4">
                                    <label for="" class="mr-2">Due Date</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="o_cell flex-grow-1 flex-sm-grow-0" style="width: 100%;">
                                        <div class="o_row o_row_readonly">
                                            <div name="due_date" class="o_field_widget">
                                                <div class="d-inline-flex w-100"><input class="o_input datepicker"
                                                        name="due_date" placeholder="Select Due Date"
                                                        style="width: 300px;" type="text" id="due_date"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mt-3 summaryField">
                            <div class="d-flex align-items-center">
                                <div class="col-md-4">
                                    <label for="summary" class="mr-2">Summary</label>
                                </div>
                                <div class="col-md-8">
                                    <input class="form-control" placeholder="e.g. Discuss proposal"
                                        style="width: 300px;" type="text" id="summary" name="summary">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mt-3 assignedToField">
                            <div class="d-flex align-items-center">
                                <div class="col-md-4">
                                    <label for="assigned_to" class="mr-2">Assigned to</label>
                                </div>
                                <div class="col-md-8">
                                    <select class="form-control" id="assigned_to" name="assigned_to"
                                        style="width: 100%;">
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->email }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mt-3 logNoteField">
                            <textarea name="log_note" class="makeMeSummernote" id="log_note" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer modal-footer-custom gap-1" style="justify-content: start;">
            <button type="submit" class="btn btn-primary" id="schedule">Schedule</button>
            <button type="submit" class="btn btn-secondary" id="schedule_and_mark_done">Schedule & Mark as Done</button>
            <button type="submit" class="btn btn-secondary" id="done_and_schedule_next">Done & Schedule Next</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        </div>
            </form>
        </div>
    </div>
</div>

@endsection

@push('scripts')
    <script src="https://fullcalendar.io/releases/fullcalendar/3.9.0/lib/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    <script>

        $(document).ready(function () {
            $("#edit_log_note").summernote();
             $("#log_note").summernote();
        });
        $(document).ready(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Function to fetch and filter data based on due_date
            function filterData(selectedTags) {
                // Show loading state
                $('#activityTableBody').html('<tr><td colspan="6" class="text-center">Loading...</td></tr>');

                $.ajax({
                    url: '{{ route('activity.filter.activities') }}',
                    method: 'GET',
                    data: { tags: selectedTags },
                    success: function (response) {
                        console.log(response); // Debug: Check the structure of the response
                        const html = generateActivityHtml(response);
                        $('#activityTableBody').html(html);
                        attachClickEvent();
                    },
                    error: function (xhr, status, error) {
                        console.error('AJAX Error: ', error);
                        $('#activityTableBody').html('<tr><td colspan="6" class="text-center text-danger">Error loading data. Please try again.</td></tr>');
                    }
                });
            }

            function generateActivityHtml(activities) {
                const groupedActivities = groupByLead(activities);
                let html = '';

                Object.entries(groupedActivities).forEach(([leadId, activities]) => {
                    const lead = activities[0]; // Assuming lead info is consistent
                    const bgColor = getBgColor(new Date(lead.due_date));
                    const userInitial = getUserInitial(lead.get_user?.email);

                    html += `
                        <tr class="o_data_row h-100">
                            <td class="o_activity_record p-2 cursor-pointer">
                                <div>
                                    <div name="user_id" class="o_field_widget o_field_many2one_avatar_user d-inline-block">
                                        <div class="d-flex align-items-center gap-1" data-tooltip="${lead.get_user?.email || 'Unknown User'}">
                                            ${generateUserAvatar(lead.get_user?.profile, userInitial, bgColor)}
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        ${generateLeadInfo(lead)}
                                    </div>
                                </div>
                            </td>
                            ${generateActivityCells(activities, lead.lead_id, bgColor)}
                        </tr>
                    `;
                });

                return html;
            }

            function groupByLead(activities) {
                return activities.reduce((acc, activity) => {
                    const leadId = activity.lead_id;
                    acc[leadId] = acc[leadId] || [];
                    acc[leadId].push(activity);
                    return acc;
                }, {});
            }

            function generateUserAvatar(profile, initial, bgColor) {
                return profile ?
                    `<img class="rounded" src="${profile}" alt="User Profile">` :
                    `<div class="placeholder-circle rounded d-flex align-items-center justify-content-center" style="background-color: ${bgColor}; width:32px;height:32px;color:white">
                        <span>${initial}</span>
                    </div>`;
            }

            function generateLeadInfo(lead) {
                return `
                    <div class="d-flex justify-content-between">
                        <div class="d-block text-truncate o_text_block o_text_bold ml-3">${lead.product_name}</div>
                        <div name="expected_revenue" class="o_field_widget o_field_empty o_field_monetary d-block text-truncate text-muted">
                            <span>₹${lead.probability || '0.00'}</span>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div class="d-block text-truncate text-muted o_text_block"></div>
                        <div name="stage_id" class="o_field_widget o_field_badge d-inline-block">
                            <span class="badge rounded-pill">New</span>
                        </div>
                    </div>
                `;
            }

            function generateActivityCells(activities, leadId, bgColor) {
                const activityTypes = ['email', 'call', 'meeting', 'to-do', 'upload_document', 'request_signature'];
                return activityTypes.map(type => generateActivityCell(type, activities, leadId, bgColor)).join('');
            }

            function generateActivityCell(activityType, activities, leadId, bgColor) {
                const filteredActivities = activities.filter(activity => activity.activity_type === activityType);
                if (filteredActivities.length === 0) return `<td></td>`; // Empty cell

                const counts = countActivities(filteredActivities);
                const activityDueDate = new Date(filteredActivities[0].due_date);
                const cellColor = getBgColor((activityDueDate - new Date()) / (1000 * 60 * 60 * 24));

                return `
                    <td class="o_activity_summary_cell" data-id="${leadId}" data-activity_type="${activityType}">
                        <div class="text-center text-white" style="background-color: ${cellColor}; cursor: pointer;">
                            <small>${activityDueDate.toLocaleDateString()}</small>
                        </div>
                        <div class="o_popover popover d-none" style="max-width: 354px !important;">
                            <div class="o-mail-ActivityListPopover d-flex flex-column">
                                ${generateActivityDetails(counts, filteredActivities)}
                            </div>
                        </div>
                    </td>
                `;
            }

            function countActivities(activities) {
                const now = new Date();
                const todayString = now.toDateString();
                return {
                    overdue: activities.filter(activity => new Date(activity.due_date) < now).length,
                    today: activities.filter(activity => new Date(activity.due_date).toDateString() === todayString).length,
                    planned: activities.filter(activity => new Date(activity.due_date) > now).length
                };
            }

            function generateActivityDetails(counts, activities) {
                let details = '';

                // Overdue Activities
                details += `<div class="overflow-auto d-flex align-items-baseline ms-3 me-1 mt-2"><b>Overdue (${counts.overdue})</b></div>`;
                details += `<div class="o-mail-ActivityListPopoverItem d-flex flex-column border-bottom py-2">`;
                activities.filter(activity => new Date(activity.due_date) < new Date()).forEach(activity => {
                    details += `
                        <div class="d-flex align-items-center flex-wrap mx-3 hideDiv" data-id="${activity.id}">
                            <span class="avatar-initials rounded d-flex align-items-center justify-content-center">
                                ${getUserInitial(activity.get_user.email)}
                            </span>
                            <div class="mt-1 flex-grow-1">
                                &nbsp;&nbsp;<small>${activity.get_user.email} - Overdue</small>
                            </div>
                            ${activity.activity_type === 'upload_document' ? `
                                <button class="o-mail-ActivityListPopoverItem-upload btn btn-sm btn-success btn-link"
                                    onclick="document.getElementById('upload_overdue_file_${activity.id}').click();">
                                    <i class="fa fa-upload"></i>
                                </button>
                                <input type="file" class="d-none" id="upload_overdue_file_${activity.id}" accept="*"
                                    onchange="uploadFile('upload_overdue_file_${activity.id}', ${activity.id})">
                            ` : `
                                <button class="o-mail-ActivityListPopoverItem-markAsDone btn btn-sm btn-success btn-link filter-mark-done"
                                    data-target="#overdue_feedback_${activity.id}">
                                    <i class="fa fa-check"></i>
                                </button>
                            `}
                            <div class="d-flex align-items-center ml-2"> 
                                <button class="o-mail-ActivityListPopoverItem-editbtn btn btn-sm btn-success btn-link filter-edit-btn">
                                    <i class="fa fa-pencil"></i>
                                </button>
                                <button class="o-mail-ActivityListPopoverItem-cancel btn btn-sm btn-danger btn-link ml-1 filter-cancel-btn">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                            <div class="py-2 px-3 d-none" id="overdue_feedback_${activity.id}">
                                <textarea class="form-control filter-feedback-textarea" style="min-height: 70px; width: 300px" rows="3" 
                                          placeholder="Write Feedback"></textarea>
                                <div class="mt-2">
                                    <button type="button" class="btn btn-sm btn-primary mx-2 feedback-submit" 
                                            data-id="${activity.id}" style="background-color:#714B67;border:none;">Done</button>
                                    <button type="button" class="btn btn-sm btn-link filter-feedback-discard" style="color:#017e84;"
                                            data-target="#overdue_feedback_${activity.id}">Discard</button>
                                </div>
                            </div>
                        </div>
                    `;
                });
                details += `</div>`;

                // Today Activities
                details += `<div class="overflow-auto d-flex align-items-baseline ms-3 me-1 mt-2"><b>Today (${counts.today})</b></div>`;
                details += `<div class="o-mail-ActivityListPopoverItem d-flex flex-column border-bottom py-2">`;
                activities.filter(activity => new Date(activity.due_date).toDateString() === new Date().toDateString()).forEach(activity => {
                    details += `
                        <div class="d-flex align-items-center flex-wrap mx-3 hideDiv" data-id="${activity.id}">
                            <span class="avatar-initials rounded d-flex align-items-center justify-content-center">
                                ${getUserInitial(activity.get_user.email)}
                            </span>
                            <div class="mt-1 flex-grow-1">
                                &nbsp;&nbsp;<small>${activity.get_user.email} - Today</small>
                            </div>
                            ${activity.activity_type === 'upload_document' ? `
                                <button class="o-mail-ActivityListPopoverItem-upload btn btn-sm btn-success btn-link"
                                    onclick="document.getElementById('upload_today_file_${activity.id}').click();">
                                    <i class="fa fa-upload"></i>
                                </button>
                                <input type="file" class="d-none" id="upload_today_file_${activity.id}" accept="*"
                                    onchange="uploadFile('upload_today_file_${activity.id}', ${activity.id})">
                            ` : `
                                <button class="o-mail-ActivityListPopoverItem-markAsDone btn btn-sm btn-success btn-link filter-mark-done"
                                    data-target="#today_feedback_${activity.id}">
                                    <i class="fa fa-check"></i>
                                </button>
                            `}
                            <div class="d-flex align-items-center ml-2"> 
                                <button class="o-mail-ActivityListPopoverItem-editbtn btn btn-sm btn-success btn-link filter-edit-btn">
                                    <i class="fa fa-pencil"></i>
                                </button>
                                <button class="o-mail-ActivityListPopoverItem-cancel btn btn-sm btn-danger btn-link ml-1 filter-cancel-btn">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                            <div class="py-2 px-3 d-none" id="today_feedback_${activity.id}">
                                <textarea class="form-control filter-feedback-textarea" style="min-height: 70px; width: 300px" rows="3" 
                                          placeholder="Write Feedback"></textarea>
                                <div class="mt-2">
                                    <button type="button" class="btn btn-sm btn-primary mx-2 feedback-submit" 
                                            data-id="${activity.id}">Done</button>
                                    <button type="button" class="btn btn-sm btn-link filter-feedback-discard" 
                                           data-target="#today_feedback_${activity.id}">Discard</button>
                                </div>
                            </div>
                        </div>
                    `;
                });
                details += `</div>`;

                // Planned Activities
                details += `<div class="overflow-auto d-flex align-items-baseline ms-3 me-1 mt-2"><b>Planned (${counts.planned})</b></div>`;
                details += `<div class="o-mail-ActivityListPopoverItem d-flex flex-column border-bottom py-2">`;
                activities.filter(activity => new Date(activity.due_date) > new Date()).forEach(activity => {
                    details += `
                        <div class="d-flex align-items-center flex-wrap mx-3 hideDiv" data-id="${activity.id}">
                            <span class="avatar-initials rounded d-flex align-items-center justify-content-center">
                                ${getUserInitial(activity.get_user.email)}
                            </span>
                            <div class="mt-1 flex-grow-1">
                                &nbsp;&nbsp;<small>${activity.get_user.email} - Planned - ${activity.due_date}</small>
                            </div>
                            ${activity.activity_type === 'upload_document' ? `
                                <button class="o-mail-ActivityListPopoverItem-upload btn btn-sm btn-success btn-link"
                                    onclick="document.getElementById('upload_planned_file_${activity.id}').click();">
                                    <i class="fa fa-upload"></i>
                                </button>
                                <input type="file" class="d-none" id="upload_planned_file_${activity.id}" accept="*"
                                    onchange="uploadFile('upload_planned_file_${activity.id}', ${activity.id})">
                            ` : `
                                <button class="o-mail-ActivityListPopoverItem-markAsDone btn btn-sm btn-success btn-link filter-mark-done"
                                    data-target="#planned_feedback_${activity.id}">
                                    <i class="fa fa-check"></i>
                                </button>
                            `}
                            <div class="d-flex align-items-center ml-2"> 
                                <button class="o-mail-ActivityListPopoverItem-editbtn btn btn-sm btn-success btn-link filter-edit-btn">
                                    <i class="fa fa-pencil"></i>
                                </button>
                                <button class="o-mail-ActivityListPopoverItem-cancel btn btn-sm btn-danger btn-link ml-1 filter-cancel-btn">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                            <div class="py-2 px-3 d-none" id="planned_feedback_${activity.id}">
                                <textarea class="form-control filter-feedback-textarea" style="min-height: 70px; width: 300px" rows="3" 
                                          placeholder="Write Feedback"></textarea>
                                <div class="mt-2">
                                    <button type="button" class="btn btn-sm btn-primary mx-2 feedback-submit" 
                                            data-id="${activity.id}">Done</button>
                                    <button type="button" class="btn btn-sm btn-link filter-feedback-discard" 
                                            data-target="#planned_feedback_${activity.id}">Discard</button>
                                </div>
                            </div>
                        </div>
                    `;
                });
                details += `</div>`;

                return details;


            }



            function getUserInitial(email) {
                return email ? email.charAt(0).toUpperCase() : '?';
            }

            // Function to attach click events for the summary cells
            function attachClickEvent() {
                $(document).on('click', '.o_activity_summary_cell', function (event) {
                    event.stopPropagation(); // Prevent click from bubbling to document

                    // Get the popover inside the clicked cell
                    let $popover = $(this).find('.o_popover');

                    // Hide all other popovers
                    $('.o_popover').addClass('d-none');

                    // Check if the popover is currently visible
                    if ($popover.hasClass('d-none')) {
                        // Show the popover for the clicked cell
                        $popover.removeClass('d-none');
                        let offset = $(this).offset();
                        $popover.css({
                            top: offset.top + $(this).outerHeight(),
                            left: offset.left
                        });
                    } else {
                        // If already visible, hide the popover on second click
                        $popover.addClass('d-none');
                    }
                });

                // Optional: Close the popover when clicking outside
                $(document).on('click', function (e) {
                    if (!$(e.target).closest('.o_activity_summary_cell').length) {
                        $('.o_popover').addClass('d-none');
                    }
                });
            }

            // Helper function to get background color based on due date
            function getBgColor(daysDiff) {
                if (daysDiff < 0) return '#d44c59'; // Overdue
                if (daysDiff === 0) return '#e99d00'; // Today
                return '#28a745'; // Planned
            }

            function toggleFeedback(targetDiv) {
                $(targetDiv).toggleClass('d-none');
            }

            $(document).on('click', '.filter-mark-done', function (event) {
                event.stopPropagation(); // Prevent click from closing the popover
                var targetDiv = $(this).data('target');
                toggleFeedback(targetDiv);
            });


            // Prevent textarea click from closing
            $(document).on('click', '.filter-feedback-textarea', function (event) {
                event.stopPropagation(); // Prevent click from closing the popover
            });

            // Feedback submission
            $(document).on('click', '.feedback-submit', function () {
                var feedbackText = $(this).closest('.py-2').find('textarea').val();
                var activityId = $(this).data('id');
                var countElement = $(this).closest('.o-mail-ActivityListPopoverItem').find('b'); // Locate the count element
                var status = countElement.text().split(' ')[0]; // Get the current status (Overdue, Today, Planned)

                filterSubmitFeedback(feedbackText, activityId, $(this), countElement, status);
            });

            function filterSubmitFeedback(feedbackText, activityId, button, countElement, status) {
                $.ajax({
                    url: '{{ route('lead.submit.feedback') }}',
                    method: 'POST',
                    data: {
                        feedback: feedbackText,
                        activity_id: activityId,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (response) {
                        location.reload(); // Reload the page
                        toastr.success(response.message);
                        if (hideDiv.length) { // Check if hideDiv exists
                            hideDiv.addClass('d-none'); // Hide the div
                        } else {
                            console.warn("hideDiv not found"); // Debugging line
                        }

                        // Decrease the count by 1
                        var currentCount = parseInt(countElement.text().match(/\d+/)[0]); // Get the current count
                        countElement.text(`${status} (${currentCount - 1})`); // Update the count with status
                    },
                    error: function (xhr) {
                        console.error(xhr.responseText);
                        toastr.error('An error occurred. Please try again.');
                    }
                });
            }

            // Handle discard button to hide the feedback textarea
            $(document).on('click', '.filter-feedback-discard', function () {
                var targetDiv = $(this).data('target');
                $(targetDiv).addClass('d-none');
            });


            $(function () {
                var currentDate = new Date();

                $(".datepicker").datepicker({
                    dateFormat: "yy-mm-dd",
                    duration: "fast",
                    onSelect: function (dateText, inst) {
                        // Optional: Do something when a date is selected
                        console.log("Selected date: " + dateText);
                    }
                }).datepicker("setDate", currentDate);
            });
           

            $(document).on('click', '.filter-edit-btn', function () {
                var activityId = $(this).closest('.hideDiv').data('id');

                // Fetch activity details using AJAX
                $.ajax({
                    url: '/feedback-activity/' + activityId, // Adjust to your backend route
                    method: 'GET',
                    success: function (data) {
                        // Populate the modal fields with data received
                        $('#edit_activity_id').val(data.id);
                        $('#edit_activity_type').val(data.activity_type);
                        $('#edit_due_date').val(data.due_date);
                        $('#edit_summary').val(data.summary);
                        $('#edit_assigned_to').val(data.assigned_to);

                        $('#edit_log_note').summernote({
                                height: 200,  // Set editor height
                                focus: true,  // Set focus to editable area after modal shown
                                tabsize: 2    // Set tab size
                            });

                        // Set the content of the Summernote editor with the fetched note
                        $('#edit_log_note').summernote('code', data.note);

                        const editModal = new bootstrap.Modal(document.getElementById('editModal'));
                        editModal.show();
                    },
                    error: function (xhr) {
                        toastr.error('Failed to fetch activity details.'); // Show error message
                    }
                });
            });
            
            $(document).on('click', '.filter-cancel-btn', function (event) {
                event.stopPropagation(); // Prevent closing of popover
                var activityId = $(this).closest('.hideDiv').data('id'); // Get the activity ID
                var countElement = $(this).closest('.o-mail-ActivityListPopoverItem').find('b'); // Locate the count element
                var status = countElement.text().split(' ')[0]; // Get the current status (Overdue, Today, Planned)
                filterDeleteActivity(activityId, $(this), countElement, status);
            });

            function filterDeleteActivity(activityId, button, countElement, status) {
                $.ajax({
                    url: '/feedback-activity-delete/' + activityId, // Use your delete route
                    method: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}' // Include CSRF token for security
                    },
                    success: function (response) {
                        location.reload(); // Reload the page
                        toastr.success(response.message);
                        button.closest('.hideDiv').addClass('d-none'); // Hide the activity after deletion

                        // Decrease the count by 1
                        var currentCount = parseInt(countElement.text().match(/\d+/)[0]); // Get the current count
                        countElement.text(`${status} (${currentCount - 1})`); // Update the count with status

                        // Check if all activities in Overdue, Today, and Planned are deleted
                        var overdueCount = parseInt($('b:contains("Overdue")').text().match(/\d+/)[0]); // Count in Overdue
                        var todayCount = parseInt($('b:contains("Today")').text().match(/\d+/)[0]); // Count in Today
                        var plannedCount = parseInt($('b:contains("Planned")').text().match(/\d+/)[0]); // Count in Planned

                        var remainingActivities = overdueCount + todayCount + plannedCount;

                        // If all activities are deleted, reload the page
                        if (remainingActivities === 0) {
                            location.reload(); // Reload the page
                        }
                    },
                    error: function (xhr) {
                        console.error(xhr.responseText);
                        toastr.error('An error occurred while deleting the activity. Please try again.');
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
                console.log(selectedTags, 'jdfjdfjjdf');

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

                console.log(selectedTags, 'Lost Tag');

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

            $(document).on('click', '.setting-icon', function (e) {
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

   $(document).ready(function () {
    $('.add_filter').on('click', function (event) {
        event.preventDefault();

        var filterType = $('#customer_filter_select').val();
        var filterValue = $('#customer_filter_input_value').val();
        var operatesValue = $('#customer_filter_operates').val();
        var span_id = $('#span_id').val();

        // Clear existing filters and UI elements
        $('.selected-items .o_searchview_facet').remove();
        $('.o-dropdown-item-3').attr('aria-checked', 'false');
        $('.o-dropdown-item-3 .checkmark').hide();
        $('.group_by_tag').remove();
        $('.o-dropdown-item_1 .checkmark').hide();

        handleTagSelection(filterType, operatesValue, filterValue, span_id);

        var data = {
            filterType: filterType,
            filterValue: filterValue,
            operatesValue: operatesValue,
            _token: $('meta[name="csrf-token"]').attr('content') // CSRF Token
        };

        $.ajax({
            url: '{{ route('filter-activity.custom.filter') }}',
            method: 'POST',
            data: data,
            success: function (response) {
                console.log('AJAX Response:', response);
                onFilterSuccess(response);
            },
            error: function (xhr, status, error) {
                console.error('AJAX Error:', error);
                $('#activityTableBody').html('<tr><td colspan="6" class="text-center">An error occurred while fetching activities.</td></tr>');
            }
        });

        // Hide the modal after the request
        $('#customFilterModal').modal('hide');

        const now = new Date();
        const todayString = now.toDateString();

        function onFilterSuccess(response) {
            if (response.success && Array.isArray(response.data)) {
                if (response.data.length === 0) {
                    $('#activityTableBody').html('<tr><td colspan="6" class="text-center">No activities found.</td></tr>');
                } else {
                    const html = generateActivityHtml(response.data);
                    $('#activityTableBody').html(html);
                }
            } else {
                console.error('Unexpected response format:', response);
            }
        }

        function generateActivityHtml(activities) {
            console.log(activities);
            if (!Array.isArray(activities)) {
                console.error('Activities is not an array:', activities);
                return '';
            }

            const groupedActivities = groupByLead(activities);
            let html = '';

            Object.entries(groupedActivities).forEach(([leadId, activities]) => {
                const lead = activities[0];
                const bgColor = getBgColor(new Date(lead.due_date));
                const userInitial = getUserInitial(lead.get_user?.email);

                html += `
                    <tr class="o_data_row h-100">
                        <td class="o_activity_record p-2 cursor-pointer">
                            <div>
                                <div name="user_id" class="o_field_widget o_field_many2one_avatar_user d-inline-block">
                                    <div class="d-flex align-items-center gap-1" data-tooltip="${lead.get_user?.email || 'Unknown User'}">
                                        ${generateUserAvatar(lead.get_user?.profile, userInitial, bgColor)}
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    ${generateLeadInfo(lead)}
                                </div>
                            </div>
                        </td>
                        ${generateActivityCells(activities, lead.lead_id, bgColor)}
                    </tr>
                `;
            });

            return html;
        }

        function groupByLead(activities) {
            return activities.reduce((acc, activity) => {
                const leadId = activity.lead_id;
                acc[leadId] = acc[leadId] || [];
                acc[leadId].push(activity);
                return acc;
            }, {});
        }

        function generateUserAvatar(profile, initial, bgColor) {
            return profile ?
                `<img class="rounded" src="${profile}" alt="User Profile">` :
                `<div class="placeholder-circle rounded d-flex align-items-center justify-content-center" style="background-color: ${bgColor}; width:32px;height:32px;color:white">
                    <span>${initial}</span>
                </div>`;
        }

        function generateLeadInfo(lead) {
            return `
                <div class="d-flex justify-content-between">
                    <div class="d-block text-truncate o_text_block o_text_bold">${lead.product_name}</div>
                    <div name="expected_revenue" class="o_field_widget o_field_empty o_field_monetary d-block text-truncate text-muted">
                        <span>₹${lead.probability || '0.00'}</span>
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    <div class="d-block text-truncate text-muted o_text_block"></div>
                    <div name="stage_id" class="o_field_widget o_field_badge d-inline-block">
                        <span class="badge rounded-pill">New</span>
                    </div>
                </div>
            `;
        }

        function generateActivityCells(activities, leadId, bgColor) {
            const activityTypes = ['email', 'call', 'meeting', 'to-do', 'upload_document', 'request_signature'];
            return activityTypes.map(type => generateActivityCell(type, activities, leadId, bgColor)).join('');
        }

        function generateActivityCell(activityType, activities, leadId, bgColor) {
            const filteredActivities = activities.filter(activity => activity.activity_type === activityType);
            if (filteredActivities.length === 0) return `<td></td>`; // Empty cell

            const counts = countActivities(filteredActivities);
            const activityDueDate = new Date(filteredActivities[0].due_date);
            const cellColor = getBgColor((activityDueDate - new Date()) / (1000 * 60 * 60 * 24));

            return `
                <td class="o_activity_summary_cell" data-id="${leadId}" data-activity_type="${activityType}">
                    <div class="text-center text-white" style="background-color: ${cellColor}; cursor: pointer;">
                        <small>${activityDueDate.toLocaleDateString()}</small>
                    </div>
                    <div class="o_popover popover d-none" style="max-width: 354px !important;">
                        <div class="o-mail-ActivityListPopover d-flex flex-column">
                            ${generateActivityDetails(counts, filteredActivities)}
                        </div>
                    </div>
                </td>
            `;
        }

        function countActivities(activities) {
            const now = new Date();
            const todayString = now.toDateString(); // Store today’s date string for comparison

            return {
                overdue: activities.filter(activity => new Date(activity.due_date) < now).length,
                today: activities.filter(activity => new Date(activity.due_date).toDateString() === todayString).length,
                planned: activities.filter(activity => new Date(activity.due_date) > now).length
            };
        }

       function generateActivityDetails(counts, activities) {
    let details = '';

    // Overdue Activities
    details += `<div class="overflow-auto d-flex align-items-baseline ms-3 me-1 mt-2"><b>Overdue (${counts.overdue})</b></div>`;
    details += `<div class="o-mail-ActivityListPopoverItem d-flex flex-column border-bottom py-2">`;
    activities.filter(activity => new Date(activity.due_date) < new Date() && new Date(activity.due_date).toDateString() !== todayString).forEach(activity => {
        details += `
            <div class="d-flex align-items-center flex-wrap mx-3 hideDiv" data-id="${activity.id}">
                <span class="avatar-initials rounded d-flex align-items-center justify-content-center">
                    ${getUserInitial(activity.get_user.email)}
                </span>
                <div class="mt-1 flex-grow-1">
                    &nbsp;&nbsp;<small>${activity.get_user.email} - Overdue</small>
                </div>
                ${activity.activity_type === 'upload_document' ? `
                    <button class="o-mail-ActivityListPopoverItem-upload btn btn-sm btn-success btn-link"
                        onclick="document.getElementById('upload_overdue_file_${activity.id}').click();">
                        <i class="fa fa-upload"></i>
                    </button>
                    <input type="file" class="d-none" id="upload_overdue_file_${activity.id}" accept="*"
                        onchange="uploadFile('upload_overdue_file_${activity.id}', ${activity.id})">
                ` : `
                    <button class="o-mail-ActivityListPopoverItem-markAsDone btn btn-sm btn-success btn-link filter-mark-done"
                        data-target="#overdue_feedback_${activity.id}">
                        <i class="fa fa-check"></i>
                    </button>
                `}
                <div class="d-flex align-items-center ml-2"> 
                    <button class="o-mail-ActivityListPopoverItem-editbtn btn btn-sm btn-success btn-link filter-edit-btn">
                        <i class="fa fa-pencil"></i>
                    </button>
                    <button class="o-mail-ActivityListPopoverItem-cancel btn btn-sm btn-danger btn-link ml-1 filter-cancel-btn">
                        <i class="fa fa-times"></i>
                    </button>
                </div>
                <div class="py-2 px-3 d-none" id="overdue_feedback_${activity.id}">
                    <textarea class="form-control filter-feedback-textarea" style="min-height: 70px; width: 300px" rows="3" 
                              placeholder="Write Feedback"></textarea>
                    <div class="mt-2">
                        <button type="button" class="btn btn-sm btn-primary mx-2 feedback-submit" 
                                data-id="${activity.id}" style="background-color:#714B67;border:none;">Done</button>
                        <button type="button" class="btn btn-sm btn-link filter-feedback-discard" style="color:#017e84;"
                                data-target="#overdue_feedback_${activity.id}">Discard</button>
                    </div>
                </div>
            </div>
        `;
    });
    details += `</div>`;

    // Today Activities
    details += `<div class="overflow-auto d-flex align-items-baseline ms-3 me-1 mt-2"><b>Today (${counts.today})</b></div>`;
    details += `<div class="o-mail-ActivityListPopoverItem d-flex flex-column border-bottom py-2">`;
    activities.filter(activity => new Date(activity.due_date).toDateString() === todayString).forEach(activity => {
        details += `
            <div class="d-flex align-items-center flex-wrap mx-3 hideDiv" data-id="${activity.id}">
                <span class="avatar-initials rounded d-flex align-items-center justify-content-center">
                    ${getUserInitial(activity.get_user.email)}
                </span>
                <div class="mt-1 flex-grow-1">
                    &nbsp;&nbsp;<small>${activity.get_user.email} - Today</small>
                </div>
                ${activity.activity_type === 'upload_document' ? `
                    <button class="o-mail-ActivityListPopoverItem-upload btn btn-sm btn-success btn-link"
                        onclick="document.getElementById('upload_today_file_${activity.id}').click();">
                        <i class="fa fa-upload"></i>
                    </button>
                    <input type="file" class="d-none" id="upload_today_file_${activity.id}" accept="*"
                        onchange="uploadFile('upload_today_file_${activity.id}', ${activity.id})">
                ` : `
                    <button class="o-mail-ActivityListPopoverItem-markAsDone btn btn-sm btn-success btn-link filter-mark-done"
                        data-target="#today_feedback_${activity.id}">
                        <i class="fa fa-check"></i>
                    </button>
                `}
                <div class="d-flex align-items-center ml-2"> 
                    <button class="o-mail-ActivityListPopoverItem-editbtn btn btn-sm btn-success btn-link filter-edit-btn">
                        <i class="fa fa-pencil"></i>
                    </button>
                    <button class="o-mail-ActivityListPopoverItem-cancel btn btn-sm btn-danger btn-link ml-1 filter-cancel-btn">
                        <i class="fa fa-times"></i>
                    </button>
                </div>
                <div class="py-2 px-3 d-none" id="today_feedback_${activity.id}">
                    <textarea class="form-control filter-feedback-textarea" style="min-height: 70px; width: 300px" rows="3" 
                              placeholder="Write Feedback"></textarea>
                    <div class="mt-2">
                        <button type="button" class="btn btn-sm btn-primary mx-2 feedback-submit" 
                                data-id="${activity.id}">Done</button>
                        <button type="button" class="btn btn-sm btn-link filter-feedback-discard" 
                               data-target="#today_feedback_${activity.id}">Discard</button>
                    </div>
                </div>
            </div>
        `;
    });
    details += `</div>`;

    // Planned Activities
    details += `<div class="overflow-auto d-flex align-items-baseline ms-3 me-1 mt-2"><b>Planned (${counts.planned})</b></div>`;
    details += `<div class="o-mail-ActivityListPopoverItem d-flex flex-column border-bottom py-2">`;
    activities.filter(activity => new Date(activity.due_date) > new Date()).forEach(activity => {
        details += `
            <div class="d-flex align-items-center flex-wrap mx-3 hideDiv" data-id="${activity.id}">
                <span class="avatar-initials rounded d-flex align-items-center justify-content-center">
                    ${getUserInitial(activity.get_user.email)}
                </span>
                <div class="mt-1 flex-grow-1">
                    &nbsp;&nbsp;<small>${activity.get_user.email} - Planned - ${activity.due_date}</small>
                </div>
                ${activity.activity_type === 'upload_document' ? `
                    <button class="o-mail-ActivityListPopoverItem-upload btn btn-sm btn-success btn-link"
                        onclick="document.getElementById('upload_planned_file_${activity.id}').click();">
                        <i class="fa fa-upload"></i>
                    </button>
                    <input type="file" class="d-none" id="upload_planned_file_${activity.id}" accept="*"
                        onchange="uploadFile('upload_planned_file_${activity.id}', ${activity.id})">
                ` : `
                    <button class="o-mail-ActivityListPopoverItem-markAsDone btn btn-sm btn-success btn-link filter-mark-done"
                        data-target="#planned_feedback_${activity.id}">
                        <i class="fa fa-check"></i>
                    </button>
                `}
                <div class="d-flex align-items-center ml-2"> 
                    <button class="o-mail-ActivityListPopoverItem-editbtn btn btn-sm btn-success btn-link filter-edit-btn">
                        <i class="fa fa-pencil"></i>
                    </button>
                    <button class="o-mail-ActivityListPopoverItem-cancel btn btn-sm btn-danger btn-link ml-1 filter-cancel-btn">
                        <i class="fa fa-times"></i>
                    </button>
                </div>
                <div class="py-2 px-3 d-none" id="planned_feedback_${activity.id}">
                    <textarea class="form-control filter-feedback-textarea" style="min-height: 70px; width: 300px" rows="3" 
                              placeholder="Write Feedback"></textarea>
                    <div class="mt-2">
                        <button type="button" class="btn btn-sm btn-primary mx-2 feedback-submit" 
                                data-id="${activity.id}">Done</button>
                        <button type="button" class="btn btn-sm btn-link filter-feedback-discard" 
                                data-target="#planned_feedback_${activity.id}">Discard</button>
                    </div>
                </div>
            </div>
        `;
    });
    details += `</div>`;

    return details;
}

        function getBgColor(days) {
            if (days < 0) return '#dc3545'; // Red for overdue
            if (days === 0) return '#ffc107'; // Yellow for today
            return '#28a745'; // Green for planned
        }

        function getUserInitial(email) {
            return email ? email.charAt(0).toUpperCase() : '?';
        }
    });

    // Event delegation for .o_activity_summary_cell click
    $(document).on('click', '.o_activity_summary_cell', function (event) {
        event.stopPropagation(); // Prevent click from bubbling to document

        // Get the popover inside the clicked cell
        let $popover = $(this).find('.o_popover');

        // Hide all other popovers
        $('.o_popover').addClass('d-none');

        // Check if the popover is currently visible
        if ($popover.hasClass('d-none')) {
            // Show the popover for the clicked cell
            $popover.removeClass('d-none');
            let offset = $(this).offset();
            $popover.css({
                top: offset.top + $(this).outerHeight(),
                left: offset.left
            });
        } else {
            // If already visible, hide the popover on second click
            $popover.addClass('d-none');
        }
    });

    // Close the popover when clicking outside
    $(document).on('click', function (e) {
        if (!$(e.target).closest('.o_activity_summary_cell').length) {
            $('.o_popover').addClass('d-none');
        }
    });
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
            $('.o_save_favorite').on('click', function (event) {
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
                        success: function (response) {
                            location.reload();
                        },
                        error: function (xhr) {
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
            $('.o_input').on('input', function () {
                const searchTerm = $(this).val().toLowerCase();
                $('.o-dropdown-item').each(function () {
                    const text = $(this).text().toLowerCase();
                    $(this).toggle(text.includes(searchTerm));
                });
            });

            $(document).on('click', '.delete-item', function () {
                const itemId = $(this).data('id');
                $('#confirmDelete').data('id', itemId); // Store the ID in the confirm button
                $('#deleteModal').modal('show'); // Show the modal
            });

            $('#confirmDelete').on('click', function () {
                const itemId = $(this).data('id'); // Get the ID from the confirm button

                $.ajax({
                    url: `/delete-lead-favorites/${itemId}`, // Your delete endpoint
                    type: 'DELETE',
                    success: function (response) {
                        toastr.success('Favorite deleted successfully!'); // Show success message
                        $('#deleteModal').modal('hide'); // Hide the modal

                        // Remove the item from the UI
                        $(`span[data-id="${itemId}"]`).remove();
                    },
                    error: function (xhr) {
                        console.error('Error:', xhr);
                        toastr.error('An error occurred while deleting the favorite.'); // Show error message
                    }
                });
            });

            // ------------------------------ Favorite Filter End -----------------------------------------------


            // ------------------------------ On reload Favorite Filter Start -----------------------------------------------

            $('.o-dropdown-item-3').each(function () {
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
            $(document).on('click', '.o_facet_remove', function () {
                var filterId = $(this).data('id');
                $(this).closest('.o_searchview_facet').remove(); // Remove the selected item container

                // Hide the checkmark in the dropdown
                $('.o-dropdown-item-3[data-id="' + filterId + '"] .checkmark').hide();
                $('.o-dropdown-item-3[data-id="' + filterId + '"]').attr('aria-checked', 'false'); // Reset aria-checked attribute
            });

            // Handle item click to select/deselect
            $('.o-dropdown-item-3').on('click', function () {
                var filterId = $(this).data('id');

                // Check if the item is already selected
                if ($(this).attr('aria-checked') === 'true') {
                    // Deselect the item
                    $(this).attr('aria-checked', 'false'); // Mark it as unchecked
                    $(this).find('.checkmark').hide(); // Hide the checkmark

                    // Remove the item from the selected items
                    $('.selected-items .o_searchview_facet').each(function () {
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
            // Function to toggle feedback textarea visibility
            function toggleFeedback(targetDiv) {
                $(targetDiv).toggleClass('d-none');
            }

            // Handling "Mark as Done" for all activities
            $('.o-mail-ActivityListPopoverItem-markAsDone').on('click', function (event) {
                event.stopPropagation(); // Prevent click from closing the popover
                var targetDiv = $(this).data('target');
                toggleFeedback(targetDiv);
            });

            // Prevent textarea click from closing
            $('.feedback-textarea').on('click', function (event) {
                event.stopPropagation(); // Prevent click from closing the popover
            });

            // Feedback submission
            $('.feedback-submit').on('click', function () {
                var feedbackText = $(this).closest('.py-2').find('textarea').val();
                var activityId = $(this).data('id');
                var countElement = $(this).closest('.o-mail-ActivityListPopoverItem').find('b'); // Locate the count element
                var status = countElement.text().split(' ')[0]; // Get the current status (Overdue, Today, Planned)

                submitFeedback(feedbackText, activityId, $(this), countElement, status);
            });

            function submitFeedback(feedbackText, activityId, button, countElement, status) {
                $.ajax({
                    url: '{{ route('lead.submit.feedback') }}',
                    method: 'POST',
                    data: {
                        feedback: feedbackText,
                        activity_id: activityId,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (response) {
                        location.reload(); // Reload the page
                        toastr.success(response.message);
                        button.closest('.hideDiv').addClass('d-none'); // Hide popover after submission

                        // Decrease the count by 1
                        var currentCount = parseInt(countElement.text().match(/\d+/)[0]); // Get the current count
                        countElement.text(`${status} (${currentCount - 1})`); // Update the count with status
                    },
                    error: function (xhr) {
                        console.error(xhr.responseText);
                        toastr.error('An error occurred. Please try again.');
                    }
                });
            }

            // Handle discard button to hide the feedback textarea
            $('.feedback-discard').on('click', function () {
                var targetDiv = $(this).data('target');
                $(targetDiv).addClass('d-none');
            });

            $(function () {
                var currentDate = new Date();

                $(".datepicker").datepicker({
                    dateFormat: "yy-mm-dd",
                    duration: "fast",
                    onSelect: function (dateText, inst) {
                        // Optional: Do something when a date is selected
                        console.log("Selected date: " + dateText);
                    }
                }).datepicker("setDate", currentDate);
            });            

            $('.o-mail-ActivityListPopoverItem-editbtn').on('click', function () {
                var activityId = $(this).closest('.hideDiv').data('id');

                // Fetch activity details using AJAX
                $.ajax({
                    url: '/feedback-activity/' + activityId, // Adjust to your backend route
                    method: 'GET',
                    success: function (data) {
                        // Populate the modal fields with data received
                        $('#edit_activity_id').val(data.id);
                        $('#edit_activity_type').val(data.activity_type);
                        $('#edit_due_date').val(data.due_date);
                        $('#edit_summary').val(data.summary);
                        $('#edit_assigned_to').val(data.assigned_to);

                        $('#edit_log_note').summernote({
                                height: 200,  // Set editor height
                                focus: true,  // Set focus to editable area after modal shown
                                tabsize: 2    // Set tab size
                            });

                        // Set the content of the Summernote editor with the fetched note
                        $('#edit_log_note').summernote('code', data.note);

                        const editModal = new bootstrap.Modal(document.getElementById('editModal'));
                        editModal.show();
                    },
                    error: function (xhr) {
                        toastr.error('Failed to fetch activity details.'); // Show error message
                    }
                });
            });

            // Handle form submission
            $('#editForm').on('submit', function (event) {
                event.preventDefault(); // Prevent default form submission
                var formData = $(this).serialize(); // Serialize the form data

                // AJAX request to update the activity
                $.ajax({
                    url: '{{route('lead.feedback.activity.update')}}', // Adjust with your backend route
                    method: 'POST',
                    data: formData,
                    success: function (response) {
                        toastr.success('Activity updated successfully!'); // Show success message
                        $('#editModal').modal('hide');
                        location.reload();
                    },
                    error: function (xhr) {
                        toastr.error('An error occurred. Please try again.'); // Show error message
                    }
                });
            });

            $('.o-mail-ActivityListPopoverItem-cancel').on('click', function (event) {
                event.stopPropagation(); // Prevent closing of popover
                var activityId = $(this).closest('.hideDiv').data('id'); // Get the activity ID
                var countElement = $(this).closest('.o-mail-ActivityListPopoverItem').find('b'); // Locate the count element
                var status = countElement.text().split(' ')[0]; // Get the current status (Overdue, Today, Planned)
                deleteActivity(activityId, $(this), countElement, status);
            });

            // Function to delete activity via AJAX
            function deleteActivity(activityId, button, countElement, status) {
                $.ajax({
                    url: '/feedback-activity-delete/' + activityId, // Use your delete route
                    method: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}' // Include CSRF token for security
                    },
                    success: function (response) {
                        location.reload(); // Reload the page
                        toastr.success(response.message);
                        button.closest('.hideDiv').addClass('d-none'); // Hide the activity after deletion

                        // Decrease the count by 1
                        var currentCount = parseInt(countElement.text().match(/\d+/)[0]); // Get the current count
                        countElement.text(`${status} (${currentCount - 1})`); // Update the count with status

                        // Check if all activities in Overdue, Today, and Planned are deleted
                        var overdueCount = parseInt($('b:contains("Overdue")').text().match(/\d+/)[0]); // Count in Overdue
                        var todayCount = parseInt($('b:contains("Today")').text().match(/\d+/)[0]); // Count in Today
                        var plannedCount = parseInt($('b:contains("Planned")').text().match(/\d+/)[0]); // Count in Planned

                        var remainingActivities = overdueCount + todayCount + plannedCount;

                        // If all activities are deleted, reload the page
                        if (remainingActivities === 0) {
                            location.reload(); // Reload the page
                        }
                    },
                    error: function (xhr) {
                        console.error(xhr.responseText);
                        toastr.error('An error occurred while deleting the activity. Please try again.');
                    }
                });
            }

            //Upload Document 
            window.uploadFile = function (inputId, activityId) {
                const fileInput = document.getElementById(inputId);
                const file = fileInput.files[0];

                if (!file) {
                    alert('Please select a file to upload.');
                    return;
                }

                const formData = new FormData();
                formData.append('file', file);
                formData.append('activity_id', activityId); // Include the activity ID for database update

                $.ajax({
                    url: '{{ route('lead.uploadFile') }}',  // Change to your backend endpoint
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        if (response.success) {
                            location.reload();
                            // Optionally, update the UI to reflect the new status
                        } else {
                            toastr.error('Failed to upload the file.');
                        }
                    },
                    error: function (xhr) {
                        toastr.error('Error occurred while uploading the file.');
                    }
                });
            };
        });


        $(document).ready(function () {
            $('.o_activity_summary_cell').on('click', function (e) {
                e.stopPropagation(); // Prevent click from bubbling to document

                // Get the popover inside the clicked cell
                let $popover = $(this).find('.o_popover');

                        // Check if the popover is currently visible
                if ($popover.hasClass('d-none')) {
                    // Hide all other popovers
                    $('.o_popover').addClass('d-none');

                    // Show the popover for the clicked cell
                    $popover.removeClass('d-none');

                    // Optional: Adjust the popover's position dynamically (if needed)
                    let offset = $(this).offset();
                    $popover.css({
                        'top': offset.top + $(this).height()
                        , 'left': offset.left
                    });
                }
                else {
                    // If already visible, hide the popover on the second click
                    $popover.addClass('d-none');
                }
            });

            // Click outside to hide the popover
            $(document).on('click', function (e) {
                if (!$(e.target).closest('.o_activity_summary_cell').length) {
                    $('.o_popover').addClass('d-none');
                }
            });

            $('#scheduleActivityModal').on('shown.bs.modal', function () {
                
                var table = $('#example').DataTable({
                    processing: true
                    , serverSide: true
                    , ajax: {
                        url: '{{ route('lead.get') }}'
                        , type: "POST"
                        , data: function (d) {
                            d.search = {
                                value: $('#example_filter input').val()
                            };
                            d.filter = $('#filter').val();
                        }
                    }
                    , order: [
                        [1, 'DESC']
                    ]
                    , pageLength: 10
                    , aoColumns: [{
                        data: 'product_name'
                        , render: function (data, type, row) {
                            if (data) {
                                return data;
                            } else {
                                return '';
                            }
                        }
                    }
                        , {
                        data: 'email'
                        , render: function (data, type, row) {
                            if (data) {
                                return data;
                            } else {
                                return '';
                            }
                        }
                    }
                        , {
                        data: 'city'
                        , render: function (data, type, row) {
                            if (data) {
                                return data;
                            } else {
                                return '';
                            }
                        }
                    }
                        , {
                        data: 'get_state'
                        , render: function (data, type, row) {
                            if (data) {
                                return data.name;
                            }
                            if (row && row.get_auto_state) {

                                return row.get_auto_state.name;
                            }
                            return '';
                        }
                    }
                        , {
                        data: 'get_country'
                        , render: function (data, type, row) {
                            if (data) {
                                return data.name;
                            }
                            if (row && row.get_auto_country) {

                                return row.get_auto_country.name;
                            }
                            return '';
                        }

                    }
                        , {
                        data: 'zip'
                        , render: function (data, type, row) {

                            if (data) {
                                return data;
                            } else {
                                return '';
                            }
                        }
                    }
                        , {
                        data: 'probability'
                        , render: function (data, type, row) {
                            if (data) {
                                return data;
                            } else {
                                return '';
                            }
                        }
                    }
                        , {
                        data: 'company_name'
                        , render: function (data, type, row) {
                            if (data) {
                                return data;
                            } else {
                                return '';
                            }
                        }
                    }
                        , {
                        data: 'address_1'
                        , render: function (data, type, row) {
                            if (data) {
                                return data;
                            } else {
                                return '';
                            }
                        }
                    }
                        , {
                        data: 'address_2'
                        , render: function (data, type, row) {
                            if (data) {
                                return data;
                            } else {
                                return '';
                            }
                        }
                    }
                        , {
                        data: 'website_link'
                        , render: function (data, type, row) {
                            if (data) {
                                return data;
                            } else {
                                return '';
                            }
                        }
                    }
                        , {
                        data: 'contact_name'
                        , render: function (data, type, row) {
                            if (data) {
                                return data;
                            } else {
                                return '';
                            }
                        }
                    }
                        , {
                        data: 'job_postion'
                        , render: function (data, type, row) {
                            if (data) {
                                return data;
                            } else {
                                return '';
                            }
                        }
                    }
                        , {
                        data: 'phone'
                        , render: function (data, type, row) {
                            if (data) {
                                return data;
                            } else {
                                return '';
                            }
                        }
                    }
                        , {
                        data: 'mobile'
                        , render: function (data, type, row) {
                            if (data) {
                                return data;
                            } else {
                                return '';
                            }
                        }
                    }
                        , {
                        data: 'priority'
                        , render: function (data, type, row) {
                            if (data) {
                                return data;
                            } else {
                                return '';
                            }
                        }
                    }
                        , {
                        data: 'get_tilte'
                        , render: function (data, type, row) {
                            if (data) {
                                return data.title;
                            } else {
                                return '';
                            }
                        }
                    }
                        , {
                        data: 'tag'
                        , render: function (data, type, row) {
                            if (data) {
                                return data;
                            } else {
                                return '';
                            }
                        }
                    }
                        , {
                        data: 'get_user'
                        , render: function (data, type, row) {
                            if (data) {
                                return data.email;
                            } else {
                                return '';
                            }
                        }
                    }
                        , {
                        data: 'sales_team'
                        , render: function (data, type, row) {
                            if (data) {
                                return data;
                            } else {
                                return '';
                            }
                        }
                    }
                    ]
                    , createdRow: function (row, data, dataIndex) {
                        $(row).attr('data-id', data.id);
                    }
                });
                let selectedLeadId;
                $('#example tbody').on('click', 'tr', function () {
                    selectedLeadId = $(this).data('id'); // Store the selected lead ID
                    $('#activitiesAddModal').modal('show'); // Show the modal
                });

                $('#activitiesAddModal').on('click', '.btn-secondary', function () {
                    $('#scheduleForm')[0].reset(); // Reset the form
                    selectedLeadId = null; // Clear the selected lead ID
                });

                $('#schedule').on('click', function(e) {
                e.preventDefault(); // Prevent the default form submission
                let action = 'schedule'; // Set the action for the "Schedule" button

                
                // Perform AJAX request
                $.ajax({
                    url: $('#scheduleForm').attr('action'), // Use the form's action
                    method: 'POST',
                    data: $('#scheduleForm').serialize() + '&action=' + action + '&lead_id=' + selectedLeadId,
                    success: function(response) {
                        toastr.success(response.message);
                        $('#activitiesAddModal').modal('hide'); // Hide the modal
                        location.reload(); // Reload the page
                    },
                    error: function(xhr) {
                        // Handle any errors
                        alert('An error occurred while scheduling the activity.');
                    }
                });
            });

            $('#schedule_and_mark_done').on('click', function(e) {
                e.preventDefault(); // Prevent the default form submission
                let action = 'done'; // Set the action for the "Schedule & Mark as Done" button

                // Perform AJAX request
                $.ajax({
                    url: $('#scheduleForm').attr('action'), // Use the form's action
                    method: 'POST',
                    data: $('#scheduleForm').serialize() + '&action=' + action + '&lead_id=' + selectedLeadId,
                    success: function(response) {
                        toastr.success(response.message);
                        $('#activitiesAddModal').modal('hide'); // Hide the modal
                        location.reload(); // Reload the page
                    },
                    error: function(xhr) {
                        // Handle any errors
                        alert('An error occurred while scheduling the activity.');
                    }
                });
            });

            $('#done_and_schedule_next').on('click', function(e) {
                e.preventDefault(); // Prevent the default form submission
                let action = 'next'; // Set the action for the "Done & Schedule Next" button

                // Perform AJAX request
                $.ajax({
                    url: $('#scheduleForm').attr('action'), // Use the form's action
                    method: 'POST',
                    data: $('#scheduleForm').serialize() + '&action=' + action + '&lead_id=' + selectedLeadId,
                    success: function(response) {
                        toastr.success(response.message);
                        // Store a flag in localStorage to indicate the modal should reopen
                        localStorage.setItem('reopenModal', 'true');
                        location.reload(); // Reload the page
                    },
                    error: function(xhr) {
                        // Handle any errors
                        alert('An error occurred while scheduling the activity.');
                    }
                });
            });

            // Check localStorage on page load to reopen the modal if needed
            if (localStorage.getItem('reopenModal') === 'true') {
                $('#activitiesAddModal').modal('show'); // Show the modal
                localStorage.removeItem('reopenModal'); // Clear the flag
            }
                });

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
        document.addEventListener('DOMContentLoaded', function () {
            const toggleButton = document.getElementById('save-current-search');
            const accordionValues = document.querySelector('.o_accordion_values');
            const arrowIcon = toggleButton.querySelector('.arrow-icon');

            toggleButton.addEventListener('click', function (event) {
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