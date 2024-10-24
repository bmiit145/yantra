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
    <li class="dropdown">
        <a href="#">Configuration</a>
        <div class="dropdown-content">
            <a href="#"><b>Settings</b></a>
            <a href="{{route('salesteam.index')}}"><b>Sales Teams</b></a>
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
</head>

@endsection



<!-- Custom Styles (Optional) -->
<style>
    .select2-container--default .select2-selection--single {
        border: none;
    }

    ,
    .select2-selection__clear {
        display: none;
    }

    .select2-container--default.select2-container--focus .select2-selection--multiple {
        border: none !important;
    }

    .select2-container--default .select2-selection--multiple {
        border: none !important;
    }

    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        background-color: transparent;
        border: none !important;
    }

    .select2-container .select2-selection--multiple .select2-selection__rendered {
        overflow: inherit !important;
    }

    /* Optional: Adjust button styling */
    .td-picker-header {
        justify-content: space-between;
    }

    .td-actions {
        justify-content: space-between;
    }
</style>
<style>
    element.style {
        top: 0px;
        left: 0px;
    }

    .modal-dialog .o_form_view {
        min-height: auto;
        --formView-sheetBg-padding-top: 8px;
        --formView-sheetBg-padding-x: 16px;
    }

    @media (min-width: 576px) {
        :not(.s_popup)>.modal .modal-content {
            max-height: 100%;
        }
    }

    @media (min-width: 768px) {
        .o_form_view {
            display: -webkit-box;
            display: -webkit-flex;
            display: flex;
            -webkit-flex-flow: column nowrap;
            flex-flow: column nowrap;
            min-height: 100%;
        }
    }

    .o_form_view {
        --fieldWidget-margin-bottom: 5px;
    }

    .modal-content {
        position: relative;
        display: -webkit-box;
        display: -webkit-flex;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -webkit-flex-direction: column;
        flex-direction: column;
        width: 100%;
        color: var(--modal-color);
        pointer-events: auto;
        background-color: var(--modal-bg);
        background-clip: padding-box;
        border: var(--modal-border-width) solid var(--modal-border-color);
        border-radius: var(--modal-border-radius);
        box-shadow: var(--modal-box-shadow);
        outline: 0;
    }

    .o_list_renderer .o_list_table .o_column_sortable[data-name="min_quantity"] .d-flex.flex-row-reverse {
        flex-direction: row !important;
    }

    .o_list_renderer .o_list_table .o_column_sortable[data-name="min_quantity"] .o_list_number_th {
        text-align: left;
        padding: 0px;
    }
</style>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css">

<div class="o_action_manager">
    <div class="o_xxl_form_view h-100 o_form_view o_view_controller o_action">
        <div class="o_form_view_container">
            <div class="o_content">
                <div class="o_form_renderer o_form_editable d-flex d-print-block flex-nowrap h-100">
                    <input type="hidden" id="pricelist_ids" value="{{ isset($data) ? $data->id : '' }}"
                        name="pricelist_ids">
                    <div class="o_form_sheet_bg">
                        <div class="o_form_sheet position-relative" id="myForm">
                            <div class="oe_title">
                                <h1>
                                    <div class="product_flex d-flex align-items-center">
                                        <div name="name" class="o_required_modifier o_field_text text-break w-100">
                                            <div style="height: 45px;">
                                                <textarea class="o_input o_field_translate" id="name_0" placeholder="e.g. Price List " rows="1"
                                                    style="height: 45px; border-top-width: 0px; border-bottom-width: 1px; padding: 1px 5px; text-align: left;"
                                                    spellcheck="true">{{ isset($data) ? $data->pricelist_name : '' }}</textarea>
                                            </div>
                                        </div>
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
                                                            <div class="product_select_hide">
                                                                <select class="o-autocomplete--input o_input"
                                                                    id="country_id_0" style="width: 150px;">
                                                                    <option value="">Country</option>
                                                                    @foreach ($country as $country)
                                                                        <option value="{{ $country->id }}"
                                                                            @if (isset($data) && $data->country == $country->id) selected @endif>
                                                                            {{ $country->name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
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
                                                            style="width: 322px;">
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
                                                            style="width: 380px;">
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
                                                            style="width: 140px;">
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
                                                            style="width: 140px;">
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
                                                            style="width: 140px;">
                                                            <div class="d-flex"><span
                                                                    class="d-block min-w-0 text-truncate flex-grow-1">End
                                                                    Date</span><i
                                                                    class="fa fa-lg fa-angle-down opacity-0 opacity-75-hover"></i>
                                                            </div><span
                                                                class="o_resize position-absolute top-0 end-0 bottom-0 ps-1 bg-black-25 opacity-0 opacity-50-hover z-1"></span>
                                                        </th>
                                                        <th class="o_list_controller o_list_actions_header w-print-0 p-print-0 position-sticky end-0"
                                                            style="width: 32px;"></th>
                                                        <th class="o_list_controller o_list_actions_header w-print-0 p-print-0 position-sticky end-0"
                                                            style="width: 32px;"></th>
                                                    </tr>
                                                </thead>
                                                <tbody class="ui-sortable" id="pricelist_tbody">
                                                        @if (count($priceLists) > 0)
                                                        @foreach ($priceLists as $list)
                                                            <tr>
                                                                <td>
                                                                    @if ($list->product_Name)
                                                                        {{ $list->product_Name }}
                                                                    @elseif($list->category)
                                                                        {{ $list->category }}
                                                                    @else
                                                                        
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    @php
                                                                        // Build the price string conditionally
                                                                        $priceComponents = [];
                                                                        if ($list->discount_sales) {
                                                                            $priceComponents[] = "{$list->discount_sales}% Discount";
                                                                        }
                                                                        if ($list->extra_fee) {
                                                                            $priceComponents[] = "AND {$list->extra_fee} Surcharge";
                                                                        }
                                                                        if ($list->markup) {
                                                                            $priceComponents[] = "{$list->markup}% Markup";
                                                                        }
                                                                        if ($list->fixed_price) {
                                                                            $priceComponents[] = "{$list->fixed_price} Fixed Price";
                                                                        }
                                                                        if ($list->discount) {
                                                                            $priceComponents[] = "{$list->discount}% Discount";
                                                                        }
                                                    
                                                                        // Join all parts to create the final price string
                                                                        $priceString = implode(' ', $priceComponents);
                                                                        echo $priceString ?: '00.00'; // Show '00.00' if no price is set
                                                                    
                                                                    @endphp
                                                                </td>
                                                                <td>@if ($list->min_oty)
                                                                        {{ $list->min_oty ?? '' }}
                                                                    @else
                                                                        00.00
                                                                    @endif
                                                                </td>
                                                                <td data-strat_date="{{ $list->strat_date }}">{{ $list->strat_date ?? '' }}</td>
                                                                <td>{{ $list->end_date ?? '' }}</td>
                                                                <td>
                                                                    <a class="index-edit-btn button-small" style="border: none; background: transparent;color:black"
                                                                            data-id="{{ $list->id }}"
                                                                            data-apply_to="{{ $list->apply_to }}"
                                                                            data-product_Name="{{ $list->product_Name ?? 'null' }}"  
                                                                            data-category="{{ $list->category }}" 
                                                                            data-price_type="{{ $list->price_type }}" 
                                                                            data-discount="{{ $list->discount }}" 
                                                                            data-sale_price_name="{{ $list->sale_price_name }}" 
                                                                            data-based_price="{{ $list->based_price }}" 
                                                                            data-discount_sales="{{ $list->discount_sales }}"  
                                                                            data-markup="{{ $list->markup }}" 
                                                                            data-other_pricelist="{{ $list->other_pricelist }}"  
                                                                            data-round_of_to="{{ $list->round_of_to }}"  
                                                                            data-extra_fee="{{ $list->extra_fee }}" 
                                                                            data-fixed_price="{{ $list->fixed_price }}"  
                                                                            data-min_oty="{{ $list->min_oty }}"  
                                                                            data-strat_date="{{ $list->strat_date }}"
                                                                            data-end_date="{{ $list->end_date }}"> 
                                                                        <i class="fa fa-pencil"></i>
                                                                </a>
                                                                </td>
                                                                <td>
                                                                    <a class="delete-btn button-small" style="border: none; background: transparent;color:black"
                                                                            data-id="{{ $list->id }}">
                                                                            <i class="fa fa-trash-o"></i>
                                                                </a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @endif                                                
                                                    <tr>
                                                        <td class="o_field_x2many_list_row_add Add_line_09_new"
                                                            colspan="7">
                                                            <!-- Link that triggers the modal -->
                                                            <a href="#" id="addLineBtn" data-bs-toggle="modal"
                                                                data-bs-target="#priceRuleModal_1">Add a line</a>
                                                        </td>
                                                    </tr>

                                                    <!-- Modal edit Buttons Structure -->
                                                    <div class="modal fade" id="priceRuleModal_2" tabindex="-1"
                                                        aria-labelledby="priceRuleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-xl">
                                                            <div class="modal-content o_form_view">

                                                                <!-- Modal Header -->
                                                                <header class="modal-header">
                                                                        <h4 class="modal-title text-break">Create
                                                                            Pricelist
                                                                            Rules</h4>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                </header>

                                                                <!-- Modal Body -->
                                                                <main class="modal-body p-0">
                                                                        <div
                                                                            class="o_form_renderer o_form_editable d-flex d-print-block flex-nowrap h-100 o_form_dirty">
                                                                            <div class="o_form_sheet_bg">
                                                                                <div
                                                                                    class="o_form_sheet position-relative">
                                                                                    <div
                                                                                        class="o_group row align-items-start">
                                                                                        <div
                                                                                            class="o_inner_group grid col-lg-6">
                                                                                            <!-- Apply To Radio Buttons -->
                                                                                            <div
                                                                                                class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0 apply_to_input"id="apply_to_input_values">
                                                                                                <div
                                                                                                    class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                                                    <label
                                                                                                        class="o_form_label"
                                                                                                        for="display_applied_on_0">Apply
                                                                                                        To<sup
                                                                                                            class="text-info p-1"
                                                                                                            data-tooltip-template="web.FieldTooltip"
                                                                                                            data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;Pricelist Item applicable on selected option&quot;}}"
                                                                                                            data-tooltip-touch-tap-to-show="true">?</sup></label>
                                                                                                </div>
                                                                                                <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                                                                    style="width: 100%;">
                                                                                                    <div name="display_applied_on"
                                                                                                        class="o_field_widget o_required_modifier o_field_radio">
                                                                                                        <div role="radiogroup"
                                                                                                            class="o_horizontal"
                                                                                                            aria-label="Apply To">
                                                                                                            <div class="form-check o_radio_item"
                                                                                                                aria-atomic="true">
                                                                                                                <input
                                                                                                                    type="radio"
                                                                                                                    class="form-check-input o_radio_input"
                                                                                                                    name="radio_field_20"
                                                                                                                    data-value="Product"
                                                                                                                    data-index="0"
                                                                                                                    id="radio_field_4_2_product">
                                                                                                                <label
                                                                                                                    class="form-check-label o_form_label"
                                                                                                                    for="radio_field_4_3_product">Product</label>
                                                                                                            </div>
                                                                                                            <div class="form-check o_radio_item"
                                                                                                                aria-atomic="true">
                                                                                                                <input
                                                                                                                    type="radio"
                                                                                                                    class="form-check-input o_radio_input"
                                                                                                                    name="radio_field_20"
                                                                                                                    data-value="Category"
                                                                                                                    data-index="1"
                                                                                                                    id="radio_field_4_3_product_category">
                                                                                                                <label
                                                                                                                    class="form-check-label o_form_label"
                                                                                                                    for="radio_field_4_4_category">Category</label>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>

                                                                                            <!-- Product Selection -->
                                                                                            <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0 product_90 "
                                                                                                id="product_input">
                                                                                                <div
                                                                                                    class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                                                    <label
                                                                                                        class="o_form_label"
                                                                                                        for="product_id">Product<sup
                                                                                                            class="text-info p-1"
                                                                                                            data-tooltip-template="web.FieldTooltip"
                                                                                                            data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;Specify a product category if this rule only applies to products belonging to this category or its children categories. Keep empty otherwise.&quot;}}"
                                                                                                            data-tooltip-touch-tap-to-show="true">?</sup></label>
                                                                                                </div>
                                                                                                <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                                                                    style="width: 100%;">
                                                                                                    <div name="product_id"
                                                                                                        class="o_field_widget o_field_many2one">
                                                                                                        <div
                                                                                                            class="o_field_many2one_selection">
                                                                                                            <div
                                                                                                                class="o_input_dropdown">
                                                                                                                <div
                                                                                                                    class="product_select_hide">
                                                                                                                    <select
                                                                                                                        class="o-autocomplete--input o_input product_drop_edit"
                                                                                                                        id="product_id_50">
                                                                                                                        <option
                                                                                                                            value="">
                                                                                                                            Select
                                                                                                                            Products
                                                                                                                        </option>
                                                                                                                        @foreach ($products as $prod)
                                                                                                                            <option id="product_id_50"
                                                                                                                                value="{{ $prod->name }}">
                                                                                                                                {{ $prod->name }}
                                                                                                                            </option>
                                                                                                                        @endforeach
                                                                                                                        <option
                                                                                                                            value="add_product_typing">
                                                                                                                            Start
                                                                                                                            typing...
                                                                                                                        </option>
                                                                                                                    </select>
                                                                                                                    <input
                                                                                                                        type="text"
                                                                                                                        id="new_product_type_here"
                                                                                                                        placeholder="Enter new Products"
                                                                                                                        style="display: none;">
                                                                                                                </div>
                                                                                                                <span
                                                                                                                    class="o_dropdown_button"></span>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div
                                                                                                            class="o_field_many2one_extra">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>

                                                                                            <!-- Category Selection -->
                                                                                            <div
                                                                                                class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0 category_90">
                                                                                                <div
                                                                                                    class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                                                    <label
                                                                                                        class="o_form_label"
                                                                                                        for="product_tmpl_id">Category<sup
                                                                                                            class="text-info p-1"
                                                                                                            data-tooltip-template="web.FieldTooltip"
                                                                                                            data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;Specify a template if this rule only applies to one product template. Keep empty otherwise.&quot;}}"
                                                                                                            data-tooltip-touch-tap-to-show="true">?</sup></label>
                                                                                                </div>
                                                                                                <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                                                                    style="width: 100%;">
                                                                                                    <div name="product_tmpl_id"
                                                                                                        class="o_field_widget o_field_many2one">
                                                                                                        <div
                                                                                                            class="o_field_many2one_selection">
                                                                                                            <div
                                                                                                                class="o_input_dropdown">
                                                                                                                <div
                                                                                                                    class="category_select_hide">
                                                                                                                    <select
                                                                                                                        class="o-autocomplete--input o_input category_drop_down_edit"
                                                                                                                        id="category_id_20">
                                                                                                                        <option
                                                                                                                            value="">
                                                                                                                            Select
                                                                                                                            Categorys
                                                                                                                        </option>
                                                                                                                        @foreach ($categories as $categorie)
                                                                                                                            <option
                                                                                                                                value="{{ $categorie->categories_name }}">
                                                                                                                                {{ $categorie->categories_name }}
                                                                                                                            </option>
                                                                                                                        @endforeach
                                                                                                                        <option
                                                                                                                            value="add_category_typing">
                                                                                                                            Start
                                                                                                                            typing...
                                                                                                                        </option>
                                                                                                                    </select>
                                                                                                                    <input
                                                                                                                        type="text"
                                                                                                                        id="new_category_type_here"
                                                                                                                        style="display: none;"
                                                                                                                        placeholder="Enter new Cetegory">
                                                                                                                </div>
                                                                                                                <span
                                                                                                                    class="o_dropdown_button"></span>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div
                                                                                                            class="o_field_many2one_extra">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>

                                                                                            <!-- Price Type Radio Buttons -->
                                                                                            <div
                                                                                                class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0 price_type_value"id="price_type_input">
                                                                                                <div
                                                                                                    class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                                                    <label
                                                                                                        class="o_form_label"
                                                                                                        for="compute_price">Price
                                                                                                        Type<sup
                                                                                                            class="text-info p-1"
                                                                                                            data-tooltip-template="web.FieldTooltip"
                                                                                                            data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;Use the discount rules and activate the discount settings in order to show discount to customer.&quot;}}"
                                                                                                            data-tooltip-touch-tap-to-show="true">?</sup></label>
                                                                                                </div>

                                                                                                <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                                                                    style="width: 100%;"
                                                                                                    id=compute_price>
                                                                                                    <div name="compute_price_0"
                                                                                                        class="o_field_widget o_required_modifier o_field_radio">
                                                                                                        <div role="radiogroup"
                                                                                                            class="o_horizontal"
                                                                                                            aria-label="Price Type">
                                                                                                            <div class="form-check o_radio_item"
                                                                                                                aria-atomic="true">
                                                                                                                <input
                                                                                                                    type="radio"
                                                                                                                    class="form-check-input o_radio_input"
                                                                                                                    name="radio_field_30"
                                                                                                                    data-value="Discount"
                                                                                                                    data-index="0"
                                                                                                                    id="radio_field_5_percentage">
                                                                                                                <label
                                                                                                                    class="form-check-label o_form_label"
                                                                                                                    for="radio_field_5_percentage">Discount</label>
                                                                                                            </div>
                                                                                                            <div class="form-check o_radio_item"
                                                                                                                aria-atomic="true">
                                                                                                                <input
                                                                                                                    type="radio"
                                                                                                                    class="form-check-input o_radio_input"
                                                                                                                    name="radio_field_30"
                                                                                                                    data-value="Formula"
                                                                                                                    data-index="1"
                                                                                                                    id="radio_field_5_formula">
                                                                                                                <label
                                                                                                                    class="form-check-label o_form_label"
                                                                                                                    for="radio_field_5_formula">Formula</label>
                                                                                                            </div>
                                                                                                            <div class="form-check o_radio_item"
                                                                                                                aria-atomic="true">
                                                                                                                <input
                                                                                                                    type="radio"
                                                                                                                    class="form-check-input o_radio_input"
                                                                                                                    name="radio_field_30"
                                                                                                                    data-value="Fixed"
                                                                                                                    data-index="2"
                                                                                                                    id="fixed_radio">
                                                                                                                <label
                                                                                                                    class="form-check-label o_form_label"
                                                                                                                    for="radio_field_5_fixed">Fixed
                                                                                                                    Price</label>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <!-- Fixed Price -->
                                                                                            <div
                                                                                                class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0 fix_price_0 fix_div">

                                                                                                <div
                                                                                                    class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                                                    <label
                                                                                                        class="o_form_label"
                                                                                                        for="compute_price_0">Fixed
                                                                                                        Price<sup
                                                                                                            class="text-info p-1"
                                                                                                            data-tooltip-template="web.FieldTooltip"
                                                                                                            data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;Use the discount rules and activate the discount settings in order to show discount to customer.&quot;}}"
                                                                                                            data-tooltip-touch-tap-to-show="true">?</sup></label>
                                                                                                </div>
                                                                                                <div class="o_cell flex-grow-1 flex-sm-grow-0"
                                                                                                    style="width: 100%;">
                                                                                                    <div class="o_row"
                                                                                                        style="width: 40% !important;">
                                                                                                        <div name="fixed_price"
                                                                                                            class="o_field_widget o_field_monetary">
                                                                                                            <div
                                                                                                                class="text-nowrap d-inline-flex w-100 align-items-baseline position-relative">
                                                                                                                <span
                                                                                                                    class="o_input position-absolute pe-none d-flex w-100"><span
                                                                                                                        class="opacity-0 d-inline-block overflow-hidden mw-100 o_monetary_ghost_value">0.00</span></span><input
                                                                                                                    class="o_input flex-grow-1 flex-shrink-1"
                                                                                                                    autocomplete="off"
                                                                                                                    id="fix_price_20"
                                                                                                                    type="text">
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <!-- Discount button in discount -->
                                                                                            <div
                                                                                                class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0 discount_hide">
                                                                                                <div
                                                                                                    class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                                                    <label
                                                                                                        class="o_form_label"
                                                                                                        for="discount">Discount<sup
                                                                                                            class="text-info p-1"
                                                                                                            data-tooltip-template="web.FieldTooltip"
                                                                                                            data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;Use the discount rules and activate the discount settings in order to show discount to customer.&quot;}}"
                                                                                                            data-tooltip-touch-tap-to-show="true">?</sup></label>
                                                                                                </div>
                                                                                                <div class="o_cell flex-grow-1 flex-sm-grow-0"
                                                                                                    style="width: 100%;">
                                                                                                    <div
                                                                                                        class="o_row gap-3">
                                                                                                        <div name="percent_price"
                                                                                                            class="o_field_widget o_field_float">
                                                                                                            <input
                                                                                                                inputmode="decimal"
                                                                                                                class="o_input"
                                                                                                                autocomplete="off"
                                                                                                                id="percent_price_20"
                                                                                                                type="text">
                                                                                                        </div>
                                                                                                        <span>%</span><span>on</span>
                                                                                                        <div name="base_pricelist_id"
                                                                                                            class="o_field_widget o_field_many2one">
                                                                                                            <div
                                                                                                                class="o_field_many2one_selection">
                                                                                                                <div
                                                                                                                    class="o_input_dropdown">
                                                                                                                    <div
                                                                                                                        class="o-autocomplete dropdown">
                                                                                                                        <select
                                                                                                                            class="o-autocomplete--input o_input"
                                                                                                                            id="sales_id_20">
                                                                                                                            <option
                                                                                                                                value="">
                                                                                                                                Recommend
                                                                                                                                when......
                                                                                                                            </option>
                                                                                                                            @foreach ($sale_price as $sale_prices)
                                                                                                                                <option
                                                                                                                                    value="{{ $sale_prices->sale_price_name }}">
                                                                                                                                    {{ $sale_prices->sale_price_name }}
                                                                                                                                </option>
                                                                                                                            @endforeach
                                                                                                                            <option
                                                                                                                                value="add_sales_price">
                                                                                                                                Start
                                                                                                                                typing...
                                                                                                                            </option>
                                                                                                                        </select>
                                                                                                                        <input
                                                                                                                            type="text"
                                                                                                                            id="type_here"
                                                                                                                            placeholder="Write here..."
                                                                                                                            style="display:none;">
                                                                                                                    </div>
                                                                                                                    <span
                                                                                                                        class="o_dropdown_button"></span>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="o_field_many2one_extra">
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <!-- Other Fields (Min Qty, Validity Period) -->
                                                                                        <div
                                                                                            class="o_inner_group grid col-lg-6">

                                                                                            <div
                                                                                                class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0 min_qty_values"id="min_qty_input">
                                                                                                <div
                                                                                                    class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                                                    <label
                                                                                                        class="o_form_label"
                                                                                                        for="min_quantity_0">Min
                                                                                                        Qty<sup
                                                                                                            class="text-info p-1"
                                                                                                            data-tooltip-template="web.FieldTooltip"
                                                                                                            data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;For the rule to apply, bought/sold quantity must be greater than or equal to the minimum quantity specified in this field.\nExpressed in the default unit of measure of the product.&quot;}}"
                                                                                                            data-tooltip-touch-tap-to-show="true">?</sup></label>
                                                                                                </div>
                                                                                                <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                                                                    style="width: 100%;">
                                                                                                    <div name="min_quantity"
                                                                                                        class="o_field_widget o_field_float">
                                                                                                        <input
                                                                                                            inputmode="decimal"
                                                                                                            class="o_input"
                                                                                                            autocomplete="off"
                                                                                                            id="min_quantity_20"
                                                                                                            type="text">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>

                                                                                            <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0"
                                                                                                id="date_time_0">
                                                                                                <div
                                                                                                    class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                                                    <label
                                                                                                        class="o_form_label"
                                                                                                        for="start_date">Validity
                                                                                                        Period
                                                                                                        <sup
                                                                                                            class="text-info p-1">?</sup>
                                                                                                    </label>
                                                                                                </div>
                                                                                                <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                                                                    style="width: 60%;">
                                                                                                    <div
                                                                                                        class="o_field_widget o_field_daterange">
                                                                                                        <div
                                                                                                            class="d-flex gap-2 align-items-center">
                                                                                                            <input
                                                                                                                type="text"
                                                                                                                class="o_input cursor-pointer"
                                                                                                                autocomplete="off"
                                                                                                                id="start_date_20"
                                                                                                                data-field="startDateDisplay">
                                                                                                            <input
                                                                                                                type="text"
                                                                                                                class="o_input cursor-pointer"
                                                                                                                autocomplete="off"
                                                                                                                id="end_date_20"
                                                                                                                data-field="endDateDisplay">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <!-- Group for Base Price, Markup, Round Off, Extra Fee -->
                                                                                    <div
                                                                                        class="o_group row align-items-start">
                                                                                        <div
                                                                                            class="o_inner_group grid col-lg-6">
                                                                                            <div
                                                                                                class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0 based_price_section base_div">
                                                                                                <div
                                                                                                    class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                                                    <label
                                                                                                        class="o_form_label"
                                                                                                        for="base_20">Based
                                                                                                        price<sup
                                                                                                            class="text-info p-1"
                                                                                                            data-tooltip-template="web.FieldTooltip"
                                                                                                            data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;If the discount type is 'Formula', apply the discount on this price.&quot;}}"
                                                                                                            data-tooltip-touch-tap-to-show="true">?</sup></label>
                                                                                                </div>
                                                                                                <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                                                                    style="width: 100%;">
                                                                                                    <div name="base_10"
                                                                                                        class="o_field_widget o_field_selection o_field_widget_highlight">
                                                                                                        <select
                                                                                                            class="o_input o_field_widget_highlight"
                                                                                                            id="base_020">
                                                                                                            <option
                                                                                                                value="">
                                                                                                            </option>
                                                                                                            <option
                                                                                                                name="basedlist"
                                                                                                                value="list_price_edit"
                                                                                                                id="list_price_edit">
                                                                                                                Sales
                                                                                                                Price
                                                                                                            </option>
                                                                                                            <option
                                                                                                                name="basedlist"
                                                                                                                value="standard_price_654"
                                                                                                                id="standard_price_654">
                                                                                                                Cost
                                                                                                            </option>
                                                                                                            <option
                                                                                                                name="basedlist"
                                                                                                                value="pricelist_654"
                                                                                                                id="pricelist_654">
                                                                                                                Other
                                                                                                                Pricelist
                                                                                                            </option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <!-- sales price discount -->
                                                                                            <div
                                                                                                class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0 discount_formula_hide discount_formula_drop">
                                                                                                <div
                                                                                                    class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                                                    <label
                                                                                                        class="o_form_label"
                                                                                                        for="discount_sales_20">Discounts<sup
                                                                                                            class="text-info p-1"
                                                                                                            data-tooltip-template="web.FieldTooltip"
                                                                                                            data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;If the discount type is 'Formula', apply the discount on this price.&quot;}}"
                                                                                                            data-tooltip-touch-tap-to-show="true">?</sup></label>
                                                                                                </div>
                                                                                                <div class="o_cell flex-grow-1 flex-sm-grow-0"
                                                                                                    style="width: 100%;">
                                                                                                    <div class="o_row"
                                                                                                        style="width: 40% !important;">
                                                                                                        <div name="price_discount"
                                                                                                            class="o_field_widget o_field_float">
                                                                                                            <input
                                                                                                                inputmode="decimal"
                                                                                                                class="o_input"
                                                                                                                autocomplete="off"
                                                                                                                id="price_discount_20"
                                                                                                                type="text">
                                                                                                        </div>
                                                                                                        <span>%</span>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>

                                                                                            <!-- cost Markup Field -->
                                                                                            <div
                                                                                                class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0 markup_hide markup_drop_hide">
                                                                                                <div
                                                                                                    class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                                                    <label
                                                                                                        class="o_form_label"
                                                                                                        for="markup_0">Markup
                                                                                                        (%)</label>
                                                                                                </div>
                                                                                                <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                                                                    style="width: 100%;">
                                                                                                    <div name="markup"
                                                                                                        class="o_field_widget o_field_float">
                                                                                                        <input
                                                                                                            inputmode="decimal"
                                                                                                            class="o_input"
                                                                                                            autocomplete="off"
                                                                                                            id="markup_20"
                                                                                                            type="text">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>

                                                                                            <!-- Other Pricelist Field -->
                                                                                            <div
                                                                                                class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0 other_hide other_pricelist_section">
                                                                                                <!-- Label for the Other Pricelist -->
                                                                                                <div
                                                                                                    class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                                                    <label
                                                                                                        class="o_form_label"
                                                                                                        for="other_pricelist_20">Other
                                                                                                        Pricelist</label>
                                                                                                </div>
                                                                                                <!-- Input for selecting the pricelist with an autocomplete feature -->
                                                                                                <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break other_price_edit_hide"
                                                                                                    style="width: 100%;">
                                                                                                    <div name="base_pricelist_id"
                                                                                                        class="o_field_widget o_required_modifier o_field_many2one">
                                                                                                        <div
                                                                                                            class="o_field_many2one_selection">
                                                                                                            <div
                                                                                                                class="o_input_dropdown">
                                                                                                                <div
                                                                                                                    class="o-autocomplete dropdown">
                                                                                                                    <!-- Autocomplete input field for pricelist selection -->
                                                                                                                    <input
                                                                                                                        type="text"
                                                                                                                        class="o-autocomplete--input o_input"
                                                                                                                        autocomplete="off"
                                                                                                                        role="combobox"
                                                                                                                        aria-autocomplete="list"
                                                                                                                        aria-haspopup="listbox"
                                                                                                                        id="other_pricelist_id_20"
                                                                                                                        placeholder=""
                                                                                                                        aria-expanded="false">
                                                                                                                </div>
                                                                                                                <!-- Dropdown button for opening selection -->
                                                                                                                <span
                                                                                                                    class="o_dropdown_button"></span>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <!-- This section likely handles additional options or info related to the many-to-one field -->
                                                                                                        <div
                                                                                                            class="o_field_many2one_extra">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>

                                                                                            <!-- Round Off Field -->
                                                                                            <div
                                                                                                class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0 round_off_section round_hide">
                                                                                                <div
                                                                                                    class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                                                    <label
                                                                                                        class="o_form_label"
                                                                                                        for="rounding_0">Round
                                                                                                        off</label>
                                                                                                </div>
                                                                                                <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                                                                    style="width: 100%;">
                                                                                                    <div name="rounding"
                                                                                                        class="o_field_widget o_field_float">
                                                                                                        <input
                                                                                                            inputmode="decimal"
                                                                                                            class="o_input"
                                                                                                            autocomplete="off"
                                                                                                            id="rounding_20"
                                                                                                            type="text">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>

                                                                                            <!-- Extra Fee Field -->
                                                                                            <div
                                                                                            class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0 price_surcharge_10 price_hide">
                                                                                                <div
                                                                                                    class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                                                    <label
                                                                                                        class="o_form_label"
                                                                                                        for="price_surcharge_0">Extra
                                                                                                        Fee<sup
                                                                                                            class="text-info p-1"
                                                                                                            data-tooltip-template="web.FieldTooltip"
                                                                                                            data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;Use the discount rules and activate the discount settings in order to show discount to customer.&quot;}}"
                                                                                                            data-tooltip-touch-tap-to-show="true">?</sup></label>
                                                                                                </div>
                                                                                                <div class="o_cell flex-grow-1 flex-sm-grow-0"
                                                                                                    style="width: 100%;">
                                                                                                    <div class="o_row"
                                                                                                        style="width: 40% !important;">
                                                                                                        <div name="price_surcharge"
                                                                                                            class="o_field_widget o_field_monetary">
                                                                                                            <div
                                                                                                                class="text-nowrap d-inline-flex w-100 align-items-baseline position-relative">
                                                                                                                <span
                                                                                                                    class="o_input position-absolute pe-none d-flex w-100"><span
                                                                                                                        class="opacity-0 d-inline-block overflow-hidden mw-100 o_monetary_ghost_value">0.00</span></span><input
                                                                                                                    class="o_input flex-grow-1 flex-shrink-1"
                                                                                                                    autocomplete="off"
                                                                                                                    id="price_surcharge_20"
                                                                                                                    type="text">
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>

                                                                                        </div>
                                                                                            <div
                                                                                                class="col-lg-6 sales_price_edit_00">
                                                                                                <div class="alert alert-info"
                                                                                                    role="alert"
                                                                                                    style="white-space: pre;">
                                                                                                    <div name="rule_tip"
                                                                                                        class="o_field_widget o_readonly_modifier o_field_char">
                                                                                                        <span>Sales Price with a 0 %
                                                                                                            discount and ₹&nbsp;0.00
                                                                                                            extra fee
                                                                                                            &nbsp;Example:
                                                                                                            ₹&nbsp;100.00 * 1.0 +
                                                                                                            ₹&nbsp;0.00 →
                                                                                                            ₹&nbsp;100.00</span>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="alert alert-info"
                                                                                                    role="alert"
                                                                                                    style="white-space: pre;">
                                                                                                    <b>Tip: want to round at
                                                                                                        9.99?</b>
                                                                                                    <div>round off to 10.00 and set
                                                                                                        an extra at -0.01</div>
                                                                                                </div>
                                                                                            </div>
                                                                                            
                                                                                            <div
                                                                                                class="col-lg-6 cost_price_edit_00">
                                                                                                <div class="alert alert-info"
                                                                                                    role="alert"
                                                                                                    style="white-space: pre;">
                                                                                                    <div name="rule_tip"
                                                                                                        class="o_field_widget o_readonly_modifier o_field_char">
                                                                                                        <span>Cost with a 0 % markup
                                                                                                            and ₹&nbsp;0.00 extra
                                                                                                            fee
                                                                                                            Example: ₹&nbsp;100.00 *
                                                                                                            1.0 + ₹&nbsp;0.00 →
                                                                                                            ₹&nbsp;100.00</span>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="alert alert-info"
                                                                                                    role="alert"
                                                                                                    style="white-space: pre;">
                                                                                                    <b>Tip: want to round at
                                                                                                        9.99?</b>
                                                                                                    <div>round off to 10.00 and set
                                                                                                        an extra at -0.01</div>
                                                                                                </div>
                                                                                            </div>
                                                                                            
                                                                                            <div
                                                                                                class="col-lg-6 other_price_edit_00">
                                                                                                <div class="alert alert-info"
                                                                                                    role="alert"
                                                                                                    style="white-space: pre;">
                                                                                                    <div name="rule_tip"
                                                                                                        class="o_field_widget o_readonly_modifier o_field_char">
                                                                                                        <span>Other Pricelist with a
                                                                                                            0 % discount and
                                                                                                            ₹&nbsp;0.00 extra fee
                                                                                                            Example: ₹&nbsp;100.00 *
                                                                                                            1.0 + ₹&nbsp;0.00 →
                                                                                                            ₹&nbsp;100.00</span>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="alert alert-info"
                                                                                                    role="alert"
                                                                                                    style="white-space: pre;">
                                                                                                    <b>Tip: want to round at
                                                                                                        9.99?</b>
                                                                                                    <div>round off to 10.00 and set
                                                                                                        an extra at -0.01</div>
                                                                                                </div>
                                                                                            </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                </main>

                                                                <!-- Modal Footer -->
                                                                <footer class="modal-footer">
                                                                        <button id="list_save_button_2" name="save_button"
                                                                            class="btn btn-primary o_form_button_save">Save
                                                                            & Close</button>
                                                                        <button class="btn btn-secondary o_form_button_cancel"
                                                                            id="discard_button"
                                                                            data-bs-dismiss="modal">Discard</button>
                                                                </footer>
                                                            </div>
                                                        </div>
                                                    </div>


                                        <!-- Modal Structure -->
                                        <div class="modal fade" id="priceRuleModal_1" tabindex="-1"aria-labelledby="priceRuleModalLabel" aria-hidden="true">
                                            <input type="hidden" id="pricelist_id_hidden"value="{{ isset($pricelist) ? $pricelist->id : '' }}">
                                            <div class="modal-dialog modal-dialog-centered modal-xl">
                                                <div class="modal-content o_form_view">
                                                    <!-- Modal Header -->
                                                    <header class="modal-header">
                                                        <h4 class="modal-title text-break">Create
                                                            Pricelist
                                                            Rules</h4>
                                                        <button type="button" class="btn-close"
                                                            data-bs-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </header>
                                                    <!-- Modal Body -->
                                                    <main class="modal-body p-0">
                                                        <div
                                                            class="o_form_renderer o_form_editable d-flex d-print-block flex-nowrap h-100 o_form_dirty">
                                                            <div class="o_form_sheet_bg">
                                                                <div class="o_form_sheet position-relative">
                                                                    <div class="o_group row align-items-start">
                                                                        <div class="o_inner_group grid col-lg-6">
                                                                            <!-- Apply To Radio Buttons -->
                                                                            <div
                                                                                class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0 apply_to_input"id="apply_to_input_values">
                                                                                <div
                                                                                    class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                                    <label class="o_form_label"
                                                                                        for="display_applied_on_0">Apply
                                                                                        To<sup class="text-info p-1"
                                                                                            data-tooltip-template="web.FieldTooltip"
                                                                                            data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;Pricelist Item applicable on selected option&quot;}}"
                                                                                            data-tooltip-touch-tap-to-show="true">?</sup></label>
                                                                                </div>
                                                                                <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                                                    style="width: 100%;">
                                                                                    <div name="display_applied_on"
                                                                                        class="o_field_widget o_required_modifier o_field_radio">
                                                                                        <div role="radiogroup"
                                                                                            class="o_horizontal"
                                                                                            aria-label="Apply To">
                                                                                            <div class="form-check o_radio_item"
                                                                                                aria-atomic="true">
                                                                                                <input type="radio"
                                                                                                    class="form-check-input o_radio_input"
                                                                                                    name="radio_field_4"
                                                                                                    data-value="Product"
                                                                                                    data-index="0"
                                                                                                    id="radio_field_4_1_product">
                                                                                                <label
                                                                                                    class="form-check-label o_form_label"
                                                                                                    for="radio_field_product">Product</label>
                                                                                            </div>
                                                                                            <div class="form-check o_radio_item"
                                                                                                aria-atomic="true">
                                                                                                <input type="radio"
                                                                                                    class="form-check-input o_radio_input"
                                                                                                    name="radio_field_4"
                                                                                                    data-value="Category"
                                                                                                    data-index="1"
                                                                                                    id="radio_field_4_2_product_category">
                                                                                                <label
                                                                                                    class="form-check-label o_form_label"
                                                                                                    for="radio_field_4_2_category">Category</label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <!-- Product Selection -->
                                                                            <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0 product_12 "
                                                                                id="product_input">
                                                                                <div
                                                                                    class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                                    <label class="o_form_label"
                                                                                        for="product_id">Product<sup
                                                                                            class="text-info p-1"
                                                                                            data-tooltip-template="web.FieldTooltip"
                                                                                            data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;Specify a product category if this rule only applies to products belonging to this category or its children categories. Keep empty otherwise.&quot;}}"
                                                                                            data-tooltip-touch-tap-to-show="true">?</sup></label>
                                                                                </div>
                                                                                <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                                                    style="width: 100%;">
                                                                                    <div name="product_id"
                                                                                        class="o_field_widget o_field_many2one">
                                                                                        <div
                                                                                            class="o_field_many2one_selection">
                                                                                            <div
                                                                                                class="o_input_dropdown">
                                                                                                <div
                                                                                                    class="product_select_hide">
                                                                                                    <select
                                                                                                        class="o-autocomplete--input o_input product_drop"
                                                                                                        id="product_id_10">
                                                                                                        <option
                                                                                                            value="">
                                                                                                            Select
                                                                                                            Products
                                                                                                        </option>
                                                                                                        @foreach ($products as $prod)
                                                                                                            <option
                                                                                                                value="{{ $prod->name }}">
                                                                                                                {{ $prod->name }}
                                                                                                            </option>
                                                                                                        @endforeach
                                                                                                        <option
                                                                                                            value="add_product_typing">
                                                                                                            Start
                                                                                                            typing...
                                                                                                        </option>
                                                                                                    </select>
                                                                                                    <input
                                                                                                        type="text"
                                                                                                        id="new_product_type_here"
                                                                                                        placeholder="Enter new Products"
                                                                                                        style="display: none;">
                                                                                                </div>
                                                                                                <span
                                                                                                    class="o_dropdown_button"></span>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div
                                                                                            class="o_field_many2one_extra">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <!-- Category Selection -->
                                                                            <div
                                                                                class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0 category_12"id="category_input">
                                                                                <div
                                                                                    class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                                    <label class="o_form_label"
                                                                                        for="product_tmpl_id">Category<sup
                                                                                            class="text-info p-1"
                                                                                            data-tooltip-template="web.FieldTooltip"
                                                                                            data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;Specify a template if this rule only applies to one product template. Keep empty otherwise.&quot;}}"
                                                                                            data-tooltip-touch-tap-to-show="true">?</sup></label>
                                                                                </div>
                                                                                <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                                                    style="width: 100%;">
                                                                                    <div name="product_tmpl_id"
                                                                                        class="o_field_widget o_field_many2one">
                                                                                        <div
                                                                                            class="o_field_many2one_selection">
                                                                                            <div
                                                                                                class="o_input_dropdown">
                                                                                                <div
                                                                                                    class="category_select_hide">
                                                                                                    <select
                                                                                                        class="o-autocomplete--input o_input category_drop_down"
                                                                                                        id="category_id_0">
                                                                                                        <option
                                                                                                            value="">
                                                                                                            Select
                                                                                                            Categorys
                                                                                                        </option>
                                                                                                        @foreach ($categories as $categorie)
                                                                                                            <option
                                                                                                                value="{{ $categorie->categories_name }}">
                                                                                                                {{ $categorie->categories_name }}
                                                                                                            </option>
                                                                                                        @endforeach
                                                                                                        <option
                                                                                                            value="add_category_typing">
                                                                                                            Start
                                                                                                            typing...
                                                                                                        </option>
                                                                                                    </select>
                                                                                                    <input
                                                                                                        type="text"
                                                                                                        id="new_category_type_here"
                                                                                                        style="display: none;"
                                                                                                        placeholder="Enter new Cetegory">
                                                                                                </div>
                                                                                                <span
                                                                                                    class="o_dropdown_button"></span>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div
                                                                                            class="o_field_many2one_extra">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <!-- Price Type Radio Buttons -->
                                                                            <div
                                                                                class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0 price_type_value"id="price_type_input">
                                                                                <div
                                                                                    class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                                    <label class="o_form_label"
                                                                                        for="compute_price">Price
                                                                                        Type<sup class="text-info p-1"
                                                                                            data-tooltip-template="web.FieldTooltip"
                                                                                            data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;Use the discount rules and activate the discount settings in order to show discount to customer.&quot;}}"
                                                                                            data-tooltip-touch-tap-to-show="true">?</sup></label>
                                                                                </div>

                                                                                <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                                                    style="width: 100%;"
                                                                                    id=compute_price>
                                                                                    <div name="compute_price_0"
                                                                                        class="o_field_widget o_required_modifier o_field_radio">
                                                                                        <div role="radiogroup"
                                                                                            class="o_horizontal"
                                                                                            aria-label="Price Type">
                                                                                            <div class="form-check o_radio_item"
                                                                                                aria-atomic="true">
                                                                                                <input type="radio"
                                                                                                    class="form-check-input o_radio_input"
                                                                                                    name="radio_field_5"
                                                                                                    data-value="Discount"
                                                                                                    data-index="0"
                                                                                                    id="radio_field_5_percentage">
                                                                                                <label
                                                                                                    class="form-check-label o_form_label"
                                                                                                    for="radio_field_5_percentage">Discount</label>
                                                                                            </div>
                                                                                            <div class="form-check o_radio_item"
                                                                                                aria-atomic="true">
                                                                                                <input type="radio"
                                                                                                    class="form-check-input o_radio_input"
                                                                                                    name="radio_field_5"
                                                                                                    data-value="Formula"
                                                                                                    data-index="1"
                                                                                                    id="radio_field_5_formula">
                                                                                                <label
                                                                                                    class="form-check-label o_form_label"
                                                                                                    for="radio_field_5_formula">Formula</label>
                                                                                            </div>
                                                                                            <div class="form-check o_radio_item"
                                                                                                aria-atomic="true">
                                                                                                <input type="radio"
                                                                                                    class="form-check-input o_radio_input"
                                                                                                    name="radio_field_5"
                                                                                                    data-value="Fixed"
                                                                                                    data-index="2"
                                                                                                    id="radio_field_5_fixed">
                                                                                                <label
                                                                                                    class="form-check-label o_form_label"
                                                                                                    for="radio_field_5_fixed">Fixed
                                                                                                    Price</label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <!-- Fixed Price -->
                                                                            <div
                                                                                class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0 fix_price_0 fix_hide_div"id="fixed_price_input">

                                                                                <div
                                                                                    class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                                    <label class="o_form_label"
                                                                                        for="compute_price_0">Fixed
                                                                                        Price<sup class="text-info p-1"
                                                                                            data-tooltip-template="web.FieldTooltip"
                                                                                            data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;Use the discount rules and activate the discount settings in order to show discount to customer.&quot;}}"
                                                                                            data-tooltip-touch-tap-to-show="true">?</sup></label>
                                                                                </div>
                                                                                <div class="o_cell flex-grow-1 flex-sm-grow-0"
                                                                                    style="width: 100%;">
                                                                                    <div class="o_row"
                                                                                        style="width: 40% !important;">
                                                                                        <div name="fixed_price"
                                                                                            class="o_field_widget o_field_monetary">
                                                                                            <div
                                                                                                class="text-nowrap d-inline-flex w-100 align-items-baseline position-relative">
                                                                                                <span
                                                                                                    class="o_input position-absolute pe-none d-flex w-100"><span
                                                                                                        class="opacity-0 d-inline-block overflow-hidden mw-100 o_monetary_ghost_value">0.00</span></span><input
                                                                                                    class="o_input flex-grow-1 flex-shrink-1"
                                                                                                    autocomplete="off"
                                                                                                    id="fix_price_10"
                                                                                                    type="text">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <!-- Discount button in discount -->
                                                                            <div
                                                                                class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0 discount_hide_div">
                                                                                <div
                                                                                    class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                                    <label class="o_form_label"
                                                                                        for="discount">Discount<sup
                                                                                            class="text-info p-1"
                                                                                            data-tooltip-template="web.FieldTooltip"
                                                                                            data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;Use the discount rules and activate the discount settings in order to show discount to customer.&quot;}}"
                                                                                            data-tooltip-touch-tap-to-show="true">?</sup></label>
                                                                                </div>
                                                                                <div class="o_cell flex-grow-1 flex-sm-grow-0"
                                                                                    style="width: 100%;">
                                                                                    <div class="o_row gap-3">
                                                                                        <div name="percent_price"
                                                                                            class="o_field_widget o_field_float">
                                                                                            <input inputmode="decimal"
                                                                                                class="o_input"
                                                                                                autocomplete="off"
                                                                                                id="percent_price_0"
                                                                                                type="text">
                                                                                        </div>
                                                                                        <span>%</span><span>on</span>
                                                                                        <div name="base_pricelist_id"
                                                                                            class="o_field_widget o_field_many2one">
                                                                                            <div
                                                                                                class="o_field_many2one_selection">
                                                                                                <div
                                                                                                    class="o_input_dropdown">
                                                                                                    <div
                                                                                                        class="o-autocomplete dropdown">
                                                                                                        <select
                                                                                                            class="o-autocomplete--input o_input"
                                                                                                            id="sales_id_10">
                                                                                                            <option
                                                                                                                value="">
                                                                                                                Recommend
                                                                                                                when......
                                                                                                            </option>
                                                                                                            @foreach ($sale_price as $sale_prices)
                                                                                                                <option
                                                                                                                    value="{{ $sale_prices->sale_price_name }}">
                                                                                                                    {{ $sale_prices->sale_price_name }}
                                                                                                                </option>
                                                                                                            @endforeach
                                                                                                            <option
                                                                                                                value="add_sales_price">
                                                                                                                Start
                                                                                                                typing...
                                                                                                            </option>
                                                                                                        </select>
                                                                                                        <input
                                                                                                            type="text"
                                                                                                            id="type_here"
                                                                                                            placeholder="Write here..."
                                                                                                            style="display:none;">
                                                                                                    </div>
                                                                                                    <span
                                                                                                        class="o_dropdown_button"></span>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div
                                                                                                class="o_field_many2one_extra">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <!-- Other Fields (Min Qty, Validity Period) -->
                                                                        <div class="o_inner_group grid col-lg-6">

                                                                            <div
                                                                                class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0 min_qty_values"id="min_qty_input">
                                                                                <div
                                                                                    class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                                    <label class="o_form_label"
                                                                                        for="min_quantity_0">Min
                                                                                        Qty<sup class="text-info p-1"
                                                                                            data-tooltip-template="web.FieldTooltip"
                                                                                            data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;For the rule to apply, bought/sold quantity must be greater than or equal to the minimum quantity specified in this field.\nExpressed in the default unit of measure of the product.&quot;}}"
                                                                                            data-tooltip-touch-tap-to-show="true">?</sup></label>
                                                                                </div>
                                                                                <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                                                    style="width: 100%;">
                                                                                    <div name="min_quantity"
                                                                                        class="o_field_widget o_field_float">
                                                                                        <input inputmode="decimal"
                                                                                            class="o_input"
                                                                                            autocomplete="off"
                                                                                            id="min_quantity_00"
                                                                                            type="text">
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0"
                                                                                id="date_time_0">
                                                                                <div
                                                                                    class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                                    <label class="o_form_label"
                                                                                        for="start_date">Validity
                                                                                        Period
                                                                                        <sup
                                                                                            class="text-info p-1">?</sup>
                                                                                    </label>
                                                                                </div>
                                                                                <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                                                    style="width: 60%;">
                                                                                    <div
                                                                                        class="o_field_widget o_field_daterange">
                                                                                        <div
                                                                                            class="d-flex gap-2 align-items-center">
                                                                                            <input type="text"
                                                                                                class="o_input cursor-pointer"
                                                                                                autocomplete="off"
                                                                                                id="start_date_10"
                                                                                                data-field="startDateDisplay">
                                                                                            <input type="text"
                                                                                                class="o_input cursor-pointer"
                                                                                                autocomplete="off"
                                                                                                id="end_date_10"
                                                                                                data-field="endDateDisplay">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- Group for Base Price, Markup, Round Off, Extra Fee -->
                                                                    <div class="o_group row align-items-start">
                                                                        <div class="o_inner_group grid col-lg-6">
                                                                            <div
                                                                                class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0 based_price_section base_hide_div"id="based_value_input">
                                                                                <div
                                                                                    class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                                    <label class="o_form_label"
                                                                                        for="base_0">Based
                                                                                        price<sup class="text-info p-1"
                                                                                            data-tooltip-template="web.FieldTooltip"
                                                                                            data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;If the discount type is 'Formula', apply the discount on this price.&quot;}}"
                                                                                            data-tooltip-touch-tap-to-show="true">?</sup></label>
                                                                                </div>
                                                                                <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                                                    style="width: 100%;">
                                                                                    <div name="base_10"
                                                                                        class="o_field_widget o_field_selection o_field_widget_highlight">
                                                                                        <select
                                                                                            class="o_input o_field_widget_highlight"
                                                                                            id="base_0">
                                                                                            <option value="">
                                                                                            </option>
                                                                                            <option name="basedlist_10"
                                                                                                value="list_price">
                                                                                                Sales
                                                                                                Price
                                                                                            </option>
                                                                                            <option name="basedlist_10"
                                                                                                value="standard_price">
                                                                                                Cost
                                                                                            </option>
                                                                                            <option name="basedlist_10"
                                                                                                value="pricelist">
                                                                                                Other
                                                                                                Pricelist
                                                                                            </option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <!-- sales price discount -->
                                                                            <div
                                                                                class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0 discount_formula_section disc_hide_sales_div">
                                                                                <div
                                                                                    class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                                    <label class="o_form_label"
                                                                                        for="base_0">Discounts<sup
                                                                                            class="text-info p-1"
                                                                                            data-tooltip-template="web.FieldTooltip"
                                                                                            data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;If the discount type is 'Formula', apply the discount on this price.&quot;}}"
                                                                                            data-tooltip-touch-tap-to-show="true">?</sup></label>
                                                                                </div>
                                                                                <div class="o_cell flex-grow-1 flex-sm-grow-0"
                                                                                    style="width: 100%;">
                                                                                    <div class="o_row"
                                                                                        style="width: 40% !important;">
                                                                                        <div name="price_discount"
                                                                                            class="o_field_widget o_field_float">
                                                                                            <input inputmode="decimal"
                                                                                                class="o_input"
                                                                                                autocomplete="off"
                                                                                                id="price_discount_0"
                                                                                                type="text">
                                                                                        </div>
                                                                                        <span>%</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <!-- cost Markup Field -->
                                                                            <div
                                                                                class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0 markup_section"id="markup_input">
                                                                                <div
                                                                                    class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                                    <label class="o_form_label"
                                                                                        for="markup_10">Markup
                                                                                        (%)</label>
                                                                                </div>
                                                                                <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                                                    style="width: 100%;">
                                                                                    <div name="markup"
                                                                                        class="o_field_widget o_field_float">
                                                                                        <input inputmode="decimal"
                                                                                            class="o_input"
                                                                                            autocomplete="off"
                                                                                            id="markup_100"
                                                                                            type="text">
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <!-- Other Pricelist Field -->
                                                                            <div
                                                                                class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0 other_price_hide other_pricelist_section"id="other_Pricelist_input">
                                                                                <!-- Label for the Other Pricelist -->
                                                                                <div
                                                                                    class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                                    <label class="o_form_label"
                                                                                        for="base_pricelist_id_10">Other
                                                                                        Pricelist</label>
                                                                                </div>

                                                                                <!-- Input for selecting the pricelist with an autocomplete feature -->
                                                                                <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                                                    style="width: 100%;">
                                                                                    <div name="base_pricelist_id"
                                                                                        class="o_field_widget o_required_modifier o_field_many2one">
                                                                                        <div
                                                                                            class="o_field_many2one_selection">
                                                                                            <div
                                                                                                class="o_input_dropdown">
                                                                                                <div
                                                                                                    class="o-autocomplete dropdown">
                                                                                                    <!-- Autocomplete input field for pricelist selection -->
                                                                                                    <input
                                                                                                        type="text"
                                                                                                        class="o-autocomplete--input o_input"
                                                                                                        autocomplete="off"
                                                                                                        role="combobox"
                                                                                                        aria-autocomplete="list"
                                                                                                        aria-haspopup="listbox"
                                                                                                        id="base_pricelist_id_1"
                                                                                                        placeholder=""
                                                                                                        aria-expanded="false">
                                                                                                </div>
                                                                                                <!-- Dropdown button for opening selection -->
                                                                                                <span
                                                                                                    class="o_dropdown_button"></span>
                                                                                            </div>
                                                                                        </div>
                                                                                        <!-- This section likely handles additional options or info related to the many-to-one field -->
                                                                                        <div
                                                                                            class="o_field_many2one_extra">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <!-- Round Off Field -->
                                                                            <div
                                                                                class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0 round_off_section round_hide_input"id="round_off">
                                                                                <div
                                                                                    class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                                    <label class="o_form_label"
                                                                                        for="rounding_10">Round
                                                                                        off</label>
                                                                                </div>
                                                                                <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                                                    style="width: 100%;">
                                                                                    <div name="rounding"
                                                                                        class="o_field_widget o_field_float">
                                                                                        <input inputmode="decimal"
                                                                                            class="o_input"
                                                                                            autocomplete="off"
                                                                                            id="rounding_10"
                                                                                            type="text">
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <!-- Extra Fee Field -->
                                                                            <div
                                                                                class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0 price_surcharge_0 price_hide_div"id="extra_fee_input">
                                                                                <div
                                                                                    class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                                    <label class="o_form_label"
                                                                                        for="price_surcharge_0">Extra
                                                                                        Fee</label>
                                                                                </div>
                                                                                <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                                                    style="width: 100%;">
                                                                                    <div name="price_surcharge"
                                                                                        class="o_field_widget o_field_float">
                                                                                        <input inputmode="decimal"
                                                                                            class="o_input"
                                                                                            autocomplete="off"
                                                                                            id="price_surcharge_10"
                                                                                            type="text">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6 sales_price_00">
                                                                            <div class="alert alert-info"
                                                                                role="alert"
                                                                                style="white-space: pre;">
                                                                                <div name="rule_tip"
                                                                                    class="o_field_widget o_readonly_modifier o_field_char">
                                                                                    <span>Sales Price with a 0 %
                                                                                        discount and ₹&nbsp;0.00 extra
                                                                                        fee
                                                                                        &nbsp;Example: ₹&nbsp;100.00 *
                                                                                        1.0 + ₹&nbsp;0.00 →
                                                                                        ₹&nbsp;100.00</span></div>
                                                                            </div>
                                                                            <div class="alert alert-info"
                                                                                role="alert"
                                                                                style="white-space: pre;"><b>Tip: want
                                                                                    to round at 9.99?</b>
                                                                                <div>round off to 10.00 and set an extra
                                                                                    at -0.01</div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6 cost_price_00">
                                                                            <div class="alert alert-info"
                                                                                role="alert"
                                                                                style="white-space: pre;">
                                                                                <div name="rule_tip"
                                                                                    class="o_field_widget o_readonly_modifier o_field_char">
                                                                                    <span>Cost with a 0 % markup and
                                                                                        ₹&nbsp;0.00 extra fee
                                                                                        Example: ₹&nbsp;100.00 * 1.0 +
                                                                                        ₹&nbsp;0.00 →
                                                                                        ₹&nbsp;100.00</span></div>
                                                                            </div>
                                                                            <div class="alert alert-info"
                                                                                role="alert"
                                                                                style="white-space: pre;"><b>Tip: want
                                                                                    to round at 9.99?</b>
                                                                                <div>round off to 10.00 and set an extra
                                                                                    at -0.01</div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6 other_price_00">
                                                                            <div class="alert alert-info"
                                                                                role="alert"
                                                                                style="white-space: pre;">
                                                                                <div name="rule_tip"
                                                                                    class="o_field_widget o_readonly_modifier o_field_char">
                                                                                    <span>Other Pricelist with a 0 %
                                                                                        discount and ₹&nbsp;0.00 extra
                                                                                        fee
                                                                                        Example: ₹&nbsp;100.00 * 1.0 +
                                                                                        ₹&nbsp;0.00 →
                                                                                        ₹&nbsp;100.00</span></div>
                                                                            </div>
                                                                            <div class="alert alert-info"
                                                                                role="alert"
                                                                                style="white-space: pre;"><b>Tip: want
                                                                                    to round at 9.99?</b>
                                                                                <div>round off to 10.00 and set an extra
                                                                                    at -0.01</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </main>

                                                    <!-- Modal Footer -->
                                                    <footer class="modal-footer">
                                                        <button id="list_save_button_1" name="save_button"
                                                            class="btn btn-primary o_form_button_save">Save
                                                            & Close</button>
                                                        <button class="btn btn-secondary o_form_button_cancel"
                                                            id="discard_button"
                                                            data-bs-dismiss="modal">Discard</button>
                                                    </footer>
                                                </div>
                                            </div>
                                        </div>
                                        <tr>
                                            <td colspan="7">&ZeroWidthSpace;</td>
                                        </tr>
                                        <tr>
                                            <td colspan="7">&ZeroWidthSpace;</td>
                                        </tr>
                                        <tr>
                                            <td colspan="7">&ZeroWidthSpace;</td>
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
                                                    <th data-tooltip-delay="1000" tabindex="-1" data-name="price"
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
                                                    <th data-tooltip-delay="1000" tabindex="-1" data-name="price"
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

@push('scripts')
<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>





<!-- Product Category Radio Buttons -->
<script>
    $(document).ready(function() {
        // Default state for radio button
        $("#radio_field_4_1_product").prop("checked", true);
        $(".product_12").show();
        $(".category_12").attr("style", "display:none !important");

        // Radio button change for category
        $("#radio_field_4_2_product_category").change(function() {
            $(".product_12").attr("style", "display:none !important");
            $(".category_12").show(); // Show category section
        });

        // Radio button change for product
        $("#radio_field_4_1_product").change(function() {
            $(".product_12").show(); // Show product section
            $(".category_12").attr("style", "display:none !important");
        });
    });
</script>

<!-- Price Type Radio Buttons -->
<script>
    $("#radio_field_5_fixed").prop("checked", true);
    $(".fix_hide_div").show();
    $('.base_hide_div, .round_hide_input, .price_hide_div, .discount_hide_div, .discount_formula_section, .markup_section, .other_price_hide')
        .attr("style", "display:none !important");

    // Radio button change for Fixed Price
    $("#radio_field_5_percentage").change(function() {
        $(".discount_hide_div").show();
        $('.base_hide_div, .round_hide_input, .price_hide_div, .fix_hide_div, .discount_formula_section, .markup_section, .other_price_hide')
            .attr("style", "display:none !important");
    });

    // Radio button change for product
    $("#radio_field_5_formula").change(function() {
        $(".base_hide_div, .round_hide_input, .price_hide_div").show();
        $('.fix_hide_div, .discount_hide_div').attr("style", "display:none !important");
    });

    // Radio button change for Fixed Price
    $("#radio_field_5_fixed").change(function() {
        $(".fix_hide_div").show();
        $('.base_hide_div, .round_hide_input, .price_hide_div, .discount_hide_div, .discount_formula_section, .markup_section, .other_price_hide')
            .attr("style", "display:none !important");
    });
</script>

<!-- Edit Based Price Drop Down List -->
<script>
    $(document).ready(function() {
        // Set default value to 'list_price'
        //$('#base_0').val('list_price');

        // Handle changes for Base Price dropdown
        $('#base_0').on('change', function() {
            // Hide all related sections by default
            $('.discount_formula_section, .markup_section, .other_price_hide,.sales_price_00, .cost_price_00, .other_price_00')
                .attr("style",
                    "display:none !important");

            // Check the value of the selected dropdown
            if ($(this).val() === 'list_price') {
                $('.discount_formula_section,.sales_price_00').show();
                $('.other_price_hide,.markup_section, .cost_price_00, .other_price_00').attr("style",
                    "display:none !important");

            } else if ($(this).val() === 'standard_price') {
                $('.markup_section,.cost_price_00').show();
                $('.other_price_hide, .discount_formula_section,.sales_price_00, .other_price_00').attr(
                    "style",
                    "display:none !important");

            } else if ($(this).val() === 'pricelist') {
                $('.other_price_hide, .discount_formula_section, .other_price_00').show();
                $('.markup_section,.sales_price_00, .cost_price_00').attr("style",
                    "display:none !important");

            }
        });

        // Trigger the change event on page load to show the default section
        $('#base_0').trigger('change');
    });
</script>

<!-- Main Page Save And Event page Save  Buttons -->
<script>
    $(document).ready(function() {
        var modelIds = [];

        // Event listener for the first save button
        $('#list_save_button_1').click(function(event) {
            event.preventDefault();

            var formData = new FormData();
            var id = $('#pricelist_id_hidden').val();
            var apply_to = $('#radio_field_4').val();
            var product_Name = $('#product_id_10').val(); // Declare here
            var category_name = $('#category_id_0').val(); // Declare here
            var price_type = $('#radio_field_5').val();
            var discount = $('#percent_price_0').val();
            var sale_price_name = $('#sales_id_10').val();
            var based_price = $('#basedlist_10').val();
            var discount_sales = $('#price_discount_0').val();
            var markup = $('#markup_100').val();
            var other_pricelist = $('#base_pricelist_id_1').val();
            var round_of_to = $('#rounding_10').val();
            var extra_fee = $('#price_surcharge_10').val();
            var fixed_price = $('#fix_price_10').val();
            var min_qty = $('#min_quantity_00').val();
            var strat_date = $('#start_date_10').val();
            var end_date = $('#end_date_10').val();

            var formData = new FormData();
            formData.append('id', id);
            formData.append('apply_to', $('input[name="radio_field_4"]:checked').data("value"));
            formData.append('product_Name', product_Name);
            formData.append('category_name', category_name);
            formData.append('price_type', $('input[name="radio_field_5"]:checked').data("value"));
            formData.append('discount', discount);
            formData.append('sale_price_name', sale_price_name);
            formData.append('based_price', $('#base_0').val());
            formData.append('markup', markup);
            formData.append('discount_sales', discount_sales);
            formData.append('other_pricelist', $('#base_pricelist_id_1').val());
            formData.append('round_of_to', $('#rounding_0').val());
            formData.append('extra_fee', extra_fee);
            formData.append('fixed_price', fixed_price);
            formData.append('min_qty', min_qty);
            formData.append('strat_date', strat_date);
            formData.append('end_date', end_date);
            formData.append('_token', '{{ csrf_token() }}');

            $.ajax({
                url: '{{ route('pricelist.store') }}',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    console.log(response);
                    var savedPricelistId = response.id;
                    modelIds.push(savedPricelistId);

                    $('#model_id').val(modelIds.join(','));

                    // Create the "applyOn" variable
                    var applyOn = product_Name ? product_Name : category_name ?
                        `Category: ${category_name}` : '';

                    // Determine the "price" column value
                    var price = '';
                    if (discount) price += `${discount}% Discount`;
                    if (fixed_price) price += `${fixed_price} Fixed Price`;
                    if (markup) price += (price ? ' AND ' : '') + `${markup}% Markup`;
                    if (discount_sales) price += (price ? ' AND ' : '') + `${discount_sales}% Discount`;
                    if (extra_fee) price += (price ? ' AND ' : '') + `${extra_fee}% Surcharge`;
                    price = price || '00.00';

                    // Build the new row with a data attribute
                    var newRow =
                        `<tr data-index="${modelIds.length - 1}">
                        <td>${applyOn}</td>
                        <td>${price}</td>
                        <td>${min_qty || '00.00'}</td>
                        <td>${strat_date || ''}</td>
                        <td>${end_date || ''}</td>
                        <td>
                            <button class="index-edit-btn button-small" style="border: none; background: transparent; data-id="${savedPricelistId}"
                            data-apply_to="${apply_to}"
                            data-product_Name="${product_Name}"
                            data-category="${category_name}"
                            data-price_type="${price_type}"
                            data-discount="${discount}"
                            data-sale_price_name="${sale_price_name}"
                            data-based_price="${based_price}"
                            data-discount_sales="${discount_sales}"
                            data-markup="${markup}"
                            data-other_pricelist="${other_pricelist}"
                            data-round_of_to="${round_of_to}"
                            data-extra_fee="${extra_fee}"
                            data-fixed_price="${fixed_price}"
                            data-min_oty="${min_qty}"
                            data-strat_date="${strat_date }"
                            data-end_date="${end_date}">
                                <i class="fa fa-edit"></i>
                            </button>
                        </td>
                        <td>
                            <button class="delete-btn button-small" style="border: none; background: transparent; data-id="${savedPricelistId}">
                                <i class="fa fa-trash"></i>
                            </button>
                        </td>
                    </tr>`;

                    $('.Add_line_09_new').parent().before(newRow);

                    clearFields();
                    $('#priceRuleModal_1').modal('hide');

                },
                error: function() {
                    toastr.error('Something went wrong!');
                }
            });
        });



        // Event listener for the second save button
        $('#main_save_btn').click(function(event) {
            event.preventDefault(); // Prevent default form submission

            // Retrieve the pricelist ID from the hidden input
            var pricelist_id = $('#pricelist_ids').val();
            var pricelist_name = $('#name_0').val();
            var country = $('#country_id_0').val();
            var pricelistes_id = $('#pricelist_id_hidden')
        .val(); // Make sure this is populated correctly
            var modelId = pricelist_id;

            // Check if 'name_0' is empty, and validate
            if (!pricelist_name) {
                toastr.error('Name is required');
                $('#name_0').css({
                    'border-color': 'red',
                    'background-color': '#ff99993d'
                });
                return; // Stop form submission
            }

            // Create FormData and send AJAX request
            var formData = new FormData();
            formData.append('pricelist_id', pricelist_id); // Append the ID
            formData.append('pricelist_name', pricelist_name);
            formData.append('country', country);
            formData.append('pricelistes_id', pricelistes_id); // Ensure pricelistes_id is included
            formData.append('_token', '{{ csrf_token() }}'); // Ensure CSRF token is included
            formData.append('modelIds', modelIds.join(','));

            // AJAX request to submit the form data to the server
            $.ajax({
                url: '{{ route('pricelist.store.main') }}',
                type: 'POST',
                data: formData,
                processData: false, // Prevent jQuery from transforming the data into a query string
                contentType: false, // Prevent jQuery from setting content type
                success: function(response) {
                    toastr.success(response.message); // Notify success
                    setTimeout(function() {
                        window.location.href =
                            "{{ route('pricelists.index') }}"; // Redirect after successful submission
                    }, 2000);
                },
                error: function(xhr, status, error) {
                    toastr.error('Something went wrong!'); // Notify error
                }
            });
        });

        // Function to clear form fields after submission
        function clearFields() {
        $('#pricelist_id_hidden').val('');
        $('#radio_field_4').val('');
        $('#product_id_10').val(''); 
        $('#category_id_0').val(''); 
        $('#radio_field_5').val('');
        $('#percent_price_0').val('');
        $('#sales_id_10').val('');
        $('#basedlist_10').val('');
        $('#price_discount_0').val('');
        $('#markup_100').val('');
        $('#base_pricelist_id_1').val('');
        $('#rounding_10').val('');
        $('#price_surcharge_10').val('');
        $('#fix_price_10').val('');
        $('#min_quantity_00').val('');
        $('#start_date_10').val('');
        $('#end_date_10').val('');
        }
    });
</script>

<!-- calender And New Product New Category Input Buttons -->
<script>
    $(document).ready(function() {

        $('#start_date_10, #end_date_10').daterangepicker({
            timePicker: true,
            timePicker24Hour: true,
            timePickerIncrement: 1,
            locale: {
                format: "YYYY-MM-DD HH:mm"
            }
        }, function(start, end) {
            $('#start_date_10').val(start.format("YYYY-MM-DD HH:mm"));
            $('#end_date_10').val(end.format("YYYY-MM-DD HH:mm"));
        });

        // Function to set the current date and time
        function setCurrentDateTime() {
            var currentDateTime = moment().format("YYYY-MM-DD HH:mm");

            // Set current date and time if input is empty
            if ($('#start_date_10').val() === '') {
                $('#start_date_10').val(currentDateTime);
            }
            if ($('#end_date_10').val() === '') {
                $('#end_date_10').val(currentDateTime);
            }
        }

        // Call the function to set the current date and time on page load
        setCurrentDateTime();

        // Optional: Set current time on focus if input is still empty
        $('#start_date').on('focus', function() {
            if ($(this).val() === '') {
                $(this).val(moment().format("YYYY-MM-DD HH:mm"));
            }
        });

        $('#end_date').on('focus', function() {
            if ($(this).val() === '') {
                $(this).val(moment().format("YYYY-MM-DD HH:mm"));
            }
        });

        // second part//

        // Show text input for sales when "Start typing..." is selected
        $('#sales_id_10').on('change', function() {
            if ($(this).val() === 'add_sales_price') {
                $(this).hide(); // Hide the dropdown
                $('#type_here').show().focus(); // Show the text input and focus on it
            }
        });

        // Handle blur event for the sales text input
        $('#type_here').on('blur', function() {
            if ($(this).val().trim() === '') {
                $(this).hide(); // Hide text input if empty
                $('#sales_id_10').show(); // Show the select dropdown
                $('#sales_id_10').val(''); // Reset dropdown selection
            }
        });

        // Show text input for products when "Start typing..." is selected
        $('.product_drop').on('change', function() {
            if ($(this).val() === 'add_product_typing') {
                $(this).hide(); // Hide the dropdown
                $('#new_product_type_here').show().focus(); // Show the text input and focus on it
            }
        });

        // Third part//

        // Handle blur event for the product text input
        $('#new_product_type_here').on('blur', function() {
            var newProduct = $(this).val().trim(); // Get the new product name
            if (newProduct !== '') {
                // Add the new product to the dropdown dynamically
                $('.product_drop').append(
                    `<option value="${newProduct}" selected>${newProduct}</option>`);
                // Hide the text input and show the dropdown
                $(this).hide();
                $('.product_drop').show();
            } else {
                // If no product is typed, revert to showing the dropdown
                $(this).hide();
                $('.product_drop').show();
                $('.product_drop').val(''); // Reset dropdown selection
            }
        });

        // Four part//

        // Show text input for categories when "Start typing..." is selected
        $('.category_drop_down').on('change', function() {
            if ($(this).val() === 'add_category_typing') {
                $(this).hide(); // Hide the dropdown
                $('#new_category_type_here').show().focus(); // Show the text input and focus on it
            }
        });

        // Handle blur event for the category text input
        $('#new_category_type_here').on('blur', function() {
            var newCategory = $(this).val().trim(); // Get the new category name
            if (newCategory !== '') {
                // Add the new category to the dropdown dynamically
                $('.category_drop_down').append(
                    `<option value="${newCategory}" selected>${newCategory}</option>`);
                // Hide the text input and show the dropdown
                $(this).hide();
                $('.category_drop_down').show();
            } else {
                // If no category is typed, revert to showing the dropdown
                $(this).hide();
                $('.category_drop_down').show();
                $('.category_drop_down').val(''); // Reset dropdown selection
            }
        });

        // Five part//

        // Initialize select2 for country selection
        $("#country_id_0").select2({
            placeholder: "Select country",
            allowClear: true
        });
    });
</script>

<!-- Pop Event Save And Discard Buttons -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
    // Ensure elements are only accessed if they exist
    const saveButton = document.getElementById('list_save_button');
    const discardButton = document.querySelector('.o_form_button_cancel');

    if (saveButton) {
        // Save & Close button click event
        saveButton.addEventListener('click', function() {
            // Perform any save logic here
            $('#priceRuleModal_1').modal('hide');
        });
    }

    if (discardButton) {
        // Discard button click event
        discardButton.addEventListener('click', function() {
            $('#priceRuleModal_1').modal('hide');
        });
    }
    });
</script> 

<!-- Delete Row Buttons -->
<script>
    $(document).on('click', '.delete-btn', function(event) {
        event.preventDefault();

        var row = $(this).closest('tr');
        var id = $(this).data('id');

        // Directly proceed with deletion without confirmation
        $.ajax({
            url: `/pricelist/${id}`,
            type: 'DELETE',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                row.remove();
                toastr.success('Item deleted successfully!');
            },
            error: function() {
                toastr.error('Error deleting item.');
            }
        });
    });
</script>

<!-- Edit Product Category Radio Buttons -->
<script>
    $(document).ready(function() {
        // Default state for radio button
        $("#radio_field_4_2_product").prop("checked", true);
        $(".product_90").show();
        $(".category_90").attr("style", "display:none !important");

        // Radio button change for category
        $("#radio_field_4_3_product_category").change(function() {
            $(".product_90").attr("style", "display:none !important");
            $(".category_90").show(); // Show category section
        });

        // Radio button change for product
        $("#radio_field_4_2_product").change(function() {
            $(".product_90").show(); // Show product section
            $(".category_90").attr("style", "display:none !important");
        });

        // Trigger the change event on page load to show the default section
        $('#radio_field_4_2_product').trigger('change');
    });
</script> 

<!-- Edit Price Type Radio Buttons -->
<script>
    $("#fixed_radio").prop("checked", true);
    $(".fix_div").show();
    $('.base_div, .round_hide, .price_hide, .discount_hide, .discount_formula_hide, .markup_hide, .other_hide')
        .attr("style", "display:none !important");

    // Radio button change for Fixed Price
    $("#radio_field_5_percentage").change(function() {
        $(".discount_hide").show();
        $('.base_div, .round_hide, .price_hide, .fix_div, .discount_formula_hide, .markup_hide, .other_hide')
            .attr("style", "display:none !important");
    });

    // Radio button change for product
    $("#radio_field_5_formula").change(function() {
        $(".base_div, .round_hide, .price_hide").show();
        $('.fix_div, .discount_hide').attr("style", "display:none !important");
    });

    // Radio button change for Fixed Price
    $("#fixed_radio").change(function() {
        $(".fix_div").show();
        $('.base_div, .round_hide, .price_hide, .discount_hide, .discount_formula_hide, .markup_hide, .other_hide')
            .attr("style", "display:none !important");
    });
</script>

<!-- Edit Based Price Drop Down List -->
<script>
    function handleBasePriceChange(selectedValue) {
        // Hide all sections by default
        $('.discount_formula_drop, .markup_drop_hide, .other_price_edit_hide, .sales_price_edit_00, .cost_price_edit_00, .other_price_edit_00')
            .attr("style", "display:none !important");

        // Show specific sections based on the selected value
        if (selectedValue === 'list_price_edit') {
            $('.discount_formula_drop,.sales_price_edit_00').show();
            $('.other_price_edit_hide,.markup_drop_hide, .cost_price_edit_00, .other_price_edit_00').attr("style", "display:none !important");

        } else if (selectedValue === 'standard_price_654') {
            $('.markup_drop_hide,.cost_price_edit_00').show();
            $('.other_price_edit_hide, .discount_formula_drop,.sales_price_edit_00, .other_price_edit_00').attr("style", "display:none !important");

        } else if (selectedValue === 'pricelist_654') {
            $('.other_price_edit_hide, .discount_formula_drop, .other_price_edit_00').show();
            $('.markup_drop_hide,.sales_price_edit_00, .cost_price_edit_00').attr("style", "display:none !important");
        }
    }

    // Handle changes for Base Price dropdown
    $('#base_020').on('change', function() {
        const selectedValue = $(this).val(); // Get the selected value
        handleBasePriceChange(selectedValue); // Call the function with the selected value
    });
</script>

<!-- Edit calender And New Product New Category Input Buttons -->
<script>
    $(document).ready(function() {

        $('#start_date_20, #end_date_20').daterangepicker({
            timePicker: true,
            timePicker24Hour: true,
            timePickerIncrement: 1,
            locale: {
                format: "YYYY-MM-DD HH:mm"
            }
        }, function(start, end) {
            $('#start_date_20').val(start.format("YYYY-MM-DD HH:mm"));
            $('#end_date_20').val(end.format("YYYY-MM-DD HH:mm"));
        });

        // Function to set the current date and time
        function setCurrentDateTime() {
            var currentDateTime = moment().format("YYYY-MM-DD HH:mm");

            // Set current date and time if input is empty
            if ($('#start_date_20').val() === '') {
                $('#start_date_20').val(currentDateTime);
            }
            if ($('#end_date_20').val() === '') {
                $('#end_date_20').val(currentDateTime);
            }
        }

        // Call the function to set the current date and time on page load
        setCurrentDateTime();

        // Optional: Set current time on focus if input is still empty
        $('#start_date').on('focus', function() {
            if ($(this).val() === '') {
                $(this).val(moment().format("YYYY-MM-DD HH:mm"));
            }
        });

        $('#end_date').on('focus', function() {
            if ($(this).val() === '') {
                $(this).val(moment().format("YYYY-MM-DD HH:mm"));
            }
        });

        // second part//

        // Show text input for sales when "Start typing..." is selected
        $('#sales_id_20').on('change', function() {
            if ($(this).val() === 'add_sales_price') {
                $(this).hide(); // Hide the dropdown
                $('#type_here').show().focus(); // Show the text input and focus on it
            }
        });

        // Handle blur event for the sales text input
        $('#type_here').on('blur', function() {
            if ($(this).val().trim() === '') {
                $(this).hide(); // Hide text input if empty
                $('#sales_id_20').show(); // Show the select dropdown
                $('#sales_id_20').val(''); // Reset dropdown selection
            }
        });

        // Third part//

        // Show text input for products when "Start typing..." is selected
        $('.product_drop_edit').on('change', function() {
            if ($(this).val() === 'add_product_typing') {
                $(this).hide(); // Hide the dropdown
                $('#new_product_type_here').show().focus(); // Show the text input and focus on it
            }
        });

        // Handle blur event for the product text input
        $('#new_product_type_here').on('blur', function() {
            var newProduct = $(this).val().trim(); // Get the new product name
            if (newProduct !== '') {
                // Add the new product to the dropdown dynamically
                $('.product_drop_edit').append(
                    `<option value="${newProduct}" selected>${newProduct}</option>`);
                // Hide the text input and show the dropdown
                $(this).hide();
                $('.product_drop_edit').show();
            } else {
                // If no product is typed, revert to showing the dropdown
                $(this).hide();
                $('.product_drop_edit').show();
                $('.product_drop_edit').val(''); // Reset dropdown selection
            }
        });

        // Four part//

        // Show text input for categories when "Start typing..." is selected
        $('.category_drop_down_edit').on('change', function() {
            if ($(this).val() === 'add_category_typing') {
                $(this).hide(); // Hide the dropdown
                $('#new_category_type_here').show().focus(); // Show the text input and focus on it
            }
        });

        // Handle blur event for the category text input
        $('#new_category_type_here').on('blur', function() {
            var newCategory = $(this).val().trim(); // Get the new category name
            if (newCategory !== '') {
                // Add the new category to the dropdown dynamically
                $('.category_drop_down_edit').append(
                    `<option value="${newCategory}" selected>${newCategory}</option>`);
                // Hide the text input and show the dropdown
                $(this).hide();
                $('.category_drop_down_edit').show();
            } else {
                // If no category is typed, revert to showing the dropdown
                $(this).hide();
                $('.category_drop_down_edit').show();
                $('.category_drop_down_edit').val(''); // Reset dropdown selection
            }
        });
    });
</script>

<!-- Index file Fatch Data Update Row Buttons -->
<script>    
        $(document).ready(function() {
            // Open modal and populate fields on edit button click
            $(document).on('click', '.index-edit-btn', function() {
                $('#priceRuleModal_2').modal('show'); // Show the modal

                // Get data attributes from the button
                const id = $(this).data('id');
                const applyTo = $(this).data('apply_to'); // 'Product' or 'Category'
                const productName = $(this).data('product_name');
                const category = $(this).data('category');
                const priceType = $(this).data('price_type');
                const discount = $(this).data('discount');
                const salePriceName = $(this).data('sale_price_name');
                const basePriceValue = $(this).data('based_price'); 
                const discountSales = $(this).data('discount_sales');
                const markup = $(this).data('markup');
                const otherPricelist = $(this).data('other_pricelist');
                const roundOfTo = $(this).data('round_of_to');
                const extraFee = $(this).data('extra_fee');
                const fixedPrice = $(this).data('fixed_price');
                const minQty = $(this).data('min_oty');
                const strat_date = $(this).data('strat_date');
                alert("Start Date:", strat_date); // Check the value
                const end_date = $(this).data('end_date');

                // Populate modal fields
                $('#pricelist_id_hidden').val(id);
                $('#product_id_50').val(productName);
                $('#category_id_20').val(category);
                $('#percent_price_20').val(discount);
                $('#sales_id_20').val(salePriceName);
                $('#price_discount_20').val(discountSales);
                $('#markup_20').val(markup);
                $('#other_pricelist_id_20').val(otherPricelist);
                $('#rounding_20').val(roundOfTo);
                $('#fix_price_20').val(fixedPrice); // Populate fixed price
                $('#price_surcharge_20').val(extraFee); // Populate extra fee
                $('#min_quantity_20').val(minQty);
                $('#start_date_20').val(strat_date);
                $('#end_date_20').val(end_date);
                
                // Set radio buttons based on 'apply_to' value
                if (applyTo === 'Product') {
                    $('#radio_field_4_2_product').prop('checked', true).trigger('change');
                } else if (applyTo === 'Category') {
                    console.log(applyTo,'applyTo')
                    $('#radio_field_4_3_product_category').prop('checked', true).trigger('change'); 
                }

                // Set radio buttons based on 'price_type' value
                if (priceType === 'Discount') {
                    $('#radio_field_5_percentage').prop('checked', true).trigger('change');
                } else if (priceType === 'Formula') {
                    $('#radio_field_5_formula').prop('checked', true).trigger('change');
                } else if (priceType === 'Fixed Price') {
                    $('#fixed_radio').prop('checked', true).trigger('change');
                }

                // Set the selected value for Base Price dropdown
                $('#base_020').val(basePriceValue).trigger('change'); // Trigger change to show relevant fields
                
                // Set the selected option in the product dropdown
                $('#product_id_50 option').each(function() {
                    if ($(this).val() === productName) {
                        $(this).prop('selected', true); // Select the matching product
                    }
                });

                // Set the selected option in the category dropdown
                $('#category_id_20 option').each(function() {
                    if ($(this).val() === category) {
                        $(this).prop('selected', true); // Select the matching category
                    }
                });
            });
    });

    // AJAX call on save button click
    $('#list_save_button_2').on('click', function() {
        // Collect data from modal inputs
        const id = $('#pricelist_id_hidden').val(); 
        const applyTo = $('input[name="radio_field_20"]:checked').data("value");
  
        const priceType = $('input[name="radio_field_30"]:checked').data("value"); 
       
        const basePrice = $('#base_020').val();

        var discount = $('#price_discount_20').val();0
         if(discount){
            $('#base_020').val('list_price_edit').trigger('change');
         }
        const data = {
            apply_to: applyTo,
            product_Name: $('#product_id_50').val(),
            category: $('#category_id_20').val(),
            price_type: priceType,
            discount: $('#percent_price_20').val(),
            sale_price_name: $('#sales_id_20').val(),
            based_price: basePrice,
            discount_sales: $('#price_discount_20').val(),
            markup: $('#markup_20').val(),
            other_pricelist: $('#other_pricelist_id_20').val(),
            round_of_to: $('#rounding_20').val(),
            extra_fee: $('#price_surcharge_20').val(),
            fixed_price: $('#fix_price_20').val(),
            min_oty: $('#min_quantity_20').val(),
            strat_date: $('#start_date_20').val(),
            end_date: $('#end_date_20').val(),
        };

        // AJAX request to save the data
        $.ajax({
            url: `/pricelist/edit/${id}`,  // Use template literals correctly
            type: 'POST',
            data: data,
            success: function(response) {
                $('#priceRuleModal_2').modal('hide');
                // Optionally refresh the table or display a success message
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });
</script>

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
                $(this).data('defaultValue', selectedValue); // Update default value for change detection
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
@endpush
@endsection
