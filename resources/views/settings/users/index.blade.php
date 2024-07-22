@extends('layout.header')
@section('content')

@vite(['resources/css/settings.css',
    'resources/css/odoo/web.assets_web.css'])
@section('title', 'Setting')
@section('image_url', 'images/Settings.png')
@section('navbar_menu')
    <li><a href="#">General Settings</a></li>
    <li><a href="#">Users & Companies</a></li>

@endsection


<div class="card">
    <div class="card-body">
        <div class="table-responsive text-nowrap">
            <table id="userDataTable" class="display nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Sr No.</th>
                        <th>Name</th>
                        <th>Login.</th>
                        <th>Latest authentication</th>
                        <th>Status</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

<!-- Include jQuery and DataTables JS and CSS -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
<script>
    $(document).ready(function() {
        var UserDataTable = $('#userDataTable').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "{{ route('api.users') }}",
                "type": "GET"
            },
            "columns": [{
                    name: 'id',
                render: function(data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'last_login_at',
                    name: 'last_login_at'
                },
                {
                    data: 'status',
                    name: 'status',
                    render: function(data, type, row) {
                        if(row.is_confirmed != null){
                            return '<span class="badge rounded-pill text-bg-success">Confirmed</span>';
                        }else{
                            return '<span class="badge rounded-pill text-bg-info">Never Connected</span>';
                        }
                    }
                }
            ]
        });
    });
</script>

@endsection
