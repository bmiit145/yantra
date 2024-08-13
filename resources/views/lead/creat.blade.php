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
  


        <header class="o_navbar">
            <nav class="o_main_navbar d-print-none" data-command-category="disabled"><a href="/odoo"
                    class="o_menu_toggle hasImage" title="Home menu" aria-label="Home menu" data-hotkey="h"
                    style="position: relative;"><svg xmlns="http://www.w3.org/2000/svg" class="o_menu_toggle_icon pe-none"
                        width="14px" height="14px" viewBox="0 0 14 14">
                        <g xmlns="http://www.w3.org/2000/svg" fill="currentColor" id="o_menu_toggle_row_0">
                            <rect xmlns="http://www.w3.org/2000/svg" width="3" height="3" x="0" y="0"></rect>
                            <rect xmlns="http://www.w3.org/2000/svg" width="3" height="3" x="5" y="0"></rect>
                            <rect xmlns="http://www.w3.org/2000/svg" width="3" height="3" x="10" y="0"></rect>
                        </g>
                        <g xmlns="http://www.w3.org/2000/svg" fill="currentColor" id="o_menu_toggle_row_1">
                            <rect xmlns="http://www.w3.org/2000/svg" width="3" height="3" x="0" y="5"></rect>
                            <rect xmlns="http://www.w3.org/2000/svg" width="3" height="3" x="5" y="5"></rect>
                            <rect xmlns="http://www.w3.org/2000/svg" width="3" height="3" x="10" y="5"></rect>
                        </g>
                        <g xmlns="http://www.w3.org/2000/svg" fill="currentColor" id="o_menu_toggle_row_2">
                            <rect xmlns="http://www.w3.org/2000/svg" width="3" height="3" x="0" y="10"></rect>
                            <rect xmlns="http://www.w3.org/2000/svg" width="3" height="3" x="5" y="10"></rect>
                            <rect xmlns="http://www.w3.org/2000/svg" width="3" height="3" x="10" y="10"></rect>
                        </g>
                    </svg><img class="o_menu_brand_icon d-inline position-absolute start-0 h-100 ps-1 ms-2"
                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGQAAABkCAYAAABw4pVUAAAACXBIWXMAABYlAAAWJQFJUiTwAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAawSURBVHgB7d1PcBNVHMDx39skbRpKCVaEQitFrVOkSNNhdOTSpg4gY8FyYPQidrwwjAdGjv4Zi170onBixgvgzQvUmcoog7Q5+OcA04ow7ahjo0WpgDRAKWmT7PP9AqulNH/3vf2T/D6HNk03nZBvXja7m30AEEIIIYQQQgghhBBCCCGEEELKF5t/RXBoIBjwJvdxgA4GrBWAB8Hhbn0bhfbBS9A14wOnE49rTDzow4xrR3WYjezt643O/f19Qep+Or1PXNHrhggGjHHru7H05a5Znyui/I9HGWeH9vS9c9C4xmNcWHnxm/cY5x+Ki35wibkx0M8ePf0UezLlAXdgQXF/t25/qhP6R85E8Jr0PV91/lSP+HYQXGR+DIP7oqRfpdq3N4d/7B8dGE2/ZK28cHoMOG8El8gUYy63vXyJEJMVPPmY597o6AGXyCcGcuFI8eug/a3pjL0GLpFvDEN/RQL6KxPgEmL9Djs0xqEVXKDQGAY3RREDulUTX12xnVFMDINboohtlKAmvsbAwczGMLghihghMU28bg2DQ8mKYXB6FM5hWAMdvgAHkh3D4OAoYmxox7RK3XuUcx4FB4mdHFESw+DMKDy6p++tY1o0FI5pKdjplHUJxpi+OAGqOSmKWJlPcp7qxMv/7VxcNXSqlXvYgJ3vulTF8NT4wbe8GlilN/1z6kYcElemgM8kbd+ixxg6Z51v9L2dXpfft7fXziiy1xkYIbC+Dha11YPm9y64DEa5fW4cnhu6BrviFWC1+THQA8dD7IiSFM/YK59+DzLgKKje2ACLNzXmfRscMS2Rcdh19jpYZaEYSJu/4J+hLcMsxcNWrlPiv14DGXBUPPxKqKAY6dst8cPIjiY4/vxKsEKmGEhb6AZWR4n/chXMMmL4HqmGYl1ob4BIeBWolC0G0jLd0I6RUiwjBj7TzYqE65VFyRUDadn+gFVRWIaVbj5kxjCoiJJPDJQ1CLIiSsWyxVAMFTEMMqPkGwPlDIJURwm0rIBCqYxhkBGlkBgoryBIZRR8UBdtrM9/eQtiGMxEKTQGyjsIUhllSbgJqvIYKVbGMBQTpZgYiEERVG48Tp27BLfPjkPqZvyB3+FLW40Ip5l4E2DGhqGr8NKJ33IuV2wMVFQQpHqLfmY8dnd/UzyRHg3+J5bZFmKuXFHMxEBFB0FO2CFph0xRzMZApoIginKXjBjIdBBU7lFkxUBSgqAyjsK7jo+1yYiBpAVBC0WZ+WMSZu+toHVxQEgTu8dxB2BVSx14l7jmc91ZiYPhn1xu2bwfJJAaBBlRxIMfjH01IvbkZt61jtsdizetKYUwXAfonFi/eRBMkh4EdR35rDty7vcTt27eybksvqWtfTnk+ihiPTJ4J+kNx0JhMEN6kCPdvcEZ5hu6pKUaPw7MwDTjOW9TIlH4dNL7kAhiai9GQbtO8jGrefeJ+9ZYr2uwf7oSAjx3czyE+s/nQ+lDuW7mg0QjmCQ1yOHuD4Bz1mP8XG5RPF5m+h2m7BHSgaNj7hXlFCWV5KZ3ukoOsvBZWGUSJXZV7A0Hk6QG4aBlHLIlH4WxPpBAahAGetYhW8JRuJ5IvA8SSA0SBz3ns6QEo4j3MfDmRGhbFCSQekbk16OD8a61ne3i4ppsy9WIf8G6pAfO+lKQyNEFP3+LH6RzyvGQeTjo+oHLT2/5CCSRvh2S4gz36eTcGiyBkZKO8deGrQdAIunnDJ8cPTOxvbnzhlihvJBrWRePFCUxkJKTuPtHz/zwYnOYCR25lnVhFGUxkLKz6r8cHRgswShKYyCl0xyUWBTlMZDyeSdKJIolMZAlE4G4PIplMZBlM7O4NIqlMZClU+WojhJYVwfMK23TyvIYyPK5i1RGwRiVjy4FCWyJgWyZTEpVlOSVKah+djWYZFsMZNvsXiqi8JQOgZY6M+sSW2MgW6dbUxGlsmEpeGsDUATbYyDb57+THaWqeXkxQRwRAzliQkKZUaqfWQ2e6oJmZXBMDOSYGSJlRMHPd9W0Pw4FcFQM5KgpO81GqWp6GPxNyyBPjouBHDeHarFRdDE6lm5bm+87LEfGQI6c1HZOFDwcnHXrA6OsTXomR15tiXtrF1VBbo6NgaQfwpVlb9+7vZzrr4seOGdTpkPC4no+1pDS2zy1VW2c8+zLcrgu/uZOp8ZASj79LtPh7t5G8bzpYEzbLR7pVnGHg+n/8oHDMM5RiNPiGcuuOH8Kv/WIkbU7PR8xnqfCIYYTfYrbRaaTU4dioZ2On7uFEEIIIYQQQgghhBBCCCGEEFKu/gVEP1JtJ0yB2AAAAABJRU5ErkJggg=="
                        alt="CRM"><span class="o_menu_brand d-flex ms-3 pe-0">CRM</span></a>
                <div class="o_menu_sections d-flex flex-grow-1 flex-shrink-1 w-0" role="menu"><button
                        class="fw-normal o-dropdown dropdown-toggle dropdown" data-hotkey="1"
                        data-menu-xmlid="crm.crm_menu_sales" aria-expanded="false" style="position: relative;"><span
                            data-section="368">Sales</span></button><a
                        class="o-dropdown-item dropdown-item o-navigable o_nav_entry" role="menuitem" tabindex="0"
                        href="/odoo/action-521" data-hotkey="2" data-menu-xmlid="crm.crm_menu_leads" data-section="373"
                        style="position: relative;">Leads</a><button class="fw-normal o-dropdown dropdown-toggle dropdown"
                        data-hotkey="3" data-menu-xmlid="crm.crm_menu_report" aria-expanded="false"
                        style="position: relative;"><span data-section="374">Reporting</span></button><button
                        class="fw-normal o-dropdown dropdown-toggle dropdown" data-hotkey="4"
                        data-menu-xmlid="crm.crm_menu_config" aria-expanded="false" style="position: relative;"><span
                            data-section="379">Configuration</span></button></div>
                <div class="o_menu_systray d-flex flex-shrink-0 ms-auto" role="menu">
                    <div></div>
                    <div></div>
                    <div class="dropdown"></div>
                    <div></div>
                    <div></div>
                    <div class="o-mail-DiscussSystray-class"><button aria-expanded="false"
                            class="o-dropdown dropdown-toggle dropdown"><i class="fa fa-lg fa-comments" role="img"
                                aria-label="Messages"></i><span
                                class="o-mail-MessagingMenu-counter badge rounded-pill">7</span></button></div>
                    <div></div><button aria-expanded="false" class="o-dropdown dropdown-toggle dropdown"><i
                            class="fa fa-lg fa-clock-o" role="img" aria-label="Activities"></i></button>
                    <div></div>
                    <div></div>
                    <div class="o_switch_company_menu d-none d-md-block"><button data-hotkey="shift+u" disabled=""
                            title="Yantra Design" aria-expanded="false" class="o-dropdown dropdown-toggle dropdown"><i
                                class="fa fa-building d-lg-none"></i><span
                                class="oe_topbar_name d-none d-lg-block text-truncate">Yantra Design</span></button></div>
                    <div></div>
                    <div class="d-flex" xml:space="preserve"><button
                            class="o_mobile_menu_toggle o_nav_entry o-no-caret d-md-none border-0 pe-3"
                            title="Toggle menu" aria-label="Toggle menu"><i class="oi oi-panel-right"></i></button></div>
                    <div></div>
                    <div class="o_user_menu d-none d-md-block pe-0"><button
                            class="py-1 py-lg-0 o-dropdown dropdown-toggle dropdown" aria-expanded="false"><img
                                class="o_avatar o_user_avatar rounded" alt="User"
                                src="https://yantra-design2.odoo.com/web/image/res.partner/3/avatar_128?unique=1722989906000"><small
                                class="oe_topbar_name d-none ms-2 text-start smaller lh-1 text-truncate"
                                style="max-width: 200px">info@yantradesign.co.in<mark
                                    class="d-block font-monospace text-truncate"><i
                                        class="fa fa-database oi-small me-1"></i>yantra-design2</mark></small></button>
                    </div>
                </div>
            </nav>
        </header>
        <div class="o_action_manager">
            <div
                class="o_xxl_form_view h-100 o_form_view o_crm_form_view o_lead_opportunity_form o_view_controller o_action">
                <div class="o_form_view_container">
                    <div class="o_control_panel d-flex flex-column gap-3 px-3 pt-2 pb-3" data-command-category="actions">
                        <div
                            class="o_control_panel_main d-flex flex-wrap flex-lg-nowrap justify-content-between align-items-lg-start gap-3 flex-grow-1">
                            <div class="o_control_panel_breadcrumbs d-flex align-items-center gap-1 order-0 h-lg-100">
                                <div class="o_control_panel_main_buttons d-flex gap-1 d-empty-none d-print-none">
                                    <div class="d-inline-flex gap-1"><button type="button"
                                            class="btn btn-outline-primary o_form_button_create"
                                            data-hotkey="c">New</button></div>
                                </div>
                                <div
                                    class="o_breadcrumb d-flex flex-row flex-md-column align-self-stretch justify-content-between min-w-0">
                                    <ol class="breadcrumb flex-nowrap text-nowrap lh-sm">
                                        <li class="breadcrumb-item d-inline-flex min-w-0 o_back_button" data-hotkey="b"><a
                                                class="fw-bold text-truncate" href="/odoo/action-521"
                                                data-tooltip="Back to &quot;Leads&quot;">Leads</a></li>
                                    </ol>
                                    <div class="d-flex gap-1 text-truncate">
                                        <div
                                            class="o_last_breadcrumb_item active d-flex gap-2 align-items-center min-w-0 lh-sm">
                                            <span class="min-w-0 text-truncate">New</span></div>
                                        <div class="o_control_panel_breadcrumbs_actions d-inline-flex d-print-none">
                                            <div class="o_cp_action_menus d-flex align-items-center pe-2 gap-1">
                                                <div class="lh-1"><button
                                                        class="d-print-none btn p-0 ms-1 lh-sm border-0 o-dropdown dropdown-toggle dropdown"
                                                        data-hotkey="u" data-tooltip="Actions" aria-expanded="false"><i
                                                            class="fa fa-cog"></i></button></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="o_form_status_indicator d-md-flex align-items-center align-self-md-end me-auto o_form_status_indicator_new_record">
                                    <div class="o_form_status_indicator_buttons d-flex"><button type="button"
                                            class="o_form_button_save btn btn-light px-1 py-0 lh-sm" data-hotkey="s"
                                            data-tooltip="Save manually" aria-label="Save manually"><i
                                                class="fa fa-cloud-upload fa-fw"></i></button><button type="button"
                                            class="o_form_button_cancel btn btn-light px-1 py-0 lh-sm" data-hotkey="j"
                                            data-tooltip="Discard all changes" aria-label="Discard all changes"><i
                                                class="fa fa-times fa-fw"></i></button></div>
                                </div>
                                <div class="me-auto"></div>
                            </div>
                            <div
                                class="o_control_panel_actions d-empty-none d-flex align-items-center justify-content-start justify-content-lg-around order-2 order-lg-1 w-100 w-lg-auto">
                                <div class="o-form-buttonbox d-print-none position-relative d-flex w-md-auto o_not_full">
                                </div>
                            </div>
                            <div
                                class="o_control_panel_navigation d-flex flex-wrap flex-md-nowrap justify-content-end gap-1 gap-xl-3 order-1 order-lg-2 flex-grow-1">
                                <button class="o_knowledge_icon_search btn opacity-trigger-hover" type="button"
                                    title="Search Knowledge Articles"><svg xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 50 50" class="o_ui_app_icon oi-large">
                                        <path fill="var(--oi-color, #1AD3BB)"
                                            d="M21 0c-2 0-4 2-4 3.99V12h18v20.071l5.428 3.748A1 1 0 0 0 42 35.001V0H21Z"
                                            class="opacity-50 opacity-100-hover"></path>
                                        <path fill="var(--oi-color, #985184)"
                                            d="M8 17.99C8 16 10 14 12 14h21v35a1 1 0 0 1-1.572.82L23 44c-1.5-1-3.5-1-5 0l-8.428 5.82A1 1 0 0 1 8 49V17.99Z">
                                        </path>
                                        <path fill="var(--oi-color, #005E7A)"
                                            d="M33 30.658 32 30c-1.5-1-3.5-1-5 0l-8.428 5.82A1 1 0 0 1 17 35V14h16v16.658Z">
                                        </path>
                                    </svg></button></div>
                        </div>
                    </div>
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
                                            data-tooltip="Mark as lost"><span>Lost</span></button></div>
                                </div>
                                <div class="o_form_sheet position-relative">
                                    <div class="oe_title">
                                        <h1>
                                            <div name="name"
                                                class="o_field_widget o_required_modifier o_field_text text-break">
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
                                                            id="probability_0" type="text"></div><span
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
                                                    <label class="o_form_label" for="partner_name_0">Company Name<sup
                                                            class="text-info p-1" data-tooltip-template="web.FieldTooltip"
                                                            data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;The name of the future partner company that will be created while converting the lead into opportunity&quot;}}"
                                                            data-tooltip-touch-tap-to-show="true">?</sup></label></div>
                                                <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                    style="width: 100%;">
                                                    <div name="partner_name" class="o_field_widget o_field_char"><input
                                                            class="o_input" id="partner_name_0" type="text"
                                                            autocomplete="off"></div>
                                                </div>
                                            </div>
                                            <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                <div class="o_cell flex-grow-1 flex-sm-grow-0 o_wrap_label w-100 text-break text-900"
                                                    style=""><label class="o_form_label"
                                                        for="street_0">Address</label></div>
                                                <div class="o_cell flex-grow-1 flex-sm-grow-0" style="width: 100%;">
                                                    <div class="o_address_format">
                                                        <div name="street"
                                                            class="o_field_widget o_field_char o_address_street"><input
                                                                class="o_input" id="street_0" type="text"
                                                                autocomplete="off" placeholder="Street..."></div>
                                                        <div name="street2"
                                                            class="o_field_widget o_field_char o_address_street"><input
                                                                class="o_input" id="street2_0" type="text"
                                                                autocomplete="off" placeholder="Street 2..."></div>
                                                        <div name="city"
                                                            class="o_field_widget o_field_char o_address_city"><input
                                                                class="o_input" id="city_0" type="text"
                                                                autocomplete="off" placeholder="City"></div>
                                                        <div name="zip"
                                                            class="o_field_widget o_field_char o_address_zip"><input
                                                                class="o_input" id="zip_0" type="text"
                                                                autocomplete="off" placeholder="ZIP"></div>
                                                        <div name="state_id"
                                                            class="o_field_widget o_field_many2one o_address_state">
                                                            <div class="o_field_many2one_selection">
                                                                <div class="o_input_dropdown">
                                                                    <div class="o-autocomplete dropdown"><input
                                                                            type="text"
                                                                            class="o-autocomplete--input o_input"
                                                                            autocomplete="off" role="combobox"
                                                                            aria-autocomplete="list"
                                                                            aria-haspopup="listbox" id="state_id_0"
                                                                            placeholder="State" aria-expanded="false">
                                                                    </div><span class="o_dropdown_button"></span>
                                                                </div>
                                                            </div>
                                                            <div class="o_field_many2one_extra"></div>
                                                        </div>
                                                        <div name="country_id"
                                                            class="o_field_widget o_field_many2one o_address_country">
                                                            <div class="o_field_many2one_selection">
                                                                <div class="o_input_dropdown">
                                                                    <div class="o-autocomplete dropdown"><input
                                                                            type="text"
                                                                            class="o-autocomplete--input o_input"
                                                                            autocomplete="off" role="combobox"
                                                                            aria-autocomplete="list"
                                                                            aria-haspopup="listbox" id="country_id_0"
                                                                            placeholder="Country" aria-expanded="false">
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
                                                            data-tooltip-touch-tap-to-show="true">?</sup></label></div>
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
                                                    style=""><label class="o_form_label"
                                                        for="contact_name_0">Contact Name</label></div>
                                                <div class="o_cell flex-grow-1 flex-sm-grow-0" style="width: 100%;">
                                                    <div class="o_row">
                                                        <div name="contact_name" class="o_field_widget o_field_char">
                                                            <input class="o_input" id="contact_name_0" type="text"
                                                                autocomplete="off"></div>
                                                        <div name="title" class="o_field_widget o_field_many2one">
                                                            <div class="o_field_many2one_selection">
                                                                <div class="o_input_dropdown">
                                                                    <div class="o-autocomplete dropdown"><input
                                                                            type="text"
                                                                            class="o-autocomplete--input o_input"
                                                                            autocomplete="off" role="combobox"
                                                                            aria-autocomplete="list"
                                                                            aria-haspopup="listbox" id="title_0"
                                                                            placeholder="Title" aria-expanded="false">
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
                                                    <label class="o_form_label" for="user_id_1">Salesperson</label></div>
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
                                                                    <div class="o-autocomplete dropdown"><input
                                                                            type="text"
                                                                            class="o-autocomplete--input o_input"
                                                                            autocomplete="off" role="combobox"
                                                                            aria-autocomplete="list"
                                                                            aria-haspopup="listbox" id="user_id_1"
                                                                            placeholder="" aria-expanded="false"></div>
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
                                                    <label class="o_form_label" for="team_id_0">Sales Team</label></div>
                                                <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                    style="width: 100%;">
                                                    <div name="team_id" class="o_field_widget o_field_many2one">
                                                        <div class="o_field_many2one_selection">
                                                            <div class="o_input_dropdown">
                                                                <div class="o-autocomplete dropdown"><input type="text"
                                                                        class="o-autocomplete--input o_input"
                                                                        autocomplete="off" role="combobox"
                                                                        aria-autocomplete="list" aria-haspopup="listbox"
                                                                        id="team_id_0" placeholder=""
                                                                        aria-expanded="false"></div><span
                                                                    class="o_dropdown_button"></span>
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
                                                    <label class="o_form_label" for="priority_1">Priority</label></div>
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
                                                            data-tooltip-touch-tap-to-show="true">?</sup></label></div>
                                                <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                    style="width: 100%;">
                                                    <div name="tag_ids" class="o_field_widget o_field_many2many_tags">
                                                        <div
                                                            class="o_field_tags d-inline-flex flex-wrap gap-1 mw-100 o_tags_input o_input">
                                                            <div class="o_field_many2many_selection d-inline-flex w-100">
                                                                <div class="o_input_dropdown">
                                                                    <div class="o-autocomplete dropdown"><input
                                                                            type="text"
                                                                            class="o-autocomplete--input o_input"
                                                                            autocomplete="off" role="combobox"
                                                                            aria-autocomplete="list"
                                                                            aria-haspopup="listbox" id="tag_ids_1"
                                                                            placeholder="" aria-expanded="false"></div>
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
                                                <div class="o_inner_group o_group col-lg-6 o_property_group"
                                                    property-name=""></div>
                                                <div class="o_inner_group o_group col-lg-6 o_property_group"
                                                    property-name=""></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="o_notebook d-flex w-100 horizontal flex-column">
                                        <div class="o_notebook_headers">
                                            <ul class="nav nav-tabs flex-row flex-nowrap">
                                                <li class="nav-item flex-nowrap cursor-pointer"><a class="nav-link"
                                                        href="#" role="tab" tabindex="0"
                                                        name="internal_notes">Internal Notes</a></li>
                                                <li class="nav-item flex-nowrap cursor-pointer"><a class="nav-link active"
                                                        href="#" role="tab" tabindex="0"
                                                        name="extra">Extra Info</a></li>
                                            </ul>
                                        </div>
                                        <div class="o_notebook_content tab-content">
                                            <div class="tab-pane active fade show">
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
                                                                <label class="o_form_label"
                                                                    for="campaign_id_0">Campaign<sup class="text-info p-1"
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
                                                                <label class="o_form_label" for="medium_id_0">Medium<sup
                                                                        class="text-info p-1"
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
                                                                <label class="o_form_label" for="source_id_0">Source<sup
                                                                        class="text-info p-1"
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
                                                        <div
                                                            class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                            <div
                                                                class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                <label class="o_form_label" for="referred_0">Referred
                                                                    By</label></div>
                                                            <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                                style="width: 100%;">
                                                                <div name="referred" class="o_field_widget o_field_char">
                                                                    <input class="o_input" id="referred_0" type="text"
                                                                        autocomplete="off"></div>
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
                                                                    for="date_open_0">Assignment Date</label></div>
                                                            <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                                style="width: 100%;">
                                                                <div name="date_open"
                                                                    class="o_field_widget o_readonly_modifier o_field_datetime">
                                                                    <div class="d-flex gap-2 align-items-center"><span
                                                                            class="text-truncate">13/08/2024
                                                                            14:12:28</span></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                            <div
                                                                class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                                <label class="o_form_label o_form_label_readonly"
                                                                    for="date_closed_0">Closed Date</label></div>
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
                                        <div
                                            class="o-mail-Chatter-topbar d-flex flex-shrink-0 flex-grow-0 overflow-x-auto">
                                            <button
                                                class="o-mail-Chatter-sendMessage btn text-nowrap me-1 btn-primary my-2"
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
                                                    <div
                                                        class="o-mail-Message-core position-relative d-flex flex-shrink-0">
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
                                                                    title="13/8/2024, 2:12:31 pm">- now</small></div>
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
                                                                                    title="Mark as Todo"
                                                                                    name="toggle-star"><i
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
