@extends('layout.header')
{{--@section('head_new_btn_link', route('crm.show' , ['crm' => 'new']))--}}
@section('lead', route('crm.pipeline.list'))
@section('calendar', route('crm.pipeline.calendar'))
@section('activity', route('crm.pipeline.activity'))
@section('char_area', route('crm.pipeline.graph'))
@section('content')
@section('title', 'Sales')
@section('head_breadcrumb_title')
    <a href="{{ route('salesteam.index') }}">Sales Team</a>
    <br>
    <small>New</small>
@endsection
@section('head_new_btn_link', route('salesteam.create'))
@section('image_url', asset('images/Sales.png'))
@section('navbar_menu')

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
@vite(['resources/css/crm_2.css',])
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css">
<link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

@endsection
@section('content')

<style>

span.badge.bg-success,span.badge.bg-info {
    color: #fff;
    padding: 5px 15px;
    font-size: 14px;
    line-height: 1.2;
    border-radius: 100px;
}

    .crmright_head_main__1 {
        display: none;
    }
    .modal .modal-dialog .o_form_sheet .form-control {
        border-radius: 100px;
        padding: 8px 20px;
    }
    button.oe_kanban_card_removeicon {
        display: none;
    }
    .oe_kanban_card.oe_kanban_global_click:hover button.oe_kanban_card_removeicon {
        display: block;
    }
    .seeting {
        display: none;
    }

    .o-autocomplete--input{
        border: transparent;
    }

</style>

<div class="o_action_manager">
    <div class="o_xxl_form_view h-100 o_form_view o_crm_team_form_view o_view_controller o_action">
        <div class="o_form_view_container">
            <div class="o_content">
                <div class="o_form_renderer o_form_editable d-flex d-print-block flex-nowrap h-100">
                    <input type="hidden" id="team_id" value="{{ isset($data) ? $data->id : '' }}" name="team_id">
                    <div class="o_form_sheet_bg">
                        <div class="o_form_statusbar position-relative d-flex justify-content-between mb-0 mb-md-2 pb-2 pb-md-0">
                            <div class="o_statusbar_buttons d-flex align-items-center align-content-around flex-wrap gap-1"></div>
                        </div>
                        <div class="o_form_sheet position-relative" id="myForm">
                            <div class="oe_button_box" name="button_box"></div>
                            <div class="oe_title"><label class="o_form_label" for="name_0">Sales Team</label>
                                <h1>
                                    <div name="name" class="o_field_widget o_required_modifier o_field_char text-break">
                                        <input class="o_input o_field_translate" id="name_0" type="text" 
                                               value="{{ isset($data->name) ? $data->name : '' }}" 
                                               autocomplete="off" placeholder="e.g. North America">
                                    </div>                            
                                </h1>
                                @php
                                    // Convert the sales_type string (comma-separated) to an array
                                    $selected_sales_types = isset($data) && $data->sales_type ? explode(',', $data->sales_type) : [];
                                @endphp

                                <div name="options_active" class="o_row">
                                    <span name="opportunities">
                                        <div name="use_opportunities" class="o_field_widget o_field_boolean">
                                            <div class="o-checkbox form-check d-inline-block">
                                                <input type="checkbox" value="pipline" class="form-check-input" name="sales_type[]" 
                                                    id="use_opportunities_1" 
                                                    {{ in_array('pipline', $selected_sales_types) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="use_opportunities_10"></label>
                                            </div>
                                        </div>
                                        <label class="o_form_label" for="use_opportunities_10">Pipeline
                                            <sup class="text-info p-1" data-tooltip-template="web.FieldTooltip" data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;Check this box to manage a presales process with opportunities.&quot;}}" data-tooltip-touch-tap-to-show="true">?</sup>
                                        </label>
                                    </span>

                                    <span name="leads">
                                        <div name="use_leads" class="o_field_widget o_field_boolean">
                                            <div class="o-checkbox form-check d-inline-block">
                                                <input type="checkbox" value="leads" class="form-check-input" name="sales_type[]" 
                                                    id="use_leads_1" 
                                                    {{ in_array('leads', $selected_sales_types) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="use_leads_1"></label>
                                            </div>
                                        </div>
                                        <label class="o_form_label" for="use_leads_1">Leads
                                            <sup class="text-info p-1" data-tooltip-template="web.FieldTooltip" data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;Check this box to filter and qualify incoming requests as leads before converting them into opportunities and assigning them to a salesperson.&quot;}}" data-tooltip-touch-tap-to-show="true">?</sup>
                                        </label>
                                    </span>
                                </div>
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
                                                                <select type="text" class="o-autocomplete--input o_input form-control" autocomplete="off" role="combobox" aria-autocomplete="list" aria-haspopup="listbox" id="user_id_0" style="border:transparent;">
                                                                    <option value="" style="display:none; border:none;"></option>
                                                                    @foreach($teams as $team)
                                                                        <option value="{{ $team->id }}" 
                                                                                {{ isset($data) && $data->team_leader == $team->id ? 'selected' : '' }}>
                                                                            {{ $team->name }}
                                                                        </option>
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
                                                    <div name="alias_name" class="o_field_widget o_field_char oe_inline"><input class="o_input" id="alias_name_0" value="{{ isset($data->email) ? $data->email : '' }}"  type="text" autocomplete="off" placeholder="Email"></div><div name="alias_domain_id" class="o_field_widget o_field_many2one oe_inline">
                                                        
                                                        <div class="o_field_many2one_extra"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0 div_hide_2">
                                        <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900"><label class="o_form_label" for="alias_contact_0">Accept Emails From<sup class="text-info p-1" data-tooltip-template="web.FieldTooltip" data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;Policy to post a message on the document using the mailgateway.\n- everyone: everyone can post\n- partners: only authenticated partners\n- followers: only followers of the related document or members of following channels\n&quot;}}" data-tooltip-touch-tap-to-show="true">?</sup></label></div>
                                        <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                            <div name="alias_contact" class="o_field_widget o_required_modifier o_field_selection">
                                                <select class="o_input pe-3" id="alias_contact_0">
                                                    <option value="false" style="display:none"></option>
                                                    <option value="everyone" {{ isset($data) && $data->accept_emails_from == 'everyone' ? 'selected' : '' }}>Everyone</option>
                                                    <option value="partners" {{ isset($data) && $data->accept_emails_from == 'partners' ? 'selected' : '' }}>Authenticated Partners</option>
                                                    <option value="followers" {{ isset($data) && $data->accept_emails_from == 'followers' ? 'selected' : '' }}>Followers only</option>
                                                    <option value="employees" {{ isset($data) && $data->accept_emails_from == 'employees' ? 'selected' : '' }}>Authenticated Employees</option>
                                                </select></div>
                                        </div>
                                    </div>
                                    <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                        <div class="o_cell flex-grow-1 flex-sm-grow-0 o_wrap_label w-100 text-break text-900" style=""><label class="o_form_label" for="invoiced_target_0">Invoicing Target<sup class="text-info p-1" data-tooltip-template="web.FieldTooltip" data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;Revenue Target for the current month (untaxed total of paid invoices).&quot;}}" data-tooltip-touch-tap-to-show="true">?</sup></label></div>
                                        <div class="o_cell flex-grow-1 flex-sm-grow-0" style="width: 100%;">
                                            <div class="o_row">
                                                <div name="invoiced_target" class="o_field_widget o_field_monetary oe_inline">
                                                    <div class="text-nowrap d-inline-flex w-100 align-items-baseline position-relative"><span class="o_input position-absolute pe-none d-flex w-100"><span class="opacity-0 d-inline-block overflow-hidden mw-100 o_monetary_ghost_value"></span></span>
                                                    <input class="o_input flex-grow-1 flex-shrink-1" autocomplete="off" value="{{ isset($data->invoicing_target) ? $data->invoicing_target : '' }}"  placeholder="0.00" id="invoiced_target_0" type="text"></div>
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
                                                    <div class="o_cp_buttons gap-1" role="toolbar"
                                                        aria-label="Control panel buttons">
                                                        <button type="button"
                                                            class="btn btn-secondary o-kanban-button-new"
                                                            id="addSalespersonBtn" data-bs-toggle="modal"
                                                            data-bs-target="#salespersonModal">Add </button>
                                                    </div>
                                                    <form id="salesTeamForm">
                                                        <input type="hidden" id="salesperson_id" value="{{ isset($data) ? $data->id : '' }}">
                                                        <div class="container mt-5">
                                                            <!-- Modal Structure -->
                                                            <div class="modal fade" id="salespersonModal" tabindex="-1" aria-labelledby="salespersonModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                                                    <div class="modal-content">

                                                                        <!-- Modal Header -->
                                                                        <header class="modal-header">
                                                                            <h4 class="modal-title"
                                                                                id="salespersonModalLabel">Add:
                                                                                Salespersons</h4>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                            </header>
                                                                        </header>

                                                                        <!-- Modal Body -->
                                                                        <main class="modal-body">
                                                                            <div class="o_form_sheet position-relative" id="myForm">
                                                                                <!-- Search Bar -->
                                                                                <div class="mb-3" style=" text-align: center;display: flex; justify-content: space-around;">
                                                                                    <input type="text" id="searchInput" placeholder="Search..." class="form-control" style=" width: 300px; border-color: lightblue; margin-left: 0; margin-right: 0;">
                                                                                </div>
                                                                        
                                                                                <!-- Content goes here (table etc.) -->
                                                                                <div class="o_list_view o_view_controller">
                                                                                    <!-- Sample Table Structure -->
                                                                                    <table class="table table-striped">
                                                                                        <thead>
                                                                                            <tr>
                                                                                                <th><input type="checkbox" id="selectAllCheckbox"></th>
                                                                                                <th class="d-none">id</th>
                                                                                                <th>Name</th>
                                                                                                <th>Login</th>
                                                                                                <th>Language</th>
                                                                                                <th>Latest Authentication</th>
                                                                                                <th>Status</th>
                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody id="tableBody">
                                                                                            @foreach ($teams as $team)
                                                                                            <tr data-id="datapoint_{{ $team->id }}">
                                                                                                <td><input type="checkbox" class="selectRowCheckbox"></td>
                                                                                                <td class="d-none">{{$team->id}}</td>
                                                                                                <td>{{ $team->name }}</td>
                                                                                                <td>{{ $team->email }}</td>
                                                                                                <td>English (IN)</td> <!-- Static as per the requirements -->
                                                                                                <td>{{ $team->last_login_ip ?? '' }}</td>
                                                                                                <td>
                                                                                                    @if($team->is_confirmed == 1)
                                                                                                        <span class="badge bg-success">Confirmed</span>
                                                                                                    @else
                                                                                                        <span class="badge bg-info">Never Connected</span>
                                                                                                    @endif
                                                                                                </td>
                                                                                            </tr>
                                                                                            @endforeach
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                        
                                                                                <!-- Pagination Control -->
                                                                                <nav>
                                                                                    <ul class="pagination justify-content-end" id="paginationControls">
                                                                                        <li class="page-item"><a class="page-link" href="#" onclick="changePage(currentPage - 1)">Previous</a></li>
                                                                                        <!-- Dynamic page numbers will be injected here -->
                                                                                        <li class="page-item"><a class="page-link" href="#" onclick="changePage(currentPage + 1)">Next</a></li>
                                                                                    </ul>
                                                                                </nav>
                                                                            </div>
                                                                        </main>

                                                                        <!-- Modal Footer -->
                                                                        <footer class="modal-footer">
                                                                            <button type="button" class="btn btn-primary" id="selectButton" disabled>Select</button>
                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                        </footer>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    
                                                </div>
                                                <div class="o_kanban_record d-flex cursor-pointer flex-grow-1 flex-md-shrink-1 flex-shrink-0 o_legacy_kanban_record">
                                                    @foreach ($getMember as $record)
                                                    <article data-id="{{ $record->id }}" class="o_kanban_record d-flex cursor-pointer flex-grow-1 flex-md-shrink-1 flex-shrink-0 o_legacy_kanban_record" tabindex="0">
                                                        <div class="oe_kanban_card oe_kanban_global_click" style="border: 1px solid #d8dadd;width: auto;padding: 8px; position: relative;">
                                                            <!-- Delete Button on the left side -->
                                                            <button class="oe_kanban_card_removeicon btn btn-sm delete-record" style="position: absolute; right: 4px; top: 4px;" data-id="{{ $record->id }}">
                                                            
                                                              <i class="fa fa-trash-o"></i> 
                                                            </button>
                                                
                                                            <div class="o_kanban_card_content d-flex">
                                                                <div>
                                                                    <img class="o_kanban_image o_image_64_cover" alt="Avatar" src="{{ $record->user_image ?? '/images/placeholder.png' }}">
                                                                </div>
                                                                <div class="oe_kanban_details d-flex flex-column ms-3">
                                                                    <input type="hidden" value="{{ $record->id }}" name="recode_id[]">
                                                                    <strong class="o_kanban_record_title oe_partner_heading">
                                                                        <span>{{ $record->name }}</span>
                                                                    </strong>
                                                                    <div class="d-flex align-items-baseline text-break">
                                                                        <i class="fa fa-envelope me-1" role="img" aria-label="Email" title="Email"></i>
                                                                        <span>{{ $record->email }}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </article>
                                                    @endforeach
                                                </div>
                                                <div class="o_kanban_renderer o_renderer d-flex o_kanban_ungrouped align-content-start flex-wrap justify-content-start">
                                                    <div id="dynamicContentPlaceholder">
                                                    </div>
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

@endsection
@push('scripts')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>


<!-- Main Save BUtton Hide And Show -->

<script>
    $(document).ready(function() {
        const form = $('#myForm');
        const saveButton = $('#main_save_btn');
        const discardButton = $('#main_discard_btn');

        // Initialize default values for inputs
        const inputs = form.find('input, select, textarea');
        inputs.each(function() {
            if ($(this).is(':checkbox') || $(this).is(':radio')) {
                $(this).data('defaultChecked', $(this).is(':checked'));
            } else {
                $(this).data('defaultValue', $(this).val());
            }
        });

        // Function to check for changes
        function checkChanges() {
            let hasChanged = false;

            inputs.each(function() {
                if ($(this).is(':checkbox') || $(this).is(':radio')) {
                    if ($(this).is(':checked') !== $(this).data('defaultChecked')) {
                        hasChanged = true;
                    }
                } else if ($(this).is('select')) {
                    if ($(this).val() !== $(this).data('defaultValue')) {
                        hasChanged = true;
                    }
                } else {
                    if ($(this).val() !== $(this).data('defaultValue')) {
                        hasChanged = true;
                    }
                }
            });

            saveButton.toggle(hasChanged);
            discardButton.toggle(hasChanged);
        }

        // Event listeners for input and change events
        form.on('input change', checkChanges);

        // Handle paste and drop events on the textarea
        $('textarea#description').on('paste', function(event) {
            const clipboardData = event.originalEvent.clipboardData;
            const items = clipboardData.items;

            for (let i = 0; i < items.length; i++) {
                const item = items[i];
                if (item.kind === 'file' && item.type.startsWith('image/')) {
                    alert('Image pasted!');
                    saveButton.show(); // Show the save button
                    break; // Exit after finding the first image
                }
            }

            checkChanges(); // Check for changes when pasting
        });

        // Handle drop event
        $('textarea#description').on('drop', function(event) {
            event.preventDefault(); // Prevent default behavior (e.g., opening the file)
            const dataTransfer = event.originalEvent.dataTransfer;
            const items = dataTransfer.items;

            for (let i = 0; i < items.length; i++) {
                const item = items[i];
                if (item.kind === 'file' && item.type.startsWith('image/')) {
                    alert('Image dropped!');
                    saveButton.show(); // Show the save button
                    break; // Exit after finding the first image
                }
            }

            checkChanges(); // Check for changes when dropping
        });

        // Handle star selection for priority
        $('.o_priority_star').on('click', function(e) {
            e.preventDefault();
            const selectedValue = $(this).data('value');

            // Remove 'fa-star' class from all stars and add 'fa-star-o'
            $('.o_priority_star').removeClass('fa-star').addClass('fa-star-o');

            // Add 'fa-star' class to the selected star and all stars before it
            $(this).addClass('fa-star');
            $(this).prevAll('.o_priority_star').addClass('fa-star');

            // Update the default value for change detection
            inputs.each(function() {
                if ($(this).attr('data-value') === selectedValue) {
                    $(this).data('defaultValue',
                        selectedValue); // Update default value for change detection
                }
            });

            checkChanges(); // Check for changes after updating the priority
        });

        discardButton.on('click', function() {
            location.reload();
        });

        // Select2 initialization
        $('.o-autocomplete--input').select2();

        // Reset button visibility on form load
        saveButton.hide();
        discardButton.hide();
    });
</script>

<!-- Store And Fatch Data -->
<script>
    $(document).ready(function(){
        $('#main_save_btn').click(function(event) {
            event.preventDefault(); // Prevent default form submission

            var name =  $('#name_0').val();
            var team_leader = $('#user_id_0').val();
            var email =  $('#alias_name_0').val();
            var accept =  $('#alias_contact_0').val();
            var invoiced =  $('#invoiced_target_0').val();
            var sales_type = $('input[name="sales_type[]"]:checked').map(function() {
                return this.value;
            }).get();
            var team_id = $('#team_id').val(); // Ensure team_id is retrieved from the form
            var recode_ids = $('input[name="recode_id[]"]').map(function() {
                return this.value;
            }).get();
            console.log(recode_ids,'recode_ids')
            // Validate if the name field is empty
            if (!name) {
                toastr.error('Name field is required');
                $('#name_0').css({
                    'border-color': 'red',
                    'background-color': '#ff99993d'
                });
                return; // Stop form submission if validation fails
            }

            // Perform the AJAX request
            $.ajax({
                url: "{{ route('salesteam.store') }}", // Laravel route for saving data
                type: 'POST',
                data: {
                    team_id: team_id, 
                    name: name,
                    team_leader: team_leader,  
                    email: email,
                    accept: accept,
                    invoiced: invoiced,
                    sales_type: sales_type,
                    recode_ids : recode_ids,
                    _token: "{{ csrf_token() }}" // Add CSRF token for security
                },
                success: function(response) {
                    toastr.success(response.message); // Show success message
                    // setTimeout(function() {
                    //     // Redirect to the index page after successful save
                    //     window.location.href = "{{ route('salesteam.index') }}"; // Redirect to your desired route
                    // }, 2000); // 2 seconds delay for showing the success message
                },
                error: function(xhr, status, error) {
                    toastr.error('Something went wrong!'); // Handle errors
                }
            });

        });
    });
</script>

<!-- pipline And Leads Check Box Conditions -->
<script>
    $(document).ready(function() {
        // When the page loads, check if the checkbox is unchecked
        toggleDivVisibility();

        // Event listener for checkbox changes
        $('#use_opportunities_1, #use_leads_1').on('change', function() {
            toggleDivVisibility();
        });

        function toggleDivVisibility() {
            // Check if neither opportunities nor leads checkboxes are checked
            if (!$('#use_opportunities_1').is(':checked') && !$('#use_leads_1').is(':checked')) {
                // Hide the related divs
                $('.div_hide_1').attr("style", "display:none !important");
                $('.div_hide_2').attr("style", "display:none !important");
            } else {
                // Show the related divs if either checkbox is checked
                $('.div_hide_1').show();
                $('.div_hide_2').show();
            }

            // Additional check for the leads checkbox if needed
            if (!$('#use_leads_1').is(':checked')) {
                console.log("Leads checkbox is unchecked");
                // Hide any other specific divs for leads if necessary
            }
        }
    });
</script>

<!-- Second Model Scripting -->
<script>
    $(document).ready(function() {
       
        // Handle "Select All" checkbox
        $('#selectAllCheckbox').on('change', function() {
            $('.selectRowCheckbox').prop('checked', this.checked);
        });

        // Individual checkbox change handler
        $('.selectRowCheckbox').on('change', function() {
            $('#selectAllCheckbox').prop('checked', $('.selectRowCheckbox:checked').length === $('.selectRowCheckbox').length);
            $('#selectButton').prop('disabled', $('.selectRowCheckbox:checked').length === 0);
        });

        // When the Select button is clicked
        $('#selectButton').on('click', function() {
            const selectedRecords = [];
            $('.selectRowCheckbox:checked').each(function() {
                const row = $(this).closest('tr');
                const member_id = row.find('td:nth-child(2)').text(); // Hidden ID
                const name = row.find('td:nth-child(3)').text(); // Name
                const email = row.find('td:nth-child(4)').text(); // Email

                selectedRecords.push({ name, email, member_id });
                console.log(member_id);
            });

            // Inject the selected records into the Kanban view dynamically
            const kanbanContainer = $('#dynamicContentPlaceholder');
            selectedRecords.forEach(record => {
                const kanbanCard = `
                    <div class="o_kanban_record d-flex cursor-pointer flex-grow-1 flex-md-shrink-1 flex-shrink-0 o_legacy_kanban_record">
                        <article class="o_kanban_record d-flex cursor-pointer flex-grow-1 flex-md-shrink-1 flex-shrink-0 o_legacy_kanban_record" tabindex="0">
                            <div class="oe_kanban_card oe_kanban_global_click">
                                <div class="o_kanban_card_content d-flex">
                                    <div>
                                        <img class="o_kanban_image o_image_64_cover" alt="Avatar" src="${record.user_image || '/images/placeholder.png'}">
                                    </div>
                                    <div class="oe_kanban_details d-flex flex-column ms-3">
                                        <input type="hidden" value="${record.member_id}" name="recode_id[]">
                                        <strong class="o_kanban_record_title oe_partner_heading">
                                            <span>${record.name}</span>
                                        </strong>
                                        <div class="d-flex align-items-baseline text-break">
                                            <i class="fa fa-envelope me-1" role="img" aria-label="Email" title="Email"></i>
                                            <span>${record.email}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>`;
                kanbanContainer.append(kanbanCard);
            });

            // Close the modal
            const modal = bootstrap.Modal.getInstance($('#salespersonModal'));
            if (modal) {
                modal.hide();
            }

            // Clear selections after closing
            clearSelections();
        });

        // Clear selections function
        function clearSelections() {
            $('.selectRowCheckbox').prop('checked', false);
            $('#selectButton').prop('disabled', true); // Disable the select button
        }

        // Handle modal show to clear selections
        $('#salespersonModal').on('show.bs.modal', clearSelections);
    });

</script>
    
<!-- delete Record in kanban bar list -->
<script>
    $(document).ready(function() {
        $('.delete-record').click(function(event) {
            event.preventDefault(); // Prevent default action

            var memberId = $(this).data('id'); // Get the ID of the member to be deleted
            var teamId = $('#team_id').val(); // Get the current team ID

            // Confirm deletion
            if (confirm('Are you sure you want to delete this member?')) {
                $.ajax({
                    url: "{{ route('salesteam.destroy') }}", // Laravel route for deletion
                    type: 'DELETE',
                    data: {
                        member_id: memberId,
                        team_id: teamId,
                        _token: "{{ csrf_token() }}" // Add CSRF token for security
                    },
                    success: function(response) {
                        toastr.success(response.message); // Show success message
                        // Remove the member from the kanban view
                        $('article[data-id="' + memberId + '"]').remove();
                    },
                    error: function(xhr, status, error) {
                        toastr.error('Something went wrong while deleting the member!'); // Handle errors
                    }
                });
            }
        });
    });
</script>
    
<script>
    // Search functionality
    document.getElementById('searchInput').addEventListener('keyup', function() {
        const filter = this.value.toLowerCase();
        const rows = document.querySelectorAll('#tableBody tr');

        rows.forEach(row => {
            const name = row.cells[2].textContent.toLowerCase(); // Name in the third cell
            const email = row.cells[3].textContent.toLowerCase(); // Email in the fourth cell

            // Check if either name or email includes the search term
            if (name.includes(filter) || email.includes(filter)) {
                row.style.display = ''; // Show row if it matches
            } else {
                row.style.display = 'none'; // Hide row if it doesn't match
            }
        });
});
</script>


<script>
            let currentPage = 1;
        const rowsPerPage = 2; // Adjust this as needed
        let teams = @json($teams); // Assuming you pass this from your backend

        function renderTable() {
            const startIndex = (currentPage - 1) * rowsPerPage;
            const endIndex = startIndex + rowsPerPage;
            const paginatedTeams = teams.slice(startIndex, endIndex);
            
            const tableBody = document.getElementById('tableBody');
            tableBody.innerHTML = ''; // Clear existing rows

            paginatedTeams.forEach(team => {
                const row = `<tr data-id="datapoint_${team.id}">
                                <td><input type="checkbox" class="selectRowCheckbox"></td>
                                <td class="d-none">${team.id}</td>
                                <td>${team.name}</td>
                                <td>${team.email}</td>
                                <td>English (IN)</td>
                                <td>${team.last_login_ip || ''}</td>
                                <td>
                                    ${team.is_confirmed == 1 ? 
                                        '<span class="badge bg-success">Confirmed</span>' : 
                                        '<span class="badge bg-info">Never Connected</span>'}
                                </td>
                            </tr>`;
                tableBody.innerHTML += row;
            });

            updatePaginationControls();
        }

        function updatePaginationControls() {
            const paginationControls = document.getElementById('paginationControls');
            paginationControls.innerHTML = `
                <li class="page-item ${currentPage === 1 ? 'disabled' : ''}">
                    <a class="page-link" href="#" onclick="changePage(currentPage - 1)">Previous</a>
                </li>
            `;

            const pageCount = Math.ceil(teams.length / rowsPerPage);
            for (let i = 1; i <= pageCount; i++) {
                paginationControls.innerHTML += `
                    <li class="page-item ${currentPage === i ? 'active' : ''}">
                        <a class="page-link" href="#" onclick="changePage(${i})">${i}</a>
                    </li>`;
            }

            paginationControls.innerHTML += `
                <li class="page-item ${currentPage === pageCount ? 'disabled' : ''}">
                    <a class="page-link" href="#" onclick="changePage(currentPage + 1)">Next</a>
                </li>
            `;
        }

        function changePage(page) {
            const pageCount = Math.ceil(teams.length / rowsPerPage);
            if (page < 1 || page > pageCount) return; // Out of bounds
            currentPage = page;
            renderTable();
        }

        // Initial render
        renderTable();
</script>
@endpush


