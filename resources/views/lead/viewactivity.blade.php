@extends('layout.header')
@section('content')
@section('head_breadcrumb_title', 'Leads')
@section('kanban', route('lead.kanban', ['lead' => 'kanban']))
@section('calendar', route('lead.calendar', ['lead' => 'calendar']))
@section('char_area', route('lead.graph'))
@section('activity', route('lead.activity'))
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
                    </th>
                    <th class="o_activity_type_cell p-3" width="16.666666666666668%">
                        <div><span>Call</span></div>
                    </th>
                    <th class="o_activity_type_cell p-3" width="16.666666666666668%">
                        <div><span>Meeting</span></div>
                    </th>
                    <th class="o_activity_type_cell p-3" width="16.666666666666668%">
                        <div><span>To-Do</span></div>
                    </th>
                    <th class="o_activity_type_cell p-3" width="16.666666666666668%">
                        <div><span>Upload Document</span></div>
                    </th>
                    <th class="o_activity_type_cell p-3" width="16.666666666666668%">
                        <div><span>Request Signature</span></div>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($activities as $lead_id => $leadActivities)
                @php
                $lead = $leadActivities->first(); // Get the first activity to display lead-related data once
                @endphp
                <tr class="o_data_row h-100">
                    <td class="o_activity_record p-2 cursor-pointer">
                        <div>
                            <div name="user_id" class="o_field_widget o_field_many2one_avatar_user d-inline-block">
                                <div class="d-flex align-items-center gap-1" data-tooltip="info@yantradesign.co.in">
                                    <span class="o_avatar o_m2o_avatar d-flex">
                                        <img class="rounded" src="/web/image/res.users/2/avatar_128">
                                    </span>
                                </div>
                            </div>
                            <div class="flex-grow-1">
                                <div class="d-flex justify-content-between">
                                    <div class="d-block text-truncate o_text_block o_text_bold">{{ $lead->product_name }}</div>
                                    <div name="expected_revenue" class="o_field_widget o_field_empty o_field_monetary d-block text-truncate text-muted">
                                        <span>₹{{$lead->probability ?? '0.00'}}</span>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <div class="d-block text-truncate text-muted o_text_block"></div>
                                    <div name="stage_id" class="o_field_widget o_field_badge d-inline-block">
                                        <span class="badge rounded-pill">New</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>

                    <td class="o_activity_summary_cell" data-id="{{$lead->lead_id}}" data-activity_type="email">
                        @php
                        $emailActivity = $leadActivities->where('activity_type', 'email')->first();
                        @endphp
                        @if($emailActivity)
                        <div class="text-center bg-warning text-white">
                            <small>{{ $emailActivity->due_date ?? '' }}</small>
                        </div>
                        <div class="o_popover popover mw-100 o-popover--with-arrow bs-popover-bottom o-popover-bottom o-popover--bs d-none">
                            <div class="o-mail-ActivityListPopover d-flex flex-column">
                                <div class="overflow-y-auto d-flex flex-column flex-grow-1">
                                    <div class="d-flex bg-100 py-2 border-bottom">
                                        <span class="o-mail-ActivityListPopover-todayTitle text-warning fw-bold mx-3">Today</span>
                                        <span class="flex-grow-1"></span>
                                        <span class="badge rounded-pill text-bg-warning mx-3 align-self-center">1</span>
                                    </div>
                                    <div class="o-mail-ActivityListPopoverItem d-flex flex-column border-bottom py-2">
                                        <div class="overflow-auto d-flex align-items-baseline ms-3 me-1">
                                            <b class="text-900 me-2 text-truncate flex-grow-1">Email</b>
                                            <button class="o-mail-ActivityListPopoverItem-markAsDone btn btn-sm btn-success btn-link" title="Mark as done" aria-label="Mark as done">
                                                <i class="fa fa-check"></i>
                                            </button>
                                            <button class="o-mail-ActivityListPopoverItem-editbtn btn btn-sm btn-success btn-link" title="Edit" aria-label="Edit">
                                                <i class="fa fa-pencil"></i>
                                            </button>
                                            <button class="o-mail-ActivityListPopoverItem-cancel btn btn-sm btn-danger btn-link" title="Cancel" aria-label="Cancel">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </div>
                                        <div class="d-flex align-items-center flex-wrap mx-3">
                                            <img class="me-2 rounded" style="max-width: 1.5rem; max-height: 1.5rem;" src="https://yantra-design1.odoo.com/web/image?field=avatar_128&amp;id=2&amp;model=res.users">
                                            <div class="mt-1">
                                                <small class="text-truncate">info@yantradesign.co.in</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="popover-arrow end-auto"></div>
                        </div>
                        @endif
                    </td>

                    <td class="o_activity_summary_cell" data-id={{$lead->lead_id}} data-activity_type="call">
                        @php
                        $callActivity = $leadActivities->where('activity_type', 'call')->first();
                        @endphp
                        @if($callActivity)
                        <div class="text-center bg-warning text-white">
                            <small>{{ $callActivity->due_date ?? '' }}</small>
                        </div>
                        @endif
                    </td>

                    <td class="o_activity_summary_cell" data-id="{{$lead->lead_id}}" data-activity_type="meeting">
                        @php
                        $meetingActivity = $leadActivities->where('activity_type', 'meeting')->first();
                        @endphp
                        @if($meetingActivity)
                        <div class="text-center bg-danger text-white">
                            <small>{{ $meetingActivity->due_date }}</small>
                        </div>
                        @endif
                    </td>

                    <td class="o_activity_summary_cell" data-id="{{$lead->lead_id}}" data-activity_type="to-do">
                        @php
                            $todoActivities = $leadActivities->where('activity_type', 'to-do')->where('status', 0)->sortBy('due_date');

                            // Get current date
                            $now = \Carbon\Carbon::now();
                            $startOfToday = $now->copy()->startOfDay();

                            // Calculate the counts for each status
                            $overdueActivities = $todoActivities->filter(function ($activity) use ($startOfToday) {
                                $dueDate = \Carbon\Carbon::parse($activity->due_date);
                                return $dueDate->lessThan($startOfToday);
                            });


                            $todayActivities = $todoActivities->filter(function ($activity) use ($now) {
                                $dueDate = \Carbon\Carbon::parse($activity->due_date); // Ensure due_date is a Carbon instance
                                return $now->isSameDay($dueDate); // Today
                            });

                            $plannedActivities = $todoActivities->filter(function ($activity) use ($now) {
                                $dueDate = \Carbon\Carbon::parse($activity->due_date); // Ensure due_date is a Carbon instance
                                return $now->lt($dueDate); // Planned
                            });

                            $overdueCount = $overdueActivities->count();
                            $todayCount = $todayActivities->count();
                            $plannedCount = $plannedActivities->count();
                        @endphp

                        @if($todoActivities->isNotEmpty())
                            <div class="text-center text-white" style="background-color:
                                @php
                                    $todoActivity = $todoActivities->first();
                                    $dueDate = \Carbon\Carbon::parse($todoActivity->due_date); // Ensure due_date is a Carbon instance
                                    $daysDiff = $now->diffInDays($dueDate, false);
                                    if ($daysDiff < 0) {
                                        echo '#d44c59'; // Overdue (red)
                                    } elseif ($daysDiff == 0) {
                                        echo '#e99d00'; // Today (orange)
                                    } else {
                                        echo '#28a745'; // Planned (green)
                                    }
                                @endphp;">
                                <small>{{ $dueDate->format('d-m-y') }}</small> <!-- Ensure dueDate is a Carbon instance -->
                            </div>

                            <div class="o_popover popover mw-100 o-popover--with-arrow bs-popover-bottom o-popover-bottom o-popover--bs d-none">
                                <div class="o-mail-ActivityListPopover d-flex flex-column">
                                    <div class="overflow-y-auto d-flex flex-column flex-grow-1">
                                        <!-- Overdue Section -->
                                        <div class="o-mail-ActivityListPopoverItem d-flex flex-column border-bottom py-2">
                                            <div class="overflow-auto d-flex align-items-baseline ms-3 me-1">
                                                <b class="text-900 me-2 text-truncate flex-grow-1">Overdue ({{ $overdueCount }})</b>
                                                <button class="o-mail-ActivityListPopoverItem-markAsDone-overdue btn btn-sm btn-success btn-link" title="Mark as done" aria-label="Mark as done" data-target=".overdue_feedback_div"><i class="fa fa-check"></i></button>
                                                <button class="o-mail-ActivityListPopoverItem-editbtn btn btn-sm btn-success btn-link" title="Edit" aria-label="Edit"><i class="fa fa-pencil"></i></button>
                                                <button class="o-mail-ActivityListPopoverItem-cancel btn btn-sm btn-danger btn-link" title="Cancel" aria-label="Cancel"><i class="fa fa-times"></i></button>
                                            </div>
                                            @foreach($overdueActivities as $value)
                                                <div class="d-flex align-items-center flex-wrap mx-3">
                                                    <img class="me-2 rounded" style="max-width: 1.5rem; max-height: 1.5rem;" src="https://yantra-design1.odoo.com/web/image?field=avatar_128&amp;id=2&amp;model=res.users">
                                                    <div class="mt-1">
                                                        @php
                                                        $dueDate = \Carbon\Carbon::parse($value->due_date); // Ensure due_date is a Carbon instance
                                                        $daysDiff = $now->diffInDays($dueDate, false);
                                                        $status = 'Overdue';
                                                        $bgColor = '#d44c59'; // Red color for overdue
                                                        @endphp
                                                        <small class="text-truncate" style="color: {{ $bgColor }};">
                                                            {{$lead->getUser->email}}- {{ $status }}
                                                        </small>

                                                    </div>
                                                    <div class="py-2 px-3 d-none overdue_feedback_div">
                                                        <textarea class="form-control" style="min-height: 70px;width:300px" id="overdue_feedback_write" rows="3" placeholder="Write Feedback"></textarea>
                                                        <div class="mt-2">
                                                            <button type="button" class="btn btn-sm btn-primary mx-2" aria-label="Done"> Done </button>
                                                            <button type="button" class="btn btn-sm btn-link overdue_discard" data-target=".overdue_feedback_div">Discard </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>

                                        <!-- Today Section -->
                                        <div class="o-mail-ActivityListPopoverItem d-flex flex-column border-bottom py-2">
                                            <div class="overflow-auto d-flex align-items-baseline ms-3 me-1">
                                                <b class="text-900 me-2 text-truncate flex-grow-1">Today ({{ $todayCount }})</b>
                                                <button class="o-mail-ActivityListPopoverItem-markAsDone btn btn-sm btn-success btn-link" title="Mark as done" aria-label="Mark as done"><i class="fa fa-check"></i></button>
                                                <button class="o-mail-ActivityListPopoverItem-editbtn btn btn-sm btn-success btn-link" title="Edit" aria-label="Edit"><i class="fa fa-pencil"></i></button>
                                                <button class="o-mail-ActivityListPopoverItem-cancel btn btn-sm btn-danger btn-link" title="Cancel" aria-label="Cancel"><i class="fa fa-times"></i></button>
                                            </div>
                                            @foreach($todayActivities as $value)
                                            <div class="d-flex align-items-center flex-wrap mx-3">
                                                <img class="me-2 rounded" style="max-width: 1.5rem; max-height: 1.5rem;" src="https://yantra-design1.odoo.com/web/image?field=avatar_128&amp;id=2&amp;model=res.users">
                                                <div class="mt-1">
                                                    @php
                                                    $dueDate = \Carbon\Carbon::parse($value->due_date); // Ensure due_date is a Carbon instance
                                                    $status = 'Today';
                                                    $bgColor = '#e99d00'; // Orange color for today
                                                    @endphp
                                                    <small class="text-truncate" style="color: {{ $bgColor }};">
                                                        {{$lead->getUser->email}} - {{ $status }}
                                                    </small>
                                                </div>
                                                <div class="py-2 px-3 d-none today_feedback_div">
                                                    <textarea class="form-control" style="min-height: 70px;width:300px" rows="3" placeholder="Write Feedback"></textarea>
                                                    <div class="mt-2">
                                                        <button type="button" class="btn btn-sm btn-primary mx-2" aria-label="Done"> Done </button>
                                                        <button type="button" class="btn btn-sm btn-link"> Discard </button>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>

                                        <!-- Planned Section -->
                                        <div class="o-mail-ActivityListPopoverItem d-flex flex-column border-bottom py-2">
                                            <div class="overflow-auto d-flex align-items-baseline ms-3 me-1">
                                                <b class="text-900 me-2 text-truncate flex-grow-1">Planned ({{ $plannedCount }})</b>
                                                <button class="o-mail-ActivityListPopoverItem-markAsDone btn btn-sm btn-success btn-link" title="Mark as done" aria-label="Mark as done"><i class="fa fa-check"></i></button>
                                                <button class="o-mail-ActivityListPopoverItem-editbtn btn btn-sm btn-success btn-link" title="Edit" aria-label="Edit"><i class="fa fa-pencil"></i></button>
                                                <button class="o-mail-ActivityListPopoverItem-cancel btn btn-sm btn-danger btn-link" title="Cancel" aria-label="Cancel"><i class="fa fa-times"></i></button>
                                            </div>
                                            @foreach($plannedActivities as $value)
                                            <div class="d-flex align-items-center flex-wrap mx-3">
                                                <img class="me-2 rounded" style="max-width: 1.5rem; max-height: 1.5rem;" src="https://yantra-design1.odoo.com/web/image?field=avatar_128&amp;id=2&amp;model=res.users">
                                                <div class="mt-1">
                                                    @php
                                                    $dueDate = \Carbon\Carbon::parse($value->due_date);
                                                    $status = 'Planned';
                                                    $bgColor = '#28a745';
                                                    @endphp
                                                    <small class="text-truncate" style="color: {{ $bgColor }};">
                                                        {{$lead->getUser->email}} - {{ $status }} - {{ $dueDate->format('d-m-y') }}
                                                    </small>
                                                </div>
                                                <div class="py-2 px-3 d-none planned_feedback_div">
                                                    <textarea class="form-control" style="min-height: 70px;width:300px" rows="3" placeholder="Write Feedback"></textarea>
                                                    <div class="mt-2">
                                                        <button type="button" class="btn btn-sm btn-primary mx-2" aria-label="Done"> Done </button>
                                                        <button type="button" class="btn btn-sm btn-link"> Discard </button>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="popover-arrow end-auto"></div>
                            </div>
                        @endif
                    </td>


                    <td class="o_activity_summary_cell" data-id="{{$lead->lead_id}}" data-activity_type="upload_document">
                        @php
                        $uploadActivity = $leadActivities->where('activity_type', 'upload_document')->first();
                        @endphp
                        @if($uploadActivity)
                        <div class="text-center bg-warning text-white">
                            <small>{{ $uploadActivity->due_date ?? '' }}</small>
                        </div>
                        <div class="o_popover popover mw-100 o-popover--with-arrow bs-popover-bottom o-popover-bottom o-popover--bs" style="position: fixed; top: 283px; left: 320.984px;">
                            <div class="o-mail-ActivityListPopover d-flex flex-column">
                                <div class="overflow-y-auto d-flex flex-column flex-grow-1">
                                    <div class="d-flex bg-100 py-2 border-bottom"><span class="o-mail-ActivityListPopover-todayTitle text-warning fw-bold mx-3">Today</span>
                                        <span class="flex-grow-1"></span><span class="badge rounded-pill text-bg-warning mx-3 align-self-center">1</span></div>
                                    <div class="o-mail-ActivityListPopoverItem d-flex flex-column border-bottom py-2">
                                        <div class="overflow-auto d-flex align-items-baseline ms-3 me-1"><b class="text-900 me-2 text-truncate flex-grow-1">Email</b>
                                            <button class="o-mail-ActivityListPopoverItem-markAsDone btn btn-sm btn-success btn-link" title="Mark as done" aria-label="Mark as done">
                                                <i class="fa fa-check"></i>
                                            </button>
                                            <button class="o-mail-ActivityListPopoverItem-editbtn btn btn-sm btn-success btn-link" title="Edit" aria-label="Edit">
                                                <i class="fa fa-pencil"></i>
                                            </button><button class="o-mail-ActivityListPopoverItem-cancel btn btn-sm btn-danger btn-link" title="Cancel" aria-label="Cancel"><i class="fa fa-times"></i></button></div>
                                        <div class="d-flex align-items-center flex-wrap mx-3"><img class="me-2 rounded" style="max-width: 1.5rem; max-height: 1.5rem;" src="https://yantra-design1.odoo.com/web/image?field=avatar_128&amp;id=2&amp;model=res.users">
                                            <div class="mt-1"><small class="text-truncate">info@yantradesign.co.in</small></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="popover-arrow end-auto"></div>
                        </div>
                        @endif
                    </td>

                    <td class="o_activity_summary_cell" data-id="{{$lead->lead_id}}" data-activity_type="request_signature">
                        @php
                        $requestSignatureActivity = $leadActivities->where('activity_type', 'request_signature')->first();
                        @endphp
                        @if($requestSignatureActivity)
                        <div class="text-center">
                            <small>{{ $requestSignatureActivity->due_date ?? '' }}</small>
                        </div>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>

            <tfoot>
                <tr class="o_data_row">
                    <td class="p-3" colspan="3">
                        <span class="btn btn-link o_record_selector cursor-pointer schedule_activity">
                            <i class="fa fa-plus pe-2"></i> Schedule activity
                        </span>
                    </td>
                </tr>
            </tfoot>
        </table>

    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="activitiesAddModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="activitiesAddModalLable" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="activitiesAddModalLable">Schedule Activity</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="scheduleForm" action="{{ route('lead.scheduleActivityStore') }}" method="POST" enctype="application/x-www-form-urlencoded">
                @csrf
                <input type="hidden" value="{{$data->id ?? ''}}" name="lead_id">
                <div class="modal-body">
                    <div class="row col-md-12">
                        <div class="col-md-6">
                            <div class="d-flex align-items-center">
                                <div class="col-md-4">
                                    <label for="activity_type" class="mr-2">Activity Type</label>
                                </div>
                                <div class="col-md-8 activityTypeField">
                                    <select class="form-control activity_type" id="activity_type" name="activity_type" style="width: 100%;">
                                        <option value="email">Email</option>
                                        <option value="call">Call</option>
                                        <option value="meeting">Meeting</option>
                                        <option value="to-do" selected>To-Do</option>
                                        <option value="upload_document">Upload Document</option>
                                        <option value="request_signature">Request Signature</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 dueDateField">
                            <!-- Due Date field -->
                            <div class="d-flex align-items-center">
                                <div class="col-md-4">
                                    <label for="" class="mr-2">Due Date</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="o_cell flex-grow-1 flex-sm-grow-0" style="width: 100%;">
                                        <div class="o_row o_row_readonly">
                                            <div name="due_date" class="o_field_widget">
                                                <div class="d-inline-flex w-100"><input class="o_input datepicker" name="due_date" placeholder="Select Due Date" style="width: 300px;" type="text" id="due_date"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mt-3 summaryField">
                            <div class="d-flex align-items-center">
                                <div class="col-md-4">
                                    <label for="summary" class="mr-2">Summary</label>
                                </div>
                                <div class="col-md-8">
                                    <input class="form-control" placeholder="e.g. Discuss proposal" style="width: 300px;" type="text" id="summary" name="summary">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mt-3 assignedToField">
                            <div class="d-flex align-items-center">
                                <div class="col-md-4">
                                    <label for="assigned_to" class="mr-2">Assigned to</label>
                                </div>
                                <div class="col-md-8">
                                    <select class="form-control" id="assigned_to" name="assigned_to" style="width: 100%;">
                                        {{-- @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->email }}</option>
                                        @endforeach --}}
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mt-3 logNoteField">
                            <textarea name="log_note" id="log_note" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer modal-footer-custom gap-1" style="justify-content: start;">
                    <button type="submit" class="btn btn-primary">Schedule</button>
                    <!-- <button type="submit" class="btn btn-secondary">Schedule & Mark as Done</button>
            <button type="submit" class="btn btn-secondary">Done & Schedule Next</button> -->
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script>
    $(document).ready(function() {
        $('.schedule_activity').on('click', function() {
            $('#activitiesAddModal').modal('show');
        });

        $('.o-mail-ActivityListPopoverItem-markAsDone-overdue').on('click', function() {
            var targetDiv = $(this).data('target');
            $(this).closest('.o_popover').addClass('d-none');
            $(this).closest('.o-mail-ActivityListPopoverItem').find(targetDiv).toggleClass('d-none');
        });

        $('#overdue_feedback_write').on('click', function() {
            $(this).closest('.o_popover').addClass('d-none');
        });

        $('.overdue_discard').on('click', function() {
             var targetDiv = $(this).data('target');
            $(this).closest('.o_popover').addClass('d-none');
            $(this).closest('.o-mail-ActivityListPopoverItem').find(targetDiv).toggleClass('d-none');
        });


    });


    $(document).ready(function() {
        $('.o_activity_summary_cell').on('click', function(e) {
            // Get the popover inside the clicked cell
            let $popover = $(this).find('.o_popover');

            // Check if the popover is currently visible
            if ($popover.hasClass('d-none')) {
                // Hide all other popovers
                $('.o_popover').addClass('d-none');

                // Show the popover for the clicked cell
                $popover.removeClass('d-none');

                // Optional: Adjust the popover's position dynamically (if needed)
                let offset = $(this).offset();
                $popover.css({
                    'top': offset.top + $(this).height()
                    , 'left': offset.left
                });
            } else {
                // If already visible, hide the popover on the second click
                $popover.addClass('d-none');
            }
        });

        // Click outside to hide the popover
        $(document).on('click', function(e) {
            if (!$(e.target).closest('.o_activity_summary_cell').length) {
                $('.o_popover').addClass('d-none');
            }
        });
    });

</script>

@endsection
