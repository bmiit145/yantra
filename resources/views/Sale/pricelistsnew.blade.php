@extends('layout.header')
@section('content')
@section('title', 'Sales')
@section('head_breadcrumb_title', 'Quotations')
@section('head_new_btn_link', route('pricelists.create'))
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
            <a href="#">Salespersons</a>
            <a href="#">Products</a>
            <a href="#">Customers</a>
        </div>
    </li>
@endsection
@section('head')
    @vite(['resources/css/pricelists.css'])
@endsection


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


<div class="o_action_manager">
    <div class="o_xxl_form_view h-100 o_form_view o_view_controller o_action">
        <div class="o_form_view_container">
            <div class="o_content">
                <div class="o_form_renderer o_form_editable d-flex d-print-block flex-nowrap h-100">
                    <div class="o_form_sheet_bg">
                        <div class="o_form_sheet position-relative">
                            <div class="oe_title">
                                <h1>
                                    <div name="name" class="o_field_widget o_required_modifier o_field_char">
                                        <input class="o_input o_field_translate" id="name_0" type="text"
                                            autocomplete="off" placeholder="e.g. USD Retailers">
                                    </div>
                                </h1>
                            </div>
                            <div class="o_group row align-items-start">
                                <div class="o_inner_group grid col-lg-6"></div>
                                <div class="o_inner_group grid col-lg-6">
                                    <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                        <div
                                            class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                            <label class="o_form_label" for="country_group_ids_0">Country
                                                Groups</label>
                                        </div>
                                        <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                            style="width: 100%;">
                                            <div name="country_group_ids" class="o_field_widget o_field_many2many_tags">
                                                <div
                                                    class="o_field_tags d-inline-flex flex-wrap gap-1 mw-100 o_tags_input o_input">
                                                    <div class="o_field_many2many_selection d-inline-flex w-100">
                                                        <div class="o_input_dropdown">
                                                            <div class="o-autocomplete dropdown"><input type="text"
                                                                    class="o-autocomplete--input o_input"
                                                                    autocomplete="off" role="combobox"
                                                                    aria-autocomplete="list" aria-haspopup="listbox"
                                                                    id="country_group_ids_0" placeholder=""
                                                                    aria-expanded="false"></div><span
                                                                class="o_dropdown_button"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="o_notebook d-flex w-100 horizontal flex-column">
                                <div class="o_notebook_headers">
                                    <ul class="nav nav-tabs flex-row flex-nowrap">
                                        <li class="nav-item flex-nowrap cursor-pointer"><a class="nav-link active"
                                                href="#pricelist_rules" role="tab" data-bs-toggle="tab"
                                                tabindex="0" name="pricelist_rules">Price Rules</a></li>
                                        <li class="nav-item flex-nowrap cursor-pointer"><a class="nav-link"
                                                href="#product_pricing_ids" role="tab" data-bs-toggle="tab"
                                                tabindex="0" name="product_pricing_ids">Rental rules</a></li>
                                        <li class="nav-item flex-nowrap cursor-pointer"><a class="nav-link"
                                                href="#product_subscription_pricing_ids" role="tab"
                                                data-bs-toggle="tab" tabindex="0"
                                                name="product_subscription_pricing_ids">Recurring Prices</a></li>
                                    </ul>
                                </div>
                                <div class="tab-content">
                                    <div id="pricelist_rules" class="tab-pane fade show active">
                                        <div class="o_list_renderer o_renderer table-responsive" tabindex="-1">
                                            <table
                                                class="o_list_table table table-sm table-hover position-relative mb-0 o_list_table_ungrouped table-striped"
                                                style="table-layout: fixed;">
                                                <thead>
                                                    <tr>
                                                        <th data-tooltip-delay="1000" tabindex="-1" data-name="name"
                                                            class="align-middle cursor-default opacity-trigger-hover w-print-auto"
                                                            data-tooltip-template="web.ListHeaderTooltip"
                                                            data-tooltip-info="{&quot;viewMode&quot;:&quot;list&quot;,&quot;resModel&quot;:&quot;product.pricelist.item&quot;,&quot;debug&quot;:false,&quot;field&quot;:{&quot;name&quot;:&quot;name&quot;,&quot;label&quot;:&quot;Name&quot;,&quot;help&quot;:&quot;Explicit rule name for this pricelist line.&quot;,&quot;type&quot;:&quot;char&quot;,&quot;widget&quot;:null,&quot;context&quot;:&quot;{}&quot;,&quot;invisible&quot;:null,&quot;column_invisible&quot;:null,&quot;readonly&quot;:&quot;True&quot;,&quot;required&quot;:null,&quot;changeDefault&quot;:false}}"
                                                            style="width: 386px;">
                                                            <div class="d-flex"><span
                                                                    class="d-block min-w-0 text-truncate flex-grow-1">Apply
                                                                    on</span><i
                                                                    class="d-none fa-angle-down opacity-0 opacity-75-hover"></i>
                                                            </div><span
                                                                class="o_resize position-absolute top-0 end-0 bottom-0 ps-1 bg-black-25 opacity-0 opacity-50-hover z-1"></span>
                                                        </th>
                                                        <th data-tooltip-delay="1000" tabindex="-1"
                                                            data-name="price"
                                                            class="align-middle cursor-default opacity-trigger-hover w-print-auto"
                                                            data-tooltip-template="web.ListHeaderTooltip"
                                                            data-tooltip-info="{&quot;viewMode&quot;:&quot;list&quot;,&quot;resModel&quot;:&quot;product.pricelist.item&quot;,&quot;debug&quot;:false,&quot;field&quot;:{&quot;name&quot;:&quot;price&quot;,&quot;label&quot;:&quot;Price&quot;,&quot;help&quot;:&quot;Explicit rule name for this pricelist line.&quot;,&quot;type&quot;:&quot;char&quot;,&quot;widget&quot;:null,&quot;context&quot;:&quot;{}&quot;,&quot;invisible&quot;:null,&quot;column_invisible&quot;:null,&quot;readonly&quot;:&quot;True&quot;,&quot;required&quot;:null,&quot;changeDefault&quot;:false}}"
                                                            style="width: 375px;">
                                                            <div class="d-flex"><span
                                                                    class="d-block min-w-0 text-truncate flex-grow-1">Price</span><i
                                                                    class="d-none fa-angle-down opacity-0 opacity-75-hover"></i>
                                                            </div><span
                                                                class="o_resize position-absolute top-0 end-0 bottom-0 ps-1 bg-black-25 opacity-0 opacity-50-hover z-1"></span>
                                                        </th>
                                                        <th data-tooltip-delay="1000" tabindex="-1"
                                                            data-name="min_quantity"
                                                            class="align-middle o_column_sortable position-relative cursor-pointer o_list_number_th opacity-trigger-hover w-print-auto"
                                                            data-tooltip-template="web.ListHeaderTooltip"
                                                            data-tooltip-info="{&quot;viewMode&quot;:&quot;list&quot;,&quot;resModel&quot;:&quot;product.pricelist.item&quot;,&quot;debug&quot;:false,&quot;field&quot;:{&quot;name&quot;:&quot;min_quantity&quot;,&quot;label&quot;:&quot;Min. Quantity&quot;,&quot;help&quot;:&quot;For the rule to apply, bought/sold quantity must be greater than or equal to the minimum quantity specified in this field.\nExpressed in the default unit of measure of the product.&quot;,&quot;type&quot;:&quot;float&quot;,&quot;widget&quot;:null,&quot;context&quot;:&quot;{}&quot;,&quot;invisible&quot;:null,&quot;column_invisible&quot;:null,&quot;readonly&quot;:null,&quot;required&quot;:null,&quot;changeDefault&quot;:false}}"
                                                            style="width: 145px;">
                                                            <div class="d-flex flex-row-reverse"><span
                                                                    class="d-block min-w-0 text-truncate flex-grow-1 o_list_number_th">Min.
                                                                    Quantity</span><i
                                                                    class="fa fa-lg fa-angle-down opacity-0 opacity-75-hover"></i>
                                                            </div><span
                                                                class="o_resize position-absolute top-0 end-0 bottom-0 ps-1 bg-black-25 opacity-0 opacity-50-hover z-1"></span>
                                                        </th>
                                                        <th data-tooltip-delay="1000" tabindex="-1"
                                                            data-name="date_start"
                                                            class="align-middle o_column_sortable position-relative cursor-pointer opacity-trigger-hover w-print-auto"
                                                            data-tooltip-template="web.ListHeaderTooltip"
                                                            data-tooltip-info="{&quot;viewMode&quot;:&quot;list&quot;,&quot;resModel&quot;:&quot;product.pricelist.item&quot;,&quot;debug&quot;:false,&quot;field&quot;:{&quot;name&quot;:&quot;date_start&quot;,&quot;label&quot;:&quot;Start Date&quot;,&quot;help&quot;:&quot;Starting datetime for the pricelist item validation\nThe displayed value depends on the timezone set in your preferences.&quot;,&quot;type&quot;:&quot;datetime&quot;,&quot;widget&quot;:null,&quot;context&quot;:&quot;{}&quot;,&quot;invisible&quot;:null,&quot;column_invisible&quot;:null,&quot;readonly&quot;:null,&quot;required&quot;:null,&quot;changeDefault&quot;:false}}"
                                                            style="width: 145px;">
                                                            <div class="d-flex"><span
                                                                    class="d-block min-w-0 text-truncate flex-grow-1">Start
                                                                    Date</span><i
                                                                    class="fa fa-lg fa-angle-down opacity-0 opacity-75-hover"></i>
                                                            </div><span
                                                                class="o_resize position-absolute top-0 end-0 bottom-0 ps-1 bg-black-25 opacity-0 opacity-50-hover z-1"></span>
                                                        </th>
                                                        <th data-tooltip-delay="1000" tabindex="-1"
                                                            data-name="date_end"
                                                            class="align-middle o_column_sortable position-relative cursor-pointer opacity-trigger-hover w-print-auto"
                                                            data-tooltip-template="web.ListHeaderTooltip"
                                                            data-tooltip-info="{&quot;viewMode&quot;:&quot;list&quot;,&quot;resModel&quot;:&quot;product.pricelist.item&quot;,&quot;debug&quot;:false,&quot;field&quot;:{&quot;name&quot;:&quot;date_end&quot;,&quot;label&quot;:&quot;End Date&quot;,&quot;help&quot;:&quot;Ending datetime for the pricelist item validation\nThe displayed value depends on the timezone set in your preferences.&quot;,&quot;type&quot;:&quot;datetime&quot;,&quot;widget&quot;:null,&quot;context&quot;:&quot;{}&quot;,&quot;invisible&quot;:null,&quot;column_invisible&quot;:null,&quot;readonly&quot;:null,&quot;required&quot;:null,&quot;changeDefault&quot;:false}}"
                                                            style="width: 145px;">
                                                            <div class="d-flex"><span
                                                                    class="d-block min-w-0 text-truncate flex-grow-1">End
                                                                    Date</span><i
                                                                    class="fa fa-lg fa-angle-down opacity-0 opacity-75-hover"></i>
                                                            </div><span
                                                                class="o_resize position-absolute top-0 end-0 bottom-0 ps-1 bg-black-25 opacity-0 opacity-50-hover z-1"></span>
                                                        </th>
                                                        <th class="o_list_controller o_list_actions_header w-print-0 p-print-0 position-sticky end-0"
                                                            style="width: 32px;"></th>
                                                    </tr>
                                                </thead>
                                                <tbody class="ui-sortable">
                                                    <tr>
                                                        <td class="o_field_x2many_list_row_add" colspan="6"><a
                                                                href="#" role="button" tabindex="0">Add a
                                                                line</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="6">&ZeroWidthSpace;</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="6">&ZeroWidthSpace;</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="6">&ZeroWidthSpace;</td>
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
                                    <div id="product_pricing_ids" class="tab-pane fade">
                                        <div class="o_list_renderer o_renderer table-responsive" tabindex="-1">
                                            <table
                                                class="o_list_table table table-sm table-hover position-relative mb-0 o_list_table_ungrouped table-striped"
                                                style="table-layout: fixed;">
                                                <thead>
                                                    <tr>
                                                        <th data-tooltip-delay="1000" tabindex="-1"
                                                            data-name="product_template_id"
                                                            class="align-middle o_column_sortable position-relative cursor-pointer opacity-trigger-hover w-print-auto"
                                                            data-tooltip-template="web.ListHeaderTooltip"
                                                            data-tooltip-info="{&quot;viewMode&quot;:&quot;list&quot;,&quot;resModel&quot;:&quot;product.pricing&quot;,&quot;debug&quot;:false,&quot;field&quot;:{&quot;name&quot;:&quot;product_template_id&quot;,&quot;label&quot;:&quot;Product Template&quot;,&quot;help&quot;:&quot;Select products on which this pricing will be applied.&quot;,&quot;type&quot;:&quot;many2one&quot;,&quot;widget&quot;:null,&quot;context&quot;:&quot;{}&quot;,&quot;domain&quot;:[],&quot;invisible&quot;:null,&quot;column_invisible&quot;:null,&quot;readonly&quot;:null,&quot;required&quot;:&quot;1&quot;,&quot;changeDefault&quot;:false,&quot;relation&quot;:&quot;product.template&quot;}}"
                                                            style="width: 531px;">
                                                            <div class="d-flex"><span
                                                                    class="d-block min-w-0 text-truncate flex-grow-1">Products</span><i
                                                                    class="fa fa-lg fa-angle-down opacity-0 opacity-75-hover"></i>
                                                            </div><span
                                                                class="o_resize position-absolute top-0 end-0 bottom-0 ps-1 bg-black-25 opacity-0 opacity-50-hover z-1"></span>
                                                        </th>
                                                        <th data-tooltip-delay="1000" tabindex="-1"
                                                            data-name="recurrence_id"
                                                            class="align-middle o_column_sortable position-relative cursor-pointer opacity-trigger-hover w-print-auto"
                                                            data-tooltip-template="web.ListHeaderTooltip"
                                                            data-tooltip-info="{&quot;viewMode&quot;:&quot;list&quot;,&quot;resModel&quot;:&quot;product.pricing&quot;,&quot;debug&quot;:false,&quot;field&quot;:{&quot;name&quot;:&quot;recurrence_id&quot;,&quot;label&quot;:&quot;Renting Period&quot;,&quot;type&quot;:&quot;many2one&quot;,&quot;widget&quot;:null,&quot;context&quot;:&quot;{}&quot;,&quot;domain&quot;:[],&quot;invisible&quot;:null,&quot;column_invisible&quot;:null,&quot;readonly&quot;:null,&quot;required&quot;:&quot;True&quot;,&quot;changeDefault&quot;:false,&quot;relation&quot;:&quot;sale.temporal.recurrence&quot;}}"
                                                            style="width: 520px;">
                                                            <div class="d-flex"><span
                                                                    class="d-block min-w-0 text-truncate flex-grow-1">Period</span><i
                                                                    class="fa fa-lg fa-angle-down opacity-0 opacity-75-hover"></i>
                                                            </div><span
                                                                class="o_resize position-absolute top-0 end-0 bottom-0 ps-1 bg-black-25 opacity-0 opacity-50-hover z-1"></span>
                                                        </th>
                                                        <th data-tooltip-delay="1000" tabindex="-1"
                                                            data-name="price"
                                                            class="align-middle o_column_sortable position-relative cursor-pointer o_list_number_th o_monetary_cell opacity-trigger-hover w-print-auto"
                                                            data-tooltip-template="web.ListHeaderTooltip"
                                                            data-tooltip-info="{&quot;viewMode&quot;:&quot;list&quot;,&quot;resModel&quot;:&quot;product.pricing&quot;,&quot;debug&quot;:false,&quot;field&quot;:{&quot;name&quot;:&quot;price&quot;,&quot;label&quot;:&quot;Price&quot;,&quot;type&quot;:&quot;monetary&quot;,&quot;widget&quot;:&quot;monetary&quot;,&quot;widgetDescription&quot;:&quot;Monetary&quot;,&quot;context&quot;:&quot;{}&quot;,&quot;invisible&quot;:null,&quot;column_invisible&quot;:null,&quot;readonly&quot;:null,&quot;required&quot;:&quot;True&quot;,&quot;changeDefault&quot;:false}}"
                                                            style="width: 145px;">
                                                            <div class="d-flex flex-row-reverse"><span
                                                                    class="d-block min-w-0 text-truncate flex-grow-1 o_list_number_th">Price</span><i
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
                                                        <td class="o_field_x2many_list_row_add" colspan="4"><a
                                                                href="#" role="button" tabindex="0">Add a
                                                                line</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4">&ZeroWidthSpace;</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4">&ZeroWidthSpace;</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4">&ZeroWidthSpace;</td>
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
                                    <div id="product_subscription_pricing_ids" class="tab-pane fade">
                                        <div class="o_list_renderer o_renderer table-responsive" tabindex="-1">
                                            <table
                                                class="o_list_table table table-sm table-hover position-relative mb-0 o_list_table_ungrouped table-striped"
                                                style="table-layout: fixed;">
                                                <thead>
                                                    <tr>
                                                        <th data-tooltip-delay="1000" tabindex="-1"
                                                            data-name="product_template_id"
                                                            class="align-middle o_column_sortable position-relative cursor-pointer opacity-trigger-hover w-print-auto"
                                                            data-tooltip-template="web.ListHeaderTooltip"
                                                            data-tooltip-info="{&quot;viewMode&quot;:&quot;list&quot;,&quot;resModel&quot;:&quot;sale.subscription.pricing&quot;,&quot;debug&quot;:false,&quot;field&quot;:{&quot;name&quot;:&quot;product_template_id&quot;,&quot;label&quot;:&quot;Products&quot;,&quot;help&quot;:&quot;Select products on which this pricing will be applied.&quot;,&quot;type&quot;:&quot;many2one&quot;,&quot;widget&quot;:null,&quot;context&quot;:&quot;{}&quot;,&quot;domain&quot;:&quot;[('recurring_invoice', '=', True)]&quot;,&quot;invisible&quot;:null,&quot;column_invisible&quot;:null,&quot;readonly&quot;:null,&quot;required&quot;:&quot;1&quot;,&quot;changeDefault&quot;:false,&quot;relation&quot;:&quot;product.template&quot;}}"
                                                            style="width: 531px;">
                                                            <div class="d-flex"><span
                                                                    class="d-block min-w-0 text-truncate flex-grow-1">Products</span><i
                                                                    class="fa fa-lg fa-angle-down opacity-0 opacity-75-hover"></i>
                                                            </div><span
                                                                class="o_resize position-absolute top-0 end-0 bottom-0 ps-1 bg-black-25 opacity-0 opacity-50-hover z-1"></span>
                                                        </th>
                                                        <th data-tooltip-delay="1000" tabindex="-1"
                                                            data-name="plan_id"
                                                            class="align-middle o_column_sortable position-relative cursor-pointer opacity-trigger-hover w-print-auto"
                                                            data-tooltip-template="web.ListHeaderTooltip"
                                                            data-tooltip-info="{&quot;viewMode&quot;:&quot;list&quot;,&quot;resModel&quot;:&quot;sale.subscription.pricing&quot;,&quot;debug&quot;:false,&quot;field&quot;:{&quot;name&quot;:&quot;plan_id&quot;,&quot;label&quot;:&quot;Recurring Plan&quot;,&quot;type&quot;:&quot;many2one&quot;,&quot;widget&quot;:null,&quot;context&quot;:&quot;{}&quot;,&quot;domain&quot;:[],&quot;invisible&quot;:null,&quot;column_invisible&quot;:null,&quot;readonly&quot;:null,&quot;required&quot;:&quot;1&quot;,&quot;changeDefault&quot;:false,&quot;relation&quot;:&quot;sale.subscription.plan&quot;}}"
                                                            style="width: 520px;">
                                                            <div class="d-flex"><span
                                                                    class="d-block min-w-0 text-truncate flex-grow-1">Recurring
                                                                    Plan</span><i
                                                                    class="fa fa-lg fa-angle-down opacity-0 opacity-75-hover"></i>
                                                            </div><span
                                                                class="o_resize position-absolute top-0 end-0 bottom-0 ps-1 bg-black-25 opacity-0 opacity-50-hover z-1"></span>
                                                        </th>
                                                        <th data-tooltip-delay="1000" tabindex="-1"
                                                            data-name="price"
                                                            class="align-middle o_column_sortable position-relative cursor-pointer o_list_number_th opacity-trigger-hover w-print-auto"
                                                            data-tooltip-template="web.ListHeaderTooltip"
                                                            data-tooltip-info="{&quot;viewMode&quot;:&quot;list&quot;,&quot;resModel&quot;:&quot;sale.subscription.pricing&quot;,&quot;debug&quot;:false,&quot;field&quot;:{&quot;name&quot;:&quot;price&quot;,&quot;label&quot;:&quot;Recurring Price&quot;,&quot;type&quot;:&quot;monetary&quot;,&quot;widget&quot;:null,&quot;context&quot;:&quot;{}&quot;,&quot;invisible&quot;:null,&quot;column_invisible&quot;:null,&quot;readonly&quot;:null,&quot;required&quot;:&quot;True&quot;,&quot;changeDefault&quot;:false}}"
                                                            style="width: 145px;">
                                                            <div class="d-flex flex-row-reverse"><span
                                                                    class="d-block min-w-0 text-truncate flex-grow-1 o_list_number_th">Recurring
                                                                    Price</span><i
                                                                    class="fa fa-lg fa-angle-down opacity-0 opacity-75-hover"></i>
                                                            </div><span
                                                                class="o_resize position-absolute top-0 end-0 bottom-0 ps-1 bg-black-25 opacity-0 opacity-50-hover z-1"></span>
                                                        </th>
                                                        <th class="o_list_controller o_list_actions_header w-print-0 p-print-0 position-sticky end-0"
                                                            style="width: 32px;"></th>
                                                    </tr>
                                                </thead>
                                                <tbody class="ui-sortable">
                                                    <tr>
                                                        <td class="o_field_x2many_list_row_add" colspan="4"><a
                                                                href="#" role="button" tabindex="0">Add a
                                                                price rule</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4">&ZeroWidthSpace;</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4">&ZeroWidthSpace;</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4">&ZeroWidthSpace;</td>
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
                                            style="height: Min(1581px, 100%)"></span><span></span>
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
                                                            title="13/8/2024, 12:09:16 pm">- now</small>
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

@endsection
