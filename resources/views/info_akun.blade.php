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
    <h1>Informasi Akun</h1>
    <hr>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Password</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Koneksi ke database
            $host = "localhost";  // ganti dengan host database Anda jika perlu
            $user = "root";       // ganti dengan username database Anda
            $password = "";       // ganti dengan password database Anda
            $database = "ibda_family_clinic"; // ganti dengan nama database Anda

            // Membuat koneksi
            $conn = new mysqli($host, $user, $password, $database);

            // Cek koneksi
            if ($conn->connect_error) {
                die("Koneksi gagal: " . $conn->connect_error);
            }

            // Query untuk mengambil data dokter
            $sql = "SELECT * FROM account";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data per baris
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>" . $row['AccountID'] . "</td>
                        <td>" . $row['Name'] . "</td>
                        <td>******</td>
                        <td>" . $row['Role'] . "</td>
                        <td class='action-buttons'>
                            <a href='edit_dokter.php?id=" . $row['DokterID'] . "' class='btn btn-edit'>Edit</a>
                            <a href='delete_dokter.php?id=" . $row['DokterID'] . "' class='btn btn-delete' onclick='return confirm(\"Apakah Anda yakin ingin menghapus dokter ini?\")'>Delete</a>
                        </td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='4'>Tidak ada data</td></tr>";
            }

            // Tutup koneksi
            $conn->close();
            ?>
        </tbody>
    </table>
</body>
</html>