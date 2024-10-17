@extends('layout.header')
@section('content')
@section('head_breadcrumb_title')
    {!! '<a href="' . route('lead.index') . '">Leads</a> <br> Import a File' !!}
@endsection

@section('head_new_btn_name', 'Upload File')
@section('cancel_name', 'Cancel')
@section('cancel_link', route('lead.index'))
@section('lead', route('lead.index'))
@section('kanban', route('lead.kanban', ['lead' => 'kanban']))
@section('calendar', route('lead.calendar', ['lead' => 'calendar']))
@section('char_area', route('lead.graph'))
@section('activity', route('lead.activity'))
@vite(['resources/css/leadImport.css'])
@section('navbar_menu')
<li class="dropdown">
    <a href="#">Sales</a>
    <div class="dropdown-content">
        <a href="{{url('/crm')}}">My Pipeline</a>
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

<style>
    .lh-1 {
        display: none;
    }
    .o_cp_searchview {
        display: none !important;
    }
    .new_btn_info_cancel{
        display: block !important;
    }
</style>
<style>
    #filePreviewTable {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }
    #filePreviewTable th, #filePreviewTable td {
        border: 1px solid #ccc;
        padding: 8px;
        text-align: left;
    }
    #filePreviewTable th {
        background-color: #f4f4f4;
        font-weight: bold;
    }
    #filePreviewTable tr:nth-child(even) {
        background-color: #f9f9f9; /* Light gray for even rows */
    }
    #filePreviewTable tr:hover {
        background-color: #eaeaea; /* Highlight on hover */
    }
</style>

<form id="uploadForm" action="{{ route('lead.import') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="file" id="fileUpload" accept=".xls,.xlsx,.csv" style="display:none;">
  
</form>

<div id="previewSection" style="display:none;padding: 2%;">
    <h3>File Preview</h3>
    <br>
    <div style="max-height: 500px; overflow-y: auto">
        <table id="filePreviewTable" style="width: 100%; border-collapse: collapse;">
            <!-- Data will be dynamically loaded here -->
        </table>
    </div>
    <br>
    <div style="text-align: center;">
        <button type="button"  class="btn btn-success" id="confirmImportBtn">Confirm</button>
        <button type="button"  class="btn btn-danger" id="cancelImportBtn">Cancel</button>
    </div>
</div>

<div class="o_action_manager">
    <div class="h-100 d-flex flex-column">
       
        <div class="o_content o_import_action d-flex h-100 overflow-auto">
            <div class="o_view_nocontent">
                <div class="o_nocontent_help">
                    <p class="o_view_nocontent_smiling_face"> Upload an Excel or CSV file to import </p>
                    <p> Excel files are recommended as formatting is automatic. </p>
                    <div class="mt16 mb4">Need Help?</div>
                    <div><a class="btn btn-outline-primary mb32 mt8" aria-label="Download" data-tooltip="Download"
                            href="/crm/static/xls/crm_lead.xls"><i class="fa fa-download"></i> <span>Import Template for
                                Leads &amp; Opportunities</span></a></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const fileInput = document.getElementById('fileUpload');
        const uploadBtn = document.querySelector('.head_new_btn');
        const confirmImportBtn = document.getElementById('confirmImportBtn');
        const uploadForm = document.getElementById('uploadForm');
        const previewSection = document.getElementById('previewSection');
        const table = document.getElementById('filePreviewTable');

        uploadBtn.addEventListener('click', function(event) {
            event.preventDefault();
            fileInput.click(); // Trigger the file input click
        });

        fileInput.addEventListener('change', function(event) {
            // Hide no content help
                $('.o_nocontent_help').hide();
            const file = event.target.files[0];
            if (!file) return;

            const reader = new FileReader();
            const fileExtension = file.name.split('.').pop().toLowerCase();

            reader.onload = function(e) {
                table.innerHTML = ""; // Clear previous preview

                if (fileExtension === 'csv') {
                    const rows = e.target.result.split('\n');
                    rows.forEach((row, index) => {
                        const tr = document.createElement('tr');
                        const cells = row.split(',');

                        cells.forEach((cell, cellIndex) => {
                            const cellElement = document.createElement(index === 0 ? 'th' : 'td');
                            
                            // Replace empty cell or '-' with 'N/A'
                            cellElement.textContent = (cell && cell.trim() !== '-' && cell.trim() !== '') ? cell : 'N/A';
                            
                            tr.appendChild(cellElement);
                        });

                        table.appendChild(tr);
                    });
                } else if (fileExtension === 'xls' || fileExtension === 'xlsx') {
                    const data = new Uint8Array(e.target.result);
                    const workbook = XLSX.read(data, { type: 'array' });
                    const firstSheet = workbook.Sheets[workbook.SheetNames[0]];
                    const jsonData = XLSX.utils.sheet_to_json(firstSheet, { header: 1, defval: 'N/A' });

                    jsonData.forEach((row, index) => {
                        const tr = document.createElement('tr');

                        row.forEach((cell) => {
                            const cellElement = document.createElement(index === 0 ? 'th' : 'td');
                            
                            // Display the cell content or 'N/A' if cell is empty
                            cellElement.textContent = cell || 'N/A';

                            tr.appendChild(cellElement);
                        });

                        table.appendChild(tr);
                    });
                } else {
                    alert('Invalid file type. Please upload a CSV, XLS, or XLSX file.');
                    return;
                }
                previewSection.style.display = 'block'; // Show the preview section
            };

            if (fileExtension === 'csv') {
                reader.readAsText(file);
            } else {
                reader.readAsArrayBuffer(file);
            }
        });


        confirmImportBtn.addEventListener('click', function() {
            uploadForm.submit(); // Submit the form to store the file
        });
    });
    $('#cancelImportBtn').on('click', function(){
        location.reload();
    });
</script>


@endsection