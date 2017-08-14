<?php /* Smarty version Smarty-3.0.7, created on 2017-08-14 05:03:08
         compiled from "application/views\master/initiation/add_initiation.html" */ ?>
<?php /*%%SmartyHeaderCode:15248599112ec5c0df2-83672773%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '671ad8379bbf5cead253546c1404f09be764967b' => 
    array (
      0 => 'application/views\\master/initiation/add_initiation.html',
      1 => 1502679727,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15248599112ec5c0df2-83672773',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<section class="content-header">
    <h1>
        Add Data Initiation
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-database"></i> Master</a></li>
        <li><a href="#"> Initiation</a></li>
        <li class="active">Add Data</li>
    </ol>
</section>

<section class="content">
    <!-- notification template -->
    <?php $_template = new Smarty_Internal_Template("base/templates/notification.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
    <!-- end of notification template-->
    <div class="row">
        <div class="col-md-12">

            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Data Initation</h3>
                    <div class="box-tools">
                        <a class="btn btn-sm btn-default" href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('master/initiation');?>
" ><i class="fa fa-long-arrow-left"></i> Kembali</a>
                    </div>
                </div>
<div class="box box-success">

<form role="form" action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('master/initiation/add_initiation');?>
" method="post">
	<div class="box-header with-border">
		<tr>
			<td>Karyawan</td>
			<td>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<select name="Karyawan">
				<option value="">Pilih Karyawan</option>
            	<?php  $_smarty_tpl->tpl_vars['cth'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data_kar')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['cth']->key => $_smarty_tpl->tpl_vars['cth']->value){
?>
            		<option value=<?php echo $_smarty_tpl->tpl_vars['cth']->value['id_identitas'];?>
><?php echo $_smarty_tpl->tpl_vars['cth']->value['karyawan_name'];?>
</option>
           		<?php }} else { ?>
           			Data tidak ditemukan !
           		<?php } ?>
           </select>
			</td>
		</tr>
		<br>
		<br>
		<tr>
			<td>Client</td>
			<td>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<select name="Client">
<option value="">Pilih Client</option>
            <?php  $_smarty_tpl->tpl_vars['cth'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('dataclient')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['cth']->key => $_smarty_tpl->tpl_vars['cth']->value){
?>
            <option value=<?php echo $_smarty_tpl->tpl_vars['cth']->value['id_client'];?>
><?php echo $_smarty_tpl->tpl_vars['cth']->value['client_name'];?>
</option>
           <?php }} else { ?>
           Data tidak ditemukan !
           <?php } ?>
           </select>
			</td>
		</tr>
	</div>
</div>
<div class="box box-success">
	<div class="box-header with-border">
		<label><h4><b>
			Detail Project
		</b></h4></label>
	<br>
	<div class="col-md-6">
		<div class="form-group">
			<label>Project Title</label>
			<input type="text" name="judul_project" placeholder="Judul Project" class="form-control" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
		</div>
		<div class="form-group">
			<label>Project Description</label>
			<textarea name="deskripsi" rows="3" cols="35" class="form-control" placeholder="Deskripsi Tentang Project" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')"></textarea>
		</div>
		<div class="form-group">
			<label>Project Manager Department</label>
			<input type="text" name="manager_department" placeholder="Departement Management Project" class="form-control" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
		</div>
		<div class="form-group">
			<label> Budget, Schdule, Staffing, dll</label>
			<input type="text" name="BSSD" placeholder="Uang, Susunan, Staf, dll" class="form-control" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
		</div>
		<div class="form-group">
			<label>Job / Bussiness Needs</label> 
			<input type="text" name="kebutuhan_kerja" placeholder="Kebutuhan Pekerjaan/Bisnis" class="form-control" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label>Project Justification</label> 
			<input type="text" name="justifikasi" placeholder="Justifikasi Project" class="form-control" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
		</div>
		<div class="form-group">
			<label>Human Resource Needs</label> 
			<input type="text" name="kebutuhan_sdm" placeholder="Kebutuhan SDM" class="form-control" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
		</div>
		<div class="form-group">
			<label>Product Description</label> 
			<textarea name="product_deskripsi" rows="3" cols="35" class="form-control" placeholder="Deskripsi tentang Produk" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')"></textarea>
	
		</div>
		<div class="form-group">
			<label>Not in this Project</label> 
			<textarea name="not_in" rows="3" cols="35" class="form-control" placeholder="Data yang tidak ada pada Project" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')"></textarea>
		</div>
	</div>
</div>
<div class="box box-success">
	<div class="box-header with-border">
		<tr>
			<label><h4><b>Stakeholder</b></h4></label>
			<td>
				<table>
					<tr>
						<td width="500px" align="center"><b>Role</b></td>
						<td width="500px" align="center"><b>Dampak</b></td>
						<td width="500px" align="center"><b>Pengaruh</b></td>
						<td width="500px" align="center"><b>Risk Tolerance</b></td>
					</tr>
			<tr>
				<td>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="checkbox" name="role1">Kepala Kantor
					<br>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="checkbox" name="role2">Staff
				</td>
				<td>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="checkbox" name="devisi1" value="High">High
					<br>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="checkbox" name="devisi2" value="Medium">Medium
					<br>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="checkbox" name="devisi3" value="Low Medium">Low Medium
					<br>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="checkbox" name="devisi4" value="Low">Low
				</td>

				
				<td>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="checkbox" name="devisi5" value="High">High
					<br>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="checkbox" name="devisi6" value="Medium">Medium
					<br>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="checkbox" name="devisi7" value="Low Medium">Low Medium
					<br>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="checkbox" name="devisi8" value="Low">Low
				</td>
				<td>
				<center>
					<input type="number" name="data1" value="0" min="0" max="99">
					<br>
					<input type="number" name="data2" value="0" min="0" max="99">
					<br>
					<input type="number" name="data3" value="0" min="0" max="99">
					<br>
					<input type="number" name="data4" value="0" min="0" max="99">
					<br>
				</center>
				</td>
			</tr>
		</table>
	</td>
</tr>
	</div>
</div>
<div class="box box-success">
	<div class="box-header with-border">
		<tr>
			<label><h4><b>
				Date And Upload
			</b></h4></label>
			<td>
				<table>
					<tr>
						<td width="500px" align="center"><b>Start date</b></td>
						<td width="500px" align="center"><b>Due date</b></td>
						<td width="500px" align="center"><b>Pilih File</b></td>
					</tr>
					<tr>
						<td align="center">
							<input type="date" name="tanggal_start">
						</td>
						<td align="center">
							<input type="date" name="tanggal_due">
						</td>
						<td align="center">
							<input type="file" name="foto_narsis">
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</div>
<div class="box box-danger">
	<div class="box-header with-border">
	<center>
		<button type="submit" class="btn btn-success">Kirim</button>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<button type="reset" value="reset" name="reset" class="btn btn-danger">Reset</button>
	</center>
	</div>
</form>
</div>
</section>