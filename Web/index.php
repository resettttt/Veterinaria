<!DOCTYPE html>
<html lang="en">
  	<?php include '../View/PartialsMain/head.php'; 
    include_once '../Lib/helpers.php';
    ?>
  <body>
		<!-- WARPUPBANNER -->
		<?php include '../View/PartialsMain/WarpUpBanner.php'; ?>

	<!-- NAVBAR -->
	<?php include '../View/PartialsMain/navbar.php'; ?>	    
	<!-- HERO-WARP -->
	<?php 
  include '../View/PartialsMain/Hero-Warp.php'; 
  if(isset($_GET['module'])){
    resolve();
  }
  ?>
  <!-- footer -->	  
  <?php include '../View/PartialsMain/footer.php'; ?>      
  <!-- loader -->      
  </body>
</html>