<?php
function tambahsession($data){
	$_SESSION['data'][] = $data;
}

function hapusdata(){
	unset($_SESSION['data']);
	header("loction:index.php");
}
if (!session_id()) {
	session_start();
}
if (!isset($_SESSION['data'])) {
	$_SESSION['data'] = [];
}
if (isset($_POST['submit'])) {
	$data = [
		'alas' => $_POST['alas'],
		'tinggi' => $_POST['tinggi'],
		'luas' => $_POST['alas'] * $_POST['tinggi'] / 2
	];
	tambahsession($data);
}
$_GET['ac'] = isset($_GET['ac']) ? $_GET['ac'] : '';
if ($_GET['ac']=='hapus') {
	hapusdata();
}
?>
<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

	<title>Manipulasi Session</title>
	<style>
		
	</style>
</head>
<body>
	<div class="container mt-5 bg-dark text-white rounded shadow-lg">
		<div class="row pt-5">
			<div class="offset-3 col-md-6">
				<form action="" method="POST">
					<div class="form-group">
						<label for="alas">Alas (CM)</label>
						<input type="text" class="form-control" id="alas" name="alas" aria-describedby="Alas">
					</div>
					<div class="form-group">
						<label for="alas">Tinggi (CM)</label>
						<input type="text" class="form-control" id="tinggi" name="tinggi" aria-describedby="Tinggi">
					</div>
					<button type="submit" name="submit" class="btn btn-primary" value="submit">Proses</button>
					<a href="index.php?ac=hapus" class="btn btn-warning">Hapus Data</a>
				</form>
			</div>
		</div>
		<div class="row mt-5">
			<div class="offset-1 col-md-10 pb-5">
				<div class="table-responsive">
					<table class="table table-light">
						<thead class="thead-light">
							<tr>
								<th scope="col" style="max-width: 15px;">No</th>
								<th scope="col">Alas</th>
								<th scope="col">Tinggi</th>
								<th scope="col">Luas</th>
							</tr>
						</thead>
						<tbody>
							<?php $i=1; ?>
							<?php foreach($_SESSION['data'] as $dt) : ?>
							<tr>
								<th scope="row"><?= $i++ ?></th>
								<td><?= $dt['alas'] ?> cm</td>
								<td><?= $dt['tinggi'] ?> cm</td>
								<td><?= $dt['luas'] ?> cm<sup>2</sup></td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

-->
</body>
</html>