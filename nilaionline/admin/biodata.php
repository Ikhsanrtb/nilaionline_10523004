<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biodata - IKHSAN RIZKY TUBAGUS</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background: #1c396f;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            animation: fadeIn 1s ease-in-out;
        }

        .biodata {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(15px);
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
            text-align: center;
            max-width: 400px;
            width: 90%;
            position: relative;
            overflow: hidden;
            border: 2px solid rgba(255, 255, 255, 0.3);
            transition: 0.3s;
        }

        .biodata:hover {
            transform: scale(1.05);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.4);
        }

        .biodata::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.15), transparent);
            transform: rotate(30deg);
            z-index: -1;
        }

        .biodata img {
            width: 130px;
            height: 130px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 15px;
            border: 4px solid white;
            transition: 0.3s;
        }

        .biodata img:hover {
            transform: rotate(5deg) scale(1.1);
        }

        .biodata h2 {
            color: white;
            margin-bottom: 15px;
            font-weight: 600;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);
        }

        .biodata div {
            list-style: none;
            padding: 0;
            text-align: left;
            color: white;
            font-size: 16px;
        }

        .biodata div {
            padding: 12px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.3);
            display: flex;
            justify-content: space-between;
            transition: 0.3s;
            font-weight: 400;
        }

        .biodata li:last-child {
            border-bottom: none;
        }

        .biodata li:hover {
            background: rgba(255, 255, 255, 0.2);
            border-left: 4px solid white;
            padding-left: 15px;
        }

        .back-button a {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 30px;
            background: linear-gradient(45deg, #ff416c, #ff4b2b);
            color: white;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: 0.3s ease-in-out;
            box-shadow: 0 5px 15px rgba(255, 75, 43, 0.5);
        }

        .back-button a:hover {

            background: linear-gradient(45deg, #ff4b2b, #ff416c);
            transform: scale(1.1);
        }

        .biodata-info {
        display: flex;
        justify-content: space-between; /* Membuat label dan isi sejajar */
        align-items: center;
        margin-bottom: 10px;
        }

        .biodata-info strong {
        flex: 1; /* Biar label rata kiri */
        text-align: left;
        }

        .biodata-info span {
         flex: 2; /* Biar isi lebih panjang */
         text-align: right;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>
    <div class="biodata">
        <img src="Ikhsan.jpg" alt="Foto Ikhsan Rizky Tubagus">
        <h2>IKHSAN RIZKY TUBAGUS</h2>
        <div class="biodata-info">
    <strong>Alamat:</strong> <span>KOMP. TNI AU BLOK AIR TAWAR NO 11, KOTA PADANG</span>
</div>
<div class="biodata-info">
    <strong>Tanggal Lahir:</strong> <span>31 MARET 2001, KOTA PADANG</span>
</div>
<div class="biodata-info">
    <strong>Hobi:</strong> <span>SILAT</span>
</div>
        <div class="back-button">
            <a href="./?adm=mahasiswa">Kembali</a>
        </div>
    </div>
</body>
</html>
