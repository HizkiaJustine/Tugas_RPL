<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informasi Pasien</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1>Informasi Pasien</h1>
    <hr>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Umur</th>
                <th>Alamat</th>
                <th>Berat Badan</th>
                <th>Tinggi Badan</th>
                <th>Jenis Kelamin</th>
                <th>Nomor Hp</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pasien as $pasien)
                <tr>
                    <td>{{ $pasien['PasienID'] }}</td>
                    <td>{{ $pasien['NamaPasien'] }}</td>
                    <td>{{ $pasien['UmurPasien'] }}</td>
                    <td>{{ $pasien['AlamatPasien'] }}</td>
                    <td>{{ $pasien['BeratBadanPasien'] }}</td>
                    <td>{{ $pasien['TinggiBadanPasien'] }}</td>
                    <td>{{ $pasien['JenisKelamin'] }}</td>
                    <td>{{ $pasien['NomorHP'] }}</td>
                    <td class='action-buttons'>
                        <a href='edit_pasien.php?id=<!-- PasienID -->' class='btn btn-edit'>Edit</a>
                        <a href='delete_pasien.php?id=<!-- PasienID -->' class='btn btn-delete' onclick='return confirm("Apakah Anda yakin ingin menghapus pasien ini?")'>Delete</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9">Belum ada data</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
