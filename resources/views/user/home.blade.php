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

        /* إعدادات قسم البطل لملء الشاشة */
        .hero-section {
            background-image: linear-gradient(rgba(20, 209, 238, 0.8), rgba(255, 255, 255, 0.9)), url('images/—Pngtree—off-white halftone gradient sunlight background_1452867.png');
            background-size: cover;
            background-position: center;
            min-height: 100vh;  /* اجعل القسم يأخذ ارتفاع الشاشة بالكامل */
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

        .hero-section h2 span {
            color: #E74C3C;
        }

        /* إعدادات الأزرار */
        .btn-get-started,
        .btn-projects {
            display: inline-block;
            padding: 15px 30px;
            margin: 15px;
            font-size: 18px;
            font-weight: bold;
            color: white;
            background-color: #3498DB;
            border-radius: 50px;
            text-decoration: none;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .btn-projects {
            background-color: #2ECC71;
        }

        .btn-get-started:hover {
            background-color: #2980B9;
        }

        .btn-projects:hover {
            background-color: #27AE60;
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
            <div class="hero-content" data-aos="fade-up">
                <h2>Making <span>your ideas</span><br>happen!</h2>
                <div>
                  <a href="{{ route('user.pages.form') }}" class="btn-get-started scrollto">اضافة فكرة</a>
                  <a href="{{ route('user.pages.fund_idea') }}" class="btn-projects scrollto">تمويل فكرة</a>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
