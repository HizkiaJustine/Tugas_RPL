<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Rekam Medis</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <header class="bg-blue-500 text-white p-4">
        <h1 class="text-xl">Aplikasi Rekam Medis</h1>
    </header>

    <main class="container mx-auto py-8">
        <div class="bg-white shadow rounded-lg p-6">
            <h2 class="text-2xl font-bold mb-4">Detail Rekam Medis</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="font-semibold text-gray-700">Rekam Medis ID:</label>
                    <p class="text-gray-800">{{ $rekamMedis->RekamMedisID }}</p>
                </div>

                <div>
                    <label class="font-semibold text-gray-700">Tanggal:</label>
                    <p class="text-gray-800">{{ $rekamMedis->Tanggal }}</p>
                </div>

                <div>
                    <label class="font-semibold text-gray-700">Pasien ID:</label>
                    <p class="text-gray-800">{{ $rekamMedis->PasienID }}</p>
                </div>

                <div>
                    <label class="font-semibold text-gray-700">Dokter ID:</label>
                    <p class="text-gray-800">{{ $rekamMedis->DokterID }}</p>
                </div>

                <div class="col-span-2">
                    <label class="font-semibold text-gray-700">Hasil Diagnosa:</label>
                    <p class="text-gray-800 whitespace-pre-line">{{ $rekamMedis->HasilDiagnosa }}</p>
                </div>

                <div class="col-span-2">
                    <label class="font-semibold text-gray-700">Perawatan:</label>
                    <p class="text-gray-800 whitespace-pre-line">{{ $rekamMedis->Perawatan }}</p>
                </div>

                <div class="col-span-2">
                    <label class="font-semibold text-gray-700">Resep Obat:</label>
                    <p class="text-gray-800 whitespace-pre-line">{{ $rekamMedis->ResepObat }}</p>
                </div>

                <div class="col-span-2">
                    <label class="font-semibold text-gray-700">Hasil Lab:</label>
                    <p class="text-gray-800 whitespace-pre-line">{{ $rekamMedis->HasilLab }}</p>
                </div>
            </div>

            <div class="mt-6">
                <a href="{{ route('rekam-medis.index') }}" 
                   class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
                    Kembali
                </a>
            </div>
        </div>
    </main>

    <footer class="bg-gray-800 text-white text-center py-4">
        <p>&copy; 2024 Aplikasi Rekam Medis</p>
    </footer>
</body>
</html>
