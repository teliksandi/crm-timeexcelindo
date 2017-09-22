<?php /* Smarty version Smarty-3.0.7, created on 2017-08-15 22:47:10
         compiled from "application/views/operator/welcome/indes.php" */ ?>
<?php /*%%SmartyHeaderCode:1154794615993177e8342a2-03514912%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e3992a5daa69d4bab9c60c3a8a4b93f8d7e5ec95' => 
    array (
      0 => 'application/views/operator/welcome/indes.php',
      1 => 1502811427,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1154794615993177e8342a2-03514912',
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