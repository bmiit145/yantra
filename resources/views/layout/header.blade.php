<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @vite([
    // 'resources/css/crm.css' ,
    'resources/css/common/header.css',
    'resources/css/all.css',

    ])
    {{-- font awesome by npm --}}


    <title>Yantra Design - Manufacturer and Supplier of Industrial Machinery & Tools</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>

    <link href="{{ asset('images/favicon.png') }}" rel="shortcut icon" type="image/x-icon">

    @yield('head')
    @yield('css')
    @stack('head_scripts')
    <style>
        ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .dropdown {
            position: relative;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9fafb;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 4;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #ddd;
        }

        .dropdown.active .dropdown-content {
            display: block;
        }

        .toast-success {
            background-color: #28a745 !important;
            /* Green */
        }

        .toast-error {
            background-color: #dc3545 !important;
            /* Red */
        }

        .search-container {
            position: relative;
        }

        .search_menu_wapper {
            display: none;
            position: absolute;
            top: 40PX;
            /* Position the menu below the input */
            left: 0;
            /* Align with the left edge of the input */
            background-color: white;
            padding: 10px;
            list-style: none;
            margin: 0;
            width: 200px;
            /* Adjust the width as needed */
            z-index: 1000;
            /* Ensure it's above other content */
        }

        .search-container .show-dropdown .search_menu_wapper {
            display: block;
        }

        .o-mail-ActivityMenu-counter {
            margin-right: -.5em;
            border: 0;
            padding: 3px 6px;
            background-color: var(--o-navbar-badge-bg, #dc3545);
            font-size: 0.7em;
            color: var(--o-navbar-badge-color, #FFF);
            text-shadow: var(--o-navbar-badge-text-shadow, none);
            transform: translate(-0.6em, -30%);
            ;

        }

    </style>
</head>

<body>

    <div class="main_header_wrapper">
        <div class="crmtop_header">
            <div class="top_left_navbar">
                <a href="{{ route('dashboard') }}" class="o_menu_toggle">
                    {{-- <img src="images/CRM.png" alt="Avatar" class="crm_logo"> --}}
                    <img src="@yield('image_url', asset('images/CRM.png'))" alt="Avatar" class="crm_logo">
                    <a href="@yield('head_title_link', route('dashboard'))" class="o_menu_brand">@yield('title', 'CRM')</a>
                </a>
                <div class="top_left_navbar_menu">
                    <ul class="navbar_menu_wapper">
                        @yield('navbar_menu')
                    </ul>
                </div>
            </div>



            <div class="top_main_navbar">
                <ul class="top_right_navbar">
                    <li>
                        <div class="dropdown">
                            <button onclick="myFunction()" class="dropbtn">
                                <svg class="svg-icon" style="width: 1em; height: 1em;vertical-align: middle;fill: currentColor;overflow: hidden;" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M988.8 512a348.8 348.8 0 0 1-144.96 278.72v208.32l-187.84-131.52a387.2 387.2 0 0 1-56 4.8A408.64 408.64 0 0 1 384 811.84l-36.8-23.04a493.76 493.76 0 0 0 52.8 3.2 493.44 493.44 0 0 0 51.2-2.88c221.44-23.04 394.24-192 394.24-400a365.12 365.12 0 0 0-4.16-51.84 373.44 373.44 0 0 0-48.96-138.56l18.88 11.2A353.6 353.6 0 0 1 988.8 512z m-198.72-128c0-192-169.6-349.76-378.24-349.76h-24C192 47.04 33.92 198.72 33.92 384a334.08 334.08 0 0 0 118.4 253.12v187.52l86.08-60.48 66.24-46.4a396.16 396.16 0 0 0 107.52 16C620.48 734.08 790.08 576 790.08 384z" />
                                </svg>
                            </button>
                            <div id="myDropdown" class="dropdown-content">
                                <a href="#home">Home</a>
                                <a href="#about">About</a>
                                <a href="#contact">Contact</a>
                            </div>
                        </div>
                    </li>

                    @php
                    use Carbon\Carbon;
                    use App\Models\Activity;

                    // Fetch all activities
                    $activities = Activity::where('status', '0')
                    ->whereHas('getLead', function ($query) {
                    $query->where('is_lost', '1')->where('status', 0);
                    })
                    ->orWhereHas('getPipeline', function ($query) {
                    $query->where('is_lost', '1')->where('status', 0);
                    })
                    ->get(); // Execute the query to get results

                    $now = Carbon::now()->startOfDay(); // Current day
                    $tomorrow = $now->copy()->addDay(); // Next day

                    // Initialize counters
                    $lateCount = 0;
                    $todayCount = 0;
                    $futureCount = 0;
                    $tomorrowCount = 0;

                    // Categorize activities
                    foreach ($activities as $activity) {
                    $dueDate = Carbon::parse($activity->due_date);

                    if ($dueDate->isSameDay($now)) {
                    $todayCount++;
                    } elseif ($dueDate->isSameDay($tomorrow)) {
                    $tomorrowCount++;
                    } elseif ($dueDate->isPast()) {
                    $lateCount++;
                    } else {
                    $futureCount++;
                    }
                    }

                    $allActivityCount = Activity::where('status', '0')
                    ->where(function ($query) {
                    $query->whereHas('getLead', function ($query) {
                    $query->where('is_lost', '1');
                    })
                    ->orWhereHas('getPipeline', function ($query) {
                    $query->where('is_lost', '1');
                    });
                    })
                    ->where(function ($query) {
                    $query->where('due_date', '<', now()->startOfDay()) // Overdue
                        ->orWhere('due_date', '=', now()->startOfDay()); // Due today
                        })
                        ->count();
                        @endphp

                        <li id="myTrigger">
                            <a href="#" style="color:black;">
                                <svg class="svg-icon" style="width: 1em; height: 1em; vertical-align: middle; fill: currentColor; overflow: hidden;" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M678.4 691.2l-60.8 60.8-179.2-176V243.2h86.4v294.4l153.6 153.6z m288-169.6c0 249.6-201.6 454.4-454.4 454.4S57.6 774.4 57.6 521.6C57.6 272 262.4 70.4 512 67.2c249.6 3.2 454.4 204.8 454.4 454.4z m-86.4 0C880 320 713.6 156.8 512 156.8S144 320 144 521.6c0 201.6 163.2 368 368 368 201.6 0 368-163.2 368-368z" />
                                </svg>
                                @if ($allActivityCount > 0)
                                <span class="o-mail-ActivityMenu-counter badge rounded-pill" style="color:white;">{{ $allActivityCount }}</span>
                                @endif
                            </a>
                        </li>

                        <!-- Card or Popover -->
                        <div id="myCard" class="card" style="z-index:50;top:50px; right:60px;display: none; position: absolute; background: white; border: 1px solid #ddd; padding: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
                            <div class="o-mail-ActivityGroup list-group-item list-group-item-action d-flex p-2 cursor-pointer" data-model_name="crm.lead"><img alt="Activity" src="{{asset('images/CRM.png')}}" h`eight="42" width="42">
                                <div class="flex-grow-1 overflow-hidden">
                                    <div class="d-flex px-2" name="activityTitle">Lead/Opportunity</div>
                                    <div class="d-flex">
                                        <!-- <span class="btn btn-link py-0 px-2 text-truncate" style="color:#017e84;">{{ $lateCount }} Late</span> -->
                                        <span class="btn btn-link py-0 px-2 text-truncate" id="filterLate" style="color:#017e84;">{{ $lateCount }} Late</span>
                                        <span class="btn btcolornk py-0 px-2 text-truncate" id="filterToday" style="color:#017e84;">{{ $todayCount }} Today </span>
                                        <span class="flex-grow-1"></span>
                                        <span class="btn btn-link py-0 px-2 text-truncate" id="filterFuture" style="color:#017e84;">{{ $futureCount }}Future </span></div>
                                </div>
                            </div>
                            <a href="{{route('lead.allActivities')}}" style="color:black !important;" class="list-group-item list-group-item-action p-2 border-0 text-primary text-center"> View all activities </a>
                            <a href="#" style="color:black !important;" class="o_sys_documents_request list-group-item list-group-item-action p-2 border-0 text-primary text-center"> Request a Document </a>
                        </div>
                        <script>
                            $(document).ready(function() {
                                $('#filterLate').on('click', function() {
                                    window.location.href = "{{ route('lead.allActivities') }}?filterType=late";
                                });

                                // Event handler for the Today filter
                                $('#filterToday').on('click', function() {
                                    window.location.href = "{{ route('lead.allActivities') }}?filterType=today";
                                });

                                // Event handler for the Future filter
                                $('#filterFuture').on('click', function() {
                                    window.location.href = "{{ route('lead.allActivities') }}?filterType=future";
                                });
                            });

                        </script>
                        <li><a href="#"><svg xmlns="http://www.w3.org/2000/svg" style="width: 1em; height: 1em;vertical-align: middle;fill: currentColor;overflow: hidden;" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                    <g>
                                        <path d="M349.899 313.5v-.3c-7.5-7.8-15.599-15.601-25.199-23.101 65.4-20.7 101.999-70.499 101.999-140.4 0-62.999-33.3-116.1-84.6-135.901C317.501 4.499 280.299 0 228.099 0H35.5v512h124.2V309.899c36.711 0 34.854 5.895 47.999 20.101 15.312 16.735 67.089 98.459 120.901 182h147.9c-60.864-101.473-104.654-174.391-126.601-198.5zM159.7 111.299c26.206-.084 92.305-.437 104.099 1.201 23.701 4.2 35.7 18.6 35.7 43.2 0 21.599-9 36.299-26.1 42.299-19.349 6.912-86.441 4.801-113.699 4.801z" fill="#00a5a8" opacity="1" data-original="#000000" class=""></path>
                                    </g>c
                                </svg></a></li>
                </ul>
            </div>

        </div>

        @section('header_left_side')
        <div class="new_btn_info">
            <a class="head_new_btn" href="@yield('head_new_btn_link', '#')">@yield('head_new_btn_name', 'New')</a>
        </div>
        <div class="new_btn_info_cancel" style="display:none">
            <a class="btn btn-secondary" href="@yield('cancel_link', '#')">@yield('cancel_name', '#')<a>
        </div>
        <div class="head_breadcrumb_info">
            {{-- <p class="head_breadcrumb_title">@yield('head_breadcrumb_title', 'sabsdhd')</p> --}}
            <div class="o_breadcrumb d-flex flex-row flex-md-column align-self-stretch justify-content-between min-w-0">
                <ol class="breadcrumb flex-nowrap text-nowrap lh-sm redirect-button">
                    <li class="breadcrumb-item d-inline-flex min-w-0 o_back_button" data-hotkey="b" style="position: relative;">
                        <a class="fw-bold text-truncate" href="@yield('redirect_button', '#')" data-tooltip="Back to &quot;Leads&quot;" title="">@yield('redirect_name')</a>
                    </li>
                </ol>
                <div class="d-flex gap-1 text-truncate">
                    <div class="o_last_breadcrumb_item active d-flex gap-2 align-items-center min-w-0 lh-sm">
                        <span class="min-w-0 text-truncate head_breadcrumb_title">@yield('head_breadcrumb_title', 'sabsdhd')</span>
                    </div>
                    <div class="o_control_panel_breadcrumbs_actions d-inline-flex d-print-none ">
                        <div class="o_cp_action_menus d-flex align-items-center pe-2 gap-1">
                            <div class="lh-1">
                                <button class="d-print-none btn p-0 ms-1 lh-sm border-0" id="dropdownMenuButton" aria-expanded="false" title="">
                                    <i class="fa fa-cog"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                    @yield('setting_menu')
                           
                                 
                                </div>
                                @if(isset($data->id))
                                <button style="display: none;" type="button" class="o_form_button_save btn btn-light px-1 py-0 lh-sm @yield('save_class', " #")" id="@yield('header_save_btn_id', 'main_save_btn')" data-hotkey="s" data-tooltip="Save manually" aria-label="Save manually" title="Save Button">
                                    <i class="fa fa-cloud-upload fa-fw"></i>
                                </button>
                                <button style="display:none;" type="button" class="o_form_button_save btn btn-light px-1 py-0 lh-sm @yield('save_class', " #")" id="@yield('header_discard_btn_id', 'main_discard_btn')" data-hotkey="s" data-tooltip="Discard all changes" aria-label="Discard all changes" title="Discard all changes">
                                   <i class="fa-solid fa-rotate-left"></i>
                                </button>
                                @else
                                <button type="button" class="o_form_button_save btn btn-light px-1 py-0 lh-sm @yield('save_class', " #")" id="@yield('header_save_btn_id', 'main_save_btn')" data-hotkey="s" data-tooltip="Save manually" aria-label="Save manually" title="Save Button">
                                    <i class="fa fa-cloud-upload fa-fw"></i>
                                </button>
                                <button  type="button" class="o_form_button_save btn btn-light px-1 py-0 lh-sm @yield('save_class', " #")" id="@yield('header_discard_btn_id', 'main_discard_btn')" data-hotkey="s" data-tooltip="Discard all changes" aria-label="Discard all changes" title="Discard all changes">
                                   <i class="fa-solid fa-rotate-left"></i>
                                </button>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if(isset($data->is_lost) && $data->is_lost == 1)
            @if(isset($allData) && $allData > 1)
            <div class="o-form-buttonbox d-print-none position-relative d-flex w-md-auto o_not_full" style="margin-left:42%;position: absolute !important;">
                <a href="{{ route('leads.similar', ['productName' => $data->product_name]) }}">
                    <button invisible="duplicate_lead_count < 1" class="btn oe_stat_button btn-outline-secondary flex-grow-1 flex-lg-grow-0" name="action_show_potential_duplicates" type="object"><i class="o_button_icon fa fa-fw fa-star"></i>
                        <div class="o_stat_info">
                            <div name="duplicate_lead_count" class="o_field_widget o_readonly_modifier o_field_integer o_stat_value">
                                <span>{{ $allData ?? '' }}</span></div><span class="o_stat_text">Similar Leads</span>
                        </div>
                    </button>
                </a>
            </div>
            @endif
            @endif

        </div>



        @yield('header_left_side_extra')
        @endsection
        <div class="crmcenter_header">
            @include('layout.partials.navbar')
        </div>
        <div class="crm_head_centerside mob_search_info">
            <form>;
                <input type="text" name="search" placeholder="Search..">
            </form>
        </div>
    </div>
    <script>
        document.getElementById('search-input').addEventListener('click', function(event) {
            // Prevent the event from propagating to the document click handler
            event.stopPropagation();

            var searchDiv = document.getElementById('search-dropdown');
            // Toggle the display of the div
            if (searchDiv.style.display === 'none' || searchDiv.style.display === '') {
                searchDiv.style.display = 'block';
            } else {
                searchDiv.style.display = 'none';
            }
        });

        // Hide the dropdown when clicking outside of it
        document.addEventListener('click', function(event) {
            var searchDiv = document.getElementById('search-dropdown');
            var searchInput = document.getElementById('search-input');

            // Check if the click was outside of the search input and the dropdown
            if (!searchDiv.contains(event.target) && event.target !== searchInput) {
                searchDiv.style.display = 'none';
            }
        });

    </script>
    @yield('content')
    <!-- header js -->
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
        });

    document.getElementById('dropdownMenuButton').addEventListener('click', function() {
        const dropdownMenu = document.querySelector('.dropdown-menu');
        dropdownMenu.classList.toggle('show'); // Toggle the 'show' class to display/hide the menu
    });

    // Optional: Close dropdown when clicking outside of it
    window.addEventListener('click', function(event) {
        const dropdownMenu = document.querySelector('.dropdown-menu');
        if (!event.target.closest('#dropdownMenuButton')) {
            dropdownMenu.classList.remove('show');
        }
    });


    </script>

    <script>
        toastr.options = {
            "closeButton": true
            , "debug": false
            , "newestOnTop": false
            , "progressBar": true
            , "positionClass": "toast-top-right"
            , "preventDuplicates": false
            , "onclick": null
            , "showDuration": "300"
            , "hideDuration": "1000"
            , "timeOut": "5000"
            , "extendedTimeOut": "1000"
            , "showEasing": "swing"
            , "hideEasing": "linear"
            , "showMethod": "fadeIn"
            , "hideMethod": "fadeOut"
        }

        @if(Session::has('success'))
        toastr.success("{{ Session::get('success') }}");
        @endif

        @if(Session::has('error'))
        toastr.error("{{ Session::get('error') }}");
        @endif

        @if($errors->any())
        @foreach($errors -> all() as $error)
        toastr.error("{{ $error }}");
        @endforeach
        @endif

    </script>
    <script>
        // ajax csrf token setup
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    </script>
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            const card = document.getElementById('myCard');
            const trigger = document.getElementById('myTrigger');

            function toggleCard() {
                if (card.style.display === 'none' || card.style.display === '') {
                    // Get the position of the trigger element
                    const rect = trigger.getBoundingClientRect();
                    card.style.display = 'block';
                } else {
                    // Hide the card if it's already visible
                    card.style.display = 'none';
                }
            }

            function hideCard() {
                card.style.display = 'none';
            }

            trigger.addEventListener('click', (event) => {
                event.preventDefault(); // Prevent default link behavior
                toggleCard();
            });

            // Hide card when clicking anywhere outside of the card or trigger
            document.addEventListener('click', (event) => {
                // Check if the click was outside the card and trigger
                if (!card.contains(event.target) && !trigger.contains(event.target)) {
                    hideCard();
                }
            });

            // Prevent click event from bubbling up to document when clicking inside the card
            card.addEventListener('click', (event) => {
                event.stopPropagation();
            });
        });

    </script>



    @stack('scripts')
</body>

</html>
