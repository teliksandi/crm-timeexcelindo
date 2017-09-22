<?php /* Smarty version Smarty-3.0.7, created on 2017-09-12 08:06:08
         compiled from "application/views/master/karyawan/add.html" */ ?>
<?php /*%%SmartyHeaderCode:159580262459b73300727675-19539629%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4e5a07fda8c3673f55088161ae5317977ac4f5ee' => 
    array (
      0 => 'application/views/master/karyawan/add.html',
      1 => 1505178337,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '159580262459b73300727675-19539629',
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
                        <a class="btn btn-sm btn-primary" href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('master/karyawan');?>
" ><i class="fa fa-long-arrow-left"></i> Kembali</a>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form class="form-horizontal" action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('master/karyawan/add_process');?>
" method="post" name="kywn">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="username" class="col-sm-2 control-label">Username</label>
                                <div class="col-sm-4">
                                    <input type="text" size="10" maxlength="40" name="username" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['username'])===null||$tmp==='' ? '' : $tmp);?>
" class="form-control" id="username" placeholder="" required title="Masukkan Username">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-sm-2 control-label">Password</label>
                                <div class="col-sm-2">
                                    <input type="password" size="10" maxlength="40" name="password" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['password'])===null||$tmp==='' ? '' : $tmp);?>
" class="form-control" id="password" placeholder="" required title="Masukkan Kata Sandi/Password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nik" class="col-sm-2 control-label">NIK</label>
                                <div class="col-sm-2">
                                    <input type="text" name="nik" size="10" maxlength="40" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['nik'])===null||$tmp==='' ? '' : $tmp);?>
" class="form-control" id="nik" placeholder="" title="Masukkan Nomer Induk Karyawan">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nama_karyawan" class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-4">
                                    <input type="text" size="10" maxlength="40" name="nama_karyawan" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['nama_karyawan'])===null||$tmp==='' ? '' : $tmp);?>
" class="form-control" id="nama_karyawan" placeholder="" title="Masukkan Nama" required>
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
                                    <input type="text" size="10" maxlength="40" name="tempat_lahir" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['tempat_lahir'])===null||$tmp==='' ? '' : $tmp);?>
" class="form-control" id="tempat_lahir" placeholder="" title="Masukkan Tempat & Tanggal Lahir" required>
                                </div>
                                <div class="col-sm-2">

                                    <input type="text" name="tgl_lahir" type="text" maxlength="10" size="10" class="tanggal" required>&nbsp;&nbsp;
                                    <!-- <img src="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
/resource/doc/images/icon/tanggal.png" class="tanggal" title="..." alt="..." >
                                     -->
                                    
                                </div> 

                            </div>
                            <div class="form-group">
                                <label for="email" class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-4">
                                    <input type="email" size="10" maxlength="40" name="email" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['email'])===null||$tmp==='' ? '' : $tmp);?>
" class="form-control" id="email" placeholder="" title="Masukkan Email" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="telepon" class="col-sm-2 control-label">Contact Number</label>
                                <label class="col-sm-1 control-label">+62-8</label>
                                <div class="col-sm-2">
                                    <input type="text" size="10" maxlength="40" id="telepon" name="telepon" placeholder="" title="Masukkan Nomer Telepon" required  onchange="myFunction()">

                                    <script>
                                            function myFunction() {
                                            var x = '+628';
                                            var y = document.getElementById("telepon").value;
                                            var hasil = x + y;
                                                document.kywn.telp.value = hasil;
                                            }
                                    </script>
                                    <input type="hidden" name="telp" id="telp" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['telp'])===null||$tmp==='' ? '' : $tmp);?>
">
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

                            <div class="form-group">
                                <label for="id_position" class="col-sm-2 control-label">Position</label>
                                <div class="col-sm-4">
                                    <select name="id_position">
                                        <option value="" disabled="disabled" selected="selected">--Choose Position--</option>
                                                <?php  $_smarty_tpl->tpl_vars['d_pst'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data_position')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['d_pst']->key => $_smarty_tpl->tpl_vars['d_pst']->value){
?>
                                                    <option value=<?php echo $_smarty_tpl->tpl_vars['d_pst']->value['id_position'];?>
><?php echo $_smarty_tpl->tpl_vars['d_pst']->value['name'];?>
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
                                        <option  value="Aktif">Aktif</option>
                                        <option  value="Off">Off</option>                                           
                                    </select>
                                    <!--<input type="checkbox" name="status" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['status'])===null||$tmp==='' ? '' : $tmp);?>
" class="form-control" id="status" placeholder="">
                                --></div>
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
