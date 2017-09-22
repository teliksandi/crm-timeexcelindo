<?php /* Smarty version Smarty-3.0.7, created on 2017-08-16 09:48:43
         compiled from "application/views/security/encryption/list.html" */ ?>
<?php /*%%SmartyHeaderCode:19230562435993b28b433173-96879848%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a91bb92cd52464f398eb807e772c9ebc2b08bc00' => 
    array (
      0 => 'application/views/security/encryption/list.html',
      1 => 1502851655,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19230562435993b28b433173-96879848',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<section class="content-header">
    <h1>
        Enkripsi File
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-lock"></i> Security</a></li>
        <li class="active">Enkripsi File</li>
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
                    <form class="form-horizontal" action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('security/encryption/encrypt_process');?>
" method="post" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="category_nm" class="col-sm-2 control-label">File yg akan di-enkripsi</label>
                                <div class="col-sm-4">
                                    <input type="file" name="file_nm" value="" class="form-control" id="file_nm" placeholder="">
                                </div>
                                <div class="col-sm-4">
                                    <button type="submit" name="upload" class="btn btn-success">Enkripsi File !</button>
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