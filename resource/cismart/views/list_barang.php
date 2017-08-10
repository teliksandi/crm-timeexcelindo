<?php echo "Data Barang"; ?> <?php echo anchor('barang/input','Input Data Barang') ?>
<table border="1">
	<tr><th>Kode Barang</th><th>Nama Barang</th><th>Harga</th><th colspan="2"></th></tr>
	<?php
foreach ($barang as $b) {
	echo "<tr>
	<td>$b->kode_barang</td>
	<td>$b->nama_barang</td>
	<td>$b->harga</td>
	<td>".anchor('barang/edit/'.$b->kode_barang,'Edit')."</td>
	<td>".anchor('barang/delete/'.$b->kode_barang,'Delete')."</td>
	</tr>";
}
?>
</table>
<?php 
echo "<br>";
echo anchor('barang/logout', $logout);
 ?>