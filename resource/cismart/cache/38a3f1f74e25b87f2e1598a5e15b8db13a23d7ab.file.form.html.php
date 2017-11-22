<?php /* Smarty version Smarty-3.0.7, created on 2017-08-15 21:41:28
         compiled from "application/views/login/admin/form.html" */ ?>
<?php /*%%SmartyHeaderCode:22924106359930818e25fe9-48989241%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '38a3f1f74e25b87f2e1598a5e15b8db13a23d7ab' => 
    array (
      0 => 'application/views/login/admin/form.html',
      1 => 1502704457,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '22924106359930818e25fe9-48989241',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="loginBox-body">
    <?php if ((($tmp = @$_smarty_tpl->getVariable('login_st')->value)===null||$tmp==='' ? '' : $tmp)==''){?>
    <p>
        <img src="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
resource/doc/images/icon/alert.png" alt="" />You are enter restricted area, <strong>Please Login</strong> First to acces this page !!
    </p>
    <form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('login/adminlogin/login_process');?>
" method="post">
        <label for="aid_username">Username :</label>
        <input type="text" name="username" maxlength="30" />
        <br />
        <label for="aid_password">Password :</label>
        <input type="password" name="pass" maxlength="30" />
        <br />
        <label> </label>
        <input class="button" type="submit" value="" name="save[login]" />
    </form>
    <?php }elseif((($tmp = @$_smarty_tpl->getVariable('login_st')->value)===null||$tmp==='' ? '' : $tmp)=='error'){?>
    <p>
        <img src="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
resource/doc/images/icon/alert.png" alt="" /><strong>Username or password</strong> not found, Please Try Again or contact your administrator
    </p>
    <form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('login/adminlogin/login_process');?>
" method="post">
        <label for="aid_username">Username :</label>
        <input type="text" name="username" maxlength="30" />
        <br />
        <label for="aid_password">Password :</label>
        <input type="password" name="pass" maxlength="30" />
        <br />
        <label> </label>
        <input class="button" type="submit" value="" name="save[login]" />
    </form>
    <?php }elseif((($tmp = @$_smarty_tpl->getVariable('login_st')->value)===null||$tmp==='' ? '' : $tmp)=='locked'){?>
    <p>
        <img src="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
resource/doc/images/icon/alert.png" alt="" />You account has been <strong>locked</strong>, Please contact your administrator to activate your account
    </p>
    <form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('login/adminlogin/login_process');?>
" method="post">
        <label for="aid_username">Username :</label>
        <input type="text" name="username" maxlength="30" />
        <br />
        <label for="aid_password">Password :</label>
        <input type="password" name="pass" maxlength="30" />
        <br />
        <label> </label>
        <input class="button" type="submit" value="" name="save[login]" />
    </form>
    <?php }elseif((($tmp = @$_smarty_tpl->getVariable('login_st')->value)===null||$tmp==='' ? '' : $tmp)=='still'){?>
    <p>
        <img src="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
resource/doc/images/icon/alert.png" alt="" /> You are still login. 
        Back to <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('home/adminwelcome');?>
">administrator menu</a><br />Or <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('login/adminlogin/logout_process');?>
"><strong>logout</strong></a> to end your session
    </p>
    <?php }?>
</div>