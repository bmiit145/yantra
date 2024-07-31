<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite([
//    'resources/css/crm.css' ,
    'resources/css/common/header.css',
    'resources/css/all.css' ,
    ])
{{--     font awesome by npm  --}}


    <title>Yantra Design - Manufacturer and Supplier of Industrial Machinery & Tools</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="images/favicon.png" rel="shortcut icon" type="image/x-icon">

    @yield('head')
    @yield('css')
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
    </style>
</head>
<body>

<div class="main_header_wrapper">
    <div class="crmtop_header">
        <div class="top_left_navbar">
            <a href="{{ route('dashboard') }}" class="o_menu_toggle">
                {{-- <img src="images/CRM.png" alt="Avatar" class="crm_logo"> --}}
                <img src="@yield('image_url', asset('images/CRM.png') )" alt="Avatar" class="crm_logo">
                <a href="@yield('head_title_link' , route('dashboard'))" class="o_menu_brand">@yield('title' , "Yantra")</a>
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
                            <svg class="svg-icon"
                                style="width: 1em; height: 1em;vertical-align: middle;fill: currentColor;overflow: hidden;"
                                viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M988.8 512a348.8 348.8 0 0 1-144.96 278.72v208.32l-187.84-131.52a387.2 387.2 0 0 1-56 4.8A408.64 408.64 0 0 1 384 811.84l-36.8-23.04a493.76 493.76 0 0 0 52.8 3.2 493.44 493.44 0 0 0 51.2-2.88c221.44-23.04 394.24-192 394.24-400a365.12 365.12 0 0 0-4.16-51.84 373.44 373.44 0 0 0-48.96-138.56l18.88 11.2A353.6 353.6 0 0 1 988.8 512z m-198.72-128c0-192-169.6-349.76-378.24-349.76h-24C192 47.04 33.92 198.72 33.92 384a334.08 334.08 0 0 0 118.4 253.12v187.52l86.08-60.48 66.24-46.4a396.16 396.16 0 0 0 107.52 16C620.48 734.08 790.08 576 790.08 384z" />
                            </svg>
                        </button>
                        <div id="myDropdown" class="dropdown-content">
                            <a href="#home">Home</a>
                            <a href="#about">About</a>
                            <a href="#contact">Contact</a>
                        </div>
                    </div>
                </li>
                <li><a href="#"><svg class="svg-icon"
                            style="width: 1em; height: 1em;vertical-align: middle;fill: currentColor;overflow: hidden;"
                            viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M678.4 691.2l-60.8 60.8-179.2-176V243.2h86.4v294.4l153.6 153.6z m288-169.6c0 249.6-201.6 454.4-454.4 454.4S57.6 774.4 57.6 521.6C57.6 272 262.4 70.4 512 67.2c249.6 3.2 454.4 204.8 454.4 454.4z m-86.4 0C880 320 713.6 156.8 512 156.8S144 320 144 521.6c0 201.6 163.2 368 368 368 201.6 0 368-163.2 368-368z" />
                        </svg></a></li>
                <li><a href="#"><svg xmlns="http://www.w3.org/2000/svg"
                            style="width: 1em; height: 1em;vertical-align: middle;fill: currentColor;overflow: hidden;" version="1.1"
                            xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0"
                            viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve"
                            class="">
                            <g>
                                <path
                                    d="M349.899 313.5v-.3c-7.5-7.8-15.599-15.601-25.199-23.101 65.4-20.7 101.999-70.499 101.999-140.4 0-62.999-33.3-116.1-84.6-135.901C317.501 4.499 280.299 0 228.099 0H35.5v512h124.2V309.899c36.711 0 34.854 5.895 47.999 20.101 15.312 16.735 67.089 98.459 120.901 182h147.9c-60.864-101.473-104.654-174.391-126.601-198.5zM159.7 111.299c26.206-.084 92.305-.437 104.099 1.201 23.701 4.2 35.7 18.6 35.7 43.2 0 21.599-9 36.299-26.1 42.299-19.349 6.912-86.441 4.801-113.699 4.801z"
                                    fill="#00a5a8" opacity="1" data-original="#000000" class=""></path>
                            </g>
                        </svg></a></li>
            </ul>
        </div>
    </div>

    <div class="crmcenter_header">
        <div class="crmcenter_header_main">
            <div class="crm_head_leftside">

                <div class="new_btn_info">
{{--                    <a class="head_new_btn" data-toggle="modal" data-target="#exampleModalCenter" href="#">New</a>--}}
                    <a class="head_new_btn" data-toggle="modal" data-target="#exampleModalCenter" href="@yield('head_new_btn_link' , '#')">New</a>
                </div>


                <div class="head_breadcrumb_info">
                    <p class="head_breadcrumb_title">Pipeline</p>
                    <a href="#"><svg fill="#000000" width="64px" height="64px" viewBox="0 0 1920 1920"
                            xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path
                                    d="M1703.534 960c0-41.788-3.84-84.48-11.633-127.172l210.184-182.174-199.454-340.856-265.186 88.433c-66.974-55.567-143.323-99.389-223.85-128.415L1158.932 0h-397.78L706.49 269.704c-81.43 29.138-156.423 72.282-223.962 128.414l-265.073-88.32L18 650.654l210.184 182.174C220.39 875.52 216.55 918.212 216.55 960s3.84 84.48 11.633 127.172L18 1269.346l199.454 340.856 265.186-88.433c66.974 55.567 143.322 99.389 223.85 128.415L761.152 1920h397.779l54.663-269.704c81.318-29.138 156.424-72.282 223.963-128.414l265.073 88.433 199.454-340.856-210.184-182.174c7.793-42.805 11.633-85.497 11.633-127.285m-743.492 395.294c-217.976 0-395.294-177.318-395.294-395.294 0-217.976 177.318-395.294 395.294-395.294 217.977 0 395.294 177.318 395.294 395.294 0 217.976-177.317 395.294-395.294 395.294"
                                    fill-rule="evenodd"></path>
                            </g>
                        </svg></a>
                </div>
                <button type="button" class="o_form_button_save btn btn-light px-1 py-0 lh-sm @yield('save_class' , "#")"  id="@yield('header_save_btn_id' , 'main_save_btn')" data-hotkey="s" data-tooltip="Save manually" aria-label="Save manually" style="position: relative;" title="Save Button">
                    <i class="fa fa-cloud-upload fa-fw"></i>
                </button>
            </div>
            <div class="crm_head_centerside">

                <form>
                    <input type="text" name="search" placeholder="Search..">
                    <span class="heade_search_icon"><svg fill="#000000" height="64px" width="64px" version="1.1"
                            id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <g>
                                    <g>
                                        <path
                                            d="M387.478,340.255c-13.413,17.894-29.328,33.81-47.222,47.222L464.778,512L512,464.778L387.478,340.255z">
                                        </path>
                                    </g>
                                </g>
                                <g>
                                    <g>
                                        <path
                                            d="M200.348,0C89.876,0,0,89.876,0,200.348s89.876,200.348,200.348,200.348s200.348-89.876,200.348-200.348 S310.82,0,200.348,0z M200.348,350.609c-82.854,0-150.261-67.407-150.261-150.261S117.494,50.087,200.348,50.087 s150.261,67.407,150.261,150.261S283.202,350.609,200.348,350.609z">
                                        </path>
                                    </g>
                                </g>
                                <g>
                                    <g>
                                        <path
                                            d="M200.348,83.478c-64.442,0-116.87,52.428-116.87,116.87s52.428,116.87,116.87,116.87s116.87-52.428,116.87-116.87 S264.79,83.478,200.348,83.478z">
                                        </path>
                                    </g>
                                </g>
                            </g>
                        </svg></span>
                </form>
            </div>
            <div class="crm_head_rightside">
                <div class="crmright_head_inner">
                    <ul class="crmright_head_main crmright_head_main__1">
                        <li><a href="#"><svg width="64px" height="64px" viewBox="0 0 15 15" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                    </g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path d="M0 1H7V0H0V1Z" fill="#000000"></path>
                                        <path d="M8 1H15V0H8V1Z" fill="#000000"></path>
                                        <path
                                            d="M0.5 3C0.223858 3 0 3.22386 0 3.5V14.5C0 14.7761 0.223858 15 0.5 15H6.5C6.77614 15 7 14.7761 7 14.5V3.5C7 3.22386 6.77614 3 6.5 3H0.5Z"
                                            fill="#000000"></path>
                                        <path
                                            d="M8.5 3C8.22386 3 8 3.22386 8 3.5V9.5C8 9.77614 8.22386 10 8.5 10H14.5C14.7761 10 15 9.77614 15 9.5V3.5C15 3.22386 14.7761 3 14.5 3H8.5Z"
                                            fill="#000000"></path>
                                    </g>
                                </svg></a></li>
                        <li><a href="#"><svg fill="#000000" width="64px" height="64px" viewBox="0 0 36 36"
                                    version="1.1" preserveAspectRatio="xMidYMid meet"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                    </g>
                                    <g id="SVGRepo_iconCarrier">
                                        <title>view-list-line</title>
                                        <rect class="clr-i-outline clr-i-outline-path-1" x="2" y="8" width="2"
                                            height="2"></rect>
                                        <path class="clr-i-outline clr-i-outline-path-2"
                                            d="M7,10H31a1,1,0,0,0,0-2H7a1,1,0,0,0,0,2Z"></path>
                                        <rect class="clr-i-outline clr-i-outline-path-3" x="2" y="14" width="2"
                                            height="2"></rect>
                                        <path class="clr-i-outline clr-i-outline-path-4"
                                            d="M31,14H7a1,1,0,0,0,0,2H31a1,1,0,0,0,0-2Z"></path>
                                        <rect class="clr-i-outline clr-i-outline-path-5" x="2" y="20" width="2"
                                            height="2"></rect>
                                        <path class="clr-i-outline clr-i-outline-path-6"
                                            d="M31,20H7a1,1,0,0,0,0,2H31a1,1,0,0,0,0-2Z"></path>
                                        <rect class="clr-i-outline clr-i-outline-path-7" x="2" y="26" width="2"
                                            height="2"></rect>
                                        <path class="clr-i-outline clr-i-outline-path-8"
                                            d="M31,26H7a1,1,0,0,0,0,2H31a1,1,0,0,0,0-2Z"></path>
                                        <rect x="0" y="0" width="36" height="36" fill-opacity="0"></rect>
                                    </g>
                                </svg></a></li>
                        <li><a href="#"><svg fill="#000000" height="64px" width="64px" version="1.1"
                                    id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 289.48 289.48"
                                    xml:space="preserve">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                    </g>
                                    <g id="SVGRepo_iconCarrier">
                                        <g>
                                            <g>
                                                <g>
                                                    <path
                                                        d="M273.74,21.48h-32.52V5c0-2.761-2.239-5-5-5h-42.96c-2.761,0-5,2.239-5,5v16.48h-87.04V5c0-2.761-2.239-5-5-5H53.26 c-2.761,0-5,2.239-5,5v16.48H15.74c-8.271,0-15,6.729-15,15v57v181c0,8.271,6.729,15,15,15h258c8.271,0,15-6.729,15-15v-181v-57 C288.74,28.209,282.011,21.48,273.74,21.48z M198.26,26.48V10h32.96v16.48v16.48h-32.96V26.48z M58.26,26.48V10h32.96v16.48 v16.48H58.26V26.48z M278.74,274.48c0,2.757-2.243,5-5,5h-258c-2.757,0-5-2.243-5-5v-176h268V274.48z M278.74,88.48h-268v-52 c0-2.757,2.243-5,5-5h32.52v16.48c0,2.761,2.239,5,5,5h42.96c2.761,0,5-2.239,5-5V31.48h87.04v16.48c0,2.761,2.239,5,5,5h42.96 c2.761,0,5-2.239,5-5V31.48h32.52c2.757,0,5,2.243,5,5V88.48z">
                                                    </path>
                                                    <path
                                                        d="M39.031,174.689h28.418c2.761,0,5-2.239,5-5v-28.418c0-2.761-2.239-5-5-5H39.031c-2.761,0-5,2.239-5,5v28.418 C34.031,172.45,36.27,174.689,39.031,174.689z">
                                                    </path>
                                                    <path
                                                        d="M100.031,174.689h28.418c2.761,0,5-2.239,5-5v-28.418c0-2.761-2.239-5-5-5h-28.418c-2.761,0-5,2.239-5,5v28.418 C95.031,172.45,97.27,174.689,100.031,174.689z">
                                                    </path>
                                                    <path
                                                        d="M161.031,174.689h28.418c2.761,0,5-2.239,5-5v-28.418c0-2.761-2.239-5-5-5h-28.418c-2.761,0-5,2.239-5,5v28.418 C156.031,172.45,158.27,174.689,161.031,174.689z">
                                                    </path>
                                                    <path
                                                        d="M222.031,174.689h28.418c2.761,0,5-2.239,5-5v-28.418c0-2.761-2.239-5-5-5h-28.418c-2.761,0-5,2.239-5,5v28.418 C217.031,172.45,219.27,174.689,222.031,174.689z">
                                                    </path>
                                                    <path
                                                        d="M39.031,235.356h28.418c2.761,0,5-2.239,5-5v-28.418c0-2.761-2.239-5-5-5H39.031c-2.761,0-5,2.239-5,5v28.418 C34.031,233.117,36.27,235.356,39.031,235.356z">
                                                    </path>
                                                    <path
                                                        d="M100.031,235.356h28.418c2.761,0,5-2.239,5-5v-28.418c0-2.761-2.239-5-5-5h-28.418c-2.761,0-5,2.239-5,5v28.418 C95.031,233.117,97.27,235.356,100.031,235.356z">
                                                    </path>
                                                    <path
                                                        d="M161.031,235.356h28.418c2.761,0,5-2.239,5-5v-28.418c0-2.761-2.239-5-5-5h-28.418c-2.761,0-5,2.239-5,5v28.418 C156.031,233.117,158.27,235.356,161.031,235.356z">
                                                    </path>
                                                    <path
                                                        d="M222.031,235.356h28.418c2.761,0,5-2.239,5-5v-28.418c0-2.761-2.239-5-5-5h-28.418c-2.761,0-5,2.239-5,5v28.418 C217.031,233.117,219.27,235.356,222.031,235.356z">
                                                    </path>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </svg></a></li>
                        <li><a href="#"><svg width="64px" height="64px" viewBox="0 0 32 32"
                                    xmlns="http://www.w3.org/2000/svg" fill="#000000">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                    </g>
                                    <g id="SVGRepo_iconCarrier">
                                        <g fill="none" fill-rule="evenodd">
                                            <path d="m0 0h32v32h-32z"></path>
                                            <path
                                                d="m28.5 32h-25v-32h25zm-2-23h-21v21h21zm-15 15v3h-3v-3zm6 0v3h-3v-3zm6 0v3h-3v-3zm-12-6v3h-3v-3zm6 0v3h-3v-3zm6 0v3h-3v-3zm-12-6v3h-3v-3zm6 0v3h-3v-3zm6 0v3h-3v-3zm3-10h-21v5h21z"
                                                fill="#000000" fill-rule="nonzero"></path>
                                        </g>
                                    </g>
                                </svg></a></li>
                        <li><a href="#"><svg width="64px" height="64px" viewBox="0 0 48 48"
                                    xmlns="http://www.w3.org/2000/svg" fill="#000000">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                    </g>
                                    <g id="SVGRepo_iconCarrier">
                                        <title>chart-area</title>
                                        <g id="Layer_2" data-name="Layer 2">
                                            <g id="invisible_box" data-name="invisible box">
                                                <rect width="48" height="48" fill="none"></rect>
                                            </g>
                                            <g id="icons_Q2" data-name="icons Q2">
                                                <path
                                                    d="M41.9,33.3,36,18.4a1.9,1.9,0,0,0-2.7-1.1l-7.7,4.1a.9.9,0,0,1-1.1-.1L15.4,10.6A2,2,0,0,0,12,12V36H40A2.1,2.1,0,0,0,41.9,33.3Z">
                                                </path>
                                                <path d="M42,40H8V6A2,2,0,0,0,4,6V44H42a2,2,0,0,0,0-4Z"></path>
                                            </g>
                                        </g>
                                    </g>
                                </svg></a></li>
                        <li><a href="#"><svg width="64px" height="64px" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                    </g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path
                                            d="M12 21C15.5 17.4 19 14.1764 19 10.2C19 6.22355 15.866 3 12 3C8.13401 3 5 6.22355 5 10.2C5 14.1764 8.5 17.4 12 21Z"
                                            stroke="#000000" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                        <path
                                            d="M12 13C13.6569 13 15 11.6569 15 10C15 8.34315 13.6569 7 12 7C10.3431 7 9 8.34315 9 10C9 11.6569 10.3431 13 12 13Z"
                                            stroke="#000000" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                    </g>
                                </svg></a></li>
                        <li><a href="#"><svg width="64px" height="64px" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                    </g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path
                                            d="M12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21Z"
                                            stroke="#000000" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                        <path d="M12 6V12" stroke="#000000" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                        <path d="M16.24 16.24L12 12" stroke="#000000" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                    </g>
                                </svg></a></li>
                    </ul>
                    <ul class="crmright_head_main crmright_head_main__2">
                        <li><a href="#"><svg width="64px" height="64px" viewBox="0 0 15 15" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                    </g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path d="M0 1H7V0H0V1Z" fill="#000000"></path>
                                        <path d="M8 1H15V0H8V1Z" fill="#000000"></path>
                                        <path
                                            d="M0.5 3C0.223858 3 0 3.22386 0 3.5V14.5C0 14.7761 0.223858 15 0.5 15H6.5C6.77614 15 7 14.7761 7 14.5V3.5C7 3.22386 6.77614 3 6.5 3H0.5Z"
                                            fill="#000000"></path>
                                        <path
                                            d="M8.5 3C8.22386 3 8 3.22386 8 3.5V9.5C8 9.77614 8.22386 10 8.5 10H14.5C14.7761 10 15 9.77614 15 9.5V3.5C15 3.22386 14.7761 3 14.5 3H8.5Z"
                                            fill="#000000"></path>
                                    </g>
                                </svg><span class="crmright_mob_head_title">Kanban</span></a></li>

                        <li><a href="#"><svg fill="#000000" width="64px" height="64px" viewBox="0 0 36 36"
                                    version="1.1" preserveAspectRatio="xMidYMid meet"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                    </g>
                                    <g id="SVGRepo_iconCarrier">
                                        <title>view-list-line</title>
                                        <rect class="clr-i-outline clr-i-outline-path-1" x="2" y="8" width="2"
                                            height="2"></rect>
                                        <path class="clr-i-outline clr-i-outline-path-2"
                                            d="M7,10H31a1,1,0,0,0,0-2H7a1,1,0,0,0,0,2Z"></path>
                                        <rect class="clr-i-outline clr-i-outline-path-3" x="2" y="14" width="2"
                                            height="2"></rect>
                                        <path class="clr-i-outline clr-i-outline-path-4"
                                            d="M31,14H7a1,1,0,0,0,0,2H31a1,1,0,0,0,0-2Z"></path>
                                        <rect class="clr-i-outline clr-i-outline-path-5" x="2" y="20" width="2"
                                            height="2"></rect>
                                        <path class="clr-i-outline clr-i-outline-path-6"
                                            d="M31,20H7a1,1,0,0,0,0,2H31a1,1,0,0,0,0-2Z"></path>
                                        <rect class="clr-i-outline clr-i-outline-path-7" x="2" y="26" width="2"
                                            height="2"></rect>
                                        <path class="clr-i-outline clr-i-outline-path-8"
                                            d="M31,26H7a1,1,0,0,0,0,2H31a1,1,0,0,0,0-2Z"></path>
                                        <rect x="0" y="0" width="36" height="36" fill-opacity="0"></rect>
                                    </g>
                                </svg><span class="crmright_mob_head_title">List</span></a></li>

                        <li><a href="#"><svg fill="#000000" height="64px" width="64px" version="1.1"
                                    id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 289.48 289.48"
                                    xml:space="preserve">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                    </g>
                                    <g id="SVGRepo_iconCarrier">
                                        <g>
                                            <g>
                                                <g>
                                                    <path
                                                        d="M273.74,21.48h-32.52V5c0-2.761-2.239-5-5-5h-42.96c-2.761,0-5,2.239-5,5v16.48h-87.04V5c0-2.761-2.239-5-5-5H53.26 c-2.761,0-5,2.239-5,5v16.48H15.74c-8.271,0-15,6.729-15,15v57v181c0,8.271,6.729,15,15,15h258c8.271,0,15-6.729,15-15v-181v-57 C288.74,28.209,282.011,21.48,273.74,21.48z M198.26,26.48V10h32.96v16.48v16.48h-32.96V26.48z M58.26,26.48V10h32.96v16.48 v16.48H58.26V26.48z M278.74,274.48c0,2.757-2.243,5-5,5h-258c-2.757,0-5-2.243-5-5v-176h268V274.48z M278.74,88.48h-268v-52 c0-2.757,2.243-5,5-5h32.52v16.48c0,2.761,2.239,5,5,5h42.96c2.761,0,5-2.239,5-5V31.48h87.04v16.48c0,2.761,2.239,5,5,5h42.96 c2.761,0,5-2.239,5-5V31.48h32.52c2.757,0,5,2.243,5,5V88.48z">
                                                    </path>
                                                    <path
                                                        d="M39.031,174.689h28.418c2.761,0,5-2.239,5-5v-28.418c0-2.761-2.239-5-5-5H39.031c-2.761,0-5,2.239-5,5v28.418 C34.031,172.45,36.27,174.689,39.031,174.689z">
                                                    </path>
                                                    <path
                                                        d="M100.031,174.689h28.418c2.761,0,5-2.239,5-5v-28.418c0-2.761-2.239-5-5-5h-28.418c-2.761,0-5,2.239-5,5v28.418 C95.031,172.45,97.27,174.689,100.031,174.689z">
                                                    </path>
                                                    <path
                                                        d="M161.031,174.689h28.418c2.761,0,5-2.239,5-5v-28.418c0-2.761-2.239-5-5-5h-28.418c-2.761,0-5,2.239-5,5v28.418 C156.031,172.45,158.27,174.689,161.031,174.689z">
                                                    </path>
                                                    <path
                                                        d="M222.031,174.689h28.418c2.761,0,5-2.239,5-5v-28.418c0-2.761-2.239-5-5-5h-28.418c-2.761,0-5,2.239-5,5v28.418 C217.031,172.45,219.27,174.689,222.031,174.689z">
                                                    </path>
                                                    <path
                                                        d="M39.031,235.356h28.418c2.761,0,5-2.239,5-5v-28.418c0-2.761-2.239-5-5-5H39.031c-2.761,0-5,2.239-5,5v28.418 C34.031,233.117,36.27,235.356,39.031,235.356z">
                                                    </path>
                                                    <path
                                                        d="M100.031,235.356h28.418c2.761,0,5-2.239,5-5v-28.418c0-2.761-2.239-5-5-5h-28.418c-2.761,0-5,2.239-5,5v28.418 C95.031,233.117,97.27,235.356,100.031,235.356z">
                                                    </path>
                                                    <path
                                                        d="M161.031,235.356h28.418c2.761,0,5-2.239,5-5v-28.418c0-2.761-2.239-5-5-5h-28.418c-2.761,0-5,2.239-5,5v28.418 C156.031,233.117,158.27,235.356,161.031,235.356z">
                                                    </path>
                                                    <path
                                                        d="M222.031,235.356h28.418c2.761,0,5-2.239,5-5v-28.418c0-2.761-2.239-5-5-5h-28.418c-2.761,0-5,2.239-5,5v28.418 C217.031,233.117,219.27,235.356,222.031,235.356z">
                                                    </path>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </svg><span class="crmright_mob_head_title">Calendar</span></a></li>

                        <li><a href="#"><svg width="64px" height="64px" viewBox="0 0 32 32"
                                    xmlns="http://www.w3.org/2000/svg" fill="#000000">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                    </g>
                                    <g id="SVGRepo_iconCarrier">
                                        <g fill="none" fill-rule="evenodd">
                                            <path d="m0 0h32v32h-32z"></path>
                                            <path
                                                d="m28.5 32h-25v-32h25zm-2-23h-21v21h21zm-15 15v3h-3v-3zm6 0v3h-3v-3zm6 0v3h-3v-3zm-12-6v3h-3v-3zm6 0v3h-3v-3zm6 0v3h-3v-3zm-12-6v3h-3v-3zm6 0v3h-3v-3zm6 0v3h-3v-3zm3-10h-21v5h21z"
                                                fill="#000000" fill-rule="nonzero"></path>
                                        </g>
                                    </g>
                                </svg><span class="crmright_mob_head_title">Pivot</span></a></li>

                        <li><a href="#"><svg width="64px" height="64px" viewBox="0 0 48 48"
                                    xmlns="http://www.w3.org/2000/svg" fill="#000000">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                    </g>
                                    <g id="SVGRepo_iconCarrier">
                                        <title>chart-area</title>
                                        <g id="Layer_2" data-name="Layer 2">
                                            <g id="invisible_box" data-name="invisible box">
                                                <rect width="48" height="48" fill="none"></rect>
                                            </g>
                                            <g id="icons_Q2" data-name="icons Q2">
                                                <path
                                                    d="M41.9,33.3,36,18.4a1.9,1.9,0,0,0-2.7-1.1l-7.7,4.1a.9.9,0,0,1-1.1-.1L15.4,10.6A2,2,0,0,0,12,12V36H40A2.1,2.1,0,0,0,41.9,33.3Z">
                                                </path>
                                                <path d="M42,40H8V6A2,2,0,0,0,4,6V44H42a2,2,0,0,0,0-4Z"></path>
                                            </g>
                                        </g>
                                    </g>
                                </svg><span class="crmright_mob_head_title">Graph</span></a></li>

                        <li><a href="#"><svg width="64px" height="64px" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                    </g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path
                                            d="M12 21C15.5 17.4 19 14.1764 19 10.2C19 6.22355 15.866 3 12 3C8.13401 3 5 6.22355 5 10.2C5 14.1764 8.5 17.4 12 21Z"
                                            stroke="#000000" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                        <path
                                            d="M12 13C13.6569 13 15 11.6569 15 10C15 8.34315 13.6569 7 12 7C10.3431 7 9 8.34315 9 10C9 11.6569 10.3431 13 12 13Z"
                                            stroke="#000000" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                    </g>
                                </svg><span class="crmright_mob_head_title">Map</span></a></li>

                        <li><a href="#"><svg width="64px" height="64px" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                    </g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path
                                            d="M12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21Z"
                                            stroke="#000000" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                        <path d="M12 6V12" stroke="#000000" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                        <path d="M16.24 16.24L12 12" stroke="#000000" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                    </g>
                                </svg><span class="crmright_mob_head_title">Activity</span></a></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
    <div class="crm_head_centerside mob_search_info">
        <form>
            <input type="text" name="search" placeholder="Search..">
            <span class="heade_search_icon"><svg fill="#000000" height="64px" width="64px" version="1.1"
                    id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                    viewBox="0 0 512 512" xml:space="preserve">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <g>
                            <g>
                                <path
                                    d="M387.478,340.255c-13.413,17.894-29.328,33.81-47.222,47.222L464.778,512L512,464.778L387.478,340.255z">
                                </path>
                            </g>
                        </g>
                        <g>
                            <g>
                                <path
                                    d="M200.348,0C89.876,0,0,89.876,0,200.348s89.876,200.348,200.348,200.348s200.348-89.876,200.348-200.348 S310.82,0,200.348,0z M200.348,350.609c-82.854,0-150.261-67.407-150.261-150.261S117.494,50.087,200.348,50.087 s150.261,67.407,150.261,150.261S283.202,350.609,200.348,350.609z">
                                </path>
                            </g>
                        </g>
                        <g>
                            <g>
                                <path
                                    d="M200.348,83.478c-64.442,0-116.87,52.428-116.87,116.87s52.428,116.87,116.87,116.87s116.87-52.428,116.87-116.87 S264.79,83.478,200.348,83.478z">
                                </path>
                            </g>
                        </g>
                    </g>
                </svg></span>
        </form>
    </div>
</div>
@yield('content')
<script>
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }

    @if(Session::has('success'))
    toastr.success("{{ Session::get('success') }}");
    @endif

    @if(Session::has('error'))
    toastr.error("{{ Session::get('error') }}");
    @endif

    @if ($errors->any())
    @foreach ($errors->all() as $error)
    toastr.error("{{ $error }}");
    @endforeach
    @endif
</script>
@stack('scripts')
</body>
</html>
