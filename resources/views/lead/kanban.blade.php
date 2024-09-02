@extends('layout.header')
@section('content')
@section('head_breadcrumb_title', 'Leads')
@section('head_new_btn_link', route('lead.create'))
@section('kanban', route('lead.kanban', ['lead' => 'kanban']))
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
    //    'resources/css/odoo/web.assets_web_print.min.css'
])

<style>
    .o_priority_star.fa-star {
        color: #f3cc00;
    }

    .o_priority_star.fa-star-o {
        color: rgba(55, 65, 81, 0.76);
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
                                <!-- <div class="oe_kanban_bottom_right">
                                                    <div name="user_id"
                                                        class="o_field_widget o_field_many2one_avatar_user o_field_many2one_avatar_kanban o_field_many2one_avatar">
                                                        <div class="d-flex align-items-center gap-1" data-tooltip="">
                                                            <span class="o_avatar o_m2o_avatar d-flex">
                                                                <img class="rounded" src="http://127.0.0.1:8000/images/placeholder.png">
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div> -->
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