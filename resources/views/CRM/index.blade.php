@extends('layout.header')
{{--@section('head_new_btn_link', route('crm.show' , ['crm' => 'new']))--}}
@section('lead', route('crm.pipeline.list'))
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

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css"
    href="https://cdn.datatables.net/colreorder/1.3.2/css/colReorder.dataTables.min.cssive.dataTables.min.css">

@section('head_breadcrumb_title', 'Pipeline')
@section('head')
@vite([
'resources/css/crm_2.css',
])
@endsection

@section('setting_menu')

    <div role="separator" class="dropdown-divider"></div>
    <a href="{{route('crm.importpipline')}}" class="o-dropdown-item dropdown-item o-navigable o_menu_item mark_lost_lead" role="menuitem" tabindex="0"><i class= "fa fa-fw fa-download me-1"></i>Import records </a>

       

        
@endsection

@section('content')


@section('search_div')
<div class="o_popover popover mw-100 o-dropdown--menu filter-dropdown-menu mx-0 o_search_bar_menu d-flex flex-wrap flex-lg-nowrap w-100 w-md-auto mx-md-auto mt-2 py-3"
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
                    <span class="checkmark" style="display:none;">✔</span>
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
    .o_dropdown_kanban {
        position: relative;
    }

    .custom-dropdown {
        position: absolute;
        top: 100%;
        right: 0;
        background-color: white;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        padding: 10px;
        border-radius: 4px;
        width: 150px;
        z-index: 1000;
    }

    .dropdown-item {
        padding: 5px 10px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .dropdown-item:hover {
        background-color: #f1f1f1;
    }

    .color-options {
        display: flex;
        flex-wrap: wrap;
        gap: 5px;
        margin-top: 10px;
    }

    .color-box {
       width: 20px;
        height: 20px;
        border-radius: 4px;0-
        cursor: pointer;
        border: black;
        border-style: double;
        border-width: 1px;
    }
    .o-mail-ActivityListPopover {
    width: 100%;
    max-height: 100%;
}
    .o_popover {
        width: 100%;
        margin: 0 !important;
    }
    #main_discard_btn{
    display: none;
    }
    .head_breadcrumb_info {
        gap: 0px !important;
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
    
    #main_save_btn {
        display: none;
    }

    .filter-dropdown-menu {
        display: none;
        position: absolute;
        background-color: #F9F9F9;
        min-width: 623px !important;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
        top: auto;
        right: auto;
        left: 6%;
        overflow-y: scroll;
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
        padding: 7px;
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


    .delete-item {
       margin-left: 133px !important;
        cursor: pointer;
        position: absolute;
        margin-top: -21px;
    }
 a.group-setting-icon {
        padding-right: 35px;
    }
</style>
<div class="o_content" style="height: 100%">
    <div class="o_kanban_renderer o_renderer d-flex o_kanban_grouped align-content-stretch">
    
      
          @foreach($crmStages as $stage)
            <div class="o_kanban_group flex-shrink-0 flex-grow-1 flex-md-grow-0 o_group_draggable {{ $stage->sales->count() > 0 ? '' : 'o_kanban_no_records' }}" data-id="{{ $stage->id }}">
                <div class="o_kanban_header position-sticky top-0 z-index-1 py-2">
                    <div class="o_kanban_header_title position-relative d-flex lh-lg">
                        <span class="o_column_title flex-grow-1 d-inline-block mw-100 text-truncate fs-4 fw-bold align-top text-900">{{ $stage->title }}</span>
                        <div class="o_kanban_config"><button class="btn px-2 o-dropdown dropdown-toggle dropdown" aria-expanded="false"><i class="fa fa-gear opacity-50 opacity-100-hover" role="img" aria-label="Settings" title="Settings"></i></button></div>
                        <button class="o_kanban_quick_add new-lead-btn btn pe-2 me-n2">
                            <i class="fa fa-plus opacity-75 opacity-100-hover" role="img" aria-label="Quick add" title="Quick add"></i>
                        </button>
                    </div>

                    <div class="o_kanban_counter position-relative d-flex align-items-center justify-content-between {{ $stage->sales->count() > 0 ? '' : 'opacity-25' }}">
                        <div class="o_column_progress progress bg-300 w-50">


                                    <?php

                                        $overdueCount = 0;
                                        $todayCount = 0;
                                        $plannedCount = 0;
                                        $totalCount = 0; 
                                    ?>

                                    @foreach($stage->sales as $sale)
                                        @php
                                            $now = \Carbon\Carbon::now();
                                            $startOfToday = $now->copy()->startOfDay();

                                            // Filter activities for overdue, today, and planned
                                            $overdueActivities = $sale->activities->filter(function ($activity) use ($startOfToday) {
                                                $dueDate = \Carbon\Carbon::parse($activity->due_date);
                                                return $dueDate->lessThan($startOfToday);
                                            });

                                            $todayActivities = $sale->activities->filter(function ($activity) use ($now) {
                                                $dueDate = \Carbon\Carbon::parse($activity->due_date);
                                                return $now->isSameDay($dueDate);
                                            });

                                            $plannedActivities = $sale->activities->filter(function ($activity) use ($now) {
                                                $dueDate = \Carbon\Carbon::parse($activity->due_date);
                                                return $now->lt($dueDate);
                                            });

                                            // Increment the counters
                                            $overdueCount += $overdueActivities->count();
                                            $todayCount += $todayActivities->count();
                                            $plannedCount += $plannedActivities->count();
                                            $totalCount = $overdueCount + $todayCount + $plannedCount; // Update total count
                                        @endphp
                                    @endforeach

                                    <!-- Prevent division by zero by checking if totalCount is greater than zero -->
                                    @php
                                        $overduePercentage = $totalCount > 0 ? ($overdueCount / $totalCount) * 100 : 0;
                                        $todayPercentage = $totalCount > 0 ? ($todayCount / $totalCount) * 100 : 0;
                                        $plannedPercentage = $totalCount > 0 ? ($plannedCount / $totalCount) * 100 : 0;
                                    @endphp

                                    <div class="progress">
                                        <div id="overdue" role="progressbar" class="progress-bar bg-danger" style="width: {{ $overduePercentage }}px" aria-label="Overdue" title="Overdue ({{$overdueCount}})"></div>
                                        <div id="today" role="progressbar" class="progress-bar bg-warning" style="width: {{ $todayPercentage }}px" aria-label="Today" title="Today ({{$todayCount}})"></div>
                                        <div id="planned" role="progressbar" class="progress-bar bg-success" style="width: {{ $plannedPercentage }}px" aria-label="Planned" title="Planned ({{$plannedCount}})"></div>
                                    </div>


                         
                        </div>
                         <?php
                        $totalExpertMrr = 0; // Initialize total sum variable                                                                                                                                                                                                                       
                        ?>

                        @foreach($stage->sales as $sale) 
                            @if($sale->recurring_revenue && $sale->getRecurringPlan && $sale->getRecurringPlan->months)
                                <?php
                                    $revenue = floatval($sale->recurring_revenue);
                                    $months = floatval($sale->getRecurringPlan->months);
                                    $expertMrr = ($months > 0) ? $revenue / $months : 0; // Set to 0 if months are invalid

                                    // Add to total
                                    $totalExpertMrr += $expertMrr; 
                                ?>
                            @endif
                        @endforeach
                        <div class="o_animated_number ms-2 text-900 text-nowrap cursor-default false" title="Expected Revenue" data-target="{{ number_format($totalExpertMrr, 00) }}"><b> {{ number_format($totalExpertMrr, 2) }}</b></div>
                        <div class="o_animated_number ms-2 text-900 text-nowrap cursor-default false" title="Expected Revenue" data-target="{{ $stage->totalExpectedRevenue() }}"><b>0</b></div>
                    </div>
                </div>

                <div id="append-container-new"  class="append-container-new"></div>

                @foreach($stage->sales as $sale)
             
                <div role="article" class="o_kanban_record sale-card d-flex o_draggable oe_kanban_card_undefined o_legacy_kanban_record" data-id="{{$sale->id}}" tabindex="0">
                    <div class="oe_kanban_color_0 oe_kanban_global_click oe_kanban_card d-flex flex-column">
                        <div class="oe_kanban_color w-5 " data-id="{{$sale->id}}" style="width: 3px;background: {{$sale->is_side_colour}};height: 100%;position: absolute;top: 0;left: 0;"></div>
                        @if(isset($sale) && $sale->is_lost == 2)
                        <div class="o_widget o_widget_web_ribbon">
                            <div class="ribbon ribbon-top-right">
                                <span class="text-bg-danger" title="">Lost</span>
                            </div>
                        </div>
                        @endif
                        <div class="oe_kanban_content flex-grow-1" data-id="{{ $sale->id }}" >
                            <div class="oe_kanban_details"><strong class="o_kanban_record_title"><span>{{ $sale->opportunity }}</span></strong></div>
                            <div class="o_kanban_record_subtitle">
                               @if($sale->expected_revenue != '0.00')
                                    <div name="expected_revenue" class="o_field_widget o_field_monetary">
                                        <span>₹&nbsp;{{ number_format($sale->expected_revenue, 2) }}</span> &nbsp; + &nbsp;
                                        <span>₹&nbsp;{{ number_format($sale->recurring_revenue, 2) }}</span>
                                        @if($sale->getRecurringPlan) 
                                            &nbsp; <span>{{ $sale->getRecurringPlan->plan_name ?? ''}}</span>
                            
                                        @endif
                                    </div>
                                @endif
                            </div>
                            @if($sale->contact)
                            <div>
                                <span class="o_text_overflow">{{ optional($sale->contact)->name }}</span>
                            </div>
                            @endif
                            <div>
                                <div name="tag_ids" class="o_field_widget o_field_many2many_tags">
                                  
                                    <div class="d-flex flex-wrap gap-1"> 
                                     @foreach($sale->tags() as $tag)  
                                      <span class="badge badge-primary" style="background:{{$tag->color}};border-radius: 23px">{{ $tag->name }}</span>
                                        @endforeach
                                        
                                   
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div name="lead_properties" class="o_field_widget o_field_properties">
                                    <div class="w-100 fw-normal text-muted"></div>
                                </div>
                            </div>
                        </div>
                        <div class="oe_kanban_footer">
                            <div class="o_kanban_record_bottom">
                                <div class="oe_kanban_bottom_left">
                                    <div name="priority" class="o_field_widget o_field_priority">
                                        <div class="o_priority set-priority" role="radiogroup" name="priority" aria-label="Priority">
                                            <a href="#" class="o_priority_star fa {{ $sale->priority == 'medium' || $sale->priority == 'high' || $sale->priority == 'very_high' ? 'fa-star' : 'fa-star-o' }}" role="radio" tabindex="-1" data-value="medium" data-tooltip="Priority: Medium" aria-label="Medium"></a><a href="#" class="o_priority_star fa {{ $sale->priority == 'high' || $sale->priority == 'very_high' ? 'fa-star' : 'fa-star-o' }}" role="radio" tabindex="-1" data-value="high" data-tooltip="Priority: High" aria-label="High"></a><a href="#" class="o_priority_star fa {{ $sale->priority == 'very_high' ? 'fa-star' : 'fa-star-o' }}" role="radio" tabindex="-1" data-value="very_high" data-tooltip="Priority: Very High" aria-label="Very High"></a>
                                        </div>
                                    </div>
                                     {{-- @foreach($sale->activities as $activity) --}}
                                        @php
                                            $now = \Carbon\Carbon::now();
                                            $startOfToday = $now->copy()->startOfDay();

                                          
                                            // Calculate the counts for each status
                                            $overdueActivities = $sale->activities->filter(function ($activity) use ($startOfToday) {
                                                $dueDate = \Carbon\Carbon::parse($activity->due_date);
                                                return $dueDate->lessThan($startOfToday);
                                            });

                                            $todayActivities = $sale->activities->filter(function ($activity) use ($now) {
                                                $dueDate = \Carbon\Carbon::parse($activity->due_date);
                                                return $now->isSameDay($dueDate);
                                            });

                                            $plannedActivities = $sale->activities->filter(function ($activity) use ($now) {
                                                $dueDate = \Carbon\Carbon::parse($activity->due_date);
                                                return $now->lt($dueDate);
                                            });

                                            $overdueCount = $overdueActivities->count();
                                            $todayCount = $todayActivities->count();
                                            $plannedCount = $plannedActivities->count();
                                        @endphp
                                        @php
                                            $now = \Carbon\Carbon::now();
                                            $startOfToday = $now->copy()->startOfDay();

                                            // Get the first overdue activity
                                            $firstOverdueActivity = $sale->activities->filter(function ($activity) use ($startOfToday) {
                                                $dueDate = \Carbon\Carbon::parse($activity->due_date);
                                                return $dueDate->lessThan($startOfToday); // Activity is overdue
                                            })->first();

                                            // Get the first activity due today
                                            $firstTodayActivity = $sale->activities->filter(function ($activity) use ($now) {
                                                $dueDate = \Carbon\Carbon::parse($activity->due_date);
                                                return $now->isSameDay($dueDate); // Activity is due today
                                            })->first();

                                            // Get the first planned activity
                                            $firstPlannedActivity = $sale->activities->filter(function ($activity) use ($now) {
                                                $dueDate = \Carbon\Carbon::parse($activity->due_date);
                                                return $now->lt($dueDate); // Activity is planned (in the future)
                                            })->first();

                                            // Determine the first relevant activity (prefer overdue, then today, then planned)
                                            $firstActivity = $firstOverdueActivity ?? $firstTodayActivity ?? $firstPlannedActivity;

                                            // Default icon when no activities exist
                                            $iconClass = 'fa fa-fw fa-lg text-muted fa-clock-o btn-link text-dark';

                                            if ($firstActivity) {
                                                // Determine the icon based on the activity's due date
                                                $dueDate = \Carbon\Carbon::parse($firstActivity->due_date);

                                                if ($dueDate->lessThan($startOfToday)) {
                                                    // Overdue activity
                                                    $iconClass = 'fa fa-fw fa-lg text-danger fa-exclamation-triangle'; // Overdue
                                                } elseif ($now->isSameDay($dueDate)) {
                                                    // Due today
                                                    $iconClass = 'fa fa-fw fa-lg text-success fa-check'; // Due today
                                                } elseif ($now->lt($dueDate)) {
                                                    // Planned activity
                                                    $iconClass = 'fa fa-fw fa-lg text-primary fa-clock-o'; // Planned
                                                }

                                                // Adjust icon based on the activity type
                                                switch ($firstActivity->activity_type) {
                                                    case 'email':
                                                        $iconClass = 'fa fa-fw fa-lg text-danger fa-envelope';
                                                        break;
                                                    case 'request_signature':
                                                        $iconClass = 'fa fa-fw fa-lg text-success fa-pencil-square-o';
                                                        break;
                                                    case 'meeting':
                                                        $iconClass = 'fa fa-fw fa-lg text-success fa-users';
                                                        break;
                                                    case 'upload_document':
                                                        $iconClass = 'fa fa-fw fa-lg text-success fa-upload';
                                                        break;
                                                    case 'call':
                                                        $iconClass = 'fa fa-fw fa-lg text-success fa-phone';
                                                        break;
                                                    case 'to-do':
                                                        $iconClass = 'fa fa-fw fa-lg text-success fa-check';
                                                        break;
                                                }
                                            }
                                        @endphp



                                        <!-- Display icon for the first relevant activity -->
                                        <div name="activity_ids" class="o_field_widget o_field_kanban_activity">
                                            <a class="o-mail-ActivityButton activityButton" role="button" aria-label="Show activities" id="activityButton" data-id="{{$sale->id}}" title="Show activities">
                                                <i class="{{ $iconClass }}" role="img"></i>
                                            </a>
                                        </div>
                                        <div class="o_popover popover mw-100 o-popover--with-arrow bs-popover-bottom o-popover-bottom o-popover--bs d-none activityPopover" data-id="{{$sale->id}}" id="activityPopover" style="    top: 86px;
                                                             left: 105.75px;">
                                            <div class="o-mail-ActivityListPopover d-flex flex-column">
                                                <div class="overflow-y-auto d-flex flex-column flex-grow-1">

                                                    <!-- Overdue Section -->
                                                    <div class="o-mail-ActivityListPopoverItem d-flex flex-column border-bottom py-2">
                                                        <div class="overflow-auto d-flex align-items-baseline ms-3 me-1">
                                                            <b class="text-900 me-2 text-truncate flex-grow-1">Overdue ({{ $overdueCount }})</b>
                                                        </div>
                                                        @foreach($overdueActivities as $value)
                                                            <div class="d-flex align-items-center flex-wrap mx-3 " data-id="{{ $value->id }}">
                                                              @php
                                                   
                                                                        $user = $sale->user;
                                                                        $initial = $user ? strtoupper(substr($user->email, 0, 1)) : '';

                                                                        $colors = ['#f44336', '#e91e63', '#9c27b0', '#673ab7', '#3f51b5', '#2196f3', '#03a9f4', '#00bcd4', '#009688', '#4caf50', '#8bc34a', '#cddc39', '#ffeb3b', '#ffc107', '#ff9800', '#ff5722'];

                                                                
                                                                        if ($user) {
                                                                            $colorIndex = crc32($user->email) % count($colors);
                                                                            $bgColor = $colors[$colorIndex];
                                                                        } else {
                                                                            $bgColor = '#f0f0f0'; 
                                                                        }
                                                                    @endphp
                                                                 <span
                                                                    class="avatar-initials rounded d-flex align-items-center justify-content-center" style="background-color: {{ $bgColor }}; width:25px;height:24px;color:white">
                                                                    {{ $initial }}
                                                                </span>
                                                                <div class="mt-1 flex-grow-1">
                                                                &nbsp;&nbsp;<small>{{ $sale->user->email }} - Today</small>
                                                                </div>
                                                                <button class="o-mail-ActivityListPopoverItem-markAsDone btn btn-sm btn-success btn-link" data-target="#overdue_feedback_{{ $value->id }}"><i class="fa fa-check"></i></button>
                                                                <button class="o-mail-ActivityListPopoverItem-editbtn btn btn-sm btn-success btn-link"><i class="fa fa-pencil"></i></button>
                                                                <button class="o-mail-ActivityListPopoverItem-cancel btn btn-sm btn-danger btn-link"><i class="fa fa-times"></i></button>
                                                                <div class="py-2 px-3 d-none" id="overdue_feedback_{{ $value->id }}">
                                                                    <textarea class="form-control feedback-textarea" style="min-height: 70px;width:300px" rows="3" placeholder="Write Feedback"></textarea>
                                                                    <div class="mt-2">
                                                                        <button type="button" class="btn btn-sm btn-primary mx-2 feedback-submit" data-id="{{ $value->id }}"> Done </button>
                                                                        <button type="button" class="btn btn-sm btn-link feedback-discard" data-target="#overdue_feedback_{{ $value->id }}">Discard </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>

                                                    <!-- Today Section -->
                                                    <div class="o-mail-ActivityListPopoverItem d-flex flex-column border-bottom py-2">
                                                        <div class="overflow-auto d-flex align-items-baseline ms-3 me-1">
                                                            <b class="text-900 me-2 text-truncate flex-grow-1">Today ({{ $todayCount }})</b>
                                                        </div>
                                                        @foreach($todayActivities as $value)
                                                            <div class="d-flex align-items-center flex-wrap mx-3 hideDiv" data-id="{{ $value->id }}">
                                                              @php
                                                   
                                                                        $user = $sale->user;
                                                                        $initial = $user ? strtoupper(substr($user->email, 0, 1)) : '';

                                                                        $colors = ['#f44336', '#e91e63', '#9c27b0', '#673ab7', '#3f51b5', '#2196f3', '#03a9f4', '#00bcd4', '#009688', '#4caf50', '#8bc34a', '#cddc39', '#ffeb3b', '#ffc107', '#ff9800', '#ff5722'];

                                                                
                                                                        if ($user) {
                                                                            $colorIndex = crc32($user->email) % count($colors);
                                                                            $bgColor = $colors[$colorIndex];
                                                                        } else {
                                                                            $bgColor = '#f0f0f0'; 
                                                                        }
                                                                    @endphp
                                                                 <span
                                                                    class="avatar-initials rounded d-flex align-items-center justify-content-center" style="background-color: {{ $bgColor }}; width:25px;height:24px;color:white">
                                                                    {{ $initial }}
                                                                </span>
                                                                <div class="mt-1 flex-grow-1">
                                                                &nbsp;&nbsp;<small>{{ $sale->user->email }} - Today</small>
                                                                </div>
                                                                <button class="o-mail-ActivityListPopoverItem-markAsDone btn btn-sm btn-success btn-link" data-target="#today_feedback_{{ $value->id }}"><i class="fa fa-check"></i></button>
                                                                <button class="o-mail-ActivityListPopoverItem-editbtn btn btn-sm btn-success btn-link"><i class="fa fa-pencil"></i></button>
                                                                <button class="o-mail-ActivityListPopoverItem-cancel btn btn-sm btn-danger btn-link"><i class="fa fa-times"></i></button>
                                                                <div class="py-2 px-3 d-none" id="today_feedback_{{ $value->id }}">
                                                                    <textarea class="form-control feedback-textarea" style="min-height: 70px;width:300px" rows="3" placeholder="Write Feedback"></textarea>
                                                                    <div class="mt-2">
                                                                        <button type="button" class="btn btn-sm btn-primary mx-2 feedback-submit" data-id="{{ $value->id }}"> Done </button>
                                                                        <button type="button" class="btn btn-sm btn-link feedback-discard" data-target="#today_feedback_{{ $value->id }}">Discard </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>

                                                    <!-- Planned Section -->
                                                    <div class="o-mail-ActivityListPopoverItem d-flex flex-column border-bottom py-2">
                                                        <div class="overflow-auto d-flex align-items-baseline ms-3 me-1">
                                                            <b class="text-900 me-2 text-truncate flex-grow-1">Planned ({{ $plannedCount }})</b>
                                                        </div>
                                                        @foreach($plannedActivities as $value)
                                                            <div class="d-flex align-items-center flex-wrap mx-3 hideDiv" data-id="{{ $value->id }}">
                                                               @php
                                                   
                                                                        $user = $sale->user;
                                                                        $initial = $user ? strtoupper(substr($user->email, 0, 1)) : '';

                                                                        $colors = ['#f44336', '#e91e63', '#9c27b0', '#673ab7', '#3f51b5', '#2196f3', '#03a9f4', '#00bcd4', '#009688', '#4caf50', '#8bc34a', '#cddc39', '#ffeb3b', '#ffc107', '#ff9800', '#ff5722'];

                                                                
                                                                        if ($user) {
                                                                            $colorIndex = crc32($user->email) % count($colors);
                                                                            $bgColor = $colors[$colorIndex];
                                                                        } else {
                                                                            $bgColor = '#f0f0f0'; 
                                                                        }
                                                                    @endphp
                                                                 <span
                                                                    class="avatar-initials rounded d-flex align-items-center justify-content-center" style="background-color: {{ $bgColor }}; width:25px;height:24px;color:white">
                                                                    {{ $initial }}
                                                                </span>
                                                                <div class="mt-1 flex-grow-1">
                                                                &nbsp;&nbsp;<small>{{ $sale->user->email }} - Planned</small>
                                                                </div>
                                                                <button class="o-mail-ActivityListPopoverItem-markAsDone btn btn-sm btn-success btn-link" data-target="#planned_feedback_{{ $value->id }}"><i class="fa fa-check"></i></button>
                                                                <button class="o-mail-ActivityListPopoverItem-editbtn btn btn-sm btn-success btn-link"><i class="fa fa-pencil"></i></button>
                                                                <button class="o-mail-ActivityListPopoverItem-cancel btn btn-sm btn-danger btn-link"><i class="fa fa-times"></i></button>
                                                                <div class="py-2 px-3 d-none" id="planned_feedback_{{ $value->id }}">
                                                                    <textarea class="form-control feedback-textarea" style="min-height: 70px;width:300px" rows="3" placeholder="Write Feedback"></textarea>
                                                                    <div class="mt-2">
                                                                        <button type="button" class="btn btn-sm btn-primary mx-2 feedback-submit" data-id="{{ $value->id }}"> Done </button>
                                                                        <button type="button" class="btn btn-sm btn-link feedback-discard" data-target="#planned_feedback_{{ $value->id }}">Discard </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="popover-arrow end-auto"></div>
                                        </div>
                                </div>

                                <div class="oe_kanban_bottom_right">
                                    <div name="user_id" class="o_field_widget o_field_many2one_avatar_user o_field_many2one_avatar_kanban o_field_many2one_avatar">
                                            <div class="d-flex align-items-center gap-1" data-tooltip="{{ $sale->email ?? '' }}"><span class="o_avatar o_m2o_avatar d-flex">
                                                    @php
                                                    
                                                        $user = $sale->salesPerson;
                                                        $initial = $user ? strtoupper(substr($user->email, 0, 1)) : '';

                                                        $colors = ['#f44336', '#e91e63', '#9c27b0', '#673ab7', '#3f51b5', '#2196f3', '#03a9f4', '#00bcd4', '#009688', '#4caf50', '#8bc34a', '#cddc39', '#ffeb3b', '#ffc107', '#ff9800', '#ff5722'];

                                                
                                                        if ($user) {
                                                            $colorIndex = crc32($user->email) % count($colors);
                                                            $bgColor = $colors[$colorIndex];
                                                        } else {
                                                            $bgColor = '#f0f0f0'; 
                                                        }
                                                    @endphp
                                                    @if(optional($user)->profile)
                                                        <!-- If profile image exists -->
                                                        <img class="rounded" src="{{ $user->profile }}" alt="User Profile">
                                                    @else
                                                        <!-- If no profile image, display the first letter of email with dynamic background color -->
                                                        <div class="placeholder-circle rounded d-flex align-items-center justify-content-center" data-id="{{$sale->id}}" style="background-color: {{ $bgColor }}; width:25px;height:24px;color:white">
                                                            <span>{{ $initial }}</span>
                                                        </div>
                                                    @endif

                                                </span>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="o_dropdown_kanban bg-transparent position-absolute end-0">
                        <button class="btn o-no-caret rounded-0 o-dropdown dropdown-toggle dropdown" title="Dropdown menu" aria-expanded="false">
                            <span class="fa fa-ellipsis-v"></span>
                        </button>

                        <div class="dropdown-menu custom-dropdown" style="display:none;">
                            <div class="dropdown-item op_edit" data-id="{{$sale->id}}">Edit</div>
                            <div class="dropdown-item op_delete" data-id="{{$sale->id}}">Delete</div>
                            <div class="dropdown-divider"></div>
                            <div class="color-options">
                                <span class="color-box" data-id="{{$sale->id}}" data-color="#ffffff" style="background-color:#ffffff;"></span>
                                <span class="color-box" data-id="{{$sale->id}}" data-color="#ee2d2d" style="background-color:#ee2d2d;"></span>
                                <span class="color-box" data-id="{{$sale->id}}" data-color="#dc8534" style="background-color:#dc8534;"></span>
                                <span class="color-box" data-id="{{$sale->id}}" data-color="#e8bb1d" style="background-color:#e8bb1d;"></span>
                                <span class="color-box" data-id="{{$sale->id}}" data-color="#5794dd" style="background-color:#5794dd;"></span>
                                <span class="color-box" data-id="{{$sale->id}}" data-color="#9f628f" style="background-color:#9f628f;"></span>
                                <span class="color-box" data-id="{{$sale->id}}" data-color="#db8865" style="background-color:#db8865;"></span>
                                <span class="color-box" data-id="{{$sale->id}}" data-color="#41a9a2" style="background-color:#41a9a2;"></span>
                                <span class="color-box" data-id="{{$sale->id}}" data-color="#304be0" style="background-color:#304be0;"></span>
                                <span class="color-box" data-id="{{$sale->id}}" data-color="#ee2f8a" style="background-color:#ee2f8a;"></span>
                                <span class="color-box" data-id="{{$sale->id}}" data-color="#61c36e" style="background-color:#61c36e;"></span>
                                <span class="color-box" data-id="{{$sale->id}}" data-color="#9872e6" style="background-color:#9872e6;"></span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        @endforeach

        <div class="o_column_quick_create flex-shrink-0 flex-grow-1 flex-md-grow-0">
            <div class="o_quick_create_folded position-sticky z-index-1 my-3 text-nowrap">
                <button class="o_kanban_add_column btn btn-light w-100" aria-label="Add column" data-tooltip="Add column">
                    <i class="fa fa-plus me-2" role="img"></i>Stage
                </button>
            </div>
        </div>


        <script>
            $(document).ready(function() {
                var originalContent = `
                    <div class="o_column_quick_create flex-shrink-0 flex-grow-1 flex-md-grow-0">
                        <div class="o_quick_create_folded position-sticky z-index-1 my-3 text-nowrap">
                            <button class="o_kanban_add_column btn btn-light w-100" aria-label="Add column" data-tooltip="Add column">
                                <i class="fa fa-plus me-2" role="img"></i>Stage
                            </button>
                        </div>
                    </div>`;

                $(document).on('click', '.o_kanban_add_column', function() {
                    var newContent = `
                            <div class="o_column_quick_create flex-shrink-0 flex-grow-1 flex-md-grow-0">
                                <div class="o_quick_create_unfolded pt-3 pb-2">
                                    <div class="o_kanban_header top-0 pb-3">
                                        <div class="input-group mb-1">
                                            <input type="text" class="form-control bg-view new_stage_input" placeholder="Stage...">
                                            <button class="btn btn-primary o_kanban_add" type="button">Add</button>
                                        </div>
                                    </div>
                                    <div class="o_kanban_muted_record mb-2 py-5 bg-300 opacity-50"></div>
                                    <div class="o_kanban_muted_record mb-2 py-5 bg-300 opacity-50"></div>
                                    <div class="o_kanban_muted_record mb-2 py-5 bg-300 opacity-50"></div>
                                </div>
                            </div>`;
                    $('.o_column_quick_create').replaceWith(newContent);

                    // Add click event listener to the document
                    $(document).on('click.outsideClick', function(event) {
                        if (!$(event.target).closest('.o_column_quick_create').length) {
                            $('.o_column_quick_create').replaceWith(originalContent);
                            $(document).off(
                                'click.outsideClick'
                            );
                        }
                    });
                });
            });

        </script>

    </div>
</div>

<div class="o-main-components-container">
    <div class="o-discuss-CallInvitations position-absolute top-0 end-0 d-flex flex-column p-2"></div>
    <div class="o-mail-ChatWindowContainer"></div>
    <div class="o-overlay-container"></div>
    <div></div>
    <div class="o_notification_manager o_upload_progress_toast"></div>
    <div class="o_fullscreen_indication">
        <p>Press <span>esc</span> to exit full screen</p>
    </div>
    <div class="o_notification_manager"></div>
</div>

@endsection

@push('scripts')
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
<link rel="stylesheet" href="https://code.jquery.com/ui/1.14.0/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.14.0/jquery-ui.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- DataTables JS -->
<script type="text/javascript" charset="utf8"
    src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" charset="utf8"
    src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://legacy.datatables.net/extras/thirdparty/ColReorderWithResize/ColReorderWithResize.js"></script>

<script>
    function appendContent($this) {
        var containerId = $this.closest('.o_kanban_group').find('#append-container-new');
        var append_id = $this.closest('.o_kanban_group').data('id');
        let isContentAppendedFlag = false

        // set the flag to true if the content is already appended
        if (containerId.find('.o_kanban_quick_create').length) {
            isContentAppendedFlag = true;
        }

        $('.append-container-new').hide();

        $(document).on('click', '.o_form_button_cancel', function(event) {
            event.preventDefault();
            $(containerId).hide();
        });
        if (!isContentAppendedFlag) {
            var htmlContent = `<div id="appended-content" class="o_kanban_group flex-shrink-0 flex-grow-1 flex-md-grow-0 o_group_draggable" data-id="${append_id}">
                                    <div class="o_kanban_quick_create o_field_highlight shadow">
                                        <div class="o_form_renderer o_form_nosheet o_form_view o_xxs_form_view p-0 o_form_editable d-block">
                                            <div class="o_inner_group grid">
                                                <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                    <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                        <label class="o_form_label" for="partner_id_0">Organization / Contact<sup class="text-info p-1" data-tooltip-template="web.FieldTooltip" data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;Linked partner (optional). Usually created when converting the lead. You can find a partner by its Name, TIN, Email or Internal Reference.&quot;}}" data-tooltip-touch-tap-to-show="true">?</sup></label>
                                                    </div>
                                                    <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                                        <div name="partner_id" class="o_field_widget o_field_res_partner_many2one o_field_highlight">
                                                            <div class="o_field_many2one_selection">
                                                                <div class="o_input_dropdown">
                                                                    <div class="o-autocomplete dropdown">
                                                                        <input type="hidden" name="partner_id" class="o_input">
                                                                        <input type="text" name="parter_name" class="o-autocomplete--input o_input" autocomplete="off" role="combobox" aria-autocomplete="list" aria-haspopup="listbox" id="partner_id_0" placeholder="" aria-expanded="false">
                                                                        <!--                                                                        <ul class="o-autocomplete&#45;&#45;dropdown-menu dropdown-menu" style="display: none;"></ul>-->
                                                                    </div>
                                                                    <span class="o_dropdown_button"></span>
                                                                </div>
                                                            </div>
                                                            <div class="o_field_many2one_extra"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                    <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                        <label class="o_form_label" for="name_0">Opportunity</label>
                                                    </div>
                                                    <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                                        <div name="name" class="o_field_widget o_required_modifier o_field_char">
                                                            <input name="name" class="o_input" id="name_0" type="text" autocomplete="off" placeholder="e.g. Product Pricing">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                    <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                        <label class="o_form_label" for="email_from_0">Email</label>
                                                    </div>
                                                    <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                                        <div name="email_from" class="o_field_widget o_field_char">
                                                            <input name="email" class="o_input" id="email_from_0" type="text" autocomplete="off" placeholder="e.g. &quot;email@address.com&quot;">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                    <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                        <label class="o_form_label" for="phone_0">Phone</label>
                                                    </div>
                                                    <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                                        <div name="phone" class="o_field_widget o_field_char">
                                                            <input name="phone" class="o_input" id="phone_0" type="text" autocomplete="off" placeholder="e.g. &quot;0123456789&quot;">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                    <div class="o_cell flex-grow-1 flex-sm-grow-0 o_wrap_label w-100 text-break text-900" style="">
                                                        <label class="o_form_label" for="expected_revenue_0">Expected Revenue</label>
                                                    </div>
                                                    <div class="o_cell flex-grow-1 flex-sm-grow-0" style="width: 100%;">
                                                        <div>
                                                            <div class="o_row">
                                                                <div name="expected_revenue" class="o_field_widget o_field_monetary oe_inline me-5 o_field_highlight">
                                                                    <div class="text-nowrap d-inline-flex w-100 align-items-baseline position-relative">
                                                                        <span class="o_input position-absolute pe-none d-flex w-100"><span>₹&nbsp;</span><span class="opacity-0 d-inline-block overflow-hidden mw-100 o_monetary_ghost_value">0.00</span></span><span class="opacity-0">₹&nbsp;</span>
                                                                            <input  name="expected_revenue" class="o_input flex-grow-1 flex-shrink-1" autocomplete="off" id="expected_revenue_0" type="text">
                                                                    </div>
                                                                </div>
                                                                <div name="priority" class="o_field_widget o_field_priority oe_inline">
                                                                    <div class="o_priority" role="radiogroup" name="priority" aria-label="Priority">
                                                                        <a href="#" class="o_priority_star fa fa-star-o" role="radio" tabindex="-1" data-value="medium" data-tooltip="Priority: Medium" aria-label="Medium"></a>
                                                                        <a href="#" class="o_priority_star fa fa-star-o" role="radio" tabindex="-1" data-value="high" data-tooltip="Priority: High" aria-label="High"></a>
                                                                        <a href="#" class="o_priority_star fa fa-star-o" role="radio" tabindex="-1" data-value="very_high" data-tooltip="Priority: Very High" aria-label="Very High"></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <footer class="o_form_view_footer o_form_status bg-light py-1 mt-auto border-top">
                                                <button class="btn border text-muted o_form_button_cancel">Discard</button>
                                                <button class="btn btn-primary o-kanban-button-new">Add</button>
                                            </footer>
                                        </div>
                                    </div>
                                </div>`;

            $(containerId).append(htmlContent);

            isContentAppendedFlag = true;
            autoInputComplate('#partner_id_0', '{{ route('contact.suggestions') }}'
                , function(selectedText, selected_id = 0) {
                    containerId.find('input[name="partner_id"]').val(selected_id);

                    // contact details and show if selected_id != 0
                    if (selected_id != 0) {
                        let url = "{{ route('contact.show', ['contact' => ':id']) }}";
                        url = url.replace(':id', selected_id);
                        $.ajax({
                            type: 'GET'
                            , url: url
                            , data: {
                                id: selected_id
                            , }
                            , success: function(response) {
                                // console.log(response);
                                var _contact = response.contact;
                                containerId.find('input[name="email"]').val(_contact.email);
                                containerId.find('input[name="phone"]').val(_contact.phone);
                                containerId.find('input[name="name"]').val(_contact.name + "'s Opportunity");
                            }
                            , error: function(err) {
                                console.log(err);
                            }
                        });
                    }

                    if (selected_id == 0) {
                        $.ajax({
                            type: 'POST'
                            , url: "{{ route('contact.save') }}"
                            , data: {
                                contact_name: selectedText
                            , }
                            , success: function(response) {
                                var _contact = response.contact;
                                $('input[name="partner_id"]').val(_contact.id);
                                containerId.find('input[name="name"]').val(_contact.name + "'s Opportunity");
                            }
                            , error: function(err) {
                                console.log(err);
                            }
                        });
                    }

                });
        }

        $(containerId).show();
    }

    $(document).ready(function() {
        var isContentAppendedNew = false;
        $('.new-lead-btn').click(function(event) {
            event.preventDefault(); // Prevent default action
            appendContent($(this));
        });

        $('.head_new_btn').click(function(event) {
            event.preventDefault();
            let firstContainer = $(document).find('.new-lead-btn').eq(0);
            appendContent(firstContainer);
        });



        var insideCard = $(document).find(".o_kanban_record");
        makeDropableInsideCard(insideCard);

        function makeDropableInsideCard(insideCard) {
            insideCard.draggable({
                connectToSortable: ".o_kanban_group"
                , revert: "invalid"
                , cursor: "move"
                , helper: "original"
                , start: function(event, ui) {
                    ui.helper.addClass("o_dragged");
                    ui.helper.width($(this).width());
                    ui.helper.height($(this).height());
                    ui.helper.data('originalElement', $(this));
                }
                , stop: function(event, ui) {
                    // $(this).remove();
                    $(this).removeClass("o_dragged");
                }
            });
        }

        // Make kanban groups droppable
        $(".o_kanban_group").droppable({
            accept: ".o_kanban_record"
            , hoverClass: "o_kanban_hover"
            , classes: {
                "ui-droppable-hover": "o_kanban_hover"
            }
            , drop: function(event, ui) {
                // Clone the dragged record and remove the drag class
                var droppedRecord = ui.helper.clone().removeClass("o_dragged");
                droppedRecord.attr('style', '');
                // Append the cloned record to the new group
                $(this).append(droppedRecord);

                var originalRecord = $(ui.helper.data('originalElement'));
                originalRecord.remove();
                ui.helper.remove();

                // Reinitialize draggable on the newly added element
                makeDropableInsideCard(droppedRecord);

                // update in database by ajax as update stage_id
                var sale_id = droppedRecord.data('id');
                var stage_id = $(this).data('id');
                $.ajax({
                    type: 'POST'
                    , url: "{{ route('sale.setStage') }}"
                    , data: {
                        id: sale_id
                        , stage_id: stage_id
                    , }
                    , success: function(response) {
                        // toastr.success("Stage Updated");
                        // location.reload();
                    }
                    , error: function(err) {
                        console.log(err);
                    }
                });
            }

        });





        // submit form by ajax onm o-kanban-button-new
        $(document).on('click', '.o-kanban-button-new', function() {
            var partner_id = $(this).closest('.o_kanban_group').find('input[name="partner_id"]').val();
            var name = $(this).closest('.o_kanban_group').find('input[name="name"]').val();
            var email = $(this).closest('.o_kanban_group').find('input[name="email"]').val();
            var phone = $(this).closest('.o_kanban_group').find('input[name="phone"]').val();
            var expected_revenue = $(this).closest('.o_kanban_group').find('input[name="expected_revenue"]').val();
            var stage_id = $(this).closest('.o_kanban_group').data('id');

            var priority = $(this).closest('.o_kanban_group').find('.o_priority_star.fa-star').last().data('value');


            $.ajax({
                type: 'POST'
                , url: "{{ route('crm.newSales') }}"
                , data: {
                    stage_id: stage_id
                    , contact_id: partner_id
                    , name: name
                    , email: email
                    , phone: phone
                    , expected_revenue: expected_revenue
                    , priority: priority
                , }
                , success: function(response) {
                    toastr.success("Sale Created");
                    // location.reload();
                }
                , error: function(err) {
                    console.log(err);
                }
            });
        });


        // set priority ajax
        $(document).on('click', '.set-priority .o_priority_star', function() {
            var priority = $(this).data('value');
            var sale_id = $(this).closest('.o_kanban_record').data('id');
            $.ajax({
                type: 'POST'
                , url: "{{ route('sale.setPriority') }}"
                , data: {
                    priority: priority
                    , sale_id: sale_id
                , }
                , success: function(response) {
                    // toastr.success("Priority Set");
                    // location.reload();
                }
                , error: function(err) {
                    console.log(err);
                }
            });
        });

    });

</script>
<script>
    $(document).ready(function() {
        // stage add
        $(document).on('click', '.o_kanban_add', function() {
            var newStage = $(this).closest('.o_quick_create_unfolded').find('.new_stage_input').val();
            $.ajax({
                type: 'POST'
                , url: "{{ route('crm.newStage') }}"
                , data: {
                    newStage: newStage
                , }
                , success: function(response) {
                    toastr.success("Stage Cerated");
                    location.reload();
                }
                , error: function(err) {
                    console.log(err);
                }
            });
        });
    });

</script>

<script>
    // for sorting of stages
    $(document).ready(function() {
        $(".o_kanban_grouped").sortable({
            // connectWith: ".o_kanban_group",
            handle: ".o_kanban_header_title"
            , classes: {
                "ui-sortable-placeholder": "o_kanban_group_placeholder"
                , "ui-sortable-helper": "o_dragged shadow"
            , },
            // placeholder: "o_kanban_group_placeholder",
            // forcePlaceholderSize: true,
            start: function(event, ui) {
                ui.placeholder.height(ui.item.height());
            }
            , update: function(event, ui) {
                // array with id and the sequence
                var stages = [];
                $(".o_kanban_grouped .o_kanban_group").each(function(index, element) {
                    var stage_id = $(element).data('id');
                    stages.push({
                        id: stage_id
                        , sequence: index
                    , });
                });

                $.ajax({
                    type: 'POST'
                    , url: "{{ route('crm.updateStageSequence') }}"
                    , data: {
                        stages: stages
                    }
                    , success: function(response) {
                        // toastr.success("Stage Updated");
                        // location.reload();
                    }
                    , error: function(err) {
                        console.log(err);
                    }
                });
            }
        });

    });

</script>

<script>
    // contact-card click event by jquery
    $(document).on('click', '.oe_kanban_content', function() {
        var id = $(this).data('id'); // Get the data-id attribute from the clicked row
        if (id) {
            window.location.href = '/pipeline-create/' + id; // Adjust the URL to your edit page
        }
    });

    $(document).ready(function() {
       $(document).on('click', '.o_dropdown_kanban button', function(e) {
            e.stopPropagation();
            // Toggle the dropdown
            var dropdownMenu = $(this).siblings('.custom-dropdown');
            dropdownMenu.toggle();
        });

        // Close the dropdown when clicking outside
        $(document).on('click', function() {
            $('.custom-dropdown').hide();
        });

        // Prevent closing the dropdown when clicking inside it
        $('.custom-dropdown').on('click', function(e) {
            e.stopPropagation();
        });

        
        $(document).on('click', '.color-box', function(e) {
            e.stopPropagation();
            var color = $(this).data('color');
            var sale_id = $(this).data('id');  

             $.ajax({
                type: 'POST'
                , url: "{{ route('crm.setColor') }}"
                , data: {
                    color: color
                    , sale_id: sale_id
                , }
                , success: function(response) {
                     if (response.success) {
                        // Update the background color of the related div
                        $('.oe_kanban_color[data-id="' + sale_id + '"]').css('background', color);
                    }
                  
                }
                , error: function(err) {
                    console.log(err);
                }
            });
        });
        
        $('.op_edit').on('click', function(e){
            var sale_id = $(this).data('id');
            window.location.href = '/pipeline-create/' + sale_id;
        });
        $('.op_delete').on('click', function(e){
            var sale_id = $(this).data('id');  

             $.ajax({
                type: 'get'
                , url: "{{ route('crm.delete') }}"
                , data: {
                     sale_id: sale_id
                , }
                , success: function(response) {
                    $('.o_legacy_kanban_record[data-id="' + sale_id + '"]').remove();
                  
                }
                , error: function(err) {
                    console.log(err);
                }
            });
        });
    });

</script>

<script>
    $(document).ready(function() {

        
        $(document).on('click', '.activityButton', function(e) {
            
            e.preventDefault(); // Prevent any default action
            
            var activityId = $(this).data('id'); // Get the data-id of the clicked button
            var $popover = $('.activityPopover[data-id="' + activityId + '"]'); // Get the related popover
            var buttonOffset = $(this).offset(); // Get the position of the clicked button
            var buttonHeight = $(this).outerHeight(); // Get the height of the button

            // Hide all other popovers
            $('.activityPopover').addClass('d-none');

            // Position the popover below the button
            $popover.toggleClass('d-none'); // Toggle the popover visibility
        });

        // Close the popover if clicking outside of the button or the popover
        $(document).on('click', function(event) {
            if (!$(event.target).closest('.activityButton, .activityPopover').length) {
                $('.activityPopover').addClass('d-none'); // Hide all popovers if clicked outside
            }
        });

        function toggleFeedback(targetDiv) {
            $(targetDiv).toggleClass('d-none');
        }

        // Handling "Mark as Done" for all activities
        $('.o-mail-ActivityListPopoverItem-markAsDone').on('click', function(event) {
            event.stopPropagation(); // Prevent click from closing the popover
            var targetDiv = $(this).data('target');
            toggleFeedback(targetDiv);
        });

        $('.feedback-textarea').on('click', function(event) {
            event.stopPropagation(); // Prevent click from closing the popover
        });

        // Feedback submission
        $('.feedback-submit').on('click', function() {
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
                success: function(response) {
                    toastr.success(response.message);
                    location.reload();
                },
                error: function(xhr) {
                    console.error(xhr.responseText);
                    toastr.error('An error occurred. Please try again.');
                }
            });
        }

        // Handle discard button to hide the feedback textarea
        $('.feedback-discard').on('click', function() {
            var targetDiv = $(this).data('target');
            $(targetDiv).addClass('d-none');
        });

        $('.o-mail-ActivityListPopoverItem-editbtn').on('click', function(event) {
            event.stopPropagation(); // Prevent click from closing the popover
            var activityId = $(this).closest('[data-id]').data('id'); // Get the ID from the parent
            console.log('Edit activity ID:', activityId);
            // Here you could open a modal or an edit form for this activity
        });
    });
</script>

<script>
    $(document).ready(function () {

        function filterData(selectedTags) {
        $.ajax({
            url: '{{route('crm.pipeline.filter')}}', // Your endpoint for fetching leads
            method: 'GET',
            data: {
                tags: selectedTags
            },
            success: function (response) {
                console.log(response);
                var $tableBody = $('#lead-table-body');
                var $tableFooter = $('#lead-table-footer'); // Assuming you have a footer element to hide/show

                // Clear existing table data
                $tableBody.empty();

                // Initialize total variables
                var totalExpectedRevenue = 0; // Initialize total expected revenue
                var totalRecurringMrr = 0; // Initialize total recurring MRR
                var totalRecurringRevenue = 0; // Initialize total recurring revenue

                if (response.data.length === 0) {
                    // Display the message if no data is found
                    $tableBody.append(`<tr><td colspan="25" class="text-center">No data found!</td></tr>`);
                    
                    // Hide the footer if no data is found
                    $tableFooter.hide();
                } else {
                    var index = 1;

                    // Loop through the response and create table rows
                    response.data.forEach(function (item) {
                        var rowHtml = `<tr class="lead-row" data-id="${item.id}">`;

                        // Append data only for the visible columns
                        if (table.column(0).visible()) rowHtml += `<td class="d-none">${index++}</td>`;
                        if (table.column(1).visible()) rowHtml += `<td>${item.created_at || ''}</td>`;
                        if (table.column(2).visible()) rowHtml += `<td>${item.opportunity || ''}</td>`;
                        if (table.column(3).visible()) rowHtml += `<td>${item.contact.name || ''}</td>`;
                        if (table.column(4).visible()) rowHtml += `<td>${item.contact_name || ''}</td>`;
                        if (table.column(5).visible()) rowHtml += `<td>${item.email || ''}</td>`;
                        if (table.column(6).visible()) rowHtml += `<td>${item.phone || ''}</td>`;
                        if (table.column(7).visible()) rowHtml += `<td>${item.city || ''}</td>`;
                        if (table.column(8).visible()) rowHtml += `<td>${item.state ? (item.get_state?.name || '') : ''}</td>`;
                        if (table.column(9).visible()) rowHtml += `<td>${item.country ? (item.get_country?.name || '') : ''}</td>`;
                        if (table.column(10).visible()) rowHtml += `<td>${item.sales_person ? (item.sales_person?.email || '') : ''}</td>`;
                        if (table.column(11).visible()) rowHtml += `<td>${item.sales || ''}</td>`;
                        if (table.column(12).visible()) rowHtml += `<td>${item.priority || ''}</td>`;
                        if (table.column(13).visible()) rowHtml += `<td>${item.campaign_id ? (item.get_campaign?.name || '') : ''}</td>`;
                        if (table.column(14).visible()) rowHtml += `<td>${item.medium_id ? (item.get_medium?.name || '') : ''}</td>`;
                        if (table.column(15).visible()) rowHtml += `<td>${item.source_id ? (item.get_source?.name || '') : ''}</td>`;
                        if (table.column(16).visible()) {
                            rowHtml += `<td>${item.expected_revenue || ''}</td>`;
                            totalExpectedRevenue += parseFloat(item.expected_revenue) || 0; // Sum expected revenue
                        }
                        if (table.column(17).visible()) rowHtml += `<td>${item.deadline || ''}</td>`;
                        
                        var recurringRevenue = parseFloat(item.recurring_revenue) || 0;
                        var months = parseFloat(item.get_recurring_plan?.months) || 0; // Assuming you have the plan in item
                        var expertMrr = (months > 0) ? (recurringRevenue / months).toFixed(2) : '';
                        
                        if (table.column(18).visible()) {
                            rowHtml += `<td>${expertMrr}</td>`;
                            totalRecurringMrr += parseFloat(expertMrr) || 0; // Sum recurring MRR
                        }
                        if (table.column(19).visible()) {
                            rowHtml += `<td>${item.recurring_revenue || '' }</td>`;
                            totalRecurringRevenue += recurringRevenue; // Sum recurring revenue
                        }
                        if (table.column(20).visible()) rowHtml += `<td>${item.plan_name ? (item.get_recurring_plan.plan_name || '') : ''}</td>`;
                        if (table.column(21).visible()) rowHtml += `<td>${item.title ? (item.stage.title || '') : ''}</td>`;
                        if (table.column(22).visible()) rowHtml += `<td>${item.probability || ''}</td>`;
                        if (table.column(23).visible()) rowHtml += `<td>${item.loslost_reasont || ''}</td>`;
                        if (table.column(24).visible()) rowHtml += `<td>${item.sales_team || ''}</td>`;
                        
                        rowHtml += `</tr>`;
                        $tableBody.append(rowHtml);
                    });

                    // Show the footer since we have data
                    $tableFooter.show();
                }

                // Update footer with totals
                $(table.column(16).footer()).html('₹ ' + totalExpectedRevenue.toFixed(2));
                $(table.column(18).footer()).html('₹ ' + totalRecurringMrr.toFixed(2));
                $(table.column(19).footer()).html('₹ ' + totalRecurringRevenue.toFixed(2));

                // Attach click event handler to rows
                $('#lead-table-body .lead-row').on('click', function () {
                    var leadId = $(this).data('id');
                    var index = $(this).find('td.d-none').text();
                    window.location.href = `/lead-add/${leadId}/${index}`; // Adjust the URL as needed
                });

                // Apply the column visibility settings
                table.columns().every(function () {
                    var column = this;
                    var index = column.index();
                    var isVisible = column.visible();
                    column.visible(isVisible);
                });
            },
            error: function () {
                console.error('Failed to fetch data');
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
                    console.log(response);
                    var $tableBody = $('#lead-table-body');
                    var $tableFooter = $('#lead-table-footer'); // Assuming you have a footer element to hide/show

                    // Clear existing table data
                    $tableBody.empty();

                    // Initialize total variables
                    var totalExpectedRevenue = 0; // Initialize total expected revenue
                    var totalRecurringMrr = 0; // Initialize total recurring MRR
                    var totalRecurringRevenue = 0; // Initialize total recurring revenue

                    if (response.data.length === 0) {
                        // Display the message if no data is found
                        $tableBody.append(`<tr><td colspan="25" class="text-center">No data found!</td></tr>`);
                        
                        // Hide the footer if no data is found
                        $tableFooter.hide();
                    } else {
                        var index = 1;

                        // Loop through the response and create table rows
                        response.data.forEach(function (item) {
                            var rowHtml = `<tr class="lead-row" data-id="${item.id}">`;

                            // Append data only for the visible columns
                            if (table.column(0).visible()) rowHtml += `<td class="d-none">${index++}</td>`;
                            if (table.column(1).visible()) rowHtml += `<td>${item.created_at || ''}</td>`;
                            if (table.column(2).visible()) rowHtml += `<td>${item.opportunity || ''}</td>`;
                            if (table.column(3).visible()) rowHtml += `<td>${item.contact_id ? (item.contact?.name || '') : ''}</td>`;
                            if (table.column(4).visible()) rowHtml += `<td>${item.contact_name || ''}</td>`;
                            if (table.column(5).visible()) rowHtml += `<td>${item.email || ''}</td>`;
                            if (table.column(6).visible()) rowHtml += `<td>${item.phone || ''}</td>`;
                            if (table.column(7).visible()) rowHtml += `<td>${item.city || ''}</td>`;
                            if (table.column(8).visible()) rowHtml += `<td>${item.state ? (item.get_state?.name || '') : ''}</td>`;
                            if (table.column(9).visible()) rowHtml += `<td>${item.country ? (item.get_country?.name || '') : ''}</td>`;
                            if (table.column(10).visible()) rowHtml += `<td>${item.sales_person ? (item.sales_person?.email || '') : ''}</td>`;
                            if (table.column(11).visible()) rowHtml += `<td>${item.sales || ''}</td>`;
                            if (table.column(12).visible()) rowHtml += `<td>${item.priority || ''}</td>`;
                            if (table.column(13).visible()) rowHtml += `<td>${item.campaign_id ? (item.get_campaign?.name || '') : ''}</td>`;
                            if (table.column(14).visible()) rowHtml += `<td>${item.medium_id ? (item.get_medium?.name || '') : ''}</td>`;
                            if (table.column(15).visible()) rowHtml += `<td>${item.source_id ? (item.get_source?.name || '') : ''}</td>`;
                            if (table.column(16).visible()) {
                                rowHtml += `<td>${item.expected_revenue || ''}</td>`;
                                totalExpectedRevenue += parseFloat(item.expected_revenue) || 0; // Sum expected revenue
                            }
                            if (table.column(17).visible()) rowHtml += `<td>${item.deadline || ''}</td>`;
                            
                            var recurringRevenue = parseFloat(item.recurring_revenue) || 0;
                            var months = parseFloat(item.get_recurring_plan?.months) || 0; // Assuming you have the plan in item
                            var expertMrr = (months > 0) ? (recurringRevenue / months).toFixed(2) : '';
                            
                            if (table.column(18).visible()) {
                                rowHtml += `<td>${expertMrr}</td>`;
                                totalRecurringMrr += parseFloat(expertMrr) || 0; // Sum recurring MRR
                            }
                            if (table.column(19).visible()) {
                                rowHtml += `<td>${item.recurring_revenue || '' }</td>`;
                                totalRecurringRevenue += recurringRevenue; // Sum recurring revenue
                            }
                            if (table.column(20).visible()) rowHtml += `<td>${item.plan_name ? (item.get_recurring_plan.plan_name || '') : ''}</td>`;
                            if (table.column(21).visible()) rowHtml += `<td>${item.title ? (item.stage.title || '') : ''}</td>`;
                            if (table.column(22).visible()) rowHtml += `<td>${item.probability || ''}</td>`;
                            if (table.column(23).visible()) rowHtml += `<td>${item.loslost_reasont || ''}</td>`;
                            if (table.column(24).visible()) rowHtml += `<td>${item.sales_team || ''}</td>`;
                            
                            rowHtml += `</tr>`;
                            $tableBody.append(rowHtml);
                        });

                        // Show the footer since we have data
                        $tableFooter.show();
                    }

                    // Update footer with totals
                    $(table.column(16).footer()).html('₹ ' + totalExpectedRevenue.toFixed(2));
                    $(table.column(18).footer()).html('₹ ' + totalRecurringMrr.toFixed(2));
                    $(table.column(19).footer()).html('₹ ' + totalRecurringRevenue.toFixed(2));

                    // Attach click event handler to rows
                    $('#lead-table-body .lead-row').on('click', function () {
                        var leadId = $(this).data('id');
                        var index = $(this).find('td.d-none').text();
                        window.location.href = `/lead-add/${leadId}/${index}`; // Adjust the URL as needed
                    });

                    // Apply the column visibility settings
                    table.columns().every(function () {
                        var column = this;
                        var index = column.index();
                        var isVisible = column.visible();
                        column.visible(isVisible);
                    });
                    $('#customFilterModal').removeClass('show').css('display', 'none');
                },
                error: function () {
                    console.error('Failed to fetch data');
                        $('#customFilterModal').modal('hide');
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
      // Function to handle tag selection
          function handleTagSelectionGrop(selectedValue, $item = null) {
            // Remove any existing tags
            $('.tag-item').parent().remove();

            // Create new tag with an icon
            var newTagHtml = `
            <span class="tag-item" data-value="${selectedValue}">
                <a href="#" class="group-setting-icon icon_tag" style="cursor: default;">
                    <span class="setting_icon" style="padding:6px !important;background-color: rgb(1 126 132) !important;"><i class="fa-solid fa-layer-group"></i></span>
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


        // The rest of your code remains unchanged

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

        // Update/remove tag button
        function updateRemoveTagButtonGrop() {
            var $tag = $('.group_by_tag');

            if ($tag.find('.fa-list').length === 0) {
                $tag.prepend('<a href="#" class="setting-icon icon_tag">' +
                    '<span class="setting_icon se_filter_icon setting-icon"><i class="fa fa-filter"></i></span>' +
                    '<span  class="setting_icon setting_icon_hover setting-icon"><i class="fa fa-fw fa-cog"></i></span>' +
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


        // Send selected tags to the server and process response
        function filter(selectedTags) {
            $.ajax({
                url: '{{route('crm.pipeline.filter.group.by')}}',
                type: 'POST',
                data: {
                    selectedTags: JSON.stringify(selectedTags)
                },
                success: function (response) {
                    console.log('Response:', response);

                    $('.o_kanban_renderer').empty();
                    $('#lead-container').removeClass('flex-wrap');
                    const leadsData = response.data;
                    $.each(leadsData, function (groupName, leads) {
                      
                            let expected_revenue = 0; 
                            let formattedTotalExpertMrr = 0; 

                            // Initialize cumulative counts
                            let totalOverdueCount = 0;
                            let totalTodayCount = 0;
                            let totalPlannedCount = 0;
                            let totalLeads = 0; 

                            $.each(leads, function(index, lead) {
                                    let leadOverdueCount = 0;
                                    let leadTodayCount = 0;
                                    let leadPlannedCount = 0;
                                    let expertMrrArray = []; 

                                    let expectedRevenue = parseFloat(lead.expected_revenue) || 0; 
                                    expected_revenue += expectedRevenue; 

                                    if (lead.recurring_revenue && lead.get_recurring_plan && lead.get_recurring_plan.months) {
                                        let revenue = parseFloat(lead.recurring_revenue) || 0; 
                                        let months = parseFloat(lead.get_recurring_plan.months) || 0; 
                                        let expertMrr = (months > 0) ? revenue / months : 0;
                                        expertMrrArray.push(expertMrr); 
                                    }

                                    // Calculate totalExpertMrr by summing the values in the array
                                    let totalExpertMrr = expertMrrArray.reduce((acc, val) => acc + val, 0);
                                    formattedTotalExpertMrr += totalExpertMrr; 
                                    let formattedExpertMrr = totalExpertMrr.toFixed(0); 

                                    // Calculate activity counts for the lead
                                    if (lead.activities && Array.isArray(lead.activities)) {
                                        $.each(lead.activities, function(index, activity) {
                                            let dueDate = new Date(activity.due_date);
                                            let now = new Date();
                                            let startOfToday = new Date();
                                            startOfToday.setHours(0, 0, 0, 0);

                                            if (dueDate < startOfToday) {
                                                leadOverdueCount++;
                                            } else if (now.toDateString() === dueDate.toDateString()) {
                                                leadTodayCount++;
                                            } else if (dueDate > now) {
                                                leadPlannedCount++;
                                            }
                                        });
                                    }


                                    totalOverdueCount += leadOverdueCount;
                                    totalTodayCount += leadTodayCount;
                                    totalPlannedCount += leadPlannedCount;
                                    totalLeads++; 
                            });


                            // Calculate percentages after all leads have been processed
                            let totalCount = totalOverdueCount + totalTodayCount + totalPlannedCount;
                            let overduePercentage = totalCount > 0 ? (totalOverdueCount / totalCount) * 100 : 0;
                            let todayPercentage = totalCount > 0 ? (totalTodayCount / totalCount) * 100 : 0;
                            let plannedPercentage = totalCount > 0 ? (totalPlannedCount / totalCount) * 100 : 0;
                            const groupHtml = `
                                    <div class="o_kanban_group flex-shrink-0 flex-grow-1 flex-md-grow-0 o_group_draggable" data-id="${leads.id}">
                                        <div class="o_kanban_header position-sticky top-0 z-index-1 py-2">
                                            <div class="o_kanban_header_title position-relative d-flex lh-lg">
                                            <span class="o_column_title flex-grow-1 d-inline-block mw-100 text-truncate fs-4 fw-bold align-top text-900">${groupName}</span>
                                                <div class="o_kanban_config"><button class="btn px-2 o-dropdown dropdown-toggle dropdown" aria-expanded="false"><i class="fa fa-gear opacity-50 opacity-100-hover" role="img" aria-label="Settings" title="Settings"></i></button></div>
                                            <button class="o_kanban_quick_add new-lead-btn btn pe-2 me-n2">
                                                <i class="fa fa-plus opacity-75 opacity-100-hover" role="img" aria-label="Quick add" title="Quick add"></i>
                                            </button>
                                        </div>
                                        
                                            <div class="o_kanban_counter position-relative d-flex align-items-center justify-content-between">
                                                <div class="o_column_progress progress bg-300 w-50">
                                                    <div class="progress">
                                                        <div id="overdue" role="progressbar" class="progress-bar bg-danger" style="width: ${overduePercentage}px" aria-label="Overdue" title="Overdue (${totalOverdueCount})"></div>
                                                        <div id="today" role="progressbar" class="progress-bar bg-warning" style="width: ${todayPercentage}px" aria-label="Today" title="Today (${totalTodayCount})"></div>
                                                        <div id="planned" role="progressbar" class="progress-bar bg-success" style="width: ${plannedPercentage}px" aria-label="Planned" title="Planned (${totalPlannedCount})"></div>
                                                    </div>
                                                </div>
                                                <div class="o_animated_number ms-2 text-900 text-nowrap cursor-default false" title="Expected Revenue" data-target="${formattedTotalExpertMrr}">
                                                    <b>${formattedTotalExpertMrr}</b>
                                                </div>
                                                <div class="o_animated_number ms-2 text-900 text-nowrap cursor-default false" title="Total Expected Revenue" data-target="${expected_revenue}">
                                                    <b>${expected_revenue}</b>
                                                </div>
                                            
                                            </div>
                                             <div id="append-container-new"  class="append-container-new"></div>

                                            ${leads.map(lead => {

                                                         const now = new Date();
                                                                const startOfToday = new Date();
                                                                startOfToday.setHours(0, 0, 0, 0); // Reset to the start of the day

                                                                // Convert the lead activities' due dates from string format to Date objects
                                                                const overdueActivities = lead.activities.filter(activity => new Date(activity.due_date) < startOfToday);
                                                                console.log(overdueActivities, 'overdueActivities');
                                                                const todayActivities = lead.activities.filter(activity => new Date(activity.due_date).toDateString() === now.toDateString());
                                                                const plannedActivities = lead.activities.filter(activity => new Date(activity.due_date) > now);

                                                                // Activity counts
                                                                const overdueCount = overdueActivities.length;
                                                                const todayCount = todayActivities.length;
                                                                const plannedCount = plannedActivities.length;

                                                                // First relevant activity
                                                                const firstActivity = overdueActivities[0] || todayActivities[0] || plannedActivities[0];

                                                                // Default icon
                                                                let iconClass = 'fa fa-fw fa-lg text-muted fa-clock-o btn-link text-dark';

                                                                if (firstActivity) {
                                                                    const dueDate = new Date(firstActivity.due_date);

                                                                    if (dueDate < startOfToday) {
                                                                        // Overdue
                                                                        iconClass = 'fa fa-fw fa-lg text-danger fa-exclamation-triangle';
                                                                    } else if (dueDate.toDateString() === now.toDateString()) {
                                                                        // Due today
                                                                        iconClass = 'fa fa-fw fa-lg text-success fa-check';
                                                                    } else if (dueDate > now) {
                                                                        // Planned
                                                                        iconClass = 'fa fa-fw fa-lg text-primary fa-clock-o';
                                                                    }

                                                                    // Adjust icon based on activity type
                                                                    switch (firstActivity.activity_type) {
                                                                        case 'email':
                                                                            iconClass = 'fa fa-fw fa-lg text-danger fa-envelope';
                                                                            break;
                                                                        case 'request_signature':
                                                                            iconClass = 'fa fa-fw fa-lg text-success fa-pencil-square-o';
                                                                            break;
                                                                        case 'meeting':
                                                                            iconClass = 'fa fa-fw fa-lg text-success fa-users';
                                                                            break;
                                                                        case 'upload_document':
                                                                            iconClass = 'fa fa-fw fa-lg text-success fa-upload';
                                                                            break;
                                                                        case 'call':
                                                                            iconClass = 'fa fa-fw fa-lg text-success fa-phone';
                                                                            break;
                                                                        case 'to-do':
                                                                            iconClass = 'fa fa-fw fa-lg text-success fa-check';
                                                                            break;
                                                                    }
                                                                }
                                                  
                                                        
                                                    return `

                                            

                                          
                                                    <div role="article" class="o_kanban_record sale-card d-flex o_draggable oe_kanban_card_undefined o_legacy_kanban_record" data-id="${lead.id}" tabindex="0">
                                                        <div class="oe_kanban_color_0 oe_kanban_global_click oe_kanban_card d-flex flex-column">
                                                            <div class="oe_kanban_color w-5 " data-id="${lead.id}" style="width: 3px;background: ${lead.is_side_colour};height: 100%;position: absolute;top: 0;left: 0;"></div>
                                                            ${lead.is_lost == 2 ? `
                                                                <div class="o_widget o_widget_web_ribbon">
                                                                    <div class="ribbon ribbon-top-right">
                                                                        <span class="text-bg-danger" title="">Lost</span>
                                                                    </div>
                                                                </div>
                                                                ` : ''}
                                                            <div class="oe_kanban_content flex-grow-1" data-id="${lead.id }" >
                                                                <div class="oe_kanban_details"><strong class="o_kanban_record_title"><span>${ lead.opportunity }</span></strong></div>
                                                                <div class="o_kanban_record_subtitle">
                                                                    ${lead.expected_revenue != null ? `
                                                                    <div name="expected_revenue" class="o_field_widget o_field_monetary">
                                                                        <span>₹&nbsp;${parseFloat(lead.expected_revenue).toFixed(2)}</span> &nbsp; + &nbsp;
                                                                        <span>₹&nbsp;${parseFloat(lead.recurring_revenue).toFixed(2)}</span>
                                                                        ${lead.get_recurring_plan ? `&nbsp;<span>${lead.get_recurring_plan.plan_name || ''}</span>` : ''}
                                                                    </div>
                                                                ` : ''}
                                                                </div>
                                                            ${lead.contact ? `
                                                                        <div>
                                                                            <span class="o_text_overflow">${lead.contact.name || ''}</span>
                                                                        </div>
                                                                    ` : ''}
                                                                <div>
                                                                    <div name="tag_ids" class="o_field_widget o_field_many2many_tags">
                                                                    
                                                                        <div class="d-flex flex-wrap gap-1"> 
                                                               
                                                                        <span class="badge badge-primary" style="background:{{$tag->color}};border-radius: 23px">{{ $tag->name }}</span>
                                                                           
                                                                            
                                                                    
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <div name="lead_properties" class="o_field_widget o_field_properties">
                                                                        <div class="w-100 fw-normal text-muted"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="oe_kanban_footer">
                                                                <div class="o_kanban_record_bottom">
                                                                    <div class="oe_kanban_bottom_left">
                                                                        <div name="priority" class="o_field_widget o_field_priority">
                                                                            <div class="o_priority set-priority" role="radiogroup" name="priority" aria-label="Priority">
                                                                                <a href="#" class="o_priority_star fa ${lead.priority == 'medium' || lead.priority == 'high' || lead.priority == 'very_high' ? 'fa-star' : 'fa-star-o' }" role="radio" tabindex="-1" data-value="medium" data-tooltip="Priority: Medium" aria-label="Medium"></a><a href="#" class="o_priority_star fa ${lead.priority == 'high' || lead.priority == 'very_high' ? 'fa-star' : 'fa-star-o' }" role="radio" tabindex="-1" data-value="high" data-tooltip="Priority: High" aria-label="High"></a><a href="#" class="o_priority_star fa ${lead.priority == 'very_high' ? 'fa-star' : 'fa-star-o' }" role="radio" tabindex="-1" data-value="very_high" data-tooltip="Priority: Very High" aria-label="Very High"></a>
                                                                            </div>
                                                                        </div>
                                                                     
                                                                          
                                                                            <div name="activity_ids" class="o_field_widget o_field_kanban_activity">
                                                                                <a class="o-mail-ActivityButton activityButton" role="button" aria-label="Show activities" id="activityButton" data-id="${lead.id}" title="Show activities">
                                                                                    <i class="${iconClass}" role="img"></i>
                                                                                </a>
                                                                            </div>
                                                                            <div class="o_popover popover mw-100 o-popover--with-arrow bs-popover-bottom o-popover-bottom o-popover--bs d-none activityPopover" data-id="${lead.id}" id="activityPopover" style="    top: 86px;
                                                                                                left: 105.75px;">
                                                                                <div class="o-mail-ActivityListPopover d-flex flex-column">
                                                                                    <div class="overflow-y-auto d-flex flex-column flex-grow-1">

                                                                                        <!-- Overdue Section -->
                                                                                        <div class="o-mail-ActivityListPopoverItem d-flex flex-column border-bottom py-2">
                                                                                            <div class="overflow-auto d-flex align-items-baseline ms-3 me-1">
                                                                                                <b class="text-900 me-2 text-truncate flex-grow-1">Overdue ({{ $overdueCount }})</b>
                                                                                            </div>
                                                                                            @foreach($overdueActivities as $value)
                                                                                                <div class="d-flex align-items-center flex-wrap mx-3 " data-id="{{ $value->id }}">
                                                                                                @php
                                                                                    
                                                                                                            $user = $sale->user;
                                                                                                            $initial = $user ? strtoupper(substr($user->email, 0, 1)) : '';

                                                                                                            $colors = ['#f44336', '#e91e63', '#9c27b0', '#673ab7', '#3f51b5', '#2196f3', '#03a9f4', '#00bcd4', '#009688', '#4caf50', '#8bc34a', '#cddc39', '#ffeb3b', '#ffc107', '#ff9800', '#ff5722'];

                                                                                                    
                                                                                                            if ($user) {
                                                                                                                $colorIndex = crc32($user->email) % count($colors);
                                                                                                                $bgColor = $colors[$colorIndex];
                                                                                                            } else {
                                                                                                                $bgColor = '#f0f0f0'; 
                                                                                                            }
                                                                                                        @endphp
                                                                                                    <span
                                                                                                        class="avatar-initials rounded d-flex align-items-center justify-content-center" style="background-color: {{ $bgColor }}; width:25px;height:24px;color:white">
                                                                                                        {{ $initial }}
                                                                                                    </span>
                                                                                                    <div class="mt-1 flex-grow-1">
                                                                                                    &nbsp;&nbsp;<small>{{ $sale->user->email }} - Today</small>
                                                                                                    </div>
                                                                                                    <button class="o-mail-ActivityListPopoverItem-markAsDone btn btn-sm btn-success btn-link" data-target="#overdue_feedback_{{ $value->id }}"><i class="fa fa-check"></i></button>
                                                                                                    <button class="o-mail-ActivityListPopoverItem-editbtn btn btn-sm btn-success btn-link"><i class="fa fa-pencil"></i></button>
                                                                                                    <button class="o-mail-ActivityListPopoverItem-cancel btn btn-sm btn-danger btn-link"><i class="fa fa-times"></i></button>
                                                                                                    <div class="py-2 px-3 d-none" id="overdue_feedback_{{ $value->id }}">
                                                                                                        <textarea class="form-control feedback-textarea" style="min-height: 70px;width:300px" rows="3" placeholder="Write Feedback"></textarea>
                                                                                                        <div class="mt-2">
                                                                                                            <button type="button" class="btn btn-sm btn-primary mx-2 feedback-submit" data-id="{{ $value->id }}"> Done </button>
                                                                                                            <button type="button" class="btn btn-sm btn-link feedback-discard" data-target="#overdue_feedback_{{ $value->id }}">Discard </button>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            @endforeach
                                                                                        </div>

                                                                                        <!-- Today Section -->
                                                                                        <div class="o-mail-ActivityListPopoverItem d-flex flex-column border-bottom py-2">
                                                                                            <div class="overflow-auto d-flex align-items-baseline ms-3 me-1">
                                                                                                <b class="text-900 me-2 text-truncate flex-grow-1">Today ({{ $todayCount }})</b>
                                                                                            </div>
                                                                                            @foreach($todayActivities as $value)
                                                                                                <div class="d-flex align-items-center flex-wrap mx-3 hideDiv" data-id="{{ $value->id }}">
                                                                                                @php
                                                                                    
                                                                                                            $user = $sale->user;
                                                                                                            $initial = $user ? strtoupper(substr($user->email, 0, 1)) : '';

                                                                                                            $colors = ['#f44336', '#e91e63', '#9c27b0', '#673ab7', '#3f51b5', '#2196f3', '#03a9f4', '#00bcd4', '#009688', '#4caf50', '#8bc34a', '#cddc39', '#ffeb3b', '#ffc107', '#ff9800', '#ff5722'];

                                                                                                    
                                                                                                            if ($user) {
                                                                                                                $colorIndex = crc32($user->email) % count($colors);
                                                                                                                $bgColor = $colors[$colorIndex];
                                                                                                            } else {
                                                                                                                $bgColor = '#f0f0f0'; 
                                                                                                            }
                                                                                                        @endphp
                                                                                                    <span
                                                                                                        class="avatar-initials rounded d-flex align-items-center justify-content-center" style="background-color: {{ $bgColor }}; width:25px;height:24px;color:white">
                                                                                                        {{ $initial }}
                                                                                                    </span>
                                                                                                    <div class="mt-1 flex-grow-1">
                                                                                                    &nbsp;&nbsp;<small>{{ $sale->user->email }} - Today</small>
                                                                                                    </div>
                                                                                                    <button class="o-mail-ActivityListPopoverItem-markAsDone btn btn-sm btn-success btn-link" data-target="#today_feedback_{{ $value->id }}"><i class="fa fa-check"></i></button>
                                                                                                    <button class="o-mail-ActivityListPopoverItem-editbtn btn btn-sm btn-success btn-link"><i class="fa fa-pencil"></i></button>
                                                                                                    <button class="o-mail-ActivityListPopoverItem-cancel btn btn-sm btn-danger btn-link"><i class="fa fa-times"></i></button>
                                                                                                    <div class="py-2 px-3 d-none" id="today_feedback_{{ $value->id }}">
                                                                                                        <textarea class="form-control feedback-textarea" style="min-height: 70px;width:300px" rows="3" placeholder="Write Feedback"></textarea>
                                                                                                        <div class="mt-2">
                                                                                                            <button type="button" class="btn btn-sm btn-primary mx-2 feedback-submit" data-id="{{ $value->id }}"> Done </button>
                                                                                                            <button type="button" class="btn btn-sm btn-link feedback-discard" data-target="#today_feedback_{{ $value->id }}">Discard </button>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            @endforeach
                                                                                        </div>

                                                                                        <!-- Planned Section -->
                                                                                        <div class="o-mail-ActivityListPopoverItem d-flex flex-column border-bottom py-2">
                                                                                            <div class="overflow-auto d-flex align-items-baseline ms-3 me-1">
                                                                                                <b class="text-900 me-2 text-truncate flex-grow-1">Planned ({{ $plannedCount }})</b>
                                                                                            </div>
                                                                                            @foreach($plannedActivities as $value)
                                                                                                <div class="d-flex align-items-center flex-wrap mx-3 hideDiv" data-id="{{ $value->id }}">
                                                                                                @php
                                                                                    
                                                                                                            $user = $sale->user;
                                                                                                            $initial = $user ? strtoupper(substr($user->email, 0, 1)) : '';

                                                                                                            $colors = ['#f44336', '#e91e63', '#9c27b0', '#673ab7', '#3f51b5', '#2196f3', '#03a9f4', '#00bcd4', '#009688', '#4caf50', '#8bc34a', '#cddc39', '#ffeb3b', '#ffc107', '#ff9800', '#ff5722'];

                                                                                                    
                                                                                                            if ($user) {
                                                                                                                $colorIndex = crc32($user->email) % count($colors);
                                                                                                                $bgColor = $colors[$colorIndex];
                                                                                                            } else {
                                                                                                                $bgColor = '#f0f0f0'; 
                                                                                                            }
                                                                                                        @endphp
                                                                                                    <span
                                                                                                        class="avatar-initials rounded d-flex align-items-center justify-content-center" style="background-color: {{ $bgColor }}; width:25px;height:24px;color:white">
                                                                                                        {{ $initial }}
                                                                                                    </span>
                                                                                                    <div class="mt-1 flex-grow-1">
                                                                                                    &nbsp;&nbsp;<small>{{ $sale->user->email }} - Planned</small>
                                                                                                    </div>
                                                                                                    <button class="o-mail-ActivityListPopoverItem-markAsDone btn btn-sm btn-success btn-link" data-target="#planned_feedback_{{ $value->id }}"><i class="fa fa-check"></i></button>
                                                                                                    <button class="o-mail-ActivityListPopoverItem-editbtn btn btn-sm btn-success btn-link"><i class="fa fa-pencil"></i></button>
                                                                                                    <button class="o-mail-ActivityListPopoverItem-cancel btn btn-sm btn-danger btn-link"><i class="fa fa-times"></i></button>
                                                                                                    <div class="py-2 px-3 d-none" id="planned_feedback_{{ $value->id }}">
                                                                                                        <textarea class="form-control feedback-textarea" style="min-height: 70px;width:300px" rows="3" placeholder="Write Feedback"></textarea>
                                                                                                        <div class="mt-2">
                                                                                                            <button type="button" class="btn btn-sm btn-primary mx-2 feedback-submit" data-id="{{ $value->id }}"> Done </button>
                                                                                                            <button type="button" class="btn btn-sm btn-link feedback-discard" data-target="#planned_feedback_{{ $value->id }}">Discard </button>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            @endforeach
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="popover-arrow end-auto"></div>
                                                                            </div>
                                                                    </div>

                                                                    <div class="oe_kanban_bottom_right">
                                                                        <div name="user_id" class="o_field_widget o_field_many2one_avatar_user o_field_many2one_avatar_kanban o_field_many2one_avatar">
                                                                                <div class="d-flex align-items-center gap-1" data-tooltip="{{ $sale->email ?? '' }}"><span class="o_avatar o_m2o_avatar d-flex">
                                                                                        @php
                                                                                        
                                                                                            $user = $sale->salesPerson;
                                                                                            $initial = $user ? strtoupper(substr($user->email, 0, 1)) : '';

                                                                                            $colors = ['#f44336', '#e91e63', '#9c27b0', '#673ab7', '#3f51b5', '#2196f3', '#03a9f4', '#00bcd4', '#009688', '#4caf50', '#8bc34a', '#cddc39', '#ffeb3b', '#ffc107', '#ff9800', '#ff5722'];

                                                                                    
                                                                                            if ($user) {
                                                                                                $colorIndex = crc32($user->email) % count($colors);
                                                                                                $bgColor = $colors[$colorIndex];
                                                                                            } else {
                                                                                                $bgColor = '#f0f0f0'; 
                                                                                            }
                                                                                        @endphp
                                                                                        @if(optional($user)->profile)
                                                                                            <!-- If profile image exists -->
                                                                                            <img class="rounded" src="{{ $user->profile }}" alt="User Profile">
                                                                                        @else
                                                                                            <!-- If no profile image, display the first letter of email with dynamic background color -->
                                                                                            <div class="placeholder-circle rounded d-flex align-items-center justify-content-center" data-id="{{$sale->id}}" style="background-color: {{ $bgColor }}; width:25px;height:24px;color:white">
                                                                                                <span>{{ $initial }}</span>
                                                                                            </div>
                                                                                        @endif

                                                                                    </span>
                                                                                </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                        </div>

                                                        <div class="o_dropdown_kanban bg-transparent position-absolute end-0">
                                                            <button class="btn o-no-caret rounded-0 o-dropdown dropdown-toggle dropdown" title="Dropdown menu" id="color_button" aria-expanded="false">
                                                                <span class="fa fa-ellipsis-v"></span>
                                                            </button>

                                                            <div class="dropdown-menu custom-dropdown" style="display:none;" >
                                                                <div class="dropdown-item op_edit" data-id="${lead.id}">Edit</div>
                                                                <div class="dropdown-item op_delete" data-id="${lead.id}">Delete</div>
                                                                <div class="dropdown-divider"></div>
                                                                <div class="color-options">
                                                                    <span class="color-box" data-id="${lead.id}" data-color="#ffffff" style="background-color:#ffffff;"></span>
                                                                    <span class="color-box" data-id="${lead.id}" data-color="#ee2d2d" style="background-color:#ee2d2d;"></span>
                                                                    <span class="color-box" data-id="${lead.id}" data-color="#dc8534" style="background-color:#dc8534;"></span>
                                                                    <span class="color-box" data-id="${lead.id}" data-color="#e8bb1d" style="background-color:#e8bb1d;"></span>
                                                                    <span class="color-box" data-id="${lead.id}" data-color="#5794dd" style="background-color:#5794dd;"></span>
                                                                    <span class="color-box" data-id="${lead.id}" data-color="#9f628f" style="background-color:#9f628f;"></span>
                                                                    <span class="color-box" data-id="${lead.id}" data-color="#db8865" style="background-color:#db8865;"></span>
                                                                    <span class="color-box" data-id="${lead.id}" data-color="#41a9a2" style="background-color:#41a9a2;"></span>
                                                                    <span class="color-box" data-id="${lead.id}" data-color="#304be0" style="background-color:#304be0;"></span>
                                                                    <span class="color-box" data-id="${lead.id}" data-color="#ee2f8a" style="background-color:#ee2f8a;"></span>
                                                                    <span class="color-box" data-id="${lead.id}" data-color="#61c36e" style="background-color:#61c36e;"></span>
                                                                    <span class="color-box" data-id="${lead.id}" data-color="#9872e6" style="background-color:#9872e6;"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    `;
                                                }).join('')}
                                         

                                     </div> 
                                        `;
                                       $('.o_kanban_renderer').append(groupHtml);
                                   
                                
                    });

                   
                },
                error: function (xhr, status, error) {
                    console.error('Error applying filter:', error);
                }
            });
            
        }
        

        $(document).on('click', '.lead-row', function () {
            var leadId = $(this).data('id')
            var index = $(this).find('td.d-none').text();
          
    
            if (leadId) {
                window.location.href = '/lead-add/' + leadId + '/' + index;
            }
        });

        // Initialize tags if any tags are present on page load
        updateTagSeparatorsGrop(); // Ensure that the close icon is added correctly

        // ------------------------------ Favorite Filter Start -----------------------------------------------

        // Handle the save button click
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

@push('head_scripts')
@vite ('resources/js/common.js')
@endpush
