<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>منصة الأفكار البرمجية</title>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet">
    <style>
        /* إعدادات عامة للجسم */
        body {
            font-family: 'Cairo', sans-serif;
            background-color: #f0f4f8;
            margin: 0;
            padding: 0;
            direction: rtl;
        }

        /* إعدادات شريط التنقل */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #34495E;
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

        /* إعدادات الفورم */
        .form-container {
            max-width: 700px;
            margin: 50px auto;
            padding: 30px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form-container h4 {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            color: #2C3E50;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 8px;
            display: block;
            color: #34495E;
        }

        .form-group input[type="text"],
        .form-group input[type="email"],
        .form-group input[type="number"],
        .form-group input[type="date"] {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
            box-sizing: border-box;
            transition: border-color 0.3s;
        }

        .form-group input:focus {
            border-color: #3498DB;
            outline: none;
        }

        /* زر الإضافة */
        .submit-btn {
            width: 100%;
            padding: 15px;
            background-color: #27AE60;
            color: white;
            font-size: 18px;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .submit-btn:hover {
            background-color: #1e8449;
        }

        /* تنسيق رسالة الخطأ */
        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
        }

        /* تنسيق مركزي */
        .text-center {
            text-align: center;
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar">
            <a class="logo" href="{{ route('user.home') }}">منصة الأفكار البرمجية<span>.</span></a>
            <ul class="menu-links">
                <li><a href="{{ route('user.home') }}">الرئيسية</a></li>
                <li><a href="#">الأفكار</a></li>
                <li><a href="{{ route('user.pages.form') }}">إضافة فكرة</a></li>
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
    <!-- قسم الفورم -->
    <div class="form-container">
        <h4>إضافة فكرة</h4>
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>المعذرة!</strong> هنالك خطأ في تعبئة أحد الحقول<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form id="orderForm" method="POST" action="{{ route('user.pages.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="description" class="form-label">الوصف:</label>
                <input type="text" class="form-control" id="description" name="description">
                @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="date" class="form-label">تاريخ الإضافة:</label>
                <input type="date" class="form-control" id="date" name="date">
                @error('date')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="created_by" class="form-label">صاحب الفكرة:</label>
                <input type="text" class="form-control" id="created_by" name="created_by">
                @error('created_by')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="dateline" class="form-label">المدة الزمنية:</label>
                <input type="text" class="form-control" id="dateline" name="dateline">
                @error('dateline')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="total_cost" class="form-label">تكلفة إنشاء الفكرة:</label>
                <input type="text" class="form-control" id="total_cost" name="total_cost">
                @error('total_cost')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email" class="form-label">البريد الإلكتروني المتاح للتواصل:</label>
                <input type="email" class="form-control" id="email" name="email">
                @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="phone" class="form-label">رقم الهاتف المتاح للتواصل:</label>
                <input type="text" class="form-control" id="phone" name="phone">
                @error('phone')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="text-center">
                <button type="submit" class="submit-btn">إضافة الفكرة</button>
            </div>
        </form>
    </div>
</body>
</html>
