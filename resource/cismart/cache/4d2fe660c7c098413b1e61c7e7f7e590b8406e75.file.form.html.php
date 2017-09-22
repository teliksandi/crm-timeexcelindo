<?php /* Smarty version Smarty-3.0.7, created on 2017-08-16 10:20:42
         compiled from "application/views/login/operator/form.html" */ ?>
<?php /*%%SmartyHeaderCode:19493076465993ba0a83dc03-70522161%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4d2fe660c7c098413b1e61c7e7f7e590b8406e75' => 
    array (
      0 => 'application/views/login/operator/form.html',
      1 => 1502853620,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19493076465993ba0a83dc03-70522161',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

<?php if ((($tmp = @$_smarty_tpl->getVariable('login_st')->value)===null||$tmp==='' ? '' : $tmp)=='error'){?>
<div class="alert alert-danger alert-dismissable">
    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
    <p><strong>Akun Anda Tidak Ditemukan</strong>, Coba Ulangi atau Hubungi Administrator </p>
    <div class="clear"></div>
</div>
<?php }elseif((($tmp = @$_smarty_tpl->getVariable('login_st')->value)===null||$tmp==='' ? '' : $tmp)=='locked'){?>
<div class="alert alert-danger alert-dismissable">
    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
    <p><strong>Akun Anda Telah Terkunci</strong>, Coba Ulangi atau Hubungi Administrator </p>
    <div class="clear"></div>
</div>
<?php }else{ ?>
<div class="alert alert-warning alert-dismissable">
    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
    <p><strong>Mohon Login Dahulu</strong>, Untuk Mengakses Aplikasi Ini! </p>
    <div class="clear"></div>
</div>
<?php }?>
<form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('login/operatorlogin/login_process');?>
" method="post">
    <div class="form-group has-feedback">
        <input class="form-control" placeholder="Username" name="username" maxlength="30" type="text" autofocus>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
    </div>
    <div class="form-group has-feedback">
        <input class="form-control" placeholder="Password" name="pass" maxlength="30" type="password" value="">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
    </div>
    <div class="row">
        <div class="col-xs-4 pull-right">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
        </div><!-- /.col -->
    </div>
</form>
