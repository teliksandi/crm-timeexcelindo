<?php /* Smarty version Smarty-3.0.7, created on 2017-11-22 08:16:26
         compiled from "application/views\initiation/detail.html" */ ?>
<?php /*%%SmartyHeaderCode:5905a15244a8accd0-33375550%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c749e62b1cfe22a70503f948643e55bce0a31613' => 
    array (
      0 => 'application/views\\initiation/detail.html',
      1 => 1511283480,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5905a15244a8accd0-33375550',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<section class="content-header"> 
    <br>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-book"></i> Initiation</a></li>
        <li><a href="#">Data Initiation</a></li>
        <li class="active">Detail Data Initiation</li>
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
                    <h3><b>Form detail initiation</b></h3>
                    <div class="box-tools">
                        <br><a class="btn btn-sm btn-primary" href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('initiation/initiation');?>
" ><i class="fa fa-long-arrow-left"></i> Kembali</a>
                    </div>
                </div>
                <!-- /.box-header -->
            </div>
        </div>
        <!-- col -->

                <form class="form-horizontal" action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('planning/planning/planning_process');?>
" method="post">
                    <?php  $_smarty_tpl->tpl_vars['jn'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('join')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['jn']->key => $_smarty_tpl->tpl_vars['jn']->value){
?>
                        <input type="hidden" name="id_initiation" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['jn']->value['id_initiation'])===null||$tmp==='' ? '' : $tmp);?>
" id="id_initiation">
                            <div class="col-md-6">
                                <div class="box">
                                    <div class="box-body">
                                        <label for="client_name">Client Name</label>
                                            <input type="text" name="client" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['jn']->value['client_name'])===null||$tmp==='' ? '' : $tmp);?>
" class="form-control"  title="Nama Client" readonly><br>
                                        <label for="project_title">Project title</label>
                                            <input type="text" name="project_title" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['jn']->value['project_title'])===null||$tmp==='' ? '' : $tmp);?>
" class="form-control" id="project_title" placeholder="" title="Judul Project" readonly><br>
                                        <label>Project Manager Department</label>
                                            <br>
                                            <select name="department[]" id="department" class="form-control select2 " multiple="multiple" title="Pilih Manager Department Project" id="department">
                                                <?php  $_smarty_tpl->tpl_vars['cth'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('datadepartment')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['cth']->key => $_smarty_tpl->tpl_vars['cth']->value){
?>
                                                    <option value="<?php echo $_smarty_tpl->tpl_vars['cth']->value['id_department'];?>
" <?php if (in_array($_smarty_tpl->tpl_vars['cth']->value['id_department'],$_smarty_tpl->getVariable('ex')->value)){?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['cth']->value['nama_department'];?>
</option>
                                                <?php }} else { ?>
                                                Data tidak ditemukan !
                                                <?php } ?>
                                            </select>
                                            <br><br>
                                        <label>Team Member Name</label>
                                            <br>
                                            <select name="karyawan[]" title="Pilih Anggota Tim" class="form-control select2 " data-value="" multiple="multiple" id="karyawan">
                                                <?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('marketing_kar')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
?>
                                                    <option value="<?php echo $_smarty_tpl->tpl_vars['value']->value['id_karyawan'];?>
" <?php if (in_array($_smarty_tpl->tpl_vars['value']->value['id_karyawan'],$_smarty_tpl->getVariable('exs')->value)){?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['value']->value['nama_karyawan'];?>
</option>
                                                <?php }} else { ?>
                                                Data tidak ditemukan !
                                                <?php } ?>
                                            </select>
                                        <br><br><label for="budget">Budget</label>
                                                <input type="text" name="budget" value="Rp. <?php echo number_format((($tmp = @$_smarty_tpl->tpl_vars['jn']->value['budget'])===null||$tmp==='' ? '' : $tmp),2,",",".");?>
" class="form-control" id="budget" placeholder="" title="Estimasi harga" readonly >
                                    </div>
                                </div>
                            </div>
                            <!-- col -->

                            <div class="col-md-6">
                                <div class="box">
                                    <div class="box-body">
                                        <div style="overflow: scroll; height: 380px; width: 100%;">
                                            <label for="project_desc">Project Description</label>
                                                <textarea name="project_desc"  class="ckeditor" id="project_desc" placeholder="" title="Deskripsi Project" readonly><?php echo (($tmp = @$_smarty_tpl->tpl_vars['jn']->value['project_desc'])===null||$tmp==='' ? '' : $tmp);?>

                                                </textarea><br>
                                            <label for="project_just">Project Justification</label>
                                                <textarea name="project_just" class="ckeditor" id="project_just" placeholder="" title="Justifikasi Project" readonly><?php echo (($tmp = @$_smarty_tpl->tpl_vars['jn']->value['project_just'])===null||$tmp==='' ? '' : $tmp);?>

                                                </textarea><br>
                                            <label for="not_in_project">Not in project</label>
                                                <textarea name="not_in_project"  class="ckeditor" id="not_in_project" placeholder="" title="Yang tidak diperlukan" readonly><?php echo (($tmp = @$_smarty_tpl->tpl_vars['jn']->value['not_in_project'])===null||$tmp==='' ? '' : $tmp);?>

                                                </textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- col -->

                            <div class="col-md-6">
                                <div class="box">
                                    <div class="box-body">
                                        <table>
                                            <tr>
                                                <td width="245px" align="center"><b>Start Date</b></td>
                                                <td>     </td>
                                                <td width="245px" align="center"><b>Due Date</b></td>
                                            </tr>
                                            <tr>
                                                <td align="center">
                                                    <br><input type="text" name="start_date" value="<?php echo date('d F Y',strtotime((($tmp = @$_smarty_tpl->tpl_vars['jn']->value['start_date'])===null||$tmp==='' ? '' : $tmp)));?>
" class="form-control" id="start_date" placeholder="" title="Tanggal memulai" readonly style="text-align: center;">
                                                </td>
                                                <td>     </td>
                                                <td align="center">
                                                    <br><input type="text" name="due_date" value="<?php echo date('d F Y',strtotime((($tmp = @$_smarty_tpl->tpl_vars['jn']->value['due_date'])===null||$tmp==='' ? '' : $tmp)));?>
" class="form-control" id="due_date" placeholder="" title="Tanggal target selesai" readonly style="text-align: center;">
                                                </td>
                                            </tr>
                                        </table>
                                        <br><br>
                                    </div>
                                </div>
                            </div>
                            <!-- col -->

                            <div class="col-md-6">
                                <div class="box">
                                    <div class="box-body">
                                        <b>Files</b>
                                                <div class="box-header with-border">
                                                <!-- <input type="hidden" name="init_planning" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['jn']->value['id_initiation'])===null||$tmp==='' ? '' : $tmp);?>
"> -->
                                                        <div style="overflow-y: scroll; height: 73px; width: 100%;">
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
                            </div>
                            <!-- col -->
                </form>

                            <div class="col-md-12">
                                <div class="box box-primary">
                                    <div class="box-body">
                                        <form class="form-horizontal" action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('initiation/initiation/komentar_process');?>
" method="post">
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
                                                        Dikomentari pada :  <?php echo $_smarty_tpl->tpl_vars['km']->value['tgl_komentar'];?>

                                                        <hr></hr>
                                                        <?php }} ?>
                                                    </div>
                                                </div>
 <?php ob_start();?><?php echo $_smarty_tpl->getVariable('jabatan')->value;?>
<?php $_tmp1=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->getVariable('department')->value;?>
<?php $_tmp2=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->getVariable('department')->value;?>
<?php $_tmp3=ob_get_clean();?><?php if ($_tmp1!=3&&($_tmp2==10||$_tmp3==8)){?>                                         
                                            </table>
                                                <input type="hidden" name="id_initiation_komentar" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['jn']->value['id_initiation'])===null||$tmp==='' ? '' : $tmp);?>
">
                                                <input type="hidden" name="tgl_komentar" max = "50" value="<?php echo date('d-m-Y h:i:sa');?>
">
                                                    <br>
                                                            <textarea name="komentarin" class="form-control" title="Komentar"></textarea>
                                                            <br>
                                                            <div align="right">
                                                                               <button type="submit" name="submit" class="btn btn-info" style="width: 8%;">Comment</button>
                                                            </div>
<?php }?>
                                    </div>
                                </div>
                            </div>

                    <?php }} ?>
                </form>

                            <div class="col-md-12">
                                <div class="box">
                                    <div class="box-body">
                                        <center>
                                        <table>
<?php ob_start();?><?php echo $_smarty_tpl->getVariable('department')->value;?>
<?php $_tmp4=ob_get_clean();?><?php if ($_tmp4==10){?>
                                            <tr>
                                                <form class="" action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('planning/planning/planning_process');?>
" method="post">
                                                    <input type="hidden" name="client" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('jn')->value['id_client'])===null||$tmp==='' ? '' : $tmp);?>
" class="form-control"  title="Nama Client" readonly>
                                                    <input type="hidden" name="init_planning" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('jn')->value['id_initiation'])===null||$tmp==='' ? '' : $tmp);?>
">
                                                    <input type="hidden" name="start_planning" id="mulai_planning">
                                                    <input type="hidden" name="due_planning" value="<?php echo date('d F Y',strtotime((($tmp = @$_smarty_tpl->getVariable('jn')->value['due_date'])===null||$tmp==='' ? '' : $tmp)));?>
">
                                                    <input type="hidden" name="department_planning[]" id="department_planning">
                                                    <input type="hidden" name="karyawan_planning[]" id="karyawan_planning">
                                                        <button type="submit"  class="btn btn-success" style="width: 8%;">Accept</button>                              
                                                </form>
                                            </tr>
                                            <tr>
                                                <form class="" action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('closing/closing/closing_process');?>
" method="post">
                                                    <input type="hidden" name="init_closing" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('jn')->value['id_initiation'])===null||$tmp==='' ? '' : $tmp);?>
">
                                                    <input type="hidden" name="department_planning[]" id="department_closing">
                                                    <input type="hidden" name="karyawan_planning[]" id="karyawan_closing">
                                                        <button type="submit" class="btn btn-danger" style="width: 8%;">Reject</button>
                                                </form>
<?php }?>   
                                            </tr>
                                        </table>
                                        </center>
                                    </div>
                                </div>
                            </div>

    </div>
    <!-- row -->
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
            document.getElementById("mulai_planning").value = today;
    </script>
    <script type="text/javascript">
    $(document).ready(function(){
        
            var dprtm = $('#department').val();
            var kywn = $('#karyawan').val();
            
            document.getElementById("department_planning").value = dprtm;
            document.getElementById("karyawan_planning").value = kywn;

             document.getElementById("department_closing").value = dprtm;
            document.getElementById("karyawan_closing").value = kywn;
         
    });
    </script>

</section>