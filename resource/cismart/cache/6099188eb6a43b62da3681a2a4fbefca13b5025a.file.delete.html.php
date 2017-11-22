<?php /* Smarty version Smarty-3.0.7, created on 2017-08-25 13:56:47
         compiled from "application/views/initiation/delete.html" */ ?>
<?php /*%%SmartyHeaderCode:1584594482599fca2fedcb52-21136067%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6099188eb6a43b62da3681a2a4fbefca13b5025a' => 
    array (
      0 => 'application/views/initiation/delete.html',
      1 => 1502872003,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1584594482599fca2fedcb52-21136067',
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
        <li><a href="#"> Kategori</a></li>
        <li class="active">Hapus Data</li>
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
                    <h3 class="box-title">Data Client</h3>
                    <div class="box-tools">
                        <a class="btn btn-sm btn-default" href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('initiation/initiation');?>
" ><i class="fa fa-long-arrow-left"></i> Kembali</a>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form class="form-horizontal" action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('initiation/delete_process');?>
" method="post">
                        <input type="hidden" name="id_client" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['id_client'])===null||$tmp==='' ? '' : $tmp);?>
">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="client_name" class="col-sm-2 control-label">Nama Client</label>
                                <div class="col-sm-4">
                                    <input type="text" name="client_name" disabled value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['client_name'])===null||$tmp==='' ? '' : $tmp);?>
" class="form-control" id="client_name" placeholder="">
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <div class="row">
                                <div class="col-md-3 col-md-offset-2">
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o"></i> Hapus</button>
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
