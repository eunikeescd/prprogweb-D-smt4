<!-- form liat data -->

<?php
$conn = mysqli_connect("127.0.0.1", "root", "", "pengguna") or die("Koneksi ke DB gagal!");


?>


<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Data Pengguna</title>
    <style>
        table,th,td{

            border-collapse: collapse;
            border: 1px solid black;
        }
        table {
            width: 70%;
        }


    </style>
</head>
<body>
	<h1>Data Pengguna</h1>
    <a href="data.php">TambahData</a>

    <table>
        <thead>
            <th>No</th>
            <th>Nama Depan</th>
            <th>Nama Belakang</th>
            <th>Jenis Kelamin</th>
            <th>Tanggal Lahir</th>
            <th>Hobi</th>
            <th>Email</th>
            <th>Alamat</th>            
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM userlist";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) > 0){
                $i = 1;
                while($row = mysqli_fetch_assoc($result)){
                    echo "<tr>";
                    echo "<td>".$i."</td>";
                    echo "<td>".$row["nama_depan"]."</td>";
                    echo "<td>".$row["nama_belakang"]."</td>";
                    echo "<td>".$row["jenis_kelamin"]."</td>";
                    echo "<td>".$row["tanggal_lahir"]."</td>";
                    echo "<td>".$row["hobi"]."</td>";
                    echo "<td>".$row["email"]."</td>";
                    echo "<td>".$row["alamat"]."</td>";

                    echo "<td>
                    <a href='data.php?id=".$row["id"]."'>Update
                    </a>&nbsp;
                    <a href='delete.php?id=".$row["id"]."'>Hapus</a></td>";
                    echo "</tr>";
                    $i++;
                }}         
            ?>
        </tbody>
    </table>

</body>
</html>