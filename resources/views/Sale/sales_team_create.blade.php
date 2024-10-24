@extends('layout.header')
@section('content')
@section('title', 'Sales')
@section('head_breadcrumb_title')
    <a href="{{ route('salesteam.index') }}">Sales Team</a>
    <br>
    <small>New</small>
@endsection
@section('head_new_btn_link', route('salesteam.create'))
@section('image_url', asset('images/Sales.png'))
@section('navbar_menu')
    <li class="dropdown">
        <a href="#">Orders</a>
        <div class="dropdown-content">
            <a href="{{ route('orders.index') }}">Quotations</a>
            <a href="#">Orders</a>
            <a href="#">Sales Teams</a>
            <a href="{{ route('contact.index', ['tab' => 'customers']) }}">Customers</a>
        </div>
    </li>
    <li class="dropdown">
        <a href="#">To Invoice</a>
        <div class="dropdown-content">
            <!-- Dropdown content for Reporting -->
            <a href="#">Orders to Invoice</a>
            <a href="#">Orders to Upsell</a>
        </div>
    </li>
    <li class="dropdown">
        <a href="#">Products</a>
        <div class="dropdown-content">
            <a href="{{ route('product.index') }}">Products</a>
            <a href="{{ route('pricelists.index') }}">Pricelists</a>
        </div>
    </li>
    <li class="dropdown">
        <a href="#">Reporting</a>
        <div class="dropdown-content">
            <a href="#">Sales</a>
            <a href="#">Salesper</a>
            <a href="#">Products</a>
            <a href="#">Customers</a>
        </div>
    </li>
    <li class="dropdown">
        <a href="#">Configuration</a>
        <div class="dropdown-content">
            <a href="#"><b>Settings</b></a>
            <a href="{{ route('salesteam.index') }}"><b>Sales Teams</b></a>
            <a href="#"><b>Sales Orders</b></a>
            <a href="#" style="margin-left: 15px;">Tags</a>
            <a href="#"><b>Product</b></a>
            <a href="{{ route('categories.index') }}">Product Category</a>
            <a href="#" style="margin-left: 15px;">Product Tags</a>
            <a href="#"><b>Online Pyament</b></a>
            <a href="#" style="margin-left: 15px;">Payment Provide</a>
            <a href="#" style="margin-left: 15px;">Payment Methods</a>
            <a href="#"><b>Activities</b></a>
            <a href="#" style="margin-left: 15px;">Activities Plans</a>
        </div>
    </li>

@endsection

@section('head')

    <head>
        @vite(['resources/css/pricelists.css'])
        <!-- Select2 CSS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css">
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">

    </head>
@endsection

<style>
    .input-group-text {
        cursor: pointer;
        /* Change cursor to pointer for icons */
    }

    .pagination-info {
        font-size: 16px;
        /* Adjust font size as needed */
    }
</style>

<div class="o_action_manager">
    <div class="o_xxl_form_view h-100 o_form_view o_crm_team_form_view o_view_controller o_action">
        <div class="o_form_view_container">
            <div class="o_content">
                <div class="o_form_renderer o_form_editable d-flex d-print-block flex-nowrap h-100">
                    <input type="hidden" id="sales_team_id" value="{{ isset($data) ? $data->id : '' }}"
                        name="sales_team_id">
                    <div class="o_form_sheet_bg">
                        <div
                            class="o_form_statusbar position-relative d-flex justify-content-between mb-0 mb-md-2 pb-2 pb-md-0">
                            <div
                                class="o_statusbar_buttons d-flex align-items-center align-content-around flex-wrap gap-1">
                            </div>
                        </div>
                        <div class="o_form_sheet position-relative"id="myForm">
                            <div class="oe_button_box" name="button_box"></div>
                            <div class="oe_title"><label class="o_form_label o_field_invalid" for="name_0">Sales
                                    Team</label>
                                <h1>
                                    <div name="name"
                                        class="o_field_widget o_required_modifier o_field_char text-break o_field_invalid">
                                        <input class="o_input o_field_translate" id="name_0" type="text"
                                            autocomplete="off" placeholder="e.g. North America">
                                    </div>
                                </h1>
                                <div name="options_active" class="o_row">
                                    <span name="opportunities">
                                        <div name="use_opportunities" class="o_field_widget o_field_boolean">
                                            <div class="o-checkbox form-check d-inline-block">
                                                <input type="checkbox"class="form-check-input"
                                                    id="pipelineCheckbox"><label class="form-check-label"
                                                    for="use_opportunities_1"></label>
                                            </div>
                                        </div>
                                        <label class="o_form_label" for="use_opportunities_1">Pipeline<sup
                                                class="text-info p-1" data-tooltip-template="web.FieldTooltip"
                                                data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;Check this box to manage a presales process with opportunities.&quot;}}"
                                                data-tooltip-touch-tap-to-show="true">?</sup>
                                        </label>
                                    </span>
                                    <span name="leads">
                                        <div name="use_leads" class="o_field_widget o_field_boolean">
                                            <div class="o-checkbox form-check d-inline-block">
                                                <input type="checkbox"class="form-check-input" id="leadsCheckbox">
                                                <label class="form-check-label" for="use_leads_1">
                                                </label>
                                            </div>
                                        </div>
                                        <label class="o_form_label" for="use_leads_1">Leads<sup class="text-info p-1"
                                                data-tooltip-template="web.FieldTooltip"
                                                data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;Check this box to filter and qualify incoming requests as leads before converting them into opportunities and assigning them to a salesperson.&quot;}}"
                                                data-tooltip-touch-tap-to-show="true">?
                                            </sup>
                                        </label>
                                    </span>
                                </div>
                            </div>
                            <div class="o_group row align-items-start">
                                <div class="o_inner_group grid col-lg-6">
                                    <div class="g-col-sm-2">
                                        <div class="o_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">
                                            Team Details</div>
                                    </div>
                                    <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                        <div
                                            class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                            <label class="o_form_label" for="user_id_0">Team Leader</label>
                                        </div>
                                        <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                            <div name="user_id"class="o_field_widget o_field_many2one">
                                                <div class="o_field_many2one_selection">
                                                    <div class="o_input_dropdown">
                                                        <div class="product_select_hide">
                                                            <select class="o-autocomplete--input o_input team_drop_edit"  id="team_leade_20">
                                                                    <option value=""></option>
                                                                    @foreach ($products as $sale)
                                                                    <option id="team_leade_20"
                                                                        value="{{ $sale->name }}">
                                                                        {{ $sale->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select> 
                                                        </div>
                                                    </div>
                                                </div>        
                                            </div>
                                        </div>
                                    </div>
                                    <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0"
                                        id="emailAliasSection">
                                        <div class="o_cell flex-grow-1 flex-sm-grow-0 o_wrap_label w-100 text-break text-900"
                                            style=""><label class="o_form_label" for="alias_name_0">Email
                                                Alias<sup class="text-info p-1"
                                                    data-tooltip-template="web.FieldTooltip"
                                                    data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;The name of the email alias, e.g. 'jobs' if you want to catch emails for <jobs@example.odoo.com>&quot;}}"
                                                    data-tooltip-touch-tap-to-show="true">?</sup></label>
                                        </div>
                                        <div class="o_cell flex-grow-1 flex-sm-grow-0" style="width: 100%;">
                                            <div name="alias_def">
                                                <div name="alias_id"
                                                    class="o_field_widget o_field_many2one oe_read_only">
                                                    <div class="o_field_many2one_selection">
                                                        <div class="o_input_dropdown">
                                                            <div class="o-autocomplete dropdown"><input type="text"
                                                                    class="o-autocomplete--input o_input"
                                                                    autocomplete="off" role="combobox"
                                                                    aria-autocomplete="list" aria-haspopup="listbox"
                                                                    id="alias_id_0" placeholder=""
                                                                    aria-expanded="false"></div><span
                                                                class="o_dropdown_button"></span>
                                                        </div>
                                                    </div>
                                                    <div class="o_field_many2one_extra"></div>
                                                </div>
                                                <div class="oe_edit_only" name="edit_alias" dir="ltr">
                                                    <div name="alias_name"
                                                        class="o_field_widget o_field_char oe_inline"><input
                                                            class="o_input" id="alias_name_0" type="text"
                                                            autocomplete="off" placeholder="alias"></div>@ <div
                                                        name="alias_domain_id"
                                                        class="o_field_widget o_field_many2one oe_inline">
                                                        <div class="o_field_many2one_selection">
                                                            <div class="o_input_dropdown">
                                                                <div class="o-autocomplete dropdown"><input
                                                                        type="text"
                                                                        class="o-autocomplete--input o_input"
                                                                        autocomplete="off" role="combobox"
                                                                        aria-autocomplete="list"
                                                                        aria-haspopup="listbox" id="alias_domain_id_0"
                                                                        placeholder="e.g. mycompany.com"
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
                                    <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0"
                                        id="acceptEmailsSection">
                                        <div
                                            class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                            <label class="o_form_label" for="alias_contact_0">Accept Emails From<sup
                                                    class="text-info p-1" data-tooltip-template="web.FieldTooltip"
                                                    data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;Policy to post a message on the document using the mailgateway.\n- everyone: everyone can post\n- partners: only authenticated partners\n- followers: only followers of the related document or members of following channels\n&quot;}}"
                                                    data-tooltip-touch-tap-to-show="true">?</sup></label>
                                        </div>
                                        <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                            style="width: 100%;">
                                            <div name="alias_contact"
                                                class="o_field_widget o_required_modifier o_field_selection"><select
                                                    class="o_input pe-3" id="alias_contact_0">
                                                    <option value="false" style="display:none"></option>
                                                    <option value="&quot;everyone&quot;">Everyone</option>
                                                    <option value="&quot;partners&quot;">Authenticated Partners
                                                    </option>
                                                    <option value="&quot;followers&quot;">Followers only</option>
                                                    <option value="&quot;employees&quot;">Authenticated Employees
                                                    </option>
                                                </select></div>
                                        </div>
                                    </div>
                                    <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                        <div class="o_cell flex-grow-1 flex-sm-grow-0 o_wrap_label w-100 text-break text-900"
                                            style=""><label class="o_form_label"
                                                for="invoiced_target_0">Invoicing Target<sup class="text-info p-1"
                                                    data-tooltip-template="web.FieldTooltip"
                                                    data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;Revenue Target for the current month (untaxed total of paid invoices).&quot;}}"
                                                    data-tooltip-touch-tap-to-show="true">?</sup></label></div>
                                        <div class="o_cell flex-grow-1 flex-sm-grow-0" style="width: 100%;">
                                            <div class="o_row">
                                                <div name="invoiced_target"
                                                    class="o_field_widget o_field_monetary oe_inline">
                                                    <div
                                                        class="text-nowrap d-inline-flex w-100 align-items-baseline position-relative">
                                                        <span
                                                            class="o_input position-absolute pe-none d-flex w-100"><span
                                                                class="opacity-0 d-inline-block overflow-hidden mw-100 o_monetary_ghost_value">0.00</span></span><input
                                                            class="o_input flex-grow-1 flex-shrink-1"
                                                            autocomplete="off" id="invoiced_target_0" type="text">
                                                    </div>
                                                </div><span class="flex-grow-1">/ Month</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="o_notebook d-flex w-100 horizontal flex-column">
                                <div class="o_notebook_headers">
                                    <ul class="nav nav-tabs flex-row flex-nowrap">
                                        <li class="nav-item flex-nowrap cursor-pointer"><a class="nav-link active"
                                                href="#" role="tab" tabindex="0"
                                                name="members_users">Members</a></li>
                                    </ul>
                                </div>
                                <div class="o_notebook_content tab-content">
                                    <div class="tab-pane active fade show">
                                        <div name="member_ids" class="o_field_widget o_field_many2many w-100">
                                            <div class="o_kanban_view o_field_x2many o_field_x2many_kanban">
                                                <div class="o_x2m_control_panel d-empty-none mb-4">
                                                    <div class="o_cp_buttons gap-1" role="toolbar"
                                                        aria-label="Control panel buttons">
                                                        <button type="button"
                                                            class="btn btn-secondary o-kanban-button-new"
                                                            id="addSalespersonBtn" data-bs-toggle="modal"
                                                            data-bs-target="#salespersonModal">Add </button>
                                                    </div>
                                                    <div class="container mt-5">
                                                        <!-- Modal Structure -->
                                                        <div class="modal fade" id="salespersonModal" tabindex="-1"
                                                            aria-labelledby="salespersonModalLabel"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                                                <div class="modal-content">

                                                                    <!-- Modal Header -->
                                                                    <header class="modal-header">
                                                                        <h4 class="modal-title"
                                                                            id="salespersonModalLabel">Add:
                                                                            Salespersons</h4>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </header>

                                                                    <!-- Modal Body -->
                                                                    <main class="modal-body">
                                                                        <!-- Search Bar -->
                                                                        <div class="mb-3 text-center">
                                                                            <input type="text"
                                                                                id="searchSalesperson"
                                                                                class="form-control w-50 mx-auto"
                                                                                placeholder="Search Salesperson...">
                                                                            <div
                                                                                class="d-flex justify-content-between align-items-center mt-3">
                                                                                <nav aria-label="Page navigation">
                                                                                    <ul class="pagination">
                                                                                        <li class="page-item"><a
                                                                                                class="page-link"
                                                                                                href="#">&#60;</a>
                                                                                        </li>
                                                                                        <li class="page-item"><a
                                                                                                class="page-link"
                                                                                                href="#">1</a>
                                                                                        </li>
                                                                                        <li class="page-item"><a
                                                                                                class="page-link"
                                                                                                href="#">2</a>
                                                                                        </li>
                                                                                        <li class="page-item"><a
                                                                                                class="page-link"
                                                                                                href="#">&#62;</a>
                                                                                        </li>
                                                                                    </ul>
                                                                                </nav>
                                                                            </div>
                                                                        </div>
                                                                        <!-- Content goes here (table etc.) -->
                                                                        <div class="o_list_view o_view_controller">
                                                                            <!-- Sample Table Structure -->
                                                                            <table class="table table-striped">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>Select</th>
                                                                                        <th>Name</th>
                                                                                        <th>Login</th>
                                                                                        <th>Language</th>
                                                                                        <th>Latest Authentication</th>
                                                                                        <th>Status</th>
                                                                                    </tr>
                                                                                </thead>

                                                                                <!-- Sample Data Rows -->
                                                                                <tbody>
                                                                                    <tr data-id="datapoint_16">
                                                                                        <td><input type="checkbox">
                                                                                        </td>
                                                                                        <td>Disha</td>
                                                                                        <td>disha@gmail.com</td>
                                                                                        <td>English (IN)</td>
                                                                                        <td></td>
                                                                                        <td><span
                                                                                                class="badge bg-info">Never
                                                                                                Connected</span></td>
                                                                                    </tr>
                                                                                    <tr data-id="datapoint_17">
                                                                                        <td><input type="checkbox">
                                                                                        </td>
                                                                                        <td>Karan</td>
                                                                                        <td>karanplacecode12@gmail.com
                                                                                        </td>
                                                                                        <td>English (IN)</td>
                                                                                        <td></td>
                                                                                        <td><span
                                                                                                class="badge bg-info">Never
                                                                                                Connected</span></td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </main>

                                                                    <!-- Modal Footer -->
                                                                    <footer class="modal-footer">
                                                                        <button type="button" class="btn btn-primary"
                                                                            disabled>Select</button>
                                                                        <button type="button"
                                                                            class="btn btn-secondary o-kanban-button-new"
                                                                            id="newSalespersonBtn"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#newsalespersonModal">New</button>
                                                                        <button type="button"
                                                                            class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Close</button>
                                                                    </footer>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="container mt-5">
                                                        <!-- Modal Structure -->
                                                        <div class="modal fade" id="newsalespersonModal"
                                                            tabindex="-1" aria-labelledby="newsalespersonModalLabel"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                                                <div class="modal-content">

                                                                    <!-- Modal Header -->
                                                                    <header class="modal-header">
                                                                        <h4 class="modal-title" id="newsalespersonModalLabel">Create Sales
                                                                            Person</h4>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </header>
                                                                
                                                                <main>
                                                                    <!-- Modal Body -->
                                                                    <div class="o_form_sheet_bg">
                                                                        <div class="o_form_sheet position-relative">
                                                                            <div class="alert alert-info text-center mb-3"
                                                                                role="alert"> You are inviting a new
                                                                                user. </div>
                                                                            <div name="image_1920"
                                                                                class="o_field_widget o_field_image oe_avatar">
                                                                                <div
                                                                                    class="d-inline-block position-relative opacity-trigger-hover">
                                                                                    <div aria-atomic="true"
                                                                                        class="position-absolute d-flex justify-content-between w-100 bottom-0 opacity-0 opacity-100-hover"
                                                                                        style=""><span
                                                                                            style="display:contents"><button
                                                                                                class="o_select_file_button btn btn-light border-0 rounded-circle m-1 p-1"
                                                                                                data-tooltip="Edit"
                                                                                                aria-label="Edit"><i
                                                                                                    class="fa fa-pencil fa-fw"></i></button></span><input
                                                                                            type="file"
                                                                                            class="o_input_file d-none"
                                                                                            accept="image/*"></div><img
                                                                                        loading="lazy"
                                                                                        class="img img-fluid"
                                                                                        alt="Binary file"
                                                                                        src="/web/static/img/placeholder.png"
                                                                                        name="image_1920"
                                                                                        style="">
                                                                                </div>
                                                                            </div>
                                                                            <div class="oe_title"><label
                                                                                    class="o_form_label"
                                                                                    for="name_0">Name</label>
                                                                                <h1>
                                                                                    <div name="name"
                                                                                        class="o_field_widget o_required_modifier o_field_char">
                                                                                        <input class="o_input"
                                                                                            id="name_0"
                                                                                            type="text"
                                                                                            autocomplete="off"
                                                                                            placeholder="e.g. John Doe">
                                                                                    </div>
                                                                                </h1><label class="o_form_label"
                                                                                    for="login_0">Email Address<sup
                                                                                        class="text-info p-1"
                                                                                        data-tooltip-template="web.FieldTooltip"
                                                                                        data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;Used to log into the system&quot;}}"
                                                                                        data-tooltip-touch-tap-to-show="true"
                                                                                        title="">?</sup></label>
                                                                                <h2>
                                                                                    <div name="login"
                                                                                        class="o_field_widget o_required_modifier o_field_char">
                                                                                        <input class="o_input"
                                                                                            id="login_0"
                                                                                            type="text"
                                                                                            autocomplete="off"
                                                                                            placeholder="e.g. email@yourcompany.com">
                                                                                    </div>
                                                                                </h2>
                                                                            </div>
                                                                            <div class="o_inner_group grid">
                                                                                <div
                                                                                    class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                                                    <div
                                                                                        class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                                        <label class="o_form_label"
                                                                                            for="phone_0">Phone</label>
                                                                                    </div>
                                                                                    <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                                                        style="width: 100%;">
                                                                                        <div name="phone"
                                                                                            class="o_field_widget o_field_phone">
                                                                                            <div
                                                                                                class="o_phone_content d-inline-flex w-100">
                                                                                                <input class="o_input"
                                                                                                    type="tel"
                                                                                                    autocomplete="off"
                                                                                                    id="phone_0"><a
                                                                                                    class="o_phone_form_link ms-3 d-inline-flex align-items-center"
                                                                                                    href="tel:876786786786"><i
                                                                                                        class="fa fa-phone"></i><small
                                                                                                        class="fw-bold ms-1">Call</small></a><a
                                                                                                    class="ms-3 d-inline-flex align-items-center o_field_phone_sms"
                                                                                                    title="Send SMS Text Message"
                                                                                                    href="sms:876786786786"><i
                                                                                                        class="fa fa-mobile"></i><small
                                                                                                        class="fw-bold ms-1">SMS</small></a>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                                                    <div
                                                                                        class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                                        <label class="o_form_label"
                                                                                            for="mobile_0">Mobile</label>
                                                                                    </div>
                                                                                    <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                                                        style="width: 100%;">
                                                                                        <div name="mobile"
                                                                                            class="o_field_widget o_field_phone">
                                                                                            <div
                                                                                                class="o_phone_content d-inline-flex w-100">
                                                                                                <input class="o_input"
                                                                                                    type="tel"
                                                                                                    autocomplete="off"
                                                                                                    id="mobile_0"><a
                                                                                                    class="o_phone_form_link ms-3 d-inline-flex align-items-center"
                                                                                                    href="tel:786786"><i
                                                                                                        class="fa fa-phone"></i><small
                                                                                                        class="fw-bold ms-1">Call</small></a><a
                                                                                                    class="ms-3 d-inline-flex align-items-center o_field_phone_sms"
                                                                                                    title="Send SMS Text Message"
                                                                                                    href="sms:786786"><i
                                                                                                        class="fa fa-mobile"></i><small
                                                                                                        class="fw-bold ms-1">SMS</small></a>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                                                    <div
                                                                                        class="o_wrap_field_boolean d-flex flex-wrap d-sm-contents flex-sm-nowrap">
                                                                                        <div
                                                                                            class="o_cell o_wrap_label flex-sm-grow-0 text-break text-900">
                                                                                            <label class="o_form_label"
                                                                                                for="create_employee_0">Create
                                                                                                Employee</label></div>
                                                                                        <div class="o_cell o_wrap_input order-first flex-sm-grow-0 order-sm-0"
                                                                                            style="">
                                                                                            <div name="create_employee"
                                                                                                class="o_field_widget o_field_boolean">
                                                                                                <div
                                                                                                    class="o-checkbox form-check d-inline-block">
                                                                                                    <input
                                                                                                        type="checkbox"
                                                                                                        class="form-check-input"
                                                                                                        id="create_employee_0"><label
                                                                                                        class="form-check-label"
                                                                                                        for="create_employee_0"></label>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                            
                                                                        </div>
                                                                    </div>
                                                                </main>

                                                                <!-- Modal Footer -->
                                                                <footer class="modal-footer">
                                                                    <button type="button" class="btn btn-primary"
                                                                        id="saveAndCloseBtn">Save & Close</button>
                                                                    <button type="button" class="btn btn-secondary"
                                                                        id="saveAndNewBtn">Save & New</button>
                                                                    <button type="button" class="btn btn-danger"
                                                                        data-bs-dismiss="modal">Discard</button>
                                                                </footer>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div
                                                class="o_kanban_renderer o_renderer d-flex o_kanban_ungrouped align-content-start flex-wrap justify-content-start">
                                                <div
                                                    class="o_kanban_record o_kanban_ghost flex-grow-1 flex-md-shrink-1 flex-shrink-0 my-0">
                                                </div>
                                                <div
                                                    class="o_kanban_record o_kanban_ghost flex-grow-1 flex-md-shrink-1 flex-shrink-0 my-0">
                                                </div>
                                                <div
                                                    class="o_kanban_record o_kanban_ghost flex-grow-1 flex-md-shrink-1 flex-shrink-0 my-0">
                                                </div>
                                                <div
                                                    class="o_kanban_record o_kanban_ghost flex-grow-1 flex-md-shrink-1 flex-shrink-0 my-0">
                                                </div>
                                                <div
                                                    class="o_kanban_record o_kanban_ghost flex-grow-1 flex-md-shrink-1 flex-shrink-0 my-0">
                                                </div>
                                                <div
                                                    class="o_kanban_record o_kanban_ghost flex-grow-1 flex-md-shrink-1 flex-shrink-0 my-0">
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
                    <div
                        class="o-mail-Chatter w-100 h-100 flex-grow-1 d-flex flex-column overflow-auto o-chatter-disabled">
                        <div class="o-mail-Chatter-top d-print-none position-sticky top-0">
                            <div class="o-mail-Chatter-topbar d-flex flex-shrink-0 flex-grow-0 overflow-x-auto">
                                <button class="o-mail-Chatter-sendMessage btn text-nowrap me-1 btn-primary my-2"
                                    data-hotkey="m" style="position: relative;"> Send message </button><button
                                    class="o-mail-Chatter-logNote btn text-nowrap me-1 btn-secondary my-2"
                                    data-hotkey="shift+m" style="position: relative;"> Log note </button>
                                <div class="flex-grow-1 d-flex"><span
                                        class="o-mail-Chatter-topbarGrow flex-grow-1 pe-2"></span><button
                                        class="btn btn-link text-action" aria-label="Search Messages"
                                        title="Search Messages"><i class="oi oi-search"
                                            role="img"></i></button><span style="display:contents"><button
                                            class="o-mail-Chatter-attachFiles btn btn-link text-action px-1 d-flex align-items-center my-2"
                                            aria-label="Attach files"><i
                                                class="fa fa-paperclip fa-lg me-1"></i></button></span><input
                                        type="file" class="o_input_file d-none o-mail-Chatter-fileUploader"
                                        multiple="multiple" accept="*">
                                    <div class="o-mail-Followers d-flex me-1"><button
                                            class="o-mail-Followers-button btn btn-link d-flex align-items-center text-action px-1 my-2 o-dropdown dropdown-toggle dropdown"
                                            disabled="" title="Show Followers" aria-expanded="false"><i
                                                class="fa fa-user-o me-1" role="img"></i><sup
                                                class="o-mail-Followers-counter">0</sup></button></div><button
                                        class="o-mail-Chatter-follow btn btn-link  px-0 text-600">
                                        <div class="position-relative"><span
                                                class="d-flex invisible text-nowrap">Following</span><span
                                                class="position-absolute end-0 top-0"> Follow </span></div>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="o-mail-Chatter-content">
                            <div class="o-mail-Thread position-relative flex-grow-1 d-flex flex-column overflow-auto pb-4"
                                tabindex="-1">
                                <div class="d-flex flex-column position-relative flex-grow-1"><span
                                        class="position-absolute w-100 invisible top-0"
                                        style="height: Min(2370px, 100%)"></span><span></span>
                                    <div class="o-mail-DateSection d-flex align-items-center w-100 fw-bold z-1 pt-2">
                                        <hr class="o-discuss-separator flex-grow-1"><span
                                            class="px-2 smaller text-muted">Today</span>
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
                                                        src="https://yantra-design6.odoo.com/web/image/res.partner/3/avatar_128?unique=1726641313000">
                                                </div>
                                            </div>
                                            <div class="w-100 o-min-width-0">
                                                <div
                                                    class="o-mail-Message-header d-flex flex-wrap align-items-baseline lh-1 mb-1">
                                                    <span
                                                        class="o-mail-Message-author small cursor-pointer o-hover-text-underline"
                                                        aria-label="Open card"><strong
                                                            class="me-1">info@yantradesign.co.in</strong></span><small
                                                        class="o-mail-Message-date text-muted smaller"
                                                        title="17/10/2024, 10:31:55 am">- 6 minutes ago</small>
                                                </div>
                                                <div class="position-relative d-flex">
                                                    <div class="o-mail-Message-content o-min-width-0">
                                                        <div
                                                            class="o-mail-Message-textContent position-relative d-flex">
                                                            <div>
                                                                <div>
                                                                    <div
                                                                        class="o-mail-Message-body text-break mb-0 w-100">
                                                                        Creating a new record...</div>
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
                                                                        title="Mark as Todo" name="toggle-star"><i
                                                                            class="fa fa-lg fa-star-o"></i></button>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script src=https://code.jquery.com/jquery-3.5.1.slim.min.js></script>

<script src=https://cdn.jsdelivr.net/npm/@popperjs/core@2/dist/umd/popper.min.js></script>
<script src=https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">


<script>
    $(document).ready(function() {
        const form = $('#myForm');
        const saveButton = $('#main_save_btn');
        const discardButton = $('#main_discard_btn');

        // Initialize default values for inputs
        const inputs = form.find('input, select, textarea');
        inputs.each(function() {
            if ($(this).is(':checkbox') || $(this).is(':radio')) {
                $(this).data('defaultChecked', $(this).is(':checked'));
            } else {
                $(this).data('defaultValue', $(this).val());
            }
        });

        // Function to check for changes
        function checkChanges() {
            let hasChanged = false;

            inputs.each(function() {
                if ($(this).is(':checkbox') || $(this).is(':radio')) {
                    if ($(this).is(':checked') !== $(this).data('defaultChecked')) {
                        hasChanged = true;
                    }
                } else if ($(this).is('select')) {
                    if ($(this).val() !== $(this).data('defaultValue')) {
                        hasChanged = true;
                    }
                } else {
                    if ($(this).val() !== $(this).data('defaultValue')) {
                        hasChanged = true;
                    }
                }
            });

            saveButton.toggle(hasChanged);
            discardButton.toggle(hasChanged);
        }

        // Event listeners for input and change events
        form.on('input change', checkChanges);

        // Handle paste and drop events on the textarea
        $('textarea#description').on('paste', function(event) {
            const clipboardData = event.originalEvent.clipboardData;
            const items = clipboardData.items;

            for (let i = 0; i < items.length; i++) {
                const item = items[i];
                if (item.kind === 'file' && item.type.startsWith('image/')) {
                    alert('Image pasted!');
                    saveButton.show(); // Show the save button
                    break; // Exit after finding the first image
                }
            }

            checkChanges(); // Check for changes when pasting
        });

        // Handle drop event
        $('textarea#description').on('drop', function(event) {
            event.preventDefault(); // Prevent default behavior (e.g., opening the file)
            const dataTransfer = event.originalEvent.dataTransfer;
            const items = dataTransfer.items;

            for (let i = 0; i < items.length; i++) {
                const item = items[i];
                if (item.kind === 'file' && item.type.startsWith('image/')) {
                    alert('Image dropped!');
                    saveButton.show(); // Show the save button
                    break; // Exit after finding the first image
                }
            }

            checkChanges(); // Check for changes when dropping
        });

        // Handle star selection for priority
        $('.o_priority_star').on('click', function(e) {
            e.preventDefault();
            const selectedValue = $(this).data('value');

            // Remove 'fa-star' class from all stars and add 'fa-star-o'
            $('.o_priority_star').removeClass('fa-star').addClass('fa-star-o');

            // Add 'fa-star' class to the selected star and all stars before it
            $(this).addClass('fa-star');
            $(this).prevAll('.o_priority_star').addClass('fa-star');

            // Update the default value for change detection
            inputs.each(function() {
                if ($(this).attr('data-value') === selectedValue) {
                    $(this).data('defaultValue',
                        selectedValue); // Update default value for change detection
                }
            });

            checkChanges(); // Check for changes after updating the priority
        });

        discardButton.on('click', function() {
            location.reload();
        });

        // Select2 initialization
        $('.o-autocomplete--input').select2();

        // Reset button visibility on form load
        saveButton.hide();
        discardButton.hide();
    });
</script>

<script>
    $(document).ready(function() {
        // Function to handle the visibility of the Email Alias and Accept Emails From sections
        function toggleEmailAliasAndAcceptEmails() {
            // Check if any of the Pipeline or Leads checkboxes are checked
            if ($('#pipelineCheckbox').is(':checked') || $('#leadsCheckbox').is(':checked')) {
                // Show the sections
                $('#emailAliasSection').show();
                $('#acceptEmailsSection').show();
            } else {
                // Hide the sections
                $('#emailAliasSection').attr("style", "display:none !important");
                $('#acceptEmailsSection').attr("style", "display:none !important");
            }
        }

        // Initial check on page load
        toggleEmailAliasAndAcceptEmails();

        // Bind the change event to the Pipeline and Leads checkboxes
        $('#pipelineCheckbox, #leadsCheckbox').change(function() {
            toggleEmailAliasAndAcceptEmails();

            // AJAX call to update the server-side state
            $.ajax({
                url: '/updateEmailAliasAndAcceptEmails', // Replace with your server URL
                type: 'POST',
                data: {
                    pipelineChecked: $('#pipelineCheckbox').is(':checked'),
                    leadsChecked: $('#leadsCheckbox').is(':checked')
                },
                success: function(response) {
                    // Handle the response from the server if needed
                    console.log(response);
                },
                error: function(xhr, status, error) {
                    console.error("Error: " + error);
                }
            });
        });

        // AJAX to load the modal dynamically when the Add Salesperson button is clicked
        $('#addSalespersonBtn').click(function() {
            $.ajax({
                url: '/loadnewsalespersonModal', // Replace with your server URL to load modal content
                type: 'GET',
                success: function(response) {
                    // Assuming the response contains the modal HTML, load it into the modal container
                    $('#newsalespersonModal .modal-content').html(response);

                    // Initialize the modal and show it
                    const newsalespersonModal = new bootstrap.Modal(document.getElementById(
                        'newsalespersonModal'));
                    newsalespersonModal.show();
                },
                error: function(xhr, status, error) {
                    console.error("Error loading modal: " + error);
                }
            });
        });
    });
</script>


<script>
    $(document).ready(function() {
        // AJAX to load the modal dynamically when the Add Salesperson button is clicked
        $('#newSalespersonBtn').click(function() {
            $.ajax({
                url: '/loadSalespersonModal', // Replace with your server URL to load modal content
                type: 'GET',
                success: function(response) {
                    // Assuming the response contains the modal HTML, load it into the modal container
                    $('#salespersonModal .modal-content').html(response);

                    // Initialize the modal and show it
                    const salespersonModal = new bootstrap.Modal(document.getElementById(
                        'salespersonModal'));
                    salespersonModal.show();
                },
                error: function(xhr, status, error) {
                    console.error("Error loading modal: " + error);
                }
            });
        });
    });
</script>

<script>
    $(document).ready(function() {
        // Search function
        $('#searchSalesperson').on('keyup', function() {
            var value = $(this).val().toLowerCase();
            $('#salespersonTableBody tr').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
            });
        });

        // Example AJAX call for pagination
        function loadSalespersons(page) {
            $.ajax({
                url: 'your-server-endpoint?page=' + page,
                method: 'GET',
                success: function(data) {
                    // Update table body with received data
                    $('#salespersonTableBody').html(data);
                }
            });
        }

        // Example pagination click event
        $('.pagination').on('click', 'a.page-link', function(e) {
            e.preventDefault();
            var page = $(this).text();
            loadSalespersons(page);
        });

        // Initial load
        loadSalespersons(1); // Load the first page by default
    });
</script>

<script>
    $(document).ready(function() {
        // Event listener for the second save button
        $('#main_save_btn').click(function(event) {
            event.preventDefault(); // Prevent default form submission

            // Retrieve the pricelist ID from the hidden input
            var sales_team_id = $('#sales_team_id').val();
            var name_10 = $('#name_0').val();
            var team_leader_0 = $('#country_id_0').val();
            var sales_type_0 = $('#country_id_0').val();
            var email_0 = $('#country_id_0').val();
            var accept_emails_from_0 = $('#country_id_0').val();
            var invoicing_target_0 = $('#country_id_0').val();
            var member_id_0 = $('#country_id_0').val();

            // Check if 'name_0' is empty, and validate
            if (!name_10) {
                toastr.error('Name is required');
                $('#name_0').css({
                    'border-color': 'red',
                    'background-color': '#ff99993d'
                });
                return; // Stop form submission
            }

            // Create FormData and send AJAX request
            var formData = new FormData();
            formData.append('sales_team_id', sales_team_id); // Append the ID
            formData.append('name_10', name_10);
            formData.append('team_leader_0', team_leader_0);
            formData.append('sales_type_0', sales_type_0); // Ensure pricelistes_id is included
            formData.append('email_0', email_0);
            formData.append('accept_emails_from_0', accept_emails_from_0);
            formData.append('invoicing_target_0', invoicing_target_0);
            formData.append('member_id_0', member_id_0);
            formData.append('_token', '{{ csrf_token() }}'); // Ensure CSRF token is included


            // AJAX request to submit the form data to the server
            $.ajax({
                url: '{{ route('salesteam.store') }}',
                type: 'POST',
                data: formData,
                processData: false, // Prevent jQuery from transforming the data into a query string
                contentType: false, // Prevent jQuery from setting content type
                success: function(response) {
                    toastr.success(response.message); // Notify success
                    setTimeout(function() {
                        window.location.href =
                            "{{ route('salesteam.index') }}"; // Redirect after successful submission
                    }, 2000);
                },
                error: function(xhr, status, error) {
                    toastr.error('Something went wrong!'); // Notify error
                }
            });
        });
    });
</script>
@endpush
