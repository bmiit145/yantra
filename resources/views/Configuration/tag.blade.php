@extends('layout.header')
{{--@section('head_new_btn_link', route('crm.show' , ['crm' => 'new']))--}}

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
    <li>
        <a href="{{ route('lead.index') }}">Leads</a>
    </li>
    <li class="dropdown">
        <a href="#">Reporting</a>
        <div class="dropdown-content">
            <!-- Dropdown content for Reporting -->
            <a href="{{ route('crm.forecasting') }}">Forecast</a>
            <a href="{{ route('crm.pipeline.graph') }}">Pipeline</a>
            <a href="{{ route('lead.graph') }}">Leads</a>
            <a href="{{route('crm.pipeline.graph')}}">Activities</a>
        </div>
    </li>
    <li class="dropdown">
        <a href="#">Configuration</a>
        <div class="dropdown-content">
              <a href="#"><b>Sales Teams</b></a>
            <a href="#"><b>Activities</b></a>
            <a href="{{route('configuration.activitytype')}}" style="margin-left: 15px;">Activity Types</a>
            <a href="#" style="margin-left: 15px;">Activity Plans</a>
            <a href="{{route('configuration.recurring_index')}}"><b>Recurring Plans</b></a>
            <a href="#"><b>Pipeline</b></a>
            <a href="{{route('configuration.tag_index')}}" style="margin-left: 15px;">Tags</a>
            <a href="{{route('configuration.lostreasons_index')}}" style="margin-left: 15px;">Lost Reasons</a>
        </div>
    </li>
@endsection

@section('head_breadcrumb_title', 'Tags')
@section('head')
@vite([
'resources/css/crm_2.css',
])
@endsection



@section('content')

<style>
    #main_save_btn {
        display: none;
    }

    .crmright_head_main__1 {
        display: none;
    }

    #search-input {
        display: none;
    }
     .seeting{
        display: none;
    }


</style>
<style>
    /* Style for the color radio buttons */
    .color-radio {
        display: inline-block;
        width: 40px;
        height: 40px;
        margin: 5px;
        position: relative;
        cursor: pointer;
        border: 2px solid transparent;
    }
    .color-radio input[type="radio"] {
        display: none;
    }
    .color-radio input[type="radio"]:checked + .color-swatch {
        border: 2px solid black; /* Add border when radio is selected */
    }
    .color-swatch {
        width: 100%;
        height: 100%;
        border-radius: 5px;
        display: inline-block;
        background-color: transparent;
        border: 2px solid #ddd;
    }
</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="card" style="padding: 1%">
    <div class="table-responsive text-nowrap">
        <table id="example" class="display nowrap">
            <thead>
                <tr>
                    <th>Number</th>
                    <th>Tag Name</th>
                    <th>Color</th>
                    <th>Action<th>
                </tr>
            </thead>
            <tbody>
            <?php
                $index = 1;
            ?>
                @foreach($data as $value)
                <tr>
                    <td>{{$index ++}}</td>
                    <td>{{$value->name}}</td>
                    <td>
                    <label class="color-radio">
                                <input type="radio" name="color" value="#99ffcc" required>
                                <span class="color-swatch" style="background-color: {{$value->color}};"></span>
                            </label></td>
                    <td>
                        <a href="#" style="font-size: x-large;" data-id="{{$value->id}}" data-name="{{$value->name}}" data-color="{{$value->color}}" class="edit"><i class="fa fa-edit"></i></a>
                       <a href="#" style="font-size: x-large; color: red" class="delete" data-id="{{ $value->id }}"><i class="fa fa-trash-o"></i></a>

                    <td>
                    
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title hader_activity" id="exampleModalLabel">Add Tag</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body"> 
                <form id="activityForm" action="{{ route('configuration.store_tag') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Tag Name</label>
                        <input type="text" name="name" class="form-control" id="name" required>
                    </div>

                    <div class="mb-3">
                        <label for="color" class="col-form-label">Select a Color</label>
                        <div class="color-options">
                            <label class="color-radio">
                                <input type="radio" name="color" value="#ffcccc" required>
                                <span class="color-swatch" style="background-color: #ffcccc;"></span>
                            </label>
                            <label class="color-radio">
                                <input type="radio" name="color" value="#ffcc99" required>
                                <span class="color-swatch" style="background-color: #ffcc99;"></span>
                            </label>
                            <label class="color-radio">
                                <input type="radio" name="color" value="#ffff99" required>
                                <span class="color-swatch" style="background-color: #ffff99;"></span>
                            </label>
                            <label class="color-radio">
                                <input type="radio" name="color" value="#99ffcc" required>
                                <span class="color-swatch" style="background-color: #99ffcc;"></span>
                            </label>
                            <label class="color-radio">
                                <input type="radio" name="color" value="#99ccff" required>
                                <span class="color-swatch" style="background-color: #99ccff;"></span>
                            </label>
                            <label class="color-radio">
                                <input type="radio" name="color" value="#cc99ff" required>
                                <span class="color-swatch" style="background-color: #cc99ff;"></span>
                            </label>
                            <label class="color-radio">
                                <input type="radio" name="color" value="#ff99cc" required>
                                <span class="color-swatch" style="background-color: #ff99cc;"></span>
                            </label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" form="activityForm" class="btn btn-primary activityForm_txt">Save</button>
            </div>
        </div>
    </div>
</div>




<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
    
    $('.head_new_btn').click(function() {
        $('#exampleModal').modal('show');
        $('#name').val('');
        $("input[name='color']").prop('checked', false);
    });
    $('.edit').click(function() {
        $('#exampleModal').modal('show');
        var id = $(this).data('id');
        var name = $(this).data('name');
        var color = $(this).data('color');
        $('#name').val(name);
        $("input[name='color'][value='" + color + "']").prop('checked', true);
        $('.hader_activity').text('Update Tag');
        $('.activityForm_txt').text('Update');
        $('#activityForm').attr('action', '/configuration/update_tag/' + id);

    });
   
</script>
<script>
    document.querySelectorAll('.delete').forEach(function(button) {
        button.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent default link behavior

            const itemId = this.getAttribute('data-id'); // Get the item ID

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Perform the delete action here (AJAX or form submission)
                    Swal.fire(
                        'Deleted!',
                        'Your item has been deleted.',
                        'success'
                    )

                  if (result.isConfirmed) {
                        window.location.href = '/configuration/delete_tag/' + itemId;
                    }
                }
            });
        });
    });
</script>


@endsection
