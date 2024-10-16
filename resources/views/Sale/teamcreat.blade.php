@extends('layout.header')
{{--@section('head_new_btn_link', route('crm.show' , ['crm' => 'new']))--}}
@section('lead', route('crm.pipeline.list'))
@section('calendar', route('crm.pipeline.calendar'))
@section('activity', route('crm.pipeline.activity'))
@section('char_area', route('crm.pipeline.graph'))

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
        <a href="{{route('crm.forecasting')}}">Forecast</a>
        <a href="{{ route('crm.index') }}">Pipeline</a>
        <a href="{{ route('lead.index') }}">Leads</a>
        <a href="#">Activities</a>
    </div>
</li>
<li class="dropdown">
    <a href="#">Configuration</a>
    <div class="dropdown-content">
        <a href="#"><b>Sales Teams</b></a>
        <a href="#"><b>Activities</b></a>
        <a href="{{route('configuration.activitytype')}}" style="margin-left: 15px;">Activity Types</a>
        <a href="#" style="margin-left: 15px;">Activity Plans</a>
        <a href="{{route('configuration.recurring_index')}}"><b>Recurring Plans</b></a>
        <a href="#"><b>Pipeline</b></a>
        <a href="{{route('configuration.tag_index')}}" style="margin-left: 15px;">Tags</a>
        <a href="{{route('configuration.lostreasons_index')}}" style="margin-left: 15px;">Lost Reasons</a>

    </div>
</li>
@endsection

@section('head_breadcrumb_title', 'Pipeline')
@section('head')
@vite([
'resources/css/crm_2.css',
])
@endsection
@section('content')

<style>
    #search-input {
        display: none;
    }

    .crmright_head_main__1 {
        display: none;
    }

    .seeting {
        display: none;
    }

</style>

<div class="o_action_manager">
    <div class="o_xxl_form_view h-100 o_form_view o_crm_team_form_view o_view_controller o_action">
        <div class="o_form_view_container">
            <div class="o_content">
                <div class="o_form_renderer o_form_editable d-flex d-print-block flex-nowrap h-100">
                    <div class="o_form_sheet_bg">
                        <div class="o_form_statusbar position-relative d-flex justify-content-between mb-0 mb-md-2 pb-2 pb-md-0">
                            <div class="o_statusbar_buttons d-flex align-items-center align-content-around flex-wrap gap-1"></div>
                        </div>
                        <div class="o_form_sheet position-relative">
                            <div class="oe_button_box" name="button_box"></div>
                            <div class="oe_title"><label class="o_form_label" for="name_0">Sales Team</label>
                                <h1>
                                    <div name="name" class="o_field_widget o_required_modifier o_field_char text-break"><input class="o_input o_field_translate" id="name_0" type="text" autocomplete="off" placeholder="e.g. North America"></div>
                                </h1>
                                <div name="options_active" class="o_row"><span name="opportunities">
                                        <div name="use_opportunities" class="o_field_widget o_field_boolean">
                                            <div class="o-checkbox form-check d-inline-block">
                                                <input type="checkbox" value="pipline" class="form-check-input" name="sales_type[]" id="use_opportunities_1" checked>
                                            <label class="form-check-label" for="use_opportunities_1"></label></div>
                                        </div><label class="o_form_label" for="use_opportunities_1">Pipeline<sup class="text-info p-1" data-tooltip-template="web.FieldTooltip" data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;Check this box to manage a presales process with opportunities.&quot;}}" data-tooltip-touch-tap-to-show="true">?</sup></label>
                                    </span><span name="leads">
                                        <div name="use_leads" class="o_field_widget o_field_boolean">
                                            <div class="o-checkbox form-check d-inline-block">
                                                <input type="checkbox" value="leads" class="form-check-input" name="sales_type[]" id="use_leads_1">
                                            <label class="form-check-label" for="use_leads_1"></label></div>
                                        </div><label class="o_form_label" for="use_leads_1">Leads<sup class="text-info p-1" data-tooltip-template="web.FieldTooltip" data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;Check this box to filter and qualify incoming requests as leads before converting them into opportunities and assigning them to a salesperson.&quot;}}" data-tooltip-touch-tap-to-show="true">?</sup></label>
                                    </span></div>
                            </div>
                            <div class="o_group row align-items-start">
                                <div class="o_inner_group grid col-lg-6">
                                    <div class="g-col-sm-2">
                                        <div class="o_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">Team Details</div>
                                    </div>
                                    <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                        <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900"><label class="o_form_label" for="user_id_0">Team Leader</label></div>
                                        <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                            <div name="user_id" class="o_field_widget o_field_many2one_avatar_user o_field_many2one_avatar">
                                                <div class="d-flex align-items-center gap-1"><span class="o_avatar o_m2o_avatar"><span class="o_avatar_empty o_m2o_avatar_empty"></span></span>
                                                    <div class="o_field_many2one_selection">
                                                        <div class="o_input_dropdown">
                                                            <div class="o-autocomplete ">
                                                            <select type="text" class="o-autocomplete--input o_input form-control" autocomplete="off" role="combobox" aria-autocomplete="list" aria-haspopup="listbox" id="user_id_0" placeholder="" aria-expanded="false">
                                                                <option value="" style="display:none"></option>
                                                                @foreach($teams as $team)
                                                                <option value="{{$team->id}}">{{$team->name}}</option>
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
                                    <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0 div_hide_1">
                                        <div class="o_cell flex-grow-1 flex-sm-grow-0 o_wrap_label w-100 text-break text-900" style=""><label class="o_form_label" for="alias_name_0">Email Alias<sup class="text-info p-1" data-tooltip-template="web.FieldTooltip" data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;The name of the email alias, e.g. 'jobs' if you want to catch emails for <jobs@example.odoo.com>&quot;}}" data-tooltip-touch-tap-to-show="true">?</sup></label></div>
                                        <div class="o_cell flex-grow-1 flex-sm-grow-0" style="width: 100%;">
                                            <div name="alias_def">
                                                <div name="alias_id" class="o_field_widget o_field_many2one oe_read_only">
                                                    <div class="o_field_many2one_selection">
                                                        <div class="o_input_dropdown">
                                                            <div class="o-autocomplete dropdown"><input type="text" class="o-autocomplete--input o_input" autocomplete="off" role="combobox" aria-autocomplete="list" aria-haspopup="listbox" id="alias_id_0" placeholder="" aria-expanded="false"></div><span class="o_dropdown_button"></span>
                                                        </div>
                                                    </div>
                                                    <div class="o_field_many2one_extra"></div>
                                                </div>
                                                <div class="oe_edit_only" name="edit_alias" dir="ltr">
                                                    <div name="alias_name" class="o_field_widget o_field_char oe_inline"><input class="o_input" id="alias_name_0" type="text" autocomplete="off" placeholder="Email"></div><div name="alias_domain_id" class="o_field_widget o_field_many2one oe_inline">
                                                        
                                                        <div class="o_field_many2one_extra"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0 div_hide_2">
                                        <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900"><label class="o_form_label" for="alias_contact_0">Accept Emails From<sup class="text-info p-1" data-tooltip-template="web.FieldTooltip" data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;Policy to post a message on the document using the mailgateway.\n- everyone: everyone can post\n- partners: only authenticated partners\n- followers: only followers of the related document or members of following channels\n&quot;}}" data-tooltip-touch-tap-to-show="true">?</sup></label></div>
                                        <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                            <div name="alias_contact" class="o_field_widget o_required_modifier o_field_selection"><select class="o_input pe-3" id="alias_contact_0">
                                                    <option value="false" style="display:none"></option>
                                                    <option value="&quot;everyone&quot;">Everyone</option>
                                                    <option value="&quot;partners&quot;">Authenticated Partners</option>
                                                    <option value="&quot;followers&quot;">Followers only</option>
                                                    <option value="&quot;employees&quot;">Authenticated Employees</option>
                                                </select></div>
                                        </div>
                                    </div>
                                    <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                        <div class="o_cell flex-grow-1 flex-sm-grow-0 o_wrap_label w-100 text-break text-900" style=""><label class="o_form_label" for="invoiced_target_0">Invoicing Target<sup class="text-info p-1" data-tooltip-template="web.FieldTooltip" data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;Revenue Target for the current month (untaxed total of paid invoices).&quot;}}" data-tooltip-touch-tap-to-show="true">?</sup></label></div>
                                        <div class="o_cell flex-grow-1 flex-sm-grow-0" style="width: 100%;">
                                            <div class="o_row">
                                                <div name="invoiced_target" class="o_field_widget o_field_monetary oe_inline">
                                                    <div class="text-nowrap d-inline-flex w-100 align-items-baseline position-relative"><span class="o_input position-absolute pe-none d-flex w-100"><span class="opacity-0 d-inline-block overflow-hidden mw-100 o_monetary_ghost_value"></span></span>
                                                    <input class="o_input flex-grow-1 flex-shrink-1" autocomplete="off" placeholder="0.00" id="invoiced_target_0" type="text"></div>
                                                </div><span class="flex-grow-1">/ Month</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="o_notebook d-flex w-100 horizontal flex-column">
                                <div class="o_notebook_headers">
                                    <ul class="nav nav-tabs flex-row flex-nowrap">
                                        <li class="nav-item flex-nowrap cursor-pointer"><a class="nav-link active" href="#" role="tab" tabindex="0" name="members_users">Members</a></li>
                                    </ul>
                                </div>
                                <div class="o_notebook_content tab-content">
                                    <div class="tab-pane active fade show">
                                        <div name="member_ids" class="o_field_widget o_field_many2many w-100">
                                            <div class="o_kanban_view o_field_x2many o_field_x2many_kanban">
                                                <div class="o_x2m_control_panel d-empty-none mb-4">
                                                    <div class="o_cp_buttons gap-1" role="toolbar" aria-label="Control panel buttons"><button type="button" class="btn btn-secondary o-kanban-button-new">Add</button></div>
                                                </div>
                                                <div class="o_kanban_renderer o_renderer d-flex o_kanban_ungrouped align-content-start flex-wrap justify-content-start">
                                                    <article class="o_kanban_record d-flex cursor-pointer flex-grow-1 flex-md-shrink-1 flex-shrink-0 o_legacy_kanban_record" data-id="datapoint_147" tabindex="0">
                                                        <div class="oe_kanban_card oe_kanban_global_click">
                                                            <div class="o_kanban_card_content d-flex">
                                                                <div><img class="o_kanban_image o_image_64_cover" alt="Avatar" loading="lazy" src="https://yantra-design4.odoo.com/web/image/res.users/2/avatar_128"></div>
                                                                <div class="oe_kanban_details d-flex flex-column ms-3"><strong class="o_kanban_record_title oe_partner_heading"><span>info@yantradesign.co.in</span></strong><a class="nav-link p-0 oe_kanban_action oe_kanban_action_a" href="#"></a>
                                                                    <div class="d-flex align-items-baseline text-break"><i class="fa fa-envelope me-1" role="img" aria-label="Email" title="Email"></i><span>info@yantradesign.co.in</span></div>
                                                                </div>
                                                                <div class="o_member_assignment">
                                                                    <div name="lead_month_count" class="o_field_widget o_readonly_modifier o_field_gauge">
                                                                        <div class="oe_gauge position-relative"><canvas width="100" height="80" style="display: block; box-sizing: border-box; height: 80px; width: 100px;"></canvas><span class="o_gauge_value position-absolute start-0 end-0 bottom-0 text-center">14</span></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </article>
                                                    <article class="o_kanban_record d-flex cursor-pointer flex-grow-1 flex-md-shrink-1 flex-shrink-0 o_legacy_kanban_record" data-id="datapoint_153" tabindex="0">
                                                        <div class="oe_kanban_card oe_kanban_global_click">
                                                            <div class="o_kanban_card_content d-flex">
                                                                <div><img class="o_kanban_image o_image_64_cover" alt="Avatar" loading="lazy" src="https://yantra-design4.odoo.com/web/image/res.users/6/avatar_128"></div>
                                                                <div class="oe_kanban_details d-flex flex-column ms-3"><strong class="o_kanban_record_title oe_partner_heading"><span>Karan</span></strong><a class="nav-link p-0 oe_kanban_action oe_kanban_action_a" href="#"></a>
                                                                    <div class="d-flex align-items-baseline text-break"><i class="fa fa-envelope me-1" role="img" aria-label="Email" title="Email"></i><span>karanplacecode12@gmail.com</span></div>
                                                                </div>
                                                                <div class="o_member_assignment">
                                                                    <div name="lead_month_count" class="o_field_widget o_readonly_modifier o_field_gauge">
                                                                        <div class="oe_gauge position-relative"><canvas width="100" height="80" style="display: block; box-sizing: border-box; height: 80px; width: 100px;"></canvas><span class="o_gauge_value position-absolute start-0 end-0 bottom-0 text-center">1</span></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </article>
                                                    <div class="o_kanban_record o_kanban_ghost flex-grow-1 flex-md-shrink-1 flex-shrink-0 my-0"></div>
                                                    <div class="o_kanban_record o_kanban_ghost flex-grow-1 flex-md-shrink-1 flex-shrink-0 my-0"></div>
                                                    <div class="o_kanban_record o_kanban_ghost flex-grow-1 flex-md-shrink-1 flex-shrink-0 my-0"></div>
                                                    <div class="o_kanban_record o_kanban_ghost flex-grow-1 flex-md-shrink-1 flex-shrink-0 my-0"></div>
                                                    <div class="o_kanban_record o_kanban_ghost flex-grow-1 flex-md-shrink-1 flex-shrink-0 my-0"></div>
                                                    <div class="o_kanban_record o_kanban_ghost flex-grow-1 flex-md-shrink-1 flex-shrink-0 my-0"></div>
                                                </div>
                                                <div class="o_kanban_renderer o_renderer d-flex o_kanban_ungrouped align-content-start flex-wrap justify-content-start">
                                                    <div class="o_kanban_record o_kanban_ghost flex-grow-1 flex-md-shrink-1 flex-shrink-0 my-0"></div>
                                                    <div class="o_kanban_record o_kanban_ghost flex-grow-1 flex-md-shrink-1 flex-shrink-0 my-0"></div>
                                                    <div class="o_kanban_record o_kanban_ghost flex-grow-1 flex-md-shrink-1 flex-shrink-0 my-0"></div>
                                                    <div class="o_kanban_record o_kanban_ghost flex-grow-1 flex-md-shrink-1 flex-shrink-0 my-0"></div>
                                                    <div class="o_kanban_record o_kanban_ghost flex-grow-1 flex-md-shrink-1 flex-shrink-0 my-0"></div>
                                                    <div class="o_kanban_record o_kanban_ghost flex-grow-1 flex-md-shrink-1 flex-shrink-0 my-0"></div>
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
                                <div class="o-mail-Chatter-topbar d-flex flex-shrink-0 flex-grow-0 overflow-x-auto"><button class="o-mail-Chatter-sendMessage btn text-nowrap me-1 btn-primary my-2" data-hotkey="m"> Send message </button><button class="o-mail-Chatter-logNote btn text-nowrap me-1 btn-secondary my-2" data-hotkey="shift+m"> Log note </button>
                                    <div class="flex-grow-1 d-flex"><span class="o-mail-Chatter-topbarGrow flex-grow-1 pe-2"></span><button class="btn btn-link text-action" aria-label="Search Messages" title="Search Messages"><i class="oi oi-search" role="img"></i></button><span style="display:contents"><button class="o-mail-Chatter-attachFiles btn btn-link text-action px-1 d-flex align-items-center my-2" aria-label="Attach files"><i class="fa fa-paperclip fa-lg me-1"></i></button></span><input type="file" class="o_input_file d-none o-mail-Chatter-fileUploader" multiple="multiple" accept="*">
                                        <div class="o-mail-Followers d-flex me-1"><button class="o-mail-Followers-button btn btn-link d-flex align-items-center text-action px-1 my-2 o-dropdown dropdown-toggle dropdown" disabled="" title="Show Followers" aria-expanded="false"><i class="fa fa-user-o me-1" role="img"></i><sup class="o-mail-Followers-counter">0</sup></button></div><button class="o-mail-Chatter-follow btn btn-link  px-0 text-600">
                                            <div class="position-relative"><span class="d-flex invisible text-nowrap">Following</span><span class="position-absolute end-0 top-0"> Follow </span></div>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="o-mail-Chatter-content">
                                <div class="o-mail-Thread position-relative flex-grow-1 d-flex flex-column overflow-auto pb-4" tabindex="-1">
                                    <div class="d-flex flex-column position-relative flex-grow-1"><span class="position-absolute w-100 invisible top-0" style="height: Min(1587px, 100%)"></span><span></span>
                                        <div class="o-mail-DateSection d-flex align-items-center w-100 fw-bold z-1 pt-2">
                                            <hr class="o-discuss-separator flex-grow-1"><span class="px-2 smaller text-muted">Today</span>
                                            <hr class="o-discuss-separator flex-grow-1">
                                        </div>
                                        <div class="o-mail-Message position-relative pt-1 o-selfAuthored mt-1" role="group" aria-label="System notification">
                                            <div class="o-mail-Message-core position-relative d-flex flex-shrink-0">
                                                <div class="o-mail-Message-sidebar d-flex flex-shrink-0 align-items-start justify-content-start">
                                                    <div class="o-mail-Message-avatarContainer position-relative bg-view cursor-pointer" aria-label="Open card"><img class="o-mail-Message-avatar w-100 h-100 rounded o_object_fit_cover o_redirect cursor-pointer" src="https://yantra-design4.odoo.com/web/image/res.partner/3/avatar_128?unique=1726641313000"></div>
                                                </div>
                                                <div class="w-100 o-min-width-0">
                                                    <div class="o-mail-Message-header d-flex flex-wrap align-items-baseline lh-1 mb-1"><span class="o-mail-Message-author small cursor-pointer o-hover-text-underline" aria-label="Open card"><strong class="me-1">info@yantradesign.co.in</strong></span><small class="o-mail-Message-date text-muted smaller" title="26/9/2024, 10:19:05 am">- now</small></div>
                                                    <div class="position-relative d-flex">
                                                        <div class="o-mail-Message-content o-min-width-0">
                                                            <div class="o-mail-Message-textContent position-relative d-flex">
                                                                <div>
                                                                    <div>
                                                                        <div class="o-mail-Message-body text-break mb-0 w-100">Creating a new record...</div>
                                                                    </div>
                                                                </div>
                                                                <div class="o-mail-Message-actions d-print-none ms-2 mt-1 invisible">
                                                                    <div class="d-flex rounded-1 overflow-hidden"><button class="btn px-1 py-0 lh-1 rounded-0 rounded-start-1" tabindex="1" title="Add a Reaction" aria-label="Add a Reaction"><i class="oi fa-lg oi-smile-add"></i></button><button class="btn px-1 py-0 rounded-0 rounded-end-1" title="Mark as Todo" name="toggle-star"><i class="fa fa-lg fa-star-o"></i></button></div>
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

<script>
$(document).ready(function() {
    // When the page loads, check if the checkbox is unchecked
    toggleDivVisibility();

    // Event listener for checkbox changes
    $('#use_opportunities_1, #use_leads_1').on('change', function() {
        toggleDivVisibility();
    });

    function toggleDivVisibility() {
        // Check if the checkbox for opportunities is unchecked
        if (!$('#use_opportunities_1, #use_leads_1').is(':checked')) {
            // Hide the related divs
            $('.div_hide_1').attr('style', 'display:none !important');
            $('.div_hide_2').attr('style', 'display:none !important');
        } else {
            // Show the related divs
          $('.div_hide_1').show();
            $('.div_hide_2').show();
        }

        // Check if the checkbox for leads is unchecked (you can add more conditions if needed)
        if (!$('#use_leads_1').is(':checked')) {
            // You can hide more divs related to 'Leads' here
            console.log("Leads checkbox is unchecked");
        }
    }
});

</script>
<script>
    $(document).ready(function(){
        $('#main_save_btn').click(function(event) {
            console.log('clicked');
            var name =  $('#name_0').val();
            var team_leader =  $('#user_id_0').val();
            var email =  $('#alias_name_0').val();
            var accept =  $('#alias_contact_0').val();
            var invoiced =  $('#invoiced_target_0').val();
            var sales_type = $('input[name="sales_type[]"]:checked').map(function() {
                return this.value;
            }).get();

             if (!name) {
                toastr.error('fields is required');
                $('#name_0').css({
                    'border-color': 'red',
                    'background-color': '#ff99993d'
                });
                return; // Stop form submission
            }

        $.ajax({
            url: "{{route('sales.teams_store')}}",
            type: 'POST',
            data: {
                name: name,
                team_leader: team_leader,
                email: email,
                accept: accept,
                invoiced: invoiced,
                sales_type : sales_type,
                _token: "{{ csrf_token() }}"
            },
            success: function(data){
                console.log(data);
            }
        });
            
        });
    });
</script>


@endsection
