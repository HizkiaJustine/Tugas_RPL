<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clinic Landing Page</title>
    <link rel="stylesheet" href="css/styles.css">
    <!-- Flickity CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flickity/2.3.0/flickity.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
</head>
<body>
    <!-- Navbar -->
    <x-navbar></x-navbar>

    <!-- Carousel -->
    <div class="gallery js-flickity" data-flickity-options='{ "wrapAround": true, "autoPlay": 3000 }'>
        <div class="gallery-cell">
            <img src="img/welcome.png" alt="Image 1">
        </div>
        <div class="gallery-cell">
            <img src="https://i.pinimg.com/736x/69/cb/b9/69cbb98ff0591e43312d9e1ee137fae7.jpg" alt="Image 1">
        </div>
        <div class="gallery-cell">
            <img src="https://i.pinimg.com/736x/b8/14/e1/b814e10405855e69b2b3497603070af4.jpg" alt="Image 1">
        </div>
    </div>

    <!-- About Section -->
    <section id="about" class="about bg-light py-5">
        <div class="container desc-content">
            <!-- Intro Section -->
            <div class="text-center mb-5">
                <h1 class="fw-bold text-primary">Panduan Tindakan Darurat</h1>
                <p class="text-muted fs-5">
                    Dalam keadaan darurat, penting untuk tetap tenang dan tahu langkah-langkah yang harus dilakukan. Yuk, ikuti panduan sederhana ini agar bisa membantu dengan tepat!
                </p>
            </div>
            <!-- Steps Section -->
            <div class="accordion">
                <!-- Item 1 -->
                <div class="accordion-item">
                    <div class="accordion-header">Tetap Tenang & Pastikan Aman</div>
                    <div class="accordion-content">
                        <p>Jangan panik! Pastikan lokasi aman untuk Anda dan korban. Hindari risiko tambahan seperti api, listrik, atau lalu lintas.</p>
                    </div>
                </div>
                <!-- Item 2 -->
                <div class="accordion-item">
                    <div class="accordion-header">Periksa Kondisi Korban</div>
                    <div class="accordion-content">
                        <p>Cek apakah korban sadar. Jika tidak, periksa napas dan denyut nadi. Jika sadar, tanya bagaimana kondisinya.</p>
                    </div>
                </div>
                <!-- Item 3 -->
                <div class="accordion-item">
                    <div class="accordion-header">Hubungi Bantuan Medis</div>
                    <div class="accordion-content">
                        <p>Telepon layanan darurat (112) atau ambulans terdekat. Jelaskan lokasi, jenis cedera, dan kondisi korban.</p>
                    </div>
                </div>
                <!-- Item 4 -->
                <div class="accordion-item">
                    <div class="accordion-header">Berikan Pertolongan Pertama</div>
                    <div class="accordion-content">
                        <p>
                            <li><strong>Pendarahan:</strong> Tekan luka dengan kain bersih dan angkat bagian tubuh yang terluka.</li>
                            <li><strong>Luka Bakar:</strong> Siram air dingin selama 10-20 menit, lalu tutup dengan kain steril.</li>
                            <li><strong>Patah Tulang:</strong> Stabilkan area dengan kain atau papan keras.</li>
                            <li><strong>Tersedak:</strong> Lakukan Heimlich Maneuver untuk membuka jalan napas.</li>
                        </p>
                    </div>
                </div>
                <!-- Item 5 -->
                <div class="accordion-item">
                    <div class="accordion-header">Monitor Korban</div>
                    <div class="accordion-content">
                        <p>Pantau kondisi korban hingga bantuan tiba. Jangan tinggalkan mereka sendirian.</p>
                    </div>
                </div>
                <!-- Item 6 -->
                <div class="accordion-item">
                    <div class="accordion-header">Hindari Tindakan Berisiko</div>
                    <div class="accordion-content">
                        <p>Jangan memindahkan korban kecuali berada dalam bahaya. Hindari memberi makanan/minuman jika korban tidak sadar.</p>
                    </div>
                </div>
                <!-- Item 7 -->
                <div class="accordion-item">
                    <div class="accordion-header">Gunakan Alat Bantu</div>
                    <div class="accordion-content">
                        <p>Manfaatkan kotak P3K seperti perban dan antiseptik. Jika perlu CPR, pastikan Anda tahu caranya.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Footer -->
    <footer>
        <div class="container">
            <p>Contact us at +6281345678912</p>
            <p>© 2024 Clinic Name. All Rights Reserved.</p>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flickity/2.3.0/flickity.pkgd.min.js"></script>

    <script src="js/script.js"></script>
</body>
</html>
