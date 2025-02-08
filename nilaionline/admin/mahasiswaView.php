<?php
include "../koneksi/koneksi.php";

$queryMhs = "SELECT * FROM mahasiswa";
$resultMhs = mysqli_query($koneksi, $queryMhs);
$countMhs = mysqli_num_rows($resultMhs);
?>

<div class="container">
    <center>
        <img src="User.png" alt="Logo Mahasiswa" class="logo">
        <h2>📜 DATA MAHASISWA</h2>
        <a href="mahasiswaAdd.php" class="btn-add">➕ TAMBAH DATA MAHASISWA</a>
    </center>

    <table>
        <thead>
            <tr>
                <th>NIM</th>
                <th>NAMA</th>
                <th>JENIS KELAMIN</th>
                <th>JURUSAN</th>
                <th>AKSI</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($countMhs > 0) {
                while ($dataMhs = mysqli_fetch_assoc($resultMhs)) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($dataMhs['nim']) . "</td>";
                    echo "<td>" . htmlspecialchars($dataMhs['nama']) . "</td>";
                    echo "<td>" . htmlspecialchars($dataMhs['jk']) . "</td>";
                    echo "<td>" . htmlspecialchars($dataMhs['jur']) . "</td>";
                    echo "<td>
                            <a href='mahasiswaEdit.php?nim=" . $dataMhs['nim'] . "' class='btn-edit'>✏️ Edit</a> 
                            <a href='mahasiswaDelete.php?nim=" . $dataMhs['nim'] . "' class='btn-delete' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>🗑️ Delete</a>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6' class='no-data'>Belum ada Data Mahasiswa</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<style>
    .container {
        width: 90%;
        margin: auto;
        padding: 20px;
        background:  rgba(238, 230, 230, 0.81);
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    

    h2 {
        color: #333;
        margin-bottom: 5px;
    }

    .btn-add {
        display: inline-block;
        padding: 10px 15px;
        background: #28a745;
        color: white;
        border-radius: 5px;
        text-decoration: none;
        font-weight: bold;
        margin-bottom: 15px;
    }

    .btn-add:hover {
        background: #218838;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }

    th {
        background: #343a40;
        color: white;
        padding: 12px;
        text-align: center;
    }

    td {
        padding: 10px;
        color: black;
        border-bottom: 1px solid #ddd;
        text-align: center;
    }


    tr:hover {
        background:rgb(221, 221, 221);
    }

    .btn-edit, .btn-delete {
        display: inline-block;
        padding: 5px 10px;
        border-radius: 4px;
        font-size: 14px;
        text-decoration: none;
        margin: 3px;
    }

    .btn-edit {
        background: #ffc107;
        color: black;
    }

    .btn-edit:hover {
        background: #e0a800;
    }

    .btn-delete {
        background: #dc3545;
        color: white;
    }

    .btn-delete:hover {
        background: #c82333;
    }

    .no-data {
        text-align: center;
        font-weight: bold;
        color: #777;
        padding: 15px;
    }
</style>
