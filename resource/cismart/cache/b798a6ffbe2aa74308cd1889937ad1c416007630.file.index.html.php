<?php /* Smarty version Smarty-3.0.7, created on 2017-11-22 08:26:33
         compiled from "application/views\planning/index.html" */ ?>
<?php /*%%SmartyHeaderCode:82375a1526a9c67e61-87492469%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b798a6ffbe2aa74308cd1889937ad1c416007630' => 
    array (
      0 => 'application/views\\planning/index.html',
      1 => 1511333930,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '82375a1526a9c67e61-87492469',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<section class="content-header">
    <h1>
        Pengolahan Data Planning
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-briefcase"></i> Planning</a></li>
        <li class="active">Data Planning</li>
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
		                <form class="form-horizontal" action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('planning/planning/search_process');?>
" method="post">
		                    <div class="box-body">
		                        <div class="form-group">
		                            <label for="project_title" class="col-sm-2 control-label">Keyword</label>
		                            <div class="col-sm-4">
		                                <input type="text" title="Masukkan Nama Project" name="keyword" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('search')->value['keyword'])===null||$tmp==='' ? '' : $tmp);?>
" class="form-control" id="Keyword" placeholder="">
		                            </div>
		                            <div class="col-sm-2">
		                            <select name="filter" min="0" max="40" class="form-control" widht='100px'>
		                                <option value="" >- Select Filter -</option>
		                                <option value='project_title'>Project Title</option>
		                                <option value='client_name'>Client Name</option>
		                                <option value='due_date'>Date/Year</option>
		                            </select>
		                            </div>
		                                <button type="submit" value="Reset" name="save" class="btn btn-danger">Reset</button>&nbsp;&nbsp;
		                                <button type="submit" value="Cari" name="save" class="btn btn-success">Cari</button>
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
	                                <td width="10%" align="middle"><b>Due Date</b></td>
	                                <td width="7%" align="middle"><b>Status</b></td>
	                                <td width="10%" align="middle"><b>Last History</b></td>
	                                <td width="18%" align="middle"><b>Action</b></td>
		                        </tr>
		                        <?php  $_smarty_tpl->tpl_vars['result'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('get')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
		                            <td align="middle"><?php echo date('d F Y',strtotime((($tmp = @$_smarty_tpl->tpl_vars['result']->value['due_date'])===null||$tmp==='' ? '' : $tmp)));?>
</td>
		                            <td align="middle">                                    
                                    	<input type="hidden" value="<?php echo date('Y-m-d',strtotime((($tmp = @$_smarty_tpl->tpl_vars['result']->value['due_date'])===null||$tmp==='' ? '' : $tmp)));?>
" id="x_End_Date">                             
                                        	<a id="dd"></a>
		                                        <?php $_smarty_tpl->tpl_vars['dueDate'] = new Smarty_variable(date('Y-m-d',strtotime((($tmp = @$_smarty_tpl->tpl_vars['result']->value['due_date'])===null||$tmp==='' ? '' : $tmp))), null, null);?>
		                                        <?php $_smarty_tpl->tpl_vars['dateNow'] = new Smarty_variable(date('Y-m-d'), null, null);?>                                       
		                                        <?php if (strtotime($_smarty_tpl->getVariable('dueDate')->value)<strtotime($_smarty_tpl->getVariable('dateNow')->value)){?>
		                                            <font color="red">Deadline</font> 
		                                        <?php }elseif(strtotime($_smarty_tpl->getVariable('dueDate')->value)==strtotime($_smarty_tpl->getVariable('dateNow')->value)){?>
		                                            <font color="red">Deadline</font> 
		                                        <?php }else{ ?>
		                                            <font color="#33cc33">Aktif</font> 
		                                        <?php }?>
                                    </td>
                                    <td align="middle"><?php echo getComment_Planning($_smarty_tpl->tpl_vars['result']->value['id_planning']);?>
</td>
		                            <td align="middle">
		        <?php  $_smarty_tpl->tpl_vars['a_dep'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('auth_dep')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['a_dep']->key => $_smarty_tpl->tpl_vars['a_dep']->value){
?>
		                                <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('planning/planning/edit');?>
/<?php echo $_smarty_tpl->tpl_vars['result']->value['id_planning'];?>
" class="btn btn-xs btn-primary" title="Edit"><i class="fa fa-pencil" title="Edit"></i> Edit</a>
		                                <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('planning/planning/detail');?>
/<?php echo $_smarty_tpl->tpl_vars['result']->value['id_planning'];?>
" class="btn btn-xs btn-warning" title="Detail"><i class="fa fa-book" title="Detail"></i> Detail</a>		            
		        <?php break 1?>
		        <?php }} ?>
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