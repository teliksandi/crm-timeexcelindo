<?php /* Smarty version Smarty-3.0.7, created on 2017-08-15 18:44:35
         compiled from "application/views\master/karyawan/add.html" */ ?>
<?php /*%%SmartyHeaderCode:15856599324f3930039-88430934%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a3ba94c94deec91f2da2c797a7aaca2cb3c08a06' => 
    array (
      0 => 'application/views\\master/karyawan/add.html',
      1 => 1502815417,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15856599324f3930039-88430934',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<section class="content-header">
    <h1>
        Penambahan Data Karyawan
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-database"></i> Master</a></li>
        <li><a href="#"> Karyawan</a></li>
        <li class="active">Tambah Data</li>
    </ol>
</section>

<section class="content">
    <!-- notification template -->
    <?php $_template = new Smarty_Internal_Template("base/templates/notification.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
    <!-- end of notification template-->
    <div class="row">
        <div class="col-md-12">

            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Data Karyawan</h3>
                    <div class="box-tools">
                        <a class="btn btn-sm btn-default" href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('master/karyawan');?>
" ><i class="fa fa-long-arrow-left"></i> Kembali</a>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form class="form-horizontal" action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('master/karyawan/add_process');?>
" method="post">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="username" class="col-sm-2 control-label">Username</label>
                                <div class="col-sm-4">
                                    <input type="text" name="username" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['username'])===null||$tmp==='' ? '' : $tmp);?>
" class="form-control" id="username" placeholder="Username digunakan untuk login">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-sm-2 control-label">Password</label>
                                <div class="col-sm-2">
                                    <input type="password" name="password" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['password'])===null||$tmp==='' ? '' : $tmp);?>
" class="form-control" id="password" placeholder="Kata sandi">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nik" class="col-sm-2 control-label">NIK</label>
                                <div class="col-sm-2">
                                    <input type="text" name="nik" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['nik'])===null||$tmp==='' ? '' : $tmp);?>
" class="form-control" id="nik" placeholder="No. Induk Karyawan">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nama_karyawan" class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-4">
                                    <input type="text" name="nama_karyawan" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['nama_karyawan'])===null||$tmp==='' ? '' : $tmp);?>
" class="form-control" id="nama_karyawan" placeholder="Nama">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nama_alias" class="col-sm-2 control-label">Alias Name</label>
                                <div class="col-sm-4">
                                    <input type="text" name="nama_alias" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['nama_alias'])===null||$tmp==='' ? '' : $tmp);?>
" class="form-control" id="nama_alias" placeholder="Nama Panggilan">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="jenis_kelamin" class="col-sm-2 control-label">Sex</label>
                                <div class="col-sm-4">                                    
                                    <input type="radio" name="jenis_kelamin" value="Pria"/>Male
                                    <input type="radio" name="jenis_kelamin" value="Wanita"/>Female
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tempat_lahir" class="col-sm-2 control-label">Place, Date of Birth</label>
                                <div class="col-sm-2">
                                    <input type="text" name="tempat_lahir" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['tempat_lahir'])===null||$tmp==='' ? '' : $tmp);?>
" class="form-control" id="tempat_lahir" placeholder="Tempat Lahir">
                                </div>
                                <div class="col-sm-2">
                                    <input type="date" name="tgl_lahir">
                                </div>                                
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-4">
                                    <input type="email" name="email" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['email'])===null||$tmp==='' ? '' : $tmp);?>
" class="form-control" id="email" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="telp" class="col-sm-2 control-label">Contact Number</label>
                                <div class="col-sm-2">
                                    <input type="tel" name="telp" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['telp'])===null||$tmp==='' ? '' : $tmp);?>
" class="form-control" id="telp" placeholder="Nomor Handphone">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="jabatan" class="col-sm-2 control-label">Position</label>
                                <div class="col-sm-4">
                                    <input type="text" name="jabatan" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['jabatan'])===null||$tmp==='' ? '' : $tmp);?>
" class="form-control" id="jabatan" placeholder="Jabatan">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="id_department" class="col-sm-2 control-label">Department</label>
                                <div class="col-sm-4">
                                    <select name="department">
                                        <option value="" disabled="disabled" selected="selected">--Choose Department--</option>
                                                <?php  $_smarty_tpl->tpl_vars['d_dp'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data_department')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['d_dp']->key => $_smarty_tpl->tpl_vars['d_dp']->value){
?>
                                                    <option value=<?php echo $_smarty_tpl->tpl_vars['d_dp']->value['id_department'];?>
><?php echo $_smarty_tpl->tpl_vars['d_dp']->value['nama_department'];?>
</option>
                                                    <?php }} else { ?>
                                                   Data tidak ditemukan !
                                                <?php } ?>
                                    </select>
                                </div>
                            </div>                      
                        </div>
                   
                        
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <div class="row">
                                <div class="col-md-3 col-md-offset-2">
                                    <button type="reset" class="btn btn-danger">Reset</button>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                </div>
                            </div>
                        </div>

                        <!-- /.box-footer -->
                    </form>
                </div>
                 
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    <?php echo (($tmp = @$_smarty_tpl->getVariable('pagination')->value['data'])===null||$tmp==='' ? '' : $tmp);?>

                </div>
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
</section>
