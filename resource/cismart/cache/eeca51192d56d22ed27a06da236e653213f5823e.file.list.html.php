<?php /* Smarty version Smarty-3.0.7, created on 2017-08-15 21:41:42
         compiled from "application/views/settings/menu/list.html" */ ?>
<?php /*%%SmartyHeaderCode:138486173159930826279996-45493037%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eeca51192d56d22ed27a06da236e653213f5823e' => 
    array (
      0 => 'application/views/settings/menu/list.html',
      1 => 1502704458,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '138486173159930826279996-45493037',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="head-content">
    <h3>Navigation</h3>
    <div class="head-content-nav">
        <ul>
            <li><a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('settings/adminmenu');?>
" class="active">Web Portal</a></li>
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
        <th width="5%">No</th>
        <th width="20%">Nama Portal</th>
        <th width="40%">Judul</th>
        <th width="20%">Jumlah Menu</th>
        <th width="15%"></th>
    </tr>
    <?php  $_smarty_tpl->tpl_vars['result'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['no'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_id')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['result']->key => $_smarty_tpl->tpl_vars['result']->value){
 $_smarty_tpl->tpl_vars['no']->value = $_smarty_tpl->tpl_vars['result']->key;
?>
    <tr <?php if (($_smarty_tpl->tpl_vars['no']->value%2)!=0){?>class="blink-row"<?php }?>>
        <td><?php echo $_smarty_tpl->tpl_vars['no']->value+1;?>
.</td>
        <td><?php echo $_smarty_tpl->tpl_vars['result']->value['portal_nm'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['result']->value['site_title'];?>
</td>
        <td align="center"><?php echo $_smarty_tpl->tpl_vars['result']->value['total_menu'];?>
</td>
        <td align="center">
            <a href="<?php ob_start();?><?php echo ('settings/adminmenu/navigation/').($_smarty_tpl->tpl_vars['result']->value['portal_id']);?>
<?php $_tmp1=ob_get_clean();?><?php echo $_smarty_tpl->getVariable('config')->value->site_url($_tmp1);?>
" class="button-edit">Edit Menu</a>
        </td>
    </tr>
    <?php }} else { ?>
    <tr>
        <td colspan="5">Empty</td>
    </tr>
    <?php } ?>
</table>