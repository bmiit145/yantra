@extends('layout.header')
@section('head_new_btn_link', route('crm.show', ['crm' => 'new']))
@section('lead', route('crm.pipeline.list'))

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
{{--
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css"> --}}
<!-- Select2 CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"> -->
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
        display: block;
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

    input:focus {
        outline: none;
    }

    #ui-datepicker-div {
        display: none;
        background-color: #fff;
        box-shadow: 0 0.125rem 0.5rem rgba(0, 0, 0, 0.1);
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
        background-color: #E99D00;
        /* Adjust background color for today */
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
                        <div
                            class="o_form_statusbar position-relative d-flex justify-content-between mb-0 mb-md-2 pb-2 pb-md-0">
                            <div
                                class="o_statusbar_buttons d-flex align-items-center align-content-around flex-wrap gap-1">
                                <button invisible="type == 'opportunity' or not active" data-hotkey="v"
                                    class="btn btn-primary " name="511" type="action"><span>Convert to
                                        Opportunity</span></button>
                                <button data-hotkey="l" data-id="{{isset($data) ? $data->id : ''}}"
                                    invisible="type == 'opportunity' or probability == 0 and not active"
                                    class="btn btn-secondary lead_lost_btn" name="510" type="action"
                                    data-tooltip="Mark as lost" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop"><span>Lost</span></button>
                                <!-- @if($count > 1)
                                    <a href="{{ route('leads.similar', ['productName' => $data->product_name]) }}">
                                        <button class="btn btn-secondary" type="button" data-tooltip="Show similar leads">
                                            <span>Similar Leads</span><br>
                                            <span>{{ $count ?? '' }}</span>
                                        </button>
                                    </a>
                                @endif -->

                            </div>
                        </div>
                        <input type="hidden" name="pipeline_id" id="pipeline_id" value="{{ isset($data) ? $data->id : '' }}">
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
                                            <textarea class="o_input" id="name_0" style="width: 1000px"
                                                value="{{ isset($data) ? $data->opportunity : '' }}"
                                                placeholder="e.g. Product Pricing" rows="1" spellcheck="false"
                                                style="height: 45px; border-top-width: 0px; border-bottom-width: 1px; padding: 1px 0px;">{{ isset($data) ? $data->opportunity : '' }}</textarea>
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
                                                            class="opacity-0 d-inline-block overflow-hidden mw-100 o_monetary_ghost_value"></span></span><span
                                                        class="opacity-0">₹&nbsp;</span><input
                                                        class="o_input flex-grow-1 flex-shrink-1" autocomplete="off"
                                                        id="expected_revenue_0" type="text"
                                                        value="{{isset($data) ? $data->expected_revenue : '0.00'}}">
                                                </div>
                                            </div><span class="oe_grey p-2"> + </span>
                                            <div class="d-flex align-items-baseline gap-3">
                                                <div name="recurring_revenue"
                                                    class="o_field_widget o_field_monetary o_input_10ch">
                                                    <div
                                                        class="text-nowrap d-inline-flex w-100 align-items-baseline position-relative">
                                                        <span
                                                            class="o_input position-absolute pe-none d-flex w-100"><span>₹&nbsp;</span><span
                                                                class="opacity-0 d-inline-block overflow-hidden mw-100 o_monetary_ghost_value"></span></span><span
                                                            class="opacity-0">₹&nbsp;</span><input
                                                            class="o_input flex-grow-1 flex-shrink-1" autocomplete="off"
                                                            id="recurring_revenue_0" type="text"
                                                            value="{{isset($data) ? $data->recurring_revenue : '0.00'}}">
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-baseline">
                                                    <div name="recurring_plan"
                                                        class="o_field_widget o_required_modifier o_field_many2one oe_inline o_input_13ch">
                                                        <div class="o_field_many2one_selection">
                                                            <div class="o_input_dropdown">
                                                                <div class="o-autocomplete dropdown"><input type="text"
                                                                        class="o-autocomplete--input o_input"
                                                                        autocomplete="off" role="combobox"
                                                                        aria-autocomplete="list" aria-haspopup="listbox"
                                                                        id="recurring_plan_0" value="{{isset($data) ? $data->recurring_plan : ''}}"
                                                                        placeholder="e.g. &quot;Monthly&quot;"
                                                                        aria-expanded="false"></div><span
                                                                    class="o_dropdown_button"></span>
                                                            </div>
                                                        </div>
                                                        <div class="o_field_many2one_extra"></div>
                                                    </div><span class="oe_grey p-2 text-nowrap"> at </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto"><label class="o_form_label d-inline-block"
                                            for="probability_0">Probability</label>
                                        <div id="probability" class="d-flex align-items-baseline">
                                            <div name="probability"
                                                class="o_field_widget o_field_float oe_inline o_input_6ch"><input
                                                    inputmode="decimal" class="o_input" autocomplete="off"
                                                    id="probability_0" value="{{isset($data) ? $data->probability : ''}}" type="text"></div><span class="oe_grey p-2">
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
                                            <label class="o_form_label" for="partner_name_0">Customer<sup
                                                    class="text-info p-1" data-tooltip-template="web.FieldTooltip"
                                                    data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;The name of the future partner company that will be created while converting the lead into opportunity&quot;}}"
                                                    data-tooltip-touch-tap-to-show="true">?</sup></label>
                                        </div>
                                        <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                            style="width: 100%;">
                                            <div name="partner_name" class="o_field_widget o_field_char">
                                                <select class="o-autocomplete--input o_input" id="customer_select"
                                                    style="width: 150px;">
                                                    <option value="">Select Customer</option>
                                                    @foreach ($customers as $customer)
                                                                                                        @php
                                                                                                            $isSelected = (isset($data) && $data->contact_id == $customer->id);
                                                                                                        @endphp
                                                                                                        <option value="{{ $customer->id }}"
                                                                                                            data-name="{{ $customer->name }}"
                                                                                                            data-phone="{{ $customer->phone }}" {{ $isSelected ? 'selected' : '' }}>
                                                                                                            {{ $customer->name }}
                                                                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                            <div class="o_cell flex-grow-1 flex-sm-grow-0 o_wrap_label w-100 text-break text-900"
                                                style="">
                                                <label class="o_form_label oe_inline" for="email_from_1">Email</label>
                                            </div>
                                            <div class="o_cell flex-grow-1 flex-sm-grow-0" style="width: 100%;">
                                                <div class="o_row o_row_readonly">
                                                    <div name="email_from" class="o_field_widget o_field_email">
                                                        <div class="d-inline-flex w-100">
                                                            <input class="o_input" type="email" autocomplete="off"
                                                                id="email_from_1" value="{{isset($data) ? $data->email : ''}}">
                                                        </div>
                                                    </div>
                                                </div>
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
                                                                id="phone_1" value="{{isset($data) ? $data->phone : ''}}"></div>
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
                                                                <select class="o-autocomplete--input o_input"
                                                                    id="sales_person" style="width: 150px;">
                                                                    <option value="">Salesperson</option>
                                                                    @foreach ($users as $user)
                                                                        <option value="{{ $user->id }}" {{ (isset($data) && $data->sales_person == $user->id) || (!isset($data->sales_person) && $user->id == Auth::id()) ? 'selected' : '' }}>
                                                                            {{ $user->email ?? '' }}
                                                                        </option>
                                                                    @endforeach

                                                                </select>
                                                            </div>
                                                            <span class="o_dropdown_button"></span>
                                                        </div><button type="button"
                                                            class="btn btn-link text-action oi o_external_button oi-arrow-right"
                                                            tabindex="-1" draggable="false" aria-label="Internal link"
                                                            data-tooltip="Internal link"></button>
                                                    </div>
                                                    <div class="o_field_many2one_extra"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="o_cell flex-grow-1 flex-sm-grow-0 o_wrap_label w-100 text-break text-900"
                                        style=""><label class="o_form_label" for="date_deadline_0">Expected Closing<sup
                                                class="text-info p-1" data-tooltip-template="web.FieldTooltip"
                                                data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;Estimate of the date on which the opportunity will be won.&quot;}}"
                                                data-tooltip-touch-tap-to-show="true" title="">?</sup></label></div>
                                    <div class="o_cell flex-grow-1 flex-sm-grow-0" style="width: 100%;">
                                        <div class="o_lead_opportunity_form_inline_fields">
                                            <div name="date_deadline" class="o_field_widget o_field_date oe_inline">
                                                <div class="d-flex gap-2 align-items-center"><input type="text"
                                                        class="o_input cursor-pointer text-primary datepicker"
                                                        autocomplete="off" id="date_deadline_0"
                                                        data-field="date_deadline" value="{{isset($data) ? $data->deadline : ''}}"></div>
                                            </div>
                                            <div name="priority" class="o_field_widget o_field_priority oe_inline align-top">
                                                <div class="o_priority set-priority" role="radiogroup" name="priority"
                                                    aria-label="Priority">
                                                    <a href="#"
                                                        class="o_priority_star fa {{ isset($data->priority) && ($data->priority == 'medium' || $data->priority == 'high' || $data->priority == 'very_high') ? 'fa-star' : 'fa-star-o' }}"
                                                        role="radio" tabindex="-1" data-value="medium"
                                                        data-tooltip="Priority: Medium" aria-label="Medium"></a>
                                                    <a href="#"
                                                        class="o_priority_star fa {{ isset($data->priority) && ($data->priority == 'high' || $data->priority == 'very_high') ? 'fa-star' : 'fa-star-o' }}"
                                                        role="radio" tabindex="-1" data-value="high"
                                                        data-tooltip="Priority: High" aria-label="High"></a>
                                                    <a href="#"
                                                        class="o_priority_star fa {{ isset($data->priority) && $data->priority == 'very_high' ? 'fa-star' : 'fa-star-o' }}"
                                                        role="radio" tabindex="-1" data-value="very_high"
                                                        data-tooltip="Priority: Very High" aria-label="Very High"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                        <div
                                            class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                            <label class="o_form_label" for="tag_ids_1">Tags<sup class="text-info p-1"
                                                    data-tooltip-template="web.FieldTooltip"
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
                                                            <div class="tag_input_hide">
                                                                @php
                                                                    $selectedTagIds = isset($data->tag)
                                                                        ? (is_array($data->tag)
                                                                            ? $data->tag
                                                                            : explode(',', $data->tag))
                                                                        : [];
                                                                @endphp
                                                                <select class="o-autocomplete--input o_input"
                                                                    id="tag_ids_1" style="width: 150px;" multiple>
                                                                    @foreach ($tags as $tag)
                                                                        <option value="{{ $tag->id }}"
                                                                            data-color="{{ $tag->color }}" {{ in_array($tag->id, $selectedTagIds) ? 'selected' : '' }}>
                                                                            {{ $tag->name }}
                                                                        </option>
                                                                    @endforeach
                                                                    <option value="add_new_tag">Start typing...
                                                                    </option>
                                                                </select>
                                                            </div>
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
                                                href="#internal_notes" role="tab" data-bs-toggle="tab" tabindex="0"
                                                name="internal_notes">Internal Notes</a></li>
                                        <li class="nav-item flex-nowrap cursor-pointer"><a class="nav-link "
                                                href="#extra" role="tab" data-bs-toggle="tab" tabindex="0"
                                                name="extra">Extra Info</a></li>
                                    </ul>
                                </div>
                                <div class="tab-content">
                                    <div id="internal_notes" class="tab-pane fade show active">
                                        <textarea name="" id="description" cols="30" rows="10">{{isset($data) ? $data->description : ''}}</textarea>
                                    </div>
                                    <div id="extra" class="tab-pane fade">
                                        <div class="o_group row align-items-start">
                                            <div class="o_inner_group grid col-lg-6">
                                                <div class="g-col-sm-2">
                                                    <div
                                                        class="o_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">
                                                        Contact Information</div>
                                                </div>
                                                <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                    <div
                                                        class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                        <label class="o_form_label" for="partner_name_1">Company
                                                            Name<sup class="text-info p-1"
                                                                data-tooltip-template="web.FieldTooltip"
                                                                data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;The name of the future partner company that will be created while converting the lead into opportunity&quot;}}"
                                                                data-tooltip-touch-tap-to-show="true">?</sup></label>
                                                    </div>
                                                    <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                        style="width: 100%;">
                                                        <div name="partner_name" class="o_field_widget o_field_char">
                                                            <input class="o_input" id="partner_name_0" type="text"
                                                                autocomplete="off" value="{{isset($data) ? $data->company_name : ''}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                    <div class="o_cell flex-grow-1 flex-sm-grow-0 o_wrap_label w-100 text-break text-900"
                                                        style=""><label class="o_form_label"
                                                            for="street_0">Address</label></div>
                                                    <div class="o_cell flex-grow-1 flex-sm-grow-0" style="width: 100%;">
                                                        <div class="o_address_format">
                                                            <div name="street"
                                                                class="o_field_widget o_field_char o_address_street">
                                                                <input class="o_input" id="street_0" type="text"
                                                                    autocomplete="off" placeholder="Street..." value="{{isset($data) ? $data->street_1 : ''}}">
                                                            </div>
                                                            <div name="street2"
                                                                class="o_field_widget o_field_char o_address_street">
                                                                <input class="o_input" id="street2_0" type="text"
                                                                    autocomplete="off" placeholder="Street 2..." value="{{isset($data) ? $data->street_2 : ''}}">
                                                            </div>
                                                            <div name="city"
                                                                class="o_field_widget o_field_char o_address_city">
                                                                <input class="o_input" id="city_0" type="text"
                                                                    autocomplete="off" placeholder="City" value="{{isset($data) ? $data->city : ''}}">
                                                            </div>
                                                            <div name="zip"
                                                                class="o_field_widget o_field_char o_address_zip"><input
                                                                    class="o_input" id="zip_0" type="text"
                                                                    autocomplete="off" placeholder="ZIP" value="{{isset($data) ? $data->zip : ''}}"></div>
                                                            <div name="state_id"
                                                                class="o_field_widget o_field_many2one o_address_state">
                                                                <div class="o_field_many2one_selection">
                                                                    <div class="o_input_dropdown">
                                                                        <div class="o-autocomplete dropdown">
                                                                            <select
                                                                                class="o-autocomplete--input o_input"
                                                                                id="state_id_0" style="width: 150px;">
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
                                                                            <select
                                                                                class="o-autocomplete--input o_input"
                                                                                id="country_id_0" style="width: 150px;">
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
                                                </div>
                                                <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                    <div
                                                        class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                        <label class="o_form_label" for="website_0">Website<sup
                                                                class="text-info p-1"
                                                                data-tooltip-template="web.FieldTooltip"
                                                                data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;Website of the contact&quot;}}"
                                                                data-tooltip-touch-tap-to-show="true">?</sup></label>
                                                    </div>
                                                    <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                        style="width: 100%;">
                                                        <div name="website" class="o_field_widget o_field_url">
                                                            <div class="d-inline-flex w-100"><input class="o_input"
                                                                    type="text" autocomplete="off" id="website_0"
                                                                    placeholder="e.g. https://www.odoo.com"  value="{{isset($data) ? $data->website_link : ''}}"><a
                                                                    class="ms-3 d-inline-flex align-items-center"
                                                                    target="_blank" href="{{isset($data) ? $data->website_link : ''}}"><i
                                                                        class="fa fa-globe" data-tooltip="Go to URL"
                                                                        aria-label="Go to URL"></i></a></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="o_inner_group grid mt48 col-lg-6">
                                                <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                    <div class="o_cell flex-grow-1 flex-sm-grow-0 o_wrap_label w-100 text-break text-900"
                                                        style=""><label class="o_form_label"
                                                            for="contact_name_0">Contact Name</label></div>
                                                    <div class="o_cell flex-grow-1 flex-sm-grow-0" style="width: 100%;">
                                                        <div class="o_row">
                                                            <div name="contact_name"
                                                                class="o_field_widget o_field_char"><input
                                                                    class="o_input" id="contact_name_0" type="text"
                                                                    autocomplete="off" value="{{isset($data) ? $data->contact_name : ''}}"></div>
                                                            <div name="title" class="o_field_widget o_field_many2one">
                                                                <div class="o_field_many2one_selection">
                                                                    <div class="o_input_dropdown">
                                                                        <div class="o-autocomplete dropdown">
                                                                            <div class="title_select_hide">
                                                                                <select
                                                                                    class="o-autocomplete--input o_input"
                                                                                    id="title_0" style="width: 150px;">
                                                                                    <option value="">Selecte Title
                                                                                    </option>
                                                                                    @foreach ($titles as $title)
                                                                                        <option value="{{ $title->id }}" @if (isset($data->title) && $title->id == $data->title)
                                                                                        selected @endif>
                                                                                            {{ $title->title }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                    <option value="add_new">Start
                                                                                        typing...
                                                                                    </option>
                                                                                </select>
                                                                            </div>
                                                                            <input type="text" id="new_title_input"
                                                                                class="o_input mt-2"
                                                                                style="display: none; "
                                                                                placeholder="Enter new title">
                                                                        </div>
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
                                                        <label class="o_form_label" for="function_0">Job
                                                            Position</label>
                                                    </div>
                                                    <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                        style="width: 100%;">
                                                        <div name="function" class="o_field_widget o_field_char"><input
                                                                class="o_input" id="function_0" type="text"
                                                                autocomplete="off" value="{{isset($data) ? $data->job_postion : ''}}"></div>
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
                                                                        value="{{ isset($data) ? $data->mobile : '' }}"
                                                                        id="mobile_0"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="o_inner_group grid col-lg-6">
                                                <div class="g-col-sm-2">
                                                    <div
                                                        class="o_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">
                                                        Marketing</div>
                                                </div>
                                                <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
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
                                                        <div name="campaign" class="o_field_widget o_field_many2one">
                                                            <div class="o_field_many2one_selection">
                                                                <div class="o_input_dropdown">
                                                                    <div class="o-autocomplete dropdown">
                                                                        <div class="campaign_select_hide">
                                                                            <select
                                                                                class="o-autocomplete--input o_input"
                                                                                id="campaign_id_0"
                                                                                style="width: 150px;">
                                                                                <option value="">Selecte Campaign
                                                                                </option>
                                                                                @foreach ($campaigns as $campaign)
                                                                                    <option value="{{ $campaign->id }}" @if (isset($data->campaign_id) && $campaign->id == $data->campaign_id)
                                                                                    selected @endif>
                                                                                        {{ $campaign->name }}
                                                                                    </option>
                                                                                @endforeach
                                                                                <option value="add_campaign">Start
                                                                                    typing...</option>
                                                                            </select>
                                                                        </div>
                                                                        <input type="text" id="new_campaign_input"
                                                                            class="o_input mt-2" style="display: none;">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="o_field_many2one_extra"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                    <div
                                                        class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                        <label class="o_form_label" for="medium_id_1">Medium<sup
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
                                                                    <div class="o-autocomplete dropdown">
                                                                        <div class="medium_select_hide">
                                                                            <select
                                                                                class="o-autocomplete--input o_input"
                                                                                id="medium_id_0" style="width: 150px;">
                                                                                <option value="">Selecte Medium</option>
                                                                                @foreach ($mediums as $medium)
                                                                                    <option value="{{ $medium->id }}" @if (isset($data->medium_id) && $medium->id == $data->medium_id)
                                                                                    selected @endif>
                                                                                        {{ $medium->name }}
                                                                                    </option>
                                                                                @endforeach
                                                                                <option value="add_medium">Start
                                                                                    typing...</option>
                                                                            </select>
                                                                        </div>
                                                                        <input type="text" id="new_medium_input"
                                                                            class="o_input mt-2" style="display: none;">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="o_field_many2one_extra"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                    <div
                                                        class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                        <label class="o_form_label" for="source_id_1">Source<sup
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
                                                                    <div class="o-autocomplete dropdown">
                                                                        <div class="source_select_hide">
                                                                            <select
                                                                                class="o-autocomplete--input o_input"
                                                                                id="source_id_0" style="width: 150px;">
                                                                                <option value="">Selecte Source</option>
                                                                                @foreach ($sources as $source)
                                                                                    <option value="{{ $source->id }}" @if (isset($data->source_id) && $source->id == $data->source_id)
                                                                                    selected @endif>
                                                                                        {{ $source->name }}
                                                                                    </option>
                                                                                @endforeach
                                                                                <option value="add_source">Start
                                                                                    typing...</option>
                                                                            </select>
                                                                        </div>
                                                                        <input type="text" id="new_source_input"
                                                                            class="o_input mt-2" style="display: none;">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="o_field_many2one_extra"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                    <div
                                                        class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                        <label class="o_form_label" for="referred_0">Referred By</label>
                                                    </div>
                                                    <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                        style="width: 100%;">
                                                        <div name="referred" class="o_field_widget o_field_char"><input
                                                                class="o_input" id="referred_0" type="text"
                                                                autocomplete="off" value="{{isset($data) ? $data->referred_by : ''}}"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="o_inner_group grid col-lg-6">
                                                <div class="g-col-sm-2">
                                                    <div
                                                        class="o_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">
                                                        Tracking</div>
                                                </div>
                                                <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                    <div
                                                        class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                        <label class="o_form_label" for="team_id_1">Sales Team</label>
                                                    </div>
                                                    <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                        style="width: 100%;">
                                                        <div name="team_id" class="o_field_widget o_field_many2one">
                                                            <div class="o_field_many2one_selection">
                                                                <div class="o_input_dropdown">
                                                                    <div class="o-autocomplete dropdown"><input
                                                                            type="text"
                                                                            class="o-autocomplete--input o_input"
                                                                            autocomplete="off" role="combobox"
                                                                            aria-autocomplete="list"
                                                                            aria-haspopup="listbox" id="team_id_1"
                                                                            placeholder="" aria-expanded="false"></div>
                                                                    <span class="o_dropdown_button"></span>
                                                                </div>
                                                            </div>
                                                            <div class="o_field_many2one_extra"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                    <div
                                                        class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                        <label class="o_form_label o_form_label_readonly"
                                                            for="day_open_0">Days to Assign</label>
                                                    </div>
                                                    <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                        style="width: 100%;">
                                                        <div name="day_open"
                                                            class="o_field_widget o_readonly_modifier o_field_float">
                                                            <span>0.00</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                    <div
                                                        class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                        <label class="o_form_label o_form_label_readonly"
                                                            for="day_close_0">Days to Close</label>
                                                    </div>
                                                    <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                        style="width: 100%;">
                                                        <div name="day_close"
                                                            class="o_field_widget o_readonly_modifier o_field_float">
                                                            <span>0.00</span>
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
                                            data-hotkey="shift+a" data-bs-toggle="modal"
                                            data-bs-target="#activitiesAddModal"><span>Activities</span></button><span
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
                            @if($activitiesCount > 0)
                                <div class="d-flex pt-2 cursor-pointer fw-bolder" id="toggleHeader">
                                    <hr class="flex-grow-1 fs-3">
                                    <div class="d-flex align-items-center px-3">
                                        <i class="fa fa-fw fa-caret-down" id="toggleIcon"></i> Planned Activities
                                        <span class="badge rounded-pill ms-2 text-bg-success" id="badgeCount"
                                            style="display: none;">{{$activitiesCount ?? ''}}</span>
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
                                                                                        <div class="o-mail-Activity d-flex py-1 mb-2"
                                                                                            data-activity-id="{{ $activity->id }}">
                                                                                            <div class="o-mail-Activity-sidebar flex-shrink-0 position-relative">
                                                                                                <a role="button">
                                                                                                    <span
                                                                                                        class="activity-avatar-initials rounded d-flex align-items-center justify-content-center">
                                                                                                        {{ strtoupper($activity->getUser->name[0] ?? strtoupper($currentUser->name[0] ?? '')) }}
                                                                                                    </span>
                                                                                                </a>
                                                                                                <div
                                                                                                    class="o-mail-Activity-iconContainer position-absolute top-100 start-100 translate-middle d-flex align-items-center justify-content-center mt-n1 ms-n1 rounded-circle w-50 h-50 {{$iconClass}}">
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
                                                                                                        <span
                                                                                                            class="fw-bolder px-2 text-break">{{ $activity->summary ?? ''}}</span>
                                                                                                    @else
                                                                                                        <!-- Show activity type if summary does not exist -->
                                                                                                        <span
                                                                                                            class="fw-bolder px-2 text-break">{{ ucwords(str_replace('-', ' ', strtolower($activity->activity_type ?? ''))) }}</span>
                                                                                                    @endif
                                                                                                    <span class="o-mail-Activity-user px-1">for
                                                                                                        {{$activity->getUser->email ?? ''}}</span>
                                                                                                    <button class="btn btn-link btn-primary p-0 lh-1 border-0"
                                                                                                        onclick="toggleDetails({{ $activity->id }})">
                                                                                                        <i class="fa fa-info-circle" role="img" title="Info"
                                                                                                            aria-label="Info"></i>
                                                                                                    </button>
                                                                                                </div>
                                                                                                <div id="activity-details-{{ $activity->id }}" class="d-none">
                                                                                                    <!-- Details will be populated here -->
                                                                                                </div>
                                                                                                <div class="lh-lg">
                                                                                                    <button
                                                                                                        class="o-mail-Activity-markDone btn btn-link btn-success p-0 me-3"
                                                                                                        data-bs-toggle="modal" data-bs-target="#markDoneModal">
                                                                                                        <i class="fa fa-check"></i> Mark Done
                                                                                                    </button>
                                                                                                    <button type="button"
                                                                                                        class="o-mail-Activity-edit btn btn-link text-action p-0 me-3">
                                                                                                        <i class="fa fa-pencil"></i> Edit
                                                                                                    </button>
                                                                                                    <button type="button"
                                                                                                        class="btn btn-link btn-danger p-0 o-mail-Activity-delete"
                                                                                                        data-activity-id="{{ $activity->id }}">
                                                                                                        <i class="fa fa-times"></i> Cancel
                                                                                                    </button>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <!-- Modal -->
                                                                                    <div class="modal fade" id="markDoneModal" tabindex="-1"
                                                                                        aria-labelledby="markDoneModalLabel" aria-hidden="true">
                                                                                        <div class="modal-dialog">
                                                                                            <div class="modal-content">
                                                                                                <div class="modal-header">
                                                                                                    <h5 class="modal-title" id="markDoneModalLabel">Mark Done</h5>
                                                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                                                        aria-label="Close"></button>
                                                                                                </div>
                                                                                                <div class="modal-body">
                                                                                                    <textarea class="form-control" rows="4"
                                                                                                        placeholder="Write Feedback"></textarea>
                                                                                                </div>
                                                                                                <div class="modal-footer">
                                                                                                    <button type="button" id="saveChangesButton"
                                                                                                        class="btn btn-primary">Done</button>
                                                                                                    <button type="button" class="btn btn-secondary"
                                                                                                        data-bs-dismiss="modal">discard</button>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <!-- Edit Modal -->
                                                                                    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel"
                                                                                        aria-hidden="true">
                                                                                        <div class="modal-dialog modal-dialog-centered modal-lg">
                                                                                            <div class="modal-content">
                                                                                                <div class="modal-header">
                                                                                                    <h5 class="modal-title" id="editModalLabel">Edit Activity</h5>
                                                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                                                        aria-label="Close"></button>
                                                                                                </div>
                                                                                                <form id="editForm" action="" method="POST">
                                                                                                    <input type="hidden" id="edit_activity_id" name="id">
                                                                                                    <div class="modal-body">
                                                                                                        <div class="row col-md-12">
                                                                                                            <div class="col-md-6">
                                                                                                                <div class="d-flex align-items-center">
                                                                                                                    <div class="col-md-4">
                                                                                                                        <label for="activity_type" class="mr-2">Activity
                                                                                                                            Type</label>
                                                                                                                    </div>
                                                                                                                    <div class="col-md-8 activityTypeField">
                                                                                                                        <select class="form-control activity_type"
                                                                                                                            id="edit_activity_type" name="activity_type"
                                                                                                                            style="width: 100%;">
                                                                                                                            <option value="email">Email</option>
                                                                                                                            <option value="call">Call</option>
                                                                                                                            <option value="meeting">Meeting</option>
                                                                                                                            <option value="to-do" selected>To-Do</option>
                                                                                                                            <option value="upload_document">Upload Document
                                                                                                                            </option>
                                                                                                                            <option value="request_signature">Request
                                                                                                                                Signature</option>
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
                                                                                                                        <div class="o_cell flex-grow-1 flex-sm-grow-0"
                                                                                                                            style="width: 100%;">
                                                                                                                            <div class="o_row o_row_readonly">
                                                                                                                                <div name="edit_due_date"
                                                                                                                                    class="o_field_widget">
                                                                                                                                    <div class="d-inline-flex w-100"><input
                                                                                                                                            class="o_input datepicker"
                                                                                                                                            name="due_date"
                                                                                                                                            placeholder="Select Due Date"
                                                                                                                                            style="width: 300px;"
                                                                                                                                            type="text" id="edit_due_date">
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col-md-6 mt-3 summaryField">
                                                                                                                <div class="d-flex align-items-center">
                                                                                                                    <div class="col-md-4">
                                                                                                                        <label for="edit_summary"
                                                                                                                            class="mr-2">Summary</label>
                                                                                                                    </div>
                                                                                                                    <div class="col-md-8">
                                                                                                                        <input class="form-control"
                                                                                                                            placeholder="e.g. Discuss proposal"
                                                                                                                            style="width: 300px;" type="text"
                                                                                                                            id="edit_summary" name="summary">
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col-md-6 mt-3 assignedToField">
                                                                                                                <div class="d-flex align-items-center">
                                                                                                                    <div class="col-md-4">
                                                                                                                        <label for="edit_assigned_to" class="mr-2">Assigned
                                                                                                                            to</label>
                                                                                                                    </div>
                                                                                                                    <div class="col-md-8">
                                                                                                                        <select class="form-control" id="edit_assigned_to"
                                                                                                                            name="assigned_to" style="width: 100%;">
                                                                                                                            @foreach ($users as $user)
                                                                                                                                <option value="{{ $user->id }}">
                                                                                                                                    {{ $user->email }}
                                                                                                                                </option>
                                                                                                                            @endforeach
                                                                                                                        </select>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col-md-12 mt-3 logNoteField">
                                                                                                                <textarea class="form-control edit_log_note"
                                                                                                                    id="edit_log_note" name="log_note" rows="4"
                                                                                                                    placeholder="Log Note"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="modal-footer">
                                                                                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                                                                                        <button type="button" class="btn btn-secondary"
                                                                                                            data-bs-dismiss="modal">Cancel</button>
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
                                                                @php
                                                                    $logs = isset($data) ? $data->logs : collect(); // Ensure $logs is always a collection
                                                                @endphp

                                                                <x-log-display :logs="$logs" />
                                                                

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

<!-- Modal -->
<div class="modal fade" id="activitiesAddModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="activitiesAddModalLable" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="activitiesAddModalLable">Schedule Activity</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="scheduleForm" action="{{ route('lead.scheduleActivityStore') }}" method="POST"
                enctype="application/x-www-form-urlencoded">
                @csrf
                <input type="hidden" value="{{$data->id ?? ''}}" name="pipeline_id">
                <div class="modal-body">
                    <div class="row col-md-12">
                        <div class="col-md-6">
                            <div class="d-flex align-items-center">
                                <div class="col-md-4">
                                    <label for="activity_type" class="mr-2">Activity Type</label>
                                </div>
                                <div class="col-md-8 activityTypeField">
                                    <select class="form-control activity_type" id="activity_type" name="activity_type"
                                        style="width: 100%;">
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
                                                <div class="d-inline-flex w-100"><input class="o_input datepicker"
                                                        name="due_date" placeholder="Select Due Date"
                                                        style="width: 300px;" type="text" id="due_date"></div>
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
                                    <input class="form-control" placeholder="e.g. Discuss proposal"
                                        style="width: 300px;" type="text" id="summary" name="summary">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mt-3 assignedToField">
                            <div class="d-flex align-items-center">
                                <div class="col-md-4">
                                    <label for="assigned_to" class="mr-2">Assigned to</label>
                                </div>
                                <div class="col-md-8">
                                    <select class="form-control" id="assigned_to" name="assigned_to"
                                        style="width: 100%;">
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

            $("#customer_select").select2({
                allowClear: true
            });

            $("#source_id_0").select2({
                allowClear: true
            });

            $(function () {
                var currentDate = new Date();

                $(".datepicker").datepicker({
                    dateFormat: "yy-mm-dd",
                    duration: "fast",
                    onSelect: function (dateText, inst) {
                        // Optional: Do something when a date is selected
                        console.log("Selected date: " + dateText);
                    }
                }).datepicker();
            });

            $(document).ready(function () {
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
            $('.activity_type').change(function () {
                updateFields();
            });

        </script>

        <script>
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

            select.on('focus', function () {
                addStartTypingOption();
            });

            // Handle dropdown blur to hide "Add New" if not focused
            select.on('blur', function () {
                setTimeout(() => {
                    if (!select.is(':focus') && !newTitleInput.is(':focus')) {
                        removeStartTypingOption();
                    }
                }, 100);
            });

            // Handle selection change
            select.on('change', function () {
                if ($(this).val() === startTitleTypingOptionValue) {
                    titleSelectHide.hide();
                    newTitleInput.show().focus();
                } else {
                    newTitleInput.hide();
                    titleSelectHide.show();
                }
            });

            // Handle new title input
            newTitleInput.on('keypress', function (e) {
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
                            success: function (response) {
                                // Add the new title to the dropdown
                                const newOption = new Option(response.title, response.id, false, false);
                                select.append(newOption);
                                select.val(response.id);
                                newTitleInput.hide().val('');
                                titleSelectHide.show();
                                addStartTypingOption();
                            },
                            error: function () {
                                alert('Error adding title.');
                            }
                        });
                    }
                }
            });

            // Ensure "Add New" is hidden when typing in new title input
            newTitleInput.on('focus', function () {
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
            selectCampaign.on('focus', function () {
                console.log('Campaign dropdown focused.');
                addStartTypingOptionCampaign();
            });

            // Remove "Add New" option if dropdown and input are not focused
            selectCampaign.on('blur', function () {
                console.log('Campaign dropdown blurred.');
                setTimeout(() => {
                    if (!selectCampaign.is(':focus') && !newCampaignInput.is(':focus')) {
                        removeStartTypingOptionCampaign();
                    }
                }, 100);
            });

            // Handle dropdown change event
            selectCampaign.on('change', function () {
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
            newCampaignInput.on('keypress', function (e) {
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
                            success: function (response) {
                                console.log('Campaign added successfully:', response);
                                // Add the new name to the dropdown
                                const newOption = new Option(response.name, response.id, false, false);
                                selectCampaign.append(newOption);
                                selectCampaign.val(response.id);
                                newCampaignInput.hide().val('');
                                campaignSelectHide.show();
                                addStartTypingOptionCampaign();
                            },
                            error: function () {
                                alert('Error adding campaign.');
                            }
                        });
                    }
                }
            });

            // Ensure "Add New" is hidden when typing in new campaign input
            newCampaignInput.on('focus', function () {
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
            selectMedium.on('focus', function () {
                console.log('Campaign dropdown focused.');
                addStartTypingOptionMedium();
            });

            // Remove "Add New" option if dropdown and input are not focused
            selectMedium.on('blur', function () {
                console.log('Campaign dropdown blurred.');
                setTimeout(() => {
                    if (!selectMedium.is(':focus') && !newMediumInput.is(':focus')) {
                        removeStartTypingOptionMedium();
                    }
                }, 100);
            });

            // Handle dropdown change event
            selectMedium.on('change', function () {
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
            newMediumInput.on('keypress', function (e) {
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
                            success: function (response) {
                                console.log('Campaign added successfully:', response);
                                // Add the new name to the dropdown
                                const newOption = new Option(response.name, response.id, false, false);
                                selectMedium.append(newOption);
                                selectMedium.val(response.id);
                                newMediumInput.hide().val('');
                                mediumSelectHide.show();
                                addStartTypingOptionMedium();
                            },
                            error: function () {
                                alert('Error adding campaign.');
                            }
                        });
                    }
                }
            });

            // Ensure "Add New" is hidden when typing in new campaign input
            newMediumInput.on('focus', function () {
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
            selectSource.on('focus', function () {
                console.log('Campaign dropdown focused.');
                addStartTypingOptionMedium();
            });

            // Remove "Add New" option if dropdown and input are not focused
            selectSource.on('blur', function () {
                console.log('Campaign dropdown blurred.');
                setTimeout(() => {
                    if (!selectSource.is(':focus') && !newSourceInput.is(':focus')) {
                        removeStartTypingOptionMedium();
                    }
                }, 100);
            });

            // Handle dropdown change event
            selectSource.on('change', function () {
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
            newSourceInput.on('keypress', function (e) {
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
                            success: function (response) {
                                console.log('Campaign added successfully:', response);
                                // Add the new name to the dropdown
                                const newOption = new Option(response.name, response.id, false, false);
                                selectSource.append(newOption);
                                selectSource.val(response.id);
                                newSourceInput.hide().val('');
                                sourceSelectHide.show();
                                addStartTypingOptionMedium();
                            },
                            error: function () {
                                alert('Error adding campaign.');
                            }
                        });
                    }
                }
            });

            // Ensure "Add New" is hidden when typing in new campaign input
            newSourceInput.on('focus', function () {
                removeStartTypingOptionMedium();
            });

            $('#contact_name_0').on('input', function () {
                const query = $(this).val().toLowerCase();
                select.find('option').each(function () {
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
            selectTag.on('focus', function () {
                addStartTypingOption();
            });

            selectTag.on('blur', function () {
                setTimeout(() => {
                    if (!selectTag.is(':focus') && !newTagInput.is(':focus')) {
                        removeStartTypingOption();
                    }
                }, 100);
            });

            // Handle selection change
            selectTag.on('change', function () {
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
            newTagInput.on('keypress', function (e) {
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
                            success: function (response) {
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
                            error: function () {
                                alert('Error adding title.');
                            }
                        });
                    }
                }
            });

            // Ensure "Start typing" is hidden when typing in new tag input
            newTagInput.on('focus', function () {
                removeStartTypingOption();
            });
        </script>

        <script>
            $(document).ready(function () {
                // When the customer dropdown is changed
                $('#customer_select').on('change', function () {
                    var customerId = $(this).val(); // Get the selected customer ID

                    if (customerId) {
                        // Make an AJAX request to fetch customer details
                        $.ajax({
                            url: '/customer/' + customerId,  // URL to the controller method
                            type: 'GET',
                            success: function (response) {
                                // If customer data is returned, populate the fields
                                $('#email_from_1').val(response.email || '');  // Set email field
                                $('#phone_1').val(response.phone || '');  // Set phone field
                            },
                            error: function (xhr) {
                                // Handle errors (e.g., customer not found)
                                console.error(xhr.responseText);
                                $('#email_from_1').val('');  // Clear email field
                                $('#phone_1').val('');  // Clear phone field
                            }
                        });
                    } else {
                        // If no customer is selected, clear the email and phone fields
                        $('#email_from_1').val('');
                        $('#phone_1').val('');
                    }
                });

                function loadStates(countryId, selectedStateId = null) {
        $("#state_id_0").html(''); // Clear previous states
        $.ajax({
            url: "{{ route('fetch-states') }}",
            type: "POST",
            data: {
                country_id: countryId,
                _token: '{{ csrf_token() }}'
            },
            dataType: 'json',
            success: function (result) {
                $('#state_id_0').html('<option value="">-- Select State --</option>');
                $.each(result.states, function (key, value) {
                    $("#state_id_0").append('<option value="' + value.id + '"' +
                        (selectedStateId == value.id ? ' selected' : '') + '>' +
                        value.name + '</option>');
                });
            }
        });
    }

    // On country change, load states and reset state selection
    $('#country_id_0').on('change', function () {
        var idCountry = this.value;
        loadStates(idCountry); // Load states for the selected country
    });

    // If you're on the edit page, load the selected state
    @if (isset($data))
        // Assuming $data contains the country and state ids
        var countryId = "{{ $data->country}}";
        var stateId = "{{ $data->state }}";

        // Load the states with the selected state
        if (countryId) {
            loadStates(countryId, stateId);
        }
    @endif
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
            // Event handler for save button click
            $('#main_save_btn').click(function (event) {
                var pipeline_id = $('#pipeline_id').val();
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
                var description = $('#description').val();
                var date_deadline_0 = $('#date_deadline_0').val();
                var customer_select = $('#customer_select').val();
                var expected_revenue_0 = $('#expected_revenue_0').val();
                var recurring_revenue_0 = $('#recurring_revenue_0').val();
                var recurring_plan_0 = $('#recurring_plan_0').val();
                var partner_name_0 = $('#partner_name_0').val();


                // Validate only the name field
                if (!name_0) {
                    toastr.error('Name is required');
                    $('#name_0').css({
                        'border-color': 'red',
                        'background-color': '#ff99993d'
                    });
                    return; // Stop form submission
                }

                // If name is valid, submit the form
                submitForm();

                // Prevent default form submission until checks are complete
                event.preventDefault();

                // Function to submit the form
                function submitForm() {
                    $.ajax({
                        url: '{{ route('crm.pipeline.store') }}',
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            pipeline_id: pipeline_id,
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
                            description:description,
                            date_deadline_0:date_deadline_0,
                            customer_select:customer_select,
                            expected_revenue_0:expected_revenue_0,
                            recurring_revenue_0:recurring_revenue_0,
                            recurring_plan_0:recurring_plan_0,
                            partner_name_0:partner_name_0,
                        },
                        success: function (response) {
                            toastr.success(response.message);
                            setTimeout(function () {
                                window.location.href = "{{ route('crm.pipeline.list') }}";
                            }, 2000);
                        },
                        error: function (xhr, status, error) {
                            toastr.error('Something went wrong!');
                        }
                    });
                }
            });

        </script>
    @endpush

    @endsection