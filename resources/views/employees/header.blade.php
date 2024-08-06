<!-- resources/views/employees/header.blade.php -->
<div class="o_control_panel d-flex flex-column gap-3 px-3 pt-2 pb-3" data-command-category="actions">
    <div
        class="o_control_panel_main d-flex flex-wrap flex-lg-nowrap justify-content-between align-items-lg-start gap-3 flex-grow-1">
        <div class="o_control_panel_breadcrumbs d-flex align-items-center gap-1 order-0 h-lg-100">
            <div class="o_control_panel_main_buttons d-flex gap-1 d-empty-none d-print-none">
                <div class="d-inline-flex gap-1"><a href="@yield('head_new_btn_link')" class="btn btn-outline-primary o_form_button_create"
                        data-hotkey="c">New</a></div>
            </div>
            <div
                class="o_breadcrumb d-flex flex-row flex-md-column align-self-stretch justify-content-between min-w-0">
                <ol class="breadcrumb flex-nowrap text-nowrap lh-sm">
                    <li class="breadcrumb-item d-inline-flex min-w-0 o_back_button" data-hotkey="b"><a
                            class="fw-bold text-truncate" href="@yield('head_title_link')"
                            data-tooltip="Back to &quot;Employees&quot;">@yield('title')</a></li>
                </ol>
                <div class="d-flex gap-1 text-truncate">
                    <div
                        class="o_last_breadcrumb_item active d-flex gap-2 align-items-center min-w-0 lh-sm">
                        <span class="min-w-0 text-truncate">@yield('head_title_text')</span></div>
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
            <div class="o_form_status_indicator d-md-flex align-items-center align-self-md-end me-auto">
                <div class="o_form_status_indicator_buttons d-flex invisible"><button type="button"
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
                    name="action_open_documents" type="object"><i
                        class="o_button_icon fa fa-fw fa-file-text"></i>
                    <div name="document_count"
                        class="o_field_widget o_readonly_modifier o_field_statinfo"><span
                            class="o_stat_info o_stat_value">0</span><span
                            class="o_stat_text">Documents</span></div>
                </button><button
                    class="btn oe_stat_button btn-outline-secondary flex-grow-1 flex-lg-grow-0"
                    name="action_related_contacts" type="object"
                    data-tooltip-template="views.ViewButtonTooltip"
                    data-tooltip-info="{&quot;debug&quot;:false,&quot;button&quot;:{&quot;help&quot;:&quot;Related Contacts&quot;,&quot;type&quot;:&quot;object&quot;,&quot;name&quot;:&quot;action_related_contacts&quot;},&quot;context&quot;:{&quot;params&quot;:{&quot;resId&quot;:2,&quot;action&quot;:&quot;employees&quot;,&quot;actionStack&quot;:[{&quot;action&quot;:&quot;employees&quot;},{&quot;resId&quot;:2,&quot;action&quot;:&quot;employees&quot;}]},&quot;chat_icon&quot;:true,&quot;lang&quot;:&quot;en_IN&quot;,&quot;tz&quot;:&quot;Asia/Calcutta&quot;,&quot;uid&quot;:2,&quot;allowed_company_ids&quot;:[1]},&quot;model&quot;:&quot;hr.employee&quot;}"><i
                        class="o_button_icon fa fa-fw fa-address-card-o"></i>
                    <div class="o_field_widget o_stat_info"><span class="o_stat_value">
                        <div name="related_partners_count"
                            class="o_field_widget o_readonly_modifier o_field_integer">
                            <span>1</span></div>
                    </span><span class="o_stat_text">Contacts</span></div>
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
                </svg></button>
            <div class="o_cp_pager text-nowrap " role="search">
                <nav class="o_pager d-flex gap-2 h-100" aria-label="Pager"><span
                        class="o_pager_counter align-self-center"><span
                            class="o_pager_value d-inline-block border-bottom border-transparent mb-n1">1</span><span>
                        / </span><span class="o_pager_limit">1</span></span><span
                        class="btn-group d-print-none" aria-atomic="true"><button type="button"
                        class="oi oi-chevron-left btn btn-secondary o_pager_previous px-2 rounded-start"
                        aria-label="Previous" data-tooltip="Previous" tabindex="-1" data-hotkey="p"
                        disabled=""></button><button type="button"
                        class="oi oi-chevron-right btn btn-secondary o_pager_next px-2 rounded-end"
                        aria-label="Next" data-tooltip="Next" tabindex="-1" data-hotkey="n"
                        disabled=""></button></span></nav>
            </div>
        </div>
    </div>
</div>
