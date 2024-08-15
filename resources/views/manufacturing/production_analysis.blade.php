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
            <div class="o_graph_view o_view_controller o_action">

                {{-- <div class="o_control_panel d-flex flex-column gap-3 px-3 pt-2 pb-3" data-command-category="actions">
                    <div
                        class="o_control_panel_main d-flex flex-wrap flex-lg-nowrap justify-content-between align-items-lg-start gap-3 flex-grow-1">
                        <div class="o_control_panel_breadcrumbs d-flex align-items-center gap-1 order-0 h-lg-100">
                            <div class="o_control_panel_main_buttons d-flex gap-1 d-empty-none d-print-none">
                                <div class="d-inline-flex gap-1"></div>
                            </div>
                            <div class="o_breadcrumb d-flex gap-1 text-truncate">
                                <div class="o_last_breadcrumb_item active d-flex fs-4 min-w-0 align-items-center"><span
                                        class="min-w-0 text-truncate">Production Analysis</span></div>
                                <div class="o_control_panel_breadcrumbs_actions d-inline-flex d-print-none">
                                    <div class="o_cp_action_menus d-flex align-items-center pe-2 gap-1">
                                        <div class="lh-1"><button
                                                class="d-print-none btn p-0 ms-1 lh-sm border-0 o-dropdown dropdown-toggle dropdown"
                                                data-hotkey="u" data-tooltip="Actions" aria-expanded="false"><i
                                                    class="fa fa-cog"></i></button></div>
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
                                    <div class="o_searchview_input_container d-flex flex-grow-1 flex-wrap gap-1">
                                        <div class="o_searchview_facet position-relative d-inline-flex align-items-stretch rounded-2 bg-200 text-nowrap opacity-trigger-hover o_facet_with_domain"
                                            role="listitem" aria-label="search" tabindex="0">
                                            <div
                                                class="position-absolute start-0 top-0 bottom-0 end-0 bg-view border rounded-2 shadow opacity-0 opacity-100-hover">
                                            </div>
                                            <div class="o_searchview_facet_label position-relative rounded-start-2 px-1 rounded-end-0 p-0 btn btn-primary"
                                                role="button"><i class="small fa-fw fa fa-filter"
                                                    role="image"></i><span
                                                    class="position-absolute start-0 top-0 bottom-0 end-0 bg-inherit opacity-0 opacity-100-hover"><i
                                                        class="fa fa-fw fa-cog"></i></span></div>
                                            <div
                                                class="o_facet_values position-relative d-flex flex-wrap align-items-center ps-2 rounded-end-2 text-wrap">
                                                <small class="o_facet_value">End Date: 2024</small><button
                                                    class="o_facet_remove oi oi-close btn btn-link py-0 px-2 text-danger d-print-none"
                                                    role="button" aria-label="Remove" title="Remove"></button></div>
                                        </div><input type="text"
                                            class="o_searchview_input o_input d-print-none flex-grow-1 w-auto border-0"
                                            accesskey="Q" placeholder="Search..." role="searchbox">
                                    </div>
                                </div><button
                                    class="o_searchview_dropdown_toggler d-print-none btn btn-outline-secondary o-dropdown-caret rounded-start-0 o-dropdown dropdown-toggle dropdown"
                                    data-hotkey="shift+q" title="Toggle Search Panel" aria-expanded="false"></button>
                            </div>
                        </div>
                        <div
                            class="o_control_panel_navigation d-flex flex-wrap flex-md-nowrap justify-content-end gap-1 gap-xl-3 order-1 order-lg-2 flex-grow-1">
                            <nav class="o_cp_switch_buttons d-print-none d-inline-flex btn-group"><button
                                    class="btn btn-secondary o_switch_view o_graph active" data-tooltip="Graph"><i
                                        class="fa fa-area-chart"></i></button><button
                                    class="btn btn-secondary o_switch_view o_pivot" data-tooltip="Pivot"><i
                                        class="oi oi-view-pivot"></i></button></nav>
                        </div>
                    </div>
                </div> --}}
                
                <div class="o_content o_view_sample_data">
                    <div class="o_view_nocontent">
                        <div class="o_nocontent_help">
                            <p class="o_view_nocontent_smiling_face">
                                No data yet!
                            </p>
                        </div>
                    </div>
                    <div class="o_graph_renderer o_renderer h-100 d-flex flex-column border-top undefined">
                        <div class="d-flex d-print-none gap-1 flex-shrink-0 mt-2 mx-3 mb-3 overflow-x-auto">
                            <div class="btn-group" role="toolbar" aria-label="Main actions"><button
                                    class="btn btn-primary o-dropdown dropdown-toggle dropdown" aria-expanded="false">
                                    Measures <i class="fa fa-caret-down ms-1"></i></button></div>
                            <div class="btn-group" role="toolbar" aria-label="Insert in Spreadsheet"><button
                                    class="btn btn-secondary o_graph_insert_spreadsheet" disabled=""> Insert in
                                    Spreadsheet </button></div>
                            <div class="btn-group" role="toolbar" aria-label="Change graph"><button
                                    class="btn btn-secondary fa fa-bar-chart o_graph_button" data-tooltip="Bar Chart"
                                    aria-label="Bar Chart" data-mode="bar"></button><button
                                    class="btn btn-secondary fa fa-line-chart o_graph_button active"
                                    data-tooltip="Line Chart" aria-label="Line Chart" data-mode="line"></button><button
                                    class="btn btn-secondary fa fa-pie-chart o_graph_button" data-tooltip="Pie Chart"
                                    aria-label="Pie Chart" data-mode="pie"></button></div>
                            <div class="btn-group" role="toolbar" aria-label="Change graph"><button
                                    class="btn btn-secondary fa fa-database o_graph_button active" data-tooltip="Stacked"
                                    aria-label="Stacked"></button><button
                                    class="btn btn-secondary fa fa-signal o_graph_button" data-tooltip="Cumulative"
                                    aria-label="Cumulative"></button></div>
                            <div class="btn-group" role="toolbar" aria-label="Sort graph" name="toggleOrderToolbar">
                                <button class="btn btn-secondary fa fa-sort-amount-desc o_graph_button"
                                    data-tooltip="Descending" aria-label="Descending"></button><button
                                    class="btn btn-secondary fa fa-sort-amount-asc o_graph_button"
                                    data-tooltip="Ascending" aria-label="Ascending"></button></div>
                        </div>
                        <div class="o_graph_canvas_container flex-grow-1 position-relative px-3 pb-3"><canvas
                                width="1888" height="398"
                                style="display: block; box-sizing: border-box; height: 398px; width: 1888px;"></canvas>
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
