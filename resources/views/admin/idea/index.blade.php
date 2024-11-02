@extends('layout.master')

@section('title')
الافكار 
@stop

@section('css')
<!-- Internal Data table css -->
<link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">

<!-- Custom CSS for buttons -->
<style>
    /* تصميم الأزرار بدون لون في الحالة العادية */
    .btn {
        background-color: transparent; /* جعل الخلفية شفافة */
        color: #333; /* لون النص */
        border: 1px solid #ddd; /* حدود خفيفة */
        transition: background-color 0.3s, color 0.3s; /* تأثير التغيير التدريجي */
    }

    /* تأثير عند التمرير على زر تعديل */
    .btn-secondary:hover {
        background-color: #6c757d; /* لون الخلفية عند التمرير */
        color: #fff; /* لون النص عند التمرير */
    }

    /* تأثير عند التمرير على زر حذف */
    .btn-danger:hover {
        background-color: #dc3545; /* لون الخلفية عند التمرير */
        color: #fff; /* لون النص عند التمرير */
    }

    /* تأثير عند التمرير على زر مقبول */
    .btn-success:hover {
        background-color: #28a745; /* لون الخلفية عند التمرير */
        color: #fff; /* لون النص عند التمرير */
    }

    /* تأثير عند التمرير على زر مرفوض */
    .btn-primary:hover {
        background-color: #007bff; /* لون الخلفية عند التمرير */
        color: #fff; /* لون النص عند التمرير */
    }
</style>
@endsection

@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">الافكار </h4>
            <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ قائمة الافكار</span>
        </div>
    </div>
    <div class="d-flex my-xl-auto right-content"></div>
</div>
<!-- breadcrumb -->
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>منصة فكرتي-الادارة</h2>
        </div>
        <div class="pull-right" style="margin-bottom:10px;">
            <a class="btn btn-success" href="{{ route('admin.idea.create') }}">Create New Idea</a>
        </div>
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
        <th width="280px">الاجراءات</th>
    </tr>
    @foreach ($ideas as $idea)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $idea->description }}</td>
        <td>{{ $idea->date }}</td>
        <td>{{ $idea->created_by }}</td>
        <td>{{ $idea->dateline }}</td>
        <td>{{ $idea->total_cost }}</td>
        <td>{{ $idea->email }}</td>
        <td>{{ $idea->phone }}</td>
        <td>
            <div class="d-flex"">
                <a class="btn btn-secondary" href="{{ route('admin.idea.edit', $idea->id) }}">تعديل</a>
                
                <form action="{{ route('admin.idea.destroy', $idea->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">حذف</button>
                </form>

                <form method="POST" action="{{ route('admin.accept.store') }}">
                    @csrf
                    <input type="hidden" name="id" value="{{ $idea->id }}">
                    <button type="submit" class="btn btn-success accept-btn">مقبول</button>
                </form>

                <form method="POST" action="{{ route('admin.reject.store') }}">
                    @csrf
                    <input type="hidden" name="id" value="{{ $idea->id }}">
                    <button type="submit" class="btn btn-primary reject-btn">مرفوض</button>
                </form>
            </div>
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
