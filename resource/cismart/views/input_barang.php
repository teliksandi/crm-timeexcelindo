<?php echo form_open('barang/input_simpan');?>
<table>
	<tr><td>Kode Barang</td><td><?php echo form_input('kode_barang', '', array('placeholder'=>'kode barang'))?></td></tr>
	<tr><td>Nama Barang</td><td><?php echo form_input('nama_barang', '', array('placeholder'=>'nama barang'))?></td></tr>
	<tr><td>Harga Barang</td><td><?php echo form_input('harga', '', array('placeholder'=>'harga barang'))?></td></tr>
	<tr><td><table>
		<tr>
	<?php echo form_submit('submit', 'Simpan')?>
	<?php echo form_close(); ?>
	<?php echo form_open('barang/masuk');?><?php echo form_submit('kembali', 'Kembali')?><?php echo form_close();?>
		</tr>
	</table>
	</td></tr>
</table>


