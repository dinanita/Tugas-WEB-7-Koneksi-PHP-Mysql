<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
 <h2>Update Data Pegawai</h2>

 <?php 
  include "koneksi.php";
  $sql=mysqli_query($conn, "SELECT * FROM pegawai, jabatan where 
  	pegawai.id_jabatan=jabatan.id_jabatan and id_pegawai='$_GET[update]'");
  $data=mysqli_fetch_array($sql);
  ?>

  <form action="" method="post">
  <table>
  	<tr>
  		<td width="100">NIP</td>
  		<td><input type="text" name="nip" value="<?php echo $data['nip']; ?>"></td>
  	</tr>
  	<tr>
  		<td width="100">Nama</td>
  		<td><input type="text" name="nama" value="<?php echo $data['nama']; ?>"></td>
  	</tr>
  	<tr>
  		<td width="100">Jabatan</td>
  		<td><select name="id_jabatan">
  			<?php 
  				echo "<option value=$data[id_jabatan]>$data[jabatan]</option>";
  				$query = mysqli_query($conn, "SELECT *FROM jabatan") or die(mysqli_error($conn));
  				while ($data = mysqli_fetch_array($query)) {
  					echo "<option value=$data[id_jabatan]> $data[jabatan]</option>";
  				}
  			 ?>
  		</select></td>
  	</tr>
  	<tr>
  		<td></td>
  		<td><input type="submit" value="Simpan" name="proses"></td>
  	</tr>
  </table>
  </form>
</body>

<?php 
if (isset($_POST['proses'])) {
	mysqli_query($conn, "update pegawai set 
		nip = '$_POST[nip]',
		nama = '$_POST[nama]',
		id_jabatan = '$_POST[id_jabatan]' where id_pegawai =$_GET[update]") or die(mysqli_error($conn)) ;

	echo "<script>alert('Data telah diubah');
	document.location='data_pegawai.php'</script>";
}
 ?>
</html>