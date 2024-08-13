@extends('layout.header')

@section('title', 'Contacts')
@section('head_title_link' , route('contact.index'))
@section('image_url', asset('images/Contacts.png'))
@section('head_new_btn_link', route('contact.create'))
@section('save_class', 'save_contacts')
@section('head')
@vite([
        "resources/css/odoo/web.assets_web.css",
//        "resources/css/odoo/web.assets_web_print.min.css",
        "resources/css/contactcreate.css",
        "resources/js/common.js",
])
@endsection
@section('navbar_menu')
    <li><a href="{{ route('contact.index') }}">Contacts</a></li>
    <li><a href="#"></a>Configuration</li>
@endsection
@section('content')
<div class="o_action_manager">
    <div class="o_xxl_form_view h-100 o_form_view o_view_controller o_action">
        <div class="o_form_view_container">
            <div class="o_content">
                <div class="o_form_renderer o_form_editable d-flex flex-nowrap h-100">
                    <div class="o_form_sheet_bg">
                        <div class="o_form_sheet position-relative">
                            <div name="image_1920" class="o_field_widget o_field_image oe_avatar">
                                <div class="d-inline-block position-relative opacity-trigger-hover">
                                    <div aria-atomic="true"
                                        class="position-absolute d-flex justify-content-between w-100 bottom-0 opacity-0 opacity-100-hover"
                                        style="">
                                        <span style="display:contents">
                                            <button
                                                class="o_select_file_button btn btn-light border-0 rounded-circle m-1 p-1"
                                                data-tooltip="Edit" aria-label="Edit">
                                                <i class="fa fa-pencil fa-fw"></i>
                                            </button>
                                        </span>
                                    </div>
                                    <input type="file" class="o_input_file d-none" accept="image/*">
                                    <img loading="lazy" class="img img-fluid" alt="Binary file"
                                        src="{{ asset($contact->image ?? 'images/placeholder.png') }}" name="image_1920" style="">
                                </div>
                            </div>
                            <div class="oe_title mb24">
                                <h1>
                                    <input type="text" name="main_contact_id" value="{{ $contact->id ?? ''}}" id="contact_id" hidden />
                                    <div name="name"
                                        class="o_field_widget o_required_modifier o_field_field_partner_autocomplete text-break o_field_invalid">
                                        <div class="o-autocomplete dropdown">
                                            <input type="text"
                                                class="o-autocomplete--input o_input" autocomplete="off" role="combobox" name="contact_name" id="contact_name"
                                                aria-autocomplete="list" aria-haspopup="listbox"
                                                placeholder="e.g. Lumber Inc" aria-expanded="false"
                                                value="{{ $contact->name ?? ''}}">
                                        </div>
                                    </div>
                                </h1>
                                <div class="o_row"></div>
                            </div>
                            <div class="o_group row align-items-start">
                                <div class="o_inner_group grid col-lg-6">
                                    <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                        <div class="o_cell flex-grow-1 flex-sm-grow-0 o_wrap_label w-100 text-break text-900"
                                            style=""><span class="o_form_label o_td_label"
                                                name="address_name"><b>Address</b></span></div>
                                        <div class="o_cell flex-grow-1 flex-sm-grow-0" style="width: 100%;">
                                            <div class="o_address_format">
                                                <div name="street"
                                                    class="o_field_widget o_field_char o_address_street"><input
                                                        class="o_input" type="text" autocomplete="off" name="address_1" id="address_1"
                                                        placeholder="Street..." value="{{ $contact->address->address_1 ?? '' }}"></div>
                                                <div name="street2"
                                                    class="o_field_widget o_field_char o_address_street"><input
                                                        class="o_input"  type="text" autocomplete="off" name="address_2" id="address_2"
                                                        placeholder="Street 2..." value="{{ $contact->address->address_2 ?? '' }}"></div>
                                                <div name="city" class="o_field_widget o_field_char o_address_city">
                                                    <input class="o_input"  type="text" name="address_city" id="address_city"
                                                        autocomplete="off" placeholder="City" value="{{ $contact->address->city ?? '' }}">
                                                </div>
                                                <div name="zip" class="o_field_widget o_field_char o_address_zip">
                                                    <input class="o_input" type="text" name="address_zip" id="address_zip"
                                                        autocomplete="off" placeholder="ZIP" value="{{ $contact->address->zip ?? '' }}">
                                                </div>
                                                <div name="state_id"
                                                    class="o_field_widget o_field_many2one o_address_state">
                                                    <div class="o_field_many2one_selection">
                                                        <div class="o_input_dropdown">
                                                            <div class="o-autocomplete dropdown">
                                                                <input type="text"
                                                                    class="o-autocomplete--input o_input" name="address_state" id="address_state"
                                                                    autocomplete="off" role="combobox"
                                                                    aria-autocomplete="list" aria-haspopup="listbox"
                                                                    placeholder="State"
                                                                    aria-expanded="false" value="{{ $contact->address->zip ?? '' }}">
                                                            </div><span class="o_dropdown_button"></span>
                                                        </div>
                                                    </div>
                                                    <div class="o_field_many2one_extra"></div>
                                                </div>
                                                <div name="partner_address_country"
                                                    class="d-flex justify-content-between">
                                                    <div name="country_id"
                                                        class="o_field_widget o_field_many2one o_address_country">
                                                        <div class="o_field_many2one_selection">
                                                            <div class="o_input_dropdown">
                                                                <div class="o-autocomplete dropdown">
                                                                    <input
                                                                        type="text"
                                                                        class="o-autocomplete--input o_input"
                                                                        autocomplete="off" role="combobox"
                                                                        aria-autocomplete="list" name="country"
                                                                        aria-haspopup="listbox" id="country"
                                                                        placeholder="Country" aria-expanded="false"
                                                                        value="{{ $contact->address->country ?? '' }}">
                                                                </div><span class="o_dropdown_button"></span>
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
                                            <label class="o_form_label" for="l10n_in_gst_treatment_0">GST
                                                Treatment</label>
                                        </div>
                                        <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                            style="width: 100%;">
                                            <div name="l10n_in_gst_treatment"
                                                class="o_field_widget o_field_selection"><select class="o_input pe-3" name="gst_treatment" id="gst_treatment"
                                                    id="l10n_in_gst_treatment_0">
                                                    <option value="false" {{ isset($contact) && optional($contact)->GST_treatment == 'false' ? 'selected' : '' }}>Option Label</option>
                                                    <option value="regular" {{ isset($contact) && optional($contact)->GST_treatment == 'regular' ? 'selected' : '' }}>Registered Business - Regular</option>
                                                    <option value="composition" {{ isset($contact) && optional($contact)->GST_treatment == 'composition' ? 'selected' : '' }}>Registered Business - Composition</option>
                                                    <option value="unregistered" {{ isset($contact) && optional($contact)->GST_treatment == 'unregistered' ? 'selected' : '' }}>Unregistered Business</option>
                                                    <option value="consumer" {{ isset($contact) && optional($contact)->GST_treatment == 'consumer' ? 'selected' : '' }}>Consumer</option>
                                                    <option value="overseas" {{ isset($contact) && optional($contact)->GST_treatment == 'overseas' ? 'selected' : '' }}>Overseas</option>
                                                    <option value="special_economic_zone" {{ isset($contact) && optional($contact)->GST_treatment == 'special_economic_zone' ? 'selected' : '' }}>Special Economic Zone</option>
                                                    <option value="deemed_export" {{ isset($contact) && optional($contact)->GST_treatment == 'deemed_export' ? 'selected' : '' }}>Deemed Export</option>
                                                    <option value="uin_holders" {{ isset($contact) && optional($contact)->GST_treatment == 'uin_holders' ? 'selected' : '' }}>UIN Holders</option>
                                                </select></div>
                                        </div>
                                    </div>
                                    <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                        <div class="o_cell flex-grow-1 flex-sm-grow-0 o_wrap_label w-100 text-break text-900"
                                            style="">
                                            <label class="o_form_label" for="vat_0">GSTIN<sup
                                                    class="text-info p-1" data-tooltip-template="web.FieldTooltip"
                                                    data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;The Tax Identification Number. Values here will be validated based on the country format. You can use '/' to indicate that the partner is not subject to tax.&quot;}}"
                                                    data-tooltip-touch-tap-to-show="true">?</sup>
                                            </label>
                                        </div>
                                        <div class="o_cell flex-grow-1 flex-sm-grow-0" style="width: 100%;">
                                            <div name="vat_vies_container">
                                                <div name="vat"
                                                    class="o_field_widget o_field_field_partner_autocomplete oe_inline">
                                                    <div class="o-autocomplete dropdown">
                                                        <input type="text" name="gstin" id="gstin"
                                                            class="o-autocomplete--input o_input" autocomplete="off"
                                                            role="combobox" aria-autocomplete="list"
                                                            aria-haspopup="listbox" placeholder="e.g. BE0477472701"
                                                            aria-expanded="false"
                                                               value="{{ $contact->GSTIN ?? '' }}">
                                                    </div>
                                                </div><span class="text-nowrap ps-2"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                        <div
                                            class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                            <label class="o_form_label" for="l10n_in_pan_0">PAN<sup
                                                    class="text-info p-1" data-tooltip-template="web.FieldTooltip"
                                                    data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;PAN enables the department to link all transactions of the person with the department.\nThese transactions include taxpayments, TDS/TCS credits, returns of income/wealth/gift/FBT, specified transactions, correspondence, and so on.\nThus, PAN acts as an identifier for the person with the tax department.&quot;}}"
                                                    data-tooltip-touch-tap-to-show="true">?</sup></label>
                                        </div>
                                        <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                            style="width: 100%;">
                                            <div name="l10n_in_pan" class="o_field_widget o_field_char">
                                                <input
                                                    class="o_input" type="text" name="pan_number" id="pan_number"
                                                    autocomplete="off" placeholder="e.g. ABCTY1234D"
                                                    value="{{ $contact->PAN ?? '' }}"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="o_inner_group grid col-lg-6">
                                    <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                        <div class="o_cell flex-grow-1 flex-sm-grow-0 o_wrap_label w-100 text-break text-900"
                                            style=""><label class="o_form_label oe_inline"
                                                for="phone_0">Phone</label></div>
                                        <div class="o_cell flex-grow-1 flex-sm-grow-0" style="width: 100%;">
                                            <div class="o_row o_row_readonly">
                                                <div name="phone" class="o_field_widget o_field_phone">
                                                    <div class="o_phone_content d-inline-flex w-100">
                                                        <input
                                                            class="o_input" type="tel" autocomplete="off" name="phone_number" id="phone_number"
                                                            value="{{ $contact->phone ?? '' }}">
                                                    </div>
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
                                                    <div class="o_phone_content d-inline-flex w-100">
                                                        <input
                                                            class="o_input" type="tel" autocomplete="off" name="mobile_number" id="mobile_number"
                                                            value="{{ $contact->mobile ?? '' }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                        <div class="o_cell flex-grow-1 flex-sm-grow-0 o_wrap_label w-100 text-break text-900"
                                            style=""><label class="o_form_label oe_inline"
                                                for="email_0">Email</label></div>
                                        <div class="o_cell flex-grow-1 flex-sm-grow-0" style="width: 100%;">
                                            <div class="o_row o_row_readonly">
                                                <div name="email" class="o_field_widget o_field_email">
                                                    <div class="d-inline-flex w-100">
                                                        <input class="o_input" name="contact_email" id="contact_email"
                                                            type="email" autocomplete="off"  value="{{ $contact->email ?? '' }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                        <div
                                            class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                            <label class="o_form_label" for="website_0">Website</label>
                                        </div>
                                        <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                            style="width: 100%;">
                                            <div name="website" class="o_field_widget o_field_url">
                                                <div class="d-inline-flex w-100">
                                                    <input class="o_input" name="contact_Website" id="contact_Website"
                                                        type="text" autocomplete="off"
                                                        placeholder="e.g. https://www.odoo.com" value="{{ $contact->website ?? '' }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                        <div
                                            class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                            <label class="o_form_label" for="category_id_0">Tags</label>
                                        </div>
                                        <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                            style="width: 100%;">
                                            <div name="category_id" class="o_field_widget o_field_many2many_tags">
                                                <div
                                                    class="o_field_tags d-inline-flex flex-wrap gap-1 o_tags_input o_input">
                                                    <div class="o_field_many2many_selection d-inline-flex w-100">
                                                        <div class="o_input_dropdown">
                                                            <div class="o-autocomplete dropdown">
                                                                <input type="text"
                                                                    class="o-autocomplete--input o_input" name="contact_tages" id="contact_tages"
                                                                    autocomplete="off" role="combobox"
                                                                    aria-autocomplete="list" aria-haspopup="listbox"

                                                                    placeholder="e.g. &quot;B2B&quot;, &quot;VIP&quot;, &quot;Consulting&quot;, ..."
                                                                    aria-expanded="false" value="{{ $contact->tages ?? '' }}">
                                                            </div>
                                                            <span class="o_dropdown_button"></span>
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
                                                href="#" role="tab" tabindex="0"
                                                name="contact_addresses">Contacts &amp; Addresses</a></li>
                                        <li class="nav-item flex-nowrap cursor-pointer"><a class="nav-link"
                                                href="#" role="tab" tabindex="0"
                                                name="sales_purchases">Sales &amp; Purchase</a></li>
                                        <li class="nav-item flex-nowrap cursor-pointer"><a class="nav-link"
                                                href="#" role="tab" tabindex="0"
                                                name="accounting">Accounting</a></li>
                                        <li class="nav-item flex-nowrap cursor-pointer"><a class="nav-link"
                                                href="#" role="tab" tabindex="0"
                                                name="internal_notes">Internal Notes</a></li>
                                        <li class="nav-item flex-nowrap cursor-pointer"><a class="nav-link"
                                                href="#" role="tab" tabindex="0"
                                                name="geo_location">Partner Assignment</a></li>
                                    </ul>
                                </div>
                                <div class="o_notebook_content tab-content" id="contact_addresses">
                                    <div class="tab-pane active fade show">
                                        <div name="child_ids" class="o_field_widget o_field_one2many">
                                            <div class="o_kanban_view o_field_x2many o_field_x2many_kanban">
                                                <div class="o_x2m_control_panel d-empty-none mb-4">
                                                    <div class="o_cp_buttons gap-1" role="toolbar"
                                                        aria-label="Control panel buttons"><button type="button"
                                                            class="btn btn-secondary o-kanban-button-new">Add</button>
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
                                <div class="o_notebook_content tab-content" id="sales_purchases"
                                    style="display: none">
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
                                                        <label class="o_form_label" for="user_id_0">Salesperson<sup
                                                                class="text-info p-1"
                                                                data-tooltip-template="web.FieldTooltip"
                                                                data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;The internal user in charge of this contact.&quot;}}"
                                                                data-tooltip-touch-tap-to-show="true">?</sup></label>
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
                                                                        <div class="o-autocomplete dropdown"><input
                                                                                type="text"
                                                                                class="o-autocomplete--input o_input"
                                                                                autocomplete="off" role="combobox"
                                                                                aria-autocomplete="list"
                                                                                aria-haspopup="listbox" id="user_id_0"
                                                                                placeholder="" aria-expanded="false">
                                                                        </div><span class="o_dropdown_button"></span>
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
                                                        <label class="o_form_label"
                                                            for="property_payment_term_id_0">Payment Terms<sup
                                                                class="text-info p-1"
                                                                data-tooltip-template="web.FieldTooltip"
                                                                data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;This payment term will be used instead of the default one for sales orders and customer invoices&quot;}}"
                                                                data-tooltip-touch-tap-to-show="true">?</sup></label>
                                                    </div>
                                                    <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                        style="width: 100%;">
                                                        <div name="property_payment_term_id"
                                                            class="o_field_widget o_field_many2one">
                                                            <div class="o_field_many2one_selection">
                                                                <div class="o_input_dropdown">
                                                                    <div class="o-autocomplete dropdown"><input
                                                                            type="text"
                                                                            class="o-autocomplete--input o_input"
                                                                            autocomplete="off" role="combobox"
                                                                            aria-autocomplete="list"
                                                                            aria-haspopup="listbox"
                                                                            id="property_payment_term_id_0"
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
                                                        <label class="o_form_label"
                                                            for="property_product_pricelist_0">Pricelist<sup
                                                                class="text-info p-1"
                                                                data-tooltip-template="web.FieldTooltip"
                                                                data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;This pricelist will be used, instead of the default one, for sales to the current partner&quot;}}"
                                                                data-tooltip-touch-tap-to-show="true">?</sup></label>
                                                    </div>
                                                    <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                        style="width: 100%;">
                                                        <div name="property_product_pricelist"
                                                            class="o_field_widget o_field_many2one">
                                                            <div class="o_field_many2one_selection">
                                                                <div class="o_input_dropdown">
                                                                    <div class="o-autocomplete dropdown"><input
                                                                            type="text"
                                                                            class="o-autocomplete--input o_input"
                                                                            autocomplete="off" role="combobox"
                                                                            aria-autocomplete="list"
                                                                            aria-haspopup="listbox"
                                                                            id="property_product_pricelist_0"
                                                                            placeholder="" aria-expanded="false">
                                                                    </div><span class="o_dropdown_button"></span>
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
                                                        class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                        <label class="o_form_label"
                                                            for="property_delivery_carrier_id_0">Delivery Method<sup
                                                                class="text-info p-1"
                                                                data-tooltip-template="web.FieldTooltip"
                                                                data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;Default delivery method used in sales orders.&quot;}}"
                                                                data-tooltip-touch-tap-to-show="true">?</sup></label>
                                                    </div>
                                                    <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                        style="width: 100%;">
                                                        <div name="property_delivery_carrier_id"
                                                            class="o_field_widget o_field_many2one">
                                                            <div class="o_field_many2one_selection">
                                                                <div class="o_input_dropdown">
                                                                    <div class="o-autocomplete dropdown"><input
                                                                            type="text"
                                                                            class="o-autocomplete--input o_input"
                                                                            autocomplete="off" role="combobox"
                                                                            aria-autocomplete="list"
                                                                            aria-haspopup="listbox"
                                                                            id="property_delivery_carrier_id_0"
                                                                            placeholder="" aria-expanded="false">
                                                                    </div><span class="o_dropdown_button"></span>
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
                                                        Purchase</div>
                                                </div>
                                                <div
                                                    class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                    <div
                                                        class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                        <label class="o_form_label" for="buyer_id_0">Buyer</label>
                                                    </div>
                                                    <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                        style="width: 100%;">
                                                        <div name="buyer_id"
                                                            class="o_field_widget o_field_many2one_avatar_user o_field_many2one_avatar">
                                                            <div class="d-flex align-items-center gap-1"><span
                                                                    class="o_avatar o_m2o_avatar"><span
                                                                        class="o_avatar_empty o_m2o_avatar_empty"></span></span>
                                                                <div class="o_field_many2one_selection">
                                                                    <div class="o_input_dropdown">
                                                                        <div class="o-autocomplete dropdown"><input
                                                                                type="text"
                                                                                class="o-autocomplete--input o_input"
                                                                                autocomplete="off" role="combobox"
                                                                                aria-autocomplete="list"
                                                                                aria-haspopup="listbox"
                                                                                id="buyer_id_0" placeholder=""
                                                                                aria-expanded="false"></div><span
                                                                            class="o_dropdown_button"></span>
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
                                                        <label class="o_form_label"
                                                            for="property_supplier_payment_term_id_0">Payment Terms<sup
                                                                class="text-info p-1"
                                                                data-tooltip-template="web.FieldTooltip"
                                                                data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;This payment term will be used instead of the default one for purchase orders and vendor bills&quot;}}"
                                                                data-tooltip-touch-tap-to-show="true">?</sup></label>
                                                    </div>
                                                    <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                        style="width: 100%;">
                                                        <div name="property_supplier_payment_term_id"
                                                            class="o_field_widget o_field_many2one">
                                                            <div class="o_field_many2one_selection">
                                                                <div class="o_input_dropdown">
                                                                    <div class="o-autocomplete dropdown"><input
                                                                            type="text"
                                                                            class="o-autocomplete--input o_input"
                                                                            autocomplete="off" role="combobox"
                                                                            aria-autocomplete="list"
                                                                            aria-haspopup="listbox"
                                                                            id="property_supplier_payment_term_id_0"
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
                                                    <div class="o_cell flex-grow-1 flex-sm-grow-0"
                                                        style="grid-column: span 2;width: 100%;">
                                                        <div name="receipt_reminder" colspan="2"
                                                            class="o_checkbox_optional_field"><label
                                                                class="o_form_label"
                                                                for="receipt_reminder_email_0">Receipt Reminder<sup
                                                                    class="text-info p-1"
                                                                    data-tooltip-template="web.FieldTooltip"
                                                                    data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;Automatically send a confirmation email to the vendor X days before the expected receipt date, asking him to confirm the exact date.&quot;}}"
                                                                    data-tooltip-touch-tap-to-show="true">?</sup></label>
                                                            <div name="receipt_reminder_email"
                                                                class="o_field_widget o_field_boolean">
                                                                <div class="o-checkbox form-check d-inline-block">
                                                                    <input type="checkbox" class="form-check-input"
                                                                        id="receipt_reminder_email_0"><label
                                                                        class="form-check-label"
                                                                        for="receipt_reminder_email_0"></label>
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
                                                        Point Of Sale</div>
                                                </div>
                                                <div
                                                    class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                    <div
                                                        class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                        <label class="o_form_label" for="barcode_0">Barcode<sup
                                                                class="text-info p-1"
                                                                data-tooltip-template="web.FieldTooltip"
                                                                data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;Use a barcode to identify this contact.&quot;}}"
                                                                data-tooltip-touch-tap-to-show="true">?</sup></label>
                                                    </div>
                                                    <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                        style="width: 100%;">
                                                        <div name="barcode" class="o_field_widget o_field_char"><input
                                                                class="o_input" id="barcode_0" type="text"
                                                                autocomplete="off"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="o_inner_group grid col-lg-6">
                                                <div class="g-col-sm-2">
                                                    <div
                                                        class="o_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">
                                                        Fiscal Information</div>
                                                </div>
                                                <div
                                                    class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                    <div
                                                        class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                        <label class="o_form_label"
                                                            for="property_account_position_id_0">Fiscal Position<sup
                                                                class="text-info p-1"
                                                                data-tooltip-template="web.FieldTooltip"
                                                                data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;The fiscal position determines the taxes/accounts used for this contact.&quot;}}"
                                                                data-tooltip-touch-tap-to-show="true">?</sup></label>
                                                    </div>
                                                    <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                        style="width: 100%;">
                                                        <div name="property_account_position_id"
                                                            class="o_field_widget o_field_many2one">
                                                            <div class="o_field_many2one_selection">
                                                                <div class="o_input_dropdown">
                                                                    <div class="o-autocomplete dropdown"><input
                                                                            type="text"
                                                                            class="o-autocomplete--input o_input"
                                                                            autocomplete="off" role="combobox"
                                                                            aria-autocomplete="list"
                                                                            aria-haspopup="listbox"
                                                                            id="property_account_position_id_0"
                                                                            placeholder="" aria-expanded="false">
                                                                    </div><span class="o_dropdown_button"></span>
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
                                                        Misc</div>
                                                </div>
                                                <div
                                                    class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                    <div
                                                        class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                        <label class="o_form_label" for="company_registry_0">Company
                                                            ID<sup class="text-info p-1"
                                                                data-tooltip-template="web.FieldTooltip"
                                                                data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;The registry number of the company. Use it if it is different from the Tax ID. It must be unique across all partners of a same country&quot;}}"
                                                                data-tooltip-touch-tap-to-show="true">?</sup></label>
                                                    </div>
                                                    <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                        style="width: 100%;">
                                                        <div name="company_registry"
                                                            class="o_field_widget o_field_char"><input class="o_input"
                                                                id="company_registry_0" type="text"
                                                                autocomplete="off"></div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                    <div
                                                        class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                        <label class="o_form_label" for="ref_0">Reference</label>
                                                    </div>
                                                    <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                        style="width: 100%;">
                                                        <div name="ref" class="o_field_widget o_field_char"><input
                                                                class="o_input" id="ref_0" type="text"
                                                                autocomplete="off"></div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                    <div
                                                        class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                        <label class="o_form_label" for="company_id_1">Company</label>
                                                    </div>
                                                    <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                        style="width: 100%;">
                                                        <div name="company_id"
                                                            class="o_field_widget o_field_many2one">
                                                            <div class="o_field_many2one_selection">
                                                                <div class="o_input_dropdown">
                                                                    <div class="o-autocomplete dropdown"><input
                                                                            type="text"
                                                                            class="o-autocomplete--input o_input"
                                                                            autocomplete="off" role="combobox"
                                                                            aria-autocomplete="list"
                                                                            aria-haspopup="listbox" id="company_id_1"
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
                                                        <label class="o_form_label" for="website_id_0">Website<sup
                                                                class="text-info p-1"
                                                                data-tooltip-template="web.FieldTooltip"
                                                                data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;Restrict publishing to this website.&quot;}}"
                                                                data-tooltip-touch-tap-to-show="true">?</sup></label>
                                                    </div>
                                                    <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                        style="width: 100%;">
                                                        <div name="website_id"
                                                            class="o_field_widget o_field_many2one">
                                                            <div class="o_field_many2one_selection">
                                                                <div class="o_input_dropdown">
                                                                    <div class="o-autocomplete dropdown"><input
                                                                            type="text"
                                                                            class="o-autocomplete--input o_input"
                                                                            autocomplete="off" role="combobox"
                                                                            aria-autocomplete="list"
                                                                            aria-haspopup="listbox" id="website_id_0"
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
                                                        <label class="o_form_label"
                                                            for="industry_id_0">Industry</label>
                                                    </div>
                                                    <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                        style="width: 100%;">
                                                        <div name="industry_id"
                                                            class="o_field_widget o_field_many2one">
                                                            <div class="o_field_many2one_selection">
                                                                <div class="o_input_dropdown">
                                                                    <div class="o-autocomplete dropdown"><input
                                                                            type="text"
                                                                            class="o-autocomplete--input o_input"
                                                                            autocomplete="off" role="combobox"
                                                                            aria-autocomplete="list"
                                                                            aria-haspopup="listbox" id="industry_id_0"
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
                                                        <label class="o_form_label" for="sla_ids_0">SLA Policies<sup
                                                                class="text-info p-1"
                                                                data-tooltip-template="web.FieldTooltip"
                                                                data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;SLA Policies that will automatically apply to the tickets submitted by this customer.&quot;}}"
                                                                data-tooltip-touch-tap-to-show="true">?</sup></label>
                                                    </div>
                                                    <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                        style="width: 100%;">
                                                        <div name="sla_ids"
                                                            class="o_field_widget o_field_many2many_tags">
                                                            <div
                                                                class="o_field_tags d-inline-flex flex-wrap gap-1 o_tags_input o_input">
                                                                <div
                                                                    class="o_field_many2many_selection d-inline-flex w-100">
                                                                    <div class="o_input_dropdown">
                                                                        <div class="o-autocomplete dropdown"><input
                                                                                type="text"
                                                                                class="o-autocomplete--input o_input"
                                                                                autocomplete="off" role="combobox"
                                                                                aria-autocomplete="list"
                                                                                aria-haspopup="listbox" id="sla_ids_0"
                                                                                placeholder="" aria-expanded="false">
                                                                        </div><span class="o_dropdown_button"></span>
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
                                <div class="o_notebook_content tab-content" id="accounting" style="display: none">
                                    <div class="tab-pane active fade show">
                                        <div class="o_group row align-items-start">
                                            <div class="o_inner_group grid col-lg-6">
                                                <div class="g-col-sm-2">
                                                    <div
                                                        class="o_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">
                                                        Bank Accounts</div>
                                                </div>
                                                <div
                                                    class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                    <div class="o_cell flex-grow-1 flex-sm-grow-0"
                                                        style="grid-column: span 2;width: 100%;">
                                                        <div name="bank_ids"
                                                            class="o_field_widget o_field_auto_save_res_partner">
                                                            <div
                                                                class="o_list_view o_field_x2many o_field_x2many_list">
                                                                <div class="o_x2m_control_panel d-empty-none mb-4">
                                                                </div>
                                                                <div class="o_list_renderer o_renderer table-responsive"
                                                                    tabindex="-1">
                                                                    <table
                                                                        class="o_list_table table table-sm table-hover position-relative mb-0 o_list_table_ungrouped table-striped"
                                                                        style="table-layout: fixed;">
                                                                        <thead>
                                                                            <tr>
                                                                                <th data-tooltip-delay="1000"
                                                                                    tabindex="-1"
                                                                                    data-name="sequence"
                                                                                    class="align-middle o_column_sortable position-relative cursor-pointer o_list_number_th o_handle_cell opacity-trigger-hover"
                                                                                    style="width: 33px;"></th>
                                                                                <th data-tooltip-delay="1000"
                                                                                    tabindex="-1"
                                                                                    data-name="acc_number"
                                                                                    class="align-middle o_column_sortable position-relative cursor-pointer opacity-trigger-hover"
                                                                                    style="width: 50%;">
                                                                                    <div class="d-flex"><span
                                                                                            class="d-block min-w-0 text-truncate flex-grow-1">Account
                                                                                            Number</span><i
                                                                                            class="fa fa-lg fa-angle-down opacity-0 opacity-75-hover"></i>
                                                                                    </div><span
                                                                                        class="o_resize position-absolute top-0 end-0 bottom-0 ps-1 bg-black-25 opacity-0 opacity-50-hover z-index-1"></span>
                                                                                </th>
                                                                                <th data-tooltip-delay="1000"
                                                                                    tabindex="-1" data-name="bank_id"
                                                                                    class="align-middle o_column_sortable position-relative cursor-pointer opacity-trigger-hover"
                                                                                    style="width: 50%;">
                                                                                    <div class="d-flex"><span
                                                                                            class="d-block min-w-0 text-truncate flex-grow-1">Bank</span><i
                                                                                            class="fa fa-lg fa-angle-down opacity-0 opacity-75-hover"></i>
                                                                                    </div><span
                                                                                        class="o_resize position-absolute top-0 end-0 bottom-0 ps-1 bg-black-25 opacity-0 opacity-50-hover z-index-1"></span>
                                                                                </th>
                                                                                <th data-tooltip-delay="1000"
                                                                                    tabindex="-1"
                                                                                    data-name="allow_out_payment"
                                                                                    class="align-middle o_column_sortable position-relative cursor-pointer opacity-trigger-hover"
                                                                                    style="width: 70px;">
                                                                                    <div class="d-flex"><span
                                                                                            class="d-block min-w-0 text-truncate flex-grow-1">Send
                                                                                            Money</span><i
                                                                                            class="fa fa-lg fa-angle-down opacity-0 opacity-75-hover"></i>
                                                                                    </div><span
                                                                                        class="o_resize position-absolute top-0 end-0 bottom-0 ps-1 bg-black-25 opacity-0 opacity-50-hover z-index-1"></span>
                                                                                </th>
                                                                                <th
                                                                                    class="o_list_controller o_list_actions_header position-sticky end-0">
                                                                                </th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody class="ui-sortable">
                                                                            <tr>
                                                                                <td></td>
                                                                                <td class="o_field_x2many_list_row_add"
                                                                                    colspan="4"><a href="#"
                                                                                        role="button"
                                                                                        tabindex="0">Add a line</a>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td colspan="5">&ZeroWidthSpace;
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td colspan="5">&ZeroWidthSpace;
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td colspan="5">&ZeroWidthSpace;
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                        <tfoot class="o_list_footer cursor-default">
                                                                            <tr>
                                                                                <td></td>
                                                                                <td></td>
                                                                                <td></td>
                                                                                <td></td>
                                                                                <td></td>
                                                                            </tr>
                                                                        </tfoot>
                                                                    </table>
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
                                                        Electronic Invoicing</div>
                                                </div>
                                                <div
                                                    class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                    <div
                                                        class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                        <label class="o_form_label"
                                                            for="ubl_cii_format_0">Format</label>
                                                    </div>
                                                    <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                        style="width: 100%;">
                                                        <div name="ubl_cii_format"
                                                            class="o_field_widget o_field_selection"><select
                                                                class="o_input pe-3" id="ubl_cii_format_0">
                                                                <option value="false" style=""></option>
                                                                <option value="&quot;facturx&quot;">Factur-X (CII)
                                                                </option>
                                                                <option value="&quot;ubl_bis3&quot;">BIS Billing 3.0
                                                                </option>
                                                                <option value="&quot;xrechnung&quot;">XRechnung CIUS
                                                                </option>
                                                                <option value="&quot;nlcius&quot;">NLCIUS</option>
                                                                <option value="&quot;ubl_a_nz&quot;">BIS Billing 3.0
                                                                    A-NZ</option>
                                                                <option value="&quot;ubl_sg&quot;">BIS Billing 3.0 SG
                                                                </option>
                                                            </select></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="o_inner_group grid col-lg-6">
                                                <div class="g-col-sm-2">
                                                    <div
                                                        class="o_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">
                                                        Accounting Entries</div>
                                                </div>
                                                <div
                                                    class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                    <div
                                                        class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                        <label class="o_form_label"
                                                            for="property_account_receivable_id_0">Account
                                                            Receivable<sup class="text-info p-1"
                                                                data-tooltip-template="web.FieldTooltip"
                                                                data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;This account will be used instead of the default one as the receivable account for the current partner&quot;}}"
                                                                data-tooltip-touch-tap-to-show="true">?</sup></label>
                                                    </div>
                                                    <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                        style="width: 100%;">
                                                        <div name="property_account_receivable_id"
                                                            class="o_field_widget o_required_modifier o_field_many2one">
                                                            <div class="o_field_many2one_selection">
                                                                <div class="o_input_dropdown">
                                                                    <div class="o-autocomplete dropdown"><input
                                                                            type="text"
                                                                            class="o-autocomplete--input o_input"
                                                                            autocomplete="off" role="combobox"
                                                                            aria-autocomplete="list"
                                                                            aria-haspopup="listbox"
                                                                            id="property_account_receivable_id_0"
                                                                            placeholder="" aria-expanded="false">
                                                                    </div><span class="o_dropdown_button"></span>
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
                                                        class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                        <label class="o_form_label"
                                                            for="property_account_payable_id_0">Account Payable<sup
                                                                class="text-info p-1"
                                                                data-tooltip-template="web.FieldTooltip"
                                                                data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;This account will be used instead of the default one as the payable account for the current partner&quot;}}"
                                                                data-tooltip-touch-tap-to-show="true">?</sup></label>
                                                    </div>
                                                    <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                        style="width: 100%;">
                                                        <div name="property_account_payable_id"
                                                            class="o_field_widget o_required_modifier o_field_many2one">
                                                            <div class="o_field_many2one_selection">
                                                                <div class="o_input_dropdown">
                                                                    <div class="o-autocomplete dropdown"><input
                                                                            type="text"
                                                                            class="o-autocomplete--input o_input"
                                                                            autocomplete="off" role="combobox"
                                                                            aria-autocomplete="list"
                                                                            aria-haspopup="listbox"
                                                                            id="property_account_payable_id_0"
                                                                            placeholder="" aria-expanded="false">
                                                                    </div><span class="o_dropdown_button"></span>
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
                                        </div>
                                    </div>
                                </div>
                                <div class="o_notebook_content tab-content" id="internal_notes" style="display:none">
                                    <div class="tab-pane active fade show">
                                        <div name="comment" class="o_field_widget o_field_html">
                                            <div class="h-100">
                                                <div style="display: contents;"></div>
                                                <div style="display: contents;"></div>
                                                <div class="oe-absolute-container">
                                                    <div class="oe-absolute-container"
                                                        data-oe-absolute-container-id="oe-selections-container"></div>
                                                    <div class="oe-absolute-container"
                                                        data-oe-absolute-container-id="oe-avatars-container"></div>
                                                    <div class="oe-absolute-container"
                                                        data-oe-absolute-container-id="oe-widget-hooks-container">
                                                        <div class="oe-dropzone-hook"
                                                            style="display: block; z-index: 0; left: -21px; top: 4px; width: 25px; height: 37px;">
                                                        </div>
                                                    </div>
                                                    <div class="oe-absolute-container o_draggable"
                                                        data-oe-absolute-container-id="oe-widgets-container"></div>
                                                    <div class="oe-absolute-container"
                                                        data-oe-absolute-container-id="oe-movenode-helper-container">
                                                    </div>
                                                    <div class="oe-absolute-container"
                                                        data-oe-absolute-container-id="oe-dropzones-container"></div>
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
                                                                        class="fa fa-plus"></span>Insert above</div>
                                                                <div class="o_insert_below"><span
                                                                        class="fa fa-plus"></span>Insert below</div>
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
                                                                        class="fa fa-chevron-right"></span>Move right
                                                                </div>
                                                                <div class="o_insert_left"><span
                                                                        class="fa fa-plus"></span>Insert left</div>
                                                                <div class="o_insert_right"><span
                                                                        class="fa fa-plus"></span>Insert right</div>
                                                                <div class="o_delete_column"><span
                                                                        class="fa fa-trash"></span>Delete</div>
                                                                <div class="o_reset_table_size"><span
                                                                        class="fa fa-table"></span>Reset Size</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="note-editable odoo-editor-editable odoo-editor-qweb"
                                                    id="comment_0" contenteditable="true" dir="ltr"
                                                    spellcheck="true">
                                                    <p placeholder="Type &quot;/&quot; for commands"
                                                        class="oe-hint oe-command-temporary-hint"><br></p>
                                                </div>
                                            </div>
                                            <div class="d-none o_knowledge_behavior_handler"></div>
                                        </div>
                                        <div class="o_inner_group grid"></div>
                                        <div class="o_inner_group grid"></div>
                                        <div class="o_inner_group grid"></div>
                                    </div>
                                </div>
                                <div class="o_notebook_content tab-content" id="geo_location" style="display: none">
                                    <div class="tab-pane active fade show">
                                        <div class="o_group row align-items-start">
                                            <div class="o_inner_group grid col-lg-6">
                                                <div class="g-col-sm-2">
                                                    <div
                                                        class="o_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">
                                                        Geolocation</div>
                                                </div>
                                                <div
                                                    class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                    <div class="o_cell flex-grow-1 flex-sm-grow-0 o_wrap_label w-100 text-break text-900"
                                                        style=""><label
                                                            class="o_form_label o_form_label_readonly"
                                                            for="date_localization_0">Geo Location</label></div>
                                                    <div class="o_cell flex-grow-1 flex-sm-grow-0"
                                                        style="width: 100%;">
                                                        <div><span>Lat : <div name="partner_latitude"
                                                                    class="o_field_widget o_field_float oe_inline">
                                                                    <input inputmode="decimal" class="o_input"
                                                                        autocomplete="off" id="partner_latitude_1"
                                                                        type="text">
                                                                </div></span><br><span>Long:
                                                                <div name="partner_longitude"
                                                                    class="o_field_widget o_field_float oe_inline">
                                                                    <input inputmode="decimal" class="o_input"
                                                                        autocomplete="off" id="partner_longitude_1"
                                                                        type="text">
                                                                </div>
                                                            </span><br>
                                                            <div name="geo_localize_button"><button
                                                                    invisible="partner_latitude != 0 or partner_longitude != 0"
                                                                    class="btn btn-link p-0" name="geo_localize"
                                                                    type="object"
                                                                    data-tooltip="Compute Localization"><i
                                                                        class="o_button_icon fa fa-fw fa-gear me-1"></i><span>Compute
                                                                        based on address</span></button></div>
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
                    <div class="o-mail-ChatterContainer o-mail-Form-chatter o-aside">
                        <div
                            class="o-mail-Chatter w-100 h-100 flex-grow-1 d-flex flex-column overflow-auto {{ isset($contact) ? '' :  'o-chatter-disabled' }} ">
                            <div class="o-mail-Chatter-top position-sticky top-0">
                                <div class="o-mail-Chatter-topbar d-flex flex-shrink-0 flex-grow-0 overflow-x-auto">
                                    <button class="o-mail-Chatter-sendMessage btn text-nowrap me-1 btn-primary my-2"
                                        data-hotkey="m" style="position: relative;"> Send message </button><button
                                        class="o-mail-Chatter-logNote btn text-nowrap me-1 btn-secondary my-2"
                                        data-hotkey="shift+m" style="position: relative;"> Log note </button>
                                    <div class="flex-grow-1 d-flex"><button
                                            class="o-mail-Chatter-activity btn btn-secondary text-nowrap my-2"
                                            data-hotkey="shift+a"
                                            style="position: relative;"><span>Activities</span></button><span
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
                                    <div class="d-flex flex-shrink-0 pt-3 text-truncate small mb-2 ms-5">
                                        <span class="fw-bold">To:</span>
                                        <span class="ps-1">
                                            <span class="text-muted" title="21bmiit145@gmail.com">21bmiit145</span>
                                        </span>
                                        <button class="o-mail-Chatter-recipientListButton btn btn-link badge rounded-pill border-0 p-1 ms-1" title="Show all recipients"><i class="fa fa-caret-down"></i></button>
                                    </div>
                                <div style="margin-left:48px;"></div>
                                <div>
                                    <div class="o-mail-Composer d-grid flex-shrink-0 pt-0 pb-2 o-extended o-hasSelfAvatar">
                                        <div class="o-mail-Composer-sidebarMain flex-shrink-0">
                                            <img class="o-mail-Composer-avatar o_avatar rounded" alt="Avatar of user" src="{{  asset('images/placeholder.png') }}"></div>
                                        <div class="o-mail-Composer-coreMain d-flex flex-nowrap align-items-start flex-grow-1 flex-column">
                                            <div class="d-flex bg-view flex-grow-1 border rounded-3 align-self-stretch flex-column">
                                                <div class="position-relative flex-grow-1">
                                                    <textarea class="o-mail-Composer-input form-control bg-view px-3 border-0 rounded-3 shadow-none overflow-auto" style="height:40px;" placeholder="Send a message to followers…"></textarea>
                                                    <textarea class="o-mail-Composer-fake position-absolute" disabled="1"></textarea></div>
                                                <div class="o-mail-Composer-actions d-flex bg-view rounded mx-3 border-top p-1">
                                                    <div class="d-flex flex-grow-1 align-items-baseline mt-1">
                                                        <button class="btn border-0 p-1 rounded-pill" aria-label="Emojis"><i class="fa fa-fw fa-smile-o"></i></button>
                                                        <span style="display:contents">
                                                            <button class="o-mail-Composer-attachFiles btn border-0 rounded-pill p-1" title="Attach files" aria-label="Attach files" type="button">
                                                                <i class="fa fa-fw fa-paperclip"></i>
                                                            </button>
                                                        </span>
                                                        <input type="file" class="o_input_file d-none" multiple="multiple" accept="*">
                                                    </div>
                                                    <button class="o-mail-Composer-fullComposer btn p-1 border-0 rounded-pill" title="Full composer" aria-label="Full composer" type="button" data-hotkey="shift+c" style="position: relative;">
                                                        <i class="fa fa-fw fa-expand"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center mt-2 gap-2">
{{--                                                <button class="o-mail-Composer-send btn btn-primary" disabled="" aria-label="Send">Send</button>--}}
                                                <button class="o-mail-Composer-send btn btn-primary" aria-label="Send">Send</button>
                                            </div>
                                        </div>
                                        <div class="o-mail-Composer-footer overflow-auto"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="o-mail-Chatter-content">
                                @php
                                    $logs = isset($contact) ? $contact->logs : collect(); // Ensure $logs is always a collection
                                @endphp

                                <x-log-display :logs="$logs" />

                                {{--                                <div class="o-mail-Thread position-relative flex-grow-1 d-flex flex-column overflow-auto pb-4"--}}
{{--                                    tabindex="-1">--}}
{{--                                    <div class="d-flex flex-column position-relative flex-grow-1">--}}
{{--                                        @if( isset($contact) && optional($contact->logs)->count() > 0)--}}
{{--                                            @php--}}
{{--                                                // Get logs and sort them by creation date in descending order--}}
{{--                                                $logs = $contact->logs->sortByDesc('created_at')->groupBy(function($log) {--}}
{{--                                                    return $log->created_at->format('Y-m-d');--}}
{{--                                                });--}}
{{--                                            @endphp--}}

{{--                                            @foreach($logs as $date => $logGroup)--}}
{{--                                               @php--}}
{{--                                                    $date = match ($date) {--}}
{{--                                                        now()->format('Y-m-d') => 'Today',--}}
{{--                                                        now()->subDay()->format('Y-m-d') => 'Yesterday',--}}
{{--                                                        default => Carbon\Carbon::parse($date)->format('d M Y'),--}}
{{--                                                    };--}}
{{--                                                @endphp--}}
{{--                                                <span class="position-absolute w-100 invisible top-0" style="height: Min(2500px, 100%)"></span>--}}
{{--                                                <span></span>--}}
{{--                                                <div class="o-mail-DateSection d-flex align-items-center w-100 fw-bold pt-2">--}}
{{--                                                    <hr class="flex-grow-1">--}}
{{--                                                    <span class="px-3 opacity-75 small text-muted">{{ $date }}</span>--}}
{{--                                                    <hr class="flex-grow-1">--}}
{{--                                                </div>--}}
{{--                                                @foreach($logGroup as $log)--}}
{{--                                                    @php--}}
{{--                                                        $profile_pic = optional($log->user->contact)->image;--}}
{{--                                                    @endphp--}}
{{--                                                    <div class="o-mail-Message position-relative pt-1 o-selfAuthored mt-1" role="group" aria-label="Note">--}}
{{--                                                    <div class="o-mail-Message-core position-relative d-flex flex-shrink-0">--}}
{{--                                                        <div class="o-mail-Message-sidebar d-flex flex-shrink-0 align-items-start justify-content-start">--}}
{{--                                                            <div class="o-mail-Message-avatarContainer position-relative bg-view cursor-pointer" aria-label="Open card">--}}
{{--                                                                <img class="o-mail-Message-avatar w-100 h-100 rounded o_object_fit_cover o_redirect cursor-pointer"--}}
{{--                                                                     src=" {{ $profile_pic ??  'https://yantra-design2.odoo.com/web/image/res.partner/3/avatar_128?unique=1722494284000' }}">--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="w-100 o-min-width-0">--}}
{{--                                                            <div class="o-mail-Message-header d-flex flex-wrap align-items-baseline lh-1">--}}
{{--                                                                <span class="o-mail-Message-author cursor-pointer o-hover-text-underline" aria-label="Open card">--}}
{{--                                                                    <strong class="me-1 text-truncate">{{ $log->user->email }}</strong>--}}
{{--                                                                </span>--}}
{{--                                                                <small class="o-mail-Message-date text-muted opacity-75 o-smaller" title="{{ $log->created_at->format('n/j/Y, g:i:s a') }}">- {{ $log->created_at->diffForHumans() }} </small>--}}
{{--                                                                <div class="o-mail-Message-actions d-print-none ms-2 my-n2 invisible"><div class="d-flex rounded-1 overflow-hidden"><button class="btn px-1 py-0 lh-1 rounded-0 rounded-start-1" tabindex="1" title="Add a Reaction" aria-label="Add a Reaction"><i class="oi fa-lg oi-smile-add"></i></button><button class="btn px-1 py-0 rounded-0" title="Mark as Todo" name="toggle-star"><i class="fa fa-lg fa-star-o"></i></button><div class="d-flex rounded-0"><button class="btn px-1 py-0 rounded-0 rounded-end-1 o-dropdown dropdown-toggle dropdown" title="Expand" aria-expanded="false"><i class="fa fa-lg fa-ellipsis-h" tabindex="1"></i></button></div></div></div>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="position-relative d-flex">--}}
{{--                                                                <div class="o-mail-Message-content o-min-width-0 pt-1">--}}
{{--                                                                    @if($log->action != 'updated')--}}
{{--                                                                    <div class="o-mail-Message-textContent position-relative d-flex">--}}
{{--                                                                        <div class="position-relative overflow-x-auto d-inline-block">--}}
{{--                                                                            <div class="o-mail-Message-bubble rounded-bottom-3 position-absolute top-0 start-0 w-100 h-100 rounded-end-3"></div>--}}
{{--                                                                            <div class="position-relative text-break o-mail-Message-body p-1">--}}
{{--                                                                                {{ $log->message  }}--}}
{{--                                                                            </div>--}}
{{--                                                                            <div class="o-mail-Message-seenContainer position-absolute bottom-0"></div>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                    @endif--}}
{{--                                                                    @if($log->action == 'updated')--}}
{{--                                                                        @php--}}
{{--                                                                            $changedFields = json_decode($log->message, true);--}}
{{--                                                                        @endphp--}}
{{--                                                                            <div class="o-mail-Message-textContent position-relative d-flex">--}}
{{--                                                                                <div>--}}
{{--                                                                                    <ul class="mb-0 ps-4">--}}
{{--                                                                                        @foreach($changedFields as $field => $data)--}}
{{--                                                                                            <li class="o-mail-Message-tracking mb-1" style=" list-style-type: disc;" role="group">--}}
{{--                                                                                            <span class="o-mail-Message-trackingOld me-1 px-1 text-muted fw-bold">{{ $data['old'] }}</span>--}}
{{--                                                                                            <i class="o-mail-Message-trackingSeparator fa fa-long-arrow-right mx-1 text-600"></i>--}}
{{--                                                                                            <span class="o-mail-Message-trackingNew me-1 fw-bold text-info">{{ $data['new'] }}</span>--}}
{{--                                                                                            <span class="o-mail-Message-trackingField ms-1 fst-italic text-muted">({{ $field }})</span>--}}
{{--                                                                                        </li>--}}
{{--                                                                                        @endforeach--}}
{{--                                                                                    </ul>--}}
{{--                                                                                    <div>--}}
{{--                                                                                        <div class="o-mail-Message-body text-break mb-0 w-100">--}}
{{--                                                                                        </div>--}}
{{--                                                                                    </div>--}}
{{--                                                                                </div>--}}
{{--                                                                            </div>--}}
{{--                                                                    @endif--}}
{{--                                                                    @if($log->attachments != null)--}}
{{--                                                                    <div class="o-mail-AttachmentList overflow-y-auto d-flex flex-column mt-1">--}}
{{--                                                                        <div class="d-flex flex-grow-1 flex-wrap mx-1 align-items-center" role="menu"></div>--}}
{{--                                                                        <div class="grid row-gap-0 column-gap-0">--}}
{{--                                                                            <div class="o-mail-AttachmentCard d-flex rounded mb-1 me-1 mw-100 overflow-auto g-col-4 bg-300" role="menu" title="vdb.xlsx" aria-label="vdb.xlsx">--}}
{{--                                                                                <div class="o-mail-AttachmentCard-image o_image flex-shrink-0 m-1" role="menuitem" aria-label="Preview" tabindex="-1" data-mimetype="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"></div>--}}
{{--                                                                                <div class="overflow-auto d-flex justify-content-center flex-column px-1">--}}
{{--                                                                                    <div class="text-truncate">vdb.xlsx</div>--}}
{{--                                                                                    <small class="text-uppercase">xlsx</small>--}}
{{--                                                                                </div>--}}
{{--                                                                                <div class="flex-grow-1"></div>--}}
{{--                                                                                <div class="o-mail-AttachmentCard-aside position-relative rounded-end overflow-hidden d-flex o-hasMultipleActions flex-column">--}}
{{--                                                                                    <button class="o-mail-AttachmentCard-unlink btn top-0 align-items-center justify-content-center d-flex w-100 h-100 rounded-0 border-0 bg-300" title="Remove">--}}
{{--                                                                                        <i class="fa fa-trash" role="img" aria-label="Remove"></i>--}}
{{--                                                                                    </button>--}}
{{--                                                                                    <button class="btn d-flex align-items-center justify-content-center w-100 h-100 rounded-0 bg-300" title="Download">--}}
{{--                                                                                        <i class="fa fa-download" role="img" aria-label="Download"></i>--}}
{{--                                                                                    </button>--}}
{{--                                                                                </div>--}}
{{--                                                                            </div>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                        @endif--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}



{{--                                            <div class="o-mail-Message position-relative pt-1 o-selfAuthored mt-1" role="group" aria-label="System notification">--}}
{{--                                            <div class="o-mail-Message-core position-relative d-flex flex-shrink-0">--}}
{{--                                                <div class="o-mail-Message-sidebar d-flex flex-shrink-0 align-items-start justify-content-start">--}}
{{--                                                    <div class="o-mail-Message-avatarContainer position-relative bg-view cursor-pointer" aria-label="Open card">--}}
{{--                                                        <img class="o-mail-Message-avatar w-100 h-100 rounded o_object_fit_cover o_redirect cursor-pointer" src="https://yantra-design2.odoo.com/web/image/res.partner/3/avatar_128?unique=1722494284000">--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="w-100 o-min-width-0">--}}
{{--                                                    <div class="o-mail-Message-header d-flex flex-wrap align-items-baseline lh-1">--}}
{{--                                                        <span class="o-mail-Message-author cursor-pointer o-hover-text-underline" aria-label="Open card">--}}
{{--                                                            <strong class="me-1 text-truncate">info@yantradesign.co.in</strong></span>--}}
{{--                                                        <small class="o-mail-Message-date text-muted opacity-75 o-smaller" title="1/8/2024, 11:50:00 am">- 2 hours ago</small>--}}
{{--                                                        <div class="o-mail-Message-actions d-print-none ms-2 my-n2 invisible">--}}
{{--                                                            <div class="d-flex rounded-1 overflow-hidden">--}}
{{--                                                                <button class="btn px-1 py-0 lh-1 rounded-0 rounded-start-1" tabindex="1" title="Add a Reaction" aria-label="Add a Reaction">--}}
{{--                                                                    <i class="oi fa-lg oi-smile-add"></i>--}}
{{--                                                                </button>--}}
{{--                                                                <button class="btn px-1 py-0 rounded-0 rounded-end-1" title="Mark as Todo" name="toggle-star">--}}
{{--                                                                    <i class="fa fa-lg fa-star-o"></i>--}}
{{--                                                                </button>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="position-relative d-flex">--}}
{{--                                                        <div class="o-mail-Message-content o-min-width-0 pt-1">--}}
{{--                                                            <div class="o-mail-Message-textContent position-relative d-flex"><div>--}}
{{--                                                                    <ul class="mb-0 ps-4">--}}
{{--                                                                        <li class="o-mail-Message-tracking mb-1" role="group">--}}
{{--                                                                            <span class="o-mail-Message-trackingOld me-1 px-1 text-muted fw-bold">None</span>--}}
{{--                                                                            <i class="o-mail-Message-trackingSeparator fa fa-long-arrow-right mx-1 text-600"></i>--}}
{{--                                                                            <span class="o-mail-Message-trackingNew me-1 fw-bold text-info">24FEZPB4648D1ZA</span>--}}
{{--                                                                            <span class="o-mail-Message-trackingField ms-1 fst-italic text-muted">(Tax ID)</span>--}}
{{--                                                                            </li>--}}
{{--                                                                        <li class="o-mail-Message-tracking mb-1" role="group"><span class="o-mail-Message-trackingOld me-1 px-1 text-muted fw-bold">145  , Rajeshwari Society, Kamrej, Surat 394180, Daman and Diu DD, India</span><i class="o-mail-Message-trackingSeparator fa fa-long-arrow-right mx-1 text-600"></i><span class="o-mail-Message-trackingNew me-1 fw-bold text-info">145  , Rajeshwari Society, Kamrej, Surat 394180, Gujarat GJ, India</span><span class="o-mail-Message-trackingField ms-1 fst-italic text-muted">(Inlined Complete Address)</span></li></ul>--}}
{{--                                                                    <div>--}}
{{--                                                                        <div class="o-mail-Message-body text-break mb-0 w-100">--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}


{{--                                        @endforeach--}}
{{--                                            @endforeach--}}


{{--                                        @else--}}
{{--                                            <div class="o-mail-Message position-relative undefined o-selfAuthored py-1 mt-2" role="group" aria-label="System notification">--}}
{{--                                                <div class="o-mail-Message-core position-relative d-flex flex-shrink-0">--}}
{{--                                                    <div class="o-mail-Message-sidebar d-flex flex-shrink-0">--}}
{{--                                                        <div class="o-mail-Message-avatarContainer position-relative bg-view cursor-pointer"--}}
{{--                                                             aria-label="Open card"><img--}}
{{--                                                                class="o-mail-Message-avatar w-100 h-100 rounded o_object_fit_cover o_redirect cursor-pointer"--}}
{{--                                                                src="https://yantradesign.odoo.com/web/image/res.partner/3/avatar_128?unique=1721388544000">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="w-100 o-min-width-0">--}}
{{--                                                        <div--}}
{{--                                                            class="o-mail-Message-header d-flex flex-wrap align-items-baseline mb-1 lh-1">--}}
{{--                                                        <span class="o-mail-Message-author cursor-pointer"--}}
{{--                                                              aria-label="Open card"><strong--}}
{{--                                                                class="me-1 text-truncate">{{ auth()->user()->email }}</strong></span><small--}}
{{--                                                                class="o-mail-Message-date text-muted opacity-75 me-2"--}}
{{--                                                                title="now">- now</small><span--}}
{{--                                                                class="o-mail-MessageSeenIndicator position-relative d-flex opacity-50 o-all-seen text-primary ms-1"></span>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="position-relative d-flex">--}}
{{--                                                            <div class="o-mail-Message-content o-min-width-0">--}}
{{--                                                                <div--}}
{{--                                                                    class="o-mail-Message-textContent position-relative d-flex">--}}
{{--                                                                    <div>--}}
{{--                                                                        <div--}}
{{--                                                                            class="o-mail-Message-body text-break mb-0 w-100">--}}
{{--                                                                            Creating a new record...</div>--}}
{{--                                                                    </div>--}}
{{--                                                                    <div--}}
{{--                                                                        class="o-mail-Message-actions ms-2 mt-1 invisible">--}}
{{--                                                                        <div--}}
{{--                                                                            class="d-flex rounded-1 bg-view shadow-sm overflow-hidden">--}}
{{--                                                                            <button class="btn px-1 py-0 rounded-0"--}}
{{--                                                                                    tabindex="1" title="Add a Reaction"--}}
{{--                                                                                    aria-label="Add a Reaction"><i--}}
{{--                                                                                    class="oi fa-lg oi-smile-add"></i></button><button--}}
{{--                                                                                class="btn px-1 py-0 rounded-0"--}}
{{--                                                                                title="Mark as Todo"--}}
{{--                                                                                name="toggle-star"><i--}}
{{--                                                                                    class="fa fa-lg fa-star-o"></i></button>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        @endif--}}
{{--                                    </div>--}}
{{--                                </div>--}}
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
    <div class="o-mail-ChatWindowContainer"></div>
    <div class="o-overlay-container"></div>
    <div></div>
    <div class="o_notification_manager o_upload_progress_toast"></div>
    <div class="o_fullscreen_indication">
        <p>Press <span>esc</span> to exit full screen</p>
    </div>
    <div class="o_notification_manager"></div>
</div>

<div class="o-overlay-container" style="display: none" id="contact_and_address_add">
    <div class="o_dialog" id="dialog_1">
        <div role="dialog" class="modal d-block o_technical_modal" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content o_form_view" style="top: 0px; left: 0px;">
                    <header class="modal-header">
                        <h4 class="modal-title text-break">Create Contact</h4><button type="button"
                            class="btn-close contact_and_address_add_close" aria-label="Close"
                            tabindex="-1"></button>
                    </header>
                    <footer class="modal-footer justify-content-around justify-content-md-start flex-wrap gap-1 w-100"
                        style="order:2"><button class="btn btn-primary o_form_button_save" data-hotkey="c">Save
                            &amp; Close</button><button class="btn btn-primary o_form_button_save_new save_new_contact"
                            data-hotkey="n">Save &amp; New</button><button
                            class="btn btn-secondary o_form_button_cancel" data-hotkey="j">Discard</button></footer>
                    <main class="modal-body p-0">
                        <div class="o_form_renderer o_form_editable d-flex flex-nowrap h-100">
                            <div class="o_form_sheet_bg">
                                <div class="o_form_sheet position-relative">
                                    <div name="type" class="o_field_widget o_required_modifier o_field_radio">
                                        <div role="radiogroup" class="o_horizontal" aria-label="Address Type">
                                            <div class="form-check o_radio_item" aria-atomic="true"><input
                                                type="radio" class="form-check-input o_radio_input" value="1"
                                                name="radio_field_2" data-value="other" data-index="4"
                                                id="radio_field_2_other"><label
                                                class="form-check-label o_form_label"
                                                for="radio_field_2_other">Contact</label></div>

                                            <div class="form-check o_radio_item" aria-atomic="true"><input
                                                    type="radio" class="form-check-input o_radio_input"
                                                    name="radio_field_2" data-value="invoice" data-index="1" value="2" name="creat_contact"
                                                    id="radio_field_2_invoice"><label
                                                    class="form-check-label o_form_label"
                                                    for="radio_field_2_invoice">Invoice Address</label></div>
                                            <div class="form-check o_radio_item" aria-atomic="true"><input
                                                    type="radio" class="form-check-input o_radio_input"
                                                    name="radio_field_2" data-value="delivery" data-index="2" value="3" name="creat_contact"
                                                    id="radio_field_2_delivery"><label
                                                    class="form-check-label o_form_label"
                                                    for="radio_field_2_delivery">Delivery Address</label></div>
                                            <div class="form-check o_radio_item" aria-atomic="true"><input
                                                    type="radio" class="form-check-input o_radio_input"
                                                    name="radio_field_2" data-value="followup" data-index="3" value="4" name="creat_contact"
                                                    id="radio_field_2_followup"><label
                                                    class="form-check-label o_form_label"
                                                    for="radio_field_2_followup">Follow-up Address</label></div>

                                                    <div class="form-check o_radio_item" aria-atomic="true"><input checked
                                                        type="radio" class="form-check-input o_radio_input"
                                                        name="radio_field_2" data-value="contact" data-index="0" value="5" name="creat_contact"
                                                        id="radio_field_2_contact"><label
                                                        class="form-check-label o_form_label"
                                                        for="radio_field_2_contact">Other Address</label></div>
                                        </div>
                                    </div>

                                    <div class="o_group row align-items-start other_address_show" style="display: none">
                                        <div class="o_inner_group grid col-lg-6">
                                             <input type="hidden" name="maincontact" id="maincontact" value="">
                                            <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                <div
                                                    class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                    <label class="o_form_label" for="name_0">Contact Name</label>
                                                </div>
                                                <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                    style="width: 100%;">
                                                    <div name="name"
                                                        class="o_field_widget o_field_field_partner_autocomplete o_required_modifier">
                                                        <input class="o_input" id="name_0" type="text"
                                                            autocomplete="off" placeholder="e.g. New Address"></div>
                                                </div>
                                            </div>
                                            <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                <div
                                                    class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                    <label class="o_form_label" for="title_0">Title</label></div>
                                                <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                    style="width: 100%;">
                                                    <div name="title" class="o_field_widget o_field_many2one">
                                                        <div class="o_field_many2one_selection">
                                                            <div class="o_input_dropdown">
                                                                <div class="o-autocomplete dropdown"><input
                                                                        type="text"
                                                                        class="o-autocomplete--input o_input"
                                                                        autocomplete="off" role="combobox"
                                                                        aria-autocomplete="list"
                                                                        aria-haspopup="listbox" id="title_0"
                                                                        placeholder="e.g. Mr."
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
                                                    <label class="o_form_label" for="function_0">Job
                                                        Position</label></div>
                                                <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                    style="width: 100%;">
                                                    <div name="function" class="o_field_widget o_field_char"><input
                                                            class="o_input" id="function_0" type="text"
                                                            autocomplete="off" placeholder="e.g. Sales Director">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="o_inner_group grid col-lg-6">
                                            <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                <div
                                                    class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                    <label class="o_form_label" for="email_0">Email</label></div>
                                                <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                    style="width: 100%;">
                                                    <div name="email" class="o_field_widget o_field_email">
                                                        <div class="d-inline-flex w-100"><input class="o_input"
                                                                type="email" autocomplete="off" id="email_0">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                <div
                                                    class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                    <label class="o_form_label" for="phone_0">Phone</label></div>
                                                <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                    style="width: 100%;">
                                                    <div name="phone" class="o_field_widget o_field_phone">
                                                        <div class="o_phone_content d-inline-flex w-100"><input
                                                                class="o_input" type="tel" autocomplete="off"
                                                                id="phone_0"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                <div
                                                    class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                    <label class="o_form_label" for="mobile_0">Mobile</label></div>
                                                <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                    style="width: 100%;">
                                                    <div name="mobile" class="o_field_widget o_field_phone">
                                                        <div class="o_phone_content d-inline-flex w-100"><input
                                                                class="o_input" type="tel" autocomplete="off"
                                                                id="mobile_0"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="o_group row align-items-start contact_show" >
                                        <div class="o_inner_group grid col-lg-6">
                                            <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                <div
                                                    class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                    <label class="o_form_label" for="name_0">Contact Name</label>
                                                </div>
                                                <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                    style="width: 100%;">
                                                    <div name="name"
                                                        class="o_field_widget o_field_field_partner_autocomplete">
                                                        <input class="o_input" id="parent_name" type="text" name="parent_name"
                                                            autocomplete="off" placeholder="e.g. New Address"></div>
                                                </div>
                                            </div>
                                            <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                <div class="o_cell flex-grow-1 flex-sm-grow-0 o_wrap_label w-100 text-break text-900"
                                                    style=""><label class="o_form_label"
                                                        for="street_0">Address</label></div>
                                                <div class="o_cell flex-grow-1 flex-sm-grow-0" style="width: 100%;">
                                                    <div>
                                                        <div class="o_address_format" name="div_address">
                                                            <div name="street"
                                                                class="o_field_widget o_field_char o_address_street">
                                                                <input class="o_input" id="parent_address_1" name="parent_address_1"
                                                                    type="text" autocomplete="off"
                                                                    placeholder="Street..." value="{{ $contact->address->address_1 ?? '' }}"> </div>
                                                            <div name="street2"
                                                                class="o_field_widget o_field_char o_address_street">
                                                                <input class="o_input" id="parent_address_2"  name="parent_address_2"
                                                                    type="text" autocomplete="off"
                                                                    placeholder="Street 2..." value="{{ $contact->address->address_2 ?? '' }}"></div>
                                                            <div name="city"
                                                                class="o_field_widget o_field_char o_address_city">
                                                                <input class="o_input" id="parent_city" name="parent_city"
                                                                    type="text" autocomplete="off"
                                                                    placeholder="City" value="{{ $contact->address->city ?? '' }}"></div>
                                                            <div name="zip"
                                                                class="o_field_widget o_field_char o_address_zip">
                                                                <input class="o_input" id="parent_zip" name="parent_zip"
                                                                    type="text" autocomplete="off"
                                                                    placeholder="ZIP" value="{{ $contact->address->zip ?? '' }}"></div>
                                                            <div name="state_id"
                                                                class="o_field_widget o_field_many2one o_address_state">
                                                                <div class="o_field_many2one_selection">
                                                                    <div class="o_input_dropdown">
                                                                        <div class="o-autocomplete dropdown">
                                                                            <input
                                                                                type="text"
                                                                                class="o-autocomplete--input o_input"
                                                                                autocomplete="off" role="combobox" name="parent_state"
                                                                                aria-autocomplete="list"
                                                                                aria-haspopup="listbox"
                                                                                id="parent_state" placeholder="State"
                                                                                aria-expanded="false"
                                                                                value="{{ $contact->address->state ?? '' }}">
                                                                        </div>
                                                                        <span class="o_dropdown_button"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="o_field_many2one_extra"></div>
                                                            </div>
                                                            <div name="country_id"
                                                                class="o_field_widget o_field_many2one o_address_country">
                                                                <div class="o_field_many2one_selection">
                                                                    <div class="o_input_dropdown">
                                                                        <div class="o-autocomplete dropdown">
                                                                            <input
                                                                                type="text"
                                                                                class="o-autocomplete--input o_input"
                                                                                autocomplete="off" role="combobox" name="parent_country"
                                                                                aria-autocomplete="list"
                                                                                aria-haspopup="listbox"
                                                                                id="parent_country"
                                                                                placeholder="Country"
                                                                                aria-expanded="false"
                                                                                value="{{ $contact->address->country ?? '' }}">
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
                                        </div>
                                        <div class="o_inner_group grid col-lg-6">
                                            <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                <div
                                                    class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                    <label class="o_form_label" for="email_0">Email</label></div>
                                                <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                    style="width: 100%;">
                                                    <div name="email" class="o_field_widget o_field_email">
                                                        <div class="d-inline-flex w-100">
                                                            <input class="o_input" name="parent_email" type="email" autocomplete="off" id="parent_email" value="{{ $contact->address ?? '' }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                <div
                                                    class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                    <label class="o_form_label" for="phone_0">Phone</label></div>
                                                <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                    style="width: 100%;">
                                                    <div name="phone" class="o_field_widget o_field_phone">
                                                        <div class="o_phone_content d-inline-flex w-100"><input
                                                                class="o_input" type="tel" autocomplete="off" name="parent_phone"
                                                                id="parent_phone"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                <div
                                                    class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                    <label class="o_form_label" for="mobile_0">Mobile</label></div>
                                                <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                    style="width: 100%;">
                                                    <div name="mobile" class="o_field_widget o_field_phone">
                                                        <div class="o_phone_content d-inline-flex w-100"><input
                                                                class="o_input" type="tel" autocomplete="off" name="parent_mobile"
                                                                id="parent_mobile"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="o_inner_group grid">
                                        <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                            <div class="o_cell flex-grow-1 flex-sm-grow-0"
                                                style="grid-column: span 2;width: 100%;">
                                                <div name="comment" class="o_field_widget o_field_html">
                                                    <div class="h-100">
                                                        <div style="display: contents;"></div>
                                                        <div style="display: contents;"></div>
                                                        <div class="oe-absolute-container">
                                                            <div class="oe-absolute-container"
                                                                data-oe-absolute-container-id="oe-selections-container">
                                                            </div>
                                                            <div class="oe-absolute-container"
                                                                data-oe-absolute-container-id="oe-avatars-container">
                                                            </div>
                                                            <div class="oe-absolute-container"
                                                                data-oe-absolute-container-id="oe-widget-hooks-container">
                                                                <div class="oe-dropzone-hook"
                                                                    style="display: block; z-index: 0; left: -21px; top: 4px; width: 25px; height: 37px;">
                                                                </div>
                                                            </div>
                                                            <div class="oe-absolute-container o_draggable"
                                                                data-oe-absolute-container-id="oe-widgets-container">
                                                            </div>
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
                                                            <div class="o_table_ui o_row_ui"
                                                                style="visibility: hidden;">
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
                                                                                class="fa fa-trash"></span>Delete
                                                                        </div>
                                                                        <div class="o_reset_table_size"><span
                                                                                class="fa fa-table"></span>Reset Size
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="o_table_ui o_column_ui"
                                                                style="visibility: hidden;">
                                                                <div>
                                                                    <span
                                                                        class="o_table_ui_menu_toggler fa fa-ellipsis-h"></span>
                                                                    <div class="o_table_ui_menu">
                                                                        <div class="o_move_left"><span
                                                                                class="fa fa-chevron-left"></span>Move
                                                                            left</div>
                                                                        <div class="o_move_right"><span
                                                                                class="fa fa-chevron-right"></span>Move
                                                                            right</div>
                                                                        <div class="o_insert_left"><span
                                                                                class="fa fa-plus"></span>Insert left
                                                                        </div>
                                                                        <div class="o_insert_right"><span
                                                                                class="fa fa-plus"></span>Insert right
                                                                        </div>
                                                                        <div class="o_delete_column"><span
                                                                                class="fa fa-trash"></span>Delete
                                                                        </div>
                                                                        <div class="o_reset_table_size"><span
                                                                                class="fa fa-table"></span>Reset Size
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="note-editable odoo-editor-editable odoo-editor-qweb"
                                                            id="comment_0" contenteditable="true" dir="ltr">
                                                            <p placeholder="Internal notes..."
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
                        </div>
                    </main>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('li.nav-item a.nav-link').on('click', function(e) {
            e.preventDefault();
            var targetId = $(this).attr('name');
            $('.o_notebook_content').hide(); // Hide all tab content divs
            $('#' + targetId).show(); // Show the selected tab content div
        });
    });
</script>
<script>
    $(document).ready(function() {
        // Trigger file input dialog when the image is clicked
        $('.o_field_widget .img').on('click', function() {
            $(this).siblings('.o_input_file').click();
        });

        // Trigger file input dialog when the edit button is clicked
        $('.o_select_file_button').on('click', function(e) {
            e.preventDefault();
            $(this).closest('.opacity-trigger-hover').find('.o_input_file').click();
        });

        $('.o-kanban-button-new').on('click', function(e) {
            e.preventDefault();
            $('#contact_and_address_add').show();
        })
        $('.contact_and_address_add_close, .o_form_button_cancel').on('click', function(e) {
            e.preventDefault();
            $('#contact_and_address_add').hide();
        });
    });

    $('input[type="radio"]').on('change', function() {
        var value = $(this).data('value');

        $('.tab-pane').removeClass('active');
        $('.form-check-input').parent().removeClass('active');
        $(this).parent().addClass('active');

        switch(value) {
            case 'contact':
                $('.contact_show').show();
                $('.other_address_show').hide();
                break;
            case 'invoice':
                $('.contact_show').show();
                $('.other_address_show').hide();

                break;
            case 'delivery':
                $('.contact_show').show();
                $('.other_address_show').hide();

                break;
            case 'followup':
                $('.contact_show').show();
                $('.other_address_show').hide();

                break;
            case 'other':
                $('.other_address_show').show();
                $('.contact_show').hide();
                break;
        }
    });

        $('#main_save_btn').click(function() {
            var contact_id = $('#contact_id').val();
            var contact_name = $('#contact_name').val();
            var address_1 = $('#address_1').val();
            var address_2 = $('#address_2').val();
            var address_city = $('#address_city').val();
            var address_zip = $('#address_zip').val();
            var address_state = $('#address_state').val();
            var country = $('#country').val();
            var gst_treatment = $('#gst_treatment').val();
            var gstin = $('#gstin').val();
            var pan_number = $('#pan_number').val();
            var phone_number = $('#phone_number').val();
            var mobile_number = $('#mobile_number').val();
            var contact_email = $('#contact_email').val();
            var contact_Website = $('#contact_Website').val();
            var contact_tages = $('#contact_tages').val();

            if(!contact_name)
            {
                toastr.error('Contact name is required');
            }

                $.ajax({
                    url: '{{ route('contact.save') }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        contact_id: contact_id,
                        contact_name: contact_name,
                        address_1 :address_1,
                        address_2 : address_2,
                        address_city : address_city,
                        address_zip : address_zip,
                        address_state : address_state,
                        country : country,
                        gst_treatment : gst_treatment,
                        gstin : gstin,
                        pan_number : pan_number,
                        phone_number : phone_number,
                        mobile_number : mobile_number,
                        contact_email : contact_email,
                        contact_Website : contact_Website,
                        contact_tages : contact_tages
                    },
                    success: function(response) {
                        $('#contact_id').val(response.contact.id);
                        toastr.success(response.message);
                        // send to show if action is create
                        if(response.action == 'create') {
                            window.location.href = '{{ route('contact.show', '') }}/' + response.contact.id;
                        }
                    }
                });
        });

        $('.save_new_contact').click(function(){
            var parent_name = $('#parent_name').val();
            var parent_address_1 = $('#parent_address_1').val();
            var parent_address_2 = $('#parent_address_2').val();
            var parent_city = $('#parent_city').val();
            var parent_zip = $('#parent_zip').val();
            var parent_state = $('#parent_state').val();
            var parent_country = $('#parent_country').val();
            var parent_email = $('#parent_email').val();
            var parent_phone = $('#parent_phone').val();
            var parent_mobile = $('#parent_mobile').val();

                if(!parent_name)
                {
                    toastr.error('Name is required');
                }


            $.ajax({
                url: '{{ route('contact.save') }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    parent_name: parent_name,
                    parent_address_1 :parent_address_1,
                    parent_address_2 : parent_address_2,
                    parent_city : parent_city,
                    parent_zip : parent_zip,
                    parent_state : parent_state,
                    parent_country : parent_country,
                    parent_email : parent_email,
                    parent_phone : parent_phone,
                    parent_mobile : parent_mobile,
                },
                success: function(response) {
                    console.log(response);
                }
            });

        });

</script>

@endpush
