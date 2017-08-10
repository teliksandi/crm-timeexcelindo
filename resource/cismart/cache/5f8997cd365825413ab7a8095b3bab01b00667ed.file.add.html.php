<?php /* Smarty version Smarty-3.0.7, created on 2017-08-06 09:01:16
         compiled from "application/views\settings/user/add.html" */ ?>
<?php /*%%SmartyHeaderCode:55745986bebc5c63c8-67884535%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5f8997cd365825413ab7a8095b3bab01b00667ed' => 
    array (
      0 => 'application/views\\settings/user/add.html',
      1 => 1501832426,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '55745986bebc5c63c8-67884535',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="head-content">
    <h3>Users</h3>
    <div class="head-content-nav">
        <ul>
            <li><a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('settings/adminuser/add');?>
" class="active"><img src="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
resource/doc/images/icon/add-icon.png" alt="" /> Add Data</a></li>
            <li><a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('settings/adminuser');?>
">List Data</a></li>
        </ul>
    </div>
    <div class="clear"></div>
</div>
<!-- notification template -->
<?php $_template = new Smarty_Internal_Template("base/templates/notification.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<!-- end of notification template-->
<form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('settings/adminuser/add_process');?>
" method="post">
    <table class="table-input" width="100%">
        <tr class="headrow">
            <th colspan="2">Tambah Data</th>
        </tr>
        <tr>
            <th colspan="2">User Info</th>
        </tr>
        <tr>
            <td width="25%">Nama Lengkap *</td>
            <td width="75%"><input type="text" name="nama_lengkap" maxlength="50" size="30" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['nama_lengkap'])===null||$tmp==='' ? '' : $tmp);?>
" /></td>
        </tr>
        <tr>
            <td>Alamat *</td>
            <td><input type="text" name="alamat" maxlength="255" size="60" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['alamat'])===null||$tmp==='' ? '' : $tmp);?>
" /> </td>
        </tr>
        <tr>
            <td>Email *</td>
            <td><input type="text" name="user_mail" maxlength="50" size="30" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['user_mail'])===null||$tmp==='' ? '' : $tmp);?>
" /></td>
        </tr>
        <tr>
            <td>Nomor Telepon *</td>
            <td><input type="text" name="no_telp" maxlength="50" size="30" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['no_telp'])===null||$tmp==='' ? '' : $tmp);?>
" /> </td>
        </tr>
        <tr>
            <th colspan="2">User Account</th>
        </tr>
        <tr>
            <td>User Name *</td>
            <td><input type="text" name="user_name" maxlength="50" size="20" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['user_name'])===null||$tmp==='' ? '' : $tmp);?>
" /> </td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="text" name="user_pass" maxlength="50" size="20" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['user_pass'])===null||$tmp==='' ? '' : $tmp);?>
" /></td>
        </tr>
        <tr>
            <td>Lock Status *</td>
            <td>
                <select name="lock_st">
                    <option value="0" <?php ob_start();?><?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['lock_st'])===null||$tmp==='' ? '' : $tmp);?>
<?php $_tmp1=ob_get_clean();?><?php if ($_tmp1=="0"){?>selected="selected"<?php }?>>Active</option>
                    <option value="1" <?php ob_start();?><?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['lock_st'])===null||$tmp==='' ? '' : $tmp);?>
<?php $_tmp2=ob_get_clean();?><?php if ($_tmp2=="1"){?>selected="selected"<?php }?>>Blocked</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Hak Akses *</td>
            <td>
                <select name="role_id">
                    <option></option>
                    <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_role')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['data']->value['role_id'];?>
" <?php ob_start();?><?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['role_id'])===null||$tmp==='' ? '' : $tmp);?>
<?php $_tmp3=ob_get_clean();?><?php if ($_tmp3==$_smarty_tpl->tpl_vars['data']->value['role_id']){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['data']->value['role_nm'];?>
</option>
                    <?php }} ?>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="save" value="Simpan" class="edit-button" /> </td>
        </tr>
    </table>
</form>