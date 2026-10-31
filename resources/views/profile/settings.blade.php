@extends('layouts.app')

@section('title', 'Pengaturan Profile')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="settings-page-header">
        <div>
            <h3 class="settings-page-title">
                Pengaturan Profile
            </h3>
            <p class="settings-page-subtitle">
                Kelola informasi dan keamanan akun Anda.
            </p>
        </div>

        <a href="{{ route('profile.index') }}" class="settings-back-btn">
            <i class="bi bi-arrow-left"></i>
            <span>Kembali</span>
        </a>
    </div>


    {{-- NOTIFIKASI --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show settings-alert"
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


    {{-- ERROR --}}
    @if($errors->any())
        <div class="alert alert-danger border-0 shadow-sm rounded-3 mb-4"
             role="alert">

            <div class="d-flex align-items-start">
                <i class="bi bi-exclamation-triangle-fill fs-5 me-2"></i>

                <div>
                    <strong>Terdapat kesalahan:</strong>

                    <ul class="mb-0 mt-2 ps-3">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>

        </div>
    @endif


    <div class="row g-4">

        {{-- ========================================= --}}
        {{-- INFORMASI PROFILE --}}
        {{-- ========================================= --}}
        <div class="col-12">

            <div class="settings-card">

                <div class="settings-card-header">

                    <div class="settings-header-content">

                        <div class="settings-icon settings-icon-blue">
                            <i class="bi bi-person"></i>
                        </div>

                        <div>
                            <h5 class="settings-card-title">
                                Informasi Profile
                            </h5>

                            <p class="settings-card-subtitle">
                                Informasi dasar yang digunakan pada profile Anda.
                            </p>
                        </div>

                    </div>

                </div>


                <div class="settings-list">

                    {{-- NAMA --}}
                    <div class="setting-item">

                        <div class="setting-information">

                            <div class="setting-label">
                                Nama Lengkap
                            </div>

                            <div class="setting-value">
                                {{ $user->name }}
                            </div>

                        </div>

                        <button type="button"
                                class="setting-edit-btn"
                                data-bs-toggle="modal"
                                data-bs-target="#editNameModal">

                            <i class="bi bi-pencil-square"></i>
                            <span>Edit</span>

                        </button>

                    </div>


                    {{-- USERNAME --}}
                    <div class="setting-item">

                        <div class="setting-information">

                            <div class="setting-label">
                                Username
                            </div>

                            <div class="setting-value">
                                {{ $user->username }}
                            </div>

                        </div>

                        <button type="button"
                                class="setting-edit-btn"
                                data-bs-toggle="modal"
                                data-bs-target="#editUsernameModal">

                            <i class="bi bi-pencil-square"></i>
                            <span>Edit</span>

                        </button>

                    </div>


                    {{-- EMAIL --}}
                    <div class="setting-item">

                        <div class="setting-information">

                            <div class="setting-label">
                                Email
                            </div>

                            <div class="setting-value">
                                {{ $user->email }}
                            </div>

                        </div>

                        <button type="button"
                                class="setting-edit-btn"
                                data-bs-toggle="modal"
                                data-bs-target="#editEmailModal">

                            <i class="bi bi-pencil-square"></i>
                            <span>Edit</span>

                        </button>

                    </div>


                    {{-- BIO --}}
                    <div class="setting-item">

                        <div class="setting-information">

                            <div class="setting-label">
                                Bio
                            </div>

                            <div class="setting-value setting-bio-value">

                                @if($user->bio)
                                    {{ $user->bio }}
                                @else
                                    <span class="setting-empty">
                                        Belum ada bio.
                                    </span>
                                @endif

                            </div>

                        </div>

                        <button type="button"
                                class="setting-edit-btn"
                                data-bs-toggle="modal"
                                data-bs-target="#editBioModal">

                            <i class="bi bi-pencil-square"></i>
                            <span>Edit</span>

                        </button>

                    </div>

                </div>

            </div>

        </div>


        {{-- ========================================= --}}
        {{-- FOTO PROFILE --}}
        {{-- ========================================= --}}
        <div class="col-12 col-lg-6">

            <div class="settings-card settings-card-equal">

                <div class="settings-card-header">

                    <div class="settings-header-content">

                        <div class="settings-icon settings-icon-purple">
                            <i class="bi bi-camera"></i>
                        </div>

                        <div>
                            <h5 class="settings-card-title">
                                Foto Profile
                            </h5>

                            <p class="settings-card-subtitle">
                                Kelola foto profile Anda.
                            </p>
                        </div>

                    </div>

                </div>


                <div class="photo-settings-body">

                    <div class="settings-avatar">

                        @if($user->profile_photo)

                            <img src="{{ asset('storage/' . $user->profile_photo) }}"
                                 alt="Foto Profile {{ $user->name }}">

                        @else

                            <div class="settings-avatar-default">
                                <i class="bi bi-person-fill"></i>
                            </div>

                        @endif

                    </div>


                    <div class="photo-settings-info">

                        <h6 class="photo-title">
                            Foto Profile
                        </h6>

                        <p class="photo-description">
                            JPG, JPEG, PNG, atau WEBP.<br>
                            Maksimal 2 MB.
                        </p>


                        <div class="photo-actions">

                            <button type="button"
                                    class="settings-primary-btn"
                                    data-bs-toggle="modal"
                                    data-bs-target="#photoModal">

                                <i class="bi bi-camera"></i>

                                <span>
                                    {{ $user->profile_photo
                                        ? 'Ganti Foto'
                                        : 'Upload Foto'
                                    }}
                                </span>

                            </button>


                            @if($user->profile_photo)

                                <form action="{{ route('profile.photo.delete') }}"
                                      method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus foto profile?')">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="settings-danger-outline-btn">

                                        <i class="bi bi-trash"></i>
                                        <span>Hapus Foto</span>

                                    </button>

                                </form>

                            @endif

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- ========================================= --}}
        {{-- KEAMANAN --}}
        {{-- ========================================= --}}
        <div class="col-12 col-lg-6">

            <div class="settings-card settings-card-equal">

                <div class="settings-card-header">

                    <div class="settings-header-content">

                        <div class="settings-icon settings-icon-green">
                            <i class="bi bi-shield-lock"></i>
                        </div>

                        <div>
                            <h5 class="settings-card-title">
                                Keamanan
                            </h5>

                            <p class="settings-card-subtitle">
                                Kelola password akun Anda.
                            </p>
                        </div>

                    </div>

                </div>


                <div class="security-body">

                    <div class="security-row">

                        <div class="security-row-icon">
                            <i class="bi bi-key"></i>
                        </div>

                        <div class="security-information">

                            <div class="security-title">
                                Password
                            </div>

                            <div class="security-description">
                                Gunakan password yang kuat dan sulit ditebak.
                            </div>

                        </div>

                        <button type="button"
                                class="security-edit-btn"
                                data-bs-toggle="modal"
                                data-bs-target="#passwordModal">

                            <i class="bi bi-pencil-square"></i>
                            <span>Ubah</span>

                        </button>

                    </div>

                </div>

            </div>

        </div>


        {{-- ========================================= --}}
        {{-- PENGATURAN LANJUTAN --}}
        {{-- ========================================= --}}
        <div class="col-12">

            <div class="settings-card advanced-card">

                <button type="button"
                        class="advanced-header"
                        data-bs-toggle="collapse"
                        data-bs-target="#advancedSettings"
                        aria-expanded="false"
                        aria-controls="advancedSettings">

                    <div class="advanced-header-content">

                        <div class="settings-header-content">

                            <div class="settings-icon settings-icon-gray">
                                <i class="bi bi-gear"></i>
                            </div>

                            <div>
                                <h5 class="settings-card-title">
                                    Pengaturan Lanjutan
                                </h5>

                                <p class="settings-card-subtitle">
                                    Pengaturan tambahan akun.
                                </p>
                            </div>

                        </div>

                        <i class="bi bi-chevron-down advanced-chevron"></i>

                    </div>

                </button>


                <div class="collapse" id="advancedSettings">

                    <div class="advanced-body">

                        <div class="danger-zone">

                            <div class="danger-icon">
                                <i class="bi bi-exclamation-triangle-fill"></i>
                            </div>

                            <div class="danger-information">

                                <h6 class="danger-title">
                                    Zona Berbahaya
                                </h6>

                                <p class="danger-description">
                                    Menghapus akun akan menghapus akun secara permanen
                                    beserta data yang dimiliki akun tersebut.
                                </p>

                                <button type="button"
                                        class="danger-delete-btn"
                                        data-bs-toggle="modal"
                                        data-bs-target="#deleteAccountModal">

                                    <i class="bi bi-trash"></i>
                                    <span>Hapus Akun</span>

                                </button>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>


{{-- ========================================= --}}
{{-- MODAL EDIT NAMA --}}
{{-- ========================================= --}}
<div class="modal fade"
     id="editNameModal"
     tabindex="-1"
     aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content settings-modal">

            <div class="modal-header">

                <h5 class="modal-title">
                    <i class="bi bi-person me-2"></i>
                    Edit Nama Lengkap
                </h5>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close">
                </button>

            </div>


            <form action="{{ route('profile.update') }}"
                  method="POST">

                @csrf
                @method('PUT')

                <div class="modal-body">

                    <label class="modal-label">
                        Nama Lengkap
                    </label>

                    <input type="text"
                           name="name"
                           class="form-control modal-input"
                           value="{{ $user->name }}"
                           maxlength="100"
                           required>

                    <input type="hidden"
                           name="username"
                           value="{{ $user->username }}">

                    <input type="hidden"
                           name="email"
                           value="{{ $user->email }}">

                    <input type="hidden"
                           name="bio"
                           value="{{ $user->bio }}">

                </div>


                <div class="modal-footer">

                    <button type="button"
                            class="modal-cancel-btn"
                            data-bs-dismiss="modal">
                        Batal
                    </button>

                    <button type="submit"
                            class="modal-save-btn">
                        <i class="bi bi-check-lg"></i>
                        Simpan
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>


{{-- ========================================= --}}
{{-- MODAL EDIT USERNAME --}}
{{-- ========================================= --}}
<div class="modal fade"
     id="editUsernameModal"
     tabindex="-1"
     aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content settings-modal">

            <div class="modal-header">

                <h5 class="modal-title">
                    <i class="bi bi-at me-2"></i>
                    Edit Username
                </h5>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close">
                </button>

            </div>


            <form action="{{ route('profile.update') }}"
                  method="POST">

                @csrf
                @method('PUT')

                <div class="modal-body">

                    <label class="modal-label">
                        Username
                    </label>

                    <input type="text"
                           name="username"
                           class="form-control modal-input"
                           value="{{ $user->username }}"
                           maxlength="50"
                           required>

                    <input type="hidden"
                           name="name"
                           value="{{ $user->name }}">

                    <input type="hidden"
                           name="email"
                           value="{{ $user->email }}">

                    <input type="hidden"
                           name="bio"
                           value="{{ $user->bio }}">

                </div>


                <div class="modal-footer">

                    <button type="button"
                            class="modal-cancel-btn"
                            data-bs-dismiss="modal">
                        Batal
                    </button>

                    <button type="submit"
                            class="modal-save-btn">
                        <i class="bi bi-check-lg"></i>
                        Simpan
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>


{{-- ========================================= --}}
{{-- MODAL EDIT EMAIL --}}
{{-- ========================================= --}}
<div class="modal fade"
     id="editEmailModal"
     tabindex="-1"
     aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content settings-modal">

            <div class="modal-header">

                <h5 class="modal-title">
                    <i class="bi bi-envelope me-2"></i>
                    Edit Email
                </h5>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close">
                </button>

            </div>


            <form action="{{ route('profile.update') }}"
                  method="POST">

                @csrf
                @method('PUT')

                <div class="modal-body">

                    <label class="modal-label">
                        Email
                    </label>

                    <input type="email"
                           name="email"
                           class="form-control modal-input"
                           value="{{ $user->email }}"
                           maxlength="255"
                           required>

                    <input type="hidden"
                           name="name"
                           value="{{ $user->name }}">

                    <input type="hidden"
                           name="username"
                           value="{{ $user->username }}">

                    <input type="hidden"
                           name="bio"
                           value="{{ $user->bio }}">

                </div>


                <div class="modal-footer">

                    <button type="button"
                            class="modal-cancel-btn"
                            data-bs-dismiss="modal">
                        Batal
                    </button>

                    <button type="submit"
                            class="modal-save-btn">
                        <i class="bi bi-check-lg"></i>
                        Simpan
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>


{{-- ========================================= --}}
{{-- MODAL EDIT BIO --}}
{{-- ========================================= --}}
<div class="modal fade"
     id="editBioModal"
     tabindex="-1"
     aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content settings-modal">

            <div class="modal-header">

                <h5 class="modal-title">
                    <i class="bi bi-card-text me-2"></i>
                    Edit Bio
                </h5>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close">
                </button>

            </div>


            <form action="{{ route('profile.update') }}"
                  method="POST">

                @csrf
                @method('PUT')

                <div class="modal-body">

                    <label class="modal-label">
                        Bio
                    </label>

                    <textarea name="bio"
                              class="form-control modal-input"
                              rows="5"
                              maxlength="500"
                              placeholder="Tulis bio Anda...">{{ $user->bio }}</textarea>

                    <input type="hidden"
                           name="name"
                           value="{{ $user->name }}">

                    <input type="hidden"
                           name="username"
                           value="{{ $user->username }}">

                    <input type="hidden"
                           name="email"
                           value="{{ $user->email }}">

                </div>


                <div class="modal-footer">

                    <button type="button"
                            class="modal-cancel-btn"
                            data-bs-dismiss="modal">
                        Batal
                    </button>

                    <button type="submit"
                            class="modal-save-btn">
                        <i class="bi bi-check-lg"></i>
                        Simpan
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>


{{-- ========================================= --}}
{{-- MODAL FOTO --}}
{{-- ========================================= --}}
<div class="modal fade"
     id="photoModal"
     tabindex="-1"
     aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content settings-modal">

            <div class="modal-header">

                <h5 class="modal-title">

                    <i class="bi bi-camera me-2"></i>

                    {{ $user->profile_photo
                        ? 'Ganti Foto Profile'
                        : 'Upload Foto Profile'
                    }}

                </h5>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close">
                </button>

            </div>


            <form action="{{ route('profile.update') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="modal-body">

                    <div class="modal-photo-preview">

                        <div class="modal-avatar">

                            @if($user->profile_photo)

                                <img src="{{ asset('storage/' . $user->profile_photo) }}"
                                     alt="Foto Profile {{ $user->name }}">

                            @else

                                <div class="settings-avatar-default">
                                    <i class="bi bi-person-fill"></i>
                                </div>

                            @endif

                        </div>

                    </div>


                    <label class="modal-label">
                        Pilih Foto
                    </label>

                    <input type="file"
                           name="profile_photo"
                           class="form-control modal-input"
                           accept=".jpg,.jpeg,.png,.webp"
                           required>

                    <div class="form-text">
                        JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.
                    </div>


                    <input type="hidden"
                           name="name"
                           value="{{ $user->name }}">

                    <input type="hidden"
                           name="username"
                           value="{{ $user->username }}">

                    <input type="hidden"
                           name="email"
                           value="{{ $user->email }}">

                    <input type="hidden"
                           name="bio"
                           value="{{ $user->bio }}">

                </div>


                <div class="modal-footer">

                    <button type="button"
                            class="modal-cancel-btn"
                            data-bs-dismiss="modal">
                        Batal
                    </button>

                    <button type="submit"
                            class="modal-save-btn">

                        <i class="bi bi-upload"></i>
                        Simpan Foto

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>


{{-- ========================================= --}}
{{-- MODAL PASSWORD --}}
{{-- ========================================= --}}
<div class="modal fade"
     id="passwordModal"
     tabindex="-1"
     aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content settings-modal">

            <div class="modal-header">

                <h5 class="modal-title">

                    <i class="bi bi-shield-lock me-2"></i>
                    Ubah Password

                </h5>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close">
                </button>

            </div>


            <form action="{{ route('profile.password') }}"
                  method="POST">

                @csrf
                @method('PUT')

                <div class="modal-body">

                    {{-- PASSWORD LAMA --}}
                    <div class="mb-3">

                        <label class="modal-label">
                            Password Saat Ini
                        </label>

                        <div class="password-input-group">

                            <input type="password"
                                   name="current_password"
                                   id="currentPassword"
                                   class="form-control modal-input"
                                   required>

                            <button type="button"
                                    class="password-toggle"
                                    onclick="togglePassword('currentPassword', this)"
                                    aria-label="Tampilkan password">

                                <i class="bi bi-eye"></i>

                            </button>

                        </div>

                    </div>


                    {{-- PASSWORD BARU --}}
                    <div class="mb-3">

                        <label class="modal-label">
                            Password Baru
                        </label>

                        <div class="password-input-group">

                            <input type="password"
                                   name="password"
                                   id="newPassword"
                                   class="form-control modal-input"
                                   minlength="8"
                                   required>

                            <button type="button"
                                    class="password-toggle"
                                    onclick="togglePassword('newPassword', this)"
                                    aria-label="Tampilkan password">

                                <i class="bi bi-eye"></i>

                            </button>

                        </div>

                        <div class="form-text">
                            Minimal 8 karakter.
                        </div>

                    </div>


                    {{-- KONFIRMASI --}}
                    <div>

                        <label class="modal-label">
                            Konfirmasi Password
                        </label>

                        <div class="password-input-group">

                            <input type="password"
                                   name="password_confirmation"
                                   id="confirmPassword"
                                   class="form-control modal-input"
                                   minlength="8"
                                   required>

                            <button type="button"
                                    class="password-toggle"
                                    onclick="togglePassword('confirmPassword', this)"
                                    aria-label="Tampilkan password">

                                <i class="bi bi-eye"></i>

                            </button>

                        </div>

                    </div>

                </div>


                <div class="modal-footer">

                    <button type="button"
                            class="modal-cancel-btn"
                            data-bs-dismiss="modal">
                        Batal
                    </button>

                    <button type="submit"
                            class="modal-password-btn">

                        <i class="bi bi-shield-check"></i>
                        Ubah Password

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>


{{-- ========================================= --}}
{{-- MODAL HAPUS AKUN --}}
{{-- ========================================= --}}
<div class="modal fade"
     id="deleteAccountModal"
     tabindex="-1"
     aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content settings-modal">

            <div class="modal-header danger-modal-header">

                <h5 class="modal-title">

                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                    Hapus Akun

                </h5>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close">
                </button>

            </div>


            <form action="{{ route('profile.account.delete') }}"
                  method="POST">

                @csrf
                @method('DELETE')

                <div class="modal-body">

                    <p class="delete-question">
                        Anda akan menghapus akun:
                    </p>

                    <div class="delete-account-user">

                        <div class="delete-account-avatar">

                            @if($user->profile_photo)

                                <img src="{{ asset('storage/' . $user->profile_photo) }}"
                                     alt="Foto {{ $user->name }}">

                            @else

                                <i class="bi bi-person-fill"></i>

                            @endif

                        </div>

                        <div>

                            <strong>
                                {{ $user->name }}
                            </strong>

                            <small>
                                {{ $user->email }}
                            </small>

                        </div>

                    </div>


                    <div class="delete-warning">

                        <i class="bi bi-info-circle-fill"></i>

                        <span>
                            Tindakan ini permanen. Akun dan data milik akun
                            ini akan dihapus dan tidak dapat dikembalikan.
                        </span>

                    </div>

                </div>


                <div class="modal-footer">

                    <button type="button"
                            class="modal-cancel-btn"
                            data-bs-dismiss="modal">
                        Batal
                    </button>

                    <button type="submit"
                            class="modal-delete-btn">

                        <i class="bi bi-trash"></i>
                        Ya, Hapus Akun

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>


<style>

/* =========================================
   PAGE HEADER
========================================= */

.settings-page-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
    margin-bottom: 28px;
}

.settings-page-title {
    margin: 0 0 5px;
    color: #212529;
    font-size: 28px;
    font-weight: 700;
    letter-spacing: -0.3px;
}

.settings-page-subtitle {
    margin: 0;
    color: #6c757d;
    font-size: 14px;
}

.settings-back-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 10px 16px;
    border: 1px solid #dee2e6;
    border-radius: 10px;
    background: #ffffff;
    color: #495057;
    font-size: 14px;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.2s ease;
}

.settings-back-btn:hover {
    background: #f8f9fa;
    border-color: #ced4da;
    color: #212529;
    transform: translateX(-2px);
}


/* =========================================
   ALERT
========================================= */

.settings-alert {
    border: 0;
    border-radius: 12px;
    margin-bottom: 24px;
}


/* =========================================
   SETTINGS CARD
========================================= */

.settings-card {
    height: 100%;
    overflow: hidden;
    background: #ffffff;
    border: 1px solid #edf0f2;
    border-radius: 17px;
    box-shadow: 0 5px 24px rgba(0, 0, 0, 0.04);
}

.settings-card-equal {
    min-height: 100%;
}

.settings-card-header {
    padding: 21px 24px;
    border-bottom: 1px solid #edf0f2;
}

.settings-header-content {
    display: flex;
    align-items: center;
    gap: 13px;
}

.settings-card-title {
    margin: 0 0 3px;
    color: #212529;
    font-size: 17px;
    font-weight: 700;
}

.settings-card-subtitle {
    margin: 0;
    color: #8a929a;
    font-size: 12px;
}


/* =========================================
   ICON
========================================= */

.settings-icon {
    width: 44px;
    height: 44px;
    min-width: 44px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 11px;
    font-size: 18px;
}

.settings-icon-blue {
    background: #eaf2ff;
    color: #0d6efd;
}

.settings-icon-purple {
    background: #f1eaff;
    color: #6f42c1;
}

.settings-icon-green {
    background: #e9f8ef;
    color: #198754;
}

.settings-icon-gray {
    background: #f1f3f5;
    color: #6c757d;
}


/* =========================================
   INFORMATION LIST
========================================= */

.settings-list {
    padding: 0 24px;
}

.setting-item {
    min-height: 78px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
    border-bottom: 1px solid #edf0f2;
}

.setting-item:last-child {
    border-bottom: 0;
}

.setting-information {
    min-width: 0;
    flex: 1;
}

.setting-label {
    margin-bottom: 4px;
    color: #7b838b;
    font-size: 12px;
    font-weight: 500;
}

.setting-value {
    color: #343a40;
    font-size: 14px;
    font-weight: 600;
    word-break: break-word;
}

.setting-bio-value {
    max-width: 850px;
    line-height: 1.5;
}

.setting-empty {
    color: #9aa1a8;
    font-weight: 400;
    font-style: italic;
}


/* =========================================
   EDIT BUTTON
========================================= */

.setting-edit-btn {
    flex-shrink: 0;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
    min-width: 78px;
    padding: 8px 12px;
    border: 1px solid #d9e5f8;
    border-radius: 9px;
    background: #ffffff;
    color: #0d6efd;
    font-size: 12px;
    font-weight: 600;
    transition: all 0.2s ease;
}

.setting-edit-btn:hover {
    background: #0d6efd;
    border-color: #0d6efd;
    color: #ffffff;
}


/* =========================================
   PHOTO SETTINGS
========================================= */

.photo-settings-body {
    min-height: 165px;
    display: flex;
    align-items: center;
    gap: 20px;
    padding: 24px;
}

.settings-avatar {
    width: 90px;
    height: 90px;
    min-width: 90px;
}

.settings-avatar img,
.settings-avatar-default {
    width: 90px;
    height: 90px;
    display: flex;
    align-items: center;
    justify-content: center;
    object-fit: cover;
    border-radius: 50%;
}

.settings-avatar-default {
    background: #eaf2ff;
    color: #0d6efd;
    font-size: 38px;
}

.photo-settings-info {
    min-width: 0;
}

.photo-title {
    margin: 0 0 4px;
    color: #343a40;
    font-size: 14px;
    font-weight: 700;
}

.photo-description {
    margin: 0 0 14px;
    color: #8a929a;
    font-size: 12px;
    line-height: 1.5;
}

.photo-actions {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    gap: 8px;
}

.settings-primary-btn,
.settings-danger-outline-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
    padding: 8px 12px;
    border-radius: 9px;
    font-size: 12px;
    font-weight: 600;
    transition: all 0.2s ease;
}

.settings-primary-btn {
    border: 1px solid #0d6efd;
    background: #0d6efd;
    color: #ffffff;
}

.settings-primary-btn:hover {
    background: #0b5ed7;
    border-color: #0b5ed7;
    color: #ffffff;
    transform: translateY(-1px);
}

.settings-danger-outline-btn {
    border: 1px solid #dc3545;
    background: #ffffff;
    color: #dc3545;
}

.settings-danger-outline-btn:hover {
    background: #dc3545;
    color: #ffffff;
}


/* =========================================
   SECURITY
========================================= */

.security-body {
    min-height: 165px;
    display: flex;
    align-items: center;
    padding: 24px;
}

.security-row {
    width: 100%;
    display: flex;
    align-items: center;
    gap: 13px;
}

.security-row-icon {
    width: 43px;
    height: 43px;
    min-width: 43px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 10px;
    background: #f1f3f5;
    color: #495057;
    font-size: 17px;
}

.security-information {
    min-width: 0;
    flex: 1;
}

.security-title {
    margin-bottom: 3px;
    color: #343a40;
    font-size: 14px;
    font-weight: 700;
}

.security-description {
    color: #8a929a;
    font-size: 12px;
    line-height: 1.5;
}

.security-edit-btn {
    flex-shrink: 0;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 8px 13px;
    border: 1px solid #343a40;
    border-radius: 9px;
    background: #ffffff;
    color: #343a40;
    font-size: 12px;
    font-weight: 600;
    transition: all 0.2s ease;
}

.security-edit-btn:hover {
    background: #343a40;
    color: #ffffff;
}


/* =========================================
   ADVANCED SETTINGS
========================================= */

.advanced-card {
    height: auto;
}

.advanced-header {
    width: 100%;
    padding: 21px 24px;
    border: 0;
    background: #ffffff;
    color: inherit;
    text-align: left;
    transition: background 0.2s ease;
}

.advanced-header:hover {
    background: #fafbfc;
}

.advanced-header-content {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
}

.advanced-chevron {
    color: #8a929a;
    font-size: 16px;
    transition: transform 0.2s ease;
}

.advanced-header[aria-expanded="true"] .advanced-chevron {
    transform: rotate(180deg);
}

.advanced-body {
    padding: 22px 24px 24px;
    border-top: 1px solid #edf0f2;
}


/* =========================================
   DANGER ZONE
========================================= */

.danger-zone {
    display: flex;
    align-items: flex-start;
    gap: 15px;
    padding: 19px;
    border: 1px solid #f2c7cb;
    border-radius: 13px;
    background: #fff8f8;
}

.danger-icon {
    width: 42px;
    height: 42px;
    min-width: 42px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 10px;
    background: #ffe5e8;
    color: #dc3545;
}

.danger-information {
    min-width: 0;
}

.danger-title {
    margin: 0 0 5px;
    color: #dc3545;
    font-size: 14px;
    font-weight: 700;
}

.danger-description {
    max-width: 800px;
    margin: 0 0 13px;
    color: #6c757d;
    font-size: 12px;
    line-height: 1.6;
}

.danger-delete-btn {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    padding: 8px 13px;
    border: 1px solid #dc3545;
    border-radius: 9px;
    background: #ffffff;
    color: #dc3545;
    font-size: 12px;
    font-weight: 600;
    transition: all 0.2s ease;
}

.danger-delete-btn:hover {
    background: #dc3545;
    color: #ffffff;
}


/* =========================================
   MODAL
========================================= */

.settings-modal {
    overflow: hidden;
    border: 0;
    border-radius: 17px;
    box-shadow: 0 15px 45px rgba(0, 0, 0, 0.15);
}

.settings-modal .modal-header {
    padding: 19px 22px;
    border-bottom: 1px solid #edf0f2;
}

.settings-modal .modal-title {
    color: #212529;
    font-size: 17px;
    font-weight: 700;
}

.settings-modal .modal-title i {
    color: #0d6efd;
}

.settings-modal .modal-body {
    padding: 22px;
}

.settings-modal .modal-footer {
    display: flex;
    gap: 8px;
    padding: 0 22px 20px;
    border-top: 0;
}

.modal-label {
    display: block;
    margin-bottom: 7px;
    color: #343a40;
    font-size: 13px;
    font-weight: 600;
}

.modal-input {
    min-height: 42px;
    border: 1px solid #dee2e6;
    border-radius: 9px;
    font-size: 14px;
    box-shadow: none !important;
}

.modal-input:focus {
    border-color: #86b7fe;
    box-shadow: 0 0 0 3px rgba(13, 110, 253, 0.08) !important;
}

textarea.modal-input {
    resize: vertical;
}

.modal-cancel-btn,
.modal-save-btn,
.modal-password-btn,
.modal-delete-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
    min-height: 39px;
    padding: 8px 14px;
    border-radius: 9px;
    font-size: 13px;
    font-weight: 600;
    transition: all 0.2s ease;
}

.modal-cancel-btn {
    border: 1px solid #dee2e6;
    background: #ffffff;
    color: #495057;
}

.modal-cancel-btn:hover {
    background: #f8f9fa;
}

.modal-save-btn {
    border: 1px solid #0d6efd;
    background: #0d6efd;
    color: #ffffff;
}

.modal-save-btn:hover {
    background: #0b5ed7;
    color: #ffffff;
}

.modal-password-btn {
    border: 1px solid #343a40;
    background: #343a40;
    color: #ffffff;
}

.modal-password-btn:hover {
    background: #212529;
    color: #ffffff;
}

.modal-delete-btn {
    border: 1px solid #dc3545;
    background: #dc3545;
    color: #ffffff;
}

.modal-delete-btn:hover {
    background: #bb2d3b;
    color: #ffffff;
}


/* =========================================
   PASSWORD
========================================= */

.password-input-group {
    position: relative;
    display: flex;
}

.password-input-group .modal-input {
    padding-right: 45px;
}

.password-toggle {
    position: absolute;
    top: 50%;
    right: 5px;
    z-index: 5;
    width: 35px;
    height: 35px;
    display: flex;
    align-items: center;
    justify-content: center;
    transform: translateY(-50%);
    border: 0;
    border-radius: 7px;
    background: transparent;
    color: #6c757d;
}

.password-toggle:hover {
    background: #f1f3f5;
    color: #212529;
}


/* =========================================
   PHOTO MODAL
========================================= */

.modal-photo-preview {
    margin-bottom: 20px;
    text-align: center;
}

.modal-avatar {
    width: 105px;
    height: 105px;
    margin: 0 auto;
}

.modal-avatar img,
.modal-avatar .settings-avatar-default {
    width: 105px;
    height: 105px;
    display: flex;
    align-items: center;
    justify-content: center;
    object-fit: cover;
    border-radius: 50%;
}

.modal-avatar .settings-avatar-default {
    background: #eaf2ff;
    color: #0d6efd;
    font-size: 44px;
}


/* =========================================
   DELETE ACCOUNT MODAL
========================================= */

.danger-modal-header {
    border-bottom: 1px solid #f5d0d3 !important;
}

.danger-modal-header .modal-title {
    color: #dc3545 !important;
}

.danger-modal-header .modal-title i {
    color: #dc3545 !important;
}

.delete-question {
    margin-bottom: 10px;
    color: #495057;
    font-size: 14px;
}

.delete-account-user {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 13px 15px;
    border: 1px solid #edf0f2;
    border-radius: 11px;
    background: #f8f9fa;
}

.delete-account-avatar {
    width: 43px;
    height: 43px;
    min-width: 43px;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    border-radius: 50%;
    background: #e9ecef;
    color: #6c757d;
    font-size: 19px;
}

.delete-account-avatar img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.delete-account-user strong {
    display: block;
    margin-bottom: 2px;
    color: #343a40;
    font-size: 14px;
}

.delete-account-user small {
    display: block;
    font-size: 12px;
}

.delete-warning {
    display: flex;
    align-items: flex-start;
    gap: 9px;
    margin-top: 15px;
    padding: 12px 14px;
    border-radius: 10px;
    background: #fff0f1;
    color: #842029;
    font-size: 12px;
    line-height: 1.5;
}

.delete-warning i {
    margin-top: 2px;
    flex-shrink: 0;
    color: #dc3545;
}


/* =========================================
   TABLET
========================================= */

@media (max-width: 991.98px) {

    .settings-page-title {
        font-size: 25px;
    }

}


/* =========================================
   MOBILE
========================================= */

@media (max-width: 767.98px) {

    .settings-page-header {
        align-items: flex-start;
    }

    .settings-page-title {
        font-size: 23px;
    }

    .settings-page-subtitle {
        font-size: 13px;
    }

    .settings-back-btn {
        padding: 9px 12px;
    }

    .settings-card-header {
        padding: 18px;
    }

    .settings-list {
        padding: 0 18px;
    }

    .setting-item {
        align-items: flex-start;
        flex-direction: column;
        gap: 11px;
        padding: 17px 0;
    }

    .setting-edit-btn {
        width: 100%;
    }

    .photo-settings-body {
        min-height: auto;
        flex-direction: column;
        padding: 22px 18px;
        text-align: center;
    }

    .photo-settings-info {
        width: 100%;
    }

    .photo-actions {
        justify-content: center;
    }

    .security-body {
        min-height: auto;
        padding: 22px 18px;
    }

    .security-row {
        align-items: flex-start;
        flex-wrap: wrap;
    }

    .security-information {
        padding-top: 2px;
    }

    .security-edit-btn {
        width: 100%;
        margin-top: 4px;
    }

    .advanced-header {
        padding: 18px;
    }

    .advanced-body {
        padding: 18px;
    }

    .danger-zone {
        flex-direction: column;
    }

    .danger-delete-btn {
        width: 100%;
    }

    .settings-modal .modal-body {
        padding: 18px;
    }

    .settings-modal .modal-footer {
        padding: 0 18px 18px;
    }

    .modal-cancel-btn,
    .modal-save-btn,
    .modal-password-btn,
    .modal-delete-btn {
        flex: 1;
    }

}


/* =========================================
   SMALL MOBILE
========================================= */

@media (max-width: 420px) {

    .settings-page-header {
        flex-direction: column;
        gap: 12px;
    }

    .settings-back-btn {
        align-self: flex-start;
    }

    .settings-header-content {
        gap: 10px;
    }

    .settings-icon {
        width: 40px;
        height: 40px;
        min-width: 40px;
        font-size: 16px;
    }

    .settings-card-title {
        font-size: 15px;
    }

    .settings-card-subtitle {
        font-size: 11px;
    }

    .photo-actions {
        flex-direction: column;
    }

    .photo-actions button,
    .photo-actions form,
    .photo-actions form button {
        width: 100%;
    }

    .modal-footer {
        flex-direction: column-reverse;
    }

    .modal-cancel-btn,
    .modal-save-btn,
    .modal-password-btn,
    .modal-delete-btn {
        width: 100%;
    }

}

</style>


<script>

function togglePassword(id, button) {

    const input = document.getElementById(id);
    const icon = button.querySelector('i');

    if (!input || !icon) {
        return;
    }

    if (input.type === 'password') {

        input.type = 'text';

        icon.classList.remove('bi-eye');
        icon.classList.add('bi-eye-slash');

        button.setAttribute(
            'aria-label',
            'Sembunyikan password'
        );

    } else {

        input.type = 'password';

        icon.classList.remove('bi-eye-slash');
        icon.classList.add('bi-eye');

        button.setAttribute(
            'aria-label',
            'Tampilkan password'
        );

    }

}

</script>

@endsection