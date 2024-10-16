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

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<!-- jQuery (required for Bootstrap JS components) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css"
    href="https://cdn.datatables.net/colreorder/1.3.2/css/colReorder.dataTables.min.cssive.dataTables.min.css">

@endsection

<style>
    .dropdown-btn {
        background-color: #f1f1f1;
        border: none;
        cursor: pointer;
        padding: 10px;
        border-radius: 5px;
        position: relative;
    }

    .hide-show-dropdown-menu {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: auto !important;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 999;
        /* Ensure it stays above the table */
        padding: 10px;
        left: 0;
        /* Align with the button */
    }

    .dropdown-menu {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 631px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
        padding: 10px;
        top: auto;
    }

    .dropdown-menu a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        cursor: pointer;
    }

    .dropdown-menu a:hover {
        background-color: #ddd;
    }

    .dropdown-active .dropdown-menu {
        display: block;
    }

    .dropdown-checkbox {
        margin-bottom: 10px;
    }

    .dropdown-checkbox label {
        display: flex;
        align-items: center;
        cursor: pointer;
    }

    .dropdown-checkbox input[type="checkbox"] {
        margin-right: 5px;
    }

    .arrow-icon {
        display: inline-block;
        transition: transform 0.3s ease;
        /* Smooth transition */
    }

    .rotate {
        transform: rotate(180deg);
        /* Rotate the arrow */
    }

    .tag,
    .tag1,
    .tag2,
    .tag5 {
        display: inline-block;
        padding: 0px 10px 0px 0;
        background-color: #E0E0E0;
        border-radius: 8px;
        font-size: 14px;
        margin: 5px 0;
        position: relative;
    }

    .remove-tag {
        margin-left: 5px;
        cursor: pointer;
    }

    .tag-input-container {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        border: 1px solid #CED4DA;
        border-radius: 4px;
        padding: 5px;
        background-color: #F1F1F1;
    }

    .creation_time {
        display: block;
        width: 100%;
        padding: .25rem 1.5rem;
        clear: both;
        font-weight: 400;
        color: #212529;
        text-align: inherit;
        white-space: nowrap;
        background-color: transparent;
        border: 0;
    }

    .closed_time {
        display: block;
        width: 100%;
        padding: .25rem 1.5rem;
        clear: both;
        font-weight: 400;
        color: #212529;
        text-align: inherit;
        white-space: nowrap;
        background-color: transparent;
        border: 0;
    }

    .location {
        display: none
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

    .due-today {
        color: #28a745;
        /* Green for Today */
    }

    .due-yesterday,
    .due-days-ago {
        color: #dc3545;
        /* Red for Yesterday and Days ago */
    }

    .due-tomorrow,
    .due-in-days {
        color: #28a745;
        /* Green for Tomorrow and In days */
    }

    .today {
        color: #9A6B01;
    }

    tbody#lead-table-body tr:hover {
        background-color: #FAFAFA !important;
    }

    tbody#lead-table-body tr:hover td {
        background-color: #FAFAFA !important;
    }

    table.dataTable thead th,
    table.dataTable thead td {
        padding: 10px 18px;
        border-bottom: 1px solid #11111147;
        border-top: 1px solid #11111147;
        background: #F1F1F1;
    }

    .dataTables_length label {
        display: flex;
        gap: 10px;
        margin: 0 !important;
    }

    .dataTables_wrapper .dataTables_length select {
        text-align: center;
        border-radius: 5px;
        border: 1px solid #2222;
    }

    table.dataTable tbody tr,
    table.dataTable.display tbody tr.odd>.sorting_1,
    table.dataTable.order-column.stripe tbody tr.odd>.sorting_1,
    table.dataTable.display tbody tr.even>.sorting_1,
    table.dataTable.order-column.stripe tbody tr.even>.sorting_1 {
        background-color: #FFFFFF !important;
    }

    .dropdown-toggle::after {
        content: none !important;
    }

    span.setting_icon i {
        color: #fff;
    }

    span.setting_icon {
        padding: 3px;
        background: #714B67;
        border-radius: 5px;
        display: inline-block;
        margin-right: 5px;
        width: 27px;
        height: 27px;
        text-align: center;
        position: absolute;
    }

    span.setting_icon.setting_icon_hover {
        display: none;
    }

    a.setting-icon:hover span {
        display: block;
    }

    span.tag-item {
        line-height: 1.9;
    }

    a.setting-icon {
        padding-right: 35px;
    }

    .o_accordion_toggle::after {
        display: none;
    }
    .dropdown-item.selected:not(.dropdown-item_active_noarrow):before{
        display: none !important;
    }
</style>

@section('search_div')
<div class="o_popover popover mw-100 o-dropdown--menu dropdown-menu mx-0 o_search_bar_menu d-flex flex-wrap flex-lg-nowrap w-100 w-md-auto mx-md-auto mt-2 py-3"
    role="menu" style="position: absolute; top: 0; left: 0;">
    <div class="o_dropdown_container o_filter_menu w-100 w-lg-auto h-100 px-3 mb-4 mb-lg-0 border-end">
        <div class="px-3 fs-5 mb-2"><i class="me-2 fa fa-filter" style="color: #714b67;"></i>
            <input type="hidden" id="filter" name="filter" value="">

            <h5 class="o_dropdown_title d-inline">Filters</h5>
        </div>
        <span class="o-dropdown-item dropdown-item o-navigable o_menu_item text-truncate my_activities"
            role="menuitemcheckbox" tabindex="0" title="" aria-checked="false" id="my-activities"><span
                class="float-end checkmark" style="display:none;">✔</span>My Activities</span>
        <div class="dropdown-divider" role="separator"></div>
        <span class="o-dropdown-item dropdown-item o-navigable o_menu_item text-truncate activities"
            role="menuitemcheckbox" tabindex="0" title="" aria-checked="false" id="filterOverdue"><span
                class="float-end checkmark" style="display:none;">✔</span>Overdue</span>
        <span class="o-dropdown-item dropdown-item o-navigable o_menu_item text-truncate activities"
            role="menuitemcheckbox" tabindex="0" title="" aria-checked="false" id="filterToday"><span
                class="float-end checkmark" style="display:none;">✔</span>Today</span>
        <span class="o-dropdown-item dropdown-item o-navigable o_menu_item text-truncate activities"
            role="menuitemcheckbox" tabindex="0" title="" aria-checked="false" id="filterFuture"><span
                class="float-end checkmark" style="display:none;">✔</span>Future</span>
        <div class="dropdown-divider" role="separator"></div>
        <span class="o-dropdown-item dropdown-item o-navigable o_menu_item text-truncate done" role="menuitemcheckbox"
            tabindex="0" title="" aria-checked="false"><span class="float-end checkmark"
                style="display:none;">✔</span>Done</span>
        <div class="dropdown-divider" role="separator"></div>
        <span class="o-dropdown-item dropdown-item o-navigable o_menu_item o_add_custom_filter" role="menuitem"
            tabindex="0" style="cursor: pointer;">Add Custom Filter</span>
    </div>
    <div class="o_dropdown_container o_group_by_menu w-100 w-lg-auto h-100 px-3 mb-4 mb-lg-0 border-end">
        <div class="px-3 fs-5 mb-2"><i class="me-2 text-action fa fa-layer-group"></i>
            <h5 class="o_dropdown_title d-inline">Group By</h5>
        </div>
        <div class="o_accordion position-relative">
            <button class="o_menu_item o_accordion_toggle dropdown-item o-navigable text-truncate"
                style="display: flex;justify-content: space-between;" tabindex="0" aria-expanded="false"
                id="creationDateBtn">
                Deadline
                <span class="arrow-icon">▼</span>
            </button>
            <div class="o_dropdown_content" id="creationDateDropdown"
                style="display: none; position: absolute; z-index: 1000; background: white; border: 1px solid #ccc; width: 100%;">
                <span class="o-dropdown-item_1 dropdown-item"><span style="display:none;">Creation Date:</span> <span
                        class="float-end checkmark" style="display:none;">✔</span>Year</span>
                <span class="o-dropdown-item_1 dropdown-item"><span style="display:none;">Creation Date:</span><span
                        class="float-end checkmark" style="display:none;">✔</span>Quarter</span>
                <span class="o-dropdown-item_1 dropdown-item"><span style="display:none;">Creation Date:</span><span
                        class="float-end checkmark" style="display:none;">✔</span>Month</span>
                <span class="o-dropdown-item_1 dropdown-item"><span style="display:none;">Creation Date:</span><span
                        class="float-end checkmark" style="display:none;">✔</span>Week</span>
                <span class="o-dropdown-item_1 dropdown-item"><span style="display:none;">Creation Date:</span><span
                        class="float-end checkmark" style="display:none;">✔</span>Day</span>
            </div>
        </div>
        <span class="o-dropdown-item_1 dropdown-item o-navigable o_menu_item text-truncate" role="menuitemcheckbox"
            tabindex="0" title="" aria-checked="false"> <span class="float-end checkmark"
                style="display:none;">✔</span>Document Model</span>
        <span class="o-dropdown-item_1 dropdown-item o-navigable o_menu_item text-truncate" role="menuitemcheckbox"
            tabindex="0" title="" aria-checked="false"> <span class="float-end checkmark"
                style="display:none;">✔</span>Assigned To</span>
        <span class="o-dropdown-item_1 dropdown-item o-navigable o_menu_item text-truncate" role="menuitemcheckbox"
            tabindex="0" title="" aria-checked="false"> <span class="float-end checkmark"
                style="display:none;">✔</span>Created By</span>
        <span class="o-dropdown-item_1 dropdown-item o-navigable o_menu_item text-truncate" role="menuitemcheckbox"
            tabindex="0" title="" aria-checked="false"> <span class="float-end checkmark"
                style="display:none;">✔</span>Activity Type</span>
        <div role="separator" class="dropdown-divider"></div>
        <select class="o_add_custom_group_menu o_menu_item dropdown-item">
            <option value="" disabled="true" selected="true" hidden="true">Add Custom Group</option>
            <option value="activity_category">Action</option>
            <option value="active">Active</option>
            <option value="activity_type_id">Activity Type</option>
            <option value="user_id">Assigned to</option>
            <option value="attachment_ids">Attachments</option>
            <option value="automated">Automated activity</option>
            <option value="calendar_event_id">Calendar Meeting</option>
            <option value="chaining_type">Chaining Type</option>
            <option value="create_uid">Created by</option>
            <option value="create_date">Created on</option>
            <option value="activity_decoration">Decoration Type</option>
            <option value="res_model_id">Document Model</option>
            <option value="res_name">Document Name</option>
            <option value="date_done">Done Date</option>
            <option value="date_deadline">Due Date</option>
            <option value="mail_template_ids">Email templates</option>
            <option value="icon">Icon</option>
            <option value="write_uid">Last Updated by</option>
            <option value="write_date">Last Updated on</option>
            <option value="previous_activity_type_id">Previous Activity Type</option>
            <option value="recommended_activity_type_id">Recommended Activity Type</option>
            <option value="res_model">Related Document Model</option>
            <option value="request_partner_id">Requesting Partner</option>
            <option value="summary">Summary</option>
        </select>
    </div>
    <div class="o_dropdown_container o_favorite_menu w-100 w-lg-auto h-100 px-3">
        <div class="px-3 fs-5 mb-2"><i class="me-2 text-favourite fa fa-star"></i>
            <h5 class="o_dropdown_title d-inline">Favorites</h5>
        </div><span class="o-dropdown-item dropdown-item o-navigable o_menu_item text-truncate selected"
            role="menuitemcheckbox" tabindex="0" aria-checked="true"><span
                class="d-flex p-0 align-items-center justify-content-between"><span class="text-truncate flex-grow-1"
                    title="">Leads</span><i class="ms-1 fa fa-trash-o" title="Delete item"></i></span></span>
        <div role="separator" class="dropdown-divider"></div>
        <div class="o_accordion position-relative"><button
                class="o_menu_item o_accordion_toggle dropdown-item o-navigable o_add_favorite text-truncate"
                tabindex="0" aria-expanded="false">Save current search</button></div>
    </div>
</div>
@endsection


<!-- Modal -->
<div class="modal fade" id="customFilterModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
    aria-labelledby="customFilterModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="customFilterModalLabel">Add Custom Filter</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="customFilterForm">
                    <div class="mb-3">
                        <div class="o_tree_editor_connector d-flex flex-grow-1 align-items-center">
                            <span>Match</span><span class="px-1">any</span><span>of the following rules:</span>
                        </div>
                        <div id="rulesContainer" class="mt-2">
                            <!-- Initial rule row -->
                            <div class="rule-row mt-2 row">
                                <div class="col-md-3">
                                    <select name="" id="customer_filter_select" class="form-control">
                                        <option value="">selecte filter</option>
                                        <option value="Action">Action</option>
                                        <option value="Activity Type">Activity Type</option>
                                        <option value="Assigned to">Assigned to</option>
                                        <option value="Created on">Created on</option>
                                        <option value="Done Date">Done Date</option>
                                        <option value="Due Date">Due Date</option>
                                        <option value="ID">ID</option>
                                        <option value="Last Updated on">Last Updated on</option>
                                        <option value="Note">Note</option>
                                        <option value="Summary">Summary</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <select name="" id="customer_filter_operates" class="form-control">
                                        <option value="is in">is in</option>
                                        <option value="is not in">is not in</option>
                                        <option value="=" selected>=</option>
                                        <option value="!=">!=</option>
                                        <option value="contains">contains</option>
                                        <option value="does not contain">does not contain</option>
                                        <option value="is set">is set</option>
                                        <option value="is not set">is not set</option>
                                        <option value="matches">matches</option>
                                        <option value="matches none of">matches none of</option>
                                    </select>
                                </div>
                                <div class="col-md-5 customer_filter_input">

                                </div>

                            </div>
                        </div>
                        {{-- <div class="o_tree_editor_row d-flex align-items-center">
                            <a id="addNewRule" style="color: #017E84;" href="#" role="button">New Rule</a>
                        </div> --}}
                    </div>
                </form>
            </div>
            <div class="modal-footer modal-footer-custom gap-1" style="justify-content: start;">
                <button type="submit" style="background-color: #714B67;border-color: #714B67;"
                    class="btn btn-primary add_filter">Add</button>
                <button type="button" style="background-color: #e7e9ed;border-color: #e7e9ed;color: #374151;"
                    class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<div class="card" style="padding: 1%">
    <div class="table-responsive text-nowrap">
        <table id="example" class="stripe row-border order-column" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Document Name</th>
                    <th>Activity Type</th>
                    <th>Assigned to</th>
                    <th>Summary</th>
                    <th>Due Date</th>
                    <th></th>

                </tr>
            </thead>

            <tbody id="lead-table-body">
                @foreach ($data as $activity)
                                <tr data-id="{{ $activity->lead_id ? $activity->lead_id : $activity->pipeline_id }}" style="cursor: pointer;">
                                    <td>
                                        @if($activity->getLead)
                                            {{$activity->getLead->product_name ?? ''}}
                                        @elseif($activity->getPipeline)
                                            {{$activity->getPipeline->opportunity ?? ''}}
                                        @else

                                        @endif
                                    </td>
                                    <td>{{$activity->activity_type ?? ''}}</td>
                                    <td>{{$activity->getUser->email ?? ''}}</td>
                                    <td>{{$activity->summary ?? ''}}</td>
                                    <?php
                    // Assuming $activity->due_date is a date string
                    $dueDate = $activity->due_date ?? null;
                    $today = new DateTime();
                    $diffDays = $dueDate ? $today->diff(new DateTime($dueDate))->days * ($today < new DateTime($dueDate) ? 1 : -1) : null;

                    $text = '';
                    $className = '';

                    if ($diffDays === 0) {
                        $text = 'Today';
                        $className = 'today'; // Define CSS class for today
                    } elseif ($diffDays === -1) {
                        $text = 'Yesterday';
                        $className = 'due-yesterday';
                    } elseif ($diffDays === 1) {
                        $text = 'Tomorrow';
                        $className = 'due-tomorrow';
                    } elseif ($diffDays < -1) {
                        $text = abs($diffDays) . ' Days ago';
                        $className = 'due-days-ago';
                    } elseif ($diffDays > 1) {
                        $text = 'In ' . $diffDays . ' days';
                        $className = 'due-in-days';
                    } else {
                        // If due_date is not set
                        $text = 'Today';
                        $className = 'today'; // Use the same class for styling
                    }
                                        ?>
                                    <td class="<?= htmlspecialchars($className) ?>"><?= htmlspecialchars($text) ?></td>

                                    <td>
                                        <a href="javascript:void(0);" style="color:#017e84;" class="mark-done"
                                            data-id="{{$activity->id}}"><i class="o_button_icon fa fa-fw fa-check me-1"></i>Done</a>
                                        <a href="javascript:void(0);" style="color:black;" class="cancel" data-id="{{$activity->id}}"><i
                                                class="o_button_icon fa fa-fw fa-times me-1"></i>Cancel</a>
                                        <a href="javascript:void(0);" style="color:black;" class="snooze" data-id="{{$activity->id}}"><i
                                                class="o_button_icon fa fa-fw fa-bell-slash me-1"></i>Snooze 7d</a>
                                    </td>
                                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- DataTables JS -->
<script type="text/javascript" charset="utf8"
    src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" charset="utf8"
    src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://legacy.datatables.net/extras/thirdparty/ColReorderWithResize/ColReorderWithResize.js"></script>

<script>
    $(document).ready(function () {

        var table = $('#example').DataTable({
            "pageLength": 25,
            searching: false,
            "lengthChange": false,
            "sDom": 'Rlfrtip',
            "oColReorder": {
                "bAddFixed": true
            },
            columnDefs: [
                { orderable: false, targets: -1 } // Disable sorting for the last column
            ],

        });

        $('#example').on('click', '.mark-done', function () {
            var id = $(this).data('id');
            $.ajax({
                url: '{{ route('activity.markAsDone', ':id') }}'.replace(':id', id),
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function (response) {
                    if (response.success) {
                        location.reload();
                    }
                }
            });
        });

        $('#example').on('click', '.cancel', function () {
            var id = $(this).data('id');
            $.ajax({
                url: '{{ route('activity.cancel', ':id') }}'.replace(':id', id),
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function (response) {
                    if (response.success) {
                        location.reload();
                    }
                }
            });
        });

        $('#example').on('click', '.snooze', function () {
            var id = $(this).data('id');
            $.ajax({
                url: '{{ route('activity.snooze', ':id') }}'.replace(':id', id),
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function (response) {
                    if (response.success) {
                        location.reload();
                    }
                }
            });
        });

        $('#example tbody').on('click', 'tr', function (e) {
            // Check if the clicked target is not inside the last <td>
            if (!$(e.target).closest('td:last-child').length) {
                var id = $(this).data('id'); // Get the data-id attribute from the clicked row
                if (id) {
                    window.location.href = '/lead-add/' + id; // Adjust the URL to your edit page
                }
            }
        });
    });

</script>

<script>
    $('#creationDateBtn').on('click', function (event) {
        event.preventDefault();

        // Toggle the dropdown visibility
        $('#creationDateDropdown').slideToggle();

        // Toggle the arrow rotation
        $(this).find('.arrow-icon').toggleClass('rotate');

        let selectedTags = [];
        if ($('.tag-item').length > 0) {
            $('.tag-item').each(function () {
                selectedTags.push($(this).data('value'));
            });
        }

        // If selectedTags is not empty, call the filter function
        if (selectedTags.length > 0) {
            filter(selectedTags);
        } else {
            console.log('No tags selected');
        }

        // Close other dropdowns and reset arrows (optional, if there are multiple accordions)
        $('.o_dropdown_content').not('#creationDateDropdown').slideUp();
        $('.o_menu_item .arrow-icon').not($(this).find('.arrow-icon')).removeClass('rotate');
    });
</script>


<script>
    $(document).ready(function () {
        // Initialize the Bootstrap modal
        var customFilterModal = new bootstrap.Modal(document.getElementById('customFilterModal'));

        // Handle the click event on the "Add Custom Filter" button
        $('.o_add_custom_filter').on('click', function () {
            customFilterModal.show();
        });


        // Handle form submission with AJAX
        $('#saveFilterBtn').on('click', function () {
            var filterName = $('#filterName').val();

            $.ajax({
                url: '/path/to/your/api/endpoint', // Replace with your API endpoint
                type: 'POST'
                , data: {
                    filterName: filterName
                }
                , success: function (response) {
                    // Handle success, e.g., show a success message or update UI
                    console.log('Filter saved successfully:', response);
                    customFilterModal.hide();
                }
                , error: function (xhr, status, error) {
                    // Handle error, e.g., show an error message
                    console.error('Error saving filter:', error);
                }
            });
        });

        // Function to add a new rule row
        function addNewRule() {
            var template = $('#ruleTemplate').html();
            $('#rulesContainer').append(template);
        }

        // Click handler for "New Rule" link
        $('#addNewRule').on('click', function (event) {
            event.preventDefault();
            addNewRule();
        });

        // Click handler for "fa-plus" button in rule rows
        $(document).on('click', '.add-new-rule', function (event) {
            event.preventDefault();
            addNewRule();
        });

        // Click handler for "Delete node" button
        $(document).on('click', '.delete-rule', function (event) {
            event.preventDefault();
            // Ensure that at least one rule remains
            if ($('#rulesContainer .rule-row')) {
                $(this).closest('.rule-row').remove();
            } else {
                // Add a new rule when all are deleted
                $('#rulesContainer').empty(); // Clear container
                addNewRule(); // Add one new rule
            }
        });

    });

</script>

<script>
    $(document).on('click', '.lead-row', function () {
        var leadId = $(this).data('id');
        window.location.href = "{{ route('lead.create') }}/" + leadId;
    });

    function storeLead() {
        $.ajax({
            url: "{{ route('lead.storeLead') }}"
            , type: "POST"
            , data: {
                _token: "{{ csrf_token() }}"
                ,
            }
            , success: function (response) {
                console.log('Lead stored successfully.', response);
            }
            , error: function (error) {
                console.error('Error storing lead:', error);
            }
        });
    }

    // Auto-refresh every 2 minutes
    setInterval(function () {
        console.log('Attempting to store lead...');
        storeLead();
    }, 2 * 60 * 1000);
    storeLead();

</script>


<script>
    $(document).ready(function () {
        // Default selected tags
        const defaultTags = ['My Activities', 'Overdue', 'Today'];

        function getUrlParameter(name) {
            const regex = new RegExp('[?&]' + name + '=([^&#]*)', 'i');
            const results = regex.exec(window.location.href);
            return results ? decodeURIComponent(results[1]) : null;
        }

        // Function to set URL parameters
        function setUrlParameter(name, value) {
            const url = new URL(window.location);
            if (value) {
                url.searchParams.set(name, value);
            } else {
                url.searchParams.delete(name);
            }
            window.history.replaceState({}, '', url);
        }

        // Prepopulate tags based on URL parameters
        function prepopulateTags() {
            const filterType = getUrlParameter('filterType');
            if (filterType) {
                const types = filterType.split(',');
                types.forEach(function (type) {
                    if (type === 'late') {
                        handleTagSelection2('Overdue');
                    } else if (type === 'today') {
                        handleTagSelection2('Today');
                    } else if (type === 'future') {
                        handleTagSelection2('Future');
                    }
                });
            }
        }

        prepopulateTags();

        // Event listeners for tag clicks
        $(document).on('click', '.activities', function (e) {
            e.stopPropagation();
            var $item = $(this);
            var selectedValue = $item.clone().find('.checkmark').remove().end().text().trim();
            handleTagSelection2(selectedValue, $item);
        });

        $(document).on('click', '.my_activities', function (e) {
            e.stopPropagation();
            var $item = $(this);
            var selectedValue = $item.clone().find('.checkmark').remove().end().text().trim();
            handleTagSelection3(selectedValue, $item);
        });

        $(document).on('click', '.done', function (e) {
            e.stopPropagation();
            var $item = $(this);
            var selectedValue = $item.clone().find('.checkmark').remove().end().text().trim();
            handleTagSelection4(selectedValue, $item);
        });

        // Handle tag selection for activities
        function handleTagSelection2(selectedValue, $item = null) {
            var $tag = $('.tag');
            var $tagItem = $('.tag-item[data-value="' + selectedValue + '"]');

            if ($tagItem.length > 0) {
                $tagItem.remove();
                updateTagSeparators2();

                if ($tag.children().length === 0) {
                    $tag.remove();
                    $('#search-input').val('').attr('placeholder', 'Search...');
                }

                if ($item) {
                    updateUrl();
                    $item.find('.checkmark').hide();
                }
            } else {
                var newTagHtml = '<span class="tag-item" data-span_id="' + currentIndex + '"" data-value="' + selectedValue + '">' + selectedValue + '</span>';
                var index = 0;
                var currentIndex = index++;

                if ($tag.length === 0) {
                    $('#search-input').before('<span class="tag" data-span_id="' + currentIndex + '"">' + newTagHtml + '</span>');
                } else {
                    $tag.append(' & ' + newTagHtml);
                }

                updateTagSeparators2();

                if ($item) {
                    $item.find('.checkmark').show();
                }

                $('#search-input').val('');
                $('#search-input').attr('placeholder', '');
            }

            updateFilterTags();
        }

        // Handle tag selection for "My Activities"
        function handleTagSelection3(selectedValue, $item = null) {
            var $tag = $('.tag1');
            var $tagItem = $('.tag-item[data-value="' + selectedValue + '"]');

            if ($tagItem.length > 0) {
                $tagItem.remove();
                updateTagSeparators3();

                if ($tag.children().length === 0) {
                    $tag.remove();
                    $('#search-input').val('').attr('placeholder', 'Search...');
                }

                if ($item) {
                    $item.find('.checkmark').hide();
                }
            } else {
                var newTagHtml = '<span class="tag-item" data-value="' + selectedValue + '">' + selectedValue + '<span class="remove-lost-tag">×</span></span>';

                if ($tag.length === 0) {
                    var index = 0;
                    // Add both the setting icon and tag container together
                    var currentIndex = index++;

                    // Create the tag container with icon
                    $('#search-input').before(
                        '<div class="tag1" data-span_id="' + currentIndex + '">' +
                        '<a href="#" data-span_id="' + currentIndex + '" class="setting-icon lostIcon_tag">' +
                        '<span class="setting_icon se_filter_icon"><i class="fa fa-filter"></i></span>' +
                        '<span class="setting_icon setting_icon_hover"><i class="fa fa-fw fa-cog"></i></span>' +
                        '</a>' +
                        '<span class="tag-item" data-value="' + selectedValue + '">' +
                        selectedValue +
                        '<span class="remove-lost-tag" style="cursor:pointer">×</span>' +
                        '</span>' +
                        '</div>'
                    );
                } else {
                    $tag.append(newTagHtml);
                }

                if ($item) {
                    $item.find('.checkmark').show();
                }

                $('#search-input').val('');
                $('#search-input').attr('placeholder', '');
            }

            updateFilterTags();
        }

        // Handle tag selection for "Done"
        function handleTagSelection4(selectedValue, $item = null) {
            var $tag = $('.tag2');
            var $tagItem = $('.tag-item[data-value="' + selectedValue + '"]');

            if ($tagItem.length > 0) {
                $tagItem.remove();
                updateTagSeparators4();

                if ($tag.children().length === 0) {
                    $tag.remove();
                    $('#search-input').val('').attr('placeholder', 'Search...');
                }

                if ($item) {
                    $item.find('.checkmark').hide();
                }
            } else {
                var newTagHtml = '<span class="tag-item" data-value="' + selectedValue + '">' + selectedValue + '<span class="remove-done-tag">×</span></span>';

                if ($tag.length === 0) {
                    var index = 0;
                    // Add both the setting icon and tag container together
                    var currentIndex = index++;

                    // Create the tag container with icon
                    $('#search-input').before(
                        '<div class="tag2" data-span_id="' + currentIndex + '">' +
                        '<a href="#" data-span_id="' + currentIndex + '" class="setting-icon lostIcon_tag">' +
                        '<span class="setting_icon se_filter_icon"><i class="fa fa-filter"></i></span>' +
                        '<span class="setting_icon setting_icon_hover"><i class="fa fa-fw fa-cog"></i></span>' +
                        '</a>' +
                        '<span class="tag-item" data-value="' + selectedValue + '">' +
                        selectedValue +
                        '<span class="remove-done-tag" style="cursor:pointer">×</span>' +
                        '</span>' +
                        '</div>'
                    );
                } else {
                    $tag.append(newTagHtml);
                }

                if ($item) {
                    $item.find('.checkmark').show();
                }

                $('#search-input').val('');
                $('#search-input').attr('placeholder', '');
            }

            updateFilterTags();
        }

        // Update tag separators
        function updateTagSeparators2() {
            var $tag = $('.tag');
            var $tagItems = $tag.find('.tag-item');
            var html = '';
            $tagItems.each(function (index) {
                html += $(this).prop('outerHTML');
                if (index < $tagItems.length - 1) {
                    html += ' & ';
                }
            });
            $tag.html(html);
            updateRemoveTagButton2();
        }

        function updateTagSeparators3() {
            var $tag = $('.tag1');
            var $tagItems = $tag.find('.tag-item');
            var html = '';
            $tagItems.each(function (index) {
                html += $(this).prop('outerHTML');
                if (index < $tagItems.length - 1) {
                    html += ' & ';
                }
            });
            $tag.html(html);
            updateRemoveTagButton3();
        }

        function updateTagSeparators4() {
            var $tag = $('.tag2');
            var $tagItems = $tag.find('.tag-item');
            var html = '';
            $tagItems.each(function (index) {
                html += $(this).prop('outerHTML');
                if (index < $tagItems.length - 1) {
                    html += ' & ';
                }
            });
            $tag.html(html);
            updateRemoveTagButton4();
        }

        // Update remove tag buttons
        function updateRemoveTagButton2() {
            var $tag = $('.tag');
            var index = 0;

            // Ensure the icon appears only once at the beginning
            if ($tag.find('.fa-list').length === 0) {
                var currentIndex = index++;
                $tag.prepend('<a href="#" data-span_id="' + currentIndex + '" class="setting-icon LTFIcon_tag">' +
                    '<span class="setting_icon se_filter_icon"><i class="fa fa-filter"></i></span>' +
                    '<span data-span_id="' + currentIndex + '" class="setting_icon setting_icon_hover setting-icon"><i class="fa fa-fw fa-cog"></i></span>' +
                    '</a>'
                );
            }

            if ($tag.find('.tag-item').length > 0) {
                if ($('.remove-tag').length === 0) {
                    $tag.append(' <span class="remove-tag" style="cursor:pointer">&times;</span>');
                }
            } else {
                $('.remove-tag').remove();
                $('.LTFIcon_tag').remove(); // Remove the setting icon when there are no tags
            }
        }

        function updateRemoveTagButton3() {
            var $tag = $('.tag1');
            if ($tag.find('.tag-item').length > 0) {
                if ($('.remove-lost-tag').length === 0) {
                    $tag.append(' <span class="remove-lost-tag" style="cursor:pointer">&times;</span>');
                }
            } else {
                $('.remove-lost-tag').remove();
            }
        }

        function updateRemoveTagButton4() {
            var $tag = $('.tag2');
            if ($tag.find('.tag-item').length > 0) {
                if ($('.remove-done-tag').length === 0) {
                    $tag.append(' <span class="remove-done-tag" style="cursor:pointer">&times;</span>');
                }
            } else {
                $('.remove-done-tag').remove();
            }
        }

        // Update filters and reload data
        function updateFilterTags() {
            let selectedTags = [];
            $('.tag-item').each(function () {
                selectedTags.push($(this).data('value'));
            });

            filterData(selectedTags);
        }

        // Update the URL based on the remaining tags
        function updateUrl() {
            const tags = [];
            $('.tag-item').each(function () {
                if ($(this).data('value') === 'Overdue') tags.push('late');
                if ($(this).data('value') === 'Today') tags.push('today');
                if ($(this).data('value') === 'Future') tags.push('future');
            });

            if (tags.length > 0) {
                setUrlParameter('filterType', tags.join(','));
            } else {
                setUrlParameter('filterType', null);
            }
        }

        // Remove tag and reload data
        $(document).on('click', '.remove-lost-tag', function () {
            var $tagItem = $(this).parent('.tag-item');
            $tagItem.remove();
            if ($('.tag1').children().length === 0) {
                $('.tag1').remove();
            } else {
                updateTagSeparators3();
            }
            $('.tag1').remove();
            updateFilterTags();
            updateUrl();
            $('.my_activities:contains("My Activities")').find('.checkmark').hide();
        });

        $(document).on('click', '.remove-done-tag', function () {
            var $tagItem = $(this).parent('.tag-item');
            $tagItem.remove();
            if ($('.tag2').children().length === 0) {
                $('.tag2').remove();
            } else {
                updateTagSeparators4();
            }
            updateFilterTags();
            $('.tag2').remove();
            updateUrl();
            $('.done:contains("Done")').find('.checkmark').hide();
        });

        $(document).on('click', '.remove-tag', function () {
            var $tagItem = $(this).parent('.tag-item');
            $tagItem.remove();
            if ($('.tag').children().length === 0) {
                $('.tag').remove();
            } else {
                $('.tag').remove();
                updateTagSeparators2();
            }
            updateFilterTags();
            updateUrl();
            $('.activities:contains("Overdue")').find('.checkmark').hide();
            $('.activities:contains("Today")').find('.checkmark').hide();
            $('.activities:contains("Future")').find('.checkmark').hide();
        });

        // Fetch data based on selected tags
        function filterData(selectedTags) {
            $.ajax({
                url: '{{route('activity.filter')}}', // Your endpoint for fetching leads
                method: 'GET',
                data: {
                    tags: selectedTags
                },
                success: function (response) {
                    var $tableBody = $('#lead-table-body');
                    $tableBody.empty();

                    if (response.success && response.data && response.data.length > 0) {
                        response.data.forEach(function (item) {

                            var dueDateText = '';
                            var dueDateClass = '';
                            var dueDate = item.due_date ? new Date(item.due_date) : null;

                            if (dueDate) {
                                const now = new Date();
                                dueDate.setHours(0, 0, 0, 0);
                                now.setHours(0, 0, 0, 0);

                                const diffTime = dueDate - now;
                                const diffDays = Math.floor(diffTime / (1000 * 60 * 60 * 24));

                                if (diffDays === 0) {
                                    dueDateText = 'Today';
                                    dueDateClass = 'today';
                                } else if (diffDays === -1) {
                                    dueDateText = 'Yesterday';
                                    dueDateClass = 'due-yesterday';
                                } else if (diffDays === 1) {
                                    dueDateText = 'Tomorrow';
                                    dueDateClass = 'due-tomorrow';
                                } else if (diffDays < -1) {
                                    dueDateText = Math.abs(diffDays) + ' Days ago';
                                    dueDateClass = 'due-days-ago';
                                } else if (diffDays > 1) {
                                    dueDateText = 'In ' + diffDays + ' days';
                                    dueDateClass = 'due-in-days';
                                }
                            }

                            // Include activities based on the selected tags
                            if (selectedTags.includes('Done') && item.status == '1') {
                                var rowHtml = `
                                <tr class="lead-row" data-id="${item.lead_id ? item.lead_id : item.pipeline_id}" style="cursor:pointer;">
                                    <td>
  ${item.get_lead && item.get_lead.product_name ? item.get_lead.product_name :
                                        (item.get_pipeline && item.get_pipeline.opportunity ? item.get_pipeline.opportunity : '')}
</td>
                                    <td>${item.activity_type || ''}</td>
                                    <td>${item.get_user.email || ''}</td>
                                    <td>${item.summary || ''}</td>
                                    <td><span class="${dueDateClass}">${dueDateText}</span></td>
                                    <td>
                                    </td>
                                </tr>
                            `;
                                $tableBody.append(rowHtml);
                            } else if (!selectedTags.includes('Done') && item.status != '1') {
                                var rowHtml = `
                                <tr class="lead-row" data-id="${item.lead_id ? item.lead_id : item.pipeline_id}" style="cursor:pointer;">
                                    <td>
  ${item.get_lead && item.get_lead.product_name ? item.get_lead.product_name :
                                        (item.get_pipeline && item.get_pipeline.opportunity ? item.get_pipeline.opportunity : '')}
</td>
                                    <td>${item.activity_type || ''}</td>
                                    <td>${item.get_user.email || ''}</td>
                                    <td>${item.summary || ''}</td>
                                    <td><span class="${dueDateClass}">${dueDateText}</span></td>
                                    <td>
                                        <a href="javascript:void(0);" style="color:#017e84;" class="mark-done" data-id="${item.id}"><i class="o_button_icon fa fa-fw fa-check me-1"></i>Done</a>
                                        <a href="javascript:void(0);" style="color:black;" class="cancel" data-id="${item.id}"><i class="o_button_icon fa fa-fw fa-times me-1"></i>Cancel</a>
                                        <a href="javascript:void(0);" style="color:black;" class="snooze" data-id="${item.id}"><i class="o_button_icon fa fa-fw fa-bell-slash me-1"></i>Snooze 7d</a>
                                    </td>
                                </tr>
                            `;
                                $tableBody.append(rowHtml);
                            }
                        });

                        // $('#lead-table-body .lead-row').on('click', function () {
                        //     var leadId = $(this).data('id');
                        //     window.location.href = `/lead-add/${leadId}`; // Adjust the URL as needed
                        // });
                    } else {
                        $tableBody.append('<tr><td colspan="6">No data available</td></tr>'); // Adjust colspan based on the number of columns
                    }
                },
                error: function () {
                    console.error('Failed to fetch data');
                }
            });
        }
        
        // Handle filter selection
        $('#customer_filter_select').on('change', function () {
            var selectedValue = $(this).val();
            var filterInput = $('.customer_filter_input');

            // Clear the previous filter input
            filterInput.empty();

            // Dynamic content based on selected filter
            switch (selectedValue) {
                case 'Action':
                    filterInput.append('<select name="action" id="customer_filter_input_value" class="form-control"><option value="None">None</option><option value="upload_document">Upload Document</option><option value="call">Phonecall</option><option value="meeting">Meeting</option><option value="request_signature">Request Signature</option></select>');
                    break;
                case 'Active':
                    filterInput.append('<select name="Active" id="customer_filter_input_value" class="form-control"><option value="set">set</option><option value="not set">not set</option></select>');
                    break;
                case 'Activity Type':
                    filterInput.append('<select name="activity_type" id="customer_filter_input_value" class="form-control"><option value="email">Email</option><option value="call">Call</option><option value="metting">Metting</option><option value="to-do">To-Do</option><option value="upload_document">Upload Document</option><option value="request_signature">Request Signature</option></select>');
                    break;
                case 'Assigned to':
                    filterInput.append('<select name="assigned_to" id="customer_filter_input_value" class="form-control">@foreach($getAssignedTo as $assignedTo)<option value="{{ $assignedTo->email }}">{{ $assignedTo->email }}</option>@endforeach</select>');
                    break;
                case 'Created on':
                case 'Done Date':
                case 'Due Date':
                case 'Last Updated on':
                    filterInput.append('<input type="date" name="customer_filter_input_value" id="customer_filter_input_value" class="form-control">');
                    break;
                case 'ID':
                    filterInput.append('<input type="text" id="customer_filter_input_value" class="form-control" placeholder="Enter ID">');
                    break;
                case 'Last Updated by':
                    filterInput.append('<select name="last_updated_by" id="customer_filter_input_value" class="form-control">@foreach($getAssignedTo as $assignedTo)<option value="{{ $assignedTo->id }}">{{ $assignedTo->email }}</option>@endforeach</select>');
                    break;
                case 'Note':
                case 'Summary':
                    filterInput.append('<input type="text" id="customer_filter_input_value" class="form-control" placeholder="Enter ' + selectedValue + '">');
                    break;
                default:
                    filterInput.append('<input type="text" id="customer_filter_input_value" class="form-control" placeholder="Enter value">');
                    break;
            }
        });

        // Add filter
        $('.add_filter').on('click', function (event) {
            event.preventDefault();
            var filterType = $('#customer_filter_select').val();
            var filterValue = $('#customer_filter_input_value').val();
            var operatesValue = $('#customer_filter_operates').val();
            var span_id = $('#span_id').val();

            handleTagSelection(filterType, operatesValue, filterValue,span_id);

            // Prepare data to send
            var data = {
                filterType: filterType,
                filterValue: filterValue,
                operatesValue: operatesValue
            };

            // Send AJAX request
            fetchFilteredData(data);

            $('#customFilterModal').modal('hide');
        });

        // Fetch filtered data based on current filters
        function fetchFilteredData(data) {
            $.ajax({
                url: '{{route('activity.custom.filter')}}',
                type: 'POST',
                data: data,
                success: function (response) {
                    var $tableBody = $('#lead-table-body');

                    // Clear existing table data
                    $tableBody.empty();

                    // Check if response contains data
                    if (response.success && response.data && response.data.length > 0) {
                        // Loop through the response and create table rows
                        response.data.forEach(function (item) {
                            // Default values in case the related objects are null or undefined
                            var productName = item.get_lead ? item.get_lead.product_name : '';
                            var activityType = item.activity_type || '';
                            var userEmail = item.get_user ? item.get_user.email : '';
                            var summary = item.summary || '';

                            // Handle due date
                            var dueDateText = '';
                            var dueDateClass = '';
                            if (item.due_date) {
                                var dueDate = new Date(item.due_date);
                                var now = new Date();
                                dueDate.setHours(0, 0, 0, 0);
                                now.setHours(0, 0, 0, 0);

                                var diffTime = dueDate - now;
                                var diffDays = Math.floor(diffTime / (1000 * 60 * 60 * 24));

                                if (diffDays === 0) {
                                    dueDateText = 'Today';
                                    dueDateClass = 'today';
                                } else if (diffDays === -1) {
                                    dueDateText = 'Yesterday';
                                    dueDateClass = 'due-yesterday';
                                } else if (diffDays === 1) {
                                    dueDateText = 'Tomorrow';
                                    dueDateClass = 'due-tomorrow';
                                } else if (diffDays < -1) {
                                    dueDateText = Math.abs(diffDays) + ' Days ago';
                                    dueDateClass = 'due-days-ago';
                                } else if (diffDays > 1) {
                                    dueDateText = 'In ' + diffDays + ' days';
                                    dueDateClass = 'due-in-days';
                                }
                            }

                            // Create the HTML for the row
                            var rowHtml = `
                                <tr>
                                    <td>${productName}</td>
                                    <td>${activityType}</td>
                                    <td>${userEmail}</td>
                                    <td>${summary}</td>
                                    <td><span class="${dueDateClass}">${dueDateText}</span></td>
                                    <td>
                                        <a href="javascript:void(0);" style="color:#017e84;" class="mark-done" data-id="${item.id}"><i class="o_button_icon fa fa-fw fa-check me-1"></i>Done</a>
                                        <a href="javascript:void(0);" style="color:black;" class="cancel" data-id="${item.id}"><i class="o_button_icon fa fa-fw fa-times me-1"></i>Cancel</a>
                                        <a href="javascript:void(0);" style="color:black;" class="snooze" data-id="${item.id}"><i class="o_button_icon fa fa-fw fa-bell-slash me-1"></i>Snooze 7d</a>
                                    </td>
                                </tr>
                            `;

                            // Append the row to the table body
                            $tableBody.append(rowHtml);
                        });
                    } else {
                        // If no data, show a message or keep it empty
                        $tableBody.append('<tr><td colspan="6">No data available</td></tr>'); // Adjust colspan based on the number of columns
                    }
                },
                error: function (xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        }

        // Handle tag selection and display
        function handleTagSelection(filterType, operatesValue, filterValue ,span_id) {
            var selectedValue = filterType + ' ' + operatesValue + ' ' + filterValue;
            var $tag = $('.tag5');
            var $tagItem = $('.tag-item[data-value="' + selectedValue + '"]');

            var $iconTag = $('span.tag[data-span_id="' + span_id + '"]');
            console.log($iconTag,'fdfdfd');
            
            var $icosnDiv = $('div.tag1[data-span_id="' + span_id + '"]');
            console.log($icosnDiv);
            
            if ($iconTag.length > 0) {
                $iconTag.remove();  // This removes the <span class="tag"> element
            }

            if ($icosnDiv.length > 0) {
                $icosnDiv.remove();
            }

            if ($tagItem.length > 0) {
                $tagItem.remove();
                updateTagSeparators();

                if ($tag.children().length === 0) {
                    $tag.remove();
                    $('#search-input').val('').attr('placeholder', 'Search...');
                }
            } else {
                var newTagHtml = '<span class="tag-item" data-value="' + selectedValue + '">' + selectedValue + '<span class="custom-filter-remove">×</span></span>';
                if ($tag.length === 0) {
                    $('#search-input').before('<span class="tag5">' + newTagHtml + '</span>');
                } else {
                    $tag.html(newTagHtml); // Overwrite with new tag
                }
                $('#search-input').val('').attr('placeholder', '');
            }

            updateTagSeparators();
            fetchFilteredData({
                filterType: filterType,
                filterValue: filterValue,
                operatesValue: operatesValue
            });
        }

        // Update tag separators
        function updateTagSeparators() {
            var $tag = $('.tag5');
            var $tagItems = $tag.find('.tag-item');
            var html = '';
            $tagItems.each(function (index) {
                html += $(this).prop('outerHTML');
                if (index < $tagItems.length - 1) {
                    html += ' & ';
                }
            });
            $tag.html(html);
            updateRemoveTagButton();
        }

        // Update remove tag button
        function updateRemoveTagButton() {
            var $tag = $('.tag5');

            var index = 0;

            // Ensure the icon appears only once at the beginning
            if ($tag.find('.fa-list').length === 0) {
                var currentIndex = index++;
                $tag.prepend('<a href="#" data-span_id="' + currentIndex + '" class="setting-icon LTFIcon_tag">' +
                    '<span class="setting_icon se_filter_icon"><i class="fa fa-filter"></i></span>' +
                    '<span data-span_id="' + currentIndex + '" class="setting_icon setting_icon_hover setting-icon"><i class="fa fa-fw fa-cog"></i></span>' +
                    '</a>'
                );
            }

            if ($tag.find('.tag-item').length > 0) {
                if ($('.custom-filter-remove').length === 0) {
                    $tag.append(' <span class="custom-filter-remove" style="cursor:pointer">&times;</span>');
                }
            } else {                
                $('.custom-filter-remove').remove();
            }
        }

        // Remove tag and fetch updated data
        $(document).on('click', '.custom-filter-remove', function () {
            var valueToRemove = $(this).closest('.tag-item').data('value');
            $(this).closest('.tag-item').remove();
            if ($('.tag5').children().length === 0) {
                $('.tag5').remove();
            }

            // Optionally, send an AJAX request to update the filters on the server if necessary
            var filters = getCurrentFilters();
            $('.tag5').remove();
            fetchFilteredData(filters);
        });

        // Get current filters from tags
        function getCurrentFilters() {
            var filters = {};
            $('.tag-item').each(function () {
                var value = $(this).data('value').split(' ');
                if (value.length === 3) {
                    var filterType = value[0];
                    var operatesValue = value[1];
                    var filterValue = value[2];
                    filters.filterType = filterType;
                    filters.operatesValue = operatesValue;
                    filters.filterValue = filterValue;
                }
            });
            return filters;
        }

    });

    $(document).ready(function () {
        // Get filterType from the URL
        const urlParams = new URLSearchParams(window.location.search);
        const filterType = urlParams.get('filterType') || '';

        // Pre-select the filter based on the filterType and set the search input value
        if (filterType) {
            switch (filterType) {
                case 'late':
                    $('#filterOverdue').addClass('selected'); // Add the selected class
                    $('#filterOverdue .checkmark').show(); // Show checkmark
                    $('#searchInput').val('Late'); // Set the input value
                    break;
                case 'today':
                    $('#filterToday').addClass('selected');
                    $('#filterToday .checkmark').show();
                    $('#searchInput').val('Today'); // Set the input value
                    break;
                case 'future':
                    $('#filterFuture').addClass('selected');
                    $('#filterFuture .checkmark').show();
                    $('#searchInput').val('Future'); // Set the input value
                    break;
            }
        }
    });
</script>

<script>
    $(document).ready(function () {
        // Show the dropdown when the input field is clicked
        $('#search-input').on('click', function () {
            $('#search-dropdown').show();
            $('.o_searchview_dropdown_toggler').attr('aria-expanded', 'true'); // Update aria-expanded
            $('#dropdown-arrow').removeClass('fa-caret-down').addClass('fa-caret-up'); // Change to up arrow
        });

        // Add selected value to the input field and hide the dropdown
        $(document).on('click', '#search-dropdown .o-dropdown-item', function () {
            $('#search-dropdown').hide();
            $('#dropdown-arrow').removeClass('fa-caret-up').addClass('fa-caret-down'); // Change back to down arrow
        });

        // Hide dropdown when clicking outside
        $(document).on('click', function (e) {
            if (!$(e.target).closest('#search-input, #search-dropdown, .o_searchview_dropdown_toggler').length) {
                $('#search-dropdown').hide();
                $('#dropdown-arrow').removeClass('fa-caret-up').addClass('fa-caret-down'); // Change back to down arrow
                $('.o_searchview_dropdown_toggler').attr('aria-expanded', 'false'); // Update aria-expanded
            }
        });

        // Toggle dropdown on arrow click
        $('.o_searchview_dropdown_toggler').click(function (event) {
            event.stopPropagation(); // Prevent click event from bubbling up
            const dropdown = $('#search-dropdown');
            const isExpanded = $(this).attr('aria-expanded') === 'true';

            // Toggle the dropdown visibility
            dropdown.toggle();
            $(this).attr('aria-expanded', !isExpanded);

            // Change the arrow direction
            if (isExpanded) {
                $('#dropdown-arrow').removeClass('fa-caret-up').addClass('fa-caret-down'); // Change to down arrow
            } else {
                $('#dropdown-arrow').removeClass('fa-caret-down').addClass('fa-caret-up'); // Change to up arrow
            }
        });

        // Toggle Creation Date Dropdown
        $('#creationDateBtn, #creationDateBtn1').on('click', function (event) {
            event.preventDefault();

            const dropdownId = $(this).attr('id').includes('1') ? '#creationDateDropdown1' : '#creationDateDropdown';
            $(dropdownId).slideToggle();
            $(this).find('.arrow-icon').toggleClass('rotate');

            // Close other dropdowns, except creation date dropdown
            $('.o_dropdown_content').not(dropdownId).slideUp();
            $('.o_menu_item .arrow-icon').not($(this).find('.arrow-icon')).removeClass('rotate');
        });

        // Toggle Closed Date Dropdown
        $('#closeDateBtn, #closeDateBtn1').on('click', function (event) {
            event.preventDefault();

            const dropdownId = $(this).attr('id').includes('1') ? '#closeDateDropdown1' : '#closeDateDropdown';
            $(dropdownId).slideToggle();
            $(this).find('.arrow-icon').toggleClass('rotate');

            // Close other dropdowns
            $('.o_dropdown_content').not(dropdownId).slideUp();
            $('.o_menu_item .arrow-icon').not($(this).find('.arrow-icon')).removeClass('rotate');
        });

        // Toggle Conversion Date &  Expected Date Dropdown
        $('#conversionBtn, #expectedBtn').on('click', function (event) {
            event.preventDefault();

            const dropdownId = $(this).attr('id').includes('1') ? '#conversionDate' : '#cxpectedClosing';
            $(dropdownId).slideToggle();
            $(this).find('.arrow-icon').toggleClass('rotate');

            // Close other dropdowns
            $('.o_dropdown_content').not(dropdownId).slideUp();
            $('.o_menu_item .arrow-icon').not($(this).find('.arrow-icon')).removeClass('rotate');
        });

        // Close dropdowns if clicking outside of the dropdowns
        $(document).on('click', function (event) {
            if (!$(event.target).closest('.o_accordion, .o_dropdown_container').length) {
                $('.o_dropdown_content').slideUp();
                $('.o_menu_item .arrow-icon').removeClass('rotate');
            }
        });
    });

    $(document).on('click', '.setting-icon', function(e) {
            e.preventDefault();
            var id = $(this).data('span_id');
            console.log(id, 'span_id');
            $('#span_id').val(id); 
            $('#customFilterModal').modal('show'); 
        });
</script>


@endsection