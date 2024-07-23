
@extends('layout.header')
@section('head')
    @vite(['resources/css/settings.css' ,
            'resources/css/odoo/web.assets_web.css'
])
    @endsection

    @section('title', 'Setting')
    @section('image_url', 'images/Settings.png')
    @section('navbar_menu')
        <li><a href="{{ route('setting.index') }}">General Settings</a></li>
        <li><a href="{{ route('setting.users')  }}">Users</a></li>
    @endsection

@section('head_new_btn_link' , route('setting.user'))
@section('content')
<body>
    <section class="se_form_renderer">
        <div class="se_form_main_row">
            <div class="d-flex align-items-start">
                <div class="se_form_main_left nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">
                        <span class="nav-link-icon">
                            <img src="/images/Settings.png" alt="Avatar" class="crm_logo">
                        </span>
                        General Settings
                    </button>
                </div>

                <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab" tabindex="0">
                            <div class="tab-pane-row">
                                <div class="tab-content-inner">
                                    <h2>Users</h2>
                                </div>
                                <div class="teb_users_info">
                                    <div class="teb_user_inner_row">
                                        <div class="teb_user_inner_col">
                                            <div class="teb_user_inner_main ">
                                                <div class="teb_user-title">
                                                    <p>Invite New Users</p>
                                                </div>
                                                @if(session()->has('message'))
                                                    <div class="alert alert-success">
                                                        {{ session()->get('message') }}
                                                    </div>
                                                @endif

                                                <form action="{{ route('setting.invitMail') }}" method="POST">
                                                    @csrf
                                                    <div class="d-flex">
                                                        <input class="o_user_emails o_input mt8 text-truncate" type="text" name="mail" placeholder="Enter e-mail address">
                                                        <button class="btn btn-primary teb_user_btn o_web_settings_invite flex-shrink-0"><strong>Invite</strong></button>
                                                    </div>
                                                </form>


                                                <p class="o_form_label pt-3">Pending Invitations:</p>
                                                    @foreach($panddingUsers as $panndingUser)
                                                <span>
                                                    <a href="{{ route('setting.user' , [ 'id' => $panndingUser->id ]) }}" class="badge rounded-pill text-primary border border-primary o_web_settings_user">{{ $panndingUser->email }}</a>
                                                </span>
                                                    @endforeach
                                            </div>

                                        </div>

                                        <div class="o_setting_right_pane" data-tooltip-delay="800" data-tooltip=""><div class="mt16"><span class="fa fa-lg fa-users" aria-label="Number of active users"></span><div name="active_user_count" class="o_field_widget o_readonly_modifier o_field_integer w-auto ps-3 fw-bold">
                                                    <span>{{ $totalUsers }}</span>
                                                </div>
                                                <span class="o_form_label">
                                                    <span searchabletext="Active Users">Active Users</span>
                                                </span>
                                                <a href="https://www.odoo.com/documentation/saas-17.2/applications/general/users.html" title="Documentation" class="o_doc_link" target="_blank"></a><br>
                                                <a href="{{ route('setting.users') }}" class="btn btn-link o_web_settings_access_rights" name="69" type="action" target="_blank">
                                                    <i class="o_button_icon oi oi-fw oi-arrow-right me-1"></i>
                                                    <span searchabletext="Manage Users">Manage Users</span>
                                                </a></div></div>
                                    </div>
                                </div>
                            </div>



                        </div>
                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab" tabindex="0">test2</div>
                        <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab" tabindex="0">test3</div>
                        <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab" tabindex="0">test4</div>
                        <div class="tab-pane fade" id="v-website-settings" role="tabpanel" aria-labelledby="v-website-settings-tab" tabindex="0">test5</div>
                        <div class="tab-pane fade" id="v-purchase-settings" role="tabpanel" aria-labelledby="v-purchase-settings-tab" tabindex="0">test6</div>
                        <div class="tab-pane fade" id="v-inventory-settings" role="tabpanel" aria-labelledby="v-inventory-settings-tab" tabindex="0">test7</div>
                        <div class="tab-pane fade" id="v-manufacturing-settings" role="tabpanel" aria-labelledby="v-manufacturing-settings-tab" tabindex="0">test8</div>
                        <div class="tab-pane fade" id="v-accounting-settings" role="tabpanel" aria-labelledby="v-accounting-settings-tab" tabindex="0">test9</div>
                        <div class="tab-pane fade" id="v-project-settings" role="tabpanel" aria-labelledby="v-project-settings-tab" tabindex="0">test10</div>
                        <div class="tab-pane fade" id="v-sign-settings" role="tabpanel" aria-labelledby="v-sign-settings-tab" tabindex="0">test11</div>
                        <div class="tab-pane fade" id="v-planning-settings" role="tabpanel" aria-labelledby="v-planning-settings-tab" tabindex="0">test12</div>
                        <div class="tab-pane fade" id="v-timesheets-settings" role="tabpanel" aria-labelledby="v-timesheets-settings-tab" tabindex="0">test13</div>
                        <div class="tab-pane fade" id="v-email-marketing-settings" role="tabpanel" aria-labelledby="v-email-marketing-settings-tab" tabindex="0">test14</div>
                        <div class="tab-pane fade" id="v-employees-settings" role="tabpanel" aria-labelledby="v-employees-settings-tab" tabindex="0">test15</div>
                        <div class="tab-pane fade" id="v-documents-settings" role="tabpanel" aria-labelledby="v-documents-settings-tab" tabindex="0">test16</div>
                        <div class="tab-pane fade" id="v-recruitment-settings" role="tabpanel" aria-labelledby="v-recruitment-settings-tab" tabindex="0">test17</div>
                        <div class="tab-pane fade" id="v-fieldservice-settings" role="tabpanel" aria-labelledby="v-fieldservice-settings-tab" tabindex="0">test18</div>
                        <div class="tab-pane fade" id="v-expenses-settings" role="tabpanel" aria-labelledby="v-expenses-settings-tab" tabindex="0">test19</div>
                    </div>
                </div>
        </div>
    </section>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>



@endsection
