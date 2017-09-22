<?php /* Smarty version Smarty-3.0.7, created on 2017-08-16 09:48:48
         compiled from "application/views/security/decryption/list.html" */ ?>
<?php /*%%SmartyHeaderCode:18449958755993b2906f8597-26479997%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '34319e2b9b7784929e90bdc97ad4feb8b856ea72' => 
    array (
      0 => 'application/views/security/decryption/list.html',
      1 => 1502851625,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18449958755993b2906f8597-26479997',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<section class="content-header">
    <h1>
        Dekrip File
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-lock"></i> Security</a></li>
        <li class="active">Dekrip File</li>
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
                    <form class="form-horizontal" action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('security/decryption/decrypt_process');?>
" method="post" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="category_nm" class="col-sm-2 control-label">File yg akan di-dekrip</label>
                                <div class="col-sm-4">
                                    <input type="file" name="file_nm" value="" class="form-control" id="file_nm" placeholder="">
                                </div>
                                <div class="col-sm-4">
                                    <button type="submit" name="upload" class="btn btn-success">Dekrip File !</button>
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