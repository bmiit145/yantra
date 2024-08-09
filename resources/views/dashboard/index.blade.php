<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/dashboard.css')
    <title>Dashboard</title>

    <link href="{{ asset('images/favicon.png') }}" rel="shortcut icon" type="image/x-icon">

    {{-- <link rel="stylesheet" href="{{ asset('css/home.css') }}"> --}}
</head>

<body>
    <div class="top_header">

        <div class="top_main_navbar">
            <ul class="top_right_navbar">
                <li>
                    <a href="#" class="dropdown-toggle footer_class">
                        <svg class="svg-icon"
                            style="width: 1em; height: 1em; vertical-align: middle; fill: currentColor; overflow: hidden;"
                            viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M678.4 691.2l-60.8 60.8-179.2-176V243.2h86.4v294.4l153.6 153.6z m288-169.6c0 249.6-201.6 454.4-454.4 454.4S57.6 774.4 57.6 521.6C57.6 272 262.4 70.4 512 67.2c249.6 3.2 454.4 204.8 454.4 454.4z m-86.4 0C880 320 713.6 156.8 512 156.8S144 320 144 521.6c0 201.6 163.2 368 368 368 201.6 0 368-163.2 368-368z" />
                        </svg>
                    </a>
                    <div class="dropdown-menu" style="width: 300%;">
                        <a href="#">Option 1</a>
                        <a href="#">Option 2</a>
                        <a href="#">Option 3</a>
                    </div>
                </li>

                <li>
                    <a href="#" class="dropdown-toggle footer_class">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            style="width: 1em; height: 1em; vertical-align: middle; fill: currentColor; overflow: hidden;"
                            version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512"
                            x="0" y="0" viewBox="0 0 512.013 512.013" style="enable-background:new 0 0 512 512"
                            xml:space="preserve" class="">
                            <g>
                                <path
                                    d="m369.871 280.394-34.14 34.141-.001-.001L99.904 78.707l18.124-18.124L42.877.014 0 42.891l60.569 75.15 18.125-18.124 235.827 235.827-34.141 34.141 48.69 48.689 89.49-89.49zM439.773 350.297l-89.49 89.49 53.692 53.692c11.952 11.952 27.843 18.534 44.746 18.534 16.902 0 32.793-6.582 44.745-18.534 24.672-24.673 24.672-64.817 0-89.49z"
                                    fill="#000000" opacity="1" data-original="#000000" class=""></path>
                                <path
                                    d="m259.136 322.785-69.9-69.9-51.176 51.169c-37.59-11.78-78.61-1.94-106.9 26.36C11.07 350.504 0 377.213 0 405.634c0 28.41 11.07 55.13 31.16 75.22 20.74 20.74 47.98 31.11 75.22 31.11s54.49-10.37 75.22-31.11c28.3-28.29 38.14-69.31 26.36-106.9zM130.73 429.973c-13.45 13.45-35.25 13.45-48.69 0-13.45-13.44-13.45-35.24 0-48.69 13.44-13.44 35.24-13.44 48.69 0 13.44 13.45 13.44 35.251 0 48.69zM505.04 64.163l-8.36-21.35-53.67 53.67-21.67-5.81-5.81-21.67 53.67-53.66-21.35-8.37c-37.43-14.66-79.97-5.78-108.38 22.63-26.02 26.02-35.66 63.91-25.82 98.86l-60.777 60.784 69.9 69.9 60.777-60.784c9.02 2.54 18.22 3.78 27.37 3.78 26.33-.01 52.18-10.29 71.49-29.6 28.41-28.409 37.29-70.949 22.63-108.38z"
                                    fill="#000000" opacity="1" data-original="#000000" class=""></path>
                            </g>
                        </svg>
                    </a>
                    <div class="dropdown-menu" style="width: 300%;">
                        <a href="#">Option 1</a>
                        <a href="#">Option 2</a>
                        <a href="#">Option 3</a>
                    </div>
                </li>
                <li>
                    <a href="#" class="dropdown-toggle footer_class">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            style="width: 1em; height: 1em; vertical-align: middle; fill: currentColor; overflow: hidden;"
                            version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512"
                            x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512"
                            xml:space="preserve" class="">
                            <g>
                                <path
                                    d="M349.899 313.5v-.3c-7.5-7.8-15.599-15.601-25.199-23.101 65.4-20.7 101.999-70.499 101.999-140.4 0-62.999-33.3-116.1-84.6-135.901C317.501 4.499 280.299 0 228.099 0H35.5v512h124.2V309.899c36.711 0 34.854 5.895 47.999 20.101 15.312 16.735 67.089 98.459 120.901 182h147.9c-60.864-101.473-104.654-174.391-126.601-198.5zM159.7 111.299c26.206-.084 92.305-.437 104.099 1.201 23.701 4.2 35.7 18.6 35.7 43.2 0 21.599-9 36.299-26.1 42.299-19.349 6.912-86.441 4.801-113.699 4.801z"
                                    fill="#00a5a8" opacity="1" data-original="#000000" class=""></path>
                            </g>
                        </svg>
                    </a>
                    <div class="dropdown-menu" style="width: 300%;">
                        <a href="#">Option 1</a>
                        <a href="#">Option 2</a>
                        <a href="#">Option 3</a>
                    </div>
                </li>

                <li>
                    <a href="{{ route('logout') }}" class="logout-btn footer_class" title="Logout">
                        <svg class="svg-icon" style="width: 1em; height: 1em; vertical-align: middle; fill: currentColor; overflow: hidden;" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg">
                            <path d="M868 732v68c0 47.6-38.4 86-86 86H214c-47.6 0-86-38.4-86-86V224c0-47.6 38.4-86 86-86h568c47.6 0 86 38.4 86 86v68h-60v-68c0-14.4-11.6-26-26-26H214c-14.4 0-26 11.6-26 26v576c0 14.4 11.6 26 26 26h568c14.4 0 26-11.6 26-26v-68h60zM574.6 507.4L462.6 395.4c-12.4-12.4-32.6-12.4-45 0s-12.4 32.6 0 45l79.4 79.4H168c-17.6 0-32 14.4-32 32s14.4 32 32 32h329.4l-79.4 79.4c-12.4 12.4-12.4 32.6 0 45s32.6 12.4 45 0l112-112c12.4-12.4 12.4-32.6 0-45z"/>
                        </svg>
                    </a>
{{--                    <div class="dropdown-menu" style="width: 300%;">--}}
{{--                        <a href="#">Option 1</a>--}}
{{--                        <a href="#">Option 2</a>--}}
{{--                        <a href="#">Option 3</a>--}}
{{--                    </div>--}}
                </li>
            </ul>
        </div>
    </div>
    <section class="logo-home-section">
        <div class="container">


            <div class="main-home-wrapper">
                <div role="listbox" class="main-home-wrapper_row">
                    <div class="main_inner_block" id="box0">
                        <a role="option" class="main_inner_wrapper" id="result_app_0" aria-selected="false"
                            data-menu-xmlid="mail.menu_root_discuss" href="#menu_id=81&amp;action_id=123">
                            <img class="home_app_icon" src="{{ asset('images/Discuss.png') }}">
                            <div class="home_caption">Discuss</div>
                        </a>
                    </div>
                    <div class="main_inner_block" id="box1">
                        <a role="option" class="main_inner_wrapper" id="result_app_1" aria-selected="false"
                            data-menu-xmlid="calendar.mail_menu_calendar" href="#menu_id=222&amp;action_id=338">
                            <img class="home_app_icon" src="{{ asset('images/Calendar.png') }}">
                            <div class="home_caption">Calendar</div>
                        </a>
                    </div>
                    <div class="main_inner_block" id="box2">
                        <a role="option" class="main_inner_wrapper" id="result_app_2" aria-selected="false"
                            data-menu-xmlid="appointment.main_menu_appointments" href="#">
                            <img class="home_app_icon" src="{{ asset('images/Appointments.png') }}">
                            <div class="home_caption">Appointments</div>
                        </a>
                    </div>
                    <div class="main_inner_block" id="box3">
                        <a role="option" class="main_inner_wrapper" id="result_app_3" aria-selected="false"
                            data-menu-xmlid="project_todo.menu_todo_todos" href="#">
                            <img class="home_app_icon" src="{{ asset('images/To-do.png') }}">
                            <div class="home_caption">To-do</div>
                        </a>
                    </div>
                    <div class="main_inner_block" id="box4">
                        <a role="option" class="main_inner_wrapper" id="result_app_4" aria-selected="false"
                            data-menu-xmlid="knowledge.knowledge_menu_root" href="#">
                            <img class="home_app_icon" src="{{ asset('images/Knowledge.png') }}">
                            <div class="home_caption">Knowledge</div>
                        </a>
                    </div>
                    <div class="main_inner_block" id="box5">
                        <a  href="{{ route('contact.index') }}" role="option" class="main_inner_wrapper" id="result_app_5" aria-selected="false"
                            data-menu-xmlid="contacts.menu_contacts" href="#">
                            <img class="home_app_icon" src="{{ asset('images/Contacts.png') }}">
                            <div class="home_caption">Contacts</div>
                        </a>
                    </div>
                    <div class="main_inner_block" id="box6">
                        <a role="option" class="main_inner_wrapper" id="result_app_6" aria-selected="false"
                            data-menu-xmlid="crm.crm_menu_root" href="{{ route('crm.index') }}">
                            <img class="home_app_icon" src="{{ asset('images/CRM.png') }}">
                            <div class="home_caption">CRM</div>
                        </a>
                    </div>
                    <div class="main_inner_block" id="box7">
                        <a role="option" class="main_inner_wrapper" id="result_app_7" aria-selected="false"
                            data-menu-xmlid="sale.sale_menu_root" href="#">
                            <img class="home_app_icon" src="{{ asset('images/Sales.png') }}">
                            <div class="home_caption">Sales</div>
                        </a>
                    </div>
                    <div class="main_inner_block" id="box8">
                        <a role="option" class="main_inner_wrapper" id="result_app_8" aria-selected="false"
                            data-menu-xmlid="spreadsheet_dashboard.spreadsheet_dashboard_menu_root" href="#">
                            <img class="home_app_icon" src="{{ asset('images/Dashboards.png') }}">
                            <div class="home_caption">Dashboards</div>
                        </a>
                    </div>
                    <div class="main_inner_block" id="box9">
                        <a role="option" class="main_inner_wrapper" id="result_app_9" aria-selected="false"
                            data-menu-xmlid="account_accountant.menu_accounting" href="#">
                            <img class="home_app_icon" src="{{ asset('images/Accounting.png') }}">
                            <div class="home_caption">Accounting</div>
                        </a>
                    </div>
                    <div class="main_inner_block" id="box10">
                        <a role="option" class="main_inner_wrapper" id="result_app_10" aria-selected="false"
                            data-menu-xmlid="documents.menu_root" href="#">
                            <img class="home_app_icon" src="{{ asset('images/Documents.png') }}">
                            <div class="home_caption">Documents</div>
                        </a>
                    </div>
                    <div class="main_inner_block" id="box10">
                        <a role="option" class="main_inner_wrapper" id="result_app_11" aria-selected="false"
                            data-menu-xmlid="project.menu_main_pm" href="#">
                            <img class="home_app_icon" src="{{ asset('images/Project.png') }}">
                            <div class="home_caption">Project</div>
                        </a>
                    </div>
                    <div class="main_inner_block">
                        <a role="option" class="main_inner_wrapper" id="result_app_12" aria-selected="false"
                            data-menu-xmlid="hr_timesheet.timesheet_menu_root" href="#">
                            <img class="home_app_icon" src="{{ asset('images/Timesheets.png') }}">
                            <div class="home_caption">Timesheets</div>
                        </a>
                    </div>
                    <div class="main_inner_block">
                        <a role="option" class="main_inner_wrapper" id="result_app_13" aria-selected="false"
                            data-menu-xmlid="industry_fsm.fsm_menu_root" href="#">
                            <img class="home_app_icon" src="{{ asset('images/Field-Service.png') }}">
                            <div class="home_caption">Field Service</div>
                        </a>
                    </div>
                    <div class="main_inner_block">
                        <a role="option" class="main_inner_wrapper" id="result_app_14" aria-selected="false"
                            data-menu-xmlid="planning.planning_menu_root" href="#">
                            <img class="home_app_icon" src="{{ asset('images/Planning.png') }}">
                            <div class="home_caption">Planning</div>
                        </a>
                    </div>
                    <div class="main_inner_block">
                        <a role="option" class="main_inner_wrapper" id="result_app_15" aria-selected="false"
                            data-menu-xmlid="website.menu_website_configuration" href="#">
                            <img class="home_app_icon" src="{{ asset('images/Website.png') }}">
                            <div class="home_caption">Website</div>
                        </a>
                    </div>
                    <div class="main_inner_block">
                        <a role="option" class="main_inner_wrapper" id="result_app_16" aria-selected="false"
                            data-menu-xmlid="mass_mailing.mass_mailing_menu_root" href="#">
                            <img class="home_app_icon" src="{{ asset('images/Email-Marketing.png') }}">
                            <div class="home_caption">Email Marketing</div>
                        </a>
                    </div>
                    <div class="main_inner_block">
                        <a role="option" class="main_inner_wrapper" id="result_app_17" aria-selected="false"
                            data-menu-xmlid="mass_mailing_sms.mass_mailing_sms_menu_root" href="#">
                            <img class="home_app_icon" src="{{ asset('images/SMS-Marketing.png') }}">
                            <div class="home_caption">SMS Marketing</div>
                        </a>
                    </div>
                    <div class="main_inner_block">
                        <a role="option" class="main_inner_wrapper" id="result_app_18" aria-selected="false"
                            data-menu-xmlid="survey.menu_surveys" href="#">
                            <img class="home_app_icon" src="{{ asset('images/Surveys.png') }}">
                            <div class="home_caption">Surveys</div>
                        </a>
                    </div>
                    <div class="main_inner_block">
                        <a role="option" class="main_inner_wrapper" id="result_app_19" aria-selected="false"
                            data-menu-xmlid="purchase.menu_purchase_root" href="#">
                            <img class="home_app_icon" src="{{ asset('images/Purchase.png') }}">
                            <div class="home_caption">Purchase</div>
                        </a>
                    </div>
                    <div class="main_inner_block">
                        <a role="option" class="main_inner_wrapper" id="result_app_20" aria-selected="false"
                            data-menu-xmlid="stock.menu_stock_root" href="#">
                            <img class="home_app_icon" src="{{ asset('images/Inventory.png') }}">
                            <div class="home_caption">Inventory</div>
                        </a>
                    </div>
                    <div class="main_inner_block">
                        <a role="option" class="main_inner_wrapper" id="result_app_21" aria-selected="false"
                            data-menu-xmlid="mrp.menu_mrp_root" href="#">
                            <img class="home_app_icon" src="{{ asset('images/Manufacturing.png') }}">
                            <div class="home_caption">Manufacturing</div>
                        </a>
                    </div>
                    <div class="main_inner_block">
                        <a role="option" class="main_inner_wrapper" id="result_app_22" aria-selected="false"
                            data-menu-xmlid="mrp_workorder.menu_mrp_workorder_root" href="#">
                            <img class="home_app_icon" src="{{ asset('images/Shop-Floor.png') }}">
                            <div class="home_caption">Shop Floor</div>
                        </a>
                    </div>
                    <div class="main_inner_block">
                        <a role="option" class="main_inner_wrapper" id="result_app_23" aria-selected="false"
                            data-menu-xmlid="quality_control.menu_quality_root" href="#">
                            <img class="home_app_icon" src="{{ asset('images/Quality.png') }}">
                            <div class="home_caption">Quality</div>
                        </a>
                    </div>
                    <div class="main_inner_block">
                        <a role="option" class="main_inner_wrapper" id="result_app_24" aria-selected="false"
                            data-menu-xmlid="account_consolidation.menu_consolidation" href="#">
                            <img class="home_app_icon" src="{{ asset('images/Consolidation.png') }}">
                            <div class="home_caption">Consolidation</div>
                        </a>
                    </div>
                    <div class="main_inner_block">
                        <a role="option" class="main_inner_wrapper" id="result_app_25" aria-selected="false"
                            data-menu-xmlid="sign.menu_document" href="#">
                            <img class="home_app_icon" src="{{ asset('images/Sign.png') }}">
                            <div class="home_caption">Sign</div>
                        </a>
                    </div>
                    <div class="main_inner_block">
                        <a role="option" class="main_inner_wrapper" id="result_app_26" aria-selected="false"
                            data-menu-xmlid="hr.menu_hr_root" href="{{ route('employee.index') }}">
                            <img class="home_app_icon" src="{{ asset('images/Employees.png') }}">
                            <div class="home_caption">Employees</div>
                        </a>
                    </div>

                    <div class="main_inner_block">
                        <a role="option" class="main_inner_wrapper" id="result_app_27" aria-selected="false"
                            data-menu-xmlid="hr_recruitment.menu_hr_recruitment_root" href="#">
                            <img class="home_app_icon" src="{{ asset('images/Recruitment.png') }}">
                            <div class="home_caption">Recruitment</div>
                        </a>
                    </div>
                    <div class="main_inner_block">
                        <a role="option" class="main_inner_wrapper" id="result_app_28" aria-selected="false"
                            data-menu-xmlid="hr_holidays.menu_hr_holidays_root" href="#">
                            <img class="home_app_icon" src="{{ asset('images/Time-Off.png') }}">
                            <div class="home_caption">Time Off</div>
                        </a>
                    </div>
                    <div class="main_inner_block">
                        <a role="option" class="main_inner_wrapper" id="result_app_29" aria-selected="false"
                            data-menu-xmlid="hr_expense.menu_hr_expense_root" href="#">
                            <img class="home_app_icon" src="{{ asset('images/Expenses.png') }}">
                            <div class="home_caption">Expenses</div>
                        </a>
                    </div>
                    <div class="main_inner_block">
                        <a role="option" class="main_inner_wrapper" id="result_app_30" aria-selected="false"
                            data-menu-xmlid="whatsapp.whatsapp_menu_main" href="#">
                            <img class="home_app_icon" src="{{ asset('images/WhatsApp.png') }}">
                            <div class="home_caption">WhatsApp</div>
                        </a>
                    </div>
                    <div class="main_inner_block">
                        <a role="option" class="main_inner_wrapper" id="result_app_31" aria-selected="false"
                            data-menu-xmlid="base.menu_management" href="#">
                            <img class="home_app_icon" src="{{ asset('images/Apps.png') }}">
                            <div class="home_caption">Apps</div>
                        </a>
                    </div>
                    <div class="main_inner_block">
                        <a href="{{ url('settings') }}" role="option" class="main_inner_wrapper" id="result_app_32" aria-selected="false"
                            data-menu-xmlid="base.menu_administration" href="#">
                            <img class="home_app_icon" src="{{ asset('images/Settings.png') }}">
                            <div class="home_caption">Settings</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const toggles = document.querySelectorAll('.dropdown-toggle');

            toggles.forEach(toggle => {
                toggle.addEventListener('click', function(event) {
                    event.preventDefault();
                    const menu = this.nextElementSibling;
                    const isVisible = menu.style.display === 'block';

                    document.querySelectorAll('.dropdown-menu').forEach(menu => {
                        menu.style.display = 'none';
                    });

                    if (!isVisible) {
                        menu.style.display = 'block';
                    }
                });
            });

            document.addEventListener('click', function(event) {
                if (!event.target.closest('.dropdown-toggle')) {
                    document.querySelectorAll('.dropdown-menu').forEach(menu => {
                        menu.style.display = 'none';
                    });
                }
            });
        });
    </script>
    <script>
        let currentIndex = 0;
        const boxes = document.querySelectorAll('.main_inner_block');

        function showBox(index) {
            boxes.forEach((box, idx) => {
                box.classList.remove('active_tab');
                if (idx === index) {
                    box.classList.add('active_tab');
                }
            });
        }

        document.addEventListener('keydown', (event) => {
            if (event.key === 'ArrowRight') {
                currentIndex = (currentIndex + 1) % boxes.length;
                showBox(currentIndex);
            } else if (event.key === 'ArrowLeft') {
                currentIndex = (currentIndex - 1 + boxes.length) % boxes.length;
                showBox(currentIndex);
            }
        });

        // Initially show the first box
        showBox(currentIndex);
    </script>
</body>

</html>
