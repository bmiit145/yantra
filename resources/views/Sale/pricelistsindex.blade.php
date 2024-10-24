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

@section('setting_menu')

    <div role="separator" class="dropdown-divider"></div>
    <a href="{{route('lead.importlead')}}" class="o-dropdown-item dropdown-item o-navigable o_menu_item mark_lost_lead" role="menuitem" tabindex="0"><i class= "fa fa-fw fa-download me-1"></i>Import records </a>
    <a href="{{route('lead.exportLead')}}" class="o-dropdown-item dropdown-item o-navigable o_menu_item send_mail_lead" role="menuitem" tabindex="0"><i class="fa fa-fw fa-upload me-1"></i>Export All </a>
    
       

        
@endsection
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css"
    href="https://cdn.datatables.net/colreorder/1.3.2/css/colReorder.dataTables.min.cssive.dataTables.min.css">
<style>
 .o_form_button_save {
    display: none;
 }

 .dropdown-menu-setting {
        display: none;
        position: absolute;
        background-color: #F9F9F9;
        min-width: auto;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
        top: auto;
        left: auto;
        border: 1px solid rgba(0, 0, 0, .15);
        border-radius: .25rem;
    }
    .dropdown-menu-setting.show {
        display: block !important;
    }

    .dropdown-menu-setting a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        cursor: pointer;
    }
        .head_breadcrumb_info{
        gap : 0px !important;
    }
    .redirect-button{
        display: none;
    }
    .crm_head_leftside{
        gap: 7px;
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

</style>


<div class="card" style="padding: 1%">
    <div class="table-responsive text-nowrap">

        <table id="example" class="stripe row-border order-column" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Pricelist Name</th>
                    <th>Country Groups</th>
                    
                  
                </tr>
            </thead>
            <tbody id="lead-table-body">
                 @foreach ($pricelists as $pricelist)
                    <tr class="pricelist-row" data-id="{{$pricelist->id}}" data-index="{{$loop->index + 1}}" style="cursor: pointer;">
                        <td>  {{ $pricelist->pricelist_name }}</td>
                        <td>  @if ($pricelist->getCountry)
                                <span class="o_tag position-relative d-inline-flex align-items-center user-select-none mw-100 o_badge badge rounded-pill lh-1 o_tag_color_0" tabindex="-1" title="{{ $pricelist->getCountry->name }}">
                                    <div class="o_tag_badge_text text-truncate">{{ $pricelist->getCountry->name }}</div>
                                </span>
                                @endif
                        </td>
                        
                    </tr>
                  @endforeach
            </tbody>
        </table>

    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- DataTables JS -->
<script type="text/javascript" charset="utf8"
    src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" charset="utf8"
    src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://legacy.datatables.net/extras/thirdparty/ColReorderWithResize/ColReorderWithResize.js"></script>

{{-- <script>
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
</script> --}}

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

          $(document).on('click', '.pricelist-row', function() {
            var id = $(this).data('id');
            window.location.href = "{{ url('pricelists/new') }}/" + id; // Redirect to edit page
        });
  });
</script>


@endsection
