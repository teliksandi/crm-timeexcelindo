<?php /* Smarty version Smarty-3.0.7, created on 2017-11-22 08:27:44
         compiled from "application/views\planning/detail.html" */ ?>
<?php /*%%SmartyHeaderCode:280925a1526f018f429-65367106%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c4f45ae0498cc09e1c4d460dcca188ed5930e7fd' => 
    array (
      0 => 'application/views\\planning/detail.html',
      1 => 1511333931,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '280925a1526f018f429-65367106',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<section class="content-header">
    <br>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-briefcase"></i> Planning</a></li>
        <li><a href="#">Data Planning</a></li>
        <li class="active">Detail Data Planning</li>
    </ol>
</section>

<section class="content" >
    <!-- notification template -->
    <?php $_template = new Smarty_Internal_Template("base/templates/notification.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
    <!-- end of notification template-->
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3><b>Form detail Planning</b></h3>
                    <div class="box-tools">
                        <br><a class="btn btn-sm btn-primary" href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('planning/planning');?>
" ><i class="fa fa-long-arrow-left"></i> Kembali</a>
                    </div>
                </div>
                <!-- /.box-header -->
            </div>
        </div>
        <!-- col -->

        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <b>List Riwayat</b>
                    <table align="center">
                        <tr>
                            <td>
                                <div class="form-group">
                                    <button type="submit" name="Riwayat_i" class="btn btn-warning" data-toggle="modal" data-target="#r_inisiasi"><i>Riwayat Initiation</i></button>
                                </div>
                                <!-- Model -->
                                <div class="modal fade" id="r_inisiasi" role="dialog">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Initiation History</h4>
                                            </div>
                                                <div class="modal-body">

                                                    <div class="col-md-6">
                                                        <div class="box box-success">
                                                            <div class="box-body">
                                                                <?php  $_smarty_tpl->tpl_vars['init_rwyt'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('join')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['init_rwyt']->key => $_smarty_tpl->tpl_vars['init_rwyt']->value){
?>
                                                                    <div class="form-group">
                                                                        <label for="project_title">Project title</label>
                                                                            <input type="text" name="project_title" class="form-control" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['init_rwyt']->value['project_title'])===null||$tmp==='' ? '' : $tmp);?>
" id="project_title" placeholder="" title="Judul Project" readonly>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="client_name">Client Name</label>
                                                                            <input type="text" name="client" class="form-control" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['init_rwyt']->value['client_name'])===null||$tmp==='' ? '' : $tmp);?>
" title="Nama Client" readonly>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Project Manager Department</label>
                                                                        <br>
                                                                            <select name="department[]" class="form-control select2 " multiple="multiple" title="Pilih Manager Department Project" disabled style="width: 100%;">
                                                                                <?php  $_smarty_tpl->tpl_vars['cth'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('datadepartment')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['cth']->key => $_smarty_tpl->tpl_vars['cth']->value){
?>
                                                                                    <option value="<?php echo $_smarty_tpl->tpl_vars['cth']->value['id_department'];?>
"<?php if (in_array($_smarty_tpl->tpl_vars['cth']->value['id_department'],$_smarty_tpl->getVariable('dprt')->value)){?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['cth']->value['nama_department'];?>
</option>
                                                                                <?php }} else { ?>
                                                                                    Data tidak ditemukan !
                                                                                <?php } ?>
                                                                            </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Team Member Name</label>
                                                                        <br>
                                                                            <select name="karyawan[]" title="Pilih Anggota Tim" class="form-control select2 " data-value="" multiple="multiple" disabled style="width: 100%;">
                                                                                <?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('marketing_kar')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
?>
                                                                                    <option value="<?php echo $_smarty_tpl->tpl_vars['value']->value['id_karyawan'];?>
"<?php if (in_array($_smarty_tpl->tpl_vars['value']->value['id_karyawan'],$_smarty_tpl->getVariable('kry')->value)){?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['value']->value['nama_karyawan'];?>
</option>
                                                                                <?php }} else { ?>
                                                                                    Data tidak ditemukan !
                                                                                <?php } ?>
                                                                            </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="budget">Budget</label>
                                                                            <input type="text" name="budget" class="form-control" id="budget" placeholder="" title="Estimasi harga" value="Rp. <?php echo number_format((($tmp = @$_smarty_tpl->tpl_vars['init_rwyt']->value['budget'])===null||$tmp==='' ? '' : $tmp),0,",",".");?>
" readonly style="width: 100%;">
                                                                    </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- col -->

                                                    <div class="col-md-6">
                                                        <div class="box box-success">
                                                            <div class="box-body">
                                                                <div class="form-group" style="overflow: scroll; height: 360px; width: 100%;">
                                                                    <div class="form-group">
                                                                        <label for="project_desc">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Project Description</label>
                                                                            <textarea name="project_desc"  class="ckeditor" id="project_desc" placeholder="" title="Deskripsi Project" readonly><?php echo (($tmp = @$_smarty_tpl->tpl_vars['init_rwyt']->value['project_desc'])===null||$tmp==='' ? '' : $tmp);?>

                                                                            </textarea>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="project_just">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Project Justification</label>
                                                                            <textarea name="project_just" class="ckeditor" id="project_just" placeholder="" title="Justifikasi Project" readonly><?php echo (($tmp = @$_smarty_tpl->tpl_vars['init_rwyt']->value['project_just'])===null||$tmp==='' ? '' : $tmp);?>

                                                                            </textarea>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="not_in_project">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Not in project</label>
                                                                            <textarea name="not_in_project"  class="ckeditor" id="not_in_project" placeholder="" title="Yang tidak diperlukan" readonly><?php echo (($tmp = @$_smarty_tpl->tpl_vars['init_rwyt']->value['not_in_project'])===null||$tmp==='' ? '' : $tmp);?>

                                                                            </textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- col -->

                                                    <div class="col-md-6">
                                                        <div class="box box-success">
                                                            <div class="box-body">
                                                                <div class="form-group">
                                                                    <label for="start_date">Start date</label>    
                                                                        <input type="text" name="start_date" value="<?php echo date('d F Y',strtotime((($tmp = @$_smarty_tpl->tpl_vars['init_rwyt']->value['mulai'])===null||$tmp==='' ? '' : $tmp)));?>
" class="form-control" id="start_date" placeholder="" title="Tanggal memulai" readonly style="width: 100%;">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="due_date">Due date</label>
                                                                        <input type="text" name="due_date" value="<?php echo date('d F Y',strtotime((($tmp = @$_smarty_tpl->tpl_vars['init_rwyt']->value['akhir'])===null||$tmp==='' ? '' : $tmp)));?>
" class="form-control" id="due_date" placeholder="" title="Tanggal target selesai" readonly style="width: 100%;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php }} ?>
                                                    </div>
                                                    <!-- col -->
                                            

                                                    <form class="form-horizontal" action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('initiation/initiation/pdf_view');?>
" method="post" target="blank">
                                                        <div class="col-md-6">
                                                            <div class="box box-success">
                                                                <div class="box-body">
                                                                    <label for="files[]">Files</label>
                                                                    <div style="overflow-y: scroll; height: 126px;">
                                                                    <div class="form-group">
                                                                        <center>
                                                                                <?php  $_smarty_tpl->tpl_vars['f'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('ef')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['f']->key => $_smarty_tpl->tpl_vars['f']->value){
?>
                                                                                        <table>
                                                                                            <input type="hidden" name="nm" value="<?php echo $_smarty_tpl->tpl_vars['f']->value;?>
">
                                                                                                <div class="form-group">
                                                                                                    <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('initiation/initiation/pdf_view');?>
/<?php echo $_smarty_tpl->tpl_vars['f']->value;?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['f']->value;?>
</a>
                                                                                                </div>
                                                                                                <?php if ($_smarty_tpl->tpl_vars['f']->value!==''){?>
                                                                                                <hr></hr>
                                                                                                <?php }?>
                                                                                        </table>
                                                                                <?php }} ?>
                                                                        </center>
                                                                    </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                    
                                                    <div class="col-md-12">
                                                        <div class="box box-success">
                                                            <div class="box-body">
                                                                <b>Komentar :</b><br><br>
                                                                <table>
                                                                    <div style="overflow-y: scroll; height: 200px">
                                                                            <?php  $_smarty_tpl->tpl_vars['km'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('komen')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['km']->key => $_smarty_tpl->tpl_vars['km']->value){
?>
                                                                            <div align="left">
                                                                            <i><label><?php echo $_smarty_tpl->tpl_vars['km']->value['nama_lengkap'];?>
</label></i>
                                                                            </div>
                                                                        <b><textarea disabled class="form-control" style="height:65px;text-align: left;"><?php echo $_smarty_tpl->tpl_vars['km']->value['komentar'];?>
</textarea></b>
                                                                        <div align="right">
                                                                            Dikomentari pada : <?php echo $_smarty_tpl->tpl_vars['km']->value['tgl_komentar'];?>

                                                                            <hr></hr>
                                                                            <?php }} ?>
                                                                        </div>
                                                                    </div>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                    
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                </div>
                                                </div>
                                                <!-- modal-body -->
                                            </div>
                                            <!-- modal-content -->
                                        </div>
                                        <!-- modal-dialog -->
                                    </div>
                                    <!-- Model Riwayat Inisiasi -->
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <!-- col -->

        <form class="form-horizontal" action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('planning/planning/add_process');?>
" method="post"> 
            <?php  $_smarty_tpl->tpl_vars['rs'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('result')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['rs']->key => $_smarty_tpl->tpl_vars['rs']->value){
?>
                <input type="hidden" name="id_planning" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['rs']->value['id_planning'])===null||$tmp==='' ? '' : $tmp);?>
">
                    <div class="col-md-12">
                        <div class="box">
                            <div class="box-body">
                                <table class="table table-striped" border="3" align="center" onload="biaya()">
                                    <tbody>
                                        <tr>
                                            <td width="15%" align="middle"><b> Uraian </b></td>
                                            <td width="5%" align="middle"><b> % </b></td>
                                            <td width="15%" align="middle"><b> Total </b></td>
                                        </tr>
                                        <tr>
<<<<<<< HEAD
                                            <td align="middle"> Total Anggaran </td>
                                            <td align="middle"></td>
                                            <td align="middle">
                                                    <div align="center">Rp.&nbsp;<input type="text" name="Anggaran" value ="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['rs']->value['budget'])===null||$tmp==='' ? '' : $tmp);?>
" title="Masukkan Jumlah Uang" data-inputmask="'alias': 'numeric', 'groupSeparator':'.', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'prefix': ' ', 'placeholder': '0'" data-mask required onchange="total_anggaran()" id="anggaran"></div>
=======
                                            <td align="middle"> Total Anggaran </td>
                                            <td align="middle"></td>
                                            <td align="middle">
                                                    <div align="center">Rp.&nbsp;<input type="text" name="Anggaran" value ="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['rs']->value['budget'])===null||$tmp==='' ? '' : $tmp);?>
" title="Masukkan Jumlah Uang" data-inputmask="'alias': 'numeric', 'groupSeparator':'.', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'prefix': ' ', 'placeholder': '0'" data-mask required readonly></div>
>>>>>>> 48719cd63679c487692bd7dd62168d14e71b21b3
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="middle"> PPN </td>
                                            <td align="middle"> 10 % </td>
                                            <td align="middle">
                                                <div align="center">Rp.&nbsp;<input type="text" name="PPN" value ="0" title="Masukkan Jumlah Uang" data-inputmask="'alias': 'numeric', 'groupSeparator':'.', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'prefix': ' ', 'placeholder': '0'" data-mask required readonly id="ppn_hasil"></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="middle"> PPH </td>
                                            <td align="middle"> 2 % </td>
                                            <td align="middle">
                                                <div align="center">Rp.&nbsp;<input type="text" name="PPH" value ="0" title="Masukkan Jumlah Uang" data-inputmask="'alias': 'numeric', 'groupSeparator':'.', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'prefix': ' ', 'placeholder': '0'" data-mask required readonly id="pph_hasil"></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="middle" style="background-color: yellow"> Pendapatan Setelah Pajak </td>
                                            <td align="middle" style="background-color: yellow"></td>
                                            <td align="middle" style="background-color: yellow">
                                                <div align="center">Rp.&nbsp;<input type="text" name="Pendapatan" value ="0" title="Masukkan Jumlah Uang" data-inputmask="'alias': 'numeric', 'groupSeparator':'.', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'prefix': ' ', 'placeholder': '0'" data-mask required id="netto" readonly></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="middle">  </td>
                                            <td align="middle">  </td>
                                            <td align="middle">  </td>
                                        </tr>
                                        <tr>
                                            <td align="middle"> Rincian Biaya </td>
                                            <td align="middle"></td>
                                            <td align="middle"></td>
                                        </tr>
                                        <tr>
                                            <td align="middle"> Biaya Administrasi </td>
                                            <td align="middle"><input type="number" name="persen_biaya_administrasi" style="width: 55%; height: 4%; text-align: center;" readonly id="persen_b_administrasi" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['rs']->value['p_b_administrasi'])===null||$tmp==='' ? '' : $tmp);?>
"> %</td>
                                            <td align="middle">
                                                <div align="center">Rp.&nbsp;<input type="text" name="Adm" value ="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['rs']->value['b_administrasi'])===null||$tmp==='' ? '' : $tmp);?>
" title="Masukkan Jumlah Uang" data-inputmask="'alias': 'numeric', 'groupSeparator':'.', 'autoGroup': true, 'digits': 0, 'digitsOptional': true, 'prefix': ' ', 'placeholder': '0'" data-mask  onchange="biayaAdministrasi()" id="b_administrasi" ></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="middle"> Biaya Produksi dan Operasional </td>
                                            <td align="middle"><input type="text" name="persen_biaya_produksi" style="width: 55%; height: 4%; text-align: center;" readonly id="persen_b_produksi" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['rs']->value['p_b_produksi_dan_operasional'])===null||$tmp==='' ? '' : $tmp);?>
"> %</td>
                                            <td align="middle">
                                                <div align="center">Rp.&nbsp;<input type="text" name="Produksi" value ="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['rs']->value['b_produksi_dan_operasional'])===null||$tmp==='' ? '' : $tmp);?>
" title="Masukkan Jumlah Uang" data-inputmask="'alias': 'numeric', 'groupSeparator':'.', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'prefix': ' ', 'placeholder': '0'" data-mask  onchange="biayaProduksi()" id="b_produksi" ></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="middle"> Biaya Hardware dan Infrastruktur </td>
                                            <td align="middle"><input type="number" name="persen_biaya_hardware" style="width: 55%; height: 4%; text-align: center;" readonly id="persen_b_hardware" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['rs']->value['p_b_hardware_dan_infrastruktur'])===null||$tmp==='' ? '' : $tmp);?>
"> %</td>
                                            <td align="middle">
                                                <div align="center">Rp.&nbsp;<input type="text" name="Hardware" value ="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['rs']->value['b_hardware_dan_infrastruktur'])===null||$tmp==='' ? '' : $tmp);?>
" title="Masukkan Jumlah Uang" data-inputmask="'alias': 'numeric', 'groupSeparator':'.', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'prefix': ' ', 'placeholder': '0'" data-mask  onchange="biayaHardware()" id="b_hardware"></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="middle"> Biaya Perawatan / Garansi </td>
                                            <td align="middle"><input type="number" name="persen_biaya_perawatan" style="width: 55%; height: 4%; text-align: center;" readonly id="persen_b_perawatan" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['rs']->value['p_b_perawatan'])===null||$tmp==='' ? '' : $tmp);?>
"> %</td>
                                            <td align="middle">
                                                <div align="center">Rp.&nbsp;<input type="text" name="Perawatan" value ="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['rs']->value['b_perawatan'])===null||$tmp==='' ? '' : $tmp);?>
" title="Masukkan Jumlah Uang" data-inputmask="'alias': 'numeric', 'groupSeparator':'.', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'prefix': ' ', 'placeholder': '0'" data-mask  onchange="biayaPerawatan()" id="b_perawatan"></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="middle"> Biaya Lain-Lain </td>
                                            <td align="middle"><input type="number" name="persen_biaya_lain" style="width: 55%; height: 4%; text-align: center;" readonly id="persen_b_lain" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['rs']->value['p_b_lain_lain'])===null||$tmp==='' ? '' : $tmp);?>
"> %</td>
                                            <td align="middle">
                                                <div align="center">Rp.&nbsp;<input type="text" name="Lain" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['rs']->value['b_lain_lain'])===null||$tmp==='' ? '' : $tmp);?>
" title="Masukkan Jumlah Uang" data-inputmask="'alias': 'numeric', 'groupSeparator':'.', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'prefix': ' ', 'placeholder': '0'" data-mask  onchange="biayaLain()" id="b_lain"></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="middle"> Biaya Entertaint </td>
                                            <td align="middle"><input type="number" name="persen_biaya_entertaint" style="width: 55%; height: 4%; text-align: center;" readonly id="persen_b_entertaint" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['rs']->value['p_b_entertaint'])===null||$tmp==='' ? '' : $tmp);?>
"> %</td>
                                            <td align="middle">
                                                <div align="center">Rp.&nbsp;<input type="text" name="Entertaint" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['rs']->value['b_entertaint'])===null||$tmp==='' ? '' : $tmp);?>
" title="Masukkan Jumlah Uang" data-inputmask="'alias': 'numeric', 'groupSeparator':'.', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'prefix': ' ', 'placeholder': '0'" data-mask  onchange="biayaEntertaint()" id="b_entertaint"></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="middle" style="background-color: yellow"> Total Biaya Produksi</td>
                                            <td align="middle" style="background-color: yellow"></td>
                                            <td align="middle" style="background-color: yellow">
                                                <div align="center">Rp.&nbsp;<input type="text" name="Total" title="Masukkan Jumlah Uang" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['rs']->value['total_biaya'])===null||$tmp==='' ? '' : $tmp);?>
" data-inputmask="'alias': 'numeric', 'groupSeparator':'.', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'prefix': ' ', 'placeholder': '0'" data-mask required id="total_biaya" readonly readonly></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="middle">  </td>
                                            <td align="middle">  </td>
                                            <td align="middle">  </td>
                                        </tr>
                                        <tr>
                                            <td align="middle" style="background-color: yellow"> Perkiraan Laba Rugi </td>
                                            <td align="middle" style="background-color: yellow"><input type="number" name="persen_rugi_laba" style="width: 40%; height: 4%; text-align: center;" readonly id="persen_laba" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['rs']->value['p_perkiraan_rugi_laba'])===null||$tmp==='' ? '' : $tmp);?>
"> %</td>
                                            <td align="middle" style="background-color: yellow">
                                                <div align="center">Rp.&nbsp;<input type="text" name="laba" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['rs']->value['perkiraan_rugi_laba'])===null||$tmp==='' ? '' : $tmp);?>
" title="Masukkan Jumlah Uang" data-inputmask="'alias': 'numeric', 'groupSeparator':'.', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'prefix': ' ', 'placeholder': '0'" data-mask required readonly id="hasil_laba"></div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table border="3" align="center"  width="100%" height="120px">
                                    <tbody>
                                        <tr>
                                            <td align="middle">
                                                <div class="col-md-12">
                                                    <label>Keterangan</label><br>
                                                    <textarea name="Ket" class="form-control" title="-- Keterangan --"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['rs']->value['catatan'])===null||$tmp==='' ? '' : $tmp);?>
</textarea>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <br>
                                <center>
                                <table>
                                    <td>
                                        <?php ob_start();?><?php echo $_smarty_tpl->getVariable('department')->value;?>
<?php $_tmp1=ob_get_clean();?><?php if ($_tmp1==10){?>
                                        <button type="submit" class="btn btn-success" name="submit">Simpan</button>                  
                                        <?php }else{ ?>

                                        <?php }?>
                    </form>
                                    </td>
                                    <td>
                <?php ob_start();?><?php echo $_smarty_tpl->getVariable('jabatan')->value;?>
<?php $_tmp2=ob_get_clean();?><?php if ($_tmp2!=3){?>
                                    <form class="" action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('execution/execution/execution_process');?>
" method="post">
                                        <?php  $_smarty_tpl->tpl_vars['exec'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('executi')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['exec']->key => $_smarty_tpl->tpl_vars['exec']->value){
?>
                                        <input type="hidden" name="plan_execution" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['exec']->value['id_planning'])===null||$tmp==='' ? '' : $tmp);?>
">
                                        <input type="hidden" name="start_execution" id="mulai_execution">
                                        <input type="hidden" name="due_execution" value="<?php echo date('d F Y',strtotime((($tmp = @$_smarty_tpl->tpl_vars['exec']->value['due_date'])===null||$tmp==='' ? '' : $tmp)));?>
">
                                        <input type="hidden" name="department_planning[]" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['exec']->value['id_department'])===null||$tmp==='' ? '' : $tmp);?>
">
                                        <input type="hidden" name="karyawan_planning[]" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['exec']->value['id_karyawan'])===null||$tmp==='' ? '' : $tmp);?>
">
                                            <button type="submit" class="btn btn-primary" name="submit">Accept</button>
                                        <?php }} ?>
                                    </form>
                <?php }else{ ?>
                                        <input type="hidden" name="plan_execution" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('exec')->value['id_planning'])===null||$tmp==='' ? '' : $tmp);?>
">
                <?php }?>
                                    </td>
                                </table><br>
                                            <label>Keterangan :</label><br>
                                            <i>Simpan -> Menyimpan data Planning</i><br>
                                            <i>Accept -> Menuju tahap Execution</i>
                                    
                                </center>
                            </div>
                        </div>
                    </div>
                    <!-- col -->
            <?php }} ?>

                    <form class="form-horizontal" action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('planning/planning/komentar_process');?>
" method="post">
                        <div class="col-md-12">
                            <div class="box box-primary">
                                <div class="box-body">
                                    <b>Komentar :</b><br><br>
                                        <table>
                                            <div style="overflow-y: scroll; height: 200px">                
                                                <?php  $_smarty_tpl->tpl_vars['km'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('komen_plan')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['km']->key => $_smarty_tpl->tpl_vars['km']->value){
?>
                                                    <div align="left">
                                                        <i><label><?php echo $_smarty_tpl->tpl_vars['km']->value['nama_lengkap'];?>
</label></i>
                                                    </div>
                                                        <b><textarea readonly class="form-control" style="height:65px;text-align: left;"><?php echo $_smarty_tpl->tpl_vars['km']->value['komentar'];?>
</textarea></b>
                                                    <div align="right">
                                                        Dikomentari pada : <?php echo $_smarty_tpl->tpl_vars['km']->value['tgl_komentar'];?>

                                                            <hr></hr>
                                                <?php }} ?>
                                                    </div>
                                            </div>
                                        </table>
                            <?php ob_start();?><?php echo $_smarty_tpl->getVariable('jabatan')->value;?>
<?php $_tmp3=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->getVariable('department')->value;?>
<?php $_tmp4=ob_get_clean();?><?php if ($_tmp3!=3||$_tmp4==10){?>
                                            <input type="hidden" name="id_planning_komentar" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('rs')->value['id_planning'])===null||$tmp==='' ? '' : $tmp);?>
">
                                            <input type="hidden" name="tgl_komentar" max = "50" value="<?php echo date('d-m-Y h:i:sa');?>
">
                                                <br>
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <textarea name="isi_komentar" class="form-control" title="Komentar"></textarea>
                                                        <br>
                                                        <div align="right">
                                                            <button type="submit" name="submit" class="btn btn-info">Comment</button>
                                                        </div>
                                                    </div>
                                                </div>
                            <?php }else{ ?>
                            <?php }?>
                                </div>
                            </div>
                        </div>
                        <!-- col -->
                    </form>


<<<<<<< HEAD
    </div>
    <!-- row -->

=======
    <script type="text/javascript">
 
        var y = Math.round(<?php echo $_smarty_tpl->getVariable('rs')->value['budget'];?>
 * 0.1) ;
        var z = Math.round(<?php echo $_smarty_tpl->getVariable('rs')->value['budget'];?>
 * 0.02) ;  
        var tot_s_pajak = Math.round(<?php echo $_smarty_tpl->getVariable('rs')->value['budget'];?>
 - ( y + z )) ;
        document.getElementById("ppn_hasil").value = y; 
        document.getElementById("pph_hasil").value = z;
        document.getElementById("netto").value = tot_s_pajak;
>>>>>>> 48719cd63679c487692bd7dd62168d14e71b21b3

    <script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
resource/themes/ckeditor/ckeditor.js"></script>

     <script type="text/javascript">
 
        var today = new Date();
            var dd = today.getDate();
            var mm = today.getMonth()+1; //January is 0!

            var yyyy = today.getFullYear();
            if(dd<10){
                dd='0'+dd;
            } 
            if(mm<10){
                mm='0'+mm;
            } 
            var today = dd+'-'+mm+'-'+yyyy;
            document.getElementById("mulai_execution").value = today;

        function total_anggaran(){            
            var xx = document.getElementById("anggaran").value;
            var ret = xx.replace(',','');
            var rat = ret.replace(',','');
            var rot = parseInt(rat.replace(',',''));
            var ppn = rot * 0.1 ;
            var pph = rot * 0.02 ;
            document.getElementById("ppn_hasil").value = ppn; 
            document.getElementById("pph_hasil").value = pph;                
            var tot_pajak = Math.round( rot - (ppn + pph)); 
            document.getElementById("netto").value = tot_pajak;
        }

        

        function biayaAdministrasi(){
            var xx = document.getElementById("b_administrasi").value;
            var ret = xx.replace(',','');
            var rat = ret.replace(',','');
            var rot = parseInt(rat.replace(',',''));
<<<<<<< HEAD

            var xx1 = document.getElementById("netto").value;
            var ret1 = xx1.replace(',','');
            var rat1 = ret1.replace(',','');
            var rot1 = parseInt(rat1.replace(',',''));
            var persen_prod = (rot / rot1 * 100).toFixed(2);
=======
            var persen_prod = (rot / tot_s_pajak * 100).toFixed(2);
>>>>>>> 48719cd63679c487692bd7dd62168d14e71b21b3

            document.getElementById("persen_b_administrasi").value = persen_prod;

            var prod  = document.getElementById("b_produksi").value;
            var a_prod = prod.replace(',','');
            var b_prod = a_prod.replace(',','');
            var c_prod = parseInt(b_prod.replace(',',''));
            

            var hard  = document.getElementById("b_hardware").value;
            var a_hard = hard.replace(',','');
            var b_hard = a_hard.replace(',','');
            var c_hard = parseInt(b_hard.replace(',',''));
            

            var para  = document.getElementById("b_perawatan").value;
            var a_para = para.replace(',','');
            var b_para = a_para.replace(',','');
            var c_para = parseInt(b_para.replace(',',''));
            

            var lain  = document.getElementById("b_lain").value;
            var a_lain = lain.replace(',','');
            var b_lain = a_lain.replace(',','');
            var c_lain = parseInt(b_lain.replace(',',''));
            

            var entert= document.getElementById("b_entertaint").value   ;
            var a_entert = entert.replace(',','');
            var b_entert = a_entert.replace(',','');
            var c_entert = parseInt(b_entert.replace(',',''));
            
            var total_semua = rot + c_prod + c_hard + c_para + c_lain + c_entert ;
            document.getElementById("total_biaya").value = total_semua;

            var laba = rot1 - total_semua;
            document.getElementById("hasil_laba").value = laba;
<<<<<<< HEAD
            var p_laba = (laba / rot1 * 100).toFixed(2);
=======
            var p_laba = (laba / tot_s_pajak * 100).toFixed(2);
>>>>>>> 48719cd63679c487692bd7dd62168d14e71b21b3
            document.getElementById("persen_laba").value = p_laba;
        }   

        function biayaProduksi(){
            var xx = document.getElementById("b_produksi").value;
            var ret = xx.replace(',','');
            var rat = ret.replace(',','');
            var rot = parseInt(rat.replace(',',''));
<<<<<<< HEAD

            var xx1 = document.getElementById("netto").value;
            var ret1 = xx1.replace(',','');
            var rat1 = ret1.replace(',','');
            var rot1 = parseInt(rat1.replace(',',''));
            var persen_prod = (rot / rot1 * 100).toFixed(2);
=======
            var persen_prod = ( rot / tot_s_pajak * 100).toFixed(2);
          
>>>>>>> 48719cd63679c487692bd7dd62168d14e71b21b3
            document.getElementById("persen_b_produksi").value = persen_prod;

            var admin = document.getElementById("b_administrasi").value;            
            var a_admin = admin.replace(',','');
            var b_admin = a_admin.replace(',','');
            var c_admin = parseInt(b_admin.replace(',','')); 

            var hard  = document.getElementById("b_hardware").value;
            var a_hard = hard.replace(',','');
            var b_hard = a_hard.replace(',','');
            var c_hard = parseInt(b_hard.replace(',',''));
            

            var para  = document.getElementById("b_perawatan").value;
            var a_para = para.replace(',','');
            var b_para = a_para.replace(',','');
            var c_para = parseInt(b_para.replace(',',''));
            

            var lain  = document.getElementById("b_lain").value;
            var a_lain = lain.replace(',','');
            var b_lain = a_lain.replace(',','');
            var c_lain = parseInt(b_lain.replace(',',''));
            

            var entert= document.getElementById("b_entertaint").value   ;
            var a_entert = entert.replace(',','');
            var b_entert = a_entert.replace(',','');
            var c_entert = parseInt(b_entert.replace(',',''));
            
            var total_semua = c_admin + rot + c_hard + c_para + c_lain + c_entert ;
            document.getElementById("total_biaya").value = total_semua;
            var laba = rot1 - total_semua;
            document.getElementById("hasil_laba").value = laba;
<<<<<<< HEAD
            var p_laba = (laba / rot1 * 100).toFixed(2);
=======
            var p_laba = (laba / tot_s_pajak * 100).toFixed(2);
>>>>>>> 48719cd63679c487692bd7dd62168d14e71b21b3
            document.getElementById("persen_laba").value = p_laba;
        }

        function biayaHardware(){
            var xx = document.getElementById("b_hardware").value;
            var ret = xx.replace(',','');
            var rat = ret.replace(',','');
            var rot = parseInt(rat.replace(',',''));
<<<<<<< HEAD

            var xx1 = document.getElementById("netto").value;
            var ret1 = xx1.replace(',','');
            var rat1 = ret1.replace(',','');
            var rot1 = parseInt(rat1.replace(',',''));
            var persen_prod = (rot / rot1 * 100).toFixed(2);
=======
            var persen_prod = ( rot / tot_s_pajak * 100).toFixed(2);
>>>>>>> 48719cd63679c487692bd7dd62168d14e71b21b3
          
            document.getElementById("persen_b_hardware").value = persen_prod;

             var admin = document.getElementById("b_administrasi").value;            
            var a_admin = admin.replace(',','');
            var b_admin = a_admin.replace(',','');
            var c_admin = parseInt(b_admin.replace(',','')); 

            

            var prod  = document.getElementById("b_produksi").value;
            var a_prod = prod.replace(',','');
            var b_prod = a_prod.replace(',','');
            var c_prod = parseInt(b_prod.replace(',',''));

            var para  = document.getElementById("b_perawatan").value;
            var a_para = para.replace(',','');
            var b_para = a_para.replace(',','');
            var c_para = parseInt(b_para.replace(',',''));
            

            var lain  = document.getElementById("b_lain").value;
            var a_lain = lain.replace(',','');
            var b_lain = a_lain.replace(',','');
            var c_lain = parseInt(b_lain.replace(',',''));
            

            var entert= document.getElementById("b_entertaint").value   ;
            var a_entert = entert.replace(',','');
            var b_entert = a_entert.replace(',','');
            var c_entert = parseInt(b_entert.replace(',',''));
            
            var total_semua = c_admin + c_prod + rot + c_para + c_lain + c_entert ;
            document.getElementById("total_biaya").value = total_semua;
            var laba = rot1 - total_semua;
            document.getElementById("hasil_laba").value = laba;
<<<<<<< HEAD
            var p_laba = (laba / rot1 * 100).toFixed(2);
=======
            var p_laba = (laba / tot_s_pajak * 100).toFixed(2);
>>>>>>> 48719cd63679c487692bd7dd62168d14e71b21b3
            document.getElementById("persen_laba").value = p_laba;
        }   

        function biayaPerawatan(){
            var xx = document.getElementById("b_perawatan").value;
            var ret = xx.replace(',','');
            var rat = ret.replace(',','');
            var rot = parseInt(rat.replace(',',''));
<<<<<<< HEAD

            var xx1 = document.getElementById("netto").value;
            var ret1 = xx1.replace(',','');
            var rat1 = ret1.replace(',','');
            var rot1 = parseInt(rat1.replace(',',''));
            var persen_prod = (rot / rot1 * 100).toFixed(2);
=======
            var persen_prod = ( rot / tot_s_pajak * 100).toFixed(2);
>>>>>>> 48719cd63679c487692bd7dd62168d14e71b21b3
          
            document.getElementById("persen_b_perawatan").value = persen_prod;

             var admin = document.getElementById("b_administrasi").value;            
            var a_admin = admin.replace(',','');
            var b_admin = a_admin.replace(',','');
            var c_admin = parseInt(b_admin.replace(',','')); 

            

            var prod  = document.getElementById("b_produksi").value;
            var a_prod = prod.replace(',','');
            var b_prod = a_prod.replace(',','');
            var c_prod = parseInt(b_prod.replace(',',''));
            

            var hard  = document.getElementById("b_hardware").value;
            var a_hard = hard.replace(',','');
            var b_hard = a_hard.replace(',','');
            var c_hard = parseInt(b_hard.replace(',',''));            

            var lain  = document.getElementById("b_lain").value;
            var a_lain = lain.replace(',','');
            var b_lain = a_lain.replace(',','');
            var c_lain = parseInt(b_lain.replace(',',''));
            

            var entert= document.getElementById("b_entertaint").value   ;
            var a_entert = entert.replace(',','');
            var b_entert = a_entert.replace(',','');
            var c_entert = parseInt(b_entert.replace(',',''));
            
            var total_semua = c_admin + c_prod + c_hard + rot + c_lain + c_entert ;
            document.getElementById("total_biaya").value = total_semua;
            var laba = rot1 - total_semua;
            document.getElementById("hasil_laba").value = laba;
<<<<<<< HEAD
            var p_laba = (laba / rot1 * 100).toFixed(2);
=======
            var p_laba = (laba / tot_s_pajak * 100).toFixed(2);
>>>>>>> 48719cd63679c487692bd7dd62168d14e71b21b3
            document.getElementById("persen_laba").value = p_laba;
        }  

        function biayaLain(){
            var xx = document.getElementById("b_lain").value;
            var ret = xx.replace(',','');
            var rat = ret.replace(',','');
            var rot = parseInt(rat.replace(',',''));
<<<<<<< HEAD

            var xx1 = document.getElementById("netto").value;
            var ret1 = xx1.replace(',','');
            var rat1 = ret1.replace(',','');
            var rot1 = parseInt(rat1.replace(',',''));
            var persen_prod = (rot / rot1 * 100).toFixed(2);
=======
            var persen_prod = ( rot / tot_s_pajak * 100).toFixed(2);
>>>>>>> 48719cd63679c487692bd7dd62168d14e71b21b3
          
            document.getElementById("persen_b_lain").value = persen_prod;
             var admin = document.getElementById("b_administrasi").value;            
            var a_admin = admin.replace(',','');
            var b_admin = a_admin.replace(',','');
            var c_admin = parseInt(b_admin.replace(',','')); 

            

            var prod  = document.getElementById("b_produksi").value;
            var a_prod = prod.replace(',','');
            var b_prod = a_prod.replace(',','');
            var c_prod = parseInt(b_prod.replace(',',''));
            

            var hard  = document.getElementById("b_hardware").value;
            var a_hard = hard.replace(',','');
            var b_hard = a_hard.replace(',','');
            var c_hard = parseInt(b_hard.replace(',',''));
            

            var para  = document.getElementById("b_perawatan").value;
            var a_para = para.replace(',','');
            var b_para = a_para.replace(',','');
            var c_para = parseInt(b_para.replace(',',''));
            

            var entert= document.getElementById("b_entertaint").value   ;
            var a_entert = entert.replace(',','');
            var b_entert = a_entert.replace(',','');
            var c_entert = parseInt(b_entert.replace(',',''));
            
            var total_semua = c_admin + c_prod + c_hard + c_para + rot + c_entert ;
            document.getElementById("total_biaya").value = total_semua;
            var laba = rot1 - total_semua;
            document.getElementById("hasil_laba").value = laba;
<<<<<<< HEAD
            var p_laba = (laba / rot1 * 100).toFixed(2);
=======
            var p_laba = (laba / tot_s_pajak * 100).toFixed(2);
>>>>>>> 48719cd63679c487692bd7dd62168d14e71b21b3
            document.getElementById("persen_laba").value = p_laba;
        }

        function biayaEntertaint(){
            var xx = document.getElementById("b_entertaint").value;
            var ret = xx.replace(',','');
            var rat = ret.replace(',','');
            var rot = parseInt(rat.replace(',',''));
<<<<<<< HEAD
            
            var xx1 = document.getElementById("netto").value;
            var ret1 = xx1.replace(',','');
            var rat1 = ret1.replace(',','');
            var rot1 = parseInt(rat1.replace(',',''));
            var persen_prod = (rot / rot1 * 100).toFixed(2);
=======
            var persen_prod = ( rot / tot_s_pajak * 100).toFixed(2);
>>>>>>> 48719cd63679c487692bd7dd62168d14e71b21b3
          
            document.getElementById("persen_b_entertaint").value = persen_prod;

             var admin = document.getElementById("b_administrasi").value;            
            var a_admin = admin.replace(',','');
            var b_admin = a_admin.replace(',','');
            var c_admin = parseInt(b_admin.replace(',','')); 

            

            var prod  = document.getElementById("b_produksi").value;
            var a_prod = prod.replace(',','');
            var b_prod = a_prod.replace(',','');
            var c_prod = parseInt(b_prod.replace(',',''));
            

            var hard  = document.getElementById("b_hardware").value;
            var a_hard = hard.replace(',','');
            var b_hard = a_hard.replace(',','');
            var c_hard = parseInt(b_hard.replace(',',''));
            

            var para  = document.getElementById("b_perawatan").value;
            var a_para = para.replace(',','');
            var b_para = a_para.replace(',','');
            var c_para = parseInt(b_para.replace(',',''));
            

            var lain  = document.getElementById("b_lain").value;
            var a_lain = lain.replace(',','');
            var b_lain = a_lain.replace(',','');
            var c_lain = parseInt(b_lain.replace(',',''));
            

            var total_semua = c_admin + c_prod + c_hard + c_para + c_lain + rot ;
            document.getElementById("total_biaya").value = total_semua;
            var laba = rot1 - total_semua;
            document.getElementById("hasil_laba").value = laba;
<<<<<<< HEAD
            var p_laba = (laba / rot1 * 100).toFixed(2);
=======
            var p_laba = (laba / tot_s_pajak * 100).toFixed(2);
>>>>>>> 48719cd63679c487692bd7dd62168d14e71b21b3
            document.getElementById("persen_laba").value = p_laba;
        }  
    </script>
</section>