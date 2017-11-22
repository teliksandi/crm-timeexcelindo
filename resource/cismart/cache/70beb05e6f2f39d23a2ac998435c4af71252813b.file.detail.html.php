<?php /* Smarty version Smarty-3.0.7, created on 2017-11-16 08:02:03
         compiled from "application/views\monitoring/detail.html" */ ?>
<?php /*%%SmartyHeaderCode:21451737055a0d37eba04107-75835511%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '70beb05e6f2f39d23a2ac998435c4af71252813b' => 
    array (
      0 => 'application/views\\monitoring/detail.html',
      1 => 1510559860,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21451737055a0d37eba04107-75835511',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<section class="content-header">
    <h1>
        Pengolahan Data Execution
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-archive"></i> Execution</a></li>
        <li><a href="#">Data Execution</a></li>
        <li class="active">Detail Data Execution</li>
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
                    <h3 class="box-title">Form detail initiation</h3>
                    <div class="box-tools">
                        <a class="btn btn-sm btn-primary" href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('execution/execution');?>
" ><i class="fa fa-long-arrow-left"></i> Kembali</a>
                    </div>
                </div>

                <!-- MODAL -->
                        <center>
                            <div class="form-group">
                                <button type="submit" name="Riwayat_i" class="btn btn-warning" data-toggle="modal" data-target="#r_inisiasi"><i>Riwayat Initiation</i></button>
                            </div>
                        </center>
                          <!-- Modal -->
                        <div class="modal fade" id="r_inisiasi" role="dialog">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Initiation History</h4>
                                    </div>
                                    <div class="modal-body">
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
" <?php if (in_array($_smarty_tpl->tpl_vars['cth']->value['id_department'],$_smarty_tpl->getVariable('dprt')->value)){?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['cth']->value['nama_department'];?>
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
" <?php if (in_array($_smarty_tpl->tpl_vars['value']->value['id_karyawan'],$_smarty_tpl->getVariable('kry')->value)){?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['value']->value['nama_karyawan'];?>
</option>
                                                        <?php }} else { ?>
                                                        Data tidak ditemukan !
                                                        <?php } ?>
                                                    </select>
                                            </div>
                                            <div class="form-group" style="overflow: scroll; height: 400px; width: 100%;">
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
                                            <!-- ./scroll -->
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                    <label for="budget">Budget</label>
                                                        <input type="text" name="budget" class="form-control" id="budget" placeholder="" title="Estimasi harga" value="Rp. <?php echo number_format((($tmp = @$_smarty_tpl->tpl_vars['init_rwyt']->value['budget'])===null||$tmp==='' ? '' : $tmp),0,",",".");?>
" readonly style="width: 70%;">
                                            </div>
                                            <div class="form-group">
                                                    <label for="start_date">Start date</label>    
                                                        <input type="text" name="start_date" value="<?php echo date('d F Y',strtotime((($tmp = @$_smarty_tpl->tpl_vars['init_rwyt']->value['mulai'])===null||$tmp==='' ? '' : $tmp)));?>
" class="form-control" id="start_date" placeholder="" title="Tanggal memulai" readonly style="width: 70%;">
                                            </div>
                                            <div class="form-group">
                                                    <label for="due_date">Due date</label>
                                                        <input type="text" name="due_date" value="<?php echo date('d F Y',strtotime((($tmp = @$_smarty_tpl->tpl_vars['init_rwyt']->value['akhir'])===null||$tmp==='' ? '' : $tmp)));?>
" class="form-control" id="due_date" placeholder="" title="Tanggal target selesai" readonly style="width: 70%;">
                                            </div>
                                            </div>
                                        <?php }} ?>

                                        <div class="col-md-6">
                                        <form class="form-horizontal" action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('initiation/initiation/pdf_view');?>
" method="post" target="blank">
                                                <div class="box-header with-border">
                                                    <!-- <input type="hidden" name="init_planning" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('exex')->value['id_initiation'])===null||$tmp==='' ? '' : $tmp);?>
"> -->
                                                    <label for="files[]">Files</label>
                                                    <div style="overflow-y: scroll; height: 200px;">
                                                        <div class="form-group">
                                                            <center>
                                                                <?php  $_smarty_tpl->tpl_vars['f'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('ef_i')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
                                        </form>
                                        </div>

                                    </div>
                                    <table>
                                        <div style="overflow-y: scroll; height: 200px">
                                            Komentar :
                                            <?php  $_smarty_tpl->tpl_vars['km'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('komen')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['km']->key => $_smarty_tpl->tpl_vars['km']->value){
?>
                                            <br>
                                            <b><textarea disabled class="form-control">
                                            <?php echo $_smarty_tpl->tpl_vars['km']->value['komentar'];?>
</textarea></b>
                                            <div align="right">
                                            Dikomentari pada : 
                                                <br>
                                                    <?php echo $_smarty_tpl->tpl_vars['km']->value['tgl_komentar'];?>
, <?php echo $_smarty_tpl->tpl_vars['km']->value['nama_lengkap'];?>

                                                <br>
                                            <?php }} ?>
                                            </div>
                                        </div>
                                    </table>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- RIWAYAT PLANNING -->

                        <div class="box-header with-border">
                                <center>
                                    <div class="form-group">
                                        <button type="submit" name="Riwayat_i" class="btn btn-info" data-toggle="modal" data-target="#r_planning"><i>Riwayat Planning</i></button>
                                    </div>
                                </center>
                        </div>
                          <!-- Modal -->
                        <div class="modal fade" id="r_planning" role="dialog">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Planning History</h4>
                                    </div>
                                    <div class="modal-body">
                                    <div class="box-body">
                                        <?php  $_smarty_tpl->tpl_vars['planning_rwyt'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('join_planning')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['planning_rwyt']->key => $_smarty_tpl->tpl_vars['planning_rwyt']->value){
?>
                                        <div class="form-group">
                                                <label for="project_title">Project title</label>
                                                    <input type="text" name="project_title" class="form-control" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['planning_rwyt']->value['project_title'])===null||$tmp==='' ? '' : $tmp);?>
" id="project_title" placeholder="" title="Judul Project" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="client_name">Client Name</label>
                                                    <input type="text" name="client" class="form-control" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['planning_rwyt']->value['client_name'])===null||$tmp==='' ? '' : $tmp);?>
" title="Nama Client" readonly>
                                            </div>                                        
                                            <div class="form-group">
                                                <label>Project Manager Department</label>
                                                <br>
                                                    <select name="department[]" class="form-control select2 " multiple="multiple" title="Pilih Manager Department Project" readonly disabled style="width: 100%;">
                                                        <?php  $_smarty_tpl->tpl_vars['cth'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('datadepartment_plan')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['cth']->key => $_smarty_tpl->tpl_vars['cth']->value){
?>
                                                            <option value="<?php echo $_smarty_tpl->tpl_vars['cth']->value['id_department'];?>
" 
                                                        <?php if (in_array($_smarty_tpl->tpl_vars['cth']->value['id_department'],$_smarty_tpl->getVariable('dprt_plan')->value)){?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['cth']->value['nama_department'];?>

                                                            </option>
                                                        <?php }} else { ?>
                                                        Data tidak ditemukan !
                                                        <?php } ?>
                                                    </select>
                                            </div>
                                            <div class="form-group">
                                            <label>Team Member Name</label>
                                            <br>
                                                <select name="karyawan[]" title="Pilih Anggota Tim" class="form-control select2 " data-value="" multiple="multiple" readonly disabled>
                                                    <?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('marketing_kar_plan')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
?>
                                                        <option value="<?php echo $_smarty_tpl->tpl_vars['value']->value['id_karyawan'];?>
"
                                                    <?php if (in_array($_smarty_tpl->tpl_vars['value']->value['id_karyawan'],$_smarty_tpl->getVariable('kry_plan')->value)){?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['value']->value['nama_karyawan'];?>

                                                        </option>
                                                    <?php }} else { ?>
                                                    Data tidak ditemukan !
                                                    <?php } ?>
                                                </select>
                                        </div>
                                            <div class="form-group" style="overflow: scroll; height: 400px; width: 100%;">
                                                <div class="form-group">
                                                    <label for="project_desc">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Project Description</label>
                                                        <textarea name="project_desc"  class="ckeditor" id="project_desc" placeholder="" title="Deskripsi Project" readonly><?php echo (($tmp = @$_smarty_tpl->getVariable('init_rwyt')->value['project_desc'])===null||$tmp==='' ? '' : $tmp);?>

                                                        </textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="project_just">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Project Justification</label>
                                                        <textarea name="project_just" class="ckeditor" id="project_just" placeholder="" title="Justifikasi Project" readonly><?php echo (($tmp = @$_smarty_tpl->getVariable('init_rwyt')->value['project_just'])===null||$tmp==='' ? '' : $tmp);?>

                                                        </textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="not_in_project">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Not in project</label>
                                                        <textarea name="not_in_project"  class="ckeditor" id="not_in_project" placeholder="" title="Yang tidak diperlukan" readonly><?php echo (($tmp = @$_smarty_tpl->getVariable('init_rwyt')->value['not_in_project'])===null||$tmp==='' ? '' : $tmp);?>

                                                        </textarea>
                                                </div>
                                            </div>
                                            <!-- ./scroll -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="budget">Budget</label>
                                                        <input type="text" name="budget" class="form-control" id="budget" placeholder="" title="Estimasi harga" value="Rp. <?php echo number_format((($tmp = @$_smarty_tpl->tpl_vars['planning_rwyt']->value['budget'])===null||$tmp==='' ? '' : $tmp),0,",",".");?>
" readonly >
                                                </div>
                                                <div class="form-group">
                                                    <label for="start_date">Start date</label>    
                                                        <input type="text" name="start_date" value="<?php echo date('d F Y',strtotime((($tmp = @$_smarty_tpl->tpl_vars['planning_rwyt']->value['mulai'])===null||$tmp==='' ? '' : $tmp)));?>
" class="form-control" id="start_date" placeholder="" title="Tanggal memulai" readonly>
                                                </div>
                                                <div class="form-group">
                                                        <label for="due_date">Due date</label>
                                                        <input type="text" name="due_date" value="<?php echo date('d F Y',strtotime((($tmp = @$_smarty_tpl->tpl_vars['planning_rwyt']->value['akhir'])===null||$tmp==='' ? '' : $tmp)));?>
" class="form-control" id="due_date" placeholder="" title="Tanggal target selesai" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <form class="form-horizontal" action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('initiation/initiation/pdf_view');?>
" method="post" target="blank">
                                                    <div class="box-header with-border">
                                                    <!-- <input type="hidden" name="init_planning" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('exex')->value['id_initiation'])===null||$tmp==='' ? '' : $tmp);?>
"> -->
                                                        <label for="files[]">Files</label>
                                                            <div style="overflow-y: scroll; height: 190px;">
                                                                <div class="form-group">
                                                                    <center>
                                                                    <?php  $_smarty_tpl->tpl_vars['f'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('ef_p')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
                                                </form>
                                            </div>
                                            <br>
                                            <br>

                                        <table class="table table-striped" border="3" align="center" onload="biaya()">
                                            <tbody>
                                                <tr>
                                                    <td width="15%" align="middle"><b> Uraian </b></td>
                                                    <td width="5%" align="middle"><b> % </b></td>
                                                    <td width="15%" align="middle"><b> Total </b></td>
                                                </tr>
                                                <tr>
                                                    <td align="middle"> Total Anggaran </td>
                                                    <td align="middle"></td>
                                                    <td align="middle">
                                                        <div align="center">Rp.&nbsp;<input type="text" name="Anggaran" value ="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['planning_rwyt']->value['budget'])===null||$tmp==='' ? '' : $tmp);?>
" title="Masukkan Jumlah Uang" data-inputmask="'alias': 'numeric', 'groupSeparator':'.', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'prefix': ' ', 'placeholder': '0'" data-mask required readonly></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="middle"> DPP </td>
                                                    <td align="middle"></td>
                                                    <td align="middle">
                                                        <div align="center">Rp.&nbsp;<input type="text" name="DPP" value ="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['planning_rwyt']->value['DPP'])===null||$tmp==='' ? '' : $tmp);?>
" title="Masukkan Jumlah Uang" data-inputmask="'alias': 'numeric', 'groupSeparator':'.', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'prefix': ' ', 'placeholder': '0'" data-mask required id="dpp_hasil" readonly></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="middle"> PPN </td>
                                                    <td align="middle"> 10 % </td>
                                                    <td align="middle">
                                                        <div align="center">Rp.&nbsp;<input type="text" name="PPN" value ="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['planning_rwyt']->value['PPN'])===null||$tmp==='' ? '' : $tmp);?>
" title="Masukkan Jumlah Uang" data-inputmask="'alias': 'numeric', 'groupSeparator':'.', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'prefix': ' ', 'placeholder': '0'" data-mask required readonly id="ppn_hasil"></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="middle"> PPH </td>
                                                    <td align="middle"> 2 % </td>
                                                    <td align="middle">
                                                        <div align="center">Rp.&nbsp;<input type="text" name="PPH" value ="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['planning_rwyt']->value['PPH'])===null||$tmp==='' ? '' : $tmp);?>
" title="Masukkan Jumlah Uang" data-inputmask="'alias': 'numeric', 'groupSeparator':'.', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'prefix': ' ', 'placeholder': '0'" data-mask required readonly id="pph_hasil"></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="middle" style="background-color: yellow"> Pendapatan Setelah Pajak </td>
                                                    <td align="middle" style="background-color: yellow"></td>
                                                    <td align="middle" style="background-color: yellow">
                                                        <div align="center">Rp.&nbsp;<input type="text" name="Pendapatan" value ="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['planning_rwyt']->value['pendapatan_stlh_pajak'])===null||$tmp==='' ? '' : $tmp);?>
" title="Masukkan Jumlah Uang" data-inputmask="'alias': 'numeric', 'groupSeparator':'.', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'prefix': ' ', 'placeholder': '0'" data-mask required id="netto" readonly></div>
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
                                                    <td align="middle"><input type="number" name="persen_biaya_administrasi" style="width: 40%; height: 4%; text-align: center;" readonly id="persen_b_administrasi" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['planning_rwyt']->value['p_b_administrasi'])===null||$tmp==='' ? '' : $tmp);?>
"> %</td>
                                                    <td align="middle">
                                                        <div align="center">Rp.&nbsp;<input type="text" name="Adm" value ="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['planning_rwyt']->value['b_administrasi'])===null||$tmp==='' ? '' : $tmp);?>
" title="Masukkan Jumlah Uang" data-inputmask="'alias': 'numeric', 'groupSeparator':'.', 'autoGroup': true, 'digits': 0, 'digitsOptional': true, 'prefix': ' ', 'placeholder': '0'" data-mask  onchange="biayaAdministrasi()" id="b_administrasi" readonly></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="middle"> Biaya Produksi dan Operasional </td>
                                                    <td align="middle"><input type="text" name="persen_biaya_produksi" style="width: 40%; height: 4%; text-align: center;" readonly id="persen_b_produksi" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['planning_rwyt']->value['p_b_produksi_dan_operasional'])===null||$tmp==='' ? '' : $tmp);?>
"> %</td>
                                                    <td align="middle">
                                                        <div align="center">Rp.&nbsp;<input type="text" name="Produksi" value ="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['planning_rwyt']->value['b_produksi_dan_operasional'])===null||$tmp==='' ? '' : $tmp);?>
" title="Masukkan Jumlah Uang" data-inputmask="'alias': 'numeric', 'groupSeparator':'.', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'prefix': ' ', 'placeholder': '0'" data-mask  onchange="biayaProduksi()" id="b_produksi" readonly></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="middle"> Biaya Hardware & Infrastruktur </td>
                                                    <td align="middle"><input type="number" name="persen_biaya_hardware" style="width: 40%; height: 4%; text-align: center;" readonly id="persen_b_hardware" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['planning_rwyt']->value['p_b_hardware_dan_infrastruktur'])===null||$tmp==='' ? '' : $tmp);?>
"> %</td>
                                                    <td align="middle">
                                                        <div align="center">Rp.&nbsp;<input type="text" name="Hardware" value ="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['planning_rwyt']->value['b_hardware_dan_infrastruktur'])===null||$tmp==='' ? '' : $tmp);?>
" title="Masukkan Jumlah Uang" data-inputmask="'alias': 'numeric', 'groupSeparator':'.', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'prefix': ' ', 'placeholder': '0'" data-mask  onchange="biayaHardware()" id="b_hardware" readonly></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="middle"> Biaya Perawatan / Garansi </td>
                                                    <td align="middle"><input type="number" name="persen_biaya_perawatan" style="width: 40%; height: 4%; text-align: center;" readonly id="persen_b_perawatan" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['planning_rwyt']->value['p_b_perawatan'])===null||$tmp==='' ? '' : $tmp);?>
"> %</td>
                                                    <td align="middle">
                                                        <div align="center">Rp.&nbsp;<input type="text" name="Perawatan" value ="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['planning_rwyt']->value['b_perawatan'])===null||$tmp==='' ? '' : $tmp);?>
" title="Masukkan Jumlah Uang" data-inputmask="'alias': 'numeric', 'groupSeparator':'.', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'prefix': ' ', 'placeholder': '0'" data-mask  onchange="biayaPerawatan()" id="b_perawatan" readonly></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="middle"> Biaya Lain-Lain </td>
                                                    <td align="middle"><input type="number" name="persen_biaya_lain" style="width: 40%; height: 4%; text-align: center;" readonly id="persen_b_lain" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['planning_rwyt']->value['p_b_lain_lain'])===null||$tmp==='' ? '' : $tmp);?>
"> %</td>
                                                    <td align="middle">
                                                        <div align="center">Rp.&nbsp;<input type="text" name="Lain" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['planning_rwyt']->value['b_lain_lain'])===null||$tmp==='' ? '' : $tmp);?>
" title="Masukkan Jumlah Uang" data-inputmask="'alias': 'numeric', 'groupSeparator':'.', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'prefix': ' ', 'placeholder': '0'" data-mask  onchange="biayaLain()" id="b_lain" readonly></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="middle"> Biaya Entertaint </td>
                                                    <td align="middle"><input type="number" name="persen_biaya_entertaint" style="width: 40%; height: 4%; text-align: center;" readonly id="persen_b_entertaint" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['planning_rwyt']->value['p_b_entertaint'])===null||$tmp==='' ? '' : $tmp);?>
"> %</td>
                                                    <td align="middle">
                                                        <div align="center">Rp.&nbsp;<input type="text" name="Entertaint" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['planning_rwyt']->value['b_entertaint'])===null||$tmp==='' ? '' : $tmp);?>
" title="Masukkan Jumlah Uang" data-inputmask="'alias': 'numeric', 'groupSeparator':'.', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'prefix': ' ', 'placeholder': '0'" data-mask  onchange="biayaEntertaint()" id="b_entertaint" readonly></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="middle" style="background-color: yellow"> Total Biaya </td>
                                                    <td align="middle" style="background-color: yellow"></td>
                                                    <td align="middle" style="background-color: yellow">
                                                        <div align="center">Rp.&nbsp;<input type="text" name="Total" title="Masukkan Jumlah Uang" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['planning_rwyt']->value['total_biaya'])===null||$tmp==='' ? '' : $tmp);?>
" data-inputmask="'alias': 'numeric', 'groupSeparator':'.', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'prefix': ' ', 'placeholder': '0'" data-mask required id="total_biaya" readonly></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="middle">  </td>
                                                    <td align="middle">  </td>
                                                    <td align="middle">  </td>
                                                </tr>
                                                <tr>
                                                    <td align="middle" style="background-color: yellow"> Perkiraan Laba Rugi </td>
                                                    <td align="middle" style="background-color: yellow"><input type="number" name="persen_rugi_laba" style="width: 40%; height: 4%; text-align: center;" readonly id="persen_laba" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['planning_rwyt']->value['p_perkiraan_rugi_laba'])===null||$tmp==='' ? '' : $tmp);?>
"> %</td>
                                                    <td align="middle" style="background-color: yellow">
                                                        <div align="center">Rp.&nbsp;<input type="text" name="laba" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['planning_rwyt']->value['perkiraan_rugi_laba'])===null||$tmp==='' ? '' : $tmp);?>
" title="Masukkan Jumlah Uang" data-inputmask="'alias': 'numeric', 'groupSeparator':'.', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'prefix': ' ', 'placeholder': '0'" data-mask required readonly id="hasil_laba"></div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <?php }} ?>
                                    </div>
                                        <div class="box-header with-border">
                                            <table>
                                                <div style="overflow-y: scroll; height: 200px">
                                                    Komentar :
                                                <?php  $_smarty_tpl->tpl_vars['km'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('komen_plan')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['km']->key => $_smarty_tpl->tpl_vars['km']->value){
?>
                                                <br>
                                                <b><textarea disabled class="form-control">
                                                <?php echo $_smarty_tpl->tpl_vars['km']->value['komentar'];?>
</textarea></b>
                                                    <div align="right">
                                                Dikomentari pada : 
                                                    <br>
                                                    <?php echo $_smarty_tpl->tpl_vars['km']->value['tgl_komentar'];?>
, <?php echo $_smarty_tpl->tpl_vars['km']->value['nama_lengkap'];?>

                                                    <br>
                                                <?php }} ?>
                                                    </div>
                                                </div>
                                            </table>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                <!-- /.box-header -->

                <div class="box-body">
                    <form class="form-horizontal" action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('execution/execution/execution_process');?>
" method="post">
                      <?php  $_smarty_tpl->tpl_vars['exex'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('execution_detail')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['exex']->key => $_smarty_tpl->tpl_vars['exex']->value){
?>
                        <input type="hidden" name="id_initiation" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['exex']->value['id_initiation'])===null||$tmp==='' ? '' : $tmp);?>
" id="id_initiation">
                            <div class="box-header with-border">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="client_name">Client Name</label>
                                            <input type="text" name="client" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['exex']->value['client_name'])===null||$tmp==='' ? '' : $tmp);?>
" class="form-control"  title="Nama Client" readonly style="width: 95%;">
                                    </div>
                                    <div class="form-group">
                                        <label for="project_title">Project title</label>
                                            <input type="text" name="project_title" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['exex']->value['project_title'])===null||$tmp==='' ? '' : $tmp);?>
" class="form-control" id="project_title" placeholder="" title="Judul Project" readonly style="width: 95%;">
                                    </div>        
                                    <div class="form-group">
                                        <label>Project Manager Department</label>
                                        <br>
                                            <select name="department[]" id="department" class="form-control select2 department" multiple="multiple" title="Pilih Manager Department Project" style="width: 95%;">
                                                <?php  $_smarty_tpl->tpl_vars['cth'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('datadepartment_exet')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['cth']->key => $_smarty_tpl->tpl_vars['cth']->value){
?>
                                                    <option value="<?php echo $_smarty_tpl->tpl_vars['cth']->value['id_department'];?>
" <?php if (in_array($_smarty_tpl->tpl_vars['cth']->value['id_department'],$_smarty_tpl->getVariable('dprt_exet')->value)){?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['cth']->value['nama_department'];?>
</option>
                                                <?php }} else { ?>
                                                Data tidak ditemukan !
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Team Member Name</label>
                                            <br>
                                                <select name="karyawan[]" title="Pilih Anggota Tim" class="form-control select2 karyawan" data-value="" multiple="multiple" style="width: 95%;">
                                                <?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('marketing_kar_exet')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
?>
                                                    <option value="<?php echo $_smarty_tpl->tpl_vars['value']->value['id_karyawan'];?>
" <?php if (in_array($_smarty_tpl->tpl_vars['value']->value['id_karyawan'],$_smarty_tpl->getVariable('kry_exet')->value)){?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['value']->value['nama_karyawan'];?>
</option>
                                                <?php }} else { ?>
                                                Data tidak ditemukan !
                                                <?php } ?>
                                                </select>
                                        </div>

                                    <div class="form-group" style="overflow: scroll; height: 400px; width: 100%;">
                                        <div class="form-group">
                                            <script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
resource/themes/ckeditor/ckeditor.js"></script>
                                                <label for="project_desc">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Project Description</label>
                                                    <textarea name="project_desc"  class="ckeditor" id="project_desc" placeholder="" title="Deskripsi Project" readonly><?php echo (($tmp = @$_smarty_tpl->tpl_vars['exex']->value['project_desc'])===null||$tmp==='' ? '' : $tmp);?>

                                                    </textarea>
                                        </div>
                                        <div class="form-group">
                                            <script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
resource/themes/ckeditor/ckeditor.js"></script>
                                                <label for="project_just">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Project Justification</label>
                                                    <textarea name="project_just" class="ckeditor" id="project_just" placeholder="" title="Justifikasi Project" readonly><?php echo (($tmp = @$_smarty_tpl->tpl_vars['exex']->value['project_just'])===null||$tmp==='' ? '' : $tmp);?>

                                                    </textarea>
                                        </div>
                                        <div class="form-group">
                                            <script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
resource/themes/ckeditor/ckeditor.js"></script>
                                                <label for="not_in_project">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Not in project</label>
                                                    <textarea name="not_in_project"  class="ckeditor" id="not_in_project" placeholder="" title="Yang tidak diperlukan" readonly><?php echo (($tmp = @$_smarty_tpl->tpl_vars['exex']->value['not_in_project'])===null||$tmp==='' ? '' : $tmp);?>

                                                    </textarea>
                                        </div>
                                    </div>
                                    <!-- ./scroll -->

                                        <div class="form-group">
                                            <div class="col-md-4">
                                                <label for="budget">Budget</label>
                                                    <input type="text" name="budget" value="Rp. <?php echo number_format((($tmp = @$_smarty_tpl->tpl_vars['exex']->value['budget'])===null||$tmp==='' ? '' : $tmp),2,",",".");?>
" class="form-control" id="budget" placeholder="" title="Estimasi harga" readonly >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-4">
                                                <label for="start_date">Start date</label>    
                                                    <input type="text" name="start_date" value="<?php echo date('d F Y',strtotime((($tmp = @$_smarty_tpl->tpl_vars['exex']->value['mulai'])===null||$tmp==='' ? '' : $tmp)));?>
" class="form-control" id="start_date" placeholder="" title="Tanggal memulai" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-4">
                                                <label for="due_date">Due date</label>
                                                    <input type="text" name="due_date" value="<?php echo date('d F Y',strtotime((($tmp = @$_smarty_tpl->tpl_vars['exex']->value['akhir'])===null||$tmp==='' ? '' : $tmp)));?>
" class="form-control" id="due_date" placeholder="" title="Tanggal target selesai" readonly>
                                            </div>
                                        </div>
                                </div>
                </form>

                        <div class="col-md-6">
                            <form class="form-horizontal" action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('initiation/initiation/pdf_view');?>
" method="post" target="blank">
                            <!-- <input type="hidden" name="init_planning" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('jn')->value['id_initiation'])===null||$tmp==='' ? '' : $tmp);?>
"> -->
                                <label for="files[]">Files</label>
                                    <div style="overflow-y: scroll; height: 200px; width: 100%;">
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
                            </form>
                            <br>
                            <form class="form-horizontal" action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('monitoring/monitoring/monitoring_process');?>
" method="post">
                                <center>
                                <br>
                                    <div class="form-group">
                                        <?php  $_smarty_tpl->tpl_vars['moni'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('monitoring')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['moni']->key => $_smarty_tpl->tpl_vars['moni']->value){
?>
                                        <input type="hidden" name="init_execution" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['exex']->value['id_execution'])===null||$tmp==='' ? '' : $tmp);?>
">
                                        <input type="hidden" name="start_monitoring" id="mulai_monitoring">
                                        <input type="hidden" name="due_monitoring" value="<?php echo date('d F Y',strtotime((($tmp = @$_smarty_tpl->getVariable('exec')->value['due_date'])===null||$tmp==='' ? '' : $tmp)));?>
">
                                        <input type="hidden" name="department_monitoring[]" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['moni']->value['id_department'])===null||$tmp==='' ? '' : $tmp);?>
">
                                        <input type="hidden" name="karyawan_monitoring[]" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['moni']->value['id_karyawan'])===null||$tmp==='' ? '' : $tmp);?>
">
                                        <?php }} ?>
                                            <button type="submit" name="accept" class="btn btn-success">Accept</button></div>
                                    </center>
                            </form>

                    <form class="form-horizontal" action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('initiation/initiation/komentar_process');?>
" method="post">
                                    <div class="form-group">
                                            <table>
                                                <div style="overflow-y: scroll; height: 200px">
                                                    Komentar :
                                                    <?php  $_smarty_tpl->tpl_vars['km'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('komen_exe')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['km']->key => $_smarty_tpl->tpl_vars['km']->value){
?>
                                                        <br>
                                                        <b><textarea disabled class="form-control">
                                                            <?php echo $_smarty_tpl->tpl_vars['km']->value['komentar'];?>
</textarea></b>
                                                <div align="right">
                                                    Dikomentari pada : 
                                                        <br>
                                                            <?php echo $_smarty_tpl->tpl_vars['km']->value['tgl_komentar'];?>
, <?php echo $_smarty_tpl->tpl_vars['km']->value['nama_lengkap'];?>

                                                        <br>
                                                    <?php }} ?>
                                                </div>
                                                </div>
                                            </table>
                                                <input type="hidden" name="id_execution_komentar" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['exex']->value['id_execution'])===null||$tmp==='' ? '' : $tmp);?>
">
                                                <input type="hidden" name="tgl_komentar" max = "50" value="<?php echo date('d-m-Y h:i:sa');?>
">
                                                    <br>

                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <textarea name="komentarin" class="form-control" title="Komentar"></textarea>
                                                                    <br>
                                                                <div align="right">
                                                                    <button type="submit" name="submit" class="btn btn-info">Comment</button></div>
                                                        </div>
                                                    </div>
                                   </div>
                                        <?php }} ?>
                    </form>
                    </div>


                               </div>
                               <!-- /.box-header --> 
                            </div>
                            <!-- /,col -->

                        </div>
                        <!-- /,box-header -->

                </div> 
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </div>
        <!-- /.col -->
    </div>

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
            document.getElementById("mulai_monitoring").value = today;
    </script>
</section>