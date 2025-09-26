<?php
    include 'koneksi_06959_fais.php'; // Include connection

    // Function to clean input data
    function clean_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // Initialize error and message variables
    $error_npp = $error_namadosen = $message = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $npp = clean_input($_POST["npp"]);
        $namadosen = clean_input($_POST["namadosen"]);
        $homebase = clean_input($_POST["homebase"]);

        // Check if NPP already exists in the database
        $check_query = $koneksi->prepare("SELECT * FROM dosen WHERE npp = ?");
        $check_query->bind_param("s", $npp);
        $check_query->execute();
        $result = $check_query->get_result();

        if ($result->num_rows > 0) {
            $error_npp = "NPP already exists, please enter another one.";
        } else {
            // If no errors, insert data into the database
            if (empty($error_npp) && empty($error_namadosen)) {
                $insert_query = $koneksi->prepare("INSERT INTO dosen (npp, namadosen, homebase) VALUES (?, ?, ?)");
                $insert_query->bind_param("sss", $npp, $namadosen, $homebase);

                if ($insert_query->execute()) {
                    // Redirect to dosen dashboard if data inserted successfully
                    header("Location: dashboard_dosen_06959_fais.php");
                    exit(); // Stop script execution to ensure redirect happens
                } else {
                    $message = "Error: " . $koneksi->error;
                }

                // Close insert query after executing
                $insert_query->close();
            }
        }

        // Close check query
        $check_query->close();
    }

    // Close database connection
    $koneksi->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="jquery-3.7.1.min.js"></script>
    <title>Tambah Dosen</title>
    <style>
        /* Basic styles */
        *, *::before, *::after {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f0f4f8;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            width: 500px;
            background-color: rgba(255, 255, 255, 0.9);
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255, 255, 255, 0.1);
            text-align: center;
        }

        .form-container h2 {
            font-size: 32px;
            color: #1845ad;
            margin-bottom: 20px;
        }

        .form-container label {
            display: block;
            text-align: left;
            font-size: 16px;
            color: #333;
            margin-top: 20px;
        }

        .form-container input {
            width: 100%;
            padding: 15px;
            margin-top: 8px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ddd;
            font-size: 14px;
            background-color: rgba(255, 255, 255, 0.6);
            box-shadow: inset 0 4px 6px rgba(0, 0, 0, 0.05);
        }

        .form-container button {
            background-color: #1845ad;
            color: #fff;
            padding: 15px;
            width: 100%;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
            transition: background-color 0.3s ease;
        }

        .form-container button:hover {
            background-color: #23a2f6;
        }

        .form-container p {
            margin-top: 20px;
            font-size: 14px;
            color: #777;
        }

        .form-container a {
            color: #1845ad;
            text-decoration: none;
        }

        .form-container a:hover {
            text-decoration: underline;
        }

        .error {
            color: red;
            font-size: 12px;
        }

        .success {
            color: green;
            font-size: 14px;
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h2>Tambah Dosen</h2>
        <form method="post" action="">
            <label for="npp">NPP:</label>
            <input type="text" name="npp" id="npp" required value="0686." maxlength="16">
            <span class="error"><?php echo $error_npp; ?></span><br>

            <label for="namadosen">Nama Dosen:</label>
            <input type="text" name="namadosen" id="namadosen" required value="<?php echo isset($namadosen) ? $namadosen : ''; ?>"><br>

            <label for="homebase">Homebase:</label>
            <input type="text" name="homebase" id="homebase" value="<?php echo isset($homebase) ? $homebase : ''; ?>"><br>

            <button type="submit">Tambah</button>
        </form>
        <p class="success"><?php echo $message; ?></p>
    </div>

    <script>
        $(document).ready(function() {
            // Validate NPP format when it loses focus
            $('#npp').on('blur', function() {
                var npp = $(this).val();

                // Validate NPP in the database
                $.ajax({
                    url: 'cek_npp.php',
                    method: 'POST',
                    data: { npp: npp },
                    success: function(response) {
                        if (response == 'exists') {
                            alert("NPP already exists, please enter another one.");
                            $('#npp').focus();
                        }
                    }
                });
            });
        });
    </script>

</body>
</html>
