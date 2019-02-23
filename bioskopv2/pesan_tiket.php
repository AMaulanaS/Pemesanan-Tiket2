<?php
		session_start();
		if(empty($_SESSION['login'])){ header("location:login.php"); }
?>
<?php include "header.php"; ?>
<?php 
	if(!empty($_POST)){
		extract($_POST);
		echo $tiket_pesan;
		$jadwale = mysqli_query($bd, "select * from jadwal where id_jadwal='$id_jadwal'")or die(mysqli_error());
		$jadwale = mysqli_fetch_array($jadwale);
		if($jadwale['tiket_tersedia']>$tiket_pesan){
			$sisa = $jadwale['tiket_tersedia']-$tiket_pesan;
			$kurangi_kursi = mysqli_query($bd, "update jadwal set tiket_tersedia='$sisa' where id_jadwal='$id_jadwal'")or die(mysqli_error());
			
			
			$insert_tiket = mysqli_query($bd, "INSERT INTO `tiket` VALUES('NULL','$id_jadwal','".date('Y-m-d')."','$tiket_pesan')")or die(mysqli_error());
			if($insert_tiket){
				
			$last_id = mysqli_insert_id($bd);
				 header('location:cetak_tiket.php?id='.$last_id);
			}
			else{
				echo"<div class='alert alert-danger'>Kuota tidak mencukupi</div>";
			}
		}
	}
?>
<?php if(empty($_GET['id'])){ header('location:index.php'); } ?>
<?php

// $id = $_GET['id'];
	$jadwal = mysqli_query($bd, "select * from jadwal where id_jadwal='$_GET[id]'")or die(mysqli_error());
	$jadwal = mysqli_fetch_array($jadwal);
	$film = mysqli_query($bd, "select * from film where id_film='$jadwal[id_film]'")or die(mysqli_error());
	$film = mysqli_fetch_array($film);
?><?php 
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
    <h3 class="text-center" style="color:white">Form Pesan Tiket Bioskop</h3>
    <div class="container" style="max-width:600px;">
	<div class="panel panel-primary">
	  <div class="panel-heading">Form Tiket</div>
	  <div class="panel-body">
	  <form action="pesan_tiket.php?id=<?= $_GET['id'] ?>" method="post"> 
	  <input type="hidden" name="id_jadwal" value="<?= $_GET['id'] ?>">
	  <input type="hidden" name="id_film" value="<?= $film['id_film'] ?>">
		<table class="table table-borderless"> 
			 
			<tbody> 
			 
				<tr> 
					<td>Film</td>  
					<td>:</td>  
					<td><?= $film['judul_film'] ?></td>  
				</tr>   
				<tr> 
					<td>Studio</td>  
					<td>:</td>  
					<td><?= $jadwal['id_studio'] ?></td>  
				</tr>   
				<tr> 
					<td>Jam Tayang</td>  
					<td>:</td>  
					<td><?= $jadwal['id_jam_tayang'] ?></td>  
				</tr>   
				<tr> 
					<td>Jumlah Kursi Tersedia</td>  
					<td>:</td>  
					<td><?= $jadwal['tiket_tersedia'] ?></td>  
				</tr>
				<tr> 
					<th>Jumlah Tiket yg Dipesan</th>  
					<td>:</td>  
					<td>
					
					 <select name="tiket_pesan" class="form-control">
					 <?php for($tik=1; $tik<=50; $tik++){ ?>
					 <option value="<?= $tik ?>"><?= $tik ?></option>
					 <?php } ?>
					</select>
					</td>  
				</tr>		
				<tr> 
					 
					<td colspan="3" class="text-center">
					<a href="index.php" class="btn btn-warning">&laquo;Back</a>
					<input type="submit" value="Simpan Pesanan" class="btn btn-success">
					</td>  
					 
				</tr>				
			</tbody> 
		</table>
		</form>
	  </div>
	</div>
	<?php 
						
 
						?>
               
    </div> 
	<?php include "footer.php"; ?>