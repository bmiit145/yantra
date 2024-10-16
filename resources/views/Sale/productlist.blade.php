@extends('layout.header')

<!-- Define Title and Breadcrumbs for the Page -->
@section('content')
@section('title', 'Sales')
@section('head_breadcrumb_title', 'Pricelists')
@section('head_new_btn_link', route('pricelists.create'))
@section('image_url', asset('images/Sales.png'))



<!-- Button to trigger modal for selecting columns in the products table -->
<button id="showColumnsBtn" class="btn btn-primary float-right" style="margin: 10px;">Show/Hide Columns</button>

<!-- Modal for selecting columns to show/hide -->
<div id="columnsModal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Select Columns to Show/Hide</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="columnsForm">
                    @foreach($columns as $column)
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="col_{{ $column }}" value="{{ $column }}" checked>
                            <label class="form-check-label" for="col_{{ $column }}">{{ ucwords(str_replace('_', ' ', $column)) }}</label>
                        </div>
                    @endforeach
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="applyColumns">Apply</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Products Table -->
<div class="card" style="padding: 1%">
    <div class="table-responsive text-nowrap">
        <table id="products_table" class="display nowrap">
            <thead>
                <tr>
                    <th data-column="id">Product ID</th>
                    <th data-column="name">Product Name</th>
                    <th data-column="image">Product Image</th>
                    <th data-column="product_type">Product Type</th>
                    <th data-column="track_inventory">Cost Price</th>
                    <th data-column="create on order">Barcode</th>
                    <th data-column="invoicing_policy">HSN/SAC Code</th>
                    <th data-column="plan_servies">Plan Servies</th>
                    <th data-column="sales_price">Sales Price</th>
                    <th data-column="cost_price">Cost Price</th>
                    <th data-column="reference">Reference</th>
                    <th data-column="barcode">Barcode</th>
                    <th data-column="hsn_sac_code">HSN/SAC Code</th>
                    <th data-column="internal_note">Internal Note</th>
                    <th data-column="optional_product">Optional Product</th>
                    <th data-column="sales_des">Sales Description</th>
                    <th data-column="manufacture">Manufacture</th>
                    <th data-column="weight">Weight</th>
                    <th data-column="volume">Volume</th>
                    <th data-column="customer_lead_time">Customer Lead Time</th>
                    <th data-column="res_des">Reciver Descriptions</th>
                    <th data-column="del_des">Delivery Descriptions</th>
                    <th data-column="income_ac">Income Account</th>
                    <th data-column="expense_ac">Expense Account</th>
                    <th data-column="invoicing_policy_service_id">Invoice Policy Service</th>
                    <th data-column="sales_tax_id">Sales Tax</th>
                    <th data-column="purchase_taxes">Purchase Tax</th>
                    <th data-column="category_id">Product Category</th>
                    <th data-column="tags_id">Tags ID</th>
                </tr>
            </thead>
            <tbody id="products_body">
                @foreach($products as $product)
                    <tr>
                        <td data-column="id">{{ $product->id }}</td>
                        <td data-column="name">{{ $product->name }}</td>
                        <td data-column="image">
                            <img src="{{ file_exists(public_path($product->image)) ? asset($product->image) : asset('images/placeholder.png') }}" alt="Product Image" width="50" height="50">
                        </td>
                        <td data-column="product_type">{{ $product->product_type }}</td>
                        <td data-column="track_inventory">{{ $product->track_inventory ? $product->cost_price : 'N/A' }}</td>
                        <td data-column="create on order">{{ $product->barcode }}</td>
                        <td data-column="invoicing_policy">{{ $product->invoicing_policy }}</td>
                        <td data-column="plan_servies">{{ $product->plan_services }}</td>
                        <td data-column="sales_price">{{ $product->sales_price }}</td>
                        <td data-column="cost_price">{{ $product->cost_price }}</td>
                        <td data-column="reference">{{ $product->reference }}</td>
                        <td data-column="barcode">{{ $product->barcode }}</td>
                        <td data-column="hsn_sac_code">{{ $product->hsn_sac_code }}</td>
                        <td data-column="internal_note">{{ $product->internal_note }}</td>
                        <td data-column="optional_product">{{ $product->optional_product }}</td>
                        <td data-column="sales_des">{{ $product->sales_description }}</td>
                        <td data-column="manufacture">{{ $product->manufacture }}</td>
                        <td data-column="weight">{{ $product->weight }}</td>
                        <td data-column="volume">{{ $product->volume }}</td>
                        <td data-column="customer_lead_time">{{ $product->customer_lead_time }}</td>
                        <td data-column="res_des">{{ $product->receiver_description }}</td>
                        <td data-column="del_des">{{ $product->delivery_description }}</td>
                        <td data-column="income_ac">{{ $product->income_account }}</td>
                        <td data-column="expense_ac">{{ $product->expense_account }}</td>
                        <td data-column="invoicing_policy_service_id">{{ $product->invoicing_policy_service_id }}</td>
                        <td data-column="sales_tax_id">{{ $product->sales_tax_id }}</td>
                        <td data-column="purchase_taxes">{{ $product->purchase_taxes }}</td>
                        <td data-column="category_id">{{ $product->category_id }}</td>
                        <td data-column="tags_id">{{ $product->tags_id }}</td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- jQuery and DataTables Scripts for Both Tables -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

<script>
    $(document).ready(function() {
        // Initialize DataTables for both pricelists and products tables
        $('#pricelists_table').DataTable();
        $('#products_table').DataTable();

        // Show the modal for column selection when the button is clicked
        $('#showColumnsBtn').on('click', function() {
            $('#columnsModal').modal('show');
        });

        // Apply the selected columns to the products table
        $('#applyColumns').on('click', function() {
            $('#columnsModal').modal('hide');
            $('th, td').each(function() {
                var column = $(this).data('column');
                if ($('#col_' + column).is(':checked')) {
                    $('[data-column="' + column + '"]').show();
                } else {
                    $('[data-column="' + column + '"]').hide();
                }
            });
        });
    });
</script>

<!-- Include Bootstrap CSS and JS for Modal -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

@endsection
