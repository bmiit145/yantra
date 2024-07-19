@extends('layout.header')
@section('content')

@vite('resources/css/settings.css')
@section('title', 'Setting')
@section('image_url', 'images/Settings.png')
@section('navbar_menu')
    <li><a href="#">General Settings</a></li>
    <li><a href="#">Users & Companies</a></li>

@endsection


<div class="card">
    <div class="card-body">
        <div class="table-responsive text-nowrap">
            <table id="example" class="display nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Sr No.</th>
                        <th>Name</th>
                        <th>Login.</th>
                        <th>Latest authentication</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Example data, replace with your actual data -->
                    <tr>
                        <td>1</td>
                        <td>John Doe</td>
                        <td>1234567890</td>
                        <td>john.doe@example.com</td>
                        <td>Action</td>
                    </tr>
                    <!-- More rows here -->
                </tbody>
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
        $('#example').DataTable();
    });
</script>

@endsection
