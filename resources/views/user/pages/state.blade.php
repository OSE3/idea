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
        }

        .form-container {
            max-width: 600px;
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

        .form-group input[type="text"] {
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

        /* إعدادات قسم البطل لملء الشاشة */
        .hero-section {
            background-image: linear-gradient(rgba(20, 209, 238, 0.8), rgba(255, 255, 255, 0.9)), url('images/—Pngtree—off-white halftone gradient sunlight background_1452867.png');
            background-size: cover;
            background-position: center;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: #000408dd;
        }

        /* نصوص القسم البطل */
        .hero-section h2 {
            font-size: 48px;
            font-weight: bold;
            margin-bottom: 20px;
            color: #34495E;
        }

        /* إعدادات الأزرار */
        .btn-primary {
            background-color: #3498DB;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        .btn-primary:hover {
            background-color: #2980B9;
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
   
<div class="container mt-5">
    <h2 class="text-center mb-4">استفسار عن فكرة</h2>

    <!-- نموذج لإدخال رقم الهاتف -->
    <form action="{{ route('user.pages.checkStatus') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="phone_no">أدخل رقم الهاتف:</label>
            <input type="text" class="form-control" id="phone" name="phone" placeholder="رقم الهاتف" required>
        </div>
        <button type="submit" class="btn btn-primary btn-block mt-3">التحقق من فكرة</button>
    </form>

    <!-- عرض حالة الطلب إذا تم العثور على طلب -->
    @if(isset($order))
    <div class="mt-5">
        <h4>تفاصيل الفكرة</h4>
        <p><strong>رقم الفكرة:</strong> {{ $order->id }}</p>
        <p><strong>صاحب الفكرة :</strong> {{ $order->created_by }}</p>
        <p><strong>حالة الفكرة :</strong> {{ $order->status }}</p>
        <p><strong> توضيح:</strong> {{ $order->reject_reason }}</p>
    
       
    </div>
    @elseif(isset($notFound))
    <div class="alert alert-warning mt-5">
        {{ $notFound }}
    </div>
    @endif
</div>
</div>
</div>
</section>
</body>
</html>