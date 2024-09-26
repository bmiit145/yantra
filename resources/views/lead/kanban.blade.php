@extends('layout.header')
@section('content')
@section('head_breadcrumb_title', 'Leads')
@section('head_new_btn_link', route('lead.create'))
@section('kanban', route('lead.kanban', ['lead' => 'kanban']))
@section('calendar', route('lead.calendar', ['lead' => 'calendar']))
@section('char_area', route('lead.graph'))
@section('activity', route('lead.activity'))
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
@vite([
    'resources/css/crm_2.css',
    //    'resources/css/odoo/web.assets_web_print.min.css'
])

<style>
    .o_priority_star.fa-star {
        color: #f3cc00;
    }

    .o_priority_star.fa-star-o {
        color: rgba(55, 65, 81, 0.76);
    }

    .header-bg-btn .dropdown-menu {
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .header-bg-btn .dropdown-item img {
        object-fit: cover;
    }

    .header-bg-btn .dropdown-header {
        font-weight: bold;
        font-size: 16px;
    }

    .header-bg-btn .dropdown-item {
        cursor: pointer;
    }

    .header-bg-btn .badge {
        font-size: 0.75rem;
        border-radius: 10px;
        padding: 4px 8px;
    }

    .header-bg-btn .badge.counter-bubble {
        font-size: 0.75rem;
        border-radius: 50%;
        /* padding: 4px 8px; */
        height: 16px;
        width: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        position: absolute;
        top: 11px;
        right: 10px;
        font-size: 10px;
    }

    .navbar-expand-sm .navbar-nav .dropdown-menu:before {
        content: "";
        position: absolute;
        width: 0;
        height: 0;
        top: -21px;
        left: 90.3%;
        border-left: 14px solid #00000000;
        border-right: 14px solid #00000000;
        border-bottom: 20px solid #00000029;
    }

    .navbar-expand-sm .navbar-nav .dropdown-menu:after {
        top: 20px;
        position: absolute;
        z-index: 11;
        display: block;
    }

    .navbar-expand-sm .navbar-nav .dropdown-menu:after {
        content: "";
        position: absolute;
        width: 0;
        height: 0;
        top: -18px;
        left: 90.5%;
        border-left: 13px solid #00000000;
        border-right: 13px solid #00000000;
        border-bottom: 18px solid #FFFFFF;
    }

    .avatar-initials {
        width: 40px;
        height: 40px;
        background-color: #017e84;
        color: white;
        font-size: 20px;
        border-radius: 50%;
        text-align: center;
        line-height: 40px;
    }

    .kanban-avatar-initials {
        width: 20px;
        height: 20px;
        background-color: #017e84;
        color: white;
        font-size: 18px;
        border-radius: 50%;
        text-align: center;
        line-height: 40px;
    }
    .location{
     display: none;
    }
</style>

<div class="o_content">
    <div
        class="o_kanban_renderer o_renderer d-flex o_kanban_ungrouped align-content-start flex-wrap justify-content-start">
        @foreach ($leads as $lead)
            <a href="{{route('lead.create', $lead->id)}}">
                <div role="article" class="o_kanban_record d-flex flex-grow-1 flex-md-shrink-1 flex-shrink-0 contact-card"
                    data-id="{{ $lead->id }}" tabindex="0">
                    <div class="oe_kanban_global_click o_kanban_record_has_image_fill o_res_partner_kanban">
                        <div class="oe_kanban_details d-flex flex-column justify-content-between">
                            <div>
                                <strong class="o_kanban_record_title oe_partner_heading">
                                    <span>{{ $lead->product_name ?? '' }}</span>
                                </strong>
                                <div class="o_kanban_tags_section oe_kanban_partner_categories">
                                    <span class="oe_kanban_list_many2many">
                                        <div name="category_id" class="o_field_widget o_field_many2many_tags">
                                            <div class="d-flex flex-wrap gap-1"></div>
                                        </div>
                                    </span>
                                </div>
                            </div>
                            <div class="o_kanban_record_bottom">
                                <div class="oe_kanban_bottom_left">
                                    <div name="priority" class="o_field_widget o_field_priority">
                                        <div name="priority" class="o_field_widget o_field_priority">
                                            <div class="o_priority set-priority" role="radiogroup" name="priority"
                                                aria-label="Priority">
                                                <a href="#"
                                                    class="o_priority_star fa {{ $lead->priority == 'medium' || $lead->priority == 'high' || $lead->priority == 'very_high' ? 'fa-star' : 'fa-star-o' }}"
                                                    role="radio" tabindex="-1" data-value="medium"
                                                    data-tooltip="Priority: Medium" aria-label="Medium"></a><a href="#"
                                                    class="o_priority_star fa {{ $lead->priority == 'high' || $lead->priority == 'very_high' ? 'fa-star' : 'fa-star-o' }}"
                                                    role="radio" tabindex="-1" data-value="high"
                                                    data-tooltip="Priority: High" aria-label="High"></a><a href="#"
                                                    class="o_priority_star fa {{ $lead->priority == 'very_high' ? 'fa-star' : 'fa-star-o' }}"
                                                    role="radio" tabindex="-1" data-value="very_high"
                                                    data-tooltip="Priority: Very High" aria-label="Very High"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div name="activity_ids" class="o_field_widget o_field_kanban_activity">
                                        <a class="o-mail-ActivityButton" role="button" aria-label="Show activities"
                                            title="Show activities">
                                            <i class="fa fa-fw fa-lg text-muted fa-clock-o btn-link text-dark" role="img">
                                            </i>
                                        </a>
                                    </div>
                                </div>
                                <div class="oe_kanban_bottom_right">
                                    <div name="user_id"
                                        class="o_field_widget o_field_many2one_avatar_user o_field_many2one_avatar_kanban o_field_many2one_avatar">
                                        <div class="d-flex align-items-center gap-1 user-icon" data-tooltip="">
                                            <li class="nav-item header-bg-btn dropdown">
                                                <a class="nav-link" href="#" id="notificationDropdown{{ $lead->id }}"
                                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <span
                                                        class="kanban-avatar-initials rounded d-flex align-items-center justify-content-center">
                                                        {{ strtoupper($lead->getUser->name[0] ?? strtoupper($currentUser->name[0] ?? '')) }}
                                                    </span>
                                                </a>
                                                <!-- Dropdown Menu -->
                                                <div class="dropdown-menu dropdown-menu-end p-3"
                                                    aria-labelledby="notificationDropdown{{ $lead->id }}"
                                                    style="width: 300px;height: 143px;">
                                                    <div class="o_avatar_card">
                                                        <div class="card-body">
                                                            <div class="d-flex align-items-start gap-2">
                                                                <span class="o_avatar pt-1 position-relative o_card_avatar">
                                                                    <!-- Placeholder for the avatar with the first letter of the name -->
                                                                    <span
                                                                        class="avatar-initials rounded d-flex align-items-center justify-content-center">
                                                                        {{ strtoupper($lead->getUser->name[0] ?? strtoupper($currentUser->name[0] ?? '')) }}
                                                                    </span>
                                                                    <span name="icon"
                                                                        class="o_card_avatar_im_status position-absolute d-flex align-items-center justify-content-center">
                                                                        <i class="fa fa-fw fa-circle text-success"
                                                                            title="Online" role="img"
                                                                            aria-label="User is online"></i>
                                                                    </span>
                                                                </span>
                                                                <div
                                                                    class="d-flex flex-column o_card_user_infos overflow-hidden">
                                                                    <span
                                                                        class="fw-bold">{{ $lead->getUser->email ?? $currentUser->email ?? '' }}</span>
                                                                    <span class="text-muted text-truncate"
                                                                        data-tooltip="Department"
                                                                        title="Administration">{{ $lead->getUser->name ?? $currentUser->name ?? '' }}</span>
                                                                    <a class="text-truncate"
                                                                        href="mailto:{{ $lead->getUser->email ?? $currentUser->email ?? '' }}"
                                                                        title="{{ $lead->getUser->email ?? $currentUser->email ?? '' }}">
                                                                        <i
                                                                            class="fa fa-fw fa-envelope me-1"></i>{{ $lead->getUser->email ?? $currentUser->email ?? '' }}
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="flex-wrap gap-2 mt-2">
                                                                <div
                                                                    class="justify-content-end d-flex align-items-baseline">
                                                                    <div class="d-flex gap-2 o_avatar_card_buttons">
                                                                        <button class="btn btn-secondary btn-sm">Send
                                                                            message</button>
                                                                        <button class="btn btn-secondary btn-sm">View
                                                                            Profile</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach

        <div class="o_kanban_record o_kanban_ghost flex-grow-1 flex-md-shrink-1 flex-shrink-0 my-0"></div>
        <div class="o_kanban_record o_kanban_ghost flex-grow-1 flex-md-shrink-1 flex-shrink-0 my-0"></div>
        <div class="o_kanban_record o_kanban_ghost flex-grow-1 flex-md-shrink-1 flex-shrink-0 my-0"></div>
        <div class="o_kanban_record o_kanban_ghost flex-grow-1 flex-md-shrink-1 flex-shrink-0 my-0"></div>
        <div class="o_kanban_record o_kanban_ghost flex-grow-1 flex-md-shrink-1 flex-shrink-0 my-0"></div>
        <div class="o_kanban_record o_kanban_ghost flex-grow-1 flex-md-shrink-1 flex-shrink-0 my-0"></div>
    </div>
</div>

@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function () {
            // Handle star click event
            $('.o_priority_star').on('click', function (e) {
                e.preventDefault();

                var $this = $(this);
                var $kanbanRecord = $this.closest('.o_kanban_record');
                var leadId = $kanbanRecord.data('id');
                var priority = $this.data('value');

                if (!leadId) {
                    alert('Lead ID is missing. Please try again.');
                    return;
                }

                // Send AJAX request to update priority
                $.ajax({
                    url: '{{ route('lead.updatePriority') }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        lead_id: leadId,
                        priority: priority
                    },
                    success: function (response) {
                        // Update UI
                        updatePriorityStars($kanbanRecord, priority);
                    },
                    error: function () {
                        alert('An error occurred. Please try again.');
                    }
                });
            });

            // Function to update star UI based on priority
            function updatePriorityStars($kanbanRecord, selectedPriority) {
                var priorities = ['medium', 'high', 'very_high'];
                var selectedIndex = priorities.indexOf(selectedPriority);

                priorities.forEach(function (priority, index) {
                    var $star = $kanbanRecord.find('.o_priority_star[data-value="' + priority + '"]');
                    if (index <= selectedIndex) {
                        $star.removeClass('fa-star-o').addClass('fa-star');
                    } else {
                        $star.removeClass('fa-star').addClass('fa-star-o');
                    }
                });
            }

            // Initialize star states based on priority from the server
            $('.o_kanban_record').each(function () {
                var $record = $(this);
                var priority = $record.data('priority');
                if (priority) {
                    updatePriorityStars($record, priority);
                }
            });
        });

    </script>
@endpush