<?php
$conn = mysqli_connect("127.0.0.1", "root", "", "pengguna") or die("Koneksi ke DB gagal!");

$id = "";
if ($_GET) {
    $id = $_GET["id"];
    $sql = "DELETE FROM userlist WHERE id ='$id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "Data Berhasil Dihapus";
        echo '<br>';
        echo '<a href="index.php"> Kembali</a>';
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>
