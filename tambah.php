<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $koneksi = new mysqli("localhost", "root", "", "db_ti2b");
    if ($koneksi->connect_error) {
        die("Koneksi gagal: " . $koneksi->connect_error);
    }

    $nama = $koneksi->real_escape_string($_POST["nama_kegiatan"]);
    $waktu = $_POST["waktu_kegiatan"];

    $query = "INSERT INTO db_ilham (nama_kegiatan, waktu_kegiatan) VALUES ('$nama', '$waktu')";
    if ($koneksi->query($query) === TRUE) {
        echo "<div class='message success'>Data berhasil ditambahkan. <a href='index.php' class='button'>Kembali ke daftar</a></div>";
    } else {
        echo "<div class='message error'>Gagal menambahkan data: " . $koneksi->error . "</div>";
    }

    $koneksi->close();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Portofolio</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        <style>
    /* Global Styles */
    body {
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        margin: 0;
        padding: 20px;
        color: #333;
    }

    /* Form Container */
    .add-container {
        background: white;
        padding: 2.5rem;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 500px;
        animation: fadeIn 0.5s ease-in-out;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* Form Header */
    h2 {
        text-align: center;
        color: #2c3e50;
        margin-bottom: 1.5rem;
        font-size: 1.8rem;
        position: relative;
        padding-bottom: 10px;
    }

    h2::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 3px;
        background: linear-gradient(to right, #3498db, #9b59b6);
    }

    /* Form Elements */
    label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: 500;
        color: #2c3e50;
        font-size: 0.95rem;
    }

    input[type="text"],
    input[type="date"] {
        width: 100%;
        padding: 12px 15px;
        margin-bottom: 1.5rem;
        border: 2px solid #e0e0e0;
        border-radius: 8px;
        font-size: 0.95rem;
        transition: all 0.3s ease;
        box-sizing: border-box;
    }

    input[type="text"]:focus,
    input[type="date"]:focus {
        border-color: #3498db;
        box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.2);
        outline: none;
    }

    /* Message Styles */
    .message {
        padding: 12px;
        border-radius: 8px;
        margin-bottom: 1.5rem;
        font-weight: 500;
        text-align: center;
    }

    .success {
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }

    .error {
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }

    /* Buttons */
    .button-group {
        display: flex;
        justify-content: space-between;
        margin-top: 1.5rem;
    }

    input[type="submit"],
    button,
    a.button {
        padding: 12px 25px;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        font-size: 0.95rem;
        text-decoration: none;
        display: inline-block;
        text-align: center;
    }

    input[type="submit"] {
        background: linear-gradient(to right, #3498db, #9b59b6);
        color: white;
        flex: 1;
        margin-right: 10px;
    }

    input[type="submit"]:hover {
        background: linear-gradient(to right, #2980b9, #8e44ad);
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    button,
    a.button {
        background: #f1f1f1;
        color: #333;
    }

    button:hover,
    a.button:hover {
        background: #e0e0e0;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    /* Responsive Design */
    @media (max-width: 600px) {
        .add-container {
            padding: 1.5rem;
        }
        
        .button-group {
            flex-direction: column;
        }
        
        input[type="submit"],
        button,
        a.button {
            width: 100%;
            margin-bottom: 10px;
        }
        
        input[type="submit"] {
            margin-right: 0;
        }
    }
</style>
    </style>
</head>
<body>
    <div class="add-container">
        <h2>Tambah Portofolio Baru</h2>
        <form method="post" action="">
            <label>Nama Kegiatan:</label>
            <input type="text" name="nama_kegiatan" required>
            
            <label>Waktu Kegiatan:</label>
            <input type="date" name="waktu_kegiatan" required>
            
            <div class="button-group">
                <input type="submit" value="Simpan">
                <button type="reset">Reset</button>
            </div>
        </form>
    </div>
</body>
</html>