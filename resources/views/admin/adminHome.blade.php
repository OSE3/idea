@extends('layout.master')

@section('title')
الصفحة الرئيسية - لمنصة الأفكار البرمجية
@stop

@section('css')
<!-- Owl-carousel css -->
<link href="{{URL::asset('assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet" />
<style>
    /* خلفية هادئة */
    body {
        background-color: #f0f8ff; /* لون أزرق فاتح مريح للعين */
    }

    /* تعديل الحقول إلى دوائر وألوان فضية */
    .small-box {
        border-radius: 10px; /* جعل الحقول مستديرة قليلاً */
        padding: 20px;
        text-align: center;
        transition: transform 0.3s ease;
        box-shadow: 0 4px 15px rgba(251, 250, 250, 0.1);
        background-color: #6a7778; /* اللون الفضي */
        flex: 1; /* يسمح للعناصر بالتوزع بشكل متساوٍ */
        margin: 10px; /* إضافة مسافة بين الحقول */
    }

    .small-box:hover {
        transform: scale(1.05); /* تأثير تكبير عند المرور */
    }

    .small-box .icon {
        position: relative;
        top: 0;
        font-size: 40px; /* تكبير الأيقونة */
    }

    .small-box .inner {
        font-size: 18px;
        color: #f8f5f5;
    }

    /* تنسيق الصورة الجديدة */
    .custom-image {
        max-width: 100%;
        height: auto;
        border-radius: 15px;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }

    /* جعل الحاويات الداخلية في نفس السطر */
    .box-row {
        display: flex; /* استخدام الـ Flexbox لترتيب الحقول في نفس السطر */
        justify-content: space-between; /* توزيع المساحة بين الحقول بالتساوي */
        flex-wrap: wrap; /* للسماح للحقول بالانتقال إلى سطر جديد إذا لم تكن هناك مساحة */
    }

    /* تصغير الحقول على الشاشات الصغيرة */
    @media (max-width: 768px) {
        .small-box {
            flex: 1 1 calc(50% - 20px); /* جعل الحقول تأخذ نصف عرض الشاشة */
        }
    }

    @media (max-width: 576px) {
        .small-box {
            flex: 1 1 calc(100% - 20px); /* جعل الحقول تأخذ العرض الكامل للشاشة */
        }
    }

    /* تنسيق الرسالة المنسدلة */
    .info-message {
        display: none; /* إخفاء الرسالة افتراضيًا */
        background-color: #fff; /* خلفية بيضاء */
        padding: 10px;
        border-radius: 5px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        margin-top: 10px;
        text-align: left;
    }
</style>
@endsection

@section('content')
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row box-row">
            <div class="small-box">
                <div class="inner">
                    <h3>{{ $totalRequests }}</h3>
                    <p>الأفكار</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer" onclick="toggleInfo('info1'); return false;">More info <i class="fas fa-arrow-circle-right"></i></a>
                <div id="info1" class="info-message">هذه الصفحة تحتوي على جميع الأفكار المتاحة.</div>
            </div>

            <div class="small-box">
                <div class="inner">
                    <h3>{{ $acceptedRequests }}</h3>
                    <p>الأفكار التي تم الموافقة عليها</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer" onclick="toggleInfo('info2'); return false;">More info <i class="fas fa-arrow-circle-right"></i></a>
                <div id="info2" class="info-message">هذه هي الأفكار التي تم قبولها والموافقة عليها.</div>
            </div>

            <div class="small-box">
                <div class="inner">
                    <h3>{{ $selectedRequests }}</h3>
                    <p>الأفكار الممولة</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer" onclick="toggleInfo('info3'); return false;">More info <i class="fas fa-arrow-circle-right"></i></a>
                <div id="info3" class="info-message">هذه الأفكار التي تم تمويلها من قبل المستخدمين.</div>
            </div>

            <div class="small-box">
                <div class="inner">
                    <h3>{{ $totalUsers }}</h3>
                    <p>المستخدمون</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer" onclick="toggleInfo('info4'); return false;">More info <i class="fas fa-arrow-circle-right"></i></a>
                <div id="info4" class="info-message">عدد المستخدمين المسجلين في المنصة.</div>
            </div>

            <div class="small-box">
                <div class="inner">
                    <h3>{{$rejectedRequests  }}</h3>
                    <p>الأفكار التي تم رفضها</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer" onclick="toggleInfo('info5'); return false;">More info <i class="fas fa-arrow-circle-right"></i></a>
                <div id="info5" class="info-message">هذه الأفكار التي لم تتم الموافقة عليها.</div>
            </div>
        </div>
        <!-- /.row -->

        <!-- إضافة صورة جديدة بين الحقول والفوتر -->
        <div class="row mt-5 mb-5">
            <div class="col-12 text-center">
                <img src="{{ URL::asset('images/—Pngtree—off-white halftone gradient sunlight background_1452867.png')}}" alt="صورة توضيحية" class="custom-image">
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
@endsection

@section('page-header')
<div class="container background-container">
    <div class="row mt-5">
        <div class="col-md-12">
            <!-- يمكن إضافة محتوى هنا -->
        </div>
    </div>
</div>
@endsection

@section('js')
<!-- Internal Chart.bundle js -->
<script src="{{URL::asset('assets/plugins/chart.js/Chart.bundle.min.js')}}"></script>

<!-- Moment js -->
<script src="{{URL::asset('assets/plugins/raphael/raphael.min.js')}}"></script>

<!-- Internal Flot js -->
<script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.pie.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.resize.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.categories.js')}}"></script>

<!-- Internal Apexchart js -->
<script src="{{URL::asset('assets/js/apexcharts.js')}}"></script>

<!-- Internal Map -->
<script src="{{URL::asset('assets/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jqvmap/maps/jquery.vmap.africa.js')}}"></script>

<script src="{{URL::asset('assets/js/modal-popup.js')}}"></script>
<script src="{{URL::asset('assets/js/index.js')}}"></script>
<script src="{{URL::asset('assets/js/jquery.vmap.sampledata.js')}}"></script>

<script>
// دالة لتبديل عرض الرسالة المنسدلة
function toggleInfo(infoId) {
    var infoElement = document.getElementById(infoId);
    if (infoElement.style.display === "none" || infoElement.style.display === "") {
        infoElement.style.display = "block"; // عرض الرسالة
    } else {
        infoElement.style.display = "none"; // إخفاء الرسالة
    }
}
</script>
@endsection
