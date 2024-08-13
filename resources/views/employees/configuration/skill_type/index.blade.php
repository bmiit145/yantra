@extends('layout.header')

@section('title', 'Employee')
@section('head_title_link', route('employee.index'))
@section('image_url', asset('images/Employees.png'))
@section('head_new_btn_link', route('skill.add' , ['skill' => 'new']))
@section('save_class', 'save_contacts')
@section('head_breadcrumb_title', 'Skill Types')
@section('head')
@vite(['resources/css/odoo/web.assets_web.css', 'resources/css/contactcreate.css'])
@endsection
@section('navbar_menu')
<li><a href="{{ route('employee.index') }}">Employees</a></li>
<li><a href="#"></a>Departments</li>
<li><a href="#"></a>Reporting</li>
<li><a href="#" id="configLink">Configuration</a></li>

<div id="dropdownMenu" class="o_popover popover mw-100 o-dropdown--menu dropdown-menu mx-0" role="menu" style="display: none; position: absolute;">
    <a class="o-dropdown-item dropdown-item o-navigable" role="menuitem" tabindex="0" style="padding-left: 20px;" href="/odoo/action-440" data-menu-xmlid="hr.hr_menu_configuration" data-section="310">Settings</a>
    <a class="o-dropdown-item dropdown-item o-navigable" role="menuitem" tabindex="0" style="padding-left: 20px;" href="/odoo/action-425" data-menu-xmlid="hr.menu_config_plan_plan" data-section="299">Activity Plan</a>
    <div class="dropdown-menu_group dropdown-header" style="padding-left: 20px;">Employee</div>
    <a class="o-dropdown-item dropdown-item o-navigable o_dropdown_menu_group_entry focus" role="menuitem" tabindex="0" style="padding-left: 32px;" href="/odoo/action-437" data-menu-xmlid="hr.menu_hr_department_tree" data-section="301">Departments</a>
    <a class="o-dropdown-item dropdown-item o-navigable o_dropdown_menu_group_entry" role="menuitem" tabindex="0" style="padding-left: 32px;" href="/odoo/action-439" data-menu-xmlid="hr.menu_hr_work_location_tree" data-section="303">Work Locations</a>
    <a class="o-dropdown-item dropdown-item o-navigable o_dropdown_menu_group_entry" role="menuitem" tabindex="0" style="padding-left: 32px;" href="/odoo/action-98" data-menu-xmlid="hr.menu_resource_calendar_view" data-section="304">Working Schedules</a>
    <a class="o-dropdown-item dropdown-item o-navigable o_dropdown_menu_group_entry" role="menuitem" tabindex="0" style="padding-left: 32px;" href="/odoo/action-427" data-menu-xmlid="hr.menu_hr_departure_reason_tree" data-section="305">Departure Reasons</a>

    <a class="o-dropdown-item dropdown-item o-navigable o_dropdown_menu_group_entry" role="menuitem" tabindex="0" style="padding-left: 32px;" href="{{ route('skill.view') }}" data-menu-xmlid="hr_skills.hr_skill_type_menu" data-section="341">Skill Types</a>

    <div class="dropdown-menu_group dropdown-header" style="padding-left: 20px;">Recruitment</div>
    <a class="o-dropdown-item dropdown-item o-navigable o_dropdown_menu_group_entry" role="menuitem" tabindex="0" style="padding-left: 32px;" href="/odoo/action-429" data-menu-xmlid="hr.menu_view_hr_job" data-section="308">Job Positions</a>
    <a class="o-dropdown-item dropdown-item o-navigable o_dropdown_menu_group_entry" role="menuitem" tabindex="0" style="padding-left: 32px;" href="/odoo/action-428" data-menu-xmlid="hr.menu_view_hr_contract_type" data-section="309">Employment Types</a>
    <div class="dropdown-menu_group dropdown-header" style="padding-left: 20px;">Challenges</div>
    <a class="o-dropdown-item dropdown-item o-navigable o_dropdown_menu_group_entry" role="menuitem" tabindex="0" style="padding-left: 32px;" href="/odoo/action-417" data-menu-xmlid="hr_gamification.gamification_badge_menu_hr" data-section="335">Badges</a>
    <a class="o-dropdown-item dropdown-item o-navigable o_dropdown_menu_group_entry" role="menuitem" tabindex="0" style="padding-left: 32px;" href="/odoo/action-465" data-menu-xmlid="hr_gamification.gamification_challenge_menu_hr" data-section="336">Challenges</a>
    <a class="o-dropdown-item dropdown-item o-navigable o_dropdown_menu_group_entry" role="menuitem" tabindex="0" style="padding-left: 32px;" href="/odoo/action-464" data-menu-xmlid="hr_gamification.gamification_goal_menu_hr" data-section="337">Goals History</a>
</div>

@endsection

@section('content')

<body class="o_web_client">

    {{-- <header class="o_navbar">
        <nav class="o_main_navbar d-print-none" data-command-category="disabled"><a href="/odoo" class="o_menu_toggle hasImage" accesskey="h" title="Home menu" aria-label="Home menu"><svg xmlns="http://www.w3.org/2000/svg" class="o_menu_toggle_icon pe-none" width="14px" height="14px" viewBox="0 0 14 14">
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
                </svg><img class="o_menu_brand_icon d-inline position-absolute start-0 h-100 ps-1 ms-2" src="data:image/png;base64,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" alt="Employees"><span class="o_menu_brand d-flex ms-3 pe-0">Employees</span></a>
            <div class="o_menu_sections d-flex flex-grow-1 flex-shrink-1 w-0" role="menu"><button class="fw-normal o-dropdown dropdown-toggle dropdown" data-hotkey="1" data-menu-xmlid="hr.menu_hr_employee_payroll" aria-expanded="false"><span data-section="293">Employees</span></button><a class="o-dropdown-item dropdown-item o-navigable o_nav_entry" role="menuitem" tabindex="0" href="/odoo/departments" data-hotkey="2" data-menu-xmlid="hr.menu_hr_department_kanban" data-section="302">Departments</a><button class="fw-normal o-dropdown dropdown-toggle dropdown" data-hotkey="3" data-menu-xmlid="hr.hr_menu_hr_reports" aria-expanded="false"><span data-section="296">Reporting</span></button><button class="fw-normal o-dropdown dropdown-toggle dropdown" data-hotkey="4" data-menu-xmlid="hr.menu_human_resources_configuration" aria-expanded="false"><span data-section="298">Configuration</span></button></div>
            <div class="o_menu_systray d-flex flex-shrink-0 ms-auto" role="menu">
                <div></div>
                <div></div>
                <div class="dropdown"></div>
                <div></div>
                <div></div>
                <div class="o-mail-DiscussSystray-class"><button aria-expanded="false" class="o-dropdown dropdown-toggle dropdown"><i class="fa fa-lg fa-comments" role="img" aria-label="Messages"></i><span class="o-mail-MessagingMenu-counter badge rounded-pill">7</span></button></div>
                <div></div><button aria-expanded="false" class="o-dropdown dropdown-toggle dropdown"><i class="fa fa-lg fa-clock-o" role="img" aria-label="Activities"></i></button>
                <div></div>
                <div></div>
                <div class="o_switch_company_menu d-none d-md-block"><button data-hotkey="shift+u" disabled="" title="Yantra Design" aria-expanded="false" class="o-dropdown dropdown-toggle dropdown"><i class="fa fa-building d-lg-none"></i><span class="oe_topbar_name d-none d-lg-block text-truncate">Yantra Design</span></button></div>
                <div></div>
                <div class="d-flex" xml:space="preserve"><button class="o_mobile_menu_toggle o_nav_entry o-no-caret d-md-none border-0 pe-3" title="Toggle menu" aria-label="Toggle menu"><i class="oi oi-panel-right"></i></button></div>
                <div></div>
                <div class="o_user_menu d-none d-md-block pe-0"><button class="py-1 py-lg-0 o-dropdown dropdown-toggle dropdown" aria-expanded="false"><img class="o_avatar o_user_avatar rounded" alt="User" src="https://yantra-design2.odoo.com/web/image/res.partner/3/avatar_128?unique=1722989906000"><small class="oe_topbar_name d-none ms-2 text-start smaller lh-1 text-truncate" style="max-width: 200px">info@yantradesign.co.in<mark class="d-block font-monospace text-truncate"><i class="fa fa-database oi-small me-1"></i>yantra-design2</mark></small></button></div>
            </div>
        </nav>
    </header>  --}}

    <div class="o_action_manager">
        <div class="o_list_view o_view_controller o_action">

            {{-- <div class="o_control_panel d-flex flex-column gap-3 px-3 pt-2 pb-3" data-command-category="actions">
                <div class="o_control_panel_main d-flex flex-wrap flex-lg-nowrap justify-content-between align-items-lg-start gap-3 flex-grow-1">
                    <div class="o_control_panel_breadcrumbs d-flex align-items-center gap-1 order-0 h-lg-100">
                        <div class="o_control_panel_main_buttons d-flex gap-1 d-empty-none d-print-none">
                            <div class="d-inline-flex gap-1"><button type="button" class="btn btn-primary o_list_button_add" data-hotkey="c" data-bounce-button=""> New </button>
                                <div class="o_list_buttons d-flex gap-1 d-empty-none align-items-baseline" role="toolbar" aria-label="Main actions"></div>
                            </div>
                        </div>
                        <div class="o_breadcrumb d-flex gap-1 text-truncate">
                            <div class="o_last_breadcrumb_item active d-flex fs-4 min-w-0 align-items-center"><span class="min-w-0 text-truncate">Skill Types</span></div>
                            <div class="o_control_panel_breadcrumbs_actions d-inline-flex d-print-none">
                                <div class="o_cp_action_menus d-flex align-items-center pe-2 gap-1">
                                    <div class="lh-1"><button class="d-print-none btn p-0 ms-1 lh-sm border-0 o-dropdown dropdown-toggle dropdown" data-hotkey="u" data-tooltip="Actions" aria-expanded="false"><i class="fa fa-cog"></i></button></div>
                                </div>
                            </div>
                        </div>
                        <div class="me-auto"></div>
                    </div>
                    <div class="o_control_panel_actions d-empty-none d-flex align-items-center justify-content-start justify-content-lg-around order-2 order-lg-1 w-100 w-lg-auto">
                        <div class="o_cp_searchview d-flex input-group" role="search">
                            <div class="o_searchview form-control d-print-contents d-flex align-items-center py-1 border-end-0" role="search" aria-autocomplete="list"><button class="d-print-none btn border-0 p-0" role="button" aria-label="Search..." title="Search..."><i class="o_searchview_icon oi oi-search me-2" role="img"></i></button>
                                <div class="o_searchview_input_container d-flex flex-grow-1 flex-wrap gap-1"><input type="text" class="o_searchview_input o_input d-print-none flex-grow-1 w-auto border-0" accesskey="Q" placeholder="Search..." role="searchbox"></div>
                            </div><button class="o_searchview_dropdown_toggler d-print-none btn btn-outline-secondary o-dropdown-caret rounded-start-0 o-dropdown dropdown-toggle dropdown" data-hotkey="shift+q" title="Toggle Search Panel" aria-expanded="false"></button>
                        </div>
                    </div>
                    <div class="o_control_panel_navigation d-flex flex-wrap flex-md-nowrap justify-content-end gap-1 gap-xl-3 order-1 order-lg-2 flex-grow-1">
                        <div class="o_cp_pager text-nowrap " role="search">
                            <nav class="o_pager d-flex gap-2 h-100" aria-label="Pager"><span class="o_pager_counter align-self-center"><span class="o_pager_value d-inline-block border-bottom border-transparent mb-n1">1-3</span><span> / </span><span class="o_pager_limit">3</span></span><span class="btn-group d-print-none" aria-atomic="true"><button type="button" class="oi oi-chevron-left btn btn-secondary o_pager_previous px-2 rounded-start" aria-label="Previous" data-tooltip="Previous" tabindex="-1" data-hotkey="p" disabled=""></button><button type="button" class="oi oi-chevron-right btn btn-secondary o_pager_next px-2 rounded-end" aria-label="Next" data-tooltip="Next" tabindex="-1" data-hotkey="n" disabled=""></button></span></nav>
                        </div>
                    </div>
                </div>
            </div>  --}}

            <div class="o_content">
                <div class="o_list_renderer o_renderer table-responsive" tabindex="-1">
                    <table class="o_list_table table table-sm table-hover position-relative mb-0 o_list_table_ungrouped table-striped" style="table-layout: fixed;">
                        <thead>
                            <tr>
                                <th class="o_list_record_selector o_list_controller align-middle pe-1 cursor-pointer" tabindex="-1" style="width: 40px;">
                                    <div class="o-checkbox form-check d-flex m-0"><input type="checkbox" class="form-check-input" id="checkbox-comp-1"><label class="form-check-label" for="checkbox-comp-1"></label></div>
                                </th>
                                <th data-tooltip-delay="1000" tabindex="-1" data-name="name" class="align-middle o_column_sortable position-relative cursor-pointer opacity-trigger-hover w-print-auto" data-tooltip-template="web.ListHeaderTooltip" data-tooltip-info="{&quot;viewMode&quot;:&quot;list&quot;,&quot;resModel&quot;:&quot;hr.skill.type&quot;,&quot;debug&quot;:false,&quot;field&quot;:{&quot;name&quot;:&quot;name&quot;,&quot;label&quot;:&quot;Name&quot;,&quot;type&quot;:&quot;char&quot;,&quot;widget&quot;:null,&quot;context&quot;:&quot;{}&quot;,&quot;invisible&quot;:null,&quot;column_invisible&quot;:null,&quot;readonly&quot;:null,&quot;required&quot;:&quot;True&quot;,&quot;changeDefault&quot;:false}}" style="width: 344px;">
                                    <div class="d-flex"><span class="d-block min-w-0 text-truncate flex-grow-1">Name</span><i class="fa fa-lg fa-angle-down opacity-0 opacity-75-hover"></i></div><span class="o_resize position-absolute top-0 end-0 bottom-0 ps-1 bg-black-25 opacity-0 opacity-50-hover z-1"></span>
                                </th>
                                <th data-tooltip-delay="1000" tabindex="-1" data-name="color" class="align-middle o_column_sortable position-relative cursor-pointer o_list_number_th o_color_picker_cell opacity-trigger-hover w-print-auto" data-tooltip-template="web.ListHeaderTooltip" data-tooltip-info="{&quot;viewMode&quot;:&quot;list&quot;,&quot;resModel&quot;:&quot;hr.skill.type&quot;,&quot;debug&quot;:false,&quot;field&quot;:{&quot;name&quot;:&quot;color&quot;,&quot;label&quot;:&quot;Color&quot;,&quot;type&quot;:&quot;integer&quot;,&quot;widget&quot;:&quot;color_picker&quot;,&quot;context&quot;:&quot;{}&quot;,&quot;invisible&quot;:null,&quot;column_invisible&quot;:null,&quot;readonly&quot;:null,&quot;required&quot;:null,&quot;changeDefault&quot;:false}}" style="width: 252px;">
                                    <div class="d-flex flex-row-reverse"><span class="d-block min-w-0 text-truncate flex-grow-1 o_list_number_th">Color</span><i class="fa fa-lg fa-angle-down opacity-0 opacity-75-hover"></i></div><span class="o_resize position-absolute top-0 end-0 bottom-0 ps-1 bg-black-25 opacity-0 opacity-50-hover z-1"></span>
                                </th>
                                <th data-tooltip-delay="1000" tabindex="-1" data-name="skill_ids" class="align-middle cursor-default o_many2many_tags_cell opacity-trigger-hover w-print-auto" data-tooltip-template="web.ListHeaderTooltip" data-tooltip-info="{&quot;viewMode&quot;:&quot;list&quot;,&quot;resModel&quot;:&quot;hr.skill.type&quot;,&quot;debug&quot;:false,&quot;field&quot;:{&quot;name&quot;:&quot;skill_ids&quot;,&quot;label&quot;:&quot;Skills&quot;,&quot;type&quot;:&quot;one2many&quot;,&quot;widget&quot;:&quot;many2many_tags&quot;,&quot;widgetDescription&quot;:&quot;Tags&quot;,&quot;context&quot;:&quot;{}&quot;,&quot;domain&quot;:[],&quot;invisible&quot;:null,&quot;column_invisible&quot;:null,&quot;readonly&quot;:null,&quot;required&quot;:null,&quot;changeDefault&quot;:false,&quot;relation&quot;:&quot;hr.skill&quot;}}" style="width: 592px;">
                                    <div class="d-flex"><span class="d-block min-w-0 text-truncate flex-grow-1">Skills</span><i class="d-none fa-angle-down opacity-0 opacity-75-hover"></i></div><span class="o_resize position-absolute top-0 end-0 bottom-0 ps-1 bg-black-25 opacity-0 opacity-50-hover z-1"></span>
                                </th>
                                <th data-tooltip-delay="1000" tabindex="-1" data-name="skill_level_ids" class="align-middle cursor-default o_many2many_tags_skills_cell opacity-trigger-hover w-print-auto" data-tooltip-template="web.ListHeaderTooltip" data-tooltip-info="{&quot;viewMode&quot;:&quot;list&quot;,&quot;resModel&quot;:&quot;hr.skill.type&quot;,&quot;debug&quot;:false,&quot;field&quot;:{&quot;name&quot;:&quot;skill_level_ids&quot;,&quot;label&quot;:&quot;Levels&quot;,&quot;type&quot;:&quot;one2many&quot;,&quot;widget&quot;:&quot;many2many_tags_skills&quot;,&quot;widgetDescription&quot;:&quot;Tags&quot;,&quot;context&quot;:&quot;{}&quot;,&quot;domain&quot;:[],&quot;invisible&quot;:null,&quot;column_invisible&quot;:null,&quot;readonly&quot;:null,&quot;required&quot;:null,&quot;changeDefault&quot;:false,&quot;relation&quot;:&quot;hr.skill.level&quot;}}" style="width: 658px;">
                                    <div class="d-flex"><span class="d-block min-w-0 text-truncate flex-grow-1">Levels</span><i class="d-none fa-angle-down opacity-0 opacity-75-hover"></i></div><span class="o_resize position-absolute top-0 end-0 bottom-0 ps-1 bg-black-25 opacity-0 opacity-50-hover z-1"></span>
                                </th>
                                <th class="o_list_controller o_list_actions_header w-print-0 p-print-0 position-sticky end-0" style="width: 32px;">
                                    <div class="o_optional_columns_dropdown d-print-none text-center border-top-0"><button class="btn p-0 o-dropdown dropdown-toggle dropdown" tabindex="-1" aria-expanded="false"><i class="o_optional_columns_dropdown_toggle oi oi-fw oi-settings-adjust"></i></button></div>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="ui-sortable">
                            <tr class="o_data_row" data-id="datapoint_2">
                                <td class="o_list_record_selector user-select-none" tabindex="-1">
                                    <div class="o-checkbox form-check"><input type="checkbox" class="form-check-input" id="checkbox-comp-2"><label class="form-check-label" for="checkbox-comp-2"></label></div>
                                </td>
                                <td class="o_data_cell cursor-pointer o_field_cell o_list_char o_required_modifier" data-tooltip-delay="1000" tabindex="-1" name="name" data-tooltip="Languages">Languages</td>
                                <td class="o_data_cell cursor-pointer o_field_cell o_list_number o_color_picker_cell" data-tooltip-delay="1000" tabindex="-1" name="color">
                                    <div name="color" class="o_field_widget o_field_color_picker">
                                        <div class="o_colorlist d-flex flex-wrap align-items-center mw-100 gap-2" aria-atomic="true"><button role="menuitem" title="Teal" data-color="7" aria-label="Teal" class="btn p-0 rounded-0 o_colorlist_toggler o_colorlist_item_color_7"></button></div>
                                    </div>
                                </td>
                                <td class="o_data_cell cursor-pointer o_field_cell o_many2many_tags_cell" data-tooltip-delay="1000" tabindex="-1" name="skill_ids">
                                    <div name="skill_ids" class="o_field_widget o_field_many2many_tags">
                                        <div class="o_field_tags d-inline-flex flex-wrap gap-1 mw-100"></div>
                                    </div>
                                </td>
                                <td class="o_data_cell cursor-pointer o_field_cell o_many2many_tags_skills_cell" data-tooltip-delay="1000" tabindex="-1" name="skill_level_ids">
                                    <div name="skill_level_ids" class="o_field_widget o_field_many2many_tags_skills">
                                        <div class="o_field_tags d-inline-flex flex-wrap gap-1 mw-100"></div>
                                    </div>
                                </td>
                                <td tabindex="-1" class="w-print-0 p-print-0"></td>
                            </tr>
                            <tr class="o_data_row" data-id="datapoint_5">
                                <td class="o_list_record_selector user-select-none" tabindex="-1">
                                    <div class="o-checkbox form-check"><input type="checkbox" class="form-check-input" id="checkbox-comp-3"><label class="form-check-label" for="checkbox-comp-3"></label></div>
                                </td>
                                <td class="o_data_cell cursor-pointer o_field_cell o_list_char o_required_modifier" data-tooltip-delay="1000" tabindex="-1" name="name" data-tooltip="designer 1">designer 1</td>
                                <td class="o_data_cell cursor-pointer o_field_cell o_list_number o_color_picker_cell" data-tooltip-delay="1000" tabindex="-1" name="color">
                                    <div name="color" class="o_field_widget o_field_color_picker">
                                        <div class="o_colorlist d-flex flex-wrap align-items-center mw-100 gap-2" aria-atomic="true"><button role="menuitem" title="Yellow" data-color="3" aria-label="Yellow" class="btn p-0 rounded-0 o_colorlist_toggler o_colorlist_item_color_3"></button></div>
                                    </div>
                                </td>
                                <td class="o_data_cell cursor-pointer o_field_cell o_many2many_tags_cell" data-tooltip-delay="1000" tabindex="-1" name="skill_ids">
                                    <div name="skill_ids" class="o_field_widget o_field_many2many_tags">
                                        <div class="o_field_tags d-inline-flex flex-wrap gap-1 mw-100"><span class="o_tag position-relative d-inline-flex align-items-center user-select-none mw-100 o_badge badge rounded-pill lh-1 o_tag_color_3" tabindex="-1" data-color="3" title="skills 1">
                                                <div class="o_tag_badge_text text-truncate">skills 1</div>
                                            </span><span class="o_tag position-relative d-inline-flex align-items-center user-select-none mw-100 o_badge badge rounded-pill lh-1 o_tag_color_3" tabindex="-1" data-color="3" title="skills 2">
                                                <div class="o_tag_badge_text text-truncate">skills 2</div>
                                            </span></div>
                                    </div>
                                </td>
                                <td class="o_data_cell cursor-pointer o_field_cell o_many2many_tags_skills_cell" data-tooltip-delay="1000" tabindex="-1" name="skill_level_ids">
                                    <div name="skill_level_ids" class="o_field_widget o_field_many2many_tags_skills">
                                        <div class="o_field_tags d-inline-flex flex-wrap gap-1 mw-100"><span class="o_tag position-relative d-inline-flex align-items-center user-select-none mw-100 o_badge badge rounded-pill lh-1 o_tag_color_0" tabindex="-1" title="levels 2" style="">
                                                <div class="o_tag_badge_text text-truncate">levels 2</div>
                                            </span><span class="o_tag position-relative d-inline-flex align-items-center user-select-none mw-100 o_badge badge rounded-pill lh-1 o_tag_color_0 border border-2" tabindex="-1" title="levels 1" style="border-color: rgb(140, 140, 140) !important ;">
                                                <div class="o_tag_badge_text text-truncate fw-bold">levels 1</div>
                                            </span></div>
                                    </div>
                                </td>
                                <td tabindex="-1" class="w-print-0 p-print-0"></td>
                            </tr>
                            <tr class="o_data_row" data-id="datapoint_12">
                                <td class="o_list_record_selector user-select-none" tabindex="-1">
                                    <div class="o-checkbox form-check"><input type="checkbox" class="form-check-input" id="checkbox-comp-4"><label class="form-check-label" for="checkbox-comp-4"></label></div>
                                </td>
                                <td class="o_data_cell cursor-pointer o_field_cell o_list_char o_required_modifier" data-tooltip-delay="1000" tabindex="-1" name="name" data-tooltip="xs">xs</td>
                                <td class="o_data_cell cursor-pointer o_field_cell o_list_number o_color_picker_cell" data-tooltip-delay="1000" tabindex="-1" name="color">
                                    <div name="color" class="o_field_widget o_field_color_picker">
                                        <div class="o_colorlist d-flex flex-wrap align-items-center mw-100 gap-2" aria-atomic="true"><button role="menuitem" title="Red" data-color="1" aria-label="Red" class="btn p-0 rounded-0 o_colorlist_toggler o_colorlist_item_color_1"></button></div>
                                    </div>
                                </td>
                                <td class="o_data_cell cursor-pointer o_field_cell o_many2many_tags_cell" data-tooltip-delay="1000" tabindex="-1" name="skill_ids">
                                    <div name="skill_ids" class="o_field_widget o_field_many2many_tags">
                                        <div class="o_field_tags d-inline-flex flex-wrap gap-1 mw-100"><span class="o_tag position-relative d-inline-flex align-items-center user-select-none mw-100 o_badge badge rounded-pill lh-1 o_tag_color_1" tabindex="-1" data-color="1" title="zs">
                                                <div class="o_tag_badge_text text-truncate">zs</div>
                                            </span><span class="o_tag position-relative d-inline-flex align-items-center user-select-none mw-100 o_badge badge rounded-pill lh-1 o_tag_color_1" tabindex="-1" data-color="1" title="sx">
                                                <div class="o_tag_badge_text text-truncate">sx</div>
                                            </span><span class="o_tag position-relative d-inline-flex align-items-center user-select-none mw-100 o_badge badge rounded-pill lh-1 o_tag_color_1" tabindex="-1" data-color="1" title="sx">
                                                <div class="o_tag_badge_text text-truncate">sx</div>
                                            </span></div>
                                    </div>
                                </td>
                                <td class="o_data_cell cursor-pointer o_field_cell o_many2many_tags_skills_cell" data-tooltip-delay="1000" tabindex="-1" name="skill_level_ids">
                                    <div name="skill_level_ids" class="o_field_widget o_field_many2many_tags_skills">
                                        <div class="o_field_tags d-inline-flex flex-wrap gap-1 mw-100"><span class="o_tag position-relative d-inline-flex align-items-center user-select-none mw-100 o_badge badge rounded-pill lh-1 o_tag_color_0" tabindex="-1" title="x" style="">
                                                <div class="o_tag_badge_text text-truncate">x</div>
                                            </span></div>
                                    </div>
                                </td>
                                <td tabindex="-1" class="w-print-0 p-print-0"></td>
                            </tr>
                            <tr>
                                <td colspan="6">​</td>
                            </tr>
                        </tbody>
                        <tfoot class="o_list_footer cursor-default">
                            <tr>
                                <td></td>
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
            <div class="o-mail-ChatHub-bubbles position-fixed end-0 d-flex flex-column align-content-start justify-content-end align-items-center bottom-0" style="">
                <div class="d-flex flex-column align-content-start justify-content-end align-items-center gap-1"></div>
            </div>
        </div>
        <div class="o-overlay-container">
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
            <div class="o-overlay-item"></div>
            <div class="o-overlay-item"></div>
        </div>
        <div></div>
        <div class="o_notification_manager o_upload_progress_toast"></div>
        <div class="o_notification_manager"></div>
    </div>
</body>

@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

@push('scripts')
     {{-- CONFIGURATION SECTION STRAT --}}
    <script>
        $(document).ready(function() {
            $('#configLink').click(function(e) {
                e.preventDefault(); // Prevent the default action

                // Get the position of the li element
                var position = $(this).parent().offset();

                // Set the position of the dropdown relative to the li
                $('#dropdownMenu').css({
                    top: position.top + $(this).outerHeight(), // Below the li
                    left: position.left
                }).toggle(); // Toggle visibility
            });

            // Optional: Hide the dropdown if clicking outside of it
            $(document).click(function(e) {
                if (!$(e.target).closest('#configLink, #dropdownMenu').length) {
                    $('#dropdownMenu').hide();
                }
            });
        });

    </script>
@endpush