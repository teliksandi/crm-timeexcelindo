<?php /* Smarty version Smarty-3.0.7, created on 2017-08-10 08:33:07
         compiled from "application/views\master/client/add_client.html" */ ?>
<?php /*%%SmartyHeaderCode:16202598bfe231462e2-13952616%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '05a0e974bbdb221e285aba0fc4d8f24bf011089c' => 
    array (
      0 => 'application/views\\master/client/add_client.html',
      1 => 1502346630,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16202598bfe231462e2-13952616',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<section class="content-header">
<?php $_template = new Smarty_Internal_Template("base/templates/notification.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
    <h1>
        Dashboard Operator
    </h1>
</section>
<section class="content">
<form method=post action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('master/client/add_client');?>
" method="post">
<table weight = "2">
<tr>
	<td>Alias Name</td>
	<td width="700px"><input type="text" name="alias_name" placeholder="Nama Alias" class="form-control" required></td>
</tr>
<tr>
	<td>Name</td>
	<td><input type="text" name="client_name" placeholder="Nama Client" class="form-control" required></td>
</tr>
<tr>
	<td width="100px">Client Address</td>
	<td><textarea name="client_address" placeholder="Alamat Client" class="form-control" required></textarea>  </td>
</tr>
<tr>
	<td>Person Name</td>
	<td><input type="text" name="person_name" placeholder="Nama Person" class="form-control" required></td>
</tr>
<tr>
	<td>Job Position</td>
	<td><input type="text" name="department" placeholder="Jabatan" class="form-control" required></td>
</tr>
<tr>
	<td>No. Telp</td>
	<td><input type="number" min ="0"  name="telp" placeholder="Nomor Telepon" class="form-control" required></td>
</tr>
<tr>
	<td>Email</td> 
	<td><input type="email" name="email" placeholder="Email" class="form-control"></td>
</tr>
</table>
<button type="submit" class="btn btn-default">Kirim</button>
<button type="reset" value="reset" name="reset" class="btn btn-default">Reset</button>


</form>
</section>