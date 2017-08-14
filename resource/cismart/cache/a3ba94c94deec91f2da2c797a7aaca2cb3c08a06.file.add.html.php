<?php /* Smarty version Smarty-3.0.7, created on 2017-08-11 10:12:16
         compiled from "application/views\master/karyawan/add.html" */ ?>
<?php /*%%SmartyHeaderCode:21619598d66e0c457b9-80657940%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a3ba94c94deec91f2da2c797a7aaca2cb3c08a06' => 
    array (
      0 => 'application/views\\master/karyawan/add.html',
      1 => 1502439126,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21619598d66e0c457b9-80657940',
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

            <div class="box box-primary">
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
                                <label for="no_identitas" class="col-sm-2 control-label">Nomor Identitas</label>
                                <div class="col-sm-4">
                                    <input type="number" min="0" name="no_identitas" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['no_identitas'])===null||$tmp==='' ? '' : $tmp);?>
" class="form-control" id="no_identitas" placeholder="Nomor Identitas KTP/SIM/Passport">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nik" class="col-sm-2 control-label">NIK</label>
                                <div class="col-sm-2">
                                    <input type="number" min="0" name="nik" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['nik'])===null||$tmp==='' ? '' : $tmp);?>
" class="form-control" id="nik" placeholder="No. Induk Karyawan" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nama_karyawan" class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-4">
                                    <input type="text" name="nama_karyawan" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['nama_karyawan'])===null||$tmp==='' ? '' : $tmp);?>
" class="form-control" id="nama_karyawan" placeholder="Nama" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nama_alias" class="col-sm-2 control-label">Alias Name</label>
                                <div class="col-sm-4">
                                    <input type="text" name="nama_alias" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['nama_alias'])===null||$tmp==='' ? '' : $tmp);?>
" class="form-control" id="nama_alias" placeholder="Nama Panggilan" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="jabatan" class="col-sm-2 control-label">Position</label>
                                <div class="col-sm-4">
                                    <input type="text" name="jabatan" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['jabatan'])===null||$tmp==='' ? '' : $tmp);?>
" class="form-control" id="jabatan" placeholder="Jabatan" required>
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
                    <div class="box-header with-border">
                        <h3 class="box-title">Detail Personal</h3>
                    </div>
                        <div class="form-group">
                                <label for="tempat_lahir" class="col-sm-2 control-label">Place of Birth</label>
                                <div class="col-sm-4">
                                    <input type="text" name="tempat_lahir" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['tempat_lahir'])===null||$tmp==='' ? '' : $tmp);?>
" class="form-control" id="tempat_lahir" placeholder="Tempat Lahir" required>
                                </div>
                        </div>
                        <div class="form-group">
                                <label for="tgl_lahir" class="col-sm-2 control-label">Date of Birth</label>                                
                                    <input type="date" name="tgl_lahir" required>                           
                        </div>
                        <div class="form-group">
                                <label for="alamat_asal" class="col-sm-2 control-label">Origin Address</label>
                                <div class="col-sm-8">
                                    <input type="text" name="alamat_asal" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['alamat_asal'])===null||$tmp==='' ? '' : $tmp);?>
" class="form-control" id="alamat_asal" placeholder="Alamat Asal" required>
                                </div>
                        </div>
                        <div class="form-group">
                                <label for="alamat_sekarang" class="col-sm-2 control-label">Current Address</label>
                                <div class="col-sm-8">
                                    <input type="text" name="alamat_sekarang" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['alamat_sekarang'])===null||$tmp==='' ? '' : $tmp);?>
" class="form-control" id="alamat_sekarang" placeholder="Alamat sekarang" required>
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
                                <label for="telp" class="col-sm-2 control-label">No. Handphone</label>
                                <div class="col-sm-4">
                                    <input type="tel" name="telp" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['telp'])===null||$tmp==='' ? '' : $tmp);?>
" class="form-control" id="telp" placeholder="Nomor Handphone" required>
                                </div>
                        </div>
                    <div class="box-header with-border">
                        <h3 class="box-title">Data Pendidikan</h3>
                    </div>
                        <div class="form-group">
                                <label for="nama_instansi" class="col-sm-2 control-label">Instance Name</label>
                                <div class="col-sm-4">
                                    <input type="text" name="nama_instansi" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['nama_instansi'])===null||$tmp==='' ? '' : $tmp);?>
" class="form-control" id="nama_instansi" placeholder="Nama Instansi Pendidikan">
                                </div>
                        </div>
                        <div class="form-group">
                                <label for="jurusan" class="col-sm-2 control-label">Areas of Expertise</label>
                                <div class="col-sm-4">
                                    <input type="text" name="jurusan" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['jurusan'])===null||$tmp==='' ? '' : $tmp);?>
" class="form-control" id="jurusan" placeholder="Jurusan">
                                </div>
                        </div>
                        <div class="form-group">
                                <label for="jenjang_pendidikan" class="col-sm-2 control-label">Level Educational</label>
                                <div class="col-sm-4">
                                    <input type="text" name="jenjang_pendidikan" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['jenjang_pendidikan'])===null||$tmp==='' ? '' : $tmp);?>
" class="form-control" id="jenjang_pendidikan" placeholder="Jenjang Pendidikan">
                                </div>
                        </div>
                        <div class="form-group">
                                <label for="tahun_lulus" class="col-sm-2 control-label">Years of Gradueted</label>
                                <div class="col-sm-4">
                                    <input type="text" name="tahun_lulus" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['tahun_lulus'])===null||$tmp==='' ? '' : $tmp);?>
" class="form-control" id="tahun_lulus" placeholder="Tahun Lulus" maxlength="4">
                                </div>
                        </div>
                        
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <div class="row">
                                <div class="col-md-3 col-md-offset-2">
                                    <button type="reset" class="btn btn-default">Reset</button>
                                    <button type="submit" class="btn btn-info">Simpan</button>
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
