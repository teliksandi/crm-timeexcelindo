<?php /* Smarty version Smarty-3.0.7, created on 2017-08-15 21:41:35
         compiled from "application/views/base/admin/sidebar.html" */ ?>
<?php /*%%SmartyHeaderCode:20213026075993081fd1efa2-91233435%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3c8df65e90824a1f2dab9dcef9344fc7079ec485' => 
    array (
      0 => 'application/views/base/admin/sidebar.html',
      1 => 1502704457,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20213026075993081fd1efa2-91233435',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="side-info">
    <img src="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
resource/doc/images/icon/user-image.png" alt="" />
    <p><b><?php echo (($tmp = @$_smarty_tpl->getVariable('com_user')->value['nama_lengkap'])===null||$tmp==='' ? '' : $tmp);?>
</b></p>
    <p><?php echo (($tmp = @$_smarty_tpl->getVariable('com_user')->value['role_nm'])===null||$tmp==='' ? '' : $tmp);?>
</p>
    <div class="clear"></div>
</div>
<?php echo (($tmp = @$_smarty_tpl->getVariable('list_sidebar_nav')->value)===null||$tmp==='' ? '' : $tmp);?>

<div class="side-menu">
    <h3><a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('login/adminlogin/logout_process');?>
" class="logout">Logout</a></h3>
</div>