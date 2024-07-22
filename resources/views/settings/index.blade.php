
@extends('layout.header')
@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    @vite(['resources/css/settings.css' ,
            'resources/css/odoo/web.assets_web.css'
])

    @section('title', 'Setting')
    @section('image_url', 'images/Settings.png')
    @section('navbar_menu')
        <li><a href="#">General Settings</a></li>
        <li><a href="#">Users & Companies</a></li>
    @endsection



<body>
    <section class="se_form_renderer">
        <div class="se_form_main_row">
            <div class="d-flex align-items-start">
                <div class="se_form_main_left nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">
                        <span class="nav-link-icon">
                            <img src="images/Settings.png" alt="Avatar" class="crm_logo">
                        </span>
                        General Settings
                    </button>
                    <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                        <span class="nav-link-icon">
                            <img src="images/CRM.png" alt="Avatar" class="crm_logo">
                        </span>
                        CRM
                    </button>
                    <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">
                        <span class="nav-link-icon">
                            <img src="images/Sales.png" alt="Avatar" class="crm_logo">
                        </span>
                        Sales
                    </button>
                    <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">
                        <span class="nav-link-icon">
                            <img src="images/Calendar.png" alt="Avatar" class="crm_logo">
                        </span>
                        Calendar
                    </button>
                    <button class="nav-link" id="v-pills-website-tab" data-bs-toggle="pill" data-bs-target="#v-website-settings" type="button" role="tab" aria-controls="v-website-settings" aria-selected="false">
                        <span class="nav-link-icon">
                            <img src="images/Website.png" alt="Avatar" class="crm_logo">
                        </span>
                        Website
                    </button>
                    <button class="nav-link" id="v-purchase-settings-tab" data-bs-toggle="pill" data-bs-target="#v-purchase-settings" type="button" role="tab" aria-controls="v-purchase-settings" aria-selected="false">
                        <span class="nav-link-icon">
                            <img src="images/Purchase.png" alt="Avatar" class="crm_logo">
                        </span>
                        Purchase
                    </button>
                    <button class="nav-link" id="v-inventory-settings-tab" data-bs-toggle="pill" data-bs-target="#v-inventory-settings" type="button" role="tab" aria-controls="v-inventory-settings" aria-selected="false">
                        <span class="nav-link-icon">
                            <img src="images/Inventory.png" alt="Avatar" class="crm_logo">
                        </span>
                        Inventory
                    </button>
                    <button class="nav-link" id="v-manufacturing-settings-tab" data-bs-toggle="pill" data-bs-target="#v-manufacturing-settings" type="button" role="tab" aria-controls="v-manufacturing-settings" aria-selected="false">
                        <span class="nav-link-icon">
                            <img src="images/Manufacturing.png" alt="Avatar" class="crm_logo">
                        </span>
                        Manufacturing
                    </button>
                    <button class="nav-link" id="v-accounting-settings-tab" data-bs-toggle="pill" data-bs-target="#v-accounting-settings" type="button" role="tab" aria-controls="v-accounting-settings" aria-selected="false">
                        <span class="nav-link-icon">
                            <img src="images/Accounting.png" alt="Avatar" class="crm_logo">
                        </span>
                        Accounting
                    </button>
                    <button class="nav-link" id="v-project-settings-tab" data-bs-toggle="pill" data-bs-target="#v-project-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">
                        <span class="nav-link-icon">
                            <img src="images/Project.png" alt="Avatar" class="crm_logo">
                        </span>
                        Project
                    </button>
                    <button class="nav-link" id="v-sign-settings-tab" data-bs-toggle="pill" data-bs-target="#v-sign-settings" type="button" role="tab" aria-controls="v-sign-settings" aria-selected="false">
                        <span class="nav-link-icon">
                            <img src="images/Sign.png" alt="Avatar" class="crm_logo">
                        </span>
                        Sign
                    </button>
                    <button class="nav-link" id="v-planning-settings-tab" data-bs-toggle="pill" data-bs-target="#v-planning-settings" type="button" role="tab" aria-controls="v-planning-settings" aria-selected="false">
                        <span class="nav-link-icon">
                            <img src="images/Planning.png" alt="Avatar" class="crm_logo">
                        </span>
                        Planning
                    </button>
                    <button class="nav-link" id="v-timesheets-settings-tab" data-bs-toggle="pill" data-bs-target="#v-timesheets-settings" type="button" role="tab" aria-controls="v-timesheets-settings" aria-selected="false">
                        <span class="nav-link-icon">
                            <img src="images/Timesheets.png" alt="Avatar" class="crm_logo">
                        </span>
                        Timesheets
                    </button>
                    <button class="nav-link" id="v-email-marketing-settings-tab" data-bs-toggle="pill" data-bs-target="#v-email-marketing-settings" type="button" role="tab" aria-controls="v-email-marketing-settings" aria-selected="false">
                        <span class="nav-link-icon">
                            <img src="images/Email-Marketing.png" alt="Avatar" class="crm_logo">
                        </span>
                        Email Marketing
                    </button>
                    <button class="nav-link" id="v-employees-settings-tab" data-bs-toggle="pill" data-bs-target="#v-employees-settings" type="button" role="tab" aria-controls="v-employees-settings" aria-selected="false">
                        <span class="nav-link-icon">
                            <img src="images/Employees.png" alt="Avatar" class="crm_logo">
                        </span>
                        Employees
                    </button>
                    <button class="nav-link" id="v-documents-settings-tab" data-bs-toggle="pill" data-bs-target="#v-documents-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">
                        <span class="nav-link-icon">
                            <img src="images/Documents.png" alt="Avatar" class="crm_logo">
                        </span>
                        Documents
                    </button>
                    <button class="nav-link" id="v-recruitment-settings-tab" data-bs-toggle="pill" data-bs-target="#v-recruitment-settings" type="button" role="tab" aria-controls="v-recruitment-settings" aria-selected="false">
                        <span class="nav-link-icon">
                            <img src="images/Recruitment.png" alt="Avatar" class="crm_logo">
                        </span>
                        Recruitment
                    </button>
                    <button class="nav-link" id="v-fieldservice-settings-tab" data-bs-toggle="pill" data-bs-target="#v-fieldservice-settings" type="button" role="tab" aria-controls="v-fieldservice-settings" aria-selected="false">
                        <span class="nav-link-icon">
                            <img src="images/Field-Service.png" alt="Avatar" class="crm_logo">
                        </span>
                        Field Service
                    </button>
                    <button class="nav-link" id="v-expenses-settings-tab" data-bs-toggle="pill" data-bs-target="#v-expenses-settings" type="button" role="tab" aria-controls="v-expenses-settings" aria-selected="false">
                        <span class="nav-link-icon">
                            <img src="images/Expenses.png" alt="Avatar" class="crm_logo">
                        </span>
                        Expenses
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

{{--                                                <form action="{{ route('setting.invitMail') }}" method="POST">--}}
{{--                                                    @csrf--}}
{{--                                                    <div class="teb_user-input-group input-group">--}}
{{--                                                        <input type="email" class="teb_user_input" placeholder="Enter e-mail address" name="mail" aria-label="Recipient's username with two button addons" style="width: initial">--}}
{{--                                                        <button class="teb_user_btn" type="submit">Invite</button>--}}
{{--                                                    </div>--}}
{{--                                                </form>--}}

                                                <p class="o_form_label pt-3">Pending Invitations:</p>
                                                    @foreach($panddingUsers as $panndingUser)
                                                <span>
                                                    <a href="#" class="badge rounded-pill text-primary border border-primary o_web_settings_user">{{ $panndingUser->email }}</a>
                                                </span>
                                                    @endforeach
                                            </div>

                                        </div>
{{--                                        <div class="teb_user_inner_col">--}}
{{--                                            <div class="mt16"><span class="fa fa-lg fa-users" aria-label="Number of active users"></span><div name="active_user_count" class="o_field_widget o_readonly_modifier o_field_integer w-auto ps-3 fw-bold"><span>6</span></div><span class="o_form_label"><span searchabletext="Active Users">--}}
{{--                                        Active Users--}}
{{--                                            </span></span><a href="https://www.odoo.com/documentation/saas-17.2/applications/general/users.html" title="Documentation" class="o_doc_link" target="_blank"></a><br><button class="btn btn-link o_web_settings_access_rights" name="69" type="action"><i class="o_button_icon oi oi-fw oi-arrow-right me-1"></i><span searchabletext="Manage Users">Manage Users</span></button></div>--}}
{{--                                        </div>--}}
                                        <div class="o_setting_right_pane" data-tooltip-delay="800" data-tooltip=""><div class="mt16"><span class="fa fa-lg fa-users" aria-label="Number of active users"></span><div name="active_user_count" class="o_field_widget o_readonly_modifier o_field_integer w-auto ps-3 fw-bold"><span>8</span></div><span class="o_form_label"><span searchabletext="
                                        Active Users">
                                        Active Users
                                    </span></span>
                                                <a href="https://www.odoo.com/documentation/saas-17.2/applications/general/users.html" title="Documentation" class="o_doc_link" target="_blank"></a><br>
                                                <a href="{{ route('setting.users') }}" class="btn btn-link o_web_settings_access_rights" name="69" type="action" target="_blank">
                                                    <i class="o_button_icon oi oi-fw oi-arrow-right me-1"></i>
                                                    <span searchabletext="Manage Users">Manage Users</span>
                                                </a></div></div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane-row">
                                <div class="tab-content-inner">
                                    <h2>Languages</h2>
                                </div>
                                <div class="languages_box">
                                    <div class="languages_box_inner">
                                        <p>1 Language</p>
                                        <a href="#"><span><svg fill="#000000" height="64px" width="64px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 330 330" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path id="XMLID_27_" d="M15,180h263.787l-49.394,49.394c-5.858,5.857-5.858,15.355,0,21.213C232.322,253.535,236.161,255,240,255 s7.678-1.465,10.606-4.394l75-75c5.858-5.857,5.858-15.355,0-21.213l-75-75c-5.857-5.857-15.355-5.857-21.213,0 c-5.858,5.857-5.858,15.355,0,21.213L278.787,150H15c-8.284,0-15,6.716-15,15S6.716,180,15,180z"></path></g></svg></span>Add Languages</a>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane-row">
                                <div class="tab-content-inner">
                                    <h2>Companies</h2>
                                </div>
                                <div class="languages_box">
                                    <div class="languages_box_inner">

                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane-row">
                                <div class="tab-content-inner">
                                    <h2>Units of Measure</h2>
                                </div>
                                <div class="languages_box">
                                    <div class="languages_box_inner">

                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane-row">
                                <div class="tab-content-inner">
                                    <h2>Discuss</h2>
                                </div>
                                <div class="languages_box">
                                    <div class="languages_box_inner">

                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane-row">
                                <div class="tab-content-inner">
                                    <h2>Statistics</h2>
                                </div>
                                <div class="languages_box">
                                    <div class="languages_box_inner">

                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane-row">
                                <div class="tab-content-inner">
                                    <h2>Contacts</h2>
                                </div>
                                <div class="languages_box">
                                    <div class="languages_box_inner">

                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane-row">
                                <div class="tab-content-inner">
                                    <h2>Integrations</h2>
                                </div>
                                <div class="languages_box">
                                    <div class="languages_box_inner">

                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane-row">
                                <div class="tab-content-inner">
                                    <h2>Developer Tools</h2>
                                </div>
                                <div class="languages_box">
                                    <div class="languages_box_inner">
                                        <div class="developer_tools_box-left">
                                            <div class="developer_tools_wapper">
                                                <div class="developer_tools_innerwapper">
                                                    <a href="#">Activate the developer mode</a>
                                                    <a href="#">Activate the developer mode (with assets)</a>
                                                    <a href="#">Activate the developer mode (with tests assets)</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="about_box-right">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane-row">
                                <div class="tab-content-inner">
                                    <h2>About</h2>
                                </div>
                                <div class="languages_box">
                                    <div class="languages_box_inner">
                                        <div class="about_box-left">
                                            <div class="about_box_wapper">
                                                <div class="about_imgbox_wapper">
                                                    <a href="#"><img src="assets/images/google_play.png" alt="google_play"></a>

                                                </div>
                                                <div class="about_imgbox_wapper">
                                                    <a href="#"><img src="assets/images/app_store.png" alt="app_store"></a>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="about_box-right">

                                        </div>
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
