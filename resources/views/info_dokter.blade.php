<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informasi Dokter</title>
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
    <h1>Informasi Dokter</h1>
    <hr>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Departemen</th>
                <th>Alamat</th>
                <th>Nomor HP</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><!-- DokterID --></td>
                <td><!-- NamaDokter --></td>
                <td><!-- Departemen --></td>
                <td><!-- AlamatDokter --></td>
                <td><!-- NomorHP --></td>
                <td class='action-buttons'>
                    <a href='edit_dokter.php?id=<!-- DokterID -->' class='btn btn-edit'>Edit</a>
                    <a href='delete_dokter.php?id=<!-- DokterID -->' class='btn btn-delete' onclick='return confirm("Apakah Anda yakin ingin menghapus dokter ini?")'>Delete</a>
                </td>
        </tbody>
    </table>
</body>
</html>