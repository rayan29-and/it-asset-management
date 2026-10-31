<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Daftar Akun - IT Asset Management</title>

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

        .register-wrapper {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 35px 20px;
        }

        .register-card {
            width: 100%;
            max-width: 1080px;
            display: flex;
            overflow: hidden;
            background: #ffffff;
            border: 1px solid rgba(15, 23, 42, 0.06);
            border-radius: 26px;
            box-shadow: 0 25px 70px rgba(15, 23, 42, 0.12);
        }

        /* ==========================================
           LEFT / BRANDING
        =========================================== */

        .register-info {
            width: 43%;
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

        .register-info::before,
        .register-info::after {
            content: "";
            position: absolute;
            border-radius: 50%;
            pointer-events: none;
        }

        .register-info::before {
            width: 360px;
            height: 360px;
            top: -170px;
            right: -150px;
            background: rgba(255, 255, 255, 0.055);
        }

        .register-info::after {
            width: 280px;
            height: 280px;
            bottom: -150px;
            left: -120px;
            background: rgba(255, 255, 255, 0.045);
        }

        .register-brand-content {
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

        .register-info h1 {
            margin: 0 0 16px;
            font-size: 36px;
            line-height: 1.15;
            font-weight: 750;
            letter-spacing: -0.7px;
        }

        .register-info p {
            max-width: 390px;
            margin: 0;
            color: rgba(255, 255, 255, 0.72);
            font-size: 15px;
            line-height: 1.75;
        }

        .benefit-list {
            margin-top: 34px;
        }

        .benefit-item {
            display: flex;
            align-items: center;
            gap: 13px;
            margin-bottom: 17px;
            color: rgba(255, 255, 255, 0.91);
            font-size: 14px;
        }

        .benefit-item:last-child {
            margin-bottom: 0;
        }

        .benefit-item i {
            color: #93c5fd;
            font-size: 18px;
        }

        /* ==========================================
           RIGHT / FORM
        =========================================== */

        .register-form-area {
            width: 57%;
            padding: 52px 65px;
        }

        .register-header {
            margin-bottom: 26px;
        }

        .register-badge {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 7px 12px;
            margin-bottom: 16px;
            border-radius: 999px;
            background: #eff6ff;
            color: #2563eb;
            font-size: 12px;
            font-weight: 700;
        }

        .register-title {
            margin: 0 0 8px;
            color: #172033;
            font-size: 30px;
            font-weight: 750;
            letter-spacing: -0.5px;
        }

        .register-subtitle {
            margin: 0;
            color: #7b8494;
            font-size: 14px;
            line-height: 1.6;
        }

        /* ==========================================
           ALERT
        =========================================== */

        .register-alert {
            border: 0;
            border-radius: 14px;
            padding: 13px 15px;
            margin-bottom: 20px;
            font-size: 13px;
        }

        .register-alert .alert-icon {
            margin-top: 1px;
            font-size: 17px;
        }

        .register-alert ul {
            margin-bottom: 0;
        }

        /* ==========================================
           FORM
        =========================================== */

        .form-label {
            margin-bottom: 7px;
            color: #344054;
            font-size: 13px;
            font-weight: 650;
        }

        .required-mark {
            color: #dc3545;
            margin-left: 2px;
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
            font-size: 16px;
            pointer-events: none;
            transition: 0.2s ease;
        }

        .input-wrapper:focus-within .input-icon {
            color: #2563eb;
        }

        .form-control-custom {
            width: 100%;
            height: 49px;
            padding: 0 47px;
            border: 1px solid #d9dee8;
            border-radius: 12px;
            outline: none;
            background: #ffffff;
            color: #172033;
            font-size: 13.5px;
            transition:
                border-color 0.2s ease,
                box-shadow 0.2s ease;
        }

        .form-control-custom::placeholder {
            color: #a3acb9;
        }

        .form-control-custom:hover {
            border-color: #c5ccd8;
        }

        .form-control-custom:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.09);
        }

        .password-toggle {
            position: absolute;
            top: 50%;
            right: 13px;
            z-index: 3;
            width: 33px;
            height: 33px;
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

        /* ==========================================
           BUTTON
        =========================================== */

        .register-button {
            width: 100%;
            height: 51px;
            margin-top: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
            border: 0;
            border-radius: 12px;
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
            color: #ffffff;
            font-size: 14.5px;
            font-weight: 650;
            box-shadow: 0 8px 20px rgba(37, 99, 235, 0.18);
            transition:
                transform 0.2s ease,
                box-shadow 0.2s ease,
                filter 0.2s ease;
        }

        .register-button:hover {
            transform: translateY(-1px);
            filter: brightness(1.03);
            box-shadow: 0 12px 25px rgba(37, 99, 235, 0.25);
        }

        .register-button:active {
            transform: translateY(0);
        }

        .register-button:focus-visible {
            outline: 3px solid rgba(37, 99, 235, 0.18);
            outline-offset: 3px;
        }

        /* ==========================================
           LOGIN LINK
        =========================================== */

        .login-text {
            margin-top: 21px;
            text-align: center;
            color: #667085;
            font-size: 13px;
        }

        .login-text a {
            color: #2563eb;
            text-decoration: none;
            font-weight: 650;
        }

        .login-text a:hover {
            text-decoration: underline;
        }

        .copyright {
            margin-top: 22px;
            text-align: center;
            color: #a0a8b5;
            font-size: 11px;
        }

        /* ==========================================
           RESPONSIVE
        =========================================== */

        @media (max-width: 900px) {

            .register-card {
                max-width: 760px;
            }

            .register-info {
                padding: 45px;
            }

            .register-form-area {
                padding: 45px;
            }

            .register-info h1 {
                font-size: 31px;
            }
        }

        @media (max-width: 768px) {

            .register-wrapper {
                padding: 18px;
            }

            .register-card {
                flex-direction: column;
                border-radius: 22px;
            }

            .register-info,
            .register-form-area {
                width: 100%;
            }

            .register-info {
                padding: 38px 30px;
            }

            .register-form-area {
                padding: 38px 30px;
            }

            .brand-icon {
                width: 60px;
                height: 60px;
                margin-bottom: 22px;
                font-size: 27px;
            }

            .register-info h1 {
                font-size: 28px;
            }

            .benefit-list {
                display: none;
            }

            .register-title {
                font-size: 26px;
            }

            .register-header {
                margin-bottom: 24px;
            }
        }

        @media (max-width: 480px) {

            .register-wrapper {
                padding: 12px;
            }

            .register-card {
                border-radius: 19px;
            }

            .register-info {
                padding: 32px 24px;
            }

            .register-form-area {
                padding: 32px 22px;
            }

            .register-info h1 {
                font-size: 25px;
            }

            .register-info p {
                font-size: 13.5px;
            }

            .register-title {
                font-size: 24px;
            }

            .register-subtitle {
                font-size: 13px;
            }
        }
    </style>
</head>

<body>

<div class="register-wrapper">

    <div class="register-card">

        <!-- ==========================================
             LEFT / BRANDING
        =========================================== -->
        <div class="register-info">

            <div class="register-brand-content">

                <div class="brand-icon">
                    <i class="bi bi-person-plus-fill"></i>
                </div>

                <h1>
                    Buat Akun<br>IT Support
                </h1>

                <p>
                    Daftarkan akun Anda untuk mengakses sistem
                    manajemen aset teknologi informasi.
                </p>

                <div class="benefit-list">

                    <div class="benefit-item">
                        <i class="bi bi-shield-check"></i>
                        <span>Akses sistem yang aman</span>
                    </div>

                    <div class="benefit-item">
                        <i class="bi bi-database-check"></i>
                        <span>Kelola data aset secara terpusat</span>
                    </div>

                    <div class="benefit-item">
                        <i class="bi bi-speedometer2"></i>
                        <span>Monitoring aset lebih mudah</span>
                    </div>

                </div>

            </div>

        </div>


        <!-- ==========================================
             RIGHT / REGISTER FORM
        =========================================== -->
        <div class="register-form-area">

            <div class="register-header">

                <div class="register-badge">
                    <i class="bi bi-person-plus-fill"></i>
                    <span>Registrasi Akun</span>
                </div>

                <h2 class="register-title">
                    Daftar Akun
                </h2>

                <p class="register-subtitle">
                    Lengkapi data berikut untuk membuat akun IT.
                </p>

            </div>


            <!-- ERROR -->
            @if ($errors->any())

                <div class="alert alert-danger register-alert">

                    <div class="d-flex align-items-start">

                        <i class="bi bi-exclamation-circle-fill alert-icon me-2"></i>

                        <div>

                            <strong>Data belum dapat diproses.</strong>

                            <ul class="mt-2 ps-3">

                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach

                            </ul>

                        </div>

                    </div>

                </div>

            @endif


            <!-- REGISTER FORM -->
            <form
                action="{{ url('/register') }}"
                method="POST"
            >

                @csrf


                <!-- NAMA -->
                <div class="mb-3">

                    <label
                        for="name"
                        class="form-label"
                    >
                        Nama Lengkap
                        <span class="required-mark">*</span>
                    </label>

                    <div class="input-wrapper">

                        <i class="bi bi-person input-icon"></i>

                        <input
                            type="text"
                            name="name"
                            id="name"
                            class="form-control-custom"
                            placeholder="Masukkan nama lengkap"
                            value="{{ old('name') }}"
                            autocomplete="name"
                            required
                        >

                    </div>

                </div>


                <!-- USERNAME -->
                <div class="mb-3">

                    <label
                        for="username"
                        class="form-label"
                    >
                        Username
                        <span class="required-mark">*</span>
                    </label>

                    <div class="input-wrapper">

                        <i class="bi bi-at input-icon"></i>

                        <input
                            type="text"
                            name="username"
                            id="username"
                            class="form-control-custom"
                            placeholder="Masukkan username"
                            value="{{ old('username') }}"
                            autocomplete="username"
                            required
                        >

                    </div>

                </div>


                <!-- EMAIL -->
                <div class="mb-3">

                    <label
                        for="email"
                        class="form-label"
                    >
                        Email
                        <span class="required-mark">*</span>
                    </label>

                    <div class="input-wrapper">

                        <i class="bi bi-envelope input-icon"></i>

                        <input
                            type="email"
                            name="email"
                            id="email"
                            class="form-control-custom"
                            placeholder="Masukkan alamat email"
                            value="{{ old('email') }}"
                            autocomplete="email"
                            required
                        >

                    </div>

                </div>


                <!-- PASSWORD -->
                <div class="mb-3">

                    <label
                        for="password"
                        class="form-label"
                    >
                        Password
                        <span class="required-mark">*</span>
                    </label>

                    <div class="input-wrapper">

                        <i class="bi bi-lock input-icon"></i>

                        <input
                            type="password"
                            name="password"
                            id="password"
                            class="form-control-custom"
                            placeholder="Minimal 8 karakter"
                            autocomplete="new-password"
                            minlength="8"
                            required
                        >

                        <button
                            type="button"
                            class="password-toggle"
                            data-target="password"
                            data-icon="passwordIcon"
                            aria-label="Tampilkan password"
                            title="Tampilkan password"
                        >
                            <i
                                class="bi bi-eye"
                                id="passwordIcon"
                            ></i>
                        </button>

                    </div>

                </div>


                <!-- KONFIRMASI PASSWORD -->
                <div class="mb-3">

                    <label
                        for="password_confirmation"
                        class="form-label"
                    >
                        Konfirmasi Password
                        <span class="required-mark">*</span>
                    </label>

                    <div class="input-wrapper">

                        <i class="bi bi-lock-fill input-icon"></i>

                        <input
                            type="password"
                            name="password_confirmation"
                            id="password_confirmation"
                            class="form-control-custom"
                            placeholder="Ulangi password"
                            autocomplete="new-password"
                            minlength="8"
                            required
                        >

                        <button
                            type="button"
                            class="password-toggle"
                            data-target="password_confirmation"
                            data-icon="confirmationIcon"
                            aria-label="Tampilkan konfirmasi password"
                            title="Tampilkan konfirmasi password"
                        >
                            <i
                                class="bi bi-eye"
                                id="confirmationIcon"
                            ></i>
                        </button>

                    </div>

                </div>


                <!-- BUTTON -->
                <button
                    type="submit"
                    class="register-button"
                >
                    <i class="bi bi-person-plus-fill"></i>
                    <span>Buat Akun</span>
                </button>

            </form>


            <!-- LOGIN -->
            <div class="login-text">

                Sudah mempunyai akun?

                <a href="{{ url('/login') }}">
                    Kembali ke Login
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

        const passwordButtons = document.querySelectorAll('.password-toggle');

        passwordButtons.forEach(function (button) {

            button.addEventListener('click', function () {

                const targetId = button.getAttribute('data-target');
                const iconId = button.getAttribute('data-icon');

                const passwordInput = document.getElementById(targetId);
                const icon = document.getElementById(iconId);

                if (!passwordInput || !icon) {
                    return;
                }

                const isPassword =
                    passwordInput.type === 'password';

                passwordInput.type =
                    isPassword ? 'text' : 'password';

                icon.classList.toggle(
                    'bi-eye',
                    !isPassword
                );

                icon.classList.toggle(
                    'bi-eye-slash',
                    isPassword
                );

                button.setAttribute(
                    'aria-label',
                    isPassword
                        ? 'Sembunyikan password'
                        : 'Tampilkan password'
                );

                button.setAttribute(
                    'title',
                    isPassword
                        ? 'Sembunyikan password'
                        : 'Tampilkan password'
                );

            });

        });


        /* ==============================
           AUTO HIDE ALERT
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