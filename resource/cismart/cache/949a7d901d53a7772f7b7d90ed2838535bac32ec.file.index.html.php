<?php /* Smarty version Smarty-3.0.7, created on 2017-09-12 04:05:14
         compiled from "application/views\master/karyawan/index.html" */ ?>
<?php /*%%SmartyHeaderCode:385159b740dacc0a33-32299629%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '949a7d901d53a7772f7b7d90ed2838535bac32ec' => 
    array (
      0 => 'application/views\\master/karyawan/index.html',
      1 => 1505181711,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '385159b740dacc0a33-32299629',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<section class="content-header">
    <h1>
        Pengolahan Data Karyawan
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-database"></i> Master</a></li>
        <li class="active">Karyawan</li>
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
                    <form class="form-horizontal" action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('master/karyawan/search_process');?>
" method="post">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="nama_karyawan" class="col-sm-2 control-label">Nama Karyawan</label>
                                <div class="col-sm-4">
                                    <input type="text" name="nama_karyawan" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('search')->value['nama_karyawan'])===null||$tmp==='' ? '' : $tmp);?>
" class="form-control" id="nama_karyawan" placeholder="">
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
                    <h3 class="box-title">Tabel Data Karyawan</h3>
                    <div class="box-tools">
                        <a class="btn btn-sm btn-success" href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('master/karyawan/add');?>
" ><i class="fa fa-plus"></i> Tambah Data</a>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-striped">
                        <tbody> 
                            <tr>
                                <td width="5%" align="middle"><b>No</b></td>
                                <td width="10%" align="middle"><b>NIK</b></td>
                                <td width="20%" align="middle"><b>Nama</b></td>
                                <td width="20" align="middle"><b>Department</b></td>
                                <td width="15%" align="middle"><b>Email</b></td>
                                <td width="15%" align="middle"><b>HP</b></td>
                                <td width="10%" align="middle"><b>Status</b></td>
                                <td width="13%" align="middle"><b>Action</b></td>
                            </tr>
                            <?php  $_smarty_tpl->tpl_vars['result'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('dpt_id')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['result']->key => $_smarty_tpl->tpl_vars['result']->value){
?>
                            <tr>
                                <td align="middle"><?php echo $_smarty_tpl->getVariable('no')->value++;?>
</td>
                                <td align="middle"><?php echo $_smarty_tpl->tpl_vars['result']->value['nik'];?>
</td>
                                <td align="middle"><?php echo $_smarty_tpl->tpl_vars['result']->value['nama_karyawan'];?>
</td> 
                                <td align="middle"><?php echo $_smarty_tpl->tpl_vars['result']->value['nama_department'];?>
</td>
                                <td align="middle"><?php echo $_smarty_tpl->tpl_vars['result']->value['email'];?>
</td>
                                <td align="middle"><?php echo $_smarty_tpl->tpl_vars['result']->value['telp'];?>
</td>
                                <td align="middle"><?php echo $_smarty_tpl->tpl_vars['result']->value['status'];?>
</td>
                                <td>
                                    <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('master/karyawan/edit');?>
/<?php echo $_smarty_tpl->tpl_vars['result']->value['id_karyawan'];?>
" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i> Edit</a>
                                    <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('master/karyawan/delete');?>
/<?php echo $_smarty_tpl->tpl_vars['result']->value['id_karyawan'];?>
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


