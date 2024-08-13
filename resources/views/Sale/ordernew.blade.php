@extends('layout.header')
@section('content')
@section('head')
    @vite(['resources/css/salesadd.css'])
@endsection
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
    <li class="dropdown">
        <a href="{{ url('lead') }}">Leads</a>

    </li>
    <li class="dropdown">
        <a href="#">Reporting</a>
        <div class="dropdown-content">
            <!-- Dropdown content for Reporting -->
            <a href="{{ route('crm.forecasting') }}">Forecast</a>
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
@endsection
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>





<div class="o_action_manager">
    <div class="o_xxl_form_view h-100 o_form_view o_sale_order o_view_controller o_action">
        <div class="o_form_view_container">
            <div class="o_content">
                <div class="o_form_renderer o_form_editable d-flex d-print-block flex-nowrap h-100 o_form_dirty">
                    <div class="o_form_sheet_bg">
                        <div
                            class="o_form_statusbar position-relative d-flex justify-content-between mb-0 mb-md-2 pb-2 pb-md-0">
                            <div
                                class="o_statusbar_buttons d-flex align-items-center align-content-around flex-wrap gap-1">
                                <button data-hotkey="g" invisible="state != 'draft'" id="send_by_email_primary"
                                    class="btn btn-primary" name="action_quotation_send" type="object"><span>Send by
                                        Email</span></button><button data-hotkey="q" invisible="state != 'draft'"
                                    class="btn btn-secondary" name="action_confirm"
                                    type="object"><span>Confirm</span></button><button class="btn btn-secondary"
                                    name="action_preview_sale_order" type="object"><span>Preview</span></button>
                            </div>
                            <div name="state" class="o_field_widget o_readonly_modifier o_field_statusbar">
                                <div class="o_statusbar_status" role="radiogroup"><button type="button"
                                        class="btn btn-secondary dropdown-toggle o_arrow_button o_first o-dropdown dropdown d-none"
                                        disabled="" aria-expanded="false"> ... </button><button type="button"
                                        class="btn btn-secondary o_arrow_button o_first" role="radio" disabled=""
                                        aria-label="Not active state" aria-checked="false" data-value="sale">Sales
                                        Order</button><button type="button" class="btn btn-secondary o_arrow_button"
                                        role="radio" disabled="" aria-label="Not active state" aria-checked="false"
                                        data-value="sent">Quotation Sent</button><button type="button"
                                        class="btn btn-secondary o_arrow_button o_arrow_button_current o_last"
                                        role="radio" disabled="" aria-label="Current state" aria-checked="true"
                                        aria-current="step" data-value="draft">Quotation</button><button type="button"
                                        class="btn btn-secondary dropdown-toggle o_arrow_button o_last o-dropdown dropdown d-none"
                                        disabled="" aria-expanded="false"> ... </button><button type="button"
                                        class="btn btn-secondary dropdown-toggle o-dropdown dropdown d-none"
                                        disabled="" aria-expanded="false">Quotation</button></div>
                            </div>
                        </div>
                        <div class="o_form_sheet position-relative">
                            <div class="oe_title">
                                <h1>
                                    <div name="name"
                                        class="o_field_widget o_readonly_modifier o_required_modifier o_field_char">
                                        <span>New</span>
                                    </div>
                                </h1>
                            </div>
                            <div class="o_group row align-items-start">
                                <div class="o_inner_group grid col-lg-6">
                                    <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                        <div
                                            class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                            <label class="o_form_label"
                                                for="partner_id_0">Customer</label>
                                        </div>
                                        <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                            style="width: 100%;">
                                            <div name="partner_id"
                                                class="o_field_widget o_required_modifier o_field_res_partner_many2one">
                                                <div class="o_field_many2one_selection">
                                                    <div class="o_input_dropdown">
                                                        <div class="o-autocomplete dropdown"><input type="text"
                                                                class="o-autocomplete--input o_input"
                                                                autocomplete="off" role="combobox"
                                                                aria-autocomplete="list" aria-haspopup="listbox"
                                                                id="partner_id_0"
                                                                placeholder="Type to find a customer..."
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
                                            <label class="o_form_label" for="l10n_in_gst_treatment_0">GST
                                                Treatment</label>
                                        </div>
                                        <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                            style="width: 100%;">
                                            <div name="l10n_in_gst_treatment"
                                                class="o_field_widget o_required_modifier o_field_selection">
                                                <select class="o_input pe-3" id="l10n_in_gst_treatment_0">
                                                    <option value="false" style="display:none"></option>
                                                    <option value="&quot;regular&quot;">Registered Business -
                                                        Regular</option>
                                                    <option value="&quot;composition&quot;">Registered Business -
                                                        Composition</option>
                                                    <option value="&quot;unregistered&quot;">Unregistered Business
                                                    </option>
                                                    <option value="&quot;consumer&quot;">Consumer</option>
                                                    <option value="&quot;overseas&quot;">Overseas</option>
                                                    <option value="&quot;special_economic_zone&quot;">Special
                                                        Economic Zone</option>
                                                    <option value="&quot;deemed_export&quot;">Deemed Export
                                                    </option>
                                                    <option value="&quot;uin_holders&quot;">UIN Holders</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="o_inner_group grid col-lg-6">
                                    <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                        <div
                                            class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                            <label class="o_form_label" for="validity_date_0">Expiration<sup
                                                    class="text-info p-1" data-tooltip-template="web.FieldTooltip"
                                                    data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;Validity of the order, after that you will not able to sign &amp; pay the quotation.&quot;}}"
                                                    data-tooltip-touch-tap-to-show="true">?</sup></label>
                                        </div>
                                        <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                            style="width: 100%;">
                                            <div name="validity_date" class="o_field_widget o_field_date">
                                                <div class="d-flex gap-2 align-items-center"><input type="text"
                                                        class="o_input cursor-pointer" autocomplete="off"
                                                        id="validity_date_0" data-field="validity_date"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                        <div class="o_cell flex-grow-1 flex-sm-grow-0 o_wrap_label w-100 text-break text-900"
                                            style=""><label class="o_form_label" for="plan_id_0">Recurring
                                                Plan</label></div>
                                        <div class="o_cell flex-grow-1 flex-sm-grow-0" style="width: 100%;">
                                            <div name="plan_block" class="o_row">
                                                <div name="plan_id" class="o_field_widget o_field_many2one">
                                                    <div class="o_field_many2one_selection">
                                                        <div class="o_input_dropdown">
                                                            <div class="o-autocomplete dropdown"><input type="text"
                                                                    class="o-autocomplete--input o_input"
                                                                    autocomplete="off" role="combobox"
                                                                    aria-autocomplete="list" aria-haspopup="listbox"
                                                                    id="plan_id_0" placeholder=""
                                                                    aria-expanded="false"></div>
                                                            <span class="o_dropdown_button"></span>
                                                        </div>
                                                    </div>
                                                    <div class="o_field_many2one_extra"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                        <div class="o_cell flex-grow-1 flex-sm-grow-0 o_wrap_label w-100 text-break text-900"
                                            style=""><label class="o_form_label"
                                                for="pricelist_id_0">Pricelist<sup class="text-info p-1"
                                                    data-tooltip-template="web.FieldTooltip"
                                                    data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;If you change the pricelist, only newly added lines will be affected.&quot;}}"
                                                    data-tooltip-touch-tap-to-show="true">?</sup></label></div>
                                        <div class="o_cell flex-grow-1 flex-sm-grow-0" style="width: 100%;">
                                            <div class="o_row">
                                                <div name="pricelist_id" class="o_field_widget o_field_many2one">
                                                    <div class="o_field_many2one_selection">
                                                        <div class="o_input_dropdown">
                                                            <div class="o-autocomplete dropdown"><input type="text"
                                                                    class="o-autocomplete--input o_input"
                                                                    autocomplete="off" role="combobox"
                                                                    aria-autocomplete="list" aria-haspopup="listbox"
                                                                    id="pricelist_id_0" placeholder=""
                                                                    aria-expanded="false"></div>
                                                            <span class="o_dropdown_button"></span>
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
                                            <label class="o_form_label" for="payment_term_id_0">Payment
                                                Terms</label>
                                        </div>
                                        <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                            style="width: 100%;">
                                            <div name="payment_term_id" class="o_field_widget o_field_many2one">
                                                <div class="o_field_many2one_selection">
                                                    <div class="o_input_dropdown">
                                                        <div class="o-autocomplete dropdown"><input type="text"
                                                                class="o-autocomplete--input o_input"
                                                                autocomplete="off" role="combobox"
                                                                aria-autocomplete="list" aria-haspopup="listbox"
                                                                id="payment_term_id_0" placeholder=""
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
                            <div class="o_notebook d-flex w-100 horizontal flex-column">
                                <div class="o_notebook_headers">
                                    <ul class="nav nav-tabs flex-row flex-nowrap">
                                        <li class="nav-item flex-nowrap cursor-pointer">
                                            <a class="nav-link active" href="#order_lines" role="tab"
                                                data-bs-toggle="tab" tabindex="0" name="order_lines">Order
                                                Lines</a>
                                        </li>
                                        <li class="nav-item flex-nowrap cursor-pointer">
                                            <a class="nav-link" href="#optional_products" role="tab"
                                                data-bs-toggle="tab" tabindex="0" name="optional_products">Optional
                                                Products</a>
                                        </li>
                                        <li class="nav-item flex-nowrap cursor-pointer">
                                            <a class="nav-link" href="#other_information" role="tab"
                                                data-bs-toggle="tab" tabindex="0" name="other_information">Other
                                                Info</a>
                                        </li>
                                        <li class="nav-item flex-nowrap cursor-pointer">
                                            <a class="nav-link" href="#notes" role="tab" data-bs-toggle="tab"
                                                tabindex="0" name="notes">Notes</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-content">
                                    <div id="order_lines" class="tab-pane fade show active">
                                        <div class="o_list_renderer o_renderer table-responsive" tabindex="-1">
                                            <table
                                                class="o_section_and_note_list_view o_list_table table table-sm table-hover position-relative mb-0 o_list_table_ungrouped table-striped"
                                                style="table-layout: fixed;">
                                                <thead>
                                                    <tr>
                                                        <th data-tooltip-delay="1000" tabindex="-1"
                                                            data-name="sequence"
                                                            class="align-middle o_column_sortable position-relative cursor-pointer o_list_number_th o_handle_cell opacity-trigger-hover w-print-auto"
                                                            data-tooltip-template="web.ListHeaderTooltip"
                                                            data-tooltip-info="{&quot;viewMode&quot;:&quot;list&quot;,&quot;resModel&quot;:&quot;sale.order.line&quot;,&quot;debug&quot;:false,&quot;field&quot;:{&quot;name&quot;:&quot;sequence&quot;,&quot;label&quot;:&quot;Sequence&quot;,&quot;type&quot;:&quot;integer&quot;,&quot;widget&quot;:&quot;handle&quot;,&quot;widgetDescription&quot;:&quot;Handle&quot;,&quot;context&quot;:&quot;{}&quot;,&quot;invisible&quot;:null,&quot;column_invisible&quot;:null,&quot;readonly&quot;:null,&quot;required&quot;:null,&quot;changeDefault&quot;:false}}"
                                                            style="width: 29px;"></th>
                                                        <th data-tooltip-delay="1000" tabindex="-1"
                                                            data-name="product_template_id"
                                                            class="align-middle cursor-default o_sol_product_many2one_cell opacity-trigger-hover w-print-auto"
                                                            data-tooltip-template="web.ListHeaderTooltip"
                                                            data-tooltip-info="{&quot;viewMode&quot;:&quot;list&quot;,&quot;resModel&quot;:&quot;sale.order.line&quot;,&quot;debug&quot;:false,&quot;field&quot;:{&quot;name&quot;:&quot;product_template_id&quot;,&quot;label&quot;:&quot;Product Template&quot;,&quot;type&quot;:&quot;many2one&quot;,&quot;widget&quot;:&quot;sol_product_many2one&quot;,&quot;widgetDescription&quot;:&quot;Many2one&quot;,&quot;context&quot;:&quot;{                                         'partner_id': parent.partner_id,                                         'quantity': product_uom_qty,                                         'pricelist': parent.pricelist_id,                                         'uom':product_uom,                                         'company_id': parent.company_id,                                         'default_list_price': price_unit,                                         'default_description_sale': name                                     }&quot;,&quot;domain&quot;:&quot;[('sale_ok', '=', True)]&quot;,&quot;invisible&quot;:null,&quot;column_invisible&quot;:null,&quot;readonly&quot;:&quot;not product_updatable&quot;,&quot;required&quot;:&quot;not display_type and not is_downpayment&quot;,&quot;changeDefault&quot;:false,&quot;relation&quot;:&quot;product.template&quot;}}"
                                                            style="width: 144px;">
                                                            <div class="d-flex"><span
                                                                    class="d-block min-w-0 text-truncate flex-grow-1">Product</span><i
                                                                    class="d-none fa-angle-down opacity-0 opacity-75-hover"></i>
                                                            </div><span
                                                                class="o_resize position-absolute top-0 end-0 bottom-0 ps-1 bg-black-25 opacity-0 opacity-50-hover z-1"></span>
                                                        </th>
                                                        <th data-tooltip-delay="1000" tabindex="-1" data-name="name"
                                                            class="align-middle o_column_sortable position-relative cursor-pointer o_section_and_note_text_cell opacity-trigger-hover w-print-auto"
                                                            data-tooltip-template="web.ListHeaderTooltip"
                                                            data-tooltip-info="{&quot;viewMode&quot;:&quot;list&quot;,&quot;resModel&quot;:&quot;sale.order.line&quot;,&quot;debug&quot;:false,&quot;field&quot;:{&quot;name&quot;:&quot;name&quot;,&quot;label&quot;:&quot;Description&quot;,&quot;type&quot;:&quot;text&quot;,&quot;widget&quot;:&quot;section_and_note_text&quot;,&quot;context&quot;:&quot;{}&quot;,&quot;invisible&quot;:null,&quot;column_invisible&quot;:null,&quot;readonly&quot;:null,&quot;required&quot;:&quot;True&quot;,&quot;changeDefault&quot;:false}}"
                                                            style="width: 144px;">
                                                            <div class="d-flex"><span
                                                                    class="d-block min-w-0 text-truncate flex-grow-1">Description</span><i
                                                                    class="fa fa-lg fa-angle-down opacity-0 opacity-75-hover"></i>
                                                            </div><span
                                                                class="o_resize position-absolute top-0 end-0 bottom-0 ps-1 bg-black-25 opacity-0 opacity-50-hover z-1"></span>
                                                        </th>
                                                        <th data-tooltip-delay="1000" tabindex="-1"
                                                            data-name="product_uom_qty"
                                                            class="align-middle o_column_sortable position-relative cursor-pointer o_list_number_th opacity-trigger-hover w-print-auto"
                                                            data-tooltip-template="web.ListHeaderTooltip"
                                                            data-tooltip-info="{&quot;viewMode&quot;:&quot;list&quot;,&quot;resModel&quot;:&quot;sale.order.line&quot;,&quot;debug&quot;:false,&quot;field&quot;:{&quot;name&quot;:&quot;product_uom_qty&quot;,&quot;label&quot;:&quot;Quantity&quot;,&quot;type&quot;:&quot;float&quot;,&quot;widget&quot;:null,&quot;context&quot;:&quot;{                                         'partner_id': parent.partner_id,                                         'quantity': product_uom_qty,                                         'pricelist': parent.pricelist_id,                                         'uom': product_uom,                                         'company_id': parent.company_id                                     }&quot;,&quot;invisible&quot;:null,&quot;column_invisible&quot;:null,&quot;readonly&quot;:&quot;is_downpayment&quot;,&quot;required&quot;:&quot;True&quot;,&quot;changeDefault&quot;:false}}"
                                                            style="width: 133px;">
                                                            <div class="d-flex flex-row-reverse"><span
                                                                    class="d-block min-w-0 text-truncate flex-grow-1 o_list_number_th">Quantity</span><i
                                                                    class="fa fa-lg fa-angle-down opacity-0 opacity-75-hover"></i>
                                                            </div><span
                                                                class="o_resize position-absolute top-0 end-0 bottom-0 ps-1 bg-black-25 opacity-0 opacity-50-hover z-1"></span>
                                                        </th>
                                                        <th style="width: 29px;"></th>
                                                        <th data-tooltip-delay="1000" tabindex="-1"
                                                            data-name="product_uom"
                                                            class="align-middle o_column_sortable position-relative cursor-pointer opacity-trigger-hover w-print-auto"
                                                            data-tooltip-template="web.ListHeaderTooltip"
                                                            data-tooltip-info="{&quot;viewMode&quot;:&quot;list&quot;,&quot;resModel&quot;:&quot;sale.order.line&quot;,&quot;debug&quot;:false,&quot;field&quot;:{&quot;name&quot;:&quot;product_uom&quot;,&quot;label&quot;:&quot;Unit of Measure&quot;,&quot;type&quot;:&quot;many2one&quot;,&quot;widget&quot;:null,&quot;context&quot;:&quot;{'company_id': parent.company_id}&quot;,&quot;domain&quot;:&quot;[('category_id', '=', product_uom_category_id)]&quot;,&quot;invisible&quot;:null,&quot;column_invisible&quot;:null,&quot;readonly&quot;:&quot;product_uom_readonly&quot;,&quot;required&quot;:&quot;not display_type and not is_downpayment&quot;,&quot;changeDefault&quot;:false,&quot;relation&quot;:&quot;uom.uom&quot;}}"
                                                            style="width: 144px;">
                                                            <div class="d-flex"><span
                                                                    class="d-block min-w-0 text-truncate flex-grow-1">UoM</span><i
                                                                    class="fa fa-lg fa-angle-down opacity-0 opacity-75-hover"></i>
                                                            </div><span
                                                                class="o_resize position-absolute top-0 end-0 bottom-0 ps-1 bg-black-25 opacity-0 opacity-50-hover z-1"></span>
                                                        </th>
                                                        <th data-tooltip-delay="1000" tabindex="-1"
                                                            data-name="price_unit"
                                                            class="align-middle o_column_sortable position-relative cursor-pointer o_list_number_th opacity-trigger-hover w-print-auto"
                                                            data-tooltip-template="web.ListHeaderTooltip"
                                                            data-tooltip-info="{&quot;viewMode&quot;:&quot;list&quot;,&quot;resModel&quot;:&quot;sale.order.line&quot;,&quot;debug&quot;:false,&quot;field&quot;:{&quot;name&quot;:&quot;price_unit&quot;,&quot;label&quot;:&quot;Unit Price&quot;,&quot;type&quot;:&quot;float&quot;,&quot;widget&quot;:null,&quot;context&quot;:&quot;{}&quot;,&quot;invisible&quot;:null,&quot;column_invisible&quot;:null,&quot;readonly&quot;:&quot;qty_invoiced > 0&quot;,&quot;required&quot;:&quot;True&quot;,&quot;changeDefault&quot;:false}}"
                                                            style="width: 133px;">
                                                            <div class="d-flex flex-row-reverse"><span
                                                                    class="d-block min-w-0 text-truncate flex-grow-1 o_list_number_th">Unit
                                                                    Price</span><i
                                                                    class="fa fa-lg fa-angle-down opacity-0 opacity-75-hover"></i>
                                                            </div><span
                                                                class="o_resize position-absolute top-0 end-0 bottom-0 ps-1 bg-black-25 opacity-0 opacity-50-hover z-1"></span>
                                                        </th>
                                                        <th data-tooltip-delay="1000" tabindex="-1"
                                                            data-name="tax_id"
                                                            class="align-middle cursor-default o_many2many_tags_cell opacity-trigger-hover w-print-auto"
                                                            data-tooltip-template="web.ListHeaderTooltip"
                                                            data-tooltip-info="{&quot;viewMode&quot;:&quot;list&quot;,&quot;resModel&quot;:&quot;sale.order.line&quot;,&quot;debug&quot;:false,&quot;field&quot;:{&quot;name&quot;:&quot;tax_id&quot;,&quot;label&quot;:&quot;Taxes&quot;,&quot;type&quot;:&quot;many2many&quot;,&quot;widget&quot;:&quot;many2many_tags&quot;,&quot;widgetDescription&quot;:&quot;Tags&quot;,&quot;context&quot;:&quot;{'active_test': True}&quot;,&quot;domain&quot;:&quot;[('type_tax_use', '=', 'sale'), ('company_id', 'parent_of', parent.company_id), ('country_id', '=', parent.tax_country_id)]&quot;,&quot;invisible&quot;:null,&quot;column_invisible&quot;:null,&quot;readonly&quot;:&quot;qty_invoiced > 0 or is_downpayment&quot;,&quot;required&quot;:null,&quot;changeDefault&quot;:false,&quot;relation&quot;:&quot;account.tax&quot;}}"
                                                            style="width: 144px;">
                                                            <div class="d-flex"><span
                                                                    class="d-block min-w-0 text-truncate flex-grow-1">Taxes</span><i
                                                                    class="d-none fa-angle-down opacity-0 opacity-75-hover"></i>
                                                            </div><span
                                                                class="o_resize position-absolute top-0 end-0 bottom-0 ps-1 bg-black-25 opacity-0 opacity-50-hover z-1"></span>
                                                        </th>
                                                        <th data-tooltip-delay="1000" tabindex="-1"
                                                            data-name="discount"
                                                            class="align-middle o_column_sortable position-relative cursor-pointer o_list_number_th opacity-trigger-hover w-print-auto"
                                                            data-tooltip-template="web.ListHeaderTooltip"
                                                            data-tooltip-info="{&quot;viewMode&quot;:&quot;list&quot;,&quot;resModel&quot;:&quot;sale.order.line&quot;,&quot;debug&quot;:false,&quot;field&quot;:{&quot;name&quot;:&quot;discount&quot;,&quot;label&quot;:&quot;Discount (%)&quot;,&quot;type&quot;:&quot;float&quot;,&quot;widget&quot;:null,&quot;context&quot;:&quot;{}&quot;,&quot;invisible&quot;:null,&quot;column_invisible&quot;:null,&quot;readonly&quot;:null,&quot;required&quot;:null,&quot;changeDefault&quot;:false}}"
                                                            style="width: 133px;">
                                                            <div class="d-flex flex-row-reverse"><span
                                                                    class="d-block min-w-0 text-truncate flex-grow-1 o_list_number_th">Disc.%</span><i
                                                                    class="fa fa-lg fa-angle-down opacity-0 opacity-75-hover"></i>
                                                            </div><span
                                                                class="o_resize position-absolute top-0 end-0 bottom-0 ps-1 bg-black-25 opacity-0 opacity-50-hover z-1"></span>
                                                        </th>
                                                        <th data-tooltip-delay="1000" tabindex="-1"
                                                            data-name="price_subtotal"
                                                            class="align-middle o_column_sortable position-relative cursor-pointer o_list_number_th opacity-trigger-hover w-print-auto"
                                                            data-tooltip-template="web.ListHeaderTooltip"
                                                            data-tooltip-info="{&quot;viewMode&quot;:&quot;list&quot;,&quot;resModel&quot;:&quot;sale.order.line&quot;,&quot;debug&quot;:false,&quot;field&quot;:{&quot;name&quot;:&quot;price_subtotal&quot;,&quot;label&quot;:&quot;Subtotal&quot;,&quot;type&quot;:&quot;monetary&quot;,&quot;widget&quot;:null,&quot;context&quot;:&quot;{}&quot;,&quot;invisible&quot;:&quot;is_downpayment&quot;,&quot;column_invisible&quot;:null,&quot;readonly&quot;:&quot;True&quot;,&quot;required&quot;:null,&quot;changeDefault&quot;:false}}"
                                                            style="width: 144px;">
                                                            <div class="d-flex flex-row-reverse"><span
                                                                    class="d-block min-w-0 text-truncate flex-grow-1 o_list_number_th">Tax
                                                                    excl.</span><i
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
                                                                    tabindex="-1" aria-expanded="false"><i
                                                                        class="o_optional_columns_dropdown_toggle oi oi-fw oi-settings-adjust"></i></button>
                                                            </div>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody class="ui-sortable">
                                                    <tr>
                                                        <td></td>
                                                        <td class="o_field_x2many_list_row_add" colspan="10"><a
                                                                href="#" role="button" tabindex="0">Add a
                                                                product</a><a href="#" role="button"
                                                                class="ml16" tabindex="0">Add a section</a><a
                                                                href="#" role="button" class="ml16"
                                                                tabindex="0">Add a note</a><button
                                                                class="btn px-4 btn-link ml16"
                                                                name="action_add_from_catalog" type="object"
                                                                tabindex="0"><span>Catalog</span></button></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="11">&ZeroWidthSpace;</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="11">&ZeroWidthSpace;</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="11">&ZeroWidthSpace;</td>
                                                    </tr>
                                                </tbody>
                                                <tfoot class="o_list_footer cursor-default">
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td class="w-print-auto"></td>
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
                                    <div id="optional_products" class="tab-pane fade">
                                        <div class="o_list_renderer o_renderer table-responsive" tabindex="-1">
                                            <table
                                                class="o_list_table table table-sm table-hover position-relative mb-0 o_list_table_ungrouped table-striped"
                                                style="table-layout: fixed;">
                                                <thead>
                                                    <tr>
                                                        <th data-tooltip-delay="1000" tabindex="-1"
                                                            data-name="sequence"
                                                            class="align-middle o_column_sortable position-relative cursor-pointer o_list_number_th o_handle_cell opacity-trigger-hover w-print-auto"
                                                            data-tooltip-template="web.ListHeaderTooltip"
                                                            data-tooltip-info="{&quot;viewMode&quot;:&quot;list&quot;,&quot;resModel&quot;:&quot;sale.order.option&quot;,&quot;debug&quot;:false,&quot;field&quot;:{&quot;name&quot;:&quot;sequence&quot;,&quot;label&quot;:&quot;Sequence&quot;,&quot;help&quot;:&quot;Gives the sequence order when displaying a list of optional products.&quot;,&quot;type&quot;:&quot;integer&quot;,&quot;widget&quot;:&quot;handle&quot;,&quot;widgetDescription&quot;:&quot;Handle&quot;,&quot;context&quot;:&quot;{}&quot;,&quot;invisible&quot;:null,&quot;column_invisible&quot;:null,&quot;readonly&quot;:null,&quot;required&quot;:null,&quot;changeDefault&quot;:false}}"
                                                            style="width: 29px;"></th>
                                                        <th data-tooltip-delay="1000" tabindex="-1"
                                                            data-name="product_id"
                                                            class="align-middle o_column_sortable position-relative cursor-pointer opacity-trigger-hover w-print-auto"
                                                            data-tooltip-template="web.ListHeaderTooltip"
                                                            data-tooltip-info="{&quot;viewMode&quot;:&quot;list&quot;,&quot;resModel&quot;:&quot;sale.order.option&quot;,&quot;debug&quot;:false,&quot;field&quot;:{&quot;name&quot;:&quot;product_id&quot;,&quot;label&quot;:&quot;Product&quot;,&quot;type&quot;:&quot;many2one&quot;,&quot;widget&quot;:null,&quot;context&quot;:&quot;{}&quot;,&quot;domain&quot;:&quot;\n                    ['|', ('sale_ok', '=', True),\n                          '&amp;', ('rent_ok', '=', True), ('rent_ok', '=', parent.is_rental_order),\n                     '|', ('company_id', '=', False), ('company_id', '=', parent.company_id)]\n                &quot;,&quot;invisible&quot;:null,&quot;column_invisible&quot;:null,&quot;readonly&quot;:null,&quot;required&quot;:&quot;True&quot;,&quot;changeDefault&quot;:false,&quot;relation&quot;:&quot;product.product&quot;}}"
                                                            style="width: 182px;">
                                                            <div class="d-flex"><span
                                                                    class="d-block min-w-0 text-truncate flex-grow-1">Product</span><i
                                                                    class="fa fa-lg fa-angle-down opacity-0 opacity-75-hover"></i>
                                                            </div><span
                                                                class="o_resize position-absolute top-0 end-0 bottom-0 ps-1 bg-black-25 opacity-0 opacity-50-hover z-1"></span>
                                                        </th>
                                                        <th data-tooltip-delay="1000" tabindex="-1" data-name="name"
                                                            class="align-middle o_column_sortable position-relative cursor-pointer opacity-trigger-hover w-print-auto"
                                                            data-tooltip-template="web.ListHeaderTooltip"
                                                            data-tooltip-info="{&quot;viewMode&quot;:&quot;list&quot;,&quot;resModel&quot;:&quot;sale.order.option&quot;,&quot;debug&quot;:false,&quot;field&quot;:{&quot;name&quot;:&quot;name&quot;,&quot;label&quot;:&quot;Description&quot;,&quot;type&quot;:&quot;text&quot;,&quot;widget&quot;:null,&quot;context&quot;:&quot;{}&quot;,&quot;invisible&quot;:null,&quot;column_invisible&quot;:null,&quot;readonly&quot;:null,&quot;required&quot;:&quot;True&quot;,&quot;changeDefault&quot;:false}}"
                                                            style="width: 182px;">
                                                            <div class="d-flex"><span
                                                                    class="d-block min-w-0 text-truncate flex-grow-1">Description</span><i
                                                                    class="fa fa-lg fa-angle-down opacity-0 opacity-75-hover"></i>
                                                            </div><span
                                                                class="o_resize position-absolute top-0 end-0 bottom-0 ps-1 bg-black-25 opacity-0 opacity-50-hover z-1"></span>
                                                        </th>
                                                        <th data-tooltip-delay="1000" tabindex="-1"
                                                            data-name="quantity"
                                                            class="align-middle o_column_sortable position-relative cursor-pointer o_list_number_th opacity-trigger-hover w-print-auto"
                                                            data-tooltip-template="web.ListHeaderTooltip"
                                                            data-tooltip-info="{&quot;viewMode&quot;:&quot;list&quot;,&quot;resModel&quot;:&quot;sale.order.option&quot;,&quot;debug&quot;:false,&quot;field&quot;:{&quot;name&quot;:&quot;quantity&quot;,&quot;label&quot;:&quot;Quantity&quot;,&quot;type&quot;:&quot;float&quot;,&quot;widget&quot;:null,&quot;context&quot;:&quot;{}&quot;,&quot;invisible&quot;:null,&quot;column_invisible&quot;:null,&quot;readonly&quot;:null,&quot;required&quot;:&quot;True&quot;,&quot;changeDefault&quot;:false}}"
                                                            style="width: 145px;">
                                                            <div class="d-flex flex-row-reverse"><span
                                                                    class="d-block min-w-0 text-truncate flex-grow-1 o_list_number_th">Quantity</span><i
                                                                    class="fa fa-lg fa-angle-down opacity-0 opacity-75-hover"></i>
                                                            </div><span
                                                                class="o_resize position-absolute top-0 end-0 bottom-0 ps-1 bg-black-25 opacity-0 opacity-50-hover z-1"></span>
                                                        </th>
                                                        <th data-tooltip-delay="1000" tabindex="-1"
                                                            data-name="uom_id"
                                                            class="align-middle o_column_sortable position-relative cursor-pointer opacity-trigger-hover w-print-auto"
                                                            data-tooltip-template="web.ListHeaderTooltip"
                                                            data-tooltip-info="{&quot;viewMode&quot;:&quot;list&quot;,&quot;resModel&quot;:&quot;sale.order.option&quot;,&quot;debug&quot;:false,&quot;field&quot;:{&quot;name&quot;:&quot;uom_id&quot;,&quot;label&quot;:&quot;Unit of Measure&quot;,&quot;type&quot;:&quot;many2one&quot;,&quot;widget&quot;:null,&quot;context&quot;:&quot;{}&quot;,&quot;domain&quot;:&quot;[('category_id', '=', product_uom_category_id)]&quot;,&quot;invisible&quot;:null,&quot;column_invisible&quot;:null,&quot;readonly&quot;:null,&quot;required&quot;:&quot;True&quot;,&quot;changeDefault&quot;:false,&quot;relation&quot;:&quot;uom.uom&quot;}}"
                                                            style="width: 182px;">
                                                            <div class="d-flex"><span
                                                                    class="d-block min-w-0 text-truncate flex-grow-1">UoM</span><i
                                                                    class="fa fa-lg fa-angle-down opacity-0 opacity-75-hover"></i>
                                                            </div><span
                                                                class="o_resize position-absolute top-0 end-0 bottom-0 ps-1 bg-black-25 opacity-0 opacity-50-hover z-1"></span>
                                                        </th>
                                                        <th data-tooltip-delay="1000" tabindex="-1"
                                                            data-name="price_unit"
                                                            class="align-middle o_column_sortable position-relative cursor-pointer o_list_number_th opacity-trigger-hover w-print-auto"
                                                            data-tooltip-template="web.ListHeaderTooltip"
                                                            data-tooltip-info="{&quot;viewMode&quot;:&quot;list&quot;,&quot;resModel&quot;:&quot;sale.order.option&quot;,&quot;debug&quot;:false,&quot;field&quot;:{&quot;name&quot;:&quot;price_unit&quot;,&quot;label&quot;:&quot;Unit Price&quot;,&quot;type&quot;:&quot;float&quot;,&quot;widget&quot;:null,&quot;context&quot;:&quot;{}&quot;,&quot;invisible&quot;:null,&quot;column_invisible&quot;:null,&quot;readonly&quot;:null,&quot;required&quot;:&quot;True&quot;,&quot;changeDefault&quot;:false}}"
                                                            style="width: 145px;">
                                                            <div class="d-flex flex-row-reverse"><span
                                                                    class="d-block min-w-0 text-truncate flex-grow-1 o_list_number_th">Unit
                                                                    Price</span><i
                                                                    class="fa fa-lg fa-angle-down opacity-0 opacity-75-hover"></i>
                                                            </div><span
                                                                class="o_resize position-absolute top-0 end-0 bottom-0 ps-1 bg-black-25 opacity-0 opacity-50-hover z-1"></span>
                                                        </th>
                                                        <th data-tooltip-delay="1000" tabindex="-1"
                                                            data-name="discount"
                                                            class="align-middle o_column_sortable position-relative cursor-pointer o_list_number_th opacity-trigger-hover w-print-auto"
                                                            data-tooltip-template="web.ListHeaderTooltip"
                                                            data-tooltip-info="{&quot;viewMode&quot;:&quot;list&quot;,&quot;resModel&quot;:&quot;sale.order.option&quot;,&quot;debug&quot;:false,&quot;field&quot;:{&quot;name&quot;:&quot;discount&quot;,&quot;label&quot;:&quot;Discount (%)&quot;,&quot;type&quot;:&quot;float&quot;,&quot;widget&quot;:null,&quot;context&quot;:&quot;{}&quot;,&quot;invisible&quot;:null,&quot;column_invisible&quot;:null,&quot;readonly&quot;:null,&quot;required&quot;:null,&quot;changeDefault&quot;:false}}"
                                                            style="width: 145px;">
                                                            <div class="d-flex flex-row-reverse"><span
                                                                    class="d-block min-w-0 text-truncate flex-grow-1 o_list_number_th">Disc.%</span><i
                                                                    class="fa fa-lg fa-angle-down opacity-0 opacity-75-hover"></i>
                                                            </div><span
                                                                class="o_resize position-absolute top-0 end-0 bottom-0 ps-1 bg-black-25 opacity-0 opacity-50-hover z-1"></span>
                                                        </th>
                                                        <th class="o_list_button w-print-0 p-print-0"
                                                            style="width: 182px;"></th>
                                                        <th class="o_list_controller o_list_actions_header w-print-0 p-print-0 position-sticky end-0"
                                                            style="width: 32px;">
                                                            <div
                                                                class="o_optional_columns_dropdown d-print-none text-center border-top-0">
                                                                <button
                                                                    class="btn p-0 o-dropdown dropdown-toggle dropdown"
                                                                    tabindex="-1" aria-expanded="false"><i
                                                                        class="o_optional_columns_dropdown_toggle oi oi-fw oi-settings-adjust"></i></button>
                                                            </div>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody class="ui-sortable">
                                                    <tr>
                                                        <td></td>
                                                        <td class="o_field_x2many_list_row_add" colspan="8"><a
                                                                href="#" role="button" tabindex="0">Add a
                                                                product</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="9">&ZeroWidthSpace;</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="9">&ZeroWidthSpace;</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="9">&ZeroWidthSpace;</td>
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
                                                        <td class="w-print-auto"></td>
                                                        <td class="w-print-0 p-print-0"></td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                    <div id="other_information" class="tab-pane fade">
                                        <div class="o_notebook_content tab-content">
                                            <div class="tab-pane active fade show">
                                                <div class="o_group row align-items-start">
                                                    <div class="o_inner_group grid col-lg-6">
                                                        <div class="g-col-sm-2">
                                                            <div
                                                                class="o_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">
                                                                Sales</div>
                                                        </div>
                                                        <div
                                                            class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                            <div
                                                                class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                <label class="o_form_label"
                                                                    for="user_id_0">Salesperson</label>
                                                            </div>
                                                            <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                                style="width: 100%;">
                                                                <div name="user_id"
                                                                    class="o_field_widget o_field_many2one_avatar_user o_field_many2one_avatar">
                                                                    <div class="d-flex align-items-center gap-1"><span
                                                                            class="o_avatar o_m2o_avatar"><span
                                                                                class="o_avatar_empty o_m2o_avatar_empty"></span></span>
                                                                        <div class="o_field_many2one_selection">
                                                                            <div class="o_input_dropdown">
                                                                                <div class="o-autocomplete dropdown">
                                                                                    <input type="text"
                                                                                        class="o-autocomplete--input o_input"
                                                                                        autocomplete="off"
                                                                                        role="combobox"
                                                                                        aria-autocomplete="list"
                                                                                        aria-haspopup="listbox"
                                                                                        id="user_id_0" placeholder=""
                                                                                        aria-expanded="false">
                                                                                </div>
                                                                                <span class="o_dropdown_button"></span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="o_field_many2one_extra"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                            <div
                                                                class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                <label class="o_form_label" for="team_id_0">Sales
                                                                    Team</label>
                                                            </div>
                                                            <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                                style="width: 100%;">
                                                                <div name="team_id"
                                                                    class="o_field_widget o_field_many2one">
                                                                    <div class="o_field_many2one_selection">
                                                                        <div class="o_input_dropdown">
                                                                            <div class="o-autocomplete dropdown"><input
                                                                                    type="text"
                                                                                    class="o-autocomplete--input o_input"
                                                                                    autocomplete="off" role="combobox"
                                                                                    aria-autocomplete="list"
                                                                                    aria-haspopup="listbox"
                                                                                    id="team_id_0" placeholder=""
                                                                                    aria-expanded="false"></div><span
                                                                                class="o_dropdown_button"></span>
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
                                                        <div
                                                            class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                            <div
                                                                class="o_wrap_field_boolean d-flex flex-wrap d-sm-contents flex-sm-nowrap">
                                                                <div
                                                                    class="o_cell o_wrap_label flex-sm-grow-0 text-break text-900">
                                                                    <label class="o_form_label"
                                                                        for="require_signature_0">Online signature<sup
                                                                            class="text-info p-1"
                                                                            data-tooltip-template="web.FieldTooltip"
                                                                            data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;Request a online signature from the customer to confirm the order.&quot;}}"
                                                                            data-tooltip-touch-tap-to-show="true">?</sup></label>
                                                                </div>
                                                                <div class="o_cell o_wrap_input order-first flex-sm-grow-0 order-sm-0"
                                                                    style="">
                                                                    <div name="require_signature"
                                                                        class="o_field_widget o_field_boolean">
                                                                        <div
                                                                            class="o-checkbox form-check d-inline-block">
                                                                            <input type="checkbox"
                                                                                class="form-check-input"
                                                                                id="require_signature_0"><label
                                                                                class="form-check-label"
                                                                                for="require_signature_0"></label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                            <div class="o_cell flex-grow-1 flex-sm-grow-0 o_wrap_label w-100 text-break text-900"
                                                                style=""><label class="o_form_label"
                                                                    for="require_payment_0">Online payment<sup
                                                                        class="text-info p-1"
                                                                        data-tooltip-template="web.FieldTooltip"
                                                                        data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;Request a online payment from the customer to confirm the order.&quot;}}"
                                                                        data-tooltip-touch-tap-to-show="true">?</sup></label>
                                                            </div>
                                                            <div class="o_cell flex-grow-1 flex-sm-grow-0"
                                                                style="width: 100%;">
                                                                <div id="require_payment">
                                                                    <div name="require_payment"
                                                                        class="o_field_widget o_field_boolean">
                                                                        <div
                                                                            class="o-checkbox form-check d-inline-block">
                                                                            <input type="checkbox"
                                                                                class="form-check-input"
                                                                                id="require_payment_0"><label
                                                                                class="form-check-label"
                                                                                for="require_payment_0"></label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                            <div
                                                                class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                <label class="o_form_label"
                                                                    for="client_order_ref_0">Customer Reference</label>
                                                            </div>
                                                            <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                                style="width: 100%;">
                                                                <div name="client_order_ref"
                                                                    class="o_field_widget o_field_char"><input
                                                                        class="o_input" id="client_order_ref_0"
                                                                        type="text" autocomplete="off"></div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                            <div
                                                                class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                <label class="o_form_label"
                                                                    for="tag_ids_0">Tags</label>
                                                            </div>
                                                            <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                                style="width: 100%;">
                                                                <div name="tag_ids"
                                                                    class="o_field_widget o_field_many2many_tags">
                                                                    <div
                                                                        class="o_field_tags d-inline-flex flex-wrap gap-1 mw-100 o_tags_input o_input">
                                                                        <div
                                                                            class="o_field_many2many_selection d-inline-flex w-100">
                                                                            <div class="o_input_dropdown">
                                                                                <div class="o-autocomplete dropdown">
                                                                                    <input type="text"
                                                                                        class="o-autocomplete--input o_input"
                                                                                        autocomplete="off"
                                                                                        role="combobox"
                                                                                        aria-autocomplete="list"
                                                                                        aria-haspopup="listbox"
                                                                                        id="tag_ids_0" placeholder=""
                                                                                        aria-expanded="false">
                                                                                </div>
                                                                                <span class="o_dropdown_button"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="o_inner_group grid col-lg-6">
                                                        <div class="g-col-sm-2">
                                                            <div
                                                                class="o_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">
                                                                Invoicing</div>
                                                        </div>
                                                        <div
                                                            class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                            <div class="o_cell flex-grow-1 flex-sm-grow-0 o_wrap_label w-100 text-break text-900"
                                                                style=""><label class="o_form_label"
                                                                    for="fiscal_position_id_0">Fiscal Position<sup
                                                                        class="text-info p-1"
                                                                        data-tooltip-template="web.FieldTooltip"
                                                                        data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;Fiscal positions are used to adapt taxes and accounts for particular customers or sales orders/invoices.The default value comes from the customer.&quot;}}"
                                                                        data-tooltip-touch-tap-to-show="true">?</sup></label>
                                                            </div>
                                                            <div class="o_cell flex-grow-1 flex-sm-grow-0"
                                                                style="width: 100%;">
                                                                <div class="o_row">
                                                                    <div name="fiscal_position_id"
                                                                        class="o_field_widget o_field_many2one">
                                                                        <div class="o_field_many2one_selection">
                                                                            <div class="o_input_dropdown">
                                                                                <div class="o-autocomplete dropdown">
                                                                                    <input type="text"
                                                                                        class="o-autocomplete--input o_input"
                                                                                        autocomplete="off"
                                                                                        role="combobox"
                                                                                        aria-autocomplete="list"
                                                                                        aria-haspopup="listbox"
                                                                                        id="fiscal_position_id_0"
                                                                                        placeholder=""
                                                                                        aria-expanded="false">
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
                                                            <div
                                                                class="o_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">
                                                                Delivery</div>
                                                        </div>
                                                        <div
                                                            class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                            <div
                                                                class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                <label class="o_form_label"
                                                                    for="incoterm_0">Incoterm<sup
                                                                        class="text-info p-1"
                                                                        data-tooltip-template="web.FieldTooltip"
                                                                        data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;International Commercial Terms are a series of predefined commercial terms used in international transactions.&quot;}}"
                                                                        data-tooltip-touch-tap-to-show="true">?</sup></label>
                                                            </div>
                                                            <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                                style="width: 100%;">
                                                                <div name="incoterm"
                                                                    class="o_field_widget o_field_many2one">
                                                                    <div class="o_field_many2one_selection">
                                                                        <div class="o_input_dropdown">
                                                                            <div class="o-autocomplete dropdown"><input
                                                                                    type="text"
                                                                                    class="o-autocomplete--input o_input"
                                                                                    autocomplete="off" role="combobox"
                                                                                    aria-autocomplete="list"
                                                                                    aria-haspopup="listbox"
                                                                                    id="incoterm_0" placeholder=""
                                                                                    aria-expanded="false"></div><span
                                                                                class="o_dropdown_button"></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="o_field_many2one_extra"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                            <div
                                                                class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                <label class="o_form_label"
                                                                    for="incoterm_location_0">Incoterm Location</label>
                                                            </div>
                                                            <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                                style="width: 100%;">
                                                                <div name="incoterm_location"
                                                                    class="o_field_widget o_field_char"><input
                                                                        class="o_input" id="incoterm_location_0"
                                                                        type="text" autocomplete="off"></div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                            <div
                                                                class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                <label class="o_form_label"
                                                                    for="picking_policy_0">Shipping Policy<sup
                                                                        class="text-info p-1"
                                                                        data-tooltip-template="web.FieldTooltip"
                                                                        data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;If you deliver all products at once, the delivery order will be scheduled based on the greatest product lead time. Otherwise, it will be based on the shortest.&quot;}}"
                                                                        data-tooltip-touch-tap-to-show="true">?</sup></label>
                                                            </div>
                                                            <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                                style="width: 100%;">
                                                                <div name="picking_policy"
                                                                    class="o_field_widget o_required_modifier o_field_selection">
                                                                    <select class="o_input pe-3"
                                                                        id="picking_policy_0">
                                                                        <option value="false" style="display:none">
                                                                        </option>
                                                                        <option value="&quot;direct&quot;">As soon as
                                                                            possible</option>
                                                                        <option value="&quot;one&quot;">When all
                                                                            products are ready</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                            <div class="o_cell flex-grow-1 flex-sm-grow-0 o_wrap_label w-100 text-break text-900"
                                                                style=""><label class="o_form_label"
                                                                    for="commitment_date_0">Delivery Date<sup
                                                                        class="text-info p-1"
                                                                        data-tooltip-template="web.FieldTooltip"
                                                                        data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;This is the delivery date promised to the customer. If set, the delivery order will be scheduled based on this date rather than product lead times.&quot;}}"
                                                                        data-tooltip-touch-tap-to-show="true">?</sup></label>
                                                            </div>
                                                            <div class="o_cell flex-grow-1 flex-sm-grow-0"
                                                                style="width: 100%;">
                                                                <div class="o_row">
                                                                    <div name="commitment_date"
                                                                        class="o_field_widget o_field_datetime">
                                                                        <div class="d-flex gap-2 align-items-center">
                                                                            <input type="text"
                                                                                class="o_input cursor-pointer"
                                                                                autocomplete="off"
                                                                                id="commitment_date_0"
                                                                                data-field="commitment_date">
                                                                        </div>
                                                                    </div><span class="text-muted">Expected: <div
                                                                            name="expected_date"
                                                                            class="o_field_widget o_readonly_modifier o_field_datetime oe_inline">
                                                                            <div
                                                                                class="d-flex gap-2 align-items-center">
                                                                                <span class="text-truncate"></span>
                                                                            </div>
                                                                        </div></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="o_inner_group grid col-lg-6">
                                                        <div class="g-col-sm-2">
                                                            <div
                                                                class="o_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">
                                                                Tracking</div>
                                                        </div>
                                                        <div
                                                            class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                            <div
                                                                class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                <label class="o_form_label" for="origin_0">Source
                                                                    Document<sup class="text-info p-1"
                                                                        data-tooltip-template="web.FieldTooltip"
                                                                        data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;Reference of the document that generated this sales order request&quot;}}"
                                                                        data-tooltip-touch-tap-to-show="true">?</sup></label>
                                                            </div>
                                                            <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                                style="width: 100%;">
                                                                <div name="origin"
                                                                    class="o_field_widget o_field_char"><input
                                                                        class="o_input" id="origin_0" type="text"
                                                                        autocomplete="off"></div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                            <div
                                                                class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                <label class="o_form_label"
                                                                    for="opportunity_id_0">Opportunity</label>
                                                            </div>
                                                            <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                                style="width: 100%;">
                                                                <div name="opportunity_id"
                                                                    class="o_field_widget o_field_many2one">
                                                                    <div class="o_field_many2one_selection">
                                                                        <div class="o_input_dropdown">
                                                                            <div class="o-autocomplete dropdown"><input
                                                                                    type="text"
                                                                                    class="o-autocomplete--input o_input"
                                                                                    autocomplete="off" role="combobox"
                                                                                    aria-autocomplete="list"
                                                                                    aria-haspopup="listbox"
                                                                                    id="opportunity_id_0"
                                                                                    placeholder=""
                                                                                    aria-expanded="false"></div><span
                                                                                class="o_dropdown_button"></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="o_field_many2one_extra"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                            <div
                                                                class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                <label class="o_form_label"
                                                                    for="campaign_id_0">Campaign<sup
                                                                        class="text-info p-1"
                                                                        data-tooltip-template="web.FieldTooltip"
                                                                        data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;This is a name that helps you keep track of your different campaign efforts, e.g. Fall_Drive, Christmas_Special&quot;}}"
                                                                        data-tooltip-touch-tap-to-show="true">?</sup></label>
                                                            </div>
                                                            <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                                style="width: 100%;">
                                                                <div name="campaign_id"
                                                                    class="o_field_widget o_field_many2one">
                                                                    <div class="o_field_many2one_selection">
                                                                        <div class="o_input_dropdown">
                                                                            <div class="o-autocomplete dropdown"><input
                                                                                    type="text"
                                                                                    class="o-autocomplete--input o_input"
                                                                                    autocomplete="off" role="combobox"
                                                                                    aria-autocomplete="list"
                                                                                    aria-haspopup="listbox"
                                                                                    id="campaign_id_0" placeholder=""
                                                                                    aria-expanded="false"></div><span
                                                                                class="o_dropdown_button"></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="o_field_many2one_extra"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                            <div
                                                                class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                <label class="o_form_label"
                                                                    for="medium_id_0">Medium<sup class="text-info p-1"
                                                                        data-tooltip-template="web.FieldTooltip"
                                                                        data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;This is the method of delivery, e.g. Postcard, Email, or Banner Ad&quot;}}"
                                                                        data-tooltip-touch-tap-to-show="true">?</sup></label>
                                                            </div>
                                                            <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                                style="width: 100%;">
                                                                <div name="medium_id"
                                                                    class="o_field_widget o_field_many2one">
                                                                    <div class="o_field_many2one_selection">
                                                                        <div class="o_input_dropdown">
                                                                            <div class="o-autocomplete dropdown"><input
                                                                                    type="text"
                                                                                    class="o-autocomplete--input o_input"
                                                                                    autocomplete="off" role="combobox"
                                                                                    aria-autocomplete="list"
                                                                                    aria-haspopup="listbox"
                                                                                    id="medium_id_0" placeholder=""
                                                                                    aria-expanded="false"></div><span
                                                                                class="o_dropdown_button"></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="o_field_many2one_extra"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                            <div
                                                                class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                <label class="o_form_label"
                                                                    for="source_id_0">Source<sup class="text-info p-1"
                                                                        data-tooltip-template="web.FieldTooltip"
                                                                        data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;This is the source of the link, e.g. Search Engine, another domain, or name of email list&quot;}}"
                                                                        data-tooltip-touch-tap-to-show="true">?</sup></label>
                                                            </div>
                                                            <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                                style="width: 100%;">
                                                                <div name="source_id"
                                                                    class="o_field_widget o_field_many2one">
                                                                    <div class="o_field_many2one_selection">
                                                                        <div class="o_input_dropdown">
                                                                            <div class="o-autocomplete dropdown"><input
                                                                                    type="text"
                                                                                    class="o-autocomplete--input o_input"
                                                                                    autocomplete="off" role="combobox"
                                                                                    aria-autocomplete="list"
                                                                                    aria-haspopup="listbox"
                                                                                    id="source_id_0" placeholder=""
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
                                        </div>
                                    </div>
                                    <div id="notes" class="tab-pane fade">
                                        <textarea name="" id="" cols="30" rows="10"
                                            placeholder="Type &quot;/&quot; for commands"></textarea>
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
                                            style="height: Min(1971px, 100%)"></span><span></span>
                                        <div
                                            class="o-mail-DateSection d-flex align-items-center w-100 fw-bold z-1 pt-2">
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
                                                            title="12/8/2024, 6:10:04 pm">- 3 minutes ago</small>
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
<div class="o-main-components-container">
    <div class="o-discuss-CallInvitations position-absolute top-0 end-0 d-flex flex-column p-2"></div>
    <div class="o-mail-ChatHub">
        <div class="o-mail-ChatHub-bubbles position-fixed end-0 d-flex flex-column align-content-start justify-content-end align-items-center bottom-0"
            style="">
            <div class="d-flex flex-column align-content-start justify-content-end align-items-center gap-1"></div>
        </div>
    </div>

    <div></div>
    <div class="o_notification_manager o_upload_progress_toast"></div>
    <div class="o_notification_manager"></div>
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
            <div class="btn-group" role="group"><button type="button" title="Flip Horizontal"
                    data-action="flip" data-scale-direction="scaleX"><i
                        class="oi oi-fw oi-arrows-h"></i></button><button type="button" title="Flip Vertical"
                    data-action="flip" data-scale-direction="scaleY"><i class="oi oi-fw oi-arrows-v"></i></button>
            </div>
            <div class="btn-group" role="group"><button type="button" title="Reset Image"
                    data-action="reset"><i class="fa fa-refresh"></i> Reset Image</button></div>
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
<div id="toolbar" class="oe-toolbar oe-floating d-print-none"
    style="--we-cp-primary: #714B67; --we-cp-secondary: #D8DADD; --we-cp-success: #28A745; --we-cp-info: #17A2B8; --we-cp-warning: #E99D00; --we-cp-danger: #D44C59; --we-cp-o-color-1: #714B67; --we-cp-o-cc1-bg: #FFFFFF; --we-cp-o-cc1-headings: #000; --we-cp-o-cc1-text: #000; --we-cp-o-cc1-btn-primary: #714B67; --we-cp-o-cc1-btn-primary-text: #FFF; --we-cp-o-cc1-btn-secondary: #D8DADD; --we-cp-o-cc1-btn-secondary-text: #000; --we-cp-o-cc1-btn-primary-border: #714B67; --we-cp-o-cc1-btn-secondary-border: #D8DADD; --we-cp-o-color-2: #8595A2; --we-cp-o-cc2-bg: #F3F2F2; --we-cp-o-cc2-headings: #111827; --we-cp-o-cc2-text: #000; --we-cp-o-cc2-btn-primary: #714B67; --we-cp-o-cc2-btn-primary-text: #FFF; --we-cp-o-cc2-btn-secondary: #D8DADD; --we-cp-o-cc2-btn-secondary-text: #000; --we-cp-o-cc2-btn-primary-border: #714B67; --we-cp-o-cc2-btn-secondary-border: #D8DADD; --we-cp-o-color-3: #F3F2F2; --we-cp-o-cc3-bg: #8595A2; --we-cp-o-cc3-headings: #FFF; --we-cp-o-cc3-text: #FFF; --we-cp-o-cc3-btn-primary: #714B67; --we-cp-o-cc3-btn-primary-text: #FFF; --we-cp-o-cc3-btn-secondary: #F3F2F2; --we-cp-o-cc3-btn-secondary-text: #000; --we-cp-o-cc3-btn-primary-border: #714B67; --we-cp-o-cc3-btn-secondary-border: #F3F2F2; --we-cp-o-color-4: #FFFFFF; --we-cp-o-cc4-bg: #714B67; --we-cp-o-cc4-headings: #FFF; --we-cp-o-cc4-text: #FFF; --we-cp-o-cc4-btn-primary: #111827; --we-cp-o-cc4-btn-primary-text: #FFF; --we-cp-o-cc4-btn-secondary: #F3F2F2; --we-cp-o-cc4-btn-secondary-text: #000; --we-cp-o-cc4-btn-primary-border: #111827; --we-cp-o-cc4-btn-secondary-border: #F3F2F2; --we-cp-o-color-5: #111827; --we-cp-o-cc5-bg: #111827; --we-cp-o-cc5-headings: #FFFFFF; --we-cp-o-cc5-text: #FFF; --we-cp-o-cc5-btn-primary: #714B67; --we-cp-o-cc5-btn-primary-text: #FFF; --we-cp-o-cc5-btn-secondary: #F3F2F2; --we-cp-o-cc5-btn-secondary-text: #000; --we-cp-o-cc5-btn-primary-border: #714B67; --we-cp-o-cc5-btn-secondary-border: #F3F2F2; --we-cp-100: #F9FAFB; --we-cp-200: #E7E9ED; --we-cp-300: #D8DADD; --we-cp-400: #9A9CA5; --we-cp-500: #7C7F89; --we-cp-600: #5F636F; --we-cp-700: #374151; --we-cp-800: #1F2937; --we-cp-900: #111827; visibility: hidden;">
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
                                    <div></div><button class="o_we_color_btn o_custom_color selected"
                                        style="background-color:#374151;"></button>
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
                                        style="background-color: rgb(0, 98, 255);">
                                        <div class="o_picker_pointer rounded-circle p-1 position-absolute"
                                            tabindex="-1" style="top: 86.6667px; left: -5px;"></div>
                                    </div>
                                    <div class="o_color_slider position-relative">
                                        <div class="o_slider_pointer" tabindex="-1" style="top: -2px;"></div>
                                    </div>
                                    <div class="o_opacity_slider position-relative"
                                        style="background: linear-gradient(rgb(55, 65, 81) 0%, transparent 100%);">
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
        <div id="unlink" data-call="unlink" title="Remove link"
            class="fa fa-unlink fa-fw btn order-1 d-none"></div>
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


@endsection
