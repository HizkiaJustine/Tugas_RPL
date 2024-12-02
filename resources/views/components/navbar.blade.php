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
    <a href="about" class="{{ request()->is('about') ? 'nav-active' : ''}}">Tentang RSUI</a>
    <a href="articles">Artikel</a>
    <a href="/forum">Forum</a>
    <a href="{{ route('appointment.create') }}">Reservasi</a>
    <div class="notification-icon">
        <i class="bi bi-bell"></i>
        <span class="badge">3</span>
        <div class="dropdown-notifications">
            <a href="#">Notifikasi 1 aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</a>
            <a href="#">Notifikasi 2</a>
            <a href="#">Notifikasi 3</a>
        </div>
    </div>
    @auth
        <!-- Profile Icon -->
        <div class="profile-icon">
            <img src="https://i.pinimg.com/736x/7f/c4/c6/7fc4c6ecc7738247aac61a60958429d4.jpg" alt="Profile" class="profile">
            <div class="dropdown-profile">
                <a href="profile">Profil Saya</a>
                <a href="#">Appointment Saya</a>
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