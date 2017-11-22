<?php /* Smarty version Smarty-3.0.7, created on 2017-09-14 08:05:33
         compiled from "application/views\settings/menu/navigation.html" */ ?>
<?php /*%%SmartyHeaderCode:2477559ba1c2d0500d2-73162011%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c4b0f92528e55df55ef2ec07ed41b3f0614076d5' => 
    array (
      0 => 'application/views\\settings/menu/navigation.html',
      1 => 1503646882,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2477559ba1c2d0500d2-73162011',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="head-content">
    <h3>Navigation - <?php echo (($tmp = @$_smarty_tpl->getVariable('portal')->value['portal_nm'])===null||$tmp==='' ? '' : $tmp);?>
</h3>
    <div class="head-content-nav">
        <ul>
            <li><a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('settings/adminmenu/add/').($_smarty_tpl->getVariable('portal')->value['portal_id']));?>
"><img src="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
resource/doc/images/icon/add-icon.png" alt="" /> Add Menu</a></li>
            <li><a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('settings/adminmenu/navigation/').($_smarty_tpl->getVariable('portal')->value['portal_id']));?>
" class="active">List Menu</a></li>
            <li><a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('settings/adminmenu');?>
">Web Portal</a></li>
        </ul>
    </div>
    <div class="clear"></div>
</div>
<!-- notification template -->
<?php $_template = new Smarty_Internal_Template("base/templates/notification.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<!-- end of notification template-->
<table class="table-view" width="100%">
    <tr>
        <th width="5%"></th>
        <th width="40%">Judul Menu</th>
        <th width="22%">Alamat</th>
        <th width="9%">Digunakan</th>
        <th width="9%">Ditampilkan</th>
        <th width="15%"></th>
    </tr>
    <?php echo (($tmp = @$_smarty_tpl->getVariable('rs_id')->value)===null||$tmp==='' ? '' : $tmp);?>

</table>