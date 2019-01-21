<?php

require_once 'upload.php';

class validation {
	
	public function check_name_length($object) {
		
		if (mb_strlen($object->file['original_filename']) > 100) {
			
			$object->set_error('File name is too long.');
			
		}

	}
	
}

$old_file = dirname(__FILE__)."/important/banding/file_banding.txt";
$get_old = file_get_contents($old_file);
$panjang_new = "File Belum Di upload";
$percent = 0;
$size_new = "0 byte";

if (!empty($_FILES['test'])) {
	
	$upload = Upload::factory('check_file/important/files');
	$upload->file($_FILES['test']);
	
	$validation = new validation;
	
	$upload->callbacks($validation, array('check_name_length'));
	$old_new_file = dirname(__FILE__)."/important/files/file_pembanding.txt";
	$results = $upload->upload('file_pembanding.txt');
	
	$get_new = file_get_contents($results['full_path']);
	$size_new = $results['size_in_bytes'];
	$panjang_new = strlen($get_new)." Karakter";
	$similiar = similar_text($get_old, $get_new,$percent);
}


?>

<!DOCTYPE html>
<html lang="en">
	<head>
	<title>Similiar Compare</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<style>
		/* .navbar{
			-webkit-box-shadow:0px 1px 1px #f2f2f2;
			-moz-box-shadow:0px 1px 1px #f2f2f2;
			box-shadow:0px 1px 1px #f2f2f2;
		} */
		body{
			background-image: linear-gradient(to right top, #dee2e8, #cfdeee, #bcdbf3, #a5d8f7, #89d6f9);
			height:600px;
			
		}

		/* .navbar{
			background-image: linear-gradient(to right top, #3681f2, #46a0f8, #6ebcfa, #9ed6fa, #d2eefb);
			
		} */
	</style>
	</head>
	<body>
		<nav class="navbar navbar-inverse" style="border-radius:0;border-color:white;background:white;border-bottom-color: solid 3px #f2f2f2;">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="#" style="color:red;">Aplikasi Compare File</a>
				</div>
			</div>
		</nav>
	
		<div class="container-fluid">
			<div class="col-md-6">
				<div class="panel panel-info">
					<div class="panel-heading">Informasi</div>
					<div class="panel-body">
						<h4>File sebagai pembanding</h4>
						<table class="table table-striped">
							<thead>
							<tr>
								<th>No</th>
								<th>Nama File</th>
								<th>Link</th>
								<th>Aksi</th>
							</tr>
							</thead>
							<tbody>
							<tr>
								<td>1</td>
								<td>File banding</td>
								<td><a href="open.php" target="_blank">Data File<a></td>
								<td><a class="btn btn-success btn-sm" target="_blank" href="banding.php">Ganti File<a></td>
							</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="panel panel-warning">
					<div class="panel-heading">Informasi</div>

					<div class="panel-body">
						<h4>File yang akan dibandingkan</h4>
						<form action="" method="post" enctype="multipart/form-data">
						
							<div class="form-group">
								<label for="file">File:</label>
								<input type="file" class="form-control" name="test" >
							</div>

							<button type="submit" class="btn btn-primary">Bandingkan</button>
							
						</form>
					</div>
				</div>
				<div class="table-responsive">
					<div class="panel panel-success">
						<div class="panel-heading">Informasi</div>
						<div class="panel-body">
							<h4>File yang akan dibandingkan</h4>
							<table class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>Nama File</th>
										<th>Panjang File</th>
										<th>Aksi</th>
										<th colspan="2">Persentase Kemiripan file</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>File banding</td>
										<td><?= strlen($get_old) ?> Karakter</td>
										<td><a class="btn btn-info btn-sm" target="_blank" href="open.php">Lihat File<a></td>
										<td rowspan="2" align="center"><?= $percent ?> %</td>
									</tr>
									<tr>
										<td>File Pembanding </td>
										<td><?= $panjang_new ?> </td>
										<td><a class="btn btn-info btn-sm" target="_blank" href="open_pembanding.php">Lihat File<a></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12" style="margin-top:50px;height:100px;background:white;color:black;padding:10px;">
					<div> 
						<center><h5>Design with love by aisyah meirosi</h5></center>
					</div>
				</div>
			</div>
		</div>
		

	</body>
</html>

