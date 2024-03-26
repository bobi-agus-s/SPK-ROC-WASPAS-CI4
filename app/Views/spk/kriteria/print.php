<!doctype html>
	<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>PRINT</title>
	</head>
	<body>

		<h3 style="text-align: center; margin: 10px 0 ;">Form Penilaian</h3>
		<div style="margin-bottom:10px;">
			<table>
				<tr>
					<td>NIK</td>
					<td>:</td>
					<td></td>
				</tr>
				<tr>
					<td>Nama</td>
					<td>:</td>
					<td></td>
				</tr>
				<tr>
					<td>Alamat</td>
					<td>:</td>
					<td></td>
				</tr>
				<tr>
					<td>Periode Bantuan</td>
					<td>:</td>
					<td><?= session('periode') ?></td>
				</tr>
			</table>
		</div>

		<div>
			<table cellspacing="0" cellpadding="10" border="1" >
				<tr>
					<td>No</td>
					<td>Kriteria</td>
					<td>Kategori</td>
					<td>Pilihan</td>
				</tr>
				<?php foreach ($kriteria as $key => $dt_kriteria): ?>
					<tr >
						<td><?= ++$key ?></td>
						<td><?= $dt_kriteria->nama_kriteria ?></td>
						<td >
							<?php $kategori = $model_subkriteria->getDataByKriteria($dt_kriteria->id_kriteria) ?>
							<ol style="margin:0px">
								<?php foreach ($kategori as $dt): ?>
									<li style="margin-bottom:4px">
										<?= $dt->deskripsi ?>
									</li>
								<?php endforeach ?>
							</ol>
						</td>
						<td></td>
					</tr>
				<?php endforeach ?>
			</table>
		</div>
	</body>
	</html>