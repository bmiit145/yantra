@extends('layout.header')
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
    <li class="dropdown">
        <a href="{{ url('lead') }}">Leads</a>

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

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>

@section('head')
    @vite(['resources/css/crm_2.css'])
@endsection

@section('content')
    <div class="o_content" style="height: 100%">
        <div class="o_kanban_renderer o_renderer d-flex o_kanban_grouped align-content-stretch">
            <div class="o_kanban_group flex-shrink-0 flex-grow-1 flex-md-grow-0 o_group_draggable"
                ondrop="handleDrop(event)" ondragover="handleDragOver(event)">
                <div class="o_kanban_header position-sticky top-0 z-index-1 py-2">
                    <div class="o_kanban_header_title position-relative d-flex lh-lg">
                        <span
                            class="o_column_title flex-grow-1 d-inline-block mw-100 text-truncate fs-4 fw-bold align-top text-900">
                            None
                        </span>
                        <div class="o_kanban_config">
                            <button class="btn px-2 o-dropdown dropdown-toggle dropdown" aria-expanded="false">
                                <i class="fa fa-gear opacity-50 opacity-100-hover" role="img" aria-label="Settings"
                                    title="Settings"></i>
                            </button>
                        </div>
                        <button class="o_kanban_quick_add new-lead-btn btn pe-2 me-n2">
                            <i class="fa fa-plus opacity-75 opacity-100-hover" role="img" aria-label="Quick add"
                                title="Quick add"></i>
                        </button>
                    </div>
                    <div class="o_kanban_counter position-relative d-flex align-items-center justify-content-between">
                        <div class="o_animated_number ms-2 text-900 text-nowrap cursor-default false"
                            title="Expected Revenue">
                            <b></b>
                        </div>
                    </div>
                </div>

                <div id="append-container-new" class="append-container-new">

                    @foreach ($crmStages as $stage)
                        @foreach ($stage->sales as $sale)
                            @if ($sale->deadline == null)
                                <div role="article"
                                    class="o_kanban_record sale-card d-flex o_draggable oe_kanban_card_undefined o_legacy_kanban_record"
                                    data-id="{{ $sale->id }}" tabindex="0" draggable="true">
                                    <div class="oe_kanban_color_0 oe_kanban_global_click oe_kanban_card d-flex flex-column">
                                        <div class="oe_kanban_content flex-grow-1">
                                            <div class="oe_kanban_details">
                                                <strong class="o_kanban_record_title">
                                                    <span>{{ $sale->opportunity }}</span>
                                                </strong>
                                            </div>
                                            @if ($sale->contact)
                                                <div>
                                                    <span
                                                        class="o_text_overflow">{{ optional($sale->contact)->name }}</span>
                                                </div>
                                            @endif
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
                                                        <div class="o_priority set-priority" role="radiogroup"
                                                            name="priority" aria-label="Priority">
                                                            <a href="#"
                                                                class="o_priority_star fa {{ $sale->priority == 'medium' || $sale->priority == 'high' || $sale->priority == 'very_high' ? 'fa-star' : 'fa-star-o' }}"
                                                                role="radio" tabindex="-1" data-value="medium"
                                                                data-tooltip="Priority: Medium" aria-label="Medium"></a>
                                                            <a href="#"
                                                                class="o_priority_star fa {{ $sale->priority == 'high' || $sale->priority == 'very_high' ? 'fa-star' : 'fa-star-o' }}"
                                                                role="radio" tabindex="-1" data-value="high"
                                                                data-tooltip="Priority: High" aria-label="High"></a>
                                                            <a href="#"
                                                                class="o_priority_star fa {{ $sale->priority == 'very_high' ? 'fa-star' : 'fa-star-o' }}"
                                                                role="radio" tabindex="-1" data-value="very_high"
                                                                data-tooltip="Priority: Very High"
                                                                aria-label="Very High"></a>
                                                        </div>
                                                    </div>
                                                    <div name="activity_ids" class="o_field_widget o_field_kanban_activity">
                                                        <a class="o-mail-ActivityButton" role="button"
                                                            aria-label="Show activities" title="Show activities">
                                                            <i class="fa fa-fw fa-lg text-muted fa-clock-o btn-link text-dark"
                                                                role="img"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="oe_kanban_bottom_right">
                                                    <div name="user_id"
                                                        class="o_field_widget o_field_many2one_avatar_user o_field_many2one_avatar_kanban o_field_many2one_avatar">
                                                        <div class="d-flex align-items-center gap-1"
                                                            data-tooltip="{{ $sale->email ?? '' }}">
                                                            <span class="o_avatar o_m2o_avatar d-flex">
                                                                <img class="rounded"
                                                                    src="{{ optional($sale->user)->profile ?? asset('images/placeholder.png') }}">
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="o_dropdown_kanban bg-transparent position-absolute end-0">
                                        <button class="btn o-no-caret rounded-0 o-dropdown dropdown-toggle dropdown"
                                            title="Dropdown menu" aria-expanded="false">
                                            <span class="fa fa-ellipsis-v"></span>
                                        </button>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endforeach
                </div>
            </div>

            @php
                use Carbon\Carbon;

                // Initialize the starting month
                $currentMonth = Carbon::now();
            @endphp

            @for ($i = 0; $i < 5; $i++)
                @php
                    $monthYear = $currentMonth->format('F Y');
                @endphp
                <div class="o_kanban_group flex-shrink-0 flex-grow-1 flex-md-grow-0 o_group_draggable"
                    data-month="{{ $currentMonth->format('Y-m') }}" ondrop="handleDrop(event)"
                    ondragover="handleDragOver(event)">
                    <div class="o_kanban_header position-sticky top-0 z-index-1 py-2">
                        <div class="o_kanban_header_title position-relative d-flex lh-lg">
                            <span
                                class="o_column_title flex-grow-1 d-inline-block mw-100 text-truncate fs-4 fw-bold align-top text-900">
                                {{ $monthYear }}
                            </span>
                            <div class="o_kanban_config">
                                <button class="btn px-2 o-dropdown dropdown-toggle dropdown" aria-expanded="false">
                                    <i class="fa fa-gear opacity-50 opacity-100-hover" role="img"
                                        aria-label="Settings" title="Settings"></i>
                                </button>
                            </div>
                            <button class="o_kanban_quick_add new-lead-btn btn pe-2 me-n2">
                                <i class="fa fa-plus opacity-75 opacity-100-hover" role="img" aria-label="Quick add"
                                    title="Quick add"></i>
                            </button>
                        </div>
                        <div class="o_kanban_counter position-relative d-flex align-items-center justify-content-between">
                            <div class="o_animated_number ms-2 text-900 text-nowrap cursor-default false"
                                title="Expected Revenue">
                                <b></b>
                            </div>
                        </div>
                    </div>

                    <div id="append-container-new" class="append-container-new">

                        @foreach ($crmStages as $stage)
                            @foreach ($stage->sales as $sale)
                                @if ($sale->deadline && \Carbon\Carbon::parse($sale->deadline)->format('F Y') == $monthYear)
                                    <div role="article"
                                        class="o_kanban_record sale-card d-flex o_draggable oe_kanban_card_undefined o_legacy_kanban_record"
                                        data-id="{{ $sale->id }}" tabindex="0" draggable="true">
                                        <div
                                            class="oe_kanban_color_0 oe_kanban_global_click oe_kanban_card d-flex flex-column">
                                            <div class="oe_kanban_content flex-grow-1">
                                                <div class="oe_kanban_details">
                                                    <strong class="o_kanban_record_title">
                                                        <span>{{ $sale->opportunity }}</span>
                                                    </strong>
                                                </div>
                                                @if ($sale->contact)
                                                    <div>
                                                        <span
                                                            class="o_text_overflow">{{ optional($sale->contact)->name }}</span>
                                                    </div>
                                                @endif
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
                                                            <div class="o_priority set-priority" role="radiogroup"
                                                                name="priority" aria-label="Priority">
                                                                <a href="#"
                                                                    class="o_priority_star fa {{ $sale->priority == 'medium' || $sale->priority == 'high' || $sale->priority == 'very_high' ? 'fa-star' : 'fa-star-o' }}"
                                                                    role="radio" tabindex="-1" data-value="medium"
                                                                    data-tooltip="Priority: Medium"
                                                                    aria-label="Medium"></a>
                                                                <a href="#"
                                                                    class="o_priority_star fa {{ $sale->priority == 'high' || $sale->priority == 'very_high' ? 'fa-star' : 'fa-star-o' }}"
                                                                    role="radio" tabindex="-1" data-value="high"
                                                                    data-tooltip="Priority: High" aria-label="High"></a>
                                                                <a href="#"
                                                                    class="o_priority_star fa {{ $sale->priority == 'very_high' ? 'fa-star' : 'fa-star-o' }}"
                                                                    role="radio" tabindex="-1" data-value="very_high"
                                                                    data-tooltip="Priority: Very High"
                                                                    aria-label="Very High"></a>
                                                            </div>
                                                        </div>
                                                        <div name="activity_ids"
                                                            class="o_field_widget o_field_kanban_activity">
                                                            <a class="o-mail-ActivityButton" role="button"
                                                                aria-label="Show activities" title="Show activities">
                                                                <i class="fa fa-fw fa-lg text-muted fa-clock-o btn-link text-dark"
                                                                    role="img"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="oe_kanban_bottom_right">
                                                        <div name="user_id"
                                                            class="o_field_widget o_field_many2one_avatar_user o_field_many2one_avatar_kanban o_field_many2one_avatar">
                                                            <div class="d-flex align-items-center gap-1"
                                                                data-tooltip="{{ $sale->email ?? '' }}">
                                                                <span class="o_avatar o_m2o_avatar d-flex">
                                                                    <img class="rounded"
                                                                        src="{{ optional($sale->user)->profile ?? asset('images/placeholder.png') }}">
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="o_dropdown_kanban bg-transparent position-absolute end-0">
                                            <button class="btn o-no-caret rounded-0 o-dropdown dropdown-toggle dropdown"
                                                title="Dropdown menu" aria-expanded="false">
                                                <span class="fa fa-ellipsis-v"></span>
                                            </button>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @endforeach
                    </div>
                </div>

                @php
                    // Move to the next month
                    $currentMonth->addMonth();
                @endphp
            @endfor


            <!-- Quick add button -->
            <div class="o_column_quick_create flex-shrink-0 flex-grow-1 flex-md-grow-0">
                <div class="o_quick_create_folded position-sticky z-index-1 my-3 text-nowrap">
                    <button id="add-next-month" class="o_kanban_add_column btn btn-light w-100" aria-label="Add column"
                        data-tooltip="Add column">
                        <i class="fa fa-plus me-2" role="img"></i>Add next month
                    </button>
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

    <script>
        // Handle the drag start event
        function handleDragStart(event) {
            event.dataTransfer.setData('text/plain', event.target.dataset.id);
            event.target.classList.add('dragging');
        }

        // Handle the drag end event
        function handleDragEnd(event) {
            event.target.classList.remove('dragging');
        }

        // Handle the drag over event
        function handleDragOver(event) {
            event.preventDefault();
        }

        // Handle the drop event
        function handleDrop(event) {
            event.preventDefault();
            const cardId = event.dataTransfer.getData('text/plain');
            const card = document.querySelector(`[data-id="${cardId}"]`);
            if (card) {
                const newMonth = event.target.closest('.o_kanban_group').dataset.month;

                // Append the card to the drop target container
                const container = event.target.closest('.o_kanban_group').querySelector('#append-container-new');
                if (container) {
                    container.appendChild(card);
                }
                // Send an AJAX request to update the deadline
                fetch(`/update-sale-deadline/${cardId}`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-Token': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({
                            deadline: newMonth
                        })
                    })
                    .then(response => response.json())
                    .catch(error => console.error('Error:', error));
            }
        }

        // Add event listeners to all draggable cards
        document.querySelectorAll('.o_draggable').forEach(card => {
            card.addEventListener('dragstart', handleDragStart);
            card.addEventListener('dragend', handleDragEnd);
        });

        // Add event listeners to all droppable sections
        document.querySelectorAll('.o_kanban_group').forEach(section => {
            section.addEventListener('dragover', handleDragOver);
            section.addEventListener('drop', handleDrop);
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const addNextMonthButton = document.getElementById('add-next-month');
            let currentMonth = moment(); // Initialize with current month using moment.js for convenience
            const maxMonthsAhead = 4; // Define the maximum number of months to display

            // Function to check if we can add a new month
            function canAddNewMonth() {
                const lastColumn = document.querySelector('.o_kanban_renderer .o_kanban_group:last-child');
                if (lastColumn) {
                    const lastMonth = moment(lastColumn.getAttribute('data-month'), 'YYYY-MM');
                    return lastMonth.isBefore(moment().add(maxMonthsAhead, 'months'));
                }
                return true; // If no columns are present, we can add a new one
            }

            // Function to add a new column
            function addNewMonthColumn() {
                if (!canAddNewMonth()) {
                    alert('You can only add up to 4 months ahead.');
                    return;
                }


                currentMonth.add(5, 'month'); // Increment the month by one each loop

                // Create a new column
                const newColumn = document.createElement('div');
                newColumn.classList.add('o_kanban_group', 'flex-shrink-0', 'flex-grow-1', 'flex-md-grow-0',
                    'o_group_draggable');
                newColumn.setAttribute('data-month', currentMonth.format('Y-MM'));
                newColumn.setAttribute('ondrop', 'handleDrop(event)');
                newColumn.setAttribute('ondragover', 'handleDragOver(event)');
                newColumn.innerHTML = `
                        <div class="o_kanban_header position-sticky top-0 z-index-1 py-2">
                            <div class="o_kanban_header_title position-relative d-flex lh-lg">
                                <span class="o_column_title flex-grow-1 d-inline-block mw-100 text-truncate fs-4 fw-bold align-top text-900">
                                    ${currentMonth.format('MMMM YYYY')}
                                </span>
                                <div class="o_kanban_config">
                                    <button class="btn px-2 o-dropdown dropdown-toggle dropdown" aria-expanded="false">
                                        <i class="fa fa-gear opacity-50 opacity-100-hover" role="img" aria-label="Settings" title="Settings"></i>
                                    </button>
                                </div>
                                <button class="o_kanban_quick_add new-lead-btn btn pe-2 me-n2">
                                    <i class="fa fa-plus opacity-75 opacity-100-hover" role="img" aria-label="Quick add" title="Quick add"></i>
                                </button>
                            </div>
                            <div class="o_kanban_counter position-relative d-flex align-items-center justify-content-between">
                                <div class="o_animated_number ms-2 text-900 text-nowrap cursor-default false" title="Expected Revenue">
                                    <b></b>
                                </div>
                            </div>
                        </div>
                        <div id="append-container-new" class="append-container-new"></div>
                    `;

                // Append the new column to the Kanban board
                const kanbanBoard = document.querySelector('.o_kanban_renderer');
                const quickCreateColumn = document.querySelector('.o_column_quick_create');
                kanbanBoard.insertBefore(newColumn, quickCreateColumn);

                // Fetch and append sales records for the new column
                fetchSalesForMonth(currentMonth.format('YYYY-MM'), newColumn.querySelector(
                    '#append-container-new'));

            }

            // Function to fetch and append sales records for a given month
            function fetchSalesForMonth(monthYear, container) {
                fetch(`/getdedline/${monthYear}`) // Make sure this path matches your Laravel route
                    .then(response => response.json())
                    .then(data => {
                        data.sales.forEach(sale => {
                            const saleHTML = `
                    <div role="article" class="o_kanban_record sale-card d-flex o_draggable oe_kanban_card_undefined o_legacy_kanban_record" data-id="${sale.id}" tabindex="0" draggable="true">
                        <div class="oe_kanban_color_0 oe_kanban_global_click oe_kanban_card d-flex flex-column">
                            <div class="oe_kanban_content flex-grow-1">
                                <div class="oe_kanban_details">
                                    <strong class="o_kanban_record_title">
                                        <span>${sale.opportunity}</span>
                                    </strong>
                                </div>
                                ${sale.contact ? `<div><span class="o_text_overflow">${sale.contact.name}</span></div>` : ''}
                                <div><div name="tag_ids" class="o_field_widget o_field_many2many_tags"><div class="d-flex flex-wrap gap-1"></div></div></div>
                                <div><div name="lead_properties" class="o_field_widget o_field_properties"><div class="w-100 fw-normal text-muted"></div></div></div>
                            </div>
                            <div class="oe_kanban_footer">
                                <div class="o_kanban_record_bottom">
                                    <div class="oe_kanban_bottom_left">
                                        <div name="priority" class="o_field_widget o_field_priority">
                                            <div class="o_priority set-priority" role="radiogroup" name="priority" aria-label="Priority">
                                                <a href="#" class="o_priority_star fa ${sale.priority === 'medium' || sale.priority === 'high' || sale.priority === 'very_high' ? 'fa-star' : 'fa-star-o'}" role="radio" tabindex="-1" data-value="medium" data-tooltip="Priority: Medium" aria-label="Medium"></a>
                                                <a href="#" class="o_priority_star fa ${sale.priority === 'high' || sale.priority === 'very_high' ? 'fa-star' : 'fa-star-o'}" role="radio" tabindex="-1" data-value="high" data-tooltip="Priority: High" aria-label="High"></a>
                                                <a href="#" class="o_priority_star fa ${sale.priority === 'very_high' ? 'fa-star' : 'fa-star-o'}" role="radio" tabindex="-1" data-value="very_high" data-tooltip="Priority: Very High" aria-label="Very High"></a>
                                            </div>
                                        </div>
                                        <div name="activity_ids" class="o_field_widget o_field_kanban_activity">
                                            <a class="o-mail-ActivityButton" role="button" aria-label="Show activities" title="Show activities">
                                                <i class="fa fa-fw fa-lg text-muted fa-clock-o btn-link text-dark" role="img"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="oe_kanban_bottom_right">
                                        <div name="user_id" class="o_field_widget o_field_many2one_avatar_user o_field_many2one_avatar_kanban o_field_many2one_avatar">
                                            <div class="d-flex align-items-center gap-1" data-tooltip="${sale.email ?? ''}">
                                                <span class="o_avatar o_m2o_avatar d-flex">
                                                    <img class="rounded" src="${'/images/placeholder.png'}">
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
                        </div>
                    </div>
                `;
                            container.insertAdjacentHTML('beforeend', saleHTML);
                        });
                    })
                    .catch(error => console.error('Error fetching sales:', error));
            }

            // Event listener for the button
            addNextMonthButton.addEventListener('click', addNewMonthColumn);
        });
    </script>



@endsection
