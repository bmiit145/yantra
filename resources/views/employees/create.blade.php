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
<meta name="csrf-token" content="{{ csrf_token() }}">

<style>
    #newResumeModal {
        display: none;
    }

</style>
<body>

    <button type="button" class="o_form_button_save btn btn-light px-1 py-0 lh-sm" id="main_save_btn" data-hotkey="s" data-tooltip="Save manually" aria-label="Save manually" title="Save Button">
        <i class="fa fa-cloud-upload fa-fw"></i>
    </button>

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
                            <div class="o_form_statusbar position-relative d-flex justify-content-between mb-0 mb-md-2 pb-2 pb-md-0">
                                <div class="o_statusbar_buttons d-flex align-items-center align-content-around flex-wrap gap-1">
                                    <button invisible="not active or not id" class="btn btn-secondary" name="426" type="action"><span>Launch Plan</span></button>
                                </div>
                            </div>
                            <div class="o_form_sheet position-relative">


                                <form action="" method="POST" id="employeeForm" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="employee_id" value="{{ $employee->id ?? '' }}">
                                    <div class="row justify-content-between position-relative w-100 m-0 mb-2">
                                        <div class="oe_title mw-75 ps-0 pe-2">
                                            <h1 class="d-flex flex-row align-items-center">
                                                <div name="name" class="o_field_widget o_required_modifier o_field_char" style="font-size: min(4vw, 2.6rem);"><input class="o_input" name="name" id="name_0" type="text" value="{{$employee->name ?? ''}}" autocomplete="off" placeholder="Employee's Name"></div>
                                            </h1>
                                            <h2>
                                                <div name="job_title" class="o_field_widget o_field_char"><input class="o_input" name="job_title" id="job_title_0" value="{{$employee->job_title ?? ''}}" type="text" autocomplete="off" placeholder="Job Title">
                                                </div>
                                            </h2>
                                        </div>
                                        <div class="o_employee_avatar m-0 p-0">
                                            <div name="image_1920" class="o_field_widget o_field_image oe_avatar m-0">
                                                <div class="d-inline-block position-relative opacity-trigger-hover">

                                                    <div aria-atomic="true" class="position-absolute d-flex justify-content-between w-100 bottom-0 opacity-0 opacity-100-hover">

                                                        <span style="display:contents">
                                                            <button id="edit-image-button" type="button" class="o_select_file_button btn btn-light border-0 rounded-circle m-1 p-1" data-tooltip="Edit" aria-label="Edit"><i class="fa fa-pencil fa-fw"></i></button>
                                                        </span>

                                                        <button type="button" id="clear-image-button" class="o_clear_file_button btn btn-light border-0 rounded-circle m-1 p-1" data-tooltip="Clear" aria-label="Clear"><i class="fa fa-trash-o fa-fw"></i></button>

                                                        <input type="file" id="profile-image-input" name="profile_image" class="o_input_file d-none" accept="image/*">

                                                    </div>
                                                    <img id="profile-image" loading="lazy" class="img img-fluid" alt="Profile Image" src="{{ asset('uploads/' . ($employee->profile_image ?? 'default.png')) }}" name="image_1920">

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="o_group row align-items-start">
                                        <div class="o_inner_group grid col-lg-6">
                                            <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                    <label class="o_form_label" for="mobile_phone_0">Work
                                                        Mobile</label>
                                                </div>
                                                <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                                    <div name="mobile_phone" class="o_field_widget o_field_phone">
                                                        <div class="o_phone_content d-inline-flex w-100"><input class="o_input" name="work_mobile" type="tel" value="{{$employee->work_mobile ?? ''}}" autocomplete="off" id="mobile_phone_0"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                    <label class="o_form_label" for="work_phone_0">Work Phone</label>
                                                </div>
                                                <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                                    <div name="work_phone" class="o_field_widget o_field_phone">
                                                        <div class="o_phone_content d-inline-flex w-100"><input class="o_input" name="work_phone" type="tel" value="{{$employee->work_phone ?? ''}}" autocomplete="off" id="work_phone_0"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                    <label class="o_form_label" for="work_email_0">Work Email</label>
                                                </div>
                                                <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                                    <div name="work_email" class="o_field_widget o_field_email">
                                                        <div class="d-inline-flex w-100"><input class="o_input" value="{{$employee->work_email ?? ''}}" name="work_email" type="email" autocomplete="off" id="work_email_0"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                    <label class="o_form_label" for="category_ids_0">Tags</label>
                                                </div>
                                                <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">

                                                    {{-- tags --}}
                                                    <div name="category_ids" class="o_field_widget o_field_many2many_tags">
                                                        <div class="o_field_tags d-inline-flex flex-wrap gap-1 mw-100 o_tags_input o_input">
                                                            <div class="o_field_many2many_selection d-inline-flex w-100">
                                                                <div class="o_input_dropdown">
                                                                    <div class="o-autocomplete dropdown">
                                                                        <input type="text" name="tags" class="o-autocomplete--input o_input" autocomplete="off" role="combobox" aria-autocomplete="list" aria-haspopup="listbox" id="category_ids_0" placeholder="Tags" aria-expanded="false">
                                                                        <ul id="tags-dropdown" class="o-autocomplete--dropdown-menu ui-widget dropdown-menu ui-autocomplete"></ul>
                                                                    </div>
                                                                    <span class="o_dropdown_button"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="tags-container" class="d-inline-flex flex-wrap gap-1 mw-100 mt-2"></div>
                                                        <input type="hidden" name="tags_array" id="tags_array">
                                                    </div>



                                                </div>
                                            </div>
                                        </div>
                                        <div class="o_inner_group grid col-lg-6">
                                            <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                    <label class="o_form_label" for="department_id_0">Department</label>
                                                </div>
                                                <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                                    <div name="department_id" class="o_field_widget o_field_many2one">
                                                        <div class="o_field_many2one_selection">
                                                            <div class="o_input_dropdown">
                                                                <div class="o-autocomplete dropdown"><input type="text" name="department" class="o-autocomplete--input o_input" autocomplete="off" role="combobox" aria-autocomplete="list" value="{{$employee->department ?? ''}}" aria-haspopup="listbox" id="department_id_0" placeholder="" aria-expanded="false"></div>
                                                                <span class="o_dropdown_button"></span>
                                                            </div>
                                                        </div>
                                                        <div class="o_field_many2one_extra"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                    <label class="o_form_label" for="job_id_0">Job Position</label>
                                                </div>
                                                <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                                    <div name="job_id" class="o_field_widget o_field_many2one">
                                                        <div class="o_field_many2one_selection">
                                                            <div class="o_input_dropdown">
                                                                <div class="o-autocomplete dropdown"><input type="text" name="job_position" class="o-autocomplete--input o_input" autocomplete="off" role="combobox" aria-autocomplete="list" value="{{$employee->job_position ?? ''}}" aria-haspopup="listbox" id="job_id_0" placeholder="" aria-expanded="false">
                                                                </div><span class="o_dropdown_button"></span>
                                                            </div>
                                                        </div>
                                                        <div class="o_field_many2one_extra"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                    <label class="o_form_label" for="parent_id_0">Manager</label>
                                                </div>
                                                <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                                    <div name="parent_id" class="o_field_widget o_field_many2one_avatar_user o_field_many2one_avatar">
                                                        <div class="d-flex align-items-center gap-1"><span class="o_avatar o_m2o_avatar"><span class="o_avatar_empty o_m2o_avatar_empty"></span></span>
                                                            <div class="o_field_many2one_selection">
                                                                <div class="o_input_dropdown">
                                                                    <div class="o-autocomplete dropdown"><input type="text" name="manager" class="o-autocomplete--input o_input" autocomplete="off" role="combobox" aria-autocomplete="list" value="{{$employee->manager ?? ''}}" aria-haspopup="listbox" id="parent_id_0" placeholder="" aria-expanded="false">
                                                                    </div><span class="o_dropdown_button"></span>
                                                                </div>
                                                            </div>
                                                            <div class="o_field_many2one_extra"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                    <label class="o_form_label" for="coach_id_0">Coach<sup class="text-info p-1" data-tooltip-template="web.FieldTooltip" data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;Select the \&quot;Employee\&quot; who is the coach of this employee.\nThe \&quot;Coach\&quot; has no specific rights or responsibilities by default.&quot;}}" data-tooltip-touch-tap-to-show="true">?</sup></label>
                                                </div>
                                                <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                                    <div name="coach_id" class="o_field_widget o_field_many2one_avatar_user o_field_many2one_avatar">
                                                        <div class="d-flex align-items-center gap-1"><span class="o_avatar o_m2o_avatar"><span class="o_avatar_empty o_m2o_avatar_empty"></span></span>
                                                            <div class="o_field_many2one_selection">
                                                                <div class="o_input_dropdown">
                                                                    <div class="o-autocomplete dropdown"><input type="text" name="coach" class="o-autocomplete--input o_input" autocomplete="off" role="combobox" aria-autocomplete="list" value="{{$employee->coach ?? ''}}" aria-haspopup="listbox" id="coach_id_0" placeholder="" aria-expanded="false">
                                                                    </div><span class="o_dropdown_button"></span>
                                                                </div>
                                                            </div>
                                                            <div class="o_field_many2one_extra"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>


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
                                            <li class="nav-item flex-nowrap cursor-pointer">
                                                <a class="nav-link active" href="#" role="tab" tabindex="0" name="resume">Resume</a>
                                            </li>
                                            <li class="nav-item flex-nowrap cursor-pointer">
                                                <a class="nav-link" href="#" role="tab" tabindex="0" name="work_information">Work Information</a>
                                            </li>
                                            <li class="nav-item flex-nowrap cursor-pointer">
                                                <a class="nav-link" href="#" role="tab" tabindex="0" name="personal_information">Private Information</a>
                                            </li>
                                            <li class="nav-item flex-nowrap cursor-pointer">
                                                <a class="nav-link" href="#" role="tab" tabindex="0" name="hr_settings">HR Settings</a>
                                            </li>
                                        </ul>
                                    </div>


                                    {{-- Add Experience modal --}}
                                    <div role="dialog" id="newResumeModal" class="modal  o_technical_modal" tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered modal-lg">
                                            <div class="modal-content o_form_view" style="top: 0px; left: 0px;">
                                                <header class="modal-header">
                                                    <h4 class="modal-title text-break">New Resume line</h4><button type="button" class="btn-close" aria-label="Close" tabindex="-1"></button>
                                                </header>

                                                <form action="" id="employee-form" method="POST">
                                                    @csrf
                                                    <input type="hidden" class="experience_id" name="experience_id" value="{{ $employee->id ?? '' }}">

                                                    <main class=" modal-body p-0">
                                                        <div class="o_form_renderer o_form_editable d-flex d-print-block flex-nowrap h-100">
                                                            <div class="o_form_sheet_bg">
                                                                <div class="o_form_sheet position-relative">
                                                                    <div class="oe_title"><label class="o_form_label" for="name_0">Title</label>
                                                                        <h1>
                                                                            <div name="name" class="o_field_widget o_required_modifier o_field_char"><input name="experience_title" class="o_input o_field_translate experience_title" id="edit_name_0" type="text" autocomplete="off" placeholder="e.g. Odoo Inc."></div>
                                                                        </h1>
                                                                    </div>
                                                                    <div class="o_group row align-items-start">
                                                                        <div class="o_inner_group grid col-lg-6">
                                                                            <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                                                <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                                    <label class="o_form_label" for="employee_id_0">Employee</label></div>
                                                                                <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                                                                    <div name="employee_id" class="o_field_widget o_required_modifier o_field_many2one">
                                                                                        <div class="o_field_many2one_selection">
                                                                                            <div class="o_input_dropdown">
                                                                                                <div class="o-autocomplete dropdown">
                                                                                                    <input type="hidden" name="employee_id" class="employee_id" value="{{ $employee->id ?? '' }}">
                                                                                                    <input name="employee_name" type="text" class="o-autocomplete--input o_input employee_name" autocomplete="off" role="combobox" aria-autocomplete="list" aria-haspopup="listbox" id="employee_name" placeholder="" aria-expanded="false">
                                                                                                    <ul role="menu" class="o-autocomplete--dropdown-menu ui-widget dropdown-menu ui-autocomplete" style="position: fixed; display: none;" id="employee_dropdown">
                                                                                                        <!-- Items will be dynamically generated here -->
                                                                                                    </ul>


                                                                                                </div><span class="o_dropdown_button"></span>
                                                                                            </div><button type="button" class="btn btn-link text-action oi o_external_button oi-launch" tabindex="-1" draggable="false" aria-label="Internal link" data-tooltip="Internal link"></button>
                                                                                        </div>
                                                                                        <div class="o_field_many2one_extra"></div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                                                <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                                    <label class="o_form_label" for="line_type_id_0">Type</label></div>
                                                                                <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                                                                    <div name="line_type_id" class="o_field_widget o_field_many2one">
                                                                                        <div class="o_field_many2one_selection">
                                                                                            <div class="o_input_dropdown">
                                                                                                <div class="o-autocomplete dropdown"><input type="text" name="experience_type" class="o-autocomplete--input o_input experience_type" autocomplete="off" role="combobox" aria-autocomplete="list" aria-haspopup="listbox" id="line_type_id_0" placeholder="" aria-expanded="false"></div><span class="o_dropdown_button"></span>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="o_field_many2one_extra"></div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                                                <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                                    <label class="o_form_label" for="display_type_0">Display Type</label></div>
                                                                                <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                                                                    <div name="display_type" class="o_field_widget o_required_modifier o_field_selection"><select name="experience_display_type" class="o_input pe-3 experience_display_type" id="edit_experience_display_type">
                                                                                            <option value="false" style="display:none"></option>
                                                                                            <option value="classic">Classic</option>
                                                                                            <option value="certification">Certification</option>
                                                                                        </select></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="o_inner_group grid col-lg-6">
                                                                            <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                                                <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                                    <label class="o_form_label" for="date_start_0">Duration</label></div>
                                                                                <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">


                                                                                    <div name="date_start" class="o_field_widget o_required_modifier o_field_daterange">
                                                                                        <div class="d-flex gap-2 align-items-center">
                                                                                            <input type="text" name="experience_start_date" class="o_input cursor-pointer experience_start_date" autocomplete="off" id="date_start_0" data-field="date_start">
                                                                                            <i class="fa fa-long-arrow-right" aria-label="Arrow icon" title="Arrow"></i>
                                                                                            <input type="text" name="experience_end_date" class="o_input cursor-pointer experience_end_date" name="experience_end_date" autocomplete="off" id="date_end_0" data-field="date_end">
                                                                                        </div>
                                                                                    </div>


                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div name="description" class="o_field_widget o_field_text">
                                                                        <div style="height: 50px;"><textarea name="experience_description" class="o_input o_field_translate experience_description" id="description_0" placeholder="Description" rows="2" style="height: 50px; border-top-width: 0px; border-bottom-width: 1.11111px; padding: 1px 25px 1px 0px;"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </main>
                                                </form>

                                                <footer class="modal-footer justify-content-around justify-content-md-start flex-wrap gap-1 w-100">
                                                    <button class="btn btn-primary o_form_button_save_data" data-hotkey="c">Save &amp; Close</button>
                                                    <button class="btn btn-primary o_form_button_save_new" data-hotkey="n">Save &amp; New</button>
                                                    <button class="btn btn-secondary o_form_button_cancel" data-hotkey="j">Discard</button>
                                                </footer>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="o_notebook_content tab-content" style="display: contents;">

                                        <div class="tab-pane active fade show" id="resume">
                                            <div class="row">
                                                <div class="o_hr_skills_editable o_hr_skills_group o_group_resume col-lg-7 d-flex flex-column">
                                                    <div class="o_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small mb-4">
                                                        Resume</div>
                                                    <div name="resume_line_ids" class="o_field_widget o_field_resume_one2many">
                                                        <div class="o_list_view o_field_x2many o_field_x2many_list">
                                                            <div class="o_x2m_control_panel d-empty-none mb-4"></div>
                                                            <div class="o_list_renderer o_renderer table-responsive" tabindex="-1">
                                                                <table class="o_list_table table table-sm table-hover position-relative mb-0 o_list_table_ungrouped table-striped mb-1 o_skill_table table-borderless">
                                                                    <thead style="visibility: collapse;">
                                                                        <tr>
                                                                            <th style="width: 32px; min-width: 32px;">
                                                                            </th>
                                                                            <th class="w-100"></th>
                                                                            <th class="o_list_actions_header" style="width: 32px; min-width: 32px">
                                                                            </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody class="ui-sortable">
                                                                        <tr class="o_group_has_content o_group_header o_resume_group_header">
                                                                            <th tabindex="-1" class="o_group_name" colspan="3">
                                                                                <div class="d-flex justify-content-between align-items-center">
                                                                                    <span>Experience</span><button class="btn btn-secondary btn-sm" id="add-experience-btn" role="button">ADD</button>
                                                                                </div>
                                                                            </th>
                                                                            <th></th>
                                                                        </tr>

                                                                        @forelse($experiences as $experience)
                                                                        <tr class="o_data_row" data-id="{{ $experience->id }}  " data-title="{{ $experience->title }}" data-employee="{{ $experience->employee_id }}" data-type="{{ $experience->type }}" data-display_type="{{ $experience->display_type }}" data-start_date="{{ $experience->start_date }}" data-end_date="{{ $experience->end_date }}" data-description="{{ $experience->description }}" data-employee_id="{{ $experience->employee_id }}">
                                                                            <td class="o_resume_timeline_cell position-relative pe-lg-2">
                                                                                <div class="rounded-circle bg-info position-relative">
                                                                                </div>
                                                                            </td>
                                                                            <td class="o_data_cell pt-0">
                                                                                <div class="o_resume_line">

                                                                                    <small class="o_resume_line_dates fw-bold">
                                                                                        {{ Carbon\Carbon::parse($experience->start_date)->format('d/m/Y') }} -
                                                                                        {{ $experience->end_date ? Carbon\Carbon::parse($experience->end_date)->format('d/m/Y') : 'Current' }}
                                                                                    </small>

                                                                                    <h4 class="o_resume_line_title mt-2" data-title="{{ $experience->title }}">
                                                                                        {{ $experience->title }}
                                                                                    </h4>
                                                                                    <p>{{ $experience->description }}</p>
                                                                                </div>
                                                                            </td>

                                                                            <td class="o_list_record_remove w-print-0 p-print-0 text-center" tabindex="-1">
                                                                                <form action="{{ route('employee.destroy', $experience->id) }}" method="POST" style="display:inline;">
                                                                                    @csrf
                                                                                    @method('DELETE')
                                                                                    <button type="submit" class="fa d-print-none fa-trash-o" aria-label="Delete row" tabindex="-1"></button>
                                                                                </form>
                                                                            </td>

                                                                        </tr>
                                                                        @empty
                                                                        <tr>
                                                                            <td colspan="3">No records found.</td>
                                                                        </tr>
                                                                        @endforelse

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
                                                <div class="o_hr_skills_editable o_hr_skills_group o_group_skills col-lg-5 d-flex flex-column">
                                                    <div name="employee_skill_ids" class="o_field_widget o_field_skills_one2many mt-2">
                                                        <div class="o_list_view o_field_x2many o_field_x2many_list">
                                                            <div class="o_x2m_control_panel d-empty-none mb-4"></div>

                                                            <div class="o_list_renderer o_renderer table-responsive" tabindex="-1">
                                                                <div name="skills_header" class="text-uppercase fw-bolder small ms-3" style="margin-top: 2rem; box-shadow: 0 1px 0 #e6e6e6">
                                                                    Skills <a class="float-end me-3 cursor-pointer"><span class="fa fa-line-chart me-1"></span>
                                                                        Timeline </a></div>
                                                                <table class="o_list_table table table-sm table-hover position-relative mb-0 o_list_table_ungrouped table-striped mb-1 d-none o_skill_table" style="table-layout: fixed;">
                                                                    <thead style="visibility: collapse;">
                                                                        <tr>
                                                                            <th data-tooltip-delay="1000" tabindex="-1" data-name="skill_id" class="align-middle o_column_sortable position-relative cursor-pointer opacity-trigger-hover w-print-auto" data-tooltip="Skill" style="width: 159px;">
                                                                                <div class="d-flex"><span class="d-block min-w-0 text-truncate flex-grow-1">Skill</span><i class="fa fa-lg fa-angle-down opacity-0 opacity-75-hover"></i>
                                                                                </div><span class="o_resize position-absolute top-0 end-0 bottom-0 ps-1 bg-black-25 opacity-0 opacity-50-hover z-1"></span>
                                                                            </th>
                                                                            <th data-tooltip-delay="1000" tabindex="-1" data-name="skill_level_id" class="align-middle o_column_sortable position-relative cursor-pointer opacity-trigger-hover w-print-auto" data-tooltip="Skill Level" style="width: 148px;">
                                                                                <div class="d-flex"><span class="d-block min-w-0 text-truncate flex-grow-1">Skill
                                                                                        Level</span><i class="fa fa-lg fa-angle-down opacity-0 opacity-75-hover"></i>
                                                                                </div><span class="o_resize position-absolute top-0 end-0 bottom-0 ps-1 bg-black-25 opacity-0 opacity-50-hover z-1"></span>
                                                                            </th>
                                                                            <th data-tooltip-delay="1000" tabindex="-1" data-name="level_progress" class="align-middle o_column_sortable position-relative cursor-pointer o_list_number_th o_progressbar_cell opacity-trigger-hover w-print-auto" data-tooltip="Progress" style="width: 148px;">
                                                                                <div class="d-flex flex-row-reverse">
                                                                                    <span class="d-block min-w-0 text-truncate flex-grow-1 o_list_number_th">Progress</span><i class="fa fa-lg fa-angle-down opacity-0 opacity-75-hover"></i>
                                                                                </div><span class="o_resize position-absolute top-0 end-0 bottom-0 ps-1 bg-black-25 opacity-0 opacity-50-hover z-1"></span>
                                                                            </th>
                                                                            <th class="o_list_controller o_list_actions_header w-print-0 p-print-0 position-sticky end-0" style="width: 32px;">
                                                                                <div class="o_optional_columns_dropdown d-print-none text-center border-top-0">
                                                                                    <button class="btn p-0 o-dropdown dropdown-toggle dropdown" tabindex="-1" aria-expanded="false"><i class="o_optional_columns_dropdown_toggle oi oi-fw oi-settings-adjust"></i></button>
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
                                                                        Why not try adding some ? </p><button class="btn btn-secondary ms-4 mt-3 text-center" role="button"> Create new Skills </button>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane fade" id="work_information">
                                            <div id="o_work_employee_container" class="d-lg-flex">
                                                <div id="o_work_employee_main" class="flex-grow-1">
                                                    <div class="o_inner_group grid">
                                                        <div class="g-col-sm-2">
                                                            <div class="o_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">
                                                                Location</div>
                                                        </div>
                                                        <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                            <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                <label class="o_form_label" for="address_id_0">Work
                                                                    Address</label>
                                                            </div>
                                                            <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                                                <div name="address_id" class="o_field_widget o_field_many2one">
                                                                    <div class="o_field_many2one_selection">
                                                                        <div class="o_input_dropdown">
                                                                            <div class="o-autocomplete dropdown"><input type="text" class="o-autocomplete--input o_input" autocomplete="off" role="combobox" aria-autocomplete="list" aria-haspopup="listbox" id="address_id_0" placeholder="" aria-expanded="false"></div><span class="o_dropdown_button"></span>
                                                                        </div><button type="button" class="btn btn-link text-action oi o_external_button oi-arrow-right" tabindex="-1" draggable="false" aria-label="Internal link" data-tooltip="Internal link"></button>
                                                                    </div>
                                                                    <div class="o_field_many2one_extra">
                                                                        <span>India</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                            <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                <label class="o_form_label" for="work_location_id_0">Work Location</label>
                                                            </div>
                                                            <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                                                <div name="work_location_id" class="o_field_widget o_field_many2one">
                                                                    <div class="o_field_many2one_selection">
                                                                        <div class="o_input_dropdown">
                                                                            <div class="o-autocomplete dropdown"><input type="text" class="o-autocomplete--input o_input" autocomplete="off" role="combobox" aria-autocomplete="list" aria-haspopup="listbox" id="work_location_id_0" placeholder="" aria-expanded="false"></div><span class="o_dropdown_button"></span>
                                                                        </div><button type="button" class="btn btn-link text-action oi o_external_button oi-arrow-right" tabindex="-1" draggable="false" aria-label="Internal link" data-tooltip="Internal link"></button>
                                                                    </div>
                                                                    <div class="o_field_many2one_extra"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="o_inner_group grid hide-group-if-empty">
                                                        <div class="g-col-sm-2">
                                                            <div class="o_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">
                                                                Approvers</div>
                                                        </div>
                                                        <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                            <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                <label class="o_form_label" for="timesheet_manager_id_0">Timesheet<sup class="text-info p-1" data-tooltip-template="web.FieldTooltip" data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;Select the user responsible for approving \&quot;Timesheet\&quot; of this employee.\nIf empty, the approval is done by a Timesheets > Administrator or a Timesheets > User: all timesheets (as determined in the users settings).&quot;}}" data-tooltip-touch-tap-to-show="true">?</sup></label>
                                                            </div>
                                                            <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                                                <div name="timesheet_manager_id" class="o_field_widget o_field_many2one_avatar">
                                                                    <div class="d-flex align-items-center gap-1" data-tooltip="info@yantradesign.co.in"><span class="o_avatar o_m2o_avatar"><img class="rounded" src="/web/image/res.users/2/avatar_128"></span>
                                                                        <div class="o_field_many2one_selection">
                                                                            <div class="o_input_dropdown">
                                                                                <div class="o-autocomplete dropdown">
                                                                                    <input type="text" class="o-autocomplete--input o_input" autocomplete="off" role="combobox" aria-autocomplete="list" aria-haspopup="listbox" id="timesheet_manager_id_0" placeholder="" aria-expanded="false">
                                                                                </div>
                                                                                <span class="o_dropdown_button"></span>
                                                                            </div><button type="button" class="btn btn-link text-action oi o_external_button oi-arrow-right" tabindex="-1" draggable="false" aria-label="Internal link" data-tooltip="Internal link"></button>
                                                                        </div>
                                                                        <div class="o_field_many2one_extra"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="o_inner_group grid">
                                                        <div class="g-col-sm-2">
                                                            <div class="o_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">
                                                                Schedule</div>
                                                        </div>
                                                        <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                            <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                <label class="o_form_label" for="resource_calendar_id_0">Working Hours</label>
                                                            </div>
                                                            <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                                                <div name="resource_calendar_id" class="o_field_widget o_field_many2one">
                                                                    <div class="o_field_many2one_selection">
                                                                        <div class="o_input_dropdown">
                                                                            <div class="o-autocomplete dropdown"><input type="text" class="o-autocomplete--input o_input" autocomplete="off" role="combobox" aria-autocomplete="list" aria-haspopup="listbox" id="resource_calendar_id_0" placeholder="" aria-expanded="false"></div><span class="o_dropdown_button"></span>
                                                                        </div><button type="button" class="btn btn-link text-action oi o_external_button oi-arrow-right" tabindex="-1" draggable="false" aria-label="Internal link" data-tooltip="Internal link"></button>
                                                                    </div>
                                                                    <div class="o_field_many2one_extra"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                            <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                <label class="o_form_label" for="tz_0">Timezone<sup class="text-info p-1" data-tooltip-template="web.FieldTooltip" data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;This field is used in order to define in which timezone the employee will work.&quot;}}" data-tooltip-touch-tap-to-show="true">?</sup></label>
                                                            </div>
                                                            <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                                                <div name="tz" class="o_field_widget o_required_modifier o_field_selection">
                                                                    <select class="o_input pe-3" id="tz_0">
                                                                        <option value="false" style="display:none">
                                                                        </option>
                                                                        <option value="&quot;Africa/Abidjan&quot;">
                                                                            Africa/Abidjan</option>
                                                                        <option value="&quot;Africa/Accra&quot;">
                                                                            Africa/Accra</option>
                                                                        <option value="&quot;Africa/Addis_Ababa&quot;">
                                                                            Africa/Addis_Ababa</option>
                                                                        <option value="&quot;Africa/Algiers&quot;">
                                                                            Africa/Algiers</option>
                                                                        <option value="&quot;Africa/Asmara&quot;">
                                                                            Africa/Asmara</option>
                                                                        <option value="&quot;Africa/Asmera&quot;">
                                                                            Africa/Asmera</option>
                                                                        <option value="&quot;Africa/Bamako&quot;">
                                                                            Africa/Bamako</option>
                                                                        <option value="&quot;Africa/Bangui&quot;">
                                                                            Africa/Bangui</option>
                                                                        <option value="&quot;Africa/Banjul&quot;">
                                                                            Africa/Banjul</option>
                                                                        <option value="&quot;Africa/Bissau&quot;">
                                                                            Africa/Bissau</option>
                                                                        <option value="&quot;Africa/Blantyre&quot;">
                                                                            Africa/Blantyre</option>
                                                                        <option value="&quot;Africa/Brazzaville&quot;">
                                                                            Africa/Brazzaville</option>
                                                                        <option value="&quot;Africa/Bujumbura&quot;">
                                                                            Africa/Bujumbura</option>
                                                                        <option value="&quot;Africa/Cairo&quot;">
                                                                            Africa/Cairo</option>
                                                                        <option value="&quot;Africa/Casablanca&quot;">
                                                                            Africa/Casablanca</option>
                                                                        <option value="&quot;Africa/Ceuta&quot;">
                                                                            Africa/Ceuta</option>
                                                                        <option value="&quot;Africa/Conakry&quot;">
                                                                            Africa/Conakry</option>
                                                                        <option value="&quot;Africa/Dakar&quot;">
                                                                            Africa/Dakar</option>
                                                                        <option value="&quot;Africa/Dar_es_Salaam&quot;">
                                                                            Africa/Dar_es_Salaam</option>
                                                                        <option value="&quot;Africa/Djibouti&quot;">
                                                                            Africa/Djibouti</option>
                                                                        <option value="&quot;Africa/Douala&quot;">
                                                                            Africa/Douala</option>
                                                                        <option value="&quot;Africa/El_Aaiun&quot;">
                                                                            Africa/El_Aaiun</option>
                                                                        <option value="&quot;Africa/Freetown&quot;">
                                                                            Africa/Freetown</option>
                                                                        <option value="&quot;Africa/Gaborone&quot;">
                                                                            Africa/Gaborone</option>
                                                                        <option value="&quot;Africa/Harare&quot;">
                                                                            Africa/Harare</option>
                                                                        <option value="&quot;Africa/Johannesburg&quot;">
                                                                            Africa/Johannesburg</option>
                                                                        <option value="&quot;Africa/Juba&quot;">
                                                                            Africa/Juba</option>
                                                                        <option value="&quot;Africa/Kampala&quot;">
                                                                            Africa/Kampala</option>
                                                                        <option value="&quot;Africa/Khartoum&quot;">
                                                                            Africa/Khartoum</option>
                                                                        <option value="&quot;Africa/Kigali&quot;">
                                                                            Africa/Kigali</option>
                                                                        <option value="&quot;Africa/Kinshasa&quot;">
                                                                            Africa/Kinshasa</option>
                                                                        <option value="&quot;Africa/Lagos&quot;">
                                                                            Africa/Lagos</option>
                                                                        <option value="&quot;Africa/Libreville&quot;">
                                                                            Africa/Libreville</option>
                                                                        <option value="&quot;Africa/Lome&quot;">
                                                                            Africa/Lome</option>
                                                                        <option value="&quot;Africa/Luanda&quot;">
                                                                            Africa/Luanda</option>
                                                                        <option value="&quot;Africa/Lubumbashi&quot;">
                                                                            Africa/Lubumbashi</option>
                                                                        <option value="&quot;Africa/Lusaka&quot;">
                                                                            Africa/Lusaka</option>
                                                                        <option value="&quot;Africa/Malabo&quot;">
                                                                            Africa/Malabo</option>
                                                                        <option value="&quot;Africa/Maputo&quot;">
                                                                            Africa/Maputo</option>
                                                                        <option value="&quot;Africa/Maseru&quot;">
                                                                            Africa/Maseru</option>
                                                                        <option value="&quot;Africa/Mbabane&quot;">
                                                                            Africa/Mbabane</option>
                                                                        <option value="&quot;Africa/Mogadishu&quot;">
                                                                            Africa/Mogadishu</option>
                                                                        <option value="&quot;Africa/Monrovia&quot;">
                                                                            Africa/Monrovia</option>
                                                                        <option value="&quot;Africa/Nairobi&quot;">
                                                                            Africa/Nairobi</option>
                                                                        <option value="&quot;Africa/Ndjamena&quot;">
                                                                            Africa/Ndjamena</option>
                                                                        <option value="&quot;Africa/Niamey&quot;">
                                                                            Africa/Niamey</option>
                                                                        <option value="&quot;Africa/Nouakchott&quot;">
                                                                            Africa/Nouakchott</option>
                                                                        <option value="&quot;Africa/Ouagadougou&quot;">
                                                                            Africa/Ouagadougou</option>
                                                                        <option value="&quot;Africa/Porto-Novo&quot;">
                                                                            Africa/Porto-Novo</option>
                                                                        <option value="&quot;Africa/Sao_Tome&quot;">
                                                                            Africa/Sao_Tome</option>
                                                                        <option value="&quot;Africa/Timbuktu&quot;">
                                                                            Africa/Timbuktu</option>
                                                                        <option value="&quot;Africa/Tripoli&quot;">
                                                                            Africa/Tripoli</option>
                                                                        <option value="&quot;Africa/Tunis&quot;">
                                                                            Africa/Tunis</option>
                                                                        <option value="&quot;Africa/Windhoek&quot;">
                                                                            Africa/Windhoek</option>
                                                                        <option value="&quot;America/Adak&quot;">
                                                                            America/Adak</option>
                                                                        <option value="&quot;America/Anchorage&quot;">
                                                                            America/Anchorage</option>
                                                                        <option value="&quot;America/Anguilla&quot;">
                                                                            America/Anguilla</option>
                                                                        <option value="&quot;America/Antigua&quot;">
                                                                            America/Antigua</option>
                                                                        <option value="&quot;America/Araguaina&quot;">
                                                                            America/Araguaina</option>
                                                                        <option value="&quot;America/Argentina/Buenos_Aires&quot;">
                                                                            America/Argentina/Buenos_Aires</option>
                                                                        <option value="&quot;America/Argentina/Catamarca&quot;">
                                                                            America/Argentina/Catamarca</option>
                                                                        <option value="&quot;America/Argentina/ComodRivadavia&quot;">
                                                                            America/Argentina/ComodRivadavia</option>
                                                                        <option value="&quot;America/Argentina/Cordoba&quot;">
                                                                            America/Argentina/Cordoba</option>
                                                                        <option value="&quot;America/Argentina/Jujuy&quot;">
                                                                            America/Argentina/Jujuy</option>
                                                                        <option value="&quot;America/Argentina/La_Rioja&quot;">
                                                                            America/Argentina/La_Rioja</option>
                                                                        <option value="&quot;America/Argentina/Mendoza&quot;">
                                                                            America/Argentina/Mendoza</option>
                                                                        <option value="&quot;America/Argentina/Rio_Gallegos&quot;">
                                                                            America/Argentina/Rio_Gallegos</option>
                                                                        <option value="&quot;America/Argentina/Salta&quot;">
                                                                            America/Argentina/Salta</option>
                                                                        <option value="&quot;America/Argentina/San_Juan&quot;">
                                                                            America/Argentina/San_Juan</option>
                                                                        <option value="&quot;America/Argentina/San_Luis&quot;">
                                                                            America/Argentina/San_Luis</option>
                                                                        <option value="&quot;America/Argentina/Tucuman&quot;">
                                                                            America/Argentina/Tucuman</option>
                                                                        <option value="&quot;America/Argentina/Ushuaia&quot;">
                                                                            America/Argentina/Ushuaia</option>
                                                                        <option value="&quot;America/Aruba&quot;">
                                                                            America/Aruba</option>
                                                                        <option value="&quot;America/Asuncion&quot;">
                                                                            America/Asuncion</option>
                                                                        <option value="&quot;America/Atikokan&quot;">
                                                                            America/Atikokan</option>
                                                                        <option value="&quot;America/Atka&quot;">
                                                                            America/Atka</option>
                                                                        <option value="&quot;America/Bahia&quot;">
                                                                            America/Bahia</option>
                                                                        <option value="&quot;America/Bahia_Banderas&quot;">
                                                                            America/Bahia_Banderas</option>
                                                                        <option value="&quot;America/Barbados&quot;">
                                                                            America/Barbados</option>
                                                                        <option value="&quot;America/Belem&quot;">
                                                                            America/Belem</option>
                                                                        <option value="&quot;America/Belize&quot;">
                                                                            America/Belize</option>
                                                                        <option value="&quot;America/Blanc-Sablon&quot;">
                                                                            America/Blanc-Sablon</option>
                                                                        <option value="&quot;America/Boa_Vista&quot;">
                                                                            America/Boa_Vista</option>
                                                                        <option value="&quot;America/Bogota&quot;">
                                                                            America/Bogota</option>
                                                                        <option value="&quot;America/Boise&quot;">
                                                                            America/Boise</option>
                                                                        <option value="&quot;America/Buenos_Aires&quot;">
                                                                            America/Buenos_Aires</option>
                                                                        <option value="&quot;America/Cambridge_Bay&quot;">
                                                                            America/Cambridge_Bay</option>
                                                                        <option value="&quot;America/Campo_Grande&quot;">
                                                                            America/Campo_Grande</option>
                                                                        <option value="&quot;America/Cancun&quot;">
                                                                            America/Cancun</option>
                                                                        <option value="&quot;America/Caracas&quot;">
                                                                            America/Caracas</option>
                                                                        <option value="&quot;America/Catamarca&quot;">
                                                                            America/Catamarca</option>
                                                                        <option value="&quot;America/Cayenne&quot;">
                                                                            America/Cayenne</option>
                                                                        <option value="&quot;America/Cayman&quot;">
                                                                            America/Cayman</option>
                                                                        <option value="&quot;America/Chicago&quot;">
                                                                            America/Chicago</option>
                                                                        <option value="&quot;America/Chihuahua&quot;">
                                                                            America/Chihuahua</option>
                                                                        <option value="&quot;America/Ciudad_Juarez&quot;">
                                                                            America/Ciudad_Juarez</option>
                                                                        <option value="&quot;America/Coral_Harbour&quot;">
                                                                            America/Coral_Harbour</option>
                                                                        <option value="&quot;America/Cordoba&quot;">
                                                                            America/Cordoba</option>
                                                                        <option value="&quot;America/Costa_Rica&quot;">
                                                                            America/Costa_Rica</option>
                                                                        <option value="&quot;America/Creston&quot;">
                                                                            America/Creston</option>
                                                                        <option value="&quot;America/Cuiaba&quot;">
                                                                            America/Cuiaba</option>
                                                                        <option value="&quot;America/Curacao&quot;">
                                                                            America/Curacao</option>
                                                                        <option value="&quot;America/Danmarkshavn&quot;">
                                                                            America/Danmarkshavn</option>
                                                                        <option value="&quot;America/Dawson&quot;">
                                                                            America/Dawson</option>
                                                                        <option value="&quot;America/Dawson_Creek&quot;">
                                                                            America/Dawson_Creek</option>
                                                                        <option value="&quot;America/Denver&quot;">
                                                                            America/Denver</option>
                                                                        <option value="&quot;America/Detroit&quot;">
                                                                            America/Detroit</option>
                                                                        <option value="&quot;America/Dominica&quot;">
                                                                            America/Dominica</option>
                                                                        <option value="&quot;America/Edmonton&quot;">
                                                                            America/Edmonton</option>
                                                                        <option value="&quot;America/Eirunepe&quot;">
                                                                            America/Eirunepe</option>
                                                                        <option value="&quot;America/El_Salvador&quot;">
                                                                            America/El_Salvador</option>
                                                                        <option value="&quot;America/Ensenada&quot;">
                                                                            America/Ensenada</option>
                                                                        <option value="&quot;America/Fort_Nelson&quot;">
                                                                            America/Fort_Nelson</option>
                                                                        <option value="&quot;America/Fort_Wayne&quot;">
                                                                            America/Fort_Wayne</option>
                                                                        <option value="&quot;America/Fortaleza&quot;">
                                                                            America/Fortaleza</option>
                                                                        <option value="&quot;America/Glace_Bay&quot;">
                                                                            America/Glace_Bay</option>
                                                                        <option value="&quot;America/Godthab&quot;">
                                                                            America/Godthab</option>
                                                                        <option value="&quot;America/Goose_Bay&quot;">
                                                                            America/Goose_Bay</option>
                                                                        <option value="&quot;America/Grand_Turk&quot;">
                                                                            America/Grand_Turk</option>
                                                                        <option value="&quot;America/Grenada&quot;">
                                                                            America/Grenada</option>
                                                                        <option value="&quot;America/Guadeloupe&quot;">
                                                                            America/Guadeloupe</option>
                                                                        <option value="&quot;America/Guatemala&quot;">
                                                                            America/Guatemala</option>
                                                                        <option value="&quot;America/Guayaquil&quot;">
                                                                            America/Guayaquil</option>
                                                                        <option value="&quot;America/Guyana&quot;">
                                                                            America/Guyana</option>
                                                                        <option value="&quot;America/Halifax&quot;">
                                                                            America/Halifax</option>
                                                                        <option value="&quot;America/Havana&quot;">
                                                                            America/Havana</option>
                                                                        <option value="&quot;America/Hermosillo&quot;">
                                                                            America/Hermosillo</option>
                                                                        <option value="&quot;America/Indiana/Indianapolis&quot;">
                                                                            America/Indiana/Indianapolis</option>
                                                                        <option value="&quot;America/Indiana/Knox&quot;">
                                                                            America/Indiana/Knox</option>
                                                                        <option value="&quot;America/Indiana/Marengo&quot;">
                                                                            America/Indiana/Marengo</option>
                                                                        <option value="&quot;America/Indiana/Petersburg&quot;">
                                                                            America/Indiana/Petersburg</option>
                                                                        <option value="&quot;America/Indiana/Tell_City&quot;">
                                                                            America/Indiana/Tell_City</option>
                                                                        <option value="&quot;America/Indiana/Vevay&quot;">
                                                                            America/Indiana/Vevay</option>
                                                                        <option value="&quot;America/Indiana/Vincennes&quot;">
                                                                            America/Indiana/Vincennes</option>
                                                                        <option value="&quot;America/Indiana/Winamac&quot;">
                                                                            America/Indiana/Winamac</option>
                                                                        <option value="&quot;America/Indianapolis&quot;">
                                                                            America/Indianapolis</option>
                                                                        <option value="&quot;America/Inuvik&quot;">
                                                                            America/Inuvik</option>
                                                                        <option value="&quot;America/Iqaluit&quot;">
                                                                            America/Iqaluit</option>
                                                                        <option value="&quot;America/Jamaica&quot;">
                                                                            America/Jamaica</option>
                                                                        <option value="&quot;America/Jujuy&quot;">
                                                                            America/Jujuy</option>
                                                                        <option value="&quot;America/Juneau&quot;">
                                                                            America/Juneau</option>
                                                                        <option value="&quot;America/Kentucky/Louisville&quot;">
                                                                            America/Kentucky/Louisville</option>
                                                                        <option value="&quot;America/Kentucky/Monticello&quot;">
                                                                            America/Kentucky/Monticello</option>
                                                                        <option value="&quot;America/Knox_IN&quot;">
                                                                            America/Knox_IN</option>
                                                                        <option value="&quot;America/Kralendijk&quot;">
                                                                            America/Kralendijk</option>
                                                                        <option value="&quot;America/La_Paz&quot;">
                                                                            America/La_Paz</option>
                                                                        <option value="&quot;America/Lima&quot;">
                                                                            America/Lima</option>
                                                                        <option value="&quot;America/Los_Angeles&quot;">
                                                                            America/Los_Angeles</option>
                                                                        <option value="&quot;America/Louisville&quot;">
                                                                            America/Louisville</option>
                                                                        <option value="&quot;America/Lower_Princes&quot;">
                                                                            America/Lower_Princes</option>
                                                                        <option value="&quot;America/Maceio&quot;">
                                                                            America/Maceio</option>
                                                                        <option value="&quot;America/Managua&quot;">
                                                                            America/Managua</option>
                                                                        <option value="&quot;America/Manaus&quot;">
                                                                            America/Manaus</option>
                                                                        <option value="&quot;America/Marigot&quot;">
                                                                            America/Marigot</option>
                                                                        <option value="&quot;America/Martinique&quot;">
                                                                            America/Martinique</option>
                                                                        <option value="&quot;America/Matamoros&quot;">
                                                                            America/Matamoros</option>
                                                                        <option value="&quot;America/Mazatlan&quot;">
                                                                            America/Mazatlan</option>
                                                                        <option value="&quot;America/Mendoza&quot;">
                                                                            America/Mendoza</option>
                                                                        <option value="&quot;America/Menominee&quot;">
                                                                            America/Menominee</option>
                                                                        <option value="&quot;America/Merida&quot;">
                                                                            America/Merida</option>
                                                                        <option value="&quot;America/Metlakatla&quot;">
                                                                            America/Metlakatla</option>
                                                                        <option value="&quot;America/Mexico_City&quot;">
                                                                            America/Mexico_City</option>
                                                                        <option value="&quot;America/Miquelon&quot;">
                                                                            America/Miquelon</option>
                                                                        <option value="&quot;America/Moncton&quot;">
                                                                            America/Moncton</option>
                                                                        <option value="&quot;America/Monterrey&quot;">
                                                                            America/Monterrey</option>
                                                                        <option value="&quot;America/Montevideo&quot;">
                                                                            America/Montevideo</option>
                                                                        <option value="&quot;America/Montreal&quot;">
                                                                            America/Montreal</option>
                                                                        <option value="&quot;America/Montserrat&quot;">
                                                                            America/Montserrat</option>
                                                                        <option value="&quot;America/Nassau&quot;">
                                                                            America/Nassau</option>
                                                                        <option value="&quot;America/New_York&quot;">
                                                                            America/New_York</option>
                                                                        <option value="&quot;America/Nipigon&quot;">
                                                                            America/Nipigon</option>
                                                                        <option value="&quot;America/Nome&quot;">
                                                                            America/Nome</option>
                                                                        <option value="&quot;America/Noronha&quot;">
                                                                            America/Noronha</option>
                                                                        <option value="&quot;America/North_Dakota/Beulah&quot;">
                                                                            America/North_Dakota/Beulah</option>
                                                                        <option value="&quot;America/North_Dakota/Center&quot;">
                                                                            America/North_Dakota/Center</option>
                                                                        <option value="&quot;America/North_Dakota/New_Salem&quot;">
                                                                            America/North_Dakota/New_Salem</option>
                                                                        <option value="&quot;America/Nuuk&quot;">
                                                                            America/Nuuk</option>
                                                                        <option value="&quot;America/Ojinaga&quot;">
                                                                            America/Ojinaga</option>
                                                                        <option value="&quot;America/Panama&quot;">
                                                                            America/Panama</option>
                                                                        <option value="&quot;America/Pangnirtung&quot;">
                                                                            America/Pangnirtung</option>
                                                                        <option value="&quot;America/Paramaribo&quot;">
                                                                            America/Paramaribo</option>
                                                                        <option value="&quot;America/Phoenix&quot;">
                                                                            America/Phoenix</option>
                                                                        <option value="&quot;America/Port-au-Prince&quot;">
                                                                            America/Port-au-Prince</option>
                                                                        <option value="&quot;America/Port_of_Spain&quot;">
                                                                            America/Port_of_Spain</option>
                                                                        <option value="&quot;America/Porto_Acre&quot;">
                                                                            America/Porto_Acre</option>
                                                                        <option value="&quot;America/Porto_Velho&quot;">
                                                                            America/Porto_Velho</option>
                                                                        <option value="&quot;America/Puerto_Rico&quot;">
                                                                            America/Puerto_Rico</option>
                                                                        <option value="&quot;America/Punta_Arenas&quot;">
                                                                            America/Punta_Arenas</option>
                                                                        <option value="&quot;America/Rainy_River&quot;">
                                                                            America/Rainy_River</option>
                                                                        <option value="&quot;America/Rankin_Inlet&quot;">
                                                                            America/Rankin_Inlet</option>
                                                                        <option value="&quot;America/Recife&quot;">
                                                                            America/Recife</option>
                                                                        <option value="&quot;America/Regina&quot;">
                                                                            America/Regina</option>
                                                                        <option value="&quot;America/Resolute&quot;">
                                                                            America/Resolute</option>
                                                                        <option value="&quot;America/Rio_Branco&quot;">
                                                                            America/Rio_Branco</option>
                                                                        <option value="&quot;America/Rosario&quot;">
                                                                            America/Rosario</option>
                                                                        <option value="&quot;America/Santa_Isabel&quot;">
                                                                            America/Santa_Isabel</option>
                                                                        <option value="&quot;America/Santarem&quot;">
                                                                            America/Santarem</option>
                                                                        <option value="&quot;America/Santiago&quot;">
                                                                            America/Santiago</option>
                                                                        <option value="&quot;America/Santo_Domingo&quot;">
                                                                            America/Santo_Domingo</option>
                                                                        <option value="&quot;America/Sao_Paulo&quot;">
                                                                            America/Sao_Paulo</option>
                                                                        <option value="&quot;America/Scoresbysund&quot;">
                                                                            America/Scoresbysund</option>
                                                                        <option value="&quot;America/Shiprock&quot;">
                                                                            America/Shiprock</option>
                                                                        <option value="&quot;America/Sitka&quot;">
                                                                            America/Sitka</option>
                                                                        <option value="&quot;America/St_Barthelemy&quot;">
                                                                            America/St_Barthelemy</option>
                                                                        <option value="&quot;America/St_Johns&quot;">
                                                                            America/St_Johns</option>
                                                                        <option value="&quot;America/St_Kitts&quot;">
                                                                            America/St_Kitts</option>
                                                                        <option value="&quot;America/St_Lucia&quot;">
                                                                            America/St_Lucia</option>
                                                                        <option value="&quot;America/St_Thomas&quot;">
                                                                            America/St_Thomas</option>
                                                                        <option value="&quot;America/St_Vincent&quot;">
                                                                            America/St_Vincent</option>
                                                                        <option value="&quot;America/Swift_Current&quot;">
                                                                            America/Swift_Current</option>
                                                                        <option value="&quot;America/Tegucigalpa&quot;">
                                                                            America/Tegucigalpa</option>
                                                                        <option value="&quot;America/Thule&quot;">
                                                                            America/Thule</option>
                                                                        <option value="&quot;America/Thunder_Bay&quot;">
                                                                            America/Thunder_Bay</option>
                                                                        <option value="&quot;America/Tijuana&quot;">
                                                                            America/Tijuana</option>
                                                                        <option value="&quot;America/Toronto&quot;">
                                                                            America/Toronto</option>
                                                                        <option value="&quot;America/Tortola&quot;">
                                                                            America/Tortola</option>
                                                                        <option value="&quot;America/Vancouver&quot;">
                                                                            America/Vancouver</option>
                                                                        <option value="&quot;America/Virgin&quot;">
                                                                            America/Virgin</option>
                                                                        <option value="&quot;America/Whitehorse&quot;">
                                                                            America/Whitehorse</option>
                                                                        <option value="&quot;America/Winnipeg&quot;">
                                                                            America/Winnipeg</option>
                                                                        <option value="&quot;America/Yakutat&quot;">
                                                                            America/Yakutat</option>
                                                                        <option value="&quot;America/Yellowknife&quot;">
                                                                            America/Yellowknife</option>
                                                                        <option value="&quot;Antarctica/Casey&quot;">
                                                                            Antarctica/Casey</option>
                                                                        <option value="&quot;Antarctica/Davis&quot;">
                                                                            Antarctica/Davis</option>
                                                                        <option value="&quot;Antarctica/DumontDUrville&quot;">
                                                                            Antarctica/DumontDUrville</option>
                                                                        <option value="&quot;Antarctica/Macquarie&quot;">
                                                                            Antarctica/Macquarie</option>
                                                                        <option value="&quot;Antarctica/Mawson&quot;">
                                                                            Antarctica/Mawson</option>
                                                                        <option value="&quot;Antarctica/McMurdo&quot;">
                                                                            Antarctica/McMurdo</option>
                                                                        <option value="&quot;Antarctica/Palmer&quot;">
                                                                            Antarctica/Palmer</option>
                                                                        <option value="&quot;Antarctica/Rothera&quot;">
                                                                            Antarctica/Rothera</option>
                                                                        <option value="&quot;Antarctica/South_Pole&quot;">
                                                                            Antarctica/South_Pole</option>
                                                                        <option value="&quot;Antarctica/Syowa&quot;">
                                                                            Antarctica/Syowa</option>
                                                                        <option value="&quot;Antarctica/Troll&quot;">
                                                                            Antarctica/Troll</option>
                                                                        <option value="&quot;Antarctica/Vostok&quot;">
                                                                            Antarctica/Vostok</option>
                                                                        <option value="&quot;Arctic/Longyearbyen&quot;">
                                                                            Arctic/Longyearbyen</option>
                                                                        <option value="&quot;Asia/Aden&quot;">Asia/Aden
                                                                        </option>
                                                                        <option value="&quot;Asia/Almaty&quot;">
                                                                            Asia/Almaty</option>
                                                                        <option value="&quot;Asia/Amman&quot;">
                                                                            Asia/Amman</option>
                                                                        <option value="&quot;Asia/Anadyr&quot;">
                                                                            Asia/Anadyr</option>
                                                                        <option value="&quot;Asia/Aqtau&quot;">
                                                                            Asia/Aqtau</option>
                                                                        <option value="&quot;Asia/Aqtobe&quot;">
                                                                            Asia/Aqtobe</option>
                                                                        <option value="&quot;Asia/Ashgabat&quot;">
                                                                            Asia/Ashgabat</option>
                                                                        <option value="&quot;Asia/Ashkhabad&quot;">
                                                                            Asia/Ashkhabad</option>
                                                                        <option value="&quot;Asia/Atyrau&quot;">
                                                                            Asia/Atyrau</option>
                                                                        <option value="&quot;Asia/Baghdad&quot;">
                                                                            Asia/Baghdad</option>
                                                                        <option value="&quot;Asia/Bahrain&quot;">
                                                                            Asia/Bahrain</option>
                                                                        <option value="&quot;Asia/Baku&quot;">Asia/Baku
                                                                        </option>
                                                                        <option value="&quot;Asia/Bangkok&quot;">
                                                                            Asia/Bangkok</option>
                                                                        <option value="&quot;Asia/Barnaul&quot;">
                                                                            Asia/Barnaul</option>
                                                                        <option value="&quot;Asia/Beirut&quot;">
                                                                            Asia/Beirut</option>
                                                                        <option value="&quot;Asia/Bishkek&quot;">
                                                                            Asia/Bishkek</option>
                                                                        <option value="&quot;Asia/Brunei&quot;">
                                                                            Asia/Brunei</option>
                                                                        <option value="&quot;Asia/Calcutta&quot;">
                                                                            Asia/Calcutta</option>
                                                                        <option value="&quot;Asia/Chita&quot;">
                                                                            Asia/Chita</option>
                                                                        <option value="&quot;Asia/Choibalsan&quot;">
                                                                            Asia/Choibalsan</option>
                                                                        <option value="&quot;Asia/Chongqing&quot;">
                                                                            Asia/Chongqing</option>
                                                                        <option value="&quot;Asia/Chungking&quot;">
                                                                            Asia/Chungking</option>
                                                                        <option value="&quot;Asia/Colombo&quot;">
                                                                            Asia/Colombo</option>
                                                                        <option value="&quot;Asia/Dacca&quot;">
                                                                            Asia/Dacca</option>
                                                                        <option value="&quot;Asia/Damascus&quot;">
                                                                            Asia/Damascus</option>
                                                                        <option value="&quot;Asia/Dhaka&quot;">
                                                                            Asia/Dhaka</option>
                                                                        <option value="&quot;Asia/Dili&quot;">Asia/Dili
                                                                        </option>
                                                                        <option value="&quot;Asia/Dubai&quot;">
                                                                            Asia/Dubai</option>
                                                                        <option value="&quot;Asia/Dushanbe&quot;">
                                                                            Asia/Dushanbe</option>
                                                                        <option value="&quot;Asia/Famagusta&quot;">
                                                                            Asia/Famagusta</option>
                                                                        <option value="&quot;Asia/Gaza&quot;">Asia/Gaza
                                                                        </option>
                                                                        <option value="&quot;Asia/Harbin&quot;">
                                                                            Asia/Harbin</option>
                                                                        <option value="&quot;Asia/Hebron&quot;">
                                                                            Asia/Hebron</option>
                                                                        <option value="&quot;Asia/Ho_Chi_Minh&quot;">
                                                                            Asia/Ho_Chi_Minh</option>
                                                                        <option value="&quot;Asia/Hong_Kong&quot;">
                                                                            Asia/Hong_Kong</option>
                                                                        <option value="&quot;Asia/Hovd&quot;">Asia/Hovd
                                                                        </option>
                                                                        <option value="&quot;Asia/Irkutsk&quot;">
                                                                            Asia/Irkutsk</option>
                                                                        <option value="&quot;Asia/Istanbul&quot;">
                                                                            Asia/Istanbul</option>
                                                                        <option value="&quot;Asia/Jakarta&quot;">
                                                                            Asia/Jakarta</option>
                                                                        <option value="&quot;Asia/Jayapura&quot;">
                                                                            Asia/Jayapura</option>
                                                                        <option value="&quot;Asia/Jerusalem&quot;">
                                                                            Asia/Jerusalem</option>
                                                                        <option value="&quot;Asia/Kabul&quot;">
                                                                            Asia/Kabul</option>
                                                                        <option value="&quot;Asia/Kamchatka&quot;">
                                                                            Asia/Kamchatka</option>
                                                                        <option value="&quot;Asia/Karachi&quot;">
                                                                            Asia/Karachi</option>
                                                                        <option value="&quot;Asia/Kashgar&quot;">
                                                                            Asia/Kashgar</option>
                                                                        <option value="&quot;Asia/Kathmandu&quot;">
                                                                            Asia/Kathmandu</option>
                                                                        <option value="&quot;Asia/Katmandu&quot;">
                                                                            Asia/Katmandu</option>
                                                                        <option value="&quot;Asia/Khandyga&quot;">
                                                                            Asia/Khandyga</option>
                                                                        <option value="&quot;Asia/Kolkata&quot;">
                                                                            Asia/Kolkata</option>
                                                                        <option value="&quot;Asia/Krasnoyarsk&quot;">
                                                                            Asia/Krasnoyarsk</option>
                                                                        <option value="&quot;Asia/Kuala_Lumpur&quot;">
                                                                            Asia/Kuala_Lumpur</option>
                                                                        <option value="&quot;Asia/Kuching&quot;">
                                                                            Asia/Kuching</option>
                                                                        <option value="&quot;Asia/Kuwait&quot;">
                                                                            Asia/Kuwait</option>
                                                                        <option value="&quot;Asia/Macao&quot;">
                                                                            Asia/Macao</option>
                                                                        <option value="&quot;Asia/Macau&quot;">
                                                                            Asia/Macau</option>
                                                                        <option value="&quot;Asia/Magadan&quot;">
                                                                            Asia/Magadan</option>
                                                                        <option value="&quot;Asia/Makassar&quot;">
                                                                            Asia/Makassar</option>
                                                                        <option value="&quot;Asia/Manila&quot;">
                                                                            Asia/Manila</option>
                                                                        <option value="&quot;Asia/Muscat&quot;">
                                                                            Asia/Muscat</option>
                                                                        <option value="&quot;Asia/Nicosia&quot;">
                                                                            Asia/Nicosia</option>
                                                                        <option value="&quot;Asia/Novokuznetsk&quot;">
                                                                            Asia/Novokuznetsk</option>
                                                                        <option value="&quot;Asia/Novosibirsk&quot;">
                                                                            Asia/Novosibirsk</option>
                                                                        <option value="&quot;Asia/Omsk&quot;">Asia/Omsk
                                                                        </option>
                                                                        <option value="&quot;Asia/Oral&quot;">Asia/Oral
                                                                        </option>
                                                                        <option value="&quot;Asia/Phnom_Penh&quot;">
                                                                            Asia/Phnom_Penh</option>
                                                                        <option value="&quot;Asia/Pontianak&quot;">
                                                                            Asia/Pontianak</option>
                                                                        <option value="&quot;Asia/Pyongyang&quot;">
                                                                            Asia/Pyongyang</option>
                                                                        <option value="&quot;Asia/Qatar&quot;">
                                                                            Asia/Qatar</option>
                                                                        <option value="&quot;Asia/Qostanay&quot;">
                                                                            Asia/Qostanay</option>
                                                                        <option value="&quot;Asia/Qyzylorda&quot;">
                                                                            Asia/Qyzylorda</option>
                                                                        <option value="&quot;Asia/Rangoon&quot;">
                                                                            Asia/Rangoon</option>
                                                                        <option value="&quot;Asia/Riyadh&quot;">
                                                                            Asia/Riyadh</option>
                                                                        <option value="&quot;Asia/Saigon&quot;">
                                                                            Asia/Saigon</option>
                                                                        <option value="&quot;Asia/Sakhalin&quot;">
                                                                            Asia/Sakhalin</option>
                                                                        <option value="&quot;Asia/Samarkand&quot;">
                                                                            Asia/Samarkand</option>
                                                                        <option value="&quot;Asia/Seoul&quot;">
                                                                            Asia/Seoul</option>
                                                                        <option value="&quot;Asia/Shanghai&quot;">
                                                                            Asia/Shanghai</option>
                                                                        <option value="&quot;Asia/Singapore&quot;">
                                                                            Asia/Singapore</option>
                                                                        <option value="&quot;Asia/Srednekolymsk&quot;">
                                                                            Asia/Srednekolymsk</option>
                                                                        <option value="&quot;Asia/Taipei&quot;">
                                                                            Asia/Taipei</option>
                                                                        <option value="&quot;Asia/Tashkent&quot;">
                                                                            Asia/Tashkent</option>
                                                                        <option value="&quot;Asia/Tbilisi&quot;">
                                                                            Asia/Tbilisi</option>
                                                                        <option value="&quot;Asia/Tehran&quot;">
                                                                            Asia/Tehran</option>
                                                                        <option value="&quot;Asia/Tel_Aviv&quot;">
                                                                            Asia/Tel_Aviv</option>
                                                                        <option value="&quot;Asia/Thimbu&quot;">
                                                                            Asia/Thimbu</option>
                                                                        <option value="&quot;Asia/Thimphu&quot;">
                                                                            Asia/Thimphu</option>
                                                                        <option value="&quot;Asia/Tokyo&quot;">
                                                                            Asia/Tokyo</option>
                                                                        <option value="&quot;Asia/Tomsk&quot;">
                                                                            Asia/Tomsk</option>
                                                                        <option value="&quot;Asia/Ujung_Pandang&quot;">
                                                                            Asia/Ujung_Pandang</option>
                                                                        <option value="&quot;Asia/Ulaanbaatar&quot;">
                                                                            Asia/Ulaanbaatar</option>
                                                                        <option value="&quot;Asia/Ulan_Bator&quot;">
                                                                            Asia/Ulan_Bator</option>
                                                                        <option value="&quot;Asia/Urumqi&quot;">
                                                                            Asia/Urumqi</option>
                                                                        <option value="&quot;Asia/Ust-Nera&quot;">
                                                                            Asia/Ust-Nera</option>
                                                                        <option value="&quot;Asia/Vientiane&quot;">
                                                                            Asia/Vientiane</option>
                                                                        <option value="&quot;Asia/Vladivostok&quot;">
                                                                            Asia/Vladivostok</option>
                                                                        <option value="&quot;Asia/Yakutsk&quot;">
                                                                            Asia/Yakutsk</option>
                                                                        <option value="&quot;Asia/Yangon&quot;">
                                                                            Asia/Yangon</option>
                                                                        <option value="&quot;Asia/Yekaterinburg&quot;">
                                                                            Asia/Yekaterinburg</option>
                                                                        <option value="&quot;Asia/Yerevan&quot;">
                                                                            Asia/Yerevan</option>
                                                                        <option value="&quot;Atlantic/Azores&quot;">
                                                                            Atlantic/Azores</option>
                                                                        <option value="&quot;Atlantic/Bermuda&quot;">
                                                                            Atlantic/Bermuda</option>
                                                                        <option value="&quot;Atlantic/Canary&quot;">
                                                                            Atlantic/Canary</option>
                                                                        <option value="&quot;Atlantic/Cape_Verde&quot;">
                                                                            Atlantic/Cape_Verde</option>
                                                                        <option value="&quot;Atlantic/Faeroe&quot;">
                                                                            Atlantic/Faeroe</option>
                                                                        <option value="&quot;Atlantic/Faroe&quot;">
                                                                            Atlantic/Faroe</option>
                                                                        <option value="&quot;Atlantic/Jan_Mayen&quot;">
                                                                            Atlantic/Jan_Mayen</option>
                                                                        <option value="&quot;Atlantic/Madeira&quot;">
                                                                            Atlantic/Madeira</option>
                                                                        <option value="&quot;Atlantic/Reykjavik&quot;">
                                                                            Atlantic/Reykjavik</option>
                                                                        <option value="&quot;Atlantic/South_Georgia&quot;">
                                                                            Atlantic/South_Georgia</option>
                                                                        <option value="&quot;Atlantic/St_Helena&quot;">
                                                                            Atlantic/St_Helena</option>
                                                                        <option value="&quot;Atlantic/Stanley&quot;">
                                                                            Atlantic/Stanley</option>
                                                                        <option value="&quot;Australia/ACT&quot;">
                                                                            Australia/ACT</option>
                                                                        <option value="&quot;Australia/Adelaide&quot;">
                                                                            Australia/Adelaide</option>
                                                                        <option value="&quot;Australia/Brisbane&quot;">
                                                                            Australia/Brisbane</option>
                                                                        <option value="&quot;Australia/Broken_Hill&quot;">
                                                                            Australia/Broken_Hill</option>
                                                                        <option value="&quot;Australia/Canberra&quot;">
                                                                            Australia/Canberra</option>
                                                                        <option value="&quot;Australia/Currie&quot;">
                                                                            Australia/Currie</option>
                                                                        <option value="&quot;Australia/Darwin&quot;">
                                                                            Australia/Darwin</option>
                                                                        <option value="&quot;Australia/Eucla&quot;">
                                                                            Australia/Eucla</option>
                                                                        <option value="&quot;Australia/Hobart&quot;">
                                                                            Australia/Hobart</option>
                                                                        <option value="&quot;Australia/LHI&quot;">
                                                                            Australia/LHI</option>
                                                                        <option value="&quot;Australia/Lindeman&quot;">
                                                                            Australia/Lindeman</option>
                                                                        <option value="&quot;Australia/Lord_Howe&quot;">
                                                                            Australia/Lord_Howe</option>
                                                                        <option value="&quot;Australia/Melbourne&quot;">
                                                                            Australia/Melbourne</option>
                                                                        <option value="&quot;Australia/NSW&quot;">
                                                                            Australia/NSW</option>
                                                                        <option value="&quot;Australia/North&quot;">
                                                                            Australia/North</option>
                                                                        <option value="&quot;Australia/Perth&quot;">
                                                                            Australia/Perth</option>
                                                                        <option value="&quot;Australia/Queensland&quot;">
                                                                            Australia/Queensland</option>
                                                                        <option value="&quot;Australia/South&quot;">
                                                                            Australia/South</option>
                                                                        <option value="&quot;Australia/Sydney&quot;">
                                                                            Australia/Sydney</option>
                                                                        <option value="&quot;Australia/Tasmania&quot;">
                                                                            Australia/Tasmania</option>
                                                                        <option value="&quot;Australia/Victoria&quot;">
                                                                            Australia/Victoria</option>
                                                                        <option value="&quot;Australia/West&quot;">
                                                                            Australia/West</option>
                                                                        <option value="&quot;Australia/Yancowinna&quot;">
                                                                            Australia/Yancowinna</option>
                                                                        <option value="&quot;Brazil/Acre&quot;">
                                                                            Brazil/Acre</option>
                                                                        <option value="&quot;Brazil/DeNoronha&quot;">
                                                                            Brazil/DeNoronha</option>
                                                                        <option value="&quot;Brazil/East&quot;">
                                                                            Brazil/East</option>
                                                                        <option value="&quot;Brazil/West&quot;">
                                                                            Brazil/West</option>
                                                                        <option value="&quot;CET&quot;">CET</option>
                                                                        <option value="&quot;CST6CDT&quot;">CST6CDT
                                                                        </option>
                                                                        <option value="&quot;Canada/Atlantic&quot;">
                                                                            Canada/Atlantic</option>
                                                                        <option value="&quot;Canada/Central&quot;">
                                                                            Canada/Central</option>
                                                                        <option value="&quot;Canada/Eastern&quot;">
                                                                            Canada/Eastern</option>
                                                                        <option value="&quot;Canada/Mountain&quot;">
                                                                            Canada/Mountain</option>
                                                                        <option value="&quot;Canada/Newfoundland&quot;">
                                                                            Canada/Newfoundland</option>
                                                                        <option value="&quot;Canada/Pacific&quot;">
                                                                            Canada/Pacific</option>
                                                                        <option value="&quot;Canada/Saskatchewan&quot;">
                                                                            Canada/Saskatchewan</option>
                                                                        <option value="&quot;Canada/Yukon&quot;">
                                                                            Canada/Yukon</option>
                                                                        <option value="&quot;Chile/Continental&quot;">
                                                                            Chile/Continental</option>
                                                                        <option value="&quot;Chile/EasterIsland&quot;">
                                                                            Chile/EasterIsland</option>
                                                                        <option value="&quot;Cuba&quot;">Cuba</option>
                                                                        <option value="&quot;EET&quot;">EET</option>
                                                                        <option value="&quot;EST&quot;">EST</option>
                                                                        <option value="&quot;EST5EDT&quot;">EST5EDT
                                                                        </option>
                                                                        <option value="&quot;Egypt&quot;">Egypt
                                                                        </option>
                                                                        <option value="&quot;Eire&quot;">Eire</option>
                                                                        <option value="&quot;Europe/Amsterdam&quot;">
                                                                            Europe/Amsterdam</option>
                                                                        <option value="&quot;Europe/Andorra&quot;">
                                                                            Europe/Andorra</option>
                                                                        <option value="&quot;Europe/Astrakhan&quot;">
                                                                            Europe/Astrakhan</option>
                                                                        <option value="&quot;Europe/Athens&quot;">
                                                                            Europe/Athens</option>
                                                                        <option value="&quot;Europe/Belfast&quot;">
                                                                            Europe/Belfast</option>
                                                                        <option value="&quot;Europe/Belgrade&quot;">
                                                                            Europe/Belgrade</option>
                                                                        <option value="&quot;Europe/Berlin&quot;">
                                                                            Europe/Berlin</option>
                                                                        <option value="&quot;Europe/Bratislava&quot;">
                                                                            Europe/Bratislava</option>
                                                                        <option value="&quot;Europe/Brussels&quot;">
                                                                            Europe/Brussels</option>
                                                                        <option value="&quot;Europe/Bucharest&quot;">
                                                                            Europe/Bucharest</option>
                                                                        <option value="&quot;Europe/Budapest&quot;">
                                                                            Europe/Budapest</option>
                                                                        <option value="&quot;Europe/Busingen&quot;">
                                                                            Europe/Busingen</option>
                                                                        <option value="&quot;Europe/Chisinau&quot;">
                                                                            Europe/Chisinau</option>
                                                                        <option value="&quot;Europe/Copenhagen&quot;">
                                                                            Europe/Copenhagen</option>
                                                                        <option value="&quot;Europe/Dublin&quot;">
                                                                            Europe/Dublin</option>
                                                                        <option value="&quot;Europe/Gibraltar&quot;">
                                                                            Europe/Gibraltar</option>
                                                                        <option value="&quot;Europe/Guernsey&quot;">
                                                                            Europe/Guernsey</option>
                                                                        <option value="&quot;Europe/Helsinki&quot;">
                                                                            Europe/Helsinki</option>
                                                                        <option value="&quot;Europe/Isle_of_Man&quot;">
                                                                            Europe/Isle_of_Man</option>
                                                                        <option value="&quot;Europe/Istanbul&quot;">
                                                                            Europe/Istanbul</option>
                                                                        <option value="&quot;Europe/Jersey&quot;">
                                                                            Europe/Jersey</option>
                                                                        <option value="&quot;Europe/Kaliningrad&quot;">
                                                                            Europe/Kaliningrad</option>
                                                                        <option value="&quot;Europe/Kiev&quot;">
                                                                            Europe/Kiev</option>
                                                                        <option value="&quot;Europe/Kirov&quot;">
                                                                            Europe/Kirov</option>
                                                                        <option value="&quot;Europe/Kyiv&quot;">
                                                                            Europe/Kyiv</option>
                                                                        <option value="&quot;Europe/Lisbon&quot;">
                                                                            Europe/Lisbon</option>
                                                                        <option value="&quot;Europe/Ljubljana&quot;">
                                                                            Europe/Ljubljana</option>
                                                                        <option value="&quot;Europe/London&quot;">
                                                                            Europe/London</option>
                                                                        <option value="&quot;Europe/Luxembourg&quot;">
                                                                            Europe/Luxembourg</option>
                                                                        <option value="&quot;Europe/Madrid&quot;">
                                                                            Europe/Madrid</option>
                                                                        <option value="&quot;Europe/Malta&quot;">
                                                                            Europe/Malta</option>
                                                                        <option value="&quot;Europe/Mariehamn&quot;">
                                                                            Europe/Mariehamn</option>
                                                                        <option value="&quot;Europe/Minsk&quot;">
                                                                            Europe/Minsk</option>
                                                                        <option value="&quot;Europe/Monaco&quot;">
                                                                            Europe/Monaco</option>
                                                                        <option value="&quot;Europe/Moscow&quot;">
                                                                            Europe/Moscow</option>
                                                                        <option value="&quot;Europe/Nicosia&quot;">
                                                                            Europe/Nicosia</option>
                                                                        <option value="&quot;Europe/Oslo&quot;">
                                                                            Europe/Oslo</option>
                                                                        <option value="&quot;Europe/Paris&quot;">
                                                                            Europe/Paris</option>
                                                                        <option value="&quot;Europe/Podgorica&quot;">
                                                                            Europe/Podgorica</option>
                                                                        <option value="&quot;Europe/Prague&quot;">
                                                                            Europe/Prague</option>
                                                                        <option value="&quot;Europe/Riga&quot;">
                                                                            Europe/Riga</option>
                                                                        <option value="&quot;Europe/Rome&quot;">
                                                                            Europe/Rome</option>
                                                                        <option value="&quot;Europe/Samara&quot;">
                                                                            Europe/Samara</option>
                                                                        <option value="&quot;Europe/San_Marino&quot;">
                                                                            Europe/San_Marino</option>
                                                                        <option value="&quot;Europe/Sarajevo&quot;">
                                                                            Europe/Sarajevo</option>
                                                                        <option value="&quot;Europe/Saratov&quot;">
                                                                            Europe/Saratov</option>
                                                                        <option value="&quot;Europe/Simferopol&quot;">
                                                                            Europe/Simferopol</option>
                                                                        <option value="&quot;Europe/Skopje&quot;">
                                                                            Europe/Skopje</option>
                                                                        <option value="&quot;Europe/Sofia&quot;">
                                                                            Europe/Sofia</option>
                                                                        <option value="&quot;Europe/Stockholm&quot;">
                                                                            Europe/Stockholm</option>
                                                                        <option value="&quot;Europe/Tallinn&quot;">
                                                                            Europe/Tallinn</option>
                                                                        <option value="&quot;Europe/Tirane&quot;">
                                                                            Europe/Tirane</option>
                                                                        <option value="&quot;Europe/Tiraspol&quot;">
                                                                            Europe/Tiraspol</option>
                                                                        <option value="&quot;Europe/Ulyanovsk&quot;">
                                                                            Europe/Ulyanovsk</option>
                                                                        <option value="&quot;Europe/Uzhgorod&quot;">
                                                                            Europe/Uzhgorod</option>
                                                                        <option value="&quot;Europe/Vaduz&quot;">
                                                                            Europe/Vaduz</option>
                                                                        <option value="&quot;Europe/Vatican&quot;">
                                                                            Europe/Vatican</option>
                                                                        <option value="&quot;Europe/Vienna&quot;">
                                                                            Europe/Vienna</option>
                                                                        <option value="&quot;Europe/Vilnius&quot;">
                                                                            Europe/Vilnius</option>
                                                                        <option value="&quot;Europe/Volgograd&quot;">
                                                                            Europe/Volgograd</option>
                                                                        <option value="&quot;Europe/Warsaw&quot;">
                                                                            Europe/Warsaw</option>
                                                                        <option value="&quot;Europe/Zagreb&quot;">
                                                                            Europe/Zagreb</option>
                                                                        <option value="&quot;Europe/Zaporozhye&quot;">
                                                                            Europe/Zaporozhye</option>
                                                                        <option value="&quot;Europe/Zurich&quot;">
                                                                            Europe/Zurich</option>
                                                                        <option value="&quot;GB&quot;">GB</option>
                                                                        <option value="&quot;GB-Eire&quot;">GB-Eire
                                                                        </option>
                                                                        <option value="&quot;GMT&quot;">GMT</option>
                                                                        <option value="&quot;GMT+0&quot;">GMT+0
                                                                        </option>
                                                                        <option value="&quot;GMT-0&quot;">GMT-0
                                                                        </option>
                                                                        <option value="&quot;GMT0&quot;">GMT0</option>
                                                                        <option value="&quot;Greenwich&quot;">
                                                                            Greenwich</option>
                                                                        <option value="&quot;HST&quot;">HST</option>
                                                                        <option value="&quot;Hongkong&quot;">Hongkong
                                                                        </option>
                                                                        <option value="&quot;Iceland&quot;">Iceland
                                                                        </option>
                                                                        <option value="&quot;Indian/Antananarivo&quot;">
                                                                            Indian/Antananarivo</option>
                                                                        <option value="&quot;Indian/Chagos&quot;">
                                                                            Indian/Chagos</option>
                                                                        <option value="&quot;Indian/Christmas&quot;">
                                                                            Indian/Christmas</option>
                                                                        <option value="&quot;Indian/Cocos&quot;">
                                                                            Indian/Cocos</option>
                                                                        <option value="&quot;Indian/Comoro&quot;">
                                                                            Indian/Comoro</option>
                                                                        <option value="&quot;Indian/Kerguelen&quot;">
                                                                            Indian/Kerguelen</option>
                                                                        <option value="&quot;Indian/Mahe&quot;">
                                                                            Indian/Mahe</option>
                                                                        <option value="&quot;Indian/Maldives&quot;">
                                                                            Indian/Maldives</option>
                                                                        <option value="&quot;Indian/Mauritius&quot;">
                                                                            Indian/Mauritius</option>
                                                                        <option value="&quot;Indian/Mayotte&quot;">
                                                                            Indian/Mayotte</option>
                                                                        <option value="&quot;Indian/Reunion&quot;">
                                                                            Indian/Reunion</option>
                                                                        <option value="&quot;Iran&quot;">Iran</option>
                                                                        <option value="&quot;Israel&quot;">Israel
                                                                        </option>
                                                                        <option value="&quot;Jamaica&quot;">Jamaica
                                                                        </option>
                                                                        <option value="&quot;Japan&quot;">Japan
                                                                        </option>
                                                                        <option value="&quot;Kwajalein&quot;">
                                                                            Kwajalein</option>
                                                                        <option value="&quot;Libya&quot;">Libya
                                                                        </option>
                                                                        <option value="&quot;MET&quot;">MET</option>
                                                                        <option value="&quot;MST&quot;">MST</option>
                                                                        <option value="&quot;MST7MDT&quot;">MST7MDT
                                                                        </option>
                                                                        <option value="&quot;Mexico/BajaNorte&quot;">
                                                                            Mexico/BajaNorte</option>
                                                                        <option value="&quot;Mexico/BajaSur&quot;">
                                                                            Mexico/BajaSur</option>
                                                                        <option value="&quot;Mexico/General&quot;">
                                                                            Mexico/General</option>
                                                                        <option value="&quot;NZ&quot;">NZ</option>
                                                                        <option value="&quot;NZ-CHAT&quot;">NZ-CHAT
                                                                        </option>
                                                                        <option value="&quot;Navajo&quot;">Navajo
                                                                        </option>
                                                                        <option value="&quot;PRC&quot;">PRC</option>
                                                                        <option value="&quot;PST8PDT&quot;">PST8PDT
                                                                        </option>
                                                                        <option value="&quot;Pacific/Apia&quot;">
                                                                            Pacific/Apia</option>
                                                                        <option value="&quot;Pacific/Auckland&quot;">
                                                                            Pacific/Auckland</option>
                                                                        <option value="&quot;Pacific/Bougainville&quot;">
                                                                            Pacific/Bougainville</option>
                                                                        <option value="&quot;Pacific/Chatham&quot;">
                                                                            Pacific/Chatham</option>
                                                                        <option value="&quot;Pacific/Chuuk&quot;">
                                                                            Pacific/Chuuk</option>
                                                                        <option value="&quot;Pacific/Easter&quot;">
                                                                            Pacific/Easter</option>
                                                                        <option value="&quot;Pacific/Efate&quot;">
                                                                            Pacific/Efate</option>
                                                                        <option value="&quot;Pacific/Enderbury&quot;">
                                                                            Pacific/Enderbury</option>
                                                                        <option value="&quot;Pacific/Fakaofo&quot;">
                                                                            Pacific/Fakaofo</option>
                                                                        <option value="&quot;Pacific/Fiji&quot;">
                                                                            Pacific/Fiji</option>
                                                                        <option value="&quot;Pacific/Funafuti&quot;">
                                                                            Pacific/Funafuti</option>
                                                                        <option value="&quot;Pacific/Galapagos&quot;">
                                                                            Pacific/Galapagos</option>
                                                                        <option value="&quot;Pacific/Gambier&quot;">
                                                                            Pacific/Gambier</option>
                                                                        <option value="&quot;Pacific/Guadalcanal&quot;">
                                                                            Pacific/Guadalcanal</option>
                                                                        <option value="&quot;Pacific/Guam&quot;">
                                                                            Pacific/Guam</option>
                                                                        <option value="&quot;Pacific/Honolulu&quot;">
                                                                            Pacific/Honolulu</option>
                                                                        <option value="&quot;Pacific/Johnston&quot;">
                                                                            Pacific/Johnston</option>
                                                                        <option value="&quot;Pacific/Kanton&quot;">
                                                                            Pacific/Kanton</option>
                                                                        <option value="&quot;Pacific/Kiritimati&quot;">
                                                                            Pacific/Kiritimati</option>
                                                                        <option value="&quot;Pacific/Kosrae&quot;">
                                                                            Pacific/Kosrae</option>
                                                                        <option value="&quot;Pacific/Kwajalein&quot;">
                                                                            Pacific/Kwajalein</option>
                                                                        <option value="&quot;Pacific/Majuro&quot;">
                                                                            Pacific/Majuro</option>
                                                                        <option value="&quot;Pacific/Marquesas&quot;">
                                                                            Pacific/Marquesas</option>
                                                                        <option value="&quot;Pacific/Midway&quot;">
                                                                            Pacific/Midway</option>
                                                                        <option value="&quot;Pacific/Nauru&quot;">
                                                                            Pacific/Nauru</option>
                                                                        <option value="&quot;Pacific/Niue&quot;">
                                                                            Pacific/Niue</option>
                                                                        <option value="&quot;Pacific/Norfolk&quot;">
                                                                            Pacific/Norfolk</option>
                                                                        <option value="&quot;Pacific/Noumea&quot;">
                                                                            Pacific/Noumea</option>
                                                                        <option value="&quot;Pacific/Pago_Pago&quot;">
                                                                            Pacific/Pago_Pago</option>
                                                                        <option value="&quot;Pacific/Palau&quot;">
                                                                            Pacific/Palau</option>
                                                                        <option value="&quot;Pacific/Pitcairn&quot;">
                                                                            Pacific/Pitcairn</option>
                                                                        <option value="&quot;Pacific/Pohnpei&quot;">
                                                                            Pacific/Pohnpei</option>
                                                                        <option value="&quot;Pacific/Ponape&quot;">
                                                                            Pacific/Ponape</option>
                                                                        <option value="&quot;Pacific/Port_Moresby&quot;">
                                                                            Pacific/Port_Moresby</option>
                                                                        <option value="&quot;Pacific/Rarotonga&quot;">
                                                                            Pacific/Rarotonga</option>
                                                                        <option value="&quot;Pacific/Saipan&quot;">
                                                                            Pacific/Saipan</option>
                                                                        <option value="&quot;Pacific/Samoa&quot;">
                                                                            Pacific/Samoa</option>
                                                                        <option value="&quot;Pacific/Tahiti&quot;">
                                                                            Pacific/Tahiti</option>
                                                                        <option value="&quot;Pacific/Tarawa&quot;">
                                                                            Pacific/Tarawa</option>
                                                                        <option value="&quot;Pacific/Tongatapu&quot;">
                                                                            Pacific/Tongatapu</option>
                                                                        <option value="&quot;Pacific/Truk&quot;">
                                                                            Pacific/Truk</option>
                                                                        <option value="&quot;Pacific/Wake&quot;">
                                                                            Pacific/Wake</option>
                                                                        <option value="&quot;Pacific/Wallis&quot;">
                                                                            Pacific/Wallis</option>
                                                                        <option value="&quot;Pacific/Yap&quot;">
                                                                            Pacific/Yap</option>
                                                                        <option value="&quot;Poland&quot;">Poland
                                                                        </option>
                                                                        <option value="&quot;Portugal&quot;">Portugal
                                                                        </option>
                                                                        <option value="&quot;ROC&quot;">ROC</option>
                                                                        <option value="&quot;ROK&quot;">ROK</option>
                                                                        <option value="&quot;Singapore&quot;">
                                                                            Singapore</option>
                                                                        <option value="&quot;Turkey&quot;">Turkey
                                                                        </option>
                                                                        <option value="&quot;UCT&quot;">UCT</option>
                                                                        <option value="&quot;US/Alaska&quot;">
                                                                            US/Alaska</option>
                                                                        <option value="&quot;US/Aleutian&quot;">
                                                                            US/Aleutian</option>
                                                                        <option value="&quot;US/Arizona&quot;">
                                                                            US/Arizona</option>
                                                                        <option value="&quot;US/Central&quot;">
                                                                            US/Central</option>
                                                                        <option value="&quot;US/East-Indiana&quot;">
                                                                            US/East-Indiana</option>
                                                                        <option value="&quot;US/Eastern&quot;">
                                                                            US/Eastern</option>
                                                                        <option value="&quot;US/Hawaii&quot;">
                                                                            US/Hawaii</option>
                                                                        <option value="&quot;US/Indiana-Starke&quot;">
                                                                            US/Indiana-Starke</option>
                                                                        <option value="&quot;US/Michigan&quot;">
                                                                            US/Michigan</option>
                                                                        <option value="&quot;US/Mountain&quot;">
                                                                            US/Mountain</option>
                                                                        <option value="&quot;US/Pacific&quot;">
                                                                            US/Pacific</option>
                                                                        <option value="&quot;US/Samoa&quot;">US/Samoa
                                                                        </option>
                                                                        <option value="&quot;UTC&quot;">UTC</option>
                                                                        <option value="&quot;Universal&quot;">
                                                                            Universal</option>
                                                                        <option value="&quot;W-SU&quot;">W-SU</option>
                                                                        <option value="&quot;WET&quot;">WET</option>
                                                                        <option value="&quot;Zulu&quot;">Zulu</option>
                                                                        <option value="&quot;Etc/GMT&quot;">Etc/GMT
                                                                        </option>
                                                                        <option value="&quot;Etc/GMT+0&quot;">
                                                                            Etc/GMT+0</option>
                                                                        <option value="&quot;Etc/GMT+1&quot;">
                                                                            Etc/GMT+1</option>
                                                                        <option value="&quot;Etc/GMT+10&quot;">
                                                                            Etc/GMT+10</option>
                                                                        <option value="&quot;Etc/GMT+11&quot;">
                                                                            Etc/GMT+11</option>
                                                                        <option value="&quot;Etc/GMT+12&quot;">
                                                                            Etc/GMT+12</option>
                                                                        <option value="&quot;Etc/GMT+2&quot;">
                                                                            Etc/GMT+2</option>
                                                                        <option value="&quot;Etc/GMT+3&quot;">
                                                                            Etc/GMT+3</option>
                                                                        <option value="&quot;Etc/GMT+4&quot;">
                                                                            Etc/GMT+4</option>
                                                                        <option value="&quot;Etc/GMT+5&quot;">
                                                                            Etc/GMT+5</option>
                                                                        <option value="&quot;Etc/GMT+6&quot;">
                                                                            Etc/GMT+6</option>
                                                                        <option value="&quot;Etc/GMT+7&quot;">
                                                                            Etc/GMT+7</option>
                                                                        <option value="&quot;Etc/GMT+8&quot;">
                                                                            Etc/GMT+8</option>
                                                                        <option value="&quot;Etc/GMT+9&quot;">
                                                                            Etc/GMT+9</option>
                                                                        <option value="&quot;Etc/GMT-0&quot;">
                                                                            Etc/GMT-0</option>
                                                                        <option value="&quot;Etc/GMT-1&quot;">
                                                                            Etc/GMT-1</option>
                                                                        <option value="&quot;Etc/GMT-10&quot;">
                                                                            Etc/GMT-10</option>
                                                                        <option value="&quot;Etc/GMT-11&quot;">
                                                                            Etc/GMT-11</option>
                                                                        <option value="&quot;Etc/GMT-12&quot;">
                                                                            Etc/GMT-12</option>
                                                                        <option value="&quot;Etc/GMT-13&quot;">
                                                                            Etc/GMT-13</option>
                                                                        <option value="&quot;Etc/GMT-14&quot;">
                                                                            Etc/GMT-14</option>
                                                                        <option value="&quot;Etc/GMT-2&quot;">
                                                                            Etc/GMT-2</option>
                                                                        <option value="&quot;Etc/GMT-3&quot;">
                                                                            Etc/GMT-3</option>
                                                                        <option value="&quot;Etc/GMT-4&quot;">
                                                                            Etc/GMT-4</option>
                                                                        <option value="&quot;Etc/GMT-5&quot;">
                                                                            Etc/GMT-5</option>
                                                                        <option value="&quot;Etc/GMT-6&quot;">
                                                                            Etc/GMT-6</option>
                                                                        <option value="&quot;Etc/GMT-7&quot;">
                                                                            Etc/GMT-7</option>
                                                                        <option value="&quot;Etc/GMT-8&quot;">
                                                                            Etc/GMT-8</option>
                                                                        <option value="&quot;Etc/GMT-9&quot;">
                                                                            Etc/GMT-9</option>
                                                                        <option value="&quot;Etc/GMT0&quot;">Etc/GMT0
                                                                        </option>
                                                                        <option value="&quot;Etc/Greenwich&quot;">
                                                                            Etc/Greenwich</option>
                                                                        <option value="&quot;Etc/UCT&quot;">Etc/UCT
                                                                        </option>
                                                                        <option value="&quot;Etc/UTC&quot;">Etc/UTC
                                                                        </option>
                                                                        <option value="&quot;Etc/Universal&quot;">
                                                                            Etc/Universal</option>
                                                                        <option value="&quot;Etc/Zulu&quot;">Etc/Zulu
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="o_inner_group grid">
                                                        <div class="g-col-sm-2">
                                                            <div class="o_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">
                                                                Planning</div>
                                                        </div>
                                                        <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                            <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                <label class="o_form_label" for="planning_role_ids_0">Roles<sup class="text-info p-1" data-tooltip-template="web.FieldTooltip" data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;Roles that the employee can fill in. When creating a shift for this employee, only the shift templates for these roles will be displayed.\nSimilarly, only the open shifts available for these roles will be sent to the employee when the schedule is published.\nAdditionally, the employee will only be assigned orders for these roles (with the default planning role having precedence over the other ones).\nLeave empty for the employee to be assigned shifts regardless of the role.&quot;}}" data-tooltip-touch-tap-to-show="true">?</sup></label>
                                                            </div>
                                                            <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                                                <div name="planning_role_ids" class="o_field_widget o_field_many2many_tags">
                                                                    <div class="o_field_tags d-inline-flex flex-wrap gap-1 mw-100 o_tags_input o_input">
                                                                        <span class="o_tag position-relative d-inline-flex align-items-center user-select-none mw-100 o_badge badge rounded-pill lh-1 o_tag_color_8" tabindex="-1" data-color="8" title="default role">
                                                                            <div class="o_tag_badge_text text-truncate">
                                                                                default role</div><a class="o_delete d-flex align-items-center opacity-100-hover ps-1 opacity-75" title="Delete" aria-label="Delete" tabindex="-1" href="#"><i class="oi oi-close align-text-top"></i></a>
                                                                        </span>
                                                                        <div class="o_field_many2many_selection d-inline-flex w-100">
                                                                            <div class="o_input_dropdown">
                                                                                <div class="o-autocomplete dropdown">
                                                                                    <input type="text" class="o-autocomplete--input o_input" autocomplete="off" role="combobox" aria-autocomplete="list" aria-haspopup="listbox" id="planning_role_ids_0" placeholder="" aria-expanded="false">
                                                                                </div>
                                                                                <span class="o_dropdown_button"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                            <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                <label class="o_form_label" for="default_planning_role_id_0">Default Role<sup class="text-info p-1" data-tooltip-template="web.FieldTooltip" data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;Role that will be selected by default when creating a shift for this employee.\nThis role will also have precedence over the other roles of the employee when planning orders.&quot;}}" data-tooltip-touch-tap-to-show="true">?</sup></label>
                                                            </div>
                                                            <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                                                <div name="default_planning_role_id" class="o_field_widget o_field_many2one">
                                                                    <div class="o_field_many2one_selection">
                                                                        <div class="o_input_dropdown">
                                                                            <div class="o-autocomplete dropdown">
                                                                                <input type="text" class="o-autocomplete--input o_input" autocomplete="off" role="combobox" aria-autocomplete="list" aria-haspopup="listbox" id="default_planning_role_id_0" placeholder="" aria-expanded="false">
                                                                            </div><span class="o_dropdown_button"></span>
                                                                        </div><button type="button" class="btn btn-link text-action oi o_external_button oi-arrow-right" tabindex="-1" draggable="false" aria-label="Internal link" data-tooltip="Internal link"></button>
                                                                    </div>
                                                                    <div class="o_field_many2one_extra"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="o_employee_right" class="col-lg-4 px-0 ps-lg-5 pe-lg-0">
                                                    <div class="o_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">
                                                        Organization Chart</div>
                                                    <div name="child_ids" class="o_field_widget o_readonly_modifier o_field_hr_org_chart position-relative">
                                                        <div class="o_org_chart_group_up position-relative">
                                                            <div class="o_org_chart_entry o_org_chart_entry_manager o_treeEntry d-flex position-relative py-2 overflow-visible">
                                                                <div class="o_media_left position-relative"><a class="o_media_object d-block rounded o_employee_redirect" style="background-image:url('/web/image/hr.employee.public/2/avatar_1024/')" alt="karan vora" data-employee-id="2" href="/mail/view?model=hr.employee.public&amp;res_id=2"></a>
                                                                </div>
                                                                <div class="d-flex flex-grow-1 align-items-center justify-content-between position-relative px-3">
                                                                    <a class="o_employee_redirect d-flex flex-column" href="/mail/view?model=hr.employee.public&amp;res_id=2" data-employee-id="2"><b class="o_media_heading m-0 fs-6">karan
                                                                            vora</b><small class="text-muted fw-bold"></small></a><button class="btn p-0 fs-3" tabindex="0" data-bs-trigger="focus" data-bs-toggle="popover" data-emp-name="karan vora" data-emp-id="2" data-emp-dir-subs="1" data-emp-ind-subs="1"><a href="#" class="badge rounded-pill bg-300 border px-2">1</a></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <section class="o_org_chart_entry_self_container o_org_chart_has_managers">
                                                            <div class="o_org_chart_entry o_org_chart_entry_self d-flex position-relative py-2 overflow-visible o_treeEntry">
                                                                <div class="o_media_left position-relative">
                                                                    <div class="o_media_object d-block rounded border border-info" style="background-image:url('/web/image/hr.employee.public/5/avatar_1024/')">
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex flex-grow-1 align-items-center justify-content-between position-relative px-3">
                                                                    <div class="d-flex flex-column">
                                                                        <h5 class="o_media_heading m-0">jaydeep2</h5>
                                                                        <small class="text-muted fw-bold">laravel
                                                                            developer</small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </section>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane fade" id="personal_information">
                                            <div class="tab-pane fade" style="    display: contents;">
                                                <div class="o_group row align-items-start">
                                                    <div class="o_inner_group grid col-lg-6">
                                                        <div class="g-col-sm-2">
                                                            <div class="o_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">
                                                                Private Contact</div>
                                                        </div>
                                                        <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                            <div class="o_cell flex-grow-1 flex-sm-grow-0 o_wrap_label w-100 text-break text-900" style=""><label class="o_form_label" for="private_street_0">Private Address</label>
                                                            </div>
                                                            <div class="o_cell flex-grow-1 flex-sm-grow-0" style="width: 100%;">
                                                                <div class="o_address_format">
                                                                    <div name="private_street" class="o_field_widget o_field_char o_address_street">
                                                                        <input class="o_input" id="private_street_0" type="text" autocomplete="off" placeholder="Street...">
                                                                    </div>
                                                                    <div name="private_street2" class="o_field_widget o_field_char o_address_street">
                                                                        <input class="o_input" id="private_street2_0" type="text" autocomplete="off" placeholder="Street 2...">
                                                                    </div>
                                                                    <div name="private_city" class="o_field_widget o_field_char o_address_city">
                                                                        <input class="o_input" id="private_city_0" type="text" autocomplete="off" placeholder="City">
                                                                    </div>
                                                                    <div name="private_state_id" class="o_field_widget o_field_many2one o_address_state">
                                                                        <div class="o_field_many2one_selection">
                                                                            <div class="o_input_dropdown">
                                                                                <div class="o-autocomplete dropdown">
                                                                                    <input type="text" class="o-autocomplete--input o_input" autocomplete="off" role="combobox" aria-autocomplete="list" aria-haspopup="listbox" id="private_state_id_0" placeholder="State" aria-expanded="false">
                                                                                </div>
                                                                                <span class="o_dropdown_button"></span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="o_field_many2one_extra"></div>
                                                                    </div>
                                                                    <div name="private_zip" class="o_field_widget o_field_char o_address_zip">
                                                                        <input class="o_input" id="private_zip_0" type="text" autocomplete="off" placeholder="ZIP">
                                                                    </div>
                                                                    <div name="private_country_id" class="o_field_widget o_field_many2one o_address_country">
                                                                        <div class="o_field_many2one_selection">
                                                                            <div class="o_input_dropdown">
                                                                                <div class="o-autocomplete dropdown">
                                                                                    <input type="text" class="o-autocomplete--input o_input" autocomplete="off" role="combobox" aria-autocomplete="list" aria-haspopup="listbox" id="private_country_id_0" placeholder="Country" aria-expanded="false">
                                                                                </div>
                                                                                <span class="o_dropdown_button"></span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="o_field_many2one_extra"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                            <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                <label class="o_form_label" for="private_email_0">Email</label>
                                                            </div>
                                                            <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                                                <div name="private_email" class="o_field_widget o_field_char"><input class="o_input" id="private_email_0" type="text" autocomplete="off" placeholder="myprivateemail@example.com">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                            <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                <label class="o_form_label" for="private_phone_0">Phone</label>
                                                            </div>
                                                            <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                                                <div name="private_phone" class="o_field_widget o_field_char"><input class="o_input" id="private_phone_0" type="text" autocomplete="off"></div>
                                                            </div>
                                                        </div>
                                                        <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                            <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                <label class="o_form_label o_form_label_readonly" for="bank_account_id_0">Bank Account Number<sup class="text-info p-1" data-tooltip-template="web.FieldTooltip" data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;Employee bank account to pay salaries&quot;}}" data-tooltip-touch-tap-to-show="true">?</sup></label>
                                                            </div>
                                                            <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                                                <div name="bank_account_id" class="o_field_widget o_readonly_modifier o_field_many2one">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                            <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                <label class="o_form_label" for="lang_0">Language</label>
                                                            </div>
                                                            <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                                                <div name="lang" class="o_field_widget o_field_selection"><select class="o_input pe-3" id="lang_0">
                                                                        <option value="false" style="">
                                                                        </option>
                                                                        <option value="&quot;en_IN&quot;">English (IN)
                                                                        </option>
                                                                    </select></div>
                                                            </div>
                                                        </div>
                                                        <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                            <div class="o_cell flex-grow-1 flex-sm-grow-0 o_wrap_label w-100 text-break text-900" style=""><label class="o_form_label" for="distance_home_work_0">Home-Work
                                                                    Distance</label></div>
                                                            <div class="o_cell flex-grow-1 flex-sm-grow-0" style="width: 100%;">
                                                                <div class="o_row" name="div_km_home_work">
                                                                    <div name="distance_home_work" class="o_field_widget o_field_integer o_hr_narrow_field">
                                                                        <input inputmode="numeric" class="o_input" autocomplete="off" id="distance_home_work_0" type="text">
                                                                    </div><span>
                                                                        <div name="distance_home_work_unit" class="o_field_widget o_required_modifier o_field_selection">
                                                                            <select class="o_input pe-3" id="distance_home_work_unit_0">
                                                                                <option value="false" style="display:none"></option>
                                                                                <option value="&quot;kilometers&quot;">km
                                                                                </option>
                                                                                <option value="&quot;miles&quot;">mi
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                            <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                <label class="o_form_label" for="private_car_plate_0">Private Car Plate<sup class="text-info p-1" data-tooltip-template="web.FieldTooltip" data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;If you have more than one car, just separate the plates by a space.&quot;}}" data-tooltip-touch-tap-to-show="true">?</sup></label>
                                                            </div>
                                                            <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                                                <div name="private_car_plate" class="o_field_widget o_field_char"><input class="o_input" id="private_car_plate_0" type="text" autocomplete="off"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="o_inner_group grid col-lg-6">
                                                        <div class="g-col-sm-2">
                                                            <div class="o_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">
                                                                Family Status</div>
                                                        </div>
                                                        <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                            <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                <label class="o_form_label" for="marital_0">Marital
                                                                    Status</label>
                                                            </div>
                                                            <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                                                <div name="marital" class="o_field_widget o_required_modifier o_field_selection">
                                                                    <select class="o_input pe-3" id="marital_0">
                                                                        <option value="false" style="display:none">
                                                                        </option>
                                                                        <option value="&quot;single&quot;">Single
                                                                        </option>
                                                                        <option value="&quot;married&quot;">Married
                                                                        </option>
                                                                        <option value="&quot;cohabitant&quot;">Legal
                                                                            Cohabitant</option>
                                                                        <option value="&quot;widower&quot;">Widower
                                                                        </option>
                                                                        <option value="&quot;divorced&quot;">Divorced
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                            <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                <label class="o_form_label" for="spouse_complete_name_0">Spouse Complete
                                                                    Name</label>
                                                            </div>
                                                            <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                                                <div name="spouse_complete_name" class="o_field_widget o_field_char"><input class="o_input" id="spouse_complete_name_0" type="text" autocomplete="off"></div>
                                                            </div>
                                                        </div>
                                                        <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                            <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                <label class="o_form_label" for="spouse_birthdate_0">Spouse Birthdate</label>
                                                            </div>
                                                            <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                                                <div name="spouse_birthdate" class="o_field_widget o_field_date">
                                                                    <div class="d-flex gap-2 align-items-center">
                                                                        <input type="text" class="o_input cursor-pointer" autocomplete="off" id="spouse_birthdate_0" data-field="spouse_birthdate">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                            <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                <label class="o_form_label" for="children_0">Number
                                                                    of Dependent Children</label>
                                                            </div>
                                                            <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                                                <div name="children" class="o_field_widget o_field_integer"><input inputmode="numeric" class="o_input" autocomplete="off" id="children_0" type="text"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="o_inner_group grid col-lg-6">
                                                        <div class="g-col-sm-2">
                                                            <div class="o_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">
                                                                Emergency</div>
                                                        </div>
                                                        <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                            <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                <label class="o_form_label" for="emergency_contact_0">Contact Name</label>
                                                            </div>
                                                            <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                                                <div name="emergency_contact" class="o_field_widget o_field_char"><input class="o_input" id="emergency_contact_0" type="text" autocomplete="off"></div>
                                                            </div>
                                                        </div>
                                                        <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                            <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                <label class="o_form_label" for="emergency_phone_0">Contact Phone</label>
                                                            </div>
                                                            <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                                                <div name="emergency_phone" class="o_field_widget o_field_char o_force_ltr">
                                                                    <input class="o_input" id="emergency_phone_0" type="text" autocomplete="off">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                            <div class="o_cell flex-grow-1 flex-sm-grow-0" style="grid-column: span 2;width: 100%;">
                                                                <div class="o_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">
                                                                    Citizenship</div>
                                                            </div>
                                                        </div>
                                                        <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                            <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                <label class="o_form_label" for="country_id_0">Nationality (Country)</label>
                                                            </div>
                                                            <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                                                <div name="country_id" class="o_field_widget o_field_many2one">
                                                                    <div class="o_field_many2one_selection">
                                                                        <div class="o_input_dropdown">
                                                                            <div class="o-autocomplete dropdown">
                                                                                <input type="text" class="o-autocomplete--input o_input" autocomplete="off" role="combobox" aria-autocomplete="list" aria-haspopup="listbox" id="country_id_0" placeholder="" aria-expanded="false">
                                                                            </div><span class="o_dropdown_button"></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="o_field_many2one_extra"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                            <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                <label class="o_form_label" for="identification_id_0">Identification
                                                                    No</label>
                                                            </div>
                                                            <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                                                <div name="identification_id" class="o_field_widget o_field_char"><input class="o_input" id="identification_id_0" type="text" autocomplete="off"></div>
                                                            </div>
                                                        </div>
                                                        <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                            <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                <label class="o_form_label" for="ssnid_0">SSN
                                                                    No<sup class="text-info p-1" data-tooltip-template="web.FieldTooltip" data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;Social Security Number&quot;}}" data-tooltip-touch-tap-to-show="true">?</sup></label>
                                                            </div>
                                                            <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                                                <div name="ssnid" class="o_field_widget o_field_char"><input class="o_input" id="ssnid_0" type="text" autocomplete="off"></div>
                                                            </div>
                                                        </div>
                                                        <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                            <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                <label class="o_form_label" for="passport_id_0">Passport No</label>
                                                            </div>
                                                            <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                                                <div name="passport_id" class="o_field_widget o_field_char"><input class="o_input" id="passport_id_0" type="text" autocomplete="off"></div>
                                                            </div>
                                                        </div>
                                                        <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                            <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                <label class="o_form_label" for="gender_0">Gender</label>
                                                            </div>
                                                            <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                                                <div name="gender" class="o_field_widget o_field_selection"><select class="o_input pe-3" id="gender_0">
                                                                        <option value="false" style="">
                                                                        </option>
                                                                        <option value="&quot;male&quot;">Male</option>
                                                                        <option value="&quot;female&quot;">Female
                                                                        </option>
                                                                        <option value="&quot;other&quot;">Other
                                                                        </option>
                                                                    </select></div>
                                                            </div>
                                                        </div>
                                                        <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                            <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                <label class="o_form_label" for="birthday_0">Date of
                                                                    Birth</label>
                                                            </div>
                                                            <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                                                <div name="birthday" class="o_field_widget o_field_date">
                                                                    <div class="d-flex gap-2 align-items-center">
                                                                        <input type="text" class="o_input cursor-pointer" autocomplete="off" id="birthday_0" data-field="birthday">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                            <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                <label class="o_form_label" for="place_of_birth_0">Place of Birth</label>
                                                            </div>
                                                            <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                                                <div name="place_of_birth" class="o_field_widget o_field_char"><input class="o_input" id="place_of_birth_0" type="text" autocomplete="off"></div>
                                                            </div>
                                                        </div>
                                                        <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                            <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                <label class="o_form_label" for="country_of_birth_0">Country of Birth</label>
                                                            </div>
                                                            <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                                                <div name="country_of_birth" class="o_field_widget o_field_many2one">
                                                                    <div class="o_field_many2one_selection">
                                                                        <div class="o_input_dropdown">
                                                                            <div class="o-autocomplete dropdown">
                                                                                <input type="text" class="o-autocomplete--input o_input" autocomplete="off" role="combobox" aria-autocomplete="list" aria-haspopup="listbox" id="country_of_birth_0" placeholder="" aria-expanded="false">
                                                                            </div><span class="o_dropdown_button"></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="o_field_many2one_extra"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="o_inner_group grid col-lg-6">
                                                        <div class="g-col-sm-2">
                                                            <div class="o_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">
                                                                Education</div>
                                                        </div>
                                                        <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                            <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                <label class="o_form_label" for="certificate_0">Certificate Level</label>
                                                            </div>
                                                            <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                                                <div name="certificate" class="o_field_widget o_field_selection"><select class="o_input pe-3" id="certificate_0">
                                                                        <option value="false" style="">
                                                                        </option>
                                                                        <option value="&quot;graduate&quot;">Graduate
                                                                        </option>
                                                                        <option value="&quot;bachelor&quot;">Bachelor
                                                                        </option>
                                                                        <option value="&quot;master&quot;">Master
                                                                        </option>
                                                                        <option value="&quot;doctor&quot;">Doctor
                                                                        </option>
                                                                        <option value="&quot;other&quot;">Other
                                                                        </option>
                                                                    </select></div>
                                                            </div>
                                                        </div>
                                                        <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                            <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                <label class="o_form_label" for="study_field_0">Field of Study</label>
                                                            </div>
                                                            <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                                                <div name="study_field" class="o_field_widget o_field_char"><input class="o_input" id="study_field_0" type="text" autocomplete="off"></div>
                                                            </div>
                                                        </div>
                                                        <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                            <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                <label class="o_form_label" for="study_school_0">School</label>
                                                            </div>
                                                            <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                                                <div name="study_school" class="o_field_widget o_field_char"><input class="o_input" id="study_school_0" type="text" autocomplete="off"></div>
                                                            </div>
                                                        </div>
                                                        <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                            <div class="o_cell flex-grow-1 flex-sm-grow-0" style="grid-column: span 2;width: 100%;">
                                                                <div class="o_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">
                                                                    Work Permit</div>
                                                            </div>
                                                        </div>
                                                        <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                            <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                <label class="o_form_label" for="visa_no_0">Visa
                                                                    No</label>
                                                            </div>
                                                            <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                                                <div name="visa_no" class="o_field_widget o_field_char"><input class="o_input" id="visa_no_0" type="text" autocomplete="off"></div>
                                                            </div>
                                                        </div>
                                                        <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                            <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                <label class="o_form_label" for="permit_no_0">Work
                                                                    Permit No</label>
                                                            </div>
                                                            <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                                                <div name="permit_no" class="o_field_widget o_field_char"><input class="o_input" id="permit_no_0" type="text" autocomplete="off"></div>
                                                            </div>
                                                        </div>
                                                        <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                            <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                <label class="o_form_label" for="visa_expire_0">Visa
                                                                    Expiration Date</label>
                                                            </div>
                                                            <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                                                <div name="visa_expire" class="o_field_widget o_field_date">
                                                                    <div class="d-flex gap-2 align-items-center">
                                                                        <input type="text" class="o_input cursor-pointer" autocomplete="off" id="visa_expire_0" data-field="visa_expire">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                            <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                <label class="o_form_label" for="work_permit_expiration_date_0">Work Permit
                                                                    Expiration Date</label>
                                                            </div>
                                                            <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                                                <div name="work_permit_expiration_date" class="o_field_widget o_field_date">
                                                                    <div class="d-flex gap-2 align-items-center">
                                                                        <input type="text" class="o_input cursor-pointer" autocomplete="off" id="work_permit_expiration_date_0" data-field="work_permit_expiration_date">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                            <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                <label class="o_form_label" for="has_work_permit_0">Work Permit</label>
                                                            </div>
                                                            <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                                                <div name="has_work_permit" class="o_field_widget o_field_work_permit_upload">
                                                                    <label class="o_select_file_button btn btn-secondary"><span style="display:contents"> Upload your file
                                                                        </span><input type="file" class="o_input_file d-none" accept="*"></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane fade" id="hr_settings">
                                            <div class="tab-pane fade" style="display: contents;">
                                                <div class="o_group row align-items-start">
                                                    <div class="o_inner_group grid col-lg-6">
                                                        <div class="g-col-sm-2">
                                                            <div class="o_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">
                                                                Status</div>
                                                        </div>
                                                        <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                            <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                <label class="o_form_label" for="employee_type_0">Employee Type<sup class="text-info p-1" data-tooltip-template="web.FieldTooltip" data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;The employee type. Although the primary purpose may seem to categorize employees, this field has also an impact in the Contract History. Only Employee type is supposed to be under contract and will have a Contract History.&quot;}}" data-tooltip-touch-tap-to-show="true">?</sup></label>
                                                            </div>
                                                            <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                                                <div name="employee_type" class="o_field_widget o_required_modifier o_field_selection">
                                                                    <select class="o_input pe-3" id="employee_type_0">
                                                                        <option value="false" style="display:none">
                                                                        </option>
                                                                        <option value="&quot;employee&quot;">Employee
                                                                        </option>
                                                                        <option value="&quot;student&quot;">Student
                                                                        </option>
                                                                        <option value="&quot;trainee&quot;">Trainee
                                                                        </option>
                                                                        <option value="&quot;contractor&quot;">
                                                                            Contractor</option>
                                                                        <option value="&quot;freelance&quot;">
                                                                            Freelancer</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                            <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                <label class="o_form_label" for="user_id_1">Related
                                                                    User<sup class="text-info p-1" data-tooltip-template="web.FieldTooltip" data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;Related user name for the resource to manage its access.&quot;}}" data-tooltip-touch-tap-to-show="true">?</sup></label>
                                                            </div>
                                                            <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                                                <div name="user_id" class="o_field_widget o_field_many2one_avatar_user o_field_many2one_avatar">
                                                                    <div class="d-flex align-items-center gap-1"><span class="o_avatar o_m2o_avatar"><span class="o_avatar_empty o_m2o_avatar_empty"></span></span>
                                                                        <div class="o_field_many2one_selection">
                                                                            <div class="o_input_dropdown">
                                                                                <div class="o-autocomplete dropdown">
                                                                                    <input type="text" class="o-autocomplete--input o_input" autocomplete="off" role="combobox" aria-autocomplete="list" aria-haspopup="listbox" id="user_id_1" placeholder="" aria-expanded="false">
                                                                                </div>
                                                                                <span class="o_dropdown_button"></span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="o_field_many2one_extra"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="o_inner_group grid col-lg-6">
                                                        <div class="g-col-sm-2">
                                                            <div class="o_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">
                                                                Attendance/Point of Sale/Manufacturing</div>
                                                        </div>
                                                        <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                            <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                <label class="o_form_label" for="pin_0">PIN
                                                                    Code<sup class="text-info p-1" data-tooltip-template="web.FieldTooltip" data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;PIN used to Check In/Out in the Kiosk Mode of the Attendance application (if enabled in Configuration) and to change the cashier in the Point of Sale application.&quot;}}" data-tooltip-touch-tap-to-show="true">?</sup></label>
                                                            </div>
                                                            <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                                                <div name="pin" class="o_field_widget o_field_char"><input class="o_input" id="pin_0" type="text" autocomplete="off"></div>
                                                            </div>
                                                        </div>
                                                        <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                            <div class="o_cell flex-grow-1 flex-sm-grow-0 o_wrap_label w-100 text-break text-900" style=""><label class="o_form_label" for="barcode_0">Badge ID<sup class="text-info p-1" data-tooltip-template="web.FieldTooltip" data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;ID used for employee identification.&quot;}}" data-tooltip-touch-tap-to-show="true">?</sup></label>
                                                            </div>
                                                            <div class="o_cell flex-grow-1 flex-sm-grow-0" style="width: 100%;">
                                                                <div class="o_row">
                                                                    <div name="barcode" class="o_field_widget o_field_char"><input class="o_input" id="barcode_0" type="text" autocomplete="off"></div>
                                                                    <button invisible="barcode" class="btn btn-link" name="generate_random_barcode" type="object"><span>Generate</span></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="o_inner_group grid col-lg-6">
                                                        <div class="g-col-sm-2">
                                                            <div class="o_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">
                                                                Application Settings</div>
                                                        </div>
                                                        <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                            <div class="o_cell flex-grow-1 flex-sm-grow-0 o_wrap_label w-100 text-break text-900" style=""><label class="o_form_label" for="hourly_cost_0">Hourly Cost</label></div>
                                                            <div class="o_cell flex-grow-1 flex-sm-grow-0" style="width: 100%;">
                                                                <div name="hourly_cost">
                                                                    <div name="hourly_cost" class="o_field_widget o_field_monetary oe_inline">
                                                                        <div class="text-nowrap d-inline-flex w-100 align-items-baseline position-relative">
                                                                            <span class="o_input position-absolute pe-none d-flex w-100"><span>₹&nbsp;</span><span class="opacity-0 d-inline-block overflow-hidden mw-100 o_monetary_ghost_value">0.00</span></span><span class="opacity-0">₹&nbsp;</span><input class="o_input flex-grow-1 flex-shrink-1" autocomplete="off" id="hourly_cost_0" type="text">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" style="display: contents;">
                                                <div class="o_group row align-items-start">
                                                    <div class="o_inner_group grid col-lg-6">
                                                        <div class="g-col-sm-2">
                                                            <div class="o_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">
                                                                Private Contact</div>
                                                        </div>
                                                        <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                            <div class="o_cell flex-grow-1 flex-sm-grow-0 o_wrap_label w-100 text-break text-900" style=""><label class="o_form_label" for="private_street_0">Private Address</label>
                                                            </div>
                                                            <div class="o_cell flex-grow-1 flex-sm-grow-0" style="width: 100%;">
                                                                <div class="o_address_format">
                                                                    <div name="private_street" class="o_field_widget o_field_char o_address_street">
                                                                        <input class="o_input" id="private_street_0" type="text" autocomplete="off" placeholder="Street..."></div>
                                                                    <div name="private_street2" class="o_field_widget o_field_char o_address_street">
                                                                        <input class="o_input" id="private_street2_0" type="text" autocomplete="off" placeholder="Street 2..."></div>
                                                                    <div name="private_city" class="o_field_widget o_field_char o_address_city">
                                                                        <input class="o_input" id="private_city_0" type="text" autocomplete="off" placeholder="City"></div>
                                                                    <div name="private_state_id" class="o_field_widget o_field_many2one o_address_state">
                                                                        <div class="o_field_many2one_selection">
                                                                            <div class="o_input_dropdown">
                                                                                <div class="o-autocomplete dropdown">
                                                                                    <input type="text" class="o-autocomplete--input o_input" autocomplete="off" role="combobox" aria-autocomplete="list" aria-haspopup="listbox" id="private_state_id_0" placeholder="State" aria-expanded="false"></div>
                                                                                <span class="o_dropdown_button"></span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="o_field_many2one_extra"></div>
                                                                    </div>
                                                                    <div name="private_zip" class="o_field_widget o_field_char o_address_zip">
                                                                        <input class="o_input" id="private_zip_0" type="text" autocomplete="off" placeholder="ZIP"></div>
                                                                    <div name="private_country_id" class="o_field_widget o_field_many2one o_address_country">
                                                                        <div class="o_field_many2one_selection">
                                                                            <div class="o_input_dropdown">
                                                                                <div class="o-autocomplete dropdown">
                                                                                    <input type="text" class="o-autocomplete--input o_input" autocomplete="off" role="combobox" aria-autocomplete="list" aria-haspopup="listbox" id="private_country_id_0" placeholder="Country" aria-expanded="false"></div>
                                                                                <span class="o_dropdown_button"></span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="o_field_many2one_extra"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                            <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                <label class="o_form_label" for="private_email_0">Email</label></div>
                                                            <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                                                <div name="private_email" class="o_field_widget o_field_char"><input class="o_input" id="private_email_0" type="text" autocomplete="off" placeholder="myprivateemail@example.com">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                            <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                <label class="o_form_label" for="private_phone_0">Phone</label></div>
                                                            <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                                                <div name="private_phone" class="o_field_widget o_field_char"><input class="o_input" id="private_phone_0" type="text" autocomplete="off"></div>
                                                            </div>
                                                        </div>
                                                        <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                            <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                <label class="o_form_label o_form_label_readonly" for="bank_account_id_0">Bank Account Number<sup class="text-info p-1" data-tooltip-template="web.FieldTooltip" data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;Employee bank account to pay salaries&quot;}}" data-tooltip-touch-tap-to-show="true">?</sup></label>
                                                            </div>
                                                            <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                                                <div name="bank_account_id" class="o_field_widget o_readonly_modifier o_field_many2one">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                            <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                <label class="o_form_label" for="lang_0">Language</label></div>
                                                            <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                                                <div name="lang" class="o_field_widget o_field_selection"><select class="o_input pe-3" id="lang_0">
                                                                        <option value="false" style="">
                                                                        </option>
                                                                        <option value="&quot;en_IN&quot;">English (IN)
                                                                        </option>
                                                                    </select></div>
                                                            </div>
                                                        </div>
                                                        <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                            <div class="o_cell flex-grow-1 flex-sm-grow-0 o_wrap_label w-100 text-break text-900" style=""><label class="o_form_label" for="distance_home_work_0">Home-Work
                                                                    Distance</label></div>
                                                            <div class="o_cell flex-grow-1 flex-sm-grow-0" style="width: 100%;">
                                                                <div class="o_row" name="div_km_home_work">
                                                                    <div name="distance_home_work" class="o_field_widget o_field_integer o_hr_narrow_field">
                                                                        <input inputmode="numeric" class="o_input" autocomplete="off" id="distance_home_work_0" type="text"></div><span>
                                                                        <div name="distance_home_work_unit" class="o_field_widget o_required_modifier o_field_selection">
                                                                            <select class="o_input pe-3" id="distance_home_work_unit_0">
                                                                                <option value="false" style="display:none"></option>
                                                                                <option value="&quot;kilometers&quot;">km
                                                                                </option>
                                                                                <option value="&quot;miles&quot;">mi
                                                                                </option>
                                                                            </select></div>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                            <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                <label class="o_form_label" for="private_car_plate_0">Private Car Plate<sup class="text-info p-1" data-tooltip-template="web.FieldTooltip" data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;If you have more than one car, just separate the plates by a space.&quot;}}" data-tooltip-touch-tap-to-show="true">?</sup></label>
                                                            </div>
                                                            <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                                                <div name="private_car_plate" class="o_field_widget o_field_char"><input class="o_input" id="private_car_plate_0" type="text" autocomplete="off"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="o_inner_group grid col-lg-6">
                                                        <div class="g-col-sm-2">
                                                            <div class="o_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">
                                                                Family Status</div>
                                                        </div>
                                                        <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                            <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                <label class="o_form_label" for="marital_0">Marital
                                                                    Status</label></div>
                                                            <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                                                <div name="marital" class="o_field_widget o_required_modifier o_field_selection">
                                                                    <select class="o_input pe-3" id="marital_0">
                                                                        <option value="false" style="display:none">
                                                                        </option>
                                                                        <option value="&quot;single&quot;">Single
                                                                        </option>
                                                                        <option value="&quot;married&quot;">Married
                                                                        </option>
                                                                        <option value="&quot;cohabitant&quot;">Legal
                                                                            Cohabitant</option>
                                                                        <option value="&quot;widower&quot;">Widower
                                                                        </option>
                                                                        <option value="&quot;divorced&quot;">Divorced
                                                                        </option>
                                                                    </select></div>
                                                            </div>
                                                        </div>
                                                        <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                            <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                <label class="o_form_label" for="spouse_complete_name_0">Spouse Complete
                                                                    Name</label></div>
                                                            <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                                                <div name="spouse_complete_name" class="o_field_widget o_field_char"><input class="o_input" id="spouse_complete_name_0" type="text" autocomplete="off"></div>
                                                            </div>
                                                        </div>
                                                        <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                            <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                <label class="o_form_label" for="spouse_birthdate_0">Spouse Birthdate</label>
                                                            </div>
                                                            <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                                                <div name="spouse_birthdate" class="o_field_widget o_field_date">
                                                                    <div class="d-flex gap-2 align-items-center">
                                                                        <input type="text" class="o_input cursor-pointer" autocomplete="off" id="spouse_birthdate_0" data-field="spouse_birthdate"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                            <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                <label class="o_form_label" for="children_0">Number
                                                                    of Dependent Children</label></div>
                                                            <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                                                <div name="children" class="o_field_widget o_field_integer"><input inputmode="numeric" class="o_input" autocomplete="off" id="children_0" type="text"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="o_inner_group grid col-lg-6">
                                                        <div class="g-col-sm-2">
                                                            <div class="o_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">
                                                                Emergency</div>
                                                        </div>
                                                        <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                            <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                <label class="o_form_label" for="emergency_contact_0">Contact Name</label>
                                                            </div>
                                                            <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                                                <div name="emergency_contact" class="o_field_widget o_field_char"><input class="o_input" id="emergency_contact_0" type="text" autocomplete="off"></div>
                                                            </div>
                                                        </div>
                                                        <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                            <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                <label class="o_form_label" for="emergency_phone_0">Contact Phone</label>
                                                            </div>
                                                            <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                                                <div name="emergency_phone" class="o_field_widget o_field_char o_force_ltr">
                                                                    <input class="o_input" id="emergency_phone_0" type="text" autocomplete="off"></div>
                                                            </div>
                                                        </div>
                                                        <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                            <div class="o_cell flex-grow-1 flex-sm-grow-0" style="grid-column: span 2;width: 100%;">
                                                                <div class="o_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">
                                                                    Citizenship</div>
                                                            </div>
                                                        </div>
                                                        <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                            <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                <label class="o_form_label" for="country_id_0">Nationality (Country)</label>
                                                            </div>
                                                            <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                                                <div name="country_id" class="o_field_widget o_field_many2one">
                                                                    <div class="o_field_many2one_selection">
                                                                        <div class="o_input_dropdown">
                                                                            <div class="o-autocomplete dropdown">
                                                                                <input type="text" class="o-autocomplete--input o_input" autocomplete="off" role="combobox" aria-autocomplete="list" aria-haspopup="listbox" id="country_id_0" placeholder="" aria-expanded="false"></div><span class="o_dropdown_button"></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="o_field_many2one_extra"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                            <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                <label class="o_form_label" for="identification_id_0">Identification
                                                                    No</label></div>
                                                            <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                                                <div name="identification_id" class="o_field_widget o_field_char"><input class="o_input" id="identification_id_0" type="text" autocomplete="off"></div>
                                                            </div>
                                                        </div>
                                                        <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                            <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                <label class="o_form_label" for="ssnid_0">SSN
                                                                    No<sup class="text-info p-1" data-tooltip-template="web.FieldTooltip" data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;Social Security Number&quot;}}" data-tooltip-touch-tap-to-show="true">?</sup></label>
                                                            </div>
                                                            <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                                                <div name="ssnid" class="o_field_widget o_field_char"><input class="o_input" id="ssnid_0" type="text" autocomplete="off"></div>
                                                            </div>
                                                        </div>
                                                        <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                            <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                <label class="o_form_label" for="passport_id_0">Passport No</label></div>
                                                            <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                                                <div name="passport_id" class="o_field_widget o_field_char"><input class="o_input" id="passport_id_0" type="text" autocomplete="off"></div>
                                                            </div>
                                                        </div>
                                                        <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                            <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                <label class="o_form_label" for="gender_0">Gender</label></div>
                                                            <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                                                <div name="gender" class="o_field_widget o_field_selection"><select class="o_input pe-3" id="gender_0">
                                                                        <option value="false" style="">
                                                                        </option>
                                                                        <option value="&quot;male&quot;">Male</option>
                                                                        <option value="&quot;female&quot;">Female
                                                                        </option>
                                                                        <option value="&quot;other&quot;">Other
                                                                        </option>
                                                                    </select></div>
                                                            </div>
                                                        </div>
                                                        <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                            <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                <label class="o_form_label" for="birthday_0">Date of
                                                                    Birth</label></div>
                                                            <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                                                <div name="birthday" class="o_field_widget o_field_date">
                                                                    <div class="d-flex gap-2 align-items-center">
                                                                        <input type="text" class="o_input cursor-pointer" autocomplete="off" id="birthday_0" data-field="birthday"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                            <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                <label class="o_form_label" for="place_of_birth_0">Place of Birth</label>
                                                            </div>
                                                            <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                                                <div name="place_of_birth" class="o_field_widget o_field_char"><input class="o_input" id="place_of_birth_0" type="text" autocomplete="off"></div>
                                                            </div>
                                                        </div>
                                                        <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                            <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                <label class="o_form_label" for="country_of_birth_0">Country of Birth</label>
                                                            </div>
                                                            <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                                                <div name="country_of_birth" class="o_field_widget o_field_many2one">
                                                                    <div class="o_field_many2one_selection">
                                                                        <div class="o_input_dropdown">
                                                                            <div class="o-autocomplete dropdown">
                                                                                <input type="text" class="o-autocomplete--input o_input" autocomplete="off" role="combobox" aria-autocomplete="list" aria-haspopup="listbox" id="country_of_birth_0" placeholder="" aria-expanded="false"></div><span class="o_dropdown_button"></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="o_field_many2one_extra"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="o_inner_group grid col-lg-6">
                                                        <div class="g-col-sm-2">
                                                            <div class="o_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">
                                                                Education</div>
                                                        </div>
                                                        <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                            <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                <label class="o_form_label" for="certificate_0">Certificate Level</label>
                                                            </div>
                                                            <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                                                <div name="certificate" class="o_field_widget o_field_selection"><select class="o_input pe-3" id="certificate_0">
                                                                        <option value="false" style="">
                                                                        </option>
                                                                        <option value="&quot;graduate&quot;">Graduate
                                                                        </option>
                                                                        <option value="&quot;bachelor&quot;">Bachelor
                                                                        </option>
                                                                        <option value="&quot;master&quot;">Master
                                                                        </option>
                                                                        <option value="&quot;doctor&quot;">Doctor
                                                                        </option>
                                                                        <option value="&quot;other&quot;">Other
                                                                        </option>
                                                                    </select></div>
                                                            </div>
                                                        </div>
                                                        <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                            <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                <label class="o_form_label" for="study_field_0">Field of Study</label></div>
                                                            <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                                                <div name="study_field" class="o_field_widget o_field_char"><input class="o_input" id="study_field_0" type="text" autocomplete="off"></div>
                                                            </div>
                                                        </div>
                                                        <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                            <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                <label class="o_form_label" for="study_school_0">School</label></div>
                                                            <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                                                <div name="study_school" class="o_field_widget o_field_char"><input class="o_input" id="study_school_0" type="text" autocomplete="off"></div>
                                                            </div>
                                                        </div>
                                                        <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                            <div class="o_cell flex-grow-1 flex-sm-grow-0" style="grid-column: span 2;width: 100%;">
                                                                <div class="o_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">
                                                                    Work Permit</div>
                                                            </div>
                                                        </div>
                                                        <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                            <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                <label class="o_form_label" for="visa_no_0">Visa
                                                                    No</label></div>
                                                            <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                                                <div name="visa_no" class="o_field_widget o_field_char"><input class="o_input" id="visa_no_0" type="text" autocomplete="off"></div>
                                                            </div>
                                                        </div>
                                                        <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                            <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                <label class="o_form_label" for="permit_no_0">Work
                                                                    Permit No</label></div>
                                                            <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                                                <div name="permit_no" class="o_field_widget o_field_char"><input class="o_input" id="permit_no_0" type="text" autocomplete="off"></div>
                                                            </div>
                                                        </div>
                                                        <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                            <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                <label class="o_form_label" for="visa_expire_0">Visa
                                                                    Expiration Date</label></div>
                                                            <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                                                <div name="visa_expire" class="o_field_widget o_field_date">
                                                                    <div class="d-flex gap-2 align-items-center">
                                                                        <input type="text" class="o_input cursor-pointer" autocomplete="off" id="visa_expire_0" data-field="visa_expire"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                            <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                <label class="o_form_label" for="work_permit_expiration_date_0">Work Permit
                                                                    Expiration Date</label></div>
                                                            <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                                                <div name="work_permit_expiration_date" class="o_field_widget o_field_date">
                                                                    <div class="d-flex gap-2 align-items-center">
                                                                        <input type="text" class="o_input cursor-pointer" autocomplete="off" id="work_permit_expiration_date_0" data-field="work_permit_expiration_date">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                            <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                <label class="o_form_label" for="has_work_permit_0">Work Permit</label></div>
                                                            <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                                                <div name="has_work_permit" class="o_field_widget o_field_work_permit_upload">
                                                                    <label class="o_select_file_button btn btn-secondary"><span style="display:contents"> Upload your file
                                                                        </span><input type="file" class="o_input_file d-none" accept="*"></label></div>
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
                                        <button class="o-mail-Chatter-sendMessage btn text-nowrap me-1 btn-primary my-2" data-hotkey="m"> Send message </button><button class="o-mail-Chatter-logNote btn text-nowrap me-1 btn-secondary my-2" data-hotkey="shift+m"> Log note </button>
                                        <div class="flex-grow-1 d-flex"><button class="o-mail-Chatter-activity btn btn-secondary text-nowrap my-2" data-hotkey="shift+a"><span>Activities</span></button><span class="o-mail-Chatter-topbarGrow flex-grow-1 pe-2"></span><button class="btn btn-link text-action" aria-label="Search Messages" title="Search Messages"><i class="oi oi-search" role="img"></i></button><button class="o-mail-Chatter-attachFiles btn btn-link text-action px-1 d-flex align-items-center my-2" aria-label="Attach files"><i class="fa fa-paperclip fa-lg me-1"></i><sup>1</sup></button>
                                            <div class="o-mail-Followers d-flex me-1"><button class="o-mail-Followers-button btn btn-link d-flex align-items-center text-action px-1 my-2 o-dropdown dropdown-toggle dropdown" title="Show Followers" aria-expanded="false"><i class="fa fa-user-o me-1" role="img"></i><sup class="o-mail-Followers-counter">2</sup></button></div><button class="btn px-0 text-success my-2">
                                                <div class="position-relative"><span class="d-flex invisible text-nowrap">Following</span><span class="o-mail-Chatter-follow position-absolute end-0 top-0">Following</span>
                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="o-mail-Chatter-content">
                                    <div class="o-mail-Thread position-relative flex-grow-1 d-flex flex-column overflow-auto pb-4" tabindex="-1">
                                        <div class="d-flex flex-column position-relative flex-grow-1"><span class="position-absolute w-100 invisible top-0" style="height: Min(1155px, 100%)"></span><span></span>
                                            <div class="o-mail-DateSection d-flex align-items-center w-100 fw-bold z-1 pt-2">
                                                <hr class="o-discuss-separator flex-grow-1"><span class="px-3 opacity-75 small text-muted">Today</span>
                                                <hr class="o-discuss-separator flex-grow-1">
                                            </div>
                                            <div class="o-mail-Message position-relative pt-1 o-selfAuthored mt-1" role="group" aria-label="System notification">
                                                <div class="o-mail-Message-core position-relative d-flex flex-shrink-0">
                                                    <div class="o-mail-Message-sidebar d-flex flex-shrink-0 align-items-start justify-content-start">
                                                        <div class="o-mail-Message-avatarContainer position-relative bg-view cursor-pointer" aria-label="Open card"><img class="o-mail-Message-avatar w-100 h-100 rounded o_object_fit_cover o_redirect cursor-pointer" src="http://127.0.0.1:8000/images/employees.png">
                                                        </div>
                                                    </div>
                                                    <div class="w-100 o-min-width-0">
                                                        <div class="o-mail-Message-header d-flex flex-wrap align-items-baseline lh-1 mb-1">
                                                            <span class="o-mail-Message-author cursor-pointer o-hover-text-underline" aria-label="Open card"><strong class="me-1 text-truncate">info@yantradesign.co.in</strong></span><small class="o-mail-Message-date text-muted opacity-75 o-smaller" title="2/8/2024, 10:26:55 am">- 27 minutes ago</small>
                                                        </div>
                                                        <div class="position-relative d-flex">
                                                            <div class="o-mail-Message-content o-min-width-0">
                                                                <div class="o-mail-Message-textContent position-relative d-flex">
                                                                    <div>
                                                                        <div>
                                                                            <div class="o-mail-Message-body text-break mb-0 w-100">
                                                                                <p>
                                                                                    <span class="fa fa-check fa-fw"></span><span>To-Do</span>
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
                                                                    <div class="o-mail-Message-actions d-print-none ms-2 mt-1 invisible">
                                                                        <div class="d-flex rounded-1 overflow-hidden">
                                                                            <button class="btn px-1 py-0 lh-1 rounded-0 rounded-start-1" tabindex="1" title="Add a Reaction" aria-label="Add a Reaction"><i class="oi fa-lg oi-smile-add"></i></button><button class="btn px-1 py-0 rounded-0 rounded-end-1" title="Mark as Todo" name="toggle-star"><i class="fa fa-lg fa-star-o"></i></button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="o-mail-Message position-relative pt-1 o-selfAuthored mt-1" role="group" aria-label="Note">
                                                <div class="o-mail-Message-core position-relative d-flex flex-shrink-0">
                                                    <div class="o-mail-Message-sidebar d-flex flex-shrink-0 align-items-start justify-content-start">
                                                        <div class="o-mail-Message-avatarContainer position-relative bg-view cursor-pointer" aria-label="Open card"><img class="o-mail-Message-avatar w-100 h-100 rounded o_object_fit_cover o_redirect cursor-pointer" src="http://127.0.0.1:8000/images/employees.png">
                                                        </div>
                                                    </div>
                                                    <div class="w-100 o-min-width-0">
                                                        <div class="o-mail-Message-header d-flex flex-wrap align-items-baseline lh-1">
                                                            <span class="o-mail-Message-author cursor-pointer o-hover-text-underline" aria-label="Open card"><strong class="me-1 text-truncate">info@yantradesign.co.in</strong></span><small class="o-mail-Message-date text-muted opacity-75 o-smaller" title="2/8/2024, 10:26:11 am">- 28 minutes ago</small>
                                                            <div class="o-mail-Message-actions d-print-none ms-2 my-n2 invisible">
                                                                <div class="d-flex rounded-1 overflow-hidden"><button class="btn px-1 py-0 lh-1 rounded-0 rounded-start-1" tabindex="1" title="Add a Reaction" aria-label="Add a Reaction"><i class="oi fa-lg oi-smile-add"></i></button><button class="btn px-1 py-0 rounded-0" title="Mark as Todo" name="toggle-star"><i class="fa fa-lg fa-star-o"></i></button>
                                                                    <div class="d-flex rounded-0"><button class="btn px-1 py-0 rounded-0 rounded-end-1 o-dropdown dropdown-toggle dropdown" title="Expand" aria-expanded="false"><i class="fa fa-lg fa-ellipsis-h" tabindex="1"></i></button></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="position-relative d-flex">
                                                            <div class="o-mail-Message-content o-min-width-0 pt-1">
                                                                <div class="o-mail-Message-textContent position-relative d-flex">
                                                                    <div class="position-relative overflow-x-auto d-inline-block">
                                                                        <div class="o-mail-Message-bubble rounded-bottom-3 position-absolute top-0 start-0 w-100 h-100 rounded-end-3">
                                                                        </div>
                                                                        <div class="position-relative text-break o-mail-Message-body p-1">
                                                                            <p>karan vora 2</p>
                                                                        </div>
                                                                        <div class="o-mail-Message-seenContainer position-absolute bottom-0">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="o-mail-Message position-relative pt-1 o-selfAuthored mt-1" role="group" aria-label="Message">
                                                <div class="o-mail-Message-core position-relative d-flex flex-shrink-0">
                                                    <div class="o-mail-Message-sidebar d-flex flex-shrink-0 align-items-start justify-content-start">
                                                        <div class="o-mail-Message-avatarContainer position-relative bg-view cursor-pointer" aria-label="Open card"><img class="o-mail-Message-avatar w-100 h-100 rounded o_object_fit_cover o_redirect cursor-pointer" src="http://127.0.0.1:8000/images/employees.png">
                                                        </div>
                                                    </div>
                                                    <div class="w-100 o-min-width-0">
                                                        <div class="o-mail-Message-header d-flex flex-wrap align-items-baseline lh-1 mb-1">
                                                            <span class="o-mail-Message-author cursor-pointer o-hover-text-underline" aria-label="Open card"><strong class="me-1 text-truncate">info@yantradesign.co.in</strong></span>
                                                            <div class="mx-1"><span class="o-mail-Message-notification cursor-pointer text-danger" role="button" tabindex="0"><i role="img" aria-label="Delivery failure" class="fa fa-envelope"></i> </span></div>
                                                            <small class="o-mail-Message-date text-muted opacity-75 o-smaller" title="2/8/2024, 10:25:59 am">- 28 minutes ago</small>
                                                        </div>
                                                        <div class="position-relative d-flex">
                                                            <div class="o-mail-Message-content o-min-width-0">
                                                                <div class="o-mail-Message-textContent position-relative d-flex">
                                                                    <div class="position-relative overflow-x-auto d-inline-block">
                                                                        <div class="o-mail-Message-bubble rounded-bottom-3 position-absolute top-0 start-0 w-100 h-100 bg-success-light border border-success opacity-25 rounded-end-3">
                                                                        </div>
                                                                        <div class="position-relative text-break o-mail-Message-body mb-0 py-2 px-3 align-self-start rounded-end-3 rounded-bottom-3">
                                                                            <p>karan vora</p>
                                                                        </div>
                                                                        <div class="o-mail-Message-seenContainer position-absolute bottom-0">
                                                                        </div>
                                                                    </div>
                                                                    <div class="o-mail-Message-actions d-print-none ms-2 mt-1 invisible">
                                                                        <div class="d-flex rounded-1 overflow-hidden">
                                                                            <button class="btn px-1 py-0 lh-1 rounded-0 rounded-start-1" tabindex="1" title="Add a Reaction" aria-label="Add a Reaction"><i class="oi fa-lg oi-smile-add"></i></button><button class="btn px-1 py-0 rounded-0" title="Mark as Todo" name="toggle-star"><i class="fa fa-lg fa-star-o"></i></button>
                                                                            <div class="d-flex rounded-0"><button class="btn px-1 py-0 rounded-0 rounded-end-1 o-dropdown dropdown-toggle dropdown" title="Expand" aria-expanded="false"><i class="fa fa-lg fa-ellipsis-h" tabindex="1"></i></button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="o-mail-Message position-relative pt-1 o-selfAuthored mt-1" role="group" aria-label="Note">
                                                <div class="o-mail-Message-core position-relative d-flex flex-shrink-0">
                                                    <div class="o-mail-Message-sidebar d-flex flex-shrink-0 align-items-start justify-content-start">
                                                        <div class="o-mail-Message-avatarContainer position-relative bg-view cursor-pointer" aria-label="Open card"><img class="o-mail-Message-avatar w-100 h-100 rounded o_object_fit_cover o_redirect cursor-pointer" src="http://127.0.0.1:8000/images/employees.png">
                                                        </div>
                                                    </div>
                                                    <div class="w-100 o-min-width-0">
                                                        <div class="o-mail-Message-header d-flex flex-wrap align-items-baseline lh-1">
                                                            <span class="o-mail-Message-author cursor-pointer o-hover-text-underline" aria-label="Open card"><strong class="me-1 text-truncate">info@yantradesign.co.in</strong></span><small class="o-mail-Message-date text-muted opacity-75 o-smaller" title="2/8/2024, 10:23:51 am">- 31 minutes ago</small>
                                                            <div class="o-mail-Message-actions d-print-none ms-2 my-n2 invisible">
                                                                <div class="d-flex rounded-1 overflow-hidden"><button class="btn px-1 py-0 lh-1 rounded-0 rounded-start-1" tabindex="1" title="Add a Reaction" aria-label="Add a Reaction"><i class="oi fa-lg oi-smile-add"></i></button><button class="btn px-1 py-0 rounded-0" title="Mark as Todo" name="toggle-star"><i class="fa fa-lg fa-star-o"></i></button>
                                                                    <div class="d-flex rounded-0"><button class="btn px-1 py-0 rounded-0 rounded-end-1 o-dropdown dropdown-toggle dropdown" title="Expand" aria-expanded="false"><i class="fa fa-lg fa-ellipsis-h" tabindex="1"></i></button></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="position-relative d-flex">
                                                            <div class="o-mail-Message-content o-min-width-0 pt-1">
                                                                <div class="o-mail-Message-textContent position-relative d-flex">
                                                                </div>
                                                                <div class="o-mail-AttachmentList overflow-y-auto d-flex flex-column mt-1">
                                                                    <div class="d-flex flex-grow-1 flex-wrap mx-1 align-items-center" role="menu"></div>
                                                                    <div class="grid row-gap-0 column-gap-0">
                                                                        <div class="o-mail-AttachmentCard d-flex rounded mb-1 me-1 mw-100 overflow-auto g-col-4 bg-300" role="menu" title="NIVODA.xlsx" aria-label="NIVODA.xlsx">
                                                                            <div class="o-mail-AttachmentCard-image o_image flex-shrink-0 m-1" role="menuitem" aria-label="Preview" tabindex="-1" data-mimetype="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
                                                                            </div>
                                                                            <div class="overflow-auto d-flex justify-content-center flex-column px-1">
                                                                                <div class="text-truncate">NIVODA.xlsx
                                                                                </div><small class="text-uppercase">xlsx</small>
                                                                            </div>
                                                                            <div class="flex-grow-1"></div>
                                                                            <div class="o-mail-AttachmentCard-aside position-relative rounded-end overflow-hidden d-flex">
                                                                                <button class="btn d-flex align-items-center justify-content-center w-100 h-100 rounded-0 bg-300" title="Download"><i class="fa fa-download" role="img" aria-label="Download"></i></button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="o-mail-Message position-relative pt-1 o-selfAuthored mt-1" role="group" aria-label="Note">
                                                <div class="o-mail-Message-core position-relative d-flex flex-shrink-0">
                                                    <div class="o-mail-Message-sidebar d-flex flex-shrink-0 align-items-start justify-content-start">
                                                        <div class="o-mail-Message-avatarContainer position-relative bg-view cursor-pointer" aria-label="Open card"><img class="o-mail-Message-avatar w-100 h-100 rounded o_object_fit_cover o_redirect cursor-pointer" src="http://127.0.0.1:8000/images/employees.png">
                                                        </div>
                                                    </div>
                                                    <div class="w-100 o-min-width-0">
                                                        <div class="o-mail-Message-header d-flex flex-wrap align-items-baseline lh-1">
                                                            <span class="o-mail-Message-author cursor-pointer o-hover-text-underline" aria-label="Open card"><strong class="me-1 text-truncate">info@yantradesign.co.in</strong></span><small class="o-mail-Message-date text-muted opacity-75 o-smaller" title="2/8/2024, 10:23:41 am">- 31 minutes ago</small>
                                                            <div class="o-mail-Message-actions d-print-none ms-2 my-n2 invisible">
                                                                <div class="d-flex rounded-1 overflow-hidden"><button class="btn px-1 py-0 lh-1 rounded-0 rounded-start-1" tabindex="1" title="Add a Reaction" aria-label="Add a Reaction"><i class="oi fa-lg oi-smile-add"></i></button><button class="btn px-1 py-0 rounded-0" title="Mark as Todo" name="toggle-star"><i class="fa fa-lg fa-star-o"></i></button>
                                                                    <div class="d-flex rounded-0"><button class="btn px-1 py-0 rounded-0 rounded-end-1 o-dropdown dropdown-toggle dropdown" title="Expand" aria-expanded="false"><i class="fa fa-lg fa-ellipsis-h" tabindex="1"></i></button></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="position-relative d-flex">
                                                            <div class="o-mail-Message-content o-min-width-0 pt-1">
                                                                <div class="o-mail-Message-textContent position-relative d-flex">
                                                                    <div class="position-relative overflow-x-auto d-inline-block">
                                                                        <div class="o-mail-Message-bubble rounded-bottom-3 position-absolute top-0 start-0 w-100 h-100 rounded-end-3">
                                                                        </div>
                                                                        <div class="position-relative text-break o-mail-Message-body p-1">
                                                                            <p>bhvg</p>
                                                                        </div>
                                                                        <div class="o-mail-Message-seenContainer position-absolute bottom-0">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="o-mail-Message position-relative pt-1 o-selfAuthored mt-1" role="group" aria-label="System notification">
                                                <div class="o-mail-Message-core position-relative d-flex flex-shrink-0">
                                                    <div class="o-mail-Message-sidebar d-flex flex-shrink-0 align-items-start justify-content-start">
                                                        <div class="o-mail-Message-avatarContainer position-relative bg-view cursor-pointer" aria-label="Open card"><img class="o-mail-Message-avatar w-100 h-100 rounded o_object_fit_cover o_redirect cursor-pointer" src="http://127.0.0.1:8000/images/employees.png">
                                                        </div>
                                                    </div>
                                                    <div class="w-100 o-min-width-0">
                                                        <div class="o-mail-Message-header d-flex flex-wrap align-items-baseline lh-1">
                                                            <span class="o-mail-Message-author cursor-pointer o-hover-text-underline" aria-label="Open card"><strong class="me-1 text-truncate">info@yantradesign.co.in</strong></span><small class="o-mail-Message-date text-muted opacity-75 o-smaller" title="2/8/2024, 10:23:33 am">- 31 minutes ago</small>
                                                            <div class="o-mail-Message-actions d-print-none ms-2 my-n2 invisible">
                                                                <div class="d-flex rounded-1 overflow-hidden"><button class="btn px-1 py-0 lh-1 rounded-0 rounded-start-1" tabindex="1" title="Add a Reaction" aria-label="Add a Reaction"><i class="oi fa-lg oi-smile-add"></i></button><button class="btn px-1 py-0 rounded-0 rounded-end-1" title="Mark as Todo" name="toggle-star"><i class="fa fa-lg fa-star-o"></i></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="position-relative d-flex">
                                                            <div class="o-mail-Message-content o-min-width-0 pt-1">
                                                                <div class="o-mail-Message-textContent position-relative d-flex">
                                                                    <div>
                                                                        <div>
                                                                            <div class="o-mail-Message-body text-break mb-0 w-100">
                                                                                <span><b>Congratulations!</b> May I
                                                                                    recommend you to setup an <a href="/web#action=hr.plan_wizard_action&amp;active_id=2&amp;active_model=hr.employee&amp;menu_id=291">onboarding
                                                                                        plan?</a></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="o-mail-Message position-relative pt-1 o-selfAuthored mt-1" role="group" aria-label="System notification">
                                                <div class="o-mail-Message-core position-relative d-flex flex-shrink-0">
                                                    <div class="o-mail-Message-sidebar d-flex flex-shrink-0 align-items-start justify-content-start">
                                                        <div class="o-mail-Message-avatarContainer position-relative bg-view cursor-pointer" aria-label="Open card"><img class="o-mail-Message-avatar w-100 h-100 rounded o_object_fit_cover o_redirect cursor-pointer" src="http://127.0.0.1:8000/images/employees.png">
                                                        </div>
                                                    </div>
                                                    <div class="w-100 o-min-width-0">
                                                        <div class="o-mail-Message-header d-flex flex-wrap align-items-baseline lh-1">
                                                            <span class="o-mail-Message-author cursor-pointer o-hover-text-underline" aria-label="Open card"><strong class="me-1 text-truncate">info@yantradesign.co.in</strong></span><small class="o-mail-Message-date text-muted opacity-75 o-smaller" title="2/8/2024, 10:23:33 am">- 31 minutes ago</small>
                                                            <div class="o-mail-Message-actions d-print-none ms-2 my-n2 invisible">
                                                                <div class="d-flex rounded-1 overflow-hidden"><button class="btn px-1 py-0 lh-1 rounded-0 rounded-start-1" tabindex="1" title="Add a Reaction" aria-label="Add a Reaction"><i class="oi fa-lg oi-smile-add"></i></button><button class="btn px-1 py-0 rounded-0 rounded-end-1" title="Mark as Todo" name="toggle-star"><i class="fa fa-lg fa-star-o"></i></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="position-relative d-flex">
                                                            <div class="o-mail-Message-content o-min-width-0 pt-1">
                                                                <div class="o-mail-Message-textContent position-relative d-flex">
                                                                    <div>
                                                                        <div>
                                                                            <div class="o-mail-Message-body text-break mb-0 w-100">
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
    @endsection

    @push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


    <script>
        $(document).ready(function() {
            $('.nav-link').on('click', function(e) {
                e.preventDefault();

                // Remove active class from all nav links and tab panes
                $('.nav-link').removeClass('active');
                $('.tab-pane').removeClass('active show');

                // Add active class to the clicked nav link
                $(this).addClass('active');

                // Get the name attribute of the clicked nav link
                var tabName = $(this).attr('name');

                // Show the corresponding tab pane
                $('#' + tabName).addClass('active show');
            });
        });

    </script>

    <script>
        $(document).ready(function() {
            // Handle file input change event
            $('#profile-image-input').change(function(event) {
                var file = event.target.files[0];
                if (file) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#profile-image').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(file);
                }
            });

            // Handle edit button click
            $('#edit-image-button').click(function() {
                $('#profile-image-input').click();
            });

            // Handle clear button click
            $('#clear-image-button').click(function() {
                $('#profile-image').attr('src', 'images/employees.png'); // reset to default image
                $('#profile-image-input').val(''); // clear the file input
            });

            // Handle form submission
            $(document).on('click', '#main_save_btn', function() {
                var form = $('#employeeForm')[0];
                var formData = new FormData(form);
                console.log(formData);

                $.ajax({
                    url: '/save-employee'
                    , type: 'POST'
                    , data: formData
                    , contentType: false
                    , processData: false
                    , headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                    , success: function(response) {
                        if (response.success) {
                            alert('Employee data saved successfully.');
                            // Optionally, reset the form or perform other actions
                        } else {
                            alert('An error occurred while saving employee data.');
                        }
                    }
                    , error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
            });
        });

    </script>

    <script>
        $(document).ready(function() {
            $('#clear-image-button').click(function() {
                if (confirm('Are you sure you want to delete this image?')) {
                    var form = $('#employeeForm')[0];
                    var formData = new FormData(form);

                    // Add delete_image flag to the form data
                    formData.append('delete_image', true);

                    $.ajax({
                        url: '/employee', // Adjust if necessary
                        type: 'POST', // Use POST for updating
                        data: formData
                        , contentType: false
                        , processData: false
                        , headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                        , success: function(response) {
                            if (response.success) {
                                $('#profile-image').attr('src', 'images/employees.png');
                                $('#profile-image-input').val('');
                            } else {
                                alert('An error occurred while deleting the image.');
                            }
                        }
                        , error: function(xhr, status, error) {
                            console.error('Error:', error);
                        }
                    });
                }
            });
        });

    </script>

    <script>
        $(document).ready(function() {
            function getRandomColor() {
                const letters = '0123456789ABCDEF';
                let color = '#';
                for (let i = 0; i < 6; i++) {
                    color += letters[Math.floor(Math.random() * 16)];
                }
                return color;
            }

            $('#category_ids_0').on('keypress', function(e) {
                if (e.which == 13) { // Enter key
                    e.preventDefault();
                    let tagText = $(this).val().trim();
                    if (tagText) {
                        let color = getRandomColor();
                        $('#tags-container').append(`
                            <div class="tag" style="background-color: ${color}; color: #fff; padding: 5px 10px; border-radius: 3px; margin-right: 5px;">
                                ${tagText} <span class="remove-tag" style="cursor: pointer; margin-left: 5px;">&times;</span>
                            </div>
                        `);

                        let tagsArray = $('#tags_array').val();
                        tagsArray = tagsArray ? JSON.parse(tagsArray) : [];
                        tagsArray.push(tagText);
                        $('#tags_array').val(JSON.stringify(tagsArray));

                        $(this).val('');
                    }
                }
            });

            $('#tags-container').on('click', '.remove-tag', function() {
                let tagText = $(this).parent().text().trim();
                $(this).parent().remove();

                let tagsArray = $('#tags_array').val();
                tagsArray = tagsArray ? JSON.parse(tagsArray) : [];
                tagsArray = tagsArray.filter(tag => tag !== tagText);
                $('#tags_array').val(JSON.stringify(tagsArray));
            });
        });

    </script>

    <script>
        $(document).ready(function() {

            // Get the CSRF token from the meta tag
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            // Set the CSRF token in the AJAX request headers
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                }
            });

            // Select the modal and the button
            var $modal = $('#newResumeModal');
            var $addButton = $('#add-experience-btn');
            var $editButton = $('.o_data_row');

            // Function to open the modal
            $addButton.on('click', function() {
                $modal.show();
            });

            // Function to open the modal
            $editButton.on('click', function() {
                // Assuming the data is stored in data attributes
                var experienceId = $(this).data('id');
                var experienceTitle = $(this).data('title');
                var employeeName = $(this).data('employee');
                var experienceType = $(this).data('type');
                var experienceDisplayType = $(this).data('display_type');
                var startDate = $(this).data('start_date');
                var endDate = $(this).data('end_date');
                var experienceDescription = $(this).data('description');

                // Set the values in the modal fields
                 $('.experience_id').val(experienceId);
                $('#edit_name_0').val(experienceTitle);
                $('#edit_employee_id_0').val(employeeName); // Adjust if you need to set the ID
                $('#line_type_id_0').val(experienceType);
                $('#edit_experience_display_type').val(experienceDisplayType);
                $('#date_start_0').val(startDate);
                $('#date_end_0').val(endDate);
                $('#description_0').val(experienceDescription);

                // Set the hidden input field value
                $('.experience_id').val(experienceId);
                $modal.show();
            });

            // Function to close the modal using the close button
            $modal.find('.btn-close').on('click', function() {
                $modal.hide();
            });

            // Load employee names when the input is clicked
            $('#employee_id_0').on('click', function() {
                $.ajax({
                    url: '{{ route("getEmployeeNames") }}'
                    , method: 'GET'
                    , success: function(data) {
                        let dropdown = $('#employee_dropdown');
                        dropdown.empty(); // Clear any existing items

                        $.each(data, function(index, employee) {
                            dropdown.append('<li class="o-autocomplete--dropdown-item ui-menu-item d-block"><a role="option" href="#" class="dropdown-item ui-menu-item-wrapper text-truncate" data-id="' + employee.id + '">' + employee.name + '</a></li>');
                        });

                        dropdown.show(); // Show the dropdown
                    }
                });
            });

            // Set input value and hide dropdown when a dropdown item is clicked
            $(document).on('click', '.dropdown-item', function() {
                var name = $(this).text();
                var id = $(this).data('id');

                $('#employee_id_0').val(name); // Set the input field to the selected name
                $('#employee_id_0').data('id', id); // Store the employee ID in the input field's data attribute
                $('#employee_dropdown').hide(); // Hide the dropdown after selection

                console.log('Selected Employee ID: ' + id); // Log the ID for debugging
            });

            // Hide dropdown when clicking outside
            $(document).click(function(event) {
                if (!$(event.target).closest('#employee_id_0, #employee_dropdown').length) {
                    $('#employee_dropdown').hide();
                }
            });

            //duration
            $('#date_start_0, #date_end_0').datepicker({
                dateFormat: 'yy-mm-dd', // Adjust the format as needed
                onSelect: function(dateText, inst) {
                    $(this).val(dateText);
                }
            });

            // Optionally, you can chain the date pickers to ensure the end date is always after the start date
            $('#date_start_0').on('change', function() {
                var minDate = $(this).datepicker('getDate');
                $('#date_end_0').datepicker('option', 'minDate', minDate);
            });

            $('#date_end_0').on('change', function() {
                var maxDate = $(this).datepicker('getDate');
                $('#date_start_0').datepicker('option', 'maxDate', maxDate);
            });

            function resetModal() {
                $('input[type="text"], textarea').val('');
                $('#employee_id_0').val('');
                $('#employee_dropdown').hide();
                $('#date_start_0, #date_end_0').val('');
                $('#tags-container').empty();
                $('#tags_array').val('');
                $('#profile-image').attr('src', 'images/employees.png');
                $('#profile-image-input').val('');
                $('#category_ids_0').val('');
            }

                $(document).on('click', '.o_form_button_save_data, .o_form_button_save_new', function() {
                    saveData("{{ route('experience.save') }}", function(success) {
                        if (success) {
                            resetModal();
                            if ($(this).hasClass('o_form_button_save_data')) {
                                $('#newResumeModal').hide();
                            } else {
                                $('#newResumeModal').show();
                            }
                        } else {
                            alert('Failed to save data.');
                        }
                    }.bind(this));
                });

            $(document).on('click', '.o_form_button_cancel', function() {
                resetModal()

                // after descard hide the modal with id #newResumeModal
                $('#newResumeModal').hide();
            });

            function saveData(url, callback) {
                var formData = {
                     experience_id: $('.experience_id').val()
                    , experience_title: $('.experience_title').val()
                    , employee_name: $('.employee_name').val()
                    , experience_type: $('.experience_type').val()
                    , experience_start_date: $('.experience_start_date').val()
                    , experience_end_date: $('.experience_end_date').val()
                    , experience_display_type: $('.experience_display_type').val()
                    , experience_description: $('.experience_description').val()
                , };

                console.log("Sending data:", formData);

                $.ajax({
                    url: url
                    , method: 'POST'
                    , data: formData
                    , success: function(response) {
                        console.log("Response:", response);
                        callback(true);
                    }
                    , error: function(xhr, status, error) {
                        console.error("Error:", xhr.responseText);
                        callback(false);
                    }
                });
            }


        });

    </script>

    @endpush
