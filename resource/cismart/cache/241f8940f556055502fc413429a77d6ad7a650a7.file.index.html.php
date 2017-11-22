<?php /* Smarty version Smarty-3.0.7, created on 2017-11-22 08:09:31
         compiled from "application/views\initiation/index.html" */ ?>
<?php /*%%SmartyHeaderCode:13865a1522abc6e0f9-02675899%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '241f8940f556055502fc413429a77d6ad7a650a7' => 
    array (
      0 => 'application/views\\initiation/index.html',
      1 => 1511333930,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13865a1522abc6e0f9-02675899',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
 <section class="content-header">
    <h1>
        Pengolahan Data Inisiasi
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-book"></i> Initiation</a></li>
        <li class="active">Data Initiation</li>
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
                                <label for="project_title" class="col-sm-2 control-label">Keyword</label>
                                <div class="col-sm-4">
                                    <input type="text" title="Masukkan Nama Project" name="project_title" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('search')->value['project_title'])===null||$tmp==='' ? '' : $tmp);?>
" class="form-control" id="project_title" placeholder="">
                                </div>
                                <div class="col-sm-2">
                                <select name="filter" min="0" max="40" class="form-control" widht='100px'>
                                    <option value="" >- Select Filter -</option>
                                    <option value='project_title'>Project Title</option>
                                    <option value='client_id'>Client Name</option>
                                    <option value='start_date'>Date/Year</option>
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
                <div class="box-header with-border">
                    <h3 class="box-title">Tabel Data Inisiasi</h3>
                    <div class="box-tools">
                        <?php ob_start();?><?php echo $_smarty_tpl->getVariable('department')->value;?>
<?php $_tmp1=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->getVariable('jabatan')->value;?>
<?php $_tmp2=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->getVariable('department')->value;?>
<?php $_tmp3=ob_get_clean();?><?php if ($_tmp1==8&&$_tmp2!=3||$_tmp3==10){?>
                        <a class="btn btn-sm btn-success" href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('initiation/initiation/add_initiation');?>
" ><i class="fa fa-plus"></i> Tambah Data</a>
                        <?php }?>
                    </div>
                </div>
                <!-- /.box-header -->
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
                                    
                                <td align="middle"><?php echo getComment($_smarty_tpl->tpl_vars['result']->value['id_inisiasi']);?>
</td>
                                 <td align="middle">
                                <?php ob_start();?><?php echo $_smarty_tpl->getVariable('department')->value;?>
<?php $_tmp4=ob_get_clean();?><?php if ($_tmp4==8){?>
                                        <?php ob_start();?><?php echo $_smarty_tpl->getVariable('jabatan')->value;?>
<?php $_tmp5=ob_get_clean();?><?php if ($_tmp5==3){?>
                                    <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('initiation/initiation/detail');?>
/<?php echo $_smarty_tpl->tpl_vars['result']->value['id_inisiasi'];?>
" class="btn btn-xs btn-warning" title="Detail"><i class="fa fa-book" title="Detail"></i> Detail</a>
                                        <?php }else{ ?>
                                    <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('initiation/initiation/edit/').($_smarty_tpl->tpl_vars['result']->value['id_inisiasi']));?>
" class="btn btn-xs btn-primary" title="Edit"><i class="fa fa-pencil" title="Edit"></i> Edit</a>
                                    <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('initiation/initiation/detail');?>
/<?php echo $_smarty_tpl->tpl_vars['result']->value['id_inisiasi'];?>
" class="btn btn-xs btn-warning" title="Detail"><i class="fa fa-book" title="Detail"></i> Detail</a>
                                    <a class="btn btn-xs btn-danger" data-toggle="modal" data-target="#<?php echo (($tmp = @$_smarty_tpl->tpl_vars['result']->value['id_inisiasi'])===null||$tmp==='' ? '' : $tmp);?>
"><i class="fa fa-trash-o"></i> Delete</a>
                                    <!-- Modal -->
                                      <div class="modal fade" id="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['result']->value['id_inisiasi'])===null||$tmp==='' ? '' : $tmp);?>
" role="dialog">
                                        <div class="modal-dialog modal-lg">
  -                                        <div class="modal-content">
                                            <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                                              <h4 class="modal-title">Delete Initiation</h4>
                                            </div>
                                            <div class="modal-body"> 

                                                 <div class="box-body">
                                                        <form class="form-horizontal" action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('initiation/initiation/delete_process');?>
" method="post">
                                                            <input type="hidden" name="id_initiation" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['result']->value['id_inisiasi'])===null||$tmp==='' ? '' : $tmp);?>
">
                                                            <div class="box-body">
                                                                <div class="form-group">
                                                                    <label for="id_initiation" class="col-sm-2 control-label">Project Title</label>
                                                                    <div class="col-sm-8">
                                                                        <input type="text" name="id_initiation" disabled value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['result']->value['project_title'])===null||$tmp==='' ? '' : $tmp);?>
" class="form-control" id="id_initiation" placeholder="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- /.box-body -->
                                                            <div class="box-footer">
                                                                <div class="row">
                                                                    <div class="col-md-3 col-md-offset-8">
                                                                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o"></i> Hapus</button>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- /.box-footer -->
                                                        </form>
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                          </div>
                                        </div>
                                     </div>
                                        <?php }?>
                                <?php }else{?><?php ob_start();?><?php echo $_smarty_tpl->getVariable('department')->value;?>
<?php $_tmp6=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->getVariable('jabatan')->value;?>
<?php $_tmp7=ob_get_clean();?><?php if ($_tmp6==10||$_tmp7==1){?>
                                    <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('initiation/initiation/edit/').($_smarty_tpl->tpl_vars['result']->value['id_inisiasi']));?>
" class="btn btn-xs btn-primary" title="Edit"><i class="fa fa-pencil" title="Edit"></i> Edit</a>
                                    <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('initiation/initiation/detail');?>
/<?php echo $_smarty_tpl->tpl_vars['result']->value['id_inisiasi'];?>
" class="btn btn-xs btn-warning" title="Detail"><i class="fa fa-book" title="Detail"></i> Detail</a>
                                    <a class="btn btn-xs btn-danger" data-toggle="modal" data-target="#<?php echo (($tmp = @$_smarty_tpl->tpl_vars['result']->value['id_inisiasi'])===null||$tmp==='' ? '' : $tmp);?>
"><i class="fa fa-trash-o"></i> Delete</a>
                                    <!-- Modal -->
                                      <div class="modal fade" id="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['result']->value['id_inisiasi'])===null||$tmp==='' ? '' : $tmp);?>
" role="dialog">
                                        <div class="modal-dialog modal-lg">
  -                                        <div class="modal-content">
                                            <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                                              <h4 class="modal-title">Delete Initiation</h4>
                                            </div>
                                            <div class="modal-body"> 

                                                 <div class="box-body">
                                                        <form class="form-horizontal" action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('initiation/initiation/delete_process');?>
" method="post">
                                                            <input type="hidden" name="id_initiation" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['result']->value['id_inisiasi'])===null||$tmp==='' ? '' : $tmp);?>
">
                                                            <div class="box-body">
                                                                <div class="form-group">
                                                                    <label for="id_initiation" class="col-sm-2 control-label">Project Title</label>
                                                                    <div class="col-sm-8">
                                                                        <input type="text" name="id_initiation" disabled value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['result']->value['project_title'])===null||$tmp==='' ? '' : $tmp);?>
" class="form-control" id="id_initiation" placeholder="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- /.box-body -->
                                                            <div class="box-footer">
                                                                <div class="row">
                                                                    <div class="col-md-3 col-md-offset-8">
                                                                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o"></i> Hapus</button>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- /.box-footer -->
                                                        </form>
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                          </div>
                                        </div>
                                     </div>                                <?php }else{ ?>
                                    <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('initiation/initiation/detail');?>
/<?php echo $_smarty_tpl->tpl_vars['result']->value['id_inisiasi'];?>
" class="btn btn-xs btn-warning" title="Detail"><i class="fa fa-book" title="Detail"></i> Detail</a>
                                <?php }}?>
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
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    <?php echo (($tmp = @$_smarty_tpl->getVariable('pagination')->value['data'])===null||$tmp==='' ? '' : $tmp);?>

                </div>
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
</section>