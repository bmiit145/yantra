@extends('layout.header')
@section('content')
@section('head')
    @vite(['resources/css/salesadd.css'])
@endsection
@section('head_new_btn_link', route('product.create'))
@section('title', 'Sales')
@section('navbar_menu')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Product Image Upload</title>
    <!-- Include jQuery and Toastr CSS/JS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</head>

<style>
    .dropdown-menu {
    display: none;
    }

    .dropdown:hover .dropdown-menu {
        display: block; /* Show dropdown on hover */
    }

    .tax-selected {
        display: inline-block;
        margin: 5px;
        padding: 5px;
        background-color: #e2e2e2;
        border-radius: 4px;
    }

    .remove-tax {
        margin-left: 5px;
        cursor: pointer;
        color: red;
    }

    /* Styles for Select2 tag dropdown */
    .select2-container--default .select2-selection--multiple {
        border: none !important;
    }

    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        background-color: transparent;
        border: none !important;
        padding: 2px 12px;
        border-radius: 23px;
        background-color: #4e73df; /* Similar to the tag in the image */
        color: #fff;
        font-weight: bold;
    }

    .select2-container--default .select2-selection--multiple .select2-selection__rendered {
        display: flex;
        flex-wrap: wrap;
    }

    .select2-container--default .select2-selection--multiple .select2-search--inline {
        display: none; /* Hide inline search */
    }

    .select2-container--default.select2-container--focus .select2-selection--multiple {
        border: none !important;
    }

    .select2-container .select2-selection--multiple .select2-selection__rendered {
        overflow: inherit !important;
        min-height: 34px;
    }

    .select2-container--default .select2-selection--multiple .select2-search__field {
        padding-left: 10px;
    }

    /* Hide clear option */
    .select2-selection__clear {
        display: none;
    }
</style>

<style>
    .custom-label {
        font-weight: bold;
        font-size: 16px;
        margin-bottom: 5px;
        color: #333;
    }

    .custom-select-wrapper {
        display: flex;
        flex-direction: column;
    }

    .custom-select {
        width: 100%;
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
        background-color: #f9f9f9;
        font-size: 14px;
        color: #333;
        cursor: pointer;
    }

    .custom-select:hover {
        background-color: #e6e6e6;
    }

    .custom-select option:checked {
        background-color: #009688;
        color: #fff;
    }

    .custom-input {
        width: 100%;
        padding: 8px;
        margin-top: 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
        font-size: 14px;
    }

    .custom-tax-string {
        margin-top: 10px;
        font-weight: bold;
        color: #666;
    }
    .o_select_file_button {
            position: relative;
            overflow: hidden;
            display: inline-block;
            cursor: pointer;
        }

        .o_select_file_button input[type="file"] {
            font-size: 20px;
            position: absolute;
            top: 0;
            right: 0;
            opacity: 0;
            cursor: pointer;
            height: 100%;
            width: 100%;
        }
</style>

<style>
        .o_content_wapper > .o_content {
            width: 100%;
        }
        .o_form_sheet.position-relative {
            width: 70%;
            min-width: 70%;
        }
        .o-mail-ChatterContainer.o-mail-Form-chatter.o-aside.w-print-100 {
            width: 30%;
            min-width: 30%;
        }
        .tab-pane {
            display: none; /* Hide tab content by default */
        }

        .tab-pane.active {
            display: block; /* Show active tab content */
        }
</style>

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
            <a href="#">Salespersons</a>
            <a href="#">Products</a>
            <a href="#">Customers</a>
        </div>
    </li>




@endsection

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<div class="o_action_manager">
    <div class="o_xxl_form_view h-100 o_form_view o_view_controller o_action">
        <div class="o_form_view_container">
            <div class="o_content_wapper d-flex">
                <div class="o_content ">
                    <div class="o_form_renderer o_form_editable d-flex d-print-block flex-nowrap h-100">
                        <div class="o_form_sheet position-relative">
                            <div
                                        class="o_form_statusbar position-relative d-flex justify-content-between mb-0 mb-md-2 pb-2 pb-md-0">
                                        <div
                                            class="o_statusbar_buttons d-flex align-items-center align-content-around flex-wrap gap-1">
                                            <button invisible="type != 'consu'" class="btn btn-secondary" name="682"
                                                type="action"><span>Replenish</span></button><button
                                                invisible="type == 'service'" class="btn btn-secondary"
                                                name="action_open_label_layout" type="object"><span>Print
                                                    Labels</span></button>
                                        </div>
                            </div>
                            <div >
                                        <div name="image_1920" class="o_field_widget o_field_image oe_avatar"id= image_1920 >
                                            <div class="d-inline-block position-relative opacity-trigger-hover">
                                                <div aria-atomic="true"
                                                    class="position-absolute d-flex justify-content-between w-100 bottom-0 opacity-0 opacity-100-hover"
                                                    id="image_0" style="">
                                                    <span style="display: contents">
                                                        <button type="button" class="o_select_file_button btn btn-light border-0 rounded-circle m-1 p-1"
                                                        data-tooltip="Edit" aria-label="Edit" id="edit_image_button">
                                                    <input type="file" accept="image/*" id="file-input">
                                                    <i class="fas fa-pencil-alt fa-fw"></i>
                                                </button>
                                                    </span>
                                                    <button type="button" id="remove_image_button" style="display: none;"> <i class="fas fa-times fa-fw"></i> </button>
                                                    <button type="button" id="cancel_button" style="display: none;">Cancel</button>
                                                </div>
                                                <!-- Image Preview Placeholder -->
                                                <img loading="lazy" class="img img-fluid" alt="Binary file" id="image_preview" src="/web/static/img/placeholder.png">
                                            </div>
                                        </div>
                                        <div class="oe_title">
                                            <label class="o_form_label" for="name_0">Product</label>
                                            <h1>
                                                <div class="product_flex d-flex align-items-center">
                                                    <div name="is_favorite"
                                                         class="o_field_widget o_readonly_modifier o_field_boolean_favorite me-3">
                                                        <div class="o_favorite">
                                                            <a href="#" class="pe-none">
                                                                <i role="img" class="fa fa-star-o me-1" title="Add to Favorites" aria-label="Add to Favorites"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div name="name"
                                                         class="o_required_modifier o_field_text text-break w-100">
                                                        <div style="height: 45px;">
                                                            <textarea class="o_input o_field_translate" id="name_0"
                                                                      placeholder="e.g. Cheese Burger" rows="1"
                                                                      style="height: 45px; border-top-width: 0px; border-bottom-width: 1px; padding: 1px 5px; text-align: left;"
                                                                      spellcheck="true">{{ isset($data) ? $data->product_name : '' }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </h1>
                                        </div>                                        
                                        <div name="options"><span class="d-inline-block">
                                                        <div name="sale_ok" class="o_field_widget o_field_boolean">
                                                            <div class="o-checkbox form-check d-inline-block"><input type="checkbox" checked
                                                                    class="form-check-input" id="sale_ok_0"><label
                                                                    class="form-check-label" for="sale_ok_0"></label></div>
                                                        </div><label class="o_form_label" for="sale_ok_0">Sales</label>

                                                        <div name="purchase_ok" class="o_field_widget o_field_boolean">
                                                            <div class="o-checkbox form-check d-inline-block">
                                                                <input type="checkbox" class="form-check-input" id="purchase_ok"  checked>
                                                                <label class="form-check-label" for="purchase_ok"></label>
                                                            </div>
                                                            <label class="o_form_label" for="purchase_ok">Purchase</label>
                                                        </div>
                                            </div>
                                                <div class="o_notebook d-flex w-100 horizontal flex-column">
                                                    <div class="o_notebook_headers">
                                                        <ul class="nav nav-tabs flex-row flex-nowrap">
                                                            <li class="nav-item flex-nowrap cursor-pointer"><a class="nav-link active"
                                                                    href="#general_information" data-bs-toggle="tab" tabindex="0"
                                                                    name="general_information">General Information</a></li>
                                                            <li class="nav-item flex-nowrap cursor-pointer" id="sales-tab" ><a
                                                                    class="nav-link page_sales" href="#sales" data-bs-toggle="tab"
                                                                    tabindex="0" name="sales">Sales</a></li>
                                                            <li class="nav-item flex-nowrap cursor-pointer"><a class="nav-link"
                                                                    href="#inventory" data-bs-toggle="tab" tabindex="0"
                                                                    name="inventory">Inventory</a></li>
                                                            <li class="nav-item flex-nowrap cursor-pointer"><a class="nav-link"
                                                                    href="#invoicing" data-bs-toggle="tab" tabindex="0"
                                                                    name="invoicing">Accounting</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="tab-content">
                                                        <!-- First part General Information part -->
                                                        <div id="general_information" class="tab-pane fade show active">
                                                            <div class="o_notebook_content tab-content">
                                                                <div class="tab-pane active fade show">
                                                                    <div class="o_group row align-items-start">
                                                                        <div class="o_inner_group grid col-lg-6">
                                                                            <div
                                                                                class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                                                <div
                                                                                    class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900 ">
                                                                                    <label class="o_form_label" for="type_0">Product
                                                                                        Type<sup class="text-info p-1"
                                                                                            data-tooltip-template="web.FieldTooltip"
                                                                                            data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;A storable product is a product for which you manage stock. The Inventory app has to be installed.\nA consumable product is a product for which stock is not managed.\nA service is a non-material product you provide.&quot;}}"
                                                                                            data-tooltip-touch-tap-to-show="true">?</sup></label>
                                                                                </div>
                                                                                <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" id="type_10" style="width: 100%;">
                                                                                    <div name="type" class="o_field_widget o_required_modifier o_field_radio type_10">
                                                                                        <div role="radiogroup" class="o_horizontal" aria-label="Product Type">
                                                                                            <div class="form-check o_radio_item" aria-atomic="true">
                                                                                                <input type="radio" class="form-check-input o_radio_input" name="product_type" value="goods" id="radio_field_0_goods">
                                                                                                <label class="form-check-label o_form_label" for="radio_field_0_goods">Goods</label>
                                                                                            </div>
                                                                                            <div class="form-check o_radio_item" aria-atomic="true">
                                                                                                <input type="radio" class="form-check-input o_radio_input" name="product_type" value="service" id="radio_field_0_service">
                                                                                                <label class="form-check-label o_form_label" for="radio_field_0_service">Service</label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>                                                                                
                                                                                <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0 create_order_input "
                                                                                    style="display: none !important;">
                                                                                    <div
                                                                                        class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                                        <label class="o_form_label"
                                                                                            for="create_order_0">Create on Order<sup
                                                                                                class="text-info p-1"
                                                                                                data-tooltip-template="web.FieldTooltip"
                                                                                                data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;Ordered Quantity: Invoice quantities ordered by the customer.\nDelivered Quantity: Invoice quantities delivered to the customer.&quot;}}"
                                                                                                data-tooltip-touch-tap-to-show="true">?</sup></label>
                                                                                    </div>
                                                                                    <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break "
                                                                                        style="width: 100%;">
                                                                                        <div name="create_order"
                                                                                            class="o_field_widget o_required_modifier o_field_selection">
                                                                                            <select class="o_input pe-3 create_order_input_value"
                                                                                                id="create_order_input">
                                                                                                <option value="&quot;nothing_00&quot;">
                                                                                                    Nothing</option>
                                                                                                <option value="&quot;task_00&quot;">
                                                                                                    Task</option>
                                                                                                <option
                                                                                                    value="&quot;task_and_project&quot;">
                                                                                                    Task & Project</option>
                                                                                                <option value="&quot;project_00&quot;">
                                                                                                    Project</option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0 task_input "
                                                                                    style="display: none !important;">
                                                                                    <div
                                                                                        class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                                        <label class="o_form_label"
                                                                                            for="task_0">Project</label>
                                                                                    </div>
                                                                                    <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                                                        style="width: 100%;">
                                                                                        <div name="task"
                                                                                            class="o_field_widget o_field_char"><input
                                                                                                class="o_input" id="task_0"
                                                                                                type="text" autocomplete="off">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0 Project_Template_input "
                                                                                    style="display: none !important;">
                                                                                    <div
                                                                                        class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                                        <label class="o_form_label"
                                                                                            for="project_task_0">Project Template
                                                                                        </label>
                                                                                    </div>
                                                                                    <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                                                        style="width: 100%;">
                                                                                        <div name="project_task"
                                                                                            class="o_field_widget o_field_char"><input
                                                                                                class="o_input" id="project_task_0"
                                                                                                type="text" autocomplete="off">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0 is_storable_input  "
                                                                                    style="display: none !important;">
                                                                                    <div class="o_cell flex-grow-1 flex-sm-grow-0 o_wrap_label w-100 text-break text-900"
                                                                                        style=""><label
                                                                                            class="o_form_label oe_inline"
                                                                                            for="is_storable_0">Track Inventory</label>
                                                                                    </div>
                                                                                    <div class="o_cell flex-grow-1 flex-sm-grow-0"
                                                                                        style="width: 100%;">
                                                                                        <div class="o_row w-100">
                                                                                            <div name="is_storable"
                                                                                                class="o_field_widget o_field_boolean">
                                                                                                <div
                                                                                                    class="o-checkbox form-check d-inline-block">
                                                                                                    <input type="checkbox"
                                                                                                        class="form-check-input"
                                                                                                        id="is_storable_input"><label
                                                                                                        class="form-check-label"
                                                                                                        for="is_storable_0"></label>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0 invoice_policy_input" id="invoice_policy_input_values" style="display: none !important;">
                                                                                    <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                                        <label class="o_form_label" for="invoice_service_select">Invoicing Policy</label>
                                                                                    </div>
                                                                                    <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                                                                        <div name="invoice_policy_input" class="o_field_widget o_required_modifier o_field_many2one">
                                                                                            <div class="o_field_many2one_selection">
                                                                                                <div class="o_input_dropdown">
                                                                                                    <div class="o-autocomplete dropdown">
                                                                                                        <select id="invoice_service_select" name="invoice_policy_input" class="o_input pe-3" required>
                                                                                                            <option value="" style="display: none;">Select Invoicing Policy</option>
                                                                                                            @foreach ($invoice as $invoices)
                                                                                                                <option value="{{ $invoices->id }}">
                                                                                                                    {{ $invoices->invoice_name }}
                                                                                                                </option>
                                                                                                            @endforeach
                                                                                                        </select>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>                                                                                
                                                                                <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0 invoice_policy_output"
                                                                                    style="display: none !important;">
                                                                                    <div
                                                                                        class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                                        <label class="o_form_label"
                                                                                            for="invoice_policy_1">Invoicing Policy<sup
                                                                                                class="text-info p-1"
                                                                                                data-tooltip-template="web.FieldTooltip"
                                                                                                data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;Ordered Quantity: Invoice quantities ordered by the customer.\nDelivered Quantity: Invoice quantities delivered to the customer.&quot;}}"
                                                                                                data-tooltip-touch-tap-to-show="true">?</sup></label>
                                                                                    </div>
                                                                                    <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                                                        style="width: 100%;">
                                                                                        <div name="invoice_policy"
                                                                                            class="o_field_widget o_required_modifier o_field_selection">
                                                                                            <select class="o_input pe-3"
                                                                                                id="invoice_policy_output">
                                                                                                <option value="false"
                                                                                                    style="display:none">
                                                                                                </option>
                                                                                                <option value="&quot;order&quot;">
                                                                                                    Ordered
                                                                                                    quantities</option>
                                                                                                <option value="&quot;delivery&quot;">
                                                                                                    Delivered
                                                                                                    quantities</option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0 product_tooltip_input"
                                                                                    style="display: none !important;">
                                                                                    <div
                                                                                        class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                                        <label
                                                                                            class="o_form_label o_form_label_readonly"
                                                                                            for="product_tooltip_0"></label>
                                                                                    </div>
                                                                                    <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                                                        style="width: 100%;">
                                                                                        <div name="product_tooltip"
                                                                                            class="o_field_widget o_readonly_modifier o_field_char fst-italic text-muted">
                                                                                            <span>You can invoice goods before they are
                                                                                                delivered.</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0 is_plan_input"
                                                                                    style="display: none !important;">
                                                                                    <div
                                                                                        class="o_cell flex-grow-1 flex-sm-grow-0 o_wrap_label w-100 text-break text-900">
                                                                                        <label class="o_form_label oe_inline"
                                                                                            for="is_plan_0">Plan Services</label>
                                                                                    </div>
                                                                                    <div class="o_cell flex-grow-1 flex-sm-grow-0"
                                                                                        style="width: 100%;">
                                                                                        <div class="o_row w-100">
                                                                                            <div name="is_storable"
                                                                                                class="o_field_widget o_field_boolean">
                                                                                                <div
                                                                                                    class="o-checkbox form-check d-inline-block">
                                                                                                    <input type="checkbox"
                                                                                                        class="form-check-input"
                                                                                                        id="is_plan_input">
                                                                                                    <label class="form-check-label"
                                                                                                        for="is_plan_0"></label>
                                                                                                </div>
                                                                                            </div>
                                                                                            <!-- Hidden input field, initially hidden with display: none -->
                                                                                            <div class="o_cell o_wrap_input flex-grow-1"
                                                                                                id="plan_text_wrapper"
                                                                                                style="display: none;">
                                                                                                <label for="plan_text_input">as</label>
                                                                                                <input class="o_input"
                                                                                                    id="plan_text_input"
                                                                                                    type="text" autocomplete="off"
                                                                                                    placeholder="e.g. Consultant">
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="o_inner_group grid col-lg-6">
                                                                            <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                                                <div class="o_cell flex-grow-1 flex-sm-grow-0 o_wrap_label w-100 text-break text-900">
                                                                                    <label class="o_form_label" for="list_price_0">Sales Price<sup class="text-info p-1" data-tooltip-template="web.FieldTooltip" data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;Price at which the product is sold to customers.&quot;}}">?</sup></label>
                                                                                </div>
                                                                                <div class="o_cell flex-grow-1 flex-sm-grow-0" style="width: 100%;">
                                                                                    <div name="list_price_uom">
                                                                                        <div name="list_price" class="o_field_widget o_field_monetary oe_inline">
                                                                                            <div class="text-nowrap d-inline-flex w-100 align-items-baseline position-relative">
                                                                                                <span class="o_input position-absolute pe-none d-flex w-100"><span class="opacity-0 d-inline-block overflow-hidden mw-100 o_monetary_ghost_value">1.00</span></span>
                                                                                                <input class="o_input flex-grow-1 flex-shrink-1" autocomplete="off" id="list_price_0" type="text" oninput="updateTotalWithTax()">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            
                                                                            <div
                                                                                class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0 ">
                                                                                <div class="o_cell flex-grow-1 flex-sm-grow-0 o_wrap_label w-100 text-break text-900"> 
                                                                                    <label class="o_form_label" for="sales_taxes_id">Sales Taxes<sup class="text-info p-1" data-tooltip-template="web.FieldTooltip" data-tooltip-info='{"field":{"help":"Default taxes used when selling the product"}}'>?</sup></label>
                                                                                </div>
                                                                                <div class="custom-select-wrapper">
                                                                                    <div class="dropdown">
                                                                                        <button class="btn dropdown-toggle" id="taxDropdown" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                            Select Taxes
                                                                                        </button>
                                                                                        <div class="dropdown-menu" aria-labelledby="taxDropdown">
                                                                                            @foreach ($taxes as $tax)
                                                                                                <a class="dropdown-item tax-option" id="sales_taxes_id" href="#" data-id="{{ $tax->id }}" data-tax="{{ $tax->tax_rate }}">{{ $tax->tax_name }}</a>
                                                                                            @endforeach
                                                                                            <div class="dropdown-divider"></div>
                                                                                            <input type="text" id="new_sales_tax_input" class="o_input mt-2 custom-input" placeholder="Enter new tax" style="display: none;">
                                                                                            <a class="dropdown-item" id="addNewTax">Enter new tax...</a>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="o_field_widget o_readonly_modifier o_field_char oe_inline custom-tax-string">
                                                                                        <div id="tax_list"></div>
                                                                                        <span id="total_sales_tax"></span>
                                                                                    </div>
                                                                                </div>

                                                                                <div
                                                                                    class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                                                    <div class="o_cell flex-grow-1 flex-sm-grow-0 o_wrap_label w-100 text-break text-900"
                                                                                        style=""><label class="o_form_label"
                                                                                            for="standard_price_0">Cost<sup
                                                                                                class="text-info p-1"
                                                                                                data-tooltip-template="web.FieldTooltip"
                                                                                                data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;Value of the product (automatically computed in AVCO).\n        Used to value the product when the purchase cost is not known (e.g. inventory adjustment).\n        Used to compute margins on sale orders.&quot;}}"
                                                                                                data-tooltip-touch-tap-to-show="true">?</sup></label>
                                                                                    </div>
                                                                                    <div class="o_cell flex-grow-1 flex-sm-grow-0"
                                                                                        style="width: 100%;">
                                                                                        <div name="standard_price_uom">
                                                                                            <div name="standard_price"
                                                                                                class="o_field_widget o_field_monetary oe_inline">
                                                                                                <div
                                                                                                    class="text-nowrap d-inline-flex w-100 align-items-baseline position-relative">
                                                                                                    <span
                                                                                                        class="o_input position-absolute pe-none d-flex w-100"><span>₹&nbsp;</span><span
                                                                                                            class="opacity-0 d-inline-block overflow-hidden mw-100 o_monetary_ghost_value">0.00</span></span><span
                                                                                                        class="opacity-0">₹&nbsp;</span><input
                                                                                                        class="o_input flex-grow-1 flex-shrink-1"
                                                                                                        autocomplete="off"
                                                                                                        id="standard_price_0"
                                                                                                        type="text">
                                                                                                </div>
                                                                                            </div><span>per <div name="uom_name"
                                                                                                    class="o_field_widget o_readonly_modifier o_field_char oe_inline">
                                                                                                    <span>Units</span>
                                                                                                </div></span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0 purchas_taxes_input" style="display: block;">
                                                                                    <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                                        <label class="o_form_label" for="purchase_taxes_id">Purchase Taxes
                                                                                            <sup class="text-info p-1" data-tooltip-template="web.FieldTooltip"
                                                                                                data-tooltip-info='{"field":{"help":"Default taxes used when buying the product"}}'
                                                                                                data-tooltip-touch-tap-to-show="true">?</sup>
                                                                                        </label>
                                                                                    </div>
                                                                                    <div class="custom-select-wrapper">
                                                                                        <div class="dropdown">
                                                                                            <button class="btn dropdown-toggle" id="purchaseTaxDropdown" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                                Select Purchase Taxes
                                                                                            </button>
                                                                                            <div class="dropdown-menu" aria-labelledby="purchaseTaxDropdown">
                                                                                                @foreach ($taxes as $tax)
                                                                                                    <a class="dropdown-item purchase-tax-option" href="#" data-id="{{ $tax->id }}" data-tax="{{ $tax->tax_rate }}">{{ $tax->tax_name }}</a>
                                                                                                @endforeach
                                                                                                <div class="dropdown-divider"></div>
                                                                                                <input type="text" id="new_purchase_tax_input" class="o_input mt-2 custom-input" placeholder="Enter new tax" style="display: none;">
                                                                                                <a class="dropdown-item" id="addNewPurchaseTax">Enter new tax...</a>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="o_field_widget o_readonly_modifier o_field_char oe_inline custom-tax-string">
                                                                                            <div id="purchase_tax_list"></div>
                                                                                            <span id="total_purchase_tax"></span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div
                                                                                    class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0" id=category_12>
                                                                                    <div
                                                                                        class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                                        <label class="o_form_label"
                                                                                            for="categ_id_0">Category</label>
                                                                                    </div>
                                                                                    <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                                                        style="width: 100%;">
                                                                                        <div name="categ_id"
                                                                                            class="o_field_widget o_required_modifier o_field_many2one">
                                                                                            <div class="o_field_many2one_selection">
                                                                                                <div class="o_input_dropdown">
                                                                                                    <div
                                                                                                        class="o-autocomplete dropdown">
                                                                                                        <!-- Category Dropdown -->
                                                                                                        <select id="category_select"
                                                                                                            name="categ_id"
                                                                                                            class="o_input pe-3">
                                                                                                            @foreach ($categorie as $category)
                                                                                                                <option
                                                                                                                    value="{{ $category->id }}">
                                                                                                                    {{ $category->categories_name }}
                                                                                                                </option>
                                                                                                            @endforeach
                                                                                                            <option
                                                                                                                value="new_category">
                                                                                                                Enter new category...
                                                                                                            </option>
                                                                                                        </select>

                                                                                                        <!-- Input field for entering a new category, hidden by default -->
                                                                                                        <input type="text"
                                                                                                            id="new_category_input"
                                                                                                            class="o_input mt-2"
                                                                                                            style="display: none;"
                                                                                                            placeholder="Enter new category">
                                                                                                    </div>
                                                                                                    <span
                                                                                                        class="o_dropdown_button"></span>
                                                                                                </div>
                                                                                                <button type="button"
                                                                                                    class="btn btn-link text-action oi o_external_button oi-arrow-right"
                                                                                                    tabindex="-1" draggable="false"
                                                                                                    aria-label="Internal link"
                                                                                                    data-tooltip="Internal link"></button>
                                                                                            </div>
                                                                                            <div class="o_field_many2one_extra"></div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0" id= Reference_00 >
                                                                                    <div
                                                                                        class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                                        <label class="o_form_label"
                                                                                            for="default_code_0">Reference</label>
                                                                                    </div>
                                                                                    <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                                                        style="width: 100%;">
                                                                                        <div name="default_code"
                                                                                            class="o_field_widget o_field_char"><input
                                                                                                class="o_input" id="default_code_0"
                                                                                                type="text" autocomplete="off">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                                                    <div
                                                                                        class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                                        <label class="o_form_label"
                                                                                            for="barcode_0">Barcode</label>
                                                                                    </div>
                                                                                    <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                                                        style="width: 100%;">
                                                                                        <div name="barcode"
                                                                                            class="o_field_widget o_field_char"><input
                                                                                                class="o_input" id="barcode_0"
                                                                                                type="text" autocomplete="off">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0" id="hsncode">
                                                                                    <div
                                                                                        class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                                        <label class="o_form_label"
                                                                                            for="hsn_code">HSN/SAC Code</label>
                                                                                    </div>
                                                                                    <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                                                        style="width: 100%;">
                                                                                        <div name="hsn_default_code"
                                                                                            class="o_field_widget o_field_char"><input
                                                                                                class="o_input" id="hsn_code"
                                                                                                type="text" autocomplete="off">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div name="product_properties"
                                                                                class="o_field_widget o_field_properties col-lg-6">
                                                                                <div class="row d-none" columns="2">
                                                                                    <div class="o_inner_group o_group col-lg-6 o_property_group"
                                                                                        property-name=""></div>
                                                                                    <div class="o_inner_group o_group col-lg-6 o_property_group"
                                                                                        property-name=""></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="o_inner_group grid">
                                                                            <div class="g-col-sm-2">
                                                                                <div
                                                                                    class="o_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">
                                                                                    Internal Notes</div>
                                                                            </div>
                                                                            <div
                                                                                class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                                                <textarea name="" id="internal_0" cols="30" rows="10" style="width: 770%"></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--third part inventory part -->
                                                         <div id="inventory" class="tab-pane fade">
                                                            <div class="tab-pane active fade show" >
                                                                <div class="o_group row align-items-start">
                                                                    <div class="o_inner_group grid col-lg-6">
                                                                        <div class="g-col-sm-2">
                                                                            <div
                                                                                class="o_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">
                                                                                Operations</div>
                                                                        </div>
                                                                        <div
                                                                            class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                                            <div class="o_cell flex-grow-1 flex-sm-grow-0 o_wrap_label w-100 text-break text-900"
                                                                                style=""><label class="o_form_label"
                                                                                    for="route_ids_0">Routes<sup class="text-info p-1"
                                                                                        data-tooltip-template="web.FieldTooltip"
                                                                                        data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;Depending on the modules installed, this will allow you to define the route of the product: whether it will be bought, manufactured, replenished on order, etc.&quot;}}"
                                                                                        data-tooltip-touch-tap-to-show="true">?</sup></label>
                                                                            </div>
                                                                            <div class="o_cell flex-grow-1 flex-sm-grow-0"
                                                                                style="width: 100%;" id=manufac>
                                                                                <div>
                                                                                    <div name="route_ids"
                                                                                        class="o_field_widget o_field_many2many_checkboxes mb-0"id=manufac>
                                                                                        <div aria-atomic="true">
                                                                                            <div>
                                                                                                <div class="o-checkbox form-check">
                                                                                                    <input type="checkbox"
                                                                                                        class="form-check-input"
                                                                                                        id="checkbox-comp-8"><label
                                                                                                        class="form-check-label"
                                                                                                        for="checkbox-comp-8">Manufacture</label>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div><button invisible="type != 'consu'"
                                                                                        id="stock.view_diagram_button"
                                                                                        class="btn btn-link pt-0" name="728"
                                                                                        type="action"><i
                                                                                            class="o_button_icon oi oi-fw oi-arrow-right me-1"></i><span>View
                                                                                            Diagram</span></button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="o_inner_group grid col-lg-6">
                                                                        <div class="g-col-sm-2">
                                                                            <div
                                                                                class="o_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">
                                                                                Logistics</div>
                                                                        </div>
                                                                        <div
                                                                            class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                                            <div
                                                                                class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                                <label class="o_form_label"
                                                                                    for="responsible_id_0">Responsible<sup
                                                                                        class="text-info p-1"
                                                                                        data-tooltip-template="web.FieldTooltip"
                                                                                        data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;This user will be responsible of the next activities related to logistic operations for this product.&quot;}}"
                                                                                        data-tooltip-touch-tap-to-show="true">?</sup></label>
                                                                            </div>
                                                                            <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                                                style="width: 100%;">
                                                                                <div name="responsible_id"
                                                                                    class="o_field_widget o_field_many2one_avatar_user o_field_many2one_avatar">
                                                                                    <div class="d-flex align-items-center gap-1"
                                                                                        data-tooltip="info@yantradesign.co.in"><span
                                                                                            class="o_avatar o_m2o_avatar"><img
                                                                                                class="rounded"
                                                                                                src="/web/image/res.users/2/avatar_128"></span>
                                                                                        <div class="o_field_many2one_selection">
                                                                                            <div class="o_input_dropdown">
                                                                                                <div class="o-autocomplete dropdown">
                                                                                                    <select
                                                                                                        class="o-autocomplete--input o_input"
                                                                                                        id="sales_person"
                                                                                                        style="width: 150px;">
                                                                                                        <option value="">
                                                                                                            Salesperson</option>
                                                                                                        @foreach ($users as $user)
                                                                                                            <option
                                                                                                                value="{{ $user->id }}"
                                                                                                                {{ (isset($data) && $data->sales_person == $user->id) || (!isset($data->sales_person) && $user->id == Auth::id()) ? 'selected' : '' }}>
                                                                                                                {{ $user->email ?? '' }}
                                                                                                            </option>
                                                                                                        @endforeach
                                                                                                    </select>
                                                                                                </div>
                                                                                                <span class="o_dropdown_button"></span>
                                                                                            </div><button type="button"
                                                                                                class="btn btn-link text-action oi o_external_button oi-arrow-right"
                                                                                                tabindex="-1" draggable="false"
                                                                                                aria-label="Internal link"
                                                                                                data-tooltip="Internal link"></button>
                                                                                        </div>
                                                                                        <div class="o_field_many2one_extra"></div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                                            <div class="o_cell flex-grow-1 flex-sm-grow-0 o_wrap_label w-100 text-break text-900"
                                                                                style=""><label class="o_form_label"
                                                                                    for="weight_0">Weight</label></div>
                                                                            <div class="o_cell flex-grow-1 flex-sm-grow-0"
                                                                                style="width: 100%;">
                                                                                <div class="o_row" name="weight">
                                                                                    <div name="weight"
                                                                                        class="o_field_widget o_field_float oe_inline">
                                                                                        <input inputmode="decimal" class="o_input"
                                                                                            autocomplete="off" id="weight_0"
                                                                                            type="text">
                                                                                    </div>
                                                                                    <div name="weight_uom_name"
                                                                                        class="o_field_widget o_readonly_modifier o_field_char">
                                                                                        <span>kg</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                                            <div class="o_cell flex-grow-1 flex-sm-grow-0 o_wrap_label w-100 text-break text-900"
                                                                                style=""><label class="o_form_label"
                                                                                    for="volume_0">Volume</label></div>
                                                                            <div class="o_cell flex-grow-1 flex-sm-grow-0"
                                                                                style="width: 100%;">
                                                                                <div class="o_row" name="volume">
                                                                                    <div name="volume"
                                                                                        class="o_field_widget o_field_float oe_inline">
                                                                                        <input inputmode="decimal" class="o_input"
                                                                                            autocomplete="off" id="volume_0"
                                                                                            type="text">
                                                                                    </div>
                                                                                    <div name="volume_uom_name"
                                                                                        class="o_field_widget o_readonly_modifier o_field_char">
                                                                                        <span>m³</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                                            <div class="o_cell flex-grow-1 flex-sm-grow-0 o_wrap_label w-100 text-break text-900"
                                                                                style=""><label class="o_form_label"
                                                                                    for="sale_delay_0">Customer Lead Time<sup
                                                                                        class="text-info p-1"
                                                                                        data-tooltip-template="web.FieldTooltip"
                                                                                        data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;Delivery lead time, in days. It's the number of days, promised to the customer, between the confirmation of the sales order and the delivery.&quot;}}"
                                                                                        data-tooltip-touch-tap-to-show="true">?</sup></label>
                                                                            </div>
                                                                            <div class="o_cell flex-grow-1 flex-sm-grow-0"
                                                                                style="width: 100%;">
                                                                                <div>
                                                                                    <div name="sale_delay"
                                                                                        class="o_field_widget o_field_integer oe_inline"
                                                                                        style="vertical-align:baseline"><input
                                                                                            inputmode="numeric" class="o_input"
                                                                                            autocomplete="off" id="sale_delay_0"
                                                                                            type="text"></div> days
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="o_group row align-items-start">
                                                                        <div class="o_inner_group grid col-lg-6">
                                                                            <div class="g-col-sm-2">
                                                                                <div
                                                                                    class="o_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">
                                                                                    Description for Receipts</div>
                                                                            </div>
                                                                            <div
                                                                                class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                                                <div class="o_cell flex-grow-1 flex-sm-grow-0"
                                                                                    style="grid-column: span 2;width: 100%;">
                                                                                        <div style="height: 50px;">
                                                                                            <textarea class="o_input o_field_translate" id="description_pickingin_0"
                                                                                                placeholder="This note is added to receipt orders (e.g. where to store the product in the warehouse)."
                                                                                                rows="2" style="height: 50px; border-top-width: 0px; border-bottom-width: 1px; padding: 1px 25px 1px 0px;"></textarea>
                                                                                        </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="o_inner_group grid col-lg-6">
                                                                            <div class="g-col-sm-2">
                                                                                <div
                                                                                    class="o_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">
                                                                                    Description for Delivery Orders</div>
                                                                            </div>
                                                                            <div
                                                                                class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                                                <div class="o_cell flex-grow-1 flex-sm-grow-0"
                                                                                    style="grid-column: span 2;width: 100%;">
                                                                                        <div style="height: 50px;">
                                                                                            <textarea class="o_input o_field_translate" id="description_pickingout_0"
                                                                                                placeholder="This note is added to delivery orders." rows="2"
                                                                                                style="height: 50px; border-top-width: 0px; border-bottom-width: 1px; padding: 1px 25px 1px 0px;"></textarea>
                                                                                        </div>
                                                                                    
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--Fourth part Accounting part -->
                                                        <div id="invoicing" class="tab-pane fade "id="accounting_00">
                                                            <div class="tab-pane active fade show">
                                                                <div class="o_group row align-items-start">


                                                                    <div class="o_inner_group grid col-lg-6">
                                                                        <div class="g-col-sm-2">
                                                                            <div
                                                                                class="o_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">
                                                                                Receivables</div>
                                                                        </div>
                                                                        <div
                                                                            class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                                            <div
                                                                                class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                                <label class="o_form_label"
                                                                                    for="property_account_income_id_0">Income
                                                                                    Account<sup class="text-info p-1"
                                                                                        data-tooltip-template="web.FieldTooltip"
                                                                                        data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;Keep this field empty to use the default value from the product category.&quot;}}"
                                                                                        data-tooltip-touch-tap-to-show="true">?</sup></label>
                                                                            </div>
                                                                            <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                                                style="width: 100%;">
                                                                                <div name="property_account_income_id"
                                                                                    class="o_field_widget o_field_many2one">
                                                                                    <div class="o_field_many2one_selection">
                                                                                        <div class="o_input_dropdown">
                                                                                            <div class="o-autocomplete dropdown"><input
                                                                                                    type="text"
                                                                                                    class="o-autocomplete--input o_input"
                                                                                                    autocomplete="off" role="combobox"
                                                                                                    aria-autocomplete="list"
                                                                                                    aria-haspopup="listbox"
                                                                                                    id="property_account_income_id_0"
                                                                                                    placeholder=""
                                                                                                    aria-expanded="false">
                                                                                            </div><span
                                                                                                class="o_dropdown_button"></span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="o_field_many2one_extra"></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="o_inner_group grid col-lg-6">
                                                                        <div class="g-col-sm-2">
                                                                            <div
                                                                                class="o_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">
                                                                                Payables</div>
                                                                        </div>
                                                                        <div
                                                                            class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                                            <div
                                                                                class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                                <label class="o_form_label"
                                                                                    for="property_account_expense_id_0">Expense
                                                                                    Account<sup class="text-info p-1"
                                                                                        data-tooltip-template="web.FieldTooltip"
                                                                                        data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;Keep this field empty to use the default value from the product category. If anglo-saxon accounting with automated valuation method is configured, the expense account on the product category will be used.&quot;}}"
                                                                                        data-tooltip-touch-tap-to-show="true">?</sup></label>
                                                                            </div>
                                                                            <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                                                style="width: 100%;">
                                                                                <div name="property_account_expense_id"
                                                                                    class="o_field_widget o_field_many2one">
                                                                                    <div class="o_field_many2one_selection">
                                                                                        <div class="o_input_dropdown">
                                                                                            <div class="o-autocomplete dropdown"><input
                                                                                                    type="text"
                                                                                                    class="o-autocomplete--input o_input"
                                                                                                    autocomplete="off" role="combobox"
                                                                                                    aria-autocomplete="list"
                                                                                                    aria-haspopup="listbox"
                                                                                                    id="property_account_expense_id_0"
                                                                                                    placeholder=""
                                                                                                    aria-expanded="false">
                                                                                            </div><span
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
                                                            <div class="o_inner_group grid"></div>
                                                        </div>
                                                          <!-- second part sales part -->
                                                          <div id="sales" class="tab-pane fade" >
                                                            <div class="o_notebook_content tab-content">
                                                                <div class="tab-pane active fade show">
                                                                    <div class="o_group row align-items-start">
                                                                        <div class="o_inner_group grid col-lg-6">
                                                                            <div class="g-col-sm-2">
                                                                                <div
                                                                                    class="o_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">
                                                                                    Upsell &amp; Cross-Sell</div>
                                                                            </div>
                                                                            <div
                                                                                class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                                                <div
                                                                                    class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                                    <label class="o_form_label"
                                                                                        for="optional_product_ids_0">Optional
                                                                                        Products<sup class="text-info p-1"
                                                                                        data-tooltip-template="web.FieldTooltip"
                                                                                        data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;Default HSN/SAC Code used when buying the product&quot;}}"
                                                                                        data-tooltip-touch-tap-to-show="true">?</sup></label>
                                                                                </div>
                                                                                <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                                                    style="width: 100%;">
                                                                                    <div name="optional_product_ids"
                                                                                        class="o_field_widget o_field_many2many_tags">
                                                                                        <div
                                                                                            class="o_field_tags d-inline-flex flex-wrap gap-1 mw-100 o_tags_input o_input">
                                                                                            <div
                                                                                                class="o_field_many2many_selection d-inline-flex w-100">
                                                                                                <div class="o_input_dropdown">
                                                                                                    <div class="medium_select_hide">
                                                                                                        <select class="o-autocomplete--input o_input" id="optional_id_0" >
                                                                                                            <option value="">Recommend when......</option>
                                                                                                            @foreach ($Optional as $options)
                                                                                                                <option id="optional_id_0" value="{{ $options->id }}">
                                                                                                                    {{ $options->name }}
                                                                                                                </option>
                                                                                                            @endforeach
                                                                                                            <option value="add_medium">Start typing...</option>
                                                                                                        </select>
                                                                                                        <input type="text" 
                                                                                                        id="new_medium_input" 
                                                                                                        class="o_input mt-2" 
                                                                                                        style="display: none;" 
                                                                                                        placeholder="Enter new Optional Products">
                                                                                                    </div>
                                                                                                    <span
                                                                                                        class="o_dropdown_button"></span>
                                                                                                </div>
                                                                                                <button type="button"
                                                                                                    class="btn btn-link text-action oi o_external_button oi-arrow-right"
                                                                                                    tabindex="-1" draggable="false"
                                                                                                    aria-label="Internal link"
                                                                                                    data-tooltip="Internal link"></button>
                                                                                            </div>
                                                                                            <div class="o_field_many2one_extra"></div>
                                                                                        </div>
                                                                                        
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="o_inner_group grid col-lg-6">
                                                                            <div class="g-col-sm-2">
                                                                                <div
                                                                                    class="o_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">
                                                                                    Extra Info
                                                                                </div>
                                                                            </div>
                                                                            <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                                                <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                                    <label class="o_form_label" for="tag_ids_1">
                                                                                        Tags
                                                                                        <sup class="text-info p-1" data-tooltip-template="web.FieldTooltip"
                                                                                             data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;Classify and analyze your lead/opportunity categories like: Training, Service&quot;}}"
                                                                                             data-tooltip-touch-tap-to-show="true">?</sup>
                                                                                    </label>
                                                                                </div>
                                                                                <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                                                                    <div name="tag_ids" class="o_field_widget o_field_many2many_tags">
                                                                                        <div class="o_field_tags d-inline-flex flex-wrap gap-1 mw-100 o_tags_input o_input">
                                                                                            <div class="o_field_many2many_selection d-inline-flex w-100">
                                                                                                <div class="o_input_dropdown">
                                                                                                    <div class="tag_input_hide">
                                                                                                        @php
                                                                                                            $selectedTagIds = isset($data->tag)
                                                                                                                ? (is_array($data->tag)
                                                                                                                    ? $data->tag
                                                                                                                    : explode(',', $data->tag))
                                                                                                                : [];
                                                                                                        @endphp
                                                                                                        <select class="o-autocomplete--input o_input" id="tag_ids_1"  >
                                                                                                            @foreach ($tags as $tag)
                                                                                                                <option value="{{ $tag->id }}"
                                                                                                                        data-color="{{ $tag->color }}" {{ in_array($tag->id, $selectedTagIds) ? 'selected' : '' }}>
                                                                                                                    {{ $tag->name }}
                                                                                                                </option>
                                                                                                            @endforeach
                                                                                                            <option value="add_new_tag">Start typing...</option>
                                                                                                        </select>
                                                                                                        <input type="text" id="new_tag_input" class="o_input mt-2"
                                                                                                           style="display: none;" placeholder="Enter new tag">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="o_group row align-items-start">
                                                                            <div class="o_inner_group grid col-lg-6">   
                                                                                <div class="g-col-sm-2">
                                                                                    <div
                                                                                        class="o_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">
                                                                                        Sales Description
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                                                    <div class="o_cell flex-grow-1 flex-sm-grow-0"
                                                                                        style="grid-column: span 2;width: 100%;">
                                                                                            <div style="height: 50px;">
                                                                                                <textarea class="o_input o_field_translate" id="description_sale_0"
                                                                                                    placeholder="This note is added to sales orders and invoices." rows="2"
                                                                                                    style="height: 50px; border-top-width: 0px; border-bottom-width: 1px; padding: 1px 25px 1px 0px;"></textarea>
                                                                                            </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- FOUR PART COMPALTE -->
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
                                                data-hotkey="m"> Send message </button><button
                                                class="o-mail-Chatter-logNote btn text-nowrap me-1 btn-secondary my-2"
                                                data-hotkey="shift+m"> Log note </button>
                                            <div class="flex-grow-1 d-flex"><button
                                                    class="o-mail-Chatter-activity btn btn-secondary text-nowrap my-2"
                                                    data-hotkey="shift+a"><span>Activities</span></button><span
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
                                                    style="height: Min(1575px, 100%)"></span><span></span>
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
                                                                    src="https://yantra-design2.odoo.com/web/image/res.partner/3/avatar_128?unique=1722504084000">
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
                                                                    title="13/8/2024, 11:04:08 am">- now</small>
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
                    <div class="o_notification_manager o_upload_progress_toast"></div>
                    <div class="o_notification_manager"></div>
                </div>
</div>
<div class="o_we_crop_widget d-none" contenteditable="false" xml:space="preserve">
        <div class="o_we_cropper_wrapper"><img class="o_we_cropper_img">
            <div class="o_we_crop_buttons text-center mt16 position-fixed o_we_no_overlay" contenteditable="false">
                <div class="btn-group btn-group-toggle" title="Aspect Ratio" data-bs-toggle="buttons"><label
                        data-action="ratio" class="btn" data-value="0/0"><input type="radio">Flexible</label><label
                        data-action="ratio" class="btn" data-value="16/9"><input type="radio">16:9</label><label
                        data-action="ratio" class="btn" data-value="4/3"><input type="radio">4:3</label><label
                        data-action="ratio" class="btn" data-value="1/1"><input type="radio">1:1</label><label
                        data-action="ratio" class="btn" data-value="2/3"><input type="radio">2:3</label></div>
                <div class="btn-group" role="group"><button type="button" title="Zoom In" data-action="zoom"
                        data-value="0.1"><i class="fa fa-fw fa-search-plus"></i></button><button type="button"
                        title="Zoom Out" data-action="zoom" data-value="-0.1"><i
                            class="fa fa-fw fa-search-minus"></i></button></div>
                <div class="btn-group" role="group"><button type="button" title="Rotate Left" data-action="rotate"
                        data-value="-90"><i class="fa fa-fw fa-rotate-left"></i></button><button type="button"
                        title="Rotate Right" data-action="rotate" data-value="90"><i
                            class="fa fa-fw fa-rotate-right"></i></button></div>
                <div class="btn-group" role="group"><button type="button" title="Flip Horizontal" data-action="flip"
                        data-scale-direction="scaleX"><i class="oi oi-fw oi-arrows-h"></i></button><button type="button"
                        title="Flip Vertical" data-action="flip" data-scale-direction="scaleY"><i
                            class="oi oi-fw oi-arrows-v"></i></button>
                </div>
                <div class="btn-group" role="group"><button type="button" title="Reset Image" data-action="reset"><i
                            class="fa fa-refresh"></i> Reset Image</button></div>
                <div class="btn-group" role="group"><button type="button" title="Apply" data-action="apply"
                        class="btn btn-primary"><i class="fa fa-check"></i> Apply</button><button type="button"
                        title="Discard" data-action="discard" class="btn btn-danger"><i class="fa fa-times"></i>
                        Discard</button></div>
            </div>
        </div>
</div>
<div class="oe-qweb-select" style="display: none;"></div>
<div class="oe-tablepicker-wrapper oe-floating" style="position: absolute; display: none;">
        <div class="oe-tablepicker"></div>
        <div class="oe-tablepicker-size"></div>
</div>
<div class="oe-powerbox-wrapper position-absolute overflow-hidden" style="display: none;">
        <div class="oe-powerbox-mainWrapper flex-skrink-1 overflow-auto py-2"></div>
</div>
<div class="oe-powerbox-wrapper position-absolute overflow-hidden" style="display: none;">
<div id="toolbar" class="oe-toolbar oe-floating d-print-none"
                        style="visibility: hidden; --we-cp-primary: #714B67; --we-cp-secondary: #D8DADD; --we-cp-success: #28A745; --we-cp-info: #17A2B8; --we-cp-warning: #E99D00; --we-cp-danger: #D44C59; --we-cp-o-color-1: #714B67; --we-cp-o-cc1-bg: #FFFFFF; --we-cp-o-cc1-headings: #000; --we-cp-o-cc1-text: #000; --we-cp-o-cc1-btn-primary: #714B67; --we-cp-o-cc1-btn-primary-text: #FFF; --we-cp-o-cc1-btn-secondary: #D8DADD; --we-cp-o-cc1-btn-secondary-text: #000; --we-cp-o-cc1-btn-primary-border: #714B67; --we-cp-o-cc1-btn-secondary-border: #D8DADD; --we-cp-o-color-2: #8595A2; --we-cp-o-cc2-bg: #F3F2F2; --we-cp-o-cc2-headings: #111827; --we-cp-o-cc2-text: #000; --we-cp-o-cc2-btn-primary: #714B67; --we-cp-o-cc2-btn-primary-text: #FFF; --we-cp-o-cc2-btn-secondary: #D8DADD; --we-cp-o-cc2-btn-secondary-text: #000; --we-cp-o-cc2-btn-primary-border: #714B67; --we-cp-o-cc2-btn-secondary-border: #D8DADD; --we-cp-o-color-3: #F3F2F2; --we-cp-o-cc3-bg: #8595A2; --we-cp-o-cc3-headings: #FFF; --we-cp-o-cc3-text: #FFF; --we-cp-o-cc3-btn-primary: #714B67; --we-cp-o-cc3-btn-primary-text: #FFF; --we-cp-o-cc3-btn-secondary: #F3F2F2; --we-cp-o-cc3-btn-secondary-text: #000; --we-cp-o-cc3-btn-primary-border: #714B67; --we-cp-o-cc3-btn-secondary-border: #F3F2F2; --we-cp-o-color-4: #FFFFFF; --we-cp-o-cc4-bg: #714B67; --we-cp-o-cc4-headings: #FFF; --we-cp-o-cc4-text: #FFF; --we-cp-o-cc4-btn-primary: #111827; --we-cp-o-cc4-btn-primary-text: #FFF; --we-cp-o-cc4-btn-secondary: #F3F2F2; --we-cp-o-cc4-btn-secondary-text: #000; --we-cp-o-cc4-btn-primary-border: #111827; --we-cp-o-cc4-btn-secondary-border: #F3F2F2; --we-cp-o-color-5: #111827; --we-cp-o-cc5-bg: #111827; --we-cp-o-cc5-headings: #FFFFFF; --we-cp-o-cc5-text: #FFF; --we-cp-o-cc5-btn-primary: #714B67; --we-cp-o-cc5-btn-primary-text: #FFF; --we-cp-o-cc5-btn-secondary: #F3F2F2; --we-cp-o-cc5-btn-secondary-text: #000; --we-cp-o-cc5-btn-primary-border: #714B67; --we-cp-o-cc5-btn-secondary-border: #F3F2F2; --we-cp-100: #F9FAFB; --we-cp-200: #E7E9ED; --we-cp-300: #D8DADD; --we-cp-400: #9A9CA5; --we-cp-500: #7C7F89; --we-cp-600: #5F636F; --we-cp-700: #374151; --we-cp-800: #1F2937; --we-cp-900: #111827;">
                        <div id="style" class="btn-group dropdown"><button type="button" class="btn dropdown-toggle"
                                data-bs-toggle="dropdown" data-bs-original-title="Text style" tabindex="-1"
                                aria-expanded="false"><span title="Text style">Normal</span></button>
                            <ul class="dropdown-menu">
                                <li id="display-1-dropdown-item"><a class="dropdown-item" href="#" id="display-1"
                                        data-call="setTag" data-arg1="h1,display-1">Header 1 Display 1</a></li>
                                <li id="display-2-dropdown-item"><a class="dropdown-item d-none" href="#" id="display-2"
                                        data-call="setTag" data-arg1="h1,display-2" data-extended-text-style="">Header 1 Display
                                        2</a></li>
                                <li id="display-3-dropdown-item"><a class="dropdown-item d-none" href="#" id="display-3"
                                        data-call="setTag" data-arg1="h1,display-3" data-extended-text-style="">Header 1 Display
                                        3</a></li>
                                <li id="display-4-dropdown-item"><a class="dropdown-item d-none" href="#" id="display-4"
                                        data-call="setTag" data-arg1="h1,display-4" data-extended-text-style="">Header 1 Display
                                        4</a></li>
                                <li id="heading1-dropdown-item"><a class="dropdown-item" href="#" id="heading1"
                                        data-call="setTag" data-arg1="h1">Header 1</a></li>
                                <li id="heading2-dropdown-item"><a class="dropdown-item" href="#" id="heading2"
                                        data-call="setTag" data-arg1="h2">Header 2</a></li>
                                <li id="heading3-dropdown-item"><a class="dropdown-item" href="#" id="heading3"
                                        data-call="setTag" data-arg1="h3">Header 3</a></li>
                                <li id="heading4-dropdown-item"><a class="dropdown-item" href="#" id="heading4"
                                        data-call="setTag" data-arg1="h4">Header 4</a></li>
                                <li id="heading5-dropdown-item"><a class="dropdown-item" href="#" id="heading5"
                                        data-call="setTag" data-arg1="h5">Header 5</a></li>
                                <li id="heading6-dropdown-item"><a class="dropdown-item" href="#" id="heading6"
                                        data-call="setTag" data-arg1="h6">Header 6</a></li>
                                <li id="paragraph-dropdown-item"><a class="dropdown-item" href="#" id="paragraph"
                                        data-call="setTag" data-arg1="p">Normal</a></li>
                                <li id="light-dropdown-item"><a class="dropdown-item d-none" href="#" id="light"
                                        data-call="setTag" data-arg1="p,lead" data-extended-text-style="">Light</a></li>
                                <li id="small-dropdown-item"><a class="dropdown-item d-none" href="#" id="small"
                                        data-call="setTag" data-arg1="p,o_small" data-extended-text-style="">Small</a></li>
                                <li id="pre-dropdown-item"><a class="dropdown-item" href="#" id="pre"
                                        data-call="setTag" data-arg1="pre">Code</a></li>
                                <li id="blockquote-dropdown-item"><a class="dropdown-item" href="#" id="blockquote"
                                        data-call="setTag" data-arg1="blockquote">Quote</a></li>
                            </ul>
                        </div>
                        <div id="decoration" class="btn-group">
                            <div id="bold" data-call="bold" title="Toggle bold" class="btn fa fa-bold fa-fw"></div>
                            <div id="italic" data-call="italic" title="Toggle italic" class="btn fa fa-italic fa-fw"></div>
                            <div id="underline" data-call="underline" title="Toggle underline" class="btn fa fa-underline fa-fw">
                            </div>
                            <div id="strikethrough" data-call="strikeThrough" title="Toggle strikethrough"
                                class="btn fa fa-strikethrough fa-fw"></div>
                            <div id="removeFormat" data-call="removeFormat" title="Remove format" class="btn fa fa-eraser fa-fw">
                            </div>
                        </div>
</div>
<div id="colorInputButtonGroup" class="btn-group">
                    <div class="colorpicker-group note-fore-color-preview" data-name="color" data-color-type="text">
                        <div id="oe-text-color" class="btn color-button dropdown-toggle editor-ignore"
                            data-bs-toggle="dropdown" tabindex="-1"><i class="fa fa-font color-indicator fore-color"
                                title="Font Color"></i></div>
                        <ul class="dropdown-menu colorpicker-menu">
                            <li>
                                <div class="colorpicker" xml:space="preserve">
                                    <div class="o_we_colorpicker_switch_panel d-flex justify-content-end px-2"><button
                                            type="button" tabindex="1" class="o_we_colorpicker_switch_pane_btn"
                                            data-target="theme-colors" title="Solid"><span>Solid</span></button><button
                                            type="button" tabindex="2" class="o_we_colorpicker_switch_pane_btn active"
                                            data-target="custom-colors" title="Custom"><span>Custom</span></button><button
                                            type="button" tabindex="3" class="o_we_colorpicker_switch_pane_btn"
                                            data-target="gradients" title="Gradient"><span>Gradient</span></button><button
                                            type="button"
                                            class="fa fa-trash my-1 ms-5 py-0 o_we_color_btn o_colorpicker_reset o_we_hover_danger"
                                            title="Reset"></button></div>
                                    <div class="o_colorpicker_sections pt-2 px-2 pb-3 d-none"
                                        data-color-tab="color-combinations">
                                        <button type="button" class="o_we_color_btn o_we_color_combination_btn"
                                            data-color="1" title="Preset 1">
                                            <div class="o_we_cc_preview_wrapper d-flex justify-content-between o_cc o_cc1">
                                                <h1 class="o_we_color_combination_btn_title">Title</h1>
                                                <p class="o_we_color_combination_btn_text flex-grow-1">Text</p><span
                                                    class="o_we_color_combination_btn_btn btn btn-sm btn-primary o_btn_preview me-1"><small>Button</small></span><span
                                                    class="o_we_color_combination_btn_btn btn btn-sm btn-secondary o_btn_preview"><small>Button</small></span>
                                            </div>
                                        </button><button type="button" class="o_we_color_btn o_we_color_combination_btn"
                                            data-color="2" title="Preset 2">
                                            <div class="o_we_cc_preview_wrapper d-flex justify-content-between o_cc o_cc2">
                                                <h1 class="o_we_color_combination_btn_title">Title</h1>
                                                <p class="o_we_color_combination_btn_text flex-grow-1">Text</p><span
                                                    class="o_we_color_combination_btn_btn btn btn-sm btn-primary o_btn_preview me-1"><small>Button</small></span><span
                                                    class="o_we_color_combination_btn_btn btn btn-sm btn-secondary o_btn_preview"><small>Button</small></span>
                                            </div>
                                        </button><button type="button" class="o_we_color_btn o_we_color_combination_btn"
                                            data-color="3" title="Preset 3">
                                            <div class="o_we_cc_preview_wrapper d-flex justify-content-between o_cc o_cc3">
                                                <h1 class="o_we_color_combination_btn_title">Title</h1>
                                                <p class="o_we_color_combination_btn_text flex-grow-1">Text</p><span
                                                    class="o_we_color_combination_btn_btn btn btn-sm btn-primary o_btn_preview me-1"><small>Button</small></span><span
                                                    class="o_we_color_combination_btn_btn btn btn-sm btn-secondary o_btn_preview"><small>Button</small></span>
                                            </div>
                                        </button><button type="button" class="o_we_color_btn o_we_color_combination_btn"
                                            data-color="4" title="Preset 4">
                                            <div class="o_we_cc_preview_wrapper d-flex justify-content-between o_cc o_cc4">
                                                <h1 class="o_we_color_combination_btn_title">Title</h1>
                                                <p class="o_we_color_combination_btn_text flex-grow-1">Text</p><span
                                                    class="o_we_color_combination_btn_btn btn btn-sm btn-primary o_btn_preview me-1"><small>Button</small></span><span
                                                    class="o_we_color_combination_btn_btn btn btn-sm btn-secondary o_btn_preview"><small>Button</small></span>
                                            </div>
                                        </button><button type="button" class="o_we_color_btn o_we_color_combination_btn"
                                            data-color="5" title="Preset 5">
                                            <div class="o_we_cc_preview_wrapper d-flex justify-content-between o_cc o_cc5">
                                                <h1 class="o_we_color_combination_btn_title">Title</h1>
                                                <p class="o_we_color_combination_btn_text flex-grow-1">Text</p><span
                                                    class="o_we_color_combination_btn_btn btn btn-sm btn-primary o_btn_preview me-1"><small>Button</small></span><span
                                                    class="o_we_color_combination_btn_btn btn btn-sm btn-secondary o_btn_preview"><small>Button</small></span>
                                            </div>
                                        </button>
                                    </div>
                                    <div class="o_colorpicker_sections py-3 px-2 d-none" data-color-tab="theme-colors">
                                        <div class="o_colorpicker_section" data-name="theme">
                                            <div></div>
                                            <button data-color="o-color-1" class="o_we_color_btn"
                                                style="background-color: var(--we-cp-o-color-1);"></button>
                                            <button data-color="o-color-3" class="o_we_color_btn"
                                                style="background-color: var(--we-cp-o-color-3);"></button>
                                            <button data-color="o-color-2" class="o_we_color_btn"
                                                style="background-color: var(--we-cp-o-color-2);"></button>
                                            <button data-color="o-color-4" class="ms-2 o_we_color_btn"
                                                style="background-color: var(--we-cp-o-color-4);"></button>
                                            <button data-color="o-color-5" class="o_we_color_btn"
                                                style="background-color: var(--we-cp-o-color-5);"></button>
                                        </div>
                                        <div class="o_colorpicker_section" data-name="common">
                                            <div></div>
                                            <button data-color="black" class="o_we_color_btn bg-black"></button>
                                            <button data-color="900" class="o_we_color_btn"
                                                style="background-color: var(--we-cp-900);"></button>
                                            <button data-color="800" class="o_we_color_btn"
                                                style="background-color: var(--we-cp-800);"></button>
                                            <button data-color="700" class="d-none o_we_color_btn"
                                                style="background-color: var(--we-cp-700);"></button>
                                            <button data-color="600" class="o_we_color_btn"
                                                style="background-color: var(--we-cp-600);"></button>
                                            <button data-color="500" class="d-none o_we_color_btn"
                                                style="background-color: var(--we-cp-500);"></button>
                                            <button data-color="400" class="o_we_color_btn"
                                                style="background-color: var(--we-cp-400);"></button>
                                            <button data-color="300" class="d-none o_we_color_btn"
                                                style="background-color: var(--we-cp-300);"></button>
                                            <button data-color="200" class="o_we_color_btn"
                                                style="background-color: var(--we-cp-200);"></button>
                                            <button data-color="100" class="o_we_color_btn"
                                                style="background-color: var(--we-cp-100);"></button>
                                            <button data-color="white" class="o_we_color_btn bg-white"></button>
                                            <div class="clearfix"><button class="o_we_color_btn o_common_color"
                                                    style="background-color:#FF0000;"></button><button
                                                    class="o_we_color_btn o_common_color"
                                                    style="background-color:#FF9C00;"></button><button
                                                    class="o_we_color_btn o_common_color"
                                                    style="background-color:#FFFF00;"></button><button
                                                    class="o_we_color_btn o_common_color"
                                                    style="background-color:#00FF00;"></button><button
                                                    class="o_we_color_btn o_common_color"
                                                    style="background-color:#00FFFF;"></button><button
                                                    class="o_we_color_btn o_common_color"
                                                    style="background-color:#0000FF;"></button><button
                                                    class="o_we_color_btn o_common_color"
                                                    style="background-color:#9C00FF;"></button><button
                                                    class="o_we_color_btn o_common_color"
                                                    style="background-color:#FF00FF;"></button></div>
                                            <div class="clearfix"><button class="o_we_color_btn o_common_color"
                                                    style="background-color:#F7C6CE;"></button><button
                                                    class="o_we_color_btn o_common_color"
                                                    style="background-color:#FFE7CE;"></button><button
                                                    class="o_we_color_btn o_common_color"
                                                    style="background-color:#FFEFC6;"></button><button
                                                    class="o_we_color_btn o_common_color"
                                                    style="background-color:#D6EFD6;"></button><button
                                                    class="o_we_color_btn o_common_color"
                                                    style="background-color:#CEDEE7;"></button><button
                                                    class="o_we_color_btn o_common_color"
                                                    style="background-color:#CEE7F7;"></button><button
                                                    class="o_we_color_btn o_common_color"
                                                    style="background-color:#D6D6E7;"></button><button
                                                    class="o_we_color_btn o_common_color"
                                                    style="background-color:#E7D6DE;"></button></div>
                                            <div class="clearfix"><button class="o_we_color_btn o_common_color"
                                                    style="background-color:#E79C9C;"></button><button
                                                    class="o_we_color_btn o_common_color"
                                                    style="background-color:#FFC69C;"></button><button
                                                    class="o_we_color_btn o_common_color"
                                                    style="background-color:#FFE79C;"></button><button
                                                    class="o_we_color_btn o_common_color"
                                                    style="background-color:#B5D6A5;"></button><button
                                                    class="o_we_color_btn o_common_color"
                                                    style="background-color:#A5C6CE;"></button><button
                                                    class="o_we_color_btn o_common_color"
                                                    style="background-color:#9CC6EF;"></button><button
                                                    class="o_we_color_btn o_common_color"
                                                    style="background-color:#B5A5D6;"></button><button
                                                    class="o_we_color_btn o_common_color"
                                                    style="background-color:#D6A5BD;"></button></div>
                                            <div class="clearfix"><button class="o_we_color_btn o_common_color"
                                                    style="background-color:#E76363;"></button><button
                                                    class="o_we_color_btn o_common_color"
                                                    style="background-color:#F7AD6B;"></button><button
                                                    class="o_we_color_btn o_common_color"
                                                    style="background-color:#FFD663;"></button><button
                                                    class="o_we_color_btn o_common_color"
                                                    style="background-color:#94BD7B;"></button><button
                                                    class="o_we_color_btn o_common_color"
                                                    style="background-color:#73A5AD;"></button><button
                                                    class="o_we_color_btn o_common_color"
                                                    style="background-color:#6BADDE;"></button><button
                                                    class="o_we_color_btn o_common_color"
                                                    style="background-color:#8C7BC6;"></button><button
                                                    class="o_we_color_btn o_common_color"
                                                    style="background-color:#C67BA5;"></button></div>
                                            <div class="clearfix"><button class="o_we_color_btn o_common_color"
                                                    style="background-color:#CE0000;"></button><button
                                                    class="o_we_color_btn o_common_color"
                                                    style="background-color:#E79439;"></button><button
                                                    class="o_we_color_btn o_common_color"
                                                    style="background-color:#EFC631;"></button><button
                                                    class="o_we_color_btn o_common_color"
                                                    style="background-color:#6BA54A;"></button><button
                                                    class="o_we_color_btn o_common_color"
                                                    style="background-color:#4A7B8C;"></button><button
                                                    class="o_we_color_btn o_common_color"
                                                    style="background-color:#3984C6;"></button><button
                                                    class="o_we_color_btn o_common_color"
                                                    style="background-color:#634AA5;"></button><button
                                                    class="o_we_color_btn o_common_color"
                                                    style="background-color:#A54A7B;"></button></div>
                                            <div class="clearfix"><button class="o_we_color_btn o_common_color"
                                                    style="background-color:#9C0000;"></button><button
                                                    class="o_we_color_btn o_common_color"
                                                    style="background-color:#B56308;"></button><button
                                                    class="o_we_color_btn o_common_color"
                                                    style="background-color:#BD9400;"></button><button
                                                    class="o_we_color_btn o_common_color"
                                                    style="background-color:#397B21;"></button><button
                                                    class="o_we_color_btn o_common_color"
                                                    style="background-color:#104A5A;"></button><button
                                                    class="o_we_color_btn o_common_color"
                                                    style="background-color:#085294;"></button><button
                                                    class="o_we_color_btn o_common_color"
                                                    style="background-color:#311873;"></button><button
                                                    class="o_we_color_btn o_common_color"
                                                    style="background-color:#731842;"></button></div>
                                            <div class="clearfix"><button class="o_we_color_btn o_common_color"
                                                    style="background-color:#630000;"></button><button
                                                    class="o_we_color_btn o_common_color"
                                                    style="background-color:#7B3900;"></button><button
                                                    class="o_we_color_btn o_common_color"
                                                    style="background-color:#846300;"></button><button
                                                    class="o_we_color_btn o_common_color"
                                                    style="background-color:#295218;"></button><button
                                                    class="o_we_color_btn o_common_color"
                                                    style="background-color:#083139;"></button><button
                                                    class="o_we_color_btn o_common_color"
                                                    style="background-color:#003163;"></button><button
                                                    class="o_we_color_btn o_common_color"
                                                    style="background-color:#21104A;"></button><button
                                                    class="o_we_color_btn o_common_color"
                                                    style="background-color:#4A1031;"></button></div>
                                        </div>
                                    </div>
                                    <div class="o_colorpicker_sections py-3 px-2" data-color-tab="custom-colors">
                                        <div class="o_colorpicker_section_container">
                                            <div class="o_colorpicker_section" data-name="custom">
                                                <div></div>
                                            </div>
                                            <div class="o_colorpicker_section d-none" data-name="transparent_grayscale">
                                                <div></div>
                                                <button data-color="black-15" class="o_we_color_btn bg-black-15"></button>
                                                <button data-color="black-25" class="o_we_color_btn bg-black-25"></button>
                                                <button data-color="black-50" class="o_we_color_btn bg-black-50"></button>
                                                <button data-color="black-75" class="o_we_color_btn bg-black-75"></button>
                                                <button data-color="white-25" class="o_we_color_btn bg-white-25"></button>
                                                <button data-color="white-50" class="o_we_color_btn bg-white-50"></button>
                                                <button data-color="white-75" class="o_we_color_btn bg-white-75"></button>
                                                <button data-color="white-85" class="o_we_color_btn bg-white-85"></button>
                                            </div>
                                            <div class="o_colorpicker_section" data-name="common">
                                                <div></div>
                                                <button data-color="black" class="o_we_color_btn bg-black"></button>
                                                <button data-color="900" class="o_we_color_btn"
                                                    style="background-color: var(--we-cp-900);"></button>
                                                <button data-color="800" class="o_we_color_btn"
                                                    style="background-color: var(--we-cp-800);"></button>
                                                <button data-color="700" class="d-none o_we_color_btn"
                                                    style="background-color: var(--we-cp-700);"></button>
                                                <button data-color="600" class="o_we_color_btn"
                                                    style="background-color: var(--we-cp-600);"></button>
                                                <button data-color="500" class="d-none o_we_color_btn"
                                                    style="background-color: var(--we-cp-500);"></button>
                                                <button data-color="400" class="o_we_color_btn"
                                                    style="background-color: var(--we-cp-400);"></button>
                                                <button data-color="300" class="d-none o_we_color_btn"
                                                    style="background-color: var(--we-cp-300);"></button>
                                                <button data-color="200" class="o_we_color_btn"
                                                    style="background-color: var(--we-cp-200);"></button>
                                                <button data-color="100" class="o_we_color_btn"
                                                    style="background-color: var(--we-cp-100);"></button>
                                                <button data-color="white" class="o_we_color_btn bg-white"></button>
                                            </div>
                                        </div>
                                        <div class="o_colorpicker_widget">
                                            <div class="d-flex justify-content-between align-items-stretch mb-2">
                                                <div class="o_color_pick_area position-relative w-75"
                                                    style="background-color: rgb(0, 81, 255);">
                                                    <div class="o_picker_pointer rounded-circle p-1 position-absolute"
                                                        tabindex="-1" style="top: 106.275px; left: -5px;"></div>
                                                </div>
                                                <div class="o_color_slider position-relative">
                                                    <div class="o_slider_pointer" tabindex="-1" style="top: -2px;"></div>
                                                </div>
                                                <div class="o_opacity_slider position-relative"
                                                    style="background: linear-gradient(rgb(17, 24, 39) 0%, transparent 100%);">
                                                    <div class="o_opacity_pointer" tabindex="-1" style="top: -2px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="o_color_picker_inputs d-flex justify-content-between mb-2">
                                                <div class="o_hex_div px-1 d-flex align-items-baseline"><input type="text"
                                                        data-color-method="hex" size="1"
                                                        class="o_hex_input p-0 border-0 text-center font-monospace bg-transparent"><label
                                                        class="flex-grow-0 ms-1 mb-0">hex</label></div>
                                                <div class="o_rgba_div px-1 d-flex align-items-baseline"><input type="text"
                                                        data-color-method="rgb" size="1"
                                                        class="o_red_input p-0 border-0 text-center font-monospace bg-transparent"><input
                                                        type="text" data-color-method="rgb" size="1"
                                                        class="o_green_input p-0 border-0 text-center font-monospace bg-transparent"><input
                                                        type="text" data-color-method="rgb" size="1"
                                                        class="o_blue_input me-0 p-0 border-0 text-center font-monospace bg-transparent"><input
                                                        type="text" data-color-method="opacity" size="1"
                                                        class="o_opacity_input p-0 border-0 text-center font-monospace bg-transparent"><label
                                                        class="flex-grow-0 ms-1 mb-0"> RGBA </label></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="o_colorpicker_sections py-3 px-2 d-none" data-color-tab="gradients">
                                        <div class="o_colorpicker_section_container">
                                            <div class="o_colorpicker_section" data-name="predefined_gradients">
                                                <div></div>
                                                <button class="w-50 o_we_color_btn"
                                                    style="background-image: linear-gradient(135deg, rgb(255, 204, 51) 0%, rgb(226, 51, 255) 100%);"
                                                    data-color="linear-gradient(135deg, rgb(255, 204, 51) 0%, rgb(226, 51, 255) 100%)"></button>
                                                <button class="w-50 o_we_color_btn"
                                                    style="background-image: linear-gradient(135deg, rgb(102, 153, 255) 0%, rgb(255, 51, 102) 100%);"
                                                    data-color="linear-gradient(135deg, rgb(102, 153, 255) 0%, rgb(255, 51, 102) 100%)"></button>
                                                <button class="w-50 o_we_color_btn"
                                                    style="background-image: linear-gradient(135deg, rgb(47, 128, 237) 0%, rgb(178, 255, 218) 100%);"
                                                    data-color="linear-gradient(135deg, rgb(47, 128, 237) 0%, rgb(178, 255, 218) 100%)"></button>
                                                <button class="w-50 o_we_color_btn"
                                                    style="background-image: linear-gradient(135deg, rgb(203, 94, 238) 0%, rgb(75, 225, 236) 100%);"
                                                    data-color="linear-gradient(135deg, rgb(203, 94, 238) 0%, rgb(75, 225, 236) 100%)"></button>
                                                <button class="w-50 o_we_color_btn"
                                                    style="background-image: linear-gradient(135deg, rgb(214, 255, 127) 0%, rgb(0, 179, 204) 100%);"
                                                    data-color="linear-gradient(135deg, rgb(214, 255, 127) 0%, rgb(0, 179, 204) 100%)"></button>
                                                <button class="w-50 o_we_color_btn"
                                                    style="background-image: linear-gradient(135deg, rgb(255, 222, 69) 0%, rgb(69, 33, 0) 100%);"
                                                    data-color="linear-gradient(135deg, rgb(255, 222, 69) 0%, rgb(69, 33, 0) 100%)"></button>
                                                <button class="w-50 o_we_color_btn"
                                                    style="background-image: linear-gradient(135deg, rgb(222, 222, 222) 0%, rgb(69, 69, 69) 100%);"
                                                    data-color="linear-gradient(135deg, rgb(222, 222, 222) 0%, rgb(69, 69, 69) 100%)"></button>
                                                <button class="w-50 o_we_color_btn"
                                                    style="background-image: linear-gradient(135deg, rgb(255, 222, 202) 0%, rgb(202, 115, 69) 100%);"
                                                    data-color="linear-gradient(135deg, rgb(255, 222, 202) 0%, rgb(202, 115, 69) 100%)"></button>
                                            </div>
                                            <div class="o_colorpicker_section o_custom_gradient_editor"
                                                data-name="custom_gradient">
                                                <div></div>
                                                <button class="w-50 o_custom_gradient_btn o_we_color_btn py-1 btn"
                                                    title="Define a custom gradient">Custom</button>
                                                <div class="o_color_picker_inputs mx-1 d-none">
                                                    <div class="d-flex justify-content-between my-2 o_type_row">
                                                        <we-title>Type</we-title>
                                                        <span class="d-flex justify-content-between bg-black-50">
                                                            <we-button data-gradient-type="linear-gradient"
                                                                class="d-flex align-items-baseline active">Linear</we-button>
                                                            <we-button data-gradient-type="radial-gradient"
                                                                class="d-flex align-items-baseline">Radial</we-button>
                                                        </span>
                                                    </div>
                                                    <div class="d-flex justify-content-between my-2 o_angle_row">
                                                        <we-title>Angle</we-title>
                                                        <span
                                                            class="o_custom_gradient_input bg-black-50 px-1 d-flex align-items-baseline">
                                                            <input data-name="angle" type="text" style="width: 5ch;"
                                                                value="90"
                                                                class="p-0 border-0 text-center font-monospace bg-transparent text-white">
                                                            <span class="flex-grow-0 ms-1 text-white-50">deg</span>
                                                        </span>
                                                    </div>
                                                    <div class="d-flex justify-content-between my-2 o_position_row">
                                                        <we-title>Position</we-title>
                                                        <span class="d-flex">
                                                            <span class="me-2">X</span>
                                                            <span class="o_custom_gradient_input bg-black-50 px-1 d-flex">
                                                                <input data-name="positionX" type="text"
                                                                    style="width: 3ch;" value="25"
                                                                    class="p-0 border-0 text-center font-monospace bg-transparent text-white">
                                                                <span class="flex-grow-0 ms-1 text-white-50">%</span>
                                                            </span>
                                                            <span class="me-2 ms-3">Y</span>
                                                            <span class="o_custom_gradient_input bg-black-50 px-1 d-flex">
                                                                <input data-name="positionY" type="text"
                                                                    style="width: 3ch;" value="25"
                                                                    class="p-0 border-0 text-center font-monospace bg-transparent text-white">
                                                                <span class="flex-grow-0 ms-1 text-white-50">%</span>
                                                            </span>
                                                        </span>
                                                    </div>
                                                    <div class="d-flex justify-content-between my-2 o_size_row">
                                                        <we-title>Size</we-title>
                                                        <span class="d-flex justify-content-between">
                                                            <we-button data-gradient-size="closest-side"
                                                                class="d-flex align-items-baseline"
                                                                title="Extend to the closest side">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="20" viewBox="0 0 16 20" fill="none">
                                                                    <rect x="1.5" y="3.5" width="13" height="13"
                                                                        stroke="#AAAAAD"></rect>
                                                                    <path
                                                                        d="M3 4H9V8C9 8.55228 8.55228 9 8 9H4C3.44772 9 3 8.55228 3 8V4Z"
                                                                        fill="#8C8C92"></path>
                                                                    <path
                                                                        d="M6 11C7.65685 11 9 9.65685 9 8C9 6.34315 7.65685 5 6 5C4.34315 5 3 6.34315 3 8C3 9.65685 4.34315 11 6 11Z"
                                                                        fill="#74747B"></path>
                                                                    <path
                                                                        d="M6 10C7.10457 10 8 9.10457 8 8C8 6.89543 7.10457 6 6 6C4.89543 6 4 6.89543 4 8C4 9.10457 4.89543 10 6 10Z"
                                                                        fill="white"></path>
                                                                    <rect x="2" y="3" width="12" height="1"
                                                                        fill="white"></rect>
                                                                </svg>
                                                            </we-button>
                                                            <we-button data-gradient-size="closest-corner"
                                                                class="d-flex align-items-baseline"
                                                                title="Extend to the closest corner">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="20" viewBox="0 0 16 20" fill="none">
                                                                    <rect x="1.5" y="3.5" width="13" height="13"
                                                                        stroke="#AAAAAD"></rect>
                                                                    <path d="M2 4H9V7C9 9.20914 7.20914 11 5 11H2V4Z"
                                                                        fill="#8C8C92"></path>
                                                                    <path
                                                                        d="M6 11C7.65685 11 9 9.65685 9 8C9 6.34315 7.65685 5 6 5C4.34315 5 3 6.34315 3 8C3 9.65685 4.34315 11 6 11Z"
                                                                        fill="#74747B"></path>
                                                                    <path
                                                                        d="M6 10C7.10457 10 8 9.10457 8 8C8 6.89543 7.10457 6 6 6C4.89543 6 4 6.89543 4 8C4 9.10457 4.89543 10 6 10Z"
                                                                        fill="white"></path>
                                                                    <rect x="1" y="3" width="8" height="1"
                                                                        fill="white"></rect>
                                                                    <rect x="1" y="11" width="8" height="1"
                                                                        transform="rotate(-90 1 11)" fill="white"></rect>
                                                                </svg>
                                                            </we-button>
                                                            <we-button data-gradient-size="farthest-side"
                                                                class="d-flex align-items-baseline active"
                                                                title="Extend to the farthest side">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="20" viewBox="0 0 16 20" fill="none">
                                                                    <rect x="1.5" y="3.5" width="13" height="13"
                                                                        stroke="#AAAAAD"></rect>
                                                                    <path
                                                                        d="M7 12C10.3137 12 14 10.2091 14 8C14 5.79086 10.3137 4 7 4C3.68629 4 2 5.79086 2 8C2 10.2091 3.68629 12 7 12Z"
                                                                        fill="#8C8C92"></path>
                                                                    <path
                                                                        d="M6 11C7.65685 11 9 9.65685 9 8C9 6.34315 7.65685 5 6 5C4.34315 5 3 6.34315 3 8C3 9.65685 4.34315 11 6 11Z"
                                                                        fill="#74747B"></path>
                                                                    <path
                                                                        d="M6 10C7.10457 10 8 9.10457 8 8C8 6.89543 7.10457 6 6 6C4.89543 6 4 6.89543 4 8C4 9.10457 4.89543 10 6 10Z"
                                                                        fill="white"></path>
                                                                    <rect x="14" y="4" width="1" height="12"
                                                                        fill="white"></rect>
                                                                </svg>
                                                            </we-button>
                                                            <we-button data-gradient-size="farthest-corner"
                                                                class="d-flex align-items-baseline"
                                                                title="Extend to the farthest corner">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="20" viewBox="0 0 16 20" fill="none">
                                                                    <rect x="1.5" y="3.5" width="13" height="13"
                                                                        stroke="#AAAAAD"></rect>
                                                                    <path d="M2 4H14V10C14 13.3137 11.3137 16 8 16H2V4Z"
                                                                        fill="#8C8C92"></path>
                                                                    <path
                                                                        d="M6 11C7.65685 11 9 9.65685 9 8C9 6.34315 7.65685 5 6 5C4.34315 5 3 6.34315 3 8C3 9.65685 4.34315 11 6 11Z"
                                                                        fill="#74747B"></path>
                                                                    <path
                                                                        d="M6 10C7.10457 10 8 9.10457 8 8C8 6.89543 7.10457 6 6 6C4.89543 6 4 6.89543 4 8C4 9.10457 4.89543 10 6 10Z"
                                                                        fill="white"></path>
                                                                    <rect x="15" y="17" width="7" height="0.999999"
                                                                        transform="rotate(-180 15 17)" fill="white">
                                                                    </rect>
                                                                    <rect x="15" y="10" width="7" height="1"
                                                                        transform="rotate(90 15 10)" fill="white"></rect>
                                                                </svg>
                                                            </we-button>
                                                        </span>
                                                    </div>
                                                    <div class="mx-1 o_custom_gradient_scale">
                                                        <div class="w-100"></div>
                                                    </div>
                                                    <div class="w-100 o_slider_multi" role="group"></div>
                                                    <we-button
                                                        class="o_remove_color fa fa-fw fa-trash o_we_link o_we_hover_danger d-none"
                                                        title="Remove Selected Color"
                                                        aria-label="Remove Selected Color"></we-button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="colorpicker-group note-back-color-preview" data-name="color" data-color-type="background">
                        <button id="oe-fore-color" type="button" class="btn dropdown-toggle editor-ignore"
                            data-bs-toggle="dropdown" tabindex="-1"><i class="fa fa-paint-brush color-indicator hilite-color"
                                title="Background Color"></i></button>
                        <ul class="dropdown-menu colorpicker-menu">
                            <li>
                                <div class="colorpicker" xml:space="preserve">
                                    <div class="o_we_colorpicker_switch_panel d-flex justify-content-end px-2"><button
                                            type="button" tabindex="1" class="o_we_colorpicker_switch_pane_btn"
                                            data-target="theme-colors" title="Solid"><span>Solid</span></button><button
                                            type="button" tabindex="2" class="o_we_colorpicker_switch_pane_btn active"
                                            data-target="custom-colors" title="Custom"><span>Custom</span></button><button
                                            type="button" tabindex="3" class="o_we_colorpicker_switch_pane_btn"
                                            data-target="gradients" title="Gradient"><span>Gradient</span></button><button
                                            type="button"
                                            class="fa fa-trash my-1 ms-5 py-0 o_we_color_btn o_colorpicker_reset o_we_hover_danger"
                                            title="Reset"></button></div>
                                    <div class="o_colorpicker_sections pt-2 px-2 pb-3 d-none"
                                        data-color-tab="color-combinations"><button type="button"
                                            class="o_we_color_btn o_we_color_combination_btn" data-color="1" title="Preset 1">
                                            <div class="o_we_cc_preview_wrapper d-flex justify-content-between o_cc o_cc1">
                                                <h1 class="o_we_color_combination_btn_title">Title</h1>
                                                <p class="o_we_color_combination_btn_text flex-grow-1">Text</p><span
                                                    class="o_we_color_combination_btn_btn btn btn-sm btn-primary o_btn_preview me-1"><small>Button</small></span><span
                                                    class="o_we_color_combination_btn_btn btn btn-sm btn-secondary o_btn_preview"><small>Button</small></span>
                                            </div>
                                        </button><button type="button" class="o_we_color_btn o_we_color_combination_btn"
                                            data-color="2" title="Preset 2">
                                            <div class="o_we_cc_preview_wrapper d-flex justify-content-between o_cc o_cc2">
                                                <h1 class="o_we_color_combination_btn_title">Title</h1>
                                                <p class="o_we_color_combination_btn_text flex-grow-1">Text</p><span
                                                    class="o_we_color_combination_btn_btn btn btn-sm btn-primary o_btn_preview me-1"><small>Button</small></span><span
                                                    class="o_we_color_combination_btn_btn btn btn-sm btn-secondary o_btn_preview"><small>Button</small></span>
                                            </div>
                                        </button><button type="button" class="o_we_color_btn o_we_color_combination_btn"
                                            data-color="3" title="Preset 3">
                                            <div class="o_we_cc_preview_wrapper d-flex justify-content-between o_cc o_cc3">
                                                <h1 class="o_we_color_combination_btn_title">Title</h1>
                                                <p class="o_we_color_combination_btn_text flex-grow-1">Text</p><span
                                                    class="o_we_color_combination_btn_btn btn btn-sm btn-primary o_btn_preview me-1"><small>Button</small></span><span
                                                    class="o_we_color_combination_btn_btn btn btn-sm btn-secondary o_btn_preview"><small>Button</small></span>
                                            </div>
                                        </button><button type="button" class="o_we_color_btn o_we_color_combination_btn"
                                            data-color="4" title="Preset 4">
                                            <div class="o_we_cc_preview_wrapper d-flex justify-content-between o_cc o_cc4">
                                                <h1 class="o_we_color_combination_btn_title">Title</h1>
                                                <p class="o_we_color_combination_btn_text flex-grow-1">Text</p><span
                                                    class="o_we_color_combination_btn_btn btn btn-sm btn-primary o_btn_preview me-1"><small>Button</small></span><span
                                                    class="o_we_color_combination_btn_btn btn btn-sm btn-secondary o_btn_preview"><small>Button</small></span>
                                            </div>
                                        </button><button type="button" class="o_we_color_btn o_we_color_combination_btn"
                                            data-color="5" title="Preset 5">
                                            <div class="o_we_cc_preview_wrapper d-flex justify-content-between o_cc o_cc5">
                                                <h1 class="o_we_color_combination_btn_title">Title</h1>
                                                <p class="o_we_color_combination_btn_text flex-grow-1">Text</p><span
                                                    class="o_we_color_combination_btn_btn btn btn-sm btn-primary o_btn_preview me-1"><small>Button</small></span><span
                                                    class="o_we_color_combination_btn_btn btn btn-sm btn-secondary o_btn_preview"><small>Button</small></span>
                                            </div>
                                        </button></div>
                                    <div class="o_colorpicker_sections py-3 px-2 d-none" data-color-tab="theme-colors">
                                        <div class="o_colorpicker_section" data-name="theme">
                                            <div></div>
                                            <button data-color="o-color-1" class="o_we_color_btn"
                                                style="background-color: var(--we-cp-o-color-1);"></button>
                                            <button data-color="o-color-3" class="o_we_color_btn"
                                                style="background-color: var(--we-cp-o-color-3);"></button>
                                            <button data-color="o-color-2" class="o_we_color_btn"
                                                style="background-color: var(--we-cp-o-color-2);"></button>
                                            <button data-color="o-color-4" class="ms-2 o_we_color_btn"
                                                style="background-color: var(--we-cp-o-color-4);"></button>
                                            <button data-color="o-color-5" class="o_we_color_btn"
                                                style="background-color: var(--we-cp-o-color-5);"></button>
                                        </div>
                                        <div class="o_colorpicker_section" data-name="common">
                                            <div></div>
                                            <button data-color="black" class="o_we_color_btn bg-black"></button>
                                            <button data-color="900" class="o_we_color_btn"
                                                style="background-color: var(--we-cp-900);"></button>
                                            <button data-color="800" class="o_we_color_btn"
                                                style="background-color: var(--we-cp-800);"></button>
                                            <button data-color="700" class="d-none o_we_color_btn"
                                                style="background-color: var(--we-cp-700);"></button>
                                            <button data-color="600" class="o_we_color_btn"
                                                style="background-color: var(--we-cp-600);"></button>
                                            <button data-color="500" class="d-none o_we_color_btn"
                                                style="background-color: var(--we-cp-500);"></button>
                                            <button data-color="400" class="o_we_color_btn"
                                                style="background-color: var(--we-cp-400);"></button>
                                            <button data-color="300" class="d-none o_we_color_btn"
                                                style="background-color: var(--we-cp-300);"></button>
                                            <button data-color="200" class="o_we_color_btn"
                                                style="background-color: var(--we-cp-200);"></button>
                                            <button data-color="100" class="o_we_color_btn"
                                                style="background-color: var(--we-cp-100);"></button>
                                            <button data-color="white" class="o_we_color_btn bg-white"></button>
                                            <div class="clearfix"><button class="o_we_color_btn o_common_color"
                                                    style="background-color:#FF0000;"></button><button
                                                    class="o_we_color_btn o_common_color"
                                                    style="background-color:#FF9C00;"></button><button
                                                    class="o_we_color_btn o_common_color"
                                                    style="background-color:#FFFF00;"></button><button
                                                    class="o_we_color_btn o_common_color"
                                                    style="background-color:#00FF00;"></button><button
                                                    class="o_we_color_btn o_common_color"
                                                    style="background-color:#00FFFF;"></button><button
                                                    class="o_we_color_btn o_common_color"
                                                    style="background-color:#0000FF;"></button><button
                                                    class="o_we_color_btn o_common_color"
                                                    style="background-color:#9C00FF;"></button><button
                                                    class="o_we_color_btn o_common_color"
                                                    style="background-color:#FF00FF;"></button></div>
                                            <div class="clearfix"><button class="o_we_color_btn o_common_color"
                                                    style="background-color:#F7C6CE;"></button><button
                                                    class="o_we_color_btn o_common_color"
                                                    style="background-color:#FFE7CE;"></button><button
                                                    class="o_we_color_btn o_common_color"
                                                    style="background-color:#FFEFC6;"></button><button
                                                    class="o_we_color_btn o_common_color"
                                                    style="background-color:#D6EFD6;"></button><button
                                                    class="o_we_color_btn o_common_color"
                                                    style="background-color:#CEDEE7;"></button><button
                                                    class="o_we_color_btn o_common_color"
                                                    style="background-color:#CEE7F7;"></button><button
                                                    class="o_we_color_btn o_common_color"
                                                    style="background-color:#D6D6E7;"></button><button
                                                    class="o_we_color_btn o_common_color"
                                                    style="background-color:#E7D6DE;"></button></div>
                                            <div class="clearfix"><button class="o_we_color_btn o_common_color"
                                                    style="background-color:#E79C9C;"></button><button
                                                    class="o_we_color_btn o_common_color"
                                                    style="background-color:#FFC69C;"></button><button
                                                    class="o_we_color_btn o_common_color"
                                                    style="background-color:#FFE79C;"></button><button
                                                    class="o_we_color_btn o_common_color"
                                                    style="background-color:#B5D6A5;"></button><button
                                                    class="o_we_color_btn o_common_color"
                                                    style="background-color:#A5C6CE;"></button><button
                                                    class="o_we_color_btn o_common_color"
                                                    style="background-color:#9CC6EF;"></button><button
                                                    class="o_we_color_btn o_common_color"
                                                    style="background-color:#B5A5D6;"></button><button
                                                    class="o_we_color_btn o_common_color"
                                                    style="background-color:#D6A5BD;"></button></div>
                                            <div class="clearfix"><button class="o_we_color_btn o_common_color"
                                                    style="background-color:#E76363;"></button><button
                                                    class="o_we_color_btn o_common_color"
                                                    style="background-color:#F7AD6B;"></button><button
                                                    class="o_we_color_btn o_common_color"
                                                    style="background-color:#FFD663;"></button><button
                                                    class="o_we_color_btn o_common_color"
                                                    style="background-color:#94BD7B;"></button><button
                                                    class="o_we_color_btn o_common_color"
                                                    style="background-color:#73A5AD;"></button><button
                                                    class="o_we_color_btn o_common_color"
                                                    style="background-color:#6BADDE;"></button><button
                                                    class="o_we_color_btn o_common_color"
                                                    style="background-color:#8C7BC6;"></button><button
                                                    class="o_we_color_btn o_common_color"
                                                    style="background-color:#C67BA5;"></button></div>
                                            <div class="clearfix"><button class="o_we_color_btn o_common_color"
                                                    style="background-color:#CE0000;"></button><button
                                                    class="o_we_color_btn o_common_color"
                                                    style="background-color:#E79439;"></button><button
                                                    class="o_we_color_btn o_common_color"
                                                    style="background-color:#EFC631;"></button><button
                                                    class="o_we_color_btn o_common_color"
                                                    style="background-color:#6BA54A;"></button><button
                                                    class="o_we_color_btn o_common_color"
                                                    style="background-color:#4A7B8C;"></button><button
                                                    class="o_we_color_btn o_common_color"
                                                    style="background-color:#3984C6;"></button><button
                                                    class="o_we_color_btn o_common_color"
                                                    style="background-color:#634AA5;"></button><button
                                                    class="o_we_color_btn o_common_color"
                                                    style="background-color:#A54A7B;"></button></div>
                                            <div class="clearfix"><button class="o_we_color_btn o_common_color"
                                                    style="background-color:#9C0000;"></button><button
                                                    class="o_we_color_btn o_common_color"
                                                    style="background-color:#B56308;"></button><button
                                                    class="o_we_color_btn o_common_color"
                                                    style="background-color:#BD9400;"></button><button
                                                    class="o_we_color_btn o_common_color"
                                                    style="background-color:#397B21;"></button><button
                                                    class="o_we_color_btn o_common_color"
                                                    style="background-color:#104A5A;"></button><button
                                                    class="o_we_color_btn o_common_color"
                                                    style="background-color:#085294;"></button><button
                                                    class="o_we_color_btn o_common_color"
                                                    style="background-color:#311873;"></button><button
                                                    class="o_we_color_btn o_common_color"
                                                    style="background-color:#731842;"></button></div>
                                            <div class="clearfix"><button class="o_we_color_btn o_common_color"
                                                    style="background-color:#630000;"></button><button
                                                    class="o_we_color_btn o_common_color"
                                                    style="background-color:#7B3900;"></button><button
                                                    class="o_we_color_btn o_common_color"
                                                    style="background-color:#846300;"></button><button
                                                    class="o_we_color_btn o_common_color"
                                                    style="background-color:#295218;"></button><button
                                                    class="o_we_color_btn o_common_color"
                                                    style="background-color:#083139;"></button><button
                                                    class="o_we_color_btn o_common_color"
                                                    style="background-color:#003163;"></button><button
                                                    class="o_we_color_btn o_common_color"
                                                    style="background-color:#21104A;"></button><button
                                                    class="o_we_color_btn o_common_color"
                                                    style="background-color:#4A1031;"></button></div>
                                        </div>
                                    </div>
                                    <div class="o_colorpicker_sections py-3 px-2" data-color-tab="custom-colors">
                                        <div class="o_colorpicker_section_container">
                                            <div class="o_colorpicker_section" data-name="custom">
                                                <div></div><button class="o_we_color_btn o_custom_color selected"
                                                    style="background-color:rgba(0, 0, 0, 0);"></button>
                                            </div>
                                            <div class="o_colorpicker_section d-none" data-name="transparent_grayscale">
                                                <div></div>
                                                <button data-color="black-15" class="o_we_color_btn bg-black-15"></button>
                                                <button data-color="black-25" class="o_we_color_btn bg-black-25"></button>
                                                <button data-color="black-50" class="o_we_color_btn bg-black-50"></button>
                                                <button data-color="black-75" class="o_we_color_btn bg-black-75"></button>
                                                <button data-color="white-25" class="o_we_color_btn bg-white-25"></button>
                                                <button data-color="white-50" class="o_we_color_btn bg-white-50"></button>
                                                <button data-color="white-75" class="o_we_color_btn bg-white-75"></button>
                                                <button data-color="white-85" class="o_we_color_btn bg-white-85"></button>
                                            </div>
                                            <div class="o_colorpicker_section" data-name="common">
                                                <div></div>
                                                <button data-color="black" class="o_we_color_btn bg-black"></button>
                                                <button data-color="900" class="o_we_color_btn"
                                                    style="background-color: var(--we-cp-900);"></button>
                                                <button data-color="800" class="o_we_color_btn"
                                                    style="background-color: var(--we-cp-800);"></button>
                                                <button data-color="700" class="d-none o_we_color_btn"
                                                    style="background-color: var(--we-cp-700);"></button>
                                                <button data-color="600" class="o_we_color_btn"
                                                    style="background-color: var(--we-cp-600);"></button>
                                                <button data-color="500" class="d-none o_we_color_btn"
                                                    style="background-color: var(--we-cp-500);"></button>
                                                <button data-color="400" class="o_we_color_btn"
                                                    style="background-color: var(--we-cp-400);"></button>
                                                <button data-color="300" class="d-none o_we_color_btn"
                                                    style="background-color: var(--we-cp-300);"></button>
                                                <button data-color="200" class="o_we_color_btn"
                                                    style="background-color: var(--we-cp-200);"></button>
                                                <button data-color="100" class="o_we_color_btn"
                                                    style="background-color: var(--we-cp-100);"></button>
                                                <button data-color="white" class="o_we_color_btn bg-white"></button>
                                            </div>
                                        </div>
                                        <div class="o_colorpicker_widget">
                                            <div class="d-flex justify-content-between align-items-stretch mb-2">
                                                <div class="o_color_pick_area position-relative w-75"
                                                    style="background-color: rgb(255, 0, 0);">
                                                    <div class="o_picker_pointer rounded-circle p-1 position-absolute"
                                                        tabindex="-1" style="top: 120px; left: -5px;"></div>
                                                </div>
                                                <div class="o_color_slider position-relative">
                                                    <div class="o_slider_pointer" tabindex="-1" style="top: -2px;"></div>
                                                </div>
                                                <div class="o_opacity_slider position-relative"
                                                    style="background: linear-gradient(rgb(0, 0, 0) 0%, transparent 100%);">
                                                    <div class="o_opacity_pointer" tabindex="-1" style="top: -2px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="o_color_picker_inputs d-flex justify-content-between mb-2">
                                                <div class="o_hex_div px-1 d-flex align-items-baseline"><input type="text"
                                                        data-color-method="hex" size="1"
                                                        class="o_hex_input p-0 border-0 text-center font-monospace bg-transparent"><label
                                                        class="flex-grow-0 ms-1 mb-0">hex</label></div>
                                                <div class="o_rgba_div px-1 d-flex align-items-baseline"><input type="text"
                                                        data-color-method="rgb" size="1"
                                                        class="o_red_input p-0 border-0 text-center font-monospace bg-transparent"><input
                                                        type="text" data-color-method="rgb" size="1"
                                                        class="o_green_input p-0 border-0 text-center font-monospace bg-transparent"><input
                                                        type="text" data-color-method="rgb" size="1"
                                                        class="o_blue_input me-0 p-0 border-0 text-center font-monospace bg-transparent"><input
                                                        type="text" data-color-method="opacity" size="1"
                                                        class="o_opacity_input p-0 border-0 text-center font-monospace bg-transparent"><label
                                                        class="flex-grow-0 ms-1 mb-0"> RGBA </label></div>
                                                </div>
                                            </div>
                                        </div>
                                    <div class="o_colorpicker_sections py-3 px-2 d-none" data-color-tab="gradients">
                                        <div class="o_colorpicker_section_container">
                                            <div class="o_colorpicker_section" data-name="predefined_gradients">
                                                <button class="w-50 o_we_color_btn"
                                                    style="background-image: linear-gradient(135deg, rgb(255, 204, 51) 0%, rgb(226, 51, 255) 100%);"
                                                    data-color="linear-gradient(135deg, rgb(255, 204, 51) 0%, rgb(226, 51, 255) 100%)"></button>
                                                <button class="w-50 o_we_color_btn"
                                                    style="background-image: linear-gradient(135deg, rgb(102, 153, 255) 0%, rgb(255, 51, 102) 100%);"
                                                    data-color="linear-gradient(135deg, rgb(102, 153, 255) 0%, rgb(255, 51, 102) 100%)"></button>
                                                <button class="w-50 o_we_color_btn"
                                                    style="background-image: linear-gradient(135deg, rgb(47, 128, 237) 0%, rgb(178, 255, 218) 100%);"
                                                    data-color="linear-gradient(135deg, rgb(47, 128, 237) 0%, rgb(178, 255, 218) 100%)"></button>
                                                <button class="w-50 o_we_color_btn"
                                                    style="background-image: linear-gradient(135deg, rgb(203, 94, 238) 0%, rgb(75, 225, 236) 100%);"
                                                    data-color="linear-gradient(135deg, rgb(203, 94, 238) 0%, rgb(75, 225, 236) 100%)"></button>
                                                <button class="w-50 o_we_color_btn"
                                                    style="background-image: linear-gradient(135deg, rgb(214, 255, 127) 0%, rgb(0, 179, 204) 100%);"
                                                    data-color="linear-gradient(135deg, rgb(214, 255, 127) 0%, rgb(0, 179, 204) 100%)"></button>
                                                <button class="w-50 o_we_color_btn"
                                                    style="background-image: linear-gradient(135deg, rgb(255, 222, 69) 0%, rgb(69, 33, 0) 100%);"
                                                    data-color="linear-gradient(135deg, rgb(255, 222, 69) 0%, rgb(69, 33, 0) 100%)"></button>
                                                <button class="w-50 o_we_color_btn"
                                                    style="background-image: linear-gradient(135deg, rgb(222, 222, 222) 0%, rgb(69, 69, 69) 100%);"
                                                    data-color="linear-gradient(135deg, rgb(222, 222, 222) 0%, rgb(69, 69, 69) 100%)"></button>
                                                <button class="w-50 o_we_color_btn"
                                                    style="background-image: linear-gradient(135deg, rgb(255, 222, 202) 0%, rgb(202, 115, 69) 100%);"
                                                    data-color="linear-gradient(135deg, rgb(255, 222, 202) 0%, rgb(202, 115, 69) 100%)"></button>
                                            </div>
                                            <div class="o_colorpicker_section o_custom_gradient_editor"
                                                data-name="custom_gradient">
                                                <div></div>
                                                <button class="w-50 o_custom_gradient_btn o_we_color_btn py-1 btn"
                                                    title="Define a custom gradient">Custom</button>
                                                <div class="o_color_picker_inputs mx-1 d-none">
                                                    <div class="d-flex justify-content-between my-2 o_type_row">
                                                        <we-title>Type</we-title>
                                                        <span class="d-flex justify-content-between bg-black-50">
                                                            <we-button data-gradient-type="linear-gradient"
                                                                class="d-flex align-items-baseline active">Linear</we-button>
                                                            <we-button data-gradient-type="radial-gradient"
                                                                class="d-flex align-items-baseline">Radial</we-button>
                                                        </span>
                                                    </div>
                                                    <div class="d-flex justify-content-between my-2 o_angle_row">
                                                        <we-title>Angle</we-title>
                                                        <span
                                                            class="o_custom_gradient_input bg-black-50 px-1 d-flex align-items-baseline">
                                                            <input data-name="angle" type="text" style="width: 5ch;"
                                                                value="90"
                                                                class="p-0 border-0 text-center font-monospace bg-transparent text-white">
                                                            <span class="flex-grow-0 ms-1 text-white-50">deg</span>
                                                        </span>
                                                    </div>
                                                    <div class="d-flex justify-content-between my-2 o_position_row">
                                                        <we-title>Position</we-title>
                                                        <span class="d-flex">
                                                            <span class="me-2">X</span>
                                                            <span class="o_custom_gradient_input bg-black-50 px-1 d-flex">
                                                                <input data-name="positionX" type="text"
                                                                    style="width: 3ch;" value="25"
                                                                    class="p-0 border-0 text-center font-monospace bg-transparent text-white">
                                                                <span class="flex-grow-0 ms-1 text-white-50">%</span>
                                                            </span>
                                                            <span class="me-2 ms-3">Y</span>
                                                            <span class="o_custom_gradient_input bg-black-50 px-1 d-flex">
                                                                <input data-name="positionY" type="text"
                                                                    style="width: 3ch;" value="25"
                                                                    class="p-0 border-0 text-center font-monospace bg-transparent text-white">
                                                                <span class="flex-grow-0 ms-1 text-white-50">%</span>
                                                            </span>
                                                        </span>
                                                    </div>
                                                    <div class="d-flex justify-content-between my-2 o_size_row">
                                                        <we-title>Size</we-title>
                                                        <span class="d-flex justify-content-between">
                                                            <we-button data-gradient-size="closest-side"
                                                                class="d-flex align-items-baseline"
                                                                title="Extend to the closest side">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="20" viewBox="0 0 16 20" fill="none">
                                                                    <rect x="1.5" y="3.5" width="13" height="13"
                                                                        stroke="#AAAAAD"></rect>
                                                                    <path
                                                                        d="M3 4H9V8C9 8.55228 8.55228 9 8 9H4C3.44772 9 3 8.55228 3 8V4Z"
                                                                        fill="#8C8C92"></path>
                                                                    <path
                                                                        d="M6 11C7.65685 11 9 9.65685 9 8C9 6.34315 7.65685 5 6 5C4.34315 5 3 6.34315 3 8C3 9.65685 4.34315 11 6 11Z"
                                                                        fill="#74747B"></path>
                                                                    <path
                                                                        d="M6 10C7.10457 10 8 9.10457 8 8C8 6.89543 7.10457 6 6 6C4.89543 6 4 6.89543 4 8C4 9.10457 4.89543 10 6 10Z"
                                                                        fill="white"></path>
                                                                    <rect x="2" y="3" width="12" height="1"
                                                                        fill="white"></rect>
                                                                </svg>
                                                            </we-button>
                                                            <we-button data-gradient-size="closest-corner"
                                                                class="d-flex align-items-baseline"
                                                                title="Extend to the closest corner">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="20" viewBox="0 0 16 20" fill="none">
                                                                    <rect x="1.5" y="3.5" width="13" height="13"
                                                                        stroke="#AAAAAD"></rect>
                                                                    <path d="M2 4H9V7C9 9.20914 7.20914 11 5 11H2V4Z"
                                                                        fill="#8C8C92"></path>
                                                                    <path
                                                                        d="M6 11C7.65685 11 9 9.65685 9 8C9 6.34315 7.65685 5 6 5C4.34315 5 3 6.34315 3 8C3 9.65685 4.34315 11 6 11Z"
                                                                        fill="#74747B"></path>
                                                                    <path
                                                                        d="M6 10C7.10457 10 8 9.10457 8 8C8 6.89543 7.10457 6 6 6C4.89543 6 4 6.89543 4 8C4 9.10457 4.89543 10 6 10Z"
                                                                        fill="white"></path>
                                                                    <rect x="1" y="3" width="8" height="1"
                                                                        fill="white"></rect>
                                                                    <rect x="1" y="11" width="8" height="1"
                                                                        transform="rotate(-90 1 11)" fill="white"></rect>
                                                                </svg>
                                                            </we-button>
                                                            <we-button data-gradient-size="farthest-side"
                                                                class="d-flex align-items-baseline active"
                                                                title="Extend to the farthest side">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="20" viewBox="0 0 16 20" fill="none">
                                                                    <rect x="1.5" y="3.5" width="13" height="13"
                                                                        stroke="#AAAAAD"></rect>
                                                                    <path
                                                                        d="M7 12C10.3137 12 14 10.2091 14 8C14 5.79086 10.3137 4 7 4C3.68629 4 2 5.79086 2 8C2 10.2091 3.68629 12 7 12Z"
                                                                        fill="#8C8C92"></path>
                                                                    <path
                                                                        d="M6 11C7.65685 11 9 9.65685 9 8C9 6.34315 7.65685 5 6 5C4.34315 5 3 6.34315 3 8C3 9.65685 4.34315 11 6 11Z"
                                                                        fill="#74747B"></path>
                                                                    <path
                                                                        d="M6 10C7.10457 10 8 9.10457 8 8C8 6.89543 7.10457 6 6 6C4.89543 6 4 6.89543 4 8C4 9.10457 4.89543 10 6 10Z"
                                                                        fill="white"></path>
                                                                    <rect x="14" y="4" width="1" height="12"
                                                                        fill="white"></rect>
                                                                </svg>
                                                            </we-button>
                                                            <we-button data-gradient-size="farthest-corner"
                                                                class="d-flex align-items-baseline"
                                                                title="Extend to the farthest corner">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="20" viewBox="0 0 16 20" fill="none">
                                                                    <rect x="1.5" y="3.5" width="13" height="13"
                                                                        stroke="#AAAAAD"></rect>
                                                                    <path d="M2 4H14V10C14 13.3137 11.3137 16 8 16H2V4Z"
                                                                        fill="#8C8C92"></path>
                                                                    <path
                                                                        d="M6 11C7.65685 11 9 9.65685 9 8C9 6.34315 7.65685 5 6 5C4.34315 5 3 6.34315 3 8C3 9.65685 4.34315 11 6 11Z"
                                                                        fill="#74747B"></path>
                                                                    <path
                                                                        d="M6 10C7.10457 10 8 9.10457 8 8C8 6.89543 7.10457 6 6 6C4.89543 6 4 6.89543 4 8C4 9.10457 4.89543 10 6 10Z"
                                                                        fill="white"></path>
                                                                    <rect x="15" y="17" width="7" height="0.999999"
                                                                        transform="rotate(-180 15 17)" fill="white">
                                                                    </rect>
                                                                    <rect x="15" y="10" width="7" height="1"
                                                                        transform="rotate(90 15 10)" fill="white"></rect>
                                                                </svg>
                                                            </we-button>
                                                        </span>
                                                    </div>
                                                    <div class="mx-1 o_custom_gradient_scale">
                                                        <div class="w-100"></div>
                                                    </div>
                                                    <div class="w-100 o_slider_multi" role="group"></div>
                                                    <we-button
                                                        class="o_remove_color fa fa-fw fa-trash o_we_link o_we_hover_danger d-none"
                                                        title="Remove Selected Color"
                                                        aria-label="Remove Selected Color"></we-button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
</div>
<div id="font-size" class="btn-group dropdown"><button type="button" class="btn dropdown-toggle"
                                                    data-bs-toggle="dropdown" tabindex="-1" data-bs-original-title="Font Size" aria-expanded="false">
                                                    <div id="font-size-input-container"><input type="text" id="fontSizeCurrentValue"
                                                            title="Font size" value="13" readonly="" class="cursor-pointer"></div>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item d-flex justify-content-between align-items-center"
                                                            data-dynamic-value="display-1-font-size" data-apply-class="display-1-fs" href="#"
                                                            data-value="80">80<span
                                                                class="d-none o_we_font_size_badge badge rounded-pill text-bg-dark ms-4">Display
                                                                1</span></a></li>
                                                    <li><a class="dropdown-item d-flex justify-content-between align-items-center"
                                                            data-dynamic-value="display-2-font-size" data-apply-class="display-2-fs" href="#"
                                                            data-value="72">72<span
                                                                class="d-none o_we_font_size_badge badge rounded-pill text-bg-dark ms-4">Display
                                                                2</span></a></li>
                                                    <li><a class="dropdown-item d-flex justify-content-between align-items-center"
                                                            data-dynamic-value="display-3-font-size" data-apply-class="display-3-fs" href="#"
                                                            data-value="64">64<span
                                                                class="d-none o_we_font_size_badge badge rounded-pill text-bg-dark ms-4">Display
                                                                3</span></a></li>
                                                    <li><a class="dropdown-item d-flex justify-content-between align-items-center"
                                                            data-dynamic-value="display-4-font-size" data-apply-class="display-4-fs" href="#"
                                                            data-value="56">56<span
                                                                class="d-none o_we_font_size_badge badge rounded-pill text-bg-dark ms-4">Display
                                                                4</span></a></li>
                                                    <li><a class="dropdown-item d-flex justify-content-between align-items-center"
                                                            data-dynamic-value="h1-font-size" data-apply-class="h1-fs" href="#"
                                                            data-value="34">34<span
                                                                class="d-none o_we_font_size_badge badge rounded-pill text-bg-dark ms-4">Heading
                                                                1</span></a></li>
                                                    <li><a class="dropdown-item d-flex justify-content-between align-items-center"
                                                            data-dynamic-value="h2-font-size" data-apply-class="h2-fs" href="#"
                                                            data-value="21">21<span
                                                                class="d-none o_we_font_size_badge badge rounded-pill text-bg-dark ms-4">Heading
                                                                2</span></a></li>
                                                    <li><a class="dropdown-item d-flex justify-content-between align-items-center"
                                                            data-dynamic-value="h3-font-size" data-apply-class="h3-fs" href="#"
                                                            data-value="18">18<span
                                                                class="d-none o_we_font_size_badge badge rounded-pill text-bg-dark ms-4">Heading
                                                                3</span></a></li>
                                                    <li><a class="dropdown-item d-flex justify-content-between align-items-center"
                                                            data-dynamic-value="h4-font-size" data-apply-class="h4-fs" href="#"
                                                            data-value="17">17<span
                                                                class="d-none o_we_font_size_badge badge rounded-pill text-bg-dark ms-4">Heading
                                                                4</span></a></li>
                                                    <li><a class="dropdown-item d-flex justify-content-between align-items-center"
                                                            data-dynamic-value="h5-font-size" data-apply-class="h5-fs" href="#"
                                                            data-value="15">15<span
                                                                class="d-none o_we_font_size_badge badge rounded-pill text-bg-dark ms-4">Heading
                                                                5</span></a></li>
                                                    <li class="d-none"><a class="dropdown-item d-flex justify-content-between align-items-center"
                                                            data-dynamic-value="h6-font-size" data-apply-class="h6-fs" href="#"
                                                            data-value="14">14<span
                                                                class="d-none o_we_font_size_badge badge rounded-pill text-bg-dark ms-4">Heading
                                                                6</span></a></li>
                                                    <li><a class="dropdown-item d-flex justify-content-between align-items-center"
                                                            data-dynamic-value="font-size-base" data-apply-class="base-fs" href="#"
                                                            data-value="14">14<span
                                                                class="d-none o_we_font_size_badge badge rounded-pill text-bg-dark ms-4">Normal</span></a>
                                                    </li>
                                                    <li><a class="dropdown-item d-flex justify-content-between align-items-center"
                                                            data-dynamic-value="small-font-size" data-apply-class="o_small-fs" href="#"
                                                            data-value="13">13<span
                                                                class="d-none o_we_font_size_badge badge rounded-pill text-bg-dark ms-4">Small</span></a>
                                                    </li>
                                                </ul>
</div>
<div id="list" class="btn-group">
                                                <div id="unordered" data-call="toggleList" data-arg1="UL" title="Toggle unordered list"
                                                    class="oe-toggle-unordered fa fa-list-ul fa-fw btn"></div>
                                                <div id="ordered" data-call="toggleList" data-arg1="OL" title="Toggle ordered list"
                                                    class="oe-toggle-ordered fa fa-list-ol fa-fw btn"></div>
                                                <div id="checklist" data-call="toggleList" data-arg1="CL" title="Toggle checklist"
                                                    class="oe-toggle-checklist btn fa fa-fw">
                                                    <div class="small">
                                                        <div class="fa fa-square-o d-block small"></div>
                                                        <div class="fa fa-check-square d-block small"></div>
                                                    </div>
                                                </div>
</div>
<div id="image-preview" class="btn-group d-none">
                                                <div id="image-fullscreen" title="Full screen" class="fa fa-search-plus btn editor-ignore"></div>
</div>
<div id="link" class="btn-group">
                                                <div id="unlink" data-call="unlink" title="Remove link" class="fa fa-unlink fa-fw btn order-1">
                                                </div>
                                                <div id="create-link" title="Insert or edit link" class="fa fa-link fa-fw btn editor-ignore"></div><a
                                                    id="media-description" href="#" title="Edit media description"
                                                    class="btn editor-ignore d-none">Description</a>
</div>
<div id="chatgpt" class="btn-group">
                                                <div id="open-chatgpt" title="Generate or transform content with AI" class="btn editor-ignore"><span
                                                        class="fa fa-magic fa-fw"></span></div>
</div>
<div id="translate" class="btn-group dropdown">
                                                <div class="btn lang" title="Translate with AI" data-value="English (IN)"> Translate </div>
</div>
<div id="image-shape" class="btn-group d-none">
                                                <div id="rounded" title="Shape: Rounded" class="fa fa-square fa-fw btn editor-ignore"></div>
                                                <div id="rounded-circle" title="Shape: Circle" class="fa fa-circle-o fa-fw btn editor-ignore"></div>
                                                <div id="shadow" title="Shadow" class="fa fa-sun-o fa-fw btn editor-ignore"></div>
                                                <div id="img-thumbnail" title="Shape: Thumbnail" class="fa fa-picture-o fa-fw btn editor-ignore">
                                                </div>
</div>
<div id="image-padding" class="btn-group dropdown d-none"><button type="button" class="btn dropdown-toggle"
                                                    data-bs-toggle="dropdown" tabindex="-1" aria-expanded="false"><span class="fa fa-plus-square-o"
                                                        title="Image padding"></span></button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item editor-ignore" href="#" data-class="">None</a></li>
                                                    <li><a class="dropdown-item editor-ignore" href="#" data-class="padding-small">Small</a>
                                                    </li>
                                                    <li><a class="dropdown-item editor-ignore" href="#" data-class="padding-medium">Medium</a>
                                                    </li>
                                                    <li><a class="dropdown-item editor-ignore" href="#" data-class="padding-large">Large</a>
                                                    </li>
                                                    <li><a class="dropdown-item editor-ignore" href="#" data-class="padding-xl">XL</a></li>
                                                </ul>
</div>
<div id="image-width" class="btn-group d-none">
                                                <div title="Resize Default" class="btn editor-ignore">Default</div>
                                                <div id="100%" title="Resize Full" class="btn editor-ignore">100%</div>
                                                <div id="50%" title="Resize Half" class="btn editor-ignore">50%</div>
                                                <div id="25%" title="Resize Quarter" class="btn editor-ignore">25%</div>
</div>
<div id="image-edit" class="btn-group d-none">
                                                <div id="image-crop" title="Crop Image" class="btn fa fa-crop editor-ignore d-none"></div>
                                                <div id="image-transform" class="btn editor-ignore fa fa-object-ungroup d-none"
                                                    title="Transform the picture (click twice to reset transformation)"></div><span
                                                    class="oe-toolbar-separator d-flex"></span>
                                                <div id="media-replace" title="Replace media" class="btn o_we_bg_success editor-ignore d-none">Replace
                                                </div><span class="oe-toolbar-separator d-flex"></span>
                                                <div id="image-delete" class="btn btn-link text-danger editor-ignore fa fa-trash" title="Remove (DELETE)">
                                                </div>
</div>
<div id="fa-resize" class="btn-group only_fa d-none">
                                                <div class="editor-ignore btn" title="Icon size 1x" data-value="1">1x</div>
                                                <div class="editor-ignore btn" title="Icon size 2x" data-value="2">2x</div>
                                                <div class="editor-ignore btn" title="Icon size 3x" data-value="3">3x</div>
                                                <div class="editor-ignore btn" title="Icon size 4x" data-value="4">4x</div>
                                                <div class="editor-ignore btn" title="Icon size 5x" data-value="5">5x</div>
</div>
<div class="btn-group only_fa d-none">
                                                <div id="fa-spin" title="Toggle icon spin" class="editor-ignore btn fa fa-play"></div>
</div>
</div>


@push('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>



<script>
        $(document).ready(function () {
        var selectedSalesTaxIds = []; // To store selected sales tax IDs

        // When a tax item is clicked
        $('.tax-option').click(function (event) {
            event.preventDefault(); // Prevent the default behavior of the link

            var taxId = $(this).data('id'); // Get the tax ID from the clicked option
            if (!selectedSalesTaxIds.includes(taxId)) { // Ensure no duplicate entries
                selectedSalesTaxIds.push(taxId); // Store the selected tax ID
            }

            console.log('Selected tax ID: ' + taxId); // Optional: log for debugging
        });

        // Show/Hide new category input field based on dropdown selection
        $('#category_select').on('change', function () {
            if ($(this).val() === 'new_category') {
                $('#new_category_input').show();
            } else {
                $('#new_category_input').hide();
            }
        });

        $('#main_save_btn').click(function (event) {

            event.preventDefault(); // Prevent default form submission

            var product_id = $('#product_id').val();
            var name_0 = $('#name_0').val();
            var fileInput = document.getElementById('file-input');
            var imageFile = fileInput.files[0];
            var product_type = $('input[name="product_type"]:checked').val(); // Properly capture the selected product type
            var track_inventory_0 = $('#is_storable_input').val();
            var create_on_order_0 = $('.create_order_input_value').val();
            var invoicing_policy_0 = $('#invoice_policy_output').val();
            var invoicing_policy_service = $('#invoice_service_select').val();
            var plan_servies_0 = $('#is_plan_input').val();
            var sales_price_0 = $('#list_price_0').val();
            var cost_price_0 = $('#standard_price_0').val();
            var reference_0 = $('#default_code_0').val();
            var barcode_0 = $('#barcode_0').val();
            var hsn_sac_code_0 = $('#hsn_code').val();
            var internal_note_0 = $('#internal_0').val();
            var optional_product_0 = $('#optional_product_ids_0').val();
            var sales_des_0 = $('#description_sale_0').val();
            var manufacture_0 = $('#checkbox-comp-8').val();
            var weight_0 = $('#weight_0').val();
            var volume_0 = $('#volume_0').val();
            var customer_lead_time_0 = $('#sale_delay_0').val();
            var res_des_0 = $('#description_pickingin_0').val();
            var del_des_0 = $('#description_pickingout_0').val();
            var income_ac_0 = $('#property_account_income_id_0').val();
            var expense_ac_0 = $('#property_account_expense_id_0').val();
            var tag_ids_1 = $('#tag_ids_1').val();
            var category_id = $('#category_select').val();
            if (category_id === 'new_category') {
                category_id = $('#new_category_input').val();
            }

            // Assign purchase_taxes and sales_tax_id from selectedSalesTaxIds
            var purchase_taxes = selectedSalesTaxIds;
            var sales_tax_id = selectedSalesTaxIds; // Use the same array for sales taxes if necessary

            // Check if 'name_0' is empty, and validate
            if (!name_0) {
                toastr.error('Name is required');
                $('#name_0').css({
                    'border-color': 'red',
                    'background-color': '#ff99993d'
                });
                return; // Stop form submission
            }

            // Create a FormData object to submit the form via AJAX
            var formData = new FormData();
            formData.append('product_id', product_id);
            formData.append('name_0', name_0);
            if (imageFile) {
                formData.append('image', imageFile); // Append the image file
            }
            formData.append('product_type', product_type); // Capture the selected product type
            formData.append('track_inventory_0', track_inventory_0);
            formData.append('create_on_order_0', create_on_order_0);
            formData.append('invoicing_policy_0', invoicing_policy_0);
            formData.append('invoicing_policy_service', invoicing_policy_service);
            formData.append('plan_servies_0', plan_servies_0);
            formData.append('sales_price_0', sales_price_0);
            formData.append('cost_price_0', cost_price_0);
            formData.append('reference_0', reference_0);
            formData.append('barcode_0', barcode_0);
            formData.append('hsn_sac_code_0', hsn_sac_code_0);
            formData.append('internal_note_0', internal_note_0);
            formData.append('optional_product_0', optional_product_0);
            formData.append('sales_des_0', sales_des_0);
            formData.append('manufacture_0', manufacture_0);
            formData.append('weight_0', weight_0);
            formData.append('volume_0', volume_0);
            formData.append('customer_lead_time_0', customer_lead_time_0);
            formData.append('res_des_0', res_des_0);
            formData.append('del_des_0', del_des_0);
            formData.append('income_ac_0', income_ac_0);
            formData.append('expense_ac_0', expense_ac_0);
            formData.append('tag_ids_1', tag_ids_1);
            formData.append('category_id', category_id);
            formData.append('purchase_taxes', purchase_taxes);
            formData.append('sales_tax_id', sales_tax_id);
            formData.append('_token', '{{ csrf_token() }}'); // Ensure CSRF token is included

            // AJAX request to submit the form data to the server
            $.ajax({
                url: '{{ route('product.store') }}',
                type: 'POST',
                data: formData,
                processData: false, // Prevent jQuery from transforming the data into a query string
                contentType: false, // Prevent jQuery from setting content type
                success: function (response) {
                    toastr.success(response.message); // Notify success
                    setTimeout(function () {
                        window.location.href = "{{ route('product.index') }}"; // Redirect after successful submission
                    }, 2000);
                },
                error: function (xhr, status, error) {
                    toastr.error('Something went wrong!'); // Notify error
                }
            });
        });
    });

</script>

<!-- Sales Tax Total -->
<script>
            $(document).ready(function() {
        let selectedTaxes = [];

        $('.tax-option').on('click', function(e) {
            e.preventDefault();
            let taxId = $(this).data('id');
            let taxValue = parseFloat($(this).data('tax'));

            if (!selectedTaxes.includes(taxId)) {
                selectedTaxes.push(taxId);
                $('#tax_list').append(`<div class="tax-selected" data-id="${taxId}">Tax: ₹${taxValue.toFixed(2)}<span class="remove-tax" onclick="removeTax('${taxId}')"> ×</span></div>`);
                updateTotalWithTax();
            }
        });

        $('#addNewTax').on('click', function() {
            $('#new_sales_tax_input').toggle();
            $('#new_sales_tax_input').focus();
        });

        $('#new_sales_tax_input').on('input', function() {
            let newTaxValue = parseFloat($(this).val()) || 0;

            if (newTaxValue < 0 || newTaxValue > 100) {
                alert("Please enter a valid tax percentage (0-100).");
                return;
            }

            updateTotalWithTax();
        });

        window.removeTax = function(taxId) {
            selectedTaxes = selectedTaxes.filter(id => id !== taxId);
            $(`.tax-selected[data-id='${taxId}']`).remove();
            updateTotalWithTax();
        };
    });

    function calculateTotalTax() {
        let totalTax = 0;

        $('.tax-selected').each(function() {
            let taxValue = parseFloat($(this).text().replace('Tax: ₹', '').replace(' ×', ''));
            totalTax += taxValue;
        });

        let newTaxValue = parseFloat($('#new_sales_tax_input').val()) || 0;
        totalTax += newTaxValue;

        return totalTax;
    }

    function updateTotalWithTax() {
        let salesPrice = parseFloat($('#list_price_0').val()) || 0;
        let totalTax = calculateTotalTax();
        let totalAmountWithTax = salesPrice + totalTax;

        $('#total_sales_tax').text(`Total Sales Taxes: ₹${totalTax.toFixed(2)}; Total Amount with Tax: ₹${totalAmountWithTax.toFixed(2)}`);
    }

</script>

<!-- Purchase Tax Total -->
<script>

    $(document).ready(function() {
        let selectedPurchaseTaxes = [];

        $('.purchase-tax-option').on('click', function(e) {
            e.preventDefault();
            let taxId = $(this).data('id');
            let taxValue = parseFloat($(this).data('tax'));

            if (!selectedPurchaseTaxes.includes(taxId)) {
                selectedPurchaseTaxes.push(taxId);
                $('#purchase_tax_list').append(`<div class="tax-selected" data-id="${taxId}">Tax: ₹${taxValue.toFixed(2)}<span class="remove-tax" onclick="removePurchaseTax('${taxId}')"> ×</span></div>`);
                updateTotalPurchaseTax();
            }
        });

        $('#addNewPurchaseTax').on('click', function() {
            $('#new_purchase_tax_input').toggle();
            $('#new_purchase_tax_input').focus();
        });

        $('#new_purchase_tax_input').on('input', function() {
            let newTaxValue = parseFloat($(this).val()) || 0;

            if (newTaxValue < 0 || newTaxValue > 100) {
                alert("Please enter a valid tax percentage (0-100).");
                return;
            }

            updateTotalPurchaseTax();
        });

        window.removePurchaseTax = function(taxId) {
            selectedPurchaseTaxes = selectedPurchaseTaxes.filter(id => id !== taxId);
            $(`.tax-selected[data-id='${taxId}']`).remove();
            updateTotalPurchaseTax();
        };
    });

    function calculateTotalPurchaseTax() {
        let totalTax = 0;

        $('.tax-selected').each(function() {
            let taxValue = parseFloat($(this).text().replace('Tax: ₹', '').replace(' ×', ''));
            totalTax += taxValue;
        });

        let newTaxValue = parseFloat($('#new_purchase_tax_input').val()) || 0;
        totalTax += newTaxValue;

        return totalTax;
    }

    function updateTotalPurchaseTax() {
        let totalTax = calculateTotalPurchaseTax();
        $('#total_purchase_tax').text(`Total Purchase Taxes: ₹${totalTax.toFixed(2)}`);
    }

</script>

<!-- Dropdown Change Script -->
<script>
    $(document).ready(function () {
    // Handle dropdown change for create order input
    $('#create_order_input').on('change', function () {
        var selectedValue = $(this).val();
        $('.task_input, .Project_Template_input').attr("style", "display:none !important");

        if (selectedValue === '"task_00"') {
            $('.task_input').show();
        } else if (selectedValue === '"task_and_project"') {
            $('.Project_Template_input').show();
        } else if (selectedValue === '"project_00"') {
            $('.Project_Template_input').show();
        }
    });
 });

</script>

<!-- Radio Button Change Script -->
<script> 
    $(document).ready(function () {
    // Default state for radio button
    $("#radio_field_0_goods").prop("checked", true);
    $(".is_storable_input, .invoice_policy_input, .product_tooltip_input").show();
    $(".create_order_input, .invoice_policy_output, .is_plan_input").attr("style", "display:none !important");

    // Radio button change for services
    $("#radio_field_0_service").change(function () {
        $(".is_storable_input, .invoice_policy_input, .product_tooltip_input").attr("style", "display:none !important");
        $(".create_order_input, .invoice_policy_output, .is_plan_input").show();
    });

    // Radio button change for consumables
    $("#radio_field_0_goods").change(function () {
        $(".is_storable_input, .invoice_policy_input, .product_tooltip_input").show();
        $(".create_order_input, .invoice_policy_output, .is_plan_input").attr("style", "display:none !important");
    });
 });   
</script>

<!-- Checkbox and Section Toggling Script -->
<script>
    $(document).ready(function () {

    // Default state for radio button
    $("#purchase_ok").prop("checked", true);
    $(".purchas_taxes_input").show();

    // Handle checkbox change for purchase taxes
    $("#purchase_ok").change(function () {
            if (this.checked) {
                $(".purchas_taxes_input").show();
            } else {
                $(".purchas_taxes_input").attr("style", "display:none !important");
            }
        });

    // Function to toggle sales section visibility
    function toggleSalesSection() {
        $('#sales, #is_storable_input, #accounting_00').toggle($('#sale_ok_0').is(':checked'));
    }

    // Initial check and bind event for sales checkbox
    toggleSalesSection();
    $('#sale_ok_0').change(toggleSalesSection);
 });

    
</script>

<!-- Image upload and Store image -->
<script>
    const fileInput = document.getElementById('file-input');
    const imagePreview = document.getElementById('image_preview');
    const removeImageButton = document.getElementById('remove_image_button');

    fileInput.addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(event) {
                imagePreview.src = event.target.result;
                removeImageButton.style.display = 'block'; // Show remove button
            };
            reader.readAsDataURL(file);
        }
    });

    removeImageButton.addEventListener('click', function() {
        imagePreview.src = '/web/static/img/placeholder.png'; // Reset to placeholder
        fileInput.value = ''; // Clear the input
        this.style.display = 'none'; // Hide remove button
    });
</script>

<!-- Tag Selection Script -->
<script>
    $(document).ready(function () {
    const selectTag = $('#tag_ids_1');

    function formatTag(tag) {
        if (!tag.id) {
            return tag.text;
        }
        var color = $(tag.element).data('color');
        var $tag = $('<span>').text(tag.text);

        if (color) {
            $tag.css('background-color', color);
            $tag.css('color', '#fff');
            $tag.css('padding', '2px 12px');
            $tag.css('border-radius', '23px');
        }

        return $tag;
    }

    // Initialize select2 with custom template
    selectTag.select2({
        placeholder: "Start typing...",
        templateResult: formatTag,
        templateSelection: formatTag,
        width: 'resolve',
        allowClear: true
    });

    // On selection, hide dropdown and show selected tags in the placeholder area
    selectTag.on('select2:select', function (e) {
        const selectedTag = $(this).val();

        // Hide the dropdown once a selection is made
        if (selectedTag.length > 0) {
            selectTag.select2('close');
        }
    });

    // Handle focus and typing behavior
    selectTag.on('select2:open', function () {
        // Hide the placeholder when dropdown is open
        const placeholder = $(this).data('select2').$dropdown.find('.select2-search__field');
        placeholder.attr('placeholder', '');  // Clear placeholder when typing
    });

    // On unselect, check if no tags are selected, then show placeholder
    selectTag.on('select2:unselect', function () {
        if (!selectTag.val().length) {
            selectTag.select2('open');
        }
    });
});
          
       

</script>
@endpush
@endsection
