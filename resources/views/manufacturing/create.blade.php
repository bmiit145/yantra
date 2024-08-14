@extends('layout.header')

@section('title', 'Manufacturing')
@section('head_title_link', route('dashboard'))
@section('image_url', asset('images/Employees.png'))
@section('head_new_btn_link', route('manufacturing.create'))
@section('head_breadcrumb_title', 'Manufacturing Orders')
@section('save_class', 'save_contacts')
@section('head')
    @vite(['resources/css/odoo/web.assets_web.css', 'resources/css/contactcreate.css'])
@endsection

@section('navbar_menu')
    <li class="dropdown">
        <a href="#">Operations</a>
        <div class="dropdown-content">
            <a href="#">Manufacturing Orders</a>
            <a href="#">Unbuild Orders</a>
            <a href="#">Scrap</a>
        </div>
    </li>

    <li class="dropdown">
        <a href="#">Products</a>
        <div class="dropdown-content">
            <a href="#">Products</a>
            <a href="#">Bills of Materials</a>
        </div>
    </li>
    <li class="dropdown">
        <a href="#">Reporting</a>
        <div class="dropdown-content">
            <a href="#">Production Analysis</a>
        </div>
    </li>
    <li class="dropdown">
        <a href="#">Configuration</a>
        <div class="dropdown-content">
            <a href="#">Settings</a>
        </div>
    </li>
@endsection

@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        .save_contacts {
            display: none;
        }
    </style>

    <body class="o_web_client">


        {{-- <div>
            <span id="oe_neutralize_banner"
                style="                         text-align: center;                         color: #FFFFFF;                         background-color: #D0442C;                         position: relative;                         display: block;                         font-size: 16px;                         ">
                Database neutralized for testing: no emails sent, etc.
            </span>
        </div> --}}

        {{-- <header class="o_navbar">
            <nav class="o_main_navbar d-print-none" data-command-category="disabled"><a href="/odoo"
                    class="o_menu_toggle hasImage" accesskey="h" title="Home menu" aria-label="Home menu"><svg
                        xmlns="http://www.w3.org/2000/svg" class="o_menu_toggle_icon pe-none" width="14px" height="14px"
                        viewBox="0 0 14 14">
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
                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGQAAABkCAYAAABw4pVUAAAACXBIWXMAABYlAAAWJQFJUiTwAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAARnSURBVHgB7ZxdaxxVGMf/Z3Z2tQnItBe+BuyNiFJB8UbvBmnUXrnfYPULmFC8EjGNvVQQv4DgJ5CCoNBI+wE09SLbi0RwA5pI3zbQpE06O3N6zkynTZMmbXdmdp+z+/8RONlJLnbmd/7Pec7sC0AIIYQQQgghhBBCCCGEEDLaKIwJwaUL6TDh92bMac+aM+8mwPz/J07+BEGMvJAXL523Q6h8zJmTDff8ubv21vQxCMLHCLIvDdDBQf8KYYycEJOI0PMjK6KZHdFwiZEQYhIRHPHjlrn4zawsuVuJnRZi06B8KyGVIa789INzQmwaJmtRM1Gq9SANbpWlw3BGiBWRLdLxrIYKRrU9FC8kK0u2Ze2F2ZHRScOjECnkQRoObVlHElFCspZV27IUIt0jyE2DPvO9HYKkEc1oeHbidM0Emve//KLQzn/oQh7dssoVEZ391g5h7PXmzFMNdz1fO4GsJTeFuNSyPpyGanf+AxWSpsGWI1OWnEpDze78vdA838rL6ECE7G5ZnUnDM3FLJ7q5pyxVTqVCXGpZ8zT0vKiplNeCNhNnCJud0oW41rL2zn5nhyY8092p4ZfR0oS41LKm7ERQ7WWFGrqSJk4hIa61rCnrV4DFy2a8mj1+4TVRKe5LiHN3WU0a0F4GlleBzS1I5omFuNayptg0rK4ZER3gTgRJ6J9DewmD3mRjBjqZVVp1EavTjxXiUsuaYtOw8k8mIi9Lgoh+PWmHMPLwqVL4BIm9pspO7QA1/eOBQpy7y3q9m0lYWhGXBksuAjU1Zy5lmHbU+y9p8JAQJ++y7l2kBZGXpWii3tIas0bC8cfN61SIiy1rukgLTcP+9eHJ73H5L7d/n0OSnHGyZRWIKU1mt4/sXS+JvZ5Pt933MxmCyRfpFdOyXt+AVPStNSQ3FpX3buMCCiD3JVzBLWuOTnbMy1JLSG6a0hndvHf0VRRBlhCbhtX/TBo6osvSfREbbcD8XiYyhAhfpHPSsrSxBL21iqoYrhAHFmnLvfUB+vY6qmbwQlxJQ4Vl6TAGJ8SmwUqwaaCIA6lWiPD7SrsZZFk6jGqEONCy5ujNTrZQD1lETvlCFtvZQu0I8fp5SMJD2dh1gvRN+UKElyjplC+EFIJChEEhwqAQYVCIMChEGBQiDAoRBoUIg0KEQSHCoBBhUIgwKEQYFCIMChEGhQiDQoRBIcKgEGFQiDAoRBgUIoyxFvJGvIlSCRoohMJfYy3kzZKFqKN1FEElYyzEfjb2850OysQ7Ueij/bqma9+MpRAr47M7/2JKb6Ms1OvPAZN9v3ddm595deq3ztgJsTLs2vHV9t8ojWMNeO8cRZ9oaH2x/tHCvH3gmYddlEmjWB2tkjwZv2z9gbKwyah9+BL6xMjAD/WPFz7ID/gJ9Gml8bVS6jjK4P23gT8vi/peqqlkG9O9a5iOruG9uIQvHzClSU0dgXplAur5Z/G0mPrUQYxzSulz9VMLF0EIIYQQQgghhBBCCCGEEDJG3AVxAwXyD85haQAAAABJRU5ErkJggg=="
                        alt="Manufacturing"><span class="o_menu_brand d-flex ms-3 pe-0">Manufacturing</span></a>
                <div class="o_menu_sections d-flex flex-grow-1 flex-shrink-1 w-0" role="menu"><button
                        class="fw-normal o-dropdown dropdown-toggle dropdown" data-hotkey="1"
                        data-menu-xmlid="mrp.menu_mrp_manufacturing" aria-expanded="false"><span
                            data-section="527">Operations</span></button><button
                        class="fw-normal o-dropdown dropdown-toggle dropdown" data-hotkey="2"
                        data-menu-xmlid="mrp.menu_mrp_bom" aria-expanded="false"><span
                            data-section="529">Products</span></button><button
                        class="fw-normal o-dropdown dropdown-toggle dropdown" data-hotkey="3"
                        data-menu-xmlid="mrp.menu_mrp_reporting" aria-expanded="false"><span
                            data-section="530">Reporting</span></button><button
                        class="fw-normal o-dropdown dropdown-toggle dropdown" data-hotkey="4"
                        data-menu-xmlid="mrp.menu_mrp_configuration" aria-expanded="false"><span
                            data-section="531">Configuration</span></button></div>
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
                                src="https://yantra-design3.odoo.com/web/image/res.partner/3/avatar_128?unique=1722989906000"><small
                                class="oe_topbar_name d-none ms-2 text-start smaller lh-1 text-truncate"
                                style="max-width: 200px">info@yantradesign.co.in<mark
                                    class="d-block font-monospace text-truncate"><i
                                        class="fa fa-database oi-small me-1"></i>yantra-design3</mark></small></button>
                    </div>
                </div>
            </nav>
        </header> --}}

        <div class="o_action_manager">
            <div class="o_xxl_form_view h-100 o_form_view o_view_controller o_action">

                <div class="o_form_view_container">

                    {{-- <div class="o_control_panel d-flex flex-column gap-3 px-3 pt-2 pb-3" data-command-category="actions">
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
                                                class="fw-bold text-truncate" href="/odoo/manufacturing"
                                                data-tooltip="Back to &quot;Manufacturing Orders&quot;">Manufacturing
                                                Orders</a></li>
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
                                    <button class="btn oe_stat_button btn-outline-secondary flex-grow-1 flex-lg-grow-0"
                                        name="792" type="action"><i class="o_button_icon fa fa-fw fa-bars"></i>
                                        <div class="o_stat_info"><span class="o_stat_text">Overview</span></div>
                                    </button></div>
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
                    </div> --}}

                    <div class="o_content">
                        <div class="o_form_renderer o_form_editable d-flex d-print-block flex-nowrap h-100">
                            <div class="o_form_sheet_bg">
                                <div
                                    class="o_form_statusbar position-relative d-flex justify-content-between mb-0 mb-md-2 pb-2 pb-md-0">
                                    <div
                                        class="o_statusbar_buttons d-flex align-items-center align-content-around flex-wrap gap-1">
                                        <button invisible="state != 'draft'" data-hotkey="q" class="btn btn-primary"
                                            name="action_confirm" type="object"><span>Confirm</span></button>
                                    </div>
                                    <div name="state" class="o_field_widget o_readonly_modifier o_field_statusbar"
                                        data-tooltip-template="web.FieldTooltip"
                                        data-tooltip-info="{&quot;debug&quot;:false,&quot;field&quot;:{&quot;name&quot;:&quot;state&quot;,&quot;label&quot;:&quot;State&quot;,&quot;help&quot;:&quot; * Draft: The MO is not confirmed yet.\n * Confirmed: The MO is confirmed, the stock rules and the reordering of the components are trigerred.\n * In Progress: The production has started (on the MO or on the WO).\n * To Close: The production is done, the MO has to be closed.\n * Done: The MO is closed, the stock moves are posted. \n * Cancelled: The MO has been cancelled, can't be confirmed anymore.&quot;,&quot;type&quot;:&quot;selection&quot;,&quot;widget&quot;:&quot;statusbar&quot;,&quot;widgetDescription&quot;:&quot;Status&quot;,&quot;context&quot;:&quot;{}&quot;,&quot;invisible&quot;:null,&quot;column_invisible&quot;:null,&quot;readonly&quot;:&quot;True&quot;,&quot;required&quot;:null,&quot;changeDefault&quot;:false,&quot;selection&quot;:[[&quot;draft&quot;,&quot;Draft&quot;],[&quot;confirmed&quot;,&quot;Confirmed&quot;],[&quot;progress&quot;,&quot;In Progress&quot;],[&quot;to_close&quot;,&quot;To Close&quot;],[&quot;done&quot;,&quot;Done&quot;],[&quot;cancel&quot;,&quot;Cancelled&quot;]]}}">
                                        <div class="o_statusbar_status" role="radiogroup"><button type="button"
                                                class="btn btn-secondary dropdown-toggle o_arrow_button o_first o-dropdown dropdown d-none"
                                                disabled="" aria-expanded="false"> ... </button><button type="button"
                                                class="btn btn-secondary o_arrow_button o_first" role="radio"
                                                disabled="" aria-label="Not active state" aria-checked="false"
                                                data-value="done">Done</button><button type="button"
                                                class="btn btn-secondary o_arrow_button" role="radio" disabled=""
                                                aria-label="Not active state" aria-checked="false"
                                                data-value="confirmed">Confirmed</button><button type="button"
                                                class="btn btn-secondary o_arrow_button o_arrow_button_current o_last"
                                                role="radio" disabled="" aria-label="Current state" aria-checked="true"
                                                aria-current="step" data-value="draft">Draft</button><button type="button"
                                                class="btn btn-secondary dropdown-toggle o_arrow_button o_last o-dropdown dropdown d-none"
                                                disabled="" aria-expanded="false"> ... </button><button type="button"
                                                class="btn btn-secondary dropdown-toggle o-dropdown dropdown d-none"
                                                disabled="" aria-expanded="false">Draft</button></div>
                                    </div>
                                </div>
                                <div class="o_form_sheet position-relative">
                                    <div class="oe_title">
                                        <h1 class="d-flex">
                                            <div name="priority" class="o_field_widget o_field_priority me-3">
                                                <div class="o_priority" role="radiogroup" name="priority"
                                                    aria-label="Priority"><a href="#"
                                                        class="o_priority_star fa fa-star-o" role="radio" tabindex="-1"
                                                        data-tooltip="Priority: Urgent" aria-label="Urgent"></a></div>
                                            </div>
                                            <div name="name" class="o_field_widget o_readonly_modifier o_field_char">
                                                <span>New</span>
                                            </div>
                                        </h1>
                                    </div>
                                    <div class="o_group row align-items-start">
                                        <div class="o_inner_group grid col-lg-6">
                                            <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                <div
                                                    class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                    <label class="o_form_label" for="product_id_0">Product</label>
                                                </div>
                                                <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                    style="width: 100%;">
                                                    <div name="product_id"
                                                        class="o_field_widget o_required_modifier o_field_many2one">
                                                        <div class="o_field_many2one_selection">
                                                            <div class="o_input_dropdown">
                                                                <div class="o-autocomplete dropdown"><input type="text"
                                                                        class="o-autocomplete--input o_input"
                                                                        autocomplete="off" role="combobox"
                                                                        aria-autocomplete="list" aria-haspopup="listbox"
                                                                        id="product_id_0"
                                                                        placeholder="Product to build..."
                                                                        aria-expanded="false"></div><span
                                                                    class="o_dropdown_button"></span>
                                                            </div>
                                                        </div>
                                                        <div class="o_field_many2one_extra"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                <div class="o_cell flex-grow-1 flex-sm-grow-0 o_wrap_label w-100 text-break text-900"
                                                    style=""><label class="o_form_label"
                                                        for="product_qty_0">Quantity</label></div>
                                                <div class="o_cell flex-grow-1 flex-sm-grow-0" style="width: 100%;">
                                                    <div class="o_row g-0 d-flex">
                                                        <div name="product_qty"
                                                            class="o_field_widget o_required_modifier o_field_float oe_inline text-start">
                                                            <input inputmode="decimal" class="o_input" autocomplete="off"
                                                                id="product_qty_0" type="text">
                                                        </div><label class="o_form_label oe_inline"
                                                            for="product_uom_id_0"></label>
                                                        <div name="product_uom_id"
                                                            class="o_field_widget o_required_modifier o_field_many2one">
                                                            <div class="o_field_many2one_selection">
                                                                <div class="o_input_dropdown">
                                                                    <div class="o-autocomplete dropdown"><input
                                                                            type="text"
                                                                            class="o-autocomplete--input o_input"
                                                                            autocomplete="off" role="combobox"
                                                                            aria-autocomplete="list"
                                                                            aria-haspopup="listbox" id="product_uom_id_0"
                                                                            placeholder="" aria-expanded="false"></div>
                                                                    <span class="o_dropdown_button"></span>
                                                                </div>
                                                            </div>
                                                            <div class="o_field_many2one_extra"></div>
                                                        </div><span class="fw-bold">To Produce</span><button
                                                            invisible="forecasted_issue" class="btn btn-secondary"
                                                            name="action_product_forecast_report" type="object"
                                                            data-tooltip="Forecast Report"><i
                                                                class="o_button_icon fa fa-fw fa-area-chart"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                <div class="o_cell flex-grow-1 flex-sm-grow-0 o_wrap_label w-100 text-break text-900"
                                                    style=""><label class="o_form_label" for="bom_id_0">Bill of
                                                        Material<sup class="text-info p-1"
                                                            data-tooltip-template="web.FieldTooltip"
                                                            data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;Bills of Materials, also called recipes, are used to autocomplete components and work order instructions.&quot;}}"
                                                            data-tooltip-touch-tap-to-show="true">?</sup></label></div>
                                                <div class="o_cell flex-grow-1 flex-sm-grow-0" style="width: 100%;">
                                                    <div class="o_row" name="bom_div">
                                                        <div name="bom_id" class="o_field_widget o_field_many2one">
                                                            <div class="o_field_many2one_selection">
                                                                <div class="o_input_dropdown">
                                                                    <div class="o-autocomplete dropdown"><input
                                                                            type="text"
                                                                            class="o-autocomplete--input o_input"
                                                                            autocomplete="off" role="combobox"
                                                                            aria-autocomplete="list"
                                                                            aria-haspopup="listbox" id="bom_id_0"
                                                                            placeholder="" aria-expanded="false"></div>
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
                                            <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                <div class="o_cell flex-grow-1 flex-sm-grow-0 o_wrap_label w-100 text-break text-900"
                                                    style=""><label class="o_form_label"
                                                        for="date_start_0">Scheduled Date<sup class="text-info p-1"
                                                            data-tooltip-template="web.FieldTooltip"
                                                            data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;Date you plan to start production or date you actually started production.&quot;}}"
                                                            data-tooltip-touch-tap-to-show="true">?</sup></label></div>
                                                <div class="o_cell flex-grow-1 flex-sm-grow-0" style="width: 100%;">
                                                    <div class="o_row">
                                                        <div name="date_start"
                                                            class="o_field_widget o_required_modifier o_field_datetime text-warning fw-bold">
                                                            <div class="d-flex gap-2 align-items-center"><input
                                                                    type="text" class="o_input cursor-pointer"
                                                                    autocomplete="off" id="date_start_0"
                                                                    data-field="date_start"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                <div
                                                    class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                    <label class="o_form_label" for="user_id_0">Responsible</label>
                                                </div>
                                                <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                                    style="width: 100%;">
                                                    <div name="user_id" class="o_field_widget o_field_many2one_avatar">
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
                                                                            aria-haspopup="listbox" id="user_id_0"
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
                                        </div>
                                    </div>
                                    <div class="o_notebook d-flex w-100 horizontal flex-column">
                                        <div class="o_notebook_headers">
                                            <ul class="nav nav-tabs flex-row flex-nowrap">
                                                <li class="nav-item flex-nowrap cursor-pointer"><a class="nav-link active"
                                                        href="#" role="tab" tabindex="0"
                                                        name="components">Components</a></li>
                                                <li class="nav-item flex-nowrap cursor-pointer"><a class="nav-link"
                                                        href="#" role="tab" tabindex="0"
                                                        name="miscellaneous">Miscellaneous</a></li>
                                            </ul>
                                        </div>
                                        <div class="o_notebook_content tab-content">
                                            <div class="tab-pane active fade show">
                                                <div name="move_raw_ids"
                                                    class="o_field_widget o_field_stock_move_one2many o_field_one2many">
                                                    <div class="o_list_view o_field_x2many o_field_x2many_list">
                                                        <div class="o_x2m_control_panel d-empty-none mb-4"></div>
                                                        <div class="o_list_renderer o_renderer table-responsive"
                                                            tabindex="-1">
                                                            <table
                                                                class="o_list_table table table-sm table-hover position-relative mb-0 o_list_table_ungrouped table-striped">
                                                                <thead>
                                                                    <tr>
                                                                        <th data-tooltip-delay="1000" tabindex="-1"
                                                                            data-name="product_id"
                                                                            class="align-middle o_column_sortable position-relative cursor-pointer opacity-trigger-hover w-print-auto"
                                                                            data-tooltip-template="web.ListHeaderTooltip"
                                                                            data-tooltip-info="{&quot;viewMode&quot;:&quot;list&quot;,&quot;resModel&quot;:&quot;stock.move&quot;,&quot;debug&quot;:false,&quot;field&quot;:{&quot;name&quot;:&quot;product_id&quot;,&quot;label&quot;:&quot;Product&quot;,&quot;type&quot;:&quot;many2one&quot;,&quot;widget&quot;:null,&quot;context&quot;:&quot;{'default_is_storable': True}&quot;,&quot;domain&quot;:&quot;['&amp;', ('type', '=', 'consu'), ('id', '!=', parent.product_id)]&quot;,&quot;invisible&quot;:null,&quot;column_invisible&quot;:null,&quot;readonly&quot;:&quot;move_lines_count > 0 or state == 'cancel' or (state != 'draft' and not additional)&quot;,&quot;required&quot;:&quot;1&quot;,&quot;changeDefault&quot;:false,&quot;relation&quot;:&quot;product.product&quot;}}">
                                                                            <div class="d-flex"><span
                                                                                    class="d-block min-w-0 text-truncate flex-grow-1">Product</span><i
                                                                                    class="fa fa-lg fa-angle-down opacity-0 opacity-75-hover"></i>
                                                                            </div><span
                                                                                class="o_resize position-absolute top-0 end-0 bottom-0 ps-1 bg-black-25 opacity-0 opacity-50-hover z-1"></span>
                                                                        </th>
                                                                        <th data-tooltip-delay="1000" tabindex="-1"
                                                                            data-name="product_uom_qty"
                                                                            class="align-middle o_column_sortable position-relative cursor-pointer o_list_number_th o_mrp_should_consume_cell opacity-trigger-hover w-print-auto"
                                                                            data-tooltip-template="web.ListHeaderTooltip"
                                                                            data-tooltip-info="{&quot;viewMode&quot;:&quot;list&quot;,&quot;resModel&quot;:&quot;stock.move&quot;,&quot;debug&quot;:false,&quot;field&quot;:{&quot;name&quot;:&quot;product_uom_qty&quot;,&quot;label&quot;:&quot;Demand&quot;,&quot;help&quot;:&quot;This is the quantity of product that is planned to be moved.Lowering this quantity does not generate a backorder.Changing this quantity on assigned moves affects the product reservation, and should be done with care.&quot;,&quot;type&quot;:&quot;float&quot;,&quot;widget&quot;:&quot;mrp_should_consume&quot;,&quot;widgetDescription&quot;:&quot;MRP Should Consume&quot;,&quot;context&quot;:&quot;{}&quot;,&quot;invisible&quot;:null,&quot;column_invisible&quot;:&quot;parent.show_produce_all&quot;,&quot;readonly&quot;:&quot;parent.state != 'draft' and ((parent.state not in ('confirmed', 'progress', 'to_close') and not parent.is_planned) or (parent.is_locked and state != 'draft'))&quot;,&quot;required&quot;:&quot;True&quot;,&quot;changeDefault&quot;:false}}">
                                                                            <div class="d-flex flex-row-reverse"><span
                                                                                    class="d-block min-w-0 text-truncate flex-grow-1 o_list_number_th">To
                                                                                    Consume</span><i
                                                                                    class="fa fa-lg fa-angle-down opacity-0 opacity-75-hover"></i>
                                                                            </div><span
                                                                                class="o_resize position-absolute top-0 end-0 bottom-0 ps-1 bg-black-25 opacity-0 opacity-50-hover z-1"></span>
                                                                        </th>
                                                                        <th class="o_list_button w-print-0 p-print-0"></th>
                                                                        <th data-tooltip-delay="1000" tabindex="-1"
                                                                            data-name="product_uom"
                                                                            class="align-middle o_column_sortable position-relative cursor-pointer opacity-trigger-hover w-print-auto"
                                                                            data-tooltip-template="web.ListHeaderTooltip"
                                                                            data-tooltip-info="{&quot;viewMode&quot;:&quot;list&quot;,&quot;resModel&quot;:&quot;stock.move&quot;,&quot;debug&quot;:false,&quot;field&quot;:{&quot;name&quot;:&quot;product_uom&quot;,&quot;label&quot;:&quot;UoM&quot;,&quot;type&quot;:&quot;many2one&quot;,&quot;widget&quot;:null,&quot;context&quot;:&quot;{}&quot;,&quot;domain&quot;:&quot;[('category_id', '=', product_uom_category_id)]&quot;,&quot;invisible&quot;:null,&quot;column_invisible&quot;:null,&quot;readonly&quot;:&quot;state != 'draft' and id&quot;,&quot;required&quot;:&quot;True&quot;,&quot;changeDefault&quot;:false,&quot;relation&quot;:&quot;uom.uom&quot;}}">
                                                                            <div class="d-flex"><span
                                                                                    class="d-block min-w-0 text-truncate flex-grow-1">UoM</span><i
                                                                                    class="fa fa-lg fa-angle-down opacity-0 opacity-75-hover"></i>
                                                                            </div><span
                                                                                class="o_resize position-absolute top-0 end-0 bottom-0 ps-1 bg-black-25 opacity-0 opacity-50-hover z-1"></span>
                                                                        </th>
                                                                        <th
                                                                            class="o_list_controller o_list_actions_header w-print-0 p-print-0 position-sticky end-0">
                                                                            <div
                                                                                class="o_optional_columns_dropdown d-print-none text-center border-top-0">
                                                                                <button
                                                                                    class="btn p-0 o-dropdown dropdown-toggle dropdown"
                                                                                    tabindex="-1"
                                                                                    aria-expanded="false"><i
                                                                                        class="o_optional_columns_dropdown_toggle oi oi-fw oi-settings-adjust"></i></button>
                                                                            </div>
                                                                        </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody class="ui-sortable">
                                                                    <tr>
                                                                        <td class="o_field_x2many_list_row_add"
                                                                            colspan="5"><a href="#"
                                                                                role="button" tabindex="0">Add a
                                                                                line</a><button
                                                                                class="btn px-4 btn-link ml16"
                                                                                name="action_add_from_catalog_raw"
                                                                                type="object"
                                                                                tabindex="0"><span>Catalog</span></button>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="5">​</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="5">​</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="5">​</td>
                                                                    </tr>
                                                                </tbody>
                                                                <tfoot class="o_list_footer cursor-default">
                                                                    <tr>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td class="w-print-auto"></td>
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
                                                    style="height: Min(2211px, 100%)"></span><span></span>
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
                                                                    src="https://yantra-design3.odoo.com/web/image/res.partner/3/avatar_128?unique=1722504084000">
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
                                                                    title="14/8/2024, 3:38:50 pm">- now</small>
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


        {{-- error popup --}}
        <div id="notification-manager" class="o_notification_manager" style="display: none;">
            <div role="alert" aria-live="assertive" aria-atomic="true"
                class="o_notification o_notification_fade d-flex mb-2 position-relative rounded shadow-lg o_notification_fade-enter-active">
                <span class="o_notification_bar bg-danger rounded-start"></span>
                <div class="w-100 py-3 ps-3 pe-5 border border-start-0 rounded-end text-break">
                    <h5 class="o_notification_title m-0">Invalid fields: </h5>
                    <button type="button" class="o_notification_close notification_close_popup btn-close position-absolute top-0 end-0 mt-3 me-3"
                        aria-label="Close"></button>
                    <div class="o_notification_body mt-2">
                        <div class="me-auto o_notification_content">
                            <ul>
                                <li>Product</li>
                                <li>Product Unit of Measure</li>
                            </ul>
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
    </body>

@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script>
        $(document).ready(function() {
            $('.head_new_btn').click(function(event) {
                event.preventDefault(); 
                $('#notification-manager').fadeIn(); 

                setTimeout(function() {
                    $('#notification-manager').fadeOut(); 
                }, 5000); 
            });

            $('.notification_close_popup').click(function() {
                $('#notification-manager').fadeOut(); 
            });
        });
    </script>


@endpush
