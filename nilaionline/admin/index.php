<?php
// Start session to check if the user is logged in
session_start();

// Check if the user is logged in, if not, redirect to the login page
if (!isset($_SESSION['admin'])) {
    header("Location: login.php"); // Redirect to login page if not logged in
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dasbor</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/nilaionline_10523004/images/logoicon.ico">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Droid+Sans:regular,bold" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Kreon:light,regular" rel="stylesheet">

    <!-- CSS Styles -->
    <link rel="stylesheet" type="text/css" href="../css/style-sheet.css">
    <link rel="stylesheet" type="text/css" href="../css/nivo-slider.css">
</head>

<body>
    <header>
        <section class="logo">
            <a href="#"><img src="../images/logo.png" alt="Logo"></a>
        </section>
        <section class="title">Aplikasi Nilai Online <br> <span>UNIVERSITAS KOMPUTER INDONESIA</span></section>
        <section class="clr"><center>Jl.Dipatiukur No 112 s/d 114 - Bandung</center></section>
    </header>

    <section id="navigator">
        <ul class="menus">
            <li><a href="./?adm=home">Home</a></li>
            <li><a href="./?adm=mahasiswa">Mahasiswa</a></li>
            <li><a href="./?adm=dosen">Dosen</a></li>
            <li><a href="./?adm=nilai">Nilai</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </section>

    <section id="container">
        <br><br><br>
        <?php
        if(empty($_GET)){
            include("home.php");
        } else {
            $adm = isset($_GET["adm"]) ? $_GET["adm"] : '';
            if ($adm == "home") {
                include("home.php");
            } elseif ($adm == "mahasiswa") {
                include("mahasiswaView.php");
            } elseif ($adm == "mahasiswaAdd") {
                include("mahasiswaAdd.php");
            } elseif ($adm == "nilai") {
                include("nilaiView.php");
            } elseif ($adm == "dosen") {
                include("dosenView.php");
            }
        }
        ?>
        <br><br><br><br><br><br>
        <section class="clr"></section>
    </section>

    <footer>
        <font color="#000">Copyright &copy; 2023 - Universitas Komputer Indonesia <br>
        Developed By <a href="biodata.php" target="_new" style="color: blue;">IkhsanRizkyTubagus</a></font>
    </footer>
</body>
</html>
