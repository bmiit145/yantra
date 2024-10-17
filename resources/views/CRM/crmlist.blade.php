@extends('layout.header')
@section('content')
@section('head_breadcrumb_title', 'Pipeline')
@section('lead', route('crm.pipeline.list'))
@section('head_new_btn_link', route('crm.pipeline.create'))
@section('kanban', url('crm'))
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

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<!-- jQuery (required for Bootstrap JS components) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css"
    href="https://cdn.datatables.net/colreorder/1.3.2/css/colReorder.dataTables.min.cssive.dataTables.min.css">

@endsection
@section('search_div')
<div class="o_popover popover mw-100 o-dropdown--menu dropdown-menu mx-0 o_search_bar_menu d-flex flex-wrap flex-lg-nowrap w-100 w-md-auto mx-md-auto mt-2 py-3"
    role="menu" style="position: absolute; top: 0; left: 0;">
    <div class="o_dropdown_container o_filter_menu w-100 w-lg-auto h-100 px-3 mb-4 mb-lg-0 border-end">
        <div class="px-3 fs-5 mb-2"><i class="me-2 fa fa-filter"></i>
            <input type="hidden" id="filter" name="filter" value="">

            <h5 class="o_dropdown_title d-inline">Filters</h5>
        </div>
        <span class="o-dropdown-item dropdown-item o-navigable o_menu_item text-truncate my-pipeline"
            role="menuitemcheckbox" tabindex="0" title="" aria-checked="false" id="my-pipeline"><span
                class="float-end checkmark" style="display:none;">✔</span>My Pipeline</span>
        <span class="o-dropdown-item dropdown-item o-navigable o_menu_item text-truncate unassigned"
            role="menuitemcheckbox" tabindex="0" title="" aria-checked="false" id="unassigned"><span
                class="float-end checkmark" style="display:none;">✔</span>Unassigned</span>
        <span class="o-dropdown-item dropdown-item o-navigable o_menu_item text-truncate open_opportunities"
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
            class="o-dropdown-item dropdown-item o-navigable o_menu_item text-truncate" role="menuitemcheckbox"
            tabindex="0" title="Won" aria-checked="false">Won</span><span
            class="o-dropdown-item dropdown-item o-navigable o_menu_item text-truncate" role="menuitemcheckbox"
            tabindex="0" title="Ongoing" aria-checked="false">Ongoing</span><span
            class="o-dropdown-item dropdown-item o-navigable o_menu_item text-truncate focus" role="menuitemcheckbox"
            tabindex="0" title="Lost" aria-checked="false">Lost</span>
        <div class="dropdown-divider" role="separator"></div>
        <span class="o-dropdown-item dropdown-item o-navigable o_menu_item o_add_custom_filter" role="menuitem"
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
                aria-expanded="false" id="expectedBtn" style="display: flex;justify-content: space-between;">
                Expected Closing
                <span class="arrow-icon" style="font-size: 10px;margin-top: 4px;">▼</span>
            </button>
            <div class="o_dropdown_content" id="cxpectedClosing"
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
        <div class="px-3 fs-5 mb-2"><i class="me-2 text-favourite fa fa-star"></i>
            <h5 class="o_dropdown_title d-inline">Favorites</h5>
        </div><span class="o-dropdown-item dropdown-item o-navigable o_menu_item text-truncate selected"
            role="menuitemcheckbox" tabindex="0" aria-checked="true"><span
                class="d-flex p-0 align-items-center justify-content-between"><span class="text-truncate flex-grow-1"
                    title="">Leads</span><i class="ms-1 fa fa-trash-o" title="Delete item"></i></span></span>
        <div role="separator" class="dropdown-divider"></div>
        <div class="o_accordion position-relative"><button
                class="o_menu_item o_accordion_toggle dropdown-item o-navigable o_add_favorite text-truncate"
                tabindex="0" aria-expanded="false">Save current search</button></div>
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

    .tag {
        display: inline-block;
        padding: 5px 10px;
        background-color: #E0E0E0;
        border-radius: 22px;
        margin-right: 12px;
        font-size: 14px;
        top: 5px;
        left: 5px;
    }

    .tag1 {
        display: inline-block;
        padding: 5px 10px;
        background-color: #E0E0E0;
        border-radius: 22px;
        margin-right: 12px;
        font-size: 14px;
        top: 5px;
        left: 5px;
    }

    .tag5 {
        display: inline-block;
        padding: 5px 10px;
        background-color: #E0E0E0;
        border-radius: 22px;
        margin-right: 12px;
        font-size: 14px;
        top: 5px;
        left: 5px;
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
</style>

<div class="card" style="padding: 1%">
    <div class="table-responsive text-nowrap">
        <table id="example" class="stripe row-border order-column" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th class="d-none">Index</th>
                    <th>Created On</th>
                    <th>Opportunity</th>
                    <th>Customer</th>
                    <th>Contact Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Country</th>
                    <th>Sales Person</th>
                    <th>Sales Team</th>
                    <th>Priority</th>
                    <!-- <th>Activities</th>
                    <th>Activity By</th> -->
                    <!-- <th>My Deadline</th> -->
                    <th>Campaign</th>
                    <th>Medium</th>
                    <th>Source</th>
                    <th>Expected Revenue</th>
                    <th>Expected Closing</th>
                    <th>Expected MRR</th>
                    <th>Recurring Revenues</th>
                    <th>Recurring Plan</th>
                    <th>Stage</th>
                    <th>Probability</th>
                    <th>Lost Reason</th>
                    <th>Tags</th>
                    <th style="width:35px !important"><a class="dropdown-btn"><i class="fa fa-list"></i></a>
                        <div class="hide-show-dropdown-menu dropdown-menu">
                            <div class="dropdown-checkbox">
                                <label><input type="checkbox" data-column="0" checked> Created On</label>
                            </div>
                            <div class="dropdown-checkbox">
                                <label><input type="checkbox" data-column="1" checked> Opportunity</label>
                            </div>
                            <div class="dropdown-checkbox">
                                <label><input type="checkbox" data-column="2"> Customer</label>
                            </div>
                            <div class="dropdown-checkbox">
                                <label><input type="checkbox" data-column="3" checked> Contact Name</label>
                            </div>
                            <div class="dropdown-checkbox">
                                <label><input type="checkbox" data-column="4" checked> Email</label>
                            </div>
                            <div class="dropdown-checkbox">
                                <label><input type="checkbox" data-column="5"> Phone</label>
                            </div>
                            <div class="dropdown-checkbox">
                                <label><input type="checkbox" data-column="4"> City</label>
                            </div>
                            <div class="dropdown-checkbox">
                                <label><input type="checkbox" data-column="7"> State</label>
                            </div>
                            <div class="dropdown-checkbox">
                                <label><input type="checkbox" data-column="8"> Country</label>
                            </div>
                            <div class="dropdown-checkbox">
                                <label><input type="checkbox" data-column="9" checked> Sales Person</label>
                            </div>
                            <div class="dropdown-checkbox">
                                <label><input type="checkbox" data-column="10"> Sales Team</label>
                            </div>
                            <div class="dropdown-checkbox">
                                <label><input type="checkbox" data-column="11" checked> Priority</label>
                            </div>
                            <div class="dropdown-checkbox">
                                <label><input type="checkbox" data-column="12"> Campaign</label>
                            </div>
                            <div class="dropdown-checkbox">
                                <label><input type="checkbox" data-column="13"> Medium</label>
                            </div>
                            <div class="dropdown-checkbox">
                                <label><input type="checkbox" data-column="14"> Source</label>
                            </div>
                            <div class="dropdown-checkbox">
                                <label><input type="checkbox" data-column="15" checked> Expected Revenue</label>
                            </div>
                            <div class="dropdown-checkbox">
                                <label><input type="checkbox" data-column="16"> Expected Closing</label>
                            </div>
                            <div class="dropdown-checkbox">
                                <label><input type="checkbox" data-column="17" checked> Expected MRR</label>
                            </div>
                            <div class="dropdown-checkbox">
                                <label><input type="checkbox" data-column="18"> Recurring Revenues</label>
                            </div>
                            <div class="dropdown-checkbox">
                                <label><input type="checkbox" data-column="19"> Recurring Plan</label>
                            </div>
                            <div class="dropdown-checkbox">
                                <label><input type="checkbox" data-column="20" checked> Stage</label>
                            </div>
                            <div class="dropdown-checkbox">
                                <label><input type="checkbox" data-column="21" checked> Probability</label>
                            </div>
                            <div class="dropdown-checkbox">
                                <label><input type="checkbox" data-column="22"> Lost Reason</label>
                            </div>
                            <div class="dropdown-checkbox">
                                <label><input type="checkbox" data-column="23"> Tags</label>
                            </div>

                        </div>
                    </th>

                </tr>
            </thead>

            <tbody id="lead-table-body">
                @forEach($data as $pipeline)
                            <tr data-id="{{$pipeline->id}}" style="cursor: pointer;">
                                 <td class="d-none">{{$loop->index + 1}}</td>
                                <td>{{ $pipeline->created_at->format('d/m/Y H:i:s') ?? '' }}</td>
                                <td>{{$pipeline->opportunity ?? ''}}</td>
                                <td>{{$pipeline->contact->name ?? ''}}</td>
                                <td>{{$pipeline->contact_name ?? ''}}</td>
                                <td>{{$pipeline->email ?? ''}}</td>
                                <td>{{$pipeline->phone ?? ''}}</td>
                                <td>{{$pipeline->city ?? ''}}</td>
                                <td>{{$pipeline->getState->name ?? ''}}</td>
                                <td>{{$pipeline->getCountry->name ?? ''}}</td>
                                <td>{{$pipeline->user->email ?? ''}}</td>
                                <td>{{$pipeline->sales ?? ''}}</td>
                                <td>
                                    <!-- Medium Priority -->
                                    <a href="#"
                                        class="o_priority_star fa {{ isset($pipeline->priority) && ($pipeline->priority == 'medium' || $pipeline->priority == 'high' || $pipeline->priority == 'very_high') ? 'fa-star' : 'fa-star-o' }}"
                                        role="radio" tabindex="-1" data-value="medium" data-tooltip="Priority: Medium"
                                        aria-label="Medium"></a>

                                    <!-- High Priority -->
                                    <a href="#"
                                        class="o_priority_star fa {{ isset($pipeline->priority) && ($pipeline->priority == 'high' || $pipeline->priority == 'very_high') ? 'fa-star' : 'fa-star-o' }}"
                                        role="radio" tabindex="-1" data-value="high" data-tooltip="Priority: High"
                                        aria-label="High"></a>

                                    <!-- Very High Priority -->
                                    <a href="#"
                                        class="o_priority_star fa {{ isset($pipeline->priority) && $pipeline->priority == 'very_high' ? 'fa-star' : 'fa-star-o' }}"
                                        role="radio" tabindex="-1" data-value="very_high" data-tooltip="Priority: Very High"
                                        aria-label="Very High"></a>
                                </td>
                                <!-- <td>Activities</td>
                                                                    <td>Activity By</td> -->
                                <!-- <td>My Deadline</td> -->
                                <td>{{$pipeline->getCampaign->name ?? ''}}</td>
                                <td>{{$pipeline->getMedium->name ?? ''}}</td>
                                <td>{{$pipeline->getSource->name ?? ''}}</td>
                                <td>{{$pipeline->expected_revenue ?? ''}}</td>
                                <td>{{$pipeline->deadline ?? ''}}</td>
                                <td>
                                    @if($pipeline->recurring_revenue && $pipeline->getRecurringPlan && $pipeline->getRecurringPlan->months)
                                                        <?php
                                        $revenue = floatval($pipeline->recurring_revenue);
                                        $months = floatval($pipeline->getRecurringPlan->months);
                                        $expertMrr = ($months > 0) ? number_format($revenue / $months, 2) : 'Invalid months';
                                                                                                                                                            ?>
                                                        {{ $expertMrr }}
                                    @else

                                    @endif
                                </td>
                                <td>{{$pipeline->recurring_revenue ?? ''}}</td>
                                <td>{{$pipeline->getRecurringPlan->plan_name ?? ''}}</td>
                                <td>{{$pipeline->stage->title ?? ''}}</td>
                                <td>{{$pipeline->probability ?? ''}}</td>
                                <td>{{$pipeline->loslost_reasont ?? ''}}</td>
                                <td>
                                    @foreach($pipeline->tags() as $tag)
                                        <span class="badge badge-primary"
                                            style="background:{{$tag->color}};border-radius: 23px">{{ $tag->name }}</span>
                                    @endforeach
                                </td>
                                <td></td>
                @endforeach
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="15"></th>
                    <th id="total_expected_revenue"></th>
                    <th colspan="1"></th>
                    <th id="total_recurring_mrr"></th>
                    <th colspan="1"></th>
                    <th id="total_recurring_revenue"></th>
                    <th colspan="5"></th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>





<!-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<!-- DataTables JS -->
<script type="text/javascript" charset="utf8"
    src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" charset="utf8"
    src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://legacy.datatables.net/extras/thirdparty/ColReorderWithResize/ColReorderWithResize.js"></script>
{{--
<script src="https://cdn.jsdelivr.net/npm/colresizable/colResizable-1.6.min.js"></script> --}}

<script>
    $(document).ready(function () {
        var table = $('#example').DataTable({
            "pageLength": 25,
            searching: false,
            "lengthChange": false,
            "sDom": 'Rlfrtip',
            "oColReorder": {
                "bAddFixed": true
            },
            footerCallback: function (row, data, start, end, display) {
                var api = this.api();

                var totalExpectedRevenue = api
                    .column(15)
                    .data()
                    .reduce(function (a, b) {
                        var x = parseFloat(a) || 0;
                        var y = parseFloat(b) || 0;
                        return x + y;
                    }, 0);

                var totalRecurringMrr = 0;
                api.rows().every(function () {
                    var data = this.data();
                    var mrrValue = parseFloat(data[17]) || 0; // Use the 17th column for MRR (index 16)

                    if (!isNaN(mrrValue)) { // Ensure it's a number
                        totalRecurringMrr += mrrValue;
                    }
                });

                var totalRecurringRevenue = api
                    .column(18)
                    .data()
                    .reduce(function (a, b) {
                        var x = parseFloat(a) || 0;
                        var y = parseFloat(b) || 0;
                        return x + y;
                    }, 0);

                $(api.column(15).footer()).html('₹ ' + totalExpectedRevenue.toFixed(2));
                $(api.column(17).footer()).html('₹ ' + totalRecurringMrr.toFixed(2));
                $(api.column(18).footer()).html('₹ ' + totalRecurringRevenue.toFixed(2));
            },
            createdRow: function (row, data, dataIndex) {
                $(row).attr('data-id', data.id);
            },

        });

        $('#example tbody').on('click', 'tr', function () {
            var id = $(this).data('id'); // Get the data-id attribute from the clicked row
            var index = $(this).find('td.d-none').text();
            if (id) {
                window.location.href = '/pipeline-create/' + id + '/' + index;
            }
        });
        // Restore column visibility from local storage
        function saveColumnVisibility() {
            var visibility = {};
            table.columns().every(function () {
                var column = this;
                var index = column.index();
                visibility[index] = column.visible();
            });
            localStorage.setItem('columnVisibility', JSON.stringify(visibility));
        }
        // Restore column visibility from localStorage
        function restoreColumnVisibility() {
            var visibility = JSON.parse(localStorage.getItem('columnVisibility'));
            if (visibility) {
                table.columns().every(function () {
                    var column = this;
                    var index = column.index();
                    // Check if the column exists and visibility is defined
                    if (visibility.hasOwnProperty(index)) {
                        var isVisible = visibility[index];
                        // Ensure the column exists before setting visibility
                        if (typeof column !== 'undefined') {
                            column.visible(isVisible);
                            // Update the corresponding checkbox based on the visibility
                            $('.dropdown-menu input[type="checkbox"][data-column="' + index + '"]').prop('checked', isVisible);
                        }
                    }
                });
            } else {
                // If no visibility settings in localStorage, set default visibility
                table.column(0).visible(true);
                table.column(1).visible(true);
                table.column(2).visible(false);
                table.column(3).visible(true);
                table.column(4).visible(true);
                table.column(5).visible(false);
                table.column(6).visible(false);
                table.column(7).visible(false);
                table.column(8).visible(false);
                table.column(9).visible(true);
                table.column(10).visible(false);
                table.column(11).visible(true);
                table.column(12).visible(false);
                table.column(13).visible(false);
                table.column(14).visible(false);
                table.column(15).visible(true);
                table.column(16).visible(false);
                table.column(17).visible(true);
                table.column(18).visible(false);
                table.column(19).visible(false);
                table.column(20).visible(true);
                table.column(21).visible(false);
                table.column(22).visible(false);
                table.column(23).visible(false);
            }
        }
        // Handle column visibility based on checkbox status
        $('.dropdown-menu input[type="checkbox"]').on('change', function () {
            var columnIndex = $(this).data('column');
            var column = table.column(columnIndex);
            // Ensure the column exists before trying to set visibility
            if (typeof column !== 'undefined') {
                column.visible(this.checked); // Show or hide the column based on the checkbox state
                saveColumnVisibility(); // Save visibility to local storage
            }
        });
        // Restore visibility states on page load
        restoreColumnVisibility();
        // Handle dropdown menu display
        $(document).on('click', '.dropdown-btn', function (event) {
            event.stopPropagation(); // Prevent click event from propagating to the document
            $('.dropdown-menu').not($(this).next('.dropdown-menu')).hide(); // Hide other dropdowns
            $(this).next('.dropdown-menu').toggle(); // Toggle visibility of the current dropdown
        });
        $(document).on('click', function (event) {
            if (!$(event.target).closest('.dropdown-menu').length) {
                $('.dropdown-menu').hide(); // Hide dropdown if click is outside of it
            }
        });

        // Remove all tags
        $(document).on('click', '.remove-tag', function () {
            $('.tag').remove();
            $('.checkmark').hide();
            $('#search-input').val('').attr('placeholder', 'Search...');
            $('#filter').val(''); // Clear the filter value
            table.ajax.reload();
        });

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


@endsection