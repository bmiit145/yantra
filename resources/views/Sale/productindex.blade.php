@extends('layout.header')
@section('content')
@section('title', 'Sales')
@section('head_breadcrumb_title', 'Products')
@section('head_new_btn_link', route('product.create'))
@section('image_url', asset('images/Sales.png'))

@section('head')
    @vite(['resources/css/productindex.css'])
@endsection
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
            <a href="{{route('product.index')}}">Products</a>
            <a href="{{route('pricelists.index')}}">Pricelists</a>
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


@section('content')
<style>
    body .o_kanban_renderer.o_kanban_ungrouped .o_kanban_record,
    body .o_kanban_renderer.o_kanban_ungrouped .o_kanban_record {
        width: calc(20% - 16px) !important;
        margin: calc(var(--KanbanRecord-margin-v) * 0.5) var(--KanbanRecord-margin-h);
        max-width: calc(20% - 16px) !important;
        padding: 8px !important;
    }

</style>
<div class="o_content">
    <div class="o_kanban_renderer o_renderer d-flex o_kanban_ungrouped align-content-start flex-wrap justify-content-start">
        @foreach ($products as $product)
            <article class="o_kanban_record d-flex cursor-pointer flex-grow-1 flex-md-shrink-1 flex-shrink-0 flex-row product-item" 
                data-id="{{ $product->id }}" tabindex="0">
                <main class="pe-2">
                    <div class="mb-1">
                        <div class="d-flex mb-0 h5">
                            <span class="product-name">{{ $product->name }}</span>
                        </div>
                    </div>
                    <span>Price: 
                        <div name="list_price" class="o_field_widget o_field_monetary">
                            <span class="product-price">₹&nbsp;{{ $product->sales_price }}</span>
                        </div>
                    </span>
                     <!-- Conditionally show the reference only if it's not empty -->
                     @if (!empty($product->reference))
                        <div class="product-reference">Reference: {{ $product->reference }}</div>
                    @endif

                    <!-- Conditionally display cost price if track_inventory is enabled -->
                    @if ($product->track_inventory)
                        <div class="product-cost-price">Cost Price: ₹&nbsp;{{ $product->cost_price }}</div>
                    @endif
                </main>
                <aside>
                    <div name="image_128" class="o_field_widget o_readonly_modifier o_field_image">
                        <div class="d-inline-block position-relative opacity-trigger-hover">
                            <img loading="lazy" class="img img-fluid product-image" 
                                alt="product-image" 
                                src="{{ file_exists(public_path($product->image)) ? asset($product->image) : asset('images/placeholder.png') }}">
                        </div>
                    </div>
                </aside>
            </article>
        @endforeach
    </div>
</div>

<!-- jQuery for handling AJAX requests -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    // When a product is clicked
    $(document).on('click', '.product-item', function () {
        var productId = $(this).data('id'); // Get the product ID

        // AJAX call to fetch product data
        $.ajax({
            url: '{{ route("product.index") }}', // URL to the Laravel route
            type: 'GET',
            data: { id: productId }, // Send product ID
            success: function(response) {
                // Check if the response contains product data
                if (!response.error) {
                    // Update the HTML with the fetched product data
                    $('.product-name').text(response.name); // Update product name
                    $('.product-price').html('₹&nbsp;' + response.sales_price); // Update product price
                    $('.product-image').attr('src', response.image); // Update product image
                    $('.product-reference').text('Reference: ' + response.reference); // Update reference
                    
                    // Show cost price only if track_inventory is enabled
                    if (response.track_inventory) {
                        $('.product-cost-price').show().html('Cost Price: ₹&nbsp;' + response.cost_price);
                    } else {
                        $('.product-cost-price').hide();
                    }
                } else {
                    console.log(response.error); // Handle error case
                }
            },
            error: function(error) {
                console.log('Error fetching product data:', error);
            }
        });
    });
});
</script>

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

@endsection
