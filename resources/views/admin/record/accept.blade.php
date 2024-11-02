@extends('layout.master')

@section('title')
تقرير الافكار المقبولة
@stop

@section('css')
<!-- Internal Data table css -->
<link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
@endsection

@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">تقارير الافكار المقبولة</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ التقارير</span>
        </div>
    </div>
    <div class="d-flex my-xl-auto right-content">
    </div>
</div>
<!-- breadcrumb -->
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>منصة الافكار البرمجية-الادارة</h2>
        </div>
        <div class="pull-right">
        <button class="btn btn-success" onclick="printTable()" style="float: left; margin-top: 10px;">طباعة تقرير</button>
        </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>وصف الفكرة</th>
        <th>تاريخ الاضافة</th>
        <th>صاحب الفكرة</th>
        <th>المدة الزمنية</th>
        <th>تكلفة انشاء الفكرة</th>
        <th>البريد الالكتروني المتاح للتواصل</th>
        <th>رقم الهاتف المتاح للتواصل</th>
        <th>حالة الفكرة</th>
      
    </tr>
    @foreach ($accepts as $accept)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $accept->description }}</td>
        <td>{{ $accept->date }}</td>
        <td>{{ $accept->created_by }}</td>
        <td>{{ $accept->dateline }}</td>
        <td>{{ $accept->total_cost }}</td>
        <td>{{ $accept->email }}</td>
        <td>{{ $accept->phone}}</td>
        <td>{{ $accept->status}}</td>

    </tr>
    @endforeach
</table>
</div>

@endsection

@section('js')
<script>
    function printTable() {
        window.print();
    }
</script>
<!-- Internal Data tables -->
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
@endsection
