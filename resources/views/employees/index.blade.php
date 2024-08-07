@extends('layout.header')

@section('title', 'Employee')
@section('head_title_link', route('employee.index'))
@section('image_url', asset('images/employees.png'))
@section('head_new_btn_link', route('employee.create'))
@section('save_class', 'save_contacts')
@section('head')
    @vite(['resources/css/odoo/web.assets_web.css', 'resources/css/contactcreate.css'])
@endsection
@section('navbar_menu')
    <li><a href="{{ route('employee.index') }}">Employees</a></li>
    <li><a href="#"></a>Departments</li>
    <li><a href="#"></a>Reporting</li>
    <li><a href="#"></a>Configuration</li>
@endsection

@section('content')

    <body class="o_web_client">

        {{-- <header class="o_navbar">
            <nav class="o_main_navbar d-print-none" data-command-category="disabled"><a href="/odoo"
                    class="o_menu_toggle hasImage" accesskey="h" title="Home menu" aria-label="Home menu"><svg
                        xmlns="http://www.w3.org/2000/svg" class="o_menu_toggle_icon pe-none" width="14px" height="14px"
                        viewBox="0 0 14 14">
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
                        src="data:image/png;base64,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"
                        alt="Employees"><span class="o_menu_brand d-flex ms-3 pe-0">Employees</span></a>
                <div class="o_menu_sections d-flex flex-grow-1 flex-shrink-1 w-0" role="menu"><button
                        class="fw-normal o-dropdown dropdown-toggle dropdown" data-hotkey="1"
                        data-menu-xmlid="hr.menu_hr_employee_payroll" aria-expanded="false"><span
                            data-section="293">Employees</span></button><a
                        class="o-dropdown-item dropdown-item o-navigable o_nav_entry" role="menuitem" tabindex="0"
                        href="/odoo/departments" data-hotkey="2" data-menu-xmlid="hr.menu_hr_department_kanban"
                        data-section="302">Departments</a><button class="fw-normal o-dropdown dropdown-toggle dropdown"
                        data-hotkey="3" data-menu-xmlid="hr.hr_menu_hr_reports" aria-expanded="false"><span
                            data-section="296">Reporting</span></button><button
                        class="fw-normal o-dropdown dropdown-toggle dropdown" data-hotkey="4"
                        data-menu-xmlid="hr.menu_human_resources_configuration" aria-expanded="false"><span
                            data-section="298">Configuration</span></button></div>
                <div class="o_menu_systray d-flex flex-shrink-0 ms-auto" role="menu">
                    <div></div>
                    <div></div>
                    <div class="dropdown"></div>
                    <div></div>
                    <div></div>
                    <div class="o-mail-DiscussSystray-class"><button aria-expanded="false"
                            class="o-dropdown dropdown-toggle dropdown"><i class="fa fa-lg fa-comments" role="img"
                                aria-label="Messages"></i><span
                                class="o-mail-MessagingMenu-counter badge rounded-pill">4</span></button></div>
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
                                src="https://yantra-design2.odoo.com/web/image/res.partner/3/avatar_128?unique=1722484284000"><small
                                class="oe_topbar_name d-none ms-2 text-start smaller lh-1 text-truncate"
                                style="max-width: 200px">info@yantradesign.co.in<mark
                                    class="d-block font-monospace text-truncate"><i
                                        class="fa fa-database oi-small me-1"></i>yantra-design2</mark></small></button>
                    </div>
                </div>
            </nav>
        </header> --}}
        <div class="o_action_manager">
            <div class="o_kanban_view o_hr_employee_kanban o_view_controller o_action">
                {{-- <div class="o_control_panel d-flex flex-column gap-3 px-3 pt-2 pb-3" data-command-category="actions">
                    <div
                        class="o_control_panel_main d-flex flex-wrap flex-lg-nowrap justify-content-between align-items-lg-start gap-3 flex-grow-1">
                        <div class="o_control_panel_breadcrumbs d-flex align-items-center gap-1 order-0 h-lg-100">
                            <div class="o_control_panel_main_buttons d-flex gap-1 d-empty-none d-print-none">
                                <div class="d-inline-flex gap-1"><button type="button"
                                        class="btn btn-primary o-kanban-button-new" accesskey="c" data-bounce-button="">
                                        New </button>
                                    <div class="o_cp_buttons d-empty-none d-flex align-items-baseline gap-1"
                                        role="toolbar" aria-label="Main actions"></div>
                                </div>
                            </div>
                            <div class="o_breadcrumb d-flex gap-1 text-truncate">
                                <div class="o_last_breadcrumb_item active d-flex fs-4 min-w-0 align-items-center"><span
                                        class="min-w-0 text-truncate">Employees</span></div>
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
                                    <div class="o_searchview_input_container d-flex flex-grow-1 flex-wrap gap-1"><input
                                            type="text"
                                            class="o_searchview_input o_input d-print-none flex-grow-1 w-auto border-0"
                                            accesskey="Q" placeholder="Search..." role="searchbox"></div>
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
                                            class="o_pager_value d-inline-block border-bottom border-transparent mb-n1">1-3</span><span>
                                            / </span><span class="o_pager_limit">3</span></span><span
                                        class="btn-group d-print-none" aria-atomic="true"><button type="button"
                                            class="oi oi-chevron-left btn btn-secondary o_pager_previous px-2 rounded-start"
                                            aria-label="Previous" data-tooltip="Previous" tabindex="-1" data-hotkey="p"
                                            disabled=""></button><button type="button"
                                            class="oi oi-chevron-right btn btn-secondary o_pager_next px-2 rounded-end"
                                            aria-label="Next" data-tooltip="Next" tabindex="-1" data-hotkey="n"
                                            disabled=""></button></span></nav>
                            </div>
                            <nav class="o_cp_switch_buttons d-print-none d-inline-flex btn-group"><button
                                    class="btn btn-secondary o_switch_view o_kanban active" data-tooltip="Kanban"><i
                                        class="oi oi-view-kanban"></i></button><button
                                    class="btn btn-secondary o_switch_view o_list" data-tooltip="List"><i
                                        class="oi oi-view-list"></i></button><button
                                    class="btn btn-secondary o_switch_view o_activity" data-tooltip="Activity"><i
                                        class="fa fa-clock-o"></i></button><button
                                    class="btn btn-secondary o_switch_view o_graph" data-tooltip="Graph"><i
                                        class="fa fa-area-chart"></i></button><button
                                    class="btn btn-secondary o_switch_view o_pivot" data-tooltip="Pivot"><i
                                        class="oi oi-view-pivot"></i></button><button
                                    class="btn btn-secondary o_switch_view o_hierarchy" data-tooltip="Hierarchy"><i
                                        class="fa fa-share-alt o_hierarchy_icon"></i></button></nav>
                        </div>
                    </div>
                </div> --}}
                <div class="o_content o_component_with_search_panel">
                    <div
                        class="o_search_panel flex-grow-0 flex-shrink-0 h-100 pb-5 bg-view overflow-auto position-relative pe-1 ps-3">
                        <button class="btn btn-light btn-sm end-0 m-2 position-absolute px-2 py-1 top-0 z-1"><i
                                class="fa fa-fw fa-angle-double-left"></i></button>
                        <section class="o_search_panel_section o_search_panel_category">
                            <header class="o_search_panel_section_header pt-4 pb-2 text-uppercase cursor-default"><i
                                    class="fa fa-users o_search_panel_section_icon text-primary me-2"
                                    style="null"></i><b>Department</b></header>
                            <ul class="list-group d-block o_search_panel_field px-2 px-md-0">
                                <li
                                    class="o_search_panel_category_value list-group-item py-1 cursor-pointer border-0 pe-0 ps-0">
                                    <header
                                        class="list-group-item list-group-item-action d-flex align-items-center px-0 py-lg-0 border-0 active text-900 fw-bold">
                                        <div
                                            class="o_search_panel_label d-flex align-items-center overflow-hidden w-100 cursor-pointer mb-0 o_with_counters">
                                            <button
                                                class="o_toggle_fold btn p-0 px-1 flex-shrink-0 text-center"></button><span
                                                class="o_search_panel_label_title text-truncate fw-bold"
                                                data-tooltip="All">All</span></div>
                                    </header>
                                </li>
                                <li
                                    class="o_search_panel_category_value list-group-item py-1 cursor-pointer border-0 pe-0 ps-0">
                                    <header
                                        class="list-group-item list-group-item-action d-flex align-items-center px-0 py-lg-0 border-0">
                                        <div
                                            class="o_search_panel_label d-flex align-items-center overflow-hidden w-100 cursor-pointer mb-0 o_with_counters">
                                            <button
                                                class="o_toggle_fold btn p-0 px-1 flex-shrink-0 text-center"></button><span
                                                class="o_search_panel_label_title text-truncate"
                                                data-tooltip="Administration">Administration</span></div><small
                                            class="o_search_panel_counter text-muted mx-2 fw-bold">1</small>
                                    </header>
                                </li>
                            </ul>
                        </section>
                    </div>
                    <div class="h-100"><span class="o_search_panel_resize"></span></div>
                    <div
                        class="o_kanban_renderer o_renderer d-flex o_kanban_ungrouped align-content-start flex-wrap justify-content-start">
                        <article
                            class="o_kanban_record d-flex cursor-pointer flex-grow-1 flex-md-shrink-1 flex-shrink-0 o_legacy_kanban_record"
                            data-id="datapoint_2" tabindex="0">
                            <div class="oe_kanban_global_click o_kanban_record_has_image_fill o_hr_kanban_record">
                                <div name="image_1024"
                                    class="o_field_widget o_readonly_modifier o_field_background_image o_kanban_image_fill_left d-block">
                                    <img loading="lazy" alt="Binary file" data-tooltip-template="web.ImageZoomTooltip"
                                        data-tooltip-info="{&quot;url&quot;:&quot;https://yantra-design2.odoo.com/web/image/hr.employee/1/image_1024?unique=1722582818000&quot;}"
                                        data-tooltip-delay="1000"
                                        src="https://yantra-design2.odoo.com/web/image/hr.employee/1/image_1024?unique=1722582818000">
                                </div>
                                <div class="oe_kanban_details">
                                    <div class="o_kanban_record_top">
                                        <div class="o_kanban_record_headings"><strong
                                                class="o_kanban_record_title"><span>info@yantradesign.co.in</span>
                                                <div class="float-end">
                                                    <div>
                                                        <div name="hr_icon_display"
                                                            class="o_field_widget o_readonly_modifier o_field_hr_presence_status o_employee_availability">
                                                            <span role="img"
                                                                class="fa fa-circle fa-fw o_button_icon hr_presence align-middle text-success"
                                                                aria-label="Present" title="Present"></span></div>
                                                    </div>
                                                </div>
                                            </strong><span class="o_kanban_record_subtitle"><span>k</span></span></div>
                                    </div>
                                    <ul>
                                        <li class="o_text_overflow"><i class="fa fa-fw me-2 fa-envelope text-primary"
                                                title="Email"></i><span>info@yantradesign.co.in</span></li>
                                        <div name="employee_properties" class="o_field_widget o_field_properties">
                                            <div class="w-100 fw-normal text-muted"></div>
                                        </div>
                                        <li class="hr_tags">
                                            <div name="category_ids" class="o_field_widget o_field_many2many_tags">
                                                <div class="d-flex flex-wrap gap-1"></div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div
                                    class="oe_kanban_content o_hr_employee_kanban_bottom position-absolute bottom-0 start-0 end-0">
                                    <div class="o_kanban_record_bottom mt-3">
                                        <div class="oe_kanban_bottom_left"></div>
                                        <div class="oe_kanban_bottom_right">
                                            <div class="hr_avatar mb-1 ms-2 me-n1">
                                                <div name="user_id"
                                                    class="o_field_widget o_readonly_modifier o_field_many2one_avatar_user o_field_many2one_avatar_kanban o_field_many2one_avatar">
                                                    <div class="d-flex align-items-center gap-1"
                                                        data-tooltip="info@yantradesign.co.in"><span
                                                            class="o_avatar o_m2o_avatar d-flex"><img class="rounded"
                                                                src="/web/image/res.users/2/avatar_128"></span></div>
                                                </div>
                                            </div>
                                            <div class="hr_activity_container mb-1 ms-2 me-n1">
                                                <div name="activity_ids" class="o_field_widget o_field_kanban_activity"><a
                                                        class="o-mail-ActivityButton" role="button"
                                                        aria-label="Show activities" title="Show activities"><i
                                                            class="fa fa-fw fa-lg text-muted fa-clock-o btn-link text-dark"
                                                            role="img"></i></a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <article
                            class="o_kanban_record d-flex cursor-pointer flex-grow-1 flex-md-shrink-1 flex-shrink-0 o_legacy_kanban_record"
                            data-id="datapoint_5" tabindex="0">
                            <div class="oe_kanban_global_click o_kanban_record_has_image_fill o_hr_kanban_record">
                                <div name="image_1024"
                                    class="o_field_widget o_readonly_modifier o_field_background_image o_kanban_image_fill_left d-block">
                                    <img loading="lazy" alt="Binary file" data-tooltip-template="web.ImageZoomTooltip"
                                        data-tooltip-info="{&quot;url&quot;:&quot;https://yantra-design2.odoo.com/web/image/hr.employee/2/image_1024?unique=1722580108000&quot;}"
                                        data-tooltip-delay="1000"
                                        src="https://yantra-design2.odoo.com/web/image/hr.employee/2/image_1024?unique=1722580108000">
                                </div>
                                <div class="oe_kanban_details">
                                    <div class="o_kanban_record_top">
                                        <div class="o_kanban_record_headings"><strong
                                                class="o_kanban_record_title"><span>karan vora</span>
                                                <div class="float-end"></div>
                                            </strong></div>
                                    </div>
                                    <ul>
                                        <div name="employee_properties" class="o_field_widget o_field_properties">
                                            <div class="w-100 fw-normal text-muted"></div>
                                        </div>
                                        <li class="hr_tags">
                                            <div name="category_ids" class="o_field_widget o_field_many2many_tags">
                                                <div class="d-flex flex-wrap gap-1"></div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div
                                    class="oe_kanban_content o_hr_employee_kanban_bottom position-absolute bottom-0 start-0 end-0">
                                    <div class="o_kanban_record_bottom mt-3">
                                        <div class="oe_kanban_bottom_left"></div>
                                        <div class="oe_kanban_bottom_right">
                                            <div class="hr_avatar mb-1 ms-2 me-n1">
                                                <div name="user_id"
                                                    class="o_field_widget o_readonly_modifier o_field_empty o_field_many2one_avatar_user o_field_many2one_avatar_kanban o_field_many2one_avatar">
                                                    <div class="d-flex align-items-center gap-1"><span
                                                            class="o_avatar o_m2o_avatar d-flex"></span></div>
                                                </div>
                                            </div>
                                            <div class="hr_activity_container mb-1 ms-2 me-n1">
                                                <div name="activity_ids" class="o_field_widget o_field_kanban_activity"><a
                                                        class="o-mail-ActivityButton" role="button"
                                                        aria-label="Show activities" title="Show activities"><i
                                                            class="fa fa-fw fa-lg text-muted fa-clock-o btn-link text-dark"
                                                            role="img"></i></a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <article
                            class="o_kanban_record d-flex cursor-pointer flex-grow-1 flex-md-shrink-1 flex-shrink-0 o_legacy_kanban_record"
                            data-id="datapoint_8" tabindex="0">
                            <div class="oe_kanban_global_click o_kanban_record_has_image_fill o_hr_kanban_record">
                                <div name="image_1024"
                                    class="o_field_widget o_readonly_modifier o_field_background_image o_kanban_image_fill_left d-block">
                                    <img loading="lazy" alt="Binary file" data-tooltip-template="web.ImageZoomTooltip"
                                        data-tooltip-info="{&quot;url&quot;:&quot;https://yantra-design2.odoo.com/web/image/hr.employee/3/image_1024?unique=1722918690000&quot;}"
                                        data-tooltip-delay="1000"
                                        src="https://yantra-design2.odoo.com/web/image/hr.employee/3/image_1024?unique=1722918690000">
                                </div>
                                <div class="oe_kanban_details">
                                    <div class="o_kanban_record_top">
                                        <div class="o_kanban_record_headings"><strong
                                                class="o_kanban_record_title"><span>vora</span>
                                                <div class="float-end"></div>
                                            </strong></div>
                                    </div>
                                    <ul>
                                        <div name="employee_properties" class="o_field_widget o_field_properties">
                                            <div class="w-100 fw-normal text-muted"></div>
                                        </div>
                                        <li class="hr_tags">
                                            <div name="category_ids" class="o_field_widget o_field_many2many_tags">
                                                <div class="d-flex flex-wrap gap-1"></div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div
                                    class="oe_kanban_content o_hr_employee_kanban_bottom position-absolute bottom-0 start-0 end-0">
                                    <div class="o_kanban_record_bottom mt-3">
                                        <div class="oe_kanban_bottom_left"></div>
                                        <div class="oe_kanban_bottom_right">
                                            <div class="hr_avatar mb-1 ms-2 me-n1">
                                                <div name="user_id"
                                                    class="o_field_widget o_readonly_modifier o_field_empty o_field_many2one_avatar_user o_field_many2one_avatar_kanban o_field_many2one_avatar">
                                                    <div class="d-flex align-items-center gap-1"><span
                                                            class="o_avatar o_m2o_avatar d-flex"></span></div>
                                                </div>
                                            </div>
                                            <div class="hr_activity_container mb-1 ms-2 me-n1">
                                                <div name="activity_ids" class="o_field_widget o_field_kanban_activity"><a
                                                        class="o-mail-ActivityButton" role="button"
                                                        aria-label="Show activities" title="Show activities"><i
                                                            class="fa fa-fw fa-lg text-muted fa-clock-o btn-link text-dark"
                                                            role="img"></i></a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <div class="o_kanban_record o_kanban_ghost flex-grow-1 flex-md-shrink-1 flex-shrink-0 my-0"></div>
                        <div class="o_kanban_record o_kanban_ghost flex-grow-1 flex-md-shrink-1 flex-shrink-0 my-0"></div>
                        <div class="o_kanban_record o_kanban_ghost flex-grow-1 flex-md-shrink-1 flex-shrink-0 my-0"></div>
                        <div class="o_kanban_record o_kanban_ghost flex-grow-1 flex-md-shrink-1 flex-shrink-0 my-0"></div>
                        <div class="o_kanban_record o_kanban_ghost flex-grow-1 flex-md-shrink-1 flex-shrink-0 my-0"></div>
                        <div class="o_kanban_record o_kanban_ghost flex-grow-1 flex-md-shrink-1 flex-shrink-0 my-0"></div>
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
