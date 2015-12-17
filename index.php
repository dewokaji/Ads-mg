<?php 
include "koneksi.php"; 
$sql = "select * FROM simpan";
$tampil = mysql_query($sql);
while ($data = mysql_fetch_array($tampil)){
// Tampilkan Gambar
echo "<img src='gambar/".$data['gambar']."' width='100px' height='100px'/>";
echo "</br>";
echo $data['keterangan'];
}
?>

<form method="post" enctype="multipart/form-data">
<td colspan="4">Upload Gambar (Ukuran Maks = 1 MB) : <input type="file" name="gambar" required /> | Keterangan : <input type="text" name="keterangan"  /> | 
<input type="submit" value="Upload" name="save"></td>
</form>

<?php

 if (isset($_POST['save'])){
	$fileName = $_FILES['gambar']['name'];
		// Simpan ke Database
		$sql = "insert into simpan (gambar, keterangan) values ('$fileName', '".$_POST['keterangan']."')";
		mysql_query($sql);
		// Simpan di Folder Gambar
		move_uploaded_file($_FILES['gambar']['tmp_name'], "gambar/".$_FILES['gambar']['name']);
		echo"<script>alert('Gambar Berhasil diupload !');history.go(-1);</script>";	
	} 
?>

