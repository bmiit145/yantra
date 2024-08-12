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
            <a href="{{ route('contact.index', ['tab' => 'customers']) }}">Customers</a>
        </div>
    </li>
    <li class="dropdown">
        <a href="{{ url('lead') }}">Leads</a>

    </li>
    <li class="dropdown">
        <a href="#">Reporting</a>
        <div class="dropdown-content">
            <!-- Dropdown content for Reporting -->
            <a href="{{route('crm.forecasting')}}">Forecast</a>
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
<section class="crm_content">
    <div class="crm_content_row">
        <div class="crm_content_wapper">
            @foreach ($pipeline as $stage)
                <div class="crm_content_col" id="{{ strtolower(str_replace(' ', '-', $stage->title)) }}"
                    ondrop="drop(event)" ondragover="allowDrop(event)">
                    <div class="crm_content_info">
                        <p>{{ $stage->title }}</p>
                        <svg width="64px" height="64px" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path d="M6 12H18M12 6V18" stroke="#000000" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
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
                                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512"
                                                x="0" y="0" viewBox="0 0 65 65"
                                                style="enable-background:new 0 0 512 512" xml:space="preserve"
                                                class="">
                                                <g>
                                                    <path
                                                        d="m18.029 29.199-4.812-.699-2.154-4.363a1.5 1.5 0 0 0-2.691 0L6.221 28.5l-4.814.699a1.501 1.501 0 0 0-.831 2.559l3.483 3.395-.824 4.793A1.498 1.498 0 0 0 4.714 41.7c.239 0 .479-.057.698-.172l4.306-2.263 4.306 2.263a1.501 1.501 0 0 0 2.177-1.582l-.822-4.793 3.482-3.395a1.502 1.502 0 0 0-.832-2.559zM40.812 29.199l-4.814-.699-2.153-4.362a1.498 1.498 0 0 0-2.69 0L29.002 28.5l-4.814.699a1.501 1.501 0 0 0-.831 2.559l3.483 3.395-.822 4.793a1.5 1.5 0 0 0 2.177 1.582l4.306-2.263 4.304 2.263a1.504 1.504 0 0 0 1.58-.114c.462-.336.693-.904.597-1.467l-.821-4.794 3.483-3.395a1.5 1.5 0 0 0-.832-2.559zM64.804 30.22a1.501 1.501 0 0 0-1.211-1.021l-4.815-.699-2.15-4.362a1.5 1.5 0 0 0-2.691 0L51.784 28.5l-4.815.699a1.5 1.5 0 0 0-.831 2.559l3.484 3.395-.823 4.793a1.498 1.498 0 0 0 1.479 1.754c.238 0 .479-.057.697-.172l4.308-2.263 4.307 2.263a1.5 1.5 0 0 0 2.176-1.582l-.823-4.793 3.482-3.395c.408-.399.554-.995.379-1.538z"
                                                        fill="#000000" opacity="1" data-original="#000000"
                                                        class=""></path>
                                                </g>
                                            </svg>
                                        </div>
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            style="width: 1em; height: 1em;vertical-align: middle;fill: currentColor;overflow: hidden;"
                                            version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512"
                                            height="512" x="0" y="0" viewBox="0 0 512 512" xml:space="preserve"
                                            class="">
                                            <g>
                                                <path
                                                    d="M349.899 313.5v-.3c-7.5-7.8-15.599-15.601-25.199-23.101 65.4-20.7 101.999-70.499 101.999-140.4 0-62.999-33.3-116.1-84.6-135.901C317.501 4.499 280.299 0 228.099 0H35.5v512h124.2V309.899c36.711 0 34.854 5.895 47.999 20.101 15.312 16.735 67.089 98.459 120.901 182h147.9c-60.864-101.473-104.654-174.391-126.601-198.5zM159.7 111.299c26.206-.084 92.305-.437 104.099 1.201 23.701 4.2 35.7 18.6 35.7 43.2 0 21.599-9 36.299-26.1 42.299-19.349 6.912-86.441 4.801-113.699 4.801z"
                                                    fill="#00a5a8" opacity="1" data-original="#000000"
                                                    class=""></path>
                                            </g>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            @endforeach
            <div class="crm_content_col">
                <div class="crm_content_info stage_main" id="addStage" style="cursor: pointer;">
                    <p class="stage_new_info"><span><svg width="64px" height="64px" viewBox="0 0 24 24"
                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path d="M6 12H18M12 6V18" stroke="#000000" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
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

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
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
                            <strong>Opportunity e <span class="text-danger">*</span></strong>
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
                            <input type="text" class="form-control" placeholder="e.g. 0123456789" name="phone"
                                required />
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12 form-group">
                            <strong>Expected Revenue <span class="text-danger">*</span></strong>
                            <input type="number" class="form-control" placeholder="₹ 0.00" name="expected_revenue"
                                required />
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
@endsection
