@extends('layout.header')

@section('title', 'Employee')
@section('head_title_link' , route('employee.index'))
@section('image_url', asset('images/employees.png'))
@section('head_new_btn_link', route('employee.create'))
@section('save_class', 'save_contacts')
@section('head')
@vite([
        "resources/css/odoo/web.assets_web.css",
        "resources/css/contactcreate.css",
])
@endsection
@section('navbar_menu')
    <li><a href="{{ route('employee.index') }}">Employees</a></li>
    <li><a href="#"></a>Departments</li>
    <li><a href="#"></a>Reporting</li>
    <li><a href="#"></a>Configuration</li>
@endsection

@section('content')
<body>

    <div class="o_action_manager">
        <div class="o_xxl_form_view h-100 o_form_view o_hr_employee_form_view o_view_controller o_action">
            <div class="o_form_view_container">
                <!-- <div class="o_control_panel d-flex flex-column gap-3 px-3 pt-2 pb-3" data-command-category="actions">
                    <div
                        class="o_control_panel_main d-flex flex-wrap flex-lg-nowrap justify-content-between align-items-lg-start gap-3 flex-grow-1">
                        <div class="o_control_panel_breadcrumbs d-flex align-items-center gap-1 order-0 h-lg-100">
                            <div class="o_control_panel_main_buttons d-flex gap-1 d-empty-none d-print-none">
                                <div class="d-inline-flex gap-1"><button type="button"
                                        class="btn btn-outline-primary o_form_button_create"
                                        data-hotkey="c">New</button></div>
                            </div>
                            <div
                                class="o_breadcrumb d-flex flex-row flex-md-column align-self-stretch justify-content-between min-w-0">
                                <ol class="breadcrumb flex-nowrap text-nowrap lh-sm">
                                    <li class="breadcrumb-item d-inline-flex min-w-0 o_back_button" data-hotkey="b"><a
                                            class="fw-bold text-truncate" href="/odoo/employees"
                                            data-tooltip="Back to &quot;Employees&quot;">Employees</a></li>
                                </ol>
                                <div class="d-flex gap-1 text-truncate">
                                    <div
                                        class="o_last_breadcrumb_item active d-flex gap-2 align-items-center min-w-0 lh-sm">
                                        <span class="min-w-0 text-truncate">gyhg</span></div>
                                    <div class="o_control_panel_breadcrumbs_actions d-inline-flex d-print-none">
                                        <div class="o_cp_action_menus d-flex align-items-center pe-2 gap-1">
                                            <div class="lh-1"><button
                                                    class="d-print-none btn p-0 ms-1 lh-sm border-0 o-dropdown dropdown-toggle dropdown"
                                                    data-hotkey="u" data-tooltip="Actions" aria-expanded="false"><i
                                                        class="fa fa-cog"></i></button></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="o_form_status_indicator d-md-flex align-items-center align-self-md-end me-auto">
                                <div class="o_form_status_indicator_buttons d-flex invisible"><button type="button"
                                        class="o_form_button_save btn btn-light px-1 py-0 lh-sm" data-hotkey="s"
                                        data-tooltip="Save manually" aria-label="Save manually"><i
                                            class="fa fa-cloud-upload fa-fw"></i></button><button type="button"
                                        class="o_form_button_cancel btn btn-light px-1 py-0 lh-sm" data-hotkey="j"
                                        data-tooltip="Discard all changes" aria-label="Discard all changes"><i
                                            class="fa fa-times fa-fw"></i></button></div>
                            </div>
                            <div class="me-auto"></div>
                        </div>
                        <div
                            class="o_control_panel_actions d-empty-none d-flex align-items-center justify-content-start justify-content-lg-around order-2 order-lg-1 w-100 w-lg-auto">
                            <div class="o-form-buttonbox d-print-none position-relative d-flex w-md-auto o_not_full">
                                <button class="btn oe_stat_button btn-outline-secondary flex-grow-1 flex-lg-grow-0"
                                    name="action_open_documents" type="object"><i
                                        class="o_button_icon fa fa-fw fa-file-text"></i>
                                    <div name="document_count"
                                        class="o_field_widget o_readonly_modifier o_field_statinfo"><span
                                            class="o_stat_info o_stat_value">0</span><span
                                            class="o_stat_text">Documents</span></div>
                                </button><button
                                    class="btn oe_stat_button btn-outline-secondary flex-grow-1 flex-lg-grow-0"
                                    name="action_related_contacts" type="object"
                                    data-tooltip-template="views.ViewButtonTooltip"
                                    data-tooltip-info="{&quot;debug&quot;:false,&quot;button&quot;:{&quot;help&quot;:&quot;Related Contacts&quot;,&quot;type&quot;:&quot;object&quot;,&quot;name&quot;:&quot;action_related_contacts&quot;},&quot;context&quot;:{&quot;params&quot;:{&quot;resId&quot;:2,&quot;action&quot;:&quot;employees&quot;,&quot;actionStack&quot;:[{&quot;action&quot;:&quot;employees&quot;},{&quot;resId&quot;:2,&quot;action&quot;:&quot;employees&quot;}]},&quot;chat_icon&quot;:true,&quot;lang&quot;:&quot;en_IN&quot;,&quot;tz&quot;:&quot;Asia/Calcutta&quot;,&quot;uid&quot;:2,&quot;allowed_company_ids&quot;:[1]},&quot;model&quot;:&quot;hr.employee&quot;}"><i
                                        class="o_button_icon fa fa-fw fa-address-card-o"></i>
                                    <div class="o_field_widget o_stat_info"><span class="o_stat_value">
                                            <div name="related_partners_count"
                                                class="o_field_widget o_readonly_modifier o_field_integer">
                                                <span>1</span></div>
                                        </span><span class="o_stat_text">Contacts</span></div>
                                </button></div>
                        </div>
                        <div
                            class="o_control_panel_navigation d-flex flex-wrap flex-md-nowrap justify-content-end gap-1 gap-xl-3 order-1 order-lg-2 flex-grow-1">
                            <button class="o_knowledge_icon_search btn opacity-trigger-hover" type="button"
                                title="Search Knowledge Articles"><svg xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 50 50" class="o_ui_app_icon oi-large">
                                    <path fill="var(--oi-color, #1AD3BB)"
                                        d="M21 0c-2 0-4 2-4 3.99V12h18v20.071l5.428 3.748A1 1 0 0 0 42 35.001V0H21Z"
                                        class="opacity-50 opacity-100-hover"></path>
                                    <path fill="var(--oi-color, #985184)"
                                        d="M8 17.99C8 16 10 14 12 14h21v35a1 1 0 0 1-1.572.82L23 44c-1.5-1-3.5-1-5 0l-8.428 5.82A1 1 0 0 1 8 49V17.99Z">
                                    </path>
                                    <path fill="var(--oi-color, #005E7A)"
                                        d="M33 30.658 32 30c-1.5-1-3.5-1-5 0l-8.428 5.82A1 1 0 0 1 17 35V14h16v16.658Z">
                                    </path>
                                </svg></button>
                            <div class="o_cp_pager text-nowrap " role="search">
                                <nav class="o_pager d-flex gap-2 h-100" aria-label="Pager"><span
                                        class="o_pager_counter align-self-center"><span
                                            class="o_pager_value d-inline-block border-bottom border-transparent mb-n1">1</span><span>
                                            / </span><span class="o_pager_limit">1</span></span><span
                                        class="btn-group d-print-none" aria-atomic="true"><button type="button"
                                            class="oi oi-chevron-left btn btn-secondary o_pager_previous px-2 rounded-start"
                                            aria-label="Previous" data-tooltip="Previous" tabindex="-1" data-hotkey="p"
                                            disabled=""></button><button type="button"
                                            class="oi oi-chevron-right btn btn-secondary o_pager_next px-2 rounded-end"
                                            aria-label="Next" data-tooltip="Next" tabindex="-1" data-hotkey="n"
                                            disabled=""></button></span></nav>
                            </div>
                        </div>
                    </div>
                </div> -->
                <div class="o_content">
                    <div class="o_form_renderer o_form_editable d-flex d-print-block flex-nowrap h-100 o_form_saved">
                        <div class="o_form_sheet_bg">
                            <div
                                class="o_form_statusbar position-relative d-flex justify-content-between mb-0 mb-md-2 pb-2 pb-md-0">
                                <div
                                    class="o_statusbar_buttons d-flex align-items-center align-content-around flex-wrap gap-1">
                                    <button invisible="not active or not id" class="btn btn-secondary" name="426"
                                        type="action"><span>Launch Plan</span></button></div>
                            </div>
                            <div class="o_form_sheet position-relative">
                                <div class="row justify-content-between position-relative w-100 m-0 mb-2">
                                    <div class="oe_title mw-75 ps-0 pe-2">
                                        <h1 class="d-flex flex-row align-items-center">
                                            <div name="name" class="o_field_widget o_required_modifier o_field_char"
                                                style="font-size: min(4vw, 2.6rem);"><input class="o_input" id="name_0"
                                                    type="text" autocomplete="off" placeholder="Employee's Name"></div>
                                        </h1>
                                        <h2>
                                            <div name="job_title" class="o_field_widget o_field_char"><input
                                                    class="o_input" id="job_title_0" type="text" autocomplete="off"
                                                    placeholder="Job Title"></div>
                                        </h2>
                                    </div>
                                    <div class="o_employee_avatar m-0 p-0">
                                        <div name="image_1920" class="o_field_widget o_field_image oe_avatar m-0">
                                            <div class="d-inline-block position-relative opacity-trigger-hover">
                                                <div aria-atomic="true"
                                                    class="position-absolute d-flex justify-content-between w-100 bottom-0 opacity-0 opacity-100-hover"
                                                    style=""><span style="display:contents"><button
                                                            class="o_select_file_button btn btn-light border-0 rounded-circle m-1 p-1"
                                                            data-tooltip="Edit" aria-label="Edit"><i
                                                                class="fa fa-pencil fa-fw"></i></button></span><button
                                                        class="o_clear_file_button btn btn-light border-0 rounded-circle m-1 p-1"
                                                        data-tooltip="Clear" aria-label="Clear"><i
                                                            class="fa fa-trash-o fa-fw"></i></button><input type="file"
                                                        class="o_input_file d-none" accept="image/*"></div><img
                                                    loading="lazy" class="img img-fluid" alt="Binary file"
                                                    src="http://127.0.0.1:8000/images/employees.png"
                                                    name="image_1920" style=""
                                                    data-tooltip-template="web.ImageZoomTooltip"
                                                    data-tooltip-info="{&quot;url&quot;:&quot;https://yantra-design2.odoo.com/web/image/hr.employee/2/image_1920?unique=1722574431000&quot;}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="o_group row align-items-start">
                                    <div class="o_inner_group grid col-lg-6">
                                        <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                            <div
                                                class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                <label class="o_form_label" for="mobile_phone_0">Work Mobile</label>
                                            </div>
                                            <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                style="width: 100%;">
                                                <div name="mobile_phone" class="o_field_widget o_field_phone">
                                                    <div class="o_phone_content d-inline-flex w-100"><input
                                                            class="o_input" type="tel" autocomplete="off"
                                                            id="mobile_phone_0"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                            <div
                                                class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                <label class="o_form_label" for="work_phone_0">Work Phone</label></div>
                                            <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                style="width: 100%;">
                                                <div name="work_phone" class="o_field_widget o_field_phone">
                                                    <div class="o_phone_content d-inline-flex w-100"><input
                                                            class="o_input" type="tel" autocomplete="off"
                                                            id="work_phone_0"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                            <div
                                                class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                <label class="o_form_label" for="work_email_0">Work Email</label></div>
                                            <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                style="width: 100%;">
                                                <div name="work_email" class="o_field_widget o_field_email">
                                                    <div class="d-inline-flex w-100"><input class="o_input" type="email"
                                                            autocomplete="off" id="work_email_0"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                            <div
                                                class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                <label class="o_form_label" for="category_ids_0">Tags</label></div>
                                            <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                style="width: 100%;">
                                                <div name="category_ids" class="o_field_widget o_field_many2many_tags">
                                                    <div
                                                        class="o_field_tags d-inline-flex flex-wrap gap-1 mw-100 o_tags_input o_input">
                                                        <div class="o_field_many2many_selection d-inline-flex w-100">
                                                            <div class="o_input_dropdown">
                                                                <div class="o-autocomplete dropdown"><input type="text"
                                                                        class="o-autocomplete--input o_input"
                                                                        autocomplete="off" role="combobox"
                                                                        aria-autocomplete="list" aria-haspopup="listbox"
                                                                        id="category_ids_0" placeholder="Tags"
                                                                        aria-expanded="false"></div><span
                                                                    class="o_dropdown_button"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="o_inner_group grid col-lg-6">
                                        <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                            <div
                                                class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                <label class="o_form_label" for="department_id_0">Department</label>
                                            </div>
                                            <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                style="width: 100%;">
                                                <div name="department_id" class="o_field_widget o_field_many2one">
                                                    <div class="o_field_many2one_selection">
                                                        <div class="o_input_dropdown">
                                                            <div class="o-autocomplete dropdown"><input type="text"
                                                                    class="o-autocomplete--input o_input"
                                                                    autocomplete="off" role="combobox"
                                                                    aria-autocomplete="list" aria-haspopup="listbox"
                                                                    id="department_id_0" placeholder=""
                                                                    aria-expanded="false"></div><span
                                                                class="o_dropdown_button"></span>
                                                        </div>
                                                    </div>
                                                    <div class="o_field_many2one_extra"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                            <div
                                                class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                <label class="o_form_label" for="job_id_0">Job Position</label></div>
                                            <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                style="width: 100%;">
                                                <div name="job_id" class="o_field_widget o_field_many2one">
                                                    <div class="o_field_many2one_selection">
                                                        <div class="o_input_dropdown">
                                                            <div class="o-autocomplete dropdown"><input type="text"
                                                                    class="o-autocomplete--input o_input"
                                                                    autocomplete="off" role="combobox"
                                                                    aria-autocomplete="list" aria-haspopup="listbox"
                                                                    id="job_id_0" placeholder="" aria-expanded="false">
                                                            </div><span class="o_dropdown_button"></span>
                                                        </div>
                                                    </div>
                                                    <div class="o_field_many2one_extra"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                            <div
                                                class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                <label class="o_form_label" for="parent_id_0">Manager</label></div>
                                            <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                style="width: 100%;">
                                                <div name="parent_id"
                                                    class="o_field_widget o_field_many2one_avatar_user o_field_many2one_avatar">
                                                    <div class="d-flex align-items-center gap-1"><span
                                                            class="o_avatar o_m2o_avatar"><span
                                                                class="o_avatar_empty o_m2o_avatar_empty"></span></span>
                                                        <div class="o_field_many2one_selection">
                                                            <div class="o_input_dropdown">
                                                                <div class="o-autocomplete dropdown"><input type="text"
                                                                        class="o-autocomplete--input o_input"
                                                                        autocomplete="off" role="combobox"
                                                                        aria-autocomplete="list" aria-haspopup="listbox"
                                                                        id="parent_id_0" placeholder=""
                                                                        aria-expanded="false"></div><span
                                                                    class="o_dropdown_button"></span>
                                                            </div>
                                                        </div>
                                                        <div class="o_field_many2one_extra"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                            <div
                                                class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                <label class="o_form_label" for="coach_id_0">Coach<sup
                                                        class="text-info p-1" data-tooltip-template="web.FieldTooltip"
                                                        data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;Select the \&quot;Employee\&quot; who is the coach of this employee.\nThe \&quot;Coach\&quot; has no specific rights or responsibilities by default.&quot;}}"
                                                        data-tooltip-touch-tap-to-show="true">?</sup></label></div>
                                            <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                style="width: 100%;">
                                                <div name="coach_id"
                                                    class="o_field_widget o_field_many2one_avatar_user o_field_many2one_avatar">
                                                    <div class="d-flex align-items-center gap-1"><span
                                                            class="o_avatar o_m2o_avatar"><span
                                                                class="o_avatar_empty o_m2o_avatar_empty"></span></span>
                                                        <div class="o_field_many2one_selection">
                                                            <div class="o_input_dropdown">
                                                                <div class="o-autocomplete dropdown"><input type="text"
                                                                        class="o-autocomplete--input o_input"
                                                                        autocomplete="off" role="combobox"
                                                                        aria-autocomplete="list" aria-haspopup="listbox"
                                                                        id="coach_id_0" placeholder=""
                                                                        aria-expanded="false"></div><span
                                                                    class="o_dropdown_button"></span>
                                                            </div>
                                                        </div>
                                                        <div class="o_field_many2one_extra"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div name="employee_properties" class="o_field_widget o_field_properties">
                                    <div class="row d-none" columns="2">
                                        <div class="o_inner_group o_group col-lg-6 o_property_group" property-name="">
                                        </div>
                                        <div class="o_inner_group o_group col-lg-6 o_property_group" property-name="">
                                        </div>
                                    </div>
                                </div>
                                <div class="o_notebook d-flex w-100 horizontal flex-column">
                                    <div class="o_notebook_headers">
                                        <ul class="nav nav-tabs flex-row flex-nowrap">
                                            <li class="nav-item flex-nowrap cursor-pointer"><a class="nav-link active"
                                                    href="#" role="tab" tabindex="0" name="skills_resume">Resume</a>
                                            </li>
                                            <li class="nav-item flex-nowrap cursor-pointer"><a class="nav-link" href="#"
                                                    role="tab" tabindex="0" name="public">Work Information</a></li>
                                            <li class="nav-item flex-nowrap cursor-pointer"><a class="nav-link" href="#"
                                                    role="tab" tabindex="0" name="personal_information">Private
                                                    Information</a></li>
                                            <li class="nav-item flex-nowrap cursor-pointer"><a class="nav-link" href="#"
                                                    role="tab" tabindex="0" name="hr_settings">HR Settings</a></li>
                                        </ul>
                                    </div>
                                    <div class="o_notebook_content tab-content">
                                        <div class="tab-pane active fade show">
                                            <div class="row">
                                                <div
                                                    class="o_hr_skills_editable o_hr_skills_group o_group_resume col-lg-7 d-flex flex-column">
                                                    <div
                                                        class="o_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small mb-4">
                                                        Resume</div>
                                                    <div name="resume_line_ids"
                                                        class="o_field_widget o_field_resume_one2many">
                                                        <div class="o_list_view o_field_x2many o_field_x2many_list">
                                                            <div class="o_x2m_control_panel d-empty-none mb-4"></div>
                                                            <div class="o_list_renderer o_renderer table-responsive"
                                                                tabindex="-1">
                                                                <table
                                                                    class="o_list_table table table-sm table-hover position-relative mb-0 o_list_table_ungrouped table-striped mb-1 o_skill_table table-borderless">
                                                                    <thead style="visibility: collapse;">
                                                                        <tr>
                                                                            <th style="width: 32px; min-width: 32px;">
                                                                            </th>
                                                                            <th class="w-100"></th>
                                                                            <th class="o_list_actions_header"
                                                                                style="width: 32px; min-width: 32px">
                                                                            </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody class="ui-sortable">
                                                                        <tr
                                                                            class="o_group_has_content o_group_header o_resume_group_header">
                                                                            <th tabindex="-1" class="o_group_name"
                                                                                colspan="3">
                                                                                <div
                                                                                    class="d-flex justify-content-between align-items-center">
                                                                                    <span>Experience</span><button
                                                                                        class="btn btn-secondary btn-sm"
                                                                                        role="button">ADD</button></div>
                                                                            </th>
                                                                            <th></th>
                                                                        </tr>
                                                                        <tr class="o_data_row" data-id="datapoint_4">
                                                                            <td
                                                                                class="o_resume_timeline_cell position-relative pe-lg-2">
                                                                                <div
                                                                                    class="rounded-circle bg-info position-relative">
                                                                                </div>
                                                                            </td>
                                                                            <td class="o_data_cell pt-0">
                                                                                <div class="o_resume_line"><small
                                                                                        class="o_resume_line_dates fw-bold">02/08/2024
                                                                                        - Current</small>
                                                                                    <h4
                                                                                        class="o_resume_line_title mt-2">
                                                                                        Yantra Design</h4>
                                                                                </div>
                                                                            </td>
                                                                            <td class="o_list_record_remove w-print-0 p-print-0 text-center"
                                                                                tabindex="-1"><button
                                                                                    class="fa d-print-none fa-trash-o"
                                                                                    name="delete"
                                                                                    aria-label="Delete row"
                                                                                    tabindex="-1"></button></td>
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
                                                <div
                                                    class="o_hr_skills_editable o_hr_skills_group o_group_skills col-lg-5 d-flex flex-column">
                                                    <div name="employee_skill_ids"
                                                        class="o_field_widget o_field_skills_one2many mt-2">
                                                        <div class="o_list_view o_field_x2many o_field_x2many_list">
                                                            <div class="o_x2m_control_panel d-empty-none mb-4"></div>
                                                            <div class="o_list_renderer o_renderer table-responsive"
                                                                tabindex="-1">
                                                                <div name="skills_header"
                                                                    class="text-uppercase fw-bolder small ms-3"
                                                                    style="margin-top: 2rem; box-shadow: 0 1px 0 #e6e6e6">
                                                                    Skills <a
                                                                        class="float-end me-3 cursor-pointer"><span
                                                                            class="fa fa-line-chart me-1"></span>
                                                                        Timeline </a></div>
                                                                <table
                                                                    class="o_list_table table table-sm table-hover position-relative mb-0 o_list_table_ungrouped table-striped mb-1 d-none o_skill_table"
                                                                    style="table-layout: fixed;">
                                                                    <thead style="visibility: collapse;">
                                                                        <tr>
                                                                            <th data-tooltip-delay="1000" tabindex="-1"
                                                                                data-name="skill_id"
                                                                                class="align-middle o_column_sortable position-relative cursor-pointer opacity-trigger-hover w-print-auto"
                                                                                data-tooltip="Skill"
                                                                                style="width: 159px;">
                                                                                <div class="d-flex"><span
                                                                                        class="d-block min-w-0 text-truncate flex-grow-1">Skill</span><i
                                                                                        class="fa fa-lg fa-angle-down opacity-0 opacity-75-hover"></i>
                                                                                </div><span
                                                                                    class="o_resize position-absolute top-0 end-0 bottom-0 ps-1 bg-black-25 opacity-0 opacity-50-hover z-1"></span>
                                                                            </th>
                                                                            <th data-tooltip-delay="1000" tabindex="-1"
                                                                                data-name="skill_level_id"
                                                                                class="align-middle o_column_sortable position-relative cursor-pointer opacity-trigger-hover w-print-auto"
                                                                                data-tooltip="Skill Level"
                                                                                style="width: 148px;">
                                                                                <div class="d-flex"><span
                                                                                        class="d-block min-w-0 text-truncate flex-grow-1">Skill
                                                                                        Level</span><i
                                                                                        class="fa fa-lg fa-angle-down opacity-0 opacity-75-hover"></i>
                                                                                </div><span
                                                                                    class="o_resize position-absolute top-0 end-0 bottom-0 ps-1 bg-black-25 opacity-0 opacity-50-hover z-1"></span>
                                                                            </th>
                                                                            <th data-tooltip-delay="1000" tabindex="-1"
                                                                                data-name="level_progress"
                                                                                class="align-middle o_column_sortable position-relative cursor-pointer o_list_number_th o_progressbar_cell opacity-trigger-hover w-print-auto"
                                                                                data-tooltip="Progress"
                                                                                style="width: 148px;">
                                                                                <div class="d-flex flex-row-reverse">
                                                                                    <span
                                                                                        class="d-block min-w-0 text-truncate flex-grow-1 o_list_number_th">Progress</span><i
                                                                                        class="fa fa-lg fa-angle-down opacity-0 opacity-75-hover"></i>
                                                                                </div><span
                                                                                    class="o_resize position-absolute top-0 end-0 bottom-0 ps-1 bg-black-25 opacity-0 opacity-50-hover z-1"></span>
                                                                            </th>
                                                                            <th class="o_list_controller o_list_actions_header w-print-0 p-print-0 position-sticky end-0"
                                                                                style="width: 32px;">
                                                                                <div
                                                                                    class="o_optional_columns_dropdown d-print-none text-center border-top-0">
                                                                                    <button
                                                                                        class="btn p-0 o-dropdown dropdown-toggle dropdown"
                                                                                        tabindex="-1"
                                                                                        aria-expanded="false"><i
                                                                                            class="o_optional_columns_dropdown_toggle oi oi-fw oi-settings-adjust"></i></button>
                                                                                </div>
                                                                            </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody class="ui-sortable"></tbody>
                                                                    <tfoot class="o_list_footer cursor-default">
                                                                        <tr>
                                                                            <td></td>
                                                                            <td></td>
                                                                            <td></td>
                                                                            <td class="w-print-0 p-print-0"></td>
                                                                        </tr>
                                                                    </tfoot>
                                                                </table>
                                                                <div name="no_skills" class="ms-3 mt-3">
                                                                    <p> There are no skills defined in the library.<br>
                                                                        Why not try adding some ? </p><button
                                                                        class="btn btn-secondary ms-4 mt-3 text-center"
                                                                        role="button"> Create new Skills </button>
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
                        <div class="o-mail-ChatterContainer o-mail-Form-chatter o-aside w-print-100">
                            <div class="o-mail-Chatter w-100 h-100 flex-grow-1 d-flex flex-column overflow-auto">
                                <div class="o-mail-Chatter-top d-print-none position-sticky top-0">
                                    <div class="o-mail-Chatter-topbar d-flex flex-shrink-0 flex-grow-0 overflow-x-auto">
                                        <button class="o-mail-Chatter-sendMessage btn text-nowrap me-1 btn-primary my-2"
                                            data-hotkey="m"> Send message </button><button
                                            class="o-mail-Chatter-logNote btn text-nowrap me-1 btn-secondary my-2"
                                            data-hotkey="shift+m"> Log note </button>
                                        <div class="flex-grow-1 d-flex"><button
                                                class="o-mail-Chatter-activity btn btn-secondary text-nowrap my-2"
                                                data-hotkey="shift+a"><span>Activities</span></button><span
                                                class="o-mail-Chatter-topbarGrow flex-grow-1 pe-2"></span><button
                                                class="btn btn-link text-action" aria-label="Search Messages"
                                                title="Search Messages"><i class="oi oi-search"
                                                    role="img"></i></button><button
                                                class="o-mail-Chatter-attachFiles btn btn-link text-action px-1 d-flex align-items-center my-2"
                                                aria-label="Attach files"><i
                                                    class="fa fa-paperclip fa-lg me-1"></i><sup>1</sup></button>
                                            <div class="o-mail-Followers d-flex me-1"><button
                                                    class="o-mail-Followers-button btn btn-link d-flex align-items-center text-action px-1 my-2 o-dropdown dropdown-toggle dropdown"
                                                    title="Show Followers" aria-expanded="false"><i
                                                        class="fa fa-user-o me-1" role="img"></i><sup
                                                        class="o-mail-Followers-counter">2</sup></button></div><button
                                                class="btn px-0 text-success my-2">
                                                <div class="position-relative"><span
                                                        class="d-flex invisible text-nowrap">Following</span><span
                                                        class="o-mail-Chatter-follow position-absolute end-0 top-0">Following</span>
                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="o-mail-Chatter-content">
                                    <div class="o-mail-Thread position-relative flex-grow-1 d-flex flex-column overflow-auto pb-4"
                                        tabindex="-1">
                                        <div class="d-flex flex-column position-relative flex-grow-1"><span
                                                class="position-absolute w-100 invisible top-0"
                                                style="height: Min(1155px, 100%)"></span><span></span>
                                            <div
                                                class="o-mail-DateSection d-flex align-items-center w-100 fw-bold z-1 pt-2">
                                                <hr class="o-discuss-separator flex-grow-1"><span
                                                    class="px-3 opacity-75 small text-muted">Today</span>
                                                <hr class="o-discuss-separator flex-grow-1">
                                            </div>
                                            <div class="o-mail-Message position-relative pt-1 o-selfAuthored mt-1"
                                                role="group" aria-label="System notification">
                                                <div class="o-mail-Message-core position-relative d-flex flex-shrink-0">
                                                    <div
                                                        class="o-mail-Message-sidebar d-flex flex-shrink-0 align-items-start justify-content-start">
                                                        <div class="o-mail-Message-avatarContainer position-relative bg-view cursor-pointer"
                                                            aria-label="Open card"><img
                                                                class="o-mail-Message-avatar w-100 h-100 rounded o_object_fit_cover o_redirect cursor-pointer"
                                                               
                                                                src="http://127.0.0.1:8000/images/employees.png">
                                                        </div>
                                                    </div>
                                                    <div class="w-100 o-min-width-0">
                                                        <div
                                                            class="o-mail-Message-header d-flex flex-wrap align-items-baseline lh-1 mb-1">
                                                            <span
                                                                class="o-mail-Message-author cursor-pointer o-hover-text-underline"
                                                                aria-label="Open card"><strong
                                                                    class="me-1 text-truncate">info@yantradesign.co.in</strong></span><small
                                                                class="o-mail-Message-date text-muted opacity-75 o-smaller"
                                                                title="2/8/2024, 10:26:55 am">- 27 minutes ago</small>
                                                        </div>
                                                        <div class="position-relative d-flex">
                                                            <div class="o-mail-Message-content o-min-width-0">
                                                                <div
                                                                    class="o-mail-Message-textContent position-relative d-flex">
                                                                    <div>
                                                                        <div>
                                                                            <div
                                                                                class="o-mail-Message-body text-break mb-0 w-100">
                                                                                <p>
                                                                                    <span
                                                                                        class="fa fa-check fa-fw"></span><span>To-Do</span>
                                                                                    done
                                                                                    <span>: </span><span>testing
                                                                                        purpose</span>
                                                                                </p>

                                                                                <div class="o_mail_note_title fw-bold">
                                                                                    Original note:</div>
                                                                                <div>
                                                                                    <ul>
                                                                                        <li><br></li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="o-mail-Message-actions d-print-none ms-2 mt-1 invisible">
                                                                        <div class="d-flex rounded-1 overflow-hidden">
                                                                            <button
                                                                                class="btn px-1 py-0 lh-1 rounded-0 rounded-start-1"
                                                                                tabindex="1" title="Add a Reaction"
                                                                                aria-label="Add a Reaction"><i
                                                                                    class="oi fa-lg oi-smile-add"></i></button><button
                                                                                class="btn px-1 py-0 rounded-0 rounded-end-1"
                                                                                title="Mark as Todo"
                                                                                name="toggle-star"><i
                                                                                    class="fa fa-lg fa-star-o"></i></button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="o-mail-Message position-relative pt-1 o-selfAuthored mt-1"
                                                role="group" aria-label="Note">
                                                <div class="o-mail-Message-core position-relative d-flex flex-shrink-0">
                                                    <div
                                                        class="o-mail-Message-sidebar d-flex flex-shrink-0 align-items-start justify-content-start">
                                                        <div class="o-mail-Message-avatarContainer position-relative bg-view cursor-pointer"
                                                            aria-label="Open card"><img
                                                                class="o-mail-Message-avatar w-100 h-100 rounded o_object_fit_cover o_redirect cursor-pointer"
                                                                src="http://127.0.0.1:8000/images/employees.png">
                                                        </div>
                                                    </div>
                                                    <div class="w-100 o-min-width-0">
                                                        <div
                                                            class="o-mail-Message-header d-flex flex-wrap align-items-baseline lh-1">
                                                            <span
                                                                class="o-mail-Message-author cursor-pointer o-hover-text-underline"
                                                                aria-label="Open card"><strong
                                                                    class="me-1 text-truncate">info@yantradesign.co.in</strong></span><small
                                                                class="o-mail-Message-date text-muted opacity-75 o-smaller"
                                                                title="2/8/2024, 10:26:11 am">- 28 minutes ago</small>
                                                            <div
                                                                class="o-mail-Message-actions d-print-none ms-2 my-n2 invisible">
                                                                <div class="d-flex rounded-1 overflow-hidden"><button
                                                                        class="btn px-1 py-0 lh-1 rounded-0 rounded-start-1"
                                                                        tabindex="1" title="Add a Reaction"
                                                                        aria-label="Add a Reaction"><i
                                                                            class="oi fa-lg oi-smile-add"></i></button><button
                                                                        class="btn px-1 py-0 rounded-0"
                                                                        title="Mark as Todo" name="toggle-star"><i
                                                                            class="fa fa-lg fa-star-o"></i></button>
                                                                    <div class="d-flex rounded-0"><button
                                                                            class="btn px-1 py-0 rounded-0 rounded-end-1 o-dropdown dropdown-toggle dropdown"
                                                                            title="Expand" aria-expanded="false"><i
                                                                                class="fa fa-lg fa-ellipsis-h"
                                                                                tabindex="1"></i></button></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="position-relative d-flex">
                                                            <div class="o-mail-Message-content o-min-width-0 pt-1">
                                                                <div
                                                                    class="o-mail-Message-textContent position-relative d-flex">
                                                                    <div
                                                                        class="position-relative overflow-x-auto d-inline-block">
                                                                        <div
                                                                            class="o-mail-Message-bubble rounded-bottom-3 position-absolute top-0 start-0 w-100 h-100 rounded-end-3">
                                                                        </div>
                                                                        <div
                                                                            class="position-relative text-break o-mail-Message-body p-1">
                                                                            <p>karan vora 2</p>
                                                                        </div>
                                                                        <div
                                                                            class="o-mail-Message-seenContainer position-absolute bottom-0">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="o-mail-Message position-relative pt-1 o-selfAuthored mt-1"
                                                role="group" aria-label="Message">
                                                <div class="o-mail-Message-core position-relative d-flex flex-shrink-0">
                                                    <div
                                                        class="o-mail-Message-sidebar d-flex flex-shrink-0 align-items-start justify-content-start">
                                                        <div class="o-mail-Message-avatarContainer position-relative bg-view cursor-pointer"
                                                            aria-label="Open card"><img
                                                                class="o-mail-Message-avatar w-100 h-100 rounded o_object_fit_cover o_redirect cursor-pointer"
                                                                src="http://127.0.0.1:8000/images/employees.png">
                                                        </div>
                                                    </div>
                                                    <div class="w-100 o-min-width-0">
                                                        <div
                                                            class="o-mail-Message-header d-flex flex-wrap align-items-baseline lh-1 mb-1">
                                                            <span
                                                                class="o-mail-Message-author cursor-pointer o-hover-text-underline"
                                                                aria-label="Open card"><strong
                                                                    class="me-1 text-truncate">info@yantradesign.co.in</strong></span>
                                                            <div class="mx-1"><span
                                                                    class="o-mail-Message-notification cursor-pointer text-danger"
                                                                    role="button" tabindex="0"><i role="img"
                                                                        aria-label="Delivery failure"
                                                                        class="fa fa-envelope"></i> </span></div><small
                                                                class="o-mail-Message-date text-muted opacity-75 o-smaller"
                                                                title="2/8/2024, 10:25:59 am">- 28 minutes ago</small>
                                                        </div>
                                                        <div class="position-relative d-flex">
                                                            <div class="o-mail-Message-content o-min-width-0">
                                                                <div
                                                                    class="o-mail-Message-textContent position-relative d-flex">
                                                                    <div
                                                                        class="position-relative overflow-x-auto d-inline-block">
                                                                        <div
                                                                            class="o-mail-Message-bubble rounded-bottom-3 position-absolute top-0 start-0 w-100 h-100 bg-success-light border border-success opacity-25 rounded-end-3">
                                                                        </div>
                                                                        <div
                                                                            class="position-relative text-break o-mail-Message-body mb-0 py-2 px-3 align-self-start rounded-end-3 rounded-bottom-3">
                                                                            <p>karan vora</p>
                                                                        </div>
                                                                        <div
                                                                            class="o-mail-Message-seenContainer position-absolute bottom-0">
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="o-mail-Message-actions d-print-none ms-2 mt-1 invisible">
                                                                        <div class="d-flex rounded-1 overflow-hidden">
                                                                            <button
                                                                                class="btn px-1 py-0 lh-1 rounded-0 rounded-start-1"
                                                                                tabindex="1" title="Add a Reaction"
                                                                                aria-label="Add a Reaction"><i
                                                                                    class="oi fa-lg oi-smile-add"></i></button><button
                                                                                class="btn px-1 py-0 rounded-0"
                                                                                title="Mark as Todo"
                                                                                name="toggle-star"><i
                                                                                    class="fa fa-lg fa-star-o"></i></button>
                                                                            <div class="d-flex rounded-0"><button
                                                                                    class="btn px-1 py-0 rounded-0 rounded-end-1 o-dropdown dropdown-toggle dropdown"
                                                                                    title="Expand"
                                                                                    aria-expanded="false"><i
                                                                                        class="fa fa-lg fa-ellipsis-h"
                                                                                        tabindex="1"></i></button></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="o-mail-Message position-relative pt-1 o-selfAuthored mt-1"
                                                role="group" aria-label="Note">
                                                <div class="o-mail-Message-core position-relative d-flex flex-shrink-0">
                                                    <div
                                                        class="o-mail-Message-sidebar d-flex flex-shrink-0 align-items-start justify-content-start">
                                                        <div class="o-mail-Message-avatarContainer position-relative bg-view cursor-pointer"
                                                            aria-label="Open card"><img
                                                                class="o-mail-Message-avatar w-100 h-100 rounded o_object_fit_cover o_redirect cursor-pointer"
                                                                src="http://127.0.0.1:8000/images/employees.png">
                                                        </div>
                                                    </div>
                                                    <div class="w-100 o-min-width-0">
                                                        <div
                                                            class="o-mail-Message-header d-flex flex-wrap align-items-baseline lh-1">
                                                            <span
                                                                class="o-mail-Message-author cursor-pointer o-hover-text-underline"
                                                                aria-label="Open card"><strong
                                                                    class="me-1 text-truncate">info@yantradesign.co.in</strong></span><small
                                                                class="o-mail-Message-date text-muted opacity-75 o-smaller"
                                                                title="2/8/2024, 10:23:51 am">- 31 minutes ago</small>
                                                            <div
                                                                class="o-mail-Message-actions d-print-none ms-2 my-n2 invisible">
                                                                <div class="d-flex rounded-1 overflow-hidden"><button
                                                                        class="btn px-1 py-0 lh-1 rounded-0 rounded-start-1"
                                                                        tabindex="1" title="Add a Reaction"
                                                                        aria-label="Add a Reaction"><i
                                                                            class="oi fa-lg oi-smile-add"></i></button><button
                                                                        class="btn px-1 py-0 rounded-0"
                                                                        title="Mark as Todo" name="toggle-star"><i
                                                                            class="fa fa-lg fa-star-o"></i></button>
                                                                    <div class="d-flex rounded-0"><button
                                                                            class="btn px-1 py-0 rounded-0 rounded-end-1 o-dropdown dropdown-toggle dropdown"
                                                                            title="Expand" aria-expanded="false"><i
                                                                                class="fa fa-lg fa-ellipsis-h"
                                                                                tabindex="1"></i></button></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="position-relative d-flex">
                                                            <div class="o-mail-Message-content o-min-width-0 pt-1">
                                                                <div
                                                                    class="o-mail-Message-textContent position-relative d-flex">
                                                                </div>
                                                                <div
                                                                    class="o-mail-AttachmentList overflow-y-auto d-flex flex-column mt-1">
                                                                    <div class="d-flex flex-grow-1 flex-wrap mx-1 align-items-center"
                                                                        role="menu"></div>
                                                                    <div class="grid row-gap-0 column-gap-0">
                                                                        <div class="o-mail-AttachmentCard d-flex rounded mb-1 me-1 mw-100 overflow-auto g-col-4 bg-300"
                                                                            role="menu" title="NIVODA.xlsx"
                                                                            aria-label="NIVODA.xlsx">
                                                                            <div class="o-mail-AttachmentCard-image o_image flex-shrink-0 m-1"
                                                                                role="menuitem" aria-label="Preview"
                                                                                tabindex="-1"
                                                                                data-mimetype="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
                                                                            </div>
                                                                            <div
                                                                                class="overflow-auto d-flex justify-content-center flex-column px-1">
                                                                                <div class="text-truncate">NIVODA.xlsx
                                                                                </div><small
                                                                                    class="text-uppercase">xlsx</small>
                                                                            </div>
                                                                            <div class="flex-grow-1"></div>
                                                                            <div
                                                                                class="o-mail-AttachmentCard-aside position-relative rounded-end overflow-hidden d-flex">
                                                                                <button
                                                                                    class="btn d-flex align-items-center justify-content-center w-100 h-100 rounded-0 bg-300"
                                                                                    title="Download"><i
                                                                                        class="fa fa-download"
                                                                                        role="img"
                                                                                        aria-label="Download"></i></button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="o-mail-Message position-relative pt-1 o-selfAuthored mt-1"
                                                role="group" aria-label="Note">
                                                <div class="o-mail-Message-core position-relative d-flex flex-shrink-0">
                                                    <div
                                                        class="o-mail-Message-sidebar d-flex flex-shrink-0 align-items-start justify-content-start">
                                                        <div class="o-mail-Message-avatarContainer position-relative bg-view cursor-pointer"
                                                            aria-label="Open card"><img
                                                                class="o-mail-Message-avatar w-100 h-100 rounded o_object_fit_cover o_redirect cursor-pointer"
                                                                src="http://127.0.0.1:8000/images/employees.png">
                                                        </div>
                                                    </div>
                                                    <div class="w-100 o-min-width-0">
                                                        <div
                                                            class="o-mail-Message-header d-flex flex-wrap align-items-baseline lh-1">
                                                            <span
                                                                class="o-mail-Message-author cursor-pointer o-hover-text-underline"
                                                                aria-label="Open card"><strong
                                                                    class="me-1 text-truncate">info@yantradesign.co.in</strong></span><small
                                                                class="o-mail-Message-date text-muted opacity-75 o-smaller"
                                                                title="2/8/2024, 10:23:41 am">- 31 minutes ago</small>
                                                            <div
                                                                class="o-mail-Message-actions d-print-none ms-2 my-n2 invisible">
                                                                <div class="d-flex rounded-1 overflow-hidden"><button
                                                                        class="btn px-1 py-0 lh-1 rounded-0 rounded-start-1"
                                                                        tabindex="1" title="Add a Reaction"
                                                                        aria-label="Add a Reaction"><i
                                                                            class="oi fa-lg oi-smile-add"></i></button><button
                                                                        class="btn px-1 py-0 rounded-0"
                                                                        title="Mark as Todo" name="toggle-star"><i
                                                                            class="fa fa-lg fa-star-o"></i></button>
                                                                    <div class="d-flex rounded-0"><button
                                                                            class="btn px-1 py-0 rounded-0 rounded-end-1 o-dropdown dropdown-toggle dropdown"
                                                                            title="Expand" aria-expanded="false"><i
                                                                                class="fa fa-lg fa-ellipsis-h"
                                                                                tabindex="1"></i></button></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="position-relative d-flex">
                                                            <div class="o-mail-Message-content o-min-width-0 pt-1">
                                                                <div
                                                                    class="o-mail-Message-textContent position-relative d-flex">
                                                                    <div
                                                                        class="position-relative overflow-x-auto d-inline-block">
                                                                        <div
                                                                            class="o-mail-Message-bubble rounded-bottom-3 position-absolute top-0 start-0 w-100 h-100 rounded-end-3">
                                                                        </div>
                                                                        <div
                                                                            class="position-relative text-break o-mail-Message-body p-1">
                                                                            <p>bhvg</p>
                                                                        </div>
                                                                        <div
                                                                            class="o-mail-Message-seenContainer position-absolute bottom-0">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="o-mail-Message position-relative pt-1 o-selfAuthored mt-1"
                                                role="group" aria-label="System notification">
                                                <div class="o-mail-Message-core position-relative d-flex flex-shrink-0">
                                                    <div
                                                        class="o-mail-Message-sidebar d-flex flex-shrink-0 align-items-start justify-content-start">
                                                        <div class="o-mail-Message-avatarContainer position-relative bg-view cursor-pointer"
                                                            aria-label="Open card"><img
                                                                class="o-mail-Message-avatar w-100 h-100 rounded o_object_fit_cover o_redirect cursor-pointer"
                                                                src="http://127.0.0.1:8000/images/employees.png">
                                                        </div>
                                                    </div>
                                                    <div class="w-100 o-min-width-0">
                                                        <div
                                                            class="o-mail-Message-header d-flex flex-wrap align-items-baseline lh-1">
                                                            <span
                                                                class="o-mail-Message-author cursor-pointer o-hover-text-underline"
                                                                aria-label="Open card"><strong
                                                                    class="me-1 text-truncate">info@yantradesign.co.in</strong></span><small
                                                                class="o-mail-Message-date text-muted opacity-75 o-smaller"
                                                                title="2/8/2024, 10:23:33 am">- 31 minutes ago</small>
                                                            <div
                                                                class="o-mail-Message-actions d-print-none ms-2 my-n2 invisible">
                                                                <div class="d-flex rounded-1 overflow-hidden"><button
                                                                        class="btn px-1 py-0 lh-1 rounded-0 rounded-start-1"
                                                                        tabindex="1" title="Add a Reaction"
                                                                        aria-label="Add a Reaction"><i
                                                                            class="oi fa-lg oi-smile-add"></i></button><button
                                                                        class="btn px-1 py-0 rounded-0 rounded-end-1"
                                                                        title="Mark as Todo" name="toggle-star"><i
                                                                            class="fa fa-lg fa-star-o"></i></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="position-relative d-flex">
                                                            <div class="o-mail-Message-content o-min-width-0 pt-1">
                                                                <div
                                                                    class="o-mail-Message-textContent position-relative d-flex">
                                                                    <div>
                                                                        <div>
                                                                            <div
                                                                                class="o-mail-Message-body text-break mb-0 w-100">
                                                                                <span><b>Congratulations!</b> May I
                                                                                    recommend you to setup an <a
                                                                                        href="/web#action=hr.plan_wizard_action&amp;active_id=2&amp;active_model=hr.employee&amp;menu_id=291">onboarding
                                                                                        plan?</a></span></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="o-mail-Message position-relative pt-1 o-selfAuthored mt-1"
                                                role="group" aria-label="System notification">
                                                <div class="o-mail-Message-core position-relative d-flex flex-shrink-0">
                                                    <div
                                                        class="o-mail-Message-sidebar d-flex flex-shrink-0 align-items-start justify-content-start">
                                                        <div class="o-mail-Message-avatarContainer position-relative bg-view cursor-pointer"
                                                            aria-label="Open card"><img
                                                                class="o-mail-Message-avatar w-100 h-100 rounded o_object_fit_cover o_redirect cursor-pointer"
                                                                src="http://127.0.0.1:8000/images/employees.png">
                                                        </div>
                                                    </div>
                                                    <div class="w-100 o-min-width-0">
                                                        <div
                                                            class="o-mail-Message-header d-flex flex-wrap align-items-baseline lh-1">
                                                            <span
                                                                class="o-mail-Message-author cursor-pointer o-hover-text-underline"
                                                                aria-label="Open card"><strong
                                                                    class="me-1 text-truncate">info@yantradesign.co.in</strong></span><small
                                                                class="o-mail-Message-date text-muted opacity-75 o-smaller"
                                                                title="2/8/2024, 10:23:33 am">- 31 minutes ago</small>
                                                            <div
                                                                class="o-mail-Message-actions d-print-none ms-2 my-n2 invisible">
                                                                <div class="d-flex rounded-1 overflow-hidden"><button
                                                                        class="btn px-1 py-0 lh-1 rounded-0 rounded-start-1"
                                                                        tabindex="1" title="Add a Reaction"
                                                                        aria-label="Add a Reaction"><i
                                                                            class="oi fa-lg oi-smile-add"></i></button><button
                                                                        class="btn px-1 py-0 rounded-0 rounded-end-1"
                                                                        title="Mark as Todo" name="toggle-star"><i
                                                                            class="fa fa-lg fa-star-o"></i></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="position-relative d-flex">
                                                            <div class="o-mail-Message-content o-min-width-0 pt-1">
                                                                <div
                                                                    class="o-mail-Message-textContent position-relative d-flex">
                                                                    <div>
                                                                        <div>
                                                                            <div
                                                                                class="o-mail-Message-body text-break mb-0 w-100">
                                                                                <p>Employee created</p>
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

    @endsection