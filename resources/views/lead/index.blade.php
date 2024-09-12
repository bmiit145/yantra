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
<div class="o_popover popover mw-100 o-dropdown--menu dropdown-menu mx-0 o_search_bar_menu d-flex flex-wrap flex-lg-nowrap w-100 w-md-auto mx-md-auto mt-2 py-3" role="menu" style="position: absolute; top: 0; left: 0;">
    <div class="o_dropdown_container o_filter_menu w-100 w-lg-auto h-100 px-3 mb-4 mb-lg-0 border-end">
        <div class="px-3 fs-5 mb-2"><i class="me-2 text-primary fa fa-filter"></i>
            <input type="hidden" id="filter" name="filter" value="">

            <h5 class="o_dropdown_title d-inline">Filters</h5>
        </div>
        <span class="o-dropdown-item dropdown-item o-navigable o_menu_item text-truncate activities" role="menuitemcheckbox" tabindex="0" title="" aria-checked="false" id="my-activities"><span class="float-end checkmark" style="display:none;">✔</span>My Activities</span>
        <span class="o-dropdown-item dropdown-item o-navigable o_menu_item text-truncate activities" role="menuitemcheckbox" tabindex="0" title="" aria-checked="false" id="unassigned"><span class="float-end checkmark" style="display:none;">✔</span>Unassigned</span>
        <div class="dropdown-divider" role="separator"></div>
        <span class="o-dropdown-item dropdown-item o-navigable o_menu_item text-truncate lost_span" role="menuitemcheckbox" tabindex="0" title="" aria-checked="false">Lost</span>
        <div class="dropdown-divider" role="separator"></div>
        <div class="o_accordion position-relative"><button class="o_menu_item o_accordion_toggle dropdown-item o-navigable text-truncate" tabindex="0" aria-expanded="false">Creation Date</button></div>
        <div class="o_accordion position-relative"><button class="o_menu_item o_accordion_toggle dropdown-item o-navigable text-truncate" tabindex="0" aria-expanded="false">Closed Date</button></div>
        <div class="dropdown-divider" role="separator"></div><span class="o-dropdown-item dropdown-item o-navigable o_menu_item text-truncate" role="menuitemcheckbox" tabindex="0" title="" aria-checked="false">Late Activities</span><span class="o-dropdown-item dropdown-item o-navigable o_menu_item text-truncate" role="menuitemcheckbox" tabindex="0" title="Today Activities" aria-checked="false">Today Activities</span><span class="o-dropdown-item dropdown-item o-navigable o_menu_item text-truncate focus" role="menuitemcheckbox" tabindex="0" title="Future Activities" aria-checked="false">Future Activities</span>
        <div class="dropdown-divider" role="separator"></div><span class="o-dropdown-item dropdown-item o-navigable o_menu_item text-truncate" role="menuitemcheckbox" tabindex="0" title="" aria-checked="false">Archived</span>
        <div role="separator" class="dropdown-divider"></div><span class="o-dropdown-item dropdown-item o-navigable o_menu_item o_add_custom_filter" role="menuitem" tabindex="0" style="cursor: pointer;">Add Custom Filter</span>
    </div>
    <div class="o_dropdown_container o_group_by_menu w-100 w-lg-auto h-100 px-3 mb-4 mb-lg-0 border-end">
        <div class="px-3 fs-5 mb-2"><i class="me-2 text-action oi oi-group"></i>
            <h5 class="o_dropdown_title d-inline">Group By</h5>
        </div>
        <span class="o-dropdown-item_1 dropdown-item o-navigable o_menu_item text-truncate" role="menuitemcheckbox" tabindex="0" title="" aria-checked="false"> <span class="float-end checkmark" style="display:none;">✔</span>Salesperson</span>
        <span class="o-dropdown-item_1 dropdown-item o-navigable o_menu_item text-truncate" role="menuitemcheckbox" tabindex="0" title="" aria-checked="false"> <span class="float-end checkmark" style="display:none;">✔</span>Sales Team</span>
        <span class="o-dropdown-item_1 dropdown-item o-navigable o_menu_item text-truncate" role="menuitemcheckbox" tabindex="0" title="" aria-checked="false"> <span class="float-end checkmark" style="display:none;">✔</span>City</span>
        <span class="o-dropdown-item_1 dropdown-item o-navigable o_menu_item text-truncate" role="menuitemcheckbox" tabindex="0" title="" aria-checked="false"> <span class="float-end checkmark" style="display:none;">✔</span>Country</span>
        <span class="o-dropdown-item_1 dropdown-item o-navigable o_menu_item text-truncate" role="menuitemcheckbox" tabindex="0" title="" aria-checked="false"> <span class="float-end checkmark" style="display:none;">✔</span>Campaign</span>
        <span class="o-dropdown-item_1 dropdown-item o-navigable o_menu_item text-truncate" role="menuitemcheckbox" tabindex="0" title="" aria-checked="false"> <span class="float-end checkmark" style="display:none;">✔</span>Medium</span>
        <span class="o-dropdown-item_1 dropdown-item o-navigable o_menu_item text-truncate" role="menuitemcheckbox" tabindex="0" title="" aria-checked="false"> <span class="float-end checkmark" style="display:none;">✔</span>Source</span>
        <div class="dropdown-divider" role="separator">
        </div>
        <div class="o_accordion position-relative">
            <button class="o_menu_item o_accordion_toggle dropdown-item o-navigable text-truncate" style="display: flex;justify-content: space-between;" tabindex="0" aria-expanded="false" id="creationDateBtn">
                Creation Date
                <span class="arrow-icon">▼</span>
            </button>
            <div class="o_dropdown_content" id="creationDateDropdown" style="display: none; position: absolute; z-index: 1000; background: white; border: 1px solid #ccc; width: 100%;">
                <span class="o-dropdown-item_1 dropdown-item"><span style="display:none;">Creation Date:</span> <span class="float-end checkmark" style="display:none;">✔</span>Year</span>
                <span class="o-dropdown-item_1 dropdown-item"><span style="display:none;">Creation Date:</span><span class="float-end checkmark" style="display:none;">✔</span>Quarter</span>
                <span class="o-dropdown-item_1 dropdown-item"><span style="display:none;">Creation Date:</span><span class="float-end checkmark" style="display:none;">✔</span>Month</span>
                <span class="o-dropdown-item_1 dropdown-item"><span style="display:none;">Creation Date:</span><span class="float-end checkmark" style="display:none;">✔</span>Week</span>
                <span class="o-dropdown-item_1 dropdown-item"><span style="display:none;">Creation Date:</span><span class="float-end checkmark" style="display:none;">✔</span>Day</span>
            </div>
        </div>
        <div class="o_accordion position-relative">
            <button class="o_menu_item o_accordion_toggle dropdown-item o-navigable text-truncate" tabindex="0" aria-expanded="false" id="closeDateBtn" style="display: flex;justify-content: space-between;">
                Closed Date
                <span class="arrow-icon">▼</span>
            </button>
            <div class="o_dropdown_content" id="closeDateDropdown" style="display: none; position: absolute; z-index: 1000; background: white; border: 1px solid #ccc; width: 100%;">
                <span class="o-dropdown-item_1 dropdown-item"><span style="display:none;">Closed Date:</span><span class="float-end checkmark" style="display:none;">✔</span>Year</span>
                <span class="o-dropdown-item_1 dropdown-item"><span style="display:none;">Closed Date:</span><span class="float-end checkmark" style="display:none;">✔</span>Quarter</span>
                <span class="o-dropdown-item_1 dropdown-item"><span style="display:none;">Closed Date:</span><span class="float-end checkmark" style="display:none;">✔</span>Month</span>
                <span class="o-dropdown-item_1 dropdown-item"><span style="display:none;">Closed Date:</span><span class="float-end checkmark" style="display:none;">✔</span>Week</span>
                <span class="o-dropdown-item_1 dropdown-item"><span style="display:none;">Closed Date:</span><span class="float-end checkmark" style="display:none;">✔</span>Day</span>
            </div>
        </div>

        {{-- <div class="o_accordion position-relative">
            <button class="o_menu_item o_accordion_toggle dropdown-item o-navigable text-truncate" tabindex="0"
                aria-expanded="false">Closed Date</button>
        </div> --}}
        <div class="dropdown-divider" role="separator"></div>
        {{-- <div class="o_accordion position-relative"><button
                class="o_menu_item o_accordion_toggle dropdown-item o-navigable  text-truncate"
                tabindex="0" aria-expanded="false">Properties</button></div> --}}
        <div role="separator" class="dropdown-divider"></div>
        <select class="o_add_custom_group_menu o_menu_item dropdown-item">
            <option value="" disabled="true" selected="true" hidden="true">Add Custom Group</option>
            <option value="Active">Active</option>
            <option value="campaign_id">Campaign</option>
            <option value="city">City</option>
            <option value="date_closed">Closed Date</option>
            <option value="company_id">Company</option>
            <option value="partner_name">Company Name</option>
            <option value="contact_name">Contact Name</option>
            <option value="date_conversion">Conversion Date</option>
            <option value="country_id">Country</option>
            <option value="create_uid">Created by</option>
            <option value="create_date">Created on</option>
            <option value="partner_id">Customer</option>
            <option value="email_from">Email</option>
            <option value="lost_reason_id">Lost Reason</option>
            <option value="medium_id">Medium</option>
            <option value="mobile">Mobile</option>
            <option value="name">Opportunity</option>
            <option value="phone">Phone</option>
            <option value="priority">Priority</option>
            <option value="referred">Referred By</option>
            <option value="team_id">Sales Team</option>
            <option value="user_id">Salesperson</option>
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
        </div><span class="o-dropdown-item dropdown-item o-navigable o_menu_item text-truncate selected" role="menuitemcheckbox" tabindex="0" aria-checked="true"><span class="d-flex p-0 align-items-center justify-content-between"><span class="text-truncate flex-grow-1" title="">Leads</span><i class="ms-1 fa fa-trash-o" title="Delete item"></i></span></span>
        <div role="separator" class="dropdown-divider"></div>
        <div class="o_accordion position-relative"><button class="o_menu_item o_accordion_toggle dropdown-item o-navigable o_add_favorite text-truncate" tabindex="0" aria-expanded="false">Save current search</button></div>
    </div>
</div>
@endsection

<!-- Modal -->
<div class="modal fade" id="customFilterModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="customFilterModalLabel" aria-hidden="true">
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
                                        <option value="Country">Country</option>
                                        <option value="Zip">Zip</option>
                                        <option value="Tags">Tags</option>
                                        <option value="Created by">Created by</option>
                                        <option value="Created on">Created on</option>
                                        <option value="Customer">Customer</option>
                                        <option value="Email">Email</option>
                                        <option value="ID">ID</option>
                                        <option value="Phone">Phone</option>
                                        <option value="Priority">Priority</option>
                                        <option value="Probability">Probability</option>
                                        {{-- <option value="Properties">Properties</option> --}}
                                        <option value="Referred By">Referred By</option>
                                        <option value="Sales Team">Sales Team</option>
                                        <option value="Salesperson">Salesperson</option>
                                        <option value="Source">Source</option>
                                        <option value="Stage">Stage</option>
                                        <option value="State">State</option>
                                        <option value="Street">Street</option>
                                        <option value="Street2">Street2</option>
                                        <option value="Title">Title</option>
                                        <option value="Type">Type</option>
                                        <option value="Website">Website</option>
                                        <option value="Campaign">Campaign</option>
                                        <option value="City">City</option>
                                        {{-- <option value="Company">Company</option> --}}
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
                <button type="submit" style="background-color: #714B67;border-color: #714B67;" class="btn btn-primary">Add</button>
                <button type="button" style="background-color: #e7e9ed;border-color: #e7e9ed;color: #374151;" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
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
        min-width: 691px;
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
    $(document).ready(function() {
        // Initialize DataTable with server-side processing
        var table = $('#example').DataTable({
            processing: true
            , serverSide: true
            , ajax: {
                url: '{{ route('lead.get') }}'
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
                    data: 'product_name'
                    , render: function(data, type, row) {
                        if (data) {
                            return data;
                        } else {
                            return '';
                        }
                    }
                }
                , {
                    data: 'email'
                    , render: function(data, type, row) {
                        if (data) {
                            return data;
                        } else {
                            return '';
                        }
                    }
                }
                , {
                    data: 'city'
                    , render: function(data, type, row) {
                        if (data) {
                            return data;
                        } else {
                            return '';
                        }
                    }
                }
                , {
                    data: 'get_state'
                    , render: function(data, type, row) {
                        if (data) {
                            return data.name;
                        }
                        if (row && row.get_auto_state) {

                            return row.get_auto_state.name;
                        }
                        return '';
                    }
                }
                , {
                    data: 'get_country'
                    , render: function(data, type, row) {
                        if (data) {
                            return data.name;
                        }
                        if (row && row.get_auto_country) {

                            return row.get_auto_country.name;
                        }
                        return '';
                    }

                }
                , {
                    data: 'zip'
                    , render: function(data, type, row) {

                        if (data) {
                            return data;
                        } else {
                            return '';
                        }
                    }
                }
                , {
                    data: 'probability'
                    , render: function(data, type, row) {
                        if (data) {
                            return data;
                        } else {
                            return '';
                        }
                    }
                }
                , {
                    data: 'company_name'
                    , render: function(data, type, row) {
                        if (data) {
                            return data;
                        } else {
                            return '';
                        }
                    }
                }
                , {
                    data: 'address_1'
                    , render: function(data, type, row) {
                        if (data) {
                            return data;
                        } else {
                            return '';
                        }
                    }
                }
                , {
                    data: 'address_2'
                    , render: function(data, type, row) {
                        if (data) {
                            return data;
                        } else {
                            return '';
                        }
                    }
                }
                , {
                    data: 'website_link'
                    , render: function(data, type, row) {
                        if (data) {
                            return data;
                        } else {
                            return '';
                        }
                    }
                }
                , {
                    data: 'contact_name'
                    , render: function(data, type, row) {
                        if (data) {
                            return data;
                        } else {
                            return '';
                        }
                    }
                }
                , {
                    data: 'job_postion'
                    , render: function(data, type, row) {
                        if (data) {
                            return data;
                        } else {
                            return '';
                        }
                    }
                }
                , {
                    data: 'phone'
                    , render: function(data, type, row) {
                        if (data) {
                            return data;
                        } else {
                            return '';
                        }
                    }
                }
                , {
                    data: 'mobile'
                    , render: function(data, type, row) {
                        if (data) {
                            return data;
                        } else {
                            return '';
                        }
                    }
                }
                , {
                    data: 'priority'
                    , render: function(data, type, row) {
                        if (data) {
                            return data;
                        } else {
                            return '';
                        }
                    }
                }
                , {
                    data: 'get_tilte'
                    , render: function(data, type, row) {
                        if (data) {
                            return data.title;
                        } else {
                            return '';
                        }
                    }
                }
                , {
                    data: 'tag'
                    , render: function(data, type, row) {
                        if (data) {
                            return data;
                        } else {
                            return '';
                        }
                    }
                }
                , {
                    data: 'get_user'
                    , render: function(data, type, row) {
                        if (data) {
                            return data.email;
                        } else {
                            return '';
                        }
                    }
                }
                , {
                    data: 'sales_team'
                    , render: function(data, type, row) {
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
            , createdRow: function(row, data, dataIndex) {
                $(row).attr('data-id', data.id);
            }


        });

        // Handle row click event
        $('#example tbody').on('click', 'tr', function() {
            var id = $(this).data('id'); // Get the data-id attribute from the clicked row
            if (id) {
                window.location.href = '/lead-add/' + id; // Adjust the URL to your edit page
            }
        });

        // Handle filter click event
        $('.o_menu_item').on('click', function() {
            var filter = $(this).attr('id'); // Get the filter ID
            $('#filter').val(filter); // Set the filter value
            table.ajax.reload(); // Reload the DataTable with new filter
        });

        // Restore column visibility from local storage
        function restoreColumnVisibility() {
            var visibility = JSON.parse(localStorage.getItem('columnVisibility'));
            if (visibility) {
                table.columns().every(function() {
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
            table.columns().every(function() {
                var column = this;
                var index = column.index();
                visibility[index] = column.visible();
            });
            localStorage.setItem('columnVisibility', JSON.stringify(visibility));
        }

        // Handle column visibility based on checkbox status
        $('.dropdown-menu input[type="checkbox"]').on('change', function() {
            var column = table.column($(this).data('column'));
            column.visible(this.checked);
            saveColumnVisibility(); // Save visibility to local storage
        });

        // Set default visibility for columns based on initial checkbox state
        restoreColumnVisibility();

        // Handle dropdown menu display
        $(document).on('click', '.dropdown-btn', function(event) {
            event.stopPropagation(); // Prevent click event from propagating to the document
            $('.dropdown-menu').not($(this).next('.dropdown-menu')).hide(); // Hide other dropdowns
            $(this).next('.dropdown-menu').toggle(); // Toggle visibility of the current dropdown
        });

        $(document).on('click', function(event) {
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
    $(document).ready(function() {
        // Initialize the Bootstrap modal
        var customFilterModal = new bootstrap.Modal(document.getElementById('customFilterModal'));

        // Handle the click event on the "Add Custom Filter" button
        $('.o_add_custom_filter').on('click', function() {
            customFilterModal.show();
        });


        // Handle form submission with AJAX
        $('#saveFilterBtn').on('click', function() {
            var filterName = $('#filterName').val();

            $.ajax({
                url: '/path/to/your/api/endpoint', // Replace with your API endpoint
                type: 'POST'
                , data: {
                    filterName: filterName
                }
                , success: function(response) {
                    // Handle success, e.g., show a success message or update UI
                    console.log('Filter saved successfully:', response);
                    customFilterModal.hide();
                }
                , error: function(xhr, status, error) {
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
        $('#addNewRule').on('click', function(event) {
            event.preventDefault();
            addNewRule();
        });

        // Click handler for "fa-plus" button in rule rows
        $(document).on('click', '.add-new-rule', function(event) {
            event.preventDefault();
            addNewRule();
        });

        // Click handler for "Delete node" button
        $(document).on('click', '.delete-rule', function(event) {
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
{{-- ------------------ lost_span --------------------- --}}
<script>
 $(document).on('click', '.lost_span', function(e) {
        e.stopPropagation();
        var $item = $(this);

        // Get the text of the clicked "Lost" span
        var selectedValue = $item.text().trim();
        handleTagSelection3(selectedValue, $item);
    });

    function handleTagSelection3(selectedValue, $item = null) {
        var $tag = $('.tag1');
        var $tagItem = $('.tag-item[data-value="' + selectedValue + '"]');

        if ($tagItem.length > 0) {
            // Remove existing tag
            $tagItem.remove();
            updateTagSeparators3();

            // Remove the tag container if no more tags
            if ($tag.children().length === 0) {
                $tag.remove();
                $('#search-input').val('').attr('placeholder', 'Search...');
            }

            // Hide checkmark in case of deselection
            if ($item) {
                $item.find('.checkmark').hide();
            }

            // Update remaining selected tags and filter
            let selectedTags = [];
            $('.tag-item').each(function() {
                selectedTags.push($(this).data('value'));
            });
            

        } else {
            // Add new tag with filter icon and close button
            var newTagHtml = '<span class="lost" data-value="' + selectedValue + '">' + selectedValue + '</span>';

            // If no tags exist, create the tag container
            if ($tag.length === 0) {
                $('#search-input').before('<span class="tag1">' + newTagHtml + '</span>');
            } else {
                $tag.append(newTagHtml);
            }

            // Show the checkmark for the selected item
            if ($item) {
                $item.find('.checkmark').show();
            }

            // Reset input and placeholder
            $('#search-input').val('');
            $('#search-input').attr('placeholder', '');

            // Update the selected tags and filter
            let selectedTags = [];
            $('.tag-item').each(function() {
                selectedTags.push($(this).data('value'));
            });
           
        }

        // Hide dropdown after selection
        $('#search-dropdown').hide();
    }

    function updateTagSeparators3() {
        var $tag = $('.tag1');
        var $tagItems = $tag.find('.tag-item');
        var html = '';
        $tagItems.each(function(index) {
            html += $(this).prop('outerHTML');
            if (index < $tagItems.length - 1) {
                html += ' & ';
            }
        });
        $tag.html(html);
        updateRemoveTagButton3();
    }

    function updateTagSeparators3() {
        var $tag = $('.tag1');
        var $tagItems = $tag.find('.tag-item');
        var html = '';
        $tagItems.each(function(index) {
            html += $(this).prop('outerHTML');
            if (index < $tagItems.length - 1) {
                html += ' & ';
            }
        });
        $tag.html(html);
        updateRemoveTagButton3();
    }

    // Remove the "Lost" tag when the close button is clicked
    $(document).on('click', '.remove-lost-tag', function() {
        $(this).parent('.tag-item').remove();
        updateTagSeparators3();

        // Remove checkmark from the dropdown
        $('.activities:contains("Lost")').find('.checkmark').hide();
    });

    function updateRemoveTagButton3() {
        var $tag = $('.tag1');
        if ($tag.find('.tag-item').length > 0) {
            if ($('.remove-tag').length === 0) {
                $tag.append(' <span class="remove-tag" style="cursor:pointer">&times;</span>');
            }
        } else {
            $('.remove-tag').remove();
        }
    }
</script>
{{-- ----------------------- activities -------------------------- --}}
<script>
   
    $(document).on('click', '.activities', function(e) {
        e.stopPropagation();
        var $item = $(this);

        // Clone the item, remove the checkmark span and get the trimmed text
        var selectedValue = $item.clone().find('.checkmark').remove().end().text().trim();
        handleTagSelection2(selectedValue, $item);
    });


    function handleTagSelection2(selectedValue, $item = null) {
        var $tag = $('.tag');
        var $tagItem = $('.tag-item[data-value="' + selectedValue + '"]');

        console.log(selectedValue, 'sdhasuih');

        if ($tagItem.length > 0) {
            // If the tag already exists, remove it
            $tagItem.remove();
            updateTagSeparators2();

            // If no tags left, remove the container and reset the input
            if ($tag.children().length === 0) {
                $tag.remove();
                $('#search-input').val('').attr('placeholder', 'Search...');
            }

            // Hide the checkmark if it's being deselected
            if ($item) {
                $item.find('.checkmark').hide();
            }

            // Collect remaining selected tags
            let selectedTags = [];
            $('.tag-item').each(function() {
                selectedTags.push($(this).data('value'));
            });
           

        } else {
            // If the tag does not exist, add it
            var newTagHtml = '<span class="tag-item" data-value="' + selectedValue + '">' + selectedValue + '</span>';




            // Check if a tag container exists, if not, create one
            if ($tag.length === 0) {
                $('#search-input').before('<span class="tag">' + newTagHtml + '</span>');
            } else {
                $tag.append(' & ' + newTagHtml);
            }

            updateTagSeparators2();

            // Show the checkmark on the selected item
            if ($item) {
                $item.find('.checkmark').show();
            }

            // Reset input and placeholder
            $('#search-input').val('');
            $('#search-input').attr('placeholder', '');

            // Collect selected tags
            let selectedTags = [];
            $('.tag-item').each(function() {
                selectedTags.push($(this).data('value'));
            });
        
        }

        // Hide dropdown after selection
        $('#search-dropdown').hide();
    }

    function updateTagSeparators2() {
        var $tag = $('.tag');
        var $tagItems = $tag.find('.tag-item');
        var html = '';
        $tagItems.each(function(index) {
            html += $(this).prop('outerHTML');
            if (index < $tagItems.length - 1) {
                html += ' & ';
            }
        });
        $tag.html(html);
        updateRemoveTagButton2();
    }

    // Remove the "Lost" tag when the close button is clicked
    $(document).on('click', '.remove-lost-tag', function() {
        $(this).parent('.tag-item').remove();
        updateTagSeparators2();

        // Remove checkmark from the dropdown
        $('.activities:contains("Lost")').find('.checkmark').hide();
    });

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

</script>
 {{-- ----------------------------- Group by ------------------------------ --}}
<script>
    $(document).ready(function() {
        // Handle item selection from dropdown
        $(document).on('click', '.o-dropdown-item_1', function(e) {
            e.stopPropagation();
            var $item = $(this);
            var selectedValue = $item.clone().find('.checkmark').remove().end().text().trim();
            handleTagSelection(selectedValue, $item);
        });

        // Listen to changes in the select dropdown
        $('.o_add_custom_group_menu').on('change', function(e) {
            var selectedValue = $(this).find('option:selected').text().trim();
            handleTagSelection(selectedValue);
            $(this).val(''); // Reset the select after selecting an option
        });


        // Function to handle tag selection
        function handleTagSelection(selectedValue, $item = null) {
            var $tag = $('.tag');
            var $tagItem = $('.tag-item[data-value="' + selectedValue + '"]');

            if ($tagItem.length > 0) {
                // Remove selected value
                $tagItem.remove();
                updateTagSeparators();

                if ($tag.children().length === 0) {
                    $tag.remove();
                    $('#search-input').val('').attr('placeholder', 'Search...');
                }

                if ($item) {
                    $item.find('.checkmark').hide();
                }

                let selectedTags = [];
                $('.tag-item').each(function() {
                    selectedTags.push($(this).data('value'));
                });
                filter(selectedTags);

            } else {
                // Add selected value
                var newTagHtml = '<span class="tag-item" data-value="' + selectedValue + '">' + selectedValue + '</span>';
                if ($tag.length === 0) {
                    $('#search-input').before('<span class="tag">' + newTagHtml + '</span>');
                } else {
                    $tag.append(' > ' + newTagHtml);
                }
                updateTagSeparators();

                if ($item) {
                    $item.find('.checkmark').show();
                }

                $('#search-input').val('');
                $('#search-input').attr('placeholder', '');

                // Collect selected tags
                let selectedTags = [];
                $('.tag-item').each(function() {
                    selectedTags.push($(this).data('value'));
                });
                filter(selectedTags);
            }

            $('#search-dropdown').hide();
        }


        $(document).on('click', '.o_add_custom_group_menu', function() {
            let selectedTags = [];

            // Check if there are any tags in the '.tag-item'
            if ($('.tag-item').length > 0) {
                $('.tag-item').each(function() {
                    selectedTags.push($(this).data('value'));
                });
            }

            // If selectedTags is not empty, call the filter function
            if (selectedTags.length > 0) {
                filter(selectedTags);
            } else {
                console.log('No tags selected');
            }
        });

        // Update tag separators and remove button
        function updateTagSeparators() {
            var $tag = $('.tag');
            var $tagItems = $tag.find('.tag-item');
            var html = '';
            $tagItems.each(function(index) {
                html += $(this).prop('outerHTML');
                if (index < $tagItems.length - 1) {
                    html += ' > ';
                }
            });
            html += ' <span class="remove-tag" style="cursor:pointer">&times;</span>';
            $tag.html(html);
            updateRemoveTagButton();
        }

        // Update/remove tag button
        function updateRemoveTagButton() {
            var $tag = $('.tag');
            if ($tag.find('.tag-item').length > 0) {
                if ($('.remove-tag').length === 0) {
                    $tag.append(' <span class="remove-tag" style="cursor:pointer">&times;</span>');
                }
            } else {
                $('.remove-tag').remove();
            }
        }

        // Remove all tags
        $(document).on('click', '.remove-tag', function() {
            $('.tag').remove();
            $('.o-dropdown-item .checkmark').hide();
            $('#search-input').val('').attr('placeholder', 'Search...');
            $('#filter').val(''); // Clear the filter value
            table.ajax.reload();
        });

        // Hide dropdown when clicking outside
        $(document).on('click', function(e) {
            if (!$(e.target).closest('#search-input, #search-dropdown').length) {
                $('#search-dropdown').hide();
            }
        });

        $('#creationDateBtn').on('click', function(event) {
            event.preventDefault();

            // Toggle the dropdown visibility
            $('#creationDateDropdown').slideToggle();

            // Toggle the arrow rotation
            $(this).find('.arrow-icon').toggleClass('rotate');

            let selectedTags = [];
            if ($('.tag-item').length > 0) {
                $('.tag-item').each(function() {
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

        // Optional: Close the dropdown if clicking outside of it
        $(document).on('click', function(event) {
            if (!$(event.target).closest('.o_accordion').length) {
                $('#creationDateDropdown').slideUp();
                $('.o_menu_item .arrow-icon').removeClass('rotate');
            }
        });
        $('#closeDateBtn').on('click', function(event) {
            event.preventDefault();

            // Toggle the dropdown visibility
            $('#closeDateDropdown').slideToggle();

            // Toggle the arrow rotation
            $(this).find('.arrow-icon').toggleClass('rotate');

            let selectedTags = [];
            if ($('.tag-item').length > 0) {
                $('.tag-item').each(function() {
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
            $('.o_dropdown_content').not('#closeDateDropdown').slideUp();
            $('.o_menu_item .arrow-icon').not($(this).find('.arrow-icon')).removeClass('rotate');
        });

        // Optional: Close the dropdown if clicking outside of it
        $(document).on('click', function(event) {
            if (!$(event.target).closest('.o_accordion').length) {
                $('#closeDateDropdown').slideUp();
                $('.o_menu_item .arrow-icon').removeClass('rotate');
            }
        });

        // Send selected tags to the server and process response
        function filter(selectedTags) {
            console.log('Selected tags:', selectedTags);
            $.ajax({
                url: '/lead-filter'
                , type: 'POST'
                , data: {
                    selectedTags: JSON.stringify(selectedTags)
                }
                , success: function(response) {
                    console.log('Response:', response);

                    var tableBody = $('#lead-table-body');
                    tableBody.empty();

                    var leads = response.data;

                    function renderGroup(groupLeads, level) {
                        $.each(groupLeads, function(groupKey, groupValue) {
                            var groupRow = `
                            <tr class="group-header" data-level="${level}" style="cursor:pointer;">
                                <td colspan="20" style="padding-left:${level * 20}px;">
                                    <b>${groupKey} (${$.isArray(groupValue) ? groupValue.length : Object.keys(groupValue).length})</b>
                                </td>
                            </tr>
                        `;
                            tableBody.append(groupRow);

                            if ($.isArray(groupValue)) {
                                $.each(groupValue, function(index, lead) {
                                    var leadRow = `
                                    <tr class="lead-row" data-id="${lead.id}" data-level="${level + 1}" style="display:none;">
                                        <td title="${lead.product_name}">${lead.product_name ?? ''}</td>
                                        <td>${lead.email ?? ''}</td>
                                        <td>${lead.city ?? ''}</td>
                                        <td>${lead.getState ? lead.getState.name : ''}</td>
                                        <td>${lead.getCountry ? lead.getCountry.name : ''}</td>
                                        <td>${lead.zip ?? ''}</td>
                                        <td>${lead.probability ?? ''}</td>
                                        <td>${lead.company_name ?? ''}</td>
                                        <td>${lead.address_1 ?? ''}</td>
                                        <td>${lead.address_2 ?? ''}</td>
                                        <td><a href="${lead.website_link}" target="_blank">${lead.website_link ?? ''}</a></td>
                                        <td>${lead.contact_name ?? ''}</td>
                                        <td>${lead.job_postion ?? ''}</td>
                                        <td>${lead.phone ?? ''}</td>
                                        <td>${lead.mobile ?? ''}</td>
                                        <td>${lead.priority ?? ''}</td>
                                        <td>${lead.title ?? ''}</td>
                                        <td>${lead.tag ?? ''}</td>
                                        <td>${lead.getUser ? lead.getUser.email : ''}</td>
                                        <td>${lead.sales_team ?? ''}</td>
                                    </tr>
                                `;
                                    tableBody.append(leadRow);
                                });
                            } else {
                                renderGroup(groupValue, level + 1);
                            }
                        });
                    }

                    renderGroup(leads, 0);

                    // Toggle visibility of nested groups
                    $('.group-header').on('click', function() {
                        var level = $(this).data('level');
                        var nextRow = $(this).next();
                        while (nextRow.length && nextRow.data('level') > level) {
                            nextRow.toggle();
                            nextRow = nextRow.next();
                        }
                    });
                }
                , error: function(xhr, status, error) {
                    console.error('Error applying filter:', error);
                }
            });
        }

        $(document).on('click', '.lead-row', function() {
            var leadId = $(this).data('id');
            if (leadId) {
                window.location.href = '/lead.create/' + leadId;
            }
        });

        // Initialize tags if any tags are present on page load
        updateTagSeparators(); // Ensure that the close icon is added correctly
    });

</script>
 {{-- ---------------- custom filter ------------------- --}}
<script>
    $(document).ready(function() {


        $('#customer_filter_select').on('change', function(event) {
            var selectedValue = $(this).val();
            var filterInput = $('.customer_filter_input');

            filterInput.empty();

            if (selectedValue === 'Country') {
                // Show the country dropdown
                var countryDropdown = `
                <select name="country" id="country_select" class="form-control">
                    @foreach($Countrs as $Country)
                        <option value="{{ $Country->id }}">{{ $Country->name }}</option>
                    @endforeach
                </select>`;
                filterInput.append(countryDropdown);
            } else if (selectedValue === 'Zip') {

                var zipInput = `<input type="text" name="zip" class="form-control" placeholder="Enter Zip">`;
                filterInput.append(zipInput);
            } else if (selectedValue === 'Tags') {

                var tag = ` <select name="country" id="country_select" class="form-control">
                    @foreach($tages as $tage)
                        <option value="{{ $tage->id }}">{{ $tage->name }}</option>
                    @endforeach
                </select>`;
                filterInput.append(tag);
            } else if (selectedValue === 'Created by') {
                var created_by = ` <select name="created_by" id="created_by" class="form-control">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>`;
                filterInput.append(created_by);
            } else if (selectedValue === 'Created on') {
                var created_on = ` <input type="date" name="created_on" class="form-control">`;
                filterInput.append(created_on);
            } else if (selectedValue === 'Customer') {
                var customer = ` <select name="customer" id="customer" class="form-control">
                    @foreach($customers as $customer)
                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                    @endforeach
                </select>`;
                filterInput.append(customer);
            } else if (selectedValue === 'Email') {
                var email = ` <input type="email" name="email" class="form-control">`;
                filterInput.append(email);
            } else if (selectedValue === 'ID') {
                var id = ` <input type="text" name="id" class="form-control">`;
                filterInput.append(id);
            } else if (selectedValue === 'Phone') {
                var phone = ` <input type="text" name="phone" class="form-control">`;
                filterInput.append(phone);
            } else if (selectedValue === 'Priority') {
                var priority = ` <select name="priority" id="priority" class="form-control">
                     <option value="Medium">Medium</option>
                     <option value="High">High</option>
                     <option value="Very High">Very High</option>
                 
                </select>`;
                filterInput.append(priority);
            } else if (selectedValue === 'Probability') {
                var probability = ` <input type="text" name="probability" class="form-control" value="1">`;
                filterInput.append(probability);
            } else if (selectedValue === 'Referred By') {
                var referred_by = ` <input type="text" name="referred_by" class="form-control">`;
                filterInput.append(referred_by);
            } else if (selectedValue === 'Salesperson') {
                var salesperson = ` <select name="salesperson" id="salesperson" class="form-control">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>`;
                filterInput.append(salesperson);
            } else if (selectedValue == 'source') {
                var source = ` <select name="salesperson" id="salesperson" class="form-control">
                    @foreach($Sources as $Source)
                        <option value="{{ $Source->id }}">{{ $Source->name }}</option>
                    @endforeach
                </select>`;
                filterInput.append(source);
            } else if (selectedValue == 'Stage') {
                var stage = ` <select name="stage" id="stage" class="form-control">
                    @foreach($CrmStages as $Stage)
                        <option value="{{ $Stage->id }}">{{ $Stage->title }}</option>
                    @endforeach
                </select>`;
                filterInput.append(stage);
            } else if (selectedValue == 'State') {
                var state = ` <select name="state" id="state" class="form-control">
                    @foreach($States as $State)
                        <option value="{{ $State->id }}">{{ $State->name }}</option>
                    @endforeach
                </select>`;
                filterInput.append(state);
            } else if (selectedValue == 'Street') {
                var street = ` <input type="text" name="street" class="form-control">`;
                filterInput.append(street);
            } else if (selectedValue == 'Street2') {
                var street2 = ` <input type="text" name="street2" class="form-control">`;
                filterInput.append(street2);
            } else if (selectedValue == 'type') {
                var title = `<select name="type" id="type" class="form-control">
                          <option value="Lead">Lead</option>
                        <option value="Opportunity">Opportunity</option> `;
                filterInput.append(title);
            } else if (selectedValue == 'Website') {
                var website = ` <input type="text" name="website" class="form-control">`;
                filterInput.append(website);
            } else if (selectedValue == 'Campaign') {
                var campaign = ` <select name="campaign" id="campaign" class="form-control">
                    @foreach($Campaigns as $Campaign)
                        <option value="{{ $Campaign->id }}">{{ $Campaign->name }}</option>
                    @endforeach
                </select>`;
                filterInput.append(campaign);
            } else if (selectedValue == 'City') {
                var City = ` <input type="text" name="City" id="City" class="form-control">`;
                filterInput.append(City);
            }
        });
    });

</script>


<script>
    $(document).on('click', '.lead-row', function() {
        var leadId = $(this).data('id');
        window.location.href = "{{ route('lead.create') }}/" + leadId;
    });

    function storeLead() {
        $.ajax({
            url: "{{ route('lead.storeLead') }}"
            , type: "POST"
            , data: {
                _token: "{{ csrf_token() }}"
            , }
            , success: function(response) {
                console.log('Lead stored successfully.', response);
            }
            , error: function(error) {
                console.error('Error storing lead:', error);
            }
        });
    }

    // Auto-refresh every 2 minutes
    setInterval(function() {
        console.log('Attempting to store lead...');
        storeLead();
    }, 2 * 60 * 1000);
    storeLead();

</script>
<script>
    $(document).ready(function() {
        // Show the dropdown when the input field is clicked
        $('#search-input').on('click', function() {
            $('#search-dropdown').show();
        });

        // Add selected value to the input field and hide the dropdown
        $(document).on('click', '#search-dropdown .o-dropdown-item', function() {
            // var selectedValue = $(this).text().trim();
            // $('#search-input').val(selectedValue);
            $('#search-dropdown').hide();
        });

        // Hide dropdown when clicking outside
        $(document).on('click', function(e) {
            if (!$(e.target).closest('#search-input, #search-dropdown').length) {
                $('#search-dropdown').hide();
            }
        });
    });

</script>




@endsection
