<?php 
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "db_buku_tamu";

 //membuat koneksi
  $conn = mysqli_connect($servername, $username, $password, $dbname);

 //memeriksa koneksi
 if (!$conn) {
 	die("koneksi gagal: " . mysqli_connect_error());
 }

 //membuat tabel
 $sql = "CREATE TABLE buku_tamu(
 	ID_BT INT(10) AUTO_INCREMENT PRIMARY KEY,
 	NAMA VARCHAR(200) NOT NULL,
 	EMAIL VARCHAR(50) NOT NULL,
 	ISI TEXT NOT NULL
 	)";

	if (mysqli_query($conn, $sql)) {
		echo "Table berhasil dibuat";
	}else{
		echo "error creating table: " . mysqli_error($conn);
	}

	$sql = "INSERT INTO buku_tamu (ID_BT, NAMA, EMAIL, ISI)
	VALUES ('01','Bima','bima@gmail.com','hai saya Bima')";
	if (mysqli_query($conn, $sql)) {
		echo "New record create successfully";
	}else{
		echo "Error:" . $sql . "<br>" . mysqli_error($conn);
	}
	//penutup koneksi
	mysqli_close($conn);
 ?>