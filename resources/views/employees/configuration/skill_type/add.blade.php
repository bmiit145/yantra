@extends('layout.header')

@section('title', 'Employee')
@section('head_title_link', route('employee.index'))
@section('image_url', asset('images/employees.png'))
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

@section('header_left_side_extra')
<a href="{{ route('skill.view') }}" type="button" class="o_form_button_cancel btn btn-light px-1 py-0 lh-sm" data-hotkey="j" data-tooltip="Discard all changes" aria-label="Discard all changes"><i class="fa fa-times fa-fw"></i></a>
@endsection

@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}">

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
                    </svg><img class="o_menu_brand_icon d-inline position-absolute start-0 h-100 ps-1 ms-2" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGQAAABkCAYAAABw4pVUAAAACXBIWXMAABYlAAAWJQFJUiTwAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAfISURBVHgB7ZtPbBRVHMd/b2Z2FwriVjS0cmBLQjDRSpeQgJrAbkH+XOw2MeFgIsUL9KLlqtJ/+Ocm7an1oJV48Nj2VEwJLSfkYHYTNP5JtNsE7BIhXRBays7Oz9+bKVCt6c7sdue9wfdJpttNZ7sz7zu/93u/Pw9AoVAoFAqFQqFQKBQKhUKhUCgUCoXiyYZBwBhIdccYhFpAs5oAtQQCRukmovxvCJDXALLIIAsWm0QojLaPdGchQARGkIFUbxtj2jH6NeHlc3SDaRKu/8TI++cgAEgvyEDqTIKEGKLnPwYVgVMM9R7ZhZFWkKFUd/SBZnQhQgesJgzORiyz9/hIdx4kREpBuJ/QmDFMPqEJqgJOIRabZfQv0gliO20Wmqh8iiqFnKJIJQifphZYKF19MRy4ww+j2SzT9KWBRHCf4ZcYHJoS4wua0QkSIY2FLC5rh8B/kKCp6/QkSIA0FsKY3gViYIzBlyAJUgjCrcPPqWo5LPZ56pNjIAFyWAjT3gOxMGSWFIII9yHOMteYAvGQKzG3il4GC7cQBCMFkqBJcC3CBdE12AdywFDDl0EwwgWxEGIgC+gtk1wNZHDqMZAEBiwKghEuyMPikgygBNciVepEIcUqC6RJ7DEJrkX8lIVMGkEsqseDYCSwEOsSyALCNAhGAkFYBuQAaTCEPxwSrLLMEZAES4Jr8ZzLKowdSCBjKUpat7DHGdoMpbAzelHvYUfOZ8Ejg60fUclWbFBGi4t0+/CHO718pi49zl8SzEBKuWiPx4PGgn5krILek4sns+ABw+2JOJyImjVhXtHrcFTEpX9uQoQmUyu2FcYP9hl3H/Sw1knXzhrROkfFqQSIg7ImWr/bk6PpCftF180uZLwrho/IkvFA3pyBTZphttX/MH52vmD05uNJV+PhykIcMXjjgesukIwxV0h6EWWw9eMpcTURnDo5fHqrmzMXxaitCZkXnYF3AYP0XMFodiOKKx/iWIanlpwmc33YUwWQrOQ4iAF5A53bk9fpJqOj07UY9jdAfG3IdFW7L2kh82OHY4ZWLK9eYWEydOTCpNvTB1Nn+sg3+VusQuw7OXL6lJtT6xzraKCp6HfwDlKc05xrfH1ypZNKWoiumd1QJrbz98A8FLtpJvZxGYxTESi6tg6mF6j0Xyi39k/rHmwpdVJJQciEdkCZaAxKXsBSTvH+KDRb6VuzUHWcRjkvPVmMboiOsseDFi6VC0L/pux2Tiwjtc5LqIiFZDVF4Q1yZXUtIoAn37Hs86UXLVJme/lAzWMhTjfgeinqGvIZvFtR1n0jJeMQSm1kWbnLUVa+PzjlTCUdA6nejNOzVfl2BIqV3qmoIY68AA1ItoJrKTkepS0Ei6NQJsyq3EG3j3R+dXL4gwa+LKYB9f7/ECapWN7G44xKuxNZ0aJ7ssoeDxK05PWXXPbyVAl55wkoA8PSG8pJpazE4y1tmKB1ZIzuILZkS9usnc7XKINsaZnV3tJWd9VJldBTXM54oGWaW3PxI9mVTnIVqRfO7+/z3MyG0B86PL66m20kYPPVC3zMziKgl/Eg48b+mcaDJeMdV07diBS7ge/Vc0/amC90wxNIyNSRDh67uJ0+yXAxPW/ecxXvuBKEJSfzRrjQTEbXB//KKi77coQ+ymM1e8ljBYlsPMlfZsOmkaSohK8CVxwPbhlz5r39+Xjr6iUXl8JTKTqYXUzjAaMToyAvfRZhlDEc9ZIqCTp16TH+EmO63sWYHTAujgePoaxReh0tlSpRKBSKALPMh1DcwbO0jEelbEV/5Y4vBsX0UuejEfvI1dfAjboayMY2wO3aCEgBc35QiRdzziLhEY9SJ1QV5IUoOstK0NuWxSMGimqQWTx6qcSbpRIv5heFsbXiYtBvtebacCevmcMq8vXQa/BgwXXpvqrkyFKuvFInlbVQTb6P19zp11kuijNSDKLm2tBFXpiHVSYSNqURpC43By3DTrEv0/QcXEpuFi4MQ+ig+vw+XnOnt3md4gqAsPYpvanK7qGZP6JwO18DssHF2fNdDvjTON2wAQRTb+jWmvXtb3/LI/XYak9TS1n/1H2QmX0T1+DdzzLw9OwCiIQshefGElolNXM3bHz2HshONL8AJwauwvafZkEgvOae0iqpmbthS+wmBIE194tw9JtfyWKugygYaG9oldTM3RCOmFD/fHDyjHwKEycKxnypqdcFSBAOF2VH+k8QgS+CvNR43baUIHFobFqIo/dFEC7Gi43XIEg89Cl+41sbUBCthMcqfvsT3wQJopVwdl+egch9/x4kXxvldu6aho0b70KQ4FPXnss3wC9871w8cPjHwE1dflqJ74LwVMqeV3+DIOGnlQjp7d22PQfxXcJ3IHtiy9Qd8AMNfWn9X87OXdlAiRLL3vFj2spolfTuVgoX5cCh4PiUF6qdfGQsozFkQvdmb2m4Ca1vfi99mp6zieKSKoJWodCr2Y1tTkeiMLgYR9+6Iv0UVpuvWirF7nDkjdi2Uzci9j47L727VYFPYVyYbdv9W/d7YdNMVSzkH72/tiAeenerDreWvcmfbWH2Jn+BZyQKJNesvlNf1vu7rC/rv3p3RXP3rzV2bf7WzfVw69Y6+z0//IY/qWd6d0OlqN5fhUKhUCgUCoVCoVAoFAqFQqFQKBT/Z/4GOW4G2xEUHwcAAAAASUVORK5CYII=" alt="Employees"><span class="o_menu_brand d-flex ms-3 pe-0">Employees</span></a>
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
        </header> --}}

    <div class="o_action_manager">
        <div class="o_xxl_form_view h-100 o_form_view o_view_controller o_action">
            <div class="o_form_view_container">

                {{-- <div class="o_control_panel d-flex flex-column gap-3 px-3 pt-2 pb-3" data-command-category="actions">
                        <div class="o_control_panel_main d-flex flex-wrap flex-lg-nowrap justify-content-between align-items-lg-start gap-3 flex-grow-1">
                            <div class="o_control_panel_breadcrumbs d-flex align-items-center gap-1 order-0 h-lg-100">
                                <div class="o_control_panel_main_buttons d-flex gap-1 d-empty-none d-print-none">
                                    <div class="d-inline-flex gap-1"><button type="button" class="btn btn-outline-primary o_form_button_create" data-hotkey="c">New</button></div>
                                </div>
                                <div class="o_breadcrumb d-flex flex-row flex-md-column align-self-stretch justify-content-between min-w-0">
                                    <ol class="breadcrumb flex-nowrap text-nowrap lh-sm">
                                        <li class="breadcrumb-item d-inline-flex min-w-0 o_back_button" data-hotkey="b"><a class="fw-bold text-truncate" href="/odoo/action-468" data-tooltip="Back to &quot;Skill Types&quot;">Skill Types</a></li>
                                    </ol>
                                    <div class="d-flex gap-1 text-truncate">
                                        <div class="o_last_breadcrumb_item active d-flex gap-2 align-items-center min-w-0 lh-sm"><span class="min-w-0 text-truncate">New</span></div>
                                        <div class="o_control_panel_breadcrumbs_actions d-inline-flex d-print-none">
                                            <div class="o_cp_action_menus d-flex align-items-center pe-2 gap-1">
                                                <div class="lh-1"><button class="d-print-none btn p-0 ms-1 lh-sm border-0 o-dropdown dropdown-toggle dropdown" data-hotkey="u" data-tooltip="Actions" aria-expanded="false"><i class="fa fa-cog"></i></button></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="o_form_status_indicator d-md-flex align-items-center align-self-md-end me-auto o_form_status_indicator_new_record">
                                    <div class="o_form_status_indicator_buttons d-flex"><button type="button" class="o_form_button_save btn btn-light px-1 py-0 lh-sm" data-hotkey="s" data-tooltip="Save manually" aria-label="Save manually"><i class="fa fa-cloud-upload fa-fw"></i></button><button type="button" class="o_form_button_cancel btn btn-light px-1 py-0 lh-sm" data-hotkey="j" data-tooltip="Discard all changes" aria-label="Discard all changes"><i class="fa fa-times fa-fw"></i></button></div>
                                </div>
                                <div class="me-auto"></div>
                            </div>
                            <div class="o_control_panel_actions d-empty-none d-flex align-items-center justify-content-start justify-content-lg-around order-2 order-lg-1 w-100 w-lg-auto"></div>
                            <div class="o_control_panel_navigation d-flex flex-wrap flex-md-nowrap justify-content-end gap-1 gap-xl-3 order-1 order-lg-2 flex-grow-1"><button class="o_knowledge_icon_search btn opacity-trigger-hover" type="button" title="Search Knowledge Articles"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" class="o_ui_app_icon oi-large">
                                        <path fill="var(--oi-color, #1AD3BB)" d="M21 0c-2 0-4 2-4 3.99V12h18v20.071l5.428 3.748A1 1 0 0 0 42 35.001V0H21Z" class="opacity-50 opacity-100-hover"></path>
                                        <path fill="var(--oi-color, #985184)" d="M8 17.99C8 16 10 14 12 14h21v35a1 1 0 0 1-1.572.82L23 44c-1.5-1-3.5-1-5 0l-8.428 5.82A1 1 0 0 1 8 49V17.99Z"></path>
                                        <path fill="var(--oi-color, #005E7A)" d="M33 30.658 32 30c-1.5-1-3.5-1-5 0l-8.428 5.82A1 1 0 0 1 17 35V14h16v16.658Z"></path>
                                    </svg></button></div>
                        </div>
                    </div> --}}

                <div class="o_content">
                    <div class="o_form_renderer o_form_editable d-flex d-print-block flex-nowrap h-100">
                        <div class="o_form_sheet_bg">
                            <div class="o_form_sheet position-relative">
                                <div class="oe_title"><label class="o_form_label" for="skill_type_input">Skill Type</label>

                                    <h1>
                                        <div name="name" class="o_field_widget o_required_modifier o_field_char">
                                            <input type="hidden" name="id" id="skill_type_id" value="">
                                            <input class="o_input o_field_translate" id="skill_type_input" value="{{ $skillType->name ?? '' }}" type="text" autocomplete="off" placeholder="e.g. Languages">
                                        </div>
                                    </h1>


                                </div>
                                <div class="o_inner_group grid">
                                    <div class="g-col-sm-2">
                                        <div class="o_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">Skills</div>
                                    </div>
                                </div>
                                <div name="skill_ids" class="o_field_widget o_field_one2many">
                                    <div class="o_list_view o_field_x2many o_field_x2many_list">
                                        <div class="o_x2m_control_panel d-empty-none mb-4"></div>
                                        <div class="o_list_renderer o_renderer table-responsive" tabindex="-1">


                                            <table class="o_list_table table table-sm table-hover position-relative mb-0 o_list_table_ungrouped table-striped" style="table-layout: fixed;">
                                                <thead>
                                                    <tr>
                                                        <th data-tooltip-delay="1000" tabindex="-1" data-name="sequence" class="align-middle o_column_sortable position-relative cursor-pointer o_list_number_th o_handle_cell opacity-trigger-hover w-print-auto" style="width: 40px;"></th>
                                                        <th data-tooltip-delay="1000" tabindex="-1" data-name="name" class="align-middle o_column_sortable position-relative cursor-pointer opacity-trigger-hover w-print-auto" style="width: 1375px;">
                                                            <div class="d-flex">
                                                                <span class="d-block min-w-0 text-truncate flex-grow-1">Name</span>
                                                                <i class="fa fa-lg fa-angle-down opacity-0 opacity-75-hover"></i>
                                                            </div>
                                                            <span class="o_resize position-absolute top-0 end-0 bottom-0 ps-1 bg-black-25 opacity-0 opacity-50-hover z-1"></span>
                                                        </th>
                                                        <th class="o_list_controller o_list_actions_header w-print-0 p-print-0 position-sticky end-0" style="width: 32px;"></th>
                                                    </tr>
                                                </thead>
                                                <tbody class="ui-sortable">
                                                    @if(isset($skills))
                                                    @foreach($skills as $skill)
                                                    <tr class="o_data_row o_row_draggable" data-id="{{ $skill->id }}">
                                                        <td class="o_data_cell cursor-pointer o_field_cell o_list_number o_handle_cell" data-tooltip-delay="1000" tabindex="-1" name="sequence">
                                                            <div name="sequence" class="o_field_widget o_field_handle"><span class="o_row_handle oi oi-draggable ui-sortable-handle"></span></div>
                                                        </td>
                                                        <td class="o_data_cell cursor-pointer o_field_cell o_list_char o_required_modifier" data-tooltip-delay="1000" tabindex="-1" name="name" data-tooltip="{{ $skill->name }}">{{ $skill->name }}</td>
                                                        <td class="o_list_record_remove w-print-0 p-print-0 text-center" tabindex="-1">
                                                            <a class="fa d-print-none fa-trash-o delete-skill" name="delete" aria-label="Delete row" tabindex="-1"></a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                    @endif

                                                    <tr>
                                                        <td></td>
                                                        <td class="o_field_x2many_list_row_add" colspan="2"><a type="button" role="button" class="add-skill-line" tabindex="0">Add a line</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3">​</td>
                                                    </tr>
                                                </tbody>
                                                <tfoot class="o_list_footer cursor-default">
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td class="w-print-0 p-print-0"></td>
                                                    </tr>
                                                </tfoot>
                                            </table>



                                        </div>
                                    </div>
                                </div>
                                <div class="o_inner_group grid">
                                    <div class="g-col-sm-2">
                                        <div class="o_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">Levels</div>
                                    </div>
                                </div>
                                <div name="skill_level_ids" class="o_field_widget o_field_auto_save_skill_type">
                                    <div class="o_list_view o_skill_level_tree o_field_x2many o_field_x2many_list">
                                        <div class="o_x2m_control_panel d-empty-none mb-4"></div>
                                        <div class="o_list_renderer o_renderer table-responsive" tabindex="-1">
                                            <table class="o_list_table table table-sm table-hover position-relative mb-0 o_list_table_ungrouped table-striped" style="table-layout: fixed;">
                                                <thead>
                                                    <tr>
                                                        <th data-tooltip-delay="1000" tabindex="-1" data-name="name" class="align-middle o_column_sortable position-relative cursor-pointer opacity-trigger-hover w-print-auto" data-tooltip-template="web.ListHeaderTooltip" data-tooltip-info="{&quot;viewMode&quot;:&quot;list&quot;,&quot;resModel&quot;:&quot;hr.skill.level&quot;,&quot;debug&quot;:false,&quot;field&quot;:{&quot;name&quot;:&quot;name&quot;,&quot;label&quot;:&quot;Name&quot;,&quot;type&quot;:&quot;char&quot;,&quot;widget&quot;:null,&quot;context&quot;:&quot;{}&quot;,&quot;invisible&quot;:null,&quot;column_invisible&quot;:null,&quot;readonly&quot;:null,&quot;required&quot;:&quot;True&quot;,&quot;changeDefault&quot;:false}}" style="width: 480px;">
                                                            <div class="d-flex"><span class="d-block min-w-0 text-truncate flex-grow-1">Name</span><i class="fa fa-lg fa-angle-down opacity-0 opacity-75-hover"></i></div><span class="o_resize position-absolute top-0 end-0 bottom-0 ps-1 bg-black-25 opacity-0 opacity-50-hover z-1"></span>
                                                        </th>
                                                        <th data-tooltip-delay="1000" tabindex="-1" data-name="level_progress" class="align-middle o_column_sortable position-relative cursor-pointer o_list_number_th o_progressbar_cell opacity-trigger-hover w-print-auto" data-tooltip-template="web.ListHeaderTooltip" data-tooltip-info="{&quot;viewMode&quot;:&quot;list&quot;,&quot;resModel&quot;:&quot;hr.skill.level&quot;,&quot;debug&quot;:false,&quot;field&quot;:{&quot;name&quot;:&quot;level_progress&quot;,&quot;label&quot;:&quot;Progress&quot;,&quot;help&quot;:&quot;Progress from zero knowledge (0%) to fully mastered (100%).&quot;,&quot;type&quot;:&quot;integer&quot;,&quot;widget&quot;:&quot;progressbar&quot;,&quot;widgetDescription&quot;:&quot;Progress Bar&quot;,&quot;context&quot;:&quot;{}&quot;,&quot;invisible&quot;:null,&quot;column_invisible&quot;:null,&quot;readonly&quot;:null,&quot;required&quot;:null,&quot;changeDefault&quot;:false}}" style="width: 469px;">
                                                            <div class="d-flex flex-row-reverse"><span class="d-block min-w-0 text-truncate flex-grow-1 o_list_number_th">Progress</span><i class="fa fa-lg fa-angle-down opacity-0 opacity-75-hover"></i></div><span class="o_resize position-absolute top-0 end-0 bottom-0 ps-1 bg-black-25 opacity-0 opacity-50-hover z-1"></span>
                                                        </th>
                                                        <th data-tooltip-delay="1000" tabindex="-1" data-name="default_level" class="align-middle o_column_sortable position-relative cursor-pointer o_boolean_toggle_load_cell opacity-trigger-hover w-print-auto" data-tooltip-template="web.ListHeaderTooltip" data-tooltip-info="{&quot;viewMode&quot;:&quot;list&quot;,&quot;resModel&quot;:&quot;hr.skill.level&quot;,&quot;debug&quot;:false,&quot;field&quot;:{&quot;name&quot;:&quot;default_level&quot;,&quot;label&quot;:&quot;Default Level&quot;,&quot;help&quot;:&quot;If checked, this level will be the default one selected when choosing this skill.&quot;,&quot;type&quot;:&quot;boolean&quot;,&quot;widget&quot;:&quot;boolean_toggle_load&quot;,&quot;widgetDescription&quot;:&quot;Toggle&quot;,&quot;context&quot;:&quot;{}&quot;,&quot;invisible&quot;:null,&quot;column_invisible&quot;:null,&quot;readonly&quot;:null,&quot;required&quot;:null,&quot;changeDefault&quot;:false}}" style="width: 469px;">
                                                            <div class="d-flex"><span class="d-block min-w-0 text-truncate flex-grow-1">Default Level</span><i class="fa fa-lg fa-angle-down opacity-0 opacity-75-hover"></i></div><span class="o_resize position-absolute top-0 end-0 bottom-0 ps-1 bg-black-25 opacity-0 opacity-50-hover z-1"></span>
                                                        </th>
                                                        <th class="o_list_controller o_list_actions_header w-print-0 p-print-0 position-sticky end-0" style="width: 32px;"></th>
                                                    </tr>
                                                </thead>
                                                <tbody class="ui-sortable">
                                                    <tr>
                                                        <td class="o_field_x2many_list_row_add add-skill-level-line" colspan="4"><a href="#" role="button" tabindex="0">Add a line</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4">​</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4">​</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4">​</td>
                                                    </tr>
                                                </tbody>
                                                <tfoot class="o_list_footer cursor-default">
                                                    <tr>
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
                                <div class="o_inner_group grid">
                                    <div class="g-col-sm-2">
                                        <div class="o_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">Display</div>
                                    </div>
                                    <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                        <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900"><label class="o_form_label" for="color_0">Color</label></div>
                                        <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                            <div name="color" class="o_field_widget o_field_color_picker">
                                                <div class="o_colorlist d-flex flex-wrap align-items-center mw-100 gap-2" aria-atomic="true"><button role="menuitem" title="Cyan" data-color="4" aria-label="Cyan" class="btn p-0 rounded-0 o_colorlist_toggler o_colorlist_item_color_4"></button></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
{{-- CONFIGURATION SECTION END --}}

{{-- SKILL SECTION START --}}

<script>
    $(document).ready(function() {
        // Add a new row
        $(document).on('click', '.add-skill-line', function(e) {
            e.preventDefault(); // Prevent the default action

            // Define the new row to be appended
            var newRow = `
            <tr class="o_data_row o_selected_row o_row_draggable" data-id="datapoint_new">
                <td class="o_data_cell cursor-pointer o_field_cell o_list_number o_handle_cell" data-tooltip-delay="1000" tabindex="-1" name="sequence">
                    <div name="sequence" class="o_field_widget o_field_handle">
                        <span class="o_row_handle oi oi-draggable ui-sortable-handle"></span>
                    </div>
                </td>
                <td class="o_data_cell cursor-pointer o_field_cell o_list_char o_required_modifier" data-tooltip-delay="1000" tabindex="-1" name="name" data-tooltip="">
                    <div name="name" class="o_field_widget o_required_modifier o_field_char">
                        <input class="o_input_skill" type="text" autocomplete="off" data-id="">
                    </div>
                </td>
                <td class="skill_list_record_remove w-print-0 p-print-0 text-center" tabindex="-1">
                    <a class="fa d-print-none skill-delete-btn fa-trash" name="delete" aria-label="Delete row" tabindex="-1"></a>
                </td>
            </tr>
        `;

            // Append the new row before the 'Add a line' link row
            $(newRow).insertBefore($(this).closest('tr'));
        });

        // Remove row when the delete button is clicked
        $(document).on('click', '.skill-delete-btn', function(e) {
            e.preventDefault();
            $(this).closest('tr').remove();
        });

        // Attach click event to the Save button
        $('.skill-save-btn').on('click', function() {
            var skillTypeInput = $('#skill_type_input');
            var skillType = skillTypeInput.val().trim();
            var skillTypeId = $('#skill_type_id').val();

            // skills array as filds id name
            var skills = [];
            $('.o_input_skill').each(function() {
                var skillInput = $(this);
                var skillValue = skillInput.val().trim();
                // sequence remaining
                if (skillValue !== '') {
                    skills.push({
                        id: skillInput.data('id')
                        , name: skillValue
                    , });
                }
            });




            // Collect skill levels array
            var skillLevels = [];
            $('.new-level-row').each(function() {
                var levelInput = $(this).find('input[name="skill_name[]"]');
                var progressInput = $(this).find('input[name="progress[]"]');
                var defaultInput = $(this).find('input[name="default_level[]"]');

                var skillLevel = {
                    id: levelInput.data('id'),
                    name: levelInput.val().trim(),
                    level: progressInput.val().trim(),
                    is_default: defaultInput.is(':checked') ? 1 : 0
                };

                if (skillLevel.name !== '') {
                    skillLevels.push(skillLevel);
                }
            });




            if (skillType !== '') {
                $.ajax({
                    url: '{{ route("skills.store") }}'
                    , method: 'POST'
                    , data: {
                        name: skillType
                        , skill_type_id: skillTypeId
                        , skills: skills
                        , skill_levels: skillLevels
                        , _token: '{{ csrf_token() }}'
                    }
                    , success: function(response) {
                        if (response.success) {
                            window.location.href = '{{ route("skill.view") }}';
                        }
                    }
                    , error: function() {
                        alert('Error saving skill.');
                    }
                });
            } else {
                alert('Skill type or Skill Type ID cannot be empty.');
            }
        });


        // delete skill
        $(document).on('click', '.delete-skill', function(e) {
            e.preventDefault();
            var skillId = $(this).closest('tr').data('id');
            var tr = $(this).closest('tr');
            $.ajax({
                url: '/skills/delete/' + skillId
                , method: 'DELETE'
                , data: {
                    _token: '{{ csrf_token() }}'
                }
                , success: function(response) {
                    if (response.success) {
                        tr.remove();
                    }
                }
                , error: function() {
                    alert('Error deleting skill.');
                }
            });
        });


        $(document).on('click', '.skill-save-btn', function(e) {
            e.preventDefault();
            console.log('Save button clicked');
            $(this).closest('tr').remove();
        });



        $(document).on('click', '.add-skill-level-line', function(e) {
            e.preventDefault();

            // Define the new row to be appended
            var newLevelRow = `
            <tr class="o_data_row new-level-row o_selected_row" data-id="datapoint_new">
                <td class="o_data_cell cursor-pointer o_field_cell o_list_char o_required_modifier" data-tooltip-delay="1000" tabindex="-1" name="name">
                    <div name="name" class="o_field_widget o_required_modifier o_field_char">
                        <input class="o_input_skill" type="text" autocomplete="off" name="skill_name[]" data-id="{{ $skill->id ?? '' }}">

                    </div>
                </td>
                <td class="o_data_cell cursor-pointer o_field_cell o_list_number o_progressbar_cell" data-tooltip-delay="1000" tabindex="-1" name="level_progress">
                    <div name="level_progress" class="o_field_widget o_field_progressbar">
                        <div class="o_progressbar w-100 d-flex align-items-center">
                            <div class="o_progress align-middle overflow-hidden" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                <div class="bg-primary h-100" style="width: min(0%, 100%)"></div>
                            </div>
                            <div class="o_progressbar_value d-flex">
                                <input class="o_input h-100 text-center" type="text" inputmode="decimal" autocomplete="off" name="progress[]">
                                <span>%</span>
                            </div>
                        </div>
                    </div>
                </td>
                <td class="o_data_cell cursor-pointer o_field_cell o_boolean_toggle_load_cell" data-tooltip-delay="1000" tabindex="-1" name="default_level">
                    <div name="default_level" class="o_field_widget o_field_boolean_toggle_load">
                        <div>
                            <div class="o-checkbox form-check o_field_boolean o_boolean_toggle form-switch">
                                <input type="checkbox" class="form-check-input" name="default_level[]">
                                <label class="form-check-label"> ​ </label>
                            </div>
                        </div>
                    </div>
                </td>
                <td class="o_list_record_remove w-print-0 p-print-0 text-center" tabindex="-1">
                    <a class="fa d-print-none skill-delete-btn fa-trash-o" name="delete" aria-label="Delete row" tabindex="-1"></a>
                </td>
            </tr>
            `;

            // Append the new row before the 'Add a line' link row
            $(newLevelRow).insertBefore($(this).closest('tr'));
        });



    });

</script>

@endpush
