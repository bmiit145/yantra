@extends('layout.header')

@section('title', 'Manufacturing')
@section('head_title_link', route('dashboard'))
@section('image_url', asset('images/Employees.png'))
@section('head_new_btn_link', route('manufacturing.create'))
@section('head_breadcrumb_title', 'Manufacturing Orders')
@section('save_class', 'save_contacts')
@section('head')
    @vite(['resources/css/odoo/web.assets_web.css', 'resources/css/contactcreate.css'])
@endsection
{{-- @section('navbar_menu')
    <li><a href="#" id="operations-link">Operations</a></li>
    <li><a href="#" id="product-link"></a>Products</li>
    <li><a href="#"></a>Reporting</li>
    <li><a href="#" id="configLink">Configuration</a></li>

    <div id="dropdownMenu" class="o_popover popover mw-100 o-dropdown--menu dropdown-menu mx-0" role="menu"
        style="display: none; position: absolute;">
        <a class="o-dropdown-item dropdown-item o-navigable" role="menuitem" tabindex="0" style="padding-left: 20px;"
            href="/odoo/action-440" data-menu-xmlid="hr.hr_menu_configuration" data-section="310">Settings</a>
        <a class="o-dropdown-item dropdown-item o-navigable" role="menuitem" tabindex="0" style="padding-left: 20px;"
            href="/odoo/action-425" data-menu-xmlid="hr.menu_config_plan_plan" data-section="299">Activity Plan</a>
        <div class="dropdown-menu_group dropdown-header" style="padding-left: 20px;">Employee</div>
        <a class="o-dropdown-item dropdown-item o-navigable o_dropdown_menu_group_entry focus" role="menuitem"
            tabindex="0" style="padding-left: 32px;" href="/odoo/action-437" data-menu-xmlid="hr.menu_hr_department_tree"
            data-section="301">Departments</a>
        <a class="o-dropdown-item dropdown-item o-navigable o_dropdown_menu_group_entry" role="menuitem" tabindex="0"
            style="padding-left: 32px;" href="/odoo/action-439" data-menu-xmlid="hr.menu_hr_work_location_tree"
            data-section="303">Work Locations</a>
        <a class="o-dropdown-item dropdown-item o-navigable o_dropdown_menu_group_entry" role="menuitem" tabindex="0"
            style="padding-left: 32px;" href="/odoo/action-98" data-menu-xmlid="hr.menu_resource_calendar_view"
            data-section="304">Working Schedules</a>
        <a class="o-dropdown-item dropdown-item o-navigable o_dropdown_menu_group_entry" role="menuitem" tabindex="0"
            style="padding-left: 32px;" href="/odoo/action-427" data-menu-xmlid="hr.menu_hr_departure_reason_tree"
            data-section="305">Departure Reasons</a>

        <a class="o-dropdown-item dropdown-item o-navigable o_dropdown_menu_group_entry" role="menuitem" tabindex="0"
            style="padding-left: 32px;" href="{{ route('skill.view') }}" data-menu-xmlid="hr_skills.hr_skill_type_menu"
            data-section="341">Skill Types</a>

        <div class="dropdown-menu_group dropdown-header" style="padding-left: 20px;">Recruitment</div>
        <a class="o-dropdown-item dropdown-item o-navigable o_dropdown_menu_group_entry" role="menuitem" tabindex="0"
            style="padding-left: 32px;" href="/odoo/action-429" data-menu-xmlid="hr.menu_view_hr_job" data-section="308">Job
            Positions</a>
        <a class="o-dropdown-item dropdown-item o-navigable o_dropdown_menu_group_entry" role="menuitem" tabindex="0"
            style="padding-left: 32px;" href="/odoo/action-428" data-menu-xmlid="hr.menu_view_hr_contract_type"
            data-section="309">Employment Types</a>
        <div class="dropdown-menu_group dropdown-header" style="padding-left: 20px;">Challenges</div>
        <a class="o-dropdown-item dropdown-item o-navigable o_dropdown_menu_group_entry" role="menuitem" tabindex="0"
            style="padding-left: 32px;" href="/odoo/action-417" data-menu-xmlid="hr_gamification.gamification_badge_menu_hr"
            data-section="335">Badges</a>
        <a class="o-dropdown-item dropdown-item o-navigable o_dropdown_menu_group_entry" role="menuitem" tabindex="0"
            style="padding-left: 32px;" href="/odoo/action-465"
            data-menu-xmlid="hr_gamification.gamification_challenge_menu_hr" data-section="336">Challenges</a>
        <a class="o-dropdown-item dropdown-item o-navigable o_dropdown_menu_group_entry" role="menuitem" tabindex="0"
            style="padding-left: 32px;" href="/odoo/action-464" data-menu-xmlid="hr_gamification.gamification_goal_menu_hr"
            data-section="337">Goals History</a>
    </div>

@endsection --}}

@section('navbar_menu')
    <li class="dropdown">
        <a href="#">Operations</a>
        <div class="dropdown-content">
            <a href="#">Manufacturing Orders</a>
            <a href="#">Unbuild Orders</a>
            <a href="#">Scrap</a>
        </div>
    </li>

    <li class="dropdown">
        <a href="#">Products</a>
        <div class="dropdown-content">
            <a href="#">Products</a>
            <a href="#">Bills of Materials</a>
        </div>
    </li>
    <li class="dropdown">
        <a href="#">Reporting</a>
        <div class="dropdown-content">
            <a href="#">Production Analysis</a>
        </div>
    </li>
    <li class="dropdown">
        <a href="#">Configuration</a>
        <div class="dropdown-content">
            <a href="#">Settings</a>
        </div>
    </li>
@endsection

@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        .save_contacts {
            display: none;
        }
    </style>

    <body class="o_web_client">


        {{-- <div>
            <span id="oe_neutralize_banner"
                style="                         text-align: center;                         color: #FFFFFF;                         background-color: #D0442C;                         position: relative;                         display: block;                         font-size: 16px;                         ">
                Database neutralized for testing: no emails sent, etc.
            </span>
        </div> --}}

        {{-- <header class="o_navbar">
            <nav class="o_main_navbar d-print-none" data-command-category="disabled"><a href="/odoo"
                    class="o_menu_toggle hasImage" accesskey="h" title="Home menu" aria-label="Home menu"><svg
                        xmlns="http://www.w3.org/2000/svg" class="o_menu_toggle_icon pe-none" width="14px"
                        height="14px" viewBox="0 0 14 14">
                        <g xmlns="http://www.w3.org/2000/svg" fill="currentColor" id="o_menu_toggle_row_0">
                            <rect xmlns="http://www.w3.org/2000/svg" width="3" height="3" x="0" y="0"></rect>
                            <rect xmlns="http://www.w3.org/2000/svg" width="3" height="3" x="5" y="0"></rect>
                            <rect xmlns="http://www.w3.org/2000/svg" width="3" height="3" x="10" y="0"></rect>
                        </g>
                        <g xmlns="http://www.w3.org/2000/svg" fill="currentColor" id="o_menu_toggle_row_1">
                            <rect xmlns="http://www.w3.org/2000/svg" width="3" height="3" x="0" y="5"></rect>
                            <rect xmlns="http://www.w3.org/2000/svg" width="3" height="3" x="5" y="5"></rect>
                            <rect xmlns="http://www.w3.org/2000/svg" width="3" height="3" x="10" y="5"></rect>
                        </g>
                        <g xmlns="http://www.w3.org/2000/svg" fill="currentColor" id="o_menu_toggle_row_2">
                            <rect xmlns="http://www.w3.org/2000/svg" width="3" height="3" x="0" y="10"></rect>
                            <rect xmlns="http://www.w3.org/2000/svg" width="3" height="3" x="5" y="10"></rect>
                            <rect xmlns="http://www.w3.org/2000/svg" width="3" height="3" x="10" y="10"></rect>
                        </g>
                    </svg><img class="o_menu_brand_icon d-inline position-absolute start-0 h-100 ps-1 ms-2"
                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGQAAABkCAYAAABw4pVUAAAACXBIWXMAABYlAAAWJQFJUiTwAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAARnSURBVHgB7ZxdaxxVGMf/Z3Z2tQnItBe+BuyNiFJB8UbvBmnUXrnfYPULmFC8EjGNvVQQv4DgJ5CCoNBI+wE09SLbi0RwA5pI3zbQpE06O3N6zkynTZMmbXdmdp+z+/8RONlJLnbmd/7Pec7sC0AIIYQQQgghhBBCCCGEEDLaKIwJwaUL6TDh92bMac+aM+8mwPz/J07+BEGMvJAXL523Q6h8zJmTDff8ubv21vQxCMLHCLIvDdDBQf8KYYycEJOI0PMjK6KZHdFwiZEQYhIRHPHjlrn4zawsuVuJnRZi06B8KyGVIa789INzQmwaJmtRM1Gq9SANbpWlw3BGiBWRLdLxrIYKRrU9FC8kK0u2Ze2F2ZHRScOjECnkQRoObVlHElFCspZV27IUIt0jyE2DPvO9HYKkEc1oeHbidM0Emve//KLQzn/oQh7dssoVEZ391g5h7PXmzFMNdz1fO4GsJTeFuNSyPpyGanf+AxWSpsGWI1OWnEpDze78vdA838rL6ECE7G5ZnUnDM3FLJ7q5pyxVTqVCXGpZ8zT0vKiplNeCNhNnCJud0oW41rL2zn5nhyY8092p4ZfR0oS41LKm7ERQ7WWFGrqSJk4hIa61rCnrV4DFy2a8mj1+4TVRKe5LiHN3WU0a0F4GlleBzS1I5omFuNayptg0rK4ZER3gTgRJ6J9DewmD3mRjBjqZVVp1EavTjxXiUsuaYtOw8k8mIi9Lgoh+PWmHMPLwqVL4BIm9pspO7QA1/eOBQpy7y3q9m0lYWhGXBksuAjU1Zy5lmHbU+y9p8JAQJ++y7l2kBZGXpWii3tIas0bC8cfN61SIiy1rukgLTcP+9eHJ73H5L7d/n0OSnHGyZRWIKU1mt4/sXS+JvZ5Pt933MxmCyRfpFdOyXt+AVPStNSQ3FpX3buMCCiD3JVzBLWuOTnbMy1JLSG6a0hndvHf0VRRBlhCbhtX/TBo6osvSfREbbcD8XiYyhAhfpHPSsrSxBL21iqoYrhAHFmnLvfUB+vY6qmbwQlxJQ4Vl6TAGJ8SmwUqwaaCIA6lWiPD7SrsZZFk6jGqEONCy5ujNTrZQD1lETvlCFtvZQu0I8fp5SMJD2dh1gvRN+UKElyjplC+EFIJChEEhwqAQYVCIMChEGBQiDAoRBoUIg0KEQSHCoBBhUIgwKEQYFCIMChEGhQiDQoRBIcKgEGFQiDAoRBgUIoyxFvJGvIlSCRoohMJfYy3kzZKFqKN1FEElYyzEfjb2850OysQ7Ueij/bqma9+MpRAr47M7/2JKb6Ms1OvPAZN9v3ddm595deq3ztgJsTLs2vHV9t8ojWMNeO8cRZ9oaH2x/tHCvH3gmYddlEmjWB2tkjwZv2z9gbKwyah9+BL6xMjAD/WPFz7ID/gJ9Gml8bVS6jjK4P23gT8vi/peqqlkG9O9a5iOruG9uIQvHzClSU0dgXplAur5Z/G0mPrUQYxzSulz9VMLF0EIIYQQQgghhBBCCCGEEDJG3AVxAwXyD85haQAAAABJRU5ErkJggg=="
                        alt="Manufacturing"><span class="o_menu_brand d-flex ms-3 pe-0">Manufacturing</span></a>
                <div class="o_menu_sections d-flex flex-grow-1 flex-shrink-1 w-0" role="menu"><button
                        class="fw-normal o-dropdown dropdown-toggle dropdown" data-hotkey="1"
                        data-menu-xmlid="mrp.menu_mrp_manufacturing" aria-expanded="false"><span
                            data-section="527">Operations</span></button><button
                        class="fw-normal o-dropdown dropdown-toggle dropdown" data-hotkey="2"
                        data-menu-xmlid="mrp.menu_mrp_bom" aria-expanded="false"><span
                            data-section="529">Products</span></button><button
                        class="fw-normal o-dropdown dropdown-toggle dropdown" data-hotkey="3"
                        data-menu-xmlid="mrp.menu_mrp_reporting" aria-expanded="false"><span
                            data-section="530">Reporting</span></button><button
                        class="fw-normal o-dropdown dropdown-toggle dropdown" data-hotkey="4"
                        data-menu-xmlid="mrp.menu_mrp_configuration" aria-expanded="false"><span
                            data-section="531">Configuration</span></button></div>
                <div class="o_menu_systray d-flex flex-shrink-0 ms-auto" role="menu">
                    <div></div>
                    <div></div>
                    <div class="dropdown"></div>
                    <div></div>
                    <div></div>
                    <div class="o-mail-DiscussSystray-class"><button aria-expanded="false"
                            class="o-dropdown dropdown-toggle dropdown"><i class="fa fa-lg fa-comments" role="img"
                                aria-label="Messages"></i><span
                                class="o-mail-MessagingMenu-counter badge rounded-pill">7</span></button></div>
                    <div></div><button aria-expanded="false" class="o-dropdown dropdown-toggle dropdown"><i
                            class="fa fa-lg fa-clock-o" role="img" aria-label="Activities"></i></button>
                    <div></div>
                    <div></div>
                    <div class="o_switch_company_menu d-none d-md-block"><button data-hotkey="shift+u" disabled=""
                            title="Yantra Design" aria-expanded="false" class="o-dropdown dropdown-toggle dropdown"><i
                                class="fa fa-building d-lg-none"></i><span
                                class="oe_topbar_name d-none d-lg-block text-truncate">Yantra Design</span></button></div>
                    <div></div>
                    <div class="d-flex" xml:space="preserve"><button
                            class="o_mobile_menu_toggle o_nav_entry o-no-caret d-md-none border-0 pe-3"
                            title="Toggle menu" aria-label="Toggle menu"><i class="oi oi-panel-right"></i></button></div>
                    <div></div>
                    <div class="o_user_menu d-none d-md-block pe-0"><button
                            class="py-1 py-lg-0 o-dropdown dropdown-toggle dropdown" aria-expanded="false"><img
                                class="o_avatar o_user_avatar rounded" alt="User"
                                src="https://yantra-design3.odoo.com/web/image/res.partner/3/avatar_128?unique=1722989906000"><small
                                class="oe_topbar_name d-none ms-2 text-start smaller lh-1 text-truncate"
                                style="max-width: 200px">info@yantradesign.co.in<mark
                                    class="d-block font-monospace text-truncate"><i
                                        class="fa fa-database oi-small me-1"></i>yantra-design3</mark></small></button>
                    </div>
                </div>
            </nav>
        </header> --}}

        <div class="o_action_manager">
            <div class="o_list_view o_view_controller o_action">

                {{-- <div class="o_control_panel d-flex flex-column gap-3 px-3 pt-2 pb-3" data-command-category="actions">
                    <div
                        class="o_control_panel_main d-flex flex-wrap flex-lg-nowrap justify-content-between align-items-lg-start gap-3 flex-grow-1">
                        <div class="o_control_panel_breadcrumbs d-flex align-items-center gap-1 order-0 h-lg-100">
                            <div class="o_control_panel_main_buttons d-flex gap-1 d-empty-none d-print-none">
                                <div class="d-inline-flex gap-1"><button type="button"
                                        class="btn btn-primary o_list_button_add" data-hotkey="c" data-bounce-button="">
                                        New </button>
                                    <div class="o_list_buttons d-flex gap-1 d-empty-none align-items-baseline"
                                        role="toolbar" aria-label="Main actions"></div>
                                </div>
                            </div>
                            <div class="o_breadcrumb d-flex gap-1 text-truncate">
                                <div class="o_last_breadcrumb_item active d-flex fs-4 min-w-0 align-items-center"><span
                                        class="min-w-0 text-truncate">Manufacturing Orders</span></div>
                                <div class="o_control_panel_breadcrumbs_actions d-inline-flex d-print-none">
                                    <div class="o_cp_action_menus d-flex align-items-center pe-2 gap-1">
                                        <div class="lh-1"><button
                                                class="d-print-none btn p-0 ms-1 lh-sm border-0 o-dropdown dropdown-toggle dropdown"
                                                data-hotkey="u" data-tooltip="Actions" aria-expanded="false"><i
                                                    class="fa fa-cog"></i></button></div>
                                    </div>
                                </div>
                            </div>
                            <div class="me-auto"></div>
                        </div>
                        <div
                            class="o_control_panel_actions d-empty-none d-flex align-items-center justify-content-start justify-content-lg-around order-2 order-lg-1 w-100 w-lg-auto">
                            <div class="o_cp_searchview d-flex input-group" role="search">
                                <div class="o_searchview form-control d-print-contents d-flex align-items-center py-1 border-end-0"
                                    role="search" aria-autocomplete="list"><button class="d-print-none btn border-0 p-0"
                                        role="button" aria-label="Search..." title="Search..."><i
                                            class="o_searchview_icon oi oi-search me-2" role="img"></i></button>
                                    <div class="o_searchview_input_container d-flex flex-grow-1 flex-wrap gap-1">
                                        <div class="o_searchview_facet position-relative d-inline-flex align-items-stretch rounded-2 bg-200 text-nowrap opacity-trigger-hover o_facet_with_domain"
                                            role="listitem" aria-label="search" tabindex="0">
                                            <div
                                                class="position-absolute start-0 top-0 bottom-0 end-0 bg-view border rounded-2 shadow opacity-0 opacity-100-hover">
                                            </div>
                                            <div class="o_searchview_facet_label position-relative rounded-start-2 px-1 rounded-end-0 p-0 btn btn-primary"
                                                role="button"><i class="small fa-fw fa fa-filter"
                                                    role="image"></i><span
                                                    class="position-absolute start-0 top-0 bottom-0 end-0 bg-inherit opacity-0 opacity-100-hover"><i
                                                        class="fa fa-fw fa-cog"></i></span></div>
                                            <div
                                                class="o_facet_values position-relative d-flex flex-wrap align-items-center ps-2 rounded-end-2 text-wrap">
                                                <small class="o_facet_value">To Do</small><button
                                                    class="o_facet_remove oi oi-close btn btn-link py-0 px-2 text-danger d-print-none"
                                                    role="button" aria-label="Remove" title="Remove"></button></div>
                                        </div><input type="text"
                                            class="o_searchview_input o_input d-print-none flex-grow-1 w-auto border-0"
                                            accesskey="Q" placeholder="Search..." role="searchbox">
                                    </div>
                                </div><button
                                    class="o_searchview_dropdown_toggler d-print-none btn btn-outline-secondary o-dropdown-caret rounded-start-0 o-dropdown dropdown-toggle dropdown"
                                    data-hotkey="shift+q" title="Toggle Search Panel" aria-expanded="false"></button>
                            </div>
                        </div>
                        <div
                            class="o_control_panel_navigation d-flex flex-wrap flex-md-nowrap justify-content-end gap-1 gap-xl-3 order-1 order-lg-2 flex-grow-1">
                            <div class="o_cp_pager text-nowrap " role="search">
                                <nav class="o_pager d-flex gap-2 h-100" aria-label="Pager"><span
                                        class="o_pager_counter align-self-center"><span
                                            class="o_pager_value d-inline-block border-bottom border-transparent mb-n1">1-1</span><span>
                                            / </span><span class="o_pager_limit">1</span></span><span
                                        class="btn-group d-print-none" aria-atomic="true"><button type="button"
                                            class="oi oi-chevron-left btn btn-secondary o_pager_previous px-2 rounded-start"
                                            aria-label="Previous" data-tooltip="Previous" tabindex="-1" data-hotkey="p"
                                            disabled=""></button><button type="button"
                                            class="oi oi-chevron-right btn btn-secondary o_pager_next px-2 rounded-end"
                                            aria-label="Next" data-tooltip="Next" tabindex="-1" data-hotkey="n"
                                            disabled=""></button></span></nav>
                            </div>
                            <nav class="o_cp_switch_buttons d-print-none d-inline-flex btn-group"><button
                                    class="btn btn-secondary o_switch_view o_list active" data-tooltip="List"><i
                                        class="oi oi-view-list"></i></button><button
                                    class="btn btn-secondary o_switch_view o_kanban" data-tooltip="Kanban"><i
                                        class="oi oi-view-kanban"></i></button><button
                                    class="btn btn-secondary o_switch_view o_calendar" data-tooltip="Calendar"><i
                                        class="fa fa-calendar"></i></button><button
                                    class="btn btn-secondary o_switch_view o_pivot" data-tooltip="Pivot"><i
                                        class="oi oi-view-pivot"></i></button><button
                                    class="btn btn-secondary o_switch_view o_graph" data-tooltip="Graph"><i
                                        class="fa fa-area-chart"></i></button><button
                                    class="btn btn-secondary o_switch_view o_activity" data-tooltip="Activity"><i
                                        class="fa fa-clock-o"></i></button></nav>
                        </div>
                    </div>
                </div> --}}

                <div class="o_content">
                    <div class="o_list_renderer o_renderer table-responsive" tabindex="-1"><br>
                        <table id="manufacturingDatatable"
                            class="o_list_table table table-sm table-hover position-relative mb-0 o_list_table_ungrouped table-striped"
                            style="table-layout: fixed;">
                            <thead>
                                <tr>
                                    <th class="o_list_record_selector o_list_controller align-middle pe-1 cursor-pointer"
                                        tabindex="-1" style="width: 40px;">
                                        <div class="o-checkbox form-check d-flex m-0"><input type="checkbox"
                                                class="form-check-input" id="checkbox-comp-1"><label
                                                class="form-check-label" for="checkbox-comp-1"></label></div>
                                    </th>
                                    <th data-tooltip-delay="1000" tabindex="-1" data-name="priority"
                                        class="align-middle cursor-default o_priority_cell opacity-trigger-hover w-print-auto"
                                        data-tooltip-template="web.ListHeaderTooltip"
                                        data-tooltip-info="{&quot;viewMode&quot;:&quot;list&quot;,&quot;resModel&quot;:&quot;mrp.production&quot;,&quot;debug&quot;:false,&quot;field&quot;:{&quot;name&quot;:&quot;priority&quot;,&quot;label&quot;:&quot;Priority&quot;,&quot;help&quot;:&quot;Components will be reserved first for the MO with the highest priorities.&quot;,&quot;type&quot;:&quot;selection&quot;,&quot;widget&quot;:&quot;priority&quot;,&quot;widgetDescription&quot;:&quot;Priority&quot;,&quot;context&quot;:&quot;{}&quot;,&quot;invisible&quot;:null,&quot;column_invisible&quot;:null,&quot;readonly&quot;:null,&quot;required&quot;:null,&quot;changeDefault&quot;:false,&quot;selection&quot;:[[&quot;0&quot;,&quot;Normal&quot;],[&quot;1&quot;,&quot;Urgent&quot;]]}}"
                                        style="width: 119px;"></th>
                                    <th data-tooltip-delay="1000" tabindex="-1" data-name="name"
                                        class="align-middle o_column_sortable position-relative cursor-pointer opacity-trigger-hover w-print-auto"
                                        data-tooltip-template="web.ListHeaderTooltip"
                                        data-tooltip-info="{&quot;viewMode&quot;:&quot;list&quot;,&quot;resModel&quot;:&quot;mrp.production&quot;,&quot;debug&quot;:false,&quot;field&quot;:{&quot;name&quot;:&quot;name&quot;,&quot;label&quot;:&quot;Reference&quot;,&quot;type&quot;:&quot;char&quot;,&quot;widget&quot;:null,&quot;context&quot;:&quot;{}&quot;,&quot;invisible&quot;:null,&quot;column_invisible&quot;:null,&quot;readonly&quot;:&quot;True&quot;,&quot;required&quot;:null,&quot;changeDefault&quot;:false}}"
                                        style="width: 196px;">
                                        <div class="d-flex"><span
                                                class="d-block min-w-0 text-truncate flex-grow-1">Reference</span><i
                                                class="fa fa-lg fa-angle-down opacity-0 opacity-75-hover"></i></div><span
                                            class="o_resize position-absolute top-0 end-0 bottom-0 ps-1 bg-black-25 opacity-0 opacity-50-hover z-1"></span>
                                    </th>
                                    <th data-tooltip-delay="1000" tabindex="-1" data-name="date_start"
                                        class="align-middle o_column_sortable position-relative cursor-pointer o_remaining_days_cell opacity-trigger-hover w-print-auto"
                                        data-tooltip-template="web.ListHeaderTooltip"
                                        data-tooltip-info="{&quot;viewMode&quot;:&quot;list&quot;,&quot;resModel&quot;:&quot;mrp.production&quot;,&quot;debug&quot;:false,&quot;field&quot;:{&quot;name&quot;:&quot;date_start&quot;,&quot;label&quot;:&quot;Start&quot;,&quot;help&quot;:&quot;Date you plan to start production or date you actually started production.&quot;,&quot;type&quot;:&quot;datetime&quot;,&quot;widget&quot;:&quot;remaining_days&quot;,&quot;widgetDescription&quot;:&quot;Remaining Days&quot;,&quot;context&quot;:&quot;{}&quot;,&quot;invisible&quot;:null,&quot;column_invisible&quot;:null,&quot;readonly&quot;:null,&quot;required&quot;:&quot;True&quot;,&quot;changeDefault&quot;:false}}"
                                        style="width: 133px;">
                                        <div class="d-flex"><span
                                                class="d-block min-w-0 text-truncate flex-grow-1">Start</span><i
                                                class="fa fa-lg fa-angle-down opacity-0 opacity-75-hover"></i></div><span
                                            class="o_resize position-absolute top-0 end-0 bottom-0 ps-1 bg-black-25 opacity-0 opacity-50-hover z-1"></span>
                                    </th>
                                    <th data-tooltip-delay="1000" tabindex="-1" data-name="product_id"
                                        class="align-middle o_column_sortable position-relative cursor-pointer opacity-trigger-hover w-print-auto"
                                        data-tooltip-template="web.ListHeaderTooltip"
                                        data-tooltip-info="{&quot;viewMode&quot;:&quot;list&quot;,&quot;resModel&quot;:&quot;mrp.production&quot;,&quot;debug&quot;:false,&quot;field&quot;:{&quot;name&quot;:&quot;product_id&quot;,&quot;label&quot;:&quot;Product&quot;,&quot;type&quot;:&quot;many2one&quot;,&quot;widget&quot;:null,&quot;context&quot;:&quot;{}&quot;,&quot;domain&quot;:&quot;(company_id and ['|', ('company_id', '=', False), ('company_id', 'parent_of', [company_id])] or ['|', ('company_id', '=', False), ('company_id', 'parent_of', [''])]) + ([('type', '=', 'consu')])&quot;,&quot;invisible&quot;:null,&quot;column_invisible&quot;:null,&quot;readonly&quot;:&quot;1&quot;,&quot;required&quot;:&quot;True&quot;,&quot;changeDefault&quot;:false,&quot;relation&quot;:&quot;product.product&quot;}}"
                                        style="width: 122px;">
                                        <div class="d-flex"><span
                                                class="d-block min-w-0 text-truncate flex-grow-1">Product</span><i
                                                class="fa fa-lg fa-angle-down opacity-0 opacity-75-hover"></i></div><span
                                            class="o_resize position-absolute top-0 end-0 bottom-0 ps-1 bg-black-25 opacity-0 opacity-50-hover z-1"></span>
                                    </th>
                                    <th data-tooltip-delay="1000" tabindex="-1" data-name="activity_ids"
                                        class="align-middle cursor-default o_list_activity_cell opacity-trigger-hover w-print-auto"
                                        data-tooltip-template="web.ListHeaderTooltip"
                                        data-tooltip-info="{&quot;viewMode&quot;:&quot;list&quot;,&quot;resModel&quot;:&quot;mrp.production&quot;,&quot;debug&quot;:false,&quot;field&quot;:{&quot;name&quot;:&quot;activity_ids&quot;,&quot;label&quot;:&quot;Activities&quot;,&quot;type&quot;:&quot;one2many&quot;,&quot;widget&quot;:&quot;list_activity&quot;,&quot;context&quot;:&quot;{}&quot;,&quot;domain&quot;:[],&quot;invisible&quot;:null,&quot;column_invisible&quot;:null,&quot;readonly&quot;:null,&quot;required&quot;:null,&quot;changeDefault&quot;:false,&quot;relation&quot;:&quot;mail.activity&quot;}}"
                                        style="width: 161px;">
                                        <div class="d-flex"><span class="d-block min-w-0 text-truncate flex-grow-1">Next
                                                Activity</span><i
                                                class="d-none fa-angle-down opacity-0 opacity-75-hover"></i></div><span
                                            class="o_resize position-absolute top-0 end-0 bottom-0 ps-1 bg-black-25 opacity-0 opacity-50-hover z-1"></span>
                                    </th>
                                    <th data-tooltip-delay="1000" tabindex="-1" data-name="origin"
                                        class="align-middle o_column_sortable position-relative cursor-pointer opacity-trigger-hover w-print-auto"
                                        data-tooltip-template="web.ListHeaderTooltip"
                                        data-tooltip-info="{&quot;viewMode&quot;:&quot;list&quot;,&quot;resModel&quot;:&quot;mrp.production&quot;,&quot;debug&quot;:false,&quot;field&quot;:{&quot;name&quot;:&quot;origin&quot;,&quot;label&quot;:&quot;Source&quot;,&quot;help&quot;:&quot;Reference of the document that generated this production order request.&quot;,&quot;type&quot;:&quot;char&quot;,&quot;widget&quot;:null,&quot;context&quot;:&quot;{}&quot;,&quot;invisible&quot;:null,&quot;column_invisible&quot;:null,&quot;readonly&quot;:&quot;state in ['cancel', 'done']&quot;,&quot;required&quot;:null,&quot;changeDefault&quot;:false}}"
                                        style="width: 119px;">
                                        <div class="d-flex"><span
                                                class="d-block min-w-0 text-truncate flex-grow-1">Source</span><i
                                                class="fa fa-lg fa-angle-down opacity-0 opacity-75-hover"></i></div><span
                                            class="o_resize position-absolute top-0 end-0 bottom-0 ps-1 bg-black-25 opacity-0 opacity-50-hover z-1"></span>
                                    </th>
                                    <th data-tooltip-delay="1000" tabindex="-1" data-name="components_availability"
                                        class="align-middle cursor-default opacity-trigger-hover w-print-auto"
                                        data-tooltip-template="web.ListHeaderTooltip"
                                        data-tooltip-info="{&quot;viewMode&quot;:&quot;list&quot;,&quot;resModel&quot;:&quot;mrp.production&quot;,&quot;debug&quot;:false,&quot;field&quot;:{&quot;name&quot;:&quot;components_availability&quot;,&quot;label&quot;:&quot;Component Status&quot;,&quot;help&quot;:&quot;Latest component availability status for this MO. If green, then the MO's readiness status is ready, as per BOM configuration.&quot;,&quot;type&quot;:&quot;char&quot;,&quot;widget&quot;:null,&quot;context&quot;:&quot;{}&quot;,&quot;invisible&quot;:&quot;state not in ['confirmed', 'progress']&quot;,&quot;column_invisible&quot;:null,&quot;readonly&quot;:&quot;True&quot;,&quot;required&quot;:null,&quot;changeDefault&quot;:false}}"
                                        style="width: 239px;">
                                        <div class="d-flex"><span
                                                class="d-block min-w-0 text-truncate flex-grow-1">Component Status</span><i
                                                class="d-none fa-angle-down opacity-0 opacity-75-hover"></i></div><span
                                            class="o_resize position-absolute top-0 end-0 bottom-0 ps-1 bg-black-25 opacity-0 opacity-50-hover z-1"></span>
                                    </th>
                                    <th data-tooltip-delay="1000" tabindex="-1" data-name="product_qty"
                                        class="align-middle o_column_sortable position-relative cursor-pointer o_list_number_th opacity-trigger-hover w-print-auto"
                                        data-tooltip-template="web.ListHeaderTooltip"
                                        data-tooltip-info="{&quot;viewMode&quot;:&quot;list&quot;,&quot;resModel&quot;:&quot;mrp.production&quot;,&quot;debug&quot;:false,&quot;field&quot;:{&quot;name&quot;:&quot;product_qty&quot;,&quot;label&quot;:&quot;Quantity To Produce&quot;,&quot;type&quot;:&quot;float&quot;,&quot;widget&quot;:null,&quot;context&quot;:&quot;{}&quot;,&quot;invisible&quot;:null,&quot;column_invisible&quot;:null,&quot;readonly&quot;:&quot;1&quot;,&quot;required&quot;:&quot;True&quot;,&quot;changeDefault&quot;:false}}"
                                        style="width: 101px;">
                                        <div class="d-flex flex-row-reverse"><span
                                                class="d-block min-w-0 text-truncate flex-grow-1 o_list_number_th">Quantity</span><i
                                                class="fa fa-lg fa-angle-down opacity-0 opacity-75-hover"></i></div><span
                                            class="o_resize position-absolute top-0 end-0 bottom-0 ps-1 bg-black-25 opacity-0 opacity-50-hover z-1"></span>
                                    </th>
                                    <th data-tooltip-delay="1000" tabindex="-1" data-name="product_uom_id"
                                        class="align-middle o_column_sortable position-relative cursor-pointer opacity-trigger-hover w-print-auto"
                                        data-tooltip-template="web.ListHeaderTooltip"
                                        data-tooltip-info="{&quot;viewMode&quot;:&quot;list&quot;,&quot;resModel&quot;:&quot;mrp.production&quot;,&quot;debug&quot;:false,&quot;field&quot;:{&quot;name&quot;:&quot;product_uom_id&quot;,&quot;label&quot;:&quot;Product Unit of Measure&quot;,&quot;type&quot;:&quot;many2one&quot;,&quot;widget&quot;:null,&quot;context&quot;:&quot;{}&quot;,&quot;domain&quot;:&quot;[('category_id', '=', product_uom_category_id)]&quot;,&quot;invisible&quot;:null,&quot;column_invisible&quot;:null,&quot;readonly&quot;:&quot;1&quot;,&quot;required&quot;:&quot;True&quot;,&quot;changeDefault&quot;:false,&quot;relation&quot;:&quot;uom.uom&quot;}}"
                                        style="width: 119px;">
                                        <div class="d-flex"><span
                                                class="d-block min-w-0 text-truncate flex-grow-1">UoM</span><i
                                                class="fa fa-lg fa-angle-down opacity-0 opacity-75-hover"></i></div><span
                                            class="o_resize position-absolute top-0 end-0 bottom-0 ps-1 bg-black-25 opacity-0 opacity-50-hover z-1"></span>
                                    </th>
                                    <th data-tooltip-delay="1000" tabindex="-1" data-name="state"
                                        class="align-middle o_column_sortable position-relative cursor-pointer o_badge_cell opacity-trigger-hover w-print-auto"
                                        data-tooltip-template="web.ListHeaderTooltip"
                                        data-tooltip-info="{&quot;viewMode&quot;:&quot;list&quot;,&quot;resModel&quot;:&quot;mrp.production&quot;,&quot;debug&quot;:false,&quot;field&quot;:{&quot;name&quot;:&quot;state&quot;,&quot;label&quot;:&quot;State&quot;,&quot;help&quot;:&quot; * Draft: The MO is not confirmed yet.\n * Confirmed: The MO is confirmed, the stock rules and the reordering of the components are trigerred.\n * In Progress: The production has started (on the MO or on the WO).\n * To Close: The production is done, the MO has to be closed.\n * Done: The MO is closed, the stock moves are posted. \n * Cancelled: The MO has been cancelled, can't be confirmed anymore.&quot;,&quot;type&quot;:&quot;selection&quot;,&quot;widget&quot;:&quot;badge&quot;,&quot;widgetDescription&quot;:&quot;Badge&quot;,&quot;context&quot;:&quot;{}&quot;,&quot;invisible&quot;:null,&quot;column_invisible&quot;:null,&quot;readonly&quot;:&quot;True&quot;,&quot;required&quot;:null,&quot;changeDefault&quot;:false,&quot;selection&quot;:[[&quot;draft&quot;,&quot;Draft&quot;],[&quot;confirmed&quot;,&quot;Confirmed&quot;],[&quot;progress&quot;,&quot;In Progress&quot;],[&quot;to_close&quot;,&quot;To Close&quot;],[&quot;done&quot;,&quot;Done&quot;],[&quot;cancel&quot;,&quot;Cancelled&quot;]]}}"
                                        style="width: 119px;">
                                        <div class="d-flex"><span
                                                class="d-block min-w-0 text-truncate flex-grow-1">State</span><i
                                                class="fa fa-lg fa-angle-down opacity-0 opacity-75-hover"></i></div><span
                                            class="o_resize position-absolute top-0 end-0 bottom-0 ps-1 bg-black-25 opacity-0 opacity-50-hover z-1"></span>
                                    </th>
                                    <th data-tooltip-delay="1000" tabindex="-1"
                                        data-name="activity_exception_decoration"
                                        class="align-middle cursor-default o_activity_exception_cell opacity-trigger-hover w-print-auto"
                                        data-tooltip-template="web.ListHeaderTooltip"
                                        data-tooltip-info="{&quot;viewMode&quot;:&quot;list&quot;,&quot;resModel&quot;:&quot;mrp.production&quot;,&quot;debug&quot;:false,&quot;field&quot;:{&quot;name&quot;:&quot;activity_exception_decoration&quot;,&quot;label&quot;:&quot;Activity Exception Decoration&quot;,&quot;help&quot;:&quot;Type of the exception activity on record.&quot;,&quot;type&quot;:&quot;selection&quot;,&quot;widget&quot;:&quot;activity_exception&quot;,&quot;context&quot;:&quot;{}&quot;,&quot;invisible&quot;:null,&quot;column_invisible&quot;:null,&quot;readonly&quot;:&quot;True&quot;,&quot;required&quot;:null,&quot;changeDefault&quot;:false,&quot;selection&quot;:[[&quot;warning&quot;,&quot;Alert&quot;],[&quot;danger&quot;,&quot;Error&quot;]]}}"
                                        style="width: 119px;"></th>
                                    <th data-tooltip-delay="1000" tabindex="-1" data-name="json_popover"
                                        class="align-middle cursor-default o_stock_rescheduling_popover_cell opacity-trigger-hover w-print-auto"
                                        data-tooltip-template="web.ListHeaderTooltip"
                                        data-tooltip-info="{&quot;viewMode&quot;:&quot;list&quot;,&quot;resModel&quot;:&quot;mrp.production&quot;,&quot;debug&quot;:false,&quot;field&quot;:{&quot;name&quot;:&quot;json_popover&quot;,&quot;label&quot;:&quot;JSON data for the popover widget&quot;,&quot;type&quot;:&quot;char&quot;,&quot;widget&quot;:&quot;stock_rescheduling_popover&quot;,&quot;context&quot;:&quot;{}&quot;,&quot;invisible&quot;:&quot;not json_popover&quot;,&quot;column_invisible&quot;:null,&quot;readonly&quot;:&quot;True&quot;,&quot;required&quot;:null,&quot;changeDefault&quot;:false}}"
                                        style="width: 119px;"></th>
                                    <th class="o_list_controller o_list_actions_header w-print-0 p-print-0 position-sticky end-0"
                                        style="width: 32px;">
                                        <div class="o_optional_columns_dropdown d-print-none text-center border-top-0">
                                            <button class="btn p-0 o-dropdown dropdown-toggle dropdown" tabindex="-1"
                                                aria-expanded="false"><i
                                                    class="o_optional_columns_dropdown_toggle oi oi-fw oi-settings-adjust"></i></button>
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="ui-sortable">
                                <tr class="o_data_row text-info" data-id="datapoint_2">
                                    <td class="o_list_record_selector user-select-none" tabindex="-1">
                                        <div class="o-checkbox form-check"><input type="checkbox"
                                                class="form-check-input" id="checkbox-comp-2"><label
                                                class="form-check-label" for="checkbox-comp-2"></label></div>
                                    </td>
                                    <td class="o_data_cell cursor-pointer o_field_cell o_priority_cell"
                                        data-tooltip-delay="1000" tabindex="-1" name="priority">
                                        <div name="priority" class="o_field_widget o_field_priority">
                                            <div class="o_priority" role="radiogroup" name="priority"
                                                aria-label="Priority"><a href="#"
                                                    class="o_priority_star fa fa-star-o" role="radio" tabindex="-1"
                                                    data-tooltip="Priority: Urgent" aria-label="Urgent"></a></div>
                                        </div>
                                    </td>
                                    <td class="o_data_cell cursor-pointer o_field_cell o_list_char o_readonly_modifier fw-bold"
                                        data-tooltip-delay="1000" tabindex="-1" name="name"
                                        data-tooltip="WH/MO/00001">WH/MO/00001</td>
                                    <td class="o_data_cell cursor-pointer o_field_cell o_remaining_days_cell o_required_modifier"
                                        data-tooltip-delay="1000" tabindex="-1" name="date_start">
                                        <div name="date_start"
                                            class="o_field_widget o_required_modifier o_field_remaining_days">
                                            <div class="fw-bold text-danger" title="12/08/2024">2 days ago</div>
                                        </div>
                                    </td>
                                    <td class="o_data_cell cursor-pointer o_field_cell o_list_many2one o_required_modifier o_readonly_modifier"
                                        data-tooltip-delay="1000" tabindex="-1" name="product_id"
                                        data-tooltip="[TIPS] Tips">[TIPS] Tips</td>
                                    <td class="o_data_cell cursor-pointer o_field_cell o_list_activity_cell"
                                        data-tooltip-delay="1000" tabindex="-1" name="activity_ids">
                                        <div name="activity_ids" class="o_field_widget o_field_list_activity"><a
                                                class="o-mail-ActivityButton" role="button" aria-label="Show activities"
                                                title="Show activities"><i
                                                    class="fa fa-fw fa-lg text-muted fa-clock-o btn-link text-dark"
                                                    role="img"></i></a><span
                                                class="o-mail-ListActivity-summary"></span></div>
                                    </td>
                                    <td class="o_data_cell cursor-pointer o_field_cell o_list_char"
                                        data-tooltip-delay="1000" tabindex="-1" name="origin" data-tooltip=""></td>
                                    <td class="o_data_cell cursor-pointer o_field_cell o_list_char o_readonly_modifier"
                                        data-tooltip-delay="1000" tabindex="-1" name="components_availability"></td>
                                    <td class="o_data_cell cursor-pointer o_field_cell o_list_number o_required_modifier o_readonly_modifier"
                                        data-tooltip-delay="1000" tabindex="-1" name="product_qty">1.00</td>
                                    <td class="o_data_cell cursor-pointer o_field_cell o_list_many2one o_required_modifier o_readonly_modifier"
                                        data-tooltip-delay="1000" tabindex="-1" name="product_uom_id"
                                        data-tooltip="Units">Units</td>
                                    <td class="o_data_cell cursor-pointer o_field_cell o_badge_cell o_readonly_modifier"
                                        data-tooltip-delay="1000" tabindex="-1" name="state">
                                        <div name="state"
                                            class="o_field_widget o_readonly_modifier o_field_badge text-dark text-muted">
                                            <span class="badge rounded-pill text-bg-muted">Draft</span>
                                        </div>
                                    </td>
                                    <td class="o_data_cell cursor-pointer o_field_cell o_activity_exception_cell o_readonly_modifier"
                                        data-tooltip-delay="1000" tabindex="-1" name="activity_exception_decoration">
                                        <div name="activity_exception_decoration"
                                            class="o_field_widget o_readonly_modifier o_field_empty o_field_activity_exception">
                                        </div>
                                    </td>
                                    <td class="o_data_cell cursor-pointer o_field_cell o_list_char o_stock_rescheduling_popover_cell o_readonly_modifier"
                                        data-tooltip-delay="1000" tabindex="-1" name="json_popover"></td>
                                    <td tabindex="-1" class="w-print-0 p-print-0"></td>
                                </tr>
                            </tbody>
                            <tfoot class="o_list_footer cursor-default">
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="o_list_number"><span data-tooltip="Total Qty">1.00</span></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="w-print-0 p-print-0"></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="o-main-components-container">
            <div class="o-discuss-CallInvitations position-absolute top-0 end-0 d-flex flex-column p-2"></div>
            <div class="o-mail-ChatHub">
                <div class="o-mail-ChatHub-bubbles position-fixed end-0 d-flex flex-column align-content-start justify-content-end align-items-center bottom-0"
                    style="">
                    <div class="d-flex flex-column align-content-start justify-content-end align-items-center gap-1"></div>
                </div>
            </div>
            <div class="o-overlay-container">
                <div class="o-overlay-item operation-dropdown" style="display: none;">
                    <div class="o_popover popover mw-100 o-dropdown--menu dropdown-menu mx-0" role="menu"
                        style="position: fixed; top: 59.9943px; left: 166.69px;">
                        <a class="o-dropdown-item dropdown-item o-navigable focus" role="menuitem" tabindex="0"
                            style="padding-left: 20px;" href="/odoo/manufacturing"
                            data-menu-xmlid="mrp.menu_mrp_production_action" data-section="538">Manufacturing Orders</a>
                        <a class="o-dropdown-item dropdown-item o-navigable" role="menuitem" tabindex="0"
                            style="padding-left: 20px;" href="/odoo/action-811" data-menu-xmlid="mrp.menu_mrp_unbuild"
                            data-section="545">Unbuild Orders</a>
                        <a class="o-dropdown-item dropdown-item o-navigable" role="menuitem" tabindex="0"
                            style="padding-left: 20px;" href="/odoo/action-690" data-menu-xmlid="mrp.menu_mrp_scrap"
                            data-section="533">Scrap</a>
                    </div>
                </div>

                <div class="o-overlay-item product-dropdown" style="display: none;">
                    <div class="o_popover popover mw-100 o-dropdown--menu dropdown-menu mx-0" role="menu"
                        style="position: fixed; top: 59.9943px; left: 256.42px;">
                        <a class="o-dropdown-item dropdown-item o-navigable focus" role="menuitem" tabindex="0"
                            style="padding-left: 20px;" href="/odoo/action-807"
                            data-menu-xmlid="mrp.menu_mrp_product_form" data-section="542">Products</a>
                        <a class="o-dropdown-item dropdown-item o-navigable" role="menuitem" tabindex="0"
                            style="padding-left: 20px;" href="/odoo/action-789"
                            data-menu-xmlid="mrp.menu_mrp_bom_form_action" data-section="537">Bills of Materials</a>
                    </div>
                </div>

                <div class="o-overlay-item"></div>
                <div class="o-overlay-item"></div>
                <div class="o-overlay-item"></div>
                <div class="o-overlay-item"></div>
                <div class="o-overlay-item"></div>
                <div class="o-overlay-item"></div>
                <div class="o-overlay-item"></div>
                <div class="o-overlay-item"></div>
                <div class="o-overlay-item"></div>
                <div class="o-overlay-item"></div>
                <div class="o-overlay-item"></div>
                <div class="o-overlay-item"></div>
                <div class="o-overlay-item"></div>
            </div>
            <div></div>
            <div class="o_notification_manager o_upload_progress_toast"></div>
            <div class="o_notification_manager"></div>
        </div>
    </body>

@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js">
    </script>
    

    <script>
        $(document).ready(function() {
            $('#manufacturingDatatable').DataTable({
                "pageLength": 10,
                responsive: true,
                "processing": true,
            });
        });
    </script>


    <script>
        $(document).ready(function() {
            $('#operations-link').on('click', function(event) {
                event.preventDefault();
                $('.operation-dropdown').toggle();
            });

            $('#product-link').on('click', function(event) {
                console.log('yes');
                event.preventDefault();
                $('.product-dropdown').toggle();
            });

            $(document).on('click', function(event) {
                var $target = $(event.target);

                if (!$target.closest('#operations-link').length && !$target.closest('.operation-dropdown')
                    .length) {
                    $('.operation-dropdown').hide();
                }

                if (!$target.closest('#product-link').length && !$target.closest('.product-dropdown')
                    .length) {
                    $('.product-dropdown').hide();
                }
            });
        });
    </script>
@endpush
