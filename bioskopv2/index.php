<?php
		session_start();
		if(empty($_SESSION['login'])){ header("location:login.php"); }
?>
<?php include "header.php"; ?>
<?php 
$s = mysqli_fetch_array(mysqli_query($bd, "select * from user where id='$_SESSION[login]'"));
?>
<style>
body {
    background: url(images/bioskop.jpg) no-repeat center;
    background-size: cover;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    -ms-background-size: cover;
    background-attachment: fixed;
    
}
</style>
    <h4 class="text-center" style="color:white">Login sebagai : <?= $s['nama'] ?> <a href="logout.php" class="btn btn-danger">Logout</a></h4>
    <h2 class="text-center" style="color:white">Jadwal Film Bioskop</h2>
    <div class="container" style="max-width:700px;">
	<div class="panel panel-primary">
	  <div class="panel-heading">Tiket Film</div>
	  <div class="panel-body">
		<table class="table table-hover"> 
			<thead> 
				<tr> 
					<th>No</th> 
					<th>Judul Film</th>
					<th>Studio</th>
					<th>Jam Tayang</th>
					<th>Sisa Tiket</th>
					<th>Beli Tiket</th>
				</tr> 
			</thead> 
			<tbody> 
			<?php
			$no=1;
			$result = mysqli_query($bd, "SELECT jadwal.id_jadwal,jadwal.id_film,jadwal.id_studio,jadwal.tiket_tersedia,jadwal.id_jam_tayang,film.id_film,film.judul_film FROM jadwal,film WHERE jadwal.id_film=film.id_film");
						while($row = mysqli_fetch_array($result))
							{
			?>
				<tr> 
					<th scope="row"><?= $no++; ?></th> 
					<td><?= $row['judul_film']; ?></td>  
					<td><?= $row['id_studio']; ?></td>  
					<td><?= $row['id_jam_tayang']; ?></td>  
					<td><?= $row['tiket_tersedia']; ?></td>  
					<td><a href="pesan_tiket.php?id=<?= $row['id_jadwal']; ?>" class="btn btn-success">Beli Tiket</a></td>  
				</tr> 
							<?php } ?>
			</tbody> 
		</table>
	  </div>
	</div>
	<?php 
						
 
						?>
               
    </div> 
	<?php include "footer.php"; ?>