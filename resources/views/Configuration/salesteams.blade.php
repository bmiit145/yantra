
@extends('layout.header')
{{--@section('head_new_btn_link', route('crm.show' , ['crm' => 'new']))--}}

@section('navbar_menu')
<li class="dropdown">
    <a href="#">Sales</a>
    <div class="dropdown-content">
        <a href="{{ route('crm.index') }}">My Pipeline</a>
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
        <a href="{{route('crm.forecasting')}}">Forecast</a>
        <a href="{{ route('crm.index') }}">Pipeline</a>
        <a href="{{ route('lead.index') }}">Leads</a>
        <a href="#">Activities</a>
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

@section('head_breadcrumb_title', 'Recurring Plan')
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
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="card" style="padding: 1%">
    <div class="table-responsive text-nowrap">
        <table id="example" class="display nowrap">
            <thead>
                <tr>
                    <th>Number</th>
                    <th>Sales Team</th>
                    <th>Alias</th>
                    <th>Team Leader<th>
                </tr>
            </thead>
            <tbody>
            <?php
                $index = 1;
            ?>
                @foreach($data as $value)
                <tr>
                    <td>{{$index ++}}</td>
                    <td>{{$value->plan_name}}</td>
                    <td>{{$value->months}}</td>
                    <td>
                        <a href="#" style="font-size: x-large;" data-id="{{$value->id}}" data-name="{{$value->plan_name}}" data-action="{{$value->months}}" class="edit"><i class="fa fa-edit"></i></a>
                       <a href="#" style="font-size: x-large; color: red" class="delete" data-id="{{ $value->id }}"><i class="fa fa-trash-o"></i></a>

                    <td>
                    
                </tr>
                @endforeach

            </tbody>
        </table>
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
          $('#plan-name').val('');
        $('#months').val('');
    });
    $('.edit').click(function() {
        $('#exampleModal').modal('show');
        var id = $(this).data('id');
        var name = $(this).data('name');
        var action = $(this).data('action');
        $('#plan-name').val(name);
        $('#months').val(action);
        $('.hader_activity').text('Update Recurring Plan');
        $('.activityForm_txt').text('Update');
        $('#activityForm').attr('action', '/configuration/update_recurring/' + id);

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
                        window.location.href = '/configuration/delete_recurring/' + itemId;
                    }
                }
            });
        });
    });
</script>


@endsection
