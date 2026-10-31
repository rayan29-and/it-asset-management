<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - IT Asset Management</title>

    <!-- Bootstrap -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <!-- Bootstrap Icons -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
        rel="stylesheet"
    >

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: "Segoe UI", Arial, sans-serif;
            background:
                radial-gradient(circle at top left, rgba(37, 99, 235, 0.08), transparent 35%),
                radial-gradient(circle at bottom right, rgba(15, 23, 42, 0.07), transparent 35%),
                #f5f7fb;
        }

        .login-wrapper {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 35px 20px;
        }

        .login-card {
            width: 100%;
            max-width: 1080px;
            min-height: 620px;
            display: flex;
            overflow: hidden;
            background: #ffffff;
            border: 1px solid rgba(15, 23, 42, 0.06);
            border-radius: 26px;
            box-shadow: 0 25px 70px rgba(15, 23, 42, 0.12);
        }

        /* ==============================
           LEFT SIDE
        ============================== */

        .login-info {
            width: 47%;
            padding: 60px;
            position: relative;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            justify-content: center;
            color: #ffffff;
            background:
                linear-gradient(
                    145deg,
                    #0f172a 0%,
                    #172554 52%,
                    #1e3a8a 100%
                );
        }

        .login-info::before,
        .login-info::after {
            content: "";
            position: absolute;
            border-radius: 50%;
            pointer-events: none;
        }

        .login-info::before {
            width: 360px;
            height: 360px;
            top: -170px;
            right: -150px;
            background: rgba(255, 255, 255, 0.055);
        }

        .login-info::after {
            width: 280px;
            height: 280px;
            bottom: -150px;
            left: -120px;
            background: rgba(255, 255, 255, 0.045);
        }

        .brand-content {
            position: relative;
            z-index: 2;
        }

        .brand-icon {
            width: 68px;
            height: 68px;
            margin-bottom: 28px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 19px;
            background: rgba(255, 255, 255, 0.11);
            border: 1px solid rgba(255, 255, 255, 0.12);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
            font-size: 30px;
        }

        .login-info h1 {
            margin: 0 0 16px;
            font-size: 37px;
            line-height: 1.15;
            font-weight: 750;
            letter-spacing: -0.8px;
        }

        .login-info p {
            max-width: 440px;
            margin: 0;
            color: rgba(255, 255, 255, 0.72);
            font-size: 15.5px;
            line-height: 1.75;
        }

        .feature-list {
            margin-top: 34px;
        }

        .feature-item {
            display: flex;
            align-items: center;
            gap: 13px;
            margin-bottom: 17px;
            color: rgba(255, 255, 255, 0.91);
            font-size: 14.5px;
        }

        .feature-item:last-child {
            margin-bottom: 0;
        }

        .feature-item i {
            color: #93c5fd;
            font-size: 17px;
        }

        /* ==============================
           RIGHT SIDE
        ============================== */

        .login-form-area {
            width: 53%;
            padding: 60px 68px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .login-header {
            margin-bottom: 30px;
        }

        .login-badge {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 7px 12px;
            margin-bottom: 17px;
            border-radius: 999px;
            background: #eff6ff;
            color: #2563eb;
            font-size: 12px;
            font-weight: 700;
        }

        .login-title {
            margin: 0 0 8px;
            color: #172033;
            font-size: 30px;
            font-weight: 750;
            letter-spacing: -0.5px;
        }

        .login-subtitle {
            margin: 0;
            color: #7b8494;
            font-size: 14.5px;
            line-height: 1.6;
        }

        /* ==============================
           ALERT
        ============================== */

        .login-alert {
            border: 0;
            border-radius: 14px;
            padding: 13px 15px;
            margin-bottom: 20px;
            font-size: 13.5px;
        }

        .login-alert .alert-icon {
            font-size: 17px;
            margin-top: 1px;
        }

        .login-alert ul {
            margin-bottom: 0;
        }

        /* ==============================
           FORM
        ============================== */

        .form-label {
            margin-bottom: 8px;
            color: #344054;
            font-size: 13.5px;
            font-weight: 650;
        }

        .input-wrapper {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            z-index: 2;
            transform: translateY(-50%);
            color: #98a2b3;
            font-size: 17px;
            pointer-events: none;
            transition: 0.2s ease;
        }

        .form-control-custom {
            width: 100%;
            height: 53px;
            padding: 0 48px;
            border: 1px solid #d9dee8;
            border-radius: 13px;
            outline: none;
            background: #ffffff;
            color: #172033;
            font-size: 14px;
            transition:
                border-color 0.2s ease,
                box-shadow 0.2s ease,
                background 0.2s ease;
        }

        .form-control-custom::placeholder {
            color: #a3acb9;
        }

        .form-control-custom:hover {
            border-color: #c5ccd8;
        }

        .form-control-custom:focus {
            border-color: #2563eb;
            background: #ffffff;
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.09);
        }

        .input-wrapper:focus-within .input-icon {
            color: #2563eb;
        }

        .password-toggle {
            position: absolute;
            top: 50%;
            right: 14px;
            z-index: 3;
            width: 34px;
            height: 34px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0;
            transform: translateY(-50%);
            border: 0;
            border-radius: 8px;
            background: transparent;
            color: #98a2b3;
            cursor: pointer;
            transition: 0.2s ease;
        }

        .password-toggle:hover {
            background: #f2f4f7;
            color: #344054;
        }

        .password-toggle:focus-visible {
            outline: 2px solid rgba(37, 99, 235, 0.3);
            outline-offset: 2px;
        }

        /* ==============================
           BUTTON
        ============================== */

        .login-button {
            width: 100%;
            height: 53px;
            margin-top: 9px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 4px;
            border: 0;
            border-radius: 13px;
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
            color: #ffffff;
            font-size: 15px;
            font-weight: 650;
            box-shadow: 0 8px 20px rgba(37, 99, 235, 0.18);
            transition:
                transform 0.2s ease,
                box-shadow 0.2s ease,
                filter 0.2s ease;
        }

        .login-button:hover {
            transform: translateY(-1px);
            filter: brightness(1.03);
            box-shadow: 0 12px 25px rgba(37, 99, 235, 0.25);
        }

        .login-button:active {
            transform: translateY(0);
        }

        .login-button:focus-visible {
            outline: 3px solid rgba(37, 99, 235, 0.18);
            outline-offset: 3px;
        }

        /* ==============================
           REGISTER
        ============================== */

        .register-text {
            margin-top: 24px;
            text-align: center;
            color: #667085;
            font-size: 13.5px;
        }

        .register-text a {
            color: #2563eb;
            text-decoration: none;
            font-weight: 650;
        }

        .register-text a:hover {
            text-decoration: underline;
        }

        .copyright {
            margin-top: 30px;
            text-align: center;
            color: #a0a8b5;
            font-size: 11.5px;
        }

        /* ==============================
           MOBILE
        ============================== */

        @media (max-width: 900px) {
            .login-card {
                max-width: 760px;
            }

            .login-info {
                padding: 45px;
            }

            .login-form-area {
                padding: 45px;
            }

            .login-info h1 {
                font-size: 31px;
            }
        }

        @media (max-width: 768px) {
            .login-wrapper {
                padding: 18px;
            }

            .login-card {
                min-height: auto;
                flex-direction: column;
                border-radius: 22px;
            }

            .login-info,
            .login-form-area {
                width: 100%;
            }

            .login-info {
                padding: 38px 30px;
            }

            .login-form-area {
                padding: 38px 30px;
            }

            .brand-icon {
                width: 60px;
                height: 60px;
                margin-bottom: 22px;
                font-size: 27px;
            }

            .login-info h1 {
                font-size: 28px;
            }

            .feature-list {
                display: none;
            }

            .login-header {
                margin-bottom: 25px;
            }

            .login-title {
                font-size: 26px;
            }
        }

        @media (max-width: 480px) {
            .login-wrapper {
                padding: 12px;
            }

            .login-card {
                border-radius: 19px;
            }

            .login-info {
                padding: 32px 24px;
            }

            .login-form-area {
                padding: 32px 22px;
            }

            .login-info h1 {
                font-size: 25px;
            }

            .login-info p {
                font-size: 14px;
            }

            .login-title {
                font-size: 24px;
            }

            .login-subtitle {
                font-size: 13.5px;
            }
        }
    </style>
</head>

<body>

<div class="login-wrapper">

    <div class="login-card">

        <!-- ==========================================
             LEFT / BRANDING
        =========================================== -->
        <div class="login-info">

            <div class="brand-content">

                <div class="brand-icon">
                    <i class="bi bi-pc-display-horizontal"></i>
                </div>

                <h1>IT Asset<br>Management</h1>

                <p>
                    Kelola aset teknologi informasi dengan lebih mudah,
                    terstruktur, dan efisien dalam satu sistem.
                </p>

                <div class="feature-list">

                    <div class="feature-item">
                        <i class="bi bi-check-circle-fill"></i>
                        <span>Manajemen aset IT</span>
                    </div>

                    <div class="feature-item">
                        <i class="bi bi-check-circle-fill"></i>
                        <span>Pemantauan kondisi aset</span>
                    </div>

                    <div class="feature-item">
                        <i class="bi bi-check-circle-fill"></i>
                        <span>Manajemen maintenance</span>
                    </div>

                    <div class="feature-item">
                        <i class="bi bi-check-circle-fill"></i>
                        <span>Laporan aset yang terorganisir</span>
                    </div>

                </div>

            </div>

        </div>


        <!-- ==========================================
             RIGHT / LOGIN FORM
        =========================================== -->
        <div class="login-form-area">

            <div class="login-header">

                <div class="login-badge">
                    <i class="bi bi-shield-lock-fill"></i>
                    <span>Akses IT Support</span>
                </div>

                <h2 class="login-title">
                    Selamat Datang 👋
                </h2>

                <p class="login-subtitle">
                    Silakan masuk menggunakan akun IT Anda
                    untuk melanjutkan ke sistem.
                </p>

            </div>


            <!-- SUCCESS -->
            @if (session('success'))
                <div class="alert alert-success login-alert">
                    <div class="d-flex align-items-start">

                        <i class="bi bi-check-circle-fill alert-icon me-2"></i>

                        <div>
                            {{ session('success') }}
                        </div>

                    </div>
                </div>
            @endif


            <!-- ERROR -->
            @if ($errors->any())
                <div class="alert alert-danger login-alert">

                    <div class="d-flex align-items-start">

                        <i class="bi bi-exclamation-circle-fill alert-icon me-2"></i>

                        <div>
                            <strong>Login gagal.</strong>

                            <ul class="mt-2 ps-3">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>

                    </div>

                </div>
            @endif


            <!-- LOGIN FORM -->
            <form action="{{ url('/login') }}" method="POST">

                @csrf

                <!-- USERNAME / EMAIL -->
                <div class="mb-3">

                    <label for="login" class="form-label">
                        Username atau Email
                    </label>

                    <div class="input-wrapper">

                        <i class="bi bi-person input-icon"></i>

                        <input
                            type="text"
                            name="login"
                            id="login"
                            class="form-control-custom"
                            placeholder="Masukkan username atau email"
                            value="{{ old('login') }}"
                            autocomplete="username"
                            autofocus
                        >

                    </div>

                </div>


                <!-- PASSWORD -->
                <div class="mb-3">

                    <label for="password" class="form-label">
                        Password
                    </label>

                    <div class="input-wrapper">

                        <i class="bi bi-lock input-icon"></i>

                        <input
                            type="password"
                            name="password"
                            id="password"
                            class="form-control-custom"
                            placeholder="Masukkan password"
                            autocomplete="current-password"
                        >

                        <button
                            type="button"
                            class="password-toggle"
                            id="passwordToggle"
                            aria-label="Tampilkan password"
                            title="Tampilkan password"
                        >
                            <i class="bi bi-eye" id="passwordIcon"></i>
                        </button>

                    </div>

                </div>


                <!-- LOGIN BUTTON -->
                <button
                    type="submit"
                    class="login-button"
                >
                    <i class="bi bi-box-arrow-in-right"></i>
                    <span>Masuk ke Sistem</span>
                </button>

            </form>


            <!-- REGISTER -->
            <div class="register-text">

                Belum mempunyai akun?

                <a href="{{ url('/register') }}">
                    Buat Akun
                </a>

            </div>


            <!-- COPYRIGHT -->
            <div class="copyright">
                © {{ date('Y') }} IT Asset Management
            </div>

        </div>

    </div>

</div>


<!-- ==========================================
     JAVASCRIPT
=========================================== -->
<script>
    document.addEventListener('DOMContentLoaded', function () {

        /* ==============================
           PASSWORD TOGGLE
        ============================== */

        const password = document.getElementById('password');
        const passwordToggle = document.getElementById('passwordToggle');
        const passwordIcon = document.getElementById('passwordIcon');

        if (password && passwordToggle && passwordIcon) {

            passwordToggle.addEventListener('click', function () {

                const isPassword = password.type === 'password';

                password.type = isPassword ? 'text' : 'password';

                passwordIcon.classList.toggle(
                    'bi-eye',
                    !isPassword
                );

                passwordIcon.classList.toggle(
                    'bi-eye-slash',
                    isPassword
                );

                passwordToggle.setAttribute(
                    'aria-label',
                    isPassword
                        ? 'Sembunyikan password'
                        : 'Tampilkan password'
                );

                passwordToggle.setAttribute(
                    'title',
                    isPassword
                        ? 'Sembunyikan password'
                        : 'Tampilkan password'
                );

            });

        }


        /* ==============================
           AUTO HIDE NOTIFICATION
        ============================== */

        const notifications = document.querySelectorAll(
            '.alert.alert-success, .alert.alert-danger, .alert.alert-warning, .alert.alert-info'
        );

        notifications.forEach(function (notification) {

            setTimeout(function () {

                if (!document.body.contains(notification)) {
                    return;
                }

                notification.style.transition =
                    'opacity 0.4s ease, transform 0.4s ease';

                notification.style.opacity = '0';
                notification.style.transform = 'translateY(-6px)';

                setTimeout(function () {

                    if (document.body.contains(notification)) {
                        notification.remove();
                    }

                }, 400);

            }, 3000);

        });

    });
</script>

</body>
</html>