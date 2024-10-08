@extends('layout.header')
@section('content')
@section('head_breadcrumb_title', 'Leads')
@section('head_new_btn_link', route('lead.create'))
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
<div class="o_popover popover mw-100 o-dropdown--menu dropdown-menu mx-0 o_search_bar_menu d-flex flex-wrap flex-lg-nowrap w-100 w-md-auto mx-md-auto mt-2 py-3" role="menu" style="position: absolute; top: 0; left: 0;">
    <div class="o_dropdown_container o_filter_menu w-100 w-lg-auto h-100 px-3 mb-4 mb-lg-0 border-end">
        <div class="px-3 fs-5 mb-2"><i class="me-2 text-primary fa fa-filter"></i>
            <input type="hidden" id="filter" name="filter" value="">

            <h5 class="o_dropdown_title d-inline">Filters</h5>
        </div>
        <span class="o-dropdown-item dropdown-item o-navigable o_menu_item text-truncate activities" role="menuitemcheckbox" tabindex="0" title="" aria-checked="false" id="my-activities"><span class="float-end checkmark" style="display:none;">✔</span>My Activities</span>
        <span class="o-dropdown-item dropdown-item o-navigable o_menu_item text-truncate activities" role="menuitemcheckbox" tabindex="0" title="" aria-checked="false" id="unassigned"><span class="float-end checkmark" style="display:none;">✔</span>Unassigned</span>
        <div class="dropdown-divider" role="separator"></div>
        <span class="o-dropdown-item dropdown-item o-navigable o_menu_item text-truncate lost_span" role="menuitemcheckbox" tabindex="0" title="" aria-checked="false"><span class="float-end checkmark" style="display:none;">✔</span>Lost & Archived</span>
        <div class="dropdown-divider" role="separator"></div>
        <div class="o_accordion position-relative">
            <button class="o_menu_item o_accordion_toggle creation_time o-navigable text-truncate" style="display: flex;justify-content: space-between;" tabindex="0" aria-expanded="false" id="creationDateBtn1">
                Creation Date
                <span class="arrow-icon">▼</span>
            </button>
            <div class="o_dropdown_content" id="creationDateDropdown1" style="display: none; position: absolute; z-index: 1000; background: white; border: 1px solid #ccc; width: 100%;">
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
                <span class="o-dropdown-item_2  creation_time"> <span class="float-end checkmark" style="display:none;">✔</span><?php echo $currentMonth; ?></span>
                <span class="o-dropdown-item_2  creation_time"><span class="float-end checkmark" style="display:none;">✔</span><?php echo $lastMonth; ?></span>
                <span class="o-dropdown-item_2  creation_time"><span class="float-end checkmark" style="display:none;">✔</span><?php echo $twoMonthsAgo; ?></span>
                <span class="o-dropdown-item_2  creation_time"><span class="float-end checkmark" style="display:none;">✔</span>Q4</span>
                <span class="o-dropdown-item_2  creation_time"><span class="float-end checkmark" style="display:none;">✔</span>Q3</span>
                <span class="o-dropdown-item_2  creation_time"><span class="float-end checkmark" style="display:none;">✔</span>Q2</span>
                <span class="o-dropdown-item_2  creation_time"><span class="float-end checkmark" style="display:none;">✔</span>Q1</span>
                <hr>
                <span class="o-dropdown-item_2 creation_time creation_time"><span class="float-end checkmark" style="display:none;">✔</span><?php echo $currentYear; ?></span>
                <span class="o-dropdown-item_2 creation_time creation_time"><span class="float-end checkmark" style="display:none;">✔</span><?php echo $lastYear; ?></span>
                <span class="o-dropdown-item_2 creation_time creation_time"><span class="float-end checkmark" style="display:none;">✔</span><?php echo $twoYearsAgo; ?></span>
            </div>
        </div>
        <div class="o_accordion position-relative">
            <button class="o_menu_item o_accordion_toggle creation_time o-navigable text-truncate" tabindex="0" aria-expanded="false" id="closeDateBtn1" style="display: flex;justify-content: space-between;">
                Closed Date
                <span class="arrow-icon">▼</span>
            </button>
            <div class="o_dropdown_content" id="closeDateDropdown1" style="display: none; position: absolute; z-index: 1000; background: white; border: 1px solid #ccc; width: 100%;">
                <span class="o-dropdown-item_2 closed_time">
                    <span class="float-end checkmark" style="display:none;">✔</span><?php echo $currentMonth; ?></span>
                <span class="o-dropdown-item_2 closed_time"><span class="float-end checkmark" style="display:none;">✔</span><?php echo $lastMonth; ?></span>
                <span class="o-dropdown-item_2 closed_time"><span class="float-end checkmark" style="display:none;">✔</span><?php echo $twoMonthsAgo; ?></span>
                <span class="o-dropdown-item_2 closed_time"><span class="float-end checkmark" style="display:none;">✔</span>Q4</span>
                <span class="o-dropdown-item_2 closed_time"><span class="float-end checkmark" style="display:none;">✔</span>Q3</span>
                <span class="o-dropdown-item_2 closed_time"><span class="float-end checkmark" style="display:none;">✔</span>Q2</span>
                <span class="o-dropdown-item_2 closed_time"><span class="float-end checkmark" style="display:none;">✔</span>Q1</span>
                <hr>
                <span class="o-dropdown-item_2 closed_time"><span class="float-end checkmark" style="display:none;">✔</span><?php echo $currentYear; ?></span>
                <span class="o-dropdown-item_2 closed_time"><span class="float-end checkmark" style="display:none;">✔</span><?php echo $lastYear; ?></span>
                <span class="o-dropdown-item_2 closed_time"><span class="float-end checkmark" style="display:none;">✔</span><?php echo $twoYearsAgo; ?></span>
            </div>
        </div>
        <div class="dropdown-divider" role="separator"></div><span class="o-dropdown-item dropdown-item o-navigable o_menu_item text-truncate" role="menuitemcheckbox" tabindex="0" title="" aria-checked="false">Late Activities</span><span class="o-dropdown-item dropdown-item o-navigable o_menu_item text-truncate" role="menuitemcheckbox" tabindex="0" title="Today Activities" aria-checked="false">Today Activities</span><span class="o-dropdown-item dropdown-item o-navigable o_menu_item text-truncate focus" role="menuitemcheckbox" tabindex="0" title="Future Activities" aria-checked="false">Future Activities</span>
        <div class="dropdown-divider" role="separator"></div>
        <!-- <span class="o-dropdown-item dropdown-item o-navigable o_menu_item text-truncate lost_span" role="menuitemcheckbox" tabindex="0" title="" aria-checked="false">Archived</span>
        <div role="separator" class="dropdown-divider"></div> -->
        <span class="o-dropdown-item dropdown-item o-navigable o_menu_item o_add_custom_filter" role="menuitem" tabindex="0" style="cursor: pointer;">Add Custom Filter</span>
    </div>
    <div class="o_dropdown_container o_group_by_menu w-100 w-lg-auto h-100 px-3 mb-4 mb-lg-0 border-end">
        <div class="px-3 fs-5 mb-2"><i class="me-2 text-action oi oi-group"></i>
            <h5 class="o_dropdown_title d-inline">Group By</h5>
        </div>
        <span class="o-dropdown-item_1 dropdown-item o-navigable o_menu_item text-truncate" role="menuitemcheckbox" tabindex="0" title="" aria-checked="false"> <span class="float-end checkmark" style="display:none;">✔</span>Salesperson</span>
        <span class="o-dropdown-item_1 dropdown-item o-navigable o_menu_item text-truncate" role="menuitemcheckbox" tabindex="0" title="" aria-checked="false"> <span class="float-end checkmark" style="display:none;">✔</span>Sales Team</span>
        <span class="o-dropdown-item_1 dropdown-item o-navigable o_menu_item text-truncate" role="menuitemcheckbox" tabindex="0" title="" aria-checked="false"> <span class="float-end checkmark" style="display:none;">✔</span>City</span>
        <span class="o-dropdown-item_1 dropdown-item o-navigable o_menu_item text-truncate" role="menuitemcheckbox" tabindex="0" title="" aria-checked="false"> <span class="float-end checkmark" style="display:none;">✔</span>Country</span>
        <span class="o-dropdown-item_1 dropdown-item o-navigable o_menu_item text-truncate" role="menuitemcheckbox" tabindex="0" title="" aria-checked="false"> <span class="float-end checkmark" style="display:none;">✔</span>Campaign</span>
        <span class="o-dropdown-item_1 dropdown-item o-navigable o_menu_item text-truncate" role="menuitemcheckbox" tabindex="0" title="" aria-checked="false"> <span class="float-end checkmark" style="display:none;">✔</span>Medium</span>
        <span class="o-dropdown-item_1 dropdown-item o-navigable o_menu_item text-truncate" role="menuitemcheckbox" tabindex="0" title="" aria-checked="false"> <span class="float-end checkmark" style="display:none;">✔</span>Source</span>
        <div class="dropdown-divider" role="separator">
        </div>
        <div class="o_accordion position-relative">
            <button class="o_menu_item o_accordion_toggle dropdown-item o-navigable text-truncate" style="display: flex;justify-content: space-between;" tabindex="0" aria-expanded="false" id="creationDateBtn">
                Creation Date
                <span class="arrow-icon">▼</span>
            </button>
            <div class="o_dropdown_content" id="creationDateDropdown" style="display: none; position: absolute; z-index: 1000; background: white; border: 1px solid #ccc; width: 100%;">
                <span class="o-dropdown-item_1 dropdown-item"><span style="display:none;">Creation Date:</span> <span class="float-end checkmark" style="display:none;">✔</span>Year</span>
                <span class="o-dropdown-item_1 dropdown-item"><span style="display:none;">Creation Date:</span><span class="float-end checkmark" style="display:none;">✔</span>Quarter</span>
                <span class="o-dropdown-item_1 dropdown-item"><span style="display:none;">Creation Date:</span><span class="float-end checkmark" style="display:none;">✔</span>Month</span>
                <span class="o-dropdown-item_1 dropdown-item"><span style="display:none;">Creation Date:</span><span class="float-end checkmark" style="display:none;">✔</span>Week</span>
                <span class="o-dropdown-item_1 dropdown-item"><span style="display:none;">Creation Date:</span><span class="float-end checkmark" style="display:none;">✔</span>Day</span>
            </div>
        </div>
        <div class="o_accordion position-relative">
            <button class="o_menu_item o_accordion_toggle dropdown-item o-navigable text-truncate" tabindex="0" aria-expanded="false" id="closeDateBtn" style="display: flex;justify-content: space-between;">
                Closed Date
                <span class="arrow-icon">▼</span>
            </button>
            <div class="o_dropdown_content" id="closeDateDropdown" style="display: none; position: absolute; z-index: 1000; background: white; border: 1px solid #ccc; width: 100%;">
                <span class="o-dropdown-item_1 dropdown-item"><span style="display:none;">Closed Date:</span><span class="float-end checkmark" style="display:none;">✔</span>Year</span>
                <span class="o-dropdown-item_1 dropdown-item"><span style="display:none;">Closed Date:</span><span class="float-end checkmark" style="display:none;">✔</span>Quarter</span>
                <span class="o-dropdown-item_1 dropdown-item"><span style="display:none;">Closed Date:</span><span class="float-end checkmark" style="display:none;">✔</span>Month</span>
                <span class="o-dropdown-item_1 dropdown-item"><span style="display:none;">Closed Date:</span><span class="float-end checkmark" style="display:none;">✔</span>Week</span>
                <span class="o-dropdown-item_1 dropdown-item"><span style="display:none;">Closed Date:</span><span class="float-end checkmark" style="display:none;">✔</span>Day</span>
            </div>
        </div>

        {{-- <div class="o_accordion position-relative">
            <button class="o_menu_item o_accordion_toggle dropdown-item o-navigable text-truncate" tabindex="0"
                aria-expanded="false">Closed Date</button>
        </div> --}}
        <div class="dropdown-divider" role="separator"></div>
        {{-- <div class="o_accordion position-relative"><button
                class="o_menu_item o_accordion_toggle dropdown-item o-navigable  text-truncate"
                tabindex="0" aria-expanded="false">Properties</button></div> --}}
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
        </div><span class="o-dropdown-item dropdown-item o-navigable o_menu_item text-truncate selected" role="menuitemcheckbox" tabindex="0" aria-checked="true"><span class="d-flex p-0 align-items-center justify-content-between"><span class="text-truncate flex-grow-1" title="">Leads</span><i class="ms-1 fa fa-trash-o" title="Delete item"></i></span></span>
        <div role="separator" class="dropdown-divider"></div>
        <div class="o_accordion position-relative"><button class="o_menu_item o_accordion_toggle dropdown-item o-navigable o_add_favorite text-truncate" tabindex="0" aria-expanded="false">Save current search</button></div>
    </div>
</div>
@endsection

<!-- Modal -->
<div class="modal fade" id="customFilterModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="customFilterModalLabel" aria-hidden="true">
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
                <button type="submit" style="background-color: #714B67;border-color: #714B67;" class="btn btn-primary add_filter">Add</button>
                <button type="button" style="background-color: #e7e9ed;border-color: #e7e9ed;color: #374151;" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
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
        position: absolute;
        background-color: #f9f9f9;
        min-width: 691px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
        padding: 10px;
        top: auto;
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
    .location{
        display:none
    }

</style>

<div class="card" style="padding: 1%">
    <div class="table-responsive text-nowrap">
        <button class="dropdown-btn">Show/Hide Columns</button>
        <div class="hide-show-dropdown-menu dropdown-menu">
            <div class="dropdown-checkbox">
                <label><input type="checkbox" data-column="0" checked> Lead</label>
            </div>
            <div class="dropdown-checkbox">
                <label><input type="checkbox" data-column="1" checked> Email</label>
            </div>
            <div class="dropdown-checkbox">
                <label><input type="checkbox" data-column="2"> City</label>
            </div>
            <div class="dropdown-checkbox">
                <label><input type="checkbox" data-column="3"> State</label>
            </div>
            <div class="dropdown-checkbox">
                <label><input type="checkbox" data-column="4"> Country</label>
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
                <label><input type="checkbox" data-column="18"> Sales Person</label>
            </div>
            <div class="dropdown-checkbox">
                <label><input type="checkbox" data-column="19"> Sales Team</label>
            </div>
        </div>
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
    </div>
</div>





<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    $(document).ready(function() {
        // Initialize DataTable with server-side processing
        var table = $('#example').DataTable({
            processing: true
            , serverSide: true
            , ajax: {
                url: '{{ route('lead.get') }}'
                , type: "POST"
                , data: function(d) {
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
                    , render: function(data, type, row) {
                        if (data) {
                            return data;
                        } else {
                            return '';
                        }
                    }
                }
                , {
                    data: 'email'
                    , render: function(data, type, row) {
                        if (data) {
                            return data;
                        } else {
                            return '';
                        }
                    }
                }
                , {
                    data: 'city'
                    , render: function(data, type, row) {
                        if (data) {
                            return data;
                        } else {
                            return '';
                        }
                    }
                }
                , {
                    data: 'get_state'
                    , render: function(data, type, row) {
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
                    , render: function(data, type, row) {
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
                    , render: function(data, type, row) {

                        if (data) {
                            return data;
                        } else {
                            return '';
                        }
                    }
                }
                , {
                    data: 'probability'
                    , render: function(data, type, row) {
                        if (data) {
                            return data;
                        } else {
                            return '';
                        }
                    }
                }
                , {
                    data: 'company_name'
                    , render: function(data, type, row) {
                        if (data) {
                            return data;
                        } else {
                            return '';
                        }
                    }
                }
                , {
                    data: 'address_1'
                    , render: function(data, type, row) {
                        if (data) {
                            return data;
                        } else {
                            return '';
                        }
                    }
                }
                , {
                    data: 'address_2'
                    , render: function(data, type, row) {
                        if (data) {
                            return data;
                        } else {
                            return '';
                        }
                    }
                }
                , {
                    data: 'website_link'
                    , render: function(data, type, row) {
                        if (data) {
                            return data;
                        } else {
                            return '';
                        }
                    }
                }
                , {
                    data: 'contact_name'
                    , render: function(data, type, row) {
                        if (data) {
                            return data;
                        } else {
                            return '';
                        }
                    }
                }
                , {
                    data: 'job_postion'
                    , render: function(data, type, row) {
                        if (data) {
                            return data;
                        } else {
                            return '';
                        }
                    }
                }
                , {
                    data: 'phone'
                    , render: function(data, type, row) {
                        if (data) {
                            return data;
                        } else {
                            return '';
                        }
                    }
                }
                , {
                    data: 'mobile'
                    , render: function(data, type, row) {
                        if (data) {
                            return data;
                        } else {
                            return '';
                        }
                    }
                }
                , {
                    data: 'priority'
                    , render: function(data, type, row) {
                        if (data) {
                            return data;
                        } else {
                            return '';
                        }
                    }
                }
                , {
                    data: 'get_tilte'
                    , render: function(data, type, row) {
                        if (data) {
                            return data.title;
                        } else {
                            return '';
                        }
                    }
                }
                , {
                    data: 'tag'
                    , render: function(data, type, row) {
                        if (data) {
                            return data;
                        } else {
                            return '';
                        }
                    }
                }
                , {
                    data: 'get_user'
                    , render: function(data, type, row) {
                        if (data) {
                            return data.email;
                        } else {
                            return '';
                        }
                    }
                }
                , {
                    data: 'sales_team'
                    , render: function(data, type, row) {
                        if (data) {
                            return data;
                        } else {
                            return '';
                        }
                    }
                }
                // Uncomment and modify the following column if needed
                // {
                //     data: 'id',
                //     width: "20%",
                //     render: function(data, type, row) {
                //         return `<a href="${row.id}">View</a>`;
                //     }
                // }
            ]
            , createdRow: function(row, data, dataIndex) {
                $(row).attr('data-id', data.id);
            }


        });

        // Handle row click event
        $('#example tbody').on('click', 'tr', function() {
            var id = $(this).data('id'); // Get the data-id attribute from the clicked row
            if (id) {
                window.location.href = '/lead-add/' + id; // Adjust the URL to your edit page
            }
        });

        // Handle filter click event
        $('.o_menu_item').on('click', function() {
            var filter = $(this).attr('id'); // Get the filter ID
            $('#filter').val(filter); // Set the filter value
            table.ajax.reload(); // Reload the DataTable with new filter
        });

        // Restore column visibility from local storage
        function restoreColumnVisibility() {
            var visibility = JSON.parse(localStorage.getItem('columnVisibility'));
            if (visibility) {
                table.columns().every(function() {
                    var column = this;
                    var index = column.index();
                    var isVisible = visibility[index] !== undefined ? visibility[index] : true;
                    column.visible(isVisible);
                    $('.dropdown-menu input[data-column="' + index + '"]').prop('checked', isVisible);
                });
            }
        }

        // Save column visibility to local storage
        function saveColumnVisibility() {
            var visibility = {};
            table.columns().every(function() {
                var column = this;
                var index = column.index();
                visibility[index] = column.visible();
            });
            localStorage.setItem('columnVisibility', JSON.stringify(visibility));
        }

        // Handle column visibility based on checkbox status
        $('.dropdown-menu input[type="checkbox"]').on('change', function() {
            var column = table.column($(this).data('column'));
            column.visible(this.checked);
            saveColumnVisibility(); // Save visibility to local storage
        });

        // Set default visibility for columns based on initial checkbox state
        restoreColumnVisibility();

        // Handle dropdown menu display
        $(document).on('click', '.dropdown-btn', function(event) {
            event.stopPropagation(); // Prevent click event from propagating to the document
            $('.dropdown-menu').not($(this).next('.dropdown-menu')).hide(); // Hide other dropdowns
            $(this).next('.dropdown-menu').toggle(); // Toggle visibility of the current dropdown
        });

        $(document).on('click', function(event) {
            if (!$(event.target).closest('.dropdown-menu').length) {
                $('.dropdown-menu').hide(); // Hide dropdown if click is outside of it
            }
        });

        // Remove all tags
        $(document).on('click', '.remove-tag', function() {
            $('.tag').remove();
            $('.checkmark').hide();
            $('#search-input').val('').attr('placeholder', 'Search...');
            $('#filter').val(''); // Clear the filter value
            table.ajax.reload();
        });

        $(document).on('click', '.custom-filter-remove', function() {
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
    $(document).ready(function() {
        // Initialize the Bootstrap modal
        var customFilterModal = new bootstrap.Modal(document.getElementById('customFilterModal'));

        // Handle the click event on the "Add Custom Filter" button
        $('.o_add_custom_filter').on('click', function() {
            customFilterModal.show();
        });


        // Handle form submission with AJAX
        $('#saveFilterBtn').on('click', function() {
            var filterName = $('#filterName').val();

            $.ajax({
                url: '/path/to/your/api/endpoint', // Replace with your API endpoint
                type: 'POST'
                , data: {
                    filterName: filterName
                }
                , success: function(response) {
                    // Handle success, e.g., show a success message or update UI
                    console.log('Filter saved successfully:', response);
                    customFilterModal.hide();
                }
                , error: function(xhr, status, error) {
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
        $('#addNewRule').on('click', function(event) {
            event.preventDefault();
            addNewRule();
        });

        // Click handler for "fa-plus" button in rule rows
        $(document).on('click', '.add-new-rule', function(event) {
            event.preventDefault();
            addNewRule();
        });

        // Click handler for "Delete node" button
        $(document).on('click', '.delete-rule', function(event) {
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

{{-- ------------------ lost_span & activities  --------------------- --}}

<script>
    $(document).on('click', '.activities', function(e) {
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
        $tagItems.each(function(index) {
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
        if ($tag.find('.tag-item').length > 0) {
            if ($('.remove-tag').length === 0) {
                $tag.append(' <span class="remove-tag" style="cursor:pointer">&times;</span>');
            }
        } else {
            $('.remove-tag').remove();
        }
    }

    $(document).on('click', '.lost_span', function(e) {
        e.stopPropagation();
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
            // Add new tag with filter icon and close button
            var newTagHtml = '<span class="tag-item" data-value="' + selectedValue + '">' + selectedValue + '<span class="remove-lost-tag">×</span></span>';

            // If no tags exist, create the tag container
            if ($tag.length === 0) {
                $('#search-input').before('<span class="tag1">' + newTagHtml + '</span>');
            } else {
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
        $tagItems.each(function(index) {
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
        }
    }

    // Function to update filters after tag removal
    function updateFilterTags() {
        let selectedTags = [];
        $('.tag-item').each(function() {
            selectedTags.push($(this).data('value'));
        });

        // Send selected tags to the server for filtering
        filterData(selectedTags);
    }

    // Remove tag and preserve "Lost" tag filter
    $(document).on('click', '.remove-lost-tag', function() {
        var $tagItem = $(this).parent('.tag-item');
        $tagItem.remove();
        $('.tag1').remove(); // Only remove the container if it's empty
        updateTagSeparators3();

        // Reapply filters after removing "Lost" tag
        updateFilterTags();

        // Remove checkmark from the dropdown
        $('.lost_span:contains("Lost")').find('.checkmark').hide();
    });

    $(document).on('click', '.remove-tag', function() {
        var $tagItem = $(this).parent('.tag-item');
        $tagItem.remove();
        $('.tag').remove(); // Only remove the container if it's empty
        updateTagSeparators3();


        // Reapply filters after removing "Lost" tag
        updateFilterTags();

        // Remove checkmark from the dropdown
        $('.activities .checkmark').hide();
    });

    function filterData(selectedTags) {
        $.ajax({
            url: '{{route('lead.activities')}}', // Your endpoint for fetching leads
            method: 'GET'
            , data: {
                tags: selectedTags
                // Include other parameters if needed
            }
            , success: function(response) {
                var $tableBody = $('#lead-table-body');

                // Clear existing table data
                $tableBody.empty();

                // Check if response contains data
                if (response.success && response.data && response.data.length > 0) {
                    // Loop through the response and create table rows
                    response.data.forEach(function(item) {
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
                    $('#lead-table-body .lead-row').on('click', function() {
                        var leadId = $(this).data('id');
                        window.location.href = `/lead-add/${leadId}`; // Adjust the URL as needed
                    });
                } else {
                    // If no data, show a message or keep it empty
                    $tableBody.append('<tr><td colspan="2">No data available</td></tr>'); // Adjust colspan based on the number of columns
                }
            }
            , error: function() {
                // Handle errors here
                console.error('Failed to fetch data');
            }
        });
    }

</script>



{{-- ----------------------------- Group by ------------------------------ --}}
<script>
    $(document).ready(function() {
        // Handle item selection from dropdown
        $(document).on('click', '.o-dropdown-item_1', function(e) {
            e.stopPropagation();
            var $item = $(this);
            var selectedValue = $item.clone().find('.checkmark').remove().end().text().trim();
            handleTagSelection(selectedValue, $item);
        });

        // Listen to changes in the select dropdown
        $('.o_add_custom_group_menu').on('change', function(e) {
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
                $('.tag-item').each(function() {
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
                $('.tag-item').each(function() {
                    selectedTags.push($(this).data('value'));
                });
                filter(selectedTags);
            }

            $('#search-dropdown').hide();
        }


        $(document).on('click', '.o_add_custom_group_menu', function() {
            let selectedTags = [];

            // Check if there are any tags in the '.tag-item'
            if ($('.tag-item').length > 0) {
                $('.tag-item').each(function() {
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
            $tagItems.each(function(index) {
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
        $(document).on('click', '.remove-tag', function() {
            $('.tag').remove();
            $('.o-dropdown-item .checkmark').hide();
            $('#search-input').val('').attr('placeholder', 'Search...');
            $('#filter').val(''); // Clear the filter value
        });

        // Hide dropdown when clicking outside
        $(document).on('click', function(e) {
            if (!$(e.target).closest('#search-input, #search-dropdown').length) {
                $('#search-dropdown').hide();
            }
        });

        $('#creationDateBtn').on('click', function(event) {
            event.preventDefault();

            // Toggle the dropdown visibility
            $('#creationDateDropdown').slideToggle();

            // Toggle the arrow rotation
            $(this).find('.arrow-icon').toggleClass('rotate');

            let selectedTags = [];
            if ($('.tag-item').length > 0) {
                $('.tag-item').each(function() {
                    selectedTags.push($(this).data('value'));
                });
            }

            // If selectedTags is not empty, call the filter function
            if (selectedTags.length > 0) {
                filter(selectedTags);
            } else {
                console.log('No tags selected');
            }

            // Close other dropdowns and reset arrows (optional, if there are multiple accordions)
            $('.o_dropdown_content').not('#creationDateDropdown').slideUp();
            $('.o_menu_item .arrow-icon').not($(this).find('.arrow-icon')).removeClass('rotate');
        });

        // Optional: Close the dropdown if clicking outside of it
        $(document).on('click', function(event) {
            if (!$(event.target).closest('.o_accordion').length) {
                $('#creationDateDropdown').slideUp();
                $('.o_menu_item .arrow-icon').removeClass('rotate');
            }
        });
        $('#closeDateBtn').on('click', function(event) {
            event.preventDefault();

            // Toggle the dropdown visibility
            $('#closeDateDropdown').slideToggle();

            // Toggle the arrow rotation
            $(this).find('.arrow-icon').toggleClass('rotate');

            let selectedTags = [];
            if ($('.tag-item').length > 0) {
                $('.tag-item').each(function() {
                    selectedTags.push($(this).data('value'));
                });
            }

            // If selectedTags is not empty, call the filter function
            if (selectedTags.length > 0) {
                filter(selectedTags);
            } else {
                console.log('No tags selected');
            }

            // Close other dropdowns and reset arrows (optional, if there are multiple accordions)
            $('.o_dropdown_content').not('#closeDateDropdown').slideUp();
            $('.o_menu_item .arrow-icon').not($(this).find('.arrow-icon')).removeClass('rotate');
        });

        // Optional: Close the dropdown if clicking outside of it
        $(document).on('click', function(event) {
            if (!$(event.target).closest('.o_accordion').length) {
                $('#closeDateDropdown').slideUp();
                $('.o_menu_item .arrow-icon').removeClass('rotate');
            }
        });

        //---------------------- second ---------------
        $('#creationDateBtn1').on('click', function(event) {
            event.preventDefault();

            // Toggle the dropdown visibility
            $('#creationDateDropdown1').slideToggle();

            // Toggle the arrow rotation
            $(this).find('.arrow-icon').toggleClass('rotate');

            let selectedTags = [];
            if ($('.tag-item').length > 0) {
                $('.tag-item').each(function() {
                    selectedTags.push($(this).data('value'));
                });
            }

            // If selectedTags is not empty, call the filter function
            if (selectedTags.length > 0) {
                filter(selectedTags);
            } else {
                console.log('No tags selected');
            }

            // Close other dropdowns and reset arrows (optional, if there are multiple accordions)
            $('.o_dropdown_content').not('#creationDateDropdown1').slideUp();
            $('.o_menu_item .arrow-icon').not($(this).find('.arrow-icon')).removeClass('rotate');
        });

        // Optional: Close the dropdown if clicking outside of it
        $(document).on('click', function(event) {
            if (!$(event.target).closest('.o_accordion').length) {
                $('#creationDateDropdown1').slideUp();
                $('.o_menu_item .arrow-icon').removeClass('rotate');
            }
        });
        $('#closeDateBtn1').on('click', function(event) {
            event.preventDefault();

            // Toggle the dropdown visibility
            $('#closeDateDropdown1').slideToggle();

            // Toggle the arrow rotation
            $(this).find('.arrow-icon').toggleClass('rotate');

            let selectedTags = [];
            if ($('.tag-item').length > 0) {
                $('.tag-item').each(function() {
                    selectedTags.push($(this).data('value'));
                });
            }

            // If selectedTags is not empty, call the filter function
            if (selectedTags.length > 0) {
                filter(selectedTags);
            } else {
                console.log('No tags selected');
            }

            // Close other dropdowns and reset arrows (optional, if there are multiple accordions)
            $('.o_dropdown_content').not('#closeDateDropdown1').slideUp();
            $('.o_menu_item .arrow-icon').not($(this).find('.arrow-icon')).removeClass('rotate');
        });

        // Optional: Close the dropdown if clicking outside of it
        $(document).on('click', function(event) {
            if (!$(event.target).closest('.o_accordion').length) {
                $('#closeDateDropdown1').slideUp();
                $('.o_menu_item .arrow-icon').removeClass('rotate');
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
                , success: function(response) {
                    console.log('Response:', response);

                    var tableBody = $('#lead-table-body');
                    tableBody.empty();

                    var leads = response.data;

                    function renderGroup(groupLeads, level) {
                        $.each(groupLeads, function(groupKey, groupValue) {
                            var groupRow = `
                            <tr class="group-header" data-level="${level}" style="cursor:pointer;">
                                <td colspan="20" style="padding-left:${level * 20}px;">
                                    <b>${groupKey} (${$.isArray(groupValue) ? groupValue.length : Object.keys(groupValue).length})</b>
                                </td>
                            </tr>
                        `;
                            tableBody.append(groupRow);

                            if ($.isArray(groupValue)) {
                                $.each(groupValue, function(index, lead) {
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
                    $('.group-header').on('click', function() {
                        var level = $(this).data('level');
                        var nextRow = $(this).next();
                        while (nextRow.length && nextRow.data('level') > level) {
                            nextRow.toggle();
                            nextRow = nextRow.next();
                        }
                    });
                }
                , error: function(xhr, status, error) {
                    console.error('Error applying filter:', error);
                }
            });
        }

        $(document).on('click', '.lead-row', function() {
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
    $(document).ready(function() {
        // Handle item selection from dropdown
        $(document).on('click', '.o-dropdown-item_2', function(e) {
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
        $(document).on('click', '.creation-date-tag, .closed-date-tag', function() {
            var $tag = $(this).closest('.tag3');
            var type = $(this).hasClass('creation-date-tag') ? 'Creation Date' : 'Closed Date';
            var selectedValue = $(this).text().trim();
            handleTagSelection4(selectedValue, type);
        });

        // Remove all tags when the close button is clicked
        $(document).on('click', '.remove-tag', function() {
            $('.tag3').remove();
            $('.o-dropdown-item_2 .checkmark').hide();
            $('#search-input').val('').attr('placeholder', 'Search...');
        });

        updateTagSeparators4(); // Ensure that the close icon is added correctly
    });
</script>


<script>
    $(document).ready(function() {
        $('#customer_filter_select').on('change', function() {
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

        $('.add_filter').on('click', function(event) {
            event.preventDefault();
            var filterType = $('#customer_filter_select').val();
            var filterValue = $('#customer_filter_input_value').val();
            var operatesValue = $('#customer_filter_operates').val();

            handleTagSelection(filterType, operatesValue, filterValue);

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
                success: function(response) {
                    var $tableBody = $('#lead-table-body');

                    // Clear existing table data
                    $tableBody.empty();

                    // Check if response contains data
                    if (response.success && response.data && response.data.length > 0) {
                        // Loop through the response and create table rows
                        response.data.forEach(function(item) {
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
                        $('#lead-table-body .lead-row').on('click', function() {
                            var leadId = $(this).data('id');
                            window.location.href = `/lead-add/${leadId}`; // Adjust the URL as needed
                        });
                    } else {
                        // If no data, show a message or keep it empty
                        $tableBody.append('<tr><td colspan="2">No data available</td></tr>'); // Adjust colspan based on the number of columns
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });

            $('#customFilterModal').modal('hide');
        });

        function handleTagSelection(filterType, operatesValue, filterValue) {
            var selectedValue = filterType + ' ' + operatesValue + ' ' + filterValue; 
            var $tag = $('.tag5');
            var $tagItem = $('.tag-item[data-value="' + selectedValue + '"]');

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

            updateTagSeparators();
        }

        function updateTagSeparators() {
            var $tag = $('.tag5');
            var $tagItems = $tag.find('.tag-item');
            var html = '';
            $tagItems.each(function(index) {
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
            if ($tag.find('.tag-item').length > 0) {
                if ($('.custom-filter-remove').length === 0) {
                    $tag.append(' <span class="custom-filter-remove" style="cursor:pointer">&times;</span>');
                }
            } else {
                $('.custom-filter-remove').remove();
            }
        }

        $(document).on('click', '.custom-filter-remove', function() {
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
    $(document).on('click', '.lead-row', function() {
        var leadId = $(this).data('id');
        window.location.href = "{{ route('lead.create') }}/" + leadId;
    });

    function storeLead() {
        $.ajax({
            url: "{{ route('lead.storeLead') }}"
            , type: "POST"
            , data: {
                _token: "{{ csrf_token() }}"
            , }
            , success: function(response) {
                console.log('Lead stored successfully.', response);
            }
            , error: function(error) {
                console.error('Error storing lead:', error);
            }
        });
    }

    // Auto-refresh every 2 minutes
    setInterval(function() {
        console.log('Attempting to store lead...');
        storeLead();
    }, 2 * 60 * 1000);
    storeLead();

</script>
<script>
    $(document).ready(function() {
        // Show the dropdown when the input field is clicked
        $('#search-input').on('click', function() {
            $('#search-dropdown').show();
        });

        // Add selected value to the input field and hide the dropdown
        $(document).on('click', '#search-dropdown .o-dropdown-item', function() {
            // var selectedValue = $(this).text().trim();
            // $('#search-input').val(selectedValue);
            $('#search-dropdown').hide();
        });

        // Hide dropdown when clicking outside
        $(document).on('click', function(e) {
            if (!$(e.target).closest('#search-input, #search-dropdown').length) {
                $('#search-dropdown').hide();
            }
        });
    });

</script>




@endsection
