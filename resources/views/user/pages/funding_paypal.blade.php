<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تفاصيل الفكرة</title>
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

        /* إعدادات قسم التفاصيل */
        .details-section {
            background-color: #fff;
            padding: 50px 20px;
            margin: 20px auto;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 800px;
        }

        .details-section h2 {
            font-size: 36px;
            margin-bottom: 20px;
            color: #34495E;
        }

        .details-section p {
            font-size: 18px;
            line-height: 1.6;
            color: #555;
        }

        /* إعدادات الزر */
        .btn-paypal {
            display: inline-block;
            background-color: #FFC107; /* لون باي بال */
            color: black;
            padding: 15px 30px;
            text-decoration: none;
            border-radius: 25px;
            font-size: 18px;
            text-align: center;
            transition: background-color 0.3s ease;
            margin-top: 30px;
        }

        .btn-paypal:hover {
            background-color: #FFA000;
        }

        /* إعدادات الجدول */
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        table th, table td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: right; /* محاذاة النص إلى اليمين */
        }

        table th {
            background-color: #2C3E50;
            color: white;
        }

        /* إعدادات الزر للتمويل */
        .btn-fund {
            background-color: #27AE60;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 25px;
            font-size: 16px;
            transition: background-color 0.3s ease;
            display: block;
            text-align: center;
            margin-top: 20px;
        }

        .btn-fund:hover {
            background-color: #219150;
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

    <section class="details-section">
        <h2>تفاصيل الفكرة</h2>
        <p><strong>رقم الفكرة:</strong> {{ $accept->id }}</p>
        <p><strong>وصف الفكرة:</strong> {{ $accept->description }}</p>
        <p><strong>تاريخ الإضافة:</strong> {{ $accept->date }}</p>
        <p><strong>صاحب الفكرة:</strong> {{ $accept->created_by }}</p>
        <p><strong>المدة الزمنية:</strong> {{ $accept->dateline }}</p>
        <p><strong>تكلفة الإنشاء:</strong> {{ $accept->total_cost }}</p>
        <p><strong>البريد الإلكتروني:</strong> {{ $accept->email }}</p>
        <p><strong>رقم الهاتف:</strong> {{ $accept->phone }}</p>

     
        
        <a class="btn-fund" href="{{ route('user.pages.funding_paypal',$accept->id) }}" onclick="reserveIdea({{ $accept->id }})">حجز الفكرة</a>
    </section>
   

</body>
</html>
<script>
    function reserveIdea(ideaId) {
        fetch(`/reserve-idea/${ideaId}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}', // تأكد من إضافة هذا
            },
        })
        .then(response => {
            if (!response.ok) {
                return response.json().then(err => { throw new Error(err.message); });
            }
            return response.json();
        })
        .then(data => {
            alert(data.message); // عرض رسالة النجاح
        })
        .catch(error => {
            alert(error.message); // عرض رسالة الخطأ
        });
    }
</script>
