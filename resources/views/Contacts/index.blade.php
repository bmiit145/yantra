@extends('layout.header')
@section('content')

@vite('resources/css/contactindex.css')
@section('title', 'Contacts')
@section('image_url', 'images/CRM.png')
@section('head_new_btn_link', route('contact.create'))
@section('navbar_menu')
<li><a href="{{ route('contact.index') }}">Contacts</a></li>
<li><a href="#"></a>Configuration</li>
@endsection



<div class="o_content">
    <div
        class="o_kanban_renderer o_renderer d-flex o_kanban_ungrouped align-content-start flex-wrap justify-content-start">
        <div role="article" class="o_kanban_record d-flex flex-grow-1 flex-md-shrink-1 flex-shrink-0"
            data-id="datapoint_39" tabindex="0">
            <div class="oe_kanban_global_click o_kanban_record_has_image_fill o_res_partner_kanban">
                <div class="o_kanban_image_fill_left d-none d-md-block"><img loading="lazy"
                        src="https://yantradesign.odoo.com/web/image/res.partner/16/avatar_128?unique=1721631365000"
                        alt="16"></div>
                <div class="o_kanban_image d-md-none d-block"><img loading="lazy"
                        src="https://yantradesign.odoo.com/web/image/res.partner/16/avatar_128?unique=1721631365000"
                        alt="16"></div>
                <div class="oe_kanban_details d-flex flex-column justify-content-between">
                    <div><strong class="o_kanban_record_title oe_partner_heading"><span>Priyank
                                spfashub000@gmail.com</span></strong>
                        <div class="o_kanban_tags_section oe_kanban_partner_categories"><span
                                class="oe_kanban_list_many2many">
                                <div name="category_id" class="o_field_widget o_field_many2many_tags">
                                    <div class="d-flex flex-wrap gap-1"></div>
                                </div>
                            </span></div>
                        <ul>
                            <li class="o_text_overflow"><span>spfashub000@gmail.com</span></li>
                        </ul>
                    </div>
                    <div class="o_kanban_record_bottom">
                        <div class="oe_kanban_bottom_left"></div>
                        <div class="oe_kanban_bottom_right">
                            <div name="activity_ids" class="o_field_widget o_field_kanban_activity"><a
                                    class="o-mail-ActivityButton" role="button" aria-label="Show activities"
                                    title="Show activities"><i
                                        class="fa fa-fw fa-lg text-muted fa-clock-o btn-link text-dark"
                                        role="img"></i></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
        <div class="o_kanban_record o_kanban_ghost flex-grow-1 flex-md-shrink-1 flex-shrink-0 my-0"></div>
        <div class="o_kanban_record o_kanban_ghost flex-grow-1 flex-md-shrink-1 flex-shrink-0 my-0"></div>
        <div class="o_kanban_record o_kanban_ghost flex-grow-1 flex-md-shrink-1 flex-shrink-0 my-0"></div>
        <div class="o_kanban_record o_kanban_ghost flex-grow-1 flex-md-shrink-1 flex-shrink-0 my-0"></div>
        <div class="o_kanban_record o_kanban_ghost flex-grow-1 flex-md-shrink-1 flex-shrink-0 my-0"></div>
        <div class="o_kanban_record o_kanban_ghost flex-grow-1 flex-md-shrink-1 flex-shrink-0 my-0"></div>
    </div>
</div>



@endsection