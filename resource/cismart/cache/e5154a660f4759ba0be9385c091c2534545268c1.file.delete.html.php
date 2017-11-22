<?php /* Smarty version Smarty-3.0.7, created on 2017-10-12 03:55:32
         compiled from "application/views\initiation/delete.html" */ ?>
<?php /*%%SmartyHeaderCode:105186878959decb94c22f17-08999918%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e5154a660f4759ba0be9385c091c2534545268c1' => 
    array (
      0 => 'application/views\\initiation/delete.html',
      1 => 1507708832,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '105186878959decb94c22f17-08999918',
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
        <li><a href="#"><i class="fa fa-book"></i> Initiation</a></li>
        <li><a href="#"> Data Initiation</a></li>
        <li class="active">Delete Data Initiation</li>
    </ol>
</section>
<section class="content">
    <!-- notification template -->
    <?php $_template = new Smarty_Internal_Template("base/templates/notification.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
    <!-- end of notification template-->
     <div class="row">
        <div class="col-md-12">

            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Data Client</h3>
                    <div class="box-tools">
                        <a class="btn btn-sm btn-Primary" href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('initiation/initiation');?>
" ><i class="fa fa-long-arrow-left"></i> Kembali</a>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form class="form-horizontal" action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('initiation/delete_process');?>
" method="post">
                        <input type="hidden" name="client_name" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['client_name'])===null||$tmp==='' ? '' : $tmp);?>
">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="project_title" class="col-sm-2 control-label">Nama Client</label>
                                <div class="col-sm-4">
                                    <input type="text" name="project_title" disabled value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['project_title'])===null||$tmp==='' ? '' : $tmp);?>
" class="form-control" id="project_title" placeholder="">
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