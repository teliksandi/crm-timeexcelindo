<?php /* Smarty version Smarty-3.0.7, created on 2017-11-17 03:38:13
         compiled from "application/views\closing/index.html" */ ?>
<?php /*%%SmartyHeaderCode:19939113725a0e4b95e13566-41893962%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '66262d8b568546bb32100dec866b19154c7a4bed' => 
    array (
      0 => 'application/views\\closing/index.html',
      1 => 1510044609,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19939113725a0e4b95e13566-41893962',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<section class="content-header">
    <h1>
        Pengolahan Data Closing
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-sticky-note"></i> Closing</a></li>
        <li class="active">Data Closing</li>
    </ol>
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
	               	<div class="box-body">
		                <table class="table table-striped">
		                    <tbody>
		                        <tr>
		                            <td width="3%" align="middle"><b>No</b></td>
	                                <td width="20%" align="middle"><b>Project Title</b></td>
	                                <td width="15%" align="middle"><b>Client Nama</b></td>
	                                <td width="10%" align="middle"><b>Last History</b></td>
	                                <td width="18%" align="middle"><b>Action</b></td>
		                        </tr>
		                        <?php  $_smarty_tpl->tpl_vars['result'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('closing')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
		                        	<td align="middle">Belum Dicari</td>
		                            <td align="middle">
		                                <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('closing/closing/detail');?>
/<?php echo $_smarty_tpl->tpl_vars['result']->value['id_initiation'];?>
" class="btn btn-xs btn-warning" title="Detail"><i class="fa fa-book" title="Edit"></i> Detail</a> 
		                            </td>
		                        </tr>
		                        <?php }} else { ?>
		                        <tr>
		                            <td colspan="4">
		                                Data tidak ditemukan!
		                            </td>
		                        <?php } ?>
		                        </tr>		                       
		                    </tbody>
		                </table>
                	</div>
	            </div>
	        </div>
		</div>
</section>