<?php /* Smarty version Smarty-3.0.7, created on 2017-11-22 10:11:44
         compiled from "application/views\master/client/index.html" */ ?>
<?php /*%%SmartyHeaderCode:37935a153f50449ac4-14936595%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '47a87770c0468983a20951053257d536eaafaf2c' => 
    array (
      0 => 'application/views\\master/client/index.html',
      1 => 1511174360,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '37935a153f50449ac4-14936595',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<section class="content-header">
    <h1>
        Pengolahan Data Client
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-database"></i> Master</a></li>
        <li class="active">Client</li>
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
                    <form class="form-horizontal" action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('master/client/search_process');?>
" method="post">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="client_name" class="col-sm-2 control-label">Nama Client</label>
                                <div class="col-sm-4">
                                    <input type="text" name="client_name" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('search')->value['client_name'])===null||$tmp==='' ? '' : $tmp);?>
" class="form-control" id="client_name" placeholder="">
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
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Tabel Data Client</h3>
                    <div class="box-tools">
                        <?php ob_start();?><?php echo $_smarty_tpl->getVariable('department')->value;?>
<?php $_tmp1=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->getVariable('department')->value;?>
<?php $_tmp2=ob_get_clean();?><?php if ($_tmp1==1||$_tmp2==10){?>
                        <a class="btn btn-sm btn-success" href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('master/client/add_client');?>
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
                                <td width="15%" align="middle"><b>Client Nama</b></td>
                                <td width="20%" align="middle"><b>Client Address</b></td>
                                <td width="15%" align="middle"><b>Person Name</b></td>
                                <td width="10%" align="middle"><b>Job Position</b></td>
                                <td width="5%" align="middle"><b>Phone Number</b></td>
                                <td width="15%" align="middle"><b>Email</b></td>
                                <td width="15%" align="middle"><b>Actions</b></td>
                            </tr>
<?php ob_start();?><?php echo $_smarty_tpl->getVariable('department')->value;?>
<?php $_tmp3=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->getVariable('department')->value;?>
<?php $_tmp4=ob_get_clean();?><?php if ($_tmp3==1||$_tmp4==10){?>
                            <?php  $_smarty_tpl->tpl_vars['result'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_id')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['result']->key => $_smarty_tpl->tpl_vars['result']->value){
?>
                            <tr>
                                <td align="middle"><?php echo $_smarty_tpl->getVariable('no')->value++;?>
</td>
                                <td align="middle"><?php echo $_smarty_tpl->tpl_vars['result']->value['client_name'];?>
</td>
                                <td align="middle"><?php echo $_smarty_tpl->tpl_vars['result']->value['client_address'];?>
</td>
                                <td align="middle"><?php echo $_smarty_tpl->tpl_vars['result']->value['person_name'];?>
</td>
                                <td align="middle"><?php echo $_smarty_tpl->tpl_vars['result']->value['job_position'];?>
</td>
                                <td align="middle"><?php echo $_smarty_tpl->tpl_vars['result']->value['telp'];?>
</td>
                                <td align="middle"><?php echo $_smarty_tpl->tpl_vars['result']->value['email'];?>
</td>
                                <td>
                                   <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('master/client/edit');?>
/<?php echo $_smarty_tpl->tpl_vars['result']->value['id_client'];?>
" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i> Edit</a>
                                    <a class="btn btn-xs btn-danger" data-toggle="modal" data-target="#<?php echo (($tmp = @$_smarty_tpl->tpl_vars['result']->value['id_client'])===null||$tmp==='' ? '' : $tmp);?>
   "><i class="fa fa-trash-o"></i> Delete</a>

                                     <!-- Modal -->
                                      <div class="modal fade" id="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['result']->value['id_client'])===null||$tmp==='' ? '' : $tmp);?>
" role="dialog">
                                        <div class="modal-dialog modal-lg">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                                              <h4 class="modal-title">Delete Client</h4>
                                            </div>
                                            <div class="modal-body"> 

                                                 <div class="box-body">
                                                        <form class="form-horizontal" action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('master/client/delete_process');?>
" method="post">
                                                            <input type="hidden" name="id_client" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['result']->value['id_client'])===null||$tmp==='' ? '' : $tmp);?>
">
                                                            <div class="box-body">
                                                                <div class="form-group">
                                                                    <label for="client_name" class="col-sm-2 control-label">Nama Client</label>
                                                                    <div class="col-sm-8">
                                                                        <input type="text" name="client_name" disabled value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['result']->value['client_name'])===null||$tmp==='' ? '' : $tmp);?>
" class="form-control" id="client_name" placeholder="" title="Masukkan Nama Client">
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
                                </td>
                            </tr>
                            <?php }} else { ?>
                            <tr>
                                <td colspan="4">
                                    Data tidak ditemukan!
                                </td>
                            </tr>
                            <?php } ?>
<?php }else{ ?>
                            <tr>
                                <td colspan="4">
                                    <br>
                                        <b>Anda tidak memiliki hak akses untuk mengakses data karyawan</b>
                                    <br>
                                </td>
                            </tr>
<?php }?>
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