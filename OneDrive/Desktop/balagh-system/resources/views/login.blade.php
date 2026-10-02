<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>تسجيل الدخول | بلاغ</title>

    <link
        rel="stylesheet"
        href="{{ asset('css/style.css') }}"
    >

    <style>
        .auth-page {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
        }

        .auth-box {
            width: min(450px, 100%);
            padding: 35px;
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            backdrop-filter: blur(20px);
        }

        .auth-logo {
            text-align: center;
            font-size: 34px;
            font-weight: 900;
            color: var(--primary-light);
            margin-bottom: 10px;
        }

        .auth-title {
            text-align: center;
            margin-bottom: 30px;
        }

        .auth-title h1 {
            font-size: 28px;
            margin-bottom: 8px;
        }

        .auth-title p {
            color: var(--muted);
            font-size: 14px;
        }

        .auth-group {
            margin-bottom: 20px;
        }

        .auth-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        .auth-group input {
            width: 100%;
            padding: 15px;
            border-radius: 13px;
            border: 1px solid var(--border);
            background: rgba(255,255,255,0.05);
            color: white;
            outline: none;
            font-family: inherit;
            box-sizing: border-box;
        }

        .auth-group input:focus {
            border-color: var(--primary);
        }

        .auth-button {
            width: 100%;
            border: none;
            padding: 15px;
            border-radius: 13px;
            background: linear-gradient(
                135deg,
                var(--primary),
                var(--cyan)
            );
            color: white;
            font-family: inherit;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        .auth-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(99, 102, 241, 0.2);
        }

        .auth-message {
            margin-bottom: 20px;
            padding: 13px;
            border-radius: 12px;
            text-align: center;
            font-size: 14px;
        }

        .auth-success {
            background: rgba(34, 197, 94, 0.12);
            border: 1px solid rgba(34, 197, 94, 0.2);
            color: #4ade80;
        }

        .auth-error {
            background: rgba(239, 68, 68, 0.12);
            border: 1px solid rgba(239, 68, 68, 0.2);
            color: #f87171;
        }

        .home-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: var(--muted);
        }

        .home-link:hover {
            color: white;
        }
    </style>

</head>

<body>

    <main class="auth-page">

        <form
            action="/login"
            method="POST"
            class="auth-box"
        >

            @csrf


            <div class="auth-logo">
                بلاغ
            </div>


            <div class="auth-title">

                <h1>
                    تسجيل الدخول
                </h1>

                <p>
                    سجّل دخولك لمتابعة بلاغاتك
                </p>

            </div>


            @if(session('success'))

                <div class="auth-message auth-success">
                    {{ session('success') }}
                </div>

            @endif


            @if($errors->any())

                <div class="auth-message auth-error">

                    {{ $errors->first() }}

                </div>

            @endif


            <div class="auth-group">

                <label for="email">
                    البريد الإلكتروني
                </label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="example@email.com"
                    required
                    autocomplete="email"
                >

            </div>


            <div class="auth-group">

                <label for="password">
                    كلمة المرور
                </label>

                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="••••••••"
                    required
                    autocomplete="current-password"
                >

            </div>


            <button
                type="submit"
                class="auth-button"
            >
                تسجيل الدخول
            </button>

<div class="auth-footer" style="margin-top: 22px;">

    ليس لديك حساب؟

    <a href="/register">
        إنشاء حساب
    </a>

</div>
            <a
                href="/"
                class="home-link"
            >
                ← العودة للرئيسية
            </a>

        </form>

    </main>


    <script src="{{ asset('js/script.js') }}"></script>

</body>

</html>