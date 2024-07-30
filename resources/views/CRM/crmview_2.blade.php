@extends('layout.header')
@section('content')
@section('navbar_menu')
    <li><a href="#">Sales</a></li>
    <li><a href="{{ url('lead') }}">Leads</a></li>
    <li><a href="#">Reporting</a></li>
    <li><a href="#">Configuration</a></li>
@endsection

<link type="image/x-icon" rel="shortcut icon" href="/web/static/img/favicon.ico">
<link rel="stylesheet" href="http://[::1]:5173/web/static/src/libs/fontawesome/fonts/fontawesome-webfont.woff?v=4.7.0">

@vite('resources/css/crm_2.css')
<script id="web.layout.odooscript" type="text/javascript">
    var odoo = {
        csrf_token: "710ee707437e77d46d51daf614449358034f45aeo1753770612",
        debug: "",
    };
</script>

<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<meta name="theme-color" content="#714B67">
<link rel="manifest" href="/web/manifest.webmanifest" crossorigin="use-credentials">
<link rel="apple-touch-icon" href="/web/static/img/odoo-icon-ios.png">
<script type="text/javascript">
    // Block to avoid leaking variables in the script scope
    {
        odoo.__session_info__ = {
            "uid": 2,
            "is_system": true,
            "is_admin": true,
            "is_internal_user": true,
            "user_context": {
                "lang": "en_IN",
                "tz": "Asia/Calcutta",
                "uid": 2
            },
            "db": "yantradesign",
            "user_settings": {
                "id": 1,
                "user_id": {
                    "id": 2
                },
                "is_discuss_sidebar_category_channel_open": true,
                "is_discuss_sidebar_category_chat_open": true,
                "push_to_talk_key": false,
                "use_push_to_talk": false,
                "voice_active_duration": 200,
                "homemenu_config": false,
                "livechat_username": false,
                "livechat_lang_ids": [],
                "volumes": [
                    ["ADD", []]
                ]
            },
            "server_version": "saas~17.2+e",
            "server_version_info": ["saas~17", 2, 0, "final", 0, "e"],
            "support_url": "https://www.odoo.com/help",
            "name": "info@yantradesign.co.in",
            "username": "info@yantradesign.co.in",
            "partner_write_date": "2024-07-19 11:29:04",
            "partner_display_name": "info@yantradesign.co.in",
            "partner_id": 3,
            "web.base.url": "https://yantradesign.odoo.com",
            "active_ids_limit": 20000,
            "profile_session": null,
            "profile_collectors": null,
            "profile_params": null,
            "max_file_upload_size": 134217728,
            "home_action_id": false,
            "cache_hashes": {
                "translations": "e94c75232ac00958fd1f4185bcb7a9b31e95f5bb",
                "load_menus": "c5723947e95310228933b9c78061b4e822135157572de983461d9014d9d12d0d"
            },
            "currencies": {
                "20": {
                    "symbol": "\u20b9",
                    "position": "before",
                    "digits": [69, 2]
                }
            },
            "bundle_params": {
                "lang": "en_IN"
            },
            "test_mode": false,
            "user_companies": {
                "current_company": 1,
                "allowed_companies": {
                    "2": {
                        "id": 2,
                        "name": "abcdEFG",
                        "sequence": 10,
                        "child_ids": [],
                        "parent_id": false,
                        "timesheet_uom_id": 4,
                        "timesheet_uom_factor": 1.0
                    },
                    "1": {
                        "id": 1,
                        "name": "YantraDesign",
                        "sequence": 0,
                        "child_ids": [],
                        "parent_id": false,
                        "timesheet_uom_id": 4,
                        "timesheet_uom_factor": 1.0
                    }
                },
                "disallowed_ancestor_companies": {}
            },
            "show_effect": true,
            "display_switch_company_menu": true,
            "user_id": [2],
            "max_time_between_keys_in_ms": 150,
            "onboarding_to_display": ["website_sale_dashboard", "sale_quotation", "account_dashboard",
                "account_invoice"
            ],
            "web_tours": [],
            "tour_disable": false,
            "storeData": {
                "Store": {
                    "action_discuss_id": 117,
                    "hasLinkPreviewFeature": true,
                    "internalUserGroupId": 1,
                    "mt_comment_id": 1,
                    "odoobot": {
                        "id": 2,
                        "name": "OdooBot",
                        "email": "info@yantradesign.co.in",
                        "active": false,
                        "im_status": "bot",
                        "is_company": false,
                        "write_date": "2024-07-19 11:29:04",
                        "userId": 1,
                        "isInternalUser": true,
                        "type": "partner"
                    },
                    "self": {
                        "id": 3,
                        "isAdmin": true,
                        "isInternalUser": true,
                        "name": "info@yantradesign.co.in",
                        "notification_preference": "email",
                        "type": "partner",
                        "userId": 2,
                        "write_date": "2024-07-19 11:29:04"
                    },
                    "settings": {
                        "id": 1,
                        "user_id": {
                            "id": 2
                        },
                        "is_discuss_sidebar_category_channel_open": true,
                        "is_discuss_sidebar_category_chat_open": true,
                        "push_to_talk_key": false,
                        "use_push_to_talk": false,
                        "voice_active_duration": 200,
                        "homemenu_config": false,
                        "livechat_username": false,
                        "livechat_lang_ids": [],
                        "volumes": [
                            ["ADD", []]
                        ]
                    },
                    "hasGifPickerFeature": false,
                    "hasMessageTranslationFeature": false,
                    "hasDocumentsUserGroup": true,
                    "has_access_livechat": true,
                    "helpdesk_livechat_active": false
                }
            },
            "warning": "admin",
            "expiration_date": "2024-07-31 11:49:35",
            "expiration_reason": "trial",
            "map_box_token": false,
            "odoobot_initialized": true,
            "iap_company_enrich": false,
            "odoo_website_url": "https://www.odoo.com",
            "ocn_token_key": false,
            "fcm_project_id": false,
            "inbox_action": 117,
            "is_quick_edit_mode_enabled": false,
            "uom_ids": {
                "4": {
                    "id": 4,
                    "name": "Hours",
                    "rounding": 0.01,
                    "timesheet_widget": "float_time"
                }
            }
        };
        const {
            user_context,
            cache_hashes
        } = odoo.__session_info__;
        const lang = new URLSearchParams(document.location.search).get("lang");
        let menuURL = `/web/webclient/load_menus/${cache_hashes.load_menus}`;
        if (lang) {
            user_context.lang = lang;
            menuURL += `?lang=${lang}`
        }
        odoo.reloadMenus = () => fetch(menuURL).then(res => res.json());
        odoo.loadMenusPromise = odoo.reloadMenus();
        // Prefetch translations to speedup webclient. This is done in JS because link rel="prefetch"
        // is not yet supported on safari.
        fetch(`/web/webclient/translations/${cache_hashes.translations}?lang=${user_context.lang}`);
    }
</script>
<link type="text/css" rel="stylesheet" href="/web/assets/390f510/web.assets_web.min.css">
<script type="text/javascript" src="/web/assets/a07e9a4/web.assets_web.min.js" onerror="__odooAssetError=1"></script>

</head>

<body class="o_web_client">



    </nav>
    </div>
    </div>
    </div>
    <div class="o_content">
        <div class="o_kanban_renderer o_renderer d-flex o_kanban_grouped align-content-stretch">
            <div class="o_kanban_group flex-shrink-0 flex-grow-1 flex-md-grow-0 o_group_draggable"
                data-id="datapoint_2">
                <div class="o_kanban_header position-sticky top-0 z-index-1 py-2">
                    <div class="o_kanban_header_title position-relative d-flex lh-lg"><span
                            class="o_column_title flex-grow-1 d-inline-block mw-100 text-truncate fs-4 fw-bold align-top text-900">New</span>
                        <div class="o_kanban_config"><button class="btn px-2 o-dropdown dropdown-toggle dropdown"
                                aria-expanded="false"><i class="fa fa-gear opacity-50 opacity-100-hover" role="img"
                                    aria-label="Settings" title="Settings"></i></button></div><button
                            class="o_kanban_quick_add new-btn btn pe-2 me-n2">
                            <i class="fa fa-plus opacity-75 opacity-100-hover" role="img" aria-label="Quick add"
                                title="Quick add"></i>
                        </button>
                    </div>
                    <div class="o_kanban_counter position-relative d-flex align-items-center justify-content-between">
                        <div class="o_column_progress progress bg-300 w-50">
                            <div role="progressbar" class="progress-bar o_bar_has_records cursor-pointer bg-200"
                                aria-valuemin="0" aria-label="Progress bar" data-tooltip-delay="0" style="width: 100%;"
                                aria-valuemax="2" aria-valuenow="2" data-tooltip="2 Other" title=""></div>
                        </div>
                        <div class="o_animated_number ms-2 text-900 text-nowrap cursor-default false"
                            title="Expected Revenue"><b>0</b></div>
                    </div>
                </div>



                <div id="append-container-new"></div>

                <script>
                    $(document).ready(function() {
                        var isContentAppendedNew = false; // Flag for the new button
                        var isContentAppendedQualified = false; // Flag for the qualified button
                        var isContentAppendedProposition = false; // Flag for the proposition button
                        var isContentAppendedWon = false; // Flag for the won button

                        function appendContent(containerId, hideContainerIds, isContentAppendedFlag) {
                            if (!isContentAppendedFlag) {
                                var htmlContent = `<div id="appended-content" class="o_kanban_group flex-shrink-0 flex-grow-1 flex-md-grow-0 o_group_draggable" data-id="datapoint_2">
                                    <div class="o_kanban_quick_create o_field_highlight shadow">
                                        <div class="o_form_renderer o_form_nosheet o_form_view o_xxs_form_view p-0 o_form_editable d-block">
                                            <div class="o_inner_group grid">
                                                <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                    <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                        <label class="o_form_label" for="partner_id_0">Organization / Contact<sup class="text-info p-1" data-tooltip-template="web.FieldTooltip" data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;Linked partner (optional). Usually created when converting the lead. You can find a partner by its Name, TIN, Email or Internal Reference.&quot;}}" data-tooltip-touch-tap-to-show="true">?</sup></label>
                                                    </div>
                                                    <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                                        <div name="partner_id" class="o_field_widget o_field_res_partner_many2one o_field_highlight">
                                                            <div class="o_field_many2one_selection">
                                                                <div class="o_input_dropdown">
                                                                    <div class="o-autocomplete dropdown">
                                                                        <input type="text" class="o-autocomplete--input o_input" autocomplete="off" role="combobox" aria-autocomplete="list" aria-haspopup="listbox" id="partner_id_0" placeholder="" aria-expanded="false">
                                                                    </div>
                                                                    <span class="o_dropdown_button"></span>
                                                                </div>
                                                            </div>
                                                            <div class="o_field_many2one_extra"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                    <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                        <label class="o_form_label" for="name_0">Opportunity</label>
                                                    </div>
                                                    <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                                        <div name="name" class="o_field_widget o_required_modifier o_field_char">
                                                            <input class="o_input" id="name_0" type="text" autocomplete="off" placeholder="e.g. Product Pricing">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                    <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                        <label class="o_form_label" for="email_from_0">Email</label>
                                                    </div>
                                                    <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                                        <div name="email_from" class="o_field_widget o_field_char">
                                                            <input class="o_input" id="email_from_0" type="text" autocomplete="off" placeholder="e.g. &quot;email@address.com&quot;">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                    <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                        <label class="o_form_label" for="phone_0">Phone</label>
                                                    </div>
                                                    <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                                        <div name="phone" class="o_field_widget o_field_char">
                                                            <input class="o_input" id="phone_0" type="text" autocomplete="off" placeholder="e.g. &quot;0123456789&quot;">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                    <div class="o_cell flex-grow-1 flex-sm-grow-0 o_wrap_label w-100 text-break text-900" style="">
                                                        <label class="o_form_label" for="expected_revenue_0">Expected Revenue</label>
                                                    </div>
                                                    <div class="o_cell flex-grow-1 flex-sm-grow-0" style="width: 100%;">
                                                        <div>
                                                            <div class="o_row">
                                                                <div name="expected_revenue" class="o_field_widget o_field_monetary oe_inline me-5 o_field_highlight">
                                                                    <div class="text-nowrap d-inline-flex w-100 align-items-baseline position-relative">
                                                                        <span class="o_input position-absolute pe-none d-flex w-100"><span>₹&nbsp;</span><span class="opacity-0 d-inline-block overflow-hidden mw-100 o_monetary_ghost_value">0.00</span></span><span class="opacity-0">₹&nbsp;</span><input class="o_input flex-grow-1 flex-shrink-1" autocomplete="off" id="expected_revenue_0" type="text">
                                                                    </div>
                                                                </div>
                                                                <div name="priority" class="o_field_widget o_field_priority oe_inline">
                                                                    <div class="o_priority" role="radiogroup" name="priority" aria-label="Priority">
                                                                        <a href="#" class="o_priority_star fa fa-star-o" role="radio" tabindex="-1" data-tooltip="Priority: Medium" aria-label="Medium"></a>
                                                                        <a href="#" class="o_priority_star fa fa-star-o" role="radio" tabindex="-1" data-tooltip="Priority: High" aria-label="High"></a>
                                                                        <a href="#" class="o_priority_star fa fa-star-o" role="radio" tabindex="-1" data-tooltip="Priority: Very High" aria-label="Very High"></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <footer class="o_form_view_footer o_form_status bg-light py-1 mt-auto border-top">
                                                <button class="btn border text-muted o_form_button_cancel">Discard</button>
                                                <button class="btn btn-primary o-kanban-button-new">Add</button>
                                            </footer>
                                        </div>
                                    </div>
                                </div>`;

                                $(containerId).append(htmlContent);
                                isContentAppendedFlag = true; // Set the flag to true
                            }
                            hideContainerIds.forEach(function(hideContainerId) {
                                $(hideContainerId).hide(); // Hide the other containers
                            });
                            $(containerId).show(); // Ensure the current container is visible
                        }

                        $('.head_new_btn').click(function(event) {
                            event.preventDefault(); // Prevent default action
                            appendContent('#append-container-new', ['#append-container-qualified',
                                '#append-container-proposition', '#append-container-won'
                            ], isContentAppendedNew); // Call the function with parameters
                            isContentAppendedNew = true;
                        });

                        $('.new-btn').click(function(event) {
                            event.preventDefault(); // Prevent default action
                            appendContent('#append-container-new', ['#append-container-qualified',
                                '#append-container-proposition', '#append-container-won'
                            ], isContentAppendedNew); // Call the function with parameters
                            isContentAppendedNew = true;
                        });

                        $('.qualified-btn').click(function(event) {
                            event.preventDefault(); // Prevent default action
                            appendContent('#append-container-qualified', ['#append-container-new',
                                '#append-container-proposition', '#append-container-won'
                            ], isContentAppendedQualified); // Call the function with parameters
                            isContentAppendedQualified = true;
                        });

                        $('.proposition-btn').click(function(event) {
                            event.preventDefault(); // Prevent default action
                            appendContent('#append-container-proposition', ['#append-container-new',
                                '#append-container-qualified', '#append-container-won'
                            ], isContentAppendedProposition); // Call the function with parameters
                            isContentAppendedProposition = true;
                        });

                        $('.won-btn').click(function(event) {
                            event.preventDefault(); // Prevent default action
                            appendContent('#append-container-won', ['#append-container-new',
                                '#append-container-qualified', '#append-container-proposition'
                            ], isContentAppendedWon); // Call the function with parameters
                            isContentAppendedWon = true;
                        });
                    });
                </script>



                <div role="article" class="o_kanban_record d-flex o_draggable oe_kanban_card_undefined"
                    data-id="datapoint_4" tabindex="0">
                    <div class="oe_kanban_color_0 oe_kanban_global_click oe_kanban_card d-flex flex-column">
                        <div class="oe_kanban_content flex-grow-1">
                            <div class="oe_kanban_details"><strong
                                    class="o_kanban_record_title"><span>Logili</span></strong></div>
                            <div class="o_kanban_record_subtitle"></div>
                            <div></div>
                            <div>
                                <div name="tag_ids" class="o_field_widget o_field_many2many_tags">
                                    <div class="d-flex flex-wrap gap-1"></div>
                                </div>
                            </div>
                            <div>
                                <div name="lead_properties" class="o_field_widget o_field_properties">
                                    <div class="w-100 fw-normal text-muted"></div>
                                </div>
                            </div>
                        </div>
                        <div class="oe_kanban_footer">
                            <div class="o_kanban_record_bottom">
                                <div class="oe_kanban_bottom_left">
                                    <div name="priority" class="o_field_widget o_field_priority">
                                        <div class="o_priority" role="radiogroup" name="priority" aria-label="Priority">
                                            <a href="#" class="o_priority_star fa fa-star-o" role="radio"
                                                tabindex="-1" data-tooltip="Priority: Medium"
                                                aria-label="Medium"></a><a href="#"
                                                class="o_priority_star fa fa-star-o" role="radio" tabindex="-1"
                                                data-tooltip="Priority: High" aria-label="High"></a><a href="#"
                                                class="o_priority_star fa fa-star-o" role="radio" tabindex="-1"
                                                data-tooltip="Priority: Very High" aria-label="Very High"></a>
                                        </div>
                                    </div>
                                    <div name="activity_ids" class="o_field_widget o_field_kanban_activity"><a
                                            class="o-mail-ActivityButton" role="button" aria-label="Show activities"
                                            title="Show activities"><i
                                                class="fa fa-fw fa-lg text-muted fa-clock-o btn-link text-dark"
                                                role="img"></i></a></div>
                                </div>
                                <div class="oe_kanban_bottom_right">
                                    <div name="user_id"
                                        class="o_field_widget o_field_many2one_avatar_user o_field_many2one_avatar_kanban o_field_many2one_avatar">
                                        <div class="d-flex align-items-center gap-1"
                                            data-tooltip="info@yantradesign.co.in"><span
                                                class="o_avatar o_m2o_avatar d-flex"><img class="rounded"
                                                    src="https://i.pinimg.com/550x/a8/23/0a/a8230a2a558297bc90a394ec0283ff4f.jpg"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="o_dropdown_kanban bg-transparent position-absolute end-0"><button
                            class="btn o-no-caret rounded-0 o-dropdown dropdown-toggle dropdown" title="Dropdown menu"
                            aria-expanded="false"><span class="fa fa-ellipsis-v"></span></button></div>
                </div>
                <div role="article" class="o_kanban_record d-flex o_draggable oe_kanban_card_undefined"
                    data-id="datapoint_7" tabindex="0">
                    <div class="oe_kanban_color_0 oe_kanban_global_click oe_kanban_card d-flex flex-column">
                        <div class="oe_kanban_content flex-grow-1">
                            <div class="oe_kanban_details"><strong class="o_kanban_record_title"><span>Exotic
                                        Flora</span></strong></div>
                            <div class="o_kanban_record_subtitle"></div>
                            <div></div>
                            <div>
                                <div name="tag_ids" class="o_field_widget o_field_many2many_tags">
                                    <div class="d-flex flex-wrap gap-1"></div>
                                </div>
                            </div>
                            <div>
                                <div name="lead_properties" class="o_field_widget o_field_properties">
                                    <div class="w-100 fw-normal text-muted"></div>
                                </div>
                            </div>
                        </div>
                        <div class="oe_kanban_footer">
                            <div class="o_kanban_record_bottom">
                                <div class="oe_kanban_bottom_left">
                                    <div name="priority" class="o_field_widget o_field_priority">
                                        <div class="o_priority" role="radiogroup" name="priority"
                                            aria-label="Priority"><a href="#"
                                                class="o_priority_star fa fa-star-o" role="radio" tabindex="-1"
                                                data-tooltip="Priority: Medium" aria-label="Medium"></a><a
                                                href="#" class="o_priority_star fa fa-star-o" role="radio"
                                                tabindex="-1" data-tooltip="Priority: High" aria-label="High"></a><a
                                                href="#" class="o_priority_star fa fa-star-o" role="radio"
                                                tabindex="-1" data-tooltip="Priority: Very High"
                                                aria-label="Very High"></a></div>
                                    </div>
                                    <div name="activity_ids" class="o_field_widget o_field_kanban_activity"><a
                                            class="o-mail-ActivityButton" role="button" aria-label="Show activities"
                                            title="Show activities"><i
                                                class="fa fa-fw fa-lg text-muted fa-clock-o btn-link text-dark"
                                                role="img"></i></a></div>
                                </div>
                                <div class="oe_kanban_bottom_right">
                                    <div name="user_id"
                                        class="o_field_widget o_field_many2one_avatar_user o_field_many2one_avatar_kanban o_field_many2one_avatar">
                                        <div class="d-flex align-items-center gap-1"
                                            data-tooltip="info@yantradesign.co.in"><span
                                                class="o_avatar o_m2o_avatar d-flex"><img class="rounded"
                                                    src="https://i.pinimg.com/550x/a8/23/0a/a8230a2a558297bc90a394ec0283ff4f.jpg"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="o_dropdown_kanban bg-transparent position-absolute end-0"><button
                            class="btn o-no-caret rounded-0 o-dropdown dropdown-toggle dropdown" title="Dropdown menu"
                            aria-expanded="false"><span class="fa fa-ellipsis-v"></span></button></div>
                </div>
            </div>
            <div class="o_kanban_group flex-shrink-0 flex-grow-1 flex-md-grow-0 o_group_draggable o_kanban_no_records"
                data-id="datapoint_10">
                <div class="o_kanban_header position-sticky top-0 z-index-1 py-2">
                    <div class="o_kanban_header_title position-relative d-flex lh-lg"><span
                            class="o_column_title flex-grow-1 d-inline-block mw-100 text-truncate fs-4 fw-bold align-top text-900">Qualified</span>
                        <div class="o_kanban_config"><button class="btn px-2 o-dropdown dropdown-toggle dropdown"
                                aria-expanded="false"><i class="fa fa-gear opacity-50 opacity-100-hover"
                                    role="img" aria-label="Settings" title="Settings"></i></button></div><button
                            class="o_kanban_quick_add qualified-btn btn pe-2 me-n2"><i
                                class="fa fa-plus opacity-75 opacity-100-hover" role="img" aria-label="Quick add"
                                title="Quick add"></i></button>
                    </div>
                    <div
                        class="o_kanban_counter position-relative d-flex align-items-center justify-content-between opacity-25">
                        <div class="o_column_progress progress bg-300 w-50"></div>
                        <div class="o_animated_number ms-2 text-900 text-nowrap cursor-default false"
                            title="Expected Revenue"><b>0</b></div>
                    </div>
                </div>
                <div id="append-container-qualified"></div>
            </div>


            <div class="o_kanban_group flex-shrink-0 flex-grow-1 flex-md-grow-0 o_group_draggable"
                data-id="datapoint_12">
                <div class="o_kanban_header position-sticky top-0 z-index-1 py-2">
                    <div class="o_kanban_header_title position-relative d-flex lh-lg"><span
                            class="o_column_title flex-grow-1 d-inline-block mw-100 text-truncate fs-4 fw-bold align-top text-900">Proposition</span>
                        <div class="o_kanban_config"><button class="btn px-2 o-dropdown dropdown-toggle dropdown"
                                aria-expanded="false"><i class="fa fa-gear opacity-50 opacity-100-hover"
                                    role="img" aria-label="Settings" title="Settings"></i></button></div><button
                            class="o_kanban_quick_add proposition-btn btn pe-2 me-n2">
                            <i class="fa fa-plus opacity-75 opacity-100-hover" role="img" aria-label="Quick add"
                                title="Quick add"></i>
                        </button>
                    </div>
                    <div class="o_kanban_counter position-relative d-flex align-items-center justify-content-between">
                        <div class="o_column_progress progress bg-300 w-50">
                            <div role="progressbar" class="progress-bar o_bar_has_records cursor-pointer bg-200"
                                aria-valuemin="0" aria-label="Progress bar" data-tooltip-delay="0"
                                style="width: 100%;" aria-valuemax="1" aria-valuenow="1" data-tooltip="1 Other"
                                title=""></div>
                        </div>
                        <div class="o_animated_number ms-2 text-900 text-nowrap cursor-default false"
                            title="Expected Revenue"><b>0</b></div>
                    </div>
                </div>

                <div id="append-container-proposition"></div>

                <div role="article" class="o_kanban_record d-flex o_draggable oe_kanban_card_undefined"
                    data-id="datapoint_14" tabindex="0">
                    <div class="oe_kanban_color_0 oe_kanban_global_click oe_kanban_card d-flex flex-column">
                        <div class="oe_kanban_content flex-grow-1">
                            <div class="oe_kanban_details"><strong
                                    class="o_kanban_record_title"><span>dsad</span></strong></div>
                            <div class="o_kanban_record_subtitle"></div>
                            <div></div>
                            <div>
                                <div name="tag_ids" class="o_field_widget o_field_many2many_tags">
                                    <div class="d-flex flex-wrap gap-1"></div>
                                </div>
                            </div>
                            <div>
                                <div name="lead_properties" class="o_field_widget o_field_properties">
                                    <div class="w-100 fw-normal text-muted"></div>
                                </div>
                            </div>
                        </div>
                        <div class="oe_kanban_footer">
                            <div class="o_kanban_record_bottom">
                                <div class="oe_kanban_bottom_left">
                                    <div name="priority" class="o_field_widget o_field_priority">
                                        <div class="o_priority" role="radiogroup" name="priority"
                                            aria-label="Priority"><a href="#"
                                                class="o_priority_star fa fa-star-o" role="radio" tabindex="-1"
                                                data-tooltip="Priority: Medium" aria-label="Medium"></a><a
                                                href="#" class="o_priority_star fa fa-star-o" role="radio"
                                                tabindex="-1" data-tooltip="Priority: High" aria-label="High"></a><a
                                                href="#" class="o_priority_star fa fa-star-o" role="radio"
                                                tabindex="-1" data-tooltip="Priority: Very High"
                                                aria-label="Very High"></a></div>
                                    </div>
                                    <div name="activity_ids" class="o_field_widget o_field_kanban_activity"><a
                                            class="o-mail-ActivityButton" role="button" aria-label="Show activities"
                                            title="Show activities"><i
                                                class="fa fa-fw fa-lg text-muted fa-clock-o btn-link text-dark"
                                                role="img"></i></a></div>
                                </div>
                                <div class="oe_kanban_bottom_right">
                                    <div name="user_id"
                                        class="o_field_widget o_field_many2one_avatar_user o_field_many2one_avatar_kanban o_field_many2one_avatar">
                                        <div class="d-flex align-items-center gap-1"
                                            data-tooltip="info@yantradesign.co.in"><span
                                                class="o_avatar o_m2o_avatar d-flex"><img class="rounded"
                                                    src="https://i.pinimg.com/550x/a8/23/0a/a8230a2a558297bc90a394ec0283ff4f.jpg"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="o_dropdown_kanban bg-transparent position-absolute end-0"><button
                            class="btn o-no-caret rounded-0 o-dropdown dropdown-toggle dropdown" title="Dropdown menu"
                            aria-expanded="false"><span class="fa fa-ellipsis-v"></span></button></div>
                </div>
            </div>
            <div class="o_kanban_group flex-shrink-0 flex-grow-1 flex-md-grow-0 o_group_draggable"
                data-id="datapoint_17">
                <div class="o_kanban_header position-sticky top-0 z-index-1 py-2">
                    <div class="o_kanban_header_title position-relative d-flex lh-lg"><span
                            class="o_column_title flex-grow-1 d-inline-block mw-100 text-truncate fs-4 fw-bold align-top text-900">Won</span>
                        <div class="o_kanban_config"><button class="btn px-2 o-dropdown dropdown-toggle dropdown"
                                aria-expanded="false"><i class="fa fa-gear opacity-50 opacity-100-hover"
                                    role="img" aria-label="Settings" title="Settings"></i></button></div><button
                            class="o_kanban_quick_add won-btn btn pe-2 me-n2"><i
                                class="fa fa-plus opacity-75 opacity-100-hover" role="img" aria-label="Quick add"
                                title="Quick add"></i></button>
                    </div>
                    <div class="o_kanban_counter position-relative d-flex align-items-center justify-content-between">
                        <div class="o_column_progress progress bg-300 w-50">
                            <div role="progressbar" class="progress-bar o_bar_has_records cursor-pointer bg-200"
                                aria-valuemin="0" aria-label="Progress bar" data-tooltip-delay="0"
                                style="width: 100%;" aria-valuemax="1" aria-valuenow="1" data-tooltip="1 Other">
                            </div>
                        </div>
                        <div class="o_animated_number ms-2 text-900 text-nowrap cursor-default false"
                            title="Expected Revenue"><b>0</b></div>
                    </div>
                </div>


                <div id="append-container-won"></div>


                <div role="article" class="o_kanban_record d-flex o_draggable oe_kanban_card_undefined"
                    data-id="datapoint_19" tabindex="0">
                    <div class="oe_kanban_color_0 oe_kanban_global_click oe_kanban_card d-flex flex-column">
                        <div class="oe_kanban_content flex-grow-1">
                            <div class="oe_kanban_details"><strong
                                    class="o_kanban_record_title"><span>Industrylots</span></strong></div>
                            <div class="o_kanban_record_subtitle"></div>
                            <div></div>
                            <div>
                                <div name="tag_ids" class="o_field_widget o_field_many2many_tags">
                                    <div class="d-flex flex-wrap gap-1"></div>
                                </div>
                            </div>
                            <div>
                                <div name="lead_properties" class="o_field_widget o_field_properties">
                                    <div class="w-100 fw-normal text-muted"></div>
                                </div>
                            </div>
                        </div>
                        <div class="oe_kanban_footer">
                            <div class="o_kanban_record_bottom">
                                <div class="oe_kanban_bottom_left">
                                    <div name="priority" class="o_field_widget o_field_priority">
                                        <div class="o_priority" role="radiogroup" name="priority"
                                            aria-label="Priority"><a href="#"
                                                class="o_priority_star fa fa-star" role="radio" tabindex="-1"
                                                data-tooltip="Priority: Medium" aria-checked=""
                                                aria-label="Medium"></a><a href="#"
                                                class="o_priority_star fa fa-star" role="radio" tabindex="-1"
                                                data-tooltip="Priority: High" aria-checked=""
                                                aria-label="High"></a><a href="#"
                                                class="o_priority_star fa fa-star" role="radio" tabindex="-1"
                                                data-tooltip="Priority: Very High" aria-checked=""
                                                aria-label="Very High"></a></div>
                                    </div>
                                    <div name="activity_ids" class="o_field_widget o_field_kanban_activity"><a
                                            class="o-mail-ActivityButton" role="button" aria-label="Show activities"
                                            title="Show activities"><i
                                                class="fa fa-fw fa-lg text-muted fa-clock-o btn-link text-dark"
                                                role="img"></i></a></div>
                                </div>
                                <div class="oe_kanban_bottom_right">
                                    <div name="user_id"
                                        class="o_field_widget o_field_many2one_avatar_user o_field_many2one_avatar_kanban o_field_many2one_avatar">
                                        <div class="d-flex align-items-center gap-1"
                                            data-tooltip="info@yantradesign.co.in"><span
                                                class="o_avatar o_m2o_avatar d-flex"><img class="rounded"
                                                    src="https://i.pinimg.com/550x/a8/23/0a/a8230a2a558297bc90a394ec0283ff4f.jpg"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="o_dropdown_kanban bg-transparent position-absolute end-0"><button
                            class="btn o-no-caret rounded-0 o-dropdown dropdown-toggle dropdown" title="Dropdown menu"
                            aria-expanded="false"><span class="fa fa-ellipsis-v"></span></button></div>
                </div>
            </div>

            <div class="o_column_quick_create flex-shrink-0 flex-grow-1 flex-md-grow-0">
                <div class="o_quick_create_folded position-sticky z-index-1 my-3 text-nowrap">
                    <button class="o_kanban_add_column btn btn-light w-100" aria-label="Add column" data-tooltip="Add column">
                        <i class="fa fa-plus me-2" role="img"></i>Stage
                    </button>
                </div>
            </div>
            
            <script>
                $(document).ready(function(){
                    var originalContent = `
                        <div class="o_column_quick_create flex-shrink-0 flex-grow-1 flex-md-grow-0">
                            <div class="o_quick_create_folded position-sticky z-index-1 my-3 text-nowrap">
                                <button class="o_kanban_add_column btn btn-light w-100" aria-label="Add column" data-tooltip="Add column">
                                    <i class="fa fa-plus me-2" role="img"></i>Stage
                                </button>
                            </div>
                        </div>`;
            
                    $(document).on('click', '.o_kanban_add_column', function() {
                        var newContent = `
                            <div class="o_column_quick_create flex-shrink-0 flex-grow-1 flex-md-grow-0">
                                <div class="o_quick_create_unfolded pt-3 pb-2">
                                    <div class="o_kanban_header top-0 pb-3">
                                        <div class="input-group mb-1">
                                            <input type="text" class="form-control bg-view" placeholder="Stage...">
                                            <button class="btn btn-primary o_kanban_add" type="button">Add</button>
                                        </div>
                                    </div>
                                    <div class="o_kanban_muted_record mb-2 py-5 bg-300 opacity-50"></div>
                                    <div class="o_kanban_muted_record mb-2 py-5 bg-300 opacity-50"></div>
                                    <div class="o_kanban_muted_record mb-2 py-5 bg-300 opacity-50"></div>
                                </div>
                            </div>`;
                        $('.o_column_quick_create').replaceWith(newContent);
            
                        // Add click event listener to the document
                        $(document).on('click.outsideClick', function(event) {
                            if (!$(event.target).closest('.o_column_quick_create').length) {
                                $('.o_column_quick_create').replaceWith(originalContent);
                                $(document).off('click.outsideClick'); // Remove the click event listener to avoid multiple bindings
                            }
                        });
                    });
                });
            </script>            

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
</body>

</html>

@endsection
