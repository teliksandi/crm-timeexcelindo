<?php /* Smarty version Smarty-3.0.7, created on 2017-08-16 09:49:12
         compiled from "application/views/misc/rkakl/import.html" */ ?>
<?php /*%%SmartyHeaderCode:9744664275993b2a865f816-73762739%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cd5f6a2a3ad3f5279beb78ba97fbf4d28a9421a0' => 
    array (
      0 => 'application/views/misc/rkakl/import.html',
      1 => 1502851697,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9744664275993b2a865f816-73762739',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<section class="content-header">
    <h1>
        Import File Backup RKAKL
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-lock"></i> Miscellaneous</a></li>
        <li class="active">Import File Backup RKAKL </li>
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
                    <h3 class="box-title"><i class="fa fa-cloud-upload"></i> Upload File</h3>
                </div>
                <div class="box-body">
                    <form class="form-horizontal" action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('misc/importrkakl/import_process');?>
" method="post" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="category_nm" class="col-sm-2 control-label">File Backup RKAKL</label>
                                <div class="col-sm-4">
                                    <input type="file" name="file_nm" value="" class="form-control" id="file_nm" placeholder="">
                                </div>
                                <div class="col-sm-4">
                                    <button type="submit" name="upload" class="btn btn-success">Import !</button>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="category_nm" class="col-sm-2 control-label">File Backup Extension</label>
                                <div class="col-sm-4">
                                    <input type="text" name="file_ext" value="16" class="form-control" id="file_ext" placeholder="Ekstensi File">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.col -->
    </div>
</section>