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
            tabindex="0" title="" aria-checked="false">My Activities</span><span
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
            tabindex="0">Add Custom Filter</span>
    </div>
    <div class="o_dropdown_container o_group_by_menu w-100 w-lg-auto h-100 px-3 mb-4 mb-lg-0 border-end">
        <div class="px-3 fs-5 mb-2"><i class="me-2 text-action oi oi-group"></i>
            <h5 class="o_dropdown_title d-inline">Group By</h5>
        </div><span class="o-dropdown-item dropdown-item o-navigable o_menu_item text-truncate" role="menuitemcheckbox"
            tabindex="0" title="" aria-checked="false">Salesperson</span><span
            class="o-dropdown-item dropdown-item o-navigable o_menu_item text-truncate" role="menuitemcheckbox"
            tabindex="0" title="" aria-checked="false">Sales Team</span><span
            class="o-dropdown-item dropdown-item o-navigable o_menu_item text-truncate" role="menuitemcheckbox"
            tabindex="0" title="" aria-checked="false">City</span><span
            class="o-dropdown-item dropdown-item o-navigable o_menu_item text-truncate" role="menuitemcheckbox"
            tabindex="0" title="" aria-checked="false">Country</span><span
            class="o-dropdown-item dropdown-item o-navigable o_menu_item text-truncate" role="menuitemcheckbox"
            tabindex="0" title="" aria-checked="false">Campaign</span><span
            class="o-dropdown-item dropdown-item o-navigable o_menu_item text-truncate" role="menuitemcheckbox"
            tabindex="0" title="" aria-checked="false">Medium</span><span
            class="o-dropdown-item dropdown-item o-navigable o_menu_item text-truncate" role="menuitemcheckbox"
            tabindex="0" title="" aria-checked="false">Source</span>
        <div class="dropdown-divider" role="separator"></div>
        <div class="o_accordion position-relative"><button
                class="o_menu_item o_accordion_toggle dropdown-item o-navigable text-truncate" tabindex="0"
                aria-expanded="false">Creation Date</button></div>
        <div class="o_accordion position-relative"><button
                class="o_menu_item o_accordion_toggle dropdown-item o-navigable text-truncate" tabindex="0"
                aria-expanded="false">Closed Date</button></div>
        <div class="dropdown-divider" role="separator"></div>
        <div class="o_accordion position-relative"><button
                class="o_menu_item o_accordion_toggle dropdown-item o-navigable o_add_custom_group_menu text-truncate"
                tabindex="0" aria-expanded="false">Properties</button></div>
        <div role="separator" class="dropdown-divider"></div><select
            class="o_add_custom_group_menu o_menu_item dropdown-item">
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

<style>
    .dropdown-btn {
        background-color: #f1f1f1;
        border: none;
        cursor: pointer;
        padding: 10px;
        border-radius: 5px;
    }

    .hide-show-dropdown-menu{
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
                <label><input type="checkbox" data-column="5"> Title</label>
            </div>
            <div class="dropdown-checkbox">
                <label><input type="checkbox" data-column="6"> Tag</label>
            </div>
            <div class="dropdown-checkbox">
                <label><input type="checkbox" data-column="7"> Salesperson</label>
            </div>
            <div class="dropdown-checkbox">
                <label><input type="checkbox" data-column="8"> Sales Team</label>
            </div>
        </div>
        <table id="example" class="display nowrap">
            <thead>
                <tr>
                    <th>Lead</th>
                    <th>Email</th>
                    <th>City</th>
                    <th>state</th>
                    <th>Country</th>
                    <th>Title</th>
                    <th>Tag</th>
                    <th>Salesperson</th>
                    <th>Sales Team</th>

                </tr>
            </thead>
            <tbody>
                @foreach($data as $lead)
                    <tr data-id="{{ $lead->id ?? ''}}" class="lead-row">
                        <td>{{$lead->product_name ?? ''}}</td>
                        <td>{{$lead->email ?? ''}}</td>
                        <td>{{$lead->city ?? ''}}</td>
                        <td>{{$lead->getState->name ?? ''}}</td>
                        <td>{{$lead->getCountry->name ?? ''}}</td>
                        <td>{{$lead->getTilte->title ?? ''}}</td>
                        <td>
                            @foreach ($lead->getTag as $tag)
                                {{$tag->name ?? ''}}
                            @endforeach
                        </td>
                        <td>{{$lead->sales_person ?? ''}}</td>
                        <td>{{$lead->sales_team ?? ''}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>



<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
<script>
    $(document).ready(function () {
        var table = $('#example').DataTable({
            columnDefs: [
                { visible: false, targets: [2, 3, 4, 5, 6, 7, 8] } // Initial visibility settings
            ]
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
    });

</script>
<script>
    $(document).on('click', '.lead-row', function () {
        var leadId = $(this).data('id');
        window.location.href = "{{ route('lead.create') }}/" + leadId;
    });

    function storeLead() {
        $.ajax({
            url: "{{ route('lead.storeLead') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
            },
            success: function (response) {
                console.log('Lead stored successfully.', response);
            },
            error: function (error) {
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


@endsection