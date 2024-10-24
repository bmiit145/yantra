@extends('layout.header')
@section('content')
@section('title', 'Sales')
@section('head_breadcrumb_title', 'Sales Team')
@section('head_new_btn_link', route('salesteam.create'))
@section('image_url', asset('images/Sales.png'))
@section('navbar_menu')
    <li class="dropdown">
        <a href="#">Orders</a>
        <div class="dropdown-content">
            <a href="{{ route('orders.index') }}">Quotations</a>
            <a href="#">Orders</a>
            <a href="#">Sales Teams</a>
            <a href="{{ route('contact.index', ['tab' => 'customers']) }}">Customers</a>
        </div>
    </li>

    <li class="dropdown">
        <a href="#">To Invoice</a>
        <div class="dropdown-content">
            <!-- Dropdown content for Reporting -->
            <a href="#">Orders to Invoice</a>
            <a href="#">Orders to Upsell</a>
        </div>
    </li>
    <li class="dropdown">
        <a href="#">Products</a>
        <div class="dropdown-content">
            <a href="{{ route('product.index') }}">Products</a>
            <a href="{{ route('pricelists.index') }}">Pricelists</a>
        </div>
    </li>
    <li class="dropdown">
        <a href="#">Reporting</a>
        <div class="dropdown-content">
            <a href="#">Sales</a>
            <a href="#">Salespersons</a>
            <a href="#">Products</a>
            <a href="#">Customers</a>
        </div>
    </li>
    <li class="dropdown">
        <a href="#">Configuration</a>
        <div class="dropdown-content">
            <a href="#"><b>Settings</b></a>
            <a href="{{ route('salesteam.index') }}"><b>Sales Teams</b></a>
            <a href="#"><b>Sales Orders</b></a>
            <a href="#" style="margin-left: 15px;">Tags</a>
            <a href="#"><b>Product</b></a>
            <a href="{{ route('categories.index') }}">Product Category</a>
            <a href="#" style="margin-left: 15px;">Product Tags</a>
            <a href="#"><b>Online Pyament</b></a>
            <a href="#" style="margin-left: 15px;">Payment Provide</a>
            <a href="#" style="margin-left: 15px;">Payment Methods</a>
            <a href="#"><b>Activities</b></a>
            <a href="#" style="margin-left: 15px;">Activities Plans</a>
        </div>
    </li>
@endsection

<style>
     /* General Styles */
     body {
        font-family: Arial, sans-serif;
        background-color: #f8f9fa; /* Light background */
        margin: 0;
        padding: 20px;
    }

    /* Table Styles */
    .table {
        width: 100%;
        margin-bottom: 1rem;
        color: #212529;
        border-collapse: collapse;
    }

    th.sorting.sorting_asc {
        width: max-content !important;
    }

    th.sorting {
        width: 50% !important;
    }

    .ui-sortable {
        border-bottom: 1px solid #d8dadd !important;
    }

    table.dataTable tbody tr {
        background-color: #f9f9f9;
    }

    .table-responsive {
        overflow-x: auto;
    }

    .pricelist-row {
        cursor: move; /* Change cursor to indicate draggable rows */
    }

    .ui-state-highlight {
        height: 10px; /* Adjust height to match table rows */
        background-color: #cec7c7; /* Change to your preferred color */
        border: 1px dashed #e3dfdf; /* Optional: Add a border */
    }

    .crmright_head_main {
        display: none !important;
    }
</style>


<div class="o_content">
    <div class="o_list_renderer o_renderer table-responsive" tabindex="-1">
        <table id="salesteamTable"
            class="o_list_table table table-sm table-hover position-relative mb-0 o_list_table_ungrouped table-striped"
            style="table-layout: fixed;">
            <thead>
                <tr>
                    <th class="o_list_record_selector o_list_controller align-middle pe-1 cursor-pointer" tabindex="-1"
                        style="width: 40px;">
                        <div class="o-checkbox form-check d-flex m-0"><input type="checkbox" class="form-check-input"
                                id="checkbox-comp-46"><label class="form-check-label" for="checkbox-comp-46"></label>
                        </div>
                    </th>
                    <th data-tooltip-delay="1000" tabindex="-1" data-name="sequence"
                        class="align-middle o_column_sortable position-relative cursor-pointer o_list_number_th o_handle_cell opacity-trigger-hover w-print-auto"
                        style="width: 29px;"></th>
                    <th data-tooltip-delay="1000" tabindex="-1" data-name="name"
                        class="align-middle o_column_sortable position-relative cursor-pointer opacity-trigger-hover w-print-auto"
                        style="width: 333px;">
                        <div class="d-flex" data-tooltip-template="web.ListHeaderTooltip"
                            data-tooltip-info="{&quot;viewMode&quot;:&quot;list&quot;,&quot;resModel&quot;:&quot;crm.team&quot;,&quot;debug&quot;:false,&quot;field&quot;:{&quot;name&quot;:&quot;name&quot;,&quot;label&quot;:&quot;Sales Team&quot;,&quot;type&quot;:&quot;char&quot;,&quot;widget&quot;:null,&quot;context&quot;:&quot;{}&quot;,&quot;invisible&quot;:null,&quot;column_invisible&quot;:null,&quot;readonly&quot;:&quot;1&quot;,&quot;required&quot;:&quot;True&quot;,&quot;changeDefault&quot;:false}}">
                            <span class="d-block min-w-0 text-truncate flex-grow-1">Sales Team</span><i
                                class="fa fa-lg fa-angle-down opacity-0 opacity-75-hover"></i></div><span
                            class="o_resize position-absolute top-0 end-0 bottom-0 ps-1 bg-black-25 opacity-0 opacity-50-hover z-1"></span>
                    </th>
                    <th data-tooltip-delay="1000" tabindex="-1" data-name="alias_id"
                        class="align-middle o_column_sortable position-relative cursor-pointer opacity-trigger-hover w-print-auto"
                        style="width: 801px;">
                        <div class="d-flex" data-tooltip-template="web.ListHeaderTooltip"
                            data-tooltip-info="{&quot;viewMode&quot;:&quot;list&quot;,&quot;resModel&quot;:&quot;crm.team&quot;,&quot;debug&quot;:false,&quot;field&quot;:{&quot;name&quot;:&quot;alias_id&quot;,&quot;label&quot;:&quot;Alias&quot;,&quot;help&quot;:&quot;The email address associated with this channel. New emails received will automatically create new leads assigned to the channel.&quot;,&quot;type&quot;:&quot;many2one&quot;,&quot;widget&quot;:null,&quot;context&quot;:&quot;{}&quot;,&quot;domain&quot;:[],&quot;invisible&quot;:null,&quot;column_invisible&quot;:null,&quot;readonly&quot;:null,&quot;required&quot;:&quot;True&quot;,&quot;changeDefault&quot;:false,&quot;relation&quot;:&quot;mail.alias&quot;}}">
                            <span class="d-block min-w-0 text-truncate flex-grow-1">Alias</span><i
                                class="fa fa-lg fa-angle-down opacity-0 opacity-75-hover"></i></div><span
                            class="o_resize position-absolute top-0 end-0 bottom-0 ps-1 bg-black-25 opacity-0 opacity-50-hover z-1"></span>
                    </th>
                    <th data-tooltip-delay="1000" tabindex="-1" data-name="user_id"
                        class="align-middle o_column_sortable position-relative cursor-pointer o_many2one_avatar_user_cell opacity-trigger-hover w-print-auto"
                        style="width: 682px;">
                        <div class="d-flex" data-tooltip-template="web.ListHeaderTooltip"
                            data-tooltip-info="{&quot;viewMode&quot;:&quot;list&quot;,&quot;resModel&quot;:&quot;crm.team&quot;,&quot;debug&quot;:false,&quot;field&quot;:{&quot;name&quot;:&quot;user_id&quot;,&quot;label&quot;:&quot;Team Leader&quot;,&quot;type&quot;:&quot;many2one&quot;,&quot;widget&quot;:&quot;many2one_avatar_user&quot;,&quot;widgetDescription&quot;:&quot;Many2one&quot;,&quot;context&quot;:&quot;{}&quot;,&quot;domain&quot;:&quot;[('share', '=', False)]&quot;,&quot;invisible&quot;:null,&quot;column_invisible&quot;:null,&quot;readonly&quot;:null,&quot;required&quot;:null,&quot;changeDefault&quot;:false,&quot;relation&quot;:&quot;res.users&quot;}}">
                            <span class="d-block min-w-0 text-truncate flex-grow-1">Team Leader</span><i
                                class="fa fa-lg fa-angle-down opacity-0 opacity-75-hover"></i></div><span
                            class="o_resize position-absolute top-0 end-0 bottom-0 ps-1 bg-black-25 opacity-0 opacity-50-hover z-1"></span>
                    </th>
                    <th class="o_list_controller o_list_actions_header w-print-0 p-print-0 position-sticky end-0"
                        style="width: 32px;">
                        <div class="o_optional_columns_dropdown d-print-none text-center border-top-0"><button
                                class="btn p-0 o-dropdown dropdown-toggle dropdown" tabindex="-1"
                                aria-expanded="false"><i
                                    class="o_optional_columns_dropdown_toggle oi oi-fw oi-settings-adjust"></i></button>
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody class="ui-sortable">
                @foreach ($sales_teams as $teams)
                <tr class="o_data_row o_row_draggable pricelist-row" data-id="{{ $teams->id }}">
                    <td class="o_list_record_selector user-select-none" tabindex="-1">
                        <div class="o-checkbox form-check">
                            <input type="checkbox" class="form-check-input pricelist-checkbox" value="{{ $teams->id }}">
                            <label class="form-check-label" for="checkbox-comp-{{ $teams->id }}"></label>
                        </div>
                    </td>
                    <td class="o_data_cell cursor-pointer o_field_cell o_list_number o_handle_cell" data-tooltip-delay="1000" tabindex="-1" name="sequence">
                        <div name="sequence" class="o_field_widget o_field_handle">
                            <span class="o_row_handle oi oi-draggable ui-sortable-handle"></span>
                        </div>
                    </td>
                    <td class="o_data_cell cursor-pointer o_field_cell o_list_char o_required_modifier" data-tooltip-delay="1000" tabindex="-1" name="name" title="{{ $teams->name }}">
                        {{ $teams->name ?? ''}}
                    </td>
                    <td class="o_data_cell cursor-pointer o_field_cell o_list_char o_required_modifier" data-tooltip-delay="1000" tabindex="-1" name="name" title="{{ $teams->email }}">
                        {{ $teams->email ?? '' }}
                    </td>
                    <td class="o_data_cell cursor-pointer o_field_cell o_list_char o_required_modifier" data-tooltip-delay="1000" tabindex="-1" name="name" title="{{ $teams->team_leader }}">
                        {{ $teams->user->email ?? ''}}
                    </td>
                    <td tabindex="-1" class="w-print-0 p-print-0"></td>
                </tr>
                @endforeach
            </tbody>
            <tfoot class="o_list_footer cursor-default">
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="w-print-0 p-print-0"></td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">

<script>
    $(document).ready(function() {
        // Make table rows sortable
        $(".ui-sortable").sortable({
            cursor: 'move',
            axis: 'y',
            items: '> tr',
            placeholder: "ui-state-highlight",
        });

        // Select/Deselect all checkboxes when "select-all" is clicked
        $('#select-all').click(function() {
            $('input.pricelist-checkbox').prop('checked', this.checked);
        });

        // Check/uncheck "select-all" based on individual checkboxes
        $(document).on('change', 'input.pricelist-checkbox', function() {
            $('#select-all').prop('checked', $('input.pricelist-checkbox:checked').length === $('input.pricelist-checkbox').length);
        });

        // Prevent row click event when clicking checkbox
        $(document).on('click', 'input.pricelist-checkbox', function(event) {
            event.stopPropagation(); // Prevents the event from bubbling up to the row click
        });

     

        // Redirect to the edit page on row click
        $(document).on('click', '.pricelist-row', function() {
            var id = $(this).data('id');
            window.location.href = "{{ url('/salesteam/new') }}/" + id; // Redirect to edit page
        });

        // Handle form submission for adding/updating pricelists
        $('#pricelistForm').on('submit', function(e) {
            e.preventDefault(); // Prevent default form submission

            // Serialize form data
            var formData = $(this).serialize();

            // AJAX request to store or update data
            $.ajax({
                url: "{{ route('salesteam.store') }}", // URL to the store route
                type: "POST",
                data: formData,
                success: function(response) {
                    alert(response.message);
                    var salesTeam = response.salesTeam;

                    // Update or append the row
                    var existingRow = $("tr[data-id='" + salesTeam.id + "']");
                    //dd(existingRow);
                    if (existingRow.length) {
                        // Update the existing row with new data
                        existingRow.find(".name").text(salesTeam.pricelist_name);
                        existingRow.find(".email").text(salesTeam.country);
                        existingRow.find(".user").text(salesTeam.country);

                    } else {
                        // Append new row if it doesn't exist
                        $('#salesteamTable tbody').append(
                            '<tr data-id="' + salesTeam.id + '" class="pricelist-row" style="cursor: pointer;">' +
                            '<td><input type="checkbox" class="pricelist-checkbox" value="' + salesTeam.id + '"></td>' +
                            '<td class="name">' + salesTeam.name + '</td>' +
                            '<td class="email">' + salesTeam.email + '</td>' +
                            '<td class="user">' + salesTeam.user + '</td>' +
                            '</tr>'
                        );
                    }

                    // Reset form after submission
                    $('#pricelistForm')[0].reset();
                    $('#team_id').val('');
                    $('#pricelistModal').hide(); // Hide the modal after submission
                },
                error: function() {
                    alert("Error occurred while saving the pricelist.");
                }
            });
        });

        // Open modal for adding/editing
        $('#openModalButton').click(function() {
            $('#pricelistModal').show();
        });

        // Close modal
        $('.close').click(function() {
            $('#pricelistModal').hide();
        });

        // Close modal when clicking outside of it
        $(window).click(function(event) {
            if (event.target == document.getElementById('pricelistModal')) {
                $('#pricelistModal').hide();
            }
        });
    });
</script>


@endsection

