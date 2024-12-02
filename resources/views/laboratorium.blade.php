<x-layout>
    <x-slot:name>{{ $name }}</x-slot:name>
    <x-slot:title>{{ $title }}</x-slot:title>
    <img class="image-layanan" src="img/lab.png">
        <h2 class="desc-title">Deskripsi</h2>
        <p class="desc-content"> Layanan laboratorium adalah fasilitas penting di klinik yang digunakan untuk mendukung proses 
            diagnosis, pemantauan, dan pengobatan berbagai kondisi kesehatan. Melalui pemeriksaan laboratorium, dokter dapat memahami 
            kondisi tubuh pasien secara lebih mendalam, mulai dari fungsi organ, kadar nutrisi, hingga keberadaan penyakit tertentu. 
            Proses ini melibatkan pengambilan dan analisis sampel seperti darah, urin, feses, atau jaringan tubuh lainnya menggunakan 
            alat dan teknologi medis yang canggih. 
        </p>
        <p class="desc-content">
            Di klinik kami, layanan laboratorium dirancang untuk memberikan hasil pemeriksaan yang cepat, akurat, dan dapat 
            diandalkan. Kami memahami bahwa hasil laboratorium yang tepat sangat penting untuk mendukung diagnosis dan pengobatan 
            yang sesuai. Oleh karena itu, kami menggunakan peralatan modern dan ditangani oleh tenaga medis profesional yang 
            berpengalaman.
        </p>
        <h2 class="desc-title">Layanan Tersedia</h2>
        <div class="accordion">
            <!-- Item 1 -->
            <div class="accordion-item">
                <div class="accordion-header">Pemeriksaan Rutin</div>
                <div class="accordion-content">
                    <li>Cek darah lengkap untuk mengetahui kondisi kesehatan umum.</li>
                    <li>Analisis urin dan feses untuk mendeteksi infeksi atau gangguan sistem pencernaan.</li>
                </div>
            </div>
            <!-- Item 2 -->
            <div class="accordion-item">
                <div class="accordion-header">Pemeriksaan Khusus</div>
                <div class="accordion-content">
                    <li>Analisis urin dan feses untuk mendeteksi infeksi atau gangguan sistem pencernaan.</li>
                    <li>Pemeriksaan hormon, gula darah, kolesterol, dan lainnya.</li>
                </div>
            </div>
            <!-- Item 3 -->
            <div class="accordion-item">
                <div class="accordion-header">Deteksi Penyakit Infeksi</div>
                <div class="accordion-content">
                    <p>Pemeriksaan penyakit seperti demam berdarah, malaria, hepatitis, atau infeksi bakteri dan virus lainnya.</p>
                </div>
            </div>
            <!-- Item 4 -->
            <div class="accordion-item">
                <div class="accordion-header">Pemeriksaan Pra-Nikah dan Kehamilan</div>
                <div class="accordion-content">
                    <li>Tes kesehatan pasangan sebelum menikah.</li>
                    <li>Pemeriksaan rutin ibu hamil untuk memastikan kesehatan ibu dan bayi.</li>
                </div>
            </div>
            <!-- Item 5 -->
            <div class="accordion-item">
                <div class="accordion-header">Layanan Skrining Kesehatan</div>
                <div class="accordion-content">
                    <p>Tes kesehatan untuk mendeteksi risiko penyakit tertentu sejak dini, seperti diabetes, hipertensi, atau kanker.
                    </p>
                </div>
            </div>
        </div>
</x-layout>