<?php /* Smarty version Smarty-3.0.7, created on 2017-08-11 08:33:50
         compiled from "application/views\master/client/edit.html" */ ?>
<?php /*%%SmartyHeaderCode:31107598d4fce7e3b68-45209681%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'aa1115ae5e60d943c73eb276415735508ccf4483' => 
    array (
      0 => 'application/views\\master/client/edit.html',
      1 => 1502432805,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '31107598d4fce7e3b68-45209681',
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
                        <input type="hidden" name="no_identitas" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['id_client'])===null||$tmp==='' ? '' : $tmp);?>
">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="client_name" class="col-sm-2 control-label">Nama Client</label>
                                <div class="col-sm-4">
                                    <input type="text" name="client_name" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['client_name'])===null||$tmp==='' ? '' : $tmp);?>
" class="form-control" id="client_name" placeholder="">
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
