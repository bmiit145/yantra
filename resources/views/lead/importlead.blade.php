@extends('layout.header')
@section('content')
@section('head_breadcrumb_title', 'Leads')
@section('head_new_btn_link', route('lead.create'))
@section('lead', route('lead.index'))
@section('kanban', route('lead.kanban', ['lead' => 'kanban']))
@section('calendar', route('lead.calendar', ['lead' => 'calendar']))
@section('char_area', route('lead.graph'))
@section('activity', route('lead.activity'))

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
                                Leads &amp; Opportunities</span></a></div><a title="Documentation" target="_blank"
                        href="https://www.odoo.com/documentation/saas-17.4/applications/general/export_import_data.html"
                        class="o_doc_link me-2"><span>Import FAQ</span></a>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection