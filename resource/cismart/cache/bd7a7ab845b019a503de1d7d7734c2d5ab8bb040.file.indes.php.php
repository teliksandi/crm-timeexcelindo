<?php /* Smarty version Smarty-3.0.7, created on 2017-11-15 03:25:17
         compiled from "application/views\operator/welcome/indes.php" */ ?>
<?php /*%%SmartyHeaderCode:952059a38a866bbf85-12717146%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bd7a7ab845b019a503de1d7d7734c2d5ab8bb040' => 
    array (
      0 => 'application/views\\operator/welcome/indes.php',
      1 => 1506307911,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '952059a38a866bbf85-12717146',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
        <<?php ?>?php  ini_set( 'display_errors', 1 );   
    error_reporting( E_ALL );    
    $from = "latif_cf@yahoo.co.id";    
    $to = "tioprisbowo25@gmail.com";    
    $subject = "Checking PHP mail";    
    $message = "PHP mail berjalan dengan baik";   
    $headers = "From:" . $from;    
    mail($to,$subject,$message, $headers);    
    echo "Pesan email sudah terkirim.";?<?php ?>>