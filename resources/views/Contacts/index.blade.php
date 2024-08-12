@extends('layout.header')

@php
    $currentUrl = url()->current();
    $queryParameters = request()->query();
    $tab = request()->query('tab');
@endphp

@if($tab == 'customers')
@section('title','Customers')
@else
@section('title','Contacts')
@endif
@section('head_title_link' , route('contact.index'))
@section('image_url', asset('images/Contacts.png'))
@section('head_new_btn_link', route('contact.create'))
@section('navbar_menu')


<li>

    <a href="{{ route('contact.index') }}">
        @if($tab == 'customers')
            Customers
        @else
            Contacts
        @endif
    </a>
</li>
<li><a href="#"></a>Configuration</li>
@endsection
@section('head_new_btn_link' , route('contact.create'))
@section('content')
@vite('resources/css/contactindex.css')
<div class="o_content">
    <div class="o_kanban_renderer o_renderer d-flex o_kanban_ungrouped align-content-start flex-wrap justify-content-start">

        @foreach($contacts as $contact)
            <div role="article" class="o_kanban_record d-flex flex-grow-1 flex-md-shrink-1 flex-shrink-0 contact-card" data-id="{{ $contact->id }}" tabindex="0">
             <div class="oe_kanban_global_click o_kanban_record_has_image_fill o_res_partner_kanban">
                <div class="o_kanban_image_fill_left d-none d-md-block">
                    <img loading="lazy"
                         src="{{ asset('images/contact_person.png') }}"
                         alt="16">
                </div>
                <div class="o_kanban_image d-md-none d-block">
                    <img loading="lazy"
                         src="{{ asset('images/placeholder.png') }}"
                         alt="16">
                </div>
                <div class="oe_kanban_details d-flex flex-column justify-content-between">
                    <div>
                        <strong class="o_kanban_record_title oe_partner_heading">
                            <span> {{ $contact->name }}</span>
{{--                            <span> {{ $contact->email }}</span>--}}
                        </strong>
                        <div class="o_kanban_tags_section oe_kanban_partner_categories">
                            <span
                                class="oe_kanban_list_many2many">
                                <div name="category_id" class="o_field_widget o_field_many2many_tags">
                                    <div class="d-flex flex-wrap gap-1"></div>
                                </div>
                            </span>
                        </div>
                        @php
                            $address = optional($contact->address);
                            $city = $address->city;
                            $country = $address->country;
                        @endphp

                        <div>
                            <span>{{ $city }}</span>
                            @if($city && $country)
                                <span>, </span>
                            @endif
                            <span>{{ $country }}</span>
                        </div>
                        <ul>
                            <li class="o_text_overflow"><span>{{ $contact->email }}</span></li>
                        </ul>
                    </div>
                    <div class="o_kanban_record_bottom">
                        <div class="oe_kanban_bottom_left"></div>
                        <div class="oe_kanban_bottom_right">
                            <div name="activity_ids" class="o_field_widget o_field_kanban_activity"><a
                                    class="o-mail-ActivityButton" role="button" aria-label="Show activities"
                                    title="Show activities"><i
                                        class="fa fa-fw fa-lg text-muted fa-clock-o btn-link text-dark"
                                        role="img"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        @endforeach

        <div class="o_kanban_record o_kanban_ghost flex-grow-1 flex-md-shrink-1 flex-shrink-0 my-0"></div>
        <div class="o_kanban_record o_kanban_ghost flex-grow-1 flex-md-shrink-1 flex-shrink-0 my-0"></div>
        <div class="o_kanban_record o_kanban_ghost flex-grow-1 flex-md-shrink-1 flex-shrink-0 my-0"></div>
        <div class="o_kanban_record o_kanban_ghost flex-grow-1 flex-md-shrink-1 flex-shrink-0 my-0"></div>
        <div class="o_kanban_record o_kanban_ghost flex-grow-1 flex-md-shrink-1 flex-shrink-0 my-0"></div>
        <div class="o_kanban_record o_kanban_ghost flex-grow-1 flex-md-shrink-1 flex-shrink-0 my-0"></div>
    </div>
</div>
@endsection

@push('scripts')
    <script>
        // contact-card click event by jquery
        $(document).on('click', '.contact-card', function () {
            let id = $(this).data('id');
            let url = "{{ route('contact.show', ['contact' => ':id']) }}";
            url = url.replace(':id', id);
            window.location.href = url;
        });
    </script>
@endpush
