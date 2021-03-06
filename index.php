<!DOCTYPE html>
<?php
session_start();
include 'db.php';
include 'fungsi.php';
$db = new Database();
$db->connect();
?>
<html lang="id">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?=TITLE;?></title>

		<!-- Bootstrap CSS -->
		<link href="css/cerulean-bootstrap.min.css" rel="stylesheet">
		<link href="css/carousel.css" rel="stylesheet">
		 <link href="components/jquery-ui/jquery-ui.min.css" rel="stylesheet">
		 <link href="components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
		 <link href="components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
		 <link href="components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="js/html5shiv.js"></script>
			<script src="js/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<div class="navbar-wrapper">
	      <div class="container">

	        <nav class="navbar navbar-inverse navbar-static-top">
	          <div class="container">
	            <div class="navbar-header">
	              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	                <span class="sr-only">Toggle navigation</span>
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span>
	              </button>
	              <a class="navbar-brand" href="."><?=NAMASEKOLAH;?></a>
	            </div>
	            <div id="navbar" class="navbar-collapse collapse">
	              <?php if(isset($_SESSION['username'])){ ?>
	              <ul class="nav navbar-nav">
	                <li<?=hom();?>><a href=".">Home</a></li>
	                <li<?=aktif('siswa');?>><a href="?hal=siswa">Siswa</a></li>
	                <li><a href="?hal=siswa">Tata Tertib</a></li>
	                <li><a href="?hal=siswa">Pelanggaran</a></li>
	                <li><a href="?hal=siswa">Sanksi</a></li>
	                <li><a href="?hal=siswa">Siswa</a></li>
	                <li class="dropdown">
	                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Laporan <span class="caret"></span></a>
	                  <ul class="dropdown-menu">
	                    <li><a href="?hal=siswa">Kelas</a></li>
	                    <li><a href="?hal=siswa">Jurusan</a></li>
	                    <li><a href="?hal=siswa">Tingkat</a></li>
	                    <li role="separator" class="divider"></li>
	                    <!--li class="dropdown-header">Nav header</li-->
	                    <li><a href="?hal=siswa">Monitoring</a></li>
	                  </ul>
	                </li>
	                <li class="dropdown">
	                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Pengaturan <span class="caret"></span></a>
	                  <ul class="dropdown-menu">
	                    <li<?=aktif('jurusan');?>><a href="?hal=jurusan"><span class="glyphicon glyphicon-th" aria-hidden="true"></span> Jurusan</a></li>
	                    <li<?=aktif('kelas');?>><a href="?hal=kelas"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Kelas</a></li>
	                  </ul>
	                </li>
	              </ul>
	              <ul class="nav navbar-nav navbar-right">
	                <li class="dropdown">
	                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Profil <span class="caret"></span></a>
	                  <ul class="dropdown-menu">
	                    <li><a href="?hal=siswa"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Ubah Profil</a></li>
	                    <li><a href="logout.php"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Logout</a></li>
	                  </ul>
	                </li>
	              </ul>
	            <?php }else{ ?>
		            <form class="navbar-form navbar-right" action="login.php" method="post">
						<div class="form-group">
							<input type="text" class="form-control" name="user" placeholder="Username">
							<input type="password" class="form-control" name="pass" placeholder="Password">
						</div>
						<button type="submit" class="btn btn-primary">Masuk</button>
					</form>
				<?php } ?>
	            </div>
	          </div>
	        </nav>

	      </div>
	    </div>

	    <?php
	    if(isset($_GET['hal'])){
	    	echo '<div class="container badan">';
	    	require_once 'admin/'.$_GET['hal'].'.php';
	    	echo "</div>";
	    }else{
	    ?>
	    <!-- Carousel
	    ================================================== -->
	    <div id="myCarousel" class="carousel slide" data-ride="carousel">
	      <!-- Indicators -->
	      <ol class="carousel-indicators">
	        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
	        <li data-target="#myCarousel" data-slide-to="1"></li>
	      </ol>
	      <div class="carousel-inner" role="listbox">
	        <div class="item active">
	          <img class="first-slide" src="images/visi-misi.jpg" alt="First slide">
	          <div class="container">
	            <div class="carousel-caption">
	              <h1>Visi</h1>
	              <p>Note: If you're viewing this page via a <code>file://</code> URL, the "next" and "previous" Glyphicon buttons on the left and right might not load/display properly due to web browser security rules.</p>
	              <!--p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p-->
	            </div>
	          </div>
	        </div>
	        <div class="item">
	          <img class="second-slide" src="images/misi-visi.jpg" alt="Second slide">
	          <div class="container">
	            <div class="carousel-caption">
	              <h1>Misi</h1>
	              <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
	            </div>
	          </div>
	        </div>
	      </div>
	      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
	        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
	        <span class="sr-only">Previous</span>
	      </a>
	      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
	        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
	        <span class="sr-only">Next</span>
	      </a>
	    </div><!-- /.carousel -->
	    <?php } ?>

		<!-- jQuery -->
		<script src="js/jquery.js"></script>
		<script src="components/jquery-ui/jquery-ui.min.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="js/bootstrap.min.js"></script>
		<!-- Another JavaScript -->
		<script src="js/isNumber.js"></script>
		<script src="components/datatables/media/js/jquery.dataTables.min.js"></script>
    	<script src="components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    	<!-- load JavaScript -->
    	<script>
	    $(document).ready(function() {
	        $('#tbl,#tbl2,#tbl3').DataTable({
	                responsive: true
	        });
	        $( "#datepicker" ).datepicker({
	        	changeYear: true,
	        	changeMonth: true,
	        	dateFormat: "dd M yy"
	        });
	    });
	    </script>
	</body>
</html>