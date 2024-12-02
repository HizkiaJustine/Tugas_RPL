<x-layout>
    <x-slot:name>{{ $name }}</x-slot:name>
    <x-slot:title>{{ $title }}</x-slot:title>
    <img class="image-layanan" src="img/rad.png">
        <h2 class="desc-title">Deskripsi</h2>
        <p class="desc-content">Radiologi adalah layanan yang membantu dokter melihat bagian dalam tubuh Anda tanpa perlu operasi. Kami 
            menggunakan alat seperti X-ray, CT Scan, dan Ultrasound untuk membantu mendeteksi berbagai kondisi seperti patah tulang, 
            infeksi, atau penyakit dalam. Dengan hasil radiologi yang cepat dan akurat, dokter dapat memberikan perawatan terbaik untuk 
            Anda. Klinik kami memiliki tim ahli radiologi yang ramah dan berpengalaman, serta peralatan modern untuk memastikan kenyamanan 
            dan keamanan Anda selama pemeriksaan, sehingga dapat memberikan hasil pencitraan medis yang akurat dan cepat untuk membantu 
            diagnosis dan perawatan kesehatan Anda.
        </p>
        <h3 class="desc-content">Kesehatan Anda adalah Prioritas Kami!</h3>
        <h2 class="desc-title">Layanan Tersedia</h2>
        <div class="accordion">
            <!-- Item 1 -->
            <div class="accordion-item">
                <div class="accordion-header">Sinar-X (Rontgen)</div>
                <div class="accordion-content">
                    <p>Untuk melihat tulang, dada, atau organ dalam lainnya.</p>
                </div>
            </div>
            <!-- Item 2 -->
            <div class="accordion-item">
                <div class="accordion-header">Ultrasonogafi (USG)</div>
                <div class="accordion-content">
                    <p>Menggunakan gelombang suara untuk memeriksa organ seperti perut, ginjal, atau kandungan.</p>
                </div>
            </div>
            <!-- Item 3 -->
            <div class="accordion-item">
                <div class="accordion-header">CT Scan</div>
                <div class="accordion-content">
                    <p>Teknologi pencitraan 3D untuk detail lebih akurat, sering digunakan pada kepala, dada, atau organ dalam lainnya.</p>
                </div>
            </div>
            <!-- Item 4 -->
            <div class="accordion-item">
                <div class="accordion-header">MRI</div>
                <div class="accordion-content">
                    <p>Pemindaian menggunakan medan magnet untuk melihat jaringan lunak seperti otak, otot, dan sendi.</p>
                </div>
            </div>
        </div>
</x-layout>