@extends('layout.master')

@section('title', 'تقرير الافكارالممولة')

@section('css')
<link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">

<!-- Custom CSS for buttons -->
<style>
    .btn {
        background-color: transparent;
        color: #333;
        border: 1px solid #ddd;
        transition: background-color 0.3s, color 0.3s;
    }

    .btn-secondary:hover {
        background-color: #6c757d;
        color: #fff;
    }

    .btn-danger:hover {
        background-color: #dc3545;
        color: #fff;
    }

    .btn-success:hover {
        background-color: #28a745;
        color: #fff;
    }

    .btn-primary:hover {
        background-color: #007bff;
        color: #fff;
    }

    .d-flex {
        display: flex;
        justify-content: space-between;
        gap: 10px;
    }
</style>
@endsection

@section('page-header')
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">/ التقارير</h4>
            <span class="text-muted mt-1 tx-13 mr-2 mb-0">/  قائمة تقرير الافكارالممولة</span>
        </div>
        <div class="pull-right">
            <button class="btn btn-success" onclick="printTable()" style="float: left; margin-top: 10px;">طباعة تقرير</button>
            </div>
    </div>
    <div class="d-flex my-xl-auto right-content"></div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>منصة الافكار البرمجية-الادارة</h2>
        </div>
      
    </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>رقم الفكرة</th>
            <th>تم الحجز بواسطة</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($selects as $select)
        <tr>
            <td>{{ $select->id  }}</td>
            <td>{{ $select->idea_id }}</td>
            <td>{{ $select->reserved_by }}</td>
            
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

@section('js')
<script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>

<script>
    function printTable() {
        window.print();
    }
</script>
@endsection
