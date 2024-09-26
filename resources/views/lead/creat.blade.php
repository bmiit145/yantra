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
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"> -->


{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"> --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css">






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

    input {
        font-family: 'Roboto', sans-serif;
        display:block;
        border: none;
        border-radius: 0.25rem;
        border: 1px solid transparent;
        line-height: 1.5rem;
        padding: 0;
        font-size: 1rem;
        color: #607D8B;
        width: 100%;
        margin-top: 0.5rem;
    }
    input:focus {outline: none;}
    #ui-datepicker-div {
        display: none;
        background-color: #fff;
        box-shadow: 0 0.125rem 0.5rem rgba(0,0,0,0.1);
        margin-top: 0.25rem;
        border-radius: 0.5rem;
        padding: 0.5rem;
    }
    table {
        border-collapse: collapse;
        border-spacing: 0;
    }
    .ui-datepicker-calendar thead th {
        padding: 0.25rem 0;
        text-align: center;
        font-size: 0.75rem;
        font-weight: 400;
        color: #78909C;
    }
    .ui-datepicker-calendar tbody td {
        width: 2.5rem;
        text-align: center;
        padding: 0;
    }
    .ui-datepicker-calendar tbody td a {
        display: block;
        border-radius: 0.25rem;
        line-height: 2rem;
        transition: 0.3s all;
        color: #546E7A;
        font-size: 0.875rem;
        text-decoration: none;
    }
    .ui-datepicker-calendar tbody td a:hover {	
        background-color: #E0F2F1;
    }
    .ui-datepicker-calendar tbody td a.ui-state-active {
        background-color: #009688;
        color: white;
    }
    .ui-datepicker-header a.ui-corner-all {
        cursor: pointer;
        position: absolute;
        top: 0;
        width: 2rem;
        height: 2rem;
        margin: 0.5rem;
        border-radius: 0.25rem;
        transition: 0.3s all;
    }
    .ui-datepicker-header a.ui-corner-all:hover {
        background-color: #ECEFF1;
    }
    .ui-datepicker-header a.ui-datepicker-prev {	
        left: 0;	
        background: url("data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMyIgaGVpZ2h0PSIxMyIgdmlld0JveD0iMCAwIDEzIDEzIj48cGF0aCBmaWxsPSIjNDI0NzcwIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik03LjI4OCA2LjI5NkwzLjIwMiAyLjIxYS43MS43MSAwIDAgMSAuMDA3LS45OTljLjI4LS4yOC43MjUtLjI4Ljk5OS0uMDA3TDguODAzIDUuOGEuNjk1LjY5NSAwIDAgMSAuMjAyLjQ5Ni42OTUuNjk1IDAgMCAxLS4yMDIuNDk3bC00LjU5NSA0LjU5NWEuNzA0LjcwNCAwIDAgMS0xLS4wMDcuNzEuNzEgMCAwIDEtLjAwNi0uOTk5bDQuMDg2LTQuMDg2eiIvPjwvc3ZnPg==");
        background-repeat: no-repeat;
        background-size: 0.5rem;
        background-position: 50%;
        transform: rotate(180deg);
    }
    .ui-datepicker-header a.ui-datepicker-next {
        right: 0;
        background: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMyIgaGVpZ2h0PSIxMyIgdmlld0JveD0iMCAwIDEzIDEzIj48cGF0aCBmaWxsPSIjNDI0NzcwIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik03LjI4OCA2LjI5NkwzLjIwMiAyLjIxYS43MS43MSAwIDAgMSAuMDA3LS45OTljLjI4LS4yOC43MjUtLjI4Ljk5OS0uMDA3TDguODAzIDUuOGEuNjk1LjY5NSAwIDAgMSAuMjAyLjQ5Ni42OTUuNjk1IDAgMCAxLS4yMDIuNDk3bC00LjU5NSA0LjU5NWEuNzA0LjcwNCAwIDAgMS0xLS4wMDcuNzEuNzEgMCAwIDEtLjAwNi0uOTk5bDQuMDg2LTQuMDg2eiIvPjwvc3ZnPg==');
        background-repeat: no-repeat;
        background-size: 10px;
        background-position: 50%;
    }
    .ui-datepicker-header a>span {
        display: none;
    }
    .ui-datepicker-title {
        text-align: center;
        line-height: 2rem;
        margin-bottom: 0.25rem;
        font-size: 0.875rem;
        font-weight: 500;
        padding-bottom: 0.25rem;
    }
    .ui-datepicker-week-col {
        color: #78909C;
        font-weight: 400;
        font-size: 0.75rem;
    }
    .o-mail-AttachmentList-mas {
        display: flex;
    }
    .o-mail-AttachmentImage {
        width: 33.33%;
        padding: 0 15px;
    }
    .o-mail-AttachmentList {
        max-width: 60%;
    }
    .crmright_head_main__1{
        display:none;


        
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

    .activity-avatar-initials {
        width: 40px;
        height: 40px;
        background-color: #017e84;
        color: white;
        font-size: 20px;
        border-radius: 50%;
        text-align: center;
        line-height: 40px;
    }

    .today-label {
        --color: RGBA(154, 107, 1, var(--text-opacity, 1));
        color: var(--color) !important;
    }

    .today-icon {
        background-color: #E99D00;/* Adjust background color for today */
        color: #E99D00;
    }
    
    .popover-body {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }
    .popover-body textarea {
        width: 100%;
        height: 100px;
    }
    #search-input{
        display: none;
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
                                <button invisible="type == 'opportunity' or not active" data-hotkey="v" class="btn btn-primary " name="511" type="action"><span>Convert to
                                        Opportunity</span></button>
                                        <button data-hotkey="l" data-id="{{isset($data) ? $data->id : ''}}" invisible="type == 'opportunity' or probability == 0 and not active" class="btn btn-secondary lead_lost_btn" name="510" type="action" data-tooltip="Mark as lost" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><span>Lost</span></button>
                                        @if($count > 1)
                                            <a href="{{ route('leads.similar', ['productName' => $data->product_name]) }}">
                                                <button class="btn btn-secondary" type="button" data-tooltip="Show similar leads">
                                                    <span>Similar Leads</span><br>
                                                    <span>{{ $count ?? '' }}</span>
                                                </button>
                                            </a>
                                        @endif
                                            <!-- Modal -->
                                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-md">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Mark Lost</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <span style="font-size: 0.875rem;line-height: 1.5;font-weight: 500;">Lost Reason</span>
                                                            <div class="resonse_select_hide">
                                                                <select class="o-autocomplete--input o_input" id="lost_reasons" style="width: 100%;">
                                                                    <option value=""></option>
                                                                    @foreach ($lost_reasons as $reason)
                                                                    <option value="{{ $reason->id }}" @if (isset($data->lost_reason) && $reason->id == $data->lost_reason) selected @endif>
                                                                        {{ $reason->name }}</option>
                                                                    @endforeach
                                                                    <option value="add_new_reson">Start typing...
                                                                    </option>
                                                                </select>
                                                            </div>
                                                            <input type="text" id="new_lost_input" class="o_input mt-2" style="display: none; " placeholder="Enter new reason">
                                                
                                                    <br>
                                                    <span style="font-size: 0.875rem;line-height: 1.5;font-weight: 500;">Closing Note</span>
                                                    <textarea name="" id="closing_notes" cols="30" rows="10" class="form-control"></textarea>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary mark_as_lost" >Mark as Lost</button>
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                        
                            </div>                            
                        </div>
                        <input type="hidden" name="lead_id" id="lead_id" value="{{ isset($data) ? $data->id : '' }}">
                        <div class="o_form_sheet position-relative">
                        @if(isset($data) && $data->is_lost == 2)
                            <div class="o_widget o_widget_web_ribbon">
                                <div class="ribbon ribbon-top-right">
                                    <span class="text-bg-danger" title="">Lost</span>
                                </div>
                            </div>
                        @endif
                  
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
                                                                        @php
                                                                            // Check if the current country should be selected
                                                                            $isSelected = (isset($data) && $data->country == $country->id) || 
                                                                                        (isset($data) && $data->country == $country->code);
                                                                        @endphp
                                                                        <option value="{{ $country->id }}" {{ $isSelected ? 'selected' : '' }}>
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
                                                            value="{{ isset($data) ? $data->website_link : '' }}"
                                                            type="text" autocomplete="off" id="website_0"
                                                            placeholder="e.g. https://www.odoo.com"></div>
                                                </div>
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
                                        <div class="o_cell flex-grow-1 flex-sm-grow-0 o_wrap_label w-100 text-break text-900" style="">
                                            <label class="o_form_label oe_inline" for="email_from_1">Email</label>
                                        </div>
                                        <div class="o_cell flex-grow-1 flex-sm-grow-0" style="width: 100%;">
                                            <div class="o_row o_row_readonly">
                                                <div name="email_from" class="o_field_widget o_field_email">
                                                    <div class="d-inline-flex w-100">
                                                        <input class="o_input" type="email" value="{{ isset($data) ? $data->email : '' }}" autocomplete="off" id="email_from_1">
                                                    </div>
                                                    <span id="email_error_message" style="color: red; display: none;">This email already exists</span>
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
                                                    <span id="phone_error_message" style="color: red; display: none;">This phone already exists</span>
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
                                                                <div class="o-autocomplete dropdown">
                                                                        <select class="o-autocomplete--input o_input" id="sales_person" style="width: 150px;">
                                                                            <option value="">Salesperson</option>
                                                                            @foreach ($users as $user)
                                                                            <option value="{{ $user->id }}" 
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
                                                                    autocomplete="off" role="combobox" value="Sales" readonly
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
                                                    <div class="o_priority set-priority" role="radiogroup" name="priority" aria-label="Priority">
                                                        <a href="#" class="o_priority_star fa {{ isset($data->priority) && ($data->priority == 'medium' || $data->priority == 'high' || $data->priority == 'very_high') ? 'fa-star' : 'fa-star-o' }}"
                                                        role="radio" tabindex="-1" data-value="medium" data-tooltip="Priority: Medium" aria-label="Medium"></a>
                                                        <a href="#" class="o_priority_star fa {{ isset($data->priority) && ($data->priority == 'high' || $data->priority == 'very_high') ? 'fa-star' : 'fa-star-o' }}"
                                                        role="radio" tabindex="-1" data-value="high" data-tooltip="Priority: High" aria-label="High"></a>
                                                        <a href="#" class="o_priority_star fa {{ isset($data->priority) && $data->priority == 'very_high' ? 'fa-star' : 'fa-star-o' }}"
                                                        role="radio" tabindex="-1" data-value="very_high" data-tooltip="Priority: Very High" aria-label="Very High"></a>
                                                    </div>
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
                                        <textarea name="" class="makeMeSummernote" value="{{ isset($data) ? $data->internal_notes : '' }}" id="description" cols="30" rows="10">{{ isset($data) ? $data->internal_notes : '' }}</textarea>
                                  
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
                                                        <div name="campaign" class="o_field_widget o_field_many2one">
                                                            <div class="o_field_many2one_selection">
                                                                <div class="o_input_dropdown">
                                                                    <div class="o-autocomplete dropdown">
                                                                        <div class="campaign_select_hide">
                                                                            <select class="o-autocomplete--input o_input" id="campaign_id_0" style="width: 150px;">
                                                                                <option value="">Selecte Campaign</option>
                                                                                
                                                                                @foreach ($campaigns as $campaign)
                                                                                    <option value="{{ $campaign->id }}" @if (isset($data->campaign_id) && $campaign->id == $data->campaign_id) selected @endif>
                                                                                        {{ $campaign->name }}
                                                                                    </option>
                                                                                @endforeach
                                                                                <option value="add_campaign">Start typing...</option>
                                                                            </select>
                                                                        </div>
                                                                        <input type="text" id="new_campaign_input" class="o_input mt-2" style="display: none;">
                                                                    </div>
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
                                                                    <div class="o-autocomplete dropdown">
                                                                        <div class="medium_select_hide">
                                                                            <select class="o-autocomplete--input o_input" id="medium_id_0" style="width: 150px;">
                                                                                <option value="">Selecte Medium</option>
                                                                                @foreach ($mediums as $medium)
                                                                                    <option value="{{ $medium->id }}" @if (isset($data->medium_id) && $medium->id == $data->medium_id) selected @endif>
                                                                                        {{ $medium->name }}
                                                                                    </option>
                                                                                @endforeach
                                                                                <option value="add_medium">Start typing...</option>
                                                                            </select>
                                                                        </div>
                                                                        <input type="text" id="new_medium_input" class="o_input mt-2" style="display: none;">
                                                                    </div>
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
                                                                    <div class="o-autocomplete dropdown">
                                                                        <div class="source_select_hide">
                                                                            <select class="o-autocomplete--input o_input" id="source_id_0" style="width: 150px;">
                                                                                <option value="">Selecte Source</option>
                                                                                @foreach ($sources as $source)
                                                                                    <option value="{{ $source->id }}" @if (isset($data->source_id) && $source->id == $data->source_id) selected @endif>
                                                                                        {{ $source->name }}
                                                                                    </option>
                                                                                @endforeach
                                                                                <option value="add_source">Start typing...</option>
                                                                            </select>
                                                                        </div>
                                                                        <input type="text" id="new_source_input" class="o_input mt-2" style="display: none;">
                                                                    </div>
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
                                                            <div class="d-flex gap-2 align-items-center"><span class="text-truncate">
                                                            @if ($data && $data->assignment_date)
                                                                    {{ \Carbon\Carbon::parse($data->assignment_date)->format('d/m/Y H:i:s') }}
                                                            @else
                                                                    
                                                            @endif
                                                            </span>
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
                                    <button class="o-mail-Chatter-sendMessage btn text-nowrap me-1 btn-primary my-2 send_message_btn" data-hotkey="m"> Send message </button><button class="o-mail-Chatter-logNote btn text-nowrap me-1 btn-secondary my-2" data-hotkey="shift+m"> Log note </button>
                                    <div class="flex-grow-1 d-flex"><button class="o-mail-Chatter-activity btn btn-secondary text-nowrap my-2" data-hotkey="shift+a" data-bs-toggle="modal" data-bs-target="#activitiesAddModal"><span>Activities</span></button><span class="o-mail-Chatter-topbarGrow flex-grow-1 pe-2"></span><button class="btn btn-link text-action" aria-label="Search Messages" title="Search Messages"><i class="oi oi-search" role="img"></i></button><span style="display:contents"><button class="o-mail-Chatter-attachFiles btn btn-link text-action px-1 d-flex align-items-center my-2" aria-label="Attach files"><i class="fa fa-paperclip fa-lg me-1"></i></button></span><input type="file" class="o_input_file d-none o-mail-Chatter-fileUploader" multiple="multiple" accept="*">
                                        <div class="o-mail-Followers d-flex me-1">
                                            <button id="toggleFollowersDropdown" class="o-mail-Followers-button btn btn-link d-flex align-items-center text-action px-1 my-2 o-dropdown dropdown-toggle dropdown" title="Show Followers" aria-expanded="false">
                                                <i class="fa fa-user-o me-1" role="img"></i><sup class="o-mail-Followers-counter">{{$count}}</sup>
                                            </button>

                                            <!-- Dropdown Menu -->
                                            <div id="followersDropdown" class="o_popover popover mw-100 o-dropdown--menu dropdown-menu mx-0 o-mail-Followers-dropdown flex-column" role="menu" style=" display: none !important;; position: fixed; top: 137.75px; left: 1537.12px;width: 300px;">
                                                <a class="o-dropdown-item dropdown-item o-navigable focus add_followers" role="menuitem" tabindex="0" href="#">Add Followers</a>
                                                <div role="separator" class="dropdown-divider"></div>
                                                @foreach($authfollowers as $auth)
                                                <div class="dropdown-item o-mail-Follower d-flex justify-content-between p-0">
                                                    <a class="o-mail-Follower-details d-flex align-items-center flex-grow-1 px-3 o-min-width-0" href="#" role="menuitem">
                                                        <img class="o-mail-Follower-avatar me-2 rounded" alt="" src="https://yantra-design4.odoo.com/web/image/res.partner/3/avatar_128?unique=1726120529000">
                                                        <span class="flex-shrink text-truncate">{{$auth->customer->email}}</span>
                                                    </a>
                                                    <button class="o-mail-Follower-action btn btn-icon rounded-0" title="Edit subscription" aria-label="Edit subscription">
                                                        <i class="fa fa-pencil"></i>
                                                    </button>
                                                    <button class="o-mail-Follower-action btn btn-icon rounded-0" title="Remove this follower" aria-label="Remove this follower">
                                                        <i class="fa fa-remove"></i>
                                                    </button>
                                                </div>
                                                <div role="separator" class="dropdown-divider"></div>
                                                @endforeach
                                               @foreach($followers as $follower1)
                                                    <div class="dropdown-item o-mail-Follower d-flex justify-content-between p-0">
                                                        <a class="o-mail-Follower-details d-flex align-items-center flex-grow-1 px-3 o-min-width-0" href="#" role="menuitem">
                                                            <!-- Display the profile image if it exists -->
                                                            @if(isset($follower1->customer->profile_image))
                                                                <img class="o-mail-Follower-avatar me-2 rounded" alt="" 
                                                                    src="{{ asset('uploads/' . $follower1->customer->profile_image) }}">
                                                            @else
                                                                <!-- Default image if no profile image is available -->
                                                                <img class="o-mail-Follower-avatar me-2 rounded" alt="" 
                                                                    src="https://yantra-design4.odoo.com/web/image/res.partner/3/avatar_128?unique=1726120529000">
                                                            @endif

                                                            <!-- Display the name of the customer -->
                                                            <span class="flex-shrink text-truncate">
                                                                {{ $follower1->customer->email ?? $follower1->customer->work_email}}
                                                            </span>
                                                        </a>

                                                        <!-- Edit and Remove buttons -->
                                                        <button class="o-mail-Follower-action btn btn-icon rounded-0" title="Edit subscription" aria-label="Edit subscription">
                                                            <i class="fa fa-pencil"></i>
                                                        </button>
                                                        <button class="o-mail-Follower-action btn btn-icon rounded-0" title="Remove this follower" aria-label="Remove this follower">
                                                            <i class="fa fa-remove"></i>
                                                        </button>
                                                    </div>
                                                    <div role="separator" class="dropdown-divider"></div>
                                                @endforeach
                                            </div>
                                            {{-- -------- add followers modal ---------------- --}}
                                           <div class="modal fade" id="followersModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="activitiesAddModalLable" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="activitiesAddModalLable">Invite Follower</h5> 
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form id="inviteForm" action="{{route('lead.click_follow')}}" method="POST" enctype="application/x-www-form-urlencoded">
                                                        @csrf
                                                        <input type="hidden" value="{{$data->id ?? ''}}" name="id">
                                                        <div class="modal-body">
                                                         
                                                            <div class="d-flex">
                                                                <label for="recipient-name" class="col-form-label mx-3">Recipients: </label>
                                                                <select class="form-control" name="user_id">
                                                                    <option></option>
                                                                    @foreach($employees as  $employee)
                                                                         <option value="employee/{{$employee->id}}">  {{ $employee->name }} ({{ $employee->work_email }})</option>
                                                                    @endforeach
                                                                    @foreach($users as $user) 
                                                                    <option value="users/{{$user->id}}">{{$user->name}}({{$user->email}})</option>
                                                                    @endforeach
                                                                 <select> 
                                                            </div>
                                                            <div class="d-flex my-2">
                                                                <label for="recipient-name" class="col-form-label mx-3">  Send Notification: </label>
                                                                <input type="checkbox" id="send_notofiction_chekbox" style="width: 15px;" checked> 
                                                            </div>
                                                          
                                                            <div class="d-flex my-2 hiden_div">
                                                                <label for="recipient-name" class="col-form-label mx-3"> Message </label>
                                                                <textarea class="form-control" id="send_notification"  name="message" value="Hello , {{Auth::user()->email}}invited you to follow Lead/Opportunity document:{{isset($data) ? $data->product_name : ''}}">Hello , {{Auth::user()->email}}invited you to follow Lead/Opportunity document:{{isset($data) ? $data->product_name : ''}}</textarea>
                                                            </div>
                                                          
                                                            
                                                                                        
                                                          
                                                        </div>
                                                        <div class="modal-footer modal-footer-custom gap-1" style="justify-content: start;">
                                                            <button type="submit" class="btn btn-primary">Add Followers</button>
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="o-mail-Chatter-follow btn btn-link  px-0 text-600">
                                            <div class="position-relative followers"><span class="d-flex  text-nowrap">Follow</span></div>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="flex-shrink-0 pt-3 text-truncate small mb-2 ms-5 show1" style="display: none !important;">
                              <style>
                              .hidden-important {
                                                display: none !important;
                                            }
                              </style>
                                <span class="fw-bold">To:</span>
                                <span class="ps-1">
                                <span class="text-muted" id="to_mail">
                                    @if($data)
                                       @if($data->email)
                                        {{$data->email}}
                                        @else
                                         No recipient
                                        @endif
                                    @endif
                                </span>
                                </span>
                                <button class="o-mail-Chatter-recipientListButton btn btn-link badge rounded-pill border-0 p-1 ms-1" title="Show all recipients">
                                    <i class="fa fa-caret-down"></i>
                                </button>
                            </div>
                                                <div class="o-mail-Composer  pt-0 pb-2 o-extended show2" style="    display: none !important;"> 
                                                    {{-- <div class="o-mail-Composer-sidebarMain flex-shrink-0" >
                                                        <img class="o-mail-Composer-avatar o_avatar rounded" alt="Avatar of user" src="https://yantra-design4.odoo.com/web/image/res.partner/3/avatar_128?unique=1726120529000">
                                                    </div> --}}
                                                    <div class="o-mail-Composer-coreMain d-flex flex-nowrap align-items-start flex-grow-1 flex-column">
                                                        <div class="d-flex bg-view flex-grow-1 border rounded-3 align-self-stretch flex-column">
                                                            <div class="position-relative flex-grow-1">
                                                                <textarea class="o-mail-Composer-input o-mail-Composer-inputStyle form-control bg-view border-0 rounded-3 shadow-none overflow-auto" style="height:40px;" id="send_message" placeholder="Send a message to followers…"></textarea>
                                                                <textarea class="o-mail-Composer-fake o-mail-Composer-inputStyle position-absolute border-0" disabled="1"></textarea>
                                                            </div>
                                                            <div class="o-mail-Composer-actions d-flex bg-view mx-3 border-top p-1 rounded">
                                                                    <div class="d-flex flex-grow-1 align-items-baseline mt-1">
                                                                 
                                                                        <span style="display:contents">
                                                                            <button class="o-mail-Composer-attachFiles btn border-0 rounded-pill p-1" title="Attach files" aria-label="Attach files" type="button">
                                                                                    <i class="fa fa-fw fa-paperclip"></i>
                                                                            </button>
                                                                        </span>
                                                                        <input type="file" class="o_input_file d-none image_uplode" multiple="multiple" accept="*">
                                                                    </div>
                                                                    <button class="o-mail-Composer-fullComposer btn p-1 border-0 rounded-pill" title="Full composer" aria-label="Full composer" type="button" data-hotkey="shift+c" style="position: relative;">
                                                                        <i class="fa fa-fw fa-expand"></i>
                                                                    </button>
                                                            </div>
                                                        </div>
                                                            <div class="d-flex align-items-center mt-2 gap-2">
                                                                    <button class="o-mail-Composer-send btn btn-primary send_messag_by_email" aria-label="Send">Send</button>
                                                                        {{-- <span><samp>CTRL-Enter</samp><i> to send</i></span> --}}
                                                            </div>
                                                    </div>
                                                </div>
                                                <div class="image_show" style="display: flex;">
                                                </div>
                                            @if($send_message)
                                               @foreach($send_message as $value)
                                                    <div class="o-mail-Message position-relative pt-1 o-selfAuthored mt-1" role="group" aria-label="Message">
                                                        <div class="o-mail-Message-core position-relative d-flex flex-shrink-0">
                                                            <div class="o-mail-Message-sidebar d-flex flex-shrink-0 align-items-start justify-content-start">
                                                                <div class="o-mail-Message-avatarContainer position-relative bg-view cursor-pointer" aria-label="Open card">
                                                                    <img class="o-mail-Message-avatar w-100 h-100 rounded o_object_fit_cover o_redirect cursor-pointer" src="https://yantra-design4.odoo.com/web/image/res.partner/3/avatar_128?unique=1726120529000">
                                                                </div>
                                                            </div>
                                                            <div class="w-100 o-min-width-0">
                                                                <div class="o-mail-Message-header d-flex flex-wrap align-items-baseline lh-1 mb-1">
                                                                    <span class="o-mail-Message-author small cursor-pointer o-hover-text-underline" aria-label="Open card">
                                                                        <strong class="me-1">{{$value->from_mail}}</strong>
                                                                    </span>
                                                                    <div class="mx-1">
                                                                        <span class="o-mail-Message-notification cursor-pointer NaN" role="button" tabindex="0">
                                                                                <i role="img" aria-label="Delivery failure" class="fa fa-envelope-o"></i> 
                                                                        </span>
                                                                    </div>
                                                                        <small class="o-mail-Message-date text-muted smaller" title="{{$value->created_at}}">{{ $value->created_at->diffForHumans() }}</small>
                                                                        @if($value->is_star == 1)
                                                                          <a class="px-1 rounded-0 send_message_star" data-id="{{$value->id}}" title="Mark as Todo" name="toggle-star"><i class="fa fa-lg fa-star o-mail-Message-starred"></i></a>
                                                                        @else
                                                                          <a class="px-1 rounded-0 send_message_star" data-id="{{$value->id}}" title="Mark as Todo" name="toggle-star"><i class="fa fa-lg fa-star-o"></i></a>
                                                                        @endif
                                                                          <a class="px-1 rounded-0 send_message_delete" data-id="{{$value->id}}" title="Delete" name="toggle-star"><i class="fa fa-lg fa-fw pe-2 fa-trash"></i></a>
                                                                          <a class="px-1 rounded-0" title="Edit" name="toggle-star"><i class="fa fa-lg fa-fw pe-2 fa-pencil"></i></a>
                                                                      <a class="px-1 rounded-0" title="Download All Files" name="toggle-star" onclick="downloadAllImages({{ $value->id }})"><i class="fa fa-lg fa-fw pe-2 fa-download"></i></a>
                                                                </div>
                                                                <div class="position-relative d-flex">
                                                                    <div class="o-mail-Message-content o-min-width-0">
                                                                        <div class="o-mail-Message-textContent position-relative d-flex">
                                                                            <div class="position-relative overflow-x-auto d-inline-block">
                                                                                <div class="o-mail-Message-bubble rounded-bottom-3 position-absolute top-0 start-0 w-100 h-100 o-green border border-success rounded-end-3">
                                                                                </div>
                                                                                <div class="position-relative text-break o-mail-Message-body mb-0 py-2 align-self-start rounded-end-3 rounded-bottom-3"><p>{{$value->message}}</p>
                                                                                </div>
                                                                                <div class="o-mail-Message-seenContainer position-absolute bottom-0">
                                                                                </div>
                                                                            </div>
                                                                            <div class="o-mail-Message-actions d-print-none ms-2 mt-1 invisible">
                                                                                <div class="d-flex rounded-1 overflow-hidden">
                                                                                    <button class="btn px-1 py-0 lh-1 rounded-0 rounded-start-1" tabindex="1" title="Add a Reaction" aria-label="Add a Reaction"><i class="oi fa-lg oi-smile-add"></i></button>
                                                                                    <button class="btn px-1 py-0 rounded-0" title="Mark as Todo" name="toggle-star"><i class="fa fa-lg fa-star-o"></i></button>
                                                                                        <div class="d-flex rounded-0">
                                                                                            <button class="btn px-1 py-0 rounded-0 rounded-end-1 o-dropdown dropdown-toggle dropup" title="Expand" aria-expanded="false"><i class="fa fa-lg fa-ellipsis-h" tabindex="1"></i></button>
                                                                                        </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                      

                                                                        <div class="o-mail-AttachmentList">
                                                                            <div class="o-mail-AttachmentList-mas" role="menu">
                                                                              @if (!is_null($value->image) && !empty(json_decode($value->image)))
                                                                                @foreach (json_decode($value->image) as $image)
                                                                                    <div class="o-mail-AttachmentImage d-flex position-relative flex-shrink-0 mw-100 mb-1 me-1" tabindex="0" role="menuitem" aria-label="{{ basename($image) }}" title="{{ basename($image) }}" data-mimetype="image/jpeg">
                                                                                        <img class="img img-fluid my-0 mx-auto o-viewable rounded" src="{{ asset('storage/' . $image) }}" alt="{{ basename($image) }}" style="max-width: min(100%, 1920px); max-height: 300px;">
                                                                                        <div class="position-absolute top-0 bottom-0 start-0 end-0 p-2 text-white o-opacity-hoverable opacity-0 opacity-100-hover d-flex align-items-end flax-wrap flex-column">
                                                                                            <button class="btn btn-sm btn-dark rounded opacity-75 opacity-100-hover" tabindex="0" aria-label="Remove" role="menuitem" title="Remove" onclick="deleteImage('{{ $image }}', {{ $value->id }})"><i class="fa fa-trash"></i></button>
                                                                                            <button class="btn btn-sm btn-dark rounded opacity-75 opacity-100-hover mt-auto" title="Download" onclick="downloadImage('{{ asset('storage/' . $image) }}')"><i class="fa fa-download"></i></button>
                                                                                        </div>
                                                                                    </div>
                                                                                @endforeach
                                                                            @endif
                                                                            </div>
                                                                            <div class="grid row-gap-0 column-gap-0"></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                            @if($activitiesCount > 0)
                                <div class="d-flex pt-2 cursor-pointer fw-bolder" id="toggleHeader">
                                    <hr class="flex-grow-1 fs-3">
                                    <div class="d-flex align-items-center px-3">
                                        <i class="fa fa-fw fa-caret-down" id="toggleIcon"></i> Planned Activities 
                                        <span class="badge rounded-pill ms-2 text-bg-success" id="badgeCount" style="display: none;">{{$activitiesCount ?? ''}}</span>
                                    </div>
                                    <hr class="flex-grow-1 fs-3">
                                </div>
                            @endif
                            @php
                                use Carbon\Carbon;
                            @endphp
                            @if($activities)
                            <div id="activitiesContainer">
                                @foreach ($activities as $activity) 
                                    @php
                                        $dueDate = Carbon::parse($activity->due_date);
                                        $now = Carbon::now()->startOfDay(); // Ensure comparison is only on date, not time
                                        $tomorrow = $now->copy()->addDay();

                                        // Calculate the difference in days
                                        $daysRemaining = $now->diffInDays($dueDate);
                                        $isTomorrow = $dueDate->isSameDay($tomorrow);
                                        $isToday = $dueDate->isSameDay($now);

                                        // Determine the label and styling based on due date
                                        if ($isToday) {
                                            $label = 'Today:';
                                            $labelClass = 'today-label'; // Customize this class as needed
                                            $iconClass = 'text-bg-warning';
                                            $checkClass = 'text-black';
                                        } elseif ($isTomorrow) {
                                            $label = 'Tomorrow:';
                                            $labelClass = 'text-success';
                                            $iconClass = 'text-success';
                                            $checkClass = 'text-white';
                                        } elseif ($dueDate->isFuture()) {
                                            $label = 'Due in ' . $daysRemaining . ' days:';
                                            $labelClass = 'text-success';
                                            $iconClass = 'text-success';
                                            $checkClass = 'text-white';
                                        } else {
                                            // If the due date is in the past
                                            $daysOverdue = abs($daysRemaining);
                                            $label = 'Overdue by ' . $daysOverdue . ' days:';
                                            $labelClass = 'text-danger'; // Class for overdue, usually red
                                            $iconClass = 'text-danger'; // Red icon
                                            $checkClass = 'text-danger'; // Red text
                                        }
                                    @endphp                                                     
                                    <div class="o-mail-Activity-container">
                                        <div class="o-mail-Activity d-flex py-1 mb-2" data-activity-id="{{ $activity->id }}">
                                            <div class="o-mail-Activity-sidebar flex-shrink-0 position-relative">
                                                <a role="button">
                                                <span
                                                    class="activity-avatar-initials rounded d-flex align-items-center justify-content-center">
                                                    {{ strtoupper($activity->getUser->name[0] ?? strtoupper($currentUser->name[0] ?? '')) }}
                                                </span>
                                                </a>
                                                <div class="o-mail-Activity-iconContainer position-absolute top-100 start-100 translate-middle d-flex align-items-center justify-content-center mt-n1 ms-n1 rounded-circle w-50 h-50 {{$iconClass}}">
                                                    <b><i class="fa small fa-check {{$checkClass}}"></i></b>
                                                </div>
                                            </div>
                                            <div class="flex-grow px-3">
                                                <div class="o-mail-Activity-info lh-1">
                                                    <span class="fw-bolder {{ $labelClass }}">
                                                        {{ $label }}
                                                    </span>
                                                    @if(!empty($activity->summary))
                                                        <!-- Show summary if it exists -->
                                                        <span class="fw-bolder px-2 text-break">{{ $activity->summary ?? ''}}</span>
                                                    @else
                                                        <!-- Show activity type if summary does not exist -->
                                                        <span class="fw-bolder px-2 text-break">{{ ucwords(str_replace('-', ' ', strtolower($activity->activity_type ?? ''))) }}</span>
                                                    @endif
                                                    <span class="o-mail-Activity-user px-1">for {{$activity->getUser->email ?? ''}}</span>
                                                    <button class="btn btn-link btn-primary p-0 lh-1 border-0" onclick="toggleDetails({{ $activity->id }})">
                                                        <i class="fa fa-info-circle" role="img" title="Info" aria-label="Info"></i>
                                                    </button>
                                                </div>
                                                <div id="activity-details-{{ $activity->id }}" class="d-none">
                                                    <!-- Details will be populated here -->
                                                </div>
                                                <div class="lh-lg">
                                                    <button class="o-mail-Activity-markDone btn btn-link btn-success p-0 me-3" data-bs-toggle="modal" data-bs-target="#markDoneModal">
                                                        <i class="fa fa-check"></i> Mark Done
                                                    </button>
                                                    <button type="button" class="o-mail-Activity-edit btn btn-link text-action p-0 me-3">
                                                        <i class="fa fa-pencil"></i> Edit
                                                    </button>
                                                    <button type="button" class="btn btn-link btn-danger p-0 o-mail-Activity-delete" data-activity-id="{{ $activity->id }}">
                                                        <i class="fa fa-times"></i> Cancel
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal -->
                                    <div class="modal fade" id="markDoneModal" tabindex="-1" aria-labelledby="markDoneModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="markDoneModalLabel">Mark Done</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <textarea class="form-control" rows="4" placeholder="Write Feedback"></textarea>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" id="saveChangesButton" class="btn btn-primary">Done</button>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">discard</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Edit Modal -->
                                    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editModalLabel">Edit Activity</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form id="editForm" action="" method="POST">
                                                <input type="hidden" id="edit_activity_id" name="id">
                                                <div class="modal-body">
                                                    <div class="row col-md-12">
                                                        <div class="col-md-6">
                                                            <div class="d-flex align-items-center">
                                                                <div class="col-md-4">
                                                                    <label for="activity_type" class="mr-2">Activity Type</label>
                                                                </div>
                                                                <div class="col-md-8 activityTypeField">
                                                                    <select class="form-control activity_type" id="edit_activity_type" name="activity_type" style="width: 100%;">
                                                                        <option value="email">Email</option>
                                                                        <option value="call">Call</option>
                                                                        <option value="meeting">Meeting</option>
                                                                        <option value="to-do" selected>To-Do</option>
                                                                        <option value="upload_document">Upload Document</option>
                                                                        <option value="request_signature">Request Signature</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 dueDateField">
                                                            <!-- Due Date field -->
                                                            <div class="d-flex align-items-center">
                                                                <div class="col-md-4">
                                                                    <label for="" class="mr-2">Due Date</label>    
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="o_cell flex-grow-1 flex-sm-grow-0" style="width: 100%;">
                                                                        <div class="o_row o_row_readonly">
                                                                            <div name="edit_due_date" class="o_field_widget">
                                                                                <div class="d-inline-flex w-100"><input class="o_input datepicker" name="due_date" placeholder="Select Due Date" style="width: 300px;" type="text" id="edit_due_date"></div>
                                                                            </div>                                                
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mt-3 summaryField">
                                                            <div class="d-flex align-items-center">
                                                                <div class="col-md-4">
                                                                    <label for="edit_summary" class="mr-2">Summary</label>  
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input class="form-control" placeholder="e.g. Discuss proposal" style="width: 300px;" type="text" id="edit_summary" name="summary">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mt-3 assignedToField">
                                                            <div class="d-flex align-items-center">
                                                                <div class="col-md-4">
                                                                    <label for="edit_assigned_to" class="mr-2">Assigned to</label>  
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <select class="form-control" id="edit_assigned_to" name="assigned_to" style="width: 100%;">
                                                                        @foreach ($users as $user)
                                                                            <option value="{{ $user->id }}">{{ $user->email }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 mt-3 logNoteField">
                                                            <textarea class="form-control edit_log_note" id="edit_log_note" name="log_note" rows="4" placeholder="Log Note"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            @endif
                            <!-- <div class="o-mail-DateSection d-flex align-items-center w-100 fw-bold z-1 pt-2">
                                <hr class="o-discuss-separator flex-grow-1"><span class="px-2 smaller text-muted">Today</span>
                                <hr class="o-discuss-separator flex-grow-1">
                            </div> -->
                            <div class="o-mail-Chatter-content">
                                @if(isset($data) && $data->lead_type == 1)
                                    @php
                                    $logs = isset($data) ? $data->logs : collect(); // Ensure $logs is always a collection
                                    @endphp

                                    <x-log-display :logs="$logs" />
                                    @if($activitiesDone->count() > 0)
                                        <div class="o-mail-DateSection d-flex align-items-center w-100 fw-bold z-1 pt-2">
                                            <hr class="o-discuss-separator flex-grow-1"><span class="px-2 smaller text-muted">Activities Done</span>
                                            <hr class="o-discuss-separator flex-grow-1">
                                            <br>                                    
                                        </div>
                                        @foreach ($activitiesDone as $activityDone)                                                            
                                            <div class="o-mail-Activity-container">
                                                <div class="o-mail-Activity d-flex py-1 mb-2">
                                                    <div class="o-mail-Activity-sidebar flex-shrink-0 position-relative">
                                                        <a role="button">
                                                        <span
                                                            class="activity-avatar-initials rounded d-flex align-items-center justify-content-center">
                                                            {{ strtoupper($activityDone->getUser->name[0] ?? strtoupper($activityDone->name[0] ?? '')) }}                                                        
                                                        </span>
                                                        </a>
                                                    </div>
                                                    <div class="flex-grow px-3">
                                                        <div class="o-mail-Activity-info lh-1">
                                                            <b><span class="o-mail-Activity-user px-1">{{$activityDone->getUser->email ?? ''}}</span></b>
                                                            @php
                                                                $activityTime = Carbon::parse($activityDone->updated_at);
                                                                $currentTime = Carbon::now();

                                                                // Calculate time differences
                                                                $diffInSeconds = $activityTime->diffInSeconds($currentTime);
                                                                $diffInMinutes = $activityTime->diffInMinutes($currentTime);
                                                                $diffInHours = $activityTime->diffInHours($currentTime);
                                                                $diffInDays = $activityTime->diffInDays($currentTime);
                                                            @endphp

                                                            <small class="o-mail-Message-date text-muted smaller" title="{{ $activityTime->format('n/j/Y, g:i:s a') }}">
                                                                @if ($diffInSeconds < 60)
                                                                    now
                                                                @elseif ($diffInMinutes < 60)
                                                                    {{ intval($diffInMinutes) }} minute{{ $diffInMinutes > 1 ? 's' : '' }} ago
                                                                @elseif ($diffInHours < 24)
                                                                    {{ intval($diffInHours) }} hour{{ $diffInHours > 1 ? 's' : '' }} ago
                                                                @else
                                                                    {{ intval($diffInDays) }} day{{ $diffInDays > 1 ? 's' : '' }} ago
                                                                @endif
                                                            </small>
                                                        </div>
                                                        <div class="lh-lg">
                                                            <div class="o-mail-Message-body text-break mb-0 w-100">
                                                                <p>
                                                                    <span class="fa fa-check fa-fw"></span><span>{{ ucwords(str_replace('-', ' ', strtolower($activityDone->activity_type ?? ''))) }}</span> done
                                                                </p>     
                                                                @if(!empty($activityDone->feedback))                                                       
                                                                    <div>
                                                                        <div class="fw-bold">Feedback:</div>
                                                                            {{$activityDone->feedback ?? ''}}
                                                                    </div>
                                                                @endif
                                                            </div>                                                                
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                @endif
                                @if(isset($data->lead_type) && $data->lead_type == 2)
                                
                              
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

<!-- Modal -->
<div class="modal fade" id="activitiesAddModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="activitiesAddModalLable" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="activitiesAddModalLable">Schedule Activity</h5> 
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
    <form id="scheduleForm" action="{{ route('lead.scheduleActivityStore') }}" method="POST" enctype="application/x-www-form-urlencoded">
        @csrf
        <input type="hidden" value="{{$data->id ?? ''}}" name="lead_id">
        <div class="modal-body">
            <div class="row col-md-12">
                <div class="col-md-6">
                    <div class="d-flex align-items-center">
                        <div class="col-md-4">
                            <label for="activity_type" class="mr-2">Activity Type</label>
                        </div>
                        <div class="col-md-8 activityTypeField">
                            <select class="form-control activity_type" id="activity_type" name="activity_type" style="width: 100%;">
                                <option value="email">Email</option>
                                <option value="call">Call</option>
                                <option value="meeting">Meeting</option>
                                <option value="to-do" selected>To-Do</option>
                                <option value="upload_document">Upload Document</option>
                                <option value="request_signature">Request Signature</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 dueDateField">
                    <!-- Due Date field -->
                    <div class="d-flex align-items-center">
                        <div class="col-md-4">
                            <label for="" class="mr-2">Due Date</label>    
                        </div>
                        <div class="col-md-8">
                            <div class="o_cell flex-grow-1 flex-sm-grow-0" style="width: 100%;">
                                <div class="o_row o_row_readonly">
                                    <div name="due_date" class="o_field_widget">
                                        <div class="d-inline-flex w-100"><input class="o_input datepicker" name="due_date" placeholder="Select Due Date" style="width: 300px;" type="text" id="due_date"></div>
                                    </div>                                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mt-3 summaryField">
                    <div class="d-flex align-items-center">
                        <div class="col-md-4">
                            <label for="summary" class="mr-2">Summary</label>  
                        </div>
                        <div class="col-md-8">
                            <input class="form-control" placeholder="e.g. Discuss proposal" style="width: 300px;" type="text" id="summary" name="summary">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mt-3 assignedToField">
                    <div class="d-flex align-items-center">
                        <div class="col-md-4">
                            <label for="assigned_to" class="mr-2">Assigned to</label>  
                        </div>
                        <div class="col-md-8">
                            <select class="form-control" id="assigned_to" name="assigned_to" style="width: 100%;">
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->email }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mt-3 logNoteField">
                    <textarea name="log_note" id="log_note" cols="30" rows="10"></textarea>
                </div>
            </div>
        </div>
        <div class="modal-footer modal-footer-custom gap-1" style="justify-content: start;">
            <button type="submit" class="btn btn-primary">Schedule</button>
            <!-- <button type="submit" class="btn btn-secondary">Schedule & Mark as Done</button>
            <button type="submit" class="btn btn-secondary">Done & Schedule Next</button> -->
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        </div>
    </form>
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
    $(document).ready(function(){
       $(document).ready(function(){
        $("#toggleFollowersDropdown").click(function(){
            // Toggle the visibility of the dropdown
            $("#followersDropdown").toggle();
        });

        // Optionally, close the dropdown when clicking outside of it
        $(document).click(function(event) { 
            if (!$(event.target).closest("#toggleFollowersDropdown, #followersDropdown").length) {
                $("#followersDropdown").hide();
            }
        });
    });
    });
</script>
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
    $("#sales_person").select2({
        placeholder: "Salesperson"
        , allowClear: true
    });

    $("#campaign_id_0").select2({
        allowClear: true
    });

    $("#medium_id_0").select2({
        allowClear: true
    });

    $("#source_id_0").select2({
        allowClear: true
    });

    $(function() {
        var currentDate = new Date();

        $(".datepicker").datepicker({
            dateFormat: "yy-mm-dd",
            duration: "fast",
            onSelect: function(dateText, inst) {
                // Optional: Do something when a date is selected
                console.log("Selected date: " + dateText);
            }
        }).datepicker("setDate", currentDate);
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

    function updateFields() {
        var activityType = $('.activity_type').val();

        // Default visibility
        $('.dueDateField').show();
        $('.assignedToField').show();
        $('.logNoteField').show();
        
        // Hide fields based on activity type
        if (activityType === 'meeting') {
            $('.dueDateField').hide();
            $('.assignedToField').hide();
            $('.logNoteField').hide();
        } else {
            $('.dueDateField').show();
            $('.assignedToField').show();
            $('.logNoteField').show();
        }
        }

        // Initial field update
        updateFields();

        // Update fields on activity type change
        $('.activity_type').change(function() {
        updateFields();
    });

</script>

<script>
    $(document).ready(function() {
        function loadStates(countryId, selectedStateId = null) {
            $("#state_id_0").html('');
            $.ajax({
                url: "{{ route('fetch-states') }}",
                type: "POST",
                data: {
                    country_id: countryId,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(result) {
                    $('#state_id_0').html('<option value="">-- Select State --</option>');
                    $.each(result.states, function(key, value) {
                        $("#state_id_0").append('<option value="' + value.id + '"' +
                            (selectedStateId == value.id ? ' selected' : '') + '>' +
                            value.name + '</option>');
                    });
                }
            });
        }

        // On country change, load states and reset state selection
        $('#country_id_0').on('change', function() {
            var idCountry = this.value;
            loadStates(idCountry);
        });

        // On page load, check if country is selected and load states
        var initialCountryId = $('#country_id_0').val();
        var initialStateId = '{{ isset($data) ? $data->state : '' }}'; // Assuming $data->state contains the selected state ID

        if (initialCountryId) {
            loadStates(initialCountryId, initialStateId);
        }

        $('.lead_lost_btn').on('click', function() {
            console.log('clicked');
            var id = $(this).data('id');
            $('#staticBackdrop').show();

             $.ajax({
                url: "{{ route('fetch-states') }}"
                , type: "POST"
                , data: {
                    id: id
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
        const startTitleTypingOptionValue = 'add_new'; // Value for "Add New" option
        const titleSelectHide = $('.title_select_hide');

        // Function to add "Add New" option to the dropdown
        function addStartTypingOption() {
            if (!select.find(`option[value="${startTitleTypingOptionValue}"]`).length) {
                const startTypingOption = new Option('Add New', startTitleTypingOptionValue, false, false);
                select.append(startTypingOption);
            }
        }

        // Function to remove "Add New" option from the dropdown
        function removeStartTypingOption() {
            select.find(`option[value="${startTitleTypingOptionValue}"]`).remove();
        }

        select.on('focus', function() {
            addStartTypingOption();
        });

        // Handle dropdown blur to hide "Add New" if not focused
        select.on('blur', function() {
            setTimeout(() => {
                if (!select.is(':focus') && !newTitleInput.is(':focus')) {
                    removeStartTypingOption();
                }
            }, 100);
        });

        // Handle selection change
        select.on('change', function() {
            if ($(this).val() === startTitleTypingOptionValue) {
                titleSelectHide.hide();
                newTitleInput.show().focus();
            } else {
                newTitleInput.hide();
                titleSelectHide.show();
            }
        });

        // Handle new title input
        newTitleInput.on('keypress', function(e) {
            if (e.which === 13) {
                const newTitle = $(this).val();
                if (newTitle) {
                    $.ajax({
                        url: '{{ route('add-title') }}',
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            title: newTitle
                        },
                        success: function(response) {
                            // Add the new title to the dropdown
                            const newOption = new Option(response.title, response.id, false, false);
                            select.append(newOption);
                            select.val(response.id);
                            newTitleInput.hide().val('');
                            titleSelectHide.show();
                            addStartTypingOption();
                        },
                        error: function() {
                            alert('Error adding title.');
                        }
                    });
                }
            }
        });

        // Ensure "Add New" is hidden when typing in new title input
        newTitleInput.on('focus', function() {
            removeStartTypingOption();
        });


        // Campaign dropdown elements
        const selectCampaign = $('#campaign_id_0');
        const newCampaignInput = $('#new_campaign_input');
        const startCampaignTypingOptionValue = 'add_campaign'; // Value for "Add New" option
        const campaignSelectHide = $('.campaign_select_hide');

        // Function to add "Add New" option to the dropdown
        function addStartTypingOptionCampaign() {
            if (!selectCampaign.find(`option[value="${startCampaignTypingOptionValue}"]`).length) {
                const startTypingOption = new Option('Start typing..', startCampaignTypingOptionValue, false, false);
                selectCampaign.append(startTypingOption);
                console.log('Added "Add New" option to campaign dropdown.');
            }
        }

        // Function to remove "Add New" option from the dropdown
        function removeStartTypingOptionCampaign() {
            selectCampaign.find(`option[value="${startCampaignTypingOptionValue}"]`).remove();
            console.log('Removed "Add New" option from campaign dropdown.');
        }

        // Add "Add New" option on focus
        selectCampaign.on('focus', function() {
            console.log('Campaign dropdown focused.');
            addStartTypingOptionCampaign();
        });

        // Remove "Add New" option if dropdown and input are not focused
        selectCampaign.on('blur', function() {
            console.log('Campaign dropdown blurred.');
            setTimeout(() => {
                if (!selectCampaign.is(':focus') && !newCampaignInput.is(':focus')) {
                    removeStartTypingOptionCampaign();
                }
            }, 100);
        });

        // Handle dropdown change event
        selectCampaign.on('change', function() {
            console.log('Campaign dropdown changed. Selected value:', $(this).val());
            if ($(this).val() === startCampaignTypingOptionValue) {
                campaignSelectHide.hide();
                newCampaignInput.show().focus();
            } else {
                newCampaignInput.hide();
                campaignSelectHide.show();
            }
        });

        // Handle new campaign input on Enter key press
        newCampaignInput.on('keypress', function(e) {
            if (e.which === 13) {
                const newCampaign = $(this).val();
                if (newCampaign) {
                    $.ajax({
                        url: '{{ route('add-campaign') }}',
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            name: newCampaign
                        },
                        success: function(response) {
                            console.log('Campaign added successfully:', response);
                            // Add the new name to the dropdown
                            const newOption = new Option(response.name, response.id, false, false);
                            selectCampaign.append(newOption);
                            selectCampaign.val(response.id);
                            newCampaignInput.hide().val('');
                            campaignSelectHide.show();
                            addStartTypingOptionCampaign();
                        },
                        error: function() {
                            alert('Error adding campaign.');
                        }
                    });
                }
            }
        });

        // Ensure "Add New" is hidden when typing in new campaign input
        newCampaignInput.on('focus', function() {
            removeStartTypingOptionCampaign();
        });

        // Medium dropdown elements
        const selectMedium = $('#medium_id_0');
        const newMediumInput = $('#new_medium_input');
        const startMediumTypingOptionValue = 'add_medium'; // Value for "Add New" option
        const mediumSelectHide = $('.medium_select_hide');

        // Function to add "Add New" option to the dropdown
        function addStartTypingOptionMedium() {
            if (!selectMedium.find(`option[value="${startMediumTypingOptionValue}"]`).length) {
                const startTypingOption = new Option('Start typing..', startMediumTypingOptionValue, false, false);
                selectMedium.append(startTypingOption);
            }
        }

        // Function to remove "Add New" option from the dropdown
        function removeStartTypingOptionMedium() {
            selectMedium.find(`option[value="${startMediumTypingOptionValue}"]`).remove();
            console.log('Removed "Add New" option from campaign dropdown.');
        }

        // Add "Add New" option on focus
        selectMedium.on('focus', function() {
            console.log('Campaign dropdown focused.');
            addStartTypingOptionMedium();
        });

        // Remove "Add New" option if dropdown and input are not focused
        selectMedium.on('blur', function() {
            console.log('Campaign dropdown blurred.');
            setTimeout(() => {
                if (!selectMedium.is(':focus') && !newMediumInput.is(':focus')) {
                    removeStartTypingOptionMedium();
                }
            }, 100);
        });

        // Handle dropdown change event
        selectMedium.on('change', function() {
            console.log('Campaign dropdown changed. Selected value:', $(this).val());
            if ($(this).val() === startMediumTypingOptionValue) {
                mediumSelectHide.hide();
                newMediumInput.show().focus();
            } else {
                newMediumInput.hide();
                mediumSelectHide.show();
            }
        });

        // Handle new campaign input on Enter key press
        newMediumInput.on('keypress', function(e) {
            if (e.which === 13) {
                const newMedium = $(this).val();
                if (newMedium) {
                    $.ajax({
                        url: '{{ route('add-medium') }}',
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            name: newMedium
                        },
                        success: function(response) {
                            console.log('Campaign added successfully:', response);
                            // Add the new name to the dropdown
                            const newOption = new Option(response.name, response.id, false, false);
                            selectMedium.append(newOption);
                            selectMedium.val(response.id);
                            newMediumInput.hide().val('');
                            mediumSelectHide.show();
                            addStartTypingOptionMedium();
                        },
                        error: function() {
                            alert('Error adding campaign.');
                        }
                    });
                }
            }
        });

        // Ensure "Add New" is hidden when typing in new campaign input
        newMediumInput.on('focus', function() {
            removeStartTypingOptionMedium();
        });

         // Source dropdown elements
        const selectSource = $('#source_id_0');
        const newSourceInput = $('#new_source_input');
        const startSourceTypingOptionValue = 'add_source'; // Value for "Add New" option
        const sourceSelectHide = $('.source_select_hide');

        // Function to add "Add New" option to the dropdown
        function addStartTypingOptionMedium() {
            if (!selectSource.find(`option[value="${startSourceTypingOptionValue}"]`).length) {
                const startTypingOption = new Option('Start typing..', startSourceTypingOptionValue, false, false);
                selectSource.append(startTypingOption);
            }
        }

        // Function to remove "Add New" option from the dropdown
        function removeStartTypingOptionMedium() {
            selectSource.find(`option[value="${startSourceTypingOptionValue}"]`).remove();
            console.log('Removed "Add New" option from campaign dropdown.');
        }

        // Add "Add New" option on focus
        selectSource.on('focus', function() {
            console.log('Campaign dropdown focused.');
            addStartTypingOptionMedium();
        });

        // Remove "Add New" option if dropdown and input are not focused
        selectSource.on('blur', function() {
            console.log('Campaign dropdown blurred.');
            setTimeout(() => {
                if (!selectSource.is(':focus') && !newSourceInput.is(':focus')) {
                    removeStartTypingOptionMedium();
                }
            }, 100);
        });

        // Handle dropdown change event
        selectSource.on('change', function() {
            console.log('Campaign dropdown changed. Selected value:', $(this).val());
            if ($(this).val() === startSourceTypingOptionValue) {
                sourceSelectHide.hide();
                newSourceInput.show().focus();
            } else {
                newSourceInput.hide();
                sourceSelectHide.show();
            }
        });

        // Handle new campaign input on Enter key press
        newSourceInput.on('keypress', function(e) {
            if (e.which === 13) {
                const newMedium = $(this).val();
                if (newMedium) {
                    $.ajax({
                        url: '{{ route('add-source') }}',
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            name: newMedium
                        },
                        success: function(response) {
                            console.log('Campaign added successfully:', response);
                            // Add the new name to the dropdown
                            const newOption = new Option(response.name, response.id, false, false);
                            selectSource.append(newOption);
                            selectSource.val(response.id);
                            newSourceInput.hide().val('');
                            sourceSelectHide.show();
                            addStartTypingOptionMedium();
                        },
                        error: function() {
                            alert('Error adding campaign.');
                        }
                    });
                }
            }
        });

        // Ensure "Add New" is hidden when typing in new campaign input
        newSourceInput.on('focus', function() {
            removeStartTypingOptionMedium();
        });

        $('#contact_name_0').on('input', function() {
            const query = $(this).val().toLowerCase();
            select.find('option').each(function() {
                const text = $(this).text().toLowerCase();
                $(this).toggle(text.includes(query));
            });
        });

        const selectTag = $('#tag_ids_1');
        const newTagInput = $('#new_tag_input');
        const startTypingOptionValue = 'add_new_tag';
        const tagInputHide = $('.tag_input_hide');

        // Hide new tag input initially
        newTagInput.hide();

        let previousValues = selectTag.val() || [];

        // Function to add "Start typing" option to the dropdown
        function addStartTypingOption() {
            if (!selectTag.find(`option[value="${startTypingOptionValue}"]`).length) {
                const startTypingOption = new Option('Start typing', startTypingOptionValue, false, false);
                selectTag.append(startTypingOption);
            }
        }

        function removeStartTypingOption() {
            selectTag.find(`option[value="${startTypingOptionValue}"]`).remove();
        }
        selectTag.on('focus', function() {
            addStartTypingOption();
        });

        selectTag.on('blur', function() {
            setTimeout(() => {
                if (!selectTag.is(':focus') && !newTagInput.is(':focus')) {
                    removeStartTypingOption();
                }
            }, 100);
        });

        // Handle selection change
        selectTag.on('change', function() {
            const selectedValues = $(this).val();
            if (selectedValues && selectedValues.includes(startTypingOptionValue)) {
                tagInputHide.hide();
                newTagInput.show().focus();
                previousValues = selectTag.val() || [];
            } else {
                newTagInput.hide();
                tagInputHide.show();
            }
        });

        // Handle new tag input
        newTagInput.on('keypress', function(e) {
            if (e.which === 13) {
                const newTag = $(this).val();
                if (newTag) {
                    $.ajax({
                        url: '{{ route('add-tag') }}',
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            tag: newTag
                        },
                        success: function(response) {
                            // Add the new tag with color to the dropdown
                            const newOption = new Option(response.tag, response.id, false, false);
                            selectTag.append(newOption);
                            selectTag.find(`option[value="${response.id}"]`).attr('data-color', response.color);
                            const updatedValues = [...new Set([...previousValues, response.id.toString()])];
                            selectTag.val(updatedValues).trigger('change');
                            newTagInput.hide().val('');
                            tagInputHide.show();
                            addStartTypingOption();
                        },
                        error: function() {
                            alert('Error adding title.');
                        }
                    });
                }
            }
        });

        // Ensure "Start typing" is hidden when typing in new tag input
        newTagInput.on('focus', function() {
            removeStartTypingOption();
        });

        $('#contact_name_0').on('input', function() {
            const query = $(this).val().toLowerCase();
            select.find('option').each(function() {
                const text = $(this).text().toLowerCase();
                $(this).toggle(text.includes(query));
            });
        });


        const emailInput = $('#email_from_1');
        const phoneInput = $('#phone_1');
        const errorMessage = $('#email_error_message');
        const phoneErrorMessage = $('#phone_error_message'); // Assuming you have an element to show phone errors
        const currentEmail = '{{ isset($data) ? $data->email : '' }}'; // Current email from the server
        const currentPhone = '{{ isset($data) ? $data->phone : '' }}'; // Current phone from the server

        // Function to check if the email exists
        function checkEmailExists(email) {
            return $.ajax({
                url: '{{ route('checkEmail') }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    email: email
                }
            });
        }

        // Function to check if the phone number exists
        function checkPhoneExists(phone) {
            return $.ajax({
                url: '{{ route('checkPhone') }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    phone: phone
                }
            });
        }

        // Event handler for email input change
        emailInput.on('change', function() {
            const email = $(this).val();

            if (email !== currentEmail) {
                // Check if the new email exists
                checkEmailExists(email).done(function(response) {
                    console.log('Email check response:', response); // Debugging
                    if (response && response.exists) {
                        errorMessage.show();
                    } else {
                        errorMessage.hide();
                    }
                }).fail(function() {
                    console.error('An error occurred while checking the email.');
                });
            } else {
                // Email is unchanged, hide error message
                errorMessage.hide();
            }
        });

        // Event handler for phone input change
        phoneInput.on('change', function() {
            const phone = $(this).val();

            if (phone !== currentPhone) {
                // Check if the new phone number exists
                checkPhoneExists(phone).done(function(response) {
                    console.log('Phone check response:', response); // Debugging
                    if (response && response.exists) {
                        phoneErrorMessage.show(); // Show phone error message
                    } else {
                        phoneErrorMessage.hide();
                    }
                }).fail(function() {
                    console.error('An error occurred while checking the phone number.');
                });
            } else {
                // Phone number is unchanged, hide error message
                phoneErrorMessage.hide();
            }
        });

        // Event handler for save button click
        $('#main_save_btn').click(function(event) {
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
            var phone_1 = $('#phone_1').val();
            var function_0 = $('#function_0').val();
            var mobile_0 = $('#mobile_0').val();
            var tag_ids_1 = $('#tag_ids_1').val();                
            var priority = $('.o_priority .o_priority_star.fa-star').last().data('value');
            var sales_person = $('#sales_person').val();
            var campaign_id_0 = $('#campaign_id_0').val();
            var medium_id_0 = $('#medium_id_0').val();
            var source_id_0 = $('#source_id_0').val();
            var referred_0 = $('#referred_0').val();
            var internal_notes = $('#description').val();
           

            // Validate fields
            if (!name_0) {
                toastr.error('fields is required');
                $('#name_0').css({
                    'border-color': 'red',
                    'background-color': '#ff99993d'
                });
                return; // Stop form submission
            }

            // Validate email and phone number before submitting
            const emailCheck = email_from_1 !== currentEmail ? checkEmailExists(email_from_1) : $.Deferred().resolve({ exists: false });
            const phoneCheck = phone_1 !== currentPhone ? checkPhoneExists(phone_1) : $.Deferred().resolve({ exists: false });

            $.when(emailCheck, phoneCheck).done(function(emailResponse, phoneResponse) {
                // Ensure that responses are properly accessed
                const emailData = emailResponse[0];
                const phoneData = phoneResponse[0];

                if (emailData && emailData.exists) {
                    errorMessage.show(); // Show email error message
                    return; // Stop form submission
                }
                
                if (phoneData && phoneData.exists) {
                    phoneErrorMessage.show(); // Show phone error message
                    return; // Stop form submission
                }
                
                // If both email and phone are valid, submit the form
                submitForm();
            }).fail(function() {
                console.error('An error occurred while checking email or phone.');
            });

            // Prevent default form submission until checks are complete
            event.preventDefault();

            // Function to submit the form
            function submitForm() {
                $.ajax({
                    url: '{{ route('lead.store') }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        lead_id: lead_id,
                        name_0: name_0,
                        probability_0: probability_0,
                        street_0: street_0,
                        street2_0: street2_0,
                        city_0: city_0,
                        zip_0: zip_0,
                        state_id_0: state_id_0,
                        country_id_0: country_id_0,
                        website_0: website_0,
                        user_id_1: user_id_1,
                        team_id_0: team_id_0,
                        contact_name_0: contact_name_0,
                        title_0: title_0,
                        email_from_1: email_from_1,
                        phone_1: phone_1,
                        function_0: function_0,
                        mobile_0: mobile_0,
                        tag_ids_1: tag_ids_1,
                        priority: priority,
                        sales_person: sales_person,
                        campaign_id_0: campaign_id_0,
                        medium_id_0: medium_id_0,
                        source_id_0: source_id_0,
                        referred_0: referred_0,
                        internal_notes : internal_notes
                    },
                    success: function(response) {
                        toastr.success(response.message);
                        setTimeout(function() {
                            window.location.href = "{{ route('lead.index') }}";
                        }, 2000);
                    },
                    error: function(xhr, status, error) {
                        toastr.error('Something went wrong!');
                    }
                });
            }
        });
    });

</script>
<script>
  $(document).ready(function () {
     $(".makeMeSummernote").summernote();
    });
  $(document).ready(function () {
     $("#send_notification").summernote();
    });
</script>
<script>
  

        ClassicEditor
        .create(document.querySelector('#log_note'))
        .catch(error => {
            console.error(error);
        });
    
</script>

<script>
    $(document).ready(function() {       

        $('#scheduleForm').on('submit', function(e) {
            e.preventDefault(); // Prevent the default form submission
            $.ajax({
                url: $(this).attr('action'),
                method: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    toastr.success(response.message);
                    $('#activitiesAddModal').modal('hide'); // Hide the modal
                    location.reload();
                },
                error: function(xhr) {
                    // Handle any errors
                    alert('An error occurred while scheduling the activity.');
                }
            });
        });
    });
</script>

<script>
    $(document).ready(function() {
    
        // Click event for toggle header
        $('#toggleHeader').click(function() {
            var icon = $('#toggleIcon');
            var container = $('#activitiesContainer');
            var badge = $('#badgeCount');

            if (icon.hasClass('fa-caret-down')) {
                // Switch icon and show activities
                icon.removeClass('fa-caret-down').addClass('fa-caret-right');
                container.hide();
                badge.show();
            } else {
                // Switch icon and hide activities
                icon.removeClass('fa-caret-right').addClass('fa-caret-down');
                container.show();
                badge.hide();
            }
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        let editorInstance = null;

        // Function to initialize CKEditor
        function initializeEditor(selector, callback) {
            ClassicEditor
                .create(document.querySelector(selector))
                .then(editor => {
                    if (callback) callback(editor);
                })
                .catch(error => {
                    console.error('Error initializing CKEditor:', error);
                });
        }

        // Initialize CKEditors
        // initializeEditor('log_note');

        // Initialize CKEditor for the log note with existing content
        initializeEditor('.edit_log_note', editor => {
            editorInstance = editor;
            const existingContent = $('#edit_log_note').data('content') || ''; // Default to empty string if no content
            if (existingContent) {
                editorInstance.setData(existingContent);
            }
        });

        // Define URLs using Laravel's route helper
        const deleteUrl = "{{ route('lead.activitiesDelete', ['id' => '']) }}";
        const baseUrl = "{{ route('lead.activitiesEdit', ['id' => '']) }}";
        const updateUrl = "{{ route('lead.activitiesUpdate') }}"; // Assuming this is your update URL

        // Handle the Edit button click
        $('.o-mail-Activity-edit').on('click', function() {
            const activityId = $(this).closest('.o-mail-Activity').data('activity-id');
            if (!activityId) {
                console.error('Activity ID not found.');
                return;
            }

            const url = baseUrl + '/' + activityId;
            console.log('Fetching data from URL:', url);

            $.ajax({
                url: url,
                method: 'GET',
                success: function(response) {
                    console.log('Response data:', response);

                    $('#edit_activity_id').val(response.activity.id);
                    $('#edit_activity_type').val(response.activity.activity_type);
                    $('#edit_due_date').val(response.activity.due_date);
                    $('#edit_summary').val(response.activity.summary);
                    $('#edit_assigned_to').val(response.activity.assigned_to);

                    const logNoteElement = document.querySelector('.edit_log_note');
                    if (logNoteElement) {
                        if (editorInstance) {
                            const noteContent = response.activity.note || ''; // Default to empty string if no note
                            editorInstance.setData(noteContent);
                        } else {
                            initializeEditor('.edit_log_note', editor => {
                                editorInstance = editor;
                                const noteContent = response.activity.note || ''; // Default to empty string if no note
                                editorInstance.setData(noteContent);
                            });
                        }
                    } else {
                        console.error('CKEditor element not found.');
                    }

                    const editModal = new bootstrap.Modal(document.getElementById('editModal'));
                    editModal.show();
                },
                error: function(xhr) {
                    console.error('Error fetching activity data:', xhr.responseText);
                }
            });
        });

        // Handle form submission
        $('#editForm').on('submit', function(e) {
            e.preventDefault();

            const formData = $(this).serializeArray();
            const editorData = editorInstance ? editorInstance.getData() : '';

            const formObject = {};
            formData.forEach(field => {
                formObject[field.name] = field.value;
            });

            formObject.log_note = editorData;

            $.ajax({
                url: updateUrl,
                method: 'POST',
                data: formObject,
                success: function(response) {
                    toastr.success(response.message);
                    $('#editModal').modal('hide');
                    location.reload();
                },
                error: function(xhr) {
                    console.error('Error updating activity:', xhr.responseText);
                }
            });
        });

        // Handle the Delete button click
        $('.o-mail-Activity-delete').on('click', function() {
            const activityId = $(this).data('activity-id');
            if (!activityId) {
                console.error('Activity ID not found.');
                return;
            }
            $.ajax({
                url: deleteUrl + '/' + activityId,
                method: 'DELETE',
                success: function(response) {
                    toastr.success(response.message);
                    $('div[data-activity-id="' + activityId + '"]').remove();
                },
                error: function(xhr) {
                    console.error('Error deleting activity:', xhr.responseText);
                }
            });
        });

        // Clean up CKEditor instance when the modal is hidden
        $('#editModal').on('hidden.bs.modal', function() {
            if (editorInstance) {
                editorInstance.destroy().then(() => {
                    editorInstance = null;
                }).catch(error => {
                    console.error('Error destroying CKEditor instance:', error);
                });
            }
        });

        // Reset form when modal is hidden
        $('#editModal').on('hidden.bs.modal', function() {
            $('#editForm')[0].reset();
            // Additional logic to reset other elements or states if necessary
        });

        // Handle the click event for the "Save changes" button in the modal
        $('#saveChangesButton').click(function() {
            // Get the activity ID from a data attribute or other storage method
            var activityId = $('#markDoneModal').data('activity-id');
            
            // Get the feedback from the textarea
            var feedback = $('#markDoneModal textarea').val();
            
            // Make the AJAX request
            $.ajax({
                url: '{{route('lead.activitiesUpdateStatus')}}', // Replace with your actual route
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}', // CSRF token for security
                    id: activityId,
                    status: 1, // The status to update
                    feedback: feedback // Add feedback to the request
                },
                success: function(response) {
                    // Handle the response from the server
                    if (response.success) {
                        // Optionally update the UI to reflect the change
                        $('div[data-activity-id="' + activityId + '"]').remove();
                        
                        // Close the modal
                        $('#markDoneModal').modal('hide');
                        location.reload();
                    } else {
                        alert('Failed to mark activity as done.');
                    }
                },
                error: function() {
                    alert('An error occurred.');
                }
            });
        });

        // Attach click event to the "Mark Done" button to open the modal and store the activity ID
        $('.o-mail-Activity-markDone').click(function() {
            var activityId = $(this).closest('.o-mail-Activity').data('activity-id');
            
            // Store the activity ID in the modal
            $('#markDoneModal').data('activity-id', activityId);
            
            // Show the modal
            $('#markDoneModal').modal('show');
        });
    });
</script>

<script>
  const select = $('#lost_reasons');
        const newlostInput = $('#new_lost_input');
        const startlostTypingOptionValue = 'add_new_reson'; // Value for "Add New" option
        const titleSelectHide = $('.resonse_select_hide');

        // Function to add "Add New" option to the dropdown
        function addStartTypingOption() {
            if (!select.find(`option[value="${startlostTypingOptionValue}"]`).length) {
                const startTypingOption = new Option('Add New', startlostTypingOptionValue, false, false);
                select.append(startTypingOption);
            }
        }

        // Function to remove "Add New" option from the dropdown
        function removeStartTypingOption() {
            select.find(`option[value="${startlostTypingOptionValue}"]`).remove();
        }

        select.on('focus', function() {
            addStartTypingOption();
        });

        // Handle dropdown blur to hide "Add New" if not focused
        select.on('blur', function() {
            setTimeout(() => {
                if (!select.is(':focus') && !newlostInput.is(':focus')) {
                    removeStartTypingOption();
                }
            }, 100);
        });

        // Handle selection change
        select.on('change', function() {
            if ($(this).val() === startlostTypingOptionValue) {
                titleSelectHide.hide();
                newlostInput.show().focus();
            } else {
                newlostInput.hide();
                titleSelectHide.show();
            }
        });

        // Handle new title input
        newlostInput.on('keypress', function(e) {
            if (e.which === 13) {
                const newlost = $(this).val();
                var closing_notes = $('#closing_notes').val();
                if (newlost) {
                    $.ajax({
                        url: '{{ route('leads.storeLost') }}',
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            name: newlost,
                        },
                        success: function(response) {
                            // Add the new title to the dropdown
                            const newOption = new Option(response.name, response.id, false, false);
                            select.append(newOption);
                            select.val(response.id);
                            newlostInput.hide().val('');
                            titleSelectHide.show();
                            addStartTypingOption();
                        },
                        error: function() {
                            alert('Error adding title.');
                        }
                    });
                }
            }
        });

        // Ensure "Add New" is hidden when typing in new title input
        newlostInput.on('focus', function() {
            removeStartTypingOption();
        });

        let closingNotesEditor; // Store the CKEditor instance

        ClassicEditor
            .create(document.querySelector('#closing_notes'))
            .then(editor => {
                closingNotesEditor = editor; // Save the CKEditor instance
            })
            .catch(error => {
                console.error(error);
            });

        $(document).on('click', '.mark_as_lost', function() {
            var lead_id = $('#lead_id').val();
            var lost_reasons = $('#lost_reasons').val();
               var closing_notes = closingNotesEditor.getData();
            
            $.ajax({
                url: '{{ route('leads.markAsLost') }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    lead_id: lead_id,
                    lost_reasons: lost_reasons,
                    closing_notes: closing_notes,
                },
                success: function(response) {
                    toastr.success(response.message);
                    $('#staticBackdrop').modal('hide');
                    location.reload();
                  
                },
                error: function(xhr, status, error) {
                    toastr.error('Something went wrong!');
                }
            });
        });
</script>

<script>
    function toggleDetails(activityId) {
        var detailsDiv = document.getElementById('activity-details-' + activityId);
        
        if (!detailsDiv) {
            console.error('Details div not found for activityId:', activityId);
            return;
        }

        if (detailsDiv.classList.contains('d-none')) {
            console.log('Fetching details for activityId:', activityId);
            
            // Make AJAX request to fetch activity details
            fetch(`/activity-detail/${activityId}`)
                .then(response => {
                    // Check if the response is OK (status code 200-299)
                    if (!response.ok) {
                        throw new Error('Network response was not ok: ' + response.statusText);
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.error) {
                        console.error('Error fetching data:', data.error);
                        return;
                    }

                    console.log('Data received:', data);

                    // Populate the details
                    detailsDiv.innerHTML = `
                        <table class="o-mail-Activity-details table table-sm mt-2">
                            <tbody>
                                <tr>
                                    <td class="text-end fw-bolder">Activity type</td>
                                    <td>${data.activity_type}</td>
                                </tr>
                                <tr>
                                    <td class="text-end fw-bolder">Created</td>
                                    <td>${data.created_at} by ${data.email}</td>
                                </tr>
                                <tr>
                                    <td class="text-end fw-bolder">Assigned to</td>
                                    <td>${data.get_email}</td>
                                </tr>
                                <tr>
                                    <td class="text-end fw-bolder">Due on</td>
                                    <td>${data.due_date}</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="o-mail-Activity-note text-break mt-2">
                            <p>${data.note ?? ''}</p>
                        </div>
                    `;

                    // Show the details div
                    detailsDiv.classList.remove('d-none');
                })
                .catch(error => console.error('Fetch error:', error));
        } else {
            // Hide the details if already shown
            detailsDiv.classList.add('d-none');
        }
    }
</script>
<script>
    $(document).ready(function(){
        // When the attach button is clicked, trigger the file input click
      

        // When a file is uploaded
        $(".image_uplode").on("change", function(event){
            var files = event.target.files;
            $(".image_show").html(''); // Clear any previous images

            // Loop through each selected file and display it
            for (var i = 0; i < files.length; i++) {
                var file = files[i];

                // Only process image files
                if (file.type.startsWith('image/')) {
                    var reader = new FileReader();

                    // Closure to capture the file information
                    reader.onload = (function(theFile) {
                        return function(e) {
                            // Append the image to the .image_show div
                            $(".image_show").append('<img src="' + e.target.result + '" class="img-thumbnail m-2" width="100" height="100">');
                        };
                    })(file);

                    // Read the image file as a data URL
                    reader.readAsDataURL(file);
                }
            }
        });

        $('.send_messag_by_email').on('click', function(event){
            var send_message = $('#send_message').val(); 
            var image_uplode = $('.image_uplode')[0].files; // Files are objects
            var lead_id = $('#lead_id').val();
            // var to_mail = $('#to_mail').val();
            const to_mail = $('#to_mail').text();
            $('.send_messag_by_email').prop('disabled', true);

            // Create a FormData object
            var formData = new FormData();
            formData.append('_token', '{{ csrf_token() }}');
            formData.append('send_message', send_message);
            formData.append('lead_id', lead_id);
            formData.append('to_mail', to_mail);

            // Append files to FormData
            for (var i = 0; i < image_uplode.length; i++) {
                formData.append('image_uplode[]', image_uplode[i]); // Multiple files are added as an array
            }

            $('.show1').hide();
            $('.show2').hide();

            $.ajax({
                url: '{{ route('lead.send_message') }}',
                type: 'POST',
                data: formData,
                contentType: false, // Important: Prevent jQuery from setting the Content-Type header
                processData: false, // Important: Prevent jQuery from processing the data
                success: function(response) {
                    console.log(response)
                    location.reload();
                    
                   
                },
                error: function(xhr, status, error) {
                    toastr.error('Something went wrong!');
                }
            });

       

        });

    });
</script>

<script>
   function deleteImage(imagePath, messageId) {
        if (confirm('Are you sure you want to delete this image?')) {
            // Send AJAX request to delete the image
            fetch('/lead-deleteImage', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}' // Include CSRF token for security
                },
                body: JSON.stringify({ image: imagePath, message_id: messageId }) // Pass message_id along with image path
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload(); // Reload to see the changes
                } else {
                    alert('Failed to delete the image.');
                }
            })
            .catch(error => console.error('Error:', error));
        }
    }

    function downloadImage(imageUrl) {
        // Create a link and trigger a download
        const link = document.createElement('a');
        link.href = imageUrl;
        link.download = ''; // Optional: specify the filename here
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    }
</script>
<script>
    function downloadAllImages(messageId) {
        fetch(`/lead-downloadAllImages/${messageId}`, {
            method: 'GET',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}' // Include CSRF token for security
            }
        })
        .then(response => response.blob())  // Handle the zip file blob
        .then(blob => {
            // Create a link to download the file
            const link = document.createElement('a');
            link.href = window.URL.createObjectURL(blob);
            link.download = "images.zip";  // Name of the downloaded file
            link.click();
        })
        .catch(error => console.error('Error:', error));
    }

    $('.send_message_delete').on('click', function(){
        var id = $(this).data('id');

        $.ajax({
            url: '{{ route('lead.delete_send_message') }}',
            type: 'get',
            data: {
                _token: '{{ csrf_token() }}',
                id: id,
            },
            success: function(response) {
                toastr.success(response.message);
                
            setTimeout(function() {
                location.reload(); // Reloads the page
            }, 2000);
                
            },
            error: function(xhr, status, error) {
                toastr.error('Something went wrong!');
            }
        });
        
    });

  $('.send_message_star').on('click', function(){
    var $this = $(this); // Store the clicked element
    var id = $this.data('id');
    
    $.ajax({
        url: '{{ route('lead.click_star') }}',
        type: 'get',
        data: {
            _token: '{{ csrf_token() }}',
            id: id,
        },
        success: function(response) {

            // Change the icon class after successful AJAX call
            var icon = $this.find('i'); // Find the icon element inside the anchor
            icon.removeClass('fa-star-o').addClass('fa-star o-mail-Message-starred'); // Change the class to the desired one
            
           
        },
        error: function(xhr, status, error) {
            toastr.error('Something went wrong!');
        }
    });
});

</script>

<script>
   $('.send_message_btn').on('click', function() {
        $('.show1').toggle();
        $('.show2').toggle(); 
  });

</script>

<script>
   $('.followers').on('click', function() {
        var id = $('#lead_id').val();
        $.ajax({
            url: '{{ route('lead.click_follow') }}',
            type: 'post',
            data: {
                _token: '{{ csrf_token() }}',
                id : id
         
        },
        success: function(response) {   
           console.log(response);
        },
        error: function(xhr, status, error) {
                toastr.error('Something went wrong!');
            }
        }); 
   
      
    });

    $(document).on('click', '.add_followers', function() {
    
        $('#followersModal').modal('show')
    });

    $('#send_notofiction_chekbox').on('change', function() {
        if($(this).is(':checked')) {
            $('.hiden_div').attr('style', 'display:block !important'); 
        } else {
            $('.hiden_div').attr('style', 'display:none !important');
        }
    });
</script>




@endpush

@endsection
