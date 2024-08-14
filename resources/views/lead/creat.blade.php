@extends('layout.header')
@section('head_new_btn_link', route('crm.show', ['crm' => 'new']))

@section('navbar_menu')
    <li class="dropdown">
        <a href="#">Sales</a>
        <div class="dropdown-content">
            <a href="{{ route('crm.index') }}">My Pipeline</a>
            <a href="#">My Activities</a>
            <a href="#">My Quotations</a>
            <a href="#">Teams</a>
            <a href="{{ route('contact.index', ['tab' => 'customers']) }}">Customers</a>
        </div>
    </li>
    <li>
        <a href="{{ route('lead.index') }}">Leads</a>

    </li>
    <li class="dropdown">
        <a href="#">Reporting</a>
        <div class="dropdown-content">
            <!-- Dropdown content for Reporting -->
            <a href="{{ route('crm.forecasting') }}">Forecast</a>
            <a href="{{ route('crm.index') }}">Pipeline</a>
            <a href="{{ route('lead.index') }}">Leads</a>
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


@section('head')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
    @vite(['resources/css/crm_2.css'])
@endsection

@push('head_scripts')
    @vite ('resources/js/common.js')
@endpush

@section('content')

    @vite('resources/css/newlead.css')




    <div class="o_action_manager">
        <div class="o_xxl_form_view h-100 o_form_view o_crm_form_view o_lead_opportunity_form o_view_controller o_action">
            <div class="o_form_view_container">

                <div class="o_content">
                    <div class="o_form_renderer o_form_editable d-flex d-print-block flex-nowrap h-100">
                        <div class="o_form_sheet_bg">
                            <div
                                class="o_form_statusbar position-relative d-flex justify-content-between mb-0 mb-md-2 pb-2 pb-md-0">
                                <div
                                    class="o_statusbar_buttons d-flex align-items-center align-content-around flex-wrap gap-1">
                                    <button invisible="type == 'opportunity' or not active" data-hotkey="v"
                                        class="btn btn-primary" name="511" type="action"><span>Convert to
                                            Opportunity</span></button><button data-hotkey="l"
                                        invisible="type == 'opportunity' or probability == 0 and not active"
                                        class="btn btn-secondary" name="510" type="action"
                                        data-tooltip="Mark as lost"><span>Lost</span></button>
                                </div>
                            </div>
                            <div class="o_form_sheet position-relative">
                                <div class="oe_title">
                                    <h1>
                                        <div name="name" class="o_field_widget">
                                            <div style="height: 45px;">
                                                <textarea class="o_input" id="name_0" placeholder="e.g. Product Pricing" rows="1" spellcheck="false"
                                                    style="height: 45px; border-top-width: 0px; border-bottom-width: 1px; padding: 1px 0px;"></textarea>
                                            </div>
                                        </div>
                                    </h1>
                                    <h2 class="row g-0 pb-3 pb-sm-4">
                                        <div class="col-auto"><label class="o_form_label d-inline-block"
                                                for="probability_0">Probability</label>
                                            <div id="probability" class="d-flex align-items-baseline">
                                                <div name="probability"
                                                    class="o_field_widget o_field_float oe_inline o_input_6ch"><input
                                                        inputmode="decimal" class="o_input" autocomplete="off"
                                                        id="probability_0" type="text"></div><span class="oe_grey p-2">
                                                    %</span>
                                            </div>
                                        </div>
                                    </h2>
                                </div>
                                <div class="o_group row align-items-start">
                                    <div class="o_inner_group grid col-lg-6">
                                        <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                            <div
                                                class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                <label class="o_form_label" for="partner_name_0">Company Name<sup
                                                        class="text-info p-1" data-tooltip-template="web.FieldTooltip"
                                                        data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;The name of the future partner company that will be created while converting the lead into opportunity&quot;}}"
                                                        data-tooltip-touch-tap-to-show="true">?</sup></label>
                                            </div>
                                            <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                style="width: 100%;">
                                                <div name="partner_name" class="o_field_widget o_field_char"><input
                                                        class="o_input" id="partner_name_0" type="text"
                                                        autocomplete="off"></div>
                                            </div>
                                        </div>
                                        <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                            <div class="o_cell flex-grow-1 flex-sm-grow-0 o_wrap_label w-100 text-break text-900"
                                                style=""><label class="o_form_label" for="street_0">Address</label>
                                            </div>
                                            <div class="o_cell flex-grow-1 flex-sm-grow-0" style="width: 100%;">
                                                <div class="o_address_format">
                                                    <div name="street"
                                                        class="o_field_widget o_field_char o_address_street"><input
                                                            class="o_input" id="street_0" type="text" autocomplete="off"
                                                            placeholder="Street..."></div>
                                                    <div name="street2"
                                                        class="o_field_widget o_field_char o_address_street"><input
                                                            class="o_input" id="street2_0" type="text"
                                                            autocomplete="off" placeholder="Street 2..."></div>
                                                    <div name="city"
                                                        class="o_field_widget o_field_char o_address_city"><input
                                                            class="o_input" id="city_0" type="text"
                                                            autocomplete="off" placeholder="City"></div>
                                                    <div name="zip" class="o_field_widget o_field_char o_address_zip">
                                                        <input class="o_input" id="zip_0" type="text"
                                                            autocomplete="off" placeholder="ZIP">
                                                    </div>
                                                    <div name="state_id"
                                                        class="o_field_widget o_field_many2one o_address_state">
                                                        <div class="o_field_many2one_selection">
                                                            <div class="o_input_dropdown">
                                                                <div class="o-autocomplete dropdown"><input type="text"
                                                                        class="o-autocomplete--input o_input"
                                                                        autocomplete="off" role="combobox"
                                                                        aria-autocomplete="list" aria-haspopup="listbox"
                                                                        id="state_id_0" placeholder="State"
                                                                        aria-expanded="false">
                                                                </div><span class="o_dropdown_button"></span>
                                                            </div>
                                                        </div>
                                                        <div class="o_field_many2one_extra"></div>
                                                    </div>
                                                    <div name="country_id"
                                                        class="o_field_widget o_field_many2one o_address_country">
                                                        <div class="o_field_many2one_selection">
                                                            <div class="o_input_dropdown">
                                                                <div class="o-autocomplete dropdown"><input type="text"
                                                                        class="o-autocomplete--input o_input"
                                                                        autocomplete="off" role="combobox"
                                                                        aria-autocomplete="list" aria-haspopup="listbox"
                                                                        id="country_id_0" placeholder="Country"
                                                                        aria-expanded="false">
                                                                </div><span class="o_dropdown_button"></span>
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
                                                <label class="o_form_label" for="website_0">Website<sup
                                                        class="text-info p-1" data-tooltip-template="web.FieldTooltip"
                                                        data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;Website of the contact&quot;}}"
                                                        data-tooltip-touch-tap-to-show="true">?</sup></label>
                                            </div>
                                            <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                style="width: 100%;">
                                                <div name="website" class="o_field_widget o_field_url">
                                                    <div class="d-inline-flex w-100"><input class="o_input"
                                                            type="text" autocomplete="off" id="website_0"
                                                            placeholder="e.g. https://www.odoo.com"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="o_inner_group grid col-lg-6">
                                        <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                            <div class="o_cell flex-grow-1 flex-sm-grow-0 o_wrap_label w-100 text-break text-900"
                                                style=""><label class="o_form_label" for="contact_name_0">Contact
                                                    Name</label></div>
                                            <div class="o_cell flex-grow-1 flex-sm-grow-0" style="width: 100%;">
                                                <div class="o_row">
                                                    <div name="contact_name" class="o_field_widget o_field_char">
                                                        <input class="o_input" id="contact_name_0" type="text"
                                                            autocomplete="off">
                                                    </div>
                                                    <div name="title" class="o_field_widget o_field_many2one">
                                                        <div class="o_field_many2one_selection">
                                                            <div class="o_input_dropdown">
                                                                <div class="o-autocomplete dropdown"><input type="text"
                                                                        class="o-autocomplete--input o_input"
                                                                        autocomplete="off" role="combobox"
                                                                        aria-autocomplete="list" aria-haspopup="listbox"
                                                                        id="title_0" placeholder="Title"
                                                                        aria-expanded="false">
                                                                </div><span class="o_dropdown_button"></span>
                                                            </div>
                                                        </div>
                                                        <div class="o_field_many2one_extra"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                            <div class="o_cell flex-grow-1 flex-sm-grow-0 o_wrap_label w-100 text-break text-900"
                                                style=""><label class="o_form_label oe_inline"
                                                    for="email_from_1">Email</label></div>
                                            <div class="o_cell flex-grow-1 flex-sm-grow-0" style="width: 100%;">
                                                <div class="o_row o_row_readonly">
                                                    <div name="email_from" class="o_field_widget o_field_email">
                                                        <div class="d-inline-flex w-100"><input class="o_input"
                                                                type="email" autocomplete="off" id="email_from_1">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                            <div
                                                class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                <label class="o_form_label" for="function_0">Job Position</label>
                                            </div>
                                            <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                style="width: 100%;">
                                                <div name="function" class="o_field_widget o_field_char"><input
                                                        class="o_input" id="function_0" type="text"
                                                        autocomplete="off"></div>
                                            </div>
                                        </div>
                                        <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                            <div class="o_cell flex-grow-1 flex-sm-grow-0 o_wrap_label w-100 text-break text-900"
                                                style=""><label class="o_form_label oe_inline"
                                                    for="phone_1">Phone</label></div>
                                            <div class="o_cell flex-grow-1 flex-sm-grow-0" style="width: 100%;">
                                                <div class="o_row o_row_readonly">
                                                    <div name="phone" class="o_field_widget o_field_phone">
                                                        <div class="o_phone_content d-inline-flex w-100"><input
                                                                class="o_input" type="tel" autocomplete="off"
                                                                id="phone_1"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                            <div class="o_cell flex-grow-1 flex-sm-grow-0 o_wrap_label w-100 text-break text-900"
                                                style=""><label class="o_form_label oe_inline"
                                                    for="mobile_0">Mobile</label></div>
                                            <div class="o_cell flex-grow-1 flex-sm-grow-0" style="width: 100%;">
                                                <div class="o_row o_row_readonly">
                                                    <div name="mobile" class="o_field_widget o_field_phone">
                                                        <div class="o_phone_content d-inline-flex w-100"><input
                                                                class="o_input" type="tel" autocomplete="off"
                                                                id="mobile_0"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="o_inner_group grid col-lg-6">
                                        <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                            <div
                                                class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                <label class="o_form_label" for="user_id_1">Salesperson</label>
                                            </div>
                                            <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                style="width: 100%;">
                                                <div name="user_id"
                                                    class="o_field_widget o_field_many2one_avatar_user o_field_many2one_avatar">
                                                    <div class="d-flex align-items-center gap-1"
                                                        data-tooltip="info@yantradesign.co.in"><span
                                                            class="o_avatar o_m2o_avatar"><img class="rounded"
                                                                src="/web/image/res.users/2/avatar_128"></span>
                                                        <div class="o_field_many2one_selection">
                                                            <div class="o_input_dropdown">
                                                                <div class="o-autocomplete dropdown"><input type="text"
                                                                        class="o-autocomplete--input o_input"
                                                                        autocomplete="off" role="combobox"
                                                                        aria-autocomplete="list" aria-haspopup="listbox"
                                                                        id="user_id_1" placeholder=""
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
                                            <div
                                                class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                <label class="o_form_label" for="team_id_0">Sales Team</label>
                                            </div>
                                            <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                style="width: 100%;">
                                                <div name="team_id" class="o_field_widget o_field_many2one">
                                                    <div class="o_field_many2one_selection">
                                                        <div class="o_input_dropdown">
                                                            <div class="o-autocomplete dropdown"><input type="text"
                                                                    class="o-autocomplete--input o_input"
                                                                    autocomplete="off" role="combobox"
                                                                    aria-autocomplete="list" aria-haspopup="listbox"
                                                                    id="team_id_0" placeholder="" aria-expanded="false">
                                                            </div><span class="o_dropdown_button"></span>
                                                        </div>
                                                    </div>
                                                    <div class="o_field_many2one_extra"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="o_inner_group grid col-lg-6">
                                        <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                            <div
                                                class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                <label class="o_form_label" for="priority_1">Priority</label>
                                            </div>
                                            <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                style="width: 100%;">
                                                <div name="priority" class="o_field_widget o_field_priority">
                                                    <div class="o_priority" role="radiogroup" name="priority"
                                                        aria-label="Priority"><a href="#"
                                                            class="o_priority_star fa fa-star-o" role="radio"
                                                            tabindex="-1" data-tooltip="Priority: Medium"
                                                            aria-label="Medium"></a><a href="#"
                                                            class="o_priority_star fa fa-star-o" role="radio"
                                                            tabindex="-1" data-tooltip="Priority: High"
                                                            aria-label="High"></a><a href="#"
                                                            class="o_priority_star fa fa-star-o" role="radio"
                                                            tabindex="-1" data-tooltip="Priority: Very High"
                                                            aria-label="Very High"></a></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                            <div
                                                class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                <label class="o_form_label" for="tag_ids_1">Tags<sup
                                                        class="text-info p-1" data-tooltip-template="web.FieldTooltip"
                                                        data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;Classify and analyze your lead/opportunity categories like: Training, Service&quot;}}"
                                                        data-tooltip-touch-tap-to-show="true">?</sup></label>
                                            </div>
                                            <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                style="width: 100%;">
                                                <div name="tag_ids" class="o_field_widget o_field_many2many_tags">
                                                    <div
                                                        class="o_field_tags d-inline-flex flex-wrap gap-1 mw-100 o_tags_input o_input">
                                                        <div class="o_field_many2many_selection d-inline-flex w-100">
                                                            <div class="o_input_dropdown">
                                                                <div class="o-autocomplete dropdown"><input type="text"
                                                                        class="o-autocomplete--input o_input"
                                                                        autocomplete="off" role="combobox"
                                                                        aria-autocomplete="list" aria-haspopup="listbox"
                                                                        id="tag_ids_1" placeholder=""
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
                                                    href="#internal_notes" role="tab" data-bs-toggle="tab"
                                                    tabindex="0" name="internal_notes">Internal Notes</a></li>
                                            <li class="nav-item flex-nowrap cursor-pointer"><a class="nav-link "
                                                    href="#extra" role="tab" data-bs-toggle="tab" tabindex="0"
                                                    name="extra">Extra Info</a></li>
                                        </ul>
                                    </div>
                                    <div class="tab-content">
                                        <div id="internal_notes" class="tab-pane fade show active">
                                            <textarea name="" id="description" cols="30" rows="10"></textarea>
                                            {{-- <div id="editableDiv" contenteditable="true"
                                                style="width: 100%;height: 500px; border: 1px solid #ccc;padding: 10px;">
                                                <!-- The user can paste content here -->
                                            </div> --}}
                                        </div>
                                        <div id="extra" class="tab-pane fade">
                                            <div class="o_group row align-items-start">
                                                <div class="o_inner_group grid col-lg-6">
                                                    <div class="g-col-sm-2">
                                                        <div
                                                            class="o_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">
                                                            Marketing</div>
                                                    </div>
                                                    <div
                                                        class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                        <div
                                                            class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                            <label class="o_form_label" for="campaign_id_0">Campaign<sup
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
                                                                                aria-haspopup="listbox" id="campaign_id_0"
                                                                                placeholder="" aria-expanded="false">
                                                                        </div><span class="o_dropdown_button"></span>
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
                                                            <label class="o_form_label" for="medium_id_0">Medium<sup
                                                                    class="text-info p-1"
                                                                    data-tooltip-template="web.FieldTooltip"
                                                                    data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;This is the method of delivery, e.g. Postcard, Email, or Banner Ad&quot;}}"
                                                                    data-tooltip-touch-tap-to-show="true">?</sup></label>
                                                        </div>
                                                        <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                            style="width: 100%;">
                                                            <div name="medium_id" class="o_field_widget o_field_many2one">
                                                                <div class="o_field_many2one_selection">
                                                                    <div class="o_input_dropdown">
                                                                        <div class="o-autocomplete dropdown"><input
                                                                                type="text"
                                                                                class="o-autocomplete--input o_input"
                                                                                autocomplete="off" role="combobox"
                                                                                aria-autocomplete="list"
                                                                                aria-haspopup="listbox" id="medium_id_0"
                                                                                placeholder="" aria-expanded="false">
                                                                        </div><span class="o_dropdown_button"></span>
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
                                                            <label class="o_form_label" for="source_id_0">Source<sup
                                                                    class="text-info p-1"
                                                                    data-tooltip-template="web.FieldTooltip"
                                                                    data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;This is the source of the link, e.g. Search Engine, another domain, or name of email list&quot;}}"
                                                                    data-tooltip-touch-tap-to-show="true">?</sup></label>
                                                        </div>
                                                        <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                            style="width: 100%;">
                                                            <div name="source_id" class="o_field_widget o_field_many2one">
                                                                <div class="o_field_many2one_selection">
                                                                    <div class="o_input_dropdown">
                                                                        <div class="o-autocomplete dropdown"><input
                                                                                type="text"
                                                                                class="o-autocomplete--input o_input"
                                                                                autocomplete="off" role="combobox"
                                                                                aria-autocomplete="list"
                                                                                aria-haspopup="listbox" id="source_id_0"
                                                                                placeholder="" aria-expanded="false">
                                                                        </div><span class="o_dropdown_button"></span>
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
                                                            <label class="o_form_label" for="referred_0">Referred
                                                                By</label>
                                                        </div>
                                                        <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                            style="width: 100%;">
                                                            <div name="referred" class="o_field_widget o_field_char">
                                                                <input class="o_input" id="referred_0" type="text"
                                                                    autocomplete="off">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="o_inner_group grid col-lg-6">
                                                    <div class="g-col-sm-2">
                                                        <div
                                                            class="o_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">
                                                            Analysis</div>
                                                    </div>
                                                    <div
                                                        class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                        <div
                                                            class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                            <label class="o_form_label o_form_label_readonly"
                                                                for="date_open_0">Assignment Date</label>
                                                        </div>
                                                        <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                            style="width: 100%;">
                                                            <div name="date_open"
                                                                class="o_field_widget o_readonly_modifier o_field_datetime">
                                                                <div class="d-flex gap-2 align-items-center"><span
                                                                        class="text-truncate">14/08/2024 09:46:54</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                        <div
                                                            class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                            <label class="o_form_label o_form_label_readonly"
                                                                for="date_closed_0">Closed Date</label>
                                                        </div>
                                                        <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                            style="width: 100%;">
                                                            <div name="date_closed"
                                                                class="o_field_widget o_readonly_modifier o_field_datetime">
                                                                <div class="d-flex gap-2 align-items-center"><span
                                                                        class="text-truncate"></span></div>
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
                                                                title="13/8/2024, 2:12:31 pm">- now</small>
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

    <script>
        document.getElementById('editableDiv').addEventListener('paste', function(event) {
            // This allows the paste to occur without restriction
            let items = (event.clipboardData || event.originalEvent.clipboardData).items;
            let isImagePasted = false;

            for (let index in items) {
                let item = items[index];
                if (item.kind === 'file') {
                    let blob = item.getAsFile();
                    let reader = new FileReader();
                    reader.onload = function(event) {
                        let img = document.createElement('img');
                        img.src = event.target.result;
                        document.getElementById('editableDiv').appendChild(img);
                    };
                    reader.readAsDataURL(blob);
                    isImagePasted = true;
                }
            }

            if (isImagePasted) {
                event.preventDefault();
            }
        });
    </script>

      @push('scripts')
        <script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>
        <script>
            ClassicEditor
                .create(document.querySelector('#description'))
                .catch(error => {
                    console.error(error);
                });
        </script>
    @endpush

@endsection
