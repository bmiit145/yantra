@extends('layout.header')
@section('content')
@section('head_breadcrumb_title', 'Leads')
@section('head_new_btn_link', route('lead.create'))
@section('kanban', route('lead.kanban', ['lead' => 'kanban']))
@section('calendar', route('lead.calendar', ['lead' => 'calendar']))
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
@section('search_div')
<div class="o_popover popover mw-100 o-dropdown--menu dropdown-menu mx-0 o_search_bar_menu d-flex flex-wrap flex-lg-nowrap w-100 w-md-auto mx-md-auto mt-2 py-3"
    role="menu" style="position: absolute; top: 0; left: 0;">
    <div class="o_dropdown_container o_filter_menu w-100 w-lg-auto h-100 px-3 mb-4 mb-lg-0 border-end">
        <div class="px-3 fs-5 mb-2"><i class="me-2 text-primary fa fa-filter"></i>
            <h5 class="o_dropdown_title d-inline">Filters</h5>
        </div><span class="o-dropdown-item dropdown-item o-navigable o_menu_item text-truncate" role="menuitemcheckbox"
            tabindex="0" title="" aria-checked="false" id="my-activities">My Activities</span><span
            class="o-dropdown-item dropdown-item o-navigable o_menu_item text-truncate" role="menuitemcheckbox"
            tabindex="0" title="" aria-checked="false">Unassigned</span>
        <div class="dropdown-divider" role="separator"></div><span
            class="o-dropdown-item dropdown-item o-navigable o_menu_item text-truncate" role="menuitemcheckbox"
            tabindex="0" title="" aria-checked="false">Lost</span>
        <div class="dropdown-divider" role="separator"></div>
        <div class="o_accordion position-relative"><button
                class="o_menu_item o_accordion_toggle dropdown-item o-navigable text-truncate" tabindex="0"
                aria-expanded="false">Creation Date</button></div>
        <div class="o_accordion position-relative"><button
                class="o_menu_item o_accordion_toggle dropdown-item o-navigable text-truncate" tabindex="0"
                aria-expanded="false">Closed Date</button></div>
        <div class="dropdown-divider" role="separator"></div><span
            class="o-dropdown-item dropdown-item o-navigable o_menu_item text-truncate" role="menuitemcheckbox"
            tabindex="0" title="" aria-checked="false">Late Activities</span><span
            class="o-dropdown-item dropdown-item o-navigable o_menu_item text-truncate" role="menuitemcheckbox"
            tabindex="0" title="Today Activities" aria-checked="false">Today Activities</span><span
            class="o-dropdown-item dropdown-item o-navigable o_menu_item text-truncate focus" role="menuitemcheckbox"
            tabindex="0" title="Future Activities" aria-checked="false">Future Activities</span>
        <div class="dropdown-divider" role="separator"></div><span
            class="o-dropdown-item dropdown-item o-navigable o_menu_item text-truncate" role="menuitemcheckbox"
            tabindex="0" title="" aria-checked="false">Archived</span>
        <div role="separator" class="dropdown-divider"></div><span
            class="o-dropdown-item dropdown-item o-navigable o_menu_item o_add_custom_filter" role="menuitem"
            tabindex="0" style="cursor: pointer;">Add Custom Filter</span>
    </div>
    <div class="o_dropdown_container o_group_by_menu w-100 w-lg-auto h-100 px-3 mb-4 mb-lg-0 border-end">
    <div class="px-3 fs-5 mb-2"><i class="me-2 text-action oi oi-group"></i>
            <h5 class="o_dropdown_title d-inline">Group By</h5>
        </div>
        <span class="o-dropdown-item dropdown-item o-navigable o_menu_item text-truncate" role="menuitemcheckbox" tabindex="0" title="" aria-checked="false"> <span class="float-end checkmark" style="display:none;">:heavy_tick:</span>Salesperson</span>
        <span class="o-dropdown-item dropdown-item o-navigable o_menu_item text-truncate" role="menuitemcheckbox" tabindex="0" title="" aria-checked="false"> <span class="float-end checkmark" style="display:none;">:heavy_tick:</span>Sales Team</span>
        <span class="o-dropdown-item dropdown-item o-navigable o_menu_item text-truncate" role="menuitemcheckbox" tabindex="0" title="" aria-checked="false"> <span class="float-end checkmark" style="display:none;">:heavy_tick:</span>City</span>
        <span class="o-dropdown-item dropdown-item o-navigable o_menu_item text-truncate" role="menuitemcheckbox" tabindex="0" title="" aria-checked="false"> <span class="float-end checkmark" style="display:none;">:heavy_tick:</span>Country</span>
        <span class="o-dropdown-item dropdown-item o-navigable o_menu_item text-truncate" role="menuitemcheckbox" tabindex="0" title="" aria-checked="false"> <span class="float-end checkmark" style="display:none;">:heavy_tick:</span>Campaign</span>
        <span class="o-dropdown-item dropdown-item o-navigable o_menu_item text-truncate" role="menuitemcheckbox" tabindex="0" title="" aria-checked="false"> <span class="float-end checkmark" style="display:none;">:heavy_tick:</span>Medium</span>
        <span class="o-dropdown-item dropdown-item o-navigable o_menu_item text-truncate" role="menuitemcheckbox" tabindex="0" title="" aria-checked="false"> <span class="float-end checkmark" style="display:none;">:heavy_tick:</span>Source</span>
        <div class="dropdown-divider" role="separator">
        </div>
        <div class="o_accordion position-relative">
            <button class="o_menu_item o_accordion_toggle dropdown-item o-navigable text-truncate"
                style="display: flex;justify-content: space-between;" tabindex="0" aria-expanded="false"
                id="creationDateBtn">
                Creation Date
                <span class="arrow-icon">▼</span>
            </button>
            <div class="o_dropdown_content" id="creationDateDropdown"
                style="display: none; position: absolute; z-index: 1000; background: white; border: 1px solid #ccc; width: 100%;">
                <span class="dropdown-item">Year</span>
                <span class="dropdown-item">Quarter</span>
                <span class="dropdown-item">Month</span>
                <span class="dropdown-item">Week</span>
                <span class="dropdown-item">Day</span>
            </div>
        </div>
        <div class="o_accordion position-relative">
            <button class="o_menu_item o_accordion_toggle dropdown-item o-navigable text-truncate" tabindex="0"
                aria-expanded="false" id="closeDateBtn" style="display: flex;justify-content: space-between;">
                Closed Date
                <span class="arrow-icon">▼</span>
            </button>
            <div class="o_dropdown_content" id="closeDateDropdown"
                style="display: none; position: absolute; z-index: 1000; background: white; border: 1px solid #ccc; width: 100%;">
                <span class="dropdown-item">Year</span>
                <span class="dropdown-item">Quarter</span>
                <span class="dropdown-item">Month</span>
                <span class="dropdown-item">Week</span>
                <span class="dropdown-item">Day</span>
            </div>
        </div>

        {{-- <div class="o_accordion position-relative">
            <button class="o_menu_item o_accordion_toggle dropdown-item o-navigable text-truncate" tabindex="0"
                aria-expanded="false">Closed Date</button>
        </div> --}}
        <div class="dropdown-divider" role="separator"></div>
        <div class="o_accordion position-relative"><button
                class="o_menu_item o_accordion_toggle dropdown-item o-navigable o_add_custom_group_menu text-truncate"
                tabindex="0" aria-expanded="false">Properties</button></div>
        <div role="separator" class="dropdown-divider"></div>
        <select class="o_add_custom_group_menu o_menu_item dropdown-item">
            <option value="" disabled="true" selected="true" hidden="true">Add Custom Group</option>
            <option value="active">Active</option>
            <option value="activity_state">Activity State</option>
            <option value="date_open">Assignment Date</option>
            <option value="message_bounce">Bounce</option>
            <option value="campaign_id">Campaign</option>
            <option value="city">City</option>
            <option value="date_closed">Closed Date</option>
            <option value="color">Color Index</option>
            <option value="company_id">Company</option>
            <option value="partner_name">Company Name</option>
            <option value="contact_name">Contact Name</option>
            <option value="date_conversion">Conversion Date</option>
            <option value="country_id">Country</option>
            <option value="create_uid">Created by</option>
            <option value="create_date">Created on</option>
            <option value="partner_id">Customer</option>
            <option value="email_from">Email</option>
            <option value="email_domain_criterion">Email Domain Criterion</option>
            <option value="email_state">Email Quality</option>
            <option value="email_cc">Email cc</option>
            <option value="iap_enrich_done">Enrichment done</option>
            <option value="date_deadline">Expected Closing</option>
            <option value="won_status">Is Won</option>
            <option value="function">Job Position</option>
            <option value="lang_id">Language</option>
            <option value="date_automation_last">Last Action</option>
            <option value="date_last_stage_update">Last Stage Update</option>
            <option value="write_uid">Last Updated by</option>
            <option value="write_date">Last Updated on</option>
            <option value="lead_mining_request_id">Lead Mining Request</option>
            <option value="lang_code">Locale Code</option>
            <option value="lost_reason_id">Lost Reason</option>
            <option value="medium_id">Medium</option>
            <option value="mobile">Mobile</option>
            <option value="email_normalized">Normalized Email</option>
            <option value="name">Opportunity</option>
            <option value="phone">Phone</option>
            <option value="phone_state">Phone Quality</option>
            <option value="priority">Priority</option>
            <option value="recurring_plan">Recurring Plan</option>
            <option value="referred">Referred By</option>
            <option value="reveal_id">Reveal ID</option>
            <option value="team_id">Sales Team</option>
            <option value="user_id">Salesperson</option>
            <option value="phone_sanitized">Sanitized Number</option>
            <option value="source_id">Source</option>
            <option value="stage_id">Stage</option>
            <option value="state_id">State</option>
            <option value="street">Street</option>
            <option value="street2">Street2</option>
            <option value="tag_ids">Tags</option>
            <option value="title">Title</option>
            <option value="type">Type</option>
            <option value="website">Website</option>
            <option value="zip">Zip</option>
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
    <div class="modal-dialog modal-dialog-centered modal-lg">
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
                                    <select name="" id="" class="form-control">
                                        <option value="test">test</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <select name="" id="" class="form-control">
                                        <option value="is_in">is in</option>
                                        <option value="is_not_in">is not in</option>
                                        <option value="=">=</option>
                                        <option value="!=">!=</option>
                                        <option value="contains">contains</option>
                                        <option value="does_not_contain">does not contain</option>
                                        <option value="is_set">is set</option>
                                        <option value="is_not_set">is not set</option>
                                        <option value="matches">matches</option>
                                        <option value="matches_none_of">matches none of</option>
                                    </select>
                                </div>
                                <div class="col-md-5">
                                    <select name="" id="" class="form-control">
                                        <option value="test">test</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <div class="o_tree_editor_node_control_panel d-flex" role="toolbar"
                                        aria-label="Domain node">
                                        <button class="btn px-2 fs-5 add-new-rule" role="button" title="Add New Rule"
                                            aria-label="Add New Rule"><i class="fa fa-plus"></i></button>
                                        <button class="btn px-2 fs-5" role="button" title="Add branch"
                                            aria-label="Add branch"><i class="fa fa-sitemap"></i></button>
                                        <button class="btn btn-link px-2 text-danger fs-5 delete-rule" role="button"
                                            title="Delete node" aria-label="Delete node"><i
                                                class="fa fa-trash"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="o_tree_editor_row d-flex align-items-center">
                            <a id="addNewRule" style="color: #017E84;" href="#" role="button">New Rule</a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer modal-footer-custom gap-1" style="justify-content: start;">
                <button type="submit" style="background-color: #714B67;border-color: #714B67;"
                    class="btn btn-primary">Add</button>
                <button type="button" style="background-color: #e7e9ed;border-color: #e7e9ed;color: #374151;"
                    class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<!-- Template for new rule row -->
<script type="text/template" id="ruleTemplate">
  <div class="rule-row mt-2 row">
    <div class="col-md-3">
      <select name="" id="" class="form-control">
        <option value="test">test</option>
      </select>
    </div>
    <div class="col-md-2">
      <select name="" id="" class="form-control">
        <option value="is_in">is in</option>  
        <option value="is_not_in">is not in</option>
        <option value="=">=</option>
        <option value="!=">!=</option>
        <option value="contains">contains</option>
        <option value="does_not_contain">does not contain</option>
        <option value="is_set">is set</option>
        <option value="is_not_set">is not set</option>
        <option value="matches">matches</option>
        <option value="matches_none_of">matches none of</option>
      </select>
    </div>
    <div class="col-md-5">
      <select name="" id="" class="form-control">
        <option value="test">test</option>
      </select>
    </div>
    <div class="col-md-2">
      <div class="o_tree_editor_node_control_panel d-flex" role="toolbar" aria-label="Domain node">
        <button class="btn px-2 fs-5 add-new-rule" role="button" title="Add New Rule" aria-label="Add New Rule"><i class="fa fa-plus"></i></button>
        <button class="btn px-2 fs-5" role="button" title="Add branch" aria-label="Add branch"><i class="fa fa-sitemap"></i></button>
        <button class="btn btn-link px-2 text-danger fs-5 delete-rule" role="button" title="Delete node" aria-label="Delete node"><i class="fa fa-trash"></i></button>
      </div>
    </div>
  </div>
</script>


<style>
    .dropdown-btn {
        background-color: #f1f1f1;
        border: none;
        cursor: pointer;
        padding: 10px;
        border-radius: 5px;
    }

    .hide-show-dropdown-menu {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: auto !important;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
        padding: 10px;
    }

    .dropdown-menu {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 691px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
        padding: 10px;
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
        position: absolute;
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
</style>

<div class="card" style="padding: 1%">
    <div class="table-responsive text-nowrap">
        <button class="dropdown-btn">Show/Hide Columns</button>
        <div class="hide-show-dropdown-menu dropdown-menu">
            <div class="dropdown-checkbox">
                <label><input type="checkbox" data-column="0" checked> Lead</label>
            </div>
            <div class="dropdown-checkbox">
                <label><input type="checkbox" data-column="1" checked> Email</label>
            </div>
            <div class="dropdown-checkbox">
                <label><input type="checkbox" data-column="2"> City</label>
            </div>
            <div class="dropdown-checkbox">
                <label><input type="checkbox" data-column="3"> State</label>
            </div>
            <div class="dropdown-checkbox">
                <label><input type="checkbox" data-column="4"> Country</label>
            </div>
            <div class="dropdown-checkbox">
                <label><input type="checkbox" data-column="5"> Zip</label>
            </div>
            <div class="dropdown-checkbox">
                <label><input type="checkbox" data-column="6"> Probability</label>
            </div>
            <div class="dropdown-checkbox">
                <label><input type="checkbox" data-column="7"> Company Name</label>
            </div>
            <div class="dropdown-checkbox">
                <label><input type="checkbox" data-column="8"> Address 1</label>
            </div>
            <div class="dropdown-checkbox">
                <label><input type="checkbox" data-column="9"> Address 2</label>
            </div>
            <div class="dropdown-checkbox">
                <label><input type="checkbox" data-column="10"> Website Link</label>
            </div>
            <div class="dropdown-checkbox">
                <label><input type="checkbox" data-column="11"> Contact Name</label>
            </div>
            <div class="dropdown-checkbox">
                <label><input type="checkbox" data-column="12"> Job Postion</label>
            </div>
            <div class="dropdown-checkbox">
                <label><input type="checkbox" data-column="13"> Phone</label>
            </div>
            <div class="dropdown-checkbox">
                <label><input type="checkbox" data-column="14"> Mobile</label>
            </div>
            <div class="dropdown-checkbox">
                <label><input type="checkbox" data-column="15"> Priority</label>
            </div>
            <div class="dropdown-checkbox">
                <label><input type="checkbox" data-column="16"> Title</label>
            </div>
            <div class="dropdown-checkbox">
                <label><input type="checkbox" data-column="17"> Tag</label>
            </div>
            <div class="dropdown-checkbox">
                <label><input type="checkbox" data-column="18"> Sales Person</label>
            </div>
            <div class="dropdown-checkbox">
                <label><input type="checkbox" data-column="19"> Sales Team</label>
            </div>
        </div>
        <table id="example" class="display nowrap example">
            <thead>
                <tr>
                    <th>Lead</th>
                    <th>Email</th>
                    <th>City</th>
                    <th>state</th>
                    <th>Country</th>
                    <th>Zip</th>
                    <th>Probability</th>
                    <th>Company Name</th>
                    <th>Address 1</th>
                    <th>Address 2</th>
                    <th>Website Link</th>
                    <th>Contact Name</th>
                    <th>Job Postion</th>
                    <th>Phone</th>
                    <th>Mobile</th>
                    <th>Priority</th>
                    <th>Title</th>
                    <th>Tag</th>
                    <th>Sales Person</th>
                    <th>Sales Team</th>

                </tr>
            </thead>

            <tbody id="lead-table-body">
            </tbody>
        </table>
    </div>
</div>





<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


<script>
    $(document).ready(function () {
        var table = $('#example').DataTable({
            columnDefs: [{
                visible: false,
                targets: [2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19] // Set initial visibility
            }]
        });

        // Restore column visibility from local storage
        function restoreColumnVisibility() {
            var visibility = JSON.parse(localStorage.getItem('columnVisibility'));
            if (visibility) {
                table.columns().every(function () {
                    var column = this;
                    var index = column.index();
                    var isVisible = visibility[index] !== undefined ? visibility[index] : true;
                    column.visible(isVisible);
                    $('.dropdown-menu input[data-column="' + index + '"]').prop('checked', isVisible);
                });
            }
        }

        // Save column visibility to local storage
        function saveColumnVisibility() {
            var visibility = {};
            table.columns().every(function () {
                var column = this;
                var index = column.index();
                visibility[index] = column.visible();
            });
            localStorage.setItem('columnVisibility', JSON.stringify(visibility));
        }

        // Handle column visibility based on checkbox status
        $('.dropdown-menu input[type="checkbox"]').on('change', function () {
            var column = table.column($(this).data('column'));
            column.visible(this.checked);
            saveColumnVisibility(); // Save visibility to local storage
        });

        // Set default visibility for columns based on initial checkbox state
        restoreColumnVisibility();

        // Handle dropdown menu display
        $(document).on('click', '.dropdown-btn', function (event) {
            event.stopPropagation(); // Prevent click event from propagating to the document
            $('.dropdown-menu').not($(this).next('.dropdown-menu')).hide(); // Hide other dropdowns
            $(this).next('.dropdown-menu').toggle(); // Toggle visibility of the current dropdown
        });

        $(document).on('click', function (event) {
            if (!$(event.target).closest('.dropdown-menu').length) {
                $('.dropdown-menu').hide(); // Hide dropdown if click is outside of it
            }
        });

        // Load default data
        loadTableData();

        // Click event for "My Activities" filter
        $('#my-activities').on('click', function () {
            loadTableData('my_activities');
        });

        // Function to load table data
        function loadTableData(filter = '') {
            $.ajax({
                url: '{{route('lead.get')}}', // Change this to your server endpoint
                method: 'GET',
                data: {
                    filter: filter
                },
                success: function (response) {
                    // Clear existing table data
                    table.clear();

                    // Add new rows
                    response.data.forEach(function (lead) {
                        var rowNode = table.row.add([
                            lead.product_name || '',
                            lead.email || '',
                            lead.city || '',
                            lead.state || '',
                            lead.country || '',
                            lead.zip || '',
                            lead.probability || '',
                            lead.company_name || '',
                            lead.address_1 || '',
                            lead.address_2 || '',
                            lead.website_link || '',
                            lead.contact_name || '',
                            lead.job_postion || '',
                            lead.phone || '',
                            lead.mobile || '',
                            lead.priority || '',
                            lead.title || '',
                            lead.tag || '',
                            lead.sales_person || '',
                            lead.sales_team || '',
                            lead.id // Ensure ID is included here
                        ]).draw().node();

                        // Set data-id attribute
                        $(rowNode).attr('data-id', lead.id);
                    });
                },
                error: function (xhr, status, error) {
                    console.error('Error fetching data:', error);
                }
            });
        }

        // Handle row click event
        $('#example tbody').on('click', 'tr', function () {
            var id = $(this).data('id'); // Get the data-id attribute from the clicked row
            if (id) {
                window.location.href = '/lead-add/' + id; // Adjust the URL to your edit page
            }
        });
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
                type: 'POST',
                data: {
                    filterName: filterName
                },
                success: function (response) {
                    // Handle success, e.g., show a success message or update UI
                    console.log('Filter saved successfully:', response);
                    customFilterModal.hide();
                },
                error: function (xhr, status, error) {
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
        // Show the dropdown when the input field is clicked
        $('#search-input').on('click', function () {
            $('#search-dropdown').show();
        });
        // Handle selection and deselection of dropdown items
        $(document).on('click', '.o-dropdown-item', function () {
            var $item = $(this);
            var selectedValue = $item.clone().children().remove().end().text().trim();
            var $input = $('#search-input');
            var $tag = $('.tag');
            var $tagItem = $('.tag-item[data-value="' + selectedValue + '"]');
            if ($tagItem.length > 0) {
                // Value is already selected, so remove it
                $tagItem.remove();
                // If no tag items remain, remove the tag and clear the input
                if ($tag.children().length === 0) {
                    $tag.remove();
                    $input.val('');
                } else {
                    // Remove trailing separator if present
                    if ($tag.html().endsWith(' > ')) {
                        $tag.html($tag.html().slice(0, -3)); // Remove the last ' > '
                    }
                    // Ensure the remove-tag span is present if there are still tags
                    if ($('.remove-tag').length === 0) {
                        $tag.append(' <span class="remove-tag" style="cursor:pointer">&times;</span>');
                    }
                }
                // Hide the checkmark in the dropdown item
                $item.find('.checkmark').hide();
            } else {
                // Value is not selected, so add it
                if ($tag.length === 0) {
                    // Create the span tag for the first time
                    $('#search-input').before(
                        '<span class="tag">' +
                        '<span class="tag-item" data-value="' + selectedValue + '">' +
                        selectedValue +
                        '</span> <span class="remove-tag" style="cursor:pointer">&times;</span></span>'
                    );
                } else {
                    // Append the new value to the existing tag with a separator
                    $('.remove-tag').remove(); // Remove old remove-tag span
                    $tag.html(function (i, oldHtml) {
                        return oldHtml.replace('</span>', '') + ' > <span class="tag-item" data-value="' + selectedValue + '">' + selectedValue + '</span>';
                    });
                    // Append the new remove-tag span
                    $tag.append(' <span class="remove-tag" style="cursor:pointer">&times;</span>');
                }
                // Show the checkmark
                $item.find('.checkmark').show();
                // Set the value of the input field to the selected value
                $input.val(selectedValue);
            }
            // Hide the dropdown after selection
            $('#search-dropdown').hide();
        });
        // Remove the entire tag when the close button is clicked
        $(document).on('click', '.remove-tag', function () {
            // Remove the tag
            $('.tag').remove();
            // Hide all checkmarks in the dropdown items
            $('.o-dropdown-item .checkmark').hide();
            // Clear the input field
            $('#search-input').val('');
        });
        // Hide dropdown when clicking outside
        $(document).on('click', function (e) {
            if (!$(e.target).closest('#search-input, #search-dropdown').length) {
                $('#search-dropdown').hide();
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
        // Show the dropdown when the input field is clicked
        $('#search-input').on('click', function () {
            $('#search-dropdown').show();
        });

        // Add selected value to the input field and hide the dropdown
        $(document).on('click', '#search-dropdown .o-dropdown-item', function () {
            var selectedValue = $(this).text().trim();
            $('#search-input').val(selectedValue);
            $('#search-dropdown').hide();
        });

        // Hide dropdown when clicking outside
        $(document).on('click', function (e) {
            if (!$(e.target).closest('#search-input, #search-dropdown').length) {
                $('#search-dropdown').hide();
            }
        });
    });

</script>
<script>
    $(document).ready(function () {
        $('#creationDateBtn').on('click', function (event) {
            event.preventDefault();

            // Toggle the dropdown visibility
            $('#creationDateDropdown').slideToggle();

            // Toggle the arrow rotation
            $(this).find('.arrow-icon').toggleClass('rotate');

            // Close other dropdowns and reset arrows (optional, if there are multiple accordions)
            $('.o_dropdown_content').not('#creationDateDropdown').slideUp();
            $('.o_menu_item .arrow-icon').not($(this).find('.arrow-icon')).removeClass('rotate');
        });

        // Optional: Close the dropdown if clicking outside of it
        $(document).on('click', function (event) {
            if (!$(event.target).closest('.o_accordion').length) {
                $('#creationDateDropdown').slideUp();
                $('.o_menu_item .arrow-icon').removeClass('rotate');
            }
        });
        $('#closeDateBtn').on('click', function (event) {
            event.preventDefault();

            // Toggle the dropdown visibility
            $('#closeDateDropdown').slideToggle();

            // Toggle the arrow rotation
            $(this).find('.arrow-icon').toggleClass('rotate');

            // Close other dropdowns and reset arrows (optional, if there are multiple accordions)
            $('.o_dropdown_content').not('#closeDateDropdown').slideUp();
            $('.o_menu_item .arrow-icon').not($(this).find('.arrow-icon')).removeClass('rotate');
        });

        // Optional: Close the dropdown if clicking outside of it
        $(document).on('click', function (event) {
            if (!$(event.target).closest('.o_accordion').length) {
                $('#closeDateDropdown').slideUp();
                $('.o_menu_item .arrow-icon').removeClass('rotate');
            }
        });
    });

</script>



@endsection