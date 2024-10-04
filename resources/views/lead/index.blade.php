@extends('layout.header')
@section('content')
@section('head_breadcrumb_title', 'Leads')
@section('head_new_btn_link', route('lead.create'))
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
        <div class="px-3 fs-5 mb-2"><i class="me-2   fa fa-filter"></i>
            <input type="hidden" id="filter" name="filter" value="">

            <h5 class="o_dropdown_title d-inline">Filters</h5>
        </div>
        <span class="o-dropdown-item dropdown-item o-navigable o_menu_item text-truncate activities"
            role="menuitemcheckbox" tabindex="0" title="" aria-checked="false" id="my-activities"><span
                class="float-end checkmark" style="display:none;">✔</span>My Activities</span>
        <span class="o-dropdown-item dropdown-item o-navigable o_menu_item text-truncate activities"
            role="menuitemcheckbox" tabindex="0" title="" aria-checked="false" id="unassigned"><span
                class="float-end checkmark" style="display:none;">✔</span>Unassigned</span>
        <div class="dropdown-divider" role="separator"></div>
        <span class="o-dropdown-item dropdown-item o-navigable o_menu_item text-truncate lost_span"
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
            class="o-dropdown-item dropdown-item o-navigable o_menu_item text-truncate LTFActivities" role="menuitemcheckbox"
            tabindex="0" title="" aria-checked="false"><span class="float-end checkmark"
            style="display:none;">✔</span>Late Activities</span><span
            class="o-dropdown-item dropdown-item o-navigable o_menu_item text-truncate LTFActivities" role="menuitemcheckbox"
            tabindex="0" title="Today Activities" aria-checked="false"><span class="float-end checkmark"
            style="display:none;">✔</span>Today Activities</span><span
            class="o-dropdown-item dropdown-item o-navigable o_menu_item text-truncate LTFActivities" role="menuitemcheckbox"
            tabindex="0" title="Future Activities" aria-checked="false"><span class="float-end checkmark"
            style="display:none;">✔</span>Future Activities</span>
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
                style="display:none;">✔</span>City</span>
        <span class="o-dropdown-item_1 dropdown-item o-navigable o_menu_item text-truncate" role="menuitemcheckbox"
            tabindex="0" title="" aria-checked="false"> <span class="float-end checkmark"
                style="display:none;">✔</span>Country</span>
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
    <div class="modal-dialog modal-dialog-centered modal-lg">
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
        background-color: #F1F1F1;
        border: none;
        cursor: pointer;
        padding: 10px;
        border-radius: 5px;
        position: relative;
    }

    .hide-show-dropdown-menu {
        display: none;
        position: absolute;
        background-color: #F9F9F9;
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
        background-color: #F9F9F9;
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

    .o_searchview {
        gap: 10px;
    }

    .tag,
    .tag1,
    .LTFtag ,
     .tag5{
        display: inline-block;
        padding: 0px 10px 0px 0;
        background-color: #E0E0E0;
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
</style>


<div class="card" style="padding: 1%">
    <div class="table-responsive text-nowrap">

        <table id="example" class="stripe row-border order-column" cellspacing="0" width="100%">
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
                    <th>Sales Team
                    </th>
                    <th style="width:35px !important"><a class="dropdown-btn"><i class="fa fa-list"></i></a>
                        <div class="hide-show-dropdown-menu dropdown-menu">
                            <div class="dropdown-checkbox">
                                <label><input type="checkbox" data-column="0" checked> Lead</label>
                            </div>
                            <div class="dropdown-checkbox">
                                <label><input type="checkbox" data-column="1" checked> Email</label>
                            </div>
                            <div class="dropdown-checkbox">
                                <label><input type="checkbox" data-column="2" checked> City</label>
                            </div>
                            <div class="dropdown-checkbox">
                                <label><input type="checkbox" data-column="3"> State</label>
                            </div>
                            <div class="dropdown-checkbox">
                                <label><input type="checkbox" data-column="4" checked> Country</label>
                            </div>
                            <div class="dropdown-checkbox">
                                <label><input type="checkbox" data-column="5"> Zip</label>
                            </div>
                            <div class="dropdown-checkbox">
                                <label><input type="checkbox" data-column="6"> Probability</label>
                            </div>
                            <div class="dropdown-checkbox">
                                <label><input type="checkbox" data-column="7"> Company Name</label>
                            </div>
                            <div class="dropdown-checkbox">
                                <label><input type="checkbox" data-column="8"> Address 1</label>
                            </div>
                            <div class="dropdown-checkbox">
                                <label><input type="checkbox" data-column="9"> Address 2</label>
                            </div>
                            <div class="dropdown-checkbox">
                                <label><input type="checkbox" data-column="10"> Website Link</label>
                            </div>
                            <div class="dropdown-checkbox">
                                <label><input type="checkbox" data-column="11"> Contact Name</label>
                            </div>
                            <div class="dropdown-checkbox">
                                <label><input type="checkbox" data-column="12"> Job Postion</label>
                            </div>
                            <div class="dropdown-checkbox">
                                <label><input type="checkbox" data-column="13"> Phone</label>
                            </div>
                            <div class="dropdown-checkbox">
                                <label><input type="checkbox" data-column="14"> Mobile</label>
                            </div>
                            <div class="dropdown-checkbox">
                                <label><input type="checkbox" data-column="15"> Priority</label>
                            </div>
                            <div class="dropdown-checkbox">
                                <label><input type="checkbox" data-column="16"> Title</label>
                            </div>
                            <div class="dropdown-checkbox">
                                <label><input type="checkbox" data-column="17"> Tag</label>
                            </div>
                            <div class="dropdown-checkbox">
                                <label><input type="checkbox" data-column="18" checked> Sales Person</label>
                            </div>
                            <div class="dropdown-checkbox">
                                <label><input type="checkbox" data-column="19" checked> Sales Team</label>
                            </div>
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody id="lead-table-body">
                @forEach($data as $lead)
                    <tr data-id="{{$lead->id}}">
                        <td>{{$lead->product_name ?? ''}}</td>
                        <td>{{$lead->email ?? ''}}</td>
                        <td>{{$lead->city ?? ''}}</td>
                        <td>
                            @if(isset($lead->state))
                                {{ $lead->getState->name ?? $lead->getAutoState->name ?? '' }}
                            @endif
                        </td>
                        <td>
                            @if(isset($lead->country))
                                {{ $lead->getCountry->name ?? $lead->getAutoCountry->name ?? '' }}
                            @endif
                        </td>
                        <td>{{$lead->zip ?? ''}}</td>
                        <td>{{$lead->probability ?? ''}}</td>
                        <td>{{$lead->company_name ?? ''}}</td>
                        <td>{{$lead->address_1 ?? ''}}</td>
                        <td>{{$lead->address_2 ?? ''}}</td>
                        <td>{{$lead->website_link ?? ''}}</td>
                        <td>{{$lead->contact_name ?? ''}}</td>
                        <td>{{$lead->job_position ?? ''}}</td>
                        <td>{{$lead->phone ?? ''}}</td>
                        <td>{{$lead->mobile ?? ''}}</td>
                        <td>{{$lead->priority ?? ''}}</td>
                        <td>
                            @if(isset($lead->title))
                                {{ $lead->getTilte->title ?? '' }}
                            @endif
                        </td>
                        <td>
                            @foreach($lead->tags() as $tag)
                                <span class="badge badge-primary"
                                    style="background:{{$tag->color}};border-radius: 23px">{{ $tag->name }}</span>
                            @endforeach
                        </td>
                        <td>
                            @if(isset($lead->sales_person))
                                {{ $lead->getUser->email ?? '' }}
                            @endif
                        </td>
                        <td>{{$lead->sales_team ?? ''}}</td>
                        <td></td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>




{{--
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/colresizable/colResizable-1.6.min.js"></script> --}}

<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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
            columnDefs: [
                { orderable: false, targets: -1 } // Disable sorting for the last column
            ],

        });



        $('#example tbody').on('click', 'tr', function () {
            var id = $(this).data('id'); // Get the data-id attribute from the clicked row
            if (id) {
                window.location.href = '/lead-add/' + id; // Adjust the URL to your edit page
            }
        });
        function filterData(selectedTags) {
            $.ajax({
                url: '{{route('lead.activities')}}', // Your endpoint for fetching leads
                method: 'GET',
                data: {
                    tags: selectedTags
                    // Include other parameters if needed
                },
                success: function (response) {
                    var $tableBody = $('#lead-table-body');

                    // Clear existing table data
                    $tableBody.empty();

                    // Check if response contains data

                    // Loop through the response and create table rows
                    response.data.forEach(function (item) {
                            
                        var rowHtml = `<tr class="lead-row" data-id="${item.id}">`;

                        // Append data only for the visible columns
                        if (table.column(0).visible()) rowHtml += `<td>${item.product_name || ''}</td>`;
                        if (table.column(1).visible()) rowHtml += `<td>${item.email || ''}</td>`;
                        if (table.column(2).visible()) rowHtml += `<td>${item.city || ''}</td>`;
                        if (table.column(3).visible()) rowHtml += `<td>${item.state ? (item.get_state?.name || item.get_auto_state?.name || '') : ''}</td>`;
                        if (table.column(4).visible()) rowHtml += `<td>${item.country ? (item.get_country?.name || item.get_auto_country?.name || '') : ''}</td>`;
                        if (table.column(5).visible()) rowHtml += `<td>${item.zip || ''}</td>`;
                        if (table.column(6).visible()) rowHtml += `<td>${item.probability || ''}</td>`;
                        if (table.column(7).visible()) rowHtml += `<td>${item.company_name || ''}</td>`;
                        if (table.column(8).visible()) rowHtml += `<td>${item.address1 || ''}</td>`;
                        if (table.column(9).visible()) rowHtml += `<td>${item.address2 || ''}</td>`;
                        if (table.column(10).visible()) rowHtml += `<td><a href="${item.website_link || '#'}" target="_blank">${item.website_link || ''}</a></td>`;
                        if (table.column(11).visible()) rowHtml += `<td>${item.contact_name || ''}</td>`;
                        if (table.column(12).visible()) rowHtml += `<td>${item.job_position || ''}</td>`;
                        if (table.column(13).visible()) rowHtml += `<td>${item.phone || ''}</td>`;
                        if (table.column(14).visible()) rowHtml += `<td>${item.mobile || ''}</td>`;
                        if (table.column(15).visible()) rowHtml += `<td>${item.priority || ''}</td>`;
                        if (table.column(16).visible()) rowHtml += `<td>${item.title ? (item.get_title?.title || '') : ''}</td>`;
                        if (table.column(17).visible()) rowHtml += `<td>${item.tag || ''}</td>`;
                        if (table.column(18).visible()) rowHtml += `<td>${item.get_user?.email || ''}</td>`;
                        if (table.column(19).visible()) rowHtml += `<td>${item.sales_team || ''}</td>`;
                        if (table.column(20).visible()) rowHtml += `<td></td>`;

                        rowHtml += `</tr>`;
                        $tableBody.append(rowHtml);
                    });

                    // Attach click event handler to rows
                    $('#lead-table-body .lead-row').on('click', function () {
                        var leadId = $(this).data('id');
                        window.location.href = `/lead-add/${leadId}`; // Adjust the URL as needed
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
                table.column(3).visible(false);
                table.column(4).visible(true);
                table.column(5).visible(false);
                table.column(6).visible(false);
                table.column(7).visible(false);
                table.column(8).visible(false);
                table.column(9).visible(false);
                table.column(10).visible(false);
                table.column(11).visible(false);
                table.column(12).visible(false);
                table.column(13).visible(false);
                table.column(14).visible(false);
                table.column(15).visible(false);
                table.column(16).visible(false);
                table.column(17).visible(false);
                table.column(18).visible(true);
                table.column(19).visible(true);
                table.column(20).visible(true);
            }
        }

        $('.dropdown-menu input[type="checkbox"]').on('change', function () {
            var columnIndex = $(this).data('column');
            var column = table.column(columnIndex);
            // Ensure the column exists before trying to set visibility
            if (typeof column !== 'undefined') {
                column.visible(this.checked); // Show or hide the column based on the checkbox state
                saveColumnVisibility(); // Save visibility to local storage
            }
        });

        restoreColumnVisibility();

        $(document).on('click', '.dropdown-btn', function (event) {
            event.stopPropagation();
            $('.dropdown-menu').not($(this).next('.dropdown-menu')).hide();
            $(this).next('.dropdown-menu').toggle();
        });



        $(document).on('click', function (event) {
            if (!$(event.target).closest('.dropdown-menu').length) {
                $('.dropdown-menu').hide();
            }
        });

        // $(document).on('click', '.remove-tag', function() {
        //     $('.tag').remove();
        //     $('.checkmark').hide();
        //     $('#search-input').val('').attr('placeholder', 'Search...');
        //     $('#filter').val(''); // Clear the filter value
        //     table.ajax.reload();
        // });
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


        $(document).on('click', '.activities', function (e) {
            e.stopPropagation();
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
                var newTagHtml = '<span class="tag-item" data-value="' + selectedValue + '">' + selectedValue + '</span>';

                // Check if a tag container exists, if not, create one
                if ($tag.length === 0) {
                    $('#search-input').before('<span class="tag">' + newTagHtml + '</span>');
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
            updateFilterTags();
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

        $(document).on('click', '.lost_span', function (e) {
            e.stopPropagation();
            var $item = $(this);

            // Get the text of the clicked "Lost" span
            var selectedValue = $item.clone().find('.checkmark').remove().end().text().trim();

            handleTagSelection3(selectedValue, $item);
        });

        function handleTagSelection3(selectedValue, $item = null) {
            var $tag = $('.tag1');
            var $tagItem = $('.lost-tag-item[data-value="' + selectedValue + '"]');

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
                        '<div class="tag1">' +
                        '<a href="#" data-span_id="' + currentIndex + '"" class="setting-icon lostIcon_tag">' +
                        '<span class="setting_icon se_filter_icon"><i class="fa fa-filter"></i></span>' +
                        '<span class="setting_icon setting_icon_hover"><i class="fa fa-fw fa-cog"></i></span>' +
                        '</a>' +
                        '<span class="lost-tag-item" data-value="' + selectedValue + '">' +
                        selectedValue +
                        '<span class="remove-lost-tag" style="cursor:pointer">×</span>' +
                        '</span>' +
                        '</div>'
                    );
                } else {
                    // Add new tag with close button
                    var newTagHtml = '<span class="lost-tag-item" data-value="' + selectedValue + '">' +
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
            var $tagItems = $tag.find('.lost-tag-item');
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
            if ($tag.find('.lost-tag-item').length > 0) {
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

            // Send selected tags to the server for filtering
            filterData(selectedTags);
        }

        // Remove tag and preserve "Lost" tag filter
        $(document).on('click', '.remove-lost-tag', function () {
            var $tagItem = $(this).parent('.lost-tag-item');
            $tagItem.remove();
            $('.tag1').remove(); // Only remove the container if it's empty
            updateTagSeparators3();

            // Reapply filters after removing "Lost" tag
            updateFilterTags();

            // Remove checkmark from the dropdown
            $('.lost_span:contains("Lost")').find('.checkmark').hide();
        });

        $(document).on('click', '.remove-tag', function () {
            var $tagItem = $(this).parent('.tag-item');
            $tagItem.remove();
            $('.tag').remove(); // Only remove the container if it's empty
            updateTagSeparators3();


            // Reapply filters after removing "Lost" tag
            updateFilterTags();

            // Remove checkmark from the dropdown
            $('.activities .checkmark').hide();
        });


        // ------------------------------ Late , Today and Future Activitis -----------------------------------------------

        $(document).on('click', '.LTFActivities', function (e) {
            e.stopPropagation();
            var $item = $(this);

            // Clone the item, remove the checkmark span and get the trimmed text
            var selectedValue = $item.clone().find('.checkmark').remove().end().text().trim();
            handleTagSelection4(selectedValue, $item);
        });

        function handleTagSelection4(selectedValue, $item = null) {


            var $tag = $('.LTFtag');
            var $tagItem = $('.LTFtag-item[data-value="' + selectedValue + '"]');

            if ($tagItem.length > 0) {
                // If the tag already exists, remove it            
                $tagItem.remove();
                updateTagSeparatorsLTF();

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
                var newTagHtml = '<span class="LTFtag-item" data-value="' + selectedValue + '">' + selectedValue + '</span>';

                // Check if a tag container exists, if not, create one
                if ($tag.length === 0) {
                    $('#search-input').before('<span class="LTFtag">' + newTagHtml + '</span>');
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
            var $tagItems = $tag.find('.LTFtag-item');
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
            // Ensure the icon appears only once at the beginning
            if ($tag.find('.fa-list').length === 0) {
                $tag.prepend('<a href="#" class="setting-icon LTFIcon_tag">' +
                    '<span class="setting_icon se_filter_icon"><i class="fa fa-filter"></i></span>' +
                    '<span class="setting_icon setting_icon_hover setting-icon"><i class="fa fa-fw fa-cog"></i></span>' +
                    '</a>'
                );
            }
            if ($tag.find('.LTFtag-item').length > 0) {
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
            $('.LTFtag-item').each(function () {
                selectedTags.push($(this).data('value'));
            });

            // Send selected tags to the server for filtering
            filterData(selectedTags);
        }

        $(document).on('click', '.remove-LTFtag', function () {
            var $tagItem = $(this).parent('.LTFtag-item');
            $tagItem.remove();
            $('.LTFtag').remove(); // Only remove the container if it's empty
            updateTagSeparators4();


            // Reapply filters after removing "Lost" tag
            updateFilterTagsLTF();

            // Remove checkmark from the dropdown
            $('.LTFActivities .checkmark').hide();
        });

    });
  $(document).on('click', '.setting-icon', function(e) {
        e.preventDefault();
        var id = $(this).data('span_id');
        console.log(id, 'span_id');
        $('#span_id').val(id); 
        $('#customFilterModal').modal('show'); 
    });



</script>



{{-- ----------------------------- Group by ------------------------------ --}}
<script>
    $(document).ready(function () {
        // Handle item selection from dropdown
        $(document).on('click', '.o-dropdown-item_1', function (e) {
            e.stopPropagation();
            var $item = $(this);
            var selectedValue = $item.clone().find('.checkmark').remove().end().text().trim();
            handleTagSelection(selectedValue, $item);
        });

        // Listen to changes in the select dropdown
        $('.o_add_custom_group_menu').on('change', function (e) {
            var selectedValue = $(this).find('option:selected').text().trim();
            handleTagSelection(selectedValue);
            $(this).val(''); // Reset the select after selecting an option
        });


        // Function to handle tag selection
        function handleTagSelection(selectedValue, $item = null) {
            var $tag = $('.tag');
            var $tagItem = $('.tag-item[data-value="' + selectedValue + '"]');

            if ($tagItem.length > 0) {
                // Remove selected value
                $tagItem.remove();
                updateTagSeparators();

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
                    table.ajax.reload();
                }
                filter(selectedTags);

            } else {
                // Add selected value
                var newTagHtml = '<span class="tag-item" data-value="' + selectedValue + '">' + selectedValue + '</span>';
                if ($tag.length === 0) {
                    $('#search-input').before('<span class="tag">' + newTagHtml + '</span>');
                } else {
                    $tag.append(' > ' + newTagHtml);
                }
                updateTagSeparators();

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


        $(document).on('click', '.o_add_custom_group_menu', function () {
            let selectedTags = [];

            // Check if there are any tags in the '.tag-item'
            if ($('.tag-item').length > 0) {
                $('.tag-item').each(function () {
                    selectedTags.push($(this).data('value'));
                });
            }

            // If selectedTags is not empty, call the filter function
            if (selectedTags.length > 0) {
                filter(selectedTags);
            } else {
                console.log('No tags selected');
            }
        });

        // Update tag separators and remove button
        function updateTagSeparators() {
            var $tag = $('.tag');
            var $tagItems = $tag.find('.tag-item');
            var html = '';
            $tagItems.each(function (index) {
                html += $(this).prop('outerHTML');
                if (index < $tagItems.length - 1) {
                    html += ' > ';
                }
            });
            html += ' <span class="remove-tag" style="cursor:pointer">&times;</span>';
            $tag.html(html);
            updateRemoveTagButton();
        }

        // Update/remove tag button
        function updateRemoveTagButton() {
            var $tag = $('.tag');
            if ($tag.find('.tag-item').length > 0) {
                if ($('.remove-tag').length === 0) {
                    $tag.append(' <span class="remove-tag" style="cursor:pointer">&times;</span>');
                }
            } else {
                $('.remove-tag').remove();
            }
        }

        // Remove all tags
        $(document).on('click', '.remove-tag', function () {
            $('.tag').remove();
            $('.o-dropdown-item .checkmark').hide();
            $('#search-input').val('').attr('placeholder', 'Search...');
            $('#filter').val(''); // Clear the filter value
        });

        // Hide dropdown when clicking outside
        $(document).on('click', function (e) {
            if (!$(e.target).closest('#search-input, #search-dropdown').length) {
                $('#search-dropdown').hide();
            }
        });


        // Send selected tags to the server and process response
        function filter(selectedTags) {
            $.ajax({
                url: '/lead-filter'
                , type: 'POST'
                , data: {
                    selectedTags: JSON.stringify(selectedTags)
                }
                , success: function (response) {
                    console.log('Response:', response);

                    var tableBody = $('#lead-table-body');
                    tableBody.empty();

                    var leads = response.data;

                    function renderGroup(groupLeads, level) {
                        $.each(groupLeads, function (groupKey, groupValue) {
                            var groupRow = `
                            <tr class="group-header" data-level="${level}" style="cursor:pointer;">
                                <td colspan="20" style="padding-left:${level * 20}px;">
                                    <b>${groupKey} (${$.isArray(groupValue) ? groupValue.length : Object.keys(groupValue).length})</b>
                                </td>
                            </tr>
                        `;
                            tableBody.append(groupRow);

                            if ($.isArray(groupValue)) {
                                $.each(groupValue, function (index, lead) {
                                    var leadRow = `
                                    <tr class="lead-row" data-id="${lead.id}" data-level="${level + 1}" style="display:none;">
                                        <td title="${lead.product_name}">${lead.product_name ?? ''}</td>
                                        <td>${lead.email ?? ''}</td>
                                        <td>${lead.city ?? ''}</td>
                                        <td>${lead.getState ? lead.getState.name : ''}</td>
                                        <td>${lead.getCountry ? lead.getCountry.name : ''}</td>
                                        <td>${lead.zip ?? ''}</td>
                                        <td>${lead.probability ?? ''}</td>
                                        <td>${lead.company_name ?? ''}</td>
                                        <td>${lead.address_1 ?? ''}</td>
                                        <td>${lead.address_2 ?? ''}</td>
                                        <td><a href="${lead.website_link}" target="_blank">${lead.website_link ?? ''}</a></td>
                                        <td>${lead.contact_name ?? ''}</td>
                                        <td>${lead.job_postion ?? ''}</td>
                                        <td>${lead.phone ?? ''}</td>
                                        <td>${lead.mobile ?? ''}</td>
                                        <td>${lead.priority ?? ''}</td>
                                        <td>${lead.title ?? ''}</td>
                                        <td>${lead.tag ?? ''}</td>
                                        <td>${lead.getUser ? lead.getUser.email : ''}</td>
                                        <td>${lead.sales_team ?? ''}</td>
                                    </tr>
                                `;
                                    tableBody.append(leadRow);
                                });
                            } else {
                                renderGroup(groupValue, level + 1);
                            }
                        });
                    }

                    renderGroup(leads, 0);

                    // Toggle visibility of nested groups
                    $('.group-header').on('click', function () {
                        var level = $(this).data('level');
                        var nextRow = $(this).next();
                        while (nextRow.length && nextRow.data('level') > level) {
                            nextRow.toggle();
                            nextRow = nextRow.next();
                        }
                    });
                }
                , error: function (xhr, status, error) {
                    console.error('Error applying filter:', error);
                }
            });
        }

        $(document).on('click', '.lead-row', function () {
            var leadId = $(this).data('id');
            if (leadId) {
                window.location.href = '/lead-add/' + leadId;
            }
        });

        // Initialize tags if any tags are present on page load
        updateTagSeparators(); // Ensure that the close icon is added correctly
    });

</script>
{{-- ---------------- time ------------------- --}}
<script>
    $(document).ready(function () {
        // Handle item selection from dropdown
        $(document).on('click', '.o-dropdown-item_2', function (e) {
            e.stopPropagation();
            var $item = $(this);
            var selectedValue = $item.clone().find('.checkmark').remove().end().text().trim();

            // Determine if the selected item is Creation Date or Closed Date
            if ($item.hasClass('creation_time')) {
                handleTagSelection4(selectedValue, 'Creation Date');
            } else if ($item.hasClass('closed_time')) {
                handleTagSelection4(selectedValue, 'Closed Date');
            }
        });

        // Function to handle tag selection for both Creation and Closed dates
        function handleTagSelection4(selectedValue, type) {
            var $tag = $('.tag3');
            var $creationTag = $tag.find('.creation-date-tag');
            var $closedTag = $tag.find('.closed-date-tag');

            // Helper function to remove value from tag and tag if empty
            function updateTag($tag, selectedValue) {
                var existingValues = $tag.text().split('/').map(v => v.trim()).filter(v => v);
                var valueIndex = existingValues.indexOf(selectedValue);

                if (valueIndex !== -1) {
                    // Remove value
                    existingValues.splice(valueIndex, 1);
                    var newTagText = existingValues.join('/');

                    // Update tag text
                    if (newTagText) {
                        $tag.text(newTagText);
                    } else {
                        // Remove tag if empty
                        $tag.remove();
                    }
                } else {
                    // Add new value
                    $tag.append('/' + selectedValue);
                }
            }

            if (type === 'Creation Date') {
                if ($creationTag.length > 0) {
                    updateTag($creationTag, selectedValue);

                    // Remove Creation Date label if it's the last tag
                    if ($creationTag.text().trim() === '') {
                        $creationTag.remove();
                        if (!$tag.find('.creation-date-tag').length) {
                            $tag.remove(); // Remove label if it's the last tag
                        }
                    }
                } else {
                    // Add new creation date tag
                    if ($tag.length === 0) {
                        $('#search-input').before('<span class="tag3">Creation Date: <span class="creation-date-tag">' + selectedValue + '</span></span>');
                    } else {
                        $tag.append('Creation Date: <span class="creation-date-tag">' + selectedValue + '</span>');
                    }
                }
            } else if (type === 'Closed Date') {
                if ($closedTag.length > 0) {
                    updateTag($closedTag, selectedValue);

                    // Remove Closed Date label if it's the last tag
                    if ($closedTag.text().trim() === '') {
                        $closedTag.remove();
                        if (!$tag.find('.closed-date-tag').length) {
                            $tag.remove(); // Remove label if it's the last tag
                        }
                    }
                } else {
                    // Add new closed date tag
                    if ($tag.length > 0) {
                        $tag.append(' or Closed Date: <span class="closed-date-tag">' + selectedValue + '</span>');
                    } else {
                        $('#search-input').before('<span class="tag3">Closed Date: <span class="closed-date-tag">' + selectedValue + '</span></span>');
                    }
                }
            }

            // Hide or show checkmark
            if ($item) {
                var $checkmark = $item.find('.checkmark');
                $checkmark.toggle(); // Toggle visibility of the checkmark
            }

            updateTagSeparators4();
            $('#search-input').val('');
            $('#search-dropdown').hide();
        }

        // Update tag separators and close button
        function updateTagSeparators4() {
            var $tag = $('.tag3');
            var $creationTag = $tag.find('.creation-date-tag');
            var $closedTag = $tag.find('.closed-date-tag');

            // Remove existing close button
            $tag.find('.remove-tag').remove();

            // Add a single close button if there are any tags present
            if ($tag.length > 0 && ($creationTag.length > 0 || $closedTag.length > 0)) {
                $tag.append(' <span class="remove-tag" style="cursor:pointer">&times;</span>');
            }
        }

        // Remove individual tags when clicked
        $(document).on('click', '.creation-date-tag, .closed-date-tag', function () {
            var $tag = $(this).closest('.tag3');
            var type = $(this).hasClass('creation-date-tag') ? 'Creation Date' : 'Closed Date';
            var selectedValue = $(this).text().trim();
            handleTagSelection4(selectedValue, type);
        });

        // Remove all tags when the close button is clicked
        $(document).on('click', '.remove-tag', function () {
            $('.tag3').remove();
            $('.o-dropdown-item_2 .checkmark').hide();
            $('#search-input').val('').attr('placeholder', 'Search...');
        });

        updateTagSeparators4(); // Ensure that the close icon is added correctly
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

        $('.add_filter').on('click', function (event) {
            event.preventDefault();
            var filterType = $('#customer_filter_select').val();
            var filterValue = $('#customer_filter_input_value').val();
            var operatesValue = $('#customer_filter_operates').val();
              var span_id = $('#span_id').val();

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
                    var $tableBody = $('#lead-table-body');

                    // Clear existing table data
                    $tableBody.empty();

                    // Check if response contains data
                    if (response.success && response.data && response.data.length > 0) {
                        // Loop through the response and create table rows
                        response.data.forEach(function (item) {
                            var rowHtml = `
                                <tr class="lead-row" data-id="${item.id}">
                                    <td>${item.product_name || ''}</td>
                                    <td>${item.email || ''}</td>
                                    <td>${item.city || ''}</td>
                                    <td>
                                        ${item.state ? (item.get_state?.name || item.get_auto_state?.name || '') : ''}
                                    </td>
                                    <td>
                                        ${item.country ? (item.get_country?.name || item.get_auto_country?.name || '') : ''}
                                    </td>
                                    <td>${item.zip || ''}</td>
                                    <td>${item.probability || ''}</td>
                                    <td>${item.company_name || ''}</td>
                                    <td>${item.address_1 || ''}</td>
                                    <td>${item.address_2 || ''}</td>
                                    <td><a href="${item.website_link || '#'}" target="_blank">${item.website_link || ''}</a></td>
                                    <td>${item.contact_name || ''}</td>
                                    <td>${item.job_position || ''}</td>
                                    <td>${item.phone || ''}</td>
                                    <td>${item.mobile || ''}</td>
                                    <td>${item.priority || ''}</td>
                                    <td>${item.title ? (item.get_tilte?.title || '') : ''}</td>
                                    <td>${item.tag || ''}</td>
                                    <td>${item.get_user?.email || ''}</td>
                                    <td>${item.sales_team || ''}</td>
                                </tr>
                            `;
                            $tableBody.append(rowHtml);
                        });

                        // Attach click event handler to rows
                        $('#lead-table-body .lead-row').on('click', function () {
                            var leadId = $(this).data('id');
                            window.location.href = `/lead-add/${leadId}`; // Adjust the URL as needed
                        });
                    } else {
                        // If no data, show a message or keep it empty
                        $tableBody.append('<tr><td colspan="2">No data available</td></tr>'); // Adjust colspan based on the number of columns
                    }
                },
                error: function (xhr, status, error) {
                    console.error('Error:', error);
                }
            });

            $('#customFilterModal').modal('hide');
        });

       function handleTagSelection(filterType, operatesValue, filterValue, span_id) {
        var selectedValue = filterType + ' ' + operatesValue + ' ' + filterValue;
        var $tag = $('.tag5');
        var $tagItem = $('.tag-item[data-value="' + selectedValue + '"]');

        // Find the setting-icon tag with the specific span_id and remove it
        var $iconTag = $('span.tag[data-span_id="' + span_id + '"]');
        console.log($iconTag, 'iconTag');

        if ($tagItem.length > 0) {
            $tagItem.remove();
            updateTagSeparators();

            if ($tag.children().length === 0) {
                $tag.remove();
                $('#search-input').val('').attr('placeholder', 'Search...');
            }
        } else {
            var newTagHtml = '<span class="tag-item" data-value="' + selectedValue + '">' + selectedValue + '<span class="custom-filter-remove">×</span></span>';
            if ($tag.length === 0) {
                $('#search-input').before('<span class="tag5">' + newTagHtml + '</span>');
            } else {
                $tag.html(newTagHtml); // Overwrite with new tag
            }
            $('#search-input').val('').attr('placeholder', '');
        }

        // Remove the setting-icon tag using the span_id
        if ($iconTag.length > 0) {
            $iconTag.remove(); // This removes the <a> tag with the matching span_id
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
            var valueToRemove = $(this).closest('.tag-item').data('value');
            $(this).closest('.tag-item').remove();
            if ($('.tag5').children().length === 0) {
                $('.tag5').remove();
            }


            // Optionally, you could send a request to update the filters on the server if necessary
        });
    });
</script>


<script>
    $(document).on('click', '.lead-row', function () {
        var leadId = $(this).data('id');
        window.location.href = "{{ route('lead.create') }}/" + leadId;
    });

    function storeLead() {
        $.ajax({
            url: "{{ route('lead.storeLead') }}"
            , type: "POST"
            , data: {
                _token: "{{ csrf_token() }}"
                ,
            }
            , success: function (response) {
                console.log('Lead stored successfully.', response);
            }
            , error: function (error) {
                console.error('Error storing lead:', error);
            }
        });
    }

    // Auto-refresh every 2 minutes
    setInterval(function () {
        console.log('Attempting to store lead...');
        storeLead();
    }, 2 * 60 * 1000);
    storeLead();

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