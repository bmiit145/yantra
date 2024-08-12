@extends('layout.header')

@section('head')
    @vite('resources/css/CRM/addactivity.css')
    <style>
        .o-autocomplete{
            width: 100% !important;
        }
    </style>
@endsection
@push('head_scripts')
    @vite ('resources/js/common.js')
@endpush

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
                <a href="#">Forecast</a>
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

@section('content')
<div class="o_action_manager">
    <form id="opportunity-form">
        <input type="hidden" name="stage_id" value="{{ isset($sale) ?( $sale->stage_id ?? '' ): '' }}">
    <div class="o_xxl_form_view h-100 o_form_view o_crm_form_view o_lead_opportunity_form o_view_controller o_action">
        <div class="o_form_view_container">
            <div class="o_content" id="">
                <div class="o_form_renderer o_form_editable d-flex flex-nowrap h-100">
                    <div class="o_form_sheet_bg">
                        <div
                            class="o_form_statusbar position-relative d-flex justify-content-between mb-0 mb-md-2 pb-2 pb-md-0">
                            <div
                                class="o_statusbar_buttons d-flex align-items-center align-content-around flex-wrap gap-1">
                                <button data-hotkey="q" invisible="type == 'lead' or probability == 0 and not active"
                                    class="btn btn-primary" name="action_sale_quotations_new" type="object"
                                    data-tooltip="Create new quotation"><span>New Quotation</span></button><button
                                    data-hotkey="w" invisible="not active or probability == 100 or type == 'lead'"
                                    class="btn btn-secondary" name="action_set_won_rainbowman" type="object"
                                    data-tooltip="Mark as won"><span>Won</span></button><button data-hotkey="l"
                                    invisible="type == 'lead' or not active and probability < 100"
                                    class="btn btn-secondary" name="475" type="action"
                                    data-tooltip="Mark as lost"><span>Lost</span></button>
                            </div>
                            <div name="stage_id" class="o_field_widget o_field_statusbar_duration">
                                <div class="o_statusbar_status" role="radiogroup">
                                    <button type="button"
                                            class="btn btn-secondary dropdown-toggle o_arrow_button o_first o-dropdown dropdown d-none"
                                            aria-expanded="false"> ... </button>
                                @foreach($stages as $index => $stage)
                                    @if(isset($sale))
                                    <button type="button"
                                            class="btn btn-secondary o_arrow_button {{ $stage->id == ($sale->stage_id ?? '') ? 'o_arrow_button_current' : '' }} {{ $index == 0 ? 'o_first' : '' }}{{ $index == count($stages) - 1 ? 'o_last': '' }}" role="radio"
                                            aria-label="{{ $stage->id == ($sale->stage_id ?? '') ? 'Current state' : 'Not active state, click to change it' }} " aria-checked="{{  $stage->id == ($sale->stage_id ?? '') ? 'true' : 'false' }}"
                                            {{ $stage->id == ($sale->stage_id ?? '') ? 'aria-current="step" disabled' : '' }}
                                            data-value="{{ $stage->id }}"><span>{{$stage->title}}</span></button>
                                        @else
                                            <button type="button"
                                                    class="btn btn-secondary o_arrow_button {{ $index == count($stages) -1 ? 'o_arrow_button_current' : '' }} {{ $index == 0 ? 'o_first' : '' }}{{ $index == count($stages) - 1 ? 'o_last': '' }}" role="radio"
                                                    aria-label="{{ $index == count($stages) -1 ? 'Current state' : 'Not active state, click to change it' }} " aria-checked="{{  $index == count($stages) -1 ? 'true' : 'false' }}"
                                                    {{ $index == count($stages) -1 ? 'aria-current="step" disabled' : '' }}
                                                    data-value="{{ $stage->id }}"><span>{{$stage->title}}</span></button>
                                        @endif
                                @endforeach
                                    <button
                                        type="button"
                                        class="btn btn-secondary dropdown-toggle o_arrow_button o_last o-dropdown dropdown d-none"
                                        aria-expanded="false"> ... </button>

                                    <button type="button"
                                            class="btn btn-secondary dropdown-toggle o-dropdown dropdown d-none"
                                            aria-expanded="false">New</button>
                                </div>

{{--                                <div class="o_statusbar_status" role="radiogroup">--}}
{{--                                    <button type="button"--}}
{{--                                        class="btn btn-secondary dropdown-toggle o_arrow_button o_first o-dropdown dropdown d-none"--}}
{{--                                        aria-expanded="false"> ... </button>--}}

{{--                                    <button type="button"--}}
{{--                                        class="btn btn-secondary o_arrow_button o_first" role="radio"--}}
{{--                                        aria-label="Not active state, click to change it" aria-checked="false"--}}
{{--                                        data-value="7"><span>111</span></button>--}}

{{--                                    <button type="button"--}}
{{--                                        class="btn btn-secondary o_arrow_button" role="radio"--}}
{{--                                        aria-label="Not active state, click to change it" aria-checked="false"--}}
{{--                                        data-value="4"><span>Won</span></button>--}}

{{--                                    <button type="button"--}}
{{--                                        class="btn btn-secondary o_arrow_button" role="radio"--}}
{{--                                        aria-label="Not active state, click to change it" aria-checked="false"--}}
{{--                                        data-value="3"><span>Proposition</span></button>--}}
{{--                                    <button type="button"--}}
{{--                                        class="btn btn-secondary o_arrow_button" role="radio"--}}
{{--                                        aria-label="Not active state, click to change it" aria-checked="false"--}}
{{--                                        data-value="2"><span>Qualified</span></button>--}}
{{--                                    <button type="button"--}}
{{--                                        class="btn btn-secondary o_arrow_button o_arrow_button_current o_last"--}}
{{--                                        role="radio" disabled="" aria-label="Current state" aria-checked="true"--}}
{{--                                        aria-current="step" data-value="1"><span>New</span></button>--}}
{{--                                </div>--}}

                            </div>
                        </div>
                        <div class="o_form_sheet position-relative">
                            <div class="oe_title">
                                <h1>
                                    <div name="name"
                                        class="o_field_widget o_required_modifier o_field_text text-break">
                                        <div style="height: 45px;">
                                            <textarea class="o_input"  name= "name" id="name_0" placeholder="e.g. Product Pricing" rows="1" spellcheck="false"
                                                style="height: 45px; border-top-width: 0px; border-bottom-width: 1px; padding: 1px 0px;">{{ $sale->opportunity ?? ''}}</textarea>
                                        </div>
                                    </div>
                                </h1>
                                <h2 class="row g-0 pb-3 pb-sm-4">
                                    <div class="col-auto pb-2 pb-md-0"><label class="o_form_label oe_edit_only"
                                            for="expected_revenue_0">Expected Revenue</label>
                                        <div class="d-flex align-items-baseline">
                                            <div name="expected_revenue"
                                                class="o_field_widget o_field_monetary o_input_13ch">
                                                <div
                                                    class="text-nowrap d-inline-flex w-100 align-items-baseline position-relative">
                                                    <span
                                                        class="o_input position-absolute pe-none d-flex w-100"><span>₹&nbsp;</span><span
                                                            class="opacity-0 d-inline-block overflow-hidden mw-100 o_monetary_ghost_value">0.00</span>
                                                    </span>
                                                    <span
                                                        class="opacity-0">₹&nbsp;</span>
                                                    <input
                                                        class="o_input flex-grow-1 flex-shrink-1" autocomplete="off"
                                                        id="expected_revenue_0" name="expected_revenue" type="text" value="{{ $sale->expected_revenue ?? ''}}">
                                                </div>
                                            </div><span class="oe_grey p-2"> at </span>
                                        </div>
                                    </div>
                                    <div class="col-auto"><label class="o_form_label d-inline-block"
                                            for="probability_0">Probability</label>
                                        <div id="probability" class="d-flex align-items-baseline">
                                            <div name="probability"
                                                class="o_field_widget o_field_float oe_inline o_input_6ch">
                                                <input
                                                    inputmode="decimal" class="o_input" autocomplete="off"
                                                    name="probability"
                                                    id="probability_0" type="text" value="{{ $sale->probability ?? '' }}"
                                                ></div><span
                                                class="oe_grey p-2"> %</span>
                                        </div>
                                    </div>
                                </h2>
                            </div>
                            <div class="o_group row align-items-start">
                                <div class="o_inner_group grid col-lg-6">
                                    <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                        <div
                                            class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                            <label class="o_form_label" for="partner_id_1">Customer<sup
                                                    class="text-info p-1" data-tooltip-template="web.FieldTooltip"
                                                    data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;Linked partner (optional). Usually created when converting the lead. You can find a partner by its Name, TIN, Email or Internal Reference.&quot;}}"
                                                    data-tooltip-touch-tap-to-show="true">?</sup></label>
                                        </div>
                                        <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                            style="width: 100%;">
                                            <div name="partner_id"
                                                class="o_field_widget o_field_res_partner_many2one">
                                                <div class="o_field_many2one_selection">
                                                    <div class="o_input_dropdown">
                                                        <div class="o-autocomplete dropdown">
                                                            <input type="hidden" name="partner_id" id="partner_id"
                                                                value="{{ isset($sale) ? ( $sale->contact_id != null ? $sale->contact_id :  '' ) : '' }}">
                                                            <input type="text"
                                                                class="o-autocomplete--input o_input"
                                                                autocomplete="off" role="combobox"
                                                                aria-autocomplete="list" aria-haspopup="listbox"
                                                                id="partner_id_1" placeholder=""
                                                                aria-expanded="false"
                                                                value="{{ isset($sale) ? ( $sale->contact_id != null ? $sale->contact->name :  '' ) : '' }}">
                                                        </div>
                                                        <span
                                                            class="o_dropdown_button"></span>
                                                    </div>
                                                </div>
                                                <div class="o_field_many2one_extra"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                        <div class="o_cell flex-grow-1 flex-sm-grow-0 o_wrap_label w-100 text-break text-900"
                                            style="">
                                            <label class="o_form_label oe_inline"
                                                for="email_from_0">Email</label>
                                        </div>
                                        <div class="o_cell flex-grow-1 flex-sm-grow-0" style="width: 100%;">
                                            <div class="o_row o_row_readonly">
                                                <div name="email_from" class="o_field_widget o_field_email">
                                                    <div class="d-inline-flex w-100">
                                                        <input class="o_input"
                                                            type="email" autocomplete="off" id="email_from_0" name="email" value="{{ isset($sale) ? ( $sale->contact_id != null ? $sale->contact->email :  $sale->email ) : '' }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                        <div class="o_cell flex-grow-1 flex-sm-grow-0 o_wrap_label w-100 text-break text-900"
                                            style=""><label class="o_form_label oe_inline"
                                                for="phone_0">Phone</label></div>
                                        <div class="o_cell flex-grow-1 flex-sm-grow-0" style="width: 100%;">
                                            <div class="o_row o_row_readonly">
                                                <div name="phone" class="o_field_widget o_field_phone">
                                                    <div class="o_phone_content d-inline-flex w-100">
                                                        <input
                                                            class="o_input" type="tel" autocomplete="off"
                                                            id="phone_0" name="phone" value="{{ isset($sale) ? ( $sale->contact_id != null ? $sale->contact->phone :  $sale->phone ) : '' }}">
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
                                            <label class="o_form_label" for="user_id_0">Salesperson</label>
                                        </div>
                                        <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                            style="width: 100%;">
                                            <div name="user_id"
                                                class="o_field_widget o_field_many2one_avatar_user o_field_many2one_avatar">
                                                <div class="d-flex align-items-center gap-1"
                                                    data-tooltip="info@yantradesign.co.in"><span
                                                        class="o_avatar o_m2o_avatar"><img class="rounded"
                                                            src="data:image/jpeg;base64,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"></span>
                                                    <div class="o_field_many2one_selection">
                                                        <div class="o_input_dropdown">
                                                            <div class="o-autocomplete dropdown"><input type="text"
                                                                    class="o-autocomplete--input o_input"
                                                                    autocomplete="off" role="combobox"
                                                                    aria-autocomplete="list" aria-haspopup="listbox"
                                                                    id="user_id_0" placeholder=""
                                                                    aria-expanded="false"></div>
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
                                    <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                        <div class="o_cell flex-grow-1 flex-sm-grow-0 o_wrap_label w-100 text-break text-900"
                                            style=""><label class="o_form_label" for="date_deadline_0">Expected
                                                Closing<sup class="text-info p-1"
                                                    data-tooltip-template="web.FieldTooltip"
                                                    data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;Estimate of the date on which the opportunity will be won.&quot;}}"
                                                    data-tooltip-touch-tap-to-show="true">?</sup></label></div>
                                        <div class="o_cell flex-grow-1 flex-sm-grow-0" style="width: 100%;">
                                            <div class="o_lead_opportunity_form_inline_fields">
                                                <div name="date_deadline"
                                                    class="o_field_widget o_field_date oe_inline">
                                                    <div class="d-flex gap-2 align-items-center">
                                                        <input type="text"
                                                            class="o_input cursor-pointer" autocomplete="off"
                                                            id="date_deadline_0" data-field="date_deadline" name="deadline">
                                                    </div>
                                                </div>

                                                <div name="priority"
                                                    class="o_field_widget o_field_priority oe_inline align-top">
                                                    <div class="o_priority set-priority" role="radiogroup" name="priority" aria-label="Priority">
                                                        <a href="#" class="o_priority_star fa {{ isset($sale) && ($sale->priority == 'medium' || $sale->priority == 'high' || $sale->priority == 'very_high' ) ? 'fa-star' : 'fa-star-o' }}" role="radio"
                                                           tabindex="-1" data-value="medium" data-tooltip="Priority: Medium" aria-label="Medium"></a><a
                                                            href="#" class="o_priority_star fa {{ isset($sale) && ( $sale->priority == 'high' || $sale->priority == 'very_high' ) ? 'fa-star' : 'fa-star-o' }}" role="radio"
                                                            tabindex="-1"  data-value="high"data-tooltip="Priority: High" aria-label="High"></a><a
                                                            href="#" class="o_priority_star fa {{ isset($sale) && ( $sale->priority == 'very_high' ) ? 'fa-star' : 'fa-star-o' }}" role="radio"
                                                            tabindex="-1" data-value="very_high" data-tooltip="Priority: Very High"
                                                            aria-label="Very High">
                                                        </a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                        <div
                                            class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                            <label class="o_form_label" for="tag_ids_0">Tags<sup
                                                    class="text-info p-1" data-tooltip-template="web.FieldTooltip"
                                                    data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;Classify and analyze your lead/opportunity categories like: Training, Service&quot;}}"
                                                    data-tooltip-touch-tap-to-show="true">?</sup></label>
                                        </div>
                                        <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                            style="width: 100%;">
                                            <div name="tag_ids" class="o_field_widget o_field_many2many_tags">
                                                <div
                                                    class="o_field_tags d-inline-flex flex-wrap gap-1 o_tags_input o_input">
                                                    <div class="o_field_many2many_selection d-inline-flex w-100">
                                                        <div class="o_input_dropdown">
                                                            <div class="o-autocomplete dropdown"><input type="text"
                                                                    class="o-autocomplete--input o_input"
                                                                    autocomplete="off" role="combobox"
                                                                    aria-autocomplete="list" aria-haspopup="listbox"
                                                                    id="tag_ids_0" placeholder=""
                                                                    aria-expanded="false"></div>
                                                            <span class="o_dropdown_button"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div name="lead_properties" class="o_field_widget o_field_properties">
                                    <div class="row d-none" columns="2">
                                        <div class="o_inner_group o_group col-lg-6 o_property_group" property-name="">
                                        </div>
                                        <div class="o_inner_group o_group col-lg-6 o_property_group" property-name="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="o_notebook d-flex w-100 horizontal flex-column">
                                <div class="o_notebook_headers">
                                    <ul class="nav nav-tabs flex-row flex-nowrap">
                                        <li class="nav-item flex-nowrap cursor-pointer"><a class="nav-link active"
                                                href="#" role="tab" tabindex="0"
                                                name="internal_notes">Internal Notes</a></li>
                                        <li class="nav-item flex-nowrap cursor-pointer"><a class="nav-link"
                                                href="#" role="tab" tabindex="0" name="lead">Extra
                                                Information</a></li>
                                    </ul>
                                </div>
                                <div class="o_notebook_content tab-content">
                                    <div class="tab-pane active fade show">
                                        <div name="description" class="o_field_widget o_field_html">
                                            <div class="h-100">
                                                <div style="display: contents;"></div>
                                                <div style="display: contents;"></div>
                                                <div class="oe-absolute-container">
                                                    <div class="oe-absolute-container"
                                                        data-oe-absolute-container-id="oe-selections-container">
                                                    </div>
                                                    <div class="oe-absolute-container"
                                                        data-oe-absolute-container-id="oe-avatars-container"></div>
                                                    <div class="oe-absolute-container"
                                                        data-oe-absolute-container-id="oe-widget-hooks-container">
                                                        <div class="oe-dropzone-hook"
                                                            style="display: none; z-index: 0; left: -21px; top: 4px; width: 25px; height: 37px;">
                                                        </div>
                                                    </div>
                                                    <div class="oe-absolute-container o_draggable"
                                                        data-oe-absolute-container-id="oe-widgets-container"></div>
                                                    <div class="oe-absolute-container"
                                                        data-oe-absolute-container-id="oe-movenode-helper-container">
                                                    </div>
                                                    <div class="oe-absolute-container"
                                                        data-oe-absolute-container-id="oe-dropzones-container">
                                                    </div>
                                                    <div class="oe-absolute-container"
                                                        data-oe-absolute-container-id="oe-dropzone-hint-container">
                                                    </div>
                                                    <div class="oe-absolute-container"
                                                        data-oe-absolute-container-id="oe-avatars-counters-container">
                                                    </div>
                                                </div>
                                                <div class="o_table_ui_container">
                                                    <div class="o_table_ui o_row_ui" style="visibility: hidden;">
                                                        <div>
                                                            <span
                                                                class="o_table_ui_menu_toggler fa fa-ellipsis-v"></span>
                                                            <div class="o_table_ui_menu">
                                                                <div class="o_move_up"><span
                                                                        class="fa fa-chevron-left"
                                                                        style="transform: rotate(90deg);"></span>Move
                                                                    up</div>
                                                                <div class="o_move_down"><span
                                                                        class="fa fa-chevron-right"
                                                                        style="transform: rotate(90deg);"></span>Move
                                                                    down</div>
                                                                <div class="o_insert_above"><span
                                                                        class="fa fa-plus"></span>Insert above
                                                                </div>
                                                                <div class="o_insert_below"><span
                                                                        class="fa fa-plus"></span>Insert below
                                                                </div>
                                                                <div class="o_delete_row"><span
                                                                        class="fa fa-trash"></span>Delete</div>
                                                                <div class="o_reset_table_size"><span
                                                                        class="fa fa-table"></span>Reset Size</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="o_table_ui o_column_ui" style="visibility: hidden;">
                                                        <div>
                                                            <span
                                                                class="o_table_ui_menu_toggler fa fa-ellipsis-h"></span>
                                                            <div class="o_table_ui_menu">
                                                                <div class="o_move_left"><span
                                                                        class="fa fa-chevron-left"></span>Move left
                                                                </div>
                                                                <div class="o_move_right"><span
                                                                        class="fa fa-chevron-right"></span>Move
                                                                    right</div>
                                                                <div class="o_insert_left"><span
                                                                        class="fa fa-plus"></span>Insert left</div>
                                                                <div class="o_insert_right"><span
                                                                        class="fa fa-plus"></span>Insert right
                                                                </div>
                                                                <div class="o_delete_column"><span
                                                                        class="fa fa-trash"></span>Delete</div>
                                                                <div class="o_reset_table_size"><span
                                                                        class="fa fa-table"></span>Reset Size</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="note-editable odoo-editor-editable odoo-editor-qweb"
                                                    id="description_0" contenteditable="true" dir="ltr">
                                                    <p placeholder="Add a description..."
                                                        class="oe-hint oe-command-temporary-hint"><br></p>
                                                </div>
                                            </div>
                                            <div class="d-none o_knowledge_behavior_handler"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="o-mail-ChatterContainer o-mail-Form-chatter o-aside">
                        <div
                            class="o-mail-Chatter w-100 h-100 flex-grow-1 d-flex flex-column overflow-auto o-chatter-disabled">
                            <div class="o-mail-Chatter-top position-sticky top-0">
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
                                                    class="d-flex invisible text-nowrap"><i
                                                        class="me-1 fa fa-fw fa-eye-slash"></i>Following</span><span
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
                                            style="height: Min(2500px, 100%)"></span><span></span>
                                        <div class="o-mail-DateSection d-flex align-items-center w-100 fw-bold pt-2">
                                            <hr class="flex-grow-1"><span
                                                class="px-3 opacity-75 small text-muted">Today</span>
                                            <hr class="flex-grow-1">
                                        </div>
                                        <div class="o-mail-Message position-relative undefined o-selfAuthored py-1 mt-2"
                                            role="group" aria-label="System notification">
                                            <div class="o-mail-Message-core position-relative d-flex flex-shrink-0">
                                                <div class="o-mail-Message-sidebar d-flex flex-shrink-0">
                                                    <div class="o-mail-Message-avatarContainer position-relative bg-view cursor-pointer"
                                                        aria-label="Open card"><img
                                                            class="o-mail-Message-avatar w-100 h-100 rounded o_object_fit_cover o_redirect cursor-pointer"
                                                            {{-- src="https://yantradesign.odoo.com/web/image/res.partner/3/avatar_128?unique=1721388544000"> --}}
                                                            src="{{ asset('images/CRM.png')}}">
                                                    </div>
                                                </div>
                                                <div class="w-100 o-min-width-0">
                                                    <div
                                                        class="o-mail-Message-header d-flex flex-wrap align-items-baseline mb-1 lh-1">
                                                        <span class="o-mail-Message-author cursor-pointer"
                                                            aria-label="Open card"><strong
                                                                class="me-1 text-truncate">info@yantradesign.co.in</strong></span><small
                                                            class="o-mail-Message-date text-muted opacity-75 me-2"
                                                            title="30/7/2024, 3:07:46 pm">- 1 minute
                                                            ago</small><span
                                                            class="o-mail-MessageSeenIndicator position-relative d-flex opacity-50 o-all-seen text-primary ms-1"></span>
                                                    </div>
                                                    <div class="position-relative d-flex">
                                                        <div class="o-mail-Message-content o-min-width-0">
                                                            <div
                                                                class="o-mail-Message-textContent position-relative d-flex">
                                                                <div>
                                                                    <div
                                                                        class="o-mail-Message-body text-break mb-0 w-100">
                                                                        Creating a new record...</div>
                                                                </div>
                                                                <div
                                                                    class="o-mail-Message-actions ms-2 mt-1 invisible">
                                                                    <div
                                                                        class="d-flex rounded-1 bg-view shadow-sm overflow-hidden">
                                                                        <button class="btn px-1 py-0 rounded-0"
                                                                            tabindex="1" title="Add a Reaction"
                                                                            aria-label="Add a Reaction"><i
                                                                                class="oi fa-lg oi-smile-add"></i></button><button
                                                                            class="btn px-1 py-0 rounded-0"
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
    </form>
</div>
<div class="o-main-components-container">
    <div class="o-discuss-CallInvitations position-absolute top-0 end-0 d-flex flex-column p-2"></div>
    <div class="o-mail-ChatWindowContainer"></div>
    <div class="o-overlay-container"></div>
    <div></div>
    <div class="o_notification_manager o_upload_progress_toast"></div>
    <div class="o_fullscreen_indication">
        <p>Press <span>esc</span> to exit full screen</p>
    </div>
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
            <div class="btn-group" role="group"><button type="button" title="Flip Horizontal" data-action="flip"
                    data-scale-direction="scaleX"><i class="oi oi-fw oi-arrows-h"></i></button><button type="button"
                    title="Flip Vertical" data-action="flip" data-scale-direction="scaleY"><i
                        class="oi oi-fw oi-arrows-v"></i></button></div>
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
<div id="toolbar" class="oe-toolbar oe-floating"
    style="visibility: hidden; --we-cp-primary: #714B67; --we-cp-secondary: #D8DADD; --we-cp-success: #28A745; --we-cp-info: #17A2B8; --we-cp-warning: #E99D00; --we-cp-danger: #D44C59; --we-cp-o-color-1: #714B67; --we-cp-o-cc1-bg: #FFFFFF; --we-cp-o-cc1-headings: #000; --we-cp-o-cc1-text: #000; --we-cp-o-cc1-btn-primary: #714B67; --we-cp-o-cc1-btn-primary-text: #FFF; --we-cp-o-cc1-btn-secondary: #D8DADD; --we-cp-o-cc1-btn-secondary-text: #000; --we-cp-o-cc1-btn-primary-border: #714B67; --we-cp-o-cc1-btn-secondary-border: #D8DADD; --we-cp-o-color-2: #8595A2; --we-cp-o-cc2-bg: #F3F2F2; --we-cp-o-cc2-headings: #111827; --we-cp-o-cc2-text: #000; --we-cp-o-cc2-btn-primary: #714B67; --we-cp-o-cc2-btn-primary-text: #FFF; --we-cp-o-cc2-btn-secondary: #D8DADD; --we-cp-o-cc2-btn-secondary-text: #000; --we-cp-o-cc2-btn-primary-border: #714B67; --we-cp-o-cc2-btn-secondary-border: #D8DADD; --we-cp-o-color-3: #F3F2F2; --we-cp-o-cc3-bg: #8595A2; --we-cp-o-cc3-headings: #FFF; --we-cp-o-cc3-text: #FFF; --we-cp-o-cc3-btn-primary: #714B67; --we-cp-o-cc3-btn-primary-text: #FFF; --we-cp-o-cc3-btn-secondary: #F3F2F2; --we-cp-o-cc3-btn-secondary-text: #000; --we-cp-o-cc3-btn-primary-border: #714B67; --we-cp-o-cc3-btn-secondary-border: #F3F2F2; --we-cp-o-color-4: #FFFFFF; --we-cp-o-cc4-bg: #714B67; --we-cp-o-cc4-headings: #FFF; --we-cp-o-cc4-text: #FFF; --we-cp-o-cc4-btn-primary: #111827; --we-cp-o-cc4-btn-primary-text: #FFF; --we-cp-o-cc4-btn-secondary: #F3F2F2; --we-cp-o-cc4-btn-secondary-text: #000; --we-cp-o-cc4-btn-primary-border: #111827; --we-cp-o-cc4-btn-secondary-border: #F3F2F2; --we-cp-o-color-5: #111827; --we-cp-o-cc5-bg: #111827; --we-cp-o-cc5-headings: #FFFFFF; --we-cp-o-cc5-text: #FFF; --we-cp-o-cc5-btn-primary: #714B67; --we-cp-o-cc5-btn-primary-text: #FFF; --we-cp-o-cc5-btn-secondary: #F3F2F2; --we-cp-o-cc5-btn-secondary-text: #000; --we-cp-o-cc5-btn-primary-border: #714B67; --we-cp-o-cc5-btn-secondary-border: #F3F2F2; --we-cp-100: #F9FAFB; --we-cp-200: #E7E9ED; --we-cp-300: #D8DADD; --we-cp-400: #9A9CA5; --we-cp-500: #7C7F89; --we-cp-600: #5F636F; --we-cp-700: #374151; --we-cp-800: #1F2937; --we-cp-900: #111827; pointer-events: auto;">
    <div id="style" class="btn-group dropdown"><button type="button" class="btn dropdown-toggle"
            data-bs-toggle="dropdown" data-bs-original-title="Text style" tabindex="-1" aria-expanded="false"><span
                title="Text style">Normal</span></button>
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
            <li id="pre-dropdown-item"><a class="dropdown-item" href="#" id="pre" data-call="setTag"
                    data-arg1="pre">Code</a></li>
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
            <div id="oe-text-color" class="btn color-button dropdown-toggle editor-ignore" data-bs-toggle="dropdown"
                tabindex="-1"><i class="fa fa-font color-indicator fore-color" title="Font Color"></i></div>
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
                        <div class="o_colorpicker_sections pt-2 px-2 pb-3 d-none" data-color-tab="color-combinations">
                            <button type="button" class="o_we_color_btn o_we_color_combination_btn" data-color="1"
                                title="Preset 1">
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
        <div id="unlink" data-call="unlink" title="Remove link" class="fa fa-unlink fa-fw btn order-1">
        </div>
        <div id="create-link" title="Insert or edit link" class="fa fa-link fa-fw btn editor-ignore"></div><a
            id="media-description" href="#" title="Edit media description"
            class="btn editor-ignore d-none">Description</a>
    </div>
    <div id="chatgpt" class="btn-group">
        <div id="open-chatgpt" title="Generate or transform content with AI" class="btn editor-ignore"><span
                class="fa fa-magic fa-fw"></span><span>AI</span></div>
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

@push('scripts')
    <script>
        $(document).ready(function() {
            var containerId = $('#opportunity-form');
            autoInputComplate('#partner_id_1', '{{ route('contact.suggestions') }}', function (selectedText, selected_id = 0) {
                containerId.find('input[name="partner_id"]').val(selected_id);

                // contact details and show if selected_id != 0
                if (selected_id != 0) {
                    let url = "{{ route('contact.show', ['contact' => ':id']) }}";
                    url = url.replace(':id', selected_id);
                    $.ajax({
                        type: 'GET',
                        url: url,
                        data: {
                            id: selected_id,
                        },
                        success: function (response) {
                            // console.log(response);
                            var _contact = response.contact;
                            containerId.find('input[name="email"]').val(_contact.email);
                            containerId.find('input[name="phone"]').val(_contact.phone);
                            // containerId.find('input[name="name"]').val(_contact.name + "'s Opportunity");
                        },
                        error: function (err) {
                            console.log(err);
                        }
                    });
                }

                if (selected_id == 0) {
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('contact.save') }}",
                        data: {
                            contact_name: selectedText,
                        },
                        success: function (response) {
                            var _contact = response.contact;
                            $('input[name="partner_id"]').val(_contact.id);
                        },
                        error: function (err) {
                            console.log(err);
                        }
                    });
                }
            });
        });
    </script>

{{--     save conrtact --}}
    <script>
        $(document).on('click' , '#main_save_btn' , function (){
            var contact_id = $('#partner_id').val();
            var priority = $(document).find('.set-priority').find('.o_priority_star.fa-star').last().data('value');
            var formData = $('#opportunity-form').serialize();
            formData += '&contact_id=' + contact_id + '&priority=' + priority;

            $.ajax({
                type: 'POST',
                url: "{{ route('crm.newSales') }}",
                data: formData,
                success: function (response) {
                    console.log(response);
                    if (response.status == 'success') {
                        toastr.success(response.message);
                    } else {
                        toastr.error(response.message);
                    }
                },
                error: function (err) {
                    console.log(err);
                }
            });
        });
    </script>
@endpush
