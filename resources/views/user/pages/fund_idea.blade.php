<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>منصة الافكار البرمجية</title>
    <link href="css/style.css" rel="stylesheet">
    <style>
        /* إعدادات عامة للجسم */
        body {
            font-family: 'Cairo', sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 0;
            direction: rtl;
        }

        /* إعدادات شريط التنقل */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #2C3E50;
            padding: 10px 20px;
            color: white;
        }

        .navbar .logo {
            font-size: 26px;
            font-weight: bold;
            color: white;
            text-decoration: none;
        }

        .navbar .menu-links {
            list-style: none;
            display: flex;
            gap: 20px;
        }

        .navbar .menu-links li {
            display: inline;
        }

        .navbar .menu-links a {
            text-decoration: none;
            color: white;
            font-size: 16px;
        }

        .navbar .logout-btn {
            background-color: #E74C3C;
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 16px;
            cursor: pointer;
        }

        /* إعدادات قسم البطل */
        .hero-section {
            background-color: #3498DB;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 100vh; /* يضمن أن القسم يمتد لملء الشاشة */
            padding: 50px 0;
            text-align: center;
            color: white;
        }

        .hero-section h2 {
            font-size: 36px;
            margin-bottom: 30px;
        }

        /* إعدادات الجدول */
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px auto;
            background-color: #030303;
            text-align: center;
        }

        table thead {
            background-color: #2C3E50;
            color: white;
        }

        table th, table td {
            padding: 12px;
            border: 1px solid #ddd;
        }

        table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        /* إعدادات الزر */
        .btn-fund {
            background-color: #27AE60;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 25px;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .btn-fund:hover {
            background-color: #219150;
        }

        .d-flex {
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar">
            <a class="logo" href="{{ route('user.home') }}">منصة الافكار البرمجية<span>.</span></a>
            <ul class="menu-links">
                <li><a href="{{ route('user.home') }}">الرئيسية</a></li>
                <li><a href="{{ route('user.pages.fund_idea') }}">الافكار</a></li>
                <li><a href="{{ route('user.pages.form') }}">اضافة فكرة</a></li>
                <li><a href="{{ route('user.pages.status') }}">الاستفسار عن فكرة</a></li>
            </ul>
            <a href="{{ route('logout') }}" class="logout-btn" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                تسجيل الخروج
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </nav>
    </header>

    <section class="hero-section">
        <div class="content">
            <h2>عرض الأفكار</h2>
            <table>
                <thead>
                    <tr>
                        <th>رقم الفكرة</th>
                        <th>وصف الفكرة</th>
                        <th>تاريخ الإضافة</th>
                        <th>صاحب الفكرة</th>
                        <th>المدة الزمنية</th>
                        <th>تكلفة الإنشاء</th>
                        <th>البريد الإلكتروني</th>
                        <th>رقم الهاتف</th>
                        <th>التمويل</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- يمكنك إضافة صفوف الجدول هنا -->
                    @foreach ($accepts as $accept)
                    <tr>
                        <td>{{ $accept->id }}</td>
                        <td>{{ $accept->description }}</td>
                        <td>{{ $accept->date }}</td>
                        <td>{{ $accept->created_by }}</td>
                        <td>{{ $accept->dateline }}</td>
                        <td>{{ $accept->total_cost }}</td>
                        <td>{{ $accept->email }}</td>
                        <td>{{ $accept->phone }}</td>
                        <td>
                
                            <a  class="btn-fund" href="{{ route('user.pages.funding_paypal', ['id' => $accept->id]) }}">تمويل</a>

                        </td>
                    </tr>
                    @endforeach
                    <!-- المزيد من الصفوف حسب الحاجة -->
                </tbody>
            </table>
        </div>
    </section>
</body>
</html>
