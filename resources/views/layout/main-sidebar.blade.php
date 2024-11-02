<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>صفحة الادارة - منصة فكرتي</title>
    
    <!-- رابط لاستيراد الخطوط والرموز من Google -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    
    <!-- رابط لاستيراد ملف CSS المحلي -->
    <link rel="stylesheet" href="{{ asset('styles.css') }}">
</head>

<!-- الشريط الجانبي الرئيسي -->
<aside class="sidebar">
    <div class="">
        <!-- تعديل هنا لعرض صورة المستخدم من قاعدة البيانات -->
        <img alt="user-img" class="avatar avatar-xl brround" src="{{ Auth::user()->image ? asset('images/' . Auth::user()->image) : URL::asset('assets/img/faces/logo.jpg') }}">
       
        <h2>الافكار البرمجية</h2>
    </div>
    <ul class="links">
        <h4>القائمة الرئيسية</h4>
        <li>
            <span class="material-symbols-outlined">home</span>
            <a href="{{ route('admin.home') }}">الرئيسية</a>
        </li>
        <li>
            <span class="material-symbols-outlined">lightbulb</span>
            <a href="{{ route('admin.idea.index') }}">الافكار</a>
        </li>

        <hr>
        <h4>الافكار</h4>
        <li>
            <span class="material-symbols-outlined">check_circle</span>
            <a href="{{ route('admin.accept.index') }}">الافكار التي تم نشرها</a>
        </li>
        <li>
            <span class="material-symbols-outlined">check_circle</span>
            <a href="{{ route('admin.select.index') }}">الافكار الممولة</a>
        </li>
        <li>
            <span class="material-symbols-outlined">cancel</span>
            <a href="{{ route('admin.reject.index') }}">الافكار المرفوضة</a>
        </li>
        <h4>التقارير</h4>
        <li>
            <span class="material-symbols-outlined">lightbulb</span>
            <a href="{{ route('admin.record.idea') }}">تقريرالافكار</a>
        </li>
        <li>
            <span class="material-symbols-outlined">check_circle</span>
            <a href="{{ route('admin.record.accept') }}">تقرير  الافكار التي تم نشرها</a>
        </li>
        <li>
            <span class="material-symbols-outlined">check_circle</span>
            <a href="{{ route('admin.record.select') }}">تقرير الافكار الممولة</a>
        </li>
        <li>
            <span class="material-symbols-outlined">cancel</span>
            <a href="{{ route('admin.record.reject') }}">تقرير الافكار المرفوضة</a>
        </li>
        <hr>
        <h4>المستخدمين</h4>
        <li>
            <span class="material-symbols-outlined">person</span>
            <a href="{{ route('profile.index') }}">المستخدمين</a>
        </li>
    </ul>
</aside><!-- الشريط الجانبي الرئيسي -->
