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

@endsection

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css"
    href="https://cdn.datatables.net/colreorder/1.3.2/css/colReorder.dataTables.min.cssive.dataTables.min.css">


    @section('search_div')
<div class="o_popover popover mw-100 o-dropdown--menu dropdown-menu mx-0 o_search_bar_menu d-flex flex-wrap flex-lg-nowrap w-100 w-md-auto mx-md-auto mt-2 py-3"
    role="menu" style="position: absolute; top: 0; left: 0;">
    <div class="o_dropdown_container o_filter_menu w-100 w-lg-auto h-100 px-3 mb-4 mb-lg-0 border-end">
        <div class="px-3 fs-5 mb-2"><i class="me-2 fa fa-filter" style="color: #714b67;"></i>
            <input type="hidden" id="filter" name="filter" value="">

            <h5 class="o_dropdown_title d-inline">Filters</h5>
        </div>
        <span class="o-dropdown-item-2 dropdown-item o-navigable o_menu_item text-truncate activities"
            role="menuitemcheckbox" tabindex="0" title="" aria-checked="false" id="my-pipeline"><span
                class="float-end checkmark" style="display:none;">✔</span>My Pipeline</span>
        <span class="o-dropdown-item-2 dropdown-item o-navigable o_menu_item text-truncate activities"
            role="menuitemcheckbox" tabindex="0" title="" aria-checked="false" id="unassigned"><span
                class="float-end checkmark" style="display:none;">✔</span>Unassigned</span>
        <span class="o-dropdown-item-2 dropdown-item o-navigable o_menu_item text-truncate activities"
            role="menuitemcheckbox" tabindex="0" title="" aria-checked="false" id="open_opportunities"><span
                class="float-end checkmark" style="display:none;">✔</span>Open Opportunities</span>
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
            <button class="o_menu_item o_accordion_toggle creation_time o-navigable text-truncate" tabindex="0"
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
            tabindex="0" title="Won" aria-checked="false"><span
                class="float-end checkmark" style="display:none;">✔</span>Won</span><span
            class="o-dropdown-item-2 dropdown-item o-navigable o_menu_item text-truncate LTFActivities" role="menuitemcheckbox"
            tabindex="0" title="Ongoing" aria-checked="false"><span
                class="float-end checkmark" style="display:none;">✔</span>Ongoing</span><span
            class="o-dropdown-item-2 dropdown-item o-navigable o_menu_item text-truncate LTFActivities" role="menuitemcheckbox"
            tabindex="0" title="Lost" aria-checked="false"><span
                class="float-end checkmark" style="display:none;">✔</span>Lost</span>
        <div class="dropdown-divider" role="separator"></div>
        <span class="o-dropdown-item-2 dropdown-item o-navigable o_menu_item o_add_custom_filter" role="menuitem"
            tabindex="0" style="cursor: pointer;">Add Custom Filter</span>
    </div>
    <div class="o_dropdown_container o_group_by_menu w-100 w-lg-auto h-100 px-3 mb-4 mb-lg-0 border-end">
        <div class="px-3 fs-5 mb-2"><i class="me-2 text-action fa fa-layer-group"></i>
            <h5 class="o_dropdown_title d-inline">Group By</h5>
        </div>
        <span class="o-dropdown-item_1 dropdown-item o-navigable o_menu_item text-truncate" role="menuitemcheckbox"
            tabindex="0" title="" aria-checked="false"> <span class="float-end checkmark"
                style="display:none;">✔</span>Salesperson</span>
        <span class="o-dropdown-item_1 dropdown-item o-navigable o_menu_item text-truncate" role="menuitemcheckbox"
            tabindex="0" title="" aria-checked="false"> <span class="float-end checkmark"
                style="display:none;">✔</span>Sales Team</span>
        <span class="o-dropdown-item_1 dropdown-item o-navigable o_menu_item text-truncate" role="menuitemcheckbox"
            tabindex="0" title="" aria-checked="false"> <span class="float-end checkmark"
                style="display:none;">✔</span>Stage</span>
        <span class="o-dropdown-item_1 dropdown-item o-navigable o_menu_item text-truncate" role="menuitemcheckbox"
            tabindex="0" title="" aria-checked="false"> <span class="float-end checkmark"
                style="display:none;">✔</span>City</span>
        <span class="o-dropdown-item_1 dropdown-item o-navigable o_menu_item text-truncate" role="menuitemcheckbox"
            tabindex="0" title="" aria-checked="false"> <span class="float-end checkmark"
                style="display:none;">✔</span>Country</span>
        <span class="o-dropdown-item_1 dropdown-item o-navigable o_menu_item text-truncate" role="menuitemcheckbox"
            tabindex="0" title="" aria-checked="false"> <span class="float-end checkmark"
                style="display:none;">✔</span>Lost Reason</span>
        <span class="o-dropdown-item_1 dropdown-item o-navigable o_menu_item text-truncate" role="menuitemcheckbox"
            tabindex="0" title="" aria-checked="false"> <span class="float-end checkmark"
                style="display:none;">✔</span>Campaign</span>
        <span class="o-dropdown-item_1 dropdown-item o-navigable o_menu_item text-truncate" role="menuitemcheckbox"
            tabindex="0" title="" aria-checked="false"> <span class="float-end checkmark"
                style="display:none;">✔</span>Medium</span>
        <span class="o-dropdown-item_1 dropdown-item o-navigable o_menu_item text-truncate" role="menuitemcheckbox"
            tabindex="0" title="" aria-checked="false"> <span class="float-end checkmark"
                style="display:none;">✔</span>Source</span>
        <div class="dropdown-divider" role="separator">
        </div>
        <div class="o_accordion position-relative">
            <button class="o_menu_item o_accordion_toggle dropdown-item o-navigable text-truncate"
                style="display: flex;justify-content: space-between;" tabindex="0" aria-expanded="false"
                id="creationDateBtn">
                Creation Date
                <span class="arrow-icon" style="font-size: 10px;margin-top: 4px;">▼</span>
            </button>
            <div class="o_dropdown_content" id="creationDateDropdown"
                style="display: none; position: absolute; z-index: 1000; background: white; border: 1px solid #ccc; width: 100%;">
                <span class="o-dropdown-item_1 dropdown-item"><span style="display:none;">Creation Date:</span> <span
                        class="float-end checkmark" style="display:none;">✔</span>Year</span>
                <span class="o-dropdown-item_1 dropdown-item"><span style="display:none;">Creation Date:</span><span
                        class="float-end checkmark" style="display:none;">✔</span>Quarter</span>
                <span class="o-dropdown-item_1 dropdown-item"><span style="display:none;">Creation Date:</span><span
                        class="float-end checkmark" style="display:none;">✔</span>Month</span>
                <span class="o-dropdown-item_1 dropdown-item"><span style="display:none;">Creation Date:</span><span
                        class="float-end checkmark" style="display:none;">✔</span>Week</span>
                <span class="o-dropdown-item_1 dropdown-item"><span style="display:none;">Creation Date:</span><span
                        class="float-end checkmark" style="display:none;">✔</span>Day</span>
            </div>
        </div>
        <div class="o_accordion position-relative">
            <button class="o_menu_item o_accordion_toggle dropdown-item o-navigable text-truncate" tabindex="0"
                aria-expanded="false" id="closeDateBtn" style="display: flex;justify-content: space-between;">
                Closed Date
                <span class="arrow-icon" style="font-size: 10px;margin-top: 4px;">▼</span>
            </button>
            <div class="o_dropdown_content" id="closeDateDropdown"
                style="display: none; position: absolute; z-index: 1000; background: white; border: 1px solid #ccc; width: 100%;">
                <span class="o-dropdown-item_1 dropdown-item"><span style="display:none;">Closed Date:</span><span
                        class="float-end checkmark" style="display:none;">✔</span>Year</span>
                <span class="o-dropdown-item_1 dropdown-item"><span style="display:none;">Closed Date:</span><span
                        class="float-end checkmark" style="display:none;">✔</span>Quarter</span>
                <span class="o-dropdown-item_1 dropdown-item"><span style="display:none;">Closed Date:</span><span
                        class="float-end checkmark" style="display:none;">✔</span>Month</span>
                <span class="o-dropdown-item_1 dropdown-item"><span style="display:none;">Closed Date:</span><span
                        class="float-end checkmark" style="display:none;">✔</span>Week</span>
                <span class="o-dropdown-item_1 dropdown-item"><span style="display:none;">Closed Date:</span><span
                        class="float-end checkmark" style="display:none;">✔</span>Day</span>
            </div>
        </div>
        <div class="o_accordion position-relative">
            <button class="o_menu_item o_accordion_toggle dropdown-item o-navigable text-truncate" tabindex="0"
                aria-expanded="false" id="conversionBtn" style="display: flex;justify-content: space-between;">
                Conversion Date
                <span class="arrow-icon" style="font-size: 10px;margin-top: 4px;">▼</span>
            </button>
            <div class="o_dropdown_content" id="conversionDate"
                style="display: none; position: absolute; z-index: 1000; background: white; border: 1px solid #ccc; width: 100%;">
                <span class="o-dropdown-item_1 dropdown-item"><span style="display:none;">Conversion Date:</span><span
                        class="float-end checkmark" style="display:none;">✔</span>Year</span>
                <span class="o-dropdown-item_1 dropdown-item"><span style="display:none;">Conversion Date:</span><span
                        class="float-end checkmark" style="display:none;">✔</span>Quarter</span>
                <span class="o-dropdown-item_1 dropdown-item"><span style="display:none;">Conversion Date:</span><span
                        class="float-end checkmark" style="display:none;">✔</span>Month</span>
                <span class="o-dropdown-item_1 dropdown-item"><span style="display:none;">Conversion Date:</span><span
                        class="float-end checkmark" style="display:none;">✔</span>Week</span>
                <span class="o-dropdown-item_1 dropdown-item"><span style="display:none;">Conversion Date:</span><span
                        class="float-end checkmark" style="display:none;">✔</span>Day</span>
            </div>
        </div>
        <div class="o_accordion position-relative">
            <button class="o_menu_item o_accordion_toggle dropdown-item o-navigable text-truncate" tabindex="0"
                aria-expanded="false" id="expectedBtn" style="display: flex;justify-content: space-between;">
                Expected Closing
                <span class="arrow-icon" style="font-size: 10px;margin-top: 4px;">▼</span>
            </button>
            <div class="o_dropdown_content" id="cxpectedClosing"
                style="display: none; position: absolute; z-index: 1000; background: white; border: 1px solid #ccc; width: 100%;">
                <span class="o-dropdown-item_1 dropdown-item"><span style="display:none;">Expected Date:</span><span
                        class="float-end checkmark" style="display:none;">✔</span>Year</span>
                <span class="o-dropdown-item_1 dropdown-item"><span style="display:none;">Expected Date:</span><span
                        class="float-end checkmark" style="display:none;">✔</span>Quarter</span>
                <span class="o-dropdown-item_1 dropdown-item"><span style="display:none;">Expected Date:</span><span
                        class="float-end checkmark" style="display:none;">✔</span>Month</span>
                <span class="o-dropdown-item_1 dropdown-item"><span style="display:none;">Expected Date:</span><span
                        class="float-end checkmark" style="display:none;">✔</span>Week</span>
                <span class="o-dropdown-item_1 dropdown-item"><span style="display:none;">Expected Date:</span><span
                        class="float-end checkmark" style="display:none;">✔</span>Day</span>
            </div>
        </div>
        <div role="separator" class="dropdown-divider"></div>
        <select class="o_add_custom_group_menu o_menu_item dropdown-item">
            <option value="" disabled="true" selected="true" hidden="true">Add Custom Group</option>
            <option value="Active">Active</option>
            <option value="campaign_id">Campaign</option>
            <option value="city">City</option>
            <option value="date_closed">Closed Date</option>
            <option value="company_id">Company</option>
            <option value="partner_name">Company Name</option>
            <option value="contact_name">Contact Name</option>
            <option value="date_conversion">Conversion Date</option>
            <option value="country_id">Country</option>
            <option value="create_uid">Created by</option>
            <option value="create_date">Created on</option>
            <option value="partner_id">Customer</option>
            <option value="email_from">Email</option>
            <option value="lost_reason_id">Lost Reason</option>
            <option value="medium_id">Medium</option>
            <option value="mobile">Mobile</option>
            <option value="name">Opportunity</option>
            <option value="phone">Phone</option>
            <option value="priority">Priority</option>
            <option value="referred">Referred By</option>
            <option value="team_id">Sales Team</option>
            <option value="user_id">Salesperson</option>
            <option value="source_id">Source</option>
            <option value="stage_id">Stage</option>
            <option value="state_id">State</option>
            <option value="street">Street</option>
            <option value="street2">Street2</option>
            <option value="tag_ids">Tags</option>
            <option value="title">Title</option>
            <option value="type">Type</option>
            <option value="website">Website</option>
            <option value="zip">Zip</option>
        </select>
    </div>
    <div class="o_dropdown_container o_favorite_menu w-100 w-lg-auto h-100 px-3">
    <div class="px-3 fs-5 mb-2">
        <i class="me-2 text-favourite fa fa-star"></i>
        <h5 class="o_dropdown_title d-inline">Favorites</h5>
    </div>
    @foreach ($getFavoritesFilter as $favoritesFilter)    
        <span class="o-dropdown-item-3 dropdown-item o-navigable o_menu_item text-truncate"
              role="menuitemcheckbox" tabindex="0" aria-checked="{{ $favoritesFilter->is_default ? 'true' : 'false' }}" 
              data-id="{{ $favoritesFilter->id }}" data-name="{{ $favoritesFilter->favorites_name }}">
            <span class="d-flex p-0 align-items-center justify-content-between">
                <span class="text-truncate flex-grow-1" title="">{{ $favoritesFilter->favorites_name ?? '' }}
                    <span class="float-end checkmark" style="display:none;">✔</span>
                </span>
            </span>
        </span>
        <i class="ms-1 fa fa-trash-o delete-item" title="Delete item" data-id="{{ $favoritesFilter->id }}"></i>
    @endforeach

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
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
                    <button type="button" class="btn btn-primary" id="confirmDelete" style="background-color:#714B67;border: none;font-weight: 500;">Delete Filter</button>
                    <button type="button" class="btn btn-secondary text-black" style="background-color:#e7e9ed;border: none;font-weight: 500;" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <div role="separator" class="dropdown-divider"></div>
    <div class="o_accordion position-relative">
        <button id="save-current-search" class="o_menu_item o_accordion_toggle search-dropdown-item o-navigable o_add_favorite text-truncate" tabindex="0" aria-expanded="false">
            Save current search
            <span class="arrow-icon" style="font-size: 10px; margin-top: 4px;">▼</span>
        </button>
        <div class="o_accordion_values ms-4 border-start">
            <div class="px-3 py-2">
                <input type="text" class="o_input favorites_input" id="lead_favorites" name="favorites_name" value="Pipeline" placeholder="Enter favorite name">
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
    aria-labelledby="customFilterModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg">
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
                            <!-- Initial rule row -->
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
                        {{-- <div class="o_tree_editor_row d-flex align-items-center">
                            <a id="addNewRule" style="color: #017E84;" href="#" role="button">New Rule</a>
                        </div> --}}
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


<style>
      .dropdown-btn {
        background-color: #f1f1f1;
        border: none;
        cursor: pointer;
        padding: 10px;
        border-radius: 5px;
        position: relative;
    }

    .hide-show-dropdown-menu {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: auto !important;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 999;
        /* Ensure it stays above the table */
        padding: 10px;
        left: 0;
        /* Align with the button */
    }

    .dropdown-menu {
        display: none;
        position: fixed;
        background-color: #f9f9f9;
        min-width: 623px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
        top: auto;
        right: 0;
        left: auto;
    }

    .dropdown-menu a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        cursor: pointer;
    }

    .dropdown-menu-setting {
        display: none;
        position: absolute;
        background-color: #F9F9F9;
        min-width: auto;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 100;
        top: auto;
        left: auto;
        border: 1px solid rgba(0, 0, 0, .15);
        border-radius: .25rem;
    }
    .dropdown-menu-setting.show {
        display: block !important;
    }

    .dropdown-menu-setting a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        cursor: pointer;
    }

    .dropdown-menu-setting a:hover {
        background-color: #ddd;
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

    .arrow-icon {
        display: inline-block;
        transition: transform 0.3s ease;
        /* Smooth transition */
    }

    .rotate {
        transform: rotate(180deg);
        /* Rotate the arrow */
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

    .remove-tag {
        margin-left: 5px;
        cursor: pointer;
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

    .main_header_wrapper .o_form_button_save {
        display: none;
    }

    .o_priority_star.fa-star {
        color: #f3cc00;
        /* Color for filled stars */
    }

    .o_priority_star.fa-star-o {
        color: gray;
        /* Color for empty stars */
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
    .favorites_input {

        border: 0 !important;
        border-bottom: 1px solid #d8dadd !important;
        border-radius: 0 !important;
        padding: 0 !important;
        margin-bottom: 5px;
    }


    tbody#lead-table-body tr:hover {
        background-color: #fafafa !important;
    }

    tbody#lead-table-body tr:hover td {
        background-color: #fafafa !important;
    }

    table.dataTable thead th,
    table.dataTable thead td {
        padding: 10px 18px;
        border-bottom: 1px solid #11111147;
        border-top: 1px solid #11111147;
        background: #f1f1f1;
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
        background-color: #ffffff !important;
    }

    .o_accordion_toggle::after {
        display: none;
    }
    .breadcrumb {
        display: none !important;
    } 
    .head_breadcrumb_info{
     gap: 0px !important;
    }

    .o-dropdown-item-3 {
        margin-left: -22px;
    }

    .delete-item {
       margin-left: 133px !important;
        cursor: pointer;
        position: absolute;
        margin-top: -21px;
    }
    #pieChart {
        width: 2000px !important;  /* Set fixed width */
        height: 600px !important; /* Set fixed height */
    }
    a.group-setting-icon {
        padding-right: 35px;
    }
</style>

<div class="o_graph_renderer o_renderer h-100 d-flex flex-column border-top undefined">
    <div class="d-flex d-print-none gap-1 flex-shrink-0 mt-2 mx-3 mb-3 overflow-x-auto">
        <!-- <div class="btn-group" role="toolbar" aria-label="Main actions">
            <button class="btn btn-primary o-dropdown dropdown-toggle dropdown" aria-expanded="false"> Measures <i
                    class="fa fa-caret-down ms-1"></i></button>
        </div>
        <div class="btn-group" role="toolbar" aria-label="Insert in Spreadsheet">
            <button class="btn btn-secondary o_graph_insert_spreadsheet"> Insert in Spreadsheet </button>
        </div> -->
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

@endsection

@push('scripts')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- DataTables JS -->
<script type="text/javascript" charset="utf8"
    src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" charset="utf8"
    src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://legacy.datatables.net/extras/thirdparty/ColReorderWithResize/ColReorderWithResize.js"></script>

<script>
 $(document).ready(function () {

    let stages = @json($stages);
let datasets = @json($datasets);

// Function to generate a distinct color
const getDistinctColor = (() => {
    const colors = [
        'rgba(255, 99, 132, 0.6)',
        'rgba(54, 162, 235, 0.6)',
        'rgba(255, 206, 86, 0.6)',
        'rgba(75, 192, 192, 0.6)',
        'rgba(153, 102, 255, 0.6)',
        'rgba(255, 159, 64, 0.6)',
        'rgba(201, 203, 207, 0.6)',
    ];
    let colorIndex = 0;
    return function() {
        const color = colors[colorIndex % colors.length];
        colorIndex++;
        return color;
    };
})();

function prepareChartData() {
    const stageEntries = Object.entries(stages);
    const labels = stageEntries.map(([stageId]) => stages[stageId]?.title || 'Unknown Stage');

    let stageTotals = {};

    for (const stageId in datasets) {
        const userDatas = datasets[stageId]?.data;
        if (!userDatas) continue;

        for (const salesPerson in userDatas) {
            const userData = userDatas[salesPerson];
            if (!stageTotals[stageId]) {
                stageTotals[stageId] = { total: 0, users: [] };
            }
            stageTotals[stageId].total += userData.total;

            const userColor = userData.backgroundColor || getDistinctColor();
            stageTotals[stageId].users.push({
                label: userData.label,
                total: userData.total,
                backgroundColor: userColor
            });
        }
    }

    let chartData = {
        labels: labels,
        datasets: []
    };

    for (const [stageId, { users }] of Object.entries(stageTotals)) {
        users.forEach(user => {
            const dataEntry = {
                label: user.label,
                data: Array(stageEntries.length).fill(0),
                backgroundColor: user.backgroundColor,
                stack: stageId
            };
            dataEntry.data[stageEntries.findIndex(([id]) => id === stageId)] = user.total;
            chartData.datasets.push(dataEntry);
        });
    }

    return chartData;
}

// Create the initial lead chart (stacked bar)
let leadCtx = document.getElementById('leadChart').getContext('2d');
let leadChart = new Chart(leadCtx, {
    type: 'bar',
    data: prepareChartData(),
    options: {
        responsive: true,
        scales: {
            y: { beginAtZero: false },
            x: { stacked: true, barThickness: 80 }
        },
        plugins: {
            tooltip: {
                callbacks: {
                    label: function (tooltipItem) {
                        const label = tooltipItem.dataset.label || '';
                        const total = tooltipItem.raw || 0;
                        return `${label}: ${total}`;
                    }
                }
            }
        }
    }
});

// Initialize pie chart data
function preparePieChartData() {
    let pieChartData = { labels: [], datasets: [{ data: [], backgroundColor: [] }] };

    for (const stageId in datasets) {
        const userDatas = datasets[stageId]?.data;
        const stageName = stages[stageId]?.title || 'Unknown Stage';

        if (!userDatas) continue;

        for (const salesPerson in userDatas) {
            pieChartData.labels.push(`${userDatas[salesPerson].label} (${stageName})`);
            pieChartData.datasets[0].data.push(userDatas[salesPerson].total);
            pieChartData.datasets[0].backgroundColor.push(userDatas[salesPerson].backgroundColor || getDistinctColor());
        }
    }

    return pieChartData;
}

// Create the initial pie chart
let pieCtx = document.getElementById('pieChart').getContext('2d');
let pieChart = new Chart(pieCtx, {
    type: 'pie',
    data: preparePieChartData(),
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            tooltip: {
                callbacks: {
                    label: function (tooltipItem) {
                        const label = tooltipItem.label || '';
                        const total = tooltipItem.raw || 0;
                        return `${label}: ${total}`;
                    }
                }
            }
        }
    }
});

var chartColors = {
    lineBackground: 'rgba(167, 210, 247, 1)',
    lineBorder: 'rgba(75, 192, 192, 0.5)',
    pointBackground: 'rgba(75, 192, 192, 0)'
};

// Handle chart type switching and canvas visibility toggling
$('.o_graph_button').on('click', function () {
    $('.o_graph_button').removeClass('active');
    $(this).addClass('active');

    const selectedChartType = $(this).data('mode');  // 'line' or 'bar' will be set here

    if (selectedChartType === 'pie') {
        $('#leadChart').hide();
        $('#pieChart').show();
    } else {
        $('#pieChart').hide();
        $('#leadChart').show();

        // Destroy the previous chart instance
        if (leadChart) {
            leadChart.destroy();
        }

        // Recreate the chart with the selected chart type
        leadChart = new Chart(leadCtx, {
            type: selectedChartType,  // This will now be 'line' when you click the line chart button
            data: prepareChartData(),  // Prepare the chart data
            options: {
                responsive: true,
                scales: {
                    y: { beginAtZero: true },
                    x: { 
                        stacked: selectedChartType === 'bar'  // Stack bars if it's a bar chart
                    }
                },
                elements: {
                    line: {
                        tension: 0.4,  // Smooth line for the line chart
                        fill: true,  // Fill under the line
                        backgroundColor: chartColors.lineBackground,
                        borderColor: chartColors.lineBorder
                    },
                    point: {
                        backgroundColor: chartColors.pointBackground
                    }
                },
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function (tooltipItem) {
                                const label = tooltipItem.dataset.label || '';
                                const total = tooltipItem.raw || 0;
                                return `${label}: ${total}`;
                            }
                        }
                    }
                }
            }
        });
    }

    // Update the chart with the filtered data (if any)
    updateChart3(filteredData);
});



// Initialize selectedTags for filtering
let selectedTags = [];

// Function to update selectedTags based on user input
function updateSelectedTags() {
    selectedTags = []; // Reset the array
    $('input[name="tags"]:checked').each(function() {
        selectedTags.push($(this).val());
    });
}

// Call this function whenever the user changes their selection
$('input[name="tags"]').on('change', updateSelectedTags);

// Function to update the charts with new data
function updateChart3(newData) {
    if (!Array.isArray(newData)) {
        console.error('Invalid data format:', newData);
        return;
    }

    // Reset the chart data to start fresh
    const newLabels = [];
    const newDatasetData = [];

    // Populate the chart with the new data from the response
    newData.forEach(item => {
        const salesperson = item.sales_person || 'Unassigned';
        const leadCount = item.lead_count;

        newLabels.push(salesperson);
        newDatasetData.push(leadCount);
    });

    // Update the bar chart data
    leadChart.data.labels = newLabels;
    leadChart.data.datasets[0].data = newDatasetData;
    leadChart.update();

    // Also update the pie chart if it exists
    if (pieChart) {
        pieChart.data.labels = newLabels;
        pieChart.data.datasets[0].data = newDatasetData;
        pieChart.update();
    }
}


// Filter data function
function filterData(selectedTags) {
    $.ajax({
        url: '{{ route('crm.graph.pipeline.filter') }}',
        method: 'GET',
        data: { tags: selectedTags },
        success: function (response) {
            stages = response.stages;
            datasets = response.datasets;

            // Refresh charts with new data
            leadChart.data = prepareChartData();
            leadChart.update();

            pieChart.data = preparePieChartData();
            pieChart.update();
        }
    });
}

// Function to filter based on selected tags
function filter(selectedTags) {
    if (!selectedTags.length) {
        console.warn('No tags selected for filtering.');
        return;
    }

    $.ajax({
        url: '{{ route('lead.lead.grapg.group.pipeline.filter') }}',
        type: 'GET',
        data: {
            selectedTags: JSON.stringify(selectedTags)
        },
        success: function (response) {
            if (response && response.counts) {
                filteredData = response.counts; // Store filtered data globally
                updateChart3(filteredData);  // Update the chart with the new data
            } else {
                console.error('Invalid response structure:', response);
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.error('Failed to fetch data', textStatus, errorThrown);
        }
    });
}
    $(document).on('click', '.custom-filter-remove', function () {
        $('#search-input').val('').attr('placeholder', 'Search...');
        table.ajax.reload();
    });

    // CSRF token setup for AJAX requests
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


// -------------------------------------------- Activities Start ------------------------------------------------------------------
      


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

       $(document).on('click', '.setting-icon', function (e) {
            e.preventDefault();
            var id = $(this).data('span_id');
            console.log(id, 'span_id');

            // Set the value of the hidden input
            $('#span_id').val(id);

            // Show the modal
            var modal = new bootstrap.Modal(document.getElementById('customFilterModal'));
            modal.show();
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
                $tag.prepend('<a href="#"  class="setting-icon CRIcon_tag">' +
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
        

        // ------------------------------ Creation Date and Closed Date End -----------------------------------------------


            $('.add_filter').on('click', function (event) {
                event.preventDefault();
                var filterType = $('#customer_filter_select').val();
                var filterValue = $('#customer_filter_input_value').val();
                var operatesValue = $('#customer_filter_operates').val();
                var span_id = $('#span_id').val();

                $('.selected-items .o_searchview_facet').remove();
                $('.o-dropdown-item-3').attr('aria-checked', 'false'); // Reset all aria-checked attributes
                $('.o-dropdown-item-3 .checkmark').hide(); // Hide all checkmarks

                

                handleTagSelection(filterType, operatesValue, filterValue, span_id);

                // Prepare data to send
                var data = {
                    filterType: filterType,
                    filterValue: filterValue,
                    operatesValue: operatesValue
                };

                // Send AJAX request
                $.ajax({
                    url: '{{route('crm.pipeline.custom.filter')}}',
                    type: 'POST',
                    data: data,
                    success: function (response) {
                       
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


            // Optionally, you could send a request to update the filters on the server if necessary
        });
        

        // Handle item selection from dropdown
        $(document).on('click', '.o-dropdown-item_1', function (e) {
            e.stopPropagation();
            $('.tag').remove();
            $('.o-dropdown-item-2 .checkmark').hide();
            $('.tag1').remove();
            $('.lost_span:contains("Lost")').find('.checkmark').hide();
            $('.LTFtag').remove();
            $('.LTFActivities .checkmark').hide();
            $('.CRtag').remove();
            $('#creationDateDropdown1 .o-dropdown-item_2 .checkmark').hide();
            var $item = $(this);
            var selectedValue = $item.clone().find('.checkmark').remove().end().text().trim();
            handleTagSelectionGrop(selectedValue, $item);
        });

        // Listen to changes in the select dropdown
        $('.o_add_custom_group_menu').on('change', function (e) {
            var selectedValue = $(this).find('option:selected').text().trim();
            handleTagSelectionGrop(selectedValue);
            $(this).val(''); // Reset the select after selecting an option
        });


        // Function to handle tag selection
        function handleTagSelectionGrop(selectedValue, $item = null) {
            var $tag = $('.group_by_tag');
            var $tagItem = $('.tag-item[data-value="' + selectedValue + '"]');

            if ($tagItem.length > 0) {
                // Remove selected value
                $tagItem.remove();
                updateTagSeparatorsGrop();

                if ($tag.children().length === 0) {
                    $tag.remove();
                    $('#search-input').val('').attr('placeholder', 'Search...');
                }

                if ($item) {
                    $item.find('.checkmark').hide();
                }

                let selectedTags = [];
                $('.tag-item').each(function () {
                    selectedTags.push($(this).data('value'));
                });

                if (selectedTags.length == 0) {
                   location.reload();
                }
                filter(selectedTags);

            } else {
                // Add selected value
                var newTagHtml = '<span class="tag-item" data-value="' + selectedValue + '">' + selectedValue + '</span>';

                // Check if the tag already exists
                if ($('.tag-item[data-value="' + selectedValue + '"]').length === 0) {
                    // If no tags exist, create a new group_by_tag span
                    if ($('.group_by_tag').length === 0) {
                        $('#search-input').before(
                            '<span class="group_by_tag">' +
                            '<a href="#"class="setting-icon icon_tag">' +
                            '<span class="setting_icon se_filter_icon setting-icon"><i class="fa fa-filter"></i></span>' +
                            '<span class="setting_icon setting_icon_hover setting-icon"><i class="fa fa-fw fa-cog"></i></span>' +
                            '</a>' +
                            newTagHtml +
                            '<span class="remove_tag_group_by" style="cursor:pointer">×</span>' +
                            '</span>'
                        );
                    } else {
                        // Append to existing group_by_tag span
                        $('.group_by_tag').append(' ' + newTagHtml);
                    }
                    updateTagSeparatorsGrop();
                }

                if ($item) {
                    $item.find('.checkmark').show();
                }

                $('#search-input').val('');
                $('#search-input').attr('placeholder', '');

                // Collect selected tags
                let selectedTags = [];
                $('.tag-item').each(function () {
                    selectedTags.push($(this).data('value'));
                });
                filter(selectedTags);
            }

            $('#search-dropdown').hide();
        }

        // The rest of your code remains unchanged

        // Update tag separators and remove button
        function updateTagSeparatorsGrop() {
            var $tag = $('.group_by_tag');
            var $tagItems = $tag.find('.tag-item');
            var html = '';
            $tagItems.each(function (index) {
                html += $(this).prop('outerHTML');
                if (index < $tagItems.length - 1) {
                    html += ' > ';
                }
            });
            html += ' <span class="remove_tag_group_by" style="cursor:pointer">&times;</span>';
            $tag.html(html);
            updateRemoveTagButtonGrop();
        }

        // Update/remove tag button
        function updateRemoveTagButtonGrop() {
            var $tag = $('.group_by_tag');

            if ($tag.find('.fa-list').length === 0) {
                $tag.prepend('<a href="#" class="group-setting-icon icon_tag">' +
                    '<span class="setting_icon" style="cursor: default;background-color: rgb(1 126 132) !important;"><i class="fa-solid fa-layer-group"></i></span>' +
                    '</a>'
                );
            }

            if ($tag.find('.tag-item').length > 0) {
                if ($('.remove_tag_group_by').length === 0) {
                    $tag.append(' <span class="remove_tag_group_by" style="cursor:pointer">&times;</span>');
                }
            } else {
                $('.remove_tag_group_by').remove();
                $('.icon_tag').remove();
            }
        }


        // Remove all tags
        $(document).on('click', '.remove_tag_group_by', function () {
            $('.group_by_tag').remove();
            $('.o-dropdown-item_1  .checkmark').hide();
            $('#search-input').val('').attr('placeholder', 'Search...');
            $('#filter').val(''); // Clear the filter value
            location.reload();
        });
        // $(document).on('click', '.remove-tag', function () {
        //     $('.tag').remove();
        //     $('.o-dropdown-item-2 .checkmark').hide();
        //     $('#search-input').val('').attr('placeholder', 'Search...');
        //     $('#filter').val(''); // Clear the filter value
        // });

        // Hide dropdown when clicking outside
        $(document).on('click', function (e) {
            if (!$(e.target).closest('#search-input, #search-dropdown').length) {
                $('#search-dropdown').hide();
            }
        });

        // Search functionality
        $('.o_save_favorite').on('click', function(event) {
            event.preventDefault(); // Prevent default form submission

            const favoriteName = $('#lead_favorites').val(); // Ensure this matches your input field
            const isDefault = $('#checkbox-comp-70').is(':checked');
            const isShared = $('#checkbox-comp-71').is(':checked');

            if (favoriteName) {
                $.ajax({
                    url: '{{ route('crm.pipeline.favorites.filter') }}', // Your API endpoint
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
             event.stopPropagation(); 
            const itemId = $(this).data('id');
            $('#confirmDelete').data('id', itemId); // Store the ID in the confirm button
            var modal = new bootstrap.Modal(document.getElementById('deleteModal'));
            modal.show();
        });

        $('#confirmDelete').on('click', function() {
            const itemId = $(this).data('id'); // Get the ID from the confirm button

            $.ajax({
                url: `/pipeline-delete-favorites/${itemId}`, // Your delete endpoint
                type: 'DELETE',
                success: function(response) {  
                    console.log(response.favorite)                  
                    toastr.success('Favorite deleted successfully!'); // Show success message
                    $(`span[data-id="${itemId}"]`).remove();
                    $(`i[data-id="${itemId}"]`).remove();
                    if (response.favorite.is_default === '1') {
                        $('.selected-items .o_searchview_facet').remove();
                    }
                    $('#deleteModal').removeClass('show').css('display', 'none');

                    // Remove the item from the UI
                },
                error: function(xhr) {
                    console.error('Error:', xhr);
                    toastr.error('An error occurred while deleting the favorite.'); // Show error message
                }
            });
        });

        // ------------------------------ Favorite Filter End -----------------------------------------------
               
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