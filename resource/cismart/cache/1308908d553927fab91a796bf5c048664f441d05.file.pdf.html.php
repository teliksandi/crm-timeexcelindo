<?php /* Smarty version Smarty-3.0.7, created on 2017-11-01 09:14:09
         compiled from "application/views\tambahan/pdf.html" */ ?>
<?php /*%%SmartyHeaderCode:205681032259f98251a65983-59487121%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1308908d553927fab91a796bf5c048664f441d05' => 
    array (
      0 => 'application/views\\tambahan/pdf.html',
      1 => 1509523771,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '205681032259f98251a65983-59487121',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_smarty_tpl->getVariable('val')->value!==''){?>
	<embed src="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
resource/doc/pdf/<?php echo $_smarty_tpl->getVariable('judul')->value;?>
" type="application/pdf" width="100%" height="700px">
<?php }else{ ?>
	<br>
	</br>
	<br>
	</br>
	<center>
	<b><?php echo $_smarty_tpl->getVariable('judul')->value;?>
</b>
	<a href="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
resource/doc/pdf/<?php echo $_smarty_tpl->getVariable('judul')->value;?>
"><h2>klik Disini download File</h2></a>
	</center>
<?php }?>

