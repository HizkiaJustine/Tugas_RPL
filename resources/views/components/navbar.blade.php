<div class="navbar">
    <a href="/" class="{{ request()->is('/') ? 'nav-active' : ''}}">Home</a>
    <div class="dropdown">
        <a href="#">Layanan</a>
        <div class="dropdown-content">
            <div class="column">
                <a href="/paru">Paru-paru</a>
                <a href="/jantung">Jantung</a>
                <a href="/obgyn">Obgyn</a>
                <a href="/radiologi">Radiologi</a>
            </div>
            <div class="column">
                <a href="/okupasi">Okupasi</a>
                <a href="/rehabilitasi-medik">Rehabilitasi Medik</a>
                <a href="/laboratorium">Laboratorium</a>
                <a href="/gawat-darurat">Unit Gawat Darurat</a>
            </div>
        </div>
    </div>
    <a href="about" class="{{ request()->is('about') ? 'nav-active' : ''}}">Tentang RSIBDA</a>
    <a href="articles">Artikel</a>
    <a href="/forum">Forum</a>
    @auth
    @can('viewProfile', Auth::user())
    <a href="{{ route('appointment.create') }}">Reservasi</a>
    @endcan
    <div class="notification-icon">
        <i class="bi bi-bell"></i>
        <span class="badge">3</span>
        <div class="dropdown-notifications">
            <a href="#">Anda memiliki jadwal konsultasi dengan dokter John di tanggal 2025/01/01</a>
            <a href="#">Anda memiliki jadwal konsultasi dengan dokter John di tanggal 2025/01/02</a>
            <a href="#">Anda memiliki jadwal konsultasi dengan dokter John di tanggal 2025/01/03</a>
        </div>
    </div>
    @endauth
    @auth
        <!-- Profile Icon -->
        <div class="profile-icon">
            <img src="https://i.pinimg.com/736x/7f/c4/c6/7fc4c6ecc7738247aac61a60958429d4.jpg" alt="Profile" class="profile">
            <div class="dropdown-profile">
                @can('viewProfile', Auth::user())
                    <a href="profile">Profil Saya</a>
                @endcan
                @can('viewRekamMedis', Auth::user())
                    <a href="{{ route('rekammedis.show') }}">Rekam Medis</a>
                @endcan
                @can('viewAppointment', Auth::user())
                    <a href="{{ route('appointments.show') }}">Appointment</a>
                @endcan
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Keluar</a>
            </div>
        </div>
    @endauth
    @guest
        <!-- Login Button -->
        <a href="/login" class="button-74" role="button">Log-in</a>
    @endguest
</div>