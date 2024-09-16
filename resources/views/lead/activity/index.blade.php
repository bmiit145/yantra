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

    .tag {
        display: inline-block;
        padding: 5px 10px;
        background-color: #E0E0E0;
        border-radius: 22px;
        margin-right: 12px;
        font-size: 14px;
        top: 5px;
        left: 5px;
    }

    .tag1 {
        display: inline-block;
        padding: 5px 10px;
        background-color: #E0E0E0;
        border-radius: 22px;
        margin-right: 12px;
        font-size: 14px;
        top: 5px;
        left: 5px;
    }

    .tag2 {
        display: inline-block;
        padding: 5px 10px;
        background-color: #E0E0E0;
        border-radius: 22px;
        margin-right: 12px;
        font-size: 14px;
        top: 5px;
        left: 5px;
    }

    .tag5 {
        display: inline-block;
        padding: 5px 10px;
        background-color: #E0E0E0;
        border-radius: 22px;
        margin-right: 12px;
        font-size: 14px;
        top: 5px;
        left: 5px;
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
</style>

@section('search_div')
<div class="o_popover popover mw-100 o-dropdown--menu dropdown-menu mx-0 o_search_bar_menu d-flex flex-wrap flex-lg-nowrap w-100 w-md-auto mx-md-auto mt-2 py-3"
    role="menu" style="position: absolute; top: 0; left: 0;">
    <div class="o_dropdown_container o_filter_menu w-100 w-lg-auto h-100 px-3 mb-4 mb-lg-0 border-end">
        <div class="px-3 fs-5 mb-2"><i class="me-2 text-primary fa fa-filter"></i>
            <input type="hidden" id="filter" name="filter" value="">

            <h5 class="o_dropdown_title d-inline">Filters</h5>
        </div>
        <span class="o-dropdown-item dropdown-item o-navigable o_menu_item text-truncate my_activities"
            role="menuitemcheckbox" tabindex="0" title="" aria-checked="false" id="my-activities"><span
                class="float-end checkmark" style="display:none;">✔</span>My Activities</span>
        <div class="dropdown-divider" role="separator"></div>
        <span class="o-dropdown-item dropdown-item o-navigable o_menu_item text-truncate activities"
            role="menuitemcheckbox" tabindex="0" title="" aria-checked="false"><span class="float-end checkmark"
                style="display:none;">✔</span>Overdue</span>
        <span class="o-dropdown-item dropdown-item o-navigable o_menu_item text-truncate activities"
            role="menuitemcheckbox" tabindex="0" title="" aria-checked="false"><span class="float-end checkmark"
                style="display:none;">✔</span>Today</span>
        <span class="o-dropdown-item dropdown-item o-navigable o_menu_item text-truncate activities"
            role="menuitemcheckbox" tabindex="0" title="" aria-checked="false"><span class="float-end checkmark"
                style="display:none;">✔</span>Future</span>
        <div class="dropdown-divider" role="separator"></div>
        <span class="o-dropdown-item dropdown-item o-navigable o_menu_item text-truncate done" role="menuitemcheckbox"
            tabindex="0" title="" aria-checked="false"><span class="float-end checkmark"
                style="display:none;">✔</span>Done</span>
        <div class="dropdown-divider" role="separator"></div>
        <span class="o-dropdown-item dropdown-item o-navigable o_menu_item o_add_custom_filter" role="menuitem"
            tabindex="0" style="cursor: pointer;">Add Custom Filter</span>
    </div>
    <div class="o_dropdown_container o_group_by_menu w-100 w-lg-auto h-100 px-3 mb-4 mb-lg-0 border-end">
        <div class="px-3 fs-5 mb-2"><i class="me-2 text-action oi oi-group"></i>
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
        <table id="example" class="display nowrap example">
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

            <tbody id="lead-table-body"></tbody>
        </table>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    $(document).ready(function () {
        // Initialize DataTable with server-side processing
        var table = $('#example').DataTable({
            processing: true
            , serverSide: true,
            searching: false
            , ajax: {
                url: '{{ route('lead.AllActivitiesGetLeads') }}'
                , type: "POST"
                , data: function (d) {
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
            , aoColumns: [
                {
                    data: 'get_lead'
                    , render: function (data, type, row) {
                        if (data) {
                            return data.product_name;
                        } else {
                            return '';
                        }
                    }
                }
                , {
                    data: 'activity_type',
                    render: function (data, type, row) {
                        if (data) {
                            let processedData = data.toLowerCase().replace(/-/g, ' ');
                            return processedData.split(' ').map(word => {
                                return word.charAt(0).toUpperCase() + word.slice(1);
                            }).join(' ');
                        } else {
                            return '';
                        }
                    }
                }
                , {
                    data: 'get_user'
                    , render: function (data, type, row) {
                        if (data) {
                            return data.email;
                        } else {
                            return '';
                        }
                    }
                }
                , {
                    data: 'summary'
                    , render: function (data, type, row) {
                        if (data) {
                            return data;
                        }
                        return '';
                    }
                }
                , {
                    data: 'due_date',
                    render: function (data, type, row) {
                        if (data) {
                            const dueDate = new Date(data);
                            const now = new Date();
                            // Set time to start of the day for accurate comparison
                            dueDate.setHours(0, 0, 0, 0);
                            now.setHours(0, 0, 0, 0);

                            // Calculate the difference in days
                            const diffTime = dueDate - now;
                            const diffDays = Math.floor(diffTime / (1000 * 60 * 60 * 24));

                            // Determine the appropriate class and text
                            let text = '';
                            let className = '';

                            if (diffDays === 0) {
                                text = 'Today';
                                className = 'today';
                            } else if (diffDays === -1) {
                                text = 'Yesterday';
                                className = 'due-yesterday';
                            } else if (diffDays === 1) {
                                text = 'Tomorrow';
                                className = 'due-tomorrow';
                            } else if (diffDays < -1) {
                                text = Math.abs(diffDays) + ' Days ago';
                                className = 'due-days-ago';
                            } else if (diffDays > 1) {
                                text = 'In ' + diffDays + ' days';
                                className = 'due-in-days';
                            }

                            return `<span class="${className}">${text}</span>`;
                        } else {
                            return '';
                        }
                    }

                }
                ,
                // Uncomment and modify the following column if needed
                {
                    data: 'id',
                    width: "20%",
                    render: function (data, type, row) {
                        return `
                        <a href="javascript:void(0);" style="color:#017e84;" class="mark-done" data-id="${data}"><i class="o_button_icon fa fa-fw fa-check me-1"></i>Done</a>
                        <a href="javascript:void(0);" style="color:black;" class="cancel" data-id="${data}"><i class="o_button_icon fa fa-fw fa-times me-1"></i>Cancel</a>
                        <a href="javascript:void(0);" style="color:black;" class="snooze" data-id="${data}"><i class="o_button_icon fa fa-fw fa-bell-slash me-1"></i>Snooze 7d</a>
                    `;
                    }
                }
            ]
            , createdRow: function (row, data, dataIndex) {
                $(row).attr('data-id', data.lead_id);
            }


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
                        table.ajax.reload(); // Reload the DataTable
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
                        table.ajax.reload(); // Reload the DataTable
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
                        table.ajax.reload(); // Reload the DataTable
                    }
                }
            });
        });

        // Handle row click event
        // $('#example tbody').on('click', 'tr', function () {
        //     var id = $(this).data('id'); // Get the data-id attribute from the clicked row
        //     if (id) {
        //         window.location.href = '/lead-add/' + id; // Adjust the URL to your edit page
        //     }
        // });
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
    $(document).ready(function () {
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

            handleTagSelection(filterType, operatesValue, filterValue);

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
        function handleTagSelection(filterType, operatesValue, filterValue) {
            var selectedValue = filterType + ' ' + operatesValue + ' ' + filterValue;
            var $tag = $('.tag5');
            var $tagItem = $('.tag-item[data-value="' + selectedValue + '"]');

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

        // Initialize with default tags
        // defaultTags.forEach(tag => {
        //     const $item = $(`.activities:contains("${tag}"), .my_activities:contains("${tag}"), .done:contains("${tag}")`);
        //     const selectedValue = $item.clone().find('.checkmark').remove().end().text().trim();

        //     // Determine which handler to call based on the tag
        //     if ($item.hasClass('activities')) {
        //         handleTagSelection2(selectedValue, $item);
        //     } else if ($item.hasClass('my_activities')) {
        //         handleTagSelection3(selectedValue, $item);
        //     } else if ($item.hasClass('done')) {
        //         handleTagSelection4(selectedValue, $item);
        //     }
        // });

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
                    $item.find('.checkmark').hide();
                }
            } else {
                var newTagHtml = '<span class="tag-item" data-value="' + selectedValue + '">' + selectedValue + '</span>';

                if ($tag.length === 0) {
                    $('#search-input').before('<span class="tag">' + newTagHtml + '</span>');
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
                    $('#search-input').before('<span class="tag1">' + newTagHtml + '</span>');
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
                    $('#search-input').before('<span class="tag2">' + newTagHtml + '</span>');
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
            if ($tag.find('.tag-item').length > 0) {
                if ($('.remove-tag').length === 0) {
                    $tag.append(' <span class="remove-tag" style="cursor:pointer">&times;</span>');
                }
            } else {
                $('.remove-tag').remove();
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

        // Remove tag and reload data
        $(document).on('click', '.remove-lost-tag', function () {
            var $tagItem = $(this).parent('.tag-item');
            $tagItem.remove();
            if ($('.tag1').children().length === 0) {
                $('.tag1').remove();
            } else {
                updateTagSeparators3();
            }
            updateFilterTags();
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
                                <tr class="lead-row" data-id="${item.id}">
                                    <td>${item.get_lead.product_name || ''}</td>
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
                                <tr class="lead-row">
                                    <td>${item.get_lead.product_name || ''}</td>
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
    });
</script>


@endsection