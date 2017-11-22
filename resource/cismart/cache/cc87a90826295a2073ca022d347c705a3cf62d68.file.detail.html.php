<?php /* Smarty version Smarty-3.0.7, created on 2017-11-07 05:14:11
         compiled from "application/views\closing/detail.html" */ ?>
<?php /*%%SmartyHeaderCode:12940198295a0133136099a7-22051708%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cc87a90826295a2073ca022d347c705a3cf62d68' => 
    array (
      0 => 'application/views\\closing/detail.html',
      1 => 1510028040,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12940198295a0133136099a7-22051708',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<section class="content-header">
    <h1>
        Pengolahan Data Closing
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-sticky-note"></i> Closing</a></li>
        <li><a href="#">Data Closing</a></li>
        <li class="active">Detail Data Closing</li>
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
                    <h3 class="box-title">Form detail Closing</h3>
                    <div class="box-tools">
                        <a class="btn btn-sm btn-primary" href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('closing/closing');?>
" ><i class="fa fa-long-arrow-left"></i> Kembali</a>
                    </div>
                </div>
                <!-- /.box-header -->

                <div class="box-body">
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
" 
                                                        <?php if (in_array($_smarty_tpl->tpl_vars['cth']->value['id_department'],$_smarty_tpl->getVariable('dprt')->value)){?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['cth']->value['nama_department'];?>

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
"
                                                        <?php if (in_array($_smarty_tpl->tpl_vars['value']->value['id_karyawan'],$_smarty_tpl->getVariable('kry')->value)){?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['value']->value['nama_karyawan'];?>

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
                                                        <input type="text" name="start_date" value="<?php echo date('d F Y',strtotime((($tmp = @$_smarty_tpl->tpl_vars['init_rwyt']->value['start_date'])===null||$tmp==='' ? '' : $tmp)));?>
" class="form-control" id="start_date" placeholder="" title="Tanggal memulai" readonly style="width: 70%;">
                                            </div>
                                            <div class="form-group">
                                                    <label for="due_date">Due date</label>
                                                        <input type="text" name="due_date" value="<?php echo date('d F Y',strtotime((($tmp = @$_smarty_tpl->tpl_vars['init_rwyt']->value['due_date'])===null||$tmp==='' ? '' : $tmp)));?>
" class="form-control" id="due_date" placeholder="" title="Tanggal target selesai" readonly style="width: 70%;">
                                            </div>
                                            </div>
                                        <?php }} ?>

                                        <div class="col-md-6">
                                        <form class="form-horizontal" action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('initiation/initiation/pdf_view');?>
" method="post" target="blank">
                                                <div class="box-header with-border">
                                                    <!-- <input type="hidden" name="init_planning" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('jn')->value['id_initiation'])===null||$tmp==='' ? '' : $tmp);?>
"> -->
                                                    <label for="files[]">Files</label>
                                                    <div style="overflow-y: scroll; height: 200px;">
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
                        <!-- Model Riwayat Inisiasi -->


        <!-- ▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬ -->
        <!-- ▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬ -->
        <!-- ▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬ -->


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
 $_from = $_smarty_tpl->getVariable('datadepartment')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['cth']->key => $_smarty_tpl->tpl_vars['cth']->value){
?>
                                                            <option value="<?php echo $_smarty_tpl->tpl_vars['cth']->value['id_department'];?>
" 
                                                        <?php if (in_array($_smarty_tpl->tpl_vars['cth']->value['id_department'],$_smarty_tpl->getVariable('dprt')->value)){?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['cth']->value['nama_department'];?>

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
 $_from = $_smarty_tpl->getVariable('marketing_kar')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
?>
                                                        <option value="<?php echo $_smarty_tpl->tpl_vars['value']->value['id_karyawan'];?>
"
                                                    <?php if (in_array($_smarty_tpl->tpl_vars['value']->value['id_karyawan'],$_smarty_tpl->getVariable('kry')->value)){?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['value']->value['nama_karyawan'];?>

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
                                            <div class="form-group">
                                                <div class="col-md-6">
                                                    <label for="budget">Budget</label>
                                                        <input type="text" name="budget" class="form-control" id="budget" placeholder="" title="Estimasi harga" value="Rp. <?php echo number_format((($tmp = @$_smarty_tpl->tpl_vars['planning_rwyt']->value['budget'])===null||$tmp==='' ? '' : $tmp),0,",",".");?>
" readonly >
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="start_date">Start date</label>    
                                                        <input type="text" name="start_date" value="<?php echo date('d F Y',strtotime((($tmp = @$_smarty_tpl->tpl_vars['planning_rwyt']->value['start_date'])===null||$tmp==='' ? '' : $tmp)));?>
" class="form-control" id="start_date" placeholder="" title="Tanggal memulai" readonly>
                                                </div>
                                                <div class="form-group">
                                                        <label for="due_date">Due date</label>
                                                        <input type="text" name="due_date" value="<?php echo date('d F Y',strtotime((($tmp = @$_smarty_tpl->tpl_vars['planning_rwyt']->value['due_date'])===null||$tmp==='' ? '' : $tmp)));?>
" class="form-control" id="due_date" placeholder="" title="Tanggal target selesai" readonly>
                                                </div>
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
                                                        <div align="center">Rp.&nbsp;<input type="text" name="Anggaran" value ="<?php echo (($tmp = @$_smarty_tpl->getVariable('rs')->value['budget'])===null||$tmp==='' ? '' : $tmp);?>
" title="Total Anggaran" data-inputmask="'alias': 'numeric', 'groupSeparator':'.', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'prefix': ' ', 'placeholder': '0'" data-mask required readonly></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="middle"> DPP </td>
                                                    <td align="middle"></td>
                                                    <td align="middle">
                                                        <div align="center">Rp.&nbsp;<input type="text" name="DPP" value ="0" title="DPP" data-inputmask="'alias': 'numeric', 'groupSeparator':'.', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'prefix': ' ', 'placeholder': '0'" data-mask required id="dpp_hasil" readonly></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="middle"> PPN </td>
                                                    <td align="middle"> 10 % </td>
                                                    <td align="middle">
                                                        <div align="center">Rp.&nbsp;<input type="text" name="PPN" value ="0" title="PPN" data-inputmask="'alias': 'numeric', 'groupSeparator':'.', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'prefix': ' ', 'placeholder': '0'" data-mask required readonly id="ppn_hasil"></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="middle"> PPH </td>
                                                    <td align="middle"> 2 % </td>
                                                    <td align="middle">
                                                        <div align="center">Rp.&nbsp;<input type="text" name="PPH" value ="0" title="PPH" data-inputmask="'alias': 'numeric', 'groupSeparator':'.', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'prefix': ' ', 'placeholder': '0'" data-mask required readonly id="pph_hasil"></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="middle" style="background-color: yellow"> Pendapatan Setelah Pajak </td>
                                                    <td align="middle" style="background-color: yellow"></td>
                                                    <td align="middle" style="background-color: yellow">
                                                        <div align="center">Rp.&nbsp;<input type="text" name="Pendapatan" value ="0" title="Pendapatan setelah pajak" data-inputmask="'alias': 'numeric', 'groupSeparator':'.', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'prefix': ' ', 'placeholder': '0'" data-mask required id="netto" readonly></div>
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
                                                    <td align="middle"><input type="number" name="persen_biaya_administrasi" style="width: 40%; height: 4%; text-align: center;" readonly id="persen_b_administrasi" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('rs')->value['p_b_administrasi'])===null||$tmp==='' ? '' : $tmp);?>
"> %</td>
                                                    <td align="middle">
                                                        <div align="center">Rp.&nbsp;<input type="text" name="Adm" value ="<?php echo (($tmp = @$_smarty_tpl->getVariable('rs')->value['b_administrasi'])===null||$tmp==='' ? '' : $tmp);?>
" title="Masukkan biaya Administrasi" data-inputmask="'alias': 'numeric', 'groupSeparator':'.', 'autoGroup': true, 'digits': 0, 'digitsOptional': true, 'prefix': ' ', 'placeholder': '0'" data-mask  onchange="biayaAdministrasi()" id="b_administrasi" ></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="middle"> Biaya Produksi dan Operasional </td>
                                                    <td align="middle"><input type="text" name="persen_biaya_produksi" style="width: 40%; height: 4%; text-align: center;" readonly id="persen_b_produksi" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('rs')->value['p_b_produksi_dan_operasional'])===null||$tmp==='' ? '' : $tmp);?>
"> %</td>
                                                    <td align="middle">
                                                        <div align="center">Rp.&nbsp;<input type="text" name="Produksi" value ="<?php echo (($tmp = @$_smarty_tpl->getVariable('rs')->value['b_produksi_dan_operasional'])===null||$tmp==='' ? '' : $tmp);?>
" title="Masukkan biaya Produksi" data-inputmask="'alias': 'numeric', 'groupSeparator':'.', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'prefix': ' ', 'placeholder': '0'" data-mask  onchange="biayaProduksi()" id="b_produksi" ></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="middle"> Biaya Hardware & Infrastruktur </td>
                                                    <td align="middle"><input type="number" name="persen_biaya_hardware" style="width: 40%; height: 4%; text-align: center;" readonly id="persen_b_hardware" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('rs')->value['p_b_hardware_dan_infrastruktur'])===null||$tmp==='' ? '' : $tmp);?>
"> %</td>
                                                    <td align="middle">
                                                        <div align="center">Rp.&nbsp;<input type="text" name="Hardware" value ="<?php echo (($tmp = @$_smarty_tpl->getVariable('rs')->value['b_hardware_dan_infrastruktur'])===null||$tmp==='' ? '' : $tmp);?>
" title="Masukkan biaya Hardware" data-inputmask="'alias': 'numeric', 'groupSeparator':'.', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'prefix': ' ', 'placeholder': '0'" data-mask  onchange="biayaHardware()" id="b_hardware"></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="middle"> Biaya Perawatan / Garansi </td>
                                                    <td align="middle"><input type="number" name="persen_biaya_perawatan" style="width: 40%; height: 4%; text-align: center;" readonly id="persen_b_perawatan" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('rs')->value['p_b_perawatan'])===null||$tmp==='' ? '' : $tmp);?>
"> %</td>
                                                    <td align="middle">
                                                        <div align="center">Rp.&nbsp;<input type="text" name="Perawatan" value ="<?php echo (($tmp = @$_smarty_tpl->getVariable('rs')->value['b_perawatan'])===null||$tmp==='' ? '' : $tmp);?>
" title="Masukkan Biaya Perawatan" data-inputmask="'alias': 'numeric', 'groupSeparator':'.', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'prefix': ' ', 'placeholder': '0'" data-mask  onchange="biayaPerawatan()" id="b_perawatan"></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="middle"> Biaya Lain-Lain </td>
                                                    <td align="middle"><input type="number" name="persen_biaya_lain" style="width: 40%; height: 4%; text-align: center;" readonly id="persen_b_lain" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('rs')->value['p_b_lain_lain'])===null||$tmp==='' ? '' : $tmp);?>
"> %</td>
                                                    <td align="middle">
                                                        <div align="center">Rp.&nbsp;<input type="text" name="Lain" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('rs')->value['b_lain_lain'])===null||$tmp==='' ? '' : $tmp);?>
" title="Masukkan biaya Lain_lain" data-inputmask="'alias': 'numeric', 'groupSeparator':'.', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'prefix': ' ', 'placeholder': '0'" data-mask  onchange="biayaLain()" id="b_lain"></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="middle"> Biaya Entertaint </td>
                                                    <td align="middle"><input type="number" name="persen_biaya_entertaint" style="width: 40%; height: 4%; text-align: center;" readonly id="persen_b_entertaint" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('rs')->value['p_b_entertaint'])===null||$tmp==='' ? '' : $tmp);?>
"> %</td>
                                                    <td align="middle">
                                                        <div align="center">Rp.&nbsp;<input type="text" name="Entertaint" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('rs')->value['b_entertaint'])===null||$tmp==='' ? '' : $tmp);?>
" title="Masukkan biaya Entertaint" data-inputmask="'alias': 'numeric', 'groupSeparator':'.', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'prefix': ' ', 'placeholder': '0'" data-mask  onchange="biayaEntertaint()" id="b_entertaint"></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="middle" style="background-color: yellow"> Total Biaya </td>
                                                    <td align="middle" style="background-color: yellow"></td>
                                                    <td align="middle" style="background-color: yellow">
                                                        <div align="center">Rp.&nbsp;<input type="text" name="Total" title="Masukkan Jumlah Uang" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('rs')->value['total_biaya'])===null||$tmp==='' ? '' : $tmp);?>
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
                                                    <td align="middle" style="background-color: yellow"><input type="number" name="persen_rugi_laba" style="width: 40%; height: 4%; text-align: center;" readonly id="persen_laba" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('rs')->value['p_perkiraan_rugi_laba'])===null||$tmp==='' ? '' : $tmp);?>
"> %</td>
                                                    <td align="middle" style="background-color: yellow">
                                                        <div align="center">Rp.&nbsp;<input type="text" name="laba" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('rs')->value['perkiraan_rugi_laba'])===null||$tmp==='' ? '' : $tmp);?>
" title="" data-inputmask="'alias': 'numeric', 'groupSeparator':'.', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'prefix': ' ', 'placeholder': '0'" data-mask required readonly id="hasil_laba"></div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <?php }} ?>
                                    </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Model Riwayat Planning -->


        <!-- ▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬ -->
        <!-- ▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬ -->
        <!-- ▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬ -->


            </div>
            <!-- box -->
        </div>
        <!-- col -->
    </div>
    <!-- row -->
</section>