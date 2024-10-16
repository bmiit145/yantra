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
@endsection

@section('head_breadcrumb_title', 'Pipeline')
@section('head')
@vite([
'resources/css/crm_2.css',
])
@endsection



@section('content')

<style>
    #main_save_btn {
        display: none;
    }

</style>
<style>
    .o_dropdown_kanban {
        position: relative;
    }

    .custom-dropdown {
        position: absolute;
        top: 100%;
        right: 0;
        background-color: white;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        padding: 10px;
        border-radius: 4px;
        width: 150px;
        z-index: 1000;
    }

    .dropdown-item {
        padding: 5px 10px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .dropdown-item:hover {
        background-color: #f1f1f1;
    }

    .color-options {
        display: flex;
        flex-wrap: wrap;
        gap: 5px;
        margin-top: 10px;
    }

    .color-box {
       width: 20px;
        height: 20px;
        border-radius: 4px;0-
        cursor: pointer;
        border: black;
        border-style: double;
        border-width: 1px;
    }
    .o-mail-ActivityListPopover {
    width: 100%;
    max-height: 100%;
}
.o_popover {
    width: 100%;
    margin: 0 !important;
}


</style>
<div class="o_content" style="height: 100%">
    <div class="o_kanban_renderer o_renderer d-flex o_kanban_grouped align-content-stretch">
    
      
          @foreach($crmStages as $stage)
            <div class="o_kanban_group flex-shrink-0 flex-grow-1 flex-md-grow-0 o_group_draggable {{ $stage->sales->count() > 0 ? '' : 'o_kanban_no_records' }}" data-id="{{ $stage->id }}">
                <div class="o_kanban_header position-sticky top-0 z-index-1 py-2">
                    <div class="o_kanban_header_title position-relative d-flex lh-lg">
                        <span class="o_column_title flex-grow-1 d-inline-block mw-100 text-truncate fs-4 fw-bold align-top text-900">{{ $stage->title }}</span>
                        <div class="o_kanban_config"><button class="btn px-2 o-dropdown dropdown-toggle dropdown" aria-expanded="false"><i class="fa fa-gear opacity-50 opacity-100-hover" role="img" aria-label="Settings" title="Settings"></i></button></div>
                        <button class="o_kanban_quick_add new-lead-btn btn pe-2 me-n2">
                            <i class="fa fa-plus opacity-75 opacity-100-hover" role="img" aria-label="Quick add" title="Quick add"></i>
                        </button>
                    </div>

                    <div class="o_kanban_counter position-relative d-flex align-items-center justify-content-between {{ $stage->sales->count() > 0 ? '' : 'opacity-25' }}">
                        <div class="o_column_progress progress bg-300 w-50">
                            @if($stage->sales->count() > 0)
                            <div role="progressbar" class="progress-bar o_bar_has_records cursor-pointer bg-200" aria-valuemin="0" aria-label="Progress bar" data-tooltip-delay="0" style="width: 100%;" aria-valuemax="2" aria-valuenow="2" data-tooltip="2 Other" title="">
                            </div>
                            @endif
                        </div>
                        <div class="o_animated_number ms-2 text-900 text-nowrap cursor-default false" title="Expected Revenue" data-target="{{ $stage->totalExpectedRevenue() }}"><b>0</b></div>
                    </div>
                </div>

                <div id="append-container-new"  class="append-container-new"></div>

                @foreach($stage->sales as $sale)
             
                <div role="article" class="o_kanban_record sale-card d-flex o_draggable oe_kanban_card_undefined o_legacy_kanban_record" data-id="{{$sale->id}}" tabindex="0">
                    <div class="oe_kanban_color_0 oe_kanban_global_click oe_kanban_card d-flex flex-column">
                        <div class="oe_kanban_color w-5 " data-id="{{$sale->id}}" style="width: 3px;background: {{$sale->is_side_colour}};height: 100%;position: absolute;top: 0;left: 0;"></div>
                        @if(isset($sale) && $sale->is_lost == 2)
                        <div class="o_widget o_widget_web_ribbon">
                            <div class="ribbon ribbon-top-right">
                                <span class="text-bg-danger" title="">Lost</span>
                            </div>
                        </div>
                        @endif
                        <div class="oe_kanban_content flex-grow-1" data-id="{{ $sale->id }}" >
                            <div class="oe_kanban_details"><strong class="o_kanban_record_title"><span>{{ $sale->opportunity }}</span></strong></div>
                            <div class="o_kanban_record_subtitle">
                                @if($sale->expected_revenue != null)
                                <div name="expected_revenue" class="o_field_widget o_field_monetary"><span>₹&nbsp;{{ number_format($sale->expected_revenue, 2) }}</span></div>
                                @endif
                            </div>
                            @if($sale->contact)
                            <div>
                                <span class="o_text_overflow">{{ optional($sale->contact)->name }}</span>
                            </div>
                            @endif
                            <div>
                                <div name="tag_ids" class="o_field_widget o_field_many2many_tags">
                                  
                                    <div class="d-flex flex-wrap gap-1"> 
                                     @foreach($sale->tags() as $tag)  
                                      <span class="badge badge-primary" style="background:{{$tag->color}};border-radius: 23px">{{ $tag->name }}</span>
                                        @endforeach
                                        
                                   
                                    </div>
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
                                        <div class="o_priority set-priority" role="radiogroup" name="priority" aria-label="Priority">
                                            <a href="#" class="o_priority_star fa {{ $sale->priority == 'medium' || $sale->priority == 'high' || $sale->priority == 'very_high' ? 'fa-star' : 'fa-star-o' }}" role="radio" tabindex="-1" data-value="medium" data-tooltip="Priority: Medium" aria-label="Medium"></a><a href="#" class="o_priority_star fa {{ $sale->priority == 'high' || $sale->priority == 'very_high' ? 'fa-star' : 'fa-star-o' }}" role="radio" tabindex="-1" data-value="high" data-tooltip="Priority: High" aria-label="High"></a><a href="#" class="o_priority_star fa {{ $sale->priority == 'very_high' ? 'fa-star' : 'fa-star-o' }}" role="radio" tabindex="-1" data-value="very_high" data-tooltip="Priority: Very High" aria-label="Very High"></a>
                                        </div>
                                    </div>
                                     {{-- @foreach($sale->activities as $activity) --}}
                                        @php
                                            $now = \Carbon\Carbon::now();
                                            $startOfToday = $now->copy()->startOfDay();

                                          
                                            // Calculate the counts for each status
                                            $overdueActivities = $sale->activities->filter(function ($activity) use ($startOfToday) {
                                                $dueDate = \Carbon\Carbon::parse($activity->due_date);
                                                return $dueDate->lessThan($startOfToday);
                                            });

                                            $todayActivities = $sale->activities->filter(function ($activity) use ($now) {
                                                $dueDate = \Carbon\Carbon::parse($activity->due_date);
                                                return $now->isSameDay($dueDate);
                                            });

                                            $plannedActivities = $sale->activities->filter(function ($activity) use ($now) {
                                                $dueDate = \Carbon\Carbon::parse($activity->due_date);
                                                return $now->lt($dueDate);
                                            });

                                            $overdueCount = $overdueActivities->count();
                                            $todayCount = $todayActivities->count();
                                            $plannedCount = $plannedActivities->count();
                                        @endphp
                                        @php
                                            $now = \Carbon\Carbon::now();
                                            $startOfToday = $now->copy()->startOfDay();

                                            // Get the first overdue activity
                                            $firstOverdueActivity = $sale->activities->filter(function ($activity) use ($startOfToday) {
                                                $dueDate = \Carbon\Carbon::parse($activity->due_date);
                                                return $dueDate->lessThan($startOfToday); // Activity is overdue
                                            })->first();

                                            // Get the first activity due today
                                            $firstTodayActivity = $sale->activities->filter(function ($activity) use ($now) {
                                                $dueDate = \Carbon\Carbon::parse($activity->due_date);
                                                return $now->isSameDay($dueDate); // Activity is due today
                                            })->first();

                                            // Get the first planned activity
                                            $firstPlannedActivity = $sale->activities->filter(function ($activity) use ($now) {
                                                $dueDate = \Carbon\Carbon::parse($activity->due_date);
                                                return $now->lt($dueDate); // Activity is planned (in the future)
                                            })->first();

                                            // Determine the first relevant activity (prefer overdue, then today, then planned)
                                            $firstActivity = $firstOverdueActivity ?? $firstTodayActivity ?? $firstPlannedActivity;

                                            // Default icon when no activities exist
                                            $iconClass = 'fa fa-fw fa-lg text-muted fa-clock-o btn-link text-dark';

                                            if ($firstActivity) {
                                                // Determine the icon based on the activity's due date
                                                $dueDate = \Carbon\Carbon::parse($firstActivity->due_date);

                                                if ($dueDate->lessThan($startOfToday)) {
                                                    // Overdue activity
                                                    $iconClass = 'fa fa-fw fa-lg text-danger fa-exclamation-triangle'; // Overdue
                                                } elseif ($now->isSameDay($dueDate)) {
                                                    // Due today
                                                    $iconClass = 'fa fa-fw fa-lg text-success fa-check'; // Due today
                                                } elseif ($now->lt($dueDate)) {
                                                    // Planned activity
                                                    $iconClass = 'fa fa-fw fa-lg text-primary fa-clock-o'; // Planned
                                                }

                                                // Adjust icon based on the activity type
                                                switch ($firstActivity->activity_type) {
                                                    case 'email':
                                                        $iconClass = 'fa fa-fw fa-lg text-danger fa-envelope';
                                                        break;
                                                    case 'request_signature':
                                                        $iconClass = 'fa fa-fw fa-lg text-success fa-pencil-square-o';
                                                        break;
                                                    case 'meeting':
                                                        $iconClass = 'fa fa-fw fa-lg text-success fa-users';
                                                        break;
                                                    case 'upload_document':
                                                        $iconClass = 'fa fa-fw fa-lg text-success fa-upload';
                                                        break;
                                                    case 'call':
                                                        $iconClass = 'fa fa-fw fa-lg text-success fa-phone';
                                                        break;
                                                    case 'to-do':
                                                        $iconClass = 'fa fa-fw fa-lg text-success fa-check';
                                                        break;
                                                }
                                            }
                                        @endphp



                                        <!-- Display icon for the first relevant activity -->
                                        <div name="activity_ids" class="o_field_widget o_field_kanban_activity">
                                            <a class="o-mail-ActivityButton activityButton" role="button" aria-label="Show activities" id="activityButton" data-id="{{$sale->id}}" title="Show activities">
                                                <i class="{{ $iconClass }}" role="img"></i>
                                            </a>
                                        </div>
                                        <div class="o_popover popover mw-100 o-popover--with-arrow bs-popover-bottom o-popover-bottom o-popover--bs d-none activityPopover" data-id="{{$sale->id}}" id="activityPopover" style="    top: 86px;
    left: 105.75px;">
                                            <div class="o-mail-ActivityListPopover d-flex flex-column">
                                                <div class="overflow-y-auto d-flex flex-column flex-grow-1">

                                                    <!-- Overdue Section -->
                                                    <div class="o-mail-ActivityListPopoverItem d-flex flex-column border-bottom py-2">
                                                        <div class="overflow-auto d-flex align-items-baseline ms-3 me-1">
                                                            <b class="text-900 me-2 text-truncate flex-grow-1">Overdue ({{ $overdueCount }})</b>
                                                        </div>
                                                        @foreach($overdueActivities as $value)
                                                            <div class="d-flex align-items-center flex-wrap mx-3 " data-id="{{ $value->id }}">
                                                              @php
                                                   
                                                                        $user = $sale->getUser;
                                                                        $initial = $user ? strtoupper(substr($user->email, 0, 1)) : '';

                                                                        $colors = ['#f44336', '#e91e63', '#9c27b0', '#673ab7', '#3f51b5', '#2196f3', '#03a9f4', '#00bcd4', '#009688', '#4caf50', '#8bc34a', '#cddc39', '#ffeb3b', '#ffc107', '#ff9800', '#ff5722'];

                                                                
                                                                        if ($user) {
                                                                            $colorIndex = crc32($user->email) % count($colors);
                                                                            $bgColor = $colors[$colorIndex];
                                                                        } else {
                                                                            $bgColor = '#f0f0f0'; 
                                                                        }
                                                                    @endphp
                                                                 <span
                                                                    class="avatar-initials rounded d-flex align-items-center justify-content-center" style="background-color: {{ $bgColor }}; width:25px;height:24px;color:white">
                                                                    {{ $initial }}
                                                                </span>
                                                                <div class="mt-1 flex-grow-1">
                                                                &nbsp;&nbsp;<small>{{ $sale->getUser->email }} - Today</small>
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
                                                              @php
                                                   
                                                                        $user = $sale->getUser;
                                                                        $initial = $user ? strtoupper(substr($user->email, 0, 1)) : '';

                                                                        $colors = ['#f44336', '#e91e63', '#9c27b0', '#673ab7', '#3f51b5', '#2196f3', '#03a9f4', '#00bcd4', '#009688', '#4caf50', '#8bc34a', '#cddc39', '#ffeb3b', '#ffc107', '#ff9800', '#ff5722'];

                                                                
                                                                        if ($user) {
                                                                            $colorIndex = crc32($user->email) % count($colors);
                                                                            $bgColor = $colors[$colorIndex];
                                                                        } else {
                                                                            $bgColor = '#f0f0f0'; 
                                                                        }
                                                                    @endphp
                                                                 <span
                                                                    class="avatar-initials rounded d-flex align-items-center justify-content-center" style="background-color: {{ $bgColor }}; width:25px;height:24px;color:white">
                                                                    {{ $initial }}
                                                                </span>
                                                                <div class="mt-1 flex-grow-1">
                                                                &nbsp;&nbsp;<small>{{ $sale->getUser->email }} - Today</small>
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
                                                               @php
                                                   
                                                                        $user = $sale->getUser;
                                                                        $initial = $user ? strtoupper(substr($user->email, 0, 1)) : '';

                                                                        $colors = ['#f44336', '#e91e63', '#9c27b0', '#673ab7', '#3f51b5', '#2196f3', '#03a9f4', '#00bcd4', '#009688', '#4caf50', '#8bc34a', '#cddc39', '#ffeb3b', '#ffc107', '#ff9800', '#ff5722'];

                                                                
                                                                        if ($user) {
                                                                            $colorIndex = crc32($user->email) % count($colors);
                                                                            $bgColor = $colors[$colorIndex];
                                                                        } else {
                                                                            $bgColor = '#f0f0f0'; 
                                                                        }
                                                                    @endphp
                                                                 <span
                                                                    class="avatar-initials rounded d-flex align-items-center justify-content-center" style="background-color: {{ $bgColor }}; width:25px;height:24px;color:white">
                                                                    {{ $initial }}
                                                                </span>
                                                                <div class="mt-1 flex-grow-1">
                                                                &nbsp;&nbsp;<small>{{ $sale->getUser->email }} - Planned</small>
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
                                </div>

                                <div class="oe_kanban_bottom_right">
                                    <div name="user_id" class="o_field_widget o_field_many2one_avatar_user o_field_many2one_avatar_kanban o_field_many2one_avatar">
                                            <div class="d-flex align-items-center gap-1" data-tooltip="{{ $sale->email ?? '' }}"><span class="o_avatar o_m2o_avatar d-flex">
                                                    @php
                                                    
                                                        $user = $sale->salesPerson;
                                                        $initial = $user ? strtoupper(substr($user->email, 0, 1)) : '';

                                                        $colors = ['#f44336', '#e91e63', '#9c27b0', '#673ab7', '#3f51b5', '#2196f3', '#03a9f4', '#00bcd4', '#009688', '#4caf50', '#8bc34a', '#cddc39', '#ffeb3b', '#ffc107', '#ff9800', '#ff5722'];

                                                
                                                        if ($user) {
                                                            $colorIndex = crc32($user->email) % count($colors);
                                                            $bgColor = $colors[$colorIndex];
                                                        } else {
                                                            $bgColor = '#f0f0f0'; 
                                                        }
                                                    @endphp
                                                    @if(optional($user)->profile)
                                                        <!-- If profile image exists -->
                                                        <img class="rounded" src="{{ $user->profile }}" alt="User Profile">
                                                    @else
                                                        <!-- If no profile image, display the first letter of email with dynamic background color -->
                                                        <div class="placeholder-circle rounded d-flex align-items-center justify-content-center" data-id="{{$sale->id}}" style="background-color: {{ $bgColor }}; width:25px;height:24px;color:white">
                                                            <span>{{ $initial }}</span>
                                                        </div>
                                                    @endif

                                                </span>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="o_dropdown_kanban bg-transparent position-absolute end-0">
                        <button class="btn o-no-caret rounded-0 o-dropdown dropdown-toggle dropdown" title="Dropdown menu" aria-expanded="false">
                            <span class="fa fa-ellipsis-v"></span>
                        </button>

                        <div class="dropdown-menu custom-dropdown" style="display:none;">
                            <div class="dropdown-item op_edit" data-id="{{$sale->id}}">Edit</div>
                            <div class="dropdown-item op_delete" data-id="{{$sale->id}}">Delete</div>
                            <div class="dropdown-divider"></div>
                            <div class="color-options">
                                <span class="color-box" data-id="{{$sale->id}}" data-color="#ffffff" style="background-color:#ffffff;"></span>
                                <span class="color-box" data-id="{{$sale->id}}" data-color="#ee2d2d" style="background-color:#ee2d2d;"></span>
                                <span class="color-box" data-id="{{$sale->id}}" data-color="#dc8534" style="background-color:#dc8534;"></span>
                                <span class="color-box" data-id="{{$sale->id}}" data-color="#e8bb1d" style="background-color:#e8bb1d;"></span>
                                <span class="color-box" data-id="{{$sale->id}}" data-color="#5794dd" style="background-color:#5794dd;"></span>
                                <span class="color-box" data-id="{{$sale->id}}" data-color="#9f628f" style="background-color:#9f628f;"></span>
                                <span class="color-box" data-id="{{$sale->id}}" data-color="#db8865" style="background-color:#db8865;"></span>
                                <span class="color-box" data-id="{{$sale->id}}" data-color="#41a9a2" style="background-color:#41a9a2;"></span>
                                <span class="color-box" data-id="{{$sale->id}}" data-color="#304be0" style="background-color:#304be0;"></span>
                                <span class="color-box" data-id="{{$sale->id}}" data-color="#ee2f8a" style="background-color:#ee2f8a;"></span>
                                <span class="color-box" data-id="{{$sale->id}}" data-color="#61c36e" style="background-color:#61c36e;"></span>
                                <span class="color-box" data-id="{{$sale->id}}" data-color="#9872e6" style="background-color:#9872e6;"></span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        @endforeach

        <div class="o_column_quick_create flex-shrink-0 flex-grow-1 flex-md-grow-0">
            <div class="o_quick_create_folded position-sticky z-index-1 my-3 text-nowrap">
                <button class="o_kanban_add_column btn btn-light w-100" aria-label="Add column" data-tooltip="Add column">
                    <i class="fa fa-plus me-2" role="img"></i>Stage
                </button>
            </div>
        </div>


        <script>
            $(document).ready(function() {
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
                                            <input type="text" class="form-control bg-view new_stage_input" placeholder="Stage...">
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
                            $(document).off(
                                'click.outsideClick'
                            );
                        }
                    });
                });
            });

        </script>

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

@endsection

@push('scripts')
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
<link rel="stylesheet" href="https://code.jquery.com/ui/1.14.0/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.14.0/jquery-ui.min.js"></script>

<script>
    function appendContent($this) {
        var containerId = $this.closest('.o_kanban_group').find('#append-container-new');
        var append_id = $this.closest('.o_kanban_group').data('id');
        let isContentAppendedFlag = false

        // set the flag to true if the content is already appended
        if (containerId.find('.o_kanban_quick_create').length) {
            isContentAppendedFlag = true;
        }

        $('.append-container-new').hide();

        $(document).on('click', '.o_form_button_cancel', function(event) {
            event.preventDefault();
            $(containerId).hide();
        });
        if (!isContentAppendedFlag) {
            var htmlContent = `<div id="appended-content" class="o_kanban_group flex-shrink-0 flex-grow-1 flex-md-grow-0 o_group_draggable" data-id="${append_id}">
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
                                                                        <input type="hidden" name="partner_id" class="o_input">
                                                                        <input type="text" name="parter_name" class="o-autocomplete--input o_input" autocomplete="off" role="combobox" aria-autocomplete="list" aria-haspopup="listbox" id="partner_id_0" placeholder="" aria-expanded="false">
                                                                        <!--                                                                        <ul class="o-autocomplete&#45;&#45;dropdown-menu dropdown-menu" style="display: none;"></ul>-->
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
                                                            <input name="name" class="o_input" id="name_0" type="text" autocomplete="off" placeholder="e.g. Product Pricing">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                    <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                        <label class="o_form_label" for="email_from_0">Email</label>
                                                    </div>
                                                    <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                                        <div name="email_from" class="o_field_widget o_field_char">
                                                            <input name="email" class="o_input" id="email_from_0" type="text" autocomplete="off" placeholder="e.g. &quot;email@address.com&quot;">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                    <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                        <label class="o_form_label" for="phone_0">Phone</label>
                                                    </div>
                                                    <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                                        <div name="phone" class="o_field_widget o_field_char">
                                                            <input name="phone" class="o_input" id="phone_0" type="text" autocomplete="off" placeholder="e.g. &quot;0123456789&quot;">
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
                                                                        <span class="o_input position-absolute pe-none d-flex w-100"><span>₹&nbsp;</span><span class="opacity-0 d-inline-block overflow-hidden mw-100 o_monetary_ghost_value">0.00</span></span><span class="opacity-0">₹&nbsp;</span>
                                                                            <input  name="expected_revenue" class="o_input flex-grow-1 flex-shrink-1" autocomplete="off" id="expected_revenue_0" type="text">
                                                                    </div>
                                                                </div>
                                                                <div name="priority" class="o_field_widget o_field_priority oe_inline">
                                                                    <div class="o_priority" role="radiogroup" name="priority" aria-label="Priority">
                                                                        <a href="#" class="o_priority_star fa fa-star-o" role="radio" tabindex="-1" data-value="medium" data-tooltip="Priority: Medium" aria-label="Medium"></a>
                                                                        <a href="#" class="o_priority_star fa fa-star-o" role="radio" tabindex="-1" data-value="high" data-tooltip="Priority: High" aria-label="High"></a>
                                                                        <a href="#" class="o_priority_star fa fa-star-o" role="radio" tabindex="-1" data-value="very_high" data-tooltip="Priority: Very High" aria-label="Very High"></a>
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

            isContentAppendedFlag = true;
            autoInputComplate('#partner_id_0', '{{ route('contact.suggestions') }}'
                , function(selectedText, selected_id = 0) {
                    containerId.find('input[name="partner_id"]').val(selected_id);

                    // contact details and show if selected_id != 0
                    if (selected_id != 0) {
                        let url = "{{ route('contact.show', ['contact' => ':id']) }}";
                        url = url.replace(':id', selected_id);
                        $.ajax({
                            type: 'GET'
                            , url: url
                            , data: {
                                id: selected_id
                            , }
                            , success: function(response) {
                                // console.log(response);
                                var _contact = response.contact;
                                containerId.find('input[name="email"]').val(_contact.email);
                                containerId.find('input[name="phone"]').val(_contact.phone);
                                containerId.find('input[name="name"]').val(_contact.name + "'s Opportunity");
                            }
                            , error: function(err) {
                                console.log(err);
                            }
                        });
                    }

                    if (selected_id == 0) {
                        $.ajax({
                            type: 'POST'
                            , url: "{{ route('contact.save') }}"
                            , data: {
                                contact_name: selectedText
                            , }
                            , success: function(response) {
                                var _contact = response.contact;
                                $('input[name="partner_id"]').val(_contact.id);
                                containerId.find('input[name="name"]').val(_contact.name + "'s Opportunity");
                            }
                            , error: function(err) {
                                console.log(err);
                            }
                        });
                    }

                });
        }

        $(containerId).show();
    }

    $(document).ready(function() {
        var isContentAppendedNew = false;
        $('.new-lead-btn').click(function(event) {
            event.preventDefault(); // Prevent default action
            appendContent($(this));
        });

        $('.head_new_btn').click(function(event) {
            event.preventDefault();
            let firstContainer = $(document).find('.new-lead-btn').eq(0);
            appendContent(firstContainer);
        });



        var insideCard = $(document).find(".o_kanban_record");
        makeDropableInsideCard(insideCard);

        function makeDropableInsideCard(insideCard) {
            insideCard.draggable({
                connectToSortable: ".o_kanban_group"
                , revert: "invalid"
                , cursor: "move"
                , helper: "original"
                , start: function(event, ui) {
                    ui.helper.addClass("o_dragged");
                    ui.helper.width($(this).width());
                    ui.helper.height($(this).height());
                    ui.helper.data('originalElement', $(this));
                }
                , stop: function(event, ui) {
                    // $(this).remove();
                    $(this).removeClass("o_dragged");
                }
            });
        }

        // Make kanban groups droppable
        $(".o_kanban_group").droppable({
            accept: ".o_kanban_record"
            , hoverClass: "o_kanban_hover"
            , classes: {
                "ui-droppable-hover": "o_kanban_hover"
            }
            , drop: function(event, ui) {
                // Clone the dragged record and remove the drag class
                var droppedRecord = ui.helper.clone().removeClass("o_dragged");
                droppedRecord.attr('style', '');
                // Append the cloned record to the new group
                $(this).append(droppedRecord);

                var originalRecord = $(ui.helper.data('originalElement'));
                originalRecord.remove();
                ui.helper.remove();

                // Reinitialize draggable on the newly added element
                makeDropableInsideCard(droppedRecord);

                // update in database by ajax as update stage_id
                var sale_id = droppedRecord.data('id');
                var stage_id = $(this).data('id');
                $.ajax({
                    type: 'POST'
                    , url: "{{ route('sale.setStage') }}"
                    , data: {
                        id: sale_id
                        , stage_id: stage_id
                    , }
                    , success: function(response) {
                        // toastr.success("Stage Updated");
                        // location.reload();
                    }
                    , error: function(err) {
                        console.log(err);
                    }
                });
            }

        });





        // submit form by ajax onm o-kanban-button-new
        $(document).on('click', '.o-kanban-button-new', function() {
            var partner_id = $(this).closest('.o_kanban_group').find('input[name="partner_id"]').val();
            var name = $(this).closest('.o_kanban_group').find('input[name="name"]').val();
            var email = $(this).closest('.o_kanban_group').find('input[name="email"]').val();
            var phone = $(this).closest('.o_kanban_group').find('input[name="phone"]').val();
            var expected_revenue = $(this).closest('.o_kanban_group').find('input[name="expected_revenue"]').val();
            var stage_id = $(this).closest('.o_kanban_group').data('id');

            var priority = $(this).closest('.o_kanban_group').find('.o_priority_star.fa-star').last().data('value');


            $.ajax({
                type: 'POST'
                , url: "{{ route('crm.newSales') }}"
                , data: {
                    stage_id: stage_id
                    , contact_id: partner_id
                    , name: name
                    , email: email
                    , phone: phone
                    , expected_revenue: expected_revenue
                    , priority: priority
                , }
                , success: function(response) {
                    toastr.success("Sale Created");
                    // location.reload();
                }
                , error: function(err) {
                    console.log(err);
                }
            });
        });


        // set priority ajax
        $(document).on('click', '.set-priority .o_priority_star', function() {
            var priority = $(this).data('value');
            var sale_id = $(this).closest('.o_kanban_record').data('id');
            $.ajax({
                type: 'POST'
                , url: "{{ route('sale.setPriority') }}"
                , data: {
                    priority: priority
                    , sale_id: sale_id
                , }
                , success: function(response) {
                    // toastr.success("Priority Set");
                    // location.reload();
                }
                , error: function(err) {
                    console.log(err);
                }
            });
        });

    });

</script>
<script>
    $(document).ready(function() {
        // stage add
        $(document).on('click', '.o_kanban_add', function() {
            var newStage = $(this).closest('.o_quick_create_unfolded').find('.new_stage_input').val();
            $.ajax({
                type: 'POST'
                , url: "{{ route('crm.newStage') }}"
                , data: {
                    newStage: newStage
                , }
                , success: function(response) {
                    toastr.success("Stage Cerated");
                    location.reload();
                }
                , error: function(err) {
                    console.log(err);
                }
            });
        });
    });

</script>

<script>
    // for sorting of stages
    $(document).ready(function() {
        $(".o_kanban_grouped").sortable({
            // connectWith: ".o_kanban_group",
            handle: ".o_kanban_header_title"
            , classes: {
                "ui-sortable-placeholder": "o_kanban_group_placeholder"
                , "ui-sortable-helper": "o_dragged shadow"
            , },
            // placeholder: "o_kanban_group_placeholder",
            // forcePlaceholderSize: true,
            start: function(event, ui) {
                ui.placeholder.height(ui.item.height());
            }
            , update: function(event, ui) {
                // array with id and the sequence
                var stages = [];
                $(".o_kanban_grouped .o_kanban_group").each(function(index, element) {
                    var stage_id = $(element).data('id');
                    stages.push({
                        id: stage_id
                        , sequence: index
                    , });
                });

                $.ajax({
                    type: 'POST'
                    , url: "{{ route('crm.updateStageSequence') }}"
                    , data: {
                        stages: stages
                    }
                    , success: function(response) {
                        // toastr.success("Stage Updated");
                        // location.reload();
                    }
                    , error: function(err) {
                        console.log(err);
                    }
                });
            }
        });

    });

</script>

<script>
    // contact-card click event by jquery
    $(document).on('click', '.oe_kanban_content', function() {
        var id = $(this).data('id'); // Get the data-id attribute from the clicked row
        if (id) {
            window.location.href = '/pipeline-create/' + id; // Adjust the URL to your edit page
        }
    });

    $(document).ready(function() {
        $('.o_dropdown_kanban button').on('click', function(e) {
            e.stopPropagation();
            // Toggle the dropdown
            var dropdownMenu = $(this).siblings('.custom-dropdown');
            dropdownMenu.toggle();
        });

        // Close the dropdown when clicking outside
        $(document).on('click', function() {
            $('.custom-dropdown').hide();
        });

        // Prevent closing the dropdown when clicking inside it
        $('.custom-dropdown').on('click', function(e) {
            e.stopPropagation();
        });

        $('.color-box').on('click' , function(e){
            var color = $(this).data('color');
            var sale_id = $(this).data('id');  

             $.ajax({
                type: 'POST'
                , url: "{{ route('crm.setColor') }}"
                , data: {
                    color: color
                    , sale_id: sale_id
                , }
                , success: function(response) {
                     if (response.success) {
                        // Update the background color of the related div
                        $('.oe_kanban_color[data-id="' + sale_id + '"]').css('background', color);
                    }
                  
                }
                , error: function(err) {
                    console.log(err);
                }
            });
        });
        
        $('.op_edit').on('click', function(e){
            var sale_id = $(this).data('id');
            window.location.href = '/pipeline-create/' + sale_id;
        });
        $('.op_delete').on('click', function(e){
            var sale_id = $(this).data('id');  

             $.ajax({
                type: 'get'
                , url: "{{ route('crm.delete') }}"
                , data: {
                     sale_id: sale_id
                , }
                , success: function(response) {
                    $('.o_legacy_kanban_record[data-id="' + sale_id + '"]').remove();
                  
                }
                , error: function(err) {
                    console.log(err);
                }
            });
        });
    });

</script>

<script>
    $(document).ready(function() {

        $('.activityButton').on('click', function(e) {
            e.preventDefault(); // Prevent any default action
            
            var activityId = $(this).data('id'); // Get the data-id of the clicked button
            var $popover = $('.activityPopover[data-id="' + activityId + '"]'); // Get the related popover
            var buttonOffset = $(this).offset(); // Get the position of the clicked button
            var buttonHeight = $(this).outerHeight(); // Get the height of the button

            // Hide all other popovers
            $('.activityPopover').addClass('d-none');

            // Position the popover below the button
            $popover.toggleClass('d-none'); // Toggle the popover visibility
        });

        // Close the popover if clicking outside of the button or the popover
        $(document).on('click', function(event) {
            if (!$(event.target).closest('.activityButton, .activityPopover').length) {
                $('.activityPopover').addClass('d-none'); // Hide all popovers if clicked outside
            }
        });

        function toggleFeedback(targetDiv) {
            $(targetDiv).toggleClass('d-none');
        }

        // Handling "Mark as Done" for all activities
        $('.o-mail-ActivityListPopoverItem-markAsDone').on('click', function(event) {
            event.stopPropagation(); // Prevent click from closing the popover
            var targetDiv = $(this).data('target');
            toggleFeedback(targetDiv);
        });

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
                    location.reload();
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

        $('.o-mail-ActivityListPopoverItem-editbtn').on('click', function(event) {
            event.stopPropagation(); // Prevent click from closing the popover
            var activityId = $(this).closest('[data-id]').data('id'); // Get the ID from the parent
            console.log('Edit activity ID:', activityId);
            // Here you could open a modal or an edit form for this activity
        });
    });
</script>
@endpush

@push('head_scripts')
@vite ('resources/js/common.js')
@endpush
