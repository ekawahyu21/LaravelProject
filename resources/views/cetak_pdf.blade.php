<html>
	<head>
		<title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	</head>
	<body>
		<style type="text/css">
			table tr td,
			table tr th{
				font-size: 9pt;
			}
		</style>
		<center>
		<h5>Laporan Penjualan</h4>
		
		</center>
		
		<table class="table table-bordered" style="width: 100%;">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama</th>
					<th>Tanggal Pesan</th>
					<th>Jenis Kamar</th>
					
					<th>Bed</th>
					<th>Towel</th>
					<th>Pillow</th>
					<th>Guest</th>
					<th>Start</th>
					<th>End</th>
					<th>Guest note</th>
					<th>Total</th>
				
				</tr>
			</thead>
			<tbody>
				<?php foreach ($transaksi as $key => $value) {?>
				<tr>
					<td><?php echo $key+1; ?></td>
					<td>{{$value->nama}}</td>
					<td>{{$value->tgl_pesan}}</td>
					<td>{{$value->tipe_kamar}}</td>
					<td>{{$value->bed}}</td>
					<td>{{$value->towel}}</td>
					<td>{{$value->pillow}}</td>
					<td>{{$value->guest}}</td>
					<td>{{$value->start}}</td>
					<td>{{$value->end}}</td>
					<td>{{$value->note}}</td>
					<td>{{ number_format($value->total)}}</td>
					
				</tr>
				<?php } ?>
			</tbody>
		</table>
		
	</body>
</html>