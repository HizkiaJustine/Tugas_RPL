<!DOCTYPE html>
<html>
<head>
    <title>Tambah Rekam Medis</title>
</head>
<body>
    <h1>Tambah Rekam Medis</h1>
    <form action="{{ route('rekammedis.store') }}" method="POST">
        @csrf
        <label for="Tanggal">Tanggal:</label>
        <input type="date" id="Tanggal" name="Tanggal" required>
        <br>
        <label for="PasienID">Pasien ID:</label>
        <input type="text" id="PasienID" name="PasienID" required>
        <br>
        <label for="DokterID">Dokter ID:</label>
        <input type="text" id="DokterID" name="DokterID" required>
        <br>
        <label for="HasilDiagnosa">Hasil Diagnosa:</label>
        <input type="text" id="HasilDiagnosa" name="HasilDiagnosa" required>
        <br>
        <label for="Perawatan">Perawatan:</label>
        <input type="text" id="Perawatan" name="Perawatan" required>
        <br>
        <label for="ResepObat">Resep Obat:</label>
        <input type="text" id="ResepObat" name="ResepObat" required>
        <br>
        <label for="HasilLab">Hasil Lab:</label>
        <input type="text" id="HasilLab" name="HasilLab">
        <br>
        <button type="submit">Tambah Rekam Medis</button>
    </form>
</body>
</html>
