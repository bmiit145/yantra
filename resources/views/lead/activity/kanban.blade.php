@extends('layout.header')
@section('content')
@section('head_breadcrumb_title', 'My Activities')
@section('lead', route('lead.allActivities'))
@section('kanban', route('activity.kanban'))
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
@vite([
    'resources/css/crm_2.css',
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

    .location {
        display: none;
    }

    .head_new_btn {
        display: none;
    }

    .main_header_wrapper .o_form_button_save {
        display: none;
    }

    .calendar {
        display: none;
    }

    .pivot {
        display: none;
    }

    .graph {
        display: none;
    }

    .activity {
        display: none;
    }

    .today {
        color: #9A6B01;
    }

    .due-yesterday {
        color: #dc3545;
    }

    .due-tomorrow {
        color: #28a745;
    }

    .due-days-ago {
        color: #dc3545;
    }

    .due-in-days {
        color: #28a745;
    }
</style>

<div class="o_content">
    <div
        class="o_kanban_renderer o_renderer d-flex o_kanban_ungrouped align-content-start flex-wrap justify-content-start">
        @foreach ($activityKanban as $kanban)
                @php
                    $dueDate = new DateTime($kanban->due_date ?? '');
                    $now = new DateTime();
                    $dueDate->setTime(0, 0, 0);
                    $now->setTime(0, 0, 0);
                    $diffDays = $dueDate->diff($now)->days;
                    $diffDays = ($dueDate < $now ? -1 : 1) * $diffDays;

                    if ($diffDays === 0) {
                        $status = 'Today';
                        $className = 'today';
                    } elseif ($diffDays === -1) {
                        $status = 'Yesterday';
                        $className = 'due-yesterday';
                    } elseif ($diffDays === 1) {
                        $status = 'Tomorrow';
                        $className = 'due-tomorrow';
                    } elseif ($diffDays < -1) {
                        $status = abs($diffDays) . ' Days ago';
                        $className = 'due-days-ago';
                    } else {
                        $status = 'In ' . $diffDays . ' days';
                        $className = 'due-in-days';
                    }
                @endphp
                <a href="{{ route('lead.create', $kanban->lead_id) }}">
                    <div role="article" class="o_kanban_record d-flex flex-grow-1 flex-md-shrink-1 flex-shrink-0 contact-card"
                        data-id="{{ $kanban->lead_id }}" tabindex="0">
                        <div class="oe_kanban_global_click o_kanban_record_has_image_fill o_res_partner_kanban">
                            <div class="oe_kanban_details d-flex flex-column justify-content-between">
                                <div class="d-flex justify-content-between">
                                    <span>
                                        <span class="fw-bold text-black">{{$kanban->getLead->product_name ?? ''}}</span>
                                        (<span class="text-muted">Lead/Opportunity</span>)
                                    </span>
                                    <div name="activity_type_id" class="o_field_widget o_field_badge">
                                        <span class="badge rounded-pill">
                                            {{ ucwords(str_replace('-', ' ', strtolower($kanban->activity_type ?? ''))) }}
                                        </span>
                                    </div>
                                </div>
                                <div class="d-flex flex-row gap-2">
                                    <div class="text-truncate">
                                        <span class="text-black">{{$kanban->summary ?? ''}}</span>
                                    </div>
                                </div>
                                <div class="o_kanban_record_bottom">
                                    <div class="oe_kanban_bottom_left">
                                        <li class="nav-item header-bg-btn dropdown">
                                            <a class="nav-link" href="#" id="notificationDropdown{{ $kanban->id }}"
                                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <span
                                                    class="kanban-avatar-initials rounded d-flex align-items-center justify-content-center">
                                                    {{ strtoupper($kanban->getUser->name[0] ?? strtoupper($currentUser->name[0] ?? '')) }}
                                                </span>
                                            </a>
                                            <!-- Dropdown Menu -->
                                            <div class="dropdown-menu dropdown-menu-end p-3"
                                                aria-labelledby="notificationDropdown{{ $kanban->id }}"
                                                style="width: 300px;height: 143px;">
                                                <div class="o_avatar_card">
                                                    <div class="card-body">
                                                        <div class="d-flex align-items-start gap-2">
                                                            <span class="o_avatar pt-1 position-relative o_card_avatar">
                                                                <!-- Placeholder for the avatar with the first letter of the name -->
                                                                <span
                                                                    class="avatar-initials rounded d-flex align-items-center justify-content-center">
                                                                    {{ strtoupper($kanban->getUser->name[0] ?? strtoupper($currentUser->name[0] ?? '')) }}
                                                                </span>
                                                                <span name="icon"
                                                                    class="o_card_avatar_im_status position-absolute d-flex align-items-center justify-content-center">
                                                                    <i class="fa fa-fw fa-circle text-success" title="Online"
                                                                        role="img" aria-label="User is online"></i>
                                                                </span>
                                                            </span>
                                                            <div class="d-flex flex-column o_card_user_infos overflow-hidden">
                                                                <span
                                                                    class="fw-bold">{{ $kanban->getUser->email ?? $currentUser->email ?? '' }}</span>
                                                                <span class="text-muted text-truncate" data-tooltip="Department"
                                                                    title="Administration">{{ $kanban->getUser->name ?? $currentUser->name ?? '' }}</span>
                                                                <a class="text-truncate"
                                                                    href="mailto:{{ $kanban->getUser->email ?? $currentUser->email ?? '' }}"
                                                                    title="{{ $kanban->getUser->email ?? $currentUser->email ?? '' }}">
                                                                    <i
                                                                        class="fa fa-fw fa-envelope me-1"></i>{{ $kanban->getUser->email ?? $currentUser->email ?? '' }}
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="flex-wrap gap-2 mt-2">
                                                            <div class="justify-content-end d-flex align-items-baseline">
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
                                        <div name="date_deadline"
                                            class="o_field_widget o_required_modifier o_field_remaining_days">
                                            <div class="{{ $className }}" title="{{ $dueDate->format('d/m/Y') }}">{{ $status }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row gap-2">
                                        <button class="btn btn-link btn-sm oe_kanban_action oe_kanban_action_button mark-done"
                                            data-id="{{ $kanban->id }}">
                                            <i class="fa fa-check"></i> Done
                                        </button>
                                        <button
                                            class="btn btn-link text-danger btn-sm oe_kanban_action oe_kanban_action_button cancel"
                                            data-id="{{ $kanban->id }}">
                                            <i class="fa fa-times"></i> Cancel
                                        </button>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Ensure jQuery is included -->

    <script>
        $(document).ready(function () {
            // Handle Done button click
            $(document).on('click', '.mark-done', function () {
                var $button = $(this);
                var id = $button.data('id');
                $.ajax({
                    url: '{{ route('activity.markAsDone', ':id') }}'.replace(':id', id),
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (response) {
                        if (response.success) {
                            $button.closest('.o_kanban_record').remove();
                        } else {
                            alert('Failed to mark as done');
                        }
                    },
                    error: function (xhr, status, error) {
                        alert('An error occurred: ' + error);
                    }
                });
            });

            // Handle Cancel button click
            $(document).on('click', '.cancel', function () {
                var $button = $(this);
                var id = $button.data('id');
                $.ajax({
                    url: '{{ route('activity.cancel', ':id') }}'.replace(':id', id),
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (response) {
                        if (response.success) {
                            $button.closest('.o_kanban_record').remove();
                        } else {
                            alert('Failed to cancel');
                        }
                    },
                    error: function (xhr, status, error) {
                        alert('An error occurred: ' + error);
                    }
                });
            });
        });
    </script>
@endpush