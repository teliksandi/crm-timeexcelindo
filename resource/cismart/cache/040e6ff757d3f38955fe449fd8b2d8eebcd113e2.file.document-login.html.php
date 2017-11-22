<?php /* Smarty version Smarty-3.0.7, created on 2017-08-16 10:20:42
         compiled from "application/views/base/operator/document-login.html" */ ?>
<?php /*%%SmartyHeaderCode:17993572935993ba0a792136-48763845%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '040e6ff757d3f38955fe449fd8b2d8eebcd113e2' => 
    array (
      0 => 'application/views/base/operator/document-login.html',
      1 => 1502853580,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17993572935993ba0a792136-48763845',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html>
<html lang="en">
    <!-- head -->
    <head>
        <meta http-equiv="content-type" content="text/html;charset=utf-8" />
        <meta name='description' content="<?php echo (($tmp = @$_smarty_tpl->getVariable('site')->value['meta_desc'])===null||$tmp==='' ? '' : $tmp);?>
" />
        <meta name='keywords' content="<?php echo (($tmp = @$_smarty_tpl->getVariable('site')->value['meta_key'])===null||$tmp==='' ? '' : $tmp);?>
" />
        <meta name='robots' content='index,follow' />
        <title>Login - <?php echo (($tmp = @$_smarty_tpl->getVariable('site')->value['site_title'])===null||$tmp==='' ? '' : $tmp);?>
</title>
        <link href="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
/resource/doc/images/icon/favicon-operator.png" rel="SHORTCUT ICON" />
        <!-- themes style -->
        <!-- other style -->
        <?php echo $_smarty_tpl->getVariable('LOAD_STYLE')->value;?>

        <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->getVariable('THEMESPATH')->value;?>
" media="screen" />
    </head>
    <!-- body -->
    <body class="hold-transition login-page full">
        <div class="login-box">
            <div class="login-logo">
                <a href="#"><b>PT. Time Excelindo</b></a>
            </div><!-- /.login-logo -->
            <div class="login-box-body">
                <?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('template_content')->value), $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
            </div><!-- /.login-box-body -->
        </div>
        <!-- load javascript -->
        <?php echo $_smarty_tpl->getVariable('LOAD_JAVASCRIPT')->value;?>

        <!-- end of javascript	-->
    </body>
    <!-- end body -->
</html>
