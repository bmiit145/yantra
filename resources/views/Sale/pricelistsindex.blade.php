@extends('layout.header')
@section('content')
@section('title', 'Sales')
@section('head_breadcrumb_title', 'Pricelists')
@section('head_new_btn_link', route('pricelists.create'))
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

    table.dataTable thead th,
    table.dataTable thead td {
        padding: 8px 10px;
        border-bottom: 1px solid #111;
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

    table.dataTable.stripe tbody tr.odd,
    table.dataTable.display tbody tr.odd {
        background-color: #f9f9f9;
    }

    tbody,
    td,
    tfoot,
    th,
    thead,
    tr {
        border-color: inherit;
        border-style: solid;
        border-width: 0;
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

    /* Button Styles */
    .btn {
        background-color: #007bff; /* Button color */
        color: white; /* Button text color */
        border: none;
        padding: 10px 15px;
        border-radius: 5px;
        cursor: pointer; /* Pointer on hover */
        transition: background-color 0.3s ease; /* Smooth transition */
    }

    .btn:hover {
        background-color: #0056b3; /* Darker shade on hover */
    }

    /* Modal Styles */
    #pricelistModal {
        display: none; /* Hide by default */
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto; /* Enable scroll if needed */
        background-color: rgba(0, 0, 0, 0.5); /* Overlay */
    }

    .modal-content {
        background-color: #fefefe; /* Modal background */
        margin: 15% auto; /* 15% from the top and centered */
        padding: 20px;
        border: 1px solid #888;
        width: 80%; /* Could be more or less, depending on screen size */
        border-radius: 5px;
    }

    /* Responsive Styles */
    @media (max-width: 768px) {
        .table {
            font-size: 14px; /* Smaller font on mobile */
        }

        .btn {
            width: 100%; /* Full-width buttons on mobile */
        }

        .modal-content {
            width: 90%; /* Make modal content smaller on mobile */
        }
    }
</style>


<div class="o_content">
    <div class="o_list_renderer o_renderer table-responsive" tabindex="-1">
        <table id="pricelistTable" class="o_list_table table table-sm table-hover position-relative mb-0 o_list_table_ungrouped table-striped" style="table-layout: fixed;">
            <thead>
                <tr>
                    <th class="o_list_record_selector o_list_controller align-middle pe-1 cursor-pointer" tabindex="-1" style="width: 40px;">
                        <div class="o-checkbox form-check d-flex m-0">
                            <input type="checkbox" class="form-check-input" id="select-all">
                            <label class="form-check-label" for="select-all"></label>
                        </div>
                    </th>
                    <th data-tooltip-delay="1000" tabindex="-1" data-name="sequence" class="align-middle o_column_sortable position-relative cursor-pointer o_list_number_th o_handle_cell opacity-trigger-hover w-print-auto" style="width: 29px;"></th>
                    <th data-tooltip-delay="1000" tabindex="-1" data-name="name" class="align-middle o_column_sortable position-relative cursor-pointer opacity-trigger-hover w-print-auto" style="width: 917px;">
                        <div class="d-flex" title="">
                            <span class="d-block min-w-0 text-truncate flex-grow-1">Pricelist Name</span>
                            <i class="fa fa-lg fa-angle-down opacity-0 opacity-75-hover"></i>
                        </div>
                    </th>
                    <th data-tooltip-delay="1000" tabindex="-1" data-name="country_group_ids" class="align-middle cursor-default o_many2many_tags_cell opacity-trigger-hover w-print-auto" style="width: 900px;">
                        <div class="d-flex" title="">
                            <span class="d-block min-w-0 text-truncate flex-grow-1">Country Groups</span>
                            <i class="d-none fa-angle-down opacity-0 opacity-75-hover"></i>
                        </div>
                    </th>
                    <th class="o_list_controller o_list_actions_header w-print-0 p-print-0 position-sticky end-0" style="width: 32px;">
                        <div class="o_optional_columns_dropdown d-print-none text-center border-top-0">
                            <button class="btn p-0 o-dropdown dropdown-toggle dropdown" tabindex="-1" aria-expanded="false">
                                <i class="o_optional_columns_dropdown_toggle oi oi-fw oi-settings-adjust"></i>
                            </button>
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody class="ui-sortable">
                @foreach ($pricelists as $pricelist)
                <tr class="o_data_row o_row_draggable pricelist-row" data-id="{{ $pricelist->id }}">
                    <td class="o_list_record_selector user-select-none" tabindex="-1">
                        <div class="o-checkbox form-check">
                            <input type="checkbox" class="form-check-input pricelist-checkbox" value="{{ $pricelist->id }}">
                            <label class="form-check-label" for="checkbox-comp-{{ $pricelist->id }}"></label>
                        </div>
                    </td>
                    <td class="o_data_cell cursor-pointer o_field_cell o_list_number o_handle_cell" data-tooltip-delay="1000" tabindex="-1" name="sequence">
                        <div name="sequence" class="o_field_widget o_field_handle">
                            <span class="o_row_handle oi oi-draggable ui-sortable-handle"></span>
                        </div>
                    </td>
                    <td class="o_data_cell cursor-pointer o_field_cell o_list_char o_required_modifier" data-tooltip-delay="1000" tabindex="-1" name="name" title="{{ $pricelist->pricelist_name }}">
                        {{ $pricelist->pricelist_name }}
                    </td>
                    <td class="o_data_cell cursor-pointer o_field_cell o_many2many_tags_cell" data-tooltip-delay="1000" tabindex="-1" name="country_group_ids">
                        <div name="country_group_ids" class="o_field_widget o_field_many2many_tags">
                            <div class="o_field_tags d-inline-flex flex-wrap gap-1 mw-100">
                                @if ($pricelist->getCountry)
                                <span class="o_tag position-relative d-inline-flex align-items-center user-select-none mw-100 o_badge badge rounded-pill lh-1 o_tag_color_0" tabindex="-1" title="{{ $pricelist->getCountry->name }}">
                                    <div class="o_tag_badge_text text-truncate">{{ $pricelist->getCountry->name }}</div>
                                </span>
                                @endif
                            </div>
                        </div>
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
            window.location.href = "{{ url('pricelists/new') }}/" + id; // Redirect to edit page
        });

        // Handle form submission for adding/updating pricelists
        $('#pricelistForm').on('submit', function(e) {
            e.preventDefault(); // Prevent default form submission

            // Serialize form data
            var formData = $(this).serialize();

            // AJAX request to store or update data
            $.ajax({
                url: "{{ route('pricelist.store.main') }}", // URL to the store route
                type: "POST",
                data: formData,
                success: function(response) {
                    alert(response.message);
                    var product = response.product;

                    // Update or append the row
                    var existingRow = $("tr[data-id='" + product.id + "']");
                    if (existingRow.length) {
                        // Update the existing row with new data
                        existingRow.find(".pricelist_name").text(product.pricelist_name);
                        existingRow.find(".country").text(product.country);

                    } else {
                        // Append new row if it doesn't exist
                        $('#pricelistTable tbody').append(
                            '<tr data-id="' + product.id + '" class="pricelist-row" style="cursor: pointer;">' +
                            '<td><input type="checkbox" class="pricelist-checkbox" value="' + product.id + '"></td>' +
                            '<td class="pricelist_name">' + product.pricelist_name + '</td>' +
                            '<td class="country">' + product.country + '</td>' +
                            '</tr>'
                        );
                    }

                    // Reset form after submission
                    $('#pricelistForm')[0].reset();
                    $('#pricelist_id').val('');
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
