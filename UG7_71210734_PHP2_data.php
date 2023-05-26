<!-- form tambah edit pengguna -->
<?php
$conn = mysqli_connect("127.0.0.1", "root", "", "pengguna") or die("Koneksi ke DB gagal!");
$id = "";
if($_GET){
    $id = $_GET["id"];
    $sql = "SELECT * FROM userlist WHERE id =$id";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);}
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi dan Edit Pengguna</title>

</head>
<body>
    <a href="index.php">
        Kembali</a>
    <h1>Registrasi dan Edit Pengguna</h1>
    <form action="data.php" method="post">
        <table >
            <?php if($id != ""){
                ?>
                <input type="hidden" name="id" value="<?php if($id != ""){echo $id;} else{echo "";} ?>">
                <?php
            }
            ?>
            <tr>
                <td>Nama Depan</td>
                <td>

                    <input type="text" name="nama_depan" value="<?php if($id != ""){echo $row["nama_depan"];} ?>"></td>
            </tr>
            <tr>
                <td>Nama Belakang</td>
                <td><input type="text" name="nama_belakang" value="<?php if($id != ""){echo $row["nama_belakang"];} ?>"></td>
            </tr>

            <tr>
                <td>Jenis Kelamin</td>
                <td>
                    <input type="radio" id="laki-laki" name="kelamin" value="laki-laki"
                    <?php if($id != ""){echo ("laki-laki")?'checked':'';}?>


                    >
                    <label for="laki-laki">Laki-laki</label><br>
                    
                    <input type="radio" id="perempuan" name="kelamin" value="perempuan"
                    <?php if($id != ""){echo ("Perempuan")?'checked':'';}?>>
                    <label for="perempuan">Perempuan</label><br>
                </td>
            </tr>


            <tr>
                <td>Tanggal Lahir</td>
                <td><input type="Date" name="tanggal_lahir" value="<?php if($id != ""){echo $row["tanggal_lahir"];} ?>"></td>
            </tr>

            <tr>
                <td>Hobi</td>

                <td>
                    <input type="checkbox" id="hobi1" name="hobi[]" value="Menyanyi">
                    <label for="hobi1">Menyanyi</label>

                    <input type="checkbox" id="hobi2" name="hobi[]" value="Menjahit">
                    <label for="hobi2">Menjahit</label>

                    <input type="checkbox" id="hobi3" name="hobi[]" value="Berenang">
                    <label for="hobi3">Berenang</label>

                </td>
            </tr>

            <tr>
                <td>Email</td>
                <td><input type="email" name="email" value="<?php if($id != ""){echo $row["email"];} ?>"></td>
            </tr>
            <tr>
    <td>Alamat</td>
    <td><textarea name="alamat" id="alamat" cols="30" rows="10"><?php if($id != ""){echo $row["alamat"];} ?></textarea></td>
</tr>


            <tr>
                <td>Password</td>
                <td><input type="Password" name="pass"></td>
            </tr>

            <tr>
                <td>Confirmation Password</td>
                <td><input type="Password" name="conf_pass"></td>
            </tr>


            <tr>

                <td><input type="submit" name="Submit" value="Simpan" ></td>
                <td><input type="reset" name="Reset" value="Reset"></td>

            </tr>
        </table>
    </form>







    <?php
    if($_POST){
        if($_POST["conf_pass"] == $_POST["pass"]){
            $nama_depan = $_POST["nama_depan"];
            $nama_belakang = $_POST["nama_belakang"];
            if($_POST["kelamin"] == "laki-laki"){
                $jen_kelamin = "Laki-laki";
            }
            else {
                $jen_kelamin = "Perempuan";
            }

            $tgl_lahir = $_POST["tanggal_lahir"];


            $cbox1 = $_POST["hobi"];
            $hobi = "";
            foreach($cbox1 as $chk)
            {
                $hobi .= $chk.",";
            }
            $email = $_POST["email"];
            $alamat = $_POST["alamat"];
            $password = $_POST["pass"];

            $sql = "INSERT INTO userlist (nama_depan,nama_belakang,jenis_kelamin,tanggal_lahir,hobi,email,alamat,pass)VALUES ('$nama_depan','$nama_belakang','$jen_kelamin','$tgl_lahir','$hobi','$email','$alamat','$password')";
            if (mysqli_query($conn, $sql)) 
                { echo "Berhasil mengisi data." ;
        } else {
            echo "Gagal mengisi data.";
        }
    }
    else {
        echo "Password tidak sesuai!";
    }
}
?>


</body>
</html>