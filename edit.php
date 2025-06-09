<?php
// Koneksi database
$koneksi = new mysqli("localhost", "root", "", "db_ti2b");
if ($koneksi->connect_error) {
  die("Koneksi gagal: " . $koneksi->connect_error);
}

// Ambil data yang akan diedit
$id = $_GET['id'];
$query = "SELECT * FROM db_ilham WHERE id_portofolio = $id";
$result = $koneksi->query($query);
$data = $result->fetch_assoc();

// Proses update data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nama = $koneksi->real_escape_string($_POST["nama_kegiatan"]);
  $waktu = $_POST["waktu_kegiatan"];
  
  $update_query = "UPDATE db_ilham SET nama_kegiatan='$nama', waktu_kegiatan='$waktu' WHERE id_portofolio=$id";
  if ($koneksi->query($update_query)) {
    header("Location: index.php#Portofolio");
    exit();
  } else {
    echo "Error updating record: " . $koneksi->error;
  }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Portofolio</title>
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
    .edit-container {
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

    /* Buttons */
    .button-group {
        display: flex;
        justify-content: space-between;
        margin-top: 1.5rem;
    }

    input[type="submit"],
    button {
        padding: 12px 25px;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        font-size: 0.95rem;
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

    button {
        background: #f1f1f1;
        color: #333;
    }

    button:hover {
        background: #e0e0e0;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    /* Responsive Design */
    @media (max-width: 600px) {
        .edit-container {
            padding: 1.5rem;
        }
        
        .button-group {
            flex-direction: column;
        }
        
        input[type="submit"],
        button {
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
    <div class="edit-container">
        <h2>Edit Portofolio</h2>
        <form method="post" action="">
            <label>Nama Kegiatan:</label>
            <input type="text" name="nama_kegiatan" value="<?php echo htmlspecialchars($data['nama_kegiatan']); ?>" required>
            
            <label>Waktu Kegiatan:</label>
            <input type="date" name="waktu_kegiatan" value="<?php echo $data['waktu_kegiatan']; ?>" required>
            
            <div class="button-group">
                <input type="submit" value="Update">
                <a href="index.php#Portofolio"><button type="button">Batal</button></a>
            </div>
        </form>
    </div>
</body>
</html>

<?php $koneksi->close(); ?>