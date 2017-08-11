<?php /* Smarty version Smarty-3.0.7, created on 2017-08-11 09:19:26
         compiled from "application/views\master/client/index.html" */ ?>
<?php /*%%SmartyHeaderCode:27867598d5a7e7fc901-50512907%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '47a87770c0468983a20951053257d536eaafaf2c' => 
    array (
      0 => 'application/views\\master/client/index.html',
      1 => 1502435356,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '27867598d5a7e7fc901-50512907',
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
            <div class="box box-primary">
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
                                    <button type="submit" value="Reset" name="save" class="btn btn-default">Reset</button>
                                    <button type="submit" value="Cari" name="save" class="btn btn-primary">Cari</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Tabel Data Client</h3>
                    <div class="box-tools">
                        <a class="btn btn-sm btn-success" href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('master/client/add_client');?>
" ><i class="fa fa-plus"></i> Tambah Data</a>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th width="5%">No.</th>
                                <th width="10%">Alias Name</th>
                                <th width="20%">Client Nama</th>
                                <th width="20">Client Address</th>
                                <th width="15%">Person Name</th>
                                <th width="15%">Job Position</th>
                                <th width="10%">Telp</th>
                                <th width="13%">Email</th>
                            </tr>
                            <?php  $_smarty_tpl->tpl_vars['result'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_id')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['result']->key => $_smarty_tpl->tpl_vars['result']->value){
?>
                            <tr>
                                <td align="middle"><?php echo $_smarty_tpl->getVariable('no')->value++;?>
</td>
                                <td align="middle"><?php echo $_smarty_tpl->tpl_vars['result']->value['alias_name'];?>
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
                                    <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('master/client/delete');?>
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


