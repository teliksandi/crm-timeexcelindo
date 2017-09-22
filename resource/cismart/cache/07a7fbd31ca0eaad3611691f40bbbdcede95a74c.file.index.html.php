<?php /* Smarty version Smarty-3.0.7, created on 2017-09-12 15:23:41
         compiled from "application/views/planning/index.html" */ ?>
<?php /*%%SmartyHeaderCode:213253392659b7998d756ef9-83426570%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '07a7fbd31ca0eaad3611691f40bbbdcede95a74c' => 
    array (
      0 => 'application/views/planning/index.html',
      1 => 1505204618,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '213253392659b7998d756ef9-83426570',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<section class="content-header">
    <h1>
        Pengolahan Data Planning
    </h1>
</section>
<!-- notification template -->
<?php $_template = new Smarty_Internal_Template("base/templates/notification.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<!-- end of notification template-->

<section class="content">
	<div class="row">
	        <div class="col-md-12">
	            <div class="box box-success">
	                <div class="box-header with-border">
	                    <h3 class="box-title"><i class="fa fa-search"></i> Pencarian</h3>
	                </div>
	                <div class="box-body">
	                    <form class="form-horizontal" action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('initiation/initiation/search_process');?>
" method="post">
	                        <div class="box-body">
	                            <div class="form-group">
	                                <label for="project_title" class="col-sm-2 control-label">Nama Project</label>
	                                <div class="col-sm-4">
	                                    <input type="text" title="Masukkan Nama Project" name="project_title" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('search')->value['project_title'])===null||$tmp==='' ? '' : $tmp);?>
" class="form-control" id="project_title" placeholder="">
	                                </div>
	                                <div class="col-sm-4">
	                                    <button type="submit" value="Reset" name="save" class="btn btn-danger">Reset</button>&nbsp;&nbsp;
	                                    <button type="submit" value="Cari" name="save" class="btn btn-success">Cari</button>
	                                </div>
	                            </div>
	                        </div>
	                    </form>
	                </div>
	            </div>
	            <div class="box">
	                <div class="box-header with-border">
	                    <h3 class="box-title">Tabel Data Planning</h3>
	                    <div class="box-tools">
	                        <a class="btn btn-sm btn-success" href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('initiation/initiation/add_initiation');?>
" ><i class="fa fa-plus"></i> Tambah Data</a>
	                    </div>
	                </div>
	               	<div class="box-body">
		                <table class="table table-striped">
		                    <tbody>
		                        <tr>
		                            <td width="5%" align="middle"><b>No</b></td>
		                            <td width="20%" align="middle"><b>Project Title</b></td>
		                            <td width="18%" align="middle"><b>Client Nama</b></td>
		                        </tr>
		                        <?php  $_smarty_tpl->tpl_vars['result'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('initiation_client')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['result']->key => $_smarty_tpl->tpl_vars['result']->value){
?>
		                        <tr>
		                            <td align="middle"><?php echo $_smarty_tpl->getVariable('no')->value++;?>
</td>
		                            <td align="middle"><?php echo $_smarty_tpl->tpl_vars['result']->value['project_title'];?>
</td>
		                            <td align="middle"><?php echo $_smarty_tpl->tpl_vars['result']->value['client_name'];?>
</td>

		                            <td align="middle">
		                                <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('closing/closing/edit');?>
/<?php echo $_smarty_tpl->tpl_vars['result']->value['id_initiation'];?>
" class="btn btn-xs btn-primary" title="Edit"><i class="fa fa-pencil" title="Edit"></i> Edit</a>
		                                <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('closing/closing/delete');?>
/<?php echo $_smarty_tpl->tpl_vars['result']->value['id_client'];?>
" class="btn btn-xs btn-danger"><i class="fa fa-trash-o"></i> Delete</a>
		                            </td>
		                        </tr>
		                        <?php }} else { ?>
		                        <tr>
		                            <td colspan="4">
		                                Data tidak ditemukan!
		                            </td>
		                        </tr>
		                        <?php } ?>
		                    </tbody>
		                </table>
                	</div>
	            </div>
	        </div>
		</div>
</section>