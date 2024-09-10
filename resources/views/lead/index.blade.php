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

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<!-- jQuery (required for Bootstrap JS components) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

@endsection
@section('search_div')
<div class="o_popover popover mw-100 o-dropdown--menu dropdown-menu mx-0 o_search_bar_menu d-flex flex-wrap flex-lg-nowrap w-100 w-md-auto mx-md-auto mt-2 py-3"
    role="menu" style="position: absolute; top: 0; left: 0;">
    <div class="o_dropdown_container o_filter_menu w-100 w-lg-auto h-100 px-3 mb-4 mb-lg-0 border-end">
        <div class="px-3 fs-5 mb-2"><i class="me-2 text-primary fa fa-filter"></i>
        <input type="hidden" id="filter" name="filter" value="">

            <h5 class="o_dropdown_title d-inline">Filters</h5>
        </div><span class="o-dropdown-item dropdown-item o-navigable o_menu_item text-truncate" role="menuitemcheckbox"
            tabindex="0" title="" aria-checked="false" id="my-activities"><span class="float-end checkmark"
                style="display:none;">✔</span>My Activities</span><span
            class="o-dropdown-item dropdown-item o-navigable o_menu_item text-truncate" role="menuitemcheckbox"
            tabindex="0" title="" aria-checked="false" id="unassigned"><span class="float-end checkmark"
                style="display:none;">✔</span>Unassigned</span>
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
        <span class="o-dropdown-item dropdown-item o-navigable o_menu_item text-truncate" role="menuitemcheckbox"
            tabindex="0" title="" aria-checked="false"> <span class="float-end checkmark"
                style="display:none;">✔</span>Salesperson</span>
        <span class="o-dropdown-item dropdown-item o-navigable o_menu_item text-truncate" role="menuitemcheckbox"
            tabindex="0" title="" aria-checked="false"> <span class="float-end checkmark"
                style="display:none;">✔</span>Sales Team</span>
        <span class="o-dropdown-item dropdown-item o-navigable o_menu_item text-truncate" role="menuitemcheckbox"
            tabindex="0" title="" aria-checked="false"> <span class="float-end checkmark"
                style="display:none;">✔</span>City</span>
        <span class="o-dropdown-item dropdown-item o-navigable o_menu_item text-truncate" role="menuitemcheckbox"
            tabindex="0" title="" aria-checked="false"> <span class="float-end checkmark"
                style="display:none;">✔</span>Country</span>
        <span class="o-dropdown-item dropdown-item o-navigable o_menu_item text-truncate" role="menuitemcheckbox"
            tabindex="0" title="" aria-checked="false"> <span class="float-end checkmark"
                style="display:none;">✔</span>Campaign</span>
        <span class="o-dropdown-item dropdown-item o-navigable o_menu_item text-truncate" role="menuitemcheckbox"
            tabindex="0" title="" aria-checked="false"> <span class="float-end checkmark"
                style="display:none;">✔</span>Medium</span>
        <span class="o-dropdown-item dropdown-item o-navigable o_menu_item text-truncate" role="menuitemcheckbox"
            tabindex="0" title="" aria-checked="false"> <span class="float-end checkmark"
                style="display:none;">✔</span>Source</span>
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
        // Initialize DataTable with server-side processing
        var table = $('#example').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ route('lead.get') }}',
                type: "POST",
                data: function (d) {
                    d.search = { value: $('#example_filter input').val() };
                    d.filter = $('#filter').val();
                }
            },
            order: [[1, 'DESC']],
            pageLength: 10,
            aoColumns: [
                {
                    data: 'product_name',
                    render: function (data, type, row) {
                        if (data) {
                            return data;
                        } else {
                            return '';
                        }
                    }
                },
                {
                    data: 'email',
                    render: function (data, type, row) {
                        if (data) {
                            return data;
                        } else {
                            return '';
                        }
                    }
                },
                {
                    data: 'city',
                    render: function (data, type, row) {
                        if (data) {
                            return data;
                        } else {
                            return '';
                        }
                    }
                },
                {
                    data: 'get_state',
                    render: function (data, type, row) {
                        if (data) {
                            return data.name;
                        } if (row && row.get_auto_state) {

                            return row.get_auto_state.name;
                        }
                        return '';
                    }
                },
                {
                    data: 'get_country',
                    render: function (data, type, row) {
                        if (data) {
                            return data.name;
                        }
                        if (row && row.get_auto_country) {

                            return row.get_auto_country.name;
                        }
                        return '';
                    }

                },
                {
                    data: 'zip',
                    render: function (data, type, row) {

                        if (data) {
                            return data;
                        } else {
                            return '';
                        }
                    }
                },
                {
                    data: 'probability',
                    render: function (data, type, row) {
                        if (data) {
                            return data;
                        } else {
                            return '';
                        }
                    }
                },
                {
                    data: 'company_name',
                    render: function (data, type, row) {
                        if (data) {
                            return data;
                        } else {
                            return '';
                        }
                    }
                },
                {
                    data: 'address_1',
                    render: function (data, type, row) {
                        if (data) {
                            return data;
                        } else {
                            return '';
                        }
                    }
                },
                {
                    data: 'address_2',
                    render: function (data, type, row) {
                        if (data) {
                            return data;
                        } else {
                            return '';
                        }
                    }
                },
                {
                    data: 'website_link',
                    render: function (data, type, row) {
                        if (data) {
                            return data;
                        } else {
                            return '';
                        }
                    }
                },
                {
                    data: 'contact_name',
                    render: function (data, type, row) {
                        if (data) {
                            return data;
                        } else {
                            return '';
                        }
                    }
                },
                {
                    data: 'job_postion',
                    render: function (data, type, row) {
                        if (data) {
                            return data;
                        } else {
                            return '';
                        }
                    }
                },
                {
                    data: 'phone',
                    render: function (data, type, row) {
                        if (data) {
                            return data;
                        } else {
                            return '';
                        }
                    }
                },
                {
                    data: 'mobile',
                    render: function (data, type, row) {
                        if (data) {
                            return data;
                        } else {
                            return '';
                        }
                    }
                },
                {
                    data: 'priority',
                    render: function (data, type, row) {
                        if (data) {
                            return data;
                        } else {
                            return '';
                        }
                    }
                },
                {
                    data: 'title',
                    render: function (data, type, row) {
                        if (data) {
                            return data;
                        } else {
                            return '';
                        }
                    }
                },
                {
                    data: 'tag',
                    render: function (data, type, row) {
                        if (data) {
                            return data;
                        } else {
                            return '';
                        }
                    }
                },
                {
                    data: 'sales_person',
                    render: function (data, type, row) {
                        if (data) {
                            return data;
                        } else {
                            return '';
                        }
                    }
                },
                {
                    data: 'sales_team',
                    render: function (data, type, row) {
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
            ],
            createdRow: function (row, data, dataIndex) {
                $(row).attr('data-id', data.id);
            }

         
        });

        // Handle row click event
        $('#example tbody').on('click', 'tr', function () {
            var id = $(this).data('id'); // Get the data-id attribute from the clicked row
            if (id) {
                window.location.href = '/lead-add/' + id; // Adjust the URL to your edit page
            }
        });

        // Handle filter click event
        $('.o_menu_item').on('click', function () {
            var filter = $(this).attr('id'); // Get the filter ID
            $('#filter').val(filter); // Set the filter value
            table.ajax.reload(); // Reload the DataTable with new filter
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

        // CSRF token setup for AJAX requests
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
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
            var $tag = $('.tag');
            var $tagItem = $('.tag-item[data-value="' + selectedValue + '"]');

            if ($tagItem.length > 0) {

                // Value is already selected, so remove it
                $tagItem.remove();

                // Update tag separators and remove button
                updateTagSeparators();


                // If no tag items remain, remove the tag container, clear the input and show placeholder
                if ($tag.children().length === 0) {
                    $tag.remove();
                    $('#search-input').val('').attr('placeholder', 'Search...');
                }

                // Hide the checkmark in the dropdown item
                $item.find('.checkmark').hide();
                 filter(selectedValue);
            } else {
                // Value is not selected, so add it
                if ($tag.length === 0) {
                    // Create the span tag for the first time
                    $('#search-input').before(
                        '<span class="tag">' +
                        '<span class="tag-item" data-value="' + selectedValue + '">' +
                        selectedValue +
                        '</span></span>'
                    );
                     filter(selectedValue);
                } else {
                    // Append the new value to the existing tag with a separator
                    var newTagHtml = '<span class="tag-item" data-value="' + selectedValue + '">' + selectedValue + '</span>';
                    $tag.html(function (i, oldHtml) {
                        if (oldHtml.includes('</span>')) {
                            // There are existing tags, so add ' > ' separator before the new tag
                            return oldHtml.replace('</span>', '</span> > ' + newTagHtml);
                        } else {
                            // No existing tags, just add the new tag
                            return oldHtml + ' ' + newTagHtml;
                        }
                    });

                     let selectedTags = [];
                    $('.tag-item').each(function() {
                        selectedTags.push($(this).data('value')); 
                    });

                    filter(selectedTags);
                }
                // Append or update the remove-tag button
                updateRemoveTagButton();
                // Show the checkmark
                $item.find('.checkmark').show();
                // Clear the input field value
                $('#search-input').val('');
                // Remove placeholder
                $('#search-input').attr('placeholder', '');
            }

            // Hide the dropdown after selection
            $('#search-dropdown').hide();
        });

        // Function to update the visibility of the remove-tag button
        function updateRemoveTagButton() {
            var $tag = $('.tag');
            if ($tag.find('.tag-item').length > 0) {
                // Show remove button if there are one or more tags
                if ($('.remove-tag').length === 0) {
                    $tag.append(' <span class="remove-tag" style="cursor:pointer">&times;</span>');
                }
            } else {
                // Hide remove button if there are no tags
                $('.remove-tag').remove();
            }
        }


        function filter(selectedTags) {
    $.ajax({
        url: '/lead-filter', // Endpoint for applying filters
        type: 'POST',
        data: {
            selectedTags: selectedTags
        },
        success: function(response) {
            console.log('Filter applied successfully:', response);

            var tableBody = $('#lead-table-body');
            tableBody.empty(); // Clear the current table body

            var leads = response.data;

            // Append each lead to the table
            $.each(leads, function(groupKey, groupLeads) {
                $.each(groupLeads, function(index, lead) {
                    var row = `
                        <tr>
                            <td title="${lead.name}">${lead.name}</td>
                            <td>${lead.email}</td>
                            <td>${lead.city}</td>
                            <td>${lead.state}</td>
                            <td>${lead.country}</td>
                            <td>${lead.zip}</td>
                            <td>${lead.probability}</td>
                            <td>${lead.company_name}</td>
                            <td>${lead.address_1}</td>
                            <td>${lead.address_2}</td>
                            <td><a href="${lead.website_link}" target="_blank">${lead.website_link}</a></td>
                            <td>${lead.contact_name}</td>
                            <td>${lead.job_position}</td>
                            <td>${lead.phone}</td>
                            <td>${lead.mobile}</td>
                            <td>${lead.priority}</td>
                            <td>${lead.title}</td>
                            <td>${lead.tag}</td>
                            <td>${lead.sales_person}</td>
                            <td>${lead.sales_team}</td>
                        </tr>`;
                    tableBody.append(row);
                });
            });
        },
        error: function(xhr, status, error) {
            console.error('Error applying filter:', error);
        }
    });
}






        // Function to update tag separators
        function updateTagSeparators() {
            var $tag = $('.tag');
            var $tagItems = $tag.find('.tag-item');
            var html = '';
            $tagItems.each(function (index) {
                html += $(this).prop('outerHTML');
                if (index < $tagItems.length - 1) {
                    html += ' > ';
                }
            });
            // Update the tag HTML with separators
            $tag.html(html);
            // Update the remove-tag button visibility
            updateRemoveTagButton();
        }

        // Remove the entire tag when the close button is clicked
        $(document).on('click', '.remove-tag', function () {
            // Remove the tag container
            $('.tag').remove();
            // Hide all checkmarks in the dropdown items
            $('.o-dropdown-item .checkmark').hide();
            // Clear the input field and reset placeholder
            $('#search-input').val('').attr('placeholder', 'Search...');
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
            // var selectedValue = $(this).text().trim();
            // $('#search-input').val(selectedValue);
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