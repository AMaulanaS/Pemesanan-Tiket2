<?php
		session_start();
		if(!empty($_SESSION['login'])){ header("location:index.php"); }
?>
<?php include "header.php"; ?>
<?php 
	if(!empty($_POST)){
		extract($_POST);
		 $password = md5($password); 
		$s = mysqli_query($bd, "select * from user where username='$username' AND password='$password'")or die(mysqli_error());
		$s_num = mysqli_num_rows($s);
		 
		if($s_num>0){
		$s_arr = mysqli_fetch_array($s);
			
				$_SESSION['login'] = $s_arr['id'];
			 header('location:index.php');
		}
	}
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
<br>
<br>
<br>
    <h3 class="text-center" style="color:white">Pemesanan Tiket Bioskop</h3>
    <div class="container" style="max-width:300px;">
	<div class="panel panel-primary">
	  <div class="panel-heading">Silahkan Login</div>
	  <div class="panel-body">
	  <form action="" method="post">  
			<label>Username</label>
			<input type="text" name="username" class="form-control" placeholder="Username">
			<label>Password</label>
			<input type="password" name="password" class="form-control"  placeholder="*******">
			<hr>
			<input type="submit" value="Login User" class="btn btn-success">
			<hr>
			Pastikan username dan password benar<br>
		</form>
	  </div>
	</div>
	 
               
    </div> 
	<?php include "footer.php"; ?>