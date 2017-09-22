<?php /* Smarty version Smarty-3.0.7, created on 2017-09-12 08:13:11
         compiled from "application/views/master/karyawan/edit.html" */ ?>
<?php /*%%SmartyHeaderCode:4745669459b734a7a1bdd7-81569627%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8c10f053b92d8ef3cd64c980feeec17be8bf91b6' => 
    array (
      0 => 'application/views/master/karyawan/edit.html',
      1 => 1505178788,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4745669459b734a7a1bdd7-81569627',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<script type="text/javascript">
    $(document).ready(function () {
        // date picker
        $(".tanggal").datepicker({
            changeMonth: true,
            changeYear: true,
            buttonImageOnly: true,
            yearRange: '1970:2000',
            dateFormat: 'yy-mm-dd'
        });
        // change person
        $('#status-person').change(function () {
            var x = $('#status-person').val();
            if (x === 'karyawan') {
                $('.karyawan').show(500);
            } else {
                $('.karyawan').hide(500);
            }

        });
        // hak akses
        $('#log_in').change(function () {
            var y = $("input[name=akses]:checked").val();
            if (y === 'y') {
                $('.log_in').show(500);
            } else {
                $('.log_in').hide(500);
            }
        });
    });
</script>
<section class="content-header">
    <h1>
        Pengolahan Data Karyawan
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-database"></i> Master</a></li>
        <li><a href="#"> Karyawan</a></li>
        <li class="active">Ubah Data</li>
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
                    <h3 class="box-title">Form Ubah Data Karyawan</h3>
                    <div class="box-tools">
                        <a class="btn btn-sm btn-primary" href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('master/karyawan');?>
" ><i class="fa fa-long-arrow-left"></i> Kembali</a>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form class="form-horizontal" action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('master/karyawan/edit_process');?>
" method="post">
                        <input type="hidden" name="id_karyawan" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['id_karyawan'])===null||$tmp==='' ? '' : $tmp);?>
">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="username" class="col-sm-2 control-label">Username</label>
                                <div class="col-sm-4">
                                    <input type="text" name="username" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['username'])===null||$tmp==='' ? '' : $tmp);?>
" class="form-control" id="username" placeholder="" title="Masukkan Username">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-sm-2 control-label">Password</label>
                                <div class="col-sm-2">
                                    <input type="password" name="password" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['password'])===null||$tmp==='' ? '' : $tmp);?>
" class="form-control" id="password" placeholder="" title="Masukkan Kata Sandi/Password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nik" class="col-sm-2 control-label">NIK</label>
                                <div class="col-sm-2">
                                    <input type="text" name="nik" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['nik'])===null||$tmp==='' ? '' : $tmp);?>
" class="form-control" id="nik" placeholder="" title="Masukkan Nomer Induk Karyawan">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nama_karyawan" class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-4">
                                    <input type="text" name="nama_karyawan" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['nama_karyawan'])===null||$tmp==='' ? '' : $tmp);?>
" class="form-control" id="nama_karyawan" placeholder="" title="Masukkan Nama">
                                </div>
                            </div>
                           
                            <div class="form-group">
                                <label for="jenis_kelamin" class="col-sm-2 control-label">Sex</label>
                                <div class="col-sm-4"> 
                                    <?php if ((($tmp = @$_smarty_tpl->getVariable('result')->value['jenis_kelamin'])===null||$tmp==='' ? '' : $tmp)=='Pria'){?>
                                        <input type="radio" name="jenis_kelamin" value="Pria" checked/>Male
                                        <input type="radio" name="jenis_kelamin" value="Wanita"/>Female
                                    <?php }elseif((($tmp = @$_smarty_tpl->getVariable('result')->value['jenis_kelamin'])===null||$tmp==='' ? '' : $tmp)=='Wanita'){?>
                                        <input type="radio" name="jenis_kelamin" value="Pria"/>Male
                                        <input type="radio" name="jenis_kelamin" value="Wanita" checked/>Female 
                                        <?php }?>
                                </div>                                    
                            </div>
                            <div class="form-group">
                                <label for="tempat_lahir" class="col-sm-2 control-label">Place, Date of Birth</label>
                                <div class="col-sm-2">
                                    <input type="text" name="tempat_lahir" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['tempat_lahir'])===null||$tmp==='' ? '' : $tmp);?>
" class="form-control" id="tempat_lahir" placeholder="">
                                </div>
                                <div class="col-sm-2">
                                    <input name="tgl_lahir" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['tgl_lahir'])===null||$tmp==='' ? '' : $tmp);?>
" type="text" maxlength="10" size="10" class="tanggal" >&nbsp;&nbsp;
                                    <!-- 
                                    <img src="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
/resource/doc/images/icon/tanggal.png" class="tanggal" title="..." alt="..." >
                                     -->
                                </div>                                
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-4">
                                    <input type="email" name="email" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['email'])===null||$tmp==='' ? '' : $tmp);?>
" class="form-control" id="email" placeholder="" title="Masukkan Email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="telp" class="col-sm-2 control-label">Contact Number</label>
                                <div class="col-sm-2">
                                    <input type="tel" name="telp" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['telp'])===null||$tmp==='' ? '' : $tmp);?>
" class="form-control" id="telp" placeholder="" title="Masukkan Nomer Telepon">
                                </div>
                            </div>
                                                       
                            <div class="form-group">
                                <label for="id_department" class="col-sm-2 control-label">Department</label>
                                <div class="col-sm-4">
                                    <select name="department" >
                                        <?php  $_smarty_tpl->tpl_vars['d_dp'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data_department')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['d_dp']->key => $_smarty_tpl->tpl_vars['d_dp']->value){
?>
                                            <option value="<?php echo $_smarty_tpl->tpl_vars['d_dp']->value['id_department'];?>
" <?php if ($_smarty_tpl->getVariable('result')->value['id_department']==$_smarty_tpl->tpl_vars['d_dp']->value['id_department']){?> selected <?php }?>><?php echo $_smarty_tpl->tpl_vars['d_dp']->value['nama_department'];?>
</option>
                                            <?php }} else { ?>
                                            Data tidak ditemukan !
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="id_position" class="col-sm-2 control-label">Position</label>
                                <div class="col-sm-4">
                                    <select name="id_position" >
                                        <?php  $_smarty_tpl->tpl_vars['d_pst'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data_position')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['d_pst']->key => $_smarty_tpl->tpl_vars['d_pst']->value){
?>
                                            <option value="<?php echo $_smarty_tpl->tpl_vars['d_pst']->value['id_position'];?>
" <?php if ($_smarty_tpl->getVariable('result')->value['id_position']==$_smarty_tpl->tpl_vars['d_pst']->value['id_position']){?> selected <?php }?>><?php echo $_smarty_tpl->tpl_vars['d_pst']->value['name'];?>
</option>
                                            <?php }} else { ?>
                                            Data tidak ditemukan !
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>



                            <div class="form-group">
                                <label for="status" class="col-sm-2 control-label">Status</label>
                                <div class="col-sm-4" >
                                    <select name="status">
                                        <?php if ((($tmp = @$_smarty_tpl->getVariable('result')->value['status'])===null||$tmp==='' ? '' : $tmp)=='Aktif'){?>
                                        <option selected="selected" value="Aktif">Aktif</option>
                                        <option  value="Off">Off</option>
                                        <?php }elseif((($tmp = @$_smarty_tpl->getVariable('result')->value['status'])===null||$tmp==='' ? '' : $tmp)=='Off'){?>
                                        <option value="Aktif">Aktif</option>
                                        <option selected="selected" value="Off">Off</option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <div class="row">
                                <div class="col-md-3 col-md-offset-2">
                                    <button type="submit" class="btn btn-success">Simpan</button>&nbsp;&nbsp;
                                    <button type="reset" class="btn btn-danger">Reset</button>                                    
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
