@extends('layout.header')
@section('content')
@section('head_breadcrumb_title', 'Leads')
@section('kanban', route('lead.kanban', ['lead' => 'kanban']))
@section('calendar', route('lead.calendar', ['lead' => 'calendar']))
@section('char_area', route('lead.graph'))
@vite([
'resources/css/chats.css',
// 'resources/css/odoo/web.assets_web_print.min.css'
])
@section('navbar_menu')
<li class="dropdown">
    <a href="#">Sales</a>
    <div class="dropdown-content">
        <a href="#">My Pipeline</a>
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
        <a href="{{route('crm.forecasting')}}">Forecast</a>
        <a href="#">Pipeline</a>
        <a href="#">Leads</a>
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

<div class="o_content">
    <div class="o_activity_view h-100" xml:space="preserve">
        <table class="table table-bordered mb-5 bg-view o_activity_view_table">
            <thead>
                <tr>
                    <th></th>
                    <th class="o_activity_type_cell p-3" width="16.666666666666668%">
                        <div><span>Email</span></div>
                        <div class="o_activity_counter d-flex align-items-center justify-content-between mb-3 h-0 mt24"></div>
                    </th>
                    <th class="o_activity_type_cell p-3" width="16.666666666666668%">
                        <div><span>Call</span></div>
                        <div class="o_activity_counter d-flex align-items-center justify-content-between mb-3 h-0 mt24"></div>
                    </th>
                    <th class="o_activity_type_cell p-3" width="16.666666666666668%">
                        <div><span>Meeting</span></div>
                        <div class="o_activity_counter d-flex align-items-center justify-content-between mb-3 h-0 mt24"></div>
                    </th>
                    <th class="o_activity_type_cell p-3" width="16.666666666666668%">
                        <div><span>To-Do</span></div>
                        <div class="o_activity_counter d-flex align-items-center justify-content-between mb-3 h-0 mt24">
                            <div class="o_column_progress progress bg-300 w-75">
                                <div role="progressbar" class="progress-bar o_bar_has_records cursor-pointer bg-success" aria-valuemin="0" aria-label="Progress bar" data-tooltip-delay="0" style="width: 100%;" aria-valuemax="2" aria-valuenow="2" data-tooltip="2 Planned" title=""></div>
                            </div>
                            <div class="o_animated_number ms-2 text-900 text-nowrap cursor-default false" title="Overdue + Today + Planned"><b>2</b></div>
                        </div>
                    </th>
                    <th class="o_activity_type_cell p-3" width="16.666666666666668%">
                        <div><span>Upload Document</span></div>
                        <div class="o_activity_counter d-flex align-items-center justify-content-between mb-3 h-0 mt24"></div>
                    </th>
                    <th class="o_activity_type_cell p-3" width="16.666666666666668%">
                        <div><span>Request Signature</span></div>
                        <div class="o_activity_counter d-flex align-items-center justify-content-between mb-3 h-0 mt24"></div>
                    </th>
                    <th class="align-middle" style="width: 32px; min-width: 32px">
                        <div class="o_optional_columns_dropdown text-center border-top-0"><button class="btn p-0 o-dropdown dropdown-toggle dropdown" tabindex="-1" aria-expanded="false"><i class="o_optional_columns_dropdown_toggle oi oi-fw oi-settings-adjust"></i></button></div>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="o_data_row h-100">
                    <td class="o_activity_record p-2 cursor-pointer">
                        <div>
                            <div name="user_id" class="o_field_widget o_field_many2one_avatar_user d-inline-block o_field_many2one_avatar_kanban o_field_many2one_avatar">
                                <div class="d-flex align-items-center gap-1" data-tooltip="info@yantradesign.co.in"><span class="o_avatar o_m2o_avatar d-flex"><img class="rounded" src="/web/image/res.users/2/avatar_128"></span></div>
                            </div>
                            <div class="flex-grow-1">
                                <div class="d-flex justify-content-between">
                                    <div class="d-block text-truncate o_text_block o_text_bold">Hindustan Times</div>
                                    <div class="m-1"></div>
                                    <div name="expected_revenue" class="o_field_widget o_field_empty o_field_monetary d-block text-truncate text-muted"><span>₹&nbsp;0.00</span></div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <div class="d-block text-truncate text-muted o_text_block"></div>
                                    <div class="m-1"></div>
                                    <div name="stage_id" class="o_field_widget o_field_badge d-inline-block"><span class="badge rounded-pill">New</span></div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="o_activity_summary_cell o_activity_empty_cell cursor-pointer"><i data-tooltip="Create" class="text-center fa fa-plus mt-2 align-items-center justify-content-center h-100"></i></td>
                    <td class="o_activity_summary_cell o_activity_empty_cell cursor-pointer"><i data-tooltip="Create" class="text-center fa fa-plus mt-2 align-items-center justify-content-center h-100"></i></td>
                    <td class="o_activity_summary_cell o_activity_empty_cell cursor-pointer"><i data-tooltip="Create" class="text-center fa fa-plus mt-2 align-items-center justify-content-center h-100"></i></td>
                    <td class="o_activity_summary_cell p-0 h-100 planned">
                        <div class="h-100 cursor-pointer p-1 d-flex flex-column justify-content-between">
                            <div class="d-flex align-items-center justify-content-center position-relative">
                                <div class="o-mail-ActivityCell-deadline">18/09/2024</div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="d-flex justify-content-start">
                                    <div class="o-mail-Avatar o_avatar d-flex align-items-center"><img class="rounded" src="/web/image/res.users/2/avatar_128"></div>
                                </div>
                                <div></div>
                            </div>
                        </div>
                    </td>
                    <td class="o_activity_summary_cell o_activity_empty_cell cursor-pointer"><i data-tooltip="Create" class="text-center fa fa-plus mt-2 align-items-center justify-content-center h-100"></i></td>
                    <td class="o_activity_summary_cell o_activity_empty_cell cursor-pointer"><i data-tooltip="Create" class="text-center fa fa-plus mt-2 align-items-center justify-content-center h-100"></i></td>
                    <td></td>
                </tr>
                <tr class="o_data_row h-100">
                    <td class="o_activity_record p-2 cursor-pointer">
                        <div>
                            <div name="user_id" class="o_field_widget o_field_many2one_avatar_user d-inline-block o_field_many2one_avatar_kanban o_field_many2one_avatar">
                                <div class="d-flex align-items-center gap-1" data-tooltip="info@yantradesign.co.in"><span class="o_avatar o_m2o_avatar d-flex"><img class="rounded" src="/web/image/res.users/2/avatar_128"></span></div>
                            </div>
                            <div class="flex-grow-1">
                                <div class="d-flex justify-content-between">
                                    <div class="d-block text-truncate o_text_block o_text_bold">HuffPost</div>
                                    <div class="m-1"></div>
                                    <div name="expected_revenue" class="o_field_widget o_field_empty o_field_monetary d-block text-truncate text-muted"><span>₹&nbsp;0.00</span></div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <div class="d-block text-truncate text-muted o_text_block"></div>
                                    <div class="m-1"></div>
                                    <div name="stage_id" class="o_field_widget o_field_badge d-inline-block"><span class="badge rounded-pill">New</span></div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="o_activity_summary_cell o_activity_empty_cell cursor-pointer"><i data-tooltip="Create" class="text-center fa fa-plus mt-2 align-items-center justify-content-center h-100"></i></td>
                    <td class="o_activity_summary_cell o_activity_empty_cell cursor-pointer"><i data-tooltip="Create" class="text-center fa fa-plus mt-2 align-items-center justify-content-center h-100"></i></td>
                    <td class="o_activity_summary_cell o_activity_empty_cell cursor-pointer"><i data-tooltip="Create" class="text-center fa fa-plus mt-2 align-items-center justify-content-center h-100"></i></td>
                    <td class="o_activity_summary_cell p-0 h-100 planned">
                        <div class="h-100 cursor-pointer p-1 d-flex flex-column justify-content-between">
                            <div class="d-flex align-items-center justify-content-center position-relative">
                                <div class="o-mail-ActivityCell-deadline">18/09/2024</div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="d-flex justify-content-start">
                                    <div class="o-mail-Avatar o_avatar d-flex align-items-center"><img class="rounded" src="/web/image/res.users/2/avatar_128"></div>
                                </div>
                                <div></div>
                            </div>
                        </div>
                    </td>
                    <td class="o_activity_summary_cell o_activity_empty_cell cursor-pointer"><i data-tooltip="Create" class="text-center fa fa-plus mt-2 align-items-center justify-content-center h-100"></i></td>
                    <td class="o_activity_summary_cell o_activity_empty_cell cursor-pointer"><i data-tooltip="Create" class="text-center fa fa-plus mt-2 align-items-center justify-content-center h-100"></i></td>
                    <td></td>
                </tr>
            </tbody>
            <tfoot>
                <tr class="o_data_row">
                    <td class="p-3" colspan="3"><span class="btn btn-link o_record_selector cursor-pointer"><i class="fa fa-plus pe-2"></i> Schedule activity </span></td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

@endsection
