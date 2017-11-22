<?php /* Smarty version Smarty-3.0.7, created on 2017-08-15 09:40:11
         compiled from "application/views\master/initiation/add_initiation.html" */ ?>
<?php /*%%SmartyHeaderCode:89885992a55bf1abd7-34478465%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '671ad8379bbf5cead253546c1404f09be764967b' => 
    array (
      0 => 'application/views\\master/initiation/add_initiation.html',
      1 => 1502781806,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '89885992a55bf1abd7-34478465',
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
        <li><a href="#">Initiation</a></li>
        <li class="active">Add Data</li>
    </ol>
</section>

<section class="content-header">
<?php $_template = new Smarty_Internal_Template("base/templates/notification.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<div class="box box-success">
	<div class="box-header with-border">
    	<label><h2><b>
        	Inisiasi
    	</b></h2></label>
    </div>
</div>
<form class="form-horizontal" action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('master/initiation/add_process');?>
" method="post">
<div class="box box-success">
	<div class="box-header with-border">
		<div class="form-group">
			<div class="col-sm-2">
				<label>Client</label>
				</div>
				<select name="Client" id="Client">
		 			<option value="" disabled="disabled" selected="selected">--Pilih client--</option>
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
		</div>
		<div class="col-sm-2">
		<label>Employees</label>
	</div>
			<div class="form-group">
			<div id="" style="overflow-y:scroll; height:100px;">
				<div class="checkbox-inline">
				<?php  $_smarty_tpl->tpl_vars['cth'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('datakaryawan')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['cth']->key => $_smarty_tpl->tpl_vars['cth']->value){
?>
            		<label>
						<input type="checkbox"><?php echo $_smarty_tpl->tpl_vars['cth']->value['nama_karyawan'];?>

					</label>
					<br>
           <?php }} else { ?>
           Data tidak ditemukan !
           <?php } ?>
				</div>
			</div>
			</div>
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
			<label>Project Manager Department</label>
				<select name="Department">
		 			<option value="" disabled="disabled" selected="selected">--Pilih Department--</option>
            			<?php  $_smarty_tpl->tpl_vars['cth'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('datadepartment')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['cth']->key => $_smarty_tpl->tpl_vars['cth']->value){
?>
            		<option value=<?php echo $_smarty_tpl->tpl_vars['cth']->value['id_department'];?>
><?php echo $_smarty_tpl->tpl_vars['cth']->value['nama_department'];?>
</option>
           				<?php }} else { ?>
           				Data tidak ditemukan !
           				<?php } ?>
           		</select>
		</div>
		<div class="form-group">
			<label>Project Description</label>
			<textarea name="deskripsi" rows="3" cols="35" class="form-control" placeholder="Deskripsi Tentang Project" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')"></textarea>
		</div>
		<div class="form-group">
			<label>Project Justification</label> 
			<textarea name="justifikasi" placeholder="Justifikasi Project" class="form-control" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')"></textarea>
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label>Budget</label><br><b>Rp.</b>
			<input type="text" name="money" placeholder="Masukan jumlah uang" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" onkeydown="return numbersonly(this, event);">
		</div>
		<div class="form-group">
			<label>Schedule</label> 
			<textarea type="text" name="justifikasi" placeholder="Isi Schedule.." class="form-control" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')"></textarea>
		</div>
		<div class="form-group">
			<label>Not in this Project</label> 
			<textarea name="not_in" rows="3" cols="35" class="form-control" placeholder="Data yang tidak ada pada Project" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')"></textarea>
		</div>
	</div>
</div>
</div>
<div class="box box-success">
	<div class="box-header with-border">
		<tr>
			<label><h4><b>
				Date And Upload  - Target Penyelesaian Inisiasi
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
</div>
<div class="box box-danger">
	<div class="box-header with-border">
	<center>
		<button type="submit" class="btn btn-success">Kirim</button>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<button type="reset" value="reset" name="reset" class="btn btn-danger">Reset</button>
	</center>
	</div>
</div>
</form>
</section>