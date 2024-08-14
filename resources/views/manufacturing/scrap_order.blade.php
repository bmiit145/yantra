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



        {{-- <header class="o_navbar">
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
                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGQAAABkCAYAAABw4pVUAAAACXBIWXMAABYlAAAWJQFJUiTwAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAARnSURBVHgB7ZxdaxxVGMf/Z3Z2tQnItBe+BuyNiFJB8UbvBmnUXrnfYPULmFC8EjGNvVQQv4DgJ5CCoNBI+wE09SLbi0RwA5pI3zbQpE06O3N6zkynTZMmbXdmdp+z+/8RONlJLnbmd/7Pec7sC0AIIYQQQgghhBBCCCGEEDLaKIwJwaUL6TDh92bMac+aM+8mwPz/J07+BEGMvJAXL523Q6h8zJmTDff8ubv21vQxCMLHCLIvDdDBQf8KYYycEJOI0PMjK6KZHdFwiZEQYhIRHPHjlrn4zawsuVuJnRZi06B8KyGVIa789INzQmwaJmtRM1Gq9SANbpWlw3BGiBWRLdLxrIYKRrU9FC8kK0u2Ze2F2ZHRScOjECnkQRoObVlHElFCspZV27IUIt0jyE2DPvO9HYKkEc1oeHbidM0Emve//KLQzn/oQh7dssoVEZ391g5h7PXmzFMNdz1fO4GsJTeFuNSyPpyGanf+AxWSpsGWI1OWnEpDze78vdA838rL6ECE7G5ZnUnDM3FLJ7q5pyxVTqVCXGpZ8zT0vKiplNeCNhNnCJud0oW41rL2zn5nhyY8092p4ZfR0oS41LKm7ERQ7WWFGrqSJk4hIa61rCnrV4DFy2a8mj1+4TVRKe5LiHN3WU0a0F4GlleBzS1I5omFuNayptg0rK4ZER3gTgRJ6J9DewmD3mRjBjqZVVp1EavTjxXiUsuaYtOw8k8mIi9Lgoh+PWmHMPLwqVL4BIm9pspO7QA1/eOBQpy7y3q9m0lYWhGXBksuAjU1Zy5lmHbU+y9p8JAQJ++y7l2kBZGXpWii3tIas0bC8cfN61SIiy1rukgLTcP+9eHJ73H5L7d/n0OSnHGyZRWIKU1mt4/sXS+JvZ5Pt933MxmCyRfpFdOyXt+AVPStNSQ3FpX3buMCCiD3JVzBLWuOTnbMy1JLSG6a0hndvHf0VRRBlhCbhtX/TBo6osvSfREbbcD8XiYyhAhfpHPSsrSxBL21iqoYrhAHFmnLvfUB+vY6qmbwQlxJQ4Vl6TAGJ8SmwUqwaaCIA6lWiPD7SrsZZFk6jGqEONCy5ujNTrZQD1lETvlCFtvZQu0I8fp5SMJD2dh1gvRN+UKElyjplC+EFIJChEEhwqAQYVCIMChEGBQiDAoRBoUIg0KEQSHCoBBhUIgwKEQYFCIMChEGhQiDQoRBIcKgEGFQiDAoRBgUIoyxFvJGvIlSCRoohMJfYy3kzZKFqKN1FEElYyzEfjb2850OysQ7Ueij/bqma9+MpRAr47M7/2JKb6Ms1OvPAZN9v3ddm595deq3ztgJsTLs2vHV9t8ojWMNeO8cRZ9oaH2x/tHCvH3gmYddlEmjWB2tkjwZv2z9gbKwyah9+BL6xMjAD/WPFz7ID/gJ9Gml8bVS6jjK4P23gT8vi/peqqlkG9O9a5iOruG9uIQvHzClSU0dgXplAur5Z/G0mPrUQYxzSulz9VMLF0EIIYQQQgghhBBCCCGEEDJG3AVxAwXyD85haQAAAABJRU5ErkJggg=="
                        alt="Manufacturing"><span class="o_menu_brand d-flex ms-3 pe-0">Manufacturing</span></a>
                <div class="o_menu_sections d-flex flex-grow-1 flex-shrink-1 w-0" role="menu"><button
                        class="fw-normal o-dropdown dropdown-toggle dropdown" data-hotkey="1"
                        data-menu-xmlid="mrp.menu_mrp_manufacturing" aria-expanded="false" style="position: relative;"><span
                            data-section="527">Operations</span></button><button
                        class="fw-normal o-dropdown dropdown-toggle dropdown" data-hotkey="2"
                        data-menu-xmlid="mrp.menu_mrp_bom" aria-expanded="false" style="position: relative;"><span
                            data-section="529">Products</span></button><button
                        class="fw-normal o-dropdown dropdown-toggle dropdown" data-hotkey="3"
                        data-menu-xmlid="mrp.menu_mrp_reporting" aria-expanded="false" style="position: relative;"><span
                            data-section="530">Reporting</span></button><button
                        class="fw-normal o-dropdown dropdown-toggle dropdown" data-hotkey="4"
                        data-menu-xmlid="mrp.menu_mrp_configuration" aria-expanded="false"
                        style="position: relative;"><span data-section="531">Configuration</span></button></div>
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
        </header> --}}

        <div class="o_action_manager">
            <div class="o_list_view o_view_controller o_action">

                {{-- <div class="o_control_panel d-flex flex-column gap-3 px-3 pt-2 pb-3" data-command-category="actions">
                    <div
                        class="o_control_panel_main d-flex flex-wrap flex-lg-nowrap justify-content-between align-items-lg-start gap-3 flex-grow-1">
                        <div class="o_control_panel_breadcrumbs d-flex align-items-center gap-1 order-0 h-lg-100">
                            <div class="o_control_panel_main_buttons d-flex gap-1 d-empty-none d-print-none">
                                <div class="d-inline-flex gap-1"><button type="button"
                                        class="btn btn-primary o_list_button_add" data-hotkey="c" data-bounce-button=""
                                        style="position: relative;"> New </button>
                                    <div class="o_list_buttons d-flex gap-1 d-empty-none align-items-baseline"
                                        role="toolbar" aria-label="Main actions"></div>
                                </div>
                            </div>
                            <div class="o_breadcrumb d-flex gap-1 text-truncate">
                                <div class="o_last_breadcrumb_item active d-flex fs-4 min-w-0 align-items-center"><span
                                        class="min-w-0 text-truncate">Scrap Orders</span></div>
                                <div class="o_control_panel_breadcrumbs_actions d-inline-flex d-print-none">
                                    <div class="o_cp_action_menus d-flex align-items-center pe-2 gap-1">
                                        <div class="lh-1"><button
                                                class="d-print-none btn p-0 ms-1 lh-sm border-0 o-dropdown dropdown-toggle dropdown"
                                                data-hotkey="u" data-tooltip="Actions" aria-expanded="false"
                                                style="position: relative;"><i class="fa fa-cog"></i></button></div>
                                    </div>
                                </div>
                            </div>
                            <div class="me-auto"></div>
                        </div>
                        <div
                            class="o_control_panel_actions d-empty-none d-flex align-items-center justify-content-start justify-content-lg-around order-2 order-lg-1 w-100 w-lg-auto">
                            <div class="o_cp_searchview d-flex input-group" role="search">
                                <div class="o_searchview form-control d-print-contents d-flex align-items-center py-1 border-end-0"
                                    role="search" aria-autocomplete="list"><button class="d-print-none btn border-0 p-0"
                                        role="button" aria-label="Search..." title="Search..."><i
                                            class="o_searchview_icon oi oi-search me-2" role="img"></i></button>
                                    <div class="o_searchview_input_container d-flex flex-grow-1 flex-wrap gap-1"
                                        style="position: relative;"><input type="text"
                                            class="o_searchview_input o_input d-print-none flex-grow-1 w-auto border-0"
                                            placeholder="Search..." role="searchbox" data-hotkey="Q"></div>
                                </div><button
                                    class="o_searchview_dropdown_toggler d-print-none btn btn-outline-secondary o-dropdown-caret rounded-start-0 o-dropdown dropdown-toggle dropdown"
                                    data-hotkey="shift+q" title="Toggle Search Panel" aria-expanded="false"
                                    style="position: relative;"></button>
                            </div>
                        </div>
                        <div
                            class="o_control_panel_navigation d-flex flex-wrap flex-md-nowrap justify-content-end gap-1 gap-xl-3 order-1 order-lg-2 flex-grow-1">
                            <div class="o_cp_pager text-nowrap " role="search">
                                <nav class="o_pager d-flex gap-2 h-100" aria-label="Pager"><span
                                        class="o_pager_counter align-self-center"><span
                                            class="o_pager_value d-inline-block border-bottom border-transparent mb-n1">1-10</span><span>
                                            / </span><span class="o_pager_limit">10</span></span><span
                                        class="btn-group d-print-none" aria-atomic="true"><button type="button"
                                            class="oi oi-chevron-left btn btn-secondary o_pager_previous px-2 rounded-start"
                                            aria-label="Previous" data-tooltip="Previous" tabindex="-1" data-hotkey="p"
                                            disabled=""></button><button type="button"
                                            class="oi oi-chevron-right btn btn-secondary o_pager_next px-2 rounded-end"
                                            aria-label="Next" data-tooltip="Next" tabindex="-1" data-hotkey="n"
                                            disabled=""></button></span></nav>
                            </div>
                            <nav class="o_cp_switch_buttons d-print-none d-inline-flex btn-group"
                                style="position: relative;"><button class="btn btn-secondary o_switch_view o_list active"
                                    data-tooltip="List"><i class="oi oi-view-list"></i></button><button
                                    class="btn btn-secondary o_switch_view o_kanban" data-tooltip="Kanban"><i
                                        class="oi oi-view-kanban"></i></button><button
                                    class="btn btn-secondary o_switch_view o_pivot" data-tooltip="Pivot"><i
                                        class="oi oi-view-pivot"></i></button><button
                                    class="btn btn-secondary o_switch_view o_graph" data-tooltip="Graph"><i
                                        class="fa fa-area-chart"></i></button></nav>
                        </div>
                    </div>
                </div> --}}
                
                <div class="o_content o_view_sample_data">
                    <div class="o_list_renderer o_renderer table-responsive" tabindex="-1">
                        <div class="o_view_nocontent">
                            <div class="o_nocontent_help">
                                <p class="o_view_nocontent_smiling_face">
                                    Scrap products
                                </p>
                                <p>
                                    Scrapping a product will remove it from your stock. The product will
                                    end up in a scrap location that can be used for reporting purpose.
                                </p>
                            </div>
                        </div>
                        <table
                            class="o_list_table table table-sm table-hover position-relative mb-0 o_list_table_ungrouped table-striped"
                            style="table-layout: fixed;">
                            <thead>
                                <tr>
                                    <th class="o_list_record_selector o_list_controller align-middle pe-1 cursor-pointer"
                                        tabindex="-1" style="width: 40px;">
                                        <div class="o-checkbox form-check d-flex m-0"><input type="checkbox"
                                                class="form-check-input" id="checkbox-comp-12" disabled=""><label
                                                class="form-check-label" for="checkbox-comp-12"></label></div>
                                    </th>
                                    <th data-tooltip-delay="1000" tabindex="-1" data-name="name"
                                        class="align-middle o_column_sortable position-relative cursor-pointer opacity-trigger-hover w-print-auto"
                                        data-tooltip-template="web.ListHeaderTooltip"
                                        data-tooltip-info="{&quot;viewMode&quot;:&quot;list&quot;,&quot;resModel&quot;:&quot;stock.scrap&quot;,&quot;debug&quot;:false,&quot;field&quot;:{&quot;name&quot;:&quot;name&quot;,&quot;label&quot;:&quot;Reference&quot;,&quot;type&quot;:&quot;char&quot;,&quot;widget&quot;:null,&quot;context&quot;:&quot;{}&quot;,&quot;invisible&quot;:null,&quot;column_invisible&quot;:null,&quot;readonly&quot;:&quot;True&quot;,&quot;required&quot;:&quot;True&quot;,&quot;changeDefault&quot;:false}}"
                                        style="width: 442px;">
                                        <div class="d-flex"><span
                                                class="d-block min-w-0 text-truncate flex-grow-1">Reference</span><i
                                                class="fa fa-lg fa-angle-down opacity-0 opacity-75-hover"></i></div><span
                                            class="o_resize position-absolute top-0 end-0 bottom-0 ps-1 bg-black-25 opacity-0 opacity-50-hover z-1"></span>
                                    </th>
                                    <th data-tooltip-delay="1000" tabindex="-1" data-name="date_done"
                                        class="align-middle o_column_sortable position-relative cursor-pointer opacity-trigger-hover w-print-auto"
                                        data-tooltip-template="web.ListHeaderTooltip"
                                        data-tooltip-info="{&quot;viewMode&quot;:&quot;list&quot;,&quot;resModel&quot;:&quot;stock.scrap&quot;,&quot;debug&quot;:false,&quot;field&quot;:{&quot;name&quot;:&quot;date_done&quot;,&quot;label&quot;:&quot;Date&quot;,&quot;type&quot;:&quot;datetime&quot;,&quot;widget&quot;:null,&quot;context&quot;:&quot;{}&quot;,&quot;invisible&quot;:null,&quot;column_invisible&quot;:null,&quot;readonly&quot;:&quot;True&quot;,&quot;required&quot;:null,&quot;changeDefault&quot;:false}}"
                                        style="width: 145px;">
                                        <div class="d-flex"><span
                                                class="d-block min-w-0 text-truncate flex-grow-1">Date</span><i
                                                class="fa fa-lg fa-angle-down opacity-0 opacity-75-hover"></i></div><span
                                            class="o_resize position-absolute top-0 end-0 bottom-0 ps-1 bg-black-25 opacity-0 opacity-50-hover z-1"></span>
                                    </th>
                                    <th data-tooltip-delay="1000" tabindex="-1" data-name="product_id"
                                        class="align-middle o_column_sortable position-relative cursor-pointer opacity-trigger-hover w-print-auto"
                                        data-tooltip-template="web.ListHeaderTooltip"
                                        data-tooltip-info="{&quot;viewMode&quot;:&quot;list&quot;,&quot;resModel&quot;:&quot;stock.scrap&quot;,&quot;debug&quot;:false,&quot;field&quot;:{&quot;name&quot;:&quot;product_id&quot;,&quot;label&quot;:&quot;Product&quot;,&quot;type&quot;:&quot;many2one&quot;,&quot;widget&quot;:null,&quot;context&quot;:&quot;{}&quot;,&quot;domain&quot;:&quot;(company_id and ['|', ('company_id', '=', False), ('company_id', 'parent_of', [company_id])] or ['|', ('company_id', '=', False), ('company_id', 'parent_of', [''])]) + ([('type', '=', 'consu')])&quot;,&quot;invisible&quot;:null,&quot;column_invisible&quot;:null,&quot;readonly&quot;:&quot;1&quot;,&quot;required&quot;:&quot;True&quot;,&quot;changeDefault&quot;:false,&quot;relation&quot;:&quot;product.product&quot;}}"
                                        style="width: 442px;">
                                        <div class="d-flex"><span
                                                class="d-block min-w-0 text-truncate flex-grow-1">Product</span><i
                                                class="fa fa-lg fa-angle-down opacity-0 opacity-75-hover"></i></div><span
                                            class="o_resize position-absolute top-0 end-0 bottom-0 ps-1 bg-black-25 opacity-0 opacity-50-hover z-1"></span>
                                    </th>
                                    <th data-tooltip-delay="1000" tabindex="-1" data-name="scrap_qty"
                                        class="align-middle o_column_sortable position-relative cursor-pointer o_list_number_th opacity-trigger-hover w-print-auto"
                                        data-tooltip-template="web.ListHeaderTooltip"
                                        data-tooltip-info="{&quot;viewMode&quot;:&quot;list&quot;,&quot;resModel&quot;:&quot;stock.scrap&quot;,&quot;debug&quot;:false,&quot;field&quot;:{&quot;name&quot;:&quot;scrap_qty&quot;,&quot;label&quot;:&quot;Quantity&quot;,&quot;type&quot;:&quot;float&quot;,&quot;widget&quot;:null,&quot;context&quot;:&quot;{}&quot;,&quot;invisible&quot;:null,&quot;column_invisible&quot;:null,&quot;readonly&quot;:&quot;state == 'done'&quot;,&quot;required&quot;:&quot;True&quot;,&quot;changeDefault&quot;:false}}"
                                        style="width: 145px;">
                                        <div class="d-flex flex-row-reverse"><span
                                                class="d-block min-w-0 text-truncate flex-grow-1 o_list_number_th">Quantity</span><i
                                                class="fa fa-lg fa-angle-down opacity-0 opacity-75-hover"></i></div><span
                                            class="o_resize position-absolute top-0 end-0 bottom-0 ps-1 bg-black-25 opacity-0 opacity-50-hover z-1"></span>
                                    </th>
                                    <th data-tooltip-delay="1000" tabindex="-1" data-name="product_uom_id"
                                        class="align-middle o_column_sortable position-relative cursor-pointer opacity-trigger-hover w-print-auto"
                                        data-tooltip-template="web.ListHeaderTooltip"
                                        data-tooltip-info="{&quot;viewMode&quot;:&quot;list&quot;,&quot;resModel&quot;:&quot;stock.scrap&quot;,&quot;debug&quot;:false,&quot;field&quot;:{&quot;name&quot;:&quot;product_uom_id&quot;,&quot;label&quot;:&quot;Unit of Measure&quot;,&quot;type&quot;:&quot;many2one&quot;,&quot;widget&quot;:null,&quot;context&quot;:&quot;{}&quot;,&quot;domain&quot;:&quot;[('category_id', '=', product_uom_category_id)]&quot;,&quot;invisible&quot;:null,&quot;column_invisible&quot;:null,&quot;readonly&quot;:&quot;state == 'done'&quot;,&quot;required&quot;:&quot;True&quot;,&quot;changeDefault&quot;:false,&quot;relation&quot;:&quot;uom.uom&quot;}}"
                                        style="width: 442px;">
                                        <div class="d-flex"><span class="d-block min-w-0 text-truncate flex-grow-1">Unit
                                                of Measure</span><i
                                                class="fa fa-lg fa-angle-down opacity-0 opacity-75-hover"></i></div><span
                                            class="o_resize position-absolute top-0 end-0 bottom-0 ps-1 bg-black-25 opacity-0 opacity-50-hover z-1"></span>
                                    </th>
                                    <th data-tooltip-delay="1000" tabindex="-1" data-name="state"
                                        class="align-middle o_column_sortable position-relative cursor-pointer o_badge_cell opacity-trigger-hover w-print-auto"
                                        data-tooltip-template="web.ListHeaderTooltip"
                                        data-tooltip-info="{&quot;viewMode&quot;:&quot;list&quot;,&quot;resModel&quot;:&quot;stock.scrap&quot;,&quot;debug&quot;:false,&quot;field&quot;:{&quot;name&quot;:&quot;state&quot;,&quot;label&quot;:&quot;Status&quot;,&quot;type&quot;:&quot;selection&quot;,&quot;widget&quot;:&quot;badge&quot;,&quot;widgetDescription&quot;:&quot;Badge&quot;,&quot;context&quot;:&quot;{}&quot;,&quot;invisible&quot;:null,&quot;column_invisible&quot;:null,&quot;readonly&quot;:&quot;True&quot;,&quot;required&quot;:null,&quot;changeDefault&quot;:false,&quot;selection&quot;:[[&quot;draft&quot;,&quot;Draft&quot;],[&quot;done&quot;,&quot;Done&quot;]]}}"
                                        style="width: 442px;">
                                        <div class="d-flex"><span
                                                class="d-block min-w-0 text-truncate flex-grow-1">Status</span><i
                                                class="fa fa-lg fa-angle-down opacity-0 opacity-75-hover"></i></div><span
                                            class="o_resize position-absolute top-0 end-0 bottom-0 ps-1 bg-black-25 opacity-0 opacity-50-hover z-1"></span>
                                    </th>
                                    <th class="o_list_controller o_list_actions_header w-print-0 p-print-0 position-sticky end-0"
                                        style="width: 32px;">
                                        <div class="o_optional_columns_dropdown d-print-none text-center border-top-0">
                                            <button class="btn p-0 o-dropdown dropdown-toggle dropdown" tabindex="-1"
                                                aria-expanded="false"><i
                                                    class="o_optional_columns_dropdown_toggle oi oi-fw oi-settings-adjust"></i></button>
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="ui-sortable">
                                <tr class="o_data_row" data-id="datapoint_15">
                                    <td class="o_list_record_selector user-select-none" tabindex="-1">
                                        <div class="o-checkbox form-check"><input type="checkbox"
                                                class="form-check-input" id="checkbox-comp-13" disabled=""><label
                                                class="form-check-label" for="checkbox-comp-13"></label></div>
                                    </td>
                                    <td class="o_data_cell cursor-pointer o_field_cell o_list_char o_required_modifier o_readonly_modifier fw-bold"
                                        data-tooltip-delay="1000" tabindex="-1" name="name" data-tooltip="REF0001">
                                        REF0001</td>
                                    <td class="o_data_cell cursor-pointer o_field_cell o_readonly_modifier"
                                        data-tooltip-delay="1000" tabindex="-1" name="date_done">15/09/2024 10:08:35
                                    </td>
                                    <td class="o_data_cell cursor-pointer o_field_cell o_list_many2one o_required_modifier o_readonly_modifier"
                                        data-tooltip-delay="1000" tabindex="-1" name="product_id"
                                        data-tooltip="Volutpat blandit">Volutpat blandit</td>
                                    <td class="o_data_cell cursor-pointer o_field_cell o_list_number o_required_modifier o_readonly_modifier"
                                        data-tooltip-delay="1000" tabindex="-1" name="scrap_qty">30.41</td>
                                    <td class="o_data_cell cursor-pointer o_field_cell o_list_many2one o_required_modifier o_readonly_modifier"
                                        data-tooltip-delay="1000" tabindex="-1" name="product_uom_id"
                                        data-tooltip="Volutpat blandit">Volutpat blandit</td>
                                    <td class="o_data_cell cursor-pointer o_field_cell o_badge_cell o_readonly_modifier"
                                        data-tooltip-delay="1000" tabindex="-1" name="state">
                                        <div name="state"
                                            class="o_field_widget o_readonly_modifier o_field_badge text-success"><span
                                                class="badge rounded-pill text-bg-success">Done</span></div>
                                    </td>
                                    <td tabindex="-1" class="w-print-0 p-print-0"></td>
                                </tr>
                                <tr class="o_data_row" data-id="datapoint_16">
                                    <td class="o_list_record_selector user-select-none" tabindex="-1">
                                        <div class="o-checkbox form-check"><input type="checkbox"
                                                class="form-check-input" id="checkbox-comp-14" disabled=""><label
                                                class="form-check-label" for="checkbox-comp-14"></label></div>
                                    </td>
                                    <td class="o_data_cell cursor-pointer o_field_cell o_list_char o_required_modifier o_readonly_modifier fw-bold"
                                        data-tooltip-delay="1000" tabindex="-1" name="name" data-tooltip="REF0002">
                                        REF0002</td>
                                    <td class="o_data_cell cursor-pointer o_field_cell o_readonly_modifier"
                                        data-tooltip-delay="1000" tabindex="-1" name="date_done">25/08/2024 03:08:35
                                    </td>
                                    <td class="o_data_cell cursor-pointer o_field_cell o_list_many2one o_required_modifier o_readonly_modifier"
                                        data-tooltip-delay="1000" tabindex="-1" name="product_id"
                                        data-tooltip="Laoreet id">Laoreet id</td>
                                    <td class="o_data_cell cursor-pointer o_field_cell o_list_number o_required_modifier o_readonly_modifier"
                                        data-tooltip-delay="1000" tabindex="-1" name="scrap_qty">44.01</td>
                                    <td class="o_data_cell cursor-pointer o_field_cell o_list_many2one o_required_modifier o_readonly_modifier"
                                        data-tooltip-delay="1000" tabindex="-1" name="product_uom_id"
                                        data-tooltip="In massa">In massa</td>
                                    <td class="o_data_cell cursor-pointer o_field_cell o_badge_cell o_readonly_modifier"
                                        data-tooltip-delay="1000" tabindex="-1" name="state">
                                        <div name="state"
                                            class="o_field_widget o_readonly_modifier o_field_badge text-success"><span
                                                class="badge rounded-pill text-bg-success">Done</span></div>
                                    </td>
                                    <td tabindex="-1" class="w-print-0 p-print-0"></td>
                                </tr>
                                <tr class="o_data_row" data-id="datapoint_17">
                                    <td class="o_list_record_selector user-select-none" tabindex="-1">
                                        <div class="o-checkbox form-check"><input type="checkbox"
                                                class="form-check-input" id="checkbox-comp-15" disabled=""><label
                                                class="form-check-label" for="checkbox-comp-15"></label></div>
                                    </td>
                                    <td class="o_data_cell cursor-pointer o_field_cell o_list_char o_required_modifier o_readonly_modifier fw-bold"
                                        data-tooltip-delay="1000" tabindex="-1" name="name" data-tooltip="REF0003">
                                        REF0003</td>
                                    <td class="o_data_cell cursor-pointer o_field_cell o_readonly_modifier"
                                        data-tooltip-delay="1000" tabindex="-1" name="date_done">17/09/2024 01:08:35
                                    </td>
                                    <td class="o_data_cell cursor-pointer o_field_cell o_list_many2one o_required_modifier o_readonly_modifier"
                                        data-tooltip-delay="1000" tabindex="-1" name="product_id"
                                        data-tooltip="Laoreet id">Laoreet id</td>
                                    <td class="o_data_cell cursor-pointer o_field_cell o_list_number o_required_modifier o_readonly_modifier"
                                        data-tooltip-delay="1000" tabindex="-1" name="scrap_qty">20.39</td>
                                    <td class="o_data_cell cursor-pointer o_field_cell o_list_many2one o_required_modifier o_readonly_modifier"
                                        data-tooltip-delay="1000" tabindex="-1" name="product_uom_id"
                                        data-tooltip="Laoreet id">Laoreet id</td>
                                    <td class="o_data_cell cursor-pointer o_field_cell o_badge_cell o_readonly_modifier"
                                        data-tooltip-delay="1000" tabindex="-1" name="state">
                                        <div name="state"
                                            class="o_field_widget o_readonly_modifier o_field_badge text-success"><span
                                                class="badge rounded-pill text-bg-success">Done</span></div>
                                    </td>
                                    <td tabindex="-1" class="w-print-0 p-print-0"></td>
                                </tr>
                                <tr class="o_data_row text-info" data-id="datapoint_18">
                                    <td class="o_list_record_selector user-select-none" tabindex="-1">
                                        <div class="o-checkbox form-check"><input type="checkbox"
                                                class="form-check-input" id="checkbox-comp-16" disabled=""><label
                                                class="form-check-label" for="checkbox-comp-16"></label></div>
                                    </td>
                                    <td class="o_data_cell cursor-pointer o_field_cell o_list_char o_required_modifier o_readonly_modifier fw-bold"
                                        data-tooltip-delay="1000" tabindex="-1" name="name" data-tooltip="REF0004">
                                        REF0004</td>
                                    <td class="o_data_cell cursor-pointer o_field_cell o_readonly_modifier"
                                        data-tooltip-delay="1000" tabindex="-1" name="date_done">24/07/2024 09:08:35
                                    </td>
                                    <td class="o_data_cell cursor-pointer o_field_cell o_list_many2one o_required_modifier o_readonly_modifier"
                                        data-tooltip-delay="1000" tabindex="-1" name="product_id"
                                        data-tooltip="In massa">In massa</td>
                                    <td class="o_data_cell cursor-pointer o_field_cell o_list_number o_required_modifier"
                                        data-tooltip-delay="1000" tabindex="-1" name="scrap_qty">21.52</td>
                                    <td class="o_data_cell cursor-pointer o_field_cell o_list_many2one o_required_modifier"
                                        data-tooltip-delay="1000" tabindex="-1" name="product_uom_id"
                                        data-tooltip="Integer vitae">Integer vitae</td>
                                    <td class="o_data_cell cursor-pointer o_field_cell o_badge_cell o_readonly_modifier"
                                        data-tooltip-delay="1000" tabindex="-1" name="state">
                                        <div name="state"
                                            class="o_field_widget o_readonly_modifier o_field_badge text-muted"><span
                                                class="badge rounded-pill text-bg-muted">Draft</span></div>
                                    </td>
                                    <td tabindex="-1" class="w-print-0 p-print-0"></td>
                                </tr>
                                <tr class="o_data_row text-info" data-id="datapoint_19">
                                    <td class="o_list_record_selector user-select-none" tabindex="-1">
                                        <div class="o-checkbox form-check"><input type="checkbox"
                                                class="form-check-input" id="checkbox-comp-17" disabled=""><label
                                                class="form-check-label" for="checkbox-comp-17"></label></div>
                                    </td>
                                    <td class="o_data_cell cursor-pointer o_field_cell o_list_char o_required_modifier o_readonly_modifier fw-bold"
                                        data-tooltip-delay="1000" tabindex="-1" name="name" data-tooltip="REF0005">
                                        REF0005</td>
                                    <td class="o_data_cell cursor-pointer o_field_cell o_readonly_modifier"
                                        data-tooltip-delay="1000" tabindex="-1" name="date_done">13/08/2024 10:08:35
                                    </td>
                                    <td class="o_data_cell cursor-pointer o_field_cell o_list_many2one o_required_modifier o_readonly_modifier"
                                        data-tooltip-delay="1000" tabindex="-1" name="product_id"
                                        data-tooltip="In massa">In massa</td>
                                    <td class="o_data_cell cursor-pointer o_field_cell o_list_number o_required_modifier"
                                        data-tooltip-delay="1000" tabindex="-1" name="scrap_qty">55.77</td>
                                    <td class="o_data_cell cursor-pointer o_field_cell o_list_many2one o_required_modifier"
                                        data-tooltip-delay="1000" tabindex="-1" name="product_uom_id"
                                        data-tooltip="Viverra nam">Viverra nam</td>
                                    <td class="o_data_cell cursor-pointer o_field_cell o_badge_cell o_readonly_modifier"
                                        data-tooltip-delay="1000" tabindex="-1" name="state">
                                        <div name="state"
                                            class="o_field_widget o_readonly_modifier o_field_badge text-muted"><span
                                                class="badge rounded-pill text-bg-muted">Draft</span></div>
                                    </td>
                                    <td tabindex="-1" class="w-print-0 p-print-0"></td>
                                </tr>
                                <tr class="o_data_row" data-id="datapoint_20">
                                    <td class="o_list_record_selector user-select-none" tabindex="-1">
                                        <div class="o-checkbox form-check"><input type="checkbox"
                                                class="form-check-input" id="checkbox-comp-18" disabled=""><label
                                                class="form-check-label" for="checkbox-comp-18"></label></div>
                                    </td>
                                    <td class="o_data_cell cursor-pointer o_field_cell o_list_char o_required_modifier o_readonly_modifier fw-bold"
                                        data-tooltip-delay="1000" tabindex="-1" name="name" data-tooltip="REF0006">
                                        REF0006</td>
                                    <td class="o_data_cell cursor-pointer o_field_cell o_readonly_modifier"
                                        data-tooltip-delay="1000" tabindex="-1" name="date_done">03/07/2024 06:08:35
                                    </td>
                                    <td class="o_data_cell cursor-pointer o_field_cell o_list_many2one o_required_modifier o_readonly_modifier"
                                        data-tooltip-delay="1000" tabindex="-1" name="product_id"
                                        data-tooltip="Viverra nam">Viverra nam</td>
                                    <td class="o_data_cell cursor-pointer o_field_cell o_list_number o_required_modifier o_readonly_modifier"
                                        data-tooltip-delay="1000" tabindex="-1" name="scrap_qty">14.10</td>
                                    <td class="o_data_cell cursor-pointer o_field_cell o_list_many2one o_required_modifier o_readonly_modifier"
                                        data-tooltip-delay="1000" tabindex="-1" name="product_uom_id"
                                        data-tooltip="Laoreet id">Laoreet id</td>
                                    <td class="o_data_cell cursor-pointer o_field_cell o_badge_cell o_readonly_modifier"
                                        data-tooltip-delay="1000" tabindex="-1" name="state">
                                        <div name="state"
                                            class="o_field_widget o_readonly_modifier o_field_badge text-success"><span
                                                class="badge rounded-pill text-bg-success">Done</span></div>
                                    </td>
                                    <td tabindex="-1" class="w-print-0 p-print-0"></td>
                                </tr>
                                <tr class="o_data_row" data-id="datapoint_21">
                                    <td class="o_list_record_selector user-select-none" tabindex="-1">
                                        <div class="o-checkbox form-check"><input type="checkbox"
                                                class="form-check-input" id="checkbox-comp-19" disabled=""><label
                                                class="form-check-label" for="checkbox-comp-19"></label></div>
                                    </td>
                                    <td class="o_data_cell cursor-pointer o_field_cell o_list_char o_required_modifier o_readonly_modifier fw-bold"
                                        data-tooltip-delay="1000" tabindex="-1" name="name" data-tooltip="REF0007">
                                        REF0007</td>
                                    <td class="o_data_cell cursor-pointer o_field_cell o_readonly_modifier"
                                        data-tooltip-delay="1000" tabindex="-1" name="date_done">22/09/2024 16:08:35
                                    </td>
                                    <td class="o_data_cell cursor-pointer o_field_cell o_list_many2one o_required_modifier o_readonly_modifier"
                                        data-tooltip-delay="1000" tabindex="-1" name="product_id"
                                        data-tooltip="In massa">In massa</td>
                                    <td class="o_data_cell cursor-pointer o_field_cell o_list_number o_required_modifier o_readonly_modifier"
                                        data-tooltip-delay="1000" tabindex="-1" name="scrap_qty">30.36</td>
                                    <td class="o_data_cell cursor-pointer o_field_cell o_list_many2one o_required_modifier o_readonly_modifier"
                                        data-tooltip-delay="1000" tabindex="-1" name="product_uom_id"
                                        data-tooltip="Laoreet id">Laoreet id</td>
                                    <td class="o_data_cell cursor-pointer o_field_cell o_badge_cell o_readonly_modifier"
                                        data-tooltip-delay="1000" tabindex="-1" name="state">
                                        <div name="state"
                                            class="o_field_widget o_readonly_modifier o_field_badge text-success"><span
                                                class="badge rounded-pill text-bg-success">Done</span></div>
                                    </td>
                                    <td tabindex="-1" class="w-print-0 p-print-0"></td>
                                </tr>
                                <tr class="o_data_row text-info" data-id="datapoint_22">
                                    <td class="o_list_record_selector user-select-none" tabindex="-1">
                                        <div class="o-checkbox form-check"><input type="checkbox"
                                                class="form-check-input" id="checkbox-comp-20" disabled=""><label
                                                class="form-check-label" for="checkbox-comp-20"></label></div>
                                    </td>
                                    <td class="o_data_cell cursor-pointer o_field_cell o_list_char o_required_modifier o_readonly_modifier fw-bold"
                                        data-tooltip-delay="1000" tabindex="-1" name="name" data-tooltip="REF0008">
                                        REF0008</td>
                                    <td class="o_data_cell cursor-pointer o_field_cell o_readonly_modifier"
                                        data-tooltip-delay="1000" tabindex="-1" name="date_done">22/07/2024 00:08:35
                                    </td>
                                    <td class="o_data_cell cursor-pointer o_field_cell o_list_many2one o_required_modifier o_readonly_modifier"
                                        data-tooltip-delay="1000" tabindex="-1" name="product_id"
                                        data-tooltip="In massa">In massa</td>
                                    <td class="o_data_cell cursor-pointer o_field_cell o_list_number o_required_modifier"
                                        data-tooltip-delay="1000" tabindex="-1" name="scrap_qty">53.22</td>
                                    <td class="o_data_cell cursor-pointer o_field_cell o_list_many2one o_required_modifier"
                                        data-tooltip-delay="1000" tabindex="-1" name="product_uom_id"
                                        data-tooltip="Viverra nam">Viverra nam</td>
                                    <td class="o_data_cell cursor-pointer o_field_cell o_badge_cell o_readonly_modifier"
                                        data-tooltip-delay="1000" tabindex="-1" name="state">
                                        <div name="state"
                                            class="o_field_widget o_readonly_modifier o_field_badge text-muted"><span
                                                class="badge rounded-pill text-bg-muted">Draft</span></div>
                                    </td>
                                    <td tabindex="-1" class="w-print-0 p-print-0"></td>
                                </tr>
                                <tr class="o_data_row" data-id="datapoint_23">
                                    <td class="o_list_record_selector user-select-none" tabindex="-1">
                                        <div class="o-checkbox form-check"><input type="checkbox"
                                                class="form-check-input" id="checkbox-comp-21" disabled=""><label
                                                class="form-check-label" for="checkbox-comp-21"></label></div>
                                    </td>
                                    <td class="o_data_cell cursor-pointer o_field_cell o_list_char o_required_modifier o_readonly_modifier fw-bold"
                                        data-tooltip-delay="1000" tabindex="-1" name="name" data-tooltip="REF0009">
                                        REF0009</td>
                                    <td class="o_data_cell cursor-pointer o_field_cell o_readonly_modifier"
                                        data-tooltip-delay="1000" tabindex="-1" name="date_done">14/08/2024 18:08:35
                                    </td>
                                    <td class="o_data_cell cursor-pointer o_field_cell o_list_many2one o_required_modifier o_readonly_modifier"
                                        data-tooltip-delay="1000" tabindex="-1" name="product_id"
                                        data-tooltip="Laoreet id">Laoreet id</td>
                                    <td class="o_data_cell cursor-pointer o_field_cell o_list_number o_required_modifier o_readonly_modifier"
                                        data-tooltip-delay="1000" tabindex="-1" name="scrap_qty">45.03</td>
                                    <td class="o_data_cell cursor-pointer o_field_cell o_list_many2one o_required_modifier o_readonly_modifier"
                                        data-tooltip-delay="1000" tabindex="-1" name="product_uom_id"
                                        data-tooltip="Laoreet id">Laoreet id</td>
                                    <td class="o_data_cell cursor-pointer o_field_cell o_badge_cell o_readonly_modifier"
                                        data-tooltip-delay="1000" tabindex="-1" name="state">
                                        <div name="state"
                                            class="o_field_widget o_readonly_modifier o_field_badge text-success"><span
                                                class="badge rounded-pill text-bg-success">Done</span></div>
                                    </td>
                                    <td tabindex="-1" class="w-print-0 p-print-0"></td>
                                </tr>
                                <tr class="o_data_row" data-id="datapoint_24">
                                    <td class="o_list_record_selector user-select-none" tabindex="-1">
                                        <div class="o-checkbox form-check"><input type="checkbox"
                                                class="form-check-input" id="checkbox-comp-22" disabled=""><label
                                                class="form-check-label" for="checkbox-comp-22"></label></div>
                                    </td>
                                    <td class="o_data_cell cursor-pointer o_field_cell o_list_char o_required_modifier o_readonly_modifier fw-bold"
                                        data-tooltip-delay="1000" tabindex="-1" name="name" data-tooltip="REF0010">
                                        REF0010</td>
                                    <td class="o_data_cell cursor-pointer o_field_cell o_readonly_modifier"
                                        data-tooltip-delay="1000" tabindex="-1" name="date_done">16/09/2024 21:08:35
                                    </td>
                                    <td class="o_data_cell cursor-pointer o_field_cell o_list_many2one o_required_modifier o_readonly_modifier"
                                        data-tooltip-delay="1000" tabindex="-1" name="product_id"
                                        data-tooltip="Laoreet id">Laoreet id</td>
                                    <td class="o_data_cell cursor-pointer o_field_cell o_list_number o_required_modifier o_readonly_modifier"
                                        data-tooltip-delay="1000" tabindex="-1" name="scrap_qty">7.35</td>
                                    <td class="o_data_cell cursor-pointer o_field_cell o_list_many2one o_required_modifier o_readonly_modifier"
                                        data-tooltip-delay="1000" tabindex="-1" name="product_uom_id"
                                        data-tooltip="Integer vitae">Integer vitae</td>
                                    <td class="o_data_cell cursor-pointer o_field_cell o_badge_cell o_readonly_modifier"
                                        data-tooltip-delay="1000" tabindex="-1" name="state">
                                        <div name="state"
                                            class="o_field_widget o_readonly_modifier o_field_badge text-success"><span
                                                class="badge rounded-pill text-bg-success">Done</span></div>
                                    </td>
                                    <td tabindex="-1" class="w-print-0 p-print-0"></td>
                                </tr>
                            </tbody>
                            <tfoot class="o_list_footer cursor-default o_sample_data_disabled">
                                <tr>
                                    <td></td>
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

    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js">
    </script>

    {{-- DATATABLE --}}

    {{-- <script>
        $(document).ready(function() {
            $('#unbuildOrderTable').DataTable({
                "pageLength": 10,
                responsive: true,
                "processing": true,
            });
        });
    </script> --}}


    {{-- <script>
        $(document).ready(function() {
            $('#operations-link').on('click', function(event) {
                event.preventDefault();
                $('.operation-dropdown').toggle();
            });

            $('#product-link').on('click', function(event) {
                console.log('yes');
                event.preventDefault();
                $('.product-dropdown').toggle();
            });

            $(document).on('click', function(event) {
                var $target = $(event.target);

                if (!$target.closest('#operations-link').length && !$target.closest('.operation-dropdown')
                    .length) {
                    $('.operation-dropdown').hide();
                }

                if (!$target.closest('#product-link').length && !$target.closest('.product-dropdown')
                    .length) {
                    $('.product-dropdown').hide();
                }
            });
        });
    </script> --}}
@endpush
