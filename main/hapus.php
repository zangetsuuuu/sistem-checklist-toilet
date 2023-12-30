<?php include_once "config/koneksi.php";

if (isset($_GET['id'])) {

    if (isset($_GET['checklist'])) {
        $result = mysqli_query($conn, "DELETE FROM checklist WHERE id = '$_GET[id]' ");
        
        if ($result) {
            echo "<script>alert('Data berhasil dihapus!')</script>";
            echo "<script>window.location.href='home.php';</script>";
        } else {
            echo "<script>alert('Data gagal dihapus!');</script>";
            echo "<script>window.location.href='home.php';</script>";
        }  
    }

    elseif (isset($_GET['toilet'])) {
        $result = mysqli_query($conn, "DELETE FROM toilet WHERE id = '$_GET[id]' ");
        
        if ($result) {
            echo "<script>alert('Data berhasil dihapus!')</script>";
            echo "<script>window.location.href='data_toilet.php';</script>";
        } else {
            echo "<script>alert('Data gagal dihapus!');</script>";
            echo "<script>window.location.href='data_toilet.php';</script>";
        }  
    }
}

$conn->close();
?>