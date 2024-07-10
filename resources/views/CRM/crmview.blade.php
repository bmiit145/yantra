<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/crm.css')
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/home.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
            
        <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body>
    <div class="main_header_wrapper">
        <div class="crmtop_header">
            <div class="top_left_navbar">
                <a href="#" class="o_menu_toggle">
                    <img src="assets/images/crmlogo.png" alt="Avatar" class="crm_logo">
                    <a class="o_menu_brand">CRM</a>
                </a>
                <div class="top_left_navbar_menu">
                    <ul class="navbar_menu_wapper">
                        <li><a href="#">Sales</a></li>
                        <li><a href="#">Leads</a></li>
                        <li><a href="#">Reporting</a></li>
                        <li><a href="#">Configuration</a></li>
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
                                style="width: 1em; height: 1em;vertical-align: middle;fill: currentColor;overflow: hidden;"version="1.1"
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
                        <a class="head_new_btn" data-toggle="modal" data-target="#exampleModalCenter"
                            href="#">New</a>
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
                            <li><a href="#"><svg width="64px" height="64px" viewBox="0 0 15 15"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
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
                            <li><a href="#"><svg fill="#000000" width="64px" height="64px"
                                        viewBox="0 0 36 36" version="1.1" preserveAspectRatio="xMidYMid meet"
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                        </g>
                                        <g id="SVGRepo_iconCarrier">
                                            <title>view-list-line</title>
                                            <rect class="clr-i-outline clr-i-outline-path-1" x="2" y="8"
                                                width="2" height="2"></rect>
                                            <path class="clr-i-outline clr-i-outline-path-2"
                                                d="M7,10H31a1,1,0,0,0,0-2H7a1,1,0,0,0,0,2Z"></path>
                                            <rect class="clr-i-outline clr-i-outline-path-3" x="2" y="14"
                                                width="2" height="2"></rect>
                                            <path class="clr-i-outline clr-i-outline-path-4"
                                                d="M31,14H7a1,1,0,0,0,0,2H31a1,1,0,0,0,0-2Z"></path>
                                            <rect class="clr-i-outline clr-i-outline-path-5" x="2" y="20"
                                                width="2" height="2"></rect>
                                            <path class="clr-i-outline clr-i-outline-path-6"
                                                d="M31,20H7a1,1,0,0,0,0,2H31a1,1,0,0,0,0-2Z"></path>
                                            <rect class="clr-i-outline clr-i-outline-path-7" x="2" y="26"
                                                width="2" height="2"></rect>
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
                            <li><a href="#"><svg width="64px" height="64px" viewBox="0 0 24 24"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
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
                            <li><a href="#"><svg width="64px" height="64px" viewBox="0 0 24 24"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                        </g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path
                                                d="M12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21Z"
                                                stroke="#000000" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                            <path d="M12 6V12" stroke="#000000" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M16.24 16.24L12 12" stroke="#000000" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                        </g>
                                    </svg></a></li>
                        </ul>
                        <ul class="crmright_head_main crmright_head_main__2">
                            <li><a href="#"><svg width="64px" height="64px" viewBox="0 0 15 15"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
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

                            <li><a href="#"><svg fill="#000000" width="64px" height="64px"
                                        viewBox="0 0 36 36" version="1.1" preserveAspectRatio="xMidYMid meet"
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                        </g>
                                        <g id="SVGRepo_iconCarrier">
                                            <title>view-list-line</title>
                                            <rect class="clr-i-outline clr-i-outline-path-1" x="2" y="8"
                                                width="2" height="2"></rect>
                                            <path class="clr-i-outline clr-i-outline-path-2"
                                                d="M7,10H31a1,1,0,0,0,0-2H7a1,1,0,0,0,0,2Z"></path>
                                            <rect class="clr-i-outline clr-i-outline-path-3" x="2" y="14"
                                                width="2" height="2"></rect>
                                            <path class="clr-i-outline clr-i-outline-path-4"
                                                d="M31,14H7a1,1,0,0,0,0,2H31a1,1,0,0,0,0-2Z"></path>
                                            <rect class="clr-i-outline clr-i-outline-path-5" x="2" y="20"
                                                width="2" height="2"></rect>
                                            <path class="clr-i-outline clr-i-outline-path-6"
                                                d="M31,20H7a1,1,0,0,0,0,2H31a1,1,0,0,0,0-2Z"></path>
                                            <rect class="clr-i-outline clr-i-outline-path-7" x="2" y="26"
                                                width="2" height="2"></rect>
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

                            <li><a href="#"><svg width="64px" height="64px" viewBox="0 0 24 24"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
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

                            <li><a href="#"><svg width="64px" height="64px" viewBox="0 0 24 24"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                        </g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path
                                                d="M12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21Z"
                                                stroke="#000000" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                            <path d="M12 6V12" stroke="#000000" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round"></path>
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



    <section class="crm_content">
        <div class="crm_content_row">
            <div class="crm_content_wapper">
                @foreach ($pipeline as $stage)
                <div class="crm_content_col" id="{{ strtolower(str_replace(' ', '-', $stage->title)) }}" ondrop="drop(event)" ondragover="allowDrop(event)">
                    <div class="crm_content_info">
                        <p>{{ $stage->title }}</p>
                        <svg width="64px" height="64px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path d="M6 12H18M12 6V18" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            </g>
                        </svg>
                    </div>
                    @foreach ($data as $item)
                        @if ($item->stage == $stage->name)
                        <div class="crm_card_info" draggable="true" ondragstart="drag(event)">
                            <div class="crm_card_row">
                                <p>{{ $item->organization }}</p>
                                <span>{{ $item->opportunity }}</span>
                                <div class="card_bottom_info">
                                    <div class="card_review_icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 65 65" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                            <g>
                                                <path d="m18.029 29.199-4.812-.699-2.154-4.363a1.5 1.5 0 0 0-2.691 0L6.221 28.5l-4.814.699a1.501 1.501 0 0 0-.831 2.559l3.483 3.395-.824 4.793A1.498 1.498 0 0 0 4.714 41.7c.239 0 .479-.057.698-.172l4.306-2.263 4.306 2.263a1.501 1.501 0 0 0 2.177-1.582l-.822-4.793 3.482-3.395a1.502 1.502 0 0 0-.832-2.559zM40.812 29.199l-4.814-.699-2.153-4.362a1.498 1.498 0 0 0-2.69 0L29.002 28.5l-4.814.699a1.501 1.501 0 0 0-.831 2.559l3.483 3.395-.822 4.793a1.5 1.5 0 0 0 2.177 1.582l4.306-2.263 4.304 2.263a1.504 1.504 0 0 0 1.58-.114c.462-.336.693-.904.597-1.467l-.821-4.794 3.483-3.395a1.5 1.5 0 0 0-.832-2.559zM64.804 30.22a1.501 1.501 0 0 0-1.211-1.021l-4.815-.699-2.15-4.362a1.5 1.5 0 0 0-2.691 0L51.784 28.5l-4.815.699a1.5 1.5 0 0 0-.831 2.559l3.484 3.395-.823 4.793a1.498 1.498 0 0 0 1.479 1.754c.238 0 .479-.057.697-.172l4.308-2.263 4.307 2.263a1.5 1.5 0 0 0 2.176-1.582l-.823-4.793 3.482-3.395c.408-.399.554-.995.379-1.538z" fill="#000000" opacity="1" data-original="#000000" class=""></path>
                                            </g>
                                        </svg>
                                    </div>
                                    <img src="assets/images/r_logo.png" class="r_card_logo">
                                </div>
                            </div>
                        </div>
                        @endif
                    @endforeach
                </div>
                @endforeach
                <div class="crm_content_col">
                    <div class="crm_content_info stage_main" id="addStage" style="cursor: pointer;">
                        <p class="stage_new_info"><span ><svg width="64px" height="64px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path d="M6 12H18M12 6V18" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            </g>
                        </svg></span>Stage</p>
                    </div>
                    <div id="newStageForm" class="hidden" style="display: none;text-align: center;">
                        <input type="text" id="newStageInput" class="form-control" placeholder="Enter stage name">
                        <button type="button" id="saveStageBtn" class="btn btn-primary mt-2">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('crm.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mt-3">
                            <div class="col-md-12 form-group">
                                <strong>Organization / Contact <span class="text-danger">*</span></strong>
                                <input type="text" class="form-control" name="organization" required />
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12 form-group">
                                <strong>Opportunity <span class="text-danger">*</span></strong>
                                <input type="text" class="form-control" placeholder="e.g. Product Pricing"
                                    name="opportunity" required />
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12 form-group">
                                <strong>Email <span class="text-danger">*</span></strong>
                                <input type="email" class="form-control" placeholder="e.g. email@address.com"
                                    name="email" required />
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12 form-group">
                                <strong>Phone <span class="text-danger">*</span></strong>
                                <input type="text" class="form-control" placeholder="e.g. 0123456789"
                                    name="phone" required />
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12 form-group">
                                <strong>Expected Revenue <span class="text-danger">*</span></strong>
                                <input type="number" class="form-control" placeholder="₹ 0.00"
                                    name="expected_revenue" required />
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    <script>
        $(document).ready(function() {
            if ($(window).width() < 576) {
                $("ul.crmright_head_main.crmright_head_main__2").hide();
                $(".crmright_head_inner .crmright_head_main.crmright_head_main__1 li").click(function() {
                    $(".crmright_head_inner .crmright_head_main.crmright_head_main__1").next()
                        .slideToggle();
                });
            };
        });
    </script>


    <script>
        function allowDrop(event) {
            event.preventDefault();
        }

        function drag(event) {
            event.dataTransfer.setData("text", event.target.id);
            setTimeout(() => {
                event.target.classList.add('dragging');
            }, 0);
        }

        function drop(event) {
            event.preventDefault();
            const id = event.dataTransfer.getData("text");
            const element = document.getElementById(id);
            if (element) {
                event.target.appendChild(element);
                element.classList.remove('dragging');
            }
        }

        document.querySelectorAll('.crm_card_info').forEach(card => {
            card.setAttribute('id', 'card_' + Math.random().toString(36).substr(2, 9));
        });

        $('#myModal').on('shown.bs.modal', function() {
            $('#myInput').trigger('focus')
        })
    </script>

<script>
  
    $(document).on('click', '#addStage', function(event) {
        console.log('hello');
        event.preventDefault();
        $('#newStageForm').show();
    });

    
</script>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#addStage').click(function() {
            $('#newStageForm').toggleClass('hidden');
        });

        $('#saveStageBtn').click(function(event) {
            event.preventDefault();
            var newStage = $('#newStageInput').val();
            if (!newStage) {
                alert('Please enter a stage name.');
                return;
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: "{{ route('crm.newStage') }}",
                data: {
                    newStage: newStage,
                },
                success: function(response) {
                    console.log(response);
                    $('#newStageForm').addClass('hidden');
                    $('#newStageInput').val('');

                    toastr.success("Successfully add");
                    setTimeout(function() {
                        location.reload();
                    }, 1000);
                    
                },
                error: function(err) {
                    console.log(err);
                }
            });
        });
    });
</script>

</body>

</html>
