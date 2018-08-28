<?php
session_start();
$isLoggedIn = $_SESSION['isLoggedIn'];
if($isLoggedIn != '1'){
  session_destroy();
  header('location:index');
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Muncak Bareng</title>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="DataTables/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="DataTables/css/fixedColumns.bootstrap.min.css">
  <script type="text/javascript" src="jQuery/jquery-3.2.1.js"></script>
    <script type="text/javascript" src="DataTables/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="DataTables/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="DataTables/js/dataTables.fixedColumns.min.js"></script>
  <link rel="stylesheet" type="text/css" href="bootstrap/css/sidebar.css">

</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid col-sm-4-fs">
    <div class="navbar-header">
      <a class="navbar-brand" href="home">Muncak Bareng</a>
    </div>
    
    <ul class="nav navbar-nav navbar-right">
     
    </ul>
  </div>
</nav>

<nav class="navbar navbar-default sidebar" role="navigation">
    <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>      
    </div>
    <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="home">Home<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span></a></li>         
        <li ><a href="profile">Profile<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-th-list"></span></a></li>        
        <li ><a href="jadwal">Jadwal Muncak Bareng<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon 
        glyphicon-tags"></span></a></li>
        <li ><a href="buat_jadwal">Buat Jadwal<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-tags"></span></a></li>
        <li ><a href="logout">Logout<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-tags"></span></a></li>
      </ul>
    </div>
  </div>
</nav>
<div class="col-sm-9"><h2>Muncak Bareng</h2>
<div class="box-body">
<table id="masterjadwal" class="table">
 	<thead>
 		<tr>
 			<th>No</th>
 			<th>Gunung Tujuan</th>
      <th>Jalur</th>
 			<th>Tanggal Naik</th>
 			<th>Tanggal Turun</th>
 			<th>Meeting Point</th>
      <th>CP</th>
 			<th>Telpon</th>
      <th>Aksi</th>
 		</tr>
 </thead>
 <tbody>
 <?php
 include 'koneksi.php';
 $data = mysqli_query($koneksi,"SELECT * FROM jadwal")or die(mysql_error());
 $no = 1;
 while($hasil = mysqli_fetch_array($data)){
 	?>
 	<tr>
 	<td><?php echo $no++; ?></td>
 	<td><?php echo $hasil['gn_tujuan']?></td>
  <td><?php echo $hasil['naik_via']?></td>
 	<td><?php echo $hasil['tanggal_naik']; ?> </td>
 	<td><?php echo $hasil['tanggal_turun']; ?> </td>
 	<td><?php echo $hasil['mp']; ?> </td>
  <td><?php echo $hasil['cp']; ?> </td>
  <td><?php echo $hasil['telpon']; ?> </td>
 	
 	<td><a href="detail.php?id=<?php echo $hasil['Id'];?>" span class="glyphicon glyphicon-menu-hamburger">Detail</a></td>
 </tr>
 	<?php } ?>
 	<script>
                  $(document).ready(function() {
                    $('#masterjadwal').DataTable();
                  } );
                  </script>
  </tbody>
	</table>
	</div>
	</div>
	</div>
	<div class="col-sm-1"></div>
	</body>
	</html>