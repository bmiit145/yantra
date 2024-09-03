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
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css"> --}}
<!-- Select2 CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<style>
    .buyerlead h3 {
        font-size: 30px;
        margin: 0 0 30px;
    }

    .lead-box {
        box-shadow: 0 0 4px #0b9a9d;
        padding: 20px;
        border-radius: 8px;
        margin: 0 0 20px;
    }

    .lead-details-img>img:first-child {
        width: 250px
    }

    .lead-details-img>img:last-child {
        width: 180px
    }

    .main-lead-details {
        background: #daeef2;
        padding: 20px;
        border-radius: 10px;
    }

    .buyer-contact h5,
    .buyerlead h5 {
        font-size: 20px;
        margin: 0 0 10px;
        background: #eaeaea;
        padding: 8px;
    }

    .buyer-contact ul {
        padding: 0;
        margin: 0;
    }

    .buyer-contact ul li {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 16px;
        font-weight: 600;
    }

    .buyer-contact ul li:not(:last-child) {
        margin: 0 0 10px;
    }

    .lead-user-info p,
    .lead-user-info span,
    .buyerlead p {
        margin: 0 0 5px;
        font-size: 17px;
    }

    .lead-user-info span {
        display: flex;
        gap: 8px;
        margin-top: 18px;
    }

    .lead-user-info {
        margin: 10px 0 20px;
        width: 80%;
        flex: 0 0 80%;
        padding-right: 20px;
    }

    .lead-user-img {
        width: 20%;
        flex: 0 0 20%;
    }

    .lead-user-info p a {
        color: #0d6efd;
        text-decoration: underline !important;
    }

</style>
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

</style>

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
                        <div class="o_form_statusbar position-relative d-flex justify-content-between mb-0 mb-md-2 pb-2 pb-md-0">
                            <div class="o_statusbar_buttons d-flex align-items-center align-content-around flex-wrap gap-1">
                                <button invisible="type == 'opportunity' or not active" data-hotkey="v" class="btn btn-primary" name="511" type="action"><span>Convert to
                                        Opportunity</span></button><button data-hotkey="l" invisible="type == 'opportunity' or probability == 0 and not active" class="btn btn-secondary" name="510" type="action" data-tooltip="Mark as lost"><span>Lost</span></button>
                            </div>
                        </div>
                        <input type="hidden" name="lead_id" id="lead_id" value="{{ isset($data) ? $data->id : '' }}">
                        <div class="o_form_sheet position-relative">
                            <div class="oe_title">
                                <h1>
                                    <div name="name" class="o_field_widget">
                                        <div style="height: 45px;">
                                            <textarea class="o_input" id="name_0" style="width: 1000px" value="{{ isset($data) ? $data->product_name : '' }}" placeholder="e.g. Product Pricing" rows="1" spellcheck="false" style="height: 45px; border-top-width: 0px; border-bottom-width: 1px; padding: 1px 0px;">{{ isset($data) ? $data->product_name : '' }}</textarea>
                                        </div>
                                    </div>
                                </h1>
                                <h2 class="row g-0 pb-3 pb-sm-4">
                                    <div class="col-auto"><label class="o_form_label d-inline-block" for="probability_0">Probability</label>
                                        <div id="probability" class="d-flex align-items-baseline">
                                            <div name="probability" class="o_field_widget o_field_float oe_inline o_input_6ch">
                                                <input inputmode="decimal" class="o_input" value="{{ isset($data) ? $data->probability : '' }}" autocomplete="off" id="probability_0" type="text">
                                            </div><span class="oe_grey p-2">
                                                %</span>
                                        </div>
                                    </div>
                                </h2>
                            </div>
                            <div class="o_group row align-items-start">
                                <div class="o_inner_group grid col-lg-6">
                                    <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                        <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                            <label class="o_form_label" for="partner_name_0">Company Name<sup class="text-info p-1" data-tooltip-template="web.FieldTooltip" data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;The name of the future partner company that will be created while converting the lead into opportunity&quot;}}" data-tooltip-touch-tap-to-show="true">?</sup></label>
                                        </div>
                                        <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                            <div name="partner_name" class="o_field_widget o_field_char"><input class="o_input" id="partner_name_0" type="text" value="{{isset($data) ? $data->company_name : ''}}" autocomplete="off"></div>
                                        </div>
                                    </div>
                                    <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                        <div class="o_cell flex-grow-1 flex-sm-grow-0 o_wrap_label w-100 text-break text-900" style=""><label class="o_form_label" for="street_0">Address</label>
                                        </div>
                                        @php
                                        $address = isset($data) ? $data->address_1 : '';
                                        $zip = '';

                                        if (preg_match('/\b\d{5,6}\b$/', $address, $matches)) {
                                        $zip = $matches[0];
                                        $address = str_replace($zip, '', $address);
                                        }
                                        @endphp
                                        <div class="o_cell flex-grow-1 flex-sm-grow-0" style="width: 100%;">
                                            <div class="o_address_format">
                                                <div name="street" class="o_field_widget o_field_char o_address_street"><input class="o_input" id="street_0" type="text" autocomplete="off" value="{{ $address }}" placeholder="Street..."></div>
                                                <div name="street2" class="o_field_widget o_field_char o_address_street"><input class="o_input" id="street2_0" value="{{ isset($data) ? $data->address_2 : '' }}" type="text" autocomplete="off" placeholder="Street 2...">
                                                </div>
                                                <div name="city" class="o_field_widget o_field_char o_address_city"><input class="o_input" id="city_0" type="text" value="{{ isset($data) ? $data->city : '' }}" autocomplete="off" placeholder="City"></div>
                                                <div name="zip" class="o_field_widget o_field_char o_address_zip">

                                                    <input class="o_input" value="{{ $zip }}" id="zip_0" type="text" autocomplete="off" placeholder="ZIP">
                                                </div>
                                                <div name="state_id" class="o_field_widget o_field_many2one o_address_state">
                                                    <div class="o_field_many2one_selection">
                                                        <div class="o_input_dropdown">
                                                            <div class="o-autocomplete dropdown">
                                                                {{-- <input type="text" class="o-autocomplete--input o_input" autocomplete="off" role="combobox"     aria-autocomplete="list" aria-haspopup="listbox" id="state_id_0" placeholder="State" aria-expanded="false"> --}}
                                                                <select class="o-autocomplete--input o_input" id="state_id_0" style="width: 150px;">
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="o_field_many2one_extra"></div>
                                                </div>
                                                <div name="country" class="o_field_widget o_field_many2one">
                                                    <div class="o_field_many2one_selection">
                                                        <div class="o_input_dropdown">
                                                            <div class="o-autocomplete dropdown">
                                                                <select class="o-autocomplete--input o_input" id="country_id_0" style="width: 150px;">
                                                                    <option value="">Country</option>
                                                                    @foreach ($countrys as $country)
                                                                    <option value="{{ $country->id }}" {{ isset($data) && $data->country == $country->id ? 'selected' : '' }}>
                                                                        {{ $country->name }}
                                                                    </option>
                                                                    @endforeach

                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="o_field_many2one_extra"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                        <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                            <label class="o_form_label" for="website_0">Website<sup class="text-info p-1" data-tooltip-template="web.FieldTooltip" data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;Website of the contact&quot;}}" data-tooltip-touch-tap-to-show="true">?</sup></label>
                                        </div>
                                        <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                            <div name="website" class="o_field_widget o_field_url">
                                                <div class="d-inline-flex w-100"><input class="o_input" value="{{ isset($data) ? $data->website_link : '' }}" type="text" autocomplete="off" id="website_0" placeholder="e.g. https://www.odoo.com"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="o_inner_group grid col-lg-6">
                                    <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                        <div class="o_cell flex-grow-1 flex-sm-grow-0 o_wrap_label w-100 text-break text-900" style=""><label class="o_form_label" for="contact_name_0">Contact
                                                Name</label></div>
                                        <div class="o_cell flex-grow-1 flex-sm-grow-0" style="width: 100%;">
                                            <div class="o_row">
                                                <div name="contact_name" class="o_field_widget o_field_char">
                                                    <input class="o_input" id="contact_name_0" value="{{ isset($data) ? $data->contact_name : '' }}" type="text" autocomplete="off">
                                                </div>
                                                <div name="title" class="o_field_widget o_field_many2one">
                                                    <div class="o_field_many2one_selection">
                                                        <div class="o_input_dropdown">
                                                            <div class="o-autocomplete dropdown">
                                                                <div class="title_select_hide">
                                                                    <select class="o-autocomplete--input o_input" id="title_0" style="width: 150px;">
                                                                        <option value="">Selecte Title </option>
                                                                        @foreach ($titles as $title)
                                                                        <option value="{{ $title->id }}" @if (isset($data->title) && $title->id == $data->title) selected @endif>
                                                                            {{ $title->title }}</option>
                                                                        @endforeach
                                                                        <option value="add_new">Start typing...
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                                <input type="text" id="new_title_input" class="o_input mt-2" style="display: none; " placeholder="Enter new title">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="o_field_many2one_extra"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                        <div class="o_cell flex-grow-1 flex-sm-grow-0 o_wrap_label w-100 text-break text-900" style=""><label class="o_form_label oe_inline" for="email_from_1">Email</label></div>
                                        <div class="o_cell flex-grow-1 flex-sm-grow-0" style="width: 100%;">
                                            <div class="o_row o_row_readonly">
                                                <div name="email_from" class="o_field_widget o_field_email">
                                                    <div class="d-inline-flex w-100"><input class="o_input" type="email" value="{{ isset($data) ? $data->email : '' }}" autocomplete="off" id="email_from_1">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                        <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                            <label class="o_form_label" for="function_0">Job Position</label>
                                        </div>
                                        <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                            <div name="function" class="o_field_widget o_field_char"><input class="o_input" id="function_0" type="text" value="{{ isset($data) ? $data->job_postion : '' }}" autocomplete="off"></div>
                                        </div>
                                    </div>
                                    <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                        <div class="o_cell flex-grow-1 flex-sm-grow-0 o_wrap_label w-100 text-break text-900" style=""><label class="o_form_label oe_inline" for="phone_1">Phone</label></div>
                                        <div class="o_cell flex-grow-1 flex-sm-grow-0" style="width: 100%;">
                                            <div class="o_row o_row_readonly">
                                                <div name="phone" class="o_field_widget o_field_phone">
                                                    <div class="o_phone_content d-inline-flex w-100"><input class="o_input" type="tel" value="{{ isset($data) ? $data->phone : '' }}" autocomplete="off" id="phone_1"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                        <div class="o_cell flex-grow-1 flex-sm-grow-0 o_wrap_label w-100 text-break text-900" style=""><label class="o_form_label oe_inline" for="mobile_0">Mobile</label></div>
                                        <div class="o_cell flex-grow-1 flex-sm-grow-0" style="width: 100%;">
                                            <div class="o_row o_row_readonly">
                                                <div name="mobile" class="o_field_widget o_field_phone">
                                                    <div class="o_phone_content d-inline-flex w-100"><input class="o_input" type="tel" autocomplete="off" value="{{ isset($data) ? $data->mobile : '' }}" id="mobile_0"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="o_inner_group grid col-lg-6">
                                    <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                        <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                            <label class="o_form_label" for="user_id_1">Salesperson</label>
                                        </div>
                                        <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                            <div name="user_id" class="o_field_widget o_field_many2one_avatar_user o_field_many2one_avatar">
                                                <div class="d-flex align-items-center gap-1" data-tooltip="info@yantradesign.co.in"><span class="o_avatar o_m2o_avatar"><img class="rounded" src="/web/image/res.users/2/avatar_128"></span>
                                                    <div class="o_field_many2one_selection">
                                                        <div class="o_input_dropdown">
                                                            <div class="o-autocomplete dropdown"><input type="text" class="o-autocomplete--input o_input" autocomplete="off" role="combobox" aria-autocomplete="list" aria-haspopup="listbox" id="user_id_1" placeholder="" aria-expanded="false"></div>
                                                            <span class="o_dropdown_button"></span>
                                                        </div><button type="button" class="btn btn-link text-action oi o_external_button oi-arrow-right" tabindex="-1" draggable="false" aria-label="Internal link" data-tooltip="Internal link"></button>
                                                    </div>
                                                    <div class="o_field_many2one_extra"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                        <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                            <label class="o_form_label" for="team_id_0">Sales Team</label>
                                        </div>
                                        <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                            <div name="team_id" class="o_field_widget o_field_many2one">
                                                <div class="o_field_many2one_selection">
                                                    <div class="o_input_dropdown">
                                                        <div class="o-autocomplete dropdown"><input type="text" class="o-autocomplete--input o_input" autocomplete="off" role="combobox" aria-autocomplete="list" aria-haspopup="listbox" id="team_id_0" placeholder="" aria-expanded="false">
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
                                        <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                            <label class="o_form_label" for="priority_1">Priority</label>
                                        </div>
                                        <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                            <div name="priority" class="o_field_widget o_field_priority">
                                                <div class="o_priority" role="radiogroup" name="priority" aria-label="Priority"><a href="#" class="o_priority_star fa fa-star-o" role="radio" tabindex="-1" data-tooltip="Priority: Medium" aria-label="Medium"></a><a href="#" class="o_priority_star fa fa-star-o" role="radio" tabindex="-1" data-tooltip="Priority: High" aria-label="High"></a><a href="#" class="o_priority_star fa fa-star-o" role="radio" tabindex="-1" data-tooltip="Priority: Very High" aria-label="Very High"></a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                        <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                            <label class="o_form_label" for="tag_ids_1">Tags<sup class="text-info p-1" data-tooltip-template="web.FieldTooltip" data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;Classify and analyze your lead/opportunity categories like: Training, Service&quot;}}" data-tooltip-touch-tap-to-show="true">?</sup></label>
                                        </div>
                                        <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                            <div name="tag_ids" class="o_field_widget o_field_many2many_tags">
                                                <div class="o_field_tags d-inline-flex flex-wrap gap-1 mw-100 o_tags_input o_input">
                                                    <div class="o_field_many2many_selection d-inline-flex w-100">
                                                        <div class="o_input_dropdown">
                                                            <div class="tag_input_hide">
                                                                @php
                                                                $selectedTagIds = isset($data->tag_id)
                                                                ? (is_array($data->tag_id)
                                                                ? $data->tag_id
                                                                : explode(',', $data->tag_id))
                                                                : [];
                                                                @endphp
                                                                <select class="o-autocomplete--input o_input" id="tag_ids_1" style="width: 150px;" multiple>
                                                                    @foreach ($tags as $tag)
                                                                    <option value="{{ $tag->id }}" data-color="{{ $tag->color }}" {{ in_array($tag->id, $selectedTagIds) ? 'selected' : '' }}>
                                                                        {{ $tag->name }}</option>
                                                                    @endforeach
                                                                    <option value="add_new_tag">Start typing...
                                                                    </option>
                                                                </select>
                                                            </div>
                                                            <input type="text" id="new_tag_input" class="o_input mt-2" style="display: none;" placeholder="Enter new tag">
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
                                        <li class="nav-item flex-nowrap cursor-pointer"><a class="nav-link active" href="#internal_notes" role="tab" data-bs-toggle="tab" tabindex="0" name="internal_notes">Internal Notes</a></li>
                                        <li class="nav-item flex-nowrap cursor-pointer"><a class="nav-link " href="#extra" role="tab" data-bs-toggle="tab" tabindex="0" name="extra">Extra Info</a></li>
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
                                                    <div class="o_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">
                                                        Marketing</div>
                                                </div>
                                                <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                    <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                        <label class="o_form_label" for="campaign_id_0">Campaign<sup class="text-info p-1" data-tooltip-template="web.FieldTooltip" data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;This is a name that helps you keep track of your different campaign efforts, e.g. Fall_Drive, Christmas_Special&quot;}}" data-tooltip-touch-tap-to-show="true">?</sup></label>
                                                    </div>
                                                    <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                                        <div name="campaign_id" class="o_field_widget o_field_many2one">
                                                            <div class="o_field_many2one_selection">
                                                                <div class="o_input_dropdown">
                                                                    <div class="o-autocomplete dropdown"><input type="text" class="o-autocomplete--input o_input" autocomplete="off" role="combobox" aria-autocomplete="list" aria-haspopup="listbox" id="campaign_id_0" placeholder="" aria-expanded="false">
                                                                    </div><span class="o_dropdown_button"></span>
                                                                </div>
                                                            </div>
                                                            <div class="o_field_many2one_extra"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                    <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                        <label class="o_form_label" for="medium_id_0">Medium<sup class="text-info p-1" data-tooltip-template="web.FieldTooltip" data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;This is the method of delivery, e.g. Postcard, Email, or Banner Ad&quot;}}" data-tooltip-touch-tap-to-show="true">?</sup></label>
                                                    </div>
                                                    <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                                        <div name="medium_id" class="o_field_widget o_field_many2one">
                                                            <div class="o_field_many2one_selection">
                                                                <div class="o_input_dropdown">
                                                                    <div class="o-autocomplete dropdown"><input type="text" class="o-autocomplete--input o_input" autocomplete="off" role="combobox" aria-autocomplete="list" aria-haspopup="listbox" id="medium_id_0" placeholder="" aria-expanded="false">
                                                                    </div><span class="o_dropdown_button"></span>
                                                                </div>
                                                            </div>
                                                            <div class="o_field_many2one_extra"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                    <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                        <label class="o_form_label" for="source_id_0">Source<sup class="text-info p-1" data-tooltip-template="web.FieldTooltip" data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;This is the source of the link, e.g. Search Engine, another domain, or name of email list&quot;}}" data-tooltip-touch-tap-to-show="true">?</sup></label>
                                                    </div>
                                                    <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                                        <div name="source_id" class="o_field_widget o_field_many2one">
                                                            <div class="o_field_many2one_selection">
                                                                <div class="o_input_dropdown">
                                                                    <div class="o-autocomplete dropdown"><input type="text" class="o-autocomplete--input o_input" autocomplete="off" role="combobox" aria-autocomplete="list" aria-haspopup="listbox" id="source_id_0" placeholder="" aria-expanded="false">
                                                                    </div><span class="o_dropdown_button"></span>
                                                                </div>
                                                            </div>
                                                            <div class="o_field_many2one_extra"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                    <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                        <label class="o_form_label" for="referred_0">Referred
                                                            By</label>
                                                    </div>
                                                    <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                                        <div name="referred" class="o_field_widget o_field_char">
                                                            <input class="o_input" id="referred_0" type="text" autocomplete="off">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="o_inner_group grid col-lg-6">
                                                <div class="g-col-sm-2">
                                                    <div class="o_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">
                                                        Analysis</div>
                                                </div>
                                                <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                    <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                        <label class="o_form_label o_form_label_readonly" for="date_open_0">Assignment Date</label>
                                                    </div>
                                                    <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                                        <div name="date_open" class="o_field_widget o_readonly_modifier o_field_datetime">
                                                            <div class="d-flex gap-2 align-items-center"><span class="text-truncate">14/08/2024 09:46:54</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                    <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                        <label class="o_form_label o_form_label_readonly" for="date_closed_0">Closed Date</label>
                                                    </div>
                                                    <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                                        <div name="date_closed" class="o_field_widget o_readonly_modifier o_field_datetime">
                                                            <div class="d-flex gap-2 align-items-center"><span class="text-truncate"></span></div>
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
                        <div class="o-mail-Chatter w-100 h-100 flex-grow-1 d-flex flex-column overflow-auto o-chatter-disabled">
                            <div class="o-mail-Chatter-top d-print-none position-sticky top-0">
                                <div class="o-mail-Chatter-topbar d-flex flex-shrink-0 flex-grow-0 overflow-x-auto">
                                    <button class="o-mail-Chatter-sendMessage btn text-nowrap me-1 btn-primary my-2" data-hotkey="m"> Send message </button><button class="o-mail-Chatter-logNote btn text-nowrap me-1 btn-secondary my-2" data-hotkey="shift+m"> Log note </button>
                                    <div class="flex-grow-1 d-flex"><button class="o-mail-Chatter-activity btn btn-secondary text-nowrap my-2" data-hotkey="shift+a"><span>Activities</span></button><span class="o-mail-Chatter-topbarGrow flex-grow-1 pe-2"></span><button class="btn btn-link text-action" aria-label="Search Messages" title="Search Messages"><i class="oi oi-search" role="img"></i></button><span style="display:contents"><button class="o-mail-Chatter-attachFiles btn btn-link text-action px-1 d-flex align-items-center my-2" aria-label="Attach files"><i class="fa fa-paperclip fa-lg me-1"></i></button></span><input type="file" class="o_input_file d-none o-mail-Chatter-fileUploader" multiple="multiple" accept="*">
                                        <div class="o-mail-Followers d-flex me-1"><button class="o-mail-Followers-button btn btn-link d-flex align-items-center text-action px-1 my-2 o-dropdown dropdown-toggle dropdown" disabled="" title="Show Followers" aria-expanded="false"><i class="fa fa-user-o me-1" role="img"></i><sup class="o-mail-Followers-counter">0</sup></button></div><button class="o-mail-Chatter-follow btn btn-link  px-0 text-600">
                                            <div class="position-relative"><span class="d-flex invisible text-nowrap">Following</span><span class="position-absolute end-0 top-0"> Follow </span></div>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="o-mail-Chatter-content">
                                @if(isset($data) && $data->lead_type == 1)
                                @php
                                $logs = isset($data) ? $data->logs : collect(); // Ensure $logs is always a collection
                                @endphp

                                <x-log-display :logs="$logs" />
                                @endif

                                @if($data->lead_type == 2)
                              
                                <div class="main-lead-details">
                                    <div class="lead-details">
                                        <div class="lead-box">
                                            <div class="lead-details-img row justify-content-between mb-3">
                                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQNj_OgfNeyTLpUGGG2O7x3-asrzFB6RLPebQ&s">
                                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQNj_OgfNeyTLpUGGG2O7x3-asrzFB6RLPebQ&s">
                                            </div>
                                            <h6 class="text-end me-5 mb-4" style="font-size:22px;color:#4b566f;">Buy
                                                Lead
                                                through indiaMART</h6>
                                            <div class="buyer-contact">
                                                <h5>Buyer`s Contact Details:</h5>
                                                <ul>
                                                    <li>Phone
                                                        <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#5f6368">
                                                            <rect fill="none" height="24" width="24" />
                                                            <path d="M22,5.18L10.59,16.6l-4.24-4.24l1.41-1.41l2.83,2.83l10-10L22,5.18z M19.79,10.22C19.92,10.79,20,11.39,20,12 c0,4.42-3.58,8-8,8s-8-3.58-8-8c0-4.42,3.58-8,8-8c1.58,0,3.04,0.46,4.28,1.25l1.44-1.44C16.1,2.67,14.13,2,12,2C6.48,2,2,6.48,2,12 c0,5.52,4.48,10,10,10s10-4.48,10-10c0-1.19-0.22-2.33-0.6-3.39L19.79,10.22z" />
                                                        </svg>
                                                    </li>
                                                    <li>Email
                                                        <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#5f6368">
                                                            <rect fill="none" height="24" width="24" />
                                                            <path d="M22,5.18L10.59,16.6l-4.24-4.24l1.41-1.41l2.83,2.83l10-10L22,5.18z M19.79,10.22C19.92,10.79,20,11.39,20,12 c0,4.42-3.58,8-8,8s-8-3.58-8-8c0-4.42,3.58-8,8-8c1.58,0,3.04,0.46,4.28,1.25l1.44-1.44C16.1,2.67,14.13,2,12,2C6.48,2,2,6.48,2,12 c0,5.52,4.48,10,10,10s10-4.48,10-10c0-1.19-0.22-2.33-0.6-3.39L19.79,10.22z" />
                                                        </svg>
                                                    </li>
                                                    <li>GST
                                                        <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#5f6368">
                                                            <rect fill="none" height="24" width="24" />
                                                            <path d="M22,5.18L10.59,16.6l-4.24-4.24l1.41-1.41l2.83,2.83l10-10L22,5.18z M19.79,10.22C19.92,10.79,20,11.39,20,12 c0,4.42-3.58,8-8,8s-8-3.58-8-8c0-4.42,3.58-8,8-8c1.58,0,3.04,0.46,4.28,1.25l1.44-1.44C16.1,2.67,14.13,2,12,2C6.48,2,2,6.48,2,12 c0,5.52,4.48,10,10,10s10-4.48,10-10c0-1.19-0.22-2.33-0.6-3.39L19.79,10.22z" />
                                                        </svg>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="main-lead-user-info row">
                                            <div class="lead-user-info">
                                                <p>{{ isset($data) ? $data->contact_name : '' }}</p>
                                                <p>{{isset($data) ? $data->address_1 : ''}}
                                                </p>
                                                <p>
                                                    Click to Call : <a href="tel:{{ isset($data) ? $data->mobile : ''}}">{{isset($data) ? $data->mobile : ''}}</a>
                                                </p>
                                                <p>
                                                    E-mail : <a href="mailto:{{isset($data) ? $data->email : ''}}">{{isset($data) ? $data->email : ''}}</a>
                                                </p>
                                                <span>
                                                    <p>Member Since: </p> 7+ years
                                                </span>

                                            </div>
                                            <div class="lead-user-img">
                                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQNj_OgfNeyTLpUGGG2O7x3-asrzFB6RLPebQ&s">
                                            </div>
                                        </div>
                                        <div class="buyerlead">
                                            <h5>Buylead Details:</h5>
                                            <h3>{{isset($data) ? $data->product_name : ''}}</h3>
                                            <p><b>Probable Requirement Type: </b> Business Use</p>
                                        </div>
                                    </div>
                                </div>
                                @endif

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
        <div class="o-mail-ChatHub-bubbles position-fixed end-0 d-flex flex-column align-content-start justify-content-end align-items-center bottom-0" style="">
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
<script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script>
    $("#title_0").select2({
        placeholder: "Select Title"
        , allowClear: true
    });
    $("#country_id_0").select2({
        placeholder: "Select country"
        , allowClear: true
    });
    $("#state_id_0").select2({
        placeholder: "Select state"
        , allowClear: true
    });
    $("#tag_ids_1").select2({
        placeholder: "Select tag"
        , allowClear: true
    });

    $(document).ready(function() {
        function formatTag(tag) {
            if (!tag.id) {
                return tag.text; // Return text for non-tag elements
            }

            var color = $(tag.element).data('color');
            var $tag = $('<span>').text(tag.text);

            // Apply background color if specified
            if (color) {
                $tag.css('background-color', color);
                $tag.css('color', '#fff'); // Ensure text color is readable
                $tag.css('padding', '2px 12px');
                $tag.css('border-radius', '23px');
            }

            return $tag;
        }

        $('#tag_ids_1').select2({
            templateResult: formatTag
            , templateSelection: formatTag
            , width: 'resolve' // Adjust width if necessary
        });
    });

</script>

<script>
    $(document).ready(function() {
        $('#country_id_0').on('change', function() {
            var idCountry = this.value;
            $("#state_id_0").html('');
            $.ajax({
                url: "{{ route('fetch-states') }}"
                , type: "POST"
                , data: {
                    country_id: idCountry
                    , _token: '{{ csrf_token() }}'
                }
                , dataType: 'json'
                , success: function(result) {
                    $('#state_id_0').html('<option value="">-- Select State --</option>');
                    $.each(result.states, function(key, value) {
                        $("#state_id_0").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                }
            });
        });

        const select = $('#title_0');
        const newTitleInput = $('#new_title_input');

        select.on('change', function() {
            if ($(this).val() === 'add_new') {
                $('.title_select_hide').hide();
                newTitleInput.show().focus();
            } else {
                newTitleInput.hide();
            }
        });

        newTitleInput.on('keypress', function(e) {
            if (e.which === 13) {
                const newTitle = $(this).val();
                if (newTitle) {
                    $.ajax({
                        url: '{{ route('add-title') }}'
                        , type: 'POST'
                        , data: {
                            _token: '{{ csrf_token() }}'
                            , title: newTitle
                        }
                        , success: function(response) {
                            select.append(new Option(response.title, response.id));
                            select.val(response.id);
                            newTitleInput.hide().val('');
                            window.location.reload();
                        }
                        , error: function() {
                            alert('Error adding title.');
                        }
                    });
                }
            }
        });

        $('#contact_name_0').on('input', function() {
            const query = $(this).val().toLowerCase();
            select.find('option').each(function() {
                const text = $(this).text().toLowerCase();
                $(this).toggle(text.includes(query));
            });
        });



        // const selectTag = $('#tag_ids_1');
        // const newTagInput = $('#new_tag_input');

        // selectTag.on('change', function() {
        //     if ($(this).val() === 'add_new_tag') {
        //         $('.tag_input_hide').hide();
        //         newTagInput.show().focus();
        //     } else {
        //         newTagInput.hide();            
        //     }
        // });

        const selectTag = $('#tag_ids_1');
        const newTagInput = $('#new_tag_input');

        newTagInput.hide();

        selectTag.on('change', function() {
            const selectedValue = $(this).val();

            if (selectedValue.includes('add_new_tag')) {
                $('.tag_input_hide').hide();
                newTagInput.show().focus();
            } else {
                newTagInput.hide();
                $('.tag_input_hide').show();
            }
        });



        newTagInput.on('keypress', function(e) {
            if (e.which === 13) {
                const newTag = $(this).val();
                if (newTag) {
                    $.ajax({
                        url: '{{ route('add-tag') }}'
                        , type: 'POST'
                        , data: {
                            _token: '{{ csrf_token() }}'
                            , tag: newTag
                        }
                        , success: function(response) {
                            selectTag.append(new Option(response.tag, response.id));
                            selectTag.val(response.id);
                            newTagInput.hide().val('');
                            window.location.reload();
                        }
                        , error: function() {
                            alert('Error adding title.');
                        }
                    });
                }
            }
        });

        $('#contact_name_0').on('input', function() {
            const query = $(this).val().toLowerCase();
            select.find('option').each(function() {
                const text = $(this).text().toLowerCase();
                $(this).toggle(text.includes(query));
            });
        });

    });

</script>

<script>
    ClassicEditor
        .create(document.querySelector('#description'))
        .catch(error => {
            console.error(error);
        });

</script>
<script>
    $('#main_save_btn').click(function() {
        var lead_id = $('#lead_id').val();
        var name_0 = $('#name_0').val();
        var probability_0 = $('#probability_0').val();
        var street_0 = $('#street_0').val();
        var street2_0 = $('#street2_0').val();
        var city_0 = $('#city_0').val();
        var zip_0 = $('#zip_0').val();
        var state_id_0 = $('#state_id_0').val();
        var country_id_0 = $('#country_id_0').val();
        var website_0 = $('#website_0').val();
        var user_id_1 = $('#user_id_1').val();
        var team_id_0 = $('#team_id_0').val();
        var contact_name_0 = $('#contact_name_0').val();
        var title_0 = $('#title_0').val();
        var email_from_1 = $('#email_from_1').val();
        var function_0 = $('#function_0').val();
        var phone_1 = $('#phone_1').val();
        var mobile_0 = $('#mobile_0').val();
        var tag_ids_1 = $('#tag_ids_1').val();


        if (!name_0) {
            toastr.error('fields is required');
            $('#name_0').css({
                'border-color': 'red'
                , 'background-color': '#ff99993d'
            });
        }

        $.ajax({
            url: '{{ route('lead.store') }}'
            , type: 'POST'
            , data: {
                _token: '{{ csrf_token() }}'
                , lead_id: lead_id
                , name_0: name_0
                , probability_0: probability_0
                , street_0: street_0
                , street2_0: street2_0
                , city_0: city_0
                , zip_0: zip_0
                , state_id_0: state_id_0
                , country_id_0: country_id_0
                , website_0: website_0
                , user_id_1: user_id_1
                , team_id_0: team_id_0
                , contact_name_0: contact_name_0
                , title_0: title_0
                , email_from_1: email_from_1
                , function_0: function_0
                , phone_1: phone_1
                , mobile_0: mobile_0
                , tag_ids_1: tag_ids_1
            , }
            , success: function(response) {
                toastr.success(response.message);

                setTimeout(function() {
                    window.location.href = "{{ route('lead.index') }}";
                }, 2000);

            }
            , error: function(xhr, status, error) {
                toastr.error('Something went wrong!');
            }
        });
    });

</script>
@endpush

@endsection
