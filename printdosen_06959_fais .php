<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Data Dosen</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }

        .container {
            width: 80%;
            margin: auto;
            padding: 20px;
            background: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            padding-top: 20px;
        }

        .header img {
            width: 175px;
            height: auto;
            margin-right: 20px;
        }

        .header h1 {
            font-size: 40px;
            color: #333;
            margin: 0;
        }

        .header h2 {
            font-size: 15px;
            color: #555;
            margin: 5px 0 0;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        table th, table td {
            border: 1px solid #000;
            padding: 8px;
        }

        table th {
            background-color: #d3d3d3;
            color: #000;
            text-align: center;
            font-size: 14px;
        }

        table td {
            text-align: left;
            font-size: 13px;
        }

        table td:nth-child(1), table td:nth-child(2), table td:nth-child(5) {
            text-align: center;
        }

        table tr:nth-child(even) {
            background-color: #f8f9fa;
        }

        table tr:hover {
            background-color: #e9ecef;
        }

        table img {
            width: 30px;
            height: 30px;
            object-fit: cover;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 10px;
            color: #555;
            position: relative;
        }

        .footer .date {
            position: fixed;
            bottom: 10px;
            left: 20px;
            font-size: 10px;
            color: #555;
        }

        .text-center {
            text-align: center;
            margin-top: 20px;
        }

        .text-center a {
            background-color: #6c757d;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 14px;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .text-center a:hover {
            background-color: #5a6268;
            transform: scale(1.05);
        }

        /* Print-specific styles */
        @media print {
            body {
                background-color: white;
                margin: 0;
                padding: 0;
            }

            .container {
                box-shadow: none;
                width: 100%;
                margin: 0;
                padding: 0;
            }

            .header img {
                width: 150px;
            }

            table th, table td {
                font-size: 14px;
                padding: 8px;
            }

            .text-center {
                display: none;
            }

            .footer {
                position: absolute;
                bottom: 0;
                width: 100%;
                text-align: center;
                padding: 10px 0;
                font-size: 12px;
                color: #555;
            }

            .footer .date {
                display: block;
                font-size: 10px;
                margin-top: 5px;
            }

            @page {
                margin: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="logo_dinus.png" alt="Logo">
            <div>
                <h1>Data Dosen</h1>
                <h2>Sistem Informasi - Fakultas Ilmu Komputer - Universitas Dian Nuswantoro</h2>
                <h2>Tahun Akademik 2024 - 2025</h2>
            </div>
        </div>

        <table>
            <tr>
                <th>No</th>
                <th>NPP</th>
                <th>Nama Dosen</th>
                <th>Homebase</th>
            </tr>
            <?php 
            // koneksi database
            $koneksi = mysqli_connect("localhost", "root", "", "uas_pwl_06959");
            if (!$koneksi) {
                die("Connection failed: " . mysqli_connect_error());
            }

            // Fetch data from dosen table
            $data = mysqli_query($koneksi, "SELECT * FROM dosen");
            $no = 1;

            // Display data in table rows
            while($d = mysqli_fetch_array($data)) {
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $d['npp']; ?></td>
                <td><?php echo $d['namadosen']; ?></td>
                <td><?php echo $d['homebase']; ?></td>
            </tr>
            <?php 
            }
            mysqli_close($koneksi);
            ?>
        </table>

        <div class="text-center">
            <a href="#" onclick="window.print();">Print</a>
        </div>

        <div class="footer">
            <div class="date">
                Dicetak pada: <?php echo date("d-m-Y H:i:s"); ?>
            </div>
            <p>Copyright &copy; <?php echo date("Y"); ?> | A12.2022.06959 | Muhammad Fais Ramadhani</p>
        </div>
    </div>
</body>
</html>
