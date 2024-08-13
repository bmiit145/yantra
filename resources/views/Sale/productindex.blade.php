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

<div class="o_content">
    <div
        class="o_kanban_renderer o_renderer d-flex o_kanban_ungrouped align-content-start flex-wrap justify-content-start">
        <article class="o_kanban_record d-flex cursor-pointer flex-grow-1 flex-md-shrink-1 flex-shrink-0 flex-row"
            data-id="datapoint_2" tabindex="0">
            <main class="pe-2">
                <div class="mb-1">
                    <div class="d-flex mb-0 h5">
                        <div name="is_favorite" class="o_field_widget o_field_boolean_favorite me-1">
                            <div class="o_favorite"><a href="#"><i role="img" class="fa fa-star-o me-1"
                                        title="Add to Favorites" aria-label="Add to Favorites"></i></a></div>
                        </div><span>Booking Fees</span>
                    </div>
                </div><span> Price: <div name="list_price" class="o_field_widget o_field_monetary">
                        <span>₹&nbsp;50.00</span></div></span>
                <div name="product_properties" class="o_field_widget o_field_properties">
                    <div class="w-100 fw-normal text-muted"></div>
                </div>
            </main>
            <aside>
                <div name="image_128" class="o_field_widget o_readonly_modifier o_field_image">
                    <div class="d-inline-block position-relative opacity-trigger-hover"><img loading="lazy"
                            class="img img-fluid w-100 object-fit-contain" alt="Product"
                            src="https://yantra-design2.odoo.com/web/image/product.template/1/image_128?unique=1722403961000"
                            name="image_128" style=""></div>
                </div>
            </aside>
        </article>
        <article class="o_kanban_record d-flex cursor-pointer flex-grow-1 flex-md-shrink-1 flex-shrink-0 flex-row"
            data-id="datapoint_4" tabindex="0">
            <main class="pe-2">
                <div class="mb-1">
                    <div class="d-flex mb-0 h5">
                        <div name="is_favorite" class="o_field_widget o_field_boolean_favorite me-1">
                            <div class="o_favorite"><a href="#"><i role="img" class="fa fa-star-o me-1"
                                        title="Add to Favorites" aria-label="Add to Favorites"></i></a></div>
                        </div><span>Down Payment (POS)</span>
                    </div>
                </div><span> Price: <div name="list_price" class="o_field_widget o_field_empty o_field_monetary">
                        <span>₹&nbsp;0.00</span></div></span>
                <div name="product_properties" class="o_field_widget o_field_properties">
                    <div class="w-100 fw-normal text-muted"></div>
                </div>
            </main>
            <aside>
                <div name="image_128" class="o_field_widget o_readonly_modifier o_field_image">
                    <div class="d-inline-block position-relative opacity-trigger-hover"><img loading="lazy"
                            class="img img-fluid w-100 object-fit-contain" alt="Product"
                            src="/web/static/img/placeholder.png" name="image_128" style=""></div>
                </div>
            </aside>
        </article>
        <article class="o_kanban_record d-flex cursor-pointer flex-grow-1 flex-md-shrink-1 flex-shrink-0 flex-row"
            data-id="datapoint_6" tabindex="0">
            <main class="pe-2">
                <div class="mb-1">
                    <div class="d-flex mb-0 h5">
                        <div name="is_favorite" class="o_field_widget o_field_boolean_favorite me-1">
                            <div class="o_favorite"><a href="#"><i role="img" class="fa fa-star-o me-1"
                                        title="Add to Favorites" aria-label="Add to Favorites"></i></a></div>
                        </div><span>Field Service</span>
                    </div>
                </div><span> Price: <div name="list_price" class="o_field_widget o_field_monetary">
                        <span>₹&nbsp;100.00</span></div></span>
                <div name="product_properties" class="o_field_widget o_field_properties">
                    <div class="w-100 fw-normal text-muted"></div>
                </div>
            </main>
            <aside>
                <div name="image_128" class="o_field_widget o_readonly_modifier o_field_image">
                    <div class="d-inline-block position-relative opacity-trigger-hover"><img loading="lazy"
                            class="img img-fluid w-100 object-fit-contain" alt="Product"
                            src="https://yantra-design2.odoo.com/web/image/product.template/5/image_128?unique=1722403961000"
                            name="image_128" style=""></div>
                </div>
            </aside>
        </article>
        <article class="o_kanban_record d-flex cursor-pointer flex-grow-1 flex-md-shrink-1 flex-shrink-0 flex-row"
            data-id="datapoint_8" tabindex="0">
            <main class="pe-2">
                <div class="mb-1">
                    <div class="d-flex mb-0 h5">
                        <div name="is_favorite" class="o_field_widget o_field_boolean_favorite me-1">
                            <div class="o_favorite"><a href="#"><i role="img" class="fa fa-star-o me-1"
                                        title="Add to Favorites" aria-label="Add to Favorites"></i></a></div>
                        </div><span>Service on Timesheets</span>
                    </div>
                </div><span> Price: <div name="list_price" class="o_field_widget o_field_monetary">
                        <span>₹&nbsp;40.00</span></div></span>
                <div name="product_properties" class="o_field_widget o_field_properties">
                    <div class="w-100 fw-normal text-muted"></div>
                </div>
            </main>
            <aside>
                <div name="image_128" class="o_field_widget o_readonly_modifier o_field_image">
                    <div class="d-inline-block position-relative opacity-trigger-hover"><img loading="lazy"
                            class="img img-fluid w-100 object-fit-contain" alt="Product"
                            src="https://yantra-design2.odoo.com/web/image/product.template/4/image_128?unique=1722403961000"
                            name="image_128" style=""></div>
                </div>
            </aside>
        </article>
        <article class="o_kanban_record d-flex cursor-pointer flex-grow-1 flex-md-shrink-1 flex-shrink-0 flex-row"
            data-id="datapoint_10" tabindex="0">
            <main class="pe-2">
                <div class="mb-1">
                    <div class="d-flex mb-0 h5">
                        <div name="is_favorite" class="o_field_widget o_field_boolean_favorite me-1">
                            <div class="o_favorite"><a href="#"><i role="img" class="fa fa-star-o me-1"
                                        title="Add to Favorites" aria-label="Add to Favorites"></i></a></div>
                        </div><span>Tips</span>
                    </div><span> [<span>TIPS</span>] </span>
                </div><span> Price: <div name="list_price" class="o_field_widget o_field_monetary">
                        <span>₹&nbsp;1.00</span></div></span>
                <div name="product_properties" class="o_field_widget o_field_properties">
                    <div class="w-100 fw-normal text-muted"></div>
                </div>
            </main>
            <aside>
                <div name="image_128" class="o_field_widget o_readonly_modifier o_field_image">
                    <div class="d-inline-block position-relative opacity-trigger-hover"><img loading="lazy"
                            class="img img-fluid w-100 object-fit-contain" alt="Product"
                            src="/web/static/img/placeholder.png" name="image_128" style=""></div>
                </div>
            </aside>
        </article>
        <div class="o_kanban_record o_kanban_ghost flex-grow-1 flex-md-shrink-1 flex-shrink-0 my-0"></div>
        <div class="o_kanban_record o_kanban_ghost flex-grow-1 flex-md-shrink-1 flex-shrink-0 my-0"></div>
        <div class="o_kanban_record o_kanban_ghost flex-grow-1 flex-md-shrink-1 flex-shrink-0 my-0"></div>
        <div class="o_kanban_record o_kanban_ghost flex-grow-1 flex-md-shrink-1 flex-shrink-0 my-0"></div>
        <div class="o_kanban_record o_kanban_ghost flex-grow-1 flex-md-shrink-1 flex-shrink-0 my-0"></div>
        <div class="o_kanban_record o_kanban_ghost flex-grow-1 flex-md-shrink-1 flex-shrink-0 my-0"></div>
    </div>
</div>

@endsection
