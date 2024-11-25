<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informasi Karyawan</title>
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
    <h1>Informasi Karyawan</h1>
    <hr>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Nomor Hp</th>
                <th>Alamat</th>
                <th>Jenis Kelamin</th>
                <th>Action</th>
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
            $sql = "SELECT * FROM karyawan";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data per baris
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>" . $row['KaryawanID'] . "</td>
                        <td>" . $row['NamaKaryawan'] . "</td>
                        <td>" . $row['Jabatan'] . "</td>
                        <td>" . $row['NomorHP'] . "</td>
                        <td>" . $row['Alamat'] . "</td>
                        <td>" . $row['Gender'] . "</td>
                        <td class='action-buttons'>
                            <a href='edit_pasien.php?id=" . $row['PasienID'] . "' class='btn btn-edit'>Edit</a>
                            <a href='delete_pasien.php?id=" . $row['PasienID'] . "' class='btn btn-delete' onclick='return confirm(\"Apakah Anda yakin ingin menghapus pasien ini?\")'>Delete</a>
                        </td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='6'>Tidak ada data</td></tr>";
            }

            // Tutup koneksi
            $conn->close();
            ?>
        </tbody>
    </table>
</body>
</html>
