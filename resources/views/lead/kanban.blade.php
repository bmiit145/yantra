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
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script></style>
@endsection

@section('search_div')
<div class="o_popover popover mw-100 o-dropdown--menu dropdown-menu-search mx-0 o_search_bar_menu d-flex flex-wrap flex-lg-nowrap w-100 w-md-auto mx-md-auto mt-2 py-3"
    role="menu" style="position: absolute; top: 0; left: 0;">
    <div class="o_dropdown_container o_filter_menu w-100 w-lg-auto h-100 px-3 mb-4 mb-lg-0 border-end">
        <div class="px-3 fs-5 mb-2"><i class="me-2 text-primary fa fa-filter"></i>
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
                <span class="arrow-icon">▼</span>
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
                <span class="arrow-icon">▼</span>
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
            tabindex="0" title="" aria-checked="false">Late Activities</span><span
            class="o-dropdown-item dropdown-item o-navigable o_menu_item text-truncate" role="menuitemcheckbox"
            tabindex="0" title="Today Activities" aria-checked="false">Today Activities</span><span
            class="o-dropdown-item dropdown-item o-navigable o_menu_item text-truncate focus" role="menuitemcheckbox"
            tabindex="0" title="Future Activities" aria-checked="false">Future Activities</span>
        <div class="dropdown-divider" role="separator"></div>
        <!-- <span class="o-dropdown-item dropdown-item o-navigable o_menu_item text-truncate lost_span" role="menuitemcheckbox" tabindex="0" title="" aria-checked="false">Archived</span>
        <div role="separator" class="dropdown-divider"></div> -->
        <span class="o-dropdown-item dropdown-item o-navigable o_menu_item o_add_custom_filter" role="menuitem"
            tabindex="0" style="cursor: pointer;">Add Custom Filter</span>
    </div>
    <div class="o_dropdown_container o_group_by_menu w-100 w-lg-auto h-100 px-3 mb-4 mb-lg-0 border-end">
        <div class="px-3 fs-5 mb-2"><i class="me-2 text-action oi oi-group"></i>
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
                <span class="arrow-icon">▼</span>
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
                <span class="arrow-icon">▼</span>
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

        {{-- <div class="o_accordion position-relative">
            <button class="o_menu_item o_accordion_toggle dropdown-item o-navigable text-truncate" tabindex="0"
                aria-expanded="false">Closed Date</button>
        </div> --}}
        <div class="dropdown-divider" role="separator"></div>
        {{-- <div class="o_accordion position-relative"><button
                class="o_menu_item o_accordion_toggle dropdown-item o-navigable  text-truncate" tabindex="0"
                aria-expanded="false">Properties</button></div> --}}
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

@vite([
    'resources/css/crm_2.css',
    //    'resources/css/odoo/web.assets_web_print.min.css'
])

<style>
    .o_priority_star.fa-star {
        color: #f3cc00;
    }

    .o_priority_star.fa-star-o {
        color: rgba(55, 65, 81, 0.76);
    }

    .header-bg-btn .dropdown-menu {
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .header-bg-btn .dropdown-item img {
        object-fit: cover;
    }

    .header-bg-btn .dropdown-header {
        font-weight: bold;
        font-size: 16px;
    }

    .header-bg-btn .dropdown-item {
        cursor: pointer;
    }

    .header-bg-btn .badge {
        font-size: 0.75rem;
        border-radius: 10px;
        padding: 4px 8px;
    }

    .header-bg-btn .badge.counter-bubble {
        font-size: 0.75rem;
        border-radius: 50%;
        /* padding: 4px 8px; */
        height: 16px;
        width: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        position: absolute;
        top: 11px;
        right: 10px;
        font-size: 10px;
    }

    .navbar-expand-sm .navbar-nav .dropdown-menu:before {
        content: "";
        position: absolute;
        width: 0;
        height: 0;
        top: -21px;
        left: 90.3%;
        border-left: 14px solid #00000000;
        border-right: 14px solid #00000000;
        border-bottom: 20px solid #00000029;
    }

    .navbar-expand-sm .navbar-nav .dropdown-menu:after {
        top: 20px;
        position: absolute;
        z-index: 11;
        display: block;
    }

    .navbar-expand-sm .navbar-nav .dropdown-menu:after {
        content: "";
        position: absolute;
        width: 0;
        height: 0;
        top: -18px;
        left: 90.5%;
        border-left: 13px solid #00000000;
        border-right: 13px solid #00000000;
        border-bottom: 18px solid #FFFFFF;
    }

    .avatar-initials {
        width: 40px;
        height: 40px;
        background-color: #017e84;
        color: white;
        font-size: 20px;
        border-radius: 50%;
        text-align: center;
        line-height: 40px;
    }

    .kanban-avatar-initials {
        width: 20px;
        height: 20px;
        background-color: #017e84;
        color: white;
        font-size: 18px;
        border-radius: 50%;
        text-align: center;
        line-height: 40px;
    }
    .location{
     display: none;
    }


    .dropdown-menu-search {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 623px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
        padding: 0px;
        top: auto;
    }

    .dropdown-menu-search a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        cursor: pointer;
    }

    .dropdown-menu-search a:hover {
        background-color: #ddd;
    }

    .dropdown-active .dropdown-menu-search {
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
    .dropdown-toggle::after{
        content: none!important;
    }
</style>

<div class="o_content">
    <div
        class="o_kanban_renderer o_renderer d-flex o_kanban_ungrouped align-content-start flex-wrap justify-content-start">
        @foreach ($leads as $lead)
            <a href="{{route('lead.create', $lead->id)}}">
                <div role="article" class="o_kanban_record d-flex flex-grow-1 flex-md-shrink-1 flex-shrink-0 contact-card"
                    data-id="{{ $lead->id }}" tabindex="0">
                    <div class="oe_kanban_global_click o_kanban_record_has_image_fill o_res_partner_kanban">
                        <div class="oe_kanban_details d-flex flex-column justify-content-between">
                            <div>
                                <strong class="o_kanban_record_title oe_partner_heading">
                                    <span>{{ $lead->product_name ?? '' }}</span>
                                </strong>
                                <div class="o_kanban_tags_section oe_kanban_partner_categories">
                                    <span class="oe_kanban_list_many2many">
                                        <div name="category_id" class="o_field_widget o_field_many2many_tags">
                                            <div class="d-flex flex-wrap gap-1"></div>
                                        </div>
                                    </span>
                                </div>
                            </div>
                            <div class="o_kanban_record_bottom">
                                <div class="oe_kanban_bottom_left">
                                    <div name="priority" class="o_field_widget o_field_priority">
                                        <div name="priority" class="o_field_widget o_field_priority">
                                            <div class="o_priority set-priority" role="radiogroup" name="priority"
                                                aria-label="Priority">
                                                <a href="#"
                                                    class="o_priority_star fa {{ $lead->priority == 'medium' || $lead->priority == 'high' || $lead->priority == 'very_high' ? 'fa-star' : 'fa-star-o' }}"
                                                    role="radio" tabindex="-1" data-value="medium"
                                                    data-tooltip="Priority: Medium" aria-label="Medium"></a><a href="#"
                                                    class="o_priority_star fa {{ $lead->priority == 'high' || $lead->priority == 'very_high' ? 'fa-star' : 'fa-star-o' }}"
                                                    role="radio" tabindex="-1" data-value="high"
                                                    data-tooltip="Priority: High" aria-label="High"></a><a href="#"
                                                    class="o_priority_star fa {{ $lead->priority == 'very_high' ? 'fa-star' : 'fa-star-o' }}"
                                                    role="radio" tabindex="-1" data-value="very_high"
                                                    data-tooltip="Priority: Very High" aria-label="Very High"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div name="activity_ids" class="o_field_widget o_field_kanban_activity">
                                        <a class="o-mail-ActivityButton" role="button" aria-label="Show activities"
                                            title="Show activities">
                                            <i class="fa fa-fw fa-lg text-muted fa-clock-o btn-link text-dark" role="img">
                                            </i>
                                        </a>
                                    </div>
                                </div>
                                <div class="oe_kanban_bottom_right">
                                    <div name="user_id"
                                        class="o_field_widget o_field_many2one_avatar_user o_field_many2one_avatar_kanban o_field_many2one_avatar">
                                        <div class="d-flex align-items-center gap-1 user-icon" data-tooltip="">
                                            <li class="nav-item header-bg-btn dropdown">
                                                <a class="nav-link" href="#" id="notificationDropdown{{ $lead->id }}"
                                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <span
                                                        class="kanban-avatar-initials rounded d-flex align-items-center justify-content-center">
                                                        {{ strtoupper($lead->getUser->name[0] ?? strtoupper($currentUser->name[0] ?? '')) }}
                                                    </span>
                                                </a>
                                                <!-- Dropdown Menu -->
                                                <div class="dropdown-menu dropdown-menu-end p-3"
                                                    aria-labelledby="notificationDropdown{{ $lead->id }}"
                                                    style="width: 300px;height: 143px;">
                                                    <div class="o_avatar_card">
                                                        <div class="card-body">
                                                            <div class="d-flex align-items-start gap-2">
                                                                <span class="o_avatar pt-1 position-relative o_card_avatar">
                                                                    <!-- Placeholder for the avatar with the first letter of the name -->
                                                                    <span
                                                                        class="avatar-initials rounded d-flex align-items-center justify-content-center">
                                                                        {{ strtoupper($lead->getUser->name[0] ?? strtoupper($currentUser->name[0] ?? '')) }}
                                                                    </span>
                                                                    <span name="icon"
                                                                        class="o_card_avatar_im_status position-absolute d-flex align-items-center justify-content-center">
                                                                        <i class="fa fa-fw fa-circle text-success"
                                                                            title="Online" role="img"
                                                                            aria-label="User is online"></i>
                                                                    </span>
                                                                </span>
                                                                <div
                                                                    class="d-flex flex-column o_card_user_infos overflow-hidden">
                                                                    <span
                                                                        class="fw-bold">{{ $lead->getUser->email ?? $currentUser->email ?? '' }}</span>
                                                                    <span class="text-muted text-truncate"
                                                                        data-tooltip="Department"
                                                                        title="Administration">{{ $lead->getUser->name ?? $currentUser->name ?? '' }}</span>
                                                                    <a class="text-truncate"
                                                                        href="mailto:{{ $lead->getUser->email ?? $currentUser->email ?? '' }}"
                                                                        title="{{ $lead->getUser->email ?? $currentUser->email ?? '' }}">
                                                                        <i
                                                                            class="fa fa-fw fa-envelope me-1"></i>{{ $lead->getUser->email ?? $currentUser->email ?? '' }}
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="flex-wrap gap-2 mt-2">
                                                                <div
                                                                    class="justify-content-end d-flex align-items-baseline">
                                                                    <div class="d-flex gap-2 o_avatar_card_buttons">
                                                                        <button class="btn btn-secondary btn-sm">Send
                                                                            message</button>
                                                                        <button class="btn btn-secondary btn-sm">View
                                                                            Profile</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach

        <div class="o_kanban_record o_kanban_ghost flex-grow-1 flex-md-shrink-1 flex-shrink-0 my-0"></div>
        <div class="o_kanban_record o_kanban_ghost flex-grow-1 flex-md-shrink-1 flex-shrink-0 my-0"></div>
        <div class="o_kanban_record o_kanban_ghost flex-grow-1 flex-md-shrink-1 flex-shrink-0 my-0"></div>
        <div class="o_kanban_record o_kanban_ghost flex-grow-1 flex-md-shrink-1 flex-shrink-0 my-0"></div>
        <div class="o_kanban_record o_kanban_ghost flex-grow-1 flex-md-shrink-1 flex-shrink-0 my-0"></div>
        <div class="o_kanban_record o_kanban_ghost flex-grow-1 flex-md-shrink-1 flex-shrink-0 my-0"></div>
    </div>
</div>

@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function () {
            // Handle star click event
            $('.o_priority_star').on('click', function (e) {
                e.preventDefault();

                var $this = $(this);
                var $kanbanRecord = $this.closest('.o_kanban_record');
                var leadId = $kanbanRecord.data('id');
                var priority = $this.data('value');

                if (!leadId) {
                    alert('Lead ID is missing. Please try again.');
                    return;
                }

                // Send AJAX request to update priority
                $.ajax({
                    url: '{{ route('lead.updatePriority') }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        lead_id: leadId,
                        priority: priority
                    },
                    success: function (response) {
                        // Update UI
                        updatePriorityStars($kanbanRecord, priority);
                    },
                    error: function () {
                        alert('An error occurred. Please try again.');
                    }
                });
            });

            // Function to update star UI based on priority
            function updatePriorityStars($kanbanRecord, selectedPriority) {
                var priorities = ['medium', 'high', 'very_high'];
                var selectedIndex = priorities.indexOf(selectedPriority);

                priorities.forEach(function (priority, index) {
                    var $star = $kanbanRecord.find('.o_priority_star[data-value="' + priority + '"]');
                    if (index <= selectedIndex) {
                        $star.removeClass('fa-star-o').addClass('fa-star');
                    } else {
                        $star.removeClass('fa-star').addClass('fa-star-o');
                    }
                });
            }

            // Initialize star states based on priority from the server
            $('.o_kanban_record').each(function () {
                var $record = $(this);
                var priority = $record.data('priority');
                if (priority) {
                    updatePriorityStars($record, priority);
                }
            });
        });

    </script>

<script>
 $(document).ready(function() {
    // Toggle dropdown on arrow click
    $('.o_searchview_dropdown_toggler').click(function(event) {
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

    // Open dropdown when clicking on search input
    $('#search-input').on('focus', function() {
        $('#search-dropdown').show(); // Show dropdown on focus
        $('.o_searchview_dropdown_toggler').attr('aria-expanded', 'true'); // Update aria-expanded
        $('#dropdown-arrow').removeClass('fa-caret-down').addClass('fa-caret-up'); // Change to up arrow
    });

    // Keep the dropdown open when clicking inside
    $('#search-input, #search-dropdown').click(function(event) {
        event.stopPropagation(); // Prevent closing when clicking inside the dropdown or input
    });

    // Close dropdown when clicking outside
    $(document).click(function(event) {
        if (!$(event.target).closest('.o_cp_searchview').length) {
            $('#search-dropdown').hide();
            $('.o_searchview_dropdown_toggler').attr('aria-expanded', 'false');
            $('#dropdown-arrow').removeClass('fa-caret-up').addClass('fa-caret-down'); // Reset to down arrow
        }
    });
});
</script>
@endpush