@extends('layout.master')

@section('title')
الافكار المرفوضة
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
            <h4 class="content-title mb-0 my-auto">الافكار المرفوضة</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ قائمة الافكار</span>
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
            <h2>منصة فكرتي-الادارة</h2>
       
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
        <th>سبب الرفض</th>
        <th width="280px">الاجراءات</th>
    </tr>
    @foreach ($rejects as $reject)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $reject->description }}</td>
        <td>{{ $reject->date }}</td>
        <td>{{ $reject->created_by }}</td>
        <td>{{ $reject->dateline }}</td>
        <td>{{ $reject->total_cost }}</td>
        <td>{{ $reject->email }}</td>
        <td>{{ $reject->phone}}</td>
        <td>{{ $reject->status}}</td>
        <td>{{ $reject->reject_reason}}</td>
        <td>
            <form action="{{ route('profile.destroy', $reject->id) }}" method="POST">
                <a class="btn btn-primary" href="{{ route('admin.reject.edit', $reject->id) }}">تعديل</a>

                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">حذف</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>


@endsection

@section('js')
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
