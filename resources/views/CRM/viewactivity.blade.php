@extends('layout.header')
@section('content')
@section('head_breadcrumb_title', 'Pipeline')
@section('lead', route('crm.pipeline.list'))
@section('head_new_btn_link', route('crm.pipeline.create'))
@section('kanban', url('crm'))
@section('calendar', route('crm.pipeline.calendar'))
@section('activity', route('crm.pipeline.activity'))
@section('char_area', route('crm.pipeline.graph'))
<!-- @section('char_area', route('lead.graph')) -->
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
            <!-- Dropdown content for Reporting -->
            <a href="{{ route('crm.forecasting') }}">Forecast</a>
            <a href="{{ route('crm.pipeline.graph') }}">Pipeline</a>
            <a href="{{ route('lead.graph') }}">Leads</a>
            <a href="{{route('crm.pipeline.graph')}}">Activities</a>
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
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css">

<style>
    input {
        font-family: 'Roboto', sans-serif;
        display:block;
        border: none;
        border-radius: 0.25rem;
        border: 1px solid transparent;
        line-height: 1.5rem;
        padding: 0;
        font-size: 1rem;
        color: #607D8B;
        width: 100%;
        margin-top: 0.5rem;
    }
    input:focus {outline: none;}
    #ui-datepicker-div {
        display: none;
        background-color: #fff;
        box-shadow: 0 0.125rem 0.5rem rgba(0,0,0,0.1);
        margin-top: 0.25rem;
        border-radius: 0.5rem;
        padding: 0.5rem;
    }
    table {
        border-collapse: collapse;
        border-spacing: 0;
    }
    .ui-datepicker-calendar thead th {
        padding: 0.25rem 0;
        text-align: center;
        font-size: 0.75rem;
        font-weight: 400;
        color: #78909C;
    }
    .ui-datepicker-calendar tbody td {
        width: 2.5rem;
        text-align: center;
        padding: 0;
    }
    .ui-datepicker-calendar tbody td a {
        display: block;
        border-radius: 0.25rem;
        line-height: 2rem;
        transition: 0.3s all;
        color: #546E7A;
        font-size: 0.875rem;
        text-decoration: none;
    }
    .ui-datepicker-calendar tbody td a:hover {	
        background-color: #E0F2F1;
    }
    .ui-datepicker-calendar tbody td a.ui-state-active {
        background-color: #009688;
        color: white;
    }
    .ui-datepicker-header a.ui-corner-all {
        cursor: pointer;
        position: absolute;
        top: 0;
        width: 2rem;
        height: 2rem;
        margin: 0.5rem;
        border-radius: 0.25rem;
        transition: 0.3s all;
    }
    .ui-datepicker-header a.ui-corner-all:hover {
        background-color: #ECEFF1;
    }
    .ui-datepicker-header a.ui-datepicker-prev {	
        left: 0;	
        background: url("data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMyIgaGVpZ2h0PSIxMyIgdmlld0JveD0iMCAwIDEzIDEzIj48cGF0aCBmaWxsPSIjNDI0NzcwIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik03LjI4OCA2LjI5NkwzLjIwMiAyLjIxYS43MS43MSAwIDAgMSAuMDA3LS45OTljLjI4LS4yOC43MjUtLjI4Ljk5OS0uMDA3TDguODAzIDUuOGEuNjk1LjY5NSAwIDAgMSAuMjAyLjQ5Ni42OTUuNjk1IDAgMCAxLS4yMDIuNDk3bC00LjU5NSA0LjU5NWEuNzA0LjcwNCAwIDAgMS0xLS4wMDcuNzEuNzEgMCAwIDEtLjAwNi0uOTk5bDQuMDg2LTQuMDg2eiIvPjwvc3ZnPg==");
        background-repeat: no-repeat;
        background-size: 0.5rem;
        background-position: 50%;
        transform: rotate(180deg);
    }
    .ui-datepicker-header a.ui-datepicker-next {
        right: 0;
        background: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMyIgaGVpZ2h0PSIxMyIgdmlld0JveD0iMCAwIDEzIDEzIj48cGF0aCBmaWxsPSIjNDI0NzcwIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik03LjI4OCA2LjI5NkwzLjIwMiAyLjIxYS43MS43MSAwIDAgMSAuMDA3LS45OTljLjI4LS4yOC43MjUtLjI4Ljk5OS0uMDA3TDguODAzIDUuOGEuNjk1LjY5NSAwIDAgMSAuMjAyLjQ5Ni42OTUuNjk1IDAgMCAxLS4yMDIuNDk3bC00LjU5NSA0LjU5NWEuNzA0LjcwNCAwIDAgMS0xLS4wMDcuNzEuNzEgMCAwIDEtLjAwNi0uOTk5bDQuMDg2LTQuMDg2eiIvPjwvc3ZnPg==');
        background-repeat: no-repeat;
        background-size: 10px;
        background-position: 50%;
    }
    .ui-datepicker-header a>span {
        display: none;
    }
    .ui-datepicker-title {
        text-align: center;
        line-height: 2rem;
        margin-bottom: 0.25rem;
        font-size: 0.875rem;
        font-weight: 500;
        padding-bottom: 0.25rem;
    }
    .ui-datepicker-week-col {
        color: #78909C;
        font-weight: 400;
        font-size: 0.75rem;
    }
    .avatar-initials {
        width: 24px;
        height: 24px;
        background-color: #017e84;
        color: white;
        font-size: 20px;
        border-radius: 50%;
        text-align: center;
        line-height: 40px;
    }
    .location{
     display: none;
    }
    .o_priority_star.fa-star {
        color: #f3cc00; /* Color for filled stars */
    }

    .o_priority_star.fa-star-o {
        color: gray; /* Color for empty stars */
    }
</style>

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
                @foreach($activities as $pipeline_id => $pipelineActivities)
                @php
                $pipeline = $pipelineActivities->first(); // Get the first activity to display lead-related data once
                @endphp
                <tr class="o_data_row h-100">
                    <td class="o_activity_record p-2 cursor-pointer">
                        <div>
                        <div name="user_id" class="o_field_widget o_field_many2one_avatar_user d-inline-block">
                            <div class="d-flex align-items-center gap-1"
                                data-tooltip="{{$pipeline->getPipelineLeadTitle->email ?? ''}}">
                                @php

                                    $user = $pipeline->getPipelineLeadTitle;
                                    $initial = $user ? strtoupper(substr($user->email, 0, 1)) : '';

                                    $colors = ['#f44336', '#e91e63', '#9c27b0', '#673ab7', '#3f51b5', '#2196f3', '#03a9f4', '#00bcd4', '#009688', '#4caf50', '#8bc34a', '#cddc39', '#ffeb3b', '#ffc107', '#ff9800', '#ff5722'];


                                    if ($user) {
                                        $colorIndex = crc32($user->email) % count($colors);
                                        $bgColor = $colors[$colorIndex];
                                    } else {
                                        $bgColor = '#f0f0f0';
                                    }
                                @endphp
                                <span class="o_avatar o_m2o_avatar d-flex">
                                    @if(optional($user)->profile)
                                        <!-- If profile image exists -->
                                        <img class="rounded" src="{{ $user->profile }}" alt="User Profile">
                                    @else
                                        <!-- If no profile image, display the first letter of email with dynamic background color -->
                                        <div class="placeholder-circle rounded d-flex align-items-center justify-content-center"
                                            data-id="{{$pipeline->id}}"
                                            style="background-color: {{ $bgColor }}; width:32px;height:32px;color:white">
                                            <span>{{ $initial }}</span>
                                        </div>
                                    @endif
                                </span>
                            </div>
                        </div>
                            <div class="flex-grow-1">
                                <div class="d-flex justify-content-between">
                                    <div class="d-block text-truncate o_text_block o_text_bold">{{ $pipeline->opportunity }}</div>
                                    <div name="expected_revenue" class="o_field_widget o_field_empty o_field_monetary d-block text-truncate text-muted">
                                        <span>₹{{$pipeline->getPipelineLeadTitle->expected_revenue ?? '0.00'}}</span>
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
                    <td class="o_activity_summary_cell" data-id="{{$pipeline->pipeline_id}}" data-activity_type="to-do">
                        @php
                            $emailActivity = $pipelineActivities->where('activity_type', 'email')->where('status', 0)->sortBy('due_date');

                            // Get current date
                            $now = \Carbon\Carbon::now();
                            $startOfToday = $now->copy()->startOfDay();

                            // Calculate the counts for each status
                            $overdueActivities = $emailActivity->filter(function ($activity) use ($startOfToday) {
                                $dueDate = \Carbon\Carbon::parse($activity->due_date);
                                return $dueDate->lessThan($startOfToday);
                            });


                            $todayActivities = $emailActivity->filter(function ($activity) use ($now) {
                                $dueDate = \Carbon\Carbon::parse($activity->due_date); // Ensure due_date is a Carbon instance
                                return $now->isSameDay($dueDate); // Today
                            });

                            $plannedActivities = $emailActivity->filter(function ($activity) use ($now) {
                                $dueDate = \Carbon\Carbon::parse($activity->due_date); // Ensure due_date is a Carbon instance
                                return $now->lt($dueDate); // Planned
                            });

                            $overdueCount = $overdueActivities->count();
                            $todayCount = $todayActivities->count();
                            $plannedCount = $plannedActivities->count();
                        @endphp

                        @if($emailActivity->isNotEmpty())
                            <div class="text-center text-white" style="background-color:
                                @php
                                    $todoActivity = $emailActivity->first();
                                    $dueDate = \Carbon\Carbon::parse($todoActivity->due_date);
                                    $daysDiff = $now->diffInDays($dueDate, false);
                                    if ($daysDiff < 0) {
                                        echo '#d44c59'; // Overdue (red)
                                    } elseif ($daysDiff == 0) {
                                        echo '#e99d00'; // Today (orange)
                                    } else {
                                        echo '#28a745'; // Planned (green)
                                    }
                                @endphp;cursor: pointer;">
                                <small>{{ $dueDate->format('d-m-y') }}</small>
                            </div>

                            <div class="o_popover popover mw-100 o-popover--with-arrow bs-popover-bottom o-popover-bottom o-popover--bs d-none">
                                <div class="o-mail-ActivityListPopover d-flex flex-column">
                                    <div class="overflow-y-auto d-flex flex-column flex-grow-1">

                                        <!-- Overdue Section -->
                                        <div class="o-mail-ActivityListPopoverItem d-flex flex-column border-bottom py-2">
                                            <div class="overflow-auto d-flex align-items-baseline ms-3 me-1">
                                                 <b class="text-900 me-2 text-truncate flex-grow-1">Overdue ({{ $overdueCount }})</b>
                                            </div>
                                            @foreach($overdueActivities as $value)
                                                <div class="d-flex align-items-center flex-wrap mx-3 hideDiv" data-id="{{ $value->id }}">
                                                    <span
                                                        class="avatar-initials rounded d-flex align-items-center justify-content-center">
                                                        {{ strtoupper($pipeline->getUser->name[0] ?? strtoupper($currentUser->name[0] ?? '')) }}
                                                    </span>
                                                    <div class="mt-1 flex-grow-1">
                                                        &nbsp;&nbsp;<small>{{ $pipeline->getUser->email }} - Overdue</small>
                                                    </div>
                                                    <button class="o-mail-ActivityListPopoverItem-markAsDone btn btn-sm btn-success btn-link" data-target="#overdue_feedback_{{ $value->id }}"><i class="fa fa-check"></i></button>
                                                    <button class="o-mail-ActivityListPopoverItem-editbtn btn btn-sm btn-success btn-link"><i class="fa fa-pencil"></i></button>
                                                    <button class="o-mail-ActivityListPopoverItem-cancel btn btn-sm btn-danger btn-link"><i class="fa fa-times"></i></button>
                                                    <div class="py-2 px-3 d-none" id="overdue_feedback_{{ $value->id }}">
                                                        <textarea class="form-control feedback-textarea" style="min-height: 70px;width:300px" rows="3" placeholder="Write Feedback"></textarea>
                                                        <div class="mt-2">
                                                            <button type="button" class="btn btn-sm btn-primary mx-2 feedback-submit" data-id="{{ $value->id }}"> Done </button>
                                                            <button type="button" class="btn btn-sm btn-link feedback-discard" data-target="#overdue_feedback_{{ $value->id }}">Discard </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>

                                        <!-- Today Section -->
                                        <div class="o-mail-ActivityListPopoverItem d-flex flex-column border-bottom py-2">
                                            <div class="overflow-auto d-flex align-items-baseline ms-3 me-1">
                                                <b class="text-900 me-2 text-truncate flex-grow-1">Today ({{ $todayCount }})</b>
                                            </div>
                                            @foreach($todayActivities as $value)
                                                <div class="d-flex align-items-center flex-wrap mx-3 hideDiv" data-id="{{ $value->id }}">
                                                <span
                                                        class="avatar-initials rounded d-flex align-items-center justify-content-center">
                                                        {{ strtoupper($pipeline->getUser->name[0] ?? strtoupper($currentUser->name[0] ?? '')) }}
                                                    </span>
                                                    <div class="mt-1 flex-grow-1">
                                                    &nbsp;&nbsp;<small>{{ $pipeline->getUser->email }} - Today</small>
                                                    </div>
                                                    <button class="o-mail-ActivityListPopoverItem-markAsDone btn btn-sm btn-success btn-link" data-target="#today_feedback_{{ $value->id }}"><i class="fa fa-check"></i></button>
                                                    <button class="o-mail-ActivityListPopoverItem-editbtn btn btn-sm btn-success btn-link"><i class="fa fa-pencil"></i></button>
                                                    <button class="o-mail-ActivityListPopoverItem-cancel btn btn-sm btn-danger btn-link"><i class="fa fa-times"></i></button>
                                                    <div class="py-2 px-3 d-none" id="today_feedback_{{ $value->id }}">
                                                        <textarea class="form-control feedback-textarea" style="min-height: 70px;width:300px" rows="3" placeholder="Write Feedback"></textarea>
                                                        <div class="mt-2">
                                                            <button type="button" class="btn btn-sm btn-primary mx-2 feedback-submit" data-id="{{ $value->id }}"> Done </button>
                                                            <button type="button" class="btn btn-sm btn-link feedback-discard" data-target="#today_feedback_{{ $value->id }}">Discard </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>

                                        <!-- Planned Section -->
                                        <div class="o-mail-ActivityListPopoverItem d-flex flex-column border-bottom py-2">
                                            <div class="overflow-auto d-flex align-items-baseline ms-3 me-1">
                                                <b class="text-900 me-2 text-truncate flex-grow-1">Planned ({{ $plannedCount }})</b>
                                            </div>
                                            @foreach($plannedActivities as $value)
                                                <div class="d-flex align-items-center flex-wrap mx-3 hideDiv" data-id="{{ $value->id }}">
                                                <span
                                                        class="avatar-initials rounded d-flex align-items-center justify-content-center">
                                                        {{ strtoupper($pipeline->getUser->name[0] ?? strtoupper($currentUser->name[0] ?? '')) }}
                                                    </span>
                                                    <div class="mt-1 flex-grow-1">
                                                    &nbsp;&nbsp;<small>{{ $pipeline->getUser->email }} - Planned</small>
                                                    </div>
                                                    <button class="o-mail-ActivityListPopoverItem-markAsDone btn btn-sm btn-success btn-link" data-target="#planned_feedback_{{ $value->id }}"><i class="fa fa-check"></i></button>
                                                    <button class="o-mail-ActivityListPopoverItem-editbtn btn btn-sm btn-success btn-link"><i class="fa fa-pencil"></i></button>
                                                    <button class="o-mail-ActivityListPopoverItem-cancel btn btn-sm btn-danger btn-link"><i class="fa fa-times"></i></button>
                                                    <div class="py-2 px-3 d-none" id="planned_feedback_{{ $value->id }}">
                                                        <textarea class="form-control feedback-textarea" style="min-height: 70px;width:300px" rows="3" placeholder="Write Feedback"></textarea>
                                                        <div class="mt-2">
                                                            <button type="button" class="btn btn-sm btn-primary mx-2 feedback-submit" data-id="{{ $value->id }}"> Done </button>
                                                            <button type="button" class="btn btn-sm btn-link feedback-discard" data-target="#planned_feedback_{{ $value->id }}">Discard </button>
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

                    <td class="o_activity_summary_cell" data-id="{{$pipeline->pipeline_id}}" data-activity_type="to-do">
                        @php
                            $callActivity = $pipelineActivities->where('activity_type', 'call')->where('status', 0)->sortBy('due_date');

                            // Get current date
                            $now = \Carbon\Carbon::now();
                            $startOfToday = $now->copy()->startOfDay();

                            // Calculate the counts for each status
                            $overdueActivities = $callActivity->filter(function ($activity) use ($startOfToday) {
                                $dueDate = \Carbon\Carbon::parse($activity->due_date);
                                return $dueDate->lessThan($startOfToday);
                            });


                            $todayActivities = $callActivity->filter(function ($activity) use ($now) {
                                $dueDate = \Carbon\Carbon::parse($activity->due_date); // Ensure due_date is a Carbon instance
                                return $now->isSameDay($dueDate); // Today
                            });

                            $plannedActivities = $callActivity->filter(function ($activity) use ($now) {
                                $dueDate = \Carbon\Carbon::parse($activity->due_date); // Ensure due_date is a Carbon instance
                                return $now->lt($dueDate); // Planned
                            });

                            $overdueCount = $overdueActivities->count();
                            $todayCount = $todayActivities->count();
                            $plannedCount = $plannedActivities->count();
                        @endphp

                        @if($callActivity->isNotEmpty())
                            <div class="text-center text-white" style="background-color:
                                @php
                                    $todoActivity = $callActivity->first();
                                    $dueDate = \Carbon\Carbon::parse($todoActivity->due_date);
                                    $daysDiff = $now->diffInDays($dueDate, false);
                                    if ($daysDiff < 0) {
                                        echo '#d44c59'; // Overdue (red)
                                    } elseif ($daysDiff == 0) {
                                        echo '#e99d00'; // Today (orange)
                                    } else {
                                        echo '#28a745'; // Planned (green)
                                    }
                                @endphp;cursor: pointer;">
                                <small>{{ $dueDate->format('d-m-y') }}</small>
                            </div>

                            <div class="o_popover popover mw-100 o-popover--with-arrow bs-popover-bottom o-popover-bottom o-popover--bs d-none">
                                <div class="o-mail-ActivityListPopover d-flex flex-column">
                                    <div class="overflow-y-auto d-flex flex-column flex-grow-1">

                                        <!-- Overdue Section -->
                                        <div class="o-mail-ActivityListPopoverItem d-flex flex-column border-bottom py-2">
                                            <div class="overflow-auto d-flex align-items-baseline ms-3 me-1">
                                                 <b class="text-900 me-2 text-truncate flex-grow-1">Overdue ({{ $overdueCount }})</b>
                                            </div>
                                            @foreach($overdueActivities as $value)
                                                <div class="d-flex align-items-center flex-wrap mx-3 hideDiv" data-id="{{ $value->id }}">
                                                    <span
                                                        class="avatar-initials rounded d-flex align-items-center justify-content-center">
                                                        {{ strtoupper($pipeline->getUser->name[0] ?? strtoupper($currentUser->name[0] ?? '')) }}
                                                    </span>
                                                    <div class="mt-1 flex-grow-1">
                                                         &nbsp;&nbsp;<small>{{ $pipeline->getUser->email }} - Overdue</small>
                                                    </div>
                                                    <button class="o-mail-ActivityListPopoverItem-markAsDone btn btn-sm btn-success btn-link" data-target="#overdue_feedback_{{ $value->id }}"><i class="fa fa-check"></i></button>
                                                    <button class="o-mail-ActivityListPopoverItem-editbtn btn btn-sm btn-success btn-link"><i class="fa fa-pencil"></i></button>
                                                    <button class="o-mail-ActivityListPopoverItem-cancel btn btn-sm btn-danger btn-link"><i class="fa fa-times"></i></button>
                                                    <div class="py-2 px-3 d-none" id="overdue_feedback_{{ $value->id }}">
                                                        <textarea class="form-control feedback-textarea" style="min-height: 70px;width:300px" rows="3" placeholder="Write Feedback"></textarea>
                                                        <div class="mt-2">
                                                            <button type="button" class="btn btn-sm btn-primary mx-2 feedback-submit" data-id="{{ $value->id }}"> Done </button>
                                                            <button type="button" class="btn btn-sm btn-link feedback-discard" data-target="#overdue_feedback_{{ $value->id }}">Discard </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>

                                        <!-- Today Section -->
                                        <div class="o-mail-ActivityListPopoverItem d-flex flex-column border-bottom py-2">
                                            <div class="overflow-auto d-flex align-items-baseline ms-3 me-1">
                                                <b class="text-900 me-2 text-truncate flex-grow-1">Today ({{ $todayCount }})</b>
                                            </div>
                                            @foreach($todayActivities as $value)
                                                <div class="d-flex align-items-center flex-wrap mx-3 hideDiv" data-id="{{ $value->id }}">
                                                <span
                                                        class="avatar-initials rounded d-flex align-items-center justify-content-center">
                                                        {{ strtoupper($pipeline->getUser->name[0] ?? strtoupper($currentUser->name[0] ?? '')) }}
                                                    </span>
                                                    <div class="mt-1 flex-grow-1">
                                                    &nbsp;&nbsp;<small>{{ $pipeline->getUser->email }} - Today</small>
                                                    </div>
                                                    <button class="o-mail-ActivityListPopoverItem-markAsDone btn btn-sm btn-success btn-link" data-target="#today_feedback_{{ $value->id }}"><i class="fa fa-check"></i></button>
                                                    <button class="o-mail-ActivityListPopoverItem-editbtn btn btn-sm btn-success btn-link"><i class="fa fa-pencil"></i></button>
                                                    <button class="o-mail-ActivityListPopoverItem-cancel btn btn-sm btn-danger btn-link"><i class="fa fa-times"></i></button>
                                                    <div class="py-2 px-3 d-none" id="today_feedback_{{ $value->id }}">
                                                        <textarea class="form-control feedback-textarea" style="min-height: 70px;width:300px" rows="3" placeholder="Write Feedback"></textarea>
                                                        <div class="mt-2">
                                                            <button type="button" class="btn btn-sm btn-primary mx-2 feedback-submit" data-id="{{ $value->id }}"> Done </button>
                                                            <button type="button" class="btn btn-sm btn-link feedback-discard" data-target="#today_feedback_{{ $value->id }}">Discard </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>

                                        <!-- Planned Section -->
                                        <div class="o-mail-ActivityListPopoverItem d-flex flex-column border-bottom py-2">
                                            <div class="overflow-auto d-flex align-items-baseline ms-3 me-1">
                                                <b class="text-900 me-2 text-truncate flex-grow-1">Planned ({{ $plannedCount }})</b>
                                            </div>
                                            @foreach($plannedActivities as $value)
                                                <div class="d-flex align-items-center flex-wrap mx-3 hideDiv" data-id="{{ $value->id }}">
                                                <span
                                                        class="avatar-initials rounded d-flex align-items-center justify-content-center">
                                                        {{ strtoupper($pipeline->getUser->name[0] ?? strtoupper($currentUser->name[0] ?? '')) }}
                                                    </span>
                                                    <div class="mt-1 flex-grow-1">
                                                    &nbsp;&nbsp;<small>{{ $pipeline->getUser->email }} - Planned</small>
                                                    </div>
                                                    <button class="o-mail-ActivityListPopoverItem-markAsDone btn btn-sm btn-success btn-link" data-target="#planned_feedback_{{ $value->id }}"><i class="fa fa-check"></i></button>
                                                    <button class="o-mail-ActivityListPopoverItem-editbtn btn btn-sm btn-success btn-link"><i class="fa fa-pencil"></i></button>
                                                    <button class="o-mail-ActivityListPopoverItem-cancel btn btn-sm btn-danger btn-link"><i class="fa fa-times"></i></button>
                                                    <div class="py-2 px-3 d-none" id="planned_feedback_{{ $value->id }}">
                                                        <textarea class="form-control feedback-textarea" style="min-height: 70px;width:300px" rows="3" placeholder="Write Feedback"></textarea>
                                                        <div class="mt-2">
                                                            <button type="button" class="btn btn-sm btn-primary mx-2 feedback-submit" data-id="{{ $value->id }}"> Done </button>
                                                            <button type="button" class="btn btn-sm btn-link feedback-discard" data-target="#planned_feedback_{{ $value->id }}">Discard </button>
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

                    <td class="o_activity_summary_cell" data-id="{{$pipeline->pipeline_id}}" data-activity_type="to-do">
                        @php
                            $meetingActivity = $pipelineActivities->where('activity_type', 'meeting')->where('status', 0)->sortBy('due_date');

                            // Get current date
                            $now = \Carbon\Carbon::now();
                            $startOfToday = $now->copy()->startOfDay();

                            // Calculate the counts for each status
                            $overdueActivities = $meetingActivity->filter(function ($activity) use ($startOfToday) {
                                $dueDate = \Carbon\Carbon::parse($activity->due_date);
                                return $dueDate->lessThan($startOfToday);
                            });


                            $todayActivities = $meetingActivity->filter(function ($activity) use ($now) {
                                $dueDate = \Carbon\Carbon::parse($activity->due_date); // Ensure due_date is a Carbon instance
                                return $now->isSameDay($dueDate); // Today
                            });

                            $plannedActivities = $meetingActivity->filter(function ($activity) use ($now) {
                                $dueDate = \Carbon\Carbon::parse($activity->due_date); // Ensure due_date is a Carbon instance
                                return $now->lt($dueDate); // Planned
                            });

                            $overdueCount = $overdueActivities->count();
                            $todayCount = $todayActivities->count();
                            $plannedCount = $plannedActivities->count();
                        @endphp

                        @if($meetingActivity->isNotEmpty())
                            <div class="text-center text-white" style="background-color:
                                @php
                                    $todoActivity = $meetingActivity->first();
                                    $dueDate = \Carbon\Carbon::parse($todoActivity->due_date);
                                    $daysDiff = $now->diffInDays($dueDate, false);
                                    if ($daysDiff < 0) {
                                        echo '#d44c59'; // Overdue (red)
                                    } elseif ($daysDiff == 0) {
                                        echo '#e99d00'; // Today (orange)
                                    } else {
                                        echo '#28a745'; // Planned (green)
                                    }
                                @endphp;cursor: pointer;">
                                <small>{{ $dueDate->format('d-m-y') }}</small>
                            </div>

                            <div class="o_popover popover mw-100 o-popover--with-arrow bs-popover-bottom o-popover-bottom o-popover--bs d-none">
                                <div class="o-mail-ActivityListPopover d-flex flex-column">
                                    <div class="overflow-y-auto d-flex flex-column flex-grow-1">

                                        <!-- Overdue Section -->
                                        <div class="o-mail-ActivityListPopoverItem d-flex flex-column border-bottom py-2">
                                            <div class="overflow-auto d-flex align-items-baseline ms-3 me-1">
                                                 <b class="text-900 me-2 text-truncate flex-grow-1">Overdue ({{ $overdueCount }})</b>
                                            </div>
                                            @foreach($overdueActivities as $value)
                                                <div class="d-flex align-items-center flex-wrap mx-3 hideDiv" data-id="{{ $value->id }}">
                                                    <span
                                                        class="avatar-initials rounded d-flex align-items-center justify-content-center">
                                                        {{ strtoupper($pipeline->getUser->name[0] ?? strtoupper($currentUser->name[0] ?? '')) }}
                                                    </span>
                                                    <div class="mt-1 flex-grow-1">
                                                         &nbsp;&nbsp;<small>{{ $pipeline->getUser->email }} - Overdue</small>
                                                    </div>
                                                    <button class="o-mail-ActivityListPopoverItem-markAsDone btn btn-sm btn-success btn-link" data-target="#overdue_feedback_{{ $value->id }}"><i class="fa fa-check"></i></button>
                                                    <button class="o-mail-ActivityListPopoverItem-editbtn btn btn-sm btn-success btn-link"><i class="fa fa-pencil"></i></button>
                                                    <button class="o-mail-ActivityListPopoverItem-cancel btn btn-sm btn-danger btn-link"><i class="fa fa-times"></i></button>
                                                    <div class="py-2 px-3 d-none" id="overdue_feedback_{{ $value->id }}">
                                                        <textarea class="form-control feedback-textarea" style="min-height: 70px;width:300px" rows="3" placeholder="Write Feedback"></textarea>
                                                        <div class="mt-2">
                                                            <button type="button" class="btn btn-sm btn-primary mx-2 feedback-submit" data-id="{{ $value->id }}"> Done </button>
                                                            <button type="button" class="btn btn-sm btn-link feedback-discard" data-target="#overdue_feedback_{{ $value->id }}">Discard </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>

                                        <!-- Today Section -->
                                        <div class="o-mail-ActivityListPopoverItem d-flex flex-column border-bottom py-2">
                                            <div class="overflow-auto d-flex align-items-baseline ms-3 me-1">
                                                <b class="text-900 me-2 text-truncate flex-grow-1">Today ({{ $todayCount }})</b>
                                            </div>
                                            @foreach($todayActivities as $value)
                                                <div class="d-flex align-items-center flex-wrap mx-3 hideDiv" data-id="{{ $value->id }}">
                                                <span
                                                        class="avatar-initials rounded d-flex align-items-center justify-content-center">
                                                        {{ strtoupper($pipeline->getUser->name[0] ?? strtoupper($currentUser->name[0] ?? '')) }}
                                                    </span>
                                                    <div class="mt-1 flex-grow-1">
                                                    &nbsp;&nbsp;<small>{{ $pipeline->getUser->email }} - Today</small>
                                                    </div>
                                                    <button class="o-mail-ActivityListPopoverItem-markAsDone btn btn-sm btn-success btn-link" data-target="#today_feedback_{{ $value->id }}"><i class="fa fa-check"></i></button>
                                                    <button class="o-mail-ActivityListPopoverItem-editbtn btn btn-sm btn-success btn-link"><i class="fa fa-pencil"></i></button>
                                                    <button class="o-mail-ActivityListPopoverItem-cancel btn btn-sm btn-danger btn-link"><i class="fa fa-times"></i></button>
                                                    <div class="py-2 px-3 d-none" id="today_feedback_{{ $value->id }}">
                                                        <textarea class="form-control feedback-textarea" style="min-height: 70px;width:300px" rows="3" placeholder="Write Feedback"></textarea>
                                                        <div class="mt-2">
                                                            <button type="button" class="btn btn-sm btn-primary mx-2 feedback-submit" data-id="{{ $value->id }}"> Done </button>
                                                            <button type="button" class="btn btn-sm btn-link feedback-discard" data-target="#today_feedback_{{ $value->id }}">Discard </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>

                                        <!-- Planned Section -->
                                        <div class="o-mail-ActivityListPopoverItem d-flex flex-column border-bottom py-2">
                                            <div class="overflow-auto d-flex align-items-baseline ms-3 me-1">
                                                <b class="text-900 me-2 text-truncate flex-grow-1">Planned ({{ $plannedCount }})</b>
                                            </div>
                                            @foreach($plannedActivities as $value)
                                                <div class="d-flex align-items-center flex-wrap mx-3 hideDiv" data-id="{{ $value->id }}">
                                                <span
                                                        class="avatar-initials rounded d-flex align-items-center justify-content-center">
                                                        {{ strtoupper($pipeline->getUser->name[0] ?? strtoupper($currentUser->name[0] ?? '')) }}
                                                    </span>
                                                    <div class="mt-1 flex-grow-1">
                                                    &nbsp;&nbsp;<small>{{ $pipeline->getUser->email }} - Planned</small>
                                                    </div>
                                                    <button class="o-mail-ActivityListPopoverItem-markAsDone btn btn-sm btn-success btn-link" data-target="#planned_feedback_{{ $value->id }}"><i class="fa fa-check"></i></button>
                                                    <button class="o-mail-ActivityListPopoverItem-editbtn btn btn-sm btn-success btn-link"><i class="fa fa-pencil"></i></button>
                                                    <button class="o-mail-ActivityListPopoverItem-cancel btn btn-sm btn-danger btn-link"><i class="fa fa-times"></i></button>
                                                    <div class="py-2 px-3 d-none" id="planned_feedback_{{ $value->id }}">
                                                        <textarea class="form-control feedback-textarea" style="min-height: 70px;width:300px" rows="3" placeholder="Write Feedback"></textarea>
                                                        <div class="mt-2">
                                                            <button type="button" class="btn btn-sm btn-primary mx-2 feedback-submit" data-id="{{ $value->id }}"> Done </button>
                                                            <button type="button" class="btn btn-sm btn-link feedback-discard" data-target="#planned_feedback_{{ $value->id }}">Discard </button>
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

                    <td class="o_activity_summary_cell" data-id="{{$pipeline->pipeline_id}}" data-activity_type="to-do">
                        @php
                            $todoActivities = $pipelineActivities->where('activity_type', 'to-do')->where('status', 0)->sortBy('due_date');

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
                                    $dueDate = \Carbon\Carbon::parse($todoActivity->due_date);
                                    $daysDiff = $now->diffInDays($dueDate, false);
                                    if ($daysDiff < 0) {
                                        echo '#d44c59'; // Overdue (red)
                                    } elseif ($daysDiff == 0) {
                                        echo '#e99d00'; // Today (orange)
                                    } else {
                                        echo '#28a745'; // Planned (green)
                                    }
                                @endphp;cursor: pointer;">
                                <small>{{ $dueDate->format('d-m-y') }}</small>
                            </div>

                            <div class="o_popover popover mw-100 o-popover--with-arrow bs-popover-bottom o-popover-bottom o-popover--bs d-none">
                                <div class="o-mail-ActivityListPopover d-flex flex-column">
                                    <div class="overflow-y-auto d-flex flex-column flex-grow-1">

                                        <!-- Overdue Section -->
                                        <div class="o-mail-ActivityListPopoverItem d-flex flex-column border-bottom py-2">
                                            <div class="overflow-auto d-flex align-items-baseline ms-3 me-1">
                                                 <b class="text-900 me-2 text-truncate flex-grow-1">Overdue ({{ $overdueCount }})</b>
                                            </div>
                                            @foreach($overdueActivities as $value)
                                                <div class="d-flex align-items-center flex-wrap mx-3 hideDiv" data-id="{{ $value->id }}">
                                                    <span
                                                        class="avatar-initials rounded d-flex align-items-center justify-content-center">
                                                        {{ strtoupper($pipeline->getUser->name[0] ?? strtoupper($currentUser->name[0] ?? '')) }}
                                                    </span>
                                                    <div class="mt-1 flex-grow-1">
                                                         &nbsp;&nbsp;<small>{{ $pipeline->getUser->email }} - Overdue</small>
                                                    </div>
                                                    <button class="o-mail-ActivityListPopoverItem-markAsDone btn btn-sm btn-success btn-link" data-target="#overdue_feedback_{{ $value->id }}"><i class="fa fa-check"></i></button>
                                                    <button class="o-mail-ActivityListPopoverItem-editbtn btn btn-sm btn-success btn-link"><i class="fa fa-pencil"></i></button>
                                                    <button class="o-mail-ActivityListPopoverItem-cancel btn btn-sm btn-danger btn-link"><i class="fa fa-times"></i></button>
                                                    <div class="py-2 px-3 d-none" id="overdue_feedback_{{ $value->id }}">
                                                        <textarea class="form-control feedback-textarea" style="min-height: 70px;width:300px" rows="3" placeholder="Write Feedback"></textarea>
                                                        <div class="mt-2">
                                                            <button type="button" class="btn btn-sm btn-primary mx-2 feedback-submit" data-id="{{ $value->id }}"> Done </button>
                                                            <button type="button" class="btn btn-sm btn-link feedback-discard" data-target="#overdue_feedback_{{ $value->id }}">Discard </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>

                                        <!-- Today Section -->
                                        <div class="o-mail-ActivityListPopoverItem d-flex flex-column border-bottom py-2">
                                            <div class="overflow-auto d-flex align-items-baseline ms-3 me-1">
                                                <b class="text-900 me-2 text-truncate flex-grow-1">Today ({{ $todayCount }})</b>
                                            </div>
                                            @foreach($todayActivities as $value)
                                                <div class="d-flex align-items-center flex-wrap mx-3 hideDiv" data-id="{{ $value->id }}">
                                                <span
                                                        class="avatar-initials rounded d-flex align-items-center justify-content-center">
                                                        {{ strtoupper($pipeline->getUser->name[0] ?? strtoupper($currentUser->name[0] ?? '')) }}
                                                    </span>
                                                    <div class="mt-1 flex-grow-1">
                                                    &nbsp;&nbsp;<small>{{ $pipeline->getUser->email }} - Today</small>
                                                    </div>
                                                    <button class="o-mail-ActivityListPopoverItem-markAsDone btn btn-sm btn-success btn-link" data-target="#today_feedback_{{ $value->id }}"><i class="fa fa-check"></i></button>
                                                    <button class="o-mail-ActivityListPopoverItem-editbtn btn btn-sm btn-success btn-link"><i class="fa fa-pencil"></i></button>
                                                    <button class="o-mail-ActivityListPopoverItem-cancel btn btn-sm btn-danger btn-link"><i class="fa fa-times"></i></button>
                                                    <div class="py-2 px-3 d-none" id="today_feedback_{{ $value->id }}">
                                                        <textarea class="form-control feedback-textarea" style="min-height: 70px;width:300px" rows="3" placeholder="Write Feedback"></textarea>
                                                        <div class="mt-2">
                                                            <button type="button" class="btn btn-sm btn-primary mx-2 feedback-submit" data-id="{{ $value->id }}"> Done </button>
                                                            <button type="button" class="btn btn-sm btn-link feedback-discard" data-target="#today_feedback_{{ $value->id }}">Discard </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>

                                        <!-- Planned Section -->
                                        <div class="o-mail-ActivityListPopoverItem d-flex flex-column border-bottom py-2">
                                            <div class="overflow-auto d-flex align-items-baseline ms-3 me-1">
                                                <b class="text-900 me-2 text-truncate flex-grow-1">Planned ({{ $plannedCount }})</b>
                                            </div>
                                            @foreach($plannedActivities as $value)
                                                <div class="d-flex align-items-center flex-wrap mx-3 hideDiv" data-id="{{ $value->id }}">
                                                <span
                                                        class="avatar-initials rounded d-flex align-items-center justify-content-center">
                                                        {{ strtoupper($pipeline->getUser->name[0] ?? strtoupper($currentUser->name[0] ?? '')) }}
                                                    </span>
                                                    <div class="mt-1 flex-grow-1">
                                                    &nbsp;&nbsp;<small>{{ $pipeline->getUser->email }} - Planned</small>
                                                    </div>
                                                    <button class="o-mail-ActivityListPopoverItem-markAsDone btn btn-sm btn-success btn-link" data-target="#planned_feedback_{{ $value->id }}"><i class="fa fa-check"></i></button>
                                                    <button class="o-mail-ActivityListPopoverItem-editbtn btn btn-sm btn-success btn-link"><i class="fa fa-pencil"></i></button>
                                                    <button class="o-mail-ActivityListPopoverItem-cancel btn btn-sm btn-danger btn-link"><i class="fa fa-times"></i></button>
                                                    <div class="py-2 px-3 d-none" id="planned_feedback_{{ $value->id }}">
                                                        <textarea class="form-control feedback-textarea" style="min-height: 70px;width:300px" rows="3" placeholder="Write Feedback"></textarea>
                                                        <div class="mt-2">
                                                            <button type="button" class="btn btn-sm btn-primary mx-2 feedback-submit" data-id="{{ $value->id }}"> Done </button>
                                                            <button type="button" class="btn btn-sm btn-link feedback-discard" data-target="#planned_feedback_{{ $value->id }}">Discard </button>
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


                    <td class="o_activity_summary_cell" data-id="{{$pipeline->pipeline_id}}" data-activity_type="to-do">
                        @php
                            $uploadDocumentActivity = $pipelineActivities->where('activity_type', 'upload_document')->where('status', 0)->sortBy('due_date');

                            // Get current date
                            $now = \Carbon\Carbon::now();
                            $startOfToday = $now->copy()->startOfDay();

                            // Calculate the counts for each status
                            $overdueActivities = $uploadDocumentActivity->filter(function ($activity) use ($startOfToday) {
                                $dueDate = \Carbon\Carbon::parse($activity->due_date);
                                return $dueDate->lessThan($startOfToday);
                            });


                            $todayActivities = $uploadDocumentActivity->filter(function ($activity) use ($now) {
                                $dueDate = \Carbon\Carbon::parse($activity->due_date); // Ensure due_date is a Carbon instance
                                return $now->isSameDay($dueDate); // Today
                            });

                            $plannedActivities = $uploadDocumentActivity->filter(function ($activity) use ($now) {
                                $dueDate = \Carbon\Carbon::parse($activity->due_date); // Ensure due_date is a Carbon instance
                                return $now->lt($dueDate); // Planned
                            });

                            $overdueCount = $overdueActivities->count();
                            $todayCount = $todayActivities->count();
                            $plannedCount = $plannedActivities->count();
                        @endphp

                        @if($uploadDocumentActivity->isNotEmpty())
                            <div class="text-center text-white" style="background-color:
                                @php
                                    $todoActivity = $uploadDocumentActivity->first();
                                    $dueDate = \Carbon\Carbon::parse($todoActivity->due_date);
                                    $daysDiff = $now->diffInDays($dueDate, false);
                                    if ($daysDiff < 0) {
                                        echo '#d44c59'; // Overdue (red)
                                    } elseif ($daysDiff == 0) {
                                        echo '#e99d00'; // Today (orange)
                                    } else {
                                        echo '#28a745'; // Planned (green)
                                    }
                                @endphp;cursor: pointer;">
                                <small>{{ $dueDate->format('d-m-y') }}</small>
                            </div>

                            <div class="o_popover popover mw-100 o-popover--with-arrow bs-popover-bottom o-popover-bottom o-popover--bs d-none">
                                <div class="o-mail-ActivityListPopover d-flex flex-column">
                                    <div class="overflow-y-auto d-flex flex-column flex-grow-1">

                                        <!-- Overdue Section -->
                                        <div class="o-mail-ActivityListPopoverItem d-flex flex-column border-bottom py-2">
                                    <div class="overflow-auto d-flex align-items-baseline ms-3 me-1">
                                        <b class="text-900 me-2 text-truncate flex-grow-1">Overdue ({{ $overdueCount }})</b>
                                    </div>
                                    @foreach($overdueActivities as $value)
                                        <div class="d-flex align-items-center flex-wrap mx-3 hideDiv" data-id="{{ $value->id }}">
                                            <span class="avatar-initials rounded d-flex align-items-center justify-content-center">
                                                {{ strtoupper($pipeline->getUser->name[0] ?? strtoupper($currentUser->name[0] ?? '')) }}
                                            </span>
                                            <div class="mt-1 flex-grow-1">
                                                &nbsp;&nbsp;<small>{{ $pipeline->getUser->email }} - Overdue</small>
                                            </div>
                                            <input type="file" class="d-none" id="upload_overdue_file_{{ $value->id }}" accept="*" onchange="uploadFile('upload_overdue_file_{{ $value->id }}', {{ $value->id }})">
                                            <button class="o-mail-ActivityListPopoverItem-upload btn btn-sm btn-success btn-link" onclick="document.getElementById('upload_overdue_file_{{ $value->id }}').click();">
                                                <i class="fa fa-upload"></i>
                                            </button>
                                            <button class="o-mail-ActivityListPopoverItem-editbtn btn btn-sm btn-success btn-link"><i class="fa fa-pencil"></i></button>
                                            <button class="o-mail-ActivityListPopoverItem-cancel btn btn-sm btn-danger btn-link"><i class="fa fa-times"></i></button>
                                        </div>
                                    @endforeach
                                </div>

                                <!-- Today Section -->
                                <div class="o-mail-ActivityListPopoverItem d-flex flex-column border-bottom py-2">
                                    <div class="overflow-auto d-flex align-items-baseline ms-3 me-1">
                                        <b class="text-900 me-2 text-truncate flex-grow-1">Today ({{ $todayCount }})</b>
                                    </div>
                                    @foreach($todayActivities as $value)
                                        <div class="d-flex align-items-center flex-wrap mx-3 hideDiv" data-id="{{ $value->id }}">
                                            <span class="avatar-initials rounded d-flex align-items-center justify-content-center">
                                                {{ strtoupper($pipeline->getUser->name[0] ?? strtoupper($currentUser->name[0] ?? '')) }}
                                            </span>
                                            <div class="mt-1 flex-grow-1">
                                                &nbsp;&nbsp;<small>{{ $pipeline->getUser->email }} - Today</small>
                                            </div>
                                            <input type="file" class="d-none" id="upload_today_file_{{ $value->id }}" accept="*" onchange="uploadFile('upload_today_file_{{ $value->id }}', {{ $value->id }})">
                                            <button class="o-mail-ActivityListPopoverItem-upload btn btn-sm btn-success btn-link" onclick="document.getElementById('upload_today_file_{{ $value->id }}').click();">
                                                <i class="fa fa-upload"></i>
                                            </button>
                                            <button class="o-mail-ActivityListPopoverItem-editbtn btn btn-sm btn-success btn-link"><i class="fa fa-pencil"></i></button>
                                            <button class="o-mail-ActivityListPopoverItem-cancel btn btn-sm btn-danger btn-link"><i class="fa fa-times"></i></button>
                                        </div>
                                    @endforeach
                                </div>

                                <!-- Planned Section -->
                                <div class="o-mail-ActivityListPopoverItem d-flex flex-column border-bottom py-2">
                                    <div class="overflow-auto d-flex align-items-baseline ms-3 me-1">
                                        <b class="text-900 me-2 text-truncate flex-grow-1">Planned ({{ $plannedCount }})</b>
                                    </div>
                                    @foreach($plannedActivities as $value)
                                        <div class="d-flex align-items-center flex-wrap mx-3 hideDiv" data-id="{{ $value->id }}">
                                            <span class="avatar-initials rounded d-flex align-items-center justify-content-center">
                                                {{ strtoupper($pipeline->getUser->name[0] ?? strtoupper($currentUser->name[0] ?? '')) }}
                                            </span>
                                            <div class="mt-1 flex-grow-1">
                                                &nbsp;&nbsp;<small>{{ $pipeline->getUser->email }} - Planned</small>
                                            </div>
                                            <input type="file" class="d-none" id="upload_planned_file_{{ $value->id }}" accept="*" onchange="uploadFile('upload_planned_file_{{ $value->id }}', {{ $value->id }})">
                                            <button class="o-mail-ActivityListPopoverItem-upload btn btn-sm btn-success btn-link" onclick="document.getElementById('upload_planned_file_{{ $value->id }}').click();">
                                                <i class="fa fa-upload"></i>
                                            </button>
                                            <button class="o-mail-ActivityListPopoverItem-editbtn btn btn-sm btn-success btn-link"><i class="fa fa-pencil"></i></button>
                                            <button class="o-mail-ActivityListPopoverItem-cancel btn btn-sm btn-danger btn-link"><i class="fa fa-times"></i></button>
                                        </div>
                                    @endforeach
                                </div>
                                                        </div>
                                                    </div>
                                                    <div class="popover-arrow end-auto"></div>
                                                </div>
                                            @endif
                    </td>

                    <td class="o_activity_summary_cell" data-id="{{$pipeline->pipeline_id}}" data-activity_type="to-do">
                        @php
                            $requestSignatureActivity = $pipelineActivities->where('activity_type', 'request_signature')->where('status', 0)->sortBy('due_date');

                            // Get current date
                            $now = \Carbon\Carbon::now();
                            $startOfToday = $now->copy()->startOfDay();

                            // Calculate the counts for each status
                            $overdueActivities = $requestSignatureActivity->filter(function ($activity) use ($startOfToday) {
                                $dueDate = \Carbon\Carbon::parse($activity->due_date);
                                return $dueDate->lessThan($startOfToday);
                            });


                            $todayActivities = $requestSignatureActivity->filter(function ($activity) use ($now) {
                                $dueDate = \Carbon\Carbon::parse($activity->due_date); // Ensure due_date is a Carbon instance
                                return $now->isSameDay($dueDate); // Today
                            });

                            $plannedActivities = $requestSignatureActivity->filter(function ($activity) use ($now) {
                                $dueDate = \Carbon\Carbon::parse($activity->due_date); // Ensure due_date is a Carbon instance
                                return $now->lt($dueDate); // Planned
                            });

                            $overdueCount = $overdueActivities->count();
                            $todayCount = $todayActivities->count();
                            $plannedCount = $plannedActivities->count();
                        @endphp

                        @if($requestSignatureActivity->isNotEmpty())
                            <div class="text-center text-white" style="background-color:
                                @php
                                    $todoActivity = $requestSignatureActivity->first();
                                    $dueDate = \Carbon\Carbon::parse($todoActivity->due_date);
                                    $daysDiff = $now->diffInDays($dueDate, false);
                                    if ($daysDiff < 0) {
                                        echo '#d44c59'; // Overdue (red)
                                    } elseif ($daysDiff == 0) {
                                        echo '#e99d00'; // Today (orange)
                                    } else {
                                        echo '#28a745'; // Planned (green)
                                    }
                                @endphp;cursor: pointer;">
                                <small>{{ $dueDate->format('d-m-y') }}</small>
                            </div>

                            <div class="o_popover popover mw-100 o-popover--with-arrow bs-popover-bottom o-popover-bottom o-popover--bs d-none">
                                <div class="o-mail-ActivityListPopover d-flex flex-column">
                                    <div class="overflow-y-auto d-flex flex-column flex-grow-1">

                                        <!-- Overdue Section -->
                                        <div class="o-mail-ActivityListPopoverItem d-flex flex-column border-bottom py-2">
                                            <div class="overflow-auto d-flex align-items-baseline ms-3 me-1">
                                                 <b class="text-900 me-2 text-truncate flex-grow-1">Overdue ({{ $overdueCount }})</b>
                                            </div>
                                            @foreach($overdueActivities as $value)
                                                <div class="d-flex align-items-center flex-wrap mx-3 hideDiv" data-id="{{ $value->id }}">
                                                    <span
                                                        class="avatar-initials rounded d-flex align-items-center justify-content-center">
                                                        {{ strtoupper($pipeline->getUser->name[0] ?? strtoupper($currentUser->name[0] ?? '')) }}
                                                    </span>
                                                    <div class="mt-1 flex-grow-1">
                                                         &nbsp;&nbsp;<small>{{ $pipeline->getUser->email }} - Overdue</small>
                                                    </div>
                                                    <button class="o-mail-ActivityListPopoverItem-markAsDone btn btn-sm btn-success btn-link" data-target="#overdue_feedback_{{ $value->id }}"><i class="fa fa-check"></i></button>
                                                    <button class="o-mail-ActivityListPopoverItem-editbtn btn btn-sm btn-success btn-link"><i class="fa fa-pencil"></i></button>
                                                    <button class="o-mail-ActivityListPopoverItem-cancel btn btn-sm btn-danger btn-link"><i class="fa fa-times"></i></button>
                                                    <div class="py-2 px-3 d-none" id="overdue_feedback_{{ $value->id }}">
                                                        <textarea class="form-control feedback-textarea" style="min-height: 70px;width:300px" rows="3" placeholder="Write Feedback"></textarea>
                                                        <div class="mt-2">
                                                            <button type="button" class="btn btn-sm btn-primary mx-2 feedback-submit" data-id="{{ $value->id }}"> Done </button>
                                                            <button type="button" class="btn btn-sm btn-link feedback-discard" data-target="#overdue_feedback_{{ $value->id }}">Discard </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>

                                        <!-- Today Section -->
                                        <div class="o-mail-ActivityListPopoverItem d-flex flex-column border-bottom py-2">
                                            <div class="overflow-auto d-flex align-items-baseline ms-3 me-1">
                                                <b class="text-900 me-2 text-truncate flex-grow-1">Today ({{ $todayCount }})</b>
                                            </div>
                                            @foreach($todayActivities as $value)
                                                <div class="d-flex align-items-center flex-wrap mx-3 hideDiv" data-id="{{ $value->id }}">
                                                <span
                                                        class="avatar-initials rounded d-flex align-items-center justify-content-center">
                                                        {{ strtoupper($pipeline->getUser->name[0] ?? strtoupper($currentUser->name[0] ?? '')) }}
                                                    </span>
                                                    <div class="mt-1 flex-grow-1">
                                                        &nbsp;&nbsp;<small>{{ $pipeline->getUser->email }} - Today</small>
                                                    </div>
                                                    <button class="o-mail-ActivityListPopoverItem-markAsDone btn btn-sm btn-success btn-link" data-target="#today_feedback_{{ $value->id }}"><i class="fa fa-check"></i></button>
                                                    <button class="o-mail-ActivityListPopoverItem-editbtn btn btn-sm btn-success btn-link"><i class="fa fa-pencil"></i></button>
                                                    <button class="o-mail-ActivityListPopoverItem-cancel btn btn-sm btn-danger btn-link"><i class="fa fa-times"></i></button>
                                                    <div class="py-2 px-3 d-none" id="today_feedback_{{ $value->id }}">
                                                        <textarea class="form-control feedback-textarea" style="min-height: 70px;width:300px" rows="3" placeholder="Write Feedback"></textarea>
                                                        <div class="mt-2">
                                                            <button type="button" class="btn btn-sm btn-primary mx-2 feedback-submit" data-id="{{ $value->id }}"> Done </button>
                                                            <button type="button" class="btn btn-sm btn-link feedback-discard" data-target="#today_feedback_{{ $value->id }}">Discard </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>

                                        <!-- Planned Section -->
                                        <div class="o-mail-ActivityListPopoverItem d-flex flex-column border-bottom py-2">
                                            <div class="overflow-auto d-flex align-items-baseline ms-3 me-1">
                                                <b class="text-900 me-2 text-truncate flex-grow-1">Planned ({{ $plannedCount }})</b>
                                            </div>
                                            @foreach($plannedActivities as $value)
                                                <div class="d-flex align-items-center flex-wrap mx-3 hideDiv" data-id="{{ $value->id }}">
                                                    <span
                                                        class="avatar-initials rounded d-flex align-items-center justify-content-center">
                                                        {{ strtoupper($pipeline->getUser->name[0] ?? strtoupper($currentUser->name[0] ?? '')) }}
                                                    </span>
                                                    <div class="mt-1 flex-grow-1">
                                                    &nbsp;&nbsp; <small>{{ $pipeline->getUser->email }} - Planned</small>
                                                    </div>
                                                    <button class="o-mail-ActivityListPopoverItem-markAsDone btn btn-sm btn-success btn-link" data-target="#planned_feedback_{{ $value->id }}"><i class="fa fa-check"></i></button>
                                                    <button class="o-mail-ActivityListPopoverItem-editbtn btn btn-sm btn-success btn-link"><i class="fa fa-pencil"></i></button>
                                                    <button class="o-mail-ActivityListPopoverItem-cancel btn btn-sm btn-danger btn-link"><i class="fa fa-times"></i></button>
                                                    <div class="py-2 px-3 d-none" id="planned_feedback_{{ $value->id }}">
                                                        <textarea class="form-control feedback-textarea" style="min-height: 70px;width:300px" rows="3" placeholder="Write Feedback"></textarea>
                                                        <div class="mt-2">
                                                            <button type="button" class="btn btn-sm btn-primary mx-2 feedback-submit" data-id="{{ $value->id }}"> Done </button>
                                                            <button type="button" class="btn btn-sm btn-link feedback-discard" data-target="#planned_feedback_{{ $value->id }}">Discard </button>
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
                </tr>
                @endforeach
            </tbody>

            <tfoot>
                <tr class="o_data_row">
                    <td class="p-3" colspan="3">    
                        <button type="button" class="btn btn-link o_record_selector cursor-pointer schedule_activity" data-bs-toggle="modal" data-bs-target="#scheduleActivityModal">
                            <i class="fa fa-plus pe-2"></i>Schedule activity
                        </button>
                    </td>
                </tr>
            </tfoot>
        </table>

    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Activity</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editForm">
                <input type="hidden" id="edit_activity_id" name="id">
                <div class="modal-body">
                    <div class="row col-md-12">
                        <div class="col-md-6">
                            <div class="d-flex align-items-center">
                                <div class="col-md-4">
                                    <label for="activity_type" class="mr-2">Activity Type</label>
                                </div>
                                <div class="col-md-8 activityTypeField">
                                    <select class="form-control" id="edit_activity_type" name="activity_type" style="width: 100%;">
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
                            <div class="d-flex align-items-center">
                                <div class="col-md-4">
                                    <label for="" class="mr-2">Due Date</label>    
                                </div>
                                <div class="col-md-8">
                                    <input class="form-control datepicker" name="due_date" placeholder="Select Due Date" style="width: 100%;" type="text" id="edit_due_date">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mt-3 summaryField">
                            <div class="d-flex align-items-center">
                                <div class="col-md-4">
                                    <label for="edit_summary" class="mr-2">Summary</label>  
                                </div>
                                <div class="col-md-8">
                                    <input class="form-control" placeholder="e.g. Discuss proposal" style="width: 100%;" type="text" id="edit_summary" name="summary">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mt-3 assignedToField">
                            <div class="d-flex align-items-center">
                                <div class="col-md-4">
                                    <label for="edit_assigned_to" class="mr-2">Assigned to</label>  
                                </div>
                                <div class="col-md-8">
                                    <select class="form-control" id="edit_assigned_to" name="assigned_to" style="width: 100%;">
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->email }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mt-3 logNoteField">
                            <textarea class="form-control makeMeSummernote" id="edit_log_note" name="log_note" rows="4" placeholder="Log Note"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal HTML -->
<div class="modal fade" id="scheduleActivityModal" tabindex="-1" aria-labelledby="scheduleActivityModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="scheduleActivityModalLabel">Schedule Activity</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Form or content for scheduling the activity -->
        <form id="scheduleActivityForm">
        <table id="example" class="display nowrap example">
        <thead>
                <tr>
                    <th>Created On</th>
                    <th>Opportunity</th>
                    <th>Customer</th>
                    <th>Contact Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Country</th>
                    <th>Sales Person</th>
                    <th>Sales Team</th>
                    <th>Priority</th>
                    <!-- <th>Activities</th>
                    <th>Activity By</th> -->
                    <!-- <th>My Deadline</th> -->
                    <th>Campaign</th>
                    <th>Medium</th>
                    <th>Source</th>
                    <th>Expected Revenue</th>
                    <th>Expected Closing</th>
                    <th>Expected MRR</th>
                    <th>Recurring Revenues</th>
                    <th>Recurring Plan</th>
                    <th>Stage</th>
                    <th>Probability</th>
                    <th>Lost Reason</th>
                    <th>Tags</th>
                    <th></th>

                </tr>
            </thead>

            <tbody id="lead-table-body">
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="15"></th>
                    <th id="total_expected_revenue"></th>
                    <th colspan="1"></th>
                    <th id="total_recurring_mrr"></th>
                    <th colspan="1"></th>
                    <th id="total_recurring_revenue"></th>
                    <th colspan="4"></th>
                </tr>
            </tfoot>
        </table>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
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
    <form id="scheduleForm">
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
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->email }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mt-3 logNoteField">
                    <textarea name="log_note" class="makeMeSummernote" id="log_note" cols="30" rows="10"></textarea>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script>
    $(document).ready(function () {
        $(".makeMeSummernote").summernote();
    });
</script>
<script>
    $(document).ready(function() {
        // Function to toggle feedback textarea visibility
        function toggleFeedback(targetDiv) {
            $(targetDiv).toggleClass('d-none');
        }

        // Handling "Mark as Done" for all activities
        $('.o-mail-ActivityListPopoverItem-markAsDone').on('click', function(event) {
            event.stopPropagation(); // Prevent click from closing the popover
            var targetDiv = $(this).data('target');
            toggleFeedback(targetDiv);
        });

        // Prevent textarea click from closing
        $('.feedback-textarea').on('click', function(event) {
            event.stopPropagation(); // Prevent click from closing the popover
        });

        // Feedback submission
        $('.feedback-submit').on('click', function() {
            var feedbackText = $(this).closest('.py-2').find('textarea').val();
            var activityId = $(this).data('id');
            var countElement = $(this).closest('.o-mail-ActivityListPopoverItem').find('b'); // Locate the count element
            var status = countElement.text().split(' ')[0]; // Get the current status (Overdue, Today, Planned)

            submitFeedback(feedbackText, activityId, $(this), countElement, status);
        });

        function submitFeedback(feedbackText, activityId, button, countElement, status) {
            $.ajax({
                url: '{{ route('lead.submit.feedback') }}',
                method: 'POST',
                data: {
                    feedback: feedbackText,
                    activity_id: activityId,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    toastr.success(response.message);
                    button.closest('.hideDiv').addClass('d-none'); // Hide popover after submission
                    
                    // Decrease the count by 1
                    var currentCount = parseInt(countElement.text().match(/\d+/)[0]); // Get the current count
                    countElement.text(`${status} (${currentCount - 1})`); // Update the count with status
                },
                error: function(xhr) {
                    console.error(xhr.responseText);
                    toastr.error('An error occurred. Please try again.');
                }
            });
        }

        // Handle discard button to hide the feedback textarea
        $('.feedback-discard').on('click', function() {
            var targetDiv = $(this).data('target');
            $(targetDiv).addClass('d-none');
        });

        $(function() {
            var currentDate = new Date();

            $(".datepicker").datepicker({
                dateFormat: "yy-mm-dd",
                duration: "fast",
                onSelect: function(dateText, inst) {
                    // Optional: Do something when a date is selected
                    console.log("Selected date: " + dateText);
                }
            }).datepicker("setDate", currentDate);
        });
        
        $('.o-mail-ActivityListPopoverItem-editbtn').on('click', function() {
            var activityId = $(this).closest('.hideDiv').data('id');

            // Fetch activity details using AJAX
            $.ajax({
                url: '/feedback-activity/' + activityId, // Adjust to your backend route
                method: 'GET',
                success: function(data) {
                    // Populate the modal fields with data received
                    $('#edit_activity_id').val(data.id);
                    $('#edit_activity_type').val(data.activity_type);
                    $('#edit_due_date').val(data.due_date);
                    $('#edit_summary').val(data.summary);
                    $('#edit_assigned_to').val(data.assigned_to);
                    
                    $('#edit_log_note').summernote({
                        height: 200,  // Set editor height
                        focus: true,  // Set focus to editable area after modal shown
                        tabsize: 2    // Set tab size
                    });

                    // Set the content of the Summernote editor with the fetched note
                    $('#edit_log_note').summernote('code', data.note);

                    // Show the modal
                    $('#editModal').modal('show');
                },
                error: function(xhr) {
                    toastr.error('Failed to fetch activity details.'); // Show error message
                }
            });
        });

        // Handle form submission
        $('#editForm').on('submit', function(event) {
            event.preventDefault(); // Prevent default form submission
            var formData = $(this).serialize(); // Serialize the form data

            // AJAX request to update the activity
            $.ajax({
                url: '{{route('lead.feedback.activity.update')}}', // Adjust with your backend route
                method: 'POST',
                data: formData,
                success: function(response) {
                    toastr.success('Activity updated successfully!'); // Show success message
                    $('#editModal').modal('hide');
                    location.reload();
                },
                error: function(xhr) {
                    toastr.error('An error occurred. Please try again.'); // Show error message
                }
            });
        });

        $('.o-mail-ActivityListPopoverItem-cancel').on('click', function(event) {
            event.stopPropagation(); // Prevent closing of popover
            var activityId = $(this).closest('.hideDiv').data('id'); // Get the activity ID
            var countElement = $(this).closest('.o-mail-ActivityListPopoverItem').find('b'); // Locate the count element
            var status = countElement.text().split(' ')[0]; // Get the current status (Overdue, Today, Planned)
                deleteActivity(activityId, $(this), countElement, status);
        });

        // Function to delete activity via AJAX
        function deleteActivity(activityId, button, countElement, status) {
            $.ajax({
                url: '/feedback-activity-delete/' + activityId, // Use your delete route
                method: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}' // Include CSRF token for security
                },
                success: function(response) {
                    toastr.success(response.message);
                    button.closest('.hideDiv').addClass('d-none'); // Hide the activity after deletion

                    // Decrease the count by 1
                    var currentCount = parseInt(countElement.text().match(/\d+/)[0]); // Get the current count
                    countElement.text(`${status} (${currentCount - 1})`); // Update the count with status

                    // Check if all activities in Overdue, Today, and Planned are deleted
                    var overdueCount = parseInt($('b:contains("Overdue")').text().match(/\d+/)[0]); // Count in Overdue
                    var todayCount = parseInt($('b:contains("Today")').text().match(/\d+/)[0]); // Count in Today
                    var plannedCount = parseInt($('b:contains("Planned")').text().match(/\d+/)[0]); // Count in Planned

                    var remainingActivities = overdueCount + todayCount + plannedCount;

                    // If all activities are deleted, reload the page
                    if (remainingActivities === 0) {
                        location.reload(); // Reload the page
                    }
                    location.reload();
                },
                error: function(xhr) {
                    console.error(xhr.responseText);
                    toastr.error('An error occurred while deleting the activity. Please try again.');
                }
            });
        }


        //Upload Document 
        window.uploadFile = function(inputId, activityId) {
            const fileInput = document.getElementById(inputId);
            const file = fileInput.files[0];

            if (!file) {
                alert('Please select a file to upload.');
                return;
            }

            const formData = new FormData();
            formData.append('file', file);
            formData.append('activity_id', activityId); // Include the activity ID for database update

            $.ajax({
                url: '{{ route('lead.uploadFile') }}',  // Change to your backend endpoint
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.success) {
                        location.reload();
                        // Optionally, update the UI to reflect the new status
                    } else {
                        toastr.error('Failed to upload the file.');
                    }
                },
                error: function(xhr) {
                    toastr.error('Error occurred while uploading the file.');
                }
            });
        };
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

        $('#scheduleActivityModal').on('shown.bs.modal', function () {
            var selectedLeadId = null;
            var table = $('#example').DataTable({
            processing: true
            , serverSide: true
            , ajax: {
                url: '{{ route('crm.pipeline.list.data') }}'
                , type: "POST"
                , data: function(d) {
                    d.search = {
                        value: $('#example_filter input').val()
                    };
                    d.filter = $('#filter').val();
                }
            }
            , order: [
                [1, 'DESC']
            ]
            , pageLength: 10
            , aoColumns: [{
                data: 'created_at',
                render: function (data, type, row) {
                    if (data) {
                        // Create a new Date object
                        var date = new Date(data);

                        // Format the date and time
                        var formattedDate = date.toLocaleDateString('en-GB'); // Adjust locale as needed
                        var formattedTime = date.toLocaleTimeString('en-GB', { hour: '2-digit', minute: '2-digit' }); // Adjust locale and options as needed

                        return formattedDate + ' ' + formattedTime;
                    } else {
                        return '';
                    }
                }
            }
                , {
                data: 'opportunity'
                , render: function (data, type, row) {
                    if (data) {
                        return data;
                    } else {
                        return '';
                    }
                }
            }
                , {
                data: 'contact'
                , render: function (data, type, row) {
                    if (data) {
                        return data.name;
                    } else {
                        return '';
                    }
                }
            }
                , {
                data: 'contact_name'
                , render: function (data, type, row) {
                    if (data) {
                        return data;
                    }
                    return '';
                }
            }
                , {
                data: 'email'
                , render: function (data, type, row) {
                    if (data) {
                        return data;
                    }
                    return '';
                }

            }
                , {
                data: 'phone'
                , render: function (data, type, row) {

                    if (data) {
                        return data;
                    } else {
                        return '';
                    }
                }
            },
            {
                data: 'city'
                , render: function (data, type, row) {

                    if (data) {
                        return data;
                    } else {
                        return '';
                    }
                }
            }
                , {
                data: 'get_state'
                , render: function (data, type, row) {
                    if (data) {
                        return data.name;
                    } else {
                        return '';
                    }
                }
            }
                , {
                data: 'get_country'
                , render: function (data, type, row) {
                    if (data) {
                        return data.name;
                    } else {
                        return '';
                    }
                }
            }
                , {
                data: 'user'
                , render: function (data, type, row) {
                    if (data) {
                        return data.email;
                    } else {
                        return '';
                    }
                }
            }
                , {
                data: 'sales'
                , render: function (data, type, row) {
                    if (data) {
                        return data;
                    } else {
                        return '';
                    }
                }
            }
                , {
                data: 'priority'
                ,  render: function (data, type, row) {
                    let priorityStars = '';
                    const priority = row.priority; // Assuming 'priority' is part of the row data

                    priorityStars += `<div class="o_priority set-priority" role="radiogroup" name="priority" aria-label="Priority">`;

                    // Medium priority
                    priorityStars += `<a href="#" class="o_priority_star fa ${priority === 'medium' || priority === 'high' || priority === 'very_high' ? 'fa-star' : 'fa-star-o'}" role="radio" tabindex="-1" data-value="medium" data-tooltip="Priority: Medium" aria-label="Medium"></a>`;

                    // High priority
                    priorityStars += `<a href="#" class="o_priority_star fa ${priority === 'high' || priority === 'very_high' ? 'fa-star' : 'fa-star-o'}" role="radio" tabindex="-1" data-value="high" data-tooltip="Priority: High" aria-label="High"></a>`;

                    // Very High priority
                    priorityStars += `<a href="#" class="o_priority_star fa ${priority === 'very_high' ? 'fa-star' : 'fa-star-o'}" role="radio" tabindex="-1" data-value="very_high" data-tooltip="Priority: Very High" aria-label="Very High"></a>`;

                    priorityStars += `</div>`;

                    return priorityStars;
                }
            }
                //     , {
                //     data: 'contact_name'
                //     , render: function (data, type, row) {
                //         if (data) {
                //             return data;
                //         } else {
                //             return '';
                //         }
                //     }
                // }
                //     , {
                //     data: 'job_postion'
                //     , render: function (data, type, row) {
                //         if (data) {
                //             return data;
                //         } else {
                //             return '';
                //         }
                //     }
                // }
                //     , {
                //     data: 'deadline'
                //     , render: function (data, type, row) {
                //         if (data) {
                //             return data;
                //         } else {
                //             return '';
                //         }
                //     }
                // }
                , {
                data: 'get_campaign'
                , render: function (data, type, row) {
                    if (data) {
                        return data.name;
                    } else {
                        return '';
                    }
                }
            }
                , {
                data: 'get_medium'
                , render: function (data, type, row) {
                    if (data) {
                        return data.name;
                    } else {
                        return '';
                    }
                }
            }
                , {
                data: 'get_source'
                , render: function (data, type, row) {
                    if (data) {
                        return data.name;
                    } else {
                        return '';
                    }
                }
            }
                , {
                data: 'expected_revenue'
                , render: function (data, type, row) {
                    if (data) {
                        return data;
                    } else {
                        return '';
                    }
                }
            }
                , {
                data: 'deadline'
                , render: function (data, type, row) {
                    if (data) {
                        return data;
                    } else {
                        return '';
                    }
                }
            }
                , {
                targets: 17, // Adjust index if necessary
                render: function (data, type, row) {
                    if (row.recurring_revenue && row.get_recurring_plan && row.get_recurring_plan.months) {
                        const revenue = parseFloat(row.recurring_revenue); // Total revenue
                        const months = parseFloat(row.get_recurring_plan.months); // Number of months

                        if (months > 0) { // Check to avoid division by zero
                            const monthlyValue = (revenue / months).toFixed(2);
                            return `${monthlyValue}`; // Return the calculated MRR
                        } else {
                            return 'Invalid months'; // Handle invalid months case
                        }
                    } else {
                        return ''; // Show nothing if either value is absent
                    }
                }
            },
            {
                data: 'recurring_revenue'
                , render: function (data, type, row) {
                    if (data) {
                        return data;
                    } else {
                        return '';
                    }
                }
            },
            {
                data: 'get_recurring_plan'
                , render: function (data, type, row) {
                    if (data) {
                        return data.plan_name;
                    } else {
                        return '';
                    }
                }
            },
            {
                data: 'stage_id'
                , render: function (data, type, row) {
                    if (data) {
                        return data;
                    } else {
                        return '';
                    }
                }
            },
            {
                data: 'probability'
                , render: function (data, type, row) {
                    if (data) {
                        return data;
                    } else {
                        return '';
                    }
                }
            },
            {
                data: 'loslost_reasont'
                , render: function (data, type, row) {
                    if (data) {
                        return data;
                    } else {
                        return '';
                    }
                }
            },
            {
                data: 'tag'
                , render: function (data, type, row) {
                    if (data) {
                        return data;
                    } else {
                        return '';
                    }
                }
            }
                // Uncomment and modify the following column if needed
                // {
                //     data: 'id',
                //     width: "20%",
                //     render: function(data, type, row) {
                //         return `<a href="${row.id}">View</a>`;
                //     }
                // }
            ]
            ,
            footerCallback: function (row, data, start, end, display) {
                var api = this.api();

                // Calculate total expected revenue over all pages
                var totalExpectedRevenue = api
                    .column(15) // 'expected_revenue' column index
                    .data()
                    .reduce(function (a, b) {
                        var x = parseFloat(a) || 0;
                        var y = parseFloat(b) || 0;
                        return x + y;
                    }, 0);

                // Calculate total recurring MRR over all pages
                var totalRecurringMrr = 0;
                api.rows().every(function (rowIdx, tableLoop, rowLoop) {
                    var data = this.data();
                    if (data.recurring_revenue && data.get_recurring_plan && data.get_recurring_plan.months) {
                        const revenue = parseFloat(data.recurring_revenue);
                        const months = parseFloat(data.get_recurring_plan.months);

                        if (months > 0) {
                            totalRecurringMrr += (revenue / months);
                        }
                    }
                });

                // Calculate total recurring revenue over all pages
                var totalRecurringRevenue = api
                    .column(18) // 'recurring_revenue' column index
                    .data()
                    .reduce(function (a, b) {
                        var x = parseFloat(a) || 0;
                        var y = parseFloat(b) || 0;
                        return x + y;
                    }, 0);

                // Update footer for expected revenue
                $(api.column(15).footer()).html(totalExpectedRevenue.toFixed(2));

                // Update footer for recurring MRR
                $(api.column(17).footer()).html(totalRecurringMrr.toFixed(2));

                // Update footer for recurring revenue
                $(api.column(18).footer()).html(totalRecurringRevenue.toFixed(2));
            },
            createdRow: function (row, data, dataIndex) {
                $(row).attr('data-id', data.id);
            }
        });
        $('#example tbody').on('click', 'tr', function () {
            selectedLeadId = $(this).data('id'); // Store the selected lead ID
            $('#activitiesAddModal').modal('show'); // Show the modal
        });

        $('#activitiesAddModal').on('click', '.btn-secondary', function () {
            $('#scheduleForm')[0].reset(); // Reset the form
            selectedLeadId = null; // Clear the selected lead ID
        });

        $('#scheduleForm').on('submit', function(e) {
        e.preventDefault();

        // Append the selected lead ID to the form data
        var formData = $(this).serializeArray();
        formData.push({ name: 'pipeline_id', value: selectedLeadId });

        $.ajax({
            url: '{{ route('lead.scheduleActivityStore') }}', // Replace with your route to handle activity addition
            type: 'POST',
            data: $.param(formData), // Convert the data to a query string format
            success: function(response) {
                // Close the modal and refresh DataTable if needed
                $('#activitiesAddModal').modal('hide');
                $('#scheduleActivityModal').modal('hide');
                location.reload();
            },
            error: function(xhr) {
                // Handle errors if any
                console.error('An error occurred:', xhr.responseText);
            }
        });
    });
    });
    
    });

</script>

@endsection
