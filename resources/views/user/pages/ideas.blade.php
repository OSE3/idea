<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>منصة فكرتي</title>
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
            font-size: 24px;
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
        }

        /* إعدادات قسم البطل */
        .hero-section {
             background-image: url('images/—Pngtree—mineral water poster background template_1030687.jpg'); /* ضع هنا صورة خلفية مناسبة */
            padding: 80px 0;
            text-align: center;
            color: #2C3E50;
        }

        .hero-section .content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        /* إعدادات الجدول */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 40px;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        table th, table td {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        table th {
            background-color: #2C3E50;
            color: white;
            font-size: 18px;
        }

        table td {
            background-color: #f9f9f9;
            font-size: 16px;
            color: #2C3E50;
        }

        table tr:hover {
            background-color: #f1f1f1;
        }

        /* إضافة تباعد بين الخلايا */
        table td, table th {
            padding: 12px 15px;
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar">
            <a class="logo" href="{{ route('user.home') }}">منصة فكرتي <span>.</span></a>
            <ul class="menu-links">
                <li><a href="{{ route('user.home') }}">الرئيسية</a></li>
                <li><a href="{{ route('user.pages.ideas') }}">الافكار</a></li>
                <li><a href="{{ route('pages.user.e_inside') }}">اضافة فكرة</a></li>
                <li><a href="{{ route('pages.user.status') }}">الاستفسار عن فكرة</a></li>
            </ul>
            <a href="{{ route('logout') }}" class="logout-btn">تسجيل خروج</a>
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
                        <th>تاريخ الاضافة</th>
                        <th>صاحب الفكرة</th>
                        <th>المدة الزمنية</th>
                        <th>تكلفة انشاء الفكرة</th>
                        <th>البريد الالكتروني المتاح للتواصل</th>
                        <th>رقم الهاتف المتاح للتواصل</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- يمكنك إضافة صفوف الجدول هنا -->
                    @foreach ($accepts as $accept)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $accept->description }}</td>
                        <td>{{ $accept->date }}</td>
                        <td>{{ $accept->created_by }}</td>
                        <td>{{ $accept->dateline }}</td>
                        <td>{{ $accept->total_cost }}</td>
                        <td>{{ $accept->email }}</td>
                        <td>{{ $accept->phone }}</td>
                        <td>
                            <div class="d-flex justify-content-between">
                                <a class="btn btn-secondary" href="#">تمويل</a>
                    <!-- المزيد من الصفوف حسب الحاجة -->
                </tbody>
            </table>
        </div>
    </section>
</body>
</html>
