<?php /* Smarty version Smarty-3.0.7, created on 2017-09-05 04:46:52
         compiled from "application/views\base/admin/sidebar.html" */ ?>
<?php /*%%SmartyHeaderCode:2804259ae101ce9ff35-62234825%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd2294aa39aa84b84171b6c8b42787b94738ada19' => 
    array (
      0 => 'application/views\\base/admin/sidebar.html',
      1 => 1503646879,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2804259ae101ce9ff35-62234825',
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