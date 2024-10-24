@extends('layout.header')
@section('content')
@section('title', 'Sales')
@section('head_breadcrumb_title')
    <a href="{{ route('categories.index') }}">Product Categories</a>
    <br>
    <small>New</small>
@endsection

@vite(['resources/css/salesadd.css'])
@section('head_new_btn_link', route('categories.create'))
@section('image_url', asset('images/Sales.png'))
@section('navbar_menu')
<li class="dropdown">
    <a href="#">Orders</a>
    <div class="dropdown-content">
        <a href="{{ route('quotations.index') }}">Quotations</a>
        <a href="{{ route('orders.index') }}">Orders</a>
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
    select#removal_strategy_id_0 {
    border: none;
}

</style>
<div class="o_action_manager">
    <div class="o_xxl_form_view h-100 o_form_view oe_form_configuration o_view_controller o_action">
        <div class="o_form_view_container">
            <div class="o_content">
                <div class="o_form_renderer o_form_editable d-flex d-print-block flex-nowrap h-100">
                    <div class="o_form_sheet_bg">
                        <div class="o_form_sheet position-relative">
                            <div class="oe_title"><label class="o_form_label o_field_invalid"
                                    for="name_0">Category</label>
                                <h1>
                                    <div name="name"
                                        class="o_field_widget o_required_modifier o_field_char o_field_invalid"><input
                                            class="o_input" id="name_0" type="text" autocomplete="off"
                                            placeholder="e.g. Lamps" style="width: 700px; height: 50px; font-size: 25px; padding: 10px; "></div>
                                </h1>
                            </div>
                            <div class="o_inner_group grid">
                                <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                    <div
                                        class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                        <label class="o_form_label" for="parent_id_0">Parent Category</label></div>
                                    <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                        style="width: 100%;">
                                        <div name="parent_id" class="o_field_widget o_field_many2one oe_inline">
                                            <div class="o_field_many2one_selection">
                                                <div class="o_input_dropdown">
                                                    <div class="o-autocomplete dropdown">
                                                        <select class="o-autocomplete--input o_input"
                                                            id="partner_id_0" style="width: 350px">
                                                            <option value="">Type to find a Category...
                                                            </option>
                                                            @foreach ($category as $cat)
                                                                <option value="{{ $cat->id }}">
                                                                    {{ $cat->categories_name }}</option>
                                                            @endforeach    
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="o_field_many2one_extra"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="o_group row align-items-start">
                                <div class="o_inner_group grid col-lg-6">
                                    <div class="g-col-sm-2">
                                        <div class="o_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">
                                            Logistics
                                        </div>
                                    </div>
                                    <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                        <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                            <label class="o_form_label" for="removal_strategy_id_0">Force Removal Strategy
                                                <sup class="text-info p-1" data-tooltip-template="web.FieldTooltip"
                                                    data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;Set a specific removal strategy that will be used regardless of the source location for this product category.\n\nFIFO: products/lots that were stocked first will be moved out first.\nLIFO: products/lots that were stocked last will be moved out first.\nClosest location: products/lots closest to the target location will be moved out first.\nFEFO: products/lots with the closest removal date will be moved out first (the availability of this method depends on the \&quot;Expiration Dates\&quot; setting).\nLeast Packages: FIFO but with the least number of packages possible when there are several packages containing the same product.&quot;}}"
                                                    data-tooltip-touch-tap-to-show="true">?</sup>
                                            </label>
                                        </div>
                                        <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                            <div name="property_cost_method" class="o_field_widget o_required_modifier o_field_selection">
                                                <select id="removal_strategy_id_0" class="o_input pe-3">
                                                    <option value="">-- Select Removal Strategy --</option>
                                                    <option value="fifo">First In First Out (FIFO)</option>
                                                    <option value="lifo">Last In First Out (LIFO)</option>
                                                    <option value="closest_location">Closest Location</option>
                                                    <option value="least_packages">Least Packages</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>                                
                                <div class="o_inner_group grid col-lg-6">
                                    <div class="g-col-sm-2">
                                        <div class="o_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">
                                            Inventory Valuation</div>
                                    </div>
                                    <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                        <div
                                            class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                            <label class="o_form_label" for="property_cost_method_0">Costing
                                                Method<sup class="text-info p-1"
                                                    data-tooltip-template="web.FieldTooltip"
                                                    data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;Standard Price: The products are valued at their standard cost defined on the product.\n        Average Cost (AVCO): The products are valued at weighted average cost.\n        First In First Out (FIFO): The products are valued supposing those that enter the company first will also leave it first.\n        &quot;}}"
                                                    data-tooltip-touch-tap-to-show="true">?
                                                </sup>
                                            </label>
                                        </div>
                                        <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break"
                                            style="width: 100%;">
                                            <div name="property_cost_method"
                                                class="o_field_widget o_required_modifier o_field_selection"><select
                                                    class="o_input pe-3" id="property_cost_method_0">
                                                    <option value="&quot;standard&quot;">Standard Price</option>
                                                    <option value="&quot;fifo&quot;">First In First Out (FIFO)</option>
                                                    <option value="&quot;average&quot;">Average Cost (AVCO)</option>
                                                </select></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="o_inner_group grid"></div>
                        </div>
                    </div>
                    <div class="o-mail-ChatterContainer o-mail-Form-chatter o-aside w-print-100">
                        <div
                            class="o-mail-Chatter w-100 h-100 flex-grow-1 d-flex flex-column overflow-auto o-chatter-disabled">
                            <div class="o-mail-Chatter-top d-print-none position-sticky top-0">
                                <div class="o-mail-Chatter-topbar d-flex flex-shrink-0 flex-grow-0 overflow-x-auto">
                                    <button class="o-mail-Chatter-sendMessage btn text-nowrap me-1 btn-primary my-2"
                                        data-hotkey="m" style="position: relative;"> Send message </button><button
                                        class="o-mail-Chatter-logNote btn text-nowrap me-1 btn-secondary my-2"
                                        data-hotkey="shift+m" style="position: relative;"> Log note </button>
                                    <div class="flex-grow-1 d-flex"><span
                                            class="o-mail-Chatter-topbarGrow flex-grow-1 pe-2"></span><button
                                            class="btn btn-link text-action" aria-label="Search Messages"
                                            title="Search Messages"><i class="oi oi-search"
                                                role="img"></i></button><span style="display:contents"><button
                                                class="o-mail-Chatter-attachFiles btn btn-link text-action px-1 d-flex align-items-center my-2"
                                                aria-label="Attach files"><i
                                                    class="fa fa-paperclip fa-lg me-1"></i></button></span><input
                                            type="file" class="o_input_file d-none o-mail-Chatter-fileUploader"
                                            multiple="multiple" accept="*">
                                        <div class="o-mail-Followers d-flex me-1"><button
                                                class="o-mail-Followers-button btn btn-link d-flex align-items-center text-action px-1 my-2 o-dropdown dropdown-toggle dropdown"
                                                disabled="" title="Show Followers" aria-expanded="false"><i
                                                    class="fa fa-user-o me-1" role="img"></i><sup
                                                    class="o-mail-Followers-counter">0</sup></button></div><button
                                            class="o-mail-Chatter-follow btn btn-link  px-0 text-600">
                                            <div class="position-relative"><span
                                                    class="d-flex invisible text-nowrap">Following</span><span
                                                    class="position-absolute end-0 top-0"> Follow </span></div>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="o-mail-Chatter-content">
                                <div class="o-mail-Thread position-relative flex-grow-1 d-flex flex-column overflow-auto pb-4"
                                    tabindex="-1">
                                    <div class="d-flex flex-column position-relative flex-grow-1"><span
                                            class="position-absolute w-100 invisible top-0"
                                            style="height: Min(1035px, 100%)"></span><span
                                            style="height: 1px;"></span>
                                        <div
                                            class="o-mail-DateSection d-flex align-items-center w-100 fw-bold z-1 pt-2">
                                            <hr class="o-discuss-separator flex-grow-1"><span
                                                class="px-2 smaller text-muted">Today</span>
                                            <hr class="o-discuss-separator flex-grow-1">
                                        </div>
                                        <div class="o-mail-Message position-relative pt-1 o-selfAuthored mt-1"
                                            role="group" aria-label="System notification">
                                            <div class="o-mail-Message-core position-relative d-flex flex-shrink-0">
                                                <div
                                                    class="o-mail-Message-sidebar d-flex flex-shrink-0 align-items-start justify-content-start">
                                                    <div class="o-mail-Message-avatarContainer position-relative bg-view cursor-pointer"
                                                        aria-label="Open card"><img
                                                            class="o-mail-Message-avatar w-100 h-100 rounded o_object_fit_cover o_redirect cursor-pointer"
                                                            src="https://yantra-design6.odoo.com/web/image/res.partner/3/avatar_128?unique=1729567210000">
                                                    </div>
                                                </div>
                                                <div class="w-100 o-min-width-0">
                                                    <div
                                                        class="o-mail-Message-header d-flex flex-wrap align-items-baseline lh-1 mb-1">
                                                        <span
                                                            class="o-mail-Message-author small cursor-pointer o-hover-text-underline"
                                                            aria-label="Open card"><strong
                                                                class="me-1">info@yantradesign.co.in</strong></span><small
                                                            class="o-mail-Message-date text-muted smaller"
                                                            title="24/10/2024, 9:53:14 am">- 8 minutes ago</small>
                                                    </div>
                                                    <div class="position-relative d-flex">
                                                        <div class="o-mail-Message-content o-min-width-0">
                                                            <div
                                                                class="o-mail-Message-textContent position-relative d-flex">
                                                                <div>
                                                                    <div>
                                                                        <div
                                                                            class="o-mail-Message-body text-break mb-0 w-100">
                                                                            Creating a new record...</div>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="o-mail-Message-actions d-print-none ms-2 mt-1 invisible">
                                                                    <div class="d-flex rounded-1 overflow-hidden">
                                                                        <button
                                                                            class="btn px-1 py-0 lh-1 rounded-0 rounded-start-1"
                                                                            tabindex="1" title="Add a Reaction"
                                                                            aria-label="Add a Reaction"><i
                                                                                class="oi fa-lg oi-smile-add"></i></button><button
                                                                            class="btn px-1 py-0 rounded-0 rounded-end-1"
                                                                            title="Mark as Todo" name="toggle-star"><i
                                                                                class="fa fa-lg fa-star-o"></i></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="o-main-components-container">
<div class="o-mail-ChatHub">
    <div class="o-mail-ChatHub-bubbles position-fixed end-0 d-flex flex-column align-content-start justify-content-end align-items-center bottom-0"
        style="">
        <div class="d-flex flex-column align-content-start justify-content-end align-items-center gap-1"></div>
    </div>
</div>
<div class="o-overlay-container">
    <div class="o-overlay-item"></div>
    <div class="o-overlay-item"></div>
    <div class="o-overlay-item"></div>
    <div class="o-overlay-item"></div>
    <div class="o-overlay-item"></div>
    <div class="o-overlay-item"></div>
    <div class="o-overlay-item"></div>
    <div class="o-overlay-item"></div>
    <div class="o-overlay-item"></div>
    <div class="o-overlay-item"></div>
</div>
<div></div>
<div class="o_notification_manager o_upload_progress_toast"></div>
<div class="o_notification_manager"></div>
</div>

@endsection