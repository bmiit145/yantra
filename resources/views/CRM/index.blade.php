@extends('layout.header')
@section('content')
@section('navbar_menu')
    <li class="dropdown">
        <a href="#">Sales</a>
        <div class="dropdown-content">
            <a href="#">My Pipeline</a>
            <a href="#">My Activities</a>
            <a href="#">My Quotations</a>
            <a href="#">Teams</a>
            <a href="#">Customers</a>
        </div>
    </li>
    <li class="dropdown">
        <a href="{{ url('lead') }}">Leads</a>

    </li>
    <li class="dropdown">
        <a href="#">Reporting</a>
        <div class="dropdown-content">
            <!-- Dropdown content for Reporting -->
            <a href="#">Forecast</a>
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


@vite([
    'resources/css/crm_2.css',
    'resources/js/common.js',
//    'resources/css/odoo/web.assets_web_print.min.css'
    ])

<div class="o_content" style="height: 100%">
    <div class="o_kanban_renderer o_renderer d-flex o_kanban_grouped align-content-stretch">
        @php($crmStages = Auth::user()->crmStages->sortBy('seq_no'))
        @foreach($crmStages as $stage)
        <div class="o_kanban_group flex-shrink-0 flex-grow-1 flex-md-grow-0 o_group_draggable {{ $stage->sales->count() > 0 ? '' : 'o_kanban_no_records' }}" data-id="{{ $stage->id }}">
            <div class="o_kanban_header position-sticky top-0 z-index-1 py-2">
                <div class="o_kanban_header_title position-relative d-flex lh-lg">
                    <span
                        class="o_column_title flex-grow-1 d-inline-block mw-100 text-truncate fs-4 fw-bold align-top text-900">{{ $stage->title }}</span>
                    <div class="o_kanban_config"><button class="btn px-2 o-dropdown dropdown-toggle dropdown"
                            aria-expanded="false"><i class="fa fa-gear opacity-50 opacity-100-hover" role="img"
                                aria-label="Settings" title="Settings"></i></button></div>
                    <button
                        class="o_kanban_quick_add new-lead-btn btn pe-2 me-n2">
                        <i class="fa fa-plus opacity-75 opacity-100-hover" role="img" aria-label="Quick add"
                            title="Quick add"></i>
                    </button>
                </div>

                <div class="o_kanban_counter position-relative d-flex align-items-center justify-content-between {{ $stage->sales->count() > 0 ? '' : 'opacity-25' }}">
                    <div class="o_column_progress progress bg-300 w-50">
                        @if($stage->sales->count() > 0)
                        <div role="progressbar" class="progress-bar o_bar_has_records cursor-pointer bg-200"
                            aria-valuemin="0" aria-label="Progress bar" data-tooltip-delay="0" style="width: 100%;"
                            aria-valuemax="2" aria-valuenow="2" data-tooltip="2 Other" title="">
                        </div>
                        @endif
                    </div>
                    <div class="o_animated_number ms-2 text-900 text-nowrap cursor-default false"
                        title="Expected Revenue"><b>0</b></div>
                </div>
            </div>

            <div id="append-container-new" class="append-container-new"></div>

            @foreach($stage->sales as $sale)
            <div role="article" class="o_kanban_record d-flex o_draggable oe_kanban_card_undefined o_legacy_kanban_record"
                data-id="{{ $sale->id }}" tabindex="0">
                <div class="oe_kanban_color_0 oe_kanban_global_click oe_kanban_card d-flex flex-column">
                    <div class="oe_kanban_content flex-grow-1">
                        <div class="oe_kanban_details"><strong
                                class="o_kanban_record_title"><span>{{ $sale->opportunity }}</span></strong></div>
                        <div class="o_kanban_record_subtitle"></div>
                        @if($sale->contact)
                        <div>
                            <span class="o_text_overflow">{{ optional($sale->contact)->name }}</span>
                        </div>
                        @endif
                        <div>
                            <div name="tag_ids" class="o_field_widget o_field_many2many_tags">
                                <div class="d-flex flex-wrap gap-1"></div>
                            </div>
                        </div>
                        <div>
                            <div name="lead_properties" class="o_field_widget o_field_properties">
                                <div class="w-100 fw-normal text-muted"></div>
                            </div>
                        </div>
                    </div>
                    <div class="oe_kanban_footer">
                        <div class="o_kanban_record_bottom">
                            <div class="oe_kanban_bottom_left">
                                <div name="priority" class="o_field_widget o_field_priority">
                                    <div class="o_priority set-priority" role="radiogroup" name="priority" aria-label="Priority">
                                        <a href="#" class="o_priority_star fa {{ $sale->priority == 'medium' || $sale->priority == 'high' || $sale->priority == 'very_high' ? 'fa-star' : 'fa-star-o' }}" role="radio"
                                            tabindex="-1" data-value="medium" data-tooltip="Priority: Medium" aria-label="Medium"></a><a
                                            href="#" class="o_priority_star fa {{ $sale->priority == 'high' || $sale->priority == 'very_high' ? 'fa-star' : 'fa-star-o' }}" role="radio"
                                            tabindex="-1"  data-value="high"data-tooltip="Priority: High" aria-label="High"></a><a
                                            href="#" class="o_priority_star fa {{ $sale->priority == 'very_high' ? 'fa-star' : 'fa-star-o' }}" role="radio"
                                            tabindex="-1" data-value="very_high" data-tooltip="Priority: Very High"
                                            aria-label="Very High"></a>
                                    </div>
                                </div>
                                <div name="activity_ids" class="o_field_widget o_field_kanban_activity"><a
                                        class="o-mail-ActivityButton" role="button" aria-label="Show activities"
                                        title="Show activities">
                                        <i
                                            class="fa fa-fw fa-lg text-muted fa-clock-o btn-link text-dark"
                                            role="img">
                                        </i>
                                    </a>
                                </div>
                            </div>
                            <div class="oe_kanban_bottom_right">
                                <div name="user_id"
                                    class="o_field_widget o_field_many2one_avatar_user o_field_many2one_avatar_kanban o_field_many2one_avatar">
                                    <div class="d-flex align-items-center gap-1"
                                        data-tooltip="{{ $sale->email ?? '' }}"><span
                                            class="o_avatar o_m2o_avatar d-flex">
                                            <img class="rounded"
                                                src="{{ optional($sale->user)->profile ?? asset('images/placeholder.png') }}">
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="o_dropdown_kanban bg-transparent position-absolute end-0"><button
                        class="btn o-no-caret rounded-0 o-dropdown dropdown-toggle dropdown" title="Dropdown menu"
                        aria-expanded="false"><span class="fa fa-ellipsis-v"></span></button></div>
            </div>
            @endforeach

        </div>
        @endforeach

{{--        <div class="o_kanban_group flex-shrink-0 flex-grow-1 flex-md-grow-0 o_group_draggable o_kanban_no_records" data-id="datapoint_10">--}}
{{--            <div class="o_kanban_header position-sticky top-0 z-index-1 py-2">--}}
{{--                <div class="o_kanban_header_title position-relative d-flex lh-lg"><span--}}
{{--                        class="o_column_title flex-grow-1 d-inline-block mw-100 text-truncate fs-4 fw-bold align-top text-900">Qualified</span>--}}
{{--                    <div class="o_kanban_config">--}}
{{--                        <button class="btn px-2 o-dropdown dropdown-toggle dropdown"--}}
{{--                            aria-expanded="false"><i class="fa fa-gear opacity-50 opacity-100-hover" role="img"--}}
{{--                                aria-label="Settings" title="Settings"></i></button></div><button--}}
{{--                        class="o_kanban_quick_add qualified-btn btn pe-2 me-n2"><i--}}
{{--                            class="fa fa-plus opacity-75 opacity-100-hover" role="img" aria-label="Quick add"--}}
{{--                            title="Quick add"></i></button>--}}
{{--                </div>--}}
{{--                <div--}}
{{--                    class="o_kanban_counter position-relative d-flex align-items-center justify-content-between opacity-25">--}}
{{--                    <div class="o_column_progress progress bg-300 w-50"></div>--}}
{{--                    <div class="o_animated_number ms-2 text-900 text-nowrap cursor-default false"--}}
{{--                        title="Expected Revenue"><b>0</b></div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div id="append-container-qualified"></div>--}}
{{--        </div>--}}
{{--        <div class="o_kanban_group flex-shrink-0 flex-grow-1 flex-md-grow-0 o_group_draggable" data-id="datapoint_12">--}}
{{--            <div class="o_kanban_header position-sticky top-0 z-index-1 py-2">--}}
{{--                <div class="o_kanban_header_title position-relative d-flex lh-lg"><span--}}
{{--                        class="o_column_title flex-grow-1 d-inline-block mw-100 text-truncate fs-4 fw-bold align-top text-900">Proposition</span>--}}
{{--                    <div class="o_kanban_config"><button class="btn px-2 o-dropdown dropdown-toggle dropdown"--}}
{{--                            aria-expanded="false"><i class="fa fa-gear opacity-50 opacity-100-hover" role="img"--}}
{{--                                aria-label="Settings" title="Settings"></i></button></div><button--}}
{{--                        class="o_kanban_quick_add proposition-btn btn pe-2 me-n2">--}}
{{--                        <i class="fa fa-plus opacity-75 opacity-100-hover" role="img" aria-label="Quick add"--}}
{{--                            title="Quick add"></i>--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--                <div class="o_kanban_counter position-relative d-flex align-items-center justify-content-between">--}}
{{--                    <div class="o_column_progress progress bg-300 w-50">--}}
{{--                        <div role="progressbar" class="progress-bar o_bar_has_records cursor-pointer bg-200"--}}
{{--                            aria-valuemin="0" aria-label="Progress bar" data-tooltip-delay="0" style="width: 100%;"--}}
{{--                            aria-valuemax="1" aria-valuenow="1" data-tooltip="1 Other" title=""></div>--}}
{{--                    </div>--}}
{{--                    <div class="o_animated_number ms-2 text-900 text-nowrap cursor-default false"--}}
{{--                        title="Expected Revenue"><b>0</b></div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div id="append-container-proposition"></div>--}}

{{--            <div role="article" class="o_kanban_record d-flex o_draggable oe_kanban_card_undefined"--}}
{{--                data-id="datapoint_14" tabindex="0">--}}
{{--                <div class="oe_kanban_color_0 oe_kanban_global_click oe_kanban_card d-flex flex-column">--}}
{{--                    <div class="oe_kanban_content flex-grow-1">--}}
{{--                        <div class="oe_kanban_details"><strong--}}
{{--                                class="o_kanban_record_title"><span>dsad</span></strong></div>--}}
{{--                        <div class="o_kanban_record_subtitle"></div>--}}
{{--                        <div></div>--}}
{{--                        <div>--}}
{{--                            <div name="tag_ids" class="o_field_widget o_field_many2many_tags">--}}
{{--                                <div class="d-flex flex-wrap gap-1"></div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div>--}}
{{--                            <div name="lead_properties" class="o_field_widget o_field_properties">--}}
{{--                                <div class="w-100 fw-normal text-muted"></div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="oe_kanban_footer">--}}
{{--                        <div class="o_kanban_record_bottom">--}}
{{--                            <div class="oe_kanban_bottom_left">--}}
{{--                                <div name="priority" class="o_field_widget o_field_priority">--}}
{{--                                    <div class="o_priority" role="radiogroup" name="priority" aria-label="Priority">--}}
{{--                                        <a href="#" class="o_priority_star fa fa-star-o" role="radio"--}}
{{--                                            tabindex="-1" data-tooltip="Priority: Medium" aria-label="Medium"></a><a--}}
{{--                                            href="#" class="o_priority_star fa fa-star-o" role="radio"--}}
{{--                                            tabindex="-1" data-tooltip="Priority: High" aria-label="High"></a><a--}}
{{--                                            href="#" class="o_priority_star fa fa-star-o" role="radio"--}}
{{--                                            tabindex="-1" data-tooltip="Priority: Very High"--}}
{{--                                            aria-label="Very High"></a></div>--}}
{{--                                </div>--}}
{{--                                <div name="activity_ids" class="o_field_widget o_field_kanban_activity"><a--}}
{{--                                        class="o-mail-ActivityButton" role="button" aria-label="Show activities"--}}
{{--                                        title="Show activities"><i--}}
{{--                                            class="fa fa-fw fa-lg text-muted fa-clock-o btn-link text-dark"--}}
{{--                                            role="img"></i></a></div>--}}
{{--                            </div>--}}
{{--                            <div class="oe_kanban_bottom_right">--}}
{{--                                <div name="user_id"--}}
{{--                                    class="o_field_widget o_field_many2one_avatar_user o_field_many2one_avatar_kanban o_field_many2one_avatar">--}}
{{--                                    <div class="d-flex align-items-center gap-1"--}}
{{--                                        data-tooltip="info@yantradesign.co.in"><span--}}
{{--                                            class="o_avatar o_m2o_avatar d-flex"><img class="rounded"--}}
{{--                                                src="https://i.pinimg.com/550x/a8/23/0a/a8230a2a558297bc90a394ec0283ff4f.jpg"></span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="clearfix"></div>--}}
{{--                </div>--}}
{{--                <div class="o_dropdown_kanban bg-transparent position-absolute end-0"><button--}}
{{--                        class="btn o-no-caret rounded-0 o-dropdown dropdown-toggle dropdown" title="Dropdown menu"--}}
{{--                        aria-expanded="false"><span class="fa fa-ellipsis-v"></span></button></div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="o_kanban_group flex-shrink-0 flex-grow-1 flex-md-grow-0 o_group_draggable" data-id="datapoint_17">--}}
{{--            <div class="o_kanban_header position-sticky top-0 z-index-1 py-2">--}}
{{--                <div class="o_kanban_header_title position-relative d-flex lh-lg"><span--}}
{{--                        class="o_column_title flex-grow-1 d-inline-block mw-100 text-truncate fs-4 fw-bold align-top text-900">Won</span>--}}
{{--                    <div class="o_kanban_config"><button class="btn px-2 o-dropdown dropdown-toggle dropdown"--}}
{{--                            aria-expanded="false"><i class="fa fa-gear opacity-50 opacity-100-hover" role="img"--}}
{{--                                aria-label="Settings" title="Settings"></i></button></div><button--}}
{{--                        class="o_kanban_quick_add won-btn btn pe-2 me-n2"><i--}}
{{--                            class="fa fa-plus opacity-75 opacity-100-hover" role="img" aria-label="Quick add"--}}
{{--                            title="Quick add"></i></button>--}}
{{--                </div>--}}
{{--                <div class="o_kanban_counter position-relative d-flex align-items-center justify-content-between">--}}
{{--                    <div class="o_column_progress progress bg-300 w-50">--}}
{{--                        <div role="progressbar" class="progress-bar o_bar_has_records cursor-pointer bg-200"--}}
{{--                            aria-valuemin="0" aria-label="Progress bar" data-tooltip-delay="0" style="width: 100%;"--}}
{{--                            aria-valuemax="1" aria-valuenow="1" data-tooltip="1 Other">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="o_animated_number ms-2 text-900 text-nowrap cursor-default false"--}}
{{--                        title="Expected Revenue"><b>0</b></div>--}}
{{--                </div>--}}
{{--            </div>--}}


{{--            <div id="append-container-won"></div>--}}


{{--            <div role="article" class="o_kanban_record d-flex o_draggable oe_kanban_card_undefined"--}}
{{--                data-id="datapoint_19" tabindex="0">--}}
{{--                <div class="oe_kanban_color_0 oe_kanban_global_click oe_kanban_card d-flex flex-column">--}}
{{--                    <div class="oe_kanban_content flex-grow-1">--}}
{{--                        <div class="oe_kanban_details"><strong--}}
{{--                                class="o_kanban_record_title"><span>Industrylots</span></strong></div>--}}
{{--                        <div class="o_kanban_record_subtitle"></div>--}}
{{--                        <div></div>--}}
{{--                        <div>--}}
{{--                            <div name="tag_ids" class="o_field_widget o_field_many2many_tags">--}}
{{--                                <div class="d-flex flex-wrap gap-1"></div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div>--}}
{{--                            <div name="lead_properties" class="o_field_widget o_field_properties">--}}
{{--                                <div class="w-100 fw-normal text-muted"></div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="oe_kanban_footer">--}}
{{--                        <div class="o_kanban_record_bottom">--}}
{{--                            <div class="oe_kanban_bottom_left">--}}
{{--                                <div name="priority" class="o_field_widget o_field_priority">--}}
{{--                                    <div class="o_priority" role="radiogroup" name="priority" aria-label="Priority">--}}
{{--                                        <a href="#" class="o_priority_star fa fa-star" role="radio"--}}
{{--                                            tabindex="-1" data-tooltip="Priority: Medium" aria-checked=""--}}
{{--                                            aria-label="Medium"></a><a href="#"--}}
{{--                                            class="o_priority_star fa fa-star" role="radio" tabindex="-1"--}}
{{--                                            data-tooltip="Priority: High" aria-checked="" aria-label="High"></a><a--}}
{{--                                            href="#" class="o_priority_star fa fa-star" role="radio"--}}
{{--                                            tabindex="-1" data-tooltip="Priority: Very High" aria-checked=""--}}
{{--                                            aria-label="Very High"></a></div>--}}
{{--                                </div>--}}
{{--                                <div name="activity_ids" class="o_field_widget o_field_kanban_activity"><a--}}
{{--                                        class="o-mail-ActivityButton" role="button" aria-label="Show activities"--}}
{{--                                        title="Show activities"><i--}}
{{--                                            class="fa fa-fw fa-lg text-muted fa-clock-o btn-link text-dark"--}}
{{--                                            role="img"></i></a></div>--}}
{{--                            </div>--}}
{{--                            <div class="oe_kanban_bottom_right">--}}
{{--                                <div name="user_id"--}}
{{--                                    class="o_field_widget o_field_many2one_avatar_user o_field_many2one_avatar_kanban o_field_many2one_avatar">--}}
{{--                                    <div class="d-flex align-items-center gap-1"--}}
{{--                                        data-tooltip="info@yantradesign.co.in"><span--}}
{{--                                            class="o_avatar o_m2o_avatar d-flex"><img class="rounded"--}}
{{--                                                src="https://i.pinimg.com/550x/a8/23/0a/a8230a2a558297bc90a394ec0283ff4f.jpg"></span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="clearfix"></div>--}}
{{--                </div>--}}
{{--                <div class="o_dropdown_kanban bg-transparent position-absolute end-0"><button--}}
{{--                        class="btn o-no-caret rounded-0 o-dropdown dropdown-toggle dropdown" title="Dropdown menu"--}}
{{--                        aria-expanded="false"><span class="fa fa-ellipsis-v"></span></button></div>--}}
{{--            </div>--}}
{{--        </div>--}}

        <div class="o_column_quick_create flex-shrink-0 flex-grow-1 flex-md-grow-0">
            <div class="o_quick_create_folded position-sticky z-index-1 my-3 text-nowrap">
                <button class="o_kanban_add_column btn btn-light w-100" aria-label="Add column"
                    data-tooltip="Add column">
                    <i class="fa fa-plus me-2" role="img"></i>Stage
                </button>
            </div>
        </div>


        <script>
            $(document).ready(function() {
                var originalContent = `
                        <div class="o_column_quick_create flex-shrink-0 flex-grow-1 flex-md-grow-0">
                            <div class="o_quick_create_folded position-sticky z-index-1 my-3 text-nowrap">
                                <button class="o_kanban_add_column btn btn-light w-100" aria-label="Add column" data-tooltip="Add column">
                                    <i class="fa fa-plus me-2" role="img"></i>Stage
                                </button>
                            </div>
                        </div>`;

                $(document).on('click', '.o_kanban_add_column', function() {
                    var newContent = `
                            <div class="o_column_quick_create flex-shrink-0 flex-grow-1 flex-md-grow-0">
                                <div class="o_quick_create_unfolded pt-3 pb-2">
                                    <div class="o_kanban_header top-0 pb-3">
                                        <div class="input-group mb-1">
                                            <input type="text" class="form-control bg-view new_stage_input" placeholder="Stage...">
                                            <button class="btn btn-primary o_kanban_add" type="button">Add</button>
                                        </div>
                                    </div>
                                    <div class="o_kanban_muted_record mb-2 py-5 bg-300 opacity-50"></div>
                                    <div class="o_kanban_muted_record mb-2 py-5 bg-300 opacity-50"></div>
                                    <div class="o_kanban_muted_record mb-2 py-5 bg-300 opacity-50"></div>
                                </div>
                            </div>`;
                    $('.o_column_quick_create').replaceWith(newContent);

                    // Add click event listener to the document
                    $(document).on('click.outsideClick', function(event) {
                        if (!$(event.target).closest('.o_column_quick_create').length) {
                            $('.o_column_quick_create').replaceWith(originalContent);
                            $(document).off(
                                'click.outsideClick'
                            );
                        }
                    });
                });
            });
        </script>

    </div>
</div>

<div class="o-main-components-container">
    <div class="o-discuss-CallInvitations position-absolute top-0 end-0 d-flex flex-column p-2"></div>
    <div class="o-mail-ChatWindowContainer"></div>
    <div class="o-overlay-container"></div>
    <div></div>
    <div class="o_notification_manager o_upload_progress_toast"></div>
    <div class="o_fullscreen_indication">
        <p>Press <span>esc</span> to exit full screen</p>
    </div>
    <div class="o_notification_manager"></div>
</div>

@endsection
@push('scripts')
{{--<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>--}}
<link rel="stylesheet" href="https://code.jquery.com/ui/1.14.0/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.14.0/jquery-ui.min.js"></script>
<script>
    $(document).ready(function() {
        var isContentAppendedNew = false;

        function appendContent($this) {
            var containerId = $this.closest('.o_kanban_group').find('#append-container-new');
            var append_id = $this.closest('.o_kanban_group').data('id');
            let isContentAppendedFlag = false

            // set the flag to true if the content is already appended
            if (containerId.find('.o_kanban_quick_create').length) {
                isContentAppendedFlag = true;
            }

            $('.append-container-new').hide();

            $(document).on('click', '.o_form_button_cancel', function(event) {
                event.preventDefault();
                $(containerId).hide();
            });
            if (!isContentAppendedFlag) {
                var htmlContent = `<div id="appended-content" class="o_kanban_group flex-shrink-0 flex-grow-1 flex-md-grow-0 o_group_draggable" data-id="${append_id}">
                                    <div class="o_kanban_quick_create o_field_highlight shadow">
                                        <div class="o_form_renderer o_form_nosheet o_form_view o_xxs_form_view p-0 o_form_editable d-block">
                                            <div class="o_inner_group grid">
                                                <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                    <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                        <label class="o_form_label" for="partner_id_0">Organization / Contact<sup class="text-info p-1" data-tooltip-template="web.FieldTooltip" data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;Linked partner (optional). Usually created when converting the lead. You can find a partner by its Name, TIN, Email or Internal Reference.&quot;}}" data-tooltip-touch-tap-to-show="true">?</sup></label>
                                                    </div>
                                                    <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                                        <div name="partner_id" class="o_field_widget o_field_res_partner_many2one o_field_highlight">
                                                            <div class="o_field_many2one_selection">
                                                                <div class="o_input_dropdown">
                                                                    <div class="o-autocomplete dropdown">
                                                                        <input type="text" name="partner_id" class="o-autocomplete--input o_input" autocomplete="off" role="combobox" aria-autocomplete="list" aria-haspopup="listbox" id="partner_id_0" placeholder="" aria-expanded="false">
                                                                    </div>
                                                                    <span class="o_dropdown_button"></span>
                                                                </div>
                                                            </div>
                                                            <div class="o_field_many2one_extra"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                    <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                        <label class="o_form_label" for="name_0">Opportunity</label>
                                                    </div>
                                                    <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                                        <div name="name" class="o_field_widget o_required_modifier o_field_char">
                                                            <input name="name" class="o_input" id="name_0" type="text" autocomplete="off" placeholder="e.g. Product Pricing">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                    <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                        <label class="o_form_label" for="email_from_0">Email</label>
                                                    </div>
                                                    <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                                        <div name="email_from" class="o_field_widget o_field_char">
                                                            <input name="email" class="o_input" id="email_from_0" type="text" autocomplete="off" placeholder="e.g. &quot;email@address.com&quot;">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                    <div class="o_cell o_wrap_label flex-grow-1 flex-sm-grow-0 w-100 text-break text-900">
                                                        <label class="o_form_label" for="phone_0">Phone</label>
                                                    </div>
                                                    <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                                        <div name="phone" class="o_field_widget o_field_char">
                                                            <input name="phone" class="o_input" id="phone_0" type="text" autocomplete="off" placeholder="e.g. &quot;0123456789&quot;">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="o_wrap_field d-flex d-sm-contents flex-column mb-3 mb-sm-0">
                                                    <div class="o_cell flex-grow-1 flex-sm-grow-0 o_wrap_label w-100 text-break text-900" style="">
                                                        <label class="o_form_label" for="expected_revenue_0">Expected Revenue</label>
                                                    </div>
                                                    <div class="o_cell flex-grow-1 flex-sm-grow-0" style="width: 100%;">
                                                        <div>
                                                            <div class="o_row">
                                                                <div name="expected_revenue" class="o_field_widget o_field_monetary oe_inline me-5 o_field_highlight">
                                                                    <div class="text-nowrap d-inline-flex w-100 align-items-baseline position-relative">
                                                                        <span class="o_input position-absolute pe-none d-flex w-100"><span>₹&nbsp;</span><span class="opacity-0 d-inline-block overflow-hidden mw-100 o_monetary_ghost_value">0.00</span></span><span class="opacity-0">₹&nbsp;</span>
                                                                            <input  name="expected_revenue" class="o_input flex-grow-1 flex-shrink-1" autocomplete="off" id="expected_revenue_0" type="text">
                                                                    </div>
                                                                </div>
                                                                <div name="priority" class="o_field_widget o_field_priority oe_inline">
                                                                    <div class="o_priority" role="radiogroup" name="priority" aria-label="Priority">
                                                                        <a href="#" class="o_priority_star fa fa-star-o" role="radio" tabindex="-1" data-value="medium" data-tooltip="Priority: Medium" aria-label="Medium"></a>
                                                                        <a href="#" class="o_priority_star fa fa-star-o" role="radio" tabindex="-1" data-value="high" data-tooltip="Priority: High" aria-label="High"></a>
                                                                        <a href="#" class="o_priority_star fa fa-star-o" role="radio" tabindex="-1" data-value="very_high" data-tooltip="Priority: Very High" aria-label="Very High"></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <footer class="o_form_view_footer o_form_status bg-light py-1 mt-auto border-top">
                                                <button class="btn border text-muted o_form_button_cancel">Discard</button>
                                                <button class="btn btn-primary o-kanban-button-new">Add</button>
                                            </footer>
                                        </div>
                                    </div>
                                </div>`;

                $(containerId).append(htmlContent);

                isContentAppendedFlag = true;
            }

            $(containerId).show();
        }

        $('.new-lead-btn').click(function(event) {
            event.preventDefault(); // Prevent default action
            appendContent($(this));
        });

        $('.head_new_btn').click(function(event) {
            event.preventDefault();
            let firstContainer = $(document).find('.new-lead-btn').eq(0);
            appendContent(firstContainer);
        });



        var insideCard =  $(document).find(".o_kanban_record");
        makeDropableInsideCard(insideCard);
        function makeDropableInsideCard(insideCard){
            insideCard.draggable({
                connectToSortable: ".o_kanban_group",
                revert: "invalid",
                cursor: "move",
                helper: "original",
                start: function(event, ui) {
                    ui.helper.addClass("o_dragged");
                    ui.helper.width($(this).width());
                    ui.helper.height($(this).height());
                    ui.helper.data('originalElement', $(this));
                },
                stop: function(event, ui) {
                    // $(this).remove();
                    $(this).removeClass("o_dragged");
                }
            });
        }

        // Make kanban groups droppable
        $(".o_kanban_group").droppable({
            accept: ".o_kanban_record",
            hoverClass: "o_kanban_hover",
            classes: {
                "ui-droppable-hover": "o_kanban_hover"
            },
            drop: function(event, ui) {
                // Clone the dragged record and remove the drag class
                var droppedRecord = ui.helper.clone().removeClass("o_dragged");
                droppedRecord.attr('style' , '');
                // Append the cloned record to the new group
                $(this).append(droppedRecord);

                var originalRecord = $(ui.helper.data('originalElement'));
                originalRecord.remove();
                ui.helper.remove();

                // Reinitialize draggable on the newly added element
                // makeDropableInsideCard(droppedRecord);

                // update in database by ajax as update stage_id
                var sale_id = droppedRecord.data('id');
                var stage_id = $(this).data('id');
                $.ajax({
                    type: 'POST',
                    url: "{{ route('sale.setStage') }}",
                    data: {
                        id: sale_id,
                        stage_id: stage_id,
                    },
                    success: function(response) {
                        // toastr.success("Stage Updated");
                        // location.reload();
                    },
                    error: function(err) {
                        console.log(err);
                    }
                });
            }

        });


        // for  o_kanban_record sorting
        {{--$(".o_kanban_group").sortable({--}}
        {{--    handle: ".oe_kanban_global_click ",--}}
        {{--    revert: true,--}}
        {{--    // classes: {--}}
        {{--    //     "ui-sortable-placeholder": "o_kanban_group_placeholder",--}}
        {{--    //     "ui-sortable-helper": "o_dragged shadow",--}}
        {{--    // },--}}
        {{--    // placeholder: "o_kanban_group_placeholder",--}}
        {{--    // forcePlaceholderSize: true,--}}
        {{--    start: function(event, ui) {--}}
        {{--        ui.placeholder.height(ui.item.height());--}}
        {{--    },--}}
        {{--    update: function(event, ui) {--}}
        {{--        var sales = [];--}}
        {{--        $(ui.item).closest('.o_kanban_group').find('.o_kanban_record').each(function(index, element) {--}}
        {{--            var sale_id = $(element).data('id');--}}
        {{--            sales.push({--}}
        {{--                id: sale_id,--}}
        {{--                sequence: index,--}}
        {{--            });--}}
        {{--        });--}}

        {{--        console.log(sales);--}}

        {{--        $.ajax({--}}
        {{--            type: 'POST',--}}
        {{--            url: "{{ route('crm.updateSaleSequence') }}",--}}
        {{--            data: {--}}
        {{--                sales : sales--}}
        {{--            },--}}
        {{--            success: function(response) {--}}
        {{--                toastr.success("Sale Updated");--}}
        {{--                // location.reload();--}}
        {{--            },--}}
        {{--            error: function(err) {--}}
        {{--                console.log(err);--}}
        {{--            }--}}
        {{--        });--}}
        {{--    }--}}
        {{--});--}}



        // submit form by ajax onm o-kanban-button-new
        $(document).on('click', '.o-kanban-button-new', function() {
            var partner_id = $(this).closest('.o_kanban_group').find('input[name="partner_id"]').val();
            var name = $(this).closest('.o_kanban_group').find('input[name="name"]').val();
            var email = $(this).closest('.o_kanban_group').find('input[name="email"]').val();
            var phone = $(this).closest('.o_kanban_group').find('input[name="phone"]').val();
            var expected_revenue = $(this).closest('.o_kanban_group').find('input[name="expected_revenue"]').val();
            var stage_id = $(this).closest('.o_kanban_group').data('id');

            var priority = $(this).closest('.o_kanban_group').find('.o_priority_star.fa-star').last().data('value');


            $.ajax({
                type: 'POST',
                url: "{{ route('crm.newSales') }}",
                data: {
                    stage_id : stage_id,
                    contact_id: partner_id,
                    name: name,
                    email: email,
                    phone: phone,
                    expected_revenue: expected_revenue,
                    priority: priority,
                },
                success: function(response) {
                    toastr.success("Sale Created");
                    // location.reload();
                },
                error: function(err) {
                    console.log(err);
                }
            });
        });


        // set priority ajax
        $(document).on('click', '.set-priority .o_priority_star', function() {
            var priority = $(this).data('value');
            var sale_id = $(this).closest('.o_kanban_record').data('id');
            $.ajax({
                type: 'POST',
                url: "{{ route('sale.setPriority') }}",
                data: {
                    priority: priority,
                    sale_id: sale_id,
                },
                success: function(response) {
                    // toastr.success("Priority Set");
                    // location.reload();
                },
                error: function(err) {
                    console.log(err);
                }
            });
        });

    });

{{--    $(document).ready(function() {--}}
{{--        var insideCard = $(document).find(".o_kanban_record");--}}
{{--        makeDropableInsideCard(insideCard);--}}

{{--        function makeDropableInsideCard(insideCard) {--}}
{{--            insideCard.draggable({--}}
{{--                connectToSortable: ".o_kanban_group",--}}
{{--                revert: "invalid",--}}
{{--                cursor: "move",--}}
{{--                helper: "original",--}}
{{--                start: function(event, ui) {--}}
{{--                    ui.helper.addClass("o_dragged");--}}
{{--                    ui.helper.width($(this).width());--}}
{{--                    ui.helper.height($(this).height());--}}
{{--                    $(this).data('originalElement', $(this));--}}
{{--                },--}}
{{--                stop: function(event, ui) {--}}
{{--                    $(this).removeClass("o_dragged");--}}
{{--                }--}}
{{--            });--}}
{{--        }--}}

{{--        // Make kanban groups sortable and droppable--}}
{{--        $(".o_kanban_group").sortable({--}}
{{--            connectWith: ".o_kanban_group",--}}
{{--            handle: ".oe_kanban_global_click",--}}
{{--            revert: true,--}}
{{--            classes: {--}}
{{--                "ui-sortable-placeholder": "o_kanban_group_placeholder",--}}
{{--                "ui-sortable-helper": "o_dragged shadow",--}}
{{--            },--}}
{{--            animation: 0,--}}
{{--            start: function(event, ui) {--}}
{{--                ui.placeholder.height(ui.item.height());--}}
{{--            },--}}
{{--            update: function(event, ui) {--}}
{{--                ui.item.attr('style', '');--}}
{{--                var sales = [];--}}
{{--                $(ui.item).closest('.o_kanban_group').find('.o_kanban_record').each(function(index, element) {--}}
{{--                    var sale_id = $(element).data('id');--}}
{{--                    sales.push({--}}
{{--                        id: sale_id,--}}
{{--                        sequence: index,--}}
{{--                    });--}}
{{--                });--}}

{{--                console.log(sales);--}}

{{--                // Update the sequence in the database via AJAX--}}
{{--                $.ajax({--}}
{{--                    type: 'POST',--}}
{{--                    url: "{{ route('crm.updateSaleSequence') }}",--}}
{{--                    data: {--}}
{{--                        sales: sales--}}
{{--                    },--}}
{{--                    success: function(response) {--}}
{{--                        toastr.success("Sale Updated");--}}
{{--                    },--}}
{{--                    error: function(err) {--}}
{{--                        console.log(err);--}}
{{--                    }--}}
{{--                });--}}
{{--            },--}}
{{--            receive: function(event, ui) {--}}
{{--                var originalRecord = ui.item.data('originalElement');--}}
{{--                var droppedRecord = ui.item.clone().removeClass("o_dragged");--}}
{{--                droppedRecord.attr('style', '');--}}

{{--                // originalRecord.remove();--}}
{{--                // ui.helper.remove();--}}

{{--                // Reinitialize draggable on the newly added element--}}
{{--                // makeDropableInsideCard(droppedRecord);--}}

{{--                // Update stage in database via AJAX--}}
{{--                var sale_id = droppedRecord.data('id');--}}
{{--                var stage_id = $(this).data('id');--}}
{{--                $.ajax({--}}
{{--                    type: 'POST',--}}
{{--                    url: "{{ route('sale.setStage') }}",--}}
{{--                    data: {--}}
{{--                        id: sale_id,--}}
{{--                        stage_id: stage_id,--}}
{{--                    },--}}
{{--                    success: function(response) {--}}
{{--                        toastr.success("Stage Updated");--}}
{{--                    },--}}
{{--                    error: function(err) {--}}
{{--                        console.log(err);--}}
{{--                    }--}}
{{--                });--}}
{{--            }--}}
{{--        }).droppable({--}}
{{--            accept: ".o_kanban_record",--}}
{{--            hoverClass: "o_kanban_hover",--}}
{{--            classes: {--}}
{{--                "ui-droppable-hover": "o_kanban_hover"--}}
{{--            }--}}
{{--        });--}}
{{--    });--}}

</script>
 <script>
        $(document).ready(function() {
            $('.dropdown > a').click(function(e) {
                e.preventDefault(); // Prevent the default link action
                // Close other dropdowns
                $('.dropdown').not($(this).parent()).removeClass('active');

                // Toggle the active class on the current dropdown
                $(this).parent().toggleClass('active');
            });

            // Optional: Close the dropdown if clicking outside of it
            $(document).click(function(e) {
                if (!$(e.target).closest('.dropdown').length) {
                    $('.dropdown').removeClass('active');
                }
            });


            // stage add
            $(document).on('click', '.o_kanban_add', function() {
                var newStage = $(this).closest('.o_quick_create_unfolded').find('.new_stage_input').val();
                $.ajax({
                    type: 'POST',
                    url: "{{ route('crm.newStage') }}",
                    data: {
                        newStage: newStage,
                    },
                    success: function(response) {
                        toastr.success("Stage Cerated");
                        location.reload();
                    },
                    error: function(err) {
                        console.log(err);
                    }
                });
            });
        });
</script>

<script>
    // for sorting of stages
    $(document).ready(function() {
        $(".o_kanban_grouped").sortable({
            // connectWith: ".o_kanban_group",
            handle: ".o_kanban_header_title",
            classes: {
                "ui-sortable-placeholder": "o_kanban_group_placeholder",
                "ui-sortable-helper": "o_dragged shadow",
            },
            // placeholder: "o_kanban_group_placeholder",
            // forcePlaceholderSize: true,
            start: function(event, ui) {
                ui.placeholder.height(ui.item.height());
            },
            update: function(event, ui) {
                // array with id and the sequence
                var stages = [];
                $(".o_kanban_grouped .o_kanban_group").each(function(index, element) {
                    var stage_id = $(element).data('id');
                    stages.push({
                        id: stage_id,
                        sequence: index,
                    });
                });

                $.ajax({
                    type: 'POST',
                    url: "{{ route('crm.updateStageSequence') }}",
                    data: {
                        stages : stages
                    },
                    success: function(response) {
                        toastr.success("Stage Updated");
                        // location.reload();
                    },
                    error: function(err) {
                        console.log(err);
                    }
                });
            }
        });

    });
</script>

                {{--var itemEl = evt.item; // dragged HTMLElement--}}
                {{--var stage_id = itemEl.dataset.id;--}}
                {{--var prev_stage_id = evt.from.dataset.id;--}}
                {{--var next_stage_id = evt.to.dataset.id;--}}
                {{--$.ajax({--}}
                {{--    type: 'POST',--}}
                {{--    url: "{{ route('crm.updateStage') }}",--}}
                {{--    data: {--}}
                {{--        stage_id: stage_id,--}}
                {{--        prev_stage_id: prev_stage_id,--}}
                {{--        next_stage_id: next_stage_id,--}}
                {{--    },--}}
                {{--    success: function(response) {--}}
                {{--        toastr.success("Stage Updated");--}}
                {{--        // location.reload();--}}
                {{--    },--}}
                {{--    error: function(err) {--}}
                {{--        console.log(err);--}}
                {{--    }--}}
                {{--});--}}

@endpush
