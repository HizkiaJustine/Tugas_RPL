<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informasi Pasien</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        .btn {
            padding: 6px 12px;
            margin: 0 4px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
        }
        .btn-edit {
            background-color: #ffc107;
            color: #000;
        }
        .btn-delete {
            background-color: #dc3545;
            color: #fff;
        }
        .action-buttons {
            white-space: nowrap;
        }
    </style>
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
            <tr>
                <td><!-- PasienID --></td>
                <td><!-- NamaPasien --></td>
                <td><!-- UmurPasien --></td>
                <td><!-- AlamatPasien --></td>
                <td><!-- BeratBadanPasien --></td>
                <td><!-- TinggiBadanPasien --></td>
                <td><!-- JenisKelamin --></td>
                <td><!-- NomorHP --></td>
                <td class='action-buttons'>
                    <a href='edit_pasien.php?id=<!-- PasienID -->' class='btn btn-edit'>Edit</a>
                    <a href='delete_pasien.php?id=<!-- PasienID -->' class='btn btn-delete' onclick='return confirm("Apakah Anda yakin ingin menghapus pasien ini?")'>Delete</a>
                </td>
            </tr>
        </tbody>
    </table>
</body>
</html>
