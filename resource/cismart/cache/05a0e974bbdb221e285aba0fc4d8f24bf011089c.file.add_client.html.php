<?php /* Smarty version Smarty-3.0.7, created on 2017-08-10 18:02:48
         compiled from "application/views\master/client/add_client.html" */ ?>
<?php /*%%SmartyHeaderCode:7690598c83a8814f96-29808234%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '05a0e974bbdb221e285aba0fc4d8f24bf011089c' => 
    array (
      0 => 'application/views\\master/client/add_client.html',
      1 => 1502380964,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7690598c83a8814f96-29808234',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<section class="content-header">
<?php $_template = new Smarty_Internal_Template("base/templates/notification.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<div class="box box-success">
	<div class="box-header with-border">
    	<label><h3><b>
        	Dashboard Operator
    	</b></h3></label>
    </div>
<div class="box box-success">
<form role="form" method=post action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('master/client/add_client');?>
" method="post">
	<div class="box-header with-border">
	 <div class="col-md-6">
		<tr>
			<label>Alias Name</label>
			<input type="text" name="alias_name" placeholder="Nama Alias" class="form-control" required>
		</tr>
		<tr>
			<label>Name</label>
			<input type="text" name="client_name" placeholder="Nama Client" class="form-control" required>
		</tr>
		<tr>
			<label>Client Address</label>
			<textarea name="client_address" placeholder="Alamat Client" class="form-control" required></textarea>
		</tr>
	 </div>
	 <div class="col-md-6">
		<tr>
			<label>Person Name</label>
			<input type="text" name="person_name" placeholder="Nama Person" class="form-control" required>
		</tr>	
		<tr>
			<label>Job Position</label>
			<input type="text" name="department" placeholder="Jabatan" class="form-control" required>
		</tr>
		<tr>
			<label>No. Telp</label>
			<input type="number" min ="0"  name="telp" placeholder="Nomor Telepon" class="form-control" required>
		</tr>
		<tr>
			<label>Email</label> 
			<input type="email" name="email" placeholder="Email" class="form-control">
		</tr>
	 </div>
	</div>
<div class="box box-danger">
<form role="form">
	<div class="box-header with-border">
	<center>
		<button type="submit" class="btn btn-success">Kirim</button>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<button type="reset" value="reset" name="reset" class="btn btn-danger">Reset</button>
	</center>
	</div>
</form>
</div>
</form>
</section>