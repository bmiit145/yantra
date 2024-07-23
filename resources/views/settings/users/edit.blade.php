@extends('layout.header')
@section('content')

    @vite([
        'resources/css/common/header.css',
       'resources/css/usercreat.css',
       'resources/css/odoo/web.assets_web.css',
    ])

    @section('title', 'Setting')
    @section('image_url', '/images/Settings.png')
    @section('navbar_menu')
        <li><a href="#">General Settings</a></li>
        <li><a href="#">Users & Companies</a></li>
    @endsection

    <section class="new_leads_section">
        <div class="container-full">
            <div class="mx-3 o_form_statusbar position-relative d-flex justify-content-between mb-0 mb-md-2 pb-2 pb-md-0 mt16">
                <div class="o_statusbar_buttons d-flex align-items-center align-content-around flex-wrap gap-1">
                    @if(!empty($user->id))
                    <button invisible="state != 'active'" class="btn btn-secondary" name="action_reset_password" type="object">
                        <span>Re-send Invitation Email</span>
                    </button>
                    @endif
                    <button type="button" class="head_new_btn save_user_btn border-0" id="save_user_btn">save</button>
                </div>
                <div name="state" class="o_field_widget o_readonly_modifier o_field_statusbar">
                    <div class="o_statusbar_status" role="radiogroup">
                        <button type="button" class="btn btn-secondary dropdown-toggle o_arrow_button o_first o-dropdown dropdown d-none" disabled="" aria-expanded="false"> ... </button>
                        @if($user->is_confirmed && $user->remember_token)
                        <button type="button" class="btn btn-secondary o_arrow_button o_first {{ $user->is_confirmed && $user->remember_token ? 'o_arrow_button_current' : '' }}" role="radio" disabled="" aria-label="Not active state" aria-checked="false" data-value="active">Reset Password</button>
                        @endif
                        <button type="button" class="btn btn-secondary o_arrow_button {{isset($user) && $user->is_confirmed && $user->remember_token ? 'o_last' : 'o_first' }} {{ $user->email_verified_at ? 'o_arrow_button_current' : '' }}" role="radio" disabled="" aria-label="Not active state" aria-checked="false" data-value="active">Confirmed</button>
                        <button type="button" class="btn btn-secondary o_arrow_button  o_last {{ isset($user) && $user->is_confirmed ? '': 'o_arrow_button_current'  }}" role="radio" disabled="" aria-label="Current state" aria-checked="true" aria-current="step" data-value="new">Never Connected</button>
                        <button type="button" class="btn btn-secondary dropdown-toggle o_arrow_button o_last o-dropdown dropdown d-none" disabled="" aria-expanded="false"> ... </button>
                        <button type="button" class="btn btn-secondary dropdown-toggle o-dropdown dropdown d-none" disabled="" aria-expanded="false">Never Connected</button>
                    </div>
                </div>
            </div>
        </div>
        {{--             alert box --}}
        @if($user->remember_token)
        <div class=" mx-3 alert alert-success text-center o_form_header alert-dismissible" role="status">
            <button data-bs-dismiss="alert" aria-label="Close" class="btn btn-close" disabled=""></button>
            <div>
                <strong>An invitation email containing the following subscription link has been sent:</strong>
            </div>
            <div>
                <div name="signup_url" class="o_field_widget o_readonly_modifier o_field_url">
                    <a class="o_field_widget o_form_uri" target="_blank" href="{{ route('login.showPassword', ['token' => $user->remember_token]) }}">{{ route('login.showPassword', ['token' => $user->remember_token])  }}</a>
                </div>
            </div>
        </div>
        @endif
{{--         END --}}

        <div class="new_leads_main_row">
                <div class="new_leads_main y_action_manager mx-3 my-0">
                    {{--               <div class="oe_title">--}}
                    {{--                   <label class="y_form_label" for="name_0">Name</label>--}}
                    {{--                   <h1>--}}
                    {{--                       <div name="name" class="y_field_widget y_required_modifier y_field_char">--}}
                    {{--                           <input class="y_input" id="name_0" type="text" autocomplete="off" placeholder="e.g. John Doe">--}}
                    {{--                       </div>--}}
                    {{--                   </h1>--}}
                    {{--                   <label class="y_form_label" for="login_0">Email<sup class="text-info p-1" data-tooltip-template="web.FieldTooltip" data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;Used to log into the system&quot;}}" data-tooltip-touch-tap-to-show="true">?</sup>--}}
                    {{--                   </label>--}}
                    {{--                   <h2>--}}
                    {{--                       <div name="login" class="y_field_widget y_required_modifier y_field_char">--}}
                    {{--                           <input class="y_input" id="login_0" type="text" autocomplete="off" placeholder="e.g. email@yourcompany.com">--}}
                    {{--                       </div>--}}
                    {{--                   </h2>--}}
                    {{--                   <div class="y_inner_group grid">--}}
                    {{--                   </div>--}}
                    {{--               </div>--}}

                    <form method="post" enctype="multipart/form-data" id="user_update_form">
                        @csrf
                        @if(!empty($user->id))
                            <input type="hidden" name="id" value="{{ $user->id }}">
                        @endif
                    <div class="new_leads_top">
                        <div class="new_leads_name">
                            <label class="d-block m-0">Name </label>
                            <input type="text" class="new_leadform-control" name="name" value="{{ $user->name }}" placeholder="e.g. Product Pricing" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        </div>
                        <div class="new_leads_name">
                            <label class="d-block m-0">Email? </label>
                            <input type="text" class="new_leadform-control" name="email" value="{{ $user->email }}" placeholder="e.g. email@yourcompany.com" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        </div>
                    </div>

                    <ul class="new_litablist nav nav-tabs" id="myTab" role="tablist">
                        <li class="new_litablist-itam" role="presentation">
                            <button class="new_litablist-btn nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Access Rights</button>
                        </li>
                        <li class="new_litablist-itam" role="presentation">
                            <button class="new_litablist-btn nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Preferences</button>
                        </li>
                    </ul>

                    <div class="tab-contentextra-info tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="form-floating">

                            </div>
                        </div>

                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
{{--                            <div class="y_group row align-items-start">--}}
{{--                                <div class="y_inner_group grid col-lg-6">--}}
{{--                                    <div class="g-col-sm-2">--}}
{{--                                        <div class="y_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">Marketing</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="y_wrap_field d-flex d-sm-contents mb-3 mb-sm-0">--}}
{{--                                        <div class="y_cell w-25 y_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900"><label class="y_form_label m-0" for="company_id_1">Company</label></div>--}}
{{--                                        <div class="y_cell y_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">--}}
{{--                                            <div name="company_id" class="y_field_widget y_field_many2one">--}}
{{--                                                <div class="y_field_many2one_selection">--}}
{{--                                                    <div class="y_input_dropdown">--}}
{{--                                                        <div class="o-autocomplete dropdown"><input type="text" class="o-autocomplete--input y_input" autocomplete="off" role="combobox" aria-autocomplete="list" aria-haspopup="listbox" id="company_id_1" placeholder="" aria-expanded="false"></div>--}}
{{--                                                        <span class="y_dropdown_button"></span>--}}
{{--                                                    </div>--}}
{{--                                                    <button type="button" class="btn btn-link text-action oi y_external_button oi-arrow-right" tabindex="-1" draggable="false" aria-label="Internal link" data-tooltip="Internal link"></button>--}}
{{--                                                </div>--}}
{{--                                                <div class="y_field_many2one_extra"></div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="y_wrap_field d-flex d-sm-contents mb-3 mb-sm-0">--}}
{{--                                        <div class="y_cell w-25 y_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900"><label class="y_form_label m-0" for="campaign_id_0">Campaign<sup class="text-info p-1" data-tooltip-template="web.FieldTooltip" data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;This is a name that helps you keep track of your different campaign efforts, e.g. Fall_Drive, Christmas_Special&quot;}}" data-tooltip-touch-tap-to-show="true">?</sup></label></div>--}}
{{--                                        <div class="y_cell y_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">--}}
{{--                                            <div name="campaign_id" class="y_field_widget y_field_many2one">--}}
{{--                                                <div class="y_field_many2one_selection">--}}
{{--                                                    <div class="y_input_dropdown">--}}
{{--                                                        <div class="o-autocomplete dropdown"><input type="text" class="o-autocomplete--input y_input" autocomplete="off" role="combobox" aria-autocomplete="list" aria-haspopup="listbox" id="campaign_id_0" placeholder="" aria-expanded="false"></div>--}}
{{--                                                        <span class="y_dropdown_button"></span>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="y_field_many2one_extra"></div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="y_wrap_field d-flex d-sm-contents mb-3 mb-sm-0">--}}
{{--                                        <div class="y_cell w-25 y_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900"><label class="y_form_label m-0" for="medium_id_0">Medium<sup class="text-info p-1" data-tooltip-template="web.FieldTooltip" data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;This is the method of delivery, e.g. Postcard, Email, or Banner Ad&quot;}}" data-tooltip-touch-tap-to-show="true">?</sup></label></div>--}}
{{--                                        <div class="y_cell y_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">--}}
{{--                                            <div name="medium_id" class="y_field_widget y_field_many2one">--}}
{{--                                                <div class="y_field_many2one_selection">--}}
{{--                                                    <div class="y_input_dropdown">--}}
{{--                                                        <div class="o-autocomplete dropdown"><input type="text" class="o-autocomplete--input y_input" autocomplete="off" role="combobox" aria-autocomplete="list" aria-haspopup="listbox" id="medium_id_0" placeholder="" aria-expanded="false"></div>--}}
{{--                                                        <span class="y_dropdown_button"></span>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="y_field_many2one_extra"></div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="y_wrap_field d-flex d-sm-contents mb-3 mb-sm-0">--}}
{{--                                        <div class="y_cell w-25 y_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900"><label class="y_form_label m-0" for="source_id_0">Source<sup class="text-info p-1" data-tooltip-template="web.FieldTooltip" data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;This is the source of the link, e.g. Search Engine, another domain, or name of email list&quot;}}" data-tooltip-touch-tap-to-show="true">?</sup></label></div>--}}
{{--                                        <div class="y_cell y_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">--}}
{{--                                            <div name="source_id" class="y_field_widget y_field_many2one">--}}
{{--                                                <div class="y_field_many2one_selection">--}}
{{--                                                    <div class="y_input_dropdown">--}}
{{--                                                        <div class="o-autocomplete dropdown"><input type="text" class="o-autocomplete--input y_input" autocomplete="off" role="combobox" aria-autocomplete="list" aria-haspopup="listbox" id="source_id_0" placeholder="" aria-expanded="false"></div>--}}
{{--                                                        <span class="y_dropdown_button"></span>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="y_field_many2one_extra"></div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="y_wrap_field d-flex d-sm-contents mb-3 mb-sm-0">--}}
{{--                                        <div class="y_cell w-25 y_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900"><label class="y_form_label m-0" for="referred_0">Referred By</label></div>--}}
{{--                                        <div class="y_cell y_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">--}}
{{--                                            <div name="referred" class="y_field_widget y_field_char"><input class="y_input" id="referred_0" type="text" autocomplete="off"></div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="y_inner_group grid col-lg-6">--}}
{{--                                    <div class="g-col-sm-2">--}}
{{--                                        <div class="y_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">Analysis</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="y_wrap_field d-flex d-sm-contents mb-3 mb-sm-0">--}}
{{--                                        <div class="y_cell w-25 y_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900"><label class="y_form_label m-0 y_form_label_readonly m-0" for="date_open_0">Assignment Date</label></div>--}}
{{--                                        <div class="y_cell y_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">--}}
{{--                                            <div name="date_open" class="y_field_widget y_readonly_modifier y_field_datetime">--}}
{{--                                                <div class="d-flex gap-2 align-items-center"><span class="text-truncate">07/09/2024 12:06:28</span></div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="y_wrap_field d-flex d-sm-contents mb-3 mb-sm-0">--}}
{{--                                        <div class="y_cell w-25 y_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900"><label class="y_form_label m-0 y_form_label_readonly m-0" for="date_closed_0">Closed Date</label></div>--}}
{{--                                        <div class="y_cell y_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">--}}
{{--                                            <div name="date_closed" class="y_field_widget y_readonly_modifier y_field_datetime">--}}
{{--                                                <div class="d-flex gap-2 align-items-center"><span class="text-truncate"></span></div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>
                    </div>

                    </form>

                </div>

            </div>
        </div>
    </section>

@endsection


@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script>
        // name action_reset_password click
        $(document).on('ready' , function () {

            // reset password
            @if(!empty($user->id))
            $('button[name="action_reset_password"]').click(function () {
                window.location.href = "{{ route('reset.password' , ['encEmail' => $user->email]) }}"
            });
            @endif

            // user update save
            $('#save_user_btn').click(function () {
                let form = $('#user_update_form');
                let data = form.serialize();
                $.ajax({
                    url: "{{ route('user.update') }}",
                    method: 'post',
                    data: data,
                    success: function (response) {
                        if(response.create){
                            location.href = response.create;
                            return;
                        }
                        if (response.success) {
                            console.log(response);
                            toastr.success(response.success);
                            return;
                        }
                        else{
                            toastr.error(response.error);
                        }
                    },
                    error: function (error) {
                        toastr.error(error.responseJSON.message);
                    }
                });
            });

        });
    </script>
@endpush
