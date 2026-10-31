@extends('layouts.app')

@section('title', 'Profile')

@section('content')

<div class="container-fluid">

    {{-- Header --}}
    <div class="profile-page-header">
        <div>
            <h3 class="profile-page-title">
                Profile
            </h3>
            <p class="profile-page-subtitle">
                Informasi profile pengguna.
            </p>
        </div>

        <a href="{{ url('/dashboard') }}" class="profile-back-btn">
            <i class="bi bi-arrow-left"></i>
            <span>Kembali</span>
        </a>
    </div>

    {{-- Notifikasi --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show profile-alert"
             role="alert">
            <div class="d-flex align-items-center">
                <i class="bi bi-check-circle-fill me-2"></i>
                <span>{{ session('success') }}</span>

                <button type="button"
                        class="btn-close ms-auto"
                        data-bs-dismiss="alert"
                        aria-label="Close">
                </button>
            </div>
        </div>
    @endif

    {{-- Profile Card --}}
    <div class="profile-main-card">

        {{-- Foto Profile --}}
        <div class="profile-photo-section">

            <div class="profile-photo-wrapper">

                @if($user->profile_photo)

                    <img
                        src="{{ asset('storage/' . $user->profile_photo) }}"
                        alt="Foto Profile {{ $user->name }}"
                        class="profile-photo"
                    >

                @else

                    <div class="profile-photo profile-photo-default">
                        <i class="bi bi-person-fill"></i>
                    </div>

                @endif

                <div class="profile-online-indicator"
                     title="Akun aktif">
                </div>

            </div>

        </div>

        {{-- Informasi Profile --}}
        <div class="profile-information">

            <div class="profile-heading">

                <div class="profile-name">
                    {{ $user->name }}
                </div>

                <span class="profile-status">
                    <span class="profile-status-dot"></span>
                    Akun Aktif
                </span>

            </div>

            <div class="profile-details">

                <div class="profile-detail-item">
                    <div class="profile-detail-icon">
                        <i class="bi bi-at"></i>
                    </div>

                    <div>
                        <div class="profile-detail-label">
                            Username
                        </div>

                        <div class="profile-detail-value">
                            {{ $user->username }}
                        </div>
                    </div>
                </div>

                <div class="profile-detail-item">
                    <div class="profile-detail-icon">
                        <i class="bi bi-envelope"></i>
                    </div>

                    <div>
                        <div class="profile-detail-label">
                            Email
                        </div>

                        <div class="profile-detail-value">
                            {{ $user->email }}
                        </div>
                    </div>
                </div>

                <div class="profile-detail-item">
                    <div class="profile-detail-icon">
                        <i class="bi bi-calendar3"></i>
                    </div>

                    <div>
                        <div class="profile-detail-label">
                            Bergabung
                        </div>

                        <div class="profile-detail-value">
                            {{ $user->created_at->format('d F Y') }}
                        </div>
                    </div>
                </div>

            </div>

            {{-- Bio --}}
            <div class="profile-bio-section">

                <div class="profile-bio-label">
                    <i class="bi bi-chat-quote me-2"></i>
                    Bio
                </div>

                @if($user->bio)

                    <div class="profile-bio">
                        "{{ $user->bio }}"
                    </div>

                @else

                    <div class="profile-bio profile-bio-empty">
                        Belum ada bio.
                    </div>

                @endif

            </div>

            {{-- Tombol Pengaturan --}}
            <div class="profile-actions">

                <a href="{{ route('profile.settings') }}"
                   class="profile-settings-btn">

                    <i class="bi bi-gear"></i>

                    <span>
                        Pengaturan Profile
                    </span>

                    <i class="bi bi-arrow-right profile-settings-arrow"></i>

                </a>

            </div>

        </div>

    </div>

</div>


<style>

/* =========================================
   PROFILE PAGE
========================================= */

.profile-page-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
    margin-bottom: 28px;
}

.profile-page-title {
    font-size: 28px;
    font-weight: 700;
    color: #212529;
    margin: 0 0 5px;
    letter-spacing: -0.3px;
}

.profile-page-subtitle {
    color: #6c757d;
    font-size: 14px;
    margin: 0;
}


/* =========================================
   BACK BUTTON
========================================= */

.profile-back-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 10px 16px;
    border: 1px solid #dee2e6;
    border-radius: 10px;
    background: #ffffff;
    color: #495057;
    text-decoration: none;
    font-size: 14px;
    font-weight: 600;
    transition: all 0.2s ease;
}

.profile-back-btn:hover {
    background: #f8f9fa;
    border-color: #ced4da;
    color: #212529;
    transform: translateX(-2px);
}


/* =========================================
   ALERT
========================================= */

.profile-alert {
    border-radius: 12px;
    margin-bottom: 24px;
    padding: 14px 16px;
}


/* =========================================
   MAIN CARD
========================================= */

.profile-main-card {
    position: relative;
    display: flex;
    align-items: center;
    gap: 45px;
    background: #ffffff;
    border: 1px solid #edf0f2;
    border-radius: 22px;
    padding: 42px;
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.045);
    overflow: hidden;
}

.profile-main-card::before {
    content: "";
    position: absolute;
    left: 0;
    top: 0;
    bottom: 0;
    width: 4px;
    background: #0d6efd;
}


/* =========================================
   PHOTO
========================================= */

.profile-photo-section {
    flex-shrink: 0;
}

.profile-photo-wrapper {
    position: relative;
    width: 180px;
    height: 180px;
}

.profile-photo {
    width: 180px;
    height: 180px;
    display: block;
    object-fit: cover;
    border-radius: 50%;
    border: 7px solid #f1f3f5;
    background: #f8f9fa;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.09);
}

.profile-photo-default {
    display: flex;
    align-items: center;
    justify-content: center;
    background: #eef4ff;
    color: #0d6efd;
    font-size: 72px;
}


/* Online Indicator */

.profile-online-indicator {
    position: absolute;
    right: 10px;
    bottom: 13px;
    width: 21px;
    height: 21px;
    background: #198754;
    border: 4px solid #ffffff;
    border-radius: 50%;
}


/* =========================================
   INFORMATION
========================================= */

.profile-information {
    flex: 1;
    min-width: 0;
}

.profile-heading {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    gap: 12px;
    margin-bottom: 22px;
}

.profile-name {
    font-size: 30px;
    font-weight: 700;
    color: #212529;
    line-height: 1.2;
    word-break: break-word;
}


/* =========================================
   STATUS
========================================= */

.profile-status {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    padding: 6px 11px;
    border-radius: 50px;
    background: #eaf8ef;
    color: #198754;
    font-size: 12px;
    font-weight: 600;
    white-space: nowrap;
}

.profile-status-dot {
    width: 7px;
    height: 7px;
    background: #198754;
    border-radius: 50%;
}


/* =========================================
   PROFILE DETAILS
========================================= */

.profile-details {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 14px;
}

.profile-detail-item {
    display: flex;
    align-items: center;
    gap: 11px;
    min-width: 0;
    padding: 13px;
    border: 1px solid #edf0f2;
    border-radius: 12px;
    background: #fafbfc;
}

.profile-detail-icon {
    flex-shrink: 0;
    width: 35px;
    height: 35px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 9px;
    background: #eef4ff;
    color: #0d6efd;
    font-size: 16px;
}

.profile-detail-label {
    color: #8a929a;
    font-size: 11px;
    font-weight: 600;
    margin-bottom: 2px;
}

.profile-detail-value {
    color: #343a40;
    font-size: 13px;
    font-weight: 600;
    word-break: break-word;
}


/* =========================================
   BIO
========================================= */

.profile-bio-section {
    margin-top: 22px;
}

.profile-bio-label {
    color: #495057;
    font-size: 13px;
    font-weight: 700;
    margin-bottom: 9px;
}

.profile-bio {
    max-width: 720px;
    padding: 14px 17px;
    border-radius: 12px;
    background: #f8f9fa;
    border: 1px solid #edf0f2;
    color: #495057;
    font-size: 14px;
    line-height: 1.6;
    word-break: break-word;
}

.profile-bio-empty {
    color: #8a929a;
    font-style: italic;
}


/* =========================================
   SETTINGS BUTTON
========================================= */

.profile-actions {
    margin-top: 25px;
}

.profile-settings-btn {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    padding: 11px 17px;
    border-radius: 11px;
    background: #0d6efd;
    border: 1px solid #0d6efd;
    color: #ffffff;
    text-decoration: none;
    font-size: 14px;
    font-weight: 600;
    box-shadow: 0 4px 12px rgba(13, 110, 253, 0.15);
    transition: all 0.2s ease;
}

.profile-settings-btn:hover {
    background: #0b5ed7;
    border-color: #0b5ed7;
    color: #ffffff;
    transform: translateY(-1px);
    box-shadow: 0 6px 16px rgba(13, 110, 253, 0.2);
}

.profile-settings-arrow {
    margin-left: 5px;
    transition: transform 0.2s ease;
}

.profile-settings-btn:hover .profile-settings-arrow {
    transform: translateX(3px);
}


/* =========================================
   TABLET
========================================= */

@media (max-width: 991.98px) {

    .profile-main-card {
        gap: 30px;
        padding: 32px;
    }

    .profile-photo-wrapper,
    .profile-photo {
        width: 150px;
        height: 150px;
    }

    .profile-photo-default {
        font-size: 60px;
    }

    .profile-name {
        font-size: 26px;
    }

    .profile-details {
        grid-template-columns: 1fr;
    }

}


/* =========================================
   MOBILE
========================================= */

@media (max-width: 767.98px) {

    .profile-page-header {
        align-items: flex-start;
    }

    .profile-page-title {
        font-size: 24px;
    }

    .profile-back-btn {
        padding: 9px 12px;
    }

    .profile-main-card {
        flex-direction: column;
        text-align: center;
        gap: 22px;
        padding: 30px 20px;
        border-radius: 18px;
    }

    .profile-main-card::before {
        width: 100%;
        height: 4px;
        right: 0;
        bottom: auto;
    }

    .profile-photo-wrapper,
    .profile-photo {
        width: 135px;
        height: 135px;
    }

    .profile-photo-default {
        font-size: 55px;
    }

    .profile-online-indicator {
        right: 5px;
        bottom: 7px;
    }

    .profile-heading {
        justify-content: center;
        margin-bottom: 20px;
    }

    .profile-name {
        width: 100%;
        font-size: 24px;
    }

    .profile-details {
        text-align: left;
    }

    .profile-bio-section {
        text-align: left;
    }

    .profile-actions {
        margin-top: 22px;
    }

    .profile-settings-btn {
        width: 100%;
        justify-content: center;
    }

}


/* =========================================
   SMALL MOBILE
========================================= */

@media (max-width: 420px) {

    .profile-page-header {
        flex-direction: column;
        gap: 12px;
    }

    .profile-back-btn {
        align-self: flex-start;
    }

    .profile-main-card {
        padding: 27px 16px;
    }

    .profile-photo-wrapper,
    .profile-photo {
        width: 120px;
        height: 120px;
    }

    .profile-photo-default {
        font-size: 48px;
    }

    .profile-name {
        font-size: 22px;
    }

    .profile-detail-item {
        padding: 11px;
    }

}

</style>

@endsection