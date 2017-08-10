<?php /* Smarty version Smarty-3.0.7, created on 2017-08-06 07:54:41
         compiled from "application/views\login/operator/form.html" */ ?>
<?php /*%%SmartyHeaderCode:40875986af2124b798-93911212%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '354a7c05912a2c14ecbbf6e6de53872e18de2fef' => 
    array (
      0 => 'application/views\\login/operator/form.html',
      1 => 1501832425,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '40875986af2124b798-93911212',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

<?php if ((($tmp = @$_smarty_tpl->getVariable('login_st')->value)===null||$tmp==='' ? '' : $tmp)=='error'){?>
<div class="alert alert-danger alert-dismissable">
    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
    <p><strong>Your account is not found</strong>, Please Try Again or contact your administrator </p>
    <div class="clear"></div>
</div>
<?php }elseif((($tmp = @$_smarty_tpl->getVariable('login_st')->value)===null||$tmp==='' ? '' : $tmp)=='locked'){?>
<div class="alert alert-danger alert-dismissable">
    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
    <p><strong>Your account has been locked</strong>, Please Try Again or contact your administrator </p>
    <div class="clear"></div>
</div>
<?php }else{ ?>
<div class="alert alert-warning alert-dismissable">
    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
    <p><strong>Please Login First</strong>, to acces this application! </p>
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
