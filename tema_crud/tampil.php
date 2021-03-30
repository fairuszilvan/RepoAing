<?php
//memasukkan file config.php
include('config.php');
?>


	<div class="container" style="margin-top:20px">
	<a>Data Mahasiswa</a>
	<button class="bi bi-plus" href="index.php?page=tambah_mhs"></button>
	<a href="#" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
    <img src="assets/images/image.jpg" alt="">Fauzan Hilmi</a>
		<div class="table-responsive">
		<table class="table table-striped jambo_table bulk_action">
			<tbody>
				<?php
				//query ke database SELECT tabel mahasiswa urut berdasarkan id yang paling besar
				$sql = mysqli_query($koneksi, "SELECT * FROM mahasiswa ORDER BY Nim DESC") or die(mysqli_error($koneksi));
				//jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
				if(mysqli_num_rows($sql) > 0){
					//membuat variabel $no untuk menyimpan nomor urut
					$no = 1;
					//melakukan perulangan while dengan dari dari query $sql
					while($data = mysqli_fetch_assoc($sql)){
						//menampilkan data perulangan
						echo '
						<tr>
						<td>
						<div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
  <label class="form-check-label" for="flexCheckChecked">
    Checked checkbox
  </label>
</div>
						</td>
							<td>'.$data['Nim'].'</td>
							<td>'.$data['Nama_Mhs'].'</td>
							<td>'.$data['Jenis_Kelamin'].'</td>
							<td>'.$data['Program_Studi'].'</td>
							<td>
								<a href="delete.php?Nim='.$data['Nim'].'" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Revision</a>
							</td>
							<td>
							<a href="index.php?page=edit_mhs&Nim='.$data['Nim'].'" class="btn btn-secondary btn-sm">Choose</a>
							</td>
						</tr>
						';
						$no++;
					}
				//jika query menghasilkan nilai 0
				}else{
					echo '
					<tr>
						<td colspan="6">Tidak ada data.</td>
					</tr>
					';
				}
				?>
			<tbody>
		</table>
	</div>
	</div>
