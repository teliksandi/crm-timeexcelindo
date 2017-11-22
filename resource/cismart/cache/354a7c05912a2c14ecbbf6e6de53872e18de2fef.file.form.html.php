<?php /* Smarty version Smarty-3.0.7, created on 2017-11-15 03:25:46
         compiled from "application/views\login/operator/form.html" */ ?>
<?php /*%%SmartyHeaderCode:2809859b78edcf16241-31378676%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '354a7c05912a2c14ecbbf6e6de53872e18de2fef' => 
    array (
      0 => 'application/views\\login/operator/form.html',
      1 => 1506307910,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2809859b78edcf16241-31378676',
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
