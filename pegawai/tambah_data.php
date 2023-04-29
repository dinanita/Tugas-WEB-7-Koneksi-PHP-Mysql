<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h2>Tambah Data Pegawai</h2>
<form action="" method="post">
	<table >
		<tr>
			<td width="100">NIP</td>
			<td><input type="text" name="nip"></td>
		</tr>
		<tr>
			<td>Nama</td>
			<td><input type="text" name="nama" size="30"></td>
		</tr>
		<tr>
			<td>Jabatan</td>
			<td><select name="id_jabatan">
				<option>----</option>
				<?php 
					include "koneksi.php";
					$query = mysqli_query($conn, "SELECT * FROM jabatan") or die(mysqli_error($conn));
					while ($data = mysqli_fetch_array($query)) {
						echo "<option value=$data[id_jabatan]> $data[jabatan]</option>";
					}
				 ?>
			</select></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" value="simpan" name="proses"></td>
		</tr>
	</table>
</form>
</body>

<?php 
	if (isset($_POST['proses'])) {
		mysqli_query($conn,"insert into pegawai set 
			nip = '$_POST[nip]',
			nama = '$_POST[nama]',
			id_jabatan = '$_POST[id_jabatan]'") or die(mysqli_error($conn));

		echo "<script>alert('Data telah tersimpan')</script>";
	}
 ?>
</html>