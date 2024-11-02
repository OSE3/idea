



<!DOCTYPE html>
<html lang="ar">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>منصة الأفكار البرمجية - انشاء حساب</title>
  <style>
    /* إعدادات عامة */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Arial', sans-serif;
    }

    body {
      background-color: #f0f4f8; /* خلفية هادئة */
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      color: #333;
    }

    .wrapper {
      background-color: #fff; /* لون جدول واضح */
      padding: 40px;
      border-radius: 15px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
      max-width: 400px;
      width: 100%;
      text-align: center;
    }

    .wrapper h2 {
      margin-bottom: 20px;
      font-size: 24px;
      color: #333;
    }

    .input-field {
      margin-bottom: 20px;
      text-align: right;
    }

    .input-field label {
      display: block;
      margin-bottom: 5px;
      font-size: 14px;
      color: #666;
    }

    .input-field input {
      width: 100%;
      padding: 10px;
      border: 1px solid #ddd;
      border-radius: 5px;
      font-size: 16px;
      transition: all 0.3s ease;
    }

    .input-field input:focus {
      border-color: #007bff;
      box-shadow: 0 0 8px rgba(0, 123, 255, 0.25);
    }

    button {
      width: 100%;
      padding: 10px 0;
      background-color: #007bff;
      color: #fff;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    button:hover {
      background-color: #0056b3;
    }

    .register {
      margin-top: 20px;
      font-size: 14px;
    }

    .register a {
      color: #007bff;
      text-decoration: none;
      font-weight: bold;
    }

    .register a:hover {
      text-decoration: underline;
    }

    /* تنسيق للأخطاء */
    .invalid-feedback {
      color: #e74c3c;
      font-size: 12px;
      margin-top: 5px;
    }

    /* تحسينات إضافية */
    @media (max-width: 500px) {
      .wrapper {
        padding: 30px;
      }

      .wrapper h2 {
        font-size: 20px;
      }

      .input-field input {
        font-size: 14px;
      }

      button {
        font-size: 14px;
      }

      .register {
        font-size: 12px;
      }
    }
  </style>
</head>
<body>
  <div class="wrapper">
    <form action="{{ route('register') }}" method="POST">
      <h2>انشاء حساب</h2>
      @csrf <!-- لحماية النموذج من هجمات CSRF -->
      <div class="input-field">
      <label for="name">اسم المستخدم</label>
      <input type="text" id="name" name="name" value="{{ old('name') }}" required>
      @if($errors->has('name'))
          <div class="alert alert-danger">{{ $errors->first('name') }}</div>
      @endif
    </div>
      <div class="input-field">
        <label>البريد الإلكتروني</label>
        <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        @error('email')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      
      <div class="input-field">
        <label>كلمة المرور</label>
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
        @error('password')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="input-field">
      <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('تاكيد كلمة المرور') }}</label>

      <div class="input-group">
          <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
      </div></div>
      <button type="submit">تسجيل دخول</button>
    </form>
  </div>
</body>
</html>


