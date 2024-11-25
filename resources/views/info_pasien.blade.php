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
            <?php
            // Koneksi ke database
            $host = "localhost";
            $user = "root";
            $password = "";
            $database = "ibda_family_clinic";

            // Membuat koneksi
            $conn = new mysqli($host, $user, $password, $database);

            // Cek koneksi
            if ($conn->connect_error) {
                die("Koneksi gagal: " . $conn->connect_error);
            }

            // Query untuk mengambil data pasien
            $sql = "SELECT * FROM pasien";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data per baris
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>" . $row['PasienID'] . "</td>
                        <td>" . $row['NamaPasien'] . "</td>
                        <td>" . $row['UmurPasien'] . "</td>
                        <td>" . $row['AlamatPasien'] . "</td>
                        <td>" . $row['BeratBadanPasien'] . " kg</td>
                        <td>" . $row['TinggiBadanPasien'] . " cm</td>
                        <td>" . $row['JenisKelamin'] . "</td>
                        <td>" . $row['NomorHP'] . "</td>
                        <td class='action-buttons'>
                            <a href='edit_pasien.php?id=" . $row['PasienID'] . "' class='btn btn-edit'>Edit</a>
                            <a href='delete_pasien.php?id=" . $row['PasienID'] . "' class='btn btn-delete' onclick='return confirm(\"Apakah Anda yakin ingin menghapus pasien ini?\")'>Delete</a>
                        </td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='8'>Tidak ada data</td></tr>";
            }

            // Tutup koneksi
            $conn->close();
            ?>
        </tbody>
    </table>
</body>
</html>
