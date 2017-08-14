<?php /* Smarty version Smarty-3.0.7, created on 2017-08-14 07:13:19
         compiled from "application/views\master/client/edit.html" */ ?>
<?php /*%%SmartyHeaderCode:273065991316fe59659-89197068%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'aa1115ae5e60d943c73eb276415735508ccf4483' => 
    array (
      0 => 'application/views\\master/client/edit.html',
      1 => 1502687434,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '273065991316fe59659-89197068',
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
        <li><a href="#"> Client</a></li>
        <li class="active">Ubah Data</li>
    </ol>
</section>

<section class="content">
    <!-- notification template -->
    <?php $_template = new Smarty_Internal_Template("base/templates/notification.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
    <!-- end of notification template-->
    <div class="row">
        <div class="col-md-12">

            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Form Ubah Data Client</h3>
                    <div class="box-tools">
                        <a class="btn btn-sm btn-default" href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('master/client');?>
" ><i class="fa fa-long-arrow-left"></i> Kembali</a>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form class="form-horizontal" action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('master/client/edit_process');?>
" method="post">
                        <input type="hidden" name="id_client" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['id_client'])===null||$tmp==='' ? '' : $tmp);?>
">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="alias_name" class="col-sm-2 control-label">Alias Name</label>
                                <div class="col-sm-4">
                                    <input type="text" name="alias_name" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['alias_name'])===null||$tmp==='' ? '' : $tmp);?>
" class="form-control" id="Alias_name" placeholder="Nama Alias">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="client_name" class="col-sm-2 control-label">Nama Client</label>
                                <div class="col-sm-4">
                                    <input type="text" name="client_name" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['client_name'])===null||$tmp==='' ? '' : $tmp);?>
" class="form-control" id="client_name" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="client_address" class="col-sm-2 control-label">Nama Address</label>
                                <div class="col-sm-4">
                                    <input type="text" name="client_address" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['client_address'])===null||$tmp==='' ? '' : $tmp);?>
" class="form-control" id="client_address" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="person_name" class="col-sm-2 control-label">Person Name</label>
                                <div class="col-sm-4">
                                    <input type="text" name="person_name" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['person_name'])===null||$tmp==='' ? '' : $tmp);?>
" class="form-control" id="person_name" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="job_position" class="col-sm-2 control-label">Job Position</label>
                                <div class="col-sm-4">
                                    <input type="text" name="job_position" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['job_position'])===null||$tmp==='' ? '' : $tmp);?>
" class="form-control" id="job_position" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="telp" class="col-sm-2 control-label">Telp</label>
                                <div class="col-sm-4">
                                    <input type="text" name="telp" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['telp'])===null||$tmp==='' ? '' : $tmp);?>
" class="form-control" id="telp" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-4">
                                    <input type="text" name="email" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['email'])===null||$tmp==='' ? '' : $tmp);?>
" class="form-control" id="email" placeholder="">
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <div class="row">
                                <div class="col-md-3 col-md-offset-2">
                                    <button type="reset" class="btn btn-default">Reset</button>
                                    <button type="submit" class="btn btn-info">Simpan</button>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-footer -->
                    </form>
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
